<?php 
include('../controller/db_functions.php');
session_start();
$pdo = conectar();


$LIVRO = $_POST['LIVRO'];
$FOLHA = $_POST['FOLHA'];
$TERMO = $_POST['TERMO'];
$PARTE = $_POST['PARTE'];
$ATO = $_POST['ATO'];
$MOTIVOISENTO = $_POST['MOTIVOISENTO'];
$NATUREZA = $_POST['NATUREZA'];
$QUANTIDADE = $_POST['QUANTIDADE'];

if ($QUANTIDADE > 1) {
$json_quantidade = '"quantidade":"'.$QUANTIDADE.'",';
}
else{
 $json_quantidade = '"quantidade":"1",'; 
}

#1º parte solicitando token de acesso:
include('civil_geral.php');
if (!isset($token) || empty($token) || $token == '') {
die($erro);
}

if (isset($token) && !empty($token) && $token !='' && $token!= 'NULL' && $token!= 'null') {

#PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
                  

                   $livro =$LIVRO ;
                   $folha =$FOLHA;
                   $termo = $TERMO;   
                   $natureza_solicitacao = $NATUREZA;
                   if (!empty($MOTIVOISENTO) && $MOTIVOISENTO!='') {
                     $motivo_isento = $MOTIVOISENTO;
                   }
                  $nomeparte1 = $PARTE;
                  $ato_praticado = trim($ATO);
                  $escrevente = $_SESSION['nome'];
                  $tipopapel = '';
                  $numpapel = '';
                  $tabela_custas = retorna_tabela_custas('civil');
                  $url_solicitacao = 'civil/atos-em-geral';

                   if (isset($motivo_isento) && $motivo_isento!='') {
                   $isento = 'true';
                   $motivo_isento = $motivo_isento;
                   $ConteudoPOST = '{
                                  "codigoAto":"'.$ato_praticado.'",
                                  "escrevente":"'.$escrevente.'",
                                  '.$json_quantidade.'
                                  "versaoTabelaDeCustas":"'.$tabela_custas.'",
                                  "nomesPartes": {
                                  "nomesPartes":"X",
                                  "parteAto":[
                                  {
                                  "nome":"'.$nomeparte1.'"
                                  }
                                  ]},

                                  "dadosSelo":{
                                  "isento":"true",
                                  "motivoIsentoGratuito":"'.$motivo_isento.'",  
                                  "escrevente":"'.$escrevente.'",
                                  "folha": "'.$folha.'",
                                  "livro": "'.$livro.'",
                                  "versaoTabelaDeCustas":"'.$tabela_custas.'"
                                  }
                                  }';
                  }
                  else{


                  $ConteudoPOST = '{
                    "codigoAto":"'.$ato_praticado.'",
                    "escrevente":"'.$escrevente.'",
                    '.$json_quantidade.'
                    "versaoTabelaDeCustas":"'.$tabela_custas.'",
                    "nomesPartes": {
                      "nomesPartes":"X",
                      "parteAto":[
                      {
                        "nome":"'.$nomeparte1.'"
                      }
                      ]},

                      "dadosSelo":{
                        "escrevente":"'.$escrevente.'",
                        "folha": "'.$folha.'",
                        "livro": "'.$livro.'",
                        "versaoTabelaDeCustas":"'.$tabela_custas.'"
                      }
                    }';
                	}

                    $ConteudoCabecalho = [
                      'Authorization: Bearer'.$token,
                      "Content-Type: application/json"

                    ];
                          
                       

                    $handler = curl_init($urlselodigital.$url_solicitacao);
                    curl_setopt_array($handler, [
                    CURLOPT_SSLVERSION => 5,                      
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
                    #var_dump($resp);exit();
                    $erro = curl_error($handler);
                    if (!isset($resp['status'])) {
                    $numeroSelo =  $resp['resumos'][0]['numeroSelo'];
                    $textoSelo = $resp['resumos'][0]['textoSelo'];
                    $dataGeracao = $resp['resumos'][0]['dataGeracao'];
                    $saldoRemanescente =  $resp['resumos'][0]['saldoRemanescente'];
                    $qrCode =  $resp['resumos'][0]['qrCode'];
                    $valorQrCode =  $resp['resumos'][0]['valorQrCode'];	
                    $RETORNO = json_encode($resp['resumos'][0]);		
                    $in_tabela_selos = $pdo->prepare("INSERT INTO `selagem_atos_retorno` (`ID`, `id_registro`, `tipo_registro`,`ato`, `numeroSelo`, `textoSelo`, `dataGeracao`, `saldoRemanescente`, `qrCode`, `valorQrCode`) VALUES (NULL,
                     ' ',
                     '$natureza_solicitacao', 
                     '$ato_praticado',
                     '$numeroSelo',
                     '$textoSelo',
                     '$dataGeracao',
                     '$saldoRemanescente',
                     '$qrCode',
                     '$valorQrCode');");

                     $in_tabela_selos->execute();

					$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$escrevente','$natureza_solicitacao','2','1','$numeroSelo',CURRENT_TIMESTAMP,'GRA','$ato_praticado','$livro','$folha','$termo','$tipopapel','$numpapel','$RETORNO')");
					$insert_auditoria->execute();


                    }
                    die(json_encode($resp));	

                    /*
                    $SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
                    $TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
                    $RETORNO = json_encode($resp['resumos'][0]);


                    echo $resp['resumos'][0]['numeroSelo'].'<br>';
                    echo $resp['resumos'][0]['textoSelo'].'<br>';
                    echo $resp['resumos'][0]['dataGeracao'].'<br>';
                    echo $resp['resumos'][0]['saldoRemanescente'].'<br>';
                    echo '<img src="data:image/png;base64,'.$resp['resumos'][0]['qrCode'].'"alt="Qr Code" /> </img>'.'<br>';
                    echo $resp['resumos'][0]['valorQrCode'].'<br>';
                    */  
                    



     
          }



?>