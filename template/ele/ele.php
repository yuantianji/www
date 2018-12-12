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
		<script>document.write("<script src='../../js/version.js?_=" + new Date().getTime() + "'><\/script>");</script>
		<script>document.write("<script src='../../js/api_config.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<link rel='stylesheet' href='../../css/mui.min.css?_=" + v + "'>");</script>
		<script>document.write("<style type='text/css'>@import url('css/index.css?_=" + v + "');</style>");</script>
		<script>document.write("<script src='../../js/mui.min.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='../../js/jquery.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='../../js/clipboard.min.js?_=" + v + "'><\/script>");</script>
		<?php require('../server/sql.php');if(empty($_COOKIE['userid'])||!vcookie($_COOKIE['userid'])){echo "<script>window.onload = function(){var uPhoneValue = getCookie('Phones');document.getElementById('phone').value = uPhoneValue;}</script>";}else{echo "<script>window.onload = function(){var uPhoneValue = getCookie('phone');document.getElementById('phone').value = uPhoneValue;}</script>";}?>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav">
			<h1 class="mui-title">吃货</h1>
		</header>
		<div class="mui-content">
			<div class="mui-content-padded" >
				<?php $ff = mGetNum('select * from cookie_data where available=0');?>
				<p style="font-size:13px;text-align:left;">今日剩余发放次数：<?php echo $ff*5;?>次(不实时刷新)</p>
                <br/>
				<p style="font-size:20px;text-align:center;">有问题请向公众号反馈！</p>
				<p style="padding: 5px 20px;margin-bottom: 5px;">
					<br>
					<button id="menu-btn" type="button" class="mui-btn mui-btn-primary mui-btn-block" style="padding: 10px;">外卖红包</button>
					<script>var clipboard = new ClipboardJS('.zhifubao', {text: function () {return 'F5vqQN73q6';}});</script>
					<a id="menu-btn" href="#modal" class="mui-btn mui-btn-primary mui-btn-block" style="padding: 10px; ">新大陆</a>
					<script>var clipboard = new ClipboardJS('.shuang', {text: function () {return '';}});</script>
					<button id="menu-btn" type="button" class="mui-btn mui-btn-primary mui-btn-block shuang" style="padding: 10px; "onclick="shuang();">暂无活动</button>

				</p>
			</div>
		</div>
		<div id="menu-wrapper" class="menu-wrapper hidden">
			<div id="menu" class="menu">
				<div class="mui-content">
					<div class="mui-content-padded" style="margin: 5px;">
						<div class="mui-input-group">
							<div class="mui-input-row">
								<label>手机号码：</label>
								<input id="phone" name="phone" type="text" class="mui-input-clear" placeholder="请输入手机号码">
							</div>
							<div class="mui-input-row">
								<label>红包链接：</label>
								<input id="url" name="url" type="text" class="mui-input-clear" placeholder="请输入红包链接">
							</div>
							<div class="mui-button-row">
								<button type="submit" id="submit" class="mui-btn mui-btn-primary" onclick="check()">提交</button>
								<button type="submit" id="detection" class="mui-btn mui-btn-primary" onclick="check()">检测</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="modal" class="mui-modal">
			<header class="mui-bar mui-bar-nav">
				<a class="mui-icon mui-icon-close mui-pull-right" href="#modal"></a>
				<h1 class="mui-title">支付宝赏金赞助</h1>
			</header>
			<div class="mui-content" style="height: 100%;">
				<div class="mui-content-padded">
					<script>var clipboard = new ClipboardJS('.zhifubao2', {text: function () {return '8985373';}});</script>
					<p style="text-align: center;" >打开支付宝首页搜索“<a class="dwzfb zhifubao2" onclick="zhifubao2();">8985373</a>” 立即领红包</p>
					<p style="text-align: center;">希望小伙伴们，多多领取支付宝红包，赚点赏金续费服务器，感谢！！！</p>
					<div class="qrcode">
						<img id="qrcode" src="../../images/zfb.jpg" width="100%"/>
					</div>
				</div>			
			</div>
		</div>
		<div id="menu-backdrop" class="menu-backdrop"></div>
		<script>document.write("<script src='js/chifanba.js?_=" + v + "'><\/script>");</script>
		<script type="text/javascript">
			var menuWrapper = document.getElementById("menu-wrapper");
			var menu = document.getElementById("menu");
			var menuWrapperClassList = menuWrapper.classList;
			var backdrop = document.getElementById("menu-backdrop");
			backdrop.addEventListener('tap', toggleMenu);
			document.getElementById("menu-btn").addEventListener('tap', toggleMenu);
			var Fp = new Fingerprint();Fpcode = Fp.get();
		</script>
	</body>
</html>