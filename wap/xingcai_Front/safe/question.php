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
	        <h1 class="ui-toolbar-title">设置密保</h1>
	    </div>
	</div>
<?php
		$sql="select * from {$this->prename}question where uid={$this->user['uid']} ";
		$data=$this->getRow($sql);
?>
	<div id="wrapper_1" class="scorllmain-content bottom_bar">
	    <div class="sub_ScorllCont">
	        <div class="login">
	            <ul>
	            	<?php if($data){?>
	            	<li>
	                    <span class="logi">密保问题</span><input value="<?=$data['question']?>" type="text" id="question" name="question" placeholder="请输入密保问题">
	                </li>
	                <li>
	                    <span class="logi">密保旧答案</span><input type="text" id="answer" name="answer" placeholder="请输入旧答案">
	                </li>
	               	<li>
	                    <span class="logi">密保新答案</span><input type="text" id="oldAnswer" name="oldAnswer" placeholder="请输入新答案">
	                </li>
	                <?php }else{?>
	                <li>
	                    <span class="logi">密保问题</span><input value="<?=$data['question']?>" type="text" id="question" name="question" placeholder="请输入密保问题">
	                </li>
	                <li>
	                    <span class="logi">密保答案</span><input type="text" id="answer" name="answer" placeholder="请输入答案">
	                </li>

	                <?php }?>
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
		        var question = $('#question').val().trim();
		        if(question == '') {
		            layer.open({content:"请填写密保问题！",btn:"确定"});
		            return;
		        }
		        
		        var oldAnswer = '';
		        if($('#oldAnswer') != null && $('#oldAnswer').length > 0) {
		        	oldAnswer = $('#oldAnswer').val().trim();
		        	if(oldAnswer == '') {
			            layer.open({content:"请填写密保旧答案！",btn:"确定"});
			            return;
		        	}
		        }
		        
		        var answer = $('#answer').val().trim();
		        if(answer == '') {
		            layer.open({content:"请填写密保答案！",btn:"确定"});
		            return;
		        }
		        
		        var index=layer.open({type: 2,shadeClose:false});
		        $.ajax({
		            url: '/index.php/safe/updateQuestion',
		            type: 'POST',
		            dataType: 'json',
		            data: {
		            	'question': question,
		                'answer' : answer,
		                'oldAnswer' : oldAnswer
		            },
		            timeout: 30000,
		            success: function (results) {
		                 layer.close(index);
		                 if(results=="200"){
		                    layer.open({
		                        content: '密保修改成功',
		                        btn:"确定",
		                        yes:function(){
		                        	location.href='/safe/more';
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