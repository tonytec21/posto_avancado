<?php
include('../controller/db_functions.php');
$pdo = conectar();
session_start();
$id = $_GET['id'];

#SUBMIT1 =====================================================================================================================
	if (isset($_POST['subimit1'])) {
		unset($_POST['subimit1']);

			if (!empty($_POST['TESTECPFPARTE1'])) {
			UPDATE_CAMPO_ID('registro_livro_e',"DOCPARTE1",$_POST['TESTECPFPARTE1'], $id );
			UPDATE_CAMPO_ID('registro_livro_e',"TIPODOCPARTE1","CPF", $id );
			}

			elseif (!empty($_POST['TESTERGPARTE1'])) {
			UPDATE_CAMPO_ID('registro_livro_e',"DOCPARTE1",$_POST['TESTERGPARTE1'], $id );
			UPDATE_CAMPO_ID('registro_livro_e',"TIPODOCPARTE1","RG", $id );
			}

			elseif (!empty($_POST['TESTEOTDOCPARTE1'])) {
			UPDATE_CAMPO_ID('registro_livro_e',"DOCPARTE1",$_POST['TESTEOTDOCPARTE1'], $id );
			UPDATE_CAMPO_ID('registro_livro_e',"TIPODOCPARTE1","OTDOC", $id );
			}

			if (!empty($_POST['TESTECPFPARTE2'])) {
			UPDATE_CAMPO_ID('registro_livro_e',"DOCPARTE2",$_POST['TESTECPFPARTE2'], $id );
			UPDATE_CAMPO_ID('registro_livro_e',"TIPODOCPARTE2","CPF", $id );
			}

			elseif (!empty($_POST['TESTERGPARTE2'])) {
			UPDATE_CAMPO_ID('registro_livro_e',"DOCPARTE2",$_POST['TESTERGPARTE2'], $id );
			UPDATE_CAMPO_ID('registro_livro_e',"TIPODOCPARTE2","RG", $id );
			}

			elseif (!empty($_POST['TESTEOTDOCPARTE2'])) {
			UPDATE_CAMPO_ID('registro_livro_e',"DOCPARTE2",$_POST['TESTEOTDOCPARTE2'], $id );
			UPDATE_CAMPO_ID('registro_livro_e',"TIPODOCPARTE2","OTDOC", $id );
			}



			if (!empty($_POST['TESTECPFPARTE3'])) {
			UPDATE_CAMPO_ID('registro_livro_e',"DOCPARTE3",$_POST['TESTECPFPARTE3'], $id );
			UPDATE_CAMPO_ID('registro_livro_e',"TIPODOCPARTE3","CPF", $id );
			}

			elseif (!empty($_POST['TESTERGPARTE3'])) {
			UPDATE_CAMPO_ID('registro_livro_e',"DOCPARTE3",$_POST['TESTERGPARTE3'], $id );
			UPDATE_CAMPO_ID('registro_livro_e',"TIPODOCPARTE3","RG", $id );
			}

			elseif (!empty($_POST['TESTEOTDOCPARTE3'])) {
			UPDATE_CAMPO_ID('registro_livro_e',"DOCPARTE3",$_POST['TESTEOTDOCPARTE3'], $id );
			UPDATE_CAMPO_ID('registro_livro_e',"TIPODOCPARTE1","OTDOC", $id );
			}

			if (isset($_POST['DATAOCORRIDO']) && !empty($_POST['DATAOCORRIDO']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"DATAOCORRIDO",addslashes($_POST['DATAOCORRIDO']), $id );
			}
			if (isset($_POST['REGIMECASAMENTO']) && !empty($_POST['REGIMECASAMENTO']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"REGIMECASAMENTO",addslashes($_POST['REGIMECASAMENTO']), $id );
			}
			
			if (isset($_POST['QUALIFICACAOPAI1']) && !empty($_POST['QUALIFICACAOPAI1']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"QUALIFICACAOPAIPARTE1",addslashes($_POST['QUALIFICACAOPAI1']), $id );
			}

			if (isset($_POST['QUALIFICACAOMAE1']) && !empty($_POST['QUALIFICACAOMAE1']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"QUALIFICACAOMAEPARTE1",addslashes($_POST['QUALIFICACAOMAE1']), $id );
			}

			if (isset($_POST['QUALIFICACAOPAI2']) && !empty($_POST['QUALIFICACAOPAI2']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"QUALIFICACAOPAIPARTE2",addslashes($_POST['QUALIFICACAOPAI2']), $id );
			}

			if (isset($_POST['QUALIFICACAOMAE2']) && !empty($_POST['QUALIFICACAOMAE2']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"QUALIFICACAOMAEPARTE2",addslashes($_POST['QUALIFICACAOMAE2']), $id );
			}

			if (isset($_POST['QUALIFICACAOPAI3']) && !empty($_POST['QUALIFICACAOPAI3']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"QUALIFICACAOPAIPARTE3",addslashes($_POST['QUALIFICACAOPAI3']), $id );
			}

			if (isset($_POST['QUALIFICACAOMAE3']) && !empty($_POST['QUALIFICACAOMAE3']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"QUALIFICACAOMAEPARTE3",addslashes($_POST['QUALIFICACAOMAE3']), $id );
			}

			/*
			if (isset($_POST['#']) && !empty($_POST['#']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"#",addslashes($_POST['#']), $id );
			}
			*/		


			if (isset($_POST['IDPESSOAPARTE1']) && !empty($_POST['IDPESSOAPARTE1']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"IDPESSOAPARTE1",addslashes($_POST['IDPESSOAPARTE1']), $id );
			}

			if (isset($_POST['IDPESSOAPARTE2']) && !empty($_POST['IDPESSOAPARTE2']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"IDPESSOAPARTE2",addslashes($_POST['IDPESSOAPARTE2']), $id );
			}

			if (isset($_POST['IDPESSOAPARTE3']) && !empty($_POST['IDPESSOAPARTE3']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"IDPESSOAPARTE3",addslashes($_POST['IDPESSOAPARTE3']), $id );
			}



		
			
				header('Location: ' . $_SERVER['HTTP_REFERER']);												

	}
#SUBMIT2 =====================================================================================================================
	if (isset($_POST['subimit2'])) {
		unset($_POST['subimit2']);	

			if (isset($_POST['DESCRICAOREGISTRO']) && !empty($_POST['DESCRICAOREGISTRO']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"DESCRICAOREGISTRO",addslashes($_POST['DESCRICAOREGISTRO']), $id );
			}

		 	if (isset($_POST['TEXTO_REGISTRO']) && !empty($_POST['TEXTO_REGISTRO']) ) {
			UPDATE_CAMPO_ID('registro_livro_e',"TEXTO_REGISTRO",addslashes($_POST['TEXTO_REGISTRO']), $id );
			}




		 	

								header('Location: ' . $_SERVER['HTTP_REFERER']);					

	}

#SUBMIT4 =====================================================================================================================
	if (isset($_POST['subimit4'])) {
		unset($_POST['subimit4']);
			#var_dump($_POST);
				header('Location: ' . $_SERVER['HTTP_REFERER']);

	}
#SUBIMITSELO =================================================================================================================
	if (isset($_POST['subimitselo'])) {

			if (!isset($_POST['ACERVOFISICO'])) {
				$_POST['ACERVOFISICO'] = '';
			}
			if (!isset($_POST['LIBERAREDICAO'])) {
				$_POST['LIBERAREDICAO'] = '';
			}
		if ($_POST['ACERVOFISICO']=='' && $_POST['LIBERAREDICAO']=='') {

			#VERIFICACOES E VALIDAÇÕES:
			#$SELO = $_POST['SELO2'];
			$LIVRO = $_POST['LIVROESPECIAL'];
			$FOLHA = $_POST['FOLHAESPECIAL'];
			$TERMO = intval($_POST['TERMOESPECIAL']);
			$ATO = $_POST['ATOESPECIAL'];
			$TIPOPAPEL = '0';
			$NUMEROPAPEL = '0';

			$pesq_livre = $pdo->prepare("SELECT * FROM livro_especial where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA'");
			$pesq_livre->execute();
			$pl = $pesq_livre->fetch(PDO::FETCH_ASSOC);
			if ($pl['Status'] == 'U') {
			$_SESSION['erro'] = 'OPS! ALGUÉM PODE TER USADO ESSA PÁGINA ENQUANTO VOCÊ DIGITAVA, TENTE NOVAMENTE COM OUTRA PÁGINA';
			die($_SESSION['erro']);
			break;	
			}
			else{
			$up_pagina = $pdo->prepare("UPDATE livro_especial set Status = 'U' where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA'");

			}

		include('../selador/civil_geral.php');
		if ($token =='' || empty($token)) {
                    	die('NENHUM DADO RECEBIDO TENTE NOVAMENTE');
                    	break;
                    }


		if ($token !='') {


#PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
            

			$pesquisanomeparte = PESQUISA_ALL_ID('registro_livro_e',$id);
			foreach ($pesquisanomeparte as $p) {
			$busca_parte1 = $pdo->prepare("SELECT strNome, strCPFcnpj FROM pessoa where ID = '$p->IDPESSOAPARTE1' ");
			$busca_parte1->execute();
			$bp1 = $busca_parte1->fetch(PDO::FETCH_ASSOC);
			$nomeparte1 = addslashes($bp1['strNome']);
			$docparte1 = $bp1['strCPFcnpj'];

			$busca_parte2 = $pdo->prepare("SELECT strNome, strCPFcnpj FROM pessoa where ID = '$p->IDPESSOAPARTE2' ");
			$busca_parte2->execute();
			$bp2 = $busca_parte2->fetch(PDO::FETCH_ASSOC);
			$nomeparte2 = addslashes($bp2['strNome']);
			$docparte2 = $bp2['strCPFcnpj'];



			}

            $ato_praticado = $_POST['ATOESPECIAL'];
            $escrevente = $_SESSION['nome'];
            if (isset($_POST['motivoisento']) && $_POST['motivoisento']!='') {
			$isento = 'true';
			$motivo_isento=$_POST['motivoisento'];
			}else{
			$isento = 'false';
			$motivo_isento='';
			}
        
            $livro =$LIVRO;
            $folha=$FOLHA;
            $termo=$TERMO;
            				if (isset($_GET['motivoatoisento']) && $_GET['motivoatoisento']!='') {
                   $isento = 'true';
                   $motivo_isento = $_GET['motivoatoisento'];
                   $ConteudoPOST = '{
                                  "codigoAto":"'.$ato_praticado.'",
                                  "escrevente":"'.$escrevente.'",
                                  "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
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
                                  "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
                                  }
                                  }';
                  }
                  else{
                  $isento = 'false';
                  $motivo_isento='';
                  $ConteudoPOST = '{
                                  "codigoAto":"'.$ato_praticado.'",
                                  "escrevente":"'.$escrevente.'",
                                  "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
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
                                  "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
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
                    #var_dump($resp);
                    #echo curl_error($handler);
                    $erro = curl_error($handler);
                  	if (isset($resp['status'])) {
							die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
							break;
						}
                    $SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
                    $TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
                    $RETORNO = json_encode($resp['resumos'][0]);
                    #echo $resp['resumos'][0]['dataGeracao'].'<br>';
                    #echo $resp['resumos'][0]['numeroSelo'].'<br>';
                    #echo $resp['resumos'][0]['numeroSelo'].'<br>';
                    #$info = curl_getinfo($handler);
                    #var_dump($info);
                    #echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];



					
					if ($erro!='') {
                        $erro;
                    }
					
						

                   
                    

                    else{
					
					#parte de auditoria:
					$LIVRO = $_POST['LIVROESPECIAL'];
					$FOLHA = $_POST['FOLHAESPECIAL'];
					$TERMO = intval($_POST['TERMOESPECIAL']);
					$ATO = $_POST['ATOESPECIAL'];
					$TIPOPAPEL = '0';
					$NUMEROPAPEL = '00';	
					$funcionario = $_SESSION['nome'];
					$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','REG. LIVRO ESPECIAL','2','1','$SELO',CURRENT_TIMESTAMP,'GRA','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
					
				

					UPDATE_CAMPO_ID('registro_livro_e','RETORNOSELODIGITAL',strip_tags($RETORNO),$id);
					$insert_auditoria->execute();
				
                    $up_pagina->execute();
                    $_POST['SELO2'] = $SELO;	
					
					

					}
}
}
#DADOS REGISTRO:

if (!isset($SELO )|| $SELO =='') {
if (isset($_POST['SELO2'])) {
$_POST['SELO2'] = $_POST['SELO2'];
}
else{
	$_POST['SELO2'] = '';
}

}

					if (isset($_POST['ATOESPECIAL'])) {
					UPDATE_CAMPO_ID('registro_livro_e','ATO',$_POST['ATOESPECIAL'],$id);
					}	
					UPDATE_CAMPO_ID('registro_livro_e','LIVRO',mb_strtoupper($_POST['LIVROESPECIAL']),$id);
					UPDATE_CAMPO_ID('registro_livro_e','FOLHA',mb_strtoupper($_POST['FOLHAESPECIAL']),$id);
					UPDATE_CAMPO_ID('registro_livro_e','TERMO',mb_strtoupper($_POST['TERMOESPECIAL']),$id);
					UPDATE_CAMPO_ID('registro_livro_e','MATRICULA',mb_strtoupper($_POST['MATRICULA']),$id);
					UPDATE_CAMPO_ID('registro_livro_e','SELO',mb_strtoupper($_POST['SELO2']),$id);
					UPDATE_CAMPO_ID('registro_livro_e','DATAREGISTRO',$_POST['DATAENTRADA'],$id);
					
					
				

if (isset($SELO)) {
	die(strip_tags($SELO));
}

}

 ?>