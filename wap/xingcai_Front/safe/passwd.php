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
	        <h1 class="ui-toolbar-title">修改提款密码</h1>
	    </div>
	</div>
	
	<div id="wrapper_1" class="scorllmain-content bottom_bar">
	    <div class="sub_ScorllCont">
	        <div class="login">
	            <ul>
	                <li>
	                	
	                    <span class="logi">旧提款密码</span><input type="password" id="trans_pwd_old" maxlength="4" name="pwd" value="1111">
	                </li>
	                <li>
	                    <span class="logi">新提款密码</span>
	                    <select name="" id="pwd1">
	                        <option value="">-</option>
	                        <option value="0">0</option>
	                        <option value="1">1</option>
	                        <option value="2">2</option>
	                        <option value="3">3</option>
	                        <option value="4">4</option>
	                        <option value="5">5</option>
	                        <option value="6">6</option>
	                        <option value="7">7</option>
	                        <option value="8">8</option>
	                        <option value="9">9</option>
	                    </select>
	                    <select name="" id="pwd2">
	                        <option value="">-</option>
	                        <option value="0">0</option>
	                        <option value="1">1</option>
	                        <option value="2">2</option>
	                        <option value="3">3</option>
	                        <option value="4">4</option>
	                        <option value="5">5</option>
	                        <option value="6">6</option>
	                        <option value="7">7</option>
	                        <option value="8">8</option>
	                        <option value="9">9</option>
	                    </select>
	                    <select name="" id="pwd3">
	                        <option value="">-</option>
	                        <option value="0">0</option>
	                        <option value="1">1</option>
	                        <option value="2">2</option>
	                        <option value="3">3</option>
	                        <option value="4">4</option>
	                        <option value="5">5</option>
	                        <option value="6">6</option>
	                        <option value="7">7</option>
	                        <option value="8">8</option>
	                        <option value="9">9</option>
	                    </select>
	                    <select name="" id="pwd4">
	                        <option value="">-</option>
	                        <option value="0">0</option>
	                        <option value="1">1</option>
	                        <option value="2">2</option>
	                        <option value="3">3</option>
	                        <option value="4">4</option>
	                        <option value="5">5</option>
	                        <option value="6">6</option>
	                        <option value="7">7</option>
	                        <option value="8">8</option>
	                        <option value="9">9</option>
	                    </select>
	                </li>
	            </ul>
	            <button class="login-btn" id="login-btn">立即修改</button>
	        </div>
	    </div>
	</div>
	
	<script src="/assets/js/require.js"></script>
	<script src="/assets/js/require.config.js"></script>
	<script type="text/javascript">
	    requirejs(["jquery","layer","common"],function($,layer){
	    	$("#login-btn").on("click",function(e){
		        e.preventDefault();
		        var pwd = $('#trans_pwd_old').val().trim();
		        var newpwd = $('#pwd1').val()+$('#pwd2').val()+$('#pwd3').val()+$('#pwd4').val();
		        if(pwd == '') {
		            layer.open({content:"请输入旧提款密码！",btn:"确定"});
		            return;
		        }
		        if(newpwd.replace(/\-/g, '').length < 4) {
		            layer.open({content:"请输入新的4位交易密码！",btn:"确定"});
		            return;
		        }
		        if(pwd == newpwd) {
		            layer.open({content:"新旧提款密码不能相同！",btn:"确定"});
		            return;
		        }
		        var index=layer.open({type: 2,shadeClose:false});
		        $.ajax({
		            url: '/index.php/safe/setCoinPwd',
		            type: 'POST',
		            dataType: 'json',
		            data: {
		                'password' : pwd,
		                'newpassword' : newpwd
		            },
		            timeout: 30000,
		            success: function (results) {
		                 layer.close(index);
		                 if(results=="200"){
		                    layer.open({
		                        content: '提款密码修改成功',
		                        btn:"确定",
		                        yes:function(){
		                        	location.href='/safe/Personal';
		                        }
		                    });
		                 }else{
		                    layer.open({content:results,btn:"确定"});
		                 }
		
		            }
		        });
	    	});
		});
	</script>
</body>

</html>