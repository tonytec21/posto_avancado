<?php
ob_start();

include_once ("config_paginas/pessoa-fisica-a6.php");

$html = ob_get_contents();

ob_end_clean();

require_once ('dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

$dompdf->setPaper('a6', 'landscape');
$dompdf->render();
$pdf = $dompdf->output();
$dompdf->stream("Etiqueta.pdf", array("Attachment" => false));

header('Content-type: application/pdf; charset=UTF-8');
echo $pdf;
 ?>
