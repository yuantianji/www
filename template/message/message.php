<!DOCTYPE html>
<!--<?php require('../server/sql.php');$data = mGetAll('select * from message');$data = array_reverse($data);$num = mGetNum('select * from message');?>-->
<html>
	<head>
		<meta charset="utf-8">
		<title>吃饭吧</title>
		<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="apple-mobile-web-app-status-bar-style" content="black">
		<script>document.write("<script src='../../js/version.js?_=" + new Date().getTime() + "'><\/script>");</script>
		<script>document.write("<script src='../../js/api_config.js?_=" + v + "'><\/script>");</script>	
		<script>document.write("<link rel='stylesheet' href='../../css/mui.min.css?_=" + v + "'>");</script>
		<script>document.write("<style type='text/css'>@import url('css/index.css?_=" + v + "');</style>");</script>
		<script>document.write("<script src='../../js/mui.min.js?_=" + v + "'><\/script>");</script>
		<script>document.write("<script src='../../js/jquery.js?_=" + v + "'><\/script>");</script>
		<?php echo '<script>var num='.$num.'</script>';?>
	</head>

	<body>
		<header class="mui-bar mui-bar-nav">
			<h1 class="mui-title">留言</h1>
		</header>
		<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
			<div class="mui-scroll">
				<div class="title">
					<div>
	                    <marquee direction="left" behavior="scroll" scrollamount="5" scrolldelay="0" loop="-1" hspace="10" vspace="10">
	                        <font color="#FF0000">此处禁止发送敏感话题</font>
	                    </marquee> 
                   </div>
					<div class='liuyan'>
						<li><p id='ly'><?php echo $num;?>条留言</p></li>
                    	<li><a id='xly' href="#">写留言</a></li>
					</div>
                   	<div id='lymb' style="margin: 1px 1px;">
						<textarea class="liuyanneirong" id="textarea" rows="3" placeholder="输入留言内容"></textarea>
						<button class="fasong">发送</button>
						<button class="quxiao">取消</button>
					</div>
				</div>
				<ul class="mui-table-view mui-table-view-chevron">
					<?php $i=0;foreach($data as $v){ ?>
					<li class="avatar-text mokuai">
						<div class="dingwei">
							<p class="ycid dwid"><?php echo $v['id']; ?></p>
							<p class="ycid dwnameid"><?php echo $v['userid']; ?></p>
							<?php $qqq = mGetRow('select qq from user where userid='.$v['userid'])['qq'];?>
							<?php if($qqq){echo "<img class='mui-media-object mui-pull-left head-img pic' src='../server/avatar.php?qq=".$qqq."'/>";}else{echo "<img class='mui-media-object mui-pull-left head-img pic' src='../../images/1.png'/>";}?>
							<p class="content"><?php echo $v['username']; ?></p>
							<p class="time"><?php date_default_timezone_set('PRC');if(date('Ymd',$v['timestamp'])==date('Ymd')){echo date('H:i:s', $v['timestamp']);}else if(date('Ymd',$v['timestamp'])==date("Ymd",strtotime("-1 day"))){echo '昨天  '.date('H:i:s', $v['timestamp']);}else{echo date('Y-m-d H:i:s', $v['timestamp']);}?></p>
							<p class="wenzi"><?php echo $v['message']; ?></p>
						</div>
						<?php $data1 = mGetAll('select * from reply where messageid='.$v['id']);if($data1!=""){foreach($data1 as $k){?>
						<div class="hfnr">
							<p class="ycid"><?php echo $k['messageid']; ?></p>
							<p class="hfname"><?php echo mGetRow('select name from user where userid='.$k['reply_id'])['name']."："; ?></p>
							<p class="fhmsg"><?php echo $k['reply_content']; ?></p>
						</div>
						<?php }}?>
						<div class="hfmb">
							<textarea class="huifu" id="textarea" rows="1" cols="10" placeholder="回复"></textarea>
							<button class="fas">发送</button>
							<button class="qux">取消</button>
						</div>
					</li>
					<?php }?>
				</ul>
			</div>
		</div>
		<script>document.write("<script src='js/message.js?_=" + v + "'><\/script>");</script>
	</body>
</html>