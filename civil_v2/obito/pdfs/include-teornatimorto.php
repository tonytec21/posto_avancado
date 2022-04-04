
			<!--DATA DO REGISTRO-->
			<?php if (!empty($dados['DATAENTRADA'])): ?>
				Ao(s) <?=escrevedataextenso($dados['DATAENTRADA'])?>, 
			<?php endif ?>


			<!--NOME SERVENTIA-->

			<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?>
			<span style="text-transform: capitalize;"><?=$w->strRazaoSocial?></span> Estado do Maranhão, <?php endforeach ?>

			<!--DECLARANTE-->


			<?php if (!empty($dados['NOMEDECLARANTE'])): ?>
				compareceu, na qualidade de <?=$dados['QUALIDADEDECLARANTE']?> do Falecido(a), 
				<?php if (isset($id_declarante)): ?>
					<?=montaqualificacaotext_id($id_declarante, $dataRegistro,'');?>
				<?php else: ?>
					<?=montaqualificacaocivil($dados,"DECLARANTE", "", $dataRegistro);?>
				<?php endif ?>
				apresentando a Declaração de óbito de numero <?=$dados['NDO']?>, firmada por  <?=$dados['MEDICO']?>, CRM Nº <?=$dados['CRM']?>, que apresenta como causa(s) da morte, <?=$dados['CAUSAOBITO']?>, 
				<?php if ($dados['TIPOMORTE'] == 'NAT'): ?>
					sendo a morte por motivo natural, 
				<?php else: ?>
					sendo a morte por motivo violento,
				<?php endif ?>
			<?php endif ?>
			registra-se que no dia

			<!--DATA NASCIMENTO-->
			<?=escrevedataextenso($dados['DATAOBITO'])?>,

			<!--HORA E LOCAL -->

			às <?=$dados['HORAOBITO']?> horas, no(a) <?=$dados['LOCALMORTE']?>, <?=$dados['ENDERECOOBITO']?> em municipio de <?=escrevecidadecivil($dados['CIDADEOBITO'])?>, 

			<!--SEXO-->
			com <?=$dados['TEMPOINTRAUTERINA']?> semanas de vida intrauterina
			nasceu morta uma criança de sexo 
			<?php if (isset($id_pessoa)): ?>
			 	<?=mb_strtolower(retornasexo($id_pessoa))?>
			 	<?php else: ?>
			 		<?php if ($dados['SEXO'] == 'M'): ?>
			 			masculino 
			 		<?php elseif ($dados['SEXO'] == 'F'): ?>
			 			feminino
			 		<?php else: ?>
			 			indefinido
			 		<?php endif ?>
			 <?php endif ?> 

			<!--NOME-->
			com o nome de 
			<?php if (!empty($dados['NOME'])): ?>
				<?php 
				if (isset($id_pessoa)) {
					if (empty($dados['CPF'])){
						echo montaqualificacaotext_id($id_pessoa, $dados['DATAOBITO'],'');
						echo " e de ";
					}
					else{
						echo montaqualificacaotext_cpf($dados['CPF'], $dados['DATAOBITO'],'');
						echo " e de ";
					}
				}
				else{
					  echo montaqualificacaocivil($dados,"", "", $dados['DATAOBITO']);
				}
				?>
			<?php endif ?>

			<!--FILIAÇÃO-->

			<?php if (isset($id_pessoa)): ?>
				<?php if (retornasexo($id_pessoa) == 'MASCULINO'): ?>
					filho de
				<?php elseif (retornasexo($id_pessoa) == 'FEMININO'): ?>
					filha de
				<?php else: ?>
					filho(a)
				<?php endif ?>
			<?php else: ?>
				<?php if ($dados['SEXO'] == 'M'): ?>
					filho de
				<?php elseif ($dados['SEXO'] == 'F'): ?>
					filha de
				<?php else: ?>
					filho(a)
				<?php endif ?>

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
						echo " e de ";
					}
					else{
						echo montaqualificacaotext_cpf($dados['CPFMAE'], $dataRegistro,'estadocivil');
						echo " e de ";
					}
				}
				else{
					 echo " e de ";
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
			<?php if (!empty($dados['LOCALSEPULTAMENTO'])): ?>
					O local do sepultamento será o(a) <?=$dados['LOCALSEPULTAMENTO']?>.
				<?php endif ?>

				<!--DEMAIS QUALIFICAÇÕES-->

				<!-- Gemeo -->
				<?php if ($dados['GEMEO']!='' && $dados['GEMEO'] == 'S'): ?>
				O falecido(a) possui irmão gemeo,
				<?php endif ?>
				<!-- Documentos apresentados -->
				<?php if (isset($dados['NOME'])): ?>
				<?="O declarante apresentou os seguintes documentos do falecido(a),"?>
				<?php if (isset($dados['NOME']) & !empty($dados['RG'])): ?>
				<?="RG nº ".$dados['RG']?> <?=$dados['ORGAOEMISSOR'].","?>
				<?php endif; ?>
				<?php if (isset($dados['NOME']) && !empty($dados['CPF'])): ?>
				<?="CPF nº ".$dados['CPF'].","?>
				<?php endif; ?>
				<?php if (isset($dados['NOME']) && !empty($dados['NDO'])): ?>
				<?="DO nº ".$dados['NDO'].","?>
				<?php endif; ?>
				<?php if ($dados['strTituloEleitor']!=''): ?>
				<?="Titulo de Eleitor nº ".$dados['strTituloEleitor'].","?>
				<?php endif; ?>
				<?php if ($dados['strCtps']!=''): ?>
				<?="CTPS nº ".$dados['strCtps'].","?>
				<?php endif; ?>
				<?php if ($dados['strPassaporte']!=''): ?>
				<?="Passaporte nº ".$dados['strPassaporte'].","?>
				<?php endif; ?>
				<?php if ($dados['strPisNis']!=''): ?>
				<?="PIS/NIS: nº ".$dados['strPisNis'].","?>
				<?php endif; ?>
				<?php if ($dados['strCartSaude']!=''): ?>
				<?="Cartão Saúde: nº ".$dados['strCartSaude'].","?>
				<?php endif; ?>
				<?php endif; ?>

				<!-- Dos Bens -->
				<?php if ($dados['DEIXOUBENS'] == 'S'): ?>
				deixou bens, com testamento Conhecido, 
				<?php elseif ($dados['DEIXOUBENS'] == 'S2'): ?>
				deixou bens, sem testamento Conhecido,
				<?php elseif ($dados['DEIXOUBENS'] == 'N'): ?>
				não deixou bens, Com testamento conhecido,	
				<?php else: ?>
				não deixou bens, sem testamento conhecido,	
				<?php endif ?> 

				<!-- Eleitor -->
				<?php if ($dados['ELEITOR'] == 'S'): ?>
				era eleitor,
				<?php else: ?>
				não sendo eleitor,	
				<?php endif ?>

				<!-- Dos Filhos -->
				<?php if ($dados['DEIXOUFILHOS'] == 'S'): ?>
				deixou filhos(as), sendo eles: <?=($dados['NOMEFILHOS'])?>.
				<?php else: ?>
				não deixou nenhum filho(a).
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
			<?php if (!empty($dados['DATASENTENCAMANDATO'])): ?>
				<p style="font-weight:bold; text-align:justify;">Registro Lavrado mediante autorização do Juiz(a) de Direito Dr(a) <?=$dados['JUIZMANDATO']?>, do(a) <?=$dados['VARAMANDATO']?> em <?=date('d/m/Y', strtotime($dados['DATAEXPEDICAOMANDATO']))?> sob nº <?=$dados['NUMEROMANDATO']?>, por sentença datada de <?=date('d/m/Y', strtotime($dados['DATASENTENCAMANDATO']))?>, em conformidade com a lei Nº 6.015, de 31 de dezembro de 1973, com as alterações da lei Nº 6216 de 30/06/1975.</p>
			<?php endif ?>

			Nada mais se declarou. Dou fé, lido e achado conforme assina o declarante, eu <?=str_replace("<br>", ", ", $ass_funcionario)?> digitei subscrevo e assino. 