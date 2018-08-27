<?php

    // 日期限制
	if($_REQUEST['fromTime'] && $_REQUEST['toTime']){
		$timeWhere=' and s.date between '. strtotime($_REQUEST['fromTime']).' and '.strtotime($_REQUEST['toTime']);
	}elseif($_REQUEST['fromTime']){
		$timeWhere=' and s.date >='. strtotime($_REQUEST['fromTime']);
	}elseif($_REQUEST['toTime']){
		$timeWhere=' and s.date <'. strtotime($_REQUEST['toTime']);
	}else{
		if($GLOBALS['fromTime'] && $GLOBALS['toTime']) $timeWhere=' and s.time between '.$GLOBALS['fromTime'].' and '.$GLOBALS['toTime'].' ';
	}

	$sql="select s.* , m.username from {$this->prename}sign_time s, {$this->prename}members m where s.uid=m.uid and s.isdelete=0 $timeWhere  order by s.id DESC";
	$data=$this->getPage($sql, $this->page, $this->pageSize);
?>
<input type="hidden" value="<?=$this->user['username']?>" />
<table class="tablesorter" cellspacing="0"> 
<thead> 
    <tr> 
	    <th width="60">选项</th>
        <th width="60">编号</th>
        <th width="60">userid</th>
        <th width="60">用户</th>
		<td width="60">签到日期</td>
		<td>奖励</td>
		<td class="tl">IP</td>
		<td>时间</td>
    </tr> 
</thead> 
<tbody id="nav01"> 
<?php
	if($data['data']) foreach($data['data'] as $var){?>
    <tr> 
	    <td><INPUT  type="checkbox" value="<?=$var['id']?>" name="chk_only"></td>
		<td><?=$var['id']?></td>
		<td><?=$var['uid']?></td>
		<td><?=$var['username']?></td>
		<td><?=$var['date']?></td>
		<td><?=$var['money']?></td>
		<td><?=$var['ip']?></td>
		<td><?=$var['add_time']?></td>
    </tr>
<?php }else{ ?>
		<tr>
			<td colspan="8" align="center">暂时没有数据。</td>
		</tr>
	<?php } ?>
    <tr>
    	<td colspan="8" style="text-align:left; padding-left:10px;">
           <label>&nbsp&nbsp&nbsp&nbsp<INPUT  id="chk_All" type="checkbox" value="All" name="chk_All">&nbsp&nbsp全选</label>&nbsp&nbsp
           <a href="/index.php/sign/senddelete/" dataType="json" class="removeAllRecord" onajax="sendrecordBeforeDelete" call="senddeleteBet" target="ajax"><input name="delall" type="button" value="删 除" /></a>
		</td>
    </tr>
</tbody> 
</table>
<footer>
	<?php
		$rel=get_class($this).'/index-{page}?'.http_build_query($_GET,'','&');
		$this->display('inc/page.php', 0, $data['total'], $rel, 'defaultReplacePageAction');
	?>
</footer>
<script type="text/javascript">  
ghhs("nav01","tr");  
</script>