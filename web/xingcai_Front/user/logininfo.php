<script type="text/javascript" src="/skin/layer/layer.js"></script>
<script type="text/javascript" src="/js/nsc/jquery-1.7.min.js?v=1.16.12.5"></script>
<link rel="stylesheet" href="/css/nsc/home/reset.css?v=1.17.1.13">
<div class="login">
    <div class="inputbox">
        <i class="icon-img1">
        </i>
        <input name="username" type="text" class="input-username" id="username"
        maxlength="32" placeholder="输入用户名">
    </div>
    <div class="inputbox">
    	<i class="icon-img2"></i>
    	<input name="password" type="password" class="input-password password" id="password" maxlength="28" placeholder="输入登录密码">
    </div> 
    <div class="yzmbox inputbox">
        <i class="icon-img3">
        </i>
        <input name="vcode" type="text" class="input-code" id="vcode" maxlength="4"
        placeholder="输入验证码" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
        <img class="validate" width="80" height="25" border="0" id="dvcode" style="cursor:pointer;"
        src="/index.php/user/vcode/1498379763" title="点击刷新" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()">
    </div>
    <div class="submitbox">
        <input type="button" onclick="sb()" class="submit-login" value="登录">
    </div>
    <div class="forgotpasswd">
        <a href="/forgotpasswd">
            忘记密码？
        </a>
    </div>
</div>
<script type="text/javascript">
	function sb(){
		var username = $("#username").val();
		var password = $("#password").val();
		var vcode = $("#vcode").val();
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
					if (data.code>1) {
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
						parent.layer.closeAll();
					}
				},
				error: function(e) {
					console.log(e);
				},
				complete:function(XHR,textStatus){
					XHR = null;
				}
		});  
	}
</script>