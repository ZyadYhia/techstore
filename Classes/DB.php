<?php
namespace TechStore\Classes;
abstract class Db{
    protected $conn;
    protected $table;
    public function connect(){
       $this->conn = mysqli_connect(DB_SERVERNAME,DB_USERNAME,DB_PASSWORD,DB_NAME);
    }
    public function selectAll(string $fields = "*"):array{
        $sql = "SELECT $fields FROM $this->table";
        $results = mysqli_query($this->conn,$sql);
        return mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
    public function selectID($id,string $fields = "*"){
        $sql = "SELECT $fields FROM $this->table WHERE id = $id";
        $results = mysqli_query($this->conn,$sql);
        return mysqli_fetch_assoc($results);
    }
    public function selectWhere($conds,string $fields = "*"):array{
        $sql = "SELECT $fields FROM $this->table WHERE $conds";
        $results = mysqli_query($this->conn,$sql);
        return mysqli_fetch_all($results, MYSQLI_ASSOC);
    }
    public function getCount():int{
        $sql = "SELECT COUNT(*) AS cnt FROM $this->table";
        $results = mysqli_query($this->conn,$sql);
        return mysqli_fetch_assoc($results)['cnt'];
    }
    public function insert($fields,$values):bool{
        $sql = "INSERT INTO $this->table ($fields) VALUES ($values)";
        return mysqli_query($this->conn,$sql);
    }
    public function update(string $set,$id):bool{
        $sql = "UPDATE $this->table SET $set WHERE id = $id";
        return mysqli_query($this->conn,$sql);
    }
    public function delete($id):bool{
        $sql = "DELETE FROM $this->table WHERE id = $id";
        return mysqli_query($this->conn,$sql);
    }
}