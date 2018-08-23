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
    <style type="text/css">
    	.bulletin-right{
    		position: static;
    		left: 0;
    		width: 94%;
    		margin: 0 auto;
    		box-shadow: 0;
    		border: none;
    		border-bottom: 1px dashed #DBDBDB;
    	}
    	.bulletin-right h3{
    		height: 40px;
    		line-height: 40px;
    	}
    	.notice-title{
    		margin: 0 85px 0 -10px;
    		overflow: hidden;
    		text-overflow: ellipsis;
    		white-space: nowrap;
    		text-indent: 25px;
    		position: relative;
    	}
    	.bull-bot{
    		float: right;
    		width: 85px;
    		overflow: hidden;
    		border: none;
    		white-space: nowrap;
    		padding: 0;
    		text-indent: 0;
    	}
    	.san-icon{
    		position: absolute;
    		top: 14px;
    		left: 5px;
    		height: 12px;
    		width: 12px;
    		display: inline-block;
    		background: none;
    		background-color: #F13131;
    		border-radius: 50%;
    	}
    	.content-wrapper{
    		display: none;
    	}
    	.btn-group{
    		text-align: center;
    		font-size: 12px !important;
    		line-height: 12px;
    		margin-bottom: 10px;
    	}
    	.btn-group a{
    			padding: 5px 10px;
    		display: inline-block;
    		border-radius: 3px;
    		border:1px solid #F13031;
    	}
    	.btn-group span{
    		margin-left: 10px;
    	}
    	.bull-box:last-child .bulletin-right{
    		border-bottom: none;
    	}
    </style>
    <script src="../../hcss/js/jquery.min.js"></script>
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
	            <button id="reveal-left" onclick="history.go(-1);">reveal</button>
	        </div>
	        <h1 class="ui-toolbar-title">公告</h1>
	    </div>
	</div>
	<div style="height: 44px;" class="ipad-top"></div>
	
    <div class="wrap">
        <!--<div class="bull-line"></div>-->

        <?php  if($args[0]) foreach($args[0]['data'] as $var){?>
        <div class="bull-box">
            <!--<div class="bulletin-left">
                <div class="bull-icon"></div>
            </div>-->
            <div class="bulletin-right">
            	  
                <h3>
                	<p class="bull-bot"><?=date('Y-m-d H:i:s', $var['addTime'])?></p>
                	<p class="notice-title">
                		<span class="san-icon"></span>[系统公告]<?= $var['title'] ?> 
                	</p>	
                </h3>
                <div class="content-wrapper">
                	<p class="bull-txt" style="word-wrap: break-word;"><?= $var['content'] ?></p>
                </div>
                
                
            </div>
        </div>
        <?php } ?>
    </div>
        <?php $this->display('inc_page1.php', 0, $args[0]['total'], $this->pageSize, "/index.php/notice/info-{page}", 0); ?>
    <script>
    	$(function(){
    		var list = $(".bull-box");
    		$(".bull-box").click(function(){
    			var index = $(this).index();
    			for(var i =0;i<list.length;i++){
    			  if(i == index){
    			  	 $(list[i]).find(".content-wrapper").toggle(500);
    			  }else{
    			  	 $(list[i]).find('.content-wrapper').hide(500);
    			  }
    			}
    		})
    	});
    </script>    	
</body>
</html>