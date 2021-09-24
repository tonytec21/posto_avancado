<?php
ob_start();

include_once ("etiqueta-padrao.php");

$html = ob_get_contents();

ob_end_clean();

require_once ('./dompdf/autoload.inc.php');

use Dompdf\Dompdf;

$dompdf = new Dompdf();
$dompdf->set_option("isPhpEnabled", true);

$dompdf->loadHtml($html);

$r = PESQUISA_ALL_ID('configuracao_etiqueta',1);     foreach ($r as $r ) {}
$LARGURA = $r->LARGURA * 10 * 2.84;
$ALTURA = $r->ALTURA * 10 * 2.84;
$papel = array(0,0,$ALTURA,$LARGURA);
$dompdf->setPaper($papel, 'landscape');

$dompdf->render();
$pdf = $dompdf->output();
$dompdf->stream("Etiqueta.pdf", array("Attachment" => false));

header('Content-type: application/pdf; charset=utf-8');
echo $pdf;
 ?>
