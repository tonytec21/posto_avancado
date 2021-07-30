<?php
session_start();
include('../../../controller/db_functions.php');
$pdo = conectar();

if (isset($_POST['subimit'])) {
	unset($_POST['subimit']);
	
$NUMEROTITULO = $_POST['numero_titulo_transacao'];	
$busca = $pdo->prepare("SELECT * FROM protesto_acervo_antigo where ID =".$_POST['ID']);
$busca->execute();
if($busca->rowCount()!=0){
	die('NÃO SERÁ POSSIVEL, POIS O TÍTULO JÁ FOI APONTADO');
}
else{

	if (isset($_POST['tipo_ocorrencia_transacao']) && $_POST['tipo_ocorrencia_transacao']!='' && $_POST['tipo_ocorrencia_transacao'] == '1') {
	$_POST['status'] = 'PAGO';
	}
	elseif (isset($_POST['tipo_ocorrencia_transacao']) && $_POST['tipo_ocorrencia_transacao']!='' && $_POST['tipo_ocorrencia_transacao'] == '2') {
	$_POST['status'] = 'PROTESTADO';
	}
	elseif (isset($_POST['tipo_ocorrencia_transacao']) && $_POST['tipo_ocorrencia_transacao']!='' && $_POST['tipo_ocorrencia_transacao'] == '3') {
	$_POST['status'] = 'RETIRADO';
	}
	elseif (isset($_POST['tipo_ocorrencia_transacao']) && $_POST['tipo_ocorrencia_transacao']!='' && $_POST['tipo_ocorrencia_transacao'] == '4') {
	$_POST['status'] = 'CANCELADO';
	}
	elseif (isset($_POST['tipo_ocorrencia_transacao']) && $_POST['tipo_ocorrencia_transacao']!='' && $_POST['tipo_ocorrencia_transacao'] == '5') {
	$_POST['status'] = 'RECUSADO';
	}
	else{
	$_POST['status'] = 'APONTADO';
	}

	$_POST['ID'] = $_POST['ID'];
	$_POST['tipo_entrada'] = 'M';
	$_POST['data_emisao_titulo_transacao'] = date('dmY', strtotime($_POST['data_emisao_titulo_transacao']));
	$_POST['data_vencimento_titulo_transacao'] = date('dmY', strtotime($_POST['data_vencimento_titulo_transacao']));
	$_POST['valor_titulo_transacao'] = $_POST['valor_titulo_transacao']; 
	$_POST['data_ciencia'] = date('dmY', strtotime($_POST['data_ciencia']));
	$_POST['data_envio_ar'] = date('dmY', strtotime($_POST['data_envio_ar']));
	$_POST['data_retorno_ar'] = date('dmY', strtotime($_POST['data_retorno_ar']));

	$_POST['nome_apresentante_transacao'] = mb_strtoupper($_POST['nome_apresentante_transacao']); 
	$_POST['nome_devedor_transacao'] = mb_strtoupper($_POST['nome_devedor_transacao']); 
	$_POST['nome_cedente_transacao']  = mb_strtoupper($_POST['nome_cedente_transacao']);
	$_POST['nome_avalista_transacao'] = mb_strtoupper($_POST['nome_avalista_transacao']); 
	$_POST['nome_sacador_vendedor_transacao'] = mb_strtoupper($_POST['nome_sacador_vendedor_transacao']); 
	$_POST['demais_sacados_transacao'] = mb_strtoupper($_POST['demais_sacados_transacao']); 
	$_POST['praca_protesto_transacao'] = mb_strtoupper($_POST['praca_protesto_transacao']); 

	$_POST['data_entrega_doctos'] = date('dmY', strtotime($_POST['data_entrega_doctos']));
	$_POST['data_entrega_inst_protesto'] = date('dmY', strtotime($_POST['data_entrega_inst_protesto']));
	$_POST['data_ocorrencia_transacao'] = date('dmY', strtotime($_POST['data_ocorrencia_transacao']));

	if (isset($_POST['data_protocolo_transacao'])) {
		$_POST['data_protocolo_transacao'] = date('dmY', strtotime($_POST['data_protocolo_transacao']));
	}
	else{
	$_POST['data_protocolo_transacao'] = date('dmY');
	}

		

	INSERT_POST('protesto_acervo_antigo', $_POST);
	die('TITULO APONTADO COM SUCESSO');
	
	}

}












 ?>
