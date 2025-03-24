<?php

require '../classes/ExcelFileHandler.php';
require '../classes/Db_provider.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['columns']) && isset($_POST['tableName']) && is_array($_POST['columns'])) {
        $tableName = $_POST['tableName'];
        $columns = $_POST['columns'];

        if (isset($_FILES['sheet']) && $_FILES['sheet']['error'] == UPLOAD_ERR_OK) {
            $file_tmp_path = $_FILES['sheet']['tmp_name'];
            $file_name = $_FILES['sheet']['name'];
            $file_size = $_FILES['sheet']['size'];
            $file_type = $_FILES['sheet']['type'];

            $upload_dir = '../../uploads/';
            $dest_file_path = $upload_dir . $file_name;

            if (move_uploaded_file($file_tmp_path, $dest_file_path)) {
                $data = getExcelData($dest_file_path);
                insertDataToDatabase($columns, $data, $tableName);
            } else {
                echo 'Problem przy przenoszeniu pliku';
            }
        } else {
            echo 'Błąd podczas wczytywania pliku';
        }
    }
} else {
    echo 'błąd';
}

function getExcelData($file)
{
    $sheet = new ExcelFileHandler();
    $data = $sheet->readFile($file);
    return $data;
}

function insertDataToDatabase($columns, $data, $tableName)
{
    $db = new Db_provider();
    $db->insertData($columns, $data, $tableName);
}
