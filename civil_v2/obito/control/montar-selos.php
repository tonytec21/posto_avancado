<?php 
include('../../controller/db_functions.php');
$pdo = conectar();

$id_registro = $_POST['id'];
$natureza = $_POST['natureza'];
die(montarselo($id_registro, $natureza));

?>