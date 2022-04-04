<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<style>
	@page{
		left: 1cm;
		right: 1cm;
	}

	body{
		padding: 1cm 1cm 1cm 1.5cm;
	}

	.caixarogo{
		border: 1px solid silver;
		padding: 20px;
		margin-left: 10px;
	}
	.tdconteudo{
		zoom: 80%;
	}
	@media print{
		body{
			font-size: 12px;
			zoom: 100%!important;
			padding: 1cm 1cm 1cm 1.5cm;
		}
		.placeholderpdf{
			display: none;
		}
		.caixarogo{
			width: 25px;
			height: 50px;
		}
		.tdconteudo{
			zoom: 60%;
		}
	}
</style>
</head>


<body>
<?php 

$json_dados  = $dados['JSON_DADOS_ADD'];
$json_dados = json_decode($json_dados,true);

if (isset($json_dados['IDPESSOADECLARANTE'])) {$id_declarante = $json_dados['IDPESSOADECLARANTE'];}
$dataRegistro = $dados['DATAENTRADA'];
if (isset($json_dados['IDPESSOAPAI'])) {$id_pai = $json_dados['IDPESSOAPAI'];}
if (isset($json_dados['IDPESSOAMAE'])) {$id_mae = $json_dados['IDPESSOAMAE'];}
if (isset($json_dados['IDPESSOAPAISOCIO'])) {$id_paisocio = $json_dados['IDPESSOAPAISOCIO'];}
if (isset($json_dados['IDPESSOAMAESOCIO'])) {$id_maesocio = $json_dados['IDPESSOAMAESOCIO'];}
if (isset($json_dados['IDPESSOATESTEMUNHA1'])) {$id_TESTEMUNHA1 = $json_dados['IDPESSOATESTEMUNHA1'];}
if (isset($json_dados['IDPESSOATESTEMUNHA2'])) {$id_TESTEMUNHA2 = $json_dados['IDPESSOATESTEMUNHA2'];}


$ass_funcionario = mb_strtoupper($_SESSION['nome']).'<br>'.mb_strtoupper($_SESSION['funcao']);
if (isset($_GET['nomeassinatura'])) {
	$ass_funcionario = str_replace("/","<br>",$_GET['nomeassinatura']);
}

 ?>




<table style="border:none;">
	<tr style="border:none">
		<td style="border:1px solid black; text-align: center; padding: 5px; font-weight: bold;">ORDEM</td>
		<td style="border:1px solid black; text-align: center; padding: 5px; font-weight: bold;">REGISTRO DE NASCIMENTO</td>
		<td style="border:1px solid black; text-align: center; padding: 5px; font-weight: bold;">AVERBAÇÕES/ANOTAÇÕES</td>
	</tr>
	<tr style="border:none">
		<td style="border:1px solid black; text-align: center; font-weight: bold;"> TERMO: <?=$dados['TERMONASCIMENTO']?></td>
		<td style="border:1px solid black">
			<table style="width: 100%;border: none;">
				<tr style="border:none">
					<td style="border:none; text-align: center; font-weight: bold;">LIVRO: A <?=$dados['LIVRONASCIMENTO']?> </td>
					<td style="border:none; text-align: center; font-weight: bold;">FOLHA: <?=$dados['FOLHANASCIMENTO']?> </td>
				</tr>
			</table>
			<br>
			<table style="width: 100%;border: none;font-size: 16px;">	
				<tr style="border:none">
					<td style="border:none; text-align: center;">MATRICULA: <?=$dados['MATRICULA']?></td>
				</tr>
			</table>
			<div id="conteudoregistro" style="border:none; text-align: justify;max-width: 100%;padding: 10px;padding-bottom: 25%;">

				<?php include('include-teornascimento.php'); ?>

				<table style="border:none; width: 100%;">
					<tr style="border:none">
						<td style="border:none"><?=qrselo($dados['SELO'])?></td>
						<td style="border:none"><p style="text-align:right;">	<?=textoselo($dados['SELO'])?>. <br> (Registro isento de emolumentos). <br> Matrícula da 1ª Via da Certidão: <?=$dados['MATRICULA']?> </p></td>
					</tr>
				</table>




				<hr style="width:relative; border: 1px dashed black;"> <span style="font-weight:bold; color:rgba(0, 0, 0, .7);"> Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>


				<br><br>

				<?php if ($dados['TIPOASSENTO'] != 'UNIDADE_INTERLIGADA'):  ?>
					<?php if ($dados['QUALIDADEDECLARANTE'] == 'PAI' || $dados['QUALIDADEDECLARANTE'] == 'AMBOSPAI'): ?>
						<?=assinatura($dados['NOMEPAI'],"DECLARANTE", $dados['ROGOPAI'], $dados['PROCURADORPAI'])?>
					<?php endif ?>
					
					<?php if ($dados['QUALIDADEDECLARANTE'] == 'MAE' || $dados['QUALIDADEDECLARANTE'] == 'AMBOSPAI'): ?>
						<?=assinatura($dados['NOMEMAE'],"DECLARANTE", $dados['ROGOMAE'], "")?>
					<?php endif ?>

					<?php if ($dados['QUALIDADEDECLARANTE'] == 'OUTRO'): ?>
						<?=assinatura($dados['NOMEDECLARANTE'],"DECLARANTE", $dados['ROGODECLARANTE'], "")?>
					<?php endif ?>
					
					<?=assinatura($dados['NOMETESTEMUNHA1'],"TESTEMUNHA1", "", "")?>
					<?=assinatura($dados['NOMETESTEMUNHA2'],"TESTEMUNHA2", "", "")?>	
				<?php endif ?>
				<?=assinatura($ass_funcionario,"", "", "")?>	

			</div>

		</td>
		<td style="border:1px solid black">
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
							#echo '<hr style="border:1px dashed black;">'; 
						}
						else{
							$lin_averbacao = $averbacao->fetchAll(PDO::FETCH_OBJ);
							$lin_anotacao = $anotacao->fetchAll(PDO::FETCH_OBJ);
							$lin_obs = $obs->fetchAll(PDO::FETCH_OBJ);
							$txt_break = '';$cont_av = 0;


							foreach($lin_obs as $b){
								$cont_av++;
								if ($cont_av <= 2) {
									if (isset($b->observacoes_registro)) {echo $b->observacoes_registro;}
								}	
								else{
									if (isset($b->observacoes_registro)) {$txt_break .= $b->observacoes_registro;}
								}

							}	

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
						}
						?>

		</td>
	</tr>

</table>



</body>


</html>


