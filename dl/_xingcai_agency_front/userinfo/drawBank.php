<?php $this->display('inc_header.php'); ?>

	<div class="container" style="margin-top: 20px;">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li><a href="#">在线取款</a></li>
			<li class="active">银行设置</li>
		</ol>
	</div>

	<div class="container">
		<table class="table table-bordered table-striped" style="clear: both">
			<tbody>
				<tr>
					<td class="text-left" width="15%">＊出款银行名称：</td>
					<td width="35%">

						<select id="bankName" class="form-control">
							<?php

								$sql = "select * from {$this->prename}bank_list b where b.isDelete=0";
								$banklist = $this->getRows($sql);
								foreach ($banklist as $key => $v) {
							?>
								<option  value="<?=$v['id']?>" ><?=$v['name']?></option>
							<?php
								}
							?>
						</select>
					</td>
					<td class="text-left" rowspan="6" width="50%">备注： <br> <br>1.标记有＊者为必填项目。 <br> <br>2.真实姓名须与出款帐户户名一致，否则不予出款。 <br> <br>3.绑定的资料为忘记密码时的认证，请会员务必填写正确资料。
					</td>
				</tr>
				<tr>
					<td class="text-left" width="15%">＊持卡人姓名：</td>
					<td width="35%"><input class="form-control" id="userName" type="text"></td>
				</tr>
				<tr>
					<td class="text-left" width="15%">＊出款银行帐号：</td>
					<td width="35%"><input class="form-control" id="cardNo" type="text"></td>
				</tr>
				<tr>
					<td class="text-left" width="15%">＊出款开户行：</td>
					<td width="35%"><input class="form-control" id="bankAddress" type="text"></td>
				</tr>
				<tr>
					<td class="text-left" width="15%">＊取款密码：</td>
					<td width="35%"><input class="form-control" id="repPwd" type="password"></td>
				</tr>
				<tr>
					<td class="text-center" colspan="3" width="50%"><button class="btn btn-success" onclick="submit();">
							<i class="glyphicon glyphicon-ok"></i> 提交
						</button></td>
				</tr>
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		function submit() {
			var bankName = $("#bankName").val();
			var province = $("#province").val();
			var city = $("#city").val();
			var bankAddress = $("#bankAddress").val();
			var cardNo = $("#cardNo").val();
			var repPwd = $("#repPwd").val();
			var userName = $("#userName").val();
			if (!bankName) {
				Msg.info("请选择出款银行名称！");
				return;
			}
			if (!userName) {
				Msg.info("请输入持卡人姓名！");
				return;
			}
			if (!cardNo) {
				Msg.info("请输入出款银行帐号！");
				return;
			}
			if (!repPwd) {
				Msg.info("请输入取款密码！");
				return;
			}
			if (!bankAddress) {
				Msg.info("请输入开户行！");
				return;
			}
			var param = {};
			param["bankName"] = bankName;
			param["userName"] = userName;
			param["province"] = province;
			param["city"] = city;
			param["bankAddress"] = bankAddress;
			param["cardNo"] = cardNo;
			param["repPwd"] = repPwd;
			$.ajax({
				url : "/index.php/userinfo/setUserBank",
				data : param,
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

</body></html>