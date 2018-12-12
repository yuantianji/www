<?php
/**
 * 取文本中间
 * @param $str 要查找的全部文本
 * @param $leftStr 要查找的左边文本
 * @param $rightStr 要查找的右边文本
 * @return 返回需要的文本
 */
function getSubstr($str, $leftStr, $rightStr){
    $left = strpos($str, $leftStr);
    $right = strpos($str, $rightStr,$left);
    if($left < 0 or $right < $left) return '';
    return substr($str, $left + strlen($leftStr), $right-$left-strlen($leftStr));
}



/**
* log日志记录功能
* @param str $str 待记录的字符串
*/
function mLog($str,$path) {
	$filename = ROOT . '/log/'.$path.'/'. date('Ymd') . '.txt';
	$log = date('Y/m/d H:i:s') . "\n" . $str . "\n" . "-----------------------------------------\n";
	return file_put_contents($filename, $log , FILE_APPEND);
}

/**
 * 将秒转成时间
 */
function Sec2Time($time){
    if(is_numeric($time)){
	    $value = array(
	      "days" => 0, "hours" => 0,
	      "minutes" => 0, "seconds" => 0,
	    );
	    if($time >= 86400){
	      $value["days"] = floor($time/86400);
	      $time = ($time%86400);
	    }
	    if($time >= 3600){
	      $value["hours"] = floor($time/3600);
	      $time = ($time%3600);
	    }
	    if($time >= 60){
	      $value["minutes"] = floor($time/60);
	      $time = ($time%60);
	    }
	    $value["seconds"] = floor($time);
	    $t=$value["days"] ."天"." ". $value["hours"] ."小时". $value["minutes"] ."分".$value["seconds"]."秒";
	    return $t;
    }else{
    	return (bool) FALSE;
    }
 }


/**
 * cookie验证
 */
function vcookie($userid){
	$data = mGetRow("select * from user where userid=$userid;");
	if(empty($_COOKIE['userid'])||$data['userid']!=$_COOKIE['userid']){
		return false;
	}
	if(empty($_COOKIE['name'])||$data['name']!=$_COOKIE['name']){
		return false;
	}
	if(empty($_COOKIE['token'])||$data['token']!=$_COOKIE['token']){
		return false;
	}
	if(!empty($_COOKIE['phone'])){
		if($data['phone']!=$_COOKIE['phone']){
			return false;
		}
	}
	if(empty($_COOKIE['account'])||$data['account']!=$_COOKIE['account']){
		return false;
	}
	if(!empty($_COOKIE['qq'])){
		if($data['qq']!=$_COOKIE['qq']){
			return false;
		}
	}
	if(empty($_COOKIE['mail'])||$data['mail']!=$_COOKIE['mail']){
		return false;
	}
	return true;
}


/**
 * 检测敏感词
 * @param $str 
 * @return 布尔值
 */
function sensitive($str){
	$thesaurus = thesaurus();
	$info = 0;
	for ($i=0;$i<count($thesaurus);$i++){
    $content = substr_count($str,$thesaurus[$i]);
	    if($content>0){
	        $info = $content;
	        break;
	     }
	}
	if($info>0){
	   return true;
	}else{
	   return false;
	}
}
