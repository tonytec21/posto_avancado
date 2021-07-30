<?php 

include('../../controller/db_functions.php');
session_start();
$pdo = conectar();

$texto_salvar = $_POST['texto_salvar'];
$id_slv = $_POST['id_slv'];
$tipo_slv = $_POST['tipo_slv'];



if ($busca_ja_existe->rowCount()!=0) {
$up = $pdo->prepare("update salvar_editor set TEXTO = '$texto_salvar' where IDREGISTRO = '$id_slv' and TIPO = '$tipo_slv' ");
$up->execute();
}
else{
$in = $pdo->prepare("INSERT into salvar_editor values('$id_slv', '$tipo_slv', '$texto_salvar')");
$in->execute();
}

die('S');

?>