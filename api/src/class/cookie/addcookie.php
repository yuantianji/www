<?php
 $cookie = $_POST['cookie'];
 if($cookie==""){
	 	$data = message(2001,'Cookie不可为空！');
	 	echo json_encode($data);
	 	exit;
 }
 
 $tid=strpos($cookie,'rack_id=');
 $sns=strpos($cookie,'snsInfo');
 $sid=strpos($cookie,'SID=');
 if($sns==false||$sid==false){
	 	$data = message(2002,'Cookie不正确！');
	 	echo json_encode($data);
	 	exit;
 }
 
 if($tid==false){
	 	$data = message(2002,'Cookie不正确！');
	 	echo json_encode($data);
	 	exit;
 }
 
 $openid=getSubstr($cookie,"%2F101204453%2F","%2F30%22%2C");
 $elekey=getSubstr($cookie,"eleme_key%22%3A%22","%22%2C%22f");
 $trackid=getSubstr($cookie,"track_id=",";");
 if($openid==""||$elekey==""){
	  	$data = message(2002,'Cookie不正确！');
	 	echo json_encode($data);
	 	exit;
 }
 
 if($trackid==""){
	 	$data = message(2002,'Cookie不正确！');
	 	echo json_encode($data);
	 	exit;
 }
 
 $val=addcookie($openid,$elekey,$trackid,$cookie);
if($val==1){
   	$data = message(0,'贡献成功！');
   	echo json_encode($data);
   	exit;
}else if($val==-2){
   	$str = updatack($openid,$trackid,$cookie);
   	if($str==1){
   		$data = message(0,'更新成功！');
	}else{
		$data = message(2003,'Cookie已存在！');
	}
   	echo json_encode($data);
   	exit;	
}else{
$data = message(2004,'贡献失败！');
echo json_encode($data);
exit;	
}
?>