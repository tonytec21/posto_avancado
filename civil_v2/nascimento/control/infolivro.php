<?php 
include('../../controller/db_functions.php');
$pdo = conectar();
$tabela = "livro_nascimentos";

$busca = $pdo->prepare("SELECT * from $tabela  where Status = 'L' ORDER BY LivroInicial ASC LIMIT 1");
$busca->execute();
if ($busca->rowCount()<1) {
	die('{"erro":"Nenhum Livro encontrado"}');
}
else{
	die('{"livro":" Livro encontrado"}');
}
 

 ?>