<?php
if($_POST['operate']!=4 && $_POST['operate']!=10){
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

if($operate==4){
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
	if(!addpublish($userid,$message)){
		$data = array('code'=>4004,'msg'=>'留言发表失败！');
		echo json_encode($data);
		exit;	
	}else{
		$data = array('code'=>0,'msg'=>'留言成功！');
		echo json_encode($data);
		exit;
	}
}else if($operate==10){
	$messageid = $_POST['messageid'];
	if(!delpublish($messageid)){
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