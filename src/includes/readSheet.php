<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require '../classes/ExcelFileHandler.php';
require '../classes/Db_provider.php';

$response = [
    'status' => 'failed',
    'message' => 'unknown error'

];

try {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        if (isset($_POST['columns']) && isset($_POST['tableName']) && is_array($_POST['columns'])) {
            $tableName = $_POST['tableName'];
            $columns = $_POST['columns'];

            if (!preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $tableName)) {
                response('invalid table name');
            }

            if (count($columns) === 0) {
                response('columns cannot be empty');
            }

            $uniqueColumns = array_unique($columns);
            if (count($columns) !== count($uniqueColumns)) {
                response('columns must be unique');
            }

            foreach ($columns as $column) {
                if (!preg_match('/^[a-zA-Z_][a-zA-Z0-9_]*$/', $column)) {
                    response('invalid column name');
                }
            }

            if (isset($_FILES['sheet']) && $_FILES['sheet']['error'] == UPLOAD_ERR_OK) {
                $file_tmp_path = $_FILES['sheet']['tmp_name'];
                $file_name = $_FILES['sheet']['name'];
                $file_size = $_FILES['sheet']['size'];
                $file_type = $_FILES['sheet']['type'];
                $max_file_size = 10 * 1024 * 1024;
                $allowed_extensions = ['xls', 'xlsx'];
                $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);

                if ($file_size > $max_file_size) {
                    response('file size is too large');
                }

                if (!in_array($file_extension, $allowed_extensions)) {
                    response('invalid file extension');
                }

                $upload_dir = '../../uploads/';
                $dest_file_path = $upload_dir . $file_name;

                if (move_uploaded_file($file_tmp_path, $dest_file_path)) {
                    $data = getExcelData($dest_file_path);
                    $message = insertDataToDatabase($columns, $data, $tableName);

                    if ($message['status'] === 'success') {
                        $respons['status'] = 'success';
                        response($message['message']);
                    } else {
                        response($message['message']);
                    }
                } else {
                    response('failed to move file');
                }
            } else {
                response('missing file');
            }
        } else {
            response('missing columns');
        }
    } else {
        response('invalid request method');
    }
} catch (Exception $e) {
    response($e->getMessage());
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
    $message = $db->insertData($columns, $data, $tableName);
    return $message;
}

function response($message)
{
    $response['message'] = $message;
    echo json_encode($response);
    exit;
}
