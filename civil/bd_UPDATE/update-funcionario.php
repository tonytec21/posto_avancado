<?php
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];

if ($_POST['strConfirmaSenha'] != $_POST['strSenha']) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
	$_SESSION['erro'] = "OS CAMPOS SENHA E CONFIRMAÇÃO DE SENHA DEVEM SER IGUAIS ";
}

if (isset($_POST['subimit'])) {
unset($_POST['subimit']);
unset($_POST['strConfirmaSenha']);

UPDATE_CAMPO_ID('funcionario','strPermissaoAssinar',$_POST['strPermissaoAssinar'],$id);
UPDATE_CAMPO_ID('funcionario','strNomeCompleto',$_POST['strNomeCompleto'],$id);
UPDATE_CAMPO_ID('funcionario','strCargo',$_POST['strCargo'],$id);
UPDATE_CAMPO_ID('funcionario','strCelular',$_POST['strCelular'],$id);
UPDATE_CAMPO_ID('funcionario','strTelefone',$_POST['strTelefone'],$id);
UPDATE_CAMPO_ID('funcionario','strEmail',$_POST['strEmail'],$id);
UPDATE_CAMPO_ID('funcionario','strUsuario',$_POST['strUsuario'],$id);
UPDATE_CAMPO_ID('funcionario','strSenha',$_POST['strSenha'],$id);

//header('location:pesquisa-tdpj-selo.php');
//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
}







 ?>
