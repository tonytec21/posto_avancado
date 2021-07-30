<?php
session_start();
include('../../../controller/db_functions.php');
$pdo = conectar();

#var_dump($_POST);

#BUSCANDO SE CPF JA EXISTE
$cpf = $_POST['strCPFcnpj'];
$busca_ja_existe = $pdo->prepare("SELECT * FROM pessoa where strCPFcnpj = '$cpf' LIMIT 1");
$busca_ja_existe->execute();
if ($busca_ja_existe->rowCount() > 0) {
$_SESSION['erro'] = "PESSOA JA CADASTRADA NA BASE";	
header('Location: ' . $_SERVER['HTTP_REFERER']);
}



if (isset($_POST['subimit'])) {
unset($_POST['subimit']);
if ($_POST['strFicha'] == '') {
$_POST['strFicha'] = 0;
}



#Subimit 1 - PESSOA JURÍDICA:
$_POST['RETORNOSELODIGITAL'] ='';
$_POST['strNome'] = 'NULL';
$_POST['strRg'] = 'NULL';
$_POST['strOrgaoEm'] = 'NULL';
$_POST['setSexo'] = '';
$_POST['strNomeFilhos'] = 'NULL';
$_POST['strNomeConjuge'] = 'NULL';
$_POST['strNomeExConjuge'] = 'NULL';
$_POST['dataCasamento'] = 'NULL';
$_POST['strCartorioCasamento'] = 'NULL';

$_POST['strProfissao'] = 'NULL';
$_POST['strNaturalidade'] = '000000';
$_POST['dataNascimento'] = 'NULL';
$_POST['setEstadoCivil'] = 'SO';
$_POST['strNomePai'] = 'NULL';
$_POST['strNomeMae'] = 'NULL';
$_POST['intUFcidade'] = intval($_POST['intUFcidade']);
INSERT_POST('pessoa',$_POST);
###header('location:../autenticacao.php');
##volta a pagina anterior o codigo abaixo
header('Location: ' . $_SERVER['HTTP_REFERER']);

}


if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);


if ($_POST['strOrgaoEmOTH'] != '') {
$_POST['strOrgaoEm'] = $_POST['strOrgaoEmOTH'];

}
unset($_POST['strOrgaoEmOTH']);


if ($_POST['strFicha'] == '') {
$_POST['strFicha'] = 0;
}

$_POST['hiddencaminhofoto'] = $_POST['caminhofoto'];
unset($_POST['caminhofoto']);

if (empty($_POST['strNomeFilhos'])) {
	$_POST['strNomeFilhos'] = 'NULL';
}
if (empty($_POST['strNomeConjuge'])) {
	$_POST['strNomeConjuge'] = 'NULL';
}
if (empty($_POST['strNomeExConjuge'])) {
	$_POST['strNomeExConjuge'] = 'NULL';
}
if (empty($_POST['dataCasamento'])) {
	$_POST['dataCasamento'] = 'NULL';
}
if (empty($_POST['strCartorioCasamento'])) {
	$_POST['strCartorioCasamento'] = 'NULL';
}

if (empty($_POST['dataEmissao'])) {
	$_POST['dataEmissao'] = 'NULL';
}
if (empty($_POST['setRegimeBens'])) {
	$_POST['setRegimeBens'] = 'NULL';
}

$_POST['RETORNOSELODIGITAL'] ='';
$_POST['strRazaoSocial'] = 'NULL';
$_POST['strRepresentante1'] = 'NULL';
$_POST['strRepresentante2'] = 'NULL';
$_POST['strRepresentante3'] = 'NULL';
$_POST['intUFcidade'] = intval($_POST['intUFcidade']);
$_POST['strNaturalidade'] = intval($_POST['strNaturalidade']);

INSERT_POST('pessoa',$_POST);
###header('location:../autenticacao.php');
##volta a pagina anterior o codigo abaixo
header('Location: ' . $_SERVER['HTTP_REFERER']);

}







 ?>
