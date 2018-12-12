<?php
/*
mt领取
*/

if($usertype==0){
	$data = message(1005,'暂时不支持美团红包的领取！');
	echo json_encode($data);
	exit;
}

if(!empty($_COOKIE['phone'])){
	$phone = $_COOKIE['phone'];
}else{
	$data = message(1005,'请先在个人中心绑定您的手机号码！');
	echo json_encode($data);
	exit;
}
$userid = $_COOKIE['userid'];
if(!getmtpermission($userid)){
	$data = message(1005,'你的账号无美团红包领取权限,如有问题请联系管理员！');
	echo json_encode($data);
	exit;
}
 $data=mtreceive($phone,$url);
 $msg=getmsg($phone,$data);
 echo json_encode($msg);
?>