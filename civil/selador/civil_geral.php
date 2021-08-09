<?php
$urls = PESQUISA_ALL_ID('cadastroserventia',1);
foreach ($urls as $urls) {
$_SESSION['urltoken'] = $urls->url_token;
$_SESSION['urlselodigital'] = $urls->url_selo;
$username = $urls->username_token;
$password = $urls->password_token;
$client_id = $urls->client_id_token;
$grant_type = $urls->grant_type_token;
}
#PARTE 1 OBTENDO O TOKEN DE ACESSO:

                $array = array("username"=>"$username", "password" => "$password", "client_id" => "$client_id", "grant_type" => "$grant_type");
                #$ConteudoPOST = json_encode($array);
                $ConteudoPOST = "username=".$username."&password=".$password."&client_id=selador&grant_type=password";
                $ConteudoCabecalho = [
                    'Authorization: BearerSessionId=XXXXXXXXXXXXXXXXXXX;',

                ];
                $curl = curl_init($_SESSION['urltoken']);

                 $curl = curl_init();

 curl_setopt_array($curl, array(
   CURLOPT_URL => $_SESSION['urltoken'],
   CURLOPT_SSL_VERIFYHOST => 0,
   CURLOPT_SSL_VERIFYPEER => 0,
   CURLOPT_RETURNTRANSFER => true,
   CURLOPT_ENCODING => "",
   CURLOPT_MAXREDIRS => 10,
   CURLOPT_TIMEOUT => 30,
   CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
   CURLOPT_CUSTOMREQUEST => "POST",
   CURLOPT_POSTFIELDS => "username=".$username."&password=".$password."&client_id=selador&grant_type=password",
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



?>
