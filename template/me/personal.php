<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>吃饭吧</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">

		<script>var uname=null;var qqnum=null;var uphone=null</script>
	</head>
	<body class="mui-fullscreen">
		<!--页面主结构开始-->
		<div id="app" class="mui-views">
			<div class="mui-view">
				<div class="mui-navbar">
				</div>
				<div class="mui-pages">
				</div>
			</div>
		</div>
		<!--页面主结构结束-->
		<div id="setting" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<h1 class="mui-center mui-title">设置</h1>
			</div>
			<!--go-->
			<div class="mui-content">
				<ul class="mui-table-view mui-table-view-chevron"  style="margin-top: 25px;">
					<li class="mui-table-view-cell mui-media">
						<a class="mui-navigate-right" href="#myinformation">
							<?php if(!empty($_COOKIE['qq'])){echo "<img class='mui-media-object mui-pull-left head-img' src='../server/avatar.php?qq=".$_COOKIE['qq']."'/>";}else{echo "<img class='mui-media-object mui-pull-left head-img' src='../../images/1.png'/>";}?>
							<div class="mui-media-body">
								<?php echo $_COOKIE['name'];?>
								<p class='mui-ellipsis'>账号:<?php echo $_COOKIE['account'];?></p>
							</div>
						</a>
					</li>
				</ul>
				<ul class="mui-table-view" style="margin-top: 25px;">
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right" href="#safety">账号与安全</a>
					</li>
				</ul>
				<ul class="mui-table-view"  style="margin-top: 25px;">
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right" href="#mymsg">我的留言</a>
					</li>
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right" href="#myreply">我的回复</a>
					</li>
				</ul>
				<ul class="mui-table-view" style="margin-top: 25px;">
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right" href="#about">关于CHB</a>
					</li>
				</ul>
				<ul class="mui-table-view" style="margin-top: 25px;">
					<li class="mui-table-view-cell outlogin">
						<a href="#" style="text-align: center;color: #FF3B30;">退出登录</a>
					</li>
				</ul>
			</div>
			<!--end-->
		</div>
		<!--个人信息面板-->
		<div id="myinformation" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>设置
				</button>
				<h1 class="mui-center mui-title">个人信息</h1>
			</div>
			<!--go-->
			<?php echo "<script>uname='".$_COOKIE['name']."'</script>";if(empty($_COOKIE['qq'])){echo "<script>qqnum=''</script>";}else{echo "<script>qqnum='".$_COOKIE['qq']."'</script>";}if(empty($_COOKIE['phone'])){echo "<script>uphone=''</script>";}else{echo "<script>uphone='".$_COOKIE['phone']."'</script>";}?>
			<div class="mui-content">
				<ul class="mui-table-view" style="margin-top: 25px;">
					<li class="mui-table-view-cell">
						<a id="head" class="mui-navigate-right">头像
						<span class="mui-pull-right head">
							<?php if(!empty($_COOKIE['qq'])){echo "<img class='mui-media-object mui-pull-left head-img' style='margin-right: 20px;' src='../server/avatar.php?qq=".$_COOKIE['qq']."'/>";}else{echo "<img class='mui-media-object mui-pull-left head-img' style='margin-right: 20px;' src='../../images/1.png'/>";}?>
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
			<!--end-->
		</div>
		<!--账号与安全-->
		<div id="safety" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>设置
				</button>
				<h1 class="mui-center mui-title">账号与安全</h1>
			</div>
			<!--go-->
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
						<a href="#changepsw">修改密码</a>
					</li>
				</ul>
			</div>
			<!--end-->
		</div>
		<!--修改密码-->
		<div id="changepsw" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>设置
				</button>
				<h1 class="mui-center mui-title">修改密码</h1>
			</div>
			<!--go-->
			<div class="mui-content mui-content2">
				<div class="mui-content-padded" style="padding-bottom: 50px;">
					<p style="text-indent: 22px;padding-left: 15px;">
						可以使用账号+登录密码进行登录，如果已经绑定手机号码可以使用手机号码+登录密码进行登录。
					</p>
					<div class="mui-input-row mui-ligb" style="padding-bottom: 0px;">
						<label style="padding-right: 0px;width: 30%;">账号:</label>
						<p style="padding-bottom: 0px;padding-top: 9px;font-size: 17px;"><?php echo $_COOKIE['account'];?></p>
					</div>
					<div class="mui-input-group" style="padding-bottom: 20px;margin-top: 0px;">
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
					<p style="text-indent: 22px;padding-top: 10px;margin-bottom: 0px;">密码必须是8-16位数字、字符组合。</p>
					<p style="text-indent: 22px;padding-top: 10px;padding-top: 0px;"><a style="font-size: 13px;" href="forgotten.php">忘记密码？</a></p>
				</div>
			</div>
			<!--end-->
		</div>
		<!--我的留言-->
		<div id="mymsg" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>设置
				</button>
				<h1 class="mui-center mui-title">我的留言</h1>
			</div>
			<?php $data = mGetAll('select * from message where userid='.$_COOKIE['userid']);$data = array_reverse($data);?>
			<!--go-->
			<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
				<div class="mui-scroll">
					<ul id="OA_task_1" class="mui-table-view">
					<?php foreach($data as $v){ ?>
						<li class="avatar-text mui-table-view-cell mokuai">
							<div class="mui-slider-right mui-disabled">
								<a class="mui-btn mui-btn-red">删除</a>
							</div>
							<div class="mui-slider-handle dingwei">
								<p class="ycid dwid"><?php echo $v['id']; ?></p>
								<p class="ycid dwnameid"><?php echo $v['userid']; ?></p>
								<?php if(!empty($_COOKIE['userid'])){echo "<img class='mui-media-object mui-pull-left head-img' src='../server/avatar.php?qq=".$_COOKIE['qq']."'/>";}else{echo "<img class='mui-media-object mui-pull-left head-img' src='../../images/1.png'/>";}?>
								<p class="content"><?php echo $v['username']; ?></p>
								<p class="time"><?php date_default_timezone_set('PRC');if(date('Ymd',$v['timestamp'])==date('Ymd')){echo date('H:i:s', $v['timestamp']);}else if(date('Ymd',$v['timestamp'])==date("Ymd",strtotime("-1 day"))){echo '昨天  '.date('H:i:s', $v['timestamp']);}else{echo date('Y-m-d H:i:s', $v['timestamp']);}?></p>
								<p class="wenzi"><?php echo $v['message']; ?></p>
							</div>	
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
			<!--end-->
		</div>
		<!--我的回复-->
		<div id="myreply" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>设置
				</button>
				<h1 class="mui-center mui-title">我的回复</h1>
			</div>
			<!--go-->
			<?php if(!empty($_COOKIE['userid'])){$data = mGetAll('select * from reply where reply_id='.$_COOKIE['userid']);$data = array_reverse($data);}?>
			<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
				<div class="mui-scroll">
					<ul id="OA_task_2" class="mui-table-view">
					<?php foreach($data as $v){ ?>
						<li class="avatar-text mui-table-view-cell mokuai">
							<div class="mui-slider-right mui-disabled">
								<a class="mui-btn mui-btn-red">删除</a>
							</div>
							<div class="mui-slider-handle dingwei2">
								<p class="ycid dwid2"><?php echo $v['id']; ?></p>
								<?php $qq=mGetRow('select qq from user where userid='.$v['replied_id'])['qq'];?>
								<?php $replied=mGetRow('select * from message where id='.$v['messageid']);?>
								<?php if(!$qq==null){echo "<img class='mui-media-object mui-pull-left head-img' src='../server/avatar.php?qq=".$qq."'/>";}else{echo "<img class='mui-media-object mui-pull-left head-img' src='../../images/1.png'/>";}?>
								<p class="content2 yuelan"><?php echo $replied['username'] ."发表：".$replied['message'];?></p>
								<p class="time"><?php date_default_timezone_set('PRC');if(date('Ymd',$v['timestamp'])==date('Ymd')){echo date('H:i:s', $v['timestamp']);}else if(date('Ymd',$v['timestamp'])==date("Ymd",strtotime("-1 day"))){echo '昨天  '.date('H:i:s', $v['timestamp']);}else{echo date('Y-m-d H:i:s', $v['timestamp']);}?></p>
								<p class="hfname" style="padding-left: 55px;"><?php echo $_COOKIE['name']."："; ?></p>
								<p class="fhmsg"  style="padding-left: 55px;"><?php echo $v['reply_content']; ?></p>
							</div>
						</li>
						<?php }?>
					</ul>
				</div>
			</div>
			<!--end-->
		</div>
		<!--关于CHB-->
		<div id="about" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>设置
				</button>
				<h1 class="mui-center mui-title">关于CHB</h1>
			</div>
			<!--go-->
			<div class="mui-content">
				<div class="mui-content-padded">
					<div class="qrcode">
						<img id="qrcode" src="../../images/wx.jpg" width="100%" />
						<a id="shortcut" style="width: 60%;margin: 15px auto;padding: 5px;" class="mui-hidden mui-btn mui-btn-block mui-btn-red">创建桌面图标</a>
					</div>
					<p class="pp11">CHB是一个公益的领取红包网站；
						如果你在使用过程中有什么不懂或问题欢迎通过公众号向我们反馈.</p>
					<p style="text-align: center;color: #ccc;text-indent: 0;">当前版本：<span id="version">1.0.0</span></p>	
				</div>
			</div>
			<!--end-->
		</div>
	</body>

</html>