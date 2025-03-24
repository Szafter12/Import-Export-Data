<?php
require '../../vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelFileHandler
{
    private $spreadsheet;

    public function readFile($file)
    {
        $this->spreadsheet = IOFactory::load($file);
        $sheet = $this->spreadsheet->getActiveSheet();
        $data = $sheet->toArray();
        return $data;
    }
}
