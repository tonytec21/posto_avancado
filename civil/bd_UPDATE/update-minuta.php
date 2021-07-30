
﻿<?php
include('../../../controller/db_functions.php');

session_start();
$id = $_GET['id'];


if (isset($_POST['subimit'])) {
unset($_POST['subimit']);
var_dump($_POST);

UPDATE_CAMPO_ID('minuta','strTipoMinuta',$_POST['strTipoMinuta'],$id);
UPDATE_CAMPO_ID('minuta','strNaturezaEscritura',$_POST['strNaturezaEscritura'],$id);
UPDATE_CAMPO_ID('minuta','strTituloMinuta',$_POST['strTituloMinuta'],$id);
UPDATE_CAMPO_ID('minuta','strTextoMinuta',$_POST['strTextoMinuta'],$id);


//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'FORMULÁRIO ATUALIZADO (MINUTA)';

}







 ?>
