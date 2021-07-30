<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];
$pdo = conectar();
ob_start(); //corrigindo o errinho do header
//error_reporting(0);
//ini_set(“display_errors”, 0 );
#-------------------------------------------------------------------------------------------------------------------------


if (isset($_POST['subimit1'])) {
unset($_POST['subimit1']);


UPDATE_CAMPO_ID('notas_lavratura','setTipoCensec',1,$id);
UPDATE_CAMPO_ID('notas_lavratura','dataAto',$_POST['dataAto'],$id);

UPDATE_CAMPO_ID('notas_lavratura','quantidadeOutorgado',$_POST['quantidadeOutorgado'],$id);
UPDATE_CAMPO_ID('notas_lavratura','quantidadeOutorgante',$_POST['quantidadeOutorgante'],$id);
UPDATE_CAMPO_ID('notas_lavratura','quantidadeTestemunha',$_POST['quantidadeTestemunha'],$id);
UPDATE_CAMPO_ID('notas_lavratura','quantidadeSelo',$_POST['quantidadeSelo'],$id);
UPDATE_CAMPO_ID('notas_lavratura','possuiImovel',$_POST['possuiImovel'],$id);
#UPDATE_CAMPO_ID('notas_lavratura','possuiDOI',$_POST['possuiDOI'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strAnotacoes',$_POST['strAnotacoes'],$id);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cep-procuracao.php?conf1=ok&id='.$id);

}





if (empty($_POST['checkboxPossuiFilhos'])) {
	$_POST['checkboxPossuiFilhos'] = '0';

}



if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);

UPDATE_CAMPO_ID('notas_lavratura','setTipodeAtoCep',2,$id);
UPDATE_CAMPO_ID('notas_lavratura','setNaturezaEscritura',isset($_POST['setNaturezaEscritura']),$id);
UPDATE_CAMPO_ID('notas_lavratura','setNaturezaLitigio',isset($_POST['setNaturezaLitigio']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strAcordo',isset($_POST['strAcordo']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strInfoAdicionais',$_POST['strInfoAdicionais'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strAtoDesconhecido',$_POST['strAtoDesconhecido'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLivroOutro',$_POST['strLivroOutro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLivroComplementoOutro',$_POST['strLivroComplementoOutro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFolhaOutro',$_POST['strFolhaOutro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFolhaComplementoOutro',$_POST['strFolhaComplementoOutro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strEstadoOutro',$_POST['strEstadoOutro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeOutro',isset($_POST['strCidadeOutro']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeCartorioOutro',mb_strtoupper($_POST['strNomeCartorioOutro']),$id);

$dataCasamento = isset($_POST['dataCasamento']);
$dataCasamento= date('Y/m/d', strtotime($dataCasamento));
UPDATE_CAMPO_ID('notas_lavratura','dataCasamento',$dataCasamento,$id);
UPDATE_CAMPO_ID('notas_lavratura','setRegimeBens',isset($_POST['setRegimeBens']),$id);
UPDATE_CAMPO_ID('notas_lavratura','checkboxPossuiFilhos',isset($_POST['checkboxPossuiFilhos']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strFilhosMaiores',isset($_POST['strFilhosMaiores']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strFilhosMenores',isset($_POST['strFilhosMenores']),$id);
UPDATE_CAMPO_ID('notas_lavratura','setResponsavelFilhos',isset($_POST['setResponsavelFilhos']),$id);
UPDATE_CAMPO_ID('notas_lavratura','qtdFilhosMaiores',isset($_POST['qtdFilhosMaiores']),$id);
UPDATE_CAMPO_ID('notas_lavratura','qtdFilhosMenores',isset($_POST['qtdFilhosMenores']),$id);



UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte1',$_POST['setQualidadeCepParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte1',addslashes(mb_strtoupper($_POST['strNomeParte1'])),$id);
UPDATE_CAMPO_ID('notas_lavratura','setAssinaParte1',mb_strtoupper($_POST['setAssinaParte1']),$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte1',mb_strtoupper($_POST['setSexoParte1']),$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte1',$_POST['setTipoDocumento1Parte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte1',$_POST['strRGParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte1',$_POST['strOrgaoEmissorParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte1',$_POST['strOrgaoEmissorUFParte1'],$id);

UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte1',$_POST['setTipoDocumento2Parte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte1',$_POST['strCPFParte1'],$id);

$dataNascimentoParte1 = $_POST['dataNascimentoParte1'];
$dataNascimentoParte1= date('Y/m/d', strtotime($dataNascimentoParte1));
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte1',$dataNascimentoParte1,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte1',$_POST['strProfissaoParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte1',$_POST['setEstadoCivilParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRogoParte1',mb_strtoupper($_POST['strRogoParte1']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte1',mb_strtoupper($_POST['strMotivoParte1']),$id);
$strRepresentanteParte1 = NULL;
if (isset($_POST['strRepresentanteParte1'])) {

	$strRepresentanteParte1 = $_POST['strRepresentanteParte1'];
	$strRepresentanteParte1 = implode (',', (array)$strRepresentanteParte1);

}
UPDATE_CAMPO_ID('notas_lavratura','strRepresentanteParte1',mb_strtoupper($strRepresentanteParte1),$id);

UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte1',mb_strtoupper($_POST['strProcuradorParte1']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorLivroParte1',$_POST['strProcuradorLivroParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorFolhaParte1',$_POST['strProcuradorFolhaParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorOrdemParte1',$_POST['strProcuradorOrdemParte1'],$id);



$strProcuradorDataParte1 = $_POST['strProcuradorDataParte1'];
$strProcuradorDataParte1= date('Y/m/d', strtotime($strProcuradorDataParte1));
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorDataParte1',$strProcuradorDataParte1,$id);

UPDATE_CAMPO_ID('notas_lavratura','strProcuradorCartorioParte1',mb_strtoupper($_POST['strProcuradorCartorioParte1']),$id);



UPDATE_CAMPO_ID('notas_lavratura','strUFParte1',$_POST['strUFParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte1',$_POST['strNacionalidadeParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte1',$_POST['strPaisResideParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte1',$_POST['strNaturalParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte1',(int)$_POST['strCidadeParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte1',mb_strtoupper($_POST['strLogradouroParte1']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte1',mb_strtoupper($_POST['strBairroParte1']),$id);

//parte 2

UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte2',$_POST['setQualidadeCepParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte2',mb_strtoupper($_POST['strNomeParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura','setAssinaParte2',mb_strtoupper($_POST['setAssinaParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte2',mb_strtoupper($_POST['setSexoParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte2',$_POST['setTipoDocumento1Parte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte2',$_POST['strRGParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte2',$_POST['strOrgaoEmissorParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte2',$_POST['strOrgaoEmissorUFParte2'],$id);

UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte2',$_POST['setTipoDocumento2Parte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte2',$_POST['strCPFParte2'],$id);

$dataNascimentoParte2 = $_POST['dataNascimentoParte2'];
$dataNascimentoParte2= date('Y/m/d', strtotime($dataNascimentoParte2));
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte2',$dataNascimentoParte2,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte2',mb_strtoupper($_POST['strProfissaoParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte2',mb_strtoupper($_POST['setEstadoCivilParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strRogoParte2',mb_strtoupper($_POST['strRogoParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte2',mb_strtoupper($_POST['strMotivoParte2']),$id);

UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte2',mb_strtoupper($_POST['strProcuradorParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorLivroParte2',$_POST['strProcuradorLivroParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorFolhaParte2',$_POST['strProcuradorFolhaParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorOrdemParte2',$_POST['strProcuradorOrdemParte2'],$id);

$strProcuradorDataParte2 = $_POST['strProcuradorDataParte2'];
$strProcuradorDataParte2= date('Y/m/d', strtotime($strProcuradorDataParte2));
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorDataParte2',$strProcuradorDataParte2,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorCartorioParte2',mb_strtoupper($_POST['strProcuradorCartorioParte2']),$id);


UPDATE_CAMPO_ID('notas_lavratura','strUFParte2',$_POST['strUFParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte2',$_POST['strNacionalidadeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte2',$_POST['strPaisResideParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte2',$_POST['strNaturalParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte2',(int)$_POST['strCidadeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte2',mb_strtoupper($_POST['strLogradouroParte2']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte2',mb_strtoupper($_POST['strBairroParte2']),$id);

//parte 3

if (isset($_POST['setQualidadeCepParte3'])) {
$setQualidadeCepParte3 = $_POST['setQualidadeCepParte3'];
}

if (isset($_POST['strNomeParte3'])){
	$strNomeParte3 = $_POST['strNomeParte3'];
}else {
	$strNomeParte3 = NULL;
}
if (isset($_POST['setAssinaParte3'])){
	$setAssinaParte3 = $_POST['setAssinaParte3'];
}else {
	$setAssinaParte3 = NULL;
}
if (isset($_POST['setSexoParte3'])){

	$setSexoParte3 = $_POST['setSexoParte3'];

}
if (isset($_POST['setTipoDocumento1Parte3'])){
	$setTipoDocumento1Parte3 = $_POST['setTipoDocumento1Parte3'];


}
if (isset($_POST['strRGParte3'])){

	$strRGParte3 = $_POST['strRGParte3'];

}
if (isset($_POST['strOrgaoEmissorParte3'])){
	$strOrgaoEmissorParte3 = $_POST['strOrgaoEmissorParte3'];


}
if (isset($_POST['strOrgaoEmissorUFParte3'])){

	$strOrgaoEmissorUFParte3 = $_POST['strOrgaoEmissorUFParte3'];

}

if (isset($_POST['setTipoDocumento2Parte3'])){

	$setTipoDocumento2Parte3 = $_POST['setTipoDocumento2Parte3'];

}
if (isset($_POST['strCPFParte3'])){

	$strCPFParte3 = $_POST['strCPFParte3'];

}
if (isset($_POST['dataNascimentoParte3'])) {
$dataNascimentoParte3 = $_POST['dataNascimentoParte3'];
}
UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte3',$setQualidadeCepParte3,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte3',mb_strtoupper($strNomeParte3),$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte3',mb_strtoupper($setSexoParte3),$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte3',$setTipoDocumento1Parte3,$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte3',$strRGParte3,$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte3',$strOrgaoEmissorParte3,$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte3',$strOrgaoEmissorUFParte3,$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte3',$setTipoDocumento2Parte3,$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte3',$strCPFParte3,$id);
$dataNascimentoParte3= date('Y/m/d', strtotime($dataNascimentoParte3));
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte3',$dataNascimentoParte3,$id);



if (isset($_POST['strProfissaoParte3'])) {

	$strProfissaoParte3 = $_POST['strProfissaoParte3'];

}
if (isset($_POST['setEstadoCivilParte3'])) {

	$setEstadoCivilParte3 = $_POST['setEstadoCivilParte3'];

}
if (isset($_POST['strRogoParte3'])) {

	$strRogoParte3 = $_POST['strRogoParte3'];

}
if (isset($_POST['strMotivoParte3'])) {

	$strMotivoParte3 = $_POST['strMotivoParte3'];

}
if (isset($_POST['strProcuradorParte3'])) {

	$strProcuradorParte3 = $_POST['strProcuradorParte3'];

}

if (isset($_POST['strUFParte3'])) {
	$strUFParte3 = $_POST['strUFParte3'];


}
if (isset($_POST['strNacionalidadeParte3'])) {

	$strNacionalidadeParte3 = $_POST['strNacionalidadeParte3'];

}
if (isset($_POST['strPaisResideParte3'])) {
	$strPaisResideParte3 = $_POST['strPaisResideParte3'];


}
if (isset($_POST['strNaturalParte3'])) {

	$strNaturalParte3 = $_POST['strNaturalParte3'];

}
if (isset($_POST['strCidadeParte3'])) {

	$strCidadeParte3 = (int)$_POST['strCidadeParte3'];

}
if (isset($_POST['strLogradouroParte3'])) {

	$strLogradouroParte3 = $_POST['strLogradouroParte3'];

}
if (isset($_POST['strBairroParte3'])) {

	$strBairroParte3 = $_POST['strBairroParte3'];

}

UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte3',mb_strtoupper($strProfissaoParte3),$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte3',mb_strtoupper($setEstadoCivilParte3),$id);
UPDATE_CAMPO_ID('notas_lavratura','strRogoParte3',mb_strtoupper($strRogoParte3),$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte3',mb_strtoupper($strMotivoParte3),$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte3',mb_strtoupper($strProcuradorParte3),$id);

UPDATE_CAMPO_ID('notas_lavratura','strUFParte3',$strUFParte3,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte3',$strNacionalidadeParte3,$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte3',$strPaisResideParte3,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte3',$strNaturalParte3,$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte3',$strCidadeParte3,$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte3',mb_strtoupper($strLogradouroParte3),$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte3',mb_strtoupper($strBairroParte3),$id);

//fechar parte 3
//parte 4

if (isset($_POST['setQualidadeCepParte4'])) {
$setQualidadeCepParte4 = $_POST['setQualidadeCepParte4'];
}

if (isset($_POST['strNomeParte4'])){
	$strNomeParte4 = $_POST['strNomeParte4'];
}else {
	$strNomeParte4 = NULL;
}
if (isset($_POST['setAssinaParte4'])){
	$setAssinaParte4 = $_POST['setAssinaParte4'];
}else {
	$setAssinaParte4 = NULL;
}

if (isset($_POST['setSexoParte4'])){

	$setSexoParte4 = $_POST['setSexoParte4'];

}
if (isset($_POST['setTipoDocumento1Parte4'])){
	$setTipoDocumento1Parte4 = $_POST['setTipoDocumento1Parte4'];


}
if (isset($_POST['strRGParte4'])){

	$strRGParte4 = $_POST['strRGParte4'];

}
if (isset($_POST['strOrgaoEmissorParte4'])){
	$strOrgaoEmissorParte4 = $_POST['strOrgaoEmissorParte4'];


}
if (isset($_POST['strOrgaoEmissorUFParte4'])){

	$strOrgaoEmissorUFParte4 = $_POST['strOrgaoEmissorUFParte4'];

}

if (isset($_POST['setTipoDocumento2Parte4'])){

	$setTipoDocumento2Parte4 = $_POST['setTipoDocumento2Parte4'];

}
if (isset($_POST['strCPFParte4'])){

	$strCPFParte4 = $_POST['strCPFParte4'];

}
if (isset($_POST['dataNascimentoParte4'])) {
$dataNascimentoParte4 = $_POST['dataNascimentoParte4'];
}
UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte4',$setQualidadeCepParte4,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte4',mb_strtoupper($strNomeParte4),$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte4',mb_strtoupper($setSexoParte4),$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte4',$setTipoDocumento1Parte4,$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte4',$strRGParte4,$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte4',$strOrgaoEmissorParte4,$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte4',$strOrgaoEmissorUFParte4,$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte4',$setTipoDocumento2Parte4,$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte4',$strCPFParte4,$id);
$dataNascimentoParte4= date('Y/m/d', strtotime($dataNascimentoParte4));
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte4',$dataNascimentoParte4,$id);



if (isset($_POST['strProfissaoParte4'])) {

	$strProfissaoParte4 = $_POST['strProfissaoParte4'];

}
if (isset($_POST['setEstadoCivilParte4'])) {

	$setEstadoCivilParte4 = $_POST['setEstadoCivilParte4'];

}
if (isset($_POST['strRogoParte4'])) {

	$strRogoParte4 = $_POST['strRogoParte4'];

}
if (isset($_POST['strMotivoParte4'])) {

	$strMotivoParte4 = $_POST['strMotivoParte4'];

}
if (isset($_POST['strProcuradorParte4'])) {

	$strProcuradorParte4 = $_POST['strProcuradorParte4'];

}

if (isset($_POST['strUFParte4'])) {
	$strUFParte4 = $_POST['strUFParte4'];


}
if (isset($_POST['strNacionalidadeParte4'])) {

	$strNacionalidadeParte4 = $_POST['strNacionalidadeParte4'];

}
if (isset($_POST['strPaisResideParte4'])) {
	$strPaisResideParte4 = $_POST['strPaisResideParte4'];


}
if (isset($_POST['strNaturalParte4'])) {

	$strNaturalParte4 = $_POST['strNaturalParte4'];

}
if (isset($_POST['strCidadeParte4'])) {

	$strCidadeParte4 = (int)$_POST['strCidadeParte4'];

}
if (isset($_POST['strLogradouroParte4'])) {

	$strLogradouroParte4 = $_POST['strLogradouroParte4'];

}
if (isset($_POST['strBairroParte4'])) {

	$strBairroParte4 = $_POST['strBairroParte4'];

}

UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte4',mb_strtoupper($strProfissaoParte4),$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte4',mb_strtoupper($setEstadoCivilParte4),$id);
UPDATE_CAMPO_ID('notas_lavratura','strRogoParte4',mb_strtoupper($strRogoParte4),$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte4',mb_strtoupper($strMotivoParte4),$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte4',mb_strtoupper($strProcuradorParte4),$id);

UPDATE_CAMPO_ID('notas_lavratura','strUFParte4',$strUFParte4,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte4',$strNacionalidadeParte4,$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte4',$strPaisResideParte4,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte4',$strNaturalParte4,$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte4',$strCidadeParte4,$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte4',mb_strtoupper($strLogradouroParte4),$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte4',mb_strtoupper($strBairroParte4),$id);


//fechar parte 4


//parte 5
#####PARTE OUTORGADO

$QualidadeCepParte5 = NULL;
if (isset($_POST['setQualidadeCepParte5'])) {

	$QualidadeCepParte5 = $_POST['setQualidadeCepParte5'];
	$QualidadeCepParte5 = implode (',', (array)$QualidadeCepParte5);

}

$nomeParte5 = NULL;
if (isset($_POST['strNomeParte5'])) {

	$nomeParte5 = $_POST['strNomeParte5'];
	$nomeParte5 = implode (',', (array)$nomeParte5);
}
$setAssinaParte5 = NULL;
if (isset($_POST['setAssinaParte5'])) {

	$setAssinaParte5 = $_POST['setAssinaParte5'];
	$setAssinaParte5 = implode (',', (array)$setAssinaParte5);
}

$setSexoParte5 = NULL;
if (isset($_POST['setSexoParte5'])) {

	$setSexoParte5 = $_POST['setSexoParte5'];
	$setSexoParte5 = implode (',', (array)$setSexoParte5);

}
$setTipoDocumento1Parte5 = NULL;
if (isset($_POST['setTipoDocumento1Parte5'])) {

	$setTipoDocumento1Parte5 = $_POST['setTipoDocumento1Parte5'];
	$setTipoDocumento1Parte5 = implode(',', (array)$setTipoDocumento1Parte5);


}

$strRGParte5 = NULL;
if (isset($_POST['strRGParte5'])) {

	$strRGParte5 = $_POST['strRGParte5'];
	$strRGParte5 = implode (',', (array)$strRGParte5);


}

$strOrgaoEmissorParte5 = NULL;
if (isset($_POST['strOrgaoEmissorParte5'])) {

	$strOrgaoEmissorParte5 = $_POST['strOrgaoEmissorParte5'];
	$strOrgaoEmissorParte5 = implode (',', (array)$strOrgaoEmissorParte5);


}

$strOrgaoEmissorUFParte5 = NULL;
if (isset($_POST['strOrgaoEmissorUFParte5'])) {

	$strOrgaoEmissorUFParte5 = $_POST['strOrgaoEmissorUFParte5'];
	$strOrgaoEmissorUFParte5 = implode (',', (array)$strOrgaoEmissorUFParte5);

}
$setTipoDocumento2Parte5 = NULL;
if (isset($_POST['setTipoDocumento2Parte5'])) {

	$setTipoDocumento2Parte5 = $_POST['setTipoDocumento2Parte5'];
	$setTipoDocumento2Parte5 = implode (',', (array)setTipoDocumento2Parte5);

}
$strCPFParte5 = NULL;
if (isset($_POST['strCPFParte5'])) {

	$strCPFParte5 = $_POST['strCPFParte5'];
	$strCPFParte5 = implode (',', (array)$strCPFParte5);
}

$dataNascimentoParte5 = '1111-11-11';
if (isset($_POST['dataNascimentoParte5'])) {

	$dataNascimentoParte5 = $_POST['dataNascimentoParte5'];
	$dataNascimentoParte5 = implode (',',$dataNascimentoParte5);
	$dataNascimentoParte5 = date('Y/m/d', strtotime($dataNascimentoParte5));
}


$strProfissaoParte5 = NULL;
if (isset($_POST['strProfissaoParte5'])) {

	$strProfissaoParte5 = $_POST['strProfissaoParte5'];
	$strProfissaoParte5 = implode (',', (array)$strProfissaoParte5);

}

$setEstadoCivilParte5 = NULL;
if (isset($_POST['setEstadoCivilParte5'])) {

	$setEstadoCivilParte5 = $_POST['setEstadoCivilParte5'];
	$setEstadoCivilParte5 = implode (',', (array)$setEstadoCivilParte5);

}

$strRogoParte5 = NULL;
if (isset($_POST['strRogoParte5'])) {

	$strRogoParte5 = $_POST['strRogoParte5'];
	$strRogoParte5 = implode (',', (array)$strRogoParte5);

}
$strRepresentanteParte5 = NULL;
if (isset($_POST['strRepresentanteParte5'])) {

	$strRepresentanteParte5 = $_POST['strRepresentanteParte5'];
	$strRepresentanteParte5 = implode (',', (array)$strRepresentanteParte5);

}
$strMotivoParte5 = NULL;
if (isset($_POST['strMotivoParte5'])) {

	$strMotivoParte5 = $_POST['strMotivoParte5'];
	$strMotivoParte5 = implode (',', (array)$strMotivoParte5);

}

$strProcuradorParte5 = NULL;
if (isset($_POST['strProcuradorParte5'])) {

	$strProcuradorParte5 = $_POST['strProcuradorParte5'];
	$strProcuradorParte5 = implode (',', (array)$strProcuradorParte5);


}
$strProcuradorLivroParte5 = NULL;
if (isset($_POST['strProcuradorLivroParte5'])) {

	$strProcuradorLivroParte5 = $_POST['strProcuradorLivroParte5'];
	$strProcuradorLivroParte5 = implode (',', (array)$strProcuradorLivroParte5);


}
$strProcuradorFolhaParte5 = NULL;
if (isset($_POST['strProcuradorFolhaParte5'])) {

	$strProcuradorFolhaParte5 = $_POST['strProcuradorFolhaParte5'];
	$strProcuradorFolhaParte5 = implode (',', (array)$strProcuradorFolhaParte5);

}

$strProcuradorOrdemParte5 = NULL;
if (isset($_POST['strProcuradorOrdemParte5'])) {
	$strProcuradorOrdemParte5 = $_POST['strProcuradorOrdemParte5'];
	$strProcuradorOrdemParte5 = implode (',', (array)$strProcuradorOrdemParte5);


}

$strProcuradorDataParte5 = '1111-11-11';
if (isset($_POST['strProcuradorDataParte5'])) {
	$strProcuradorDataParte5 = $_POST['strProcuradorDataParte5'];
	$strProcuradorDataParte5 = implode (',', (array)$strProcuradorDataParte5);
	$strProcuradorDataParte2= date('Y/m/d', strtotime($strProcuradorDataParte5));
}


$strProcuradorCartorioParte5 = NULL;
if (isset($_POST['strProcuradorCartorioParte5'])) {
	$strProcuradorCartorioParte5 = $_POST['strProcuradorCartorioParte5'];
	$strProcuradorCartorioParte5 = implode (',', (array)$strProcuradorCartorioParte5);
}

$strUFParte5 = NULL;
if (isset($_POST['strUFParte5'])) {
	$strUFParte5 = $_POST['strUFParte5'];
	$strUFParte5 = implode (',', (array)$strUFParte5);

}

$strNacionalidadeParte5 = NULL;
if (isset($_POST['strNacionalidadeParte5'])) {

	$strNacionalidadeParte5 = $_POST['strNacionalidadeParte5'];
	$strNacionalidadeParte5 = implode (',', (array)$strNacionalidadeParte5);

}

$strPaisResideParte5 = NULL;
if (isset($_POST['strPaisResideParte5'])) {
	$strPaisResideParte5  = $_POST['strPaisResideParte5'];
	$strPaisResideParte5 = implode (',', (array)$strPaisResideParte5);

}

$strNaturalParte5 = NULL;
if (isset($_POST['strNaturalParte5'])) {
	$strNaturalParte5 = $_POST['strNaturalParte5'];
	$strNaturalParte5 = implode (',', (array)$strNaturalParte5);

}

$strCidadeParte5 = NULL;
if (isset($_POST['strCidadeParte5'])) {
	$strCidadeParte5 = $_POST['strCidadeParte5'];
	$strCidadeParte5 = implode (',', (array)$strCidadeParte5);

}

$strLogradouroParte5 = NULL;
if (isset($_POST['strLogradouroParte5'])) {
	$strLogradouroParte5 = $_POST['strLogradouroParte5'];
	$strLogradouroParte5 = implode (',', (array)$strLogradouroParte5);
}


$strBairroParte5 = NULL;
if (isset($_POST['strBairroParte5'])) {
	$strBairroParte5 = $_POST['strBairroParte5'];
	$strBairroParte5 = implode (',', (array)$strBairroParte5);
}


UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte5',mb_strtoupper($QualidadeCepParte5),$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte5',mb_strtoupper($nomeParte5),$id);
UPDATE_CAMPO_ID('notas_lavratura','setAssinaParte5',mb_strtoupper($setAssinaParte5),$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte5',mb_strtoupper($setSexoParte5),$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte5',$setTipoDocumento1Parte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte5',$strRGParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte5',$strOrgaoEmissorParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte5',$strOrgaoEmissorUFParte5,$id);

UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte5',$setTipoDocumento2Parte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte5',$strCPFParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte5',$dataNascimentoParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte5',mb_strtoupper($strProfissaoParte5),$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte5',mb_strtoupper($setEstadoCivilParte5),$id);


UPDATE_CAMPO_ID('notas_lavratura','strRepresentanteParte5',mb_strtoupper($strRepresentanteParte5),$id);
UPDATE_CAMPO_ID('notas_lavratura','strRogoParte5',mb_strtoupper($strRogoParte5),$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte5',$strMotivoParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte5',mb_strtoupper($strProcuradorParte5),$id);

UPDATE_CAMPO_ID('notas_lavratura','strProcuradorLivroParte5',$strProcuradorLivroParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorFolhaParte5',$strProcuradorFolhaParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorOrdemParte5',$strProcuradorOrdemParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorDataParte5',$strProcuradorDataParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorCartorioParte5',mb_strtoupper($strProcuradorCartorioParte5),$id);

UPDATE_CAMPO_ID('notas_lavratura','strUFParte5',$strUFParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte5',$strNacionalidadeParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte5',$strPaisResideParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte5',$strNaturalParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte5',$strCidadeParte5,$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte5',mb_strtoupper($strLogradouroParte5),$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte5',mb_strtoupper($strBairroParte5),$id);



//fechar parte 5

#####PARTE OUTORGANTE

$QualidadeCepParte6 = NULL;
if (isset($_POST['setQualidadeCepParte6'])) {

	$QualidadeCepParte6 = $_POST['setQualidadeCepParte6'];
	$QualidadeCepParte6 = implode (',', (array)$QualidadeCepParte6);

}

$nomeParte6 = NULL;
if (isset($_POST['strNomeParte6'])) {

	$nomeParte6 = $_POST['strNomeParte6'];
	$nomeParte6 = implode (',', (array)$nomeParte6);
}
$setAssinaParte6 = NULL;
if (isset($_POST['setAssinaParte6'])) {

	$setAssinaParte6 = $_POST['setAssinaParte6'];
	$setAssinaParte6 = implode (',', (array)$setAssinaParte6);
}

$setSexoParte6 = NULL;
if (isset($_POST['setSexoParte6'])) {

	$setSexoParte6 = $_POST['setSexoParte6'];
	$setSexoParte6 = implode (',', (array)$setSexoParte6);

}
$setTipoDocumento1Parte6 = NULL;
if (isset($_POST['setTipoDocumento1Parte6'])) {

	$setTipoDocumento1Parte6 = $_POST['setTipoDocumento1Parte6'];
	$setTipoDocumento1Parte6 = implode(',', (array)$setTipoDocumento1Parte6);


}

$strRGParte6 = NULL;
if (isset($_POST['strRGParte6'])) {

	$strRGParte6 = $_POST['strRGParte6'];
	$strRGParte6 = implode (',', (array)$strRGParte6);


}

$strOrgaoEmissorParte6 = NULL;
if (isset($_POST['strOrgaoEmissorParte6'])) {

	$strOrgaoEmissorParte6 = $_POST['strOrgaoEmissorParte6'];
	$strOrgaoEmissorParte6 = implode (',', (array)$strOrgaoEmissorParte6);


}

$strOrgaoEmissorUFParte6 = NULL;
if (isset($_POST['strOrgaoEmissorUFParte6'])) {

	$strOrgaoEmissorUFParte6 = $_POST['strOrgaoEmissorUFParte6'];
	$strOrgaoEmissorUFParte6 = implode (',', (array)$strOrgaoEmissorUFParte6);

}
$setTipoDocumento2Parte6 = NULL;
if (isset($_POST['setTipoDocumento2Parte6'])) {

	$setTipoDocumento2Parte6 = $_POST['setTipoDocumento2Parte6'];
	$strOrgaoEmissorUFParte6 = implode (',', (array)$strOrgaoEmissorUFParte6);

}
$strCPFParte6 = NULL;
if (isset($_POST['strCPFParte6'])) {

	$strCPFParte6 = $_POST['strCPFParte6'];
	$strCPFParte6 = implode (',', (array)$strCPFParte6);
}

$dataNascimentoParte6 = '1111-11-11';
if (isset($_POST['dataNascimentoParte6'])) {

	$dataNascimentoParte6 = $_POST['dataNascimentoParte6'];
	$dataNascimentoParte6 = implode (',',$dataNascimentoParte6);
	$dataNascimentoParte6 = date('Y/m/d', strtotime($dataNascimentoParte6));
}


$strProfissaoParte6 = NULL;
if (isset($_POST['strProfissaoParte6'])) {

	$strProfissaoParte6 = $_POST['strProfissaoParte6'];
	$strProfissaoParte6 = implode (',', (array)$strProfissaoParte6);

}

$setEstadoCivilParte6 = NULL;
if (isset($_POST['setEstadoCivilParte6'])) {

	$setEstadoCivilParte6 = $_POST['setEstadoCivilParte6'];
	$setEstadoCivilParte6 = implode (',', (array)$setEstadoCivilParte6);

}

$strRogoParte6 = NULL;
if (isset($_POST['strRogoParte6'])) {

	$strRogoParte6 = $_POST['strRogoParte6'];
	$strRogoParte6 = implode (',', (array)$strRogoParte6);

}
$strRepresentanteParte6 = NULL;
if (isset($_POST['strRepresentanteParte6'])) {

	$strRepresentanteParte6 = $_POST['strRepresentanteParte6'];
	$strRepresentanteParte6 = implode (',', (array)$strRepresentanteParte6);

}
if (isset($_POST['strMotivoParte6'])) {

	$strMotivoParte6 = $_POST['strMotivoParte6'];
	$strMotivoParte6 = implode (',', (array)$strMotivoParte6);

}else {
	$strMotivoParte6 = NULL;

}

$strProcuradorParte6 = NULL;
if (isset($_POST['strProcuradorParte6'])) {

	$strProcuradorParte6 = $_POST['strProcuradorParte6'];
	$strProcuradorParte6 = implode (',', (array)$strProcuradorParte6);


}
$strProcuradorLivroParte6 = NULL;
if (isset($_POST['strProcuradorLivroParte6'])) {

	$strProcuradorLivroParte6 = $_POST['strProcuradorLivroParte6'];
	$strProcuradorLivroParte6 = implode (',', (array)$strProcuradorLivroParte6);


}
$strProcuradorFolhaParte6 = NULL;
if (isset($_POST['strProcuradorFolhaParte6'])) {

	$strProcuradorFolhaParte6 = $_POST['strProcuradorFolhaParte6'];
	$strProcuradorFolhaParte6 = implode (',', (array)$strProcuradorFolhaParte6);

}

$strProcuradorOrdemParte6 = NULL;
if (isset($_POST['strProcuradorOrdemParte6'])) {
	$strProcuradorOrdemParte6 = $_POST['strProcuradorOrdemParte6'];
	$strProcuradorOrdemParte6 = implode (',', (array)$strProcuradorOrdemParte6);


}

$strProcuradorDataParte6 = '1111-11-11';
if (isset($_POST['strProcuradorDataParte6'])) {
	$strProcuradorDataParte6 = $_POST['strProcuradorDataParte6'];
	$strProcuradorDataParte6 = implode (',', (array)$strProcuradorDataParte6);
	$strProcuradorDataParte2= date('Y/m/d', strtotime($strProcuradorDataParte6));
}


$strProcuradorCartorioParte6 = NULL;
if (isset($_POST['strProcuradorCartorioParte6'])) {
	$strProcuradorCartorioParte6 = $_POST['strProcuradorCartorioParte6'];
	$strProcuradorCartorioParte6 = implode (',', (array)$strProcuradorCartorioParte6);
}

$strUFParte6 = NULL;
if (isset($_POST['strUFParte6'])) {
	$strUFParte6 = $_POST['strUFParte6'];
	$strUFParte6 = implode (',', (array)$strUFParte6);

}

$strNacionalidadeParte6 = NULL;
if (isset($_POST['strNacionalidadeParte6'])) {

	$strNacionalidadeParte6 = $_POST['strNacionalidadeParte6'];
	$strNacionalidadeParte6 = implode (',', (array)$strNacionalidadeParte6);

}

$strPaisResideParte6 = NULL;
if (isset($_POST['strPaisResideParte6'])) {
	$strPaisResideParte6  = $_POST['strPaisResideParte6'];
	$strPaisResideParte6 = implode (',', (array)$strPaisResideParte6);

}

$strNaturalParte6 = NULL;
if (isset($_POST['strNaturalParte6'])) {
	$strNaturalParte6 = $_POST['strNaturalParte6'];
	$strNaturalParte6 = implode (',', (array)$strNaturalParte6);

}

$strCidadeParte6 = NULL;
if (isset($_POST['strCidadeParte6'])) {
	$strCidadeParte6 = $_POST['strCidadeParte6'];
	$strCidadeParte6 = implode (',', (array)$strCidadeParte6);

}

$strLogradouroParte6 = NULL;
if (isset($_POST['strLogradouroParte6'])) {
	$strLogradouroParte6 = $_POST['strLogradouroParte6'];
	$strLogradouroParte6 = implode (',', (array)$strLogradouroParte6);
}


$strBairroParte6 = NULL;
if (isset($_POST['strBairroParte6'])) {
	$strBairroParte6 = $_POST['strBairroParte6'];
	$strBairroParte6 = implode (',', (array)$strBairroParte6);
}


UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte6',mb_strtoupper($QualidadeCepParte6),$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte6',mb_strtoupper($nomeParte6),$id);
UPDATE_CAMPO_ID('notas_lavratura','setAssinaParte6',mb_strtoupper($setAssinaParte6),$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte6',mb_strtoupper($setSexoParte6),$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte6',$setTipoDocumento1Parte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte6',$strRGParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte6',$strOrgaoEmissorParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte6',$strOrgaoEmissorUFParte6,$id);

UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte6',$setTipoDocumento2Parte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte6',$strCPFParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte6',$dataNascimentoParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte6',mb_strtoupper($strProfissaoParte6),$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte6',mb_strtoupper($setEstadoCivilParte6),$id);

UPDATE_CAMPO_ID('notas_lavratura','strRogoParte6',mb_strtoupper($strRogoParte6),$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte6',$strMotivoParte6,$id);

UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte6',mb_strtoupper($strProcuradorParte6),$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorLivroParte6',$strProcuradorLivroParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorFolhaParte6',$strProcuradorFolhaParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorOrdemParte6',$strProcuradorOrdemParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorDataParte6',$strProcuradorDataParte6,$id);

UPDATE_CAMPO_ID('notas_lavratura','strProcuradorCartorioParte6',mb_strtoupper($strProcuradorCartorioParte6),$id);


UPDATE_CAMPO_ID('notas_lavratura','strUFParte6',$strUFParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte6',$strNacionalidadeParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte6',$strPaisResideParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte6',$strNaturalParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte6',$strCidadeParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte6',mb_strtoupper($strLogradouroParte6),$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte6',mb_strtoupper($strBairroParte6),$id);
//fechar parte 6
$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cep-procuracao.php?conf4=ok&id='.$id);
}


if (isset($_POST['strSelo'])) {
unset($_POST['subimit3']);




$seloExplode = $_POST['strSelo'];
$selo = implode(',', $seloExplode);

$seloGratuitoExplode = $_POST['seloGratuito'];
$seloGratuito = implode (',', $seloGratuitoExplode);

UPDATE_CAMPO_ID('notas_lavratura','strSelo',$selo,$id);
UPDATE_CAMPO_ID('notas_lavratura','seloGratuito',$seloGratuito,$id);

UPDATE_CAMPO_ID('notas_lavratura','strLivro', $_POST['strLivro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFolha',$_POST['strFolha'],$id);
UPDATE_CAMPO_ID('notas_lavratura','Ordem',$_POST['Ordem'],$id);
UPDATE_CAMPO_ID('notas_lavratura','numAto',$_POST['Ordem'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strFolhaComplemento',$_POST['strFolhaComplemento'],$id);


$strDescricaoAto = $_POST['strDescricaoAto'];
$strDescricaoAto = implode (',', $strDescricaoAto);

$decValorEmol = $_POST['decValorEmol'];
$decValorEmol = implode (',', $decValorEmol);

$decFerc = $_POST['decFerc'];
$decFerc = implode (',', $decFerc);

$decFerj = $_POST['decFerj'];
$decFerj = implode (',', $decFerj);

$decISSQN = $_POST['decISSQN'];
$decISSQN = implode (',', $decISSQN);

$decTotal = $_POST['decTotal'];
$decTotal = implode (',', $decTotal);
//UPDATE_CAMPO_ID('notas_lavratura','strSelo',$_POST['strSelo'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strDescricaoAto',$strDescricaoAto,$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorEmol',$decValorEmol,$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerc',$decFerc,$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerj',$decFerj,$id);
UPDATE_CAMPO_ID('notas_lavratura','decISSQN',$decISSQN,$id);
UPDATE_CAMPO_ID('notas_lavratura','decTotal',$decTotal,$id);
$dataAto = date('Y-m-d');
UPDATE_CAMPO_ID('notas_lavratura','dataAto',$dataAto,$id);

#parte de auditoria:
$r = PESQUISA_ALL_ID('notas_lavratura',$id);
foreach ($r as $r ) {

$seloExplode = $r->strSelo;
$seloExplode = explode(',', $seloExplode);

$seloGratuitoExplode = $r->seloGratuito;
$seloGratuito = explode(',', $seloGratuitoExplode);

$desTipoAto = $r->strDescricaoAto;
$desTipoAto = explode(',', $desTipoAto);

$numLivro =  $r->strFolha;
$numFolha = $r->strLivro;
$numOrdem = $r->Ordem;

for ($i=0; $i < $r->quantidadeSelo; $i++) {
if ($seloGratuito[$i] == 'S') {
$tipoSelo = 'GRA';
}else {
$tipoSelo = 'GER';
}
$funcionario = $_SESSION['nome'];
$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','PROCURAÇÃO','1','1','$seloExplode[$i]',CURRENT_TIMESTAMP,'$tipoSelo','$desTipoAto[$i]','$numLivro','$numFolha','$numOrdem','0','0','0')");
$insert_auditoria->execute();

}
}
$_SESSION['sucesso'] = 'FORMULÁRIO CONCLUIDO (lavratura)';
header('location:../imprimir/notas-lavratura.php?id='.$id);
}


if (isset($_POST['subimit4'])) {
unset($_POST['subimit4']);

if ($_POST['strLivro'] == "" || $_POST['strLivro']== NULL || empty($_POST['strLivro'])) {
	$_SESSION['erro'] = 'Algum problema ocorreu, verifique o se o livro esta aberto!';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
break;
}
//inicializar no banco cada ID setTipodeAtoCep correspondente ao livro
//inicializar o primeiro id de cada livro com numero de ordem e ato  = 0


$pesquisa_livro = $pdo->prepare("SELECT * FROM livro_notas_procuracao where status = 'L' limit 1");
$pesquisa_livro->execute();
$linhas_livro = $pesquisa_livro->fetch(PDO::FETCH_ASSOC);
$livro = $linhas_livro['identifcadorLivro'];
if (isset($linhas_livro['LivroInicial'])) {
	$termo = $linhas_livro['LivroInicial']; #Numero de Ordem
}else {
	$termo = 0;
}



$pesquisa_livro_notas = $pdo->prepare("SELECT strLivro,strFolha,strFolhaFinal,strFolhaComplemento,setTipodeAtoCep,strSelo,quantidadeFolhas FROM `notas_lavratura` WHERE strFolha > 0 and setTipodeAtoCep = '2' and strLivro = '$livro'  and (strSelo IS NOT NULL || strSelo != '') ORDER BY `notas_lavratura`.`strFolha` DESC LIMIT 1 ");
$pesquisa_livro_notas->execute();
$p_livro_notas = $pesquisa_livro_notas->fetch(PDO::FETCH_ASSOC);

$folha = 0;

if ($p_livro_notas['strFolhaFinal'] == 0 && $p_livro_notas['strFolhaFinal'] == NULL || $p_livro_notas['strFolhaFinal'] == '') {
	$folha = 1;
}

else {
	$folha = $p_livro_notas['strFolha']+$p_livro_notas['quantidadeFolhas'] ;
}
$r = PESQUISA_ALL_ID('notas_lavratura',$id);
foreach ($r as $r ) {

if (!isset($r->strFolha) || empty($r->strFolha)) {
	UPDATE_CAMPO_ID('notas_lavratura','strFolha',$folha,$id);

	if ($folha % 2 == 0) {
	UPDATE_CAMPO_ID('notas_lavratura','strFolhaComplemento','V',$id);
	}else {
	UPDATE_CAMPO_ID('notas_lavratura','strFolhaComplemento','F',$id);
	}
}
}


#numero de ordem e do ato:

#Quando for cep:
$pesquisa_num_ordem = $pdo->prepare("SELECT strSelo,strFolha,strFolhaFinal,strFolhaComplemento,setTipodeAtoCep,Ordem, COUNT(Ordem) AS Quantidade FROM `notas_lavratura` WHERE strFolha > 0 and setTipodeAtoCep = '2' and (strSelo IS NOT NULL || strSelo != '') ORDER BY `notas_lavratura`.`strFolha`");
$pesquisa_num_ordem->execute();
$linhaOrdem = $pesquisa_num_ordem->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ordem_ato'] = $linhaOrdem['Quantidade'];
$numOrdem = $_SESSION['numero_ordem_ato']+$termo;

UPDATE_CAMPO_ID('notas_lavratura','Ordem',$numOrdem,$id);


$pesquisa_num_ato = $pdo->prepare("SELECT strSelo,strFolha,strFolhaFinal,strFolhaComplemento,setTipodeAtoCep,numAto, COUNT(numAto) AS Quantidade FROM `notas_lavratura` WHERE strFolha > 0 and setTipodeAtoCep = '2' and (strSelo IS NOT NULL || strSelo != '') ORDER BY `notas_lavratura`.`strFolha`");
$pesquisa_num_ato->execute();
$linhaAto = $pesquisa_num_ato->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ato'] = $linhaAto['Quantidade'];
$numAto = $_SESSION['numero_ato']+$termo;

UPDATE_CAMPO_ID('notas_lavratura','numAto',$numAto,$id);

UPDATE_CAMPO_ID('notas_lavratura','strLivro',$livro,$id);

UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCartorio',addslashes($_POST['strTextoLavraturaCartorio']),$id);
UPDATE_CAMPO_ID('notas_lavratura','strTituloMinuta',addslashes(mb_strtoupper($_POST['strTituloMinuta'])),$id);

#var_dump($_POST);
# redirecionar para impressão!!!
header('location:../notas-lavratura-cep-procuracao.php?conf3=ok&id='.$id);
$_SESSION['sucesso'] = 'FORMULÁRIO SALVO (ADICIONE O SELO PARA CONCLUIR)';

}

if (isset($_POST['subimit6'])) {
unset($_POST['subimit6']);
UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCartorio',addslashes($_POST['strTextoLavraturaCartorio']),$id);

UPDATE_CAMPO_ID('notas_lavratura','strTituloMinuta',addslashes(mb_strtoupper($_POST['strTituloMinuta'])),$id);


header('location:../notas-lavratura-cep-procuracao.php?conf4=ok&id='.$id);
$_SESSION['sucesso'] = 'PRÉVIA SALVA, VOCÊ PODE VISUALIZAR AGORA!';

}

 ?>
