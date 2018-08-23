<?php $this->display('inc_header.php'); ?>

	<div class="container" style="margin-top: 20px;">
		<ol class="breadcrumb">
			<li><a href="/">首页</a></li>
			<li class="active">游戏记录</li>
			<li class="active">彩票投注记录</li>
		</ol>
	</div>

        <input type="hidden" id="lottype" value="-1">
        <div class="container">
            <div class="bootstrap-table">
                <div class="fixed-table-toolbar">
                    <div class="bars pull-left">
                        <div id="toolbar">
                            <div class="form-group">
                                <div class="form-inline">
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="2017-01-01 00:00:00" id="begin"
                                        placeholder="开始日期">
                                        <span class="glyphicon glyphicon-th form-control-feedback" aria-hidden="true">
                                        </span>
                                    </div>
                                    <button class="btn btn-default">今日</button>
                                    <button class="btn btn-default">昨日</button>
                                    <button class="btn btn-default">本周</button>
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="account" placeholder="会员账号">
                                        </div>
                                        <div class="input-group">
                                            <label class="sr-only" for="type">
                                                类型
                                            </label>

		                                    <select class="form-control" id="type">
									            <option value="0" selected="">所有状态</option>
									            <option value="1">已派奖</option>
									            <option value="2">未中奖</option>
									            <option value="3">未开奖</option>
									            <option value="4">追号</option>
									            <option value="5">撤单</option>
									        </select>
                                        </div>
                                        <div class="input-group">
                                            <label class="sr-only" for="czType">
                                                彩种类型
                                            </label>
                                            <select class="form-control" id="czType">
                                               
                                            </select>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary" onclick="search();">
                                        查询
                                    </button>
                                </div>
                                <div class="form-inline" style="margin-top: 5px;">
                                    <div class="input-group">
                                        <input type="text" id="end" value="2017-12-30 23:59:59" class="form-control"
                                        placeholder="线束日期">
                                        <span class="glyphicon glyphicon-th form-control-feedback" aria-hidden="true">
                                        </span>
                                    </div>
                                    <button class="btn btn-default">上周</button>
                                    <button class="btn btn-default">本月</button>
                                    <button class="btn btn-default">上月</button>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="yxQiHao" placeholder="投注期号">
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="yxOrder" placeholder="订单号">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns columns-right btn-group pull-right">
                       
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="orderId" value="0" checked="checked">
                                        订单号
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="account" value="1" checked="checked">
                                        投注账号
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="2" value="2" checked="checked">
                                        彩种名称
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="qiHao" value="3" checked="checked">
                                        期号
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="playName" value="4" checked="checked">
                                        玩法名称
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="haoMa" value="5" checked="checked">
                                        投注号码
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="createTime" value="6" checked="checked">
                                        投注时间
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="buyZhuShu" value="7" checked="checked">
                                        注数
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="multiple" value="8" checked="checked">
                                        倍数
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="model" value="9" checked="checked">
                                        模式
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="buyMoney" value="10" checked="checked">
                                        投注金额
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="winMoney" value="11" checked="checked">
                                        中奖金额
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="status" value="12" checked="checked">
                                        状态
                                    </label>
                                </li>
                            </ul>
                    </div>
                </div>
                <div class="fixed-table-container" style="padding-bottom: 0px;">
                    <div class="fixed-table-header" style="display: none;">
                        <table>
                        </table>
                    </div>
                    <div class="fixed-table-body">
                        <div class="fixed-table-loading" style="top: 41px; display: none;">
                            正在努力地加载数据中，请稍候……
                        </div>
                        <table id="datagrid_tb" data-show-footer="true" class="table table-hover table-striped"
                        style="margin-top: 0px;">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: bottom; " data-field="orderId"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            订单号
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="account"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            投注账号
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="2"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            彩种名称
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="qiHao"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            期号
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; width: 100px; "
                                    data-field="playName" tabindex="0">
                                        <div class="th-inner ">
                                            玩法名称
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; width: 140px; " data-field="haoMa" tabindex="0">
                                        <div class="th-inner ">
                                            投注号码
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; width: 150px; " data-field="createTime"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            投注时间
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; " data-field="buyZhuShu" tabindex="0">
                                        <div class="th-inner ">
                                            注数
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; " data-field="multiple" tabindex="0">
                                        <div class="th-inner ">
                                            倍数
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; width: 50px; " data-field="model" tabindex="0">
                                        <div class="th-inner ">
                                            模式
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; width: 50px; " data-field="buyMoney" tabindex="0">
                                        <div class="th-inner ">
                                            投注金额
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; width: 50px; " data-field="winMoney" tabindex="0">
                                        <div class="th-inner ">
                                            中奖金额
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; width: 80px; " data-field="status" tabindex="0">
                                        <div class="th-inner ">
                                            状态
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                </tr>
                            </thead>
							<tbody>

							</tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editLabel"
        aria-hidden="true" style="display: none;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title" id="editLabel">
                            订单详情
                        </h4>
                    </div>
                    <div class="modal-body">
                        <table class="table table-bordered table-striped" style="clear: both">
                            <tbody>
                                <tr>
                                    <td width="20%" class="text-center" colspan="4">
                                        订单号:
                                        <span id="dingdh">
                                            L17060209783
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right">
                                        账号:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="zhangh">
                                            xxoo98
                                        </span>
                                    </td>
                                    <td width="20%" class="text-right">
                                        单注金额:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="danzje">
                                            2.00
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right">
                                        下注时间:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="xiazsj">
                                            2017-06-02 18:43:50
                                        </span>
                                    </td>
                                    <td width="20%" class="text-right">
                                        投注注数:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="touzzs">
                                            10
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right">
                                        彩种:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="caiz">
                                            重庆时时彩
                                        </span>
                                    </td>
                                    <td width="20%" class="text-right">
                                        倍数:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="beis">
                                            70
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right">
                                        期号:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="qih">
                                            20170602077
                                        </span>
                                    </td>
                                    <td width="20%" class="text-right">
                                        投注总额:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="touzze">
                                            1400.00
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right">
                                        玩法:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="wanf">
                                            定位胆--定位胆
                                        </span>
                                    </td>
                                    <!-- 如果是第二版则显示赔率 -->
                                    <td width="20%" class="text-right version1">
                                        单注奖金:
                                    </td>
                                    <td width="35%" class="text-left version1">
                                        <span id="danzjj">
                                            19.80
                                        </span>
                                    </td>
                                    <td width="20%" class="text-right version2 hide">
                                        赔率:
                                    </td>
                                    <td width="35%" class="text-left version2 hide">
                                        <span id="peilv">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right">
                                        开奖号码:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="kaijhm">
                                            5,3,0,7,8
                                        </span>
                                    </td>
                                    <td width="20%" class="text-right">
                                        中奖注数:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="zhongjzs">
                                            1
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right">
                                        状态:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="zhuangt">
                                            <span class="label label-success">
                                                已中奖
                                            </span>
                                        </span>
                                    </td>
                                    <td width="20%" class="text-right ">
                                        中奖金额:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="zhongjje">
                                            1386.00
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right">
                                        盈亏:
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="yingkui">
                                            -14.00
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="20%" class="text-right" colspan="4">
                                        <textarea class="form-control" rows="3" id="touzhm">
                                            -,-,13579,13579,-
                                        </textarea>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">
                            关闭
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">

var lotterinfo = [{"code":1,"name":"重庆时时彩"},
{"code":3,"name":"江西时时彩"},
{"code":6,"name":"广东11选5"},
{"code":9,"name":"福彩3D"},
{"code":10,"name":"排列三"},
{"code":12,"name":"新疆时时彩"},
{"code":14,"name":"河内5分彩"},
{"code":26,"name":"河内2分彩"},
{"code":15,"name":"上海11选5"},
{"code":16,"name":"江西11选5"},
{"code":20,"name":"北京PK拾"},
{"code":7,"name":"山东11选5"},
{"code":5,"name":"河内1分彩"},
{"code":60,"name":"天津时时彩"},
{"code":61,"name":"澳门时时彩"},
{"code":62,"name":"台湾时时彩"},
{"code":63,"name":"澳门快3"},
{"code":64,"name":"台湾快3"},
{"code":65,"name":"澳门PK拾"},
{"code":66,"name":"台湾PK拾"},
{"code":67,"name":"澳门11选5"},
{"code":68,"name":"台湾11选5"},
{"code":69,"name":"澳门3D"},
{"code":70,"name":"台湾3D"},
{"code":71,"name":"澳门幸运农场"},
{"code":72,"name":"台湾幸运农场"},
{"code":73,"name":"澳门快乐8"},
{"code":74,"name":"韩国快乐8"},
{"code":75,"name":"巴西快乐彩"},
{"code":76,"name":"巴西1.5分彩"},
{"code":77,"name":"高速六合彩"},
{"code":78,"name":"北京快乐8"},
{"code":79,"name":"江苏快3"},
{"code":80,"name":"幸运28"},
{"code":81,"name":"安徽快3"},
{"code":82,"name":"广西快3"},
{"code":83,"name":"北京28"},
{"code":85,"name":"三分PK拾"},
{"code":86,"name":"三分时时彩"}];

            function getTab() {
                var options = {
                    language: 'zh-CN',
                    autoclose: 1,
                    weekStart: 1,
                    todayBtn: 1,
                    autoclose: 1,
                    todayHighlight: 1,
                    startView: 2,
                    forceParse: 0,
                    showSecond: 1,
                    minuteStep: 1,
                    format: 'yyyy-mm-dd hh:ii:00'
                };
                $('#begin').datetimepicker(options);
                options.format = "yyyy-mm-dd hh:ii:59";
                $('#end').datetimepicker(options);

                window.table = new Game.Table({
                    id: 'datagrid_tb',
                    url: '/index.php/record/getLotteryRecordList',
                    queryParams: queryParams,
                    //参数
                    toolbar: $('#toolbar'),
                    showPageSummary: true,
                    showAllSummary: true,
                    columns: [{
                        field: 'orderId',
                        title: '订单号',
                        align: 'center',
                        valign: 'bottom',
                        formatter: orderFormatter
                    },
                    {
                        field: 'account',
                        title: '投注账号',
                        align: 'center',
                        valign: 'middle',
                        // events: operateEvents,
                        // formatter: accountFormatter
                    },
                    {
                    	field: 'typename',
                        title: '彩种名称',
                        align: 'center',
                        valign: 'middle',
                        formatter: czFormatter
                    },
                    {
                        field: 'qiHao',
                        title: '期号',
                        align: 'center',
                        valign: 'middle'
                    },
                    {
                        field: 'playName',
                        title: '玩法名称',
                        align: 'center',
                        width: '100',
                        valign: 'middle'
                    },
                    {
                        field: 'haoMa',
                        title: '投注号码',
                        align: 'center',
                        width: '140',
                        formatter: wsFormatter
                    },
                    {
                        field: 'createTime',
                        title: '投注时间',
                        width: '150',
                        align: 'center',
                        formatter: dateFormatter
                    },
                    {
                        field: 'actionNum',
                        title: '注数',
                        align: 'center'
                    },
                    {
                        field: 'multiple',
                        title: '倍数',
                        align: 'center'
                    },
                    {
                        field: 'model',
                        //1元  10角 100分';
                        title: '模式',
                        width: '50',
                        align: 'center',
                        formatter: modeFormatter,
                        pageSummaryFormat: function(rows, aggsData) {
                            return "小计:";
                        },
                        allSummaryFormat: function(rows, aggsData) {
                            return "总计:";
                        }
                    },
                    {
                        field: 'buyMoney',
                        title: '投注金额',
                        width: '50',
                        align: 'center',
                        pageSummaryFormat: function(rows, aggsData) {
                            var r = 0,
                            row;
                            for (var i = rows.length - 1; i >= 0; i--) {
                                row = rows[i];
                                if (row.buyMoney != null && row.status != 5) {
                                    r = r + parseFloat(row.buyMoney);
                                }
                            }
                            return r.toFixed(2);
                        },
                        allSummaryFormat: function(rows, aggsData) {
                            if (!aggsData) {
                                return "0.00"
                            }
                            return aggsData.buySum ? aggsData.buySum : "0.00";
                        }
                    },
                    {
                        field: 'winMoney',
                        title: '中奖金额',
                        width: '50',
                        align: 'center',
                        pageSummaryFormat: function(rows, aggsData) {
                            var r = 0,
                            row;
                            for (var i = rows.length - 1; i >= 0; i--) {
                                row = rows[i];
                                if (row.winMoney != null) {
                                    r = r +  parseFloat(row.winMoney);
                                }
                            }
                            return r.toFixed(2);
                        },
                        allSummaryFormat: function(rows, aggsData) {
                            if (!aggsData) {
                                return "0.00"
                            }
                            return aggsData.winSum ? aggsData.winSum : "0.00";
                        }
                    },
                    {
                        field: 'status',
                        title: '状态',
                        width: '80',
                        align: 'center',
                        formatter: statusFormatter
                    }]
                });
            }
            function accountFormatter(value, row, index) {
            	return '<a class="detail" href="javascript:void(0)" title="用户详情"><span class="text-danger">' + value + '</span></a>';
                // return '<a class="detail" href="javascript:void(0)" title="用户详情"><span class="text-danger">' + value + '</span></a>';
            }

            window.operateEvents = {
                'click .detail': function(e, value, row, index) {
                    $.get("/daili/dlaccount/view.do?id=" + row.accountId,
                    function(html) {
                        Msg.info(html, "查看账户详细");
                    },
                    "html");
                }
            };
            //位数格式化
            function wsFormatter(value, row, index) {
                if (value != null && value.length > 10) {
                    return value.substring(0, 10) + "...";
                } else {
                    return value;
                }
            }

            function dateFormatter(value, row, index) {
				if(value == null){return '--';}
				return new Date(parseInt(value) * 1000).toLocaleString().replace(/:\d{1,2}$/,' '); 
				return DateUtil.formatDatetime(value);
            }

            //格式化订单详情		
            function orderFormatter(value, row, index) {
                return '<a href="#" onClick="orderDesc(\'' + row.orderId + '\',\'' + row.account + '\',\'' + row.lotCode + '\');">' + row.orderId + '</a>';
            }

            //查看化订单详情		
            function orderDesc(orderId, account, lotCode) {
                $.ajax({
                    url: "/index.php/record/getOrderDetailForList",
                    data: {
                        "orderId": orderId,
                        "account": account,
                        "lotCode": lotCode
                    },
                    success: function(j) {
                        $("#editmodel").modal('toggle');
                        $('#dingdh').html(j.orderId);
                        $('#zhangh').html(j.account);
                        // $('#sellingTime').html( new Date(parseInt(j.sellingTime) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ') );
                        // $('#sealTime').html( new Date(parseInt(j.sealTime) * 1000).toLocaleString().replace(/:\d{1,2}$/,' '));
                        $('#xiazsj').html( new Date(parseInt(j.createTime) * 1000).toLocaleString().replace(/:\d{1,2}$/,' ') );
                        $('#touzzs').html(j.buyZhuShu);
                        $('#caiz').html(j.lotName);
                        $('#beis').html(j.multiple);
                        $('#qih').html(j.qiHao);
                        if (j.buyMoney != null) {
                            $('#touzze').html(fmoney(j.buyMoney, 2));
                        }
                        
                        if (j.groupName) {
                            $('#wanf').html(j.groupName + '--' + j.playName);
                        } else {
                            $('#wanf').html(j.playName);
                        }
                        if (j.minBonusOdds != null) {
                            $('#danzjj').html(fmoney(j.minBonusOdds, 2));
                        }

                        if (j.winZhuShu) {
                            $('#zhongjzs').html(j.winZhuShu);
                        } else {
                            $('#zhongjzs').html("0");
                        }

                        $('#kaijhm').html(j.lotteryHaoMa || "");
                        if (j.rollBackMoney != null) {
                            $('#jine').html(fmoney(j.rollBackMoney, 2));
                        }

                        ;
                        $('#zhuangt').html(statusFormatter(null,j,null));

                        $('#touzhm').html(j.haoMa);

                        var yk = '0.00';
                        var wm = j.winMoney;
                        var rb = j.rollBackMoney;
                        var bm = j.buyMoney;
                        if (wm && wm * 1 >= 0) {
                            yk = yk * 1 + wm * 1;
                        }
                        if (rb && rb * 1 >= 0) {
                            yk = yk * 1 + rb * 1;
                        }
                        if (bm && bm * 1 >= 0) {
                            yk = yk * 1 - bm * 1;
                        }
                        if (j.status == 8) {
                            $('#yingkui').html('0.00');
                            $('#zhongjje').html(fmoney(j.buyMoney * 1, 2));
                        } else {
                            $('#yingkui').html(fmoney(yk * 1, 2));
                            if (j.winMoney) {
                                $('#zhongjje').html(fmoney(j.winMoney, 2));
                            } else {
                                $('#zhongjje').html('0.00');
                            }
                        }

                        if ("") {
                            $('#mutil').html("返点状态:");
                            $('#fanszt').html(mutilFormatter(j.rollBackStatus, 1));
                        } else {
                            $('#mutil').html("返水状态:");
                            $('#fanszt').html(mutilFormatter(j.rollBackStatus, 2));
                        }

                    }
                });
            }

            function mutilFormatter(value, type) {
                var col = '';
                if (type == 1) {
                    col = "返点";
                } else {
                    col = "返水";
                }
                switch (value) {
                case 1:
                case 2:
                    col = "还未" + col;
                    break;
                case 3:
                    col = col + "已经回滚"
                    break;
                case 4:
                    col = "已经" + col;
                    break;
                }
                return col;
            }

            //格式化彩种
            function czFormatter(value, row, index) {
                return value;
                // return lotteryinfo(value);
            }

            function lotteryinfo(id){
            	var name = '';
            	for (var i in lotterinfo) {
	                if (lotterinfo[i].code == id) {
	                	name = lotterinfo[i].name;
	                	break;
	                }
	            }
	            return name;
            }

            function cz(obj) {
                var lotName = '';
                switch (obj) {
                case 'CQSSC':
                    lotName = "重庆时时彩";
                    break;
                case 'PL3':
                    lotName = "排列三";
                    break;
                case 'SH11X5':
                    lotName = "上海11选5";
                    break;
                case 'FC3D':
                    lotName = "福彩3D";
                    break;
                case 'BJSC':
                    lotName = "北京赛车";
                    break;
                case 'EFC':
                    lotName = "二分彩";
                    break;
                case 'WFC':
                    lotName = "五分彩";
                    break;
                case 'XJSSC':
                    lotName = "新疆时时彩";
                    break;
                case 'PCEGG':
                    lotName = "PC蛋蛋";
                    break;
                case 'JX11X5':
                    lotName = "江西11选5";
                    break;
                case 'GD11X5':
                    lotName = "广东11选5";
                    break;
                case 'SD11X5':
                    lotName = "山东11选5";
                    break;
                case 'TJSSC':
                    lotName = "天津时时彩";
                    break;
                case 'FFC':
                    lotName = "分分彩";
                    break;
                case 'HNKLSF':
                    lotName = "湖南快乐十分";
                    break;
                case 'GDKLSF':
                    lotName = "广东快乐十分";
                    break;
                case 'JSSB3':
                    lotName = "江苏骰宝(快3)";
                    break;
                case 'XYFT':
                    lotName = "幸运飞艇";
                    break;
                case 'CQXYNC':
                    lotName = "重庆幸运农场";
                    break;
                case 'AHK3':
                    lotName = "安徽快三";
                    break;
                case 'HBK3':
                    lotName = "湖北快三";
                    break;
                case 'SHHK3':
                    lotName = "上海快三";
                    break;
                case 'HEBK3':
                    lotName = "河北快三";
                    break;
                case 'GXK3':
                    lotName = "广西快三";
                    break;
                }
                return lotName;
            }

            //格式化成两位小数
            function fmoney(s, n) {
                n = n > 0 && n <= 20 ? n: 2;
                s = parseFloat((s + "").replace(/[^\d\.-]/g, "")).toFixed(n) + "";
                var l = s.split(".")[0].split("").reverse(),
                r = s.split(".")[1];
                t = "";
                for (i = 0; i < l.length; i++) {
                    t += l[i] + ((i + 1) % 3 == 0 && (i + 1) != l.length ? "": "");
                }
                return t.split("").reverse().join("") + "." + r;
            }

            //0.002 0.2 1 2

            function modeFormatter(value, row, index) {
                var col = '';
                switch (value) {
                case '2.000':
                    col = '元';
                    break;
                case '0.200':
                    col = '角';
                    break;
                case '0.002':
                    col = '厘';
                    break;
                }
                return col;
            }

            function statusFormatter(value, row, index) {
            	if (row.zjCount>0) {
            		return '<span class="label label-success" >已派奖</span>';
            	}
            	if (row.zjCount==0 && row.lotteryNo!=''&&row.isDelete==0) {
            		return '<span class="label label-danger" >未中奖</span>';
            	}
            	if (row.lotteryNo=='') {
            		return '<span class="label label-primary" >未开奖</span>';
            	}
            	if (row.zhuiHao==1) {
            		return '<span class="label label-primary" >追号</span>';
            	}
            	if (row.isDelete==1) {
            		return '<span class="label label-primary" >撤单</span>';
            	}
                // return kjzt2(value);
            }


			function kjzt2(obj) {
                var col = '';
                switch (obj) {
                case 1:
                    col = '<span class="label label-primary" >已派奖</span>';
                    break;
                case 2:
                    col = '<span class="label label-success" >未中奖</span>';
                    break;
                case 3:
                    col = '<span class="label label-danger" >未开奖</span>';
                    break;
                case 4:
                    col = '<span class="label label-info" >追号</span>';
                    break;
                case 5:
                    col = '<span class="label label-warning">撤单</span>';
                    break;
                }
                return col;
            }


            function kjzt(obj) {
                var col = '';
                switch (obj) {
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
                case 8:
                    col = '<span class="label label-success">和局</span>';
                    break;
                }
                return col;
            }

            //设置传入参数
            function queryParams(params) {
                params['account'] = $("#account").val();
                params['startTime'] = $("#begin").val();
                params['endTime'] = $("#end").val();
                params['status'] = $("#type").val();
                params['qihao'] = $("#yxQiHao").val();
                params['orderCode'] = $("#yxOrder").val();
                params['account'] = $("#account").val();
                var code = $("#czType").val();
                if (code.indexOf('-1') == -1) {
                    params['code'] = code;
                }
                return params
            }
            $(function() {
                czGroup();
                bindbtn();
                getTab();
            })

            function czGroup() {

	            var col = '<option value="-1" selected="selected">全部彩种</option>';
	            for (var i in lotterinfo) {
	                if (lotterinfo[i].code != 'LHC') {
	                    col += '<option value="' + lotterinfo[i].code + '" id="' + lotterinfo[i].code + '">' + lotterinfo[i].name + '</option>';
	                }
	            }
	            $('#czType').html(col);
            }

            function search() {
                $('.zhtj').val('0');
                $("#datagrid_tb").bootstrapTable('refreshOptions', {
                    pageNumber: 1
                });
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
                        begin = DateUtil.getCurrentDate();;
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
                    $('.zhtj').val('0');
                    setDate(begin + " 00:00:00", end + " 23:59:59");
                    search();
                });
            }
        </script>
        <style>
            .table>tbody>tr>td, .table>tbody>tr>th, .table>tfoot>tr>td, .table>tfoot>tr>th,
            .table>thead>tr>td, .table>thead>tr>th{ vertical-align : middle; }
        </style>
        
    </body>

</html>