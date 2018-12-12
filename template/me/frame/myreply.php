<!DOCTYPE html>
<?php require('../../server/sql.php');if(!empty($_COOKIE['userid'])){$data = mGetAll('select * from reply where reply_id='.$_COOKIE['userid']);$data = array_reverse($data);}?>
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
		<script>document.write("<style type='text/css'>@import url('../css/mymsg.css?_=" + v + "');</style>");</script>
		<script>document.write("<script src='../../../js/mui.min.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='../../../js/jquery.js?_=" + v + "'><\/script>");</script>
	</head>
	<body>
		<header class="mui-bar mui-bar-nav">
			<h1 class="mui-title">我的回复</h1>
		</header>
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
							<?php if(!$qq==null){echo "<img class='mui-media-object mui-pull-left head-img' src='../../server/avatar.php?qq=".$qq."'/>";}else{echo "<img class='mui-media-object mui-pull-left head-img' src='../../../images/1.png'/>";}?>
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
	</body>
	<script>document.write("<script src='../js/myreply.js?_=" + v + "'><\/script>");</script>
</html>