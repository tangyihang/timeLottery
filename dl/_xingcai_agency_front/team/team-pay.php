<?php $this->display('inc_header.php'); ?>
        <div class="container" style="margin-top: 20px;">
            <ol class="breadcrumb">
                <li>
                    <a href="/">
                        首页
                    </a>
                </li>
                <li class="active">
                    存款日志
                </li>
            </ol>
        </div>
        <div class="container">
            <div class="bootstrap-table">
                <div class="fixed-table-toolbar">
                    <div class="bars pull-left">
                        <div id="toolbar">
                            <div class="form-group">
                                <div class="form-inline">
                                    <div class="form-group">
                                        <!-- <div class="input-group">
                                            <label class="sr-only" for="account">
                                                类型
                                            </label>
                                            <select class="form-control" id="stype">
                                                <option value="0">
                                                    全部类型
                                                </option>
                                                <option value="5">
                                                    在线支付
                                                </option>
                                                <option value="6">
                                                    快速入款
                                                </option>
                                                <option value="7">
                                                    一般入款
                                                </option>
                                            </select>
                                        </div> -->
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="saccount" value="" placeholder="会员名称">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" id="begin" value="2017-01-01 00:00:00"
                                        placeholder="开始日期">
                                        <span class="glyphicon glyphicon-th form-control-feedback" aria-hidden="true">
                                        </span>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" id="end" class="form-control" value="2017-12-30 23:59:59"
                                        placeholder="线束日期">
                                        <span class="glyphicon glyphicon-th form-control-feedback" aria-hidden="true">
                                        </span>
                                    </div>
                                    <button class="btn btn-success" onclick="search();">
                                        查找
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="columns columns-right btn-group pull-right">
                       
                        <div class="keep-open btn-group" title="列">
                            
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="account" value="0" checked="checked">
                                        会员账号
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="orderNo" value="1" checked="checked">
                                        订单号
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="payName" value="2" checked="checked">
                                        支付平台
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="money" value="3" checked="checked">
                                        付款金额(/元)
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="createDatetime" value="4" checked="checked">
                                        申请时间
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="type" value="5" checked="checked">
                                        类型
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="status" value="6" checked="checked">
                                        状态
                                    </label>
                                </li>
                            </ul>
                        </div>
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
                        <table id="datagrid_tb" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle; " data-field="account"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            会员账号
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="orderNo"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            订单号
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                   <!--  <th style="text-align: center; vertical-align: middle; " data-field="payName"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            支付平台
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th> -->
                                    <th style="text-align: center; vertical-align: middle; " data-field="money"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            付款金额(/元)
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="createDatetime"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            申请时间
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <!-- <th style="text-align: center; vertical-align: middle; " data-field="type"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            类型
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th> -->
                                    <th style="text-align: center; vertical-align: middle; " data-field="status"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            状态
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="no-records-found">
                                    <td colspan="7">
                                        没有找到匹配的记录
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="fixed-table-footer" style="display: none;">
                        <table>
                            <tbody>
                                <tr>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    
                </div>
            </div>
            <div class="clearfix">
            </div>
        </div>
        <div class="modal fade" id="confirmModel" tabindex="-1" role="dialog"
        aria-labelledby="confirmLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                            ×
                        </button>
                        <h4 class="modal-title" id="confirmLabel">
                            处理申请
                        </h4>
                    </div>
                    <div class="modal-body">
                        <input type="hidden" id="comId">
                        <table class="table table-bordered table-striped" style="clear: both">
                            <tbody>
                                <tr>
                                    <td width="15%" class="text-right">
                                        会员账号：
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="account_span">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="15%" class="text-right">
                                        充值人：
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="depositor_span">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="15%" class="text-right">
                                        转账类型：
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="payName_span">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="15%" class="text-right">
                                        转账金额：
                                    </td>
                                    <td width="35%" class="text-left">
                                        <span id="money_span">
                                        </span>
                                    </td>
                                </tr>
                                <tr>
                                    <td width="15%" class="text-right">
                                        手续费：
                                    </td>
                                    <td width="35%" class="text-left">
                                        <input id="fee" class="form-control" value="0">
                                    </td>
                                </tr>
                                <tr>
                                    <td width="15%" class="text-right">
                                        处理结果：
                                    </td>
                                    <td width="35%" class="text-left">
                                        <select id="status" class="form-control">
                                            <option value="1">
                                                批准
                                            </option>
                                            <option value="2">
                                                未通过
                                            </option>
                                        </select>
                                    </td>
                                </tr>
                                <tr class="opDesc_tr hidden">
                                    <td width="15%" class="text-right">
                                        处理说明：
                                    </td>
                                    <td width="35%" class="text-left">
                                        <textarea id="opDesc" class="form-control">
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
                        <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="handler();">
                            保存
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function getTab() {
                var curDate = new Date();
                var options = {
                    language: 'zh-CN',
                    autoclose: true,
                    weekStart: 1,
                    todayBtn: 1,
                    autoclose: 1,
                    todayHighlight: 1,
                    startView: 2,
                    forceParse: 0,
                    showSecond: 1,
                    minuteStep: 1,
                    endDate: curDate,
                    format: 'yyyy-mm-dd hh:ii:00'
                };
                $('#begin').datetimepicker(options);
                options.format = "yyyy-mm-dd 23:59:59";
                $('#end').datetimepicker(options);

                window.table = new Game.Table({
                    id: 'datagrid_tb',
                    url: "/index.php/team/getTeamPayList",
                    queryParams: queryParams,
                    //参数
                    toolbar: $('#toolbar'),
                    columns: [{
                        field: 'account',
                        title: '会员账号',
                        align: 'center',
                        valign: 'middle',
                    },
                    {
                        field: 'orderNo',
                        title: '订单号',
                        align: 'center',
                        valign: 'middle'
                    },
                    // {
                    //     field: 'payName',
                    //     title: '支付平台',
                    //     align: 'center',
                    //     valign: 'middle'
                    // },
                    {
                        field: 'money',
                        title: '付款金额(/元)',
                        align: 'center',
                        valign: 'middle',
                        formatter: moneyFormatter
                    }
                    // 				, {
                    // 					field : 'remark',
                    // 					title : '支付账号后十位',
                    // 					align : 'center',
                    // 					valign : 'middle'
                    // 				}
                    , {
                        field: 'createDatetime',
                        title: '申请时间',
                        align: 'center',
                        valign: 'middle',
                        formatter: dateFormatter
                    },
                    // {
                    //     field: 'type',
                    //     title: '类型',
                    //     align: 'center',
                    //     valign: 'middle',
                    //     formatter: typeFormatter
                    // },
                    {
                        field: 'status',
                        title: '状态',
                        align: 'center',
                        valign: 'middle',
                        formatter: statusFormatter
                    }]
                });
            }
            //operateFormatter  descFormatter

            function typeFormatter(value, row, index) {

                return GlobalTypeUtil.getTypeName(1, 1, value);
            }

            function statusFormatter(value, row, index) {

                // var sn = GlobalTypeUtil.getTypeName(1, 2, value);

                if (value == 0) {
                    return ['<span class="text-primary">', '</span>'].join('申请中');
                } else if (value == 1) {
                    return ['<span class="text-danger">', '</span>'].join('已到账');
                } else if (value === 4) {
                    // return ['<span class="text-default">', '</span>'].join(sn);
                }
                // return ['<span class="text-success">', '</span>'].join(sn);
            }

            function moneyFormatter(value, row, index) {

                if (value === undefined) {
                    return "0.00";
                }

                if (value > 0) {
                    return ['<span class="text-danger">', '</span>'].join(toDecimal2(value));
                }
                return ['<span class="text-primary">', '</span>'].join("0.00");

            }

            //制保留2位小数，如：2，会在2后面补上00.即2.00 
            function toDecimal2(x) {
                var f = parseFloat(x);
                if (isNaN(f)) {
                    return false;
                }
                var f = Math.round(x * 100) / 100;
                var s = f.toString();
                var rs = s.indexOf('.');
                if (rs < 0) {
                    rs = s.length;
                    s += '.';
                }
                while (s.length <= rs + 2) {
                    s += '0';
                }
                return s;
            }

            function dateFormatter(value, row, index) {
                if(value == null){return '--';}
                return new Date(parseInt(value) * 1000).toLocaleString().replace(/:\d{1,2}$/,' '); 
            }
            function remarkFormatter(value, row, index) {
                return ["<p class='text-danger'>", "</p>"].join(value);
            }

            //设置传入参数
            function queryParams(params) {
                params['account'] = $("#saccount").val();
                params['type'] = $("#stype").val();
                params['status'] = $("#sstatus").val();
                params['begin'] = $("#begin").val();
                params['end'] = $("#end").val();
                return params
            }
            $(function() {
                getTab();
                bindStatusChg();
            });

            function bindStatusChg() {
                $("#status").change(function() {
                    var selval = $(this).children('option:selected').val();
                    if (selval > 0) {
                        if (selval == 1) {
                            $(".opDesc_tr").addClass("hidden");
                        } else {
                            $(".opDesc_tr").removeClass("hidden");
                        }
                    }
                });
            }

            function search() {
                $("#datagrid_tb").bootstrapTable('refreshOptions', {
                    pageNumber: 1
                });
            }

            function setDate(begin, end) {
                $('#begin').val(begin);
                $('#end').val(end);
            }
        </script>
        <script id="recordtype_tpl" type="text/html">
            {
                {
                    each data as option
                }
            } < option value = "{{option.type}}" > {
                {
                    option.name
                }
            } < /option>
		{{/each
        }
    }
        </script>
        <div class="datetimepicker datetimepicker-dropdown-bottom-right dropdown-menu"
        style="left: 698px; z-index: 10009;">
            <div class="datetimepicker-minutes" style="display: none;">
                <table class=" table-condensed">
                    <thead>
                        <tr>
                            <th class="prev" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-left">
                                </span>
                            </th>
                            <th colspan="5" class="switch">
                                15 六月 2017
                            </th>
                            <th class="next" style="visibility: hidden;">
                                <span class="glyphicon glyphicon-arrow-right">
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7">
                                <span class="minute active">
                                    0:00
                                </span>
                                <span class="minute">
                                    0:01
                                </span>
                                <span class="minute">
                                    0:02
                                </span>
                                <span class="minute">
                                    0:03
                                </span>
                                <span class="minute">
                                    0:04
                                </span>
                                <span class="minute">
                                    0:05
                                </span>
                                <span class="minute">
                                    0:06
                                </span>
                                <span class="minute">
                                    0:07
                                </span>
                                <span class="minute">
                                    0:08
                                </span>
                                <span class="minute">
                                    0:09
                                </span>
                                <span class="minute">
                                    0:10
                                </span>
                                <span class="minute">
                                    0:11
                                </span>
                                <span class="minute">
                                    0:12
                                </span>
                                <span class="minute">
                                    0:13
                                </span>
                                <span class="minute">
                                    0:14
                                </span>
                                <span class="minute">
                                    0:15
                                </span>
                                <span class="minute">
                                    0:16
                                </span>
                                <span class="minute">
                                    0:17
                                </span>
                                <span class="minute">
                                    0:18
                                </span>
                                <span class="minute">
                                    0:19
                                </span>
                                <span class="minute">
                                    0:20
                                </span>
                                <span class="minute">
                                    0:21
                                </span>
                                <span class="minute">
                                    0:22
                                </span>
                                <span class="minute">
                                    0:23
                                </span>
                                <span class="minute">
                                    0:24
                                </span>
                                <span class="minute">
                                    0:25
                                </span>
                                <span class="minute">
                                    0:26
                                </span>
                                <span class="minute">
                                    0:27
                                </span>
                                <span class="minute">
                                    0:28
                                </span>
                                <span class="minute">
                                    0:29
                                </span>
                                <span class="minute">
                                    0:30
                                </span>
                                <span class="minute">
                                    0:31
                                </span>
                                <span class="minute">
                                    0:32
                                </span>
                                <span class="minute">
                                    0:33
                                </span>
                                <span class="minute">
                                    0:34
                                </span>
                                <span class="minute">
                                    0:35
                                </span>
                                <span class="minute">
                                    0:36
                                </span>
                                <span class="minute">
                                    0:37
                                </span>
                                <span class="minute">
                                    0:38
                                </span>
                                <span class="minute">
                                    0:39
                                </span>
                                <span class="minute">
                                    0:40
                                </span>
                                <span class="minute">
                                    0:41
                                </span>
                                <span class="minute">
                                    0:42
                                </span>
                                <span class="minute">
                                    0:43
                                </span>
                                <span class="minute">
                                    0:44
                                </span>
                                <span class="minute">
                                    0:45
                                </span>
                                <span class="minute">
                                    0:46
                                </span>
                                <span class="minute">
                                    0:47
                                </span>
                                <span class="minute">
                                    0:48
                                </span>
                                <span class="minute">
                                    0:49
                                </span>
                                <span class="minute">
                                    0:50
                                </span>
                                <span class="minute">
                                    0:51
                                </span>
                                <span class="minute">
                                    0:52
                                </span>
                                <span class="minute">
                                    0:53
                                </span>
                                <span class="minute">
                                    0:54
                                </span>
                                <span class="minute">
                                    0:55
                                </span>
                                <span class="minute">
                                    0:56
                                </span>
                                <span class="minute">
                                    0:57
                                </span>
                                <span class="minute">
                                    0:58
                                </span>
                                <span class="minute">
                                    0:59
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today">
                                今天
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7" class="clear" style="display: none;">
                                Clear
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="datetimepicker-hours" style="display: none;">
                <table class=" table-condensed">
                    <thead>
                        <tr>
                            <th class="prev" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-left">
                                </span>
                            </th>
                            <th colspan="5" class="switch">
                                15 六月 2017
                            </th>
                            <th class="next" style="visibility: hidden;">
                                <span class="glyphicon glyphicon-arrow-right">
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7">
                                <span class="hour active">
                                    0:00
                                </span>
                                <span class="hour">
                                    1:00
                                </span>
                                <span class="hour">
                                    2:00
                                </span>
                                <span class="hour">
                                    3:00
                                </span>
                                <span class="hour">
                                    4:00
                                </span>
                                <span class="hour">
                                    5:00
                                </span>
                                <span class="hour">
                                    6:00
                                </span>
                                <span class="hour">
                                    7:00
                                </span>
                                <span class="hour">
                                    8:00
                                </span>
                                <span class="hour">
                                    9:00
                                </span>
                                <span class="hour">
                                    10:00
                                </span>
                                <span class="hour">
                                    11:00
                                </span>
                                <span class="hour">
                                    12:00
                                </span>
                                <span class="hour">
                                    13:00
                                </span>
                                <span class="hour">
                                    14:00
                                </span>
                                <span class="hour">
                                    15:00
                                </span>
                                <span class="hour">
                                    16:00
                                </span>
                                <span class="hour disabled">
                                    17:00
                                </span>
                                <span class="hour disabled">
                                    18:00
                                </span>
                                <span class="hour disabled">
                                    19:00
                                </span>
                                <span class="hour disabled">
                                    20:00
                                </span>
                                <span class="hour disabled">
                                    21:00
                                </span>
                                <span class="hour disabled">
                                    22:00
                                </span>
                                <span class="hour disabled">
                                    23:00
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today">
                                今天
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7" class="clear" style="display: none;">
                                Clear
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="datetimepicker-days" style="display: block;">
                <table class=" table-condensed">
                    <thead>
                        <tr>
                            <th class="prev" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-left">
                                </span>
                            </th>
                            <th colspan="5" class="switch">
                                六月 2017
                            </th>
                            <th class="next" style="visibility: hidden;">
                                <span class="glyphicon glyphicon-arrow-right">
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="dow">
                                一
                            </th>
                            <th class="dow">
                                二
                            </th>
                            <th class="dow">
                                三
                            </th>
                            <th class="dow">
                                四
                            </th>
                            <th class="dow">
                                五
                            </th>
                            <th class="dow">
                                六
                            </th>
                            <th class="dow">
                                日
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="day old">
                                29
                            </td>
                            <td class="day old">
                                30
                            </td>
                            <td class="day old">
                                31
                            </td>
                            <td class="day">
                                1
                            </td>
                            <td class="day">
                                2
                            </td>
                            <td class="day">
                                3
                            </td>
                            <td class="day">
                                4
                            </td>
                        </tr>
                        <tr>
                            <td class="day">
                                5
                            </td>
                            <td class="day">
                                6
                            </td>
                            <td class="day">
                                7
                            </td>
                            <td class="day">
                                8
                            </td>
                            <td class="day">
                                9
                            </td>
                            <td class="day">
                                10
                            </td>
                            <td class="day">
                                11
                            </td>
                        </tr>
                        <tr>
                            <td class="day">
                                12
                            </td>
                            <td class="day">
                                13
                            </td>
                            <td class="day">
                                14
                            </td>
                            <td class="day today active">
                                15
                            </td>
                            <td class="day disabled">
                                16
                            </td>
                            <td class="day disabled">
                                17
                            </td>
                            <td class="day disabled">
                                18
                            </td>
                        </tr>
                        <tr>
                            <td class="day disabled">
                                19
                            </td>
                            <td class="day disabled">
                                20
                            </td>
                            <td class="day disabled">
                                21
                            </td>
                            <td class="day disabled">
                                22
                            </td>
                            <td class="day disabled">
                                23
                            </td>
                            <td class="day disabled">
                                24
                            </td>
                            <td class="day disabled">
                                25
                            </td>
                        </tr>
                        <tr>
                            <td class="day disabled">
                                26
                            </td>
                            <td class="day disabled">
                                27
                            </td>
                            <td class="day disabled">
                                28
                            </td>
                            <td class="day disabled">
                                29
                            </td>
                            <td class="day disabled">
                                30
                            </td>
                            <td class="day new disabled">
                                1
                            </td>
                            <td class="day new disabled">
                                2
                            </td>
                        </tr>
                        <tr>
                            <td class="day new disabled">
                                3
                            </td>
                            <td class="day new disabled">
                                4
                            </td>
                            <td class="day new disabled">
                                5
                            </td>
                            <td class="day new disabled">
                                6
                            </td>
                            <td class="day new disabled">
                                7
                            </td>
                            <td class="day new disabled">
                                8
                            </td>
                            <td class="day new disabled">
                                9
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today">
                                今天
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7" class="clear" style="display: none;">
                                Clear
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="datetimepicker-months" style="display: none;">
                <table class="table-condensed">
                    <thead>
                        <tr>
                            <th class="prev" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-left">
                                </span>
                            </th>
                            <th colspan="5" class="switch">
                                2017
                            </th>
                            <th class="next" style="visibility: hidden;">
                                <span class="glyphicon glyphicon-arrow-right">
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7">
                                <span class="month">
                                    一月
                                </span>
                                <span class="month">
                                    二月
                                </span>
                                <span class="month">
                                    三月
                                </span>
                                <span class="month">
                                    四月
                                </span>
                                <span class="month disabled">
                                    五月
                                </span>
                                <span class="month active disabled">
                                    六月
                                </span>
                                <span class="month disabled">
                                    七月
                                </span>
                                <span class="month disabled">
                                    八月
                                </span>
                                <span class="month disabled">
                                    九月
                                </span>
                                <span class="month disabled">
                                    十月
                                </span>
                                <span class="month disabled">
                                    十一月
                                </span>
                                <span class="month disabled">
                                    十二月
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today">
                                今天
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7" class="clear" style="display: none;">
                                Clear
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="datetimepicker-years" style="display: none;">
                <table class="table-condensed">
                    <thead>
                        <tr>
                            <th class="prev" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-left">
                                </span>
                            </th>
                            <th colspan="5" class="switch">
                                2010-2019
                            </th>
                            <th class="next" style="visibility: hidden;">
                                <span class="glyphicon glyphicon-arrow-right">
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7">
                                <span class="year old">
                                    2009
                                </span>
                                <span class="year">
                                    2010
                                </span>
                                <span class="year">
                                    2011
                                </span>
                                <span class="year">
                                    2012
                                </span>
                                <span class="year">
                                    2013
                                </span>
                                <span class="year">
                                    2014
                                </span>
                                <span class="year">
                                    2015
                                </span>
                                <span class="year">
                                    2016
                                </span>
                                <span class="year active">
                                    2017
                                </span>
                                <span class="year disabled">
                                    2018
                                </span>
                                <span class="year disabled">
                                    2019
                                </span>
                                <span class="year old disabled">
                                    2020
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today">
                                今天
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7" class="clear" style="display: none;">
                                Clear
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <div class="datetimepicker datetimepicker-dropdown-bottom-right dropdown-menu"
        style="left: 898px; z-index: 10019;">
            <div class="datetimepicker-minutes" style="display: none;">
                <table class=" table-condensed">
                    <thead>
                        <tr>
                            <th class="prev" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-left">
                                </span>
                            </th>
                            <th colspan="5" class="switch">
                                15 六月 2017
                            </th>
                            <th class="next" style="visibility: hidden;">
                                <span class="glyphicon glyphicon-arrow-right">
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7">
                                <span class="minute">
                                    16:00
                                </span>
                                <span class="minute">
                                    16:01
                                </span>
                                <span class="minute">
                                    16:02
                                </span>
                                <span class="minute">
                                    16:03
                                </span>
                                <span class="minute">
                                    16:04
                                </span>
                                <span class="minute">
                                    16:05
                                </span>
                                <span class="minute">
                                    16:06
                                </span>
                                <span class="minute">
                                    16:07
                                </span>
                                <span class="minute">
                                    16:08
                                </span>
                                <span class="minute">
                                    16:09
                                </span>
                                <span class="minute">
                                    16:10
                                </span>
                                <span class="minute">
                                    16:11
                                </span>
                                <span class="minute">
                                    16:12
                                </span>
                                <span class="minute">
                                    16:13
                                </span>
                                <span class="minute active">
                                    16:14
                                </span>
                                <span class="minute disabled">
                                    16:15
                                </span>
                                <span class="minute disabled">
                                    16:16
                                </span>
                                <span class="minute disabled">
                                    16:17
                                </span>
                                <span class="minute disabled">
                                    16:18
                                </span>
                                <span class="minute disabled">
                                    16:19
                                </span>
                                <span class="minute disabled">
                                    16:20
                                </span>
                                <span class="minute disabled">
                                    16:21
                                </span>
                                <span class="minute disabled">
                                    16:22
                                </span>
                                <span class="minute disabled">
                                    16:23
                                </span>
                                <span class="minute disabled">
                                    16:24
                                </span>
                                <span class="minute disabled">
                                    16:25
                                </span>
                                <span class="minute disabled">
                                    16:26
                                </span>
                                <span class="minute disabled">
                                    16:27
                                </span>
                                <span class="minute disabled">
                                    16:28
                                </span>
                                <span class="minute disabled">
                                    16:29
                                </span>
                                <span class="minute disabled">
                                    16:30
                                </span>
                                <span class="minute disabled">
                                    16:31
                                </span>
                                <span class="minute disabled">
                                    16:32
                                </span>
                                <span class="minute disabled">
                                    16:33
                                </span>
                                <span class="minute disabled">
                                    16:34
                                </span>
                                <span class="minute disabled">
                                    16:35
                                </span>
                                <span class="minute disabled">
                                    16:36
                                </span>
                                <span class="minute disabled">
                                    16:37
                                </span>
                                <span class="minute disabled">
                                    16:38
                                </span>
                                <span class="minute disabled">
                                    16:39
                                </span>
                                <span class="minute disabled">
                                    16:40
                                </span>
                                <span class="minute disabled">
                                    16:41
                                </span>
                                <span class="minute disabled">
                                    16:42
                                </span>
                                <span class="minute disabled">
                                    16:43
                                </span>
                                <span class="minute disabled">
                                    16:44
                                </span>
                                <span class="minute disabled">
                                    16:45
                                </span>
                                <span class="minute disabled">
                                    16:46
                                </span>
                                <span class="minute disabled">
                                    16:47
                                </span>
                                <span class="minute disabled">
                                    16:48
                                </span>
                                <span class="minute disabled">
                                    16:49
                                </span>
                                <span class="minute disabled">
                                    16:50
                                </span>
                                <span class="minute disabled">
                                    16:51
                                </span>
                                <span class="minute disabled">
                                    16:52
                                </span>
                                <span class="minute disabled">
                                    16:53
                                </span>
                                <span class="minute disabled">
                                    16:54
                                </span>
                                <span class="minute disabled">
                                    16:55
                                </span>
                                <span class="minute disabled">
                                    16:56
                                </span>
                                <span class="minute disabled">
                                    16:57
                                </span>
                                <span class="minute disabled">
                                    16:58
                                </span>
                                <span class="minute disabled">
                                    16:59
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today">
                                今天
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7" class="clear" style="display: none;">
                                Clear
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="datetimepicker-hours" style="display: none;">
                <table class=" table-condensed">
                    <thead>
                        <tr>
                            <th class="prev" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-left">
                                </span>
                            </th>
                            <th colspan="5" class="switch">
                                15 六月 2017
                            </th>
                            <th class="next" style="visibility: hidden;">
                                <span class="glyphicon glyphicon-arrow-right">
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7">
                                <span class="hour">
                                    0:00
                                </span>
                                <span class="hour">
                                    1:00
                                </span>
                                <span class="hour">
                                    2:00
                                </span>
                                <span class="hour">
                                    3:00
                                </span>
                                <span class="hour">
                                    4:00
                                </span>
                                <span class="hour">
                                    5:00
                                </span>
                                <span class="hour">
                                    6:00
                                </span>
                                <span class="hour">
                                    7:00
                                </span>
                                <span class="hour">
                                    8:00
                                </span>
                                <span class="hour">
                                    9:00
                                </span>
                                <span class="hour">
                                    10:00
                                </span>
                                <span class="hour">
                                    11:00
                                </span>
                                <span class="hour">
                                    12:00
                                </span>
                                <span class="hour">
                                    13:00
                                </span>
                                <span class="hour">
                                    14:00
                                </span>
                                <span class="hour">
                                    15:00
                                </span>
                                <span class="hour active">
                                    16:00
                                </span>
                                <span class="hour disabled">
                                    17:00
                                </span>
                                <span class="hour disabled">
                                    18:00
                                </span>
                                <span class="hour disabled">
                                    19:00
                                </span>
                                <span class="hour disabled">
                                    20:00
                                </span>
                                <span class="hour disabled">
                                    21:00
                                </span>
                                <span class="hour disabled">
                                    22:00
                                </span>
                                <span class="hour disabled">
                                    23:00
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today">
                                今天
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7" class="clear" style="display: none;">
                                Clear
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="datetimepicker-days" style="display: block;">
                <table class=" table-condensed">
                    <thead>
                        <tr>
                            <th class="prev" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-left">
                                </span>
                            </th>
                            <th colspan="5" class="switch">
                                六月 2017
                            </th>
                            <th class="next" style="visibility: hidden;">
                                <span class="glyphicon glyphicon-arrow-right">
                                </span>
                            </th>
                        </tr>
                        <tr>
                            <th class="dow">
                                一
                            </th>
                            <th class="dow">
                                二
                            </th>
                            <th class="dow">
                                三
                            </th>
                            <th class="dow">
                                四
                            </th>
                            <th class="dow">
                                五
                            </th>
                            <th class="dow">
                                六
                            </th>
                            <th class="dow">
                                日
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="day old">
                                29
                            </td>
                            <td class="day old">
                                30
                            </td>
                            <td class="day old">
                                31
                            </td>
                            <td class="day">
                                1
                            </td>
                            <td class="day">
                                2
                            </td>
                            <td class="day">
                                3
                            </td>
                            <td class="day">
                                4
                            </td>
                        </tr>
                        <tr>
                            <td class="day">
                                5
                            </td>
                            <td class="day">
                                6
                            </td>
                            <td class="day">
                                7
                            </td>
                            <td class="day">
                                8
                            </td>
                            <td class="day">
                                9
                            </td>
                            <td class="day">
                                10
                            </td>
                            <td class="day">
                                11
                            </td>
                        </tr>
                        <tr>
                            <td class="day">
                                12
                            </td>
                            <td class="day">
                                13
                            </td>
                            <td class="day">
                                14
                            </td>
                            <td class="day today active">
                                15
                            </td>
                            <td class="day disabled">
                                16
                            </td>
                            <td class="day disabled">
                                17
                            </td>
                            <td class="day disabled">
                                18
                            </td>
                        </tr>
                        <tr>
                            <td class="day disabled">
                                19
                            </td>
                            <td class="day disabled">
                                20
                            </td>
                            <td class="day disabled">
                                21
                            </td>
                            <td class="day disabled">
                                22
                            </td>
                            <td class="day disabled">
                                23
                            </td>
                            <td class="day disabled">
                                24
                            </td>
                            <td class="day disabled">
                                25
                            </td>
                        </tr>
                        <tr>
                            <td class="day disabled">
                                26
                            </td>
                            <td class="day disabled">
                                27
                            </td>
                            <td class="day disabled">
                                28
                            </td>
                            <td class="day disabled">
                                29
                            </td>
                            <td class="day disabled">
                                30
                            </td>
                            <td class="day new disabled">
                                1
                            </td>
                            <td class="day new disabled">
                                2
                            </td>
                        </tr>
                        <tr>
                            <td class="day new disabled">
                                3
                            </td>
                            <td class="day new disabled">
                                4
                            </td>
                            <td class="day new disabled">
                                5
                            </td>
                            <td class="day new disabled">
                                6
                            </td>
                            <td class="day new disabled">
                                7
                            </td>
                            <td class="day new disabled">
                                8
                            </td>
                            <td class="day new disabled">
                                9
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today">
                                今天
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7" class="clear" style="display: none;">
                                Clear
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="datetimepicker-months" style="display: none;">
                <table class="table-condensed">
                    <thead>
                        <tr>
                            <th class="prev" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-left">
                                </span>
                            </th>
                            <th colspan="5" class="switch">
                                2017
                            </th>
                            <th class="next" style="visibility: hidden;">
                                <span class="glyphicon glyphicon-arrow-right">
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7">
                                <span class="month">
                                    一月
                                </span>
                                <span class="month">
                                    二月
                                </span>
                                <span class="month">
                                    三月
                                </span>
                                <span class="month">
                                    四月
                                </span>
                                <span class="month disabled">
                                    五月
                                </span>
                                <span class="month active disabled">
                                    六月
                                </span>
                                <span class="month disabled">
                                    七月
                                </span>
                                <span class="month disabled">
                                    八月
                                </span>
                                <span class="month disabled">
                                    九月
                                </span>
                                <span class="month disabled">
                                    十月
                                </span>
                                <span class="month disabled">
                                    十一月
                                </span>
                                <span class="month disabled">
                                    十二月
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today">
                                今天
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7" class="clear" style="display: none;">
                                Clear
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            <div class="datetimepicker-years" style="display: none;">
                <table class="table-condensed">
                    <thead>
                        <tr>
                            <th class="prev" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-left">
                                </span>
                            </th>
                            <th colspan="5" class="switch">
                                2010-2019
                            </th>
                            <th class="next" style="visibility: hidden;">
                                <span class="glyphicon glyphicon-arrow-right">
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7">
                                <span class="year old">
                                    2009
                                </span>
                                <span class="year">
                                    2010
                                </span>
                                <span class="year">
                                    2011
                                </span>
                                <span class="year">
                                    2012
                                </span>
                                <span class="year">
                                    2013
                                </span>
                                <span class="year">
                                    2014
                                </span>
                                <span class="year">
                                    2015
                                </span>
                                <span class="year">
                                    2016
                                </span>
                                <span class="year active">
                                    2017
                                </span>
                                <span class="year disabled">
                                    2018
                                </span>
                                <span class="year disabled">
                                    2019
                                </span>
                                <span class="year old disabled">
                                    2020
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today">
                                今天
                            </th>
                        </tr>
                        <tr>
                            <th colspan="7" class="clear" style="display: none;">
                                Clear
                            </th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </body>

</html>