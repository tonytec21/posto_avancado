
			<!--DATA DO REGISTRO-->
			<?php if (!empty($dados['DATAENTRADA'])): ?>
				Ao(s) <?=escrevedataextenso($dados['DATAENTRADA'])?>, 
			<?php endif ?>


			<!--NOME SERVENTIA-->

			<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?>
			<span style="text-transform: capitalize;"><?=$w->strRazaoSocial?></span> Estado do Maranhão, <?php endforeach ?>

			<!--DECLARANTE-->

			<?php if ($dados['QUALIDADEDECLARANTE'] == 'PAI'): ?>
				compareceu, <?=$dados['NOMEPAI']?>, pai da criança e abaixo qualificado, apresentando a DNV de numero <?=$dados['DNV']?>, 
				<?php if (!empty($dados['RANI'])): ?>
					RANI de número <?=$dados['RANI']?>, 	
				<?php endif ?>
				e declarou que no dia 


			<?php elseif ($dados['QUALIDADEDECLARANTE'] == 'MAE'): ?>
				compareceu, <?=$dados['NOMEMAE']?>, mãe da criança e abaixo qualificada, apresentando a DNV de numero <?=$dados['DNV']?>, 
				<?php if (!empty($dados['RANI'])): ?>
					RANI de número <?=$dados['RANI']?>, 	
				<?php endif ?>
				e declarou que no dia 


			<?php elseif ($dados['QUALIDADEDECLARANTE'] == 'AMBOSPAI'): ?>
				compareceram os pais do registrado, apresentando a DNV de numero <?=$dados['DNV']?>, 
				<?php if (!empty($dados['RANI'])): ?>
					RANI de número <?=$dados['RANI']?>, 	
				<?php endif ?>
				e declararam que no dia 

			<?php elseif ($dados['QUALIDADEDECLARANTE'] == 'OUTRO'): ?>
				compareceu, 
				<?php if (isset($id_declarante)): ?>
					<?=montaqualificacaotext_id($id_declarante, $dataRegistro,'');?>
				<?php else: ?>
					<?=montaqualificacaocivil($dados,"DECLARANTE", "estadocivil", $dataRegistro);?>
				<?php endif ?>
				
				apresentando a DNV de numero <?=$dados['DNV']?>, 
				<?php if (!empty($dados['RANI'])): ?>
					RANI de número <?=$dados['RANI']?>, 	
				<?php endif ?>
				e declarou que no dia 
			<?php elseif ($dados['QUALIDADEDECLARANTE'] == 'IGNORADO' && !empty($dados['DATASENTENCAMANDATO'])): ?>	
				Recebi por parte da justiça, uma solicitação para registro de nascimento onde consta que, no dia 
			<?php elseif ($dados['TIPOASSENTO'] == 'UNIDADE_INTERLIGADA'): ?>		
			 recebi solicitação para registro através da plataforma de unidade interligada na Central de Registro Civil Nacional (CRC), onde consta a DNV de numero <?=$dados['DNV']?>, e informa que no dia
			<?php endif ?>

			<!--DATA NASCIMENTO-->
			<?=escrevedataextenso($dados['DATANASCIMENTO'])?>,

			<!--HORA E LOCAL -->

			às <?=$dados['HORANASCIMENTO']?> horas, no(a) <?=$dados['LOCALNASCIMENTO']?>, <?=$dados['ENDERECOLOCALNASCIMENTO']?> em municipio de <?=escrevecidadecivil($dados['CIDADENASCIMENTO'])?>, 

			<!--SEXO-->
			nasceu uma criança de sexo 
			<?php if ($dados['SEXONASCIDO'] == 'M'): ?>
				masculino,  
			<?php elseif ($dados['SEXONASCIDO'] == 'F'): ?>
				feminino, 
			<?php else: ?>
				indefinido, 	
			<?php endif ?>


			<!--CPF-->
			<?php if ($dados['NATURALIDADENASCIDO']): ?>
				natural de <?=escrevecidadecivil($dados['NATURALIDADENASCIDO'])?>,  
			<?php endif ?>

			<!--CPF-->
			<?php if ($dados['CPFNASCIDO']): ?>
				CPF de número <?=$dados['CPFNASCIDO']?>, 
			<?php endif ?>

			<!--NOME-->
			que recebeu o nome de 
			<span style="font-weight: bold;"><?=$dados['NOMENASCIDO']?></span>,

			<!--FILIAÇÃO-->

			<?php if ($dados['SEXONASCIDO'] == 'M'): ?>
				filho de
			<?php elseif ($dados['SEXONASCIDO'] == 'F'): ?>
				filha de
			<?php else: ?>
				filho(a)
			<?php endif ?>

			<?php if (!empty($dados['NOMEPAI'])): ?>
				<?php 
				if (isset($id_pai)) {
					if (empty($dados['CPFPAI'])){
						echo montaqualificacaotext_id($id_pai, $dataRegistro,'estadocivil');
						echo " e de ";
					}
					else{
						echo montaqualificacaotext_cpf($dados['CPFPAI'], $dataRegistro,'estadocivil');
						echo " e de ";
					}
				}
				else{
					  echo montaqualificacaocivil($dados,"PAI", "estadocivil", $dataRegistro);
					  echo " e de ";
				}
				?>
			<?php endif ?>

			<?php if (!empty($dados['NOMEMAE'])): ?>
				<?php 
				if (isset($id_mae)) {
					if (empty($dados['CPFMAE'])){
						echo montaqualificacaotext_id($id_mae, $dataRegistro,'estadocivil');
						echo ". ";
					}
					else{
						echo montaqualificacaotext_cpf($dados['CPFMAE'], $dataRegistro,'estadocivil');
						echo ". ";
					}
				}
				else{
					 echo ". ";
					 echo montaqualificacaocivil($dados,"MAE", "estadocivil", $dataRegistro);
				}
				?>
			<?php endif ?>



			<?php if (!empty($dados['NOMEPAISOCIO'])): ?>
				<?php 
				if (empty($dados['CPFPAISOCIO'])){

					echo ', '.montaqualificacaotext_id($id_paisocio, $dataRegistro,'estadocivil');
				}
				else{
					echo ', '.montaqualificacaotext_cpf($dados['CPFPAISOCIO'], $dataRegistro,'estadocivil');
				}
				?>
			<?php endif ?>

			<?php if (!empty($dados['NOMEMAESOCIO'])): ?>
				<?php 
				if (empty($dados['CPFMAESOCIO'])){
					echo ', '.montaqualificacaotext_id($id_maesocio, $dataRegistro,'estadocivil');
				}
				else{
					$dataRegistro = $dados['DATAENTRADA'];
					echo ', '.montaqualificacaotext_cpf($dados['CPFPAIMAESOCIO'], $dataRegistro,'estadocivil');
				}
				?>
			<?php endif ?>
			<!--AVÓS-->
			São avós do registrado:
				<?php
			if (isset($id_pai)):
				if (!empty(buscafiliacaoid($id_pai))): ?>
					<?=buscafiliacaoid($id_pai)?>; 
				<?php endif; ?>
			<?php else: ?>
				<?php if (!empty($dados['AVO1PATERNO'])): ?>
					<?=$dados['AVO1PATERNO']?>
				<?php endif ?>

				<?php if (!empty($dados['AVO2PATERNO'])): ?>
					, <?=$dados['AVO2PATERNO']?>, 
				<?php endif ?>

			<?php endif ?>	
			<?php
			if (isset($id_mae)):
				if (!empty(buscafiliacaoid($id_mae))): ?>
					<?=buscafiliacaoid($id_mae)?>; 
				<?php endif; ?>
			<?php else: ?>
				<?php if (!empty($dados['AVO1MATERNO'])): ?>
					<?=$dados['AVO1MATERNO']?>
				<?php endif ?>

				<?php if (!empty($dados['AVO2MATERNO'])): ?>
					, <?=$dados['AVO2MATERNO']?>, 
				<?php endif ?>

			<?php endif ?>	

			<?php if (!empty($dados['DATASENTENCAMANDATO'])): ?>
				<p style="font-weight:bold; text-align:justify;">Registro Lavrado mediante autorização do Juiz(a) de Direito Dr(a) <?=$dados['JUIZMANDATO']?>, do(a) <?=$dados['VARAMANDATO']?> em <?=date('d/m/Y', strtotime($dados['DATAEXPEDICAOMANDATO']))?> sob nº <?=$dados['NUMEROMANDATO']?>, por sentença datada de <?=date('d/m/Y', strtotime($dados['DATASENTENCAMANDATO']))?>, em conformidade com a lei Nº 6.015, de 31 de dezembro de 1973, com as alterações da lei Nº 6216 de 30/06/1975.</p>
			<?php endif ?>

			<?php if ($dados['TIPOASSENTO'] == 'REGISTROT'): ?>
				<p style="font-weight:bold; text-align:justify;">Observação: Registro Tardio feito conforme Art. 46 e seguintes da Lei 6.015 e Provimento Nº 28 do CNJ - Conselho Nacional de Justiça.</p>
			<?php endif ?>
			<?php if ($dados['TIPOASSENTO'] == 'POSTO'): ?>
				<p style="font-weight:bold; text-align:justify;">Observação: Registro de Nascimento, feito em posto avançado de registro de nascimentos, administrado por esta serventia.</p>
			<?php endif ?>

			<?php if (!empty($dados['NOMETESTEMUNHA1'])): ?>
					São as testemunhas,  
					<?php if (!empty($dados['NOMETESTEMUNHA1'])): ?>
						<?php 
						if (isset($id_TESTEMUNHA1)) {
							if (empty($dados['CPFTESTEMUNHA1'])){
								echo montaqualificacaotext_id($id_TESTEMUNHA1, $dataRegistro,'');
							}
							else{
								echo montaqualificacaotext_cpf($dados['CPFTESTEMUNHA1'], $dataRegistro,'');
							}
						}
						else{
							echo montaqualificacaocivil($dados,"TESTEMUNHA1", "", $dataRegistro);
						}
						echo " e "
						?>
					<?php endif ?>

					<?php if (!empty($dados['NOMETESTEMUNHA2'])): ?>
						<?php 
						if (isset($id_TESTEMUNHA2)) {
							if (empty($dados['CPFTESTEMUNHA2'])){
								echo montaqualificacaotext_id($id_TESTEMUNHA2, $dataRegistro,'');
							}
							else{
								echo montaqualificacaotext_cpf($dados['CPFTESTEMUNHA2'], $dataRegistro,'');
							}
						}
						else{
							echo montaqualificacaocivil($dados,"TESTEMUNHA2", "", $dataRegistro);
						}
						?>
					<?php endif ?>
			<?php endif ?>
			<?php 

			$obs = $pdo->prepare("SELECT * FROM info_registros_civil where id_registro_nascimento = '$id'");
			$obs->execute();
			$lin_obs = $obs->fetchAll(PDO::FETCH_OBJ);
			foreach($lin_obs as $b){if (isset($b->observacoes_registro)) {echo $b->observacoes_registro;}}	
			?>

			Nada mais se declarou. Dou fé, lido e achado conforme assina o declarante, eu <?=str_replace("<br>", ", ", $ass_funcionario)?> digitei subscrevo e assino. 