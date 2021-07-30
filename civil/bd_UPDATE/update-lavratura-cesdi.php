<?php
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];
$pdo = conectar();
ob_start(); //corrigindo o errinho do header


#-------------------------------------------------------------------------------------------------------------------------



if (isset($_POST['subimit1'])) {
unset($_POST['subimit1']);

if ($_POST['strSeloG']!='') {
$selo = $_POST['strSeloG'];
}
else{
$selo = $_POST['strSelo'];
}
$busca_selo = $pdo->prepare("select * from selo_fisico_uso where selo = '$selo'");
$busca_selo->execute();

if ($busca_selo->rowCount() == 0) {
	$_SESSION['erro'] = 'Selo não encontrado';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	break;
}

$linha = $busca_selo->fetch(PDO::FETCH_ASSOC);
if ($linha['status'] == 'U') {
	$_SESSION['erro'] = 'O Selo informado já foi usado';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	break;
}

if ($linha['tipo']!= 'GER' && $linha['tipo']!= 'GRA' ) {
	$_SESSION['erro'] = 'O Selo informado Não serve para este tipo de atividade';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	break;
}

else{
	if (isset($_POST['seloGratuito']) && $_POST['seloGratuito'] == 'S') {
	$up = $pdo->prepare("update selo_fisico_uso set status = 'U' where selo = '$selo' and tipo ='GRA'");
	}
	else{
	$up = $pdo->prepare("update selo_fisico_uso set status = 'U' where selo = '$selo' and tipo ='GER'");
	}
	$up->execute();
	UPDATE_CAMPO_ID('notas_lavratura','strSelo',$selo,$id);
}

#ocupando a página do livro:


#ocupando a página do livro:


/*
UPDATE_CAMPO_ID('notas_lavratura','setSeloDiferido',$_POST['setSeloDiferido'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strSelo',$_POST['strSelo'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strDescricaoAto',$_POST['strDescricaoAto'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorEmol',$_POST['decValorEmol'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerc',$_POST['decFerc'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerj',$_POST['decFerj'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decISSQN',$_POST['decISSQN'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decTotal',$_POST['decTotal'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLivroNotas',$_POST['strLivroNotas'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strMinuta',$_POST['strMinuta'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataAto',$_POST['dataAto'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataProtocolo',$_POST['dataProtocolo'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNumProtocolo',$_POST['strNumProtocolo'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strMatricula',$_POST['strMatricula'],$id);


UPDATE_CAMPO_ID('notas_lavratura','decValorEconomico',$_POST['decValorEconomico'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorAvaliacao',$_POST['decValorAvaliacao'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorFiscal',$_POST['decValorFiscal'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strAnotacoes',$_POST['strAnotacoes'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setSeloGratuito',$_POST['setSeloGratuito'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strJustificativa',$_POST['strJustificativa'],$id);
*/
UPDATE_CAMPO_ID('notas_lavratura','dataAto',$_POST['dataAto'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strSelo',$_POST['strSelo'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strDescricaoAto',$_POST['strDescricaoAto'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorEmol',$_POST['decValorEmol'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerc',$_POST['decFerc'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerj',$_POST['decFerj'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decISSQN',$_POST['decISSQN'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decTotal',$_POST['decTotal'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strDescricaoAto2',$_POST['strDescricaoAto2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorEmol2',$_POST['decValorEmol2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerc2',$_POST['decFerc2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerj2',$_POST['decFerj2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decISSQN2',$_POST['decISSQN2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decTotal2',$_POST['decTotal2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strDescricaoAto3',$_POST['strDescricaoAto3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorEmol3',$_POST['decValorEmol3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerc3',$_POST['decFerc3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerj3',$_POST['decFerj3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decISSQN3',$_POST['decISSQN3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decTotal3',$_POST['decTotal3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strDescricaoAto4',$_POST['strDescricaoAto4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorEmol4',$_POST['decValorEmol4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerc4',$_POST['decFerc4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerj4',$_POST['decFerj4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decISSQN4',$_POST['decISSQN4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decTotal4',$_POST['decTotal4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strDescricaoAto5',$_POST['strDescricaoAto5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorEmol5',$_POST['decValorEmol5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerc5',$_POST['decFerc5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFerj5',$_POST['decFerj5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decISSQN5',$_POST['decISSQN5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decTotal5',$_POST['decTotal5'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strAnotacoes',$_POST['strAnotacoes'],$id);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cesdi.php?conf1=ok&id='.$id);

}





if (empty($_POST['checkboxPossuiFilhos'])) {
	$_POST['checkboxPossuiFilhos'] = '0';

}



if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);
UPDATE_CAMPO_ID('notas_lavratura','setTipodeAtoCep',$_POST['setTipodeAtoCep'],$id);

UPDATE_CAMPO_ID('notas_lavratura','setTipodeAtoCesdi',$_POST['setTipodeAtoCesdi'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataCasamento',$_POST['dataCasamento'],$id);

UPDATE_CAMPO_ID('notas_lavratura','setRegimeBens',$_POST['setRegimeBens'],$id);
UPDATE_CAMPO_ID('notas_lavratura','checkboxPossuiFilhos',$_POST['checkboxPossuiFilhos'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFilhosMaiores',$_POST['strFilhosMaiores'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFilhosMenores',$_POST['strFilhosMenores'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setResponsavelFilhos',$_POST['setResponsavelFilhos'],$id);

UPDATE_CAMPO_ID('notas_lavratura','qtdFilhosMaiores',$_POST['qtdFilhosMaiores'],$id);
UPDATE_CAMPO_ID('notas_lavratura','qtdFilhosMenores',$_POST['qtdFilhosMenores'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strInfoAdicionais',$_POST['strInfoAdicionais'],$id);


UPDATE_CAMPO_ID('notas_lavratura','setQualidadeParte1',$_POST['setQualidadeParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte1',$_POST['strNomeParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte1',$_POST['setSexoParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte1',$_POST['setTipoDocumento1Parte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte1',$_POST['strRGParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte1',$_POST['strOrgaoEmissorParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte1',$_POST['strOrgaoEmissorUFParte1'],$id);

UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte1',$_POST['setTipoDocumento2Parte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte1',$_POST['strCPFParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte1',$_POST['dataNascimentoParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte1',$_POST['strProfissaoParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte1',$_POST['setEstadoCivilParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRogoParte1',$_POST['strRogoParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte1',$_POST['strMotivoParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte1',$_POST['strProcuradorParte1'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strUFParte1',$_POST['strUFParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte1',$_POST['strNacionalidadeParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte1',$_POST['strPaisResideParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte1',$_POST['strNaturalParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte1',$_POST['strCidadeParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte1',$_POST['strLogradouroParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte1',$_POST['strBairroParte1'],$id);

//parte 2

UPDATE_CAMPO_ID('notas_lavratura','setQualidadeParte2',$_POST['setQualidadeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte2',$_POST['strNomeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte2',$_POST['setSexoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte2',$_POST['setTipoDocumento1Parte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte2',$_POST['strOrgaoEmissorParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte2',$_POST['strOrgaoEmissorUFParte2'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strRogoParte2',$_POST['strRogoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte2',$_POST['strMotivoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte2',$_POST['strProcuradorParte2'],$id);

UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte2',$_POST['setTipoDocumento2Parte2'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strRGParte2',$_POST['strRGParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte2',$_POST['strCPFParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte2',$_POST['dataNascimentoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte2',$_POST['strProfissaoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte2',$_POST['strProfissaoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strUFParte2',$_POST['strUFParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte2',$_POST['strNacionalidadeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte2',$_POST['strPaisResideParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte2',$_POST['strNaturalParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte2',$_POST['strCidadeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte2',$_POST['strLogradouroParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte2',$_POST['strUFParte2'],$id);

//parte 3

UPDATE_CAMPO_ID('notas_lavratura','setQualidadeParte3',$_POST['setQualidadeParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte3',$_POST['strNomeParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte3',$_POST['setSexoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte3',$_POST['setTipoDocumento1Parte3'],$id);

UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte3',$_POST['setTipoDocumento2Parte3'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strRGParte3',$_POST['strRGParte3'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte3',$_POST['strOrgaoEmissorParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte3',$_POST['strOrgaoEmissorUFParte3'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strRogoParte3',$_POST['strRogoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte3',$_POST['strMotivoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte3',$_POST['strProcuradorParte3'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strCPFParte3',$_POST['strCPFParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte3',$_POST['dataNascimentoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte3',$_POST['strProfissaoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte3',$_POST['strProfissaoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strUFParte3',$_POST['strUFParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte3',$_POST['strNacionalidadeParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte3',$_POST['strPaisResideParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte3',$_POST['strNaturalParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte3',$_POST['strCidadeParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte3',$_POST['strLogradouroParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte3',$_POST['strUFParte3'],$id);

//fechar parte 3



$QualidadeParte6 = $_POST['setQualidadeParte6'];
$QualidadeParte6 = implode (',', $QualidadeParte6);

$nomeParte6 = $_POST['strNomeParte6'];
$nomeParte6 = implode (',', $nomeParte6);

$setSexoParte6 = $_POST['setSexoParte6'];
$setSexoParte6 = implode (',', $setSexoParte6);

//$setTipoDocumento1Parte6 = $_POST['setTipoDocumento1Parte6'];
//$setTipoDocumento1Parte6 = implode (',', $setTipoDocumento1Parte6);

$strRGParte6 = $_POST['strRGParte6'];
$strRGParte6 = implode (',', $strRGParte6);

//$setTipoDocumento2Parte6 = $_POST['setTipoDocumento2Parte6'];
//$setTipoDocumento2Parte6 = implode (',', $setTipoDocumento2Parte6);

$strCPFParte6 = $_POST['strCPFParte6'];
$strCPFParte6 = implode (',', $strCPFParte6);


$dataNascimentoParte6 = $_POST['dataNascimentoParte6'];
$dataNascimentoParte6 = implode (',', $dataNascimentoParte6);


$strProfissaoParte6 = $_POST['strProfissaoParte6'];
$strProfissaoParte6 = implode (',', $strProfissaoParte6);


$setEstadoCivilParte6 = $_POST['setEstadoCivilParte6'];
$setEstadoCivilParte6 = implode (',', $setEstadoCivilParte6);

$strRogoParte6 = $_POST['strRogoParte6'];
$strRogoParte6 = implode (',', $strRogoParte6);

$strMotivoParte6 = $_POST['strMotivoParte6'];
$strMotivoParte6 = implode (',', $strMotivoParte6);

$strProcuradorParte6 = $_POST['strProcuradorParte6'];
$strProcuradorParte6 = implode (',', $strProcuradorParte6);


$strUFParte6 = $_POST['strUFParte6'];
$strUFParte6 = implode (',', $strUFParte6);


$strNacionalidadeParte6 = $_POST['strNacionalidadeParte6'];
$strNacionalidadeParte6 = implode (',', $strNacionalidadeParte6);


$strPaisResideParte6  = $_POST['strPaisResideParte6'];
$strPaisResideParte6 = implode (',', $strPaisResideParte6);


$strNaturalParte6 = $_POST['strNaturalParte6'];
$strNaturalParte6 = implode (',', $strNaturalParte6);


$strCidadeParte6 = $_POST['strCidadeParte6'];
$strCidadeParte6 = implode (',', $strCidadeParte6);


$strLogradouroParte6 = $_POST['strLogradouroParte6'];
$strLogradouroParte6 = implode (',', $strLogradouroParte6);


$strBairroParte6 = $_POST['strBairroParte6'];
$strBairroParte6 = implode (',', $strBairroParte6);


UPDATE_CAMPO_ID('notas_lavratura','setQualidadeParte6',$QualidadeParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte6',$nomeParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte6',$setSexoParte6,$id);
//UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte6',$setTipoDocumento1Parte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte6',$strRGParte6,$id);
//UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte6',$_POST['setTipoDocumento2Parte6'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte6',$strCPFParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte6',$dataNascimentoParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte6',$strProfissaoParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte6',$setEstadoCivilParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strRogoParte6',$strRogoParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte6',$strMotivoParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte6',$strProcuradorParte6,$id);

UPDATE_CAMPO_ID('notas_lavratura','strUFParte6',$strUFParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte6',$strNacionalidadeParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte6',$strPaisResideParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte6',$strNaturalParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte6',$strCidadeParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte6',$strLogradouroParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte6',$strBairroParte6,$id);
//fechar parte 6

//fechar parte 6, no caso mais partes






//UPDATE_CAMPO_ID('notas_lavratura','strSeloGratuito2',$_POST['strSeloGratuito2'],$id);
//UPDATE_CAMPO_ID('notas_lavratura','strJustificativa2',$_POST['strJustificativa2'],$id);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cesdi.php?conf2=ok&id='.$id);


}


if (isset($_POST['strSelo'])) {
unset($_POST['subimit3']);
/*

UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);
*/

$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cesdi.php?conf3=ok&id='.$id);

}

if (isset($_POST['subimit4'])) {
unset($_POST['subimit4']);

UPDATE_CAMPO_ID('notas_lavratura','setTipoCensec',2,$id);
UPDATE_CAMPO_ID('notas_lavratura','strLivro',$_POST['strLivro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLivroComplemento',$_POST['strLivroComplemento'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFolha',$_POST['strFolha'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFolhaComplemento',$_POST['strFolhaComplemento'],$id);


$livro = $_POST['strLivro'];
$textoLavratura = strip_tags($_POST['strTextoLavraturaCartorio']);

$definidorpag = strlen($textoLavratura);
$definidor = str_word_count($textoLavratura);
//echo'NÚMERO DE CARACTERES: '.$definidorpag.'<hr>';
//echo'NÚMERO DE PALAVRAS: '.$definidor.'<hr>';
$keywords = preg_split("/[\s,]+/", $textoLavratura);
$keywordsNormal = implode(' ',$keywords);
$contkeywords = str_word_count($keywordsNormal);

//echo'NÚMERO DE CARACTERES: '.$contkeywords.'<hr>';

$pagina = $_POST['strFolha'];
$inicial = 0;
$limite = 500;

#variável que vai contar quantos caracteres faltam:
$restante = $definidorpag;
#----------------------------------------------------

for ($i=0; $i <=$limite ; $i++) {
$inicial++;

//echo'<h1>Página '.$pagina.'</h1>';
//echo'<h1>'.$inicial.'-'.$limite.'</h1>';
$li ="";
$valor ="";
#aqui vai pegar um pedaço do texto de 2000 em 2000 caracteres:
for ($li=$inicial; $li < $limite; $li++) {


	$valor .= 	$keywords[$li].' ';

	//	exit;
}
	echo $valor;
//	echo $valor;
//	exit;

//echo $texto.'<hr>';
#dando update nas paginas a cada parte do texto:
$up = $pdo->prepare("UPDATE livro_notas_escritura set Status =  'U', assento = '$valor'  where identifcadorLivro = $livro and PaginaLivro = $pagina");
$up->execute();
$restante -=200000;
$inicial = $limite;
$limite += 500;
$pagina ++;
#se estiverem faltando menos de 2000 caracteres ele recebe o indice do ultimo caractere da string:
if ($restante<200000&&$restante>0) {
	$limite = $contkeywords;
}
#---------------------------------------------------------------------------------------------
#quando não ouver mais texto ele para o laço e para de incrementar as páginas:
if ($contkeywords <= $inicial) {
	break;
}

}

/*
# por caracteres //divisao
for ($i=0; $i <=$definidorpag ; $i++) {
echo'<h1>Página '.$pagina.'</h1>';
echo'<h1>'.$inicial.'-'.$limite.'</h1>';
#aqui vai pegar um pedaço do texto de 2000 em 2000 caracteres:
$texto = substr($textoLavratura, $inicial, strrpos(substr($textoLavratura, $inicial, $limite), ' ')) . '.';
echo $texto.'<hr>';
#dando update nas paginas a cada parte do texto:
$up = $pdo->prepare("UPDATE livro_notas_escritura set Status =  'U', assento = '$texto'  where identifcadorLivro = $livro and PaginaLivro = $pagina");
$up->execute();
$restante -=2000;
$inicial = $limite;
$limite += 2000;
$pagina ++;
#se estiverem faltando menos de 2000 caracteres ele recebe o indice do ultimo caractere da string:
if ($restante<2000&&$restante>0) {
	$limite = $definidorpag;
}
#---------------------------------------------------------------------------------------------
#quando não ouver mais texto ele para o laço e para de incrementar as páginas:
if ($definidorpag <= $inicial) {
	break;
}

}
*/

UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);


#var_dump($_POST);
# redirecionar para impressão!!!

header('location:../notas-lavratura-cep.php?conf4=ok&id='.$id);
$_SESSION['sucesso'] = 'FORMULÁRIO CONCLUIDO (lavratura)';

}

if (isset($_POST['subimit6'])) {
unset($_POST['subimit6']);
UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strTituloMinuta',$_POST['strTituloMinuta'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strAssinaturaLavraturaCartorio',$_POST['strAssinaturaLavraturaCartorio'],$id);

header('location:../notas-lavratura-cep.php?conf4=ok&id='.$id);
$_SESSION['sucesso'] = 'PRÉVIA SALVA, VOCÊ PODE VISUALIZAR AGORA!';

}



 ?>
