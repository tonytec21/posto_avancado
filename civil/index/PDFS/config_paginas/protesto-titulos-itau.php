<?php #mudanca23 ?>
<!DOCTYPE html>
<?php 

$id = explode("-", $_GET['id']);


include("../plugins/boletophp/include/funcoes_itau.php");
$serv = PESQUISA_ALL_ID('cadastroserventia',1);
foreach($serv as $s){
	$endereco_serventia = $s->strLogradouro.' Nº '.$s->strNumero.' - '.$s->strBairro.' CEP: '.$s->strCEP;
}
if (!isset($token)) {
$token= '';
}

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
table{
	border: 1px solid black;
}
thead{
	border-bottom: 1px solid black;
}
th{
	border-left: 1px solid black;
}

td{
border-left: 1px solid black;
border-bottom: 1px solid black;
text-align: center;
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
body{font-size: 14px;font-family: "Arial";margin-bottom: -3cm;margin-top: -2cm; }
</style>

</head>

<body>


 	<?php 
for ($i=0; $i <count($id) ; $i++) :
if (isset($id[$i])) {
$id_unic = $id[$i];	
}


if (isset($_GET['pesquisa'])) {
$busca_matricula = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$id_unic' ");
}
else{
$busca_matricula = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE ID = '$id_unic' ");
}

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
		
		/*							
		  if ($pagamento_diferido == 'sim') {
				$selo = 'DIFERIDO';
				unset($token);	
				echo '
				<div style="position: absolute;width: 100px; margin-left: 720px;border: 1px solid silver; padding: 50px;">
				<img src="../../../images/brasao_ma.png" style="width: 40%;margin-left:28px; margin-top:-40px; ">
				<h4 style="margin-bottom:-15px;min-width:160%;margin-left:-33px;text-align:center;margin-top:0px">EMOLUMENTOS DIFERIDOS</h4>
				<h5 style="margin-bottom:-15px;min-width:200%;margin-left:-52px;text-align:center;">Documento dispensado do Selo de fiscalização</h5>
				<h5 style="margin-bottom:-40px;min-width:200%;margin-left:-50px;text-align:center;">Provimentos 04/12, 21/15 e 36/17, da CGJ/MA</h5>
				</div>
				';
				}
		*/		
 		 
	 /* 			
 		  else{ 	 							
 	          if ($token !='') {
 	        	
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
							"protocolo": "433",
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
		
      #PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
                  $ato_praticado = '17.2';
                  $escrevente = $_SESSION['nome'];
                  $isento = 'false';
                  $motivo_isento='';
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
                $ATO = '17.2';
                $TIPOPAPEL = '0';
                $NUMEROPAPEL = '0';  
                $funcionario = $_SESSION['nome'];
                $insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','INTIMACAO_PROTESTO','5','1','$SELO',CURRENT_TIMESTAMP,'GER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
                UPDATE_CAMPO_ID('protesto_automatico_transacao','RETORNOSELODIGITAL',strip_tags($RETORNO),$id_unic);
                $insert_auditoria->execute();
              
                         
                          $_POST['SELO2'] = $SELO;  
                
                

                }
      }

      
else{
  $SELO = '0';
}
}
 */
$SELO = '0';
 	?>				<?php if ($pagamento_diferido != 'sim'): ?>
 		
 					<!--div style="position: absolute;margin-left: -20px;width: 40%; margin-top:0px;display: block;margin-left: 10px;">
			 					<?php 
			 					
								$retorno2 = json_decode($b->RETORNOSELODIGITAL2,true);
								$qr2 = $retorno2['valorQrCode'];
								$textoselo2 = $retorno2['textoSelo'];

			 					 ?>	

			 					 <?php

								include_once('../../../plugins/phpqrcode/qrlib.php');
								$img_local = "qrimagens/";
								$img_nome = $b->numero_protocolo_cartorio_transacao.'-2.png';
								$nome = $img_local.$img_nome;

								$conteudo = $qr2;
								QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


								echo '<img style="max-width:40%; margin-left:40px;display:inline-block;" src="'.$nome.'" />';
								
								?><br>
								<p style="font-weight: bold; font-size: 6px;width: 40%;text-align: center;display:inline-block;margin-top: -10px;margin-left: 20px;"><?=$textoselo2?></p>
 					</div-->				


 					<!--div style="position: absolute;width: 50px; margin-left: 800px;width: 200px;"> 
 					<?php 
 					
					$retorno = json_decode($b->RETORNOSELODIGITAL,true);
					$qr = $retorno['valorQrCode'];
					$textoselo = $retorno['textoSelo'];

 					 ?>	

 					 <?php

					include_once('../../../plugins/phpqrcode/qrlib.php');
					$img_local = "qrimagens/";
					$img_nome = $b->ID.'inti.png';
					$nome = $img_local.$img_nome;

					$conteudo = $qr;
					QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


					echo '<img style="max-width:100%; margin-left:40px;" src="'.$nome.'" />';
					?>
				
					<p style="font-weight: bold; font-size: 6px;max-width: 100%;text-align: center"><?=$textoselo?></p>
 					</div-->
 					<?php endif ?>


<!--INICIO DA MONTAGEM DO TEXTO#######################################################################################-->

					<?php $c = PESQUISA_ALL('cadastroserventia');
	foreach ($c as $c ):?>
<div style="display: block;">
<div style="display: inline-block;width: 20%;">
	<img src="../../../images/brasao_ma.png" style="width: 50%;margin-left:28px; margin-top:-40px; ">
	
</div>

<div style="display: inline-block;width: 30%; font-size: 10px!important; margin-left: -20px;">
		EMOLUMENTOS DIFERIDOS <br>
		Documento dispensado do Selo de fiscalização
		Provimentos 04/12, 21/15 e 36/17, da CGJ/MA
	</div>	

<div style="display: inline-block;width: 50%">	
<h2 style=" text-align: right;font-size: 20px;margin-top: 1cm"><?=strtoupper($c->strRazaoSocial)?></h2>
<h2 style=" text-align: right;font-size: 12px;margin-top: -18px;
"><?=$c->strLogradouro?>, <?=$c->strNumero?> -
<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
<?php endforeach ?>
<br>
Titular da Serventia: <?=$c->strTituloServentia?><br>
Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
<?php endforeach ?></h2>
</div>

</div>
<hr style="border-bottom: 2px solid black">


					<!--p style="text-align: center; margin-top: -1%"><?=$endereco_serventia?></p-->
					<p style="text-align: justify;margin-left: 1cm; margin-right: 1cm">
					Prezado Senhor, Pelo presente comunico que se encontra neste Tabelionato, o título abaixo especificado, para ser protestado por 
					 <?php if ($b->motivo_titulo ==''): ?>
					 	falta de aceite.
					 	<?php else:
					 		$busca_motivo = $pdo->prepare("SELECT * FROM motivo_protesto WHERE codigo = '$b->motivo_titulo'");
					 		$busca_motivo->execute();
					 		$bm = $busca_motivo->fetch(PDO::FETCH_ASSOC);
					 	 ?>
					 	 <?=$bm['motivo_protesto']?>
					 <?php endif ?>
 					Assim sendo, intimo-o a comparecer neste Tabelionato no prazo de três ( 03 ) dias úteis, <span style="font-weight: bold; text-transform: uppercase;">a contar da data de protocolização(apontamento) deste título</span>, para pagar a importância da dívida, emolumentos e custas e demais encargos, ou alegar as razões por escrito
					porque não o faz, sob pena de PROTESTO na forma da Lei.  
					
					
					

					Espécie do título: <?php 


					$busca_especie = $pdo->prepare("SELECT * FROM especie_protesto WHERE codigo = '$b->especie_titulo_transacao'");
					 		$busca_especie->execute();
					 		$be = $busca_especie->fetch(PDO::FETCH_ASSOC);
					 		echo $be['descricao_especie'];

					 ?> 
					<span style="font-weight: bold; font-size: 10px;"> 
					O SACADOR, POR SUA CONTA E RISCO, DECLAROU POSSUIR PROVA DE VENDA/COMPRA/ENTREGA DA MERCADORIA E
					EXIBIRÁ ONDE E QUANDO EXIGIDA.
					</span>
					</p>



					<table style="border: 2px solid black; margin-left: 1cm; width: 92%;max-width: 100%;">
							<tr>
								<th style="border: 1px solid black">Nº TÍTULO</th>
								<th style="border: 1px solid black">VENCIMENTO</th>
								<th style="border: 1px solid black">VALOR R$</th>
								<th style="border: 1px solid black">PROTOCOLO Nº</th>
							</tr>
							<tr>
								<td style="border: 1px solid black"><?=$b->numero_titulo_transacao?></td>

								<?php if ($b->data_vencimento_titulo_transacao == '99999999' || empty($b->data_vencimento_titulo_transacao)): ?>
									<td style="border: 1px solid black">A VISTA</td>		
								<?php else: ?>		
								<td style="border: 1px solid black"><?=substr($b->data_vencimento_titulo_transacao,0,2).'/'.substr($b->data_vencimento_titulo_transacao,2,2).'/'.substr($b->data_vencimento_titulo_transacao,4,4)?></td>
								<?php endif ?>	
								<td style="border: 1px solid black"><?=number_format($b->saldo_titulo_transacao,2,",",".")?></td>
								<td style="border: 1px solid black"><?=$b->numero_protocolo_cartorio_transacao?></td>
							</tr>

					</table>


					<!--p style="text-align: justify;margin-left: 1cm; margin-right: 1cm">
					<?php 
						$busca_valores = $pdo->prepare("SELECT * FROM protesto_dados_essenciais where ID = 1");
						$busca_valores->execute();
						$bv = $busca_valores->fetch(PDO::FETCH_ASSOC);


						$busca_devedor = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$b->numero_protocolo_cartorio_transacao' ");
							$busca_devedor->execute();
							$linhas_devedor = $busca_devedor->fetchAll(PDO::FETCH_OBJ);
					 ?>
					Além do valor do título será cobrado mais emolumentos conforme descrição abaixo: <br>
					Emolumentos:<br>

					<?php 
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
						$valor_pagamento = $d['monValor'] + $d['monValorFerc'];			
					 ?>
					<p style="text-align: center;padding: -20px;margin-top: -20px;"> 
					Pagamento ........................................ R$ <?=number_format($valor_pagamento,2)?> <br>
					Intimação ........................................ R$ <?=descrimina_emols('17.2',$busca_devedor->rowCount())?> <br>
					<?php if ($b->localidade_titulo != '2'): $conducao_soma = descrimina_emols('17.10.1',$busca_devedor->rowCount());  ?>
						Diligência ........................................ R$ <?=descrimina_emols('17.10.1',$busca_devedor->rowCount())?> <br>
					<?php else: $conducao_soma = descrimina_emols('17.10.2',$busca_devedor->rowCount());?>
						Diligência ........................................ R$ <?=descrimina_emols('17.10.2',$busca_devedor->rowCount())?> <br>
					<?php endif ?>
					<?php if ($busca_devedor->rowCount()>1){$quantidade_arquivamentos = 3;}else{$quantidade_arquivamentos =2;} ?>

					Arquivamento ........................................ R$ <?=descrimina_emols('17.9',$quantidade_arquivamentos)?>  <br>
					<?php $valor_arquivamento = descrimina_emols('17.9',$quantidade_arquivamentos); ?>
					Certidão ........................................ R$ <?=descrimina_emols('17.5.1',1)?> <br>
					<?php $soma_emols =  $valor_pagamento+$conducao_soma+descrimina_emols('17.2',$busca_devedor->rowCount())+$valor_arquivamento +descrimina_emols('17.5.1',1); ?>

					Total de emolumentos ........................................ R$ <?=number_format($soma_emols,2,",",".")?> <br>


					<?php if (isset($_SESSION['taxaff']) && $_SESSION['taxaff'] == 'S'): $soma_emols_no_ferc = $soma_emols-$soma_emols*3/100; ?>
					<br><span style="font-weight: bold">*Conforme Leis Complementares nº 221/2019 e 222/2019.*</span><br>
					Emolumentos Acrescidos FEMP(4%).................................... R$ <?=number_format($soma_emols_no_ferc*4/100,2,",",".")?> <br>		
					Emolumentos Acrescidos FADEP(4%).................................... R$ <?=number_format($soma_emols_no_ferc*4/100,2,",",".")?> <br>
					<?php endif ?>

					<?php if (isset($_SESSION['taxaff']) && $_SESSION['taxaff'] == 'S'): $acrescimo_ff = $soma_emols_no_ferc*8/100 ?>
					<span style="font-weight: bold">Total .................................... R$ <?=number_format($soma_emols+$acrescimo_ff+$b->saldo_titulo_transacao,2)?></span> <br>
					<?php else: ?>
					<span style="font-weight: bold">Total ........................................ R$ <?=number_format($soma_emols+$b->saldo_titulo_transacao,2,",",".")?> <br></span><br>
					<?php endif ?>

					<br>
					
					No caso do sacado não ser encontrado ou recusado o aceite, será acrescido dos emolumentos próprios da intimação por<br>
					Edital ........................................ R$ <?=descrimina_emols('17.2',1)?> <br>
					</p>
					</p>



 <?php $data_protocolo = substr($b->data_protocolo_transacao,4,4).'-'.substr($b->data_protocolo_transacao,2,2).'-'.substr($b->data_protocolo_transacao,0,2);
                                              
                                              $diaSemana = array("Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado");
                                              $data = $data_protocolo;
                                              $diaSemana_numero = date('w', strtotime($data_protocolo));
                                              #echo $diaSemana[$diaSemana_numero];
                                              

                                              ?>
                                           

<div style="display: block;padding-left: 1cm">
<p style="width:50%;display:inline-block; margin-right:1cm;border:1px solid black; padding: 10px; font-weight: bold; width: 40%; ">PRAZO FINAL: 

 <?php if ($diaSemana[$diaSemana_numero] == 'Sexta'):  ?>
                                             <td><?=date('d/m/Y',strtotime($data_protocolo.'+5days'))?></td>
                                            <?php elseif ($diaSemana[$diaSemana_numero] == 'Quarta'):  ?>
                                             <td><?=date('d/m/Y',strtotime($data_protocolo.'+5days'))?></td> 
                                            <?php elseif ($diaSemana[$diaSemana_numero] == 'Quinta'):  ?>
                                             <td><?=date('d/m/Y',strtotime($data_protocolo.'+4days'))?></td>  
                                            <?php else: ?>
                                              <td><?=date('d/m/Y',strtotime($data_protocolo.'+3days'))?></td>
                                            <?php endif ?>

  <br></p-->
<!--p style="width:50%; display:inline-block;margin-right:1cm;border:1px solid black; padding: 10px; font-weight: bold; width: 40%; ">ATÉ AS (hs):   <br></p-->
</div>
					<!--table style="margin-left: 1cm; width: 92%; max-width: 100%; ">
						<tr>
							<th style="border: 1px solid black">DEVEDOR </th>
							<th style="border: 1px solid black">CEDENTE</th>
						</tr>
						<tr>
							<td style="border: 1px solid black">
								
							<?php 
							$busca_devedor = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$b->numero_protocolo_cartorio_transacao' ");
							$busca_devedor->execute();
							$linhas_devedor = $busca_devedor->fetchAll(PDO::FETCH_OBJ);
							foreach ($linhas_devedor as $ld):
							 ?>	
								<b><?=$ld->nome_devedor_transacao?></b> <br>
								<b><?=$ld->endereco_devedor_transacao?></b> <br>
								<b><?=$ld->bairro_devedor_transacao?></b> - <b><?=$ld->cidade_devedor_transacao?></b> - <b><?=$ld->uf_devedor_transacao?></b> - <b><?=$ld->cep_devedor_transacao?></b>, <b>CPF/CNPJ: <?=molda_cpf($ld->numero_identificacao_devedor_transacao)?> </b><br>
							<?php endforeach ?>
							</td>
							<td style="border: 1px solid black">
								<b><?=$b->nome_beneficiario_favorecido_transacao?></b>
							</td>
						</tr>
					</table>
<br>
					<table style="margin-left: 1cm; width: 92%; max-width: 100%; margin-top: -13px;">
						<tr>
							<th style="border: 1px solid black">SACADOR </th>
							<th style="border: 1px solid black">APRESENTADO POR</th>
						</tr>
						<tr>
							<td style="border: 1px solid black">
								
								
								<b><?=$b->nome_sacador_vendedor_transacao?></b>
							</td>
							<td style="border: 1px solid black">
								<?php $pesquisa_apresentante = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$b->numero_codigo_portador_transacao'");
						$pesquisa_apresentante->execute();
						$l = $pesquisa_apresentante->fetchAll(PDO::FETCH_OBJ);
						foreach ($l as $l) {
						$apresentante = $l->nome;
						}
						 ?>
						<b><?=$apresentante?></b> <br>
							</td>
						</tr>
					</table>
				<br>	

	<table style="margin-left: 1cm; width: 92%; max-width: 100%;font-weight: bold;margin-top: -13px;">
		<tr>
			<td>
				
				<p style="text-align: center">DATA <br>
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h):
										$titular = $h->strTituloServentia; 
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
									</p>

			</td>
			<td>
				<p style="text-align: center;padding: -20px;">

					_____________________________
					 <br>
					<?php if (isset($_SESSION['permissao']) && $_SESSION['permissao'] == 'S'): ?>
					<?=$_SESSION['nome']?><br>
					<?=$_SESSION['funcao']?>
					<?php else: ?>
						<?=mb_strtoupper($titular)?><br>
						TABELIAO/OFICIAL
					<?php endif ?>

					
					
					</p>
			</td>

		</tr>
	</table>

					

					<div style="margin-left: 1cm; margin-right: 1cm; text-align: justify;">
						Pagamento:
						<?php if ($bv['especie'] == 'S'): ?>
							 no próprio cartório, ao comparecer em Cartório, favor apresentar a
							presente Intimação!
						<?php endif ?>
						<?php if ($bv['transferencia'] == 'S'): ?>
						ou por transferencia bancária: 
						<?php if ($bv['banco_conta1']!=''): ?>
							<?=mb_strtoupper($bv['banco_conta1'])?>, 
						<?php endif ?>

						<?php if ($bv['agencia_conta1']!=''): ?>
							Agencia: <?=$bv['agencia_conta1']?>, 
						<?php endif ?>
						<?php if ($bv['conta1']!=''): ?>
							Conta: <?=$bv['conta1']?>, 
						<?php endif ?>

						<?php if ($bv['titular_conta1']!=''): ?>
						 <?=mb_strtoupper($bv['titular_conta1'])?>, 
						<?php endif ?>

						<?php if ($bv['info_adicionais_conta1']!=''): ?>
						 <?=mb_strtoupper($bv['info_adicionais_conta1'])?>. 
						<?php endif ?>

						<?php if ($bv['banco_conta2']!=''): ?>
						 e também, <?=mb_strtoupper($bv['banco_conta2'])?>, 
						<?php endif ?>

						<?php if ($bv['agencia_conta2']!=''): ?>
							Agencia: <?=$bv['agencia_conta2']?>, 
						<?php endif ?>
						<?php if ($bv['conta2']!=''): ?>
							Conta: <?=$bv['conta2']?>, 
						<?php endif ?>

						<?php if ($bv['titular_conta2']!=''): ?>
						 <?=mb_strtoupper($bv['titular_conta2'])?>, 
						<?php endif ?>

						<?php if ($bv['info_adicionais_conta2']!=''): ?>
						 <?=mb_strtoupper($bv['info_adicionais_conta2'])?>. 
						<?php endif ?>
						<?php if ($bv['boleto'] == 'S'): ?>
							Ou ainda por boleto bancário disponibilizado na serventia.
						<?php endif ?>	
						 
							

						<?php endif ?>	
						 
					</div><br>
					<div style="border-top: 2px dashed black; max-width: 100%">
						<h4 style="text-align: center">AVISO DE RECEBIMENTO - AR</h4>
						<p style="text-align: center; text-transform: uppercase;">DEVOLVER A <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?><?=$w->strRazaoSocial?>  <?php endforeach ?> 
					</p>
					<p style="text-align: center"><?=$endereco_serventia?>
										<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
										$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
										foreach ($u as $u):?>	

										<?=$u->cidade?>/<?=$u->uf?>,
										<?php endforeach; endforeach ?></p>
					</div>

					<br>
					<table style="margin-left: 1cm; width: 92%; max-width: 100%">
						<tr>
							<th>DESTINATÁRIO</th>
							<th>ENDEREÇO</th>
							<th>PROTOCOLO Nº</th>
						</tr>
						<tr>
							<td><?=$b->nome_devedor_transacao?></td>
							<td><?=$b->endereco_devedor_transacao?> <br>
								<?=$b->bairro_devedor_transacao?></b> - <b><?=$b->cidade_devedor_transacao?></b> - <b><?=$b->uf_devedor_transacao?></b> - <b><?=$b->cep_devedor_transacao?>
							</td>
							<td><?=$b->numero_protocolo_cartorio_transacao?></td>
						</tr>
					</table>

<table style="margin-left: 1cm; border: none; width: 92%;max-width: 100%;">
	<tr>
		<td>
			<h4 style="text-align: center">DECLARAÇÃO</h4>
						<p style="font-size: 8px;text-align: center">DECLARO QUE RECEBI A INTIMAÇÃO REFERENTE AO PRESENTE PROTOCOLO.</p>
						<p style="font-size: 8px;text-align: center">LOCAL E DATA:</p>
						<p style="text-align: center">________________________________________________,_____/_____/_____</p>
						<p style="font-size: 8px;text-align: center">RECEBEDOR: ____________________________________________________</p><br>	

		</td>
		<td>
			<b style="color:silver">  CONTRATO  ECT/DR/MA</b><br><br>
				
		</td>
		<td style="border: 1px dashed black; padding: 40px;"><b style="color:silver">CARIMBO E.C.T</b></td>
	</tr>
</table-->

			
<?php

// ------------------------- DADOS DINÂMICOS DO SEU CLIENTE PARA A GERAÇÃO DO BOLETO (FIXO OU VIA GET) -------------------- //
// Os valores abaixo podem ser colocados manualmente ou ajustados p/ formulário c/ POST, GET ou de BD (MySql,Postgre,etc)	//

// DADOS DO BOLETO PARA O SEU CLIENTE
$dias_de_prazo_para_pagamento = 3;
$taxa_boleto = 2.95;

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



$data_venc = date('d/m/Y', strtotime($vencimento));  #date("d/m/Y", time() + ($dias_de_prazo_para_pagamento * 86400));  // Prazo de X dias OU informe data: "13/04/2006"; 




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





$valor_cobrado = $valor_total_test; // Valor - REGRA: Sem pontos na milhar e tanto faz com "." ou "," ou com 1 ou 2 ou sem casa decimal
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
$dadosboleto["quantidade"] = "";
$dadosboleto["valor_unitario"] = "";
$dadosboleto["aceite"] = "";		
$dadosboleto["especie"] = "R$";
$dadosboleto["especie_doc"] = "";


// ---------------------- DADOS FIXOS DE CONFIGURAÇÃO DO SEU BOLETO --------------- //


// DADOS DA SUA CONTA - ITAÚ
$dadosboleto["agencia"] = $bv['agencia_boleto']; // Num da agencia, sem digito
$dadosboleto["conta_dv"] = $bv['digito_conta_boleto']; 	// Digito do Num da conta
$dadosboleto["conta"] = $bv['conta_boleto']; 	// Num da conta, sem digito

// DADOS PERSONALIZADOS - ITAÚ
$dadosboleto["carteira"] = $bv['carteira_boleto'];    // Código da Carteira: pode ser 175, 174, 104, 109, 178, ou 157


$serv = PESQUISA_ALL_ID('cadastroserventia',1);
		foreach($serv as $s){
			$endereco_serventia = $s->strLogradouro.' Nº '.$s->strNumero.' - '.$s->strBairro.' CEP: '.$s->strCEP;
			$cnpj = $s->strCNPJ;
			$razaosocial = $s->strRazaoSocial;
		$dadosboleto["endereco"] = $endereco_serventia;
		$dadosboleto["cpf_cnpj"] = $cnpj;
			$dadosboleto["cedente"] =mb_strtoupper($razaosocial) ;

		 $u = PESQUISA_ALL_ID('uf_cidade',$s->intUFcidade); foreach($u as $u) {

		$dadosboleto["cidade_uf"] = $u->cidade.'/'.$u->uf;
	
		// NÃO ALTERAR!
		 }
		}

// SEUS DADOS
$dadosboleto["identificacao"] = mb_strtoupper($razaosocial);
$dadosboleto["cpf_cnpj"] = $cnpj;
$dadosboleto["endereco"] = $endereco_serventia;
#$dadosboleto["cidade_uf"] = "Cidade / Estado";
$dadosboleto["cedente"] = mb_strtoupper($razaosocial);

// NÃO ALTERAR!



?>

<div style="display: block;">
<div style="width: 40%; display: inline-block;font-size: 70%!important">  
<p style="font-weight: bold; margin-left: 1cm!important;">DEVEDOR: 
<?php 
$busca_devedor = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$b->numero_protocolo_cartorio_transacao' ");
              $busca_devedor->execute();
              $linhas_devedor = $busca_devedor->fetchAll(PDO::FETCH_OBJ);
              foreach ($linhas_devedor as $ld):
               ?> 
                <b><?=$ld->nome_devedor_transacao?></b> <br>
                <!--b><?=$ld->endereco_devedor_transacao?></b> <br>
                <b><?=$ld->bairro_devedor_transacao?></b> - <b><?=$ld->cidade_devedor_transacao?></b> - <b><?=$ld->uf_devedor_transacao?></b> - <b><?=$ld->cep_devedor_transacao?></b>, <b>CPF/CNPJ: <?=molda_cpf($ld->numero_identificacao_devedor_transacao)?> </b><br-->
              <?php endforeach ?>  

</p>
<p style="font-weight: bold; margin-left: 1cm!important;">SACADOR: <?=$b->nome_sacador_vendedor_transacao?></p>
<p style="font-weight: bold; margin-left: 1cm!important;">APRESENTADO POR: <?php $pesquisa_apresentante = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$b->numero_codigo_portador_transacao'");
            $pesquisa_apresentante->execute();
            $l = $pesquisa_apresentante->fetchAll(PDO::FETCH_OBJ);
            foreach ($l as $l) {
            $apresentante = $l->nome;
            }
             ?>
            <b><?=$apresentante?></b> </p>
</div>
<div style="width: 50%; display: inline-block;background: silver;  border:1px solid black;font-size: 70%!important"> 


<?php $valor_postagem = 10; ?>

<p style="font-weight: bold;text-align: center">VALOR TÍTULO: <?=number_format($b->saldo_titulo_transacao,2,",",".")?></p>
<p style="font-weight: bold;text-align: center">EMOLUMENTOS:<?=number_format($soma_emols,2,",",".")?></p>
<p style="font-weight: bold;text-align: center">POSTAGEM: <?=number_format($valor_postagem,2,",",".")?></p> 
<p style="font-weight: bold;text-align: center">GERAÇÃO BOLETO:<?=number_format($taxa_boleto,2,",",".")?></p>   
<p style="font-weight: bold;text-align: center">TOTAL: 
<?php if (isset($_SESSION['taxaff']) && $_SESSION['taxaff'] == 'S'): $acrescimo_ff = $soma_emols_no_ferc*8/100 ?>
<?=number_format($soma_emols+$acrescimo_ff+$b->saldo_titulo_transacao+$valor_postagem+$taxa_boleto,2)?>
<?php else: ?>
<?=number_format($soma_emols+$b->saldo_titulo_transacao+$valor_postagem+$taxa_boleto,2,",",".")?>
<?php endif ?>


</p>
</div>
</div>


<?php   include("../plugins/boletophp/include/layout_itau.php"); ?>


					<?php if ($busca_matricula->rowCount()>1): ?>
						<div style="page-break-before: always;"></div>
					<?php endif ?>
<?php 

#INSERINDO NA TABELA DE DADOS_PRO_TITULOS:

$busca_t = $pdo->prepare("SELECT * FROM dados_pro_boleto_titulos where protocolo_titulo = '$b->numero_protocolo_cartorio_transacao'");
$busca_t->execute();
if ($busca_t->rowCount() < 1) {
$in_pro_titulos = $pdo->prepare("INSERT INTO `bookc`.`dados_pro_boleto_titulos` (`id_titulo`, `protocolo_titulo`, `nosso_numero`, `status`, `valor_titulo`,`vencimento_titulo`) VALUES ('$b->ID', '$b->numero_protocolo_cartorio_transacao', '$nosso_numero_final', '','$valor_boleto','$vencimento')");
$in_pro_titulos->execute();
}




# verificando se existe uma remessa com a data de hoje;
$data_hj = date('Y-m-d');
$hora_hj = date('H:i');
$busca_geracao_retorno = $pdo->prepare("SELECT * FROM remessa_banco_registro where data_geracao = '$data_hj'");
$busca_geracao_retorno->execute();

if ($busca_geracao_retorno->rowCount()<1) {
$bgr = $busca_geracao_retorno->fetch(PDO::FETCH_ASSOC);
$sq_remessa = $bgr['sequencial_remessa']+1;
$in_remessa = $pdo->prepare("INSERT INTO `bookc`.`remessa_banco_registro` (`sequencial_remessa`, `data_geracao`, `hora_geracao`, `titulos`) VALUES ('$sq_remessa', '$data_hj', '$hora_hj', '$b->numero_protocolo_cartorio_transacao')");
$in_remessa->execute();
}

else{


$bgr = $busca_geracao_retorno->fetch(PDO::FETCH_ASSOC);
$sq_remessa = $bgr['sequencial_remessa'];
$conteudo = $bgr['titulos'];
$conteudo = $conteudo.'-'.$b->numero_protocolo_cartorio_transacao;

if ($busca_t->rowCount()<1) {
$up_remessa = $pdo->prepare("UPDATE remessa_banco_registro set titulos = '$conteudo' where sequencial_remessa = '$sq_remessa'");
$up_remessa->execute();
}


}


endforeach;


?>	
<?php endfor ?>

</body>
</html>