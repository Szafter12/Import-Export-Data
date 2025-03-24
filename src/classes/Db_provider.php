<?php

require 'db_conn.php';

class Db_provider extends Db_conn
{
    public function insertData($data)
    {
        $pdo = $this->conn();
        $stmt = $pdo->prepare('INSERT INTO users (name, surname, age) VALUES (:name, :surname, :age)');
        $stmt->execute($data);
    }
}
