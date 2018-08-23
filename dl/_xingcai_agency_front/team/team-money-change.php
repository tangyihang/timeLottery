<?php $this->display('inc_header.php'); ?>
	<div class="container" style="margin-top: 20px;">
		<ol class="breadcrumb">
			<li><a href="/">首页</a></li>
			<li class="active">团队账变</li>
		</ol>
	</div>
	<div class="container">
		
		<div class="bootstrap-table">
		<div class="fixed-table-toolbar">
		<div class="bars pull-left">
		<div id="toolbar">
			<div class="form-group">
				<div class="form-inline">
					<div class="input-group">
						<input type="text" class="form-control" id="begin" value="2017-01-01 00:00:00" placeholder="开始日期"> 
						<span class="glyphicon glyphicon-th form-control-feedback" aria-hidden="true"></span>
					</div>
					<button class="btn btn-default">今日</button>
					<button class="btn btn-default">昨日</button>
					<button class="btn btn-default">本周</button>
					<label class="sr-only" for="account">会员账号</label>
					<div class="form-group">
						<div class="input-group">
							<input type="text" class="form-control" id="account" value="" placeholder="会员账号">
						</div>
						<div class="input-group">
							<label class="sr-only" for="type">类型</label> 
							<select class="form-control" id="type">
								<option value="0">全部类型</option>
								<option value="1" > 充值 </option>
								<option value="2" > 返点 </option>
								<option value="5" > 停止追号 </option>
								<option value="6" > 中奖金额 </option>
								<option value="7" > 撤单 </option>
								<option value="8" > 提现失败返回冻结金额 </option>
								<option value="9" > 管理员充值 </option>
								<option value="10" > 解除抢庄冻结金额 </option>
								<option value="12" > 上级充值 </option>
								<option value="13" > 上级充值成功扣款 </option>
								<option value="50" > 签到赠送 </option>
								<option value="51" > 首次绑定工行卡赠送 </option>
								<option value="52" > 充值佣金 </option>
								<option value="53" > 消费佣金 </option>
								<option value="54" > 充值赠送 </option>
								<option value="55" > 注册佣金 </option>
								<option value="100" > 抢庄冻结金额 </option>
								<option value="101" > 投注冻结金额 </option>
								<option value="102" > 追号投注 </option>
								<option value="103" > 抢庄返点金额 </option>
								<option value="105" > 抢庄赔付金额 </option>
								<option value="106" > 提现冻结 </option>
								<option value="107" > 提现成功扣除冻结金额 </option>
								<option value="108" > 开奖扣除冻结金额 </option>
								<option value="109" > 上级充值 </option>
								<option value="110" > 给下级充值扣款 </option>
								<option value="139" > 分红奖金 </option>
						</select>
						</div>
						<div class="input-group" style="display: none;">
							<input type="text" class="form-control" id="orderId" placeholder="订单号">
						</div>
					</div>
					<button class="btn btn-primary" onclick="search();">查询</button>
				</div>
				<div class="form-inline" style="margin-top: 5px;">
					<div class="input-group">
						<input type="text" id="end" class="form-control" value="2017-12-30 23:59:59" placeholder="线束日期"> <span class="glyphicon glyphicon-th form-control-feedback" aria-hidden="true"></span>
					</div>
					<button class="btn btn-default">上周</button>
					<button class="btn btn-default">本月</button>
					<button class="btn btn-default">上月</button>
				</div>
			</div>
		</div>
	</div>

  <div class="fixed-table-container" style="padding-bottom: 0px;">
   <div class="fixed-table-header" style="display: none;">
    <table></table>
   </div>
   <div class="fixed-table-body">
    <div class="fixed-table-loading" style="top: 41px; display: none;">
     正在努力地加载数据中，请稍候……
    </div>
    <table id="datagrid_tb" class="table table-hover table-striped">
     <thead>
      <tr>
       <th style="text-align: center; vertical-align: middle; " data-field="actionTime" tabindex="0">
        <div class="th-inner ">
         时间
        </div>
        <div class="fht-cell"></div></th>
       <th style="text-align: center; vertical-align: middle; " data-field="username" tabindex="0">
        <div class="th-inner ">
         用户名
        </div>
        <div class="fht-cell"></div></th>
       <th style="text-align: center; vertical-align: middle; " data-field="liqType" tabindex="0">
        <div class="th-inner ">
         帐变类型
        </div>
        <div class="fht-cell"></div></th>
       <th style="text-align: center; vertical-align: middle; " data-field="extfield0" tabindex="0">
        <div class="th-inner ">
         单号
        </div>
        <div class="fht-cell"></div></th>
       <th style="text-align: center; vertical-align: middle; " data-field="type" tabindex="0">
        <div class="th-inner ">
         游戏
        </div>
        <div class="fht-cell"></div></th>
       <th style="text-align: center; vertical-align: middle; " data-field="playedId" tabindex="0">
        <div class="th-inner ">
         玩法
        </div>
        <div class="fht-cell"></div></th>
       <th style="text-align: center; vertical-align: middle; width: 150px; " data-field="actionNo" tabindex="0">
        <div class="th-inner ">
         期号
        </div>
        <div class="fht-cell"></div></th>
       <th style="text-align: center; vertical-align: middle; width: 150px; " data-field="mode" tabindex="0">
        <div class="th-inner ">
         模式
        </div>
        <div class="fht-cell"></div></th>
       <th style="text-align: left; vertical-align: middle; " data-field="coin" tabindex="0">
        <div class="th-inner ">
         资金
        </div>
        <div class="fht-cell"></div></th>
       <th style="text-align: left; vertical-align: middle; " data-field="userCoin" tabindex="0">
        <div class="th-inner ">
         余额
        </div>
        <div class="fht-cell"></div></th>
      </tr>
     </thead>
     <tbody>
      <tr class="no-records-found">
       <td colspan="9">没有找到匹配的记录</td>
      </tr>
     </tbody>
    </table>
   </div>
   <div class="fixed-table-footer" style="display: none;">
    <table>
     <tbody>
      <tr></tr>
     </tbody>
    </table>
   </div>
  <div class="clearfix"></div>



	</div>
	
	<div class="modal fade" id="editmodelForL" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="editLabel">彩票订单详情</h4>
				</div>
				<div class="modal-body">
						<table class="table table-bordered table-striped" style="clear: both">
						<tbody>
							<tr>
								<td width="20%" class="text-center" colspan="4">订单号:<span id="dingdh_L"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">账号:</td>
								<td width="35%" class="text-left"><span id="zhangh_L"></span></td>
								<td width="20%" class="text-right">单注金额:</td>
								<td width="35%" class="text-left"><span id="danzje_L"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">下注时间:</td>
								<td width="35%" class="text-left"><span id="xiazsj_L"></span></td>
								<td width="20%" class="text-right">投注注数:</td>
								<td width="35%" class="text-left"><span id="touzzs_L"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">彩种:</td>
								<td width="35%" class="text-left"><span id="caiz_L"></span></td>
								<td width="20%" class="text-right">倍数:</td>
								<td width="35%" class="text-left"><span id="beis_L"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">期号:</td>
								<td width="35%" class="text-left"><span id="qih_L"></span></td>
								<td width="20%" class="text-right">投注总额:</td>
								<td width="35%" class="text-left"><span id="touzze_L"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">玩法:</td>
								<td width="35%" class="text-left"><span id="wanf_L"></span></td>
								
								<td width="20%" class="text-right version1">单注奖金:</td>
								<td width="35%" class="text-left version1"><span id="danzjj_L"></span></td>
								
								<td width="20%" class="text-right version2 hide">赔率:</td>
								<td width="35%" class="text-left version2 hide"><span id="peilv_L"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">开奖号码:</td>
								<td width="35%" class="text-left"><span id="kaijhm_L"></span></td>
								<td width="20%" class="text-right">金额:</td>
								<td width="35%" class="text-left"><span id="jine_L"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">状态:</td>
								<td width="35%" class="text-left"><span id="zhuangt_L"></span></td>
								<td width="20%" class="text-right">中奖金额:</td>
								<td width="35%" class="text-left"><span id="zhongjje_L"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">中奖注数:</td>
								<td width="35%" class="text-left"><span id="zhongjzs_L"></span></td>
								<td width="20%" class="text-right">盈亏:</td>
								<td width="35%" class="text-left"><span id="yingkui_L"></span></td>
							</tr>
							
							
							<tr>
							<td width="20%" class="text-right" colspan="4">
							<textarea class="form-control" rows="3" id="touzhm_L"></textarea>
							</td>
								 
							</tr>
						</tbody>
				</table>
					
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="editmodelForM" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="editLabel">六合彩订单详情</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-striped" style="clear: both">
						<tbody>
							<tr>
								<td width="20%" class="text-center" colspan="4">订单号:<span id="dingdh_M"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">账号:</td>
								<td width="35%" class="text-left"><span id="zhangh_M"></span></td>
								<td width="20%" class="text-right">中奖注数:</td>
								<td width="35%" class="text-left"><span id="zhongjzs_M"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">下注时间:</td>
								<td width="35%" class="text-left"><span id="xiazsj_M"></span></td>
								<td width="20%" class="text-right">投注注数:</td>
								<td width="35%" class="text-left"><span id="touzzs_M"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">彩种:</td>
								<td width="35%" class="text-left"><span id="caiz_M">六合彩</span></td>
								<td width="20%" class="text-right">状态:</td>
								<td width="35%" class="text-left"><span id="zhuangt_M"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">期号:</td>
								<td width="35%" class="text-left"><span id="qih_M"></span></td>
								<td width="20%" class="text-right">投注总额:</td>
								<td width="35%" class="text-left"><span id="touzze_M"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">玩法:</td>
								<td width="35%" class="text-left"><span id="wanf_M"></span></td>
								<td width="20%" class="text-right">赔率:</td>
								<td width="35%" class="text-left"><span id="danzjj_M"></span></td>
							</tr>
							<tr>
								<td width="20%" class="text-right">开奖号码:</td>
								<td width="35%" class="text-left"><span id="kaijhm_M"></span></td>
								<td width="20%" class="text-right">中奖金额:</td>
								<td width="35%" class="text-left"><span id="zhongjje_M"></span></td>
							</tr>
							<tr>
								
								
							</tr>
							
							<tr>
								<td width="20%" class="text-right">盈亏:</td>
								<td width="35%" class="text-left"><span id="yingkui_M"></span></td>
							</tr>
							
							<tr>
							<td width="20%" class="text-right" colspan="4">
							<textarea class="form-control" rows="3" id="touzhm_M"></textarea>
							</td>
								 
							</tr>
							<tr><td width="20%" class="text-center info" colspan="4">
							<span class="glyphicon glyphicon-info-sign"></span>
							温馨提示:(中奖号码,既有本命年(0尾),又有非本命年(非0尾) 可能会出现2种赔率的情况)
							</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				</div>
			</div>
		</div>
	</div>
	
	<div class="modal fade" id="editmodelForS" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="editLabel">体育订单详情</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered table-striped" style="clear: both">
			<tbody><tr>
				<td class="text-center" colspan="4">订单号:<span id="bettingCode"></span></td>
			</tr>
			<tr>
				<td width="20%" class="text-right">账号</td>
				<td width="30%" class="text-left"><span id="memberName"></span></td>
				
				<td width="20%" class="bttd">
					<div class="text-right">投注时间</div>
				</td>
				<td width="30%">
					<div class="tymingxtabdiv" id="bettingDate"></div>
				</td>
			</tr>
			
				<tr>
				<td>
					<div class="text-right">球类</div>
				</td>
				<td>
					<div class="tymingxtabdiv" id="sportType"></div>
				</td>
				<td>
					<div class="text-right">类型</div>
				</td>
				<td>
					<div class="tymingxtabdiv" id="typeNames">
					</div>
				</td>
			</tr>
			<tr>
				<td class="bttd">
					<div class="text-right">下注金额</div>
				</td>
				<td>
					<div class="tymingxtabdiv" id="bettingMoney"></div>
				</td>
				<td class="bttd">
					<div class="text-right">提交状态</div>
				</td>
				<td>
					<div class="tymingxtabdiv" id="bettingStatus"></div>
				</td>
			</tr>
			<tr>
				<td class="bttd">
					<div class="text-right">结算状态</div>
				</td>
				<td>
					<div class="tymingxtabdiv" id="balance"></div>
				</td>
				<td class="bttd">
					<div class="text-right">派彩金额</div>
				</td>
				<td>
					<div class="tymingxtabdiv" id="bettingResult">-</div>
				</td>
			</tr>
			
			<tr>
				<td width="20%">
					<div class="text-right">赛事</div>
				</td>
				<td colspan="3">
					<div class="tymingxtabdiv" id="matchInfo">
					</div>
				</td>
			</tr>
		</tbody></table>	
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				</div>
			</div>
		</div>
	</div>

	<?php 

		$this->getTypes();
		$this->getPlayeds();

	?>

	<script type="text/javascript">

	var types = <?=json_encode($this->types) ?>;
	var palyed = <?=json_encode($this->playeds) ?>;

		var typeData = {};
		function getTab() {
			var curDate = new Date();
			var options = {
				language : 'zh-CN',
				autoclose : true,
			    weekStart: 1,
		        todayBtn:  1,
		        autoclose: 1,
		        todayHighlight: 1,
		        startView: 2,
		        forceParse: 0,
		        showSecond:1,
		        minuteStep:1,
				endDate : curDate,
				format : 'yyyy-mm-dd hh:ii:00'
			};
			$('#begin').datetimepicker(options);
			options.format="yyyy-mm-dd hh:ii:59";
			$('#end').datetimepicker(options);

			window.table = new Game.Table({
				id : 'datagrid_tb',
				url : '/index.php/team/getTeamChangeList',
				queryParams : queryParams,//参数
				toolbar : $('#toolbar'),
				columns : [ {
					field : 'actionTime',
					title : '时间',
					align : 'center',
					valign : 'middle',
					formatter : dateFormatter
				}, {
					field : 'username',
					title : '用户名',
					align : 'center',
					valign : 'middle'
				}, {
					field : 'liqType',
					title : '帐变类型',
					align : 'center',
					valign : 'middle',
					formatter : liqTypeFormatter
				}, {
					field : 'id',
					title : '单号',
					align : 'center',
					valign : 'middle',
					formatter : orderFormatter
				}, {
					field : 'type',
					title : '游戏',
					align : 'center',
					valign : 'middle',
					formatter : gameFormatter
				}, {
					field : 'playedId',
					title : '玩法',
					align : 'center',
					valign : 'middle',
					formatter : playedFormatter
				}, {
					field : 'actionNo',
					title : '期号',
					align : 'center',
					valign : 'middle',
					width : '150px'
					// ,
					// formatter : dateFormatter
				}, {
					field : 'mode',
					title : '模式',
					align : 'center',
					valign : 'middle',
					width : '150px',
					formatter : modeFormatter
				}, {
					field : 'coin',
					title : '资金',
					align : 'left',
					valign : 'middle'
				} , {
					field : 'userCoin',
					title : '余额',
					align : 'left',
					valign : 'middle'
				} ]
			});
		}

		function gameFormatter(value, row, index) {
			if (value==undefined){return '-'};
			return types[value].shortName;
		}

		function playedFormatter(value, row, index) {
			if (value==undefined){return '-'};
			return palyed[value].name;
		}

		function modeFormatter(value, row, index) {
		 	var mode = {"2.000":"元", "0.200":"角", "0.020":"分", "0.002":"厘"};
		 	return mode[value];
		}


		function orderFormatter(value, row, index) {

			// $.ajax({  
		 //         type : "post",  
		 //          url : "/index.php/team/getRecordInfo",  
		 //          data : {id:value},  
		 //          async : false,  
		 //          success : function(r){  
			// 			if (r.msg=='-') {
			// 				return r;
			// 			}else if (r.msg=="betInfo") {
			// 				return '<a href="#" width="850" onClick="showDetail("'+r.msg+'","'+r.data['fromid']+'")" title="投注信息" >'+r.data['wjorderId']+'</a>';
			// 				return r.data['wjorderId'];
			// 			}else if (r.msg=="rechargeModal") {
			// 				return '<a href="#" width="850" onClick="showDetail("'+r.msg+'","'+r.data['fromid']+'")" title="投注信息" >'+r.data['wjorderId']+'</a>';
			// 				return r.data['extfield1'];
			// 			}else if (r.msg=="cashModal") {
			// 				return '<a href="#" width="850" onClick="showDetail("'+r.msg+'","'+r.data['fromid']+'")" title="投注信息" >'+r.data['wjorderId']+'</a>';
			// 				return r.data['extfield0'];
			// 			}
		 //          }  
		 //     });

			// $.post('/index.php/team/getRecordInfo',{id:value},function(r){
				
			// 	return value;
				// if (r.msg=='-') {
				// 	return r;
				// }else if (r.msg=="betInfo") {
				// 	return '<a href="#" width="850" onClick="showDetail("'+r.msg+'","'+r.data['fromid']+'")" title="投注信息" >'+r.data['wjorderId']+'</a>';
				// 	return r.data['wjorderId'];
				// }else if (r.msg=="rechargeModal") {
				// 	return '<a href="#" width="850" onClick="showDetail("'+r.msg+'","'+r.data['fromid']+'")" title="投注信息" >'+r.data['wjorderId']+'</a>';
				// 	return r.data['extfield1'];
				// }else if (r.msg=="cashModal") {
				// 	return '<a href="#" width="850" onClick="showDetail("'+r.msg+'","'+r.data['fromid']+'")" title="投注信息" >'+r.data['wjorderId']+'</a>';
				// 	return r.data['extfield0'];
					
				// }
			// },'json');
		}



		function showDetail(type,fromid){
			console.log(type,fromid);
			// $.ajax({
			// 	url : '/daili/dlmnyrd/orderDesc.do?type='+type+'&orderId='+orderId,
			// 	success : function(j) {
			// 		if(!j){
			// 			Msg.info("订单有误!");
			// 		}else{
			// 			if(orderId.indexOf("L")!=-1){
			// 				$("#editmodelForL").modal('toggle');
			// 				lotteryBet(j);
			// 			}else if(orderId.indexOf("M")!=-1){
			// 				$("#editmodelForM").modal('toggle');
			// 	 			lhcBet(j);
			// 			}else if(orderId.indexOf("S")!=-1){
			// 				$("#editmodelForS").modal('toggle');
			// 				sportBet(j);
			// 			}else{
			// 				Msg.info("订单有误!");
			// 			}
			// 		}
					
			// 	}
			// });
		}


		//类型格式化
		function liqTypeFormatter(value, row, index) {

			var liqTypeName={
				1:'充值',
				2:'返点',
				//3:'返点',//分红
				//4:'抽水金额',
				5:'停止追号',
				6:'中奖金额',
				7:'撤单',
				8:'提现失败返回冻结金额',
				9:'管理员充值',
				10:'解除抢庄冻结金额',
				//11:'收单金额',
				12:'上级充值',
				13:'上级充值成功扣款',
				50:'签到赠送',
				51:'首次绑定工行卡赠送',
				52:'充值佣金',
				53:'消费佣金',
				54:'充值赠送',
				55:'注册佣金',
				100:'抢庄冻结金额',
				101:'投注冻结金额',
				102:'追号投注',
				103:'抢庄返点金额',
				//104:'抢庄抽水金额',
				105:'抢庄赔付金额',
				106:'提现冻结',
				107:'提现成功扣除冻结金额',
				108:'开奖扣除冻结金额',
				109:'上级充值',
				110:'给下级充值扣款',
				139:'分红奖金'
			};
			return liqTypeName[value];
		}

		
		// function orderFormatter(value, row, index){
		// 	if(value && (value.indexOf("L") != -1 ||value.indexOf("M") != -1 || value.indexOf("S") != -1)){
		// 		return "<a href='#' onClick=\"showDesc('"+value+"','"+row.type+"');\">"+value+"</a>";
		// 	}else{
		// 		return value;
		// 	}
		// }

		
		function showDesc(orderId,type){
			$.ajax({
				url : '/daili/dlmnyrd/orderDesc.do?type='+type+'&orderId='+orderId,
				success : function(j) {
					if(!j){
						Msg.info("订单有误!");
					}else{
						if(orderId.indexOf("L")!=-1){
							$("#editmodelForL").modal('toggle');
							lotteryBet(j);
						}else if(orderId.indexOf("M")!=-1){
							$("#editmodelForM").modal('toggle');
				 			lhcBet(j);
						}else if(orderId.indexOf("S")!=-1){
							$("#editmodelForS").modal('toggle');
							sportBet(j);
						}else{
							Msg.info("订单有误!");
						}
					}
					
				}
			});
		}
		
		function lotteryBet(j){
			if(j.lotCode){
				$('#caiz_L').html(cz(j.lotCode));
			}
			$('#dingdh_L').html(j.orderId);
			$('#zhangh_L').html(j.account);
			$('#touzzs_L').html(j.buyZhuShu);
			$('#beis_L').html(j.multiple);
			$('#qih_L').html(j.qiHao);
			$('#touzze_L').html(j.buyMoney);
			if(j.groupName){
				$('#wanf_L').html(j.groupName+'--'+j.playName);
			}else{
				$('#wanf_L').html(j.playName);
			}
			
			$('#danzjj_L').html(j.minBonusOdds);
			$('#kaijhm_L').html(j.lotteryHaoMa);
			
			if(j.peilv){
 				$('#peilv_L').html(j.peilv);
 				$('.version1').addClass("hide");
 				$('.version2').removeClass("hide");
 				$('#danzje_L').html(fmoney(j.buyMoney,2));
 			}else{
 				$('.version2').addClass("hide");
 				$('.version1').removeClass("hide");
 				var danzje = 2/j.model;
 				if(danzje){
 					$('#danzje_L').html(fmoney(danzje,2));
 				}
 			}
			
			var zt = j.status;
			if(zt){
				$('#zhuangt_L').html(kjzt(zt*1));
			}
			
			$('#zhongjzs_L').html(j.winZhuShu);
			$('#touzhm_L').html(j.haoMa);
			
			var fszt = j.rollBackStatus;
			if(""){
				$('#fanszt_L').html(mutilFormatter(fszt*1,1));
			}else{
				$('#fanszt_L').html(mutilFormatter(fszt*1,2));
			}
			
			var je = j.rollBackMoney;
			if(je*1 > 0){
				$('#jine_L').html(fmoney(je,2));
			}else{
				$('#jine_L').html('0.00');
			}
			
			
			var xzsj = j.createTime;
			$('#xiazsj_L').html(getLocalTime(xzsj));
			
			var yk = '0.00';
			var wm = j.winMoney;
			var rb = j.rollBackMoney;
			var bm = j.buyMoney;
			
			if(wm && wm*1 >=0){
				yk = yk*1 + wm*1;
			}
			if(rb && rb*1 >=0){
				yk = yk*1 + rb*1;
			}
			if(bm && bm*1 >=0){
				yk = yk*1 - bm*1;
			}
			if(j.status == 8){
				$('#zhongjje_L').html(fmoney(j.buyMoney,2));
				$('#yingkui_L').html('0.00');
			}else{
				$('#zhongjje_L').html(fmoney(j.winMoney,2));
				$('#yingkui_L').html(fmoney(yk*1,2));
			}
			
		}
		
		function lhcBet(j){
			$('#dingdh_M').html(j.bettingOrder);
			$('#zhangh_M').html(j.account);
			$('#zhongjzs_M').html(j.winZhuShu);
			$('#xiazsj_M').html(j.betting);
			$('#touzzs_M').html();
			$('#qih_M').html(j.qiHao);
			$('#wanf_M').html(j.playName);
			$('#touzze_M').html(j.buyMoney);
			$('#danzjj_M').html(j.peilv);
			$('#kaijhm_M').html(j.lotteryHaoMa);
			$('#zhongjje_M').html(j.winMoney);
			$('#yingkui_M').html();
			$('#touzhm_M').html(j.haoMa);
			var zt = j.status;
			if(zt){
				$('#zhuangt_M').html(kjzt(zt*1));
			}
			var fszt = j.rollBackStatus;
			if(""){
				$('#fanszt_M').html(mutilFormatter(fszt*1,1));
			}else{
				$('#fanszt_M').html(mutilFormatter(fszt*1,2));
			}
			
			var je = j.rollBackMoney;
			if(je*1 > 0){
				$('#jine_M').html(fmoney(je,2));
			}else{
				$('#jine_M').html('0.00');
			}
			
			var xzsj = j.createTime;
			$('#xiazsj_M').html(getLocalTime(xzsj));
			
			var yk = '0.00';
			var wm = j.winMoney;
			var rb = j.rollBackMoney;
			var bm = j.buyMoney;
			
			if(wm && wm*1 >=0){
				yk = yk*1 + wm*1;
			}
			if(rb && rb*1 >=0){
				yk = yk*1 + rb*1;
			}
			if(bm && bm*1 >=0){
				yk = yk*1 - bm*1;
			}
			$('#yingkui_M').html(fmoney(yk*1,2));
			
		}
		
		function sportBet(order){
			$("#memberName").html(order.memberName);
			$("#odds").html(order.odds);
			$("#bettingMoney").html(order.bettingMoney);
			$("#bettingCode").html(order.bettingCode);
			$("#bettingDate").html(getBettingDate(order));
			$("#sportType").html(getSportName(order.sportType));
			$("#bettingStatus").html(getBettingStatus(order));
			$("#balance").html(getBalanceStatus(order));
			$("#matchInfo").html(getMatchInfo(order));
			$("#typeNames").html(order.typeNames);
			if(order.bettingResult == undefined){
				
			}else if(order.bettingResult > 0){
				$("#bettingResult").html("<font color='green'>"+order.bettingResult+"</font>");
			}else{
				$("#bettingResult").html(order.bettingResult);
			}
		}
		
		function getBalanceStatus(order){
			var value = order.balance;
			if(value == 1){
				return "<font color='blue'>未结算</font>";
			}
			
			if(value == 2 || value == 5 || value == 6){
				return "<font color='green'>已结算</font>";
			}
			
			if(value == 3){
				return "<font color='red'>结算失败</font>";
			}
			
			if(value == 4){
				return "<font color='red'>比赛腰斩</font>";
			}
		}
		
		function getBettingDate(order){
			var betDate = new Date(order.bettingDate);
			return betDate.format("MM月dd日,hh:mm:ss");
		}
		
		function getBettingStatus(order){
			var value = order.bettingStatus;
			if(value == 1){
				return "<font color='blue'>待确认</font>";
			}
			if(value == 2){
				return "已确认";
			}
			
			if(value == 3){
				var content = "取消";
				if(order.statusRemark){
					content += "("+order.statusRemark+")";
				}
				return "<font color='red'>" + content + "</font>";
			}
			
			if(value == 4){
				return "<font color='red'>取消</font>";
			}
		}
		
		function getSportName(type){
			if(type == 1){
				return "足球";
			}
			if(type == 2){
				return "篮球";
			}
			return "其他";
		}
		

		function toBetHtml(item,order){
			var row = order;
			var con = item.con;
			if(con.indexOf("vs") == -1){
				con = '<span class="text-danger">'+ con +'</span>';
			}
			var homeFirst = row.homeTeam  == item.firstTeam;//主队是否在前
			var scoreStr = "";
			
			
			if(row.gameTimeType == 1){
				if(homeFirst){
					scoreStr = "&nbsp;<font color='red'><b>(" + row.scoreH +":" + row.scoreC + ")</b></font>";
				}else{
					scoreStr = "&nbsp;<font color='red'><b>(" + row.scoreC +":" + row.scoreH + ")</b></font>";
				}
			}
			var home = item.firstTeam;
			var guest = item.lastTeam;
			if(item.half === true && row.mix == 2){
				home = home + "<font color='gray'>[上半]</font>";
				guest = guest + "<font color='gray'>[上半]</font>";
			}
			
			var html  = item.league +"<br/>" + 
						home + "&nbsp;" + con + "&nbsp;" + guest + scoreStr + "<br/>" +
						"<font color='red'>"+item.result+ "</font>&nbsp;" +"@" + "&nbsp;<font color='red'>"+ item.odds +"</font>";
			var balance = row.mix != 2 ? row.balance : item.balance;
			var bt = row.bettingStatus;
			if(balance == 4){
				html = "<s style='color:red;'>" + html+"(赛事腰斩)</s>"
			}else if(bt == 3 || bt == 4){
				html = "<s style='color:red;'>" + html+"("+row.statusRemark+")</s>"
			}else if(balance == 2 || balance == 5 || balance == 6){
				var mr = row.mix != 2 ? row.result:item.matchResult;
				if(homeFirst){
					html = html + "&nbsp;<font color='blue'>("+mr+")</font>";
				}else{
					var ss = mr.split(":");
					html = html + "&nbsp;<font color='blue'>("+ss[1]+":"+ss[0]+")</font>";
				}
			}			
			return html;
		}


		function getMatchInfo(order){
			if(order.mix != 2){
				return toBetHtml(JSON.decode(order.remark),order);
			}
			var html = "";
			var arr = JSON.decode(order.remark)
			for(var i=0;i<arr.length;i++){
				if(i != 0){
					html += "<div style='border-bottom:1px #303030 dotted;'></div>";
				}
				html += toBetHtml(arr[i],order);
			}
			return html;
		}
		
		function typeFormatter(value, row, index) {
			return typeData[value];
		}
		function moneyFormatter(value, row, index) {

			if (value === undefined) {
				return value;
			}

			if (value > 0) {
				return [ '<span class="text-danger">', '</span>' ].join(value);
			}
			return [ '<span class="text-primary">', '</span>' ].join(value);

		}

		function dateFormatter(value, row, index) {
			if(value == null){return '--';}
			return new Date(parseInt(value) * 1000).toLocaleString().replace(/:\d{1,2}$/,' '); 
		}
		
		function fmoney(s, n) { 
			n = n > 0 && n <= 20 ? n : 2; 
			s = parseFloat((s + "").replace(/[^\d\.-]/g, "")).toFixed(n) + ""; 
			var l = s.split(".")[0].split("").reverse(), r = s.split(".")[1]; 
			t = ""; 
			for (i = 0; i < l.length; i++) { 
			t += l[i] + ((i + 1) % 3 == 0 && (i + 1) != l.length ? "" : ""); 
			} 
			return t.split("").reverse().join("") + "." + r; 
		}
		
			function kjzt(obj){
				var col = '';
				switch(obj){
				case 1:
					col = '<span class="label label-primary" >等待开奖</span>';
					break;
				case 2:
					col = '<span class="label label-success" >已中奖</span>';
					break;
				case 3:
					col = '<span class="label label-danger" >未中奖</span>';
					break;
				case 4:
					col = '<span class="label label-info" >撤单</span>';
					break;
				case 5:
					col = '<span class="label label-success">派奖回滚成功</span>';
					break;
				case 6:
					col = '<span class="label label-warning">回滚异常的</span>';
					break;
				case 7:
					col = '<span class="label label-warning">开奖异常</span>';
					break;
				}
				return col;
			}
			
			function getLocalTime(nS) {  
				var date = new Date(nS);
				var dateFormat=date.getFullYear() + '-' + (date.getMonth() + 1) + '-' + date.getDate() + ' '+ date.getHours()+':'+date.getMinutes()+":"+date.getSeconds();
			   return dateFormat;     
			}
			
			function mutilFormatter(value,type){
				var col = '';
				if(type == 2){
					switch(value){
					case 1:
					case 2:
						col = "还未反水";
						break;
					case 4:
						col = "已经反水";
						break;
					case 3:
						col =  "反水回滚"
						break;
					}
				}else{
					switch(value){
					case 1:
						col = "还未返点";
						break;
					case 2:
						col = "已经返点";
						break;
					case 3:
						col = "返点回滚"
						break;
					}
				}
				return col;
			}
		


		//设置传入参数
		function queryParams(params) {
			params['account'] = $("#account").val();
			params['type'] = $("#type").val();
			params['begin'] = $("#begin").val();
			params['end'] = $("#end").val();
			params['orderId'] = $("#orderId").val();
			return params
		}
		$(function() {
			// initCombo();
			getTab();
			bindbtn();
		})

		function search() {
			$("#datagrid_tb").bootstrapTable('refresh');
		}

		function initCombo() {
			$.ajax({
				url : "/daili/dlmnyrd/money/record/type.do",
				async : false,
				success : function(data) {
					var eachdata = {
						"data" : data
					};
					typeData = toTypeMap(data);
					var html = template('recordtype_tpl', eachdata);
					$("#type").append(html);
					var url =  location.href;
					if(url.indexOf('param=')!=-1){
						var obj = $('#type');
						if(url.indexOf('param=sdkk')!=-1){
							obj.find("option[value='2']").attr("selected",true); 
						}else if(url.indexOf('param=sdjk')!=-1){
							obj.find("option[value='1']").attr("selected",true); 
						}
					}
				}
			});
		}

		function toTypeMap(data) {
			var map = {};
			if (data) {
				for (var i = 0; i < data.length; i++) {
					if (!data[i]) {
						continue;
					}
					map[data[i].type] = data[i].name;
				}
			}
			return map;
		}

		function setDate(begin, end) {
			$('#begin').val(begin);
			$('#end').val(end);
		}

		function bindbtn() {
			$("#toolbar").find(".btn-default").click(function() {
				var type = $(this).html();
				var begin = "";
				var end = "";
				if ('今日' === type) {
					begin = DateUtil.getCurrentDate();
					end = begin;
				} else if ('昨日' === type) {
					begin = DateUtil.getLastDate();
					end = begin;
				} else if ('本周' === type) {
					begin = DateUtil.getWeekStartDate();
					end = DateUtil.getCurrentDate();
				} else if ('上周' === type) {
					begin = DateUtil.getLastWeekStartDate();
					end = DateUtil.getLastWeekEndDate();
				} else if ('本月' === type) {
					begin = DateUtil.getMonthDate();
					end = DateUtil.getCurrentDate();
				} else if ('上月' === type) {
					begin = DateUtil.getLastMonthStartDate();
					end = DateUtil.getLastMonthEndDate();
				}
				setDate(begin+" 00:00:00", end+" 23:59:59");
				search();
			});
		}
	</script>

<div class="datetimepicker datetimepicker-dropdown-bottom-right dropdown-menu" style="left: 390px; z-index: 10009;">
	<div class="datetimepicker-minutes" style="display: none;">
	</div>
</div>


</body></html>