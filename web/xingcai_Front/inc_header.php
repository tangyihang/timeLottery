<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script src="/team_js/jquery-1.12.3.min.js"></script>
    <script src="/team_js/layer.src.js"></script>
    <script src="/team_js/layer.js"></script>

    <!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
    <script src="/team_js/jquery-1.12.3.min.js"></script>
    <script src="/team_js/moment.min.js"></script>
    <script src="/team_js/zh-cn.js"></script>

    <!-- 可选的Bootstrap -->
    <script src="/team_js/bootstrap.min.js"></script>
    <!-- 新 Bootstrap 核心 CSS 文件 -->
    <link rel="stylesheet" href="/team_css/bootstrap.min.css">

    <!-- 最新的 Bootstrap table 核心 JavaScript 文件 -->
    <script src="/team_js/bootstrap-table.min.js"></script>
    <!-- 新 Bootstrap table 核心 CSS 文件 -->
    <link rel="stylesheet" href="/team_css/bootstrap-table.min.css">

    <!-- 最新的 Bootstrap table 核心 JavaScript 文件 -->
    <script src="/team_js/bootstrap-table-zh-CN.min.js"></script>


    <!-- x-editable (bootstrap 3) -->
    <link href="/team_css/bootstrap-editable.css" rel="stylesheet">
    <script src="/team_js/bootstrap-editable.min.js"></script>

    <!-- 最新的 Bootstrap table 核心 JavaScript 文件 -->
    <script src="/team_js/bootstrap-datetimepicker.min.js"></script>
    <script src="/team_js/bootstrap-datetimepicker.zh-CN.js"></script>

    <!-- switch (bootstrap 3) -->
    <link href="/team_css/bootstrap-switch.min.css" rel="stylesheet">
    <script src="/team_js/bootstrap-switch.min.js"></script>

    <!-- 最新的 Bootstrap table 核心 JavaScript 文件 -->
    <script src="/team_js/bootstrap-datepicker.min.js"></script>
    <link rel="stylesheet" href="/team_css/bootstrap-datepicker.min.css">
    <link rel="stylesheet" href="/team_css/bootstrap-datetimepicker.min.css">

    <script type="text/javascript" src="/team_js/template.js"></script>

    
    <script src="/team_js/contants.js"></script>

    <link rel="stylesheet" href="/team_css/layer.css" id="layui_layer_skinlayercss">
    <script src="/team_js/dailistyle.js"></script>
    <!-- 复制工具 -->
    <script src="/team_js/jquery.zclip.min.js"></script>
    <title>代理平台</title>
</head>
<body>


<script src="/team_js/core.js" path=""></script>

<div id="dailiheadmenu"></div>
<div class="modal fade" id="logout" tabindex="-1" role="dialog" aria-labelledby="logoutLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="logoutLabel">提示</h4>
            </div>
            <div class="modal-body">确定退出登录吗？</div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" onclick="doLogout();">确定</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="head_editpwd" tabindex="-1" role="dialog" aria-labelledby="head_editpwdLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="head_editpwdLabel">修改密码</h4>
            </div>
            <div class="modal-body">
                <table class="table table-bordered table-striped" style="clear: both">
                    <tbody>
                        <tr>
                            <td width="20%" class="text-right">用户名：</td>
                            <td width="80%" class="text-left"><input type="text" class="form-control" value="<?=$this->user['username']?>" id="head_pwdat" disabled="disabled"></td>
                        </tr>
                        <tr>
                            <td width="20%" class="text-right">密码类型：</td>
                            <td width="80%" class="text-left">
                            <select class="form-control" id="ohead_pwd_type">
                                <option value="1">登录密码</option>
                                <option value="2">提款密码</option>
                            </select>
                        </td>
                        </tr>
                        <tr>
                            <td width="20%" class="text-right">旧密码：</td>
                            <td width="80%" class="text-left"><input type="password" class="form-control" id="ohead_pwd"></td>
                        </tr>
                        <tr>
                            <td width="20%" class="text-right">新密码：</td>
                            <td width="80%" class="text-left"><input type="password" class="form-control" id="head_pwd"></td>
                        </tr>
                        <tr>
                            <td width="20%" class="text-right">确认密码：</td>
                            <td width="80%" class="text-left"><input type="password" class="form-control" id="rhead_pwd"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">关闭</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" onclick="doUpdpwd();">保存</button>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" style="z-index:9999" id="sysmsg" tabindex="-1" role="dialog" aria-labelledby="sysmsgLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h4 class="modal-title" id="sysmsgLabel"></h4>
            </div>
            <div class="modal-body" id="sysmsgContent"></div>
            <div class="modal-footer" id="sysmsgfooter"></div>
        </div>
    </div>
</div>
<nav class="navbar navbar-default navbar-fixed-top"  style="display:none">
    <div class="container">
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
                <li><a href="/index.php/team/getAllMember">下级列表</a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false">
                        <span class="glyphicon glyphicon-fire" aria-hidden="true"></span> 游戏记录 
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li class=""><a href="/index.php/record/lotteryRecord">彩票投注记录</a></li>
                        <li><a href="/index.php/record/lhclotteryRecord">六合投注记录</a></li>
                    </ul>
                </li>
                <li class=""><a href="/index.php/team/teamMoneyChange">团队账变</a></li>
                <li><a href="/index.php/team/teamStatistics">团队统计</a></li>
                <li><a href="/index.php/team/tgLink">推广链接</a></li>
                <li><a href="/index.php/team/performance">业绩提成</a></li>
                <li><a href="/index.php/team/teamPay">存款日志</a></li>
                <li><a href="/index.php/team/teamWithDrawing">取款日志</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li id="message_li"><a href="#">站内信 <span class="badge" id="message_span">0</span></a></li>
                <li id="online_li"><a href="/index.php/team/getAllMember?online=2">在线 <span class="badge" id="online_span">0</span></a></li>
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" aria-haspopup="true" aria-expanded="false"><?=$this->user['username']?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/index.php/userinfo/baseinfo">账号信息</a></li>
                        <li><a href="/index.php/userinfo/drawPwd">在线取款</a></li>
                        <li><a href="" data-toggle="modal" data-target="#head_editpwd">修改密码</a></li>
                        <li><a href="/index.php/user/logout" >退出</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>
<div style="height: 52px;">&nbsp;</div>
<script type="text/javascript">
    $(function() {
        $("#navbar > ul li").hover(function() {
            $(this).addClass('open');
        }, function() {
            $(this).removeClass('open');
        });
    });
    function doLogout() {
        window.location.href = "/daili/logout.do";
    }

    function doUpdpwd() {
        var opassword = $("#ohead_pwd").val();
        var password = $("#head_pwd").val();
        var rpassword = $("#rhead_pwd").val();

        if (!opassword) {
            Msg.info("旧密码不能为空！");
            return;
        }

        if (!password) {
            Msg.info("新密码不能为空！");
            return;
        }
        if (!rpassword) {
            Msg.info("确认密码不能为空！");
            return;
        }

        if (password !== rpassword) {
            Msg.info("两次密码不一致！");
            return;
        }
        $.ajax({
            url : "/index.php/userinfo/modifyPwd",
            data : {
                pwd : password,
                rpwd : rpassword,
                opwd : opassword,
                pwdType : $("#ohead_pwd_type").val()
            },
            success : function(result) {
                // if ($("#ohead_pwd_type").val() == 1) {
                //     Msg.confirm('修改成功,请重新登录', {
                //         btn : [ '确定' ]
                //     }, function() {
                //         window.location.href = "/daili/logout.do";
                //     });
                // } else {
                //     Msg.info("修改成功！");
                // }

                if(result.code!=0){
                        Msg.confirm(result.msg, {
                            btn : [ '确认' ]
                        }, function() {
                        });
                }else{
                    Msg.confirm(result.msg, {
                        btn : [ '确认' ]
                    }, function() {
                        if ($("#ohead_pwd_type").val() == 1) {
                            window.location.href = "/index.php/user/logout";
                        }
                    });
                }


            }
        });
    }
</script>