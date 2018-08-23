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

<style>
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
	        <h1 class="ui-toolbar-title">密码找回</h1>
	    </div>
	</div>
	
	<div id="root" style="margin-top: 20px;">
		<div class="register">
			<div class="form">
				<div class="row"><input id="code" type="text" placeholder="请输入您会员账号" value=""></div>
				<div class="row"><input id="question" type="text" placeholder="请输入密保问题" value=""></div>
				<div class="row"><input id="answer" type="text" placeholder="请输入密保答案" value=""></div>
				
	            <div class="row"><div id="submit_btn" class="login-btn">提交</div></div>
			</div>
    	</div>
	</div>
	
    <script src="/assets/js/require.js"></script>
    <script src="/assets/js/require.config.js"></script>
    <script type="text/javascript">
	    requirejs(["jquery","layer"],function($,layer){
	    	$('#submit_btn').on('click', function() {
	    		var code = $('#code').val();
	    		if(code == null || code == '') {
	    			layer.open({content:'会员账号不能为空！', btn:"确定"});
	    			return;
	    		}
	    		var question = $('#question').val();
	    		if(question == null || question == '') {
	    			layer.open({content:'密保问题不能为空！', btn:"确定"});
	    			return;
	    		}
	    		var answer = $('#answer').val();
	    		if(answer == null || answer == '') {
	    			layer.open({content:'密保答案不能为空！', btn:"确定"});
	    			return;
	    		}
	    		
	    		var index=layer.open({type: 2,shadeClose:false});
	            $.ajax({
	               url:"/index.php/user/wp",
	                type: 'POST',
	                dataType: 'json',
	                data: {
	                    'code': code,
	                    'question': question,
	                    'answer': answer
	                },
	                timeout: 30000,
	                success: function (results) {
	                	layer.close(index);
	                    if(results.state=="200"){
	                    	location.href = '/index.php/user/reset/'+results.uid;
	                    }else{
	                    	layer.open({content:results,btn:"确定"});
	                    }
	                    
	                }
	            });
	    	})
             $('#reveal-left').on('click', function() {
             location.href = '/user/login';
    });
	    })
    </script>
</body>

</html>