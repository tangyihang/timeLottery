requirejs(["jquery", "user", "scrollbar"], function($) {
    var _lottery_menu = {
        checkLogin: function() {//检测是否登录
            $.ajax({
                'url': 'common/checkLogin',
                'dataType': 'json',
                'type': 'post',
                'success': function(results) {
                    var data = results.data;
                    if(results.status == "200") {
                        if(data.loginId != '' && data.loginId != undefined && data.loginId != null) { //已登陆
                            $("#header_user").show();
                            $("#header_user_login").hide();
                            $("#header_user [name=\"user_name\"]").html(data.loginId);
                            $("#balance").html(data.balance ? ("￥" + data.balance) : "￥0");
                            _user_.isLogin = true;
                            _user_.userName = data.loginId;
                            $('#header_money_refresh').click(function() {
                                _user_.refreshMoney("#balance");
                            });
                            $("#play_free,#agent_reg_url").hide();
                        } else {
                            var parentSelector = "#header_user_login"; //父级dom的选择器
                            $("#header_user").hide();
                            if($("#_form_login").length > 0) {
                                $(parentSelector).hide();
                            } else {
                                $(parentSelector).show();
                            }

                            function doLogin() {
                                var username_login = $.trim($(parentSelector + " [name=\"username\"]").val());
                                var passwd_login = $.trim($(parentSelector + " [name=\"passwd\"]").val());
                                var authnum_login = $.trim($(parentSelector + " [name=\"authnum\"]").val());
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
                                if (!/^[0-9a-zA-Z]{4}$/.test(authnum_login)) {
                                    _alert('请输入4位验证码!');
                                    return false;
                                }
                                var param = {
                                    userName: username_login,
                                    password: passwd_login,
                                    verifyCode: ""
                                };
                                param.verifyCode = authnum_login;
                                $.ajax({
                                    url: "common/login/submit", //登录
                                    type: 'post',
                                    data: param,
                                    beforeSend: function() {
                                        $(parentSelector + " [name=\"login\"]").attr("disabled", true);
                                    },
                                    complete: function() {
                                        $(parentSelector + " [name=\"login\"]").attr("disabled", false);
                                    },
                                    'timeout': _user_.ajax_timeout,
                                    dataType: 'JSON',
                                    success: function(results) {
                                        if(results.status == "200") {
                                        	_lottery_menu.checkLogin();
                                        } else {
                                            _alert(results.description);
                                        }
                                    },
                                    error: function(XMLHttpRequest, status) {
                                        if(status == 'timeout') {
                                            _alert('系统繁忙,请重新操作!');
                                        }
                                    }
                                });
                            }
                            $(parentSelector + " [name=\"login\"]").click(doLogin);
                            $(parentSelector + " [name=\"login_img\"]," + parentSelector + " [name=\"btn_refresh\"]," + parentSelector + " [name=\"div_top_click\"]").click(function newVerify() {
                                $("img[name=\"login_img\"]").attr('src', 'common/public/verifycode/' + Math.random());
                                $(parentSelector + " [name=\"authnum\"]").val('').trigger("focus");
                                $(parentSelector + " [name=\"div_top_click\"]").hide();
                            });
                            $(parentSelector + " [name=\"authnum\"]").bind("focus", function() {
                                if($(this).val() == "") {
                                    (function newVerify() { //验证码链接
                                        $("img[name=\"login_img\"]").attr('src', 'common/public/verifycode/' + Math.random());
                                        $(parentSelector + " [name=\"div_top_click\"]").hide();
                                    })();
                                }
                                try {
                                    if(event.preventDefault) { event.preventDefault(); } else { event.returnValue = false; }
                                } catch (e) {}
                            });
                            $("#play_free").show();
                            $(parentSelector).get(0).onkeydown = function(event) {
                                var e = event || window.event || arguments.callee.caller.arguments[0];
                                if (e.keyCode == 9) { // Tab 键
                                    try {
                                        if (e.preventDefault) { e.preventDefault(); } else { e.returnValue = false; }
                                    } catch (e) {}
                                }
                                if (e && (e.keyCode == 13 || e.keyCode == 9)) { // enter 键
                                    if ($.trim($(parentSelector + " [name=\"passwd\"]").val()) == '') {
                                        $(parentSelector + " [name=\"passwd\"]").focus();
                                        return;
                                    }
                                    if ($.trim($(parentSelector + " [name=\"username\"]").val()) == '') {
                                        $(parentSelector + " [name=\"username\"]").focus();
                                        return;
                                    }
                                    if ($.trim($(parentSelector + " [name=\"authnum\"]").val()) == '') {
                                        $(parentSelector + " [name=\"div_top_click\"]").click();
                                        return;
                                    }
                                    if (!/^[0-9]{4}$/.test($.trim($(parentSelector + " [name=\"authnum\"]").val()))) {
                                        return;
                                    }
                                    doLogin(); //不要刪我的代码
                                }
                            };
                        }
                    }
                }
            });
        },
        
        //彩票页面的 头部
        head: function() {
            (function() {
                //头部张开或收起的按钮
                $("#_lottery_menu_head>button").click(function() {
                    if ($("#_lottery_menu_head>div[name]").css("display") != "none") {
                        $("#_lottery_menu_head>div[name]").hide();
                        $("#_lottery_menu_head>button").addClass("_open").removeClass("_close");
                        $('#iframeDivList').css("height", ($(window).height()) + "px");
                    } else {
                        $("#_lottery_menu_head>div[name]").show();
                        $("#_lottery_menu_head>button").addClass("_close").removeClass("_open");
                        $('#iframeDivList').css("height", ($(window).height() - $("#_lottery_menu_head").height()) + "px");
                    }
                });
            })();
            //检查是否登录
            _lottery_menu.checkLogin();
        },
        
        getUrl:function(name){
        	var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)"); 
            var r = location.search.substr(1).match(reg);
            if(r!=null) {
            	return unescape(r[2]);
        	} 
            return null; 
        },
        
        //彩票页面的 左边menu
        leftMenu: function() {
        	$('#refresh_mongy_div').on('click', function() {
        		_lottery_menu.checkLogin();
        	});
            ///** 【热门彩种】彩票menu ，张开和收起  **/
            $('#hot_lottery .main-tit').on("click", function() {
                if ($('#hot_lottery .main-tit>i').attr("class").indexOf("icon-attr-up") >= 0) {
                    $('#hot_lottery .main-tit>i').removeClass("icon-attr-up");
                    $(this).parent().find("ul").hide();
                } else {
                    $('#hot_lottery .main-tit>i').addClass("icon-attr-up");
                    $(this).parent().find("ul").show();
                }
            });
            ///** 【高频,低频】彩票menu ，张开和收起  **/
            $('#live-main-list .main-top').on("click", function() {
                if ($(this).children("i").attr("class").indexOf("icon-attr-up") >= 0) {
                    $(this).children("i").removeClass("icon-attr-up");
                    $(this).parent().find("ul.gao-ul").css("display", "none");
                } else {
                    $(this).children("i").addClass("icon-attr-up");
                    $(this).parent().find("ul.gao-ul").css("display", "block");
                }
            });
            ///** 【高频二级菜单】彩票menu ，张开和收起  **/
            $('#live-main-list  ul.gao-ul  .icon-attr-down').parent().bind("click", function() {
                if ($(this).find(".icon-attr-down").attr("class").indexOf("icon-attr-up") >= 0) {
                    $(this).find(".icon-attr-down").removeClass("icon-attr-up");
                    $(this).parent().find("ul").css("display", "none");
                } else {
                    $("#live-main-list  ul.gao-ul .icon-attr-down").removeClass("icon-attr-up");
                    $("#live-main-list ul.gao-ul>li>ul").css("display", "none");
                    $(this).find(".icon-attr-down").addClass("icon-attr-up");
                    $(this).parent().find("ul").css("display", "block");
                }
            });
            ///* 点击头部logo，进入主页 */
            if ($("#live-menu-wrap>.live-logo").length > 0) {
                $("#live-menu-wrap>.live-logo").bind("click", function() {
                    __location("index");
                });
            }
            $("#live-main-list").find(".nav-li a.cur-btn").on("click", function(e) {
                e.preventDefault();
                var _url = $(this).attr("href");
                var _argsid = $(this).attr("data-argsid");
                    if ($("#i_list_2 #iframe_" + _argsid).length <= 0) {
                    $("#i_list_2").append('<iframe id="iframe_' + _argsid + '" src="" scrolling="no" marginwidth="0px" marginwidth="0px" frameborder="0"  samless></iframe>');
                    
                }
                $("#iframe_" + _argsid).attr("src", _url);
                $("#_tip_loading_").show();
                $("#iframe_" + _argsid).bind("load", function() {
                    $("#__iframe_list_  .div_iframe").hide(); //隐藏购票大厅
                    $("#_tip_loading_").hide();
                    $("#i_list_2").show();
                    $("#i_list_2").find("iframe").hide();
                    $("#i_list_2  #iframe_" + _argsid).show();
                });

            });
            $("#mainTit").on("click",function(e){
                e.preventDefault();
                var _url=$(this).attr("_href");
                $("#_tip_loading_").show();
                $("#__iframe_list_  .div_iframe").hide();
                if( $("#i_list_1").find("iframe").length <= 0){                    
                    $("#i_list_1").html('<iframe id="frameIndex" name="frameIndex" scrolling="no" marginwidth="0px" marginwidth="0px" frameborder="0"  samless></iframe>');
                    $("#frameIndex").attr("src",_url);
                    $("#frameIndex").bind("load",function(){
                            $("#_tip_loading_").hide();
                            $("#i_list_1").show();
                        });

                }else{
                    $("#frameIndex").attr("src",_url);
                    $("#frameIndex").bind("load",function(){
                            $("#_tip_loading_").hide();
                            $("#i_list_1").show();
                        });
                }
            });
            
            var quickAmount = _lottery_menu.getUrl("amount");
            if(quickAmount != null) {
            	var temp = '', quickBall = '';
            	for(var i=1;i<=5;i++) {
            		temp = _lottery_menu.getUrl("num"+i);
            		if(temp != null) {
            			quickBall += (i>1?'-':'') + temp;
            		}
            	}
            	
            	$('#quick_ball').val(quickBall);
            	$('#quick_amount').val(quickAmount);
            }
            
            var gameOpen=_lottery_menu.getUrl("gameOpen");
            if(gameOpen && $("#nav-btn-"+gameOpen).length>0){
                $("#nav-btn-"+gameOpen).click();
            }else{
                $("#mainTit").trigger('click');
            }
        }
    };
    
    $(function() {
        _lottery_menu.head();
        _lottery_menu.leftMenu();
        //iframe高度变化
        function frameHeight() {
            var bodyHeight = document.documentElement.clientHeight ? document.documentElement.clientHeight : document.body.scrollHeight;
            jQuery("#iframeDivList").css("height", (bodyHeight - $("#_lottery_menu_head").height()) + "px");
            if ($("#_body_div").height() != bodyHeight) {
                $("#_body_div").css("height", bodyHeight + "px");
            }
        }
        frameHeight();
        $(window).bind('resize', function() {
            frameHeight();
        });
    });
    
    $(function() {
        //自适应 宽度
        var liveArr = [38, 41, 43, 45, 47, 85];
        var newLive = {
            liveData: {},
            mainItem: '',
            clickStatus: true,
            curHall: 38,
            curSub: {},
            ultimateArr: [39, 44, 46, 48, 81, 83],
            keyString: "",
            groupX: "",
            groupY: "",
            resetClick: function() {
                this.curSub = '';
                this.mainItem = '';
            },
            
            gameShowHide: function() {
                $(function() {
                    if (newLive.curHall) {
                        // 开启/重刷页面
                        if ($.inArray(newLive.curHall, liveArr) >= 0) {
                            $('.ele-live-layout').css('display', 'none'); //#ele-live-flash,
                            $('.showhide-wrap, .showhide-' + newLive.curHall).show();
                            return false;
                        }
                        $('.showhide-wrap').css('display', 'none');
                    }
                });
            },
            
            accDiv: function(num1, num2) {
                var t1 = 0,
                    t2 = 0,
                    r1, r2;
                try { t1 = num1.toString().split(".")[1].length } catch (e) {}
                try { t2 = num2.toString().split(".")[1].length } catch (e) {}
                r1 = Number(num1.toString().replace(".", ""));
                r2 = Number(num2.toString().replace(".", ""));
                return (r1 / r2) * Math.pow(10, t2 - t1);
            },
            
            calculateBox: function() {
                var winH = $(window).height() - $('.new-header').height(), //获取内容区高度
                    winW = $(window).width(),
                    contentWidth = winW - $('#live-menu-wrap').width(),
                    wrapheight = winH,
                    listheight = winH - $('.live-logo').outerHeight(true) - $('.live-choose').outerHeight(true) + $('.new-header').height() - 2, //获取菜单高度
                    menu_height = $('#live-main-list').find('.live-nav').height();
                if (menu_height > listheight) {
                    var height_gap;
                    if ($('#menu-control').hasClass('go-top')) {
                        height_gap = (listheight - menu_height) - 25;
                    } else {
                        height_gap = 0;
                    }
                    $('#live-main-list')
                        .addClass('fixed-btn')
                        .find('.live-nav')
                        .css({ top: height_gap + 'px' });
                } else {
                    $('#live-main-list')
                        .removeClass('fixed-btn')
                        .find('.live-nav')
                        .css('top', '0')
                        .end()
                        .find('#menu-control')
                        .removeClass('go-top');
                }
                $('#live-main-wrap').css({ width: contentWidth, minHeight: winH - 12 }); //height: winH
                var _height = wrapheight - $(".new-header").height();
                $('#live-main-list').css("height", listheight); //左边menu
                $('#main-wrap').css('width', '100%');
                if ($('.ele-live-layout').length > 1) {
                    var boxWidth = $('.ele-live-layout').width() + 14,
                        boxNum = Math.floor(this.accDiv(contentWidth, boxWidth));
                    $('#ele-live-wrap').css({ width: boxNum * (boxWidth) });
                }
            },
            
            pupDiv: function() {
                $("#opRegDiv").on("click", function(e) {
                    e.preventDefault();
                    if ($("#__pup_REG_div").length == 0) {
                        $("body").append("<div id=\"__pup_REG_div\"><div><iframe src=\"common/register/pop\" name=\"_iframe_reg\" scrolling=\"no\" marginwidth=\"0px\" marginwidth=\"0px\" frameborder=\"0\"  samless ></iframe></div></div>");
                        $("#__pup_REG_div").css({ width: "100%", height: "100%", position: "fixed", zIndex: "15", backgroundColor: "rgba(30,30,30,0.5)", left: "0", top: "0" });
                        $("#__pup_REG_div>div").css({ width: "650px", marginLeft: "-325px", height: "568px", marginTop: "-284px", position: "absolute", left: "50%", top: "49%" });
                        $("#__pup_REG_div iframe").css({ width: "100%", height: "100%", margin: "0", display: "block" });
                    } else {
                        $("#__pup_REG_div iframe").attr("src", "common/register/pop");
                    }
                    $("#__pup_REG_div").show();
                });
                $("#opFreePalyDIV").on("click", function(e) {
                    e.preventDefault();
                    if ($("#__pup_REG_div").length == 0) {
                        $("body").append("<div id=\"__pup_REG_div\"><div><iframe src=\"common/register/pop?type=2\" name=\"_iframe_reg\" scrolling=\"no\" marginwidth=\"0px\" marginwidth=\"0px\" frameborder=\"0\"  samless ></iframe></div></div>");
                        $("#__pup_REG_div").css({ width: "100%", height: "100%", position: "fixed", zIndex: "15", backgroundColor: "rgba(30,30,30,0.5)", left: "0", top: "0" });
                        $("#__pup_REG_div>div").css({ width: "650px", marginLeft: "-325px", height: "568px", marginTop: "-284px", position: "absolute", left: "50%", top: "49%" });
                        $("#__pup_REG_div iframe").css({ width: "100%", height: "100%", margin: "0", display: "block" });
                    } else {
                        $("#__pup_REG_div iframe").attr("src", "common/register/pop?type=2");
                    }
                    $("#__pup_REG_div").show();
                });
                $("#money-btn").find("button").on("click",function(){
                	if('logoutBtn'==$(this).attr("id")) {
                		$.ajax({
                            url: "common/login/logout",
                            type: 'post',
                            'timeout': _user_.ajax_timeout,
                            dataType: 'JSON',
                            success: function(results) {
                                if(results.status == "200") {
                                	location.reload();
                                } else {
                                	_alert(results.description);
                                }
                            },
                            error: function(XMLHttpRequest, status) {
                                if (status == 'timeout') {
                                    _alert('系统繁忙,请重新操作!');
                                }
                            }
                        });
                	} else {
                		window.open($(this).attr("href"));
                	}
                });
                $("#user-center").find("li").on("click",function(){
            		window.open($(this).attr("href"));
                });
            },
            
            init: function() {
                // 初始页面 购彩大厅区预设动作
                //this.gameShowHide();
                this.pupDiv();
                newLive.calculateBox();
                $("#live-main-list").mCustomScrollbar({ theme: "minimal" });
                // 缩放视窗
                $(window).resize(function() {
                    newLive.calculateBox();
                });
            }
        };
        newLive.init();
    });
});