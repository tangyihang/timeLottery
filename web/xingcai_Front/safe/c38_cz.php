<?php $this->display('C38_header_new.php'); ?>
    <script src="../../team_js/bootstrap-datetimepicker.min.js"></script>
    <script src="../../team_js/bootstrap-datetimepicker.zh-CN.js"></script>

    <script src="../../team_js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="/files/pay.css" type="text/css">
    <div id="h2" class="wrap" style=" width:1220px; margin:0 auto;">
        <style type="text/css">.pay-top_1 > a {
                float: none;
                display: inline-block;
                width: 18%;
                font-size: 15px;
            }

            .wechat-tit {
                text-align: left !important;
                text-indent: 57px;
            }

            .wechat-top p {
                text-align: left;
                text-indent: 57px;
            }

            .bank-tit,
            .bank-tit ul {
                width: 100%;
                height: 40px;
                text-align: center;
            }

            .bank-tit ul li {
                width: 24% !important;
                float: none;
                display: inline-block;
            }

            #div_2 {
                float: left;
                width: 1046px;
                background-color: #f1f1f1;
            }

            .datepicker-dropdown {
                position: absolute;
                border: 1px solid #ccc !important;
            }

            .datepicker.datepicker-dropdown.dropdown-menu.datepicker-orient-left.datepicker-orient-top {
                position: absolute !important;
                background-color: #fff;
                border: 1px solid #ccc !important;
            }</style>
        <?php $this->display('siderbar.php'); ?>
        <link rel="stylesheet" href="/css/nsc/list.css?v=1.16.11.9"/>
        <div id="div_1" class="clearfix right-div">
            <div class="play-wrap">
                <div class="deposit-info subContent_bet_re" style="width: 1046px;margin-left: 0;">
                    <div class="pay-top_1 clearfix" style="text-align: left;width: 875px;text-indent: 21px;">
                        <a class="current" data-func="weChatDeposit_1">
                            微信支付
                        </a>
                        <a id="hidden" style="display: none;">
                            QQ钱包
                        </a>
                        <a data-func="baoDeposit_1">
                            支付宝支付
                        </a>
                        <a data-func="bankDeposit">
                            银行入款
                        </a>
                        <a data-enable="1" style="display: none;">
                            线上支付
                        </a>
                    </div>
                    <!-- 微信支付 -->
                    <div id="WePay_div" class="pay-info" style="display: block;width: 875px;float: left;">
                        <!-- 微信支付第一步 -->
                        <div class="wechat-info" id="wechat_step1">
                            <div class="title_tip">
                                请在下列支付方式中任选一种
                            </div>
                            <div name="step_one_list" class="wechat-one">
                                <!--<div name="block_0" class="wechat-top">
                                    <div class="wechat-tit text-center">
                                        微信￥：10-20000元（长按识别二维码支付）
                                    </div>
                                    <p class="text-center">
                                        将截屏二维码发送至微信对话窗口，长按识别支付
                                    </p>
                                    <div class="wechat-recharge">
                                        <span>充值金额：</span>
                                        <input id="money" name="amount" class="wechat-int" maxlength="14">
                                        <a name="next_btn" data-index="0" class="btn fr"  onclick="incharge('2')">
                                            下一步
                                        </a>
                                    </div>
                                </div>

                                <div name="block_1" class="wechat-top">
                                    <div class="wechat-tit text-center">
                                        微信￥：10-20000元（长按识别二维码支付）
                                    </div>
                                    <p class="text-center">
                                        将截屏二维码发送至微信对话窗口，长按识别支付
                                    </p>
                                    <div class="wechat-recharge">
                                        <span>充值金额：</span>
                                        <input id="money1" name="amount" class="wechat-int" maxlength="14">
                                        <a name="next_btn" data-index="0" class="btn fr"  onclick="ddbcharge('2')">
                                            下一步
                                        </a>
                                    </div>
                                </div>-->
                                <div name="block_2" class="wechat-top">
                                    <div class="wechat-tit text-center">
                                        微信￥：10-20000元（长按识别二维码支付）
                                    </div>
                                    <p class="text-center">
                                        将截屏二维码发送至微信对话窗口，长按识别支付
                                    </p>
                                    <div class="wechat-recharge">
                                        <span>充值金额：</span>
                                        <input id="money2" name="amount" class="wechat-int" maxlength="14">
                                        <span>付款账号名称：</span>
                                        <input id="pay_account_name2" name="pay_account_name" class="wechat-int">
                                        <a name="next_btn" style="margin-left: 20px;" data-index="0" class="btn fr" onclick="xmcharge('21')">
                                            下一步
                                        </a>
                                    </div>
                                </div>

                            </div>

                            <div class="pay-info-tit">
                                <div class="tip_input_blue bold">
                                    操作步骤：
                                </div>
                                <div class="tips f12">
                                    <p>
                                        ※ 1.微信支付（扫一扫直接到账） 方便快捷，支付完成立即到账。
                                    </p>
                                    <p>
                                        ※ 24小时存款不限次数，免除所有手续费，3分钟火速到账。
                                    </p>
                                    <p>
                                        ※ 存款遇到问题？立即联络在线客服为您服务。
                                    </p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <!-- 微信支付第二步 - 扫码 -->
                        <div id="wechat_step2_scan" class="wechat-info" style="display:none;">
                            <div class="wechat-order">
                                <div class="we-or-left"></div>
                                <div class="we-or-tit">
                                    <h3>订单提交成功，请扫描以下二维码付款！</h3>
                                    <p>
                                        订单号：<span class="red" name="orderId" id="orderId_qr"></span><span
                                                class="copy_outer">
									<a id="wx_Pay" data-cp="orderId_2_s" name="cp_btn" class="we-blue">
										复制
									</a></span> 　|　应付金额：<span class="red" id="qrmoney"></span>元
                                    </p>
                                </div>
                                <div id="qrcode_wx">

                                </div>
                                <div class="clearfix pay-button">
                                    <a class="btn fl" name="back_btn">
                                        上一步
                                    </a>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="pay-info-tit">
                                <div class="tip_input_blue bold">
                                    操作步骤：
                                </div>
                                <div class="tips f12">
                                    <p>
                                        ※ 1.手机登录微信.
                                    </p>
                                    <p>
                                        ※ 2.打开微信功能扫一扫页面
                                    </p>
                                    <p>
                                        ※ 3.扫描电脑屏幕二维码.即可到账
                                    </p>
                                    <p>
                                        ※ 存款遇到问题？立即联络在线客服为您服务。
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- 微信支付第二步  - 加好友-->
                        <div id="wechat_step2_addF" class="wechat-info wechat-three" style="display:none">
                            <div class="pay-info-left">
                                <div class="pay-tit">
                                    <i></i>微信添加好友支付
                                </div>
                                <div class="pay-copy">
                                    <p>
                                        微信名称：<span id="wxName"></span><span class="copy_outer">
									<a id="wxName_copy" class="pay-a">
										复制
									</a></span>
                                    </p>
                                    <p>
                                        微信账号：<span id="sWechatID" name="sWechatID" class="red"></span><span
                                                class="copy_outer">
									<a id="sWechatID_copy" class="pay-a">
										复制
									</a></span>
                                    </p>
                                </div>
                                <div class="pay-box">
                                    <div class="row">
                                        <label>存款金额：</label>
                                        <div>
                                            <input type="text" name="amount" class="pay-int" readonly="">
                                        </div>
                                    </div>
                                    <div class="row" style="display:none;">
                                        <label>存款账号：</label>
                                        <div>
                                            <input type="text" name="userName" class="pay-int " maxlength="20"
                                                   placeholder="填写游戏账号名">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>存款时间：</label>
                                        <div>
                                            <div class="pay-time">
                                                <input readonly="" style="width:80px;" type="text" name="date">
                                                <i class="pay-time-icon"></i>
                                                <select name="hour"></select>
                                                <select name="minutes"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="text-align:center;padding-top:15px;font-size:12px;color:#999;">
                                        扫码支付后点击下面[提交订单]
                                    </p>
                                    <div class="row">
                                        <label>&nbsp;</label>
                                        <button name="submit" class="pay-wei-btn">
                                            提交订单
                                        </button>
                                    </div>

                                </div>

                            </div>
                            <div class="pay-info-right">
                                <div class="pay-tit">
                                    扫描以下二维码添加好友
                                </div>
                                <div class="pay-box">
                                    <div class="wechat-img">
                                        <img name="pay_code_img">
                                        <p class="red">
                                            手机打开微信扫一扫添加好友
                                        </p>
                                    </div>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <div class="clearfix pay-button">
                                <a class="btn fl" name="back_btn">
                                    上一步
                                </a>
                            </div>
                            <div class="pay-info-tit">
                                <div class="tip_input_blue bold">
                                    操作步骤：
                                </div>
                                <div class="tips f12">
                                    <p>
                                        ※ 1.搜索好友,添加微信账号ID为好友,进行转账,
                                    </p>
                                    <p>
                                        ※ 2.打开微信扫一扫功能,扫描屏幕方二维码添加微信好友进行转账.
                                    </p>
                                    <p>
                                        ※ 3.转账完成在当面页面提交用户信息.(客服审核三分钟内到账)
                                    </p>
                                    <p>
                                        ※ 存款遇到问题？立即联络在线客服为您服务。
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--<iframe name="frame1" style="display: block;width: 875px;float: left;"></iframe>-->

                    <!-- QQ钱包支付 -->
                    <div id="qq_step1" class="pay-info" style="display:none;">
                        <!-- 支付宝付第一步 -->

                        <div class="title_tip">
                            请在下列支付方式中任选一种
                        </div>
                        <div name="step_one_list" class="wechat-one">

                            <!--<div name="block_2" class="wechat-top">
                                <div class="wechat-tit text-center">
                                    （自动打开QQ钱包支付）￥：1-20000元
                                </div>
                                <p class="text-center">
                                    金额范围（￥：1-20000元）支付后立即到账
                                </p>
                                <div class="wechat-recharge">
                                    <span>充值金额：</span>
                                    <input id="qqmoney" name="amount" class="wechat-int" maxlength="14">
                                    <a name="next_btn" onclick="incharge(3)" data-index="2" class="btn fr">
                                        下一步
                                    </a>
                                </div>
                            </div>
                            <div name="block_3" class="wechat-top">
                                <div class="wechat-tit text-center">
                                    （自动打开QQ钱包支付）￥：1-20000元
                                </div>
                                <p class="text-center">
                                    金额范围（￥：1-20000元）推荐使用，支付后立即到账
                                </p>
                                <div class="wechat-recharge">
                                    <span>充值金额：</span>
                                    <input id="qqmoney1" name="amount" class="wechat-int" maxlength="14">
                                    <a name="next_btn" data-index="3" class="btn fr" onclick="ddbcharge(3)">
                                        下一步
                                    </a>
                                </div>
                            </div>-->
                            <div name="block_4" class="wechat-top">
                                <div class="wechat-tit text-center">
                                    （暂无此支付方式）<!--￥：1-20000元-->
                                </div>
                                <!--<p class="text-center">
                                    金额范围（￥：1-20000元）推荐使用，支付后立即到账
                                </p>
                                <div class="wechat-recharge">
                                    <span>充值金额：</span>
                                    <input id="qqmoney2" name="amount" class="wechat-int" maxlength="14">
                                    <a name="next_btn" data-index="3" class="btn fr" onclick="xmcharge(3)">
                                        下一步
                                    </a>
                                </div>-->
                            </div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="pay-info-tit">
                            <div class="tip_input_blue bold">
                                操作步骤：
                            </div>
                            <div class="tips f12">
                                <p>
                                    ※ 1.支付宝支付（扫一扫直接到账） 方便快捷，支付完成立即到账。
                                </p>
                                <p>
                                    ※ 24小时存款不限次数，免除所有手续费，3分钟火速到账。
                                </p>
                                <p>
                                    ※ 存款遇到问题？立即联络在线客服为您服务。
                                </p>
                                <p></p>
                            </div>
                        </div>
                        <!-- 支付宝付第二步 _ 扫码 -->
                        <div id="qq_step2_scan" class="wechat-info" style="display: none;">
                            <div class="wechat-order">
                                <div class="we-or-left"></div>
                                <div class="we-or-tit">
                                    <h3>订单提交成功，请扫描以下二维码付款！</h3>
                                    <p>
                                        订单号：<span class="red" id="bao_2_oid_s" name="orderId"></span><span
                                                class="copy_outer">
									<a id="bao_2_oid_s_copy" class="pay-a">
										复制
									</a></span> 　|　应付金额：<span id="qrmoney2" name="amount" class="red"></span> 元
                                    </p>
                                </div>
                                <div id="qrcode_qq">

                                </div>
                                <div class="clearfix pay-button">
                                    <a class="btn fl" name="back_btn">
                                        上一步
                                    </a>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <div class="pay-info-tit">
                                <div class="tip_input_blue bold">
                                    操作步骤：
                                </div>
                                <div class="tips f12">
                                    <p>
                                        ※ 1.手机登录支付宝.
                                    </p>
                                    <p>
                                        ※ 2.打开支付宝功能扫一扫页面
                                    </p>
                                    <p>
                                        ※ 3.扫描电脑屏幕二维码.即可到账
                                    </p>
                                    <p>
                                        ※ 存款遇到问题？立即联络在线客服为您服务。
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- 支付宝付第二步 _ 添加好友 -->
                        <div id="bao_step2_addF" class="wechat-info wechat-three" style="display:none">
                            <div class="pay-info-left">
                                <div class="pay-tit">
                                    <i></i>支付宝添加好友支付
                                </div>
                                <div class="pay-copy">
                                    <p>
                                        支付宝名称：<span id="bao_2_a_name"></span><span class="copy_outer">
									<a id="bao_2_a_name_copy" class="pay-a">
										复制
									</a></span>
                                    </p>
                                    <p>
                                        支付宝账号：<span id="bao_2_a_oid" class="red"></span><span class="copy_outer">
									<a id="bao_2_a_oid_copy" class="pay-a">
										复制
									</a></span>
                                    </p>
                                </div>
                                <div class="pay-box">
                                    <div class="row">
                                        <label>存款金额：</label>
                                        <div>
                                            <input type="text" name="amount" class="pay-int" readonly="" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="row" style="display: none;">
                                        <label>存款账号：</label>
                                        <div>
                                            <input type="text" name="userName" class="pay-int " maxlength="20"
                                                   placeholder="填写游戏账号名">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>存款时间：</label>
                                        <div>
                                            <div class="pay-time">
                                                <input name="date" type="text" style="width:80px;">
                                                <i class="pay-time-icon"></i>
                                                <select name="hour"></select>
                                                <select name="minutes"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="text-align:center;padding-top:15px;font-size:12px;color:#999;">
                                        扫码支付后点击下面[提交订单]
                                    </p>
                                    <div class="row">
                                        <label>&nbsp;</label>
                                        <button name="submit" class="pay-wei-btn">
                                            提交订单
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="pay-info-right">
                                <div class="pay-tit">
                                    扫描以下二维码添加好友
                                </div>
                                <div class="pay-box">
                                    <div class="wechat-img">
                                        <img name="pay_code_img">
                                        <p class="red">
                                            手机打开支付宝扫一扫添加好友
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="clearfix pay-button">
                                <a class="btn fl" name="back_btn">
                                    上一步
                                </a>
                            </div>
                            <div class="pay-info-tit">
                                <div class="tip_input_blue bold">
                                    温馨提示：
                                </div>
                                <div class="tips f12">
                                    <p>
                                        ※ 手机扫描右上角二维码图片，即可付款，输入充值金额点击付款，成功后点击页面上的“我已支付”完成支付
                                    </p>
                                    <p>
                                        ※ 24小时存款不限次数，免除所有手续费，3分钟火速到账。
                                    </p>
                                    <p>
                                        ※ 存款遇到问题？立即联络在线客服为您服务。
                                    </p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>

                    <!-- 支付宝支付 -->
                    <div class="pay-info" style="display:none;">
                        <!-- 支付宝付第一步 -->
                        <div id="bao_step1" class="wechat-info">
                            <div class="title_tip">
                                请在下列支付方式中任选一种
                            </div>
                            <div name="step_one_list" class="wechat-one">
                                <!--<div name="block_0" class="wechat-top">
                                    <div class="wechat-tit text-center">
                                        支付宝扫一扫（直接到帐）￥：10-20000元
                                    </div>
                                    <p class="text-center">
                                        ￥：10-20000元，支持支付宝转银行，金额大，速度快
                                    </p>
                                    <div class="wechat-recharge">
                                        <span>充值金额：</span>
                                        <input id="zfbmoney" name="amount" class="wechat-int" maxlength="14">
                                        <a name="next_btn" onclick="incharge(1)" data-index="0" class="btn fr">
                                            下一步
                                        </a>
                                    </div>
                                </div>
                                <div name="block_1" class="wechat-top">
                                    <div class="wechat-tit text-center">
                                        支付宝扫一扫（直接到账）￥：1-50000元
                                    </div>
                                    <p class="text-center">
                                        如多次充值不成功，可使用支付宝转帐至公司银行卡
                                    </p>
                                    <div class="wechat-recharge">
                                        <span>充值金额：</span>
                                        <input id="zfbmoney1" name="amount" class="wechat-int" maxlength="14">
                                        <a name="next_btn" onclick="ddbcharge(1)" data-index="1" class="btn fr">
                                            下一步
                                        </a>
                                    </div>
                                </div>-->
                                <div name="block_2" class="wechat-top">
                                    <div class="wechat-tit text-center">
                                        支付宝扫一扫（直接到账）￥：10-50000元
                                    </div>
                                    <p class="text-center">
                                        如多次充值不成功，可使用支付宝转帐至公司银行卡
                                    </p>
                                    <div class="wechat-recharge">
                                        <span>充值金额：</span>
                                        <input id="zfbmoney2" name="amount" class="wechat-int" maxlength="14">
                                        <span>付款账号名称：</span>
                                        <input id="pay_account_name" name="pay_account_name" class="wechat-int">
                                        <a name="next_btn" style="margin-left: 20px;" onclick="xmcharge(22)" data-index="1" class="btn fr">
                                            下一步
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="pay-info-tit">
                                <div class="tip_input_blue bold">
                                    操作步骤：
                                </div>
                                <div class="tips f12">
                                    <p>
                                        ※ 1.支付宝支付（扫一扫直接到账） 方便快捷，支付完成立即到账。
                                    </p>
                                    <p>
                                        ※ 24小时存款不限次数，免除所有手续费，3分钟火速到账。
                                    </p>
                                    <p>
                                        ※ 存款遇到问题？立即联络在线客服为您服务。
                                    </p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <!-- 支付宝付第二步 _ 扫码 -->
                        <div id="bao_step2_scan" class="wechat-info" style="display: none;">
                            <div class="wechat-order">
                                <div class="we-or-left"></div>
                                <div class="we-or-tit">
                                    <h3>订单提交成功，请扫描以下二维码付款！</h3>
                                    <p>
                                        订单号：<span class="red" id="bao_2_oid_s" name="orderId"></span><span
                                                class="copy_outer">
									<a id="bao_2_oid_s_copy" class="pay-a">
										复制
									</a></span> 　|　应付金额：<span id="qrmoney1" name="amount" class="red"></span> 元
                                    </p>
                                </div>
                                <div id="qrcode_zfb">

                                </div>
                                <div class="clearfix pay-button">
                                    <a class="btn fl" name="back_btn">
                                        上一步
                                    </a>
                                </div>

                            </div>
                            <div class="clearfix"></div>
                            <div class="pay-info-tit">
                                <div class="tip_input_blue bold">
                                    操作步骤：
                                </div>
                                <div class="tips f12">
                                    <p>
                                        ※ 1.手机登录支付宝.
                                    </p>
                                    <p>
                                        ※ 2.打开支付宝功能扫一扫页面
                                    </p>
                                    <p>
                                        ※ 3.扫描电脑屏幕二维码.即可到账
                                    </p>
                                    <p>
                                        ※ 存款遇到问题？立即联络在线客服为您服务。
                                    </p>
                                </div>
                            </div>
                        </div>
                        <!-- 支付宝付第二步 _ 添加好友 -->
                        <div id="bao_step2_addF" class="wechat-info wechat-three" style="display:none">
                            <div class="pay-info-left">
                                <div class="pay-tit">
                                    <i></i>支付宝添加好友支付
                                </div>
                                <div class="pay-copy">
                                    <p>
                                        支付宝名称：<span id="bao_2_a_name"></span><span class="copy_outer">
									<a id="bao_2_a_name_copy" class="pay-a">
										复制
									</a></span>
                                    </p>
                                    <p>
                                        支付宝账号：<span id="bao_2_a_oid" class="red"></span><span class="copy_outer">
									<a id="bao_2_a_oid_copy" class="pay-a">
										复制
									</a></span>
                                    </p>
                                </div>
                                <div class="pay-box">
                                    <div class="row">
                                        <label>存款金额：</label>
                                        <div>
                                            <input type="text" name="amount" class="pay-int" readonly="" maxlength="20">
                                        </div>
                                    </div>
                                    <div class="row" style="display: none;">
                                        <label>存款账号：</label>
                                        <div>
                                            <input type="text" name="userName" class="pay-int " maxlength="20"
                                                   placeholder="填写游戏账号名">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <label>存款时间：</label>
                                        <div>
                                            <div class="pay-time">
                                                <input name="date" type="text" style="width:80px;">
                                                <i class="pay-time-icon"></i>
                                                <select name="hour"></select>
                                                <select name="minutes"></select>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="text-align:center;padding-top:15px;font-size:12px;color:#999;">
                                        扫码支付后点击下面[提交订单]
                                    </p>
                                    <div class="row">
                                        <label>&nbsp;</label>
                                        <button name="submit" class="pay-wei-btn">
                                            提交订单
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="pay-info-right">
                                <div class="pay-tit">
                                    扫描以下二维码添加好友
                                </div>
                                <div class="pay-box">
                                    <div class="wechat-img">
                                        <img name="pay_code_img">
                                        <p class="red">
                                            手机打开支付宝扫一扫添加好友
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix"></div>
                            <div class="clearfix pay-button">
                                <a class="btn fl" name="back_btn">
                                    上一步
                                </a>
                            </div>
                            <div class="pay-info-tit">
                                <div class="tip_input_blue bold">
                                    温馨提示：
                                </div>
                                <div class="tips f12">
                                    <p>
                                        ※ 手机扫描右上角二维码图片，即可付款，输入充值金额点击付款，成功后点击页面上的“我已支付”完成支付
                                    </p>
                                    <p>
                                        ※ 24小时存款不限次数，免除所有手续费，3分钟火速到账。
                                    </p>
                                    <p>
                                        ※ 存款遇到问题？立即联络在线客服为您服务。
                                    </p>
                                    <p></p>
                                </div>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                    <!-- 银行入款 -->
                    <div id="bankDeposit_div" class="pay-info" style="display: none">
                        <form class="pay-form1">
                            <div class="row">
                                <label>存款人姓名 ：</label>
                                <div>
                                    <input name="userName" type="text" class="pay-int" placeholder="请输入真实姓名"
                                           maxlength="20">
                                </div>
                            </div>
                            <div class="row">
                                <label>开户银行 ：</label>
                                <div class="pay-select">
                                    <select>
                                        <option>请选择银行</option>
                                        <option value=" 中国农业银行" bankurl="http://www.abchina.com"> 中国农业银行</option>
                                        <option value=" 中国建设银行" bankurl="http://www.ccb.com/"> 中国建设银行</option>
                                        <option value=" 中国工商银行" bankurl="http://www.icbc.com.cn"> 中国工商银行</option>
                                        <option value=" 招商银行" bankurl="http://www.cmbchina.com/"> 招商银行</option>
                                        <option value=" 中国银行" bankurl="http://www.boc.cn/"> 中国银行</option>
                                        <option value=" 中国邮政储蓄" bankurl="http://www.psbc.com/"> 中国邮政储蓄</option>
                                        <option value=" 中国民生银行" bankurl="http://www.cmbc.com.cn/"> 中国民生银行</option>
                                        <option value=" 中信银行" bankurl="http://bank.ecitic.com/"> 中信银行</option>
                                        <option value=" 中国光大银行" bankurl="http://www.cebbank.com/"> 中国光大银行</option>
                                        <option value=" 兴业银行" bankurl="http://www.cib.com.cn"> 兴业银行</option>
                                        <option value=" 华夏银行" bankurl="http://www.hxb.com.cn/"> 华夏银行</option>
                                        <option value=" 北京银行" bankurl="http://www.bankofbeijing.com.c"> 北京银行</option>
                                        <option value=" 浦发银行" bankurl="http://www.spdb.com.cn"> 浦发银行</option>
                                        <option value=" 广发银行" bankurl="http://www.cgbchina.com.cn"> 广发银行</option>
                                        <option value=" 平安银行" bankurl="http://bank.pingan.com/"> 平安银行</option>
                                        <option value=" 交通银行" bankurl="1"> 交通银行</option>
                                    </select>
                                    <input type="text" class="pay-int" style="display:none;" placeholder="其他银行请输入"
                                           maxlength="12">
                                </div>
                            </div>
                            <div class="row">
                                <label>充值金额 ：</label>
                                <div>
                                    <input name="ipt_money" class="pay-int" type="text" maxlength="7">
                                    <div class="f12 c-gray ml-10">
                                        <span class="c-red">*</span>
                                    </div>
                                </div>
                            </div>
                            <div class="clearfix pay-button">
                                <a name="next_btn" class="btn fl" style="line-height: 32px;">
                                    下一步
                                </a>
                            </div>
                        </form>
                        <div class="pay-info-tit">
                            <div class="tip_input_blue bold">
                                推荐使用银行转账：　更快捷 / 3分钟到账　更划算/ 更大额
                            </div>
                            <div class="tips f12">
                                <div class="tip_input_blue bold">
                                    温馨提示：
                                </div>
                                <p>
                                    推荐使用银行卡入款：<i class="pay-dian"></i> 更快捷/<span class="c-red">3分钟到账</span>
                                    <!--                                    <i class="pay-dian"></i> 更划算/<span class="c-red">1%存款优惠</span>-->
                                    <i class="pay-dian"></i> 更大额度
                                </p>
                                <p>
                                    *接下来您可以通过以下方式完成转帐:
                                </p>
                                <p>
                                    1.网银转帐:登录您的网上银行完成转帐。
                                </p>
                                <p>
                                    2.ATM转帐:到您最近的ATM将款项转到左侧收款账号。
                                </p>
                                <p>
                                    3.ATM现存:到银行ATM以现金存入到左侧收款账号。
                                </p>
                                <p>
                                    4.银行柜台:到您最近的银行将款项转到左侧收款账号。
                                </p>
                                <p>
                                    5.手机转帐:通过您的手机验证将款项转到左侧收款账号。
                                </p>
                                <p></p>
                                <p>
                                    *请您注意:
                                </p>
                                <p>
                                    1.完成转帐后请联系在线客服提供用户名帮你确认是否到账。
                                </p>
                                <p>
                                    2.请如实填写大概存入时间。
                                </p>
                                <p>
                                    3.请勿存入整数金额，以免延误财务查收。
                                </p>
                                <p>
                                    4.转帐完成后请保留单据作为核对证明。
                                </p>
                            </div>
                        </div>
                    </div>
                    <!-- 线上支付 -->
                    <div class="pay-info" style="display: none" id="onlineDeposit_div">
                        <form class="pay-form1" action="https://www.cy16cp.com/deposit/payOnline.html" id="online_form"
                              method="POST" target="_blank">
                            <input type="hidden" name="formhash" value="kdZ5pJmJnnThnNnuYFldF8pJiIqoHJV">
                            <input type="hidden" id="payId" name="payId" value="1159">
                            <!--网银支付ID-->
                            <div class="row">
                                <label>存款人姓名 ：</label>
                                <div>
                                    <input type="text" id="online_username" class="pay-int" placeholder="请输入真实姓名"
                                           maxlength="20" required="">
                                </div>
                            </div>
                            <div class="row">
                                <label>开户银行 ：</label>
                                <div class="pay-select">
                                    <select>
                                        <option>请选择银行</option>
                                        <option value="ABC"> 农业银行</option>
                                        <option value="BCOM"> 交通银行</option>
                                        <option value="BOC"> 中国银行</option>
                                        <option value="CCB"> 建设银行</option>
                                        <option value="CEBB"> 光大银行</option>
                                        <option value="CIB"> 兴业银行</option>
                                        <option value="CMB"> 招商银行</option>
                                        <option value="NBB"> 宁波银行</option>
                                        <option value="PSBC"> 中国邮政银行</option>
                                        <option value="SHB"> 上海银行</option>
                                        <option value="SPABANK"> 平安银行</option>
                                        <option value="SPDB"> 浦发银行</option>
                                    </select>
                                    <!-- <input type="text" class="pay-int" placeholder="其他银行请输入"  maxlength="12">-->
                                </div>
                            </div>
                            <div class="row">
                                <label>充值金额 ：</label>
                                <div>
                                    <input id="online_money" class="pay-int" name="amount" type="text" maxlength="7">
                                    <div class="f12 c-gray ml-10">
                                        <span class="c-red">*</span>
                                    </div>
                                </div>
                            </div>

                            <div class="clearfix pay-button">
                                <a class="btn fl" onclick="ddbcharge(4)" style="line-height: 32px;">
                                    立即充值
                                </a>
                            </div>
                        </form>
                        <div class="pay-info-tit">
                            <div class="tip_input_blue bold">
                                温馨提示：
                            </div>
                            <div class="tips f12">

                                <p>
                                    ※ 第三方支付仅供小额度存款。跨行汇款或存款金额低于1000元建议使用在线支付，无需手续费，支付完成，立即到账。
                                </p>
                                <p>
                                    ※ 支付成功后，请等待几秒钟，提示「支付成功」按确认键后再关闭支付窗口，款项会即时入账。
                                </p>
                                <p>
                                    ※ 24小时提款不限次数，免除所有手续费，3分钟火速到账。
                                </p>
                                <p>
                                    ※ 存款遇到问题？立即联络在线客服为您服务。
                                </p>
                                <p></p>
                            </div>
                        </div>
                    </div>
                    <div class="details-right" style="margin-top: 45px;">
                        <div class="head" style="display:none">
                            <i></i>
                            <strong>存款明细</strong>
                            <p>
                                存款注意事项
                            </p>
                        </div>
                        <div class="table_div clearfix" style="display:none">
                            <div>
                                <div class="head">
                                    存取款明细
                                </div>
                                <div>
                                    单笔最低存款
                                </div>
                                <div>
                                    单笔最高存款
                                </div>
                                <div>
                                    单笔存款最优惠
                                </div>
                                <div>
                                    单笔最低取款
                                </div>
                                <div>
                                    单日最高取款
                                </div>
                            </div>
                            <div>
                                <div class="head">
                                    银行卡入款
                                </div>
                                <div>
                                    10 CNY
                                </div>
                                <div>
                                    不限
                                </div>
                                <div>
                                    1%
                                </div>
                                <div>
                                    50CNY
                                </div>
                                <div>
                                    200万
                                </div>
                            </div>
                            <div>
                                <div class="head">
                                    在线支付
                                </div>
                                <div>
                                    10 CNY
                                </div>
                                <div>
                                    100万
                                </div>
                                <div>
                                    -
                                </div>
                                <div>
                                    50CNY
                                </div>
                                <div>
                                    100万
                                </div>
                            </div>
                        </div>

                        <div>
                            <a class="pay-online-btn" target="_blank"
                               href="https://szzero.livechatvalue.com/chat/chatClient/chatbox.jsp?companyID=818988&configID=55671&jid=7881337217&s=1">
                                <i></i>联系在线客服
                            </a>
                        </div>
                    </div>
                </div>
                <!-- 存款明细 -->

                <div style="clear:both;width:0;"></div>
            </div>
        </div>
        <!--银行入款第二步-->
        <div id="div_2" style="display:none;position:relative;height:100%;" class="clearfix right-div">

            <!-- 公司入款流程解说 -->
            <div id="div_iframe" style="width:100%;height:100%;position:absolute;z-index:3;display:none;">
                <iframe style="width:100%;height:100%;" src="/" class="right-div" marginwidth="0px" frameborder="0"
                        samless=""></iframe>
            </div>

            <div class="bank-wrap">
                <div class="bank-top">
                    <h3 class="c-blue f20">使用提示</h3>
                    <p class="c-red">
                        公司银行帐号随时更换! 请每次存款都至 [公司入款] 进行操作。 入款至已过期帐号，公司无法查收，恕不负责!
                    </p>
                    <p>
                        欢迎使用公司入款平台!请依照以下步骤进行存款。
                        <!--<a class="c-red bold" target="_blank">
                            公司入款流程解说。
                        </a>-->
                    </p>
                </div>
                <div class="bank-center">
                    <div id="div_2_2">
                        <div class="bank-tit">
                            <ul>
                                <li>
                                    步骤1：请选择您所使用的银行
                                </li>
                                <li class="active">
                                    步骤2：请选择您欲转入的银行卡号
                                </li>
                                <li>
                                    步骤3：填写你的转账资料
                                </li>
                                <li>
                                    步骤4：提交完成
                                </li>
                            </ul>
                        </div>
                        <div id="bank_list" class="bank-info">
                            <!--银行列表-->
                        </div>
                        <div class="bank-btn">
                            <a class="btn-blue" name="back_btn">
                                上一步
                            </a>
                            <a class="btn-blue" name="next_btn">
                                下一步
                            </a>
                        </div>
                    </div>
                    <div id="div_2_3" style="display:none;">
                        <div class="bank-tit">
                            <ul>
                                <li>
                                    步骤1：请选择您所使用的银行
                                </li>
                                <li>
                                    步骤2：请选择您欲转入的银行卡号
                                </li>
                                <li class="active">
                                    步骤3：填写你的转账资料
                                </li>
                                <li>
                                    步骤4：提交完成
                                </li>
                            </ul>
                        </div>
                        <div class="bank-order-info">
                            <p style="margin:10px 0">
                                <span class="c-red">*</span>请选择银行已完成！以下是您欲转账的银行账户资料
                            </p>
                            <table class="bank-table" cellpadding="0" cellspacing="1" bgcolor="#dddddd">
                                <tbody>
                                <tr>
                                    <td class="bold">开户行网点</td>
                                    <td name="sReceiverAddr"></td>
                                    <td id="daojishi">有效倒数计时：15:00</td>
                                </tr>
                                <tr>
                                    <td class="bold">收款人姓名</td>
                                    <td name="sReceiverName"></td>
                                    <td>
                                        <div class="copy_outer">
                                            <a id="sReceiverName_copy" class="pay-a">
                                                复制
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold">银行</td>
                                    <td name="bankName"></td>
                                    <td>
                                        <div class="copy_outer">
                                            <a id="bankName_copy" class="pay-a">
                                                复制
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold">银行账号</td>
                                    <td name="sReceiverAccount"></td>
                                    <td>
                                        <div class="copy_outer">
                                            <a id="sReceiverAccount_copy" class="pay-a">
                                                复制
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="bold">订单号</td>
                                    <td name="orderId"></td>
                                    <td>
                                        <div class="copy_outer">
                                            <a id="orderId_copy" class="pay-a">
                                                复制
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                                <!--<tr>
                                    <td class="bold">支付确认码</td>
                                    <td name="confirmCode"></td>
                                    <td>
                                        <div class="copy_outer">
                                            <a id="confirmCode_copy" class="pay-a">
                                                复制
                                            </a>
                                        </div></td>
                                </tr>-->
                                </tbody>
                            </table>
                            <p>
                                <span class="c-red bold">请在转账备注中填写订单号，方便快速到账。</span>
                            </p>
                            <p>
                                <span class="c-red">*</span>接下来您可以透过以下方式完成转帐...
                            </p>
                            <p>
                                1.网路银行转帐：登录您的网路银行完成转帐。
                            </p>
                            <div id="bank_name_url" class="_bank_button">
                                <button></button>
                            </div>
                            <p>
                                请点击上面按钮前往网银登录页面
                            </p>
                            <p>
                                2. ATM转帐: 到您最近的ATM将款项转到上述银行账号。
                            </p>
                            <p>
                                3. ATM现存: 到上述银行ATM以现金存入银行账号
                            </p>
                            <p>
                                4. 银行柜台: 到您最近的银行将款项转到上述银行账号。
                            </p>
                            <div class="mt-20">
                                <p>
                                    ※1. 请勿存入整数金额，以免延误财务查收。
                                </p>
                                <p>
                                    ※2. 转帐完成后请保留单据作为核对证明。
                                </p>
                            </div>
                            <div class="bank-order">
                                <ul>
                                    <li>
                                        <div class="bank-order-l">
                                            订单号：
                                        </div>
                                        <div class="bank-order-r">
                                            <input class="int int-bg" type="text" name="orderId" readonly="">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bank-order-l">
                                            存入金额：
                                        </div>
                                        <div class="bank-order-r">
                                            <input class="int" type="text" name="amount" maxlength="12">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bank-order-l">
                                            存入时间：
                                        </div>
                                        <div class="bank-order-r" style="position: relative;">
                                            <input class="int bt_time" type="text" readonly=""
                                                   value="<?= date('Y-m-d') ?>">
                                            <div id="bank-order-time" class="bank-order-time">
                                                <select name="hour">
                                                    <!--                                                     <option>00</option><option>01</option><option>02</option><option>03</option><option>04</option><option>05</option><option>06</option><option>07</option><option>08</option><option>09</option><option>10</option>
                                                    <option>11</option><option>12</option><option>13</option><option>14</option><option>15</option><option>16</option>
                                                    <option>17</option><option>18</option><option>19</option><option>20</option><option>21</option><option>22</option><option>23</option> -->
                                                </select>
                                                <select name="minutes"></select>
                                                <span>（当地时间）</span>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bank-order-l">
                                            存入人姓名：
                                        </div>
                                        <div class="bank-order-r">
                                            <input class="int" name="userName" type="text">
                                        </div>
                                    </li>
                                    <li>
                                        <div class="bank-order-l">
                                            存款方式：
                                        </div>
                                        <div class="bank-order-r">
                                            <div class="bank-order-int">
                                                <label>
                                                    <input class="order-radio" type="radio" name="order-pay" value="1">
                                                    网银转账</label>
                                                <label>
                                                    <input class="order-radio" type="radio" name="order-pay" value="2">
                                                    ATM自动柜员机</label>
                                                <label>
                                                    <input class="order-radio" type="radio" name="order-pay" value="3">
                                                    ATM现金入款</label>
                                                <label>
                                                    <input class="order-radio" type="radio" name="order-pay" value="4">
                                                    银行柜台</label>
                                                <label>
                                                    <input class="order-radio" type="radio" name="order-pay" value="5">
                                                    手机银行</label>
                                                <label>
                                                    <input class="order-radio" type="radio" name="order-pay" value="10">
                                                    其他</label>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                            <div class="mt-20">
                                <p>
                                    ※1.请确实填写转帐金额与时间。
                                </p>
                                <p>
                                    ※2.每笔转帐请提交一次。
                                </p>
                                <p>
                                    ※3.若您使用ATM存款，请填写ATM所属分行，会加快您的款项到帐时间。
                                </p>
                            </div>

                        </div>
                        <div class="bank-btn">
                            <a class="btn-blue" name="back_btn">
                                上一步
                            </a>
                            <a class="btn-orange" name="submit">
                                提交申请
                            </a>
                        </div>
                    </div>
                    <div id="div_2_4" style="display:none;">
                        <div class="bank-tit">
                            <ul>
                                <li>
                                    步骤1：请选择您所使用的银行
                                </li>
                                <li>
                                    步骤2：请选择您欲转入的银行卡号
                                </li>
                                <li>
                                    步骤3：填写你的转账资料
                                </li>
                                <li class="active">
                                    步骤4：提交完成
                                </li>
                            </ul>
                        </div>
                        <div class="bank-order-info">
                            <p style="margin:10px 0">
                                您的存款申请已成功提交!以下是您的存款资料，请妥善保存。
                            </p>
                            <table style="margin:40px 0" cellpadding="0" cellspacing="1">
                                <tbody>
                                <tr>
                                    <td class="bold">存入银行：</td>
                                    <td name="cunru"></td>
                                </tr>
                                <tr>
                                    <td class="bold">存入金额：</td>
                                    <td name="amount"></td>
                                </tr>
                                <tr>
                                    <td class="bold">存入时间：</td>
                                    <td name="cunruShijian"></td>
                                </tr>
                                <tr>
                                    <td class="bold">您使用的银行：</td>
                                    <td name="bankName"></td>
                                </tr>
                                <tr>
                                    <td class="bold">存款人姓名：</td>
                                    <td name="userName"></td>
                                </tr>
                                <tr>
                                    <td class="bold">存款方式：</td>
                                    <td name="payTypeName"></td>
                                </tr>
                                <tr>
                                    <td class="bold">订单号：</td>
                                    <td name="orderId"></td>
                                </tr>

                                </tbody>
                            </table>
                            <p>
                                ※1.同行转帐:完成转帐后请于30分钟内查收您的会员账号余额，如未加上请联系在线客服。
                            </p>
                            <p>
                                ※2.跨行转帐:银行不承诺跨行汇款到帐时间， 如您的款项在24小时内未加上， 烦请您联系在线客服为您提供帮助。
                            </p>
                        </div>
                        <div class="bank-btn">
                            <a class="btn-blue" onclick="__openWin(&#39;user_center&#39;,&#39;/&#39;)">
                                离开本页
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="_clr_"></div>
    </div>
    <input id="current_time" type="hidden" value="<?= date('d/m/Y') ?>" timestamp="<?= date('d/m/Y') ?>">
    <link rel="stylesheet" href="/team_css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/team_css/bootstrap-datetimepicker.min.css">

    <script src="/files/general.js" type="text/javascript"></script>
    <script type="text/javascript">function incharge(banktype) {
        var money;
        if (banktype == 1) {

          money = $("#zfbmoney").val();
          if (money == '' || money == 0) {
            alert('请输入充值金额');
            return;
          }
        } else if (banktype == 2) {
          money = $("#money").val();
          if (money == '' || money == 0) {
            alert('请输入充值金额');
            return;
          }
        } else if (banktype == 3) {
          money = $("#qqmoney").val();
          if (money == '' || money == 0) {
            alert('请输入充值金额');
            return;
          }
        }

        var form = $("<form></form>");
        form.attr('action', '/index.php/cash/inRecharge');
        form.attr('method', 'post');
        form.attr('target', '_self');
        var input1 = $("<input type='hidden' name='mBankId' />");
        input1.attr('value', banktype);
        var input2 = $("<input type='hidden' name='amount' />");
        input2.attr('value', money);

        form.append(input1);
        form.append(input2);
        form.appendTo("body");
        form.css('display', 'none');
        form.submit();

      }

      function ddbcharge(banktype) {
        var money;
        if (banktype == 1) {

          money = $("#zfbmoney1").val();
          if (money == '' || money == 0) {
            alert('请输入充值金额');
            return;
          }
        } else if (banktype == 2) {
          money = $("#money1").val();
          if (money == '' || money == 0) {
            alert('请输入充值金额');
            return;
          }
        } else if (banktype == 3) {
          money = $("#qqmoney1").val();
          if (money == '' || money == 0) {
            alert('请输入充值金额');
            return;
          }
        } else {
          money = $("#online_money").val();
          if (money == '' || money == 0) {
            alert('请输入充值金额');
            return;
          }
        }
        var form = $("<form></form>");
        form.attr('action', 'https://cp.juweikeapp.cc/index.php/cash/ddbRecharge');
        form.attr('method', 'post');
        form.attr('target', 'frame1');
        var input1 = $("<input type='hidden' name='mBankId' />");
        input1.attr('value', banktype);
        var input2 = $("<input type='hidden' name='amount' />");
        input2.attr('value', money);
        var input3 = $("<input type='hidden' name='uid' />");
        input3.attr('value',<?php echo $this->user['uid']; ?>);
        form.append(input1);
        form.append(input2);
        form.append(input3);
        form.appendTo("body");
        form.css('display', 'none');
        form.submit();
      }

      function xmcharge(banktype) {
        var money;
        var frame;
        var pay_account_name;

        if (banktype == 22) {
          money = $("#zfbmoney2").val();
          frame = "qrcode_zfb";
          pay_account_name = $("#pay_account_name").val();
          if (!pay_account_name) {
            alert('请输入付款账号名称');
            return;
          }
          if (money == '' || money <= 0) {
            alert('请输入充值金额');
            return;
          }
        } else if (banktype == 21) {
          money = $("#money2").val();
          frame = "qrcode_wx";
          pay_account_name = $("#pay_account_name2").val();
          if (!pay_account_name) {
            alert('请输入付款账号名称');
            return;
          }
          if (money == '' || money <= 0) {
            alert('请输入充值金额');
            return;
          }
        } else if (banktype == 3) {
          frame = "qrcode_qq";
          money = $("#qqmoney2").val();
          if (money == '' || money <= 0) {
            alert('请输入充值金额');
            return;
          }
        } else {
          frame = "_self";
          money = $("#online_money").val();
          if (money == '' || money <= 0) {
            alert('请输入充值金额');
            return;
          }
        }

        var form = $("<form></form>");
        form.attr('action', '/index.php/cash/xmRecharge');
        form.attr('method', 'post');
        form.attr('target', "_self");
        var input1 = $("<input type='hidden' name='mBankId' />");
        input1.attr('value', banktype);
        var input2 = $("<input type='hidden' name='amount' />");
        input2.attr('value', money);
        var input3 = $("<input type='hidden' name='uid' />");
        input3.attr('value',<?php echo $this->user['uid']; ?>);
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
<?php $this->display('C38_footer.php'); ?>