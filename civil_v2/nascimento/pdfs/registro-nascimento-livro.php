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
			padding-left: 40px;
		}
	}
</style>
</head>


<body>
<table style="width: 100%;border: none;">
	<tr style="border:none">
		<td style="border:none; text-align: center; font-weight: bold;">LIVRO: A <?=$dados['LIVRONASCIMENTO']?> </td>
		<td style="border:none; text-align: center; font-weight: bold;">FOLHA: <?=$dados['FOLHANASCIMENTO']?> </td>
		<td style="border:none; text-align: center; font-weight: bold;">TERMO: <?=$dados['TERMONASCIMENTO']?> </td>
	</tr>
</table>
<br>

<hr>
<table style="width: 100%;border: none;font-size: 16px;">	
	<tr style="border:none">
		<td style="border:none; text-align: center;">MATRICULA: <?=$dados['MATRICULA']?></td>
	</tr>
</table>
<h3 style="text-align:center">ASSENTO DE NASCIMENTO</h3>


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


		<div id="conteudoregistro" style="border:none; text-align: justify;">

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
</body>


</html>


