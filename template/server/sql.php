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
		$conn = mysqli_connect('127.0.0.1:3306','root','','chifanba');
		mysqli_query($conn,'set names utf8');
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
		return false;
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
 * cookie验证
 */
function vcookie($userid){
	$data = mGetRow("select * from user where userid=$userid;");
	if(empty($_COOKIE['name'])||$data['name']!=$_COOKIE['name']){
		return false;
	}
	if(empty($_COOKIE['token'])||$data['token']!=$_COOKIE['token']){
		return false;
	}
	if(!empty($_COOKIE['phone'])){
		if($data['phone']!=$_COOKIE['phone']){
			return false;
		}
	}
	if(empty($_COOKIE['account'])||$data['account']!=$_COOKIE['account']){
		return false;
	}
	if(!empty($_COOKIE['qq'])){
		if($data['qq']!=$_COOKIE['qq']){
			return false;
		}
	}
	if(empty($_COOKIE['mail'])||$data['mail']!=$_COOKIE['mail']){
		return false;
	}
	return true;
}

?>