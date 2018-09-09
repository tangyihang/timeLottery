<!DOCTYPE html>
<html>
<head>
	<base id="base_path" href="/">
	
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" name="viewport" />
    <meta name=format-detection content="telphone=no" />
    <meta name=apple-mobile-web-app-capable content=yes />
    
    <title>喜羊羊彩</title>
    
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="uploadimg/wapicon/icon-57.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="uploadimg/wapicon/icon-72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="uploadimg/wapicon/icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="uploadimg/wapicon/icon-144.png">
    
    <link rel="stylesheet" href="assets/statics/css/style.css" type="text/css">
    <link rel="stylesheet" href="assets/statics/css/global.css" type="text/css">
    <link rel="stylesheet" href="assets/statics/ionicons-2.0.1/css/ionicons.css" type="text/css">    
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
	.lot-num-list i.lot, i.lot-blue, .two-ball i {
	    width: 20px;
	    height: 20px;
	    line-height: 20px;
	    text-align: center;
	    display: block;
	    float: left;
	}
	.lot-num-list i.lot, i.lot-blue, .two-ball i {
	    margin: 0px 8px 0 0;
	}
	.lottery-info ul li, .lott-list ul li.list-k3, .lott-list ul li.lott-k3-list {
	    padding: 0;
	}
	
	.lott-list-tit span {
	    padding-left: 10px;
	}
</style>

<body class="login-bg">
	<div class="lot-content">
        <div class="head">
            <div class="headerTop">
                <div class="toolbar-left">
                    <button id="reveal-left2" onclick=""></button>
                </div>
                <h1 class="betting-title" style="top:0px;">
                    <div class="bett-top-box"><?=$args[0]['title']?></div>
                </h1>
                <div class="ui-bett-right">
	                <a class="bett-head" href="javascript:;"></a>
	            </div>
            </div>
            
            <div class="beet-rig" style="display: none;right: 5px;width: 70px; height: 120px; background-size: 70px 120px;">
			    <ul>
			    	<li><a class="draw-head" data-id="0" href="javascript:;">今天</a></li>
			    	<li><a class="draw-head" data-id="-1" href="javascript:;">昨天</a></li>
			    	<li><a class="draw-head" data-id="-2" href="javascript:;">前天</a></li>
			    </ul>
			</div>
            
            <div class="bet-tips" style="display: none;">
            </div>
        </div>
    </div>
    
    <div id="wrapper_2" class="scorllmain-content top_bar bottom_bar">
        <div class="sub_ScorllCont">
            <div class="lott-list">
                <ul id="draw_list">
                    <li class="list-k3">
                        <div class="lott-list-tit">
                            <div class="two-ball" style="text-align: center;">
                                正在加载...
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <input type="hidden" id="gameId" value="<?=$args[0]['id']?>" />
    
    

	<div class="menu">
	     <ul>
	         <li>
	            <a class="menu-home" href="/"><img src="assets/statics/images/nav_1.png"></a>
	         </li>
	         <li>
	             <a class="menu-color" href="/index/hall"><img src="assets/statics/images/nav_2.png"></a>
	         </li>
	         <li>
	             <a class="menu-lot" href="/index/draw"><img src="assets/statics/images/nav_03.png"></a>
	         </li>
	         <li>
	             <a class="menu-news" href="/zst/zst.php?typeid=86&g=1"><img src="assets/statics/images/nav_4.png"></a>
	         </li>
	         <li>
	             <a class="menu-my" href="/safe/Personal"><img src="assets/statics/images/nav_5.png"></a>
	         </li>
	     </ul>
   	</div>

    
    <script src="assets/js/require.js"></script>
    <script src="assets/js/require.config.js"></script>
    <script type="text/javascript">
	    requirejs(["jquery", "layer", "common"], function($,layer) {
	    	$(".draw-head").on("click", function() {
	    		$(".beet-rig").hide();
	    		getDrawList($(this).data('id'));
	        });
	    	
	        $("#reveal-left2").on("click", function(e) {
	    		if(/common\/hall/g.test(document.referrer)
	    				|| /lotteryDraw/g.test(document.referrer)) {
	    			history.go(-1);
	    		} else {
	    			location.href='/index/draw';
	    		}
	        });
	        
	        getDrawList(0);
	        function getDrawList(dayType) {
	        	var index = layer.open({
		            type: 2,
		            shadeClose: false
		        });
	        	
	        	$.ajax({
		            url: '/index/getDrawLists',
		            type: 'POST',
		            dataType: 'json',
		            data: {
		                'gameId': $('#gameId').val(),
		                'dayType': dayType
		            },
		            timeout: 30000,
		            success: function(results) {
		                layer.close(index);
		                if (results.status == "200") {
		                    var data = results.data;
		                    var txtHtml = '';
		                    var ksgame = ',10,11,16,17,';
		                    var txtOpen = '正在开奖';
		                    for(var i = 0; i < data.length; i++) {
		                        var numArr = data[i].data;
		                        numArr = (numArr != undefined && numArr != '') ? numArr.split(',') : [];
		                        var numHtml = '';
		                        var tmpHtml = '';
		                        
		                        var total = 0;
	                            numHtml = '<div class="two-ball">';
	                            numHtml += '<span style="float:left;">'+data[i].number + '期:</span>';
	                            for(var j = 0; j < numArr.length; j++) {
	                            	total += parseInt(numArr[j]);
	                                tmpHtml += '<i>' + numArr[j] + '</i>';
	                            }
	                            
	                            if(tmpHtml == '') {
	                                tmpHtml = txtOpen + '<br>';
	                                txtOpen = '';
	                            } else {
	                            	var num1 = parseInt(numArr[0]);
			                        var num5 = parseInt(numArr[4]);
	                            	tmpHtml += '<span style="padding-left: 0px;">'+(total>=23?'总:大':'总:小') +'</span>';
		                            tmpHtml += '<span style="padding-left: 0px;">'+(total%2==0?'双':'单') +'</span>';
		                            tmpHtml += '<span style="padding-left: 0px;">'+(num1>num5?'龙':(num1<num5?'虎':'和')) +'</span>';
	                            }
	                            numHtml += tmpHtml + '</div>';
		
		                        txtHtml += '<li class="list-k3" style="padding-left:5px;padding-bottom:2px;">' + '<div class="lott-list-tit">' + numHtml + '</div>' + '</li>';
		                    }
		                    txtHtml = '<span>'+results.time + '开奖：</span>' + txtHtml;
		                    
		                    $('ul#draw_list').html(txtHtml);
		                }else{
                            $('.two-ball').html(results.msg)
                        }
		            }
		        });
	        }
	    });
    </script>
</body>

</html>