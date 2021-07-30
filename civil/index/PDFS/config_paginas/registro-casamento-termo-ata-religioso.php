<!DOCTYPE html>
<?php include('../../controller/db_functions.php');

#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];


function echo_exist($texto){
if ($texto!='' && $texto!=' ' && $texto!=NULL) {
		/*
		if (str_word_count($texto)>1 && str_word_count($texto)<7) {
			$texto = '<span style="font-weight:bold">'.$texto.'</span>';
		}

		else{
			$texto = ucfirst(mb_strtolower($texto));
		}
		*/
		return $texto;
	}
}


function cidade_estrangeiro($texto){
$tirar = array("1","2","3","4","5","6","7","8","9","0",",",);
if (intval(intval($texto) == '5300109')) {
return str_replace($tirar, "", $texto);
	}	
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

function dataum($data){
$dataAno = $data;
if (substr($dataAno, -2) == '11') {
echo GExtenso::numero($dataAno)." onze";
}
elseif (substr($dataAno, -1) == '1') {
echo GExtenso::numero($dataAno)." um";
}
else {
  echo GExtenso::numero($dataAno);
}

}

?>
<html>
<head>
	<title>Casamento - Consentimento Para Menor</title>
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

body{ font-size: 14px;font-family: "Arial"; padding-left: 1cm; padding-right: 1cm;}
</style>
</head>
<?php $r = PESQUISA_ALL_ID('registro_casamento_novo',$id);
foreach ($r as $r ) :
?>
<?php if ($r->DATACASAMENTO==''): ?>
	<span style="color: red">O CAMPO "DATA DO CASAMENTO RELIGIOSO" NÃO FOI PREENCHIDO POR FAVOR RETORNE E PREENCHA.</span>
<?php break; endif ?>
<body>
	<h2 style="text-align: center">
		TERMO DE CASAMENTO RELIGIOSO COM EFEITOS CIVIS

	</h2>

		<h4 style="text-align: center">
		
(DE ACORDO COM ARTIGOS, 1.515 E 1.516, § 1° CÓDIGO CIVIL)
	</h4>

<p style="text-align: justify;">	
Aos 	<?php //echo date('d/m/Y', strtotime($r->dataObito));

							$data = $r->DATARELIGIOSO ;
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

							echo dataum($novaData[0]);

							?> às <?=$r->HORACASAMENTO?> horas, No(a) <?=$r->NOMEIGREJA?>, perante o(a) <?=$r->CELEBRANTERELIGIOSO?>  familiares, convidados e das testemunhas abaixo qualificadas, todas capazes, após haverem afirmado o propósito de se casarem livremente e de espontânea vontade, receberam-se em MATRIMÔNIO pelo Regime 

							<?php 

							if ($r->REGIMECASAMENTO == 'CP') {
							$regime = 'Comunhão Parcial de bens';
							}

							else if ($r->REGIMECASAMENTO == 'CU') {
							$regime = 'Comunhão Universal de bens';
							}

							else if ($r->REGIMECASAMENTO == 'PF') {
							$regime = 'Participação final nos aquestos';
							}

							else if ($r->REGIMECASAMENTO == 'SB') {
							$regime = 'Separação  de bens';
							}
							else if ($r->REGIMECASAMENTO == 'SC') {
							$regime = 'Separação Convencional';
							}

							else{
							$regime = 'Comunhão de Bens';
							}



							?>

							da <?=mb_strtoupper($regime)?>:
							

							</p>
		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify;">O(a) Conjuge 
					<?php if ($r->NOMENUBENTE1!=''): ?>	
					<?=mb_strtoupper($r->NOMENUBENTE1)?>,
					
					<?php if ($r->NOMECASADONUBENTE1 == $r->NOMENUBENTE1): ?>
					que permanecerá a usar o mesmo nome,
					<?php else: ?>
					que passará a usar o nome de <?=$r->NOMECASADONUBENTE1?>,
					<?php endif ?>

					<?php if ($r->ESTADOCIVILNUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADENUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADENUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADENUBENTE1!=''): ?>
					natural de 
					<?=cidade_estrangeiro($r->NATURALIDADENUBENTE1)?>
					<?php if (intval($r->NATURALIDADENUBENTE1)!='5300109'): ?>
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php endif ?>

					<?php if ($r->PROFISSAONUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAONUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECONUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECONUBENTE1)?> <?=echo_exist($r->BAIRRONUBENTE1)?>,
					<?php endif ?>

					<?=cidade_estrangeiro($r->CIDADENUBENTE1)?>
					<?php if (intval($r->CIDADENUBENTE1)!='5300109'): ?>
					<?php if ($r->CIDADENUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php endif ?> 

					<?php if ($r->RGNUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGNUBENTE1?>/<?=$r->ORGAOEMISSORNUBENTE1?>,
					<?php endif ?> 
					<?php if ($r->CPFNUBENTE1!=''): ?>
					CPF de número <?=$r->CPFNUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTONUBENTE1!=''): ?>
						Nascido (a) em
						<?php
						$data = $r->DATANASCIMENTONUBENTE1 ;
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


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE1))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE1,$r->DATACASAMENTO)?> anos de idade.
					<?php endif ?>
					<?php endif ?>
					<?php if ($r->strTituloEleitorNoivo!=''): ?>
					Titulo de Eleitor nº <?=$r->strTituloEleitorNoivo?>.
					<?php endif ?>
					<?php if ($r->strCtpsNoivo!=''): ?>
					CTPS nº <?=$r->strCtpsNoivo?>.
					<?php endif ?>
					<?php if ($r->strPassaporteNoivo!=''): ?>
					Passaporte nº <?=$r->strPassaporteNoivo?>.
					<?php endif ?>
					<?php if ($r->strPisNisNoivo!=''): ?>
					PIS/NIS: nº <?=$r->strPisNisNoivo?>.
					<?php endif ?>
					<?php if ($r->strCartaoSaudeNoivo!=''): ?>
					Cartão Saúde: nº <?=$r->strCartaoSaudeNoivo?>.
					<?php endif ?>


					Filho de 

					<?php if ($r->NOMEPAINUBENTE1!=''): ?>	
					<?=echo_exist($r->NOMEPAINUBENTE1)?>,
					<?php if ($r->ESTADOCIVILPAINUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEPAINUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADEPAINUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEPAINUBENTE1!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAINUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>

					<?php if ($r->PROFISSAOPAINUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAOPAINUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOPAINUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOPAINUBENTE1)?> <?=echo_exist($r->BAIRROPAINUBENTE1)?>,
					<?php endif ?>

					<?php if ($r->CIDADEPAINUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAINUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGPAINUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGPAINUBENTE1?>/<?=$r->ORGAOEMISSORPAINUBENTE1?>,
					<?php endif ?> 
					<?php if ($r->CPFPAINUBENTE1!=''): ?>
					CPF de número <?=$r->CPFPAINUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOPAINUBENTE1!=''): ?>
						Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOPAINUBENTE1,$r->DATAENTRADA)?> anos de idade. E de 
					<?php endif ?>
					<?php endif ?>		

					<?php if ($r->NOMEMAENUBENTE1!=''): ?>	
					<?=echo_exist($r->NOMEMAENUBENTE1)?>,
					<?php if ($r->ESTADOCIVILMAENUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEMAENUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADEMAENUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEMAENUBENTE1!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>

					<?php if ($r->PROFISSAOMAENUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAOMAENUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOMAENUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOMAENUBENTE1)?> <?=echo_exist($r->BAIRROMAENUBENTE1)?>,
					<?php endif ?>

					<?php if ($r->CIDADEMAENUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGMAENUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGMAENUBENTE1?>/<?=$r->ORGAOEMISSORMAENUBENTE1?>, 
					<?php endif ?>
					<?php if ($r->CPFMAENUBENTE1!=''): ?>
					CPF de número <?=$r->CPFMAENUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOMAENUBENTE1!=''): ?>
						Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOMAENUBENTE1,$r->DATACASAMENTO)?> anos de idade. 
					<?php endif ?>
					<?php endif ?>
			 </p>
		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->

		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify;">O(a) Conjuge 
					<?php if ($r->NOMENUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMENUBENTE2)?>,

					<?php if ($r->NOMECASADONUBENTE2 == $r->NOMENUBENTE2): ?>
					que permanecerá a usar o mesmo nome,
					<?php else: ?>
					que passará a usar o nome de <?=$r->NOMECASADONUBENTE2?>,
					<?php endif ?>

					<?php if ($r->ESTADOCIVILNUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADENUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADENUBENTE2)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADENUBENTE2!=''): ?>
					natural de 
					<?=cidade_estrangeiro($r->NATURALIDADENUBENTE2)?>
					<?php if (intval($r->NATURALIDADENUBENTE2)!='5300109'): ?>
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php endif ?>

					<?php if ($r->PROFISSAONUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAONUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECONUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECONUBENTE2)?> <?=echo_exist($r->BAIRRONUBENTE2)?>,
					<?php endif ?>

					<?=cidade_estrangeiro($r->CIDADENUBENTE2)?>
					<?php if (intval($r->CIDADENUBENTE2)!='5300109'): ?>
					<?php if ($r->CIDADENUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php endif ?> 

					<?php if ($r->RGNUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGNUBENTE2?>/<?=$r->ORGAOEMISSORNUBENTE2?>,
					<?php endif ?> 
					<?php if ($r->CPFNUBENTE2!=''): ?>
					CPF de número <?=$r->CPFNUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTONUBENTE2!=''): ?>
						Nascido (a) em
						<?php
						$data = $r->DATANASCIMENTONUBENTE2 ;
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


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE2))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE2,$r->DATACASAMENTO)?> anos de idade.
					<?php endif ?>
					<?php endif ?>
					<?php if ($r->strTituloEleitorNoiva!=''): ?>
					Titulo de Eleitor nº <?=$r->strTituloEleitorNoiva?>.
					<?php endif ?>
					<?php if ($r->strCtpsNoiva!=''): ?>
					CTPS nº <?=$r->strCtpsNoiva?>.
					<?php endif ?>
					<?php if ($r->strPassaporteNoiva!=''): ?>
					Passaporte nº <?=$r->strPassaporteNoiva?>.
					<?php endif ?>
					<?php if ($r->strPisNisNoiva!=''): ?>
					PIS/NIS: nº <?=$r->strPisNisNoiva?>.
					<?php endif ?>
					<?php if ($r->strCartaoSaudeNoiva!=''): ?>
					Cartão Saúde: nº <?=$r->strCartaoSaudeNoiva?>.
					<?php endif ?> 


					Filho de 

					<?php if ($r->NOMEPAINUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMEPAINUBENTE2)?>,
					<?php if ($r->ESTADOCIVILPAINUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEPAINUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADEPAINUBENTE2)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEPAINUBENTE2!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAINUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>

					<?php if ($r->PROFISSAOPAINUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAOPAINUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOPAINUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOPAINUBENTE2)?> <?=echo_exist($r->BAIRROPAINUBENTE2)?>,
					<?php endif ?>

					<?php if ($r->CIDADEPAINUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAINUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGPAINUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGPAINUBENTE2?>/<?=$r->ORGAOEMISSORPAINUBENTE2?>,
					<?php endif ?> 
					<?php if ($r->CPFPAINUBENTE2!=''): ?>
					CPF de número <?=$r->CPFPAINUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOPAINUBENTE2!=''): ?>
					Nascido (a) em
					<?php

					$data = $r->DATANASCIMENTOPAINUBENTE2 ;
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
					  

					?>, Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOPAINUBENTE2,$r->DATACASAMENTO)?> anos de idade. E de 
					<?php endif ?>
					<?php endif ?>		

					<?php if ($r->NOMEMAENUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMEMAENUBENTE2)?>,
					<?php if ($r->ESTADOCIVILMAENUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEMAENUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADEMAENUBENTE2)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEMAENUBENTE2!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>

					<?php if ($r->PROFISSAOMAENUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAOMAENUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOMAENUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOMAENUBENTE2)?> <?=echo_exist($r->BAIRROMAENUBENTE2)?>,
					<?php endif ?>

					<?php if ($r->CIDADEMAENUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGMAENUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGMAENUBENTE2?>/<?=$r->ORGAOEMISSORMAENUBENTE2?>, 
					<?php endif ?>
					<?php if ($r->CPFMAENUBENTE2!=''): ?>
					CPF de número <?=$r->CPFMAENUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOMAENUBENTE2!=''): ?>
						Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOMAENUBENTE2,$r->DATACASAMENTO)?> anos de idade. 
					<?php endif ?>
					<?php endif ?>
			 </p>
		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->


		<!--TESTEMUNHAS ------------------------------------------------------------------------------------------------------>
				<p style="text-align: justify;">São as testemunhas,
				<?php if ($r->NOMETESTEMUNHA1!=''): ?>	
				<?=echo_exist($r->NOMETESTEMUNHA1)?>,

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

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA1!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA1)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA1!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA1)); foreach($c as $c):?>
				<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA1!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA1)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA1!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA1)?> <?=echo_exist($r->BAIRROTESTEMUNHA1)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA1!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA1)); foreach($c as $c):?>
				<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA1!=''): ?>
				portador do RG de número <?=$r->RGTESTEMUNHA1?>/<?=$r->ORGAOEMISSORTESTEMUNHA1?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA1!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA1?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>
				Com 
				<?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA1,$r->DATACASAMENTO)?> anos de idade.
				<?php endif ?>
				<?php endif ?>

				<?php if ($r->NOMETESTEMUNHA2!=''): ?>	
				E 
				<?=echo_exist($r->NOMETESTEMUNHA2)?>,

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

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA2!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA2)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA2!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA2)); foreach($c as $c):?>
				<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA2!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA2)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA2!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA2)?> <?=echo_exist($r->BAIRROTESTEMUNHA2)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA2!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA2)); foreach($c as $c):?>
				<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA2!=''): ?>
				portador do RG de número <?=$r->RGTESTEMUNHA2?>/<?=$r->ORGAOEMISSORTESTEMUNHA2?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA2!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA2?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>
				Com 
				<?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA2,$r->DATACASAMENTO)?> anos de idade.
				<?php endif ?>
				<?php endif ?>

				<?php if ($r->NOMETESTEMUNHA3!=''): ?>	
				E 
				<?=echo_exist($r->NOMETESTEMUNHA3)?>,

				<?php if ($r->ESTADOCIVILTESTEMUNHA3 == 'CA'): ?>
				casado(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA3 == 'SO'): ?>
				solteiro(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA3 == 'DI'): ?>
				divorciado(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA3 == 'VI'): ?>
				viúvo(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA3 == 'UN'): ?>
				em união estável,
				<?php else: ?>

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA3!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA3)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA3!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA3)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA3!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA3)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA3!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA3)?> <?=echo_exist($r->BAIRROTESTEMUNHA3)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA3!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA3)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA3!=''): ?>
				portador(a) do RG de número <?=$r->RGTESTEMUNHA3?>/<?=$r->ORGAOEMISSORTESTEMUNHA3?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA3!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA3?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA3!=''): ?>
				Com 
				<?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA3,$r->DATACASAMENTO)?> anos de idade.
				<?php endif ?>
				<?php endif ?>
				<?php if ($r->NOMETESTEMUNHA3!=''): ?>	
				E 
				<?=echo_exist($r->NOMETESTEMUNHA3)?>,

				<?php if ($r->ESTADOCIVILTESTEMUNHA3 == 'CA'): ?>
				casado(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA3 == 'SO'): ?>
				solteiro(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA3 == 'DI'): ?>
				divorciado(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA3 == 'VI'): ?>
				viúvo(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA3 == 'UN'): ?>
				em união estável,
				<?php else: ?>

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA3!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA3)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA3!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA3)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA3!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA3)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA3!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA3)?> <?=echo_exist($r->BAIRROTESTEMUNHA3)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA3!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA3)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA3!=''): ?>
				portador(a) do RG de número <?=$r->RGTESTEMUNHA3?>/<?=$r->ORGAOEMISSORTESTEMUNHA3?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA3!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA3?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA3!=''): ?>
				Com 
				<?=date('Y',strtotime($r->DATAENTRADA)) - date('Y', strtotime($r->DATANASCIMENTOTESTEMUNHA3))?> anos de idade.
				<?php endif ?>
				<?php endif ?>

				<?php if ($r->NOMETESTEMUNHA4!=''): ?>	
				E 
				<?=echo_exist($r->NOMETESTEMUNHA4)?>,

				<?php if ($r->ESTADOCIVILTESTEMUNHA4 == 'CA'): ?>
				casado(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA4 == 'SO'): ?>
				solteiro(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA4 == 'DI'): ?>
				divorciado(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA4 == 'VI'): ?>
				viúvo(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA4 == 'UN'): ?>
				em união estável,
				<?php else: ?>

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA4!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA4)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA4!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA4)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA4!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA4)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA4!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA4)?> <?=echo_exist($r->BAIRROTESTEMUNHA4)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA4!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA4)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA4!=''): ?>
				portador(a) do RG de número <?=$r->RGTESTEMUNHA4?>/<?=$r->ORGAOEMISSORTESTEMUNHA4?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA4!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA4?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA4!=''): ?>
				Com 
				<?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA4,$r->DATACASAMENTO)?> anos de idade.
				<?php endif ?>
				<?php endif ?>

				<?php if ($r->NOMETESTEMUNHA5!=''): ?>	
				E 
				<?=echo_exist($r->NOMETESTEMUNHA5)?>,

				<?php if ($r->ESTADOCIVILTESTEMUNHA5 == 'CA'): ?>
				casado(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA5 == 'SO'): ?>
				solteiro(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA5 == 'DI'): ?>
				divorciado(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA5 == 'VI'): ?>
				viúvo(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA5 == 'UN'): ?>
				em união estável,
				<?php else: ?>

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA5!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA5)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA5!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA5)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA5!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA5)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA5!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA5)?> <?=echo_exist($r->BAIRROTESTEMUNHA5)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA5!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA5)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA5!=''): ?>
				portador(a) do RG de número <?=$r->RGTESTEMUNHA5?>/<?=$r->ORGAOEMISSORTESTEMUNHA5?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA5!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA5?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA5!=''): ?>
				Com 
				<?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA5,$r->DATACASAMENTO)?> anos de idade.
				<?php endif ?>
				<?php endif ?>

				<?php if ($r->NOMETESTEMUNHA6!=''): ?>	
				E 
				<?=echo_exist($r->NOMETESTEMUNHA6)?>,

				<?php if ($r->ESTADOCIVILTESTEMUNHA6 == 'CA'): ?>
				casado(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA6 == 'SO'): ?>
				solteiro(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA6 == 'DI'): ?>
				divorciado(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA6 == 'VI'): ?>
				viúvo(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA6 == 'UN'): ?>
				em união estável,
				<?php else: ?>

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA6!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA6)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA6!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA6)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA6!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA6)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA6!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA6)?> <?=echo_exist($r->BAIRROTESTEMUNHA6)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA6!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA6)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA6!=''): ?>
				portador(a) do RG de número <?=$r->RGTESTEMUNHA6?>/<?=$r->ORGAOEMISSORTESTEMUNHA6?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA6!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA6?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA6!=''): ?>
				Com 
				<?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA6,$r->DATACASAMENTO)?> anos de idade.
				<?php endif ?>
				<?php endif ?>


				</p>
		<!--TESTEMUNHAS ------------------------------------------------------------------------------------------------------>	

			<p style="">CELEBRANTE - <?=strtoupper($r->CELEBRANTERELIGIOSO)?>: <hr style="max-width: 100%;border:0.5px solid black;"></p> 
						
						


						<?php if ($r->ROGONUBENTE1!=''): ?>
						<p >
						<br>		
						<div style="border: 3px dashed silver; width: 5%; height: 10px; padding: 30px;margin-left: 20%;margin-bottom: -5%"></div><br>
						<p style="display: inline;margin-left: 22%;font-size: 8px;">(Digital NUBENTE1)</p>
						<p style="max-width:  100%; text-align: center;margin-left:10%;margin-top:-90px;">______________________________<br> <?=strtoupper($r->NOMETESTEMUNHA3)?><br>(TESTEMUNHA A ROGO)</p>
						<p style="max-width:  100%; text-align: center;margin-left:10%;">______________________________<br> <?=strtoupper($r->NOMETESTEMUNHA4)?><br>(TESTEMUNHA A ROGO)</p>
						<br><br>
						</p>	
						<?php else: ?>
						
					<p style="">
					<?=$r->NOMECASADONUBENTE1?>: <hr style="max-width: 100%;border:0.5px solid black;">
					</p>
					<?php endif ?>

					<?php if ($r->ROGONUBENTE2!=''): ?>
						<p >
						<br>		
						<div style="border: 3px dashed silver; width: 5%; height: 10px; padding: 30px;margin-left: 20%;margin-bottom: -5%"></div><br>
						<p style="display: inline;margin-left: 22%;font-size: 8px;">(Digital NUBENTE2)</p>
						<p style="max-width:  100%; text-align: center;margin-left:10%;margin-top:-90px;">______________________________<br> <?=strtoupper($r->NOMETESTEMUNHA5)?><br>(TESTEMUNHA A ROGO)</p>
						<p style="max-width:  100%; text-align: center;margin-left:10%;">______________________________<br> <?=strtoupper($r->NOMETESTEMUNHA6)?><br>(TESTEMUNHA A ROGO)</p>
						<br><br>
						</p>	
						<?php else: ?>
						
					<p style="">
					<?=$r->NOMECASADONUBENTE2?>: <hr style="max-width: 100%;border:0.5px solid black;">	
					 
				<?php endif ?>



				<p style="">TESTEMUNHA - <?=strtoupper($r->NOMETESTEMUNHA1)?>: <hr style="max-width: 100%;border:0.5px solid black;"></p> 
				<p style="">TESTEMUNHA - <?=strtoupper($r->NOMETESTEMUNHA2)?>: <hr style="max-width: 100%;border:0.5px solid black;"></p>
				<?php if (!empty($r->NOMETESTEMUNHA3)): ?>
				 	<p style="">TESTEMUNHA - <?=strtoupper($r->NOMETESTEMUNHA3)?>: <hr style="max-width: 100%;border:0.5px solid black;"></p>
				 <?php endif ?> 
				 <?php if (!empty($r->NOMETESTEMUNHA4)): ?>
				 	<p style="">TESTEMUNHA - <?=strtoupper($r->NOMETESTEMUNHA4)?>: <hr style="max-width: 100%;border:0.5px solid black;"></p>
				 <?php endif ?> 
				 <?php if (!empty($r->NOMETESTEMUNHA5)): ?>
				 	<p style="">TESTEMUNHA - <?=strtoupper($r->NOMETESTEMUNHA5)?>: <hr style="max-width: 100%;border:0.5px solid black;"></p>
				 <?php endif ?> 
				 <?php if (!empty($r->NOMETESTEMUNHA6)): ?>
				 	<p style="">TESTEMUNHA - <?=strtoupper($r->NOMETESTEMUNHA6)?>: <hr style="max-width: 100%;border:0.5px solid black;"></p>
				 <?php endif ?> 


</body>
<?php endforeach  ?>
</html>
