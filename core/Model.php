<?php

require_once ROOT. "/core/Connection.php";

class Model 
{
    protected static string $table;
    protected static string $pk;

    public function __construct()
    {
        $this->conn = Connection::connect();
    }

    public function all(){
        $stmt = $this->conn->prepare("SELECT * FROM " . static::$table);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getByPK($value){
        $stmt = $this->conn->prepare("SELECT * FROM " . static::$table ." WHERE " . static::$pk . '=' . $value);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function save($parameters){
        $sql = sprintf("INSERT INTO %s (%s) VALUES (%s)", static::$table, implode(', ', array_keys($parameters)), ':'.implode(', :', array_keys($parameters)));

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($parameters);
    }

    public function update($id, $parameters){
        $keys = [];
        foreach ($parameters as $key => $value) {
            array_push($keys, $key."='".$value."'");
        }
        $sql = sprintf("UPDATE %s SET %s WHERE %s=%s", static::$table, implode(', ', $keys), static::$pk, $id);

        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function destroy($id){
        $stmt = $this->conn->prepare("DELETE FROM " . static::$table ." WHERE " . static::$pk . "=? LIMIT 1");
        $stmt->execute([$id]);
    }

    public function runSql($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    // getWhere

    public function getWhere($sql){
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetch();
    }

}