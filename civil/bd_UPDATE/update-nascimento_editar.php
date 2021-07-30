<?php
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];

if (empty($_POST['setDispensarTI'])) {
	$_POST['setDispensarTI'] = 'N';
}else {
  	$_POST['setDispensarTI'] = 'S';
}

if (isset($_POST['subimit1'])) {
unset($_POST['subimit1']);

UPDATE_CAMPO_ID('registro_nascimento','setTipoCadastro',$_POST['setTipoCadastro'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strMatricula',$_POST['strMatricula'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNomeFilho',$_POST['strNomeFilho'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setSexoFilho',$_POST['setSexoFilho'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setGemeos',$_POST['setGemeos'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCPF',$_POST['strCPFfilho'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setCorPele',$_POST['setCorPele'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strLocalNascimento',$_POST['strLocalNascimento'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setFiliacao',$_POST['setFiliacao'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCidadeFilho',$_POST['strCidadeFilho'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setNaturalidade',$_POST['setNaturalidade'],$id);
UPDATE_CAMPO_ID('registro_nascimento','dataNascimento',$_POST['dataNascimento'],$id);
UPDATE_CAMPO_ID('registro_nascimento','horaNascimento',$_POST['horaNascimento'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNumDNV',$_POST['strNumDNV'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setDispensarTI',$_POST['setDispensarTI'],$id);

$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);

UPDATE_CAMPO_ID('registro_nascimento','strNomeMae',$_POST['strNomeMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNaturalidadeMae',$_POST['strNaturalidadeMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNacionalidadeMae',$_POST['strNacionalidadeMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strSexoMae',$_POST['strSexoMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strEstadoCivilMae',$_POST['strEstadoCivilMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','dataMae',$_POST['dataMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strProfissaoMae',$_POST['strProfissaoMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setTipoDocumentoMae',$_POST['setTipoDocumentoMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strEnderecoMae',$_POST['strEnderecoMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNdaCasaMae',$_POST['strNdaCasaMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strBairroMae',$_POST['strBairroMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strComplementoMae',$_POST['strComplementoMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCidadeMae',$_POST['strCidadeMae'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCepMae',$_POST['strCepMae'],$id);

UPDATE_CAMPO_ID('registro_nascimento','strNomePai',$_POST['strNomePai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNaturalidadePai',$_POST['strNaturalidadePai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNacionalidadePai',$_POST['strNacionalidadePai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strSexoPai',$_POST['strSexoPai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strEstadoCivilPai',$_POST['strEstadoCivilPai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','dataPai',$_POST['dataPai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strProfissaoPai',$_POST['strProfissaoPai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setTipoDocumentoPai',$_POST['setTipoDocumentoPai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strEnderecoPai',$_POST['strEnderecoPai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNdaCasaPai',$_POST['strNdaCasaPai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strBairroPai',$_POST['strBairroPai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strComplementoPai',$_POST['strComplementoPai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCidadePai',$_POST['strCidadePai'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCepPai',$_POST['strCepPai'],$id);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('Location: ' . $_SERVER['HTTP_REFERER']);


}


if (isset($_POST['subimit3'])) {
unset($_POST['subimit3']);

UPDATE_CAMPO_ID('registro_nascimento','strNomeAvos1',$_POST['strNomeAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNaturalidadeAvos1',$_POST['strNaturalidadeAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNacionalidadeAvos1',$_POST['strNacionalidadeAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strSexoAvos1',$_POST['strSexoAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strEstadoCivilAvos1',$_POST['strEstadoCivilAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','dataAvos1',$_POST['dataAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setPatentescoAvos1',$_POST['setParentescoAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strProfissaoAvos1',$_POST['strProfissaoAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setTipoDocumentoAvos1',$_POST['setTipoDocumentoAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strEnderecoAvos1',$_POST['strEnderecoAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNdaCasaAvos1',$_POST['strNdaCasaAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strBairroAvos1',$_POST['strBairroAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strComplementoAvos1',$_POST['strComplementoAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCidadeAvos1',$_POST['strCidadeAvos1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCepAvos1',$_POST['strCepAvos1'],$id);

UPDATE_CAMPO_ID('registro_nascimento','strNomeAvos2',$_POST['strNomeAvos2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNaturalidadeAvos2',$_POST['strNaturalidadeAvos2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNacionalidadeAvos2',$_POST['strNacionalidadeAvos2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strSexoAvos2',$_POST['strSexoAvos2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strEstadoCivilAvos2',$_POST['strEstadoCivilAvos2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','dataAvos2',$_POST['dataAvos2'],$id);



#concertar isso aqui no banco, por hora coloquei "PATENTESCO MESMO.kkkk"
UPDATE_CAMPO_ID('registro_nascimento','setPatentescoAvos2',$_POST['setPatentescoAvos2'],$id);
##################################################################################################3


UPDATE_CAMPO_ID('registro_nascimento','strProfissaoAvos2',$_POST['strProfissaoAvos2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setTipoDocumentoAvos2',$_POST['setTipoDocumentoAvos2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strEnderecoAvos2',$_POST['strEnderecoAvos2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNdaCasaAvos2',$_POST['strNdaCasaAvos2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strBairroAvos2',$_POST['strBairroAvos2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strComplementoAvos2',$_POST['strComplementoAvos2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCidadeAvos2',$_POST['strCidadeAvos2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCepAvos2',$_POST['strCepAvos2'],$id);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('Location: ' . $_SERVER['HTTP_REFERER']);

}

if (isset($_POST['subimit4'])) {
unset($_POST['subimit4']);
//var_dump($_POST);

UPDATE_CAMPO_ID('registro_nascimento','strNomeTestemunhas1',$_POST['strNomeTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNaturalidadeTestemunhas1',$_POST['strNaturalidadeTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNacionalidadeTestemunhas1',$_POST['strNacionalidadeTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strSexoTestemunhas1',$_POST['strSexoTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strEstadoCivilTestemunhas1',$_POST['strEstadoCivilTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','dataTestemunhas1',$_POST['dataTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strProfissaoTestemunhas1',$_POST['strProfissaoTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setTipoDocumentoTestemunhas1',$_POST['setTipoDocumentoTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strEnderecoTestemunhas1',$_POST['strEnderecoTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNdaCasaTestemunhas1',$_POST['strNdaCasaTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strBairroTestemunhas1',$_POST['strBairroTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strComplementoTestemunhas1',$_POST['strComplementoTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCidadeTestemunhas1',$_POST['strCidadeTestemunhas1'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCepTestemunhas1',$_POST['strCepTestemunhas1'],$id);

UPDATE_CAMPO_ID('registro_nascimento','strNomeTestemunhas2',$_POST['strNomeTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNaturalidadeTestemunhas2',$_POST['strNaturalidadeTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNacionalidadeTestemunhas2',$_POST['strNacionalidadeTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strSexoTestemunhas2',$_POST['strSexoTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strEstadoCivilTestemunhas2',$_POST['strEstadoCivilTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','dataTestemunhas2',$_POST['dataTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strProfissaoTestemunhas2',$_POST['strProfissaoTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','setTipoDocumentoTestemunhas2',$_POST['setTipoDocumentoTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strEnderecoTestemunhas2',$_POST['strEnderecoTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strNdaCasaTestemunhas2',$_POST['strNdaCasaTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strBairroTestemunhas2',$_POST['strBairroTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strComplementoTestemunhas2',$_POST['strComplementoTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCidadeTestemunhas2',$_POST['strCidadeTestemunhas2'],$id);
UPDATE_CAMPO_ID('registro_nascimento','strCepTestemunhas2',$_POST['strCepTestemunhas2'],$id);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('Location: ' . $_SERVER['HTTP_REFERER']);

}

if (isset($_POST['subimit5'])) {
unset($_POST['subimit5']);

UPDATE_CAMPO_ID('registro_nascimento','strTextoAnatocoes',$_POST['strTextoAnatocoes'],$id);

header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'FORMULÁRIO CONCLUIDO (Nascimento)';

}







 ?>
