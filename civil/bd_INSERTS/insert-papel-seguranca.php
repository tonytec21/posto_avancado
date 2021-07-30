<?php
session_start();
include('../../../controller/db_functions.php');

if (isset($_POST['subimit'])) {
unset($_POST['subimit']);
//var_dump($_POST);
$pdo = conectar();
$quantidade = $_POST['QUANTIDADE'];
$NUMEROINICIAL = $_POST['NUMEROINICIAL'];
$EMPRESA = $_POST['EMPRESAPAPEL'];
$papel = $NUMEROINICIAL;
 for ($i=1; $i <=$quantidade ; $i++) { 
 	$in_folha = $pdo->prepare("INSERT INTO folhaseguranca values (NULL, '$EMPRESA', '$NUMEROINICIAL', '$papel','L')");
 	$in_folha->execute();
 	$papel ++;
 }
var_dump($_POST);
//header('location:../pesquisa-tdpj-registro.php');
##volta a pagina anterior o codigo abaixo
$_SESSION['sucesso'] = "FOLHAS CADASTRADAS!";
header('Location: ' . $_SERVER['HTTP_REFERER']);

}



