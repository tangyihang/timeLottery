<?php
class Index extends WebLoginBase{
	public $pageSize=10;
	
	public final function game($type=null, $groupId=null, $played=null){
		if($type) $this->type=intval($type);
		if($groupId){
			$this->groupId=intval($groupId);
		}else{
			// 默认进入定位胆玩法
			$this->groupId=6;
		}
		if($played) $this->played=intval($played);
		$this->getSystemSettings();
		$this->display('main.php');
	}
		public final function f5f($type){
		$this->type=intval($type);
		$this->display('index/cai_5fc.php');
	}
	//中奖排行榜
	public final function getBonus(){
		 $sql = "select member.nickname,ssctype.shortName,bet.zjCount,bet.bonus,bet.kjTime from {$this->prename}bets as bet inner join {$this->prename}members as member on bet.uid = member.uid inner join {$this->prename}type as ssctype on bet.type = ssctype.id where zjCount >0 and bonus>0 order by bet.kjTime desc limit 10;";
         $list = $this->getRows($sql);
         return json_encode($list);
	}
	//获得彩种开奖号码
	public final function getActionNo(){
		$type=$_POST['type'];
		$sum=$_POST['sum'];
		if(intval($type)<1||intval($sum)<1) return '提交参数出错';
		$sql="select * from {$this->prename}data where type={$type} order by time desc limit {$sum}";
		$list = $this->getRows($sql);
		return json_encode($list);
	}
  //平台首页
	public final function main(){
		$sql="select * from {$this->prename}content where enable=1 and nodeId=1";
		$sql.=' order by id desc';
		$info=$this->getPage($sql, $this->page, $this->pageSize);
		$this->action='notice';
		$this->display('index.php',0,$info);
	}
	
	public final function group($type, $groupId){
		$this->type=intval($type);
		$this->groupId=intval($groupId);
		$this->display('index/load_tab_group.php');
	}
	
	public final function played($type,$playedId){
		$playedId=intval($playedId);
		$sql="select type, groupId, playedTpl from {$this->prename}played where id=?";
		$data=$this->getRow($sql, $playedId);
		$this->type=intval($type);
		if($data['playedTpl']){
			$this->groupId=$data['groupId'];
			$this->played=$playedId;
			$this->display("index/game-played/{$data['playedTpl']}.php");
		}else{
			$this->display('index/game-played/un-open.php');
		}
	}
	
	public final function ratio(){
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
	public final function playTips($playedId){
		$this->display('index/inc_game_tips.php', 0, intval($playedId));
	}
	
	public final function getQiHao($type){
		$type=intval($type);
		$thisNo=$this->getGameNo($type);
		return array(
			'lastNo'=>$this->getGameLastNo($type),
			'thisNo'=>$this->getGameNo($type),
			'diffTime'=>strtotime($thisNo['actionTime'])-$this->time,
			'validTime'=>$thisNo['actionTime'],
			'kjdTime'=>$this->getTypeFtime($type)
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
	public final function getHistoryData($type){
		$this->type=intval($type);
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
	public final function historyList($type){
	    $this->type=intval($type);
		$this->display('index/history-list.php',$pageSize,$type);
	}
	
	public final function getLastKjData($type){
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
	}
	
	// 加载人员信息框

	    public final function usercenter_xtgg()
    {
        $this->display('usercenter_xtgg.php');
    }

	// 加载消息
	public final function msg(){
		$this->display('index/inc_msg.php');
	}

	//获得用户信息
	public final function getUserInfo(){
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
}