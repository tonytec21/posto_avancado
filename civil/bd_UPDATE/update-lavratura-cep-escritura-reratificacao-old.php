<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];
$pdo = conectar();
ob_start(); //corrigindo o errinho do header

#-------------------------------------------------------------------------------------------------------------------------



//if (empty($_POST['setSeloGratuito'])) {
//	$_POST['setSeloGratuito'] = 'N';
//	$_POST['strJustificativa'] = '';
//}


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

UPDATE_CAMPO_ID('notas_lavratura','dataAto',$_POST['dataAto'],$id);

//UPDATE_CAMPO_ID('notas_lavratura','setSeloDiferido',$_POST['setSeloDiferido'],$id);
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

/*
UPDATE_CAMPO_ID('notas_lavratura','strLivroNotas',$_POST['strLivroNotas'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strMinuta',$_POST['strMinuta'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataAto',$_POST['dataAto'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataProtocolo',$_POST['dataProtocolo'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNumProtocolo',$_POST['strNumProtocolo'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strMatricula',$_POST['strMatricula'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorEconomico',$_POST['decValorEconomico'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorAvaliacao',$_POST['decValorAvaliacao'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorFiscal',$_POST['decValorFiscal'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setSeloGratuito',$_POST['setSeloGratuito'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strJustificativa',$_POST['strJustificativa'],$id);
*/
UPDATE_CAMPO_ID('notas_lavratura','strAnotacoes',$_POST['strAnotacoes'],$id);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cep-escritura-reratificacao.php?conf1=ok&id='.$id);

}





if (empty($_POST['checkboxPossuiFilhos'])) {
	$_POST['checkboxPossuiFilhos'] = '0';

}



if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);


UPDATE_CAMPO_ID('notas_lavratura','setTipodeAtoCep',1,$id);
UPDATE_CAMPO_ID('notas_lavratura','setNaturezaEscritura',$_POST['setNaturezaEscritura'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setNaturezaLitigio',$_POST['setNaturezaLitigio'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strAcordo',$_POST['strAcordo'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strInfoAdicionais',$_POST['strInfoAdicionais'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strEspolio',$_POST['strEspolio'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRetificacao',$_POST['strRetificacao'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strAtoDesconhecido',$_POST['strAtoDesconhecido'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLivroOutro',$_POST['strLivroOutro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLivroComplementoOutro',$_POST['strLivroComplementoOutro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFolhaOutro',$_POST['strFolhaOutro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFolhaComplementoOutro',$_POST['strFolhaComplementoOutro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strEstadoOutro',$_POST['strEstadoOutro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeOutro',$_POST['strCidadeOutro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeCartorioOutro',$_POST['strNomeCartorioOutro'],$id);

UPDATE_CAMPO_ID('notas_lavratura','dataCasamento',$_POST['dataCasamento'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setRegimeBens',$_POST['setRegimeBens'],$id);
UPDATE_CAMPO_ID('notas_lavratura','checkboxPossuiFilhos',$_POST['checkboxPossuiFilhos'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFilhosMaiores',$_POST['strFilhosMaiores'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFilhosMenores',$_POST['strFilhosMenores'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setResponsavelFilhos',$_POST['setResponsavelFilhos'],$id);
UPDATE_CAMPO_ID('notas_lavratura','qtdFilhosMaiores',$_POST['qtdFilhosMaiores'],$id);
UPDATE_CAMPO_ID('notas_lavratura','qtdFilhosMenores',$_POST['qtdFilhosMenores'],$id);



UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte1',$_POST['setQualidadeCepParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte1',$_POST['strNomeParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte1',$_POST['setSexoParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte1',$_POST['setTipoDocumentoParte1'],$id);
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
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte1',(int)$_POST['strCidadeParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte1',$_POST['strLogradouroParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte1',$_POST['strBairroParte1'],$id);

//parte 2


UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte2',$_POST['setQualidadeCepParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte2',$_POST['strNomeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte2',$_POST['setSexoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte2',$_POST['setTipoDocumento1Parte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte2',$_POST['strRGParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte2',$_POST['strOrgaoEmissorParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte2',$_POST['strOrgaoEmissorUFParte2'],$id);

UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte2',$_POST['setTipoDocumento2Parte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte2',$_POST['strCPFParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte2',$_POST['dataNascimentoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte2',$_POST['strProfissaoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte2',$_POST['setEstadoCivilParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRogoParte2',$_POST['strRogoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte2',$_POST['strMotivoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte2',$_POST['strProcuradorParte2'],$id);


UPDATE_CAMPO_ID('notas_lavratura','strUFParte2',$_POST['strUFParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte2',$_POST['strNacionalidadeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte2',$_POST['strPaisResideParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte2',$_POST['strNaturalParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte2',(int)$_POST['strCidadeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte2',$_POST['strLogradouroParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte2',$_POST['strBairroParte2'],$id);

//parte 3


UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte3',$_POST['setQualidadeCepParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte3',$_POST['strNomeParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte3',$_POST['setSexoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte3',$_POST['setTipoDocumento1Parte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte3',$_POST['strRGParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte3',$_POST['strOrgaoEmissorParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte3',$_POST['strOrgaoEmissorUFParte3'],$id);

UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte3',$_POST['setTipoDocumento2Parte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte3',$_POST['strCPFParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte3',$_POST['dataNascimentoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte3',$_POST['strProfissaoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte3',$_POST['setEstadoCivilParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRogoParte3',$_POST['strRogoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte3',$_POST['strMotivoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte3',$_POST['strProcuradorParte3'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strUFParte3',$_POST['strUFParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte3',$_POST['strNacionalidadeParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte3',$_POST['strPaisResideParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte3',$_POST['strNaturalParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte3',$_POST['strCidadeParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte3',$_POST['strLogradouroParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte3',$_POST['strBairroParte3'],$id);

//fechar parte 3
//parte 4

UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte4',$_POST['setQualidadeCepParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte4',$_POST['strNomeParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte4',$_POST['setSexoParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte4',$_POST['setTipoDocumento1Parte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte4',$_POST['strRGParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte4',$_POST['strOrgaoEmissorParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte4',$_POST['strOrgaoEmissorUFParte4'],$id);


UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte4',$_POST['setTipoDocumento2Parte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte4',$_POST['strCPFParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte4',$_POST['dataNascimentoParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte4',$_POST['strProfissaoParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte4',$_POST['setEstadoCivilParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRogoParte4',$_POST['strRogoParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte4',$_POST['strMotivoParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte4',$_POST['strProcuradorParte4'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strUFParte4',$_POST['strUFParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte4',$_POST['strNacionalidadeParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte4',$_POST['strPaisResideParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte4',$_POST['strNaturalParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte4',$_POST['strCidadeParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte4',$_POST['strLogradouroParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte4',$_POST['strBairroParte4'],$id);
//fechar parte 4


//parte 5

UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte5',$_POST['setQualidadeCepParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte5',$_POST['strNomeParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte5',$_POST['setSexoParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte5',$_POST['setTipoDocumento1Parte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte5',$_POST['strRGParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte5',$_POST['strOrgaoEmissorParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte5',$_POST['strOrgaoEmissorUFParte5'],$id);

UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte5',$_POST['setTipoDocumento2Parte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte5',$_POST['strCPFParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte5',$_POST['dataNascimentoParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte5',$_POST['strProfissaoParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte5',$_POST['setEstadoCivilParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRogoParte5',$_POST['strRogoParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strMotivoParte5',$_POST['strMotivoParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProcuradorParte5',$_POST['strProcuradorParte5'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strUFParte5',$_POST['strUFParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte5',$_POST['strNacionalidadeParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte5',$_POST['strPaisResideParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte5',$_POST['strNaturalParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte5',$_POST['strCidadeParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte5',$_POST['strLogradouroParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte5',$_POST['strBairroParte5'],$id);
//fechar parte 5
//imoveis
UPDATE_CAMPO_ID('notas_lavratura','strInfoImovel',$_POST['strInfoImovel'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataInfoImovel',$_POST['dataInfoImovel'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeInfoImovel',$_POST['strCidadeInfoImovel'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorAnteriorImovel',$_POST['decValorAnteriorImovel'],$id);
UPDATE_CAMPO_ID('notas_lavratura','doacaoInfoImovel',$_POST['doacaoInfoImovel'],$id);
UPDATE_CAMPO_ID('notas_lavratura','guiaItcmdImovel',$_POST['guiaItcmdImovel'],$id);

//fechar imoveis
//parte 6

//$pdo=conectar();
//$user = array();
//foreach($_POST as $dado => $value) {
   //$valores = explode('-', $value);
   //$binds = str_repeat('?,', 19) .'?';
	// /$user[$dado] = $list[0];
//	 $cadastro = $pdo->prepare("UPDATE INTO notas_lavratura(setQualidadeCepParte6, setQualidadeParte6, setConjugueParte6, strNomeParte6, setSexoParte6, setTipoDocumento1Parte6, strRGParte6, setTipoDocumento2Parte6, strCPFParte6, dataNascimentoParte6, strProfissaoParte6, setEstadoCivilParte6, strUFParte6, strNacionalidadeParte6, strPaisResideParte6, strNaturalParte6, strCidadeParte6, strLogradouroParte6, strBairroParte6) VALUES ('. $binds .')");
//   $cadastro->execute();
//}
//listando os campos,
/*
$listar = ["setQualidadeCepParte6","strNomeParte6"];
// inicializando a array:
$parametro=[];
// inicializo os nomes dos campos = :campo
$campo = "";
$pdo=conectar();
foreach ($listar as $key)
{
    if (isset($_POST[$key]) && $key != "ID")
    {
        $campo .= "$key = :$key,";

				$campoKey = $key;
    //    $parametro[$key] = $_POST[$key];
				  $parametro2[$key] = implode(',',$_POST[$key]);
					$key = implode(',',$_POST[$key]);
			//		print_r ($campoKey);
    }

}

$campo = rtrim($campo, ",");

$QualidadeCepParte6 = $_POST['setQualidadeCepParte6'];
$QualidadeCepParte6 = implode (',', $QualidadeCepParte6);

$nomeParte6 = $_POST['strNomeParte6'];
$nomeParte6 = implode (',', $nomeParte6);




$pdo->prepare("UPDATE notas_lavratura SET $campo WHERE ID = '$id'")
->execute(array('setQualidadeCepParte6'=> $QualidadeCepParte6,'strNomeParte6'=> $nomeParte6));

exit;


//$params =  json_encode($params);

/*/

$QualidadeCepParte6 = $_POST['setQualidadeCepParte6'];
$QualidadeCepParte6 = implode (',', $QualidadeCepParte6);

$nomeParte6 = $_POST['strNomeParte6'];
$nomeParte6 = implode (',', $nomeParte6);

$setSexoParte6 = $_POST['setSexoParte6'];
$setSexoParte6 = implode (',', $setSexoParte6);

//$setTipoDocumento1Parte6 = $_POST['setTipoDocumento1Parte6'];
//$setTipoDocumento1Parte6 = implode (',', $setTipoDocumento1Parte6);

$strRGParte6 = $_POST['strRGParte6'];
$strRGParte6 = implode (',', $strRGParte6);

$strOrgaoEmissorParte6 = $_POST['strOrgaoEmissorParte6'];
$strOrgaoEmissorParte6 = implode (',', $strOrgaoEmissorParte6);

$strOrgaoEmissorUFParte6 = $_POST['strOrgaoEmissorUFParte6'];
$strOrgaoEmissorUFParte6 = implode (',', $strOrgaoEmissorUFParte6);
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



UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte6',$QualidadeCepParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte6',$nomeParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte6',$setSexoParte6,$id);
//UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte6',$setTipoDocumento1Parte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte6',$strRGParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorParte6',$strOrgaoEmissorParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strOrgaoEmissorUFParte6',$strOrgaoEmissorUFParte6,$id);

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
//exit;
//UPDATE_CAMPO_ID('notas_lavratura','strSeloGratuito2',$_POST['strSeloGratuito2'],$id);
//UPDATE_CAMPO_ID('notas_lavratura','strJustificativa2',$_POST['strJustificativa2'],$id);

$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cep-escritura-reratificacao.php?conf4=ok&id='.$id);


}


if (isset($_POST['subimit3'])) {
unset($_POST['subimit3']);

/*
UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);
*/
$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cep-escritura-reratificacao.php?conf4=ok&id='.$id);

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

$pesquisa_livro = $pdo->prepare("SELECT * FROM livro_notas_escritura where status = 'L' limit 1");
$pesquisa_livro->execute();
$linhas_livro = $pesquisa_livro->fetch(PDO::FETCH_ASSOC);
$livro = $linhas_livro['identifcadorLivro'];
if (isset($linhas_livro['LivroInicial'])) {
	$termo = $linhas_livro['LivroInicial']; #Numero de Ordem
}else {
	$termo = 0;
}



$pesquisa_livro_notas = $pdo->prepare("SELECT strLivro,strFolha,strFolhaFinal,strFolhaComplemento,setTipodeAtoCep,strSelo,quantidadeFolhas FROM `notas_lavratura` WHERE strFolha > 0 and setTipodeAtoCep = '1' and strLivro = '$livro'  and (strSelo IS NOT NULL || strSelo != '')  ORDER BY `notas_lavratura`.`strFolha` DESC LIMIT 1 ");
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
$pesquisa_num_ordem = $pdo->prepare("SELECT strSelo,strFolha,strFolhaFinal,strFolhaComplemento,setTipodeAtoCep,Ordem, COUNT(Ordem) AS Quantidade FROM `notas_lavratura` WHERE strFolha > 0 and setTipodeAtoCep = '1' and (strSelo IS NOT NULL || strSelo != '') ORDER BY `notas_lavratura`.`strFolha`");
$pesquisa_num_ordem->execute();
$linhaOrdem = $pesquisa_num_ordem->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ordem_ato'] = $linhaOrdem['Quantidade'];
$numOrdem = $_SESSION['numero_ordem_ato']+$termo;

UPDATE_CAMPO_ID('notas_lavratura','Ordem',$numOrdem,$id);


$pesquisa_num_ato = $pdo->prepare("SELECT strSelo,strFolha,strFolhaFinal,strFolhaComplemento,setTipodeAtoCep,numAto, COUNT(numAto) AS Quantidade FROM `notas_lavratura` WHERE strFolha > 0 and setTipodeAtoCep = '1' and (strSelo IS NOT NULL || strSelo != '') ORDER BY `notas_lavratura`.`strFolha`");
$pesquisa_num_ato->execute();
$linhaAto = $pesquisa_num_ato->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ato'] = $linhaAto['Quantidade'];
$numAto = $_SESSION['numero_ato']+$termo;

UPDATE_CAMPO_ID('notas_lavratura','numAto',$numAto,$id);


UPDATE_CAMPO_ID('notas_lavratura','strLivro',$livro,$id);

UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);


#var_dump($_POST);
# redirecionar para impressão!!!
header('location:../notas-lavratura-cep-escritura-reratificacao.php?conf3=ok&id='.$id);
$_SESSION['sucesso'] = 'FORMULÁRIO SALVO (ADICIONE O SELO PARA CONCLUIR)';
}

if (isset($_POST['subimit6'])) {
unset($_POST['subimit6']);
UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);

UPDATE_CAMPO_ID('notas_lavratura','strTituloMinuta',$_POST['strTituloMinuta'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strAssinaturaLavraturaCartorio',$_POST['strAssinaturaLavraturaCartorio'],$id);

header('location:../notas-lavratura-cep-escritura-reratificacao.php?conf4=ok&id='.$id);
$_SESSION['sucesso'] = 'PRÉVIA SALVA, VOCÊ PODE VISUALIZAR AGORA!';

}

 ?>
