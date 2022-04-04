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
		<td style="border:none; text-align: center; font-weight: bold;">LIVRO: 
<?php if ($dados['TIPOLIVRO'] == '4'): ?>
			C
		<?php else: ?>
			C AUXILIAR
		<?php endif ?>

		 <?=$dados['LIVROOBITO']?> </td>
		<td style="border:none; text-align: center; font-weight: bold;">FOLHA: <?=$dados['FOLHAOBITO']?> </td>
		<td style="border:none; text-align: center; font-weight: bold;">TERMO: <?=$dados['TERMOOBITO']?> </td>
	</tr>
</table>
<br>

<hr>
<table style="width: 100%;border: none;font-size: 16px;">	
	<tr style="border:none">
		<td style="border:none; text-align: center;">MATRICULA: <?=$dados['MATRICULA']?></td>
	</tr>
</table>

<?php if ($dados['TIPOLIVRO'] == '4'): ?>
<h3 style="text-align:center">ASSENTO DE ÓBITO</h3>
<?php else: ?>
<h3 style="text-align:center">ASSENTO DE NATIMORTO</h3>	
<?php endif ?>



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


		<div id="conteudoregistro" style="border:none; text-align: justify;">

			<?php if ($dados['TIPOLIVRO'] == '4'): ?>
			<?php include('include-teorobito.php'); ?>
		<?php else: ?>	
			<?php include('include-teornatimorto.php'); ?>
		<?php endif ?>

			<table style="border:none; width: 100%;">
				<tr style="border:none">
					<td style="border:none"><?=qrselo($dados['SELO'])?></td>
					<td style="border:none"><p style="text-align:right;">	<?=textoselo($dados['SELO'])?>. <br> (Registro isento de emolumentos). <br> Matrícula da 1ª Via da Certidão: <?=$dados['MATRICULA']?> </p></td>
				</tr>
			</table>

			


			<hr style="width:relative; border: 1px dashed black;"> <span style="font-weight:bold; color:rgba(0, 0, 0, .7);"> Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>


			<br><br>
			
			<?php if (!empty($dados['NOMEDECLARANTE']) && empty($dados['DATASENTENCAMANDATO'])): ?>
				<?=assinatura($dados['NOMEDECLARANTE'],"DECLARANTE", $dados['ROGODECLARANTE'], "")?>
			<?php endif ?>
			

			
			<?=assinatura($dados['NOMETESTEMUNHA1'],"TESTEMUNHA1", "", "")?>
			<?=assinatura($dados['NOMETESTEMUNHA2'],"TESTEMUNHA2", "", "")?>	
			
			<?=assinatura($ass_funcionario,"", "", "")?>	
			

			
			


</div>
</body>


</html>


