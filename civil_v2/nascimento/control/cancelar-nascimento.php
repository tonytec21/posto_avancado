<?php 
include('../../controller/db_functions.php');
$pdo = conectar();
session_start();


$id = $_GET['id'];
$funcionario = $_SESSION['nome'];
$data = date('d/m/Y H:i');
$texto = addslashes($_POST['motivocancelamento']);


$motivo = "REGISTRO CANCELADO EM: ".$data;
$motivo .= ", POR ".$funcionario;
$motivo .= ", MOTIVO INDICADO: ".$texto;


$in_table_add = $pdo->prepare("INSERT INTO `bookc`.`info_registros_civil` (`id_registro_nascimento`, `inteiro_teor`, `observacoes_registro`, `obs_visivel_certidao`) VALUES ('$id', '', '$motivo', 'C');");
	$in_table_add->execute();

UPDATE_CAMPO_ID("registro_nascimento_novo", "status", "CAN", $id);

captura_acao_arquivo($motivo, $funcionario, date('d/m/Y'), date('H:i'));
header('Location: ' . $_SERVER['HTTP_REFERER']);
?>

