<?php
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];
var_dump($_POST);
if (empty($_POST['seloGratuito'])) {
	$_POST['seloGratuito'] = 'N';
	$_POST['seloGratuitoJustificativa'] = '';
}

if (isset($_POST['subimit'])) {
unset($_POST['subimit']);

UPDATE_CAMPO_ID('selo_fisico','setTipoSelo',$_POST['setTipoSelo'],$id);
UPDATE_CAMPO_ID('selo_fisico','strAto',$_POST['strAto'],$id);
UPDATE_CAMPO_ID('selo_fisico','dataAto',$_POST['dataAto'],$id);
UPDATE_CAMPO_ID('selo_fisico','strNumero',$_POST['strNumero'],$id);
UPDATE_CAMPO_ID('selo_fisico','strSelo',$_POST['strSelo'],$id);
UPDATE_CAMPO_ID('selo_fisico','strLivro',$_POST['strLivro'],$id);
UPDATE_CAMPO_ID('selo_fisico','strFolha',$_POST['strFolha'],$id);
UPDATE_CAMPO_ID('selo_fisico','strNumeroPapel',$_POST['strNumeroPapel'],$id);
UPDATE_CAMPO_ID('selo_fisico','strTipoPapel',$_POST['strTipoPapel'],$id);
UPDATE_CAMPO_ID('selo_fisico','intQuantidade',$_POST['intQuantidade'],$id);
UPDATE_CAMPO_ID('selo_fisico','strSeloInicial',$_POST['strSeloInicial'],$id);
UPDATE_CAMPO_ID('selo_fisico','strSeloFinal',$_POST['strSeloFinal'],$id);
UPDATE_CAMPO_ID('selo_fisico','strTotalSelo',$_POST['strTotalSelo'],$id);
UPDATE_CAMPO_ID('selo_fisico','fltValorAto',$_POST['fltValorAto'],$id);
UPDATE_CAMPO_ID('selo_fisico','fltValorFerj',$_POST['fltValorFerj'],$id);
UPDATE_CAMPO_ID('selo_fisico','fltValorEmol',$_POST['fltValorEmol'],$id);
UPDATE_CAMPO_ID('selo_fisico','fltValorFerc',$_POST['fltValorFerc'],$id);


//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'ALTERADO COM ÊXITO';

}







 ?>
