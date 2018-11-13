<!DOCTYPE html>
<html>
<head>
    <!-- <base id="base_path" href="https://m.cp89001.com/"> -->

    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" name="viewport"/>
    <meta name=format-detection content="telphone=no"/>
    <meta name=apple-mobile-web-app-capable content=yes/>

    <title>喜羊羊彩</title>

    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="uploadimg/wapicon/icon-57.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="uploadimg/wapicon/icon-72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="uploadimg/wapicon/icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="uploadimg/wapicon/icon-144.png">

    <link rel="stylesheet" href="/assets/statics/css/style.css" type="text/css">
    <link rel="stylesheet" href="/assets/statics/css/global.css" type="text/css">
    <link rel="stylesheet" href="/assets/statics/ionicons-3.0/dist/css/ionicons.css" type="text/css">

    <script type="text/javascript">
      if (('standalone' in window.navigator) && window.navigator.standalone) {
        var noddy, remotes = false;
        document.addEventListener('click', function (event) {
          noddy = event.target;
          while (noddy.nodeName !== 'A' && noddy.nodeName !== 'HTML') noddy = noddy.parentNode;
          if ('href' in noddy && noddy.href.indexOf('http') !== -1 && (noddy.href.indexOf(document.location.host) !== -1 || remotes)) {
            event.preventDefault();
            document.location.href = noddy.href;
          }
        }, false);
      }
    </script>
</head>

<body class="login-bg">
<div class="header">
    <div class="headerTop">
        <div class="ui-toolbar-left">
            <button id="reveal-left2" onclick="location.href='/'">reveal</button>
        </div>
        <h1 class="ui-toolbar-title">个人中心</h1>
        <div class=" header-icon">
            <a class="header-setting" href="/index.php/safe/more"></a>
        </div>
    </div>
</div>

<div id="wrapper_1" class="scorllmain-content top_bar bottom_bar">
    <div class="sub_ScorllCont">
        <div class="mine-top">
            <div class="mine-head">
                <div class="mine-img"><img src="/assets/statics/images/geren_tou.png" alt=""></div>
                <div class="mine-name"><?php echo $this->user['username'] ?></div>
            </div>
            <div class="mine-info">
                <ul>
                    <li>
                        <div class="mine-tit">￥<span id="balance">0.00</span></div>

                        <p><a href="javascript:void(0)">余额</a>&nbsp;<a onclick="getWinAmount1()" class="mine-refresh2">[刷新]</a>
                        </p>

                    </li>
                    <li>
                        <a href="javascript:void(0);" style="color: rgb(255, 255, 255);line-height: 45px;"><i
                                    class="icon-iphone-icon"></i> 手机购彩APP</a>
                    </li>
                    <li>
                        <a href="javascript:void(0);" onclick="cOnclick();" style="color: rgb(255, 255, 255);line-height: 45px;"><i
                                    class="icon-4"></i> 在线客服</a>
                    </li>
                </ul>
            </div>
        </div>
        <script>
          function zxkf() {
              <?php if($this->settings['kefuStatus']){ ?>
            layer.open({
              type: 2,
              area: ['800px', '550px'],
              zIndex: 1999,
              //fixed: false, //不固定
              title: '在线客服',
              scrollbar: false,//屏蔽滚动条
              //maxmin: true,
              content: '<?=$this->settings['kefuGG']?>'
            });
              <?php }else{?>
            $.alert("客服系统维护中");
              <?php }?>
            return false;
          }
        </script>
        <div class="mine-but" style="padding-top: 15px;">
            <a href="/cash/recharge" class="recharge"><img src="/assets/statics/images/geren_cz_01.png"></a>
            <a id="withdraw_set" href="javascript:;" class="withdraw"><img
                        src="/assets/statics/images/geren_tixian_01.png" alt=""></a>
            <!--<a href="member/checkin" class="checkin"><img src="/assets/statics/images/geren_qd_01.png" alt=""></a>-->

        </div>

        <div class="mine-list">
            <ul>
                <li>
                    <a href="/index.php/report/myspread">
                        <img src="/assets/statics/images/shezhi_04.png" alt="">我的推荐 [<b
                                style="font-size:13px;">推荐好友获取收益</b>]
                    </a>
                </li>
                <li>
                    <a href="/index.php/notice/info">
                        <img src="/assets/statics/images/geren_tubiao_06.png" alt="">系统公告
                    </a>
                </li>
                <li>
                    <a href="/index.php/record/search">
                        <img src="/assets/statics/images/geren_tubiao_13.png" alt="">投注记录
                    </a>
                </li>
                <li>
                    <a href="/index.php/record/win">
                        <img src="/assets/statics/images/geren_tubiao_24.png" alt="">中奖记录
                    </a>
                </li>
                <li>
                    <a href="/index.php/report/coin">
                        <img src="/assets/statics/images/geren_tubiao_26.png" alt="">账户明细
                    </a>
                </li>
                <li>
                    <a href="/index.php/cash/rechargeLog">
                        <img src="/assets/statics/images/geren_tubiao_04.png" alt="">充值记录
                    </a>
                </li>
                <li>
                    <a href="/index.php/cash/toCashLog">
                        <img src="/assets/statics/images/geren_tubiao_13.png" alt="">提款记录
                    </a>
                </li>
                <!-- <li>
                    <a href="member/checkin/list">
                        <img src="/assets/statics/images/geren_tubiao_hb.png" alt="">签到记录
                    </a>
                </li>
                <li>
                    <a href="index.php/box/receive">
                        <img src="/assets/statics/images/geren_tubiao_06.png" alt="">个人消息<span id="count_unread"></span> <i class="red-icon" id="flag_unread" style="display:none;"></i>
                    </a>
                </li> -->
                <li>
                    <a href="/index.php/safe/more">
                        <img src="/assets/statics/images/geren_tubiao_30.png" alt="">更多
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>


<div class="menu">
    <ul>
        <li>
            <a class="menu-home" href="/"><i class="ion-ios-home-outline"></i>
                <p>首页</p></a>
        </li>
        <li>
            <a class="menu-color" href="/index.php/index/hall"><i class="ion-ios-cart-outline"></i>
                <p>购彩</p></a>
        </li>
        <li>
            <a class="menu-lot" href="/index/draw"><i class="ion-ios-trophy-outline"></i>
                <p>开奖</p></a>
        </li>
        <li>
            <a class="menu-news" href="/zst/hzst.php?typeid=63&g=1"><i class="ion-ios-pulse"></i>
                <p>走势</p></a>
        </li>
        <li>
            <a class="menu-my" style="color: #ec0909;" href="/safe/Personal"><i class="ion-ios-person"></i>
                <p>我的</p></a>
        </li>
    </ul>
</div>


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

<input type="hidden" id="refresh_unread" value="0"/>
<input type="hidden" id="is_question_set" value="0"/>

<script src="/assets/js/require.js"></script>
<script src="/assets/js/require.config.js"></script>
<script type="text/javascript">
  requirejs(["jquery", "layer", "common"], function ($) {
    $(function () {
      getWinAmount();


      // getUnReadCount();
      $('#indexlog_out').click(function () {
        var index = layer.open({
          content: '您确定要退出登录吗？', btn: ["确定", "取消"], yes: function () {
            layer.close(index);
            doLogout();
          }
        });
      });
      $(".mine-refresh2").on("click", function (e) {
        e.preventDefault();
        getWinAmount();
      });

      $('#withdraw_set').on('click', function () {
          /* if($('#is_question_set').val() == 0) {
           var index = layer.open({content:'请先设置密保！',btn:["确定"],yes:function(){
           layer.close(index);

           location.href = 'member/question'
           }});
           } else { */
        location.href = '/cash/withdraw'
          /* } */
      });

      //退出登录
      function doLogout() {
        $.ajax({
          url: 'common/logout',
          type: 'GET',
          dataType: 'json',
          data: {},
          timeout: 30000,
          success: function (data) {
            if (data.status == '200') {
              isLogin = false;
              location.href = 'common/login';
            }
          }
        });
      }

      //累计投注总额，最近出款总额
      function getWinAmount() {
        $.ajax({
          url: '/index.php/safe/userInfo',
          type: 'GET',
          dataType: 'json',
          timeout: 30000,
          success: function (results) {

            $('span#balance').text(results); //余额
          }
        });
      }

      //未读消息数量
      // function getUnReadCount() {
      //     $.ajax({
      //         url: 'member/getUnreadCount', //获取未读信息
      //         type: 'POST',
      //         dataType: 'json',
      //         timeout: 30000,
      //         success: function(data) {
      //             if (data.status == '200' && data.data > 0) {
      //                 $('span#count_unread').text('(' + data.data + ')');
      //                 $('i#flag_unread').show();
      //             } else {
      //                 $('span#count_unread').text('');
      //                 $('i#flag_unread').hide();
      //             }
      //         }
      //     });
      // }
    });
  });

  var func;
  function tipOk() {
    $('#tip_pop').hide();
    $('#tip_bg').hide();
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

  function getWinAmount1() {
    $.ajax({
      url: '/index.php/safe/userInfo',
      type: 'GET',
      dataType: 'json',
      timeout: 30000,
      success: function (results) {

        $('span#balance').text(results); //余额
      }
    });
  }
  function cOnclick() {
    alert('在线客服QQ:1163408818');
  }
</script>
</body>

</html>