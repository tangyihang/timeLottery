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
    <div class="headerTop">
        <div class="ui-toolbar-left">
            <button id="reveal-left2">reveal</button>
        </div>
        <h1 class="ui-toolbar-title">登录</h1>
    </div>
</div>

<div class="login">
    <ul>
        <li>
            <span class="login-peo"></span><input type="text" id="login_uid" placeholder="请输入用户账号" value="">
        </li>
        <li>
            <span class="login-pass"></span><input type="password" id="login_pwd" placeholder="请输入密码">
        </li>
    </ul>
    <input type="hidden" name="ref_url" value=""/>
    <div class="login-p">
        <a class="fl" href="#" onclick="cOnclick();"><i class="icon-4"></i>在线客服</a>
        <a class="fr" href="/user/forget" id="forgetPwd">忘记密码</a>
    </div>
    <button class="login-btn" id="login_btn">登录</button>
    <button class="reg-btn" id="register">立即注册</button>
</div>
<script src="/assets/js/require.js" data-main="/assets/js/application/login"></script>
<script src="/assets/js/require.config.js"></script>
</body>

</html>
<script type="text/javascript">
  function registertest() {
    $.ajax({
      type: "POST",
      url: "/index.php/user/registertest",
      timeout: 10000,
      dataType: "json",
      success: function (data) {
        if (data.code == 0) {
          alert(data.msg);
        } else {
          alert(data.msg);
        }


      },
      error: function (error) {
        alert('服务器异常');
      },
      complete: function (XHR, textStatus) {
        XHR = null;
      }
    });
  }
  function cOnclick() {
    alert('在线客服QQ:1163408818');
  }
</script>