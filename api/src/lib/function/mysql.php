<?php 
/**
* mysql.php mysql系列操作函数
* @author nianbaibai
*/

/**
* 连接数据库
*
* @return resource 连接成功,返回连接数据库的资源
*/
function mConn() {
	static $conn = null;
	if($conn === null) {
		$cfg = require(ROOT . '/lib/function/config.php');
		$conn = mysqli_connect($cfg['host'] , $cfg['hostname'] , $cfg['hostpassword'],$cfg['databasename']);
		mysqli_query($conn,'set names '.$cfg['charset']);
	}

	return $conn;
}


/**
* 查询的函数
* @param str $sql 待查询的sql语句
* @return mixed resoure/bool
*/
function mQuery($sql) {
	$rs  = mysqli_query(mConn(),$sql);
	if(!$rs) {
		mLog($sql. "\n" . mysql_error(),'sqllog');
	}
	return $rs;
}


/**
* 查询的函数
* @param str $sql 待查询的sql语句
* @return 返回一个全数据的二维数组
*/
function mGetAll($sql) {
	$rs = mQuery($sql);
	if(!$rs) {
		return false;
	}

	$data = array();
	while($row = mysqli_fetch_assoc($rs)) {
		$data[] = $row;
	}

	return $data;
}


/**
* select 取出一行数据
* @param str $sql 待查询的sql语句
* @return arr/false 查询成功 返回一个一维数组
*/
function mGetRow($sql) {
	$rs = mQuery($sql);
	if(!$rs) {
		return false;
	}

	return mysqli_fetch_assoc($rs);
}



/**
* select 查询返回一个结果
* @param str $sql 待查询的select语句
* @return mixed 成功,返回结果,失败返回false
*/
function mGetOne($sql) {
	$rs = mQuery($sql);
	if(!$rs) {
		return false;
	}

	return mysqli_fetch_row($rs)[0];
}


/**
* select 查询返回一个数量
* @param str $sql 待查询的select语句
* @return mixed 返回一个数量
*/
function mGetNum($sql) {
	$rs = mQuery($sql);
	if(!$rs) {
		return false;
	}

	return mysqli_num_rows($rs);
}



/**
* @param str $table 表名
* @param arr $data 接收到的数据,一维数组
* @param str $act 动作 默认为'insert'
* @param str $where 防止update更改时少加where条件
* @return bool insert 或者update 插入成功或失败 
*/

function mExec($table , $data , $act='insert' , $where=0) {
	if($act == 'insert') {
		$sql = "insert into $table (";
		$sql .= implode(',' , array_keys($data)) . ") values ('";
		$sql .= implode("','" , array_values($data)) . "')";
		return mQuery($sql);
	} else if ($act == 'update') {
		$sql = "update $table set ";
		foreach($data as $k=>$v) {
			$sql .= $k . "='" . $v . "',";
		}

		$sql = rtrim($sql , ',') . " where ".$where;
		return mQuery($sql);
	}
}


function mDel($table,$where){
	$sql = 'delete from '.$table.' where '.$where;
	return mQuery($sql);
}


/**
* 取得上一步insert 操作产生的主键id
* @return 返回一个操作产生的主键id
*/
function getLastId() {
	return mysql_insert_id(mConn());
}


/**
* 使用反斜线 转义字符串
* @param arr 待转义的数组
* @return arr 被转义后的数组
*/
function _addslashes($arr) {
	foreach($arr as $k=>$v) {
		if(is_string($v)) {
			$arr[$k] = addslashes($v);
		}else if(is_array($v)) {
			$arr[$k] = _addslashes($v);
		}
	}

	return $arr;
}


?>


