
<!DOCTYPE html>
<?php include('../../../controller/db_functions.php');
$pdo = conectar();
$id = explode("-", $_GET['id']);

function descrimina_emols($ato,$quantidade){
$pdo = conectar();
$busca_emol =  $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '$ato' ");
$busca_emol->execute();
$be = $busca_emol->fetch(PDO::FETCH_ASSOC);
return number_format($quantidade * ($be['monValor']+$be['monValorFerc']),2);
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



$serv = PESQUISA_ALL_ID('cadastroserventia',1);
foreach($serv as $s){
	$endereco_serventia = $s->strLogradouro.' Nº '.$s->strNumero.' - '.$s->strBairro.' CEP: '.$s->strCEP;
	$titular = $s->strTituloServentia; 
}

$ato = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.3' or strCodigoLei = '17.5.1' or strCodigoLei = '17.9' ");
$ato->execute();
$at = $ato->fetchAll(PDO::FETCH_OBJ);
$valorato = 0;
foreach ($at as $at) {
$valorato += $at->monValor + $at->monValorFerc;
}


if (!isset($token)) {
$token= '';
}
?>
<html>
<head>
	<title>Notificações Protesto</title>
<style type="text/css">

.center{
	text-align: center;

}
.all{

	width: 100%;
}
fieldset{
	padding: 8px;
	font-size: 80%;
}
legend{
	font-size: 60%;
}



td{
	font-size: 12px;
}

.left{
	float: left;
	font-size: 70%;
}
.right{
	float: right;
	font-size: 70%;
	text-align: center;
}

p{margin-bottom: -6px;}

body{font-size: 10px;font-family: "Arial";margin-bottom: -3cm;}
</style>
</head>

<body>


 	<?php 
for ($i=0; $i <count($id) ; $i++) :
if (isset($id[$i])) {
$id_unic = $id[$i];	
}

$busca_matricula = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE ID = '$id_unic' ");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);
 ?>
 <?php   foreach($linhas as $b):
$pesquisa_apresentante = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$b->numero_codigo_portador_transacao'");
			$pesquisa_apresentante->execute();
			$l = $pesquisa_apresentante->fetchAll(PDO::FETCH_OBJ);
			foreach ($l as $l) {
			$pagamento_diferido = $l->pagamento_diferido;
			}
									
		  if ($pagamento_diferido == 'sim') {
				#$selo = 'DIFERIDO';
				#unset($token);	
				echo '
				<div style="position: absolute;width: 100px; margin-left: 700px;border: 1px solid silver; padding: 50px;">
				<img src="../../../images/brasao_ma.png" style="width: 40%;margin-left:28px; margin-top:-40px; ">
				<h4 style="margin-bottom:-15px;min-width:160%;margin-left:-33px;text-align:center;margin-top:0px">EMOLUMENTOS DIFERIDOS</h4>
				<h5 style="margin-bottom:-15px;min-width:200%;margin-left:-52px;text-align:center;">Documento dispensado do Selo de fiscalização</h5>
				<h5 style="margin-bottom:-40px;min-width:200%;margin-left:-50px;text-align:center;">Provimentos 04/12, 21/15 e 36/17, da CGJ/MA</h5>
				</div>
				';
				}
 		  else{ 	 			

 if ($token !='') {


      #SELO1 - 17.3...: ===============================================================================================

							$ato_praticado = '17.3';
							$escrevente = $_SESSION['nome'];
							$isento = 'true';
							$motivo_isento='Teste';
							$nomeparte1 =$b->nome_sacador_vendedor_transacao;
							$nomeparte2 =$b->nome_devedor_transacao;
							$nomeparte3 ='';
							$docparte3='';
							$nomeparte4 ='';
							$docparte4='';
							$livro ='';
							$folha='';


							$ConteudoPOST = '{
							"ato" :{
							"codigo":"17.3",
							"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
							},
							"natureza":{
							"tipo":"8"
							},
							"partes": {
							"nomesPartes":"X",
							"parteAto":[
							{
							"nome":"'.$nomeparte1.'"
							},
							{
							"nome":"'.$nomeparte2.'"
							}
							]},
							
							"selo":{
							"escrevente":"'.$escrevente.'",
							"protocolo": "'.$b->numero_protocolo_cartorio_transacao.'",
                            "valorTitulo": "'.$b->saldo_titulo_transacao.'"
							}



							}';

							$ConteudoCabecalho = [
							'Authorization: Bearer'.$token,
							"Content-Type: application/json"

							];



							$handler = curl_init($_SESSION['urlselodigital'].'protesto/baixa-cancelamento');

							curl_setopt_array($handler, [

							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS =>"$ConteudoPOST",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer $token",
							"Content-Type: application/json"
							),
							]);

							$resp = curl_exec($handler);
							$resp = json_decode($resp, true);
							#var_dump($resp);
							#echo curl_error($handler);
							$erro = curl_error($handler);
							if (isset($resp['status'])) {
							#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
							header('Location: ' . $_SERVER['HTTP_REFERER']);
							break;
							}
							$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
							$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
							$QRCODE = $resp['resumos'][0]['valorQrCode'];
							$RETORNO = json_encode($resp['resumos'][0]);
							$_SESSION['SELOOLD'] =$SELO;
							$_SESSION['sucesso'] = $SELO;
							#echo $resp['resumos'][0]['dataGeracao'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#$info = curl_getinfo($handler);
							#var_dump($info);
							#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




							if ($erro!='') {
							$erro;
							}






							else{

							#parte de auditoria:
							$LIVRO = '0';
							$FOLHA = '0';
							$TERMO = '0';
							$ATO = '17.4';
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','CANCELAMENTO_PROTESTO','5','1','$SELO',CURRENT_TIMESTAMP,'GER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
							UPDATE_CAMPO_ID('protesto_automatico_transacao','RETORNOSELODIGITAL',strip_tags($RETORNO),$id_unic);
							$insert_auditoria->execute();


							#$_POST['SELO2'] = $SELO;  



							}
	 	 
	  #SELO - 17.9...: ===============================================================================================
							$ato_praticado = '17.9';
							$escrevente = $_SESSION['nome'];
							$isento = 'true';
							$motivo_isento='Teste';
							$nomeparte1 =$b->nome_sacador_vendedor_transacao;
							$nomeparte2 =$b->nome_devedor_transacao;
							$nomeparte3 ='';
							$docparte3='';
							$nomeparte4 ='';
							$docparte4='';
							$livro ='';
							$folha='';


							$ConteudoPOST = '{
							"ato" :{
							"codigo":"17.9",
							"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
							},
							"escrevente":"'.$escrevente.'",
							"natureza":{
							"tipo":"0"
							},
							"partes": {
							"nomesPartes":"X",
							"parteAto":[
							{
							"nome":"'.$nomeparte1.'"
							},
							{
							"nome":"'.$nomeparte2.'"
							}
							]},
							
							"selo":{
							"escrevente":"'.$escrevente.'",
							"protocolo": "'.$b->numero_protocolo_cartorio_transacao.'",
                            "valorTitulo": "'.$b->saldo_titulo_transacao.'"
							}



							}';

							$ConteudoCabecalho = [
							'Authorization: Bearer'.$token,
							"Content-Type: application/json"

							];



							$handler = curl_init($_SESSION['urlselodigital'].'protesto/atos-em-geral');

							curl_setopt_array($handler, [

							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS =>"$ConteudoPOST",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer $token",
							"Content-Type: application/json"
							),
							]);

							$resp = curl_exec($handler);
							$resp = json_decode($resp, true);
							#var_dump($resp);
							#echo curl_error($handler);
							$erro = curl_error($handler);
							if (isset($resp['status'])) {
							#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
							header('Location: ' . $_SERVER['HTTP_REFERER']);
							break;
							}
							$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
							$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
							$QRCODE = $resp['resumos'][0]['valorQrCode'];
							$RETORNO2 = json_encode($resp['resumos'][0]);
							$_SESSION['SELOOLD'] =$SELO;
							$_SESSION['sucesso'] = $SELO;
							#echo $resp['resumos'][0]['dataGeracao'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#$info = curl_getinfo($handler);
							#var_dump($info);
							#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




							if ($erro!='') {
							$erro;
							}






							else{

							#parte de auditoria:
							$LIVRO = '0';
							$FOLHA = '0';
							$TERMO = '0';
							$ATO = '17.9';
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','ARQUIVAMENTO','5','1','$SELO',CURRENT_TIMESTAMP,'GER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO2')");
							UPDATE_CAMPO_ID('protesto_automatico_transacao','RETORNOSELODIGITAL2',strip_tags($RETORNO2),$id_unic);
							$insert_auditoria->execute();


							#$_POST['SELO2'] = $SELO;  



							}
							
	  if (!isset($_GET['semcert'])) {	 
	  #SELO - 17.5.1...: ===============================================================================================
							$ato_praticado = '17.5.1';
							$escrevente = $_SESSION['nome'];
							$isento = 'true';
							$motivo_isento='Teste';
							$nomeparte1 =$b->nome_sacador_vendedor_transacao;
							$nomeparte2 =$b->nome_devedor_transacao;
							$nomeparte3 ='';
							$docparte3='';
							$nomeparte4 ='';
							$docparte4='';
							$livro ='';
							$folha='';


							$ConteudoPOST = '{
							"ato" :{
							"codigo":"17.5.1",
							"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
							},
							"natureza":{
							"tipo":"0"
							},
							"partes": {
							"nomesPartes":"X",
							"parteAto":[
							{
							"nome":"'.$nomeparte1.'"
							},
							{
							"nome":"'.$nomeparte2.'"
							}
							]},
							
							"selo":{
							"escrevente":"'.$escrevente.'",
							"protocolo": "'.$b->numero_protocolo_cartorio_transacao.'",
                            "valorTitulo": "'.$b->saldo_titulo_transacao.'"
							}



							}';

							$ConteudoCabecalho = [
							'Authorization: Bearer'.$token,
							"Content-Type: application/json"

							];



							$handler = curl_init($_SESSION['urlselodigital'].'protesto/certidao');

							curl_setopt_array($handler, [

							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS =>"$ConteudoPOST",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer $token",
							"Content-Type: application/json"
							),
							]);

							$resp = curl_exec($handler);
							$resp = json_decode($resp, true);
							#var_dump($resp);
							#echo curl_error($handler);
							$erro = curl_error($handler);
							if (isset($resp['status'])) {
							#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
							header('Location: ' . $_SERVER['HTTP_REFERER']);
							break;
							}
							$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
							$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
							$QRCODE = $resp['resumos'][0]['valorQrCode'];
							$RETORNO3 = json_encode($resp['resumos'][0]);
							$_SESSION['SELOOLD'] =$SELO;
							$_SESSION['sucesso'] = $SELO;
							#echo $resp['resumos'][0]['dataGeracao'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#$info = curl_getinfo($handler);
							#var_dump($info);
							#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




							if ($erro!='') {
							$erro;
							}






							else{

							#parte de auditoria:
							$LIVRO = '0';
							$FOLHA = '0';
							$TERMO = '0';
							$ATO = '17.5.1';
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','CERTIDAO_CANCELAMENTO','5','1','$SELO',CURRENT_TIMESTAMP,'GER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO3')");
							UPDATE_CAMPO_ID('protesto_automatico_transacao','RETORNOSELODIGITAL3',strip_tags($RETORNO3),$id_unic);
							$insert_auditoria->execute();


							#$_POST['SELO2'] = $SELO;  



							}												
      }





      }
      
else{
  $SELO = '0';
}
}

 	?>
 				
					<img style="max-width: 100%; margin-top: 5px; " src="../bd_INSERTS/cabecalhos/CAPA.jpg"><br>
					





<table style="width: 100%; border: 2px solid black; padding-bottom:10px; ">
	<tr>
	<td style="border:none;font-weight: bold;text-transform: uppercase;">
		<p style="display: inline-block; margin-left: 10px;">
							<?php $pesquisa_apresentante = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$b->numero_codigo_portador_transacao'");
							$pesquisa_apresentante->execute();
							$l = $pesquisa_apresentante->fetchAll(PDO::FETCH_OBJ);
							foreach ($l as $l) {
							$apresentante = $l->nome;
							}
							if ($b->numero_codigo_portador_transacao == $_SESSION['numero_p_24']) {
							$apresentante = $b->nome_beneficiario_favorecido_transacao.', CPF/CNPJ: '.molda_cpf($b->agencia_codigo_beneficiario_transacao);
						}
							 ?>
							<b>Apresentante:</b> <b><?=mb_strtoupper($apresentante)?></b>
							</p> 
							<p style="display: inline-block;margin-left: 7cm"><b>1º Via</b></p><br>
							<p style="display: inline-block; margin-left: 10px;">
						<!--#################################################################################################################################################-->

											<?php 
											if($b->especie_titulo_transacao == 'CCE'){$especie = 'Cédula de Crédito à Exportação';}
											if($b->especie_titulo_transacao == 'CCB'){$especie = 'Cédula de Crédito Bancário';}
											if($b->especie_titulo_transacao == 'CBI'){$especie = 'Cédula de Crédito Bancário por Indicação';}
											if($b->especie_titulo_transacao == 'CCC'){$especie = 'Cédula de Crédito Comercial';}
											if($b->especie_titulo_transacao == 'CCI'){$especie = 'Cédula de Crédito Industrial';}
											if($b->especie_titulo_transacao == 'CCR'){$especie = 'Cédula de Crédito Rural';}
											if($b->especie_titulo_transacao == 'CHP'){$especie = 'Cédula Hipotecária';}
											if($b->especie_titulo_transacao == 'CRH'){$especie = 'Cédula Rural Hipotecária';}
											if($b->especie_titulo_transacao == 'CRP'){$especie = 'Cédula Rural Pignoratícia';}
											if($b->especie_titulo_transacao == 'CPH'){$especie = 'Cédula Rural Pignoratícia Hipotecária';}
											if($b->especie_titulo_transacao == 'CDA'){$especie = 'Certidão da Dívida Ativa';}
											if($b->especie_titulo_transacao == 'CH'){$especie = 'Cheque';}
											if($b->especie_titulo_transacao == 'CD'){$especie = 'Confissão de Dívida';}
											if($b->especie_titulo_transacao == 'CPS'){$especie = 'Conta de Prestação de Serviços - Profissional liberal';}
											if($b->especie_titulo_transacao == 'CJV'){$especie = 'Conta Judicialmente Verificada';}
											if($b->especie_titulo_transacao == 'CC'){$especie = 'Contrato de Câmbio';}
											if($b->especie_titulo_transacao == 'CM'){$especie = 'Contrato de Mútuo';}
											if($b->especie_titulo_transacao == 'DV'){$especie = 'Diversos';}
											if($b->especie_titulo_transacao == 'DS'){$especie = 'Duplicata de Prestação de Serviços - Original';}
											if($b->especie_titulo_transacao == 'DSI'){$especie = 'Duplicata de Prestação de Serviços por Indicação - Comprovante de prestação dos serviços';}
											if($b->especie_titulo_transacao == 'DM'){$especie = 'Duplicata de Venda Mercantil';}
											if($b->especie_titulo_transacao == 'DMI'){$especie = 'Duplicata de Venda Mercantil por Indicação';}
											if($b->especie_titulo_transacao == 'DR'){$especie = 'Duplicata Rural';}
											if($b->especie_titulo_transacao == 'DRI'){$especie = 'Duplicata Rural por Indicação';}
											if($b->especie_titulo_transacao == 'EC'){$especie = 'Encargos Condominiais';}
											if($b->especie_titulo_transacao == 'CT'){$especie = 'Espécie de Contrato';}
											if($b->especie_titulo_transacao == 'LC'){$especie = 'Letra de Câmbio';}
											if($b->especie_titulo_transacao == 'NCE'){$especie = 'Nota de Crédito à Exportação';}
											if($b->especie_titulo_transacao == 'NCC'){$especie = 'Nota de Crédito Comercial';}
											if($b->especie_titulo_transacao == 'NCI'){$especie = 'Nota de Crédito Industrial';}
											if($b->especie_titulo_transacao == 'NCR'){$especie = 'Nota de Crédito Rural';}
											if($b->especie_titulo_transacao == 'NP'){$especie = 'Nota Promissória';}
											if($b->especie_titulo_transacao == 'NPR'){$especie = 'Nota Promissória Rural';}
											if($b->especie_titulo_transacao == 'RA'){$especie = 'Recibo de Aluguel';}
											if($b->especie_titulo_transacao == 'SJ'){$especie = 'Sentença Judicial';}
											if($b->especie_titulo_transacao == 'TA'){$especie = 'Termo de Acordo - Ex. Ação trabalhista';}
											if($b->especie_titulo_transacao == 'TAC'){$especie = 'Termo de Ajustamento de Conduta';}
											if($b->especie_titulo_transacao == 'TS'){$especie = 'Triplicata de Prestação de Serviços';}
											if($b->especie_titulo_transacao == 'TM'){$especie = 'Triplicata de Venda Mercantil';}
											if($b->especie_titulo_transacao == 'WR'){$especie = 'Warrant';}
											 ?>

							<b>REF.:</b> <?=mb_strtoupper($especie)?>				 
							</p><br>
							<p style="display: inline-block; margin-left: 10px;">
								<b>Doc. Num.: <?=$b->numero_titulo_transacao?></b>
							</p>
							<p style="display: inline-block; margin-left: 2cm;">
							<b>Vencimento: </b> 
						<?php if ($b->data_vencimento_titulo_transacao == '99999999' || empty($b->data_vencimento_titulo_transacao)): ?>
						A VISTA
						<?php else: ?>		
						<?=substr($b->data_vencimento_titulo_transacao,0,2).'/'.substr($b->data_vencimento_titulo_transacao,2,2).'/'.substr($b->data_vencimento_titulo_transacao,4,4)?>
						<?php endif ?>
							</p>
							<p style="display: inline-block; margin-left: 2cm;">
								<b>Valor Título: </b> R$  <?=number_format($b->saldo_titulo_transacao,2,",",".")?>
							</p>
							<br>
							<?php 
							$busca_devedor = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$b->numero_protocolo_cartorio_transacao' ");
							$busca_devedor->execute();
							$linhas_devedor = $busca_devedor->fetchAll(PDO::FETCH_OBJ);
							foreach ($linhas_devedor as $ld):
							 ?>	
						<p style="display: inline-block; margin-left: 10px;margin-top: -10px;">
						<b>Devedor:</b> <?=mb_strtoupper($ld->nome_devedor_transacao)?>
						</p>
						<p style="display: inline-block; margin-left: 4cm;margin-top: -10px;">
						 <b>CPF/CNPJ: </b> <b><?=$ld->documento_devedor_transacao?> <?=molda_cpf($ld->numero_identificacao_devedor_transacao)?></b>
						</p><br>
						<?php endforeach ?>
						 	
							 	<br>
							 	 <p style="display: inline-block; margin-left: 10px;">
							 	 	<b>Credor: </b> <?=mb_strtoupper($b->nome_sacador_vendedor_transacao)?>
							 	 </p>

							 	 <p style="display: inline-block; margin-left: 2cm;">
							 	 	<b>Protocolo: </b> <?=mb_strtoupper($b->numero_protocolo_cartorio_transacao)?>
							 	 </p>

							 	 <?php $busca_livro = $pdo->prepare("SELECT * FROM livro_protestos where assento = '$b->numero_protocolo_cartorio_transacao'");$busca_livro->execute(); $blv = $busca_livro->fetch(PDO::FETCH_ASSOC); ?>
	
							 	 <p style="display: inline-block; margin-left: 2cm;">
							 	 	<b>Protesto Nº: </b> <?=$blv['LivroInicial']?> <b>Livro: </b> <?=$blv['identifcadorLivro']?> <b>Folha: </b> <?=$blv['PaginaLivro']?>
							 	 </p>
	</td>
	</tr>
</table>
<br>
<?php 
						$busca_valores = $pdo->prepare("SELECT * FROM protesto_dados_essenciais where ID = 1");
						$busca_valores->execute();
						$bv = $busca_valores->fetch(PDO::FETCH_ASSOC);
					 ?>
<table style="width: 100%; border: 2px solid black; padding-bottom:10px;font-size: 10px; ">
	<tr>
	<td style="border:none;font-weight: bold;text-transform: uppercase;">
		<h3 style="text-align: center">RECIBO</h3>
		<p style="text-align: center">
		<?php  
		$busca_valor_pagamento = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.3'");
						$busca_valor_pagamento->execute();
						$d = $busca_valor_pagamento->fetch(PDO::FETCH_ASSOC);
						$valor_pagamento = $d['monValor'] + $d['monValorFerc'];			
					 ?>

					17.3 - Cancelamento .................................... R$ <?=descrimina_emols('17.3',1)?> <br>
					
					<?php if ($busca_devedor->rowCount()>1){$quantidade_arquivamentos = 4;}else{$quantidade_arquivamentos =3;} ?>
					
					<?php if (!isset($_GET['semcert'])) :	 ?>
					17.5.1 - Certidão Cancelamento.................................... R$ <?=descrimina_emols('17.5.1',1)?> <br>
					<?php endif ?>


					<?php 

					 	 	#setando o valor do ato ------------------------------------------------------------------					
								if ($b->saldo_titulo_transacao <= 51.68) {
									$ato_protesto = '17.1.1';
									}
									elseif ($b->saldo_titulo_transacao > 51.69 && $b->saldo_titulo_transacao <= 165.39) {
									$ato_protesto = '17.1.2';
									}
									elseif ($b->saldo_titulo_transacao > 165.40 && $b->saldo_titulo_transacao <= 310.10) {
									$ato_protesto = '17.1.3';
									}
									elseif ($b->saldo_titulo_transacao > 310.11 && $b->saldo_titulo_transacao <= 620.20) {
									$ato_protesto = '17.1.4';
									}
									elseif ($b->saldo_titulo_transacao > 620.21 && $b->saldo_titulo_transacao <= 1240.40) {
									$ato_protesto = '17.1.5';
									}
									elseif ($b->saldo_titulo_transacao > 1240.41 && $b->saldo_titulo_transacao <= 2377.44) {
									$ato_protesto = '17.1.6';
									}
									elseif ($b->saldo_titulo_transacao > 2377.44 && $b->saldo_titulo_transacao <= 3514.47) {
									$ato_protesto = '17.1.7';
									}
									elseif ($b->saldo_titulo_transacao > 3514.48 && $b->saldo_titulo_transacao <= 4651.51) {
									$ato_protesto = '17.1.8';
									}
									elseif ($b->saldo_titulo_transacao > 4651.52 && $b->saldo_titulo_transacao <= 5788.54) {
									$ato_protesto = '17.1.9';
									}
									elseif ($b->saldo_titulo_transacao > 5788.55 && $b->saldo_titulo_transacao <= 6925.57) {
									$ato_protesto = '17.1.10';
									}
									elseif ($b->saldo_titulo_transacao > 6925.58 && $b->saldo_titulo_transacao <= 8062.61) {
									$ato_protesto = '17.1.11';
									}
									elseif ($b->saldo_titulo_transacao > 8062.62 && $b->saldo_titulo_transacao <= 9199.64) {
									$ato_protesto = '17.1.12';
									}
									elseif ($b->saldo_titulo_transacao > 9199.65 && $b->saldo_titulo_transacao <= 10336.68) {
									$ato_protesto = '17.1.13';
									}
									elseif ($b->saldo_titulo_transacao > 10336.69 && $b->saldo_titulo_transacao <= 20673.36) {
									$ato_protesto = '17.1.14';
									}
									elseif ($b->saldo_titulo_transacao > 20673.37 && $b->saldo_titulo_transacao <= 41346.72) {
									$ato_protesto = '17.1.15';
									}
									elseif ($b->saldo_titulo_transacao >  41346.73 && $b->saldo_titulo_transacao <= 62020.07) {
									$ato_protesto = '17.1.16';
									}
									elseif ($b->saldo_titulo_transacao > 62020.08 && $b->saldo_titulo_transacao <= 82693.43) {
									$ato_protesto = '17.1.17';
									}
									elseif ($b->saldo_titulo_transacao > 82693.44 && $b->saldo_titulo_transacao <= 103366.79) {
									$ato_protesto = '17.1.18';
									}
									elseif ($b->saldo_titulo_transacao > 103366.80 && $b->saldo_titulo_transacao <= 206733.58) {
									$ato_protesto = '17.1.19';
									}
									elseif ($b->saldo_titulo_transacao > 206733.59 && $b->saldo_titulo_transacao <= 310100.37) {
									$ato_protesto = '17.1.20';
									}

									elseif ($b->saldo_titulo_transacao > 310100.37 && $b->saldo_titulo_transacao <= 413467.16) {
									$ato_protesto = '17.1.21';
									}

									elseif ($b->saldo_titulo_transacao > 413467.16 && $b->saldo_titulo_transacao <= 516833.95) {
									$ato_protesto = '17.1.22';
									}

									elseif ($b->saldo_titulo_transacao > 516833.95 && $b->saldo_titulo_transacao <= 775250.93) {
									$ato_protesto = '17.1.23';
									}

									elseif ($b->saldo_titulo_transacao > 775250.93 && $b->saldo_titulo_transacao <= 1033667.90) {
									$ato_protesto = '17.1.24';
									}

									elseif ($b->saldo_titulo_transacao > 1033667.90) {
									$ato_protesto = '17.1.25';
									}
						#-----------------------------------------------------------------------------------------

						

						if ($b->localidade_titulo != '2'){
							$ato_conducao = '17.10.1';
						}
						else{
							$ato_conducao = '17.10.2';
						}				
					 ?>

					<?php if ($pagamento_diferido =='sim'): ?>
						<?php  if (!isset($_GET['semcert'])) :	 ?>
					 	17.5.1 - Certidão(Inst. Protesto).................................... R$ <?=descrimina_emols('17.5.1',1)?> <br>
					 	<?php endif ?>
					 	17.1 - Protesto.................................... R$ <?=descrimina_emols($ato_protesto,1)?> <br>
					 	<?php if ($busca_devedor->rowCount()>1){$quantidade_arquivamentos = 3;}else{$quantidade_arquivamentos =2;} ?>
					 	17.9 - Arquivamento.................................... R$ <?=descrimina_emols('17.9',$quantidade_arquivamentos+1)?> <br>
					 	<?=$ato_conducao?> - Diigência .................................... R$ <?=descrimina_emols($ato_conducao,$busca_devedor->rowCount())?> <br>
					 	17.2 - Intimacao.................................... R$ <?=descrimina_emols('17.2',$busca_devedor->rowCount())?> <br>
					 	<?php if ($b->data_edital!=''): ?>
					17.2 - Edital.................................... R$ <?=descrimina_emols('17.2',1)?> <br>
					<?php endif ?>
						<?php

						if ($b->localidade_titulo != '2') {
						$atocond = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.10.1' ");
						$atocond->execute();
						$at = $atocond->fetchAll(PDO::FETCH_OBJ);
						foreach ($at as $at) {
						$valor_cond = $at->monValor;
						$valor_cond_ferc = $at->monValorFerc;
						}
						$atoconducao = '17.10.1';
						}
						else{
						$atocond = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.10.2' ");
						$atocond->execute();
						$at = $atocond->fetchAll(PDO::FETCH_OBJ);
						foreach ($at as $at) {
						$valor_cond = $at->monValor;
						$valor_cond_ferc = $at->monValorFerc;
						}
						$atoconducao = '17.10.2';
						} 

						$atoprotesto = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '$ato_protesto' ");
						$atoprotesto->execute();
						$at = $atoprotesto->fetchAll(PDO::FETCH_OBJ);
						foreach ($at as $at) {
						$valor_ato = $at->monValor;
						$valor_ato_ferc = $at->monValorFerc;
						}


						$atocertidao = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.5.1' ");
						$atocertidao->execute();
						$at = $atocertidao->fetchAll(PDO::FETCH_OBJ);
						foreach ($at as $at) {
						if (!isset($_GET['semcert'])) {	
						$valor_cert = $at->monValor;
						$valor_cert_ferc = $at->monValorFerc;
						}
						else{
						$valor_cert = 0;
						$valor_cert_ferc = 0;	
						}
						}


						$atointimacao = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.2' ");
						$atointimacao->execute();
						$at = $atointimacao->fetchAll(PDO::FETCH_OBJ);
						foreach ($at as $at) {
						$valor_inti = $at->monValor;
						$valor_inti_ferc = $at->monValorFerc;

						if ($b->data_edital!='') {
						$valor_inti = $at->monValor*2;
						$valor_inti_ferc = $at->monValorFerc*2;
						}


						}


						$atoarquivamento = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.9' ");
						$atoarquivamento->execute();
						$at = $atoarquivamento->fetchAll(PDO::FETCH_OBJ);
						foreach ($at as $at) {
						$valor_arq = $at->monValor;
						$valor_arq_ferc = $at->monValorFerc;
						}

						$soma_diferido = descrimina_emols('17.3',1)+descrimina_emols('17.9',1)+descrimina_emols('17.5.1',1)+descrimina_emols('17.5.1',1)+descrimina_emols($ato_protesto,1)+descrimina_emols('17.9',$quantidade_arquivamentos)+descrimina_emols($ato_conducao,$busca_devedor->rowCount())+descrimina_emols('17.2',$busca_devedor->rowCount());


					   ?> 

					   <?php else: $soma_diferido = 0; ?>
					   <?php endif ?>
					<?php 
					if (!isset($_GET['semcert'])) {	
					$soma_emols = $soma_diferido- descrimina_emols('17.5.1',2);
					}	
					else{
					$soma_emols = $soma_diferido;	
					}
					
					if ($b->data_edital!='') {

					$soma_emols =  $soma_diferido + descrimina_emols('17.2',1);
					}
					else{
					$soma_emols = $soma_diferido;

					}
					?>

					
					<?php if (isset($_SESSION['taxaff']) && $_SESSION['taxaff'] == 'S'): $soma_emols_no_ferc = $soma_emols-$soma_emols*3/100; ?>
					<span style="font-weight: bold">*Conforme Leis Complementares nº 221/2019 e 222/2019.*</span><br>
					Emolumentos Acrescidos FEMP(4%).................................... R$ <?=number_format($soma_emols_no_ferc*4/100,2,",",".")?> <br>		
					Emolumentos Acrescidos FADEP(4%).................................... R$ <?=number_format($soma_emols_no_ferc*4/100,2,",",".")?> <br>
					<?php endif ?>


					
					</p>
					
				<?php if (isset($_SESSION['taxaff']) && $_SESSION['taxaff'] == 'S'): $acrescimo_ff = $soma_emols_no_ferc*8/100 ?>
					
					<p style="text-align: center; font-weight: bold">
						Total de emolumentos + Ferc.................................... R$ <?=number_format($soma_emols+$acrescimo_ff,2,",",".")?> <br>
						Total .................................... R$ <?=number_format($soma_emols+$acrescimo_ff+$b->saldo_titulo_transacao,2)?></p> <br>
					<?php $valor_recibo = number_format($soma_emols+$acrescimo_ff,2) ?>


					<?php else: ?>
					
					<p style="text-align: center; font-weight: bold">

						Total de emolumentos + Ferc.................................... R$ <?=number_format($soma_emols,2,",",".")?> <br>
						Total .................................... R$ <?=number_format($soma_emols+$b->saldo_titulo_transacao,2)?></p> <br>
					<?php $valor_recibo = number_format($soma_emols,2) ?>
					<?php endif ?>
		<p style="text-align: center">Recebi de <?=$b->nome_devedor_transacao?>, a quantia de R$ <?=$valor_recibo?>, concernente ao cancelamento do protesto do título especificado, mais emolumentos <?php if (!isset($_GET['semcert'])) : ?>e certidão de
cancelamento <?php endif ?>.</p>
<p style="text-align: center">
	
<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h):
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>

					<?=$u->cidade?>/<?=$u->uf?>,

					<?php
					$data = date('Y-m-d') ;
					$novaDataRegistro = explode("-", $data);
					echo $novaDataRegistro[2];
					/*
					if ($novaDataRegistro[2] == '01' || $novaDataRegistro[1] == '1') {
						echo " Um de  ";
					}elseif ($novaDataRegistro[2] == '02' || $novaDataRegistro[1] == '2') {
						echo " Dois de ";
					} elseif ($novaDataRegistro[2] == '03' || $novaDataRegistro[1] == '3') {
						echo " Três ";
					} elseif ($novaDataRegistro[2] == '04' || $novaDataRegistro[1] == '4') {
						echo " Quatro de ";
					} elseif ($novaDataRegistro[2] == '05' || $novaDataRegistro[1] == '5') {
						echo " Cinco de ";
					} elseif ($novaDataRegistro[2] == '06' || $novaDataRegistro[1] == '6') {
						echo " Seis de ";
					} elseif ($novaDataRegistro[2] == '07' || $novaDataRegistro[1] == '7') {
						echo " Sete de ";
					} elseif ($novaDataRegistro[2] == '08' || $novaDataRegistro[1] == '8') {
						echo " Oito de ";
					} elseif ($novaDataRegistro[2] == '09' || $novaDataRegistro[1] == '9') {
						echo " Nove de ";
					} else {echo  ucfirst(GExtenso::numero($novaDataRegistro[2]));}
					//Será exibido na tela a data: 16/02/2015
					// . "de".$novaDataRegistro[1] . " de " . GExtenso::numero ($novaDataRegistro[0])
					*/
					if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
						echo " de Janeiro de ";
					}elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
						echo " de Fevereiro de ";
					} elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
						echo " de Março de ";
					} elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
						echo " de Abril de ";
					} elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
						echo " de Maio de ";
					} elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
						echo " de Junho de ";
					} elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
						echo " de Julho de ";
					} elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
						echo " de Agosto de ";
					} elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
						echo " de Setembro de ";
					} elseif ($novaDataRegistro[1] == '10') {
						echo " de Outubro de ";
					} elseif ($novaDataRegistro[1] == '11') {
						echo " de Novembro de ";
					} elseif ($novaDataRegistro[1] == '12') {
						echo " de Dezembro de ";
					} else {
						echo "Não definido";
					}

					echo $novaDataRegistro[0];

					?>.
					<?php endforeach; endforeach ?>
					 <br><br>
	_______________________________________ <br>
	<?php if (isset($_SESSION['permissao']) && $_SESSION['permissao'] == 'S'): ?>
					<?=$_SESSION['nome']?><br>
					<?=$_SESSION['funcao']?>
					<?php else: ?>
						<?=mb_strtoupper($titular)?><br>
						TABELIAO/OFICIAL
					<?php endif ?>

</p>
<p style="text-align: right"><?=date('d/m/Y H:i')	?></p>
	</td>
	</tr>
</table>
<br>
<table style="width: 100%; border: 2px solid black; padding-bottom:10px;margin-bottom: -20px; ">
	<tr>
	<td style="border:none;font-weight: bold;text-transform: uppercase;">
<h3 style="text-align: center">CERTIDÃO</h3>
CERTIFICO para todos os fins de direito que foi CANCELADO nesta data o protesto
referente ao título nº <?=$b->numero_titulo_transacao?>, no qual consta como devedor <?=$b->nome_devedor_transacao?>.
O referido é verdade e dou fé.
<p style="text-align: center">
	
<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h):
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>

					<?=$u->cidade?>/<?=$u->uf?>,

					<?php
					$data = date('Y-m-d') ;
					$novaDataRegistro = explode("-", $data);
					echo $novaDataRegistro[2];
					/*
					if ($novaDataRegistro[2] == '01' || $novaDataRegistro[1] == '1') {
						echo " Um de  ";
					}elseif ($novaDataRegistro[2] == '02' || $novaDataRegistro[1] == '2') {
						echo " Dois de ";
					} elseif ($novaDataRegistro[2] == '03' || $novaDataRegistro[1] == '3') {
						echo " Três ";
					} elseif ($novaDataRegistro[2] == '04' || $novaDataRegistro[1] == '4') {
						echo " Quatro de ";
					} elseif ($novaDataRegistro[2] == '05' || $novaDataRegistro[1] == '5') {
						echo " Cinco de ";
					} elseif ($novaDataRegistro[2] == '06' || $novaDataRegistro[1] == '6') {
						echo " Seis de ";
					} elseif ($novaDataRegistro[2] == '07' || $novaDataRegistro[1] == '7') {
						echo " Sete de ";
					} elseif ($novaDataRegistro[2] == '08' || $novaDataRegistro[1] == '8') {
						echo " Oito de ";
					} elseif ($novaDataRegistro[2] == '09' || $novaDataRegistro[1] == '9') {
						echo " Nove de ";
					} else {echo  ucfirst(GExtenso::numero($novaDataRegistro[2]));}
					//Será exibido na tela a data: 16/02/2015
					// . "de".$novaDataRegistro[1] . " de " . GExtenso::numero ($novaDataRegistro[0])
					*/
					if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
						echo " de Janeiro de ";
					}elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
						echo " de Fevereiro de ";
					} elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
						echo " de Março de ";
					} elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
						echo " de Abril de ";
					} elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
						echo " de Maio de ";
					} elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
						echo " de Junho de ";
					} elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
						echo " de Julho de ";
					} elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
						echo " de Agosto de ";
					} elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
						echo " de Setembro de ";
					} elseif ($novaDataRegistro[1] == '10') {
						echo " de Outubro de ";
					} elseif ($novaDataRegistro[1] == '11') {
						echo " de Novembro de ";
					} elseif ($novaDataRegistro[1] == '12') {
						echo " de Dezembro de ";
					} else {
						echo "Não definido";
					}

					echo $novaDataRegistro[0];

					?>.
					<?php endforeach; endforeach ?>
					 <br><br>
	_______________________________________ <br>
	<?php if (isset($_SESSION['permissao']) && $_SESSION['permissao'] == 'S'): ?>
					<?=$_SESSION['nome']?><br>
					<?=$_SESSION['funcao']?>
					<?php else: ?>
						<?=mb_strtoupper($titular)?><br>
						TABELIAO/OFICIAL
					<?php endif ?>

</p>
<?php if (!isset($_GET['semcert'])) : ?>
<p style="text-align: right;">Emolumentos com FERC, R$ 34,00
<br>Item da Tabela 17.5.1</p>
<?php endif ?>
</td>
</tr>
</table><br><br>
<?php if ($pagamento_diferido != 'sim'): ?>
						<?php if (!isset($_GET['semcert'])): ?>
						<div style="position: absolute;width: 50px; margin-left: 50px;width: 200px;margin-top: 40px;"> 
 					<?php 
 					
					$retorno3 = json_decode($b->RETORNOSELODIGITAL3,true);
					$qr3 = $retorno3['valorQrCode'];
					$textoselo3 = $retorno3['textoSelo'];

 					 ?>	

 					 <?php

					include_once('../../../plugins/phpqrcode/qrlib.php');
					$img_local = "qrimagens/";
					$img_nome = $b->numero_protocolo_cartorio_transacao.'-3cancelamento.png';
					$nome = $img_local.$img_nome;

					$conteudo = $qr3;
					QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


					echo '<img style="max-width:100%; margin-left:40px;" src="'.$nome.'" />';
					?>
					<p style="font-weight: bold; font-size: 6px;max-width: 100%;text-align: center"><?=$textoselo3?></p>
 					</div>
 					<?php endif ?>
					<div style="position: absolute;width: 50px; margin-left: 360px;width: 200px;margin-top: 40px;"> 
 					<?php 
 					
					$retorno = json_decode($b->RETORNOSELODIGITAL,true);
					$qr = $retorno['valorQrCode'];
					$textoselo = $retorno['textoSelo'];

 					 ?>	

 					 <?php

					include_once('../../../plugins/phpqrcode/qrlib.php');
					$img_local = "qrimagens/";
					$img_nome = $b->numero_protocolo_cartorio_transacao.'cancelamento.png';
					$nome = $img_local.$img_nome;

					$conteudo = $qr;
					QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


					echo '<img style="max-width:100%; margin-left:40px;" src="'.$nome.'" />';
					?>
					<p style="font-weight: bold; font-size: 6px;max-width: 100%;text-align: center"><?=$textoselo?></p>
 					</div>
 						
 						<div style="position: absolute;width: 50px; margin-left: 680px;width: 200px;margin-top: 40px;"> 
 					<?php 
 					
					$retorno2 = json_decode($b->RETORNOSELODIGITAL2,true);
					$qr2 = $retorno2['valorQrCode'];
					$textoselo2 = $retorno2['textoSelo'];

 					 ?>	

 					 <?php

					include_once('../../../plugins/phpqrcode/qrlib.php');
					$img_local = "qrimagens/";
					$img_nome = $b->numero_protocolo_cartorio_transacao.'-2cancelamento.png';
					$nome = $img_local.$img_nome;

					$conteudo = $qr2;
					QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


					echo '<img style="max-width:100%; margin-left:40px;" src="'.$nome.'" />';
					?>
					<p style="font-weight: bold; font-size: 6px;max-width: 100%;text-align: center"><?=$textoselo2?></p>
 					</div>
 					
 					<?php endif ?>







 					<?php 
$busca_selos_diferidos = $pdo->prepare("SELECT * FROM auditoria where strTipoSelo ='CPC' AND Ordem = '$b->numero_protocolo_cartorio_transacao'");
$busca_selos_diferidos->execute();
if ($busca_selos_diferidos->rowCount()<1) {

if ($pagamento_diferido == 'sim') { 					

 					 if ($token !='') {


      #SELO1 - 17.3...: ===============================================================================================

							$ato_praticado = '17.3';
							$escrevente = $_SESSION['nome'];
							$isento = 'true';
							$motivo_isento='Teste';
							$nomeparte1 =$b->nome_sacador_vendedor_transacao;
							$nomeparte2 =$b->nome_devedor_transacao;
							$nomeparte3 ='';
							$docparte3='';
							$nomeparte4 ='';
							$docparte4='';
							$livro ='';
							$folha='';


							$ConteudoPOST = '{
							"ato" :{
							"codigo":"17.3",
							"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
							},
							"natureza":{
							"tipo":"8"
							},
							"partes": {
							"nomesPartes":"X",
							"parteAto":[
							{
							"nome":"'.$nomeparte1.'"
							},
							{
							"nome":"'.$nomeparte2.'"
							}
							]},
							
							"selo":{
							"escrevente":"'.$escrevente.'",
							"protocolo": "'.$b->numero_protocolo_cartorio_transacao.'",
                            "valorTitulo": "'.$b->saldo_titulo_transacao.'"
							}



							}';

							$ConteudoCabecalho = [
							'Authorization: Bearer'.$token,
							"Content-Type: application/json"

							];



							$handler = curl_init($_SESSION['urlselodigital'].'protesto/baixa-cancelamento');

							curl_setopt_array($handler, [

							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS =>"$ConteudoPOST",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer $token",
							"Content-Type: application/json"
							),
							]);

							$resp = curl_exec($handler);
							$resp = json_decode($resp, true);
							#var_dump($resp);
							#echo curl_error($handler);
							$erro = curl_error($handler);
							if (isset($resp['status'])) {
							#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
							header('Location: ' . $_SERVER['HTTP_REFERER']);
							break;
							}
							$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
							$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
							$QRCODE = $resp['resumos'][0]['valorQrCode'];
							$RETORNO = json_encode($resp['resumos'][0]);
							$_SESSION['SELOOLD'] =$SELO;
							$_SESSION['sucesso'] = $SELO;
							#echo $resp['resumos'][0]['dataGeracao'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#$info = curl_getinfo($handler);
							#var_dump($info);
							#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




							if ($erro!='') {
							$erro;
							}






							else{

							#parte de auditoria:
							$LIVRO = '0';
							$FOLHA = '0';
							$TERMO = $b->numero_protocolo_cartorio_transacao;
							$ATO = '17.3';
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','CANCELAMENTO_PROTESTO','5','1','$SELO',CURRENT_TIMESTAMP,'CPC','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
							$insert_auditoria->execute();


							#$_POST['SELO2'] = $SELO;  



							}
	 	 
	  #SELO - 17.9...: ===============================================================================================
							$ato_praticado = '17.9';
							$escrevente = $_SESSION['nome'];
							$isento = 'true';
							$motivo_isento='Teste';
							$nomeparte1 =$b->nome_sacador_vendedor_transacao;
							$nomeparte2 =$b->nome_devedor_transacao;
							$nomeparte3 ='';
							$docparte3='';
							$nomeparte4 ='';
							$docparte4='';
							$livro ='';
							$folha='';


							$ConteudoPOST = '{
							"ato" :{
							"codigo":"17.9",
							"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
							},
							"escrevente":"'.$escrevente.'",
							"natureza":{
							"tipo":"0"
							},
							"partes": {
							"nomesPartes":"X",
							"parteAto":[
							{
							"nome":"'.$nomeparte1.'"
							},
							{
							"nome":"'.$nomeparte2.'"
							}
							]},
							
							"selo":{
							"escrevente":"'.$escrevente.'",
							"protocolo": "'.$b->numero_protocolo_cartorio_transacao.'",
                            "valorTitulo": "'.$b->saldo_titulo_transacao.'"
							}



							}';

							$ConteudoCabecalho = [
							'Authorization: Bearer'.$token,
							"Content-Type: application/json"

							];



							$handler = curl_init($_SESSION['urlselodigital'].'protesto/atos-em-geral');

							curl_setopt_array($handler, [

							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS =>"$ConteudoPOST",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer $token",
							"Content-Type: application/json"
							),
							]);

							$resp = curl_exec($handler);
							$resp = json_decode($resp, true);
							#var_dump($resp);
							#echo curl_error($handler);
							$erro = curl_error($handler);
							if (isset($resp['status'])) {
							#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
							header('Location: ' . $_SERVER['HTTP_REFERER']);
							break;
							}
							$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
							$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
							$QRCODE = $resp['resumos'][0]['valorQrCode'];
							$RETORNO2 = json_encode($resp['resumos'][0]);
							$_SESSION['SELOOLD'] =$SELO;
							$_SESSION['sucesso'] = $SELO;
							#echo $resp['resumos'][0]['dataGeracao'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#$info = curl_getinfo($handler);
							#var_dump($info);
							#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




							if ($erro!='') {
							$erro;
							}






							else{

							#parte de auditoria:
							$LIVRO = '0';
							$FOLHA = '0';
							$TERMO = $b->numero_protocolo_cartorio_transacao;
							$ATO = '17.9';
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','ARQUIVAMENTO','5','1','$SELO',CURRENT_TIMESTAMP,'CPC','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO2')");
							$insert_auditoria->execute();


							#$_POST['SELO2'] = $SELO;  



							}
							
	  if (!isset($_GET['semcertcancelamento'])) {	 
	  #SELO - 17.5.1...: ===============================================================================================
							$ato_praticado = '17.5.1';
							$escrevente = $_SESSION['nome'];
							$isento = 'true';
							$motivo_isento='Teste';
							$nomeparte1 =$b->nome_sacador_vendedor_transacao;
							$nomeparte2 =$b->nome_devedor_transacao;
							$nomeparte3 ='';
							$docparte3='';
							$nomeparte4 ='';
							$docparte4='';
							$livro ='';
							$folha='';


							$ConteudoPOST = '{
							"ato" :{
							"codigo":"17.5.1",
							"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
							},
							"natureza":{
							"tipo":"0"
							},
							"partes": {
							"nomesPartes":"X",
							"parteAto":[
							{
							"nome":"'.$nomeparte1.'"
							},
							{
							"nome":"'.$nomeparte2.'"
							}
							]},
							
							"selo":{
							"escrevente":"'.$escrevente.'",
							"protocolo": "'.$b->numero_protocolo_cartorio_transacao.'",
                            "valorTitulo": "'.$b->saldo_titulo_transacao.'"
							}



							}';

							$ConteudoCabecalho = [
							'Authorization: Bearer'.$token,
							"Content-Type: application/json"

							];



							$handler = curl_init($_SESSION['urlselodigital'].'protesto/certidao');

							curl_setopt_array($handler, [

							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS =>"$ConteudoPOST",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer $token",
							"Content-Type: application/json"
							),
							]);

							$resp = curl_exec($handler);
							$resp = json_decode($resp, true);
							#var_dump($resp);
							#echo curl_error($handler);
							$erro = curl_error($handler);
							if (isset($resp['status'])) {
							#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
							header('Location: ' . $_SERVER['HTTP_REFERER']);
							break;
							}
							$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
							$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
							$QRCODE = $resp['resumos'][0]['valorQrCode'];
							$RETORNO3 = json_encode($resp['resumos'][0]);
							$_SESSION['SELOOLD'] =$SELO;
							$_SESSION['sucesso'] = $SELO;
							#echo $resp['resumos'][0]['dataGeracao'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#$info = curl_getinfo($handler);
							#var_dump($info);
							#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




							if ($erro!='') {
							$erro;
							}






							else{

							#parte de auditoria:
							$LIVRO = '0';
							$FOLHA = '0';
							$TERMO = $b->numero_protocolo_cartorio_transacao;
							$ATO = '17.5.1';
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','CERTIDAO_CANCELAMENTO','5','1','$SELO',CURRENT_TIMESTAMP,'CPC','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO3')");
							$insert_auditoria->execute();


							#$_POST['SELO2'] = $SELO;  



							}												
      }

      #SELO1 - 17.1...: ===============================================================================================

							$ato_praticado = '17.1';
							$escrevente = $_SESSION['nome'];
							$isento = 'true';
							$motivo_isento='Teste';
							$nomeparte1 =$b->nome_sacador_vendedor_transacao;
							$nomeparte2 =$b->nome_devedor_transacao;
							$nomeparte3 ='';
							$docparte3='';
							$nomeparte4 ='';
							$docparte4='';
							$livro ='';
							$folha='';


							$ConteudoPOST = '{
							"ato" :{
							"codigo":"17.1",
							"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
							},
							"natureza":{
							"tipo":"8"
							},
							"partes": {
							"nomesPartes":"X",
							"parteAto":[
							{
							"nome":"'.$nomeparte1.'"
							},
							{
							"nome":"'.$nomeparte2.'"
							}
							]},
							
							"selo":{
							"escrevente":"'.$escrevente.'",
							"protocolo": "'.$b->numero_protocolo_cartorio_transacao.'",
							"valorTitulo": "'.$b->saldo_titulo_transacao.'"
							}



							}';

							$ConteudoCabecalho = [
							'Authorization: Bearer'.$token,
							"Content-Type: application/json"

							];



							$handler = curl_init($_SESSION['urlselodigital'].'protesto/titulo');

							curl_setopt_array($handler, [

							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS =>"$ConteudoPOST",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer $token",
							"Content-Type: application/json"
							),
							]);

							$resp = curl_exec($handler);
							$resp = json_decode($resp, true);
							#var_dump($resp);
							#echo curl_error($handler);
							$erro = curl_error($handler);
							if (isset($resp['status'])) {
							#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
							header('Location: ' . $_SERVER['HTTP_REFERER']);
							break;
							}
							$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
							$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
							$QRCODE = $resp['resumos'][0]['valorQrCode'];
							$RETORNO4 = json_encode($resp['resumos'][0]);
							$_SESSION['SELOOLD'] =$SELO;
							$_SESSION['sucesso'] = $SELO;
							#echo $resp['resumos'][0]['dataGeracao'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#$info = curl_getinfo($handler);
							#var_dump($info);
							#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




							if ($erro!='') {
							$erro;
							}






							else{

							#parte de auditoria:
							$LIVRO = '0';
							$FOLHA = '0';
							$TERMO = $b->numero_protocolo_cartorio_transacao;
							$ATO = '17.1';
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','PROTESTO','5','1','$SELO',CURRENT_TIMESTAMP,'CPC','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO4')");
							$insert_auditoria->execute();


							#$_POST['SELO2'] = $SELO;  



							}
	  
	  #SELO - 17.9...: ===============================================================================================
							$ato_praticado = '17.9';
							$escrevente = $_SESSION['nome'];
							$isento = 'true';
							$motivo_isento='Teste';
							$nomeparte1 =$b->nome_sacador_vendedor_transacao;
							$nomeparte2 =$b->nome_devedor_transacao;
							$nomeparte3 ='';
							$docparte3='';
							$nomeparte4 ='';
							$docparte4='';
							$livro ='';
							$folha='';


							$ConteudoPOST = '{
							"ato" :{
							"codigo":"17.9",
							"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
							},
							"escrevente":"'.$escrevente.'",
							"natureza":{
							"tipo":"0"
							},
							"partes": {
							"nomesPartes":"X",
							"parteAto":[
							{
							"nome":"'.$nomeparte1.'"
							},
							{
							"nome":"'.$nomeparte2.'"
							}
							]},
							"quantidade":"'.$quantidade_arquivamentos.'",
							"selo":{	
							"escrevente":"'.$escrevente.'",
							"protocolo": "'.$b->numero_protocolo_cartorio_transacao.'",
							"valorTitulo": "'.$b->saldo_titulo_transacao.'"
							}



							}';

							$ConteudoCabecalho = [
							'Authorization: Bearer'.$token,
							"Content-Type: application/json"

							];



							$handler = curl_init($_SESSION['urlselodigital'].'protesto/atos-em-geral');

							curl_setopt_array($handler, [

							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS =>"$ConteudoPOST",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer $token",
							"Content-Type: application/json"
							),
							]);

							$resp = curl_exec($handler);
							$resp = json_decode($resp, true);
							#var_dump($resp);
							#echo curl_error($handler);
							$erro = curl_error($handler);
							if (isset($resp['status'])) {
							#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
							header('Location: ' . $_SERVER['HTTP_REFERER']);
							break;
							}
							$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
							$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
							$QRCODE = $resp['resumos'][0]['valorQrCode'];
							$RETORNO5 = json_encode($resp['resumos'][0]);
							$_SESSION['SELOOLD'] =$SELO;
							$_SESSION['sucesso'] = $SELO;
							#echo $resp['resumos'][0]['dataGeracao'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#$info = curl_getinfo($handler);
							#var_dump($info);
							#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




							if ($erro!='') {
							$erro;
							}






							else{

							#parte de auditoria:
							$LIVRO = '0';
							$FOLHA = '0';
							$TERMO = $b->numero_protocolo_cartorio_transacao;
							$ATO = '17.9';
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','ARQUIVAMENTO','5','1','$SELO',CURRENT_TIMESTAMP,'CPC','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO5')");
							$insert_auditoria->execute();


							#$_POST['SELO2'] = $SELO;  



							}
	  
	  #SELO - CONDUÇÃO...: ===============================================================================================
							if ($b->localidade_titulo != '2') {
							$atoagora = '17.10.1';
							}
							else{
							$atoagora = '17.10.2';
							}
								
							$ato_praticado = $atoagora;
							$escrevente = $_SESSION['nome'];
							$isento = 'true';
							$motivo_isento='Teste';
							$nomeparte1 =$b->nome_sacador_vendedor_transacao;
							$nomeparte2 =$b->nome_devedor_transacao;
							$nomeparte3 ='';
							$docparte3='';
							$nomeparte4 ='';
							$docparte4='';
							$livro ='';
							$folha='';


							$ConteudoPOST = '{
							"ato" :{
							"codigo":"'.$atoagora.'",
							"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
							},
							"escrevente":"'.$escrevente.'",
							"natureza":{
							"tipo":"0"
							},
							"partes": {
							"nomesPartes":"X",
							"parteAto":[
							{
							"nome":"'.$nomeparte1.'"
							},
							{
							"nome":"'.$nomeparte2.'"
							}
							]},
							"quantidade":"'.$busca_devedor->rowCount().'",
							"selo":{
							"escrevente":"'.$escrevente.'",
							"protocolo": "'.$b->ID.'",
                            "valorTitulo": "'.$b->saldo_titulo_transacao.'"
							}



							}';

							$ConteudoCabecalho = [
							'Authorization: Bearer'.$token,
							"Content-Type: application/json"

							];



							$handler = curl_init($_SESSION['urlselodigital'].'protesto/atos-em-geral');

							curl_setopt_array($handler, [

							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS =>"$ConteudoPOST",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer $token",
							"Content-Type: application/json"
							),
							]);

							$resp = curl_exec($handler);
							$resp = json_decode($resp, true);
							#var_dump($resp);
							#echo curl_error($handler);
							$erro = curl_error($handler);
							if (isset($resp['status'])) {
							#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
							header('Location: ' . $_SERVER['HTTP_REFERER']);
							break;
							}
							$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
							$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
							$QRCODE = $resp['resumos'][0]['valorQrCode'];
							$RETORNO6 = json_encode($resp['resumos'][0]);
							$_SESSION['SELOOLD'] =$SELO;
							$_SESSION['sucesso'] = $SELO;
							#echo $resp['resumos'][0]['dataGeracao'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#$info = curl_getinfo($handler);
							#var_dump($info);
							#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




							if ($erro!='') {
							$erro;
							}






							else{

							#parte de auditoria:
							$LIVRO = '0';
							$FOLHA = '0';
							$TERMO = $b->numero_protocolo_cartorio_transacao;
							$ATO = $atoagora;
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','CONDUCAO','5','1','$SELO',CURRENT_TIMESTAMP,'CPC','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO6')");
							$insert_auditoria->execute();


							#$_POST['SELO2'] = $SELO;  



							}																									
	  if (!isset($_GET['semcert'])) {	 
	  #SELO - 17.5.1...: ===============================================================================================
							$ato_praticado = '17.5.1';
							$escrevente = $_SESSION['nome'];
							$isento = 'true';
							$motivo_isento='Teste';
							$nomeparte1 =$b->nome_sacador_vendedor_transacao;
							$nomeparte2 =$b->nome_devedor_transacao;
							$nomeparte3 ='';
							$docparte3='';
							$nomeparte4 ='';
							$docparte4='';
							$livro ='';
							$folha='';


							$ConteudoPOST = '{
							"ato" :{
							"codigo":"17.5.1",
							"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
							},
							"natureza":{
							"tipo":"0"
							},
							"partes": {
							"nomesPartes":"X",
							"parteAto":[
							{
							"nome":"'.$nomeparte1.'"
							},
							{
							"nome":"'.$nomeparte2.'"
							}
							]},
							
							"selo":{
							"escrevente":"'.$escrevente.'",
							"protocolo": "'.$b->numero_protocolo_cartorio_transacao.'",
							"valorTitulo": "'.$b->saldo_titulo_transacao.'"
							}



							}';

							$ConteudoCabecalho = [
							'Authorization: Bearer'.$token,
							"Content-Type: application/json"

							];



							$handler = curl_init($_SESSION['urlselodigital'].'protesto/certidao');

							curl_setopt_array($handler, [

							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS =>"$ConteudoPOST",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer $token",
							"Content-Type: application/json"
							),
							]);

							$resp = curl_exec($handler);
							$resp = json_decode($resp, true);
							#var_dump($resp);
							#echo curl_error($handler);
							$erro = curl_error($handler);
							if (isset($resp['status'])) {
							#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
							header('Location: ' . $_SERVER['HTTP_REFERER']);
							break;
							}
							$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
							$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
							$QRCODE = $resp['resumos'][0]['valorQrCode'];
							$RETORNO7 = json_encode($resp['resumos'][0]);
							$_SESSION['SELOOLD'] =$SELO;
							$_SESSION['sucesso'] = $SELO;
							#echo $resp['resumos'][0]['dataGeracao'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#$info = curl_getinfo($handler);
							#var_dump($info);
							#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




							if ($erro!='') {
							$erro;
							}






							else{

							#parte de auditoria:
							$LIVRO = '0';
							$FOLHA = '0';
							$TERMO = $b->numero_protocolo_cartorio_transacao;
							$ATO = '17.5.1';
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','INSTRUMENTO_PROTESTO','5','1','$SELO',CURRENT_TIMESTAMP,'CPC','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO7')");
							$insert_auditoria->execute();


							#$_POST['SELO2'] = $SELO;  



							}												
      }
      if ($b->data_edital!=''){
      	#SELO - 17.2...: ===============================================================================================
							$ato_praticado = '17.2';
							$escrevente = $_SESSION['nome'];
							$isento = 'true';
							$motivo_isento='Teste';
							$nomeparte1 =$b->nome_sacador_vendedor_transacao;
							$nomeparte2 =$b->nome_devedor_transacao;
							$nomeparte3 ='';
							$docparte3='';
							$nomeparte4 ='';
							$docparte4='';
							$livro ='';
							$folha='';


							$ConteudoPOST = '{
							"ato" :{
							"codigo":"17.2",
							"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
							},
							"escrevente":"'.$escrevente.'",
							"natureza":{
							"tipo":"0"
							},
							"partes": {
							"nomesPartes":"X",
							"parteAto":[
							{
							"nome":"'.$nomeparte1.'"
							},
							{
							"nome":"'.$nomeparte2.'"
							}
							]},
							
							"selo":{
							"escrevente":"'.$escrevente.'",
							"protocolo": "'.$b->numero_protocolo_cartorio_transacao.'",
                            "valorTitulo": "'.$b->saldo_titulo_transacao.'"
							}



							}';

							$ConteudoCabecalho = [
							'Authorization: Bearer'.$token,
							"Content-Type: application/json"

							];



							$handler = curl_init($_SESSION['urlselodigital'].'protesto/intimacao');

							curl_setopt_array($handler, [

							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS =>"$ConteudoPOST",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer $token",
							"Content-Type: application/json"
							),
							]);

							$resp = curl_exec($handler);
							$resp = json_decode($resp, true);
							#var_dump($resp);
							#echo curl_error($handler);
							$erro = curl_error($handler);
							if (isset($resp['status'])) {
							#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
							header('Location: ' . $_SERVER['HTTP_REFERER']);
							break;
							}
							$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
							$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
							$QRCODE = $resp['resumos'][0]['valorQrCode'];
							$RETORNO2 = json_encode($resp['resumos'][0]);
							$_SESSION['SELOOLD'] =$SELO;
							$_SESSION['sucesso'] = $SELO;
							#echo $resp['resumos'][0]['dataGeracao'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#$info = curl_getinfo($handler);
							#var_dump($info);
							#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




							if ($erro!='') {
							$erro;
							}






							else{

							#parte de auditoria:
							$LIVRO = '0';
							$FOLHA = '0';
							$TERMO = $b->numero_protocolo_cartorio_transacao;
							$ATO = '17.2';
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','EDITAL_INTIMACAO','5','1','$SELO',CURRENT_TIMESTAMP,'CPC','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO2')");
							$insert_auditoria->execute();


							#$_POST['SELO2'] = $SELO;  



							}
      }

for ($i=1; $i <=$busca_devedor->rowCount() ; $i++) { 
#SELO - 17.2...: ===============================================================================================
							$ato_praticado = '17.2';
							$escrevente = $_SESSION['nome'];
							$isento = 'true';
							$motivo_isento='Teste';
							$nomeparte1 =$b->nome_sacador_vendedor_transacao;
							$nomeparte2 =$b->nome_devedor_transacao;
							$nomeparte3 ='';
							$docparte3='';
							$nomeparte4 ='';
							$docparte4='';
							$livro ='';
							$folha='';


							$ConteudoPOST = '{
							"ato" :{
							"codigo":"17.2",
							"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
							},
							"escrevente":"'.$escrevente.'",
							"natureza":{
							"tipo":"0"
							},
							"partes": {
							"nomesPartes":"X",
							"parteAto":[
							{
							"nome":"'.$nomeparte1.'"
							},
							{
							"nome":"'.$nomeparte2.'"
							}
							]},
							"quantidade":"'.$busca_devedor->rowCount().'",
							"selo":{
							"escrevente":"'.$escrevente.'",
							"protocolo": "'.$b->numero_protocolo_cartorio_transacao.'",
                            "valorTitulo": "'.$b->saldo_titulo_transacao.'"
							}



							}';

							$ConteudoCabecalho = [
							'Authorization: Bearer'.$token,
							"Content-Type: application/json"

							];



							$handler = curl_init($_SESSION['urlselodigital'].'protesto/intimacao');

							curl_setopt_array($handler, [

							CURLOPT_RETURNTRANSFER => true,
							CURLOPT_ENCODING => "",
							CURLOPT_MAXREDIRS => 10,
							CURLOPT_SSL_VERIFYHOST => 0,
							CURLOPT_SSL_VERIFYPEER => 0,
							CURLOPT_TIMEOUT => 0,
							CURLOPT_FOLLOWLOCATION => false,
							CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
							CURLOPT_CUSTOMREQUEST => "POST",
							CURLOPT_POSTFIELDS =>"$ConteudoPOST",
							CURLOPT_HTTPHEADER => array(
							"Authorization: Bearer $token",
							"Content-Type: application/json"
							),
							]);

							$resp = curl_exec($handler);
							$resp = json_decode($resp, true);
							#var_dump($resp);
							#echo curl_error($handler);
							$erro = curl_error($handler);
							if (isset($resp['status'])) {
							#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
							header('Location: ' . $_SERVER['HTTP_REFERER']);
							break;
							}
							$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
							$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
							$QRCODE = $resp['resumos'][0]['valorQrCode'];
							$RETORNO12 = json_encode($resp['resumos'][0]);
							$_SESSION['SELOOLD'] =$SELO;
							$_SESSION['sucesso'] = $SELO;
							#echo $resp['resumos'][0]['dataGeracao'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#echo $resp['resumos'][0]['numeroSelo'].'<br>';
							#$info = curl_getinfo($handler);
							#var_dump($info);
							#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




							if ($erro!='') {
							$erro;
							}






							else{

							#parte de auditoria:
							$LIVRO = '0';
							$FOLHA = '0';
							$TERMO = $b->numero_protocolo_cartorio_transacao;
							$ATO = '17.2';
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','INTIMACAO','5','1','$SELO',CURRENT_TIMESTAMP,'CPC','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO12')");
							$insert_auditoria->execute();


							#$_POST['SELO2'] = $SELO;  



							}
}

}
}
}


 					 ?>
<div style="margin-top: -1px; ">
<?php if ($pagamento_diferido == 'sim'): 
$busca_selos_diferidos = $pdo->prepare("SELECT * FROM auditoria where strTipoSelo ='CPC' AND Ordem = '$b->numero_protocolo_cartorio_transacao'");
$busca_selos_diferidos->execute();
$linha_diferido = $busca_selos_diferidos->fetchAll(PDO::FETCH_OBJ);
foreach ($linha_diferido as $l):?>

<div style="display: inline-block;width: 50px;width: 120px; margin-left: 5px;"> 
 					<?php 
 					
					$retorno = json_decode($l->retorno,true);
					$qr = $retorno['valorQrCode'];
					$textoselo = $retorno['textoSelo'];

 					 ?>	

 					 <?php

					include_once('../../../plugins/phpqrcode/qrlib.php');
					$img_local = "qrimagens/";
					$img_nome = $b->numero_protocolo_cartorio_transacao.$l->id.'cancelamento.png';
					$nome = $img_local.$img_nome;

					$conteudo = $qr;
					QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


					echo '<img style="max-width:100%; margin-left:10px;" src="'.$nome.'" />';
					?>
					<p style="font-weight: bold; font-size: 7px;max-width: 100%;text-align: center"><?=$textoselo?></p>
 					</div>


<?php endforeach; endif ?>

</div>





<div style="page-break-after: always;"></div>
<?php endforeach ?>	
<?php endfor ?>
<?php if ($token!=''): ?>
	<script type="text/javascript">
		window.Location.reload();
	</script>
<?php endif ?>
</body>
</html>
