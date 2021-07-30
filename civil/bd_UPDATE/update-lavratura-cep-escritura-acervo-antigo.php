<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];
$pdo = conectar();
ob_start(); //corrigindo o errinho do header

#-------------------------------------------------------------------------------------------------------------------------


if (isset($_POST['subimit1'])) {
unset($_POST['subimit1']);


UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setTipoCensec',1,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','dataAto',$_POST['dataAto'],$id);

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','quantidadeOutorgado',$_POST['quantidadeOutorgado'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','quantidadeOutorgante',$_POST['quantidadeOutorgante'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','quantidadeTestemunha',$_POST['quantidadeTestemunha'],$id);

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','quantidadeSelo',$_POST['quantidadeSelo'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','possuiImovel',$_POST['possuiImovel'],$id);
if (isset($_POST['possuiDOI'])) {

	$possuiDOI = $_POST['possuiDOI'];

}else {
$possuiDOI = NULL;
}
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','possuiDOI',$possuiDOI,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strAnotacoes',$_POST['strAnotacoes'],$id);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cep-escritura-acervo-antigo.php?conf1=ok&id='.$id);

}



if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);

#numero de ordem e do ato:
if (isset($_POST['Ordem'])) {
$Ordem = $_POST['Ordem'];
}else {
	$Ordem = NULL;
}
if (isset($_POST['numAto'])) {
$numAto = $_POST['numAto'];
}else {
	$numAto = NULL;
}


UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','Ordem',$Ordem,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','numAto',$numAto,$id);

if (isset($_POST['setTipodeAtoCep']) ) {
$setTipodeAtoCep = $_POST['setTipodeAtoCep'];
}else {
	$setTipodeAtoCep = NULL;

}
if (isset($_POST['setNaturezaLitigio'])) {
$setNaturezaLitigio = $_POST['setNaturezaLitigio'];
}else {
	$setNaturezaLitigio = NULL;

}
if (isset($_POST['setNaturezaEscritura'])) {
$setNaturezaEscritura = $_POST['setNaturezaEscritura'];
}else {
	$setNaturezaEscritura = NULL;

}
if (isset($_POST['strAcordo'])) {
$strAcordo = $_POST['strAcordo'];
}else {
	$strAcordo = NULL;

}
if (isset($_POST['strInfoAdicionais'])) {
$strInfoAdicionais = $_POST['strInfoAdicionais'];
}else {
	$strInfoAdicionais = NULL;

}
if (isset($_POST['strEspolio'])) {
$strEspolio = $_POST['strEspolio'];
}else {
	$strEspolio = NULL;

}
if (isset($_POST['strRetificacao'])) {
$strRetificacao = $_POST['strRetificacao'];
}else {
	$strRetificacao = NULL;

}
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setTipodeAtoCep',$setTipodeAtoCep,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setNaturezaEscritura',$setNaturezaEscritura,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setNaturezaLitigio',$setNaturezaLitigio,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strAcordo',$strAcordo,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strInfoAdicionais',$strInfoAdicionais,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strEspolio',$strEspolio,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strRetificacao',$strRetificacao,$id);

if (isset($_POST['strAtoDesconhecido'])) {
$strAtoDesconhecido = $_POST['strAtoDesconhecido'];
}else {
	$strAtoDesconhecido = NULL;

}
if (isset($_POST['strLivroOutro'])) {
$strLivroOutro = $_POST['strLivroOutro'];
}else {
	$strLivroOutro = NULL;

}
if (isset($_POST['strLivroComplementoOutro'])) {
$strLivroComplementoOutro = $_POST['strLivroComplementoOutro'];
}else {
	$strLivroComplementoOutro = NULL;

}
if (isset($_POST['strFolhaOutro'])) {
$strFolhaOutro = $_POST['strFolhaOutro'];
}else {
	$strFolhaOutro = NULL;

}
if (isset($_POST['strFolhaComplementoOutro'])) {
$strFolhaComplementoOutro = $_POST['strFolhaComplementoOutro'];
}else {
	$strFolhaComplementoOutro = NULL;

}
if (isset($_POST['strEstadoOutro'])) {
$strEstadoOutro = $_POST['strEstadoOutro'];
}else {
	$strEstadoOutro = NULL;

}
if (isset($_POST['strCidadeOutro'])) {
$strCidadeOutro = $_POST['strCidadeOutro'];
}else {
	$strCidadeOutro = NULL;

}
if (isset($_POST['strNomeCartorioOutro'])) {
$strNomeCartorioOutro = $_POST['strNomeCartorioOutro'];
}else {
	$strNomeCartorioOutro = NULL;
}

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strAtoDesconhecido',$strAtoDesconhecido,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strLivroOutro',$strLivroOutro,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strLivroComplementoOutro',$strLivroComplementoOutro,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strFolhaOutro',$strFolhaOutro,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strFolhaComplementoOutro',$strFolhaComplementoOutro,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strEstadoOutro',$strEstadoOutro,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strCidadeOutro',$strCidadeOutro,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strNomeCartorioOutro',mb_strtoupper($strNomeCartorioOutro),$id);


if (isset($_POST['dataCasamento'])) {
$dataCasamento = $_POST['dataCasamento'];
$dataCasamento= date('Y/m/d', strtotime($dataCasamento));
}else {
	$dataCasamento = '1111-11-11';
}
if (isset($_POST['setRegimeBens'])) {
$setRegimeBens = $_POST['setRegimeBens'];
}else {
	$setRegimeBens = NULL;
}
if (isset($_POST['checkboxPossuiFilhos'])) {
$checkboxPossuiFilhos = $_POST['checkboxPossuiFilhos'];
}else {
	$checkboxPossuiFilhos = NULL;
}

if (isset($_POST['strFilhosMaiores'])) {
$strFilhosMaiores = $_POST['strFilhosMaiores'];
}else {
	$strFilhosMaiores = NULL;
}
if (isset($_POST['strFilhosMenores'])) {
$strFilhosMenores = $_POST['strFilhosMenores'];
}else {
	$strFilhosMenores = NULL;
}

if (isset($_POST['setResponsavelFilhos'])) {
$setResponsavelFilhos = $_POST['setResponsavelFilhos'];
}else {
	$setResponsavelFilhos = NULL;
}

if (isset($_POST['qtdFilhosMaiores'])) {
$qtdFilhosMaiores = $_POST['qtdFilhosMaiores'];
}else {
	$qtdFilhosMaiores = NULL;
}

if (isset($_POST['qtdFilhosMenores'])) {
$qtdFilhosMenores = $_POST['qtdFilhosMenores'];
}else {
	$qtdFilhosMenores = NULL;
}


UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','dataCasamento',$dataCasamento,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setRegimeBens',$setRegimeBens,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','checkboxPossuiFilhos',$checkboxPossuiFilhos,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strFilhosMaiores',$strFilhosMaiores,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strFilhosMenores',$strFilhosMenores,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setResponsavelFilhos',$setResponsavelFilhos,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','qtdFilhosMaiores',$qtdFilhosMaiores,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','qtdFilhosMenores',$qtdFilhosMenores,$id);

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setQualidadeCepParte1',$_POST['setQualidadeCepParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strNomeParte1',mb_strtoupper($_POST['strNomeParte1']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setSexoParte1',mb_strtoupper($_POST['setSexoParte1']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setTipoDocumento1Parte1',$_POST['setTipoDocumento1Parte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strRGParte1',$_POST['strRGParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strOrgaoEmissorParte1',$_POST['strOrgaoEmissorParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strOrgaoEmissorUFParte1',$_POST['strOrgaoEmissorUFParte1'],$id);

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setTipoDocumento2Parte1',$_POST['setTipoDocumento2Parte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strCPFParte1',$_POST['strCPFParte1'],$id);
$dataNascimentoParte1 = $_POST['dataNascimentoParte1'];
$dataNascimentoParte1= date('Y/m/d', strtotime($dataNascimentoParte1));
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','dataNascimentoParte1',$dataNascimentoParte1,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProfissaoParte1',$_POST['strProfissaoParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setEstadoCivilParte1',$_POST['setEstadoCivilParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strRogoParte1',mb_strtoupper($_POST['strRogoParte1']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strMotivoParte1',mb_strtoupper($_POST['strMotivoParte1']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strRepresentanteParte1',mb_strtoupper($_POST['strRepresentanteParte1']),$id);

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProcuradorParte1',mb_strtoupper($_POST['strProcuradorParte1']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProcuradorLivroParte1',$_POST['strProcuradorLivroParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProcuradorFolhaParte1',$_POST['strProcuradorFolhaParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProcuradorOrdemParte1',$_POST['strProcuradorOrdemParte1'],$id);

$strProcuradorDataParte1 = $_POST['strProcuradorDataParte1'];
$strProcuradorDataParte1= date('Y/m/d', strtotime($strProcuradorDataParte1));
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProcuradorDataParte1',$strProcuradorDataParte1,$id);

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProcuradorCartorioParte1',mb_strtoupper($_POST['strProcuradorCartorioParte1']),$id);



UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strUFParte1',$_POST['strUFParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strNacionalidadeParte1',$_POST['strNacionalidadeParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strPaisResideParte1',$_POST['strPaisResideParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strNaturalParte1',$_POST['strNaturalParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strCidadeParte1',(int)$_POST['strCidadeParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strLogradouroParte1',mb_strtoupper($_POST['strLogradouroParte1']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strBairroParte1',mb_strtoupper($_POST['strBairroParte1']),$id);

//parte 2


UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setQualidadeCepParte2',$_POST['setQualidadeCepParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strNomeParte2',mb_strtoupper($_POST['strNomeParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setSexoParte2',mb_strtoupper($_POST['setSexoParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setTipoDocumento1Parte2',$_POST['setTipoDocumento1Parte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strRGParte2',$_POST['strRGParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strOrgaoEmissorParte2',$_POST['strOrgaoEmissorParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strOrgaoEmissorUFParte2',$_POST['strOrgaoEmissorUFParte2'],$id);

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setTipoDocumento2Parte2',$_POST['setTipoDocumento2Parte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strCPFParte2',$_POST['strCPFParte2'],$id);

$dataNascimentoParte2 = $_POST['dataNascimentoParte2'];
$dataNascimentoParte2= date('Y/m/d', strtotime($dataNascimentoParte2));
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','dataNascimentoParte2',$dataNascimentoParte2,$id);

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProfissaoParte2',mb_strtoupper($_POST['strProfissaoParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','setEstadoCivilParte2',mb_strtoupper($_POST['setEstadoCivilParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strRogoParte2',mb_strtoupper($_POST['strRogoParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strMotivoParte2',mb_strtoupper($_POST['strMotivoParte2']),$id);

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProcuradorParte2',mb_strtoupper($_POST['strProcuradorParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProcuradorLivroParte2',$_POST['strProcuradorLivroParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProcuradorFolhaParte2',$_POST['strProcuradorFolhaParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProcuradorOrdemParte2',$_POST['strProcuradorOrdemParte2'],$id);

$strProcuradorDataParte2 = $_POST['strProcuradorDataParte2'];
$strProcuradorDataParte2= date('Y/m/d', strtotime($strProcuradorDataParte2));
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProcuradorDataParte2',$strProcuradorDataParte2,$id);

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strProcuradorCartorioParte2',mb_strtoupper($_POST['strProcuradorCartorioParte2']),$id);


UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strUFParte2',$_POST['strUFParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strNacionalidadeParte2',$_POST['strNacionalidadeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strPaisResideParte2',$_POST['strPaisResideParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strNaturalParte2',$_POST['strNaturalParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strCidadeParte2',(int)$_POST['strCidadeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strLogradouroParte2',mb_strtoupper($_POST['strLogradouroParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strBairroParte2',mb_strtoupper($_POST['strBairroParte2']),$id);

//parte 3

$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cep-escritura-acervo-antigo.php?conf4=ok&id='.$id);


}


if (isset($_POST['subimit3'])) {
unset($_POST['subimit3']);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cep-escritura-acervo-antigo.php?conf4=ok&id='.$id);

}


if (isset($_POST['subimit4'])) {
unset($_POST['subimit4']);

if ($_POST['strLivro'] == "" || $_POST['strLivro']== NULL || empty($_POST['strLivro'])) {
	$_SESSION['erro'] = 'Algum problema ocorreu, verifique se o livro esta informado!';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	return false;
break;
}

if ($_POST['strFolha'] == "" || $_POST['strFolha']== NULL || empty($_POST['strFolha'])) {
	$_SESSION['erro'] = 'Algum problema ocorreu, verifique se o livro esta informado!';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
break;
}

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strLivro',$_POST['strLivro'],$id);

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strFolha',$_POST['strFolha'],$id);


if ($_POST['numAto']) {
$numAto = $_POST['numAto'];
}else {
$numAto= MULL;
}
if ($_POST['Ordem']) {
$Ordem = $_POST['Ordem'];
}else {
$Ordem= MULL;
}


$consulta = $pdo->prepare("SELECT numAto, Ordem FROM notas_lavratura_acervo_antigo WHERE numAto = '$numAto'");
$consulta->execute();
$valor = $consulta->fetch(PDO::FETCH_ASSOC);

if ($consulta->rowCount() == 0){
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','Ordem',$Ordem,$id);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','numAto',$numAto,$id);
}else {
	$_SESSION['erro'] = 'Este codigo já foi utilizado antes por favor escolha outro!!!';
	unset($_SESSION['sucesso']);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	return false;
	break;
}

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strTextoLavraturaCartorio',addslashes($_POST['strTextoLavraturaCartorio']),$id);
#var_dump($_POST);
# redirecionar para impressão!!!
header('location:../../../index.php');
$_SESSION['sucesso'] = 'CONCLUIDO <br> Acervo antigo cadastrado no banco de dados';

}

if (isset($_POST['subimit6'])) {
unset($_POST['subimit6']);
UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strTextoLavraturaCartorio',addslashes($_POST['strTextoLavraturaCartorio']),$id);

UPDATE_CAMPO_ID('notas_lavratura_acervo_antigo','strTituloMinuta',$_POST['strTituloMinuta'],$id);


header('location:../notas-lavratura-cep-escritura-acervo-antigo.php?conf4=ok&id='.$id);
$_SESSION['sucesso'] = 'PRÉVIA SALVA, VOCÊ PODE VISUALIZAR AGORA!';

}

 ?>
