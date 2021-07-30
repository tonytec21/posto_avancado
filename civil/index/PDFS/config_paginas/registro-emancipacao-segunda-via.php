<!DOCTYPE html>
<?php 
if (!isset($RETORNO)) {
$retorno = json_decode($_SESSION['RETORNOTEMP'],true);
}
else{
$retorno = json_decode($RETORNO,true);
}
if (!isset($_SESSION['RETORNOTEMP']) && !isset($RETORNO)) {
echo 'NENHUM SELO DE SEGUNDA VIA FOI GERADO, NÃO SERÁ POSSIVEL A REIMPRESSÃO';
break;
}
		$qr_certidao = $retorno['valorQrCode'];
		$textoselo_certidao = $retorno['textoSelo'];

$id = $_GET['id'];
function echo_exist($texto){
if ($texto!='' && $texto!=' ' && $texto!=NULL) {
		if (str_word_count($texto)>2 && str_word_count($texto)<5) {
			$texto = '<span style="font-weight:bold">'.$texto.'</span>';
		}
		else{
			$texto = ucfirst(mb_strtolower($texto));
		}

		echo $texto;
	}
}
?>
<html>
<head>
	<title>Registro - Emancipacao</title>
<style type="text/css">
	@page {

  margin-top: 0;
}

.center{
	text-align: center;

}
.all{

	width: 100%;
}
fieldset{
	padding: 8px;
	font-size: 80%;
}
legend{
	font-size: 60%;
}
table{
	border: 1px solid black;
}
thead{
	border-bottom: 1px solid black;
}
th{
	border-left: 1px solid black;
}

td{
border-left: 1px solid black;
border-bottom: 1px solid black
}
.left{
	float: left;
	font-size: 70%;
}
.right{
	float: right;
	font-size: 70%;
	text-align: center;
}
body{ font-size: 14px;font-family: "Arial";}
</style>
</head>

<body>
	<?php $r = PESQUISA_ALL_ID('registro_emancipacao_novo',$id);
	foreach ($r as $r ) :
		$retorno = json_decode($r->RETORNOSELODIGITAL,true);
		$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];
	#aqui vai preencher os inputs, vou preencher só um pra vc ver:
		?>
	
	<div style="width: 100%;" >
												<!--h3 style="text-align: left;display: inline;margin-left: 1cm">LIVRO: E <?=intval($r->LIVROESPECIAL)?></h3>
												<h3 style="text-align: center; display: inline;margin-left: 4cm;">ORDEM: <?=$r->TERMOESPECIAL?></h3>
												<h3 style="text-align: right; display: inline;margin-left: 3cm;">FOLHA: <?=intval($r->FOLHAESPECIAL)?></h3>	
												</div>
												<br-->
<br><br><br><br><br><br><br>

												<h1 style="text-align: center"> CERTIDÃO DE EMANCIPAÇÃO</h1>
												<br>
												<h3 style="text-align: center;">MATRÍCULA: <?=$r->MATRICULA?></h3>	
<p style="text-align: justify;margin-left: 2cm; margin-right: 2cm;">
																		CERTIFICO que, Consoante aos termos da Escritura Pública de
									Emancipação lavrada no(a) <?=$r->CARTORIOESCRITURA?>, sob o nº <?=$r->REGISTROESCRITURA?>,
									fls. <?=$r->FOLHAESCRITURA?>, Livro <?=$r->LIVROESCRITURA?>, fica emancipada o menor <?=$r->NOMEEMANCIPADO?>,

															<!-- QUALIFICACAO-------------------------------------------------------------------------------------------------------->	
					<?php if ($r->NOMEEMANCIPADO!=''): ?>	


					
					
					<?php if ($r->NATURALIDADEEMANCIPADO!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEEMANCIPADO)); foreach($c as $c):?>
					<?=ucfirst(mb_strtolower($c->cidade))?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>

					<?php if ($r->PROFISSAOEMANCIPADO!=''): ?>
					<?=echo_exist($r->PROFISSAOEMANCIPADO)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOEMANCIPADO!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOEMANCIPADO)?> <?=echo_exist($r->BAIRROEMANCIPADO)?>,
					<?php endif ?>

					<?php if ($r->CIDADEEMANCIPADO!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEEMANCIPADO)); foreach($c as $c):?>
					<?=ucfirst(mb_strtolower($c->cidade))?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 

					<?php if ($r->DATANASCIMENTOEMANCIPADO!=''): ?>
						Nascido (a) em
						<?php
						$data = $r->DATANASCIMENTOEMANCIPADO ;
						$novaDataNoivo = explode("-", $data);

						if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
						echo "Primeiro   ";
						}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
						echo " Dois  ";
						} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
						echo " Três ";
						} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
						echo " Quatro  ";
						} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
						echo " Cinco  ";
						} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
						echo " Seis  ";
						} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
						echo " Sete  ";
						} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
						echo " Oito  ";
						} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
						echo " Nove  ";
						} else {echo  ucfirst(GExtenso::numero($novaDataNoivo[2]));}
						//Será exibido na tela a data: 16/02/2015
						// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
						if ($novaDataNoivo[1] == '01' || $novaDataNoivo[1] == '1') {
						echo " de Janeiro de ";
						}elseif ($novaDataNoivo[1] == '02' || $novaDataNoivo[1] == '2') {
						echo " de Fevereiro de ";
						} elseif ($novaDataNoivo[1] == '03' || $novaDataNoivo[1] == '3') {
						echo " de Março de ";
						} elseif ($novaDataNoivo[1] == '04' || $novaDataNoivo[1] == '4') {
						echo " de Abril de ";
						} elseif ($novaDataNoivo[1] == '05' || $novaDataNoivo[1] == '5') {
						echo " de Maio de ";
						} elseif ($novaDataNoivo[1] == '06' || $novaDataNoivo[1] == '6') {
						echo " de Junho de ";
						} elseif ($novaDataNoivo[1] == '07' || $novaDataNoivo[1] == '7') {
						echo " de Julho de ";
						} elseif ($novaDataNoivo[1] == '08' || $novaDataNoivo[1] == '8') {
						echo " de Agosto de ";
						} elseif ($novaDataNoivo[1] == '09' || $novaDataNoivo[1] == '9') {
						echo " de Setembro de ";
						} elseif ($novaDataNoivo[1] == '10') {
						echo " de Outubro de ";
						} elseif ($novaDataNoivo[1] == '11') {
						echo " de Novembro de ";
						} elseif ($novaDataNoivo[1] == '12') {
						echo " de Dezembro de ";
						} else {
						echo "Não definido";
						}

						$udg = substr($novaDataNoivo[0], 2,3);
						if ($udg == '01' || $udg == '1') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOEMANCIPADO))?>), Com 
					<?=date('Y',strtotime($r->DATAENTRADA)) - date('Y', strtotime($r->DATANASCIMENTOEMANCIPADO))?> anos de idade.
					<?php endif ?>
					<?php endif ?>, por expressa declaração de vontade de seus Pais e Responsáveis
									<?=$r->NOMEPAI?> e <?=$r->NOMEMAE?>, e a partir desta data e
									do presente registro que produza todos os seus efeitos legais, o referido é verdade, dou
									fé. 

									<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h):
									$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
									foreach ($u as $u):?>

									<?=$u->cidade?>/<?=$u->uf?>,

									<?php
									$data = $r->DATAENTRADA ;
									$novaDataRegistro = explode("-", $data);
									echo $novaDataRegistro[2];
									/*
									if ($novaDataRegistro[2] == '01' || $novaDataRegistro[1] == '1') {
									echo " Um de  ";
									}elseif ($novaDataRegistro[2] == '02' || $novaDataRegistro[1] == '2') {
									echo " Dois de ";
									} elseif ($novaDataRegistro[2] == '03' || $novaDataRegistro[1] == '3') {
									echo " Três ";
									} elseif ($novaDataRegistro[2] == '04' || $novaDataRegistro[1] == '4') {
									echo " Quatro de ";
									} elseif ($novaDataRegistro[2] == '05' || $novaDataRegistro[1] == '5') {
									echo " Cinco de ";
									} elseif ($novaDataRegistro[2] == '06' || $novaDataRegistro[1] == '6') {
									echo " Seis de ";
									} elseif ($novaDataRegistro[2] == '07' || $novaDataRegistro[1] == '7') {
									echo " Sete de ";
									} elseif ($novaDataRegistro[2] == '08' || $novaDataRegistro[1] == '8') {
									echo " Oito de ";
									} elseif ($novaDataRegistro[2] == '09' || $novaDataRegistro[1] == '9') {
									echo " Nove de ";
									} else {echo  ucfirst(GExtenso::numero($novaDataRegistro[2]));}
									//Será exibido na tela a data: 16/02/2015
									// . "de".$novaDataRegistro[1] . " de " . GExtenso::numero ($novaDataRegistro[0])
									*/
									if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
									echo " de Janeiro de ";
									}elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
									echo " de Fevereiro de ";
									} elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
									echo " de Março de ";
									} elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
									echo " de Abril de ";
									} elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
									echo " de Maio de ";
									} elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
									echo " de Junho de ";
									} elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
									echo " de Julho de ";
									} elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
									echo " de Agosto de ";
									} elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
									echo " de Setembro de ";
									} elseif ($novaDataRegistro[1] == '10') {
									echo " de Outubro de ";
									} elseif ($novaDataRegistro[1] == '11') {
									echo " de Novembro de ";
									} elseif ($novaDataRegistro[1] == '12') {
									echo " de Dezembro de ";
									} else {
									echo "Não definido";
									}

									echo $novaDataRegistro[0];

									?>.
									<?php endforeach; endforeach ?>

									
</p>


<p style="max-width: 650px;word-wrap: break-word;">
<?php
$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVROESPECIAL' and strFolha = '$r->FOLHAESPECIAL' and strTipo = 'ES' and setRegistroInvisivel!='S' ");
$busca_averbacoes->execute();
$ba = $busca_averbacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ba as $ba) {
echo $ba->strAverbacao;
}

$busca_anotacoes = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$r->LIVROESPECIAL' and FOLHA = '$r->FOLHAESPECIAL' and strTipo = 'ES'  ");
$busca_anotacoes->execute();
$ban = $busca_anotacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ban as $ban) {
echo $ban->ANOTACAO;
}


if ($busca_averbacoes->rowCount() == 0) {
	echo "<br>";
}
if ($r->AVERBACAOTERMOANTIGO!='') {
	echo $r->AVERBACAOTERMOANTIGO;
}

if (isset($_GET['TEXTOFRASECERTIDAO']) && $_GET['TEXTOFRASECERTIDAO']!='') {
echo '<br>'.$_GET['TEXTOFRASECERTIDAO'];
}

 ?>
 </p>

<p style="text-align: center">
O conteúdo da certidão é verdadeiro e dou fé. <br>

<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h):
									$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
									foreach ($u as $u):?>

									<?=$u->cidade?>/<?=$u->uf?>,

									<?php
									$data = date('Y-m-d') ;
									$novaDataRegistro = explode("-", $data);
									echo $novaDataRegistro[2];
									/*
									if ($novaDataRegistro[2] == '01' || $novaDataRegistro[1] == '1') {
									echo " Um de  ";
									}elseif ($novaDataRegistro[2] == '02' || $novaDataRegistro[1] == '2') {
									echo " Dois de ";
									} elseif ($novaDataRegistro[2] == '03' || $novaDataRegistro[1] == '3') {
									echo " Três ";
									} elseif ($novaDataRegistro[2] == '04' || $novaDataRegistro[1] == '4') {
									echo " Quatro de ";
									} elseif ($novaDataRegistro[2] == '05' || $novaDataRegistro[1] == '5') {
									echo " Cinco de ";
									} elseif ($novaDataRegistro[2] == '06' || $novaDataRegistro[1] == '6') {
									echo " Seis de ";
									} elseif ($novaDataRegistro[2] == '07' || $novaDataRegistro[1] == '7') {
									echo " Sete de ";
									} elseif ($novaDataRegistro[2] == '08' || $novaDataRegistro[1] == '8') {
									echo " Oito de ";
									} elseif ($novaDataRegistro[2] == '09' || $novaDataRegistro[1] == '9') {
									echo " Nove de ";
									} else {echo  ucfirst(GExtenso::numero($novaDataRegistro[2]));}
									//Será exibido na tela a data: 16/02/2015
									// . "de".$novaDataRegistro[1] . " de " . GExtenso::numero ($novaDataRegistro[0])
									*/
									if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
									echo " de Janeiro de ";
									}elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
									echo " de Fevereiro de ";
									} elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
									echo " de Março de ";
									} elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
									echo " de Abril de ";
									} elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
									echo " de Maio de ";
									} elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
									echo " de Junho de ";
									} elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
									echo " de Julho de ";
									} elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
									echo " de Agosto de ";
									} elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
									echo " de Setembro de ";
									} elseif ($novaDataRegistro[1] == '10') {
									echo " de Outubro de ";
									} elseif ($novaDataRegistro[1] == '11') {
									echo " de Novembro de ";
									} elseif ($novaDataRegistro[1] == '12') {
									echo " de Dezembro de ";
									} else {
									echo "Não definido";
									}

									echo $novaDataRegistro[0];

									?>.
									<?php endforeach; endforeach ?><br><br>
</p>
<p style="text-align: center">
____________________________________ <br>
<?=$_SESSION['nome']?><br> <?=$_SESSION['funcao']?>	
								
</p>

<div style="display: inline-block;width: 100px; margin-left: 450px;"> 
<?php

	include_once('../../../plugins/phpqrcode/qrlib.php');
	
	  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->NOMEEMANCIPADO).'CERT.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr_certidao;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		echo '<img style="max-width:100%; margin-top:-12px;margin-left:10px;" src="'.$nome.'" />';
		?>
	
<p style="font-weight: bold; font-size: 7px;max-width: 100%;text-align: center;margin-left: 10px;"><?=$textoselo_certidao?></p>

</div>



	<?php if (isset($_GET['primvia'])): ?>
	
<div style="display: inline-block;width: 100px; margin-left: 10px;"> 
	<?php
		$retornoprimvia = json_decode($r->RETORNOSELODIGITAL,true);
		$qr = $retornoprimvia['valorQrCode'];
		$textoselo = $retornoprimvia['textoSelo'];
	include_once('../../../plugins/phpqrcode/qrlib.php');

	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->NOMEEMANCIPADO).'.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		echo '<img style="max-width:100%; margin-top:-12px;margin-left:10px;" src="'.$nome.'" />';
		?>
	
	<p style="font-weight: bold; font-size: 7px;max-width: 100%;text-align: center;margin-left: 10px;"><?=$textoselo?></p>
</div>
<?php endif ?>
<?php endforeach  ?>
</body>
</html>
