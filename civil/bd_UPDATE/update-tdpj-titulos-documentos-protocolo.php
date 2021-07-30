<?php
//error_reporting(E_ALL);
//ini_set("display_errors", 1);
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

UPDATE_CAMPO_ID('tdpj_td_protocolo','dataAto',$_POST['dataAto'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','possuiProtocolo',$_POST['possuiProtocolo'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','quantidadeOutorgado',$_POST['quantidadeOutorgado'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','quantidadeSelo',$_POST['quantidadeSelo'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strAnotacoes',$_POST['strAnotacoes'],$id);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../tdpj-titulos-documentos-protocolo.php?conf1=ok&id='.$id);

}



if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);


UPDATE_CAMPO_ID('tdpj_td_protocolo','strNomeParte1',strtoupper($_POST['strNomeParte1']),$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','setSexoParte1',strtoupper($_POST['setSexoParte1']),$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','setTipoDocumento1Parte1',$_POST['setTipoDocumento1Parte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strRGParte1',$_POST['strRGParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strOrgaoEmissorParte1',$_POST['strOrgaoEmissorParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strOrgaoEmissorUFParte1',$_POST['strOrgaoEmissorUFParte1'],$id);

UPDATE_CAMPO_ID('tdpj_td_protocolo','setTipoDocumento2Parte1',$_POST['setTipoDocumento2Parte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strCPFParte1',$_POST['strCPFParte1'],$id);
$dataNascimentoParte1 = $_POST['dataNascimentoParte1'];
$dataNascimentoParte1= date('Y/m/d', strtotime($dataNascimentoParte1));
UPDATE_CAMPO_ID('tdpj_td_protocolo','dataNascimentoParte1',$dataNascimentoParte1,$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strProfissaoParte1',$_POST['strProfissaoParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','setEstadoCivilParte1',$_POST['setEstadoCivilParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strRogoParte1',strtoupper($_POST['strRogoParte1']),$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strMotivoParte1',strtoupper($_POST['strMotivoParte1']),$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strRepresentanteParte1',strtoupper($_POST['strRepresentanteParte1']),$id);

UPDATE_CAMPO_ID('tdpj_td_protocolo','strProcuradorParte1',strtoupper($_POST['strProcuradorParte1']),$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strProcuradorLivroParte1',$_POST['strProcuradorLivroParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strProcuradorFolhaParte1',$_POST['strProcuradorFolhaParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strProcuradorOrdemParte1',$_POST['strProcuradorOrdemParte1'],$id);

$strProcuradorDataParte1 = $_POST['strProcuradorDataParte1'];
$strProcuradorDataParte1= date('Y/m/d', strtotime($strProcuradorDataParte1));
UPDATE_CAMPO_ID('tdpj_td_protocolo','strProcuradorDataParte1',$strProcuradorDataParte1,$id);

UPDATE_CAMPO_ID('tdpj_td_protocolo','strProcuradorCartorioParte1',strtoupper($_POST['strProcuradorCartorioParte1']),$id);



UPDATE_CAMPO_ID('tdpj_td_protocolo','strUFParte1',$_POST['strUFParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strNacionalidadeParte1',$_POST['strNacionalidadeParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strPaisResideParte1',$_POST['strPaisResideParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strNaturalParte1',$_POST['strNaturalParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strCidadeParte1',$_POST['strCidadeParte1'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strLogradouroParte1',strtoupper($_POST['strLogradouroParte1']),$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strBairroParte1',strtoupper($_POST['strBairroParte1']),$id);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../tdpj-titulos-documentos-protocolo.php?conf3=ok&id='.$id);


}


if (isset($_POST['subimit3'])) {
unset($_POST['subimit3']);


$seloExplode = $_POST['strSelo'];
$selo = implode(',', $seloExplode);

$seloGratuitoExplode = $_POST['seloGratuito'];
$seloGratuito = implode (',', $seloGratuitoExplode);

UPDATE_CAMPO_ID('tdpj_td_protocolo','strSelo',$selo,$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','seloGratuito',$seloGratuito,$id);

 $r = PESQUISA_ALL_ID('tdpj_td_protocolo',$id);
foreach ($r as $r ) {

$seloExplode = $r->strSelo;
$seloExplode = explode(',', $seloExplode);

$seloGratuitoExplode = $r->seloGratuito;
$seloGratuito = explode(',', $seloGratuitoExplode);

for ($i=0; $i < $r->quantidadeSelo; $i++) {
	// code...
$busca_selo = $pdo->prepare("select * from selo_fisico_uso where selo = '$seloExplode[$i]'");
$busca_selo->execute();


$linha = $busca_selo->fetch(PDO::FETCH_ASSOC);

if ($busca_selo->rowCount() == 0) {
	$_SESSION['erro'] = 'Selo não encontrado';
	unset($_SESSION['sucesso']);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	break;
}
elseif  ($linha['status'] == 'U' && $linha['tipo'] == 'GER' || $linha['status'] == 'U' && $linha['tipo'] == 'GRA' ) {
	$_SESSION['erro'] = 'Algum dos Selos informados foi utilizado!!!';
	unset($_SESSION['sucesso']);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	break;
}

elseif ($linha['tipo']!= 'GER' && $linha['tipo']!= 'GRA' ) {
	$_SESSION['erro'] = 'O Selo informado Não serve para este tipo de atividade';
	unset($_SESSION['sucesso']);
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	break;
}
} //fechar for

for ($i=0; $i < $r->quantidadeSelo; $i++) {
if ($linha['status'] == 'L' && $linha['tipo'] == 'GER' || $linha['status'] == 'L' && $linha['tipo'] == 'GRA'){
	if (isset($seloGratuito[$i]) && $seloGratuito[$i] == 'S') {
	$up = $pdo->prepare("update selo_fisico_uso set status = 'U' where selo = '$seloExplode[$i]' and tipo ='GRA'");
	$up->execute();
	}
	else{
	$up = $pdo->prepare("update selo_fisico_uso set status = 'U' where selo = '$seloExplode[$i]' and tipo ='GER'");
	$up->execute();
	}
}

else{
return false;
}
} //fechar for
} //fechar foreach

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
//UPDATE_CAMPO_ID('tdpj_td_protocolo','strSelo',$_POST['strSelo'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strDescricaoAto',$strDescricaoAto,$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','decValorEmol',$decValorEmol,$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','decFerc',$decFerc,$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','decFerj',$decFerj,$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','decISSQN',$decISSQN,$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','decTotal',$decTotal,$id);

$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../tdpj-titulos-documentos-protocolo.php?conf4=ok&id='.$id);

}


if (isset($_POST['subimit4'])) {
unset($_POST['subimit4']);

#fechar if
if (isset($_POST['strNaturezaTitulo'])) {
$strNaturezaTitulo = $_POST['strNaturezaTitulo'];
}else {
$strNaturezaTitulo = NULL;
}

if (isset($_POST['strNumProtocolo'])) {
$strNumProtocolo = $_POST['strNumProtocolo'];
}else {
$strNumProtocolo = NULL;
}
UPDATE_CAMPO_ID('tdpj_td_protocolo','strNumProtocolo',$strNumProtocolo,$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','selecionarLivro',$_POST['selecionarLivro'],$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strNaturezaTitulo',$strNaturezaTitulo,$id);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strQualidadeLancamento',$_POST['strQualidadeLancamento'],$id);

//UPDATE_CAMPO_ID('tdpj_td_protocolo','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);

#parte de auditoria:
$r = PESQUISA_ALL_ID('tdpj_td_protocolo',$id);
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
if ($seloGratuito[$i] == 'S') {
$tipoSelo = 'GRA';
}else {
$tipoSelo = 'GER';
}
if ($seloGratuito[$i] == 'S') {
$tipoSelo = 'GRA';
}else {
$tipoSelo = 'GER';
}
$funcionario = $_SESSION['nome'];
$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','RCTD - PROTOCOLO','3','1','$seloExplode[$i]',CURRENT_TIMESTAMP,'$tipoSelo','$desTipoAto[$i]','$numLivro','$numFolha','$numOrdem','0','0')");
$insert_auditoria->execute();

}
}


################################# Preenchendo Livro protocolo ############################
$r = PESQUISA_ALL_ID('tdpj_td_protocolo',$id);
foreach ($r as $r ) {

if ($r->possuiProtocolo == '0') {
$pesquisa_livro_protocolo = $pdo->prepare("SELECT * FROM livro_tdpj_td_d where status = 'L' limit 1");
$pesquisa_livro_protocolo->execute();
$linhas_livro_protocolo = $pesquisa_livro_protocolo->fetch(PDO::FETCH_ASSOC);
$livro_protocolo = $linhas_livro_protocolo['identifcadorLivro'];
//$livroProtocolo = $pdo->prepare("UPDATE livro_tdpj_pj_protocolo set Status =  'U', assento = '$r->strNomeParte1', IDregistro = '$r->ID'  where identifcadorLivro = '$livro_protocolo' and PaginaLivro = '$folha_protocolo'");
//$livroProtocolo->execute();
$livro_a_protocolo = $pdo->prepare("INSERT INTO `tdpj_td_registro_protocolo` (`ID`, `dataProtocolo`, `dataAto`, `strSelo`, `strDescricaoAto`, `selecionarLivro`, `strNumProtocolo`,`strAnotacoes`, `strNomeParte1`, `IDregistro`, `strNaturezaTitulo`, `strQualidadeLancamento`) VALUES (NULL, CURRENT_TIMESTAMP, '$r->dataAto', '$r->strSelo', '$r->strDescricaoAto', '$r->selecionarLivro', '$r->strNumProtocolo','$r->strAnotacoes', '$r->strNomeParte1','$r->ID', '$r->strNaturezaTitulo', '$r->strQualidadeLancamento');");
$livro_a_protocolo->execute();
}

}

$r = PESQUISA_ALL_ID('tdpj_td_protocolo',$id);
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
$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','RTD','3','1','$seloExplode[$i]',CURRENT_TIMESTAMP,'$tipoSelo','$desTipoAto[$i]','$numLivro','$numFolha','$numOrdem','0','0','0')");
$insert_auditoria->execute();

}
}
#var_dump($_POST);
# redirecionar para impressão!!!
exit;
header('location:../imprimir/impressao-td.php?id='.$id);
$_SESSION['sucesso'] = 'FORMULÁRIO CONCLUIDO (lavratura)';

}

if (isset($_POST['subimit6'])) {
unset($_POST['subimit6']);
UPDATE_CAMPO_ID('tdpj_td_protocolo','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);

UPDATE_CAMPO_ID('tdpj_td_protocolo','strTituloMinuta',$_POST['strTituloMinuta'],$id);


header('location:../tdpj-titulos-documentos-protocolo.php?conf4=ok&id='.$id);
$_SESSION['sucesso'] = 'PRÉVIA SALVA, VOCÊ PODE VISUALIZAR AGORA!';

}

 ?>
