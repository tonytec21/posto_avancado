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
			padding-top: 4cm;
			padding-right: 1.5cm!important;
			font-size: 120%;
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
		 <h2 style="text-align: center;">CERTIDÃO DE <span style="border: 1px solid black"><span style="color: #fff">.</span>INTEIRO TEOR<span style="color: #fff">.</span></h2></span>
		 </div>

	<div class="row">	 
      <p style="text-align: center;font-size: 15px;font-family: Arial">
      <div style="text-align: center;font-size: 12px;font-family: Arial; text-align: center;">NOME: <div style="text-align: center;font-size: 18px;font-family: Arial"><b><?=$dados['NOME']?></b></p>
      </div>
      <div class="row" style="text-align:center">MATRÍCULA <div style="text-align: center;font-size: 15px;font-family: Arial"><b><?=$dados['MATRICULA']?></b></div></div>
      
    
      <br>
      <fieldset style="text-align:justify">
      	<legend>DESCRIÇÃO:</legend>
      <!-- CABEÇALHO -->
      <div style="text-align: justify;">
      Certifico que revendo os livros de Obito, deste ofício, requerido verbalmente por parte interessada,
      encontrei no livro <?php if ($dados['TIPOLIVRO'] == '4'): ?>
										C
									<?php else: ?>
										C AUXILIAR 
									<?php endif ?>
									 <?=$dados['LIVROOBITO']?>, folha <?=$dados['FOLHAOBITO']?>, sob o número
      <?=$dados['TERMOOBITO']?>, o registro cujo teor segue: 
      </div>
      <?php 
		$busca_registro_add = $pdo->prepare("SELECT * from info_registros_civil where id_registro_obito = '$id'");
		$busca_registro_add->execute();
		if ($busca_registro_add->rowCount()>0) :
		$bra = $busca_registro_add->fetchAll(PDO::FETCH_OBJ);
		foreach ($bra as $b) {
			echo addslashes($b->inteiro_teor);
		}
		
		
		else:

       ?>

       <?php if ($dados['TIPOLIVRO'] == '4'): ?>
       	<?php include('include-teorobito.php'); ?>
       <?php else: ?>	
       	<?php include('include-teornatimorto.php'); ?>
       <?php endif ?>
       <?php endif ?>
		</fieldset>

					<fieldset style="text-align:justify;"><legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
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

					foreach($lin_obs as $b){
						$cont_av++;
						if ($cont_av < 2) {
							if (isset($b->observacoes_registro)) {echo $b->observacoes_registro;}
						}	
						else{
							if (isset($b->observacoes_registro)) {$txt_break .= $b->observacoes_registro;}
						}

					}	

					foreach($lin_averbacao as $b){
						$cont_av++;
						if ($cont_av < 2) {
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
						if ($cont_av < 2) {
							if (isset($b->ANOTACAO)) {echo $b->ANOTACAO;}
						}	
						else{
							if (isset($b->ANOTACAO)) {$txt_break .= $b->ANOTACAO;}
						}

					}

					
				}

				if (isset($txt_break) && !empty($txt_break)) {
					echo "EXISTEM AVERBAÇÕES NO VERSO DESTA CERTIDÃO.";
				}
				

				?>
						

					</fieldset></div>
					
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