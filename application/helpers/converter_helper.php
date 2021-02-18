<?php
if (!function_exists('convert')) {

    function convert(string $filename = '')
    {
        $autoload = APPPATH . '../vendor/autoload.php';
        file_exists($autoload) or
            errorMsg::Show('Composer Not Loaded Properly,<br> Please check "' . str_replace('application/', '', APPPATH) . 'vendor/autoload.php" File.');

        is($filename) or errorMsg::Show('Doc file not found.');

        file_exists($autoload) and require_once $autoload;

        $docFile  = new \PhpOffice\PhpWord\Reader\MsDoc();
        $filename = $docFile->load($filename);

        $folder      = 'uploads/documents/';
        $newFileName = time() . '.pdf';
        $rootFile    = APPPATH . '../' . $folder . $newFileName;

        $pdf = new \PhpOffice\PhpWord\Writer\PDF\DomPDF($filename);
        $pdf->save($rootFile);

        return $folder . $newFileName;
    }
}
