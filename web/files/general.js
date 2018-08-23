window._value = {
    bank:{},     //用于保存银行入款返回的 data对象
    pMin:1,      //微信或支付宝支付最小金额
    pMax:10000    //微信或支付宝支付最大金额
};

window.init_event = {
    page:function(){
        // 支付方式 选项卡
        $('.pay-top_1 a').click(function(){
            $('.pay-top_1 a').removeClass();
            $(this).addClass('current')
            $('.deposit-info').find('.pay-info').hide();
            if(  $(this).data("func") )
            {
                //初始化当前页面的事件
                init_event[$(this).data("func")]();
            }

            $('.deposit-info').find('.pay-info').eq( $(this).index() ).show().css("display","block");
            if ($(this).index() == 3 && $(this).data('enable') == 0) {//在线入款不可用
                $('#online_form').hide();
                _alert("暂无线上支付功能");
            } else {
                $('#online_form').show();
            }
        });
    },
    util_depositProcess:function(paramObj,callback,errorBack,always){
        $.ajax({
            type: 'POST',
            url: '/index.php/deposit/depositProcess',
            dataType: 'json',
            data:paramObj,
            success: function (data)
           
            {//成功
            	console.log(data);
                try
                {
                    if ( session_timeout(data) === false )
                    {
                        return false;
                    }
                } catch(e){ console.log(e);}
                if( "ok" == data.Desc )
                {
                    /*data.Records = [{
                        sReceiverAddr:'深圳市',
                        sReceiverName:'李先生',
                        sReceiverBank:'中国银行',
                        sReceiverAccount:'6778762173849012394012903'
                    }];*/
                    if ( callback && typeof (callback) == "function") {
                        callback(data);
                    }
                }
                else
                {
                     //暂无数据
                    if(data.Desc)
                    {
                        _alert(data.Desc);
                    }
                    if ( errorBack && typeof (errorBack) == "function") {
                        errorBack();
                    }
                }
            },
            error: function(XMLHttpRequest,status){
                if ( errorBack && typeof (errorBack) == "function") {
                    errorBack();
                }
            }
        }).always(always);
    },
    util_depositSucess:function(paramObj,callback,errorBack,always){
        $.ajax({
            type: 'POST',
            url: '/index.php/deposit/depositSucess',
            dataType: 'json',
            data:paramObj,
            success: function (data) {//成功
                try
                {
                    if ( session_timeout(data) === false )
                    {
                        alert(data.Desc);
                        return false;
                    }
                } catch(e){ console.log(e);}
                if( "1" == data.status )
                {
                    if ( callback && typeof (callback) == "function") {
                        callback(data);
                    }
                }
                else
                {
                    //暂无数据
                }
            },
            error: function(XMLHttpRequest,status){
                if ( errorBack && typeof (errorBack) == "function") {
                    errorBack();
                }
            }
        }).always(always);
    },
    //银行入款第一步，绑定事件
    bankDeposit:function()
    {
        var div_id = "bankDeposit_div";
        $("#div_1").css("display","block");
        $("#div_2").css("display","none");
        if(  $("#"+div_id).data("initevent") == "true" )
        {
            return;
        }
        $("#"+div_id+" .pay-select>select").bind("change",function(){

            if( ($(this).val().indexOf("其他")||$(this).val().indexOf("other")||!$(this).val()) >= 0 )
            {
                $("#"+div_id+" .pay-select .pay-int").css("display","block");
            }
            else
            {
                $("#"+div_id+" .pay-select .pay-int").css("display","none");
            }
        });
        $("#"+div_id+" [name=\"next_btn\"]").bind("click",function(){
             
            if( $("#"+div_id+" [name=\"next_btn\"]").data("ajax") == "true" )
            {//防止按钮重复点击，导致重复调用接口
               return;
            }
            var userName = $.trim($("#"+div_id+" input[name=\"userName\"]").val());
            var bankName = ( $("#"+div_id+" .pay-select>select").val().indexOf("其他") >= 0 || $("#"+div_id+" .pay-select>select").val().indexOf("请选择") >= 0 )?$.trim($("#"+div_id+" .pay-select>input").val()):$("#"+div_id+" .pay-select>select").val();
            var amount = $.trim( $("#"+div_id+" input[name=\"ipt_money\"]").val() ) ;
            if( "" == userName ){
            	debugger
                _alert("请输入姓名");
                return;
            }
            if( "" == bankName ){
                _alert("请输入开户银行");
                return;
            }
            if( amount == "" || !/^\d{0,12}(?:\.\d{1,2}|)$/.test(amount) ){
                _alert("金额必须大于1，且最多2位小数!");
                return;
            }
            try{
                $("#bank_name_url  button").text( $("#"+div_id+" .pay-select").find("option:selected").val() );
                $("#bank_name_url  button").click(function(){
                    __openWin('other2',$("#"+div_id+" .pay-select").find("option:selected").attr("bankurl"))
                });
            }catch(e){console.log(e);}
            
            
            
            $("#"+div_id+" [name=\"next_btn\"]").data("ajax") == "true";
            
            init_event.util_depositProcess({
                userName:userName,
                bankName:bankName,
                amount:amount,
                type:1,
                payType: ( $("#"+div_id+" .pay-select>select").val().indexOf("其他") >= 0 || $("#"+div_id+" .pay-select>select").val().indexOf("请选择") >= 0 )?4:3
            },function(data){
                _value.bank = data;
                $("#div_1").css("display","none");
                $("#div_2,#div_2_2").css("display","block");
                $("#div_2  #bank_list").html("");
                if( data.Records.length > 0 )
                {
                    for( var b= 0; b< data.Records.length; b++ )
                    {
                        var tempObj = data.Records[b];
                        $("#div_2  #bank_list").append("<div class=\"row\" data-index=\""+b+"\"><input type=\"radio\" name=\"user-name\"><div class=\"bank-mess\"><ul><li><span class=\"bold\">开户行网点：</span>"+tempObj.sReceiverAddr+"</li><li><span class=\"bold\">收款人：</span>"+tempObj.sReceiverName+"</li><li><span class=\"bold\">银行：</span>"+tempObj.sReceiverBank+"</li><li><span class=\"bold\">帐号：</span>"+tempObj.sReceiverAccount+"</li></ul></div></div>" );
                    }
                }
                /*initContentHeight("#div_2");*/
                init_event.bankDeposit_2();
            },function(){
            },function(){ $("#"+div_id+" [name=\"next_btn\"]").data("ajax","false");});
        });
        $("#"+div_id).data("initevent","true");
    },
    //银行入款第二步，绑定事件
    bankDeposit_2:function()
    {
        var div_id = "div_2_2";// "div_2";
        if( $("#"+div_id).data("initevent") == "true" )
        {
            return;
        }
        window.gotoExplain = function(){
            $("#div_iframe>iframe").attr("src","/deposit/explain.html#");
            document.getElementById("div_iframe").style.display = "block";
        };
        $("#"+div_id+" [name=\"back_btn\"]").bind("click",function(){
            $("#div_1").css("display","block");
            $("#div_2").css("display","none");
            initContentHeight("#div_1");
        });
        $("#"+div_id+" [name=\"next_btn\"]").bind("click",function(){
            var arrIndex = $("#"+div_id+" input[name=\"user-name\"]:checked ").parent().data("index");
            if( undefined == arrIndex )
            {
                _alert("请选择银行卡号");
                return;
            }
            else
            {
                _value.bank.arrIndex = parseInt(arrIndex) ;
            }
            $("#div_2_3").css("display","block");
            $("#div_2_2").css("display","none");
           /* initContentHeight("#div_2");*/
            init_event.bankDeposit_3();
        });
        $("#"+div_id).data("initevent","true");
    },
    //银行入款第3步，绑定事件
    bankDeposit_3:function(){
        var div_id = "div_2_3";
        (function initDate(){
            $("#" + div_id + " #daojishi").data("time",15*60);
            window._setInt = setInterval(function(){//倒计时
                var second = parseInt($("#" + div_id + " #daojishi").data("time"))-1 ;
                if( second < 0 )
                {
                    clearInterval(_setInt);
                    return;
                }
                $("#daojishi").data( "time", second );
                var dateStr = (second-60>0) ? ( parseInt(second/60)+":"+((second-parseInt(second/60)*60)>=10?(second-parseInt(second/60)*60):("0"+(second-parseInt(second/60)*60))) ) : (second>=10?second:("0"+second)) ;
                $("#daojishi").html("有效倒计时："+dateStr);
            },1000);
            $( "#"+div_id+" [name=\"sReceiverAddr\"]").text( _value.bank.Records[_value.bank.arrIndex]["sReceiverAddr"] );
            $( "#"+div_id+" [name=\"sReceiverName\"]").text( _value.bank.Records[_value.bank.arrIndex]["sReceiverName"] );
            $( "#"+div_id+" [name=\"bankName\"]").text( _value.bank.Records[_value.bank.arrIndex]["sReceiverBank"] );
            $( "#"+div_id+" [name=\"sReceiverAccount\"]").text( _value.bank.Records[_value.bank.arrIndex]["sReceiverAccount"] );
            $( "#"+div_id+" [name=\"orderId\"]").text( _value.bank.orderId );
            $( "#"+div_id+" input[name=\"userName\"]").val( _value.bank.userName );
            $( "#"+div_id+" input[name=\"orderId\"]").val( _value.bank.orderId );
            $( "#"+div_id+" input[name=\"amount\"]").val( _value.bank.amount );
            //绑定时间控件
            //给日期控件赋上默认值
            function getDateStr( time )
            {
                var date = new Date(parseInt(time));
                return  date.getFullYear()+"-"+((date.getMonth()+1)>=10?(date.getMonth()+1):("0"+(date.getMonth()+1)))+"-"+(date.getDate()>=10?date.getDate():("0"+date.getDate()));
            }
            $("#"+div_id+"  .bt_time").val($("#current_time").val());
            $("#"+div_id+"  .bt_time").datepicker({
                dateFormat:'yy-mm-dd',
                onSelect: function( startDate ) {

                }
            }); //绑定输入框
        })();
        if( $("#"+div_id).data("initevent") == "true" )
        {
            return;
        }
        $("#sReceiverName_copy").click(function(){
            _copy($('#div_2_3 [name="sReceiverName"]').text(),$("#sReceiverName_copy"));
        });
        $("#bankName_copy").click(function(){
            _copy($('#div_2_3 [name="bankName"]').text(),$("#bankName_copy"));
        });
        $("#sReceiverAccount_copy").click(function(){
            _copy($('#div_2_3 [name="sReceiverAccount"]').text(),$("#sReceiverAccount_copy"));
        });
        $("#orderId_copy").click(function(){
            _copy($('#div_2_3 tbody [name="orderId"]').text(),$("#orderId_copy"));
        });
        //时间下拉填充html
        (function(){
             var str ="";
             var new_timestamp =  parseInt($("#current_time").val())+1000;
             var date = new Date(new_timestamp);
            for( var a = 0; a < 24 ; a++)
            {
                if( a== date.getHours() )
                {
                    str +="<option selected>"+(a<10?("0"+a):a)+"</option>" ;
                }
                else
                {
                   str +="<option>"+(a<10?("0"+a):a)+"</option>" ; 
                }
            }
            $("#bank-order-time  [name=\"hour\"]").html(str);
             var mins = "";
            for( var b = 0; b < 60; b++)
            {
                if( b == date.getMinutes())
                {
                    mins +="<option selected>"+(b<10?("0"+b):b)+"</option>" ;
                }
                else
                {
                   mins +="<option>"+(b<10?("0"+b):b)+"</option>" ; 
                }
            }
            $("#bank-order-time  [name=\"minutes\"]").html(mins);
        })();

        $("#div_2_3  [name=\"back_btn\"]").bind("click",function(){
            $("#div_2_3").css("display","none");
            $("#div_2_2").css("display","block");
            initContentHeight("#div_2");
        });
        $("#"+div_id+" [name=\"submit\"]").bind("click",function(){
            if(  $("#"+div_id+" [name=\"submit\"]").data("ajax") == "true" )
            {//防止按钮重复点击，导致重复调用接口
                return;
            }
            if( parseInt( $("#daojishi").data("time") ) <= 0 )
            {
                _alert("已超时，请刷新页面重试");
                return;
            }
            var amount = $.trim( $( "#"+div_id+" input[name=\"amount\"]").val() ) ;
            var userName =  $.trim( $( "#"+div_id+" input[name=\"userName\"]").val() ) ;
            var payType =  $("#"+div_id+" input[name=\"order-pay\"]:checked ").val();
            _value.bank.payTypeName =  $("#"+div_id+" input[name=\"order-pay\"]:checked ").parent().text() ;
            if( !/^\d{0,12}(?:\.\d{1,2}|)$/.test(amount) ){
                _alert("金额必须大于1，且最多2位小数!");
                return;
            }
            if( amount < _value.bank.Records[ _value.bank.arrIndex]["fPayMin"] || amount > _value.bank.Records[ _value.bank.arrIndex]["fPayMax"]   )
            {
                _alert("存入金额输入有误，不能大于"+_value.bank.Records[ _value.bank.arrIndex]["fPayMax"]+"，  且不能小于"+_value.bank.Records[ _value.bank.arrIndex]["fPayMin"]);
                return;
            }
            if("" == userName )
            {
                _alert("请输入存入人姓名");
                return;
            }
            if( !payType )
            {
                _alert("请输选择存款方式");
                return;
            }
            $("#"+div_id+" [name=\"submit\"]").data("ajax","true");
            _value.bank.amount = amount;
            _value.bank.userName = userName;
            init_event.util_depositSucess({
                userName:userName,
                orderId:_value.bank.orderId,
                amount:amount,
                saveTime:$("#"+div_id+" .bt_time").val()+" "+$("#"+div_id+" [name=\"hour\"]").val()+":"+$("#"+div_id+" [name=\"minutes\"]").val()+":00",
                saveType:payType,
                payKey:_value.bank.Records[_value.bank.arrIndex]["sPayKey"]
            },function(data){
                $("#"+div_id+" [name=\"submit\"]").data("ajax","false");
                if( "1" == data.status )//成功
                {
                    $("#div_2_4").css("display","block");
                    $("#div_2_3").css("display","none");
                    var div_id = "div_2_4";
                    var sReceiverAccount = _value.bank.Records[_value.bank.arrIndex]["sReceiverAccount"];
                    $( "#"+div_id+" [name=\"cunru\"]").text( _value.bank.Records[_value.bank.arrIndex]["sReceiverAddr"]+"/"+_value.bank.Records[_value.bank.arrIndex]["sReceiverName"]+"/"+("****"+ sReceiverAccount.substr( sReceiverAccount.length-5, sReceiverAccount.length-1 ) )  );
                    $( "#"+div_id+" [name=\"bankName\"]").text( _value.bank.Records[_value.bank.arrIndex]["sReceiverBank"] );
                    $( "#"+div_id+" [name=\"userName\"]").text( _value.bank.userName );
                    $( "#"+div_id+" [name=\"orderId\"]").text( _value.bank.orderId );
                    $( "#"+div_id+" [name=\"amount\"]").text( _value.bank.amount );
                    $( "#"+div_id+" [name=\"payTypeName\"]").text( _value.bank.payTypeName );
                    $( "#"+div_id+" [name=\"cunruShijian\"]").text($("#div_2_3 .bt_time").val()+" "+$("#div_2_3 [name=\"hour\"]").val()+":"+$("#div_2_3 [name=\"minutes\"]").val());
                    //initContentHeight("#div_2"); // 重新赋值高度
                }
                else
                {
                    _alert("操作失败");
                }
            },function(){},function(){
                $("#"+div_id+" [name=\"submit\"]").data("ajax","false");
            });
        });

        $("#"+div_id).data("initevent","true");
    },
    //在线入款提交表单。gate
    onlineSubmit:function(){
        var userName = $.trim($("#online_username").val());
        var bankName = $("#online_form select").val();
        if(!bankName || (bankName.indexOf("其他")>=0) || (bankName.indexOf("请选择")>=0)){
            bankName="";
        }
        var amount = $.trim($("#online_money").val());
        if( "" == userName ){
            _alert("请输入姓名");
            return;
        }
        if("" == amount){
            _alert("请输入金额");
            return;
        }
        if("" == bankName){
            _alert("请选择银行");
            return;
        }
        if("" == amount){
            _alert("请输入金额");
            return;
        }
        if( !/^\d{0,12}(?:\.\d{1,2}|)$/.test(amount) ){
            _alert("金额必须大于0，且最多2位小数!");
            return;
        }
        var orginal_url = $(document.getElementById('online_form')).attr("action");
        var payId = $("#payId").val();
        $(document.getElementById('online_form')).attr("action",orginal_url+"?money="+amount+"&bankCode="+bankName+'&payId='+payId);
    	document.getElementById('online_form').submit();
        $(document.getElementById('online_form')).attr("action",orginal_url);
    },
    //微信支付第一步，绑定事件
    weChatDeposit_1:function()
    {
        var div_id = "wechat_step1";
        if(  $("#"+div_id).data("initevent") == "true" )
        {//已经绑定过的事件无需重复绑定
            return;
        }
        function bind_event(div_id)
        {
            //输入框格式校验
            $("#"+div_id+" input").bind("blur",function(event)
            {
                var v=parseFloat($(this).val());
                if(!v||isNaN(v)){v='';}
                $(this).val(v);
            });
            //下一步
            $("#"+div_id+" [name=next_btn]").bind("click",function(){
                var arrIndex = parseInt($(this).data("index"));
                var block_name = "block_"+arrIndex;
                var partSlt = "#"+div_id+" [name="+block_name+"]";
                if( $(this).data("ajax") == "true" )
                {//禁止因网速过慢的表单重复提交
                    return;
                }
                var amount = $.trim($(partSlt+" [name=\"amount\"]").val());
                if( "" == amount ){
                    _alert("请输入金额");
                    return;
                }
                if(isNaN(parseFloat(amount)))
                {
                    _alert("请输入正确的金额");
                    return;
                }
                if( !/^\d{0,12}(?:\.\d{1,2}|)$/.test(amount) )
                {
                    _alert("最多2位小数!");
                    return;
                }
                var payid =  wechat_step1_key[arrIndex].iPayID ;
                $.ajax({
                    type: 'GET',
                    url: '/deposit/getWechatPayInfo.html',
                    dataType: 'json',
                    beforeSend:function(){
                        $(partSlt+" [name=next_btn]").data("ajax","true");
                        $(partSlt+" [name=next_btn]").text("请稍后");
                    },
                    data:{
                        flag:wechat_step1_key[arrIndex].iFlag,
                        payid:payid,
                        money:amount
                    }
                }).done(function(data){
                    try
                    {
                        if ( session_timeout(data) === false )
                        {
                            return false;
                        }
                    } catch(e){ console.log(e);}
                    if( data.Desc != "OK" )
                    {
                        _alert(data.Desc);
                        return;
                    }
                    if( wechat_step1_key[arrIndex].iFlag == "1" || wechat_step1_key[arrIndex].iFlag == "3")  // 1 表示 直接扫码支付
                    {
                        (function initdata(data){
                            var div_id = "wechat_step2_scan";
                            $("#"+div_id+" [name=orderId]").text( data.sOrderId );
                            $("#"+div_id+" [name=amount]").text( data.fAmount || data.money );
                            if(data.iNeedDown == '1'){
                                $("#"+div_id+" [name=pay_code_img]").attr("src",data.sPayUrl);
                            }else{
                                $("#"+div_id+" [name=pay_code_img]").attr("src","/deposit/getImg.html?imgurl="+data.sPayUrl);
                            }
                            $("#"+div_id+" [name=pay_code_img]").error(function(){
                                _alert("请返回上一步重试<br>(当前网络忙，可能需要多试几次)");
                            });
                        })(data);
                        $("#wechat_step2_scan").show();
                        init_event.weChatDeposit_2_scan();
                    }
                    else
                    {   // 表示 扫码添加好友，通过好友支付
                        (function initdata(data){
                            window.wechat_addF_data = data ;
                            var div_id = "wechat_step2_addF";
                            $("#"+div_id+" [name=amount]").val(  data.fAmount || data.money );
                            $("#"+div_id+" [name=sWechatID]").text( data.sWechatID );
                            $("#"+div_id+" [id=wxName]").text( data.sWechatName );
                            $("#"+div_id+" [name=pay_code_img]").attr("src","/deposit/getImg.html?needchk=1&imgurl="+data.sPayUrl);
                            $("#"+div_id+" [name=pay_code_img]").error(function(){
                                _alert("请返回上一步重试<br>(当前网络忙，可能需要多试几次)");
                            });
                        })(data);
                        $("#wechat_step2_addF").show();
                        init_event.weChatDeposit_2_addF();
                    }
                    $("#wechat_step1").hide();
                }).always(function(){
                    $(partSlt+" [name=next_btn]").data("ajax","false");
                    $(partSlt+" [name=next_btn]").text("下一步");
                });
            });
            //输入框格式校验
            if( $("#wechat_step1 input").length > 0 )
            {
                function jy(event){
                    var e = event || window.event || arguments.callee.caller.arguments[0];
                    var keycode = e.keyCode;
                    if ( (keycode < 48 && keycode != 8 && keycode != 0 && keycode != 13 && keycode != 9 && keycode != 46 ) || (keycode > 57 && keycode != 190 && keycode != 110 &&(keycode>105||keycode<96 ) ))
                    {
                        try{if(event.preventDefault){event.preventDefault();}else{event.returnValue = false;}}catch(e){}
                        return false;
                    }
                }
                $("#wechat_step1 input").get(0).onkeydown = jy;
            }
        }
        //返回账号列表
/*         $.ajax({
            type: 'GET',
            url: '/deposit/newGetWeichatList.html',
            dataType: 'json'
        }).done(function (data)
        {
            window.wechat_step1_key = data;
            try
            {
                if(wechat_step1_key.length == 0)
                {
                    $("#"+div_id).hide();
                    _alert("暂无微信支付功能");
                    return;
                }
                var lth = wechat_step1_key.length ;
                function getHtmlStr(payName,payDesc,arrIndex)
                {
                    return "<div name=\"block_"+arrIndex+"\" class=\"wechat-top\"><div class=\"wechat-tit text-center\">"+payName+"</div><p class=\"text-center\">"+payDesc+"</p><div class=\"wechat-recharge\"><span>充值金额：</span><input name=\"amount\" class=\"wechat-int\" maxlength=\"14\"><a name=\"next_btn\" data-index=\""+arrIndex+"\" class=\"btn fr\">下一步</a></div></div>";
                }
                $("#"+div_id+" [name=step_one_list]").empty();
                for( var i = 0 ; i < lth ; i++ )
                {
                    var o = wechat_step1_key[i];
                    $("#"+div_id+" [name=step_one_list]").append( getHtmlStr(o.sPayName,o.sPayDesc,i) );
                }
                bind_event("wechat_step1");
            }catch(e)
            {
                $("#"+div_id).hide();
                _alert("暂无微信支付功能");
            }
        }); */
        $("#"+div_id).data("initevent","true");//标志已经绑定过事件
    },
    //微信支付第2步(扫码直接支付)，绑定事件
    weChatDeposit_2_scan:function()
    {
        var div_id = "wechat_step2_scan";
        if(  $("#"+div_id).data("initevent") == "true" )
        {
            return;
        }
        //复制按钮
        $("#wx_Pay").click(function(){
        	_copy($("#orderId_2_s").text(),$("#wx_Pay"));
        })
        //上一步
        $("#"+div_id+" [name=\"back_btn\"]").click(function(){
            $('#wechat_step1').show();
            $('#wechat_step2_scan').hide();
        });
        $("#"+div_id).data("initevent","true");
    },
    //微信支付第2步（添加朋友支付），绑定事件
    weChatDeposit_2_addF:function()
    {
        var div_id = "wechat_step2_addF";
        if(  $("#"+div_id).data("initevent") == "true" )
        {
            return;
        }
        //复制按钮        
        //时间下拉填充html
        (function(){
             $("#wxName_copy").click(function(){
             _copy($("#wxName").text(),$("#wxName_copy"));
             });
             $("#sWechatID_copy").click(function(){
             _copy($("#sWechatID").text(),$("#sWechatID_copy"));
             });
            var str ="";
            var new_timestamp =  parseInt($("#current_time").val())+1000;
            var date = new Date(new_timestamp);
            for( var a = 0; a < 24 ; a++)
            {
                if( a== date.getHours() )
                {
                    str +="<option selected>"+(a<10?("0"+a):a)+"</option>" ;
                }
                else
                {
                    str +="<option>"+(a<10?("0"+a):a)+"</option>" ;
                }
            }
            $("#"+div_id+" [name=\"hour\"]").html(str);
            var mins = "";
            for( var b = 0; b < 60; b++)
            {
                if( b == date.getMinutes())
                {
                    mins +="<option selected>"+(b<10?("0"+b):b)+"</option>" ;
                }
                else
                {
                    mins +="<option>"+(b<10?("0"+b):b)+"</option>" ;
                }
            }
            $("#"+div_id+"  [name=minutes]").html(mins);
            //给日期控件赋上默认值
            function getDateStr( time )
            {
                var date = new Date(parseInt(time));
                return  date.getFullYear()+"-"+((date.getMonth()+1)>=10?(date.getMonth()+1):("0"+(date.getMonth()+1)))+"-"+(date.getDate()>=10?date.getDate():("0"+date.getDate()));
            }
            $("#"+div_id+" [name=date]").val($("#current_time").val());
            $("#"+div_id+" [name=date]").datepicker({
                dateFormat:'yy-mm-dd',
                onSelect: function( startDate ) {}
            }); //绑定输入框

        })();
        //上一步
        $("#"+div_id+" [name=\"back_btn\"]").click(function(){
            $('#wechat_step1').show();
            $('#wechat_step2_addF').hide();
        });
        $("#"+div_id+" [name=submit]").click(function(){
            $.ajax({
                type: 'POST',
                url: '/deposit/ajaxPay.html',
                data:{payid:wechat_addF_data.sPayId,oid:wechat_addF_data.sOrderId,money:wechat_addF_data.fAmount},
                dataType: 'json'
            }).done(function (data)
            {
                if( data.hasOwnProperty("Desc") && data.Desc == "OK" )
                {
                    _alert("提交成功");
                }
            });
        });
        $("#"+div_id).data("initevent","true");
    },
    //支付宝 支付第一步
    baoDeposit_1:function()
    {
        var div_id = "bao_step1";
        if(  $("#"+div_id).data("initevent") == "true" )
        {//已经绑定过的事件无需重复绑定
            return;
        }
        function bind_event(div_id)
        {
            //输入框格式校验
            $("#"+div_id+" input").bind("blur",function(event)
            {
                var v=parseFloat($(this).val());
                if(!v||isNaN(v)){v='';}
                $(this).val(v);
            });
            //下一步
            $("#"+div_id+" [name=next_btn]").bind("click",function(){
                var arrIndex = parseInt($(this).data("index"));
                var block_name = "block_"+arrIndex;
                var partSlt = "#"+div_id+" [name="+block_name+"]";
                if( $(this).data("ajax") == "true" )
                {//禁止因网速过慢的表单重复提交
                    return;
                }
                var amount = $.trim($(partSlt+" [name=\"amount\"]").val());
                if( "" == amount ){
                    _alert("请输入金额");
                    return;
                }
                if(isNaN(parseFloat(amount)))
                {
                    _alert("请输入正确的金额");
                    return;
                }
                if( !/^\d{0,12}(?:\.\d{1,2}|)$/.test(amount) )
                {
                    _alert("金额最多2位小数!");
                    return;
                }
                var payid =  bao_step1_key[arrIndex].iPayID ;
                $.ajax({
                    type: 'GET',
                    url: '/deposit/getAliPayInfo.html',
                    dataType: 'json',
                    beforeSend:function(){
                        $(partSlt+" [name=next_btn]").data("ajax","true");
                        $(partSlt+" [name=next_btn]").text("请稍后");
                    },
                    data:{
                        flag:bao_step1_key[arrIndex].iFlag,
                        payid:payid,
                        money:amount
                    }
                }).done(function(data){
                    try
                    {
                        if ( session_timeout(data) === false )
                        {
                            return false;
                        }
                    } catch(e){ console.log(e);}
                    if( data.Desc != "OK" )
                    {
                        _alert(data.Desc);
                        return;
                    }
                    if( bao_step1_key[arrIndex].iFlag == "1" )
                    {
                        (function initdata(data){
                            var div_id = "bao_step2_scan";
                            $("#"+div_id+" [name=orderId]").text( data.sOrderId );
                            $("#"+div_id+" [name=amount]").text( data.fAmount || data.money );
                            $("#"+div_id+" [name=pay_code_img]").attr("src","/deposit/getImg.html?imgurl="+data.sPayUrl);
                            $("#"+div_id+" [name=pay_code_img]").error(function(){
                                _alert("请返回上一步重试<br>(当前网络忙，可能需要多试几次)");
                            });
                            $("#"+div_id).show();
                        })(data);
                        init_event.baoDeposit_2_scan();
                    }
                    else
                    {
                        (function initdata(data){
                            window.bao_addF_data = data ;
                            var div_id = "bao_step2_addF";
                            $("#"+div_id+" #bao_2_a_name").text(  data.sWechatName );
                            $("#"+div_id+" #bao_2_a_oid").text( data.sWechatID );
                            $("#"+div_id+" [name=amount]").val(  data.fAmount || data.money );
                            $("#"+div_id+" [name=pay_code_img]").attr("src","/deposit/getImg.html?needchk=1&imgurl="+data.sPayUrl);
                            $("#"+div_id+" [name=pay_code_img]").error(function(){
                                _alert("请返回上一步重试<br>(当前网络忙，可能需要多试几次)");
                            });
                            $("#"+div_id).show();
                        })(data);
                        init_event.baoDeposit_2_addF();
                    }
                    $("#bao_step1").hide();
                }).always(function(){
                    $(partSlt+" [name=next_btn]").data("ajax","false");
                    $(partSlt+" [name=next_btn]").text("下一步");
                });
            });
            //输入框格式校验
            if( $("#bao_step1 input").length > 0 )
            {
                function jy(event){
                    var e = event || window.event || arguments.callee.caller.arguments[0];
                    var keycode = e.keyCode;
                    if ( (keycode < 48 && keycode != 8 && keycode != 0 && keycode != 13 && keycode != 9 && keycode != 46 ) || (keycode > 57 && keycode != 190 && keycode != 110 &&(keycode>105||keycode<96 ) ))
                    {
                        try{if(event.preventDefault){event.preventDefault();}else{event.returnValue = false;}}catch(e){}
                        return false;
                    }
                }
                $("#bao_step1 input").get(0).onkeydown = jy;
            }
        }
        //返回账号列表
        $.ajax({
            type: 'GET',
            url: '/deposit/newGetAliPayList.html',
            dataType: 'json'
        }).done(function (data)
        {
            window.bao_step1_key = data;
            try
            {
                var lth = bao_step1_key.length ;
                if( lth == 0)
                {
                    $("#"+div_id).hide();
                    _alert("暂无支付宝支付功能");
                    return;
                }
                function getHtmlStr(payName,payDesc,arrIndex)
                {
                    return "<div name=\"block_"+arrIndex+"\" class=\"wechat-top\"><div class=\"wechat-tit text-center\">"+payName+"</div><p class=\"text-center\">"+payDesc+"</p><div class=\"wechat-recharge\"><span>充值金额：</span><input name=\"amount\" class=\"wechat-int\" maxlength=\"14\"><a name=\"next_btn\" data-index=\""+arrIndex+"\" class=\"btn fr\">下一步</a></div></div>";
                }
                $("#"+div_id+" [name=step_one_list]").empty();
                for( var i = 0 ; i < lth ; i++ )
                {
                    var o = bao_step1_key[i];
                    $("#"+div_id+" [name=step_one_list]").append( getHtmlStr(o.sPayName,o.sPayDesc,i) );
                }
                bind_event("bao_step1");
            }catch(e)
            {
                $("#"+div_id).hide();
                _alert("暂无微信支付功能");
            }
        });
        $("#"+div_id).data("initevent","true");//标志已经绑定过事件
    },
    baoDeposit_2_scan:function()
    {
        var div_id = "bao_step2_scan";
        if(  $("#"+div_id).data("initevent") == "true" )
        {
            return;
        }
        $("#bao_2_oid_s_copy").click(function(){
            _copy($("#bao_2_oid_s").text(),$("#bao_2_oid_s_copy"));
        });
        //复制按钮
        //上一步
        $("#"+div_id+" [name=\"back_btn\"]").click(function(){
            $('#bao_step1').show();
            $('#bao_step2_scan').hide();
        });
        $("#"+div_id).data("initevent","true");
    },
    //支付宝 支付第2步
    baoDeposit_2_addF:function()
    {
        var div_id = "bao_step2_addF";
        if(  $("#"+div_id).data("initevent") == "true" )
        {
            return;
        }

        //时间下拉填充html
        (function(){
            $("#bao_2_a_name_copy").click(function(){
                _copy($("#bao_2_a_name").text(),$("#bao_2_a_name_copy"));
            });
            $("#bao_2_a_oid_copy").click(function(){
                _copy($("#bao_2_a_oid").text(),$("#bao_2_a_oid_copy"));
            });
            var str ="";
            var new_timestamp =  parseInt($("#current_time").val())+1000;
            var date = new Date(new_timestamp);
            for( var a = 0; a < 24 ; a++)
            {
                if( a== date.getHours() )
                {
                    str +="<option selected>"+(a<10?("0"+a):a)+"</option>" ;
                }
                else
                {
                    str +="<option>"+(a<10?("0"+a):a)+"</option>" ;
                }
            }
            $("#"+div_id+" [name=\"hour\"]").html(str);
            var mins = "";
            for( var b = 0; b < 60; b++)
            {
                if( b == date.getMinutes())
                {
                    mins +="<option selected>"+(b<10?("0"+b):b)+"</option>" ;
                }
                else
                {
                    mins +="<option>"+(b<10?("0"+b):b)+"</option>" ;
                }
            }
            $("#"+div_id+"  [name=minutes]").html(mins);
            //给日期控件赋上默认值
            function getDateStr( time )
            {
                var date = new Date(parseInt(time));
                return  date.getFullYear()+"-"+((date.getMonth()+1)>=10?(date.getMonth()+1):("0"+(date.getMonth()+1)))+"-"+(date.getDate()>=10?date.getDate():("0"+date.getDate()));
            }
            $("#"+div_id+" [name=date]").val($("#current_time").val());
            $("#"+div_id+" [name=date]").datepicker({
                dateFormat:'yy-mm-dd',
                onSelect: function( startDate ) {}
            }); //绑定输入框

        })();
        //上一步
        $("#"+div_id+" [name=\"back_btn\"]").click(function(){
            $('#bao_step1').show();
            $('#bao_step2_addF').hide();
        });
        $("#"+div_id+" [name=submit]").click(function(){
            $.ajax({
                type: 'POST',
                url: '/deposit/ajaxPay.html',
                data:{payid:bao_addF_data.sPayId,oid:bao_addF_data.sOrderId,money:bao_addF_data.fAmount,type:"alipay"},
                dataType: 'json'
            }).done(function (data)
            {
                if( data.hasOwnProperty("Desc") && data.Desc == "OK" )
                {
                    _alert("提交成功");
                }
            });
        });
        $("#"+div_id).data("initevent","true");
    }
};

$(function(){
    init_event.page();
    $('.pay-top_1 a:first-child').trigger("click");
    $("#wechat_step1 input , #bao_step1 input").bind("click",function()
    {
        if( typeof (_canclick)!="undefined" && _canclick === false )
        {
            try{if(event.preventDefault){event.preventDefault();}else{event.returnValue = false;}}catch(e){}
        }
    }).bind("focus",function()
    {
        if( typeof (_canclick)!="undefined" && _canclick === false )
        {
            try{if(event.preventDefault){event.preventDefault();}else{event.returnValue = false;}}catch(e){}
        }
    });
});

