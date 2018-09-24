<?php

class Index extends WebLoginBase
{
    public $pageSize = 10;
    public $code = '';

    public final function game($type = null, $groupId = null, $played = null, $code = null)
    {
        if ($type) $this->type = intval($type);
        if ($groupId) {
            $this->groupId = intval($groupId);
        } else {
            // 默认进入定位胆玩法
            $this->groupId = 6;
        }
        if ($played) $this->played = intval($played);
        if ($code) $this->code = $code;
        $this->getSystemSettings();
        $this->display('main.php');
    }

    public final function f5f($type)
    {
        $this->type = intval($type);
        $this->display('index/cai_5fc.php');
    }

    //中奖排行榜
    public final function getBonus()
    {
        $sql = "select member.nickname,ssctype.shortName,bet.zjCount,bet.bonus,bet.kjTime from {$this->prename}bets as bet inner join {$this->prename}members as member on bet.uid = member.uid inner join {$this->prename}type as ssctype on bet.type = ssctype.id where zjCount >0 and bonus>0 order by bet.kjTime desc limit 20;";
        $list = $this->getRows($sql);
        return json_encode($list);
    }

    //获得彩种开奖号码
    public final function getActionNo()
    {
        $type = $_POST['type'];
        $sum = $_POST['sum'];
        if (intval($type) < 1 || intval($sum) < 1) return '提交参数出错';
        $sql = "select * from {$this->prename}data where type={$type} order by time desc limit {$sum}";
        $list = $this->getRows($sql);
        return json_encode($list);
    }

    //平台首页
    public final function main()
    {
        $sql = "select * from {$this->prename}content where enable=1 and nodeId=1";
        $sql .= ' order by id desc';
        $info = $this->getPage($sql, $this->page, $this->pageSize);
        $this->action = 'notice';
        $this->display('index.php', 0, $info);
    }

    //购彩大厅
    public final function common()
    {
        $sql = "select * from {$this->prename}content where enable=1 and nodeId=1";
        $sql .= ' order by id desc';
        $info = $this->getPage($sql, $this->page, $this->pageSize);
        $this->action = 'notice';
        $this->display('common.php', 0, $info);
    }

    public final function help()
    {
        $sql = "select * from {$this->prename}content where enable=1 and nodeId=1";
        $sql .= ' order by id desc';
        $info = $this->getPage($sql, $this->page, $this->pageSize);
        $this->action = 'notice';
        $this->display('help.php', 0, $info);
    }

    //免费试玩
    public final function mfsw()
    {
        $sql = "select * from {$this->prename}content where enable=1 and nodeId=1";
        $sql .= ' order by id desc';
        $info = $this->getPage($sql, $this->page, $this->pageSize);
        $this->action = 'notice';
        $this->display('mfsw.php', 0, $info);
    }

    public final function group($type, $groupId)
    {
        $this->type = intval($type);
        $this->groupId = intval($groupId);
        $this->display('index/load_tab_group.php');
    }

    public final function played($type, $playedId)
    {
        $playedId = intval($playedId);
        $sql = "select type, groupId, playedTpl from {$this->prename}played where id=?";
        $data = $this->getRow($sql, $playedId);
        $this->type = intval($type);
        if ($data['playedTpl']) {
            $this->groupId = $data['groupId'];
            $this->played = $playedId;
            $this->display("index/game-played/{$data['playedTpl']}.php");
        } else {
            $this->display('index/game-played/un-open.php');
        }
    }

    public final function ratio()
    {
        // for($i=1;$i<50;$i++){
        // 	if($i<10){
        // 		$str = '0'.$i;
        // 	}else{
        // 		$str = $i;
        // 	}
        // 	$sql = "insert into ". $this->prename ."lhc_ratio values(null,47,'RteLO".$str."','".$str."',387,'','','')";
        // 	echo $sql;
        // 	//$this->insert($sql);
        // }
        // $sql1 = "insert into ". $this->prename ."lhc_ratio values(null,14,'RteZX2x','2肖',392,'','','')";
        // $sql2 = "insert into ". $this->prename ."lhc_ratio values(null,14,'RteZX3x','3肖',392,'','','')";
        // $sql3 = "insert into ". $this->prename ."lhc_ratio values(null,14,'RteZX4x','4肖',392,'','','')";
        // $sql4 = "insert into ". $this->prename ."lhc_ratio values(null,3.06,'RteZX5x','5肖',392,'','','')";
        // $sql5 = "insert into ". $this->prename ."lhc_ratio values(null,1.95,'RteZX6x','6肖',392,'','','')";
        // $sql6 = "insert into ". $this->prename ."lhc_ratio values(null,5.3,'RteZX7x','7肖',392,'','','')";
        // $sql7 = "insert into ". $this->prename ."lhc_ratio values(null,1.95,'RteZXd','总肖单',392,'','','')";
        // $sql8 = "insert into ". $this->prename ."lhc_ratio values(null,1.85,'RteZXs','总肖双',392,'','','')";
        // $sql10 = "insert into ". $this->prename ."lhc_ratio values(null,1.92,'RteZXY','羊',390,'','','')";
        // $sql9 = "insert into ". $this->prename ."lhc_ratio values(null,1.92,'RteZXJ','鸡',390,'','','')";
        // $sql11 = "insert into ". $this->prename ."lhc_ratio values(null,1.92,'RteZXG','狗',390,'','','')";
        // $sql12 = "insert into ". $this->prename ."lhc_ratio values(null,1.92,'RteZXZ','猪',390,'','','')";
        // $sql13 = "insert into ". $this->prename ."lhc_ratio values(null,1.98,'RteLOzt6wx','尾小',388,'6','','')";
        // $this->insert($sql1);
        // $this->insert($sql2);
        // $this->insert($sql3);
        // $this->insert($sql4);
        // $this->insert($sql5);
        // $this->insert($sql6);
        // $this->insert($sql7);
        // $this->insert($sql8);
        // $this->insert($sql9);
        // $this->insert($sql10);
        // $this->insert($sql11);
        // $this->insert($sql12);
        // $this->insert($sql13);
    }

    // 加载玩法介绍信息
    public final function playTips($playedId)
    {
        $this->display('index/inc_game_tips.php', 0, intval($playedId));
    }

    public final function getQiHao($type)
    {
        $type = intval($type);
        $thisNo = $this->getGameNo($type);
        return array(
            'lastNo' => $this->getGameLastNo($type),
            'thisNo' => $this->getGameNo($type),
            'diffTime' => strtotime($thisNo['actionTime']) - $this->time,
            'validTime' => $thisNo['actionTime'],
            'kjdTime' => $this->getTypeFtime($type)
        );
    }

    // 弹出追号层HTML
    public final function zhuiHaoModal($type)
    {
        $this->display('index/game-zhuihao-modal.php');
    }

    // 追号层加载期号
    public final function zhuiHaoQs($type, $mode, $count)
    {
        $this->type = intval($type);
        $this->display('index/game-zhuihao-qs.php', 0, $mode, $count);
    }

    // 加载历史开奖数据
    public final function getHistoryData($type)
    {
        $this->type = intval($type);
        $this->display('index/inc_data_history.php');
    }

    // 加载历史开奖数据2
    public final function getHistoryData2($type)
    {
        $this->type = intval($type);
        $this->display('index/inc_data_history2.php');
    }

    // 加载历史开奖数据3
    public final function getHistoryData3($type)
    {
        $this->type = intval($type);
        $this->display('index/inc_data_history3.php');
    }

    // 加载历史开奖数据2
    public final function getHistoryDataiframe($type)
    {
        $this->type = intval($type);
        $this->display('index/inc_data_iframe.php');
    }

    // 历史开奖HTML
    public final function historyList($type)
    {
        $this->type = intval($type);
        $this->display('index/history-list.php', $pageSize, $type);
    }

    /*	public final function getLastKjData($type){
                    $ykMoney=0;
                    $czName='重庆时时彩';
                    $this->type=intval($type);
                    if(!$lastNo=$this->getGameLastNo($this->type)) throw new Exception('查找最后开奖期号出错');
                    if(!$lastNo['data']=$this->getValue("select data from {$this->prename}data where type={$this->type} and number='{$lastNo['actionNo']}'"))
                    throw new Exception('获取数据出错');

                    $thisNo=$this->getGameNo($this->type);
                    $lastNo['actionName']=$czName;
                    $lastNo['thisNo']=$thisNo['actionNo'];
                    $lastNo['diffTime']=strtotime($thisNo['actionTime'])-$this->time;
                    $lastNo['kjdTime']=$this->getTypeFtime($type);
                    return $lastNo;
            }*/
    public final function getLastKjData($type)
    {
        $ykMoney = 0;
        $czName = '重庆时时彩';
        $this->type = intval($type);
        if (!$lastNo = $this->getGameLastNo($this->type)) {
            throw new Exception('查找最后开奖期号出错');
        }
        if (!$lastNo['data'] = $this->getValue("select data from {$this->prename}data where type={$this->type} and number='{$lastNo['actionNo']}'")) {
            // throw new Exception('获取数据出错');
        }

        $thisNo = $this->getGameNo($this->type);
        $lastNo['actionName'] = $czName;
        $lastNo['thisNo'] = $thisNo['actionNo'];
        $lastNo['diffTime'] = strtotime($thisNo['actionTime']) - $this->time;
        $lastNo['kjdTime'] = $this->getTypeFtime($type);
        return $lastNo;
    }

    // 加载人员信息框

    public final function usercenter_xtgg()
    {
        $this->display('usercenter_xtgg.php');
    }

    // 加载消息
    public final function msg()
    {
        $this->display('index/inc_msg.php');
    }

    //获得用户信息
    public final function getUserInfo()
    {
        unset($this->user['password']);
        unset($this->user['coinPassword']);
        unset($this->user['admin']);
        unset($this->user['regIP']);
        unset($this->user['parents']);
        unset($this->user['parentId']);
        unset($this->user['enable']);
        unset($this->user['isDelete']);
        unset($this->user['regTime']);
        unset($this->user['updateTime']);
        unset($this->user['type']);
        unset($this->user['sessionId']);
        unset($this->user['score']);
        unset($this->user['scoreTotal']);
        unset($this->user['sb']);
        unset($this->user['conCommStatus']);
        unset($this->user['lossCommStatus']);
        unset($this->user['todayget']);

        echo json_encode($this->user);
        die();
    }

    //获取开奖公告
    public final function getOpenLotteryNumber()
    {
        $id = '';
        $settings = $this->getSystemSettings();
        $id = $settings['openLotteryList'];
        $sql = "select  d.*,FROM_UNIXTIME(d.time) time,t.title from {$this->prename}data d,{$this->prename}type t,(
                  select type,max(time) as time from {$this->prename}data group by type
                )  a where a.type=d.type and a.time=d.time and d.type=t.id and t.enable = 1 order by t.sort";
        if ($id != '') {
            $sql .= " and d.type in (" . $id . ")";
        }
        $list = $this->getRows($sql);
        echo json_encode($list);
    }

    public final function hall()
    {
        $this->display('c38_gcdt.php');
    }

    //购彩大厅倒计时
    public final function getNextPeriod()
    {
        $items = array();
        $allID = array(86, 1, 20, 83, 34, 79, 87, 60, 63, 12, 81, 82, 7, 15, 16, 6, 9, 10);
        foreach ($allID as $id) {

            $r = $this->getLastKjData($id);
            if (empty($r["data"])) {
                $isOpen = 0;
            } else {
                $isOpen = 1;
            }
            array_push($items, array(
                "gameId" => $id,
                "name" => $r["actionName"],
                "issue" => $r["thisNo"],
                "issue1" => "235",
                "timeout" => $r["diffTime"],
                "url" => null,
                "lastIssue" => $r["actionNo"],
                "lastIssueNum" => str_replace(",", "|", $r["data"]),
                "endtime" => "1500957870000",
                "opentime" => "2018-07-25 12:45:00",
                "endDate" => 1500957870000,
                "openDate" => 1500957900000,
                "lastOpenDate" => null,
                "date" => "20170725",
                "isClose" => 0,
                "isOpen" => $isOpen
            ));
        }
        return array(
            "status" => 200,
            "data" => array(
                "items" => $items,
                "itemCount" => count($items)
            ),
            "token" => null,
            "expand" => null,
            "description" => "OK"
        );
    }

    //走势图
    public final function getzst($typeid)
    {
        $id = intval($typeid);
        $sscarray = array('1', '5', '12', '14', '60', '80', '83', '86', '87');
        $_3darray = array('9', '10', '69', '70');
        $k3array = array('79', '81', '82', '63');
        $_11x5array = array('6', '7', '15', '16', '67', '68');
		$pk10 = array('20', '85');
        $lhc = array('34');
        if (in_array($id, $sscarray)) {
            header('location: /zst/index.php?typeid=' . $id);
        } elseif (in_array($id, $_3darray)) {
            header('location: /zst/3d.php?typeid=' . $id);
        } elseif (in_array($id, $k3array)) {
            header('location: /zst/k3.php?typeid=' . $id);
        } elseif (in_array($id, $_11x5array)) {
            header('location: /zst/11x5.php?typeid=' . $id);
        } elseif (in_array($id, $lhc)) {
            header('location: /zst/lhc.php?typeid=' . $id);
        }elseif (in_array($id, $pk10)) {
            header('location: /zst/pk10.php?typeid=' . $id);
        } else {
            echo "<script>alert('当前彩种暂没有走势图')</script>";
        }
    }

    /**
     * @desc 获取近五期
     * @date 2017/8/17 10:00
     * @Version v10
     * @author 6046
     * @return uid | 用户id
     * @sample {}
     */
    public final function getnear()
    {
        $lotteryid = $_GET['lotteryid'];//类型
        $issue = $_GET['issue'];//期号

        if (empty($lotteryid) || empty($issue)) {
            return false;
        }

        $sql = "select * from {$this->prename}data where type={$lotteryid} and number <= {$issue} order by number desc limit 5";
        $list = $this->getRows($sql);
        foreach ($list as $key => $value) {
            $a[$key]['allcode'] = explode(',', $value['data']);
            $a[$key]['issue'] = $value['number'];
        }

        return json_encode($a);
    }

    public final function signData($xmldata = 'aaaa')
    {
        header("Content-type: text/html; charset=utf-8");
        $pi_key_content = file_get_contents('1.pem');
        $pi_key = openssl_get_privatekey($pi_key_content);
        //openssl_sign($xmldata, $sign, $pi_key, OPENSSL_ALGO_SHA1);
        openssl_sign($xmldata, $sign, $pi_key, OPENSSL_ALGO_MD5);
        openssl_free_key($pi_key);
        echo base64_encode($sign);
    }

    public final function notifyddb()
    {
        $k = fopen("log.txt", "a+");//此处用a+，读写方式打开，将文件指针指向文件末尾。如果文件不存在则尝试创建之
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

        $extra_return_param = $_POST["extra_return_param"];

        $signStr = "";

        if ($bank_seq_no != "") {
            $signStr = $signStr . "bank_seq_no=" . $bank_seq_no . "&";
        }

        if ($extra_return_param != "") {
            $signStr = $signStr . "extra_return_param=" . $extra_return_param . "&";
        }

        $signStr = $signStr . "interface_version=" . $interface_version . "&";

        $signStr = $signStr . "merchant_code=" . $merchant_code . "&";

        $signStr = $signStr . "notify_id=" . $notify_id . "&";

        $signStr = $signStr . "notify_type=" . $notify_type . "&";

        $signStr = $signStr . "order_amount=" . $order_amount . "&";

        $signStr = $signStr . "order_no=" . $order_no . "&";

        $signStr = $signStr . "order_time=" . $order_time . "&";

        $signStr = $signStr . "trade_no=" . $trade_no . "&";

        $signStr = $signStr . "trade_status=" . $trade_status . "&";

        $signStr = $signStr . "trade_time=" . $trade_time;


/////////////////////////////   RSA-S验证  /////////////////////////////////


        $dinpay_public_key = openssl_get_publickey($this->settings['duodebao_public_key']);
        $flag = openssl_verify($signStr, $dinpaySign, $dinpay_public_key, OPENSSL_ALGO_MD5);

        fwrite($k, $signStr);
        fwrite($k, $dinpaySign);
        fwrite($k, $dinpay_public_key);
        fclose($k);        ///////////////////////////   响应“SUCCESS” /////////////////////////////
        if ($flag) {
            if ($this->getValue("select count(*) from {$this->prename}member_recharge where state=0 and rechargeId=$order_no") == 0) {

            } else {

                $this->addCoin(array(
                    'liqType' => 1,
                    'uid' => $this->getValue("select uid from {$this->prename}member_recharge where state=0 and rechargeId=$order_no"),
                    'coin' => $order_amount,
                    'info' => "多得宝充值-$order_amount",
                    'extfield0' => 0
                ));
                $this->update("update {$this->prename}member_recharge set state=1 where rechargeId=$order_no");
            }
            echo "SUCCESS";
        } else {
            echo "Verification Error";
        }
    }

    /**
     * 获取中奖前五期
     * @param $type
     */
    public final function getDataFive()
    {
        $type = intval($_REQUEST['type']);
        $number = trim($_REQUEST['number']);
        $sql = "select * from {$this->prename}data where TYPE ={$type} and number <='{$number}' order by id DESC limit 5";
        $list = $this->getRows($sql);
        echo json_encode(array('results' => $list));
    }
}