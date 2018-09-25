<?php

@session_start();
class Cash extends WebLoginBase {

    public $pageSize          = 20;
    private $vcodeSessionName = 'blast_vcode_session_name';

    public final function toCash() {
        $this->display('cash/to-cash.php');
    }

    public final function toCashLog() {
        $this->display('cash/to-cash-log.php');
    }

    public final function toCashResult() {
        $this->display('cash/cash-result.php');
    }

    public final function recharge() {
        $this->display('cash/recharge.php');
    }
    public final function recharge2() {
        $this->display('cash/recharge2.php');
    }
    public final function recharge3() {
        $this->display('cash/recharge3.php');
    }

    public final function recharge4() {
        $this->display('cash/recharge4.php');
    }

    public final function rechargeLog() {
        if (!$this->user['type']) {
            throw new Exception('非法操作!');
        }

        $this->display('cash/recharge-log.php');
    }
    public final function rechargelist() {
        if (!$this->user['type']) {
            throw new Exception('非法操作!');
        }

        $this->display('cash/recharge-list.php');
    }

    public final function toCashlist() {
        $this->display('cash/to-cash-list.php');
    }
    public final function saoma() {
        $this->display('cash/saoma.php');
    }
    /*saoma */
    public final function qrRecharge() {
        if (!$_GET) {
            throw new Exception('参数出错');
        }

        $para['mBankId'] = intval($_GET['mBankId']);
        $para['amount']  = floatval($_GET['amount']);

        if ($para['amount'] <= 0) {
            throw new Exception('充值金额错误，请重新操作');
        }

        if ($id = $this->getValue("select bankId from {$this->prename}sysadmin_bank where id=?", $para['mBankId'])) {

            if ($id == 2 || $id == 3) {
                if ($para['amount'] < $this->settings['rechargeMin1'] || $para['amount'] > $this->settings['rechargeMax1']) {
                    throw new Exception('支付宝/财付通充值最低' . $this->settings['rechargeMin1'] . '元，最高' . $this->settings['rechargeMax1'] . '元');
                }

            } else {
                if ($para['amount'] < $this->settings['rechargeMin'] || $para['amount'] > $this->settings['rechargeMax']) {
                    throw new Exception('银行卡充值最低' . $this->settings['rechargeMin1'] . '元，最高' . $this->settings['rechargeMax1'] . '元');
                }

            }
        } else {
            throw new Exception('充值银行不存在，请重新选择');
        }
        if (strtolower($_GET['vcode']) != $_SESSION[$this->vcodeSessionName]) {
            throw new Exception('验证码不正确。');
        } else {
            // 插入充值请求表
            unset($para['coinpwd']);
            $para['rechargeId'] = $this->getRechId();
            $para['actionTime'] = $this->time;
            $para['uid']        = $this->user['uid'];
            $para['username']   = $this->user['username'];
            $para['actionIP']   = $this->ip(true);
            $para['info']       = '用户充值';
            $para['bankId']     = $id;

            if ($this->insertRow($this->prename . 'member_recharge', $para)) {
                $this->display('cash/saoma.php', 0, $para);
            } else {
                throw new Exception('充值订单生产请求出错');
            }
        }
        //清空验证码session
        unset($_SESSION[$this->vcodeSessionName]);

    }
    /**
     * 点卡充值
     */
    public final function card() {
        $this->display('cash/card.php');
    }
    public final function yanzheng() {
        if (!$_POST['amount']) {
            throw new Exception('提交数据出错，请重新操作!');
        }

        //检查卡密是否正确
        $sql     = "select * from {$this->prename}card where card_str=?";
        $isRight = $this->getRow($sql, $_POST['amount']);
        if (!$isRight) {
            throw new Exception('卡密不存在');
        }

        if ($isRight['status'] == 1) {
            throw new Exception('卡密已使用');
        }

        $update['id']       = $isRight['id'];
        $update['uid']      = $this->user['uid'];
        $update['useranme'] = $this->user['useranme'];
        $update['use_time'] = time();
        $update['status']   = 1;
        $sql                = "update {$this->prename}card set uid={$this->user['uid']}, username='{$this->user['username']}', use_time={$update['use_time']}, status={$update['status']} where id={$isRight['id']}";
        $cardResult         = $this->update($sql);

        $coinResult = $this->addCoin(array(
            //'uid'=>$this->user['uid'],
            'coin'      => intval($isRight['price']),
            'liqType'   => 111,
            'extfield0' => 0,
            'extfield1' => 0,
            'info'      => "卡密充值-{$_POST['amount']}",
        ));

        return '充值成功';

    }
    /**
     * 提现申请
     */
    public final function ajaxToCash() {
        if (!$_POST) {
            throw new Exception('参数出错');
        }

        //add 2017-07-19 测试帐户不能提款
        if ($this->user['parentId'] == 312) {
            throw new Exception('测试帐户不能提款');
        }

        $para['amount']   = $_POST['amount'];
        $para['coinpwd']  = $_POST['coinpwd'];
        $bank             = $this->getRow("select username,account,bankId from {$this->prename}member_bank where uid=? limit 1", $this->user['uid']);
        $para['username'] = $bank['username'];
        $para['account']  = $bank['account'];
        $para['bankId']   = $bank['bankId'];
        if (!ctype_digit($para['amount'])) {
            throw new Exception('提现金额包含非法字符');
        }

        if ($para['amount'] <= 0) {
            throw new Exception("提现金额只能为正整数");
        }

        if ($para['amount'] > $this->user['coin']) {
            throw new Exception("提款金额大于可用余额，无法提款");
        }

        if ($this->user['coin'] <= 0) {
            throw new Exception("可用余额为零，无法提款");
        }

        //提示时间检查
        $baseTime = strtotime(date('Y-m-d ', $this->time) . '06:00');
        $fromTime = strtotime(date('Y-m-d ', $this->time) . $this->settings['cashFromTime'] . ':00');
        $toTime   = strtotime(date('Y-m-d ', $this->time) . $this->settings['cashToTime'] . ':00');
        if ($toTime < $baseTime) {
            $toTime += 24 * 3600;
        }

        if ($this->time < $baseTime) {
            $fromTime -= 24 * 3600;
        }

        if ($this->time < $fromTime || $this->time > $toTime) {
            throw new Exception("提现时间：从" . $this->settings['cashFromTime'] . "到" . $this->settings['cashToTime']);
        }

        //消费判断
        $cashAmout      = 0;
        $rechargeAmount = 0;
        $rechargeTime   = strtotime('00:00');
        if ($this->settings['cashMinAmount']) {
            $cashMinAmount = $this->settings['cashMinAmount'] / 100;
            $gRs           = $this->getRow("select sum(case when rechargeAmount>0 then rechargeAmount else amount end) as rechargeAmount from {$this->prename}member_recharge where  uid={$this->user['uid']} and state in (1,2,9) and isDelete=0 and rechargeTime>=" . $rechargeTime);
            if ($gRs) {
                $rechargeAmount = $gRs["rechargeAmount"] * $cashMinAmount;
            }
            if ($rechargeAmount) {
                //消费总额
                $cashAmout = $this->getValue("select sum(mode*beiShu*actionNum) from {$this->prename}bets where actionTime>={$rechargeTime} and uid={$this->user['uid']} and isDelete=0");
                if (floatval($cashAmout) < floatval($rechargeAmount)) {
                    throw new Exception("消费满" . $this->settings['cashMinAmount'] . "%才能提现");
                }

            }
        } //消费判断结束
        $this->beginTransaction();
        try {
            $this->freshSession();
            if ($this->user['coinPassword'] != md5($para['coinpwd'])) {
                throw new Exception('资金密码不正确');
            }

            unset($para['coinpwd']);

            if ($this->user['coin'] < $para['amount']) {
                throw new Exception('你帐户资金不足');
            }

            // 查询最大提现次数与已经提现次数
            $time = strtotime(date('Y-m-d', $this->time));
            if ($times = $this->getValue("select count(*) from {$this->prename}member_cash where actionTime>=$time and uid=?", $this->user['uid'])) {
                $cashTimes = $this->getValue("select maxToCashCount from {$this->prename}member_level where level=?", $this->user['grade']);
                if ($times >= $cashTimes) {
                    throw new Exception('对不起，今天你提现次数已达到最大限额，请明天再来');
                }

            }

            // 插入提现请求表
            $para['actionTime'] = $this->time;
            $para['uid']        = $this->user['uid'];
            if (!$this->insertRow($this->prename . 'member_cash', $para)) {
                throw new Exception('提交提现请求出错');
            }

            $id = $this->lastInsertId();

            // 流动资金
            $this->addCoin(array(
                'coin'      => 0 - $para['amount'],
                'fcoin'     => $para['amount'],
                'uid'       => $para['uid'],
                'liqType'   => 106,
                'info'      => "提现[$id]资金冻结",
                'extfield0' => $id,
            ));

            $this->commit();
            return '申请提现成功，提现将在10分钟内到帐，如未到账请联系在线客服。';
        } catch (Exception $e) {
            $this->rollBack();
            //return 9999;
            throw $e;
        }
    }

    /**
     * 确认提现到帐
     */
    public final function toCashSure($id) {
        if (!$id = intval($id)) {
            throw new Exception('参数出错');
        }

        $this->beginTransaction();
        try {

            // 查找提现请求信息
            if (!$cash = $this->getRow("select * from {$this->prename}member_cash where id=$id")) {
                throw new Exception('参数出错');
            }

            if ($cash['uid'] != $this->user['uid']) {
                throw new Exception('您不能代别人确认');
            }

            switch ($cash['state']) {
            case 0:
                throw new Exception('提现已经确认过了');
                break;
            case 1:
                throw new Exception("提现请求正在处理中...");
                break;
            case 2:
                throw new Exception("该提现请求已经取消，冻结资金已经解除冻结\r\n如需要提现请重新申请");
                break;
            case 3:

                break;
            case 4:
                throw new Exception("该提现请求已经失败，冻结资金已经解除冻结\r\n如需要提现请重新申请");
                break;
            default:
                throw new Exception('系统出错');
                break;
            }

            if ($this->update("update {$this->prename}member_cash set state=0 where id=$id")) {
                $this->addCoin(array(
                    'liqType'   => 12,
                    'uid'       => $this->user['uid'],
                    'info'      => "提现[$id]资金确认",
                    'extfield0' => $id,
                ));
            }

        } catch (Exception $e) {
            $this->rollBack();
            throw $e;
        }
    }

    /* 进入充值，生产充值订单 */
    public final function inRecharge() {

        if (!$_POST) {
            throw new Exception('参数出错');
        }

        $para['mBankId'] = intval($_POST['mBankId']);
        $para['amount']  = floatval($_POST['amount']);

        if ($para['amount'] <= 0) {
            throw new Exception('充值金额错误，请重新操作');
        }

        /*if($id=$this->getValue("select bankId from {$this->prename}sysadmin_bank where id=?",$para['mBankId'])){
        if($id==2 || $id==20){
        if($para['amount']<$this->settings['rechargeMin1'] || $para['amount']>$this->settings['rechargeMax1']) throw new Exception('支付宝/微信充值最低'.$this->settings['rechargeMin1'].'元，最高'.$this->settings['rechargeMax1'].'元');
        }else{
        if($para['amount']<$this->settings['rechargeMin'] || $para['amount']>$this->settings['rechargeMax']) throw new Exception('银行卡充值最低'.$this->settings['rechargeMin1'].'元，最高'.$this->settings['rechargeMax1'].'元');
        }
        }else{
        //throw new Exception('充值银行不存在，请重新选择');
        $id=$para['mBankId'];
         */
        $id = $para['mBankId'];
        if ($id == 1) {
            $banktype = 'AILIPAY';
        } else if ($id == 2) {
            $banktype = 'WEIXIN';
        } else {
            $banktype = 'QQPAY';
        }
        /*if(strtolower($_POST['vcode'])!=$_SESSION[$this->vcodeSessionName]){
        throw new Exception('验证码不正确。');
        }else{*/
        // 插入充值请求表
        unset($para['coinpwd']);
        $para['rechargeId'] = $this->getRechId();
        $para['actionTime'] = $this->time;
        $para['uid']        = $this->user['uid'];
        $para['username']   = $this->user['username'];
        $para['actionIP']   = $this->ip(true);
        $para['info']       = '用户充值';
        $para['bankId']     = $id;

        if ($this->insertRow($this->prename . 'member_recharge', $para)) {
            //$this->display('cash/recharge-copy.php',0,$para);
            $data                = array();
            $data['partner']     = $this->settings['partner_id']; #商户号
            $data['banktype']    = $banktype; #选择微信
            $data['paymoney']    = $para['amount']; #金额 单位元
            $data['ordernumber'] = $para['rechargeId']; #订单号
            $data['callbackurl'] = 'http://' . $_SERVER['HTTP_HOST'] . '/index.php/cash/notify'; #通知
            $data['attach']      = '11111'; #备注信息   不参与签名
            $data['sign']        = $this->array_to_sign($data);
            // $data['payurl']='http://wgtj.gaotongpay.com/PayBank.aspx';http_build_query($data)
            //echo $pay_url;
            $this->display('cash/gaotong/demo.php', 0, $data);

        } else {
            throw new Exception('充值订单生产请求出错');
        }
        //}
        //清空验证码session
        //unset($_SESSION[$this->vcodeSessionName]);
    }
    public function array_to_sign($array) {
        foreach ($array as $key => $v) {
            if ($key !== 'hrefbackurl' and $key !== 'attach') {
                #hrefbackurl 不参与签名
                $url = $url . $key . '=' . $v . '&';
            }
        }
        $url = substr($url, 0, strlen($url) - 1) . $this->settings['gaotong_key'];
        return md5($url);
    }
    public final function getRechId() {
        $rechargeId = mt_rand(100000, 999999);
        if ($this->getRow("select id from {$this->prename}member_recharge where rechargeId=$rechargeId")) {
            getRechId();
        } else {
            return $rechargeId;
        }
    }
    /* 进入多得宝充值 */
    public final function DDBRecharge() {
        if (!$_POST) {
            throw new Exception('参数出错');
        }

        $uid             = intval($_POST['uid']);
        $para['mBankId'] = intval($_POST['mBankId']);
        $para['amount']  = floatval($_POST['amount']);

        $username = $this->getValue("select username from {$this->prename}members where uid=$uid");
        if ($username == '' || $uid <= 0) {
            throw new Exception('用户错误');
        }
        if ($para['amount'] <= 0) {
            throw new Exception('充值金额错误，请重新操作');
        }

        $id = $para['mBankId'];
        if ($id == 1) {
            $banktype = 'alipay,alipay_scan';
        } else if ($id == 2) {
            $banktype = 'weixin';
        } else if ($id == 3) {
            $banktype = 'QQ_scan';
        } else {
            $banktype = 'b2c';
        }

        // 插入充值请求表
        unset($para['coinpwd']);
        $para['rechargeId'] = $this->getRechId();
        $para['actionTime'] = $this->time;
        $para['uid']        = $uid;
        $para['username']   = $username;
        $para['actionIP']   = $this->ip(true);
        $para['info']       = '用户充值';
        $para['bankId']     = $id;
        if ($this->insertRow($this->prename . 'member_recharge', $para)) {
            //$this->display('cash/recharge-copy.php',0,$para);
            $data = array();

            $data['merchant_private_key'] = $this->settings['merchant_private_key'];
            $data['merchant_code']        = $this->settings['duodebao_id']; #商户号
            $data['banktype']             = $banktype; #选择微信
            $data['order_amount']         = $para['amount']; #金额 单位元
            $data['order_no']             = $para['rechargeId']; #订单号
            $data['notify_url']           = 'https://' . $_SERVER['HTTP_HOST'] . '/index.php/cash/notifyddb'; #通知//
            $data['product_name']         = '11111'; #备注信息   不参与签名
            // $data['payurl']='http://wgtj.gaotongpay.com/PayBank.aspx';http_build_query($data)

            $this->display('cash/ddb/bank_pay.php', 0, $data);

        } else {
            throw new Exception('充值订单生产请求出错');
        }

    }

    /* 进入多得宝充值 */
    public final function xmRecharge() {

        if (!$_POST) {
            throw new Exception('参数出错');
        }

        // var_dump($_POST);exit;

        $uid             = intval($_POST['uid']);
        $para['mBankId'] = intval($_POST['mBankId']);
        $para['amount']  = floatval($_POST['amount']);

        $username = $this->getValue("select username from {$this->prename}members where uid=$uid");
        if ($username == '' || $uid <= 0) {
            throw new Exception('用户错误');
        }
        if ($para['amount'] <= 0) {
            throw new Exception('充值金额错误，请重新操作');
        }

        $id = $para['mBankId'];
        if ($id == 20) {
            $banktype = '20';
        } else if ($id == 21) {
            $banktype = '21';
        } else if ($id == 3) {
            $banktype = '50';
        } else {
            $banktype = 'b2c';
        }

        $payData = array();
        if ($id == '21') {
            //微信充值
            $payData = $this->getRow("select * from {$this->prename}code where type=0 and status=1 order by rand() limit 1");
        } else if ($id == '22') {
            //支付宝
            $payData = $this->getRow("select * from {$this->prename}code where type=1 and status=1 order by rand() limit 1");
        } else {
            exit('充值异常！');
        }

        $data['payData'] = $payData;

        $para['payId'] = $payData['id'];

        // 插入充值请求表
        unset($para['coinpwd']);
        $para['rechargeId'] = $this->getRechId();
        $para['actionTime'] = $this->time;
        $para['uid']        = $uid;
        $para['username']   = $username;
        $para['actionIP']   = $this->ip(true);
        $para['info']       = '用户充值';
        $para['bankId']     = $id;
        if ($this->insertRow($this->prename . 'member_recharge', $para)) {

            $data['pay_type']   = $banktype;
            $data['bankId']     = $id;
            $data['amount']     = $para['amount'];
            $data['rechargeId'] = $para['rechargeId'];

            $this->display('cash/xinma/qrcodePayAction.php', 0, $data);
        } else {
            throw new Exception('充值订单生产请求出错');
        }

    }
    //充值提现详细信息弹出
    public final function rechargeModal($id) {
        $this->getTypes();
        $this->getPlayeds();
        $this->display('cash/recharge-modal.php', 0, $id);
    }
    public final function cashModal($id) {
        $this->getTypes();
        $this->getPlayeds();
        $this->display('cash/cash-modal.php', 0, $id);
    }

    //充值演示
    public final function paydemo($id) {
        $this->display('cash/paydemo.php', 0, $id);
    }
    //微信冲值
    public final function weixin() {
        $this->display('cash/zhifu/weixinapi/wxDinpay.php');
    }
    //回调
    public final function notifyxm() {
        $data = json_decode($GLOBALS['HTTP_RAW_POST_DATA']);

        $appKey = $this->settings['xinma_key']; //注意，Key是根据商户密钥去做调整, 跟DEMO下单页面填写的是一样的

        if ($data->resultCode == '00' && $data->resCode == '00') {

            $resultToSign = array();

            foreach ($data as $key => $value) {
                if ($key != 'sign') {
                    $resultToSign[$key] = $value;
                }
            }
            $str = $this->formatBizQueryParaMap($resultToSign);
            global $SignKey;
            $resultSign = strtoupper(md5($str . "&key=" . $appKey));

            if ($resultSign != $data->sign) {
                echo '签名验证失败';
            } else {
                //echo '订单通知支付成功';
                $responseToServer            = array();
                $responseToServer['resDesc'] = 'SUCCESS';
                $responseToServer['resCode'] = '00';
                if ($this->getValue("select count(*) from {$this->prename}member_recharge where state=0 and rechargeId=" . $resultToSign['outTradeNo']) == 0) {

                } else {

                    $this->addCoin(array(
                        'liqType'   => 1,
                        'uid'       => $this->getValue("select uid from {$this->prename}member_recharge where state=0 and rechargeId=" . $resultToSign['outTradeNo']),
                        'coin'      => intval($resultToSign['orderAmt']) / 100,
                        'info'      => "新码充值-" . intval($resultToSign['orderAmt']) / 100,
                        'extfield0' => 0,
                    ));
                    $this->update("update {$this->prename}member_recharge set state=1 where rechargeId=" . $resultToSign['outTradeNo']);
                }
                //返回给服务器
                echo json_encode($responseToServer);

                //注意，接入方系统要自己去更新相应订单的状态（建议根据outTradeNo）。而因为网络等原因，通知可能会触发多次，业务系统也要做好判断，防止同个订单被重复处理。
                //另外，前端页面要提示支付成功的，可以通过类似ajax持续去接入方后台数据库查订单状态。后台回调接收服务器的回调数据后更新订单状态为已支付。这时候ajax查询到已支付，页面就提示成功。
            }
        } else {
            echo $data->resDesc;
        }
    }

    function formatBizQueryParaMap($map, $urlencode = false) {

        ksort($map);
        $result = array();
        foreach ($map as $key => $value) {

            if ($value == null) {

                continue;

            }
            if ($urlencode) {

                $value = urlencode($value);

            }
            $result[$key] = $value;

        }
        return urldecode(http_build_query($result));

    }

    function sign($req, $signKey = '') {

        $str         = formatBizQueryParaMap($req);
        $req['sign'] = strtoupper(md5($str . "&key=" . $signKey));
        return $req;

    }
/**
 * 递归多维数组，进行urlencode
 * @param $array
 * @return mixed
 */
    function urlencode_array($array) {
        foreach ($array as $k => $v) {
            if (is_array($v)) {
                $array[$k] = urlencode_array($v);
            } else {
                $array[$k] = urlencode($v);
            }
        }
        return $array;
    }
    //回调
    public final function notify() {
        $partner     = isset($_GET['partner']) ? $_GET['partner'] : '';
        $ordernumber = isset($_GET['ordernumber']) ? $_GET['ordernumber'] : '';
        $orderstatus = isset($_GET['orderstatus']) ? $_GET['orderstatus'] : '';
        $paymoney    = isset($_GET['paymoney']) ? $_GET['paymoney'] : '';
        $sysnumber   = isset($_GET['sysnumber']) ? $_GET['sysnumber'] : '';
        $attach      = isset($_GET['attach']) ? $_GET['attach'] : '';
        $sign        = isset($_GET['sign']) ? $_GET['sign'] : '';

        $sign_str = 'partner=' . $partner . '&ordernumber=' . $ordernumber . '&orderstatus=' . $orderstatus . '&paymoney=' . $paymoney . $this->settings['gaotong_key'];

        if (md5($sign_str) == $sign) {
            if ($this->getValue("select count(*) from {$this->prename}member_recharge where state=0 and rechargeId=$ordernumber") == 0) {

            } else {

                $this->addCoin(array(
                    'liqType'   => 1,
                    'uid'       => $this->getValue("select uid from {$this->prename}member_recharge where state=0 and rechargeId=$ordernumber"),
                    'coin'      => $paymoney,
                    'info'      => "高通充值-$paymoney",
                    'extfield0' => 0,
                ));
                $this->update("update {$this->prename}member_recharge set state=1 where rechargeId=$ordernumber");
            }
            echo "ok";
        } else {
            echo "检测失败";
        }
    }

    public final function testcharg() {
        $merchant_private_key = '-----BEGIN PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAJ6MQRhxPT3/+EXa
zTzZAkoZM2msr+lnv2Mjbn3QJ0aJ4U4NM36e/1sV+EpSaxY0vdHdy/FIcAvKPGbv
zA98NJ/u5Qj7M2+u+M73bwurai/FW9H7iYyAmugEEikkEx+82AUrYnv/R1RRYXeU
P+pHpvZBZ/2j5pyQfsiRBnKM2PsNAgMBAAECgYB0JDnrNcivCjtMsKN312Ad96f5
2U5jpGRGs0XVVA3xVj99dZ4rOz3D86wWhZl8gtYqTld/QJkTieoFXdQV496Hwnot
BO3f9Ujr7jolwWfBet1AML1CIgA4mVxX/wa+TJQHOgxPOmO1UHuQMwIOfbolf86V
QWqZYuZRUjg/XvFw4QJBANK4IsnVtoVg74Sa2WPl0WebB9VOA4SIgoH7B1b8Zu7t
LzXMq170vKUupyFpWt3IjOYVewE4zIVQlSdO2HdsyKMCQQDAnh7OjReNHQHAWf+J
x9c070Wzv3c+As/ZmfYvYhKrm0xOo7cUgvhRHZvbYnm+X7z1g8w5I9YzMlvk3fHA
3fiPAkARw65DH748blii8D8Fefl2Z454gBQx1yRReu06exreZ6aEPZXw8mb48f7r
BSvA6MhgGU1+Y+ByGMIKR05eexBLAkEApCTbaffQrx+eA3ZujtKvcdvJ0XEDw+OP
jwdmRWDVOkqAj69ycFdgF3gc/qr/xp09oRfs7HC+tChhKTt+Lna6vwJAXgrPUP1p
14At9kV+YELRX5KKiWaFts0VkE/iQGUaALmqpojiS4Kho1j+BLp30e+Fn0BqL92h
7IwCUf+LAigxdw==
-----END PRIVATE KEY-----

';
        $xmldata = 'aaaaaaaaaaaaaaa';

        //$this->display('cash/ddb/bank_pay1.php');
        //echo phpinfo();exit;
        header("Content-type: text/html; charset=utf-8");
        $pi_key = openssl_get_privatekey($merchant_private_key);
        //openssl_sign($xmldata, $sign, $pi_key, OPENSSL_ALGO_SHA1);
        openssl_sign($xmldata, $sign, $pi_key, OPENSSL_ALGO_MD5);
        echo base64_encode($sign);
    }
    public final function notifyddb() {
        $k             = fopen("log.txt", "a+"); //此处用a+，读写方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之
        $merchant_code = $_POST["merchant_code"];

        $interface_version = $_POST["interface_version"];

        $sign_type = $_POST["sign_type"];

        $dinpaySign = base64_decode($_POST["sign"]);

        $notify_type = $_POST["notify_type"];

        $notify_id = $_POST["notify_id"];

        $order_no = $_POST["order_no"];

        $order_time = $_POST["order_time"];

        $order_amount = $_POST["order_amount"];

        $trade_status = $_POST["trade_status"];

        $trade_time = $_POST["trade_time"];

        $trade_no = $_POST["trade_no"];

        $bank_seq_no = $_POST["bank_seq_no"];

        $flag               = 1;
        $extra_return_param = $_POST["extra_return_param"];

        $signStr = "";

        if ($bank_seq_no != "") {
            $signStr = $signStr . "bank_seq_no=" . $bank_seq_no . "&";

        } else {
            $flag = 0;

        }

        if ($extra_return_param != "") {
            $signStr = $signStr . "extra_return_param=" . $extra_return_param . "&";
        }

        if ($interface_version != "") {
            # code...
            $signStr = $signStr . "interface_version=" . $interface_version . "&";

        } else {
            $flag = 0;
        }

        if ($merchant_code != "") {
            # code...
            $signStr = $signStr . "merchant_code=" . $merchant_code . "&";
        } else {
            $flag = 0;
        }

        if ($notify_id != "") {
            $signStr = $signStr . "notify_id=" . $notify_id . "&";
        }

        if ($notify_type != "") {
            $signStr = $signStr . "notify_type=" . $notify_type . "&";
        }

        if ($order_amount != "") {
            $signStr = $signStr . "order_amount=" . $order_amount . "&";

        } else {
            $flag = 0;
        }

        if ($order_no != "") {
            $signStr = $signStr . "order_no=" . $order_no . "&";
        }

        if ($order_time != "") {
            # code...
            $signStr = $signStr . "order_time=" . $order_time . "&";
        }

        if ($trade_no != "") {
            $signStr = $signStr . "trade_no=" . $trade_no . "&";
        }

        if ($trade_status != "" && $trade_status == "SUCCESS") {
            $signStr = $signStr . "trade_status=" . $trade_status . "&";
        } else {
            $flag = 0;
        }

        if ($trade_time != "") {
            $signStr = $signStr . "trade_time=" . $trade_time;
        }

/////////////////////////////   RSA-S验证  /////////////////////////////////

        //echo  $this->settings['duodebao_public_key'];

        $dinpay_public_key = openssl_get_publickey($this->settings['duodebao_public_key']);
        //$flag = openssl_verify($signStr,$dinpaySign,$dinpay_public_key,OPENSSL_ALGO_MD5);
        //echo $dinpay_public_key;
        fwrite($k, $flag);
        fwrite($k, $signStr);
        fclose($k); ///////////////////////////   响应“SUCCESS” /////////////////////////////
        if ($flag) {
            if ($this->getValue("select count(*) from {$this->prename}member_recharge where state=0 and rechargeId=$order_no") == 0) {

            } else {

                $this->addCoin(array(
                    'liqType'   => 1,
                    'uid'       => $this->getValue("select uid from {$this->prename}member_recharge where state=0 and rechargeId=$order_no"),
                    'coin'      => $order_amount,
                    'info'      => "多得宝充值-$order_amount",
                    'extfield0' => 0,
                ));
                $this->update("update {$this->prename}member_recharge set state=1 where rechargeId=$order_no");
            }
            echo "SUCCESS";
        } else {
            echo "Verification Error";
        }
    }
}