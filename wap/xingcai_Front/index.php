<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>


    <meta http-equiv=Content-Type content="text/html;charset=utf-8">
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=0" name="viewport"/>
    <meta name=format-detection content="telphone=no"/>
    <meta name=apple-mobile-web-app-capable content=yes/>

    <title>喜羊羊彩</title>

    <link rel="stylesheet" href="assets/statics/css/global.css" type="text/css">
    <link rel="apple-touch-icon-precomposed" sizes="57x57" href="uploadimg/wapicon/icon-57.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="uploadimg/wapicon/icon-72.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="uploadimg/wapicon/icon-114.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="uploadimg/wapicon/icon-144.png">
    <link rel="stylesheet" href="assets/statics/ionicons-3.0/dist/css/ionicons.css" type="text/css">
    <link rel="stylesheet" href="assets/statics/css/index.css" type="text/css">

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

<style>

    .notice-index {
        padding-top: 10px;
    }

    .notice-index dl dd.time {
        color: #f00;
        text-align: center;
        margin-top: 5px;
    }

    .notice-index dl dd.cont {
        font-size: 14px;
        line-height: 24px;
        margin-top: 10px;
        text-indent: 2em;
    }

    .notice-index dl dt {
        text-align: center;
        font-size: 16px;
        font-weight: bold;
    }

    ._notice {
        position: fixed;
        z-index: 1000;
        background-color: rgba(0, 0, 0, 0.7);
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        display: none;
    }

    ._notice-wrapper {
        position: absolute;
        left: 20px;
        right: 20px;
        top: 50%;
        transform: translate3d(0, -50%, 0);
        background-color: #fff;
        border-radius: 5px;
        height: 80%;
        overflow-y: auto;
        /*box-shadow: 0 0 0 5px rgba(255,255,255,.3);*/
    }

    ._notice-wrapper .title {
        height: 40px;
        line-height: 40px;
        width: 100%;
        text-align: center;
        font-size: 20px;
        font-weight: 400;
        letter-spacing: 3px;
        color: #fff;
        background-color: #F13131;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 2;
    }

    ._notice-wrapper .close {
        height: 40px;
        position: absolute;
        top: 0;
        right: 0;
        font-size: 28px;
        line-height: 40px;
        color: #fff;
        padding: 0 15px;
    }

    ._notice-list {
        width: 100%;
        box-sizing: border-box;
        padding: 10px 10px 10px;
        position: absolute;
        top: 40px;
        left: 0;
        right: 0;
        bottom: 0;
        box-sizing: border-box;
        overflow: hidden;
        overflow-y: auto;
        overflow-x: hidden;
    }

    ._notice-list li {
        width: 100%;
        border-bottom: 1px dashed #dbdbdb;
    }

    ._notice-list li.active .notice-content {
        display: block;
    }

    .notice-tit {
        height: 40px;
    }

    .notice-tit p:last-child {
        margin: 0 100px 0 0;
        height: 100%;
        overflow: hidden;
        text-overflow: ellipsis;
        white-space: nowrap;
        line-height: 40px;
        text-indent: 20px;
        position: relative;
        font-size: 16px;
        color: #212A31;
    }

    .notice-tit p:last-child:before {
        content: "";
        display: block;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        background-color: #F13131;
        top: 14px;
        left: 0;
        position: absolute;
    }

    .notice-tit p:first-child {
        float: right;
        width: 90px;
        padding: 0 0 0 10px;
        white-space: nowrap;
        line-height: 40px;
        box-sizing: content-box;
        text-align: right;
        font-size: 14px;
        color: #A9A9A9;
    }

    .notice-content {
        color: #5C5C5C;
        padding-bottom: 15px;
        display: none;
    }
</style>

<style>



._notice2 {
    position: fixed;
    z-index: 1000;
    background-color: rgba(0, 0, 0, 0.7);
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: none;
}

._notice-wrapper2 {
    position: absolute;
    left: 20px;
    right: 20px;
    top: 50%;
    transform: translate3d(0, -50%, 0);
    background-color: #fff;
    border-radius: 5px;
    height: 80%;
    overflow-y: auto;
    /*box-shadow: 0 0 0 5px rgba(255,255,255,.3);*/
}

._notice-wrapper2 .title2 {
    height: 40px;
    line-height: 40px;
    width: 100%;
    text-align: center;
    font-size: 20px;
    font-weight: 400;
    letter-spacing: 3px;
    color: #fff;
    background-color: #F13131;
    position: absolute;
    top: 0;
    left: 0;
    z-index: 2;
}

._notice-wrapper2 .close2 {
    height: 40px;
    position: absolute;
    top: 0;
    right: 0;
    font-size: 28px;
    line-height: 40px;
    color: #fff;
    padding: 0 15px;
}

._notice-list2 {
    width: 100%;
    box-sizing: border-box;
    padding: 10px 10px 10px;
    position: absolute;
    top: 40px;
    left: 0;
    right: 0;
    bottom: 0;
    box-sizing: border-box;
    overflow: hidden;
    overflow-y: auto;
    overflow-x: hidden;
}

._notice-list2 li {
    width: 100%;
    border-bottom: 1px dashed #dbdbdb;
}

._notice-list2 li.active .notice-content {
    display: block;
}

.notice-tit2 {
    height: 40px;
}

.notice-tit2 p:last-child {
    margin: 0 100px 0 0;
    height: 100%;
    overflow: hidden;
    text-overflow: ellipsis;
    white-space: nowrap;
    line-height: 40px;
    text-indent: 20px;
    position: relative;
    font-size: 16px;
    color: #212A31;
}

.notice-tit2 p:last-child:before {
    content: "";
    display: block;
    width: 12px;
    height: 12px;
    border-radius: 50%;
    background-color: #F13131;
    top: 14px;
    left: 0;
    position: absolute;
}

.notice-tit2 p:first-child {
    float: right;
    width: 90px;
    padding: 0 0 0 10px;
    white-space: nowrap;
    line-height: 40px;
    box-sizing: content-box;
    text-align: right;
    font-size: 14px;
    color: #A9A9A9;
}

.notice-content2 {
    color: #5C5C5C;
    padding-bottom: 15px;
    display: none;
}
</style>

<body>
<div id="website_notice" class="_notice">
    <div class="_notice-wrapper">
        <div class="title">平台公告<span class="close">×</span></div>
        <ul class="_notice-list">
            <li>

            </li>
        </ul>
    </div>
</div>

<div id="website_kf" class="_notice2" style="display: none;">
    <div class="_notice-wrapper2">
        <div class="title2">在线客服<span class="close2">×</span></div>
        <ul class="_notice-list2">
            <li>在线客服QQ:1163408818</li>
        </ul>
    </div>
</div>

<div class="header">
    <div class="headerTop header-logo">
        <?php if ($_SESSION[$this->memberSessionName]) {?>
            <div class="ui-toolbar-left">
                <button id="header-left" onClick="location.href='/safe/Personal';return false;">reveal</button>
            </div>
            <div class="ui-betting-title  header-center">
                <div class="header-title"
                     style="margin-top:0px;background: url(/images/logo.png); background-size:100px 35px; width: 100px; height: 35px;">
                    <span class="header-tit"></span>
                </div>
            </div>
            <!--<button id="header-checkin" onclick="location.href='/';return false;"></button>-->
        <?php } else {?>
            <div class="ui-toolbar-left">
                <button id="header-left2" onClick="location.href='user/login';return false;">reveal</button>
            </div>
            <div class="ui-betting-title  header-center">
                <div class="header-title"
                     style="margin-top:0px;background: url(/images/logo.png); background-size:100px 35px; width: 100px; height: 35px;">
                    <span class="header-tit"></span>
                </div>
            </div>
            <div class=" header-icon">
                <a class="header-head" href="user/regs"></a>
            </div>

        <?}?>

    </div>
</div>
<div id="wrapper_1" class="scorllmain-content top_bar bottom_bar">
    <div class="sub_ScorllCont">
        <div class="header-banner" style="height: 160px; overflow: hidden;">
            <a href="/index.php/index/activity"><img class="banner" style="width: 100%;height:157px; display: block;"
                                                     src="/assets/statics/img/top1.jpg"></a>
            <a href="/index.php/index/activity_info?id=2"><img class="banner"
                                                               style="width: 100%;height:157px; display: none;"
                                                               src="/assets/statics/img/top2.jpg"></a>
            <a href="/index.php/index/activity_info?id=1"><img class="banner"
                                                               style="width: 100%;height:157px; display: none;"
                                                               src="/assets/statics/img/top3.jpg"></a>
            <a href="/index.php/index/activity_info?id=5"><img class="banner"
                                                               style="width: 100%;height:157px; display: none;"
                                                               src="/assets/statics/img/top4.jpg"></a>
        </div>
        <div class="bulletin" onClick="location.href='notice/info';">
            <i style="color: #ec0909;" class="bull-ila ion-md-volume-up"></i>
            <marquee style="font-size: 0.9rem;" behavior="scroll"><span id="horse"></span> <?php
$seting = $this->getSystemSettings();
/* $sql="select title from {$this->prename}content where enable=1 and nodeId=1";
$sql.=' order by addTime desc';
$val = $this->getValue($sql);*/
echo $seting['webGG'];
?></marquee>
            <i class="bull-arrow ion-ios-arrow-forward"></i>
        </div>
        <div class="index-menu">
            <ul>
                <li>
                    <a href="/safe/Personal"><img src="assets/statics/img/menu1.png">
                        <p>存款充值</p></a>
                </li>
                <!--<li>
                    <a href="/index.php/index/mfsw"><img src="assets/statics/img/menu3.png">
                        <p>免费试玩</p></a>
                </li>-->
                <li>
                    <a href="/index.php/index/activity"><img src="assets/statics/img/menu2.png">
                        <p>优惠活动</p></a>
                </li>
                <li>
                    <!-- <a href="http://wpa.qq.com/msgrd?v=3&uin=1163408818&site=qq&menu=yes"
                       target="_blank"><img src="assets/statics/img/menu4.png">
                        <p>在线客服</p></a> -->
                    <script type="text/javascript">


                    </script>

                    <a href="#" onclick="cOnclick();"><img src="assets/statics/img/menu4.png">
                        <p>在线客服</p></a>
                </li>
            </ul>
        </div>
        <div style="clear:both;"></div>
        <div class="hot-tit "><a href="javascript:;">
                <i style="color: #ec0909;margin-right: 5px;font-size: 1rem;" class="ion-ios-flame"></i>热门彩种</a></div>
        <div class="hot-lot">
            <ul>
                <li>
                    <a href="/index.php/index/game/63">
                        <div class="hot-icon icon_idx_0"><img class="" src="assets/statics/images/icon/63.png"></div>
                        <div class="hot-text text_idx_0"><span>澳门快三</span>
                            <p>5分钟一期</p></div>
                    </a>
                </li>
                <li>
                    <a href="/index.php/index/game/86">
                        <div class="hot-icon icon_idx_0"><img class="" src="assets/statics/images/icon/51.png"></div>
                        <div class="hot-text text_idx_0"><span>三分时时彩</span>
                            <p>3分钟一期</p></div>
                    </a>
                </li>
                <li>
                    <a href="/index.php/index/game/1/2/12">
                        <div class="hot-icon icon_idx_0"><img class="" src="assets/statics/images/icon/5.png"></div>
                        <div class="hot-text text_idx_0"><span>重庆时时彩</span>
                            <p>全天120期</p></div>

                    </a>
                </li>

                <li>
                    <a href="/index.php/index/game/20">
                        <div class="hot-icon icon_idx_0"><img class="" src="assets/statics/images/icon/9.png"></div>
                        <div class="hot-text text_idx_0"><span>北京赛车</span>
                            <p>全天179期</p></div>

                    </a>
                </li>

                <!-- <li>
                    <a href="/index.php/index/game/83">
                        <div class="hot-icon icon_idx_0"><img class="" src="assets/statics/images/icon/41.png"></div>
                        <div class="hot-text text_idx_0"><span>北京28</span>
                            <p>5分钟一期</p></div>
                    </a>
                </li> -->

                <!-- <li>
                    <a href="/index.php/index/game/34">
                        <div class="hot-icon icon_idx_0"><img class="" src="assets/statics/images/icon/18.png"></div>
                        <div class="hot-text text_idx_0"><span>香港⑥合彩</span>
                            <p>每周开奖3期</p></div>
                    </a>
                </li> -->
                <!--
                <li>
                    <a href="/index.php/index/game/34">
                        <div class="hot-icon icon_idx_0"><img class="" src="assets/statics/images/icon/34.png"></div>
                        <p class="hot-text text_idx_0">北京快乐8</p>
                    </a>
                </li>
                -->
                <!--<li>
                    <a href="/index.php/index/game/79">
                        <div class="hot-icon icon_idx_0"><img class="" src="assets/statics/images/icon/27.png"></div>
                        <p class="hot-text text_idx_0">江苏快三</p>
                    </a>
                </li>

                <li>
                    <a href="/index.php/index/game/87">
                        <div class="hot-icon icon_idx_0"><img class="" src="assets/statics/images/icon/28.png"></div>
                        <p class="hot-text text_idx_0">上海时时乐</p>
                    </a>
                </li>

                <li>
                    <a href="/index.php/index/game/6">
                        <div class="hot-icon icon_idx_0"><img class="" src="assets/statics/images/icon/12.png"></div>
                        <p class="hot-text text_idx_0">广东11选5</p>
                    </a>
                </li>-->

                <li>
                    <a href="/index.php/index/hall">
                        <div class="hot-icon"><img src="assets/statics/images/icon/logo_more.png"></div>
                        <p class="hot-text">&nbsp;&nbsp;更多...</p>
                    </a>
                </li>
            </ul>
        </div>

    </div>
</div>
</div>


<div class="menu">
    <ul>
        <li>
            <a class="menu-home" style="color: #ec0909;" href="/"><i class="ion-ios-home"></i>
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
            <a class="menu-my" href="/safe/Personal"><i class="ion-ios-person-outline"></i>
                <p>我的</p></a>
        </li>
    </ul>
</div>

<script src="/assets/js/plugins/jquery/jquery.min.js"></script>
<script src="assets/js/require.js" data-main="assets/js/index"></script>
<script src="assets/js/require.config.js?v=2.1"></script>
<script>
function cOnclick(){
    $("#website_kf").css("display","block");
}

$("._notice-list").on("click", "li", function () {
if ($(this).is(".active")) {
  $(this).removeClass("active").siblings("li").removeClass("active");
} else {
  $(this).addClass("active").siblings("li").removeClass("active");
}
})

$("._notice .close").click(function () {
    setCookie('yiShowNoticeWap', 1, 1000 * 60 * 1);
    $("._notice").hide();
})

$("._notice2 .close2").click(function () {
    $("._notice2").hide();
})

var yishownotice = getCookie('yiShowNoticeWap');
if (yishownotice == 1) {
    $('._notice').hide();
} else {
    $('._notice').show();
}
function setCookie(name, value, expire, path) {
    var curdate = new Date();
    var cookie = name + "=" + encodeURIComponent(value) + "; ";
    if (expire != undefined || expire == 0) {
      if (expire == -1) {
        expire = 366 * 86400 * 1000;//保存一年
      } else {
        expire = parseInt(expire);
      }
      curdate.setTime(curdate.getTime() + expire);
      cookie += "expires=" + curdate.toUTCString() + "; ";
    }
    path = path || "/";
    cookie += "path=" + path;
    document.cookie = cookie;
}
function getCookie(name) {
    var re = "(?:; )?" + encodeURIComponent(name) + "=([^;]*);?";
    re = new RegExp(re);
    if (re.test(document.cookie)) {
      return decodeURIComponent(RegExp.$1);
    }
    return '';
}
</script>
</body>
</html>