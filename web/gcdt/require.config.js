var _prefixURL={
    common:"assets/statics/images/common",
    statics:"assets/statics/images",
    plugins:"assets/js/plugins"
};
var _gameObj={};
try{
    _gameObj=gameObj;
}catch(e){
    _gameObj.HK6="tm";
    _gameObj.PLAY="";
    _gameObj.lotteryType="SSC";
}
requirejs.config({ //配置
    baseUrl: 'assets/js/application',
    paths: {
        jquery: 'https://cp89001.com/assets/js/plugins/jquery/jquery.min',
        jqueryui:'https://cp89001.com/assets/js/plugins/jqueryui/jquery-ui.min',//jqui的拖拽插件
        dialog:'https://cp89001.com/assets/js/plugins/dialog/jquery.dialogUI',//弹窗和拖拽js
        layer: 'https://cp89001.com/assets/js/plugins/layer/layer.min',//弹窗
        scrollbar:'https://cp89001.com/assets/js/plugins/scrollbar/jquery.mCustomScrollbar.concat.min',//滚动插件
        slide:'https://cp89001.com/assets/js/plugins/slide/jquery.slide',//轮播
        user:'https://cp89001.com/assets/js/plugins/user/user',
        common:'https://cp89001.com/assets/js/plugins/common/common',
        main:'https://cp89001.com/assets/js/plugins/common/main',//tab切换
        datePicker:'https://cp89001.com/assets/js/plugins/datePicker/datePicker',//时间控件
        zclip:'https://cp89001.com/assets/js/plugins/zclip/jquery.zclip',//复制
        laypage:'https://cp89001.com/assets/js/plugins/laypage/laypage',//分页
        qrcode:'https://cp89001.com/assets/js/plugins/qrcode/jquery.qrcode',
        qrutf:'https://cp89001.com/assets/js/plugins/qrcode/utf',
        //以下为各个使用的js
        firstLOT:'https://cp89001.com/assets/js/plugins/common/first'+_gameObj.lotteryType,//lottery的滑块和角分厘切换
        elevenGame:'https://cp89001.com/assets/js/plugins/elevenGame/elevenGame',//eleven特有插件
        game0:'https://cp89001.com/assets/js/plugins/common/game0',
        game2:'https://cp89001.com/assets/js/plugins/common/game2',
        game4:'https://cp89001.com/assets/js/plugins/common/game4',
        templateLOT:'https://cp89001.com/assets/js/plugins/common/template'+_gameObj.lotteryType,//模板，默认时时彩
        handlebars:'https://cp89001.com/assets/js/plugins/sixlottery/handlebars',//模板引擎
        easyDrag:'https://cp89001.com/assets/js/plugins/sixlottery/jquery.easyDrag',//拖拽
        sixlottery:'https://cp89001.com/assets/js/plugins/sixlottery/sixlottery',
        sixbetHK6:'https://cp89001.com/assets/js/plugins/sixlottery/sixbet-'+_gameObj.HK6,
        sixbet:'https://cp89001.com/assets/js/plugins/sixlottery/sixbet',
        sixCom:'https://cp89001.com/assets/js/plugins/sixlottery/six-com',
        
        lottery:'https://cp89001.com/assets/js/plugins/lottery/lottery',
        betPLAY:'https://cp89001.com/assets/js/plugins/lottery/' + _gameObj.lotteryType + '/bet-' + _gameObj.PLAY,
        bet:'https://cp89001.com/assets/js/plugins/lottery/bet',
        betCom:'https://cp89001.com/assets/js/plugins/lottery/bet-com'
    },
    urlArgs: "v=1.5",
    shim:{
    	jqueryui:["jquery","css!https://cp89001.com/assets/js/plugins/jqueryui/jquery-ui.min.css"],
        dialog:["jquery","css!https://cp89001.com/assets/js/plugins/dialog/dialog.css"],
        layer:{
    		deps:[
    		"jquery",
    		'css!https://cp89001.com/assets/js/plugins/layer/skin/layer.css'
    		],
    		exports:"layer"
    	},
        scrollbar:["jquery","css!https://cp89001.com/assets/js/plugins/scrollbar/jquery.mCustomScrollbar.css"],
        slide:["jquery"],
        user:["jquery",'css!https://cp89001.com/assets/js/plugins/user/tip.css'],
        common:["jquery","dialog"],
        main:["jquery","scrollbar"],
        zclip:["jquery"],
        laypage:{
            deps:["jquery",'css!https://cp89001.com/assets/js/plugins/laypage/laypage.css'],
            exports:"laypage"
        },
        qrcode:["jquery", "qrutf"],
        datePicker:["jquery",'css!https://cp89001.com/assets/js/plugins/datePicker/datePicker.css'],
        //以下为各个使用的js
        firstLOT:["jquery"],
        elevenGame:["jquery"],
        game0:["jquery","jqueryui","common"],
        game2:["jquery","jqueryui","common"],
        game4:["jquery","jqueryui","common"],
        easyDrag:["jquery"],
        
        sixCom:["jquery"],
        sixlottery:["jquery","scrollbar","easyDrag"],
        sixbetHK6:["jquery","handlebars","sixCom"],
        sixbet:["jquery","handlebars","sixbetHK6"],
        
        lottery:["jquery","scrollbar","easyDrag"],
        betPLAY:["jquery","handlebars","betCom"],
        bet:["jquery", "betCom"]
    },
    map: {
        '*': {
            'css': '../require-css/css'
        }
    }
});