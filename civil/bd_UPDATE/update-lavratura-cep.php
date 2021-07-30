<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];
$pdo = conectar();
ob_start(); //corrigindo o errinho do header

#-------------------------------------------------------------------------------------------------------------------------



if (empty($_POST['setSeloGratuito'])) {
	$_POST['setSeloGratuito'] = 'N';
	$_POST['strJustificativa'] = '';
}


if (isset($_POST['subimit1'])) {
unset($_POST['subimit1']);

if ($_POST['strSeloG']!='') {
$selo = $_POST['strSeloG'];
$tipoSelo = "GRA";
}
else{
$selo = $_POST['strSelo'];
$tipoSelo = "GER";
}

$desTipoAto = $_POST['strDescricaoAto'];

$busca_selo = $pdo->prepare("select * from selo_fisico_uso where selo = '$selo'");
$busca_selo->execute();

if ($busca_selo->rowCount() == 0) {
	$_SESSION['erro'] = 'Selo não encontrado';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	break;
}

$linha = $busca_selo->fetch(PDO::FETCH_ASSOC);
if ($linha['status'] == 'U' && $linha['tipo'] == 'GER' || $linha['status'] == 'U' && $linha['tipo'] == 'GRA' ) {
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


	#parte de auditoria:
	$funcionario = $_SESSION['nome'];
	$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','ESCRITURA','1','1','$selo',CURRENT_TIMESTAMP,'$tipoSelo','$desTipoAto')");
	$insert_auditoria->execute();

}


#ocupando a página do livro:


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



$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cep.php?conf1=ok&id='.$id);

}





if (empty($_POST['checkboxPossuiFilhos'])) {
	$_POST['checkboxPossuiFilhos'] = '0';

}



if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);

#numero de ordem e do ato:

#Quando for cep:
$pesquisa_num_ordem = $pdo->prepare("SELECT * FROM notas_lavratura where setTipodeAtoCep =". $_POST['setTipodeAtoCep']);
$pesquisa_num_ordem->execute();
$_SESSION['numero_ordem_ato'] = $pesquisa_num_ordem->rowCount() + 1;
UPDATE_CAMPO_ID('notas_lavratura','Ordem',$_SESSION['numero_ordem_ato'],$id);
UPDATE_CAMPO_ID('notas_lavratura','numAto',$_SESSION['numero_ordem_ato'],$id);

#Quando for cesdi:
$pesquisa_num_ordem = $pdo->prepare("SELECT * FROM notas_lavratura where setTipodeAtoCesdi =". $_POST['setTipodeAtoCep']);
$pesquisa_num_ordem->execute();
$_SESSION['numero_ordem_ato'] = $pesquisa_num_ordem->rowCount() + 1;
UPDATE_CAMPO_ID('notas_lavratura','Ordem',$_SESSION['numero_ordem_ato'],$id);
UPDATE_CAMPO_ID('notas_lavratura','numAto',$_SESSION['numero_ordem_ato'],$id);

var_dump($_POST);
exit();


UPDATE_CAMPO_ID('notas_lavratura','setTipodeAtoCep',$_POST['setTipodeAtoCep'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setNaturezaEscritura',$_POST['setNaturezaEscritura'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setNaturezaLitigio',$_POST['setNaturezaLitigio'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strAcordo',$_POST['strAcordo'],$id);

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
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte1',$_POST['setTipoDocumento2Parte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte1',$_POST['strCPFParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte1',$_POST['dataNascimentoParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte1',$_POST['strProfissaoParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte1',$_POST['setEstadoCivilParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strUFParte1',$_POST['strUFParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte1',$_POST['strNacionalidadeParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte1',$_POST['strPaisResideParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte1',$_POST['strNaturalParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte1',$_POST['strCidadeParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte1',$_POST['strLogradouroParte1'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte1',$_POST['strBairroParte1'],$id);

//parte 2


UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte2',$_POST['setQualidadeCepParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte2',$_POST['strNomeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte2',$_POST['setSexoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte2',$_POST['setTipoDocumento1Parte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte2',$_POST['strRGParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte2',$_POST['setTipoDocumento2Parte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte2',$_POST['strCPFParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte2',$_POST['dataNascimentoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte2',$_POST['strProfissaoParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte2',$_POST['setEstadoCivilParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strUFParte2',$_POST['strUFParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte2',$_POST['strNacionalidadeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte2',$_POST['strPaisResideParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte2',$_POST['strNaturalParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte2',$_POST['strCidadeParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte2',$_POST['strLogradouroParte2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte2',$_POST['strBairroParte2'],$id);

//parte 3


UPDATE_CAMPO_ID('notas_lavratura','setQualidadeCepParte3',$_POST['setQualidadeCepParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNomeParte3',$_POST['strNomeParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setSexoParte3',$_POST['setSexoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento1Parte3',$_POST['setTipoDocumento1Parte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strRGParte3',$_POST['strRGParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte3',$_POST['setTipoDocumento2Parte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte3',$_POST['strCPFParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte3',$_POST['dataNascimentoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte3',$_POST['strProfissaoParte3'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte3',$_POST['setEstadoCivilParte3'],$id);
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
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte4',$_POST['setTipoDocumento2Parte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte4',$_POST['strCPFParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte4',$_POST['dataNascimentoParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte4',$_POST['strProfissaoParte4'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte4',$_POST['setEstadoCivilParte4'],$id);
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
UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte5',$_POST['setTipoDocumento2Parte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte5',$_POST['strCPFParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte5',$_POST['dataNascimentoParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte5',$_POST['strProfissaoParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte5',$_POST['setEstadoCivilParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strUFParte5',$_POST['strUFParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNacionalidadeParte5',$_POST['strNacionalidadeParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPaisResideParte5',$_POST['strPaisResideParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strNaturalParte5',$_POST['strNaturalParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCidadeParte5',$_POST['strCidadeParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLogradouroParte5',$_POST['strLogradouroParte5'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strBairroParte5',$_POST['strBairroParte5'],$id);
//fechar parte 5

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
//UPDATE_CAMPO_ID('notas_lavratura','setTipoDocumento2Parte6',$_POST['setTipoDocumento2Parte6'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strCPFParte6',$strCPFParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','dataNascimentoParte6',$dataNascimentoParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','strProfissaoParte6',$strProfissaoParte6,$id);
UPDATE_CAMPO_ID('notas_lavratura','setEstadoCivilParte6',$setEstadoCivilParte6,$id);
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
header('location:../notas-lavratura-cep.php?conf4=ok&id='.$id);


}


if (isset($_POST['strSelo'])) {
unset($_POST['subimit3']);

/*
UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);
*/
$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura-cep.php?conf4=ok&id='.$id);

}


if (isset($_POST['subimit4'])) {
unset($_POST['subimit4']);

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
header('location:../notas-lavratura-cep.php?conf4=ok&id='.$id);
$_SESSION['sucesso'] = 'PRÉVIA SALVA, VOCÊ PODE VISUALIZAR AGORA!';

}

 ?>
