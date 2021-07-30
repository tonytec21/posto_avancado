<?php
include('../controller/db_functions.php');
session_start();
$id = $_GET['id'];
$pdo = conectar();

#SUBMIT 1 =================================================================================================================================================
	if (isset($_POST['subimit1'])) {
	unset($_POST['subimit1']);
	#var_dump($_POST);
	
	

			#DADOS NUBENTE 1:	
						UPDATE_CAMPO_ID('registro_casamento_novo','NOMENUBENTE1',mb_strtoupper($_POST['NOMENUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','CPFNUBENTE1',mb_strtoupper($_POST['CPFNUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','RGNUBENTE1',mb_strtoupper($_POST['RGNUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','ORGAOEMISSORNUBENTE1',mb_strtoupper($_POST['ORGAOEMISSORNUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','NACIONALIDADENUBENTE1',mb_strtoupper($_POST['NACIONALIDADENUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADENUBENTE1',mb_strtoupper($_POST['NATURALIDADENUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','DATANASCIMENTONUBENTE1',mb_strtoupper($_POST['DATANASCIMENTONUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','SEXONUBENTE1',mb_strtoupper($_POST['SEXONUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','ESTADOCIVILNUBENTE1',mb_strtoupper($_POST['ESTADOCIVILNUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','ANTIGOCONJUGENUBENTE1',mb_strtoupper($_POST['ANTIGOCONJUGENUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','CARTORIOANTIGOCASAMENTONUBENTE1',mb_strtoupper($_POST['CARTORIOANTIGOCASAMENTONUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','DATAANTIGOCASAMENTONUBENTE1',mb_strtoupper($_POST['DATAANTIGOCASAMENTONUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','FILHOSANTIGOCASAMENTONUBENTE1',mb_strtoupper($_POST['FILHOSANTIGOCASAMENTONUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','PROFISSAONUBENTE1',mb_strtoupper($_POST['PROFISSAONUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','ENDERECONUBENTE1',mb_strtoupper($_POST['ENDERECONUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','BAIRRONUBENTE1',mb_strtoupper($_POST['BAIRRONUBENTE1']),$id);
						UPDATE_CAMPO_ID('registro_casamento_novo','CIDADENUBENTE1',mb_strtoupper($_POST['CIDADENUBENTE1']),$id);
						

						if (isset($_POST['NATURALIDADENUBENTE1TEXTO']) && !empty($_POST['NATURALIDADENUBENTE1TEXTO'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADENUBENTE1','5300109'.mb_strtoupper($_POST['NATURALIDADENUBENTE1TEXTO']),$id);
						}

						if (isset($_POST['CIDADENUBENTE1TEXTO']) && !empty($_POST['CIDADENUBENTE1TEXTO'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','CIDADENUBENTE1','5300109'.mb_strtoupper($_POST['CIDADENUBENTE1TEXTO']),$id);
						}



						UPDATE_CAMPO_ID('registro_casamento_novo','NOMECASADONUBENTE1',mb_strtoupper($_POST['NOMECASADONUBENTE1']),$id);
						if ($_POST['ROGONUBENTE1']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','ROGONUBENTE1',mb_strtoupper($_POST['ROGONUBENTE1']),$id);
						}
						if ($_POST['QUALIFICACAOPROCNUBENTE1']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','QUALIFICACAOPROCNUBENTE1',mb_strtoupper($_POST['QUALIFICACAOPROCNUBENTE1']),$id);
						}
						if ($_POST['LIVROPROCNUBENTE1']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','LIVROPROCNUBENTE1',mb_strtoupper($_POST['LIVROPROCNUBENTE1']),$id);
						}
						if ($_POST['FOLHAPROCNUBENTE1']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','FOLHAPROCNUBENTE1',mb_strtoupper($_POST['FOLHAPROCNUBENTE1']),$id);
						}
						if ($_POST['TERMOPROCNUBENTE1']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','TERMOPROCNUBENTE1',mb_strtoupper($_POST['TERMOPROCNUBENTE1']),$id);
						}
						if ($_POST['CARTORIOPROCNUBENTE1']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','CARTORIOPROCNUBENTE1',mb_strtoupper($_POST['CARTORIOPROCNUBENTE1']),$id);
						}

			#DADOSPAINUBENTE1:
					if (isset($_POST['NOMEPAINUBENTE1'])) {
					
						if (isset($_POST['NOMEPAINUBENTE1'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','NOMEPAINUBENTE1',mb_strtoupper($_POST['NOMEPAINUBENTE1']),$id);
						}
						
						if (isset($_POST['CPFPAINUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','CPFPAINUBENTE1',mb_strtoupper($_POST['CPFPAINUBENTE1']),$id);
						}
					
						if (isset($_POST['ROGOPAINUBENTE1'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','RGPAINUBENTE1',mb_strtoupper($_POST['RGPAINUBENTE1']),$id);
						}

						
						if (isset($_POST['ORGAOEMISSORPAINUBENTE1'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','ORGAOEMISSORPAINUBENTE1',mb_strtoupper($_POST['ORGAOEMISSORPAINUBENTE1']),$id);
						}
						
						if (isset($_POST['NACIONALIDADEPAINUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','NACIONALIDADEPAINUBENTE1',mb_strtoupper($_POST['NACIONALIDADEPAINUBENTE1']),$id);
						}
						if (isset($_POST['NATURALIDADEPAINUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADEPAINUBENTE1',mb_strtoupper($_POST['NATURALIDADEPAINUBENTE1']),$id);
						}
						if (isset($_POST['DATANASCIMENTOPAINUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','DATANASCIMENTOPAINUBENTE1',mb_strtoupper($_POST['DATANASCIMENTOPAINUBENTE1']),$id);
						}
						if (isset($_POST['SEXOPAINUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','SEXOPAINUBENTE1',mb_strtoupper($_POST['SEXOPAINUBENTE1']),$id);
						}
						if (isset($_POST['ESTADOCIVILPAINUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','ESTADOCIVILPAINUBENTE1',mb_strtoupper($_POST['ESTADOCIVILPAINUBENTE1']),$id);
						}
						if (isset($_POST['PROFISSAOPAINUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','PROFISSAOPAINUBENTE1',mb_strtoupper($_POST['PROFISSAOPAINUBENTE1']),$id);
						}
						if (isset($_POST['ENDERECOPAINUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','ENDERECOPAINUBENTE1',mb_strtoupper($_POST['ENDERECOPAINUBENTE1']),$id);
						}
						if (isset($_POST['BAIRROPAINUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','BAIRROPAINUBENTE1',mb_strtoupper($_POST['BAIRROPAINUBENTE1']),$id);
						}
						if (isset($_POST['CIDADEPAINUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','CIDADEPAINUBENTE1',mb_strtoupper($_POST['CIDADEPAINUBENTE1']),$id);
						}

						if ($_POST['ROGOPAINUBENTE1']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','ROGOPAINUBENTE1',mb_strtoupper($_POST['ROGOPAINUBENTE1']),$id);
						}

						if (isset($_POST['FALECIDOPAINUBENTE1']) && $_POST['FALECIDOPAINUBENTE1'] =='S') {
						UPDATE_CAMPO_ID('registro_casamento_novo','FALECIDOPAINUBENTE1',mb_strtoupper($_POST['FALECIDOPAINUBENTE1']),$id);
						}

							}			
			#DADOSMAENUBENTE1:
						if (isset($_POST['NOMEMAENUBENTE1'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','NOMEMAENUBENTE1',mb_strtoupper($_POST['NOMEMAENUBENTE1']),$id);
						}
						
						if (isset($_POST['CPFMAENUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','CPFMAENUBENTE1',mb_strtoupper($_POST['CPFMAENUBENTE1']),$id);
						}
					
						if (isset($_POST['ROGOMAENUBENTE1'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','RGMAENUBENTE1',mb_strtoupper($_POST['RGMAENUBENTE1']),$id);
						}

						
						if (isset($_POST['ORGAOEMISSORMAENUBENTE1'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','ORGAOEMISSORMAENUBENTE1',mb_strtoupper($_POST['ORGAOEMISSORMAENUBENTE1']),$id);
						}
						
						if (isset($_POST['NACIONALIDADEMAENUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','NACIONALIDADEMAENUBENTE1',mb_strtoupper($_POST['NACIONALIDADEMAENUBENTE1']),$id);
						}
						if (isset($_POST['NATURALIDADEMAENUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADEMAENUBENTE1',mb_strtoupper($_POST['NATURALIDADEMAENUBENTE1']),$id);
						}
						if (isset($_POST['DATANASCIMENTOMAENUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','DATANASCIMENTOMAENUBENTE1',mb_strtoupper($_POST['DATANASCIMENTOMAENUBENTE1']),$id);
						}
						if (isset($_POST['SEXOMAENUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','SEXOMAENUBENTE1',mb_strtoupper($_POST['SEXOMAENUBENTE1']),$id);
						}
						if (isset($_POST['ESTADOCIVILMAENUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','ESTADOCIVILMAENUBENTE1',mb_strtoupper($_POST['ESTADOCIVILMAENUBENTE1']),$id);
						}
						if (isset($_POST['PROFISSAOMAENUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','PROFISSAOMAENUBENTE1',mb_strtoupper($_POST['PROFISSAOMAENUBENTE1']),$id);
						}
						if (isset($_POST['ENDERECOMAENUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','ENDERECOMAENUBENTE1',mb_strtoupper($_POST['ENDERECOMAENUBENTE1']),$id);
						}
						if (isset($_POST['BAIRROMAENUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','BAIRROMAENUBENTE1',mb_strtoupper($_POST['BAIRROMAENUBENTE1']),$id);
						}
						if (isset($_POST['CIDADEMAENUBENTE1'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','CIDADEMAENUBENTE1',mb_strtoupper($_POST['CIDADEMAENUBENTE1']),$id);
						}


						if ($_POST['ROGOMAENUBENTE1']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','ROGOMAENUBENTE1',mb_strtoupper($_POST['ROGOMAENUBENTE1']),$id);
						}
						if (isset($_POST['FALECIDOMAENUBENTE1']) && $_POST['FALECIDOMAENUBENTE1'] =='S') {
						UPDATE_CAMPO_ID('registro_casamento_novo','FALECIDOMAENUBENTE1',mb_strtoupper($_POST['FALECIDOMAENUBENTE1']),$id);
						}
					
	
		#$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
		#header('location:../registro-casamento_novo.php?id='.$id);
						header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
#============================================================================================================================================================
#SUBMIT 2 =================================================================================================================================================
 if (isset($_POST['subimit2'])) {
 unset($_POST['subimit2']);
 #var_dump($_POST);

				#DADOS NUBENTE 2:	
							UPDATE_CAMPO_ID('registro_casamento_novo','NOMENUBENTE2',mb_strtoupper($_POST['NOMENUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','CPFNUBENTE2',mb_strtoupper($_POST['CPFNUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','RGNUBENTE2',mb_strtoupper($_POST['RGNUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','ORGAOEMISSORNUBENTE2',mb_strtoupper($_POST['ORGAOEMISSORNUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','NACIONALIDADENUBENTE2',mb_strtoupper($_POST['NACIONALIDADENUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADENUBENTE2',mb_strtoupper($_POST['NATURALIDADENUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','DATANASCIMENTONUBENTE2',mb_strtoupper($_POST['DATANASCIMENTONUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','SEXONUBENTE2',mb_strtoupper($_POST['SEXONUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','ESTADOCIVILNUBENTE2',mb_strtoupper($_POST['ESTADOCIVILNUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','ANTIGOCONJUGENUBENTE2',mb_strtoupper($_POST['ANTIGOCONJUGENUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','CARTORIOANTIGOCASAMENTONUBENTE2',mb_strtoupper($_POST['CARTORIOANTIGOCASAMENTONUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','DATAANTIGOCASAMENTONUBENTE2',mb_strtoupper($_POST['DATAANTIGOCASAMENTONUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','FILHOSANTIGOCASAMENTONUBENTE2',mb_strtoupper($_POST['FILHOSANTIGOCASAMENTONUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','PROFISSAONUBENTE2',mb_strtoupper($_POST['PROFISSAONUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','ENDERECONUBENTE2',mb_strtoupper($_POST['ENDERECONUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','BAIRRONUBENTE2',mb_strtoupper($_POST['BAIRRONUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','CIDADENUBENTE2',mb_strtoupper($_POST['CIDADENUBENTE2']),$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','NOMECASADONUBENTE2',mb_strtoupper($_POST['NOMECASADONUBENTE2']),$id);

							if (isset($_POST['NATURALIDADENUBENTE2TEXTO']) && !empty($_POST['NATURALIDADENUBENTE2TEXTO'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADENUBENTE2','5300109'.mb_strtoupper($_POST['NATURALIDADENUBENTE2TEXTO']),$id);
						}

						if (isset($_POST['CIDADENUBENTE2TEXTO']) && !empty($_POST['CIDADENUBENTE2TEXTO'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','CIDADENUBENTE2','5300109'.mb_strtoupper($_POST['CIDADENUBENTE2TEXTO']),$id);
						}


							if ($_POST['ROGONUBENTE2']!='') {
							UPDATE_CAMPO_ID('registro_casamento_novo','ROGONUBENTE2',mb_strtoupper($_POST['ROGONUBENTE2']),$id);
							}
							if ($_POST['QUALIFICACAOPROCNUBENTE2']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','QUALIFICACAOPROCNUBENTE2',mb_strtoupper($_POST['QUALIFICACAOPROCNUBENTE2']),$id);
						}
						if ($_POST['LIVROPROCNUBENTE2']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','LIVROPROCNUBENTE2',mb_strtoupper($_POST['LIVROPROCNUBENTE2']),$id);
						}
						if ($_POST['FOLHAPROCNUBENTE2']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','FOLHAPROCNUBENTE2',mb_strtoupper($_POST['FOLHAPROCNUBENTE2']),$id);
						}
						if ($_POST['TERMOPROCNUBENTE2']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','TERMOPROCNUBENTE2',mb_strtoupper($_POST['TERMOPROCNUBENTE2']),$id);
						}
						if ($_POST['CARTORIOPROCNUBENTE2']!='') {
						UPDATE_CAMPO_ID('registro_casamento_novo','CARTORIOPROCNUBENTE2',mb_strtoupper($_POST['CARTORIOPROCNUBENTE2']),$id);
						}
				#DADOSPAINUBENTE2:
							  if (isset($_POST['NOMEPAINUBENTE2'])) {
							if (isset($_POST['NOMEPAINUBENTE2'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','NOMEPAINUBENTE2',mb_strtoupper($_POST['NOMEPAINUBENTE2']),$id);
						}
						
						if (isset($_POST['CPFPAINUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','CPFPAINUBENTE2',mb_strtoupper($_POST['CPFPAINUBENTE2']),$id);
						}
					
						if (isset($_POST['ROGOPAINUBENTE2'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','RGPAINUBENTE2',mb_strtoupper($_POST['RGPAINUBENTE2']),$id);
						}

						
						if (isset($_POST['ORGAOEMISSORPAINUBENTE2'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','ORGAOEMISSORPAINUBENTE2',mb_strtoupper($_POST['ORGAOEMISSORPAINUBENTE2']),$id);
						}
						
						if (isset($_POST['NACIONALIDADEPAINUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','NACIONALIDADEPAINUBENTE2',mb_strtoupper($_POST['NACIONALIDADEPAINUBENTE2']),$id);
						}
						if (isset($_POST['NATURALIDADEPAINUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADEPAINUBENTE2',mb_strtoupper($_POST['NATURALIDADEPAINUBENTE2']),$id);
						}
						if (isset($_POST['DATANASCIMENTOPAINUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','DATANASCIMENTOPAINUBENTE2',mb_strtoupper($_POST['DATANASCIMENTOPAINUBENTE2']),$id);
						}
						if (isset($_POST['SEXOPAINUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','SEXOPAINUBENTE2',mb_strtoupper($_POST['SEXOPAINUBENTE2']),$id);
						}
						if (isset($_POST['ESTADOCIVILPAINUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','ESTADOCIVILPAINUBENTE2',mb_strtoupper($_POST['ESTADOCIVILPAINUBENTE2']),$id);
						}
						if (isset($_POST['PROFISSAOPAINUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','PROFISSAOPAINUBENTE2',mb_strtoupper($_POST['PROFISSAOPAINUBENTE2']),$id);
						}
						if (isset($_POST['ENDERECOPAINUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','ENDERECOPAINUBENTE2',mb_strtoupper($_POST['ENDERECOPAINUBENTE2']),$id);
						}
						if (isset($_POST['BAIRROPAINUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','BAIRROPAINUBENTE2',mb_strtoupper($_POST['BAIRROPAINUBENTE2']),$id);
						}
						if (isset($_POST['CIDADEPAINUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','CIDADEPAINUBENTE2',mb_strtoupper($_POST['CIDADEPAINUBENTE2']),$id);
						}
							if ($_POST['ROGOPAINUBENTE2']!='') {
							UPDATE_CAMPO_ID('registro_casamento_novo','ROGOPAINUBENTE2',mb_strtoupper($_POST['ROGOPAINUBENTE2']),$id);
							}
						if (isset($_POST['FALECIDOPAINUBENTE2']) && $_POST['FALECIDOPAINUBENTE2'] =='S') {
						UPDATE_CAMPO_ID('registro_casamento_novo','FALECIDOPAINUBENTE2',mb_strtoupper($_POST['FALECIDOPAINUBENTE2']),$id);
						}	

							   }		
				#DADOSMAENUBENTE2:
							if (isset($_POST['NOMEMAENUBENTE2'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','NOMEMAENUBENTE2',mb_strtoupper($_POST['NOMEMAENUBENTE2']),$id);
						}
						
						if (isset($_POST['CPFMAENUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','CPFMAENUBENTE2',mb_strtoupper($_POST['CPFMAENUBENTE2']),$id);
						}
					
						if (isset($_POST['ROGOMAENUBENTE2'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','RGMAENUBENTE2',mb_strtoupper($_POST['RGMAENUBENTE2']),$id);
						}

						
						if (isset($_POST['ORGAOEMISSORMAENUBENTE2'])) {
						UPDATE_CAMPO_ID('registro_casamento_novo','ORGAOEMISSORMAENUBENTE2',mb_strtoupper($_POST['ORGAOEMISSORMAENUBENTE2']),$id);
						}
						
						if (isset($_POST['NACIONALIDADEMAENUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','NACIONALIDADEMAENUBENTE2',mb_strtoupper($_POST['NACIONALIDADEMAENUBENTE2']),$id);
						}
						if (isset($_POST['NATURALIDADEMAENUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADEMAENUBENTE2',mb_strtoupper($_POST['NATURALIDADEMAENUBENTE2']),$id);
						}
						if (isset($_POST['DATANASCIMENTOMAENUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','DATANASCIMENTOMAENUBENTE2',mb_strtoupper($_POST['DATANASCIMENTOMAENUBENTE2']),$id);
						}
						if (isset($_POST['SEXOMAENUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','SEXOMAENUBENTE2',mb_strtoupper($_POST['SEXOMAENUBENTE2']),$id);
						}
						if (isset($_POST['ESTADOCIVILMAENUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','ESTADOCIVILMAENUBENTE2',mb_strtoupper($_POST['ESTADOCIVILMAENUBENTE2']),$id);
						}
						if (isset($_POST['PROFISSAOMAENUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','PROFISSAOMAENUBENTE2',mb_strtoupper($_POST['PROFISSAOMAENUBENTE2']),$id);
						}
						if (isset($_POST['ENDERECOMAENUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','ENDERECOMAENUBENTE2',mb_strtoupper($_POST['ENDERECOMAENUBENTE2']),$id);
						}
						if (isset($_POST['BAIRROMAENUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','BAIRROMAENUBENTE2',mb_strtoupper($_POST['BAIRROMAENUBENTE2']),$id);
						}
						if (isset($_POST['CIDADEMAENUBENTE2'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','CIDADEMAENUBENTE2',mb_strtoupper($_POST['CIDADEMAENUBENTE2']),$id);
						}
							if ($_POST['ROGOMAENUBENTE2']!='') {
							UPDATE_CAMPO_ID('registro_casamento_novo','ROGOMAENUBENTE2',mb_strtoupper($_POST['ROGOMAENUBENTE2']),$id);
							}
							if (isset($_POST['FALECIDOMAENUBENTE2']) && $_POST['FALECIDOMAENUBENTE2'] =='S') {
						UPDATE_CAMPO_ID('registro_casamento_novo','FALECIDOMAENUBENTE2',mb_strtoupper($_POST['FALECIDOMAENUBENTE2']),$id);
						}
					
								
		#$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
		#header('location:../registro-casamento.php?confn=ok&id='.$id);
													header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
#============================================================================================================================================================
#SUBMIT 3 =================================================================================================================================================
  if (isset($_POST['subimit3'])) {
  unset($_POST['subimit3']);
  #var_dump($_POST);

			#DADOSTESTEMUNHA1:
								UPDATE_CAMPO_ID('registro_casamento_novo','NOMETESTEMUNHA1',mb_strtoupper($_POST['NOMETESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','CPFTESTEMUNHA1',mb_strtoupper($_POST['CPFTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','RGTESTEMUNHA1',mb_strtoupper($_POST['RGTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ORGAOEMISSORTESTEMUNHA1',mb_strtoupper($_POST['ORGAOEMISSORTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','NACIONALIDADETESTEMUNHA1',mb_strtoupper($_POST['NACIONALIDADETESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADETESTEMUNHA1',mb_strtoupper($_POST['NATURALIDADETESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','DATANASCIMENTOTESTEMUNHA1',mb_strtoupper($_POST['DATANASCIMENTOTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','SEXOTESTEMUNHA1',mb_strtoupper($_POST['SEXOTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ESTADOCIVILTESTEMUNHA1',mb_strtoupper($_POST['ESTADOCIVILTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','PROFISSAOTESTEMUNHA1',mb_strtoupper($_POST['PROFISSAOTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ENDERECOTESTEMUNHA1',mb_strtoupper($_POST['ENDERECOTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','BAIRROTESTEMUNHA1',mb_strtoupper($_POST['BAIRROTESTEMUNHA1']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','CIDADETESTEMUNHA1',mb_strtoupper($_POST['CIDADETESTEMUNHA1']),$id);
								if ($_POST['ROGOTESTEMUNHA1']!='') {
								UPDATE_CAMPO_ID('registro_casamento_novo','ROGOTESTEMUNHA1',mb_strtoupper($_POST['ROGOTESTEMUNHA1']),$id);
								}
			#DADOSTESTEMUNHA2:
								UPDATE_CAMPO_ID('registro_casamento_novo','NOMETESTEMUNHA2',mb_strtoupper($_POST['NOMETESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','CPFTESTEMUNHA2',mb_strtoupper($_POST['CPFTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','RGTESTEMUNHA2',mb_strtoupper($_POST['RGTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ORGAOEMISSORTESTEMUNHA2',mb_strtoupper($_POST['ORGAOEMISSORTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','NACIONALIDADETESTEMUNHA2',mb_strtoupper($_POST['NACIONALIDADETESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADETESTEMUNHA2',mb_strtoupper($_POST['NATURALIDADETESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','DATANASCIMENTOTESTEMUNHA2',mb_strtoupper($_POST['DATANASCIMENTOTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','SEXOTESTEMUNHA2',mb_strtoupper($_POST['SEXOTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ESTADOCIVILTESTEMUNHA2',mb_strtoupper($_POST['ESTADOCIVILTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','PROFISSAOTESTEMUNHA2',mb_strtoupper($_POST['PROFISSAOTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ENDERECOTESTEMUNHA2',mb_strtoupper($_POST['ENDERECOTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','BAIRROTESTEMUNHA2',mb_strtoupper($_POST['BAIRROTESTEMUNHA2']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','CIDADETESTEMUNHA2',mb_strtoupper($_POST['CIDADETESTEMUNHA2']),$id);
								if ($_POST['ROGOTESTEMUNHA2']!='') {
								UPDATE_CAMPO_ID('registro_casamento_novo','ROGOTESTEMUNHA2',mb_strtoupper($_POST['ROGOTESTEMUNHA2']),$id);
								}
			#DADOSTESTEMUNHA3:
				if ($_POST['NOMETESTEMUNHA3']!='') {					
								UPDATE_CAMPO_ID('registro_casamento_novo','NOMETESTEMUNHA3',mb_strtoupper($_POST['NOMETESTEMUNHA3']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','CPFTESTEMUNHA3',mb_strtoupper($_POST['CPFTESTEMUNHA3']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','RGTESTEMUNHA3',mb_strtoupper($_POST['RGTESTEMUNHA3']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ORGAOEMISSORTESTEMUNHA3',mb_strtoupper($_POST['ORGAOEMISSORTESTEMUNHA3']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','NACIONALIDADETESTEMUNHA3',mb_strtoupper($_POST['NACIONALIDADETESTEMUNHA3']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADETESTEMUNHA3',mb_strtoupper($_POST['NATURALIDADETESTEMUNHA3']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','DATANASCIMENTOTESTEMUNHA3',mb_strtoupper($_POST['DATANASCIMENTOTESTEMUNHA3']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','SEXOTESTEMUNHA3',mb_strtoupper($_POST['SEXOTESTEMUNHA3']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ESTADOCIVILTESTEMUNHA3',mb_strtoupper($_POST['ESTADOCIVILTESTEMUNHA3']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','PROFISSAOTESTEMUNHA3',mb_strtoupper($_POST['PROFISSAOTESTEMUNHA3']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ENDERECOTESTEMUNHA3',mb_strtoupper($_POST['ENDERECOTESTEMUNHA3']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','BAIRROTESTEMUNHA3',mb_strtoupper($_POST['BAIRROTESTEMUNHA3']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','CIDADETESTEMUNHA3',mb_strtoupper($_POST['CIDADETESTEMUNHA3']),$id);
								if ($_POST['ROGOTESTEMUNHA3']!='') {
								UPDATE_CAMPO_ID('registro_casamento_novo','ROGOTESTEMUNHA3',mb_strtoupper($_POST['ROGOTESTEMUNHA3']),$id);
								}							
					}
			#DADOSTESTEMUNHA4:
				if ($_POST['NOMETESTEMUNHA4']!='') {					
								UPDATE_CAMPO_ID('registro_casamento_novo','NOMETESTEMUNHA4',mb_strtoupper($_POST['NOMETESTEMUNHA4']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','CPFTESTEMUNHA4',mb_strtoupper($_POST['CPFTESTEMUNHA4']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','RGTESTEMUNHA4',mb_strtoupper($_POST['RGTESTEMUNHA4']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ORGAOEMISSORTESTEMUNHA4',mb_strtoupper($_POST['ORGAOEMISSORTESTEMUNHA4']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','NACIONALIDADETESTEMUNHA4',mb_strtoupper($_POST['NACIONALIDADETESTEMUNHA4']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADETESTEMUNHA4',mb_strtoupper($_POST['NATURALIDADETESTEMUNHA4']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','DATANASCIMENTOTESTEMUNHA4',mb_strtoupper($_POST['DATANASCIMENTOTESTEMUNHA4']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','SEXOTESTEMUNHA4',mb_strtoupper($_POST['SEXOTESTEMUNHA4']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ESTADOCIVILTESTEMUNHA4',mb_strtoupper($_POST['ESTADOCIVILTESTEMUNHA4']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','PROFISSAOTESTEMUNHA4',mb_strtoupper($_POST['PROFISSAOTESTEMUNHA4']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ENDERECOTESTEMUNHA4',mb_strtoupper($_POST['ENDERECOTESTEMUNHA4']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','BAIRROTESTEMUNHA4',mb_strtoupper($_POST['BAIRROTESTEMUNHA4']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','CIDADETESTEMUNHA4',mb_strtoupper($_POST['CIDADETESTEMUNHA4']),$id);
								if ($_POST['ROGOTESTEMUNHA4']!='') {
								UPDATE_CAMPO_ID('registro_casamento_novo','ROGOTESTEMUNHA4',mb_strtoupper($_POST['ROGOTESTEMUNHA4']),$id);
								}							
					}							

			#DADOSTESTEMUNHA5:
				if ($_POST['NOMETESTEMUNHA5']!='') {					
								UPDATE_CAMPO_ID('registro_casamento_novo','NOMETESTEMUNHA5',mb_strtoupper($_POST['NOMETESTEMUNHA5']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','CPFTESTEMUNHA5',mb_strtoupper($_POST['CPFTESTEMUNHA5']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','RGTESTEMUNHA5',mb_strtoupper($_POST['RGTESTEMUNHA5']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ORGAOEMISSORTESTEMUNHA5',mb_strtoupper($_POST['ORGAOEMISSORTESTEMUNHA5']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','NACIONALIDADETESTEMUNHA5',mb_strtoupper($_POST['NACIONALIDADETESTEMUNHA5']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADETESTEMUNHA5',mb_strtoupper($_POST['NATURALIDADETESTEMUNHA5']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','DATANASCIMENTOTESTEMUNHA5',mb_strtoupper($_POST['DATANASCIMENTOTESTEMUNHA5']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','SEXOTESTEMUNHA5',mb_strtoupper($_POST['SEXOTESTEMUNHA5']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ESTADOCIVILTESTEMUNHA5',mb_strtoupper($_POST['ESTADOCIVILTESTEMUNHA5']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','PROFISSAOTESTEMUNHA5',mb_strtoupper($_POST['PROFISSAOTESTEMUNHA5']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ENDERECOTESTEMUNHA5',mb_strtoupper($_POST['ENDERECOTESTEMUNHA5']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','BAIRROTESTEMUNHA5',mb_strtoupper($_POST['BAIRROTESTEMUNHA5']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','CIDADETESTEMUNHA5',mb_strtoupper($_POST['CIDADETESTEMUNHA5']),$id);
								if ($_POST['ROGOTESTEMUNHA5']!='') {
								UPDATE_CAMPO_ID('registro_casamento_novo','ROGOTESTEMUNHA5',mb_strtoupper($_POST['ROGOTESTEMUNHA5']),$id);
								}							
					}
			#DADOSTESTEMUNHA6:
				if ($_POST['NOMETESTEMUNHA6']!='') {					
								UPDATE_CAMPO_ID('registro_casamento_novo','NOMETESTEMUNHA6',mb_strtoupper($_POST['NOMETESTEMUNHA6']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','CPFTESTEMUNHA6',mb_strtoupper($_POST['CPFTESTEMUNHA6']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','RGTESTEMUNHA6',mb_strtoupper($_POST['RGTESTEMUNHA6']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ORGAOEMISSORTESTEMUNHA6',mb_strtoupper($_POST['ORGAOEMISSORTESTEMUNHA6']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','NACIONALIDADETESTEMUNHA6',mb_strtoupper($_POST['NACIONALIDADETESTEMUNHA6']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','NATURALIDADETESTEMUNHA6',mb_strtoupper($_POST['NATURALIDADETESTEMUNHA6']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','DATANASCIMENTOTESTEMUNHA6',mb_strtoupper($_POST['DATANASCIMENTOTESTEMUNHA6']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','SEXOTESTEMUNHA6',mb_strtoupper($_POST['SEXOTESTEMUNHA6']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ESTADOCIVILTESTEMUNHA6',mb_strtoupper($_POST['ESTADOCIVILTESTEMUNHA6']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','PROFISSAOTESTEMUNHA6',mb_strtoupper($_POST['PROFISSAOTESTEMUNHA6']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','ENDERECOTESTEMUNHA6',mb_strtoupper($_POST['ENDERECOTESTEMUNHA6']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','BAIRROTESTEMUNHA6',mb_strtoupper($_POST['BAIRROTESTEMUNHA6']),$id);
								UPDATE_CAMPO_ID('registro_casamento_novo','CIDADETESTEMUNHA6',mb_strtoupper($_POST['CIDADETESTEMUNHA6']),$id);
								if ($_POST['ROGOTESTEMUNHA6']!='') {
								UPDATE_CAMPO_ID('registro_casamento_novo','ROGOTESTEMUNHA6',mb_strtoupper($_POST['ROGOTESTEMUNHA6']),$id);
								}							
					}											
	
		#$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
		#header('location:../registro-casamento.php?confn=ok&id='.$id);
											header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
#============================================================================================================================================================
#SUBMITSELOPROCLAMAS ========================================================================================================================================		

				if (isset($_POST['subimitseloproclamas'])) {
							unset($_POST['subimitseloproclamas']);
							#VERIFICACOES E VALIDAÇÕES:
										#$SELO = $_POST['SELO2'];
										$LIVRO = $_POST['LIVROPROCLAMAS'];
										$FOLHA = $_POST['FOLHAPROCLAMAS'];
										$TERMO = intval($_POST['TERMOPROCLAMAS']);
										$ATO = $_POST['ATOPROCLAMAS'];
										$TIPOPAPEL = $_POST['TIPOPAPELSEGURANCA'];
										$NUMEROPAPEL = $_POST['NUMEROPAPELSEGURANCA'];
										#$TIPOLIVRO = $_POST['LIVROOBITO'];

										
										$pesq_livre = $pdo->prepare("SELECT * FROM livro_proclamas where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA' and LivroInicial = '$TERMO'");
										$pesq_livre->execute();
										$pl = $pesq_livre->fetch(PDO::FETCH_ASSOC);
										if ($pl['Status'] == 'U') {
										$_SESSION['erro'] = 'OPS! ALGUÉM PODE TER USADO ESSA PÁGINA ENQUANTO VOCÊ DIGITAVA, TENTE NOVAMENTE COM OUTRA PÁGINA';
										die($_SESSION['erro']);
										break;	
										}
										else{
											$up_pagina = $pdo->prepare("UPDATE livro_proclamas set Status = 'U' where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA'");
										}

									if (isset($_POST['DISPENSARSELO']) && $_POST['DISPENSARSELO'] == 'S') {
									$SELO = 'none';
									unset($token);
									}
									else{

									include('../selador/civil_geral.php');
									if ($token =='' || empty($token)) {
							                    	die('NENHUM DADO RECEBIDO TENTE NOVAMENTE');
							                    	break;
							                    }


									if ($token !='') {


							#PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
										$pesquisanomeparte = PESQUISA_ALL_ID('registro_casamento_novo',$id);
										foreach ($pesquisanomeparte as $p) {
										$nomenubente1 = $p->NOMENUBENTE1;
										$nomenubente2 = $p->NOMENUBENTE2;
										}
							            $ato_praticado = $_POST['ATOPROCLAMAS'];
							            $escrevente = $_SESSION['nome'];
										
							            $nomeparte1 ='SUPERINTENDÊNCIA ESTADUAL DE HABITAÇÃO - SUHAB';
							            $docparte1='04355863000132';
							            $nomeparte2 ='DIEGO ROBERTO AFONSO';
							            $docparte2='78444063215';
							            $nomeparte3 ='';
							            $docparte3='';
							            $nomeparte4 ='';
							            $docparte4='';
							            $livro =$_POST['LIVROPROCLAMAS'];
							            $folha=$_POST['FOLHAPROCLAMAS'];
							            $termo =intval($_POST['TERMOPROCLAMAS']);

							            if (isset($_POST['MOTIVOISENTOPROCLAMAS']) && $_POST['MOTIVOISENTOPROCLAMAS']!='') {
										$isento = 'true';
										$motivo_isento=$_POST['MOTIVOISENTOPROCLAMAS'];
										$ConteudoPOST = '{
							                            "codigoTipoAtoRegistro":"'.$ato_praticado.'",
							                            "escrevente":"'.$escrevente.'",
							                            "tipoCasamento":"0",
							                            "isento":{
							                            "value":'.$isento.',
							                            "motivo":"'.$motivo_isento.'"
							                            },
							                            "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
														"nomePrimeiroNubente":"'.$nomenubente1.'",
														"nomeSegundoNubente":"'.$nomenubente2.'",

														"dadosSelo":{
														"isento":"true",
							                            "motivoIsentoGratuito":"'.$motivo_isento.'",	
														"escrevente":"'.$escrevente.'",
														"folha": "'.$folha.'",
														"livro": "'.$livro.'",
														"termo": "'.$termo.'",
														"versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
														}
							                            }';

										}else{
										$isento = 'false';
										$motivo_isento='';
										$ConteudoPOST = '{
							                            "codigoTipoAtoRegistro":"'.$ato_praticado.'",
							                            "escrevente":"'.$escrevente.'",
							                            "tipoCasamento":"0",
							                            "isento":{
							                            "value":'.$isento.',
							                            "motivo":"'.$motivo_isento.'"
							                            },
							                            "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
														"nomePrimeiroNubente":"'.$nomenubente1.'",
														"nomeSegundoNubente":"'.$nomenubente2.'",

														"dadosSelo":{	
														"escrevente":"'.$escrevente.'",
														"folha": "'.$folha.'",
														"livro": "'.$livro.'",
														"termo": "'.$termo.'",
														"versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
														}
							                            }';
										}
							                            
							        
							                    $ConteudoCabecalho = [
							                        'Authorization: Bearer'.$token,
							                        "Content-Type: application/json"
							                        
							                    ];
							                    
							                 

							                    $handler = curl_init($_SESSION['urlselodigital'].'civil/casamento/habilitacao');

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
												$LIVRO = $_POST['LIVROPROCLAMAS'];
												$FOLHA = $_POST['FOLHAPROCLAMAS'];
												$TERMO = intval($_POST['TERMOPROCLAMAS']);
												$ATO = $_POST['ATOPROCLAMAS'];
												$TIPOPAPEL = $_POST['TIPOPAPELSEGURANCA'];
												$NUMEROPAPEL = $_POST['NUMEROPAPELSEGURANCA'];	
												$funcionario = $_SESSION['nome'];
												$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','REG. PROCLAMAS','2','1','$SELO',CURRENT_TIMESTAMP,'GRA','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
												
												$up = $pdo->prepare("UPDATE selo_fisico_uso set status = 'U'  where selo ='$SELO' and tipo = 'GRA'");
												

												UPDATE_CAMPO_ID('registro_casamento_novo','RETORNOSELODIGITALPROCLAMAS',strip_tags($RETORNO),$id);
												$insert_auditoria->execute();
												$up->execute();
							                    $up_pagina->execute();
							                    $_POST['SELO2'] = $SELO;	
												
												

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

							}

										#------------------- ENDPROCLAMAS ------------------------------	
							#DADOSPROCLAMAS:
										UPDATE_CAMPO_ID('registro_casamento_novo','ATOPROCLAMAS',$_POST['ATOPROCLAMAS'],$id);
										UPDATE_CAMPO_ID('registro_casamento_novo','SELO',$SELO,$id);
										UPDATE_CAMPO_ID('registro_casamento_novo','LIVROPROCLAMAS',$_POST['LIVROPROCLAMAS'],$id);
										UPDATE_CAMPO_ID('registro_casamento_novo','FOLHAPROCLAMAS',$_POST['FOLHAPROCLAMAS'],$id);
										UPDATE_CAMPO_ID('registro_casamento_novo','TERMOPROCLAMAS',$_POST['TERMOPROCLAMAS'],$id);
										UPDATE_CAMPO_ID('registro_casamento_novo','DATAENTRADA',$_POST['DATAENTRADA'],$id);
										
										
										if (isset($SELO)) {
										die('<a class="btn waves-effect bg-blue" href="pesquisa-casamento.php?id='.$id.'">IR PARA PESQUISA</a><br>'.
										strip_tags($SELO));
										}
										else{
										die('<a class="btn waves-effect bg-blue" href="pesquisa-casamento.php?id='.$id.'">IR PARA PESQUISA</a>');
										}



						}

#============================================================================================================================================================

#SUBMITSELOCASAMENTO ========================================================================================================================================
	if (isset($_POST['subimitselocasamento'])) {					
						
						if (!isset($_POST['ACERVOFISICO'])) {
							$_POST['ACERVOFISICO'] = '';
						}
						if (!isset($_POST['LIBERAREDICAO'])) {
							$_POST['LIBERAREDICAO'] = '';
						}
					if ($_POST['ACERVOFISICO']=='' && $_POST['LIBERAREDICAO']=='') {

						#VERIFICACOES E VALIDAÇÕES:
						#$SELO = $_POST['SELO2'];
						$LIVRO = $_POST['LIVROCASAMENTO'];
						$FOLHA = $_POST['FOLHACASAMENTO'];
						$TERMO = intval($_POST['TERMOCASAMENTO']);
						$ATO = $_POST['ATOCASAMENTO'];
						$TIPOPAPEL = $_POST['TIPOPAPELSEGURANCA'];
						$NUMEROPAPEL = $_POST['NUMEROPAPELSEGURANCA'];
						$TIPOLIVRO = $_POST['TIPOLIVRO'];

						if ($TIPOLIVRO == 2) {
						$pesq_livre = $pdo->prepare("SELECT * FROM livro_casamentos where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA'");
						}
						else{
						$pesq_livre = $pdo->prepare("SELECT * FROM livro_casamentos_auxiliar where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA' ");
						}
						$pesq_livre->execute();
						$pl = $pesq_livre->fetch(PDO::FETCH_ASSOC);
						if ($pl['Status'] == 'U') {
						$_SESSION['erro'] = 'OPS! ALGUÉM PODE TER USADO ESSA PÁGINA ENQUANTO VOCÊ DIGITAVA, TENTE NOVAMENTE COM OUTRA PÁGINA';
						die($_SESSION['erro']);
						break;	
						}
						else{
						if ($TIPOLIVRO == 2) {
							$up_pagina = $pdo->prepare("UPDATE livro_casamentos set Status = 'U' where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA'");
							}	
							else{	
						$up_pagina = $pdo->prepare("UPDATE livro_casamentos_auxiliar set Status = 'U' where identifcadorLivro = '$LIVRO' and PaginaLivro = '$FOLHA'");
							}
						}

					include('../selador/civil_geral.php');
					if ($token =='' || empty($token)) {
			                    	die('NENHUM DADO RECEBIDO TENTE NOVAMENTE');
			                    	break;
			                    }


					if ($token !='') {


			#PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
						$pesquisanomeparte = PESQUISA_ALL_ID('registro_casamento_novo',$id);
						foreach ($pesquisanomeparte as $p) {
						$nomenubente1 = $p->NOMENUBENTE1;
						$nomenubente2 = $p->NOMENUBENTE2;
						}
			            $ato_praticado = $_POST['ATOCASAMENTO'];
			            $escrevente = $_SESSION['nome'];
						
			            $nomeparte1 ='SUPERINTENDÊNCIA ESTADUAL DE HABITAÇÃO - SUHAB';
			            $docparte1='04355863000132';
			            $nomeparte2 ='DIEGO ROBERTO AFONSO';
			            $docparte2='78444063215';
			            $nomeparte3 ='';
			            $docparte3='';
			            $nomeparte4 ='';
			            $docparte4='';
						$livro =$_POST['LIVROCASAMENTO'];
						$folha=$_POST['FOLHACASAMENTO'];
						$termo =intval($_POST['TERMOCASAMENTO']);
						$TIPOPAPEL = $_POST['TIPOPAPELSEGURANCA'];
						$NUMEROPAPEL = $_POST['NUMEROPAPELSEGURANCA'];
						$TIPOLIVRO = $_POST['TIPOLIVRO'];

						if ($TIPOLIVRO == 2) {
							$tipo_casamento = '0';					
						}
						else{
							$tipo_casamento = '1';
						}

			            if (isset($_POST['MOTIVOISENTOCASAMENTO']) && $_POST['MOTIVOISENTOCASAMENTO']!='') {
						$isento = 'true';
						$motivo_isento=$_POST['MOTIVOISENTOCASAMENTO'];

						$ConteudoPOST = '{
                                        "codigoTipoAtoRegistro":"'.$ato_praticado.'",
                                        "tipoCasamento":"'.$tipo_casamento.'",
                                        "escrevente":"'.$escrevente.'",
                                        "isento":{
                                        "value":"true",
                                        "motivo":"'.$motivo_isento.'"
                                        },
                                        "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
                                       
										"nomePrimeiroNubente":"'.$nomenubente1.'",
										"nomeSegundoNubente":"'.$nomenubente2.'",
                                        "dadosSelo":{
                                        "isento":'.$isento.',
							            "motivoIsentoGratuito":"'.$motivo_isento.'",	
                                        "escrevente":"'.$escrevente.'",
										"folha": "'.$folha.'",
										"livro": "'.$livro.'",
										"termo": "'.$termo.'",
                                        "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
                                        },
                                         "papelMoeda":{
                                "codigo":"'.$NUMEROPAPEL.'",
                                "fornecedor":"'.$TIPOPAPEL.'"
                            }
                                        }';

						}


						else{
						$isento = 'false';
						$motivo_isento='';

						$ConteudoPOST = '{
                                        "codigoTipoAtoRegistro":"'.$ato_praticado.'",
                                        "tipoCasamento":"'.$tipo_casamento.'",
                                        "escrevente":"'.$escrevente.'",
                                        "isento":{
                                        "value":"'.$isento.'",
                                        "motivo":"'.$motivo_isento.'"
                                        },
                                        "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
                                       
										"nomePrimeiroNubente":"'.$nomenubente1.'",
										"nomeSegundoNubente":"'.$nomenubente2.'",
                                        "dadosSelo":{	
                                        "escrevente":"'.$escrevente.'",
										"folha": "'.$folha.'",
										"livro": "'.$livro.'",
										"termo": "'.$termo.'",
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
			                    
			                 

			                    $handler = curl_init($_SESSION['urlselodigital'].'civil/casamento');

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
								$LIVRO = $_POST['LIVROCASAMENTO'];
								$FOLHA = $_POST['FOLHACASAMENTO'];
								$TERMO = intval($_POST['TERMOCASAMENTO']);
								$ATO = $_POST['ATOCASAMENTO'];
								$TIPOPAPEL = $_POST['TIPOPAPELSEGURANCA'];
								$NUMEROPAPEL = $_POST['NUMEROPAPELSEGURANCA'];	
								$funcionario = $_SESSION['nome'];
								$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','REG. CASAMENTO','2','1','$SELO',CURRENT_TIMESTAMP,'GRA','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
								
								$up = $pdo->prepare("UPDATE selo_fisico_uso set status = 'U'  where selo ='$SELO' and tipo = 'GRA'");
								

								UPDATE_CAMPO_ID('registro_casamento_novo','RETORNOSELODIGITALCASAMENTO',strip_tags($RETORNO),$id);
								$insert_auditoria->execute();
								$up->execute();
			                    $up_pagina->execute();
			                    $_POST['SELO2'] = $SELO;	
								
								

								}
			}
					UPDATE_CAMPO_ID('registro_casamento_novo','ATOCASAMENTO',$_POST['ATOCASAMENTO'],$id);
					UPDATE_CAMPO_ID('registro_casamento_novo','SELO',$SELO,$id);	
					UPDATE_CAMPO_ID('registro_casamento_novo','TIPOPAPELSEGURANCA',$_POST['TIPOPAPELSEGURANCA'],$id);
					UPDATE_CAMPO_ID('registro_casamento_novo','NUMEROPAPELSEGURANCA',$_POST['NUMEROPAPELSEGURANCA'],$id);
					$EMPRESA = $_POST['TIPOPAPELSEGURANCA'];
					$PAPEL = $_POST['NUMEROPAPELSEGURANCA'];
					$UPSEGURANCA = $pdo->prepare("UPDATE folhaseguranca set STATUS = 'U' WHERE EMPRESA = '$EMPRESA' AND PAPEL = '$PAPEL'");
					$UPSEGURANCA->execute();

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

							if (isset($_POST['REGIMECASAMENTO'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','REGIMECASAMENTO',$_POST['REGIMECASAMENTO'],$id);
							}
							if (isset($_POST['DATAENTRADA'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','DATAENTRADA',$_POST['DATAENTRADA'],$id);
							}
							if (isset($_POST['AVERBACAOTERMOANTIGO'])) {
							UPDATE_CAMPO_ID('registro_casamento_novo','AVERBACAOTERMOANTIGO',$_POST['AVERBACAOTERMOANTIGO'],$id);
							}	
							UPDATE_CAMPO_ID('registro_casamento_novo','TIPOLIVRO',$_POST['TIPOLIVRO'],$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','LIVROCASAMENTO',$_POST['LIVROCASAMENTO'],$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','FOLHACASAMENTO',$_POST['FOLHACASAMENTO'],$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','TERMOCASAMENTO',$_POST['TERMOCASAMENTO'],$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','MATRICULA',$_POST['MATRICULA'],$id);


							
						
							UPDATE_CAMPO_ID('registro_casamento_novo','ANDAMENTOPROCESSO','HABILITADO',$id);
									
							

							if (isset($SELO)) {
							die('<a class="btn waves-effect bg-blue" href="pesquisa-casamento.php?id='.$id.'">IR PARA PESQUISA</a><br>'.
							strip_tags($SELO));
							}
							else{
							die('<a class="btn waves-effect bg-blue" href="pesquisa-casamento.php?id='.$id.'">IR PARA PESQUISA</a>');
							}
	}									


#============================================================================================================================================================

#SUBMIT 5 =================================================================================================================================================
		if (isset($_POST['subimit5'])) {
		unset($_POST['subimit5']);
		#var_dump($_POST);
		#$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
		#header('location:../registro-casamento.php?confn=ok&id='.$id);
									header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
#============================================================================================================================================================
#SUBMIT 6 =================================================================================================================================================
		if (isset($_POST['subimit6'])) {
		unset($_POST['subimit6']);
		
			#ESSAS MERDAS AI QUE NÃO SERVEM PRA PORCARIA NENHUMA:
			# rg: -----------------------------------------------------------------------------------------
			UPDATE_CAMPO_ID('registro_casamento_novo','strNumeroRgNoivo',$_POST['strNumeroRgNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','strNumeroRgNoiva',$_POST['strNumeroRgNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataExpRgNoivo',$_POST['dataExpRgNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','OrgaoExpRgNoivo',$_POST['OrgaoExpRgNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataValidadeRgNoivo',$_POST['dataValidadeRgNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataExpRgNoiva',$_POST['dataExpRgNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','OrgaoExpRgNoiva',$_POST['OrgaoExpRgNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataValidadeRgNoiva',$_POST['dataValidadeRgNoiva'],$id);

			#pis/nis: -------------------------------------------------------------------------------------
			UPDATE_CAMPO_ID('registro_casamento_novo','strPisNisNoivo',$_POST['strPisNisNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataExpPisNisNoivo',$_POST['dataExpPisNisNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','OrgaoExpPisNisNoivo',$_POST['OrgaoExpPisNisNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataValidadePisNisNoivo',$_POST['dataValidadePisNisNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','strPisNisNoiva',$_POST['strPisNisNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataExpPisNisNoiva',$_POST['dataExpPisNisNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','OrgaoExpPisNisNoiva',$_POST['OrgaoExpPisNisNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataValidadePisNisNoiva',$_POST['dataValidadePisNisNoiva'],$id);

			#passaporte: -------------------------------------------------------------------------------------
			UPDATE_CAMPO_ID('registro_casamento_novo','strPassaporteNoivo',$_POST['strPassaporteNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataExpPassaporteNoivo',$_POST['dataExpPassaporteNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','OrgaoExpPassaporteNoivo',$_POST['OrgaoExpPassaporteNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataValidadePassaporteNoivo',$_POST['dataValidadePassaporteNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','strPassaporteNoiva',$_POST['strPassaporteNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataExpPassaporteNoiva',$_POST['dataExpPassaporteNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','OrgaoExpPassaporteNoiva',$_POST['OrgaoExpPassaporteNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataValidadePassaporteNoiva',$_POST['dataValidadePassaporteNoiva'],$id);

			#cartao saude: -------------------------------------------------------------------------------------
			UPDATE_CAMPO_ID('registro_casamento_novo','strCartaoSaudeNoivo',$_POST['strCartaoSaudeNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataExpCartaoSaudeNoivo',$_POST['dataExpCartaoSaudeNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','OrgaoExpCartaoSaudeNoivo',$_POST['OrgaoExpCartaoSaudeNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataValidadeCartaoSaudeNoivo',$_POST['dataValidadeCartaoSaudeNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','strCartaoSaudeNoiva',$_POST['strCartaoSaudeNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataExpCartaoSaudeNoiva',$_POST['dataExpCartaoSaudeNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','OrgaoExpCartaoSaudeNoiva',$_POST['OrgaoExpCartaoSaudeNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataValidadeCartaoSaudeNoiva',$_POST['dataValidadeCartaoSaudeNoiva'],$id);

			#titulo Eleitor: -------------------------------------------------------------------------------------
			UPDATE_CAMPO_ID('registro_casamento_novo','strTituloEleitorNoivo',$_POST['strTituloEleitorNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataExpTituloEleitorNoivo',$_POST['dataExpTituloEleitorNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','OrgaoExpTituloEleitorNoivo',$_POST['OrgaoExpTituloEleitorNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataValidadeTituloEleitorNoivo',$_POST['dataValidadeTituloEleitorNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','strTituloEleitorNoiva',$_POST['strTituloEleitorNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataExpTituloEleitorNoiva',$_POST['dataExpTituloEleitorNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','OrgaoExpTituloEleitorNoiva',$_POST['OrgaoExpTituloEleitorNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataValidadeTituloEleitorNoiva',$_POST['dataValidadeTituloEleitorNoiva'],$id);

			#ctps: -------------------------------------------------------------------------------------
			UPDATE_CAMPO_ID('registro_casamento_novo','strCtpsNoivo',$_POST['strCtpsNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataExpCtpsNoivo',$_POST['dataExpCtpsNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','OrgaoExpCtpsNoivo',$_POST['OrgaoExpCtpsNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataValidadeCtpsNoivo',$_POST['dataValidadeCtpsNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','strCtpsNoiva',$_POST['strCtpsNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataExpCtpsNoiva',$_POST['dataExpCtpsNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','OrgaoExpCtpsNoiva',$_POST['OrgaoExpCtpsNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','dataValidadeCtpsNoiva',$_POST['dataValidadeCtpsNoiva'],$id);



			UPDATE_CAMPO_ID('registro_casamento_novo','strCepNoivo',$_POST['strCepNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','strCepNoiva',$_POST['strCepNoiva'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','strGrupoSanguineoNoivo',$_POST['strGrupoSanguineoNoivo'],$id);
			UPDATE_CAMPO_ID('registro_casamento_novo','strGrupoSanguineoNoiva',$_POST['strGrupoSanguineoNoiva'],$id);




			UPDATE_CAMPO_ID('registro_casamento_novo','REGIMECASAMENTO',$_POST['REGIMECASAMENTO'],$id);


			if (isset($_POST['COMPLEMENTOREGIME']) && !empty($_POST['COMPLEMENTOREGIME'])) {
				UPDATE_CAMPO_ID('registro_casamento_novo','REGIMECASAMENTO',$_POST['REGIMECASAMENTO'].'@'.$_POST['COMPLEMENTOREGIME'],$id);				
			}


										$DOCUMENTOSAPRESENTADOS = '';
										if (!empty($_POST['cn'])) {
										$DOCUMENTOSAPRESENTADOS .= mb_strtoupper($_POST['cn']).',';
										}
										if (!empty($_POST['ci'])) {
										$DOCUMENTOSAPRESENTADOS .= mb_strtoupper($_POST['ci']).',';
										} 
										if (!empty($_POST['cr'])) {
										$DOCUMENTOSAPRESENTADOS .= mb_strtoupper($_POST['cr']).',';
										}
										if (!empty($_POST['ccd'])) {
										$DOCUMENTOSAPRESENTADOS .= mb_strtoupper($_POST['ccd']).',';
										}
										if (!empty($_POST['ccc'])) {
										$DOCUMENTOSAPRESENTADOS .= mb_strtoupper($_POST['ccc']).',';
										}
										UPDATE_CAMPO_ID('registro_casamento_novo','DOCUMENTOSAPRESENTADOS',$DOCUMENTOSAPRESENTADOS,$id);

			if (isset($_POST['DATARELIGIOSO']) and $_POST['DATARELIGIOSO']!='') {
							UPDATE_CAMPO_ID('registro_casamento_novo','DATARELIGIOSO',$_POST['DATARELIGIOSO'],$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','NOMEIGREJA',$_POST['NOMEIGREJA'],$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','CIDADEIGREJA',$_POST['CIDADEIGREJA'],$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','CELEBRANTERELIGIOSO',$_POST['CELEBRANTERELIGIOSO'],$id);	
							}
							UPDATE_CAMPO_ID('registro_casamento_novo','DATAEDITAL',$_POST['DATAEDITAL'],$id);
							if ($_POST['DATAHABILITACAO']!='') {
							#UPDATE_CAMPO_ID('registro_casamento_novo','ANDAMENTOPROCESSO','HABILITADO',$id);	
							}
							UPDATE_CAMPO_ID('registro_casamento_novo','DATAHABILITACAO',$_POST['DATAHABILITACAO'],$id);	
							UPDATE_CAMPO_ID('registro_casamento_novo','JUIZPAZ',$_POST['JUIZPAZ'],$id);	
							UPDATE_CAMPO_ID('registro_casamento_novo','LOCALCERIMONIA',$_POST['LOCALCERIMONIA'],$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','DATACASAMENTO',$_POST['DATACASAMENTO'],$id);
							UPDATE_CAMPO_ID('registro_casamento_novo','HORACASAMENTO',$_POST['HORACASAMENTO'],$id);							
	
						
		#$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
		#header('location:../registro-casamento.php?confn=ok&id='.$id);
									header('Location: ' . $_SERVER['HTTP_REFERER']);
		}
#============================================================================================================================================================
 ?>
