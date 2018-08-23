<?php
require_once('admin_sqlin.php');
$conf['debug']['level']=5;

/*		数据库配置		*/
$conf['db']['dsn']='mysql:host=localhost;dbname=vip2018xc';
$conf['db']['user']='root';
$conf['db']['password']='3020x63032979';
$conf['db']['charset']='utf8';
$conf['db']['prename']='Z4r5jk12_';

$conf['safepass']='123456';     //后台登陆安全码

$conf['cache']['expire']=0;
$conf['cache']['dir']='_Y6f9=jyyB9.c,ER#-u/';     //前台缓存目录
$conf['url_modal']=2;
$conf['action']['template']='ADMIN.Front/admin/';
$conf['action']['modals']='ADMIN.Back/admin/';
$conf['member']['sessionTime']=15*60;	// 用户有效时长
$conf['node']['access']='http://localhost:8800';	// node访问基本路径

error_reporting(E_ERROR & ~E_NOTICE);
ini_set('date.timezone', 'asia/shanghai');
ini_set('display_errors', 'Off');