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
		$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];

#aqui tá pegando o id mandado da página pesquisa
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

$pesquisanomeparte = PESQUISA_ALL_ID('registro_livro_e',$id);
                  foreach ($pesquisanomeparte as $p) {
                  $busca_parte1 = $pdo->prepare("SELECT strNome, strCPFcnpj FROM pessoa where ID = '$p->IDPESSOAPARTE1' ");
                  $busca_parte1->execute();
                  $bp1 = $busca_parte1->fetch(PDO::FETCH_ASSOC);
                  $nomeparte1 = addslashes($bp1['strNome']);
                  $_SESSION['nomeparte1'] = $nomeparte1;
                  $docparte1 = $bp1['strCPFcnpj'];

                  $busca_parte2 = $pdo->prepare("SELECT strNome, strCPFcnpj FROM pessoa where ID = '$p->IDPESSOAPARTE2' ");
                  $busca_parte2->execute();
                  $bp2 = $busca_parte2->fetch(PDO::FETCH_ASSOC);
                  $nomeparte2 = addslashes($bp2['strNome']);
                  $docparte2 = $bp2['strCPFcnpj'];
                  $_SESSION['nomeparte2'] = $nomeparte2;


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
body{ font-size: 15px;font-family: "Arial";padding-left: 1cm; padding-right: 1cm;}

@media print{
	body{
		zoom: 80%;
	}
}
</style>
</head>

<body>
	<?php $r = PESQUISA_ALL_ID('registro_livro_e',$id);
	foreach ($r as $r ) :		?>
	
	<div style="width: 100%;padding-top: 4cm" >


												<h1 style="text-align: center"> CERTIDÃO REGISTROS DIVERSOS DO LIVRO ESPECIAL</h1>
												<br>

												<?php if ($r->TIPOREGISTRO == 'UNIAO' || $r->TIPOREGISTRO == 'CASAMENTO' ): ?>
														<h3 style="text-align: center">
													<?=mb_strtoupper( $_SESSION['nomeparte1'])?> e <?=mb_strtoupper($_SESSION['nomeparte2'])?>

												</h3>
												<?php endif ?>
											
												<h5 style="text-align: center">
														MATRÍCULA: <?=$r->MATRICULA?>
												</h5>

<!--fieldset style="text-align: justify; border:1px solid black!important"-->
<fieldset style="text-align: justify;">														
<p style="text-align: justify;">

Certifico que sob o n <?=$r->TERMO?>, as folhas <?=intval($r->FOLHA)?> do Livro E - <?=intval($r->LIVRO)?>, deste ofício consta que foi lavrado Ao(s) 	

													<?php 
																$data = $r->DATAREGISTRO ;
																$novaData = explode("-", $data);

																if ($novaData[2] == '01' || $novaData[2] == '1') {
																	echo " Primeiro dia  ";
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
																	echo " de Outubro de ";
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

													?> (<?=date('d/m/Y', strtotime($r->DATAREGISTRO))?>), o seguinte documento: <span style="font-weight: bold"><?=$r->DESCRICAOREGISTRO?></span>, Texto do registro: 


	<?=$r->TEXTO_REGISTRO?>
</fieldset>


<span style="font-size: 8px;text-align: right;">Válido somente com selo de autenticidade </span>
<hr style="width: 100%; border: 1px dashed silver">


</p>
<p style="max-width: 650px;word-wrap: break-word;">
<?php
$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVRO' and strFolha = '$r->FOLHA' and strTipo = 'ES' and setRegistroInvisivel!='S' ");
$busca_averbacoes->execute();
$ba = $busca_averbacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ba as $ba) {
echo $ba->strAverbacao;
}

$busca_anotacoes = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$r->LIVRO' and FOLHA = '$r->FOLHA' and strTipo = 'ES'  ");
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


<p  class="left">
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
<p class="right">
____________________________________ <br>
<?=mb_strtoupper($_SESSION['nome'])?><br> <?=mb_strtoupper($_SESSION['funcao'])?>	
								
</p>



</fieldset>
</div>
<div style="margin-top:1%; width: 100%;display: inline-table;margin-left: 1%;">
<?php if (isset($RETORNO) && !isset($_GET['reimpressao']) || isset($_SESSION['RETORNOTEMP']) && !isset($_GET['reimpressao'])): ?>



<?php

	include_once('../../../plugins/phpqrcode/qrlib.php');
	
	  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->ID).'CERTLIVE.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		#echo '<img style="max-width:100%; margin-top:-12px;margin-left:10px;" src="'.$nome.'" />';
		?>
	
<!--p style="font-weight: bold; font-size: 7px;max-width: 100%;text-align: center;margin-left: 10px;"><?=$textoselo?></p-->



<table style="width: 30%; max-width: 30%;display: inline-table;  border:none!important">
<tr style="border:none">

<td style="border:1px dashed silver; border:none">
<img src="<?=$nome?>"  style="width: 80px;"/>
</td>

<td style="border:1px dashed silver; border:none">
<p style="text-align: justify; font-weight: bold;font-size: 8px; ">
<!-- <?php #echo mb_convert_case((utf8_encode($textoselo)), MB_CASE_UPPER, "UTF-8")?> -->
<?=caracteres_selador($textoselo)?>
</p>
</td>
</tr>
</table>




	<?php if (isset($_GET['primvia'])): ?>
	

	<?php
		$retorno = json_decode($r->RETORNOSELODIGITAL,true);
		$qr = $retorno['valorQrCode'];
		$textoselo2 = $retorno['textoSelo'];
	include_once('../../../plugins/phpqrcode/qrlib.php');

	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->ID).'REGLIVE.png';
	$nome2 = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		#echo '<img style="max-width:100%; margin-top:-12px;margin-left:10px;" src="'.$nome2.'" />';
		?>
	
	<!--p style="font-weight: bold; font-size: 7px;max-width: 100%;text-align: center;margin-left: 10px;"><?=$textoselo2?></p-->

	<table style="width: 30%; max-width: 30%;display: inline-table;  border:none!important; margin-left: 20px;">
<tr style="border:none">

<td style="border:1px dashed silver; border:none">
<img src="<?=$nome2?>"  style="width: 80px;"/>
</td>

<td style="border:1px dashed silver; border:none">
<p style="text-align: justify; font-weight: bold;font-size: 8px; ">
<!-- <?php #echo mb_convert_case((utf8_encode($textoselo)), MB_CASE_UPPER, "UTF-8")?> -->
<?=caracteres_selador($textoselo2)?>
</p>
</td>
</tr>
</table>


<?php endif ?>
<?php endif ?>
</div>
<?php endforeach  ?>
</body>
</html>
