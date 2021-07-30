<!DOCTYPE html>
<?php include('../../../controller/db_functions.php');
$pdo = conectar();
#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
if (isset($_GET['id_apagar'])) {$id_apagar = $_GET['id_apagar'];
    $del = $pdo->prepare("DELETE FROM salvar_editor where IDREGISTRO ='$id_apagar' and TIPO = 'TERMO_OBITO' ");
    $del->execute();
    }
function idade_civil_antigo($nascimento,$dataregistro){
  $data = explode("-",$nascimento);
  $registro = explode("-",$dataregistro);

  $ano = $data[0];
  $mes = $data[1];
  $dia = $data[2];

  $ano1 = $registro[0];
  $mes1 = $registro[1];
  $dia1 = $registro[2];



    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime( 0, 0, 0, $mes1, $dia1, $ano1);
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

    // Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

    return $idade;

}
?>
<html>
<head>
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
body{ font-size: 14px;font-family: "Arial";margin-left: 2cm;margin-bottom: -10cm;}
</style>
</head>

<body>

<?php 
$busca_ja_existe = $pdo->prepare("SELECT * FROM salvar_editor where IDREGISTRO = '$id' and TIPO = 'TERMO_OBITO'");
	$busca_ja_existe->execute();

	if ($busca_ja_existe->rowCount()!=0) {
	$recebe_texto = $busca_ja_existe->fetch(PDO::FETCH_ASSOC);
	echo $recebe_texto['TEXTO'];
	}	
	?>
	<?php if ($busca_ja_existe->rowCount()==0): ?>

	<?php $r = PESQUISA_ALL_ID('registro_obito_novo',$id);
	foreach ($r as $r ) :
	#aqui vai preencher os inputs, vou preencher só um pra vc ver:
		?>
<?php 
if ($r->ESTADOCIVIL == 'SO'  ) {
	$ec = "SOLTEIRO (a)";
}
 if($r->ESTADOCIVIL == 'CA'   ){
	$ec="CASADO (a)";
}


 if($r->ESTADOCIVIL == 'DI'  ){
	$ec="DIVORCIADO (a)";
}

 if($r->ESTADOCIVIL == 'VI'  ){
	$ec="VIUVO (a)";
}


 if($r->ESTADOCIVIL == 'UN' ){
	$ec="EM UNÎÃO ESTÁVEL";
}

 if($r->ESTADOCIVIL == 'SJ' ){
	$ec="SEPARADO JUDICIALMENTE";
}
	?>
<img style="width: 100%;height: 4cm; margin-top: -60px;" src="../bd_INSERTS/cabecalhos/CAPA.jpg">
<div style="width: 100%; text-align: center; display: block;margin-top: -30px;" >
												<h3 style="display: inline-block;">LIVRO: C <?=intval($r->LIVROOBITO)?></h3>
												<h3 style="display: inline-block;margin-left: 1cm">ORDEM: <?=$r->TERMOOBITO?></h3>
												<h3 style="display: inline-block;margin-left: 1cm">FOLHA: <?=intval($r->FOLHAOBITO)?></h3>	
												</div>
<hr style="border:1px solid black;margin-top: -5px">

<?php if ($r->DATAENTRADA==''): ?>
	<span style="color: red">O CAMPO "DATA DO REGISTRO" NÃO FOI PREENCHIDO POR FAVOR RETORNE E PREENCHA.</span>
<?php break; endif ?>

<?php if ($r->DATAOBITO==''): ?>
	<span style="color: red">O CAMPO "DATA DO OBITO" NÃO FOI PREENCHIDO POR FAVOR RETORNE E PREENCHA.</span>
<?php break; endif ?>

<h1 style="text-align: center;margin-top: -5px">Registro de Óbito</h1>	

<p style="text-align: justify;">Ao(s) 	<?php //echo date('d/m/Y', strtotime($r->dataObito));
	
	if ($r->DATAENTRADA == '') {
	$data = date('Y-m-d');
		}	
	else{		
	$data = $r->DATAENTRADA ;
	}
	$novaData = explode("-", $data);

	if ($novaData[2] == '01' || $novaData[2] == '1') {
		echo "Primeiro dia  ";
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

	?> (<?=date('d/m/Y',strtotime($r->DATAENTRADA))?>), neste(a)

	<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?>


													<span style="text-transform: capitalize;"><?=$w->strRazaoSocial?></span> Estado do Maranhão, <?php endforeach ?> compareceu neste ofício de Registro Civil  <span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMEDECLARANTE)?></span>,
														<?=strtolower($r->NACIONALIDADEDECLARANTE)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEDECLARANTE)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
														<?php endforeach ?> 
														<?php if ($r->ESTADOCIVILDECLARANTE == 'CA'): ?>
														casado(a),
														<?php elseif ($r->ESTADOCIVILDECLARANTE == 'SO'): ?>
														solteiro(a),
														<?php elseif ($r->ESTADOCIVILDECLARANTE == 'DI'): ?>
														divorciado(a),	
														<?php elseif ($r->ESTADOCIVILDECLARANTE == 'VI'): ?>
														viúvo(a),	
														<?php elseif ($r->ESTADOCIVILDECLARANTE == 'UN'): ?>
														em união estável,
														<?php elseif ($r->ESTADOCIVILDECLARANTE == 'SJ'): ?>
														separado judicialmente
														<?php else: ?>

														<?php endif ?><?=mb_strtolower($r->PROFISSAODECLARANTE)?>, portador do RG de número <?=$r->RGDECLARANTE?>/<?=$r->ORGAOEMISSORDECLARANTE?>, inscrito no CPF de número <?=$r->CPFDECLARANTE?>,  

														<?php if ($r->DATANASCIMENTODECLARANTE!=''): ?>


														nascido em
														<?php //echo date('d/m/Y', strtotime($r->dataObito));

														$data = $r->DATANASCIMENTODECLARANTE ;
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


														?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTODECLARANTE))?>),	
														<?php if ($r->DATANASCIMENTODECLARANTE!=''): ?>
														com <?=idade_civil_antigo($r->DATANASCIMENTODECLARANTE,$r->DATAOBITO)?> anos de idade, 
														<?php endif ?><?php endif ?>
														residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECODECLARANTE)?>, <?=mb_strtolower($r->BAIRRODECLARANTE)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEDECLARANTE)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>,
	 que a apresentando a DO nº <span style="font-weight: bold"><?=$r->NDO?></span>, a qual se encontra arquivada nesta Unidade de Serviço e exibindo atestado de óbito, firmado pelo  Dr. <?=$r->MEDICO?>, CRM nº <?=$r->CRM?>, que consta como causa da morte <b><?=mb_strtoupper($r->CAUSAOBITO)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOB)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOC)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOD)?></b>, sendo a morte

	 <?php if ($r->TIPOMORTE == 'NAT'): ?>
	 	por motivo natural,

	 	 <?php elseif ($r->TIPOMORTE == 'VIO'): ?>
	 	por motivo violento,
	 	<?php else: ?>
	 		
	 <?php endif ?>

	  registra-se que em, 
	

 <?php //echo date('d/m/Y', strtotime($r->dataObito));

	$data = $r->DATAOBITO ;
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

	?> (<?=date('d/m/Y', strtotime($r->DATAOBITO))?>),  <?php if ($r->HORAOBITO!='' && !empty($r->HORAOBITO)): ?> às <?=$r->HORAOBITO?> Horas,<?php endif ?> neste Subdistrito, no(a) <?=$r->LOCALMORTE?>, situado em <?=$r->ENDERECOOBITO?>, <?php $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEOBITO));foreach($c as $c): ?><span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>, faleceu: 

<p style="text-align: center; font-weight: bold;">
<?php if ($r->NOME !='DESCONHECIDO'): ?>
	<?=mb_strtoupper($r->NOME)?>,
<?php endif ?>
<?php if ($r->NOME =='DESCONHECIDO'): ?>
 um (a) individuo de identidade desconhecida,
<?php endif ?> </p><?=strtolower($r->NACIONALIDADE)?>, do sexo 
	<?php if ($r->SEXO == 'M'):?>Masculino, <?php else: ?> Feminino, <?php endif ?> de cor 
	
	<?php 
	if ($r->COR=='BR') {
		$cor = 'branca';
	} 
	if ($r->COR=='PR') {
		$cor = 'preta';
	} 
	if ($r->COR=='PA') {
		$cor = 'parda';
	} 
	if ($r->COR=='AM') {
		$cor = 'amarela';
	} 
	if ($r->COR=='IN') {
		$cor = 'indígena';
	}
	if ($r->COR=='') {
	 	$cor = '';
	 } 


	?>
<?=$cor?>, <?php if ($r->DATANASCIMENTO!=''): ?> nascido (a) em
					<?php //echo date('d/m/Y', strtotime($r->dataObito));

					$data = $r->DATANASCIMENTO ;
					$novaData = explode("-", $data);

					if ($novaData[2] == '01' || $novaData[2] == '1') {
						echo "Primeiro   ";
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
					  

					?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTO))?>)
					
					
					  com					  
					<?=retorna_idade_civil($r->DATANASCIMENTO)?> anos de idade.
					<?php endif ?> 




<?php if ($r->NOME !='DESCONHECIDO'): ?> <?=mb_strtolower($r->PROFISSAO)?>, natural de <?php $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADE));foreach($c as $c): ?><span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>,<?php endif ?> <?php if ($r->NOME !='DESCONHECIDO'): ?> domiciliado e residente em <?=$r->ENDERECO?>, <?=$r->BAIRRO?>, 
<?php $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADE));foreach($c as $c): ?><span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?> 

<?php if (isset($ec) && $ec!=''): ?>
	<?=$ec?>, 
<?php endif ?>
<?php if ($r->ESTADOCIVIL == 'CA' || $r->ESTADOCIVIL == 'VI'): ?>
	sendo, o(a) conjuge <?=mb_strtoupper($r->NOMECONJUGE)?>, casamento celebrado no cartório <?=mb_strtoupper($r->CARTORIOCASAMENTO)?>,
<?php endif ?>

 <?php if ($r->SEXO == 'M') :?>
														Filho de
														<?php else: ?>	
														Filha de
														<?php endif ?>
													
													<!--QUALIFICACAO PAI------------------------------------------------------------------------------------------------->	
														<?php if ($r->NOMEPAI!='NULL' && $r->NOMEPAI!=''):?>
														<span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMEPAI)?></span>,
														<?=strtolower($r->NACIONALIDADEPAI)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAI)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
														<?php endforeach ?> 
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
														<?php elseif ($r->ESTADOCIVILPAI == 'SJ'): ?>
														separado judicialmente,
														<?php else: ?>

														<?php endif ?><?=mb_strtolower($r->PROFISSAOPAI)?>, portador do RG de número <?=$r->RGPAI?>/<?=$r->ORGAOEMISSORPAI?>, inscrito no CPF de número <?=$r->CPFPAI?>,  

														<?php if ($r->DATANASCIMENTOPAI!=''): ?>


														nascido em
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


														?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOPAI))?>),	
														<?php if ($r->DATANASCIMENTOPAI!=''): ?>
														com <?=idade_civil_antigo($r->DATANASCIMENTOPAI,$r->DATANASCIMENTO)?> anos de idade, 
														<?php endif ?><?php endif ?>
														residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOPAI)?>, <?=mb_strtolower($r->BAIRROPAI)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAI)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>,	  

														e de 
														<?php endif ?>

														<span style="text-transform: capitalize;font-weight: bold"> <?=mb_strtoupper($r->NOMEMAE)?></span>, <?=strtolower($r->NACIONALIDADEMAE)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAE)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
														<?php endforeach ?>

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
														<?php elseif ($r->ESTADOCIVILMAE == 'SJ'): ?>
														separada judicialmente,
														<?php else: ?>

														<?php endif ?>

														<?=mb_strtolower($r->PROFISSAOMAE)?>,  portadora do RG de número <?=$r->RGMAE?>/<?=$r->ORGAOEMISSORMAE?>, inscrita no CPF de número <?=$r->CPFMAE?>,

														<?php if ($r->DATANASCIMENTOMAE!=''): ?>

														nascida em
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



														?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOMAE))?>),	
														<?php endif ?>
														<?php if ($r->DATANASCIMENTOMAE!=''): ?>
														com <?=idade_civil_antigo($r->DATANASCIMENTOMAE, $r->DATANASCIMENTO)?> anos de idade na ocasião do parto, e agora com com <?=idade_civil_antigo($r->DATANASCIMENTOMAE,$r->DATANASCIMENTO)?> anos de idade,
														<?php endif ?> residente e domiciliada em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOMAE)?>, <?=mb_strtolower($r->BAIRROMAE)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAE)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?><?php endif ?> que será sepultado em <?=$r->LOCALSEPULTAMENTO?>. O declarante apresentou os seguintes documentos do falecido <?php if ($r->NOME !='DESCONHECIDO'): ?> RG nº <?=$r->RG?>/<?=$r->ORGAOEMISSOR?><?php endif ?>. Declaração de óbito nº <?=$r->NDO?>, CPF de número <?=$r->CPF?>, 

<?php if ($r->strTituloEleitor!=''): ?>
	 Titulo de Eleitor nº <?=$r->strTituloEleitor?>.
<?php endif ?>
<?php if ($r->strCtps!=''): ?>
	 CTPS nº <?=$r->strCtps?>.
<?php endif ?>
<?php if ($r->strPassaporte!=''): ?>
	Passaporte nº <?=$r->strPassaporte?>.
<?php endif ?>
<?php if ($r->strPisNis!=''): ?>
	 PIS/NIS: nº <?=$r->strPisNis?>.
<?php endif ?>
<?php if ($r->strCartSaude!=''): ?>
	 Cartão Saúde: nº <?=$r->strCartSaude?>.
<?php endif ?>


<?php if ($r->DEIXOUBENS == 'S'): ?>
	Deixou Bens, Com testamento Conhecido, 

<?php elseif ($r->DEIXOUBENS == 'S2'): ?>
	Deixou Bens, Sem testamento Conhecido,
<?php elseif ($r->DEIXOUBENS == 'N'): ?>
	Não Deixou Bens, Com testamento Conhecido,	
<?php else: ?>
Não deixou bens, Sem testamento Conhecido,	
<?php endif ?> 

<?php if ($r->ELEITOR == 'S'): ?>
	Era eleitor,
<?php else: ?>
não sendo eleitor,	
<?php endif ?>

<?php if ($r->DEIXOUFILHOS == 'S'): ?>
	Deixou filhos(as), sendo eles, <?=mb_strtoupper($r->NOMEFILHOS)?>.
<?php else: ?>
	Não deixou nenhum filho(a).
<?php endif ?>
<?php if ($r->NOMETESTEMUNHA1!='' || $r->NOMETESTEMUNHA2!=''): ?>
  

												  São testemunhas do assento 
													
																<span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMETESTEMUNHA1)?></span>,
														<?=strtolower($r->NACIONALIDADETESTEMUNHA1)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA1)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
														<?php endforeach ?> 
														<?php if ($r->ESTADOCIVILTESTEMUNHA1 == 'CA'): ?>
														casado(a),
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'SO'): ?>
														solteiro(a),
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'DI'): ?>
														divorciado(a),	
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'VI'): ?>
														viúvo(a),	
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'UN'): ?>
														em união estável,
														<?php else: ?>

														<?php endif ?><?=mb_strtolower($r->PROFISSAOTESTEMUNHA1)?>, portador do RG de número <?=$r->RGTESTEMUNHA1?>/<?=$r->ORGAOEMISSORTESTEMUNHA1?>, inscrito no CPF de número <?=$r->CPFTESTEMUNHA1?>,  

														<?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>


														nascido em
														<?php //echo date('d/m/Y', strtotime($r->dataObito));

														$data = $r->DATANASCIMENTOTESTEMUNHA1 ;
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


														?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOTESTEMUNHA1))?>),	
														<?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>
														com <?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA1,$r->DATAOBITO)?> anos de idade, 
														<?php endif ?><?php endif ?>
														residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOTESTEMUNHA1)?>, <?=mb_strtolower($r->BAIRROTESTEMUNHA1)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA1)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,<?php endforeach ?>

													e 	 
																<span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMETESTEMUNHA2)?></span>,
														<?=strtolower($r->NACIONALIDADETESTEMUNHA2)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA2)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
														<?php endforeach ?> 
														<?php if ($r->ESTADOCIVILTESTEMUNHA2 == 'CA'): ?>
														casado(a),
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'SO'): ?>
														solteiro(a),
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'DI'): ?>
														divorciado(a),	
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'VI'): ?>
														viúvo(a),	
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'UN'): ?>
														em união estável,
														<?php else: ?>

														<?php endif ?><?=mb_strtolower($r->PROFISSAOTESTEMUNHA2)?>, portador do RG de número <?=$r->RGTESTEMUNHA2?>/<?=$r->ORGAOEMISSORTESTEMUNHA2?>, inscrito no CPF de número <?=$r->CPFTESTEMUNHA2?>,  

														<?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>


														nascido em
														<?php //echo date('d/m/Y', strtotime($r->dataObito));

														$data = $r->DATANASCIMENTOTESTEMUNHA2 ;
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


														?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOTESTEMUNHA2))?>),	
														<?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>
														com <?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA2,$r->DATAOBITO)?> anos de idade, 
														<?php endif ?><?php endif ?>
														residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOTESTEMUNHA2)?>, <?=mb_strtolower($r->BAIRROTESTEMUNHA2)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA2)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>.
													<?php endif ?>

Isento de emolumentos conforme lei 9534 DE 10/12/97. Eu,

<span style="text-transform: capitalize;"><?=mb_strtolower($_SESSION['nome'])?>,</span> <?=mb_strtolower($_SESSION['funcao'])?>, 
 digitei e assino. Selo de Fiscalização: <?=$r->SELO?>.
(Registro isento de emolumentos). - Matrícula
da 1ª Via da Certidão: <?=$r->MATRICULA?>-------------------------------------------------------------------------------
<span style="font-size: 8px;">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>



<?php if ($r->QUALIDADEDECLARANTE == 'MAEDEMENOR'): 
												$repmae = explode(",", $r->ROGODECLARANTE);	
													?>
												
												<span style="font-weight: bold">	Observação: A mãe é de menor de idade, estando acompanhado do sr(a) <?=$repmae[0]?> sendo o mesmo seu(a) <?=$repmae[1]?>. Que assina este termo. </span>
												<?php endif ?>


	 

<br><br>
	<?php if ($r->QUALIDADEDECLARANTE == 'MAEDEMENOR'): ?>
		<br>
		<p style="max-width:  100%; text-align: center;">_________________________________ <br>  <?=mb_strtoupper($repmae[0])?></p><br><br>
		<?php endif ?>
		
<?php if (empty($r->ROGODECLARANTE)): ?>	
	
		
			<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=strtoupper($r->NOMEDECLARANTE)?></p>
			<br>
	
		<?php endif ?>	
	<?php if (!empty($r->ROGODECLARANTE)): $busca_rogo_pai = $pdo->prepare("SELECT * from pessoa where strCPFcnpj = '$r->ROGODECLARANTE'"); $busca_rogo_pai->execute();
		$brp = $busca_rogo_pai->fetchAll(PDO::FETCH_OBJ);	
		foreach ($brp as $b):
		 ?>
	
		

		 <p style="display: inline-block;width: 40%; text-align:justify;font-weight: bold">
			O declarante, na impossibilidade de assinar, está acompanhado de seu assinante a rogo, 
			<?=mb_strtoupper($b->strNome)?>, 

			<?php if (!empty($b->strProfissao)): ?>
			<?=mb_strtolower($b->strProfissao)?>, 	
			<?php endif ?>

			<?php if (!empty($b->strNacionalidade)): ?>
			<?=$b->strNacionalidade?>, 	
			<?php endif ?>

			<?php if ($b->setEstadoCivil == 'CA'): ?>
			casado(a),
			<?php elseif ($b->setEstadoCivil == 'SO'): ?>
			solteiro(a),
			<?php elseif ($b->setEstadoCivil == 'DI'): ?>
			divorciado(a),	
			<?php elseif ($b->setEstadoCivil == 'VI'): ?>
			viúvo(a),	
			<?php elseif ($b->setEstadoCivil == 'UN'): ?>
			em união estável,
			<?php else: ?>

			<?php endif ?>

			<?php if (!empty($b->strNaturalidade)): ?>
			natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($b->strNaturalidade)); foreach($c as $c):?>
			<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
			<?php endforeach ?> 
			<?php endif ?>	

			residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($b->strLogradouro)?>, <?php if ($b->strBairro!=''): ?>

			<?=mb_strtolower($b->strBairro)?>,	<?php endif ?></span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($b->intUFcidade)); foreach($c as $c):?>
			<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>. Que assina este termo.

			</p>
			

		


	
			
		
	 	<table style="border: none; display: inline-block; margin-left: 40px; width: 50%; margin-bottom: -30px">
				<tr style="border: none">
					<td style="border: 1px dashed black;max-width: 50%!important; padding: 30px;"></td>
					<td style="border: none; text-align: center; padding-left: 10px;">_______________________________________________</td>
				</tr>
				<tr style="border: none">
					<td style="border: none;text-align: center;">DIGITAL <?=strtoupper($r->NOMEDECLARANTE)?> </td>
					<td style="border: none; text-align: center; "><p style="margin-top: -40px"><?=strtoupper($b->strNome)?></p></td>
				</tr>
			</table>
			<br><br><br>
		<?php endforeach; endif ?>

<?php if ($r->NOMETESTEMUNHA1 != '' && $r->NOMETESTEMUNHA1 != 'NAO_DECLARADO' && $r->NOMETESTEMUNHA1 !='NULL'): ?>

<p style="max-width:  100%; text-align: center;">________________________________________ <br> <?=$r->NOMETESTEMUNHA1?></p>
<?php endif ?>


<?php if ($r->NOMETESTEMUNHA2 != '' && $r->NOMETESTEMUNHA2 != 'NAO_DECLARADO' && $r->NOMETESTEMUNHA2 !='NULL'): ?>
	
<p style="max-width:  100%; text-align: center;">________________________________________ <br> <?=$r->NOMETESTEMUNHA2?></p>
<?php endif ?>

	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center"><?=mb_strtoupper($_SESSION['nome'])?></p> 
		<p style="text-align: center; margin-top: -10px;"><?=mb_strtoupper($_SESSION['funcao'])?></p> 


	</p>



<div style="width: 60%; position: absolute;margin-top: ">
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


		#echo '<img style="max-width:20%; margin-top:-12px;margin-left:10px;" src="'.$nome.'" />';
		?>
	
	<!--p style="font-weight: bold; font-size: 6px;"><?=$textoselo?></p-->
</div>
<table style="border:none; max-width: 100%;">
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


	

<?php endforeach; endif;  ?>
</body>
</html>
