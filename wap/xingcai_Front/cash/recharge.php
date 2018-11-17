<!DOCTYPE html>
<html>
<head>
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

    <script type="text/javascript">
      if (('standalone' in window.navigator) && window.navigator.standalone) {
        var noddy, remotes = false;
        document.addEventListener('click', function (event) {
          console.log(event);
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

<style type="text/css">
    .recharge_box {
        width: 210px;
        padding: 20px;
        font: 14px/26px "Microsoft YaHei"
    }

    .recharge_box h2 {
        font-size: 13px;
        font-weight: bold;
    }

    .recharge_box p {
        font: 14px/26px "Microsoft YaHei";
        text-indent: 0px
    }

    .recharge_box .recharge_edit {
        margin-top: 10px;
        text-align: center;
    }

    .recharge_box .recharge_edit a {
        display: inline-block;
        height: 24px;
        font: 14px/24px "Microsoft YaHei";
        background-color: #337ab7;
        color: #fff;
        margin-right: 10px;
        padding: 2px 10px
    }

    .recharge_box .recharge_edit a.go {
        background-color: #f0ad4e;
    }

    .rech-money input {
        float: none;
    }

    .test {
        width: 50px;
        height: 30px;
        line-height: 30px;
        text-align: center;
        float: left;
        background: #ddd;
        margin-left: 5px;
    }

    .test1 {
        height: 30px;
        line-height: 30px;
        text-align: center;
        float: left;
        background: #ddd;
        margin-left: 5px;

        width: 40px;
        border: 1px solid red;
    }

    .mycss {
        background: #ec2929;
        border: 0;
        border-radius: 5px;
        color: #fff;
        height: 36x;
        font-size: 100%;
        line-height: 36px;
        width: 95%;
        margin: 20px auto 0;
        display: block;
        outline: none;
    }
</style>

<body class="login-bg">
<div class="header">
    <div class="headerTop">
        <div class="ui-toolbar-left">
            <button id="reveal-left">reveal</button>
        </div>
        <h1 class="ui-toolbar-title">充值</h1>
        <div class="ui-bett-right">
            <a class="bett-head" href="javascript:;"></a>
        </div>
    </div>
</div>

<div id="wrapper_1" class="scorllmain-content scorll-order top_bar bottom_bar">
    <div class="sub_ScorllCont">
        <div class="rech-top">
            <div class="rech-top-left">用户名：<span class="red"><?php echo $this->user['username'] ?></span></div>
            <div class="rech-top-right"><a class="fr" href="javascript:;"><img
                            src="/assets/statics/images/cz_img_03.png"></a>账户余额：<span class="red"
                                                                                      id="balance"><?php echo $this->user['coin'] ?></span>元
            </div>
        </div>
        <div class="rech-money">
            <div style="width: 100%;margin-bottom: 10px;">
                <span class="fl">请输入充值金额：</span>
                <input type="text" placeholder="请输入充值金额" id="money" value="100"
                       style="float:left;height:30px;line-height:30px;"/>
                <i id="btn_clear" class="test" value="">清空</i><br>
            </div>
            <i id="btn_100" type="button" class="test1">100</i>
            <i id="btn_500" type="button" class="test1">500</i>
            <i id="btn_1000" type="button" class="test1">一千</i>
            <i id="btn_5000" type="button" class="test1">五千</i>
            <i id="btn_10000" type="button" class="test1">一万</i>
            <i id="btn_50000" type="button" class="test1">五万</i>
        </div>
        <div class="rech-money">
            <div style="width: 100%;margin-bottom: 10px;">
                <span class="fl">请输入付款账号名称：</span>
                <input type="text" placeholder="微信账号名称或者支付宝账号名称" id="pay_account_name"
                       style="float:left;height:30px;line-height:30px;width: 60%;"/>
            </div>
        </div>
        <div class="rech-tit">选择充值方式</div>
        <div class="rech-box">
            <div class="rech-title">
                <label for="bank" style="display: none;"><a data-type="bank" style="width: 20%;">银行转账</a></label>
                <input type="radio" id="bank" name="recharge_type" value="bank" checked="checked"
                       style="display: none;"/>
                <label for="WEIXINWAP"><a data-type="wechat" style="width: 20%;">微信</a></label>
                <input type="radio" id="WEIXINWAP" name="recharge_type" value="WEIXIN" style="display: none;"/>
                <label for="ALIPAYWAP"> <a data-type="alipay" style="width: 20%;">支付宝</a></label>
                <input type="radio" id="ALIPAYWAP" name="recharge_type" value="ALIPAYWAP" style="display: none;"/>
                <label for="QQPAYWAP" style="display: none;"><a f data-type="qqpay" style="width: 20%">QQ钱包</a></label>
                <input type="radio" id="QQPAYWAP" name="recharge_type" value="QQPAY" style="display: none;"/>
                <label for="www" style="display: none;"><a data-type="online" style="width: 20%;">网银支付</a></label>
                <input type="radio" id="www" name="recharge_type" value="abc" style="display: none;"/>
            </div>
            <!-- style="display:none;" -->
            <div class="rech_cont rech_wechat" style="display:none;">
                <!-- 微信充值 -->
                <ul class="wechat-box">
                    <li data-payid="1" data-payflag="3" data-needchk="1"><a class="fr" href="javascript:;"><img
                                    class="imgsel" style="display: block;" src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: none;" src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">微信（自动跳转支付）￥：1-1000元

                        </div>
                        <p></p>
                        <p>￥：1-1000元，微信一键跳转支付，成功率高
                        </p>
                        <p></p><input type="radio" id="weixin1" name="typeid" value="1" style="display: none;"
                                      checked="checked"/></li>

                    <li data-payid="2" data-payflag="3" data-needchk="1">
                        <a class="fr" href="javascript:;"><img class="imgsel" style="display: none;"
                                                               src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>

                        <div class="rech-list-t">（自动打开微信支付）￥：1-20000元</div>
                        <p></p>
                        <p>金额范围（￥：1-20000元）推荐使用，支付后立即到账</p>
                        <p></p></li>
                    <li data-payid="3" data-payflag="3" data-needchk="1">
                        <a class="fr" href="javascript:;"><img class="imgsel" style="display: none;"
                                                               src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">（自动打开微信支付）￥：1-20000元</div>
                        <p></p>
                        <p>金额范围（￥：1-20000元）推荐使用，支付后立即到账</p>
                        <p></p></li>
                </ul>
            </div>
            <div class="rech_cont rech_alipay" style="display: none;">
                <!-- 支付宝充值 -->
                <ul class="wechat-box">
                    <li data-payid="11" data-payflag="1" data-needchk="1"><a class="fr" href="javascript:;"><img
                                    class="imgsel" style="display: block;" src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: none;" src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">支付宝扫一扫（直接到帐）￥：10-20000元</div>
                        <p></p>
                        <p>￥：10-20000元，支持支付宝转银行，金额大，速度快</p>
                        <p></p></li>
                    <li data-payid="12" data-payflag="1" data-needchk="1"><a class="fr" href="javascript:;"><img
                                    class="imgsel" style="display: none;" src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">支付宝扫一扫（直接到账）￥：1-50000元</div>
                        <p></p>
                        <p>如多次充值不成功，可使用支付宝转帐至公司银行卡</p>
                        <p></p></li>
                    <li data-payid="13" data-payflag="1" data-needchk="1"><a class="fr" href="javascript:;"><img
                                    class="imgsel" style="display: none;" src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">支付宝扫一扫（直接到账）￥：1-50000元</div>
                        <p></p>
                        <p>如多次充值不成功，可使用支付宝转帐至公司银行卡</p>
                        <p></p></li>
                </ul>
            </div>
            <div class="rech_cont rech_qqpay" style="display:none;">
                <!-- QQ钱包  -->
                <ul class="wechat-box" style="display:block;">
                    <li data-payid="21" data-payflag="3" data-needchk="1"><a class="fr" href="javascript:;"><img
                                    class="imgsel" style="display: block;" src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: none;" src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">QQ（自动跳转支付）￥：1-1000元</div>
                        <p></p>
                        <p>￥：1-1000元，微信一键跳转支付，成功率高</p>
                        <p></p></li>
                    <li data-payid="22" data-payflag="3" data-needchk="1"><a class="fr" href="javascript:;"><img
                                    class="imgsel" style="display: none;" src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">（自动打开QQ钱包支付）￥：1-20000元</div>
                        <p></p>
                        <p>金额范围（￥：1-20000元）推荐使用，支付后立即到账</p>
                        <p></p></li>
                    <li data-payid="23" data-payflag="3" data-needchk="1"><a class="fr" href="javascript:;"><img
                                    class="imgsel" style="display: none;" src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">（自动打开QQ钱包支付）￥：1-20000元</div>
                        <p></p>
                        <p>金额范围（￥：1-20000元）推荐使用，支付后立即到账</p>
                        <p></p></li>
                </ul>
            </div>

            <div class="rech_cont rech_online" style="display: none; ">
                <!-- 银行转账充值 -->
                <ul class="wechat-box" style="display: block;">
                    <li data-payid="ABC"><a class="fr" href="javascript:;"><img class="imgsel" style="display: block;"
                                                                                src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: none;" src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">农业银行</div>
                        <p><br></p></li>
                    <li data-payid="BCOM"><a class="fr" href="javascript:;"><img class="imgsel" style="display: none;"
                                                                                 src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">交通银行</div>
                        <p><br></p></li>
                    <li data-payid="BOC"><a class="fr" href="javascript:;"><img class="imgsel" style="display: none;"
                                                                                src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">中国银行</div>
                        <p><br></p></li>
                    <li data-payid="CCB"><a class="fr" href="javascript:;"><img class="imgsel" style="display: none;"
                                                                                src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">建设银行</div>
                        <p><br></p></li>
                    <li data-payid="CEBB"><a class="fr" href="javascript:;"><img class="imgsel" style="display: none;"
                                                                                 src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">光大银行</div>
                        <p><br></p></li>
                    <li data-payid="CIB"><a class="fr" href="javascript:;"><img class="imgsel" style="display: none;"
                                                                                src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">兴业银行</div>
                        <p><br></p></li>
                    <li data-payid="CMB"><a class="fr" href="javascript:;"><img class="imgsel" style="display: none;"
                                                                                src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">招商银行</div>
                        <p><br></p></li>
                    <li data-payid="NBB"><a class="fr" href="javascript:;"><img class="imgsel" style="display: none;"
                                                                                src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">宁波银行</div>
                        <p><br></p></li>
                    <li data-payid="PSBC"><a class="fr" href="javascript:;"><img class="imgsel" style="display: none;"
                                                                                 src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">中国邮政银行</div>
                        <p><br></p></li>
                    <li data-payid="SHB"><a class="fr" href="javascript:;"><img class="imgsel" style="display: none;"
                                                                                src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">上海银行</div>
                        <p><br></p></li>
                    <li data-payid="SPABANK"><a class="fr" href="javascript:;"><img class="imgsel"
                                                                                    style="display: none;"
                                                                                    src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">平安银行</div>
                        <p><br></p></li>
                    <li data-payid="SPDB"><a class="fr" href="javascript:;"><img class="imgsel" style="display: none;"
                                                                                 src="/assets/statics/images/cz_02.png"><img
                                    class="imgnotsel" style="display: block;"
                                    src="/assets/statics/images/cz_01.png"></a>
                        <div class="rech-list-t">浦发银行</div>
                        <p><br></p></li>
                </ul>
            </div>
            <div id="pay_list_maint" class="wechat-important" style="display: none;">
                <img src="/assets/statics/images/cz_img_14.png">
                <div class="pay-sorry">该充值方式正在维护中，给您带来不便，敬请谅解！<br>
                    我们将尽快恢复服务，您可以选择其他支付方式，谢谢。
                </div>
            </div>
            <div id="pay_list_stop" class="wechat-important" style="display: none;">
                <img src="/assets/statics/images/cz_img_14.png">
                <div class="pay-sorry">
                    该支付方式未设置，给您带来不便，敬请谅解！<br>
                    您可以选择其他支付方式，谢谢！
                </div>
            </div>
        </div>

        <!--<button id="charge-btn" class="charge-btn" onclick="incharge()">下一步</button>-->
        <button id="charge-btn" class="mycss" onclick="incharge()">下一步</button>
        <div class="charge">
            <div class="charge-tips">
            </div>
        </div>
    </div>
</div>

<div id="wrapper_2" class="scorllmain-content scorll-order top_bar bottom_bar" style="display: none;">
    <div class="sub_ScorllCont">
        <div class="tit-txt">
            <h3>您欲转入的<b class="third_name"></b>：</h3>
        </div>
        <div class="charge-bank">
            <ul>
                <li><span class="left">订单号：</span><b id="third_orderno"><b></li>
                <li><span class="left">充值金额：</span><b id="third_amount"><b></li>
            </ul>
        </div>
        <div class="charge-two" id="third_charge_two"><img style="width: 210px;" id="pay_code_img" src="" alt=""></div>
        <div style="font-size: 14px;">如遇无法充值请降低金额或点击上一步更换其他充值方式</div>
        <div class="arge-btn">
            <button class="arge-btn2" id="step_prev_third" style="width: 45%; margin-right: 5px;"><span
                        style="font-size: 14px;">上一步</span></button>
            <button class="arge-btn2" id="step_next_third" style="width: 45%; margin-left: 5px;"><span
                        style="font-size: 14px;">我已支付</span></button>
        </div>
        <div id="third_alipay" class="charge-tips" style="margin:20px 10px 0;display: none;">
            <p><span class="red">*</span>扫码步骤：</p>
            <p>1.请自行截屏或保存二维码图片到相册，同时打开<b class="third_name">支付宝</b>。</p>
            <p>2.请在<b class="third_name">支付宝</b>中打开“扫一扫”。</p>
            <p>3.在扫一扫中点击右上解，选择“从相册选择二维码”选取截屏的图片。</p>
            <p>4.在<b class="third_name">支付宝</b>支付完成后，请点击“我已支付”提交审核。</p>
        </div>
        <div id="third_qqpay" class="charge-tips" style="margin:20px 10px 0;display: none;">
            <p><span class="red">*</span>扫码步骤：</p>
            <p>1.请自行截屏或保存二维码图片到相册，同时打开<b class="third_name">QQ钱包</b>。</p>
            <p>2.请在<b class="third_name">QQ钱包</b>中打开“扫一扫”。</p>
            <p>3.在扫一扫中点击右上解，选择“从相册选择二维码”选取截屏的图片。</p>
            <p>4.在<b class="third_name">QQ钱包</b>支付完成后，请点击“我已支付”提交审核。</p>
        </div>
        <div id="third_wechat" class="charge-tips" style="margin:20px 10px 0;display: none;">
            <p><span class="red">*</span>旧版微信：</p>
            <p>1.请自行截屏或保存二维码图片到相册，同时打开微信。</p>
            <p>2.请在微信中打开“扫一扫”。</p>
            <p>3.在扫一扫中点击右上解，选择“从相册选择二维码”选取截屏的图片。</p>
            <p>4.输入您欲充值的金额并进行转账。如充值未及时到账，请联系在线客服。</p>

            <br>
            <p><span class="red">*</span>新版微信（由于新版限制长按识别功能不能打开相册扫码支付，您可以通过以下方式完成操作）：</p>
            <p>1.换一个手机扫码二维码完成支付。</p>
            <p>2.用电脑登录账号，用手机扫一扫完成支付。</p>
            <p>3.把二维码传到电脑再使用手机扫一扫也可完成支付。</p>

            <p>在微信支付完成后，请点击“我已支付”提交审核。</p>
        </div>
    </div>
</div>

<form class="pay-form1" id="third_form" action="" method="post" target="_blank">
    <input type="hidden" id="third_type" name="type" value="">
    <input type="hidden" id="third_payid" name="payId" value="">
    <input type="hidden" id="third_member_id" name="memberId" value="7139">
    <input type="hidden" id="third_recharge_amount" name="amount" value="">
    <input type="hidden" id="third_bank_name" name="bankName" value="">
    <input type="hidden" name="userName" value="">
    <input type="hidden" name="isH5" value="1">
    <input type="hidden" id="third_base_url" name="baseUrl" value="">
</form>

<form id="online_form" action="" method="post" target="_blank">
    <input type="hidden" name="type" value="4">
    <input type="hidden" id="online_payid" name="payId" value="">
    <input type="hidden" id="online_type" value="">
    <input type="hidden" id="online_member_id" name="memberId" value="7139">
    <input type="hidden" id="online_minamount" value="">
    <input type="hidden" id="online_mamxamount" value="">
    <input id="online_money" class="pay-int" name="amount" type="hidden"/>
    <input id="online_bank" name="bankName" type="hidden"/>
    <input type="hidden" name="isH5" value="1">
    <input type="hidden" id="online_base_url" name="baseUrl" value="">
</form>


<!-- 菜单右侧tips -->
<div class="beet-rig" style="height: 85px;display: none;">
    <ul>
        <li><a href="/index.php/cash/rechargeLog">充值记录</a></li>
        <li style="border-color: #c91b1c;"><a href="common/kefu" target="_blank">在线客服</a></li>
    </ul>
</div>

<div id="dialog" style="display: none;">
    <div class="recharge_box">
        <h2>请您在新打开的第三方页面进行操作</h2>
        <p>操作完成前请不要关闭该窗口！</p>
        <div class="recharge_edit">
            <a href="javascript:;"
               onclick="document.getElementById('layui-m-layer0').style.display='none';location.href='member/recharge/list';">充值已完成</a>
        </div>
    </div>
</div>

<input type="hidden" value="0" id="is_app_access">

<script src="/assets/js/require.js" data-main="/assets/js/application/recharge"></script>
<script src="/assets/js/require.config.js?v=2.11"></script>
<script type="text/javascript" src="/skin/js/jquery-1.8.3.min.js"></script>
<script type="text/javascript">
  var payid;
  function bindPayList() {
    $('ul.wechat-box li').bind('click', function () {
      event.preventDefault();
      $('ul.wechat-box li img.imgsel').hide();
      $('ul.wechat-box li img.imgnotsel').show();
      $(this).find('img.imgnotsel').hide();
      $(this).find('img.imgsel').show();

      payid = $(this).data('payid');
        /*
         payMin = $(this).data('min');
         payMax = $(this).data('max');
         payCode = $(this).data('code');
         payUrl = $(this).data('payurl');
         payReturnType = $(this).data('type');
         isBank = $(this).data('paytype') == 5 ? 1 : 0;
         */


    });
  }

  bindPayList();
  function incharge() {
    var money = $("#money").val();
    var banktype = $('input[name="recharge_type"]:checked').val();
    var pay_account_name = $("#pay_account_name").val();

    if (banktype != 'WEIXIN' && banktype != 'ALIPAYWAP') {
      alert('请选择充值方式');
      return;
    }

    if (money == '' || money == 0) {
      alert('请输入充值金额');
      return;
    }

    if (!pay_account_name) {
      alert('请输入付款账号名称');
      return;
    }

      /*
       if (payid==2) {
       ddbcharge(2,money);
       return;
       }else if(payid==12)
       {
       ddbcharge(1,money);
       return;
       }else if(payid==22)
       {
       ddbcharge(3,money);
       return;
       }else */
    if (banktype == 'WEIXIN') {
      xmcharge(21, money, pay_account_name);
      return;
    } else if (banktype == 'ALIPAYWAP') {
      xmcharge(22, money, pay_account_name);
      return;
    } else if (banktype == 'QQPAY') {
      xmcharge(3, money, pay_account_name);
      return;
    } else if (banktype == 'abc') {
      ddbcharge(4, money);
      return;
    }

    var form = $("<form></form>");
    form.attr('action', '/index.php/cash/inRecharge');
    form.attr('method', 'post');
    form.attr('target', '_self');
    var input1 = $("<input type='hidden' name='mBankId' />");
    input1.attr('value', banktype);
    var input2 = $("<input type='hidden' name='amount' />");
    input2.attr('value', money);
    var input3 = $("<input type='hidden' name='pay_account_name' />");
    input3.attr('value', pay_account_name);

    form.append(input1);
    form.append(input2);
    form.append(input3);
    form.appendTo("body");
    form.css('display', 'none');
    form.submit();

  }

  function ddbcharge(banktype, money) {
    var form = $("<form></form>");
    form.attr('action', '/index.php/cash/ddbRecharge');
    form.attr('method', 'post');
    form.attr('target', '_self');
    var input1 = $("<input type='hidden' name='mBankId' />");
    input1.attr('value', banktype);
    var input2 = $("<input type='hidden' name='amount' />");
    input2.attr('value', money);
    var input3 = $("<input type='hidden' name='uid' />");
    input3.attr('value', <?php echo $this->user['uid']; ?>);
    form.append(input1);
    form.append(input2);
    form.append(input3);
    form.appendTo("body");
    form.css('display', 'none');
    form.submit();
  }

  function xmcharge(banktype, money, pay_account_name) {
    var form = $("<form></form>");
    form.attr('action', '/index.php/cash/xmRecharge');
    form.attr('method', 'post');
    form.attr('target', '_self');
    var input1 = $("<input type='hidden' name='mBankId' />");
    input1.attr('value', banktype);
    var input2 = $("<input type='hidden' name='amount' />");
    input2.attr('value', money);
    var input3 = $("<input type='hidden' name='uid' />");
    input3.attr('value', <?php echo $this->user['uid']; ?>);
    var input4 = $("<input type='hidden' name='pay_account_name' />");
    input4.attr('value', pay_account_name);
    form.append(input1);
    form.append(input2);
    form.append(input3);
    form.append(input4);
    form.appendTo("body");
    form.css('display', 'none');
    form.submit();
  }
</script>
</body>
</html>