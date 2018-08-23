<?php $this->display('C38_header.php'); ?>
<script type="text/javascript">
function editpassword()
{
        var username = $("input[name=username]").val();
        var password = $("input[name=regPasswd]").val();
        var vcode = $("input[name=conpasswd]").val();
        if (username=='') {
            alert('请输入用户名');
            return
        }
        if (password=='') {
            alert('请输入登录密码1');
            return
        }
        if (vcode!=password) {
            alert('确认密码有误!');
            return
        }

        var user = {
            username:username,
            password:password,
            //vcode:vcode
        };
  $.ajax({
    type:"POST",
    url:"/index.php/user/editpassword",
    data:user,
    timeout : 10000,
    dataType: "json",
    success : function(data){
      if(data.code==0)
      {
          
          //$("input[name=username]").val(data.name);
        alert(data.msg);
        window.location.href='/';
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

$(document).ready(function() {


$("#wdtg").hide();
                $("#header_user_login").hide();
                $("#header_user").hide();


registertest();
});
</script>
<link type="text/css" rel="stylesheet" href="/files/register_new.css" />
<div class="wrap-bg" style="min-height: 597px;">
    <div class="reg_main">
        <div class="reg-box">
            <div id="register_form" name="register_form" method="post">
                <input type="hidden" name="formhash" value="kqpIoIo3jauMkdV2lqviVLpYY8SjaiO">                <h3 class="reg-tit">申请试玩帐号</h3>
                <div class="reg_left">
                    <table id="try_reg" class="reg_table" cellpadding="0" cellspacing="0" border="0" width="100%">
                        <tbody>
                            <tr>
                                <td class="t" width="120"><font color="red">*</font>试玩帐号：</td>
                                <td width="230">
                                    <div style="position: relative;">
                                        <input tabindex="2" readonly="readonly" maxlength="12" autocomplete="off" type="text" class="text reg1-pwd" name="username" value="">
                                    </div>
                                </td>
                                <td width="335"></td>
                            </tr>
                            <tr class="reg-tr">
                                <td class="t"><font color="red">*</font>登录密码：</td>
                                <td><div style="position: relative;">
                                        <label class="reg1-icon-pwd"> </label>
                                        <input tabindex="2" maxlength="12" autocomplete="off" type="password" class="text reg1-pwd" name="regPasswd">
                                        </div></td><td class="reg-notice-info reg-notice-del"><div class="reg-notice-info">密码只能是6-12个字母数字组合，且必须同时包含字母和数字 </div></td>
                            </tr>
                            <tr class="reg-tr">
                                <td class="t"><font color="red">*</font>确认密码：</td>
                                <td><div style="position: relative;">
                                        <label class="reg1-icon-pwd"> </label>
                                        <input tabindex="3" maxlength="12" autocomplete="off" type="password" class="text reg1-pwd" name="conpasswd">
                                    </div></td>
                                <td class="reg-notice-info"></td>
                            </tr>
                            <tr class="reg-tr" id="reg_verify_code" style="display:none;">
                                <td class="t"><font color="red">*</font>验证码：</td>
                                <td>
                                    <div style="position: relative;">
                                        <input tabindex="4" autocomplete="off" type="text" class="text imgcode" name="verify" id="verify" maxlength="4">
                                        <span id="captcha_info" style="margin-left:0;">点击输入框后出现验证码</span>
                                        <span id="captcha_span" style="display:none;margin-left:0;"> 
                                            <img id="captcha" alt="验证码" onclick="return newCaptcha();" height="28">
                                            <a class="reg-refresh-verify-code" onclick="return newCaptcha();"> </a>
                                        </span>
                                    </div>
                                </td>
                                <td class="reg-notice-info"></td>
                            </tr>

                            <tr>
                                <td class="t"></td>
                                <td><input id="btn_sub" type="button" onclick="editpassword();" class="submit" value="提交注册"/></td>
                                <td><span>已有账号？</span><a class="orange" onclick="__openWin('login','/index/login.html')">立即登录</a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="mar">
            <p><b>备注：</b></p>
            <ul>
                <li>1.标记有&nbsp;<span class="red">*</span>&nbsp;者为必填项目。</li>
                <li>2.每个试玩帐号从注册开始，有效时间为72小时，超过时间系统自动回收。</li>
                <li>3.试玩帐号仅供玩家熟悉游戏，不允许充值和提款。</li>
                <li>4.试玩帐号不享有参加优惠活动的权利。</li>
                <li>5.试玩帐号的赔率仅供参考，可能与正式帐号赔率不相符。</li>
                <li>6.其他未说明事项以本公司解释为准。</li>
            </ul>
        </div>

    </div>
</div>

<?php $this->display('C38_footer.php'); ?>