<?php
class Record extends WebLoginBase{
	public $pageSize=20;
	public final function search(){
		
		$this->getTypes();
		$this->getPlayeds();
		$this->action='searchGameRecord';
		$this->display('record/search.php');
	}
	public final function win(){
		
		$this->getTypes();
		$this->getPlayeds();
		$this->display('record/win.php');
	}
	public final function getList(){
		$this->getTypes();
		$this->getPlayeds();
		$para=$_POST;
	
		if($para['state']==5){
			$whereStr = " and b.isDelete=1 ";
		}else{
			$whereStr = " and  b.isDelete=0 ";	
		}
		// 彩种限制
		if($para['type']){
			$para['type']=intval($para['type']);
			$whereStr .= " and b.type={$para['type']}";
		}
		
		// 时间限制
		if($para['fromTime'] && $para['toTime']){
			$whereStr .= ' and b.actionTime between '.strtotime($para['fromTime']).' and '.strtotime($para['toTime']);
		}elseif($para['fromTime']){
			$whereStr .= ' and b.actionTime>='.strtotime($para['fromTime']);
		}elseif($para['toTime']){
			$whereStr .= ' and b.actionTime<'.strtotime($para['toTime']);
		}else{
			
			if($GLOBALS['fromTime'] && $GLOBALS['toTime']){
				$whereStr .= ' and b.actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
			}
		}
		
		// 投注状态限制
		if($para['state']){
		switch($para['state']){
			case 1:
				// 已派奖
				$whereStr .= ' and b.zjCount>0';
			break;
			case 2:
				// 未中奖
				$whereStr .= " and b.zjCount=0 and b.lotteryNo!='' and b.isDelete=0";
			break;
			case 3:
				// 未开奖
				$whereStr .= " and b.lotteryNo=''";
			break;
			case 4:
				// 追号
				$whereStr .= ' and b.zhuiHao=1';
			break;
			case 5:
				// 撤单
				$whereStr .= ' and b.isDelete=1';
			break;
			}
		}
		
		// 模式限制
		$para['mode']=floatval($para['mode']);
		if($para['mode']) $whereStr .= " and b.mode={$para['mode']}";
		
	   //单号
	   $para['betId']=wjStrFilter($para['betId']);
	   if($para['betId'] && $para['betId']!='输入单号'){
		   if(!ctype_alnum($para['betId'])) throw new Exception('单号包含非法字符,请重新输入');
		   $whereStr .= " and b.wjorderId='{$para['betId']}'";
	   }
	   
	   //用户限制
	   $whereStr .= " and b.uid={$this->user['uid']}";

		$sql="select b.*, u.username,t.title from {$this->prename}bets b, {$this->prename}members u ,{$this->prename}type t where b.uid=u.uid and b.type=t.id";
		$sql.=$whereStr;
		// $pageIndex = ($para['pageIndex']-1) * 15;
		// $sql.=' order by id desc, actionTime desc Limit '.$pageIndex.',15';
		// $data=$this->getRows($sql);
		$sql.=' order by id desc, actionTime desc ';
		$data=$this->getPage($sql, $para['pageIndex'], 10);
		$reJson['status'] = '200';
		$reJson['data'] = $data;
		return $reJson;
	}
	public final function searchGameRecord(){
		$this->getTypes();
		$this->getPlayeds();
		$this->display('record/search-list.php');
	}
	
	public final function betInfo($id){
		$this->getTypes();
		$this->getPlayeds();
		$this->display('record/search-list.php', 0 , intval($id));
	}
	public final function bet(){
		$this->display('record/bet.php');
	}
}
