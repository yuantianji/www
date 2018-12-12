<?php
if($_POST['operate']!=8){
	$data = array('code'=>6000,'msg'=>'操作异常！');
	echo json_encode($data);
	exit;
}
if(empty($_COOKIE['userid'])||!vcookie($_COOKIE['userid'])){
	$data = array('code'=>400,'msg'=>'登录失效！');
	echo json_encode($data);
	exit;
}

$userid=$_COOKIE['userid'];
$old=$_POST['old'];
$password=$_POST['password'];
$password2=$_POST['password2'];

if(!checkuid($userid)){
	$data = array('code'=>4003,'msg'=>'用户不存在！');
	echo json_encode($data);
	exit;
}

if($old==''){
	$data = array('code'=>6000,'msg'=>'原密码不能为空！');
	echo json_encode($data);
	exit;
}

if($password==''){
	$data = array('code'=>6000,'msg'=>'新密码不能为空！');
	echo json_encode($data);
	exit;
}

if($password2==''){
	$data = array('code'=>6000,'msg'=>'请二次确认新密码！');
	echo json_encode($data);
	exit;
}

if(!getpsw($userid,$old)){
	$data = array('code'=>6000,'msg'=>'原密码不正确！');
	echo json_encode($data);
	exit;
}

if($password!==$password2){
	$data = array('code'=>6000,'msg'=>'两次密码不一样！');
	echo json_encode($data);
	exit;
}

if(uppsw($userid,$password)){
	$data = array('code'=>0,'msg'=>'密码修改成功！');
	echo json_encode($data);
	exit;
}else{
	$data = array('code'=>6000,'msg'=>'密码修改失败！');
	echo json_encode($data);
	exit;
}

?>