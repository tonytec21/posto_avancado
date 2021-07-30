<?php
include('../../controller/db_functions.php');
session_start();
$id = $_GET['id'];


if (isset($_POST['subimit'])) {
unset($_POST['subimit']);


UPDATE_CAMPO_ID('serventia','cns',$_POST['cns'],$id);
UPDATE_CAMPO_ID('serventia','cnpj',$_POST['cnpj'],$id);
UPDATE_CAMPO_ID('serventia','razaoSocial',$_POST['razaoSocial'],$id);
UPDATE_CAMPO_ID('serventia','titularServentia',$_POST['titularServentia'],$id);
UPDATE_CAMPO_ID('serventia','titularCpf',$_POST['titularCpf'],$id);
UPDATE_CAMPO_ID('serventia','numProtocolo',$_POST['numProtocolo'],$id);
UPDATE_CAMPO_ID('serventia','telefone1',$_POST['telefone1'],$id);
UPDATE_CAMPO_ID('serventia','telefone2',$_POST['telefone2'],$id);
UPDATE_CAMPO_ID('serventia','segmentoServentia',$_POST['segmentoServentia'],$id);
UPDATE_CAMPO_ID('serventia','logradouro',$_POST['logradouro'],$id);
UPDATE_CAMPO_ID('serventia','ufCidadeid',$_POST['ufCidadeid'],$id);
UPDATE_CAMPO_ID('serventia','numero',$_POST['numero'],$id);
UPDATE_CAMPO_ID('serventia','bairro',$_POST['bairro'],$id);
UPDATE_CAMPO_ID('serventia','cep',$_POST['cep'],$id);
UPDATE_CAMPO_ID('serventia','valorISSQN',$_POST['valorISSQN'],$id);
UPDATE_CAMPO_ID('serventia','taxaISSQN',$_POST['taxaISSQN'],$id);
UPDATE_CAMPO_ID('serventia','valorInformacoesCentrais',$_POST['valorInformacoesCentrais'],$id);
UPDATE_CAMPO_ID('serventia','taxaInformacoesCentrais',$_POST['taxaInformacoesCentrais'],$id);
UPDATE_CAMPO_ID('serventia','hash',$_POST['hash'],$id);
UPDATE_CAMPO_ID('serventia','dataCadastro',$_POST['dataCadastro'],$id);
UPDATE_CAMPO_ID('serventia','anoVigencia',$_POST['anoVigencia'],$id);
UPDATE_CAMPO_ID('serventia','atoEscritura',$_POST['atoEscritura'],$id);
UPDATE_CAMPO_ID('serventia','atoProcuracao',$_POST['atoProcuracao'],$id);

//header('location:pesquisa-tdpj-selo.php');
//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'FORMULÁRIO ATUALIZADO (TDPJ SELO)';

}







 ?>
