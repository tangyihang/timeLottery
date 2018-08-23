<?php

/////////////////////// get the value of "sign" parameter(RSA-S encrypt)/////////////////////
/*1)merchant_private_key,get it from the tools for getting keys,please refer to the file call <how to get the keys>
  2)you also need to get the merchant_public_key and upload it on Ddbill mechant system,also refer to <how to get the keys>
  3)the merchant_private_key and merchant_public_key are for mechant ID 1111110166,please get yours
*/	
$merchant_private_key='-----BEGIN PRIVATE KEY-----
MIICdgIBADANBgkqhkiG9w0BAQEFAASCAmAwggJcAgEAAoGBAJ6MQRhxPT3/+EXa
zTzZAkoZM2msr+lnv2Mjbn3QJ0aJ4U4NM36e/1sV+EpSaxY0vdHdy/FIcAvKPGbv
zA98NJ/u5Qj7M2+u+M73bwurai/FW9H7iYyAmugEEikkEx+82AUrYnv/R1RRYXeU
P+pHpvZBZ/2j5pyQfsiRBnKM2PsNAgMBAAECgYB0JDnrNcivCjtMsKN312Ad96f5
2U5jpGRGs0XVVA3xVj99dZ4rOz3D86wWhZl8gtYqTld/QJkTieoFXdQV496Hwnot
BO3f9Ujr7jolwWfBet1AML1CIgA4mVxX/wa+TJQHOgxPOmO1UHuQMwIOfbolf86V
QWqZYuZRUjg/XvFw4QJBANK4IsnVtoVg74Sa2WPl0WebB9VOA4SIgoH7B1b8Zu7t
LzXMq170vKUupyFpWt3IjOYVewE4zIVQlSdO2HdsyKMCQQDAnh7OjReNHQHAWf+J
x9c070Wzv3c+As/ZmfYvYhKrm0xOo7cUgvhRHZvbYnm+X7z1g8w5I9YzMlvk3fHA
3fiPAkARw65DH748blii8D8Fefl2Z454gBQx1yRReu06exreZ6aEPZXw8mb48f7r
BSvA6MhgGU1+Y+ByGMIKR05eexBLAkEApCTbaffQrx+eA3ZujtKvcdvJ0XEDw+OP
jwdmRWDVOkqAj69ycFdgF3gc/qr/xp09oRfs7HC+tChhKTt+Lna6vwJAXgrPUP1p
14At9kV+YELRX5KKiWaFts0VkE/iQGUaALmqpojiS4Kho1j+BLp30e+Fn0BqL92h
7IwCUf+LAigxdw==
-----END PRIVATE KEY-----';

	//merchant_public_key,商户公钥，按照说明文档上传此密钥到多的宝商家后台，位置为"支付设置"->"公钥管理"->"设置商户公钥"，代码中不使用到此变量
	//demo提供的merchant_public_key已经上传到测试商家号后台
	$merchant_public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCejEEYcT09//hF2s082QJKGTNp
rK/pZ79jI2590CdGieFODTN+nv9bFfhKUmsWNL3R3cvxSHALyjxm78wPfDSf7uUI
+zNvrvjO928Lq2ovxVvR+4mMgJroBBIpJBMfvNgFK2J7/0dUUWF3lD/qR6b2QWf9
o+ackH7IkQZyjNj7DQIDAQAB
-----END PUBLIC KEY-----';
	
/**
1)ddbill_public_key，多的宝公钥，每个商家对应一个固定的多的宝公钥（不是使用工具生成的密钥merchant_public_key，不要混淆），
即为多的宝商家后台"公钥管理"->"多的宝公钥"里的绿色字符串内容,复制出来之后调成4行（换行位置任意，前面三行对齐），
并加上注释"-----BEGIN PUBLIC KEY-----"和"-----END PUBLIC KEY-----"
2)demo提供的ddbill_public_key是测试商户号1111110166的智付公钥，请自行复制对应商户号的智付公钥进行调整和替换。
3）使用多的宝公钥验证时需要调用openssl_verify函数进行验证,需要在php_ini文件里打开php_openssl插件
*/
	$ddbill_public_key = '-----BEGIN PUBLIC KEY-----
MIGfMA0GCSqGSIb3DQEBAQUAA4GNADCBiQKBgQCgdZaJb+SDmQqAbLGPHPOjEF03bmsL/
OkKqppF/R20JZZRQXNZLynyt0+itcF8oGcK5iQSvN1VnhtV7fM94DrvS8aMrxzk9IB893
/4Cun5vcxCygI4RjlVDO/1tYuFstjwidAReKxAoMbgtuzXziodp7WpWrabKrJnpQXLgpD
A8QIDAQAB  
-----END PUBLIC KEY-----';




?>