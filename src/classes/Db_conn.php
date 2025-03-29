<?php

require_once '../../vendor/autoload.php'; // Ładowanie autoloadera Composera

use Dotenv\Dotenv;

class Db_conn
{
    private $host;
    private $user;
    private $password;
    private $db_name;

    public function __construct()
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/../../'); 
        $dotenv->load();

        $this->host = $_ENV['DB_HOST'];
        $this->user = $_ENV['DB_USER'];
        $this->password = $_ENV['DB_PASSWORD'];
        $this->db_name = $_ENV['DB_NAME'];
    }

    protected function conn()
    {
        $dsn = 'mysql:host=' . $this->host . ';dbname=' . $this->db_name;
        $pdo = new PDO($dsn, $this->user, $this->password);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $pdo;
    }
}
