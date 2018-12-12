<?php
if($_POST['operate']!=3 && $_POST['operate']!=9){
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
$operate = $_POST['operate'];

if(!checkuid($userid)){
	$data = array('code'=>4003,'msg'=>'用户不存在！');
	echo json_encode($data);
	exit;
}

if($operate==3){
	$messageid = $_POST['messageid'];
	$repliedid= $_POST['repliedid'];
	$message = $_POST['message'];
	
	if($message==''){
		$data = array('code'=>4002,'msg'=>'内容不能为空哦0.0');
		echo json_encode($data);
		exit;
	}
	if(sensitive($message)){
		$data = array('code'=>4007,'msg'=>'您的文字中含有敏感词,禁止发送！');
		echo json_encode($data);
		exit;
	}
	
	if(!addreply($messageid,$userid,$repliedid,$message)){
		$data = array('code'=>4004,'msg'=>'回复失败！');
		echo json_encode($data);
		exit;	
	}else{
		$data = array('code'=>0,'msg'=>'回复成功！');
		echo json_encode($data);
		exit;
	}
}else if($operate==9){
	$id = $_POST['delid'];
	if(!delreply($id)){
		$data = array('code'=>4005,'msg'=>'删除失败！');
		echo json_encode($data);
		exit;
	}else{
		$data = array('code'=>0,'msg'=>'删除成功！');
		echo json_encode($data);
		exit;
	}
}else{
	$data = array('code'=>4006,'msg'=>'操作异常！');
	echo json_encode($data);
	exit;
}


?>