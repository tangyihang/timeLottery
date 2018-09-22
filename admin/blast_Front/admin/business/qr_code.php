<?php
$data = $this->getRows("select * from {$this->prename}code where status<>2 order by id");
//print_r($data);
?>
<article class="module width_full">
<input type="hidden" value="<?=$this->user['username']?>" />
	<header>
		<h3 class="tabs_involved">二维码设置 （<a href="#" onclick="addQrCode()" value="充值" class="spn1">添加</a>）</h3>

	</header>
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
		<?php if ($data) {
    foreach ($data as $var) {
        ?>
			<tr>
				<td><?=$var['id']?></td>
				<td><?=$var['name']?></td>
				<td><?=$var['title']?></td>
				<td><?=$var['account']?></td>
				<td><a target="_blank" href="<?=$var['imgaddr']?>"><img style="width: 50px;height:50px;" src="<?=$var['imgaddr']?>"></a></td>
				<td>
					<a href="business/codeedit/<?=$var['id']?>">修改</a> |
					<a onclick="updateCodeStatus('<?=$var['id']?>', '2');" href="#">删除</a> |

					<?php
if ($var['status'] == '0') {?>
            <a onclick="updateCodeStatus('<?=$var['id']?>', '1');" href="#">启用</a>
            <?php
} else {?>
            <a onclick="updateCodeStatus('<?=$var['id']?>', '0');" href="#">停用</a>
            <?php
}?>

				</td>
			</tr>
		<?php }
}
?>
		</tbody>
	</table>
</article>
<script type="text/javascript">

function updateCodeStatus(id,status) {
	var title = "你确定";
	if (status == '0'){
		title = "你确定要停用?";
	} else if (status=='1') {
		title = "你确定要启用?";
	} else if (status=='2'){
		title = "你确定要删除?";
	}

    if (confirm(title)) {

    	$.ajax('/index.php/' + 'business/updatecodestatus/' + id + '/' + status, {
            dataType: 'json',
            error: defaultError,
            success: defaultSuccess
        });

        return true;
    } else {
        return false;
    }
}
</script>