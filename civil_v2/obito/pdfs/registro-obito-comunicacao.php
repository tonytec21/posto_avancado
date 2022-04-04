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
$id_pessoa = $json_dados['IDPESSOA'];
$id_pai = $json_dados['IDPESSOAPAI'];
$id_mae = $json_dados['IDPESSOAMAE'];
if (isset($json_dados['IDPESSOAPAISOCIO'])) {$id_paisocio = $json_dados['IDPESSOAPAISOCIO'];}
if (isset($json_dados['IDPESSOAMAESOCIO'])) {$id_maesocio = $json_dados['IDPESSOAMAESOCIO'];}

$ass_funcionario = mb_strtoupper($_SESSION['nome']).'<br>'.mb_strtoupper($_SESSION['funcao']);
if (isset($_GET['nomeassinatura'])) {
	$ass_funcionario = str_replace("/","<br>",$_GET['nomeassinatura']);
}

 ?>


		<div id="conteudoregistro" style="border:none; text-align: justify;">

		<p style="text-align:left">
				Ilmo(a). Sr(a).<br>
				Oficial do Registro Civil <br>
				<?=$_POST['ENDERECADO']?>	
			</p>

			<p style="text-align:justify">
				Cumprindo o disposto nos Artigos 106 da Lei No 6.015 de 31 de Dezembro de 1973, comunico-vos que no Livro 

				<?php if ($dados['TIPOLIVRO'] == '4'): ?>
					C
				<?php else: ?>
					C AUXILIAR
				<?php endif ?>
				<?=$dados['LIVROOBITO']?>

				às folhas <?=$dados['FOLHAOBITO']?> sob numero de ordem <?=$dados['TERMOOBITO']?>, em data de <?=escrevedataextenso($dados['DATAENTRADA'])?> foi registrado o assento referente ao óbito de <?=$dados['NOME']?>, registrado(a) <?=$_POST['DADOSNASCIMENTO']?>. 

			</p>

		
		
			<p style="text-align:center">
				<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): escrevecidadecivil(intval($h->intUFcidade)); endforeach;?>
				<?=escrevedataextenso(date('Y-m-d'))?>

				<hr style="border:1px solid black; width:40%; margin-top:30px">
				<?=$ass_funcionario?>

			</p>
			

			
			

			
			


</div>
</body>


</html>


