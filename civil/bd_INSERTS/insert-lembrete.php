<?php
session_start();
include('../../../controller/db_functions.php');
$pdo = conectar();

if (isset($_GET['id_exclusao'])) {
$id = $_GET['id_exclusao'];	
$del = $pdo->prepare("DELETE FROM lembrete where ID = '$id' ");
$del->execute();
$_SESSION['sucesso'] = 'LEMBRETE DELETADO!';
header('Location: ' . $_SERVER['HTTP_REFERER']);

}

if (!isset($_GET['id_exclusao'])) {
$_POST['id_funcionario'] = $_SESSION['id'];
$_POST['funcionario'] = $_SESSION['nome'];
INSERT_POST('lembrete', $_POST);
$_SESSION['sucesso'] = 'LEMBRETE INSERIDO, VOCÊ SERÁ ALERTADO PELO SISTEMA NO DIA E HORÁRIO DEFINIDOS';
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
 ?>
