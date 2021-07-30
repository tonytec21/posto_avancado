<?php
session_start();
include('../../../controller/db_functions.php');
$id = $_GET['id'];

if (isset($_FILES['imgAssinaturaTitular']) && $_FILES['imgAssinaturaTitular']!='') {

#RECEBENDO E GUARDANDO A IMAGEM DA ASSINATURA DO TITULAR:
$extensao = strtolower(substr($_FILES['imgAssinaturaTitular']['name'], -4));
	$tipo = strtolower($_FILES['imgAssinaturaTitular']['type']);
	$nome = strtolower(($_FILES['imgAssinaturaTitular']['name']));
	$novo_nome = 'assinatura.png';
	$diretorio = "cabecalhos/";
move_uploaded_file($_FILES['imgAssinaturaTitular']['tmp_name'], $diretorio.$novo_nome);
$foto = $diretorio.$novo_nome;
UPDATE_CAMPO_ID('cadastroserventia','imgAssinaturaTitular',$foto,$id);
//unset($_POST['imgAssinaturaTitular']);
}

if (isset($_FILES['imgCabecalho']) && $_FILES['imgCabecalho']!='') {
#RECEBENDO E GUARDANDO A IMAGEM QUE VAI SAIR NOS DOCUMENTOS NO CABEÇALHO:
$extensao = strtolower(substr($_FILES['imgCabecalho']['name'], -4));
	$tipo = strtolower($_FILES['imgCabecalho']['type']);
	$nome = strtolower(($_FILES['imgCabecalho']['name']));
	$novo_nome = 'CAPA.jpg';
	$diretorio = "cabecalhos/";
move_uploaded_file($_FILES['imgCabecalho']['tmp_name'], $diretorio.$novo_nome);
$foto2 = $diretorio.$novo_nome;
//unset($_POST['imgCabecalho']);
UPDATE_CAMPO_ID('cadastroserventia','imgCabecalhoSaidas',$foto2,$id);
}




if (empty($_POST['checkboxCivil'])) {
	$_POST['checkboxCivil'] = 'N';
} else {
		$_POST['checkboxCivil'] = 'S';
}

if (empty($_POST['checkboxNotas'])) {
	$_POST['checkboxNotas'] = 'N';
} else {
		$_POST['checkboxNotas'] = 'S';
}

if (empty($_POST['checkboxImoveis'])) {
	$_POST['checkboxImoveis'] = 'N';
} else {
		$_POST['checkboxImoveis'] = 'S';
}

if (empty($_POST['checkboxProtesto'])) {
	$_POST['checkboxProtesto'] = 'N';
} else {
		$_POST['checkboxProtesto'] = 'S';
}

if (empty($_POST['checkboxTitulos'])) {
	$_POST['checkboxTitulos'] = 'N';
} else {
		$_POST['checkboxTitulos'] = 'S';
}

if (isset($_POST['subimit'])) {
unset($_POST['subimit']);

UPDATE_CAMPO_ID('cadastroserventia','strCNS',$_POST['strCNS'],$id);
//UPDATE_CAMPO_ID('cadastroserventia','strTipoServentia',$_POST['segmentoServentia'],$id);
UPDATE_CAMPO_ID('cadastroserventia','checkboxCivil',$_POST['checkboxCivil'],$id);
UPDATE_CAMPO_ID('cadastroserventia','checkboxImoveis',$_POST['checkboxImoveis'],$id);
UPDATE_CAMPO_ID('cadastroserventia','checkboxProtesto',$_POST['checkboxProtesto'],$id);
UPDATE_CAMPO_ID('cadastroserventia','checkboxTitulos',$_POST['checkboxTitulos'],$id);
UPDATE_CAMPO_ID('cadastroserventia','checkboxNotas',$_POST['checkboxNotas'],$id);

UPDATE_CAMPO_ID('cadastroserventia','setTipoAcervo',$_POST['setTipoAcervo'],$id);
UPDATE_CAMPO_ID('cadastroserventia','strCNPJ',$_POST['strCNPJ'],$id);
UPDATE_CAMPO_ID('cadastroserventia','strRazaoSocial',$_POST['strRazaoSocial'],$id);
UPDATE_CAMPO_ID('cadastroserventia','strTituloServentia',$_POST['strTituloServentia'],$id);

UPDATE_CAMPO_ID('cadastroserventia','strCpfTitular',$_POST['strCpfTitular'],$id);

UPDATE_CAMPO_ID('cadastroserventia','strTelefone1',$_POST['strTelefone1'],$id);
UPDATE_CAMPO_ID('cadastroserventia','strTelefone2',$_POST['strTelefone2'],$id);
UPDATE_CAMPO_ID('cadastroserventia','strEmail',$_POST['strEmail'],$id);
UPDATE_CAMPO_ID('cadastroserventia','strMunicipioISSQN',$_POST['strMunicipioISSQN'],$id);
UPDATE_CAMPO_ID('cadastroserventia','strCodigoCartorio',$_POST['strCodigoCartorio'],$id);
#UPDATE_CAMPO_ID('cadastroserventia','strNumeroAtoProcuracao',$_POST['strNumeroAtoProcuracao'],$id);
#UPDATE_CAMPO_ID('cadastroserventia','strNumeroAtoEscritura',$_POST['strNumeroAtoEscritura'],$id);
UPDATE_CAMPO_ID('cadastroserventia','strLogradouro',$_POST['strLogradouro'],$id);
UPDATE_CAMPO_ID('cadastroserventia','strBairro',$_POST['strBairro'],$id);
UPDATE_CAMPO_ID('cadastroserventia','strNumero',$_POST['strNumero'],$id);
UPDATE_CAMPO_ID('cadastroserventia','strCEP',$_POST['strCEP'],$id);
UPDATE_CAMPO_ID('cadastroserventia','intUFcidade',$_POST['intUFcidade'],$id);
UPDATE_CAMPO_ID('cadastroserventia','UF_PESQUISA',$_POST['UF_PESQUISA'],$id);
UPDATE_CAMPO_ID('cadastroserventia','MUN_PESQUISA',$_POST['MUN_PESQUISA'],$id);
UPDATE_CAMPO_ID('cadastroserventia','DIST_PESQUISA',$_POST['DIST_PESQUISA'],$id);
UPDATE_CAMPO_ID('cadastroserventia','COD_CARTORIO',$_POST['COD_CARTORIO'],$id);
#UPDATE_CAMPO_ID('cadastroserventia','strNumeroBoletimSisFerj',$_POST['strNumeroBoletimSisFerj'],$id);

//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'ALTERADO COM ÊXITO';

}
 ?>
