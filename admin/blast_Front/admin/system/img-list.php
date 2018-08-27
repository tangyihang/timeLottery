<?php
	$data=$this->getRows("select * from {$this->prename}params where id between 114 and 121 order by id");
	//print_r($data);
?>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
	<header><h3 class="tabs_involved">彩种设置</h3></header>
	<table class="tablesorter" cellspacing="0" width="100%">
		<thead>
			<tr>
				<td>id</td>
				<td>描述</td>
				<td>图片预览</td>
				<td>操作</td>
			</tr>
		</thead>
		<tbody id="nav01">
		<?php if($data) foreach($data as $var){ ?>
			<tr>
				<td><?=$var['id']?></td>
				<td><?=$var['title']?></td>
				<td><img src="<?=$var['value']?>"></td>
				<td><a href="system/uploadImg/<?=$var['id']?>">修改</a></td>
			</tr>
		<?php  } ?>
		</tbody>
	</table>
</article>
<script type="text/javascript">  
</script>