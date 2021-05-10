<?php

namespace TechStore\Classes\Models;

use TechStore\Classes\Db;

class Product extends Db
{
    public function __construct()
    {
        $this->table = "products";
        $this->connect();
    }
    public function selectID($id, string $fields = "*")
    {
        $sql = "SELECT $fields FROM $this->table JOIN cats ON $this->table.cat_id = cats.id WHERE id = $id";
        $results = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($results);
    }
}
