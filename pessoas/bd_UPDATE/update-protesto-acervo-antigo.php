<?php
include('../../../controller/db_functions.php');
$pdo = conectar();
session_start();
$id = $_POST['ID'];


		$_POST['data_emisao_titulo_transacao'] = date('dmY', strtotime($_POST['data_emisao_titulo_transacao']));
		$_POST['data_vencimento_titulo_transacao'] = date('dmY', strtotime($_POST['data_vencimento_titulo_transacao']));

		$_POST['data_ciencia'] = date('dmY', strtotime($_POST['data_ciencia']));
		$_POST['data_envio_ar'] = date('dmY', strtotime($_POST['data_envio_ar']));
		$_POST['data_retorno_ar'] = date('dmY', strtotime($_POST['data_retorno_ar']));

		$_POST['data_protocolo_transacao'] = date('dmY', strtotime($_POST['data_protocolo_transacao']));

		$_POST['data_entrega_doctos'] = date('dmY', strtotime($_POST['data_entrega_doctos']));
		$_POST['data_entrega_inst_protesto'] = date('dmY', strtotime($_POST['data_entrega_inst_protesto']));
		$_POST['data_ocorrencia_transacao'] = date('dmY', strtotime($_POST['data_ocorrencia_transacao']));

		$_POST['nome_apresentante_transacao'] = mb_strtoupper($_POST['nome_apresentante_transacao']); 
		$_POST['nome_devedor_transacao'] = mb_strtoupper($_POST['nome_devedor_transacao']); 
		$_POST['nome_cedente_transacao']  = mb_strtoupper($_POST['nome_cedente_transacao']);
		$_POST['nome_avalista_transacao'] = mb_strtoupper($_POST['nome_avalista_transacao']); 
		$_POST['nome_sacador_vendedor_transacao'] = mb_strtoupper($_POST['nome_sacador_vendedor_transacao']); 
		$_POST['demais_sacados_transacao'] = mb_strtoupper($_POST['demais_sacados_transacao']); 
		$_POST['praca_protesto_transacao'] = mb_strtoupper($_POST['praca_protesto_transacao']); 

		if (isset($_POST['codigo_irregularidade_transacao']) && $_POST['codigo_irregularidade_transacao'] !='') {
		$delete_livro_apontamentos = $pdo->prepare("delete from livro_protestos_apontamentos where assento = '$id'");
		$delete_livro_apontamentos->execute();
		UPDATE_CAMPO_ID('protesto_acervo_antigo','status','RECUSADO',$id);
		}


UPDATE_CAMPO_ID('protesto_acervo_antigo','data_protocolo_transacao',$_POST['data_protocolo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','numero_codigo_portador_transacao',$_POST['numero_codigo_portador_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','motivo_titulo',$_POST['motivo_titulo'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','especie_titulo_transacao',$_POST['especie_titulo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','localidade_titulo',$_POST['localidade_titulo'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','cnpj_apresentante_transacao',$_POST['cnpj_apresentante_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','nome_apresentante_transacao',$_POST['nome_apresentante_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','documento_devedor_transacao',$_POST['documento_devedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','nome_devedor_transacao',$_POST['nome_devedor_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','cpf_cedente_transacao',$_POST['cpf_cedente_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','nome_cedente_transacao',$_POST['nome_cedente_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','documento_sacador_transacao',$_POST['documento_sacador_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','nome_sacador_vendedor_transacao',$_POST['nome_sacador_vendedor_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','cpf_avalista_transacao',$_POST['cpf_avalista_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','nome_avalista_transacao',$_POST['nome_avalista_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','demais_sacados_transacao',$_POST['demais_sacados_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','tipo_protesto_transacao',$_POST['tipo_protesto_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','endosso_transacao',$_POST['endosso_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','tipo_titulo_transacao',$_POST['tipo_titulo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','informacoes_sobre_aceite_transacao',$_POST['informacoes_sobre_aceite_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','data_emisao_titulo_transacao',$_POST['data_emisao_titulo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','data_vencimento_titulo_transacao',$_POST['data_vencimento_titulo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','a_vista',$_POST['a_vista'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','numero_dias_transacao',$_POST['numero_dias_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','praca_protesto_transacao',$_POST['praca_protesto_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','numero_titulo_transacao',$_POST['numero_titulo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','saldo_titulo_transacao',$_POST['saldo_titulo_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','valor_titulo_transacao',$_POST['valor_titulo_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','enviar_tramitis_serasa',$_POST['enviar_tramitis_serasa'],$id);	

UPDATE_CAMPO_ID('protesto_acervo_antigo','imprimir_obs_livro',$_POST['imprimir_obs_livro'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','observacoes_transacao',$_POST['observacoes_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','data_ciencia',$_POST['data_ciencia'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','data_envio_ar',$_POST['data_envio_ar'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','data_retorno_ar',$_POST['data_retorno_ar'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','numero_ar',$_POST['numero_ar'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','pessoa_intimada',$_POST['pessoa_intimada'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','justificativa',$_POST['justificativa'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','data_entrega_doctos',$_POST['data_entrega_doctos'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','data_entrega_inst_protesto',$_POST['data_entrega_inst_protesto'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','declaracao_portador_transacao',$_POST['declaracao_portador_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','agencia_cedente',$_POST['agencia_cedente'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','nosso_numero_transacao',$_POST['nosso_numero_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','tipo_ocorrencia_transacao',$_POST['tipo_ocorrencia_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','data_ocorrencia_transacao',$_POST['data_ocorrencia_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','codigo_irregularidade_transacao',$_POST['codigo_irregularidade_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','endereco_apresentante_transacao',$_POST['endereco_apresentante_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','bairro_apresentante_transacao',$_POST['bairro_apresentante_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','cidade_apresentante_transacao',$_POST['cidade_apresentante_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','uf_apresentante_transacao',$_POST['uf_apresentante_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','cep_apresentante_transacao',$_POST['cep_apresentante_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','endereco_devedor_transacao',$_POST['endereco_devedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','bairro_devedor_transacao',$_POST['bairro_devedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','cidade_devedor_transacao',$_POST['cidade_devedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','uf_devedor_transacao',$_POST['uf_devedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','cep_devedor_transacao',$_POST['cep_devedor_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','endereco_cedente_transacao',$_POST['endereco_cedente_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','bairro_cedente_transacao',$_POST['bairro_cedente_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','cidade_cedente_transacao',$_POST['cidade_cedente_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','uf_cedente_transacao',$_POST['uf_cedente_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','cep_cedente_transacao',$_POST['cep_cedente_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','endereco_sacador_vendedor_transacao',$_POST['endereco_sacador_vendedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','bairro_sacador_transacao',$_POST['bairro_sacador_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','cidade_sacador_vendedor_transacao',$_POST['cidade_sacador_vendedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','uf_sacador_vendedor_transacao',$_POST['uf_sacador_vendedor_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','cep_sacador_vendedor_transacao',$_POST['cep_sacador_vendedor_transacao'],$id);

UPDATE_CAMPO_ID('protesto_acervo_antigo','endereco_avalista_transacao',$_POST['endereco_avalista_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','bairro_avalista_transacao',$_POST['bairro_avalista_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','cidade_avalista_transacao',$_POST['cidade_avalista_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','uf_avalista_transacao',$_POST['uf_avalista_transacao'],$id);
UPDATE_CAMPO_ID('protesto_acervo_antigo','cep_avalista_transacao',$_POST['cep_avalista_transacao'],$id);

if (isset($_SESSION['sucesso'])) {
	die($_SESSION['sucesso']);
}
else{
	die($_SESSION['erro']);
}

 ?>
