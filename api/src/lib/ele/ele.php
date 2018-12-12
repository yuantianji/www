<?php
/*
ele领取
*/
if($usertype==0){
	$phones = $_COOKIE['Phones'];
	$uuid = $_COOKIE['uuid'];
	$Fpcode = calculates($uuid,$Fpcode);
	if(checkuuid($Fpcode)==1){
	   	$data = message(1004,'uuid不合法！');
		echo json_encode($data);
		exit;
	}	
	if(!findphone($phones)){
		$data = message(1005,'新用户请注册账号后才可以使用！');
		echo json_encode($data);
		exit;
	}
	if($phones==""){
   		$phones=$phone;	
    }
    $n = FingerprintID($Fpcode,$phones);
    if($n==1){
	 	$data = message(1005,'您的已经被禁止使用,如有问题请联系管理员！');
		echo json_encode($data);
		exit;
	 }
}else{
	if(!empty($_COOKIE['phone'])){
		$phones = $_COOKIE['phone'];
	}else{
		$data = message(1005,'请先在个人中心绑定您的手机号码！');
		echo json_encode($data);
		exit;
	}
	$userid = $_COOKIE['userid'];
	if(!getelepermission($userid)){
		$data = message(1005,'你的账号无饿了么红包领取权限,如有问题请联系管理员！');
		echo json_encode($data);
		exit;
	}
	
}

 $sn = getSubstr($url,'sn=','&');
 $theme = getSubstr($url,'theme_id=','&');
 $lucky = lucky($sn,$theme);

	$kz=1;
    $cf=0;
	$bf=1;
   $repeat=array();

   do{
	   $judge=judge();
	   
	   if($judge==-1){
		   	$kz=0;
		   	$data = message(1006,'今日发放次数已达上限，请明日再来！');
		   	mLog('{"message":"服务器可用cookie不足"}','syslog');
           	mailnotice();
           	echo json_encode($data);
			exit;
   		}
       
   		if(in_array($judge,$repeat)===false){
   			
			$elecookie=elecookie($judge);
            if($bf==1){
				$results=elereceive($elecookie[0],$sn,$elecookie[1],$elecookie[2],$elecookie[3]);
                $bf=2;
            }
            if($results=='' || $results==-1){
            	$data = message(1007,'饿了么服务器请求失败！');
            	mLog('{"message":"饿了么服务器请求失败"}','syslog');
				echo json_encode($data);
				exit;	
			}
            
			$code=Full($results);
            
			switch($code){
				case 1:
				    mLog('{"id":'.$judge.',"phone":'.$phone.',"message":"该红包已被领完了！"}','syslog');
					break;
				case 2:
					mLog('{"id":'.$judge.',"phone":'.$phone.',"message":"该红包已经领取过了！"}','syslog');
					array_push($repeat,$judge);
					break;
				case 3:
					mLog('{"id":'.$judge.',"phone":'.$phone.',"message":"cookie失效！"}','syslog');
					notice(Recipient,'cookie失效通知','id:'.$judge.',发现一个失效cookie');
	                failure($judge);
	                array_push($repeat,$judge);
					break;
				case 4:
					mLog('{"id":'.$judge.',"phone":'.$phone.',"message":"领取成功！"}','syslog');
					array_push($repeat,$judge);
					break;
				case 5:	
					mLog('{"id":'.$judge.',"phone":'.$phone.',"message":"Cookie领取次数达到上限！"}','syslog');
					tag($judge);
					break;
				case 6:	
					mLog('{"id":'.$judge.',"phone":'.$phone.',"message":"服务异常,请稍候重试！"}','syslog');
					array_push($repeat,$judge);
					break;
                case 7;
                    mLog('{"id":'.$judge.',"phone":'.$phone.',"message":"路由不存在！"}','syslog');
                    break;
			}
            
			$complete=testfunc($results);
			$result=calculate($lucky,$complete);
            
				switch ($result){
					case 0:
                        $bf=1;
						break;
					case 1:
						$kz=0;
						if($usertype==0){
							$m=addID($Fpcode);
							$data = message(0,'您是临时用户每天只能领取1次红包，目前成功领取了'.$m.'次红包。下一个就是最大红包，请手动点击一下链接哦！');
						}else{
							$m=addfrequency($userid);
							$p = intval($m);
							if($p>=4){
								$data = message(0,'您今日已经领取'.$m.'次红包了，建议停止领取，明日再来，否则可能被检测刷包哦。下一个就是最大红包，请手动点击一下链接哦！');
							}else{
								$data = message(0,'您今日已经领取'.$m.'次红包了。下一个就是最大红包，请手动点击一下链接哦！');
							}
						}
						mLog('{"count":'.$m.',"phone":'.$phones.',"message":"下一个就是最大红包，请手动点击一下链接哦！","url":"https://h5.ele.me/hongbao/#sn='.$sn.'"}','elelog');
						echo json_encode($data);
						exit;
					case 2:
						$kz=0;
						$data = message(1008,'很遗憾最大红包已经被领取,请重新换个红包！');
						mLog('{"count":null,"phone":'.$phones.',"message":"很遗憾最大红包已经被领取,请重新换个红包！","url":"https://h5.ele.me/hongbao/#sn='.$sn.'"}','elelog');
						echo json_encode($data);
						exit;
			 }
            
   		}else{
            
   			$cf=$cf+1;
   			$cf1=intval($lucky);
            
   			if($cf>=$cf1){
	   			$kz=0;
	   			$data = message(1006,'今日发放次数已达上限，请明日再来！');
	   			mLog('{"message":"服务器可用cookie不足"}','syslog');
				echo json_encode($data);
				exit;
   			}	
   		}
}while($kz==1);