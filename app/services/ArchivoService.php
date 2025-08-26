<?php

use PhpOffice\PhpSpreadsheet\IOFactory;

class ArchivoService
{
    public static function procesarArchivo($rutaArchivo)
    {
        if (!file_exists($rutaArchivo)) {
            return false;
        }
        $ext = strtolower(pathinfo($rutaArchivo, PATHINFO_EXTENSION));
        if ($ext === 'csv') {
            $datos = [];
            if (($handle = fopen($rutaArchivo, 'r')) !== false) {
                while (($fila = fgetcsv($handle)) !== false) {
                    $datos[] = $fila;
                }
                fclose($handle);
            }
            return $datos;
        } /*elseif (in_array($ext, ['xls', 'xlsx'])) {
            // Requiere PhpSpreadsheet
            require_once __DIR__ . '/../../vendor/autoload.php';
            $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load($rutaArchivo);
            $sheet = $spreadsheet->getActiveSheet();
            $datos = $sheet->toArray();
            return $datos;
        }*/
        return false;
    }
}
