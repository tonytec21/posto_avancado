
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


	if ($r->TIPOASSENTO !='ORDEM') {
$_SESSION['erro'] = 'NÃO SERÁ POSSÍVEL EMITIR, NOME DO JUIZ EXPEDIDOR NÃO ENCONTRADO!';
echo '<span style="color:white; background:red"> NÃO SERÁ POSSÍVEL EMITIR, NOME DO JUIZ EXPEDIDOR NÃO ENCONTRADO!!</span>';
break;
}	
		?>

<div style="width: 100%;" >
<h3 style="text-align: left;display: inline;margin-left: 1cm">LIVRO: A <?=intval($r->LIVRONASCIMENTO)?></h3>
<h3 style="text-align: center; display: inline;margin-left: 4cm;">ORDEM: <?=$r->TERMONASCIMENTO?></h3>
<h3 style="text-align: right; display: inline;margin-left: 3cm;">FOLHA: <?=intval($r->FOLHANASCIMENTO)?></h3>	
</div>
<br>


<h1 style="text-align: center"> Registro de Nascimento</h1>	

<p style="text-align: justify;">Aos 	<?php //echo date('d/m/Y', strtotime($r->dataObito));

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
	} else {echo  ucfirst(GExtenso::numero($novaData[2]));}
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

	echo GExtenso::numero($novaData[0]);

	?>neste

	<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?><?=$w->strRazaoSocial?> Estado do Maranhão <?php endforeach ?>, em cartório, por mandato judicial expedido pelo exmo. Juiz <?=$r->JUIZMANDATO?>, do(a) <?=$r->VARAMANDATO?> em <?=date('d/m/Y', strtotime($r->DATAEXPEDICAOMANDATO))?> nº <?=$r->NUMEROMANDATO?>, por sentença datada de <?=date('d/m/Y', strtotime($r->DATASENTENCAMANDATO))?>, onde consta a DNV nº  <?=$r->DNV?>, procedi o registro de uma criança do sexo 	<?php if ($r->SEXONASCIDO == 'M') :?>
	Masculino
	<?php else: ?>	
	Feminino
	<?php endif ?>, ocorrido aos <?php

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

																	?> 


																as <?=$r->HORANASCIMENTO?> Horas, no(a) <?=mb_strtoupper($r->LOCALNASCIMENTO)?>, <?=mb_strtoupper($r->ENDERECOLOCALNASCIMENTO)?>, em municipio de 

													<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENASCIMENTO)); foreach($c as $c):?>
													<?=$c->cidade?> (<?=$c->uf?>)
													<?php endforeach ?>,
que recebeu o nome de <b><?=mb_convert_case($r->NOMENASCIDO, MB_CASE_UPPER, "UTF-8")?></b>, CPF de número <?=$r->CPFNASCIDO?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENASCIDO)); foreach($c as $c):?>
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
												<?php endif ?>, 

Observações:
registro de NASCIMENTO efetuado conforme mandado Nº <?=$r->NUMEROMANDATO?>, emitido no dia <?=date('d/m/Y', strtotime($r->DATAEXPEDICAOMANDATO))?>
pelo MM. Dr. <?=$r->JUIZMANDATO?>, do(a) <?=$r->VARAMANDATO?>. nada mais se declarou. Dou fé. Lido e achado conforme assina o declarante Eu 	<?=$_SESSION['nome']?> digitei subscrevo e assino.Selo de Fiscalização: <?=$r->SELO?>.
(Registro isento de emolumentos). - Matrícula
da 1ª Via da Certidão: <?=$r->MATRICULA?>-------------------------------------------------------------------------------
<span style="font-size: 8px;">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>

<br><br>
	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center;margin-top: -10px;"><?=$_SESSION['nome']?></p> 
		<p style="text-align: center;margin-top: -10px;"><?=$_SESSION['funcao']?></p> 


	</p>
	 </fieldset>

<?php endforeach  ?>
</body>
</html>
