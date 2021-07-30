<?php
error_reporting(E_ALL);
ini_set("display_errors", 1);
include('../../../controller/db_functions.php');
session_start();
$pdo = conectar();
ob_start(); //corrigindo o errinho do header

#-------------------------------------------------------------------------------------------------------------------------


if (isset($_POST)) {
unset($_POST['subimit1']);

$selo = $_POST['strSelo'];
$tipoSeloCER = "GER";
$desTipoAtoGER = $_POST['strDescricaoAto'];

$dataAto = $_POST['dataAto'];
$strSelo = $_POST['strSelo'];
$strDescricaoAto = $_POST['strDescricaoAto'];
$strNomeParte1 = $_POST['strNomeParte1'];
$strCPFParte1= $_POST['strCPFParte1'];
$setTipoDocumento2Parte1 = $_POST['setTipoDocumento2Parte1'];
$strNaturezaTitulo = $_POST['strNaturezaTitulo'];
$strQualidadeLancamento= $_POST['strQualidadeLancamento'];
$strAnotacoes= $_POST['strAnotacoes'];

$pesquisa_livro = $pdo->prepare("SELECT * FROM livro_tdpj_pj_protocolo where status = 'L' limit 1");
$pesquisa_livro->execute();
$linhas_livro = $pesquisa_livro->fetch(PDO::FETCH_ASSOC);
$livro = $linhas_livro['identifcadorLivro'];
if (isset($linhas_livro['LivroInicial'])) {
	$termo = $linhas_livro['LivroInicial']; #Numero de Ordem
}else {
	$termo = 0;
}

$pesquisa_num_ordem = $pdo->prepare("SELECT strFolha,strFolhaFinal,strFolhaComplemento,selecionarLivro,Ordem, COUNT(Ordem) AS Quantidade FROM `tdpj_pj_registro_protocolo` where strSelo is not null and strSelo != '' ORDER BY `tdpj_pj_registro_protocolo`.`Ordem`");
$pesquisa_num_ordem->execute();
$contadorOrdem = $pesquisa_num_ordem->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ordem_ato'] = $contadorOrdem['Quantidade'];
$numOrdem = $_SESSION['numero_ordem_ato']+$termo;

$pesquisa_num_ato = $pdo->prepare("SELECT strFolha,strFolhaFinal,strFolhaComplemento,selecionarLivro,numAto, COUNT(numAto) AS Quantidade FROM `tdpj_pj_registro_protocolo` where strSelo is not null and strSelo != ''  ORDER BY `tdpj_pj_registro_protocolo`.`numAto`");
$pesquisa_num_ato->execute();
$contadorAto = $pesquisa_num_ato->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ato'] = $contadorAto['Quantidade'];
$numAto = $_SESSION['numero_ato']+$termo;


$registro_rotocolo = $pdo->prepare("INSERT INTO `tdpj_pj_registro_protocolo` (`dataAto`,`strLivro`,`Ordem`,`numAto`,`strSelo`,`strDescricaoAto`,`strNomeParte1`,`strCPFParte1`,`setTipoDocumento2Parte1`,`strNaturezaTitulo`,`strQualidadeLancamento`,`strAnotacoes`) VALUES ('$dataAto','$livro','$numOrdem','$numAto','$strSelo','$strDescricaoAto','$strNomeParte1','$strCPFParte1','$setTipoDocumento2Parte1','$strNaturezaTitulo','$strQualidadeLancamento','$strAnotacoes');");

if ($registro_rotocolo->execute()) {

}else{
	$linhas = 'Erro!!!';
	echo $linhas;
	$_SESSION['erro'] = $registro_rotocolo->errorInfo();
	return false;
	break;
}

#parte de auditoria:
$funcionario = $_SESSION['nome'];
$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','PROTOCOLO - PJ','1','1','$selo',CURRENT_TIMESTAMP,'GER','$desTipoAtoGER','0','0','$id','0','0',NULL)");
$insert_auditoria->execute();


$busca_procolo = $pdo->prepare("SELECT * FROM `tdpj_pj_registro_protocolo` ORDER BY ID DESC LIMIT 1");
$busca_procolo->execute();
$linhas_protocolo = $busca_procolo->fetch(PDO::FETCH_ASSOC);
$id_protocolo = $linhas_protocolo['ID'];
$registro_pj = $pdo->prepare("INSERT INTO `tdpj_pj_registro` (`possuiProtocolo`,`Ordem`,`numAto`,`decValorInfoImovel`) VALUES ('0','','','');");
$registro_pj->execute();
$busca_registro_pj = $pdo->prepare("SELECT * FROM `tdpj_pj_registro` ORDER BY ID DESC LIMIT 1");
$busca_registro_pj->execute();
$linhas_busca_pj = $busca_registro_pj->fetch(PDO::FETCH_ASSOC);
$id = $linhas_busca_pj['ID'];

UPDATE_CAMPO_ID('tdpj_pj_registro_protocolo','IDregistro',$id,$id_protocolo);


UPDATE_CAMPO_ID('tdpj_pj_registro','strNumProtocolo',$numOrdem,$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strNaturezaTitulo',$_POST['strQualidadeLancamento'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strQualidadeLancamento',$_POST['strQualidadeLancamento'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strNomeParte1',strtoupper($_POST['strNomeParte1']),$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','setSexoParte1',strtoupper($_POST['setSexoParte1']),$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','setTipoDocumento1Parte1',$_POST['setTipoDocumento1Parte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strRGParte1',$_POST['strRGParte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strOrgaoEmissorParte1',$_POST['strOrgaoEmissorParte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strOrgaoEmissorUFParte1',$_POST['strOrgaoEmissorUFParte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','setTipoDocumento2Parte1',$_POST['setTipoDocumento2Parte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strCPFParte1',$_POST['strCPFParte1'],$id);
$dataNascimentoParte1 = $_POST['dataNascimentoParte1'];
$dataNascimentoParte1= date('Y/m/d', strtotime($dataNascimentoParte1));
UPDATE_CAMPO_ID('tdpj_pj_registro','dataNascimentoParte1',$dataNascimentoParte1,$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strProfissaoParte1',$_POST['strProfissaoParte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','setEstadoCivilParte1',$_POST['setEstadoCivilParte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strRogoParte1',strtoupper($_POST['strRogoParte1']),$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strMotivoParte1',strtoupper($_POST['strMotivoParte1']),$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strRepresentanteParte1',strtoupper($_POST['strRepresentanteParte1']),$id);

UPDATE_CAMPO_ID('tdpj_pj_registro','strProcuradorParte1',strtoupper($_POST['strProcuradorParte1']),$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strProcuradorLivroParte1',$_POST['strProcuradorLivroParte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strProcuradorFolhaParte1',$_POST['strProcuradorFolhaParte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strProcuradorOrdemParte1',$_POST['strProcuradorOrdemParte1'],$id);

$strProcuradorDataParte1 = $_POST['strProcuradorDataParte1'];
$strProcuradorDataParte1= date('Y/m/d', strtotime($strProcuradorDataParte1));
UPDATE_CAMPO_ID('tdpj_pj_registro','strProcuradorDataParte1',$strProcuradorDataParte1,$id);

UPDATE_CAMPO_ID('tdpj_pj_registro','strProcuradorCartorioParte1',strtoupper($_POST['strProcuradorCartorioParte1']),$id);

UPDATE_CAMPO_ID('tdpj_pj_registro','strUFParte1',$_POST['strUFParte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strNacionalidadeParte1',$_POST['strNacionalidadeParte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strPaisResideParte1',$_POST['strPaisResideParte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strNaturalParte1',$_POST['strNaturalParte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strCidadeParte1',$_POST['strCidadeParte1'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strLogradouroParte1',strtoupper($_POST['strLogradouroParte1']),$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strBairroParte1',strtoupper($_POST['strBairroParte1']),$id);



$_SESSION['sucesso'] = 'SUCESSO';
header('location:../imprimir/impressao-pj-protocolo.php?id='.$id_protocolo);


}
 ?>
