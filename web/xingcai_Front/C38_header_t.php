<!DOCTYPE html>
<!--  -->
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="referrer" content="always">
    <meta name="referrer" content="unsafe-url">
    <meta name="renderer" content="webkit">

    <title>喜羊羊彩</title>

    <link type="text/css" rel="stylesheet" href="/files/_home.css">
    <link type="text/css" rel="stylesheet" href="/files/_tip.css">
    <link type="text/css" rel="stylesheet" href="/files/style.css">
    <!-- 主页独立的css -->
    <link type="text/css" rel="stylesheet" href="/files/index.css">
    <!--[if lte IE 8]><style>.ie-alert-bg,.ie-alert-wrap { display:block!important;}</style><![endif]-->
    <!--[if lte IE 7]><style>.ie-alert-bg,.ie-alert-wrap { display:block!important;}</style><![endif]-->
    <!--[if lte IE 6]><style>.ie-alert-bg,.ie-alert-wrap { display:block!important;}</style><![endif]-->
    <script>
        try {
            //下面是静态资源url的前缀
            if(typeof(_prefixURL) != "object") {
                window._prefixURL = {
                    statics: "/sscp/statics",
                    common: "/common/statics"
                };
            }
        } catch(e) {console.log(e);}
        try {
            //注：下一行代码毋删除，或重复定义，或在其他文件出现一样的代码 ,也不要在其他文件定义window.name（  __openWin 方法会用到这个变量）
            if(!window.opener) {
                window.name = "wn_1_home_first";
            } else if(window.name != "wn_1_home_first") {
                window.name = "wn_1_home_first";
            }
        } catch(e) {console.log(e);}
    </script>
    <!--<script type="text/javascript" src="/files/jquery-1.11.2.min.js.下载"></script>-->
    <script type="text/javascript" src="/skin/js/jquery-1.8.3.min.js"></script>

    <script type="text/javascript" src="/files/unslider.min.js.下载"></script>
    <script src="/files/_user_.js.下载"></script>
    <script type="text/javascript" src="/skin/main/onload.js"></script>
    <script type="text/javascript" src="/skin/main/function.js"></script>
    <script type="text/javascript" src="/js/nsc/main.js"></script>

    <link href="/css/nsc/plugin/dialogUI/dialogUI.css" media="all" type="text/css" rel="stylesheet" />

    <script type="text/javascript" src="/js/nsc/dialogUI/jquery.dialogUI.js"></script>
    <script type="text/javascript" src="/skin/layer/layer.js"></script>

    <style type="text/css">
        .header-toptray-plus,.header-navbar-plus,.jc-footer{
            display: none;
        }
        ._float_AD{
            display: none;
        }
    </style>


    <!--<script type="text/javascript" src="/files/_home_menu.js.下载"></script>-->
    <script type="text/javascript">
        function zxkf(){
            <?php if($this->settings['kefuStatus']){ ?>
            layer.open({
                type: 2,
                area: ['800px', '550px'],
                zIndex:1999,
                //fixed: false, //不固定
                title:'在线客服',
                scrollbar: false,//屏蔽滚动条
                //maxmin: true,
                content:'<?=$this->settings['kefuGG']?>'
            });
            <?php }else{?>
            $.alert("客服系统维护中");
            <?php }?>
            return false;
        }
        $(document).ready(function() {
            $('#mylottery').unbind().hover(function() {
                $(this).addClass('mylottery-on');
                $('#mylottery_dropdown').show();
            }, function() {
                $(this).removeClass('mylottery-on');
                $('#mylottery_dropdown').hide();
            });

        });
    </script>
</head>
<body>