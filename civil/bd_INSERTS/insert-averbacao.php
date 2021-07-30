<?php 

include('../controller/db_functions.php');session_start();
$pdo = conectar();
if (isset($_GET['subimit'])) {
unset($_GET['subimit']);
$livro = $_POST['strLivro'];
$folha = $_POST['strFolha'];

if ($_POST['strAverbacao'] =='') {
$_SESSION['erro'] = 'O CAMPO AVERBACAO NÃO PODE ESTAR EM BRANCO!';
header('Location: ' . $_SERVER['HTTP_REFERER']);
break;
}


					include('../selador/civil_geral.php');
					if ($token =='' || empty($token)) {
			                    	#die('NENHUM DADO RECEBIDO TENTE NOVAMENTE');
			                    	$_SESSION['erro'] = 'NENHUM DADO RECEBIDO TENTE NOVAMENTE';
			                    	header('Location: ' . $_SERVER['HTTP_REFERER']);
			                    	break;
			                    }


					if ($token !='') {


			#PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
			            $ato_praticado = $_POST['strAtoEmol'];
			            $escrevente = $_SESSION['nome'];
			            if ($_POST['motivoatoisento']!='') {
			            $isento = 'true';
			            $motivo_isento=addslashes($_POST['motivoatoisento']);
			            }else{
			            $isento = 'false';
			            $motivo_isento='';
			            }
			            $livro =$_POST['strLivro'];
			            $folha=$_POST['strFolha'];
			            $termo = $_POST['strOrdem'];
			            $averbacao = addslashes($_POST['strAverbacao']);

			            if (strlen($_POST['strAverbacao'])>490) {
			            $averbacao = substr(addslashes($_POST['strAverbacao']), 0,450).'...';
			            }
			            
			         	$averbacao = " ";

			            $tipoaverbacao = $_POST['especieaverbacao'];

			            if ($_POST['motivoatoisento']!='') {
			                            $ConteudoPOST = '{
			                            "alteracao":"'.$averbacao.'",	
                                        "codigoAto":"'.$ato_praticado.'",
                                        "tipoAverbacao":"'.$tipoaverbacao.'",
                                        "escrevente":"'.$escrevente.'",
                                        "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
                                        "dadosSelo":{
                                        "isento":"true",
                                  		"motivoIsentoGratuito":"'.$motivo_isento.'",  	
                                        "escrevente":"'.$escrevente.'",
                                        "folha": "'.$folha.'",
                                        "livro": "'.$livro.'",
                                        "termo": "'.$termo.'",
                                        "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
                                        }
                                        }';
			        }


			        else{
			        	    $ConteudoPOST = '{
			                            "alteracao":"'.$averbacao.'",	
                                        "codigoAto":"'.$ato_praticado.'",
                                        "tipoAverbacao":"'.$tipoaverbacao.'",
                                        "escrevente":"'.$escrevente.'",
                                        "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
                                        "dadosSelo":{
                                        "escrevente":"'.$escrevente.'",
                                        "folha": "'.$folha.'",
                                        "livro": "'.$livro.'",
                                        "termo": "'.$termo.'",
                                        "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
                                        }
                                        }';
			        }
			                    $ConteudoCabecalho = [
			                        'Authorization: Bearer'.$token,
			                        "Content-Type: application/json"
			                        
			                    ];
			                    
			                 
			                    if ($_POST['strTipo'] == 'NA') {
			                    $handler = curl_init($_SESSION['urlselodigital'].'civil/nascimento/averbacao');
			                    }
			                    elseif($_POST['strTipo'] == 'CA'){
			                    $handler = curl_init($_SESSION['urlselodigital'].'civil/casamento/averbacao');
			                    }
			                    elseif($_POST['strTipo'] == 'OB'){
			                    $handler = curl_init($_SESSION['urlselodigital'].'civil/obito/averbacao');
			                    }
			                    elseif($_POST['strTipo'] == 'ES'){
			                    $handler = curl_init($_SESSION['urlselodigital'].'civil/ausencia/averbacao');
			                    }
			                    else{
			                    	$handler = curl_init($_SESSION['urlselodigital'].'civil/atos-em-geral');
			                    }

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
			                    $RETORNO = json_encode($resp['resumos'][0]);
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
								$LIVRO = $livro;
								$FOLHA = $folha;
								$TERMO = intval($_POST['strOrdem']);
								$ATO = $_POST['strAtoEmol'];;
								$TIPOPAPEL = '0';
								$NUMEROPAPEL = '0';	
								$funcionario = $_SESSION['nome'];
								$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','AVERBACAO','2','1','$SELO',CURRENT_TIMESTAMP,'GRA','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
								
								
								

								
								$insert_auditoria->execute();
								
			                    
			                    $_POST['RETORNOSELODIGITAL'] = $RETORNO;	
								
								

								}
								unset($_POST['strAtoEmol']);
								unset($_POST['motivoatoisento']);
								unset($_POST['especieaverbacao']);



if (empty($_POST['setRegistroInvisivel'])) {
	$_POST['setRegistroInvisivel'] = 'N';
}
unset($_POST['strSeloG']);
unset($_POST['seloGratuito']);
$_POST['strSelo'] = $SELO;
$_POST['strAverbacao'] =  $_POST['strAverbacao'].'  Selo de validação: '.$SELO;

INSERT_POST('averbacoes_civil',$_POST);	
#var_dump($_POST);
unset($_SESSION['averbacaotemp']);
if (isset($SELO)) {
$_SESSION['sucesso'] .='<br>'.$SELO;	
}
header('Location: ' . $_SERVER['HTTP_REFERER']);
}

							}






 ?>