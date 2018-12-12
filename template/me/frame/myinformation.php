<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>吃饭吧</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<script>document.write("<script src='../../../js/version.js?_=" + new Date().getTime() + "'><\/script>");</script>
		<script>document.write("<script src='../../../js/api_config.js?_=" + v + "'><\/script>");</script>	
		<script>document.write("<link rel='stylesheet' href='../../../css/mui.min.css?_=" + v + "'>");</script>
		<script>document.write("<style type='text/css'>@import url('../css/personal.css?_=" + v + "');</style>");</script>
		<script>document.write("<script src='../../../js/mui.min.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='../../../js/jquery.js?_=" + v + "'><\/script>");</script>
		<script>var uname=null;var qqnum=null;var uphone=null</script>
	</head>
	<body>
		<?php echo "<script>uname='".$_COOKIE['name']."'</script>";if(empty($_COOKIE['qq'])){echo "<script>qqnum=''</script>";}else{echo "<script>qqnum='".$_COOKIE['qq']."'</script>";}if(empty($_COOKIE['phone'])){echo "<script>uphone=''</script>";}else{echo "<script>uphone='".$_COOKIE['phone']."'</script>";}?>
		<div class="mui-content">
			<ul class="mui-table-view" style="margin-top: 25px;">
				<li class="mui-table-view-cell">
					<a id="head" class="mui-navigate-right">头像
					<span class="mui-pull-right head">
						<img class="head-img mui-action-preview" id="head-img1" src="../../activity/images/7.jpg"/>
					</span>
				</a>
				</li>
				<li class="mui-table-view-cell mui-input-row mui-ligb">
					<label style="padding-left: 0px;width: 60%;">昵称</label>
					<input class="mui-input1 dwaccount" type="text" placeholder="未设置" maxlength="10" style="padding-right: 0px;width: 40%;">
				</li>
				<li class="mui-table-view-cell mui-input-row">
					<a>账号<span class="mui-pull-right"><?php echo $_COOKIE['account'];?></span></a>
				</li>
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell mui-input-row mui-ligb">
					<label style="padding-left: 0px;width: 70%;">QQ号</label>
					<input class="mui-input1 qqdw" type="text" placeholder="未设置" maxlength="11" style="padding-right: 0px;width: 30%;" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
				</li>
				<li class="mui-table-view-cell mui-input-row  mui-ligb">
					<label style="padding-left: 0px;width: 60%;">手机号</label>
					<input class="mui-input1 dwphone" type="text" placeholder="未设置" maxlength="11" style="padding-right: 0px;width: 40%;" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
				</li>
				<li class="mui-table-view-cell mui-input-row">
					<a>邮箱地址<span class="mui-pull-right"><?php echo $_COOKIE['mail'];?></span></a>
				</li>
			</ul>
			<p class="mui-anniu">
				<button id="menu-btn" type="button" class="mui-btn mui-btn-primary mui-btn-block baocun" style="padding: 10px;">更新</button>
			</p>
		</div>
	</body>
	<script>document.write("<script src='../js/myinformation.js?_=" + v + "'><\/script>");</script>
</html>