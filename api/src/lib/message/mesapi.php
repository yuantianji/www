<?php
/**
 * 检测用户是否存在
 * @param userid 用户唯一ID
 * @return 布尔值
 */
function checkuid($userid){
	$uid = mGetRow("select userid from user where userid=$userid;")['userid'];
	if(!$uid){
		return false;
	}else{
		return true;
	}
}


/**
 * 发表留言
 * @param uesrid 用户唯一ID
 * @param message 留言内容
 * @return 布尔值
 */
function addpublish($userid,$message){
	$i = strval(time());
	$username = mGetRow("select name from user where userid=$userid;")['name'];
	$data = array('username'=>$username,'message'=>$message,'userid'=>$userid,'timestamp'=>$i);
	$val = mExec('message',$data ,'insert');
	return $val;
}


/**
 * 删除留言
 * @param uesrid 用户唯一ID
 * @param message 留言内容
 * @return 布尔值
 */
function delpublish($id){
	mDel('reply',"messageid=$id");
	return mDel('message',"id=$id");
}
/**
 * 回复
 * @param messageid 回复内容id
 * @param uesrid 回复人id
 * @param repliedid 被回复人id
 * @param message 回复内容
 * @return 布尔值
 */
function addreply($messageid,$userid,$repliedid,$message){
	$i = strval(time());
	$data = array('messageid'=>$messageid,'reply_id'=>$userid,'replied_id'=>$repliedid,'reply_content'=>$message,'timestamp'=>$i);
	$val = mExec('reply',$data ,'insert');
	return $val;
}

/**
 * 删除回复
 * @param messageid 回复内容id
 * @param uesrid 回复人id
 * @param repliedid 被回复人id
 * @param message 回复内容
 * @return 布尔值
 */
function delreply($id){
	return mDel('reply',"id=$id");
}

?>