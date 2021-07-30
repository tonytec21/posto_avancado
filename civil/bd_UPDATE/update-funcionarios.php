<?php
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];

UPDATE_CAMPO_ID('funcionario','strPermissaoAssinar',strtoupper($_POST['strPermissaoAssinar']),$id);
UPDATE_CAMPO_ID('funcionario','strNomeCompleto',strtoupper($_POST['strNomeCompleto']),$id);
UPDATE_CAMPO_ID('funcionario','strCargo',strtoupper($_POST['strCargo']),$id);
UPDATE_CAMPO_ID('funcionario','strCelular',strtoupper($_POST['strCelular']),$id);
UPDATE_CAMPO_ID('funcionario','	strTelefone',strtoupper($_POST['strTelefone']),$id);
UPDATE_CAMPO_ID('funcionario','	strEmail',strtoupper($_POST['strEmail']),$id);

if (isset($_POST['strSenha']) && $_POST['strSenha']!='') {
UPDATE_CAMPO_ID('funcionario','	strSenha',strtoupper($_POST['strSenha']),$id);
}




header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'DADOS ALTERADOS';







 ?>
