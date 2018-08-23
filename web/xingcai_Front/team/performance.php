<?php $this->display('inc_header.php'); ?>

  <div class="container" style="margin-top: 20px;"> 
   <ol class="breadcrumb"> 
    <li><a href="/">首页</a></li> 
    <li class="active">业绩提成</li> 
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
          <input type="text" class="form-control" id="begin" value=" 00:00:00" placeholder="开始日期" /> 
          <span class="glyphicon glyphicon-th form-control-feedback" aria-hidden="true"></span> 
         </div> 
         <button class="btn btn-default">今日</button> 
         <button class="btn btn-default">昨日</button> 
         <button class="btn btn-default">本周</button> 
         <button class="btn btn-primary" onclick="search();">查询</button> 
        </div> 
        <div class="form-inline" style="margin-top: 5px;"> 
         <div class="input-group"> 
          <input type="text" id="end" class="form-control" value=" 23:59:59" placeholder="线束日期" /> 
          <span class="glyphicon glyphicon-th form-control-feedback" aria-hidden="true"></span> 
         </div> 
         <button class="btn btn-default">上周</button> 
         <button class="btn btn-default">本月</button> 
         <button class="btn btn-default">上月</button> 
        </div> 
       </div> 
      </div>
     </div>
     <div class="columns columns-right btn-group pull-right">
      
       <ul class="dropdown-menu" role="menu">
        <li><label><input type="checkbox" data-field="account" value="0" checked="checked" /> 会员账号</label></li>
        <li><label><input type="checkbox" data-field="type" value="1" checked="checked" /> 变动类型</label></li>
        <li><label><input type="checkbox" data-field="beforeMoney" value="2" checked="checked" /> 变动前金额</label></li>
        <li><label><input type="checkbox" data-field="money" value="3" checked="checked" /> 变动金额</label></li>
        <li><label><input type="checkbox" data-field="afterMoney" value="4" checked="checked" /> 变动后余额</label></li>
        <li><label><input type="checkbox" data-field="createDatetime" value="5" checked="checked" /> 变动时间(系统)</label></li>
        <li><label><input type="checkbox" data-field="remark" value="6" checked="checked" /> 备注</label></li>
       </ul>
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
         <th style="text-align: center; vertical-align: middle; " data-field="account" tabindex="0">
          <div class="th-inner ">
           会员账号
          </div>
          <div class="fht-cell"></div></th>
         <th style="text-align: center; vertical-align: middle; " data-field="type" tabindex="0">
          <div class="th-inner ">
           变动类型
          </div>
          <div class="fht-cell"></div></th>
         <th style="text-align: center; vertical-align: middle; " data-field="beforeMoney" tabindex="0">
          <div class="th-inner ">
           变动前金额
          </div>
          <div class="fht-cell"></div></th>
         <th style="text-align: center; vertical-align: middle; " data-field="money" tabindex="0">
          <div class="th-inner ">
           变动金额
          </div>
          <div class="fht-cell"></div></th>
         <th style="text-align: center; vertical-align: middle; " data-field="afterMoney" tabindex="0">
          <div class="th-inner ">
           变动后余额
          </div>
          <div class="fht-cell"></div></th>
         <th style="text-align: center; vertical-align: middle; " data-field="createDatetime" tabindex="0">
          <div class="th-inner ">
           变动时间(系统)
          </div>
          <div class="fht-cell"></div></th>
         <th style="text-align: center; vertical-align: middle; " data-field="remark" tabindex="0">
          <div class="th-inner ">
           备注
          </div>
          <div class="fht-cell"></div></th>
        </tr>
       </thead>
       <tbody>
       
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
     
    </div>
   </div>
   <div class="clearfix"></div> 
  </div> 
  <script type="text/javascript">
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
				url : '/index.php/team/getPerformanceList',
				queryParams : queryParams,//参数
				toolbar : $('#toolbar'),
				columns : [ {
					field : 'account',
					title : '会员账号',
					align : 'center',
					valign : 'middle',
				}, {
					field : 'type',
					title : '变动类型',
					align : 'center',
					valign : 'middle',
					formatter : typeFormatter
				}, {
					field : 'beforeMoney',
					title : '变动前金额',
					align : 'center',
					valign : 'middle',
					formatter : moneyFormatter
				}, {
					field : 'money',
					title : '变动金额',
					align : 'center',
					valign : 'middle',
					formatter : moneyFormatter
				}, {
					field : 'afterMoney',
					title : '变动后余额',
					align : 'center',
					valign : 'middle',
					formatter : moneyFormatter
				}, {
					field : 'createDatetime',
					title : '变动时间(系统)',
					align : 'center',
					valign : 'middle',
					formatter : dateFormatter
				}, {
					field : 'remark',
					title : '备注',
					align : 'center',
					valign : 'middle'
				} ]
			});
		}

		function typeFormatter(value, row, index) {
      return "多级代理反点加钱";
			// return GlobalTypeUtil.getTypeName(1, 1, value);
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

		//设置传入参数
		function queryParams(params) {
			params['begin'] = $("#begin").val();
			params['end'] = $("#end").val();
			return params
		}
		$(function() {
// 			initCombo();
			bindbtn();
			today();
			getTab();
		})

		function search() {
			$("#datagrid_tb").bootstrapTable('refresh');
		}

		function initCombo() {
			$.ajax({
				url : "/daili/dlmnyrd/money/record/type.do",
				success : function(data) {
					var html = template('recordtype_tpl', eachdata);
					$("#type").append(html);
				}
			});
		}
		
		function today(){
			var cur = DateUtil.getCurrentDate();
			setDate(cur+" 00:00:00", cur+" 23:59:59");
		}

		function setDate(begin, end) {
			$('#begin').val(begin);
			$('#end').val(end);
		}

		function bindbtn() {
			$(".form-inline .btn-default").click(function() {
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
 </body>
</html>