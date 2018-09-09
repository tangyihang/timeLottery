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

<body class="login-bg">
	<div class="header">
	    <div class="headerTop">
	        <div class="ui-toolbar-left">
	            <button id="reveal-left">reveal</button>
	        </div>
	        <h1 class="ui-toolbar-title">密码重置</h1>
	    </div>
	</div>
	
	<div id="wrapper_1" class="scorllmain-content bottom_bar">
	    <div class="sub_ScorllCont">
	        <div class="login">
	            <ul>
	                <li>
	                    <span class="logi">新密码</span><input type="password" id="newpwd" name="newpwd" placeholder="请输入新密码">
	                </li>
	                <li>
	                    <span class="logi">确认密码</span><input type="password" id="repwd" name="repwd" placeholder="请再次输入新密码">
	                </li>
	            </ul>
	            <input type="hidden" name="uid" value="<?=$args[0]?>">
	            <button class="login-btn" id="login-btn">立即修改</button>
	        </div>
	    </div>
	</div>
	
	<script src="/assets/js/require.js"></script>
	<script src="/assets/js/require.config.js"></script>
	<script type="text/javascript">
	    requirejs(["jquery","layer","common"],function($,layer){
	    	$('#login-btn').on('click', function() {
	    		var newpwd = $('#newpwd').val();
	    		if(newpwd == null || newpwd == '') {
	    			layer.open({content:'新密码不能为空！', btn:"确定"});
	    			return;
	    		}
	    		var repwd = $('#repwd').val();
	    		if(newpwd != repwd) {
	    			layer.open({content:'两次输入的密码不一致！', btn:"确定"});
	    			return;
	    		}
	    		if (!/[A-Za-z0-9]{6,12}/g.test(newpwd) || !/[A-Za-z]{1,12}/g.test(newpwd) || !/[0-9]{1,12}/g.test(newpwd)) {
	                layer.open({content:"密码需6-12个字符，且为英数字符组合!",btn:"确定"});
	                return;
	            }
	    		
	    		var index=layer.open({type: 2,shadeClose:false});
	            $.ajax({
	               url:"/index.php/user/resetSubmit",
	                type: 'Post',
	                dataType: 'json',
	                data: {
	                    'newpassword': newpwd,
	                    'uid': $('input[name=uid]').val(),
	                },
	                timeout: 30000,
	                success: function (results) {
	                	layer.close(index);
	                    if(results=="200"){
	                    	layer.open({content:"密码修改成功！", btn:"确定", yes:function() {
	                    		location.href = '/user/login';
	                    	}});
	                    }else{
	                    	layer.open({content:results,btn:"确定"});
	                    }
	                    
	                }
	            });
	    	})
	    })
    </script>
</body>

</html>