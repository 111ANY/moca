<?php
class User extends Sql
{
	protected $model;
	protected $table;
	function __construct()
	{
      $this->connect(DB_HS, DB_UE, DB_PW, DB_NM); // 數據庫連接
	  $this->model = rtrim(get_class($this), 'Model'); 
	  $this->table = strtolower($this->model);    // 小寫表名與類名一致
	}
  	// 判斷是否一登陸
  	public function isloged()
	{
		if (array_key_exists("id", $_SESSION) && array_key_exists("token", $_SESSION)) {
			if ($_SESSION['token'] == $this->checkToken($_SESSION['id'])) {
				return true;
			} else 
				return false;
		} else 
			return false;
	}
  	// 登錄操作
	public function login()
	{
		if ($this->isloged()) 
			return true;
		else {
			$id = $_POST['userName']; 
			$rs = $this->selectWAll("id", $id);
			$pw = $this->getPs($_POST['password']);
			if ( $rs['ps'] == $pw ) {
				$time = array('time' => "now()");
				$this->update($time, "no", $rs['no']);
				$info = $this->selectWAll("no", $rs['no']);
				$_SESSION['token'] = $this->getToken($rs['no'].$info['time'].$rs['ps']);
				$_SESSION['id'] = $rs['no'];
				$_SESSION['identity'] = $info['identity'];
			}
		}
    }
	// 注冊操作
  	public function register()
	{
		extract($_POST); //$userName//$password==$repassword//$select1//$tel
		switch ($select1) {
			case '1':
				$ident = "student";
				break;
			case '2':
				$ident = "teacher";
				break;
			case '3':
				$ident = "counsellor";
				break;
			case '4':
				$ident = "door";
				break;
			default:
				return false;
				break;
        }
        $this->table = $ident;
        if (!$this->selectWAll("no", $userName))
          	return false;
        $this->table = "user";
        $arr = array('identity' => $select1,
                     'ps' => md5($password),
                     'tel' => $tel,
                     'id' => $userName,
                     'time' => "now()" );
        return $this->add($arr);
    }
  	// 檢驗token
 	public function fetchUser($identity) 
	{	
		return $this->selectWnAll("identity", $identity);
	}
  
	private function checkToken($id)
	{
		$result = $this->selectWAll("no", $id);
		$token_key = $result['no'].$result['time'].$result['ps'];
		return $this->getToken($token_key);
	}	

	private function getToken($string)
	{
		return sha1($string);
	}

	private function getPs($string)
	{
		return md5($string);
	}
}