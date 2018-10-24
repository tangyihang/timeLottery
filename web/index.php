<?php

if (!function_exists('getallheaders')) {
    function getallheaders() {
        foreach ($_SERVER as $name => $value) {
            if ($name == 'HTTP_X_CALL') {
                $headers['x-call'] = $value;
            } elseif ($name == 'HTTP_X_FORM_CALL') {
                $headers['x-form-call'] = $value;
            } elseif (substr($name, 0, 5) == 'HTTP_') {
                $headers[str_replace(' ', '-', ucwords(strtolower(str_replace('_', ' ', substr($name, 5)))))] = $value;
            }
        }
        return $headers;
    }
}

require 'xingcai_lib/core/DBAccess.class';
require 'xingcai_lib/core/Object.class';
require 'xingcai_back/WebBase.class.php';
require 'xingcai_back/WebLoginBase.class.php';

require 'xingcai_config.php';
require 'common.php';
//require 'common1.php'
$para = array();
jumpWap();
if (isset($_SERVER['PATH_INFO'])) {
    $para = explode('/', substr($_SERVER['PATH_INFO'], 1));
    if ($control = array_shift($para)) {
        if (count($para)) {
            $action = array_shift($para);
        } else {
            $action  = $control;
            $control = 'index';
        }
    } else {
        $control = 'index';
        $action  = 'main';
    }
} else {
    $control = 'index';
    $action  = 'main';
}
$control = ucfirst($control);

if (strpos($action, '-') !== false) {
    list($action, $page) = explode('-', $action);
}

$file = $conf['action']['modals'] . $control . '.class.php';
if (!is_file($file)) {
    notfound('找不到控制器');
}

try {
    require $file;
} catch (Exception $e) {
    print_r($e);
    exit;
}

if (!class_exists($control)) {
    notfound('找不到控制器1');
}

$jms             = new $control($conf['db']['dsn'], $conf['db']['user'], $conf['db']['password']);
$jms->debugLevel = $conf['debug']['level'];

if (!method_exists($jms, $action)) {
    notfound('方法不存在');
}

$reflection = new ReflectionMethod($jms, $action);
if ($reflection->isStatic()) {
    notfound('不允许调用Static修饰的方法');
}

if (!$reflection->isFinal()) {
    notfound('只能调用final修饰的方法');
}

$jms->controller = $control;
$jms->action     = $action;

$jms->charset  = $conf['db']['charset'];
$jms->cacheDir = $conf['cache']['dir'];
$jms->setCacheDir($conf['cache']['dir']);
$jms->actionTemplate = $conf['action']['template'];
$jms->prename        = $conf['db']['prename'];
$jms->title          = $conf['web']['title'];
if (method_exists($jms, 'getSystemSettings')) {
    $jms->getSystemSettings();
}

if ($jms->settings['switchWeb'] == '0') {
    $jms->display('close-service.php');
    exit;
}

if (isset($page)) {
    $jms->page = $page;
}

if ($q = $_SERVER['QUERY_STRING']) {
    $para = array_merge($para, explode('/', $q));
}
if ($para == null) {
    $para = array();
}

$jms->headers = getallheaders();
if (isset($jms->headers['x-call'])) {
    // 函数调用
    header('content-Type: application/json');
    try {
        ob_start();
        echo json_encode($reflection->invokeArgs($jms, $_POST));
        ob_flush();
    } catch (Exception $e) {
        $jms->error($e->getMessage(), true);
    }
} elseif (isset($jms->headers['x-form-call'])) {

    // 表单调用
    $accept = strpos($jms->headers['Accept'], 'application/json') === 0;
    if ($accept) {
        header('content-Type: application/json');
    }

    try {
        ob_start();
        if ($accept) {
            echo json_encode($reflection->invokeArgs($jms, $_POST));
        } else {
            json_encode($reflection->invokeArgs($jms, $_POST));
        }
        ob_flush();
    } catch (Exception $e) {
        $jms->error($e->getMessage(), true);
    }
} elseif (strpos($jms->headers['Accept'], 'application/json') === 0) {
    // AJAX调用
    header('content-Type: application/json');
    try {
        echo json_encode(call_user_func_array(array($jms, $action), $para));
    } catch (Exception $e) {
        $jms->error($e->getmessage());
    }
} else {
    // 普通请求
    header('content-Type: text/html;charset=utf-8');
    call_user_func_array(array($jms, $action), $para);
}
$jms = null;

function notfound($message) {
    header('content-Type: text/plain; charset=utf8');
    header('HTTP/1.1 404 Not Found');
    die($message);
}

/*移动端判断*/
function isMobile() {
    // 如果有HTTP_X_WAP_PROFILE则一定是移动设备
    if (isset($_SERVER['HTTP_X_WAP_PROFILE'])) {
        return true;
    }
    // 如果via信息含有wap则一定是移动设备,部分服务商会屏蔽该信息
    if (isset($_SERVER['HTTP_VIA'])) {
        // 找不到为flase,否则为true
        return stristr($_SERVER['HTTP_VIA'], "wap") ? true : false;
    }
    // 脑残法，判断手机发送的客户端标志,兼容性有待提高
    if (isset($_SERVER['HTTP_USER_AGENT'])) {
        $clientkeywords = array('nokia',
            'sony',
            'ericsson',
            'mot',
            'samsung',
            'htc',
            'sgh',
            'lg',
            'sharp',
            'sie-',
            'philips',
            'panasonic',
            'alcatel',
            'lenovo',
            'iphone',
            'ipod',
            'blackberry',
            'meizu',
            'android',
            'netfront',
            'symbian',
            'ucweb',
            'windowsce',
            'palm',
            'operamini',
            'operamobi',
            'openwave',
            'nexusone',
            'cldc',
            'midp',
            'wap',
            'mobile',
        );
        // 从HTTP_USER_AGENT中查找手机浏览器的关键字
        if (preg_match("/(" . implode('|', $clientkeywords) . ")/i", strtolower($_SERVER['HTTP_USER_AGENT']))) {
            return true;
        }
    }
    // 协议法，因为有可能不准确，放到最后判断
    if (isset($_SERVER['HTTP_ACCEPT'])) {
        // 如果只支持wml并且不支持html那一定是移动设备
        // 如果支持wml和html但是wml在html之前则是移动设备
        if ((strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') !== false) && (strpos($_SERVER['HTTP_ACCEPT'], 'text/html') === false || (strpos($_SERVER['HTTP_ACCEPT'], 'vnd.wap.wml') < strpos($_SERVER['HTTP_ACCEPT'], 'text/html')))) {
            return true;
        }
    }
    return false;
}

function jumpWap() {
    if (isMobile()) {
        $host    = $_SERVER['HTTP_HOST'];
        $h_array = explode('.', $host);
        if (count($h_array) > 3) {
            unset($h_array[0]);
            $wap = 'http://m.' . implode('.', $h_array);
            header("location:" . $wap);exit;
        } else {
            $wap = 'http://m.xyy6868.com';
            header("location:" . $wap);exit;
        }
    }
}