<!DOCTYPE html>
<html>
	<head>
		<script>document.write("<script src='../../js/version.js?_=" + new Date().getTime() + "'><\/script>");</script>
		<script>document.write("<script src='../../js/api_config.js?_=" + v + "'><\/script>");</script>	
		<script>document.write("<link rel='stylesheet' href='../../css/mui.min.css?_=" + v + "'>");</script>
		<script>document.write("<style type='text/css'>@import url('css/login.css?_=" + v + "');</style>");</script>
		<script>document.write("<style type='text/css'>@import url('css/personal.css?_=" + v + "');</style>");</script>
		<script>document.write("<style type='text/css'>@import url('css/changepsw.css?_=" + v + "');</style>");</script>
		<script>document.write("<style type='text/css'>@import url('css/about.css?_=" + v + "');</style>");</script>
		<script>document.write("<style type='text/css'>@import url('css/mymsg.css?_=" + v + "');</style>");</script>
		<?php require('../server/sql.php');if(empty($_COOKIE['userid'])||!vcookie($_COOKIE['userid'])){include('./login.php');}else{include('./personal.php');}?>
		<script>document.write("<script src='../../js/mui.min.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='../../js/jquery.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='../../js/mui.view.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='js/personal.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='js/myinformation.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='js/changepsw.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='js/mymsg.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='js/myreply.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='js/login.js?_=" + v + "'><\/script>");</script>
	</head>
</html>
