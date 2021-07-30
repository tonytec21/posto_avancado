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

	<style>
@page {
 
 margin: 2cm;

max-width: 100%;

}

h2{
    text-align: center;
}

p{
    font-size: 14px;
    text-align: left;
}
td{
	border: 1px solid black;
	}
div{
	display: inline-block;
	padding: 10px;
	word-wrap: break-word;
	width: 4cm!important;
	height: 4,5cm!important;
	margin-left: -1.8%;
	margin-bottom: -70px;
	margin-right:  90px;


}

</style>
	<title><h2 style="text-align: center"> AVERBAÇÕES DE <?=date('d/m/Y', strtotime($data_inicial))?> até <?=date('d/m/Y', strtotime($data_final))?> </h2> </title>
</head>

<body style="max-width: 100%">

<?php for ($i=0; $i <$quantidade ; $i++) : ?>

<?php foreach ($b as $k) :?>
	<?php if (!isset($_GET['anotacao'])): ?>
<?php if ($numero == $posicao): ?>
		<div>
			<br><br><br><br><br>

	

<h4 style="display: inline;">Livro: <?=$k->strLivro?></h4>
<h4 style="display: inline; margin-left: 30px">Folha: <?=$k->strFolha?> </h4>
<p style="text-align: justify;">
	<?=$k->strAverbacao?>
</p>
<span><b><i><?=$_SESSION['nome']?></i></b></span>
</div>
<?php if ($count == 3): $count = 0;?>
	<br><br><br>
<?php endif ?>
<?php else: ?>
			<div style="display: none;">
				<br><br><br><br><br>
<h4 style="display: inline;">Livro: <?=$k->strLivro?></h4>
<h4 style="display: inline; margin-left: 30px">Folha: <?=$k->strFolha?> </h4>
<p style="text-align: justify;">
 
</p>

</div>
<?php if ($count == 3): $count = 0;?>
	<br><br><br>
<?php endif ?>
<?php endif ?>

<?php else: ?>
<?php if ($numero == $posicao): ?>
		<div>
			<br><br><br><br><br>

	

<h4 style="display: inline;">Livro: <?=$k->LIVRO?></h4>
<h4 style="display: inline; margin-left: 30px">Folha: <?=$k->FOLHA?> </h4>
<p style="text-align: justify;">
	<?=$k->ANOTACAO?>
</p>
<span><b><i><?=$_SESSION['nome']?></i></b></span>
</div>
<?php if ($count == 3): $count = 0;?>
	<br><br><br>
<?php endif ?>
<?php else: ?>
			<div style="display:none">
				<br><br><br><br><br>
<h4 style="display: inline;">Livro: <?=$k->LIVRO?></h4>
<h4 style="display: inline; margin-left: 30px">Folha: <?=$k->FOLHA?> </h4>
<p style="text-align: justify;">

</p>

</div>
<?php if ($count == 3): $count = 0;?>
	<br><br><br>
<?php endif ?>
<?php endif ?>
<?php endif ?>

<?php if ($numero == 12):break; ?>
	
<?php endif ?>
<?php  $numero ++;$count++ ;endforeach;?>
<?php endfor ?>
</body>
</html>
