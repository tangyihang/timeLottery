<?php

@session_start();
class UserInfo extends WebLoginBase {

    //基础信息
    public final function baseInfo() {
        $this->display('userinfo/baseInfo.php');
    }

    //提款密码设置
    public final function drawPwd() {
        $sql      = "select * from {$this->prename}user_bank as ub inner join {$this->prename}bank_list as bl on ub.bankId = bl.id where uid = {$this->user['uid']}";
        $bankinfo = $this->getRow($sql);
        if ($bankinfo) {
            $this->display('userinfo/draw.php', 0, $bankinfo['account'] . '[' . $bankinfo['name'] . ']', $bankinfo['bankId']);
        } else if (isset($this->user['coinPassword']) && $this->user['coinPassword'] != "") {
            $this->display('userinfo/drawBank.php');
        } else {
            $this->display('userinfo/drawPwd.php');
        }
    }

    //设置提款密码
    public final function setDrawPwd() {
        $pwd  = $_POST['pwd'];
        $rpwd = $_POST['rpwd'];

        if ($pwd != $rpwd) {
            opJson('密码与确认密码不匹配', 1, null);
        }

        $len = strlen($pwd);
        if ($len < 6 || $len > 16) {
            opJson('密码长度需要大于6或小于16个字符', 1, null);
        }

        $lgpwd = $this->user['password'];
        $drpwd = md5($pwd);
        if ($lgpwd == $drpwd) {
            opJson('不能与登录密码相同', 1, null);
        }

        $sql = "update  {$this->prename}members set coinPassword = '{$drpwd}' where uid = {$this->user['uid']}";
        $r   = $this->update($sql);
        if ($r) {
            opJson('设置成功', 0, null);
        } else {
            opJson('设置失败', 1, null);
        }
    }

    //设置用户银行
    public final function setUserBank() {

        $bankName    = $_POST['bankName'];
        $userName    = $_POST['userName'];
        $province    = $_POST['province'];
        $city        = $_POST['city'];
        $bankAddress = $_POST['bankAddress'];
        $cardNo      = $_POST['cardNo'];
        $repPwd      = $_POST['repPwd'];

        $info['uid']        = $this->user['uid'];
        $info['admin']      = 0;
        $info['enable']     = 1;
        $info['bankId']     = $bankName;
        $info['username']   = $userName;
        $info['countname']  = $bankAddress;
        $info['account']    = $cardNo;
        $info['editEnable'] = 0;
        $info['xgTime']     = time();
        $info['bdTime']     = time();
        $info['usersr']     = 0;

        $r = $this->insertRow($this->prename . 'user_bank', $info);
        if ($r) {
            opJson('设置成功', 0, null);
        } else {
            opJson('设置失败', 1, null);
        }
    }

    /**
     * 提现申请
     */
    public final function ajaxToCash() {
        if (!$_POST) {
            opJson('参数出错', 1, null);
        }
        $repPwd = $_POST['repPwd'];
        if (md5($repPwd) != $this->user['coinPassword']) {
            opJson('提款密码不对', 1, null);
        }

        $para['bankinfo'] = $_POST['bankId'];
        $para['amount']   = $_POST['money'];
        $bank             = $this->getRow("select username,account,bankId,bdTime from {$this->prename}user_bank where uid=? and bankId='{$para['bankinfo']}'", $this->user['uid']);
        $bdTime           = $bank['bdTime'];
        $c1               = $this->settings['cashCondition1']; //单位小时
        $c1               = intval($c1) * 3600;
        if (time() - $bdTime < $c1) {
            $c1 = $c1 / 3600;
            opJson('提现请在绑卡' . $c1 . '小时以后进行，绑定卡时间' . date("Y-m-d H:i:s", $bdTime), 1, null);
        }

        $para['username'] = $bank['username'];
        $para['account']  = $bank['account'];
        $para['bankId']   = $bank['bankId'];
        unset($para['bankinfo']);
        if (!ctype_digit($para['amount'])) {
            opJson('提现金额包含非法字符', 1, null);
        }
        if ($para['amount'] <= 0) {
            opJson('提现金额只能为正整数', 1, null);
        }
        if ($para['amount'] > $this->user['coin']) {
            opJson('提款金额大于可用余额，无法提款', 1, null);
        }
        if ($this->user['coin'] <= 0) {
            opJson('可用余额为零，无法提款', 1, null);
        }

        //提示时间检查
        $cashFromTime = $this->settings['cashFromTime'];
        $cashToTime   = $this->settings['cashToTime'];
        $checkDayStr  = date('Y-m-d ', time());
        $maxDate      = strtotime($checkDayStr . "23:59" . ":59");

        $fromHour = explode(":", $cashFromTime);
        $fromM    = $fromHour[1];
        $fromHour = $fromHour[0];
        $endHour  = explode(":", $cashToTime);
        $endM     = $endHour[1];
        $endHour  = $endHour[0];

        $timeEnd1 = strtotime($checkDayStr . $cashToTime . ":00");
        if ($fromHour > $endHour && time() < $timeEnd1) {
            $timeBegin1 = strtotime($checkDayStr . "00:00:00");
            $timeEnd1   = strtotime($checkDayStr . "23:59:59");
        } elseif ($fromHour > $endHour) {
            $timeBegin1 = strtotime($checkDayStr . $cashFromTime . ":00");
            $timeEnd1   = strtotime($checkDayStr . "23:59:59");
            $timeEnd1   = $timeEnd1 + $endM * 60 + $endHour * 60 * 60;
        } elseif ($fromHour < $endHour) {
            $timeBegin1 = strtotime($checkDayStr . "00:00" . ":00");
        }
        if ($this->time < $timeBegin1 || $this->time > $timeEnd1) {
            opJson("提现时间：从" . $this->settings['cashFromTime'] . "到" . $this->settings['cashToTime'], 1, null);
        }

        //消费判断
        $cashAmout      = 0;
        $rechargeAmount = 0;
        $rechargeTime   = strtotime('00:00') - 2 * 24 * 3600;

        //提现条件
        $cashGetCondition = $this->settings['cashGetCondition'];

        if ($cashGetCondition) {

            $gRs = $this->getRow("select sum(case when rechargeAmount>0 then rechargeAmount else amount end) as rechargeAmount from {$this->prename}member_recharge where  uid={$this->user['uid']} and state in (1,2,9) and isDelete=0 and rechargeTime>=" . $rechargeTime);

            $rechargeAmount = floatval($gRs["rechargeAmount"]);

            if ($gRs) {
                $sql = "select sum(coin) from {$this->prename}coin_log where liqType = 186 and uid = {$this->user['uid']}";
                $fc  = $this->getValue($sql);

                $fc             = floatval($fc);
                $rechargeAmount = ($rechargeAmount + $fc) * ($cashGetCondition / 100);
            } else {
                opJson('消费流水未达到', 1, null);
            }
            if ($rechargeAmount) {
                //消费总额
                $cashAmout = $this->getValue("select sum(mode*beiShu*actionNum) from {$this->prename}bets where actionTime>={$rechargeTime} and uid={$this->user['uid']} and isDelete=0");
                if (floatval($cashAmout) < floatval($rechargeAmount)) {
                    opJson('消费流水未达到', 1, null);
                }
            }
        }

        //消费判断结束
        $this->beginTransaction();
        try {
            $this->freshSession();

            if ($this->user['coin'] < $para['amount']) {
                opJson('你帐户资金不足', 1, null);
            }

            // 查询最大提现次数与已经提现次数
            $time = strtotime(date('Y-m-d', $this->time));
            if ($times = $this->getValue("select count(*) from {$this->prename}member_cash where actionTime>=$time and uid=?", $this->user['uid'])) {

                $toCashFeeCount = $this->settings['toCashFeeCount'];
                $toCashMaxCount = $this->settings['toCashMaxCount'];

                if ($times >= $toCashMaxCount) {
                    opJson('对不起，今天你提现次数已达到最大限额，请明天再来', 1, null);
                }
                //开始收手续费了
                if ($times > $toCashFeeCount && $times < $toCashMaxCount) {
                    $toCashGreaterFeeCountRate = $this->settings['toCashGreaterFeeCountRate'];
                    $rate                      = $para['amount'] * ($toCashGreaterFeeCountRate / 100);
                    $para['amount']            = $para['amount']; //-$rate;
                    $para['rate']              = $toCashGreaterFeeCountRate;
                }
            }

            // 插入提现请求表
            $para['actionTime'] = $this->time;
            $para['uid']        = $this->user['uid'];
            if (!$this->insertRow($this->prename . 'member_cash', $para)) {
                opJson('提交提现请求出错', 1, null);
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
            //通知后台
            $this->insertRow($this->prename . 'admin_notifications', array(
                "type"       => 0,
                "msg"        => "提现" . $para['amount'] . "元",
                "push"       => 0,
                "actionTime" => microtime(),
            ));

            $this->commit();
            opJson('申请提现成功，提现将在10分钟内到帐，如未到账请联系在线客服。', 0, null);
        } catch (Exception $e) {
            $this->rollBack();
            opJson($e->getMessage(), 1, null);
        }
    }

    //修改密码
    public final function modifyPwd() {

        $pwd     = $_POST['pwd'];
        $rpwd    = $_POST['rpwd'];
        $opwd    = $_POST['opwd'];
        $pwdType = $_POST['pwdType'];

        if ($pwd != $rpwd) {
            opJson('新密码与确认密码不匹配', 1, null);
        }
        $len = strlen($rpwd);
        if ($len < 6 || $len > 16) {
            opJson('新密码长度有误,[6-16]个字符', 1, null);
        }
        if (!in_array($pwdType, array(1, 2))) {
            opJson('密码类型不正确', 1, null);
        }
        $oldpwd = null;
        if ($pwdType == 1) {
            $oldpwd = $this->user['password'];
        } else {
            $oldpwd = $this->user['coinPassword'];
            if ($oldpwd == '' || !isset($oldpwd)) {
                opJson('还未设置提款密码', 1, null);
            }
        }
        $rpwd = md5($rpwd);
        if ($oldpwd != md5($opwd)) {
            opJson('原始密码错误', 1, null);
        }
        if ($rpwd == $oldpwd) {
            opJson('不能与原始密码一样', 1, null);
        }
        if ($pwdType == 1) {
            $sql = "update  {$this->prename}members set password = '{$rpwd}' where uid = {$this->user['uid']}";
        } else {
            $sql = "update  {$this->prename}members set coinPassword = '{$rpwd}' where uid = {$this->user['uid']}";
        }
        $r = $this->update($sql);
        if ($r) {
            opJson('设置成功', 0, null);
        } else {
            opJson('设置失败', 1, null);
        }
    }
}