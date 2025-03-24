<?php

require '../classes/ExcelFileHandler.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['sheet']) && $_FILES['sheet']['error'] == UPLOAD_ERR_OK) {
        $file_tmp_path = $_FILES['sheet']['tmp_name'];
        $file_name = $_FILES['sheet']['name'];
        $file_size = $_FILES['sheet']['size'];
        $file_type = $_FILES['sheet']['type'];

        $upload_dir = '../../uploads/';
        $dest_file_path = $upload_dir . $file_name;

        if (move_uploaded_file($file_tmp_path, $dest_file_path)) {
            read($dest_file_path);
        } else {
            echo 'Problem przy przenoszeniu pliku';
        }
    } else {
        echo 'Błąd podczas wczytywania pliku';
    }
} else {
    echo 'błąd';
}

function read($file)
{
    $sheet = new ExcelFileHandler();
    $sheet->readFile($file);
}
