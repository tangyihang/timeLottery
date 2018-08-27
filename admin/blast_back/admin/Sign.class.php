<?php
class Sign extends AdminBase{
	public $title='签到管理';
	public $pageSize=15;
	
	public final function index(){
		$this->action='sendlist';
		$this->display('sign/index.php');
	}

	public final function signlist(){
		$this->display('sign/list.php');
	}

    public final function senddeleteAll($id){
        $id=wjStrFilter($id);
        $arr = explode("-",$id);
        $ids = implode(",",$arr);
         $sql="delete from {$this->prename}sign_time where id in (".$ids.")";
         $row = $this->exec($sql);
        DIE;
    }


}