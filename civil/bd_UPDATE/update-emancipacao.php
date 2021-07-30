<?php
include('../controller/db_functions.php');
$pdo = conectar();
session_start();
$id = $_GET['id'];

#SUBMIT1 =====================================================================================================================
	if (isset($_POST['subimit1'])) {
		unset($_POST['subimit1']);


			UPDATE_CAMPO_ID('registro_emancipacao_novo','NOMEEMANCIPADO',mb_strtoupper($_POST['NOMEEMANCIPADO']),$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','DATANASCIMENTOEMANCIPADO',$_POST['DATANASCIMENTOEMANCIPADO'],$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','NATURALIDADEEMANCIPADO',$_POST['NATURALIDADEEMANCIPADO'],$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','SEXOEMANCIPADO',$_POST['SEXOEMANCIPADO'],$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','PROFISSAOEMANCIPADO',mb_strtoupper($_POST['PROFISSAOEMANCIPADO']),$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','ENDERECOEMANCIPADO',mb_strtoupper($_POST['ENDERECOEMANCIPADO']),$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','BAIRROEMANCIPADO',mb_strtoupper($_POST['BAIRROEMANCIPADO']),$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','CIDADEEMANCIPADO',$_POST['CIDADEEMANCIPADO'],$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','CARTORIOREGISTRO',mb_strtoupper($_POST['CARTORIOREGISTRO']),$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','DATAJULGADO',$_POST['DATAJULGADO'],$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','DATAEMANCIPACAO',$_POST['DATAEMANCIPACAO'],$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','LIVROREGISTRONASCIMENTO',mb_strtoupper($_POST['LIVROREGISTRONASCIMENTO']),$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','FOLHAREGISTRONASCIMENTO',mb_strtoupper($_POST['FOLHAREGISTRONASCIMENTO']),$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','CARTORIOESCRITURA',mb_strtoupper($_POST['CARTORIOESCRITURA']),$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','LIVROESCRITURA',mb_strtoupper($_POST['LIVROESCRITURA']),$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','FOLHAESCRITURA',mb_strtoupper($_POST['FOLHAESCRITURA']),$id);
			UPDATE_CAMPO_ID('registro_emancipacao_novo','REGISTROESCRITURA',mb_strtoupper($_POST['REGISTROESCRITURA']),$id);

				header('Location: ' . $_SERVER['HTTP_REFERER']);												

	}
#SUBMIT2 =====================================================================================================================
	if (isset($_POST['subimit2'])) {
		unset($_POST['subimit2']);	
	
		 	 
				if (isset($_POST['NOMEPAI'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','NOMEPAI',mb_strtoupper($_POST['NOMEPAI']),$id);
				}
				if (isset($_POST['NATURALIDADEPAI'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','NATURALIDADEPAI',mb_strtoupper($_POST['NATURALIDADEPAI']),$id);
				}
				if (isset($_POST['PROFISSAOPAI'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','PROFISSAOPAI',mb_strtoupper($_POST['PROFISSAOPAI']),$id);
				}
				if (isset($_POST['ENDERECOPAI'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','ENDERECOPAI',mb_strtoupper($_POST['ENDERECOPAI']),$id);
				}
				if (isset($_POST['BAIRROPAI'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','BAIRROPAI',mb_strtoupper($_POST['BAIRROPAI']),$id);
				}
				if (isset($_POST['CIDADEPAI'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','CIDADEPAI',mb_strtoupper($_POST['CIDADEPAI']),$id);
				}
				if (isset($_POST['ROGOPAI'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','ROGOPAI',mb_strtoupper($_POST['ROGOPAI']),$id);
				}
				if (isset($_POST['NOMEMAE'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','NOMEMAE',mb_strtoupper($_POST['NOMEMAE']),$id);
				}
				if (isset($_POST['NATURALIDADEMAE'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','NATURALIDADEMAE',mb_strtoupper($_POST['NATURALIDADEMAE']),$id);
				}
				if (isset($_POST['PROFISSAOMAE'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','PROFISSAOMAE',mb_strtoupper($_POST['PROFISSAOMAE']),$id);
				}
				if (isset($_POST['ENDERECOMAE'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','ENDERECOMAE',mb_strtoupper($_POST['ENDERECOMAE']),$id);
				}
				if (isset($_POST['BAIRROMAE'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','BAIRROMAE',mb_strtoupper($_POST['BAIRROMAE']),$id);
				}
				if (isset($_POST['CIDADEMAE'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','CIDADEMAE',mb_strtoupper($_POST['CIDADEMAE']),$id);
				}
				if (isset($_POST['NOMETUTOR'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','NOMETUTOR',mb_strtoupper($_POST['NOMETUTOR']),$id);
				}
				if (isset($_POST['NATURALIDADETUTOR'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','NATURALIDADETUTOR',mb_strtoupper($_POST['NATURALIDADETUTOR']),$id);
				}
				if (isset($_POST['PROFISSAOTUTOR'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','PROFISSAOTUTOR',mb_strtoupper($_POST['PROFISSAOTUTOR']),$id);
				}
				if (isset($_POST['ENDERECOTUTOR'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','ENDERECOTUTOR',mb_strtoupper($_POST['ENDERECOTUTOR']),$id);
				}
				if (isset($_POST['BAIRROTUTOR'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','BAIRROTUTOR',mb_strtoupper($_POST['BAIRROTUTOR']),$id);
				}
				if (isset($_POST['CIDADETUTOR'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','CIDADETUTOR',mb_strtoupper($_POST['CIDADETUTOR']),$id);
				}
				if (isset($_POST['ROGOTUTOR'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','ROGOTUTOR',mb_strtoupper($_POST['ROGOTUTOR']),$id);
				}

				if (isset($_POST['CPFPAI'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','CPFPAI',mb_strtoupper($_POST['CPFPAI']),$id);
				}
				if (isset($_POST['CPFMAE'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','CPFMAE',mb_strtoupper($_POST['CPFMAE']),$id);
				}
				if (isset($_POST['CPFTUTOR'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','CPFTUTOR',mb_strtoupper($_POST['CPFTUTOR']),$id);
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
			$TIPOPAPEL = $_POST['TIPOPAPELSEGURANCA'];
			$NUMEROPAPEL = $_POST['NUMEROPAPELSEGURANCA'];

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
            

			$pesquisanomeparte = PESQUISA_ALL_ID('registro_emancipacao_novo',$id);
			foreach ($pesquisanomeparte as $p) {
			$nomeparte = $p->NOMEEMANCIPADO;
			$pai = $p->NOMEPAI;
			$mae = $p->NOMEMAE;
			$docpai = $p->CPFPAI;
			$docmae = $p->CPFMAE;
			$numero = $p->REGISTROESCRITURA;
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
            $nomeparte1 =$pai;
            $docparte1=$docpai;
            $nomeparte2 =$mae;
            $docparte2=$docmae;
            $nomeparte3 ='';
            $docparte3='';
            $nomeparte4 ='';
            $docparte4='';
            $livro =$LIVRO;
            $folha=$FOLHA;
            $termo=$TERMO;


                            $ConteudoPOST = '{
                            "codigoTipoAtoCertidao":"14.5.1",
                            "codigoTipoAtoRegistro":"'.$ato_praticado.'",
                            "numeroEscritura":"'.$numero.'",
                            "escrevente":"'.$escrevente.'",
                            "isento":{
                            "value":'.$isento.',
                            "motivo":"'.$motivo_isento.'"
                            },
                            "nomeParte":"'.$nomeparte.'",
                            "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
                            "nomesPartes": {
                            "nomesPartes":"X",
                            "parteAto":[
                            {
                            "documento":"'.$docparte1.'",
                            "nome":"'.$nomeparte1.'"
                            },
                            {
                            "documento":"'.$docparte2.'",
                            "nome":"'.$nomeparte2.'"
                            }
                            ]},

                            "dadosSelo":{
                            "escrevente":"'.$escrevente.'",
                            "folha": "'.$FOLHA.'",
                            "livro": "E'.$LIVRO.'",
                            "termo": "'.$TERMO.'",
                            "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
                            },
                            "papelMoeda":{
                            	"codigo":"'.$NUMEROPAPEL.'",
                            	"fornecedor":"'.$TIPOPAPEL.'"
                            }
                            }';
        
                    $ConteudoCabecalho = [
                        'Authorization: Bearer'.$token,
                        "Content-Type: application/json"
                        
                    ];
                    
                 

                    $handler = curl_init($_SESSION['urlselodigital'].'civil/emancipacao');

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
					$TIPOPAPEL = $_POST['TIPOPAPELSEGURANCA'];
					$NUMEROPAPEL = $_POST['NUMEROPAPELSEGURANCA'];	
					$funcionario = $_SESSION['nome'];
					$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','REG. EMANCIPACAO','2','1','$SELO',CURRENT_TIMESTAMP,'GRA','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
					
					$up = $pdo->prepare("UPDATE selo_fisico_uso set status = 'U'  where selo ='$SELO' and tipo = 'GRA'");
					

					UPDATE_CAMPO_ID('registro_emancipacao_novo','RETORNOSELODIGITAL',strip_tags($RETORNO),$id);
					$insert_auditoria->execute();
					$up->execute();
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
					UPDATE_CAMPO_ID('registro_emancipacao_novo','ATOESPECIAL',$_POST['ATOESPECIAL'],$id);
					}	
					if (isset($_POST['AVERBACAOTERMOANTIGO'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','AVERBACAOTERMOANTIGO',$_POST['AVERBACAOTERMOANTIGO'],$id);
					}
					UPDATE_CAMPO_ID('registro_emancipacao_novo','LIVROESPECIAL',mb_strtoupper($_POST['LIVROESPECIAL']),$id);
					UPDATE_CAMPO_ID('registro_emancipacao_novo','FOLHAESPECIAL',mb_strtoupper($_POST['FOLHAESPECIAL']),$id);
					UPDATE_CAMPO_ID('registro_emancipacao_novo','TERMOESPECIAL',mb_strtoupper($_POST['TERMOESPECIAL']),$id);
					UPDATE_CAMPO_ID('registro_emancipacao_novo','MATRICULA',mb_strtoupper($_POST['MATRICULA']),$id);
					UPDATE_CAMPO_ID('registro_emancipacao_novo','SELO',mb_strtoupper($_POST['SELO2']),$id);
					UPDATE_CAMPO_ID('registro_emancipacao_novo','DATAENTRADA',$_POST['DATAENTRADA'],$id);
					
					if (isset($_POST['TIPOPAPELSEGURANCA'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','TIPOPAPELSEGURANCA',$_POST['TIPOPAPELSEGURANCA'],$id);
					}
					if (isset($_POST['NUMEROPAPELSEGURANCA'])) {
					UPDATE_CAMPO_ID('registro_emancipacao_novo','NUMEROPAPELSEGURANCA',$_POST['NUMEROPAPELSEGURANCA'],$id);
					}
					if (isset($_POST['TIPOPAPELSEGURANCA']) && isset($_POST['NUMEROPAPELSEGURANCA'])) {
					$EMPRESA = $_POST['TIPOPAPELSEGURANCA'];
					$PAPEL = $_POST['NUMEROPAPELSEGURANCA'];
					$UPSEGURANCA = $pdo->prepare("UPDATE folhaseguranca set STATUS = 'U' WHERE EMPRESA = '$EMPRESA' AND PAPEL = '$PAPEL'");
					$UPSEGURANCA->execute();
					}	


if (isset($SELO)) {
	die(strip_tags($SELO));
}

}

 ?>
