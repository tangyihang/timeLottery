///* 该文件包括 主页的部分功能 ：1 主页中左边的彩票menu列表； 2 头部html; 3 定义全局刷新余额的方法： window.refreshAmount */
// from  
// _common 是 当前文件的命名空间
window._home_menu = {
    //@ parem  domSelector  : 一个dom选择器，  获得游戏列表(主页等彩票列表)
    getGameList: function (domSelector) {
        var static_value = {
            topNum: 6   //热门彩种，选前6个作为热门彩种
        };
        $.ajax({
            'url': '/index/ajaxGetAllGameStatus.html',
            'dataType': 'json',
            'type': 'post',
            'success': function (data) {
                try
                {
                    if ( session_timeout(data) === false )
                    {
                        return false;
                    }
                } catch(e){ console.log(e);}
                var count = data.count;
                if (count === 0) {
                    return;
                }
                var hotHtmlArr = []; //热门彩种
                var highHtml = "", //高频彩种
                    lowHtml = "",
                    allHtml = "";
                var highFreq = new Array();
                var lowFreq = new Array();
                var all = new Array();

                for (var i = 0; i < count; i++) {
                    if (i < static_value.topNum) {
                        if (i === 0 || i === 5 || i === 1) {//显示高亮
                                if (i === 0 || i === 1) {//给前两个添加icon
                                hotHtmlArr.push("<li class=\"mainGame\"><a  onclick=\"__openWin(\'lottery_hall\',\'"+ data.games[i].link +"\');\" class=\"mainA\"><i class=\"icon nav40-9\"><img src=\""+_prefixURL.common+"/img/lottery/icon/" + data.games[i].id + ".png\" /></i><div class=\"fl\"><span class=\"color333\">" + data.games[i].name + "</span><p onclick=\"__openWin(\'lottery_hall\',\'"+ data.games[i].link +"\');\" target=\"_blank\" class=\"status-desc\">" + data.games[i].indexDesc + "</p></a></div></li>");
                                }else{//显示高亮
                                    hotHtmlArr.push("<li class=\"mainGame\"><a  onclick=\"__openWin(\'lottery_hall\',\'"+ data.games[i].link +"\');\" class=\"mainA\"><i class=\"icon nav40-9\"><img src=\""+_prefixURL.common+"/img/lottery/icon/" + data.games[i].id + ".png\" /></i><div class=\"fl\"><span class=\"color333\">" + data.games[i].name + "</span><p onclick=\"__openWin(\'lottery_hall\',\'"+ data.games[i].link +"\');\" target=\"_blank\" class=\"status-desc\">" + data.games[i].indexDesc + "</p></a></div></li>");}
                        }else {
                                hotHtmlArr.push("<li class=\"mainGame\"><a  onclick=\"__openWin(\'lottery_hall\',\'"+ data.games[i].link +"\');\"  class=\"mainA\"><i class=\"icon nav40-9\"><img src=\""+_prefixURL.common+"/img/lottery/icon/" + data.games[i].id + ".png\" /></i><div class=\"fl\"><span class=\"color333\">" + data.games[i].name + "</span><p><span class=\"normal-desc\">" + data.games[i].indexDesc + "</span></p></a></div></li>");
                                }
                    }
                    if (data.games[i].freqType == 1) {
                        highFreq.push(data.games[i]);
                    }
                    if (data.games[i].freqType == 2) {
                        lowFreq.push(data.games[i]);
                    }
                    all.push(data.games[i]);
                }
                var highCount = highFreq.length;
                var lowCount = lowFreq.length;
                var allCount = all.length;
                if (highCount > 0) {
                    highHtml += '<li class="allGames clearfix" data-type="1">';
                    highHtml += '<h3><i class=\"icon-ALARM\"></i><span>高频彩</span></h3>';
                    highHtml += '<ul class="clearfix game-list">';
                    var showHtml = '';
                    var hideHtml = '';
                    for (var i = 0; i < highCount; i++) {
                        if (i < 6) {
                            if ((i + 1) % 3 === 0) {
                                showHtml += '<li><a  onclick=\"__openWin(\'lottery_hall\',\''+ highFreq[i].link +'\');\">' + highFreq[i].name + '</a></li>';
                            } else {
                                showHtml += '<li><a onclick=\"__openWin(\'lottery_hall\',\''+ highFreq[i].link +'\');\">' + highFreq[i].name + '</a></li>';
                            }
                        }
                        hideHtml += '<li><a onclick=\"__openWin(\'lottery_hall\',\''+ highFreq[i].link +'\');\">' + highFreq[i].name + '</a></li>';
                        if (6 >= highCount) {
                            hideHtml = "";
                        }
                    }
                    showHtml += '</ul>';
                    highHtml += showHtml;
                    if (hideHtml !== '') {
                        highHtml += '<i class="icon" id="open-btn-1" style="display: block;"></i>'
                            + '<div class="line-fff"></div>'
                            + '<div class="moreGames clearfix" style="display: none;" id="moreGames_1">'
                            + '<div class="moreGames-box fl">'
                            + '<div class="otherGames num-games">'
                            + '<h3>高频彩</h3>'
                            + '<ol>'
                            + hideHtml
                            + '</ol></div></div>'
                            + '</div>';
                    }
                    highHtml += '</li>';
                }
                if (lowCount > 0) {
                    lowHtml += '<li class="allGames" data-type="2">';
                    lowHtml += '<h3><i class=\"icon-TIME\"></i><span>低频彩</span></h3>';
                    lowHtml += '<ul class="clearfix game-list">';
                    var showHtml = '';
                    var hideHtml = '';
                    for (var i = 0; i < lowCount; i++) {
                        if (i < 6) {
                            if ((i + 1) % 3 === 0) {
                                showHtml += '<li><a onclick=\"__openWin(\'lottery_hall\',\''+ lowFreq[i].link +'\');\">' + lowFreq[i].name + '</a></li>';
                            } else {
                                showHtml += '<li><a onclick=\"__openWin(\'lottery_hall\',\''+ lowFreq[i].link +'\');\">' + lowFreq[i].name + '</a></li>';
                            }
                        }
                        hideHtml += '<li><a onclick=\"__openWin(\'lottery_hall\',\''+ lowFreq[i].link +'\');\" >' + lowFreq[i].name + '</a></li>';
                        if (6 >= lowCount) {
                            hideHtml = "";
                        }
                    }
                    showHtml += '</ul>';
                    lowHtml += showHtml;
                    if (hideHtml !== '') {
                        lowHtml += '<i class="icon" id="open-btn-1" style="display: block;"></i>';
                        lowHtml += '<div class="line-fff"></div>';
                        lowHtml += '<div class="moreGames clearfix" style="display: none;" id="moreGames_2">';
                        lowHtml += '<div class="moreGames-box fl">';
                        lowHtml += '<div class="otherGames num-games">';
                        lowHtml += '<h3>低频彩</h3>';
                        lowHtml += '<ol>';
                        lowHtml += hideHtml;
                        lowHtml += '</ol></div></div></div>';
                    }
                    lowHtml += '</li>';
                }
                if (allCount > 0) {
                    allHtml += '<li class="allGames clearfix" data-type="3">';
                    allHtml += '<h3><i class=\"icon-billiard-ball\"></i></i><span>全部</span></h3>';
                    allHtml += '<ul class="clearfix game-list">';
                    var showHtml = '';
                    var hideHtml = '';
                    for (var i = 0; i < allCount; i++) {
                        if (i < 6) {
                            if ((i + 1) % 3 === 0) {
                                showHtml += '<li><a  onclick=\"__openWin(\'lottery_hall\',\''+ all[i].link +'\');\" >' + all[i].name + '</a></li>';
                            } else {
                                showHtml += '<li><a onclick=\"__openWin(\'lottery_hall\',\''+ all[i].link +'\');\" >' + all[i].name + '</a></li>';
                            }
                        }
                        hideHtml += '<li><a  onclick=\"__openWin(\'lottery_hall\',\''+ all[i].link +'\');\" >' + all[i].name + '</a></li>';
                        if (6 >= allCount) {
                            hideHtml = "";
                        }
                    }
                    showHtml += '</ul>';
                    allHtml += showHtml;
                    if (hideHtml !== '') {
                        allHtml += '</ul>';
                        allHtml += '<i class="icon" id="open-btn-1" style="display: block;"></i>';
                        allHtml += '<div class="line-fff"></div>';
                        allHtml += '<div class="moreGames clearfix" style="display: none;" id="moreGames_3">';
                        allHtml += '<div class="moreGames-box fl">';
                        allHtml += '<div class="otherGames num-games">';
                        allHtml += '<h3>全部</h3>';
                        allHtml += '<ol>';
                        allHtml += hideHtml;
                        allHtml += '</ol></div></div></div>';
                    }
                    allHtml += '</li>';
                } 
                $(domSelector).html(hotHtmlArr.join("") + highHtml + lowHtml + allHtml);//列表
                $(domSelector).on('mouseover', '.allGames', function () {
                    $('.allGames').mouseover(function (e) {
                        var tag = $(this).data('type');
                        $(this).addClass('allGames-on').siblings('li').removeClass('allGames-on').find('.moreGames').css({'display': 'none'});
                        $('#moreGames_' + tag).css({'display': 'block'});
                        $('#lotterysList').addClass('lotterys-list-hd-border1');
                        $(this).children('.icon').hide();
                        $(this).children('.line-fff').show();
                    });
                    $('.allGames').mouseout(function (e) {
                        $(this).removeClass('allGames-on').find('.moreGames').css({'display': 'none'});
                        $('#lotterysList').removeClass('lotterys-list-hd-border1');
                        $(this).children('.icon').show();
                        $(this).children('.line-fff').hide();
                    });
                });
                 // getGameLeftTime();
            },
            error: function (XMLHttpRequest, status) {
                process_timeout(status);
            }
        });

    },
   
    //ajax获取跑马灯数据
    getMqData: function (domSelector) {
        if( $(domSelector).length == 0 ){
            return;
        }
        $.ajax({
            'url': '/index/getMqData.html',
            'dataType': 'json',
            'type': 'post',
            'success': function (data) {
            	$("#sys_tip_outer").append("<marquee id=\"sys_tip\" behavior=\"scroll\"></marquee>");
            	///* marquee标签必须由后来添加，和innerHTML同时存在，不可先于内容存在  */
                $("#header_plus .header-toptray-plus").show();
        		var html = data.html?data.html.replace(/<br\s*\/?>/gi, "&nbsp;&nbsp;"):"";
        		var marqueeDom = $("#sys_tip")
            	marqueeDom.html(html);
                marqueeDom.bind("mouseover",function()
                {
                    $(this).get(0).stop();
                }).bind("mouseout",function()
                {
                    $(this).get(0).start();
                });
            }
        });
    },   
        
    /*
     检查是否登陆
     未登录 则隐藏用于余额，显示登录输入框。登录，反之。
     已登录需要弹出系统公告，还需要显示 余额和用户名
     * */
    checkLogin: function () {
        $.ajax({
            'url': '/index/ajaxGetLoginMsg.html',
            'dataType': 'json',
            'type': 'post',
            'success': function (data) {
                if (data.loginId != '' && data.loginId != undefined && data.loginId != null) {  //已登陆
                    $("#header_user").show();
                    $("#header_user_login").hide();
                    $("#header_user [name=\"user_name\"]").html(data.loginId);
                    $("#balance").html(data.balance ? ("￥" + data.balance) : "￥0");
                    _user_.isLogin = "true";
                    _user_.userName = data.loginId;
                    $('#header_money_refresh').click(function () {
                        _user_.refreshMoney("#balance");
                    });
                    $("#play_free,#agent_reg_url").hide();
                }
                else
                {
                    var parentSelector = "#header_user_login";//父级dom的选择器
                    $("#header_user").hide();
                    if( $(parentSelector).length == 0 )
                    {
                        return;
                    }
                    if( location.href.indexOf("login.html") >= 0 || $("#_form_login").length > 0 )
                    {
                        $(parentSelector).hide();
                    }
                    else
                    {
                        $(parentSelector).show();
                    }
                    function doLogin(async_) {
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
                            login: username_login,
                            pass: passwd_login,
                            authnum: "",
                            form_submit: "ok"
                        };
                        param.authnum = authnum_login;
                        if(typeof( async_ )!="boolean")
                        {
                            async_ = true;
                        }
                        $.ajax({
                            url: "/login/index.html",
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
                            success: function (data) {
                                if (data.hasOwnProperty('Result') && data.Result) {
                                    //登陆成功
                                    //下面是登录后的 公告 弹窗
                                    (function afterloginDialog() {
                                        _style_.dialogUi();
                                        $("#JS_blockPage").addClass("big");
                                        $.ajax({
                                            'url': '/index/ajaxGetPopMsg.html',
                                            'dataType': 'json',
                                            'type': 'post',
                                            'success': function (data) {
                                                try
                                                {
                                                    if ( session_timeout(data) === false )
                                                    {
                                                        return false;
                                                    }
                                                } catch(e){ console.log(e);}
                                                if (!data.Result || data.RecordCount == 0) {
                                                    return;
                                                }
                                                var txtHtml = "";
                                                for (var i = 0; i < data.RecordCount; i++) {
                                                    txtHtml += "<div class=\"one\"><strong>"
                                                        + data.Records[i].sTitle + '</strong><p>'
                                                        + data.Records[i].sContent.replace(/&lt;br \/&gt;/g, "<br />")
                                                        + "</p></div>";
                                                }
                                                $("#JS_blockPage .data").html(txtHtml);
                                                $("#JS_blockPage").css("display", "block");
                                                $("#block_draghandler").text("公告");
                                            },
                                            error: function (XMLHttpRequest, status) {
                                                //process_timeout(status);
                                            }
                                        });
                                    })();
                                    //下面是刷新用户名和余额
                                    _home_menu.checkLogin();
                                }
                                else {
                                    var parentSelector = "#header_user_login";//父级dom的选择器
                                    //登陆错误
                                    _alert(data.Desc);
                                    if (data.hasOwnProperty('login_yzm') && data.login_yzm == 1)//login_yzm是之前有该属性
                                    {
                                        $(parentSelector+" [name=\"login_img\"]").click();
                                        $(parentSelector+" [name=\"authnum\"]").val("");
                                        $(parentSelector+" .top-login-bg2").css("display", "block");
                                    }
                                    $(parentSelector+" [name=\"authnum\"]").val("");
                                    $(parentSelector+" [name=\"username\"]").val("");
                                    $(parentSelector+" [name=\"passwd\"]").val("");
                                }
                            },
                            error: function (XMLHttpRequest, status) {
                                if (status == 'timeout') {
                                    _alert('系统繁忙,请重新操作!');
                                }
                            }
                        });
                    }
                    $(parentSelector+" [name=\"login\"]").click(doLogin);
                    $(parentSelector+" [name=\"login_img\"],"+parentSelector+" [name=\"btn_refresh\"],"+parentSelector+" [name=\"div_top_click\"]").click(function newVerify()
                        {
                            $("img[name=\"login_img\"]").attr('src', '/seccode/makecode.html?nchash=&t=' + Math.random());
                            $(parentSelector+" [name=\"authnum\"]").val('').trigger("focus");
                            $(parentSelector+" [name=\"div_top_click\"]").hide();
                        });
                  //  $(parentSelector+" [name=\"div_top_click\"]").trigger("click");//点击 按钮[请点击输入验证码]一次，帮助用户点击一次
                    $(parentSelector+" [name=\"authnum\"]").bind("focus",function(){
                        if($(this).val()=="")
                        {
                            (function newVerify()
                            {
                                $("img[name=\"login_img\"]").attr('src', '/seccode/makecode.html?nchash=&t=' + Math.random());
                                $(parentSelector+" [name=\"div_top_click\"]").hide();
                            })();
                        }
                        try{if(event.preventDefault){event.preventDefault();}else{event.returnValue = false;}}catch(e){}
                    });
                    $("#play_free").show();

                    $(parentSelector).get(0).onkeydown = function (event) {
                        var e = event || window.event || arguments.callee.caller.arguments[0];
                        if( e.keyCode == 9 )
                        {
                            try{if(e.preventDefault){e.preventDefault();}else{e.returnValue = false;}}catch(e){}
                        }
                        if (e && (e.keyCode == 13 || e.keyCode == 9 ) ) { // enter 键
                            if ($.trim($(parentSelector+" [name=\"username\"]").val()) == '') {
                                $(parentSelector+" [name=\"username\"]").focus();
                                return;
                            }
                            if ($.trim($(parentSelector+" [name=\"passwd\"]").val()) == '') {
                                $(parentSelector+" [name=\"passwd\"]").focus();
                                return;
                            }  
                            if ($.trim($(parentSelector+" [name=\"authnum\"]").val()) == '') {
                                $(parentSelector+" [name=\"div_top_click\"]").click();
                                return;
                            }
                            doLogin();
                        }
                    };
                    _bug_placeholder("#header_user_login");//解决 placeholder 兼容性问题
                }
            }
        });
    }
};
try{
    //下面是静态资源url的前缀
    if( typeof(_prefixURL)!="object" )
    {
        window._prefixURL = {
            statics:"/sscp/statics",
            common:"/common/statics"
        };
    }
}catch (e) {
    console.log(e);
}




$(function(){
    try{
        //下面是 加入收藏
        $("#shoucang").on('click',function(){
            AddFavorite(location.herf,'彩票33');
            function AddFavorite(sURL, sTitle)
            {
                try
                {
                    window.external.addFavorite(sURL, sTitle);
                }
                catch (e)
                {
                    try
                    {
                        window.sidebar.addPanel(sTitle, sURL, "");
                    }
                    catch (e)
                    {
                        alert("请使用Ctrl+D进行添加");
                    }
                }
            }
        });
    }catch (e){console.log(e);}
    try{
        //首页点击 logo 跳转主页,如果是主页则不绑定该方法
        if( location.href.length > document.domain.length + 2 )
        {
            $("#liansai .sprite-logo").bind("click",function(){
           //document.domain
                __openWin("home","/");
            });
        }
    }catch(e){console.log(e);}

    //显示或隐藏代理注册
    (function agentSet(){
        try
        {
            $.ajax({
                url: '/index/agentSet.html',
                type: 'post',
                dataType: 'json'
                // data: {stu: '1'},
            }).done(function (data) {
                try
                {
                    if ( session_timeout(data) === false )
                    {
                        return false;
                    }
                } catch(e){ console.log(e);}
                if (data['status'] === 1) {
                    $("#agent_reg_url").show();
                }else{
                    $('#agent_reg_url').css('display', 'none');//去掉代理登入
                }
            });
        }
        catch(e){ colsole.log(e); }
    })();

});

//下面是解决 placeholder 兼容性问题：
function _bug_placeholder( parent_selector_str )
{
    try
    {
        var selector_str = parent_selector_str+" input[placeholder]";
        if( !$(selector_str) && $(selector_str).length==0 )
        {
            return;
        }
        if( !('placeholder' in document.createElement('input')) )
        {
            $(selector_str).each(function(){
                var that = $(this),
                    text= that.attr('placeholder');
                var isFlag = false;
                if( that.attr("name")=="passwd" || that.attr("name")=="passward" || that.attr("name")=="pwd" || that.attr("type")=="password" )
                {
                    isFlag = true;
                }
                else
                {
                    isFlag = false;
                }
                if(that.val()==="")
                {
                    that.val(text).addClass('_bug_placeholder');
                    if(isFlag)
                    {
                        that.removeAttr("type");
                    }
                }
                that.bind("focus",function(){
                    if( $(this).val()===text){
                        $(this).val("").removeClass('_bug_placeholder');
                        if(isFlag)
                        {
                            that.attr("type","password");
                        }
                    }
                }).bind("blur",function(){
                    if($(this).val()===""){
                        $(this).val(text).addClass('_bug_placeholder');
                        if(isFlag)
                        {
                            that.removeAttr("type");
                        }
                    }
                    else if(isFlag)
                    {
                        that.attr("type","password");
                    }
                });
            });
        }
    }catch(e){
        console.log(e);
    }
}
$(function()
{
	//玩法规则左边高亮加class
	function menuLeftUI()
	{
			var ar = $("#left .list li a"),flag=false;	
			for(var i=0;i<ar.length;i++)
			{
				if(location.href.indexOf($(ar[i]).attr("href"))>0)
				{
					$(ar[i]).parent().addClass("current");
					flag = true;
					break;
				}
			}
			if(!flag)
			{
				$(ar[0]).parent().addClass("current");
			}
	}
	try
	{
		if($("#left .list li a").length>0)
		{
			menuLeftUI();
		}
	}catch(e){}
}); 