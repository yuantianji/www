<?php
if($_POST['operate']!=2){
	$data = array('code'=>6000,'msg'=>'操作异常！');
	echo json_encode($data);
	exit;
}

 $phone = $_POST['phone'];
 $url = $_POST['links'];
 
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
   			 countinfer();
				 $sn = getSubstr($url,'sn=','&');
				 $theme = getSubstr($url,'theme_id=','&');
				 if(!is_numeric($theme)){
					$s = explore($sn);
				 }else{
					$s = explore($sn,$theme);
				 }
			 if($s[0]==null && $s[1]==null){
				 $data = message(2001,'为了您的红包不被意外领取，目前无法检测红包！');
	        	 echo json_encode($data);
	       	 	 exit;
			 }
   			 $data = message(0,'该红包最大红包为第'.$s[1].'个人,目前已经领取'.$s[0].'个人。');
        	 echo json_encode($data);
       	 	 exit;

		}else{
			$data = message(1003,'红包链接不正确！');
			echo json_encode($data);
			exit;
		}
   }else if($url3==true){
   		$data = message(2003,'暂时不支持美团红包检测！');
		echo json_encode($data);
		exit;
   }else{
	   	$data = message(1003,'红包链接不正确！');
		echo json_encode($data);
		exit;
   }

 

 
?>
