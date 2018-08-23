<?php

    /////////////////////////////////获取商家私钥//////////////////////////////////////
	////////////////////////get the private key of merchant///////////////////////////
	
	require_once('merchant.php');
	
	$priKey= openssl_get_privatekey($priKey);
	
	/////////////////////////////////接收表单提交参数//////////////////////////////////////
	////////////////////////To receive the parameter data //////////////////////

	$merchant_code = "1111110166";
	
	$interface_version = "V3.0";
	
	$sign_type = "RSA-S";	
	
	$service_type = "single_trade_query";	
	
	$order_no = "456654";	
	
	$trade_no = "";	

	/////////////////////////////   数据签名  /////////////////////////////////
	////////////////////////////  Data signature  ////////////////////////////

	/**
	签名规则定义如下：
	（1）参数列表中，除去sign_type、sign两个参数外，其它所有非空的参数都要参与签名，值为空的参数不用参与签名；
	（2）签名顺序按照参数名a到z的顺序排序，若遇到相同首字母，则看第二个字母，以此类推，同时将商家支付密钥key放在最后参与签名，组成规则如下：
			参数名1=参数值1&参数名2=参数值2&……&参数名n=参数值n&key=key值
	*/

	/**
	The definition of signature rule is as follows : 
	（1） In the list of parameters, except the two parameters of sign_type and sign, all the other parameters that are not in blank shall be signed, the parameter with value as blank doesn’t need to be signed; 
	（2） The sequence of signature shall be in the sequence of parameter name from a to z, in case of same first letter, then in accordance with the second letter, so on so forth, meanwhile, the merchant payment key shall be put at last for signature, and the composition rule is as follows : 
		Parameter name 1 = parameter value 1& parameter name 2 = parameter value 2& ......& parameter name N = parameter value N & key = key value
	*/
	
	$signStr = "";

	$signStr = "interface_version=".$interface_version."&merchant_code=".$merchant_code."&order_no=".$order_no."&service_type=".$service_type;

	if($trade_no != ""){	
		$signStr = $signStr."&trade_no=".$trade_no; 
	}

	openssl_sign($signStr,$sign_info,$priKey,OPENSSL_ALGO_MD5);
	
	$sign = base64_encode($sign_info);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	</head>
	<body onLoad="javascript:document.getElementById('queryForm').submit();">
		<form  id="queryForm" action="https://query.dinpay.com/query" method="post"  target="_self">
			<input type="hidden" name="interface_version" value="<?php echo $interface_version?>" />
			<input type="hidden" name="service_type" value="<?php echo $service_type?>" />
			<input type="hidden" name="merchant_code" value="<?php echo $merchant_code?>" />
			<input type="hidden" name="sign_type" value="<?php echo $sign_type?>" />
			<input type="hidden" name="sign" value="<?php echo $sign?>" />
			<input type="hidden" name="order_no" value="<?php echo $order_no?>" />
			<input type="hidden" name="trade_no" value="<?php echo $trade_no?>" />
		</form>
	</body>
</html>