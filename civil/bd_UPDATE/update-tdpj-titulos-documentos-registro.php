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

$qntOutorgado = $_POST['quantidadeOutorgado'];
$qntSelo = $_POST['quantidadeSelo'];

$somaPartes = $qntOutorgado + $qntOutorgante - 1;
if ($somaPartes > $qntSelo) {
	$_SESSION['erro'] = 'A quantidade de selo não corresponde, a quantidade de outorgantes ou outorgados selecionada, por favor verifique.';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	return false;
}

UPDATE_CAMPO_ID('tdpj_td_registro','dataAto',$_POST['dataAto'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','quantidadeOutorgado',$_POST['quantidadeOutorgado'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','quantidadeSelo',$_POST['quantidadeSelo'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','possuiDOI',$_POST['possuiDOI'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strAnotacoes',$_POST['strAnotacoes'],$id);


if (isset($_POST['quantidadeImagens'])) {
$qntIMG = $_POST['quantidadeImagens'];
}else {
	$qntIMG = NULL;
}
$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../tdpj-titulos-documentos-registro.php?conf4=ok&id='.$id.'&fm='.$qntIMG);

}



if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);


UPDATE_CAMPO_ID('tdpj_td_registro','strNomeParte1',strtoupper($_POST['strNomeParte1']),$id);
UPDATE_CAMPO_ID('tdpj_td_registro','setSexoParte1',strtoupper($_POST['setSexoParte1']),$id);
UPDATE_CAMPO_ID('tdpj_td_registro','setTipoDocumento1Parte1',$_POST['setTipoDocumento1Parte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strRGParte1',$_POST['strRGParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strOrgaoEmissorParte1',$_POST['strOrgaoEmissorParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strOrgaoEmissorUFParte1',$_POST['strOrgaoEmissorUFParte1'],$id);

UPDATE_CAMPO_ID('tdpj_td_registro','setTipoDocumento2Parte1',$_POST['setTipoDocumento2Parte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strCPFParte1',$_POST['strCPFParte1'],$id);
$dataNascimentoParte1 = $_POST['dataNascimentoParte1'];
$dataNascimentoParte1= date('Y/m/d', strtotime($dataNascimentoParte1));
UPDATE_CAMPO_ID('tdpj_td_registro','dataNascimentoParte1',$dataNascimentoParte1,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strProfissaoParte1',$_POST['strProfissaoParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','setEstadoCivilParte1',$_POST['setEstadoCivilParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strRogoParte1',strtoupper($_POST['strRogoParte1']),$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strMotivoParte1',strtoupper($_POST['strMotivoParte1']),$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strRepresentanteParte1',strtoupper($_POST['strRepresentanteParte1']),$id);

UPDATE_CAMPO_ID('tdpj_td_registro','strProcuradorParte1',strtoupper($_POST['strProcuradorParte1']),$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strProcuradorLivroParte1',$_POST['strProcuradorLivroParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strProcuradorFolhaParte1',$_POST['strProcuradorFolhaParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strProcuradorOrdemParte1',$_POST['strProcuradorOrdemParte1'],$id);

$strProcuradorDataParte1 = $_POST['strProcuradorDataParte1'];
$strProcuradorDataParte1= date('Y/m/d', strtotime($strProcuradorDataParte1));
UPDATE_CAMPO_ID('tdpj_td_registro','strProcuradorDataParte1',$strProcuradorDataParte1,$id);

UPDATE_CAMPO_ID('tdpj_td_registro','strProcuradorCartorioParte1',strtoupper($_POST['strProcuradorCartorioParte1']),$id);



UPDATE_CAMPO_ID('tdpj_td_registro','strUFParte1',$_POST['strUFParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strNacionalidadeParte1',$_POST['strNacionalidadeParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strPaisResideParte1',$_POST['strPaisResideParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strNaturalParte1',$_POST['strNaturalParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strCidadeParte1',$_POST['strCidadeParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strLogradouroParte1',strtoupper($_POST['strLogradouroParte1']),$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strBairroParte1',strtoupper($_POST['strBairroParte1']),$id);

//parte 2


//imoveis
if (isset($_POST['strInfoImovel'])) {

	$strInfoImovel = $_POST['strInfoImovel'];

}else {
$strInfoImovel = NULL;
}
if (isset($_POST['dataInfoImovel'])) {
	$dataInfoImovel = $_POST['dataInfoImovel'];
	$dataInfoImovel= date('Y/m/d', strtotime($dataInfoImovel));
}else {
	$dataInfoImovel = '1111-11-11';
}
if (isset($_POST['strInfoImovelCertidao  '])) {

	$strInfoImovelCertidao   = $_POST['strInfoImovelCertidao'];

}else {
	$strInfoImovelCertidao = NULL;
}

if (isset($_POST['decValorInfoImovel'])) {

	$decValorInfoImovel = $_POST['decValorInfoImovel'];

}else {
	$decValorInfoImovel = NULL;
}
if (isset($_POST['intImovelSituacao'])) {

	$intImovelSituacao = $_POST['intImovelSituacao'];

}else {
	$intImovelSituacao = NULL;
}
if (isset($_POST['strImovelDescTransacao'])) {

	$strImovelDescTransacao = $_POST['strImovelDescTransacao'];

}else {
	$strImovelDescTransacao = NULL;
}

if (isset($_POST['intImovelRetificacao'])) {

	$intImovelRetificacao = $_POST['intImovelRetificacao'];

}else {
	$intImovelRetificacao = NULL;
}

if (isset($_POST['intImovelformaAlienacao'])) {

	$intImovelformaAlienacao = $_POST['intImovelformaAlienacao'];

}else {
	$intImovelformaAlienacao = NULL;
}

if (isset($_POST['intValorNaoConsta'])) {

	$intValorNaoConsta = $_POST['intValorNaoConsta'];

}else {
	$intValorNaoConsta = NULL;
}
if (isset($_POST['decImovelcalcITBI'])) {

	$decImovelcalcITBI = $_POST['decImovelcalcITBI'];

}else {
	$decImovelcalcITBI = NULL;
}
if (isset($_POST['intImovelTipo'])) {

	$intImovelTipo = $_POST['intImovelTipo'];

}else {
	$intImovelTipo = NULL;
}

if (isset($_POST['strImovelDesc'])) {

	$strImovelDesc = $_POST['strImovelDesc'];

}else {
	$strImovelDesc = NULL;
}

if (isset($_POST['intImovelConstrucao'])) {

	$intImovelConstrucao = $_POST['intImovelConstrucao'];

}else {
	$intImovelConstrucao = NULL;
}
if (isset($_POST['intImovelLocalidade'])) {

	$intImovelLocalidade = $_POST['intImovelLocalidade'];

}else {
	$intImovelLocalidade =NULL;
}

if (isset($_POST['intImovelindicadorArea']) &&$_POST['intImovelindicadorArea'] != '? undefined:undefined ?')  {

	$intImovelindicadorArea = $_POST['intImovelindicadorArea'];

}else {
	$intImovelindicadorArea = NULL;
}
if (isset($_POST['decImovelArea']) || $_POST['decImovelArea'] != '? undefined:undefined ?') {

	$decImovelArea = $_POST['decImovelArea'];

}else {
	$decImovelArea = NULL;
}

if (isset($_POST['strImovelEndereco'])) {

	$strImovelEndereco = $_POST['strImovelEndereco'];

}else {
	$strImovelEndereco = NULL;
}

if (isset($_POST['strImovelComplemento'])) {

	$strImovelComplemento = $_POST['strImovelComplemento'];

}else {
	$strImovelComplemento = NULL;
}

if (isset($_POST['strImovelBairro'])) {

	$strImovelBairro = $_POST['strImovelBairro'];

}else {
	$strImovelBairro = NULL;
}

if (isset($_POST['strImovelUF'])) {

	$strImovelUF = $_POST['strImovelUF'];

}else {
	$strImovelUF = NULL;
}

if (isset($_POST['intImovelCep'])) {

	$intImovelCep = $_POST['intImovelCep'];

}else {
	$intImovelCep = NULL;
}

if (isset($_POST['strImovelMatricula'])) {

	$strImovelMatricula = $_POST['strImovelMatricula'];

}else {
	$strImovelMatricula = NULL;
}


if (isset($_POST['intImovelTipoTransacao'])) {

	$intImovelTipoTransacao = $_POST['intImovelTipoTransacao'];

}else {
	$intImovelTipoTransacao = NULL;
}

if (isset($_POST['strImovelNumero'])) {

	$strImovelNumero = $_POST['strImovelNumero'];

}else {
	$strImovelNumero = NULL;
}

if (isset($_POST['strCidadeInfoImovel'])) {

	$strCidadeInfoImovel = $_POST['strCidadeInfoImovel'];

}else {
	$strCidadeInfoImovel = NULL;
}

UPDATE_CAMPO_ID('tdpj_td_registro','strImovelMatricula',$strImovelMatricula,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','intImovelTipoTransacao',$intImovelTipoTransacao,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strInfoImovel',$strInfoImovel,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','dataInfoImovel',$dataInfoImovel,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strInfoImovelCertidao  ',$strInfoImovelCertidao  ,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','decValorInfoImovel',$decValorInfoImovel,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','intImovelSituacao',$intImovelSituacao,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strImovelDescTransacao',$strImovelDescTransacao,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','intImovelRetificacao',$intImovelRetificacao,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','intImovelformaAlienacao',$intImovelformaAlienacao,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','intValorNaoConsta',$intValorNaoConsta,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','decImovelcalcITBI',$decImovelcalcITBI,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','intImovelTipo',$intImovelTipo,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strImovelDesc',$strImovelDesc,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','intImovelConstrucao',$intImovelConstrucao,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','intImovelLocalidade',$intImovelLocalidade,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','intImovelindicadorArea',$intImovelindicadorArea,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','decImovelArea',$decImovelArea,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strImovelEndereco',$strImovelEndereco,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strImovelNumero',$strImovelNumero,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strImovelComplemento',$strImovelComplemento,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strCidadeInfoImovel',$strCidadeInfoImovel,$id);

UPDATE_CAMPO_ID('tdpj_td_registro','strImovelBairro',$strImovelBairro,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strImovelUF',$strImovelUF,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','intImovelCep',$intImovelCep,$id);

//fechar imoveis


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../tdpj-titulos-documentos-registro.php?conf4=ok&id='.$id);




}


if (isset($_POST['strSelo'])) {
unset($_POST['subimit3']);


$seloExplode = $_POST['strSelo'];
$selo = implode(',', $seloExplode);

$seloGratuitoExplode = $_POST['seloGratuito'];
$seloGratuito = implode (',', $seloGratuitoExplode);

UPDATE_CAMPO_ID('tdpj_td_registro','strSelo',$selo,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','seloGratuito',$seloGratuito,$id);


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
//UPDATE_CAMPO_ID('tdpj_td_registro','strSelo',$_POST['strSelo'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strDescricaoAto',$strDescricaoAto,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','decValorEmol',$decValorEmol,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','decFerc',$decFerc,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','decFerj',$decFerj,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','decISSQN',$decISSQN,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','decTotal',$decTotal,$id);

UPDATE_CAMPO_ID('tdpj_td_registro','strLivro', $_POST['strLivro'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strFolha',$_POST['strFolha'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strFolhaComplemento','F',$id);
UPDATE_CAMPO_ID('tdpj_td_registro','Ordem',$_POST['Ordem'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','numAto',$_POST['Ordem'],$id);


################################# Preenchendo Livro protocolo ############################
$r = PESQUISA_ALL_ID('tdpj_td_registro',$id);
foreach ($r as $r ) {

$pesquisa_livro = $pdo->prepare("SELECT * FROM livro_tdpj_td_d where status = 'L' limit 1");
$pesquisa_livro->execute();
$linhas_livro = $pesquisa_livro->fetch(PDO::FETCH_ASSOC);
$livro = $linhas_livro['identifcadorLivro'];
if (isset($linhas_livro['LivroInicial'])) {
	$termo = $linhas_livro['LivroInicial']; #Numero de Ordem
}else {
	$termo = 0;
}

$pesquisa_num_ordem = $pdo->prepare("SELECT strFolha,strFolhaFinal,strFolhaComplemento,selecionarLivro,Ordem, COUNT(Ordem) AS Quantidade FROM `tdpj_td_registro_indicador`  ORDER BY `tdpj_td_registro_indicador`.`Ordem`");
$pesquisa_num_ordem->execute();
$contadorOrdem = $pesquisa_num_ordem->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ordem_ato'] = $contadorOrdem['Quantidade'];
$numOrdem = $_SESSION['numero_ordem_ato']+$termo+1;

$pesquisa_num_ato = $pdo->prepare("SELECT strFolha,strFolhaFinal,strFolhaComplemento,selecionarLivro,numAto, COUNT(numAto) AS Quantidade FROM `tdpj_td_registro_indicador`  ORDER BY `tdpj_td_registro_indicador`.`numAto`");
$pesquisa_num_ato->execute();
$contadorAto = $pesquisa_num_ato->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ato'] = $contadorAto['Quantidade'];
$numAto = $_SESSION['numero_ato']+$termo+1;


$dataAto = $r->dataAto;
$strSelo = $r->strSelo;
$strDescricaoAto = $r->strSelostrDescricaoAto;
$strNomeParte1 = $r->strNomeParte1;
$strCPFParte1= $r->strCPFParte1;
$setTipoDocumento2Parte1 = $r->setTipoDocumento2Parte1;
$strNaturezaTitulo = $r->strNaturezaTitulo;
$strQualidadeLancamento= $r->strQualidadeLancamento;
$strAnotacoes= $r->strAnotacoes;


//$livro_d_indicador = $pdo->prepare("INSERT INTO `tdpj_td_registro_protocolo` (`dataAto`,`strLivro`,`Ordem`,`numAto`,`strSelo`,`strDescricaoAto`,`strNomeParte1`,`strCPFParte1`,`setTipoDocumento2Parte1`,`strNaturezaTitulo`,`strQualidadeLancamento`,`strAnotacoes`) VALUES ('$dataAto','$livro','$numOrdem','$numAto','$strSelo','$strDescricaoAto','$strNomeParte1','$strCPFParte1','$setTipoDocumento2Parte1','$strNaturezaTitulo','$strQualidadeLancamento','$strAnotacoes');");

$livro_d_indicador = $pdo->prepare("INSERT INTO `tdpj_td_registro_indicador` (`ID`, `dataProtocolo`, `dataAto`, `strSelo`, `strDescricaoAto`, `selecionarLivro`, `strNumProtocolo`, `strLivro`, `strLivroComplemento`, `strFolha`, `strFolhaFinal`, `strFolhaComplemento`, `Ordem`, `numAto`, `strAnotacoes`, `strNomeParte1`, `setSexoParte1`, `setTipoDocumento1Parte1`, `strRGParte1`, `strOrgaoEmissorParte1`, `strOrgaoEmissorUFParte1`, `setTipoDocumento2Parte1`, `strCPFParte1`, `dataNascimentoParte1`, `strProfissaoParte1`, `setEstadoCivilParte1`, `strRepresentanteParte1`, `strRogoParte1`, `strMotivoParte1`, `strProcuradorParte1`, `strProcuradorLivroParte1`, `strProcuradorFolhaParte1`, `strProcuradorOrdemParte1`, `strProcuradorCartorioParte1`, `strProcuradorDataParte1`, `strUFParte1`, `strNacionalidadeParte1`, `strCidadeParte1`, `strLogradouroParte1`, `strBairroParte1`, `strTextoLavraturaCartorio`, `IDregistro`, `strNaturezaTitulo`, `strQualidadeLancamento`) VALUES (NULL, CURRENT_TIMESTAMP, '$r->dataAto', '$r->strSelo', '$r->strDescricaoAto', '$r->selecionarLivro', '$r->strNumProtocolo', '$r->strLivro', '$r->strLivroComplemento',  '$r->strFolha', '$r->strFolhaFinal',  '$r->strFolhaComplemento', '$numOrdem', '$numAto', '$r->strAnotacoes', '$r->strNomeParte1', '$r->setSexoParte1', '$r->setTipoDocumento1Parte1', '$r->strRGParte1', '$r->strOrgaoEmissorParte1', '$r->strOrgaoEmissorUFParte1', '$r->setTipoDocumento2Parte1', '$r->strCPFParte1', '$r->dataNascimentoParte1', '$r->strProfissaoParte1', '$r->setEstadoCivilParte1', '$r->strRepresentanteParte1', '$r->strRogoParte1', '$r->strMotivoParte1', '$r->strProcuradorParte1', '$r->strProcuradorLivroParte1', '$r->strProcuradorFolhaParte1', '$r->strProcuradorOrdemParte1', '$r->strProcuradorCartorioParte1', '$r->strProcuradorDataParte1', '$r->strUFParte1', '$r->strNacionalidadeParte1', '$r->strCidadeParte1', '$r->strLogradouroParte1', '$r->strBairroParte1', '$r->strTextoLavraturaCartorio', '$r->ID', '$r->strNaturezaTitulo', '$r->strQualidadeLancamento');");
$livro_d_indicador->execute();


}

#parte de auditoria:
$r = PESQUISA_ALL_ID('tdpj_td_registro',$id);
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
$insert_auditoria = $pdo->prepare("INSERT into auditoria (strUsuario,intAcao,strTipo,intQuantidadeSelo,strSelo,dataHora,strTipoSelo,strTipoAto,Livro,Folha,Ordem,TipoPapelSeguranca,NumeroPapelSeguranca,retorno) values 	('$funcionario','TITULOS DOCUMENTOS','3','1','$seloExplode[$i]',CURRENT_TIMESTAMP,'$tipoSelo','$desTipoAto[$i]','$numLivro','$numFolha','$numOrdem',NULL,NULL,NULL)");
$insert_auditoria->execute();

}
}

header('location:../imprimir/impressao-td.php?id='.$id);
$_SESSION['sucesso'] = 'FORMULÁRIO CONCLUIDO (lavratura)';
}


if (isset($_POST['subimit4'])) {
unset($_POST['subimit4']);

if ($_POST['strLivro'] == "" || $_POST['strLivro']== NULL || empty($_POST['strLivro'])) {
	$_SESSION['erro'] = 'Algum problema ocorreu, verifique o se o livro esta aberto!';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
return false;
}



#################### LIVRO B ###################
if ($_POST['selecionarLivro'] == 2) {
$pesquisa_livro = $pdo->prepare("SELECT * FROM livro_tdpj_td_b where status = 'L' limit 1");
$pesquisa_livro->execute();
$linhas_livro = $pesquisa_livro->fetch(PDO::FETCH_ASSOC);
$folha = $linhas_livro['PaginaLivro'];
$livro = $linhas_livro['identifcadorLivro'];
$termo = $linhas_livro['LivroInicial'];

UPDATE_CAMPO_ID('tdpj_td_registro','strLivro',$livro,$id);

$prencheLivro = "livro_tdpj_td_b";

$pesquisa_livro_td = $pdo->prepare("SELECT strLivro,strFolha,strFolhaFinal,strFolhaComplemento,selecionarLivro,quantidadeFolhas FROM `tdpj_td_registro` WHERE strFolha > 0 and selecionarLivro = '2' and strLivro = '$livro'  and (strSelo IS NOT NULL || strSelo != '')   ORDER BY `tdpj_td_registro`.`strFolha` DESC LIMIT 1 ");
$pesquisa_livro_td->execute();
$p_livro_td = $pesquisa_livro_td->fetch(PDO::FETCH_ASSOC);

$folha = 0;

if ($p_livro_td['strFolhaFinal'] == 0 && $p_livro_td['strFolhaFinal'] == NULL || $p_livro_td['strFolhaFinal'] == '') {
	$folha = 1;
}

else {
	$folha = $p_livro_td['strFolha']+$p_livro_td['quantidadeFolhas'] ;
}

if ($folha % 2 == 0) {
UPDATE_CAMPO_ID('tdpj_td_registro','strFolhaComplemento','V',$id);

$folha +=1;
}else {
UPDATE_CAMPO_ID('tdpj_td_registro','strFolhaComplemento','F',$id);
$folha = $folha;
}

UPDATE_CAMPO_ID('tdpj_td_registro','strFolha',$folha,$id);


#########################################################################################
#numero de ordem e do ato:
$pesquisa_num_ordem = $pdo->prepare("SELECT strFolha,strFolhaFinal,strFolhaComplemento,selecionarLivro,Ordem, COUNT(Ordem) AS Quantidade FROM `tdpj_td_registro` WHERE strFolha > 0 and selecionarLivro = '2'  and (strSelo IS NOT NULL || strSelo != '')  ORDER BY `tdpj_td_registro`.`strFolha`");
$pesquisa_num_ordem->execute();
$contadorOrdem = $pesquisa_num_ordem->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ordem_ato'] = $contadorOrdem['Quantidade'];
$numOrdem = $_SESSION['numero_ordem_ato']+$termo;

UPDATE_CAMPO_ID('tdpj_td_registro','Ordem',$numOrdem,$id);

##########################################################################################
$pesquisa_num_ato = $pdo->prepare("SELECT strFolha,strFolhaFinal,strFolhaComplemento,selecionarLivro,numAto, COUNT(numAto) AS Quantidade FROM `tdpj_td_registro` WHERE strFolha > 0 and selecionarLivro = '2'  and (strSelo IS NOT NULL || strSelo != '') ORDER BY `tdpj_td_registro`.`strFolha`");
$pesquisa_num_ato->execute();
$contadorAto = $pesquisa_num_ato->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ato'] = $contadorAto['Quantidade'];
$numAto = $_SESSION['numero_ato']+$termo;

UPDATE_CAMPO_ID('tdpj_td_registro','numAto',$numAto,$id);
##########################################################################################
}

#fechar if
#################### LIVRO C ###################
if ($_POST['selecionarLivro'] == 3) {
$pesquisa_livro = $pdo->prepare("SELECT * FROM livro_tdpj_td_b where status = 'L' limit 1");
$pesquisa_livro->execute();
$linhas_livro = $pesquisa_livro->fetch(PDO::FETCH_ASSOC);
$livro = $linhas_livro['identifcadorLivro'];
$termo = $linhas_livro['LivroInicial'];
UPDATE_CAMPO_ID('tdpj_td_registro','strLivro',$livro,$id);

$prencheLivro = "livro_tdpj_td_c";

$pesquisa_livro_td = $pdo->prepare("SELECT strLivro,strFolha,strFolhaFinal,strFolhaComplemento,selecionarLivro,quantidadeFolhas FROM `tdpj_td_registro` WHERE strFolha > 0 and selecionarLivro = '3' and strLivro = '$livro' and (strSelo IS NOT NULL || strSelo != '') ORDER BY `tdpj_td_registro`.`strFolha` DESC LIMIT 1 ");
$pesquisa_livro_td->execute();
$p_livro_td = $pesquisa_livro_td->fetch(PDO::FETCH_ASSOC);

$folha = 0;

if ($p_livro_td['strFolhaFinal'] == 0 && $p_livro_td['strFolhaFinal'] == NULL || $p_livro_td['strFolhaFinal'] == '') {
	$folha = 1;
}

else {
	$folha = $p_livro_td['strFolha']+$p_livro_td['quantidadeFolhas'] ;
}

if ($folha % 2 == 0) {
UPDATE_CAMPO_ID('tdpj_td_registro','strFolhaComplemento','V',$id);

$folha +=1;
}else {
UPDATE_CAMPO_ID('tdpj_td_registro','strFolhaComplemento','F',$id);
$folha = $folha;
}

UPDATE_CAMPO_ID('tdpj_td_registro','strFolha',$folha,$id);


#########################################################################################
#numero de ordem e do ato:
$pesquisa_num_ordem = $pdo->prepare("SELECT strFolha,strFolhaFinal,strFolhaComplemento,selecionarLivro,Ordem, COUNT(Ordem) AS Quantidade FROM `tdpj_td_registro` WHERE strFolha > 0 and selecionarLivro = '3'  and (strSelo IS NOT NULL || strSelo != '') ORDER BY `tdpj_td_registro`.`strFolha`");
$pesquisa_num_ordem->execute();
$contadorOrdem = $pesquisa_num_ordem->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ordem_ato'] = $contadorOrdem['Quantidade'];
$numOrdem = $_SESSION['numero_ordem_ato']+$termo;

UPDATE_CAMPO_ID('tdpj_td_registro','Ordem',$numOrdem,$id);

##########################################################################################
$pesquisa_num_ato = $pdo->prepare("SELECT strFolha,strFolhaFinal,strFolhaComplemento,selecionarLivro,numAto, COUNT(numAto) AS Quantidade FROM `tdpj_td_registro` WHERE strFolha > 0 and selecionarLivro = '3' and (strSelo IS NOT NULL || strSelo != '') ORDER BY `tdpj_td_registro`.`strFolha`");
$pesquisa_num_ato->execute();
$contadorAto = $pesquisa_num_ato->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ato'] = $contadorAto['Quantidade'];
$numAto = $_SESSION['numero_ato']+$termo;

UPDATE_CAMPO_ID('tdpj_td_registro','numAto',$numAto,$id);
##########################################################################################
}

#fechar if
if (isset($_POST['strNaturezaTitulo'])) {
$strNaturezaTitulo = $_POST['strNaturezaTitulo'];
}else {
$strNaturezaTitulo = NULL;
}


UPDATE_CAMPO_ID('tdpj_td_registro','selecionarLivro',$_POST['selecionarLivro'],$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strNaturezaTitulo',$strNaturezaTitulo,$id);
UPDATE_CAMPO_ID('tdpj_td_registro','strQualidadeLancamento',$_POST['strQualidadeLancamento'],$id);

//UPDATE_CAMPO_ID('tdpj_td_registro','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);


#var_dump($_POST);
# redirecionar para impressão!!!

$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../tdpj-titulos-documentos-registro.php?conf3=ok&id='.$id);

}

if (isset($_POST['subimit6'])) {
unset($_POST['subimit6']);
//UPDATE_CAMPO_ID('tdpj_td_registro','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);

UPDATE_CAMPO_ID('tdpj_td_registro','strTituloMinuta',$_POST['strTituloMinuta'],$id);


header('location:../tdpj-titulos-documentos-registro.php?conf4=ok&id='.$id);
$_SESSION['sucesso'] = 'PRÉVIA SALVA, VOCÊ PODE VISUALIZAR AGORA!';

}

 ?>
