<?php
class Zst extends WebLoginBase
{
    public final function ajaxList(){
        $typeid = intval($_REQUEST['gid']);
        $g = intval($_REQUEST['pos']);

        if($typeid == 34){//六合彩
            $this->lhclist($typeid,$g);
        }
        $lastNo=$this->getGameLastNo($typeid);
        $nowtime = strtotime($lastNo['actionTime']);

        $info = $this->getRow('SELECT t.`id`,t.`codeList`,t.`title` FROM blast_type t WHERE t.`id`='.$typeid);
        $list_data = $this->getRows('SELECT t.`number`,t.`data` FROM blast_data t 
          WHERE t.`type` = '.$typeid.' and t.time <= '.$nowtime.'
          ORDER BY t.`time` DESC limit 20');

        if(empty($info['codeList'])){
            return null;
        }

        $number = explode(',',$info['codeList']);
        foreach ($number as &$value) {

            if($value < 10 && strlen($value) == 2){
                $zero = substr($value,0,1);
                if($zero == 0){
                    $value = substr($value,1,1);
                }
            }
        }

        $yl = array();
        $zd = array();
        foreach ($list_data as $kdata => $val_data) {
            $num = explode(',',$val_data['data']);
            $dqnum = $num[$g-1];
            foreach ($number as $knum => $vnum) {
                if ($dqnum == $vnum) {
                    $zd[$vnum] = $yl[$vnum];
                    $yl[$vnum] = 0;
                    $iOpenNum = $dqnum;
                    $list[$kdata]['iYL'.$vnum] = $yl[$vnum];
                }else{
                    $yl[$vnum] = $yl[$vnum]+1;
                    $zd[$vnum] = $yl[$vnum];
                    $list[$kdata]['iYL'.$vnum] = $yl[$vnum];
                }
            }

            $list[$kdata]['iOpenNum'] = $iOpenNum;
            $list[$kdata]['sGamePeriod'] = $val_data['number'];
        }


        foreach ($number as $knum1 => $vnum1) {
            $pjyl['iYLAvg'.$vnum1] = $yl[$vnum1]/2;
        }

        foreach ($number as $knum2 => $vnum2) {
            $zdyl['iYLMax'.$vnum2] = $zd[$vnum2];
        }
        $data = array(
            'Desc'=>'OK',
            'RecordCount'=>count($list_data),
            'Func'=>'BaseTrend09',
            'Records'=>$list,
            'Result'=>1,
        );
        die(json_encode(array_merge($data,$pjyl,$zdyl)));
    }

    private function lhclist($typeid,$g){
        $info['codeList'] = '01,02,03,04,05,06,07,08,09,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49';

        $sx = array(
            '1'=>'鸡',
            '2'=>'猴',
            '3'=>'羊',
            '4'=>'马',
            '5'=>'蛇',
            '6'=>'龙',
            '7'=>'兔',
            '8'=>'虎',
            '9'=>'牛',
            '10'=>'鼠',
            '11'=>'猪',
            '12'=>'狗',
            '13'=>'鸡',
            '14'=>'猴',
            '15'=>'羊',
            '16'=>'马',
            '17'=>'蛇',
            '18'=>'龙',
            '19'=>'兔',
            '20'=>'虎',
            '21'=>'牛',
            '22'=>'鼠',
            '23'=>'猪',
            '24'=>'狗',
            '25'=>'鸡',
            '26'=>'猴',
            '27'=>'羊',
            '28'=>'马',
            '29'=>'蛇',
            '30'=>'龙',
            '31'=>'兔',
            '32'=>'虎',
            '33'=>'牛',
            '34'=>'鼠',
            '35'=>'猪',
            '36'=>'狗',
            '37'=>'鸡',
            '38'=>'猴',
            '39'=>'羊',
            '40'=>'马',
            '41'=>'蛇',
            '42'=>'龙',
            '43'=>'兔',
            '44'=>'虎',
            '45'=>'牛',
            '46'=>'鼠',
            '47'=>'猪',
            '48'=>'狗',
            '49'=>'鸡'
        );

        $list_data = $this->getRows('SELECT t.`number`,t.`data` FROM blast_data t WHERE t.`type` = '.$typeid.' ORDER BY t.`number` DESC limit 20');

        $number = explode(',',$info['codeList']);
        foreach ($number as &$value) {

            if($value < 10 && strlen($value) == 2){
                $zero = substr($value,0,1);
                if($zero == 0){
                    $value = substr($value,1,1);
                }
            }
        }

        $yl = array();
        $zd = array();
        foreach ($list_data as $kdata => $val_data) {
            $num = explode(',',$val_data['data']);
            $dqnum = $num[$g-1];
            foreach ($number as $knum => $vnum) {
                if ($dqnum == $vnum) {
                    $zd[$vnum] = $yl[$vnum];
                    $yl[$vnum] = 0;
                    $iOpenNum = $dqnum;
                    $list[$kdata]['iYL'.$vnum] = $yl[$vnum];
                }else{
                    $yl[$vnum] = $yl[$vnum]+1;
                    $zd[$vnum] = $yl[$vnum];
                    $list[$kdata]['iYL'.$vnum] = $yl[$vnum];
                }
            }

            $list[$kdata]['iOpenNum'] = $iOpenNum;
            $list[$kdata]['sGamePeriod'] = $val_data['number'];
        }


        foreach ($number as $knum1 => $vnum1) {
            $pjyl['iYLAvg'.$vnum1] = $yl[$vnum1]/2;
        }

        foreach ($number as $knum2 => $vnum2) {
            $zdyl['iYLMax'.$vnum2] = $zd[$vnum2];
        }
        $data = array(
            'Desc'=>'OK',
            'RecordCount'=>count($list_data),
            'Func'=>'BaseTrend09',
            'Records'=>$list,
            'Result'=>1,
        );
        die(json_encode(array_merge($data,$pjyl,$zdyl)));
    }
}