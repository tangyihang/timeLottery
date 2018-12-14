<?php

/**
 * 与开奖数据有关
 */
class Data extends AdminBase
{
    public $pageSize = 15;
    private $encrypt_key = 'wwwsssaaa';    // 256位随便密码
    private $dataPort = 65531;

    public final function index($type)
    {
        $this->type = $type;
        $this->display('data/index.php');
    }

    public final function add($type, $actionNo, $actionTime)
    {
        $para = array(
            'type' => $type,
            'actionNo' => $actionNo,
            'actionTime' => $actionTime
        );
        if ($type == 63) {
            $this->display('data/add-k3-modal.php', 0, $para);
        } else if ($type == 86) {
            $this->display('data/add-ssc-modal.php', 0, $para);
        } else {
            $this->display('data/add-modal.php', 0, $para);
        }

    }

    public final function updatedata($type, $actionNo, $actionTime)
    {
        $para = array(
            'type' => $type,
            'actionNo' => $actionNo,
            'actionTime' => $actionTime
        );
        $this->display('data/update-modal.php', 0, $para);
    }

    public final function kj()
    {
        $para = $_GET;
        $para['key'] = $this->encrypt_key;
        $url = $GLOBALS['conf']['node']['access'] . '/data/kj';
        echo $this->http_post($url, $para);
    }

    public final function added()
    {
        if (!$this->getValue("select data from {$this->prename}data where type={$_POST['type']} and number='{$_POST['number']}'")) {
            $para['type'] = intval($_POST['type']);
            $para['number'] = $_POST['number'];
            $para['data'] = $_POST['data'];
            $para['time'] = strtotime($_POST['time']);
            try {
                $this->beginTransaction();
                $this->insertRow($this->prename . 'data', $para);
                $this->addLog(17, $this->adminLogType[17] . '[' . $para['data'] . ']', 0, $this->getValue("select shortName from {$this->prename}type where id=?", $para['type']) . '[期号:' . $para['number'] . ']');
                $this->commit();
                return "添加成功！";
            } catch (Exception $e) {
                $this->rollBack();
                throw $e;
            }
        } else {
            try {
                $para['data'] = $_POST['data'];
                $para['time'] = $this->time;
                $this->beginTransaction();
                if ($this->updateRows($this->prename . 'data', $para, 'id=' . $_POST['id'])) {
                    $this->addLog(17, $this->adminLogType[17] . '[' . $para['data'] . ']', 0, $this->getValue("select shortName from {$this->prename}type where id=?", $para['type']) . '[期号:' . $para['number'] . ']');
                    $this->commit();
                    return "添加成功！";
                }
            } catch (Exception $e) {
                $this->rollBack();
                throw $e;
            }
        }
    }

    public final function updatedataed()
    {
        $id = intval($_POST['id']);
        $para['data'] = $_POST['data'];
        $sql = "update {$this->prename}data set data='{$para['data']}' where id={$id}";
        if ($this->update($sql)) {
            echo '修改成功';
        }
    }

    public function http_post($url, $data)
    {
        $data_url = http_build_query($data);
        $data_len = strlen($data_url);

        return file_get_contents($url, false, stream_context_create(array('http' => array('method' => 'POST'
        , 'header' => "Connection: close\r\nContent-Length: $data_len\r\n"
        , 'content' => $data_url
        ))));
    }
}

