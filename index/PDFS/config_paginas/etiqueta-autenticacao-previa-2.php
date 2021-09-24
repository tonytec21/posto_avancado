<?php

include_once('../../controller/db_functions.php');
session_start();
ini_set('default_charset','UTF-8');
$pdo = conectar();
$r = PESQUISA_ALL_ID('configuracao_etiqueta',3);     foreach ($r as $r ) {}
	if (isset($_POST['posicao'])) {
	$POSICAO = $_POST['posicao'];
}else {
	$POSICAO = NULL;
}
	if (isset($_POST['funcionario'])) {
	$ASSINATURA = $_POST['funcionario'];
}else {
	$ASSINATURA = NULL;
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">


	<title>ETIQUETAS</title>
	<link href="font/calibri.css" rel="stylesheet">
	<style>
		 @import url('font/calibri.css');
	 	</style>
<style type="text/css">
	body{padding: -60px;    font-family: 'Calibri Light', sans-serif;
}
</style>
</head>

<body>




	<?php
	$quantidade = 1;
	$numero_selo = 'AUTENT99999XXXXXXXXXXXXXXXZXX';
	$counttd = 0;
	?>



<?php
for ($numero=1; $numero <=$quantidade ; $numero++):
?>

<div id='moverVerticalEtiqueta' style="max-width: 60%; font-family: 'Calibri Light', sans-serif;z-index: 100;
margin-left:<?=$r->POSICAO_HORIZONTAL?>cm;padding-top:<?=$r->POSICAO_VERTICAL?>cm;padding-left:<?=$r->MARGEM_DIREITA?>cm;padding-right:<?=$r->MARGEM_ESQUERDA?>cm">

<p style="text-align: justify;padding-left:-10%;z-index: 10">
<span style="line-height: 0.28cm !important;font-family: 'Calibri Light', sans-serif; font-size: 11px;letter-spacing: 0.7px;">
<center><b><span style="font-size:9px">Poder Judiciário - TJMA <br>Nº_SELO AUTENT99999XXXXXXXXXXXXXXXZXX </span></b></center>
Certifico e dou fé que esta fotocópia é reprodução fiel do original, autenticando-a nos termos do art. 7º da Lei 8935/94,
<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h):
$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
foreach ($u as $u):?> <?=$u->cidade?>/<?=$u->uf?>
<?php endforeach  ?>
<?php endforeach ?>.
		Data/Hora: 13/01/2020 21:26:08, Ato: 13.18, Total: R$ 4,50, Emolumentos: R$ 4,40, FERC: R$ 0,10, Consulte a validade deste selo em https://selo.tjma.jus.br.
	</span> </p>

<span style="position:absolute;margin-top:-70%">

<img style='position:absolute;;z-index: 1;margin-right:-28%;padding-top: <?=$r->VERTICAL_QR_CODE?>;margin-top:<?=$r->VERTICAL_QR_CODE?>%;'  alt="Qr Code" width="32%" align="right" src='data:image/png;base64,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' /> </img>
</span>

<!--  -->
<div style="position:absolute;line-height:0.15cm;margin-top: 100%;">
<div style="position:fixed;margin-top: <?=$r->POSICAO_VERTICAL+64?>%">
<hr style=" max-width: 6cm; margin-left: 2%;opacity: .7; ;border:0.3px solid black;">
<p style="letter-spacing: 0.7px;margin-left: -2%;font-size:8px;margin-top: -<?=$r->POSICAO_VERTICAL+5.5?>px;text-align: center;margin-bottom: -30%">NOME/ESCREVENTE</p>
</div>
<!--  -->
	</div>
</div>



	<?php if ($numero!=$quantidade): ?>
	<span style="page-break-before: always;"></span>
	<?php endif ?>



<?php endfor; ?>


</body>
</html>
