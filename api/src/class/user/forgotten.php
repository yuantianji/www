<?php
if($_POST['operate']!=12){
	$data = array('code'=>6000,'msg'=>'操作异常！');
	echo json_encode($data);
	exit;
}	
$account = $_POST['account'];
$mail = $_POST['mail'];


$pws = accma($account,$mail);
if($pws!==false){
	notice($mail,'CHB找回密码',"感谢使用CHB,你的密码是：".md5jm($pws));
	//$data = array('code'=>0,'msg'=>'邮件发送功能暂时关闭，请牢记您的密码：'.md5jm($pws));
	echo json_encode($data);
	exit;
}
?>