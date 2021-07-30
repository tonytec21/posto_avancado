
<!DOCTYPE html>
<head>
<style type=text/css>
.cp {  font: bold 10px Arial; color: black}
.ti {  font: 9px Arial, Helvetica, sans-serif}
.ld { font: bold 15px Arial; color: #000000}
.ct { FONT: 9px "Arial Narrow"; COLOR: #000033} 
.cn { FONT: 9px Arial; COLOR: black }
.bc { font: bold 20px Arial; color: #000000 }
.ld2 { font: bold 12px Arial; color: #000000 }
body{zoom:90%;}
--></style> 
</head>
<?php include_once('../../../controller/db_functions.php');
$pdo = conectar();
$id = explode("-", $_GET['id']);
include("../plugins/boletophp/include/funcoes_cef.php");


?>


<?php
for ($i=0; $i <count($id) ; $i++) :
if (isset($id[$i])) {
$id_unic = $id[$i];
}

$busca_matricula = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE ID = '$id_unic' ");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);

?>
<br>

<?php   foreach($linhas as $b):?>

		<?php
		$busca_valores = $pdo->prepare("SELECT * FROM protesto_dados_essenciais where ID = 1");
		$busca_valores->execute();
		$bv = $busca_valores->fetch(PDO::FETCH_ASSOC);

		$taxa_boleto = $bv['valor_taxa_boleto'] ; //dados essenciais
		$dias_de_prazo_para_pagamento = "3";

		$dataprotdia =  substr($b->data_protocolo_transacao,0,2);
		$dataprotmes =  substr($b->data_protocolo_transacao,2,2);
		$dataprotano =  substr($b->data_protocolo_transacao,4,4);
		$dataprot = $dataprotano.'-'.$dataprotmes.'-'.$dataprotdia;
		$vencimento =  date('Y-m-d', strtotime($dataprot.'+3days'));

		$data_venc =  date('d/m/Y', strtotime($vencimento)); // Prazo de X dias OU informe data: "13/04/2006";

		$soma_emols = $bv['valor_pagamento'] + $bv['valor_intimacao']+$bv['valor_conducao']+$bv['valor_arquivamento'] +$bv['valor_certidao']+$b->valor_titulo_transacao; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
		$valor_cobrado = $soma_emols;
		$valor_cobrado = str_replace(",", ".",$valor_cobrado);
		$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');
		$dadosboleto["inicio_nosso_numero"] = "24";  // 24 - Padrão da Caixa Economica Federal
		$dadosboleto["nosso_numero"] = $b->nosso_numero_transacao;
		$dadosboleto["numero_documento"] = '1';	// Num do pedido ou do documento
		$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
		$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
		$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
		$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula
		// DADOS DO SEU CLIENTE
		$dadosboleto["sacado"] = $b->nome_devedor_transacao;
		$dadosboleto["endereco1"] = $b->endereco_devedor_transacao." ".$b->cep_devedor_transacao." ".$b->cidade_devedor_transacao." ".$b->uf_devedor_transacao ;
		$dadosboleto["endereco2"] = $b->endereco_devedor_transacao." ".$b->cep_devedor_transacao." ".$b->cidade_devedor_transacao." ".$b->uf_devedor_transacao ;
		// INFORMACOES PARA O CLIENTE
		$dadosboleto["demonstrativo1"] = "Pagamento Referete ao Título:".$b->numero_titulo_transacao;
		$dadosboleto["demonstrativo2"] = "Taxa bancária - R$ ".number_format($taxa_boleto, 2, ',', '');
		$dadosboleto["demonstrativo3"] = "Boleto";
		// INSTRUÇÕES PARA O CAIXA
		$dadosboleto["instrucoes1"] = $bv['instrucao_caixa_boleto_1'];
		$dadosboleto["instrucoes2"] = $bv['instrucao_caixa_boleto_2'];
		$dadosboleto["instrucoes3"] = $bv['instrucao_caixa_boleto_3'];
		$dadosboleto["instrucoes4"] = $bv['instrucao_caixa_boleto_4'];
		// DADOS OPCIONAIS DE ACORDO COM O BANCO OU CLIENTE
		$dadosboleto["quantidade"] = "1";
		$dadosboleto["valor_unitario"] = "1";
		$dadosboleto["aceite"] = "N";
		$dadosboleto["especie"] = "R$";
		$dadosboleto["especie_doc"] = "DM";
		// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //
		// DADOS DA SUA CONTA - BANCO DO BRASIL
		$dadosboleto["agencia"] = $bv['agencia_boleto']; // Num da agencia, sem digito
		$dadosboleto["agencia_dv"] = $bv['dv_agencia_boleto']; // Digito do Num da agencia
		$dadosboleto["conta_dv"] = $bv['digito_conta_boleto']; 	// Digito do Num da conta
		$dadosboleto["conta"] = $bv['conta_boleto']; 	// Num da conta, sem digito
		// DADOS PERSONALIZADOS - Bradesco
		$dadosboleto["conta_cedente"] = $bv['conta_boleto']; // ContaCedente do Cliente, sem digito (Somente Números)
		$dadosboleto["conta_cedente_dv"] = $bv['digito_conta_boleto']; // Digito da ContaCedente do Cliente
		$dadosboleto["carteira"] = $bv['carteira_boleto'];  // Código da Carteira: pode ser 06 ou 03
		// TIPO DO BOLETO
		$dadosboleto["formatacao_convenio"] = strlen($bv['convenio']); // REGRA: 8 p/ Convênio c/ 8 dígitos, 7 p/ Convênio c/ 7 dígitos, ou 6 se Convênio c/ 6 dígitos
		$dadosboleto["formatacao_nosso_numero"] = "2"; // REGRA: Usado apenas p/ Convênio c/ 6 dígitos: informe 1 se for NossoNúmero de até 5 dígitos ou 2 para opção de até 17 dígitos
		/*
		#################################################
		DESENVOLVIDO PARA CARTEIRA 18
		- Carteira 18 com Convenio de 8 digitos
		  Nosso número: pode ser até 9 dígitos
		- Carteira 18 com Convenio de 7 digitos
		  Nosso número: pode ser até 10 dígitos
		- Carteira 18 com Convenio de 6 digitos
		  Nosso número:
		  de 1 a 99999 para opção de até 5 dígitos
		  de 1 a 99999999999999999 para opção de até 17 dígitos
		#################################################
		*/
		// SEUS DADOS
		$dadosboleto["identificacao"] = "";
		$dadosboleto["cpf_cnpj"] = "";


		$serv = PESQUISA_ALL_ID('cadastroserventia',1);
		foreach($serv as $s){
			$endereco_serventia = $s->strLogradouro.' Nº '.$s->strNumero.' - '.$s->strBairro.' CEP: '.$s->strCEP;

		$dadosboleto["endereco"] = $endereco_serventia;
		 $u = PESQUISA_ALL_ID('uf_cidade',$s->intUFcidade); foreach($u as $u) {

		$dadosboleto["cidade_uf"] = $u->cidade;
		$dadosboleto["cedente"] = $u->uf;
		// NÃO ALTERAR!
		 }
		}
		$codigobanco = "104";
$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
$nummoeda = "9";
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

//valor tem 10 digitos, sem virgula
$valor = formata_numero($dadosboleto["valor_boleto"],10,0,"valor");
//agencia é 4 digitos
$agencia = formata_numero($dadosboleto["agencia"],4,0);
//conta é 5 digitos
$conta = formata_numero($dadosboleto["conta"],5,0);
//dv da conta
$conta_dv = formata_numero($dadosboleto["conta_dv"],1,0);
//carteira é 2 caracteres
$carteira = $dadosboleto["carteira"];

//conta cedente (sem dv) com 6 digitos
$conta_cedente = formata_numero($dadosboleto["conta_cedente"],6,0);
//dv da conta cedente
$conta_cedente_dv = modulo_10($conta_cedente);

//nosso número (sem dv) é 17 digitos
$nossonumero = $dadosboleto["inicio_nosso_numero"] . formata_numero($dadosboleto["nosso_numero"],15,0);
$sequenciaNossoNumero = sequenciaNossoNumero($nossonumero);

// Campo livre
$livre = rand(1, 9);

// 44 numeros para o calculo do digito verificador do codigo de barras
$dv = digitoVerificador_barra("$codigobanco$nummoeda$fator_vencimento$valor$conta_cedente$conta_cedente_dv$sequenciaNossoNumero$livre", 9, 0);
// Numero para o codigo de barras com 44 digitos
$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$conta_cedente$conta_cedente_dv$sequenciaNossoNumero$livre";

$agencia_codigo = $agencia." / ". $conta_cedente ."-". $conta_cedente_dv;

$dadosboleto["codigo_barras"] = $linha;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
$dadosboleto["agencia_codigo"] = $agencia_codigo;
$dadosboleto["nosso_numero"] = $nossonumero;
$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;

		
		include("../plugins/boletophp/include/layout_cef.php");
		?>
			<div style="page-break-before: always;"></div>
<?php endforeach ?>



<?php endfor ?>
