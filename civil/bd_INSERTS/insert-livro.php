<?php
session_start();
include('../../../controller/db_functions.php');
$pdo = conectar();
if (isset($_POST['subimit'])) {
unset($_POST['subimit']);

#buscando pra ver o se o livro já existe:
$verifica_livro = $_POST['intIdUnico'];
$tipo_verifica_livro = $_POST['setTipoLivro'];
$busca_livro_existe = $pdo->prepare("SELECT * FROM livronotas where intIdUnico = '$verifica_livro' and setTipoLivro = '$tipo_verifica_livro' ");
$busca_livro_existe->execute();
if ($busca_livro_existe->rowCount()>0) {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	$_SESSION['erro'] = 'O livro descrito já foi cadastrado!';
	break;
}
#---------------------------------------------

/*
$extensao = strtolower(substr($_FILES['imgCabecalho']['name'], -4));
	$tipo = strtolower($_FILES['imgCabecalho']['type']);
	$nome = strtolower(($_FILES['imgCabecalho']['name']));
	$novo_nome = $nome;
	$diretorio = "cabecalhos/";
move_uploaded_file($_FILES['imgCabecalho']['tmp_name'], $diretorio.$novo_nome);
$foto = $diretorio.$novo_nome;
unset($_POST['imgCabecalho']);
*/
$foto = 'NULL';
$_POST['imgCabecalho'] = $foto;
//var_dump($_POST);


$nomelivro = $_POST['dataAbertura'].$_POST['setTipoLivro'];
$_POST['identificadorLivro'] = $nomelivro;

if ($_POST['setTipoLivro'] != 'PROTESTOS_APONTAMENTOS') {
INSERT_POST('livronotas',$_POST);
}


if ($_POST['setTipoLivro'] == 'PROTESTOS' ) {
	$tabela = 'livro_protestos';
}
if ($_POST['setTipoLivro'] == 'PROTESTOS_APONTAMENTOS' ) {
	$tabela = 'livro_protestos_apontamentos';
}
if ($_POST['setTipoLivro'] == 'PROTESTOS_PAGAMENTOS' ) {
	$tabela = 'livro_protestos_pagamentos';
}
if ($_POST['setTipoLivro'] == 'PROTESTOS_AUX' ) {
	$tabela = 'livro_protestos_auxiliar';
}
if ($_POST['setTipoLivro'] == 'CASAMENTOS' ) {
	$tabela = 'livro_casamentos';
}
if ($_POST['setTipoLivro'] == 'CASAMENTOSA' ) {
	$tabela = 'livro_casamentos_auxiliar';
}
if ($_POST['setTipoLivro'] == 'CASAMENTOSE' ) {
	$tabela = 'livro_casamentos_especial';
}
if ($_POST['setTipoLivro'] == 'NASCIMENTOS' ) {
	$tabela = 'livro_nascimentos';
}
if ($_POST['setTipoLivro'] == 'IMOVEIS' ) {
	$tabela = 'livro_imoveis';
}
if ($_POST['setTipoLivro'] == 'OBITOS' ) {
	$tabela = 'livro_obitos';
}
if ($_POST['setTipoLivro'] == 'OBITOSA' ) {
	$tabela = 'livro_obitos_auxiliar';
}
if ($_POST['setTipoLivro'] == 'PROCLAMAS' ) {
	$tabela = 'livro_proclamas';
}
if ($_POST['setTipoLivro'] == 'ESPECIAL' ) {
	$tabela = 'livro_especial';
}
if ($_POST['setTipoLivro'] == 'CERTIDOES' ) {
	$tabela = 'livro_certidoes';
}
if ($_POST['setTipoLivro'] == 'OUTROS' ) {
	$tabela = 'livro_outros';
}
if ($_POST['setTipoLivro'] == 'TDPJ' ) {
	$tabela = 'livro_tdpj';
}
if ($_POST['setTipoLivro'] == 'ATANOTARIAL' ) {
	$tabela = 'livro_notas_ata_notarial';
}
if ($_POST['setTipoLivro'] == 'ESCRITURA' ) {
	$tabela = 'livro_notas_escritura';
}
if ($_POST['setTipoLivro'] == 'PROCURACAO' ) {
	$tabela = 'livro_notas_procuracao';
}
if ($_POST['setTipoLivro'] == 'PROCURACAOPREV' ) {
	$tabela = 'livro_notas_procuracao_fins_previdenciarios';
}
if ($_POST['setTipoLivro'] == 'RENUNCIA' ) {
	$tabela = 'livro_notas_renuncia';
}
if ($_POST['setTipoLivro'] == 'REVOGACAO' ) {
	$tabela = 'livro_notas_revogacao';
}
if ($_POST['setTipoLivro'] == 'SUBSTABELECIMENTO' ) {
	$tabela = 'livro_notas_substabelecimento';
}
if ($_POST['setTipoLivro'] == 'LIVROATD' ) {
	$tabela = 'livro_tdpj_td_a';
}
if ($_POST['setTipoLivro'] == 'LIVROBTD' ) {
	$tabela = 'livro_tdpj_td_b';
}
if ($_POST['setTipoLivro'] == 'LIVROCTD' ) {
	$tabela = 'livro_tdpj_td_c';
}
if ($_POST['setTipoLivro'] == 'LIVRODTD' ) {
	$tabela = 'livro_tdpj_td_d';
}
if ($_POST['setTipoLivro'] == 'LIVROAPJ' ) {
	$tabela = 'livro_tdpj_pj_a';
}
if ($_POST['setTipoLivro'] == 'LIVROBPJ' ) {
	$tabela = 'livro_tdpj_pj_b';
}
if ($_POST['setTipoLivro'] == 'PROTOCOLOPJ' ) {
	$tabela = 'livro_tdpj_pj_protocolo';
}
#-----------------------------------------------
if ($_POST['setTipoLivro'] == 'IMOVEIS_PROTOCOLO' ) {
	$tabela = 'livro_imoveis_protocolo';
}
if ($_POST['setTipoLivro'] == 'IMOVEIS_LIVRO_2' ) {
	$tabela = 'livro_imoveis_registro';
}
if ($_POST['setTipoLivro'] == 'IMOVEIS_LIVRO_3' ) {
	$tabela = 'livro_imoveis_registro_auxiliar';
}
if ($_POST['setTipoLivro'] == 'IMOVEIS_INDICADOR_PESSOAL' ) {
	$tabela = 'livro_imoveis_indicador_pessoal';
}
if ($_POST['setTipoLivro'] == 'IMOVEIS_INDICADOR_REAL' ) {
	$tabela = 'livro_imoveis_indicador_real';
}



$primeira =str_pad($_POST['strFolhaInicial'],3,"0",STR_PAD_LEFT) ;
$final = str_pad($_POST['strFolhaFinal'],3,"0",STR_PAD_LEFT) ;
$termo_inicial = $_POST['strLivroInicial'];
$livro = str_pad($_POST['intIdUnico'],5,"0",STR_PAD_LEFT) ;


if ($_POST['setTipoLivro'] == 'IMOVEIS_PROTOCOLO' || $_POST['setTipoLivro'] == 'IMOVEIS_LIVRO_2' || $_POST['setTipoLivro'] == 'IMOVEIS_LIVRO_3' || $_POST['setTipoLivro'] == 'IMOVEIS_INDICADOR_PESSOAL' || $_POST['setTipoLivro'] == 'IMOVEIS_INDICADOR_REAL'  ) {
for ($i=$primeira; $i <=$final ; $i++) {
	$i = str_pad($i,3,"0",STR_PAD_LEFT) ;
	$in = $pdo->prepare("Insert into $tabela values ('$livro', '$i', '$termo_inicial','$primeira','$final','L','NULL','NULL','NULL','NULL')");
	$in->execute();
	$termo_inicial++;
}
}

if ($_POST['setTipoLivro'] == 'ATANOTARIAL'||$_POST['setTipoLivro'] =='PROCURACAO' ||$_POST['setTipoLivro'] =='PROCURACAOPREV'||$_POST['setTipoLivro'] =='SUBSTABELECIMENTO'||$_POST['setTipoLivro'] =='RENUNCIA'||$_POST['setTipoLivro'] =='REVOGACAO'||$_POST['setTipoLivro'] =='ESCRITURA') {
for ($i=$primeira; $i <=$final ; $i++) {
	$i = str_pad($i,3,"0",STR_PAD_LEFT) ;
	$in = $pdo->prepare("Insert into $tabela values ('$livro', '$i', '$termo_inicial','$primeira','$final','L','NULL','NULL','NULL','NULL')");
	$in->execute();
	$termo_inicial++;
}
}
elseif ($_POST['setTipoLivro'] == 'LIVROATD'||$_POST['setTipoLivro'] == 'LIVROBTD'||$_POST['setTipoLivro'] == 'LIVROCTD'||$_POST['setTipoLivro'] == 'LIVRODTD'||$_POST['setTipoLivro'] == 'LIVROAPJ'||$_POST['setTipoLivro'] == 'LIVROBPJ'||$_POST['setTipoLivro'] == 'PROTOCOLOPJ') {
for ($i=$primeira; $i <=$final ; $i++) {
	$i = str_pad($i,3,"0",STR_PAD_LEFT) ;
	$in = $pdo->prepare("Insert into $tabela values ('$livro', '$i', '$termo_inicial','$primeira','$final','L','NULL','NULL','NULL')");
	$in->execute();
	$termo_inicial++;
}
}
elseif($_POST['setTipoLivro'] == 'PROTESTOS_APONTAMENTOS'){
	$folhainicial = $_POST['strFolhaInicial'];
	$alterafolha1 = $pdo->prepare("ALTER TABLE `bookc`.`livro_protestos_apontamentos` AUTO_INCREMENT = $folhainicial");
	$alterafolha1->execute();
	$_SESSION['sucesso'] = 'LIVRO DE APONTAMENTOS INICIADO A PARTIR DA FOLHA'.$_POST['strFolhaInicial'].' TERMO '.$_POST['strLivroInicial'];
}


else{
for ($i=$primeira; $i <=$final ; $i++) {
	$i = str_pad($i,3,"0",STR_PAD_LEFT) ;
	$in = $pdo->prepare("Insert into $tabela values ('$livro', '$i', '$termo_inicial','$primeira','$final','L','NULL','NULL')");
	$in->execute();
	$termo_inicial++;
}
}
$termo_abertura = $_POST['TermoAbertura'];
$abertura = $pdo->prepare("UPDATE $tabela set strTermoAbertura = '$termo_abertura' where PaginaLivro = '$primeira' and identifcadorLivro = '$livro' ");
$abertura->execute();



###header('location:../autenticacao.php');
##volta a pagina anterior o codigo abaixo
header('Location: ' . $_SERVER['HTTP_REFERER']);
#var_dump($_POST);
}










 ?>
