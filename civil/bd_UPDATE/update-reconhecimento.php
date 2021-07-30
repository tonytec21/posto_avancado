<?php
include('../../../controller/db_functions.php');

session_start();
$id = $_GET['id'];


if (isset($_POST['subimit'])) {
unset($_POST['subimit']);


UPDATE_CAMPO_ID('reconhecimento','strSeloCV',$_POST['strSeloCV'],$id);
UPDATE_CAMPO_ID('reconhecimento','strCodigoAto',$_POST['strCodigoAto'],$id);
UPDATE_CAMPO_ID('reconhecimento','valorEmolumento',$_POST['valorEmolumento'],$id);
UPDATE_CAMPO_ID('reconhecimento','valorFerj',$_POST['valorFerj'],$id);
UPDATE_CAMPO_ID('reconhecimento','valorFinal',$_POST['valorFinal'],$id);
UPDATE_CAMPO_ID('reconhecimento','dataAto',$_POST['dataAto'],$id);
UPDATE_CAMPO_ID('reconhecimento','strTipoFirma',$_POST['strTipoFirma'],$id);
UPDATE_CAMPO_ID('reconhecimento','qtdSelo',$_POST['qtdSelo'],$id);
UPDATE_CAMPO_ID('reconhecimento','strNome',$_POST['strNome'],$id);
UPDATE_CAMPO_ID('reconhecimento','seloGratuito',$_POST['seloGratuito'],$id);
UPDATE_CAMPO_ID('reconhecimento','seloGratuitoJustificativa',$_POST['seloGratuitoJustificativa'],$id);
//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'FORMULÁRIO ATUALIZADO (RECONHECIMENTO)';

}







 ?>
