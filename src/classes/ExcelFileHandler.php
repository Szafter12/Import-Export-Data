<?php
require '../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelFileHandler {
    private $folder;
    private $spreadsheet;

    public function __construct($folder) {
        $this->folder = `../../{$folder}/`;

        if (!is_dir($this->folder)) {
            mkdir($this->folder, 0777, true);
        }

        $this->spreadsheet = new Spreadsheet();
    }

}

$activateWorksheet = $spreadsheet->getActiveSheet();
$activateWorksheet->setCellValue('A1', 'Hello World !');

$fileName = $folderName . 'hello_world.xlsx';

$writer = new Xlsx($spreadsheet);
$writer->save($fileName);
