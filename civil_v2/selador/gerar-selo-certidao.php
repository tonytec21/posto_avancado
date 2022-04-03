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
if ($natureza_solicitacao == 'CERTIDAO_NASCIMENTO') {
$tabela_bd = 'registro_nascimento_novo';  
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['NOMENASCIDO'];
$docparte1 = $dados_parte['CPFNASCIDO'];
$livro = $dados_parte['LIVRONASCIMENTO'];
$folha = $dados_parte['FOLHANASCIMENTO'];
$termo = $dados_parte['TERMONASCIMENTO'];
$json_partes = '{
  "nome":"'.$nomeparte1.'"
}';

$json_add = '';


}

// CASO 2: AVERBAÇÃO DE NASCIMENTO
elseif ($natureza_solicitacao == 'AVERBACAO_NASCIMENTO') {
$tabela_bd = 'averbacoes_civil';
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['nome'];
$livro = $dados_parte['strLivro'];
$folha = $dados_parte['strFolha'];
$termo = $dados_parte['strOrdem'];
$json_partes = '{
  "nome":"'.$nomeparte1.'"
}';

$json_add = '';

}

// CASO 3: CERTIDÃO DE CASAMENTO

elseif ($natureza_solicitacao == 'CERTIDAO_CASAMENTO') {
$tabela_bd = 'registro_casamento_novo';  
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['NOMENUBENTE1'];
$docparte1 = $dados_parte['CPFNUBENTE1'];
$nomeparte2 = $dados_parte['NOMENUBENTE2'];
$docparte2 = $dados_parte['CPFNUBENTE2'];
$livro = $dados_parte['LIVROCASAMENTO'];
$folha = $dados_parte['FOLHACASAMENTO'];
$termo = $dados_parte['TERMOCASAMENTO'];

$json_partes = '
{
  "nome":"'.$nomeparte1.'"
},

{
  "nome":"'.$nomeparte2.'"
}';

$json_add = '';

}


// CASO 4: AVERBAÇÃO DE CASAMENTO

elseif ($natureza_solicitacao == 'AVERBACAO_CASAMENTO') {
$tabela_bd = 'averbacoes_civil';  
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['Conjuge1'];
$nomeparte2 = $dados_parte['Conjuge2'];
$livro = $dados_parte['strLivro'];
$folha = $dados_parte['strFolha'];
$termo = $dados_parte['strOrdem'];

$json_partes = '
{
  "nome":"'.$nomeparte1.'"
},

{
  "nome":"'.$nomeparte2.'"
}';

$json_add = '';

}


// CASO 5: REGISTRO DE OBITO
elseif ($natureza_solicitacao == 'CERTIDAO_OBITO') {
$tabela_bd = 'registro_obito_novo';  
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['NOME'];
$docparte1 = $dados_parte['CPF'];
$livro = $dados_parte['LIVROOBITO'];
$folha = $dados_parte['FOLHAOBITO'];
$termo = $dados_parte['TERMOOBITO'];
$json_partes = '{
  "nome":"'.$nomeparte1.'"
}';

$json_add = '';


}

// CASO 6: AVERBAÇÃO DE OBITO
elseif ($natureza_solicitacao == 'AVERBACAO_OBITO') {
$tabela_bd = 'averbacoes_civil';
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['nome'];
$livro = $dados_parte['strLivro'];
$folha = $dados_parte['strFolha'];
$termo = $dados_parte['strOrdem'];
$json_partes = '{
  "nome":"'.$nomeparte1.'"
}';

$json_add = '';

}



// CASO 7: CERTIDAO LIVRO ESPECIAL
elseif($natureza_solicitacao == 'CERTIDAO_LIVROE') {
$tabela_bd = 'registro_livro_e';  
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['NOMEPARTE1'];
$docparte1 = $dados_parte['CPFPARTE1'];
$nomeparte2 = $dados_parte['NOMEPARTE2'];
$docparte2 = $dados_parte['CPFPARTE2'];
$livro = $dados_parte['LIVRO'];
$folha = $dados_parte['FOLHA'];
$termo = $dados_parte['TERMO'];
$json_partes = '
{
  "nome":"'.$nomeparte1.'"
}
';

if (!empty($nomeparte2)) {
 $json_partes .= ',{
  "nome":"'.$nomeparte2.'"
}';
}

$json_add = '';
}


// CASO 8: AVERBCA0 LIVRO ESPECIAL
elseif($natureza_solicitacao == 'AVERBACAO_LIVROE') {
$tabela_bd = 'averbacoes_civil';
$dados_parte = json_table_registro($tabela_bd, $id_registro);
$dados_parte = json_decode($dados_parte,true);
$dados_parte = json_encode($dados_parte[0]);
$dados_parte = json_decode($dados_parte,true);
$nomeparte1 = $dados_parte['nome'];
$livro = $dados_parte['strLivro'];
$folha = $dados_parte['strFolha'];
$termo = $dados_parte['strOrdem'];
$json_partes = '{
  "nome":"'.$nomeparte1.'"
}';

$json_add = '';
}


// CASO 9: CERTIDAO NEGATIVA
elseif($natureza_solicitacao == 'CERTIDAO_NEGATIVA') {
$nomeparte1 =explode(";", $_POST['id_registro']);
$nomeparte1 = $nomeparte1[0];
$livro = '0';
$folha = '0';
$termo = '0';
$json_partes = '{
  "nome":"'.$nomeparte1.'"
}';

$json_add = '';
$id_registro = '0';
}




// DADOS PARA A SOLICITAÇÃO DO SELO
$motivo_isento = $_POST['motivo_isento'];
$motivo_isento = addslashes($_POST['motivo_isento']);
$array_tirar = array("º","'","°");
$motivo_isento = str_replace($array_tirar,"",$motivo_isento);

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
                  $url_solicitacao = '/civil/atos-em-geral';

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
                                  '.$json_partes.'
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
                       '.$json_partes.'
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
          
          if ($natureza_solicitacao == 'AVERBACAO_NASCIMENTO' || $natureza_solicitacao == 'AVERBACAO_CASAMENTO' || $natureza_solicitacao == 'AVERBACAO_OBITO' || $natureza_solicitacao == 'AVERBACAO_LIVROE') {
            UPDATE_CAMPO_ID("averbacoes_civil","strSelo",$numeroSelo,$id_registro);
          }

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