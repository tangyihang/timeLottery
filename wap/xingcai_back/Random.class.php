<?php

class Random extends WebBase
{
    private $al = array(363, 364, 365, 366, 367, 368, 369,93,244,300,63,65,120,119,123,121,124,126,54,348,56,355,358,282,361,362,45,46,47,48,49,50,51,52,292);//拖胆
    private $a2 = array(197, 198, 199, 200, 201, 202, 16, 324, 17, 19, 325, 20, 23);//三星组选
    private $a3 = array(209, 211, 213, 214, 31, 33, 30, 35, 36, 15,60,157);//二星组选
    private $a4 = array(215, 223, 224, 220, 221, 222, 37, 142, 143, 261, 262, 263, 331, 42, 43, 44,144);//定胆
    private $a5 = array();

    /**
     *  机选号码
     */
    public final function getLotteryRandom($playid, $count = 1)
    {
        $actionNum = 1;
        $playid = $_REQUEST['playid'] ? $_REQUEST['playid'] : $playid;
        $count = $_REQUEST['count'] ? $_REQUEST['count'] : $count;
        $weiShu = $_REQUEST['weiShu'];

        if ($playid == 321 || $playid == 280) {
            $n = $this->getRandom321();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 320 || $playid == 318 || $playid == 335) {
            $n = $this->getRandom320();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 323 || $playid == 279) {
            $n = $this->getRandom323();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 328) {
            $n = $this->getRandom328();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 278 || $playid == 336) {
            $n = $this->getRandom278();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 329) {
            $n = $this->getRandom329();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 305 || $playid == 306 || $playid == 334) {
            $n = $this->getRandom305();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 29) {
            $n = $this->getRandom29();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 14) {
            $n = $this->getRandom14();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 333) {
            $n = $this->getRandom333();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 22 || $playid == 59) {
            $n = $this->getRandom22();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 337) {
            $n = $this->getRandom337();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 96) {
            $n = $this->getRandom96();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if ($playid == 301) {
            $n = $this->getRandom301();
            return json_encode(array('actionData' => $n['number'], 'actionNum' => (int)$n['actionNum']));
        }
        if (in_array($playid,array(225,227,226,228,229,230,231,232,233,234,235,236))) {
            $n = $this->getRandom225();
            return json_encode(array('actionData' => $n, 'actionNum' =>2));
        }
        if (in_array($playid,array(237,238,239,240,241,242,243))) {
            $n = $this->getRandom237();
            return json_encode(array('actionData' => $n, 'actionNum' =>1));
        }
        if ($playid == 265 || $playid == 266 || $playid == 73) {
            $n = $this->getRandom265();
            return json_encode(array('actionData' => $n, 'actionNum' => 1));
        }

        if ($playid == 72) {
            $n = $this->getRandom72();
            return json_encode(array('actionData' => $n, 'actionNum' => 1));
        }

        $sql = "select type,selectNum from {$this->prename}played where id=?";
        $row = $this->getRow($sql, $playid);
        $number = array();
        if ($row) {
            for ($i = 0; $i < $count; $i++) {
                switch ($row['type']) {
                    case 1://时时彩
                        $number[] = $this->getSSCRandom($row['selectNum'], $playid);
                        break;
                    case 5://时时彩
                        $number[] = $this->getSSCRandom($row['selectNum'], $playid);
                        break;
                    case 2://十一选五
                        $number[] = $this->get11x5Random($row['selectNum'], $playid);
                        break;
                    case 3://3d排三
                        $number[] = $this->get3dRandom($row['selectNum'], $playid);
                        break;
                    case 6://PK10
                        $number[] = $this->getPK10Random($row['selectNum'], $playid);
                        break;
                    case 9://快三
                        $number[] = $this->getK3Random($row['selectNum'], $playid);
                        break;
                    case 10://北京28
                        break;
                    case 11://六合彩
                        break;
                }
            }

        }

        if (in_array($playid, $this->a2)) {
            $n = str_replace(',', '', $number[0]['number']);
            if ($playid == 197 || $playid == 199 || $playid == 16) {
                $actionNum = 2;
            }
            if ($playid == 201 || $playid == 19) {
                $number = $this->getSSCRandom(2, $playid);
                $n = str_replace(',', '', $number['number']);
                $actionNum = 2;
            }
            if ($playid == 324 || $playid == 325) {
                $number = $this->getSSCRandom(2, $playid);
                $n = substr($number['number'], 0, 1) . ',' . substr($number['number'], 1, 1) . ',' . substr($number['number'], 1, 1);
            }
            if ($playid == 17 || $playid == 20 || $playid == 23) {
                $n = str_replace(',', '', $number[0]['number']);
            }
        } elseif (in_array($playid, $this->a3)) {
            if ($playid == 214 || $playid == 30 || $playid == 36 || $playid == 15 || $playid == 157) {
                $weiShu_a = explode(',', $weiShu);
                $number = $this->getSSCRandom(count($weiShu_a), $playid);
                for ($j = 0; $j < strlen($number['number']); $j++) {
                    $num[] = substr($number['number'], $j, 1);
                }
                $k = 0;
                for ($i = 0; $i < 5; $i++) {
                    switch ($weiShu_a[$i]) {
                        case 16:
                            $n[] = $num[$k];
                            $k++;
                            break;
                        case 8:
                            $n[] = $num[$k];
                            $k++;
                            break;
                        case 4:
                            $n[] = $num[$k];
                            $k++;
                            break;
                        case 2:
                            $n[] = $num[$k];
                            $k++;
                            break;
                        case 1:
                            $n[] = $num[$k];
                            $k++;
                            break;
                        default:
                            $n[] = '-';
                            break;
                    }
                }
                $n = implode(',', $n);
            } else {
                $n = str_replace(',', '', $number[0]['number']);
            }

        } elseif (in_array($playid, $this->a4)) {
            if ($playid == 215 || $playid == 37) {
                $n = $number[0]['number'] . ',-,-,-,-';
            } elseif ($playid == 223 || $playid == 224 || $playid == 142 || $playid == 143 || $playid == 262 || $playid == 263 || $playid == 331) {
                $n = substr($number[0]['number'], 0, 1) . ' ' . substr($number[0]['number'], 1, 1);
            } elseif ($playid == 220 || $playid == 221 || $playid == 42 || $playid == 43) {
                $n = $this->getRandom220();
            } elseif ($playid == 222 || $playid == 44 || $playid == 14) {
                $n = $this->getRandom220() . ',-,-,-';
            } else {
                $n = $number[0]['number'];
            }

            if ($playid == 261 || $playid == 144) {
                $n = substr($number[0]['number'], 0, 1) . ' ' . substr($number[0]['number'], 1, 1) . ' ' . substr($number[0]['number'], 2, 1);
            }
        } elseif (!in_array($playid, $this->al)) {
            $str = $number[0]['number'];
            if (strpos($str, ',')) {
                $n = $str;
            } else {
                for ($i = 0; $i < strlen($str); $i++) {
                    $n[] = substr($str, $i, 1);
                }
                $n = implode(',', $n);
            }
        } else {
            $n = $number[0]['number'];
            $actionNum = $number[0]['count'];
        }


        return json_encode(array('actionData' => $n, 'actionNum' => (int)$actionNum));
    }

    /*
    *时时彩机选
    */
    public function getSSCRandom($num, $playid)
    {
        $number = "";
        $zhixuan = array('2', '4', '6', '10', '12', '25');
        $hezhi = array('305', '303', '306', '318', '320', '328', '375', '376');
        $dxds = array('42', '43', '265', '266');
        $start = 0;
        $end = 0;
        $count = 1;
        if (in_array($playid, $zhixuan)) {
            $number = $this->getRandom($num, $num, 0, 9, 1, 0);
        } else if (in_array($playid, $hezhi)) {
            if ($playid == '303') {
                $start = 0;
                $end = 18;
            } else if ($playid == '305' || $playid == '306') {
                $start = 1;
                $end = 17;
            } else if ($playid == '318' || $playid == '320') {
                $start = 0;
                $end = 27;
            } else if ($playid == '328' || $playid == '375') {
                $start = 1;
                $end = 26;
            } else {
                $start = 3;
                $end = 24;
            }
            $number = $this->getRandom($num, $num, $start, $end, 0, 0);
            $count = intval($this->getCount($number, $playid));
        } else if (in_array($playid, $dxds)) {
            if ($playid == '42' || $playid == '43') {
                $number = implode(" ", $this->getRandomDXDS(2));
            } else {
                $number = implode(" ", $this->getRandomDXDS(3));
            }

        } else {
            $number = $this->getRandom($num, 1, 0, 9, 0, 0);
            $count = intval($this->getCount($number, $playid));
        }
        return array('number' => str_ireplace(" ", "", $number), 'count' => $count);
    }

    /*3d排三机选*/
    public function get3DRandom($num, $playid)
    {
        $number = "";
        $zhixun = array('57', '67', '69');
        $count = 1;
        if (in_array($playid, $zhixuan))//直选
        {
            $number = $this->getRandom($num, $num, 0, 9, 1, 0);
        } else if ($playid == '72')//大小单双
        {
            $number = implode(" ", $this->getRandomDXDS(2));
        } else if ($playid == '300')//直选和值
        {
            $number = $this->getRandom(1, 1, 0, 27, 0, 0);
            $count = intval($this->getCount($number, $playid));
        } else if ($playid == '301')//组选和值
        {
            $number = $this->getRandom(1, 1, 1, 26, 0, 0);
            $count = intval($this->getCount($number, $playid));
        } else {
            $number = $this->getRandom($num, 1, 0, 9, 0, 0);
            $count = intval($this->getCount($number, $playid));
        }
        return array('number' => str_ireplace(" ", "", $number), 'count' => $count);
    }

    /*11选五机选*/
    public function get11x5Random($num, $playid)
    {
        if (in_array($playid,array(363, 364, 365, 366, 367, 368 ))) {
            $number = '(' . $this->get11x5RandomNumberOne(1, 3) . ' ' . $this->get11x5RandomNumberOne(4, 6) . ')' . $this->get11x5RandomNumberOne(7, 9) . ' ' . $this->get11x5RandomNumberOne(10, 11);
        } elseif($playid == 54 | $playid == 348 || $playid == 46){
            $number =$this->get11x5RandomNumberOne(1, 6) . ' ' . $this->get11x5RandomNumberOne(7, 11);
        }elseif(in_array($playid,array(47,48,358,355,56,49,50,51,52))){
            $number = $this->getRandom($num, $num, 1, 11, 0, 1);
            $number = str_replace(',',' ',$number);
        }else {
            $number = $this->getRandom($num, $num, 1, 11, 0, 1);
        }

        return array('number' => $number, 'count' => 1);
    }

    /*K3机选*/
    public function getK3Random($num, $playid)
    {
        $number = "";
        if ($playid == '118')//和值
        {
            $number = $this->getRandom($num, $num, 3, 18, 0, 0);
        } else if ($playid == '119')//三同号通选
        {
            $number = "111,222,333,444,555,666";
        } else if ($playid == '120')//三同号单选
        {
            $tong = mt_rand(1, 6);
            $number = $tong . $tong . $tong;
        } else if ($playid == '121')//二同号复选
        {
            $tong = mt_rand(1, 6);
            $number = $tong . $tong . '*';
        } else if ($playid == '122')//二同号单选
        {
            $number = $this->getRandom(2, 2, 1, 6, 0, 0);
            $number = substr($number, 0, 1) . $number;
        } else if ($playid == '123')//三不同号
        {
            $number = $this->getRandom(3, 1, 1, 6, 0, 0);
        } else if ($playid == '124')//二不同号
        {
            $number = $this->getRandom(2, 1, 1, 6, 0, 0);
        } else if ($playid == '125')//三连号通选
        {
            $number = "123,234,345,456";
        } else if ($playid == '126')//大小单双
        {
            $number = implode(" ", $this->getRandomDXDS(1));
        }

        return array('number' => $number, 'count' => 1);
    }

    /*PK10机选*/
    public function getPK10Random($num, $playid)
    {
        $number = "";
        $dxds = array('225', '226', '227', '228', '229', '230', '231', '232', '233', '234', '235', '236');
        $longhu = array('238', '239', '240', '241', '242', '243', '244');
        $zhixuan = array('93', '94', '95', '244');
        if (in_array($playid, $zhixuan))//直选
        {
            $number = $this->getRandom($num, $num, 0, 10, 0, 1);
        } else if (in_array($playid, $longhu))//龙虎
        {
            $number = $this->getRandomLH();
        } else if (in_array($playid, $dxds))//大小单双
        {
            $number = implode(" ", $this->getRandomDXDS(1));
        } else if ($playid == '246')//和值
        {
            $number = $this->getRandom(1, 1, 3, 19, 0, 0);
        } else if ($playid == '247')//冠亚军组合
        {
            $gyzh = $this->getRandomNumber(2, 1, 10);
            sort($gyzh);
            $number = implode("-", $gyzh);
        }
        return array('number' => $number, 'count' => 1);
    }

    /*随机选号 位数 选号个数 起止 是否可以相同 是否补0*/
    public function getRandom($num, $row, $start, $end, $diff, $bu)
    {
        $number = "";
        $array = array();
        if ($bu == 0) {
            $array = $this->getRandomNumber($num, $start, $end);
        } else {
            $array = $this->get11x5RandomNumber($num, $start, $end);
        }
        if ($diff == 1) {
            if ($row == $num) {
                for ($i = 0; $i < $num; $i++) {
                    $number .= rand($start, $end);
                    if ($i != $num - 1) {
                        $number .= ",";
                    }
                }
            } else {
                $number = implode(" ", $array);
            }
        } else {
            if ($row == $num) {
                $number = implode(",", $array);
            } else {
                $number = implode(" ", $array);
            }
        }
        return $number;

    }

    /**获取ssc随机数*/
    public function getRandomNumber($num, $start, $end)
    {
        $return = array();
        $count = 0;
        while ($count < $num) {
            $return[] = mt_rand($start, $end);
            $return = array_flip(array_flip($return));
            $count = count($return);
        }

        return $return;
    }

    /**获取大小单双随机数*/
    public function getRandomDXDS($row)
    {
        $return = array();
        $dxds = array('大', '小', '单', '双');
        $count = 0;
        while ($count < $row) {
            $return[] = iconv('gbk', 'utf-8',$dxds[mt_rand(0, 3)]);
            $count = count($return);
        }

        return $return;
    }

    /**获取龙虎随机数*/
    public function getRandomLH()
    {

        $dxds = array('龙', '虎');
        $return = $dxds[mt_rand(0, 1)];
        return $return;
    }

    /**获取11x5随机数*/
    public function get11x5RandomNumber($num, $start, $end)
    {
        $return = array();
        $count = 0;
        while ($count < $num) {
            $return[] = str_pad(mt_rand($start, $end), 2, "0", STR_PAD_LEFT);
            $return = array_flip(array_flip($return));
            $count = count($return);
        }

        return $return;
    }

    /**获取11x5随机数--获取一个号*/
    public function get11x5RandomNumberOne($start, $end)
    {
        return str_pad(mt_rand($start, $end), 2, "0", STR_PAD_LEFT);
    }

    /*获取注数*/
    public function getCount($number, $playid)
    {
        $ssczux_count = array('1', '2', '2', '4', '5', '6', '8', '10', '11', '13', '14', '14', '15', '15', '14', '14', '13', '11', '10', '8', '6', '5', '4', '2', '2', '1');
        $ssczx_count = array('1', '3', '6', '10', '15', '21', '28', '36', '45', '55', '63', '69', '73', '75', '75', '73', '69', '63', '55', '45', '36', '28', '21', '15', '10', '6', '3', '1');
        $ssc2zx_count = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '9', '8', '7', '6', '5', '4', '3', '2', '1');
        $ssc2zux_count = array('1', '1', '2', '2', '3', '3', '4', '4', '5', '4', '4', '3', '3', '2', '2', '1', '1');
        if ($playid == '300' || $playid == '318' || $playid == '320') {
            return $ssczx_count[intval($number)];
        } else if ($playid == '328' || $playid == '375' || $playid == '301') {
            return $ssczux_count[intval($number) - 1];
        } else if ($playid == '305' || $playid == '306') {
            return $ssc2zux_count[intval($number) - 1];
        } else if ($playid == '303') {
            return $ssc2zx_count[intval($number) - 1];
        } else if ($playid == '246') {
            return '1';
        } else if ($playid == '118') {
            return '1';
        } else if ($playid == '16' || $playid == '19' || $playid == '59' || $playid == '289' || $playid == '373') {
            return '2';
        } else {
            return '1';
        }
    }

    /**
     * @desc 玩法220 大小单双
     * @date 2017/9/9 10:09
     * @Version v10
     * @author 6046
     * @return uid | 用户id
     * @sample {}
     */
    public function getRandom220()
    {
        $w = array('大', '小', '单', '双');
        $q = array('大', '小', '单', '双');

        $wr = rand(0, 3);
        $wq = rand(0, 3);

        return iconv('gbk', 'utf-8', $w[$wr]) . ',' . iconv('gbk', 'utf-8', $q[$wq]);
    }

    /**
     * @desc 玩法220 大小单双
     * @date 2017/9/9 10:09
     * @Version v10
     * @author 6046
     * @return uid | 用户id
     * @sample {}
     */
    public function getRandom265()
    {
        $w = array('大', '小', '单', '双');
        $q = array('大', '小', '单', '双');
        $g = array('大', '小', '单', '双');


        $wr = rand(0, 3);
        $wq = rand(0, 3);
        $wg = rand(0, 3);

        return iconv('gbk', 'utf-8', $w[$wr]) . ',' . iconv('gbk', 'utf-8', $q[$wq]) . ',' . iconv('gbk', 'utf-8', $g[$wg]);
    }

    public function getRandom72()
    {
        $w = array('大', '小', '单', '双');
        $q = array('大', '小', '单', '双');


        $wr = rand(0, 3);
        $wq = rand(0, 3);

        return iconv('gbk', 'utf-8', $w[$wr]) . ',' . iconv('gbk', 'utf-8', $q[$wq]);
    }

    /**
     * @desc 功能描述
     * @date 2017/9/9 10:34
     * @Version v10
     * @author 6046
     * @return uid | 用户id
     * @sample {}
     */
    public function getRandom321()
    {
        $check = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
        $sele_count = array('10', '54', '96', '126', '144', '150', '144', '126', '96', '54');

        $r = rand(0, 9);

        return array('number' => $r, 'actionNum' => $sele_count[$r]);
    }

    /**
     * @desc 功能描述
     * @date 2017/9/9 10:34
     * @Version v10
     * @author 6046
     * @return uid | 用户id
     * @sample {}
     */
    public function getRandom320()
    {
        require 'Bet.class.php';
        $Bet = new Bet();
        $r = rand(0, 27);
        $actionNum = $Bet->sscqh3zhixhz($r);

        return array('number' => $r, 'actionNum' => $actionNum);
    }

    public function getRandom323()
    {
        $w = array('豹子', '顺子', '对子');
        $wr = rand(0, 3);
        $actionNum = 1;
        return array('number' => iconv('gbk', 'utf-8', $w[$wr]), 'actionNum' => $actionNum);
    }

    public function getRandom328()
    {
        $check = array('1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24', '25', '26');
        $selea = array('1', '2', '2', '4', '5', '6', '7', '10', '11', '13', '14', '14', '15', '15', '14', '14', '13', '11', '10', '8', '6', '5', '4', '2', '2', '1');
        $wr = rand(1, 26);
        return array('number' => $wr, 'actionNum' => $selea[$wr]);
    }

    public function getRandom278()
    {
        require 'Bet.class.php';
        $Bet = new Bet();
        $wr = rand(1, 26);
        $actionNum = $Bet->ssch3zxhz($wr);

        return array('number' => $wr, 'actionNum' => $actionNum);
    }

    public function getRandom329()
    {
        require 'Bet.class.php';
        $Bet = new Bet();
        $wr = rand(0, 9);
        $actionNum = $Bet->sscq2zxkd($wr);

        return array('number' => $wr, 'actionNum' => $actionNum);
    }

    public function getRandom305()
    {
        require 'Bet.class.php';
        $Bet = new Bet();
        $wr = rand(1, 17);
        $actionNum = $Bet->sscqh2zhuxhz($wr);

        return array('number' => $wr, 'actionNum' => $actionNum);
    }

    public function getRandom29()
    {
        return array('number' => rand(0, 9) . ',' . rand(0, 9) . ',-,-,-', 'actionNum' => 1);
    }

    public function getRandom14()
    {
        return array('number' => rand(0, 9) . ',' . rand(0, 9) . ',' . rand(0, 9) . ',-,-', 'actionNum' => 1);
    }

    public function getRandom333()
    {
        require 'Bet.class.php';
        $Bet = new Bet();
        $wr = rand(0, 18);
        $actionNum = $Bet->sscqh2zhixhz($wr);

        return array('number' => $wr, 'actionNum' => $actionNum);
    }

    public function getRandom22()
    {
        return array('number' => rand(0, 5) . rand(6, 9), 'actionNum' => 2);
    }

    public function getRandom337()
    {
        $rand1 = rand(0, 9);
        $rand2 = rand(0, 9);
        return array('number' => $rand1 . ',' . $rand2 . ',' . $rand2, 'actionNum' => 1);
    }

    public function getRandom96()
    {
        require 'Bet.class.php';
        $Bet = new Bet();
        $w1 = rand(1, 10);
        $w2 = rand(1, 10);
        $w3 = rand(1, 10);
        $w4 = rand(1, 10);
        $wr = $w1.','.$w2.','.$w3.','.$w4.',-,-,-,-,-,-';
        $actionNum = $Bet->dwd10($wr);

        return array('number' => $wr, 'actionNum' => $actionNum);
    }
    public function getRandom225()
    {
        $w = array('大', '小');
        $q = array('单', '双');

        $wr = rand(0,1);
        $wq = rand(0,1);

        return iconv('gbk', 'utf-8', $w[$wr]).iconv('gbk', 'utf-8', $q[$wq]);
    }
    public function getRandom237()
    {
        $w = array('龙', '虎');

        $wr = rand(0,1);

        return iconv('gbk', 'utf-8', $w[$wr]);
    }
    public function getRandom301()
    {
        require 'Bet.class.php';
        $Bet = new Bet();
        $wr = rand(1, 26);
        $actionNum = $Bet->fc3dzxhz($wr);

        return array('number' => $wr, 'actionNum' => $actionNum);
    }
}