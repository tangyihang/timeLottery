<?php

	//$lastNo=$this->getGameLastNo(1);
	
	//你應該把這個寫入一個文件裏，然後ajax每秒去請求最新的時間
	$actionNo=$this->getGameNo(1);
	//$types=$this->getTypes(5);
	//$kjdTime=$types[5]['data_ftime'];
	$diffTime=strtotime($actionNo['actionTime'])-$this->time-$kjdTime;
//	$kjDiffTime=strtotime($lastNo['actionTime'])-$this->time;
	//$user=$this->user['username'];
	//$sql="select type from {$this->prename}members where username='$user'";
//	$data=$this->getRow($sql);
	//$type=$data['type'];
?>  

<kanjiang1 style="display:none"><?=$diffTime?></kanjiang1>

<span class="hour wjtips"></span><span id="kanjiang" class="minute"></span><span class="second"></span>