<?php
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];
var_dump($_POST);
if (empty($_POST['seloGratuito'])) {
	$_POST['seloGratuito'] = 'N';
	$_POST['seloGratuitoJustificativa'] = '';
} else {
		$_POST['seloGratuito'] = 'S';
}

if (isset($_POST['subimit'])) {
unset($_POST['subimit']);

UPDATE_CAMPO_ID('autenticacao','strSeloCV',$_POST['strSeloCV'],$id);
UPDATE_CAMPO_ID('autenticacao','strCodigoAto',$_POST['strCodigoAto'],$id);
UPDATE_CAMPO_ID('autenticacao','valorEmolumento',$_POST['valorEmolumento'],$id);
UPDATE_CAMPO_ID('autenticacao','valorFerj',$_POST['valorFerj'],$id);
UPDATE_CAMPO_ID('autenticacao','valorFinal',$_POST['valorFinal'],$id);
UPDATE_CAMPO_ID('autenticacao','dataAto',$_POST['dataAto'],$id);
UPDATE_CAMPO_ID('autenticacao','qtdSelo',$_POST['qtdSelo'],$id);
UPDATE_CAMPO_ID('autenticacao','seloGratuito',$_POST['seloGratuito'],$id);
UPDATE_CAMPO_ID('autenticacao','seloGratuitoJustificativa',$_POST['seloGratuitoJustificativa'],$id);
//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'ALTERADO COM ÊXITO';

}







 ?>
