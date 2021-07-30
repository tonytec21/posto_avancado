<?php
session_start();
include('../controller/db_functions.php');
$pdo = conectar();
if (isset($_SESSION['erro'])) {
	unset($_SESSION['erro']);
}

#VERIFICANDO SE A TABELA DE PESSOAS JÁ ESTÁ COM OS NOVOS CAMPOS:
/*
$busca_campos = $pdo->prepare("SELECT pessoa_viva,tipo_cadastro from pessoa LIMIT 5");
$busca_campos->execute();
if ($busca_campos->rowCount()<1) {
	$abre_campos = $pdo->prepare("ALTER TABLE `pessoa`  ADD `pessoa_viva` VARCHAR(5) NULL  AFTER `RETORNOSELODIGITAL`,  ADD `tipo_cadastro` VARCHAR(5) NULL  AFTER `pessoa_viva`;ALTER TABLE `pessoa` CHANGE `strNaturalidade` `strNaturalidade` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;ALTER TABLE `pessoa` CHANGE `intUFcidade` `intUFcidade` VARCHAR(200) CHARACTER SET utf8 COLLATE utf8_general_ci NULL DEFAULT NULL;ALTER TABLE `pessoa`  ADD `descdocestrangeiro` VARCHAR(100) NULL  AFTER `tipo_cadastro`,  ADD `docestrangeiro` VARCHAR(100) NULL  AFTER `descdocestrangeiro`;
		ALTER TABLE `pessoa` ADD `cpfRepresentante1` VARCHAR(20) NULL  AFTER `docestrangeiro`, ADD `cpfRepresentante2` VARCHAR(20) NULL  AFTER `cpfRepresentante1`, ADD `cpfRepresentante3` VARCHAR(20) NULL  AFTER `cpfRepresentante2`;
		
		");
	$abre_campos->execute();
}
*/

if (empty($_POST['textnaturalidade'])) {
	unset($_POST['textnaturalidade']);
}

if (empty($_POST['decresidenciaestrangeiro'])) {
	unset($_POST['decresidenciaestrangeiro']);
}


if (isset($_POST['textnaturalidade']) && $_POST['textnaturalidade']!='') {
	$_POST['strNaturalidade'] = $_POST['strNaturalidade'].'/'.$_POST['textnaturalidade']; 
	unset($_POST['textnaturalidade']);
}


if (isset($_POST['decresidenciaestrangeiro'])) {
	$_POST['intUFcidade'] = $_POST['intUFcidade'].'/'.$_POST['decresidenciaestrangeiro']; 
	unset($_POST['decresidenciaestrangeiro']);
}

$_POST['strNome'] = addslashes($_POST['strNome']);
$_POST['strRazaoSocial'] = addslashes($_POST['strRazaoSocial']);
$_POST['strLogradouro'] = addslashes($_POST['strLogradouro']);

if (isset($_POST['strcnpj']) && !empty($_POST['strcnpj'])) {

if (isset($_POST['strCPFcnpj']) && empty($_POST['strCPFcnpj'])) {
unset($_POST['strCPFcnpj']);
}

$_POST['strCPFcnpj']  = $_POST['strcnpj'];
unset($_POST['strcnpj']);
}

if (isset($_POST['strcnpj'])) {
unset($_POST['strcnpj']);
}

if (empty($_POST['strFicha'])) {
	$_POST['strFicha'] = '0';
}
unset($_POST['subimit2']);

$_POST['strNaturalidade'] = addslashes($_POST['strNaturalidade']);
$_POST['intUFcidade'] = addslashes($_POST['intUFcidade']);
INSERT_POST('pessoa',$_POST);
#var_dump($_POST);
if (isset($_SESSION['erro'])) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
}
else{
	$busca = $pdo->prepare("SELECT ID FROM `pessoa` ORDER BY ID DESC LIMIT 1");
	$busca->execute();
	$linhas = $busca->fetch(PDO::FETCH_ASSOC);
	$id = $linhas['ID'];
	header("location:cadastro_pessoas_edit.php?id=".$id);
}

exit();
?>