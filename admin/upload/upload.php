<?php

$action = $_GET['action'];

$actions = array('tk', 'up', 'fd');
//�ж��Ƿ���ȷ������
if(! in_array($action, $actions)){
	//����
	exit;
}

$upload = new upload();
$upload->$action();

/**
 * �ϴ���
 * @author ZhouHr   <2014.04.30>
 */
class upload{
	private $_tokenPath = 'uploads/tokens/';            //���Ʊ���Ŀ¼
	private $_filePath = 'uploads/files/';              //�ϴ��ļ�����Ŀ¼

	/**
	 * ��ȡ����
	 */
	public function tk(){
	
		$file['name'] = $_GET['name'];                  //�ϴ��ļ�����
		$file['size'] = $_GET['size'];                  //�ϴ��ļ��ܴ�С
		$file['token'] = md5(json_encode($file['name'] . $file['size']));
		//�ж��Ƿ���ڸ�������Ϣ
		if(! file_exists($this->_tokenPath . $file['token'] . '.token')){
		
			$file['up_size'] = 0;                       //���ϴ��ļ���С
			$pathInfo = pathinfo($file['name']);
			$path = $this->_filePath . date('Ymd') .'/';
			//�����ļ�������Ŀ¼
			if(! is_dir($path)){
				mkdir($path, 0700);
			}
			//�ϴ��ļ�����Ŀ¼
			$file['filePath'] = $path . $file['token'] .'.'. $pathInfo['extension'];
			$file['modified'] = $_GET['modified'];      //�ϴ��ļ����޸�����
			//����������Ϣ
			$this->setTokenInfo($file['token'], $file);
		}
		$result['token'] = $file['token'];
		$result['success'] = true;
		echo json_encode($result);
		
		exit;
	}
	
	
	/**
	 * �ϴ��ӿ�
	 */
	public function up(){
		if('html5' == $_GET['client']){
			$this->html5Upload();
		}
		elseif('form' == $_GET['client']){
			$this->flashUpload();
		}
		else {
			//����
			exit;
		}

	}
	
	/**
	 * HTML5�ϴ�
	 */
	protected function html5Upload(){
		$token = $_GET['token'];
		$fileInfo = $this->getTokenInfo($token);
		
		if($fileInfo['size'] > $fileInfo['up_size']){
			//ȡ���ϴ�����
			$data = file_get_contents('php://input', 'r');
			if(! empty($data)){
				//�ϴ�����д��Ŀ���ļ�
				$fp = fopen($fileInfo['filePath'], 'a');
				flock($fp, LOCK_EX);
				fwrite($fp, $data);
				flock($fp, LOCK_UN);
				fclose($fp);
				//�ۻ��������ϴ��ļ���С
				$fileInfo['up_size'] += strlen($data);
				if($fileInfo['size'] > $fileInfo['up_size']){
					$this->setTokenInfo($token, $fileInfo);
				}
				else {
					//�ϴ���ɺ�ɾ��������Ϣ
					@unlink($this->_tokenPath . $token . '.token');
				}
			}
		}
		$result['start'] = $fileInfo['up_size'];
		$result['success'] = true;
/*		if($id) {
			$this->update("update {$this->prename}params set value =".$this->_tokenPath . $token." where id={$id}");
		}*/
		
		echo json_encode($result);
		exit;
	}
	
	/**
	 * FLASH�ϴ�
	 */
	public function flashUpload(){
	
		//$result['start'] = $fileInfo['up_size'];
		$result['success'] = false;

		echo json_encode($result);
		exit;
	}
	
	/**
	 * �����ļ�����
	 */
	protected function setTokenInfo($token, $data){
		
		file_put_contents($this->_tokenPath . $token . '.token', json_encode($data));
	}

	/**
	 * ��ȡ�ļ�����
	 */
	protected function getTokenInfo($token){
		$file = $this->_tokenPath . $token . '.token';
		if(file_exists($file)){
			return json_decode(file_get_contents($file), true);
		}
		return false;
	}


}//endclass