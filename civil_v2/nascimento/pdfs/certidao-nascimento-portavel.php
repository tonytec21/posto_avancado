<?php 

$json_dados  = $dados['JSON_DADOS_ADD'];
$json_dados = json_decode($json_dados,true);

if (isset($json_dados['IDPESSOADECLARANTE'])) {$id_declarante = $json_dados['IDPESSOADECLARANTE'];}
$dataRegistro = $dados['DATAENTRADA'];
if (isset($json_dados['IDPESSOAPAI'])) {$id_pai = $json_dados['IDPESSOAPAI'];}
if (isset($json_dados['IDPESSOAMAE'])) {$id_mae = $json_dados['IDPESSOAMAE'];}
if (isset($json_dados['IDPESSOAPAISOCIO'])) {$id_paisocio = $json_dados['IDPESSOAPAISOCIO'];}
if (isset($json_dados['IDPESSOAMAESOCIO'])) {$id_maesocio = $json_dados['IDPESSOAMAESOCIO'];}


?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style type="text/css">


	body{	
		padding-left: 2cm;
		padding-right: 1cm;
	}
	
	@media print{
		#conteudogeralcertidao{
			width: 18.5cm;
			max-width: 18.5cm;
			max-height: 21.5cm;
			padding-top: 3.5cm;
			padding-right: 2cm!important;
			zoom: 60%;
			margin-left: -14%;
		}
		.placeholder{
			display: none;
		}
		#versofolha{
			margin-top: 1cm;
		}
	}
	
	.row{
		width: 100%;
		display: table;
	}
	legend{
		font-size: 8px;
		font-weight: bold;
	}
	fieldset{
		border: 1px solid rgba(0,0,0,.9);
		margin-bottom: 1px;
	}
	.left{
		float: left;
		font-size: 78%!important;
		font-weight: bold;
		padding-left: 2px;
	}
	.right{
		float: right;
		font-size: 78%!important;
		font-weight: bold;
		text-align: center;
		padding-right: 8px;
	}
	table{
		border: none!important;
	}
	tr{
		border: none;
	}
	td{
		border: 1px solid rgba(0, 0, 0, .5)!important;
	}
	th{
		border: 1px solid rgba(0, 0, 0, .5)!important;
	}

</style>
</head>
<body>
	<div id="conteudogeralcertidao">

		<div class="row">	
			<h1 style="text-align: center; margin-bottom: -10px; margin-top: 15px;">C<span style="font-size: 20px;">ERTID&Atilde;O de </span>N<span style="font-size: 20px;">ASCIMENTO</span></h1>
			<h4 style="text-align: center;">Nome:</h4>
			<h3 style="text-align:center; margin-top:-10px"><?=$dados['NOMENASCIDO']?></h3>
		</div>
		<div class="row">
			<fieldset><legend>CPF</legend> <?=verificacampocertidao($dados['CPFNASCIDO'])?></fieldset>
		</div>	
		<div class="row">
			<h4 style="text-align: center;">Matricula:</h4>
			<h3 style="text-align:center"><?=$dados['MATRICULA']?></h3>
		</div>
		<div class="row">
			<fieldset style="width: 70%; max-width: 70%;display: inline-table;"><legend>DATA DE NASCIMENTO POR EXTENSO</legend>
				<?php 
				if (!empty($dados['DATANASCIMENTO'])): 
					escrevedataextenso1($dados['DATANASCIMENTO']);
				else:
					echo '<hr style="border:1px dashed black;">';

				endif?>
			</fieldset>
			<fieldset style="width: 10%; max-width: 5%;display: inline-table;"><legend>DIA</legend><?=date('d', strtotime($dados['DATANASCIMENTO']))?></fieldset>
			<fieldset style="width: 10%; max-width: 5%;display: inline-table;"><legend>MÊS</legend><?=date('m', strtotime($dados['DATANASCIMENTO']))?></fieldset>
			<fieldset style="width: 10%; max-width: 6.82%;display: inline-table;margin-right: -10px;"><legend>ANO</legend><?=date('Y', strtotime($dados['DATANASCIMENTO']))?></fieldset>
		</div>
		<div class="row">
			<fieldset style="width: 70%; max-width: 40%;display: inline-table;"><legend>HORA NASCIMENTO</legend><?=$dados['HORANASCIMENTO']?></fieldset>
			<fieldset style="width: 70%; max-width: 53.5%;display: inline-table;margin-right: -10px;"><legend>NATURALIDADE</legend>
				<?=escrevecidadecivil(intval($dados['NATURALIDADENASCIDO']))?>
			</fieldset>
		</div>

		<div class="row">
			<fieldset style="width: 35%; max-width: 35%;display: inline-table;"><legend>MUNICIPIO REGISTRO UNIDADE DA FEDERAÇÃO</legend>
				<?php $serventia = PESQUISA_ALL_ID('cadastroserventia', '1');foreach($serventia as $serventia){$cidade_serventia = $serventia->intUFcidade;}?>
				<?=escrevecidadecivil(intval($cidade_serventia))?></fieldset>
			<fieldset style="width: 45%; max-width: 45%;display: inline-table;"><legend>LOCAL, MUNICÍPIO DE NASCIMENTO E UF</legend><?=verificacampocertidao($dados['LOCALNASCIMENTO'])?>, <?=escrevecidadecivil(intval($dados['CIDADENASCIMENTO']))?> </fieldset>
			<fieldset style="width: 10.1%; max-width: 10.1%;display: inline-table;margin-right: -10px;"><legend>SEXO</legend><?=setsexo($dados['SEXONASCIDO'])?></fieldset>
		</div>
		<div class="row"><fieldset><legend>FILIAÇÃO</legend>
			<?php
			if (!empty($dados['NOMEPAI'])) {
			if (isset($id_pai)) {	
				if (!empty($dados['CPFPAI'])) {
					echo montaqualificacaoresumidatext_cpf($dados['CPFPAI'], $dados['DATAENTRADA'], "");
					echo "; ";
				}
				else{
					echo montaqualificacaoresumidatext_id($id_pai, $dados['DATAENTRADA'], "");
					echo "; ";
				}
			}
			else{
				echo montaqualificacaoresumidatext_civil($dados, $dados['DATAENTRADA'], "", "PAI");
				echo "; ";
			}	
			}  

			if (!empty($dados['NOMEMAE'])) {
			if (isset($id_mae)) {	
				if (!empty($dados['CPFMAE'])) {
					echo montaqualificacaoresumidatext_cpf($dados['CPFMAE'], $dados['DATAENTRADA'], "");
					echo "; ";
				}
				else{
					echo montaqualificacaoresumidatext_id($id_mae, $dados['DATAENTRADA'], "");
					echo "; ";
				}
			}
			else{
				echo montaqualificacaoresumidatext_civil($dados, $dados['DATAENTRADA'], "", "MAE");
				echo "; ";
			}	
			}  

			if (!empty($dados['NOMEPAISOCIO'])) {
				if (!empty($dados['CPFPAISOCIO'])) {
					echo " ; ";
					echo montaqualificacaoresumidatext_cpf($dados['CPFPAISOCIO'], $dados['DATAENTRADA'], "");
					echo "; ";
				}
				else{
					echo montaqualificacaoresumidatext_id($id_paisocio, $dados['DATAENTRADA'], "");
					echo "; ";
				}
			} 


			if (!empty($dados['NOMEMAESOCIO'])) {
				if (!empty($dados['CPFMAESOCIO'])) {
					echo " ; ";
					echo montaqualificacaoresumidatext_cpf($dados['CPFMAESOCIO'], $dados['DATAENTRADA'], "");
					echo "; ";
				}
				else{
					echo montaqualificacaoresumidatext_id($id_maesocio, $dados['DATAENTRADA'], "");
					echo "; ";
				}
			} 



			?>

		</fieldset></div>
		<div class="row"><fieldset><legend>AVÓS</legend>
			<?php
			if (isset($id_pai)) {
			if (!empty($dados['NOMEPAI'])) {echo buscafiliacaoid($id_pai); echo "; ";} 
			}

			else{
				if (!empty($dados['AVO1PATERNO'])) {
					echo $dados['AVO1PATERNO'];
					echo ", ";
				}

				if (!empty($dados['AVO2PATERNO'])) {
					 echo $dados['AVO2PATERNO']."; ";
				}
			}

			if(isset($id_mae)){
				if (!empty($dados['NOMEMAE'])) {echo buscafiliacaoid($id_mae);}
			}

			else{
				if (!empty($dados['AVO1MATERNO'])) {
					echo $dados['AVO1MATERNO'];
					echo ", ";
				}

				if (!empty($dados['AVO2MATERNO'])) {
					 echo $dados['AVO2MATERNO'].";";
				}
			}

			if (!empty($dados['NOMEPAISOCIO'])) {echo " ; ";echo buscafiliacaoid($id_paisocio);} 
			if (!empty($dados['NOMEMAESOCIO'])) {echo " ; ";echo buscafiliacaoid($id_maesocio);} 
			?>
		</fieldset></div>
		<div class="row">
			<fieldset style="width: 10%; max-width: 10%;display: inline-table;"><legend>GEMEOS</legend>
				<?php if ($dados['GEMEOS'] == 'S'): ?>
					SIM 
				<?php else: ?>
					NÃO
				<?php endif ?>
			</fieldset>
			<fieldset style="width: 83.5%; max-width: 83.5%;display: inline-table;margin-right: -10px;"><legend>NOME E MATRÍCULA GEMEOS</legend>
				<?php if ($dados['GEMEOS'] == 'S'): echo $dados['NOMEMATRICULAGEMEOS']; else: echo '<hr style="border:1px dashed black;">'; endif?> </fieldset>
			</div>
			<div class="row">

				<fieldset style="width: 53.5%; max-width: 53.5%;display: inline-table;"><legend>DATA DO REGISTRO POR EXTENSO</legend>
					<?php 
					if (!empty($dados['DATAENTRADA'])): 
						escrevedataextenso1($dados['DATAENTRADA']);
					else:
						echo '<hr style="border:1px dashed black;">';

						endif?></fieldset>
						<fieldset style="width: 40%; max-width: 40%;display: inline-table;margin-right: -10px;"><legend>NÚMERO DA DNV DECLARAÇÃO DE NASCIDO VIVO</legend>
							<?php if (!empty($dados['DNV'])) {echo $dados['DNV'];} else{echo '<hr style="border:1px dashed black;">';}?>
						</fieldset>
					</div>
					<div class="row">

					<fieldset style="text-align:justify;"><legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
						<?php 
						$livro = $dados['LIVRONASCIMENTO'];
						$folha = $dados['FOLHANASCIMENTO'];
						$nome = $dados['NOMENASCIDO'];
						$id_nascimento = $dados['ID'];
						$averbacao = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$livro' and strFolha = '$folha' and setRegistroInvisivel!='S' and nome = '$nome'");
						$averbacao->execute();


						$anotacao = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$livro' and FOLHA = '$folha' and EXIBIR ='S'");
						$anotacao->execute();

						$obs = $pdo->prepare("SELECT * FROM info_registros_civil where id_registro_nascimento = '$id_nascimento' and obs_visivel_certidao!='N'");
						$obs->execute();
						


						if ($averbacao->rowCount()<1 && $anotacao->rowCount()<1 && $obs->rowCount()<1) {
							echo '<hr style="border:1px dashed black;">'; 
						}
						else{
							$lin_averbacao = $averbacao->fetchAll(PDO::FETCH_OBJ);
							$lin_anotacao = $anotacao->fetchAll(PDO::FETCH_OBJ);
							$lin_obs = $obs->fetchAll(PDO::FETCH_OBJ);
							$txt_break = '';$cont_av = 0;


							foreach($lin_averbacao as $b){
								$cont_av++;
								if ($cont_av <= 2) {
									if (isset($b->strAverbacao)) {echo strip_tags($b->strAverbacao);}
									if (!empty($b->strSelo) && $b->strSelo!='') {
										echo "SELO DE VALIDAÇÃO: ".$b->strSelo.'<br>';
									}
								}	
								else{
									if (isset($b->strAverbacao)) {$txt_break .= $b->strAverbacao;}
								}

							}	

							foreach($lin_anotacao as $b){
								$cont_av++;
								if ($cont_av <= 2) {
									if (isset($b->ANOTACAO)) {echo $b->ANOTACAO;}
								}	
								else{
									if (isset($b->ANOTACAO)) {$txt_break .= $b->ANOTACAO;}
								}

							}

							foreach($lin_obs as $b){
								$cont_av++;
								if ($cont_av <= 2) {
									if (isset($b->observacoes_registro)) {echo $b->observacoes_registro;}
								}	
								else{
									if (isset($b->observacoes_registro)) {$txt_break .= $b->observacoes_registro;}
								}

							}	
						}


						if (isset($txt_break) && $txt_break!='') {
						echo "EXISTEM AVERBAÇÕES NO VERSO DESTA CERTIDÃO.";
						}

						avinvisivel($id, $livro, $folha, $nome, 'nas');
						?>
						

					</fieldset></div>
					<div class="row"><fieldset><legend>ANOTAÇÕES DE CADASTRO</legend>
						<table style="max-width:100%;">
							<thead align="center">
								<tr>
									<th style="border-left: none">TIPO DOCUMENTO</th>
									<th width="20%">NÚMERO</th>
									<th width="20%">DATA EXPEDIÇÃO</th>
									<th width="20%">ÓRGÃO EMISSOR</th>
									<th width="20%">DATA DE VALIDADE</th>
								</tr>
							</thead>
							<tbody>

								<tr style="">
									<td style="border-left: none">RG</td>
									<td><?=verificacampocertidao($dados['strNumeroRg'])?></td>
									<td><?=verificacampocertidao($dados['dataExpRg'])?></td>
									<td><?=verificacampocertidao($dados['OrgaoExpRg'])?></td>
									<td><?=verificacampocertidao($dados['dataValidadeRg'])?></td>
								</tr>


								<tr>
									<td style="border-left: none">PIS/NIS</td>
									<td><?=verificacampocertidao($dados['strNumeroPisNis'])?></td>
									<td><?=verificacampocertidao($dados['dataExpPisNis'])?></td>
									<td><?=verificacampocertidao($dados['OrgaoExpPisNis'])?></td>
									<td><?=verificacampocertidao($dados['dataValidadePisNis'])?></td>
								</tr>

								<tr>
									<td style="border-left: none">PASSAPORTE</td>
									<td><?=verificacampocertidao($dados['strNumeroPassaporte'])?></td>
									<td><?=verificacampocertidao($dados['dataExpPassaporte'])?></td>
									<td><?=verificacampocertidao($dados['OrgaoExpPassaporte'])?></td>
									<td><?=verificacampocertidao($dados['dataValidadePassaporte'])?></td>
								</tr>

								<tr>
									<td style="border-left: none">CARTÃO NACIONAL DE SAÚDE</td>
									<td><?=verificacampocertidao($dados['strNumeroCartSaude'])?></td>
									<td><?=verificacampocertidao($dados['dataExpCartSaude'])?></td>
									<td><?=verificacampocertidao($dados['OrgaoExpCartSaude'])?></td>
									<td><?=verificacampocertidao($dados['dataValidadeCartSaude'])?></td>
								</tr>


								<tr style="">
									<td style="border-left: none">TÍTULO DE ELEITOR</td>
									<td><?=verificacampocertidao($dados['strNumeroTituloEleitor'])?></td>
									<td><?=verificacampocertidao($dados['dataExpTituloEleitor'])?></td>
									<td><?=verificacampocertidao($dados['OrgaoExpTituloEleitor'])?></td>
									<td><?=verificacampocertidao($dados['dataValidadeTituloEleitor'])?></td>
								</tr>

							</tr>

						</tbody>

					</table>

				</fieldset>
			</div>
			<br>
			<div class="row">
				<!-- Rodapé -->
				<div class="left">

					<!-- Informações da Serventia -->
					<?php $serv = PESQUISA_ALL('cadastroserventia');
					foreach ($serv as $serv): ?>  

						<!-- Razão Social -->
						<?=mb_strtoupper($serv->strRazaoSocial)?>
						<br>

						<!-- Títular da Serventia -->
						<?=mb_convert_case($serv->strTituloServentia, MB_CASE_UPPER, "UTF-8")?>
						<br>

						<!-- Endereço Serventia -->
						<?=mb_convert_case($serv->strLogradouro, MB_CASE_TITLE, "UTF-8").", Nº ".$serv->strNumero.", ".mb_convert_case($serv->strBairro, MB_CASE_TITLE, "UTF-8")?>
						<br>

						<!-- Cidade Serventia -->
						<?php  $c = PESQUISA_ALL_ID('uf_cidade',$serv->intUFcidade); foreach($c as $c):?>
						<?=mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf?>
					<?php endforeach ?>
					<br>

					<!-- Telefone Serventia -->
					<?="Telefone: ".mb_strtolower($serv->strTelefone1)?>
					<br>

					<!-- E-mail Serventia -->          
					<?="E-mail: ".mb_strtolower($serv->strEmail)?>
				<?php endforeach ?> 
			</div>

			<div class="right">
				O conteúdo da certidão é verdadeiro. Dou Fé <br>

				<!-- CIDADE DA SERVENTIA -->  
				<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
				$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade); foreach ($u as $u):?> 
				<?=mb_convert_case($u->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>

				<!-- DATA DA CERTIDÃO -->
				<?php
				$data = date('Y-m-d') ;
				$novaDataRegistro = explode("-", $data);
				echo $novaDataRegistro[2];
				if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
					echo " de janeiro de ";
				}elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
					echo " de fevereiro de ";
				} elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
					echo " de março de ";
				} elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
					echo " de abril de ";
				} elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
					echo " de maio de ";
				} elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
					echo " de junho de ";
				} elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
					echo " de julho de ";
				} elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
					echo " de agosto de ";
				} elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
					echo " de setembro de ";
				} elseif ($novaDataRegistro[1] == '10') {
					echo " de outubro de";
				} elseif ($novaDataRegistro[1] == '11') {
					echo " de novembro de ";
				} elseif ($novaDataRegistro[1] == '12') {
					echo " de dezembro de ";
				} else {
					echo "Não definido";
				}

				echo $novaDataRegistro[0];

			?>. 
		<?php endforeach; endforeach ?>
		<br><br><br>

		<!-- ASSINATURA - ESCREVENTE -->
		____________________________________________ <br>
		<?=mb_strtoupper($ass_funcionario)?>
	</div>
</div>

<?php include('selo-verso-certidao.php'); ?>

</div>
</body>
</html>