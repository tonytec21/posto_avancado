<div id="containerselos" style="width: 100%;max-width: 100%;display: flex;flex-wrap: wrap;flex-direction: row;padding-top:5px">

	<?php 
	$selo_break = '';
	$contselo = 1;
	if (isset($_POST['TIPOCERTIDAO']) && $_POST['TIPOCERTIDAO'] == '7'): $contselo++;?>
		<div style="display: inline-flex;width: 45%; max-width: 45%;margin-right:40px; zoom:80%;">
			<div style="display:inline-table;width: 30%;"><?=qrselo($dados['SELO'])?></div>
			<div style="display:inline-table;width: 70%;"><?=textoselo($dados['SELO'])?></div>
		</div>
	<?php endif ?>

	<?php 
	for ($i=1; $i <= $_POST['qtdatos'] ; $i++):?>
		<?php if (isset($_POST['SELO'.$i]) && $contselo <=3): $contselo++; ?>
			<div style="display: inline-flex;width: 45%; max-width: 45%;margin-right:40px; zoom:80%;">
				<div style="display:inline-table;width: 30%;"><?=qrselo($_POST['SELO'.$i])?></div>
				<div style="display:inline-table;width: 70%;"><?=textoselo($_POST['SELO'.$i])?></div>
			</div>
			<?php if ($contselo > 3) {$selo_break .= $_POST['SELO'.$i].';'; } endif;endfor ?>


			<?php 
			$dataav = date('Y-m-d');
			$averbacao = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$livro' and strFolha = '$folha' and strMotivoAverbacao!='0' and nome = '$nome' and dataAverbacao = '$dataav'");
			$averbacao->execute();
			if ($averbacao->rowCount()>0):
				$lin_averbacao = $averbacao->fetchAll(PDO::FETCH_OBJ);
				foreach ($lin_averbacao as $b): 
					if ($contselo > 3) {$selo_break .= $b->strSelo.';';}	
					elseif ($contselo > 3 && $selo_break == '') {$selo_break .= $b->strSelo.';';  }	
					if ($contselo <=3): 
						$contselo ++;
						?>
						<div style="display: inline-flex;width: 45%; max-width: 45%px;margin-right:40px; zoom:80%;">
							<div style="display:inline-table;width: 30%;"><?=qrselo($b->strSelo)?></div>
							<div style="display:inline-table;width: 70%;"><?=textoselo($b->strSelo)?></div>
						</div>		
					<?php endif;UPDATE_CAMPO_ID("averbacoes_civil", "strMotivoAverbacao", "1", $b->ID); endforeach;endif ?>
				</div>


				<?php if (isset($txt_break) && $txt_break!=''): ?>
					<div class="row" id="versofolha" <?php if ($selo_break == ''): ?>
					style="page-break-before: always;"
					<?php endif ?>>
					<div class="placeholder">
						<hr style="border:4px dashed silver;">
						<h4 style="color:silver; text-align: center;">VERSO DA FOLHA</h4>
						<hr style="border:4px dashed silver;">
						<br><br>

					</div>


					<fieldset style="text-align:justify; margin-top: 2cm;"><legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
						<?=$txt_break?>
					</fieldset></div>

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
		<br><br><br>
		<?php if ($selo_break!='' && $txt_break!=''): ?>
			<div id="containerselos2" style="width: 100%;max-width: 100%;display: flex;flex-wrap: wrap;flex-direction: row;padding-top:5px; margin-top:2cm;">
				<br><br><br>
				<?php 

				$selo_break = explode(";" , $selo_break);

				if (is_array($selo_break)) {
					$varcont = count($selo_break);
				}
				else{
					$varcont = 1;
				}

				for ($i=0; $i <=$varcont ; $i++):
					if(isset($selo_break[$i])):	
						?>
						<div style="display: inline-flex;width: 45%; max-width: 45%;margin-right:40px; zoom:80%;">
							<div style="display:inline-table;width: 30%;"><?=qrselo($selo_break[$i])?></div>
							<div style="display:inline-table;width: 70%;"><?=textoselo($selo_break[$i])?></div>
						</div>
					<?php endif; endfor ?>
				</div>
			<?php endif ?>

		</div>

	<?php endif ?>


	<?php if ($selo_break!='' && isset($txt_break) && $txt_break == '' ): ?>
		<div id="containerselos2" style="width: 100%;max-width: 100%;display: flex;flex-wrap: wrap;flex-direction: row;padding-top:5px; margin-top:1cm;page-break-before: always;">
			<?php 

			$selo_break = explode(";" , $selo_break);

			if (is_array($selo_break)) {
				$varcont = count($selo_break);
			}
			else{
				$varcont = 1;
			}

			for ($i=0; $i <=$varcont ; $i++):
				if(isset($selo_break[$i])):	
					?>
					<div style="display: inline-flex;width: 45%; max-width: 45%;margin-right:40px; zoom:80%;">
						<div style="display:inline-table;width: 30%;"><?=qrselo($selo_break[$i])?></div>
						<div style="display:inline-table;width: 70%;"><?=textoselo($selo_break[$i])?></div>
					</div>
				<?php endif; endfor ?>
			</div>
		<?php endif ?>

