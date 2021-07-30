<?php
include('../../controller/db_functions.php');
session_start();
$id = $_GET['id'];


if (isset($_POST['subimit'])) {
unset($_POST['subimit']);


UPDATE_CAMPO_ID('imovel_selo','setSeloDiferido',$_POST['setSeloDiferido'],$id);
UPDATE_CAMPO_ID('imovel_selo','strSelo',$_POST['strSelo'],$id);
UPDATE_CAMPO_ID('imovel_selo','strDescricaoAto',$_POST['strDescricaoAto'],$id);
UPDATE_CAMPO_ID('imovel_selo','decValorEmol',$_POST['decValorEmol'],$id);
UPDATE_CAMPO_ID('imovel_selo','decFunCivil',$_POST['decFunCivil'],$id);
UPDATE_CAMPO_ID('imovel_selo','decTaxaJuridica',$_POST['decTaxaJuridica'],$id);
UPDATE_CAMPO_ID('imovel_selo','decISSQN',$_POST['decISSQN'],$id);
UPDATE_CAMPO_ID('imovel_selo','decTotal',$_POST['decTotal'],$id);
UPDATE_CAMPO_ID('imovel_selo','dataAto',$_POST['dataAto'],$id);
UPDATE_CAMPO_ID('imovel_selo','dataProtocolo',$_POST['dataProtocolo'],$id);
UPDATE_CAMPO_ID('imovel_selo','dataUtilizacao',$_POST['dataUtilizacao'],$id);
UPDATE_CAMPO_ID('imovel_selo','strLivro',$_POST['strLivro'],$id);
UPDATE_CAMPO_ID('imovel_selo','strNumProtocolo',$_POST['strNumProtocolo'],$id);
UPDATE_CAMPO_ID('imovel_selo','strCodigoSelo',$_POST['strCodigoSelo'],$id);
UPDATE_CAMPO_ID('imovel_selo','strQntPaginas',$_POST['strQntPaginas'],$id);
UPDATE_CAMPO_ID('imovel_selo','strQntUnidadeAutomatas',$_POST['strQntUnidadeAutomatas'],$id);
UPDATE_CAMPO_ID('imovel_selo','strQntLoteGleba',$_POST['strQntLoteGleba'],$id);
UPDATE_CAMPO_ID('imovel_selo','decValorEconomico',$_POST['decValorEconomico'],$id);
UPDATE_CAMPO_ID('imovel_selo','decValorAvaliacao',$_POST['decValorAvaliacao'],$id);
UPDATE_CAMPO_ID('imovel_selo','decValorFiscal',$_POST['decValorFiscal'],$id);
UPDATE_CAMPO_ID('imovel_selo','strAnotacoes',$_POST['strAnotacoes'],$id);
UPDATE_CAMPO_ID('imovel_selo','setSeloGratuito',$_POST['setSeloGratuito'],$id);
UPDATE_CAMPO_ID('imovel_selo','strJustificativa',$_POST['strJustificativa'],$id);


//header('location:pesquisa-tdpj-selo.php');
//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'FORMULÁRIO CONCLUIDO (ÓBITO)';

}







 ?>
