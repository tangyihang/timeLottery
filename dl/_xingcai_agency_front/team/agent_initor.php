<!--代理说明-->
<?php $this->display('C38_header_new.php'); ?>
<div id="nsc_subContent" style="border:0">
<script type="text/javascript">
	$(function() {
		$( ".menus-li li").click(function(){
            $( ".menus-li li").removeClass("on");
            $(this).addClass("on");
            $("#tabs-1,#tabs-2").hide();
            $("#tabs-"+($(this).index()+1)).show();
        });
	})
</script>
<?php $this->display('siderbar.php'); ?>
<link rel="stylesheet" href="/css/nsc/reset.css?v=1.16.11.9" />
<link rel="stylesheet" href="/css/nsc/list.css?v=1.16.11.9" />
<link rel="stylesheet" href="/css/nsc/activity.css?v=1.16.11.9" />
<script type="text/javascript" src="/js/nsc/jquery-1.7.min.js?v=1.16.12.5"></script>
<script type="text/javascript" src="/js/nsc/main.js?v=1.16.12.5"></script>
<script type="text/javascript" src="/js/nsc/dialogUI/jquery.dialogUI.js?v=1.16.12.5"></script>
<link href="/css/nsc/plugin/dialogUI/dialogUI.css?v=1.16.11.9" media="all" type="text/css" rel="stylesheet" />
<style type="text/css">
.tag_div {
    height: 40px;
	background-color: #248ce6;
}
.tag_div #btn_2 {
    
    margin-right: -10px;
}
.tag_div>a {
    float: left;
    width: 50%;
    text-align: center;
    line-height: 40px;
    color: #fff;
    cursor: pointer;
}
.tip_mesg>strong {
    height: 46px;
    line-height: 48px;
    display: block;
    font-size: 14px;
}
.checkinlog {
    width: 80px;
    height: 35px;
    text-align: center;
    color: blue;
    cursor: pointer;
}
</style>
</head>
<body>
<div id="subContent_bet_re" class="subContent_bet_re">
    <!--消息框代码开始-->
    <script src="/js/jqueryui/ui/jquery.ui.core.js?v=1.16.12.5"></script>
    <script src="/js/jqueryui/ui/jquery.ui.widget.js?v=1.16.12.5"></script>
    <script src="/js/jqueryui/ui/jquery.ui.tabs.js?v=1.16.12.5"></script>
    <script language="javascript" type="text/javascript" src="/js/common/jquery.md5.js?v=1.16.12.5"></script>
    <script type="text/javascript" src="/js/keypad/jquery.keypad.js?v=1.16.12.5"></script>
    <link rel="stylesheet" type="text/css" media="all" href="/js/keypad/keypad.css?v=1.16.11.9">
    <!--消息框代码结束-->
    <div id="changeloginpass">
        <div id="tabs">
            <ul class="menus-li">
                <li class="on">代理说明</li>
            </ul>
            <div id="tabs-1" class="tip_mesg" style="width: 100%;">
                <?php echo $args['0'];?>	   
            </div>
        </div>
    </div>
</div>
<?php $this->display('C38_footer.php'); ?>
<script type="text/javascript">
$(document).ready(function(){
$.ajax({
   type: "get",
   url: "/index.php/user/getincome/<?=$this->user['uid']?>",
	//dataType: "json",
   success: function(msg){
	   $("#BY_money").html(msg);
   }
   });
   $.ajax({
   type: "get",
   url: "/index.php/user/getchild/<?=$this->user['uid']?>",
	//dataType: "json",
   success: function(msg){
	   $("#number").html(msg);
   }
   })
});	
</script>
 </body>
 </html>