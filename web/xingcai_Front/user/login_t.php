	<?php $this->display('C38_header_t.php'); ?>
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
	    });

	</script>
    <link href="/files/reg_t.css" rel="stylesheet" type="text/css">
    <link href="/files/color_reg.css" rel="stylesheet" type="text/css">

    <div class="wrap-bg">
        <div class="wrapper">
            <div class="reg" id="login" style="display:none;">
                <div class="reg-tit">
                    <div class="fr">没有账号？<a class="orange" onClick="zc()">立即注册</a></div><h3>用户登录</h3>
                </div>
                <div class="reg-info" id="_form_login">
                    <ul>
                        <li>
                            <div class="info-left"><span class="red">* </span>用户名：</div>
                            <div class="info-right"><input class="reg-int" type="text" id="username_login" placeholder="请输入用户名"></div>
                            <div class="info-txt">请输入用户名（4-16个英文、数字）</div>
                        </li>
                        <li>
                            <div class="info-left"><span class="red">* </span>密码：</div>
                            <div class="info-right"><input class="reg-int" id="passwd_login" type="password" placeholder="请输入密码"></div>
                            <div class="info-txt"></div>
                        </li>
                        <li>
                            <div class="info-left"><span class="red">* </span>验证码：</div>
                            <div class="info-right info-codes"><input id="vcode" class="codes-int" name="authnum" type="text" maxlength="4" placeholder="请输入验证码">
                                <div name="yzm_img_div" style="">
                                    <div class="codes-img"><img class="validate" width="80" height="25" border="0" id="dvcode" style="cursor:pointer;"
        src="/index.php/user/vcode/1498379763" title="点击刷新" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()"></div>
                                    <a onclick="changeImg()" style="display:none;" class="text"><img src=""></a><!--<a onclick="changeImg()" class="orange" >看不清？换一个</a>-->
                                </div>
                                <div name="tip_yzm_img" style="display:none;">点击输入框后出现验证码</div>
                            </div>
                        </li>
                        <li>
                            <div class="info-left">&nbsp;</div>
                            <div class="info-right"><input id="btn-sub" type="button" onclick="sb()" class="submit" value="登录"></div>
                        </li>
                    </ul>
                </div>
            </div>
			<div class="reg" id="userreg">
            <div class="reg-tit" style="width: auto">
                <div class="fr"></div><h3>用户注册<!--<a style="padding-left: 500px;" onclick="gb()">关闭</a>--></h3>
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
                        <div class="info-left"><span class="red">* </span>推荐码：</div>
                        <div class="info-right"><input name="xcode" id="xcode_reg"  class="reg-int" type="text"  maxlength="12"></div>
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
                        <div class="info-right"><input type="checkbox" name="reg_checkbox" checked="checked"/>我已看过并同意<a class="orange" target="_self" onClick="" width="1000" height="653" border="0">《彩38网络服务协议》</a></div>
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
<!-- start :  浮动图标  -->
<script type="text/javascript">

				$("#wdtg").hide();
				$("#header_user_login").hide();
				$("#header_user").hide();
			function sb(){
		var username = $("#username_login").val();
		var password = $("#passwd_login").val();
		var vcode = $("#vcode").val();
		if (username=='') {
			alert('请输入用户名');
			return
		}
		if (password=='') {
			alert('请输入登录密码1');
			return
		}
		if (vcode=='') {
			alert('请输入验证码');
			return
		}

		var user = {
			username:username,
			password:password,
			vcode:vcode
		};
		$.ajax({
				type : 'POST',
				url  : '/index.php/user/ajaxlogined',
				// timeout : 10000,
				data:user,
				dataType: "json",
				success : function(data){
					if (data.code>0) {
						alert(data.msg);
					}else{
						parent.culs = true;

						var user_baseinfo = parent.$("#user_baseinfo");
						if (user_baseinfo) {

							var html = '<div class="ftop user_info" id="user_baseinfo">	尊贵的：VIP<span class="ui_yuliu" title="" id="user_level">0</span>	欢迎您， <span class="username" title="" id="user_username"></span> <a href="/index.php/box/receive" onclick="Xgo(this)" attr-class="ui_message"> <i class="ic-message"></i> (<span class="ui_msgnum" id="user_msgcount">0</span>) </a> 预留信息： <span class="ui_yuliu" id="user_reservedinfo"></span> <a class="edit" href="/index.php/user/nickname"> </a> <a href="javascript:loginout()" class="logout ui_logout"> 退出 </a></div>';
							
							 var info  = $(html);
							 $(info).find("#user_level").html(data.data.grade);
							 $(info).find("#user_username").html(data.data.username);
							 $(info).find("#user_msgcount").html(data.data.msgcount);
							 $(info).find("#user_reservedinfo").html(data.data.care);
							 $(user_baseinfo).html($(info).html());

						}else{
							parent.$("#user_welcomeinfo").html('');
							parent.$("#user_level").html(data.data.grade);
							parent.$("#user_username").html(data.data.username);
							parent.$("#user_reservedinfo").html(data.data.care);
							parent.$("#user_msgcount").html(data.data.msgcount);	
						}

						alert('登录成功');
						//parent.layer.closeAll();
						window.location.href='/';
					}
				},
				error: function(e) {
					console.log(e);
          alert('登录失败'+e);
				},
				complete:function(XHR,textStatus){
					XHR = null;
				}
		});  
			}
	function reg(){
		var username = $("#username_reg").val();
		var password = $("#passwd_reg").val();
    var repassword = $("#conpasswd").val();
		var vcode = $("#verify").val();
    var xcode = $("#xcode_reg").val();
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
      xcode:xcode
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
		
		
	//CULS();
		
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