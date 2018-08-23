<?php 
	
	//获取分页的起始
	function Pageinfo($pagesize,$pageindex){

		if (!$pageindex) {
			$pageindex = 1;
		}
		if (!$pagesize) {
			$pagesize = 20;
		}

		$pagestart = ($pageindex-1)* $pagesize;
		return array($pagestart,$pagesize);
	}

	//输出json格式数据
	function opJson($msg,$code,$data=null){
		$info['msg'] = $msg;
		$info['code'] = $code;
		$info['data'] = $data;
		echo  json_encode($info);
		die();
	}

?>