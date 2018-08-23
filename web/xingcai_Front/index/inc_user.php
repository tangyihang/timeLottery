

<link href="/css/nsc/reset.css" rel="stylesheet" type="text/css" />
<!-- <link href="/css/nsc/warp.css?v=1.16.11.9" rel="stylesheet" type="text/css" /> -->
<link href="/css/nsc/foot.css" rel="stylesheet" type="text/css" />

<!--link href="/css/nsc/lottery.css" rel="stylesheet" type="text/css" /-->


</head>
<body>
	<div class="warpBg" >
		<div class="warp" style="display:none;">
	<div class="top">
	<div class="lot_info right" id="user_baseinfo" >
	<div class="welcome left">
		<span class="username right" id="user_username"><?=$this->user['username']?></span>
		<span class="welcome_msg right" id="user_welcomeinfo">欢迎您，</span>
	</div>
	<div class="top_msg left re">
		<a href="/index.php/box/receive" icon="usermsg" title="用户消息" class="msg_icon" id="userMessage" target="_blank"></a>
		<span class="msg_num"><a href="/index.php/box/receive" target="_blank"><?php $this->display('index/inc_msg.php');?></a></span>	</div>
	<div class="top_skin left re"><i class="ic-skin t_skin"></i></div>
	<div class="logout left">
		<a href="javascript:loginout()">退出</a>
	</div>
	<!--<div class="obligate left">
		预留信息:<a class="edit" href="/?controller=user&action=main&tag=changename" target="_blank"></a>
	</div>-->
    </div>
	<div class="logo left" style="width:140px; background-size: 106px;background-position: 20px;"><a href="">大地彩票</a></div>

	<div class="left nav navList" style="display:none;">
		<ul>
			<li><a href="/">首页</a></li>
			<li class="cpyx re"><a href="javascript:void(0);">彩票游戏</a>
				<div class="nav_child">
				  	<dl>
						<dt>高频彩</dt>
								<dd><a href="/index.php/index/game/86/2/12/三分时时彩" >三分时时彩</a></dd>
                                <dd><a href="/index.php/index/game/1/2/12/重庆时时彩">重庆时时彩</a></dd>
                                <dd><a href="/index.php/index/game/20/27/北京PK拾">北京PK拾</a></dd>
                                <dd><a href="/index.php/index/game/80/104/339/幸运28" >幸运28</a></dd><dd></dd>
                                <dd><a href="/index.php/index/game/83/104/339/北京28" >北京28</a></dd><dd></dd>
                                <dd><a href="/index.php/index/game/85/27/三分PK10" >三分PK10</a></dd>
                                <dd><a href="/index.php/index/game/87" style="color: red;">上海时时乐</a></dd>
                                <dd><a href="/index.php/index/game/60/2/12/天津时时彩">天津时时彩</a></dd>
                                <dd><a href="/index.php/index/game/12/2/12/新疆时时彩">新疆时时彩</a></dd>
                                <dd><a href="/index.php/index/game/79/39/江苏快三">江苏快三</a></dd>
                                <dd><a href="/index.php/index/game/81/39/安徽快三" >安徽快三</a></dd>
                                <dd><a href="/index.php/index/game/82/39/广西快三" >广西快三</a></dd>
                                <dd><a href="/index.php/index/game/7/10/山东11选5">山东11选5</a></dd>
                                <dd><a href="/index.php/index/game/15/10/上海11选5">上海11选5</a></dd>
                                <dd><a href="/index.php/index/game/16/10/江西11选5">江西11选5</a></dd>
                                <dd><a href="/index.php/index/game/6/10/广东11选5">广东11选5</a></dd>
								
                            </dl>
                            <dl>
                               <!-- <dt >快乐八&PK拾</dt>
                                <dd><a data="L-9" href="/index.php/index/game/78/北京快乐8">北京快乐8<i class="new"></i></a></dd>
								<dd><a data="L-9" href="/index.php/index/game/73/澳门快乐8">澳门快乐8</a></dd>
								<dd><a data="L-9" href="/index.php/index/game/74/韩国快乐8">韩国快乐8</a></dd>
								<dd><a data="L-24" href="/index.php/index/game/20/27/北京PK拾">北京PK拾<i class="new"></i></a></dd>
								<dd><a data="L-23" href="/index.php/index/game/66/27/台湾PK拾">台湾PK拾<i class="new"></i></a></dd>
								<dd><a data="L-23" href="/index.php/index/game/65/27/澳门PK拾">澳门PK拾<i class="new"></i></a></dd> -->
								<dt>低频彩</dt>
                                <dd><a data="L-8"  href="/index.php/index/game/34/香港⑥合彩" style="color: red;">香港⑥合彩</a></dd>
                                <dd><a data="L-7"  href="/index.php/index/game/9/3D福彩">福彩3D</a></dd>
                                <dd><a data="L-5"  href="/index.php/index/game/10/排列3">排列3</a></dd>
                            </dl>
                            <dl> 
							<!-- 
                                <dt>乐透彩</dt>
                                <dd><a data="L-8" href="/index.php/index/game/15/上海11选5">上海11选5</a></dd>
                                <dd><a data="L-8" href="/index.php/index/game/6/广东11选5">广东11选5<i class="hot"></i></a></dd>
                                <dd><a data="L-7" href="/index.php/index/game/16/江西11选5">江西11选5</a></dd>
                                <dd><a data="L-5" href="/index.php/index/game/7/山东11选5">山东11选5</a></dd>
								<dd><a data="L-5" href="/index.php/index/game/67/澳门11选5">澳门11选5<i class="hot"></i></a></dd>
								<dd><a data="L-5" href="/index.php/index/game/68/台湾11选5">台湾11选5<i class="new"></i></a></dd> -->
                            </dl>
                            <dl >
                                <!--<dt>低频彩</dt>
                                <dd><a data="L-11" href="/index.php/index/game/9/3D福彩">3D福彩<i class="hot"></i></a></dd>
                                <dd><a data="L-12" href="/index.php/index/game/10/排列3">排列3</a></dd>
								<dd><a data="L-20" href="/index.php/index/game/34/香港六合彩">香港六合彩<i class="new"></i></a></dd>-->
							</dl>
							<dl>
                                <!--<dt>快三&幸运农场</dt>
                                <dd><a data="L-15" href="/index.php/index/game/79/江苏快三">江苏快三<i class="new"></i></a></dd>
                                <dd><a data="L-11" href="/index.php/index/game/63/澳门快三">澳门快三</a></dd>
								<dd><a data="L-12" href="/index.php/index/game/71/澳门幸运农场">澳门幸运农场</a></dd>
								<dd><a data="L-12" href="/index.php/index/game/64/台湾快三">台湾快三<i class="hot"></i></a></dd>
								<dd><a data="L-12" href="/index.php/index/game/72/台湾幸运农场">台湾幸运农场<i class="new"></i></a></dd>-->
                            </dl>
				</div>
			</li>
		
			<li><a href="javascript:void(0);">账户管理</a>
				<div class="nav_child nav_child2">
							<p><a onclick="Xgo(this)" attr-href="/index.php/record/search" icon="yxbb">投注记录</a></p>
                            <p><a onclick="Xgo(this)" attr-href="/index.php/report/coin" data="T-bdkh" icon="bdkh">帐变记录</a></p>
                            <p><a onclick="Xgo(this)" attr-href="/index.php/report/count" data="T-czxx" icon="czxx">盈亏报表</a></p>
							<p><a onclick="Xgo(this)" attr-href="/index.php/safe/passwd" data="T-mmaq" icon="mmaq">密码安全</a></p>
							<p><a onclick="Xgo(this)" attr-href="/index.php/safe/info" data="T-bdkh" icon="bdkh">绑定卡号</a></p>
				</div>
			</li>
			<?php if($this->user['type']){ ?>
						<li><a href="javascript:void(0);">团队管理</a>
				<div class="nav_child nav_child2">
							<p><a onclick="Xgo(this)" attr-href="/index.php/team/memberList" data="T-tdbb" icon="tdbb">会员列表</a></p>
							<p><a onclick="Xgo(this)" attr-href="/index.php/team/gameRecord" data="T-zcgl" icon="zcgl">团队记录</a></p>
							<p><a onclick="Xgo(this)" attr-href="/index.php/team/coin" data="T-bdkh" icon="bdkh">团队帐变</a></p>
                            <p><a onclick="Xgo(this)" attr-href="/index.php/team/report" data="T-yhlb" icon="yhlb">团队盈亏</a></p>
                            <p><a onclick="Xgo(this)" attr-href="/index.php/team/addlink" data="T-tgsd" icon="tgsd">推广设定</a></p>
				</div>
			</li>
			    <?php } ?>
						<li><a href="javascript:void(0);">活动公告</a>
				<div class="nav_child nav_child2">
							<p><a href="/index.php/score/rotate">热门活动</a></p>
							<p><a onclick="Xgo(this)" attr-href="/index.php/cash/card">点卡充值</a></p>
                            <p><a class="notice" href="javascript:void(0)" url="/index.php/notice/info">系统公告</a></p>				
				</div>
			</li>
		</ul>
	</div>
</div>

</div>

<script type="text/javascript" src="/js/loginserver.js?v=0.8.5.7"></script>
</body>
</html>
