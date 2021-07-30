<?php 
include('../controller/db_functions.php'); 
session_start();
$id = $_GET['id'];
$pdo=conectar();

#SUBIMIT1 ==============================================================================================================================================
		if (isset($_POST['subimit1'])) {
			unset($_POST['subimit1']);
			
			UPDATE_CAMPO_ID('registro_obito_novo','TIPOASSENTO',$_POST['TIPOASSENTO'],$id);	
			
			
			UPDATE_CAMPO_ID('registro_obito_novo','NDO',$_POST['NDO'],$id);
			UPDATE_CAMPO_ID('registro_obito_novo','QUALIDADEDECLARANTE',$_POST['QUALIDADEDECLARANTE'],$id);
			if ($_POST['NOMEDECLARANTE']!='') {
			UPDATE_CAMPO_ID('registro_obito_novo','NOMEDECLARANTE',mb_strtoupper($_POST['NOMEDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','CPFDECLARANTE',mb_strtoupper($_POST['CPFDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','RGDECLARANTE',mb_strtoupper($_POST['RGDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ORGAOEMISSORDECLARANTE',mb_strtoupper($_POST['ORGAOEMISSORDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','NACIONALIDADEDECLARANTE',mb_strtoupper($_POST['NACIONALIDADEDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','NATURALIDADEDECLARANTE',mb_strtoupper($_POST['NATURALIDADEDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','DATANASCIMENTODECLARANTE',mb_strtoupper($_POST['DATANASCIMENTODECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','SEXODECLARANTE',mb_strtoupper($_POST['SEXODECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ESTADOCIVILDECLARANTE',mb_strtoupper($_POST['ESTADOCIVILDECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','PROFISSAODECLARANTE',mb_strtoupper($_POST['PROFISSAODECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ENDERECODECLARANTE',mb_strtoupper($_POST['ENDERECODECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','BAIRRODECLARANTE',mb_strtoupper($_POST['BAIRRODECLARANTE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','CIDADEDECLARANTE',mb_strtoupper($_POST['CIDADEDECLARANTE']),$id);
			if ($_POST['ROGODECLARANTE']!='') {
			UPDATE_CAMPO_ID('registro_obito_novo','ROGODECLARANTE',mb_strtoupper($_POST['ROGODECLARANTE']),$id);
			}			
						}
			if ($_POST['TIPOASSENTO'] == 'ORDEM') {
			UPDATE_CAMPO_ID('registro_obito_novo','JUIZMANDATO',mb_strtoupper($_POST['JUIZMANDATO']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','VARAMANDATO',mb_strtoupper($_POST['VARAMANDATO']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','DATAEXPEDICAOMANDATO',mb_strtoupper($_POST['DATAEXPEDICAOMANDATO']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','NUMEROMANDATO',mb_strtoupper($_POST['NUMEROMANDATO']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','DATASENTENCAMANDATO',mb_strtoupper($_POST['DATASENTENCAMANDATO']),$id);

						}
			UPDATE_CAMPO_ID('registro_obito_novo','LOCALMORTE',$_POST['LOCALMORTE'],$id);	
			UPDATE_CAMPO_ID('registro_obito_novo','ENDERECOOBITO',$_POST['ENDERECOOBITO'],$id);	
			UPDATE_CAMPO_ID('registro_obito_novo','TIPOLOCALOBITO',$_POST['TIPOLOCALOBITO'],$id);	
			UPDATE_CAMPO_ID('registro_obito_novo','CIDADEOBITO',$_POST['CIDADEOBITO'],$id);	
			UPDATE_CAMPO_ID('registro_obito_novo','DATAOBITO',$_POST['DATAOBITO'],$id);	
			UPDATE_CAMPO_ID('registro_obito_novo','HORAOBITO',$_POST['HORAOBITO'],$id);
			UPDATE_CAMPO_ID('registro_obito_novo','CAUSAOBITO',$_POST['CAUSAOBITO'],$id);
			UPDATE_CAMPO_ID('registro_obito_novo','CAUSAOBITOB',$_POST['CAUSAOBITOB'],$id);
			UPDATE_CAMPO_ID('registro_obito_novo','CAUSAOBITOC',$_POST['CAUSAOBITOC'],$id);
			UPDATE_CAMPO_ID('registro_obito_novo','CAUSAOBITOD',$_POST['CAUSAOBITOD'],$id);	
			UPDATE_CAMPO_ID('registro_obito_novo','TIPOMORTE',$_POST['TIPOMORTE'],$id);	
			UPDATE_CAMPO_ID('registro_obito_novo','LOCALSEPULTAMENTO',$_POST['LOCALSEPULTAMENTO'],$id);	
			UPDATE_CAMPO_ID('registro_obito_novo','MEDICO',$_POST['MEDICO'],$id);	
			UPDATE_CAMPO_ID('registro_obito_novo','CRM',$_POST['CRM'],$id);

			if (isset($_POST['UFCRM']) && !empty($_POST['UFCRM'])) {
			$crm = $_POST['CRM'].'/'.mb_strtoupper($_POST['UFCRM']);
			UPDATE_CAMPO_ID('registro_obito_novo','CRM',$crm,$id);
			}


						header('Location: ' . $_SERVER['HTTP_REFERER']);				
		}
#SUBIMIT2 ==============================================================================================================================================
		if (isset($_POST['subimit2'])) {
			unset($_POST['subimit2']);
			#var_dump($_POST);
		#DADOS FALECIDO:	
			UPDATE_CAMPO_ID('registro_obito_novo','NOME',mb_strtoupper($_POST['NOME']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','CPF',mb_strtoupper($_POST['CPF']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','RG',mb_strtoupper($_POST['RG']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ORGAOEMISSOR',mb_strtoupper($_POST['ORGAOEMISSOR']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','NACIONALIDADE',mb_strtoupper($_POST['NACIONALIDADE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','NATURALIDADE',mb_strtoupper($_POST['NATURALIDADE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','DATANASCIMENTO',mb_strtoupper($_POST['DATANASCIMENTO']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','SEXO',mb_strtoupper($_POST['SEXO']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ESTADOCIVIL',mb_strtoupper($_POST['ESTADOCIVIL']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','PROFISSAO',mb_strtoupper($_POST['PROFISSAO']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ENDERECO',mb_strtoupper($_POST['ENDERECO']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','BAIRRO',mb_strtoupper($_POST['BAIRRO']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','CIDADE',mb_strtoupper($_POST['CIDADE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','COR',mb_strtoupper($_POST['COR']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','GEMEO',mb_strtoupper($_POST['GEMEO']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','DEIXOUFILHOS',mb_strtoupper($_POST['DEIXOUFILHOS']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ELEITOR',mb_strtoupper($_POST['ELEITOR']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','DEIXOUBENS',mb_strtoupper($_POST['DEIXOUBENS']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','TEMPOINTRAUTERINA',mb_strtoupper($_POST['TEMPOINTRAUTERINA']),$id);
			if (isset($_POST['NOMEFILHOS'])) {
			UPDATE_CAMPO_ID('registro_obito_novo','NOMEFILHOS',mb_strtoupper($_POST['NOMEFILHOS']),$id);
			}
			if (isset($_POST['NOMECONJUGE'])) {
			UPDATE_CAMPO_ID('registro_obito_novo','NOMECONJUGE',mb_strtoupper($_POST['NOMECONJUGE']),$id);
			}
			if (isset($_POST['CARTORIOCASAMENTO'])) {
			UPDATE_CAMPO_ID('registro_obito_novo','CARTORIOCASAMENTO',mb_strtoupper($_POST['CARTORIOCASAMENTO']),$id);
			}
			
			if (isset($_POST['NOMEPAI'])) {
			UPDATE_CAMPO_ID('registro_obito_novo','NOMEPAI',mb_strtoupper($_POST['NOMEPAI']),$id);
			}
			if (isset($_POST['NOMEMAE'])) {
			UPDATE_CAMPO_ID('registro_obito_novo','NOMEMAE',mb_strtoupper($_POST['NOMEMAE']),$id);
			}
				
			if ( isset($_POST['CPFPAI'])  ) {
			UPDATE_CAMPO_ID('registro_obito_novo','CPFPAI',mb_strtoupper($_POST['CPFPAI']),$id);
			}
			if ( isset($_POST['CPFMAE'])  ) {
			UPDATE_CAMPO_ID('registro_obito_novo','CPFMAE',mb_strtoupper($_POST['CPFMAE']),$id);
			}


			if ( isset($_POST['SEXOPAI'])) {
			UPDATE_CAMPO_ID('registro_obito_novo','SEXOPAI',mb_strtoupper($_POST['SEXOPAI']),$id);
			}

			if (isset( $_POST['SEXOMAE'])) {
			UPDATE_CAMPO_ID('registro_obito_novo','SEXOMAE',mb_strtoupper($_POST['SEXOMAE']),$id);
			}

			if ( isset($_POST['DATANASCIMENTOPAI']) ) {
			UPDATE_CAMPO_ID('registro_obito_novo','DATANASCIMENTOPAI',mb_strtoupper($_POST['DATANASCIMENTOPAI']),$id);
			}

			if (isset($_POST['DATANASCIMENTOMAE'])) {
			UPDATE_CAMPO_ID('registro_obito_novo','DATANASCIMENTOMAE',mb_strtoupper($_POST['DATANASCIMENTOMAE']),$id);
			}

			
						if ( isset($_POST['RGPAI'])) {
			
			
			UPDATE_CAMPO_ID('registro_obito_novo','RGPAI',mb_strtoupper($_POST['RGPAI']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ORGAOEMISSORPAI',mb_strtoupper($_POST['ORGAOEMISSORPAI']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','NACIONALIDADEPAI',mb_strtoupper($_POST['NACIONALIDADEPAI']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','NATURALIDADEPAI',mb_strtoupper($_POST['NATURALIDADEPAI']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ESTADOCIVILPAI',mb_strtoupper($_POST['ESTADOCIVILPAI']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','PROFISSAOPAI',mb_strtoupper($_POST['PROFISSAOPAI']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ENDERECOPAI',mb_strtoupper($_POST['ENDERECOPAI']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','BAIRROPAI',mb_strtoupper($_POST['BAIRROPAI']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','CIDADEPAI',mb_strtoupper($_POST['CIDADEPAI']),$id);
						}
						if ( isset($_POST['RGMAE'])) {
			
			
			UPDATE_CAMPO_ID('registro_obito_novo','RGMAE',mb_strtoupper($_POST['RGMAE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ORGAOEMISSORMAE',mb_strtoupper($_POST['ORGAOEMISSORMAE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','NACIONALIDADEMAE',mb_strtoupper($_POST['NACIONALIDADEMAE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','NATURALIDADEMAE',mb_strtoupper($_POST['NATURALIDADEMAE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ESTADOCIVILMAE',mb_strtoupper($_POST['ESTADOCIVILMAE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','PROFISSAOMAE',mb_strtoupper($_POST['PROFISSAOMAE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ENDERECOMAE',mb_strtoupper($_POST['ENDERECOMAE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','BAIRROMAE',mb_strtoupper($_POST['BAIRROMAE']),$id);
			UPDATE_CAMPO_ID('registro_obito_novo','CIDADEMAE',mb_strtoupper($_POST['CIDADEMAE']),$id);
						}

			if (isset($_POST['menorMAE']) && $_POST['menorMAE'] == 'S') {
			UPDATE_CAMPO_ID('registro_obito_novo','QUALIDADEDECLARANTE','MAEDEMENOR',$id);
			UPDATE_CAMPO_ID('registro_obito_novo','ROGODECLARANTE',mb_strtoupper($_POST['RESPONSAVELMAE']),$id);
			}

			UPDATE_CAMPO_ID('registro_obito_novo','strTituloEleitor',$_POST['strTituloEleitor'],$id);			

						header('Location: ' . $_SERVER['HTTP_REFERER']);		
		}
#SUBIMIT3 ==============================================================================================================================================
		if (isset($_POST['subimit3'])) {
			unset($_POST['subimit3']);
			#var_dump($_POST);
				#DADOSTESTEMUNHA1:
			if (isset($_POST['NOMETESTEMUNHA1'])) {
								UPDATE_CAMPO_ID('registro_obito_novo','NOMETESTEMUNHA1',mb_strtoupper($_POST['NOMETESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','CPFTESTEMUNHA1',mb_strtoupper($_POST['CPFTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','RGTESTEMUNHA1',mb_strtoupper($_POST['RGTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','ORGAOEMISSORTESTEMUNHA1',mb_strtoupper($_POST['ORGAOEMISSORTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','NACIONALIDADETESTEMUNHA1',mb_strtoupper($_POST['NACIONALIDADETESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','NATURALIDADETESTEMUNHA1',mb_strtoupper($_POST['NATURALIDADETESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','DATANASCIMENTOTESTEMUNHA1',mb_strtoupper($_POST['DATANASCIMENTOTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','SEXOTESTEMUNHA1',mb_strtoupper($_POST['SEXOTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','ESTADOCIVILTESTEMUNHA1',mb_strtoupper($_POST['ESTADOCIVILTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','PROFISSAOTESTEMUNHA1',mb_strtoupper($_POST['PROFISSAOTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','ENDERECOTESTEMUNHA1',mb_strtoupper($_POST['ENDERECOTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','BAIRROTESTEMUNHA1',mb_strtoupper($_POST['BAIRROTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','CIDADETESTEMUNHA1',mb_strtoupper($_POST['CIDADETESTEMUNHA1']),$id);
				}				
		#DADOSTESTEMUNHA2:
			if (isset($_POST['NOMETESTEMUNHA2'])) {
								UPDATE_CAMPO_ID('registro_obito_novo','NOMETESTEMUNHA2',mb_strtoupper($_POST['NOMETESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','CPFTESTEMUNHA2',mb_strtoupper($_POST['CPFTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','RGTESTEMUNHA2',mb_strtoupper($_POST['RGTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','ORGAOEMISSORTESTEMUNHA2',mb_strtoupper($_POST['ORGAOEMISSORTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','NACIONALIDADETESTEMUNHA2',mb_strtoupper($_POST['NACIONALIDADETESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','NATURALIDADETESTEMUNHA2',mb_strtoupper($_POST['NATURALIDADETESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','DATANASCIMENTOTESTEMUNHA2',mb_strtoupper($_POST['DATANASCIMENTOTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','SEXOTESTEMUNHA2',mb_strtoupper($_POST['SEXOTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','ESTADOCIVILTESTEMUNHA2',mb_strtoupper($_POST['ESTADOCIVILTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','PROFISSAOTESTEMUNHA2',mb_strtoupper($_POST['PROFISSAOTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','ENDERECOTESTEMUNHA2',mb_strtoupper($_POST['ENDERECOTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','BAIRROTESTEMUNHA2',mb_strtoupper($_POST['BAIRROTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_obito_novo','CIDADETESTEMUNHA2',mb_strtoupper($_POST['CIDADETESTEMUNHA2']),$id);	
				}
								header('Location: ' . $_SERVER['HTTP_REFERER']);			
		}
#SUBIMIT4 ==============================================================================================================================================
		if (isset($_POST['subimit4'])) {
			unset($_POST['subimit4']);
			#var_dump($_POST);
			header('Location: ' . $_SERVER['HTTP_REFERER']);	
		}	
		
#SUBIMIT5 ==============================================================================================================================================
		if (isset($_POST['subimit5'])) {
			unset($_POST['subimit5']);
			#var_dump($_POST);
				UPDATE_CAMPO_ID('registro_obito_novo','strNumeroRg',$_POST['strNumeroRg'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','dataExpRg',$_POST['dataExpRg'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','OrgaoExpRg',$_POST['OrgaoExpRg'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','dataValidadeRg',$_POST['dataValidadeRg'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','strPisNis',$_POST['strPisNis'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','dataExpPisNis',$_POST['dataExpPisNis'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','OrgaoExpPisNis',$_POST['OrgaoExpPisNis'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','dataValidadePisNis',$_POST['dataValidadePisNis'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','strPassaporte',$_POST['strPassaporte'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','dataExpPassaporte',$_POST['dataExpPassaporte'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','OrgaoExpPassaporte',$_POST['OrgaoExpPassaporte'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','dataValidadePassaporte',$_POST['dataValidadePassaporte'],$id);
				
				UPDATE_CAMPO_ID('registro_obito_novo','strCartSaude',$_POST['strCartaoSaude'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','dataExpCartSaude',$_POST['dataExpCartaoSaude'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','OrgaoExpCartSaude',$_POST['OrgaoExpCartaoSaude'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','dataValidadeCartSaude',$_POST['dataValidadeCartaoSaude'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','strTituloEleitor',$_POST['strTituloEleitor'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','dataExpTituloEleitor',$_POST['dataExpTituloEleitor'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','OrgaoExpTituloEleitor',$_POST['OrgaoExpTituloEleitor'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','dataValidadeTituloEleitor',$_POST['dataValidadeTituloEleitor'],$id);

				UPDATE_CAMPO_ID('registro_obito_novo','strCtps',$_POST['strCtps'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','dataExpCtps',$_POST['dataExpCtps'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','OrgaoExpCtps',$_POST['OrgaoExpCtps'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','dataValidadeCtps',$_POST['dataValidadeCtps'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','strCep',$_POST['strCep'],$id);
				UPDATE_CAMPO_ID('registro_obito_novo','strGrupoSanguineo',$_POST['strGrupoSanguineo'],$id);
				header('Location: ' . $_SERVER['HTTP_REFERER']);	
		}								







#SUBIMITSELO ==============================================================================================================================================
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
						$LIVRO = $_POST['LIVROOBITO'];
						$FOLHA = $_POST['FOLHAOBITO'];
						$TERMO = intval($_POST['TERMOOBITO']);
						$ATO = $_POST['ATOOBITO'];
						$TIPOPAPEL = $_POST['TIPOPAPELSEGURANCA'];
						$NUMEROPAPEL = $_POST['NUMEROPAPELSEGURANCA'];
						$TIPOLIVRO = $_POST['TIPOLIVRO'];

						if ($TIPOLIVRO == 4) {
						$pesq_livre = $pdo->prepare("SELECT * FROM livro_obitos where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA' ");
						}
						else{
						$pesq_livre = $pdo->prepare("SELECT * FROM livro_obitos_auxiliar where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA'");
						}
						$pesq_livre->execute();
						$pl = $pesq_livre->fetch(PDO::FETCH_ASSOC);
						if ($pl['Status'] == 'U') {
						$_SESSION['erro'] = 'OPS! ALGUÉM PODE TER USADO ESSA PÁGINA ENQUANTO VOCÊ DIGITAVA, TENTE NOVAMENTE COM OUTRA PÁGINA';
						die($_SESSION['erro']);
						break;	
						}
						else{
						if ($TIPOLIVRO == 4) {
							$up_pagina = $pdo->prepare("UPDATE livro_obitos set Status = 'U' where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA'");
							}	
							else{	
						$up_pagina = $pdo->prepare("UPDATE livro_obitos_auxiliar set Status = 'U' where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA'");
							}
						}

					include('../selador/civil_geral.php');
					if ($token =='' || empty($token)) {
			                    	die('NENHUM DADO RECEBIDO TENTE NOVAMENTE');
			                    	break;
			                    }


					if ($token !='') {


			#PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
						$pesquisanomeparte = PESQUISA_ALL_ID('registro_obito_novo',$id);
						foreach ($pesquisanomeparte as $p) {
						$nomeparte = $p->NOME;
						$pai = $p->NOMEPAI;
						$mae = $p->NOMEMAE;
						$docpai = $p->CPFPAI;
						$docmae = $p->CPFMAE;
						}	

			            $ato_praticado = $_POST['ATOOBITO'];
			            $escrevente = $_SESSION['nome'];
			            $isento = 'true';
			            $motivo_isento='Teste';
			            $nomeparte1 =$nomeparte;
			            $docparte1='04355863000132';
			            $nomeparte2 ='DIEGO ROBERTO AFONSO';
			            $docparte2='78444063215';
			            $nomeparte3 ='';
			            $docparte3='';
			            $nomeparte4 ='';
			            $docparte4='';
						$livro =$LIVRO;
						$folha=$FOLHA;
						$termo=$TERMO;


						$ConteudoPOST = '{
						"codigoTipoAtoRegistro":"'.$ato_praticado.'",
						"escrevente":"'.$escrevente.'",
						"nomeParte":"'.$nomeparte.'",
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
						"folha": "'.$FOLHA.'",
						"livro": "'.$LIVRO.'",
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
			                    
			                 

			                    $handler = curl_init($_SESSION['urlselodigital'].'civil/obito');

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
								$LIVRO = $_POST['LIVROOBITO'];
								$FOLHA = $_POST['FOLHAOBITO'];
								$TERMO = intval($_POST['TERMOOBITO']);
								$ATO = $_POST['ATOOBITO'];
								$TIPOPAPEL = $_POST['TIPOPAPELSEGURANCA'];
								$NUMEROPAPEL = $_POST['NUMEROPAPELSEGURANCA'];	
								$funcionario = $_SESSION['nome'];
								$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','REG. OBITO','2','1','$SELO',CURRENT_TIMESTAMP,'GRA','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
								
								
								

								UPDATE_CAMPO_ID('registro_obito_novo','RETORNOSELODIGITAL',strip_tags($RETORNO),$id);
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
						if (isset($_POST['ATOOBITO'])) {
								UPDATE_CAMPO_ID('registro_obito_novo','ATOOBITO',$_POST['ATOOBITO'],$id);
								}		
						if (isset($_POST['AVERBACAOTERMOANTIGO'])) {
										UPDATE_CAMPO_ID('registro_obito_novo','AVERBACAOTERMOANTIGO',$_POST['AVERBACAOTERMOANTIGO'],$id);
													}

						UPDATE_CAMPO_ID('registro_obito_novo','LIVROOBITO',mb_strtoupper($_POST['LIVROOBITO']),$id);
						UPDATE_CAMPO_ID('registro_obito_novo','FOLHAOBITO',mb_strtoupper($_POST['FOLHAOBITO']),$id);
						UPDATE_CAMPO_ID('registro_obito_novo','TERMOOBITO',mb_strtoupper($_POST['TERMOOBITO']),$id);
						UPDATE_CAMPO_ID('registro_obito_novo','MATRICULA',mb_strtoupper($_POST['MATRICULA']),$id);
						UPDATE_CAMPO_ID('registro_obito_novo','SELO',mb_strtoupper($_POST['SELO2']),$id);
						UPDATE_CAMPO_ID('registro_obito_novo','DATAENTRADA',$_POST['DATAENTRADA'],$id);
						UPDATE_CAMPO_ID('registro_obito_novo','TIPOLIVRO',$_POST['TIPOLIVRO'],$id);	
						if (isset($SELO)) {
						die('<a class="btn waves-effect bg-blue" href="pesquisa-obito.php?id='.$id.'">IR PARA PESQUISA</a><br>'.
						strip_tags($SELO));
						}
						else{
						die('<a class="btn waves-effect bg-blue" href="pesquisa-obito.php?id='.$id.'">IR PARA PESQUISA</a>');
						}


						
					}	



 ?>