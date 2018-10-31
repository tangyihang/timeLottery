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
    <div class="header">
        <div class="headerTop">
            <div class="ui-toolbar-left">
                <button id="reveal-left">reveal</button>
            </div>
            <h1 class="ui-toolbar-title">绑定银行</h1>
        </div>
    </div>
</div>
<?php
$myBank = $this->getRow("select * from {$this->prename}member_bank where uid=?", $this->user['uid']);
$banks = $this->getRows("select * from {$this->prename}bank_list where isDelete=0 and id!=12 and id!=17 and id!=19 and id!=18 and id!=20 and id!=21 and id!=22 order by sort");

$flag = ($myBank['editEnable'] != 1) && ($myBank);
?>
<div id="wrapper_1" class="scorllmain-content scorll-order top_bar nobottom_bar">
    <div class="sub_ScorllCont">
        <p style="text-align: left;padding-top:5px;"><span style="font-size: 14px;">请确实填写您的出款银行资料，以免有心人士窃取</span></p>
        <div class="cash-list" style="margin-top: 0px;">
            <h3 class="choose-tit">卡号信息</h3>
            <ul>
                <li id="li_bank_name"><span>开户银行：</span>
                    <select class="choose-sel" style="width: 120px;" id="bank">
                        <option value="">选择银行</option>
                        <?php foreach ($banks as $bank) { ?>
                            <option value="<?= $bank['id'] ?>" <?= $this->iff($myBank['bankId'] == $bank['id'], 'selected') ?>><?= $bank['name'] ?></option>
                        <?php } ?>
                    </select>
                    <span class="grey" style="margin-left: 70px;">
                        <input class="cash-int cash-nobor" style="display: none;" id="bank_other" value="" maxlength="30" placeholder="请输入其他银行"/>
                    </span>
                </li>
                <li>
                    <span>银行账号：</span>
                    <input class="cash-int cash-nobor" maxlength="20" id="bankNum" value="<?= preg_replace('/^(\w{4}).*(\w{4})$/', '\1***********\2', htmlspecialchars($myBank['account'])) ?>"
                                             placeholder="请输入银行帐号"/></li>
                <li>
                    <span>开户人姓名：</span>
                    <input class="cash-int cash-nobor" id="name" value="<?= $this->iff($myBank['username'], mb_substr(htmlspecialchars($myBank['username']), 0, 1, 'utf-8') . '**') ?>"
                                              type="text" maxlength="15" placeholder="请输入开户人姓名"></li>
                <li>
                    <span>开户银行支行名称：</span>
                    <input class="cash-int cash-nobor" id="province" value="<?= preg_replace('/^(\w{4}).*(\w{4})$/', '\1***\2', htmlspecialchars($myBank['countname'])) ?>"
                                                style="width: 50%;" type="text" maxlength="20" placeholder="请输入开户银行支行名称"></li>
                <li><span>设置提款密码：</span>
                    <select name="" id="pwd1">
                        <option value="">-</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <select name="" id="pwd2">
                        <option value="">-</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <select name="" id="pwd3">
                        <option value="">-</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <select name="" id="pwd4">
                        <option value="">-</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <select name="" id="pwd5">
                        <option value="">-</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>
                    <select name="" id="pwd6">
                        <option value="">-</option>
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                    </select>

                </li>
            </ul>
        </div>


        <button class="charge-btn" id="charge-btn">确认信息</button>
    </div>
</div>

<input id="set_quesion" value="0" type="hidden">
<input id="where_from" value="0" type="hidden">

<script src="/assets/js/require.js" data-main="/assets/js/application/bindBank"></script>
<script src="/assets/js/require.config.js?v=1.9"></script>
</body>

</html>