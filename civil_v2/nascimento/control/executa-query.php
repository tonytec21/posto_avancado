<?php 
include('../../controller/db_functions.php');
$pdo = conectar();

if (isset($_POST['query'])) {
$query = $_POST['query'];

$execute = $pdo->prepare($query);
if ($execute->execute()) {
die('{"sucesso":"operação realizada com sucesso!"}');
}
else{
	$array = $execute->errorInfo();
  	$erro = $array[2];
	die('{"erro":"erro ao realizar operação : '.$erro.'"}');
}

}

?>

