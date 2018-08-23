requirejs(["jquery"], function($) {
    //自适应 宽度
        var liveArr = [38, 41, 43, 45, 47, 85];
        var newLive = {
            liveData: {},
            mainItem: '',
            clickStatus: true,
            curHall: 38,
            curSub: {},
            ultimateArr: [39, 44, 46, 48, 81, 83],
            keyString: "",
            groupX: "",
            groupY: "",
            resetClick: function() {
                this.curSub = '';
                this.mainItem = '';
            },
            gameShowHide: function() {
                $(function() {
                    if (newLive.curHall) {
                        // 开启/重刷页面
                        if ($.inArray(newLive.curHall, liveArr) >= 0) {
                            $('.ele-live-layout').css('display', 'none'); //#ele-live-flash,
                            $('.showhide-wrap, .showhide-' + newLive.curHall).show();
                            return false;
                        }
                        $('.showhide-wrap').css('display', 'none');
                    }
                });
            },
            scrollbarlive: function() {
                //拼屏
                $("#ele-game-wrap").mCustomScrollbar({
                    axis: "y",
                    mouseWheel: {
                        enable: true,
                        scrollAmount: 200,
                    },
                    scrollButtons: {
                        enable: false,
                        scrollType: "continuous",
                        scrollSpeed: 20,
                        scrollAmount: 40
                    }
                });
            },
            accDiv: function(num1, num2) {
                var t1 = 0,
                    t2 = 0,
                    r1, r2;
                try { t1 = num1.toString().split(".")[1].length } catch (e) {}
                try { t2 = num2.toString().split(".")[1].length } catch (e) {}
                r1 = Number(num1.toString().replace(".", ""));
                r2 = Number(num2.toString().replace(".", ""));
                return (r1 / r2) * Math.pow(10, t2 - t1);
            },
            calculateBox: function() {
                var winH = $(window).height(), //获取内容区高度
                    winW = $(window).width();
                $('#ele-game-wrap').css({ width: winW, height: winH });
                if ($('.ele-live-layout').length > 1) { // 如果是够彩大厅
                    var boxWidth = $('.ele-live-layout').width() + 14,
                        boxNum = Math.floor(this.accDiv(winW, boxWidth));
                    $('#ele-live-wrap').css({ width: boxNum * (boxWidth) });
                }
            },

            init: function() {
                // 初始页面 购彩大厅区预设动作
               // this.gameShowHide();
                // 缩放视窗
            	 newLive.scrollbarlive();
            	 newLive.calculateBox();
                $(window).resize(function() {
                    newLive.calculateBox();
                });
            }
        };
        var lottery = {
        	    gameIds:"", //（周期：永久）
        	    obj:{"34":"幸运飞艇","28":"幸运农场","27":"广东快乐十分","5":"重庆时时彩","9":"北京赛车(PK10)","15":"广东11选5","7":"新疆时时彩","18":"香港⑥合彩","12":"山东11选5","4":"天津时时彩","13":"上海11选5","10":"江苏快三","14":"江西11选5","11":"安徽快三","17":"广西快三","1":"福彩3d","3":"上海时时乐","2":"排列三","41":"北京幸运28","42":"新加坡28","51":"三分时时彩","52":"三分PK拾"}  //key:id;  value:{ lottery }
        	};      
    var _lottery_menu = {
		_msgTip: function () {
    		$.ajax({
                type: 'POST',
                url: 'https://cp89001.com/common/getUnreadMsgCount',
                data: '',
                dataType: 'json',
                timeout: '30000',
                success: function(results) {
                    if(results.status == "200" && results.data > 0) {
                    	parent.$('#un_read_msg_count').text('('+results.data+')');
                    	parent.$('#un_read_msg_count').show();
                    	
                		var audio='<audio id="audio1" style="display:none;" controls="controls" autoplay="autoplay" loop="loop" height="0" width="0"><source src="assets/new_msg.mp3" type="audio/mp3" /></audio>';
                		$("body").append(audio);
        	            setTimeout(function(){
        	                $("#audio1").remove();
        	            }, 2700);
                    }
                }
            });
        },
            
        ////* 获取彩种列表开奖倒计时和上期开奖号码 */
        right_timeList: function(gameIdStr) {
            gameIdStr = gameIdStr ? gameIdStr : ""; //enableGameIdArr.join(',');
            $.ajax({
                'url': 'https://cp89001.com/common/hall/getCzlbdjs',
                'dataType': 'json',
                'data': { 'gameId': gameIdStr },
                'type': 'post',
                'success': function(results) {
                    var arrOuter = [];
                    var static_value = {};
                    
                    var data = results.data;
                    for (var p in data) {
                        var id = data[p].gameId;
                        var link = data[p].url;
                        var name = data[p].name;
                        var issue = data[p].issue; //期数
                        var time = data[p].timeout; //关盘剩余秒数
                        var openTime = data[p].openTime; //上期开奖剩余秒数
                        var openNum = data[p].lastIssueNum; //开奖号码
                        var temp = '<div class="showhide-38 ele-live-layout" id="lot' + id + '" data-id="' + id + '" data-issue="' + issue + '" data-time="' + time + '" data-opentime="' + openTime + '" data-opennum="' + openNum + '"  data-lasttimer="' + (new Date().getTime()) + '">' + lottery_innerHtml(id, issue, time, openNum, link, name) + '</div>';
                        arrOuter.push(temp);
                    }
                    $("#ele-live-wrap>div").html(arrOuter.join(""));
                    newLive.init();
                    timer();
                }
            });
            //这是一个工具方法：将时间数字转成 例如 00：23：44 格式的 html
            function time_html(time_str) {
                var time = time_str - 0;
                var time_obj = { h: "00", m: "00", s: "00" };
                if (time > 0) {
                    var h = parseInt(time / 3600);
                    var m = parseInt((time - h * 3600) / 60);
                    var s = time - h * 3600 - m * 60;

                    function munChange(num) {
                        return (num == 0) ? "00" : ((num >= 10) ? num : ("0" + num));
                    }
                    time_obj.h = munChange(h);
                    time_obj.m = munChange(m);
                    time_obj.s = munChange(s);
                }
                return '<span class="leaveh-1">' + time_obj.h + '</span><span class="interval"> ：</span><span class="leavem-1">' + time_obj.m + '</span><span class="interval"> ：</span><span class="leaves-1">' + time_obj.s + '</span>';
            }
            //设置定时器，每秒 刷新一次
            function timer() {
                var dealTimer = function() {
                    //返回：需要被查询的彩票的id
                    var get_gameIdStr = function() {
                        ///*遍历所有彩票，涮选出 符合 查询条件的 gameIdStr （需要被查询的彩票的id）  */
                        var gameIdStr = ""; //即将用来查询的参数：gameIdStr ，（即：需要跟新的彩票的id的集合）
                        for (var p in lottery.obj) {
                            var time_str = $("#lot" + p).data("time") - 1;
                            $("#lot" + p).data("time", time_str);
                            $("#lot" + p + " .gct_time_now_l").html(time_html(time_str)); // 修改 倒计时的 html内容
                            $("#lot" + p).data("opentime", $("#lot" + p).data("opentime") - 1);
                            var currentTime = new Date().getTime(); //当前时间
                            //当 （关盘时间小于等于0 ），调用接口
                            if ($("#lot" + p).data("time") <= 0) {
                                //当前id对应的彩票正在 处于上一个ajax请求中，还未结束时，无须重新查询； 当前时间距离最新一次查询的时间间隔相差大于60秒;要满足这2种条件； ||
                                if ($("#lot" + p).data("ajax") != "true" && ((currentTime - $("#lot" + p).data("lasttimer")) / 1000 >= 60)) {
                                    gameIdStr += p + ",";
                                    $("#lot" + p).data("ajax", "true"); // true，表示 ajax 正在进行。
                                }
                            }
                            // 或者 （ 开奖时间小于等于0并且；开奖号码为空；上一个ajax请求已结束）,要满足这3种条件；
                            if ($("#lot" + p).data("opentime") <= 0 && $("#lot" + p).data("opennum") == "" && $("#lot" + p).data("ajax") != "true") {
                                //时间小于 -50 但 距离上次查询 大于60秒的间隔 ，
                                if (((currentTime - $("#lot" + p).data("lasttimer")) / 1000 >= 60)) // $("#lot"+p).data("opentime") >= -50 || //当开奖倒计时 时间为 [-50,0] 之间，或者，
                                {
                                    gameIdStr += p + ",";
                                    $("#lot" + p).data("ajax", "true"); // true，表示 ajax 正在进行。
                                }
                            }
                        }
                        return gameIdStr;
                    };
                    try {
                        var gameIdStr = get_gameIdStr();
                        //如果没有满足条件的id则不执行ajax，不浪费ajax请求，（满足条件的id指的是， 倒计时为0的id）
                        if (gameIdStr.length == 0) {
                            return;
                        }
                        (function ajaxData(gameIdStr) {
                            $.ajax({
                                'url': 'https://cp89001.com/common/hall/getCzlbdjs',
                                'dataType': 'json',
                                'data': { 'gameId': "" },
                                'type': 'post',
                                'success': function(results) {
                                    
                                    var arrOuter = [];
                                    var static_value = {};
                                    var data = results.data;
                                    for (var p in data) {
                                        var id = data[p].gameId;
                                        var link = data[p].url;
                                        var name = data[p].name;
                                        var issue = data[p].issue; //期数
                                        var time = data[p].timeout; //关盘剩余秒数
                                        var openTime = data[p].openTime; //上期开奖剩余秒数
                                        var openNum = data[p].lastIssueNum; //开奖号码
                                        $("#lot" + id).html(lottery_innerHtml(id, issue, time, openNum, link, name));
                                        $("#lot" + id).data("issue", issue);
                                        $("#lot" + id).data("time", time);
                                        $("#lot" + id).data("opentime", openTime);
                                        $("#lot" + id).data("opennum", openNum);
                                        $("#lot" + id).data("lasttimer", new Date().getTime()); // 记录当前彩票的最后一次 ajax 查询的时间，用于后面计算时间间隔。
                                        $("#lot" + id).data("ajax", "false"); // false，表示 ajax已经结束。
                                    }
                                }
                            });
                        })(gameIdStr); ///* gameIdStr ： 满足 需要被查询的彩票的id*/
                    } catch (e) {}
                };
                setInterval(dealTimer, 1000);
            }
            //这是一个工具方法：返回右边列表中的，单个彩票div的 innerHTML
            function lottery_innerHtml(id, issue, time, openNum, link, name) {
                var openNum_HTML = "";
                if (openNum && openNum.split("|").length > 0) {
                    var arr = openNum.split("|");
                    var class_temp = "";
                    if (arr.length > 7) { //如果开奖号码大于7个球球
                        class_temp = "";
                    } else {
                        class_temp = " class=\"big_ball\" ";
                    }
                    if ((id == 41 || id == "41") || (id == 42 || id == "42")) { //北京28
                    var getColorClass=function(num) {
                        var ball_color = {
                            ",1,4,7,10,16,19,22,25,": "green",
                            ",2,5,8,11,17,20,23,26,": "blue",
                            ",3,6,9,12,15,18,21,24,": "red",
                            ",0,13,14,27,": "grey"
                        };
                        for (var k in ball_color) {
                            if (k.indexOf("," + parseInt(num) + ",") >= 0) {
                                return "ball_" + ball_color[k];
                            }
                        }
                    };
                    openNum_HTML += "<span class=\"fl\">上期开奖</span><div class=\"show-gd1\"><ul" + class_temp + ">";
                    openNum_HTML += '<li class="ball_other">' + arr[0] + '</li><span style="float:left;">+</span><li class="ball_other">' + arr[1] + '</li><span style="float:left;">+</span><li class="ball_other">' + arr[2] + '</li><span style="float:left;">=</span><li class="' + getColorClass(arr[3]) + '">' + arr[3] + '</li>';
                    openNum_HTML += "<span class=\"tabulousclear\"></span></ul></div>";
                } else if(id == 18 || id == '18'){
                	var getColorClass=function(num) {
                        var ball_color = {
                            ",05,06,11,16,17,21,22,27,28,32,33,38,39,43,44,49,": "green",
                            ",03,04,09,10,14,15,20,25,26,31,36,37,41,42,47,48,": "blue",
                            ",01,02,07,08,12,13,18,19,23,24,29,30,34,35,40,45,46,": "red",
                        };
                        for (var k in ball_color) {
                            if (k.indexOf("," + parseInt(num) + ",") >= 0) {
                                return "ball_" + ball_color[k];
                            }
                        }
                    };
                    
                    openNum_HTML += "<span class=\"fl\">上期开奖</span><div class=\"show-gd1\"><ul" + class_temp + ">";
                    for (var q = 0; q < arr.length; q++) {
                        if (arr[q]) {
                            openNum_HTML += '<li flag="normal" class="' + getColorClass(arr[q]) + '">' + arr[q] + '</li>';
                            if(q == 5) openNum_HTML += '<span style="float:left;">+</span>';
                        }
                    }
                    openNum_HTML += "<span class=\"tabulousclear\"></span></ul></div>";
                } else {
                    openNum_HTML += "<span class=\"fl\">上期开奖</span><div class=\"show-gd1\"><ul" + class_temp + ">";
                    for (var q = 0; q < arr.length; q++) {
                        if (arr[q]) {
                            openNum_HTML += '<li flag="normal">' + arr[q] + '</li>';
                        }
                    }
                    openNum_HTML += "<span class=\"tabulousclear\"></span></ul></div>";
                }
                   
                } else {
                    openNum_HTML = "<span class=\"fl\">上期开奖</span><span class='tip'>正在开奖</span>";
                }
                var kjzs_link = "common/trend?gameOpen="+id;
                var kjjg_link = "common/draw?gameOpen="+id;
                return '<div class="lot-wrap"><div class="lott-top"><div class="lott-name">' + '<a class=\"lott-imgbox\"  onclick="__location(\'common/hall?gameId=' + id + '\');" ><img src=\"assets/statics/images/lottery/' + id + '.png\" class=\"mCS_img_loaded\"></a>' + '<div class="lott-name-righ">' + '<h3>' + name + '</h3>' + '<p>第 ' + issue + ' 期</p>' + '<div class="gct_time"><div class="gct_time_now"><div class="gct_time_now_l">' + time_html(time) + '</div></div></div></div></div><div class="lot-fore">' + openNum_HTML + '</div></div><div class="lott-bot"><a href="'+kjjg_link+'" target="_blank">开奖结果</a><a href="'+kjzs_link+'"  target="_blank">开奖走势</a>' + '<a class="lot-btn" onclick="__location(\'common/hall?gameId=' + id + '\')">立即投注</a>' + '</div></div>';
            }

        }
    };
    
    $(function() {
        _lottery_menu.right_timeList();
        
        _lottery_menu._msgTip();
    });
   
});
