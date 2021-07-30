<!DOCTYPE html>
<?php include('../../controller/db_functions.php');

#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
function echo_exist($texto){
if ($texto!='' && $texto!=' ' && $texto!=NULL) {
		echo $texto;
	}
}
function cidade_estrangeiro($texto){
$tirar = array("1","2","3","4","5","6","7","8","9","0",",",);
if (intval(intval($texto) == '5300109')) {
return str_replace($tirar, "", $texto);
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

body{ font-size: 14px;font-family: "Arial";}
</style>
</head>
<?php $r = PESQUISA_ALL_ID('registro_casamento_novo',$id);
foreach ($r as $r ) :
#aqui vai preencher os inputs, vou preencher só um pra vc ver:
if ($r->ESTADOCIVILNUBENTE1 == 'SO'  ) {
	$ec = "SOLTEIRO";
}
 if($r->ESTADOCIVILNUBENTE2 == 'SO'  ){
	$ecnoiva="SOLTEIRA";
}

 if($r->ESTADOCIVILNUBENTE1 == 'CA'   ){
	$ec="CASADO";
}

 if($r->ESTADOCIVILNUBENTE2 == 'CA'   ){
	$ecnoiva="CASADA";
}

 if($r->ESTADOCIVILNUBENTE1 == 'DI'  ){
	$ec="DIVORCIADO";
}

 if($r->ESTADOCIVILNUBENTE2 == 'DI'  ){
	$ecnoiva="DIVORCIADA";
}
 if($r->ESTADOCIVILNUBENTE1 == 'VI'  ){
	$ec="VIUVO";
}

 if($r->ESTADOCIVILNUBENTE2 == 'VI'   ){
	$ecnoiva="VIUVA";
}

 if($r->ESTADOCIVILNUBENTE1 == 'UN' ){
	$ec="EM UNIÃO ESTÁVEL";
}

 if($r->ESTADOCIVILNUBENTE2 == 'UN'  ){
	$ecnoiva="EM UNIÃO ESTÁVEL";
}


	
	?>
<body>
	




<h2 style="text-align: center; text-decoration: underline;margin-top: -3px">CONSENTIMENTO PARA CASAMENTO DE MENOR</h2>

<p style="text-align: justify;font-size: 16px;"> 
<span style="margin-left: 2cm">

<?php if ($r->NOMEPAINUBENTE1!='' && $r->NOMEPAINUBENTE1!=''): ?>
	<?=strtoupper($r->NOMEPAINUBENTE1)?>,  <?=strtoupper($r->NACIONALIDADEPAINUBENTE1)?>(a) e
<?php endif ?>
	  <?=strtoupper($r->NOMEMAENUBENTE1)?>, <?=strtoupper($r->NACIONALIDADEMAENUBENTE1)?>(a) responsavel(s) do menor:  <?=strtoupper($r->NOMENUBENTE1)?>
		Declaram que dão pleno consentimento, para que o dito menor,
</span>
<?=strtoupper($r->NACIONALIDADENUBENTE1)?>, 
<?=strtoupper($ecnoiva)?>, 
<?=strtoupper($r->PROFISSAONUBENTE1)?>, nascida no dia

<?php
$data = $r->DATANASCIMENTONUBENTE1 ;
$novaDataNoiva = explode("-", $data);
echo $novaDataNoiva[2]." de ";
/*
if ($novaDataNoiva[2] == '01' || $novaDataNoiva[1] == '1') {
	echo " Um de  ";
}elseif ($novaDataNoiva[2] == '02' || $novaDataNoiva[1] == '2') {
	echo " Dois de ";
} elseif ($novaDataNoiva[2] == '03' || $novaDataNoiva[1] == '3') {
	echo " Três ";
} elseif ($novaDataNoiva[2] == '04' || $novaDataNoiva[1] == '4') {
	echo " Quatro de ";
} elseif ($novaDataNoiva[2] == '05' || $novaDataNoiva[1] == '5') {
	echo " Cinco de ";
} elseif ($novaDataNoiva[2] == '06' || $novaDataNoiva[1] == '6') {
	echo " Seis de ";
} elseif ($novaDataNoiva[2] == '07' || $novaDataNoiva[1] == '7') {
	echo " Sete de ";
} elseif ($novaDataNoiva[2] == '08' || $novaDataNoiva[1] == '8') {
	echo " Oito de ";
} elseif ($novaDataNoiva[2] == '09' || $novaDataNoiva[1] == '9') {
	echo " Nove de ";
} else {echo  ucfirst(GExtenso::numero($novaDataNoiva[2]));}
//Será exibido na tela a data: 16/02/2015
// . "de".$novaDataNoiva[1] . " de " . GExtenso::numero ($novaDataNoiva[0])
*/
if ($novaDataNoiva[1] == '01' || $novaDataNoiva[1] == '1') {
	echo " de Janeiro de ";
}elseif ($novaDataNoiva[1] == '02' || $novaDataNoiva[1] == '2') {
	echo " de Fevereiro de ";
} elseif ($novaDataNoiva[1] == '03' || $novaDataNoiva[1] == '3') {
	echo " de Março de ";
} elseif ($novaDataNoiva[1] == '04' || $novaDataNoiva[1] == '4') {
	echo " de Abril de ";
} elseif ($novaDataNoiva[1] == '05' || $novaDataNoiva[1] == '5') {
	echo " de Maio de ";
} elseif ($novaDataNoiva[1] == '06' || $novaDataNoiva[1] == '6') {
	echo " de Junho de ";
} elseif ($novaDataNoiva[1] == '07' || $novaDataNoiva[1] == '7') {
	echo " de Julho de ";
} elseif ($novaDataNoiva[1] == '08' || $novaDataNoiva[1] == '8') {
	echo " de Agosto de ";
} elseif ($novaDataNoiva[1] == '09' || $novaDataNoiva[1] == '9') {
	echo " de Setembro de ";
} elseif ($novaDataNoiva[1] == '10') {
	echo " de Outubro de";
} elseif ($novaDataNoiva[1] == '11') {
	echo " de Novembro de ";
} elseif ($novaDataNoiva[1] == '12') {
	echo " de Dezembro de ";
} else {
	echo "Não definido";
}

echo $novaDataNoiva[0];

?>



domiciliada e residente <?=strtoupper($r->ENDERECONUBENTE1)?>, 
<?php $z = PESQUISA_ALL_ID('uf_cidade', intval($r->CIDADENUBENTE1)); foreach ($z as $z):?>
<?=$z->cidade.'/'.$z->uf?>
<?php endforeach  ?>, 

possa casar-se civilmente, com:
<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->	
			<?=echo_exist($r->NOMENUBENTE2)?>, 
					
					<?php if ($r->NOMENUBENTE2!=''): ?>	
					

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
					<?=date('Y',strtotime($r->DATAENTRADA)) - date('Y', strtotime($r->DATANASCIMENTONUBENTE2))?> anos de idade.
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


					Filho(a) de 

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
					<?=date('Y',strtotime($r->DATAENTRADA)) - date('Y', strtotime($r->DATANASCIMENTOPAINUBENTE2))?> anos de idade. E de 
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
					<?=date('Y',strtotime($r->DATAENTRADA)) - date('Y', strtotime($r->DATANASCIMENTOMAENUBENTE2))?> anos de idade. 
					<?php endif ?>
					<?php endif ?>
			 </p>
		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->
</p>


<?php if ($r->ROGOMAENUBENTE1!=''): ?>
<p style="margin-top: -2%">	
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">______________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Mãe)</p>
<p style="display: inline;margin-left: 19%"><?=$r->ROGOMAENUBENTE1?></p>
</p>
<?php else: ?>
<br><br>	
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=strtoupper($r->NOMEMAENUBENTE1)?></p>
<br>	
<?php endif ?>

<?php if ($r->NOMEPAINUBENTE1 !=''): ?>
	
<?php if ($r->ROGOPAINUBENTE1!=''): ?>
<p style="margin-top: -2%">	
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">______________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Pai)</p>
<p style="display: inline;margin-left: 19%"><?=$r->ROGOPAINUBENTE1?></p>
</p>	
<?php else: ?>
<br><br>	
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=strtoupper($r->NOMEPAINUBENTE1)?></p>
<br>
<?php endif ?>
<?php endif ?>



	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center"><?=strtoupper($_SESSION['nome'])?></p> 
		<p style="text-align: center"><?=$_SESSION['funcao']?></p> 

</body>
<?php endforeach  ?>
</html>
