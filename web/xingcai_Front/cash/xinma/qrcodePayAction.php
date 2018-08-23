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
            echo '签名验证失败';
        } else {
			$imgurl=urldecode($resultJson->payUrl);
			//QRcode::png(urldecode($resultJson->payUrl));

        }
    } else {
        echo $resultJson->resDesc;
		return;
    }

//    var_dump($result);exit;

function showEWM($payUrl) {
    header("location:WxpayAPI_php_v3/example/qrcode.php?data=".$payUrl);
}

?>
<html>
<body>

<!-- 微信支付第二步 - 扫码 -->
                        <div id="wechat_step2_scan" class="wechat-info" >
                            <div class="wechat-order">
                                <div class="we-or-left"></div>
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
                                <div class="clearfix pay-button">
                                    <a name="back_btn" >上一步</a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="pay-info-tit">
                                <div class="tip_input_blue bold">
                                    操作步骤：  
                                </div>
                                <div class="tips f12">
                                    <p>※ 1.手机登录<?php if($args[0]['pay_type']==10){echo '微信'; }else if($args[0]['pay_type']==20){echo "支付宝";}else if($args[0]['pay_type']==50){echo "QQ";}?>.</p>
                                    <p>※ 2.打开<?php if($args[0]['pay_type']==10){echo "微信"; }else if($args[0]['pay_type']==20){echo "支付宝";}else if($args[0]['pay_type']==50){echo "QQ";}?>扫一扫页面</p>
                                    <p>※ 3.扫描电脑屏幕二维码.即可到账</p>
                                    <p>※ 存款遇到问题？立即联络在线客服为您服务。</p>
                                </div>
                            </div>
                        </div>
</body>
</html>