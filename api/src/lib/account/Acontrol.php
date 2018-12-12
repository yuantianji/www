<?php
/**
* 获取来访者的真实IP
*@return 用户真实ip
*/
function getRealIp() {
	static $realip = null;
	if($realip !== null) {
		return $realip;
	}

	if(getenv('REMOTE_ADDR')) {
		$realip = getenv('REMOTE_ADDR');
	} else if(getenv('HTTP_CLIENT_IP')) {
		$realip = getenv('HTTP_CLIENT_IP');
	} else if (getenv('HTTP_X_FROWARD_FOR')) {
		$realip = getenv('HTTP_X_FROWARD_FOR');
	}

	return $realip;	
}


 
/**
* 查询用户状态
*@param 用户唯一识别码
*@param 用户手机号码
*@return 1 封禁  0正常
*/
function FingerprintID($Fpcode,$phone){
	 $idcode = mGetRow("select identify from fingerprint where identify='$Fpcode';")['identify'];
	 $phonecode = mGetRow("select phone from fingerprint where phone='$phone';")['phone'];
	 
	 if($idcode=="" and $phonecode==""){
			 	if($Fpcode==""){
			 		return 0;
			 	}else{
					$i = strval(time());
					$data1 = array('identify'=>$Fpcode , 'phone'=>$phone , 'visits'=>0,'banned'=>0,'timestamp'=>$i);
					mExec('fingerprint',$data1 ,'insert');
					return 0;
			 	}
	 }else{
	 			if($phonecode==""){
	 					$data2 = array('phone'=>$phone);
	 					mExec('fingerprint',$data2 , 'update' , "identify='$Fpcode'");
		 		}
		 		
		 		if($idcode==""){
		 				$data3 = array('identify'=>$Fpcode);
	 					mExec('fingerprint',$data3 ,'update' , "phone='$phone'");
		 		}
		 	
		 	
		 	$timestamp = mGetRow("select timestamp from fingerprint where identify='$Fpcode';")['timestamp'];
		 	
		 	date_default_timezone_set('PRC');
		 	
		 	if(date('Ymd',$timestamp)!=date('Ymd')){
		 		$i = strval(time());
		 		$data4 = array('timestamp'=>$i);
	 			mExec('fingerprint',$data4 , 'update' , "identify='$Fpcode'");
		 		$data5 = array('visits'=>0);
	 			mExec('fingerprint',$data5 , 'update' , "identify='$Fpcode'");
		 	}
		 		$banned = mGetRow("select banned from fingerprint where identify='$Fpcode';")['banned'];
				if($banned>0){
						return 1;	
				}
			return 0;	
	 }
}




/**
* 添加临时用户次数
*@param 用户唯一识别码
*@return 使用次数
*/
function addID($Fpcode){
	 $visits = mGetRow("select visits from fingerprint where identify='$Fpcode';")['visits'];

	 if($visits==""){
			return 0;
	 }

	 $n=$visits+1;
	 $m=strval($n);
	 
	 	if($n>=2){
	 		$data1 = array('banned'=>1);
	 		mExec('fingerprint',$data1 , 'update' , "identify='$Fpcode'"); 
	 	}
	 		$data2 = array('visits'=>$m);
	 		mExec('fingerprint',$data2 , 'update' , "identify='$Fpcode'"); 
	 		
	return $m;
}

/**
 *检测用户是否存在
 * @param $phone 
 * @return 布尔值
 */
function findphone($phone){
	$phones = mGetRow("select phone from fingerprint where phone='$phone';")['phone'];
	if(!$phones){
		return false;
	}else{
		return true;
	}
}


/**
* 封禁用户
*@param 用户唯一识别码
*/
function SealingID($Fpcode){
	$data = array('banned'=>1);
	mExec('fingerprint',$data , 'update' , "identify='$Fpcode'"); 
}




/**
* 计算唯一uuid
*@param uuid唯一识别码
*@param 用户浏览器指纹识别码
*@return 用户唯一识别码
*/
function calculates($uuid,$Fpcode){
		$Fpcode = $uuid."-".strval($Fpcode);
		return $Fpcode;
}




/**
* 判断用户访问UA
*@return 布尔值
*/
function is_mobile()
{
        $agent = strtolower($_SERVER['HTTP_USER_AGENT']);
        $is_pc = (strpos($agent, 'windows nt')) ? true : false;
        $is_mac = (strpos($agent, 'mac os')) ? true : false;
        $is_iphone = (strpos($agent, 'iphone')) ? true : false;
        $is_android = (strpos($agent, 'android')) ? true : false;
        $is_ipad = (strpos($agent, 'ipad')) ? true : false;
        
        if($is_iphone){
              return  true;
        }
        if($is_android){
              return  true;
        }
        if($is_ipad){
              return  true;
        }
				if($is_pc){
              return  false;
        } 
        if($is_mac){
              return  false;
        }
}

?>