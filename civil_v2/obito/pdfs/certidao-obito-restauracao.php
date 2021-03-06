<?php 

$json_dados  = $dados['JSON_DADOS_ADD'];
$json_dados = json_decode($json_dados,true);

if (isset($json_dados['IDPESSOADECLARANTE'])) {$id_declarante = $json_dados['IDPESSOADECLARANTE'];}
$dataRegistro = $dados['DATAENTRADA'];
if(isset($json_dados['IDPESSOA'])){$id_pessoa = $json_dados['IDPESSOA'];}
if(isset($json_dados['IDPESSOAPAI'])){$id_pai = $json_dados['IDPESSOAPAI'];}
if(isset($json_dados['IDPESSOAMAE'])){$id_mae = $json_dados['IDPESSOAMAE'];}
if (isset($json_dados['IDPESSOAPAISOCIO'])) {$id_paisocio = $json_dados['IDPESSOAPAISOCIO'];}
if (isset($json_dados['IDPESSOAMAESOCIO'])) {$id_maesocio = $json_dados['IDPESSOAMAESOCIO'];}

$ass_funcionario = mb_strtoupper($_SESSION['nome']).'<br>'.mb_strtoupper($_SESSION['funcao']);
if (isset($_GET['nomeassinatura'])) {
	$ass_funcionario = str_replace("/","<br>",$_GET['nomeassinatura']);
}

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
			width: 18.1cm;
			max-width: 18.1cm;
			max-height: 21.5cm;
			padding-top: 3.5cm;
			padding-right: 2cm!important;
		}
		#imgfuncaoqr{
			width: 85px!important;
			margin-top: 2px!important;
		}
		.placeholder{
			display: none;
		}
		#versofolha{
			margin-top: 1cm;
		}
		#tableselos{
			zoom: 80%;
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
			<h1 style="text-align: center; margin-bottom: -10px; margin-top: 15px;">C<span style="font-size: 20px;">ERTID&Atilde;O de </span>??<span style="font-size: 20px;">BITO</span></h1>
			<h4 style="text-align: center;">Nome:</h4>
			<h3 style="text-align:center; margin-top:-10px"><?=$dados['NOME']?></h3>
		</div>
		<div class="row">
			<fieldset><legend>CPF</legend> <?=verificacampocertidao($dados['CPF'])?></fieldset>
		</div>	
		<div class="row">
			<h4 style="text-align: center;">Matricula:</h4>
			<h3 style="text-align:center"><?=$dados['MATRICULA']?></h3>
		</div>

		<?php 
		$array = explode(",",montaqualificacaocivil($dados,"", "", $dataRegistro));
		?>

		<div class="row">
			<fieldset style="width: 20%; max-width: 20%;display: inline-table;"><legend>SEXO</legend>
				<?php if (isset($id_pessoa)): ?>
			 	<?=mb_strtolower(retornasexo($id_pessoa))?>
			 	<?php else: ?>
			 		<?php if ($dados['SEXO'] == 'M'): ?>
			 			MASCULINO
			 		<?php elseif ($dados['SEXO'] == 'F'): ?>
			 			FEMININO
			 		<?php else: ?>
			 			INDEFINIDO
			 		<?php endif ?>
			 <?php endif ?> 
			</fieldset>
			<fieldset style="width: 20%; max-width: 20%;display: inline-table;"><legend>COR</legend><?=verificacampocertidao(retornacorpele($dados['COR']))?></fieldset>
			<fieldset style="width: 60%; max-width: 50%;display: inline-table;margin-right: -50px;"><legend>ESTADO CIVIL E IDADE</legend><?=verificacampocertidao(mb_strtoupper($array[7]))?>, <?=verificacampocertidao(mb_strtoupper($array[12]))?></fieldset>
		</div>

		<div class="row">
			<fieldset style="width: 60%; max-width: 40.3%;display: inline-table;"><legend>NATURALIDADE</legend><?=verificacampocertidao(mb_strtoupper($array[5]))?></fieldset>
			<fieldset style="width: 60%; max-width: 40.3%;display: inline-table;"><legend>DOCUMENTO DE INDENTIFICA????O</legend><?=verificacampocertidao(mb_strtoupper($array[2]))?></fieldset>
			<fieldset style="width: 60%; max-width: 9.6%;display: inline-table;margin-right: -50px;"><legend>ELEITOR</legend>
				<?php if ($dados['ELEITOR'] =='S'): ?>
					SIM 
				<?php else: ?>
					N??O
				<?php endif ?>
			</fieldset>
		</div>
		<div class="row">
			<fieldset><legend>FILIA????O E RESID??NCIA</legend> <?=verificacampocertidao(mb_strtoupper($array[7]).mb_strtoupper($array[8]).mb_strtoupper($array[9]))?> <br>
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
				<?=$dados['NOMEPAI']?> e de 
			<?php endif ?>

			<?php if (!empty($dados['NOMEMAE'])): ?>
				<?=$dados['NOMEMAE']?>
			<?php endif ?>

			</fieldset>
		</div>
		<div class="row">
			<fieldset style="width: 70%; max-width: 70%;display: inline-table;"><legend>DATA E HORA DE FALECIMENTO</legend>
				<?php 
				if (!empty($dados['DATAOBITO'])): 
					escrevedataextenso1($dados['DATAOBITO']);
				else:
					echo '<hr style="border:1px dashed black;">';

				endif?>
			</fieldset>
			<fieldset style="width: 10%; max-width: 5%;display: inline-table;"><legend>DIA</legend><?=date('d', strtotime($dados['DATAOBITO']))?></fieldset>
			<fieldset style="width: 10%; max-width: 5%;display: inline-table;"><legend>M??S</legend><?=date('m', strtotime($dados['DATAOBITO']))?></fieldset>
			<fieldset style="width: 10%; max-width: 6.82%;display: inline-table;margin-right: -10px;"><legend>ANO</legend><?=date('Y', strtotime($dados['DATAOBITO']))?></fieldset>
		</div>
		<div class="row">
			<fieldset><legend>LOCAL DE FALECIMENTO</legend>
				<?=verificacampocertidao($dados['LOCALMORTE'])?>
				<?=verificacampocertidao($dados['ENDERECOOBITO'])?>
				<?=escrevecidadecivil($dados['CIDADEOBITO'])?>
			</fieldset>
		</div>

		<div class="row">
			<fieldset><legend>CAUSA DA MORTE</legend>
				<?=verificacampocertidao($dados['CAUSAOBITO'])?>
			</fieldset>
		</div>

		<div class="row">
			<fieldset style="width: 60%; max-width: 50.3%;display: inline-table;"><legend>SEPULTAMENTO/CREMA????O (MUNIC??PIO E CEMIT??RIO SE CONHECIDO)</legend><?=verificacampocertidao($dados['LOCALSEPULTAMENTO'])?></fieldset>
			<fieldset style="width: 60%; max-width: 43.1%;display: inline-table;margin-right: -50px;"><legend>DECLARANTE</legend><?=verificacampocertidao($dados['NOMEDECLARANTE'])?></fieldset>
		</div>

		<div class="row">
			<fieldset><legend>NOME E N??MERO DO DOCUMENTO DO M??DICO QUE ATESTOU O ??BITO</legend>
				<?=verificacampocertidao($dados['MEDICO'])?>, <?=verificacampocertidao($dados['CRM'])?>
			</fieldset>
		</div>
		<div class="row">

			<fieldset style="text-align:justify;"><legend>AVERBA????ES/ANOTA????ES A ACRESCER</legend>
				<?php 
				$livro = $dados['LIVROOBITO'];
				$folha = $dados['FOLHAOBITO'];
				$nome = $dados['NOME'];
				$id_obito = $dados['ID'];
				$averbacao = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$livro' and strFolha = '$folha' and setRegistroInvisivel!='S' and strTipo = 'OB' and nome = '$nome'");
				$averbacao->execute();


				$anotacao = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$livro' and FOLHA = '$folha' and EXIBIR ='S' AND TIPO = 'OB'");
				$anotacao->execute();

				$obs = $pdo->prepare("SELECT * FROM info_registros_civil where id_registro_obito = '$id_obito' and obs_visivel_certidao!='N'");
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
						if ($cont_av < 2) {
							if (isset($b->strAverbacao)) {echo strip_tags($b->strAverbacao);}
							if (!empty($b->strSelo) && $b->strSelo!='') {
								echo "SELO DE VALIDA????O: ".$b->strSelo.'<br>';
							}
						}	
						else{
							echo "EXISTEM AVERBA????ES NO VERSO DESTA CERTID??O.";
							if (isset($b->strAverbacao)) {$txt_break .= $b->strAverbacao;}
						}

					}	

					foreach($lin_anotacao as $b){
						$cont_av++;
						if ($cont_av < 2) {
							if (isset($b->ANOTACAO)) {echo $b->ANOTACAO;}
						}	
						else{
							echo "EXISTEM ANOTA????ES NO VERSO DESTA CERTID??O.";
							if (isset($b->ANOTACAO)) {$txt_break .= $b->ANOTACAO;}
						}

					}

					foreach($lin_obs as $b){
						$cont_av++;
						if ($cont_av < 2) {
							if (isset($b->observacoes_registro)) {echo $b->observacoes_registro;}
						}	
						else{
							echo "EXISTEM ANOTA????ES NO VERSO DESTA CERTID??O.";
							if (isset($b->observacoes_registro)) {$txt_break .= $b->observacoes_registro;}
						}

					}	
				}
				avinvisivel($id, $livro, $folha, $nome, 'nas');
				?>
				

			</fieldset></div>
			<div class="row"><fieldset><legend>ANOTA????ES DE CADASTRO</legend>
				<table style="max-width:100%;">
					<thead align="center">
						<tr>
							<th style="border-left: none">TIPO DOCUMENTO</th>
							<th width="20%">N??MERO</th>
							<th width="20%">DATA EXPEDI????O</th>
							<th width="20%">??RG??O EMISSOR</th>
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
							<td><?=verificacampocertidao($dados['strPisNis'])?></td>
							<td><?=verificacampocertidao($dados['dataExpPisNis'])?></td>
							<td><?=verificacampocertidao($dados['OrgaoExpPisNis'])?></td>
							<td><?=verificacampocertidao($dados['dataValidadePisNis'])?></td>
						</tr>

						<tr>
							<td style="border-left: none">PASSAPORTE</td>
							<td><?=verificacampocertidao($dados['strPassaporte'])?></td>
							<td><?=verificacampocertidao($dados['dataExpPassaporte'])?></td>
							<td><?=verificacampocertidao($dados['OrgaoExpPassaporte'])?></td>
							<td><?=verificacampocertidao($dados['dataValidadePassaporte'])?></td>
						</tr>

						<tr>
							<td style="border-left: none">CART??O NACIONAL DE SA??DE</td>
							<td><?=verificacampocertidao($dados['strCartSaude'])?></td>
							<td><?=verificacampocertidao($dados['dataExpCartSaude'])?></td>
							<td><?=verificacampocertidao($dados['OrgaoExpCartSaude'])?></td>
							<td><?=verificacampocertidao($dados['dataValidadeCartSaude'])?></td>
						</tr>


						<tr style="">
							<td style="border-left: none">T??TULO DE ELEITOR</td>
							<td><?=verificacampocertidao($dados['strTituloEleitor'])?></td>
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

		<!-- Rodap?? -->
		<div class="left">

			<!-- Informa????es da Serventia -->
			<?php $serv = PESQUISA_ALL('cadastroserventia');
			foreach ($serv as $serv): ?>  

				<!-- Raz??o Social -->
				<?=mb_strtoupper($serv->strRazaoSocial)?>
				<br>

				<!-- T??tular da Serventia -->
				<?=mb_convert_case($serv->strTituloServentia, MB_CASE_UPPER, "UTF-8")?>
				<br>

				<!-- Endere??o Serventia -->
				<?=mb_convert_case($serv->strLogradouro, MB_CASE_TITLE, "UTF-8").", N?? ".$serv->strNumero.", ".mb_convert_case($serv->strBairro, MB_CASE_TITLE, "UTF-8")?>
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
		O conte??do da certid??o ?? verdadeiro. Dou F?? <br>

		<!-- CIDADE DA SERVENTIA -->  
		<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
		$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade); foreach ($u as $u):?> 
		<?=mb_convert_case($u->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>

		<!-- DATA DA CERTID??O -->
		<?php
		$data = date('Y-m-d') ;
		$novaDataRegistro = explode("-", $data);
		echo $novaDataRegistro[2];
		if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
			echo " de janeiro de ";
		}elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
			echo " de fevereiro de ";
		} elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
			echo " de mar??o de ";
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
			echo "N??o definido";
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

<?php endif ?>


</div>
</body>
</html>