<!DOCTYPE html>

<head>
	<style type='text/css'>
.cp {  font: bold 10px Arial; color: black}
.ti {  font: 9px Arial, Helvetica, sans-serif}
.ld { font: bold 15px Arial; color: #000000}
.ct { font: 9px "Arial Narrow"; color: #000033}
.cn { font: 9px Arial; color: black }
.bc { font: bold 20px Arial; color: #000000 }
.ld2 { font: bold 12px Arial; color: #000000 }
body{min-width: 100%;}
</style> 
</head>
<meta charset="utf-8">



<?php  

include_once('../../../controller/db_functions.php');
$pdo = conectar();
$id = explode("-", $_GET['id']);
include("../plugins/boletophp/include/funcoes_bradesco.php");
function descrimina_emols($ato,$quantidade){
$pdo = conectar();
$busca_emol =  $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '$ato' ");
$busca_emol->execute();
$be = $busca_emol->fetch(PDO::FETCH_ASSOC);
return number_format(($be['monValor']+$be['monValorFerc'])*$quantidade,2);

}

function molda_cpf($var){

if (substr($var, 0,3) == 000) {
$var = substr($var, 3,11);
}

	if (strlen($var) == 11) {
		return substr($var, 0,3).'.'.substr($var, 3,3).'.'.substr($var, 6,3).'-'.substr($var, 9,2);
	}

	else{
	return substr($var, 0,2).'.'.substr($var, 2,3).'.'.substr($var, 5,3).'/'.substr($var, 8,4).'-'.substr($var, 12,2);	
	}
}


$conta = count($id);
for ($i=0; $i <count($id) ; $i++) :
if (isset($id[$i])) {
$id_unic = $id[$i];
}

$busca_matricula = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE ID = '$id_unic' ");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);

foreach($linhas as $b):
// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 3;
$taxa_boleto = 2.95;

#----------------------------------------------- VENCIMENTO ------------------------------------------------------------------
		$busca_valores = $pdo->prepare("SELECT * FROM protesto_dados_essenciais where ID = 1");
		$busca_valores->execute();
		$bv = $busca_valores->fetch(PDO::FETCH_ASSOC);

		$taxa_boleto = $bv['valor_taxa_boleto'] ; //dados essenciais
		$dias_de_prazo_para_pagamento = "3";

		$dataprotdia =  substr($b->data_protocolo_transacao,0,2);
		$dataprotmes =  substr($b->data_protocolo_transacao,2,2);
		$dataprotano =  substr($b->data_protocolo_transacao,4,4);
		$dataprot = $dataprotano.'-'.$dataprotmes.'-'.$dataprotdia;


		$data_protocolo = substr($b->data_protocolo_transacao,4,4).'-'.substr($b->data_protocolo_transacao,2,2).'-'.substr($b->data_protocolo_transacao,0,2);
		$diaSemana = array("Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado");
		$data = $data_protocolo;
		$diaSemana_numero = date('w', strtotime($data_protocolo));


		if ($diaSemana[$diaSemana_numero] == 'Sexta'):
		$vencimento = date('Y-m-d',strtotime($data_protocolo.'+5days'));
		elseif ($diaSemana[$diaSemana_numero] == 'Quarta'): 
		$vencimento = date('Y-m-d',strtotime($data_protocolo.'+5days'));
		elseif ($diaSemana[$diaSemana_numero] == 'Quinta'):
		$vencimento = date('Y-m-d',strtotime($data_protocolo.'+4days'));
		else: 
		$vencimento = date('Y-m-d',strtotime($data_protocolo.'+3days'));
		endif;
#----------------------------------------------- VENCIMENTO ------------------------------------------------------------------


$data_venc = date('d/m/Y', strtotime($vencimento));#date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006";

#----------------------------------------------- CALCULO VALOR ---------------------------------------------------------------

		$busca_devedor = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$b->numero_protocolo_cartorio_transacao' ");
		$busca_devedor->execute();
		$linhas_devedor = $busca_devedor->fetchAll(PDO::FETCH_OBJ);

		#setando o valor do ato ------------------------------------------------------------------					
		if ($b->saldo_titulo_transacao <= 51.68) {
		$ato_pagamento = '17.4.1';
		}
		elseif ($b->saldo_titulo_transacao > 51.69 && $b->saldo_titulo_transacao <= 165.39) {
		$ato_pagamento = '17.4.2';
		}
		elseif ($b->saldo_titulo_transacao > 165.40 && $b->saldo_titulo_transacao <= 310.10) {
		$ato_pagamento = '17.4.3';
		}
		elseif ($b->saldo_titulo_transacao > 310.11 && $b->saldo_titulo_transacao <= 620.20) {
		$ato_pagamento = '17.4.4';
		}
		elseif ($b->saldo_titulo_transacao > 620.21 && $b->saldo_titulo_transacao <= 1240.40) {
		$ato_pagamento = '17.4.5';
		}
		elseif ($b->saldo_titulo_transacao > 1240.41 && $b->saldo_titulo_transacao <= 2377.44) {
		$ato_pagamento = '17.4.6';
		}
		elseif ($b->saldo_titulo_transacao > 2377.44 && $b->saldo_titulo_transacao <= 3514.47) {
		$ato_pagamento = '17.4.7';
		}
		elseif ($b->saldo_titulo_transacao > 3514.48 && $b->saldo_titulo_transacao <= 4651.51) {
		$ato_pagamento = '17.4.8';
		}
		elseif ($b->saldo_titulo_transacao > 4651.52 && $b->saldo_titulo_transacao <= 5788.54) {
		$ato_pagamento = '17.4.9';
		}
		elseif ($b->saldo_titulo_transacao > 5788.55 && $b->saldo_titulo_transacao <= 6925.57) {
		$ato_pagamento = '17.4.10';
		}
		elseif ($b->saldo_titulo_transacao > 6925.58 && $b->saldo_titulo_transacao <= 8062.61) {
		$ato_pagamento = '17.4.11';
		}
		elseif ($b->saldo_titulo_transacao > 8062.62 && $b->saldo_titulo_transacao <= 9199.64) {
		$ato_pagamento = '17.4.12';
		}
		elseif ($b->saldo_titulo_transacao > 9199.65 && $b->saldo_titulo_transacao <= 10336.68) {
		$ato_pagamento = '17.4.13';
		}
		elseif ($b->saldo_titulo_transacao > 10336.69 && $b->saldo_titulo_transacao <= 20673.36) {
		$ato_pagamento = '17.4.14';
		}
		elseif ($b->saldo_titulo_transacao > 20673.37 && $b->saldo_titulo_transacao <= 41346.72) {
		$ato_pagamento = '17.4.15';
		}
		elseif ($b->saldo_titulo_transacao >  41346.73 && $b->saldo_titulo_transacao <= 62020.07) {
		$ato_pagamento = '17.4.16';
		}
		elseif ($b->saldo_titulo_transacao > 62020.08 && $b->saldo_titulo_transacao <= 82693.43) {
		$ato_pagamento = '17.4.17';
		}
		elseif ($b->saldo_titulo_transacao > 82693.44 && $b->saldo_titulo_transacao <= 103366.79) {
		$ato_pagamento = '17.4.18';
		}
		elseif ($b->saldo_titulo_transacao > 103366.80 && $b->saldo_titulo_transacao <= 206733.58) {
		$ato_pagamento = '17.4.19';
		}
		elseif ($b->saldo_titulo_transacao > 206733.59) {
		$ato_pagamento = '17.4.20';
		}
		#-----------------------------------------------------------------------------------------
		$busca_valor_pagamento = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '$ato_pagamento'");
		$busca_valor_pagamento->execute();
		$d = $busca_valor_pagamento->fetch(PDO::FETCH_ASSOC);
		$valor_pagamento = descrimina_emols($ato_pagamento,1);


		if ($b->localidade_titulo != '2'): $conducao_soma = descrimina_emols('17.10.1',$busca_devedor->rowCount());
		else: $conducao_soma = descrimina_emols('17.10.2',$busca_devedor->rowCount());
		endif;


		if ($busca_devedor->rowCount()>1){$quantidade_arquivamentos = 3;}else{$quantidade_arquivamentos =2;}
		$valor_arquivamento = descrimina_emols('17.9',$quantidade_arquivamentos);

		$soma_emols =  $valor_pagamento+$conducao_soma+descrimina_emols('17.2',$busca_devedor->rowCount())+$valor_arquivamento +descrimina_emols('17.5.1',1);
		if (isset($_SESSION['taxaff']) && $_SESSION['taxaff'] == 'S'): $soma_emols_no_ferc = $soma_emols-$soma_emols*3/100;endif;



		if (isset($_SESSION['taxaff']) && $_SESSION['taxaff'] == 'S'): $acrescimo_ff = $soma_emols_no_ferc*8/100;
		$valor_total_test = $soma_emols+$acrescimo_ff+$b->saldo_titulo_transacao;
		else:
		$valor_total_test = $soma_emols+$b->saldo_titulo_transacao;
		endif ;
#----------------------------------------------- CALCULO VALOR ---------------------------------------------------------------



$valor_cobrado = $valor_total_test; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
$valor_cobrado = str_replace(",", ".",$valor_cobrado);
$valor_boleto=number_format($valor_cobrado+$taxa_boleto, 2, ',', '');

$dadosboleto["nosso_numero"] = substr($b->nosso_numero_transacao, 0, 10);
$dadosboleto["numero_documento"] = '1';	// Num do pedido ou do documento
$dadosboleto["data_vencimento"] = $data_venc; // Data de Vencimento do Boleto - REGRA: Formato DD/MM/AAAA
$dadosboleto["data_documento"] = date("d/m/Y"); // Data de emissão do Boleto
$dadosboleto["data_processamento"] = date("d/m/Y"); // Data de processamento do boleto (opcional)
$dadosboleto["valor_boleto"] = $valor_boleto; 	// Valor do Boleto - REGRA: Com vírgula e sempre com duas casas depois da virgula

// DADOS DO SEU CLIENTE
$dadosboleto["sacado"] = $b->nome_devedor_transacao;
$dadosboleto["endereco1"] = $b->endereco_devedor_transacao." ".$b->cep_devedor_transacao." ".$b->cidade_devedor_transacao." ".$b->uf_devedor_transacao ;
#$dadosboleto["endereco2"] = $b->endereco_devedor_transacao." ".$b->cep_devedor_transacao." ".$b->cidade_devedor_transacao." ".$b->uf_devedor_transacao ;
$dadosboleto["endereco2"] ='';

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
$dadosboleto["quantidade"] = "001";
$dadosboleto["valor_unitario"] = $valor_boleto;
$dadosboleto["aceite"] = "";
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "DS";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - Bradesco
$dadosboleto["agencia"] = $bv['agencia_boleto'];// Num da agencia, sem digito
$dadosboleto["agencia_dv"] = $bv['dv_agencia_boleto']; // Digito do Num da agencia
$dadosboleto["conta"] = $bv['conta_boleto']; 	// Num da conta, sem digito
$dadosboleto["conta_dv"] = $bv['digito_conta_boleto']; 	// Digito do Num da conta

// DADOS PERSONALIZADOS - Bradesco
$dadosboleto["conta_cedente"] = $bv['conta_boleto']; // ContaCedente do Cliente, sem digito (Somente Números)
$dadosboleto["conta_cedente_dv"] = $bv['digito_conta_boleto'];// Digito da ContaCedente do Cliente
$dadosboleto["carteira"] = $bv['carteira_boleto']; // Código da Carteira: pode ser 06 ou 03

$serv = PESQUISA_ALL_ID('cadastroserventia',1);
foreach($serv as $s){
$endereco_serventia = $s->strLogradouro.' Nº '.$s->strNumero.' - '.$s->strBairro.' CEP: '.$s->strCEP;
$cnpj = $s->strCNPJ;
$razaosocial = $s->strRazaoSocial;
$u = PESQUISA_ALL_ID('uf_cidade',$s->intUFcidade); foreach($u as $u) {

$cidade_serv = $u->cidade.'/'.$u->uf;

// NÃO ALTERAR!
}
}


// SEUS DADOS
$dadosboleto["identificacao"] =mb_strtoupper($razaosocial) ;
$dadosboleto["cpf_cnpj"] = $cnpj;
$dadosboleto["endereco"] = $endereco_serventia;
$dadosboleto["cidade_uf"] = $cidade_serv;
$dadosboleto["cedente"] = mb_strtoupper($razaosocial);




$codigobanco = "237";
$codigo_banco_com_dv = geraCodigoBanco($codigobanco);
$nummoeda = "9";
$fator_vencimento = fator_vencimento($dadosboleto["data_vencimento"]);

//valor tem 10 digitos, sem virgula
$valor = formata_numero($dadosboleto["valor_boleto"],10,0,"valor");
//agencia é 4 digitos
$agencia = formata_numero($dadosboleto["agencia"],4,0);
//conta é 6 digitos
$conta = formata_numero($dadosboleto["conta"],6,0);
//dv da conta
$conta_dv = formata_numero($dadosboleto["conta_dv"],1,0);
//carteira é 2 caracteres
$carteira = $dadosboleto["carteira"];

//nosso número (sem dv) é 11 digitos
$nnum = formata_numero($dadosboleto["carteira"],2,0).formata_numero($dadosboleto["nosso_numero"],11,0);
//dv do nosso número
$dv_nosso_numero = digitoVerificador_nossonumero($nnum);

//conta cedente (sem dv) é 7 digitos
$conta_cedente = formata_numero($dadosboleto["conta_cedente"],7,0);
//dv da conta cedente
$conta_cedente_dv = formata_numero($dadosboleto["conta_cedente_dv"],1,0);

//$ag_contacedente = $agencia . $conta_cedente;

// 43 numeros para o calculo do digito verificador do codigo de barras
$dv = digitoVerificador_barra("$codigobanco$nummoeda$fator_vencimento$valor$agencia$nnum$conta_cedente".'0', 9, 0);
// Numero para o codigo de barras com 44 digitos
$linha = "$codigobanco$nummoeda$dv$fator_vencimento$valor$agencia$nnum$conta_cedente"."0";

$nossonumero = substr($nnum,0,2).'/'.substr($nnum,2).'-'.$dv_nosso_numero;
$agencia_codigo = $agencia."-".$dadosboleto["agencia_dv"]." / ". $conta_cedente ."-". $conta_cedente_dv;


$dadosboleto["codigo_barras"] = $linha;
$dadosboleto["linha_digitavel"] = monta_linha_digitavel($linha);
$dadosboleto["agencia_codigo"] = $agencia_codigo;
$dadosboleto["nosso_numero"] = $nossonumero;
$dadosboleto["codigo_banco_com_dv"] = $codigo_banco_com_dv;


?>

 


<?php 
include("../plugins/boletophp/include/layout_bradesco.php");
?>

<?php endforeach ?>

<?php if ($conta!=0 && $conta!=1): ?>
		<div style="page-break-before: always;"></div>
<?php endif ?>

<?php $conta--; endfor ?>
