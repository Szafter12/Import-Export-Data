<?php

require 'db_conn.php';

class Db_provider extends Db_conn
{
    private $tableName;
    private $columns;

    public function insertData($columns, $data, $tableName)
    {
        $this->columns = $columns;
        $this->tableName = $tableName;
        $columns = implode(',', $this->columns);
        $placeholders = implode(',', array_fill(0, count($this->columns), '?'));

        $pdo = $this->conn();
        $sql = "INSERT INTO $this->tableName ($columns) VALUES ($placeholders)";

        try {
            $stmt = $pdo->prepare($sql);
            if (!$stmt) {
                throw new PDOException("Failed to prepare statement");
            }

            foreach ($data as $row) {
                if (!$stmt->execute($row)) {
                    throw new PDOException("Failed to execute statement");
                }
            }
        } catch (PDOException $e) {
            throw new PDOException("Database error" . $e->getMessage());
        }
    }
}
