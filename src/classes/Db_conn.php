<?php

class Db_conn
{
    private $host = 'localhost';
    private $user = 'szafter';
    private $password = 'Karate00200020.';
    private $db_name = 'test';

    protected function conn()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
