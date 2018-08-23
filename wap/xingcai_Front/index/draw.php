<!DOCTYPE html>
<html>
<head>
	<base id="base_path" href="/">
	
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" name="viewport" />
    <meta name=format-detection content="telphone=no" />
    <meta name=apple-mobile-web-app-capable content=yes />
    
    <title>彩38</title>
    
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="uploadimg/wapicon/icon-57.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="uploadimg/wapicon/icon-72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="uploadimg/wapicon/icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="uploadimg/wapicon/icon-144.png">
    
    <link rel="stylesheet" href="assets/statics/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/statics/css/global.css" type="text/css">
    <link rel="stylesheet" href="assets/statics/ionicons-3.0/dist/css/ionicons.css" type="text/css">    
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
                <button id="reveal-left2" onclick="location.href='/'">reveal</button>
            </div>
            <h1 class="ui-toolbar-title">开奖大厅</h1>
        </div>
    </div>
    <div id="wrapper_1" class="scorllmain-content top_bar bottom_bar">
        <div class="sub_ScorllCont">
            <div class="lott-list">
                <ul id="draw_list">
                    <li class="list-k3">
                        <a href="javascript:;" data-gid="0">
                            <div class="lott-list-tit">
                                <span></span>
                                <span style="font-size: 11px;"></span>
                            </div>
                            <div class="two-ball" style="text-align: center;">正在加载...</div>
                        </a>
                    </li>
                </ul>
            </div>
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
                 <a class="menu-lot" style="color: #ec0909;" href="/index/draw"><i class="ion-ios-trophy"></i><p>开奖</p></a>
             </li>
             <li>
                 <a class="menu-news" href="/zst/zst.php?typeid=86&g=1"><i class="ion-ios-pulse"></i><p>走势</p></a>
             </li>
             <li>
                 <a class="menu-my" href="/safe/Personal"><i class="ion-ios-person-outline"></i><p>我的</p></a>
             </li>
         </ul>
   	</div>

    
    <script src="assets/js/require.js"></script>
    <script src="assets/js/require.config.js"></script>
    <script type="text/javascript">
	    requirejs(["jquery", "layer", "common"], function($, layer) {
	        var index = layer.open({
	            type: 2,
	            shadeClose: false
	        });
	        $.ajax({
	            url: '/index/getDraw',
	            type: 'GET',
	            dataType: 'json',
	            timeout: 30000,
	            success: function(results) {
	                layer.close(index);
	                if (results.status == "200") {
	                    var data = results.data;
	                    var txtHtml = '';
	                   // var ksgame = ',10,11,16,17,';
	                     var ksgame = ',9,';
	                    for (var i = 0; i < data.length; i++) {
	                        if (data[i] == null ) {
	                            continue;
	                        }
	                        var numArr = data[i].data;
	                        numArr = (numArr != undefined && numArr != '') ? numArr.split(',') : [];
	                        var numHtml = '';
	                        var tmpHtml = '';
	                        var num=0;
	                        if (data[i].groups=='9') { //快三
	                            numHtml = '<div class="lott-k3">' + '<div class="k3-number">' + '<ul>';
	
	                            for (var j = 0; j < numArr.length; j++) {
	                                tmpHtml += '<li><img src="assets/statics/images/lottery/touzi_0' + numArr[j] + '.png"></li>';
	                            }
	                            if (tmpHtml == '') {
	                                tmpHtml = '正在开奖';
	                            }
	                            numHtml += tmpHtml + '</ul>' + '</div>' + '</div>';
	                        } else if(data[i].groups == '10') {
	                        	num =0;
	                        	numHtml = '<div class="two-ball tow-ball-cont nums-pcdd" style="font-size:140% !important;">';
	                        	for (var j = 0; j < numArr.length+1; j++) {
	                        		
	                        		if(j<= 2) {
	                                	num += Math.abs(numArr[j]);
	                                	tmpHtml += '<i>' + numArr[j] + '</i>';
	                                	tmpHtml += '<b style="float:left;width:0px;height:30px;line-height:30px;text-align:center;display: block;margin:5px 20px 0 0;">' + (j==2 ? ' = ' : ' + ') + '</b>'
	                                } 

	                            }
	                            tmpHtml += '<i style="background:' + pcdd_ball_color[num].replace('color_', '') + '">' + num + '</i>';
	                            if (tmpHtml == '') {
	                                tmpHtml = '正在开奖';
	                            }
	                            numHtml += tmpHtml + '</div>';
	                        } else if(data[i].groups == '11') {
	                        	 numHtml = '<div class="two-ball">';
		                            for (var k = 0; k < numArr.length; k++) {
		                            	if(k == 6) tmpHtml += '<b style="float:left;width:0px;height:30px;line-height:30px;text-align:center;display: block;margin:5px 12px 0 0;">+</b>';
		                            	if(k == 5) {
		                            		tmpHtml += '<i style="margin-right:5px;background:' + lhc_ball_color[numArr[k]].replace('color_', '') + '">' + numArr[k] + '</i>';
		                            	} else {
		                                	tmpHtml += '<i style="background:' + lhc_ball_color[numArr[k]].replace('color_', '') + '">' + numArr[k] + '</i>';
		                            	}
		                            }
		                            if (tmpHtml == '') {
		                                tmpHtml = '正在开奖';
		                            }
		                            numHtml += tmpHtml + '</div>';
	                        } else {
	                            numHtml = '<div class="two-ball">';
	                            for (var k = 0; k < numArr.length; k++) {
	                                tmpHtml += '<i>' + numArr[k] + '</i>';
	                            }
	                            if (tmpHtml == '') {
	                                tmpHtml = '正在开奖';
	                            }
	                            numHtml += tmpHtml + '</div>';
	                        }
	
	                        txtHtml += '<li class="list-k3">' + '<a href="javascript:;" data-gid="' + data[i].type+ '">' + '<div class="lott-list-tit">' + '<span style="color:#c91b1c;">' + data[i].title + '</span><span style="font-size: 11px;">第' + data[i].number + '期 ' +getLocalTime(data[i].time) + '</span>' + '</div>' + numHtml + '</a>' + '</li>';
	                    }
	                    $('ul#draw_list').html(txtHtml);
	                }
	            }
	        });
   
	        $(document).on('click', 'ul#draw_list a', function() {
	            var gid = $(this).data('gid');
	            if (gid == '' || gid == 0) {
	                return;
	            }
	            location.href = '/index.php/index/drawList?gameId=' + gid;
	            //location.href = '/zst/?typeid=' + gid;
	        });
	    });
    </script>
</body>

</html>