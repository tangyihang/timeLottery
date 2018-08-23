<?php $this->display('inc_header.php'); ?>

	<div class="container" style="margin-top: 20px;">
		<ol class="breadcrumb">
			<li><a href="/">首页</a></li>
			<li class="active">下级列表</li>
		</ol>
	</div>
	<input type="hidden" value="1" id="agentId">
	<div class="container">
		
		<div class="bootstrap-table">
		<div class="fixed-table-toolbar">
			<div class="bars pull-left">
				<div id="toolbar">
					<div id="search" class="form-inline">
						<button class="btn btn-primary" onclick="add();">新增</button>
						<label class="sr-only" for="saccount">输入会员名查询</label>
						<div class="form-group">
							<div class="input-group">
								<select id="searchType" class="form-control">
									<option value="1">直属下级</option>
									<option value="2">所有下级</option>
								</select>
							</div>
							<div class="input-group">
								<select id="onlineFlag" class="form-control">
									<option value="">全部</option>
									<option value="1">离线</option>
									<option value="2">在线</option>
								</select>
							</div>
							<div class="input-group">
								<select id="stype" class="form-control">
									<option value="">全部</option>
									<option value="1">会员</option>
									<option value="4">代理</option>
								</select>
							</div>
							<div class="input-group">
								<input type="text" class="form-control" id="saccount" placeholder="输入会员名查询">
							</div>
						</div>
						<button class="btn btn-primary" onclick="search();">查询</button>
						<button class="btn btn-primary" onclick="back();">返回</button>
					</div>
				</div>
			</div>
			<div class="columns columns-right btn-group pull-right">
			<!-- <button class="btn btn-default" type="button" name="refresh" title="刷新">
				<i class="glyphicon glyphicon-refresh icon-refresh"></i>
			</button>
			<button class="btn btn-default" type="button" name="toggle" title="切换">
				<i class="glyphicon glyphicon-list-alt icon-list-alt"></i>
			</button> -->
			<div class="keep-open btn-group" title="列">
				<!-- <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
					<i class="glyphicon glyphicon-th icon-th"></i> 
					<span class="caret"></span>
				</button> -->
				<ul class="dropdown-menu" role="menu">
					<li>
						<label>
							<input type="checkbox" data-field="account" value="0" checked="checked"> 用户账号
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox" data-field="money" value="1" checked="checked"> 账号余额
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox" data-field="gameShare" value="2" checked="checked"> 
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox" data-field="userName" value="3" checked="checked"> 用户姓名
						</label>
					</li>
					<li>
						<label>
						<input type="checkbox" data-field="accountType" value="4" checked="checked"> 用户类型
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox" data-field="createDatetime" value="5" checked="checked"> 注册时间
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox" data-field="lastLoginDatetime" value="6" checked="checked"> 最后登录时间
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox" data-field="lastLoginIp" value="7" checked="checked"> 最后登录ip
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox" data-field="online" value="8" checked="checked"> 在线情况
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox" data-field="accountStatus" value="9" checked="checked"> 状态
						</label>
					</li>
					<li>
						<label>
							<input type="checkbox" data-field="10" value="10" checked="checked"> 操作
						</label>
					</li>
				</ul>
			</div>
			</div>
		</div>


				<div class="fixed-table-container" style="padding-bottom: 0px;">
				<div class="fixed-table-header" style="display: none;">
				<table></table>
				</div>
				<div class="fixed-table-body">
				<div class="fixed-table-loading" style="top: 41px; display: none;">正在努力地加载数据中，请稍候……</div>


<table id="datagrid_tb" class="table table-hover table-striped"> 
   <thead> 
    <tr> 
     <th style="text-align: center; vertical-align: middle; " data-field="account" tabindex="0"> 
      <div class="th-inner ">
       用户账号
      </div> 
      <div class="fht-cell"></div> </th> 
     <th style="text-align: center; vertical-align: middle; " data-field="money" tabindex="0"> 
      <div class="th-inner sortable both">
       账号余额
      </div> 
      <div class="fht-cell"></div> </th> 
     <th style="text-align: center; vertical-align: middle; " data-field="gameShare" tabindex="0"> 
      <div class="th-inner sortable both">
       返点数
      </div> 
      <div class="fht-cell"></div> </th> 
     <th style="text-align: center; vertical-align: middle; " data-field="userName" tabindex="0"> 
      <div class="th-inner ">
       用户姓名
      </div> 
      <div class="fht-cell"></div> </th> 
     <th style="text-align: center; vertical-align: middle; " data-field="accountType" tabindex="0"> 
      <div class="th-inner sortable both">
       用户类型
      </div> 
      <div class="fht-cell"></div> </th> 
     <th style="text-align: center; vertical-align: middle; " data-field="createDatetime" tabindex="0"> 
      <div class="th-inner sortable both">
       注册时间
      </div> 
      <div class="fht-cell"></div> </th> 
     <th style="text-align: center; vertical-align: middle; " data-field="lastLoginDatetime" tabindex="0"> 
      <div class="th-inner sortable both">
       最后登录时间
      </div> 
      <div class="fht-cell"></div> </th> 
     <th style="text-align: center; vertical-align: middle; " data-field="lastLoginIp" tabindex="0"> 
      <div class="th-inner ">
       最后登录ip
      </div> 
      <div class="fht-cell"></div> </th> 
     <th style="text-align: center; vertical-align: middle; " data-field="online" tabindex="0"> 
      <div class="th-inner sortable both">
       在线情况
      </div> 
      <div class="fht-cell"></div> </th> 
     <th style="text-align: center; vertical-align: middle; " data-field="accountStatus" tabindex="0"> 
      <div class="th-inner ">
       状态
      </div> 
      <div class="fht-cell"></div> </th> 
     <th style="text-align: center; vertical-align: middle; width: 200px; " data-field="10" tabindex="0"> 
      <div class="th-inner ">
       操作
      </div> 
      <div class="fht-cell"></div> </th> 
    </tr> 
   </thead> 
   <tbody> 
    <!-- <tr data-index="0"> 
     <td style="text-align: center; vertical-align: middle; "> <a class="detail" href="javascript:void(0)" title="详情"> <span class="text-danger">456aaacom</span> </a> </td> 
     <td style="text-align: center; vertical-align: middle; "> <span class="text-danger">22.75</span> </td> 
     <td style="text-align: center; vertical-align: middle; ">0.5</td> 
     <td style="text-align: center; vertical-align: middle; ">**木</td> 
     <td style="text-align: center; vertical-align: middle; "> <span class="text-primary">代理</span> </td> 
     <td style="text-align: center; vertical-align: middle; ">2017-05-26 12:39:36</td> 
     <td style="text-align: center; vertical-align: middle; ">2017-06-08 14:18:17</td> 
     <td style="text-align: center; vertical-align: middle; ">211.142.221.152</td> 
     <td style="text-align: center; vertical-align: middle; ">-</td> 
     <td style="text-align: center; vertical-align: middle; "> <span class="text-success">启用</span> </td> 
     <td style="text-align: center; vertical-align: middle; width: 200px; "></td> 
    </tr>  -->
   </tbody> 
  </table>

			</div>

			<!-- <div class="fixed-table-footer" style="display: none;">
			   <table>
			    <tbody>
			     <tr></tr>
			    </tbody>
			   </table>
			  </div> -->
			 <!--  <div class="fixed-table-pagination" style="display: block;">
			   <div class="pull-left pagination-detail">
			    <span class="pagination-info">显示第 1 到第 10 条记录，总共 16 条记录</span>
			    <span class="page-list">每页显示 <span class="btn-group dropup"><button type="button" class="btn btn-default  dropdown-toggle" data-toggle="dropdown"><span class="page-size">10</span> <span class="caret"></span></button>
			      <ul class="dropdown-menu" role="menu">
			       <li class="active"><a href="javascript:void(0)">10</a></li>
			       <li><a href="javascript:void(0)">25</a></li>
			      </ul></span> 条记录</span>
			   </div>
			   <div class="pull-right pagination col-sm-6 text-right">
			    <div class="row">
			     <div class="col-lg-9">
			      <ul class="pagination">
			       <li class="page-pre"><a href="javascript:void(0)">‹</a></li>
			       <li class="page-number active"><a href="javascript:void(0)">1</a></li>
			       <li class="page-number"><a href="javascript:void(0)">2</a></li>
			       <li class="page-next"><a href="javascript:void(0)">›</a></li>
			      </ul>
			     </div>
			     <div class="col-lg-3">
			      <div class="input-group" style="width:100px;">
			       <input type="text" class="form-control" placeholder="页码" value="1" />
			       <span class="input-group-btn"><button class="btn btn-default" type="button">Go</button> </span> 
			      </div> 
			     </div> 
			    </div> 
			   </div> 
			  </div>   -->
			<div class="clearfix"></div>
	</div>
	<div class="modal fade bs-example-modal-lg" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="editLabel">编辑用户</h4>
				</div>
				<div class="modal-body">
					<input type="hidden" id="accountId">
					<table class="table table-bordered table-striped" style="clear: both">
						<tbody>
							<tr>
								<td width="15%" class="text-right">登录账号：</td>
								<td width="35%" class="text-left"><input type="text" class="form-control" id="account" disabled="disabled"></td>
								<td width="15%" class="text-right">用户类型：</td>
								<td width="35%" class="text-left"><select id="accountType" class="form-control" disabled="disabled">
										<option value="0" id="member_opt" checked="checked">会员</option>
										<option value="1" id="agent_opt">代理</option>
										<!-- <option value="5" id="general_opt">总代理</option> -->
								</select></td>
							</tr>
							<tr class="newpwd_tr">
								<td width="15%" class="text-right">密码：</td>
								<td width="35%" class="text-left"><input type="password" class="form-control" id="newpwd"></td>
								<td width="15%" class="text-right">确认密码：</td>
								<td width="35%" class="text-left"><input type="password" class="form-control" id="newrpwd"></td>
							</tr>
							<tr class="userinfo_tr">
								<td width="15%" class="text-right">账号状态：</td>
								<td width="35%" class="text-left"><select id="accountStatus" class="form-control" disabled="disabled">
										<option value="0">禁用</option>
										<option value="1">启用</option>
								</select></td>
								<td width="15%" class="text-right">用户姓名：</td>
								<td width="35%" class="text-left"><input type="text" class="form-control" id="userName" disabled="disabled"></td>
							</tr>
							<tr class="userinfo_tr">
								<td width="15%" class="text-right">银行账号：</td>
								<td width="35%" class="text-left"><input type="text" class="form-control" id="cardNo" disabled="disabled">
								</td><td width="15%" class="text-right">取现银行：</td>
								<td width="35%" class="text-left">
									<input id="bankName" class="form-control" disabled="disabled">
								</td>
								
							</tr>

							<tr class="rebateNum_tr">
								<td width="15%" class="text-right multiData hidden">返点数：</td>
								<td width="35%" class="text-left multiData hidden"><input type="text" class="form-control" id="rebateNum"></td>
								<td width="50%" class="text-left multiData hidden" colspan="2"><span id="rebate_desc"></span></td>
							</tr>
							<tr class="userinfo_tr">
								<td width="15%" class="text-right showTel">电话：</td>
								<td width="35%" class="text-left showTel"><input type="text" class="form-control" id="phone" disabled="disabled"></td>
								<td width="15%" class="text-right showEmail">邮箱：</td>
								<td width="35%" class="text-left showEmail"><input type="text" class="form-control" id="email" disabled="disabled"></td>
							</tr>
							<tr class="parentNames_tr">
								<td width="15%" class="text-right showBankAdd">银行地址：</td>
								<td width="35%" class="text-left showBankAdd"><input type="text" class="form-control" id="bankAddress" disabled="disabled"></td>
								<td width="15%" class="text-right showQQ">QQ：</td>
								<td width="35%" class="text-left showQQ"><input type="text" class="form-control" id="qq" disabled="disabled"></td>
							</tr>
							<tr>
								<td width="15%" class="text-right">所属上级：</td>
								<td width="85%" colspan="3" class="text-left"><textarea class="form-control" id="parentNames" disabled="disabled"></textarea></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="save();" id="save_btn">保存</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				</div>
			</div>
		</div>
	</div>
	<!-- 增加下级 -->
	<div class="modal fade bs-example-modal-lg" id="editmodel2" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="editLabel">加款</h4>
				</div>
				<div class="modal-body hidden" id="memmnyope_tb"><table class="table table-bordered" style="margin-top:10px;clear: both">
				<input type="hidden" id="accountId">
                <tbody>
					<tr>
						<td width="35%" class="text-right active">会员账号：</td>
                        <td width="65%" colspan="2"><span id="accountspan" class="text-primary"></span></td>
					</tr>
					<tr>
						<td width="35%" class="text-right active">账号余额：</td>
                        <td width="65%" colspan="2"><span id="moneyspan" class="text-danger"></span></td>
					</tr>  
					<tr>
						<td width="35%" class="text-right active">操作类型：</td>
                        <td width="65%" colspan="2"><select id="type" class="form-control"><option value="1">人工加款</option></select></td>
					</tr>
					<tr>
						<td width="35%" class="text-right active">操作金额：</td>
                        <td width="65%" colspan="2"><input type="text" class="form-control" id="money"></td>
					</tr>
					<tr>
						<td colspan="3" class="text-center"><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="submit1();">确认</button></td>
					</tr>
				</tbody>
		</table></div>
			</div>
		</div>
	</div>

	<!-- 修改返点数 -->
	<input type="hidden" id="curFands" value="0.4">
	<div class="modal fade bs-example-modal-lg" id="editmodel3" tabindex="-1" role="dialog" aria-labelledby="editLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					<h4 class="modal-title" id="editLabel">下级返点数修改</h4>
				</div>
				<div class="modal-body">
					<table class="table table-bordered" style="margin-top: 10px; clear: both">
						<tbody>
							<tr>
								<input type="hidden" id="fdsAcc">
								<td width="35%" class="text-right active">会员账号：</td>
								<td width="65%" colspan="2"><span id="fsAccount" class="text-primary"></span></td>
							</tr>
							<tr>
								<td width="35%" class="text-right active">当前点数：</td>
								<td width="65%" colspan="2"><span id="fsCur" class="text-primary"></span></td>
							</tr>
							<tr>
								<td width="35%" class="text-right active">点数修改为：</td>
								<td width="65%" colspan="2"><input type="text" class="form-control" style="width: 25%; float: left;" id="fsAdd"> <span style="line-height: 32px;">(可设置返点区间: <span class="lable lable-success"><span id="fsCur2"></span>-<span class="cfands">0.4</span></span>)
								</span></td>
							</tr>
							<tr>
								<td width="35%" class="text-right">所属上级：</td>
								<td width="65%" colspan="3" class="text-left"><textarea class="form-control" id="parentNames2" disabled="disabled"></textarea></td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-primary" data-dismiss="modal" onclick="addFs();">确认修改</button>
					<button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
				</div>
			</div>
		</div>
	</div>
	<script id="memmnyope_tpl" type="text/html">
		 <table class="table table-bordered" style="margin-top:10px;clear: both">
				<input type="hidden" id="accountId"/>
                <tbody>
					<tr>
						<td width="35%" class="text-right active">会员账号：</td>
                        <td width="65%" colspan="2"><span id="accountspan" class="text-primary"></span></td>
					</tr>
					<tr>
						<td width="35%" class="text-right active">账号余额：</td>
                        <td width="65%" colspan="2"><span id="moneyspan" class="text-danger"></span></td>
					</tr>  
					<tr>
						<td width="35%" class="text-right active">操作类型：</td>
                        <td width="65%" colspan="2"><select id="type" class="form-control"><option value="1">人工加款</option></select></td>
					</tr>
					<tr>
						<td width="35%" class="text-right active">操作金额：</td>
                        <td width="65%" colspan="2"><input type="text" class="form-control" id="money" /></td>
					</tr>
					<tr>
						<td colspan="3" class="text-center"><button type="button" class="btn btn-primary" data-dismiss="modal" onclick="submit1();">确认</button></td>
					</tr>
				</tbody>
		</table>
</script>

<script type="text/javascript">

		// alert($);

		$(function() {
			var online = '<?=$_GET['online']?>';
			if(online){
				$("#onlineFlag").val(online);
			}

			getTab();
			bindType();
			// checkMutli();
		});



		$(function()  {
			// $.ajax({
			// 	url : "/daili/dlaccount/third/list.do",
			// 	success : function(data) {
			// 		var eachdata = {
			// 			"data" : data
			// 		};
			// 		var html = template('memmnyope_tpl', eachdata);
			// 		$("#memmnyope_tb").html(html);
			// 		$("#memmnyope_tb").addClass("hidden");
			// 	}
			// });
			fdsDate();
		});
		
		function submit1() {
			$.ajax({
				url : "/daili/dlaccount/saveCash.do",
				data : {
					id : $("#accountId").val(),
					type : $("#type").val(),
					money : $("#money").val(),
					remark : $("#remark").val(),
				},
				success : function(data) {
					$("#moneyspan").html(data);
					$("#money").val("");
					$("#type").val("");
					$("#remark").val("");
					Msg.info("操作成功！");
					search();
				}
			});
		}
		function search1(account) {
			$.ajax({
				url : "/daili/dlaccount/memmny.do",
				data : {
					account : account
				},
				success : function(data) {
					$("#accountId").val(data.accountId);
					$("#accountspan").html(data.account);
					$("#moneyspan").html(data.money);
					$("#memmnyope_tb").removeClass("hidden")
				}
			});
		}

		function reset() {
			$("#accountId").val("");
			$("#accountspan").html("");
			$("#moneyspan").html("");
			$("#searchtext").val("");
			$("#money").val("");
			$("#type").val("");
			$("#remark").val("");
			$("#memmnyope_tb").addClass("hidden")
		}

		function refresh(thirdid) {
			Msg.info("暂时没接入...");
		}
	</script>

	<script type="text/javascript">
		var ps = [ {
			"id" : 0,
			"flag" : 0
		} ]; //轨迹
		var parentId = 0; //当前父节点ID
		var opFlag = 0;
		var ops = [ 'agentId', 'agentParentId' ];
		var agentMulti = "";
		function getTab() {
			window.table = new Game.Table({
				id : 'datagrid_tb',
				url : '/index.php/team/getMemberListByCondition',
				sortType:'local',
				queryParams : queryParams,//参数
				toolbar : $('#toolbar'),
				columns : [ {
					field : 'username',
					title : '用户账号',
					align : 'center',
					valign : 'middle',
					events : operateEvents,
					formatter : accountFormatter
				}, {
					field : 'coin',
					title : '账号余额',
					align : 'center',
					valign : 'middle',
					sortable: true,
					formatter : moneyFormatter
				},
				
				{
					field : 'fandian',
					title : '返点数',
					align : 'center',
					valign : 'middle',
					sortable: true
				}, {
					field : 'nickname',
					title : '用户姓名',
					align : 'center',
					valign : 'middle',
					formatter : userFormatter
				}, {
					field : 'accountType',
					title : '用户类型',
					align : 'center',
					valign : 'middle',
					sortable: true,
					formatter : typeFormatter
				}, {
					field : 'regTime',
					title : '注册时间',
					align : 'center',
					valign : 'middle',
					sortable: true,
					formatter : dateFormatter
				}, {
					field : 'loginTime',
					title : '最后登录时间',
					align : 'center',
					valign : 'middle',
					sortable: true,
					formatter : dateFormatter
				}, {
					field : 'loginIP',
					title : '最后登录ip',
					align : 'center',
					valign : 'middle'
				}, {
					field : 'loginid',
					title : '在线情况',
					align : 'center',
					valign : 'middle',
					sortable: true,
					formatter : onlineFormatter,
				}, {
					field : 'ENABLE',
					title : '状态',
					align : 'center',
					valign : 'middle',
					formatter : statusFormatter,
				}, {
					title : '操作',
					align : 'center',
					width : '200',
					valign : 'middle',
					events : operateEvents,
					formatter : operateFormatter
				} ]
			});
		}

		function userFormatter(value, row, index){
			if(value){
				return '**'+value.Right(1);
			}
		}
		
		// 从右边截取i位有效字符
		String.prototype.Right = function(i) { // 为String对象增加一个Right方法
			return this.slice(this.length - i, this.length); // 返回值为 以“该字符串长度减i”为起始 到
																// 该字符串末尾 的截取字符串
		};
		
		function addFs(){
			var fs = $('#curFands').val();//可分配的返点数
			var inputFs = $('#fsAdd').val();//输入的返点数
			var	curFds = $('#fsCur2').text();//当前返点数
			var accId= $('#fdsAcc').val();
			if(!inputFs){
				Msg.info('请输入返点数!');
				return false;
			}
			if(inputFs*1 > fs*1){
				Msg.info('输入的返点数不能大于可分配返点数!');
				return false;
			}
			if( inputFs*1 < curFds*1){
				Msg.info('输入的返点数不能小于下级最大返点!');
				return false;
			}
			//校验成功,修改返点数
 			$.ajax({
 				url : "/daili/dlaccount/saveFds.do",
 				data:{
 					"id":accId,
 					"rebateNum":inputFs
 				},
 				success : function(result) {
 					Msg.info("修改成功！");
 					$("#datagrid_tb").bootstrapTable('refresh');
 				}
 			});
		}
		
		function onlineFormatter(value, row, index) {
			if (row.accountType != 1) {
				return "-";
			}
			if (value == 2) {
				return '<span class="label label-success">在线</span>';
			}
			return '<span class="label label-default">离线</span>';
		}

		function accountFormatter(value, row, index) {

			return [
					'<a class="detail" href="javascript:void(0)" title="详情"><span class="text-danger">',
					'</span></a>' ].join(value);
		}

		function typeFormatter(value, row, index) {
			return [ '<span class="text-primary">', '</span>' ]
					.join(value=="1"?"代理":"会员");
		}

		function statusFormatter(value, row, index) {

			if (value == 1) {
				return '<span class="text-success">启用</span>';
			}
			return '<span class="text-danger">禁用</span>';
		}
		function moneyFormatter(value, row, index) {
			if (value == undefined) {
				return value;
			}
			var f = parseFloat(value);
			f=Math.round(f*100) / 100;
			if (value > 0) {
				return [ '<span class="text-danger">', '</span>' ].join(f);
			}
			return [ '<span class="text-primary">', '</span>' ].join(f);
		}

		function dateFormatter(value, row, index) {
			if(value == null){return '--';}
			return new Date(parseInt(value) * 1000).toLocaleString().replace(/:\d{1,2}$/,' '); 
			return DateUtil.formatDatetime(value);
		}

		function operateFormatter(value, row, index) {
			var btns = [];
			var up = '<a class="doup" href="javascript:void(0)" title="上一级">上一级</a>  ';
			var down = '<a class="dodown" href="javascript:void(0)" title="下一级">下一级</a>  ';
			var updateFanDian = '<a class="updateFanDian" href="javascript:void(0)" title="修改返点">修改返点</a>   ';
			var chongqian = '<a class="chongqian" href="javascript:void(0)" title="加款">加款</a>';
			if (row.accountType == 4) {
				if (row.agentId == 0) {
					return btns.join('');
				}
				if (row.agentId && row.level > 2) {
					btns.push(up);
				}
				btns.push(down);
				if(row.agentName == $("#head_pwdat").val()){
 					btns.push(updateFanDian);
				}
			}
			if(false){
				if($('#agentId').val() == 0 || $('#agentId').val() == "1"){
					btns.push(chongqian);
				}
			}
			return btns.join('');
		}

		window.operateEvents = {
			'click .detail' : function(e, value, row, index) {

				$("#save_btn").addClass("hidden");
				if (row.accountType == 1) {
					$.ajax({
						url : "/index.php/team/getMemberInfo",
						data:{id:row.id},
						type:"POST",
						success : function(result) {
							setParam(row);
							$("#agent_opt").removeClass("hidden");
							$("#general_opt").removeClass("hidden");
							$("#member_opt").removeClass("hidden");
							$("#parentNames_tr").removeClass("hidden");
							if ("off" == result.multiAgent) {
								$(".multiData").addClass("hidden");
							} else if ("on" == result.multiAgent) {
								$("#rebateNum").val();
								$("#rebateNum").attr("disabled", "disabled");
								$("#rebateNum").val(row.gameShare);
								$(".multiData").removeClass("hidden");
								$(".rebateNum_tr").removeClass("hidden");
							}
							$('#rebate_desc').html("(可设置返点区间: "+result.rebateMinNum+" - " + result.rebateMaxNum +" )");
							agentMulti = result.multiAgent;
						}
					});
				} else {
					setParam(row);
					$(".rebateNum_tr").addClass("hidden");
				}

			},
			'click .doup' : function(e, value, row, index) {
				$("#saccount").val("");
				doDown(row.agentId, 0);
			},
			'click .dodown' : function(e, value, row, index) {
				$("#saccount").val("");
				doDown(row.id, 1);
			},
			'click .updateFanDian' : function(e, value, row, index) {
				fds(row);
			},
			'click .chongqian' : function(e, value, row, index) {
				var cur = $('#agentId').val();
				if(cur=="1"){
					//给会员或代理加款
					$("#editmodel2").modal('toggle');
					search1(row.account);
				}else{
					Msg.info("只能给下级会员或代理加款");
				}
				
			}
		};
		
		function fds(row){
			$.ajax({
				url : "/index.php/team/getMemberInfo",
				data:{id:row.id},
				success : function(result) {
					$("#editmodel3").modal('toggle');
					$('#fsAdd').val('');
					$('#fsAccount').html(row.account);
					$('#fsCur').html(row.gameShare);
					$('#fdsAcc').val(row.id);
					$("#parentNames2").val(row.parentNames);
					$('#curFands').val(result.rebateMaxNum);
					$('.cfands').html(result.rebateMaxNum);
					$('#fsCur2').html(result.rebateMinNum);
				}
			});
			
		}
		
		function fdsDate(){
			// $.ajax({
			// 	url : "/daili/dlaccount/multidata.do",
			// 	data:{limit:1},
			// 	success : function(result) {
			// 		$('#curFands').val(result.rebateMaxNum);
			// 		$('.cfands').html(result.rebateMaxNum);
			// 	}
			// });
		}

		function setParam(row) {
			$("#editmodel").modal('toggle');
			$("#account").attr("disabled", "disabled");
			$("#account").val(row.username);
			if(row.cardNo && row.cardNo.length>4){
				$("#cardNo").val('**'+row.cardNo.Right(4));
			}else{
				$("#cardNo").val('');
			}
			$("#accountId").val(row.id);
			$("#bankName").val(row.bankName);
			
			if(row.userName && row.userName.length>1){
				$("#userName").val('**'+row.userName.Right(1));
			}else{
				$("#userName").val('');
			}
			if(row.phone){
				$('.showTel').show();
			}else{
				$('.showTel').hide();
			}
			if(row.email){
				$('.showEmail').show();
			}else{
				$('.showEmail').hide();
			}
			if(row.bankAddress){
				$('.showBankAdd').show();
			}else{
				$('.showBankAdd').hide();
			}
			if(row.qq){
				$('.showQQ').show();
			}else{
				$('.showQQ').hide();
			}
			$("#phone").val(row.phone);
			$("#qq").val(row.qq);
			// $("#email").val(row.email);
			$("#bankName").val(row.bankName);
			// $("#bankAddress").val(row.bankAddress);
			// $("#accountStatus").val(row.accountStatus);
			$("#accountType").val(row.accountType);
			if(row.parentNames){
				$("#parentNames").val(row.parentNames+'>'+row.username);
			}
			
			$("#newpwd").val("");
			$("#newrpwd").val("");
			$(".newpwd_tr").addClass("hidden");
			$(".userinfo_tr").removeClass("hidden");

			$("#cardNo").attr("disabled", "disabled");
			$("#bankName").attr("disabled", "disabled");
			$("#userName").attr("disabled", "disabled");
			$("#phone").attr("disabled", "disabled");
			$("#qq").attr("disabled", "disabled");
			$("#email").attr("disabled", "disabled");
			$("#bankAddress").attr("disabled", "disabled");
			$("#accountStatus").attr("disabled", "disabled");
			$("#accountType").attr("disabled", "disabled");
			$("#rebateNum").attr("disabled", "disabled");
			$("#parentNames_tr").removeClass("hidden");
		}

		function doDown(id, flag) {
			if (ps && ps[ps.length - 1].id != id) {
				var data = {};
				data.id = id
				data.flag = flag;
				ps.push(data);
			}
			opFlag = flag;
			parentId = id;
			$("#searchType").val(2);
			$("#datagrid_tb").bootstrapTable('refreshOptions', {
				pageNumber : 1
			});
		}
		//设置传入参数
		function queryParams(params) {



			params["accountType"] = $("#stype").val();
			params["online"] = $("#onlineFlag").val();
			params["account"] = $("#saccount").val();
			var curId = "61661";
			if(parentId==0 || parentId==curId){
				$('#agentId').val('1');
			}else{
				$('#agentId').val('-1');
			}
			if(!params["account"]){
				params[ops[opFlag]] = parentId;
			}else{
				ps = [ {
					"id" : 0,
					"flag" : 0
				} ]; //轨迹
				parentId = 0; //当前父节点ID
				opFlag = 0;
			}
			params["searchType"] = $("#searchType").val();
			return params
		}
		
		function checkMutli() {
			$.ajax({
				url : "/index.php/team/getMemberInfo",
				data:{limit:1},
				success : function(result) {
					if ("off" == result.multiAgent) {
						$("#datagrid_tb").bootstrapTable("hideColumn",
								"gameShare");
					} else if ("on" == result.multiAgent) {
						$("#datagrid_tb").bootstrapTable("showColumn",
								"gameShare");
					}
				}
			});
		}

		function bindType() {
			$("#accountType").change(function() {
				var selval = $(this).children('option:selected').val();
				if (selval == 1) {
					$(".multiData").removeClass("hidden");
				} else {
					$(".multiData").addClass("hidden");
				}
			});
		}
		function back() {
			var index = ps.length - 2;

			if (parentId == 0 || index < 0) {
				Msg.info("当前已经是最顶级了");
				return;
			}
			data = ps[index];
			parentId = data.id;
			opFlag = data.flag;
			var nps = [];
			for (var i = 0; i < ps.length; i++) {
				if (i == ps.length - 1) {
					break;
				}
				nps.push(ps[i]);
			}
			ps = nps;
			search();
		}
		function search() {
			$("#datagrid_tb").bootstrapTable('refresh');
		}
		
		function add() {
			$("#editmodel").modal('toggle');
			$("#account").val("");
			$("#account").removeAttr("disabled");
			$("#accountId").val("");
			$("#accountStatus").val(2);
			$("#accountStatus").attr("disabled", "disabled");
			// $("#accountType").val("");
			$("#newpwd").val("");
			$("#newrpwd").val("");
			$("#rebateNum").val("");
			$(".newpwd_tr").removeClass("hidden");
			$(".userinfo_tr").addClass("hidden");
			$("#save_btn").removeClass("hidden");
			$("#rebateNum").removeAttr("disabled");
			$("#accountType").removeAttr("disabled");
			$("#parentNames").val("");
			$(".parentNames_tr").addClass("hidden");
			$("#general_opt").addClass("hidden");
			$(".multiData").addClass("hidden");
			
			$("#rebateNum").val("");
			$(".rebateNum_tr").removeClass("hidden");
			$("#agent_opt").removeClass("hidden");
			$.ajax({
				url : "/index.php/team/getMemberInfo",
				data : {
					round:Math.random()
				},
				success : function(result) {
					$("#rebate_desc").html("(可设置返点区间: "+result.rebateMinNum+" - " + result.rebateMaxNum +" )");
				}
			});

		}

		function save() {
			var password = $("#newpwd").val();
			var rpassword = $("#newrpwd").val();
			var accountId = $("#accountId").val();
			if (!accountId) {
				if (!password) {
					Msg.info("新密码不能为空！");
					return;
				}
				if (!rpassword) {
					Msg.info("确认密码不能为空！");
					return;
				}
			}

			if (password !== rpassword) {
				Msg.info("两次密码不一致！");
				return;
			}
			$.ajax({
				url : "/index.php/team/insertMember",
				data : {
					id : accountId,
					account : $("#account").val(),
					accountStatus : $("#accountStatus").val(),
					pwd : password,
					rpwd : rpassword,
					type : $("#accountType").val(),
					rebateNum : $("#rebateNum").val()
				},
				success : function(result) {
					Msg.info(result.msg);
					$("#datagrid_tb").bootstrapTable('refresh');
				}
			});
		}
	</script>

</body></html>