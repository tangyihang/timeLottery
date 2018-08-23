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
function searchCoinLog(err, data){
	if(err){
		alert(err);
	}else{
		$('.biao-cont').html(data);
	}
}
</script>
<div id="contentBox">
     <form action="/index.php/report/coinlog/<?=$this->type?>" dataType="html" target="ajax" call="searchCoinLog">
      
        <div id="searchBox" class="re">
        	<div class="inlineBlock">
            	<label>帐变时间：</label><input type="text" class="input150" value="<?= $this->iff($_REQUEST['fromTime'], $_REQUEST['fromTime'], date('Y-m-d H:i', $GLOBALS['fromTime'])) ?>" name="fromTime" id="datetimepicker" /> <span class="image"></span>
            </div>
            <label>至</label>
            <div class="inlineBlock">
            	<input type="text" class="input150" value="<?= $this->iff($_REQUEST['toTime'], $_REQUEST['toTime'], date('Y-m-d H:i', $GLOBALS['toTime'])) ?>" id="datetimepicker4" name="toTime" /> <span class="image" ></span>
            </div>
          
            <div class="inlineBlock">
            	<label>帐变类型：</label><select id="methodid"  name="liqType"  class="team">
			<option value="">所有帐变类型</option>
            <option value="1">账户充值</option>
			<option value="111">卡密充值</option>
            <option value="2">游戏返点</option>
            <option value="6">奖金派送</option>
            <option value="7">撤单返款</option>
            <option value="106">账户提现</option>
            <option value="8">提现失败</option>
            <option value="107">提现成功</option>
            <option value="9">系统充值</option>
            <option value="51">活动礼金</option>
            <option value="53">消费佣金</option>
            <option value="101">投注扣款</option>
            <option value="102">追号扣款</option>
			<option value="130">砸蛋赠送</option>
        </select>
		 <!--select name="mode" class="text5">
            <option value="" selected>全部模式</option>
            <option value="1.000">1元</option>
            <option value="2.000">元</option>
            <option value="0.200">角</option>
            <option value="0.020">分</option>
            <option value="0.002">厘</option>
        </select-->
            </div>            
       <div class="search_br"><input type="button" value="查询" class="formCheck chazhao" /></div>
        </div>
        
    </form>
    </div>
  <div class="biao-cont">
    	<!--下注列表-->
        <?php $this->display('report/coin-log.php'); ?>
        <!--下注列表 end -->
    </div>
<div class="list_page">
    <span class="l_message">备注:如需查看详细信息，请点击单号</span>
    <div class="pageinfo"></div>
</div>
<?php $this->display('inc_root.php'); ?>
</div></div></div></div></div>
<?php $this->display('C38_footer.php'); ?>

 </body>
 </html>