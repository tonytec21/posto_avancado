<!DOCTYPE html>
<?php include('../../../controller/db_functions.php');

#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
?>
<html>
<head>
	<title>Registro - Nascimento</title>
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
	<?php $r = PESQUISA_ALL_ID('registro_nascimento_novo',$id);
	foreach ($r as $r ) :
	#aqui vai preencher os inputs, vou preencher só um pra vc ver:
		?>
	
	<div style="width: 100%;" >
												<h3 style="text-align: left;display: inline;margin-left: 1cm">LIVRO: A <?=intval($r->LIVRONASCIMENTO)?></h3>
												<h3 style="text-align: center; display: inline;margin-left: 4cm;">ORDEM: <?=$r->TERMONASCIMENTO?></h3>
												<h3 style="text-align: right; display: inline;margin-left: 3cm;">FOLHA: <?=intval($r->FOLHANASCIMENTO)?></h3>	
												</div>
												<br>


												<h1 style="text-align: center"> Registro de Nascimento</h1>	

												<p style="text-align: justify;">Ao(s) 	

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

													?> 
													neste(a)


													<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?><?=mb_strtoupper($w->strRazaoSocial)?> Estado do Maranhão, <?php endforeach ?> em cartório,  





												<!--TIPOS DE DECLARANTES-->

																<?php if ($r->QUALIDADEDECLARANTE =='PAI'): ?>
																compareceu <?=mb_strtoupper($r->NOMEPAI)?>, na qualidade de <?=$r->QUALIDADEDECLARANTE?>, apresentando a DNV nº <b> <?=$r->DNV?></b>,  e declarou que no dia	

																<?php elseif ($r->QUALIDADEDECLARANTE =='MAE'): ?>
																compareceu <?=mb_strtoupper($r->NOMEMAE)?>, na qualidade de <?=$r->QUALIDADEDECLARANTE?>, apresentando a DNV nº <b> <?=$r->DNV?></b>, e declarou que no dia
																<?php elseif ($r->QUALIDADEDECLARANTE =='AMBOSPAI'): ?>
																compareceram Os pais do registrado, apresentando a DNV nº <b> <?=$r->DNV?></b>,  e declararam que no dia

																<?php else : ?>
																compareceu	<?=mb_strtoupper($r->NOMEDECLARANTE)?>, apresentando a DNV nº <b> <?=$r->DNV?></b>,

																<?php endif ?>


																 <?php //echo date('d/m/Y', strtotime($r->dataObito));

																				$data = $r->DATANASCIMENTO ;
																				$novaData = explode("-", $data);
																				echo $novaData[2];
																				/*
																				if ($novaData[2] == '01' || $novaData[1] == '1') {
																					echo " Um de  ";
																				}elseif ($novaData[2] == '02' || $novaData[1] == '2') {
																					echo " Dois de ";
																				} elseif ($novaData[2] == '03' || $novaData[1] == '3') {
																					echo " Três ";
																				} elseif ($novaData[2] == '04' || $novaData[1] == '4') {
																					echo " Quatro de ";
																				} elseif ($novaData[2] == '05' || $novaData[1] == '5') {
																					echo " Cinco de ";
																				} elseif ($novaData[2] == '06' || $novaData[1] == '6') {
																					echo " Seis de ";
																				} elseif ($novaData[2] == '07' || $novaData[1] == '7') {
																					echo " Sete de ";
																				} elseif ($novaData[2] == '08' || $novaData[1] == '8') {
																					echo " Oito de ";
																				} elseif ($novaData[2] == '09' || $novaData[1] == '9') {
																					echo " Nove de ";
																				} else {echo  ucfirst(GExtenso::numero($novaData[2]));}
																				*/
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

																	?> 


																as <?=$r->HORANASCIMENTO?> Horas, no(a) <?=mb_strtoupper($r->LOCALNASCIMENTO)?>, <?=mb_strtoupper($r->ENDERECOLOCALNASCIMENTO)?>, em municipio de 

													<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENASCIMENTO)); foreach($c as $c):?>
													<?=$c->cidade?> (<?=$c->uf?>)
													<?php endforeach ?>, Nasceu uma criança do sexo 
													<?php if ($r->SEXONASCIDO == 'M') :?>
													Masculino,
													<?php else: ?>	
													Feminino,
													<?php endif ?> que recebeu o nome de <b><?=mb_convert_case($r->NOMENASCIDO, MB_CASE_UPPER, "UTF-8")?></b>, CPF de número <?=$r->CPFNASCIDO?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENASCIDO)); foreach($c as $c):?>
													<?=$c->cidade?> (<?=$c->uf?>)
													<?php endforeach ?>

														<?php if ($r->SEXONASCIDO == 'M') :?>
														Filho de
														<?php else: ?>	
														Filha de
														<?php endif ?>
													
													<!--QUALIFICACAO PAI-->	
													<?php if ($r->NOMEPAI!='NULL' && $r->NOMEPAI!=''):?>
													 <span style="text-transform: capitalize;"><?=mb_strtolower($r->NOMEPAI)?></span>, 
													<?php if ($r->ESTADOCIVILPAI == 'CA'): ?>
													casado(a),
													<?php elseif ($r->ESTADOCIVILPAI == 'SO'): ?>
													solteiro(a),
													<?php elseif ($r->ESTADOCIVILPAI == 'DI'): ?>
													divorciado(a),	
													<?php elseif ($r->ESTADOCIVILPAI == 'VI'): ?>
													viúvo(a),	
													<?php elseif ($r->ESTADOCIVILPAI == 'UN'): ?>
													em união estável,
													<?php else: ?>

													<?php endif ?> <?=strtolower($r->NACIONALIDADEPAI)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAI)); foreach($c as $c):?>
													<?=$c->cidade?> (<?=$c->uf?>),
													<?php endforeach ?>  <?=strtolower($r->PROFISSAOPAI)?>, residente e domiciliado em <?=$r->ENDERECOPAI?>, <?=$r->BAIRROPAI?>, <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAI)); foreach($c as $c):?>
													<?=$c->cidade?> (<?=$c->uf?>)<?php endforeach ?>, portador do RG de número <?=$r->RGPAI?>/<?=$r->ORGAOEMISSORPAI?> e CPF de número <?=$r->CPFPAI?>.


													 Nascido em
												  <?php //echo date('d/m/Y', strtotime($r->dataObito));

												  $data = $r->DATANASCIMENTOPAI ;
												  $novaData = explode("-", $data);

												  if ($novaData[2] == '01' || $novaData[2] == '1') {
												    echo " Primeiro   ";
												  }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
												    echo " Dois  ";
												  } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
												    echo " Três ";
												  } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
												    echo " Quatro  ";
												  } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
												    echo " Cinco  ";
												  } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
												    echo " Seis  ";
												  } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
												    echo " Sete  ";
												  } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
												    echo " Oito  ";
												  } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
												    echo " Nove  ";
												  } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
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
												  

												  ?>	
													 <?php if ($r->DATANASCIMENTOPAI!=''): ?>
													 com <?=date('Y',strtotime($r->DATANASCIMENTO)) - $r->DATANASCIMENTOPAI?> anos de idade. 
													  <?php endif ?>
													  e de 
												<?php endif ?>

														 <?=mb_strtoupper($r->NOMEMAE)?>, 
													<?php if ($r->ESTADOCIVILMAE == 'CA'): ?>
													casada,
													<?php elseif ($r->ESTADOCIVILMAE == 'SO'): ?>
													solteira,
													<?php elseif ($r->ESTADOCIVILMAE == 'DI'): ?>
													divorciada,	
													<?php elseif ($r->ESTADOCIVILMAE == 'VI'): ?>
													viúva,	
													<?php elseif ($r->ESTADOCIVILMAE == 'UN'): ?>
													em união estável,
													<?php else: ?>

													<?php endif ?>

													<?=strtolower($r->NACIONALIDADEMAE)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAE)); foreach($c as $c):?>
													<?=$c->cidade?> (<?=$c->uf?>),
													<?php endforeach ?>  <?=strtolower($r->PROFISSAOMAE)?>, residente e domiciliado em <?=$r->ENDERECOMAE?>, <?=$r->BAIRROMAE?>, <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAE)); foreach($c as $c):?>
													<?=$c->cidade?> (<?=$c->uf?>)<?php endforeach ?>, portador do RG de número <?=$r->RGMAE?>/<?=$r->ORGAOEMISSORMAE?> e CPF de número <?=$r->CPFMAE?>.

												<?php if ($r->DATANASCIMENTOMAE!=''): ?>

														 Nascida em
												  <?php //echo date('d/m/Y', strtotime($r->dataObito));

												  $data = $r->DATANASCIMENTOMAE ;
												  $novaData = explode("-", $data);

												  if ($novaData[2] == '01' || $novaData[2] == '1') {
												    echo " Primeiro   ";
												  }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
												    echo " Dois  ";
												  } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
												    echo " Três ";
												  } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
												    echo " Quatro  ";
												  } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
												    echo " Cinco  ";
												  } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
												    echo " Seis  ";
												  } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
												    echo " Sete  ";
												  } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
												    echo " Oito  ";
												  } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
												    echo " Nove  ";
												  } elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
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
												  
												  

												  ?>	
												  <?php endif ?>
												<?php if ($r->DATANASCIMENTOMAE!=''): ?>
													 com <?=date('Y',strtotime($r->DATANASCIMENTO)) - $r->DATANASCIMENTOMAE?> anos de idade
													 <?php endif ?>
													<?php if ($r->AVO1PATERNO!='' || $r->AVO2PATERNO!=''): ?>
														. São seus avós paternos: 
													<?php endif ?>
													<?php if ($r->AVO1PATERNO!=''): ?>
														<?=mb_strtoupper($r->AVO1PATERNO)?> e 
													<?php endif ?>
													<?php if ($r->AVO2PATERNO!=''): ?>
														<?=mb_strtoupper($r->AVO2PATERNO)?>. 
													<?php endif ?>
													São seus avós maternos: <?=mb_strtoupper($r->AVO1MATERNO)?> e <?=mb_strtoupper($r->AVO2MATERNO)?>, 

												<?php if ($r->LUGARCASAMENTO!='' && $r->CARTORIOCASAMENTO!=''): ?>
													Os pais do nascido são casados entre si, o casamento foi feito em <?=$r->LUGARCASAMENTO?>, na cidade de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADECASAMENTO)); foreach($c as $c):?>
													<?=$c->cidade?> (<?=$c->uf?>)
													<?php endforeach ?>, no (a) Cartório <?=$r->CARTORIOCASAMENTO?>
												<?php endif ?>  Observações: Registro
Tardio feito conforme Art. 46 e seguintes da Lei 6.015 e Provimento Nº 28 do CNJ -
Conselho Nacional de Justiça.
Selo de Fiscalização: <?=$r->SELO?>. Lido e achado conforme, assina o declarante e as
testemunhas  <?=strtoupper($r->NOMETESTEMUNHA1)?>, 
	<?php if ($r->ESTADOCIVILTESTEMUNHA1 == 'CA'): ?>
	casado(a)
	<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'SO'): ?>
	solteiro(a)
	<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'DI'): ?>
	solteiro(a)	
	<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'VI'): ?>
	viúvo(a)	
	<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'UN'): ?>
	em união estável
	<?php else: ?>

	<?php endif ?>

	,<?=$r->NACIONALIDADETESTEMUNHA1?>(a), natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA1)); foreach($c as $c):?>
	<?=$c->cidade?> (<?=$c->uf?>)
	<?php endforeach ?>,  <?=$r->PROFISSAOTESTEMUNHA1?>(a), residente e domiciliado em <?=$r->ENDERECOTESTEMUNHA1?>, <?=$r->BAIRROTESTEMUNHA1?>, <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA1)); foreach($c as $c):?>
	<?=$c->cidade?> (<?=$c->uf?>)<?php endforeach ?> , portador do rg de número <?=$r->RGTESTEMUNHA1?>/<?=$r->ORGAOEMISSORTESTEMUNHA1?> e cpf de número <?=$r->CPFTESTEMUNHA1?>. com <?=date('Y') - $r->DATANASCIMENTOTESTEMUNHA1?> anos de idade e 	 <?=strtoupper($r->NOMETESTEMUNHA2)?>, 
	<?php if ($r->ESTADOCIVILTESTEMUNHA2 == 'CA'): ?>
	casado(a)
	<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'SO'): ?>
	solteiro(a)
	<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'DI'): ?>
	solteiro(a)	
	<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'VI'): ?>
	viúvo(a)	
	<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'UN'): ?>
	em união estável
	<?php else: ?>

	<?php endif ?>

	,<?=$r->NACIONALIDADETESTEMUNHA2?>(a), natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA2)); foreach($c as $c):?>
	<?=$c->cidade?> (<?=$c->uf?>)
	<?php endforeach ?>,  <?=$r->PROFISSAOTESTEMUNHA2?>(a), residente e domiciliado em <?=$r->ENDERECOTESTEMUNHA2?>, <?=$r->BAIRROTESTEMUNHA2?>, <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA2)); foreach($c as $c):?>
	<?=$c->cidade?> (<?=$c->uf?>)<?php endforeach ?> , portador do rg de número <?=$r->RGTESTEMUNHA2?>/<?=$r->ORGAOEMISSORTESTEMUNHA2?> e cpf de número <?=$r->CPFTESTEMUNHA2?>. com <?=date('Y') - $r->DATANASCIMENTOTESTEMUNHA2?> anos de idade. Autorizada do Registro
Civil das Pessoas Naturais, dou fé e assino. (Registro isento de emolumentos). - Matrícula
da 1ª Via da Certidão: <?=$r->MATRICULA?>-------------------------------------------------------------------------------
<span style="font-size: 8px;">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>


<br>

<?php if ($r->QUALIDADEDECLARANTE == 'PAI' || $r->QUALIDADEDECLARANTE =='AMBOSPAI' ): ?>
	

<?php if ($r->NOMEPAI !='NULL'): ?>
	
<?php if (isset($r->ROGOPAI) && $r->ROGOPAI!=''): ?>
<p >
<br><br>		
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Pai)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->ROGOPAI?></p>
</p>	
<?php else: ?>
<br><br>	
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=strtoupper($r->NOMEPAI)?></p>
<br>
<?php endif ?>
<?php endif ?>
<?php endif ?>

<?php if ($r->QUALIDADEDECLARANTE =='MAE' || $r->QUALIDADEDECLARANTE =='AMBOSPAI' ): ?>
<?php if (isset($r->ROGOMAE) && $r->ROGOMAE!=''): ?>
<p >
<br><br>	
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Mãe)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->ROGOMAE?></p>
</p>
<?php else: ?>
<br><br>	
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=strtoupper($r->NOMEMAE)?></p>
<br>	
<?php endif ?>
<?php endif ?>

<?php if ($r->QUALIDADEDECLARANTE !='MAE'&& $r->QUALIDADEDECLARANTE !='PAI'&& $r->QUALIDADEDECLARANTE !='AMBOSPAI' ): ?>
<?php if ($r->NOMEDECLARANTE != '' && $r->NOMEDECLARANTE != 'NAO_DECLARADO' && $r->NOMEDECLARANTE !='NULL'): ?>
<?php if (isset($r->ROGODECLARANTE) && $r->ROGODECLARANTE!=''): ?>
<p >
<br><br>	
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Declarante)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->ROGODECLARANTE?></p>
</p>	
<?php else: ?>
<br><br>	
<p style="max-width:  100%; text-align: center;">______________________________________________<br> <?=$r->NOMEDECLARANTE?></p>
<br>
<?php endif ?>
<?php endif ?>
<?php endif ?>




<?php if ($r->NOMETESTEMUNHA1 !='NULL'): ?>
	
<?php if (isset($r->ROGOTESTEMUNHA1) && $r->ROGOTESTEMUNHA1!=''): ?>
<p >
<br><br>		
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital TESTEMUNHA1)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->ROGOTESTEMUNHA1?></p>
</p>	
<?php else: ?>
<br><br>	
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=strtoupper($r->NOMETESTEMUNHA1)?></p>
<br>
<?php endif ?>
<?php endif ?>

<?php if ($r->NOMETESTEMUNHA2 !='NULL'): ?>
	
<?php if (isset($r->ROGOTESTEMUNHA2) && $r->ROGOTESTEMUNHA2!=''): ?>
<p >
<br><br>		
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital TESTEMUNHA2)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->ROGOTESTEMUNHA2?></p>
</p>	
<?php else: ?>
<br><br>	
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=strtoupper($r->NOMETESTEMUNHA2)?></p>
<br>
<?php endif ?>
<?php endif ?>




<br><br>
	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center;margin-top: -10px;"><?=$_SESSION['nome']?></p> 
		<p style="text-align: center;margin-top: -10px;"><?=$_SESSION['funcao']?></p> 





	
	</p>
	 </fieldset>

<?php
		$retorno = json_decode($r->RETORNOSELODIGITAL,true);
		$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];

	include_once('../../../plugins/phpqrcode/qrlib.php');
	
	  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->NOMENASCIDO).'.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		echo '<img style="max-width:20%; margin-top:-15px;margin-left:10px;" src="'.$nome.'" />';
		?>
	</div>
	<p style="font-weight: bold; font-size: 6px;"><?=$textoselo?></p>

<?php endforeach  ?>
</body>
</html>
