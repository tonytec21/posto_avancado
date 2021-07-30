 <?php

 $curl = curl_init();

 curl_setopt_array($curl, array(
   //CURLOPT_PORT => "9443",
   CURLOPT_URL => $_SESSION['urltoken'],
   CURLOPT_SSL_VERIFYHOST => 0,
   CURLOPT_SSL_VERIFYPEER => 0,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "POST",
   CURLOPT_POSTFIELDS => "username=".$_SESSION['username_token']."&password=".$_SESSION['password_token']."&client_id=".$_SESSION['client_id_token'] ."&grant_type=".$_SESSION['grant_type_token'],
  // CURLOPT_POSTFIELDS => "username=cartorio&password=b81fb377ec0c&client_id=selador&grant_type=password",
   CURLOPT_HTTPHEADER => array(
     "content-type: application/x-www-form-urlencoded"
   ),
 ));

 $response = curl_exec($curl);
 $err = curl_error($curl);

 curl_close($curl);

 if ($err) {
   echo "cURL Error #:" . $err;
   $_SESSION['erro'] = "Error #CONECT #:" . $err."<br><p> 1 - Sua conexão de internet está nula ou limitada! <br> 2- O serviço que disponibiliza os selos digitais encontra-se inoperante! <br><br>Tente novamente em alguns minutos!!!</p>";
   header('Location: ' . $_SERVER['HTTP_REFERER']);
   return false;
   break;
 } else {
   // Converte JSON string para Array
    $respostaArray = json_decode($response, true);
  //  echo "ACESS TOKEN = ".$respostaArray["access_token"];
     // Converte JSON string para objeto
   $respostaObject = json_decode($response);
//   print_r($respostaObject);
   //echo $respostaObject->token_type;
  enviarResultado($respostaObject);

 }
 ?>
