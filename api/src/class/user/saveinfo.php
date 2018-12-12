<?php
if($_POST['operate']!=5){
	$data = array('code'=>6000,'msg'=>'操作异常！');
	echo json_encode($data);
	exit;
}
if(empty($_COOKIE['userid'])||!vcookie($_COOKIE['userid'])){
	$data = array('code'=>400,'msg'=>'登录失效！');
	echo json_encode($data);
	exit;
}

$userid=$_COOKIE['userid'];

$username = $_POST['username'];
$qq = $_POST['qq'];
$phone = $_POST['phone'];

if(!checkuid($userid)){
	$data = array('code'=>4003,'msg'=>'用户不存在！');
	echo json_encode($data);
	exit;
}

if($phone==""){
	$data = array('code'=>5000,'msg'=>'请输入绑定的手机号码！');
	echo json_encode($data);
	exit;
}

if($username==""){
	$data = array('code'=>5000,'msg'=>'昵称不能为空！');
	echo json_encode($data);
	exit;
}

if(mb_strlen($username,'utf8')>10){
	$data = array('code'=>5000,'msg'=>'昵称过长，请重新输入！');
	echo json_encode($data);
	exit;
}
if(sensitive($username)){
	$data = array('code'=>5000,'msg'=>'您的昵称中含有敏感词！');
	echo json_encode($data);
	exit;
}
if(mb_strlen($phone,'utf8')!=11){
    $data = array('code'=>5000,'msg'=>'请输入绑定的手机号码！');
	echo json_encode($data);
	exit;
}

$oldname = base64_encode(dnameck($userid));
$oldphone = dphoneck($userid);
$oldqq = dqqck($userid);

if($username==getusername($userid)){
	if($qq==getuserqq($userid)){
		if($phone==getuserphone($userid)){
			$data = array('code'=>5003,'msg'=>'没有任何修改！');
			echo json_encode($data);
			exit;
		}else{
			if(!getphones($userid)){
				$data = array('code'=>5010,'msg'=>'手机号绑定后不可以更改！');
				echo json_encode($data);
				exit;
			}else if(upuserphone($userid,$phone)){
				upck('phone',$oldphone,$phone);
				$data = array('code'=>0,'msg'=>'更新成功！');
				echo json_encode($data);
				exit;
			}else{
				$data = array('code'=>5011,'msg'=>'更新失败！');
				echo json_encode($data);
				exit;
			}
		}
	}else{
		if($phone==getuserphone($userid)){
			if(!upuserqq($userid,$qq)){
				$data = array('code'=>5004,'msg'=>'更新失败！');
				echo json_encode($data);
				exit;
			}else{
				upck('qq',$oldqq,$qq);
				$data = array('code'=>0,'msg'=>'更新成功！');
				echo json_encode($data);
				exit;
			}
		}else{
			if(!getphones($userid)){
				$data = array('code'=>5010,'msg'=>'手机号绑定后不可以更改！');
				echo json_encode($data);
				exit;
			}else if(upuserphone($userid,$phone)){
				upck('phone',$oldphone,$phone);
				if(!upuserqq($userid,$qq)){
					$data = array('code'=>5004,'msg'=>'更新失败！');
					echo json_encode($data);
					exit;
				}else{
					upck('qq',$oldqq,$qq);
					$data = array('code'=>0,'msg'=>'更新成功！');
					echo json_encode($data);
					exit;
				}
			}else{
				$data = array('code'=>5011,'msg'=>'更新失败！');
				echo json_encode($data);
				exit;
			}
		}

	}
}else{
	$names=getnames($userid);
	if($names==0){
		if(!upusername($userid,$username)){
			$data = array('code'=>5004,'msg'=>'更新失败！');
			echo json_encode($data);
			exit;
		}
	}else{
		$t1 = intval($names);
		$t2 = intval(time());
		$t3 = $t1 + 604800;
		if($t3-$t1<0){
			if(!upusername($userid,$username)){
				$data = array('code'=>5004,'msg'=>'更新失败！');
				echo json_encode($data);
				exit;
			}
		}else{
			$data = array('code'=>5004,'msg'=>'昵称在'.Sec2Time($t3-$t2).'后可更改！');
			echo json_encode($data);
			exit;
		}
	}
	upck('name',$oldname,$username);
	if($qq!=getuserqq($userid)){
		if(!upuserqq($userid,$qq)){
			$data = array('code'=>5004,'msg'=>'更新失败！');
			echo json_encode($data);
			exit;
		}
		upck('qq',$oldqq,$qq);
		if($phone!=getuserphone($userid)){
			if(!getphones($userid)){
				$data = array('code'=>5010,'msg'=>'手机号绑定后不可以更改！');
				echo json_encode($data);
				exit;
			}else if(upuserphone($userid,$phone)){
				upck('phone',$oldphone,$phone);
				$data = array('code'=>0,'msg'=>'更新成功！');
				echo json_encode($data);
				exit;
			}else{
				$data = array('code'=>5011,'msg'=>'更新失败！');
				echo json_encode($data);
				exit;
			}
		}else{
			$data = array('code'=>0,'msg'=>'更新成功！');
			echo json_encode($data);
			exit;
		}
	}else if($phone!=getuserphone($userid)){
			if(!getphones($userid)){
				$data = array('code'=>5010,'msg'=>'手机号绑定后不可以更改！');
				echo json_encode($data);
				exit;
			}else if(upuserphone($userid,$phone)){
				upck('phone',$oldphone,$phone);
				$data = array('code'=>0,'msg'=>'更新成功！');
				echo json_encode($data);
				exit;
			}else{
				$data = array('code'=>5011,'msg'=>'更新失败！');
				echo json_encode($data);
				exit;
			}
	}else{
		$data = array('code'=>0,'msg'=>'更新成功！');
		echo json_encode($data);
		exit;
	}
}
?>