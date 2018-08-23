<? header("content-Type: text/html; charset=UTF-8");?>
<?php
	
//////////////////////////获取商户私钥文件////////////////////////////    
	
	require_once('priKey.php');
			
	$priKey= openssl_get_privatekey($priKey);
	
//////////////////////////接收表单提交参数///////////////////////////////////		
    	
	$merchant_code = $_POST['merchant_code'];
	
	$interface_version = $_POST['interface_version'];
	
	$sign_type = $_POST['sign_type'];	
	
	$service_type = $_POST['service_type'];	
	
	$order_no = $_POST['order_no'];	
	
	$trade_no = $_POST['trade_no'];	

/////////////////////////////RSA-S签名///////////////////////////////////////	
	
	$signStr = "";
		
	$signStr = $signStr."interface_version=".$interface_version."&";	
	
	$signStr = $signStr."merchant_code=".$merchant_code."&";	
			
	$signStr = $signStr."order_no=".$order_no."&";
			
	if($trade_no != ""){	
			
			$signStr = $signStr."service_type=".$service_type."&";	
	
			$signStr = $signStr."trade_no=".$trade_no;	
	}else{
		
			$signStr = $signStr."service_type=".$service_type;	
	}

	openssl_sign($signStr,$sign_info,$priKey,OPENSSL_ALGO_MD5);
	
	$sign = urlencode(base64_encode($sign_info));
	
/////////////////////////////CURl方法提交表单数据到智付///////////////////////////////////

	$curlPost='merchant_code='.$merchant_code.'&interface_version='.$interface_version.'&service_type='.$service_type.'&sign_type='.$sign_type.'&order_no='.$order_no.'&sign='.$sign;
	
	$postdata = "";
	
	if($trade_no != ""){
				
			$postdata = $postdata.'trade_no='.$trade_no."&";
	}
	
	$postdata = $postdata.'merchant_code='.$merchant_code."&";
	
	$postdata = $postdata.'interface_version='.$interface_version."&";
	
	$postdata = $postdata.'service_type='.$service_type."&";
	
	$postdata = $postdata.'sign_type='.$sign_type."&";
	
	$postdata = $postdata.'order_no='.$order_no."&";
	
	$postdata = $postdata.'sign='.$sign;
	
	
	$ch = curl_init();
	curl_setopt($ch,CURLOPT_URL,"https://query.dinpay.com/query");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
	curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		
	$response=curl_exec($ch);
	
	
	if (!$response) {      
       
			echo '数据传输错误，错误信息为：'.curl_error($ch)."<br>";      
    
	}else{
	
			$result=json_encode(simplexml_load_string($response));

			echo $result;
	
		}
		
	curl_close($ch); 
?>

