function gamed_selected(bet,gameId) {
    if(bet == null || bet == '' || bet == 'undefined'){
        return false;
    }
    var tyz = getCookie("tyz");
    if(tyz > 1){
        return false;
    }
    tyz = parseInt(tyz)+1;
    setCookie("tyz",tyz);
    var strs = new Array(); //定义一数组
    strs = bet.split("|"); //字符分割
    switch(gameId){
        case "12":
            var num_select = $('#num-select');
            num_select.children('div').children('div').each(function (j,b) {
                $(b).find('input').each(function (n,t) {
                    var a = $(t).val();
                    if(a.length == 1){
                        a = "0"+a;
                    }

                    var b = strs[j];
                    if(b.length == 1){
                        b = "0"+b;
                    }
                    if(a == b){
                        $(t).addClass('checked');////C38/web/skin/main/game.js
                    }
                });
            });
            break;
        case "9":
            var tyz_load = getCookie("tyz_load");
            if(tyz_load == 1){

            }else {
                var yy = $('.game-btn').find('a').eq(2);
                $('.game-btn2').load($(yy).attr('href'), function(){
                    $(yy).closest('.game-btn').find('.current').removeClass('current');
                    $(yy).closest('div').addClass('current');
                    $('.game-btn2 a[href]:first').trigger('click');
                    setCookie("tyz_load",1);
                });
            }
            var num_select = $('#num-select');
            num_select.children('div').each(function (j,b) {
                $(b).find('input').each(function (n,t) {
                    var a = $(t).val();
                    if(a.length == 1){
                        a = "0"+a;
                    }

                    var b = strs[j];
                    if(b.length == 1){
                        b = "0"+b;
                    }
                    if(a == b){
                        $(t).addClass('checked');////C38/web/skin/main/game.js
                    }
                });
            });
            break;
        default:
            var num_select = $('#num-select');
            num_select.children('div').each(function (j,b) {
                $(b).find('input').each(function (n,t) {
                    var a = $(t).val();
                    if(a.length == 1){
                        a = "0"+a;
                    }

                    var b = strs[j];
                    if(b.length == 1){
                        b = "0"+b;
                    }
                    if(a == b){
                        $(t).addClass('checked');////C38/web/skin/main/game.js
                    }
                });
            });
            break;
    }
}

/**
 * 添加投注--随机一注
 */
function gameActionAddCode_random() {
    //奖金返点限制[如奖金模式在1920以下才能购买分模式(返点大于最大返点-11)]
    //代理不能买单
    if ($('#wjdl')) {
        if (parseInt($('#wjdl').val()) > 0) {
            $.alert('代理不能买单');
            return false;
        }
    }
    var modeName = {
            '2.000': '元',
            '0.200': '角',
            '0.020': '分',
            '0.002': '厘'
        },
        $mode = $('.danwei.dwon'),
        $slider = $("#basic_slider"),
        fanDian = gameGetFanDian(),
        modeFanDian = $mode.data().maxFanDian,
        userFanDian = $slider.attr('fan-dian'),
        mode = $mode.attr("value");

        //var playid = $('.game-btn2 a[href]').attr('data_id');
        var playid = $('.game-btn2 .current a[href]').attr('data_id');
        //console.log(playid);
    if (userFanDian - fanDian > modeFanDian) {
        var pl = $('#fandian-value').data(),
            _amount = (pl.maxpl - pl.minpl) / $slider.attr('game-fan-dian') * modeFanDian + (pl.minpl - 0);
        $.alert(modeName[mode] + '模式最大奖金只能为' + _amount.toFixed(2));
        return false;
    }
    // 单笔中奖限额
    var maxZjAmount = $slider.data().betZjAmount;

    if (maxZjAmount) {
        if ($('#fandian-value').data('pl') * mode / 2 * ($('#beishu').val() || 1) > maxZjAmount) {
            $.alert('单笔中奖奖金不能超过' + maxZjAmount + '元');
            return false;
        }
    }

    var a = tzSscZuWeiInput_selected();

    var actionData = '';
    $.ajax({
        url: '/index.php/Random/getlotteryrandom',
        type: 'GET',
        dataType: 'json',
        //async: false,
        data: {
            'playid' : playid,
            'weiShu' :a
        },
        timeout: 30000,
        success: function (result) {
            var obj = $.parseJSON(result);
            try {
                var maxBetCount = $slider.data().betCount;
                if (maxBetCount && obj.actionNum > maxBetCount) {
                    $.alert('单笔投注注数最大不能超过' + maxBetCount + '注');
                    return false;
                }
                if (typeof obj != 'object') {
                    throw ('未知出错');
                } else {
                    gameAddCode(obj);
                }
            } catch(err) {
                $.alert(err);
            }
        }
    });
}

/*时时彩录入式组选位数投注*/
function tzSscZuWeiInput_selected() {
    var weiShu = [];
    $('#wei-shu :checkbox').each(function(i,n) {
        if ($(n).attr('checked') == 'checked') weiShu.push($(n).val());
    });
    return weiShu.join(",");
}