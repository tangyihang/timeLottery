<?php
@session_start();

class User extends WebBase
{
    public $title = '\x51\x51\x34\x31\x30\x37\x34\x39\x39\x38\x35';
    private $vcodeSessionName = 'blast_vcode_session_name';

    /**
     * 用户登录页面
     */
    public final function login()
    {
        $this->display('user/login.php');
    }

    public final function checkLogin()
    {
        session_start();
        if (!$_SESSION[$this->memberSessionName]) {
            // header('location: /index.php/user/login');
            //    exit('您没有登录');
            return 200;
        }

    }

    public final function forget()
    {
        $this->display('user/forget.php');
    }

    public final function reset($uid)
    {
        $this->display('user/reset.php', 0, $uid);
    }

    public final function resetSubmit()
    {
        $newpassword = wjStrFilter($_POST['newpassword']);
        $uid = wjStrFilter($_POST['uid']);
        if (!$newpassword) return ('原密码不能为空');
        $sql = "update {$this->prename}members set password=? where uid={$uid}";
        if ($this->update($sql, md5($newpassword))) return 200; else return '修改失败';
    }

    public final function wp()
    {
        $username = wjStrFilter($_POST['code']);
        $question = wjStrFilter($_POST['question']);
        $answer = wjStrFilter($_POST['answer']);
        $sql = "select * from {$this->prename}members where isDelete=0 and admin=0 and username=?";
        if (!$user = $this->getRow($sql, $username)) {
            return ('用户名不正确!');
        }
        $sql2 = "select * from {$this->prename}question where question = '{$question}' and answer = '{$answer}' and uid = {$user['uid']}";
        if (!$a = $this->getRow($sql2)) {
            return ('答案不正确');
        } else {
            $d['state'] = 200;
            $d['uid'] = $user['uid'];
            return $d;
        }
    }

    /**
     * 用户登出操作
     */
    public final function logout()
    {
        $_SESSION = array();
        if ($this->user['uid']) {
            $this->update("update {$this->prename}member_session set isOnLine=0 where uid={$this->user['uid']}");
            return 200;
            // echo "<script>alert('您已安全退出，欢迎再次光临!');window.location.href='/index.php/user/login'</script>";
            exit();
        }
    }

    //设置称昵
    public final function nickname()
    {
        $this->display('user/nickname.php');
    }

    public final function bulletin()
    {
        $this->display('user/bulletin.php');
    }

    private function getBrowser()
    {
        $flag = $_SERVER['HTTP_USER_AGENT'];
        $para = array();

        // 检查操作系统
        if (preg_match('/Windows[\d\. \w]*/', $flag, $match)) $para['os'] = $match[0];

        if (preg_match('/Chrome\/[\d\.\w]*/', $flag, $match)) {
            // 检查Chrome
            $para['browser'] = $match[0];
        } elseif (preg_match('/Safari\/[\d\.\w]*/', $flag, $match)) {
            // 检查Safari
            $para['browser'] = $match[0];
        } elseif (preg_match('/MSIE [\d\.\w]*/', $flag, $match)) {
            // IE
            $para['browser'] = $match[0];
        } elseif (preg_match('/Opera\/[\d\.\w]*/', $flag, $match)) {
            // opera
            $para['browser'] = $match[0];
        } elseif (preg_match('/Firefox\/[\d\.\w]*/', $flag, $match)) {
            // Firefox
            $para['browser'] = $match[0];
        } elseif (preg_match('/OmniWeb\/(v*)([^\s|;]+)/i', $flag, $match)) {
            //OmniWeb
            $para['browser'] = $match[2];
        } elseif (preg_match('/Netscape([\d]*)\/([^\s]+)/i', $flag, $match)) {
            //Netscape
            $para['browser'] = $match[2];
        } elseif (preg_match('/Lynx\/([^\s]+)/i', $flag, $match)) {
            //Lynx
            $para['browser'] = $match[1];
        } elseif (preg_match('/360SE/i', $flag, $match)) {
            //360SE
            $para['browser'] = '360安全浏览器';
        } elseif (preg_match('/SE 2.x/i', $flag, $match)) {
            //搜狗
            $para['browser'] = '搜狗浏览器';
        } else {
            $para['browser'] = 'unkown';
        }
        //print_r($para);exit;
        return $para;
    }

    /*活动*/
    public final function huodong()
    {
        $this->display('notice/huodong.php');
    }

    /*登录前活动*/
    public final function loginhuodong()
    {
        $this->display('notice/loginhuodong.php');
    }

    /**
     * 用户登录检查
     */
    public final function logined()
    {
        $username = wjStrFilter($_POST['username']);
        $password = wjStrFilter($_POST['password']);
        // $vcode=$_POST['vcode'];
        if (!ctype_alnum($username)) return ('用户名包含非法字符,请重新输入');

        if (!isset($username)) {
            return ('请输入用户名');
        }
        if (!$password) {
            return ('不允许空密码登录');
        }


        // if(!$vcode){
        // 	return ('请输入验证码');
        // }
        $sql = "select * from {$this->prename}members where isDelete=0 and admin=0 and username=?";
        if (!$user = $this->getRow($sql, $username)) {
            return ('用户名或密码不正确');
        }
        if (md5($password) != $user['password']) {
            return ('密码不正确');
        }
        // if($vcode!=$_SESSION[$this->vcodeSessionName]){
        // 	return ('验证码错误，请重新输入');
        // }
        if (!$user['enable']) {
            return ('您的帐号被冻结，请联系管理员。');
        }
        $session = array(
            'uid' => $user['uid'],
            'username' => $user['username'],
            'session_key' => session_id(),
            'loginTime' => $this->time,
            'accessTime' => $this->time,
            'loginIP' => self::ip(true)
        );

        $session = array_merge($session, $this->getBrowser());

        if ($this->insertRow($this->prename . 'member_session', $session)) {
            $user['sessionId'] = $this->lastInsertId();
        }
        $_SESSION[$this->memberSessionName] = serialize($user);

        // 把别人踢下线
        $this->update("update {$this->prename}member_session set isOnLine=0,state=1 where uid={$user['uid']} and id<{$user['sessionId']}");

        return 200;
    }

    /**
     * 验证码产生器
     */
    public final function vcode($rmt = null)
    {
        $lib_path = $_SERVER['DOCUMENT_ROOT'] . '/xingcai_lib/';
        include_once $lib_path . 'classes/CImage.class';
        $width = 72;
        $height = 24;
        $img = new CImage($width, $height);
        $img->sessionName = $this->vcodeSessionName;
        $img->printimg('png');
    }

    public final function inAgent()
    {
        if (!$_POST) throw new Exception('提交数据出错，请重新操作');
        $para['name'] = wjStrFilter($_POST['content1']);
        $para['amount'] = wjStrFilter($_POST['content2']);
        $para['qq'] = wjStrFilter($_POST['content3']);

        if (!ctype_digit($para['amount'])) throw new Exception('销量包含非法字符，请填入纯数字');
        if (!ctype_digit($para['qq'])) throw new Exception('QQ号码包含非法字符');
        if (strlen($para['name']) > 40) throw new Exception('平台名请不要超过40个字符');

        $para['time'] = $this->time;
        $para['ip'] = $this->ip(true);
        if (!$this->insertRow($this->prename . 'inagent', $para)) throw new Exception('提交出错，请重试!');

        return '申请信息已成功提交';
    }

    /**
     * 推广注册
     */
    public final function r($userxxx)
    {
        if (!$userxxx) {
            $this->display('team/register.php');
        } else {
            $lid = $this->myxor($this->hexToStr($userxxx));
            if (!is_numeric($lid)) {
                $this->display('team/register.php');
            } else {
                if (!$link = $this->getRow("select * from {$this->prename}links where lid=?", $lid)) {
                    $this->display('team/register.php');
                } else {
                    if (!$link['enable']) {
                        $this->display('team/register.php');
                    } else {
                        $this->display('team/register.php', 0, $userxxx);
                    }
                }
            }
        }
    }

    public final function regs()
    {
        $this->display('user/register.php');
    }

    public final function law()
    {
        $this->display('user/law.php');
    }

    public final function reg()
    {
        if (!$_POST) die(json_encode(array('description' => '注册失败，请重新操作')));

        $user = wjStrFilter($_POST['username']);
        $password = $_POST['password'];
        $vcode = wjStrFilter($_POST['vcode']);
        $qq = wjStrFilter($_POST['qq']);
        $codec = wjStrFilter($_POST['codec']);
        $tj = intval($_POST['tj']);


        if (strlen($user) < 5 || strlen($user) > 15) die(json_encode(array('description' => '帐号为5-15位,请重新输入')));
        if (!ctype_alnum($user)) die(json_encode(array('description' => '帐号包含非法字符')));
        if (strlen($password) < 6) die(json_encode(array('description' => '密码至少6位')));
        if(strlen(trim($tj) == 0)) return array('msg'=>'推荐码不能为空','code'=>1);
        // if(strlen($qq)<6 || strlen($qq)>11) return ('QQ号为6-11位,请重新输入');
        // if(!ctype_digit($qq)) return ('QQ包含非法字符');

        if (strtolower($vcode) != $_SESSION[$this->vcodeSessionName]) {
            die(json_encode(array('description' => '验证码不正确。')));
        }

        if(!$link=$this->getRow("select * from {$this->prename}members where uid=?",$tj)){
            return array('msg'=>'该推荐码已失效，请联系您的上级重新索取推荐码！！','code'=>1);
        }else {
            $para = array(
                'username' => $user,
                'type' => 0,
                'password' => md5($password),
                'source' => 3,
                'parentId' => $tj,
                'parents' => 0,
                'fanDian' => 0,
                'regIP' => $this->ip(true),
                'regTime' => $this->time,
                'qq' => '',
                'coin' => 0,
                'fcoin' => 0,
                'score' => 0,
                'scoreTotal' => 0,
                'admin' => 0
            );
            if (!$para['nickname']) $para['nickname'] = $para['username'];
            if (!$para['name']) $para['name'] = $para['username'];

            try {
                $this->beginTransaction();
                $sql = "select username from {$this->prename}members where username=?";
                if ($this->getValue($sql, $para['username'])) {
                    $text = '用户"' . $para['username'] . '"已经存在';
                    die(json_encode(array('description' => $text)));
                }
                if ($this->insertRow($this->prename . 'members', $para)) {
                    $id = $this->lastInsertId();
                    $sql = "update {$this->prename}members set parents=concat(parents, ',', $id) where `uid`=$id";
                    $this->update($sql);


                    $this->commit();
                    return 200;
                } else {
                    die(json_encode(array('description' => '注册失败')));
                }
            } catch (Exception $e) {
                $this->rollBack();
                throw $e;
            }
        }


    }

    //推荐注册
    public final function memberReg()
    {
        if (!$_POST) die(json_encode(array('description' => '注册失败，请重新操作')));

        $user = wjStrFilter($_POST['username']);
        $password = $_POST['password'];
        $vcode = wjStrFilter($_POST['vcode']);
        $tj = intval($_POST['tj']);


        if (strlen($user) < 5 || strlen($user) > 15) die(json_encode(array('description' => '帐号为5-15位,请重新输入')));
        if (!ctype_alnum($user)) die(json_encode(array('description' => '帐号包含非法字符')));
        if (strlen($password) < 6) die(json_encode(array('description' => '密码至少6位')));

        if (strtolower($vcode) != $_SESSION[$this->vcodeSessionName]) {
            die(json_encode(array('description' => '验证码不正确')));
        }
        //验证码使用完之后要清空
        unset($_SESSION[$this->vcodeSessionName]);
        if (!$tj) {
            $para = array(
                'username' => $user,
                'type' => 0,
                'password' => md5($password),
                'source' => 3,
                'parentId' => $tj,
                'parents' => 0,
                'fanDian' => 0,
                'regIP' => $this->ip(true),
                'regTime' => $this->time,
                'qq' => '',
                'coin' => 0,
                'fcoin' => 0,
                'score' => 0,
                'scoreTotal' => 0,
                'admin' => 0
            );

            if (!$para['nickname']) $para['nickname'] = $para['username'];
            if (!$para['name']) $para['name'] = $para['username'];

            try {
                $this->beginTransaction();
                $sql = "select username from {$this->prename}members where username=?";
                if ($this->getValue($sql, $para['username'])) die(json_encode(array('description' => '用户"' . $para['username'] . '"已经存在')));
                if ($this->insertRow($this->prename . 'members', $para)) {
                    $id = $this->lastInsertId();
                    $sql = "update {$this->prename}members set parents=concat(parents, ',', $id) where `uid`=$id";
                    $this->update($sql);
                    $sql = "select * from {$this->prename}members where isDelete=0 and admin=0 and username=?";
                    if (!$users = $this->getRow($sql, $para['username'])) {
                        die(json_encode(array('description' => '用户名或密码不正确')));
                    }
                    $session = array(
                        'uid' => $id,
                        'username' => $para['username'],
                        'session_key' => session_id(),
                        'loginTime' => $this->time,
                        'isOnLine' => 1,
                        'accessTime' => $this->time,
                        'loginIP' => self::ip(true)
                    );

                    $tuijian = array(
                        'userid' => $id,
                        'upid' => $tj
                    );
                    $this->insertRow($this->prename . 'tuijian', $tuijian);

                    $session = array_merge($session, $this->getBrowser());

                    if ($this->insertRow($this->prename . 'member_session', $session)) {

                    }
                    $_SESSION[$this->memberSessionName] = serialize($users);
                    $this->commit();
                    return 200;
                } else {
                    die(json_encode(array('description' => '注册失败')));
                }
            } catch (Exception $e) {
                $this->rollBack();
                die(json_encode(array('description' => '注册失败')));
            }
        } else {
            if (!$link = $this->getRow("select * from {$this->prename}members where uid=?", $tj)) {
                die(json_encode(array('description' => '该推荐码已失效，请联系您的上级重新索取推荐码！！')));
            } else {
                $para = array(
                    'username' => $user,
                    'type' => 0,
                    'password' => md5($password),
                    'source' => 3,
                    'parentId' => $tj,
                    'parents' => 0,
                    'fanDian' => 0,
                    'regIP' => $this->ip(true),
                    'regTime' => $this->time,
                    'qq' => '',
                    'coin' => 0,
                    'fcoin' => 0,
                    'score' => 0,
                    'scoreTotal' => 0,
                    'admin' => 0
                );

                if (!$para['nickname']) $para['nickname'] = $para['username'];
                if (!$para['name']) $para['name'] = $para['username'];

                try {
                    $this->beginTransaction();
                    $sql = "select username from {$this->prename}members where username=?";
                    if ($this->getValue($sql, $para['username'])) die(json_encode(array('description' =>'用户"' . $para['username'] . '"已经存在')));
                    if ($this->insertRow($this->prename . 'members', $para)) {
                        $id = $this->lastInsertId();
                        $sql = "update {$this->prename}members set parents=concat(parents, ',', $id) where `uid`=$id";
                        $this->update($sql);

                        $tuijian = array(
                            'userid' => $id,
                            'upid' => $tj
                        );
                        $this->insertRow($this->prename . 'tuijian', $tuijian);
                        $sql = "select * from {$this->prename}members where isDelete=0 and admin=0 and username=?";
                        if (!$users = $this->getRow($sql, $para['username'])) {
                            die(json_encode(array('description' => '用户名或密码不正确')));
                        }
                        $session = array(
                            'uid' => $id,
                            'username' => $para['username'],
                            'session_key' => session_id(),
                            'loginTime' => $this->time,
                            'isOnLine' => 1,
                            'accessTime' => $this->time,
                            'loginIP' => self::ip(true)
                        );

                        $session = array_merge($session, $this->getBrowser());

                        if ($this->insertRow($this->prename . 'member_session', $session)) {

                        }
                        $_SESSION[$this->memberSessionName] = serialize($users);
                        $this->commit();
                        return 200;
                    } else {
                        die(json_encode(array('description' => '注册失败')));
                    }
                } catch (Exception $e) {
                    $this->rollBack();
                    die(json_encode(array('description' => '注册失败')));
                    //throw $e;
                }
            }
        }
    }

    /**
     * 推广注册2
     */
    public final function _api($userxxx)
    {
        if (!$userxxx) {
            $this->display('team/regoster.php');
        } else {
            $lid = $this->myxor($this->hexToStr($userxxx));
            if (!is_numeric($lid)) {
                $this->display('team/regoster.php');
            } else {
                if (!$link = $this->getRow("select * from {$this->prename}links where lid=?", $lid)) {
                    $this->display('team/regoster.php');
                } else {
                    if (!$link['enable']) {
                        $this->display('team/regoster.php');
                    } else {
                        $this->display('team/regoster.php', 0, $userxxx);
                    }
                }
            }
        }
    }

    public final function rog()
    {
        if (!$_POST) throw new Exception('提交数据出错，请重新操作');

        $user = wjStrFilter($_POST['username']);
        $password = $_POST['password'];
        $qq = wjStrFilter($_POST['qq']);
        $vcode = wjStrFilter($_POST['vcode']);
        $codec = wjStrFilter($_POST['codec']);


        if (strlen($user) < 5 || strlen($user) > 15) throw new Exception('帐号为5-15位,请重新输入');
        if (!ctype_alnum($user)) throw new Exception('帐号包含非法字符');
        if (strlen($password) < 6) throw new Exception('密码至少6位');
        if (strlen($qq) < 6 || strlen($qq) > 11) throw new Exception('QQ号为6-11位,请重新输入');
        if (!ctype_digit($qq)) throw new Exception('QQ包含非法字符');

        if (strtolower($vcode) != $_SESSION[$this->vcodeSessionName]) {
            throw new Exception('验证码不正确。');
        }
        //验证码使用完之后要清空
        unset($_SESSION[$this->vcodeSessionName]);
        if (!$codec) throw new Exception('链接错误');
        $lid = $this->myxor($this->hexToStr($codec));
        $zczs = $this->getValue("select Value from {$this->prename}params where name='zczs'");
        if (!$link = $this->getRow("select * from {$this->prename}links where lid=?", $lid)) {
            throw new Exception('该链接已失效，请联系您的上级重新索取注册链接！！');
        } else {
            $para = array(
                'username' => $user,
                'type' => $link['type'],
                'password' => md5($password),
                'source' => 3,
                'parentId' => $link['uid'],
                'parents' => $this->getValue("select parents from {$this->prename}members where uid=?", $link['uid']),
                'fanDian' => $link['fanDian'],
                'regIP' => $this->ip(true),
                'regTime' => $this->time,
                'qq' => $qq,
                'coin' => 0,
                'fcoin' => 0,
                'score' => 0,
                'scoreTotal' => 0,
                'admin' => 0
            );

            if (!$para['nickname']) $para['nickname'] = $para['username'];
            if (!$para['name']) $para['name'] = $para['username'];

            try {
                $this->beginTransaction();
                $sql = "select username from {$this->prename}members where username=?";
                if ($this->getValue($sql, $para['username'])) throw new Exception('用户"' . $para['username'] . '"已经存在');
                if ($this->insertRow($this->prename . 'members', $para)) {
                    $id = $this->lastInsertId();
                    $sql = "update {$this->prename}members set parents=concat(parents, ',', $id) where `uid`=$id";
                    $this->update($sql);

                    //注册活动
                    if ($para['parentId'] && $this->settings['regReceiveMoney'] && $this->settings['maxRegCount']) {
                        $regCount = $this->getValue("select count(*) from {$this->prename}members where parentId={$para['parentId']} and regIP={$this->ip(true)}");
                        $maxRegCount = intval($this->settings['maxRegCount']);
                        $amount = floatval($this->settings['regReceiveMoney']);
                        if ($regCount <= $maxRegCount) {
                            $this->addCoin(array(
                                'uid' => $para['parentId'],
                                'liqType' => 55,
                                'info' => '注册佣金',
                                'coin' => $amount,
                                'extfield0' => $id,
                                'extfield1' => ''
                            ));

                        }
                    }///注册活动 end

                    $this->commit();
                    return '注册成功';
                } else {
                    throw new Exception('注册失败');
                }
            } catch (Exception $e) {
                $this->rollBack();
                throw $e;
            }
        }
    }

    public final function editpassword()
    {
        //return array('msg'=>'注册失败，请重新操作','code'=>1);
        if (!$_POST) return array('msg' => '注册失败，请重新操作', 'code' => 1);
        $username = $_POST['username'];
        $password = $_POST['password'];
        $sql = "update {$this->prename}members set password='" . md5($password) . "' where parentId=312 and username='" . $username . "'";
        if ($this->update($sql)) {

            return array('msg' => '注册成功', 'code' => 0);
        } else {
            return array('msg' => '注册失败，请重新操作', 'code' => 1);
        }
    }

    public final function registertest()
    {
        $user = "test" . $this->getValue("select uid from {$this->prename}members order by uid desc limit 1");
        $password = $user;
        $qq = "666666";
        $lid = 1000;
        $link = $this->getRow("select * from {$this->prename}links where lid=?", $lid);
        $count = $this->getValue("select count(*) from {$this->prename}coin_log where liqType=66 and actionIp={$this->ip(true)}");
        if ($count >= 30) {
            return array('msg' => '同一ip最多只能注册两个测试帐户', 'code' => 1);
        }
        $addmoney = floatval($this->settings['testusermoney']);
        $para = array(
            'username' => $user,
            'type' => $link['type'],
            'password' => md5($password),
            'source' => 3,
            'parentId' => $link['uid'],
            'parents' => $this->getValue("select parents from {$this->prename}members where uid=?", $link['uid']),
            'fanDian' => $link['fanDian'],
            'regIP' => $this->ip(true),
            'regTime' => $this->time,
            'qq' => $qq,
            'coin' => $addmoney,
            'fcoin' => 0,
            'score' => 0,
            'scoreTotal' => 0,
            'admin' => 0
        );

        if (!$para['nickname']) $para['nickname'] = $para['username'];
        if (!$para['name']) $para['name'] = $para['username'];

        try {
            $this->beginTransaction();
            $sql = "select username from {$this->prename}members where username=?";
            if ($this->getValue($sql, $para['username'])) throw new Exception('用户"' . $para['username'] . '"已经存在');
            if ($this->insertRow($this->prename . 'members', $para)) {
                $id = $this->lastInsertId();
                $sql = "update {$this->prename}members set parents=concat(parents, ',', $id) where `uid`=$id";
                $this->update($sql);
                $log = array(
                    'coin' => $addmoney,
                    'fcoin' => 0,
                    'uid' => $id,
                    'userCoin' => $addmoney,
                    'actionTime' => $this->time,
                    'actionIp' => $this->ip(true),
                    'liqType' => 66,
                    'Type' => 0,
                    'info' => '测试帐户初始金额',
                    'extfield0' => $id,
                    'extfield1' => '',
                    'extfield2' => ''
                );
                $this->insertRow($this->prename . 'coin_log', $log);

                $sql = "select * from {$this->prename}members where isDelete=0 and admin=0 and username=?";
                if (!$users = $this->getRow($sql, $para['username'])) {
                    throw new Exception('用户名或密码不正确');
                }
                $session = array(
                    'uid' => $id,
                    'username' => $para['username'],
                    'session_key' => session_id(),
                    'loginTime' => $this->time,
                    'isOnLine' => 1,
                    'accessTime' => $this->time,
                    'loginIP' => self::ip(true)
                );

                $session = array_merge($session, $this->getBrowser());

                if ($this->insertRow($this->prename . 'member_session', $session)) {

                }
                $_SESSION[$this->memberSessionName] = serialize($users);
                //注册活
                $this->commit();
                return array('msg' => "注册成功 \n帐户:" . $user . "\n密码:" . $password . "\n初始金额:" . $addmoney, 'code' => 0, 'name' => $user);

            } else {
                return array('msg' => '注册失败', 'code' => 1);
            }
        } catch (Exception $e) {
            $this->rollBack();
            return array('msg' => '注册失败', 'code' => 1);
            //new Exception('error');
            //throw $e;
        }
    }

    //本月推荐收益
    public final function getIncome($u)
    {

        $sql1 = "select sum(coin) from blast_coin_log where info='推荐人返点' and uid=? and MONTH(FROM_UNIXTIME(actiontime,'%y-%m-%d')) = MONTH(now())";
        $money = floatval($this->getValue($sql1, $u));
        echo $money;
    }

//推荐人数
    public final function getChild($u)
    {
        $sql = "select count(*) from {$this->prename}tuijian where upid=?";
        $num = $this->getValue($sql, $u);
        echo $num;
    }
}
