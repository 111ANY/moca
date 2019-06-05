<?php
class Model extends Sql
{
    protected $model;
    protected $table;
    function __construct()
    {
        $this->connect(DB_HS, DB_UE, DB_PW, DB_NM); // 數據庫連接
        $this->model = rtrim(get_class($this), 'Model'); 
        $this->table = strtolower($this->model);    // 小寫表名與類名一致
    }
    public function isloged()
    {
        (new User)->login(); 

    }
    function __destruct()
    {

    }
}