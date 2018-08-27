<?php
	$sql="select * from {$this->prename}member_setting order by id asc";
	$data=$this->getRows($sql);
?>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
<form action="/index.php/member/setLevel"  method="post" target="ajax" call="setMemberLevel">
	<header><h3 class="tabs_involved">充值奖励设置</h3></header>
	<table class="tablesorter" cellspacing="0">
	<thead>
		<tr>
			<th>级别</th>
			<th>金额</th>
			<th>奖励</th>
		</tr>
	</thead>
	<tbody id="nav01">
	<?php if($data) foreach($data as $level){ ?>
		<tr>
			<td><?=$level['level']?></td>
			<td><input type="text" name="data[<?=$level['id']?>][levelName]" value="<?=$level['levelName']?>" /></td>
			<td><input type="text" name="data[<?=$level['id']?>][minScore]" value="<?=$level['minScore']?>" /></td>
		</tr>
	<?php } ?>
	</tbody>
	</table>
	<footer>
		<div class="submit_link"><input type="submit" class="alt_btn" value="提交修改"/></div>
	</footer>
</form>
</article>
<script type="text/javascript">  
ghhs("nav01","tr");  
</script>