<!DOCTYPE html>
<html class="ui-page-login">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>吃饭吧</title>
		<script>document.write("<script src='../../js/version.js?_=" + new Date().getTime() + "'><\/script>");</script>
		<script>document.write("<script src='../../js/api_config.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<link rel='stylesheet' href='../../css/mui.min.css?_=" + v + "'>");</script>
		<script>document.write("<style type='text/css'>@import url('css/reg.css?_=" + v + "');</style>");</script>
		<script>document.write("<script src='../../js/mui.min.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='../../js/jquery.js?_=" + v + "'><\/script>");</script>
	</head>

	<body>
		<div class="mui-navbar-inner mui-bar mui-bar-nav">
			<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
				<span class="mui-icon mui-icon-left-nav"></span>登录
			</button>
			<h1 class="mui-center mui-title">注册</h1>
		</div>
		<div class="mui-content">
			<form class="mui-input-group">
				<div class="mui-input-row">
					<label>账号</label>
					<input id='account' type="text" class="mui-input-clear mui-input" placeholder="请输入账号" maxlength="16" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
				</div>
				<div class="mui-input-row">
					<label>密码</label>
					<input id='password' type="password" class="mui-input-clear mui-input" placeholder="请输入密码" maxlength="16" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
				</div>
				<div class="mui-input-row">
					<label>确认</label>
					<input id='password_confirm' type="password" class="mui-input-clear mui-input" placeholder="请确认密码" maxlength="16" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
				</div>
				<div class="mui-input-row">
					<label>邮箱</label>
					<input id='email' type="email" class="mui-input-clear mui-input" placeholder="请输入邮箱" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
				</div>
			</form>
			<div class="mui-content-padded">
				<button id='reg' class="mui-btn mui-btn-block mui-btn-primary">注册</button>
			</div>
			<div class="mui-content-padded">
				<p>账号不能含有中文。</p>
				<p>密码必须是8-16位数字、字母、字符组合(不能含有特殊符号)。</p>
			</div>
		</div>	
	</body>
	<script>document.write("<script src='js/reg.js?_=" + v + "'><\/script>");</script>
</html>