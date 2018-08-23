<?php
class Record extends WebLoginBase{
	public $pageSize=15;
	public final function search(){
		
		$this->getTypes();
		$this->getPlayeds();
		$this->action='searchGameRecord';
		$this->display('record/search.php');
	}

	public final function searchGameRecord(){
		$this->getTypes();
		$this->getPlayeds();
		$this->display('record/search-list.php');
	}
	
	public final function betInfo($id){
		$this->getTypes();
		$this->getPlayeds();
		$this->display('record/bet-info.php', 0 , intval($id));
	}
	public final function bet(){
		$this->display('record/bet.php');
	}
	
	//彩票记录
	public final function lotteryRecord(){
		$this->display('record/lotteryRecord.php');
	}


	//彩票记录
	public final function lhclotteryRecord(){
		$this->display('record/lhclotteryRecord.php');
	}

	//获得彩票记录
	public final function getLotteryRecordList(){


		$sortOrder = $_POST['sortOrder'];//:asc
		$ps = $_POST['pageSize'];//:10
		$pi = $_POST['pageNumber'];//:1
		$account = $_POST['account'];//:
		$startTime = $_POST['startTime'];//:2017-06-15 00:00:00
		$endTime = $_POST['endTime'];//:2017-06-15 23:59:59
		$status = $_POST['status'];//: 
		$qihao = $_POST['qihao'];//:
		$orderCode = $_POST['orderCode'];//:
		$code = $_POST['code'];//:

		$LHC = $_POST['LHC'];//:

       $sql_sum="SELECT sum(betinfo.`mode`*betinfo.beiShu*betinfo.actionNum*(betinfo.fpEnable+1)) as sum_bet,
			sum(betinfo.bonus) as sum_win FROM
			Z4r5jk12_type AS ltype
		INNER JOIN Z4r5jk12_bets AS betinfo ON ltype.id = betinfo.type
		INNER JOIN Z4r5jk12_played AS playinfo ON betinfo.playedId = playinfo.id
		INNER JOIN Z4r5jk12_members AS member ON member.uid = betinfo.uid
		where 1=1  and concat(',',member.parents,',') like '%,{$this->user['uid']},%'";

      
		$sql = "SELECT
			betinfo.wjorderId as orderId,
			member.username as account,
			ltype.`title` typename,
			playinfo.`name` playName,
			betinfo.actionTime as createTime,
			betinfo.actionData as haoMa,
			betinfo.actionNum,
			betinfo.actionNo as qiHao,
			betinfo.beiShu as multiple,
			betinfo.`mode` as model,
			(betinfo.`mode`*betinfo.beiShu*betinfo.actionNum*(betinfo.fpEnable+1)) as buyMoney,
			betinfo.bonus as winMoney,
			betinfo.zjCount,
			betinfo.lotteryNo,
			betinfo.isDelete,
			betinfo.zhuiHao
		FROM
			Z4r5jk12_type AS ltype
		INNER JOIN Z4r5jk12_bets AS betinfo ON ltype.id = betinfo.type
		INNER JOIN Z4r5jk12_played AS playinfo ON betinfo.playedId = playinfo.id
		INNER JOIN Z4r5jk12_members AS member ON member.uid = betinfo.uid
		where 1=1  ";
        $sql.="and concat(',',member.parents,',') like '%,{$this->user['uid']},%'";
        $sql.=" and betinfo.actionTime between ". strtotime($startTime)." and ".strtotime($endTime) ;

        $sql_sum.=" and betinfo.actionTime between ". strtotime($startTime)." and ".strtotime($endTime) ;
		if ($LHC=='lhc') {
			$sql.= " and (ltype.id = 34 or  ltype.id = 77) ";
			$sql_sum.= " and (ltype.id = 34 or  ltype.id = 77) ";
		}else{
			$sql.= " and ltype.id <> 34 ";
			$sql_sum.= " and ltype.id <> 34 ";
		}
       

		if (!empty($account)) {
			$sql.= " and member.username like '%{$account}%'";
			//$sql_sum.= " and member.username like '%{$account}%'";
		}
		

		// 投注状态限制
		if($status){
			switch($status){
				case 1:
					// 已派奖
					$sql .= ' and betinfo.zjCount>0';
					$sql_sum .= ' and betinfo.zjCount>0';
				break;
				case 2:
					// 未中奖
					$sql .= " and betinfo.zjCount=0 and betinfo.lotteryNo!='' and betinfo.isDelete=0";
					$sql_sum .= " and betinfo.zjCount=0 and betinfo.lotteryNo!='' and betinfo.isDelete=0";
				break;
				case 3:
					// 未开奖
					$sql .= " and betinfo.lotteryNo=''";
					$sql_sum .= " and betinfo.lotteryNo=''";
				break;
				case 4:
					// 追号
					$sql .= ' and betinfo.zhuiHao=1';
					$sql_sum .= ' and betinfo.zhuiHao=1';
				break;
				case 5:
					// 撤单
					$sql .= ' and betinfo.isDelete=1';
					$sql_sum .= ' and betinfo.isDelete=1';
				break;
			}
		}
		if (!empty($qihao)) {
			$sql.= " and betinfo.actionNo = '{$qihao}'";
			$sql_sum.= " and betinfo.actionNo = '{$qihao}'";
		}
		if (!empty($orderCode)) {
			$sql.= " and betinfo.wjorderId = '{$orderCode}'";	
			$sql_sum.= " and betinfo.wjorderId = '{$orderCode}'";
		}

		// if (intval($code)) {
		// 	$sql.= " and ltype.id = {$code}";	
		// }
          $info = $this->getRow($sql_sum);
		$pinfo = PageInfo($ps,$pi);

		$listc = $this->getRows($sql);

		$pagecount = count($listc);

		$sql.=" limit {$pinfo[0]},{$pinfo[1]}; ";
		
		$list = $this->getRows($sql);

		$r['total'] = $pagecount;
		$r['rows'] = $list;
        $r['aggsData']['winSum'] = $info['sum_win'];
        $r['aggsData']['buySum'] = $info['sum_bet'];
		echo json_encode($r);
		die();
	}

	//获取订单详情
	public final function getOrderDetailForList(){

		$orderId = $_POST['orderId'];//:L17060209255

		$orderId=wjStrFilter($orderId);
		if(!ctype_alnum($orderId)){
			opJson('订单号非法字符,请重新输入',1,null);
		}

		$sql = "SELECT
			betinfo.wjorderId as orderId,
			member.username as account,
			ltype.`title` lotName,
			playinfo.`name` playName,
			betinfo.actionTime as createTime,
			betinfo.actionData as haoMa,
			betinfo.actionNum,
			betinfo.actionNo as qiHao,
			betinfo.beiShu as multiple,
			betinfo.`mode` as model,
			(betinfo.`mode`*betinfo.beiShu*betinfo.actionNum*(betinfo.fpEnable+1)) as buyMoney,
			betinfo.bonus as winMoney,
			betinfo.zjCount as winZhuShu,
			betinfo.lotteryNo,
			betinfo.isDelete,
			betinfo.zhuiHao,
			lotteryKj.`data` as lotteryHaoMa
		FROM
			Z4r5jk12_type AS ltype
		INNER JOIN Z4r5jk12_bets AS betinfo ON ltype.id = betinfo.type
		INNER JOIN Z4r5jk12_played AS playinfo ON betinfo.playedId = playinfo.id
		INNER JOIN Z4r5jk12_members AS member ON member.uid = betinfo.uid
		inner join Z4r5jk12_data as lotteryKj on lotteryKj.type = ltype.id
		where betinfo.wjorderId = '{$orderId}' and lotteryKj.number = betinfo.actionNo";

		// echo $sql;

		$info = $this->getRow($sql);
		echo json_encode($info);
		die();
	}

}
