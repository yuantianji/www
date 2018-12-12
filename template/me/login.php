<!DOCTYPE html>
<?php if(empty($_COOKIE['userid'])||!vcookie($_COOKIE['userid'])){}else{include('./personal.php');}?>
<html class="ui-page-login">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>吃饭吧</title>

	</head>
	<body>
		<div class="mui-navbar-inner mui-bar mui-bar-nav">
			<h1 class="mui-center mui-title">登录</h1>
		</div>
		<div class="mui-content">
			<form id='login-form' class="mui-input-group">
				<div class="mui-input-row">
					<label>账号</label>
					<input id='account' type="text" class="mui-input-clear mui-input dwzhanghao" placeholder="请输入账号" maxlength="16" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
				</div>
				<div class="mui-input-row">
					<label>密码</label>
					<input id='password' type="password" class="mui-input-clear mui-input dwmima" placeholder="请输入密码" maxlength="16" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
				</div>
			</form>
			<div class="mui-content-padded">
				<button id='login' type="button" class="mui-btn mui-btn-block mui-btn-primary dwlogin">登录</button>
				<div class="link-area"><a id='reg' href="reg.php">注册账号</a> <span class="spliter">|</span> <a id='forgetPassword' href="forgotten.php">忘记密码</a>
				</div>
			</div>
			<div class="mui-content-padded oauth-area">

			</div>
		</div>
	</body>

</html>
