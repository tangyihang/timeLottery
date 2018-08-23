<? header("content-Type: text/html; charset=UTF-8");?>
<?php
	
	/////////////////////////////////获取商家私钥//////////////////////////////////////
	////////////////////////get the private key of merchant///////////////////////////
	
	require_once('merchant.php');
	
	$priKey= openssl_get_privatekey($priKey);

    /////////////////////////////////初始化提交参数//////////////////////////////////////
	////////////////////////initial the parameter datas/////////////////////////////////
	
	$merchant_code = "2001180051";

	$service_type =$args[0]['service_type'];

	$interface_version ="V3.0";

	$pay_type = "";

	$sign_type ="RSA-S";

	$input_charset = "UTF-8";
	
	$notify_url =$args[0]['notify_url'];

	$post_url= $args[0]['posturl'];

	$order_no = $args[0]['rechargeId'];	

	$order_time = date('Y-m-d H:i:s',$args[0]['actionTime']);	

	$order_amount = $args[0]['amount'];	

	$product_name ="testpay";	

	$product_code = "";	

	$product_desc = "";	

	$product_num = "";

	$show_url = "";	

	$client_ip ="" ;	

	$bank_code = "";	

	$redo_flag = "";	

	$extend_param = "";

	$extra_return_param = "";	

	$return_url ="";		
	

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
	
	$signStr= "";
	
	if($bank_code != ""){
		$signStr = $signStr."bank_code=".$bank_code."&";
	}
	if($client_ip != ""){
		$signStr = $signStr."client_ip=".$client_ip."&";
	}
	if($extend_param != ""){
		$signStr = $signStr."extend_param=".$extend_param."&";
	}
	if($extra_return_param != ""){
		$signStr = $signStr."extra_return_param=".$extra_return_param."&";
	}
	
	$signStr = $signStr."input_charset=".$input_charset."&";	
	$signStr = $signStr."interface_version=".$interface_version."&";	
	$signStr = $signStr."merchant_code=".$merchant_code."&";	
	$signStr = $signStr."notify_url=".$notify_url."&";		
	$signStr = $signStr."order_amount=".$order_amount."&";		
	$signStr = $signStr."order_no=".$order_no."&";		
	$signStr = $signStr."order_time=".$order_time."&";	

	if($pay_type != ""){
		$signStr = $signStr."pay_type=".$pay_type."&";
	}

	if($product_code != ""){
		$signStr = $signStr."product_code=".$product_code."&";
	}	
	if($product_desc != ""){
		$signStr = $signStr."product_desc=".$product_desc."&";
	}
	
	$signStr = $signStr."product_name=".$product_name."&";

	if($product_num != ""){
		$signStr = $signStr."product_num=".$product_num."&";
	}	
	if($redo_flag != ""){
		$signStr = $signStr."redo_flag=".$redo_flag."&";
	}
	if($return_url != ""){
		$signStr = $signStr."return_url=".$return_url."&";
	}	

	if($show_url != ""){
		
		$signStr = $signStr."service_type=".$service_type."&";
		$signStr = $signStr."show_url=".$show_url;
	}else{
		
		$signStr = $signStr."service_type=".$service_type;
	}
	
	openssl_sign($signStr,$sign_info,$priKey,OPENSSL_ALGO_MD5);
	
	$sign = base64_encode($sign_info);
		
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	</head>	
	<body onLoad="document.dinpayForm.submit();">
		<form name="dinpayForm" id="form1" method="post" action="<?php echo $post_url?>" target="_self">
			<input type="hidden" name="sign"		  value="<?php echo $sign?>" />
			<input type="hidden" name="merchant_code" value="<?php echo $merchant_code?>" />
			<input type="hidden" name="bank_code"     value="<?php echo $bank_code?>"/>
			<input type="hidden" name="order_no"      value="<?php echo $order_no?>"/>
			<input type="hidden" name="order_amount"  value="<?php echo $order_amount?>"/>
			<input type="hidden" name="service_type"  value="<?php echo $service_type?>"/>
			<input type="hidden" name="input_charset" value="<?php echo $input_charset?>"/>
			<input type="hidden" name="notify_url"    value="<?php echo $notify_url?>">
			<input type="hidden" name="interface_version" value="<?php echo $interface_version?>"/>
			<input type="hidden" name="sign_type"     value="<?php echo $sign_type?>"/>
			<input type="hidden" name="order_time"    value="<?php echo $order_time?>"/>
			<input type="hidden" name="product_name"  value="<?php echo $product_name?>"/>
			<input Type="hidden" Name="client_ip"     value="<?php echo $client_ip?>"/>
			<input Type="hidden" Name="extend_param"  value="<?php echo $extend_param?>"/>
			<input Type="hidden" Name="extra_return_param" value="<?php echo $extra_return_param?>"/>
			<input Type="hidden" Name="pay_type"  value="<?php echo $pay_type?>"/>
			<input Type="hidden" Name="product_code"  value="<?php echo $product_code?>"/>
			<input Type="hidden" Name="product_desc"  value="<?php echo $product_desc?>"/>
			<input Type="hidden" Name="product_num"   value="<?php echo $product_num?>"/>
			<input Type="hidden" Name="return_url"    value="<?php echo $return_url?>"/>
			<input Type="hidden" Name="show_url"      value="<?php echo $show_url?>"/>
			<input Type="hidden" Name="redo_flag"     value="<?php echo $redo_flag?>"/>
		</form>
		<script type="text/javascript">
		document.getElementById("form1").submit();
	</script>
	</body>
	
</html>