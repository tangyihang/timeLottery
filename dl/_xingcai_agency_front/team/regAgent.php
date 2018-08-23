	<?php $this->display('C38_header.php'); ?>
    <script type="text/javascript">
	    $(document).ready(function () {
	        $('#lotterysList').hide();
	        $('#lotterys').mouseover(function () {
	            $('#lotterysList').show();
	        }).mouseout(function () {
	            $('#lotterysList').hide();
	        });
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
	    
function registerBeforSubmit(){
	var type=$('[name=type]:checked',this).val();
	if(!this.name.value) throw('请输入以前代理过平台的名称');
	if(/[^\u4e00-\u9fa5]/.test(this.name.value)) throw('平台名称必须是汉字');
	if(!this.amount.value) throw('请输入团队每日销量');
	if(!this.username.value) throw('请输入申请帐号');
	if(!/^\w{4,16}$/.test(this.username.value)) throw('帐号由4到16位的字母、数字及下划线组成');
	if(!this.password.value) throw('请输入申请密码');
	if(this.password.value.length<6) throw('登入密码至少6位');
	if(!this.qq.value) throw('请输QQ号码');
	if(!this.iphone.value) throw('请输手机号码');
	if(!/^[1][3,4,5,7,8][0-9]{9}$/.test(this.iphone.value)) throw('请输正确的手机号码');
	if(!this.vcode.value) throw('请输入验证码');
}
function registerSubmit(err,data){
	if(err){
		layer.alert(err,{icon:2,skin:'layui-layer-molv',title:'提示'});
		 $("#login_img").trigger("click");
	}else{
		layer.alert(data,{icon:1,skin:'layui-layer-molv',title:'提示'});
		//window.setTimeout("window.location='/index.php/user/login'",3000); 
	}
}
	</script>
    <link href="/files/reg.css" rel="stylesheet" type="text/css">
    <link href="/files/color_reg.css" rel="stylesheet" type="text/css">
    <div class="wrap-bg" style="min-height: 587px;">
        <div class="wrapper">
			<div class="reg" id="userreg">
            <div class="reg-tit">
                <div class="fr">已有账号？<a class="orange" href="/index.php/user/login?is_login=1"  >立即登录</a></div><h3>用户注册</h3>
            </div>
            <div class="reg-info" id="reg_form_1"> 
            	<form action="/index.php/user/regAgents" method="post"  enter="true" call="registerSubmit" onajax="registerBeforSubmit" target="ajax" dataType="html">	
                <ul>
                    <li>
                        <div class="info-left"><span class="red">* </span>代理过平台：</div>
                        <div class="info-right">
                            <input name="name" id="name" class="reg-int" type="text"  maxlength="16" placeholder="请输入以前代理过的平台"  >
                        </div>
                        <div class="info-txt" id="_tips">以前代理过平台的名称</div>
                    </li>
                    <li>
                        <div class="info-left"><span class="red">* </span>团队每日销量：</div>
                        <div class="info-right"><input name="amount" id="amount"  class="reg-int" type="number"  maxlength="12" placeholder="团队每日销量"></div>
                        <div class="info-txt">团队每日销量</div>
                    </li>
                    <li>
                        <div class="info-left"><span class="red">* </span>申请账号：</div>
                        <div class="info-right"><input class="reg-int"  type="text" name="username" id="username" placeholder="请输入申请账号"></div>
                        <div class="info-txt">帐号由4到16位的字母、数字及下划线组成</div>
                    </li>
                     <li>
                        <div class="info-left"><span class="red">* </span>密码：</div>
                        <div class="info-right"><input class="reg-int" maxlength="12" autocomplete="off" type="password" name="password" id="cpasswd" placeholder="请输入密码"></div>
                    </li>
                     <li>
                        <div class="info-left"><span class="red">* </span>QQ号码：</div>
                        <div class="info-right"><input name="qq" id="qq"  class="reg-int" type="text"  maxlength="12" placeholder="请输入QQ号"></div>
                        <div class="info-txt">申请成功后客服会联系此QQ号</div>
                    </li>
                    <li>
                        <div class="info-left"><span class="red">* </span>手机号：</div>
                        <div class="info-right"><input name="iphone" id="iphone"  class="reg-int" type="text"  maxlength="12" placeholder="请输入手机号"></div>
                        <div class="info-txt">申请成功后客服会联系此手机号</div>
                    </li>
                    <li>
                        <div class="info-left"><span class="red">* </span>验证码：</div>
                        <div class="info-right info-codes" style="position:relative;">
                            <div class="top_click" name="div_top_click"> </div>
                            <input name="vcode" id="vcode" class="codes-int " type="text" tabindex="4" autocomplete="off" maxlength="4" placeholder="请输入验证码"/>
                            <div id="need_captcha" class="reg_need_captcha" >
                                <div class="yanzhengma">
                                    <span class="register_captcha_span" style="position:relative;">
                                       <img name="login_img" id="login_img" title="点击刷新" class="login_img" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()">
                                       <a name="btn_refresh" style="display:block;"><img src=""></a>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="info-left">&nbsp;</div>
                        <div class="info-right"><input type="checkbox" name="reg_checkbox" checked="checked"/>我已看过并同意<a class="orange" target="_self" onClick="" width="1000" height="653" border="0">《<?=$this->settings['webName']?>网络服务协议》</a></div>
                    </li>
                    <li>
                        <div class="info-left">&nbsp;</div>
                        <div class="info-right"><input id="btn-sub"  type="submit" class="submit" value="立即注册"></div>
                    </li>
                </ul>
                 </form>
            </div>
        </div>
        </div>
    </div>
    <script>
    $(function(){
        $("div[name='div_top_click']").click(function(){
		$("div[name=\"div_top_click\"]").hide();
		$("img[name=\"login_img\"]").attr('src', '/index.php/user/vcode/1498379763');
		});	
    });	
   </script>
<?php $this->display('C38_footer.php'); ?>
