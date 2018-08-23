///** moda **/
/*
 * 保存用户登录的信息， 如 用户id，余额
 * 自定义 alert 方法
 * 请求超时处理
 * 登录form小弹窗
 * 定义个方法 提供 几种页面打开的方式
 * */

//下面解决 线路检测导致的 跨域问题的 bug
try{
	if( opener != null ){
		try{
			opener.name
		}catch(e){
			opener=null;
		}
		}
	}catch(e){}
	
//解决低版本ie自身bug
try{
    if( typeof(console) == "undefined" )
    {
        var console=console||{log:function(e){return e;}}
    }
}catch(e){}

try{
    window._last_click = {
        lottery:{url:"",ltime:0},
        userCt:{url:"",ltime:0},
        home:{url:"",ltime:0},
        nameArr:["wn_1_home_first","wn_1_home_2","wn_1_lotteryHall","wn_1_userCenter","wn_1_lotteryHall_2"]
    };
    _last_click.url_type = {
        //主页
        home:{
            winName:_last_click.nameArr[0],
            openType:"home"
        },
        //主页2 优惠活动 开奖公告 走势图
        home2:{
            winName:_last_click.nameArr[0],
            openType:"home"
        },
        //购彩大厅
        lottery_hall:{
            winName:_last_click.nameArr[2],
            openType:"lottery"
        },
        //走势图
        lottery_trend:{
            winName:_last_click.nameArr[4],
            openType:"lottery"
        },
        //手机购彩
        home_phone:{
            winName:_last_click.nameArr[0],
            openType:"home"
        },
        //主页-帮助中心
        home_help:{
            winName:_last_click.nameArr[1],
            openType:"op2"
        },
        //用户中心
        user_center:{
            winName:_last_click.nameArr[3],
            openType:"userCt"
        },
        //登录
        login:{
            winName:_last_click.nameArr[0],
            openType:"home"
        },
        //注册
        reg:{
            winName:_last_click.nameArr[0],
            openType:"home"
        },
        //退出
        lgOut:{
            winName:_last_click.nameArr[0],
            openType:"openType_lgOut"
        },
        //在线客服
        other:{
            winName:"wn_1_other",
            openType:"home"
        },
        //其他银行的官网地址
        other2:{
            winName:"wn_1_other2",
            openType:"home"
        },
        //系统tips
        sys_tip:{
            winName:_last_click.nameArr[0],
            openType:"home"
        },
        //系统404
        sys_404:{
            winName:_last_click.nameArr[0],
            openType:"home"
        },
        //系统维护
        sys_maintain:{
            winName:_last_click.nameArr[0],
            openType:"home"
        }
    } ;
}catch(e){console.log(e);}
try{
    /*
     * 下面方法，定义打开页面的姿势
     * 参数必传
     *
     resizable: 'yes', 是否允许放缩
     location: 'no',是否显示地址栏
     * */
    window.__openWin = function( openType ,url){
        var nameArr = _last_click.nameArr;
        var url_type = _last_click.url_type;
        var winSet = "scrollbars=yes,menubar=no,resizable=yes,status=no,location=no,toolbar=no";
        function open_util( w )
        {
            try {
                if( typeof(w) == "undefined" )
                {
                    return;
                }
                if( !w.name )
                {
                    return;
                }
                if( typeof( _new_win_childs ) == "undefined" || typeof(_new_win_childs) == "null" )
                {
                    window._new_win_childs = {};
                }
                _new_win_childs[w.name] = w ;
                w.focus();
            }
            catch(e){ console.log(e);}
        }
        function getWin()
        {
            var w = window;
            if( window != window.parent  )
            {
                if( window.parent != window.parent.parent )
                {
                    w = window.parent.parent;
                }
                else
                {
                    w = window.parent;
                }
            }
            if( w != w.parent  )
            {
                w = w.parent;
            }
            if( w.opener && w.opener.name )
            {
               // w = w.opener;
                if( (w.opener && w.opener.name) )
                {
                  //  w = w.opener;
                }
            }
            return w;
        }
        var open_type = {
            //主页
            home:function(url,winName){
                var _nofresh_ = ""; //"#_nofresh_";
                if( window.name == winName && parent == window )
                {
                    location.href = url+_nofresh_;
                }
                else
                {
                    var w =getWin().open(url+_nofresh_, winName);
                    open_util(w);
                }
            },
            //手机购
            op2:function(url,winName){
                var _nofresh_ = url.indexOf("#")>0?"":"#_nofresh_";//"#_nofresh_";
                if( window.name == winName && parent == window )
                {
                    location.href = url+_nofresh_;
                }
                else
                {
                    var w =getWin().open(url+_nofresh_, winName);
                    open_util(w);
                }
            },
            //退出专用
            openType_lgOut:function(url,winName){
                function gogogo()
                {
                    window.open(url, winName);//////////////////// location.href
                    if( window.name != url_type.home.winName )
                    {//如果不是主页的其他页面则退出当前页面（一般是窗口）
                        window.close();
                    }
                }
                if( typeof( _new_win_childs ) == "undefined" || typeof(_new_win_childs) == "null" )
                {
                    gogogo();
                }
                else
                {
                    for( var name in _new_win_childs )
                    {
                        var new_win = _new_win_childs[name];
                        //如果子窗口 还存在（即,没被用户关闭掉的那些窗口）,则执行下面的代码
                        if( typeof(new_win)!="undefined" && new_win.location && (new_win.name || new_win.location.href) )
                        {
                            if( new_win.location.href.indexOf("index/mobile.html")>0 || new_win.location.href.indexOf("/promotion/index.html")>0 )
                            {
                                new_win.alert("您已经退出登录");
                                new_win.location.reload();
                            }
                            else
                            {
                                new_win.alert("您已经退出登录");
                                new_win.close();
                            }
                        }
                    }
                    gogogo();
                }
            },
            //购彩大厅专用
            lottery:function(url,winName){
                var param = "_isOpenWin=lottery";
                var winSizeStr = winSet+",width=1215,height=660,left=20,top=15";
                if( url.split("?").length == 1 )
                {
                    url += "?"+param;
                }
                else if( url.split("?").length > 1 )
                {
                    if( url.split("?")[1]=="" )
                    {
                        url += param;
                    }
                    else
                    {
                        url += "&"+param;
                    }
                }
                var _w = getWin();
                var flag_0 = true;
                var w = _w.open("/index/common.html#"+encodeURIComponent("_url_="+url), winName,winSizeStr);
                open_util(w);
                //下面解决浏览器兼容问题，主要解决360打开页面不置顶的问题
                if( flag_0 )
                {
                    var nowTime= new Date().getTime();
                    var flag = true;
                    if( _last_click.lottery.url == url && ( nowTime - _last_click.lottery.ltime ) <= 3000 && ( nowTime - _last_click.lottery.ltime ) >= 250 )
                    {
                        if( typeof(w)!="undefined" )
                        {
                            flag = false;
                            //w.alert("建议使用Google浏览器以便获得更优质的体验");
                        }
                    }
                    try {
                        _last_click.lottery.url = url;
                        _last_click.lottery.ltime = nowTime;
                    }catch (e){console.log(e);}
                    if(flag)
                    {
                        setTimeout(function(){
                            try{
                                if( typeof(w)!="undefined" && (w.screenTop||w.screenY) < - 800  )
                                {
                                    w.alert("建议使用Google浏览器以便获得更优质的体验");
                                }
                            }catch(e){console.log(e);}
                        },500);
                    }
                }
            },
            //用户中心专用
            userCt:function(url,winName){
                var param = "_isOpenWin=user";
                var _nofresh_ = ""; //url.indexOf("#")>0?"":"#_nofresh_";
                var _w = getWin();
                var left =  (_w.document.body.clientWidth?_w.document.body.clientWidth:_w.document.documentElement.clientWidth) - 1100;
                if( left < 0 )
                {
                    left = 0;
                }  ////////////////////////document.body.clientWidth
                if( url.split("?").length == 1 )
                {
                    url += "?"+param;
                }
                else if( url.split("?").length > 1 )
                {
                    if( url.split("?")[1]=="" )
                    {
                        url += param;
                    }
                    else
                    {
                        url += "&"+param;
                    }
                }
                //用户中心专用 由于页面css需要，窗口尽量不要小于1060，否则会出现水平的横向滚动条
                var winSizeStr = winSet+",width=1100,height=660,left="+left+",top=0";
                if( window.name == winName )
                {
                    location.href = url+_nofresh_;
                }
                else
                {
                    var w = _w.open(url+_nofresh_, winName,winSizeStr);
                    //下面定时器 解决 360 缩小后的窗口不重新弹出的问题
                    var nowTime= new Date().getTime();
                    var flag = true;
                    try {
                        _last_click.userCt.url = url;
                        _last_click.userCt.ltime = nowTime;
                        open_util(w);
                    }catch (e){console.log(e);}
                    if(flag)
                    {
                        setTimeout(function(){
                            try{
                                if(typeof(w)!="undefined" && (w.screenTop||w.screenY) < - 800  )
                                {
                                    w.alert("建议使用Google浏览器以便获得更优质的体验");
                                }
                            }catch(e){console.log(e);}
                        },400);
                    }
                }
            }
        };
        try{
            var type_ = url_type[openType];
            open_type[type_["openType"]](url,type_["winName"]);
            if(event)
            {
                try{if(event.preventDefault){event.preventDefault();}else{event.returnValue = false;}}catch(e){}
            }
        }catch(e){
            console.log( e );
        }
    };
}catch(e){console.log(e);}

window.__location=function(url){
    location.href=document.getElementById("base_path").href+url;
};

/*
 * 判断会话过期
 */
function session_timeout(data){
    try{
        if(!isJson(data)){
            return true;
        }
       
        return true;
    }
    catch(e)
    {
        console.log(e);
        return true;
    }
}
function session_timeout2(data){
    if(!isJson(data)){
        return true;
    }
    return true;
}
function process_timeout(status){
    if(status=='timeout'){
        //ajaxTimeout.abort();
        alert('系统繁忙,请重新操作!');
        return false;
    }
    return false;
}
function isJson(obj) {
    var isjson = typeof (obj) == "object" && Object.prototype.toString.call(obj).toLowerCase() == "[object object]" && !obj.length;
    return isjson;
}

//定义 _user_ 对象
try{
    if( typeof($)!="undefined" && typeof($)!="null" && typeof(_user_) != "object" )
    {
        window._user_ = {
            isLogin: false, //// 是否登录,"true":登录；  "false":未登录
            userName: "",  //当前用户的登录 用户名
            ajax_timeout: 30000,  //ajax请求超时时间
            //刷新余额
            refreshMoney: function (domSelector) {
                
                if ($(domSelector).length == 0) {
                    return;
                }
                $.ajax({
                    'url':'common/checkLogin',//获取余额
                    'dataType': 'json',
                    'timeout': 30000,
                    'type': 'post',
                    beforeSend: function () {
                        $(domSelector).html('￥---');
                    }
                }).done(function(results){
                    var data=results.data;
                    if (results.status == '200') {
                        var str = '￥' + data.balance;
                        $(domSelector).html(str);
                    }
                }).fail(function(XMLHttpRequest, status){process_timeout(status);});
            },
            doLogin:function(parentSelector,parentSelector2,async_) {
                var username_login = $.trim($(parentSelector+" [name=\"username\"]").val());
                var passwd_login = $.trim($(parentSelector+" [name=\"passwd\"]").val());
                var authnum_login = $.trim($(parentSelector+" [name=\"authnum\"]").val());
                if (username_login == '') {
                     _alert('用户名不能为空!');
                  return false;
              }
              if (passwd_login == '') {
                 _alert('密码不能为空!');
                 return false;
              }
              if (authnum_login == '') {
                  _alert('验证码不能为空!');
                    return false;
             }
             if (!/^[0-9]{4}$/.test(authnum_login)) {
                   _alert('请输入4位数字验证码!');
                   return false;
                }
                var param = {
                            userName: username_login,
                            password: passwd_login,
                            verifyCode: ""
                        };
              param.verifyCode = authnum_login;
                if( !async_ )
                {
                    async_ = true;
                }
                $.ajax({
                    url: "common/login/submit", //登录
                    type: 'post',
                    data: param,
                    async: async_,
                    beforeSend: function () {
                        $(parentSelector+" [name=\"login\"]").attr("disabled", true);
                    },
                    complete: function () {
                        $(parentSelector+" [name=\"login\"]").attr("disabled", false);
                    },
                    'timeout': _user_.ajax_timeout,
                    dataType: 'JSON',
                    error: function (XMLHttpRequest, status) {
                        if (status == 'timeout') {
                            _alert('系统繁忙,请重新操作!');
                        }
                    }
                }).done(function( data ){
                    if (data.hasOwnProperty('Result') && data.Result) {
                        //登陆成功
                        //下面是刷新用户名和余额
                        $.ajax({
                            'url': '/index/ajaxGetLoginMsg.html',
                            'dataType': 'json',
                            'type': 'post',
                            'success': function (data) {
                                if ( data.loginId != '' && data.loginId != undefined && data.loginId != null )
                                {  //已登陆
                                    $(parentSelector2+" [name=\"user_name\"]").html(data.loginId);
                                    $("#balance").html(data.balance ? ("￥" + data.balance) : "￥0");
                                    _user_.isLogin = "true";
                                    _user_.userName = data.loginId;
                                    $(parentSelector2+'#header_money_refresh').click(function () {
                                        _user_.refreshMoney("#balance");
                                    });
                                    $(parentSelector).hide();
                                    $(parentSelector2).show();
                                }
                                else
                                {//未登陆
                                }
                            }
                        });
                    }
                    else {
                        //   var parentSelector = "#header_user_login";//父级dom的选择器
                        //登陆错误
                        _alert(data.Desc);
                        if (data.hasOwnProperty('login_yzm') && data.login_yzm == 1)
                        {
                            $(parentSelector+" [name=\"login_img\"]").click();
                            $(parentSelector+" [name=\"authnum\"]").val("");
                            $(parentSelector+" .top-login-bg2").css("display", "block");
                        }
                        else
                        {
                            $(parentSelector+" [name=\"authnum\"]").css("display", "none");
                        }
                        $(parentSelector+" [name=\"authnum\"]").val("");
                        $(parentSelector+" [name=\"username\"]").val("");
                        $(parentSelector+" [name=\"passwd\"]").val("");
                    }
                });
    }
        };
    }
}catch( e ){ console.log(e); }

///*判断当前浏览器是否支持 html5的无刷新页面跳转*/
function support_history_api()
{
    if( (typeof(onhashchange)=="object" || typeof(onhashchange)=="function" || typeof(onhashchange)!="undefined" ) )
    {
        return true;
    }
    else
    {
        return false;
    }
}

try{
    if( typeof($)!="undefined" && typeof($)!="null")
    {
        window._style_={
            //弹出登录的弹窗
            //参数 func 不为空,则 同步ajax的登录； 为空 ,则 异步ajax的登录
            popup_login:function( func ){
                if( _user_ && _user_.isLogin && _user_.isLogin == "false" )
                {
                    if(  $("#popup_login").get(0) )
                    {
                        $("#popup_login").css("display","block");
                    }
                    else
                    {
                        var newDiv = $('<div id="popup_login" class="popup_login"></div>');
                        newDiv.append('<form><h2>会员登录</h2><a>关闭</a><div class="row"><label>用户名</label><input id="username_login" type="text" maxlength="20"></div><div class="row"><label>密码</label><input id="passwd_login" type="password" maxlength="16"></div><div class="row div_authnum" id="div_authnum"  style="display:block;"><label>验证码</label><input id="authnum_login" type="text" maxlength="4"><img id="login_img" src="/seccode/makecode.html?nchash=&amp;t=0.18097737054274932"><a class="reg-refresh-verify-code"></a></div><div class="row"><a id="btn_login" class="btn_login">登录</a></div></form>');
                        $("body").append(newDiv);
                        //关闭弹窗
                        $("#popup_login>form>a").on("click",function(){
                            $("#popup_login").css("display","none");
                            $("#popup_login  #passwd_login").val("");
                        });
                        //提交登录
                        $("#popup_login  #btn_login").on("click",function(){

                            if( func && (typeof(func) == 'function') )
                            {
                                doLogin( false );
                                func();
                            }
                            else
                            {
                                doLogin( true );
                            }
                        });
                        $("#popup_login").get(0).onkeydown = function(event){
                            var e = event || window.event || arguments.callee.caller.arguments[0];
                            if( e.keyCode == 9 )
                            {
                                try{if(e.preventDefault){e.preventDefault();}else{e.returnValue = false;}}catch(e){}
                            }
                            if(e && (e.keyCode == 13 || e.keyCode == 9 )){ // enter 键
                                if(  $("#popup_login").css("display") == "block" )
                                {
                                    if ($.trim($("#popup_login #username_login").val()) == '') {
                                        $("#popup_login #username_login").focus();
                                        return;
                                    }
                                    if ($.trim($("#popup_login #passwd_login").val()) == '') {
                                        $("#popup_login #passwd_login").focus();
                                        return;
                                    }
                                    if ($.trim($("#popup_login #authnum_login").val()) == '' && $("#popup_login  #div_authnum").css("display")=="block")
                                    {
                                        $("#popup_login #authnum_login").focus();
                                        return;
                                    }
                                    if( func && (typeof(func) == 'function') )
                                    {
                                        doLogin( false );
                                        func();
                                    }
                                    else
                                    {
                                        doLogin( true );
                                    }
                                }
                            }
                        };
                        //获取新的验证码
                        $("#popup_login   .reg-refresh-verify-code").on("click",function(){
                            $('#popup_login #login_img').attr('src', 'common/public/verifycode/' + Math.random());
                            $('#popup_login #authnum_login').val('').focus();
                        });
                    }
                    return false;
                }
                else
                {///*已登录*/
                    if( func && (typeof(func) == 'function') )
                    {
                        func();
                    }
                    return true;
                }
                function doLogin( async_ ) {
                    var username_login = $.trim($('#username_login').val());
                    var passwd_login = $.trim($('#passwd_login').val());
                    var authnum_login = $.trim($('#popup_login  #authnum_login').val());
                    if ( username_login == '') {
                        _alert('用户名不能为空!');
                        return false;
                    }
                    if ( passwd_login == '') {
                        _alert('密码不能为空!');
                        return false;
                    }
                    var param = {
                            userName:username_login,
                            password:passwd_login,
                            verifyCode:""
                        };
                    if(  $("#popup_login  #div_authnum").css("display") == "block" )
                    {
                        if (authnum_login == '') {
                            _alert('验证码不能为空!');
                            $("#popup_login #div_authnum").focus();
                            return false;
                        }
                        if (!/^[0-9]{4}$/.test(authnum_login)) {
                            _alert('请输入4位数字验证码!');
                            return false;
                        }
                        param.verifyCode = authnum_login;
                    }
                    $.ajax({
                        url:"common/login/submit",
                        type:'post',
                        data:param,
                        async:async_,
                        beforeSend:function(){ $("#btn_login").attr("disabled", true);},
                        'timeout': _user_.ajax_timeout, //<?php echo AJAX_TIMEOUT; ?>,
                        dataType: 'JSON',
                        success: function (data) {
                            try{
                                if ( session_timeout(data) === false) {
                                    return false;
                                }
                            }catch(e){console.log(e);}
                            //      $.hide_loading();
                            $("#btn_login").attr("disabled", false);
                            if (data.hasOwnProperty('Result') && data.Result)
                            {
                                //登陆成功
                                _user_.isLogin = "true";
                                _user_.userName = $.trim($('#username_login').val());
                                $("#popup_login").css("display","none");
                                $("#popup_login  #passwd_login").val("");
                                $("#popup_login").data("login","true");
                            }
                            else
                            {
                                $("#popup_login").data("login","false");
                                //登陆错误
                                _alert( data.Desc );
                                if( data.hasOwnProperty('login_yzm') && data.login_yzm == 1  )
                                {
                                    $("#popup_login   .reg-refresh-verify-code").click();
                                    $('#popup_login  #authnum_login').val("");
                                    $("#popup_login  #div_authnum").css("display","block");
                                }
                                else
                                {
                                    $("#popup_login  #div_authnum").css("display","none");
                                }
                                $("#authnum_login").val("");
                                $("#popup_login  #username_login").val("");
                                $("#popup_login  #passwd_login").val("");
                            }
                        },
                        error: function (XMLHttpRequest, status) {
                            $("#popup_login").data("login","false");
                            $("#btn_login").attr("disabled", false);
                            //  $.hide_loading();
                            if(status=='timeout'){
                                _alert('系统繁忙,请重新操作!');
                                return false;
                            }
                        }
                    });
                }
            },
            dialogUi:function(){
                if( !$("#JS_blockPage").get(0) )
                {
                    var newDiv = $("<div id=\"JS_blockPage\" class=\"JS_blockPage\"><div class=\"detail_dialog\"><h3 id=\"block_draghandler\"></h3><img src=\""+_prefixURL.statics+"/images/close.gif\" class=\"c1\" id=\"block_close\"><div class=\"data data-order\"></div></div></div>");
                    $("body").append(newDiv);
                    $("#block_close").click(function(){
                        $("#JS_blockPage").css( "display","none" );
                    });
                }
            }
        };
    }
}catch( e ){ console.log(e); }


//自定义alert
/*
 * 用法 ： _alert("操作成功")    _alert("操作成功",function(){  alert("您刚才点击了按钮") })
 * */
try{
    if( typeof($)!="undefined" && typeof($)!="null")
    {
        window._alert = function(content_,title_,okFun_){
            var content,title,okFun;
            if ( ! ( typeof content_ == "string" || typeof content_ == "number") ) {
                content = "温馨提示";
            }else{
                content = content_;
            }
            if ( ! ( typeof title_ == "string" || typeof title_ == "number") ) {
                title = "温馨提示";
            }else{
                title = title_;
            }
            if(  okFun_ instanceof Function  ){
                okFun = okFun_;
            }else if( arguments[arguments.length-1] instanceof Function  ){
                okFun = arguments[arguments.length-1];
            }else{
                okFun = function(){};
            }
            window.___okFun_alert = okFun;
            var newDom = document.getElementById("_alert_");
            if( !newDom )
            {
                var htmlStr = "<div id=\"_alert_\"><div class=\"_alert_\"><div class=\"title\"><span></span><div class=\"btn_close\"><span></span></div></div><p></p><button class=\"btn_ok\">确定</button></div></div>";
                $("body").append(htmlStr);
                $("#_alert_  .title .btn_close,#_alert_   .btn_ok").click(function(){
                    ___okFun_alert();
                    $("#_alert_").css("display","none");
                    $("#_alert_ ._alert_").removeClass("anim");
                    delete  window.___okFun_alert;
                    try{if(event.preventDefault){event.preventDefault();}else{event.returnValue = false;}}catch(e){}
                });
            }
            $("#_alert_  ._alert_>p").html(content);
            $("#_alert_").css("display","block");
            $("#_alert_  ._alert_").addClass("anim");
            $("#_alert_  .title>span").text(title);
        };
        //自定义confim
        window._confim = function(content_,okFun_,cancelFun_){
            var content,title,okFun;
            if ( ! ( typeof content_ == "string" || typeof content_ == "number") ) {
                content = "温馨提示";
            }else{
                content = content_;
            }
            if ( ! ( typeof title_ == "string" || typeof title_ == "number") ) {
                title = "温馨提示";
            }else{
                title = title_;
            }
            if(  ! (okFun_ instanceof Function)  ){
                okFun_ = function(){};
            }
            if(  ! (cancelFun_ instanceof Function)  ){
                cancelFun_ = function(){};
            }
            window.___okFun_confim = okFun_;
            window.___cFun_confim = cancelFun_;
            var newDom = document.getElementById("_confim_");
            if( !newDom )
            {
                var htmlStr = "<div id=\"_confim_\"><div class=\"_confim_\"><div class=\"title\"><span></span><div class=\"btn_close\"><span></span></div></div><p></p><div class=\"btn_div\"><button class=\"btn_ok\">确定</button><button class=\"btn_cancel\">取消</button></div></div></div>";
                $("body").append(htmlStr);
                $("#_confim_  .title .btn_close,#_confim_ .btn_cancel").click(function(){
                    ___cFun_confim();
                    $("#_confim_").css("display","none");
                    $("#_confim_ ._confim_").removeClass("anim");
                    delete  window.___cFun_confim;
                    try{if(event.preventDefault){event.preventDefault();}else{event.returnValue = false;}}catch(e){}
                });
                $("#_confim_ .btn_ok").click(function(){
                    ___okFun_confim();
                    $("#_confim_").css("display","none");
                    $("#_confim_ ._confim_").removeClass("anim");
                    delete  window.___okFun_confim;
                    try{if(event.preventDefault){event.preventDefault();}else{event.returnValue = false;}}catch(e){}
                });
            }
            $("#_confim_  ._confim_>p").html(content);
            $("#_confim_").show();
            $("#_confim_  ._confim_").addClass("anim");
            $("#_confim_  .title>span").text(title);
        };
    }
}catch( e ){ console.log(e); }


try{
    if( typeof($)!="undefined" && typeof($)!="null")
    {
        $(function(){
            //定时刷新余额 // AUTO REFRESH AMOUNT
            (function refreshAmount( domSelector ){
                if( $(domSelector).length > 0  )
                {
                    window.__Itl_refresh_money_ = setInterval(
                        function(){
                            if(_user_.isLogin=="true")
                            {
                                _user_.refreshMoney();
                            }
                            else
                            {
                                /*_alert("尊敬的用户，您登录超时，请重新登录",function(){
                                    location.href = location.href;
                                });*/
                            }
                        },50000);
                }
            })("#login_balance,#balance,#__user_balance");
        });
    }
}catch(e){console.log(e); }



//  begin ：下面的代码是为了兼容 500vip的残留页面,几乎不会被使用在新彩新开发的页面
function refreshMoney() {
    _user_.refreshMoney("#balance");
}
try{
    Array.prototype.remove = function (b) {
        for (var a = 0; a < this.length; a++) {
            if (this[a] == b) {
                this.splice(a, 1)
            }
        }
    };
}catch(e){console.log(e);}
//  end ：上面的代码是为了兼容 500vip的残留页面,几乎不会被使用在新彩新开发的页面
function getUrl(name){//获取链接参数
    var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); 
    var r = location.search.substr(1).match(reg); 
      if (r!=null) { 
       return unescape(r[2]); 
      } 
    return null; 
}
