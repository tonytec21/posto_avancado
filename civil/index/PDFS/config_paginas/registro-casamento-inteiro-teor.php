<!DOCTYPE html>
<?php 
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
echo GExtenso::numero($dataAno)." ";
}
elseif (substr($dataAno, -1) == '1') {
echo GExtenso::numero($dataAno)." um";
}
else {
  echo GExtenso::numero($dataAno);
}

}
if (isset($_SESSION['nomeapoio'])) {
$nome_assinatura = $_SESSION['nomeapoio'];
$funcao_assinatura = $_SESSION['funcaoapoio'];
}
else{
$nome_assinatura = $_SESSION['nome'];
$funcao_assinatura = $_SESSION['funcao'];	
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
	border:1px solid black;
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
@media print{
	#container_teor{
		zoom:80%;
	}
	#container_selo{
		margin-bottom: -300px;
	}
}
body{ font-size: 13px;font-family: "Arial"; padding: 4.5cm 1cm 2cm 1cm;
<?php if (isset($_GET['naoofc'])): ?>
	background: url("../../../images/preview.jpg");
<?php endif ?>}

</style>
</head>

<body>
	
<h2 style="text-align: center;">CERTIDÃO <span style="border: 1px solid black"> INTEIRO TEOR </span></h2>
<p style="text-align: center;"><b>Matrícula: <?=$r->MATRICULA?></b></p>
<p style="text-align: center;"><b><?=$r->NOMECASADONUBENTE1?> E <?=$r->NOMECASADONUBENTE2?></b></p>

<p style="text-align: left;">DESCRIÇÃO:</p>
<fieldset style="text-align: justify;" id="container_teor">


Certifico que por ter sido requerido verbalmente por parte interessada, que
revendo os livros de Casamento, deste ofício, encontrei no livro 
<!--CERTIDAO LIVRO CASAMENTO B||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
<?php if ($r->TIPOLIVRO == 2): ?>
	B
	<?php else: ?>
		B AUXILIAR
<?php endif;
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

 ?>
 <?=$r->LIVROCASAMENTO?>, folha <?=$r->FOLHACASAMENTO?>, sob o
número <?=$r->TERMOCASAMENTO?>, o registro cujo teor segue: 


<?php 
		$busca_registro_add = $pdo->prepare("SELECT * from info_registros_civil where id_registro_casamento = '$id'");
		$busca_registro_add->execute();
		if ($busca_registro_add->rowCount()>0) :
		$bra = $busca_registro_add->fetchAll(PDO::FETCH_OBJ);
		foreach ($bra as $b) {
			echo addslashes($b->inteiro_teor);
		}
		
		
		else:?>


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
	} else {echo  dataum($novaData[2]);}
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

	?>, neste
			<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?><?=$w->strRazaoSocial?> Estado do Maranhão <?php endforeach ?> 
			às <?=$r->HORACASAMENTO?> horas perante o(a) Sr(a).
			<?=$r->JUIZPAZ?>, Juiz(a) de Casamentos em Exercício, comigo, oficial de
			seu cargo, no fim nomeado e assinado na presença das testemunhas, receberam-se em matrimônio os contraentes:   <?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?>  
		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->	
					O(a) Conjuge 
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
					CPF de número <?=$r->CPFNUBENTE1?>, 
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
						} 
						elseif ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1' ||  $novaDataNoivo[2] == '21'|| $novaDataNoivo[2] == '31'|| $novaDataNoivo[2] == '41' || $novaDataNoivo[2] == '51'|| $novaDataNoivo[2] == '61' || $novaDataNoivo[2] == '71' || $novaDataNoivo[2] == '81' || $novaDataNoivo[2] == '91') {
														echo  ucfirst(GExtenso::numero($novaDataNoivo[2])).'um';
														}
						else {echo  ucfirst(GExtenso::numero($novaDataNoivo[2]));}
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
						if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE1))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE1,$r->DATACASAMENTO)?> anos de idade, 
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
					<?=idade_civil_antigo($r->DATANASCIMENTOPAINUBENTE1,$r->DATAENTRADA)?> anos de idade, E de 
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
		
		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->

		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->	
					O(a) Conjuge 
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
					CPF de número <?=$r->CPFNUBENTE2?>,
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
						} 

						elseif ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1' ||  $novaDataNoivo[2] == '21'|| $novaDataNoivo[2] == '31'|| $novaDataNoivo[2] == '41' || $novaDataNoivo[2] == '51'|| $novaDataNoivo[2] == '61' || $novaDataNoivo[2] == '71' || $novaDataNoivo[2] == '81' || $novaDataNoivo[2] == '91') {
														echo  ucfirst(GExtenso::numero($novaDataNoivo[2])).'um';
														}
						else {echo  ucfirst(GExtenso::numero($novaDataNoivo[2]));}
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
						if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE2))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE2,$r->DATACASAMENTO)?> anos de idade
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
					  if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
					   echo GExtenso::numero($novaDataNoivo[0]).'  um';
					  }
					  else{
					    echo GExtenso::numero($novaDataNoivo[0]);
					  }
					  

					?>, Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOPAINUBENTE2,$r->DATACASAMENTO)?> anos de idade, 
					<?php endif ?>
					E de 
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
			
		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->
				<!--TESTEMUNHAS ------------------------------------------------------------------------------------------------------>
				São as testemunhas,
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


		<!--TESTEMUNHAS ------------------------------------------------------------------------------------------------------>	
							<?php if (strlen($r->REGIMECASAMENTO)>3) {
							$regime_array = explode("@", $r->REGIMECASAMENTO);
							$REGIMECASAMENTO = $regime_array[0];
							$COMPLEMENTOREGIME = $regime_array[1];
							}
							else{
							$REGIMECASAMENTO = $r->REGIMECASAMENTO;	
							} 
							?>	
							<?php 

							if ($REGIMECASAMENTO == 'CP') {
							$regime = 'Comunhão Parcial de bens';
							}

							else if ($REGIMECASAMENTO == 'CU') {
							$regime = 'Comunhão Universal de bens'.', '.$COMPLEMENTOREGIME;
							}

							else if ($REGIMECASAMENTO == 'PF') {
							$regime = 'Participação final nos aquestos'.', '.$COMPLEMENTOREGIME;
							}

							else if ($REGIMECASAMENTO == 'SB') {
							$regime = 'Separação Total  de bens'.', '.$COMPLEMENTOREGIME;
							}
							else if ($REGIMECASAMENTO == 'SC') {
							$regime = 'Separação Obrigatória de bens'.', '.$COMPLEMENTOREGIME;
							}
							else if ($REGIMECASAMENTO == 'SO') {
							$regime = 'Separação Convencional de Bens'.', '.$COMPLEMENTOREGIME;
							}
							else if ($REGIMECASAMENTO == 'SL') {
							$regime = 'Separação Legal de Bens'.', '.$COMPLEMENTOREGIME;
							}
							else{
							$regime = 'Comunhão de Bens';
							}



							?>


						
						O regime do casamento será o da <?=$regime?> , por opção.
						Apresentaram os documentos exigidos
						pelo artigo 1.525 do Código Civil Brasileiro, constantes dos autos de habilitação de casamento,
						deste Ofício, a saber: (I) Certidão de nascimento, (III) Atestado de não impedimento de se
						casarem e (IV) Declaração dos contraentes. 

						<?php if ($r->TIPOLIVRO == '3' && !empty($r->DATARELIGIOSO)): ?>
							 O ato religioso foi celebrado 
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

							echo GExtenso::numero($novaData[0]);

							?> às <?=$r->HORACASAMENTO?> horas, perante o(a) <?=$r->CELEBRANTERELIGIOSO?>, No(a) <?=$r->NOMEIGREJA?>  e as testemunhas.
							
						<?php endif ?>




						E para constar, lavrei este termo, que sendo Lido e achado
						conforme, o(a) declarante assina. <br>
					<?php endif ?>
							<?php 
$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVROCASAMENTO' and strFolha = '$r->FOLHACASAMENTO' and strTipo = 'CA' and conjuge1 = '$r->NOMENUBENTE1' and setRegistroInvisivel!='S'");
$busca_averbacoes->execute();
$ba = $busca_averbacoes->fetchAll(PDO::FETCH_OBJ);
$cont_av = 0;
$av_outra_folha ='';
foreach ($ba as $ba) {
$cont_av++;
if ($cont_av >=2) {
$av_outra_folha .= $ba->strAverbacao.'<br>'; 
}
else{
echo $ba->strAverbacao;
}
}
if (!empty($av_outra_folha) && $av_outra_folha!='') {
echo "EXISTEM MAIS AVERBAÇÕES NO VERSO DESTA CERTIDÃO<br>"; 
}
if ($r->AVERBACAOTERMOANTIGO!='') {
	echo $r->AVERBACAOTERMOANTIGO;
}


$busca_anotacoes = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$r->LIVROCASAMENTO' and FOLHA = '$r->FOLHACASAMENTO' and TIPO = 'CAS'");
$busca_anotacoes->execute();
$ban = $busca_anotacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ban as $ban) {
echo $ban->ANOTACAO;
}



$busca_registro_add = $pdo->prepare("SELECT * from info_registros_civil where id_registro_casamento = '$id'");
			$busca_registro_add->execute();
			if ($busca_registro_add->rowCount()>0) :
			$bra = $busca_registro_add->fetchAll(PDO::FETCH_OBJ);
			foreach ($bra as $b) {
			if ($b->obs_visivel_certidao == 'SIM') {
			echo $b->observacoes_registro;
			}	
			}
			endif;	
 ?>

						 Eu, <?=$nome_assinatura?>, <?=strtoupper($funcao_assinatura)?>, dou fé e assino.  Era o que continha
						o referido registro aqui fielmente transcrito. Selo de Fiscalização: <?=$SELO?>.
					 	
						do inteiro teor da Certidão - Matrícula: <?=$r->MATRICULA?>
						

</fieldset>
<p style="font-size: 8px;text-align: center;">Válido somente com selo de autenticidade</p>
<br>

<div class="left">
<?php $serv = PESQUISA_ALL('cadastroserventia');
foreach ($serv as $serv): ?>	

	<?=$serv->strRazaoSocial?> 	<br>
	<?=$serv->strTituloServentia?> <br>
	<?php $c = PESQUISA_ALL_ID('uf_cidade',$serv->intUFcidade); foreach ($c as $c) {
	echo $c->cidade.'/'.$c->uf;
	} ?><br>
	<?=$serv->strLogradouro.' Nº '.$serv->strNumero?><br>
		<?=$serv->strTelefone1?><br>
		<?=$serv->strEmail?>
<?php endforeach ?>	
</div>


<div class="right">
	O conteúdo da certidão é verdadeiro Dou Fé <br>
	
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
						echo " de Outubro de";
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
					 <br><br>
	_______________________________________ <br>
	<?=strtoupper($nome_assinatura)?><br>
	<?=$funcao_assinatura?>
</div>

<div style="position: absolute;width: 50px; margin-left: -20px;width: 200px; margin-top: 100px;"> 
<?php

	include_once('../../../plugins/phpqrcode/qrlib.php');
	
function tirarAcentos($string){
		return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(ý)/","/(Ý)/"),explode(" ","a A e E i I o O u U n N C c y Y"),$string);
		}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->ID.$r->NOMENUBENTE1.$r->NOMENUBENTE2).'INTETEOR.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


				echo '<img style="max-width:33%; margin-top:-25px;margin-left:10px;" src="'.$nome.'" />';
		?>

	<p style="font-weight: bold; font-size: 8px;margin-top: -70px;width: 80%; margin-left:80px;text-align: justify;"><?=$textoselo?></p>
	</main>
</div>

 <?php if (isset($_GET['selobusca']) && $_GET['selobusca']!=''): ?>





<div style="position: absolute;width: 50px; margin-left: 200px;width: 200px; margin-top: 160px;"> 
<?php

  include_once('../../../plugins/phpqrcode/qrlib.php');
  

  $img_local = "qrimagens/";
  $img_nome = tirarAcentos($r->ID.$r->NOMENUBENTE1.$r->NOMENUBENTE2).'INTETEORBUSCA.png';
  $nome = $img_local.$img_nome;

    $conteudo = $qrbusca;
    QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


    echo '<img style="max-width:50%; margin-top:-15px;margin-left:10px;" src="'.$nome.'" />';
    ?>

  <p style="font-weight: bold; font-size: 5px;margin-top: -90px;width: 50%; margin-left:110px;"><?=$textoselobusca?></p>
</div>

  
<?php endif ?>





<?php if (isset($_GET['sav'])): 
$selo_busca_sav = $_GET['sav'].'<br>';
$busca_selo_sav = $pdo->prepare("SELECT * FROM auditoria where strSelo = '$selo_busca_sav' limit 1 ");
$busca_selo_sav->execute();
$bssav = $busca_selo_sav->fetch(PDO::FETCH_ASSOC);
	?>
<div style="position: absolute;width: 50px; margin-left: 0px;width: 200px; margin-top: 30px;"> 
<?php
	$retorno = json_decode($bssav['retorno'],true);
		$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];
	include_once('../../../plugins/phpqrcode/qrlib.php');


	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->ID).'nasccert.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


    echo '<img style="max-width:33%; margin-top:-32px;margin-left:15px;" src="'.$nome.'" />';
    ?>


        <!-- TEXTO DO SELO -->
        <p style="font-weight:bold;
                  text-align:justify;
                  font-size:8px;
                  margin-top:-65px;
                  width:100%;
                  margin-left:80px;">
        <?=caracteres_selador($textoselo)?>
        </p>
	</main>
<?php endif ?>
</div>

<!--SELO AVERBACAO ======================================================================-->
				<div style="
								display: flex;
								width: 70%;
								margin-left: 30%;
								padding-right: 0%;
								padding-top: 14px;
								margin-right: -30%;
								padding-left: 30px;
								margin-bottom: -300px;
								z-index: -1;
								">



				<?php
				$cont_selos = 0;
				$data_hoje = date('Y-m-d');
				$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVROCASAMENTO' and strFolha = '$r->FOLHACASAMENTO' and strTipo = 'CA'  and strOrdem!='A' and dataAverbacao = '$data_hoje' ");
				$busca_averbacoes->execute();
				$ba = $busca_averbacoes->fetchAll(PDO::FETCH_OBJ);
				foreach ($ba as $ba) :
				$selos_array = explode("|", $ba->strSelo);
									#var_dump($selos_array);
									for($i=0;$i<=count($selos_array);$i++):
										if(isset($selos_array[$i])):
											$selo = trim($selos_array[$i]);
											$busca_selos_gerados = $pdo->prepare("SELECT * FROM selagem_atos_retorno WHERE numeroSelo = '$selo'");
											$busca_selos_gerados->execute();
											$bsg = $busca_selos_gerados->fetchAll(PDO::FETCH_OBJ);
											foreach ($bsg as $seloret):
											$cont_selos ++;	
												?>

												<div style="display: inline-flex;max-width: 50%;width: 50%;
												<?php if ($cont_selos >= 3): ?>margin-top:15cm;margin-left:-19cm<?php endif ?>
												">
													<p style="max-width: 40%; text-align: justify;margin-right: -5px;">
														<img style="background: none; width: 100px;margin-top: -25px;z-index: -1;" src="data:image/png;base64,<?=$seloret->qrCode?>"alt="Qr Code" /> </img>
													</p>
													<p style="max-width: 70%;font-size: 8px;  text-align: justify;">
														<?=caracteres_selador($seloret->textoSelo)?>
													</p>
												</div>


											<?php endforeach;endif; endfor?>
				


				<?php
				$up_av = $pdo->prepare("UPDATE averbacoes_civil set strOrdem = 'I' where ID = '$ba->ID'");
				$up_av->execute();

				 endforeach; ?>

				</div>
<!--END SELO AVERBACAO ==================================================================--->

<!--AVERBAÇÃO JOGADA PRA OUTRA FOLHA=======================================================================-->
			<?php if (!empty($av_outra_folha) && $av_outra_folha!=''): ?>
				<div style="page-break-before: always;">
				<fieldset style="width: 95%;padding: 0px 10px 0px 10px!important; 
				<?php if ($cont_selos >=3): ?>
					margin-top: -26cm;
					<?php elseif($cont_selos <= 2 && $cont_selos >0): ?>
						margin-top: 200px;
					<?php else: ?>
					margin-top: 200px;
					<?php  ?>	
				<?php endif ?>">
				<legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
					<?=$av_outra_folha?>
				</fieldset>
				<br>
				        <!-- Rodapé -->
			        <div class="left">

			          <!-- Informações da Serventia -->
			          <?php $serv = PESQUISA_ALL('cadastroserventia');
			          foreach ($serv as $serv): ?>  

			          <!-- Razão Social -->
			          <?=$serv->strRazaoSocial?>
			          <br>

			          <!-- Títular da Serventia -->
			          <?=mb_convert_case($serv->strTituloServentia, MB_CASE_UPPER, "UTF-8")?>
			          <br>

			          <!-- Endereço Serventia -->
						    <?=mb_convert_case($serv->strLogradouro, MB_CASE_TITLE, "UTF-8").", Nº ".$serv->strNumero.", ".mb_convert_case($serv->strBairro, MB_CASE_TITLE, "UTF-8")?>
			          <br>
			          
			          <!-- Cidade Serventia -->
			          <?php  $c = PESQUISA_ALL_ID('uf_cidade',$serv->intUFcidade); foreach($c as $c):?>
						    <?=mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf?>
			          <?php endforeach ?>
			          <br>

			          <!-- Telefone Serventia -->
			          <?="Telefone: ".mb_strtolower($serv->strTelefone1)?>
			          <br>

			          <!-- E-mail Serventia -->          
			          <?="E-mail: ".mb_strtolower($serv->strEmail)?>
			        <?php endforeach ?> 
			        </div>

			        <div class="right">
			          O conteúdo da certidão é verdadeiro. Dou Fé <br>

			          <!-- CIDADE DA SERVENTIA -->  
			          <?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
			          $u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade); foreach ($u as $u):?> 
			          <?=mb_convert_case($u->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>

			          <!-- DATA DA CERTIDÃO -->
			          <?php
			          $data = date('Y-m-d') ;
			          $novaDataRegistro = explode("-", $data);
			          echo $novaDataRegistro[2];
			          if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
			            echo " de janeiro de ";
			          }elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
			            echo " de fevereiro de ";
			          } elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
			            echo " de março de ";
			          } elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
			            echo " de abril de ";
			          } elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
			            echo " de maio de ";
			          } elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
			            echo " de junho de ";
			          } elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
			            echo " de julho de ";
			          } elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
			            echo " de agosto de ";
			          } elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
			            echo " de setembro de ";
			          } elseif ($novaDataRegistro[1] == '10') {
			            echo " de outubro de";
			          } elseif ($novaDataRegistro[1] == '11') {
			            echo " de novembro de ";
			          } elseif ($novaDataRegistro[1] == '12') {
			            echo " de dezembro de ";
			          } else {
			            echo "Não definido";
			          }

			          echo $novaDataRegistro[0];

			          ?>. 
			          <?php endforeach; endforeach ?>
			          <br><br><br>
			          
			          <!-- ASSINATURA - ESCREVENTE -->
			          ____________________________________________ <br>
			          <?=strtoupper($nome_assinatura)?><br>
			          <?=$funcao_assinatura?>
			        </div>
			    </div>
			<?php endif ?>
<!--END AVERBAÇÃO JOGADA PRA OUTRA FOLHA===================================================================-->

</body>

</html>