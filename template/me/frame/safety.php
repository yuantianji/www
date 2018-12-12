<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>吃饭吧</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<script>document.write("<script src='../../../js/version.js?_=" + new Date().getTime() + "'><\/script>");</script>
		<script>document.write("<link rel='stylesheet' href='../../../css/mui.min.css?_=" + v + "'>");</script>
		<script>document.write("<style type='text/css'>@import url('../css/personal.css?_=" + v + "');</style>");</script>
		<script>document.write("<script src='../../../js/mui.min.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='../../../js/jquery.js?_=" + v + "'><\/script>");</script>
		</head>
	<body>
		<div class="mui-content">
			<ul class="mui-table-view" style="margin-top: 25px;">
				<li class="mui-table-view-cell">
					<a>昵称<span class="mui-pull-right"><?php echo $_COOKIE['name'];?></span></a>
				</li>
				<li class="mui-table-view-cell">
					<a>账号<span class="mui-pull-right"><?php echo $_COOKIE['account'];?></span></a>
				</li>
			</ul>
			<ul class="mui-table-view">
				<li class="mui-table-view-cell">
					<a href="changepsw.php">修改密码</a>
				</li>
			</ul>
		</div>
	</body>
</html>