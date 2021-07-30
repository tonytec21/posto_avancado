<?php
session_start();
include('../../../controller/db_functions.php');
$pdo = conectar();

#buscando se o número do protocolo já existe:
$numero_protocolo = $_POST['strNumeroProtocolo'];

$busca = $pdo->prepare("select * from protocolo where strNumeroProtocolo = '$numero_protocolo'");
$busca->execute();
if($busca->rowCount()>0){
	$_SESSION['erro'] = "Número de Protocolo já cadastrado";
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	break;
}

#lógica dos selos:

$selo = $_POST['strSelo'];
$busca_selo = $pdo->prepare("select * from selo_fisico_uso where selo = $selo");
$busca_selo->execute();

if ($busca_selo->rowCount() == 0) {
	$_SESSION['erro'] = 'Selo não encontrado';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	break;
}

$linha = $busca_selo->fetch(PDO::FETCH_ASSOC);
if ($linha['status'] == U) {
	$_SESSION['erro'] = 'O Selo informado já foi usado';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	break;
}

if ($linha['tipo']!= 'GER' ) {
	$_SESSION['erro'] = 'O Selo informado Não é para protocolos';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	break;
}

else{

$up = $pdo->prepare("update selo_fisico_uso set status = 'U' where selo = '$selo'");
$up->execute();	

if (isset($_POST['subimit'])) {
unset($_POST['subimit']);
INSERT_POST('protocolo',$_POST);
###header('location:../autenticacao.php');
##volta a pagina anterior o codigo abaixo
header('Location: ' . $_SERVER['HTTP_REFERER']);

}
}









 ?>
