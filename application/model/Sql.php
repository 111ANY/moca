<?php 
class Sql
{
    protected $dbHandle;
    protected $result;
    // 數據庫連接
    public function connect($host, $user, $pass, $dbname)
    {
        try {
            $dsn = sprintf("mysql:host=%s;dbname=%s;charset=utf8", $host, $dbname);
            $this->dbHandle = new PDO($dsn, $user, $pass, array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        } catch (PDOException $e) {
            exit('數據庫連接錯誤: '.$e->getMessage());
        }
    }
    // 查詢*
    public function selectAll()
    {
        $sql = sprintf("select * from `%s`", $this->table);
        $sth = $this->dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetchAll();
    }
    // 條件全查詢
    public function selectWAll($id)
    {
        $sql = sprintf("select * from `%s` where `no` = '%d'", $this->table, $id);
        $sth = $this->dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }
    // 條件單查詢
    public function selectWOne($name, $id)
    {
        var_dump($this->dbHandle);
        $sql = sprintf("select `%s` from `%s` where `id` = '%s'", $name, $this->table, $id);
        $sth = $this->dbHandle->prepare($sql);
        $sth->execute();
        return $sth->fetch();
    }
    // 條件刪除
    public function delete($id)
    {
        $sql = sprintf("delete from `%s` where `id` = '%s'", $this->table, $id);
        $sth = $this->dbHandle->prepare($sql);
        $sth->execute();
        return $sth->rowCount();
    }
    // 自定義查詢返回影響行數？
    public function query($sql)
    {
        $sth = $this->dbHandle->prepare($sql);
        $sth->execute();
        echo "</br>";
        //var_dump($sth->errorInfo());
        return $sth->rowCount();
    }
    // 數據插入
    public function add($data)
    {
        $sql = sprintf("insert into `%s` %s", $this->table, $this->formatInsert($data));
        return $this->query($sql);
    }
    // 數據修改
    public function update($id, $data)
    {
        $sql = sprintf("update `%s` set %s where `no` = '%s'", $this->table, $this->formatUpdate($data), $id);
        //var_dump($sql);
        return $this->query($sql);
    }
    // 將數組轉換插入格式的sql語句
    private function formatInsert($data)
    {
        $fields = array();
        $values = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s`", $key);
            $values[] = sprintf("'%s'", $value);
        }
        $field = implode(',', $fields);
        $value = implode(',', $values);
 
        return sprintf("(%s) values (%s)", $field, $value);
    }
    // 將數組轉換更新格式的sql語句
    private function formatUpdate($data)
    {
        $fields = array();
        foreach ($data as $key => $value) {
            $fields[] = sprintf("`%s` = %s", $key, $value);
        }
        return implode(',', $fields);
    }
}