<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <title>代理平台</title>
</head>
<body>

<!-- jQuery文件。务必在bootstrap.min.js 之前引入 -->
<script src="/js/jquery-1.12.3.min.js"></script>
<script src="/js/moment.min.js"></script>
<script src="/js/zh-cn.js"></script>

<!-- 可选的Bootstrap -->
<script src="/js/bootstrap.min.js"></script>
<!-- 新 Bootstrap 核心 CSS 文件 -->
<link rel="stylesheet" href="/css/bootstrap.min.css">

<!-- 最新的 Bootstrap table 核心 JavaScript 文件 -->
<script src="/js/bootstrap-table.min.js"></script>
<!-- 新 Bootstrap table 核心 CSS 文件 -->
<link rel="stylesheet" href="/css/bootstrap-table.min.css">

<!-- 最新的 Bootstrap table 核心 JavaScript 文件 -->
<script src="/js/bootstrap-table-zh-CN.min.js"></script>


<!-- x-editable (bootstrap 3) -->
<link href="/css/bootstrap-editable.css" rel="stylesheet">
<script src="/js/bootstrap-editable.min.js"></script>

<!-- 最新的 Bootstrap table 核心 JavaScript 文件 -->
<script src="/js/bootstrap-datetimepicker.min.js"></script>
<script src="/js/bootstrap-datetimepicker.zh-CN.js"></script>

<!-- switch (bootstrap 3) -->
<link href="/css/bootstrap-switch.min.css" rel="stylesheet">
<script src="/js/bootstrap-switch.min.js"></script>


<!-- 最新的 Bootstrap table 核心 JavaScript 文件 -->
<script src="/js/bootstrap-datepicker.min.js"></script>
<link rel="stylesheet" href="/css/bootstrap-datepicker.min.css">
<link rel="stylesheet" href="/css/bootstrap-datetimepicker.min.css">

<script type="text/javascript" src="/js/template.js"></script>

<script src="/js/core.js" path=""></script>

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
<script src="/js/contants.js"></script>
    
    
<div class="modal show" tabindex="-1" role="dialog" aria-labelledby="gridSystemModalLabel" style="top:80px;">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title text-center text-primary" id="gridSystemModalLabel">代理登录</h1>
      </div>
      <div class="modal-body">
              <div class="form-group">
                <input type="text" id="username" class="form-control input-lg" placeholder="登陆账号" required="" autofocus="">
              </div>
              <div class="form-group">
                <input type="password" id="password" class="form-control input-lg" placeholder="登录密码" required="">
              </div>
              <div class="form-inline">
                <input type="text" id="verifyCode" class="form-control input-lg" placeholder="验证码" required="">
                <img id="verifycodeImg" style="cursor: pointer;width: 21%;margin-top: -3px;height: 30%;" alt="验证码" src="/index.php/user/vcode/<?=$this->time?>" onclick="refreshVerifyCode(this)">
              </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary btn-lg btn-block" onclick="doLogin();">立刻登录</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
    
    
    <script language="javascript">
        $(function() {
            $("#verifyCode").keyup(function(event){
              if(event.keyCode ==13){
                  doLogin();
              }
            });
            $("#password").keyup(function(event){
              if(event.keyCode ==13){
                  if(!$("#verifyCode").val()){
                      $("#verifyCode").focus();
                      return;
                  }
                  doLogin();
              }
            });
        });
        function refreshVerifyCode() {
            var $img = $("#verifycodeImg");
            var time = (new Date()).getTime();
            $img.attr("src","/index.php/user/vcode/" + time);
        }
        function doLogin() {

            var account = $("#username").val().trim();
            var pwd = $("#password").val();
            if (account == '') {
                Msg.info("请输入账号");
                $("#username").focus();
                return;
            }
            if (pwd == '') {
                Msg.info("请输入密码");
                $("#password").focus();
                return;
            }
            $ajax({
                url : "/index.php/user/logined",
                data : {
                    username : account,
                    password : pwd,
                    vcode : $("#verifyCode").val()
                },
                type:"POST",
                success : function(data, textStatus, xhr) {
                    var ceipstate = xhr.getResponseHeader("ceipstate")
                    if (!ceipstate || ceipstate == 1) {// 正常响应
                        window.location.href = "/";
                    } else if (ceipstate == 2) {// 后台异常
                        Msg.error("后台异常，请联系管理员!");
                        refreshVerifyCode();
                    } else if (ceipstate == 3) { // 业务异常
                        refreshVerifyCode();
                        Msg.info(data.msg);
                    }
                }
            });
        }
        
        function showCardWin(points){
            $("#cardModel").modal('show');
            $form = $("#cardForm");
            $form[0].reset();
            $form.find(".ccode").each(function(index,element){
                this.innerHTML = points[index];
            });
        }
    </script>

</body></html>