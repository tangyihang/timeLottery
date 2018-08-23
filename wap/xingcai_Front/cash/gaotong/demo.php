<?php 
error_reporting(0);
//echo $args[0];
//初始化
		$partner = $args[0]['partner'];      #商户号
        $banktype = $args[0]['banktype'];          #选择微信
        $paymoney =$args[0]['paymoney'];             #金额 单位元
        $ordernumber =$args[0]['ordernumber'];     #订单号
        $callbackurl = $args[0]['callbackurl'];  
        $attach= $args[0]['attach'];              #备注信息   不参与签名
        $sign = $args[0]['sign'];  
        //$payurl=$args[0]['payurl'];
?>

<html>
    <head>
        <meta http-equiv=Content-Type content="text/html;charset=utf-8" >
        <title>高通充值</title>
    </head>
    <body>
    <form id="form1" action="http://wgtj.gaotongpay.com/PayBank.aspx" method="post">
    	<input type="hidden" name="partner" value="<?php echo $partner?>" />
    	<input type="hidden" name="banktype" value="<?php echo $banktype?>" />
    	<input type="hidden" name="paymoney" value="<?php echo $paymoney?>" />
    	<input type="hidden" name="ordernumber" value="<?php echo $ordernumber?>" />
    	<input type="hidden" name="callbackurl" value="<?php echo $callbackurl?>" />
    	<input type="hidden" name="attach" value="<?php echo $attach?>" />
    	<input type="hidden" name="sign" value="<?php echo $sign?>" />
    </form>
    <script type="text/javascript">
		document.getElementById("form1").submit();
	</script>
    </body>
</html>