<?php $this->display('inc_header.php'); ?>

	<div class="container" style="margin-top: 20px;">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="#">在线取款</a></li>
			<li class="active">提款密码设置</li>
		</ol>
	</div>

	<div class="container">
		<table class="table table-bordered table-striped" style="clear: both">
			<tbody>
				<tr>
					<td class="text-left" width="15%">＊提款密码：</td>
					<td width="85%"><input class="form-control" id="password" type="password"></td>
					
				</tr>
				<tr>
					<td class="text-left" width="15%">＊确认密码：</td>
					<td width="85%"><input class="form-control" id="rpassword" type="password"></td>
				</tr>
				<tr>
					<td class="text-center" colspan="3" width="100%"><button class="btn btn-success" onclick="submit();">
							<i class="glyphicon glyphicon-ok"></i> 提交
						</button></td>
				</tr>
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		function submit() {
			var password = $("#password").val();
			var rpassword = $("#rpassword").val();
			if (!password) {
				alert("新密码不能为空！");
				return;
			}
			if (!rpassword) {
				alert("确认不能为空！");
				return;
			}

			if (password !== rpassword) {
				alert("两次密码不一致！");
				return;
			}
			$.ajax({
				url : "/index.php/userinfo/setDrawPwd",
				data : {
					pwd : password,
					rpwd : rpassword
				},
				type:"POST",
				success : function(result) {
					if(result.code!=0){
						Msg.confirm(result.msg, {
							btn : [ '确认' ]
						}, function() {
						});
					}else{
						Msg.confirm(result.msg, {
							btn : [ '确认' ]
						}, function() {
							window.location.href = "/index.php/userinfo/drawPwd";
						});
					}

					
				}
			});
		}
	</script>
</body>
</html>