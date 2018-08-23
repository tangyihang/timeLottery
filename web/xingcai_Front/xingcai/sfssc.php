<?php
$lastNo=$this->getGameLastNo(86);

$zddata = $this->getGameZdData(86,$lastNo['actionNo']);//��ȡָ���ĺ���
$opencode =$zddata?$zddata:randKeys();

header('Content-type: application/xml');
echo'<?xml version="1.0" encoding="utf-8"?>';
echo '<xml><row expect="'.$lastNo['actionNo'].'" opencode="'.$opencode.'" opentime="'.$lastNo['actionTime'].'"/></xml>';

/* �������� */
function randKeys($len=5){
	$rand='';
	for($x=0;$x<$len;$x++){
		srand((double)microtime()*1000000);
		$rand.=($rand!=''?',':'').mt_rand(0,9);
	}
	return $rand;
}
?>