<?php
/**
 * Created by PhpStorm.
 * User: chenhuagui
 * Date: 2017/5/3
 * Time: 09:49
 */
require_once "utils.php";
require_once 'phpqrcode.php';
$imgurl='';
$orderno='';
$error='';
    $appKey = $args[0]['key'];

    $url = "https://www.xinmapay.com:7301/jhpayment";
    $reqData = array(
        'messageid'         => '200001',
        'out_trade_no'      => $args[0]['out_trade_no'],
        'back_notify_url'   => $args[0]['back_notify_url'],
        'branch_id'         => $args[0]['branch_id'],
        'prod_name'         => '测试支付',
        'prod_desc'         => '测试支付描述',
        'pay_type'          => $args[0]['pay_type'],
        'total_fee'         => $args[0]['total_fee']*100,
        'nonce_str'         => createNoncestr(32)
    );
    //$reqData = sign($reqData, $SignKey);
    $reqData = sign($reqData, $appKey);
    $result = httpPost($url, $reqData);
    $resultJson=json_decode($result);
    if ($resultJson->resultCode == '00' && $resultJson->resCode == '00') {

        $resultToSign = array();

        foreach ($resultJson as $key => $value) {
            if ($key != 'sign') {
                $resultToSign[$key] = $value;
            }
        }

        $str = formatBizQueryParaMap($resultToSign);
        $resultSign = strtoupper(md5($str."&key=".$appKey));
		$orderno=$resultToSign['orderNo'];
        if ($resultSign != $resultJson->sign) {
            $error='签名验证失败';
        } else {
			$imgurl=urldecode($resultJson->payUrl);
			//QRcode::png(urldecode($resultJson->payUrl));

        }
    } else {
       $error=$resultJson->resDesc;
    }

//    var_dump($result);exit;

function showEWM($payUrl) {
    header("location:WxpayAPI_php_v3/example/qrcode.php?data=".$payUrl);
}

?>
<html>
<head>
	<meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" name="viewport" />
    <meta name=format-detection content="telphone=no" />
    <meta name=apple-mobile-web-app-capable content=yes />
    
    <title>彩票38</title>
    
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="uploadimg/wapicon/icon-57.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="uploadimg/wapicon/icon-72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="uploadimg/wapicon/icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="uploadimg/wapicon/icon-144.png">
    
    <link rel="stylesheet" href="/assets/statics/css/style.css" type="text/css">
    <link rel="stylesheet" href="/assets/statics/css/global.css" type="text/css">
    <script src="/assets/js/require.js" data-main="/assets/js/application/recharge"></script>
	<script src="/assets/js/require.config.js?v=2.11"></script>
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
	<style>
	    .mycss { background:#ec2929; border:0; border-radius: 5px; color: #fff; height:36x; font-size: 100%; line-height: 36px; width: 95%; margin:20px auto 0; display: block; outline: none;  }
	</style>
</head>
<body>
<div class="header">
	    <div class="headerTop">
	        <div class="ui-toolbar-left">
	            <button id="reveal-left">reveal</button>
	        </div>
	        <h1 class="ui-toolbar-title">充值</h1>
	        <div class="ui-bett-right">
	            <a class="bett-head" href="javascript:;"></a>
	        </div>
	    </div>
</div>
<!-- 菜单右侧tips -->
	<div class="beet-rig" style="height: 85px;display: none;">
	    <ul>
	        <li><a href="/index.php/cash/rechargeLog">充值记录</a></li>
	        <li style="border-color: #c91b1c;"><a href="common/kefu" target="_blank">在线客服</a></li>
	    </ul>
	</div>
	
	<div id="dialog" style="display: none;">
		<div class="recharge_box">
			<h2>请您在新打开的第三方页面进行操作</h2>
			<p>操作完成前请不要关闭该窗口！</p>
			<div class="recharge_edit">
				<a href="javascript:;" onclick="document.getElementById('layui-m-layer0').style.display='none';location.href='member/recharge/list';">充值已完成</a>
			</div>
		</div>
	</div>
<div class="scorllmain-content scorll-order top_bar bottom_bar" style="display:<?php if($imgurl!=''){echo 'none';}else{echo 'block';}?>"><?=$error?></div>
<!-- 微信支付第二步 - 扫码 -->
                        <div id="wechat_step2_scan" class="scorllmain-content scorll-order top_bar bottom_bar" style="display:<?php if($imgurl==''){echo 'none';}else{echo 'block';}?>">
                            <div class="wechat-order">
                               
                                <div class="we-or-tit">
                                    <h3>订单提交成功，请扫描以下二维码付款！</h3>
                                    <p>
                                        订单号：<span class="red" name="orderId" id="orderId_qr"><?=$orderno?></span><span class="copy_outer"><a id="wx_Pay" data-cp="orderId_2_s" name="cp_btn" class="we-blue">复制</a></span>　|　应付金额：<span class="red" id="qrmoney"><?=$args[0]['total_fee']?></span>元
                                    </p>
                                </div>
								<div id="code"><?php  
								  // echo $imgurl;
								 // echo  QRcode::png($imgurl);
								   QRcode::png($imgurl,'qrcode.png','L',6,2);
								  echo '<img src="/qrcode.png">'; ?> </div>
								  <div>
								
								  </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="pay-info-tit">
                                <div class="tip_input_blue bold">
                                    操作步骤：  
                                </div>
                                <div class="tips f12">
                                    <p>※ 1.截图保存二维码</p>
									<p>※ 2.手机登录<?php if($args[0]['pay_type']==10){echo '微信'; }else if($args[0]['pay_type']==20){echo "支付宝";}else if($args[0]['pay_type']==50){echo "QQ";}?>.</p>
                                    <p>※ 3.打开<?php if($args[0]['pay_type']==10){echo "微信"; }else if($args[0]['pay_type']==20){echo "支付宝";}else if($args[0]['pay_type']==50){echo "QQ";}?>扫一扫页面</p>
                                    <p>※ 4.打开保存二维码.即可到账</p>
                                    <p>※ 存款遇到问题？立即联络在线客服为您服务。</p>
                                </div>
								<button id="charge-btn" class="mycss" onclick="javascript :history.go(-1);">已完成</button>
                            </div>
                        </div>
	
						</body>
</html>