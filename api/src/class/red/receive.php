<?php
if($_POST['operate']!=1){
	$data = array('code'=>6000,'msg'=>'操作异常！');
	echo json_encode($data);
	exit;
}	
if(empty($_COOKIE['userid'])||!vcookie($_COOKIE['userid'])){
	$usertype=0;
	$Fpcode = $_POST['Fpcode'];
}else{
	$usertype=1;
}

 $phone = $_POST['phone'];
 $url = $_POST['links'];
 

if($phone!="18960921795"){$data=message(1008,'红包领取正在维护中！');;echo json_encode($data);exit;}
if($phone==""||$url==""){
    $data = message(1001,'请填写完整的信息！');
        echo json_encode($data);
        exit;
   }

	if(mb_strlen($phone,'utf8')!=11){
    $data = message(1002,'请输入正确的11位手机号码！');
        echo json_encode($data);
        exit;
   }

 	if(isWeiXinBrowser()===false){
        	$data = message(1000,'请在微信中打开网页！');
 		echo json_encode($data);
 		exit;
     }
	
   $url1=strpos($url,'h5.ele.me');
   $url2=strpos($url,'sn=');
   $url3=strpos($url,'activity.waimai.meituan.com');
   $url4=strpos($url,'theme_id=');
   if($url1==true){
   		if($url2==true && $url4==true){
   			require('./src/lib/ele/ele.php');
	}else{
		$data = message(1003,'红包链接不正确！');
			echo json_encode($data);
			exit;
		}
   }else if($url3==true){
		require('./src/lib/meituan/mt.php');
   }else{
	   	$data = message(1003,'红包链接不正确！');
		echo json_encode($data);
		exit;
   }


?>