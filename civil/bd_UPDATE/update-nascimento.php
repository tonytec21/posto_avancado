<?php
include('../controller/db_functions.php');
$pdo = conectar();
session_start();
$id = $_GET['id'];

#SUBMIT1 =====================================================================================================================
	if (isset($_POST['subimit1'])) {
		unset($_POST['subimit1']);
				
			
			UPDATE_CAMPO_ID('registro_nascimento_novo','NOMENASCIDO',addslashes($_POST['NOMENASCIDO']),$id);		
			UPDATE_CAMPO_ID('registro_nascimento_novo','CPFNASCIDO',$_POST['CPFNASCIDO'],$id);		
			UPDATE_CAMPO_ID('registro_nascimento_novo','NATURALIDADENASCIDO',$_POST['NATURALIDADENASCIDO'],$id);		
			UPDATE_CAMPO_ID('registro_nascimento_novo','SEXONASCIDO',$_POST['SEXONASCIDO'],$id);	
			UPDATE_CAMPO_ID('registro_nascimento_novo','GEMEOS',$_POST['GEMEOS'],$id);
			if ($_POST['NOMEMATRICULAGEMEOS']!='') {
			UPDATE_CAMPO_ID('registro_nascimento_novo','NOMEMATRICULAGEMEOS',$_POST['NOMEMATRICULAGEMEOS'],$id);
						}
			UPDATE_CAMPO_ID('registro_nascimento_novo','QUALIDADEDECLARANTE',$_POST['QUALIDADEDECLARANTE'],$id);
			if ($_POST['NOMEDECLARANTE']) {
			UPDATE_CAMPO_ID('registro_nascimento_novo','NOMEDECLARANTE',mb_strtoupper($_POST['NOMEDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','CPFDECLARANTE',mb_strtoupper($_POST['CPFDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','RGDECLARANTE',mb_strtoupper($_POST['RGDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','ORGAOEMISSORDECLARANTE',mb_strtoupper($_POST['ORGAOEMISSORDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','NACIONALIDADEDECLARANTE',mb_strtoupper($_POST['NACIONALIDADEDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','NATURALIDADEDECLARANTE',mb_strtoupper($_POST['NATURALIDADEDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','DATANASCIMENTODECLARANTE',mb_strtoupper($_POST['DATANASCIMENTODECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','SEXODECLARANTE',mb_strtoupper($_POST['SEXODECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','ESTADOCIVILDECLARANTE',mb_strtoupper($_POST['ESTADOCIVILDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','PROFISSAODECLARANTE',mb_strtoupper($_POST['PROFISSAODECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','ENDERECODECLARANTE',mb_strtoupper($_POST['ENDERECODECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','BAIRRODECLARANTE',mb_strtoupper($_POST['BAIRRODECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','CIDADEDECLARANTE',mb_strtoupper($_POST['CIDADEDECLARANTE']),$id);
			if ($_POST['ROGODECLARANTE']!='') {
			UPDATE_CAMPO_ID('registro_nascimento_novo','ROGODECLARANTE',mb_strtoupper($_POST['ROGODECLARANTE']),$id);
			}			
			}
			if ($_POST['TIPOASSENTO'] == 'ORDEM') {
			UPDATE_CAMPO_ID('registro_nascimento_novo','JUIZMANDATO',mb_strtoupper($_POST['JUIZMANDATO']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','VARAMANDATO',mb_strtoupper($_POST['VARAMANDATO']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','DATAEXPEDICAOMANDATO',mb_strtoupper($_POST['DATAEXPEDICAOMANDATO']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','NUMEROMANDATO',mb_strtoupper($_POST['NUMEROMANDATO']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','DATASENTENCAMANDATO',mb_strtoupper($_POST['DATASENTENCAMANDATO']),$id);

						}
			UPDATE_CAMPO_ID('registro_nascimento_novo','DATANASCIMENTO',mb_strtoupper($_POST['DATANASCIMENTO']),$id);	
			UPDATE_CAMPO_ID('registro_nascimento_novo','HORANASCIMENTO',mb_strtoupper($_POST['HORANASCIMENTO']),$id);			
			UPDATE_CAMPO_ID('registro_nascimento_novo','TIPOLOCALNASCIMENTO',mb_strtoupper($_POST['TIPOLOCALNASCIMENTO']),$id);	
			UPDATE_CAMPO_ID('registro_nascimento_novo','LOCALNASCIMENTO',mb_strtoupper($_POST['LOCALNASCIMENTO']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','ENDERECOLOCALNASCIMENTO',mb_strtoupper($_POST['ENDERECOLOCALNASCIMENTO']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','CIDADENASCIMENTO',mb_strtoupper($_POST['CIDADENASCIMENTO']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','DNV',mb_strtoupper($_POST['DNV']),$id);
			if ($_POST['RANI']!='') {
			UPDATE_CAMPO_ID('registro_nascimento_novo','RANI',mb_strtoupper($_POST['RANI']),$id);
									}
			UPDATE_CAMPO_ID('registro_nascimento_novo','MEDICO',mb_strtoupper($_POST['MEDICO']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','CRM',mb_strtoupper($_POST['CRM']),$id);
			UPDATE_CAMPO_ID('registro_nascimento_novo','TIPOASSENTO',$_POST['TIPOASSENTO'],$id);	
				header('Location: ' . $_SERVER['HTTP_REFERER']);												

	}
#SUBMIT2 =====================================================================================================================
	if (isset($_POST['subimit2'])) {
		unset($_POST['subimit2']);	
			#var_dump($_POST);
		 	 #DADOSPAI:
					if (isset($_POST['NOMEPAI'])) {
							UPDATE_CAMPO_ID('registro_nascimento_novo','NOMEPAI',addslashes($_POST['NOMEPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','CPFPAI',mb_strtoupper($_POST['CPFPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','RGPAI',mb_strtoupper($_POST['RGPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','ORGAOEMISSORPAI',mb_strtoupper($_POST['ORGAOEMISSORPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','NACIONALIDADEPAI',mb_strtoupper($_POST['NACIONALIDADEPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','NATURALIDADEPAI',mb_strtoupper($_POST['NATURALIDADEPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','DATANASCIMENTOPAI',mb_strtoupper($_POST['DATANASCIMENTOPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','SEXOPAI',mb_strtoupper($_POST['SEXOPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','ESTADOCIVILPAI',mb_strtoupper($_POST['ESTADOCIVILPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','PROFISSAOPAI',mb_strtoupper($_POST['PROFISSAOPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','ENDERECOPAI',addslashes($_POST['ENDERECOPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','BAIRROPAI',mb_strtoupper($_POST['BAIRROPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','CIDADEPAI',mb_strtoupper($_POST['CIDADEPAI']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','AVO1PATERNO',mb_strtoupper($_POST['AVO1PATERNO']),$id);	
							UPDATE_CAMPO_ID('registro_nascimento_novo','AVO2PATERNO',mb_strtoupper($_POST['AVO2PATERNO']),$id);
							if ($_POST['ROGOPAI']!='') {
							UPDATE_CAMPO_ID('registro_nascimento_novo','ROGOPAI',mb_strtoupper($_POST['ROGOPAI']),$id);
							}	
					}		
			 #DADOSMAE:
							UPDATE_CAMPO_ID('registro_nascimento_novo','NOMEMAE',addslashes($_POST['NOMEMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','CPFMAE',mb_strtoupper($_POST['CPFMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','RGMAE',mb_strtoupper($_POST['RGMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','ORGAOEMISSORMAE',mb_strtoupper($_POST['ORGAOEMISSORMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','NACIONALIDADEMAE',mb_strtoupper($_POST['NACIONALIDADEMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','NATURALIDADEMAE',mb_strtoupper($_POST['NATURALIDADEMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','DATANASCIMENTOMAE',mb_strtoupper($_POST['DATANASCIMENTOMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','SEXOMAE',mb_strtoupper($_POST['SEXOMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','ESTADOCIVILMAE',mb_strtoupper($_POST['ESTADOCIVILMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','PROFISSAOMAE',mb_strtoupper($_POST['PROFISSAOMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','ENDERECOMAE',addslashes($_POST['ENDERECOMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','BAIRROMAE',mb_strtoupper($_POST['BAIRROMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','CIDADEMAE',mb_strtoupper($_POST['CIDADEMAE']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','AVO1MATERNO',mb_strtoupper($_POST['AVO1MATERNO']),$id);	
							UPDATE_CAMPO_ID('registro_nascimento_novo','AVO2MATERNO',mb_strtoupper($_POST['AVO2MATERNO']),$id);
							if ($_POST['ROGOMAE']!='') {
							UPDATE_CAMPO_ID('registro_nascimento_novo','ROGOMAE',mb_strtoupper($_POST['ROGOMAE']),$id);
							}
							if (isset($_POST['LUGARCASAMENTO'])) {
							UPDATE_CAMPO_ID('registro_nascimento_novo','LUGARCASAMENTO',mb_strtoupper($_POST['LUGARCASAMENTO']),$id);
							}
							if (isset($_POST['CIDADECASAMENTO'])) {
							UPDATE_CAMPO_ID('registro_nascimento_novo','CIDADECASAMENTO',mb_strtoupper($_POST['CIDADECASAMENTO']),$id);
							}
							if (isset($_POST['CARTORIOCASAMENTO'])) {
							UPDATE_CAMPO_ID('registro_nascimento_novo','CARTORIOCASAMENTO',mb_strtoupper($_POST['CARTORIOCASAMENTO']),$id);
							}
			#DADOSPAISOCIO:
					if (isset($_POST['NOMEPAISOCIO'])) {
							UPDATE_CAMPO_ID('registro_nascimento_novo','NOMEPAISOCIO',mb_strtoupper($_POST['NOMEPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','CPFPAISOCIO',mb_strtoupper($_POST['CPFPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','RGPAISOCIO',mb_strtoupper($_POST['RGPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','ORGAOEMISSORPAISOCIO',mb_strtoupper($_POST['ORGAOEMISSORPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','NACIONALIDADEPAISOCIO',mb_strtoupper($_POST['NACIONALIDADEPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','NATURALIDADEPAISOCIO',mb_strtoupper($_POST['NATURALIDADEPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','DATANASCIMENTOPAISOCIO',mb_strtoupper($_POST['DATANASCIMENTOPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','SEXOPAISOCIO',mb_strtoupper($_POST['SEXOPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','ESTADOCIVILPAISOCIO',mb_strtoupper($_POST['ESTADOCIVILPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','PROFISSAOPAISOCIO',mb_strtoupper($_POST['PROFISSAOPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','ENDERECOPAISOCIO',mb_strtoupper($_POST['ENDERECOPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','BAIRROPAISOCIO',mb_strtoupper($_POST['BAIRROPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','CIDADEPAISOCIO',mb_strtoupper($_POST['CIDADEPAISOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','AVO1PATERNOSOCIO',mb_strtoupper($_POST['AVO1PATERNOSOCIO']),$id);	
							UPDATE_CAMPO_ID('registro_nascimento_novo','AVO2PATERNOSOCIO',mb_strtoupper($_POST['AVO2PATERNOSOCIO']),$id);
							if ($_POST['ROGOPAISOCIO']!='') {
							UPDATE_CAMPO_ID('registro_nascimento_novo','ROGOPAISOCIO',mb_strtoupper($_POST['ROGOPAISOCIO']),$id);
							}	
					}		
			 #DADOSMAESOCIO:
							UPDATE_CAMPO_ID('registro_nascimento_novo','NOMEMAESOCIO',mb_strtoupper($_POST['NOMEMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','CPFMAESOCIO',mb_strtoupper($_POST['CPFMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','RGMAESOCIO',mb_strtoupper($_POST['RGMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','ORGAOEMISSORMAESOCIO',mb_strtoupper($_POST['ORGAOEMISSORMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','NACIONALIDADEMAESOCIO',mb_strtoupper($_POST['NACIONALIDADEMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','NATURALIDADEMAESOCIO',mb_strtoupper($_POST['NATURALIDADEMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','DATANASCIMENTOMAESOCIO',mb_strtoupper($_POST['DATANASCIMENTOMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','SEXOMAESOCIO',mb_strtoupper($_POST['SEXOMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','ESTADOCIVILMAESOCIO',mb_strtoupper($_POST['ESTADOCIVILMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','PROFISSAOMAESOCIO',mb_strtoupper($_POST['PROFISSAOMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','ENDERECOMAESOCIO',mb_strtoupper($_POST['ENDERECOMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','BAIRROMAESOCIO',mb_strtoupper($_POST['BAIRROMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','CIDADEMAESOCIO',mb_strtoupper($_POST['CIDADEMAESOCIO']),$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','AVO1MATERNOSOCIO',mb_strtoupper($_POST['AVO1MATERNOSOCIO']),$id);	
							UPDATE_CAMPO_ID('registro_nascimento_novo','AVO2MATERNOSOCIO',mb_strtoupper($_POST['AVO2MATERNOSOCIO']),$id);
							if ($_POST['ROGOMAESOCIO']!='') {
							UPDATE_CAMPO_ID('registro_nascimento_novo','ROGOMAESOCIO',mb_strtoupper($_POST['ROGOMAE']),$id);
							}


							if (isset($_POST['menorPAI']) && $_POST['menorPAI'] == 'S') {
							UPDATE_CAMPO_ID('registro_nascimento_novo','ROGOPAISOCIO','PAIDEMENOR',$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','NOMEPAISOCIO',mb_strtoupper($_POST['RESPONSAVELPAI']),$id);
							}
							if (isset($_POST['menorMAE']) && $_POST['menorMAE'] == 'S') {
							UPDATE_CAMPO_ID('registro_nascimento_novo','ROGOMAESOCIO','MAEDEMENOR',$id);
							UPDATE_CAMPO_ID('registro_nascimento_novo','NOMEMAESOCIO',mb_strtoupper($_POST['RESPONSAVELMAE']),$id);
							}

							
								header('Location: ' . $_SERVER['HTTP_REFERER']);					

	}
#SUBMIT3 =====================================================================================================================
	if (isset($_POST['subimit3'])) {
		unset($_POST['subimit3']);
			#var_dump($_POST);
		#DADOSTESTEMUNHA1:
			if (isset($_POST['NOMETESTEMUNHA1'])) {
								UPDATE_CAMPO_ID('registro_nascimento_novo','NOMETESTEMUNHA1',mb_strtoupper($_POST['NOMETESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','CPFTESTEMUNHA1',mb_strtoupper($_POST['CPFTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','RGTESTEMUNHA1',mb_strtoupper($_POST['RGTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','ORGAOEMISSORTESTEMUNHA1',mb_strtoupper($_POST['ORGAOEMISSORTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','NACIONALIDADETESTEMUNHA1',mb_strtoupper($_POST['NACIONALIDADETESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','NATURALIDADETESTEMUNHA1',mb_strtoupper($_POST['NATURALIDADETESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','DATANASCIMENTOTESTEMUNHA1',mb_strtoupper($_POST['DATANASCIMENTOTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','SEXOTESTEMUNHA1',mb_strtoupper($_POST['SEXOTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','ESTADOCIVILTESTEMUNHA1',mb_strtoupper($_POST['ESTADOCIVILTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','PROFISSAOTESTEMUNHA1',mb_strtoupper($_POST['PROFISSAOTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','ENDERECOTESTEMUNHA1',mb_strtoupper($_POST['ENDERECOTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','BAIRROTESTEMUNHA1',mb_strtoupper($_POST['BAIRROTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','CIDADETESTEMUNHA1',mb_strtoupper($_POST['CIDADETESTEMUNHA1']),$id);
				}				
		#DADOSTESTEMUNHA2:
			if (isset($_POST['NOMETESTEMUNHA2'])) {
								UPDATE_CAMPO_ID('registro_nascimento_novo','NOMETESTEMUNHA2',mb_strtoupper($_POST['NOMETESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','CPFTESTEMUNHA2',mb_strtoupper($_POST['CPFTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','RGTESTEMUNHA2',mb_strtoupper($_POST['RGTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','ORGAOEMISSORTESTEMUNHA2',mb_strtoupper($_POST['ORGAOEMISSORTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','NACIONALIDADETESTEMUNHA2',mb_strtoupper($_POST['NACIONALIDADETESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','NATURALIDADETESTEMUNHA2',mb_strtoupper($_POST['NATURALIDADETESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','DATANASCIMENTOTESTEMUNHA2',mb_strtoupper($_POST['DATANASCIMENTOTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','SEXOTESTEMUNHA2',mb_strtoupper($_POST['SEXOTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','ESTADOCIVILTESTEMUNHA2',mb_strtoupper($_POST['ESTADOCIVILTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','PROFISSAOTESTEMUNHA2',mb_strtoupper($_POST['PROFISSAOTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','ENDERECOTESTEMUNHA2',mb_strtoupper($_POST['ENDERECOTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','BAIRROTESTEMUNHA2',mb_strtoupper($_POST['BAIRROTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_nascimento_novo','CIDADETESTEMUNHA2',mb_strtoupper($_POST['CIDADETESTEMUNHA2']),$id);	
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
			$LIVRO = $_POST['LIVRONASCIMENTO'];
			$FOLHA = $_POST['FOLHANASCIMENTO'];
			$TERMO = intval($_POST['TERMONASCIMENTO']);
			$ATO = $_POST['ATONASCIMENTO'];
			$TIPOPAPEL = $_POST['TIPOPAPELSEGURANCA'];
			$NUMEROPAPEL = $_POST['NUMEROPAPELSEGURANCA'];

			$pesq_livre = $pdo->prepare("SELECT * FROM livro_nascimentos where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA' and LivroInicial = '$TERMO'");
			$pesq_livre->execute();
			$pl = $pesq_livre->fetch(PDO::FETCH_ASSOC);
			if ($pl['Status'] == 'U') {
			$_SESSION['erro'] = 'OPS! ALGUÉM PODE TER USADO ESSA PÁGINA ENQUANTO VOCÊ DIGITAVA, TENTE NOVAMENTE COM OUTRA PÁGINA';
			die($_SESSION['erro']);
			break;	
			}
			else{
			$up_pagina = $pdo->prepare("UPDATE livro_nascimentos set Status = 'U' where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA'");

			}

		include('../selador/civil_geral.php');
		if ($token =='' || empty($token)) {
                    	die('NENHUM DADO RECEBIDO TENTE NOVAMENTE');
                    	break;
                    }


		if ($token !='') {


#PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
            

			$pesquisanomeparte = PESQUISA_ALL_ID('registro_nascimento_novo',$id);
			foreach ($pesquisanomeparte as $p) {
			$nomeparte = $p->NOMENASCIDO;
			$pai = $p->NOMEPAI;
			$mae = $p->NOMEMAE;
			$docpai = $p->CPFPAI;
			$docmae = $p->CPFMAE;
			}

            $ato_praticado = $_POST['ATONASCIMENTO'];
            $escrevente = $_SESSION['nome'];
            $isento = 'true';
            $motivo_isento='Teste';
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


            if (isset($_POST['MOTIVOISENTO']) && $_POST['MOTIVOISENTO']!='') {
										$isento = 'true';
										$motivo_isento=$_POST['MOTIVOISENTO'];
							$ConteudoPOST = '{
                            "codigoTipoAtoRegistro":"'.$ato_praticado.'",
                            "escrevente":"'.$escrevente.'",
                            "nomeParte":"'.$nomeparte.'",
                            "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
                            "nomesPartes": {
                            "nomesPartes":"X",
                            "parteAto":[
                            {
                            "documento":"'.$docparte1.'",
                            "nome":"'.$nomeparte1.'"
                            }
                            ]},

                            "dadosSelo":{
                            "isento":"true",
							"motivoIsentoGratuito":"'.$motivo_isento.'",		
                            "escrevente":"'.$escrevente.'",
                            "folha": "'.$FOLHA.'",
                            "livro": "A'.$LIVRO.'",
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
                            "codigoTipoAtoRegistro":"'.$ato_praticado.'",
                            "escrevente":"'.$escrevente.'",
                            "nomeParte":"'.$nomeparte.'",
                            "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
                            "nomesPartes": {
                            "nomesPartes":"X",
                            "parteAto":[
                            {
                            "documento":"'.$docparte1.'",
                            "nome":"'.$nomeparte1.'"
                            }
                            ]},

                            "dadosSelo":{
                            "escrevente":"'.$escrevente.'",
                            "folha": "'.$FOLHA.'",
                            "livro": "A'.$LIVRO.'",
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
                    
                 

                    $handler = curl_init($_SESSION['urlselodigital'].'civil/nascimento');

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
					$LIVRO = $_POST['LIVRONASCIMENTO'];
					$FOLHA = $_POST['FOLHANASCIMENTO'];
					$TERMO = intval($_POST['TERMONASCIMENTO']);
					$ATO = $_POST['ATONASCIMENTO'];
					$TIPOPAPEL = $_POST['TIPOPAPELSEGURANCA'];
					$NUMEROPAPEL = $_POST['NUMEROPAPELSEGURANCA'];	
					$funcionario = $_SESSION['nome'];
					$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','REG. NASCIMENTO','2','1','$SELO',CURRENT_TIMESTAMP,'GRA','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
					
					$up = $pdo->prepare("UPDATE selo_fisico_uso set status = 'U'  where selo ='$SELO' and tipo = 'GRA'");
					

					UPDATE_CAMPO_ID('registro_nascimento_novo','RETORNOSELODIGITAL',strip_tags($RETORNO),$id);
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

					if (isset($_POST['ATONASCIMENTO'])) {
					UPDATE_CAMPO_ID('registro_nascimento_novo','ATONASCIMENTO',$_POST['ATONASCIMENTO'],$id);
					}	
					if (isset($_POST['AVERBACAOTERMOANTIGO'])) {
					UPDATE_CAMPO_ID('registro_nascimento_novo','AVERBACAOTERMOANTIGO',$_POST['AVERBACAOTERMOANTIGO'],$id);
					}
					UPDATE_CAMPO_ID('registro_nascimento_novo','LIVRONASCIMENTO',mb_strtoupper($_POST['LIVRONASCIMENTO']),$id);
					UPDATE_CAMPO_ID('registro_nascimento_novo','FOLHANASCIMENTO',mb_strtoupper($_POST['FOLHANASCIMENTO']),$id);
					UPDATE_CAMPO_ID('registro_nascimento_novo','TERMONASCIMENTO',mb_strtoupper($_POST['TERMONASCIMENTO']),$id);
					UPDATE_CAMPO_ID('registro_nascimento_novo','MATRICULA',mb_strtoupper($_POST['MATRICULA']),$id);
					UPDATE_CAMPO_ID('registro_nascimento_novo','SELO',mb_strtoupper($_POST['SELO2']),$id);
					UPDATE_CAMPO_ID('registro_nascimento_novo','DATAENTRADA',$_POST['DATAENTRADA'],$id);
					
					if (isset($_POST['TIPOPAPELSEGURANCA'])) {
					UPDATE_CAMPO_ID('registro_nascimento_novo','TIPOPAPELSEGURANCA',$_POST['TIPOPAPELSEGURANCA'],$id);
					}
					if (isset($_POST['NUMEROPAPELSEGURANCA'])) {
					UPDATE_CAMPO_ID('registro_nascimento_novo','NUMEROPAPELSEGURANCA',$_POST['NUMEROPAPELSEGURANCA'],$id);
					}
					if (isset($_POST['TIPOPAPELSEGURANCA']) && isset($_POST['NUMEROPAPELSEGURANCA'])) {
					$EMPRESA = $_POST['TIPOPAPELSEGURANCA'];
					$PAPEL = $_POST['NUMEROPAPELSEGURANCA'];
					$UPSEGURANCA = $pdo->prepare("UPDATE folhaseguranca set STATUS = 'U' WHERE EMPRESA = '$EMPRESA' AND PAPEL = '$PAPEL'");
					$UPSEGURANCA->execute();
					}	


					if (isset($SELO)) {
					die('<a class="btn waves-effect bg-blue" href="pesquisa-nascimento.php?id='.$id.'">IR PARA PESQUISA</a><br>'.
					strip_tags($SELO));
					}
					else{
					die('<a class="btn waves-effect bg-blue" href="pesquisa-nascimento.php?id='.$id.'">IR PARA PESQUISA</a>');
					}

	
}

 ?>
