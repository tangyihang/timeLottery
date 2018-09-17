<?php
@session_start();
class Team extends WebLoginBase{
	public $pageSize=14;
	private $vcodeSessionName='blast_vcode_session_name';


	// 注册用户
	public final function register($u){
		$this->display('team/register.php',0,$u);
	}
	//cp38
	// 获得团队所有成员信息
	public final function getAllMember(){
		$this->display('team/member-list.php');
	}

	//根据条件获取
	public final function getMemberListByCondition(){

		$sql = "SELECT t.nickname,t.coin, t.NAME as userName,t.username , t.fandian, t.type as accountType, t.regTime
			, t.updateTime, t.ENABLE, t.loginid, loginr.loginTime, loginr.loginIP,t.parents,t.uid as id,t.qq,
			t.parentId,bank.account as cardNo,bank.countname as bankName,parent.`name` parentNames
		         FROM (SELECT nickname,coin, NAME,username,qq, fandian, type, regTime,parents,uid,parentId
				, updateTime, ENABLE, (
					SELECT id
					FROM {$this->prename}member_session
					WHERE uid = member.uid
						AND isOnLine = 1
						AND accessTime + 60 * 60 > unix_timestamp()
					ORDER BY loginTime DESC
					LIMIT 1
					) AS loginid
			FROM {$this->prename}members member
			) t LEFT JOIN {$this->prename}member_session loginr ON t.loginid = loginr.id 
			LEFT JOIN {$this->prename}user_bank AS bank ON bank.uid = t.uid
			LEFT JOIN {$this->prename}members AS parent ON parent.uid = t.parentId
			where 1=1 ";

		$username = $_POST['account'];
		$type = $_POST['searchType'];
		$accountType = $_POST['accountType'];
		$isOnline = $_POST['online'];

		$ps = $_POST['pageSize'];
		$pi = $_POST['pageNumber'];

		if($username && $username!='请输入会员名查询'){
			$username=wjStrFilter($username);
			if(!ctype_alnum($username)) throw new Exception('用户名包含非法字符,请重新输入');
			// 按用户名查找时
			// 只要符合用户名且是自己所有下级的都可查询
			// 用户名用模糊方式查询
			$sql.=" and t.username like '%{$username}%' and concat(',',parents,',') like '%,{$this->user['uid']},%'";
		}else{
			unset($username);
			switch($type){
				case 2:
					// 所有人
					$sql.=" and concat(',',t.parents,',') like '%,{$this->user['uid']},%'";
				break;
				case 1:
					// 直属下级
					$sql.=" and t.parentId={$this->user['uid']}";
				break;
				default:
					// 所有人
					$sql.=" and concat(',',t.parents,',') like '%,{$this->user['uid']},%'";
				break;
			}
		}
		switch ($isOnline) {
			//在线
			case 2:
				$sql.=" and loginid is not null";
				break;
			//离线
			case 1:
				$sql.=" and loginid is null";
				break;
		}
		// 用户类型
		switch ($accountType) {
			//在线
			case 4:
				$sql.=" and t.type = 1";
				break;
			//离线
			case 1:
				$sql.=" and t.type = 0";
				break;
		}

		// echo $sql;

		$pinfo = PageInfo($ps,$pi);

		$listc = $this->getRows($sql);

		$pagecount = count($listc);

		$sql.=" limit {$pinfo[0]},{$pinfo[1]}; ";
		
		$list = $this->getRows($sql);

		$r['total'] = $pagecount;
		$r['rows'] = $list;

		echo json_encode($r);
		die();
	}

	//获得成员信息
	public final function getMemberInfo(){
		// $id = $_POST['id'];
		// $id = intval($id);
		// $sql = "SELECT
		// 	member.`name`,
		// 	member.`enable`,
		// 	member.uid,
		// 	member.type,
		// 	member.username,
		// 	member.qq,
		// 	member.coin,
		// 	member.parentId,
		// 	bank.account,
		// 	bank.countname,
		// 	parent.`name` pname
		// FROM
		// 	{$this->prename}members AS member
		// LEFT JOIN {$this->prename}user_bank AS bank ON bank.uid = member.uid
		// LEFT JOIN {$this->prename}members AS parent ON parent.uid = member.parentId
		// where concat(',',member.parents,',') like '%,{$this->user['uid']},%'  and member.uid = {$id}";

		$fanDianDiff = $this->settings['fanDianDiff'];
		$fanDianMax = $this->settings['fanDianMax'];
		$userFandian = $this->user['fanDian'];

		$info['curRebateNum'] = $userFandian;
		$info['multiAgent'] = 'on';
		$info['rebateMaxNum'] = $fanDianMax;
		$info['rebateMinNum'] = '0';

		echo json_encode($info);
		die();
	}


	// 增加用户
	public final function insertMember(){

		if(!$this->user['type']){
			opJson('非法操作',1,null);
		}

		if(!$_POST){
			opJson('提交数据出错，请重新操作',1,null);
		}

		$id = $_POST['id'];
		$account = $_POST['account'];
		$accountStatus = $_POST['accountStatus'];
		$pwd = $_POST['pwd'];
		$rpwd = $_POST['rpwd'];
		$type = $_POST['type'];
		$rebateNum = $_POST['rebateNum'];

		if ($pwd!=$rpwd) {
			opJson('密码与确认密码不匹配',1,null);
		}


        //过滤未知字段
		$update['username']=wjStrFilter($account);
		// $update['qq']=wjStrFilter($_POST['qq']);
		$update['fanDian']=floatval($rebateNum);
		$update['password']=$rpwd;
		$update['type']=intval($type);

		$userlen=strlen($update['username']);
		$passlen=strlen($update['password']);
		// $qqlen=strlen($update['qq']);

		if($userlen<4 || $userlen>16){
			opJson('用户名长度不正确,请重新输入',1,null);
		}
		if($passlen<6){
			opJson('密码长度不能小于6个字符,请重新输入',1,null);	
		}
		// if($qqlen<5 || $qqlen>11) throw new Exception('QQ号为5-11位,请重新输入');

		if($update['fanDian']<0) {
			opJson('返点不能小于0',1,null);
		}

		if($update['fanDian']>$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<=0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])) {
			opJson('返点不能大于'.$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff']),1,null);
		}
		if(!$update['username']){
			opJson('用户名不能为空，请重新操作',1,null);
		}
		if($update['type']!=0 && $update['type']!=1){
			opJson('类型出错，请重新操作',1,null);
		}

		if(!ctype_alnum($update['username'])){
			opJson('用户名包含非法字符,请重新输入',1,null);
		}
		// if(!ctype_digit($update['qq'])) throw new Exception('QQ包含非法字符');

		$update['parentId']=$this->user['uid'];
		$update['parents']=$this->user['parents'];
		$update['password']=md5($update['password']);
		$update['source']=1;
		
		$update['regIP']=$this->ip(true);
		$update['regTime']=$this->time;
		
		if(!$_POST['nickname']){ $update['nickname']='未设昵称';}
		if(!$_POST['name']){ $update['name']=$update['username'];}
		
		// 查检返点设置
		if($update['fanDian']){
			$this->getSystemSettings();
			if($update['fanDian'] % $this->settings['fanDianDiff']){
				opJson(sprintf('返点只能是%.1f%的倍数', $this->settings['fanDianDiff']),1,null);
			} 
			
			$count=$this->getMyUserCount();
			$sql="select userCount, (select count(*) from {$this->prename}members m where m.parentId={$this->user['uid']} and m.fanDian=s.fanDian) registerCount from {$this->prename}params_fandianset s where s.fanDian={$update['fanDian']}";
			$count=$this->getRow($sql);
			
			if($count && $count['registerCount']>=$count['userCount']){
				opJson(sprintf('对不起返点为%.1f的下级人数已经达到上限', $update['fanDian']),1,null);
			}
		}else{
			$update['fanDian']=0.0;
		}
		
		$this->beginTransaction();
		try{
			$sql="select username from {$this->prename}members where username=?";
			if($this->getValue($sql, $update['username'])){
				opJson('用户“'.$update['username'].'”已经存在',1,null);
			}
			if($this->insertRow($this->prename .'members', $update)){
				$id=$this->lastInsertId();
				$sql="update {$this->prename}members set parents=concat(parents, ',', $id) where `uid`=$id";
				$this->update($sql);
				$this->commit();
				opJson('操作成功',0,null);
			}else{
				opJson('添加会员失败',1,null);
			}
			
		}catch(Exception $e){
			$this->rollBack();
			opJson($e->getMessage(),1,null);
		}
	}

	//团队账变
	public final function teamMoneyChange(){
		$this->display("team/team-money-change.php");
	}

	//获得团队账变信息
	public final function getTeamChangeList(){
		$sortOrder = $_POST['sortOrder'];//:asc
		$pageSize = $_POST['pageSize'];//:10
		$pageNumber = $_POST['pageNumber'];//:1
		$account = $_POST['account'];//:
		$type = $_POST['type'];//:0
		$begin = $_POST['begin'];//:2017-06-10 00:00:00
		$end = $_POST['end'];//:2017-06-10 23:59:59
		$orderId = $_POST['orderId'];//:

		$this->getTypes();
		$this->getPlayeds();
		
		// 日期限制
		if($begin && $end){
			$timeWhere=' and l.actionTime between '. strtotime($begin).' and '.strtotime($end);
		}elseif($begin){
			$timeWhere=' and l.actionTime >='. strtotime($begin);
		}elseif($end){
			$timeWhere=' and l.actionTime <'. strtotime($end);
		}else{
			if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $timeWhere=' and l.actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
		}
		
		// 帐变类型限制
		if($type=intval($type)){
			$liqTypeWhere=' and liqType='.$type;
			if($type==2) $liqTypeWhere=' and liqType between 2 and 3';
		}
		// 用户类型限制
		if($account && $account!='会员账号'){

			$account=wjStrFilter($account);
			if(!ctype_alnum($account)){
				opJson('用户名包含非法字符,请重新输入',1,null);
			}
			$userWhere=" and u.parents like '%,{$this->user['uid']},%' and u.username like '%{$account}%'";
		}else{
			$userWhere=" and concat(',', u.parents, ',') like '%,{$this->user['uid']},%'  and u.uid!={$this->user['uid']}";
		}
		
		// 冻结查询
		if($this->action=='fcoinModal'){
			$fcoinModalWhere='and l.fcoin!=0';
		}
		
		$sql="select b.type, b.playedId, b.actionNo, b.mode,l.id, l.liqType, l.coin, l.fcoin, l.userCoin, l.actionTime, l.extfield0, l.extfield1, l.info, u.username from {$this->prename}members u, {$this->prename}coin_log l left join {$this->prename}bets b on b.id=extfield0 where l.uid=u.uid $liqTypeWhere $timeWhere $userWhere $typeWhere $fcoinModalWhere and l.liqType not in(4,11,104) order by l.id desc";
		
		$ps = $_POST['pageSize'];
		$pi = $_POST['pageNumber'];

		$pinfo = PageInfo($ps,$pi);

		$listc = $this->getRows($sql);

		$pagecount = count($listc);

		$sql.=" limit {$pinfo[0]},{$pinfo[1]}; ";
		
		$list = $this->getRows($sql);

		$r['total'] = $pagecount;
		$r['rows'] = $list;

		echo json_encode($r);
		die();

	}

	//获取记录信息
	public final function getRecordInfo(){
		$id = $_POST['id'];
		$id = intval($id);
		$sql = "select extfield0,extfield1,liqType from {$this->prename}coin_log where id = {$id}";
		$info = $this->getRow($sql);

		if (!$info) {
			opJson('-',0,$info['extfield0']);
		}

		$r['fromid'] = $info['extfield0'];

		if ($info['extfield0']&&in_array($info['liqType'], array(2,3,4,5,6,7,10,11,100,101,102,103,104,105,108))) {
			$wjorderId = $this->getValue("select wjorderId from {$this->prename}bets where id={$info['extfield0']}");
			$r['wjorderId'] = $wjorderId;
			opJson('betInfo',0,$r);	
		}elseif (in_array($info['liqType'], array(1,9,52))) {
			$r['wjorderId'] = $info['extfield1'];
			opJson('rechargeModal',0,$r);
		}elseif (in_array($info['liqType'], array(8,106,107))) {
			$r['wjorderId'] = $info['extfield0'];
			opJson('cashModal',0,$r);
		}
	}

	//团队统计
	public final function teamStatistics(){
		$this->display('team/team-statistics.php');
	}

	public final function getTeamStatistics(){
		$account = $_POST['account'];//:kaixin
		$agent = $_POST['agent'];//:
		$begin = $_POST['begin'];//:2017-06-12
		$end = $_POST['end'];//:2017-06-12

		$uid = $this->user['uid'];
		$nextSearch = '';
		if ($agent!='') {
			$uid = $this->getValue("select uid from {$this->prename}members where username  like '%{$agent}%'");
			if (!$uid || is_null($uid)) {
				opJson('无效的代理信息',1,null);
			}
		}
		if ($account!='') {
			$nextSearch = " and u.username like '%{$account}%'";
		}

		$actionTime = " and t.actionTime between ".strtotime($begin)." and ".strtotime($end)." ";
		$innerjoin = " inner join {$this->prename}members as u on u.uid = t.uid ";
		$where = " and (concat(',', u.parents, ',') like '%,{$uid},%') or u.uid={$uid}";


		//基础
		$depositTotal = 0.00; //存款总计
        $depositTotalsql = "SELECT sum(t.amount) FROM {$this->prename}member_recharge AS t {$innerjoin}  where 1=1  {$where} {$actionTime} {$nextSearch}";
       	$depositTotal =(float)$this->getValue($depositTotalsql);

		$withdrawTotal = 0.00; //提款总计
		$withdrawTotalSQL = "SELECT sum(amount) FROM {$this->prename}member_cash as t {$innerjoin} where state = 3 {$where} {$actionTime} {$nextSearch}";
		$withdrawTotal = (float)$this->getValue($withdrawTotalSQL);

		$rebateAgentTotal = 0.00; //返点总计
		$rebateAgentTotalSQL = "SELECT sum(amount) FROM {$this->prename}coin_log as t {$innerjoin} where 1=1 {$where} {$actionTime} {$nextSearch}";
		$rebateAgentTotal = (float)$this->getValue($rebateAgentTotalSQL);
       
        $childCountTotal = 0; //下级人数

        $childCountTotalSQL ="SELECT count(u.uid) FROM {$this->prename}members as u where 1=1 {$where}  {$nextSearch}";
        $childCountTotal = (float)$this->getValue($childCountTotalSQL);


		$rebateTotal = 0.00; //反水总计

		$rebateTotalSQL = "select sum(fanDian) from {$this->prename}bets as t  {$innerjoin} where (t.type not in (34,77)) {$where} {$actionTime} {$nextSearch} ";

        $rebateTotal = (float)$this->getValue($rebateTotalSQL);



		$giveTotal = 0.00; //充值赠送总计


		$giveRegisterTotal = 0.00; //注册赠送总计

		$manualDepositTotal = 0.00; //手动加款

		$manualWithdrawTotal = 0.00; //手动扣款
  
		$sumMoney = 0.00; //团队余额
		$sumMoneySQL = "select sum(coin) from {$this->prename}members as u where 1=1 {$where} {$nextSearch} ";
		// echo $sumMoneySQL;
		$sumMoney = (float)$this->getValue($sumMoneySQL);

		$betCountTotal = 0.00; //总投注人数
		$betCountTotalSQL = "select count(t.uid ) from  {$this->prename}bets as t {$innerjoin} where 1=1 {$where} {$actionTime} {$nextSearch} group by t.uid" ;
		// echo $betCountTotalSQL;
		$betCountTotal = (float)$this->getValue($betCountTotalSQL);


		//体育

		$sportTotal = 0.00; //体育下注总计

		$sportAward = 0.00; //体育派奖总计

		$sportBunko = 0.00; //体育输赢



		//真人

		$realTotal = 0.00; //真人下注总计

		$realAward = 0.00; //真人派奖总计

		$realBunko = 0.00; //真人输赢


		//电子
		$dianZiTotal = 0.00; //电子下注总计

		$dianZiAward = 0.00; //电子派奖总计

		$dianZiBunko = 0.00; //电子输赢


		//彩票和系统彩

		$lotteryTotal = 0.00; //彩票下注总记
		$lotteryTotalSQL = "select sum((t.`mode`*t.beiShu*t.actionNum*(t.fpEnable+1))) from {$this->prename}bets as t  {$innerjoin} where (t.type not in (34,77)) {$where} {$actionTime} {$nextSearch} ";

        $lotteryTotal = (float)$this->getValue($lotteryTotalSQL);


		$lotteryAward = 0.00; //彩票派奖总计

        $lotteryAwardSQL = "select sum(t.bonus) from {$this->prename}bets as t  {$innerjoin} where (t.type not in (34,77)) {$where} {$actionTime} {$nextSearch} ";

        $lotteryAward = (float)$this->getValue($lotteryAwardSQL);

		$lotteryBunko = $lotteryTotal-$lotteryAward ; //彩票输赢

		$sysLotteryTotal = 0.00; //系统彩下注总记

		$sysLotteryAward = 0.00; //系统彩派奖总计

		$sysLotteryBunko = 0.00; //系统彩输赢

		$sfMarkSixTotal = 0.00; //十分六合彩下

		$sfMarkSixAward = 0.00; //十分六合彩派

		$sfMarkSixBunko = 0.00; //十分六合彩输赢


		//六合彩
		$markSixTotal = 0.00; //六合下注总记
        $markSixTotalSQL = "select sum((t.`mode`*t.beiShu*t.actionNum*(t.fpEnable+1))) from {$this->prename}bets as t  {$innerjoin} where   (t.type  in (34,77)) {$where} {$actionTime} {$nextSearch} ";

        $markSixTotal = (float)$this->getValue($markSixTotalSQL);

		$markSixAward = 0.00; //六合派奖总计

        $markSixAwardSQL = "select sum(t.bonus) from {$this->prename}bets as t  {$innerjoin} where (t.type  in (34,77)) {$where} {$actionTime} {$nextSearch} ";

        $markSixAward = (float)$this->getValue($markSixAwardSQL);

		$markSixBunko = $markSixTotal-$markSixAward; //六合彩输赢

		$allBunko = $lotteryBunko+$markSixBunko-$rebateTotal-$rebateAgentTotal; //全部输赢总计


		$info['depositTotal'] =  $depositTotal;
		$info['childCountTotal'] =  $childCountTotal;
		$info['withdrawTotal'] =  $withdrawTotal;
		$info['rebateAgentTotal'] =  $rebateAgentTotal;
		$info['rebateTotal'] =  $rebateTotal;
		$info['giveTotal'] =  $giveTotal;
		$info['giveRegisterTotal'] =  $giveRegisterTotal;
		$info['manualDepositTotal'] =  $manualDepositTotal;
		$info['manualWithdrawTotal'] =  $manualWithdrawTotal;
		$info['sumMoney'] =  $sumMoney;
		$info['betCountTotal'] =  $betCountTotal;
		$info['sportTotal'] =  $sportTotal;
		$info['sportAward'] =  $sportAward;
		$info['sportBunko'] =  $sportBunko;
		$info['realTotal'] =  $realTotal;
		$info['realAward'] =  $realAward;
		$info['realBunko'] =  $realBunko;
		$info['dianZiTotal'] =  $dianZiTotal;
		$info['dianZiAward'] =  $dianZiAward;
		$info['dianZiBunko'] =  $dianZiBunko;
		$info['lotteryTotal'] =  $lotteryTotal;
		$info['lotteryAward'] =  $lotteryAward;
		$info['lotteryBunko'] =  $lotteryBunko;
		$info['sysLotteryTotal'] =  $sysLotteryTotal;
		$info['sysLotteryAward'] =  $sysLotteryAward;
		$info['sysLotteryBunko'] =  $sysLotteryBunko;
		$info['sfMarkSixTotal'] =  $sfMarkSixTotal;
		$info['sfMarkSixAward'] =  $sfMarkSixAward;
		$info['sfMarkSixBunko'] =  $sfMarkSixBunko;
		$info['markSixTotal'] =  $markSixTotal;
		$info['markSixAward'] =  $markSixAward;
		$info['markSixBunko'] =  $markSixBunko;
		$info['allBunko'] =  $allBunko;

		echo json_encode($info);
		die();

	}

	//推广链接
	public final function tgLink(){
		$this->display('team/tgLink.php');
	}

//获取推广链接
	public final function getTgLinkList(){

		$ps = $_POST['pageSize'];
		$pi = $_POST['pageNumber'];
		$type = $_POST['type'];
		$pinfo = PageInfo($ps,$pi);



		include_once $_SERVER['DOCUMENT_ROOT'].'/xingcai_lib/classes/Xxtea.class';

		$urlPasswordKey = $this->urlPasswordKey ;

		$sql="select link.lid,link.enable,link.fanDian,link.uid,u.username,link.type from {$this->prename}links as link inner join {$this->prename}members as u on u.uid = link.uid where concat(',', u.parents, ',') like '%,{$this->user['uid']},%' or u.uid={$this->user['uid']}";

		if (!empty($type) && in_array($type, array(0,1))) {
			$sql.=" and link.type = {$type}";
		}

		$listc = $this->getRows($sql);

		$pagecount = count($listc);

		$sql.=" limit {$pinfo[0]},{$pinfo[1]}; ";

		$list = $this->getRows($sql);
		$_list = array();
		foreach ($list as $key => $item) {

			$info['id'] = $item['lid'];
			$info['userAccount'] = $item['username'];
			$info['cpRolling'] = $item['fanDian'];
			$info['status'] = $item['enable'];
			$info['type'] = $item['type'];

			$key=Xxtea::encrypt($item['lid'].",".$item['uid'], $urlPasswordKey);
			$key=base64_encode($key);
			$key=str_replace(array('+','/','='), array('-','*',''), $key);
			// var_dump($key);
			$info['linkUrl'] = $key;
			$_list[] = $info;
		}

		$r['total'] = $pagecount;
		$r['rows'] = $_list;

		echo json_encode($r);
		die();
	}

	/*删除注册链接*/
	public final function linkDeleteed(){
		// if(!$this->user['type']) {
		// 	opJson('非法操作',1,null);
		// }
		$lid=intval($_POST['id']);
		if($uid=$this->getvalue("select uid from {$this->prename}links where lid=?",$lid)){
		     if($uid!=$this->user['uid']){
				opJson('只能删除自己的推广链接',1,null);
		     }
		}else{
				opJson('此注册链接不存在',1,null);
		}
		$sql="delete from {$this->prename}links where lid=?";
		if($this->update($sql, $lid)){
			opJson('删除成功',0,null);
		}else{
			opJson('未知出错',1,null);
		}
	}

	//修改链接
	public final function modifyLink(){

		$status = $_POST['status'];
		$status = intval($status);
		$id = $_POST['id'];
		$id = intval($id);

		if ($id<=0) {
			opJson('无效的信息',1,null);
		}
		if (!in_array($status, array(1,2))) {
			opJson('类型有误',1,null);
		}

		$t = $status == 1 ?2:1;

		$sql = "select * from {$this->prename}links where lid={$id} and enable = {$t};";
		// echo $sql;
		$info =  $this->getRow($sql);
		if (!$info) {
			opJson('没有需要更改的信息',1,null);
		}
		$sql='update '.$this->prename.'links set enable='.$status.' where lid='.$id.';';
		if($this->update($sql)){
			opJson('修改成功',0,null);
		}else{
			opJson('修改失败',1,null);
		}
	}

	public final function insertLink(){
		// if(!$this->user['type']) {
		// 	opJson('非法操作',1,null);
		// }

		$this->getSystemSettings();
		if(!$_POST) {
			opJson('提交数据出错，请重新操作',1,null);
		}

		// $linkKey = $_POST['linkKey';
		$cpRolling = $_POST['cpRolling'];
		$status = $_POST['status'];

        $update['uid']= $this->user['uid'];
		$update['type']=intval($_POST['type']);

		$update['fanDian']=floatval($cpRolling);
		$update['enable'] = intval($status);


		$update['regIP']=$this->ip(true);
		$update['regTime']=$this->time;

        if($update['fanDian']<0){
			opJson('返点不能小于0',1,null);
        }
        

		if($update['type']!=0 && $update['type']!=1){
			opJson('类型出错，请重新操作',1,null);
		}

		// if($update['fanDian']>$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])){
		// 	opJson('返点不能大于'.$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff']),1,null);
		// }
		
		if($update['uid']!=$this->user['uid']){
			opJson('只能增加自己的推广链接',1,null);
		}

		// 查检返点设置
		if($update['fanDian']){
			$this->getSystemSettings();
			if($update['fanDian'] % $this->settings['fanDianDiff']){
				opJson(sprintf('返点只能是%.1f%的倍数', $this->settings['fanDianDiff']),1,null);
			}
		}else{
			$update['fanDian']=0.0;
		}
		$this->beginTransaction();
		try{
			$sql="select fanDian from {$this->prename}links where uid={$update['uid']} and fanDian=? ";
			if($this->getValue($sql, $update['fanDian'])){
				opJson('此链接已经存在',1,null);
			}
			if($this->insertRow($this->prename .'links', $update)){
				$id=$this->lastInsertId();
				$this->commit();
				echo opJson('添加链接成功',0,null);
			}else{
				echo opJson('添加链接失败',1,null);
			}
			
		}catch(Exception $e){
			$this->rollBack();
			opJson($e->getMessage(),1,null);
		}
	}
	
	//团队充值记录
	public final function teamPay(){
		$this->display('team/team-pay.php');
	}

	public final function getTeamPayList(){
		$sortOrder = $_POST['sortOrder'];//:asc
		$ps = $_POST['pageSize'];//:10
		$pi = $_POST['pageNumber'];//:1
		$account = $_POST['account'];//:
		$begin = $_POST['begin'];//:2017-06-15 00:00:00
		$end = $_POST['end'];//:2017-06-15 23:59:59

		$begin = strtotime($begin);
		$end = strtotime($end);
       // 日期限制
	    if(!$begin){
			$begin=strtotime('2017-01-01 00:00:00');
		}
		if(!$end){
			$end=time();
		}
		$sql = "SELECT u.username as account,r.rechargeId as orderNo,r.amount as money,r.actionTime as createDatetime,r.state as `status` FROM {$this->prename}member_recharge AS r INNER JOIN {$this->prename}members AS u ON u.uid = r.uid WHERE (concat(',', u.parents, ',') like '%,{$this->user['uid']},%' OR r.uid = {$this->user['uid']}) and r.actionTime BETWEEN {$begin} and {$end}";
		if (!empty($account)) {
			$account=wjStrFilter($account);
			if(!ctype_alnum($account)){
				opJson('用户名包含非法字符,请重新输入',1,null);
			}
			// 按用户名查找时
			// 只要符合用户名且是自己所有下级的都可查询
			// 用户名用模糊方式查询
			$sql.=" and u.username like '%{$account}%'";
		}
		$pinfo = PageInfo($ps,$pi);
		$listc = $this->getRows($sql);

		$pagecount = count($listc);

		$sql.=" limit {$pinfo[0]},{$pinfo[1]}; ";
			
		$list = $this->getRows($sql);

		$r['total'] = $pagecount;
		$r['rows'] = $list;

		echo json_encode($r);
		die();
	}


	//团队提款记录
	public final function teamWithDrawing(){
		$this->display('team/team-withdrawing.php');
	}

	//获取团队提款记录
	public final function getTeamWithDrawingList(){
		$sortOrder = $_POST['sortOrder'];//:asc
		$ps = $_POST['pageSize'];//:10
		$pi = $_POST['pageNumber'];//:1
		$account = $_POST['account'];//:
		$status = $_POST['status'];//:0
		$begin = $_POST['begin'];//:2017-06-15 00:00:00
		$end = $_POST['end'];//:2017-06-15 23:59:59
		$accountType = $_POST['accountType']?$_POST['accountType']:2;//:

		$begin = strtotime($begin);
		$end = strtotime($end);

		$sql = "SELECT u.username as account, r.id as orderNo, ub.countname as bankName, r.actionTime as createDatetime, u.type , r.state as `status`, r.info as remark, r.amount as drawMoney FROM {$this->prename}member_cash r left JOIN {$this->prename}user_bank ub ON r.uid = ub.uid INNER JOIN {$this->prename}members u ON u.uid = r.uid  WHERE (concat(',', u.parents, ',') LIKE '%,{$this->user['uid']},%') OR r.uid = {$this->user['uid']} AND actionTime BETWEEN {$begin} AND {$end} "; //

		 if (in_array($accountType,array(0,1))) {
			$sql.=" and u.type = {$accountType}";
		 }

		if (!empty($account)) {
			$account=wjStrFilter($account);
			if(!ctype_alnum($account)){
				opJson('用户名包含非法字符,请重新输入',1,null);
			}
			// 按用户名查找时
			// 只要符合用户名且是自己所有下级的都可查询
			// 用户名用模糊方式查询
			$sql.=" and u.username like '%{$account}%'";
		}

		if (!empty($status) && in_array($status,array(0,1,2,3,4,5))) {

			$sql.=" and r.state = {$status}";
			//1用户申请，2已取消，3已支付，4提现失败，0确认到帐, 5后台删除
		}
      //  echo $sql;
		$pinfo = PageInfo($ps,$pi);

		$listc = $this->getRows($sql);

		$pagecount = count($listc);

		$sql.=" limit {$pinfo[0]},{$pinfo[1]}; ";
	
		$list = $this->getRows($sql);

		$r['total'] = $pagecount;
		$r['rows'] = $list;

		echo json_encode($r);
		die();

	}

	//业绩提成
	public final function performance(){
		$this->display('team/performance.php');
	}


	//获得团队账变信息
	public final function getPerformanceList(){
		$sortOrder = $_POST['sortOrder'];//:asc
		$pageSize = $_POST['pageSize'];//:10
		$pageNumber = $_POST['pageNumber'];//:1
		$account = $_POST['account'];//:
		$type = $_POST['type'];//:0
		$begin = $_POST['begin'];//:2017-06-10 00:00:00
		$end = $_POST['end'];//:2017-06-10 23:59:59
		$orderId = $_POST['orderId'];//:

		$this->getTypes();
		$this->getPlayeds();
		
		$timeWhere=' and l.actionTime between '. strtotime($begin).' and '.strtotime($end);

		// 日期限制
		if($begin && $end){
			$timeWhere=' and l.actionTime between '. strtotime($begin).' and '.strtotime($end);
		}elseif($begin){
			$timeWhere=' and l.actionTime >='. strtotime($begin);
		}elseif($end){
			$timeWhere=' and l.actionTime <'. strtotime($end);
		}else{
			if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $timeWhere=' and l.actionTime between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
		}
		
		// 帐变类型限制
		// if($type=intval($type)){
		// 	$liqTypeWhere=' and liqType='.$type;
		// 	if($type==2) 
		// }

		// $liqTypeWhere=' and liqType between 2 and 3';
		//$liqTypeWhere=' and liqType = 2';

		// 用户类型限制
		// if($account && $account!='会员账号'){

		// 	$account=wjStrFilter($account);
		// 	if(!ctype_alnum($account)){
		// 		opJson('用户名包含非法字符,请重新输入',1,null);
		// 	}
		// 	$userWhere=" and u.parents like '%,{$this->user['uid']},%' and u.username like '%{$account}%'";
		// }else{
		// 	$userWhere=" and concat(',', u.parents, ',') like '%,{$this->user['uid']},%'  and u.uid!={$this->user['uid']}";
		// }

		$userWhere=" and u.uid={$this->user['uid']}";
		
		// 冻结查询
		if($this->action=='fcoinModal'){
			$fcoinModalWhere='and l.fcoin!=0';
		}
		
		$sql="select l.id, l.liqType as type, l.coin as `money`, l.fcoin, l.userCoin as beforeMoney, l.coin+l.userCoin as afterMoney ,l.actionTime as createDatetime, l.extfield0, l.extfield1, l.info as remark, u.username as account from {$this->prename}members u, {$this->prename}coin_log l  where l.uid=u.uid $liqTypeWhere $timeWhere $userWhere $typeWhere $fcoinModalWhere order by l.id desc";
		
		$ps = $_POST['pageSize'];
		$pi = $_POST['pageNumber'];

		$pinfo = PageInfo($ps,$pi);

		$listc = $this->getRows($sql);

		$pagecount = count($listc);

		$sql.=" limit {$pinfo[0]},{$pinfo[1]}; ";
		
		// echo $sql;

		$list = $this->getRows($sql);

		$r['total'] = $pagecount;
		$r['rows'] = $list;

		echo json_encode($r);
		die();

	}


	//cp38 =====================================================================================================================
	//===================================================================================================================== cp38


	public function getMyUserCount1(){
		$this->getSystemSettings();
		$minFanDian=$this->user['fanDian'] - 10 * $this->settings['fanDianDiff'];
		$sql="select count(*) registerUserCount, fanDian from {$this->prename}members where parentId={$this->user['uid']} and fanDian>=$minFanDian and fanDian<{$this->user['fanDian']} group by fanDian order by fanDian desc";
		$data=$this->getRows($sql);
		$ret=array();
		$fanDian=$this->user['fanDian'];
		$i=0;
		$set=explode(',', $this->settings['fanDianUserCount']);
		while(($fanDian-=$this->settings['fanDianDiff']) && ($fanDian>=$minFanDian)){
			$arr=array();
			if($data[0]['fanDian']==$fanDian){
				$arr=array_shift($data);
			}else{
				$arr['fanDian']=$fanDian;
				$arr['registerUserCount']=0;
			}
			$arr['setting']=$set[$i];
			//var_dump($fanDian);
			$ret["$fanDian"]=$arr;
			$i++;
		}
		return ($ret);
	}
	
	public function getMyUserCount(){
		if(!$set=$this->settings['fanDianUserCount']) return array();
		$set=explode(',', $set);
		
		foreach($set as $key=>$var){
			$set[$key]=explode('|', $var);
		}
		
		foreach($set as $var){
			if($this->user['fanDian']>=$var[1]) break;
			array_shift($set);
		}
		
	}

	public final function onlineMember(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/member-online-list.php');
	}
	
	/*游戏记录*/
	public final function gameRecord(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->getTypes();
		$this->getPlayeds();
		$this->action='searchGameRecord';
		$this->display('team/record.php');
	}
	
	public final function searchGameRecord(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->getTypes();
		$this->getPlayeds();
		$this->display('team/record-list.php');
	}
	/*游戏记录 结束*/
	
	/*团队报表*/
	public final function report(){
        if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->action='searchReport';
		$this->display('team/report.php');
	}
	
	public final function searchReport(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/report-list.php');
	}
	/*团队报表 结束*/
	
	/*帐变列表*/
	public final function coin(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->action='searchCoin';
		$this->display('team/coin.php');
	}
	
	public final function searchCoin(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/coin-log.php');
	}
	/*帐变列表 结束*/
	
	public final function coinall(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->freshSession();
		$this->display('team/coinall.php');
	}
	
	public final function addMember(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/add-member.php');
	}
	public final function userUpdate($id){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/update-menber.php', 0, intval($id));
	}
	public final function userUpdate2($id){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/menber-recharge.php', 0, intval($id));
	}
	public final function memberList(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/member-list.php');
	}
	
	public final function cashRecord(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/cash-record.php');
	}
	
	public final function searchCashRecord(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/cash-record-list.php');
	}
	public final function addLink(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/add-link.php');
	}
	public final function linkDelete($lid){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/delete-link.php',0,intval($lid));
	}
	public final function linkList(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/link-list.php');
	}
	public final function getLinkCode($lid){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/get-linkcode.php',0,intval($lid));
	}
	public final function advLink(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/link-list.php');
	}

	
	/*编辑注册链接*/
	public final function linkUpdate($id){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/update-link.php', 0, intval($id));
	}
	
	public final function linkUpdateed(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		if(!$_POST)  throw new Exception('提交数据出错，请重新操作');

		$update['lid']=intval($_POST['lid']);
		$update['type']=intval($_POST['type']);
        $update['fanDian']=floatval($_POST['fanDian']);
		$update['updateTime']=$this->time;
		$lid=$update['lid'];

		if($update['fanDian']<0) throw new Exception('返点不能小于0');
		if($update['fanDian']>$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])) throw new Exception('返点不能大于'.$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff']));
        if($uid=$this->getvalue("select uid from {$this->prename}links where lid=?",$lid)){
		     if($uid!=$this->user['uid']) throw new Exception('只能修改自己的推广链接!');
		}else{
			throw new Exception('此注册链接不存在');
			}
		
		if(!$_POST['fanDian']){unset($_POST['fanDian']);unset($update['fanDian']);}
		if($update['fanDian']==0) $update['fanDian']=0.0;

		if($this->updateRows($this->prename .'links', $update, "lid=$lid")){
			echo '修改成功';
		}else{
			throw new Exception('未知出错');
		}
		
	}
	

	public final function searchMember(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/member-search-list.php');
	}
	
		public final function memberlistlist(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/member-list-list.php');
	}
	public final function userUpdateed(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		if(!$_POST) throw new Exception('提交数据出错，请重新操作');
        
		//过滤未知字段
		$update['type']=intval($_POST['type']);
		$update['uid']=intval($_POST['uid']);
		$update['fanDian']=floatval($_POST['fanDian']);
		$uid=$update['uid'];

        if($update['fanDian']<0) throw new Exception('返点不能小于0');
		$fandian=$this->getvalue("select fanDian from {$this->prename}members where uid=?",$update['uid']);
		if($update['fanDian']<$fandian) throw new Exception('返点不能降低!');
		if($update['fanDian']>$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff'])) throw new Exception('返点不能大于'.$this->iff($this->user['fanDian']-$this->settings['fanDianDiff']<0,0,$this->user['fanDian']-$this->settings['fanDianDiff']));
		if($update['type']!=0 && $update['type']!=1) throw new Exception('类型出错，请重新操作');

		if($uid==$this->user['uid']) throw new Exception('不能修改自己的返点');
		if(!$parentId=$this->getvalue("select parentId from {$this->prename}members where uid=?",$uid)) throw new Exception('此会员不存在!');
		if($parentId!=$this->user['uid']) throw new Exception('此会员不是你的直属下线，无法修改');

		if(!$_POST['fanDian']){unset($_POST['fanDian']);unset($update['fanDian']);}
		if($update['fanDian']==0) $update['fanDian']=0.0;
		
		if($this->updateRows($this->prename .'members', $update, "uid=$uid")){
			echo '修改成功';
		}else{
			throw new Exception('未知出错');
		}
		
	}
	
 /*额度转移*/
	public final function userUpdateed2(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		if(!$para=$_POST) throw new Exception('提交数据出错，请重新操作');
		$this->getSystemSettings();
		if($this->settings['recharge']!=1) throw new Exception('上级充值功能已经关闭！');

		$uid=intval($para['uid']);
		$amount=floatval($para['coin']);
		$coinpwd=wjStrFilter('safepass','',1);
		if(!$uid){
			throw new Exception('用户ID不正确');
		}
		$amount=floatval(abs($amount));
		if($amount<=0) throw new Exception('充值金额不能为负值');
		if(!$coinpwd) throw new Exception('请输入资金密码');
		$this->freshSession();
		if($this->user['coinPassword']!=md5($coinpwd)) throw new Exception('资金密码不正确');
		$data=array(
			'amount'=>$amount,
			'actionUid'=>$this->user['uid'],
			'actionIP'=>$this->ip(true),
			'actionTime'=>$this->time,
			'rechargeTime'=>$this->time
		);
		$this->beginTransaction();
		try{
			$user=$this->getRow("select uid, username, coin, fcoin from {$this->prename}members where uid=$uid");
			if(!$user) throw new Exception('用户不存在');
			// 查询用户可用资金
			$userAmount=$this->getValue("select coin from {$this->prename}members where uid={$this->user['uid']}");
			if($userAmount < $amount) throw new Exception('您的可用资金不足');
			$data['uid']=$user['uid'];
			$data['coin']=$user['coin'];
			$data['fcoin']=$user['fcoin'];
			$data['username']=$user['username'];
			$data['info']='上级['.$this->user['username'].']充值';
			$data['state']=2;
			$data['flag']=1;

			$sql="select id from {$this->prename}member_recharge where rechargeId=?";
			do{
				$data['rechargeId']=mt_rand(100000,999999);
			}while($this->getValue($sql, $data['rechargeId']));

			if($this->insertRow($this->prename .'member_recharge', $data)){
				$dataId=$this->lastInsertId();
				$this->addCoin(array(
					'uid'=>$user['uid'],
					'typea'=>1,
					'liqType'=>12,
					'coin'=>$amount,
					'extfield0'=>$dataId,
					'extfield1'=>$data['rechargeId'],
					'info'=>'上级充值'
				));
				
				//扣除
				$this->addCoin(array(
					'uid'=>$this->user['uid'],
					'typea'=>1,
					'liqType'=>13,
					'coin'=>-$amount,
					'extfield0'=>$dataId,
					'extfield1'=>$data['rechargeId'],
					'info'=>'上级充值成功扣款'
				));
			}		
			$this->commit();
			echo "充值成功";
		}catch(Exception $e){
			$this->rollBack();
			throw new Exception('未知出错');
		}
	}
	public final function shareBonus(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/share-bonus.php');
	}

	public final function shareBonusInfo(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$this->display('team/share-bonus-info.php');
	}

	public final function getShareBonus(){
		if(!$this->user['type'])  throw new Exception('非法操作!');
		$uid = $this->user['uid'];
		if(!$uid) die('参数出错');
		$sql = 'select * from {$this->prename}bonus_log where uid='.$this->user['uid'].' and bonusStatus = 0 order by id DESC Limit 1';
		$lastBonus = $this->getRow($sql);
		if($lastBonus){
			//直接将用户分红提现，提现信息提交至后台
			$bank=$this->getRow("select * from {$this->prename}member_bank where uid=? limit 1",$this->user['uid']);
			if($bank['bankId']){
				$para['username']=$bank['username'];
				$para['account']=$bank['account'];
				$para['bankId']=$bank['bankId'];
		$this->beginTransaction();
		try{
			$this->freshSession();
			// 插入提现请求表
			$para['actionTime']=$this->time;
			$para['uid']=$this->user['uid'];
			$para['info']= '分红提现';
			$para['amount'] = $lastBonus['bonusAmount'];
			if(!$this->insertRow($this->prename .'member_cash', $para)) throw new Exception('领取分红请求出错');
			if(!$this->updateRows($this->prename .'bonus_log', array('bonusStatus'=>1), 'id='.$lastBonus['id'])) throw new Exception('领取分红请求出错');
			$id=$this->lastInsertId();
			
			$this->commit();
			echo '分红提现成功，分红提现将在10分钟内到帐，如未到账请联系在线客服。';
		
		}catch(Exception $e){
			$this->rollBack();
			throw $e;
		}
			}else{
				die('您还没有设置银行账户，不可领取分红！！！');
			}
		}else{
			die('您本期没有可分红金额或者您已经领取了本期分红！！！');
		}
	}
}