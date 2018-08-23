<?php

class Deposit extends WebLoginBase
{
    public final function depositProcess()
    {
        $list_bank = $this->getRows('select *,t2.* from blast_sysadmin_bank t1 left join blast_bank_list t2 on t1.bankId = t2.id where t1.id not in (3,4,8,9,2)');

        foreach ($list_bank as &$value) {
            $value['sReceiverAddr'] = $value['bankname']?$value['bankname']:'无';
            $value['sReceiverName'] = $value['username'];
            $value['sReceiverBank'] = $value['name'];
            $value['sReceiverAccount'] = $value['account'];
        }

        $data = array(
            'Desc' => 'ok',
            'status' => 1,
            'Records' => $list_bank
        );
        return array_merge($data,$this->inRecharge());
    }

    public final function depositSucess()
    {
        $data = array(
            'Desc' => 'ok',
            'status' => 1
        );
        return $data;
    }


    /* 进入充值，生产充值订单 */
    public function inRecharge()
    {

        if (!$_POST) throw new Exception('参数出错');
        //$para['mBankId'] = intval($_POST['mBankId']);
        $para['amount'] = floatval($_POST['amount']);
        $userName = trim($_POST['userName']);

        /*if ($para['amount'] <= 0) throw new Exception('充值金额错误，请重新操作');
        if ($id = $this->getValue("select bankId from {$this->prename}sysadmin_bank where id=?", $para['mBankId'])) {
            if ($para['amount'] < $this->settings['rechargeMin'] || $para['amount'] > $this->settings['rechargeMax']) throw new Exception('充值最低' . $this->settings['rechargeMin1'] . '元，最高' . $this->settings['rechargeMax1'] . '元');
        } else {
            throw new Exception('充值银行不存在，请重新选择');
        }*/

        // 插入充值请求表
        unset($para['coinpwd']);
        $para['rechargeId'] = $this->getRechId();
        $para['actionTime'] = $this->time;
        $para['uid'] = $this->user['uid'];
        $para['username'] = $userName;
        $para['actionIP'] = $this->ip(true);
        $para['info'] = '用户充值';
        //$para['bankId'] = $id;

        if ($this->insertRow($this->prename . 'member_recharge', $para)) {
            return array('orderId'=>$para['rechargeId'],'userName'=>$para['username'],'amount'=>$para['amount']);
        } else {
            throw new Exception('充值订单生产请求出错');
        }

        //清空验证码session
        unset($_SESSION[$this->vcodeSessionName]);
    }

    public final function getRechId()
    {
        $rechargeId = mt_rand(100000, 999999);
        if ($this->getRow("select id from {$this->prename}member_recharge where rechargeId=$rechargeId")) {
            getRechId();
        } else {
            return $rechargeId;
        }
    }
}