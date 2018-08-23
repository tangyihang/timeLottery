<?php $this->display('inc_header.php'); ?>
<?php 
	
		$sql = "SELECT
			member.`name`,
			member.`enable`,
			member.uid,
			member.type,
			member.qq,
			member.coin,
			member.parentId,
			bank.account,
			bank.countname,
			bank.username
		FROM
			{$this->prename}members AS member
		LEFT JOIN {$this->prename}user_bank AS bank ON bank.uid = member.uid
		where member.uid = {$this->user['uid']} limit 1";
		
		$bankinfo = $this->getRow($sql);
?>

	<div class="container" style="margin-top: 20px;">
		<ol class="breadcrumb">
			<li><a href="/">首页</a></li>
			<li class="active">账号信息</li>
		</ol>
	</div>

	<div class="container">
		<table class="table table-bordered table-striped" style="clear: both">
			<tbody>
				<tr>
					<td width="15%" class="text-right">余额：</td>
					<td width="35%" class="text-left"><span id="money_span" class="text-danger"><?=$this->user['coin']?> </span> RMB</td>
					<td width="15%" class="text-right">用户姓名：</td>
					<td width="35%" class="text-left"><input type="text" class="form-control" value="<?=$this->user['name']?>" id="userName" disabled="disabled"></td>
				</tr>
				<!-- <tr>
					<td width="15%" class="text-right">电话：</td>
					<td width="35%" class="text-left"><input type="text" class="form-control" id="phone" disabled="disabled"></td>
					<td width="15%" class="text-right">邮箱：</td>
					<td width="35%" class="text-left"><input type="text" class="form-control" id="email" disabled="disabled"></td>
				</tr> -->
				<tr>
					<td width="15%" class="text-right">QQ：</td>
					<td width="35%" class="text-left"><input type="text" class="form-control" id="qq" value="<?=$this->user['qq']?>" disabled="disabled"></td>
					<td width="15%" class="text-right"><!-- 取现银行： --></td>
					<td width="35%" class="text-left">
					<!-- <select id="bankName" class="form-control" disabled="disabled">
							<option value="建设银行">建设银行</option>
							<option value="工商银行" selected="selected">工商银行</option>
							<option value="农业银行">农业银行</option>
							<option value="中国邮政银行">中国邮政银行</option>
							<option value="中国银行">中国银行</option>
							<option value="中国招商银行">中国招商银行</option>
							<option value="中国交通银行">中国交通银行</option>
							<option value="中国民生银行">中国民生银行</option>
							<option value="中信银行">中信银行</option>
							<option value="中国兴业银行">中国兴业银行</option>
							<option value="浦发银行">浦发银行</option>
							<option value="平安银行">平安银行</option>
							<option value="华夏银行">华夏银行</option>
							<option value="广州银行">广州银行</option>
							<option value="BEA东亚银行">BEA东亚银行</option>
							<option value="广州农商银行">广州农商银行</option>
							<option value="顺德农商银行">顺德农商银行</option>
							<option value="北京银行">北京银行</option>
							<option value="杭州银行">杭州银行</option>
							<option value="温州银行">温州银行</option>
							<option value="上海农商银行">上海农商银行</option>
							<option value="中国光大银行">中国光大银行</option>
							<option value="渤海银行">渤海银行</option>
							<option value="浙商银行">浙商银行</option>
							<option value="晋商银行">晋商银行</option>
							<option value="汉口银行">汉口银行</option>
							<option value="上海银行">上海银行</option>
							<option value="广发银行">广发银行</option>
							<option value="深圳发展银行">深圳发展银行</option>
							<option value="东莞银行">东莞银行</option>
							<option value="宁波银行">宁波银行</option>
							<option value="南京银行">南京银行</option>
							<option value="北京农商银行">北京农商银行</option>
							<option value="重庆银行">重庆银行</option>
							<option value="广西农村信用社">广西农村信用社</option>
							<option value="吉林银行">吉林银行</option>
							<option value="江苏银行">江苏银行</option>
							<option value="成都银行">成都银行</option>
							<option value="尧都区农村信用联社">尧都区农村信用联社</option>
							<option value="浙江稠州商业银行">浙江稠州商业银行</option>
							<option value="珠海市农村信用合作联社">珠海市农村信用合作联社</option>
					</select> -->
					</td>

				</tr>
				<tr>
					<td width="15%" class="text-right">银行账号：</td>
					<td width="35%" class="text-left"><input type="text" value="<?=$bankinfo['account']?>" class="form-control" id="cardNo" disabled="disabled"></td>
					<td width="15%" class="text-right">银行地址：</td>
					<td width="35%" class="text-left"><input type="text" value="<?=$bankinfo['countname']?>"  class="form-control" id="bankAddress" disabled="disabled"></td>
				</tr>
				<tr>
					<td width="15%" class="text-right">收款人：</td>
					<td width="35%" class="text-left"><input type="text" value="<?=$bankinfo['username']?>" class="form-control" id="cardNo" disabled="disabled"></td>
					<td width="15%" class="text-right"><!-- 银行地址： --></td>
					<td width="35%" class="text-left">
					<!-- <input type="text" value="<?=$bankinfo['countname']?>"  class="form-control" id="bankAddress" disabled="disabled"> -->
					</td>
				</tr>
			</tbody>
		</table>
	</div>
	<script type="text/javascript">
		

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