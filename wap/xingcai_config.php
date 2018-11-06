<?php
require_once('xingcai_sqlin.php');
$conf['debug']['level']=5;

/*		��ݿ�����		*/
$conf['db']['dsn']='mysql:host=127.0.0.1;dbname=timelottery;charset=utf8';
$dbname='timelottery';
$dbhost='127.0.0.1';
$conf['db']['user']='root';
$conf['db']['password']='tyh456852';
$conf['db']['charset']='utf8';
$conf['db']['prename']='blast_';

$conf['cache']['expire']=0;
$conf['cache']['dir']='_xingcai__buffer/';

$conf['url_modal']=2;

$conf['action']['template']='xingcai_Front/';
$conf['action']['modals']='xingcai_back/';

$conf['member']['sessionTime']=15*60;	// �û���Чʱ��
$conf['node']['access']='http://localhost:65531';	// node���ʻ�·��

ini_set('date.timezone', 'asia/shanghai');

ini_set('display_errors', 'Off');

if(strtotime(date('Y-m-d',time()))>strtotime(date('Y-m-d',time()))){
	$GLOBALS['fromTime']=strtotime(date('Y-m-d',strtotime("-1 day")));
	$GLOBALS['toTime']=strtotime(date('Y-m-d',time()));
}else{
	
	$GLOBALS['fromTime']=strtotime(date('Y-m-d'));
	$GLOBALS['toTime']=strtotime(date('Y-m-d',strtotime("+1 day")));
}
?>