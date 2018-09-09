
<!-- saved from url=(0091)http://www.cy16cp.com/index/common.html#_url_%3D%2Fgame%2Fcqssc.html%3F_isOpenWin%3Dlottery -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8"><link href="/files/white_lobby_menu.css" rel="stylesheet"><!-- menu -->
<style>/*file_path :   cai99\templates\default\login\lobby_common.php */

.live-logo {
	cursor: pointer;
	margin: 20px 0 23px 15px;
	background: url(/images/nsc/new.png) center no-repeat;
	width: 211px;
	height: 70px;
}


/*** 够彩大厅弹窗里面右下角，所有走势图页面的背景***/

#i_list_2 iframe {
	background-color: #F8F6F6;
}</style>



    
    <meta name="renderer" content="webkit">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1">
    <meta name="viewport" content="width=device-width,height=device-height,initial-scale=1.0,maximum-scale=1,minimum-scale=1,user-scalable=yes">
    <!--<link rel="shortcut icon" type="image/x-icon" href="http://www.cy16cp.com/fhcp/statics/images/favicon.ico" media="screen">-->
    <!-- logo -->
    <link href="/files/jquery.mCustomScrollbar.css" rel="stylesheet"><!-- 滚动条插件 -->
    <link href="/files/style.css" rel="stylesheet"><!-- fonts icon -->
    <link href="/files/_tip.css" rel="stylesheet">
    <title id="__html_title_">重庆时时彩</title>
    <script src="/files/jquery-1.11.2.min.js"></script>
	<script type="text/javascript" src="/js/nsc/main.js"></script>
    <script>function refreshMoney() {
	$.ajax({
		type: 'GET',
		url: '/index.php/safe/userInfo',
		timeout: 10000,
		success: function(data) {
			autoRefresh = true;
			if(data == "error") {
				$("#balance").html("正在读取资金");
				return false;
			} else {
				if(isNaN(data)) {
					alert("获取余额失败，您的登录可能已经过期，请重新登录");
					location.href = "/";
					return false;
				} else {
					$("#balance").html((data).substr(0, 14)).attr("title", (data));
					return true;
				}
			}
		},
		error: function() {
			$("#balance").html("正在读取资金");
		},
		complete: function(XHR, textStatus) {
			XHR = null;
		}
	});
}
setInterval("refreshMoney()", "10000");

function CULS() {
	$.ajax({
		type: 'GET',
		url: '/index.php/index/getUserInfo',
		timeout: 10000,
		dataType: "json",
		success: function(data) {
			// console.log(data);
			if(!data || data == "null") {
				//alert("您还未登陆,请先登录!");
				$("#header_user_login").show();
				$("#header_user").hide();
			} else {
				$("#header_user_login").hide();
				$("#header_user").show();

			}

		},
		error: function() {
			alert('服务器异常');
		},
		complete: function(XHR, textStatus) {
			XHR = null;
		}
	});
}
$(function() {
	CULS();
	refreshMoney();
	$("div[name='div_top_click']").click(function() {
		$("div[name=\"div_top_click\"]").hide();
		//$("img[name=\"login_img\"]").attr('src', '/index.php/user/vcode/1498379763');

	});
})</script>
    <script type="text/javascript" src="/skin/js/jquery-1.8.3.min.js"></script>
    <script src="/files/_user_.js.下载"></script>
    <script src="/files/lobby_common.js"></script>
    <script src="/newskin/js/common.js"></script>

    <script src="/files/lobby_common.js"></script>
    <link href="/css/nsc/plugin/dialogUI/dialogUI.css" media="all" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="/js/nsc/dialogUI/jquery.dialogUI.js"></script>
    <script type="text/javascript" src="/skin/layer/layer.js"></script>
    <script>jQuery(function() {
	//下面保证iframe的高度和浏览器一模一样
	(function() {
		function frameHeight() {
			var bodyHeight = document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.scrollHeight;
			jQuery("#iframeDivList").css("height", (bodyHeight - $("#_lottery_menu_head").height()) + "px");
			if($("#_body_div").height() != bodyHeight) {
				$("#_body_div").css("height", bodyHeight + "px");
			}
		}
		frameHeight();
		jQuery(window).bind('resize', function() {
			frameHeight();
		})
	})();
});</script>
    <script>window.url_Arr = [];

function goIframe() {
	var arr = decodeURIComponent(window.location.hash).split("#_url_=");
	try {
		if(arr.length <= 1 && arr[0] == "") {
			arr[1] = "/index.php/index/hall/";
		}
	} catch(e) {}
	if(arr.length <= 1) {
		return;
	}
	var url = arr[1];
	var idStr = "";
	for(var q = 0; q < url_Arr.length; q++) {
		if(url + "-" == url_Arr[q]) {
			idStr = "iframe" + (1 + q);
		}
	}
	if(idStr == "") {
		url_Arr.push(url + "-");
		idStr = "iframe" + url_Arr.length;
	}
	var sandboxStr = "allow-top-navigation allow-scripts allow-same-origin allow-popups allow-same-origin allow-popups-to-escape-sandbox allow-modals allow-presentation";
	if(url.indexOf("/index/lobby.html") >= 0 || url.indexOf("%2Findex%2Flobby.html") >= 0) { //够彩大厅主页
		$("#__iframe_list_  .div_iframe").css("display", "none");
		if($("#i_list_1").find("iframe").length == 0) {
			$("#_tip_loading_").css("display", "block");
			$("#i_list_1").html('<iframe id="' + idStr + '" name="' + idStr + '" scrolling="no" marginwidth="0px" marginwidth="0px" frameborder="0"  samless   ></iframe>'); // sandbox=\"'+sandboxStr+'\"
			$("#" + idStr).attr("src", url);
			if(typeof(document.getElementById(idStr).onload) != "undefined") {
				$(document.getElementById(idStr)).bind("load", function() {
					$("#_tip_loading_").css("display", "none");
					try {
						$("title").text($("title", document.getElementById(idStr).contentWindow.document).text());
					} catch(e) {
						try {
							console.log(e);
						} catch(e) {}
						document.title = document.getElementById(idStr).contentWindow.document.title;
					}
				});
			} else {
				$("#_tip_loading_").css("display", "none");
			}
		}
		$("#i_list_1").css("display", "block");
		try {
			$("title").text($("title", $("#i_list_1>iframe").get(0).contentWindow.document).text());
		} catch(e) {
			try {
				console.log(e);
			} catch(e) {}
			document.title = $("#i_list_1>iframe").get(0).contentWindow.document.title;
		}
	} else { //不是够彩大厅主页
		if($("#i_list_2 #" + idStr).length == 0) { //如果从未加载过当前url的iframe
			//重新加载....
			// sandbox=\"'+sandboxStr+'\"
			$("#i_list_2").empty(); //to remove unessarry request avoid ajax override
			$("#i_list_2").append('<div class="div_iframe" name="iframe"  style=\"display:none;\"><iframe id="' + idStr + '" src="" scrolling="yes" marginwidth="0px" marginwidth="0px" frameborder="0"  samless></iframe></div>');
			var flag = false;
			try {
				$("#" + idStr).attr("src", url);
				if(typeof(document.getElementById(idStr).onload) != "undefined") {
					$("#_tip_loading_").css("display", "block");
					$(document.getElementById(idStr)).bind("load", function() {
						$("#__iframe_list_  .div_iframe,#_tip_loading_").css("display", "none");
						$("#i_list_2").css("display", "block");
						$("#i_list_2  #" + idStr).parent().css("display", "block");
						try {
							$("title").text($("title", document.getElementById(idStr).contentWindow.document).text());
						} catch(e) {
							try {
								console.log(e);
							} catch(e) {}
							document.title = document.getElementById(idStr).contentWindow.document.title;
						}
					});
					flag = true;
				}
			} catch(e) {
				console.log(e);
				flag = false;
			}
			if(flag === false) {
				$("#__iframe_list_  .div_iframe,#_tip_loading_").css("display", "none");
				$("#i_list_2").css("display", "block");
				$("#i_list_2  #" + idStr).parent().css("display", "block");
			}
		} else { //如果已加载过当前url的iframe
			$("#__iframe_list_  .div_iframe").css("display", "none");
			$("#i_list_2").css("display", "block");
			$("#i_list_2  #" + idStr).parent().css("display", "block");
			try {
				$("title").text($("title", $("#" + idStr).get(0).contentWindow.document).text());
			} catch(e) {
				try {
					console.log(e);
				} catch(e) {}
				document.title = $("#" + idStr).get(0).contentWindow.document.title;
			}
		}
	}
}
window.onhashchange = function() {
	goIframe();
};
jQuery(function() {
	goIframe();
});

//显示购彩大厅的全部彩种
function fresh_all_lottery() {

	if($("#i_list_1>iframe").length > 0) {
		try {
			__openWin('lottery_hall', '/index.php/index/hall/');
		} catch(e) {}
		$($("#i_list_1>iframe").get(0).contentWindow.document).find("#ele-live-wrap div .ele-live-layout").show();
	} else {
		try {
			__openWin('lottery_hall', '/index.php/index/hall/');
		} catch(e) {}
	}
}</script>
</head>
<body>
<!-- 下面是预加载的loading效果 -->
<div id="_tip_loading_" style="display: none;">
   <div>
       <img src="/files/loading.gif"><br>
       <span>加载中,请稍后</span>
   </div>
</div><!-- end:  '#_tip_loading_'  -->
<!-- 这里是页面正文开始 -->
<div id="_body_div" class="main-wrap clearfix" style="width:100%;">
    <!-- 以下是 menu -->
    <div id="live-menu-wrap" class="live-menu-wrap clearfix">
        <div class="live-logo"></div>
        <div>
            <!-- 左边的彩种 menu -->
   <div id="live-main-list" class="live-main-list">
                <div class="live-nav">
        <div onclick="fresh_all_lottery()" class="main-tit" >
          <i class="icon-hall-icon"></i>
          <span class="lot-text">购彩大厅</span></div>
        <i class="icon-refresh-icon" onclick="fresh_all_lottery()" ></i>
      </div>
      <div id="hot_lottery" class="live-nav" style="top: 0px;">
        <div class="main-tit">
          <i class="icon-attr-down icon-attr-up"></i>
          <a>
            <i class="icon-star-icon"></i>
            <span class="lot-text">热门彩种</span></a>
        </div>
        <ul>
          <li class="nav-li lot51" data-sort="1">
            <a id="hot_main-item-51" class="nav-btn cur-btn" data-argsid="51" title="三分时时彩" onclick="__openWin('lottery_hall','/index.php/index/game/86/2/12/三分时时彩')">
              <i>
              </i>
              <span class="lot-text">三分时时彩</span></a>
          </li>
          <li class="nav-li lot5" data-sort="2">
            <a id="hot_main-item-5" class="nav-btn cur-btn" data-argsid="5" title="重庆时时彩" onclick="__openWin('lottery_hall','/index.php/index/game/1/2/12/重庆时时彩')">
              <i>
              </i>
              <span class="lot-text">重庆时时彩</span></a>
          </li>
          <li class="nav-li lot9" data-sort="3">
            <a id="hot_main-item-9" class="nav-btn cur-btn" data-argsid="9" title="北京PK拾" onclick="__openWin('lottery_hall','/index.php/index/game/20/27/北京PK拾')">
              <i>
              </i>
              <span class="lot-text">北京PK拾</span></a>
          </li>
          <li class="nav-li lot42" data-sort="4">
            <a id="hot_main-item-42" class="nav-btn cur-btn" data-argsid="42" title="幸运28" onclick="__openWin('lottery_hall','/index.php/index/game/80/104/339/幸运28')">
              <i>
              </i>
              <span class="lot-text">幸运28</span></a>
          </li>
          <li class="nav-li lot52" data-sort="5">
            <a id="hot_main-item-52" class="nav-btn cur-btn" data-argsid="52" title="三分PK拾" onclick="__openWin('lottery_hall','/index.php/index/game/85/27/三分PK10')">
              <i>
              </i>
              <span class="lot-text">三分PK拾</span></a>
          </li>
          <li class="nav-li lot18" data-sort="6">
            <a id="hot_main-item-18" class="nav-btn cur-btn" data-argsid="18" title="香港⑥合彩" onclick="__openWin('lottery_hall','/index.php/index/game/34/香港⑥合彩')">
              <i>
              </i>
              <span class="lot-text">香港⑥合彩</span></a>
          </li>
        </ul>
      </div>
      <div id="high_lottery" class="live-nav" style="top: 0px;">
        <div class="main-top">
          <i class="icon-attr-down icon-attr-up"></i>
          <a>
            <i class="icon-time-icon"></i>
            <span class="lot-text">高频彩</span></a>
        </div>
        <ul class="gao-ul">
          <li id="shishicai_ul">
            <div id="shishicai_" class="nav-li lot7">
              <span class="icon-attr-down"></span>
              <a class="nav-btn">
                <i>
                </i>
                <span class="lot-text">时时彩</span></a>
            </div>
            <ul hidden="">
              <li class="nav-li lot51" data-sort="1">
                <a id="main-item-51" class="nav-btn cur-btn" data-argsid="51" title="三分时时彩" onclick="__openWin('lottery_hall','/index.php/index/game/86/2/12/三分时时彩')">
                  <i>
                  </i>
                  <span class="lot-text">三分时时彩</span></a>
              </li>
              <li class="nav-li lot5" data-sort="2">
                <a id="main-item-5" class="nav-btn cur-btn" data-argsid="5" title="重庆时时彩" onclick="__openWin('lottery_hall','/index.php/index/game/1/2/12/重庆时时彩')">
                  <i>
                  </i>
                  <span class="lot-text">重庆时时彩</span></a>
              </li>
              <li class="nav-li lot9" data-sort="3">
                <a id="main-item-9" class="nav-btn cur-btn" data-argsid="9" title="北京PK拾" onclick="__openWin('lottery_hall','/index.php/index/game/20/27/北京PK拾')">
                  <i>
                  </i>
                  <span class="lot-text">北京PK拾</span></a>
              </li>
              <li class="nav-li lot52" data-sort="5">
                <a id="main-item-52" class="nav-btn cur-btn" data-argsid="52" title="三分PK拾" onclick="__openWin('lottery_hall','/index.php/index/game/85/27/三分PK10')">
                  <i>
                  </i>
                  <span class="lot-text">三分PK拾</span></a>
              </li>
              <!--<li class="nav-li lot3" data-sort="100">
                <a id="main-item-3" class="nav-btn cur-btn" data-argsid="3" title="上海时时乐" onclick="__openWin('lottery_hall','/index.php/index/game/87')">
                  <i>
                  </i>
                  <span class="lot-text">上海时时乐</span></a>
              </li>
              <li class="nav-li lot4" data-sort="100">
                <a id="main-item-4" class="nav-btn cur-btn" data-argsid="4" title="天津时时彩" onclick="__openWin('lottery_hall','/index.php/index/game/60/2/12/天津时时彩')">
                  <i>
                  </i>
                  <span class="lot-text">天津时时彩</span></a>
              </li>
              <li class="nav-li lot7" data-sort="100">
                <a id="main-item-7" class="nav-btn cur-btn" data-argsid="7" title="新疆时时彩" onclick="__openWin('lottery_hall','/index.php/index/game/12/2/12/新疆时时彩')">
                  <i>
                  </i>
                  <span class="lot-text">新疆时时彩</span></a>
              </li>-->
            </ul>
          </li>
          <!--<li id="kuaisan_ul">
            <div id="kuaisan_" class="nav-li lot10">
              <span class="icon-attr-down"></span>
              <a class="nav-btn">
                <i>
                </i>
                <span class="lot-text">快三</span></a>
            </div>
            <ul hidden="">
              <li class="nav-li lot10" data-sort="100">
                <a id="main-item-10" class="nav-btn cur-btn" data-argsid="10" title="江苏快三" onclick="__openWin('lottery_hall','/index.php/index/game/79/39/江苏快三')">
                  <i>
                  </i>
                  <span class="lot-text">江苏快三</span></a>
              </li>
              <li class="nav-li lot17" data-sort="100">
                <a id="main-item-17" class="nav-btn cur-btn" data-argsid="17" title="广西快三" onclick="__openWin('lottery_hall','/index.php/index/game/82/39/广西快三')">
                  <i>
                  </i>
                  <span class="lot-text">广西快三</span></a>
              </li>
              <li class="nav-li lot11" data-sort="100">
                <a id="main-item-11" class="nav-btn cur-btn" data-argsid="11" title="安徽快三" onclick="__openWin('lottery_hall','/index.php/index/game/81/39/安徽快三')">
                  <i>
                  </i>
                  <span class="lot-text">安徽快三</span></a>
              </li>
            </ul>
          </li>-->
          <!--<li id="shiyixuanwu_ul">
            <div id="shiyixuanwu_" class="nav-li lot12">
              <span class="icon-attr-down"></span>
              <a class="nav-btn">
                <i>
                </i>
                <span class="lot-text">11选5</span></a>
            </div>
            <ul hidden="">
              <li class="nav-li lot12" data-sort="100">
                <a id="main-item-12" class="nav-btn cur-btn" data-argsid="12" title="山东11选5" onclick="__openWin('lottery_hall','/index.php/index/game/7/10/山东11选5')">
                  <i>
                  </i>
                  <span class="lot-text">山东11选5</span></a>
              </li>
              <li class="nav-li lot13" data-sort="100">
                <a id="main-item-13" class="nav-btn cur-btn" data-argsid="13" title="上海11选5" onclick="__openWin('lottery_hall','/index.php/index/game/15/10/上海11选5')">
                  <i>
                  </i>
                  <span class="lot-text">上海11选5</span></a>
              </li>
              <li class="nav-li lot14" data-sort="100">
                <a id="main-item-14" class="nav-btn cur-btn" data-argsid="14" title="江西11选5" onclick="__openWin('lottery_hall','/index.php/index/game/16/10/江西11选5')">
                  <i>
                  </i>
                  <span class="lot-text">江西11选5</span></a>
              </li>
              <li class="nav-li lot15" data-sort="100">
                <a id="main-item-15" class="nav-btn cur-btn" data-argsid="15" title="广东11选5" onclick="__openWin('lottery_hall','/index.php/index/game/6/10/广东11选5')">
                  <i>
                  </i>
                  <span class="lot-text">广东11选5</span></a>
              </li>
            </ul>
          </li>-->
          <li id="pcdd_ul">
            <div id="pcdd_" class="nav-li lot41-1">
              <span class="icon-attr-down"></span>
              <a class="nav-btn">
                <i>
                </i>
                <span class="lot-text">PC蛋蛋</span></a>
            </div>
            <ul hidden="">
              <li class="nav-li lot42" data-sort="4">
                <a id="main-item-42" class="nav-btn cur-btn" data-argsid="42" title="幸运28" onclick="__openWin('lottery_hall','/index.php/index/game/80/104/339/幸运28')">
                  <i>
                  </i>
                  <span class="lot-text">幸运28</span></a>
              </li>
              <li class="nav-li lot41" data-sort="100">
                <a id="main-item-41" class="nav-btn cur-btn" data-argsid="41" title="北京28" onclick="__openWin('lottery_hall','/index.php/index/game/83/104/339/北京28')">
                  <i>
                  </i>
                  <span class="lot-text">北京28</span></a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
      <div id="low_lottery" class="live-nav" style="top: 0px;">
        <div class="main-top">
          <i class="icon-attr-down icon-attr-up"></i>
          <a>
            <i class="icon-down-icon"></i>
            <span class="lot-text">低频彩</span></a>
        </div>
        <ul class="gao-ul">
          <li class="nav-li lot18" data-sort="6">
            <a id="main-item-18" class="nav-btn cur-btn" data-argsid="18" title="香港⑥合彩" onclick="__openWin('lottery_hall','/index.php/index/game/34/香港⑥合彩')">
              <i>
              </i>
              <span class="lot-text">香港⑥合彩</span></a>
          </li>
          <!--<li class="nav-li lot1" data-sort="100">
            <a id="main-item-1" class="nav-btn cur-btn" data-argsid="1" title="福彩3D" onclick="__openWin('lottery_hall','/index.php/index/game/9/3D福彩')">
              <i>
              </i>
              <span class="lot-text">福彩3D</span></a>
          </li>
          <li class="nav-li lot2" data-sort="100">
            <a id="main-item-2" class="nav-btn cur-btn" data-argsid="2" title="排列三" onclick="__openWin('lottery_hall','/index.php/index/game/10/排列3')">
              <i>
              </i>
              <span class="lot-text">排列三</span></a>
          </li>-->
        </ul>
      </div>
 

</div>

        </div>
    </div>
    <!-- 以下LAYOUT -->
    <div id="live-main-wrap" class="live-main-wrap" style="width: 1712px; min-height: 884px;">
        <!-- 购彩大厅 -->
        <div id="showhide-wrap" style="display: block;">
            <!-- 网页正文的头部 -->
            <div id="_lottery_menu_head" class="new-header">
                <div name="hide">
                    <div class="bull" id="sys_tip_outer">
                    	<span class="icon-acc"></span>
                    	<!-- 这里是跑马灯<marquee>标签，由js加入dom  -->
                	<marquee id="sys_tip" behavior="scroll"><?=$this -> settings['webGG'] ?></marquee></div>
                    <div id="header_user" class="header-user" >
                        <div class="user-name">账号：<span id="user_name" name="user_name"><?=$this -> user['username'] ?></span></div>
						<div class="user-money" >余额：<span id="balance">￥</span><div class="money-btn"><button class="recharge" onclick="__openWin('user_center','/index.php/safe/c38_cz')">充值</button><button class="withdraw" onclick="topay1();">提现</button><button class="withdraw" onclick="loginout();" style="display:none;">退出</button></div></div>
						<div class="user-center" ><ul><li onclick="__openWin('user_center','/index.php/safe/tuiguang')"><a><i class="icon-7"></i>会员中心</a></li><li onclick="__openWin('user_center','/index.php/record/search')"><a><i class="icon-3"></i>下注记录</a></li><li onclick="zxkf('<?= $this -> settings['kefuGG'] ?>');"><a><i class="icon-4"></i>在线客服</a></li><li onclick="__openWin('user_center','/index.php/box/receive')"><a><i class="icon-Shape-47"></i>消息中心</a></li></ul></div>
                    </div>
                    <div id="header_user_login" >
                        <div class="lottery_login"><div class="top-login-bg"><i class="icon-6"></i><input class="top_loginip" id="username" name="username" type="text" placeholder="请输入用户名"></div>
						<div class="top-login-bg"><i class="icon-lock-icon"></i><input class="top_loginip" name="passwd" id="password" type="password" placeholder="请输入密码"></div>
                            <div class="need_captcha">
                                <div class="top_click" name="div_top_click">点击输入验证码</div>
                                <div class="yanzhengma">
                                    <div class="top-login-bg2">
                                        <input class="top_loginmm" id="authnum" name="authnum" maxlength="4" type="text" placeholder="验证码">
                                        <span class="register_captcha_span">
                                            <img name="login_img" class="login_img"  src="/index.php/user/vcode/1498379763" title="点击刷新" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()"/>
                                            <!--<img name="login_img" class="login_img" src="/seccode/makecode.html?nchash=&amp;t=0.03188619167448414">-->
                                        </span>
                                    </div>

                                </div>
                            </div>
                            <input class="lottery_anniu" type="button" name="login" onclick="userLogin_t()" value="登录">
                            <input class="lottery_anniu" type="button" onclick="opRegDIV()" value="注册">
                            <input class="lottery_anniu" type="button" onclick="opFreePalyDIV()" value="免费试玩">

                        </div>
                        <div class="download">
                            <a class="icon-appleinc" onclick="__openWin('home_phone',_static_const.download_Iphone)"></a>
                            <a class="icon-android" onclick="__openWin('home_phone',_static_const.download_Android)"></a>
                            <span class="down-text" onclick="__openWin('home_phone',_static_const.download_Iphone)">手机APP下载</span>
                        </div>
                    </div>
                </div>
                <button></button>
            </div>
            <!-- 正文开始 -->
            <div id="iframeDivList" class="iframeDivList" style="height: 896px;">
                <!-- iframe  name 禁止相同,该页面的id不可重新定义，不可在其他页面出现 -->
                <div id="__iframe_list_" style="display:block;">
                    <div id="i_list_1" class="div_iframe" name="iframe" style="display: none;">
                        <!-- 够彩大厅主页 -->
                    </div>
                    <div id="i_list_2" class="div_iframe" style="display: block;">
					<!-- <div class="div_iframe" name="iframe" style="display: block;"><iframe id="iframe1" src="http://c38.mycppost.com/index.php/index/game/86/2/12/三分时时彩" scrolling="no" marginwidth="0px" frameborder="0" samless=""></iframe></div> -->
					</div>
                </div><!-- end:  '#__iframe_list_'  -->
            </div>
        </div>
    </div>
</div>


<script src="/files/jquery.mCustomScrollbar.concat.min.js"></script><!-- 滚动条插件 -->
<script src="/files/tool_scroll_lobby.js"></script><!-- 自适应浏览器尺寸，滚动条插件 -->
<script>	function parentSay() {
	/*刷新资金*/
	//登陆
	function userLogin_t() {
		var username=$("#username").val();
		var password=$("#password").val();
		var vcode=$("#authnum").val();
		if(username=='') {
			alert('请输入用户名');
			return
		}
		if(password=='') {
			alert('请输入登录密码');
			return
		}
		if(vcode=='') {
			alert('请输入验证码');
			return
		}
		var user= {
			username: username, password: password, vcode: vcode
		}
		;
		$.ajax( {
			type: 'POST', url: '/index.php/user/ajaxlogined', // timeout : 10000,
			data: user, dataType: "json", success: function(data) {
				if(data.code > 0) {
					alert(data.msg);
				}
				else {
					parent.culs=true;
					var user_baseinfo=parent.$("#user_baseinfo");
					if(user_baseinfo) {
						$("a[name=user_name]").html(data.data.username);
						parent.$("#user_username").html(data.data.username);
						//reloadMemberInfo();
					}
					else {
						$("a[name=user_name]").html(data.data.username);
						parent.$("#user_username").html(data.data.username);
						//reloadMemberInfo();
					}
					$("#wdtg").hide();
					alert('登录成功');
					culs=true;
					$("#header_user_login").hide();
					$("#header_user").show();
					//parent.layer.closeAll();
					$("#user_name").text(data.data.name);
					$("#balance").text(data.data.coin);
				}
			}
			, error: function(e) {
				console.log(e);
			}
			, complete: function(XHR, textStatus) {
				XHR=null;
			}
		}
		);
	}
	function topay1() {
		layer.open( {
			type: 2, area: ['1000px', '600px'], //fixed: false, //不固定
			title: '提现', scrollbar: false, //屏蔽滚动条
			//maxmin: true,
			content: '/index.php/cash/toCash'
		}
		);
		return false;
	}</script>
</body></html>