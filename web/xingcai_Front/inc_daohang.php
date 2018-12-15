<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php $this->display('inc_skin.php'); ?>
<meta name="keywords" content="" />
<meta nam ="description" content="" />
<meta name="renderer" content="webkit">
<link rel="stylesheet" href="/css/nsc/home/reset.css?v=1.16.11.9">
<link rel="stylesheet" href="/css/nsc/home/theme.css?v=1.16.11.9">
<link href="/css/nsc/plugin/dialogUI/dialogUI.css?v=1.16.11.9" media="all" type="text/css" rel="stylesheet" />
<script type="text/javascript" src="/js/nsc/dialogUI/jquery.dialogUI.js?v=1.16.12.5"></script>

</head>
    <body>
        <div class="header">
    <div class="top">
        <div class="content">
            <div class="fl logo">
                <a href="/index.php" title="返回首页">
                    <img src="/images/logo.png" />
                </a>
            </div>
            <div class="fr t_menu" id="user_baseinfo">
                <div class="ftop user_info">
                <span class="username" title=""  id="user_username"><?=$this->user['nickname']?></span>
                <a href="/index.php/box/receive" onclick="Xgo(this)" attr-class="ui_message">
                    <i class="ic-message"></i>
                    <span class="ui_msgnum">(<?php $this->display('index/inc_msg.php');?>)</span>
                </a>
                预留信息：
                <span class="ui_yuliu" id="user_reservedinfo"><?=$this->user['care']?>
                    </span>
                    <a class="edit" href="/index.php/user/nickname">
                </a>
                <a href="javascript:loginout()" class="logout ui_logout">
                    退出
                </a>
            </div>
            <div class="fbottom"  id="user_base2">
                <div class="money-left">
                    <span>余额：</span>
                    <span class="t_money rounded" title="可用余额">
                        <div class="show-money">￥<span id="refff"><?=$this->user['coin']?></span></div>
                        <div class="hide-money">￥<span><b>************</b></span></div>
                    </span>
                </div>
                <a href="javascript:void(0);" class="shuaxin" id="refreshmoney" title="刷新余额">
                    <i class="ic-refresh"></i>
                </a>
                <a href="javascript:;" title="隐藏余额">
                    <i class="ic-unlook"></i>
                </a>
                <a href="javascript:void(0);" onclick="czpay();" class="t_btn">充值</a>
                <a href="javascript:void(0);" onclick="topay();" class="t_btn">提款</a>
                <a href="http://wpa.qq.com/msgrd?v=3&uin=2210221040&site=qq&menu=yes" target="_blank" title="在线客服" class="t_kefu">
                    <i class="ic-kefu"></i><span>客服</span></a>
                <a href="javascript:void(0)" title="更换背景" class="t_skin " style="display:none;"><i class="ic-skin"></i><span>背景</span></a>
            </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="navbar navChoose hide">
        <div class="content">
            <div class="nav navList">
                <ul>
                    <li><a href="/index.php"><i class="i_icon-home"></i><b>首页</b><sup>Home</sup></a></li>
                    <li>
                        <a href="javascript:void(0);"><i class="i_icon-cpyx"></i><b>彩票游戏</b><sup>Lottery</sup></a>
                        <div class="nav_child">
                            <dl>
                                <dt>高频彩</dt>
                                <dd><a href="/index.php/index/game/86/2/12/三分时时彩" >三分时时彩</a></dd>
                                <dd><a href="/index.php/index/game/1/2/12/重庆时时彩">重庆时时彩</a></dd>
                                <dd><a href="/index.php/index/game/20/27/北京PK拾">北京PK拾</a></dd>
                                <dd><a href="/index.php/index/game/80/104/339/幸运28" >幸运28</a></dd><dd></dd>
                                <dd><a href="/index.php/index/game/83/104/339/北京28" >北京28</a></dd><dd></dd>
                                <dd><a href="/index.php/index/game/85/27/三分PK10" >三分PK10</a></dd>
                                <dd><a href="/index.php/index/game/87">上海时时乐</a></dd>
                                <dd><a href="/index.php/index/game/60/2/12/天津时时彩">天津时时彩</a></dd>
                                <dd><a href="/index.php/index/game/12/2/12/新疆时时彩">新疆时时彩</a></dd>
                                <dd><a href="/index.php/index/game/79/39/江苏快三">江苏快三</a></dd>
                                <dd><a href="/index.php/index/game/81/39/安徽快三" >安徽快三</a></dd>
                                <dd><a href="/index.php/index/game/82/39/广西快三" >广西快三</a></dd>
                                <dd><a href="/index.php/index/game/7/10/山东11选5">山东11选5</a></dd>
                                <dd><a href="/index.php/index/game/15/10/上海11选5">上海11选5</a></dd>
                                <dd><a href="/index.php/index/game/16/10/江西11选5">江西11选5</a></dd>
                                <dd><a href="/index.php/index/game/6/10/广东11选5">广东11选5</a></dd>
                            </dl>
							<dl>
                                <dt>低频彩</dt>
                                <dd><a data="L-8"  href="/index.php/index/game/77/香港⑥合彩" style="color: red;">香港⑥合彩</a></dd>
                                <dd><a data="L-7"  href="/index.php/index/game/9/3D福彩">福彩3D</a></dd>
                                <dd><a data="L-5"  href="/index.php/index/game/10/排列3">排列3</a></dd>
                            </dl>
                        </div>
                    </li>
                  
                   <li>
                        <a href="javascript:;" class="v-NoDagin"><i class="i_icon-dzyx"></i><b>电子游艺</b><sup>Games</sup></a>
                    </li>
                   <li>
                        <a href="/index.php/lottery/hemai"><i class="i_icon-tyjj"></i><em class="i_icon-new"></em><b>合买中心</b><sup>Sports</sup></a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="i_icon-account"></i>
                            <b>账户管理</b>
                            <sup>Account</sup>
                        </a>
                        <div class="nav_child nav_child2">
                            <p><a onclick="Xgo(this)" attr-href="/index.php/record/search" icon="yxbb">投注记录</a></p>
                            <p><a onclick="Xgo(this)" attr-href="/index.php/report/coin" data="T-bdkh" icon="bdkh">帐变记录</a></p>
                            <p><a onclick="Xgo(this)" attr-href="/index.php/report/count" data="T-czxx" icon="czxx">盈亏报表</a></p>
							<p><a onclick="Xgo(this)" attr-href="/index.php/safe/passwd" data="T-mmaq" icon="mmaq">密码安全</a></p>
							<p><a onclick="Xgo(this)" attr-href="/index.php/safe/info" data="T-bdkh" icon="bdkh">绑定卡号</a></p>
                        </div>
                    </li>
					<?php if($this->user['type']){?>
                    <li>
                        <a href="javascript:void(0);"><i class="i_icon-group"></i><b>团队管理</b><sup>Team</sup></a>
                        <div class="nav_child nav_child2">
                            <p><a onclick="Xgo(this)" attr-href="/index.php/team/memberList" data="T-tdbb" icon="tdbb">会员列表</a></p>
							<p><a onclick="Xgo(this)" attr-href="/index.php/team/gameRecord" data="T-zcgl" icon="zcgl">团队记录</a></p>
							<p><a onclick="Xgo(this)" attr-href="/index.php/team/coin" data="T-bdkh" icon="bdkh">团队帐变</a></p>
                            <p><a onclick="Xgo(this)" attr-href="/index.php/team/report" data="T-yhlb" icon="yhlb">团队盈亏</a></p>
                            <p><a onclick="Xgo(this)" attr-href="/index.php/team/addlink" data="T-tgsd" icon="tgsd">推广设定</a></p>
                        </div>
                    </li>
					<?}?>
                    <li>
                        <a href="javascript:void(0);"><i class="i_icon-activities"></i><b>优惠活动</b><sup>Discount</sup></a>
                        <div class="nav_child nav_child2">
                            <p><a href="/index.php/score/rotate">热门活动</a></p>
							<p><a onclick="Xgo(this)" attr-href="/index.php/cash/card">点卡充值</a></p>
                            <p><a class="notice" href="javascript:void(0)" url="/index.php/notice/info">系统公告</a></p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="fr"></div>
        </div>
        <div class="clear"></div>
    </div>
</div>
<div id="v-dalog" class="v-dalog">
	<div class="v-bg"></div>
	<span class="v-cn">近期开放，敬请期待
	</span>
</div>
<script type="text/javascript" src="/js/loginserver.js?v=0.8.5.5"></script>