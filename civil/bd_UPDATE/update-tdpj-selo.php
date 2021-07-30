
﻿<?php
include('../../../controller/db_functions.php');

session_start();
$id = $_GET['id'];
if (empty($_POST['setSeloGratuito'])) {
	$_POST['seloGratuito'] = 'N';
	$_POST['seloGratuitoJustificativa'] = '';
} else {
		$_POST['seloGratuito'] = 'S';
}

if (empty($_POST['setSeloDiferido'])) {
	$_POST['setSeloDiferido'] = 'N';
}

if (isset($_POST['subimit'])) {
unset($_POST['subimit']);

var_dump($_POST);
UPDATE_CAMPO_ID('tdpj_selo','setSeloDiferido',$_POST['setSeloDiferido'],$id);
UPDATE_CAMPO_ID('tdpj_selo','strSelo',$_POST['strSelo'],$id);
UPDATE_CAMPO_ID('tdpj_selo','strDescricaoAto',$_POST['strDescricaoAto'],$id);
UPDATE_CAMPO_ID('tdpj_selo','decValorEmol',$_POST['decValorEmol'],$id);
UPDATE_CAMPO_ID('tdpj_selo','decFunCivil',$_POST['decFunCivil'],$id);
UPDATE_CAMPO_ID('tdpj_selo','decTaxaJuridica',$_POST['decTaxaJuridica'],$id);
UPDATE_CAMPO_ID('tdpj_selo','dataAto',$_POST['dataAto'],$id);
UPDATE_CAMPO_ID('tdpj_selo','dataProtocolo',$_POST['dataProtocolo'],$id);
UPDATE_CAMPO_ID('tdpj_selo','strNumProtocolo',$_POST['strNumProtocolo'],$id);
UPDATE_CAMPO_ID('tdpj_selo','strQntPaginas',$_POST['strQntPaginas'],$id);
UPDATE_CAMPO_ID('tdpj_selo','decValorEconomico',$_POST['decValorEconomico'],$id);
UPDATE_CAMPO_ID('tdpj_selo','strAnotacoes',$_POST['strAnotacoes'],$id);
UPDATE_CAMPO_ID('tdpj_selo','setSeloGratuito',$_POST['seloGratuito'],$id);
UPDATE_CAMPO_ID('tdpj_selo','strJustificativa',$_POST['strJustificativa'],$id);


//header('location:pesquisa-tdpj-selo.php');
//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'FORMULÁRIO ATUALIZADO (TDPJ SELO)';

}







 ?>
