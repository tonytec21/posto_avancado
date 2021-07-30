<?php
include('../../../controller/db_functions.php');

session_start();
$id = $_GET['id'];


if (isset($_POST['subimit'])) {
unset($_POST['subimit']);

UPDATE_CAMPO_ID('imoveis_registro','intTipoRegistroImovel',$_POST['intTipoRegistroImovel'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strMatricula',$_POST['strMatricula'],$id);
UPDATE_CAMPO_ID('imoveis_registro','dataMatricula',$_POST['dataMatricula'],$id);
UPDATE_CAMPO_ID('imoveis_registro','setTipoImovel',$_POST['setTipoImovel'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strCCIRMunicipal',$_POST['strCCIRMunicipal'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strDescricao',$_POST['strDescricao'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strArea',$_POST['strArea'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strEndereco',$_POST['strEndereco'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strLoteamento',$_POST['strLoteamento'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strLote',$_POST['strLote'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strCidade',$_POST['strCidade'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strDadosImovel',$_POST['strDadosImovel'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strNumOrdem',$_POST['strNumOrdem'],$id);
UPDATE_CAMPO_ID('imoveis_registro','dataEmissao',$_POST['dataEmissao'],$id);
UPDATE_CAMPO_ID('imoveis_registro','dataVencimento',$_POST['dataVencimento'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strNumCedula',$_POST['strNumCedula'],$id);
UPDATE_CAMPO_ID('imoveis_registro','decValorCedula',$_POST['decValorCedula'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strTitulos',$_POST['strTitulos'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strCredor',$_POST['strCredor'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strDevedor',$_POST['strDevedor'],$id);
UPDATE_CAMPO_ID('imoveis_registro','strDadosRegistro',$_POST['strDadosRegistro'],$id);

//header('location:pesquisa-tdpj-selo.php');
//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
//$_SESSION['sucesso'] = 'FORMULÁRIO ATUALIZADO (REGISTRO DE IMOVEL)';

}







 ?>
