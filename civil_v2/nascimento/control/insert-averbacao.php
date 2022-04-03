<?php 
include('../../controller/db_functions.php');
$pdo = conectar();

if (isset($_POST['tipo']) && $_POST['tipo'] == 'NA') {
$setexibir = $_POST['setexibir'];
$texto = $_POST['texto'];
$livro = $_POST['livro'];
$folha = $_POST['folha'];
$termo = $_POST['termo'];
$nome = $_POST['nome'];
$id_registro = $_POST['id_registro'];
$tipo = $_POST['tipo'];
$data = $_POST['data'];

$insert = $pdo->prepare("INSERT INTO averbacoes_civil (strLivro,strFolha, strOrdem, strTipo, dataAverbacao, nome, strAverbacao,setRegistroInvisivel,strMotivoAverbacao) VALUES ('$livro','$folha','$termo','$tipo','$data','$nome','$texto','$setexibir','2');");
if ($insert->execute()) {
die('{"sucesso":"averbação inserida com sucesso!"}');
}
else{
	$array = $insert->errorInfo();
  	$erro = $array[2];
	die('{"erro":"erro ao salvar informação : '.$erro.'"}');
}

}


?>

