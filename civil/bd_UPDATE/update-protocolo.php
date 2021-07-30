<?php
include('../../../controller/db_functions.php');

session_start();
$id = $_GET['id'];


if (isset($_POST['subimit'])) {
unset($_POST['subimit']);


UPDATE_CAMPO_ID('protocolo','strTipoProtocolo',$_POST['strTipoProtocolo'],$id);
UPDATE_CAMPO_ID('protocolo','strNumeroProtocolo',$_POST['strNumeroProtocolo'],$id);
UPDATE_CAMPO_ID('protocolo','strPessoa',$_POST['strPessoa'],$id);
UPDATE_CAMPO_ID('protocolo','strReferencias',$_POST['strReferencias'],$id);
UPDATE_CAMPO_ID('protocolo','txtAnotacoes',$_POST['txtAnotacoes'],$id);
UPDATE_CAMPO_ID('protocolo','strSelo',$_POST['strSelo'],$id);

//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'FORMULÁRIO ATUALIZADO (PROTOCOLO)';

}







 ?>
