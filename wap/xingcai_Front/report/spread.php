<!DOCTYPE html>
<html>
<head>
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" name="viewport" />
    <meta name=format-detection content="telphone=no" />
    <meta name=apple-mobile-web-app-capable content=yes />
    
    <title>喜羊羊彩</title>
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
	        <!--<h1 class="ui-betting-title">
	            <div class="bett-top-box">    
	                <div class="bett-tit"><span id="account_type">全部类型</span><i class="bett-attr"></i></div>
	            </div>
	        </h1>-->
	        <div class="ui-bett-refresh">
	            <a class="bett-refresh" href="javascript:;"></a>
	        </div>
	    </div>
	</div>

	<div id="wrapper_1" class="scorllmain-content scorll-order top_bar nobottom_bar">
	    <div class="sub_ScorllCont">
	        <div class="mine-message" style="display: none;">
	            <div class="mine-mess"><img src="/assets/statics/images/wuxinxi.png"></div>
	            <p>目前暂无记录哦！</p>
	        </div>
	        <div class="order-center">
	            <ul id="account_list">
	            
	                <li class="loading">
	                    <div class="order-list-tit"></div>
	                    <div class="c-gary" style="text-align: center">正在加载...</div>
	                </li>
	            </ul>
	            <a class="on-more" href="javascript:;" style="display: none;">点击加载更多</a>
	        </div>
	    </div>
	</div>

	<div class="beet-tips" hidden="">
	    <div class="clear"></div>
	    <ul>
	        <li><a class="beet-active" href="javascript:;" data-type="0">全部类型</a></li>
	        <li><a href="javascript:;" data-type="1">充值</a></li>
	        <li><a href="javascript:;" data-type="2">返点</a></li>
	        <li><a href="javascript:;" data-type="107">提款</a></li>
	        <li><a href="javascript:;" data-type="6">派奖</a></li>
	        <li><a href="javascript:;" data-type="7">撤单</a></li>
	        <li><a href="javascript:;" data-type="101">购彩</a></li>
	        <li><a href="javascript:;" data-type="102">追号购彩</a></li>
	        <li><a href="javascript:;" data-type="9">系统充值</a></li>
	    </ul>
	</div>
	
 	<script src="/assets/js/require.js" data-main="/assets/js/application/spreadLog"></script>
    <script src="/assets/js/require.config.js"></script>
</body>

</html>