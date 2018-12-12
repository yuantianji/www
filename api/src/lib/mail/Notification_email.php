<?php
/**发送邮件函数
 * @param $recipient 接收人邮箱
 * @param $theme 邮件标题
 * @param $content 邮件内容
 */
function notice($recipient,$theme,$content){
	$flag = sendMail($recipient,$theme,$content);
}
?>