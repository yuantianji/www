<?php
/**封装美团返回json函数
 * @param $data 服务端返回的json
 * @return 返回message信息
 */
function getmsg($phone,$data){
		 $obj=json_decode($data,true);
	 $code=$obj["code"];
	 if($code!=0){
		 mLog('{"id":'.$obj["data"]["id"].',"phone":'.$phone.',"message":"'.$obj["data"]["message"].'","url":"'.$obj["data"]["url"].'"}','mtlog');
	 	return array('code'=>$code,'msg'=>$obj["message"]);
	 }else{
	 	$id=$obj["data"]["id"];
        $i=1;
		do{
	 		$obj1=json_decode(query($id),true);
	 		$status=$obj1["data"]["status"];
			switch ($status){
				case 0:
					break;
				case 1:
					$i=0;
					mLog('{"id":'.$obj1["data"]["id"].',"phone":'.$phone.',"message":"美团红包领取成功，红包已经到达您的手机号，请自行查看","url":"'.$obj1["data"]["url"].'"}','mtlog');
					return array('code'=>$code,'msg'=>'美团红包领取成功，红包已经到达您的手机号，请自行查看');
					break;
				case 2:
					$i=0;
					mLog('{"id":'.$obj1["data"]["id"].',"phone":'.$phone.',"message":"'.$obj1["data"]["message"].'","url":"'.$obj1["data"]["url"].'"}','mtlog');
					return array('code'=>$code,'msg'=>$obj1["data"]["message"]);
					break;
			}
		}while($i==1);
	 }
}
 
 
 /**封装美团领取函数
 * @param $phone 前端接收的手机号码
 * @param $url 前端接收的美团链接
 * @return 服务端返回的json
 */
 function mtreceive($phone,$url){
	 $post_data = array(
	 );
	 $url = "";
	 $header = array(
	 );
	  $curl = curl_init();
		 curl_setopt($curl, CURLOPT_URL, $url);
		 curl_setopt($curl, CURLOPT_HEADER, 0);
		 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		 curl_setopt($curl, CURLOPT_POST, 1);
		 curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
		 curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
		 $data = curl_exec($curl);
     	 curl_close($curl);   	 
   		 return $data;
}


/**封装美团返回的领取结果
 * @param $id 领取返回的id
 * @return 领取结果返回
 */
 function query($id){
	 $url = ""
	 $header = array(
	 );
	  $curl = curl_init();
		 curl_setopt($curl, CURLOPT_URL, $url);
		 curl_setopt($curl, CURLOPT_HEADER, 0);
		 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    	 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    	 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		 curl_setopt($curl, CURLOPT_HTTPHEADER, $header); 
		 $data = curl_exec($curl);
		 curl_close($curl);
    	 return $data;
 }
 
 
 /**检测用户是否开通美团领取权限
 * @param $userid
 * @return 布尔值
 */
function getmtpermission($userid){
	$timestamp = mGetRow("select timestamp from user where userid=$userid;")['timestamp'];
	date_default_timezone_set('PRC');
	if(date('Ymd',$timestamp)!=date('Ymd')){
		$i = strval(time());
		$data = array('frequency'=>0,'timestamp'=>$i);
	 	mExec('user',$data , 'update' , "userid=$userid");
	}
	$num = mGetRow("select meituan from user where userid=$userid;")['meituan'];
	if($num==1){
		return true;
	}else{
		return false;
	}
	
}
?>