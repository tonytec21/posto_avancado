<!DOCTYPE html>
<?php include('../../controller/db_functions.php');
$pdo = conectar();
if (isset($_GET['id_apagar'])) {$id_apagar = $_GET['id_apagar'];
    $del = $pdo->prepare("DELETE FROM salvar_editor where IDREGISTRO ='$id_apagar' and TIPO = 'LIVROE_GERAL' ");
    $del->execute();
    }
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
?>
<html>
<head>
	<meta charset="utf-8">
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
	<?php $r = PESQUISA_ALL_ID('registro_livro_e',$id);
	foreach ($r as $r ) :

		$busca_ja_existe = $pdo->prepare("SELECT * FROM salvar_editor where IDREGISTRO = '$id' and TIPO = 'LIVROE_GERAL'");
	$busca_ja_existe->execute();
	#aqui vai preencher os inputs, vou preencher só um pra vc ver:

	if ($busca_ja_existe->rowCount()!=0) {
	$recebe_texto = $busca_ja_existe->fetch(PDO::FETCH_ASSOC);
	echo $recebe_texto['TEXTO'];
	}	
		?>
	<?php if ($busca_ja_existe->rowCount()==0): ?>	
<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
      <?php $c = PESQUISA_ALL('cadastroserventia');
      foreach ($c as $c ):?>
      <div style="display: block;margin-top: -40px;min-width: 100%;">
      <div style="display: inline-block;width: 17%;">
      <img src="../../images/brasao_ma.png" style="width: 60%;margin-left:28px; margin-top:10px; ">

      </div>
      <div style="display: inline-block;width: 80%; margin-left: -50px;">  
      <h2 style=" text-align: center;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
      <h2 style=" text-align: center;font-size: 12px;margin-top: -18px;
      "><?=$c->strLogradouro?>, <?=$c->strNumero?> -
      <?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
      <?php endforeach ?>
      <br>
      Titular da Serventia: <?=$c->strTituloServentia?><br>
      Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
      <?php endforeach ?></h2>
      </div>

      </div>
				     
<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>


											<div style="width: 100%; text-align: center; display: block;margin-top: -10px;" >
												<hr style="border:1px solid black">
												<h3 style="display: inline;margin-left: 0cm">LIVRO: E <?=intval($r->LIVRO)?></h3>
												<h3 style="display: inline;margin-left: 1cm">ORDEM: <?=$r->TERMO?></h3>
												<h3 style="display: inline;margin-left: 1cm">FOLHA: <?=intval($r->FOLHA)?></h3>	
											</div>
											<br><br>



												<h1 style="text-align: center"> 
													<?php if ($r->TIPOREGISTRO == 'NASCIMENTO'): ?>
														REGISTRO DE NASCIMENTO LIVRO ESPECIAL
													<?php endif ?>
													<?php if ($r->TIPOREGISTRO == 'CASAMENTO'): ?>
														REGISTRO DE CASAMENTO LIVRO ESPECIAL
													<?php endif ?>
													<?php if ($r->TIPOREGISTRO == 'OBITO'): ?>
														REGISTRO DE ÓBITO LIVRO ESPECIAL
													<?php endif ?>
													<?php if ($r->TIPOREGISTRO == 'UNIAO'): ?>
														REGISTRO DE UNIÃO ESTÁVEL LIVRO ESPECIAL
													<?php endif ?>

												</h1>
												
												<h3 style="text-align: center; margin-top: -70px;">
												
													MATRÍCULA: <?=$r->MATRICULA?></h3>	



<p style="text-align: justify;">Ao(s) 	

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

													?> (<?=date('d/m/Y', strtotime($r->DATAREGISTRO))?>), neste(a)


													<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?>


													<span style="text-transform: capitalize;"><?=$w->strRazaoSocial?></span> Estado do Maranhão, <?php endforeach ?> me foi apresentado
para registro o seguinte documento: <span style="font-weight: bold"><?=$r->DESCRICAOREGISTRO?></span>, Texto do registro: <br>


<fieldset style="text-align: justify; border:1px solid black!important">
	<?=$r->TEXTO_REGISTRO?>
</fieldset>



Era o que continha o referido
documento a mim apresentado. <?=mb_strtoupper($_SESSION['nome'])?>, <?=mb_strtoupper($_SESSION['funcao'])?>, que o mandei digitar, dou fé, subscrevo e assino. Matrícula da 1ª Via da
Certidão: <?=$r->MATRICULA?>.
Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.


<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h):
									$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
									foreach ($u as $u):?>

									<?=$u->cidade?>/<?=$u->uf?>,

									<?php
									$data = $r->DATAREGISTRO;
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
<?=mb_strtoupper($_SESSION['nome'])?><br> <?=mb_strtoupper($_SESSION['funcao'])?>	
								
</p>


	
<div style="position: absolute;width: 50%; margin-top: -100px;">
		<?php
		$retorno = json_decode($r->RETORNOSELODIGITAL,true);
		$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];

	include_once('../../../plugins/phpqrcode/qrlib.php');
	
function tirarAcentos($string){
return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(ý)/","/(Ý)/"),explode(" ","a A e E i I o O u U n N C c y Y"),$string);
}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->ID).'REGLIVE.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		#echo '<img style="max-width:20%; margin-top:-15px;margin-left:10px;" src="'.$nome.'" />';
		?>
	
	<!--p style="font-weight: bold; font-size: 6px;margin-top: -10px;width: 50%;"><?=$textoselo?></p-->

</div>
<table style="border:none; max-width: 30%;">
<tr style="border:none">

<td style="border:1px dashed silver">
<img src="<?=$nome?>" />
</td>

<td style="border:1px dashed silver">
<p style="text-align: justify; font-weight: bold; ">
<!-- <?php #echo mb_convert_case((utf8_encode($textoselo)), MB_CASE_UPPER, "UTF-8")?> -->
<?=corrigirACENTO_utf8($textoselo)?>
</p>
</td>




</tr>
</table>

<?php endif ?>
<?php endforeach  ?>
</body>
</html>
