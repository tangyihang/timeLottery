<?php
$data=$this->getRows("select * from {$this->prename}active");
//print_r($data);
?>
<style type="text/css">
	td
	{
		white-space: nowrap;
	}
</style>
<script>
	var editor;
	KindEditor.ready(function(K) {
		editor = K.create('.editor_1',{
			resizeType : 2,
			allowPreviewEmoticons : false,
			allowImageUpload : false,
			width:"100%",
			height:"10px",
			items : [
				'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
				'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', '|', 'emoticons', 'image', 'link']
		});
	});
</script>
<article class="module width_full">
	<input type="hidden" value="<?=$this->user['username']?>" />
	<header><h3 class="tabs_involved" width="100%">优惠活动</h3></header>
	<table class="tablesorter" cellspacing="0" width="100%">
		<thead>
		<tr>
			<td>标题</td>
			<td>活动对象</td>
			<td>活动内容</td>
			<td>图片预览</td>
<!--			<td>简介</td>-->
			<td>操作</td>
		</tr>
		</thead>
		<tbody id="nav01">
		<?php if($data) foreach($data as $var){ ?>
			<tr>
				<td><?=$var['title']?></td>
				<td><?=$var['obj']?></td>
				<td><?=$var['content']?></td>
				<td><img src="<?=$var['img']?>" width="100%" /></td>

				<td><a href="system/updateActive/<?=$var['id']?>" >修改保存</a> </td>
			</tr>
		<?php  } ?>
		</tbody>
	</table>
</article>
