<?php
	
/**
*检测数据库数据使用状况
* @return -1 数据不足，0数据充足
*/
function countinfer(){
     $timestamp = mGetRow('select timestamp from cookie_data where id=1;')['timestamp'];
     date_default_timezone_set('PRC');
     if(date('Ymd',$timestamp)!=date('Ymd')){
        $i = strval(time());
        $data1 = array('timestamp'=>$i);
		mExec('cookie_data',$data1 , 'update');
        $data2 = array('available'=>0);
		mExec('cookie_data',$data2 , 'update' , 'available=1');
     }
     $test = mGetRow('select count(*) from cookie_data where available=1')['count(*)'];
     $test2 = mGetRow('select count(*) from cookie_data where available=2')['count(*)'];
	 $count = mGetRow('select count(*) from cookie_data')['count(*)'];
     $test3 = $test + $test2;
	 if($test3==$count){
		return -1;
	 }
	return 0;
}




/**获取可用ID的可用次数和时间戳
 * @return  返回一个数组 id 状态 时间戳
 */
function setid(){
	 $count = mGetRow('select count(*) from cookie_data where available=0')['count(*)'];
	if($count==0){
		$id=-1;
		$available=-1;
		$timestamp=-1;
	}else{
		$i = mt_rand(0, $count-1);
	 	$id = mGetAll('select id from cookie_data where available=0')[$i]['id'];
		$id = (string)$id;
		$available = mGetRow("select available from cookie_data where id=$id;")['available'];
		$timestamp = mGetRow("select timestamp from cookie_data where id=$id;")['timestamp'];
	}
	
	 mLog('{"ID":'.$id.',"message":"ID获取成功！"}','datalog');
	
	 return array($id,$available,$timestamp);
}



 /**数据库取Cookie
  * @param 数据库ID
  * @return 返回一个包装cookie数组
  */
function elecookie($id){ 
	 $open_id = mGetRow("select open_id from cookie_data where id=$id;")['open_id'];
	 $eleme_key = mGetRow("select eleme_key from cookie_data where id=$id;")['eleme_key'];
	 $track_id = mGetRow("select track_id from cookie_data where id=$id;")['track_id']; 
	 $cookie = mGetRow("select cookie from cookie_data where id=$id;")['cookie'];
	 
	 mLog('{"ID":'.$id.',"mssage":"COOKIE信息获取成功"}','datalog');

	 return array($open_id,$eleme_key,$track_id,$cookie);
}



 /**ele领取post
  * @param $open_id 饿了么参数
  * @param $sn 红包标识码
  * @param $eleme_key 饿了么参数
  * @param $track_id 饿了么参数
  * @param $cookie QQ授权cookei
  * @return 返回饿了么的返回json
  */
function elereceive($open_id,$sn,$eleme_key,$track_id,$cookie){
	 $post_data = array(
		 'device_id'=>"",
	     'group_sn'=>$sn,
	     'hardware_id'=>"",
	     'latitude'=>"",
	     'longitude'=>"",
	     'method'=>"phone",
	     'phone'=>"",
	     'platform'=>4,
	     'sign'=>$eleme_key,
	     'track_id'=>$track_id,
	     'unionid'=>"fuck",
	     'weixin_avatar'=>'http://thirdqq.qlogo.cn/qqapp/101204453/0BF7CB2A95B1B88EFE6C47F869D5D42C/40',
	     'weixin_username'=>'chifanba'
	 );
	 $url = "https://h5.ele.me/restapi/marketing/promotion/weixin/$open_id";
	 $curl = curl_init();
		 curl_setopt($curl, CURLOPT_URL, $url);
		 curl_setopt($curl, CURLOPT_HEADER, 0);
		 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		 curl_setopt($curl, CURLOPT_POST, 1);
		 curl_setopt($curl, CURLOPT_POSTFIELDS, $post_data);
		 curl_setopt($curl, CURLOPT_COOKIE , $cookie);
		 curl_setopt($curl, CURLOPT_TIMEOUT, 10);
		 $data = curl_exec($curl);
		 if($data === false){
		 	curl_close($curl);
		 	mLog('{"message":"ele服务器请求出错！,返回信息:'.$data.'"}','datalog');
			return -1;
		 }else{
		 	curl_close($curl);
		 	mLog('{"message":"ele服务器请求成功！,返回信息:'.$data.'"}','datalog');
		 	return $data;
		 }
}



/**获取红包幸运值
 * @param $sn 红包识别码
 * @param $theme 默认为0 
 * @return 返回红包幸运值
 */
function lucky($sn,$theme=569){
	$url = "https://h5.ele.me/restapi/marketing/themes/$theme/group_sns/$sn";
	  $curl = curl_init();
		 curl_setopt($curl, CURLOPT_URL, $url);
		 curl_setopt($curl, CURLOPT_HEADER, 0);
		 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    	 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    	 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
		 $data = curl_exec($curl);
		 curl_close($curl);
    	 $lucky = getSubstr($data,'lucky_number": ',', "up');
    	 return $lucky;
}



/**数据库数据隔日更新
 * @param $id 数据库ID
 */
function Resettime($id){
	$i = strval(time());
	
	$data1 = array('available'=>0);
	mExec('cookie_data',$data1 , 'update' ,"id=$id");
	
	$data2 = array('timestamp'=>$i);
	mExec('cookie_data',$data2 , 'update' ,"id=$id");
}



/**标记领满5次
 * @param $id 数据库ID
 */
function tag($id){
	$data = array('available'=>1);
	mExec('cookie_data',$data , 'update' ,"id=$id");
}



/**添加COOKIE
 * @param $open_id 数据库ID
 * @param $eleme_key 数据库ID
 * @param $track_id 数据库ID
 * @param $cookie 数据库ID
 * @return 布尔值
 */
function addcookie($open_id,$eleme_key,$track_id,$cookie){
	$jquery = mGetNum("select id from cookie_data where open_id='$open_id';");
	if($jquery==1){
		return -2;
	}else{
		$id = mGetNum('select id from cookie_data;')+1;
		$i = strval(time());
		$data = array('id'=>$id,'open_id'=>$open_id,'eleme_key'=>$eleme_key,'track_id'=>$track_id,'cookie'=>$cookie,'available'=>0,'timestamp'=>$i);
		$val = mExec('cookie_data',$data ,'insert');
		return $val;
	}
}


/**失效COOKIE处理
 * @param $id 数据库ID
 */
function failure($id){
	$data = array('available'=>2);
	mExec('cookie_data',$data,'update',"id=$id");
}



/**失效cookie更新
 *  @param $open_id 饿了么参数
 *  @param $track_id 饿了么参数
 *  @param $cookie QQ授权Cookie
 *  @return  返回布尔结果
 */
function updatack($open_id,$track_id,$cookie){
	$id = mGetRow("select id from cookie_data where open_id='$open_id' and available=2;")['id'];
	if($id!=""){
		$data = array('track_id'=>$track_id,'cookie'=>$cookie,'available'=>0);
		mExec('cookie_data',$data,'update',"id=$id");
		return 1;
	}
    return 0;
}



/**邮件发送函数
 * 
 */

function mailnotice(){
    $timestamp = mGetRow('select timestamp from record where id=1;')['timestamp'];
    date_default_timezone_set('PRC');
    
     if(date('Ymd',$timestamp)!=date('Ymd')){
     	$i = strval(time());
     	$data1 = array('timestamp'=>$i);
		mExec('record',$data1,'update','id=1');
     	$data2 = array('mailrecord'=>0);
		mExec('record',$data2,'update','id=1');
	}
	
	$mailrecord = mGetRow('select mailrecord from record where id=1;')['mailrecord'];
	
	if($mailrecord==0){
		date_default_timezone_set('PRC');
		notice(Recipient,'服务器cookie不足通知',date("Y-m-d H:i:s").'服务器可用cookie已经不足，查看是否进行处理！');
     	$data3 = array('mailrecord'=>1);
		mExec('record',$data3,'update','id=1');
	}
}



/**向前端返回消息json打包
 * @param $code 状态吗
 * @param $msg 消息
 */

function message($code,$msg){
	$data = array(
		'code'=>$code,
		'msg'=>$msg
	);
	return $data;
}


/**检查用户访问UA
 * 
 */
function isWeiXinBrowser(){
   $user_agent = $_SERVER['HTTP_USER_AGENT'];
   if (strpos($user_agent, 'MicroMessenger') === false) {
       return false;
   } else {
       return true;
   }
}

/**检测红包
 * @param $sn 红包识别码
 * @return 返回一个包含幸运值和已领取次数的数组
 */
function explore($sn,$theme=569){
	$count = mGetRow('select count(*) from cookie_data where available=1')['count(*)'];
	if($count==0){
		$a = null;
		$b = null;
	}else{
		 $i = mt_rand(0, $count-1);
		 $id = mGetAll('select id from cookie_data where available=1')[$i]['id'];
		 $id = (string)$id;
		 $open_id = mGetRow("select open_id from cookie_data where id=$id;")['open_id'];
		 $eleme_key = mGetRow("select eleme_key from cookie_data where id=$id;")['eleme_key'];
		 $track_id = mGetRow("select track_id from cookie_data where id=$id;")['track_id']; 
		 $cookie = mGetRow("select cookie from cookie_data where id=$id;")['cookie'];
		 $data = elereceive($open_id,$sn,$eleme_key,$track_id,$cookie);
		 $a = intval(substr_count($data,'sns_avatar'));
		 $b = intval(lucky($sn,$theme));
		 mLog('目前ID总数:'.$count.',目前获取ID:'.$id.',A为:'.$a.',B为:'.$b.';','detection');
	}
	return array($a,$b);
}

/**检测一次失效cookie真伪
 * @return 返回一个失效ID数组
 */
function failID(){
	$num = mGetRow('select count(*) from cookie_data where available=2;')['count(*)'];
	$obj1 = array();
	for($i=0;$i<$num;$i++){
		$id = mGetAll('select id from cookie_data where available=2;')[$i]['id'];
		$id = (string)$id;
		$open_id = mGetRow("select open_id from cookie_data where id=$id;")['open_id'];
		$eleme_key = mGetRow("select eleme_key from cookie_data where id=$id;")['eleme_key'];
		$track_id = mGetRow("select track_id from cookie_data where id=$id;")['track_id']; 
		$cookie = mGetRow("select cookie from cookie_data where id=$id;")['cookie'];
		$data = elereceive($open_id,'1d282af28893b4a7',$eleme_key,$track_id,$cookie);
		$str = Full($data);
		if($str===3){
			array_push($obj1,$id);
		}
	}
	return $obj1;
}

/**检测用户是否开通饿了么领取权限
 * @param $userid
 * @return 布尔值
 */
function getelepermission($userid){
	
	$timestamp = mGetRow("select timestamp from user where userid=$userid;")['timestamp'];
	date_default_timezone_set('PRC');
	if(date('Ymd',$timestamp)!=date('Ymd')){
		$i = strval(time());
		$data = array('frequency'=>0,'timestamp'=>$i);
	 	mExec('user',$data , 'update' , "userid=$userid");
	}
	$num = mGetRow("select ele from user where userid=$userid;")['ele'];
	if($num==1){
		return true;
	}else{
		return false;
	}
	
}

/**
* 添加用户次数
*@param $userid 用户id
*@return 使用次数
*/
function addfrequency($userid){
	 $visits = mGetRow("select frequency from user where userid=$userid;")['frequency'];
	 $n=$visits+1;
	 $m=strval($n);
	 	if($n>=5){
	 		$data1 = array('ele'=>0);
	 		mExec('user',$data1 , 'update' , "userid=$userid");
	 	}
	 		$data2 = array('frequency'=>$m);
	 		mExec('user',$data2 , 'update' , "userid=$userid");
	return $m;
}