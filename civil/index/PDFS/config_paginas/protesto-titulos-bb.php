
<!DOCTYPE html>

<head>
	<style type="text/css">
@media screen,print {

/* *** TIPOGRAFIA BASICA *** */

* {
	font-family: Arial;
	font-size: 12px;
	margin: 0;
	padding: 0;
}

.notice {
	color: red;
}


/* *** LINHAS GERAIS *** */

#container {
	width: 666px;
	margin: 0px auto;
	padding-bottom: 30px;
}

#instructions {
	margin: 0;
	padding: 0 0 20px 0;
}

#boleto {
	width: 666px;
	margin: 0;
	padding: 0;
}


/* *** CABECALHO *** */

#instr_header {
	//background: url('../plugins/boletophp/imagens/logo_empresa.png') no-repeat top left;
	padding-left: 160px;
	height: 65px;
}

#instr_header h1 {
	font-size: 12px;
	margin: px 0px;
}

#instr_header address {
	font-style: normal;
}

#instr_content {

}

#instr_content h2 {
	font-size: 10px;
	font-weight: bold;
}

#instr_content p {
	font-size: 10px;
	margin: 4px 0px;
}

#instr_content ol {
	font-size: 10px;
	margin: 5px 0;
}

#instr_content ol li {
	font-size: 10px;
	text-indent: 10px;
	margin: 2px 0px;
	list-style-position: inside;
}

#instr_content ol li p {
	font-size: 10px;
	padding-bottom: 4px;
}


/* *** BOLETO *** */

#boleto .cut {
	width: 666px;
	margin: 0px auto;
	border-bottom: 1px navy dashed;
}

#boleto .cut p {
	margin: 0 0 5px 0;
	padding: 0px;
	font-family: 'Arial Narrow';
	font-size: 9px;
	color: navy;
}

table.header {
	width: 666px;
	height: 38px;
	margin-top: 20px;
	margin-bottom: 10px;
	border-bottom: 2px navy solid;
	
}


table.header div.field_cod_banco {
	width: 46px;
	height: 19px;
  margin-left: 5px;
	padding-top: 3px;
	text-align: center;
	font-size: 14px;
	font-weight: bold;
	color: navy;
	border-right: 2px solid navy;
	border-left: 2px solid navy;
}

table.header td.linha_digitavel {
	width: 380px;
	text-align: right;
	font: bold 15px Arial; 
	color: navy
}

table.line {
	margin-bottom: 3px;
	padding-bottom: 1px;
	border-bottom: 1px black solid;
}

table.line tr.titulos td {
	height: 13px;
	font-family: 'Arial Narrow';
	font-size: 9px;
	color: navy;
	border-left: 5px #ffe000 solid;
	padding-left: 2px;
}

table.line tr.campos td {
	height: 12px;
	font-size: 10px;
	color: black;
	border-left: 5px #ffe000 solid;
	padding-left: 2px;
}

table.line td p {
	font-size: 10px;
}


table.line tr.campos td.ag_cod_cedente,
table.line tr.campos td.nosso_numero,
table.line tr.campos td.valor_doc,
table.line tr.campos td.vencimento2,
table.line tr.campos td.ag_cod_cedente2,
table.line tr.campos td.nosso_numero2,
table.line tr.campos td.xvalor,
table.line tr.campos td.valor_doc2
{
	text-align: right;
}

table.line tr.campos td.especie,
table.line tr.campos td.qtd,
table.line tr.campos td.vencimento,
table.line tr.campos td.especie_doc,
table.line tr.campos td.aceite,
table.line tr.campos td.carteira,
table.line tr.campos td.especie2,
table.line tr.campos td.qtd2
{
	text-align: center;
}

table.line td.last_line {
	vertical-align: top;
	height: 25px;
}

table.line td.last_line table.line {
	margin-bottom: -5px;
	border: 0 white none;
}

td.last_line table.line td.instrucoes {
	border-left: 0 white none;
	padding-left: 5px;
	padding-bottom: 0;
	margin-bottom: 0;
	height: 20px;
	vertical-align: top;
}

table.line td.cedente {
	width: 298px;
}

table.line td.valor_cobrado2 {
	padding-bottom: 0;
	margin-bottom: 0;
}


table.line td.ag_cod_cedente {
	width: 126px;
}

table.line td.especie {
	width: 35px;
}

table.line td.qtd {
	width: 53px;
}

table.line td.nosso_numero {
	/* width: 120px; */
	width: 115px;
	padding-right: 5px;
}

table.line td.num_doc {
	width: 113px;
}

table.line td.contrato {
	width: 72px;
}

table.line td.cpf_cei_cnpj {
	width: 132px;
}

table.line td.vencimento {
	width: 134px;
}

table.line td.valor_doc {
	/* width: 180px; */
	width: 175px;
	padding-right: 5px;
}

table.line td.desconto {
	width: 113px;
}

table.line td.outras_deducoes {
	width: 112px;
}

table.line td.mora_multa {
	width: 113px;
}

table.line td.outros_acrescimos {
	width: 113px;
}

table.line td.valor_cobrado {
	/* width: 180px; */
	width: 175px;
	padding-right: 5px;
	background-color: #ffc ;
}

table.line td.sacado {
	width: 659px;
}

table.line td.local_pagto {
	width: 472px;
}

table.line td.vencimento2 {
	/* width: 180px; */
	width: 175px;
	padding-right: 5px;
	background-color: #ffc;
}

table.line td.cedente2 {
	width: 472px;
}

table.line td.ag_cod_cedente2 {
	/* width: 180px; */
	width: 175px;
	padding-right: 5px;
}

table.line td.data_doc {
	width: 93px;
}

table.line td.num_doc2 {
	width: 173px;
}

table.line td.especie_doc {
	width: 72px;
}

table.line td.aceite {
	width: 34px;
}

table.line td.data_process {
	width: 72px;
}

table.line td.nosso_numero2 {
	/* width: 180px; */
	width: 175px;
	padding-right: 5px;
}

table.line td.reservado {
	width: 93px;
	background-color: #ffc;
}

table.line td.carteira {
	width: 93px;
}

table.line td.especie2 {
	width: 53px;
}

table.line td.qtd2 {
	width: 133px;
}

table.line td.xvalor {
	/* width: 72px; */
	width: 67px;
	padding-right: 5px;
}

table.line td.valor_doc2 {
	/* width: 180px; */
	width: 175px;
	padding-right: 5px;
}
table.line td.instrucoes {
	width: 475px;
}

table.line td.desconto2 {
	/* width: 180px; */
	width: 175px;
	padding-right: 5px;
}

table.line td.outras_deducoes2 {
	/* width: 180px; */
	width: 175px;
	padding-right: 5px;
}

table.line td.mora_multa2 {
	/* width: 180px; */
	width: 175px;
	padding-right: 5px;
}

table.line td.outros_acrescimos2 {
	/* width: 180px; */
	width: 175px;
	padding-right: 5px;
}

table.line td.valor_cobrado2 {
	/* width: 180px; */
	width: 175px;
	padding-right: 5px;
	background-color: #ffc ;
}

table.line td.sacado2 {
	width: 659px;
}

table.line td.sacador_avalista {
	width: 659px;
}

table.line tr.campos td.sacador_avalista {
	width: 472px;
}

table.line td.cod_baixa {
	color: navy;
	width: 180px;
}




div.footer {
	margin-bottom: 30px;
}

div.footer p {
	width: 88px;
	margin: 0;
	padding: 0;
	padding-left: 525px;
	font-family: 'Arial Narro';
	font-size: 9px;
	color: navy;
}


div.barcode {
	width: 666px;
	margin-bottom: 20px;
}

}



@media print {

#instructions {
	height: 1px;
	visibility: hidden;
	overflow: hidden;
}

}

</STYLE>

</head>
<?php include_once('../../../controller/db_functions.php');
$pdo = conectar();
$id = explode("-", $_GET['id']);
include("../plugins/boletophp/include/funcoes_bb.php");


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
		$dadosboleto["conta"] = $bv['conta_boleto']; 	// Num da conta, sem digito
		// DADOS PERSONALIZADOS - BANCO DO BRASIL
		$dadosboleto["convenio"] =  $bv['convenio']; // Num do convênio - REGRA: 6 ou 7 ou 8 dígitos
		$dadosboleto["contrato"] = $bv['contrato']; // Num do seu contrato
		$dadosboleto["carteira"] = $bv['carteira_boleto'];
		$dadosboleto["variacao_carteira"] = "";  // "-019" Variação da Carteira, com traço (opcional)
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
		$codigobanco = "001";
$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
$nummoeda = "9";
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

//valor tem 10 digitos, sem virgula
$valor = formata_numero($dadosboleto["valor_boleto"],10,0,"valor");
//agencia é sempre 4 digitos
$agencia = formata_numero($dadosboleto["agencia"],4,0);
//conta é sempre 8 digitos
$conta = formata_numero($dadosboleto["conta"],8,0);
//carteira 18
$carteira = $dadosboleto["carteira"];
//agencia e conta
$agencia_codigo = $agencia."-". modulo_11($agencia) ." / ". $conta ."-". modulo_11($conta);
//Zeros: usado quando convenio de 7 digitos
$livre_zeros='000000';

// Carteira 18 com Convênio de 8 dígitos
if ($dadosboleto["formatacao_convenio"] == "8") {
	$convenio = formata_numero($dadosboleto["convenio"],8,0,"convenio");
	// Nosso número de até 9 dígitos
	$nossonumero = formata_numero($dadosboleto["nosso_numero"],9,0);
	$dv=modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira");
	$linha="$codigobanco$nummoeda$dv$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira";
	//montando o nosso numero que aparecerá no boleto
	$nossonumero = $convenio . $nossonumero ."-". modulo_11($convenio.$nossonumero);
}

// Carteira 18 com Convênio de 7 dígitos
if ($dadosboleto["formatacao_convenio"] == "7") {
	$convenio = formata_numero($dadosboleto["convenio"],7,0,"convenio");
	// Nosso número de até 10 dígitos
	$nossonumero = formata_numero($dadosboleto["nosso_numero"],10,0);
	$dv=modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira");
	$linha="$codigobanco$nummoeda$dv$fator_vencimento$valor$livre_zeros$convenio$nossonumero$carteira";
  $nossonumero = $convenio.$nossonumero;
	//Não existe DV na composição do nosso-número para convênios de sete posições
}

// Carteira 18 com Convênio de 6 dígitos
if ($dadosboleto["formatacao_convenio"] == "6") {
	$convenio = formata_numero($dadosboleto["convenio"],6,0,"convenio");
	
	if ($dadosboleto["formatacao_nosso_numero"] == "1") {
		
		// Nosso número de até 5 dígitos
		$nossonumero = formata_numero($dadosboleto["nosso_numero"],5,0);
		$dv = modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$convenio$nossonumero$agencia$conta$carteira");
		$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$convenio$nossonumero$agencia$conta$carteira";
		//montando o nosso numero que aparecerá no boleto
		$nossonumero = $convenio . $nossonumero ."-". modulo_11($convenio.$nossonumero);
	}
	
	if ($dadosboleto["formatacao_nosso_numero"] == "2") {
		
		// Nosso número de até 17 dígitos
		$nservico = "21";
		$nossonumero = formata_numero($dadosboleto["nosso_numero"],17,0);
		$dv = modulo_11("$codigobanco$nummoeda$fator_vencimento$valor$convenio$nossonumero$nservico");
		$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$convenio$nossonumero$nservico";
	}
}

$dadosboleto["codigo_barras"] = $linha;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
$dadosboleto["agencia_codigo"] = $agencia_codigo;
$dadosboleto["nosso_numero"] = $nossonumero;
$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;

		
		include("../plugins/boletophp/include/layout_bb.php");
		?>
<?php endforeach ?>

	<span style="page-break-before: always;"></span>

<?php endfor ?>
