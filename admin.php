<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>吃饭吧</title>
        <meta HTTP-EQUIV="pragma" CONTENT="no-cache"> 
		<meta HTTP-EQUIV="Cache-Control" CONTENT="no-cache, must-revalidate"> 
		<meta HTTP-EQUIV="expires" CONTENT="0">
        <meta content="telephone=no" name="format-detection">
		<meta name="viewport" content="width=device-width,initial-scale=1.0,maximum-scale=1.0,user-scalable=0">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<script>document.write("<script src='js/version.js?_=" + new Date().getTime() + "'><\/script>");</script>
		<script>document.write("<script src='js/api_config.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='js/jquery.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<link rel='stylesheet' href='css/mui.min.css?_=" + v + "'>");</script>
		<script>document.write("<style type='text/css'>@import url('css/index.css?_=" + v + "');</style>");</script>

		
		<script>document.write("<script src='js/mui.min.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='js/clipboard.min.js?_=" + v + "'><\/script>");</script>
		
		<script>document.write("<link rel='icon' type='image/x-icon' href='../images/chifanba.ico?_=" + v + "' />");</script>

	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<h1 class="mui-title">贡献Cookie</h1>
		</header>
		<div class="mui-content">
			<div class="mui-content-padded" >
				<p style="padding: 5px 20px;margin-bottom: 5px;">
						<div class="mui-input-row" style="margin: 10px 5px;">
							<textarea id="textarea" rows="10" placeholder="输入完整的饿了么Cookie"></textarea>
						</div>
					<button id="menu-btn" type="button" class="mui-btn mui-btn-primary mui-btn-block" style="padding: 10px;">贡献Cookie</button>
					<button id="menu-btn1" type="button" class="mui-btn mui-btn-primary mui-btn-block" style="padding: 10px;">检测失效Cookie</button>
				<div id="info"><span id="results"></span></div>
			</div>
		</div>
 		<script>
			mui.init({
				swipeBack:true
			});
			 $('#menu-btn').click(function(){var tcookie=$('#textarea').val();$.ajax({type: "POST",url: addcookie_api, dataType: "JSON", data: {"cookie":tcookie,"operate":13},success:function(data){mui.toast(data.msg);$("#textarea").val("");},});})
			 $('#menu-btn1').click(function(){$.ajax({type: "POST",url: failcookie_api,dataType: "JSON", data: {"operate":14},success:function(data){if(data.indexOf("code")==-1){data = data.replace(/"/g,"");data = data.replace("[","");data = data.replace("]","");var d = data.split(',');var i = '';for(var j=0,len=d.length;j<len;j++){i=i+'序号:'+(j+1)+',ID:'+d[j]+"\n";}$("#textarea").val(i);}else{mui.alert(data.msg, '温馨提示');};},});})
 		</script>
	</body>
</html>