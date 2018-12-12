<?php
if($_POST['operate']!=11){
	$data = array('code'=>6000,'msg'=>'操作异常！');
	echo json_encode($data);
	exit;
}
if(empty($_COOKIE['userid'])||!vcookie($_COOKIE['userid'])){
	$data = array('code'=>400,'msg'=>'意外错误，请稍后重试');
	echo json_encode($data);
	exit;
}

$userid=$_COOKIE['userid'];
delck($userid);
$data = array('code'=>0,'msg'=>'退出登录成功！');
echo json_encode($data);
exit;
?>