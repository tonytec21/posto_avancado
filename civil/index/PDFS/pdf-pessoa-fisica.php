<?php 
ob_start();

include_once ("config_paginas/pessoa-fisica.php");

$html = ob_get_contents();

ob_end_clean();

require_once ('dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);

$dompdf->setPaper('a4', 'portrait');
$dompdf->render();
$pdf = $dompdf->output();
$dompdf->stream("Etiqueta.pdf", array("Attachment" => false));

header('Content-type: application/pdf; charset=UTF-8');
echo $pdf;
 ?>