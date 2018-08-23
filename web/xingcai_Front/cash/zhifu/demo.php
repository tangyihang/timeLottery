<?php 
error_reporting(0);

$rec = isset($_GET['rec']) ? $_GET['rec'] : '';

$pay = new Pay();

if ($rec == 'pay'){
    $pay->go_pay();
}
if ($rec == 'callbackurl'){
    $pay->callbank();
}

 
class Pay{  #接口类
    var $partner = null;

    public function __construct(){
        $this->partner = '11292';
        $this->key = '2fbc56e76659a23e4c8950e8d4a1d8ca';
        $this->pay_url = 'http://wgtj.gaotongpay.com/PayBank.aspx';
    }

    public function bank_array(){   #银行数组
        $bank = array("ICBC"=>"工商银行","ABC"=>"农业银行","CCB"=>"建设银行","BOC"=>"中国银行","CMB"=>"招商银行","BCCB"=>"北京银行","BOCO"=>"交通银行","CIB"=>"兴业银行","NJCB"=>"南京银行","CMBC"=>"民生银行","CEB"=>"光大银行","PINGANBANK"=>"平安银行","CBHB"=>"渤海银行","HKBEA"=>"东亚银行","NBCB"=>"宁波银行","CTTIC"=>"中信银行","GDB"=>"广发银行","SHB"=>"上海银行","SPDB"=>"上海浦东发展银行","PSBS"=>"中国邮政","HXB"=>"华夏银行","BJRCB"=>"北京农村商业银行","SRCB"=>"上海农商银行","SDB"=>"深圳发展银行","CZB"=>"浙江稠州商业银行","ALIPAY"=>"支付宝","ALIPAYWAP"=>"支付宝WAP","TENPAY"=>"财付通","WEIXIN"=>"微信","WEIXINWAP"=>"微信WAP");
        return $bank;

    }

    public function go_pay(){   #提交支付
        $data = array();
        $order_number = date('YmdHis');         #订单号
        $data['partner'] = $this->partner;      #商户号
        $data['banktype'] = 'WEIXIN';           #选择微信
        $data['paymoney'] = '1';                #金额 单位元
        $data['ordernumber'] = $order_number;   #订单号
        $data['callbackurl'] = 'http://' . $_SERVER['HTTP_HOST'] .'index.php/cash/notify'; #通知
        $data['attach'] = '11111';              #备注信息   不参与签名
        $data['sign'] = $this->array_to_sign($data);
        $pay_url = $this->pay_url . '?' .http_build_query($data);
        header("location:" . $pay_url);
 
    }

    public function array_to_sign($array){
        foreach ($array as $key => $v) {
            if ($key !== 'hrefbackurl' and $key !== 'attach'){    #hrefbackurl 不参与签名
                $url = $url .  $key  . '='  . $v  .  '&';
            }
        }
        $url = substr($url, 0,strlen($url) - 1) . $this->key;
        return md5($url); 
    }





}



?>

<html>
    <head>
        <meta http-equiv=Content-Type content="text/html;charset=utf-8">
        <title>接口测试</title>
    </head>
    <body>
        <h1><a href="?rec=pay">支付接口<?php $this->$rec ?></a></h1>
    </body>
</html>