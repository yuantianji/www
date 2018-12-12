<?php 

header('Content-type:text/html;charset=utf8');
define('ROOT' , dirname(__DIR__));
define('Recipient' , '管理员邮箱');
define('url' , '127.0.0.1');

require(ROOT . '/lib/function/thesaurus.php');
require(ROOT . '/lib/function/BasicFunc.php');
require(ROOT . '/lib/function/config.php');
require(ROOT . '/lib/function/mysql.php');

//require(ROOT . '/lib/mail/mail_encapsulation.php');
//require(ROOT . '/lib/mail/Notification_email.php');

require(ROOT . '/lib/account/Acontrol.php');

require(ROOT . '/lib/meituan/mtapi.php');

require(ROOT . '/lib/ele/TestUrl.php');
require(ROOT . '/lib/ele/eleapi.php');
require(ROOT . '/lib/ele/detection.php');

require(ROOT . '/lib/message/mesapi.php');
require(ROOT . '/lib/user/userapi.php');

?>