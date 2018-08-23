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

</head>
<body>
<div id="subContent_bet_re" class="subContent_bet_re">

<style>
    .task_div{right:50px;}
</style>
<script type="text/javascript">
$(function(){
	
	$('.chazhao').click(function(){
		$(this).closest('form').submit();
	});

	$('.bottompage a[href]').live('click', function(){
		$('.biao-cont').load($(this).attr('href'));
		return false;
	});
});
function searchData(err, data){
	if(err){
		alert(err);
	}else{
		$('.biao-cont').html(data);
	}
}
</script>
<div id="contentBox">
     <form action="/index.php/report/countSearch" target="ajax" call="searchData" dataType="html">
      
        <div id="searchBox" class="re">
        	<div class="inlineBlock">
            	<label>盈亏时间：</label><input type="text" class="input150" value="<?= $this->iff($_REQUEST['fromTime'], $_REQUEST['fromTime'], date('Y-m-d H:i', $GLOBALS['fromTime'])) ?>" name="fromTime" id="datetimepicker" /> <span class="image"></span>
            </div>
            <label>至</label>
            <div class="inlineBlock">
            	<input type="text" class="input150" value="<?= $this->iff($_REQUEST['toTime'], $_REQUEST['toTime'], date('Y-m-d H:i', $GLOBALS['toTime'])) ?>" id="datetimepicker4" name="toTime" /> <span class="image" ></span>
            </div>
          <input type="button" value="查询" class="formCheck chazhao" /></div>
    </form>
    </div>
  <div class="biao-cont">
    	<!--下注列表-->
        <?php $this->display('report/count-list.php'); ?>
        <!--下注列表 end -->
    </div>
<?php $this->display('inc_root.php'); ?>
</div></div></div></div></div>
<?php $this->display('C38_footer.php'); ?>

 </body>
 </html>