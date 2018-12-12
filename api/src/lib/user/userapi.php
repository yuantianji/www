<?php

/**
 * 查询用户昵称
 * @param $userid 用户唯一ID
 * @return 返回该id的用户昵称
 */
function getusername($userid){
	$username = mGetRow("select name from user where userid=$userid;")['name'];
	return $username;
}

/**
 * 查询用户QQ
 * @param $userid 用户唯一ID
 * @return 返回该id的用户QQ
 */
function getuserqq($userid){
	$qq = mGetRow("select qq from user where userid=$userid;")['qq'];
	return $qq;
}

/**
 * 查询手机号
 * @param $userid 用户唯一ID
 * @return 返回手机号
 */
function getuserphone($userid){
	$phone = mGetRow("select phone from user where userid=$userid;")['phone'];
	return $phone;
}

/**
 * 查询手机号是否能能更改
 * @param $userid 用户唯一ID
 * @return 布尔值
 */
function getphones($userid){
	$phones = mGetRow("select phones from user where userid=$userid;")['phones'];
	if($phones==0){
		return true;
	}else{
		return false;
	}
}

/**
 * 获取用户名修改时间
 * @param $userid 用户唯一ID
 * @return 时间戳
 */
function getnames($userid){
	$names = mGetRow("select names from user where userid=$userid;")['names'];
	return $names;
}

/**
 * 获取手机号码
 * @param $account 账号
 * @param $password 密码
 * @return phone
 */
function getphone($account,$password){
	$phone = mGetRow("select phone from user where phone='$phone';")['userid'];
	return $phone;
}

/**
 * 更新用户名
 * @param $userid 用户唯一ID
 * @param $username 用户新昵称
 * @return 布尔值
 */
function upusername($userid,$username){
	$i = strval(time());
	$data1 = array('name'=>$username,'names'=>$i);
	$d1=mExec('user',$data1,'update',"userid=$userid");
	$data2 = array('username'=>$username);
	$d2=mExec('message',$data2,'update',"userid=$userid");
	if($d1 && $d2){
		return true;
	}else{
		return false;
	}
}

/**
 *更新用户QQ
 * @param $userid 用户唯一ID
 * @param $qq 用户新QQ
 * @return 布尔值
 */
function upuserqq($userid,$qq){
	$data = array('qq'=>$qq);
	return mExec('user',$data,'update',"userid=$userid");
}

/**
 *更新用户手机
 * @param $userid 用户唯一ID
 * @param $phone 用户手机号
 * @return 布尔值
 */
function upuserphone($userid,$phone){
	mDel('fingerprint',"phone=$phone");
	$data = array('phone'=>$phone,'phones'=>1);
	return mExec('user',$data,'update',"userid=$userid");
}

/**
 * 检测账号是否存在
 * @param $account 账号
 * @return 布尔值
 */
function findaccount($account){
	$acc = mGetRow("select account from user where account='$account';")['account'];
	if(!$acc){
		return true;
	}else{
		return false;
	}
}

/**
 * 检测邮箱是否存在
 * @param $mail 账号
 * @return 布尔值
 */
function findmail($mail){
	$mai = mGetRow("select mail from user where mail='$mail';")['mail'];
	if(!$mai){
		return true;
	}else{
		return false;
	}
}

/**
 * 注册账号
 * @param $account 账号
 * @param $password 密码
 * @param $mail 邮箱
 * @return 布尔值
 */
function reg($account,$password,$mail){
	$i=1;
	$k=1;
	while($i==1){
		$userid = rand(10000,99999);
		$uid = mGetRow("select userid from user where userid=$userid;")['userid'];
		if(!$uid){
			$i=0;
		}
	}
	while($k==1){
		$name = make_name(16);
		$nam = mGetRow("select name from user where name='$name';")['name'];
		if(!$nam){
			$k=0;
		}
	}
	$token = getToken();
	$data = array('userid'=>$userid,'name'=>$name,'account'=>$account,'password'=>$password,'mail'=>$mail,'token'=>$token);
	return mExec('user',$data ,'insert');	
}

/**
 * 生成随机用户名
 */
function make_name($length=16){
    $chars = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 
    'i', 'j', 'k', 'l','m', 'n', 'o', 'p', 'q', 'r', 's', 
    't', 'u', 'v', 'w', 'x', 'y','z');
    $keys = array_rand($chars, $length); 
    $name = '';
    for($i = 0; $i < $length; $i++){
        $name .= $chars[$keys[$i]];
    }
    return $name;
}

/**
 * 检测密码是否正确
 * @param $userid 用户id
 * @param $password 密码
 * @return 布尔值
 */
function getpsw($userid,$password){
	$psw = mGetRow("select password from user where userid=$userid;")['password'];
	if($psw!=$password){
		return false;	
	}else{
		return true;
	}
}

/**
 * 检测密码是否正确
 * @param $account 用账号
 * @param $password 密码
 * @return 布尔值
 */
function getpwd($account,$password){
	$psw = mGetRow("select password from user where account='$account';")['password'];
	if($psw!=$password){
		return false;	
	}else{
		return true;
	}
}

/**
 * 更新密码
 * @param $userid 用户id
 * @param $password 密码
 * @return 布尔值
 */
function uppsw($userid,$password){
	$data = array('password'=>$password);
	return mExec('user',$data,'update',"userid=$userid");
}

/**
 * 生成Token
 */
function getToken(){
    //strtoupper转换成全大写的
    $charid = strtoupper(md5(uniqid(mt_rand(), true)));
    return substr($charid, 2, 12) . substr($charid, 6, 12).substr($charid, 8, 12) . substr($charid, 12, 12)  . substr($charid, 14, 12) . substr($charid, 20, 12) . substr($charid, 22, 12);
}
/**
 * 清除cookie
 * @param $userid 用户id
 */
function delck($userid){
	$data = mGetRow("select * from user where userid=$userid;");
	setcookie('userid',$data['userid'],time()-3600*24*3650,'/',url);
	setcookie('name',$data['name'],time()-3600*24*3650,'/',url);
	setcookie('token',$data['token'],time()-3600*24*3650,'/',url);
	setcookie('phone',$data['phone'],time()-3600*24*3650,'/',url);
	setcookie('account',$data['account'],time()-3600*24*3650,'/',url);
	setcookie('qq',$data['qq'],time()-3600*24*3650,'/',url);
	setcookie('mail',$data['mail'],time()-3600*24*3650,'/',url);
	setcookie('integral',$data['integral'],time()-3600*24*3650,'/',url);
}
/**
 * 获取旧名字
 * @param $userid 用户id
 * @return 昵称
 */
function dnameck($userid){
	$data = mGetRow("select name from user where userid=$userid;")['name'];
	return $data;
}
/**
 * 获取旧手机
 * @param $userid 用户id
 * @return 手机号
 */
function dphoneck($userid){
	$data = mGetRow("select phone from user where userid=$userid;")['phone'];
	return $data;
}
/**
 * 获取旧qq
 * @param $userid 用户id
 * @return QQ号
 */
function dqqck($userid){
	$data = mGetRow("select qq from user where userid=$userid;")['qq'];
	return $data;
}
/**
 * 设置cookie
 * @param $account 账号
 * @param $password 密码
 */
function setck($account,$password){
	$data = mGetRow("select * from user where account='$account' and password='$password';");
	setcookie('userid',$data['userid'],time()+3600*24*3650,'/',url);
	setcookie('name',$data['name'],time()+3600*24*3650,'/',url);
	setcookie('token',$data['token'],time()+3600*24*3650,'/',url);
	setcookie('phone',$data['phone'],time()+3600*24*3650,'/',url);
	setcookie('account',$data['account'],time()+3600*24*3650,'/',url);
	setcookie('qq',$data['qq'],time()+3600*24*3650,'/',url);
	setcookie('mail',$data['mail'],time()+3600*24*3650,'/',url);
	setcookie('integral',$data['integral'],time()+3600*24*3650,'/',url);
}
/**
 * cookie更新
 * @param $n cookie名称
 * @param $o cookie旧值
 * @param $x cookie新值
 */
function upck($n,$o,$x){
	setcookie($n,$o,time()-3600*24*3650,'/',url);
	setcookie($n,$x,time()+3600*24*3650,'/',url);
}


/**
 * 检测账号和邮箱
 * @param $account
 * @param $mail
 * @return 正确返回密码，错误返回false
 */
function accma($account,$mail){
	$password = mGetRow("select password from user where account='$account' and mail='$mail';")['password'];
	if(!$password){
		return false;
	}else{
		return $password;
	}
}

/**md5解密
 * @param md5
 * @return 解密后的文本
 */
function md5jm($md5){
     $str = substr($md5,8,16);
	 $url = "https://api.pmd5.com/pmd5api/pmd5?pwd=$md5";
 	 $curl = curl_init();
	 curl_setopt($curl, CURLOPT_URL, $url);
	 curl_setopt($curl, CURLOPT_HEADER, 0);
	 curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
	 curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
	 curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
    
	 $data = curl_exec($curl);
	 curl_close($curl);
	 $obj=json_decode($data,true);
	 return $obj["result"][$str];
}

?>
