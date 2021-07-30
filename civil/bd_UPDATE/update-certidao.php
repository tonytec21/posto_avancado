<?php
include('../../../controller/db_functions.php');

session_start();
$id = $_GET['id'];


if (isset($_POST['subimit'])) {
unset($_POST['subimit']);
var_dump($_POST);

UPDATE_CAMPO_ID('certidao','strTipoRegistro',$_POST['strTipoRegistro'],$id);
UPDATE_CAMPO_ID('certidao','strMatricula',$_POST['strMatricula'],$id);
UPDATE_CAMPO_ID('certidao','strNumOrdem',$_POST['strNumOrdem'],$id);
UPDATE_CAMPO_ID('certidao','strProtocolo',$_POST['strProtocolo'],$id);
UPDATE_CAMPO_ID('certidao','strModalidade',$_POST['strModalidade'],$id);
UPDATE_CAMPO_ID('certidao','strGratuito',$_POST['strGratuito'],$id);
UPDATE_CAMPO_ID('certidao','strTituloCertidao',$_POST['strTituloCertidao'],$id);
UPDATE_CAMPO_ID('certidao','strDataCertidao',$_POST['strDataCertidao'],$id);
UPDATE_CAMPO_ID('certidao','strTextoCertidao',$_POST['strTextoCertidao'],$id);
//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'FORMULÁRIO ATUALIZADO (CERTIDÃO)';

}







 ?>
