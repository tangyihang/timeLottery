<?php $this->display('C38_header.php'); ?>
   <script type="text/javascript">
	    //added by kent 2016 09.01
	    $(document).ready(function () {
	        $('#lotterysList').hide();
	        $('#lotterys').mouseover(function () {
	            $('#lotterysList').show();
	        }).mouseout(function () {
	            $('#lotterysList').hide();
	        });
	        //added by ian
	        $('#lottery-list-box').on('mouseover', '.allGames', function (e) {
	            var tag = $(this).data('type');
	            $(this).addClass('allGames-on').siblings('li').removeClass('allGames-on').find('.moreGames').css({'display': 'none'});
	            $('#moreGames_' + tag).css({'display': 'block'});
	            $('#lotterysList').addClass('lotterys-list-hd-border1');
	            $(this).find('.icon').hide();
	            $(this).find('.line-fff').show();
	        });
	        $('#lottery-list-box').on('mouseout', '.allGames', function (e) {
	            $(this).removeClass('allGames-on').find('.moreGames').css({'display': 'none'});
	            $('#lotterysList').removeClass('lotterys-list-hd-border1');
	            $(this).find('.icon').show();
	            $(this).find('.line-fff').hide();
	        });
			var p_num=(window.location.pathname).slice(26);
			$("#xcode_reg").val(p_num);
	    });
	

	</script>


   
    
    <link href="/files/reg.css" rel="stylesheet" type="text/css">
    <link href="/files/color_reg.css" rel="stylesheet" type="text/css">


    <div class="wrap-bg" style="min-height: 587px;">
        <div class="wrapper">
		
			<div class="reg" id="userreg">
            <div class="reg-tit">
                <div class="fr">已有账号？<a class="orange"  onclick="dl()">立即登录</a></div><h3>用户注册</h3>
            </div>
            <div class="reg-info" id="reg_form_1">
                <ul>
                    <li>
                        <div class="info-left"><span class="red">* </span>用户名：</div>
                        <div class="info-right">
                            <input name="username" id="username_reg" class="reg-int" type="text"  maxlength="16">
                            <input type='hidden' name='formhash' value='CYJFYYJ2EXdKtGix2DIdFXImB5XDNmn' />                        </div>
                        <div class="info-txt" id="_tips">用户名须为4-16个字母或数字</div>
                    </li>
                    <li>
                        <div class="info-left"><span class="red">* </span>密码：</div>
                        <div class="info-right"><input name="passwd" id="passwd_reg"  class="reg-int" type="password"  maxlength="12"></div>
                        <div class="info-txt">密码须为6-12个同时包含字母或数字的组合</div>
                    </li>

                    <li>
                        <div class="info-left"><span class="red">* </span>确认密码：</div>
                        <div class="info-right"><input class="reg-int" maxlength="12" autocomplete="off" type="password" name="conpasswd" id="conpasswd"></div>
                    </li>
					
					                     <li>
                        <div class="info-left"><span class="red">* </span>QQ号</div>
                        <div class="info-right"><input name="QQ" id="QQ_reg"   class="reg-int" type="text"  maxlength="12"></div>
                        <div class="info-txt"></div>
                    </li>
					
                     <li >
                        <div class="info-left" ><span class="red">* </span>推荐码</div>
                        <div class="info-right"><input name="xcode" id="xcode_reg"  value="" class="reg-int" type="text"  maxlength="12"></div>
                        <div class="info-txt"></div>
                    </li>
                    <li>
                        <div class="info-left"><span class="red">* </span>验证码：</div>
                        <div class="info-right info-codes" style="position:relative;">
                            <div class="top_click" name="div_top_click"> </div>
                            <input name="verify" id="verify" class="codes-int " type="text" tabindex="4" autocomplete="off" maxlength="4"/>
                            <div id="need_captcha" class="reg_need_captcha">
                                <div class="yanzhengma">
                                    <span class="register_captcha_span" style="position:relative;">
                                       <img name="login_img" title="点击刷新" class="login_img" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()">
                                       <a name="btn_refresh" style="display:none;"><img src=""></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="info-left">&nbsp;</div>
                        <div class="info-right"><input type="checkbox" name="reg_checkbox" checked="checked"/>我已看过并同意<a class="orange" target="_self" onClick="" width="1000" height="653" border="0">《喜羊羊彩网络服务协议》</a></div>
                    </li>
                    <li>
                        <div class="info-left">&nbsp;</div>
                        <div class="info-right"><input id="btn-sub" onclick="reg()" type="button" class="submit" value="立即注册"></div>
                    </li>
                </ul>
            </div>
        </div>
        </div>
    </div>
<div class="jc-footer">
    <div class="footer-cn js-lazy">
        <div class="cnRight">
            <div class="cnTop">
                <!--logo区-->
                <div class="cn-list service">
                    <i class="sprite sprite-end_logo"></i>
                </div>
               <div class="cn-list">
                    <h3>&nbsp;&nbsp;账户相关</h3>
                    <ul>
                        <li><a href="/index.php/index/help?page=detail#help-1" title="">如何注册账号</a></li>
                        <li><a href="/index.php/index/help?page=detail#help-3" title="">怎么找回登录密码</a></li>
                        <li><a href="/index.php/index/help?page=detail#help-37" title="">如何修改手机号码</a></li>
                        <li><a href="/index.php/index/help?page=detail#help-26" title="">如何修改真实姓名</a></li>
                    </ul>
                </div>
                <div class="cn-list">
                    <h3>&nbsp;&nbsp;充值购彩</h3>
                    <ul>
                        <li><a href="/index.php/index/help?page=detail#help-tit3" title="">如何进行充值</a></li>
                        <li><a href="/index.php/index/help?page=detail#help-tit4" title="">如何购买彩票</a></li>
                        <li><a href="/index.php/index/help?page=detail#help-9" title="">如何查询购彩记录</a></li>
                        <li><a href="/index.php/index/help?page=detail#help-tit3" title="">充值没到账怎么办</a></li>
                    </ul>
                </div>
                <div class="cn-list">
                    <h3>&nbsp;&nbsp;兑奖提款</h3>
                    <ul>
                        <li><a href="/index.php/index/help?page=detail#help-10">怎样进行兑奖</a></li>
                        <li><a href="/index.php/index/help?page=detail#help-12">如何进行提款</a></li>
                        <li><a href="/index.php/index/help?page=detail#help-13">提款是否收手续费</a></li>
                        <li><a href="/index.php/index/help?page=detail#help-16">提款不成功怎么办</a></li>
                    </ul>
                </div>
                <div class="cn-list service">
                    <h3>&nbsp;&nbsp;APP下载</h3>
                    
                    <div class="app-down">
                        
                        <div class="down-img" id="img-apple1">
                            <img src="/files/getIosPng.html">
                        </div>
                        <div class="down-img" id="img-andoid1" style="display: none">
                            <img src="/files/getAndroidPng.html">     
                        </div>
                        <div class="down-txt">
                            <!-- <a class="down-apple1">Iphone版</a>
                            <a class="down-andoid1">Android版</a> -->
                            <p class="phine_ban_p" id="ba-apple1">Iphone版</p>
                            <p class="phine_ban_p" id="ba-andoid1" style="display: none;">Android版</p>
                            <p>手机投注 随时随地</p>
                            <a class="down-apple1 down_now"><i class="icon-appleinc"></i></a>
                            <a class="down-andoid1"><i class="icon-android"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="foot_box">
        <div class="about_box">
            <p>2009-2017©<span>喜羊羊彩 | </span> 客服邮箱：cai1688vip@gmail.com<!-- 客服QQ：201716002 | 流量统计 -->
            <br><span class="c-grey">喜羊羊彩郑重提示：彩票有风险，投注需谨慎！ 不向未满18周岁的青少年出售彩票</span></p>
            <ul class="foot_info">
                <li class="foot_wljc"></li>
                <li class="foot_wangan"></li>
                <li class="foot_wsjy"></li>
                <li class="foot_xylh"></li>
                <li class="foot_kxwz"></li>
            </ul>
            <div class="clear"></div>
        </div>
    </div>
<div class="clear nospace"></div>
</div>
<!-- 更新浏览器 -->
<div class="ie-alert-wrap" style="display: none;">
    <h1>是时候升级你的浏览器了</h1>
    <p>你正在使用 Internet Explorer 的早期版本（IE9以下版本 或使用该内核的浏览器）。这意味着在升级浏览器前，你将无法访问此网站。</p>
    <hr>
    <h2>请注意：Windows XP 及 Internet Explorer 早期版本的支持已经结束</h2>
    <p>自 2016 年 1 月 12 日起，Microsoft 不再为 IE 11 以下版本提供相应支持和更新。没有关键的浏览器安全更新，您的 PC 可能易受有害病毒、间谍软件和其他恶意软件的攻击，它们可以窃取或损害您的业务数据和信息。请参阅 <a href="https://www.microsoft.com/zh-cn/WindowsForBusiness/End-of-IE-support">微软对 Internet Explorer 早期版本的支持将于 2016 年 1 月 12 日结束的说明</a> 。</p>
    <hr>
    <h2>更先进的浏览器</h2>
    <p>推荐使用以下浏览器的最新版本。如果你的电脑已有以下浏览器的最新版本则直接使用该浏览器访问<b id="referrer"></b>即可。</p>
    <ul class="browser">
      <li class="browser-chrome"><a href="http://www.google.cn/chrome/browser/index.html?hl=zh-CN&amp;standalone=1" target="_blank"> 谷歌浏览器<span>Google Chrome</span></a></li>
      <li class="browser-360"><a href="http://se.360.cn/" target="_blank"> 360安全浏览器 <span>360用户推荐</span></a></li> <!-- 2016-08-06 -->
      <li class="browser-firefox"><a href="http://www.firefox.com.cn/" target="_blank"> 火狐浏览器<span>Mozilla Firefox</span></a></li>
      <li class="browser-ie"><a href="http://windows.microsoft.com/zh-cn/internet-explorer/download-ie" target="_blank"> IE浏览器<span>Internet Explorer</span></a></li>
      <li class="browser-qq"><a href="http://browser.qq.com/" target="_blank"> QQ浏览器9 <span>全新升级版本</span></a></li> <!-- 9.4.8187.400 -->
      
      <div class="clean"></div>
    </ul>
    <hr>
    <h2>为什么会出现这个页面？</h2>
    <p>如果你不知道升级浏览器是什么意思，请请教一些熟练电脑操作的朋友。如果你使用的不是IE6/7/8/9/10，而是360浏览器、QQ浏览器、搜狗浏览器等，出现这个页面是因为你使用的不是该浏览器的最新版本，升级至最新即可。</p>
    <hr>
</div>
<div class="ie-alert-bg" style="display: none;"></div>
<!-- start :  浮动图标  -->

<script type="text/javascript">

				$("#wdtg").hide();
				$("#header_user_login").hide();
				$("#header_user").hide();

	function reg(){
		var username = $("#username_reg").val();
		var password = $("#passwd_reg").val();
    var repassword = $("#conpasswd").val();
		var vcode = $("#verify").val();
    var xcode = $("#xcode_reg").val();
	var QQ = $("#QQ_reg").val();
		if (username=='') {
			alert('请输入用户名');
			return
		}
		if (password=='') {
			alert('请输入登录密码');
			return
		}
		if (vcode=='') {
			alert('请输入验证码');
			return
		}
    if(password!=repassword)
    {
      alert('两次密码输入不一致');
      return
    }
		var user = {
			username:username,
			password:password,
			vcode:vcode,
			xcode:xcode,
			qq:QQ
		};

		$.ajax({
				type : 'POST',
				url  : '/index.php/user/memberReg',
				// timeout : 10000,
				data:user,
				dataType: "json",
				success : function(data){
					
            if(data.code==0)
            {
              alert(data.msg);
              window.location.href='/';
            }
            else
            {
              alert(data.msg);
            }
						
						//parent.layer.closeAll();
						//
					
				},
				error: function (XMLHttpRequest, textStatus, errorThrown)  {
        alert('注册失败，请检查输入信息'+textStatus);

         },

				complete:function(XHR,textStatus){
					XHR = null;
				}
		});  
		}
		function dl(){
	 $("#login").show();
	 $("#userreg").hide();
  }
    function zc(){
	 $("#login").hide();
	 $("#userreg").show();
  }
		
		
	
		
</script>
<!-- end :  浮动图标  -->

<!-- 倒计时维护 -->
<div class="maintain-countdown" style="display: none;">
  <div class="maintain-time" id="main_count_down">  
    维护倒计时<br>
    <div id="mian_time"></div>
  </div>
</div>
<script>
/*----------  倒计时功能  ----------*/
//倒计时
leftTime = 0;
interval = 1000;
leftTimeCounter = '';
function checkMaint() {
    $.ajax({
        type: 'POST',
        url: '/index/ajaxMaintData.html',
        data: '',
        dataType: 'json',
        timeout: '30000',
        success: function (data) {
            try
            {
                if ( session_timeout(data) === false )
                {
                    return false;
                }
            } catch(e){ console.log(e);}
            if (data.Result == null || data.Result == undefined || data.Result != true) {//没有正确获得数据
                return false;
            }
            if (data.sysStatus == 0 && data.leftTime > 0) {
                leftTime = data.leftTime;
                leftTimeCounter = setInterval(setLeftTime, interval);
            }
        }
    });
}

function setLeftTime() {
    if (leftTime <= 0) {
        clearInterval(leftTimeCounter);
        $('#main_count_down').parent().css('display', 'none');
        __openWin('home','/index/index.html'); //时间为0时跳转到维护页面
    }
    leftTime--;
    if (leftTime > 1800) {
        return;
    }
    var minute = parseInt(leftTime / 60);
    var second = leftTime % 60;
    var txt = '剩余'+minute+'分'+second+'秒';
    //将 txt 显示到页面上
    $('#main_count_down').parent().css('display', 'block');
    $('#mian_time').text(txt);
}

$(function() {
  //  checkMaint();
  
  $("div[name='div_top_click']").click(function(){
		$("div[name=\"div_top_click\"]").hide();
		$("img[name=\"login_img\"]").attr('src', '/index.php/user/vcode/1498379763');
		
  });
  function getUrlParam(name) {
            var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
            var r = window.location.search.substr(1).match(reg);  //匹配目标参数
            if (r != null) return unescape(r[2]); return null; //返回参数值
        }
		var is_login=getUrlParam("is_login");
		if(is_login=="1"){
			 $("#login").show();
	 $("#userreg").hide();
		}
});
</script>
<script>
    //全屏高度，防止内容过短的时候，下面出现白边
    $(function(){
        var winH = document.documentElement.clientHeight?document.documentElement.clientHeight:document.body.scrollHeight;
        $("body>div.wrap-bg").css("minHeight", ( winH - $("body>#header_plus").height() - $("body>.jc-footer").height() ) + "px" );
    })
</script>



<!--
project_url :    /index/login.html
--></body></html>