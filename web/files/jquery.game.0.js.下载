/*
 * version: 2.0.0 (12/13/2010)
 * @ jQuery v1.3 or later ,suggest use 1.4
 */
//$($.lt_id_data.id_cur_issue).html() 获取当前期的期数
window._last_query_daojishi = {};
(function ($) {//start
    var randomKey = Math.ceil(Math.random() * (20));
    $(document).ready(function () {
        $.playInit({
            data_label: face,
            data_prize: pri_user_data,
            cur_issue: pri_cur_issue,
            last_open: pri_lastopen,
            issues: pri_issues,
            issuecount: pri_issuecount,
            servertime: pri_servertime,
            lotteryid: pri_lotteryid,
            isdynamic: pri_isdynamic,
            showrecord: pri_showhistoryrecord,
            ajaxurl: pri_ajaxurl
        });
    });

    $.playInit = function (opts) {//整个购彩界面的初始化
        var ps = {//整个JS的初试化默认参数
            data_label: [],
            data_prize: [],
            data_id: {
                id_cur_issue: '#current_issue', //装载当前期的ID
                id_cur_end: '#current_endtime', //装载当前期结束时间的ID
                id_cur_sale: '#current_sale', //已销售期数ID
                id_cur_left: '#current_left', //今日还剩多少期ID
                id_count_down: '#count_down', //装载倒计时的ID
                id_labelbox: '#tabbar-div-s2', //装载大标签的元素ID
                id_smalllabel: '#tabbar-div-s3', //装载小标签的元素ID
                id_desc: '#lt_desc', //装载玩法描述的ID
                id_help: '#lt_help', //玩法帮助
                id_example: '#lt_example', //玩法帮助
                id_selector: '#lt_selector', //装载选号区的ID
                id_sel_num: '#lt_sel_nums', //装载选号区投注倍数的ID
                id_sel_money: '#lt_sel_money', //装载选号区投注金额的ID
                id_sel_times: '#lt_sel_times', //选号区倍数输入框ID
                id_reduce_times: '#reducetime', //减少倍数
                id_plus_times: '#plustime', //增加倍数
                id_sel_insert: '#lt_sel_insert', //添加按钮
                id_sel_modes: '#lt_sel_modes', //元角模式选择
                id_sel_prize: '#lt_sel_prize', //动态奖金设置ID
                id_cf_count: '#lt_cf_count', //统计投注单数
                id_cf_clear: '#lt_cf_clear', //清空确认区数据的按钮ID
                id_cf_content: '#lt_cf_content', //装载确认区数据的TABLE的ID
                id_cf_num: '#lt_cf_nums', //装载确认区总投注注数的ID
                id_cf_money: '#lt_cf_money', //装载确认区总投注金额的ID
                id_cf_help: '#lt_cf_help', //投注内容帮助
                id_issues: '#lt_issues', //装载起始期的ID
                id_sendok: '#lt_buy', //立即购买按钮
                id_tra_if: '#lt_trace_if', //是否追号的checkbox ID
                id_bet_con: '#lt_bet_con', //下注情况的 ID
                id_tra_stop: '#lt_trace_stop', //是否追中即停的checkbox ID
                id_tra_box: '#lt_trace_box', //装载整个追号内容的ID，主要是隐藏和显示
                id_bet_box: '#lt_bet_box', //装载整个下注内容的ID，主要是隐藏和显示
                id_tra_alct: '#lt_trace_alcount', //装载可追号期数的ID
                id_tra_label: '#lt_trace_label', //装载同倍，翻倍，利润追号等元素的ID
                id_tra_lhtml: '#lt_trace_labelhtml', //装载同倍翻倍等标签所表示的内容
                id_tra_ok: '#lt_trace_ok', //立即生成按钮
                id_tra_issues: '#lt_trace_issues', //装载追号的一系列期数的ID
                id_random_one: '#lt_random_one', //随机一注
                id_random_five: '#lt_random_five'//随机五注
            },
            //当前期        
            cur_issue: {
                issue: '20100210-001',
                endtime: '2010-02-10 09:10:00',
                opentime: '2011-02-10 09:10:00'
            },
            last_open: {
                issue: '20100210-001',
                code: '12345',
                endtime: '2010-02-10 09:10:00',
                opentime: '2011-02-10 09:10:00'
            },
            issues: {}, //所有的可追号期数集合
            price_unit: 1, //每注金额
            isdynamic: 1, //是否开启动态奖金支持
            ontimeout: function () {
            }, //时间结束后执行的函数
            onfinishbuy: function () {
                $('body').animate({scrollTop: 0}, 500);
            }, //购买成功后调用的函数
            if_init_bet: false //是否初始化投注
        };
        opts = $.extend({}, ps, opts || {}); //根据参数初始化默认配置
        /*************************************全局参数配置 **************************/
        $.extend({
            lt_id_data: opts.data_id,
            lt_method_data: {}, //当前所选择的玩法数据
            lt_method: methods,
            lt_issues: opts.issues, //所有的可追号期的初始集合
            lt_issuecount: opts.issuecount, //每天可追号总期数
            lt_ajaxurl: opts.ajaxurl,
            lt_lottid: opts.lotteryid,
            lt_isdyna: opts.isdynamic,
            lt_showrecord: opts.showrecord,
            lt_singlebet_winmoney: 0, //单注最高奖金
            lt_total_nums: 0, //总投注注数
            lt_total_money: 0, //总投注金额[非追号]
            lt_time_leave: 0, //本期剩余时间
            lt_time_open: 0, //刚完的一期剩余开奖时间
            lt_open_time: opts.cur_issue.opentime,
            lt_end_time: opts.cur_issue.endtime,
            lt_open_status: true,
            lt_last_open: opts.last_open,
            lt_same_code: [], //用于限制一个方法里不能投相同单
            lt_ontimeout: opts.ontimeout,
            lt_onfinishbuy: opts.onfinishbuy,
            lt_trace_base: 0, //追号的基本金额.
            lt_submiting: false, //是否正在提交表单
            lt_ismargin: true, //是否支持利润率追号
            lt_prizes: [], //投注内容的奖金情况
            lt_rxmode: false, //是否是任选模式
            lt_position_sel: [], //位置选择
            lt_position_title: lot_lang.dec_s41, //位置标题
            lt_timerLastCodeNo: '', //
            lt_price_unit: opts.price_unit
        });
        ps = null;
        opts.data_id = null;
        opts.issues = null;
        opts.ajaxurl = null;
        opts.lotteryid = null;
        //重新根据用户权限获取奖金设置及动态奖金分配情况
        var noRightMethod = [];//记录没有权限的玩法
        var noRightGroup = [];//记录没有权限的玩法组
        var haveRight = false;//是否有菜单的权限
        $.each(opts.data_label, function (l, h) {//玩法群 //initialize the game interface, split into other parts
            noRightGroup = [];
            $.each(h.label, function (i, n) {//玩法组
                noRightMethod = [];
                $.each(n.label, function (j, m) {//玩法
                    haveRight = false;
                    for (k in opts.data_prize) {
                        if (m.methodid == opts.data_prize[k].methodid) {
                            m.prize = opts.data_prize[k].prize;
                            m.dyprize = opts.data_prize[k].dyprize;
                            haveRight = true;
                            break;
                        }
                    }
                    if (haveRight == false) {
                        noRightMethod.push(m);
                    }
                });
                for (var ll = 0; ll < noRightMethod.length; ll++) {
                    opts.data_label[l].label[i].label.remove(noRightMethod[ll]);//删除没有权限的玩法
                }
                if (opts.data_label[l].label[i].label.length == 0) {
                    noRightGroup.push(n);
                }
            });
            for (var mm = 0; mm < noRightGroup.length; mm++) {
                opts.data_label[l].label.remove(noRightGroup[mm]);//删除没有任何下级玩法的玩法组
            }
        });
        //开始倒计时
        $($.lt_id_data.id_count_down).lt_timer(opts.servertime, opts.cur_issue.endtime);
        if ($.lt_last_open.openNum == null || $.lt_last_open.openNum == undefined || $.lt_last_open.openNum == '') {//定时获取开奖号码
            $("#lt_opentimeleft").lt_opentimer($.lt_last_open.issue,0);
        }
        var bhtml = ''; //大标签HTML
        var postion = 0;
        var selectGroup = 0;
        if ($('#init_bet').val() == 'true' && $('#gameId').val() == 9) {//pk10，如果有默认投注
            $.each(opts.data_label, function (i, n) {//遍历检查是否有前三玩法，其value是2
                if (n.label.length > 0) {
                    if (typeof (n) == 'object' && i == 2) {
                        $('#pk10Qian3').val('true');//用来判断是否初始化投注
                        selectGroup = 2;
                    }
                }
            });
        }

        var haverx = 0;
        $.each(opts.data_label, function (i, n) {//玩法群标签
            if (n.label.length > 0) {
                if (typeof (n) == 'object') {
                    if (n.isrx == 1 && haverx == 0) {//判断是否有任选玩法
                        haverx = 1;
                    }

                    if (postion == selectGroup || n.isdefault == 1) {//第一个标签自动选择或者选择默认玩法群
                        bhtml = bhtml.replace("front", "back");
                        bhtml += '<span class="tab-front" value="' + i + '" tag="' + n.isrx + '" default="' + n.isdefault + '"><span class="tabbar-left"></span><span class="content">' + n.title + '</span><span class="tabbar-right"></span></span>';
                        lt_smalllabel({//生成该标签下的小标签
                            title: n.title,
                            label: n.label
                        });
                    } else {
                        bhtml += '<span class="tab-back" value="' + i + '" tag="' + n.isrx + '" default="' + n.isdefault + '"><span class="tabbar-left"></span><span class="content">' + n.title + '</span><span class="tabbar-right"></span></span>';
                    }
                }
                postion++;
            }
        });
        if (haverx == 1) {//任选玩法
            bhtml += '<span class="tab-back" id="changemode"><span class="tabbar-left"></span><span class="content" title="' + lot_lang.dec_s44 + '">' + lot_lang.dec_s42 + '</span><span class="tabbar-right"></span></span>';
        }
        $bhtml = $(bhtml);
        $($.lt_id_data.id_labelbox).empty();
        $(bhtml).appendTo($.lt_id_data.id_labelbox);
        $.each($($.lt_id_data.id_labelbox).children(), function (i, n) {
            if ($.lt_rxmode == false) {
                if ($(this).attr("tag") == 1) {//非任选模式，隐藏任选玩法标签
                    $(this).hide();
                }
            } else {
                if ($(this).attr("tag") == 0) {//任选模式，隐藏普通玩法标签
                    $(this).hide();
                }
            }
        });
        var changemark = 0;
        $("#changemode").click(function () {//转换任选与普通模式
            changemark = 1;
            if ($.lt_rxmode == false) {
                $.lt_rxmode = true;
                $(this).find(".content").html(lot_lang.dec_s43);
            } else {
                $.lt_rxmode = false;
                $(this).find(".content").html(lot_lang.dec_s42);
            }
            var j = 0;
            $.each($($.lt_id_data.id_labelbox).children(), function (i, n) {
                if ($.lt_rxmode == false) {
                    if ($(this).attr("tag") == 1) {//非任选模式，隐藏任选玩法标签
                        $(this).hide();
                    } else {
                        $(this).show();
                        if (j == 0 || $(this).attr("default") == 1) {
                            $(this).click();
                        }
                        j++;
                    }
                } else {
                    if ($(this).attr("tag") == 0) {//任选模式，隐藏普通玩法标签
                        $(this).hide();
                    } else {
                        $(this).show();
                        if (j == 0 || $(this).attr("default") == 1) {
                            $(this).click();
                        }
                        j++;
                    }
                }
            });
        });
        $($.lt_id_data.id_labelbox).children().click(function () {//切换玩法群
            if ($.trim($(this).attr("class")) == 'tab-front' || $.trim($(this).attr("id")) == 'changemode') {//如果已经是当前标签则不切换
                return;
            }
            $($.lt_id_data.id_labelbox).children().attr("class", "tab-back");
            $(this).attr("class", "tab-front");
            var index = parseInt($(this).attr("value"), 10);
            if ($.lt_rxmode == true && changemark == 1) {
                $("#tabbar-div-s2 .tab-back:eq(10)").insertAfter("#tabbar-div-s2 .tab-back:eq(7)");
                changemark = 0;
            } else if ($.lt_rxmode == false && changemark == 1) {
                $("#tabbar-div-s2 .tab-back:eq(7)").insertAfter("#tabbar-div-s2 .tab-back:eq(10)");
                changemark = 0;
            }
            lt_smalllabel({
                title: opts.data_label[index].title,
                label: opts.data_label[index].label
            });
        });
        //生成并写入起始期内容
        var chtml = '<input type="hidden" name="lt_issue_start" id="lt_issue_start" value="' + opts.cur_issue.issue + '" /><input type="hidden" name="lt_total_nums" id="lt_total_nums" value="0"><input type="hidden" name="lt_total_money" id="lt_total_money" value="0">';
        $(chtml).appendTo($.lt_id_data.id_issues);
        //确认区事件
        $("tr", $($.lt_id_data.id_cf_content)).on("mouseover", function () {//确认区行颜色变化效果
            $(this).addClass("on");
        }).on("mouseout", function () {
            $(this).removeClass("on");
        });
        $($.lt_id_data.id_cf_clear).click(function () {//清空按钮
            $.confirm(lot_lang.am_s5, function () {
                $.lt_total_nums = 0;//总注数清零
                $.lt_total_money = 0;//总金额清零
                $.lt_trace_base = 0;//追号金额基数清零
                $.lt_same_code = [];//已在确认区的数据
                $($.lt_id_data.id_cf_num).html(0);//显示数据清零
                $($.lt_id_data.id_cf_money).html(0);//显示数据清零
                $($.lt_id_data.id_cf_count).html(0);//总投注项清零
                $($.lt_id_data.id_cf_content).children().empty();
                $('<tr class="nr"><td class="noinfo" align="center">暂无投注项</td></tr>').prependTo($.lt_id_data.id_cf_content);
                cleanTraceIssue();//清空追号区数据
                if ($($.lt_id_data.id_tra_if).prop("checked") == true) {
                    $($.lt_id_data.id_tra_if).prop("checked", false);
                    $($.lt_id_data.id_tra_stop).attr("disabled", true).prop("checked", false);
                    $($.lt_id_data.id_tra_box).hide();
                }
                if ($.lt_ismargin == false) {
                    traceCheckMarginSup();
                }
            });
        });
        $($.lt_id_data.id_cf_help).mouseover(function () {
            var $h = $('<div class=ibox ><table border=0 cellspacing=0 cellpadding=0><tr class=t><td class=tl></td><td class=tm></td><td class=tr></td></tr><tr class=mm><td class=ml><img src="' + _prefixURL.common + '/img/lottery/t.gif"></td><td>' + lot_lang.am_s35 + '</td><td class=mr><img src="' + _prefixURL.common + '/img/lottery/t.gif"></td></tr><tr class=b><td class=bl></td><td class=bm><img src="' + _prefixURL.common + '/img/lottery/t.gif"></td><td class=br> </td></tr></table><div class=ar><div class=ic></div></div></div>');
            var offset = $(this).offset();
            var left = offset.left - 37;
            var top = offset.top - 51;
            $(this).openFloat($h, "more", left, top);
        }).mouseout(function () {
            $(this).closeFloat();
        });
        //玩法帮助说明
        $($.lt_id_data.id_help).mouseover(function () {
            var $h = $('<div class=ibox><table border=0 cellspacing=0 cellpadding=0><tr class=t><td class=tl></td><td class=tm></td><td class=tr></td></tr><tr class=mm><td class=ml><img src="' + _prefixURL.common + '/img/lottery/t.gif"></td><td>' + $.lt_method_data.methodhelp + '</td><td class=mr><img src="' + _prefixURL.common + '/img/lottery/t.gif"></td></tr><tr class=b><td class=bl></td><td class=bm><img src="' + _prefixURL.common + '/img/lottery/t.gif"></td><td class=br> </td></tr></table><div class=ar><div class=ic></div></div></div>');
            var offset = $(this).offset();
            var left = offset.left - 37;
            var top = offset.top - 35;
            $(this).openFloat($h, "more", left, top);
        }).mouseout(function () {
            $(this).closeFloat();
        });
        //中奖说明
        $($.lt_id_data.id_example).mouseover(function () {
            var $h = $('<div class=ibox><table border=0 cellspacing=0 cellpadding=0><tr class=t><td class=tl></td><td class=tm></td><td class=tr></td></tr><tr class=mm><td class=ml><img src="' + _prefixURL.common + '/img/lottery/t.gif"></td><td>' + $.lt_method_data.methodexample + '</td><td class=mr><img src="' + _prefixURL.common + '/img/lottery/t.gif"></td></tr><tr class=b><td class=bl></td><td class=bm><img src="' + _prefixURL.common + '/img/lottery/t.gif"></td><td class=br> </td></tr></table><div class=ar><div class=ic></div></div></div>');
            var offset = $(this).offset();
            var left = offset.left - 37;
            var top = offset.top - 35;
            $(this).openFloat($h, "more", left, top);
        }).mouseout(function () {
            $(this).closeFloat();
        });
        //追号区
        $($.lt_id_data.id_tra_if).lt_trace({
            issues: opts.issues
        });
        //确认投注按钮事件
        $($.lt_id_data.id_sendok).lt_ajaxSubmit();
    }
    //动态载入小标签
    var lt_smalllabel = function (opts) {
        var ps = {
            title: '',
            label: []
        };    //标签数据
        opts = $.extend({}, ps, opts || {}); //根据参数初始化默认配置
        var html = '';
        var dyhtml = '';
        var hasmore = 0;
        $.each(opts.label, function (j, m) {
            if (m.label.length > 0) {
                html += '<li class="tz_li">';
                if (!(opts.label.length == 1 && m.label.length == 1)) {
                    hasmore = 1;
                    html += '<span class="tz_title">' + m.gtitle + '</span>';
                }
                $.each(m.label, function (i, n) {
                    if (typeof (n) == 'object') {
                        if (j == 0 && i == 0) {//第一个标签自动选择
                            if (!(opts.label.length == 1 && m.label.length == 1)) {
                                html += '<div class="act"><span class="method-tab-front" id="smalllabel_' + j + '_' + i + '">' + n.desc + '</span></div>';
                            }
                            lt_selcountback();//选号区的统计归零
                            $.lt_method_data = {
                                methodid: n.methodid,
                                title: opts.title,
                                name: n.name,
                                str: n.show_str,
                                prize: n.prize,
                                dyprize: n.dyprize,
                                modes: $.lt_method_data.modes ? $.lt_method_data.modes : {},
                                sp: n.code_sp,
                                methodhelp: n.methodhelp,
                                methoddesc: n.methoddesc,
                                methodexample: n.methodexample,
                                maxcodecount: n.maxcodecount,
                                isrx: n.isrx,
                                numcount: n.numcount,
                                defaultposition: n.defaultposition
                            };
                            $($.lt_id_data.id_selector).lt_selectarea(n.selectarea);//生成选号界面
                            //生成模式选择
                            selmodes = getCookie("modes");
                            $($.lt_id_data.id_sel_modes).empty();
                            $("ul.choose-money").empty();
                            $.each(n.modes, function (j, m) {
                                $.lt_method_data.modes[m.modeid] = {
                                    name: m.name,
                                    rate: Number(m.rate)
                                };
                                addItem($($.lt_id_data.id_sel_modes)[0], '' + m.name + '', m.modeid);
                                $("ul.choose-money").append("<li>" + m.name + "</li>");
                            });
                            SelectItem($($.lt_id_data.id_sel_modes)[0], selmodes);
                            //生成动态返点
                            dypoint = getCookie("dypoint");
                            //$($.lt_id_data.id_sel_prize).empty();
                            if (n.dyprize.length == 1 && $.lt_isdyna == 1) {
                                dyhtml = '<SELECT name="lt_sel_dyprize" id="lt_sel_dyprize">';
                                myPoint = new Array();
                                myPrize = new Array();
                                $.each(n.dyprize[0].prize, function (j, m) {
                                    //dyhtml += '<OPTION value="'+m.prize+'|'+m.point+'"'+(dypoint==m.point ? ' selected' : '')+'>'+m.prize+'-'+(Math.ceil(m.point*1000)/10)+'%</OPTION>';
                                    myPoint.push(m.point);
                                    myPrize.push(m.prize);
                                });
                                //数组排序
                                myPoint.sort(function (a, b) {
                                    return a < b ? 1 : -1
                                });
                                myPrize.sort(function (a, b) {
                                    return a > b ? 1 : -1
                                });
                                if (myPoint.length == 1) {
                                    myPoint[1] = myPoint[0];
                                }
                                if (myPrize.length == 1) {
                                    myPrize[1] = myPrize[0];
                                }
                                playId = $.lt_method_data.methodid;
                                initSlider(myPoint[1]);
                                if (window.prizeChangeBind) {
                                    prizeChangeBind();
                                }
                            }
                        } else {
                            if (!(opts.label.length == 1 && m.label.length == 1)) {
                                html += '<div class="back"><span class="method-tab-back" id="smalllabel_' + j + '_' + i + '">' + n.desc + '</span></div>';
                            }
                        }
                    }
                })
                html += '</li>';
            }
        });
        $html = $(html);
        $($.lt_id_data.id_smalllabel).empty();
        $html.appendTo($.lt_id_data.id_smalllabel);
        if (hasmore == 0) {
            $($.lt_id_data.id_smalllabel).empty();
            $($.lt_id_data.id_smalllabel).parent().hide();
        } else {
            $($.lt_id_data.id_smalllabel).parent().show();
        }
        $("span[id^='smalllabel_']:first", $($.lt_id_data.id_smalllabel)).attr("class", "method-tab-front").data("ischecked", 'yes');//第一个标签自动选择[兼容各种浏览器]
        $("span[id^='smalllabel_']", $($.lt_id_data.id_smalllabel)).click(function () {
            if ($(this).data("ischecked") == 'yes') {//如果已经选择则无任何动作
                return;
            }
            var aIdIndex = $(this).attr("id").split("_");
            var groupindex = parseInt(aIdIndex[1], 10);
            var index = parseInt(aIdIndex[2], 10);
            var tmpopts = opts.label;
            tmpopts = tmpopts[groupindex];
            lt_selcountback();//选号区的统计归零
            $.lt_method_data = {
                methodid: tmpopts.label[index].methodid,
                title: tmpopts.gtitle,
                name: tmpopts.label[index].name,
                str: tmpopts.label[index].show_str,
                prize: tmpopts.label[index].prize,
                dyprize: tmpopts.label[index].dyprize,
                modes: $.lt_method_data.modes ? $.lt_method_data.modes : {},
                sp: tmpopts.label[index].code_sp,
                methoddesc: tmpopts.label[index].methoddesc,
                methodhelp: tmpopts.label[index].methodhelp,
                methodexample: tmpopts.label[index].methodexample,
                maxcodecount: tmpopts.label[index].maxcodecount,
                isrx: tmpopts.label[index].isrx,
                numcount: tmpopts.label[index].numcount,
                defaultposition: tmpopts.label[index].defaultposition
            };
            $("span[id^='smalllabel_']", $($.lt_id_data.id_smalllabel)).removeData("ischecked").attr("class", "method-tab-back").parent().attr("class", "back");
            $(this).data("ischecked", 'yes').attr("class", "method-tab-front").parent().attr("class", "act"); //标记为已选择
            $($.lt_id_data.id_selector).lt_selectarea(tmpopts.label[index].selectarea);//生成选号界面
            //生成模式选择
            $($.lt_id_data.id_sel_modes).empty();
            $("ul.choose-money").empty();
            selmodes = getCookie("modes");
            $.each(tmpopts.label[index].modes, function (j, m) {
                $.lt_method_data.modes[m.modeid] = {
                    name: m.name, //元，角，分
                    rate: Number(m.rate)//1,0.1,0.01
                };
                addItem($($.lt_id_data.id_sel_modes)[0], '' + m.name + '', m.modeid);
                $("ul.choose-money").append("<li>" + m.name + "</li>");
            });
            SelectItem($($.lt_id_data.id_sel_modes)[0], selmodes);
            //生成动态返点
            dypoint = getCookie("dypoint");
            //$($.lt_id_data.id_sel_prize).empty();
            if (tmpopts.label[index].dyprize.length == 1 && $.lt_isdyna == 1) {
                dyhtml = '<SELECT name="lt_sel_dyprize" id="lt_sel_dyprize">';
                myPoint = new Array();
                myPrize = new Array();
                $.each(tmpopts.label[index].dyprize[0].prize, function (j, m) {
                    //dyhtml += '<OPTION value="'+m.prize+'|'+m.point+'"'+(dypoint==m.point ? ' selected' : '')+'>'+m.prize+'-'+(Math.ceil(m.point*1000)/10)+'%</OPTION>';
                    myPoint.push(m.point);
                    myPrize.push(m.prize);
                });
                //数组排序
                myPoint.sort(function (a, b) {
                    return a < b ? 1 : -1
                });
                myPrize.sort(function (a, b) {
                    return a > b ? 1 : -1
                });
                if (myPoint.length == 1) {
                    myPoint[1] = myPoint[0];
                }
                if (myPrize.length == 1) {
                    myPrize[1] = myPrize[0];
                }
                playId = $.lt_method_data.methodid;
                initSlider(myPoint[1]);
                if (window.prizeChangeBind)
                    prizeChangeBind();
            }

        });
    };

    var lt_selcountback = function () {
        $($.lt_id_data.id_sel_times).val(2);
        $($.lt_id_data.id_sel_money).html(0);
        $($.lt_id_data.id_sel_num).html(0);
    };

    //选号区动态插入函数，可能是手动编辑
    $.fn.lt_selectarea = function (opts) {
        var ps = {//默认参数
            type: 'digital', //选号，'input':输入型,'digital':数字选号型,'dxds':大小单双类型
            layout: [
                {
                    title: '百位',
                    no: '0|1|2|3|4|5|6|7|8|9',
                    place: 0,
                    cols: 1
                },
                {
                    title: '十位',
                    no: '0|1|2|3|4|5|6|7|8|9',
                    place: 1,
                    cols: 1
                },
                {
                    title: '个位',
                    no: '0|1|2|3|4|5|6|7|8|9',
                    place: 2,
                    cols: 1
                }
            ], //数字型的号码排列
            noBigIndex: 5, //前面多少个号码是小号,即大号是从多少个以后开始的
            isButton: true  //是否需要全大小奇偶清按钮
        };
        opts = $.extend({}, ps, opts || {}); //根据参数初始化默认配置
        var data_sel = [];//用户已选择或者已输入的数据
        var minchosen = [];//每一位上最少选择的号码个数
        var max_place = 0; //总共的选择型排列数
        var otype = opts.type.toLowerCase();    //类型全部转换为小写
        var methodname = $.lt_method[$.lt_method_data.methodid];//玩法的简写,如:'ZX3'
        var defaultposition = $.lt_method_data.defaultposition;//默认选择位置
        var html = '';
        //判断选择了哪些位置
        var positionvalue = 0;
        $.lt_position_sel = [];//重新设置选择的号码位置
        if (opts.selPosition == true) {//任选玩法，是否需要指定位置
            defaultposition = defaultposition.split("");
            html += '<div class="selposition">';
            var positionlen = defaultposition.length;
            for (var i = 0; i < positionlen; i++) {
                if (defaultposition[i] == 1) {
                    $.lt_position_sel.push(i);
                    html += '<label for="position_' + i + '"><input type="checkbox" name="position_' + i + '" id="position_' + i + '" value="1" class="selpositioninput" checked>' + $.lt_position_title[i] + '</label>';
                } else {
                    html += '<label for="position_' + i + '"><input type="checkbox" name="position_' + i + '" id="position_' + i + '" value="1" class="selpositioninput">' + $.lt_position_title[i] + '</label>';
                }
            }
            html += lot_lang.dec_s45.replace("%n", $.lt_position_sel.length) + '</div>';
        }

        if (otype == 'input') {//输入型，则载入输入型的数据, when choosing input to bid option
            var tempdes = lot_lang.dec_s4;
            html += '<div class="gds-text single"><table class=ha><tr><td ><textarea id="lt_write_box" style="width:600px;height:80px;border:1px solid black;padding-top:10px;"></textarea><br />'  + tempdes +'</td><td valign=top><span class=ds><span class=lsbb><input name="lt_write_del" type="button" value="删除重复号" class="lsb" id="lt_write_del"></span></span><span class=ds><span class=lsbb><input name="lt_write_import" type="button" value="&nbsp;导入文件&nbsp;" class="lsb" id="lt_write_import"></span></span><span class=ds><span class=lsbb><input name="lt_write_empty" type="button" value="&nbsp;清&nbsp;&nbsp;空&nbsp;" class="lsb" id="lt_write_empty"></span></span></td></tr></table></div>';
            data_sel[0] = []; //初始数据
            tempdes = null;
        } else if (otype == 'digital' || otype == 'digitalts') {//数字选号型或者特殊号码
            $.each(opts.layout, function (i, n) {
                if (typeof (n) == 'object') {
                    n.place = parseInt(n.place, 10);
                    max_place = n.place > max_place ? n.place : max_place;
                    data_sel[n.place] = [];//初始数据
                    minchosen[n.place] = (typeof (n.minchosen) == 'undefined') ? 0 : n.minchosen;//初始每一位上最少选择的号码个数
                    html += '<div class="gds">';
                    if (n.cols > 0) {//有标题
                        html += '<div class=ti>';
                        if (n.title.length > 0) {
                            html += n.title;
                        }
                        html += '</div>';
                    } else {
                        html += '<div class=tiempty></div>';
                    }
                    if (otype == 'digital') {//普通号码
                        html += '<div class="gd">';
                    } else {
                        html += '<div class="gdts">';//特殊号码
                    }
                    numbers = n.no.split("|");
                    j = numbers.length;
                    if (j > 12) {
                        html += '<span>';
                    }
                    var tmpStr = '';
                    var gameId = $('#gameId').val();
                    if (gameId != 9) {
                        if (n.title == '百位') {
                            tmpStr = '3';
                        } else if (n.title == '十位') {
                            tmpStr = '4';
                        } else if (n.title == '个位') {
                            tmpStr = '5';
                        } else if (n.title == '万位') {
                            tmpStr = '1';
                        } else if (n.title == '千位') {
                            tmpStr = '2';
                        }
                    } else {
                        if (n.title == '冠军') {
                            tmpStr = '1';
                        } else if (n.title == '亚军') {
                            tmpStr = '2';
                        }
                        else if (n.title == '季军') {
                            tmpStr = '3';
                        } else if (n.title == '第四名') {
                            tmpStr = '4';
                        } else if (n.title == '第五名') {
                            tmpStr = '5';
                        } else if (n.title == '第六名') {
                            tmpStr = '6';
                        } else if (n.title == '第七名') {
                            tmpStr = '7';
                        } else if (n.title == '第八名') {
                            tmpStr = '8';
                        } else if (n.title == '第九名') {
                            tmpStr = '9';
                        } else if (n.title == '第十名') {
                            tmpStr = '10';
                        }
                    }
                    for (i = 0; i < j; i++) {
                        if ((methodname == 'ZXHZ' && i == 14) || (methodname == 'ZUHZ' && i == 13) || (methodname == 'ZXHZ2' && i == 10)) {
                            html += '</span><span>'
                        }
                        html += '<div id="wei_' + tmpStr + '_' + numbers[i] + '" name="lt_place_' + n.place + '">' + numbers[i] + '</div>';
                    }
                    if (j > 12) {
                        html += '</span>';
                    }
                    html += '</div>';
                    if (opts.isButton == true) {
                        html += '<div class=to><ul><li class="l"></li><li class="dxjoq" name="all">' + lot_lang.bt_sel_all + '</li><li class="dxjoq" name="big">' + lot_lang.bt_sel_big + '</li><li class="dxjoq" name="small">' + lot_lang.bt_sel_small + '</li><li class="dxjoq" name="odd">' + lot_lang.bt_sel_odd + '</li><li class="dxjoq" name="even">' + lot_lang.bt_sel_even + '</li><li class="dxjoq" name="clean">' + lot_lang.bt_sel_clean + '</li><li class="r"></li></ul></div>';
                    }
                    html += '</div>';
                }
            });
        } else if (otype == 'dxds') {//大小单双类型
            $.each(opts.layout, function (i, n) {
                n.place = parseInt(n.place, 10);
                max_place = n.place > max_place ? n.place : max_place;
                data_sel[n.place] = [];//初始数据
                html += '<div class="gds">';
                if (n.cols > 0) {//有标题
                    html += '<div class=ti><div class=l></div>';
                    if (n.title.length > 0) {
                        html += n.title;
                    }
                    html += '<div class=r></div></div>';
                }
                html += '<div class="gd">';
                numbers = n.no.split("|");
                j = numbers.length;
                for (i = 0; i < j; i++) {
                    html += '<div name="lt_place_' + n.place + '">' + numbers[i] + '</div>';
                }
                html += '</div><div class=to><ul><li class="l"></li><li class="dxjoq" name="clean">' + lot_lang.bt_sel_clean + '</li><li class="r"></li></ul></div></div>';
            });
        }
        html += '<div class="c"></div>';
        $html = $(html);
        $(this).empty();
        $html.appendTo(this);

        //选择了多少个位置
        $(document).on("click", "[id^=position_]", function () {
            var tmpCount = 0;
            $("input[name^=position_]:checked").each(function () {
                tmpCount += 1;
            });
            $("#positioncount").text(tmpCount);
        });

        //初始投注号码
        initSelectNum();

        $($.lt_id_data.id_desc).html($.lt_method_data.methoddesc);
        $(".selpositioninput").click(function () {//选择位置处理注数问题
            $.lt_position_sel = [];//重新设置选择的号码位置
            $.each($(".selpositioninput"), function () {
                positionvalue = $(this).attr("name");
                positionvalue = positionvalue.split("_");
                if ($(this).prop("checked") == true) {
                    $.lt_position_sel.push(positionvalue[1]);
                }
            });
            $("#positioncount").text($.lt_position_sel.length);
            var projectCount = $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, $.lt_method_data.numcount);
            $("#positioninfo").html(projectCount);
            checkNum();
        });
        var me = this;
        var _SortNum = function (a, b) {//数字大小排序
            if (otype != 'input') {
                a = a.replace(/豹子/g, 0).replace(/顺子/g, 1).replace(/对子/g, 2);
                a = a.replace(/大/g, 0).replace(/小/g, 1).replace(/单/g, 2).replace(/双/g, 3).replace(/\s/g, "");
                b = b.replace(/豹子/g, 0).replace(/顺子/g, 1).replace(/对子/g, 2);
                b = b.replace(/大/g, 0).replace(/小/g, 1).replace(/单/g, 2).replace(/双/g, 3).replace(/\s/g, "");
            }
            a = parseInt(a, 10);
            b = parseInt(b, 10);
            if (isNaN(a) || isNaN(b)) {
                return true;
            }
            return (a - b);
        };
        /************************ 验证号码合法性以及计算单笔投注注数以及金额 ***********************/
            //===================输入型检测
        var _HHZXcheck = function (n, len) {//混合组选合法号码检测，合法返回TRUE，非法返回FALSE,n号码，len号码长度
                if (len == 2) {//两位
                    var a = ['00', '11', '22', '33', '44', '55', '66', '77', '88', '99'];
                } else {//三位[默认]
                    var a = ['000', '111', '222', '333', '444', '555', '666', '777', '888', '999'];
                }
                n = n.toString();
                if ($.inArray(n, a) == -1) {//不在非法列表中
                    return true;
                }
                return false;
            };
        //组三单式合法号码检测，合法返回TRUE，非法返回FALSE,n号码，len号码长度
        var _ZUSDScheck = function (n, len) {
            if (len != 3) {
                return false
            }
            var first = "";
            var second = "";
            var third = "";
            var i = 0;
            for (i = 0; i < len; i++) {
                if (i == 0) {
                    first = n.substr(i, 1);
                }
                if (i == 1) {
                    second = n.substr(i, 1);
                }
                if (i == 2) {
                    third = n.substr(i, 1);
                }
            }
            if (first == second && second == third) {
                return false;
            }
            if (first == second || second == third || third == first) {
                return true;
            }
            return false;
        };
        //组六单式合法号码检测，合法返回TRUE，非法返回FALSE,n号码，len号码长度
        var _ZULDScheck = function (n, len) {
            if (len != 3) {
                return false
            }
            var first = "";
            var second = "";
            var third = "";
            var i = 0;
            for (i = 0; i < len; i++) {
                if (i == 0) {
                    first = n.substr(i, 1);
                }
                if (i == 1) {
                    second = n.substr(i, 1);
                }
                if (i == 2) {
                    third = n.substr(i, 1);
                }
            }
            if (first == second || second == third || third == first) {
                return false;
            }
            else {
                return true;
            }
            return false;
        };

        var _pk10check = function (errorarr){
            var mid = $.lt_method_data.methodid;//玩法id
            if ($.lt_lottid == 9 && ( mid == 224 || mid == 226)) { // 9:pk10 224:前二直选单式 226:前三直选单式
                m = '';//返回处理后的投注
                for (var i = 0; i < data_sel[0].length; i++) {
                    var tmpV = data_sel[0][i];
                    var isContinue = 0;
                    var tmpL = tmpV.length;
                    if (mid == 224 && tmpL != 4) {
                        isContinue = 1;
                    }
                    if (mid == 226 && tmpL != 6) {
                        isContinue = 1;
                    }
                    var tmpArr = new Array();
                    for (var j = 0; j < (tmpL / 2); j++) {//检测是否有错误号码
                        var hao = tmpV.substr(j * 2, 2);
                        tmpArr[j] = hao;
                        if (parseInt(hao) > 10 || parseInt(hao) == 0) {//检测错误号码
                            isContinue = 1;
                            break;
                        }
                    }
                    //检测重复
                    if (mid == 224 && tmpArr.length == 2 && tmpArr[0] == tmpArr[1]) {//前二直选
                        isContinue = 1;
                    } else if (mid == 226 && tmpArr.length == 3 && (tmpArr[0] == tmpArr[1] || tmpArr[0] == tmpArr[2] || tmpArr[1] == tmpArr[2])) {//前三直选
                        isContinue = 1;
                    }
                    if (isContinue == 1) {//有错误号码,进行下次循环
                        errorarr.push(tmpV);
                        continue;
                    }
                    if (m != '' && m != undefined) {
                        m += ' ';
                    }
                    m += tmpV;
                }
                    data_sel[0] = m.split(' ');
            }
                    return errorarr;
        };


        //号码检测,l:号码长度,e是否返回非法号码，true是,false返回合法注数,fun对每个号码的附加检测,sort:是否对每个号码排序
        var _inputCheck_Num = function (l, e, fun, sort) { //file input from here
            var nums = data_sel[0].length;
            var error = [];
            var newsel = [];
            var partn = "";
            l = parseInt(l, 10);
            switch (l) {
                case 2 :
                    partn = /^[0-9]{2}$/;
                    break;
                case 4 :
                    partn = /^[0-9]{4}$/;
                    break;
                case 5 :
                    partn = /^[0-9]{5}$/;
                    break;
                case 6 :
                    partn = /^[0-9]{6}$/;
                    break;
                default:
                    partn = /^[0-9]{3}$/;
                    break;
            }
            fun = $.isFunction(fun) ? fun : function (s) {
                    return true;
                };

            $.each(data_sel[0], function (i, n) {
                n = $.trim(n);
                if (partn.test(n) && fun(n, l)) {//合格号码
                    if (sort) {
                        if (n.indexOf(" ") == -1) {
                            n = n.split("");
                            n.sort(_SortNum);
                            n = n.join("");
                        } else {
                            n = n.split(" ");
                            n.sort(_SortNum);
                            n = n.join(" ");
                        }
                    }
                    data_sel[0][i] = n;
                    newsel.push(n);
                } else {//不合格则注数减
                    if (n.length > 0) {
                        error.push(n);
                    }
                    nums = nums - 1;
                }
            });
            if (e == true) {
                data_sel[0] = newsel;
                return error;
            }
            return nums;
        };

        //号码注数检测
        var _inputCheckBjscNum = function (l) {
            var nums = data_sel[0].length;
            $.each(data_sel[0], function (k, v) {
                if (v.length != l) {
                    nums--;
                } else {
                    for (var i = 0; i < (l / 2); i++) {
                        var hao = v.substr(i * 2, 2);
                        if (parseInt(hao) > 10) {
                            //data_sel[0].splice(k,1);
                            nums--;
                            break;
                        }
                    }
                }
            });
            return nums;
        };

        function checkNum() {//时时计算投注注数与金额等
            var nums = 0, mname = $.lt_method[$.lt_method_data.methodid];//玩法的简写,如:'ZX3'
            var modes = parseInt($($.lt_id_data.id_sel_modes).val(), 10);//投注模式
            var isrx = $.lt_method_data.isrx;//是否是任选
            //01:验证号码合法性并计算注数
            if (otype == 'input') {//输入框形式的检测
                if (data_sel[0].length > 0) {//如果输入的有值
                    switch (mname) {
                        case 'ZX5'  :
                            nums = _inputCheck_Num(5, false);
                            break;
                        case 'ZX4'  :
                            nums = _inputCheck_Num(4, false);
                            break;
                        case 'ZX3'  :
                        case 'ZXDS3'  :
                            nums = _inputCheck_Num(3, false);
                            break;
                        case 'ZUS'  :
                            nums = _inputCheck_Num(3, false, _ZUSDScheck, true);
                            if (isrx == 1) {//任选玩法：考虑选择的位置
                                nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 3);
                            }
                            break;
                        case 'ZUL'  :
                            nums = _inputCheck_Num(3, false, _ZULDScheck, true);
                            if (isrx == 1) {//任选玩法：考虑选择的位置
                                nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 3);
                            }
                            break;
                        case 'HHZX' :
                            nums = _inputCheck_Num(3, false, _HHZXcheck, true);
                            if (isrx == 1) {//任选玩法：考虑选择的位置
                                nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 3);
                            }
                            break;
                        case 'ZX2'  :
                            nums = _inputCheck_Num(2, false);
                            break;
                        case 'ZU2'  :
                            nums = _inputCheck_Num(2, false, _HHZXcheck, true);
                            if (isrx == 1) {//任选玩法：考虑选择的位置
                                nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 2);
                            }
                            break;
                        case 'RZX2'://任选二直选单式
                        case 'RZX3'://任选三直选单式
                        case 'RZX4'://任选四直选单式
                            var sellen = mname.substring(mname.length - 1);
                            nums = _inputCheck_Num(sellen, false);
                            nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, sellen);
                            break;
                        case 'BJZ2':
                            nums = _inputCheckBjscNum(4,true );
                            break;
                        case 'BJZ3':
                            nums = _inputCheckBjscNum(6);
                            break;
                        default:
                            break;
                    }
                }
            } else {//其他选择号码形式[暂时就数字型和大小单双]
                var tmp_nums = 1;
                switch (mname) {//根据玩法分类不同做不同处理
                    case 'ZH5':
                    case 'ZH4':
                    case 'ZH3':
                        for (i = 0; i <= max_place; i++) {
                            if (data_sel[i].length == 0) {//有位置上没有选择
                                tmp_nums = 0;
                                break;
                            }
                            tmp_nums = accMul(tmp_nums, data_sel[i].length);
                        }
                        nums = tmp_nums * parseInt(mname.charAt(mname.length - 1));
                        break;
                    case 'WXZU120':
                        var s = data_sel[0].length;
                        if (s > 4) {//必须选5位或者以上
                            nums += Combination(s, 5);
                        }
                        break;
                    case 'WXZU60':
                    case 'WXZU30':
                    case 'WXZU20':
                    case 'WXZU10':
                    case 'WXZU5':
                        if (data_sel[0].length >= minchosen[0] && data_sel[1].length >= minchosen[1]) {
                            var h = Array.intersect(data_sel[0], data_sel[1]).length;
                            tmp_nums = Combination(data_sel[0].length, minchosen[0]) * Combination(data_sel[1].length, minchosen[1]);
                            if (h > 0) {
                                //C(m,1)*C(n,3)-C(h,1)*C(n-1,2)
                                if (mname == 'WXZU60') {
                                    tmp_nums -= Combination(h, 1) * Combination(data_sel[1].length - 1, 2);
                                }
                                //C(m,2)*C(n,1)-C(h,2)*C(2,1)-C(h,1)*C(m-h,1)
                                else if (mname == 'WXZU30') {
                                    tmp_nums -= Combination(h, 2) * Combination(2, 1);
                                    if (data_sel[0].length - h > 0) {
                                        tmp_nums -= Combination(h, 1) * Combination(data_sel[0].length - h, 1);
                                    }
                                }
                                //C(m,1)*C(n,2)-C(h,1)*C(n-1,1)
                                else if (mname == 'WXZU20') {
                                    tmp_nums -= Combination(h, 1) * Combination(data_sel[1].length - 1, 1);
                                }
                                //C(m,1)*C(n,1)-C(h,1)
                                else if (mname == 'WXZU10' || mname == 'WXZU5') {
                                    tmp_nums -= Combination(h, 1);
                                }
                            }
                            nums += tmp_nums;
                        }
                        break;
                    case 'SXZU24':
                        var s = data_sel[0].length;
                        if (s > 3) {//必须选4位或者以上
                            nums += Combination(s, 4);
                        }
                        if (isrx == 1) {//任选玩法：考虑选择的位置
                            nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 4);
                        }
                        break;
                    case 'SXZU6':
                        if (data_sel[0].length >= minchosen[0]) {
                            //C(n,2)
                            nums += Combination(data_sel[0].length, minchosen[0]);
                        }
                        if (isrx == 1) {//任选玩法：考虑选择的位置
                            nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 4);
                        }
                        break;
                    case 'SXZU12':
                    case 'SXZU4':
                        if (data_sel[0].length >= minchosen[0] && data_sel[1].length >= minchosen[1]) {
                            var h = Array.intersect(data_sel[0], data_sel[1]).length;
                            tmp_nums = Combination(data_sel[0].length, minchosen[0]) * Combination(data_sel[1].length, minchosen[1]);
                            if (h > 0) {
                                //C(m,1)*C(n,2)-C(h,1)*C(n-1,1)
                                if (mname == 'SXZU12') {
                                    tmp_nums -= Combination(h, 1) * Combination(data_sel[1].length - 1, 1);
                                }
                                //C(m,1)*C(n,1)-C(h,1)
                                else if (mname == 'SXZU4') {
                                    tmp_nums -= Combination(h, 1);
                                }
                            }
                            nums += tmp_nums;
                        }
                        if (isrx == 1) {//任选玩法：考虑选择的位置
                            nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 4);
                        }
                        break;
                    case 'ZXKD' :   //直选跨度3特殊算法
                        var cc = {0: 10, 1: 54, 2: 96, 3: 126, 4: 144, 5: 150, 6: 144, 7: 126, 8: 96, 9: 54};
                        for (i = 0; i <= max_place; i++) {
                            var s = data_sel[i].length;
                            for (j = 0; j < s; j++) {
                                nums += cc[parseInt(data_sel[i][j], 10)];
                            }
                        }
                        break;
                    case 'ZXKD2' :   //直选跨度2特殊算法
                        var cc = {0: 10, 1: 18, 2: 16, 3: 14, 4: 12, 5: 10, 6: 8, 7: 6, 8: 4, 9: 2};
                        for (i = 0; i <= max_place; i++) {
                            var s = data_sel[i].length;
                            for (j = 0; j < s; j++) {
                                nums += cc[parseInt(data_sel[i][j], 10)];
                            }
                        }
                        break;
                    case 'ZXHZ' :   //直选和值特殊算法
                        var cc = {0: 1, 1: 3, 2: 6, 3: 10, 4: 15, 5: 21, 6: 28, 7: 36, 8: 45, 9: 55, 10: 63, 11: 69, 12: 73, 13: 75, 14: 75, 15: 73, 16: 69, 17: 63, 18: 55, 19: 45, 20: 36, 21: 28, 22: 21, 23: 15, 24: 10, 25: 6, 26: 3, 27: 1};
                    case 'ZUHZ' :   //混合组选特殊算法
                        if (mname == 'ZUHZ') {
                            cc = {1: 1, 2: 2, 3: 2, 4: 4, 5: 5, 6: 6, 7: 8, 8: 10, 9: 11, 10: 13, 11: 14, 12: 14, 13: 15, 14: 15, 15: 14, 16: 14, 17: 13, 18: 11, 19: 10, 20: 8, 21: 6, 22: 5, 23: 4, 24: 2, 25: 2, 26: 1};
                        }
                        for (i = 0; i <= max_place; i++) {
                            var s = data_sel[i].length;
                            for (j = 0; j < s; j++) {
                                nums += cc[parseInt(data_sel[i][j], 10)];
                            }
                        }
                        if (isrx == 1) {//任选玩法：考虑选择的位置
                            nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 3);
                        }
                        break;
                    case 'ZUSHZ':
                        var cc = {1: 1, 2: 2, 3: 1, 4: 3, 5: 3, 6: 3, 7: 4, 8: 5, 9: 4, 10: 5, 11: 5, 12: 4, 13: 5, 14: 5, 15: 4, 16: 5, 17: 5, 18: 4, 19: 5, 20: 4, 21: 3, 22: 3, 23: 3, 24: 1, 25: 2, 26: 1};

                        for (i = 0; i <= max_place; i++) {
                            var s = data_sel[i].length;
                            for (j = 0; j < s; j++) {
                                nums += cc[parseInt(data_sel[i][j], 10)];
                            }
                        }
                        break;
                    case 'ZULHZ':
                        var cc = {3: 1, 4: 1, 5: 2, 6: 3, 7: 4, 8: 5, 9: 7, 10: 8, 11: 9, 12: 10, 13: 10, 14: 10, 15: 10, 16: 9, 17: 8, 18: 7, 19: 5, 20: 4, 21: 3, 22: 2, 23: 1, 24: 1};

                        for (i = 0; i <= max_place; i++) {
                            var s = data_sel[i].length;
                            for (j = 0; j < s; j++) {
                                nums += cc[parseInt(data_sel[i][j], 10)];
                            }
                        }
                        break;
                    case 'ZUS'  :   //组三
                        for (i = 0; i <= max_place; i++) {
                            var s = data_sel[i].length;
                            if (s > 1) {//组三必须选两位或者以上
                                nums += s * (s - 1);
                            }
                        }
                        if (isrx == 1) {//任选玩法：考虑选择的位置
                            nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 3);
                        }
                        break;
                    case 'ZUL'  :   //组六
                        for (i = 0; i <= max_place; i++) {
                            var s = data_sel[i].length;
                            if (s > 2) {//组六必须选三位或者以上
                                nums += s * (s - 1) * (s - 2) / 6;
                            }
                        }
                        if (isrx == 1) {//任选玩法：考虑选择的位置
                            nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 3);
                        }
                        break;
                    case 'ZXHZ2'://直选和值2
                        cc = {0: 1, 1: 2, 2: 3, 3: 4, 4: 5, 5: 6, 6: 7, 7: 8, 8: 9, 9: 10, 10: 9, 11: 8, 12: 7, 13: 6, 14: 5, 15: 4, 16: 3, 17: 2, 18: 1};
                        for (i = 0; i <= max_place; i++) {
                            var s = data_sel[i].length;
                            for (j = 0; j < s; j++) {
                                nums += cc[parseInt(data_sel[i][j], 10)];
                            }
                        }
                        if (isrx == 1) {//任选玩法：考虑选择的位置
                            nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 2);
                        }
                        break;
                    case 'ZUHZ2'://组选和值2
                        cc = {0: 0, 1: 1, 2: 1, 3: 2, 4: 2, 5: 3, 6: 3, 7: 4, 8: 4, 9: 5, 10: 4, 11: 4, 12: 3, 13: 3, 14: 2, 15: 2, 16: 1, 17: 1, 18: 0};
                        for (i = 0; i <= max_place; i++) {
                            var s = data_sel[i].length;
                            for (j = 0; j < s; j++) {
                                nums += cc[parseInt(data_sel[i][j], 10)];
                            }
                        }
                        if (isrx == 1) {//任选玩法：考虑选择的位置
                            nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 2);
                        }
                        break;
                    case 'ZU3BD':
                        nums = data_sel[0].length * 54;
                        break;
                    case 'ZU2BD':
                        nums = data_sel[0].length * 9;
                        break;
                    case 'BDW3':
                        for (i = 0; i <= max_place; i++) {
                            var s = data_sel[i].length;
                            if (s > 2) {//三码不定位必须选3位或者以上
                                nums += Combination(data_sel[i].length, 3);
                            }
                        }
                        break;
                    case 'BDW2'  :  //二码不定位
                    case 'ZU2'   :  //2位组选
                        for (i = 0; i <= max_place; i++) {
                            var s = data_sel[i].length;
                            if (s > 1) {//二码不定位必须选两位或者以上
                                nums += s * (s - 1) / 2;
                            }
                        }
                        if (isrx == 1) {//任选玩法：考虑选择的位置
                            nums *= $.lt_position_sel.length == 0 ? 0 : Combination($.lt_position_sel.length, 2);
                        }
                        break;
                    case 'DWD'  :   //定位胆所有在一起特殊处理
                        for (i = 0; i <= max_place; i++) {
                            nums += data_sel[i].length;
                        }
                        break;
                    //时时彩任选玩法
                    case 'RZX2'://任二直选
                    case 'RZX3'://任三直选
                    case 'RZX4'://任四直选
                        var aCodePosition = [];
                        for (i = 0; i <= max_place; i++) {
                            var codelen = data_sel[i].length;//指定位置上的号码长度
                            if (codelen > 0) {
                                aCodePosition.push(i);
                            }
                        }
                        var sellen = mname.substring(mname.length - 1);
                        var aPositionCombo = getCombination(aCodePosition, sellen);
                        var iComboLen = aPositionCombo.length;//组合个数
                        var aCombo = [];
                        var iLen = 0;
                        var tmpNums = 1;
                        for (j = 0; j < iComboLen; j++) {
                            aCombo = aPositionCombo[j].split(",");
                            iLen = aCombo.length;
                            tmpNums = 1;
                            for (h = 0; h < iLen; h++) {
                                tmpNums *= data_sel[aCombo[h]].length;
                            }
                            nums += tmpNums;
                        }
                        break;
                    case 'BJZ2':
                        for (i = 0; i <= max_place; i++) {
                            if (data_sel[i].length == 0) {//有位置上没有选择
                                tmp_nums = 0;
                                break;
                            }
                            tmp_nums = accMul(tmp_nums, data_sel[i].length);
                        }
                        nums = tmp_nums;
                        var len1 = data_sel[0].length;
                        var len2 = data_sel[1].length;
                        var same_nums = 0;
                        for (var i = 0; i < len1; i++) {
                            for (var j = 0; j < len2; j++) {
                                if (data_sel[0][i] == data_sel[1][j]) {
                                    same_nums++;
                                    break;
                                }
                            }
                        }
                        nums -= same_nums;
                        break;
                    case 'BJZ3':
                        var len1 = data_sel[0].length;
                        var len2 = data_sel[1].length;
                        var len3 = data_sel[2].length;
                        var nums = 0;
                        for (var i = 0; i < len1; i++) {
                            for (var j = 0; j < len2; j++) {
                                if (data_sel[0][i] == data_sel[1][j]) {
                                    continue;
                                }
                                for (var k = 0; k < len3; k++) {
                                    if (data_sel[0][i] == data_sel[2][k] || data_sel[1][j] == data_sel[2][k]) {
                                        continue;
                                    } else {
                                        nums++;
                                    }
                                }
                            }
                        }
                        break;
                    default     : //默认情况
                        for (i = 0; i <= max_place; i++) {
                            if (data_sel[i].length == 0) {//有位置上没有选择
                                tmp_nums = 0;
                                break;
                            }
                            tmp_nums = accMul(tmp_nums, data_sel[i].length);
                        }
                        nums = tmp_nums;
                        break;
                }
            }
            //03:计算金额
            var times = parseInt($($.lt_id_data.id_sel_times).val(), 10);
            if (isNaN(times)) {
                times = 1;
                $($.lt_id_data.id_sel_times).val(1);
            }
            var money = Math.round(times * nums * $.lt_price_unit * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;//倍数*注数*单价 * 模式
            money = isNaN(money) ? 0 : money;
            $($.lt_id_data.id_sel_num).html(nums);   //写入临时的注数
            $($.lt_id_data.id_sel_money).html(money);//写临时单笔价格
        }
        ;
        //重复号处理
//	var dumpNum = function(isdeal){
//	    var l   = data_sel[0].length;
//	    var err = [];
//	    var news= []; //除去重复号后的结果
//	    if( l == 0 ){
//		return err;
//	    }
//	    for( i=0; i<l; i++ ){
//		if( $.inArray(data_sel[0][i],err) != -1 ){
//		    continue;
//		}
//		for( j=i+1; j<l; j++ ){
//		    if( data_sel[0][i] == data_sel[0][j] ){
//			err.push(data_sel[0][i]);
//			break;
//		    }
//		}
//		news.push(data_sel[0][i]);
//	    }
//	    if( isdeal ){//如果是做删除重复号的处理
//		data_sel[0] = news;
//	    }
//	    return err;
//	};
        var dumpNum = function (isdeal) {
            var med = new Array();
            med = data_sel[0];//导入时中转变量
            var l = data_sel[0].length;
            var unique = {}, newer = [], err = []; // 不重复号码数组及重复的号码数组
            for (var i = 0; i < l; i++) {
                if (unique[data_sel[0][i]])
                    err.push(data_sel[0][i]);
                unique[data_sel[0][i]] = 1;
            }
            if (isdeal) { // 如果是做删除重复号的处理
                var j = 0;
                for (var k in unique) {
                    newer[j] = k;
                    j++;
                }
                data_sel[0] = newer;
            }
            if ($.import === 1) {//导入时记录重复注单
                $.import = '';
                data_sel[0] = med;
            }
            return err;
        }

        //输入框的字符串处理
        function _inptu_deal() {//all the original input in here
            var s = $.trim($("#lt_write_box", $(me)).val());
            quanjiao(s);
            function quanjiao(obj) {
                if (obj.length > 0) {
                    for (var i = obj.length - 1; i >= 0; i--) {
                        unicode = obj.charCodeAt(i);
                        if (unicode > 65280 && unicode < 65375) {
                            $.alert("不能输入全角字符，请输入半角字符");
                            s = obj.substr(0, i);
                        }
                    }
                }
            }
            s = $.trim(s.replace(/[^\s\r,;，；　０１２３４５６７８９0-9]/g, ""));
            var m = s;
            switch (methodname) {
                default:
                    s = s.replace(/[\s\r,;，；　]/g, "|").replace(/(\|)+/g, "|");
                    break;
            }
            s = s.replace(/０/g, "0").replace(/１/g, "1").replace(/２/g, "2").replace(/３/g, "3").replace(/４/g, "4").replace(/５/g, "5").replace(/６/g, "6").replace(/７/g, "7").replace(/８/g, "8").replace(/９/g, "9");
            if (s == "") {
                data_sel[0] = []; //清空数据
            } else {
                data_sel[0] = s.split("|");
            }
             return m;
        };

        /************************ 事件触发处理 ****************************/
        if (otype == 'input') {//手动输入型处理
            $("#lt_write_del", $(me)).click(function () {//删除重复号
                var err = dumpNum(true);
                if (err.length > 0) {//如果有重复号码
                    checkNum();
                    switch (methodname) {
                        default      :
                            $("#lt_write_box", $(me)).val(data_sel[0].join(" "));
                            $.alert('<div class="datainfo">' + lot_lang.am_s3 + '\r' + err.join(" ") + '\r&nbsp;</div>', '', '', 400);
                            break;
                    }
                } else {
                    $.alert(lot_lang.am_s4);
                }
            });
            $("#lt_write_import", $(me)).click(function () {//载入文件处理
                $.ajaxUploadUI({
                    title: lot_lang.dec_s27,
                    url: '/fileUpload/index.html', //服务端处理的文件
                    loadok: lot_lang.dec_s28,
                    filetype: ['txt', 'csv'], //允许载入的文件类型
                    success: function (data) {
                        $("#lt_write_box", $(me)).val(data).change();
                    }, //数据处理
                    onfinish: function (data) {
                        $.load = 1;
                        $.import = 1;//导入文件的标记
                        $($.lt_id_data.id_sel_insert).click();
                        $("#lt_write_box", $(me)).focus();
                        $.import = '';
                    }
                });
            });
            $("#lt_write_box", $(me)).change(function () {//输入框时时变动处理
                var s = _inptu_deal();
                $(this).val(s);
                checkNum();
            }).keyup(function () {
                _inptu_deal();
                checkNum();
            });
            $("#lt_write_empty", $(me)).click(function () {//清空处理
                data_sel[0] = []; //清空数据
                $("#lt_write_box", $(me)).val("");
                checkNum();
            });
        }

        //初始化选中号码
        function initSelectNum() {
            var gameId = $('#gameId').val();
            var blInit = $('#init_bet').val();
            var num1 = $('#init_1').val();
            var num2 = $('#init_2').val();
            var num3 = $('#init_3').val();
            var num4 = $('#init_4').val();
            var num5 = $('#init_5').val();
            var times = $('#init_times').val();
            var amount = $('#init_amount').val();
            try
            {
                $('#init_bet').val('false');
                //判断pk10是否有前三玩法
                if (gameId == 9 && $('#pk10Qian3').val() != 'true' && $('#pk10Qian3').val() != true) {
                    return;
                }
                if (blInit != 'true') {
                    return;
                }
                if (num1 != undefined) {
                    selectNum($('#wei_1_' + num1), true);
                }
                if (num2 != undefined) {
                    selectNum($('#wei_2_' + num2), true);
                }
                if (num3 != undefined) {
                    selectNum($('#wei_3_' + num3), true);
                }
                if (num4 != undefined) {
                    selectNum($('#wei_4_' + num4), true);
                }
                if (num5 != undefined) {
                    selectNum($('#wei_5_' + num5), true);
                }
                //checkNum();
                $($.lt_id_data.id_sel_times).val(times);
                $($.lt_id_data.id_sel_money).html(amount);
                $($.lt_id_data.id_sel_num).html(1);
            }catch(e){}
        }
        //选中号码处理
        function selectNum(obj, isButton) {
           try
           {
               if ($.trim($(obj).attr("class")) == 'on') {//如果本身是已选中，则不做任何处理
                   return;
               }
               $(obj).attr("class", "on");//样式改变为选中
               place = Number($(obj).attr("name").replace("lt_place_", ""));
               var number = $.trim($(obj).html());
               //替换号码中的无用字符
               number = number.replace(/\<span.*\<\/span>/gi, "").replace(/\r\n/gi, "");
               number = number.replace(/\<div.*>(.*)\<\/div>/gi, "$1").replace(/\r\n/gi, "");
               data_sel[place].push(number);//加入到数组中
               if (!isButton) {//如果不是按钮触发则进行统计，按钮的统一进行统计
                   var numlimit = parseInt($.lt_method_data.maxcodecount);
                   if (numlimit > 0) {
                       if (data_sel[place].length > numlimit) {
                           $.each($(obj).parent().find("div[name^='lt_place_']"), function (i, n) {
                               unSelectNum(n, false);
                           });
                           selectNum(obj, false);
                       }
                   }
                   checkNum();
               }
           }catch(e){}
        }
        //取消选中号码处理
        function unSelectNum(obj, isButton) {
            try
            {
                if ($.trim($(obj).attr("class")) != 'on') {//如果本身是未选中，则不做任何处理
                    return;
                }
                $(obj).attr("class", "");//样式改变为未选中
                place = Number($(obj).attr("name").replace("lt_place_", ""));
                var number = $.trim($(obj).html());
                data_sel[place] = $.grep(data_sel[place], function (n, i) {//从选中数组中删除取消的号码
                    return n == number;
                }, true);
                if (!isButton) {//如果不是按钮触发则进行统计，按钮的统一进行统计
                    checkNum();
                }
            }catch(e){}
        }
        //选择与取消号码选择交替变化
        function changeNoCss(obj) {
            if ($.trim($(obj).attr("class")) == 'on') {//如果本身是已选中，则做取消
                unSelectNum(obj, false);
            } else {
                selectNum(obj, false);
            }
        }
        //选择奇数号码
        function selectOdd(obj) {
            if (Number($(obj).html()) % 2 == 1) {
                selectNum(obj, true);
            } else {
                unSelectNum(obj, true);
            }
        }
        //选择偶数号码
        function selectEven(obj) {
            if (Number($(obj).html()) % 2 == 0) {
                selectNum(obj, true);
            } else {
                unSelectNum(obj, true);
            }
        }
        //选则大号
        function selectBig(i, obj) {
            if (i >= opts.noBigIndex) {
                selectNum(obj, true);
            } else {
                unSelectNum(obj, true);
            }
        }
        ;
        //选择小号
        function selectSmall(i, obj) {
            if (i < opts.noBigIndex) {
                selectNum(obj, true);
            } else {
                unSelectNum(obj, true);
            }
        }
        ;
         //选择随机
        function selectRandom() {
            var mname = $.lt_method[$.lt_method_data.methodid];//玩法的简写,如:'ZX3'
            var repeate = 1;
            var repeatetmp = [];
            if (otype == 'input') {//输入框形式的检测
                nums = parseInt(mname.charAt(mname.length - 1));
                switch (mname) {//根据玩法分类不同做不同处理
                    case 'ZUS'  :
                        repeate = 0;
                        nums = 2;
                        break;
                    case 'ZUL'  :
                        repeate = 0;
                        nums = 3;
                        break;
                    case 'HHZX' :
                        repeate = 0;
                        nums = 3;
                    case 'ZU2'  :
                        repeate = 0;
                        break;
                    case 'BJZ3' :
                        repeate = 0;
                        break;
                    case 'BJZ2' :
                        repeate = 0;
                        break;
                    default     : //默认情况
                        break;
                }
                var s = "";
                var repeatetmp = [];
                if (mname == 'ZUS') {
                    var tmp = Math.floor(2 * Math.random());
                }
                if (mname == 'HHZX') {
                    var tmp = Math.floor(3 * Math.random());
                }
                for (var j = 0; j < nums; j++) {
                    if (repeate == 0) {//号码不允许重复
                        if (mname == 'BJZ3' || mname == 'BJZ2') {
                            do {
                                var index = Math.floor(9 * Math.random() + 1);
                                if (!repeatetmp.contains(index)) {
                                    repeatetmp.push(index);
                                    break;
                                }
                            } while (1);
                        } else {
                            do {
                                var index = Math.floor(10 * Math.random());
                                if (!repeatetmp.contains(index)) {
                                    repeatetmp.push(index);
                                    break;
                                }
                            } while (1);
                        }
                    } else {
                        var index = Math.floor(10 * Math.random());
                    }
                    if (mname == 'BJZ3' || mname == 'BJZ2') {
                        s = s + 0 + index;
                    } else {
                        s = s + index;
                    }
                    if (mname == 'ZUS' && tmp == j) {
                        s = s + index;
                    }
                    if (mname == 'HHZX' && tmp == j && j == 1) {
                        s = s + index;
                        break;
                    }
                }
                data_sel[0] = s.split("|");
            } else {//其他选择号码形式[暂时就数字型和大小单双]
                $.each($("div[name^='lt_place_']"), function (i, n) {
                    unSelectNum(n, true);
                });
                var nums = max_place;
                var amin = [];
                switch (mname) {//根据玩法分类不同做不同处理
                    case 'WXZU120':
                        nums = 0;
                        amin[0] = 5;
                        break;
                    case 'WXZU60':
                        repeate = 0;
                        nums = 1;
                        amin[0] = 1;
                        amin[1] = 3;
                        break;
                    case 'WXZU30':
                        repeate = 0;
                        nums = 1;
                        amin[0] = 2;
                        amin[1] = 1;
                        break;
                    case 'WXZU10':
                    case 'WXZU5':
                    case 'SXZU4':
                        repeate = 0;
                        nums = 1;
                        amin[0] = 1;
                        amin[1] = 1;
                        break;
                    case 'SXZU24':
                        nums = 0;
                        amin[0] = 4;
                        break;
                    case 'SXZU6':
                        nums = 0;
                        amin[0] = 2;
                        break;
                    case 'WXZU20':
                    case 'SXZU12':
                        repeate = 0;
                        nums = 1;
                        amin[0] = 1;
                        amin[1] = 2;
                        break;
                    case 'ZUS'  :   //组三
                        nums = 0;
                        amin[0] = 2;
                        break;
                    case 'ZUL'  :   //组六
                        nums = 0;
                        amin[0] = 3;
                        break;
                    case 'BDW3':
                        nums = 0;
                        amin[0] = 3;
                        break;
                    case 'BDW2'  :  //二码不定位
                    case 'ZU2'   :  //2位组选
                        nums = 0;
                        amin[0] = 2;
                        break;
                    case 'DWD'  :   //定位胆所有在一起特殊处理
                        var weiNum = 5;//时时彩
                        if ($('#gameId').val() == 3) {
                            weiNum = 3;//时时乐
                        } else if ($('#gameId').val() == 3) {
                            weiNum = 3;//时时乐
                        } else if ($('#lotteryid').val() == 9) {
                            weiNum = 10;//pk10
                        } else if ($('#lotteryid').val() == 2) {
                            weiNum = 3;//排列三
                        } else if ($('#lotteryid').val() == 1) {
                            weiNum = 3;//福彩
                        }
                        var j = Math.ceil(Math.random() * 100) % weiNum;//随机一位
                        amin[j] = 1;//随机一注
                        break;
                    case 'RZX2'://任二直选
                    case 'RZX3'://任三直选
                    case 'RZX4'://任四直选
                        nums = 4;
                        for (var j = 0; j <= nums; j++) {
                            amin[j] = 1;
                        }
                        break;
                    default     : //默认情况,有多少位选择多少位
                        for (var j = 0; j <= nums; j++) {
                            amin[j] = 1;
                        }
                        break;
                }
                var repeatetmp = [];
                for (var j = 0; j <= nums; j++) {
                    var objs = $("div[name^='lt_place_" + j + "']");
                    for (var k = 0; k < amin[j]; k++) {
                        if (repeate == 0) {//号码不允许重复
                            do {
                                var index = Math.floor(objs.length * Math.random());
                                var robj = $(objs[index]);
                                var number = $.trim($(robj).html());
                                //替换号码中的无用字符
                                number = number.replace(/\<span.*\<\/span>/gi, "").replace(/\r\n/gi, "");
                                number = number.replace(/\<div.*>(.*)\<\/div>/gi, "$1").replace(/\r\n/gi, "");
                                if (!repeatetmp.contains(number)) {
                                    repeatetmp.push(number);
                                    break;
                                }
                            } while (true);
                        } else {
                            var index = Math.floor(objs.length * Math.random());
                        }
                        var robj = $(objs[index]);
                        selectNum(robj, true);
                        objs.splice(index, 1);
                    }
                }
            }
            checkNum();
            $($.lt_id_data.id_sel_insert).click();
        }
        var marksj = null;
        //随机一注
        $($.lt_id_data.id_random_one).unbind("click").click(function () {
            marksj = 1;
            var tmpnumber = $($.lt_id_data.id_sel_num).html();
            if (tmpnumber > 0) {
                $.confirm(lot_lang.am_s38, function () {
                    selectRandom();
                }, function () {
                    $($.lt_id_data.id_sel_insert).click();
                }, '', 350);
            } else {
                selectRandom();
            }
        });
        //随机五注
        $($.lt_id_data.id_random_five).unbind("click").click(function () {
            var tmpnumber = $($.lt_id_data.id_sel_num).html();
            if (tmpnumber > 0) {
                $.confirm(lot_lang.am_s38, function () {
                    for (var j = 0; j < 5; j++) {
                        marksj = 1;
                        selectRandom();
                    }
                }, function () {
                    $($.lt_id_data.id_sel_insert).click();
                }, '', 350);
            } else {
                for (var j = 0; j < 5; j++) {
                    marksj = 1;
                    selectRandom();
                }
            }
        });
        //设置号码事件
        $(this).find("div[name^='lt_place_']").click(function () {
            changeNoCss(this);
            $("li[class^='dxjoq']", $(this).closest("div[class='gd']")).attr("class", "dxjoq");
        });
        //全大小单双清按钮的动作行为处理
        if (opts.isButton == true || otype == 'dxds') {//如果有这几个按钮才做处理
            $("li[class='dxjoq']", $(this)).click(function () {//全大小基偶清
                $("li[class^='dxjoq']", $(this).parent()).attr("class", "dxjoq");
                $(this).attr("class", "dxjoq on");
                switch ($(this).attr('name')) {
                    case 'all'   :
                        $.each($(this).closest("div[class='gds']").find("div[name^='lt_place_']"), function (i, n) {
                            selectNum(n, true);
                        });
                        break;
                    case 'big'   :
                        $.each($(this).closest("div[class='gds']").find("div[name^='lt_place_']"), function (i, n) {
                            selectBig(i, n);
                        });
                        break;
                    case 'small' :
                        $.each($(this).closest("div[class='gds']").find("div[name^='lt_place_']"), function (i, n) {
                            selectSmall(i, n);
                        });
                        break;
                    case 'odd'   :
                        $.each($(this).closest("div[class='gds']").find("div[name^='lt_place_']"), function (i, n) {
                            selectOdd(n);
                        });
                        break;
                    case 'even'  :
                        $.each($(this).closest("div[class='gds']").find("div[name^='lt_place_']"), function (i, n) {
                            selectEven(n);
                        });
                        break;
                    case 'clean' :
                        $.each($(this).closest("div[class='gds']").find("div[name^='lt_place_']"), function (i, n) {
                            unSelectNum(n, true);
                        });
                    default :
                        break;
                }
                checkNum();
            });
        }
        //倍数输入处理事件
        $($.lt_id_data.id_sel_times).unbind("keyup").keyup(function () {
            var times = $(this).val().replace(/[^0-9]/g, "").substring(0, 5);
            if (times == "") {
                times = 0;
            } else {
                times = parseInt(times, 10);//取整倍数
            }
            var nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);//投注注数取整
            var modes = parseInt($($.lt_id_data.id_sel_modes).val(), 10);//投注模式
            var money = Math.round(times * nums * $.lt_price_unit * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;//倍数*注数*单价 * 模式
            money = isNaN(money) ? 0 : money;
            $($.lt_id_data.id_sel_money).html(money);
            $(this).val(times);
        });
        $($.lt_id_data.id_sel_times).nextAll("a").click(function () {
            $($.lt_id_data.id_sel_times).val($(this).html()).keyup();
        });
        //减少倍数
        $($.lt_id_data.id_reduce_times).unbind("click").click(function () {
            var times = Math.round(parseInt($($.lt_id_data.id_sel_times).val(), 10) - 1);
            if (times < 1) {
                times = 1;
            }
            $($.lt_id_data.id_sel_times).val(times).keyup();
        });
        //增加倍数
        $($.lt_id_data.id_plus_times).unbind("click").click(function () {
            var times = Math.round(parseInt($($.lt_id_data.id_sel_times).val(), 10) + 1);
            if (times > 99999) {
                times = 99999;
            }
            $($.lt_id_data.id_sel_times).val(times).keyup();
        });
        //模式变换处理事件
        $($.lt_id_data.id_sel_modes).change(function () {
            var nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);//投注注数取整
            var times = parseInt($($.lt_id_data.id_sel_times).val(), 10);//投注倍数取整
            var modes = parseInt($($.lt_id_data.id_sel_modes).val(), 10);//投注模式
            var money = Math.round(times * nums * $.lt_price_unit * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;//倍数*注数*单价 * 模式
            money = isNaN(money) ? 0 : money;
            $($.lt_id_data.id_sel_money).html(money);
        });

        //添加按钮
        $($.lt_id_data.id_sel_insert).unbind("click").click(function () {
            var nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);//投注注数取整
            var times = parseInt($($.lt_id_data.id_sel_times).val(), 10);//投注倍数取整
            var modes = parseInt($($.lt_id_data.id_sel_modes).val(), 10);//投注模式
            var money = Math.round(times * nums * $.lt_price_unit * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;//倍数*注数*单价 * 模式
            var mid = $.lt_method_data.methodid;
            var current_positionsel = $.lt_position_sel;//当前选择的位置
            var current_methodtitle = $.lt_method_data.title;//当前玩法组名称
            var current_methodname = $.lt_method_data.name;//当前玩法名称
            if (current_positionsel.length > 0 && $.lt_rxmode == true) {
                if (current_positionsel.length < $.lt_method_data.numcount) {
                    $.alert(lot_lang.am_s37.replace('%s', $.lt_method_data.numcount).replace("%m", current_methodtitle));
                    return;
                }
            }
            var cur_position = 0;//当前位置
            if (current_positionsel.length > 0) {
                $.each(current_positionsel, function (i, n) {
                    cur_position += Math.pow(2, 4 - parseInt(n, 10));
                });
            }
            if (isNaN(nums) || isNaN(times) || isNaN(money) || money <= 0) {//如果没有任何投注内容
                if (marksj == 1 && times !== 0) {
                    $($.lt_id_data.id_random_one).trigger("click");
                    return;
                } else {
                    $.load = '';
                    $.alert(otype == 'input' ? lot_lang.am_s29 : lot_lang.am_s19);//号码选择不完整
                    if ($.import === 1) {
                        $("#lt_write_empty").trigger('click');
                        $.import = '';
                    }
                    return;
                }
            }
            marksj = null;
            if (otype == 'input') {//如果是输入型，则检测号码合法性，以及是否存在重复号
                var mname = $.lt_method[mid];//玩法的简写,如:'ZX3'
                var error = [];
                var edump = [];
                var ermsg = "";
                //检测重复号，并除去重复号
                edump = dumpNum(true);
                if (edump.length > 0) {//有重复号

                    ermsg += lot_lang.em_s2 + '\n' + edump.join(", ") + '\r&nbsp;';
                    checkNum();//重新统计
                    nums = parseInt($($.lt_id_data.id_sel_num).html(), 10);//投注注数取整
                    money = Math.round(times * nums * $.lt_price_unit * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;//倍数*注数*单价*模式
                }
                switch (mname) {//根据类型不同做不同检测
                    case 'ZX5'  :
                        error = _inputCheck_Num(5, true);
                        break;
                    case 'ZX4'  :
                    case 'RZX4'  :
                        error = _inputCheck_Num(4, true);
                        break;
                    case 'ZX3'  :
                    case 'ZXDS3'  :
                    case 'RZX3'  :
                        error = _inputCheck_Num(3, true);
                        break;
                    case 'HHZX' :
                        error = _inputCheck_Num(3, true, _HHZXcheck, true);
                        break;
                    case 'ZX2'  :
                    case 'RZX2'  :
                        error = _inputCheck_Num(2, true);
                        break;
                    case 'ZU2'  :
                        error = _inputCheck_Num(2, true, _HHZXcheck, true);
                        break;
                    case 'ZUS'  :
                        error = _inputCheck_Num(3, true, _ZUSDScheck, true);
                        break;
                    case 'ZUL'  :
                        error = _inputCheck_Num(3, true, _ZULDScheck, true);
                        break;
                    case 'BJZ2':
                        error = _inputCheck_Num(4, true );
                        error = _pk10check(error);
                        break;
                    case 'BJZ3':
                        error = _inputCheck_Num(6, true);
                        error = _pk10check(error);
                        break;
                    default     :
                        break;
                }
                if (error.length > 0) {//如果存在错误的号码，则提示
                    ermsg += lot_lang.em_s1 + '\n' + error.join(", ") + '\r&nbsp;';
                }

                if (ermsg.length > 1) {
                    if ($.load !== 1) {
                        $.alert("<div class='datainfo'>" + ermsg + "</div>", '', '', 400);
                    } else {
                        if (edump.length > 0 && error.length > 0) {
                            $.alert("<div class='datainfo'>" + '以下等号码重复：' + edump.join(", ") + '<br/>以下等号码错误：' + error.join(", ") + "</div>", '', '', 400);
                        } else if (edump.length > 0 && error.length == 0) {
                            $.alert("<div class='datainfo'>" + '以下等号码重复：' + error.join(", ") + edump.join(", ") + "</div>", '', '', 400);
                        } else if (edump.length == 0 && error.length > 0) {
                            $.alert("<div class='datainfo'>" + '以下等号码错误：' + error.join(", ") + "</div>", '', '', 400);
                        }
                        var nostemp = $.lt_method_data.str;
                        var temptext ='';

                        for (i = 0; i < data_sel.length; i++) {
                            if (otype == 'input') {
                                nostemp = nostemp.replace('X', data_sel[i].sort(_SortNum).join("|"));
                            } else {
                                nostemp = nostemp.replace('X', data_sel[i].sort(_SortNum).join($.lt_method_data.sp.replace("s", " ")));
                            }
                           temptext += data_sel[i].sort(_SortNum).join(", ");
                        }
                        var result = [];
                        var temparr = temptext.split(', ');
                        temptext = '';
                        $.each(temparr, function(i,e) {
                            if ($.inArray(e, result) == -1) {
                                result.push(e);
                                temptext += e+', ';
                            }
                        });
                        var latestseltimes = $("#lt_sel_times").val();
                        var latesttimes = parseInt(result.length, 10);
                        if (isNaN(latesttimes)) {
                            latesttimes = 1;
                            $($.lt_id_data.id_sel_times).val(1);
                        }
                        var latestmoney = Math.round(latestseltimes  * result.length * $.lt_price_unit * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;//倍数*注数*单价 * 模式
                        latestmoney = isNaN(latestmoney) ? 0 : latestmoney;
                        $("#lt_write_box").val(temptext);
                        $($.lt_id_data.id_sel_num).html(result.length);
                        $($.lt_id_data.id_sel_money).html(latestmoney);
                        edump = dumpNum(true);
                    }
                }
            }
            if ($.load === 1) {
                $.load = '';
                return false;
            }
            var nos = $.lt_method_data.str;
            var nostext = '';
            var realvalue = '';
            var serverdata = "{'type':'" + otype + "','methodid':" + mid + ",'codes':'";
            var temp = [];
            for (i = 0; i < data_sel.length; i++) {
                if (otype == 'input') {
                    nos = nos.replace('X', data_sel[i].sort(_SortNum).join("|"));
                } else {
                    // nos = nos.replace('X', data_sel[i].sort(_SortNum).join($.lt_method_data.sp));
                    nos = nos.replace('X', data_sel[i].sort(_SortNum).join($.lt_method_data.sp.replace("s", " ")));
                }

                temp.push(data_sel[i].sort(_SortNum).join("&"));
            }


            $.each(temp, function( index, value ) {
                lot_lang.dec_s31 = '号码: '
                switch(mid){
                    case 17:
                    case 18:
                    case 39:
                    case 47:
                    case 55:
                    case 61:
                    case 89:
                    case 95:
                    case 106:
                    case 108:
                    case 123:
                    case 126:
                    case 129:
                    case 132:
                    case 134:
                    case 135:
                    case 140:
                    case 224:
                    case 226:
                    case 234:
                    case 1146:
                    case 1147:
                    case 1148:
                    case 1149:
                        switch(index){
                            case 0:
                                index = '号码';
                                lot_lang.dec_s31 = '';
                                break;
                        }
                    case 227:
                        switch(index){
                            case 0:
                                index  = '冠军';
                                break;
                            case 1:
                                index  = ' , 亚军';
                                break;
                            case 2:
                                index  = ' , 季军';
                                break;
                            case 3:
                                index  = ' , 第四名';
                                break;
                            case 4:
                                index  = ' , 第五名';
                                break;
                            case 5:
                                index  = ' , 第六名';
                                break;
                            case 6:
                                index  = ' , 第七名';
                                break;
                            case 7:
                                index  = ' , 第八名';
                                break;
                            case 8:
                                index  = ' , 第九名';
                                break;
                            case 9:
                                index  = ' , 第十名';
                                break;
                        }
                        break;
                    case 225:
                        switch(index){
                            case 0:
                                index  = '冠军';
                                break;
                            case 1:
                                index  = ' , 亚军';
                                break;
                            case 2:
                                index  = ' , 季军';
                                break;
                        }
                        break;
                    case 223:
                        switch(index){
                            case 0:
                                index  = '冠军';
                                break;
                            case 1:
                                index  = ' , 亚军';
                                break;
                        }
                        break;
                    case 222:
                        switch(index){
                            case 0:
                                index  = '冠军';
                                break;
                        }
                        break;
                    case 113:
                    case 114:
                    case 115:
                    case 116:
                    case 117:
                    case 118:
                    case 244:
                    case 245:
                    case 119:
                    case 120:
                    case 121:
                    case 242:
                    case 243:
                        switch(index){
                            case 0:
                                index  = '不定位';
                                break;
                        }
                        break;
                    case 109:
                        switch(index){
                            case 0:
                                index  = '十位';
                                break;
                            case 1:
                                index  = ', 个位';
                                break;
                        }
                        break;
                    case 11:
                    case 12:
                    case 13:
                    case 14:
                    case 46:
                    case 125:
                    case 231:
                    case 232:
                        switch(index){
                            case 0:
                                index  = '组选';
                                break;
                        }
                        break;
                    case 141:
                        switch(index){
                            case 0:
                                index  = '组选24';
                                break;
                        }
                        break;
                    case 142:
                        switch(index){
                            case 0:
                                index  = '二重号';
                                break;
                            case 1:
                                index  = ', 单号';
                                break;
                        }
                        break;
                    case 143:
                        switch(index){
                            case 0:
                                index  = '二重号';
                                break;
                        }
                        break;
                    case 144:
                        switch(index){
                            case 0:
                                index  = '三重号';
                                break;
                            case 1:
                                index  = ', 单号';
                                break;
                        }
                        break;
                    case 102:
                    case 68:
                        switch(index){
                            case 0:
                                index  = '特殊号';
                                break;
                        }
                        break;
                    case 101:
                    case 67:
                        switch(index){
                            case 0:
                                index  = '和值尾数';
                                break;
                        }
                        break;
                    case 99:
                    case 65:
                    case 49:
                        switch(index){
                            case 0:
                                index  = '包胆';
                                break;
                        }
                        break;
                    case 237:
                        switch(index){
                            case 0:
                                index  = '组六复式';
                                break;
                        }
                        break;
                    case 236:
                        switch(index){
                            case 0:
                                index  = '组三复式';
                                break;
                        }
                        break;
                    case 33:
                    case 34:
                        switch(index){
                            case 0:
                                index  = '一码';
                                break;
                        }
                        break;
                    case 35:
                    case 36:
                        switch(index){
                            case 0:
                                index  = '二码';
                                break;
                        }
                        break;
                    case 19:
                    case 25:
                    case 20:
                    case 26:
                    case 27:
                    case 28:
                    case 90:
                    case 97:
                    case 56:
                    case 63:
                    case 40:
                    case 48:
                    case 127:
                    case 124:
                    case 130:
                    case 137:
                    case 235:
                    case 238:
                    case 239:
                        switch(index){
                            case 0:
                                index  = '和值';
                                break;
                        }
                        break;
                    case 91:
                    case 57:
                    case 41:
                        switch(index){
                            case 0:
                                index  = '跨度';
                                break;
                        }
                        break;
                    case 23:
                    case 24:
                    case 94:
                    case 60:
                    case 133:
                        switch(index){
                            case 0:
                                index  = '组六';
                                break;
                        }
                        break;
                    case 93:
                    case 59:
                    case 22:
                    case 21:
                    case 131:
                        switch(index){
                            case 0:
                                index  = '组三';
                                break;
                        }
                        break;
                    case 9:
                    case 10:
                    case 31:
                    case 32:
                    case 230:
                    case 241:
                        switch(index){
                            case 0:
                                index  = '十位';
                                break;
                            case 1:
                                index  = ' , 个位';
                                break;
                        }
                        break;
                    case 7:
                    case 8:
                    case 10:
                    case 30:
                    case 29:
                    case 229:
                    case 240:
                        switch(index){
                            case 0:
                                index  = '百位';
                                break;
                            case 1:
                                index  = ' , 十位';
                                break;
                        }
                        break;
                    case 1:
                    case 2:
                    case 16:
                    case 110:
                    case 233:
                    case 228:
                    case 88:
                    case 15:
                    case 92:
                        switch(index){
                            case 0:
                                index  = '百位';
                                break;
                            case 1:
                                index  = ' , 十位';
                                break;
                            case 2:
                                index  = ' , 个位';
                                break;
                        }
                        break;
                    case 105:
                        switch(index){
                            case 0:
                                index  = '千位';
                                break;
                            case 1:
                                index  = ' , 百位';
                                break;
                            case 2:
                                index  = ' , 十位';
                                break;
                            case 3:
                                index  = ' , 个位';
                                break;
                        }
                        break;
                    default:
                        switch(index){
                            case 0:
                                index  = '万位';
                                break;
                            case 1:
                                index  = ' , 千位';
                                break;
                            case 2:
                                index  = ' , 百位';
                                break;
                            case 3:
                                index  = ' , 十位';
                                break;
                            case 4:
                                index  = ' , 个位';
                                break;
                        }
                        break;
                }

                if(value != '')
                {
                    realvalue = value;
                    nostext += ( index + ": (" + value + ")" );
                    nostext = nostext.replace(/&/g, ',');
                }
            });

            if((nostext.charAt(0) == ',') || (nostext.charAt(1) == ',')){
                nostext = nostext.substr(2);
            }

            if (nos.length > 40) {
                var nohtml = nos.substring(0, 37) + '...';
            } else {
                var nohtml = nos;
            }
            //判断是否有重复相同的单
            /*if ($.lt_same_code[mid] != undefined && $.lt_same_code[mid][modes] != undefined && $.lt_same_code[mid][modes][cur_position] != undefined && $.lt_same_code[mid][modes][cur_position].length > 0) {
             if ($.inArray(temp.join("|"), $.lt_same_code[mid][modes][cur_position]) != -1) {//存在相同的
             $.alert(lot_lang.am_s28);
             return false;
             }
             }*/
            //计算动态奖金返点
            var sel_isdy = false;
            var sel_prize = 0;
            var sel_point = 1;
            if ($.lt_method_data.dyprize.length == 1 && $.lt_isdyna == 1) {//支持动态返点
                if ($('#sliderSpanStart') == undefined) {
                    $.alert(lot_lang.am_s27);
                    return false;
                }
                var sel_dy = $('#sliderSpanStart').html();
                var selPrize = $('#sliderSpanEnd').html();
                sel_dy = sel_dy.split("%");
                if (sel_dy[0] == undefined) {
                    $.alert(lot_lang.am_s27);
                    return false;
                }
                sel_dy[0] = sel_dy[0] / 100;
                sel_isdy = true;
                //sel_prize = Math.round( Number(sel_dy[0]) * ($.lt_method_data.modes[modes].rate * 1000))/1000;
                sel_prize = selPrize;
                sel_point = Number(sel_dy[0]).toFixed(3);
            }
            noshtml = '[' + $.lt_method_data.title + '_' + $.lt_method_data.name + '] ' +'<br>'+ nostext;
            if ($.lt_method[mid] == 'DXDS') {//大小单双名字太长
                noshtml = '[' + $.lt_method_data.name + '] ' +'<br>'+ nostext;
            }

            switch(mid){
                case 68:
                case 102:
                    switch(realvalue){
                        case '豹子':
                            sel_prize  = sel_prize;
                            break;
                        case '顺子':
                            sel_prize  = shunPrize;
                            break;
                        case '对子':
                            sel_prize  = duiPrize;
                            break;
                        case '顺子&对子':
                            sel_prize  = shunPrize;
                            break;
                    }
                    break;
            }

            var myDate = new Date();
            var curTimes = myDate.getTime();
            if (current_positionsel.length > 0) {
                serverdata += temp.join("|") + "','nums':" + nums + ",'times':" + times + ",'money':" + money + ",'mode':" + modes + ",'point':'" + sel_point + "','desc':'" + noshtml + "','position':'" + current_positionsel.join("&") + "','curtimes':'" + curTimes + "'}";
            } else {
                serverdata += temp.join("|") + "','nums':" + nums + ",'times':" + times + ",'money':" + money + ",'mode':" + modes + ",'point':'" + sel_point + "','desc':'" + noshtml + "','curtimes':'" + curTimes + "'}";
            }
            //var cfhtml = '<tr style="cursor:pointer;"><td class="tl_li_l" width="4"><td>'+noshtml.substring(0,20)+'</td><td width=25>'+$.lt_method_data.modes[modes].name+'</td><td width=80 class="r">'+nums+lot_lang.dec_s1+'</td><td width=80 class="r">'+times+lot_lang.dec_s2+'</td><td width=120 class="r">'+money+lot_lang.dec_s3+'</td><td class="c" title="删除" width="16"><span class="xz_delete"></span><input type="hidden" name="lt_project[]" value="'+serverdata+'" /></td></tr>';
            var cfhtml = '<tr style="cursor:pointer;" class=""><td width="4" class="tl_li_l"></td><td><div style="max-width: 210px;overflow-x:auto;">' + noshtml + '</div></td><td width=15>' + $.lt_method_data.modes[modes].name + '</td><td width=80 class="r">' + nums + lot_lang.dec_s1 + '</td><td width=80 class="r">' + times + '</td><td width="120" class="r">' + sel_prize + '/' + (Math.ceil(sel_point * 1000) / 10) + '%</td><td width=120 class="r">' + money + lot_lang.dec_s3 + '</td><td class="c" width="50" title="删除"><span class="xz_delete"></span><input type="hidden" name="lt_project[]" value="' + serverdata + '" /></td></tr>';

            var $cfhtml = $(cfhtml);
            if ($.lt_total_nums == 0) {
                $($.lt_id_data.id_cf_content).children().empty();
            }
            $cfhtml.prependTo($.lt_id_data.id_cf_content);
            //详情查看
            $('td[class="tl_li_l"]', $cfhtml).parent().mouseover(function () {
                nohtml2=nohtml.substring(0,25);
                if(nohtml2.length == 25 ){
                    nohtml2 += '...';
                }
                var onlynostext = nostext;
                if(nostext.length>29){
                    onlynostext = nostext.substring(0, 29)+' . . .';
                }
                var $h = $('<div class=fbox><table><tr class=t><td class=tl></td><td class=tm></td><td class=tr></td></tr><tr class=mm><td class=ml><img src="' + _prefixURL.common + '/img/lottery/t.gif"></td><td>' + lot_lang.dec_s30 + ': ' + current_methodtitle + '_' + current_methodname + '<br/>' + lot_lang.dec_s31 +onlynostext + '<br/>' + lot_lang.dec_s32 + ': ' + $.lt_method_data.modes[modes].name + lot_lang.dec_s32 + (sel_isdy ? (', ' + lot_lang.dec_s33 + ' ' + sel_prize + ', ' + lot_lang.dec_s34 + ' ' + (Math.ceil(sel_point * 1000) / 10) + '%') : '') + '<br/><div class=in><span class=ic></span>  ' + lot_lang.dec_s35 + ' ' + nums + ' ' + lot_lang.dec_s1 + ', 每注金额 ' + times + ' ' + $.lt_method_data.modes[modes].name + ' <br/> ' + lot_lang.dec_s36 + ' ' + money + '' + lot_lang.dec_s3 + '</div></td><td class=mr><img src="' + _prefixURL.common + '/img/lottery/t.gif"></td></tr><tr class=b><td class=bl></td><td class=bm><img src="' + _prefixURL.common + '/img/lottery/t.gif"></td><td class=br></td></tr></table><div class=ar><div class=ic></div></div></div>');
                var offset = $(this).offset();
                var left = offset.left + 200;
                var top = offset.top - 79;
                $(this).openFloat($h, "more", left, top);
            }).mouseout(function () {
                $(this).closeFloat();
            }).click(function () {
                var aPositionTile = $.lt_position_title;
                var iPositionLen = current_positionsel.length;
                var positionname = "";
                if (iPositionLen > 0) {
                    positionname += "<br/>" + lot_lang.dec_s40;
                    for (var i = 0; i < iPositionLen; i++) {
                        positionname += aPositionTile[current_positionsel[i]];
                        if (i < iPositionLen - 1) {
                            positionname += "、";
                        }
                    }
                }
                var sss = '<h4 style="text-align:left;">' + lot_lang.dec_s30 + ': ' + current_methodtitle + '_' + current_methodname + positionname + '<br/>' + lot_lang.dec_s32 + ': ' + $.lt_method_data.modes[modes].name + lot_lang.dec_s32 + (sel_isdy ? (', ' + lot_lang.dec_s33 + ' ' + sel_prize + ', ' + lot_lang.dec_s34 + ' ' + (Math.ceil(sel_point * 1000) / 10) + '%') : '') + '<br/>' + lot_lang.dec_s35 + ' ' + nums + ' ' + lot_lang.dec_s1 + ', 每注金额 ' + times + ' ' + $.lt_method_data.modes[modes].name + ', ' + lot_lang.dec_s36 + ' ' + money + ' ' + lot_lang.dec_s3;
                var methodcode = $.lt_method[mid];//玩法的简写,如:'ZX3'
                var tmpcodenos = '';
                var dataheight = 60;
                switch (methodcode) {
                    case 'RZX2'://任二直选
                    case 'RZX3'://任三直选
                    case 'RZX4'://任四直选
                        if (otype == 'input') {
                            tmpcodenos = nos;
                            sss += '</h4>';
                        } else {
                            var aAllCode = nos.split(",");
                            var iCodeLen = aAllCode.length;
                            var len = 0;
                            var aCodePosition = [];
                            for (i = 0; i < iCodeLen; i++) {
                                len = aAllCode[i].length;//指定位置上的号码长度
                                if (len > 0) {
                                    aCodePosition.push(i);
                                }
                            }
                            var sellen = methodcode.substring(methodcode.length - 1);
                            var aPositionCombo = getCombination(aCodePosition, sellen);
                            var iComboLen = aPositionCombo.length;//组合个数
                            dataheight = iComboLen < 5 ? 60 : iComboLen * 15;
                            var aCombo = [];
                            var iLen = 0;
                            for (j = 0; j < iComboLen; j++) {
                                aCombo = aPositionCombo[j].split(",");
                                iLen = aCombo.length;
                                var tmpnum = "";
                                var tmptitle = "";
                                var tmpnums = 1;
                                for (h = 0; h < iLen; h++) {
                                    tmpnum += aAllCode[aCombo[h]];
                                    tmpnums *= aAllCode[aCombo[h]].length;
                                    tmptitle += aPositionTile[aCombo[h]];
                                    if (h < iLen - 1) {
                                        tmpnum += ",";
                                        tmptitle += "、";
                                    }
                                }
                                tmpcodenos += "[" + tmptitle + "]  " + tmpnum + "&nbsp;&nbsp;|&nbsp;&nbsp;" + tmpnums + lot_lang.dec_s1;
                                if (j < iComboLen - 1) {
                                    tmpcodenos += "<br>";
                                }
                            }
                            sss += ' , ' + lot_lang.dec_s36 + iComboLen + lot_lang.dec_s38;
                            sss += '<br><font color=red>' + lot_lang.dec_s39 + "</font></h4>";
                        }
                        break;
                    default:
                        sss += '</h4>';
                        tmpcodenos = nos;
                        break;
                }
                sss += '<div class="data" style="height:' + dataheight + 'px;"><table border=0 cellspacing=0 cellpadding=0><tr><td>' +  nostext + '</td></tr></table></div>';
                $.alert(sss, lot_lang.dec_s5, '', 450, false);
            });

            $.lt_total_nums += nums;//总注数增加
            $.lt_total_money += money;//总金额增加
            $.lt_total_money = Math.round($.lt_total_money * 1000) / 1000;//四舍五入为整数
            basemoney = Math.round(nums * $.lt_price_unit * times * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;//注数*单价 * 模式
            $.lt_trace_base = Math.round(($.lt_trace_base + basemoney) * 1000) / 1000;
            $($.lt_id_data.id_cf_num).html($.lt_total_nums);//更新总注数显示
            $($.lt_id_data.id_cf_money).html($.lt_total_money);//更新总金额显示
            $($.lt_id_data.id_cf_count).html(parseInt($($.lt_id_data.id_cf_count).html(), 10) + 1);//总投注项加1
            //计算奖金，并且判断是否支持利润率追号
            var pc = 0;
            var pz = 0;
            $.each($.lt_method_data.prize, function (i, n) {
                n = isNaN(Number(n)) ? 0 : Number(n);
                pz = pz > n ? pz : n;
                pc++;
            });
            if (pc != 1) {
                pz = 0;
            }
            pz = Math.round(pz * ($.lt_method_data.modes[modes].rate * 1000)) / 1000;
            pz = sel_isdy ? sel_prize : pz;
            var aPositionTile = $.lt_position_title;
            var iPositionLen = current_positionsel.length;
            var positiondesc = "";
            if (iPositionLen > 0) {
                for (var i = 0; i < iPositionLen; i++) {
                    positiondesc += aPositionTile[current_positionsel[i]];
                    if (i < iPositionLen - 1) {
                        positiondesc += "、";
                    }
                }
            }
            $cfhtml.data('data', {
                methodid: mid,
                methodname: $.lt_method_data.title + '_' + $.lt_method_data.name,
                nums: nums,
                money: money,
                modes: modes,
                position: cur_position,
                positiondesc: positiondesc,
                modename: $.lt_method_data.modes[modes].name,
                basemoney: basemoney,
                prize: pz,
                code: temp.join("|"),
                desc: nohtml,
                isrx: $.lt_method_data.isrx
            });
            //把投注内容记录到临时数组中，用于判断是否有重复
            if ($.lt_same_code[mid] == undefined) {
                $.lt_same_code[mid] = [];
            }
            if ($.lt_same_code[mid][modes] == undefined) {
                $.lt_same_code[mid][modes] = [];
            }
            if ($.lt_same_code[mid][modes][cur_position] == undefined) {
                $.lt_same_code[mid][modes][cur_position] = [];
            }
            $.lt_same_code[mid][modes][cur_position].push(temp.join("|"));
            $('td', $cfhtml).filter(".c").attr("title", lot_lang.dec_s24).click(function () {
                var n = $cfhtml.data('data').nums;
                var m = $cfhtml.data('data').money;
                var b = $cfhtml.data('data').basemoney;
                var c = $cfhtml.data('data').code;
                var d = $cfhtml.data('data').methodid;
                var f = $cfhtml.data('data').modes;
                var p = $cfhtml.data('data').position;
                var i = null;
                //移除临时数组中该投注内容，用于判断是否有重复
                $.each($.lt_same_code[d][f][p], function (k, code) {
                    if (code == c) {
                        i = k;
                    }
                });
                if (i != null) {
                    $.lt_same_code[d][f][p].splice(i, 1);
                } else {
                    $.alert(lot_lang.am_s27);
                    return;
                }
                $.lt_total_nums -= n;//总注数减少
                $.lt_total_money -= m;//总金额减少
                $.lt_total_money = Math.round($.lt_total_money * 1000) / 1000;
                $.lt_trace_base = Math.round(($.lt_trace_base - b) * 1000) / 1000;
                $(this).parent().remove();
                if ($.lt_total_nums == 0) {
                    if ($($.lt_id_data.id_tra_if).prop("checked") == true) {
                        $($.lt_id_data.id_tra_if).prop("checked", false);
                        $($.lt_id_data.id_tra_stop).attr("disabled", true).prop("checked", false);
                        $($.lt_id_data.id_tra_box).hide();
                    }
                    $('<tr class="nr"><td class="noinfo" align="center">暂无投注项</td></tr>').prependTo($.lt_id_data.id_cf_content);
                }
                $($.lt_id_data.id_cf_num).html($.lt_total_nums);//更新总注数显示
                $($.lt_id_data.id_cf_money).html($.lt_total_money);//更新总金额显示
                $($.lt_id_data.id_cf_count).html(parseInt($($.lt_id_data.id_cf_count).html(), 10) - 1);//总投注项减1
                cleanTraceIssue();//清空追号区数据
                if ($.lt_ismargin == false) {
                    traceCheckMarginSup();
                }
                //移除悬浮去
                $(this).parent().closeFloat();
                //如果有投注并且追号打开，则显示追号区。
                if ($($.lt_id_data.id_tra_if).prop("checked") == true) {
                    $("#lt_trace_times_margin").trigger('keyup')
                }
            });
            //把所选模式存入cookie里面
            SetCookie('modes', modes, 86400);
            SetCookie('dypoint', sel_point, 86400);
            //成功添加以后清空选号区数据
            for (i = 0; i < data_sel.length; i++) {//清空已选择数据
                data_sel[i] = [];
            }
            if (otype == 'input') {//清空所有显示的数据
                $("#lt_write_box", $(me)).val("");
            }
            else if (otype == 'digital' || otype == 'dxds' || otype == 'dds' || otype == 'digitalts') {
                $("div", $(me)).filter(".on").removeClass("on");
                $("li[class^='dxjoq']", $(me)).attr("class", "dxjoq");
            }
            //还原倍数为1倍
            //$($.lt_id_data.id_sel_times).val(1);
            checkNum();
            //清空追号区数据
            cleanTraceIssue();
            //根据已投注内容决定是否保留利润率追号
            if ($.lt_ismargin == true) {
                traceCheckMarginSup();
            }
            //如果有投注并且追号打开，则显示追号区。
            if ($($.lt_id_data.id_tra_if).prop("checked") == true) {
                $("#lt_trace_times_margin").trigger('keyup');
            }
        });
        ;
    };

    //追号区
    $.fn.lt_trace = function () {
        var t_type = 'margin';//追号形式[利润率:margin,同倍:same,翻倍:diff]
        $.extend({
            lt_trace_issue: 0, //总追号期数
            lt_trace_money: 0//总追号金额
        });
        var t_count = $.lt_issuecount;//可追号期数
        var currentendtime = new Date($.lt_end_time.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
        var t_nowpos = 0;//当前起始期在追号列表的位置[超过该位置的就不在处理,优化等待时间]
        //装载同倍、翻倍标签
        var htmllabel = '<span id="lt_margin" class="tab-front"><span class="tabbar-left"></span><span class="content">' + lot_lang.dec_s13 + '</span><span class="tabbar-right"></span></span>';
        htmllabel += '<span id="lt_sametime" class="tab-back"><span class="tabbar-left"></span><span class="content">' + lot_lang.dec_s10 + '</span><span class="tabbar-right"></span></span>';
        htmllabel += '<span id="lt_difftime" class="tab-back"><span class="tabbar-left"></span><span class="content">' + lot_lang.dec_s11 + '</span><span class="tabbar-right"></span></span>';
        var htmltext = '<span id="lt_margin_html">' + lot_lang.dec_s14 + '&nbsp;<input name="lt_trace_times_margin" type="text" id="lt_trace_times_margin" value="1" size="3" />&nbsp;&nbsp;' + lot_lang.dec_s29 + '&nbsp;<input name="lt_trace_margin" type="text" id="lt_trace_margin" value="50" size="3" />%&nbsp;&nbsp;</span>';
        htmltext += '<span id="lt_sametime_html" style="display:none;">' + lot_lang.dec_s14 + '&nbsp;<input name="lt_trace_times_same" type="text" id="lt_trace_times_same" value="1" size="3" /></span>';
        htmltext += '<span id="lt_difftime_html" style="display:none;">' + lot_lang.dec_s17 + '&nbsp;<input name="lt_trace_diff" type="text" id="lt_trace_diff" value="1" size="3" />&nbsp;' + lot_lang.dec_s18 + '&nbsp;&nbsp;' + lot_lang.dec_s2 + ' ' + lot_lang.dec_s19 + ' <input name="lt_trace_times_diff" type="text" id="lt_trace_times_diff" value="2" size="3" /></span>';
        htmltext += '&nbsp;&nbsp;' + lot_lang.dec_s15 + '&nbsp;<input name="lt_trace_count_input" type="text" id="lt_trace_count_input" style="width:36px" value="10" size="3" /><input type="hidden" id="lt_trace_money" name="lt_trace_money" value="0" /><input type="hidden" id="lt_trace_alcount" />';
        $(htmllabel).appendTo($.lt_id_data.id_tra_label);
        $(htmltext).appendTo($.lt_id_data.id_tra_lhtml);
        //装载可追号期数
        $($.lt_id_data.id_tra_alct).val(t_count);
        $('#lt_margin').click(function () {//利润率
            if ($(this).attr("class") != "tab-front") {
                $(this).attr("class", "tab-front");
                $('#lt_sametime').attr("class", "tab-back");
                $('#lt_difftime').attr("class", "tab-back");
                $('#lt_margin_html').show();
                $('#lt_sametime_html').hide();
                $('#lt_difftime_html').hide();
                t_type = 'margin';
                if ($($.lt_id_data.id_tra_if).prop("checked") == true) {//如果是选择了追号的情况才更新追号区
                    $($.lt_id_data.id_tra_ok).click();
                }
            }
        });
        $('#lt_sametime').click(function () {//同倍
            if ($(this).attr("class") != "tab-front") {
                $(this).attr("class", "tab-front");
                $('#lt_margin').attr("class", "tab-back");
                $('#lt_difftime').attr("class", "tab-back");
                $('#lt_margin_html').hide();
                $('#lt_sametime_html').show();
                $('#lt_difftime_html').hide();
                t_type = 'same';
                if ($($.lt_id_data.id_tra_if).prop("checked") == true) {//如果是选择了追号的情况才更新追号区
                    $($.lt_id_data.id_tra_ok).click();
                }
            }
        });
        $('#lt_difftime').click(function () {//翻倍
            if ($(this).attr("class") != "tab-front") {
                $(this).attr("class", "tab-front");
                $('#lt_margin').attr("class", "tab-back");
                $('#lt_sametime').attr("class", "tab-back");
                $('#lt_margin_html').hide();
                $('#lt_sametime_html').hide();
                $('#lt_difftime_html').show();
                t_type = 'diff';
                if ($($.lt_id_data.id_tra_if).prop("checked") == true) {//如果是选择了追号的情况才更新追号区
                    $($.lt_id_data.id_tra_ok).click();
                }
            }
        });
        var issueflag = false;

        function upTraceCount() {//更新追号总期数和总金额
            setTraceMsg();
            return;
            $('#lt_trace_count').html($.lt_trace_issue);

            if (parseInt($.lt_trace_issue, 10) == 0) {
                if (!issueflag) {
                    $("#lt_trace_qissueno").change();
                } else {
                    $("#lt_trace_count_input").val(0)
                }
            } else {
                $("#lt_trace_count_input").val($.lt_trace_issue);
            }
            $('#lt_trace_hmoney').html(JsRound($.lt_trace_money, 2, true));
            $('#lt_trace_money').val($.lt_trace_money);
        }

        $(document).on("change", "input[name^=lt_trace_times_]", function () {
            setTraceMsg();
        });

        //设置追号区的期数、总额，用来被调用
        function setTraceMsg() {
            var tmpInt = 0;
            var terr='';
            var totalMoney = 0.0;
            $("input[name^='lt_trace_issues']:checked", $($.lt_id_data.id_tra_issues)).each(function () {
                tmpInt += 1;
                if (Number($(this).closest("tr").find("input[name^='lt_trace_times_']").val()) <= 0) {
                    terr += $(this).val() + '&nbsp;&nbsp;';
                }

                var tmpMoney = $(this).closest("tr").find("span[id^='lt_trace_money_']").html();
                if (tmpMoney != null && tmpMoney != undefined && tmpMoney != '') {
                    totalMoney = _common.util.Math_add(totalMoney, parseFloat(tmpMoney));
                }
            });

            /*$("#lt_trace_count_input").val(tmpInt);//设置追号期数
             $("#lt_trace_count").html(tmpInt);//设置追号期数
             $("#lt_trace_hmoney").html(totalMoney);//设置追号总金额*/
            //alert('统计的期数:'+tmpInt+':总额:'+totalMoney);
            //
            $.lt_trace_issue = tmpInt;

            $.lt_trace_money = totalMoney;
            $('#lt_trace_count').html($.lt_trace_issue);

            if (parseInt($.lt_trace_issue, 10) == 0) {
                if (!issueflag) {
                    $("#lt_trace_qissueno").change();
                } else {
                    $("#lt_trace_count_input").val(0)
                }
            } else {
                $("#lt_trace_count_input").val($.lt_trace_issue);
            }
            $('#lt_trace_hmoney').html(JsRound($.lt_trace_money, 2, true));
            $('#lt_trace_money').val($.lt_trace_money);
        }

        //标签内的输入框键盘事件
        $("input", $($.lt_id_data.id_tra_lhtml)).keyup(function () {
            $(this).val(Number($(this).val().replace(/[^0-9]/g, "0")));
        });
        //追号期快捷选择事件
        $("#lt_trace_qissueno").change(function () {
            var t = 0;
            if ($(this).val() == 'all') {//全部可追号奖期
                t = parseInt($($.lt_id_data.id_tra_alct).val(), 10);
            } else {
                t = parseInt($(this).val(), 10);
            }
            t = isNaN(t) ? 0 : t;
            $("#lt_trace_count_input").val(t);
            $($.lt_id_data.id_tra_ok).click();
        });
        //装载追号的期号列表
        var issueshtml = '<table width="100%" cellspacing=0 cellpadding=0 border=0 id="lt_trace_issues_table">';
        var endtime = 0;
        var m = 0;
        var txtCur = '';
        $.each($.lt_issues, function (i, n) {
            endtime = new Date(n.endtime.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
            if (m < t_count && endtime >= currentendtime) {
                m++;
                txtCur = (m == 1) ? '(当前期)' : '';
                issueshtml += '<tr id="tr_trace_' + n.issue + '" class="on"><td class="r1"><input type="checkbox" name="lt_trace_issues[]" value="' + n.issue + '" /></td><td>' + n.issue + txtCur + '</td><td class="nosel"><input name="lt_trace_times_' + n.issue + '" type="text" class="r2" value="0" disabled/>' + lot_lang.dec_s2 + '</td><td>' + lot_lang.dec_s20 + '<span id="lt_trace_money_' + n.issue + '">0.00</span></td><td>' + n.endtime + '</td></tr>';
            }
        });
        issueshtml += '</table>';
        $(issueshtml).appendTo($.lt_id_data.id_tra_issues);
        function changeIssueCheck(obj) {//选中或者取消某期
            var money = $.lt_trace_base;
            var $j = $(obj).closest("tr");
            var lttracetimesdiff = $("#lt_trace_times_diff").val();
            var lttracediff = parseInt($("#lt_trace_diff").val(), 10);
            if ($(obj).is(':checked') == true){//选中
                var listItem = $("input[name='lt_trace_issues[]']");
                var index = listItem.index($(obj));
                var preval = listItem.eq(index - 1).val();
                var curval = listItem.eq(index).val();
                if (t_type == 'diff') {
                    if (curval > preval) {
                        for(var i=1;i<=lttracediff;i++){
                            var prethisval = listItem.eq(index - i).val();
                            if($('input[name=lt_trace_times_' + prethisval + ']').val()!= $('input[name=lt_trace_times_' + listItem.eq(index - 1).val() + ']').val()){
                                var preval2 = $('input[name=lt_trace_times_' + listItem.eq(index - 1).val() + ']').val()/lttracetimesdiff;
                            }else {
                                var preval2 = $('input[name=lt_trace_times_' + preval + ']').val();
                            }
                        }
                    }
                    else {
                        var preval2 = 1;
                    }

                    var nextval = preval2 * lttracetimesdiff;
                    money = nextval * basemoney;

                }else {
                    var tracetimessame = $("#lt_trace_times_same").val();
                    var nextval = tracetimessame;
                    money = nextval * basemoney;
                }
                $j.find("input[name^='lt_trace_times_']").val(nextval).attr("disabled", false).data("times", 1);
                $j.find("span[id='lt_trace_money_" + curval + "']").html(JsRound(money, 2, true));
                $.lt_trace_issue++;
                $.lt_trace_money += money;
                $(obj).attr('class', 'on');
            } else {  //取消选中
                var t = $j.find("input[name^='lt_trace_times_']").val();
                $j.find("input[name^='lt_trace_times_']").val(0).attr("disabled", true).data("times", 0);
                $j.find("span[id^='lt_trace_money_']").html('0.00');
                $.lt_trace_issue--;
                $.lt_trace_money -= money * parseInt(t, 10);
                if ($.lt_trace_issue == 0) {
                    issueflag = true;
                }
            }
            $.lt_trace_money = JsRound($.lt_trace_money, 2);
            upTraceCount();
        }
        var tracecountinput = $("#lt_trace_count_input").val();
        $("#lt_trace_count_input").on("keyup", function (value) {//手动输入追号期数
            checkinput('#lt_trace_count_input',tracecountinput,value);
            $($.lt_id_data.id_tra_ok).click();
        });
        $("#lt_trace_times_margin").on("keyup", function () {//利润率追号起始倍数
            $($.lt_id_data.id_tra_ok).click();
        });
        $.handCli = '';//用户点击标志
        $("#lt_trace_margin").on("keyup", function () {//利润率
            $.handCli = 1;
            $($.lt_id_data.id_tra_ok).click();
        });

        function checkinput(idinput,idval,value){
            if((value.keyCode == 8 ) && ($(idinput).val().length ==1 )){
                $(idinput).val(idval);
                value.preventDefault();
            }
            if ($.inArray(value.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 ||
                (value.keyCode === 65 && (value.ctrlKey === true || value.metaKey === true)) ||
                (value.keyCode >= 35 && value.keyCode <= 40)) {
                return;
            }
            if ((value.shiftKey || (value.keyCode < 48 || value.keyCode > 57)) && (value.keyCode < 96 || value.keyCode > 105 )) {
                $(idinput).val(idval);
                value.preventDefault();
            }
            if((value.key <1 ) && ($(idinput).val().length ==1 )){
                $(idinput).val(idval);
                value.preventDefault();
            }
        }

        var tracetimessame = $("#lt_trace_times_same").val();
        $("#lt_trace_times_same").on("keyup", function (value) {//同倍追号
            checkinput('#lt_trace_times_same',tracetimessame,value);
            $($.lt_id_data.id_tra_ok).click();
        });
        var tracediff = $("#lt_trace_diff").val();
        $("#lt_trace_diff").on("keyup", function (value) {//翻倍追号
            checkinput('#lt_trace_diff',tracediff,value);
            $($.lt_id_data.id_tra_ok).click();
        });
        var tracetimesdiff = $("#lt_trace_times_diff").val();
        $("#lt_trace_times_diff").on("keyup", function (value) {//翻倍追号
            checkinput('#lt_trace_times_diff',tracetimesdiff,value);
            $($.lt_id_data.id_tra_ok).click();
        });
        $("input[name^='lt_trace_times_']", $($.lt_id_data.id_tra_issues)).on("keyup", function () {//每期的倍数变动
            var v = Number($(this).val().replace(/[^0-9]/g, "0"));
            v = (v == 0) ? 1 : v;//不能为0，否则出错
            $(this).val(v);
            $.lt_trace_money += $.lt_trace_base * (v - $(this).data('times'));
            upTraceCount();
            $(this).val(v).data("times", v);
            $(this).closest("tr").find("span[id^='lt_trace_money_']").html(JsRound($.lt_trace_base * v, 2, true));
            $(this).change();
        });
        /*$(":checkbox",$.lt_id_data.id_tra_issues).on("click",function(){//取消与选择某期,重复，已不用
         changeIssueCheck(this);
         stopPropagation();
         });*/
        $("tr", $($.lt_id_data.id_tra_issues)).on("mouseover", function () {
            $(this).attr("class", "hv");
        }).on("mouseout", function () {
            if ($(this).find(":checkbox").is(':checked') == false) {
                $(this).removeClass("hv");
            } else { //选中
                $(this).attr("class", "on");
            }
        }).on("click", function () {
            /*if( $(this).find(":checkbox").is(':checked') == false ){ // 福体彩不用
             $(this).find(":checkbox").prop("checked",true);
             }else{
             $(this).find(":checkbox").prop("checked",false);
             }*/
//	    changeIssueCheck($(this).find(":checkbox"));
        });
        $("input[name='lt_trace_issues[]']").on("click", function () {
            changeIssueCheck($(this));
        });
        $("input[name^='lt_trace_times_']", $($.lt_id_data.id_tra_issues)).on("click", function () {
            return false;
        });
        var _initTraceByIssue = function () {//根据起始期的不同重新加载追号区
            var st_issue = $("#lt_issue_start").val();
            cleanTraceIssue();//清空追号方案
            var isshow = false;//是否已经开始显示
            var acount = 0;//不可追号期统计
            var loop = 0;//循环次数
            var mins = t_nowpos;//开始处理的位置[初始为上次变更的位置]
            var maxe = t_nowpos;//结束处理的位置[初始为上次变更的位置]
            var endtime = 0;
            var k = 0;
            var currentendtime = new Date($.lt_end_time.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
            $.each($.lt_issues, function (i, n) {
                endtime = new Date(n.endtime.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
                if (k < $.lt_issuecount && endtime >= currentendtime) {
                    k++;
                    loop++;
                    if (isshow == false && st_issue == n.issue) {//如果选择的期数为当前期，则开始显示
                        isshow = true;
                    }
                    if (isshow == false) {
                        acount++;
                        maxe = Math.max(maxe, acount);//取最大的位置
                    } else {
                        mins = Math.min(mins, acount);//取最小位置
                    }
                    if (loop >= mins && loop <= maxe) {//如果没有超过要处理的最大数，则继续处理
                        if (isshow == true) {//显示
                            $("#tr_trace_" + n.issue, $($.lt_id_data.id_tra_issues)).show();
                        } else {//隐藏
                            $("#tr_trace_" + n.issue, $($.lt_id_data.id_tra_issues)).hide();
                        }
                    }
                    if (loop > maxe) {//超过则退出不再处理
                        return false;
                    }
                }
            });
            //更新可追号期数
            t_count = $.lt_issuecount - acount;
            if ($("#lt_trace_qissueno").val() == 'all') {
                $("#lt_trace_count_input").val(t_count);
            }
            t_nowpos = acount;
            $($.lt_id_data.id_tra_alct).val(t_count);
            //更新追号总期数和总金额
            $.lt_trace_issue = 0;
            $.lt_trace_money = 0;
            upTraceCount();
        };
        //起始期变动对追号区的影响
        /*$("#lt_issue_start").change(function(){
         if( $($.lt_id_data.id_tra_if).prop("checked") == true ){//如果是选择了追号的情况才更新追号区
         _initTraceByIssue();
         }
         });*/
        //是否追号选择处理
        //点击追号开关
        $($.lt_id_data.id_tra_if).prop("checked", false).click(function () {
            $("input[name='lt_trace_issues[]']").on("click", function () {
                changeIssueCheck($(this));
            });
            if ($(this).prop("checked") == true) {
                //检测是否有投注内容
                if ($.lt_total_nums <= 0) {
                    $.alert(lot_lang.am_s7);
                    $(this).attr("checked", false);
                    return;
                }
                $($.lt_id_data.id_tra_stop).attr("disabled", false).prop("checked", true);
                $($.lt_id_data.id_tra_box).show();
                _initTraceByIssue();
                $('html,body').animate({scrollTop: $('#lt_trace_issues').offset().top}, 1000);
            } else {
                $($.lt_id_data.id_tra_stop).attr("disabled", true).prop("checked", false);
                $($.lt_id_data.id_tra_box).hide();
            }
        });
        //下注情况信息显示
//        $($.lt_id_data.id_bet_con).click(function (){
//            if($($.lt_id_data.id_bet_box).css('display')!='block'){
////                $($.lt_id_data.id_bet_box).show();
//                $.ajax({
//                    type: 'GET',
//		    url : '/game/getUserPeriod.html',
//                    dataType :'json',
//		    success : function(data){//成功
//		    }
//                });
//            }else{
//                $($.lt_id_data.id_bet_box).hide();
//            }
//        });

        //根据利润率计算当期需要的倍数[起始倍数，利润率，单倍购买金额，历史购买金额，单倍奖金],返回倍数
        var computeByMargin = function (s, m, b, o, p) {
            s = s ? parseInt(s, 10) : 0;
            m = m ? parseInt(m, 10) : 0;
            b = b ? Number(b) : 0;
            o = o ? Number(o) : 0;
            p = p ? Number(p) : 0;
            p = p * $.lt_price_unit;
            var t = 0;
            if (b > 0) {
                if (m > 0) {
                    t = Math.ceil(((m / 100 + 1) * o) / (p - (b * (m / 100 + 1))));
                } else {//无利润率
                    t = 1;
                }
                if (t < s) {//如果最小倍数小于起始倍数，则使用起始倍数
                    t = s;
                }
            }
            return t;
        };
        //立即生成按钮
        var e1 = '';
        $($.lt_id_data.id_tra_ok).click(function () {
            var c = parseInt($.lt_total_nums, 10);//总投注注数
            if (c <= 0) {//无投注内容
                $.alert(lot_lang.am_s7);
                return false;
            }
            var p = 0;//奖金
            if (t_type == 'margin') {//如果为利润率追号则首先检测是否支持
                var marmt = 0;
                var marmd = 0;
                var martype = 0;//利润率支持情况，0:支持,1:玩法不支持，2:多玩法，3:多圆角模式
                $.each($('tr', $($.lt_id_data.id_cf_content)), function (i, n) {
                    if (marmt != 0 && marmt != $(n).data('data').methodid) {
                        martype = 2;
                        return false;
                    } else {
                        marmt = $(n).data('data').methodid;
                    }
                    if (marmd != 0 && marmd != $(n).data('data').modes) {
                        martype = 3;
                        return false;
                    } else {
                        marmd = $(n).data('data').modes;
                    }
                    if ($(n).data('data').prize <= 0 || (p != 0 && p != $(n).data('data').prize)) {
                        martype = 1;
                        return false;
                    } else {
                        p = $(n).data('data').prize;
                    }
                });

                if (martype == 1) {
                    $.alert(lot_lang.am_s32);
                    return false;
                } else if (martype == 2) {
                    $.alert(lot_lang.am_s31);
                    return false;
                } else if (martype == 3) {
                    $.alert(lot_lang.am_s33);
                    return false;
                }
            }

            var ic = parseInt($("#lt_trace_count_input").val(), 10);//追号总期数

            ic = isNaN(ic) ? 0 : ic;
            if (ic < 0) {//期数没有填
                $.alert(lot_lang.am_s8);
                return false;
            }
            if (ic > $.lt_issuecount) {//超过可追号期数
                $.alert(lot_lang.am_s9, '', '', 300);
                return false;
            }

            var times = parseInt($("#lt_trace_times_" + t_type).val(), 10);//倍数，当前追号方式里的倍数
            times = isNaN(times) ? 0 : times;
            if (times <= 0) {
                $.alert(lot_lang.am_s10);
                return false;
            }
            times = isNaN(times) ? 0 : times;
            var td = [];//根据用户填写的条件生成的每期数据
            var tm = 0;//生成后的总金额
            var msg = '';//提示信息
            if (t_type == 'same') {
                var m = $.lt_trace_base * times;//每期金额
                tm = accMul(m, ic);//总金额=每期金额*期数
                for (var i = 0; i < ic; i++) {
                    td.push({
                        times: times,
                        money: m
                    });
                }
                msg = lot_lang.am_s12.replace("[times]", times);
            } else if (t_type == 'diff') {
                var d = parseInt($("#lt_trace_diff").val(), 10);//相隔期数
                d = isNaN(d) ? 0 : d;
                if (d <= 0) {
                    $.alert(lot_lang.am_s11);
                    return false;
                }
                var m = $.lt_trace_base;//每期金额的初始值
                var t = 1;//起始倍数为1
                for (var i = 0; i < ic; i++) {
                    if (i != 0 && (i % d) == 0) {
                        t = accMul(t, times);
                    }
                    td.push({
                        times: t,
                        money: accMul(m, t)
                    });
                    tm = _common.util.Math_add(tm, accMul(m, t));
                }
                msg = lot_lang.am_s13.replace("[step]", d).replace("[times]", times);
            } else if (t_type == 'margin') {//利润追号
                var e = parseInt($("#lt_trace_margin").val(), 10);//最低利润率
                e = isNaN(e) ? 0 : e;
                if (parseInt(e) <= 0) {
                    $.alert(lot_lang.am_s30);//利润率错误
                    return false;
                }
                var m = $.lt_trace_base;//每期金额的初始值
                if (0 >= ((p * 100 / m) - 100)) {
                    $.lt_ismargin = false;
                    $("#lt_margin").hide();
                    $("#lt_margin_html").hide();
                    $('#lt_sametime').click();
                    return;
                }
                //TODO
                if (e > ((p * 100 / m) - 100)) {//p,奖金
                    if ($.handCli === 1) {
                        $.handCli = '';
                        $("#lt_trace_margin").val(e1);
                        $.alert(lot_lang.am_s30);
                        return false;
                    }
                    e = Math.floor((p * 100 / m) - 100);
                    $("#lt_trace_margin").val(e);
                }
                e1 = e;
                var trlen = $("#lt_cf_content tbody tr").length;
                var zharr = new Array();
                if (trlen > 1) {
                    for (var i = 0; i < trlen; i++) {
                        var ew = $('#lt_cf_content tbody tr:eq(' + i + ') td:eq(1)').html();
                        zharr[i] = ew;
                        if (zharr[i - 1] && zharr[i - 1] !== zharr[i]) {
                            var markdiff = 1;
                        }
                    }
                    if (!markdiff) {
                        p = p * trlen;
                    }
                }
                var t = 0;//返回的倍数

                p = accMul(p, accDiv(basemoney, $.lt_price_unit));
                for (var i = 0; i < ic; i++) {
                    t = computeByMargin(times, e, m, tm, p);
                    td.push({
                        times: t,
                        money: accMul(m, t)
                    });
                    tm = _common.util.Math_add(tm, accMul(m, t));
                }
                msg = lot_lang.am_s34.replace("[margin]", e).replace("[times]", times);
            }
            msg += lot_lang.am_s14.replace("[count]", ic);
            msg = lot_lang.am_s99.replace("[msg]", msg);
            //$.confirm(msg,function(){
            cleanTraceIssue();//清空以前的追号方案
            var $s = $("tr:visible", $($.lt_id_data.id_tra_issues));
            for (i = 0; i < ic; i++) {
                $($s[i]).find(":checkbox").prop("checked", true);
                $($s[i]).find("input[name^='lt_trace_times_']").val(td[i].times).attr("disabled", false).data("times", td[i].times);
                $($s[i]).find("span[id^='lt_trace_money_']").html(JsRound(td[i].money, 2, true));
                $($s[i]).addClass("on");
            }
            $.lt_trace_issue = ic;
            $.lt_trace_money = tm;
            upTraceCount();
            //},'','',350);
        });
    }

    //清空追号方案
    var cleanTraceIssue = function () {
        $("input[name^='lt_trace_issues']", $($.lt_id_data.id_tra_issues)).attr("checked", false);
        $("input[name^='lt_trace_times_']", $($.lt_id_data.id_tra_issues)).val(0).attr("disabled", true);
        $("span[id^='lt_trace_money_']", $($.lt_id_data.id_tra_issues)).html('0.00');
        $("tr", $($.lt_id_data.id_tra_issues)).removeClass("on");
        $('#lt_trace_hmoney').html(0);
        $('#lt_trace_money').val(0);
        $('#lt_trace_count').html(0);
        $.lt_trace_issue = 0;
        $.lt_trace_money = 0;
    };

    var bindSetTraceMsg = function () {
        $("input[name^='lt_trace_times_']", $($.lt_id_data.id_tra_issues)).on("keyup", function () {//每期的倍数变动
            var v = Number($(this).val().replace(/[^0-9]/g, "0"));
            $.lt_trace_money += $.lt_trace_base * (v - $(this).data('times'));
            setTraceMsg2();
            $(this).val(v).data("times", v);
            $(this).closest("tr").find("span[id^='lt_trace_money_']").html(JsRound($.lt_trace_base * v, 2, true));
        });

        $("input[name^=lt_trace_times_]").change(function () {
            setTraceMsg2();
        });
    }

    var setTraceMsg2 = function () {
        var tmpInt = 0;
        var totalMoney = 0.0;
        $("input[name^='lt_trace_issues']:checked", $($.lt_id_data.id_tra_issues)).each(function () {
            tmpInt += 1;
            if (Number($(this).closest("tr").find("input[name^='lt_trace_times_']").val()) <= 0) {
                terr += $(this).val() + '&nbsp;&nbsp;';
            }

            var tmpMoney = $(this).closest("tr").find("span[id^='lt_trace_money_']").html();
            if (tmpMoney != null && tmpMoney != undefined && tmpMoney != '') {
                totalMoney = _common.util.Math_add(totalMoney, parseFloat(tmpMoney));
            }
        });

        /*$("#lt_trace_count_input").val(tmpInt);//设置追号期数
         $("#lt_trace_count").html(tmpInt);//设置追号期数
         $("#lt_trace_hmoney").html(totalMoney);//设置追号总金额*/
        //alert('统计的期数:'+tmpInt+':总额:'+totalMoney);
        //
        $.lt_trace_issue = tmpInt;
        $.lt_trace_money = totalMoney;
        $('#lt_trace_count').html($.lt_trace_issue);
        if (parseInt($.lt_trace_issue, 10) == 0) {
            if (!issueflag) {
                $("#lt_trace_qissueno").change();
            } else {
                $("#lt_trace_count_input").val(0)
            }
        } else {
            $("#lt_trace_count_input").val($.lt_trace_issue);
        }
        $('#lt_trace_hmoney').html(JsRound($.lt_trace_money, 2, true));
        $('#lt_trace_money').val($.lt_trace_money);
    }

    //根据投注内容决定是否保留利润率追号方式
    var traceCheckMarginSup = function () {
        var marmt = 0;
        var marmd = 0;
        var martype = 0;//利润率支持情况，0:支持,1:玩法不支持，2:多玩法，3:多圆角模式
        var p = 0;//奖金
        if ($.lt_total_nums > 0) {
            $.each($('tr', $($.lt_id_data.id_cf_content)), function (i, n) {
                if (marmt != 0 && marmt != $(n).data('data').methodid) {
                    martype = 2;
                    return false;
                } else {
                    marmt = $(n).data('data').methodid;
                }
                if (marmd != 0 && marmd != $(n).data('data').modes) {
                    martype = 3;
                    return false;
                } else {
                    marmd = $(n).data('data').modes;
                }
                if ($(n).data('data').prize <= 0 || (p != 0 && p != $(n).data('data').prize) || $(n).data('data').isrx == 1) {
                    martype = 1;
                    return false;
                } else {
                    p = $(n).data('data').prize;
                }
            });
        }
        // if (martype > 0)
        if (1==1) {//不支持利润率追号
            $.lt_ismargin = false;
            //隐藏利润率追号方式[默认为同倍追号]
            $("#lt_margin").hide();
            $("#lt_margin_html").hide();
            $('#lt_sametime').click();

        }
        else {
            $.lt_ismargin = true;
            //显示利润率追号方式[默认为利润率追号]
            $("#lt_margin").show();
            $("#lt_margin_html").show();
            $('#lt_margin').click();
        }
        return true;
    }

    //倒计时
    $.fn.lt_timer = function (start, end) {//服务器开始时间，服务器结束时间
        var me = this;
        if (start == "" || end == "") {
            $.lt_time_leave = 0;
        } else {
            $.lt_time_leave = (format(end).getTime() - format(start).getTime()) / 1000;//总秒数
        }
        function fftime(n) {
            return Number(n) < 10 ? "" + 0 + Number(n) : Number(n);
        }

        function format(dateStr) {//格式化时间
            return new Date(dateStr.replace(/[\-\u4e00-\u9fa5]/g, "/"));
        }
        function diff(t) {//根据时间差返回相隔时间
            return t > 0 ? {
                    day: Math.floor(t / 86400),
                    hour: Math.floor(t / 3600),
                    minute: Math.floor(t % 3600 / 60),
                    second: Math.floor(t % 60)
                } : {
                    day: 0,
                    hour: 0,
                    minute: 0,
                    second: 0
                };
        }
        var firstTime = 60 + randomKey;
        var secondTime = Math.ceil(Math.random() * (89 - 30) + 30);
        var timerno = setInterval(function () {
            //随机读取服务器时间
            if ($.lt_time_leave > 0 && ($.lt_time_leave % firstTime == 0 || $.lt_time_leave == secondTime)) {
                window.__temp_type1_dateTime = new Date().getTime();
                var paramissue = $($.lt_id_data.id_cur_issue).html();
                $.ajax({
                    type: 'POST',
                    url: $.lt_ajaxurl,
                    timeout: 30000,
                    data: "lotteryid=" + $.lt_lottid + "&issue=" +paramissue+ "&type=1",
                    success: function (data) {//成功
                        var objdata = eval("(" + data + ")");
                        var result = session_timeout(objdata);
                        if (result === false) {
                            return false;
                        }
                        var shicha = Math.round((__temp_type1_dateTime-new Date().getTime())/2000) ;
                        shicha = shicha < 1 ? 1 : shicha;
                        data = data - shicha;
                        data = parseInt(data, 10);
                        data = isNaN(data) ? 0 : data;
                        data = data <= 0 ? 0 : data;
                        $.lt_time_leave = data;
                        if(_last_query_daojishi.hasOwnProperty("remainTime")&&_last_query_daojishi.issue==paramissue&&data<=5)
                        {
                            $.lt_time_leave=0;
                        }
                        _last_query_daojishi = {issue:paramissue,remainTime:data};
                    }
                });
            }
            if ($.lt_time_leave <= 0) {//结束 //lt_time_leave投注剩余秒数
                clearInterval(timerno);
                //倒计时结束，清除获取上一期开奖号码定时器
                clearInterval($.lt_timerLastCodeNo);
                //进入开奖倒计时,只有上期正常获取到才继续下期获取
                $("#lt_opentimeleft").lt_opentimer(parseInt($($.lt_id_data.id_cur_issue).html()),10);//节约服务器性能，本期投注倒计时为0之后的70秒后才会有上期的开奖结果，而这里延迟55秒开启定时器(该定时器用来查询开奖号码)。
                $($.lt_id_data.id_tra_if).prop("checked", false);
                $($.lt_id_data.id_tra_stop).attr("disabled", true).prop("checked", false);
                $($.lt_id_data.id_tra_box).hide();
                if ($.lt_submiting == false) {//如果没有正在提交数据则弹出对话框,否则主动权交给提交表单
                    $.unblockUI({
                        fadeInTime: 0,
                        fadeOutTime: 0
                    });
                    $.confirm(lot_lang.am_s99.replace("[msg]", lot_lang.am_s15), function () {//确定
                        $.lt_reset(false);
                        $.lt_ontimeout();
                    }, function () {//取消
                        $.lt_reset(true);
                        $.lt_ontimeout();
                    }, '', 450);
                    var confirm_no_txt = $("#confirm_no").val();
                    var auto_close_seconds = 3; // 奖期投注倒计时截止时弹出框自动关闭秒数
                    var auto_close_timerno = setInterval(function () {
                        if (auto_close_seconds <= 0) {
                            clearInterval(auto_close_timerno);
                            $("#confirm_no").click();
                        }
                        $("#confirm_no").val(confirm_no_txt + " (" + auto_close_seconds + ")");
                        auto_close_seconds--;
                    }, 1000);
                }
                //将投注记录里，已close的期数的投注的checkbox去掉
                setHisCheckbox($('#current_issue').text());
            }
            var oDate = diff($.lt_time_leave--);
            var ahour = fftime(oDate.hour).toString().split("");
            var aminute = fftime(oDate.minute).toString().split("");
            var asecond = fftime(oDate.second).toString().split("");
            if (ahour[0] != $(me).find(".leaveh-1").find("span").html()) {
                $(me).find(".leaveh-1").html('<span>' + ahour[0] + '</span>');
            }
            if (ahour[1] != $(me).find(".leaveh-2").find("span").html()) {
                $(me).find(".leaveh-2").html('<span>' + ahour[1] + '</span>');
            }
            if (aminute[0] != $(me).find(".leavem-1").find("span").html()) {
                $(me).find(".leavem-1").html('<span>' + aminute[0] + '</span>');
            }
            if (aminute[1] != $(me).find(".leavem-2").find("span").html()) {
                $(me).find(".leavem-2").html('<span>' + aminute[1] + '</span>');
            }
            if (asecond[0] != $(me).find(".leaves-1").find("span").html()) {
                $(me).find(".leaves-1").html('<span>' + asecond[0] + '</span>');
            }
            if (asecond[1] != $(me).find(".leaves-2").find("span").html()) {
                $(me).find(".leaves-2").html('<span>' + asecond[1] + '</span>');
            }
        }, 1000);
    };
    //开奖倒计时，获得近期开奖号码 //openissue:上期开奖号码
    $.fn.lt_opentimer = function (openissue,delayTime) {//服务器开始时间，服务器结束时间//delayTime:延迟N秒后再查询上期的开奖号码
        $.lt_open_status = false;
        $("#lt_opentimebox2").show();
        //开奖号码
        function _getcode(issue) {
            $.ajax({
                type: 'POST',
                dataType: 'JSON',
                url: $.lt_ajaxurl,
                data: "lotteryid=" + $.lt_lottid + "&type=3&issue=" + issue,
                success: function (data) {
                    var result = session_timeout(data);
                    if (result === false) {
                        return false;
                    }
                    if (data == '') {
                        return;
                    }
                    $("#lt_gethistorycode").html(data.issue);
                    if(data.code != '' ){
                        $.lt_open_status = true;
                        var codebox = $("#showcodebox").find("li");
                        var $i = codebox.length - 1;
                        clearInterval(opentimerget);opentimerget=null;
                        $("#lt_opentimebox2").hide();
                        clearInterval(moveno);moveno=null;
                        $(codebox[$i]).attr("flag", "normal");
                        $.each(codebox, function (i, n) {
                            $(this).html(data.code[i]);
                        });
                    }
                    var $sRecentlyCode = "";
                    var recentlycode = data.recentlycode;
                    var issuecount = recentlycode.length;
                    var openCodeStr = '开奖号码';
                    var codeCss = 'gd-box-h';
                    if ($.lt_lottid == '9'||$.lt_lottid == '52') {
                        openCodeStr = '';
                        codeCss = 'gd-box-p';
                    }
                    for (var m = 0; m < issuecount; m++) {
                        $sRecentlyCode += '<p>第<span class="gd-box-q">' + recentlycode[m].issue + '</span>期' + openCodeStr + ': &nbsp;&nbsp;';
                        var allcode = recentlycode[m].allcode;
                        var codecount = allcode.length;
                        for (var n = 0; n < codecount; n++) {
                            $sRecentlyCode += '<span class="' + codeCss + '">' + allcode[n] + '</span>';
                        }
                        $sRecentlyCode += '</p>';
                    }
                    $("#gd-box2").html($sRecentlyCode);
                },
                error: function(XMLHttpRequest,status) {
                    window.location.reload();
                }
            });
        }
        $('#lt_gethistorycode').html(openissue);//上期的期号
        var tttime = 11*1000;//Math.ceil(Math.random() * 15 + 10) * 1000;//10-25秒之间读取
        var _flag = 0;
        opentimerget = setInterval(function () {
            if(opentimerget==null)
            {
                clearInterval( window.opentimerget);
                return;
            }
            _flag++;
            if ($.lt_open_status == true) {
                clearInterval(moveno);moveno=null;
                $.each($("#showcodebox").find("li"), function (i, n) {
                    $(this).attr("flag", "normal");
                });
                clearInterval(opentimerget);opentimerget=null;
            }
            if( _flag <=1 ||!delayTime|| ( delayTime && (_flag+1)*tttime >= delayTime*1000) )
            {//_flag==1 当天第一期时候，无需延迟delayTime的时间，
                _getcode($.trim($('#lt_gethistorycode').html()));
            }
        }, tttime);

        $("#showcodebox").find("li").attr("flag", "move");
        window.moveno = setInterval(function () {
            if(moveno==null)
            {
                clearInterval( window.moveno);
                return;
            }
            $.each($("#showcodebox").find("li"), function (i, n) {
                $(this).html(Math.floor(10 * Math.random()));
            });
        },100);
    };

    //根据投单完成和本期销售时间结束，进行重新更新整个投注界面
    $.lt_reset = function (iskeep) {
        if (iskeep && iskeep === true) {
            iskeep = true;
        } else {
            iskeep = false;
        }
        if ($.lt_time_leave <= 0) {
            //01:刷新选号区
            if (iskeep == false) {
                $("span[id^='smalllabel_'][class='method-tab-front']", $($.lt_id_data.id_smalllabel)).removeData("ischecked").click();
            }
            //02:刷新确认区
            if (iskeep == false) {
                $.lt_total_nums = 0;//总注数清零
                $.lt_total_money = 0;//总金额清零
                $.lt_trace_base = 0;//追号基础数据
                $.lt_same_code = [];//已在确认区的数据
                $($.lt_id_data.id_cf_num).html(0);//显示数据清零
                $($.lt_id_data.id_cf_money).html(0);//显示数据清零
                $($.lt_id_data.id_cf_content).children().empty();
                $('<tr class="nr"><td class="noinfo" align="center">暂无投注项</td></tr>').prependTo($.lt_id_data.id_cf_content);
                $($.lt_id_data.id_cf_count).html(0);
                if ($.lt_ismargin == false) {
                    traceCheckMarginSup();
                }
            }
            //读取新数据刷新必须刷新的内容
            $.ajax({
                type: 'POST',
                url: $.lt_ajaxurl,
                timeout: 30000,
                dataType: 'JSON',
                data: "lotteryid=" + $.lt_lottid + "&type=4",
                success: function (data) {//成功
                    var result = session_timeout(data);
                    if (result === false) {
                        return false;
                    }
                    if (data.length <= 0) {
                        $.alert(lot_lang.am_s16);
                        return false;
                    }
                    if (data == "") {
                        alert(lot_lang.am_s18);
                        return false;
                    }
                    if (data.isguest) {
                        window.location.reload();
                        return false;
                    }
                    if (data.opentime > data.nowtime) {
                        //未开盘
                        $('#openTitle').html('未开盘,距离开盘时间还有');
                        $('#lt_buy').mousedown(function (e) {
                            $.alert('未开盘,不能下注');
                            try{if(e.preventDefault){e.preventDefault();}else{e.returnValue = false;}}catch(e){}
                            return false;
                        })
                        var timeEnd = data.opentime;
                    } else {
                        //已开盘
                        $('#openTitle').html('已开盘,距离投注截止还有');
                        var timeEnd = data.saleend;
                        $('#lt_buy').unbind('mousedown');
                    }
                    // eval("data="+data);
                    //03:刷新当前期的信息
                    $($.lt_id_data.id_cur_issue).html(data.issue);
                    $($.lt_id_data.id_cur_end).html(data.saleend);
                    $($.lt_id_data.id_cur_sale).html(data.sale);
                    $.lt_issuecount = data.left;
                    if (parseInt($("#lt_trace_count_input").val(), 10) > $.lt_issuecount) {
                        $("#lt_trace_count_input").val($.lt_issuecount);
                    }
                    //04:重新开始计时
                    $($.lt_id_data.id_count_down).lt_timer(data.nowtime, timeEnd);
                    $.lt_open_time = data.opentime;
                    $.lt_end_time = data.saleend;
                    //重新生成并写入起始期内容
                    var j = 0;
                    var endtime = 0;
                    var currentendtime = new Date($.lt_end_time.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
                    var chtml = '';
                    var lastissueshtml = '';
                    $.each($.lt_issues, function (i, n) {
                        endtime = new Date(n.endtime.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
                        if (j < $.lt_issuecount && endtime >= currentendtime) {
                            j++;
                            chtml += '<option value="' + n.issue + '">' + n.issue + (n.issue == data.issue ? lot_lang.dec_s7 : '') + '</option>';
                            lastissueshtml += '<tr id="tr_trace_' + n.issue + '"><td class="r1"><input type="checkbox" name="lt_trace_issues[]" value="' + n.issue + '" /></td><td class="123">' + n.issue + '</td><td class="nosel"><input name="lt_trace_times_' + n.issue + '" type="text" class="r2" value="0" disabled/>' + lot_lang.dec_s2 + '</td><td>' + lot_lang.dec_s20 + '<span id="lt_trace_money_' + n.issue + '">0.00</span></td><td>' + n.endtime + '</td></tr>';
                        }
                    });
                    $("#lt_issue_start").empty().val(data.issue);
                    $(chtml).appendTo("#lt_issue_start");
                    $("#lt_trace_issues_table").empty();
                    $(lastissueshtml).appendTo("#lt_trace_issues_table");
                    //06:更新可追号期数
                    t_count = $.lt_issuecount;
                    $($.lt_id_data.id_tra_alct).val(t_count);
                    //07:更新追号数据
                    cleanTraceIssue();//清空追号区数据
                    //08:赋值追号区数据
                    $.lt_issues = data.traceissues;
                    //需要重新加载
                    //装载追号的期号列表
                    var issueshtml = '<table width="100%" cellspacing=0 cellpadding=0 border=0 id="lt_trace_issues_table">';
                    var endtime = 0;
                    var txtCur = '';
                    for (var i = 0; i < data.traceissues.length; i++) {
                        endtime = new Date(data.traceissues[i].endtime.replace(/[\-\u4e00-\u9fa5]/g, "/")).getTime();
                        txtCur = (i == 0) ? '(当前期)' : '';
                        issueshtml += '<tr id="tr_trace_' + data.traceissues[i].issue + '" class="on"><td class="r1"><input type="checkbox" name="lt_trace_issues[]" value="' + data.traceissues[i].issue + '" /></td><td>' + data.traceissues[i].issue + txtCur + '</td><td class="nosel"><input name="lt_trace_times_' + data.traceissues[i].issue + '" type="text" class="r2" value="0" disabled/>' + lot_lang.dec_s2 + '</td><td>' + lot_lang.dec_s20 + '<span id="lt_trace_money_' + data.traceissues[i].issue + '">0.00</span></td><td>' + data.traceissues[i].endtime + '</td></tr>';
                    }
                    issueshtml += '</table>';
                    if($.lt_id_data.id_tra_issues){
                        if( typeof($.lt_id_data.id_tra_issues) == "string" ){ $($.lt_id_data.id_tra_issues).empty(); }else{ $.lt_id_data.id_tra_issues.empty(); }
                    }
                    $(issueshtml).appendTo($.lt_id_data.id_tra_issues);
                    //绑定刷新追号总额数
                    bindSetTraceMsg();
                },
                error: function () {//失败
                    $.alert(lot_lang.am_s16);
                    cleanTraceIssue();//清空追号区数据
                    return false;
                }
            });
        } else {//提交表单成功后的刷新
            //01:刷新选号区
            if (iskeep == false) {
                $("span[id^='smalllabel_'][class='method-tab-front']", $($.lt_id_data.id_smalllabel)).removeData("ischecked").click();
            }
            //02:刷新确认区
            if (iskeep == false) {
                $.lt_total_nums = 0;//总注数清零
                $.lt_total_money = 0;//总金额清零
                $.lt_trace_base = 0;//追号基数
                $.lt_same_code = [];//已在确认区的数据
                $($.lt_id_data.id_cf_num).html(0);//显示数据清零
                $($.lt_id_data.id_cf_money).html(0);//显示数据清零
                $($.lt_id_data.id_cf_content).children().empty();
                $('<tr class="nr"><td class="noinfo" align="center">暂无投注项</td></tr>').prependTo($.lt_id_data.id_cf_content);
                $($.lt_id_data.id_cf_count).html(0);
                if ($.lt_ismargin == false) {
                    traceCheckMarginSup();
                }
            }
            //03:刷新追号区
            if (iskeep == false) {
                cleanTraceIssue();//清空追号区数据
            }
        }
    };

    //提交表单
    $.fn.lt_ajaxSubmit = function () {
        var me = this;
        $(this).click(function () {
            if (checkTimeOut() == false) {
                return;
            }
            $.lt_submiting = true;//倒计时提示的主动权转移到这里
            var istrace = $($.lt_id_data.id_tra_if).prop("checked");
            if ($.lt_total_nums <= 0 || $.lt_total_money <= 0) {//检查是否有投注内容
                $.lt_submiting = false;
                $.alert(lot_lang.am_s7);
                return;
            }
            if (istrace == true) {
                if ($.lt_trace_issue <= 0 || $.lt_trace_money <= 0) {//检查是否有追号内容
                    $.lt_submiting = false;
                    $.alert(lot_lang.am_s20);
                    return;
                }
                var terr = "";
                $("input[name^='lt_trace_issues']:checked", $($.lt_id_data.id_tra_issues)).each(function () {
                    if (Number($(this).closest("tr").find("input[name^='lt_trace_times_']").val()) <= 0) {
                        terr += $(this).val() + '&nbsp;&nbsp;';
                    }
                });
                if (terr.length > 0) {//有错误倍数的奖期
                    $.lt_submiting = false;
                    $.alert(lot_lang.am_s21.replace("[errorIssue]", terr), '', '', 300, false);
                    return;
                }
            }
            if (istrace == true) {
                var msg = '<h4>' + lot_lang.am_s144.replace("[count]", $.lt_trace_issue) + '</h4>';
            } else {
                var msg = '<h4>' + lot_lang.dec_s8.replace("[issue]", $("#current_issue").html()) + '</h4>';
            }
            $.lt_singlebet_winmoney = ($.lt_singlebet_winmoney == undefined || $.lt_singlebet_winmoney == '' || $.lt_singlebet_winmoney == 0) ? $('#singlebet_maxwin').val() : 1000000;//默认1000000
            if ($.lt_singlebet_winmoney == undefined || $.lt_singlebet_winmoney == '' || $.lt_singlebet_winmoney == 0) {
                $.lt_singlebet_winmoney = 1000000;
            }
            var modesmsg = [];
            var modes = 0;
            var lossMoney = 0;//亏损的钱
            var tmpMsg = '';
            var tmpMsgPos = '';
            var blPosition = false;
            $.each($('tr', $($.lt_id_data.id_cf_content)), function (i, n) {
                datas = $(n).data('data');
                var tmpData = $(n).find(":input").val();
                var jsonobj = eval('(' + tmpData + ')');
                var money = (jsonobj.money == undefined || jsonobj.money == '') ? 0 : jsonobj.money;//投注金额
                var point = (jsonobj.point == undefined || jsonobj.point == '') ? 0 : jsonobj.point;//返水百分比
                //计算每注亏损=最高可中奖金额-投注金额+返水金额,最高可中奖金额=赔率*投注金额
                var tmpWinMoney = money * datas.prize;
                tmpWinMoney = (tmpWinMoney > $.lt_singlebet_winmoney) ? $.lt_singlebet_winmoney : tmpWinMoney;
                var tmpMoney = tmpWinMoney - money + money * point;//最高可以获得的总金额
                lossMoney += (tmpMoney < 0) ? -tmpMoney : 0;
                tmpMsg += '<tr><td>' + datas.methodname + '</td>'
                    + '<td>' + datas.modename + '</td>'
                    + '<td>' + datas.desc + '</td>'
                    + '<td>' + money + '</td></tr>';
                tmpMsgPos += '<tr><td>' + datas.methodname + '</td>'
                    + '<td>' + datas.modename + '</td>'
                    + '<td>' + datas.desc + '</td>'
                    + '<td>' + datas.positiondesc + '</td>'
                    + '<td>' + money + '</td></tr>';
                if (datas.positiondesc != "") {
                    blPosition = true;
                }
            });
            msg += '<div class="data">'
                + '<table border=0 cellspacing=0 cellpadding=0 width=100%>'
                + '<tr class=hid>'
                + '<td width=150>玩法</td>'
                + '<td width=40>单位</td>'
                + '<td width=180>内容</td>';
            if (blPosition) {
                msg += '<td width=110>位置</td>';
            }
            msg += '<td>金额</td></tr>';
            if (blPosition) {
                msg += tmpMsgPos;
            } else {
                msg += tmpMsg;
            }
            msg += '</table></div>';
            msg += '<div class="binfo"><span class=bbm>' + (istrace == true ? lot_lang.dec_s16 + ': ' +
                    JsRound($.lt_trace_money, 2, true) : lot_lang.dec_s9 + ': ' + $.lt_total_money) + ' ' + lot_lang.dec_s3 +
                '</span><!--<span style="margin-left: 10px;">单注最高奖:' + $('#singlebet_maxwin').val() + '元</span>--></div>';

            $.confirm(msg, function () {//点确定[提交]
                if (checkTimeOut() == false) {//正式提交前再检查以下时间
                    $.lt_submiting = false;
                    return;
                }
                $("#lt_total_nums").val($.lt_total_nums);
                $("#lt_total_money").val($.lt_total_money);
                ajaxSubmit();
            }, function () {//点取消
                $.lt_submiting = false;
                return checkTimeOut();
            }, '', 580, true);
        });
        //检查时间是否结束，然后做处理
        function checkTimeOut() {
            if ($.lt_time_leave <= 0) {//结束   //当前期结束，是否要清空已投注
                $.confirm(lot_lang.am_s99.replace("[msg]", lot_lang.am_s15), function () {//确定
                    $.lt_reset(false);
                    $.lt_ontimeout();
                }, function () {//取消
                    $.lt_reset(true);
                    $.lt_ontimeout();
                }, '', 450);
                return false;
            } else {
                return true;
            }
        }
        //ajax提交表单
        function ajaxSubmit() {
            $.blockUI({
                message: lot_lang.am_s22,
                overlayCSS: {
                    backgroundColor: '#000000',
                    opacity: 0.3,
                    cursor: 'wait'
                }
            });
            var form = $(me).closest("form");
            $.ajax({
                type: 'POST',
                url: $.lt_ajaxurl,
                timeout: 50000,
                dataType: 'JSON',
                data: $(form).serialize(),
                success: function (data) {
                    $.unblockUI({
                        fadeInTime: 0,
                        fadeOutTime: 0
                    });
                    if (data.is_timeout == 'timeout') {
                        alert('请登录!');
                        return false;
                    }
                    var result = session_timeout(data);
                    if (result === false) {
                        return false;
                    }
                    $.lt_submiting = false;
                    if (data.length <= 0) {
                        $.alert(lot_lang.am_s16);
                        return false;
                    }
                    if (data.ret == "1") {//购买成功
                        parent._user_.refreshMoney("#balance");//_user_.refreshMoney("#balance");
                        $.lt_reset();//清空注单
                        $.alert(lot_lang.am_s24, lot_lang.dec_s25, function () {
                            $.lt_onfinishbuy();
                            $.fn.fastData();
                            $.fn.updatehistory();
                        });
                        $($.lt_id_data.id_tra_if).prop("checked", false);
                        $($.lt_id_data.id_tra_stop).attr("disabled", true).prop("checked", false);
                        $($.lt_id_data.id_tra_box).hide();
                     //   bet_con();//更新投注记录
                        return false;
                    } else {//购买失败提示
                        if (data.err != '') {//错误
                            $.alert(lot_lang.am_s100 + data.err, '', function () {
                                return checkTimeOut();
                            }, (data.err.length > 10 ? 350 : 250));
                            return false;
                        }

                    }
                },
                error: function () {
                    $.lt_submiting = false;
                    $.unblockUI({
                        fadeInTime: 0,
                        fadeOutTime: 0
                    });
                    $.confirm(lot_lang.am_s99.replace("[msg]", '系统超时'), function () {//点确定[清空],//交易状态不确定,请查看是否购买成功,是否要清空已投注内容?
                        if (checkTimeOut() == true) {//时间未结束
                            $.lt_reset();
                        }
                        $.lt_onfinishbuy();
                        $.fn.fastData();
                        $.fn.updatehistory();
                    }, function () {//点取消
                        $.lt_onfinishbuy();
                        $.fn.fastData();
                        $.fn.updatehistory();
                        return checkTimeOut();
                    }, '', 480, true);
                    return false;
                }
            });
        }

    };
    //当有资金发生变化时刷新左边余额
    $.fn.fastData = function () {
        //fastData();
    };
    //更新最新投注记录 没有用到-gate
    $.fn.updatehistory = function () {
        if (parseInt($.lt_showrecord, 10) == 0) {
            return true;
        }
        $.ajax({
            type: 'POST',
            URL: $.lt_ajaxurl,
            data: "lotteryid=" + $.lt_lottid + "&flag=hisproject",
            success: function (data) {//成功
                var objdata = eval("(" + data + ")");
                var result = session_timeout(objdata);
                if (result === false) {
                    return false;
                }
                if (data.length <= 0) {
                    $.alert(lot_lang.am_s16);
                    return false;
                }
                var partn = /<script.*>.*<\/script>/;
                if (partn.test(data)) {
                    $.alert(lot_lang.am_s16);
                    return false;
                }
                eval("data=" + data + ";");
                if (data.length > 0) {
                    $(".projectlist").empty();
                    var $shtml = "";
                    $.each(data, function (i, n) {
                        if (parseInt(n.iscancel, 10) != 0) {
                            $shtml += '<tr class="cancel">';
                        } else {
                            $shtml += '<tr>';
                        }
                        $shtml += '<td><a title="查看投注详情" class="blue" rel="projectinfo">' + n.projectid + '</a></td>';
                        $shtml += '<td>' + n.writetime + '</td>';
                        $shtml += '<td>' + n.methodname + '</td>';
                        $shtml += '<td>' + n.issue + '</td>';
                        $shtml += '<td>' + n.code + '</td>';
                        $shtml += '<td>' + n.multiple + '</td>';
                        $shtml += '<td>' + n.modes + '</td>';
                        $shtml += '<td>' + n.totalprice + '</td>';
                        $shtml += '<td>' + n.bonus + '</td>';
                        $shtml += '<td>' + n.statusdesc + '</td>';
                        $shtml += '</tr>';
                    });
                    $(".projectlist").html($shtml);
                }
            },
            error: function () {
                $.alert(lot_lang.am_s16);
            }
        });
    };
})(jQuery);

