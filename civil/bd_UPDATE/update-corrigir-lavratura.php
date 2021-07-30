<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];
$pdo = conectar();
ob_start(); //corrigindo o errinho do header

#-------------------------------------------------------------------------------------------------------------------------


if (isset($_POST['subimit4'])) {
unset($_POST['subimit4']);

if ($_POST['strLivro'] == "" || $_POST['strLivro']== NULL || empty($_POST['strLivro'])) {
	$_SESSION['erro'] = 'Algum problema ocorreu, verifique o se o livro esta aberto!';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
break;
}
//inicializar no banco cada ID setTipodeAtoCep correspondente ao livro
//inicializar o primeiro id de cada livro com numero de ordem e ato  = 0


#numero de ordem e do ato:

#numero de ordem e do ato:
UPDATE_CAMPO_ID('notas_lavratura','strTituloMinuta',addslashes(mb_strtoupper($_POST['strTituloMinuta'])),$id);
UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCartorio',addslashes($_POST['strTextoLavraturaCartorio']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strLivro',$_POST['strLivro'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strFolha',$_POST['strFolha'],$id);
UPDATE_CAMPO_ID('notas_lavratura','Ordem',$_POST['Ordem'],$id);
UPDATE_CAMPO_ID('notas_lavratura','numAto',$_POST['Ordem'],$id);

# redirecionar para impressão!!!
header('location:../imprimir/notas-lavratura.php?id='.$id);
$_SESSION['sucesso'] = 'FORMULÁRIO CONCLUIDO (lavratura)';

}

if (isset($_POST['subimit5'])) {
unset($_POST['subimit5']);

if (isset($_POST['setAssinaParte1'])) {
	UPDATE_CAMPO_ID('notas_lavratura','setAssinaParte1',$_POST['setAssinaParte1'],$id);
}

if (isset($_POST['setAssinaParte2'])) {
	UPDATE_CAMPO_ID('notas_lavratura','setAssinaParte2',$_POST['setAssinaParte2'],$id);
}


if (isset($_POST['setAssinaParte3'])) {
	UPDATE_CAMPO_ID('notas_lavratura','setAssinaParte3',$_POST['setAssinaParte3'],$id);
}


if (isset($_POST['setAssinaParte4'])) {
	UPDATE_CAMPO_ID('notas_lavratura','setAssinaParte4',$_POST['setAssinaParte4'],$id);
}


if (isset($_POST['setAssinaParte5'])) {

	$setAssinaParte5 = $_POST['setAssinaParte5'];
	$setAssinaParte5 = implode (',', (array)$setAssinaParte5);
	UPDATE_CAMPO_ID('notas_lavratura','setAssinaParte5',mb_strtoupper($setAssinaParte5),$id);
}


if (isset($_POST['setAssinaParte6'])) {

	$setAssinaParte6 = $_POST['setAssinaParte6'];
	$setAssinaParte6 = implode (',', (array)$setAssinaParte6);
	UPDATE_CAMPO_ID('notas_lavratura','setAssinaParte6',mb_strtoupper($setAssinaParte6),$id);
}


if (isset($_POST['setQualidadeCepParte1'])) {
	UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte1',$_POST['setQualidadeCepParte1'],$id);
}

if (isset($_POST['setQualidadeCepParte2'])) {
	UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte2',$_POST['setQualidadeCepParte2'],$id);
}

if (isset($_POST['setQualidadeCepParte3'])) {
	UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte3',$_POST['setQualidadeCepParte3'],$id);
}

if (isset($_POST['setQualidadeCepParte4'])) {
	UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte4',$_POST['setQualidadeCepParte4'],$id);
}


if (isset($_POST['setQualidadeCepParte5'])) {

	$setQualidadeCepParte5 = $_POST['setQualidadeCepParte5'];
	$setQualidadeCepParte5 = implode (',', (array)$setQualidadeCepParte5);
	UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte5',mb_strtoupper($setQualidadeCepParte5),$id);
}

if (isset($_POST['setQualidadeCepParte6'])) {

	$setQualidadeCepParte6 = $_POST['setQualidadeCepParte6'];
	$setQualidadeCepParte6 = implode (',', (array)$setQualidadeCepParte6);
	UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte6',mb_strtoupper($setQualidadeCepParte6),$id);
}

header('location:../corrigir-notas-lavratura.php?conf4=ok&id='.$id);
$_SESSION['sucesso'] = 'DADOS DO CADASTRO FORAM ATUALIZADOS !!!';
//$_SESSION['sucesso'] = 'PRÉVIA SALVA, VOCÊ PODE VISUALIZAR AGORA!';

}

if (isset($_POST['subimit6'])) {
unset($_POST['subimit6']);

UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCartorio',addslashes($_POST['strTextoLavraturaCartorio']),$id);

UPDATE_CAMPO_ID('notas_lavratura','strTituloMinuta',$_POST['strTituloMinuta'],$id);

header('location:../notas-lavratura-cep-escritura.php?conf4=ok&id='.$id);
$_SESSION['sucesso'] = 'PRÉVIA SALVA, VOCÊ PODE VISUALIZAR AGORA!';

}

 ?>
