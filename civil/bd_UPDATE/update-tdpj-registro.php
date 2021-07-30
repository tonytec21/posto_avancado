
﻿<?php
include('../../../controller/db_functions.php');

session_start();
$id = $_GET['id'];


if (isset($_POST['subimit'])) {
unset($_POST['subimit']);
var_dump($_POST);

UPDATE_CAMPO_ID('tdpj_registro','setTipoDocumento',$_POST['setTipoDocumento'],$id);
UPDATE_CAMPO_ID('tdpj_registro','strNumOrdem',$_POST['strNumOrdem'],$id);
UPDATE_CAMPO_ID('tdpj_registro','strLivro',$_POST['strLivro'],$id);
UPDATE_CAMPO_ID('tdpj_registro','strFolha',$_POST['strFolha'],$id);
UPDATE_CAMPO_ID('tdpj_registro','dataTdpjRegistro',$_POST['dataTdpjRegistro'],$id);
UPDATE_CAMPO_ID('tdpj_registro','strNaturezaTitulos',$_POST['strNaturezaTitulos'],$id);
UPDATE_CAMPO_ID('tdpj_registro','strNome',$_POST['strNome'],$id);
UPDATE_CAMPO_ID('tdpj_registro','strCPF',$_POST['strCPF'],$id);

//header('location:pesquisa-tdpj-selo.php');
//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'FORMULÁRIO ATUALIZADO (TDPJ REGISTRO)';

}







 ?>
