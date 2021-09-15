<?php
//session_start();
 $curl = curl_init();
 curl_setopt_array($curl, array(
   //CURLOPT_PORT => "9443",
  CURLOPT_URL => "https://sistemabookcartorios.com/sis/api/token/generate.php",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_SSL_VERIFYHOST => 0,
  CURLOPT_SSL_VERIFYPEER => 0,
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_POSTFIELDS =>"{\n\"username\":\"admin\",\n\"password\":\"admin123\"\n}",
  CURLOPT_HTTPHEADER => array(
    "Content-Type: application/json"
   ),
 ));

 $response = curl_exec($curl);
 $err = curl_error($curl);

 curl_close($curl);

 if ($err) {
   echo "cURL Error #:" . $err;
   $resultado_erro = "Error #CONECT #:" . $err."<br><p> O serviço que disponibiliza API encontra-se inoperante! <br><br>Tente novamente em alguns minutos!!!</p>";
   print_r($resultado_erro);
   return false;
   break;
 } else {

	// Converte JSON string para Array
	// $respostaArray = json_decode($response, true);
	// echo "ACESS TOKEN = ".$respostaArray["access_token"];
	// Converte JSON string para objeto
	$respostaObject = json_decode($response);
	// print($respostaObject->document->access_token);	
	//print_r($respostaObject);
	//echo $respostaObject->access_token;
	enviarResultado($respostaObject->document);
 }
#####iniciando funcao ######
 function enviarResultado($valor) {
// echo " Authorization: ".$valor->token_type." ".$valor->access_token;
if ($valor->access_token) {
  $autorizacao = $valor->access_token;
}else {
  print("<p> Erro ao obter o token de acesso!!!</p><p>Entre em contato com o suporte para obter mais detalhes !!!");
  //header('Location: ' . $_SERVER['HTTP_REFERER']);
  return false;
  break;
}

require_once('controller/conexao.php');$pdo = conectar();
  # BUSCANDO DADOS DA SERVENTIA PARA DIFERENCIAR LOGIN AUTOMATICAMENTE:
    $busca_dados_serventia = $pdo->prepare("SELECT * FROM cadastroserventia");
    $busca_dados_serventia->execute();
    $linhas_serventia = $busca_dados_serventia->fetch(PDO::FETCH_ASSOC);

    $login_titular = $linhas_serventia['strCpfTitular'];
    $nome_titular = strtoupper($linhas_serventia['strTituloServentia']);
	$cns = $linhas_serventia['strCNS'];
	$url =  "https://sistemabookcartorios.com/sis/api/clientes/read_cns.php?cns=".$cns;##$d->URL(); ## URL PARA ENVIAR

  $curl = curl_init();
  curl_setopt_array($curl, array(
    CURLOPT_URL => "$url",
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_ENCODING => "",
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_SSL_VERIFYHOST => 0,
    CURLOPT_SSL_VERIFYPEER => 0,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => "POST",
    CURLOPT_POSTFIELDS =>"",
	//  CURLOPT_POSTFIELDS =>"{\n\"username\":\"admin\",\n\"password\":\"admin123\"\n}",
    CURLOPT_HTTPHEADER => array(
     "Authorization: Bearer $autorizacao",
      "Content-Type: application/json"
    ),
  ));

  $response = curl_exec($curl);
  $err = curl_error($curl);

  curl_close($curl);

  if ($err) {
    echo "cURL Error #:" . $err;
  $MENSAGEM_ERRO = "Error #API #:" . $err."<br> API DE SERVIÇO INOPERANTE !!!";
  print('<pre>');
  print($MENSAGEM_ERRO);
  print('<pre>');  
  return false;
  break;
  } else {
  //  echo $response;
  $respostaObject = json_decode($response);
  var_dump($respostaObject);
  ##var_dump($respostaObject->document->SERVENTIA_CNS);  //exibe cns
		if ($respostaObject->code != 0) {
		$_SESSION["DADOS_SERVENTIA"]= $respostaObject->dados->SERVENTIA_CNS;  #exemplo 1
		$_SESSION["DADOS_STATUS"]= $respostaObject->dados->STATUS;  
		$_SESSION["DADOS_MENSAGEM"]= $respostaObject->dados->MENSAGEM;  
		$_SESSION["DATA_INICIAL"]= $respostaObject->dados->DATA_INICIAL;  
		$_SESSION["DATA_FINAL"]= $respostaObject->dados->DATA_FINAL; 
		$_SESSION["K_MENSAGEM"]= $respostaObject->dados->K_MENSAGEM;  
		$_SESSION["K_SISTEMA"]= $respostaObject->dados->K_SISTEMA; 
		$_SESSION["LINK"]= $respostaObject->dados->LINK;
		
		$mensagem = $_SESSION["DADOS_MENSAGEM"];
		$link = $_SESSION["LINK"];
		$status = $_SESSION["DADOS_STATUS"];
		$k_mensagem = $_SESSION["K_MENSAGEM"];
		$k_sistema = $_SESSION["K_SISTEMA"];
		
		
		
			###MENSAGEM
			if (isset($respostaObject->dados->MENSAGEM)) { 
			$update = $pdo->prepare("update cadastroserventia set mensagem = '$mensagem' where strCNS = '$cns'"); 
				if ($update->execute()) {echo 'OK';}else {echo 'Erro salvar mensagem';}
			}	
			###LINK
			if (isset($respostaObject->dados->LINK)) { 
			$update = $pdo->prepare("update cadastroserventia set link = '$link' where strCNS = '$cns'"); 
				if ($update->execute()) {echo 'OK';}else {echo 'Erro salvar link';}
			}	
			######STATUS
			if ($respostaObject->dados->STATUS != 1 ) { 
			$update = $pdo->prepare("update cadastroserventia set status_serventia = '$status' where strCNS = '$cns'"); 
				if ($update->execute()) {echo 'OK';}else {echo 'Erro salvar status';}
			}
			######K_MENSAGEM
			if (isset($respostaObject->dados->K_MENSAGEM)) { 
			$update = $pdo->prepare("update cadastroserventia set k_mensagem = '$k_mensagem' where strCNS = '$cns'"); 
				if ($update->execute()) {echo 'OK';}else {echo 'Erro salvar k_mensagem';}
			}
			#######K_SISTEMA
			if (isset($respostaObject->dados->K_SISTEMA)) { 
			$update = $pdo->prepare("update cadastroserventia set k_sistema = '$k_sistema' where strCNS = '$cns'"); 
				if ($update->execute()) {echo 'OK';}else {echo 'Erro salvar k_sistema';}
			}
			$conexao = 'ok';
		}else{
			### mensagem de aviso de erro !!!
			
			print("Error #API #:" . $err." API DE SERVIÇO INOPERANTE !!!");
		}
  }
 } ?>