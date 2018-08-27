<?php
	$data=$this->getRows("select * from {$this->prename}code where id between 1 and 2 order by id");
	//print_r($data);
?>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
	<header><h3 class="tabs_involved">二维码设置</h3></header>
	<table class="tablesorter" cellspacing="0" width="100%">
		<thead>
			<tr>
				<td>id</td>
				<td>名称</td>
				<td>收款人</td>
				<td>收款账号</td>
				<td>二维码</td>
				<td>操作</td>
			</tr>
		</thead>
		<tbody id="nav01">
		<?php if($data) foreach($data as $var){ ?>
			<tr>
				<td><?=$var['id']?></td>
				<td><?=$var['name']?></td>
				<td><?=$var['title']?></td>
				<td><?=$var['account']?></td>
				<td><img src="<?=$var['imgaddr']?>"></td>
				<td><a href="business/codeedit/<?=$var['id']?>">修改</a></td>
			</tr>
		<?php  } ?>
		</tbody>
	</table>
</article>
<script type="text/javascript">  
</script>