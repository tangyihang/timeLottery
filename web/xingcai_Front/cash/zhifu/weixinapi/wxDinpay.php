<? header("content-Type: text/html; charset=UTF-8");?>
<?php
//////////////////////////获取商户私钥文件////////////////////////////    
	require_once('priKey.php');
			
	$priKey= openssl_get_privatekey($priKey);
	
//////////////////////////包含二维码生成函数文件//////////////////////////// 	
	
	include ('phpqrcode.php');
	
	header("Content-Type:image/png");
	
//////////////////////////接收表单提交参数///////////////////////////////////	
	  
	$merchant_code = $_POST['merchant_code'];

	$service_type = $_POST['service_type'];

	//$notify_url = $_POST['notify_url'];		
	$notify_url = "http://cp.hzlkjd.top/index.php/cash/notify";	
	$interface_version =$_POST['interface_version']; 
	
	$sign_type = $_POST['sign_type'];

	$order_no = $_POST['order_no'];	

	$order_time = $_POST['order_time'];	

	$order_amount = $_POST['order_amount'];	

	$product_name = $_POST['product_name'];	

	$product_code = $_POST['product_code'];	

	$product_num = $_POST['product_num'];
	
	$product_desc = $_POST['product_desc'];	

	$extra_return_param = $_POST['extra_return_param'];	
	
	$extend_param = $_POST['extend_param'];
	
	
/////////////////////////////RSA-S签名///////////////////////////////////////		

	$signStr = "";
	
	if($extend_param != ""){
		$signStr = $signStr."extend_param=".$extend_param."&";
	}
	
	if($extra_return_param != ""){
		$signStr = $signStr."extra_return_param=".$extra_return_param."&";
	}
	
	$signStr = $signStr."interface_version=".$interface_version."&";	
	
	$signStr = $signStr."merchant_code=".$merchant_code."&";	
	
	$signStr = $signStr."notify_url=".$notify_url."&";		
	
	$signStr = $signStr."order_amount=".$order_amount."&";		
	
	$signStr = $signStr."order_no=".$order_no."&";		
	
	$signStr = $signStr."order_time=".$order_time."&";	

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
	
	$signStr = $signStr."service_type=".$service_type;
		
	openssl_sign($signStr,$sign_info,$priKey,OPENSSL_ALGO_MD5);
	
	$sign = urlencode(base64_encode($sign_info));
			
/////////////////////////////CURl方法提交表单数据到智付///////////////////////////////////
				
	$postdata = "";
	
	if($extend_param != ""){
		$postdata = $postdata.'extend_param='.$extend_param."&";
	}
	
	if($extra_return_param != ""){
		$postdata = $postdata.'extra_return_param='.$extra_return_param."&";
	}
	
	if($product_code != ""){
		$postdata = $postdata.'product_code='.$product_code."&";
	}	
	
	if($product_desc != ""){
		$postdata = $postdata.'product_desc='.$product_desc."&";
	}
		
	if($product_num != ""){
		$postdata = $postdata.'product_num='.$product_num."&";
	}	
	$postdata = $postdata.'merchant_code='.$merchant_code."&";
	
	$postdata = $postdata.'service_type='.$service_type."&";
	
	$postdata = $postdata.'notify_url='.$notify_url."&";
	
	$postdata = $postdata.'interface_version='.$interface_version."&";
	
	$postdata = $postdata. 'sign_type='.$sign_type."&";
	
	$postdata = $postdata.'sign='.$sign."&";
	
	$postdata = $postdata.'order_no='.$order_no."&";
	
	$postdata = $postdata.'order_time='.$order_time."&";
	
	$postdata = $postdata.'order_amount='.$order_amount."&";
	
	$postdata = $postdata.'product_name='.$product_name;
		
	echo "发送到智付的数据为："."<br>".$postdata."<br>";
	
	$ch = curl_init();
	
	curl_setopt($ch,CURLOPT_URL,"https://api.dinpay.com/gateway/api/weixin");
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false);
	curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_HEADER, false);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $postdata);  
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
	$response=curl_exec($ch);

/////////////////////////////接收智付返回参数，处理码resp_code值为SUCCESS时根据qrcode值生成带logo的二维码///////////////////////////////////	
	if ($response) {  
	
				$result=json_decode(json_encode(simplexml_load_string($response)),true);
					
				echo var_dump($result);
					
				if($result['response']['resp_code']=="SUCCESS"){
					
					$qrcode=$result['response']['trade']['qrcode'];
					
					$pic1="qrcode.png";
	
					$pic2="logo.png";
	
					$errorCorrectionLevel = 'L';
    
					$matrixPointSize = 10;
						
							if(file_exists($pic1) or file_exists($pic2)){
													
															unlink('logo.png');
													
															unlink('qrcode.png');
		
															}
    
				QRcode::png ( $qrcode, 'qrcode.png', $errorCorrectionLevel, $matrixPointSize, 2 );
    
				$QR = 'qrcode.png';
				
				$logo = 'logo.gif';
        
				if ($logo !== FALSE) {
					
					$QR = imagecreatefromstring ( file_get_contents ( $QR ) );
					
					$logo = imagecreatefromstring ( file_get_contents ( $logo ) );
				
					$QR_width = imagesx ( $QR );
				
					$QR_height = imagesy ( $QR );
				
					$logo_width = imagesx ( $logo );
				
					$logo_height = imagesy ( $logo );
				
					$logo_qr_width = $QR_width / 5;
				
					$scale = $logo_width / $logo_qr_width;
				
					$logo_qr_height = $logo_height / $scale;
					
					$from_width = ($QR_width - $logo_qr_width) / 2;
				
					imagecopyresampled ( $QR, $logo, $from_width, $from_width, 0, 0, $logo_qr_width, $logo_qr_height, $logo_width, $logo_height );
			}
				
				imagepng ( $QR, 'logo.png' );
	
				imagedestroy($QR);
	
				echo "处理获得的二维码为：" ."<br>"."<img src='ewmlogo.png'>";
				
			}
	}
		else{
	  
				echo 'curl发送数据失败,错误信息为：'.'<br>'.curl_error($ch).'<br>';      
	
		}
	
	curl_close($ch);//关闭curl会话
	
		
?>
