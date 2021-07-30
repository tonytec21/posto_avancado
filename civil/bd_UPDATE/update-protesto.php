<?php
include('../../../controller/db_functions.php');
$pdo = conectar();
session_start();
$id = $_POST['ID'];


		$_POST['data_emisao_titulo_transacao'] = date('dmY', strtotime($_POST['data_emisao_titulo_transacao']));

		if ($_POST['data_vencimento_titulo_transacao']!='') {
		$_POST['data_vencimento_titulo_transacao'] = date('dmY', strtotime($_POST['data_vencimento_titulo_transacao']));
		}
		if ($_POST['data_ciencia']!='') {
		$_POST['data_ciencia'] = date('dmY', strtotime($_POST['data_ciencia']));
		}
		
		$_POST['data_envio_ar'] = date('dmY', strtotime($_POST['data_envio_ar']));
		$_POST['data_retorno_ar'] = date('dmY', strtotime($_POST['data_retorno_ar']));
		$_POST['data_protocolo_transacao'] = date('dmY', strtotime($_POST['data_protocolo_transacao']));
		$_POST['data_entrega_doctos'] = date('dmY', strtotime($_POST['data_entrega_doctos']));
		$_POST['data_entrega_inst_protesto'] = date('dmY', strtotime($_POST['data_entrega_inst_protesto']));
		if (isset($_POST['data_ocorrencia_transacao']) && !empty($_POST['data_ocorrencia_transacao']) && $_POST['data_ocorrencia_transacao']!='') {		
		$_POST['data_ocorrencia_transacao'] = date('dmY', strtotime($_POST['data_ocorrencia_transacao']));
		UPDATE_CAMPO_ID('protesto_automatico_transacao','data_ocorrencia_transacao',$_POST['data_ocorrencia_transacao'],$id);
		}
		
		$_POST['nome_apresentante_transacao'] = mb_strtoupper($_POST['nome_apresentante_transacao']); 
		$_POST['nome_devedor_transacao'] = mb_strtoupper($_POST['nome_devedor_transacao']); 
		$_POST['nome_cedente_transacao']  = mb_strtoupper($_POST['nome_cedente_transacao']);
		$_POST['nome_avalista_transacao'] = mb_strtoupper($_POST['nome_avalista_transacao']); 
		$_POST['nome_sacador_vendedor_transacao'] = mb_strtoupper($_POST['nome_sacador_vendedor_transacao']); 
		$_POST['demais_sacados_transacao'] = mb_strtoupper($_POST['demais_sacados_transacao']); 
		$_POST['praca_protesto_transacao'] = mb_strtoupper($_POST['praca_protesto_transacao']);


		if (isset($_POST['tipo_ocorrencia_transacao']) && $_POST['tipo_ocorrencia_transacao']!='' && $_POST['tipo_ocorrencia_transacao'] == '1') {
		$_POST['status'] = 'PAGO';
		UPDATE_CAMPO_ID('protesto_automatico_transacao','status',$_POST['status'],$id);
		}
		if (isset($_POST['tipo_ocorrencia_transacao']) && $_POST['tipo_ocorrencia_transacao']!='' && $_POST['tipo_ocorrencia_transacao'] == '2') {
		$_POST['status'] = 'PROTESTADO';
		UPDATE_CAMPO_ID('protesto_automatico_transacao','status',$_POST['status'],$id);
		}
		if (isset($_POST['tipo_ocorrencia_transacao']) && $_POST['tipo_ocorrencia_transacao']!='' && $_POST['tipo_ocorrencia_transacao'] == '3') {
		$_POST['status'] = 'RETIRADO';
		UPDATE_CAMPO_ID('protesto_automatico_transacao','status',$_POST['status'],$id);
		}
		if (isset($_POST['tipo_ocorrencia_transacao']) && $_POST['tipo_ocorrencia_transacao']!='' && $_POST['tipo_ocorrencia_transacao'] == 'A') {
		$_POST['status'] = 'CANCELADO';
		UPDATE_CAMPO_ID('protesto_automatico_transacao','status',$_POST['status'],$id);
		}
		if (isset($_POST['tipo_ocorrencia_transacao']) && $_POST['tipo_ocorrencia_transacao']!='' && $_POST['tipo_ocorrencia_transacao'] == '5') {
		$_POST['status'] = 'RECUSADO';
		UPDATE_CAMPO_ID('protesto_automatico_transacao','status',$_POST['status'],$id);
		}


		if (isset($_POST['codigo_irregularidade_transacao']) && $_POST['codigo_irregularidade_transacao'] !='') {
		$delete_livro_apontamentos = $pdo->prepare("delete from livro_protestos_apontamentos where assento = '$id'");
		$delete_livro_apontamentos->execute();
		UPDATE_CAMPO_ID('protesto_automatico_transacao','status','RECUSADO',$id);
		}

UPDATE_CAMPO_ID('protesto_automatico_transacao','numero_protocolo_cartorio_transacao',$_POST['numero_protocolo_cartorio_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','data_protocolo_transacao',$_POST['data_protocolo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','numero_codigo_portador_transacao',$_POST['numero_codigo_portador_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','motivo_titulo',$_POST['motivo_titulo'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','especie_titulo_transacao',$_POST['especie_titulo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','localidade_titulo',$_POST['localidade_titulo'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','cnpj_apresentante_transacao',$_POST['cnpj_apresentante_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','nome_apresentante_transacao',$_POST['nome_apresentante_transacao'],$id);

#UPDATE_CAMPO_ID('protesto_automatico_transacao','documento_devedor_transacao',$_POST['documento_devedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','nome_devedor_transacao',$_POST['nome_devedor_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','cpf_cedente_transacao',$_POST['cpf_cedente_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','nome_cedente_transacao',$_POST['nome_cedente_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','documento_sacador_transacao',$_POST['documento_sacador_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','nome_sacador_vendedor_transacao',$_POST['nome_sacador_vendedor_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','cpf_avalista_transacao',$_POST['cpf_avalista_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','nome_avalista_transacao',$_POST['nome_avalista_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','demais_sacados_transacao',$_POST['demais_sacados_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','tipo_protesto_transacao',$_POST['tipo_protesto_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','endosso_transacao',$_POST['endosso_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','tipo_titulo_transacao',$_POST['tipo_titulo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','informacoes_sobre_aceite_transacao',$_POST['informacoes_sobre_aceite_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','data_emisao_titulo_transacao',$_POST['data_emisao_titulo_transacao'],$id);
#UPDATE_CAMPO_ID('protesto_automatico_transacao','data_vencimento_titulo_transacao',$_POST['data_vencimento_titulo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','a_vista',$_POST['a_vista'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','numero_dias_transacao',$_POST['numero_dias_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','praca_protesto_transacao',$_POST['praca_protesto_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','numero_titulo_transacao',$_POST['numero_titulo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','saldo_titulo_transacao',$_POST['saldo_titulo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','valor_titulo_transacao',$_POST['valor_titulo_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','valor_custas_cartorio_transacao',str_replace(".", "", $_POST['valor_custas_cartorio_transacao']),$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','valor_demais_despesas_transacao',str_replace(".", "", $_POST['valor_gravacao_eletronica_transacao']),$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','enviar_tramitis_serasa',$_POST['enviar_tramitis_serasa'],$id);	

UPDATE_CAMPO_ID('protesto_automatico_transacao','imprimir_obs_livro',$_POST['imprimir_obs_livro'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','observacoes_transacao',$_POST['observacoes_transacao'],$id);
#UPDATE_CAMPO_ID('protesto_automatico_transacao','data_ciencia',$_POST['data_ciencia'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','data_envio_ar',$_POST['data_envio_ar'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','data_retorno_ar',$_POST['data_retorno_ar'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','numero_ar',$_POST['numero_ar'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','pessoa_intimada',$_POST['pessoa_intimada'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','justificativa',$_POST['justificativa'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','data_entrega_doctos',$_POST['data_entrega_doctos'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','data_entrega_inst_protesto',$_POST['data_entrega_inst_protesto'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','declaracao_portador_transacao',$_POST['declaracao_portador_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','agencia_cedente',$_POST['agencia_cedente'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','nosso_numero_transacao',$_POST['nosso_numero_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','tipo_ocorrencia_transacao',$_POST['tipo_ocorrencia_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','codigo_irregularidade_transacao',$_POST['codigo_irregularidade_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','endereco_apresentante_transacao',$_POST['endereco_apresentante_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','bairro_apresentante_transacao',$_POST['bairro_apresentante_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','cidade_apresentante_transacao',$_POST['cidade_apresentante_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','uf_apresentante_transacao',$_POST['uf_apresentante_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','cep_apresentante_transacao',$_POST['cep_apresentante_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','endereco_devedor_transacao',$_POST['endereco_devedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','bairro_devedor_transacao',$_POST['bairro_devedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','cidade_devedor_transacao',$_POST['cidade_devedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','uf_devedor_transacao',$_POST['uf_devedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','cep_devedor_transacao',$_POST['cep_devedor_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','endereco_cedente_transacao',$_POST['endereco_cedente_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','bairro_cedente_transacao',$_POST['bairro_cedente_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','cidade_cedente_transacao',$_POST['cidade_cedente_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','uf_cedente_transacao',$_POST['uf_cedente_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','cep_cedente_transacao',$_POST['cep_cedente_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','endereco_sacador_vendedor_transacao',$_POST['endereco_sacador_vendedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','bairro_sacador_transacao',$_POST['bairro_sacador_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','cidade_sacador_vendedor_transacao',$_POST['cidade_sacador_vendedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','uf_sacador_vendedor_transacao',$_POST['uf_sacador_vendedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','cep_sacador_vendedor_transacao',$_POST['cep_sacador_vendedor_transacao'],$id);

UPDATE_CAMPO_ID('protesto_automatico_transacao','endereco_avalista_transacao',$_POST['endereco_avalista_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','bairro_avalista_transacao',$_POST['bairro_avalista_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','cidade_avalista_transacao',$_POST['cidade_avalista_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','uf_avalista_transacao',$_POST['uf_avalista_transacao'],$id);
UPDATE_CAMPO_ID('protesto_automatico_transacao','cep_avalista_transacao',$_POST['cep_avalista_transacao'],$id);

if (isset($_SESSION['sucesso'])) {
	die($_SESSION['sucesso']);
}
else{
	die($_SESSION['erro']);
}

 ?>
