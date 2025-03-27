<?php

require __DIR__ . '/Db_conn.php';

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
                return [
                    'status' => 'failed',
                    'message' => 'Failed to prepare statement'
                ];
            }

            foreach ($data as $row) {
                if (!$stmt->execute($row)) {
                    return [
                        'status' => 'failed',
                        'message' => 'Failed to execute statement'
                    ];
                }
            }
            return [
                'status' => 'success',
                'message' => 'Data inserted successfully'
            ];
        } catch (PDOException $e) {
            return [
                'status' => 'failed',
                'message' => $e->getMessage()
            ];
        }
    }
}
