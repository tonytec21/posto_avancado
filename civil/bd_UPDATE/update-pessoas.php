<?php
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];
#$_POST['hiddencaminhofoto'] = $_POST['caminhofoto'];
unset($_POST['caminhofoto']);


if (isset($_POST['subimit'])) {
unset($_POST['subimit']);


if (isset($_POST['hiddencaminhofoto']) && !empty($_POST['hiddencaminhofoto']) && $_POST['hiddencaminhofoto'] != 'NULL') {
$img_cam = $_POST['hiddencaminhofoto'];
UPDATE_CAMPO_ID('pessoa','hiddencaminhofoto',$img_cam,$id);
}
UPDATE_CAMPO_ID('pessoa','setTipoPessoa',$_POST['setTipoPessoa'],$id);
#UPDATE_CAMPO_ID('pessoa','idSelo',$_POST['idSelo'],$id);
UPDATE_CAMPO_ID('pessoa','strRazaoSocial',$_POST['strRazaoSocial'],$id);
UPDATE_CAMPO_ID('pessoa','strCPFcnpj',$_POST['strCPFcnpj'],$id);
UPDATE_CAMPO_ID('pessoa','strLogradouro',$_POST['strLogradouro'],$id);
UPDATE_CAMPO_ID('pessoa','strEmail',$_POST['strEmail'],$id);
UPDATE_CAMPO_ID('pessoa','strBairro',$_POST['strBairro'],$id);
UPDATE_CAMPO_ID('pessoa','intUFcidade',$_POST['intUFcidade'],$id);
UPDATE_CAMPO_ID('pessoa','strTelefone',$_POST['strTelefone'],$id);
UPDATE_CAMPO_ID('pessoa','strTelCelular',$_POST['strTelCelular'],$id);
UPDATE_CAMPO_ID('pessoa','strRepresentante1',$_POST['strRepresentante1'],$id);
UPDATE_CAMPO_ID('pessoa','strRepresentante2',$_POST['strRepresentante2'],$id);
UPDATE_CAMPO_ID('pessoa','strRepresentante3',$_POST['strRepresentante3'],$id);

UPDATE_CAMPO_ID('pessoa','strObservacao',$_POST['strObservacao'],$id);

if (isset($_POST['strFicha']) && $_POST['strFicha']!='') {

UPDATE_CAMPO_ID('pessoa','strFicha',$_POST['strFicha'],$id);
}

//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
//$_SESSION['sucesso'] = 'FORMULÁRIO ATUALIZADO (pessoa)';

}



if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);
//var_dump($_POST);


if (isset($_POST['hiddencaminhofoto']) && !empty($_POST['hiddencaminhofoto']) && $_POST['hiddencaminhofoto'] != 'NULL') {
$img_cam = $_POST['hiddencaminhofoto'];
UPDATE_CAMPO_ID('pessoa','hiddencaminhofoto',$img_cam,$id);
}
#UPDATE_CAMPO_ID('pessoa','setTipoPessoa',$_POST['setTipoPessoa'],$id);
#UPDATE_CAMPO_ID('pessoa','idSelo',$_POST['idSelo'],$id);
UPDATE_CAMPO_ID('pessoa','strNome',$_POST['strNome'],$id);
//UPDATE_CAMPO_ID('pessoa','strRazaoSocial',$_POST['strRazaoSocial'],$id);
UPDATE_CAMPO_ID('pessoa','strCPFcnpj',$_POST['strCPFcnpj'],$id);
UPDATE_CAMPO_ID('pessoa','strRG',$_POST['strRG'],$id);
UPDATE_CAMPO_ID('pessoa','strOrgaoEm',$_POST['strOrgaoEm'],$id);
UPDATE_CAMPO_ID('pessoa','strProfissao',$_POST['strProfissao'],$id);
UPDATE_CAMPO_ID('pessoa','strNaturalidade',$_POST['strNaturalidade'],$id);
UPDATE_CAMPO_ID('pessoa','setSexo',$_POST['setSexo'],$id);
UPDATE_CAMPO_ID('pessoa','strNomeFilhos',$_POST['strNomeFilhos'],$id);
UPDATE_CAMPO_ID('pessoa','strNomeConjuge',$_POST['strNomeConjuge'],$id);
UPDATE_CAMPO_ID('pessoa','dataCasamento',$_POST['dataCasamento'],$id);
UPDATE_CAMPO_ID('pessoa','strCartorioCasamento',$_POST['strCartorioCasamento'],$id);
UPDATE_CAMPO_ID('pessoa','strNacionalidade',$_POST['strNacionalidade'],$id);
UPDATE_CAMPO_ID('pessoa','dataNascimento',$_POST['dataNascimento'],$id);
UPDATE_CAMPO_ID('pessoa','setEstadoCivil',$_POST['setEstadoCivil'],$id);
UPDATE_CAMPO_ID('pessoa','strLogradouro',$_POST['strLogradouro'],$id);
UPDATE_CAMPO_ID('pessoa','strEmail',$_POST['strEmail'],$id);
UPDATE_CAMPO_ID('pessoa','strBairro',$_POST['strBairro'],$id);
UPDATE_CAMPO_ID('pessoa','intUFcidade',$_POST['intUFcidade'],$id);
UPDATE_CAMPO_ID('pessoa','strTelefone',$_POST['strTelefone'],$id);
UPDATE_CAMPO_ID('pessoa','strTelCelular',$_POST['strTelCelular'],$id);
UPDATE_CAMPO_ID('pessoa','strNomePai',$_POST['strNomePai'],$id);
UPDATE_CAMPO_ID('pessoa','strNomeMae',$_POST['strNomeMae'],$id);
#UPDATE_CAMPO_ID('pessoa','dataCadastro',$_POST['dataCadastro'],$id);
UPDATE_CAMPO_ID('pessoa','strObservacao',$_POST['strObservacao'],$id);
if (isset($_POST['strFicha']) && $_POST['strFicha']!='') {

UPDATE_CAMPO_ID('pessoa','strFicha',$_POST['strFicha'],$id);
}

if (isset($_POST['scanImgAssinatura']) && $_POST['scanImgAssinatura']!='') {

UPDATE_CAMPO_ID('pessoa','scanImgAssinatura',$_POST['scanImgAssinatura'],$id);
}

if (isset($_POST['scanImgDigital']) && $_POST['scanImgDigital']!='') {

UPDATE_CAMPO_ID('pessoa','scanImgDigital',$_POST['scanImgDigital'],$id);
}
//Volta para a pagina anterior
header('Location: ../editar-pessoas.php?id='.$id);
$_SESSION['sucesso'] = 'FORMULÁRIO ATUALIZADO (pessoa)';

}





 ?>
