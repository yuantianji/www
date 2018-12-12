<?php
if($_POST['operate']!=6){
	$data = array('code'=>6000,'msg'=>'操作异常！');
	echo json_encode($data);
	exit;
}
$account=$_POST['account'];
$password=$_POST['password'];
$password2=$_POST['password2'];
$mail=$_POST['mail'];
if($account==''){
	$data = array('code'=>6000,'msg'=>'账号不能为空！');
	echo json_encode($data);
	exit;
}
if($password==''){
	$data = array('code'=>6000,'msg'=>'密码不能为空！');
	echo json_encode($data);
	exit;
}
if($password2==''){
	$data = array('code'=>6000,'msg'=>'请二次确认密码！');
	echo json_encode($data);
	exit;
}
if($mail==''){
	$data = array('code'=>6000,'msg'=>'邮箱不能为空！');
	echo json_encode($data);
	exit;
}

if($password!==$password2){
	$data = array('code'=>6000,'msg'=>'两次密码不一样！');
	echo json_encode($data);
	exit;
}

if(!findaccount($account)){
	$data = array('code'=>6001,'msg'=>'该账号已存在！');
	echo json_encode($data);
	exit;
}

if(!findmail($mail)){
	$data = array('code'=>6002,'msg'=>'该邮箱已被绑定！');
	echo json_encode($data);
	exit;
}

if(reg($account,$password,$mail)){
	$data = array('code'=>0,'msg'=>'注册成功！');
	echo json_encode($data);
	exit;
}else{
	$data = array('code'=>6003,'msg'=>'注册失败！');
	echo json_encode($data);
	exit;
}
?>