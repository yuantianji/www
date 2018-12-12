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
		<script>document.write("<style type='text/css'>@import url('../css/changepsw.css?_=" + v + "');</style>");</script>
		<script>document.write("<script src='../../../js/mui.min.js?_=" + v + "'><\/script>");</script>
		<style type="text/css">
			html,
			body {
				background-color: #efeff4;
			}
		</style>
	</head>

	<body>
		<div class="mui-content2">
			<div class="mui-content-padded" style="padding-bottom: 50px;">
				<p style="text-indent: 22px;padding-left: 15px;">
					可以使用账号+登录密码进行登录，如果已经绑定手机号码可以使用手机号码+登录密码进行登录。
				</p>
				<div class="mui-input-row mui-ligb" style="padding-bottom: 0px;">
					<label style="padding-right: 0px;width: 30%;">账号:</label>
					<p style="padding-bottom: 0px;padding-top: 9px;font-size: 17px;"><?php echo $_COOKIE['account'];?></p>
				</div>
				<div class="mui-input-group" style="padding-bottom: 20px;">
					<div class="mui-input-row mui-ligb">
						<label style="padding-right: 0px;width: 30%;">原密码:</label>
						<input class="yuanmima" type="password" placeholder="填写原密码" style="padding-right: 0px;width: 70%;" maxlength="16" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
					</div>
					<div class="mui-input-row">
						<label  style="padding-right: 0px;width: 30%;">新密码:</label>
						<input class="xinmima" type="password" placeholder="填写新密码" style="padding-right: 0px;width: 70%;" maxlength="16" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
					</div>
					<div class="mui-input-row">
						<label  style="padding-right: 0px;width: 30%;">确认密码:</label>
						<input class="xinmima2" type="password" placeholder="再次填写确认" style="padding-right: 0px;width: 70%;" maxlength="16" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
					</div>
					<div class="mui-button-row" style="padding-top: 15px;padding-bottom: 10px;">
						<button type="button" id="confirm" class="mui-btn mui-btn-primary dwxiugai">修改</button>
					</div>
				</div>
				<p style="text-indent: 22px;padding-top: 10px;">
					密码必须是8-16位数字、字符组合(不能含有特殊符号)
				</p>
			</div>
		</div>		
	</body>
	<script>document.write("<script src='../js/changepsw.js?_=" + v + "'><\/script>");</script>
</html>
