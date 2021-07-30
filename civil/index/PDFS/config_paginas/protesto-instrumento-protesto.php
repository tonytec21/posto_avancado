
<!DOCTYPE html>
<?php include('../../../controller/db_functions.php');
$pdo = conectar();
$id = explode("-", $_GET['id']);

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

$ato = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.2' or strCodigoLei = '17.5.1' or strCodigoLei = '17.9' or strCodigoLei = '17.10.1'  ");
$ato->execute();
$at = $ato->fetchAll(PDO::FETCH_OBJ);
$valoratoferj = 0;
$valoratoferc = 0;
$valoratocustas = 0;

foreach ($at as $at) {
$valoratoferj += $at->monValor;
$valoratoferc += $at->monValorFerc;
$valoratocustas += $at->monValor + $at->monValorFerc;
}

if (!isset($token)) {
$token= '';
}

?>
<html>
<head>

</head>

<body style="padding-top: -20px;">


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
$pesquisa_apresentante = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$b->numero_codigo_portador_transacao'");
			$pesquisa_apresentante->execute();
			$l = $pesquisa_apresentante->fetchAll(PDO::FETCH_OBJ);
			foreach ($l as $l) {
			$pagamento_diferido = $l->pagamento_diferido;
			}
									
		  if ($pagamento_diferido == 'sim') {
				$selo = 'DIFERIDO';
				unset($token);	
				echo '
				<div style="position: absolute;width: 100px; margin-left: 650px;border: 1px solid silver; padding: 50px;">
				<img src="../../../images/brasao_ma.png" style="width: 40%;margin-left:28px; margin-top:-40px; ">
				<h4 style="margin-bottom:-15px;min-width:160%;margin-left:-33px;text-align:center;margin-top:0px">EMOLUMENTOS DIFERIDOS</h4>
				<h5 style="margin-bottom:-15px;min-width:200%;margin-left:-52px;text-align:center;">Documento dispensado do Selo de fiscalização</h5>
				<h5 style="margin-bottom:-40px;min-width:200%;margin-left:-50px;text-align:center;">Provimentos 04/12, 21/15 e 36/17, da CGJ/MA</h5>
				</div>
				';
				}
 		  else{ 	 			
if ($token !='') {


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
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','PROTESTO','5','1','$SELO',CURRENT_TIMESTAMP,'GER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
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
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','ARQUIVAMENTO','5','1','$SELO',CURRENT_TIMESTAMP,'GER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
							UPDATE_CAMPO_ID('protesto_automatico_transacao','RETORNOSELODIGITAL2',strip_tags($RETORNO2),$id_unic);
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
							$TERMO = '0';
							$ATO = $atoagora;
							$TIPOPAPEL = '0';
							$NUMEROPAPEL = '0';  
							$funcionario = $_SESSION['nome'];
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','CONDUCAO','5','1','$SELO',CURRENT_TIMESTAMP,'GER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
							UPDATE_CAMPO_ID('protesto_automatico_transacao','RETORNOSELODIGITAL4',strip_tags($RETORNO4),$id_unic);
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
							$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','INSTRUMENTO_PROTESTO','5','1','$SELO',CURRENT_TIMESTAMP,'GER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
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

 	<?php if ($pagamento_diferido != 'sim'): ?>
 		<?php if (!isset($_GET['semcert'])): ?>
 					<div style="position: absolute;margin-left: -20px;width: 40%;display: block;"> 
				 					<?php 
				 					
									$retorno3 = json_decode($b->RETORNOSELODIGITAL3,true);
									$qr3 = $retorno3['valorQrCode'];
									$textoselo3 = $retorno3['textoSelo'];

				 					 ?>	

				 					 <?php

									include_once('../../../plugins/phpqrcode/qrlib.php');
									$img_local = "qrimagens/";
									$img_nome = $b->numero_protocolo_cartorio_transacao.'-3instprot.png';
									$nome = $img_local.$img_nome;

									$conteudo = $qr3;
									QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


									echo '<img style="max-width:20%; margin-left:40px;display:inline-block;" src="'.$nome.'" />';
									?>
									<p style="font-weight: bold; font-size: 6px;width: 40%;display:inline-block;text-align: center"><?=$textoselo3?></p>
 					</div>
 				<?php endif ?>
 					<div style="position: absolute;margin-left: -20px;width: 40%; margin-top:90px;display: block;"> 
				 					<?php 
				 					
									$retorno4 = json_decode($b->RETORNOSELODIGITAL4,true);
									$qr4 = $retorno4['valorQrCode'];
									$textoselo4 = $retorno4['textoSelo'];

				 					 ?>	

				 					 <?php

									include_once('../../../plugins/phpqrcode/qrlib.php');
									$img_local = "qrimagens/";
									$img_nome = $b->numero_protocolo_cartorio_transacao.'-4instprot.png';
									$nome = $img_local.$img_nome;

									$conteudo = $qr4;
									QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


									echo '<img style="max-width:20%; margin-left:40px;display:inline-block;" src="'.$nome.'" />';
									?>
									<p style="font-weight: bold; font-size: 6px;width: 40%;display:inline-block;text-align: center"><?=$textoselo4?></p>
 					</div>


					<div style="position: absolute; margin-left: 680px;width: 40%;margin-top: 100px;display: block;"> 
				 					<?php 
				 					
									$retorno = json_decode($b->RETORNOSELODIGITAL,true);
									$qr = $retorno['valorQrCode'];
									$textoselo = $retorno['textoSelo'];

				 					 ?>	

				 					 <?php

									include_once('../../../plugins/phpqrcode/qrlib.php');
									$img_local = "qrimagens/";
									$img_nome = $b->numero_protocolo_cartorio_transacao.'instprot.png';
									$nome = $img_local.$img_nome;

									$conteudo = $qr;
									QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


									echo '<img style="max-width:20%; margin-left:40px;margin-top:-50px;display:inline-block;" src="'.$nome.'" />';
									?>
									<p style="font-weight: bold; font-size: 6px;width: 40%;display:inline-block;text-align: center"><?=$textoselo?></p>
 					</div>
 					
 					<div style="position: absolute; margin-left: 680px;width: 40%;display: block;margin-top: -20px"> 
			 					<?php 
			 					
								$retorno2 = json_decode($b->RETORNOSELODIGITAL2,true);
								$qr2 = $retorno2['valorQrCode'];
								$textoselo2 = $retorno2['textoSelo'];

			 					 ?>	

			 					 <?php

								include_once('../../../plugins/phpqrcode/qrlib.php');
								$img_local = "qrimagens/";
								$img_nome = $b->numero_protocolo_cartorio_transacao.'-2instprot.png';
								$nome = $img_local.$img_nome;

								$conteudo = $qr2;
								QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


								echo '<img style="max-width:20%; margin-left:40px;display:inline-block;" src="'.$nome.'" />';
								?>
								<p style="font-weight: bold; font-size: 6px;width: 40%;text-align: center;display:inline-block;"><?=$textoselo2?></p>
 					</div>
 				
 				<?php endif ?>
					<img style="max-width: 100%;margin-top: 0px;margin-bottom: -10px;" src="../bd_INSERTS/cabecalhos/CAPA.jpg">

					<?php if ($b->status =='CANCELADO'): ?>
						<div style="color: white!important; background: red; opacity: .7;text-align: center">ESTE TÍTULO FOI CANCELADO EM <?=date('d/m/Y', strtotime($b->data_retirada))?></h1>
	</div>
					<?php endif ?>

					
			<table style="width: 100%; border-radius: 5px; border: 2px solid black; padding-bottom:10px; ">
					
							<tr style="border: 1px solid black;">
							<th style="border:none;">INSTRUMENTO DE PROTESTO DE</th>
							<th style="border:none;">PROTESTO Nº</th>
							<th style="border:none;">LIVRO/ Nº SEQ</th>
							<th style="border:none;">FOLHA</th>
						</tr>
					
						<tr style="margin-bottom: -40px;" >	
							<td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">
							<?php 

							$busca_livro = $pdo->prepare("SELECT * FROM livro_protestos where assento = '$b->numero_protocolo_cartorio_transacao'");
							$busca_livro->execute();
							$bliv = $busca_livro->fetch(PDO::FETCH_ASSOC);
							$livro_titulo = $bliv['identifcadorLivro'];
							$folha_titulo = $bliv['PaginaLivro'];
							$termo_titulo = $bliv['LivroInicial'];

							$busca_especie = $pdo->prepare("SELECT * FROM especie_protesto where codigo = '$b->especie_titulo_transacao'"); 
							$busca_especie->execute();
							$be = $busca_especie->fetch(PDO::FETCH_ASSOC);
							echo $be['descricao_especie'];

							?>
							</td>
							<?php $busca_livro = $pdo->prepare("SELECT * FROM livro_protestos where assento = '$b->numero_protocolo_cartorio_transacao'");$busca_livro->execute(); $blv = $busca_livro->fetch(PDO::FETCH_ASSOC); ?>
							<td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;font-size: 15px; font-weight: bold"><?=$blv['LivroInicial']?></td>
							<td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;font-size: 15px; font-weight: bold"><?=$blv['identifcadorLivro']?></td>
							<td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;font-size: 15px; font-weight: bold"><?=$blv['PaginaLivro']?></td>
							</tr>
<tr>
<td style="border:none;font-weight: bold;text-transform: uppercase;">				
<p style="">DADO A FAVOR DE : <?=$b->nome_sacador_vendedor_transacao?></p>
<p style="">	CPF/CNPJ:	<?=$b->documento_sacador_transacao?></p>

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
<p style="">	APRESENTANTE:	<?=$apresentante?></p>
<p style="">	DATA DE APRESENTAÇÃO: <?=substr($b->data_protocolo_transacao,0,2).'/'.substr($b->data_protocolo_transacao,2,2).'/'.substr($b->data_protocolo_transacao,4,4)?></p>






<p style="">PROTESTADO POR FALTA DE: ( <?php if ($b->motivo_titulo == '2'){echo "X";} ?> ) Pagamento, ( <?php if ($b->motivo_titulo == '1'){echo "X";} ?> ) Aceite, ( <?php if ($b->motivo_titulo == '3'){echo "X";} ?> ) Devolução </p>

<?php 

$teste_data_ocorrencia = explode("-",$b->data_ocorrencia_transacao);

if (count($teste_data_ocorrencia)>1) {
$data_ocorrencia_transacao = $b->data_ocorrencia_transacao;
}
else{
$data_ocorrencia_transacao = substr($b->data_ocorrencia_transacao,4,4).'-'.substr($b->data_ocorrencia_transacao,2,2).'-'.substr($b->data_ocorrencia_transacao,0,2);	
}


 ?>

<p style="">DATA DO PROTESTO: <?=date('d/m/Y', strtotime($data_ocorrencia_transacao))?> </p>
<p style="">PROTOCOLO Nº:	<?=$b->numero_protocolo_cartorio_transacao?></p>
</td>
</tr>
					</table>

<p style="text-align: center; margin-bottom: 10px;">TÍTULO ANEXO AO PRESENTE (CÓPIA ARQUIVADA NESTE TABELIONATO)</p>



<table style="width: 100%; border-radius: 5px; border: 2px solid black; padding-bottom:10px;  ">
<tr>
<td style="border:none;font-weight: bold;text-transform: uppercase;">
<p>ESPÉCIE:	<?php $busca_especie = $pdo->prepare("SELECT * FROM especie_protesto where codigo = '$b->especie_titulo_transacao'"); 
							$busca_especie->execute();
							$be = $busca_especie->fetch(PDO::FETCH_ASSOC);
							echo mb_strtoupper($be['descricao_especie']);

							?></p>
<p>	TÍTULO Nº:	<?=$b->numero_titulo_transacao?></p>

<b>VENCIMENTO: </b> 
						<?php if ($b->data_vencimento_titulo_transacao == '99999999' || empty($b->data_vencimento_titulo_transacao)): ?>
						A VISTA
						<?php else: ?>		
						<?=substr($b->data_vencimento_titulo_transacao,0,2).'/'.substr($b->data_vencimento_titulo_transacao,2,2).'/'.substr($b->data_vencimento_titulo_transacao,4,4)?>
						<?php endif ?>	
<p>Nº DO TÍTULO NO BANCO:<?=$b->nosso_numero_transacao?> </p>
<p>	VALOR DO TÍTULO:	<?=number_format($b->saldo_titulo_transacao,2,",",".")?></p>
<p>	DATA DE EMISSÃO:	<?=substr($b->data_emisao_titulo_transacao,0,2).'/'.substr($b->data_emisao_titulo_transacao,2,2).'/'.substr($b->data_emisao_titulo_transacao,4,4)?></p>
<p>	ENDOSSO:	
<?php if ($b->tipo_endosso_transacao =='M' || $b->tipo_endosso_transacao == 'POR MANDATO'): ?>
	MANDATO
<?php elseif ($b->tipo_endosso_transacao =='T' || $b->tipo_endosso_transacao == 'TRANSLATIVO'  ): ?>	
TRANSLATIVO
<?php elseif ($b->tipo_endosso_transacao == 'NIHIL'): ?>
	NIHIL
<?php else: ?>
NÃO SE APLICA
<?php endif ?>


</p>
<p>AG/CODIGO DO CEDENTE: <?=$b->agencia_operadora_transaca?></p>
<p>	VALOR PROTESTADO:	R$ <?=number_format($b->saldo_titulo_transacao,2,",",".")?> </p>
<p>	VALOR POR EXTENSO:	<?=Monetary::numberToExt($b->saldo_titulo_transacao);?></p>
</td>
</tr>
</table>


<br><br>
<table style="width: 100%; border-radius: 5px; border: 2px solid black; padding-bottom:10px; margin-top: -15px;">
<tr>
<td style="border:none;font-weight: bold;text-transform: uppercase;">
<p>SACADOR: <?=$b->nome_sacador_vendedor_transacao?></p>
<p>	CPF/CNPJ: <?=$b->documento_sacador_transacao?></p>

<?php 
							$busca_devedor = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$b->numero_protocolo_cartorio_transacao' ");
							$busca_devedor->execute();
							$linhas_devedor = $busca_devedor->fetchAll(PDO::FETCH_OBJ);
							foreach ($linhas_devedor as $ld):
							 ?>

<p>	DEVEDOR: <?=$ld->nome_devedor_transacao?></p>
<p>CPF/CNPJ:<b><?=$ld->documento_devedor_transacao?> <?=molda_cpf($ld->numero_identificacao_devedor_transacao)?></b></p>
<p>	ENDEREÇO: <?=rtrim($ld->endereco_devedor_transacao)?>, <?=$ld->bairro_devedor_transacao?> -
<?=$ld->cidade_devedor_transacao?>/
<?=$ld->uf_devedor_transacao?> - 
<?=$ld->cep_devedor_transacao?></p> <br>
<?php endforeach ?>


</td>
</tr>
</table>
<br>
<?php if ($busca_devedor->rowCount()>1){$quantidade_arquivamentos = 4;}else{$quantidade_arquivamentos =3;} ?>

<?php if ($b->data_edital==''): ?>
	

<table style="width: 100%; border-radius: 5px; border: 2px solid black; margin-top: -10px;">
<tr>
<td style="border:none;">
<p>CERTIFICO QUE O DEVEDOR FOI INTIMADO A VIR PAGAR O REFERIDO TÍTULO CONFORME COMPROVANTE. NÃO
RESGATOU E NEM ALEGOU MOTIVOS. <br>
Certifico ainda, que após a ocorrência do tríduo legal, por não ter havido  o pagamento, não ter sido apresentado o contra-protesto e nem
ordem judicial para sustação do protesto, efetuei o protesto do documento de dívida acima descrito na data acima especificada, e comuniquei o
órgão de proteção ao crédito. Eu <?=mb_strtoupper($_SESSION['nome'])?>, <?=$_SESSION['funcao']?> o digitei, subscrevi,
conferi, dou fé e assino em público e raso. <br>
<br>
<p style="display: inline-block;">________________________________________  </p>

<p style="text-align: right;display: inline-block; margin-left: 10%;">Itens da Tabela: _______;<?=$ato_protesto?> 17.2; 17.5.1; 17.9; 17.10.1;</p></p>

<p style="margin-left: 16px;"><?php if (isset($_SESSION['permissao']) && $_SESSION['permissao'] == 'S'): ?>
					<?=$_SESSION['nome']?><br>
					<?=$_SESSION['funcao']?>
					<?php else: ?>
						<?=mb_strtoupper($titular)?><br>
						TABELIAO/OFICIAL
					<?php endif ?></p>

</td>
</tr>
</table>


<?php elseif($b->data_edital!=''): ?>

<table style="width: 100%; border-radius: 5px; border: 2px solid black; margin-top: -10px;">
<tr>
<td style="border:none;">
<p> Certifico que diligenciei ao endereço fornecido pelo apresentante e constatei o seguinte: ( ) o devedor é pessoa desconhecida ( ) a localização
do devedor é incerta ou ignorada ( ) o devedor é residente ou domiciliado fora da competência territorial do Tabelionato ( ) ninguém se dispôs a
receber a intimação no endereço fornecido pelo apresentante, sendo a competente intimação feita por Edital nos termos do artigo 15 e §1º da Lei
9.492/97 <br>
Certifico ainda, que após a ocorrência do tríduo legal, por não ter havido o pagamento, não ter sido apresentado o contra-protesto e nem
ordem judicial para sustação do protesto, efetuei o protesto do documento de dívida acima descrito na data acima especificada, e comuniquei o
órgão de proteção ao crédito. Eu <?=mb_strtoupper($_SESSION['nome'])?>, <?=$_SESSION['funcao']?> o digitei, subscrevi,
conferi, dou fé e assino em público e raso. <br>

<br>
<p style="display: inline-block;">________________________________________  </p>

<p style="text-align: right;display: inline-block; margin-left: 10%;">Itens da Tabela: _______;<?=$ato_protesto?> 17.2; 17.5.1; 17.9; 17.10.1;</p></p>

<p style="margin-left: 16px;"><?php if (isset($_SESSION['permissao']) && $_SESSION['permissao'] == 'S'): ?>
					<?=$_SESSION['nome']?><br>
					<?=$_SESSION['funcao']?>
					<?php else: ?>
						<?=mb_strtoupper($titular)?><br>
						TABELIAO/OFICIAL
					<?php endif ?></p>

</td>
</tr>
</table>


<?php endif ?>

<table style="width: 100%; border-radius: 5px; border: 2px solid black; padding-bottom:-40px;border:none; ">
<tr>
	<td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">CIDADE <br> <?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
										$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
										foreach ($u as $u):?>	

										<?=$u->cidade?>/<?=$u->uf?><?php endforeach; endforeach ?>
</td>

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

$soma =$valor_cond*$busca_devedor->rowCount()+$valor_cond_ferc*$busca_devedor->rowCount()+$valor_cert+$valor_cert_ferc+$valor_inti*$busca_devedor->rowCount()+$valor_inti_ferc*$busca_devedor->rowCount()+$valor_ato+$valor_ato_ferc+$valor_arq*$quantidade_arquivamentos+$valor_arq_ferc*$quantidade_arquivamentos;
$soma_total_ferc =$valor_ato_ferc+$valor_cert_ferc+$valor_inti_ferc*$busca_devedor->rowCount()+$valor_cond_ferc*$busca_devedor->rowCount()+$valor_arq_ferc*$quantidade_arquivamentos;

 ?>



<?php if ($pagamento_diferido != 'sim'): ?>
	<td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">CUSTAS (<?=$ato_protesto?>)
		<br><?=number_format($valor_ato,2)?> + <?=number_format($valor_ato_ferc,2)?>

	</td>
	
	<td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">INTIMACAO/EDITAL <br>(17.2) <br><?=$valor_inti?> + <?=$valor_inti_ferc?></td>
	
	
	
	<td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">CERTIDAO (17.5.1) <br><?=number_format($valor_cert,2)?> + <?=number_format($valor_cert_ferc,2)?></td>
	
	<td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">CONDUCAO/ARQUIVAMENTO (<?=$atoconducao?>)/17.9 <br><?=$valor_cond?> +
		<?=$valor_cond_ferc?> + <?=$valor_arq?> + <?=$valor_arq_ferc?> </td>
	<td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">FERC <br> <?=number_format($soma_total_ferc,2)?></td>
	<td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">TOTAL <br> 
		

		<?=number_format($soma,2)?></td>
<?php endif ?>

</tr>
</table>	

<div style="page-break-after: always;"></div>
<?php endforeach ?>	
<?php endfor ?>

</body>
</html>
