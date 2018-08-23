<?php

class Report extends WebLoginBase
{
    public $type;
    public $pageSize = 14;

    // ÕÊ±äÁÐ±í
    public final function coin($type = 0)
    {
        $this->type = intval($type);

        $this->display('report/coin.php');
    }

    public final function getList()
    {
        $this->getTypes();
        $this->getPlayeds();

        // 日期限制
        // if($_REQUEST['fromTime'] && $_REQUEST['toTime']){
        // 	$timeWhere=' and l.actionTime between '. strtotime($_REQUEST['fromTime']).' and '.strtotime($_REQUEST['toTime']);
        // }elseif($_REQUEST['fromTime']){
        // 	$timeWhere=' and l.actionTime >='. strtotime($_REQUEST['fromTime']);
        // }elseif($_REQUEST['toTime']){
        // 	$timeWhere=' and l.actionTime <'. strtotime($_REQUEST['toTime']);
        // }else{

        // 	if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $timeWhere=' and l.actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
        // }

        // 帐变类型限制
        if ($_POST['dataType']) {
            $liqTypeWhere = ' and liqType=' . intval($_POST['dataType']);
            if ($_POST['liqType'] == 2) $liqTypeWhere = ' and liqType between 2 and 3';
        }


        //用户限制
        $userWhere = " and u.uid={$this->user['uid']}";

        // 冻结查询
        if ($this->action == 'fcoinModal') {
            $fcoinModalWhere = 'and l.fcoin!=0';
        }

        $sql = "select b.type, b.playedId, b.actionNo, b.mode, l.liqType, l.coin, l.fcoin, l.userCoin, l.actionTime, l.extfield0, l.extfield1, l.info, u.username from {$this->prename}members u, {$this->prename}coin_log l left join {$this->prename}bets b on b.id=extfield0 where l.uid=u.uid $liqTypeWhere $timeWhere $userWhere $typeWhere $fcoinModalWhere and l.liqType not in(4,11,104) order by l.id desc";


        $list = $this->getPage($sql, $_POST['pageIndex'], 10);
        $d['data'] = $list;
        $d['status'] = 200;
        return $d;


    }

    public final function membercoin($type = 0)
    {
        $this->type = intval($type);
        $this->action = 'coinlog';
        $this->display('report/membercoin.php');
    }

    public final function coinlog($type = 0)
    {
        $this->type = intval($type);
        $this->display('report/coin-log.php');
    }

    // ×Ü½áËã²éÑ¯
    public final function count()
    {
        $this->action = 'countSearch';
        $this->display('report/count.php');
    }

    public final function countSearch()
    {
        $this->display('report/count-list.php');
    }

    public final function myspread()
    {
        $this->display('report/myspread.php');
    }

    public final function spread()
    {
        $this->display('report/spread.php');
    }

    public final function getListSpread()
    {
        $this->getTypes();
        $this->getPlayeds();

        // 帐变类型限制
        if ($_POST['dataType']) {
            $liqTypeWhere = ' and liqType=' . intval($_POST['dataType']);
            if ($_POST['liqType'] == 2) $liqTypeWhere = ' and liqType between 2 and 3';
        }


        //用户限制
        $userWhere = " and u.uid={$this->user['uid']}";

        // 冻结查询
        if ($this->action == 'fcoinModal') {
            $fcoinModalWhere = 'and l.fcoin!=0';
        }

        $sql = "select b.type, b.playedId, b.actionNo, b.mode, l.liqType, l.coin, l.fcoin, l.userCoin, l.actionTime, l.extfield0, l.extfield1, l.info, u.username from {$this->prename}members u, {$this->prename}coin_log l left join {$this->prename}bets b on b.id=extfield0 where l.uid=u.uid $liqTypeWhere $timeWhere $userWhere $typeWhere $fcoinModalWhere and l.liqType = 11 order by l.id desc";


        $list = $this->getPage($sql, $_POST['pageIndex'], 10);
        $d['data'] = $list;
        $d['status'] = 200;
        return $d;


    }
}
