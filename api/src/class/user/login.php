<?php
if($_POST['operate']!=7){
	$data = array('code'=>6000,'msg'=>'操作异常！');
	echo json_encode($data);
	exit;
}
$account=$_POST['account'];
$password=$_POST['password'];

if($account==''){
	$data = array('code'=>7000,'msg'=>'账号不能为空！');
	echo json_encode($data);
	exit;
}
if($password==''){
	$data = array('code'=>7001,'msg'=>'密码不能为空！');
	echo json_encode($data);
	exit;
}

if(findaccount($account)){
	$data = array('code'=>7002,'msg'=>'账号或密码不正确！');
	echo json_encode($data);
	exit;
}

if(!getpwd($account,$password)){
	$data = array('code'=>7002,'msg'=>'账号或密码不正确！');
	echo json_encode($data);
	exit;
}else{
	setck($account,$password);
	$data = array('code'=>0,'msg'=>'登录成功！');
	echo json_encode($data);
	exit;
}


?>