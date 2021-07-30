<?php 

include('../controller/db_functions.php');session_start();
$pdo = conectar();
if (isset($_GET['subimit'])) {
unset($_GET['subimit']);
$livro = $_POST['strLivro'];
$folha = $_POST['strFolha'];

if ($_POST['strAverbacao'] =='') {
$_SESSION['erro'] = 'O CAMPO AVERBACAO NÃO PODE ESTAR EM BRANCO!';
header('Location: ' . $_SERVER['HTTP_REFERER']);
break;
}
$_POST['strSelo'] = 'ANOTACAO_REGISTRO';
if (empty($_POST['setRegistroInvisivel'])) {
	$_POST['setRegistroInvisivel'] = 'N';
}
unset($_POST['strSeloG']);
unset($_POST['seloGratuito']);
$_POST['strAverbacao'] =  $_POST['strAverbacao'];

#INSERT_POST('averbacoes_civil',$_POST);


if ($_POST['strTipo'] =='NA') {
$tipo = 'NAS';
}
elseif ($_POST['strTipo'] =='CA') {
$tipo = 'CAS';
}
elseif ($_POST['strTipo'] =='OB') {
$tipo = 'OBT';
}


$data = $_POST['dataAverbacao'];
$livro = $_POST['strLivro'];
$folha = $_POST['strFolha'];
$anotacao = $_POST['strAverbacao'];

$in_tabela_anot = $pdo->prepare("INSERT INTO anotacoes_civil values(NULL,'$tipo','$data','$livro','$folha','$anotacao')");
if($in_tabela_anot->execute()){
	$_SESSION['sucesso'] .='INSERIDO COM SUCESSO';
}

#var_dump($_POST);
unset($_SESSION['averbacaotemp']);
if (isset($SELO)) {
$_SESSION['sucesso'] .='<br>'.$SELO;	
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
}

						






 ?>