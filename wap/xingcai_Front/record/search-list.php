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
<?php
    $bet=$this->getRow("select * from {$this->prename}bets where id=?", $args[0]);
    if(!$bet) throw new Exception('单号不存在');
    $modeName=array('2.000'=>'元', '0.200'=>'角', '0.020'=>'分', '0.002'=>'厘','1.000'=>'1元');
    $weiShu=$bet['weiShu'];
    if($weiShu){
        $w=array(16=>'万', 8=>'千', 4=>'百', 2=>'十',1=>'个');
        foreach($w as $p=>$v){
            if($weiShu & $p) $wei.=$v;
        }
        $wei.=':';
    }
    $betCont=$bet['mode'] * $bet['beiShu'] * $bet['actionNum'] * ($bet['fpEnable']+1);
?>
<body class="login-bg">
    <div class="header">
        <div class="header">
            <div class="headerTop">
                <div class="ui-toolbar-left">
                    <button id="reveal-left">reveal</button>
                </div>
                <h1 class="ui-toolbar-title">详情</h1>
            </div>
        </div>
    </div>
    <div id="wrapper_1" class="scorllmain-content scorll-order top_bar nobottom_bar">
        <div class="sub_ScorllCont">
            <div class="order-box">
                <div class="order-tit">
                    <div class="order-icon" style="height: 55px;"><img src="/assets/statics/images/icon/4.png" alt=""></div>
                    <div class="order-top-right">
                        <span class="order-name f120"><?=$this->types[$bet['type']]['title']?></span> <span class="grey f80">第<?=$bet['actionNo']?>期</span>
                        <div class="lot-number">
                            <span class="grey fl">开奖号码：</span>
                            <div class="red"> <?=$this->ifs($bet['lotteryNo'], '－')?></div>
                        </div>
                    </div>
                </div>
                <div class="order-info">
                    <h3>订单内容</h3>
                    <ul>
                        <li><span class="grey">订单号</span><?=$bet['wjorderId']?></li>
                        <li><span class="grey">投注金额</span><?=number_format($betCont, 3)?></li>
                        <li><span class="grey">投注返点</span><?=number_format($bet['bonusProp'], 2)?>－<?=number_format($bet['fanDian'],1)?>%</li>
                        <li><span class="grey">返点金额</span><?=$this->iff($bet['lotteryNo'], number_format(($bet['fanDian']/100)*$betCont, 3). '元', '－')?></li>
                        <li><span class="grey">投注赔率</span><?=$bet['bonusProp']?></li>
                        <li><span class="grey">投注时间</span><?=date('m-d H:i:s',$bet['actionTime'])?></li>
                        <li><span class="grey">是否中奖</span><span id="win_state">
                            <?php
                                if($bet['isDelete']==1){
                                    echo '<font color="#999999">已撤单</font>';
                                }elseif(!$bet['lotteryNo']){
                                    echo '<font color="#009900">未开奖</font>';
                                }elseif($bet['zjCount']){
                                    echo '<font color="red">已派奖</font>';
                                }else{
                                    echo '<font >未中奖</font>';
                                }
                            ?>
                        </span></li>
                        <li><span class="grey">中奖金额</span><span><?=$this->iff($bet['lotteryNo'], number_format($bet['bonus'], 3) .'元', '－')?></span></li>
                        <li><span class="grey">输赢</span><span>￥</em><em class="green"><?=$this->iff($bet['lotteryNo'], number_format($bet['bonus'] - $betCont + ($bet['fanDian']/100)*$betCont, 3), '－')?></em> 元<em class="green">&nbsp(<?=$this->iff($bet['lotteryNo'], $this->iff(number_format($bet['bonus'] - $betCont + ($bet['fanDian']/100)*$betCont, 3)>=0,"赢","亏"), '－')?>)</span></li>
                        
                        <li><span class="grey">玩法名称</span><?=$this->playeds[$bet['playedId']]['name']?></li>
                    </ul>
                </div>
                <div class="order-info order-kit">
                    <h3>投注号码</h3>
                    <ul id="code" class="grey"><?=$wei.$bet['actionData']?></ul>
                </div>
            </div>
            
            
            <a class="order-btn" href="/" style="text-align: center;">再来一注</a>
            
            
        </div>
    </div>
    
</body>
</html>
<script src="/assets/js/require.js" data-main="/assets/js/application/accountDetail"></script>
<script src="/assets/js/require.config.js"></script>