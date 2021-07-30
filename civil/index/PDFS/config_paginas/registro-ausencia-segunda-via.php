<!DOCTYPE html>
<?php 
$retorno = json_decode($RETORNO,true);
		$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];

#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
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
	<?php $r = PESQUISA_ALL_ID('registro_ausencia_novo',$id);
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

												<h1 style="text-align: center"> CERTIDÃO DE AUSENCIA</h1>
												<br>
												<h3 style="text-align: center">
													NOME: <?=$r->NOME?><br>
													MATRÍCULA: <?=$r->MATRICULA?></h3>	
<p style="text-align: justify;margin-left: 2cm; margin-right: 2cm;">












Certifico que no livro E-<?=$r->LIVROESPECIAL?>, folha <?=$r->FOLHAESPECIAL?> e registro <?=$r->TERMOESPECIAL?>, de Registro de Emancipação, Interdição e Ausência, deste Ofício, consta que foi lavrado aos 	

													<?php //echo date('d/m/Y', strtotime($r->dataObito));

																$data = '2019-08-29';#$r->DATAENTRADA ;
																$novaData = explode("-", $data);

																if ($novaData[2] == '01' || $novaData[2] == '1') {
																	echo " Um dias  ";
																}elseif ($novaData[2] == '02' || $novaData[2] == '2') {
																	echo " Dois dias ";
																} elseif ($novaData[2] == '03' || $novaData[2] == '3') {
																	echo " Três ";
																} elseif ($novaData[2] == '04' || $novaData[2] == '4') {
																	echo " Quatro dias ";
																} elseif ($novaData[2] == '05' || $novaData[2] == '5') {
																	echo " Cinco dias ";
																} elseif ($novaData[2] == '06' || $novaData[2] == '6') {
																	echo " Seis dias ";
																} elseif ($novaData[2] == '07' || $novaData[2] == '7') {
																	echo " Sete dias ";
																} elseif ($novaData[2] == '08' || $novaData[2] == '8') {
																	echo " Oito dias ";
																} elseif ($novaData[2] == '09' || $novaData[2] == '9') {
																	echo " Nove dias ";
																} 
																elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
																echo  ucfirst(GExtenso::numero($novaData[2])).'um';
																}
																else {echo  ucfirst(GExtenso::numero($novaData[2]));}
																//Será exibido na tela a data: 16/02/2015
																// . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
																if ($novaData[1] == '01' || $novaData[1] == '1') {
																	echo " de Janeiro de ";
																}elseif ($novaData[1] == '02' || $novaData[1] == '2') {
																	echo " de Fevereiro de ";
																} elseif ($novaData[1] == '03' || $novaData[1] == '3') {
																	echo " de Março de ";
																} elseif ($novaData[1] == '04' || $novaData[1] == '4') {
																	echo " de Abril de ";
																} elseif ($novaData[1] == '05' || $novaData[1] == '5') {
																	echo " de Maio de ";
																} elseif ($novaData[1] == '06' || $novaData[1] == '6') {
																	echo " de Junho de ";
																} elseif ($novaData[1] == '07' || $novaData[1] == '7') {
																	echo " de Julho de ";
																} elseif ($novaData[1] == '08' || $novaData[1] == '8') {
																	echo " de Agosto de ";
																} elseif ($novaData[1] == '09' || $novaData[1] == '9') {
																	echo " de Setembro de ";
																} elseif ($novaData[1] == '10') {
																	echo " de Outubro de";
																} elseif ($novaData[1] == '11') {
																	echo " de Novembro de ";
																} elseif ($novaData[1] == '12') {
																	echo " de Dezembro de ";
																} else {
																	echo "Não definido";
																}

																	$udg = substr($novaData[0], 2,3);
																  if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
																   echo GExtenso::numero($novaData[0]).'  um';
																  }
																  else{
																    echo GExtenso::numero($novaData[0]);
																  }

													?>, o assento de ausencia de:  <p style="text-align: center; font-weight: bold"><?=$r->NOME?></p>,<br> registrado neste Ofício no Livro de nº <?=$r->LIVROREGISTRONASCIMENTO?>, Folha <?=$r->FOLHAREGISTRONASCIMENTO?>,  Conforme mandado judicial expedido pelo(a) Exmo(a). Juiz(a) <?=$r->JUIZ?>, foi nomeado curador <?=$r->NOMECURADOR?>, 
													<?php if ($r->ESTADOCIVILCURADOR == 'CA'): ?>
													casada,
													<?php elseif ($r->ESTADOCIVILCURADOR == 'SO'): ?>
													solteira,
													<?php elseif ($r->ESTADOCIVILCURADOR == 'DI'): ?>
													divorciada,	
													<?php elseif ($r->ESTADOCIVILCURADOR == 'VI'): ?>
													viúva,	
													<?php elseif ($r->ESTADOCIVILCURADOR == 'UN'): ?>
													em união estável,
													<?php else: ?>

													<?php endif ?>, <?=strtolower($r->PROFISSAOCURADOR)?>, residente e domiciliado em <?=$r->ENDERECOCURADOR?>, <?=$r->BAIRROCURADOR?>, <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADECURADOR)); foreach($c as $c):?>
													<?=$c->cidade?> (<?=$c->uf?>)<?php endforeach ?>, CPF de número <?=$r->CPFCURADOR?>.

												
								










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


<p style="margin-left:10cm;">
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
<p style="margin-left:10cm;">
____________________________________ <br>
<?=$_SESSION['nome']?><br> <?=$_SESSION['funcao']?>	
								
</p>
<?php

	include_once('../../../plugins/phpqrcode/qrlib.php');
	
	  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->NOME).'.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		echo '<img style="max-width:20%; margin-top:-15px;margin-left:500px;" src="'.$nome.'" />';
		?>
	</div>
	<p style="font-weight: bold; font-size: 6px;text-align: center"><?=$textoselo?></p>
<?php endforeach  ?>
</body>
</html>
