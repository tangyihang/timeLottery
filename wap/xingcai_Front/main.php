<html xmlns="http://www.w3.org/1999/xhtml" style="font-size: 12px;">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport"
          content="width=device-width,height=device-height,initial-scale=1.0,user-scalable=no,maximum-scale=1.0">
    <meta name="format-detection" content="telephone=no">
    <meta name="screen-orientation" content="portrait">
    <meta name="x5-orientation" content="portrait">
    <title><?= $this->settings['webName'] ?></title>
    <meta name="keywords" content="">
    <meta nam="description" content="">
    <!--导航栏-->
    <?php
    if ($this->type) {
        $row = $this->getRow("select enable,title from {$this->prename}type where id={$this->type}");
        if (!$row['enable']) {
            echo $row['title'] . '已经关闭';
            exit;
        }
    } else {
        $this->type = 1;
        $this->groupId = 2;
        $this->played = 10;
    }
    if ($_COOKIE['mode']) {
        $mode = $_COOKIE['mode'];
    } else {
        $mode = 2.000;
    }

    $row1 = $this->getRows("select * from {$this->prename}content where enable=1 and nodeId=1");
    $row2 = $this->getRows("select * from {$this->prename}message_receiver where to_uid={$this->user['uid']}");
    ?>

    <link href="/css/newcss/style.css?v=1.0" rel="stylesheet" type="text/css"/>
    <link href="/css/newcss/add.css?v=1.0" type="text/css" rel="stylesheet"/>
    <link type="text/css" rel="stylesheet" href="/skin/js/jqueryui/jquery-ui-1.8.23.custom.css"/>
    <link href="/css/nsc/plugin/dialogUI/dialogUI.css"/>
    <link rel="stylesheet" href="/assets/statics/ionicons-3.0/dist/css/ionicons.css" type="text/css">
    <script type="text/javascript" src="/js/nsc/jquery-1.7.min.js?v=1.16.12.12"></script>
    <!--
    -->

    <link rel="stylesheet" href="/css/nsc_m/res.css?v=1.16.12.13">
    <link href="/css/nsc_m/m-reset.css?v=1.16.12.12" rel="stylesheet" type="text/css">
    <link href="/css/nsc_m/m-warp.css?v=1.16.12.13" rel="stylesheet" type="text/css">
    <link href="/css/nsc_m/m-lottery.css?v=1.16.12.13" rel="stylesheet" type="text/css">
    <link href="/js/common/nouislider.css" rel="stylesheet"/>

    <script type="text/javascript" src="/js/nsc_m/layer.js?v=1.16.12.12"></script>
    <link href="/js/nsc_m/need/layer.css?2.0" type="text/css" rel="styleSheet" id="layermcss">
    <script type="text/javascript" src="/js/nsc/common.js?v=1.16.12.12"></script>
    <script type="text/javascript" src="/skin/js/jquery.cookie.js"></script>


    <script>var TIP = true;</script>
    <!--script type="text/javascript" src="/skin/js/jquery.cookie.js"></script-->
    <!--script type="text/javascript" src="/skin/js/Array.ext.js"></script-->
    <!--script type="text/javascript" src="/skin/js/jquery.simplemodal.src.js"></script-->
    <script type="text/javascript" src="/skin/js/jquery.SuperSlide.2.1.1.js"></script>
    <script type="text/javascript" src="/skin/js/onload.js"></script>
    <script type="text/javascript" src="/skin/js/function.js?v=1.0"></script>

    <script type="text/javascript" src="/skin/js/jqueryui/jquery-ui-1.8.23.custom.min.js"></script>
    <script type="text/javascript" src="/skin/js/game.js?v5.1"></script>

    <link href="/css/nsc/lottery.css?v=1.0" rel="stylesheet" type="text/css"/>
    <script type="text/javascript" src="/js/nsc/hklhc.js"></script>
    <script type="text/javascript" src="/js/nsc/dialogUI/jquery.dialogUI.js"></script>
    <?php
    if ($this->type == 83 || $this->type == 34) {

    } else {
        echo '<script src="/js/common/nouislider.js"></script>';
    }
    ?>
    <style type="text/css">
        .noUi-base {
            width: 80%;
            margin: 0 auto;
            height: 8px;
            border: 1px solid #BDBDBD;
            border-radius: 20px;
            background-color: #FF632C;
        }

        .noUi-origin {
            position: absolute;
            left: 0;
            right: -1px;
            bottom: -1px;
            top: -1px;
            border: 1px solid #BDBDBD;
            height: initial !important;
            width: initial !important;
            background-color: #fff;
            border-radius: 30px;
        }

        .noUi-target {
            border: none;
        }

        .noUi-horizontal .noUi-handle {
            height: 30px;
            width: 30px;
            border-radius: 50%;
            background-color: #F13131;
            top: -12px;
            box-shadow: none;
        }

        .noUi-horizontal .noUi-handle:before {
            display: none;
        }

        .noUi-horizontal .noUi-handle:after {
            display: none;
        }

        #submenu .ball_list {
            display: none !important;
        }

        #playList .tz_xz {
            display: none !important;
        }

        .tzResult p {
            display: inline-block;
        }

        #slider-range-min {
            display: block !important;
        }

        .m-return-home {
            font-size: 1.2rem;
        }
    </style>
</head>
<body>
<!--导航栏-->

<div id="body">
    <?php
    $lastNo = $this->getGameLastNo($this->type);
    $kjHao = $this->getValue("select data from {$this->prename}data where type={$this->type} and number='{$lastNo['actionNo']}'");
    if ($kjHao)
        $kjHao = explode(',', $kjHao);

    $actionNo = $this->getGameNo($this->type);
    $types = $this->getTypes();
    //print_r($types);
    $kjdTime = $types[$this->type]['data_ftime'];
    $diffTime = strtotime($actionNo['actionTime']) - $this->time - $kjdTime;
    $kjDiffTime = strtotime($lastNo['actionTime']) - $this->time;
    ?>
    <header class="header wjkjData">
        <!-- javascript:window.history.back(); -->
        <a class="m-return-home" href="/index.php"><img src="/images/nsc_m/lott/blank_01.png"/></a>
        <!--<span class="nfdprize_text tz-type" id="m-lott-listContent">玩法选择<b class="cur"></b></span>-->
        <div class="assistant">
            <div class="zhushou">
                <!--<a href="#">近期开奖</a>-->
                <ul class="funcList">
                    <li class="louhao" id="m_recen_v"><a href="javascript:;">近期开奖</a></li>
                    <li class="louhao" id="m_recen_v"><a href="/index.php/index/yxjl" button="关闭:defaultModalCloase"
                                                         width="100%" target="modal">投注记录</a></li>
                    <li class="louhao" id="m_recen_v"><a href="/zst/zst.php?typeid=<?= $this->type ?>&g=1">走势图</a></li>
                </ul>
            </div>
        </div>

        <span class="btn-slide-bar"></span>
        <div class="m-nav-lott-date">
            <ul id="kaijiang" style="width:100%" type="<?= $this->type ?>">


                <!--<span class="m-n-countdown" id="sur-times"> -- : -- : -- </span>-->
            </ul>
        </div>
        <!-- <h1 class="page-title">header</h1> -->
    </header>

    <!--侧导航 -->
    <section class="slide-bar" style="display: none;">
        <ul class="tree">
            <li class="tree_list"><h3 class="one_nav_list home"><a href="/?index.php">首页</a></h3>
                <div class="m_nav_line"></div>
            </li>
            <li class="tree_list">
                <h3 class="one_nav_list uc_icon_r"><a href="/index.php/safe/Personal">用户中心</a></h3>
                <div class="m_nav_line"></div>
            </li>
            <li class="tree_box tree_list">
                <h3 class="one_nav_list  game_icon tree_box">彩票游戏<i class="lnstruction-top"></i></h3>
                <ul class="tree_one" style="display:block">
                    <li class="lotter_list_game">
                        <div class="m_nav_line"></div>
                        <dl>
                            <dt>高频彩</dt>
                            <dd>
                                <ul class="lot_list">
                                    <li><a href="/index.php/index/game/1/2/12">重庆时时彩<i>H</i></a></li>
                                    <li><a href="/index.php/index/game/12/2/12">新疆时时彩</a></li>
                                    <li><a href="/index.php/index/game/60/2/12">天津时时彩</a></li>
                                    <li><!--<a href="/index.php/index/game/61/59/193">澳门时时彩<i>H</i>--></a> </li>
                                    <li><!--<a href="/index.php/index/game/62/59/193">台湾时时彩<i>H</i>--></a> </li>
                                    <li><a href="/index.php/index/game/5/59/193">河内1分彩<i>H</i></a></li>
                                    <li><!--<a href="/index.php/index/game/26/59/193">河内2分彩<i>H</i>--></a> </li>
                                    <li><a href="/index.php/index/game/14/59/193">河内五分彩<i>H</i></a></li>
                                    <li><!--<a href="/index.php/index/game/76/59/193">巴西1.5分彩<i>H</i>--></a></li>
                                    <li><!--<a href="/index.php/index/game/75/59/193">巴西快乐彩<i>H</i>--></a></li>

                                    <!-- comingsoon();  如果需要禁用用这个函数即可-->
                                </ul>
                            </dd>
                        </dl>
                        <dl>
                            <dt>PK拾</dt>
                            <dd>
                                <ul class="lot_list">
                                    <li><a href="/index.php/index/game/20">北京PK拾<i class="m-yellow">N</i></a></li>
                                    <li><a href="/index.php/index/game/85">三分PK拾<i class="m-yellow">N</i></a></li>
                                    <li>
                                        <!--<a href="/index.php/index/game/66">台湾PK拾<i class="m-yellow">N</i>--></a> </li>
                                </ul>
                            </dd>
                        </dl>
                        <dl>
                            <dt><!--快3--></dt>
                            <dd>
                                <ul class="lot_list">
                                    <li><!--<a href="/index.php/index/game/79">江苏快三<i>H</i></a></li>
										<li><a href="/index.php/index/game/63">澳门快三</a></li>
										<li><a href="/index.php/index/game/64">台湾快三</a></li>-->
                                </ul>
                            </dd>
                        </dl>
                        <dl>
                            <dt>11选5</dt>
                            <dd>
                                <ul class="lot_list">
                                    <li><a href="/index.php/index/game/6">广东11选5<i>H</i></a></li>
                                    <li><a href="/index.php/index/game/16">江西11选5</a></li>
                                    <li><a href="/index.php/index/game/7">山东11选5</a></li>
                                    <li><!--<a href="/index.php/index/game/15">上海11选5--></a></li>
                                    <li><!--<a href="/index.php/index/game/67">澳门11选5<i>H</i>--></a></li>
                                    <li><!--<a href="/index.php/index/game/68">台湾11选5--></a></li>
                                </ul>
                            </dd>
                        </dl>
                        <dl>
                            <dt>快乐8</dt>
                            <dd>
                                <ul class="lot_list">
                                    <li><a href="/index.php/index/game/78">北京快乐8<i>H</i></a></li>
                                    <li><!--<a href="/index.php/index/game/74">韩国快乐8<i>H</i>--></a></li>
                                    <li><!--<a href="/index.php/index/game/73">澳门快乐8--></a></li>
                                </ul>
                            </dd>
                        </dl>
                        <dl>
                            <dt><!--3D-排列3--></dt>
                            <dd>
                                <ul class="lot_list">
                                    <li><!--<a href="/index.php/index/game/9">福彩3D<i>H</i></a></li>
										<li><a href="/index.php/index/game/69">澳门3D</a></li>
										<li><a href="/index.php/index/game/70">台湾3D</a></li>
										<li><a href="/index.php/index/game/10">排列3</a></li>-->
                                </ul>
                            </dd>
                        </dl>
                    </li>
                </ul>
                <div class="m_nav_line"></div>
            </li>

            <li class="tree_box tree_list">
                <h3 class="one_nav_list account_icon">账户管理<i class="lnstruction-top"></i></h3>
                <ul class="tree_one">
                    <li class="lotter_list_game">
                        <div class="m_nav_line"></div>
                        <dl class="lnstruction">
                            <dd>
                                <ul class="lot_list">
                                    <li class="tree_list"><a href="/index.php/record/search">投注记录</a></li>
                                    <li class="tree_list"><a href="/index.php/report/coin">帐变记录</a></li>
                                    <li class="tree_list"><a href="/index.php/report/count">盈亏报表</a></li>
                                    <li class="tree_list"><a href="/index.php/safe/info">绑定卡号 </a></li>
                                    <li class="tree_list"><a href="/index.php/safe/loginpasswd">登入密码</a></li>
                                    <li class="tree_list"><a href="/index.php/safe/passwd">提款密码</a></li>
                                </ul>
                            </dd>
                        </dl>
                    </li>
                </ul>
                <div class="m_nav_line"></div>
            </li>
            <?php if ($this->user['type']) { ?>
                <li class="tree_box tree_list">
                    <h3 class="one_nav_list team_icon">团队管理<i class="lnstruction-top"></i></h3>
                    <ul class="tree_one">
                        <li class="lotter_list_game">
                            <div class="m_nav_line"></div>
                            <dl class="lnstruction">
                                <dd>
                                    <ul class="lot_list">
                                        <li class="tree_list"><a href="/index.php/team/gameRecord">团队记录</a></li>
                                        <li class="tree_list"><a href="/index.php/team/coin">团队帐变</a></li>
                                        <li class="tree_list"><a href="/index.php/team/report">团队盈亏</a></li>
                                        <li class="tree_list"><a href="/index.php/team/memberList">用户列表</a></li>
                                        <li class="tree_list"><a href="/index.php/team/addMember">注册管理</a></li>
                                        <li class="tree_list"><a href="/index.php/team/addlink">推广设定</a></li>
                                        <li class="tree_list"><a href="/index.php/team/linkList">链接管理</a></li>
                                        <li class="tree_list"><a href="/index.php/team/coinall">团队统计</a></li>
                                    </ul>
                                </dd>
                            </dl>
                        </li>
                    </ul>
                    <div class="m_nav_line"></div>
                </li>
            <? } ?>
            <li class="tree_box tree_list">
                <h3 class="one_nav_list account_icon">充值提现<i class="lnstruction-top"></i></h3>
                <ul class="tree_one">
                    <li class="lotter_list_game">
                        <div class="m_nav_line"></div>
                        <dl class="lnstruction">
                            <dd>
                                <ul class="lot_list">
                                    <li class="tree_list"><a href="/index.php/cash/recharge">充值</a></li>
                                    <li class="tree_list"><a href="/index.php/cash/toCash">提现</a></li>
                                    <li class="tree_list"><a href="/index.php/cash/rechargeLog">充值记录</a></li>
                                    <li class="tree_list"><a href="/index.php/cash/toCashLog">提现记录 </a></li>
                                </ul>
                            </dd>
                        </dl>
                    </li>
                </ul>
                <div class="m_nav_line"></div>
            </li>
            <li class="tree_box tree_list">
                <h3 class="one_nav_list activity_icon">优惠活动<i class="lnstruction-top"></i></h3>
                <ul class="tree_one">
                    <li class="lotter_list_game">
                        <div class="m_nav_line"></div>
                        <dl class="lnstruction">
                            <dd>
                                <ul class="lot_list">
                                    <li class="tree_list"><a href="/index.php/score/lucky">幸运抽奖</a></li>
                                    <li class="tree_list"><a href="/index.php/cash/card">卡密充值</a></li>
                                    <li class="tree_list"><a href="/index.php/lottery/hemai">合买中心</a></li>
                                    <li class="tree_list"><a class="notice" href="/index.php/notice/info">系统公告</a></li>
                                </ul>
                            </dd>
                        </dl>
                    </li>
                </ul>
                <div class="m_nav_line"></div>
            </li>
        </ul>
    </section>
    <div class="home_b">
        <div class="m_nav_line"></div>
        <a class="one_nav_list conpt_icon" href="/?v=2">电脑版</a>
        <a class="one_nav_list retreat_icon" href="javascript:m_loginout()">安全退出</a>
    </div>
    <div class="shady"></div>
    <section class="wraper-page">
        <!-- <a href="#" id="rece_lott_btn">开奖历史</a> -->
        <!--用户信息及彩种-->


        <div class="block_three">
            <?php
            $this->display('index/inc_data_current_new.php');
            ?>
        </div>


        <!--玩法-->
        <div class="tz_change kkkk" style="background-color: #ffffff;">
            <?php $this->display('game_line.php'); ?>

        </div>
        <!--玩法选择-->
        <div class="tz_change">
            <div class="tz_work _cus" id="playList">
                <!--<div class="tz_xz">
	<?php
                $sql = "select groupName from {$this->prename}played_group where id=?";
                $groupName = $this->getValue($sql, $this->groupId);

                $sql = "select id, name, playedTpl, enable  from {$this->prename}played where enable=1 and groupId=? order by sort";
                $playeds = $this->getRows($sql, $this->groupId);
                if (!$playeds) {
                    echo '<td colspan="7" align="center">暂无玩法</td>';
                    return;
                }
                if (!$this->played)
                    $this->played = $playeds[0]['id'];
                ?>
	<?php
                if ($playeds)
                    foreach ($playeds as $played) {
                        if ($this->played == $played['id'])
                            $tpl = $played['playedTpl'];
                        if ($played['enable']) {
                            ?>
		<a data_id="<?= $played['id'] ?>" href="#" tourl="/index.php/index/played_new/<?= $this->type ?>/<?= $played['id'] ?>" <?= ($played['id'] == $this->played) ? ' class="tag"' : '' ?> style="white-space: nowrap;overflow: hidden;text-overflow: ellipsis;"><?= $played['name'] ?></a>
		<?php
                        }
                    }
                ?>
</div>-->


                <!--玩法end投注标签开始-->


                <!--div class="tz_info" id="game-helptips">
<?php
                $sql = "select simpleInfo, info, example  from {$this->prename}played where id=?";
                $playeds = $this->getRows($sql, $this->played);
                ?>
<p class="wjhelps">说明：<?= $playeds[0]["simpleInfo"] ?><!--<a href="#"><em action="lt_example" class="ico_sl showeg"></em></a><a href="#"><i action="lt_help" class="ico_ques showeg"></i></a></p>
<div id="lt_example" class="game_eg" style="display:none;"><?= $playeds[0]["example"] ?></div>
<div id="lt_help" class="game_eg" style="display:none;"><?= $playeds[0]["info"] ?></div>
<div class="line2">
                    </div>
                  </div-->

                <!--选号-->
                <div class="ball_list" style="width:100%;">
                    <div class="num-table" id="num-select">
                        <?php
                        if (!$played['enable']) {
                            echo '<td colspan="7" align="center">暂无玩法</td>';
                            return;
                        }
                        $this->display("index/game-played/$tpl.php");
                        ?>
                    </div>
                </div>
            </div>
            <?php
            if (!in_array($this->type, array(80, 83, 34))) {
                ?>


                <div class="addOrderBox">
                    <div class="footerNew" style="z-index: 510;">
                        <div class="tzResult" style="z-index: 600;">
                            <p class="zushu"><!--总投注数--><span id="all-count" class="num">0</span> 注</p>
                            <p class="m_total_amout"><!--总金额 --><span id="all-amount" class="num orange">0</span> 元</p>

                        </div>
                        <input type="button" class="addBtn" id="lt_sel_insert" onclick="gameActionAddCode()" value="投注">
                    </div>
                    <div class="tzTrans-wrapper" style="padding-bottom: 60px;">
                        <div class="_back"><span class="_back-btn"></span></div>


                        <div class="addOrderLeft">
                            <div class="chooseMsg"
                                 style="width: 98% !important; text-align: center;margin: 0 auto 10px !important;background-color: #fff;">
                                <!--<span id="game-tip-dom"></span>-->
                            </div>

                            <div class="m_funding_box"
                                 style="text-align: center; border: 1px solid #c1c1c1;border-radius: 5px;width: 98%; margin: 0 auto; background-color: #fff;">
                                <div class="jiangjin" id="game-dom">
                                    <?php
                                    if ($this->settings['yuanmosi'] == 1) {
                                        ?>
                                    <b value="2.000" data-max-fan-dian="<?= $this->settings['betModeMaxFanDian0'] ?>"
                                       class="danwei dwon" onclick="chargeMode(2)">元</b><?php
                                    }
                                    ?>
                                    <?php
                                    if ($this->settings['jiaomosi'] == 1) {
                                        ?>
                                    <b value="0.200" data-max-fan-dian="<?= $this->settings['betModeMaxFanDian1'] ?>"
                                       class="danwei" onclick="chargeMode(0.2)">角</b><?php
                                    }
                                    ?>
                                    <?php
                                    if ($this->settings['fenmosi'] == 1) {
                                        ?>
                                    <b value="0.020" data-max-fan-dian="<?= $this->settings['betModeMaxFanDian2'] ?>"
                                       class="danwei" onclick="chargeMode(0.02)">分</b><?php
                                    }
                                    ?>
                                    <?php
                                    if ($this->settings['limosi'] == 1) {
                                        ?>
                                    <b value="0.002" data-max-fan-dian="<?= $this->settings['betModeMaxFanDian3'] ?>"
                                       class="danwei" onclick="chargeMode(0.002)">厘</b><?php
                                    }
                                    ?>
                                    <div class="multipleBox">
                                        <div class="multipleCon re"><!--i class="surbeishu">&#xe603;</i-->
                                            <input onchange="chargeBeiShu()" id="beishu"
                                                   value="<?= $this->ifs($_COOKIE['beishu'], 1) ?>" class="text"/>
                                            <!--i class="addbeishu">&#xe602;</i-->
                                        </div>
                                        <span class="bei">倍</span>
                                    </div>

                                    <!--拖动-->
                                    <div class="tz_work" style="width: 100%; display:none; box-sizing:border-box;background-color: #fff;padding: 10px ;">
                                        <div class="ball_write">
                                            <div class="write_bg">
                                                <div class="jiangjin" id="game-dom">
                                                    <div class="fandian-k fl">
                                                        <input type="button" class="min" value="" step="-0.1"/>
                                                        <input type="button" class="max" value="" step="0.1"/>
                                                        <strong>奖金/返点：</strong>
                                                        <span id="fandian-value" class="fdmoney" style=" color: #000 !important;"><?= $maxPl ?> /0%</span>
                                                        <div id="slider-range-min" class="tiao slider fandian-box"
                                                             value="<?= $this->ifs($_COOKIE['fanDian'], 0) ?>"
                                                             data-bet-count="<?= $this->settings['betMaxCount'] ?>"
                                                             data-bet-zj-amount="<?= $this->settings['betMaxZjAmount'] ?>"
                                                             max="<?= $this->user['fanDian'] ?>"
                                                             game-fan-dian="<?= $this->settings['fanDianMax'] ?>"
                                                             fan-dian="<?= $this->ifs($this->user['fanDian'], 5) ?>"
                                                             game-fan-dian-bdw="<?= $this->settings['fanDianBdwMax'] ?>"
                                                             fan-dian-bdw="<?= $this->user['fanDianBdw'] ?>" min="0"
                                                             step="1" slideCallBack="gameSetFanDian"></div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    拖动


                                </div>

                            </div>
                            <div class="addOrderRight">

                            </div>
                        </div>
                        <!------------------------------------------------------------------------------------->

                        <div class="lotteryBottom">
                            <div class="touzhu-cont" style="width: 98%;background-color: #fff;">
                                <table width="100%" cellpadding="0" cellspacing="0">
                                </table>
                            </div>
                            <div class="orderNow">
                                <div class="chooseAllMsg clearfix">


                                    <div class="checkZhui fqzhBox">
                                        <label name="lt_trace_if">
                                            <input name="zhuiHao" value="1" type="checkbox">
                                            <b class="fq">发起追号</b>
                                        </label>
                                    </div>
                                    <div class="hemai">
                                        <label>
                                            <input type="checkbox" class="is_combine" value="1" id="cannel_chckbox"/><b
                                                    class="fq">发起合买</b>
                                        </label>
                                    </div>
                                </div>

                                <div class="sendChoose"><input type="button" class="addtz" id="btnPostBet" value="确认投注">
                                </div>
                                <!-- <a href="">121212</a> -->
                                <!-- <a class="m_see_more" href="?controller=gameinfo&action=gamelistbyself">查看投注记录</a> -->
                                <!--<a class="m_see_more" style="padding: 0 0 0 2.928571rem;border-color: #CA1A1A;"  href="/index.php/index/yxjl" title="投注记录" button="关闭:defaultModalCloase" width="100%" target="modal">查看投注记录</a>-->
                            </div>
                        </div>
                    </div>

                </div>


                <?php
            }
            $this->display('inc_footer.php');
            ?>

            <!--首页游戏记录开始-->
    </section>

</div>
<div id="wanjinDialog"></div>
<!--end 2016/3/9-->
<script type="text/javascript">
  var game = {
      check1:<?= json_encode($check1) ?>,
      check2:<?= json_encode($check2) ?>,
      type:<?= json_encode($this->type) ?>,
      played:<?= json_encode($this->played) ?>,
      groupId:<?= json_encode($this->groupId) ?>
    },
    user = "<?= $this->user['username'] ?>",
    aflag =<?= json_encode($this->user['admin'] == 1) ?>;
  function showx(x) {
    if (x == 82) {
      $('.ball_write').hide();
    } else {
      $('.ball_write').show();
    }
  }
</script>


<script type="text/javascript" src="/js/nsc_m/res.js?v=1.16.12.4"></script>
<script type="text/javascript" src="/skin/main/selected.js"></script>
<script src="/js/common/shake.js"></script>
<?php
if ($this->type == 83 || $this->type == 34) {

} else {
    echo '
    <script>
    var flag=false;
    slider=noUiSlider.create($("#slider-range-min")[0], {
        start: 0,
        animate: true,
        range: {
            min: 0,
            max: ' . $this->ifs((int)$this->user['fanDian'], 5) . '
        },
    });
    slider.on(\'update\',function(value){
        flag&&gameSetFanDian(parseFloat(value[0]));
        flag=true
    });
 </script>
    ';
}
?>
<script type="text/javascript">
  $(function () {
    var riable = 0;
    $(".nfdprize_text").click(function () {
      if (riable == 0) {
        riable = 1;
        $(".m-lott-methodBox .nfdprize_text b").addClass('cur')
      } else {
        riable = 0;
        $(".m-lott-methodBox .nfdprize_text b").removeClass('cur')
      }
      $(".m-lott-methodBox-list").toggle();
    });
    $(".zhushou").click(function () {
      $(".funcList").toggle();
    });
    $("._back-btn").click(function () {
      $(".tzTrans-wrapper").css("top", '100%');
    })
  }());

  window.onload = function () {
    var myShakeEvent = new Shake({
      threshold: 15
    });

    myShakeEvent.start();

    window.addEventListener('shake', shakeEventDidOccur, false);

    function shakeEventDidOccur() {
      gameActionAddCode_random();
    }
  };

</script>
</body>
</html>