<?php
include('../../controller/db_functions.php');
$pdo = conectar();
session_start();
$id = $_GET['id'];

#SUBMIT1 =====================================================================================================================
	if (isset($_POST['subimit1'])) {
		unset($_POST['subimit1']);


			UPDATE_CAMPO_ID('registro_interdicao_novo','JUIZ',mb_strtoupper($_POST['JUIZ']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','VARA',mb_strtoupper($_POST['VARA']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','DATASENTENCA',$_POST['DATASENTENCA'],$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','NOMECURADOR',mb_strtoupper($_POST['NOMECURADOR']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','CPFCURADOR',mb_strtoupper($_POST['CPFCURADOR']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','ESTADOCIVILCURADOR',mb_strtoupper($_POST['ESTADOCIVILCURADOR']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','PROFISSAOCURADOR',mb_strtoupper($_POST['PROFISSAOCURADOR']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','ENDERECOCURADOR',mb_strtoupper($_POST['ENDERECOCURADOR']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','BAIRROCURADOR',mb_strtoupper($_POST['BAIRROCURADOR']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','CIDADECURADOR',mb_strtoupper($_POST['CIDADECURADOR']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','ROGOCURADOR',mb_strtoupper($_POST['ROGOCURADOR']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','NOMEREQUERENTE',mb_strtoupper($_POST['NOMEREQUERENTE']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','CAUSAINTERDICAO',mb_strtoupper($_POST['CAUSAINTERDICAO']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','TIPOINTERDICAO',mb_strtoupper($_POST['TIPOINTERDICAO']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','LIMITESCURADORIA',mb_strtoupper($_POST['LIMITESCURADORIA']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','LUGARINTERNACAO',mb_strtoupper($_POST['LUGARINTERNACAO']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','CARTORIOESCRITURA',mb_strtoupper($_POST['CARTORIOESCRITURA']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','LIVROESCRITURA',mb_strtoupper($_POST['LIVROESCRITURA']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','FOLHAESCRITURA',mb_strtoupper($_POST['FOLHAESCRITURA']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','REGISTROESCRITURA',mb_strtoupper($_POST['REGISTROESCRITURA']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','MANDADOJUDICIAL',mb_strtoupper($_POST['MANDADOJUDICIAL']),$id);
			UPDATE_CAMPO_ID('registro_interdicao_novo','NUMEROPROCESSO',mb_strtoupper($_POST['NUMEROPROCESSO']),$id);
			
				header('Location: ' . $_SERVER['HTTP_REFERER']);												

	}
#SUBMIT2 =====================================================================================================================
	if (isset($_POST['subimit2'])) {
		unset($_POST['subimit2']);	

		 	 
				if (isset($_POST['NOME'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','NOME',mb_strtoupper($_POST['NOME']),$id);
				}
				if (isset($_POST['CPF'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','CPF',mb_strtoupper($_POST['CPF']),$id);
				}
				if (isset($_POST['NATURALIDADE'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','NATURALIDADE',mb_strtoupper($_POST['NATURALIDADE']),$id);
				}
				if (isset($_POST['DATANASCIMENTO'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','DATANASCIMENTO',mb_strtoupper($_POST['DATANASCIMENTO']),$id);
				}
				if (isset($_POST['ESTADOCIVIL'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','ESTADOCIVIL',mb_strtoupper($_POST['ESTADOCIVIL']),$id);
				}
				if (isset($_POST['NOMECONJUGE'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','NOMECONJUGE',mb_strtoupper($_POST['NOMECONJUGE']),$id);
				}
				if (isset($_POST['CARTORIOCASAMENTO'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','CARTORIOCASAMENTO',mb_strtoupper($_POST['CARTORIOCASAMENTO']),$id);
				}
				if (isset($_POST['PROFISSAO'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','PROFISSAO',mb_strtoupper($_POST['PROFISSAO']),$id);
				}
				if (isset($_POST['ENDERECO'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','ENDERECO',mb_strtoupper($_POST['ENDERECO']),$id);
				}
				if (isset($_POST['BAIRRO'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','BAIRRO',mb_strtoupper($_POST['BAIRRO']),$id);
				}
				if (isset($_POST['CIDADE'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','CIDADE',mb_strtoupper($_POST['CIDADE']),$id);
				}
				if (isset($_POST['CARTORIOREGISTRO'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','CARTORIOREGISTRO',mb_strtoupper($_POST['CARTORIOREGISTRO']),$id);
				}
				if (isset($_POST['LIVROREGISTRONASCIMENTO'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','LIVROREGISTRONASCIMENTO',mb_strtoupper($_POST['LIVROREGISTRONASCIMENTO']),$id);
				}
				if (isset($_POST['FOLHAREGISTRONASCIMENTO'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','FOLHAREGISTRONASCIMENTO',mb_strtoupper($_POST['FOLHAREGISTRONASCIMENTO']),$id);
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
            

			$pesquisanomeparte = PESQUISA_ALL_ID('registro_interdicao_novo',$id);
			foreach ($pesquisanomeparte as $p) {
			$nomeparte = $p->NOME;
			$pai = $p->NOME;
			$mae = $p->NOME;
			$docpai = $p->CPF;
			$docmae = $p->CPF;
			$numero = $p->REGISTROESCRITURA;
			$mandado = $p->MANDADOJUDICIAL;
			$processo = $p->NUMEROPROCESSO;
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
            				if (isset($_POST['motivoisento']) && $_POST['motivoisento']!='') {

                            $ConteudoPOST = '{
                            "codigoTipoAtoCertidao":"14.5.1",
                            "codigoTipoAtoRegistro":"'.$ato_praticado.'",
                            "numeroProcesso":"'.$processo.'",
                            "mandadoJudicial":"'.$mandado.'",
                            "escrevente":"'.$escrevente.'",
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
                            "isento":"true",
                            "motivoIsentoGratuito":"'.$motivo_isento.'", 	
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

                        }

                        else{
                        	 $ConteudoPOST = '{
                            "codigoTipoAtoCertidao":"14.5.1",
                            "codigoTipoAtoRegistro":"'.$ato_praticado.'",
                            "numeroProcesso":"'.$processo.'",
                            "mandadoJudicial":"'.$mandado.'",
                            "escrevente":"'.$escrevente.'",
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

                        }
        
                    $ConteudoCabecalho = [
                        'Authorization: Bearer'.$token,
                        "Content-Type: application/json"
                        
                    ];
                    
                 

                    $handler = curl_init($_SESSION['urlselodigital'].'civil/interdicao');

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
					$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','REG. ITERDICAO','2','1','$SELO',CURRENT_TIMESTAMP,'GRA','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
					
					$up = $pdo->prepare("UPDATE selo_fisico_uso set status = 'U'  where selo ='$SELO' and tipo = 'GRA'");
					

					UPDATE_CAMPO_ID('registro_interdicao_novo','RETORNOSELODIGITAL',strip_tags($RETORNO),$id);
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
					UPDATE_CAMPO_ID('registro_interdicao_novo','ATOESPECIAL',$_POST['ATOESPECIAL'],$id);
					}	
					if (isset($_POST['AVERBACAOTERMOANTIGO'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','AVERBACAOTERMOANTIGO',$_POST['AVERBACAOTERMOANTIGO'],$id);
					}
					UPDATE_CAMPO_ID('registro_interdicao_novo','LIVROESPECIAL',mb_strtoupper($_POST['LIVROESPECIAL']),$id);
					UPDATE_CAMPO_ID('registro_interdicao_novo','FOLHAESPECIAL',mb_strtoupper($_POST['FOLHAESPECIAL']),$id);
					UPDATE_CAMPO_ID('registro_interdicao_novo','TERMOESPECIAL',mb_strtoupper($_POST['TERMOESPECIAL']),$id);
					UPDATE_CAMPO_ID('registro_interdicao_novo','MATRICULA',mb_strtoupper($_POST['MATRICULA']),$id);
					UPDATE_CAMPO_ID('registro_interdicao_novo','SELO',mb_strtoupper($_POST['SELO2']),$id);
					UPDATE_CAMPO_ID('registro_interdicao_novo','DATAENTRADA',$_POST['DATAENTRADA'],$id);
					
					if (isset($_POST['TIPOPAPELSEGURANCA'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','TIPOPAPELSEGURANCA',$_POST['TIPOPAPELSEGURANCA'],$id);
					}
					if (isset($_POST['NUMEROPAPELSEGURANCA'])) {
					UPDATE_CAMPO_ID('registro_interdicao_novo','NUMEROPAPELSEGURANCA',$_POST['NUMEROPAPELSEGURANCA'],$id);
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