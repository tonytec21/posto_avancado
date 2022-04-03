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



<?php 

$json_dados  = $dados['JSON_DADOS_ADD'];
$json_dados = json_decode($json_dados,true);

if (isset($json_dados['IDPESSOADECLARANTE'])) {$id_declarante = $json_dados['IDPESSOADECLARANTE'];}
$dataRegistro = $dados['DATAENTRADA'];
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


			<h2 style="text-align:center">Declaração de Negação paternidade</h2>
			<h5 style="text-align:center">ARTIGO 2º DA LEI 8.560/92</h5>

			<p style="text-align:justify">
				<!--DATA DO REGISTRO-->
				<?php if (!empty($dados['DATAENTRADA'])): ?>
					Ao(s) <?=escrevedataextenso($dados['DATAENTRADA'])?>, 
				<?php endif ?>
				compareceu,
				<?php if (!empty($dados['NOMEMAE'])): ?>
					<?php 
					if (empty($dados['CPFMAE'])){
						echo str_replace("idade.", "idade; ",montaqualificacaotext_id($id_mae, $dataRegistro,'estadocivil'));
					}
					else{
						echo str_replace("idade.", "idade; ",montaqualificacaotext_cpf($dados['CPFMAE'], $dataRegistro,'estadocivil'));
					}
					?>
				<?php endif ?>

				e declarou-me expressamente que não deseja informar o nome do suposto pai do registrando e tem pleno conhecimento da facultadade da declaração para averiguação oficiosa da paternidade, prevista na Lei nº 8.560, de 29 de dezembro de 1992 e o provimento 16 do CNJ, alegando, inclusive, ter sido cumprido, por parte deste Ofício, as determinações do CNJ; e declarando mais: que não pretende, de momento, promover ação de investigação de paternidade contra o suposto pai. Depois de ter cientificado a interessada, digitei este termo em duas vias, o qual, após lido e achado conforme, vai assinado por mim, <?=str_replace("<br>", ", ", $ass_funcionario)?>, e pela interessada.

			</p>

	<p style="text-align:center">
		<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): escrevecidadecivil(intval($h->intUFcidade)); endforeach;?>
		<?=escrevedataextenso(date('Y-m-d'))?></p>


			<hr style="width:relative; border: 1px dashed black;"> <span style="font-weight:bold; color:rgba(0, 0, 0, .7);"> Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>


			<br><br>
			
			
			

			<?=assinatura($dados['NOMEMAE'],"DECLARANTE", $dados['ROGOMAE'], "")?>
			<?=assinatura($ass_funcionario,"", "", "")?>	
			

			
			


</div>
</body>


</html>


