<?php 
include('../../../controller/conexao.php');
$pdo=conectar();
session_start();
var_dump($_FILES);	
var_dump($_POST);	

$extensao = strtolower(substr($_FILES['file']['name'], -4));
	$tipo = strtolower($_FILES['file']['type']);
	$nome = strtolower(($_FILES['file']['name']));
	$novo_nome = utf8_encode($nome);	
	$diretorio = "../remessas/";

$foto = utf8_decode($diretorio.$novo_nome);
$data = date('d/m/y');
move_uploaded_file($_FILES['file']['tmp_name'], $diretorio.$novo_nome);
$_SESSION['sucesso'] = "DADOS PROCESSADOS AVANCE PARA PRÓXIMO PASSO".$total;
$_SESSION['arquivo_remessa'] = $foto;
header('location:bd_INSERTS/leitura.php');




 ?>