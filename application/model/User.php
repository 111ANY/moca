<?php
class User extends Model
{
	protected $model;
	protected $table;
	function __construct()
	{
		$this->connect(DB_HS, DB_UE, DB_PW, DB_NM); // 數據庫連接
	  $this->model = rtrim(get_class($this), 'Model'); 
	  $this->table = strtolower($this->model);    // 小寫表名與類名一致
	}
	public function login()
	{
		//echo "</br>";
		//var_dump($this->table);
      	$session = $_SESSION;
      	if (array_key_exists("id", $_SESSION)) {
          if ($_SESSION['id'] == $this->checkToken($_SESSION['id'])) {
              return 1;
          }
        }
		// else {
		// 	if(true)//$id = $_SESSION['id'])
		// 	  $this->selectWOne("password", "1");
		// }

		// $this->table = "users";
		// $result = $this->selectWAll("1");
		// $_SESSION['id'] = $_SESSION['id'] + 1;
		// var_dump($result['time']);
		// $time = date("Y-m-d H:i:s", time());
		// $token_key = $result['no'].$time.$result['ps'];
		// //var_dump($token_key);
		// //var_dump(sha1($token_key));
		// $a = array('time' => "now()");
		// $this->update("1", $a);
		// var_dump($this->model);
		else {
			$a = array('time' => "now()");
			$this->update("1", $a);
			$_SESSION['token'] = $this->getToken("1");
			$_SESSION['id'] = 1;
		}
	}

	public function checkToken($id)
	{
		return $this->getToken($this->selectWAll($id));
	}	

	private function getToken($id)
	{
		$result = $this->selectWAll($id);
				//var_dump($result);
		$token_key = $result['no'].$result['time'].$result['ps'];
		return sha1($token_key);
	}
}