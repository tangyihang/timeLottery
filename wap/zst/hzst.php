<?php
$typeid = intval($_REQUEST['typeid']);
?>
<!DOCTYPE html>
<!-- saved from url=(0035)https://cy16cp.com/trend/index.html -->
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <style>
        body, #wrapper_1 {
            -webkit-overflow-scrolling: touch;
            overflow-scrolling: touch;
        }

        /*解决苹果滚动条卡顿的问题*/
        #wrapper_1 {
            overflow-y: visible !important;
        }
    </style>
    <style>
        span.cur {
            position: relative;
            z-index: 3;
        }
        .trend-content1 table,.trend-content1 tbody { width: 100%; box-sizing: border-box; clear:both;}
        .trend-content1 table th,.trend-content1 table td { width: 8.5%; text-align: center; border-right: 1px solid #e6dfd7; box-sizing: border-box; height: 34px; line-height: 34px; color: #fff;font-size: 80%;padding: 0 2px;}
        .trend-bg-1 td, .trend-bg-1 th {
            background: #2f5542;
        }
        .trend-bg-2 td {
            background: #1c6a4c;
        }
    </style>
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" name="viewport">
    <meta name="format-detection" content="telphone=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="mobile-web-app-capable" content="yes">
    <link rel="stylesheet" href="new/global.css" type="text/css">

    <script src="new/jquery.min.js"></script>
    <script src="new/iscro-lot.js"></script>
    <script>
      try {
        isLogin = false;
      } catch (e) {
        console.log(e);
      }
    </script>
    <script>
      $(function () {
        var _padding = function () {
          try {
            var l = $("body>.header").height();
            if ($("body>.lott-menu").length > 0) {
              l += $("body>.lott-menu").height();
            }
            $("#wrapper_1").css("paddingTop", l + "px");
          } catch (e) {
          }
          try {
            if ($("body>.menu").length > 0) {
              var l = $("body>.menu").height();
            }
            $("#wrapper_1").css("paddingBottom", l + "px");
          } catch (e) {
          }
        };
        (function () {
          _padding();
        })();
        $(window).bind("load", _padding);

      });

    </script>
    <script>
      function loaded() {
      }//空实现
      //document.addEventListener('touchmove', function (e) { e.preventDefault(); }, false); //uc浏览器滑动
    </script>
    <title>走势图</title>
    <script>
      //对象转数组
      function obj2arr(obj) {
        var arr = [];
        for (var item in obj) {
          arr.push(obj[item]);
        }
        return arr;
      }
    </script>
    <script>
      function drawLine() {
        var cvList = $('div#chartsDiv canvas');
        for (var i = 0; i < cvList.length; i++) {
          var tmpCv = cvList[i];
          var width = $(tmpCv).width();
          var height = $(tmpCv).height();
          var direc = $(tmpCv).data('direc');
          width = (width == undefined) ? 0 : parseInt(width);
          height = (height == undefined) ? 0 : parseInt(height);
          var context = tmpCv.getContext('2d');
          context.beginPath();
          if (direc == 1) {
            context.moveTo(0, 0);
            context.lineTo(width, height);
          } else {
            context.moveTo(0, height);
            context.lineTo(width, 0);
          }
          context.strokeStyle = '#FF0000';
          context.stroke();
        }
      }
    </script>
</head>
<body class="login-bg" onload="loaded()" waid71fa0d88-5390-4b5b-a2f4-e45fa93d85e2="SA password protect entry checker"
      style="">
<div class="header">
    <div class="headerTop">
        <div class="ui-toolbar-left">
            <button id="reveal-left">reveal</button>
        </div>
        <h1 class="ui-betting-title">
            <div class="bett-top-box">
                <!--<div class="bett-play">玩法</div>-->
                <div class="bett-tit"><span id="msg_type">基本走势</span><!--<i class="bett-attr"></i>--></div>
            </div>
        </h1>
        <div class="ui-bett-right trend-icon">
            <a class="bett-heads" href="javascript:;"></a>
        </div>
    </div>
</div>

<div id="wrapper_1" class="scorllmain-content scorllmain-Beet nobottom_bar"
     style="padding-top: 44px; padding-bottom: 44px;">
    <div class="sub_ScorllCont">
        <div id="chartsDiv" class="trend-content1">
            <table id="trend_table" cellpadding="0" cellspacing="0">
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
    <div class="trend-foot">
        <div class="trend-foot-txt">
            <span id="game_name" style="align: center; color:#999;">福彩3D</span>
            <!--<span class="red"></span>-->
        </div>
        <button class="trend-add">去投一注</button>
    </div>
    <!-- 直选tips -->
    <div class="beet-tips" hidden="">
        <!--<div class="beet-tips-tit"><span>普通玩法</span></div>-->
        <div class="clear"></div>
        <ul id="play_list">
            <li><a class="beet-active" href="javascript:;">走势图</a></li>
        </ul>
    </div>
    <!-- 走势图彩种tips -->
    <div class="trend-tips" hidden="" style="display: none;">
        <div class="trtip-tit"><i class="tr-icon"></i>选择彩种</div>
        <ul>
            <li class="game_li_63 <?php if ($typeid == 63) {
                echo 'trend-on';
            } ?>" data-gid="63" data-enable="0">澳门快三
            </li>
            <li class="game_li_86 <?php if ($typeid == 86) {
                echo 'trend-on';
            } ?>" data-gid="86" data-enable="0">三分时时彩
            </li>
            <li class="game_li_1 <?php if ($typeid == 1) {
                echo 'trend-on';
            } ?>" data-gid="1" data-enable="0">重庆时时彩
            </li>
            <!--<li class="game_li_12 <?php if ($typeid == 12) {
                echo 'trend-on';
            } ?>" data-gid="12" data-enable="0">新疆时时彩</li>
        <li class="game_li_60 <?php if ($typeid == 60) {
                echo 'trend-on';
            } ?>" data-gid="60" data-enable="0">天津时时彩</li>
        <li class="game_li_87 <?php if ($typeid == 87) {
                echo 'trend-on';
            } ?>" data-gid="87" data-enable="0">上海时时乐</li>-->
            <li class="game_li_83 <?php if ($typeid == 83) {
                echo 'trend-on';
            } ?>" data-gid="83" data-enable="0">北京28
            </li>
            <li class="game_li_80 <?php if ($typeid == 80) {
                echo 'trend-on';
            } ?>" data-gid="80" data-enable="0">幸运28
            </li>

            <li class="game_li_20 <?php if ($typeid == 20) {
                echo 'trend-on';
            } ?>" data-gid="20" data-enable="0">北京PK拾
            </li>
            <li class="game_li_85 <?php if ($typeid == 85) {
                echo 'trend-on';
            } ?>" data-gid="85" data-enable="0">三分PK拾
            </li>

            <!--<li class="game_li_6 <?php if ($typeid == 6) {
                echo 'trend-on';
            } ?>" data-gid="6" data-enable="0">广东11选5</li>
        <li class="game_li_7 <?php if ($typeid == 7) {
                echo 'trend-on';
            } ?>" data-gid="7" data-enable="0">山东11选5</li>
        <li class="game_li_15 <?php if ($typeid == 15) {
                echo 'trend-on';
            } ?>" data-gid="15" data-enable="0">上海11选5</li>
        <li class="game_li_16 <?php if ($typeid == 16) {
                echo 'trend-on';
            } ?>" data-gid="16" data-enable="0">江西11选5</li>

        <li class="game_li_81 <?php if ($typeid == 81) {
                echo 'trend-on';
            } ?>" data-gid="81" data-enable="0">安徽快三</li>
        <li class="game_li_82 <?php if ($typeid == 82) {
                echo 'trend-on';
            } ?>" data-gid="82" data-enable="0">广西快三</li>
        <li class="game_li_79 <?php if ($typeid == 79) {
                echo 'trend-on';
            } ?>" data-gid="79" data-enable="0">江苏快三</li>

        <li class="game_li_9 <?php if ($typeid == 9) {
                echo 'trend-on';
            } ?>" data-gid="9" data-enable="0">福彩3D</li>
        <li class="game_li_10 <?php if ($typeid == 10) {
                echo 'trend-on';
            } ?>" data-gid="10" data-enable="0">排列三</li>-->
            <li class="game_li_34 <?php if ($typeid == 34) {
                echo 'trend-on';
            } ?>" data-gid="34" data-enable="0">香港六合彩
            </li>
        </ul>
    </div>
    <!--<div class="tips-bg" hidden=""></div>-->

    <style>
        .center {
            text-align: center
        }
    </style>

    <div class="beet-odds-tips round" id="tip_pop" style="display: none; height:130px;">
        <div class="beet-odds-info f100">
            <div class="beet-money" id="tip_pop_content" style="font-size: 120%; margin-top: 15px; color:#666;">
                号码选择有误
            </div>
        </div>
        <div class="beet-odds-info text-center">
            <button class="btn-que" style="width: 100%;" onclick="tipOk()"><span>确定</span></button>
        </div>
    </div>

    <div id="tip_bg" class="tips-bg" style="display: none;"></div>
    <input id="play" value="1" type="hidden">
    <script>
      var func;
      function tipOk() {
        $('#tip_pop').hide();
        $('#tip_bg').hide();
        if (/系统维护/g.test($('div#tip_pop_content').html())) {
          location.href = '/index/index.html';
          return;
        }
        if (typeof(func) == "function") {
          func();
          func = "";
        } else {
          if (typeof(doTipOk) == "function") {
            doTipOk();
          }
        }
      }
      function msgAlert(msg, funcParm) {
        $('div#tip_pop_content').html(msg);
        $('div#tip_pop').show();
        $('div#tip_bg').show();
        func = (funcParm == "" || typeof(funcParm) != "function") ? '' : funcParm;
      }
    </script>

    <script>
        /*$('.ui-betting-title').click(function(){
         $('.beet-tips').toggle();
         });*/
        $('.bett-top').click(function (event) {
          event.stopPropagation();
        });
        $('.trend-icon').click(function () {
          $('.trend-tips').show();
          $('.tips-bg').show();
        });

        $('.tips-bg').click(function () {
          $('.trend-tips').hide();
          $('.tips-bg').hide();
        })

        function showPosTitle() {
          //显示游戏名
          var gNameArr = $('li.game_li_' + trendGid).html();
          $('span#game_name').text(gNameArr);

          trendPos = 1;//默认1
          $('div#trend_pos').html('');
        }
    </script>
    <script>
      gameOpArr = {
        1: 'fcsd', 2: 'tcps', 3: 'ssl', 4: 'tjssc', 5: 'cqssc', 6: 'jxssc', 7: 'xjssc', 9: 'pk10'
        , 10: 'jsks', 11: 'ahks', 12: 'elevensd', 13: 'elevensh', 14: 'elevenjx', 15: 'elevengd'
        , 16: 'jlks', 17: 'gxks', 51: 'sfc', 52: 'twpk10', 63: 'amk3'
      };
      $('button.trend-add').click(function () {
        if ($('li.game_li_' + trendGid).data('enable') == 1) {
          msgAlert('该彩种正在维护！');
          return;
        }
        location.href = '/index.php/index/game/' + trendGid;
      });
    </script>
    <script>
      trendGid = '<?=$typeid?>';
      trendCount = 20;
      trendPos = 1;
      noStr = '0|1|2|3|4|5|6|7|8|9';
      getTrendData();
      function getTrendData() {
        if (trendGid == null || trendGid == undefined || trendGid == '') {
          trendGid = 1;
        }
        $.ajax({
          url: '/index/getDrawLists',
          type: 'POST',
          dataType: 'json',
          data: {
            'gameId': trendGid,
          },
          timeout: 30000,
          success: function (results) {
            if (results.status == "200") {
              var data = results.data;
              var txtHtml = '';
              var headHtml = '';
              var txtOpen = '正在开奖';
              headHtml = '<tr class="trend-bg-1">' +
                '<th>期数</th>' +
                '<th>开奖</th>' +
                '<th>和值</th>' +
                '<th>大小</th>' +
                '<th>单双</th>' +
                '</tr>';
              headHtml += '</tr>';
              for (var i = 0; i < data.length; i++) {
                var numArr = data[i].data;
                numArr = (numArr != undefined && numArr != '') ? numArr.split(',') : [];
                var tmpHtml = '';

                var total = 0;
                tmpHtml += '<td>' + data[i].number + '</td>';
                tmpHtml += '<td>';
                for (var j = 0; j < numArr.length; j++) {
                  total += parseInt(numArr[j]);
                  tmpHtml += '<i>' + numArr[j] + '</i>';
                }
                tmpHtml += '</td>'
                if (tmpHtml == '') {
                  tmpHtml = txtOpen + '<br>';
                  txtOpen = '';
                  continue;
                } else {
                  var num1 = parseInt(numArr[0]);
                  var num5 = parseInt(numArr[4]);
                  tmpHtml += '<td>' + total + '</td>';
                  tmpHtml += '<td>' + (total >= 10 ? '大' : '小') + '</td>';
                  tmpHtml += '<td>' + (total % 2 == 0 ? '双' : '单') + '</td>';
                }
                txtHtml += '<tr class="trend-bg-'+(i % 2 == 0 ? '1' : '2')+'">' + tmpHtml + '</tr>';
              }
              var startHtml = '<tr class="trend-bg-1"><td colspan="5">' + results.time + '开奖：</td></tr>';
              var endHtml = '<tr class="trend-bg-1"><td colspan="5">已显示近期走势</td></tr>';
              console.log(headHtml, txtHtml);
              $('#trend_table').html(startHtml + headHtml + txtHtml + endHtml);
            } else {
              $('#trend_table').html(results.msg)
            }
          }
        });
      };

    </script>
</body>
</html>