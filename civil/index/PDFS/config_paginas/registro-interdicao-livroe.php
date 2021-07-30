<!DOCTYPE html>
<?php include('../../controller/db_functions.php');
$pdo = conectar();
if (isset($_GET['id_apagar'])) {$id_apagar = $_GET['id_apagar'];
    $del = $pdo->prepare("DELETE FROM salvar_editor where IDREGISTRO ='$id_apagar' and TIPO = 'LIVROE_INTERDICAO' ");
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
	<?php $r = PESQUISA_ALL_ID('registro_interdicao_novo',$id);
	foreach ($r as $r ) :

		$busca_ja_existe = $pdo->prepare("SELECT * FROM salvar_editor where IDREGISTRO = '$id' and TIPO = 'LIVROE_INTERDICAO'");
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
<hr style="border:1px solid black">
	<div style="width: 100%;" >
		<br><br>
												<h3 style="text-align: left;display: inline;margin-left: 1cm">LIVRO: E <?=intval($r->LIVROESPECIAL)?></h3>
												<h3 style="text-align: center; display: inline;margin-left: 4cm;">ORDEM: <?=$r->TERMOESPECIAL?></h3>
												<h3 style="text-align: right; display: inline;margin-left: 3cm;">FOLHA: <?=intval($r->FOLHAESPECIAL)?></h3>	
												</div>
												<br>


												<h1 style="text-align: center"> REGISTRO DE INTERDIÇÃO</h1>
												<br>
												<h3 style="text-align: center">
													NOME: <?=$r->NOME?><br>
													MATRÍCULA: <?=$r->MATRICULA?></h3>	
<p style="text-align: justify;margin-left: 2cm; margin-right: 2cm;">












Livro E-<?=$r->LIVROESPECIAL?>, folha <?=$r->FOLHAESPECIAL?> e registro <?=$r->TERMOESPECIAL?>, de Registro de Emancipação, Interdição e Ausência, deste Ofício, lavrado aos 	

													<?php //echo date('d/m/Y', strtotime($r->dataObito));

																$data = $r->DATAENTRADA ;
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

													?>, o assento de interdição de:  <p style="text-align: center; font-weight: bold"><?=$r->NOME?></p>,<br>

															<!-- QUALIFICACAO-------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify; margin-left: 2cm; margin-right: 2cm;">
					<?php if ($r->NOME!=''): ?>	


					<?php if ($r->ESTADOCIVIL == 'CA'): ?>
					Casado(a),
					<?php elseif ($r->ESTADOCIVIL == 'SO'): ?>
					Solteiro(a),
					<?php elseif ($r->ESTADOCIVIL == 'DI'): ?>
					Divorciado(a),	
					<?php elseif ($r->ESTADOCIVIL == 'VI'): ?>
					Viúvo(a),	
					<?php elseif ($r->ESTADOCIVIL == 'UN'): ?>
					Em união estável,
					<?php else: ?>

					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADE!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADE)); foreach($c as $c):?>
					<?=ucfirst(mb_strtolower($c->cidade))?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>

					<?php if ($r->PROFISSAO!=''): ?>
					<?=echo_exist($r->PROFISSAO)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECO!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECO)?> <?=echo_exist($r->BAIRRO)?>,
					<?php endif ?>

					<?php if ($r->CIDADE!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADE)); foreach($c as $c):?>
					<?=ucfirst(mb_strtolower($c->cidade))?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 

					<?php if ($r->CPF!=''): ?>
					CPF de número <?=$r->CPF?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTO!=''): ?>
						Nascido (a) em
						<?php
						$data = $r->DATANASCIMENTO ;
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


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTO))?>), Com 
					<?=date('Y',strtotime($r->DATAENTRADA)) - date('Y', strtotime($r->DATANASCIMENTO))?> anos de idade.
					<?php endif ?>
					<?php endif ?>
				
			
		<!-- QUALIFICACAO-------------------------------------------------------------------------------------------------------->



													 registrado neste Ofício no Livro de nº <?=$r->LIVROREGISTRONASCIMENTO?>, Folha <?=$r->FOLHAREGISTRONASCIMENTO?>,  Conforme  Conforme sentença expedida pelo(a) Exmo(a). Juiz(a) <?=$r->JUIZ?>, <?=$r->VARA?> em <?=date('d/m/Y',strtotime($r->DATASENTENCA))?>,

													<?php if ($r->CARTORIOESCRITURA!='' && $r->FOLHAESCRITURA!=''): ?>
														Escritura pública lavrada em, <?=$r->CARTORIOESCRITURA?>, sob livro <?=$r->LIVROESCRITURA?> as fls. <?=$r->FOLHAESCRITURA?>, registro nº <?=$r->REGISTROESCRITURA?>.
													<?php endif ?>
													<?php if ($r->MANDADOJUDICIAL!=''): ?>
														Mandado judicial, <?=$r->MANDADOJUDICIAL?>, processo nº <?=$r->NUMEROPROCESSO?>, 

													<?php endif ?>	
														foi nomeado curador <?=$r->NOMECURADOR?>, 
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

													<?php endif ?> <?=mb_strtolower($r->PROFISSAOCURADOR)?>, residente e domiciliado em <?=$r->ENDERECOCURADOR?>, <?=$r->BAIRROCURADOR?>, <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADECURADOR)); foreach($c as $c):?>
													<?=$c->cidade?> (<?=$c->uf?>)<?php endforeach ?>, CPF de número <?=$r->CPFCURADOR?>. Sendo O requerente da interdição <?=$r->NOMEREQUERENTE?>, que tem como causa, <?=rtrim($r->CAUSAINTERDICAO)?>. 
													<?php if ($r->TIPOINTERDICAO == 'PARCIAL'): ?>
													A interdição é parcial e tem como limites, <?=$r->LIMITESCURADORIA?>.
													<?php else: ?>
													A interdição é total.	
													<?php endif ?>
													O interdito está internado em <?=$r->LUGARINTERNACAO?>.
												
								










</p>



<p style="text-align: center;">


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


	
<div style="width: 60%; position: absolute;margin-left: 2cm ">
	<?php
		$retorno = json_decode($r->RETORNOSELODIGITAL,true);
		$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];
	include_once('../../../plugins/phpqrcode/qrlib.php');
	
function tirarAcentos($string){
return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/"),explode(" ","a A e E i I o O u U n N C c"),$string);
}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->NOME).'.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		echo '<img style="max-width:20%; margin-top:-12px;margin-left:10px;" src="'.$nome.'" />';
		?>
	
	<p style="font-weight: bold; font-size: 6px;"><?=$textoselo?></p>
</div>

<?php endif ?>
<?php endforeach  ?>
</body>
</html>
