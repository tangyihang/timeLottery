<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" name="viewport" />
    <meta name=format-detection content="telphone=no" />
    <meta name=apple-mobile-web-app-capable content=yes />
    
    <title>彩38</title>
    
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

<body class="login-bg">
	<div class="header">
	    <div class="headerTop">
	        <div class="ui-toolbar-left">
	            <button id="reveal-left">reveal</button>
	        </div>
	        <h1 class="ui-toolbar-title">修改登录密码</h1>
	    </div>
	</div>
	
	<div id="wrapper_1" class="scorllmain-content bottom_bar">
	    <div class="sub_ScorllCont">
	        <div class="login">
	            <ul>
	                <li>
	                    <span class="logi">旧密码</span><input type="password" id="pwd" name="pwd" placeholder="请输入旧密码">
	                </li>
	                <li>
	                    <span class="logi">新密码</span><input type="password" id="newpwd" name="newpwd" placeholder="请输入新密码">
	                </li>
	                <li>
	                    <span class="logi">确认密码</span><input type="password" id="repwd" name="repwd" placeholder="请再次输入新密码">
	                </li>
	            </ul>
	            <button class="login-btn" id="login-btn">立即修改</button>
	        </div>
	    </div>
	</div>
	
	<script src="/assets/js/require.js" data-main="/assets/js/application/changePwd"></script>
	<script src="/assets/js/require.config.js"></script>
</body>

</html>