<?php $this->display('inc_header.php'); ?>
        <div class="container" style="margin-top: 20px;">
            <ol class="breadcrumb">
                <li>
                    <a href="/">
                        首页
                    </a>
                </li>
                <li class="active">
                    团队统计
                </li>
            </ol>
        </div>
        <div class="container">
            <div id="toolbar">
                <div id="search">
                    <div class="form-group">
                        <div class="form-inline">
                            <div class="input-group">
                                <input type="text" class="form-control" id="begin" value="2017-01-01"
                                placeholder="开始日期">
                                <span class="glyphicon glyphicon-th form-control-feedback" aria-hidden="true">
                                </span>
                            </div>
                            <button class="btn btn-default">今日</button>
                            <button class="btn btn-default">昨日</button>
                            <button class="btn btn-default">本周</button>
                            <div class="input-group">
                                <label class="sr-only" for="agent">
                                    代理及下级查询
                                </label>
                                <input type="text" class="form-control" id="agent" placeholder="代理及下级查询">
                            </div>
                            <div class="input-group">
                                <label class="sr-only" for="account">
                                    单用户查询
                                </label>
                                <input type="text" class="form-control" id="account" placeholder="单用户查询">
                            </div>
                            <button class="btn btn-primary" onclick="search();">
                                查询
                            </button>
                            <button class="btn btn-primary" onclick="reset();">
                                重置
                            </button>
                        </div>
                        <div class="form-inline" style="margin-top: 5px;">
                            <div class="input-group">
                                <input type="text" id="end" class="form-control" value="2018-01-01" placeholder="线束日期">
                                <span class="glyphicon glyphicon-th form-control-feedback" aria-hidden="true">
                                </span>
                            </div>
                            <button class="btn btn-default">上周</button>
                            <button class="btn btn-default">本月</button>
                            <button class="btn btn-default">上月</button>
                        </div>
                    </div>
                </div>
            </div>
            <br>
            <div class="bootstrap-table">
                <div class="fixed-table-toolbar">
                </div>
                <div class="fixed-table-container" style="padding-bottom: 0px;">
                    <div class="fixed-table-header" style="display: none;">
                        <table>
                        </table>
                    </div>
                    <div class="fixed-table-body">
                        <div class="fixed-table-loading" style="top: 41px;">
                            正在努力地加载数据中，请稍候……
                        </div>
                        <table id="datagrid_tb_base" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle; " data-field="depositTotal"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            存款总计
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; width: 200px; "
                                    data-field="withdrawTotal" tabindex="0">
                                        <div class="th-inner ">
                                            提款总计
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>

                                    <th style="text-align: center; vertical-align: middle; " data-field="rebateAgentTotal"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            返点总计
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; width: 200px; "
                                    data-field="rebateTotal" tabindex="0">
                                        <div class="th-inner ">
                                            反水总计
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="sumMoney"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            团队余额
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="childCountTotal"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            下级人数
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="betCountTotal"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            总投注人数
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-index="0">
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; width: 200px; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        0
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
                    <div class="fixed-table-pagination" style="display: none;">
                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>
            <br>
             <!--    <div class="bootstrap-table">
                <div class="fixed-table-toolbar">
                </div>
                <div class="fixed-table-container" style="padding-bottom: 0px;">
                    <div class="fixed-table-header" style="display: none;">
                        <table>
                        </table>
                    </div>
                    <div class="fixed-table-body">
                        <div class="fixed-table-loading" style="top: 41px;">
                            正在努力地加载数据中，请稍候……
                        </div>
                    <table id="datagrid_tb_self" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle; " data-field="lotteryTotal"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            彩票下注总记
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="lotteryAward"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            彩票派奖总计
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="sysLotteryTotal"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            系统彩下注总记
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="sysLotteryAward"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            系统彩派奖总计
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="sfMarkSixTotal"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            十分六合彩下注总记
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="sfMarkSixAward"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            十分六合彩派奖总计
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="markSixTotal"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            六合下注总记
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="markSixAward"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            六合派奖总计
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-index="0">
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
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
                    <div class="fixed-table-pagination" style="display: none;">
                    </div>
                </div>
            </div>-->
            <div class="clearfix">
            </div>
            <br>
            <div class="bootstrap-table">
                <div class="fixed-table-toolbar">
                </div>
                <div class="fixed-table-container" style="padding-bottom: 0px;">
                    <div class="fixed-table-header" style="display: none;">
                        <table>
                        </table>
                    </div>
                    <div class="fixed-table-body">
                        <div class="fixed-table-loading" style="top: 41px;">
                            正在努力地加载数据中，请稍候……
                        </div>
                        <table id="datagrid_tb_other" class="table table-hover table-striped">
                            <thead>
                                <tr>
                                    <th style="text-align: center; vertical-align: middle; " data-field="lotteryBunko"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            彩票输赢
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="markSixBunko"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            六合彩输赢
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                    <th style="text-align: center; vertical-align: middle; " data-field="allBunko"
                                    tabindex="0">
                                        <div class="th-inner ">
                                            全部输赢总计
                                        </div>
                                        <div class="fht-cell">
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr data-index="0">
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
                                    </td>
                                    <td style="text-align: center; vertical-align: middle; ">
                                        <span class="text-primary">
                                            0.00
                                        </span>
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
                    <div class="fixed-table-pagination" style="display: none;">
                    </div>
                </div>
            </div>
            <div class="clearfix">
            </div>
            <br>
            <div id="remark_div" style="padding: 10px;">
                <span>
                    输赢公式：
                </span>
                <span class="text-danger">
                    投注-派奖=输赢
                </span>
                <br>
                <span>
                    全部输赢公式：
                </span>
                <span class="text-danger">
                    各类游戏输赢总和-代理返点-会员反水=全部输赢
                </span>
                <br>
                <span>
                    派奖总计：
                </span>
                <span class="text-danger">
                    因为派奖是定时执行任务，会出现时间临界点情况，当存在24点前的投注，会造成些许误差
                </span>
                <div style="color:blue;">
                    统计比较消耗系统性能，统计结果将缓存1分钟
                </div>
            </div>
        </div>
        <script type="text/javascript">
            function getTab() {
                var curDate = new Date();
                var options = {
                    language: 'zh-CN',
                    autoclose: true,
                    minView: 2,
                    endDate: curDate,
                    format: 'yyyy-mm-dd'
                };
                $('#begin').datetimepicker(options);
                $('#end').datetimepicker(options);

                $("#datagrid_tb_base").bootstrapTable({
                    striped: true,
                    columns: [{
                        field: 'depositTotal',
                        title: '存款总计',
                        align: 'center',
                        valign: 'middle',
                        formatter: moneyFormatter
                    },
                    {
                        field: 'withdrawTotal',
                        title: '提款总计',
                        align: 'center',
                        width: '200',
                        valign: 'middle',
                        formatter: moneyFormatter
                    },
                    {
                        field: 'rebateAgentTotal',
                        title: '返点总计',
                        align: 'center',
                        valign: 'middle',
                        formatter: moneyFormatter
                    },
                    {
                        field: 'rebateTotal',
                        title: '反水总计',
                        align: 'center',
                        width: '200',
                        valign: 'middle',
                        formatter: moneyFormatter
                    },
                    {
                        field: 'sumMoney',
                        title: '团队余额',
                        align: 'center',
                        valign: 'middle',
                        formatter: moneyFormatter
                    },
                    {
                        field: 'childCountTotal',
                        title: '下级人数',
                        align: 'center',
                        valign: 'middle'
                    },                    {
                        field: 'betCountTotal',
                        title: '总投注人数',
                        align: 'center',
                        valign: 'middle'
                    }]
                });

                var totalColumns = [];
                var bunkoColumns = [];
                var lottery = 'on';
                var real = 'off';
                var sport = 'off';
                var markSix = 'on';
                // if (sport === 'on') {
                //     totalColumns.push({
                //         field: 'sportTotal',
                //         title: '体育下注总计',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                //     totalColumns.push({
                //         field: 'sportAward',
                //         title: '体育派奖总计',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                //     bunkoColumns.push({
                //         field: 'sportBunko',
                //         title: '体育输赢',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                // }
                // if (real === 'on') {
                //     totalColumns.push({
                //         field: 'realTotal',
                //         title: '真人下注总计',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                //     totalColumns.push({
                //         field: 'realAward',
                //         title: '真人派奖总计',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                //     bunkoColumns.push({
                //         field: 'realBunko',
                //         title: '真人输赢',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                // }
                // if ("off" === 'on') {
                //     totalColumns.push({
                //         field: 'dianZiTotal',
                //         title: '电子下注总计',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                //     totalColumns.push({
                //         field: 'dianZiAward',
                //         title: '电子派奖总计',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                //     bunkoColumns.push({
                //         field: 'dianZiBunko',
                //         title: '电子输赢',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                // }
                // if (lottery === 'on') {
                //     totalColumns.push({
                //         field: 'lotteryTotal',
                //         title: '彩票下注总记',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                //     totalColumns.push({
                //         field: 'lotteryAward',
                //         title: '彩票派奖总计',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                    bunkoColumns.push({
                        field: 'lotteryBunko',
                        title: '彩票输赢',
                        align: 'center',
                        valign: 'middle',
                        formatter: moneyFormatter
                    });
                    // totalColumns.push({
                    //     field: 'sysLotteryTotal',
                    //     title: '系统彩下注总记',
                    //     align: 'center',
                    //     valign: 'middle',
                    //     formatter: moneyFormatter
                    // });
                    // totalColumns.push({
                    //     field: 'sysLotteryAward',
                    //     title: '系统彩派奖总计',
                    //     align: 'center',
                    //     valign: 'middle',
                    //     formatter: moneyFormatter
                    // });
                    // bunkoColumns.push({
                    //     field: 'sysLotteryBunko',
                    //     title: '系统彩输赢',
                    //     align: 'center',
                    //     valign: 'middle',
                    //     formatter: moneyFormatter
                    // });
                    // totalColumns.push({
                    //     field: 'sfMarkSixTotal',
                    //     title: '十分六合彩下注总记',
                    //     align: 'center',
                    //     valign: 'middle',
                    //     formatter: moneyFormatter
                    // });
                    // totalColumns.push({
                    //     field: 'sfMarkSixAward',
                    //     title: '十分六合彩派奖总计',
                    //     align: 'center',
                    //     valign: 'middle',
                    //     formatter: moneyFormatter
                    // });
                    // bunkoColumns.push({
                    //     field: 'sfMarkSixBunko',
                    //     title: '十分六合彩输赢',
                    //     align: 'center',
                    //     valign: 'middle',
                    //     formatter: moneyFormatter
                    // });
               // }
                // if (markSix === 'on') {
                //     totalColumns.push({
                //         field: 'markSixTotal',
                //         title: '六合下注总记',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                //     totalColumns.push({
                //         field: 'markSixAward',
                //         title: '六合派奖总计',
                //         align: 'center',
                //         valign: 'middle',
                //         formatter: moneyFormatter
                //     });
                    bunkoColumns.push({
                        field: 'markSixBunko',
                        title: '六合彩输赢',
                        align: 'center',
                        valign: 'middle',
                        formatter: moneyFormatter
                    });
               // }
                bunkoColumns.push({
                    field: 'allBunko',
                    title: '全部输赢总计',
                    align: 'center',
                    valign: 'middle',
                    formatter: moneyFormatter
                });

                $("#datagrid_tb_self").bootstrapTable({
                    striped: true,
                    columns: totalColumns
                });

                $("#datagrid_tb_other").bootstrapTable({
                    striped: true,
                    columns: bunkoColumns
                });
            }

            function typeFormatter(value, row, index) {

                return GlobalTypeUtil.getTypeName(1, 1, value);
            }
            function moneyFormatter(value, row, index) {

                if (value === undefined) {
                    return "<span class='text-primary'>0.00</span>";
                }

                if (value > 0) {
                    return ['<span class="text-danger">', '</span>'].join(toDecimal2(value));
                }
                return ['<span class="text-primary">', '</span>'].join(toDecimal2(value));

            }

            function dateFormatter(value, row, index) {
                return DateUtil.formatDatetime(value);
            }

            //设置传入参数
            function queryParams(params) {
                params['account'] = $("#account").val();
                params['agent'] = $("#agent").val();
                params['begin'] = $("#begin").val();
                params['end'] = $("#end").val();
                return params
            }

            $(function() {
                getTab();
                bindbtn();
                initData();
            })

            function initData() {
                $.ajax({
                    url: "/index.php/team/getTeamStatistics",
                    data: queryParams({}),
                    success: function(result) {
                        data = [];
                        data.push(result);
                        $("#datagrid_tb_base").bootstrapTable('load', data);
                       // $("#datagrid_tb_self").bootstrapTable('load', data);
                        $("#datagrid_tb_other").bootstrapTable('load', data);
                    }
                });
            }

            function search() {
                initData();
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

            function reset() {
                var cur = DateUtil.getCurrentDate();
                $("#account").val("");
                $("#agent").val("");
                setDate(cur, cur);
            }

            function setDate(begin, end) {
                $('#begin').val(begin);
                $('#end').val(end);
            }

            function bindbtn() {
                $(".btn-default").click(function() {

                    var type = $(this).html();
                    var begin = "";
                    var end = "";

                    console.log(type);

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
                    setDate(begin, end);
                    search();
                });
            }
        </script>
        <div class="datetimepicker datetimepicker-dropdown-bottom-right dropdown-menu"
        style="left: 390px; z-index: 10009;">
            <div class="datetimepicker-minutes" style="display: none;">
                <table class=" table-condensed">
                    <thead>
                        <tr>
                            <th class="prev" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-left">
                                </span>
                            </th>
                            <th colspan="5" class="switch">
                                12 六月 2017
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
                                    0:05
                                </span>
                                <span class="minute">
                                    0:10
                                </span>
                                <span class="minute">
                                    0:15
                                </span>
                                <span class="minute">
                                    0:20
                                </span>
                                <span class="minute">
                                    0:25
                                </span>
                                <span class="minute">
                                    0:30
                                </span>
                                <span class="minute">
                                    0:35
                                </span>
                                <span class="minute">
                                    0:40
                                </span>
                                <span class="minute">
                                    0:45
                                </span>
                                <span class="minute">
                                    0:50
                                </span>
                                <span class="minute">
                                    0:55
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today" style="display: none;">
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
                                12 六月 2017
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
                                <span class="hour disabled">
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
                            <th colspan="7" class="today" style="display: none;">
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
                                日
                            </th>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="day old">
                                28
                            </td>
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
                        </tr>
                        <tr>
                            <td class="day">
                                4
                            </td>
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
                        </tr>
                        <tr>
                            <td class="day">
                                11
                            </td>
                            <td class="day active">
                                12
                            </td>
                            <td class="day disabled">
                                13
                            </td>
                            <td class="day disabled">
                                14
                            </td>
                            <td class="day disabled">
                                15
                            </td>
                            <td class="day disabled">
                                16
                            </td>
                            <td class="day disabled">
                                17
                            </td>
                        </tr>
                        <tr>
                            <td class="day disabled">
                                18
                            </td>
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
                        </tr>
                        <tr>
                            <td class="day disabled">
                                25
                            </td>
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
                        </tr>
                        <tr>
                            <td class="day new disabled">
                                2
                            </td>
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
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today" style="display: none;">
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
                            <th colspan="7" class="today" style="display: none;">
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
                            <th colspan="7" class="today" style="display: none;">
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
        style="left: 390px; z-index: 10019;">
            <div class="datetimepicker-minutes" style="display: none;">
                <table class=" table-condensed">
                    <thead>
                        <tr>
                            <th class="prev" style="visibility: visible;">
                                <span class="glyphicon glyphicon-arrow-left">
                                </span>
                            </th>
                            <th colspan="5" class="switch">
                                12 六月 2017
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
                                    0:05
                                </span>
                                <span class="minute">
                                    0:10
                                </span>
                                <span class="minute">
                                    0:15
                                </span>
                                <span class="minute">
                                    0:20
                                </span>
                                <span class="minute">
                                    0:25
                                </span>
                                <span class="minute">
                                    0:30
                                </span>
                                <span class="minute">
                                    0:35
                                </span>
                                <span class="minute">
                                    0:40
                                </span>
                                <span class="minute">
                                    0:45
                                </span>
                                <span class="minute">
                                    0:50
                                </span>
                                <span class="minute">
                                    0:55
                                </span>
                            </td>
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today" style="display: none;">
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
                                12 六月 2017
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
                                <span class="hour disabled">
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
                            <th colspan="7" class="today" style="display: none;">
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
                                日
                            </th>
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
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="day old">
                                28
                            </td>
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
                        </tr>
                        <tr>
                            <td class="day">
                                4
                            </td>
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
                        </tr>
                        <tr>
                            <td class="day">
                                11
                            </td>
                            <td class="day active">
                                12
                            </td>
                            <td class="day disabled">
                                13
                            </td>
                            <td class="day disabled">
                                14
                            </td>
                            <td class="day disabled">
                                15
                            </td>
                            <td class="day disabled">
                                16
                            </td>
                            <td class="day disabled">
                                17
                            </td>
                        </tr>
                        <tr>
                            <td class="day disabled">
                                18
                            </td>
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
                        </tr>
                        <tr>
                            <td class="day disabled">
                                25
                            </td>
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
                        </tr>
                        <tr>
                            <td class="day new disabled">
                                2
                            </td>
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
                        </tr>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="7" class="today" style="display: none;">
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
                            <th colspan="7" class="today" style="display: none;">
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
                            <th colspan="7" class="today" style="display: none;">
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