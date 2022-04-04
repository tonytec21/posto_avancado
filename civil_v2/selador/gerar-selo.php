<?php 
include('../controller/db_functions.php');
session_start();
$pdo = conectar();


$id_registro = $_POST['id_registro'];
$natureza_solicitacao = $_POST['natureza_solicitacao'];
$ato = $_POST['ato'];
$quantidade = $_POST['quantidade'];

if ($quantidade > 1) {
$json_quantidade = '"quantidade":"'.$quantidade.'",';
}
else{
 $json_quantidade = '"quantidade":"1",'; 
}

// CASO 1: REGISTRO DE NASCIMENTO
if ($natureza_solicitacao == 'REGISTRO_NASCIMENTO') {
$tabela_bd = 'registro_nascimento_novo';  
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['NOMENASCIDO'];
$docparte1 = $dados_parte['CPFNASCIDO'];
$json_partes = '{
  "documento":"'.$docparte1.'",
  "nome":"'.$nomeparte1.'"
}';
$url_solicitacao = '/civil/nascimento';

$json_add = '';
}

// CASO 2: HABILITAÇÃO DE CASAMENTO
elseif($natureza_solicitacao == 'HABILITACAO_CASAMENTO') {
$tabela_bd = 'registro_casamento_novo';  
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['NOMENUBENTE1'];
$docparte1 = $dados_parte['CPFNUBENTE1'];
$nomeparte2 = $dados_parte['NOMENUBENTE2'];
$docparte2 = $dados_parte['CPFNUBENTE2'];
$url_solicitacao = '/civil/casamento/habilitacao';

if (!isset($_SESSION['logadoAdm']) && !empty($dados_parte['RETORNOSELODIGITALPROCLAMAS'])) {
die('{"status":"ERRO!", "message":"JÁ FORAM SOLICITADOS SELOS ANTERIORMENTE PARA ESTE REGISTRO","details":"JÁ FORAM SOLICITADOS SELOS ANTERIORMENTE PARA ESTE REGISTRO", "error":""}');
exit();
}  

$json_partes = '
{
  "documento":"'.$docparte1.'",
  "nome":"'.$nomeparte1.'"
},

{
  "documento":"'.$docparte2.'",
  "nome":"'.$nomeparte2.'"
}';

$nomenubente1 = $nomeparte1;
$nomenubente2 = $nomeparte2;

$json_add = ' "tipoCasamento":"0",
"nomePrimeiroNubente":"'.$nomenubente1.'",
"nomeSegundoNubente":"'.$nomenubente2.'",';


}


// CASO 3: REGISTRO DE CASAMENTO
elseif($natureza_solicitacao == 'REGISTRO_CASAMENTO') {
$tabela_bd = 'registro_casamento_novo';  
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['NOMECASADONUBENTE1'];
$docparte1 = $dados_parte['CPFNUBENTE1'];
$nomeparte2 = $dados_parte['NOMECASADONUBENTE2'];
$docparte2 = $dados_parte['CPFNUBENTE2'];
$url_solicitacao = '/civil/casamento';
$TIPOLIVRO = $dados_parte['TIPOLIVRO'];

if (!isset($_SESSION['logadoAdm']) && !empty($dados_parte['RETORNOSELODIGITALCASAMENTO'])) {
die('{"status":"ERRO!", "message":"JÁ FORAM SOLICITADOS SELOS ANTERIORMENTE PARA ESTE REGISTRO","details":"JÁ FORAM SOLICITADOS SELOS ANTERIORMENTE PARA ESTE REGISTRO", "error":""}');
exit();
}  

$json_partes = '
{
  "documento":"'.$docparte1.'",
  "nome":"'.$nomeparte1.'"
},

{
  "documento":"'.$docparte2.'",
  "nome":"'.$nomeparte2.'"
}';

$nomenubente1 = $nomeparte1;
$nomenubente2 = $nomeparte2;

if ($TIPOLIVRO == 2) {
  $tipo_casamento = '0';          
}
else{
  $tipo_casamento = '1';
}

$json_add = ' "tipoCasamento":"'.$tipo_casamento.'",
"nomePrimeiroNubente":"'.$nomenubente1.'",
"nomeSegundoNubente":"'.$nomenubente2.'",';


}

// CASO 4: REGISTRO DE OBITO

elseif ($natureza_solicitacao == 'REGISTRO_OBITO') {
$tabela_bd = 'registro_obito_novo';  
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['NOME'];
$docparte1 = $dados_parte['CPF'];
$json_partes = '{
  "documento":"'.$docparte1.'",
  "nome":"'.$nomeparte1.'"
}';
$url_solicitacao = '/civil/obito';

$json_add = '';
}





// CASO 5: REGISTRO LIVRO ESPECIAL
elseif($natureza_solicitacao == 'REGISTRO_LIVROE') {
$tabela_bd = 'registro_livro_e';  
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['NOMEPARTE1'];
$docparte1 = $dados_parte['CPFPARTE1'];
$nomeparte2 = $dados_parte['NOMEPARTE2'];
$docparte2 = $dados_parte['CPFPARTE2'];
$url_solicitacao = '/civil/atos-em-geral';

if (!isset($_SESSION['logadoAdm']) && !empty($dados_parte['RETORNOSELODIGITAL'])) {
die('{"status":"ERRO!", "message":"JÁ FORAM SOLICITADOS SELOS ANTERIORMENTE PARA ESTE REGISTRO","details":"JÁ FORAM SOLICITADOS SELOS ANTERIORMENTE PARA ESTE REGISTRO", "error":""}');
exit();
}  

$json_partes = '
{
  "nome":"'.$nomeparte1.'"
}';
if (!empty($nomeparte2)) {
 $json_partes .= ', {
  "nome":"'.$nomeparte2.'"
}';
}

$json_add = '"codigoAto":"'.$ato.'",';
}






// DADOS PARA A SOLICITAÇÃO DO SELO
$motivo_isento = $_POST['motivo_isento'];
$livro = $_POST['livro'];
$folha = $_POST['folha'];
$termo = $_POST['termo'];
$partes = addslashes($_POST['partes']);
$motivo_isento = addslashes($_POST['motivo_isento']);
$tipopapelseguranca = $_POST['tipopapelseguranca'];
$numeropapelseguranca = $_POST['numeropapelseguranca'];
#die($ato.'-'.$quantidade.'-'.$id_registro.'-'.$motivo_isento);
#exit();


#1º parte solicitando token de acesso:
include('civil_geral.php');
if (!isset($token) || empty($token) || $token == '') {
die($erro);
}

if (isset($token) && !empty($token) && $token !='' && $token!= 'NULL' && $token!= 'null') {

#PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
                
                  $ato_praticado = $ato;
                  $escrevente = $_SESSION['nome'];
                  $motivo_isento= $motivo_isento;
                  $tipopapel = $tipopapelseguranca;
                  $numpapel = $numeropapelseguranca;
                  $tabela_custas = retorna_tabela_custas('civil');
                  

                   if (isset($motivo_isento) && $motivo_isento!='') {
                   $isento = 'true';
                   $motivo_isento = $motivo_isento;
                   $ConteudoPOST = '{
                            "codigoTipoAtoRegistro":"'.$ato_praticado.'",
                            "escrevente":"'.$escrevente.'",
                            "nomeParte":"'.$partes.'",
                            "versaoTabelaDeCustas":"'.$tabela_custas.'",
                            "nomesPartes": {
                            "nomesPartes":"X",
                            "parteAto":[
                            '.$json_partes.'
                            ]},
                             '.$json_add.'
                            "dadosSelo":{
                            "isento":"true",
                            "motivoIsentoGratuito":"'.$motivo_isento.'",    
                            "escrevente":"'.$escrevente.'",
                            "folha": "'.$folha.'",
                            "livro": "A'.$livro.'",
                            "termo": "'.$termo.'",
                            "versaoTabelaDeCustas":"'.$tabela_custas.'"
                            },
                            "papelMoeda":{
                              "codigo":"'.$numpapel.'",
                              "fornecedor":"'.$tipopapel.'"
                            }
                            }';
                  }
                  else{


                  $ConteudoPOST = '{
                            "codigoTipoAtoRegistro":"'.$ato_praticado.'",
                            "escrevente":"'.$escrevente.'",
                            "nomeParte":"'.$partes.'",
                            "versaoTabelaDeCustas":"'.$tabela_custas.'",
                            "nomesPartes": {
                            "nomesPartes":"X",
                            "parteAto":[
                             '.$json_partes.'
                            ]},
                             '.$json_add.'
                            "dadosSelo":{
                            "escrevente":"'.$escrevente.'",
                            "folha": "'.$folha.'",
                            "livro": "A'.$livro.'",
                            "termo": "'.$termo.'",
                            "versaoTabelaDeCustas":"'.$tabela_custas.'"
                            },
                            "papelMoeda":{
                              "codigo":"'.$numpapel.'",
                              "fornecedor":"'.$tipopapel.'"
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
          
          $EMPRESA = $_POST['tipopapelseguranca'];
          $PAPEL = $_POST['numeropapelseguranca'];
          $UPSEGURANCA = $pdo->prepare("UPDATE folhaseguranca set STATUS = 'U' WHERE EMPRESA = '$EMPRESA' AND PAPEL = '$PAPEL'");
          $UPSEGURANCA->execute();

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