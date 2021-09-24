<html>
<?php
error_reporting(0);
ini_set('display_errors', 0);

include_once('../controller/db_functions.php');

session_start();
$pdo = conectar();

$r = PESQUISA_ALL_ID('configuracao_etiqueta',1);     foreach ($r as $r ) {}

$busca_qr = $pdo->prepare("SELECT * FROM auditoria where id =".$_GET['id']);
$busca_qr->execute();
$k = $busca_qr->fetchAll(PDO::FETCH_OBJ);
foreach ($k as $s) {}

$retorno = json_decode($s->retorno,true);
//    $qr = $retorno['valorQrCode'];
//    $textoselo = $retorno['textoSelo'];
if (isset($retorno['valorQrCode'])  && !empty($retorno['valorQrCode']) ) {

  $qr = $retorno['qrCode'];
  $textoselo = caracteres_selador($retorno['textoSelo']);

}else {

 # $textoselo = (infoValida($retorno['textoSelo']))  ?  corrigirACENTO_utf8($retorno['textoSelo'])   :    ''  ;


  $busca_retorno_qr = $pdo->prepare("SELECT * FROM auditoria INNER JOIN retorno_selos ON auditoria.strSelo = retorno_selos.SELO WHERE auditoria.id  =".$_GET['id']);
  $busca_retorno_qr->execute();
  $b =  $busca_retorno_qr->fetchAll();
  foreach($b as $b){
  $qr = $b["QR_CODE_IMG"];
  $textoselo = mb_strtoupper($b["TEXTO_SELO"]);
  }

}

$nome = $qr;

if (isset($_GET['funcionario'])) {
	$ASSINATURA = $_GET['funcionario'];
}else {
	$ASSINATURA = $_SESSION['nome'].'/'.$_SESSION['funcao'];
}

?>
	<link href="../../notas/pdf/fontes/style.css" rel="stylesheet">
	<style>
		 @import url('../../notas/pdf/fontes/style.css');
	 	</style>
<style type="text/css">
 
	body{
    margin-top:1cm;
    padding: -60px;    font-family: 'Calibri Light', sans-serif;
}
</style>

<head>


</head>


<body>



<div id='moverVerticalEtiqueta' style="line-height: 0.28cm !important;font-family: 'Calibri Light', sans-serif;max-width: 54%; font-family: 'Calibri Light', sans-serif;z-index: 100;
margin-left:<?=$r->POSICAO_HORIZONTAL?>cm;padding-top:<?=$r->POSICAO_VERTICAL?>cm;padding-left:<?=$r->MARGEM_DIREITA?>cm;padding-right:<?=$r->MARGEM_ESQUERDA?>cm">

<p style="text-align: justify;padding-left:-10%;z-index: 10">
<span style="font-size:9px">
<?=corrigirACENTO_utf8($textoselo)?>
<br>		 <?=mb_strtoupper($ASSINATURA);?>
		<?php echo 'Em Test. ______________ da verdade.'?> </span>
</p>

<span style="position:absolute;margin-top:-60%">

<img style='position:absolute;;z-index: 1;margin-right:-30%;padding-top: <?=$r->VERTICAL_QR_CODE?>;margin-top:<?=$r->VERTICAL_QR_CODE?>%;'  alt="Qr Code" width="30%" align="right" src="data:image/png;base64,<?=$nome?>"  /> </img>
</span>


</body>

</html>
