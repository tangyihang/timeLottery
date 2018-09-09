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
    <link rel="stylesheet" href="/assets/statics/ionicons-3.0/dist/css/ionicons.css" type="text/css">      
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
.mine-list ul li a img {
    margin: 11px 5px 0 0;
}
.mine-list ul li {
    line-height: 48px;
    height: 48px;
}
.top_bar {
    padding-top: 34px;
}
-->
</style>
<body class="login-bg">
    <div class="header">
        <div class="headerTop">
            <div class="ui-toolbar-left">
                <button onclick="location.href='/safe/Personal'">reveal</button>
            </div>
            <h1 class="ui-toolbar-title">设置</h1>
        </div>
    </div>
    
    <div id="wrapper_1" class="scorllmain-content top_bar bottom_bar">
        <div class="sub_ScorllCont">
        	<div style="font-size: 15px;padding-left: 8px;">账户安全设置</div>
            <div class="mine-list">
                <ul style="margin-top: 1px;">
                	<li>
                        <a href="/index.php/safe/loginpasswd">
                           <img src="/assets/statics/images/shezhi_03.png" alt=""> 登录密码
                        </a>
                    </li>
                    
                    <li>
                        <a href="/index.php/safe/question">
                            <img src="/assets/statics/images/geren_tubiao_13.png" alt="">密保问题
                            <?php
                                    $sql="select * from {$this->prename}question where uid={$this->user['uid']} ";
                                    $data=$this->getRow($sql);
                                    if($data) $answer= '已设置'; else  $answer= '未设置';
                            ?>
                            <span style="float:right;margin-right: 18px;font-size: 80%;"><?=$answer?></span>
                        </a>
                    </li>
                    <li>
                        <a id="wpassword_set" href="/index.php/safe/passwd" data-question=0>
                            <img src="/assets/statics/images/shezhi_03.png" alt="">提款密码
                            <?php if($this->user['coinPassword']){  ?>
                            	<span style="float:right;margin-right: 18px;font-size: 80%;">已设置</span>
                            <?php }else{?>
                            <span style="float:right;margin-right: 18px;font-size: 80%;">未设置</span>
                            <?php }?>
                        </a>
                    </li>
                    <li>
                        <a id="bind_bank_set" href="/index.php/safe/info" data-question=0>
                            <img src="/assets/statics/images/shezhi_04.png" alt="">我的银行卡
                            <?php $myBank=$this->getRow("select * from {$this->prename}member_bank where uid=?", $this->user['uid']);
                            if($myBank){
                            ?>
                            <span style="float:right;margin-right: 18px;font-size: 80%;">已绑定</span>
                        	<?php }else{?>
                            <span style="float:right;margin-right: 18px;font-size: 80%;">未绑定</span>
                            <?php }?>
                        </a>
                    </li>
                    
                </ul>
                
                <ul style="margin-top: 20px;">
                    <li>
                        <a href="/index.php/safe/us">
                            <img src="/assets/statics/images/geren_tubiao_30.png" alt="">关于我们
                        </a>
                    </li>
                </ul>
            </div>
            <button class="login-btn" id="log_out" style="margin-top:20px;">退出登录</button>
        </div>
    </div>
	<div class="menu">
	      <ul>
             <li>
                <a class="menu-home" href="/"><i class="ion-ios-home-outline"></i><p>首页</p></a>
             </li>
                           <li>
                 <a class="menu-color" href="/index.php/index/hall"><i class="ion-ios-cart-outline"></i><p>购彩</p></a>
             </li>
             <li>
                 <a class="menu-lot" href="/index/draw"><i class="ion-ios-trophy-outline"></i><p>开奖</p></a>
             </li>
             <li>
                 <a class="menu-news" href="/zst/zst.php?typeid=86&g=1"><i class="ion-ios-pulse"></i><p>走势</p></a>
             </li>
             <li>
                 <a class="menu-my" style="color: #ec0909;" href="/safe/Personal"><i class="ion-ios-person"></i><p>我的</p></a>
             </li>
         </ul>
   	</div>

    
    <script src="/assets/js/require.js"></script>
	<script src="/assets/js/require.config.js"></script>
    <script type="text/javascript">
	    requirejs(["jquery","layer","common"],function($,layer){
	    	$('button#log_out').on('click', function() {
		    	var index = layer.open({content:'您确定要退出登录吗？',btn:["确定","取消"],yes:function(){
		   			layer.close(index);
		   			doLogout();
		   		}});
		    });
	    	
	    	$('#wpassword_set').on('click', function() {
	    		/* if($(this).data('question') == 0) {
	    			var index = layer.open({content:'请先设置密保！',btn:["确定"],yes:function(){
			   			layer.close(index);
			   			
			   			location.href='member/question';
			   		}});
	    		} else { */
	    			location.href='member/changePwd/deal';
	    		/* } */
	    	});
	    	
	    	$('#bind_bank_set').on('click', function() {
	    		/* if($(this).data('question') == 0) {
	    			var index = layer.open({content:'请先设置密保！',btn:["确定"],yes:function(){
		   				layer.close(index);
		   				
		   				location.href='member/question';
    				}});
	    		} else { */
	    			location.href='member/bind/bank';
	    		/* } */
	    	});
	    	
	    	function doLogout() {
		        $.ajax({
		            url: '/index.php/user/logout',
		            type: 'GET',
		            dataType: 'json',
		            data: {
		            },
		            timeout: 30000,
		            success: function (data) {
		                    isLogin = false;
		                    location.href = '/index.php/user/login';
		            }
		        });
		    }
	    });
    </script>
</body>

</html>