<?php 

include_once('../../controller/db_functions.php');
session_start();
$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];
$id = $_POST['id'];
$pdo = conectar();

if (isset($_GET['anotacao'])) {
$b = PESQUISA_ALL_ID('anotacoes_civil', $id);	
}
else{
$b = PESQUISA_ALL_ID('averbacoes_civil', $id);
}
$posicao = $_POST['posicao'];
$numero = 1;
$count = 1;
$quantidade =12;
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

<style type="text/css">
	body{padding: -10px;font-size: 70%;padding-top: 10px;}
</style>
	<title><h2 style="text-align: center"> AVERBAÇÕES DE <?=date('d/m/Y', strtotime($data_inicial))?> até <?=date('d/m/Y', strtotime($data_final))?> </h2> </title>
</head>

<body style="max-width: 100%; padding-left: 10%;">

<?php foreach ($b as $k) :?>
	<?php if (!isset($_GET['anotacao'])): ?>
		<div>
<?php
        $retorno = json_decode($k->RETORNOSELODIGITAL,true);
        $qr = $retorno['valorQrCode'];
        $textoselo = $retorno['textoSelo'];

        include_once('../../../plugins/phpqrcode/qrlib.php');
        $img_local = "qrimagens/";
        $img_nome = $k->ID.'averb.png';
        $nome = $img_local.$img_nome;

        $conteudo = $qr;
        QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);



        ?>
       

   
        <img style="position: absolute;width: 29%;margin-left: 85%;margin-top: -30%;"  src="<?=$nome?>" />

<p style="text-align: justify;margin-top: -30px; margin-left: -30px; padding: -10px;font-weight: bold; font-size: 46%;width: 98%; margin-bottom: -40px;">
	<?=mb_strtoupper($k->strAverbacao)?><br>
        </p>

        <p style="margin-top: 40%; margin-bottom: -70px; font-weight: bold; margin-left: -10%;"> <span style="font-size: 40%;"><?=mb_strtoupper($_SESSION['nome'])?></span> - Livro: <?=$k->strLivro?> Folha: <?=$k->strFolha?></p>



	
   

       
   

</div>
<?php else: ?>
<div style="margin-left: -20px">
<p style="text-align: justify;margin-top: -70%; padding: -10px;font-size: 70%!important">
	<?=$k->ANOTACAO?>
</p>

<p style="margin-top: -1%; margin-bottom: -70px; font-weight: bold;"> <span style="font-size: 40%;"><?=mb_strtoupper($_SESSION['nome'])?></span> - Livro: <?=$k->LIVRO?> Folha: <?=$k->FOLHA?></p>
</div>
<?php endif ?>
<?php endforeach ?>

</body>
</html>
