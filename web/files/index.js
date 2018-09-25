$(function () {
    //渲染中间5个彩种
    function _index_countdownIssue() {
        var selector = "#_index_countdownIssue";
        //该数组包含 id的顺序
        var gameIdArr = ["5", "1", "9", "2", "12"];  //example: [gameId,gameId,gameId]
        var gameListData = {}; // key:gameId ,  value:{gameObject}
        (function initData(gameIdArr, gameListData) {
            gameListData[gameIdArr[0]] = {
                hide: true,
                name: "重庆时时彩",
                game_url: "",
                game_url_param: function () {

                },
                trend_url: "",
                timeout: 0,
                issue: "----",
                rNum: function (selector) {//时时彩

                }
            };
            gameListData[gameIdArr[1]] = {
                name: "福彩3D",
                game_url: "",
                game_url_param: function () {

                },
                trend_url: "/trend/index.html?gameId=1&periods=30",
                timeout: 0,
                issue: "----",
                rNum: function (selector) {

                }
            };
            gameListData[gameIdArr[2]] = {
                name: "北京PK拾",
                game_url: "",
                game_url_param: function () {

                },
                trend_url: "/trend/index.html?gameId=9&periods=30",
                timeout: 0,
                issue: "----",
                rNum: function (selector) {

                }
            };
            gameListData[gameIdArr[3]] = {
                name: "排列三",
                game_url: "",
                game_url_param: function () {

                },
                trend_url: "",
                timeout: 0,
                issue: "----",
                rNum: function () {

                }
            };
            gameListData[gameIdArr[4]] = {
                name: "山东11选5",
                game_url: "",
                game_url_param: function () {

                    return s;
                },
                trend_url: "",
                timeout: 0,
                issue: "----",
                rNum: function (selector) {
                    var numList = [];

                }
            };
        })(gameIdArr, gameListData);

        function randomsort(a, b) {
            return Math.random() > .5 ? -1 : 1;
        }

        var getTimeArr = function (sec) {
            sec = parseInt(sec);
            var arr = [];
            var day = parseInt(sec / (3600 * 24));
            arr.push(day);
            sec = sec - (3600 * 24) * day;
            var h = parseInt(sec / 3600);
            arr.push(h);
            sec = sec - 3600 * h;
            var m = parseInt(sec / 60);
            arr.push(m);
            sec = sec - 60 * m;
            arr.push(sec);
            return arr;
        };

        var init_event = function () {
            if ("true" == $(selector).data("bind")) {
                return;
            }
            var str = "";
            for (var k = 0; k < gameIdArr.length; k++) {
                var gameId = gameIdArr[k];
                var o = gameListData[gameId];
                if (o["hide"] !== false) {
                    continue;
                }
                str += "<li class=\"tab-sel-open\" data-gameid=\"" + gameId + "\" name=\"gameid_" + gameId + "\"><a>" + o["name"] + "</a></li>";
            }
            $(selector + "[name=quick_tab_list]").html(str);
            $(selector + "[name=quick_tab_list]>li").bind('mouseover', function (e) {
                //各彩种中奖号码
                $(selector + "[name=quick_tab_list]>li").removeClass("on");
                $(this).addClass("on");
                var gameId = $(this).data("gameid");
                (function html(selector, o) {
                    $(selector + "[name=issue]").text(o["issue"]);
                    var t_arr = getTimeArr(o["timeout"]);
                    $(selector + "[name=day]").text(t_arr[0]);
                    $(selector + "[name=h]").text(t_arr[1]);
                    $(selector + "[name=m]").text(t_arr[2]);
                    $(selector + "[name=s]").text(t_arr[3]);
                    o["rNum"](selector);
                })(selector, gameListData[gameId]);
                $(selector).data("gameid", gameId);
                showNearNum(gameId);
            });
            $(selector + "[name=change_gameNum]").bind("click", function () {
                var gameId = $(selector).data("gameid");
                var o = gameListData[gameId];
                o["rNum"](selector);
            });
            $(selector + "[name=quick_tab_list]>li").eq(0).trigger("mouseover");
            $(selector + "[name=quick_tab_list]>li").bind('click', function (e) {
                var gameId = $(this).data("gameid");
                __openWin('lottery_hall', gameListData[gameId]["game_url"]);
            });
            $(selector + "[name=btn_game_play]").bind('click', function (e) {
                var gameId = $(selector).data("gameid");
                __openWin('lottery_hall', gameListData[gameId]["game_url"]);
            });
            $(selector + "[name=btn_trend]").bind('click', function (e) {
                var gameId = $(selector).data("gameid");
                __openWin("lottery_trend", "/trend/index.html?gameId=" + gameId + "&periods=30");
            });
            $(selector + "[name=doBet]").bind('click', function (e) {
                var gameId = $(selector).data("gameid");
                var o = gameListData[gameId];
                var p = o.game_url_param();
                var url = o.game_url;
                if (url.indexOf("?") > 0) {
                    url += "&" + p;
                } else {
                    url += "?" + p;
                }
                __openWin("lottery_hall", url);
            });
            setInterval(function () {
                for (var k in gameListData) {
                    var o = gameListData[k];
                    var leftTime = parseInt(o["timeout"]) - 1;
                    if (leftTime <= 0) {
                        if ($(selector).data("querydate") && new Date() - $(selector).data("querydate") > 4000) {
                            queryData();
                        }
                        o["timeout"] = 0;
                    } else {
                        o["timeout"] = leftTime;
                    }
                }
                var gameId = $(selector).data("gameid");
                (function html(selector, o) {
                    $(selector + "[name=issue]").text(o["issue"]);
                    var t_arr = getTimeArr(o["timeout"]);
                    $(selector + "[name=day]").text(t_arr[0]);
                    $(selector + "[name=h]").text(t_arr[1]);
                    $(selector + "[name=m]").text(t_arr[2]);
                    $(selector + "[name=s]").text(t_arr[3]);

                })(selector, gameListData[gameId]);
            }, 1000);
            $(selector).data("bind", "true");
        };

        var queryData = function () {
            $(selector).data("querydate", new Date().getTime());
            /* $.ajax({
             'url': '/index/getGamesEndTimeAndPeriod.html',
             'dataType':'json',
             'data':{gameIds:gameIdArr.join(",")},
             'type':'get',
             "success":function(data) {*/
            for (var i in data) {
                try {
                    var o = data[i];
                    if (gameListData.hasOwnProperty(i)) {
                        gameListData[i]["issue"] = o["issue"];
                        gameListData[i]["game_url"] = o["url"];
                        gameListData[i]["timeout"] = o["timeout"];
                        gameListData[i]["hide"] = false;
                    }
                } catch (e) {
                    console.log(e);
                }
            }
            init_event();
        }
        // });
    };
    ///////////////////////////////////////

    //显示 百分比 柱状图
    function showNearNum(gameId) {
        if (gameId == undefined || !gameId) {
            gameId = $(selector + "[name=quick_tab_list] li.on").data("gameid");
        }
        if (gameId == undefined || !gameId) {
            return;
        }
        var s2 = "#NUM_Statistics";
        $(s2 + " .bg_height>div").removeClass("anm_a01");
        $(s2).show();
        var arr = gameListData[gameId]["nearNumArr"]; // [{"num":"11","per":57},{"num":"01","per":49},{"num":"02","per":47},{"num":"05","per":30},{"num":"04","per":9}]
        for (var i = 0; i < 5; i++) {
            var per = arr[i]["per"] + "%";
            $(s2 + " #id_" + i + "[name=per_value]").text(per);
            $(s2 + " #id_" + i + "  .bg_height").html("<div></div>");
            $(s2 + " #id_" + i + "  .bg_height>div").css("height", per);
            $(s2 + " #id_" + i + "[name=num]").text(arr[i]["num"]);
        }
        $(s2 + " .bg_height>div").addClass("anm_a01");
    }

    /// end:近期开奖号码统计柱状图(@)
    window.setTimesNum = function (type) { //1:减,2:加
        var times_nums = $('input[name=times_nums]');
        var bet_amount = $('#bet_amount');
        var times = times_nums.val();
        if (times == 0) {
            times_nums.val(1);
            bet_amount.text(2);
        } else {
            if (type == 0) {
            } else if (type == 1) {
                times = parseInt(times) - 1;
                times = (times < 1) ? 1 : times;
            } else if (type == 2) {
                times = parseInt(times) + 1;
            }
            times_nums.val(times ^ [1 - 9][0 - 9] * $);//输入框最多三个数字，非0后面随意
            bet_amount.text((times ^ [1 - 9][0 - 9] * $) * 2); //避免出现NaN
        }
    };
    //queryData();
    // }
    //_index_countdownIssue();
});

$(document).ready(function () {
    //加减input禁止输入除数字外的其他按键
    function checkinput(idinput, idval, value) {
        if ((value.keyCode == 8 || value.keyCode == 46) && ($(idinput).val().length <= 1 )) {
            $(idinput).val(idval);
            value.preventDefault();
            value.stopPropagation();
        }
        if ($.inArray(value.keyCode, [46, 8, 9, 27, 13, 110]) !== -1 || (value.keyCode === 65 && (value.ctrlKey === true || value.metaKey === true)) || (value.keyCode >= 35 && value.keyCode <= 40)) {
            return;
        }
        if ((value.shiftKey || (value.keyCode < 48 || value.keyCode > 57)) && (value.keyCode <= 95 || value.keyCode > 105 )) {
            value.preventDefault();
            value.stopPropagation();
        }
        if ((value.key < 0 ) && ($(idinput).val().length <= 1 )) {
            $(idinput).val(1);
            value.preventDefault();
            value.stopPropagation();
        }
    }

    var times_numsinput = $("#times_nums").val();
    $("#times_nums").on("keydown", function (value) {
        checkinput('#times_nums', times_numsinput, value);
    });

    $("#times_nums").on("keyup", function (value) {
        checkinput('#times_nums', times_numsinput, value);
    });
    //检测input里面是否数字
    $("#times_nums").focusout(function () {
        if ($.isNumeric($(this).val())) {
        } else {
            $(this).val(1);
        }
    }).blur(function (value) {
        if ($.isNumeric($(this).val())) {
        } else {
            $(this).val(1);
        }
    });

    //获取联播图
    (function () {
        //下面是除了动态图片之外的几张静态固定图片
        var home_img_arr = [];//几张固定的图片{img_url:_prefixURL.statics+"/images/home/home_1.jpg",url_id:"4"},{img_url:_prefixURL.statics+"/images/home/home_1.jpg",url_id:"4"}
        function imgHtml(data, img_arr) {
            var len = data.length;
            var len2 = home_img_arr.length;
            var picHtml = '';
            var iconHtml = '';
            if (len > 0) {
                for (var i = 0; i < len; i++) {
                    picHtml += '<li class="show_picture" id="show_pic_' + i + '"><a onclick=\"__openWin(\'home2\',\'/promotion/index.html?id=' + data[i].sno + '\')\" ><img src="/promotion/pictureIndex.html?sno=' + data[i].sno + '"  class="sliderimg" width="522px" height="248px"></a></li>';
                    // iconHtml += '<li data-val=\"'+i+'\" class="pic_logo" id="pic_logo_'+i+'"><a>'+(i+1)+'</a></li>';

                }
            }
            if (len2 > 0) {
                for (var i = 0; i < len2; i++) {
                    picHtml += '<li class="show_picture"  id="show_pic_' + (i + len) + '"><a onclick=\"__openWin(\'home2\',\'/promotion/index.html?id=' + home_img_arr[i].url_id + '\')\"><img src="\"' + home_img_arr[i].img_url + '\"" class="sliderimg" width="522px" height="248px"></a></li>';
                    // iconHtml += '<li data-val=\"'+(i+len)+'\" class="pic_logo" id="pic_logo_'+(i+len)+'"><a>'+(i+1+len)+'</a></li>';
                }
            }
            if (len == 0 && len2 == 0) {
                return;
            }
            $('.slides_container ul').empty().html(picHtml);
            $('#slides .pagination').empty().html(iconHtml);
            $(document).ready(function (e) {
                var unslider04 = $('#b04').unslider({
                        dots: true
                    }),
                    data04 = unslider04.data('unslider');

                $('.unslider-arrow04').click(function () {
                    var fn = this.className.split(' ')[1];
                    data04[fn]();
                });
            });
            // $(window).resize(function(){imgReload();});
            // $(document).ready(function(e) {
            //     imgReload();
            //     var unslider06 = $('#b03').unslider({
            //         dots: true,
            //         fluid: true
            //     }),
            //     data06 = unslider06.data('unslider');

            // });
            //下面是轮播图
            // (function(_len,clickSelector,parentSelector){
            //     var index = $(parentSelector).data("index") ? parseInt($(parentSelector).data("index")): 0 , picCount=_len;
            //     function swichPic( index ){
            //         $(parentSelector).data("index",index);
            //         $(clickSelector).removeClass("current");
            //         $(parentSelector+"  .show_picture").hide();
            //         $(parentSelector+" #pic_logo_"+index).addClass("current");
            //         $(parentSelector+"  #show_pic_"+index).show();
            //     }
            //     swichPic(index);
            //     $(clickSelector).click(function(){
            //         index = $(this).data("val")-0;
            //         clearInterval(_itl_img);
            //         swichPic(index);
            //         window._itl_img = setInterval(function(){
            //             index = (index+1)>(_len-1) ? 0 : (index+1);
            //             swichPic(index);
            //         },3000);
            //     });
            //     if( typeof(_itl_img) != "undefined" ){
            //         clearInterval(_itl_img);
            //     }
            //     window._itl_img = setInterval(function(){
            //         index = (index+1)>(_len-1) ? 0 : (index+1);
            //         swichPic(index);
            //     },3000);
            // })(len+len2,"#slides  .pagination>li","#slides");
        }

        /*         $.ajax({
         'url': '/cms/getIndexList.html',
         'dataType': 'json',
         'type': 'post'
         }).done(function (data) {
         try{
         if ( session_timeout(data) === false ){
         return false;
         }
         } catch(e){ console.log(e);}
         var len = data.length;
         if (len == '' || len == undefined) {//获取失败，或无数据
         return;
         }
         imgHtml(data,home_img_arr);
         }); */
        // imgHtml([],home_img_arr);
    })();

    lowDataAleady = false;
    /*  $('.tab-sel').on('mouseover', function (e) { //各彩种开奖公告
     for (i = 1; i < 5; i++) { //共3个标签
     if (i == $(this).data('val')) {
     $('#tab-cont-' + i).css('display', '');
     } else {
     $('#tab-cont-' + i).css('display', 'none');
     }
     }
     $('.tab-sel').removeClass("on");
     $(this).addClass("on");
     if ($(this).attr('data-val') == 2 && $('#lastOpenQt').html() === '' && lowDataAleady == false) {//获取低频彩
     lowDataAleady = true;
     $.ajax({
     'url': '/index/getLastLowLot.html',
     'dataType': 'json',
     'type': 'post',
     'success': function (data) {
     try{
     if ( session_timeout(data) === false ){
     return false;
     }
     } catch(e){ console.log(e);}
     if (data.Records.length == 0) {
     return;
     }
     var txtQtHtml = '';//体彩最新开奖信息
     var openArr = [];
     var tmpArr = [];
     for (var i = 0; i < data.Records.length; i++) {
     tmpArr = data.Records[i].period_opennum_opentime.split('___');
     if (tmpArr.length != 3)
     continue;
     openArr = new Array();
     if (tmpArr[1] != '' && tmpArr[1] != undefined) {
     openArr = tmpArr[1].split('|');
     }
     var perName = tmpArr[0];

     function switchHcyNum(number) {
     if (number == '')
     return '';
     var codeSx = ['猪', '鼠', '牛', '虎', '兔', '龙', '蛇', '马', '羊', '猴', '鸡', '狗', '猪'];
     var season = ['', '春', '夏', '秋', '冬'];
     var direct = ['东', '南', '西', '北'];
     var num = parseInt(number);
     var pos = 0;
     if (num > 18) {
     pos = num % 2 == 0 ? 3 : 2;
     } else {
     pos = num % 2 == 0 ? 1 : 0;
     }
     var strNum = number + '|' + codeSx[num % 12] + '|' + season[Math.ceil(num / 9)] + '|' + direct[pos];
     return strNum;
     }
     txtQtHtml += ''
     + '<li>'
     + '<div>'
     + '<span class="lot-name"><a onclick=\"__openWin(\'lottery_hall\',\'' + data.Records[i].link + '\')\" >' + data.Records[i].gname + '&nbsp;</a>' + perName + '期</span>'
     + '<span class="term">' + tmpArr[2].substr(5, 5) + '</span>'
     + '<span class="clear"></span>'
     + '<div class="clear"></div>'
     if (data.Records[i].gid == 32) {
     var num = switchHcyNum(openArr[0]);
     arrNum = num.split('|');
     txtQtHtml += '<div class="redball">' + arrNum[0] + '</div>'
     + '<div class="redball">' + arrNum[1] + '</div>'
     + '<div class="redball">' + arrNum[2] + '</div>'
     + '<div class="redball">' + arrNum[3] + '</div>';
     }
     var openLen = openArr.length;
     for (var j = 0; j < openLen; j++) {
     if (!(j == 0 && data.Records[i].gid == 32)) {
     txtQtHtml += '<div class="redball">' + openArr[j] + '</div>';
     }
     }
     txtQtHtml += '<br>'
     + '<div class="fr">'
     + '<a  onclick="__openWin(\'lottery_trend\',\'/trend/index.html?gameId=' + data.Records[i].gid + '&periods=30\');">走势</a>'
     + '　|　<a onclick="__openWin(\'lottery_hall\',\'' + data.Records[i].link + '\');" >投注</a>'
     + '</div>'
     + '<div class="clear"></div>'
     + '</div>'
     + '</li>';
     }
     $('#lastOpenQt').html(txtQtHtml);
     lowDataAleady=false;
     },
     error: function (XMLHttpRequest, status) {
     lowDataAleady=false;
     process_timeout(status);
     }
     });
     }
     }); */
    $('.tab-mobile').on(
        'mouseover', function (e) { //各彩种开奖公告
            for (i = 1; i < 5; i++) { //共3个标签
                if (i == $(this).data('val')) {
                    $('#tab-mobileapp-' + i).css('display', '');
                } else {
                    $('#tab-mobileapp-' + i).css('display', 'none');
                }
            }

            $('.tab-mobile').removeClass("on");
            $(this).addClass("on");
            if ($(this).attr('data-val') == 2 && $('#lastOpenQt').html() === '' && lowDataAleady == false) {//获取低频彩
                lowDataAleady = true;
            }
        });

    $('#times_nums').val(1);
    $('#bet_amount').text(2);

    var arr = ['01', '02', '03', '04', '05', '06', '07', '08', '09', '10'];
    var arr2 = arr.sort(randomsort);
    for (var i = 0; i < 3; i++) {
        $('#bet_pk' + i).val(arr2[i]);
    }
    //山东11选5
    setEsdNum('#bet_esd');
});

function setEsdNum(e) {
    var arrEsd = [];
    for (var i = 1; i <= 5; i++) {
        var num = parseInt(Math.random(10) * 11 + 1);
        while ($.inArray(num, arrEsd) != -1) {
            num = parseInt(Math.random(10) * 11 + 1);
        }
        arrEsd.push(num);
        $(e + i).val(num);
    }
}

function randomsort(a, b) {
    return Math.random() > .5 ? -1 : 1;
}

function setHelpTab(obj, type) {
    if (type == 'hot') {
        $('#help_tab_hot').addClass('on');
        $('#help_tab_newer').removeClass('on');
        $('#cont_help_hot').css('display', '');
        $('#cont_help_newer').css('display', 'none');
    } else if (type == 'newer') {
        $('#help_tab_newer').addClass('on');
        $('#help_tab_hot').removeClass('on');
        $('#cont_help_newer').css('display', '');
        $('#cont_help_hot').css('display', 'none');
    }
}

//var flag = true;

function doLogOut() {
    $.ajax({
        'url': '/index/ajaxLogOut.html',
        'dataType': 'json',
        'type': 'post',
        'success': function (data) {
            try {
                if (session_timeout(data) === false) {
                    return false;
                }
            } catch (e) {
                console.log(e);
            }
            if (data == null || data == '' || data == undefined || data.Result != true) {
                return;
            }
            $("#need_captcha").hide();//去掉验证码
            $('#login_box').css('display', 'none');
            $('#unlogin_box').css('display', 'block');
        }
    });
}

function initClear() {
    $('.init-clear').val('');
}

function getLotNews() {
    $.ajax({
        'url': '/index/getLotNews.html',
        'dataType': 'json',
        'success': function (data) {
            try {
                if (session_timeout(data) === false) {
                    return false;
                }
            } catch (e) {
                console.log(e);
            }
            var html = "";
            var html2 = "";
            for (var i = 0; i < data.RecordCount; i++) {
                if (i == 0) {
                    $('#newsTitle_1').html(data.Records[i].title);
                    var munId1 = data.Records[i].id;
                    $('#newsTitle_1').bind("click", function () {
                        __openWin('home2', '/news/detail.html?key=' + munId1);
                    });
                }
                if (i == 5) {
                    $('#newsTitle_2').html(data.Records[i].title);
                    var munId2 = data.Records[i].id;
                    $('#newsTitle_2').bind("click", function () {
                        __openWin('home2', '/news/detail.html?key=' + munId2);
                    });
                }

                if (i > 9) {
                    break;
                }

                if (data.Records[i].type) {
                    var status = '技巧';
                } else {
                    var status = '新闻';
                }
                if (i < 5) {
                    html += '<li><a onclick=\"__openWin(\'home2\',\'/news/detail.html?key=' + data.Records[i].id + '\')\" class="c-grey">' + status + '</a><span class="pad c-grey">|</span> <a onclick=\"__openWin(\'home2\',\'/news/detail.html?key=' + data.Records[i].id + '\')\">' + data.Records[i].title + '</a> </li>';

                } else {
                    html2 += '<li><a onclick=\"__openWin(\'home2\',\'/news/detail.html?key=' + data.Records[i].id + '\')\"  class="c-grey">' + status + '</a><span class="pad c-grey">|</span> <a  onclick=\"__openWin(\'home2\',\'/news/detail.html?key=' + data.Records[i].id + '\')\">' + data.Records[i].title + '</a> </li>';
                }
            }
            $("#news-bar-content1 ul").html(html);
            $("#news-bar-content2 ul").html(html2);
        },
        error: function (XMLHttpRequest, status) {
            process_timeout(status);
        }
    });
}
//获取高频彩开奖公告 和首页截止倒计时。
function getLastAndNextPeriod() {
    $.ajax({
        'url': '/index/ajaxGetLastAndNextPeriod.html',
        'dataType': 'json',
        'type': 'post',
        'success': function (data) {
            try {
                if (session_timeout(data) === false) {
                    return false;
                }
            } catch (e) {
                console.log(e);
            }
            if (!data.Records || data.Records.length == 0) {
                return;
            }
            var txtSscHtml = '';//时时彩最新开奖信息
            var txtQtHtml = '';//体彩最新开奖信息
            var openArr = [];
            var tmpArr = [];
            var nextArr = new Array(1, 5, 9, 2, 12);//下一期彩种列表
            for (var i = 0; i < data.Records.length; i++) {
                tmpArr = data.Records[i].period_opennum_opentime.split('___');
                if (tmpArr.length != 3)
                    continue;
                openArr = new Array();
                if (tmpArr[1] != '' && tmpArr[1] != undefined) {
                    openArr = tmpArr[1].split('|');
                }

                if (data.Records[i].flag == 'max') {//时时彩

                    var perName = tmpArr[0].substr(4);
                    if (data.Records[i].gid == 9) {
                        perName = tmpArr[0];
                    }
                    if (data.Records[i].gid == 19) {
                        for (var t = 0; t < 3; t++) {
                            openArr[t] = switchKlpkOneNum(openArr[t]);
                        }
                    }
                    if (data.Records[i].gid != 9) {//去掉北京赛车，因为开奖号码太长，样式有问题。
                        txtSscHtml += ''
                            + '<li>'
                            + '<div>'
                            + '<span class="lot-name"><a onclick=\"__openWin(\'lottery_hall\',\'' + data.Records[i].link + '\')\">' + data.Records[i].gname + '&nbsp;</a>' + perName + '期</span>'
                            + '<span class="term">' + tmpArr[2].substr(5, 5) + '</span>'
                            + '<span class="clear"></span>'
                            + '<div class="clear"></div>';

                        var openLen = openArr.length;
                        for (var j = 0; j < openLen; j++) {
                            txtSscHtml += '<div class="redball">' + openArr[j] + '</div>';
                        }
                        txtSscHtml += '<br>'
                            + '<div class="fr">'
                            + '<a  onclick="__openWin(\'lottery_trend\',\'/trend/index.html?gameId=' + data.Records[i].gid + '&periods=30\');" >走势</a>'
                            + '　|　<a  onclick="__openWin(\'lottery_hall\',\'' + data.Records[i].link + '\');">投注</a>'
                            + '</div>'
                            + '<div class="clear"></div>'
                            + '</div>'
                            + '</li>';
                    }
                }
            }
            if (nextArr.length > 0) {
                nextArr.forEach(function (v) {
                    $('#quick_' + v).remove();
                });
            }

            $('#lastOpenSsc').html(txtSscHtml);
            $('#lastOpenQt').html(txtQtHtml);
        },
        error: function (XMLHttpRequest, status) {
            process_timeout(status);
        }
    });
}

function getNewMsg() {
    $.ajax({
        'url': '/index/ajaxGetNewMsg.html',
        'dataType': 'json',
        'type': 'post',
        'success': function (data) {
            try {
                if (session_timeout(data) === false) {
                    return false;
                }
            } catch (e) {
                console.log(e);
            }
            if (!data.Result) {
                return;
            }
            var allHtml = '';
            var tmpStr = '';
            var count = (data.RecordCount > 4 ) ? 4 : data.RecordCount;
            for (var i = 0; i < count; i++) {
                tmpStr = data.Records[i].title.substr(0, 13);
                tmpStr += (data.Records[i].title.length > tmpStr.length) ? '...' : '';
                allHtml += '<li><a onclick=\"__openWin(\'home2\',\'/index/newsContent.html?skey=' + data.Records[i].sKey + '\')\" >' + tmpStr + '</a></li>';
            }
            if (allHtml == '') {
                allHtml = '暂无公告';
                $("#help_tab_newer").trigger('onmouseover');
            }
            $('#cont_help_hot').html(allHtml);
        },
        error: function (XMLHttpRequest, status) {
            process_timeout(status);
        }
    });
}

//轮播排名列表
function pmCarousel() {
    if ($("#prizeUser p").length <= 9) { //小于9个的时候不用 循环滚动
        return;
    }
    var each_p_h = parseInt(($("#prizeUser").height()) / ($("#prizeUser p").length));//每个p的高度，取整
    //计算滚动方法
    var timer = null;
    clearInterval(timer);
    function goPaly() {
        $("#prizeUser").css("margin-top", "-=1px");
        if ($("#prizeUser").css("marginTop") == "-" + each_p_h + "px") {//刚好移动一个p的高度
            $("#prizeUser").css('margin-top', 0);//顶置
            $('#prizeUser').append($("#prizeUser p").eq(0));//把第一条添加到尾，如此循环
        }
    }

    window.__sItl_1 = setInterval(goPaly, 30);
    $("#prizeUser").bind("mouseover", function () {
        clearInterval(window.__sItl_1);
    });
    $("#prizeUser").bind("mouseout", function () {
        window.__sItl_1 = setInterval(goPaly, 30);
    });
}

/*----------  倒计时功能  ----------*/
//倒计时
leftTime = 0;
interval = 1000;
leftTimeCounter = '';

//获取中奖排行
function getPrizeUser() {

    pmCarousel();


}

$(function () {
    $("#slides_prev").click(function () {
        objTurn.setPrevPic();
    });

    $("#slides_next").click(function () {
        objTurn.setNextPic();
    });

    $("#slides").mouseover(function () {
        $("#slides_prev,#slides_next").css('display', 'block');
    }).mouseleave(function () {
        $("#slides_prev,#slides_next").css('display', 'none');
    });

});

$(function () {
//    _home_menu.checkLogin(); //检查是否登录并显示余额和用户id
//    _home_menu.getGameList("#lottery-list-box");//彩票列表
    // getLastAndNextPeriod();
    //getNewMsg();//系统公告
    //getLotNews();//新闻
    //跑马灯公告
    //  _home_menu.getMqData('#sys_tip_outer');
    getPrizeUser();
});

$(function () {
    setTimeout("initClear()", 100);
});

$(function () {
    $('.down-apple').click(function () {
        $('#img-apple').show();
        $('#img-andoid').hide();
    });
    $('.down-andoid').click(function () {
        $('#img-apple').hide();
        $('#img-andoid').show();
    });
});


$(function () {
    $('.down-apple1').click(function () {
        $('#img-apple1').show();
        $('#img-andoid1').hide();
        $('#ba-apple1').show();
        $('#ba-andoid1').hide();
        $('.down-apple1').addClass('down_now');
        $('.down-andoid1').removeClass('down_now');
    });
    $('.down-andoid1').click(function () {
        $('#img-apple1').hide();
        $('#img-andoid1').show();
        $('#ba-apple1').hide();
        $('#ba-andoid1').show();
        $('.down-apple1').removeClass('down_now');
        $('.down-andoid1').addClass('down_now');
    });
});
getNotice();
function getNotice() {
    $.ajax({
        type: 'GET',
        url: '/index.php/notice/getList',
        data: '',
        dataType: 'json',
        timeout: '8000',
        success: function(results) {
            var a = results.data,html = '';
            if(results.status == "200" && results.data != null) {
                for(var i = 0;i < a.length;i++){
                    if(i == 0){
                        html+='<li class="active"><span class="_icon"></span><a href="javascript:;" onclick="showNotice('+a[i].id+',this)">'+a[i].title+'</a></li>';
                        $('._notice-context').html(a[i].content);
                    }else{
                        html+='<li class=""><span class="_icon"></span><a href="javascript:;" onclick="showNotice('+a[i].id+',this)">'+a[i].title+'</a></li>';
                    }

                }
                $('._notice-nav').html(html);

            }
        }
    });
}
function showNotice(id,p) {
    $('._notice-nav').children('li').removeClass('active');
    $(p).parent().addClass('active');
    $.ajax({
        type: 'GET',
        url: 'index.php/notice/getInfo',
        data: {id:id},
        dataType: 'json',
        timeout: '8000',
        success: function(results) {
            if(results.content != null) {
                $('._notice-context').html(results.content);
            }
        }
    });
}
