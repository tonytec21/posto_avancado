<?php
session_start();
include('../../../controller/db_functions.php');

if (isset($_POST['subimit'])) {
unset($_POST['subimit']);
INSERT_POST('certidao',$_POST);
###header('location:../autenticacao.php');
##volta a pagina anterior o codigo abaixo
header('Location: ' . $_SERVER['HTTP_REFERER']);

}










 ?>
