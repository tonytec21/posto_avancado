<!DOCTYPE html>
<?php include('../../../controller/db_functions.php');
session_start();
#aqui tá pegando o id mandado da página pesquisa
$livro = $_GET['livro'];
$pdo = conectar();
$busca = $pdo->prepare("SELECT * FROM livronotas where intIdUnico = $livro");
$busca->execute();
$linhas = $busca->fetch(PDO::FETCH_ASSOC);
$img = $linhas['imgCabecalho'];
?>
<html>
<head>
	

<style type="text/css">
	@page {

  margin-top: 0;
}

.center{
	text-align: center;

}
.all{

	width: 100%;
}
fieldset{
	padding: 8px;
	font-size: 80%;
}
legend{
	font-size: 60%;
}
table{
	border: 1px solid black;
}
thead{
	border-bottom: 1px solid black;
}
th{
	border-left: 1px solid black;
}

td{
border-left: 1px solid black;
border-bottom: 1px solid black
}
.left{
	float: left;
	font-size: 70%;
}
.right{
	float: right;
	font-size: 70%;
	text-align: center;
}
body{
	font-size: 70%;
}
</style>
</head>

<body>
<?php $b = PESQUISA_ALL_CAMPO('livro_casamentos_auxiliar','identifcadorLivro', $livro);?>

<?php foreach ($b as $b ): if($b->assento!='NULL') : ?>
<?php if ($b->strTermoAbertura !='NULL'):?>
<div>
<div style="padding-top: 1%">
<img style="width: 100%;height: 4cm; margin-top: 10px;" src="../bd_INSERTS/<?=$img?>">
<?=$b->strTermoAbertura?>
</div>
</div>
<?php endif ?>	
<div style="page-break-before: always;">
<div style="padding-top: 1%">
<img style="width: 100%;height: 4cm; margin-top: 10px;" src="../bd_INSERTS/<?=$img?>">
<?=$b->assento?>
</div>
</div>	
<p style=" text-align: right;"><?=$b->PaginaLivro?></p>	
<?php endif;endforeach ?>

</body>
</html>
