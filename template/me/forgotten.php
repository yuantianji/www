<!DOCTYPE html>
<html class="ui-page-login">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>吃饭吧</title>
		<script>document.write("<script src='../../js/version.js?_=" + new Date().getTime() + "'><\/script>");</script>
		<script>document.write("<script src='../../js/api_config.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<link rel='stylesheet' href='../../css/mui.min.css?_=" + v + "'>");</script>
		<script>document.write("<style type='text/css'>@import url('css/forpsw.css?_=" + v + "');</style>");</script>
		<script>document.write("<script src='../../js/mui.min.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='../../js/jquery.js?_=" + v + "'><\/script>");</script>
	</head>
	<body>
		<div class="mui-navbar-inner mui-bar mui-bar-nav">
			<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
				<span class="mui-icon mui-icon-left-nav"></span>返回
			</button>
			<h1 class="mui-center mui-title">忘记密码</h1>
		</div>
		<div class="mui-content">
			<form class="mui-input-group">
				<div class="mui-input-row">
					<label>账号</label>
					<input id='account' type="text" class="mui-input-clear mui-input" placeholder="请输入账号"  maxlength="16" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
				</div>             	
				<div class="mui-input-row">
					<label>邮箱</label>
					<input id='email' type="email" class="mui-input-clear mui-input" placeholder="请输入注册邮箱" onkeyup="value=value.replace(/[^\x00-\xff]|[\n\s*\r]/ig,'')">
				</div>
			</form>
			<div class="mui-content-padded">
				<button id='sendMail' class="mui-btn mui-btn-block mui-btn-primary">提交</button>
			</div>
		</div>
	</body>
	<script>document.write("<script src='js/forgotten.js?_=" + v + "'><\/script>");</script>
</html>