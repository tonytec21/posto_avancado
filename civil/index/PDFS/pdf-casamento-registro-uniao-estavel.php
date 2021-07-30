<?php 
ob_start();

include_once ("config_paginas/registro-casamento-homoafetivo.php");

$html = ob_get_contents();

ob_end_clean();

require_once ('dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();
$pdf = $dompdf->output();
$dompdf->stream("Etiqueta.pdf", array("Attachment" => false));

header('Content-type: application/pdf; charset=utf-8');
echo $pdf;
 ?>