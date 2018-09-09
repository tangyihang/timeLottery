<!DOCTYPE html>
<html>
<head>
	
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" name="viewport" />
    <meta name=format-detection content="telphone=no" />
    <meta name=apple-mobile-web-app-capable content=yes />
    
    <title>喜羊羊彩</title>
    
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="uploadimg/wapicon/icon-57.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="uploadimg/wapicon/icon-72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="uploadimg/wapicon/icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="uploadimg/wapicon/icon-144.png">
    
    <link rel="stylesheet" href="/assets/statics/css/style.css" type="text/css">
    <link rel="stylesheet" href="/assets/statics/css/global.css" type="text/css">
    
    <script type="text/javascript">
    	if(('standalone' in window.navigator)&&window.navigator.standalone){
	        var noddy,remotes=false;
	        document.addEventListener('click',function(event){
	                noddy=event.target;
	                while(noddy.nodeName!=='A'&&noddy.nodeName!=='HTML') noddy=noddy.parentNode;
	                if('href' in noddy&&noddy.href.indexOf('http')!==-1&&(noddy.href.indexOf(document.location.host)!==-1||remotes)){
	                        event.preventDefault();
	                        document.location.href=noddy.href;
	                }
	        },false);
		}
    </script>
</head>

<<style>
<!--
body {
    line-height: 1.5;
}
#root {
    width: 100%;
    height: 100%;
}
.register, .register .form {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
}
.register .form {
    flex-direction: column;
    margin: 0 .625rem;
}
.register .form .row {
    margin-top: .625rem;
    width: 100%;
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -webkit-flex-direction: column;
    -ms-flex-direction: column;
    flex-direction: column;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
}
.register .form .row input {
    font-size: 1rem;
    border: 1px solid #e5e5e5;
    border-radius: .3125rem;
    padding: .9375rem .625rem;
    color: #999;
}
input {
    -webkit-appearance: none;
}
button, input, select, textarea {
    font-family: inherit;
    font-size: inherit;
    line-height: inherit;
    color: inherit;
}
.register .form .verifyCode {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: horizontal;
    -webkit-box-direction: normal;
    -webkit-flex-direction: row;
    -ms-flex-direction: row;
    flex-direction: row;
    -webkit-box-pack: center;
    -webkit-justify-content: center;
    -ms-flex-pack: center;
    justify-content: center;
}
.register .form .verifyCode input {
    width: 60%;
    border: none;
    font-size: 1rem;
    padding: .9375rem;
}
.register .form .verifyCode img {
    width: 40%;
    height: 3.375rem;
}
img {
    border-style: none;
}
.register .form .statement {
    margin: .625rem;
}
.register .form .statement .check {
    width: .9375rem;
    height: .9375rem;
    margin-right: .3125rem;
}
.register .form .statement span {
    color: #999;
    font-size: .75rem;
}
.register .form .statement a {
    color: #ff7f00;
    text-decoration: underline;
    font-size: .75rem;
}
a, button {
    cursor: pointer;
}
.register .form .row .login-btn {
	text-align: center;
    background-color: #ec2829;
    color: #fff;
    margin-top: .625rem;
}
.register .form .row div {
    margin: 0 .625rem;
    border-radius: .4375rem;
    font-size: 1.125rem;
    text-align: center;
}
-->
</style>

<body class="login-bg">
	<div class="header">
	    <div class="headerTop">
	        <div class="ui-toolbar-left">
	            <button id="reveal-left">reveal</button>
	        </div>
	        <h1 class="ui-toolbar-title">注册</h1>
            <div style="position: absolute;z-index: 2;right:10px;top:10px;"><a href="/index.php/index/mfsw" style="color:white;">免费试玩</a></div>
	    </div>
	</div>
	
	<div id="root" style="margin-top: 20px;">
		<div class="register">
			<div class="form">
				
	            
				<div class="row"><input id="uid" type="text" placeholder="请输入用户名" value=""></div>
				<div class="row"><input id="pwd" type="password" placeholder="请输入登录密码" value=""></div>
				<!-- <div class="row"><input id="tj" type="text" placeholder="请输入推荐人ID，没有可不填" value=""></div> -->
				<div class="row"></div>
				<div class="verifyCode">
					<input id="captcha1" type="text" placeholder="请输入验证码" value="">
					<img  class="regImg" style="cursor:pointer;" src="/index.php/user/vcode/<?=$this->time?>" onclick="this.src='/index.php/user/vcode/'+(new Date()).getTime()">
				</div>
				
				<div class="statement">
		            <img class="check" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAABGdBTUEAALGPC/xhBQAABJpJREFUWAnNWVtoFGcU/iaNl4hGQzQ2GEtoFLVesAiKIKX0RmlR6414v1EQfBH0oQ9Vk2hffEghL4XSUkitbVIrEiz12iqKoqWIDxIVDTUqpjVqNK5pTIzjd/7Z8cxsdnZ24+42B2Zz/jPnP+eb8//n/JdY6CPZlRgHC3NhYxZNFHsesdjy4rFwjjoHrEpckxepkpVKB4Iqov4mPgvodFIqffkxl6i/n08Nwd5Jtm9SAO1dGIb/sIVGtxDY0GSNx9WzEKG8Gnmotj7Do7g6HmEoQLvKROtrAhvl6ffyrIVWRnWDVWGiGmgvJ+iNbcMiuG0Eti/t4MSpfDBtiw/xFYQj7gv7Sw5AO2ppYElQx7TKLexFPtZYmzmRYqhXBM3XZBOcAJJA0Ge8SPYCiB3YmrXIeaMlIMV3DPmGOJoQMud88pg+mWtaxvMib+K8ABItJU1USW+2pvo5kt15KHNLkA6x1Llsgpu+Dth4ERhR6v8EweDUXCM3EYyuEBK9lyvCflfBrSlLgYV7gBzGp/Uy8NUUJkqP6jvFvExWHDeCm7IGbuInXCh3O+AE0qiJ8aIogZIlFS7ABdLIOI37EFhcD7ySq64u1AJtTdpWzmCyzK7ExlWVZ4grfRtY8RswIE8dNO4D9pb7h1ffgrVkfA5/5nplGeFLZgPLDvjBXfkV+GVZMDgBQmw5nHuyn8scFc8AVh4EBnnyr+kY8PNi4Fl3Yr/EJnNQNpuZoaKpwKrDwODhar/5FFA3H+h5orJgrjgc4EhmWUFZsImgN4UTgNVHgSGFqnHrT2DPx0B3h8oScyEAx3D0Pz0HrD0ODH01sSnv24LXgTW/s89olbZcAH5gFneF7lG1D0dXIhhM87/j8OQDw8cCSxuAXE8GBvXKp+5qgssfoxp3GoHdHwCdbSpLkhOAcsCJT5F/VF4ykwWWNSvRPkKiLJErKNV+93hW+v49oKNVZclzLYkBNqwHIv+qucncv76zU9tebshIRo7ZWThepQ+aCe5d2giOgSrH5UIAPqSDOi5N3Z3a+63PgWmrtC3c4BHM1iNA0WSVt98Gagnu4Q2Vpc4RoJxbE9Gts0DDOhZUW7XmfQu8NsdpDxzGOneI0/lNfR/hqVIiF38JU70wjtikULPEh9DFOuBEpSrlDgTK9zNi3IUs54pQ4qn1HfeZEO8Ddy+rfl85OfBLX7sSjQQ6KdSObJGmLVe1nqf+hb+z3Ync7b9Up68cD/rcbr0hSSLEcCRBkjQ3zqiid1fS9ZhF+CMgHeAcDwaTC7CGczGingM4WZ4kadqu+xUkiX6aB9w87Zf3teVgqZHuBiBDKXcl1UnZk3r2I5crGU6hp11A/ULg7z+cdnp+q6OYtOqmfGiSLJ6xATj/DdB8Mj2wxErMockkiWu9Px473TloMJrzqIUKF3DW/9K390ws/n0RFIG5fqhCPctOdu5lxKmQ3M9UoNySw7uHfBE0eqLAixzTwaOYUda9PIoBZ/AEOTaRdO5pqgi5V6SD+qUkF0Aypbbji9jIuXZCHUcT53+7wAwFKF/Sr6+A3VAboP31Et0L0uW5wcjKvyGeA9U/XZc7AuNcAAAAAElFTkSuQmCC">
		            <span>我已年满18周岁，并且同意接受</span><a href="/user/law">《法律声明》</a><br>
		            <!-- <span style="margin-left: 24px">请牢记喜羊羊彩官方永久域名: <font color="#ff7f00">www.cp89.com</font></span> -->
	            </div>
                <input id="tj" type="hidden" value="<?=$_REQUEST['tj']?>">
	            <div class="row"><div id="<?php if($_REQUEST['tj']){echo 'register_btn_tj';}else{echo 'register_btn';}?>" class="login-btn">立即注册</div></div>
	            
	            <div class="row"><div id="login_btn" class="login-btn" style="color:#f13031;background-color: #fff;border: 1px solid #ddd;">立即登录</div></div>
			</div>
    	</div>
	</div>
    <script src="/assets/js/require.js" data-main="/assets/js/application/register"></script>
    <script src="/assets/js/require.config.js"></script>
</body>

</html>
<script type="text/javascript">
    function registertest()
{
  $.ajax({
    type:"POST",
    url:"/index.php/user/registertest",
    timeout : 10000,
    dataType: "json",
    success : function(data){
      if(data.code==0)
      {
        alert(data.msg);
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
</script>