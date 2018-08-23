<?php
/**
 * Created by PhpStorm.
 * User: chenhuagui
 * Date: 2017/5/3
 * Time: 09:49
 */



function formatBizQueryParaMap($map, $urlencode = false) {

    ksort($map);
    $result = array();
    foreach ($map as $key => $value) {

        if($value == null) {

            continue;

        }
        if($urlencode) {

            $value = urlencode($value);

        }
        $result[$key] = $value;

    }
    return urldecode(http_build_query($result));

}

function sign($req, $signKey = '') {

    $str = formatBizQueryParaMap($req);
    $req['sign'] = strtoupper(md5($str."&key=".$signKey));
    return $req;

}

function createNoncestr($length) {

    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $res = '';
    for ($i = 0; $i < $length; $i++) {

        $random = mt_rand(0, strlen($chars)-1);
        $res .= $chars{$random};

    }
    return $res;

}

function httpPost($url, $post_data) {

    $data_string = zh_json_encode($post_data);
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
    curl_setopt($curl, CURLOPT_POSTFIELDS,$data_string);
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
    curl_setopt($curl, CURLOPT_TIMEOUT, 30); // 设置超时限制防止死循环
    curl_setopt($curl, CURLOPT_RETURNTRANSFER,true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在

    curl_setopt($curl, CURLOPT_URL, $url); // 要访问的地址
    curl_setopt($curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']); // 模拟用户使用的浏览器
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1); // 使用自动跳转
    curl_setopt($curl, CURLOPT_AUTOREFERER, 1); // 自动设置Referer

    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data_string))
    );
    $result = curl_exec($curl);
    if (curl_errno($curl)) {
        echo 'Errno'.curl_error($curl);//捕抓异常
    }
    curl_close($curl);
    return $result;

}

/**
 * 中文json encode 不转unicode转码
 * @param $array
 * @return string
 */
function zh_json_encode($array) {
    $array = urlencode_array($array);
    return urldecode(json_encode($array));
}

/**
 * 递归多维数组，进行urlencode
 * @param $array
 * @return mixed
 */
function urlencode_array($array) {
    foreach($array as $k => $v) {
        if(is_array($v)) {
            $array[$k] = urlencode_array($v);
        } else {
            $array[$k] = urlencode($v);
        }
    }
    return $array;
}

?>