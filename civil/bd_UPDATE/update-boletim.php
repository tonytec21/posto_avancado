<?php
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];


if (isset($_POST['subimit'])) {
unset($_POST['subimit']);

UPDATE_CAMPO_ID('boletim','intTipoBoletim',$_POST['intTipoBoletim'],$id);
UPDATE_CAMPO_ID('boletim','strSequencia',$_POST['strSequencia'],$id);
UPDATE_CAMPO_ID('boletim','strSequenciaLinha',$_POST['strSequenciaLinha'],$id);
UPDATE_CAMPO_ID('boletim','strCodigoServentia',$_POST['strCodigoServentia'],$id);
UPDATE_CAMPO_ID('boletim','dataInicial',$_POST['dataInicial'],$id);
UPDATE_CAMPO_ID('boletim','dataFinal',$_POST['dataFinal'],$id);
UPDATE_CAMPO_ID('boletim','strNumeroBoleto',$_POST['strNumeroBoleto'],$id);
UPDATE_CAMPO_ID('boletim','dataBoleto',$_POST['dataBoleto'],$id);
UPDATE_CAMPO_ID('boletim','setPago',$_POST['setPago'],$id);
UPDATE_CAMPO_ID('boletim','decValorMontante',$_POST['decValorMontante'],$id);
UPDATE_CAMPO_ID('boletim','setStatus',$_POST['setStatus'],$id);
UPDATE_CAMPO_ID('boletim','setContaContabil',$_POST['setContaContabil'],$id);
UPDATE_CAMPO_ID('boletim','strUsuario',$_POST['strUsuario'],$id);
UPDATE_CAMPO_ID('boletim','strNumeroBoletoFerc',$_POST['strNumeroBoletoFerc'],$id);
UPDATE_CAMPO_ID('boletim','dataBoletoFerc',$_POST['dataBoletoFerc'],$id);
UPDATE_CAMPO_ID('boletim','setSituacaoBoletoFerc',$_POST['setSituacaoBoletoFerc'],$id);
UPDATE_CAMPO_ID('boletim','decMontanteBoletoFerc',$_POST['decMontanteBoletoFerc'],$id);

//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'ALTERADO COM ÊXITO';

}







 ?>
