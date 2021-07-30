<?php 

include('db_functions.php'); 
$pdo = conectar();



$busca_in_table = $pdo->prepare("SELECT * FROM config_atos");
$busca_in_table->execute();
$bt = $busca_in_table->fetchAll(PDO::FETCH_OBJ);
foreach ($bt as $b) {

$up_ato_novo = $pdo->prepare("UPDATE ato_novo set monValor = '$b->EMOLUMENTOS', monValorFerc = '$b->FERC' where strCodigoLei = '$b->COD'");

if ($up_ato_novo->execute()) {
	echo "executou".$b->COD."<br>";
}

else{
	echo "não executou".$b->COD."<br>";
}




}









 ?>