<?php 
ob_start();

if (isset($_POST['setImpressoraTermica']) && $_POST['setImpressoraTermica']!='') {
include_once ("config_paginas/averbacao-civil-termica.php");
}
else{
include_once ("config_paginas/averbacao.php");
}
$html = ob_get_contents();

ob_end_clean();

require_once ('dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
if (isset($_POST['setImpressoraTermica']) && $_POST['setImpressoraTermica']!='') {
$papel = array(0,0,100,250);
$dompdf->setPaper($papel, 'landscape');
}
else{
$dompdf->setPaper('A4', 'portrait');	
}
$dompdf->render();
$pdf = $dompdf->output();
$dompdf->stream("Etiqueta.pdf", array("Attachment" => false));

header('Content-type: application/pdf; charset=utf-8');
echo $pdf;
 ?>