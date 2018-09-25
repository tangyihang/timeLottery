<?php
/**
 * Created by PhpStorm.
 * User: chenhuagui
 * Date: 2017/5/3
 * Time: 09:49
 */
require_once "utils.php";
require_once 'phpqrcode.php';

$data = array();
if ($args[0]['bankId'] == '21') {
	//微信充值
	$data = $this->getRow("select * from {$this->prename}code where type=0 order by rand() limit 1");
} else if ($args[0]['bankId'] == '22') {
	//支付宝
	$data = $this->getRow("select * from {$this->prename}code where type=1 order by rand() limit 1");
} else {
	exit('充值异常！');
}

// var_dump($args[0]);
?>
<html>
<body>

<!-- 微信和支付宝第二步 - 扫码 -->
<div id="wechat_step2_scan" class="wechat-info" >
    <div class="wechat-order">
        <div class="we-or-left"></div>
        <div class="we-or-tit">
            <h3>订单提交成功，请扫描以下二维码付款！</h3>
            <p>
                编码：<span class="red" name="orderId" id="orderId_qr"><?=$args[0]['rechargeId']?></span><span class="copy_outer"><a id="wx_Pay" data-cp="orderId_2_s" name="cp_btn" class="we-blue">复制</a></span>　|　应付金额：<span class="red" id="qrmoney"><?=$args[0]['amount']?></span>元
            </p>
        </div>
		<div id="code"><img src="<?=$data['imgaddr']?>"></div>
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
            <p>※ 1.手机登录<?php if ($args[0]['pay_type'] == 21) {echo '微信手动充值';} else if ($args[0]['pay_type'] == 20) {echo "支付宝";} else if ($args[0]['pay_type'] == 50) {echo "QQ";}?>.</p>
            <p>※ 2.打开<?php if ($args[0]['pay_type'] == 10) {echo "微信";} else if ($args[0]['pay_type'] == 20) {echo "支付宝";} else if ($args[0]['pay_type'] == 50) {echo "QQ";}?>扫一扫页面</p>
            <p>※ 3.扫描电脑屏幕二维码.即可到账</p>
            <p>※ 存款遇到问题？立即联络在线客服为您服务。</p>
        </div>
    </div>
</div>
</body>
</html>