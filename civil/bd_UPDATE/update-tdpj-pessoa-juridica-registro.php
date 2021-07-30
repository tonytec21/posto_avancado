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

UPDATE_CAMPO_ID('tdpj_pj_registro','dataAto',$_POST['dataAto'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','quantidadeOutorgado',$_POST['quantidadeOutorgado'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','quantidadeSelo',$_POST['quantidadeSelo'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strAnotacoes',$_POST['strAnotacoes'],$id);


if (isset($_POST['quantidadeImagens'])) {
$qntIMG = $_POST['quantidadeImagens'];
}else {
	$qntIMG = NULL;
}
$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../tdpj-pessoa-juridica-registro.php?conf4=ok&id='.$id.'&fm='.$qntIMG);
break;
}



if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);



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



$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../tdpj-pessoa-juridica-registro.php?conf4=ok&id='.$id);

break;
}


if (isset($_POST['strSelo'])) {

$seloExplode = $_POST['strSelo'];
$selo = implode(',', $seloExplode);

$seloGratuitoExplode = $_POST['seloGratuito'];
$seloGratuito = implode (',', $seloGratuitoExplode);

UPDATE_CAMPO_ID('tdpj_pj_registro','strSelo',$selo,$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','seloGratuito',$seloGratuito,$id);

UPDATE_CAMPO_ID('tdpj_pj_registro','strLivro', $_POST['strLivro'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strFolha',$_POST['strFolha'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strFolhaComplemento','F',$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','Ordem',$_POST['Ordem'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','numAto',$_POST['Ordem'],$id);

UPDATE_CAMPO_ID('tdpj_pj_registro','strFolhaComplemento',$_POST['strFolhaComplemento'],$id);


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
//UPDATE_CAMPO_ID('tdpj_pj_registro','strSelo',$_POST['strSelo'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strDescricaoAto',$strDescricaoAto,$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','decValorEmol',$decValorEmol,$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','decFerc',$decFerc,$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','decFerj',$decFerj,$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','decISSQN',$decISSQN,$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','decTotal',$decTotal,$id);

UPDATE_CAMPO_ID('tdpj_pj_registro','strLivro', $_POST['strLivro'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strFolha',$_POST['strFolha'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','Ordem',$_POST['Ordem'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','numAto',$_POST['Ordem'],$id);
#parte de auditoria:
$r = PESQUISA_ALL_ID('tdpj_pj_registro',$id);
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
$insert_auditoria = $pdo->prepare("INSERT into auditoria (strUsuario,intAcao,strTipo,intQuantidadeSelo,strSelo,dataHora,strTipoSelo,strTipoAto,Livro,Folha,Ordem,TipoPapelSeguranca,NumeroPapelSeguranca,retorno) values 	('$funcionario','PESSOA JURIDICA','3','1','$seloExplode[$i]',CURRENT_TIMESTAMP,'$tipoSelo','$desTipoAto[$i]','$numLivro','$numFolha','$numOrdem',NULL,NULL,NULL)");
$insert_auditoria->execute();

}
}


header('location:../imprimir/impressao-pj.php?id='.$id);
$_SESSION['sucesso'] = 'FORMULÁRIO CONCLUIDO (lavratura)';
break;
}


if (isset($_POST['subimit4'])) {
unset($_POST['subimit4']);

if ($_POST['strLivro'] == "" || $_POST['strLivro']== NULL || empty($_POST['strLivro'])) {
	$_SESSION['erro'] = 'Algum problema ocorreu, verifique o se o livro esta aberto!';
	header('Location: ' . $_SERVER['HTTP_REFERER']);
return false;
}


#################### LIVRO A ###################
if ($_POST['selecionarLivro'] == 1) {
$pesquisa_livro = $pdo->prepare("SELECT * FROM livro_tdpj_pj_a where status = 'L' limit 1");
$pesquisa_livro->execute();
$linhas_livro = $pesquisa_livro->fetch(PDO::FETCH_ASSOC);
$folha = $linhas_livro['PaginaLivro'];
$livro = $linhas_livro['identifcadorLivro'];
$termo = $linhas_livro['LivroInicial'];

UPDATE_CAMPO_ID('tdpj_pj_registro','strLivro',$livro,$id);
$prencheLivro = "livro_tdpj_pj_a";

$pesquisa_livro_pj = $pdo->prepare("SELECT strLivro,strFolha,strFolhaFinal,strFolhaComplemento,strSelo,selecionarLivro,quantidadeFolhas FROM `tdpj_pj_registro` WHERE strFolha > 0 and selecionarLivro = '1' and strLivro = '$livro'  and (strSelo IS NOT NULL || strSelo != '')  ORDER BY `tdpj_pj_registro`.`strFolha` DESC LIMIT 1 ");
$pesquisa_livro_pj->execute();
$p_livro_pj = $pesquisa_livro_pj->fetch(PDO::FETCH_ASSOC);

$folha = 0;

if ($p_livro_pj['strFolha'] == 0 && $p_livro_pj['strFolha'] == NULL || $p_livro_pj['strFolha'] == '') {
	$folha = 1;
}

else {
	$folha = $p_livro_pj['strFolha']+$p_livro_pj['quantidadeFolhas'] ;
}

if ($folha % 2 == 0) {
UPDATE_CAMPO_ID('tdpj_pj_registro','strFolhaComplemento','V',$id);

$folha +=1;
}else {
UPDATE_CAMPO_ID('tdpj_pj_registro','strFolhaComplemento','F',$id);
$folha = $folha;
}

UPDATE_CAMPO_ID('tdpj_pj_registro','strFolha',$folha,$id);


#########################################################################################
#numero de ordem e do ato:
$pesquisa_num_ordem = $pdo->prepare("SELECT strFolha,strFolhaFinal,strFolhaComplemento,strSelo,selecionarLivro,Ordem, COUNT(Ordem) AS Quantidade FROM `tdpj_pj_registro` WHERE strFolha > 0 and selecionarLivro = '1'  and (strSelo IS NOT NULL || strSelo != '') ORDER BY `tdpj_pj_registro`.`strFolha`");
$pesquisa_num_ordem->execute();
$contadorOrdem = $pesquisa_num_ordem->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ordem_ato'] = $contadorOrdem['Quantidade'];
$numOrdem = $_SESSION['numero_ordem_ato']+$termo;

UPDATE_CAMPO_ID('tdpj_pj_registro','Ordem',$numOrdem,$id);

##########################################################################################
$pesquisa_num_ato = $pdo->prepare("SELECT strFolha,strFolhaFinal,strFolhaComplemento,strSelo,selecionarLivro,numAto, COUNT(numAto) AS Quantidade FROM `tdpj_pj_registro` WHERE strFolha > 0 and selecionarLivro = '1'  and (strSelo IS NOT NULL || strSelo != '')  ORDER BY `tdpj_pj_registro`.`strFolha`");
$pesquisa_num_ato->execute();
$contadorAto = $pesquisa_num_ato->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ato'] = $contadorAto['Quantidade'];
$numAto = $_SESSION['numero_ato']+$termo;

UPDATE_CAMPO_ID('tdpj_pj_registro','numAto',$numAto,$id);
##########################################################################################
}

#fechar if
#################### LIVRO B ###################
if ($_POST['selecionarLivro'] == 2) {
$pesquisa_livro = $pdo->prepare("SELECT * FROM livro_tdpj_pj_b where status = 'L' limit 1");
$pesquisa_livro->execute();
$linhas_livro = $pesquisa_livro->fetch(PDO::FETCH_ASSOC);
$livro = $linhas_livro['identifcadorLivro'];
$termo = $linhas_livro['LivroInicial'];

UPDATE_CAMPO_ID('tdpj_pj_registro','strLivro',$livro,$id);

$prencheLivro = "livro_tdpj_pj_b";

$pesquisa_livro_pj = $pdo->prepare("SELECT strLivro,strFolha,strFolhaFinal,strFolhaComplemento,strSelo,selecionarLivro,quantidadeFolhas FROM `tdpj_pj_registro` WHERE strFolha > 0 and selecionarLivro = '2' and strLivro = '$livro'  and (strSelo IS NOT NULL || strSelo != '') ORDER BY `tdpj_pj_registro`.`strFolha` DESC LIMIT 1 ");
$pesquisa_livro_pj->execute();
$p_livro_pj = $pesquisa_livro_pj->fetch(PDO::FETCH_ASSOC);

$folha = 0;

if ($p_livro_pj['strFolha'] == 0 && $p_livro_pj['strFolha'] == NULL || $p_livro_pj['strFolha'] == '') {
	$folha = 1;
}

else {
	$folha = $p_livro_pj['strFolha']+$p_livro_pj['quantidadeFolhas'] ;
}

if ($folha % 2 == 0) {
UPDATE_CAMPO_ID('tdpj_pj_registro','strFolhaComplemento','V',$id);

$folha +=1;
}else {
UPDATE_CAMPO_ID('tdpj_pj_registro','strFolhaComplemento','F',$id);
$folha = $folha;
}

UPDATE_CAMPO_ID('tdpj_pj_registro','strFolha',$folha,$id);


#########################################################################################
#numero de ordem e do ato:
$pesquisa_num_ordem = $pdo->prepare("SELECT strFolha,strFolhaFinal,strFolhaComplemento,selecionarLivro,strSelo,Ordem, COUNT(Ordem) AS Quantidade FROM `tdpj_pj_registro` WHERE strFolha > 0 and selecionarLivro = '2'  and (strSelo IS NOT NULL || strSelo != '') ORDER BY `tdpj_pj_registro`.`strFolha`");
$pesquisa_num_ordem->execute();
$contadorOrdem = $pesquisa_num_ordem->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ordem_ato'] = $contadorOrdem['Quantidade'];
$numOrdem = $_SESSION['numero_ordem_ato']+$termo;

UPDATE_CAMPO_ID('tdpj_pj_registro','Ordem',$numOrdem,$id);

##########################################################################################
$pesquisa_num_ato = $pdo->prepare("SELECT strFolha,strFolhaFinal,strFolhaComplemento,selecionarLivro,strSelo,numAto, COUNT(numAto) AS Quantidade FROM `tdpj_pj_registro` WHERE strFolha > 0 and selecionarLivro = '2'  and (strSelo IS NOT NULL || strSelo != '') ORDER BY `tdpj_pj_registro`.`strFolha`");
$pesquisa_num_ato->execute();
$contadorAto = $pesquisa_num_ato->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_ato'] = $contadorAto['Quantidade'];
$numAto = $_SESSION['numero_ato']+$termo;

UPDATE_CAMPO_ID('tdpj_pj_registro','numAto',$numAto,$id);
##########################################################################################
}

#fechar if
if (isset($_POST['strNaturezaTitulo'])) {
$strNaturezaTitulo = $_POST['strNaturezaTitulo'];
}else {
$strNaturezaTitulo = NULL;
}

UPDATE_CAMPO_ID('tdpj_pj_registro','selecionarLivro',$_POST['selecionarLivro'],$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strNaturezaTitulo',$strNaturezaTitulo,$id);
UPDATE_CAMPO_ID('tdpj_pj_registro','strQualidadeLancamento',$_POST['strQualidadeLancamento'],$id);

//UPDATE_CAMPO_ID('tdpj_pj_registro','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);



#var_dump($_POST);
# redirecionar para impressão!!!

$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../tdpj-pessoa-juridica-registro.php?conf3=ok&id='.$id);
break;
}

if (isset($_POST['subimit6'])) {
unset($_POST['subimit6']);
UPDATE_CAMPO_ID('tdpj_pj_registro','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);

UPDATE_CAMPO_ID('tdpj_pj_registro','strTituloMinuta',$_POST['strTituloMinuta'],$id);


header('location:../tdpj-pessoa-juridica-registro.php?conf4=ok&id='.$id);
$_SESSION['sucesso'] = 'PRÉVIA SALVA, VOCÊ PODE VISUALIZAR AGORA!';

}


 ?>
