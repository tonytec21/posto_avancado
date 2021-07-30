<?php 
include('../controller/db_functions.php');
session_start();
$pdo = conectar();

$ato = $_POST['ato'];
$quantidade = $_POST['quantidade'];
$id_registro = $_POST['id_registro'];
$motivo_isento = $_POST['motivo_isento'];
$natureza_solicitacao = $_POST['natureza_solicitacao'];
#die($ato.$quantidade.$id_registro.$motivo_isento);
#exit();


#1º parte solicitando token de acesso:
include('../selador/civil_geral.php');
if ($token =='' || empty($token)) {
$_SESSION['erro'] = 'NENHUM DADO RECEBIDO DO SELADOR. TENTE NOVAMENTE atualize a página';
die($_SESSION['erro']);
}

if (!empty($token) && $token !='' && $token!= 'NULL' && $token!= 'null') {

#PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
                  $dados_tabela = PESQUISA_ALL_ID("averbacoes_civil",$id_registro);
                  foreach ($dados_tabela as $dados_tabela) {
		                  $tipo_registro_av = $dados_tabela->strTipo;

                      if ($tipo_registro_av == 'NA') {
                        $nomeparte1 = $dados_tabela->nome;
                      }

                      elseif ($tipo_registro_av == 'OB') {
                        $nomeparte1 = $dados_tabela->nome;
                      }
                      elseif ($tipo_registro_av == 'CA') {
                        $nomeparte1 = $dados_tabela->Conjuge1.' e '.$dados_tabela->Conjuge2;
                      }
                      else{
                        $nomeparte1 = $dados_tabela->nome;
                      }

                   $livro =$dados_tabela->strLivro ;
                   $folha =$dados_tabela->strFolha;
                   $termo = $dados_tabela->strOrdem;   
                  }	

                  $ato_praticado = $ato;
                  $escrevente = $_SESSION['nome'];
                  $motivo_isento= $motivo_isento;
                  $tipopapel = '';
                  $numpapel = '';
                  $tabela_custas = retorna_tabela_custas('civil');


                   if (isset($motivo_isento) && $motivo_isento!='') {
                   $isento = 'true';
                   $motivo_isento = $motivo_isento;
                   $ConteudoPOST = '{
                                  "codigoAto":"'.$ato_praticado.'",
                                  "escrevente":"'.$escrevente.'",
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
                          
                       

                    $handler = curl_init($_SESSION['urlselodigital'].'civil/atos-em-geral');
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
                     '$id_registro',
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