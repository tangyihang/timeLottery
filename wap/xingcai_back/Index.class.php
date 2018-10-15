<?php
class Index extends WebLoginBase
{
    public $pageSize = 10;
    
    public final function game($type = null, $groupId = null, $played = null)
    {
        if ($type)
            $this->type = intval($type);
        if ($groupId) {
            $this->groupId = intval($groupId);
        } else {
            // 默认进入定位胆玩法
            $this->groupId = 6;
        }
        if ($played)
            $this->played = intval($played);
        $this->getSystemSettings();
        if ($this->settings['picGG'])
            setcookie('pic-gg', $this->settings['picGG']);
        $this->display('main.php');
    }
	
	//游戏记录
	    public final function yxjl()
    {
        $this->display('index/inc_game_order_history_index.php');
    }
		
  //平台首页
    public final function main()
    {
            $this->display('index.php');
    }
    public final function draw()
    {
        $this->display('index/draw.php');
    }
    public final function mfsw()
    {
        $this->display('mfsw.php');
    }
     public final function drawList()
    {
        $id = $_GET['gameId'];
        if(intval($id)){
            $sql='select * from blast_type where id = '.$id;
            $data = $this->getRow($sql);
        }
        $this->display('index/drawList.php',0,$data);
    }
    public final function getDrawLists()
    {
        $gameId = $_POST['gameId'];
        $dayType = $_POST['dayType'];
        if(!intval($gameId)){
            return '参数错误';
        }
        if($dayType=='-1'){
            $time  = strtotime('-1 day 00:00:00', time());
            $times = strtotime('-1 day 23:59:59', time());
        }else if($dayType=='-2'){
            $time  = strtotime('-2 day 00:00:00', time());
            $times = strtotime('-2 day 23:59:59', time());
        }else{
            $time = strtotime(date('Ymd'));
            $times = strtotime(date('Ymd')) + 86400;
        }
        $lastNo = $this->getGameLastNo($gameId);
        $where = ' and time between '.$time.' and '.$times;
        $where .= ' and number < "'.$lastNo['actionNo'].'"';
        $sql = "select * from blast_data where type = ".$gameId;
        $sql.=$where;
        $sql.=" order by number desc";

        if($data = $this->getRows($sql)){
            $d['data']=$data;
            $d['time']=date('Y-m-d ', $time);
            $d['status']=200;
        }else{
            $d['status']=1;
            $d['msg']='无开奖数据';
        }
        return $d;
    }
    public final function getDraw(){
        //$sql="select t1.*,t2.title,t2.onGetNoed,t2.type as groups from  (select id,data,number,time,type from blast_data where id in (select max(id) from blast_data group by type))t1 , blast_type t2 where t1.type = t2.id and t2.enable=1 and t2.isDelete=0";
        $sql1 = 'select max(id) as id from blast_data group by type';
        $ids = $this->getRows($sql1);
        if(!empty($ids)){
            foreach ($ids as $value) {
                $ids_array[] = $value['id'];
            }
            $str_ids = implode(',',$ids_array);
        }else{
            $str_ids = 1;
        }
        $sql="select t1.*,t2.title,t2.onGetNoed,t2.type as groups from (
                select id,data,number,time,type from blast_data where id in ({$str_ids})
                )t1 , blast_type t2 
                where t1.type = t2.id and t2.enable=1 and t2.isDelete=0  and t2.id in (63,86,85,80,1,20,83,80)
                order by t1.time desc";
        $d['status']=100;
        if($data = $this->getRows($sql)){
            $d['data']=$data;
            $d['status']=200;
        }
        return $d;
    }
    public final function group($type, $groupId)
    {
        $this->type    = intval($type);
        $this->groupId = intval($groupId);
        $this->display('index/load_tab_group.php');
    }
    
    
    public final function group_new($type, $groupId)
    {
        $this->type    = intval($type);
        $this->groupId = intval($groupId);
        $this->display('index/load_tab_group_new.php');
    }
    
    public final function played($type, $playedId)
    {
        $sql        = "select type, groupId, playedTpl from {$this->prename}played where id=?";
        $data       = $this->getRow($sql, intval($playedId));
        $this->type = intval($type);
        if ($data['playedTpl']) {
            $this->groupId = $data['groupId'];
            $this->played  = intval($playedId);
           // $this->display('index/load_tab_group.php');
        } else {
    
        }
    }
    
    
    public final function played_new($type, $playedId)
    {
        $sql        = "select type, groupId, playedTpl from {$this->prename}played where id=?";
        $data       = $this->getRow($sql, intval($playedId));
        $this->type = intval($type);
        if ($data['playedTpl']) {
            $this->groupId = $data['groupId'];
            $this->played  = intval($playedId);
            $this->display('index/load_tab_group_new.php');
        } else {
         
        }
    }
	
	// 加载玩法介绍信息
    public final function playTips($playedId)
    {
        $this->display('index/inc_game_tips.php', 0, intval($playedId));
    }
    
    public final function getQiHao($type)
    {
        $type   = intval($type);
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
	public final function zhuiHaoModal($type){
		$this->display('index/game-zhuihao-modal.php');
	}
	
	// 追号层加载期号
	public final function zhuiHaoQs($type, $mode, $count){
		$this->type=intval($type);
		$this->display('index/game-zhuihao-qs.php', 0, $mode, $count);
	}
	
	// 加载历史开奖数据
    public final function getHistoryData($type)
    {
        $this->type = intval($type);
        $this->display('index/inc_data_history.php');
    }

	// 加载历史开奖数据2
	public final function getHistoryData2($type){
		$this->type=intval($type);
		$this->display('index/inc_data_history2.php');
	}

	// 加载历史开奖数据3
	public final function getHistoryData3($type){
		$this->type=intval($type);
		$this->display('index/inc_data_history3.php');
	}

	// 加载历史开奖数据2
	public final function getHistoryDataiframe($type){
		$this->type=intval($type);
		$this->display('index/inc_data_iframe.php');
	}

	// 历史开奖HTML
    public final function historyList($type)
    {
        $this->type = intval($type);
        $this->display('index/history-list.php', $pageSize, $type);
    }
	
    public final function getLastKjData($type)
    {
        $ykMoney    = 0;
        $czName     = '重庆时时彩';
        $this->type = intval($type);
        if (!$lastNo = $this->getGameLastNo($this->type)){
            throw new Exception('查找最后开奖期号出错');
		}
        if (!$lastNo['data'] = $this->getValue("select data from {$this->prename}data where type={$this->type} and number='{$lastNo['actionNo']}'")){
            // throw new Exception('获取数据出错');
		}
        
        $thisNo               = $this->getGameNo($this->type);
        $lastNo['actionName'] = $czName;
        $lastNo['thisNo']     = $thisNo['actionNo'];
        $lastNo['diffTime']   = strtotime($thisNo['actionTime']) - $this->time;
        $lastNo['kjdTime']    = $this->getTypeFtime($type);
        return $lastNo;
    }
	
	// 加载人员信息框
	public final function userInfo(){
		$this->display('index/inc_user.php');
	}
	    public final function usercenter_xtgg()
    {
        $this->display('usercenter_xtgg.php');
    }
    //公告
    public final function notice()
    {
        $this->display('notice/list.php');
    }
	// 加载消息
	public final function msg(){
		$this->display('index/inc_msg.php');
	}
	
	public final function hall(){
		$this->display('hall.php');
	}
	
    public final function getIosState()
    {
        $this->getSystemSettings();
        echo $this->settings['IosSwitch'];
    }
	//购彩大厅倒计时
	public final function getNextPeriod(){
		$items = array();
		$allID = array(86,1,20,83,34,85,63,79,87,60,12,81,82,7,15,16,6,9,10);
		foreach($allID as $id){
			
			$r = $this->getLastKjData($id);
			if(empty($r["data"])){
				$isOpen = 0;
			}else{
				$isOpen = 1;
			}
			array_push($items,array(
				"gameId"=> $id,
				"name"=> $r["actionName"],
				"issue"=> $r["thisNo"],
				"issue1"=> "235",
				"timeout"=> $r["diffTime"],
				"url"=> null,
				"lastIssue"=> $r["actionNo"],
				"lastIssueNum"=> str_replace(",","|",$r["data"]),
				"endtime"=> "1500957870000",
				"opentime"=> "2017-07-25 12:45:00",
				"endDate"=> 1500957870000,
				"openDate"=> 1500957900000,
				"lastOpenDate"=> null,
				"date"=> "20170725",
				"isClose"=> 0,
				"isOpen"=> $isOpen
			));
		}
		return array(
				"status" => 200,
				"data" => array(
					"items"=> $items,
					"itemCount"=> count($items)
				),
				"token"=> null,
				"expand"=> null,
				"description"=> "OK"
		);
	}

    public final function activity()
    {
        $sql="select * from {$this->prename}content where enable=1 and nodeId=1";
        $sql.=' order by id desc';
        $info=$this->getPage($sql, $this->page, $this->pageSize);
        $this->action='notice';
        $this->display('index/activity.php',0,$info);
    }

    public final function activity_info()
    {
        $id = $_REQUEST['id'];
        $this->display('index/activity_info.php',$id);
    }
}