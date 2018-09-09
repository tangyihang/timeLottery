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
<?php
    $bank=$this->getRow("select m.*,b.logo logo, b.name bankName from {$this->prename}member_bank m, {$this->prename}bank_list b where b.isDelete=0 and m.bankId=b.id and m.uid=? limit 1", $this->user['uid']);

    if($this->settings['cashMinAmount']){
            $cashMinAmount=$this->settings['cashMinAmount']/100;
            $gRs=$this->getRow("select sum(case when rechargeAmount>0 then rechargeAmount else amount end) as rechargeAmount from {$this->prename}member_recharge where  uid={$this->user['uid']} and state in (1,2,9) and isDelete=0 and rechargeTime>=".$rechargeTime);
            if($gRs){
                $rechargeAmount=$gRs["rechargeAmount"]*$cashMinAmount;
            }
            if($rechargeAmount){
                //消费总额
                $cashAmout=$this->getValue("select sum(mode*beiShu*actionNum) from {$this->prename}bets where actionTime>={$rechargeTime} and uid={$this->user['uid']} and isDelete=0");
                if(floatval($cashAmout)<floatval($rechargeAmount)) $text = "消费满".$this->settings['cashMinAmount']."%才能提现";
            }
        }
?>  
<body class="login-bg">
    <div class="header">
        <div class="header">
            <div class="headerTop">
                <div class="ui-toolbar-left">
                    <button id="reveal-left">reveal</button>
                </div>
                <h1 class="ui-toolbar-title">提款</h1>
                <div class="ui-bett-with">
                    <a href="/index.php/cash/toCashLog">提款记录</a>
                </div>
            </div>
        </div>
    </div>
    
    <div id="wrapper_1" class="scorllmain-content scorll-order top_bar nobottom_bar">
        <div class="sub_ScorllCont">
            <div class="cash-text">
                <ul>
                    <li>
                        <span class="text-left">收款姓名</span>
                        <input type="text" value="<?=$this->user['username']?>" readonly="">
                    </li>
                    <li>
                        <span class="text-left">账户余额</span>
                        <input type="text" id="balance" value="￥<?=$this->user['coin']?>" readonly="">
                    </li>
                </ul>
            </div>

            <div class="cash-txt">
                <h3>消费比例</h3>
                <ul>
                        <input type="hidden" id="min_amount" value="<?=$this->settings['cashMin']?>" />
                        <input type="hidden" id="max_amount" value="<?=$this->settings['cashMax']?>" />
                    <!-- <li>
                        <input type="hidden" id="isCanDraw" value="0" />
                        <input type="hidden" id="fee_rate" value="0" />
                        <input type="hidden" id="fee_amount" value="0" />
                        <span>是否可以提款：</span>否
                    </li> -->
                    <?php if($this->settings['cashMinAmount']){?>
                    <li><span>消费比例：</span>您的消费<?=$cashAmout?><span><?=$text?></span></li>
                    <?php }?>
                    <li><span>当天免手续费：</span>无限次</li>
                    <li><span>提现时间：从</span><?=$this->settings['cashFromTime']?><span>到</span><?=$this->settings['cashToTime']?></li>
                    <li style="width: 100%;white-space: pre-wrap;">单笔最低提现金额：<b style="color:black;"><?=$this->settings['cashMin']?></b>最高：<b style="color:black;"><?=$this->settings['cashMax']?></b></li>
                </ul>
            </div>
            <div class="cash-list">
                <ul>
                    <li><span>收款银行：</span><?=$bank['bankName']?></li>
                    <li><span>收款账号：</span><?=preg_replace('/^(\w{4}).*(\w{4})$/', '\1***********\2', htmlspecialchars($bank['account']))?></li>
                    <li><span>提款金额：</span>
                        <input id="money" class="cash-int" type="text" placeholder="最小提款金额为<?=$this->settings['cashMin']?>元">
                    </li>
                    
                    <li><span>提款密码：</span>
                    	<input id="password" style="padding-left: 10px;border: 1px solid #ddd;width: 150px;height: 28px;line-height: 28px;" type="password" placeholder="密码为4位纯数字">
                        <!-- <select name="" id="pwd1">
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
                        </select> -->
                    </li>
                </ul>
            </div>
            
            <button class="charge-btn" id="charge-btn" style="margin: 10px auto">确认</button>
            <input type="hidden" id="money_max" value="10" />
        </div>
    </div>
    
    <script src="/assets/js/require.js" data-main="/assets/js/application/withdraw"></script>
    <script src="/assets/js/require.config.js"></script>
</body>

</html>