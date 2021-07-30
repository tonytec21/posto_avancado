 <?php

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

 $response = curl_exec($curl);
 $err = curl_error($curl);

 curl_close($curl);

 if ($err) {
   echo "cURL Error #:" . $err;
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
