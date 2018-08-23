<!DOCTYPE html>
<!-- saved from url=(0043)https://www.cy16cp.com/index/loginDemo.html -->
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta name="format-detection" content="telephone=no">
    <meta name="mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="/skin/js/jqueryui/jquery-ui-1.8.23.custom.css" type="text/css">
    <link rel="stylesheet" href="/assets/statics/css/global.css" type="text/css">
    <script src="/assets/js/plugins/jquery/jquery.min.js"></script>
    <script src="/skin/js/jqueryui/jquery-ui-1.8.23.custom.min.js"></script>
   <!-- <script src="./免费试玩_files/iscro-lot.js.下载"></script>-->

    <script>
        isLogin = false;
    </script>
    <script>
        $(function(){
            var _padding = function()
            {
                try{
                    var l = $("body>.header").height();
                    if($("body>.lott-menu").length>0)
                    {
                        l += $("body>.lott-menu").height();
                    }
                    $("#wrapper_1").css("paddingTop",l+"px");
                }catch(e){}
                try{
                    if($("body>.menu").length>0)
                    {
                        var l = $("body>.menu").height();
                    }
                    $("#wrapper_1").css("paddingBottom",l+"px");
                }catch(e){}
            };
            (function(){
                _padding();
            })();
            $(window).bind("load",_padding);
            
        });
    </script>
    <!-- hide address bar -->
    <title>免费试玩</title>
</head>
<style type="text/css">
	.login-p a{
		color: #007aff;
		font-size: 14px;
	}
</style>
<body class="login-bg">
<div class="header">
    <div class="headerTop">
        <div class="ui-toolbar-left">
            <button id="reveal-left" onclick="location.href = '/'">reveal</button>
        </div>
        <h1 class="ui-toolbar-title">免费试玩</h1>
    </div>
</div>
<div id="wrapper_1" class="scorllmain-content nobottom_bar" style="padding-top: 44px; padding-bottom: 44px;">
    <div class="sub_ScorllCont">
        <div class="login">
            <form id="login_form">
                <ul>
                    <li>
                        <span class="logi">试玩账号</span><input type="text" id="uid" name="uid" value="test366" readonly="" placeholder="请输入用户名">
                    </li>
                    <li>
                        <span class="logi">登录密码</span><input type="password" id="pwd" name="pwd" placeholder="请输入密码">
                    </li>
                </ul>
            </form>
            <button class="login-btn" id="login_btn">立即登录</button>
            <br>
            <div class="login-p"><a class="fl" href="http://www.365webcall.com/chat/mobileChatWin.aspx?h=&settings=mw7mbXbm7Pm6Xmz3APImIXz3AwwNPz3A66mmP6&LL=0&chs=&ClientID=9c62e07c-b480-4ede-be71-cbfd538a9c67&loc" target="_blank">在线客服</a><a class="fr" href="">已有账号，直接登录</a></div>
        </div>
        <div class="charge">
            <div class="charge-tips" style="color: #fe0103;">
                1.每个试玩账号初始金额为2000RMB，不允许充值；<br>
                2.每个IP每天仅允许有3个试玩账号；<br>
                3.每个试玩账号从注册开始，有效时间为72小时，超过时间系统自动回收；<br>
                4.试玩账号仅供玩家熟悉游戏，不允许充值和提款；<br>
                5.试玩账号不享有参加优惠活动的权利；<br>
                6.试玩账号的赔率仅供参考，可能与正式账号赔率不相符；<br>
                7.其他未说明事项以本公司解释为准；<br>
            </div>
        </div>
    </div>
</div>


<style>
    .center {text-align: center}
</style>

<div class="beet-odds-tips round" id="tip_pop" style="display: none; height:130px;">
    <div class="beet-odds-info f100">
        <div class="beet-money" id="tip_pop_content" style="font-size: 120%; margin-top: 15px; color:#666;">
            号码选择有误
        </div>
    </div>
    <div class="beet-odds-info text-center">
        <button class="btn-que" style="width: 100%;" onclick="tipOk()"><span>确定</span></button>
    </div>
</div>

<div id="tip_bg" class="tips-bg" style="display: none;"></div>

<script>
    var func;
    function tipOk() {
        $('#tip_pop').hide();
        $('#tip_bg').hide();
        if (/系统维护/g.test($('div#tip_pop_content').html())) {
            location.href = '/index/index.html';
            return;
        }
        if (typeof(func) == "function"){
            func();
            func = "";
        }else{
            if (typeof(doTipOk) == "function") {
                doTipOk();
            }
        }
    }
    function msgAlert (msg,funcParm) {
        $('div#tip_pop_content').html(msg);
        $('div#tip_pop').show();
        $('div#tip_bg').show();
        func = (funcParm == ""||typeof(funcParm) != "function")?'':funcParm;
    }
</script>




<script>

    $(function () {
        
            function registertest()
{
  $.ajax({
    type:"POST",
    url:"/index.php/user/registertest",
    timeout : 10000,
    dataType: "json",
    success : function(data){
      if(data.code=='0')
      {
        //alert(data.msg);
        $("#uid").val(data.name);
        $("#pwd").val("");
      }else{
        alert(data.msg);
      }

     
    },
    error: function(error) {
      alert('服务器异常');
    },
    complete:function(XHR,textStatus){
      XHR = null;
    }
  });
}
registertest();

    });
    $('#login_btn').click(function(event) {
        var uid = $('#uid').val();
        var pwd = $('#pwd').val();
        if (pwd == '') {
            msgAlert('请输入密码！');
            return;
        }
        $.ajax({
            url: '/index.php/user/editpassword',
            type: 'POST',
            dataType: 'json',
            data: {
                'username' : uid,
                'password' : pwd
            },
            timeout: 30000,
            success: function (data) {
                if (data == null || data == undefined || data == '') {
                    return false;
                }
                if (data.code=='0') {
                    location.href = '/';
                } else {
                    msgAlert('登录失败！'+data.Desc);
                }
            }
        });
    });
</script>
</body></html>