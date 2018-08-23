<!DOCTYPE html>
<!--  -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="referrer" content="always">
    <meta name="referrer" content="unsafe-url">
    <meta name="renderer" content="webkit">

    <title>彩38</title>

    <link type="text/css" rel="stylesheet" href="/files/_home.css">
    <link type="text/css" rel="stylesheet" href="/files/_tip.css">
    <link type="text/css" rel="stylesheet" href="/files/style.css">
    <!-- 主页独立的css -->
    <link type="text/css" rel="stylesheet" href="/files/index.css">
    <!--[if lte IE 8]><style>.ie-alert-bg,.ie-alert-wrap { display:block!important;}</style><![endif]-->
    <!--[if lte IE 7]><style>.ie-alert-bg,.ie-alert-wrap { display:block!important;}</style><![endif]-->
    <!--[if lte IE 6]><style>.ie-alert-bg,.ie-alert-wrap { display:block!important;}</style><![endif]-->
    <script>
        try {
            //下面是静态资源url的前缀
            if(typeof(_prefixURL) != "object") {
                window._prefixURL = {
                    statics: "/sscp/statics",
                    common: "/common/statics"
                };
            }
        } catch(e) {console.log(e);}
        try {
            //注：下一行代码毋删除，或重复定义，或在其他文件出现一样的代码 ,也不要在其他文件定义window.name（  __openWin 方法会用到这个变量）
            if(!window.opener) {
                window.name = "wn_1_home_first";
            } else if(window.name != "wn_1_home_first") {
                window.name = "wn_1_home_first";
            }
        } catch(e) {console.log(e);}
    </script>
    <!--<script type="text/javascript" src="/files/jquery-1.11.2.min.js.下载"></script>-->
    <script type="text/javascript" src="/skin/js/jquery-1.8.3.min.js"></script>

    <script type="text/javascript" src="/files/unslider.min.js.下载"></script>
    <script src="/files/_user_.js.下载"></script>
    <script type="text/javascript" src="/skin/main/onload.js"></script>
    <script type="text/javascript" src="/skin/main/function.js"></script>
    <script type="text/javascript" src="/js/nsc/main.js"></script>

    <link href="/css/nsc/plugin/dialogUI/dialogUI.css" media="all" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="/js/nsc/dialogUI/jquery.dialogUI.js"></script>
    <script type="text/javascript" src="/skin/layer/layer.js"></script>

    <style type="text/css">
        .header-toptray-plus,.header-navbar-plus,.jc-footer{
            display: none;
        }
        ._float_AD{
            display: none;
        }
    </style>


    <!--<script type="text/javascript" src="/files/_home_menu.js.下载"></script>-->
    <script type="text/javascript">
        function zxkf(){
            <?php if($this->settings['kefuStatus']){ ?>
            layer.open({
                type: 2,
                area: ['800px', '550px'],
                zIndex:1999,
                //fixed: false, //不固定
                title:'在线客服',
                scrollbar: false,//屏蔽滚动条
                //maxmin: true,
                content:'<?=$this->settings['kefuGG']?>'
            });
            <?php }else{?>
            $.alert("客服系统维护中");
            <?php }?>
            return false;
        }
        $(document).ready(function() {
            $('#mylottery').unbind().hover(function() {
                $(this).addClass('mylottery-on');
                $('#mylottery_dropdown').show();
            }, function() {
                $(this).removeClass('mylottery-on');
                $('#mylottery_dropdown').hide();
            });

        });
    </script>
</head>
<body>
<div class="header-plus" id="header_plus">
    <div class="header-toptray-plus">
        <div class="quick-tpis">
            <div>您好,欢迎来到彩38!</div>
            <div class="top_dr_zc">
                <a class="top_qdr" onClick="__openWin('login','/index.php/user/login?is_login=1')">请登录</a>
                |
                <a class="top_ljdr" onClick="__openWin('login','/index.php/user/login')">立即注册</a>
            </div>
            <div class="header-right fr">
                <!--<ul class="header-top-center fl">
                    <li class="c-grey topscan">
                        <div class="header-gou"><i class="icon-iphone-icon"></i>手机购彩<span class="head-select"></span></div>
                        <div class="scancode" hidden="">
                            <img src="/files/getIosPng.html" width="124px" height="124px">
                            <p>微信扫一扫</p>
                            <p>彩票随身买</p>
                        </div>
                    </li>
                </ul>-->
                <ul class="header-top-right fr ">

                    <li><a id="agent_reg_url" class="right-border" href="http://c38cps.mycppost.com" >代理登陆</a></li>
                    <li><a class="right-border " href="/index.php/index/mfsw/">免费试玩</a></li>
                    <li><a class="right-border" href="/index.php/index/help?page=default">玩法</a></li>
                    <li id="wdtg"><a class="right-border " href="/index.php/safe/tuiguang"   >推荐好友获收益<img style="margin-left: 2px;margin-bottom: 10px;" src="/assets/statics/images/hot_new.gif"></a></li>
                    <li><a target="_self" onClick="zxkf();">在线客服</a></li>
                </ul>
            </div>

        </div>
    </div>
    <div class="liansai-wrap" id="liansai-wrap" >
        <div class="liansai" id="liansai" style="width: 1220px; margin: 0 auto;">
            <div class="wrapper clearfix relative" style="width: 100%;">
                <h1 class="sprite sprite-logo"></h1>
                <div id="header_user_login" class="wrap-login" style="display: none;">
                    <div class="logxinxi" id="logxinxi">
                        <div class="top_login">
                            <div style="float:right;">
                                <div style="float: left;">
                                    <div class="top-login-bg"><i class="icon-6"></i><input class="top_loginip" name="username" type="text" id="username" placeholder="请输入用户名"></div>
                                    <div class="top-login-bg"><i class="icon-lock-icon"></i><input class="top_loginip" name="passwd" id="password" type="password" placeholder="请输入密码"></div>
                                    <div class="need_captcha">
                                        <div class="top_click" name="div_top_click" style="display: none;">请输入验证码</div>
                                        <div class="yanzhengma">
                                            <div class="top-login-bg2">
                                                <input class="top_loginmm" id="authnum" name="authnum" maxlength="4" type="text" placeholder="">
                                                <span class="register_captcha_span" style="margin:0; position: relative;">
	                                                            <img name="login_img" class="login_img" style="margin-top:4px" src="/index.php/user/vcode/1498379763" title="点击刷新" onClick="this.src='/index.php/user/vcode/'+(new Date()).getTime()">
                                                    <!-- <a name="btn_refresh"><img src="/common/statics/img/refresh_1.png"></a> -->
	                                                        </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div style="float: left;margin-top: 1px">
                                    <input style="margin-right: 14px;" class="dr_anniu" onClick="index_userLogin();" type="button" name="login" value="登录">
                                    <input class="dr_anniu reg_anniu" type="button" onClick="__openWin('login','/index.php/user/login')" value="注册">
                                </div>
                            </div>
                            <input type="hidden" name="ref_url" value="">
                            <input type="hidden" name="form_submit" value="ok">
                            <input type="hidden" name="formhash" value="">
                        </div>
                    </div>
                </div>
                <div id="header_user" class="logxinxi" hidden="" style="display: block;">
                    <div class="top_login">
                        <span>您好，<a onClick="__openWin('user_center','/index.php/box/receive');" rel="nofollow" class="play-jl" target="_blank" name="user_name" ><?=$this->user['username']?></a></span>
                        <span>可用余额：</span>
                        <span><a class="balance colorRed" id="refff" rel="nofollow" style="color: #e4393c;"><span id="balance" class="orange">￥0.000</span></a>
								</span>
                        <span><a id="header_money_refresh"><i class="icon-refresh-icon"></i></a></span>
                        <span>&nbsp;|&nbsp;
                                   <a href="/index.php/box/receive">用户中心</a>&nbsp;|&nbsp;
                                    <a href="/index.php/safe/c38_cz">充值</a>&nbsp;|&nbsp;
                                    <a onClick="topay();">提现</a>&nbsp;|&nbsp;
                                    <a  href="/index.php/record/search" >交易记录</a>&nbsp;|&nbsp;
                                    <a style="display:none;" onClick="__openWin('user_center','/index.php/safe/tuiguang');">我的推广</a>
                                	<a href="javascript:loginout()" onClick="loginout();">退出</a>&nbsp;
                                </span>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-navbar-plus">
            <div class="wrapper clearfix" id="header_box">
                <div class="lottery-plus" id="lotterys">
                    <h2 class=""><span class="hanbo_icon"><i></i><i></i><i></i></span>热门彩种</h2>

                    <div class="lotterys-list-hd" id="lotterysList" style="display:none">
                        <ul class="lottery-list-box" id="lottery-list-box">
                            <li class="mainGame">
                                <a onClick="" class="mainA">
                                    <i class="icon nav40-9">
                                        <img src="/files/51.png"></i>
                                </a>
                                <div class="fl">
                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/86/2/12/三分时时彩');" class="mainA">
                                        <span class="color333">三分时时彩</span>
                                        <p onClick="__openWin('lottery_hall','/index.php/index/game/86/2/12/三分时时彩');" target="_blank" class="status-desc"></p>
                                    </a>
                                </div>
                            </li>
                            <li class="mainGame">
                                <a onClick="__openWin('lottery_hall','/index.php/index/game/1/2/12/重庆时时彩');" class="mainA">
                                    <i class="icon nav40-9">
                                        <img src="/files/5.png"></i>
                                </a>
                                <div class="fl">
                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/1/2/12/重庆时时彩');" class="mainA">
                                        <span class="color333">重庆时时彩</span>
                                        <p onClick="__openWin('lottery_hall','/index.php/index/game/1/2/12/重庆时时彩');" target="_blank" class="status-desc">最火爆的快彩</p></a>
                                </div>
                            </li>
                            <li class="mainGame">
                                <a onClick="__openWin('lottery_hall','/index.php/index/game/20/27/北京PK拾');" class="mainA">
                                    <i class="icon nav40-9">
                                        <img src="/files/9.png"></i>
                                </a>
                                <div class="fl">
                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/20/27/北京PK拾');" class="mainA">
                                        <span class="color333">北京PK拾</span>
                                        <p>
                                            <span class="normal-desc">彩友中200注</span></p>
                                    </a>
                                </div>
                            </li>
                            <li class="mainGame">
                                <a onClick="__openWin('lottery_hall','/index.php/index/game/80/104/339/幸运28');" class="mainA">
                                    <i class="icon nav40-9">
                                        <img src="/files/42.png"></i>
                                </a>
                                <div class="fl">
                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/80/104/339/幸运28');" class="mainA">
                                        <span class="color333">幸运28</span>
                                        <p>
                                            <span class="normal-desc"></span>
                                        </p>
                                    </a>
                                </div>
                            </li>
                            <li class="mainGame">
                                <a onClick="__openWin('lottery_hall','/index.php/index/game/85/27/三分PK10');" class="mainA">
                                    <i class="icon nav40-9">
                                        <img src="/files/52.png"></i>
                                </a>
                                <div class="fl">
                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/85/27/三分PK10');" class="mainA">
                                        <span class="color333">三分PK拾</span>
                                        <p>
                                            <span class="normal-desc"></span>
                                        </p>
                                    </a>
                                </div>
                            </li>
                            <li class="mainGame">
                                <a onClick="__openWin('lottery_hall','/index.php/index/game/34/香港⑥合彩');" class="mainA">
                                    <i class="icon nav40-9">
                                        <img src="/files/18.png"></i>
                                </a>
                                <div class="fl">
                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/34/香港⑥合彩');" class="mainA">
                                        <span class="color333">香港⑥合彩</span>
                                        <p onClick="__openWin('lottery_hall','/index.php/index/game/34/香港⑥合彩');" target="_blank" class="status-desc">每周开奖三期</p></a>
                                </div>
                            </li>
                            <li class="allGames clearfix" data-type="1">
                                <h3>
                                    <i class="icon-ALARM"></i>
                                    <span>高频彩</span></h3>
                                <ul class="clearfix game-list">
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/86/2/12/三分时时彩');">三分时时彩</a></li>
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/1/2/12/重庆时时彩');">重庆时时彩</a></li>
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/20/27/北京PK拾');">北京PK拾</a></li>
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/80/104/339/幸运28');">幸运28</a></li>
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/85/27/三分PK10');">三分PK拾</a></li>
                                    <!--<li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/87');">上海时时乐</a></li>-->
                                </ul>
                                <i class="icon" id="open-btn-1" style="display: block;"></i>
                                <div class="line-fff"></div>
                                <div class="moreGames clearfix" style="display: none;" id="moreGames_1">
                                    <div class="moreGames-box fl">
                                        <div class="otherGames num-games">
                                            <h3>高频彩</h3>
                                            <ol>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/86/2/12/三分时时彩');">三分时时彩</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/1/2/12/重庆时时彩');">重庆时时彩</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/20/27/北京PK拾');">北京PK拾</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/80/104/339/幸运28');">幸运28</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/85/27/三分PK10');">三分PK拾</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/87');">上海时时乐</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/60/2/12/天津时时彩');">天津时时彩</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/12/2/12/新疆时时彩');">新疆时时彩</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/79/39/江苏快三');">江苏快三</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/7/10/山东11选5');">山东11选5</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/15/10/上海11选5');">上海11选5</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/16/10/江西11选5');">江西11选5</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/6/10/广东11选5');">广东11选5</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/82/39/广西快三');">广西快三</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/83/104/339/北京28');">北京28</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/81/39/安徽快三');">安徽快三</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <li class="allGames" data-type="2">
                                <h3>
                                    <i class="icon-TIME"></i>
                                    <span>低频彩</span></h3>
                                <ul class="clearfix game-list">
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/34/香港⑥合彩');">香港⑥合彩</a></li>
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/9/3D福彩');">福彩3D</a></li>
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index/game/10/排列3');">排列三</a></li>
                                </ul>
                            </li>
                            <li class="allGames clearfix" data-type="3">
                                <h3>
                                    <i class="icon-billiard-ball"></i>
                                    <span>全部</span></h3>
                                <ul class="clearfix game-list">
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/86/2/12/三分时时彩');">三分时时彩</a></li>
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/1/2/12/重庆时时彩');">重庆时时彩</a></li>
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/20/27/北京PK拾');">北京PK拾</a></li>
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/80/104/339/幸运28');">幸运28</a></li>
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/85/27/三分PK10');">三分PK拾</a></li>
                                    <li>
                                        <a onClick="__openWin('lottery_hall','/index.php/index/game/34/香港⑥合彩');">香港⑥合彩</a></li>
                                </ul>
                                <i class="icon" id="open-btn-1" style="display: block;"></i>
                                <div class="line-fff"></div>
                                <div class="moreGames clearfix" style="display: none;" id="moreGames_3">
                                    <div class="moreGames-box fl">
                                        <div class="otherGames num-games">
                                            <h3>全部</h3>
                                            <ol>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/86/2/12/三分时时彩');">三分时时彩</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/1/2/12/重庆时时彩');">重庆时时彩</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/20/27/北京PK拾');">北京PK拾</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/80/104/339/幸运28');">幸运28</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/85/27/三分PK10');">三分PK拾</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/87');">上海时时乐</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/60/2/12/天津时时彩');">天津时时彩</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/12/2/12/新疆时时彩');">新疆时时彩</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/79/39/江苏快三');">江苏快三</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/7/10/山东11选5');">山东11选5</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/15/10/上海11选5');">上海11选5</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/16/10/江西11选5');">江西11选5</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/6/10/广东11选5');">广东11选5</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/82/39/广西快三');">广西快三</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/83/104/339/北京28');">北京28</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/81/39/安徽快三');">安徽快三</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/34/香港⑥合彩');">香港⑥合彩</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index.php/index/game/9/3D福彩');">福彩3D</a></li>
                                                <li>
                                                    <a onClick="__openWin('lottery_hall','/index/game/10/排列3');">排列三</a></li>
                                            </ol>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>

                <ul class="nav-plus clearfix">
                    <li ><a  href="/">首页</a></li>
                    <li><a onClick="__openWin('lottery_hall','/index.php/index/hall/');" target="_blank">购彩大厅</a></li>
                    <!--<li><a href="/index.php/index/help?page=phone" target="_blank"><i class="icon-iphone-icon"></i>&nbsp;手机购彩</a><em style="z-index: 9;right: -11px;" class="hot-icon"></em></li>-->
                    <li><a href="/index.php/index/help?page=huodong">优惠活动</a><em class="hot-icon"></em></li>
                   
                    <li><a href="/index.php/lottery/hemai" target="_blank">合买大厅</a></li>
                    <li><a href="/index.php/index/help?page=kjgg">开奖公告</a></li>
                </ul>
            </div>
        </div>