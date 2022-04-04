<?php

#PARTE 1 OBTENDO O TOKEN DE ACESSO:

                $array = array("username"=>"cartorio", "password" => "b81fb377ec0c", "client_id" => "selador", "grant_type" => "password");
                #$ConteudoPOST = json_encode($array);
                $ConteudoPOST = "username=cartorio&password=b81fb377ec0c&client_id=selador&grant_type=password";
                $ConteudoCabecalho = [
                    'Authorization: BearerSessionId=XXXXXXXXXXXXXXXXXXX;',
                    
                ];
                $curl = curl_init('https://ma.portalselo.com.br:9443/auth');

                 $curl = curl_init();

 curl_setopt_array($curl, array(
   CURLOPT_PORT => "9443",
   CURLOPT_URL => "https://ma.portalselo.com.br:9443/auth",
   CURLOPT_SSL_VERIFYHOST => 0,
   CURLOPT_SSL_VERIFYPEER => 0,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "POST",
   CURLOPT_POSTFIELDS => "username=cartorio&password=b81fb377ec0c&client_id=selador&grant_type=password",
   CURLOPT_HTTPHEADER => array(
     "content-type: application/x-www-form-urlencoded"
   ),
 ));
                $RespostaCURL = curl_exec($curl);
                $RespostaCURL = json_decode($RespostaCURL, true);
                $token =  $RespostaCURL['access_token'];
                #var_dump($RespostaCURL);
                #echo curl_error($curl);
                $info = curl_getinfo($curl);
                #var_dump($info);
                #echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];

if ($token =='' || empty($token)) {
                      die('NENHUM DADO RECEBIDO TENTE NOVAMENTE');
                      break;
                    }


    if ($token !='') {

for ($i=0; $i <= 50 ; $i++) { 

#PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
             $ato_praticado = '14.6.1';
                  $escrevente = 'EDSON ARANTES';
                  $isento = 'true';
                  $motivo_isento='Hipossuficiência';
                  $nomeparte1 ='ARTHUR COIMBRA';
                  $docparte1='04355863000132';
                  $nomeparte2 ='';
                  $docparte2='';
                  $nomeparte3 ='';
                  $docparte3='';
                  $nomeparte4 ='';
                  $docparte4='';
                  $livro ='123';
                  $folha='123'; 
            $ConteudoPOST = '{
                                  "codigoAto":"'.$ato_praticado.'",
                                  "escrevente":"'.$escrevente.'",
                                  "versaoTabelaDeCustas":"0120210328",
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
                                  "versaoTabelaDeCustas":"0120210328"
                                  }
                                  }';
              
                          $ConteudoCabecalho = [
                              'Authorization: Bearer'.$token,
                              "Content-Type: application/json"
                              
                          ];
                          
                       

                          $handler = curl_init('https://ma.portalselo.com.br:9443/selo/civil/atos-em-geral');

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
              die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
              break;
            }
                    #var_dump($resp);
                    $SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
                    $TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
                    $RETORNO = json_encode($resp['resumos'][0]);


                    echo $resp['resumos'][0]['numeroSelo'].'<br>';
                    echo $resp['resumos'][0]['textoSelo'].'<br>';
                    echo $resp['resumos'][0]['dataGeracao'].'<br>';
                    echo $resp['resumos'][0]['saldoRemanescente'].'<br>';
                    echo '<img src="data:image/png;base64,'.$resp['resumos'][0]['qrCode'].'"alt="Qr Code" /> </img>'.'<br>';
                    echo $resp['resumos'][0]['valorQrCode'].'<br>';

                    

                    #echo $resp['resumos'][0]['dataGeracao'].'<br>';
                    #echo $resp['resumos'][0]['numeroSelo'].'<br>';
                    #echo $resp['resumos'][0]['numeroSelo'].'<br>';
                    #$info = curl_getinfo($handler);
                    #var_dump($info);
                    #echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];



     
          }
}
?>