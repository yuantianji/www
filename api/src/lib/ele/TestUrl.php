<?php
/**检测红包被领取的次数
 * @param $jsonStr 红包领取后返回的json 
 * @return 返回该红包被领取的次数
 */
function testfunc($jsonStr){ 
	$count = substr_count($jsonStr,'sns_avatar');
return $count;
}



/**检测红包领取情况
 * @param $jsonStr 红包领取后返回的json 
 * @return 返回该红包领取状态
 */
function Full($jsonStr){ 
	$obj=json_decode($jsonStr,true);
	$failure1=strpos($jsonStr,'PHONE_IS_EMPTY');
	$failure2=strpos($jsonStr,'SNS_UID_CHECK_FAILED');
	$failure3=strpos($jsonStr,'Request');
	$failure4=strpos($jsonStr,'UNKNOWN_ERROR');
    $failure5=strpos($jsonStr,'UNAUTHORIZED');
    $failure6=strpos($jsonStr,'TOO_BUSY');
    $failure7=strpos($jsonStr,'ROUTE_NOT_FOUND');
    
	
	//$code=strpos($jsonStr,'ret_code');
	if($failure1==true){
		return 3;
	}
	if($failure2==true){
		return 3;
	}
	if($failure3==true){
		return 3;
	}
	if($failure4==true){
		return 6;
	}
    if($failure5==true){
		return 3;
	}
    if($failure6==true){
		return 6;
	}
    if($failure7==true){
		return 7;
	}
    
	switch($obj["ret_code"]){
		case 1:
			return 1;
			break;
		case 2:
			return 2;
			break;
		case 3:
			return 3;
			break;
		case 4:
			return 4;
			break;
		case 5:	
			return 5;
			break;
	}
}


/**检查uuid合法性
 * @param $uuid 前端传过来的uuid
 * @return 布尔值
 */
function checkuuid($uuid){
	if (preg_match('/^{?[a-z0-9]{8}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{4}-[a-z0-9]{12}-[a-z0-9]{1,15}}?$/', $uuid)) {
 		return 0;
	} else {
 		return 1;
	}	
} 