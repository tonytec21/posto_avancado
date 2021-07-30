<?php 
include('../../../controller/db_functions.php');
$pdo = conectar();
session_start();
  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

$pesquisa_cidade_serventia = PESQUISA_ALL_ID('cadastroserventia',1);
foreach ($pesquisa_cidade_serventia as $cidserv) {
$c = PESQUISA_ALL_ID('uf_cidade',$cidserv->intUFcidade); foreach ($c as $c) {
$cidade_aqui = strtoupper($c->cidade);
$cidade_aqui = tirarAcentos($cidade_aqui);
}
}

$_SESSION['error_log'] ='';
$line = 0;
$nome_do_arquivo = $_SESSION['arquivo_remessa'];
$nome_do_arquivo= str_replace("../remessas/", "", $nome_do_arquivo);

#buscando pra ver se esse arquivo ja foi colocado no sistema:
$teste_repetido_busca = date('Y').$nome_do_arquivo;
echo $teste_repetido_busca;

$busca_repetido_arquivo = $pdo->prepare("SELECT * FROM protesto_automatico_header where id_arquivo = '$teste_repetido_busca'");
$busca_repetido_arquivo->execute();
if ($busca_repetido_arquivo->rowCount()>0) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['erro'] = "ERRO! ARQUIVO JA FOI IMPORTADO ANTERIORMENTE!";
unset($_SESSION['arquivo_remessa']);
break;
}


if (strlen($nome_do_arquivo)>12) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['erro'] = "NOME DO ARQUIVO NÃO ESTÁ NO PADRÃO CRA";
break;
}

elseif (substr($nome_do_arquivo, 0,1) != 'B' && substr($nome_do_arquivo, 0,1) != 'b' ) {
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['erro'] = "ERRO! ARQUIVOS DE REMESSA TEM A INICIAL COM LETRA 'B', O ARQUIVO INPORTADO NÃO É UM ARQUIVO DE REMESSA";
unset($_SESSION['arquivo_remessa']);
break;
}


$arquivo = fopen($_SESSION['arquivo_remessa'], 'r');
while(!feof($arquivo)){

	#---------------------------------------- ARQUIVO REMESSA REGISTRO HEADER ------------------------------------------------------------
		$leitor = fgets($arquivo,1000);
		$id_registro = substr($leitor, 0,1); 
				if ($id_registro == 0 && $id_registro !='') {
				 $numero_codigo_portador_header = substr($leitor, 1,3);
				 $nome_portador_header = substr($leitor, 4,40);
				 #consultando pra ver se o portador está no sistema;
				 $busca_portador_autom = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$numero_codigo_portador_header'");
				 $busca_portador_autom->execute();
				 if ($busca_portador_autom->rowCount() == 0) {
				 	#cadastrando o portador automaticamente:
				 	$in_portador = $pdo->prepare("INSERT INTO `bookc`.`portador_automatizado` (`codigo`, `nome`,`cod_apontamento_eletronico`,`pagamento_diferido`) VALUES ('$numero_codigo_portador_header', '$nome_portador_header','01','sim');");
				 	$in_portador->execute();
				 	$_SESSION['aviso'] = 'UM NOVO APRESENTANTE FOI IDENTIFICADO, POR FAVOR ACESSE SEUS DADOS PARA COMPLETAR O CADASTRO';
				 }
				 $id = date('Y').$nome_do_arquivo;
				 $data_movimento_header =  ltrim(substr($leitor, 44,8));
				 $identificacao_transacao_remetente_header = substr($leitor, 52,3);     
				 $identificacao_transacao_destinatario_header = substr($leitor, 55,3);
				 $identificacao_transacao_tipo_header = substr($leitor, 58,3);
				 $numero_sequencial_remessa_header = substr($leitor, 61,6);
				 $quantidade_registros_remessa_header = substr($leitor, 67,4); 
				 $quantidade_titulos_remessa_header = substr($leitor, 71,4);
				 $quantidade_indicacoes_remessa_header = substr($leitor, 75,4); 
				 $quantidade_originais_remessa_header = substr($leitor, 79,4);  
				 $identificacao_agencia_centralizadora_header = substr($leitor, 83,6);
				 $versao_layout_header = substr($leitor, 89,3); 
				 $codigo_municipio_praca_pagamento_header = substr($leitor, 92,7);
				 $complemento_registro_header = substr($leitor, 99,497);
				 $numero_sequencial_arquivo_header = substr($leitor, 596,4);
				 $in_header = $pdo->prepare("INSERT INTO protesto_automatico_header 
				 	values(NULL, 
				 '$numero_codigo_portador_header',
				 '$nome_portador_header',
				 '$data_movimento_header',
				 '$identificacao_transacao_remetente_header',
				 '$identificacao_transacao_destinatario_header',
				 '$identificacao_transacao_tipo_header',
				 '$numero_sequencial_remessa_header ',
				 '$quantidade_registros_remessa_header',
				 '$quantidade_titulos_remessa_header',
				 '$quantidade_indicacoes_remessa_header',
				 '$quantidade_originais_remessa_header',
				 '$identificacao_agencia_centralizadora_header',
				 '$versao_layout_header',
				 '$codigo_municipio_praca_pagamento_header',
				 '$complemento_registro_header',
				 '$numero_sequencial_arquivo_header',
				 '$id'


				)");
				 $in_header->execute();
				 
			}	
	#---------------------------------------- ARQUIVO REMESSA REGISTRO TRANSAÇÃO -----------------------------------------------------------

				
				
				if ($id_registro == 1 && $id_registro !='') {
				
				 $numero_codigo_portador_transacao = substr($leitor,1,3);
				 $agencia_codigo_beneficiario_transacao = substr($leitor,4,15);
				 $nome_beneficiario_favorecido_transacao = substr($leitor,19,45);
				 $nome_sacador_vendedor_transacao = substr($leitor,64,45);
				 $documento_sacador_transacao = substr($leitor,109,14);
				 $endereco_sacador_vendedor_transacao = substr($leitor,123,45);
				 $cep_sacador_vendedor_transacao = substr($leitor,168,8);
				 $cidade_sacador_vendedor_transacao = substr($leitor,176,20);
				 $uf_sacador_vendedor_transacao = substr($leitor,196,2);
				 $nosso_numero_transacao = substr($leitor,198,15);
				 $especie_titulo_transacao = substr($leitor,213,3);
				 $numero_titulo_transacao = substr($leitor,216,11);
				 $data_emisao_titulo_transacao = substr($leitor,227,8);
				 $data_vencimento_titulo_transacao = substr($leitor,235,8);
				 $tipo_moeda_transacao = substr($leitor,243,3);
				 $valor_titulo_transacao = substr($leitor,246,14)/100;
				 $saldo_titulo_transacao = substr($leitor,260,14)/100;
				 $praca_protesto_transacao = substr($leitor,274,20);
				 $tipo_endosso_transacao = substr($leitor,294,1);
				 $informacoes_sobre_aceite_transacao = substr($leitor,295,1);
				 $numero_controle_devedor_transacao = substr($leitor,296,1);
				 $nome_devedor_transacao = substr($leitor,297,45);
				 $tipo_identificacao_devedor_transacao = substr($leitor,342,3);
				 $numero_identificacao_devedor_transacao = substr($leitor,345,14);
				 $documento_devedor_transacao = substr($leitor,359,11);
				 $endereco_devedor_transacao = substr($leitor,370,45);
				 $cep_devedor_transacao = substr($leitor,415,8);
				 $cidade_devedor_transacao = substr($leitor,423,20);
				 $uf_devedor_transacao = substr($leitor,443,2);
				 $codigo_cartorio_transacao = substr($leitor,445,2);
				 $numero_protocolo_cartorio_transacao = substr($leitor,447,10);
				 $tipo_ocorrencia_transacao = substr($leitor,457,1);
				 $data_protocolo_transacao = date('dmY');#substr($leitor,458,8);
				 $valor_custas_cartorio_transacao = substr($leitor,465,10);
				 $declaracao_portador_transacao = substr($leitor,476,1);
				 $data_ocorrencia_transacao = substr($leitor,478,8);
				 $codigo_irregularidade_transacao = ltrim(substr($leitor,485,2));
				 $bairro_devedor_transacao = substr($leitor,487,20);
				 $valor_custas_cartorio_distribuidor_transacao = substr($leitor,507,10);
				 $registro_distribuicao_transacao = substr($leitor,517,6);
				 $valor_gravacao_eletronica_transacao = substr($leitor,523,10);
				 $numero_operacao_banco_transacao = substr($leitor,533,5);
				 $numero_contrato_banco_transacao = substr($leitor,538,15);
				 $numero_parcela_contrato_transacao = substr($leitor,553,3);
				 $tipo_letra_cambio_transacao = substr($leitor,556,1);
				 $complemento_codigo_irregularidade_transacao = substr($leitor,557,8);
				 $protesto_motivo_falencia_transacao = substr($leitor,565,1);
				 $instrumento_protesto_transacao = substr($leitor,566,1);
				 $valor_demais_despesas_transacao = substr($leitor,567,10);
				 $custas_dda_transacao = substr($leitor,577,10);
				 $data_limite_pagamento_transacao = substr($leitor,587,8);
				 $cnpj_apresentante_transacao = substr($leitor,595,14);
				 $endosso_transacao = substr($leitor,609,1);
				 $tipo_documento_transacao = substr($leitor,610,1);
				 $documento_beneficiario_transacao = substr($leitor,611,14);
				 $endereco_beneficiario_transacao = substr($leitor,625,45);
				 $bairro_beneficiario_transacao = substr($leitor,670,20);
				 $cep_beneficiario_transacao = substr($leitor,690,8);
				 $cidade_beneficiario_transacao = substr($leitor,698,20);
				 $uf_beneficiario_transacao = substr($leitor,718,2);
				 $numero_nota_fiscal_transacao = substr($leitor,720,15);
				 $codigo_cartorio_notas_transacao = substr($leitor,735,3);
				 $valor_custas_reconhecimento_firma_transacao = substr($leitor,738,10);
				 $tarja_cheque_01_transacao = substr($leitor,748,8);
				 $tarja_cheque_02_transacao = substr($leitor,756,10);
				 $tarja_cheque_03_transacao = substr($leitor,766,12);
				 $agencia_operadora_transacao = substr($leitor,778,5);
				 $complemento_registro_transacao = substr($leitor,783,213);
				 $numero_sequencial_registro_arquivo_transacao = substr($leitor,596,4);
				 $nome_arquivo_remessa = $_SESSION['arquivo_remessa'];

				 	/*
					if ($cidade_aqui!=rtrim($praca_protesto_transacao)) {
					$status = 'RECUSADO';
					$_SESSION['error_log'] .= $line.': Cod. 15 O TITULO '. $numero_titulo_transacao. ' NÃO FOI PROCESSADO, A PRAÇA DE PAGAMENTO NÃO É A CIDADE DE '.$cidade_aqui .'<br>';
					$line++;
					}
					else{
					$status = 'ACEITO';
					}
					*/	
					$status = 'ACEITO';


				 $in_transacao = $pdo->prepare("INSERT INTO protesto_automatico_transacao values(

				 	NULL,
					'$numero_codigo_portador_transacao',
					'$agencia_codigo_beneficiario_transacao',
					'$nome_beneficiario_favorecido_transacao',
					'$nome_sacador_vendedor_transacao',
					'$documento_sacador_transacao',
					'$endereco_sacador_vendedor_transacao',
					'$cep_sacador_vendedor_transacao',
					'$cidade_sacador_vendedor_transacao',
					'$uf_sacador_vendedor_transacao',
					'$nosso_numero_transacao',
					'$especie_titulo_transacao',
					'$numero_titulo_transacao',
					'$data_emisao_titulo_transacao',
					'$data_vencimento_titulo_transacao',
					'$tipo_moeda_transacao',	
					'$valor_titulo_transacao',
					'$saldo_titulo_transacao',
					'$praca_protesto_transacao',
					'$tipo_endosso_transacao',
					'$informacoes_sobre_aceite_transacao',
					'$numero_controle_devedor_transacao',
					'$nome_devedor_transacao',
					'$tipo_identificacao_devedor_transacao',
					'$numero_identificacao_devedor_transacao',
					'$documento_devedor_transacao',
					'$endereco_devedor_transacao',
					'$cep_devedor_transacao',
					'$cidade_devedor_transacao', 
					'$uf_devedor_transacao',
					'$codigo_cartorio_transacao',
					'$numero_protocolo_cartorio_transacao',
					'$tipo_ocorrencia_transacao',
					'$data_protocolo_transacao',
					'$valor_custas_cartorio_transacao',
					'$declaracao_portador_transacao',
					'$data_ocorrencia_transacao',
					'$codigo_irregularidade_transacao',
					'$bairro_devedor_transacao',
					'$valor_custas_cartorio_distribuidor_transacao',
					'$registro_distribuicao_transacao',
					'$valor_gravacao_eletronica_transacao',
					'$numero_operacao_banco_transacao',
					'$numero_contrato_banco_transacao',
					'$numero_parcela_contrato_transacao',
					'$tipo_letra_cambio_transacao',
					'$complemento_codigo_irregularidade_transacao',
					'$protesto_motivo_falencia_transacao',
					'$instrumento_protesto_transacao',
					'$valor_demais_despesas_transacao',
					'$custas_dda_transacao',
					'$data_limite_pagamento_transacao',
					'$endosso_transacao',
					'$tipo_documento_transacao',
					'$documento_beneficiario_transacao',
					'$endereco_beneficiario_transacao',
					'$bairro_beneficiario_transacao',
					'$cep_beneficiario_transacao',
					'$cidade_beneficiario_transacao',
					'$uf_beneficiario_transacao',
					'$numero_nota_fiscal_transacao',
					'$codigo_cartorio_notas_transacao',
					'$valor_custas_reconhecimento_firma_transacao',
					'$tarja_cheque_01_transacao',
					'$tarja_cheque_02_transacao',
					'$tarja_cheque_03_transacao',
					'$agencia_operadora_transacao',
					'$complemento_registro_transacao',
					'$numero_sequencial_registro_arquivo_transacao',
					'$id ',
					'$nome_arquivo_remessa',
					'$status',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'A',
					'$cnpj_apresentante_transacao',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					'',
					''

				 
				 


					)");
				 	$in_transacao->execute();
				
				  }	 
			
	#---------------------------------------- ARQUIVO REMESSA REGISTRO TRAILER -----------------------------------------------------------				
				
			
				 if ($id_registro == 9 && $id_registro !='') {
				 
				 
				 $numero_codigo_portador_trailer = substr($leitor,1,3);
				 $nome_portador_trailer = substr($leitor,4,40);
				 $data_movimento_trailer = substr($leitor,44,8);
				 $somatorio_seguranca_quantidade_trailer = substr($leitor,52,5);
				 $somatorio_seguranca_valor_trailer = substr($leitor,57,18);
				 $complemento_registro_trailer = substr($leitor,75,521);
				 $numero_sequencial_registro_arquivo_trailer = substr($leitor,596,4);

				 $in_trailer = $pdo->prepare("INSERT INTO protesto_automatico_trailer values(
				 	NULL,
					'$numero_codigo_portador_trailer',
					'$nome_portador_trailer',
					'$data_movimento_trailer',
					'$somatorio_seguranca_quantidade_trailer',
					'$somatorio_seguranca_valor_trailer',
					'$complemento_registro_trailer',
					'$numero_sequencial_registro_arquivo_trailer',
					'$id '



					)");
				 $in_trailer->execute();
				 $id = $id; 
				 }


				}	

					 
fclose($arquivo); # FECHADO O ARQUIVO
header('location:../leitura-protesto-auto.php?id='.$id);
unset($_SESSION['sucesso']);
unset($_SESSION['arquivo_remessa']);

 ?>