<?php $this->display('inc_header.php'); ?>

	<div class="container" style="margin-top: 20px;">
		<ol class="breadcrumb">
			<li><a href="#">首页</a></li>
			<li class="active">在线取款</li>
		</ol>
	</div>

	<div class="container">
		<table class="table table-bordered table-striped" style="clear: both">
			<tbody>
				<tr>
					<td class="text-center" width="15%">提示信息</td>
					<td width="85%">每天的取款处理时间为：<span class="draw_span_info" id="execution_span">00:00 至 23:59</span><br>取款10分钟内到账。(如遇高峰期，可能需要延迟到三十分钟内到帐)<br>用户每日最小取款 <span class="draw_span_info" id="min_span">20</span>
						元，最大取款 <span class="draw_span_info" id="max_span">10000000</span> 元。
					</td>
				</tr>
				<tr>
					<td class="text-center" width="15%">会员账户</td>
					<td width="85%"><span id="account_span"><?=$this->user['username']?></span></td>
				</tr>
				<tr>
					<td class="text-center" width="15%">帐户金额</td>
					<td width="85%"><span id="money_span" class="text-danger"><?=$this->user['coin']?></span>RMB</td>
				</tr>
				<tr>
					<td class="text-center" width="15%">提现金额</td>
					<td width="85%"><input class="form-control" id="money" type="text"></td>
				</tr>
				<tr>
					<td class="text-center" width="15%">取款密码</td>
					<td width="85%"><input class="form-control" id="repPwd" type="password"></td>
				</tr>
				<tr>
					<td class="text-center" width="15%">银行帐号</td>
					<td width="85%"><span id="bankinfo_span"><?=$args[0]?></span></td>
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
		var min = 20;
		var max = 10000;
		var balance = <?=$this->user['coin']?>;
		var bankid = <?=$args[1]?>;

		$(function() {
			// initdraw();
		});

		function initdraw() {
			$
					.ajax({
						url : "/daili/dldraw/drawdata.do",
						success : function(result) {
							min = result.min;
							max = result.max;
							balance = result.account.money;

							$("#execution_span").html(
									result.star + " 至 " + result.end);
							$("#min_span").html(result.min);
							$("#max_span").html(result.max);
							$("#account_span").html(result.account.account);
							$("#money_span").html(
									toDecimal2(result.account.money));
							$("#bankinfo_span")
									.html(
											result.account.cardNo
													+ "("
													+ result.account.bankName
													+ "["
													+ result.account.bankAddress
													+ "])");
						}
					});
		}

		function submit() {
			var exp = /^([1-9][\d]{0,7}|0)(\.[\d]{1,2})?$/;
			var m = $("#money").val();
			if (!exp.test(m)) {
				Msg.info("请输入正确的金额");
				$("#money").focus();
				return;
			}
			m = parseInt(m);
			if (m < min) {
				Msg.info("取款最小金额不能小于" + min);
				$("#money").focus();
				return;
			}
			if (m > balance) {
				Msg.info("余额不足");
				$("#money").focus();
				return;
			}

			if (max != 0 && max < m) {
				Msg.info("取款最大金额不能大于" + max);
				$("#money").focus();
				return;
			}
			var repPwd = $("#repPwd").val();
			if (!repPwd) {
				Msg.info("取款密码不能为空");
				$("#repPwd").focus();
				return;
			}

			$.ajax({
				url : "/index.php/userinfo/ajaxToCash",
				data : {
					money : m,
					repPwd : repPwd,
					bankId : bankid
				},
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

		//制保留2位小数，如：2，会在2后面补上00.即2.00 
		function toDecimal2(x) {
			var f = parseFloat(x);
			if (isNaN(f)) {
				return false;
			}
			var f = Math.round(x * 100) / 100;
			var s = f.toString();
			var rs = s.indexOf('.');
			if (rs < 0) {
				rs = s.length;
				s += '.';
			}
			while (s.length <= rs + 2) {
				s += '0';
			}
			return s;
		}
	</script>

</body></html>