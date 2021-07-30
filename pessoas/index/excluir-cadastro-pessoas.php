<?php
include('../controller/db_functions.php');
session_start();
$pdo = conectar();
$id = $_GET['id'];


$del = $pdo->prepare("DELETE FROM pessoa where ID = '$id'");

if ($del->execute()) {
	$_SESSION['sucesso'] = "CADASTRO DELETADO COM SUCESSO";
}
else{
	$_SESSION['erro'] = "ERRO AO TENTAR EXCLUIR CADASTRO";
}



header("location:pesquisaPessoas.php");




?>