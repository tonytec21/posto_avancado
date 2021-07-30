<?php
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];


if (isset($_POST['subimit1'])) {
unset($_POST['subimit1']);


UPDATE_CAMPO_ID('notas_lavratura','setSeloDiferido',$_POST['setSeloDiferido'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strSelo',$_POST['strSelo'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strDescricaoAto',$_POST['strDescricaoAto'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decValorEmol',$_POST['decValorEmol'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decFunCivil',$_POST['decFunCivil'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decTaxaJuridica',$_POST['decTaxaJuridica'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decISSQN',$_POST['decISSQN'],$id);
UPDATE_CAMPO_ID('notas_lavratura','decTotal',$_POST['decTotal'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strLivro',$_POST['strLivro'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFolha',$_POST['strFolha'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strFolhaComplemento',$_POST['strFolhaComplemento'],$id);
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
header('location:../notas-lavratura.php?conf=ok&id='.$id);

}

if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);


UPDATE_CAMPO_ID('notas_lavratura','setTipoOurtoga',$_POST['setTipoOurtoga'],$id);
UPDATE_CAMPO_ID('notas_lavratura','setQualidade',$_POST['setQualidade'],$id);
UPDATE_CAMPO_ID('notas_lavratura','checkboxConjungue',$_POST['checkboxConjungue'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strConjungue',$_POST['strConjungue'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strPessoa',$_POST['strPessoa'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strSeloGratuito2',$_POST['strSeloGratuito2'],$id);
UPDATE_CAMPO_ID('notas_lavratura','strJustificativa2',$_POST['strJustificativa2'],$id);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura.php?confn=ok&ok&id='.$id);


}


if (isset($_POST['subimit3'])) {
unset($_POST['subimit3']);


UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCartorio',$_POST['strTextoLavraturaCartorio'],$id);


$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../notas-lavratura?confa=ok&ok&ok&id='.$id);

}


if (isset($_POST['subimit4'])) {
unset($_POST['subimit4']);

UPDATE_CAMPO_ID('notas_lavratura','strTextoLavraturaCliente',$_POST['strTextoLavraturaCliente'],$id);

header('location:../pesquisa-casamento.php?id='.$id);
$_SESSION['sucesso'] = 'FORMULÁRIO CONCLUIDO (Casamento)';

}







 ?>
