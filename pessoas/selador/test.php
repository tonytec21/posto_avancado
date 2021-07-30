<?php
session_start();
include_once('../../../controller/db_functions.php');

$urls = PESQUISA_ALL_ID('cadastroserventia',1);
foreach ($urls as $urls) {
$_SESSION['urltoken'] = $urls->url_token;
$_SESSION['urlselodigital'] = $urls->url_selo;
$_SESSION['username_token'] = $urls->username_token;
$_SESSION['password_token'] = $urls->password_token;
$_SESSION['client_id_token'] = $urls->client_id_token;
$_SESSION['grant_type_token'] = $urls->grant_type_token;

#https://ma.portalselo.com.br:9443/auth - token
#https://ma.portalselo.com.br:9443/selo/ - selo
}


$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_PORT => "8443",
  CURLOPT_URL => $_SESSION['urltoken'] ,
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
//  $_SESSION['erro'] = "Error #CONECT #:" . $err."<br><p> 1 - Sua conexão de internet está nula ou limitada! <br> 2- O serviço que disponibiliza os selos digitais encontra-se inoperante! <br><br>Tente novamente em alguns minutos!!!</p>";
//  header('Location: ' . $_SERVER['HTTP_REFERER']);
  return false;
  break;
} else {
  // Converte JSON string para Array
    $respostaArray = json_decode($response, true);
   echo "TOKEN = ".$respostaArray["access_token"];
   echo "<BR> CONEXÃO OK";
   var_dump($response);
    // Converte JSON string para objeto
  //echo $respostaObject = json_decode($response);
//   print_r($respostaObject);
  //echo $respostaObject->token_type;
 //enviarResultado($respostaObject);

}
?>
