<!DOCTYPE html>
<?php require('./template/server/sql.php');$num = mGetNum('select * from message');?>
<html>
	<head>
		<meta charset="utf-8">
		<title>吃饭吧</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<script>document.write("<script src='js/version.js?_=" + new Date().getTime() + "'><\/script>");</script>
		<script>document.write("<link rel='stylesheet' href='css/mui.min.css?_=" + v + "'>");</script>
		<script>document.write("<link rel='stylesheet' type='text/css' href='css/icons-extra.css?_=" + v + "'>");</script>
		<script>document.write("<style type='text/css'>@import url('css/index.css?_=" + v + "');</style>");</script>
		<script>document.write("<script src='js/mui.min.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='js/jquery.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='js/home.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<link rel='icon' type='image/x-icon' href='./images/chifanba.ico?_=" + v + "' />");</script>
	</head>

	<body>
		<nav class="mui-bar mui-bar-tab">
			<a class="mui-tab-item mui-active" href="#tabbar">
				<span class="mui-icon mui-icon-extra mui-icon-extra-cate"></span>
				<span class="mui-tab-label">吃货</span>
			</a>
			<a class="mui-tab-item" href="#tabbar-with-chat">
				<span class="mui-icon mui-icon-chatboxes">
					<span class="mui-badge"><?php echo $num;?></span>
				</span>
				<span class="mui-tab-label">留言</span>
			</a>
			<!--<a class="mui-tab-item" href="#tabbar-with-contact">
				<span class="mui-icon mui-icon-extra mui-icon-extra-lamp"></span>
				<span class="mui-tab-label">发现</span>
			</a>-->
			<a class="mui-tab-item" href="#tabbar-with-map">
				<span class="mui-icon mui-icon-contact"></span>
				<span class="mui-tab-label">个人</span>
			</a>
		</nav>
		<div class="mui-content">
			<div id="tabbar" class="mui-control-content mui-active">
				<iframe id="iframepage1" align="center" width="100%" src="./template/ele/ele.php" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
			</div>
			<div id="tabbar-with-chat" class="mui-control-content">
				<iframe id="iframepage2" align="center" width="100%" src="./template/message/message.php" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
			</div>
			<!--<div id="tabbar-with-contact" class="mui-control-content">
				<header class="mui-bar mui-bar-nav">
					<h1 class="mui-title">发现</h1>
				</header>
				<iframe id="iframepage3" align="center" width="100%" src="./template/find/find.php" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
			</div>-->
			<div id="tabbar-with-map" class="mui-control-content">
				<iframe id="iframepage4" align="center" width="100%" src="./template/me/me.php" frameborder="no" border="0" marginwidth="0" marginheight="0" scrolling="auto"></iframe>
			</div>
		</div>
	</body>
</html>