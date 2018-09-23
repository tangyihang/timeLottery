var lhc_ball_color = {
  '01': 'color_red',
  '02': 'color_red',
  '07': 'color_red',
  '08': 'color_red',
  '12': 'color_red',
  '13': 'color_red',
  '18': 'color_red',
  '19': 'color_red',
  '23': 'color_red',
  '24': 'color_red',
  '29': 'color_red',
  '30': 'color_red',
  '34': 'color_red',
  '35': 'color_red',
  '40': 'color_red',
  '45': 'color_red',
  '46': 'color_red',

  '03': 'color_blue',
  '04': 'color_blue',
  '09': 'color_blue',
  '10': 'color_blue',
  '14': 'color_blue',
  '15': 'color_blue',
  '20': 'color_blue',
  '25': 'color_blue',
  '26': 'color_blue',
  '31': 'color_blue',
  '36': 'color_blue',
  '37': 'color_blue',
  '41': 'color_blue',
  '42': 'color_blue',
  '47': 'color_blue',
  '48': 'color_blue',

  '05': 'color_green',
  '06': 'color_green',
  '11': 'color_green',
  '16': 'color_green',
  '17': 'color_green',
  '21': 'color_green',
  '22': 'color_green',
  '27': 'color_green',
  '28': 'color_green',
  '32': 'color_green',
  '33': 'color_green',
  '38': 'color_green',
  '39': 'color_green',
  '43': 'color_green',
  '44': 'color_green',
  '49': 'color_green'
};

var pcdd_ball_color = {
  '0': 'color_grey',
  '1': 'color_green',
  '2': 'color_blue',
  '3': 'color_red',
  '4': 'color_green',
  '5': 'color_blue',
  '6': 'color_red',
  '7': 'color_green',
  '8': 'color_blue',
  '9': 'color_red',
  '10': 'color_green',
  '11': 'color_blue',
  '12': 'color_red',
  '13': 'color_grey',
  '14': 'color_grey',
  '15': 'color_red',
  '16': 'color_green',
  '17': 'color_blue',
  '18': 'color_red',
  '19': 'color_green',
  '20': 'color_blue',
  '21': 'color_red',
  '22': 'color_green',
  '23': 'color_blue',
  '24': 'color_red',
  '25': 'color_green',
  '26': 'color_blue',
  '27': 'color_grey'
};

requirejs(["jquery"], function ($) {

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
    resetClick: function () {
      this.curSub = '';
      this.mainItem = '';
    },
    gameShowHide: function () {
      $(function () {
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
    scrollbarlive: function () {
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
    accDiv: function (num1, num2) {
      var t1 = 0,
        t2 = 0,
        r1, r2;
      try {
        t1 = num1.toString().split(".")[1].length
      } catch (e) {
      }
      try {
        t2 = num2.toString().split(".")[1].length
      } catch (e) {
      }
      r1 = Number(num1.toString().replace(".", ""));
      r2 = Number(num2.toString().replace(".", ""));
      return (r1 / r2) * Math.pow(10, t2 - t1);
    },
    calculateBox: function () {
      var winH = $(window).height(), //获取内容区高度
        winW = $(window).width();
      $('#ele-game-wrap').css({width: winW, height: winH});
      if ($('.ele-live-layout').length > 1) { // 如果是够彩大厅
        var boxWidth = $('.ele-live-layout').width() + 14,
          boxNum = Math.floor(this.accDiv(winW, boxWidth));
        $('#ele-live-wrap').css({width: boxNum * (boxWidth)});
      }
    },

    init: function () {
      // 初始页面 购彩大厅区预设动作
      // this.gameShowHide();
      // 缩放视窗
      newLive.scrollbarlive();
      newLive.calculateBox();
      $(window).resize(function () {
        newLive.calculateBox();
      });
    }
  };
  //投注信息
  $(function () {
    getNextPeriod();
  });

  function getLastResult() {
    $.ajax({
      url: '/index/hall/getLastDraw',
      type: 'POST',
      dataType: 'json',
      timeout: 30000,
      success: function (results) {
        var data = results.data;
        if (data.itemCount <= 0) {
          return;
        }
        var txtHtml = '';
        for (var i = 0; i < data.itemCount; i++) {
          var gid = data.items[i].num;
          var period = data.items[i].period;
          var opennum = data.items[i].content;
          opennum = (opennum == undefined || opennum == '') ? '等待开奖' : opennum.replace(/\|/g, ' ');
          $('span.last_period_' + gid).text('第' + period + '期');

          if (opennum != '等待开奖') {
            var temp = '';
            var lastnum = opennum.replace(/\|/g, ' ');
            lastnum = lastnum.split(' ');
            if (gid == "41" || gid == "42") {
              temp = lastnum[0] + ' + ' + lastnum[1] + ' + ' + lastnum[2] + ' = <b style="color:' + pcdd_ball_color[lastnum[3]].replace('color_', '') + '">' + lastnum[3] + '</b>';
            } else if (gid == 18) {
              for (var i = 0; i < lastnum.length; i++) {
                if (i == 6) {
                  temp += "\+&nbsp;<b style=\"color:" + lhc_ball_color[lastnum[i]].replace('color_', '') + "\">" + lastnum[i] + "</b>";
                } else {
                  temp += "<b style=\"color:" + lhc_ball_color[lastnum[i]].replace('color_', '') + "\">" + lastnum[i] + "</b>&nbsp;";
                }
              }
            }
            opennum = temp;
          } else {
            opennum = '<b style="color:red;">' + opennum + '</b>';
          }
          $('p.last_open_' + gid).html(opennum);
        }
      }
    });
  }

  //获取下一期相关数据
  lefttimes = {
    1: '0',
    2: '0',
    3: '0',
    4: '0',
    5: '0',
    7: '0',
    9: '0',
    10: '0',
    11: '0',
    12: '0',
    13: '0',
    14: '0',
    15: '0',
    16: '0',
    17: '0',
    18: '0',
    28: '0',
    41: '0',
    42: '0',
    51: '0',
    52: '0'
  };
  isCanGetNext = true;


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
        var getColorClass = function (num) {
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
      } else if (id == 18 || id == '18') {
        var getColorClass = function (num) {
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
            if (q == 5) openNum_HTML += '<span style="float:left;">+</span>';
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
    var kjzs_link = "common/trend?gameOpen=" + id;
    var kjjg_link = "common/draw?gameOpen=" + id;
    return '<div class="lot-wrap"><div class="lott-top"><div class="lott-name">' + '<a class=\"lott-imgbox\"  onclick="__location(\'common/hall?gameId=' + id + '\');" >' +
      '<img src=\"/assets/statics/images/lottery/' + id + '.png\" class=\"mCS_img_loaded\"></a>' + '<div class="lott-name-righ">' + '<h3>' + name + '</h3>' + '<p>第 ' + issue + ' 期</p>' + '<div class="gct_time"><div class="gct_time_now"><div class="gct_time_now_l">' + time_html(time) + '</div></div></div></div></div><div class="lot-fore">' + openNum_HTML + '</div></div><div class="lott-bot"><a href="/zst/index.php?typeid=' + id + '" target="_blank">开奖结果</a><a href="/zst/index.php?typeid=' + id + '"  target="_blank">开奖走势</a>' + '<a class="lot-btn" onclick="__location(\'/index.php/index/game/' + id + '\')">立即投注</a>' + '</div></div>';
  }

  function time_html(time_str) {
    var time = time_str - 0;
    var time_obj = {h: "00", m: "00", s: "00"};
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

  var lottery = {
    gameIds: "", //（周期：永久）
    obj: {
      "63": "澳门快三",
      "86": "三分时时彩",
      "1": "重庆时时彩",
      "20": "北京赛车(PK10)",
      "83": "北京28",
      "34": "香港⑥合彩",
      "79": "江苏快三",
      "87": "上海时时乐",
      "60": "天津时时彩",
      "12": "新疆时时彩",
      "81": "安徽快三",
      "82": "广西快三",
      "7": "山东11选5",
      "15": "上海11选5",
      "16": "江西11选5",
      "6": "广东11选5",
      "9": "福彩3d",
      "10": "排列三"
    }  //key:id;  value:{ lottery }
  };      //86,1,20,83,34,79,87,60,12,81,82,7,15,16,6,9,10


  function getNextPeriod(all) {
    if (!isCanGetNext) {
      return;
    }
    isCanGetNext = false;
    var param = '';
    for (var k in lefttimes) {
      if (all != 1 && lefttimes[k] > 1) {
        continue;
      }
      if (param != '') {
        param += ',';
      }
      param += k;
    }
    $.ajax({
      url: '/index.php/index/getNextPeriod',
      type: 'GET',
      dataType: 'json',
      data: {},
      timeout: 30000,
      success: function (results) {
        var data = results.data;
        //alert(data);
        if (data.itemCount > 0) {
          for (var j = 0; j < data.itemCount; j++) {


            var id = data.items[j].gameId;
            var link = data.items[j].url;
            var name = lottery.obj[id];
            var issue = data.items[j].issue; //期数
            var time = data.items[j].timeout; //关盘剩余秒数
            var openTime = data.items[j].openTime; //上期开奖剩余秒数
            var openNum = data.items[j].lastIssueNum; //开奖号码

            $("#lot" + id).html(lottery_innerHtml(id, issue, time, openNum, link, name));
            $("#lot" + id).data("issue", issue);
            $("#lot" + id).data("time", time);
            $("#lot" + id).data("opentime", openTime);
            $("#lot" + id).data("opennum", openNum);
            $("#lot" + id).data("lasttimer", new Date().getTime()); // 记录当前彩票的最后一次 ajax 查询的时间，用于后面计算时间间隔。
            $("#lot" + id).data("ajax", "false"); // false，表示 ajax已经结束。
          }
          if (all != 1) {
            //setLeaveTimer();
            timer();
          }
        }
        isCanGetNext = true;
      },
      error: function (e) {
        console.log(e);
      }
    });
  }

  runSec = 1; //定时器运行了多少秒
  firstPage = 1;
  objList = ''; //时间显示jqery对象
  timeLeave = 0; //倒计时剩余时间
  localTime = 0; //最后一次倒计时的本机时间（毫秒）
  isTimerStarted = false; //是否启动了定时器
  function setLeaveTimer() { //启动定时，进行倒计时。
    if (isTimerStarted) {
      return;
    }
    isTimerStarted = true;

    function format(dateStr) { //格式化时间
      return new Date(dateStr.replace(/[\-\u4e00-\u9fa5]/g, "/"));
    }

    function fftime(n) {
      return Number(n) < 10 ? "" + 0 + Number(n) : Number(n);
    }

    function diff(t) { //根据时间差返回相隔时间
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

    //timeLeave = 0//倒计时总秒数
    clearInterval(timerno); //删除定时器
    var timerno = window.setInterval(function () {
      if (runSec < 271) {
        if (runSec % 90 == 0) {
          getLastResult();
        }
        runSec++;
      }
      var tmpLocalTime = new Date().getTime() + 0; //本机毫秒数
      if (localTime > 0 && (tmpLocalTime - localTime) > 3000) { //倒计时已不准确，重新获取倒计时
        getNextPeriod(1);
      }
      localTime = tmpLocalTime;
      //对所有倒计时遍历，重新赋值
      if (objList == undefined || objList == '') {
        objList = $('div.erect-right');
      }
      for (var i = 0; i < objList.length; i++) {
        var tmpGid = $(objList[i]).data('gid');
        var tmpTimeLeave = lefttimes[tmpGid];
        if (tmpTimeLeave > -1) {
          tmpTimeLeave--;
        }
        lefttimes[tmpGid] = tmpTimeLeave;
        if (isCanGetNext && tmpTimeLeave == 0) {
          getNextPeriod();
          continue;
        }
        tmpTimeLeave = (tmpTimeLeave == undefined || tmpTimeLeave == '') ? 0 : tmpTimeLeave;
        var oDate = diff(tmpTimeLeave);
        var ahour = fftime(oDate.hour).toString().split("");
        var aminute = fftime(oDate.minute).toString().split("");
        var asecond = fftime(oDate.second).toString().split("");
        var timeShow = ahour[0] + ahour[1] + ':' + aminute[0] + aminute[1] + ':' + asecond[0] + asecond[1];
        if (gameShowType == 1) { //列表显示
          $('span.time_show_1_' + tmpGid).text(timeShow);
        } else { //宫格显示
          $('span.time_show_2_' + tmpGid).text(timeShow);
        }
      }
    }, 1000);
  }


  function timer() {
    var dealTimer = function () {
      //返回：需要被查询的彩票的id
      var get_gameIdStr = function () {
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
        $.ajax({
          url: '/index.php/index/getNextPeriod',
          type: 'GET',
          dataType: 'json',
          data: {},
          timeout: 30000,
          success: function (results) {
            var data = results.data;
            //alert(data);
            if (data.itemCount > 0) {
              for (var j = 0; j < data.itemCount; j++) {


                var id = data.items[j].gameId;
                var link = data.items[j].url;
                var name = lottery.obj[id];
                var issue = data.items[j].issue; //期数
                var time = data.items[j].timeout; //关盘剩余秒数
                var openTime = data.items[j].openTime; //上期开奖剩余秒数
                var openNum = data.items[j].lastIssueNum; //开奖号码

                $("#lot" + id).html(lottery_innerHtml(id, issue, time, openNum, link, name));
                $("#lot" + id).data("issue", issue);
                $("#lot" + id).data("time", time);
                $("#lot" + id).data("opentime", openTime);
                $("#lot" + id).data("opennum", openNum);
                $("#lot" + id).data("lasttimer", new Date().getTime()); // 记录当前彩票的最后一次 ajax 查询的时间，用于后面计算时间间隔。
                $("#lot" + id).data("ajax", "false"); // false，表示 ajax已经结束。
              }

            }
            isCanGetNext = true;
          },
          error: function (e) {
            console.log(e);
          }
        });
      } catch (e) {
      }
    };
    setInterval(dealTimer, 1000);
  }
});
