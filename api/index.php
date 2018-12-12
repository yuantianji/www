<?php
require('./src/lib/init.php');
header("Access-Control-Allow-Origin:http://chifanba.applinzi.com");
/**operate 操作说明
 * 参数 1：红包领取
 * 参数 2：红包检测
 * 参数 3：发送回复
 * 参数 4：发送留言
 * 参数 5：更新个人资料
 * 参数 6：注册账号
 * 参数 7：登录账号
 * 参数 8：更改密码
 * 参数 9：删除回复
 * 参数 10：删除留言
 * 参数 11：退出登录
 * 参数 12：忘记密码
 * 参数 13:添加cookie
 * 参数 14:检测cookie
 */

if(empty($_POST['operate'])||$_POST['operate']>14){
	$data = array('code'=>400,'msg'=>'操作异常！');
	echo json_encode($data);
	exit;
}

switch($_POST['operate']){
	case 1:
		require('./src/class/red/receive.php');
		break;
	case 2:
		require('./src/class/red/explore.php');
		break;
	case 3:
		require('./src/class/message/reply.php');
		break;
	case 4:
		require('./src/class/message/message.php');
		break;
	case 5:
		require('./src/class/user/saveinfo.php');
		break;
	case 6:
		require('./src/class/user/reg.php');
		break;
	case 7:
		require('./src/class/user/login.php');
		break;
	case 8:
		require('./src/class/user/changepsw.php');
		break;
	case 9:
		require('./src/class/message/reply.php');
		break;
	case 10:
		require('./src/class/message/message.php');
		break;
	case 11:
		require('./src/class/user/outlogin.php');
		break;
	case 12:
		require('./src/class/user/forgotten.php');
		break;
	case 13:
		require('./src/class/cookie/addcookie.php');
		break;
	case 14:
		require('./src/class/cookie/failcookie.php');
		break;
}
?>