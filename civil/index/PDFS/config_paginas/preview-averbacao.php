<?php 

include_once('../../controller/db_functions.php');
session_start();

$pdo = conectar();
$livro = $_SESSION['livrotemp'];
$folha = $_SESSION['folhatemp'];

if (isset($_GET['nasc'])) {
$busca = $pdo->prepare("SELECT * FROM `averbacoes_civil` WHERE strLivro ='$livro' and strFolha = '$folha' and strTipo = 'NA' ");
}
if (isset($_GET['obt'])) {
$busca = $pdo->prepare("SELECT * FROM `averbacoes_civil` WHERE strLivro ='$livro' and strFolha = '$folha' and strTipo = 'OB' ");
}
if (isset($_GET['casa'])) {
$busca = $pdo->prepare("SELECT * FROM `averbacoes_civil` WHERE strLivro ='$livro' and strFolha = '$folha' and strTipo = 'CA' ");
}

$busca->execute();


$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">

	<style>
@page {
 
 margin: 1cm;
 margin-top: 2cm;
 margin-left: 2cm;
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
	padding: 10px;
	border: 1px solid dashed;
	margin-top: 10px;
	margin-bottom: 10px;
	width: 50%; 


}

</style>
	<title>AVERBAÇÕES - IMPRESSÃO </title>
</head>

<body style="max-width: 100%">

<h2 style="text-align: center"> AVERBAÇÕES LIVRO: <?=$_SESSION['livrotemp']?> FOLHA: <?=$_SESSION['folhatemp']?> </h2>

<?php foreach ($linhas as $k) :?>


<div>
<h4 style="display: inline;">Livro: <?=$k->strLivro?></h4>
<h4 style="display: inline; margin-left: 30px">Folha: <?=$k->strFolha?> </h4>
<p style="text-align: justify;">
	<?=$k->strAverbacao?>
</p>

</div>

<?php endforeach ?>
<div>
<h4 style="display: inline;">Livro: <?=$livro?></h4>
<h4 style="display: inline; margin-left: 30px">Folha: <?=$folha?> </h4>
<p style="text-align: justify;">
	<?=$_SESSION['averbacaotemp']?>
</p>

</div>
</body>
</html>
