<?php $this->display('inc_header.php'); ?>
        <div class="container" style="margin-top: 20px;">
            <ol class="breadcrumb">
                <li>
                    <a href="/">
                        首页
                    </a>
                </li>
                <li class="active">
                    取款日志
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
                                        <div class="input-group">
                                            <label class="sr-only" for="sstatus">
                                                状态
                                            </label>
                                            <select class="form-control" id="sstatus">
                                                <option value="" class="text-warning">
                                                    全部记录
                                                </option>
                                                <option value="1" class="text-warning">
                                                    处理中
                                                </option>
                                                <option value="2" class="text-success">
                                                    已取消
                                                </option>
                                                <option value="4" class="text-danger">
                                                    提现失败
                                                </option>
                                                <option value="0" class="text-danger">
                                                    确认到帐
                                                </option>
                                                <!-- //1用户申请，2已取消，3已支付，4提现失败，0确认到帐, 5后台删除 -->

                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <label class="sr-only" for="saccountType">
                                            </label>
                                            <select class="form-control" id="saccountType">
                                                <option value="" class="text-warning">
                                                    全部类型
                                                </option>
                                                <option value="0" class="text-warning">
                                                    会员
                                                </option>
                                                <option value="1" class="text-success">
                                                    代理
                                                </option>
                                            </select>
                                        </div>
                                        <div class="input-group">
                                            <input type="text" class="form-control" id="userAccount" placeholder="用户账号">
                                        </div>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" class="form-control" value="2017-06-15 00:00:00" id="begin"
                                        placeholder="开始日期">
                                        <span class="glyphicon glyphicon-th form-control-feedback" aria-hidden="true">
                                        </span>
                                    </div>
                                    <div class="input-group">
                                        <input type="text" id="end" value="2017-06-15 23:59:59" class="form-control"
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
                        
                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="account" value="0" checked="checked">
                                        提款会员
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
                                        <input type="checkbox" data-field="bankName" value="2" checked="checked">
                                        开户行
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="drawMoney" value="3" checked="checked">
                                        提款金额
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="createDatetime" value="4" checked="checked">
                                        交易时间
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="type" value="5" checked="checked">
                                        存取类型
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="status" value="6" checked="checked">
                                        状态
                                    </label>
                                </li>
                                <li>
                                    <label>
                                        <input type="checkbox" data-field="remark" value="7" checked="checked">
                                        备注
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
                        <table id="datagrid_tb" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle; " data-field="account"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            提款会员
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
                                    <th style="text-align: center; vertical-align: middle; " data-field="bankName"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            开户行
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="drawMoney"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            提款金额
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="createDatetime"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            交易时间
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="type"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            存取类型
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="status"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            状态
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="remark"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            备注
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="no-records-found">
                                    <td colspan="8">
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
                    format: 'yyyy-mm-dd hh:ii:00'
                };
                $('#begin').datetimepicker(options);
                options.format = "yyyy-mm-dd hh:ii:59";
                $('#end').datetimepicker(options);

                window.table = new Game.Table({
                    id: 'datagrid_tb',
                    url: '/index.php/team/getTeamWithDrawingList',
                    queryParams: queryParams,
                    //参数
                    toolbar: $('#toolbar'),
                    columns: [{
                        field: 'account',
                        title: '提款会员',
                        align: 'center',
                        valign: 'middle',
                    },
                    {
                        field: 'orderNo',
                        title: '订单号',
                        align: 'center',
                        valign: 'middle'
                    }
                    //              , {
                    //                  field : 'cardNo',
                    //                  title : '收款账号',
                    //                  align : 'center',
                    //                  valign : 'middle'
                    //              }
                    //              , {
                    //                  field : 'userName',
                    //                  title : '收款户名',
                    //                  align : 'center',
                    //                  valign : 'middle'
                    //              }
                    , {
                        field: 'bankName',
                        title: '开户行',
                        align: 'center',
                        valign: 'middle',
                        formatter: addressFormatter
                    },
                    {
                        field: 'drawMoney',
                        title: '提款金额',
                        align: 'center',
                        valign: 'middle',
                        formatter: moneyFormatter
                    },
                    {
                        field: 'createDatetime',
                        title: '交易时间',
                        align: 'center',
                        valign: 'middle',
                        formatter: dateFormatter
                    },
                    {
                        field: 'type',
                        title: '存取类型',
                        align: 'center',
                        valign: 'middle',
                        formatter: typeFormatter
                    },
                    {
                        field: 'status',
                        title: '状态',
                        align: 'center',
                        valign: 'middle',
                        formatter: statusFormatter
                    },
                    {
                        field: 'remark',
                        title: '备注',
                        align: 'center',
                        valign: 'middle'
                    }]
                });
            }

            function typeFormatter(value, row, index) {
                if (value==1) {
                    return "代理";
                }else{
                    return "会员";
                }
                return GlobalTypeUtil.getTypeName(1, 1, value);
            }

            function addressFormatter(value, row, index) {
                if (value) {
                    return value;
                }
            }

            var statusInfo = ['确认到帐','用户申请','已取消','已支付','提现失败'];
            //1用户申请，2已取消，3已支付，4提现失败，0确认到帐, 5后台删除

            function statusFormatter(value, row, index) {


                return  ['<span class="text-success">', '</span>'].join(statusInfo[value]);

                // var sn = GlobalTypeUtil.getTypeName(1, 3, value);

                if (value === 2) {
                    return ['<span class="text-success">', '</span>'].join(sn);
                } else if (value === 3) {
                    return ['<span class="text-danger">', '</span>'].join(sn);
                } else if (value === 4) {
                    return ['<span class="text-default">', '</span>'].join(sn);
                }
                return ['<span class="text-primary">', '</span>'].join(sn);
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
                params['account'] = $("#userAccount").val();
                params['status'] = $("#sstatus").val();
                params['begin'] = $("#begin").val();
                params['end'] = $("#end").val();
                params['accountType'] = $("#saccountType").val();
                return params
            }
            $(function() {
                //          var begin = DateUtil.formatDatetime(DateUtil.getCurrentDate());
                //          setDate(begin, begin);
                getTab();
            })

            function search() {
                $("#datagrid_tb").bootstrapTable('refresh');
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
        style="left: 806px; z-index: 10009;">
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
                            <th class="next" style="visibility: visible;">
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
                            <th class="next" style="visibility: visible;">
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
                                <span class="hour">
                                    17:00
                                </span>
                                <span class="hour">
                                    18:00
                                </span>
                                <span class="hour">
                                    19:00
                                </span>
                                <span class="hour">
                                    20:00
                                </span>
                                <span class="hour">
                                    21:00
                                </span>
                                <span class="hour">
                                    22:00
                                </span>
                                <span class="hour">
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
                            <th class="next" style="visibility: visible;">
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
                            <td class="day">
                                16
                            </td>
                            <td class="day">
                                17
                            </td>
                            <td class="day">
                                18
                            </td>
                        </tr>
                        <tr>
                            <td class="day">
                                19
                            </td>
                            <td class="day">
                                20
                            </td>
                            <td class="day">
                                21
                            </td>
                            <td class="day">
                                22
                            </td>
                            <td class="day">
                                23
                            </td>
                            <td class="day">
                                24
                            </td>
                            <td class="day">
                                25
                            </td>
                        </tr>
                        <tr>
                            <td class="day">
                                26
                            </td>
                            <td class="day">
                                27
                            </td>
                            <td class="day">
                                28
                            </td>
                            <td class="day">
                                29
                            </td>
                            <td class="day">
                                30
                            </td>
                            <td class="day new">
                                1
                            </td>
                            <td class="day new">
                                2
                            </td>
                        </tr>
                        <tr>
                            <td class="day new">
                                3
                            </td>
                            <td class="day new">
                                4
                            </td>
                            <td class="day new">
                                5
                            </td>
                            <td class="day new">
                                6
                            </td>
                            <td class="day new">
                                7
                            </td>
                            <td class="day new">
                                8
                            </td>
                            <td class="day new">
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
                            <th class="next" style="visibility: visible;">
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
                                <span class="month">
                                    五月
                                </span>
                                <span class="month active">
                                    六月
                                </span>
                                <span class="month">
                                    七月
                                </span>
                                <span class="month">
                                    八月
                                </span>
                                <span class="month">
                                    九月
                                </span>
                                <span class="month">
                                    十月
                                </span>
                                <span class="month">
                                    十一月
                                </span>
                                <span class="month">
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
                            <th class="next" style="visibility: visible;">
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
                                <span class="year">
                                    2018
                                </span>
                                <span class="year">
                                    2019
                                </span>
                                <span class="year old">
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
        style="left: 1006px; z-index: 10019;">
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
                            <th class="next" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-right">
                                </span>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td colspan="7">
                                <span class="minute">
                                    23:00
                                </span>
                                <span class="minute">
                                    23:01
                                </span>
                                <span class="minute">
                                    23:02
                                </span>
                                <span class="minute">
                                    23:03
                                </span>
                                <span class="minute">
                                    23:04
                                </span>
                                <span class="minute">
                                    23:05
                                </span>
                                <span class="minute">
                                    23:06
                                </span>
                                <span class="minute">
                                    23:07
                                </span>
                                <span class="minute">
                                    23:08
                                </span>
                                <span class="minute">
                                    23:09
                                </span>
                                <span class="minute">
                                    23:10
                                </span>
                                <span class="minute">
                                    23:11
                                </span>
                                <span class="minute">
                                    23:12
                                </span>
                                <span class="minute">
                                    23:13
                                </span>
                                <span class="minute">
                                    23:14
                                </span>
                                <span class="minute">
                                    23:15
                                </span>
                                <span class="minute">
                                    23:16
                                </span>
                                <span class="minute">
                                    23:17
                                </span>
                                <span class="minute">
                                    23:18
                                </span>
                                <span class="minute">
                                    23:19
                                </span>
                                <span class="minute">
                                    23:20
                                </span>
                                <span class="minute">
                                    23:21
                                </span>
                                <span class="minute">
                                    23:22
                                </span>
                                <span class="minute">
                                    23:23
                                </span>
                                <span class="minute">
                                    23:24
                                </span>
                                <span class="minute">
                                    23:25
                                </span>
                                <span class="minute">
                                    23:26
                                </span>
                                <span class="minute">
                                    23:27
                                </span>
                                <span class="minute">
                                    23:28
                                </span>
                                <span class="minute">
                                    23:29
                                </span>
                                <span class="minute">
                                    23:30
                                </span>
                                <span class="minute">
                                    23:31
                                </span>
                                <span class="minute">
                                    23:32
                                </span>
                                <span class="minute">
                                    23:33
                                </span>
                                <span class="minute">
                                    23:34
                                </span>
                                <span class="minute">
                                    23:35
                                </span>
                                <span class="minute">
                                    23:36
                                </span>
                                <span class="minute">
                                    23:37
                                </span>
                                <span class="minute">
                                    23:38
                                </span>
                                <span class="minute">
                                    23:39
                                </span>
                                <span class="minute">
                                    23:40
                                </span>
                                <span class="minute">
                                    23:41
                                </span>
                                <span class="minute">
                                    23:42
                                </span>
                                <span class="minute">
                                    23:43
                                </span>
                                <span class="minute">
                                    23:44
                                </span>
                                <span class="minute">
                                    23:45
                                </span>
                                <span class="minute">
                                    23:46
                                </span>
                                <span class="minute">
                                    23:47
                                </span>
                                <span class="minute">
                                    23:48
                                </span>
                                <span class="minute">
                                    23:49
                                </span>
                                <span class="minute">
                                    23:50
                                </span>
                                <span class="minute">
                                    23:51
                                </span>
                                <span class="minute">
                                    23:52
                                </span>
                                <span class="minute">
                                    23:53
                                </span>
                                <span class="minute">
                                    23:54
                                </span>
                                <span class="minute">
                                    23:55
                                </span>
                                <span class="minute">
                                    23:56
                                </span>
                                <span class="minute">
                                    23:57
                                </span>
                                <span class="minute">
                                    23:58
                                </span>
                                <span class="minute active">
                                    23:59
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
                            <th class="next" style="visibility: visible;">
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
                                <span class="hour">
                                    16:00
                                </span>
                                <span class="hour">
                                    17:00
                                </span>
                                <span class="hour">
                                    18:00
                                </span>
                                <span class="hour">
                                    19:00
                                </span>
                                <span class="hour">
                                    20:00
                                </span>
                                <span class="hour">
                                    21:00
                                </span>
                                <span class="hour">
                                    22:00
                                </span>
                                <span class="hour active">
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
                            <th class="next" style="visibility: visible;">
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
                            <td class="day">
                                16
                            </td>
                            <td class="day">
                                17
                            </td>
                            <td class="day">
                                18
                            </td>
                        </tr>
                        <tr>
                            <td class="day">
                                19
                            </td>
                            <td class="day">
                                20
                            </td>
                            <td class="day">
                                21
                            </td>
                            <td class="day">
                                22
                            </td>
                            <td class="day">
                                23
                            </td>
                            <td class="day">
                                24
                            </td>
                            <td class="day">
                                25
                            </td>
                        </tr>
                        <tr>
                            <td class="day">
                                26
                            </td>
                            <td class="day">
                                27
                            </td>
                            <td class="day">
                                28
                            </td>
                            <td class="day">
                                29
                            </td>
                            <td class="day">
                                30
                            </td>
                            <td class="day new">
                                1
                            </td>
                            <td class="day new">
                                2
                            </td>
                        </tr>
                        <tr>
                            <td class="day new">
                                3
                            </td>
                            <td class="day new">
                                4
                            </td>
                            <td class="day new">
                                5
                            </td>
                            <td class="day new">
                                6
                            </td>
                            <td class="day new">
                                7
                            </td>
                            <td class="day new">
                                8
                            </td>
                            <td class="day new">
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
                            <th class="next" style="visibility: visible;">
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
                                <span class="month">
                                    五月
                                </span>
                                <span class="month active">
                                    六月
                                </span>
                                <span class="month">
                                    七月
                                </span>
                                <span class="month">
                                    八月
                                </span>
                                <span class="month">
                                    九月
                                </span>
                                <span class="month">
                                    十月
                                </span>
                                <span class="month">
                                    十一月
                                </span>
                                <span class="month">
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
                            <th class="next" style="visibility: visible;">
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
                                <span class="year">
                                    2018
                                </span>
                                <span class="year">
                                    2019
                                </span>
                                <span class="year old">
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