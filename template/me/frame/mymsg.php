<!DOCTYPE html>
<?php require('../../server/sql.php');if(!empty($_COOKIE['userid'])){$data = mGetAll('select * from message where userid='.$_COOKIE['userid']);$data = array_reverse($data);}?>
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
			<h1 class="mui-title">我的留言</h1>
		</header>
		
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
							<?php if(!empty($_COOKIE['userid'])){echo "<img class='mui-media-object mui-pull-left head-img' src='../../server/avatar.php?qq=".$_COOKIE['qq']."'/>";}else{echo "<img class='mui-media-object mui-pull-left head-img' src='../../../images/1.png'/>";}?>
							<p class="content"><?php echo $v['username']; ?></p>
							<p class="time"><?php date_default_timezone_set('PRC');if(date('Ymd',$v['timestamp'])==date('Ymd')){echo date('H:i:s', $v['timestamp']);}else if(date('Ymd',$v['timestamp'])==date("Ymd",strtotime("-1 day"))){echo '昨天  '.date('H:i:s', $v['timestamp']);}else{echo date('Y-m-d H:i:s', $v['timestamp']);}?></p>
							<p class="wenzi"><?php echo $v['message']; ?></p>
						</div>	
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
	</body>
	<script>document.write("<script src='../js/mymsg.js?_=" + v + "'><\/script>");</script>
</html>