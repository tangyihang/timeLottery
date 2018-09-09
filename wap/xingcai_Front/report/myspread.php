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

<body class="login-bg" style="">
<div class="header">
    <div class="header">
        <div class="headerTop">
            <div class="ui-toolbar-left">
                <button id="reveal-left">reveal</button>
            </div>
            <h1 class="ui-toolbar-title">我的推荐</h1>
            <div class="ui-bett-with">
                <a href="/index.php/report/spread" style="font-size: 16px;">收益记录</a>
            </div>
        </div>
    </div>
</div>

<div id="wrapper_1" class="scorllmain-content scorll-order top_bar nobottom_bar">
    <div class="sub_ScorllCont">
        <div class="cash-text">
            <ul>
                <li>
                    <span class="text-left">&nbsp;&nbsp;&nbsp;&nbsp;我的推荐ID：<?=$this->user['uid']?></span>
                </li>
            </ul>
        </div>
        <div class="cash-text">
            <ul>
                <li>
                    <span class="text-left">我的推荐地址：</span>
                </li>
            </ul>
            <b id="spread_url" style="color:red;font-size: 80%;padding-left: 15px;"><?php echo $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['SERVER_NAME'];?>/user/regs?tj=<?=$this->user['uid']?></b><br>
            <b style="font-size: 100%;padding-left: 15px;line-height: 25px;">请复制完整地址给您的好友或者让您的好友在注册时填写您的推荐ID</b><br>
        </div>
        <div class="cash-text">
            <ul>
                <li>
                    <span class="text-left">本月推荐收益：<b style="color:red;" id="BY_money">0.0</b></span>
                </li>
            </ul>
            <b style="font-size: 80%;margin-left: 40px;">说明：每天的7点更新收益，如3号7点，会计算2号0点-24点之间所有数据，然后增加您的收益。您的收益=推荐会员的有效投注额度总和 ÷ 100 ×0.1(转换率),小数部份四舍五入!<b style="color:red;">(风险账号不参与收益计算)</b></b>
        </div>
        <div class="cash-txt" style="margin-top: 0px;">
            <h3>我的推荐会员(共计<b id="number">0</b>位)：</h3>
            <ul>
                <!--<li>asdfd</li>-->
            </ul>
        </div>
    </div>
</div>
<script src="/assets/js/require.js" data-main="/assets/js/application/spreadLog"></script>
<script src="/assets/js/require.config.js"></script>
<input type="hidden" id="spread_id" value="129459">
<script type="text/javascript" src="/skin/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
        $.ajax({
   type: "get",
   url: "/index.php/user/getincome/<?=$this->user['uid']?>",
    //dataType: "json",
   success: function(msg){
       $("#BY_money").html(msg);
   }
   });
    $.ajax({
   type: "get",
   url: "/index.php/user/getchild/<?=$this->user['uid']?>",
    //dataType: "json",
   success: function(msg){
       $("#number").html(msg);
   }
   })
});
    
</script>

</body></html>

</html>