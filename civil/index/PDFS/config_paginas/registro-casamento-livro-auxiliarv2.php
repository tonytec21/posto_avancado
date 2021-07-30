<!DOCTYPE html>
<?php include('../../controller/db_functions.php');
$pdo = conectar();
#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
if (isset($_GET['id_apagar'])) {$id_apagar = $_GET['id_apagar'];
    $del = $pdo->prepare("DELETE FROM salvar_editor where IDREGISTRO ='$id_apagar' and TIPO = 'TERMO_CASAMENTO_AUXILIAR' ");
    $del->execute();
    }
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
body{ font-size: 12px;font-family: "Arial";margin-left: 1cm;margin-bottom: -10cm;}
</style>
</head>

<?php 
$busca_ja_existe = $pdo->prepare("SELECT * FROM salvar_editor where IDREGISTRO = '$id' and TIPO = 'TERMO_CASAMENTO_AUXILIAR'");
	$busca_ja_existe->execute();

	if ($busca_ja_existe->rowCount()!=0) {
	$recebe_texto = $busca_ja_existe->fetch(PDO::FETCH_ASSOC);
	echo $recebe_texto['TEXTO'];
	}	
	?>
	<?php if ($busca_ja_existe->rowCount()==0): ?>

<?php $r = PESQUISA_ALL_ID('registro_casamento_novo',$id);
foreach ($r as $r ) :
if ($r->DATAENTRADA == '') {
$r->DATAENTRADA = date('Y-m-d');
$r->TIPOLIVRO='3';
}

	?>
	<?php if ($r->DATAENTRADA==''): ?>
	<span style="color: red">O CAMPO "DATA DO REGISTRO" NÃO FOI PREENCHIDO POR FAVOR RETORNE E PREENCHA.</span>
<?php break; endif ?>

<?php if ($r->DATACASAMENTO==''): ?>
	<span style="color: red">O CAMPO "DATA DO CASAMENTO" NÃO FOI PREENCHIDO POR FAVOR RETORNE E PREENCHA.</span>
<?php break; endif ?>

<?php if ($r->TIPOLIVRO!='3'): ?>
	<span style="color: red">CASAMENTO NÃO FOI PREENCIDO COMO LIVRO B AUXILIAR.</span>
<?php break; endif ?>

<body>
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
	<br><br>			     
<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
	
<div style="width: 100%; text-align: center; display: block;margin-top: -20px;" >
			<h3 style="display: inline;margin-left: 1cm">LIVRO: B - AUXILIAR <?=intval($r->LIVROCASAMENTO)?></h3>
			<h3 style=" display: inline;margin-left: 1cm;">ORDEM: <?=intval($r->TERMOCASAMENTO)?></h3>
			<h3 style=" display: inline;margin-left: 1cm;">FOLHA: <?=intval($r->FOLHACASAMENTO)?></h3>	
			</div>
			<hr style="border:1px solid black">
			<div style="display: block;">
			<fieldset style="border:1px solid black; max-width: 75%; font-size: 90%; display: inline-block;border-right: none; border-bottom: none">		
			<h1 style="text-align: center;">REGISTRO DE CASAMENTO</h1>

<p style="text-align: justify;">Ao(s) 	
			<?php 
			if ($r->DATACASAMENTO!='') {
			$data = $r->DATACASAMENTO ;
			if ($r->ATOCASAMENTO!='14.1.1') {
			$data = $r->DATAENTRADA;
			}

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
			echo " de Outubro de ";
			} elseif ($novaData[1] == '11') {
			echo " de Novembro de ";
			} elseif ($novaData[1] == '12') {
			echo " de Dezembro de ";
			} else {
			echo "Não definido";
			}

			echo dataum($novaData[0]);
			}
			?> (<?=date('d/m/Y', strtotime($data))?>), neste(a)
			<span style="text-transform: capitalize;">
			<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?><?=$w->strRazaoSocial?> Estado do Maranhão <?php endforeach ?>
			</span>, atendendo ao que foi requerido e nos termos da lei 6.015 de 31/09/1973, inscrevo o casamento religioso de:

			<b><?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?></b>
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
		
		<!--TEXTO DO CASAMENTO ----------------------------------------------------------------------------------------------->
							<p style="text-align: justify;">
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
							$regime = 'Separação Convencional'.', '.$COMPLEMENTOREGIME;
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
							O regime do casamento será o da <?=$regime?>.
							Apresentaram os documentos exigidos
							pelo artigo 1.525 do Código Civil Brasileiro, constantes dos autos de habilitação de casamento,
							deste Ofício, a saber: (I) Certidão de nascimento, (III) Atestado de não impedimento de se
							casarem e (IV) Declaração dos contraentes.
							O edital de proclamas foi afixado neste Cartório no local de costume entre o
						período de <?=date('d/m/Y', strtotime($r->DATAEDITAL)) ?> a <?=date('d/m/Y', strtotime($r->DATAEDITAL.'+15days')) ?>,
						não havendo impedimento legal para a realização do
						casamento. O ato religioso foi celebrado 
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

							?> às <?=$r->HORACASAMENTO?> horas, perante o(a) <?=$r->CELEBRANTERELIGIOSO?>, No(a) <?=$r->NOMEIGREJA?>  e as testemunhas.
							

							</p>
		<!--TEXTO DO CASAMENTO ----------------------------------------------------------------------------------------------->	

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
		<p style="text-align: justify;">
		O casamento foi celebrado de acordo com a Lei 1.110 de 23 de maio de 1950, com alterações
					introduzidas pelas Leis 6.015 de 31 de dezembro de 1973 e 6.216 de 30 de junho de 1975
					artigo 72 e 73 parágrafo 1º e 2º. E para constar, lavrei este termo, que sendo lido e achado
					conforme, Eu, <?=$nome_assinatura?>, <?=$funcao_assinatura?> dou fé e assino. Selo de Fiscalização: <?=strip_tags($r->SELO)?>. 

										<?php if ($r->TIPOLIVRO == '3'): ?>
						Observação: Casamento religioso celebrado em  

							<?php //echo date('d/m/Y', strtotime($r->dataObito));

					$data = $r->DATARELIGIOSO;
					$nova_data = explode("-", $data);

					if ($nova_data[2] == '01' || $nova_data[2] == '1') {
						echo " Primeiro   ";
					}elseif ($nova_data[2] == '02' || $nova_data[2] == '2') {
						echo " Dois  ";
					} elseif ($nova_data[2] == '03' || $nova_data[2] == '3') {
						echo " Três ";
					} elseif ($nova_data[2] == '04' || $nova_data[2] == '4') {
						echo " Quatro  ";
					} elseif ($nova_data[2] == '05' || $nova_data[2] == '5') {
						echo " Cinco  ";
					} elseif ($nova_data[2] == '06' || $nova_data[2] == '6') {
						echo " Seis  ";
					} elseif ($nova_data[2] == '07' || $nova_data[2] == '7') {
						echo " Sete  ";
					} elseif ($nova_data[2] == '08' || $nova_data[2] == '8') {
						echo " Oito  ";
					} elseif ($nova_data[2] == '09' || $nova_data[2] == '9') {
						echo " Nove  ";
					}  elseif ($nova_data[2] == '01' || $nova_data[2] == '1' ||  $nova_data[2] == '21'|| $nova_data[2] == '31'|| $nova_data[2] == '41' || $nova_data[2] == '51'|| $nova_data[2] == '61' || $nova_data[2] == '71' || $nova_data[2] == '81' || $nova_data[2] == '91') {
					    echo  ucfirst(GExtenso::numero($nova_data[2])).'um';
					  }
					   else {echo  ucfirst(GExtenso::numero($nova_data[2]));}
					//Será exibido na tela a data: 16/02/2015
					// . "de".$nova_data[1] . " de " . GExtenso::numero ($nova_data[0])
					if ($nova_data[1] == '01' || $nova_data[1] == '1') {
						echo " de Janeiro de ";
					}elseif ($nova_data[1] == '02' || $nova_data[1] == '2') {
						echo " de Fevereiro de ";
					} elseif ($nova_data[1] == '03' || $nova_data[1] == '3') {
						echo " de Março de ";
					} elseif ($nova_data[1] == '04' || $nova_data[1] == '4') {
						echo " de Abril de ";
					} elseif ($nova_data[1] == '05' || $nova_data[1] == '5') {
						echo " de Maio de ";
					} elseif ($nova_data[1] == '06' || $nova_data[1] == '6') {
						echo " de Junho de ";
					} elseif ($nova_data[1] == '07' || $nova_data[1] == '7') {
						echo " de Julho de ";
					} elseif ($nova_data[1] == '08' || $nova_data[1] == '8') {
						echo " de Agosto de ";
					} elseif ($nova_data[1] == '09' || $nova_data[1] == '9') {
						echo " de Setembro de ";
					} elseif ($nova_data[1] == '10') {
						echo " de Outubro de";
					} elseif ($nova_data[1] == '11') {
						echo " de Novembro de ";
					} elseif ($nova_data[1] == '12') {
						echo " de Dezembro de ";
					} else {
						echo "Não definido";
					}

					 $udg = substr($nova_data[0], 2,3);
					  if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
					   echo GExtenso::numero($nova_data[0]).'  um';
					  }
					  else{
					    echo GExtenso::numero($nova_data[0]);
					  }
					?> (<?=date('d/m/Y', strtotime($r->DATARELIGIOSO))?>). No(a) <?=$r->NOMEIGREJA?>, <?php 
					$x = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEIGREJA)); foreach ($x as $k) :?>
					<span style="text-transform: initial;"> <?=$k->cidade?>/<?=$k->uf?></span>, 

					<?php endforeach ?> pelo(a) <?=$r->CELEBRANTERELIGIOSO?>. 

					<?php endif ?>


					Matrícula da 1ª Via da Certidão: <?=$r->MATRICULA?> ---------------------------------------- <span style="font-size: 8px;">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>	

		</p>
		<p style="text-align: center">
							<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
							$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
							foreach ($u as $u):?>	

							<?=$u->cidade?>,

							<?php
							$data = $r->DATAENTRADA ;
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
							<?php endforeach; endforeach ?>	
							</p>

							<br>
						<p style="text-align: center">_____________________________________</p> 
						<p style="text-align: center;margin-top: -10px;"><?=strtoupper($nome_assinatura)?></p> 
						<p style="text-align: center;margin-top: -10px;"><?=strtoupper($funcao_assinatura)?></p> 


<div style="position: absolute;width: 50%; margin-top: -100px;">

<?php
$retorno = json_decode($r->RETORNOSELODIGITALCASAMENTO,true);
$qr = $retorno['valorQrCode'];
$textoselo = $retorno['textoSelo'];
include_once('../../../plugins/phpqrcode/qrlib.php');

function tirarAcentos($string){
return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/"),explode(" ","a A e E i I o O u U n N C c"),$string);
}
$img_local = "qrimagens/";
$img_nome = tirarAcentos($r->NOMENUBENTE1.'&'.$r->NOMENUBENTE2).'.png';
$nome = $img_local.$img_nome;

$conteudo = $qr;
QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


#echo '<img style="max-width:20%; margin-top:-15px;margin-left:10px;" src="'.$nome.'" />';
?>

<!--p style="font-weight: bold; font-size: 6px;margin-top: -10px;width: 50%;"><?=$textoselo?></p-->
</div>
<table style="border:none; max-width: 60%; margin-left:20%">
	<tr style="border:none">

	<td style="border:1px dashed silver">
	<img style="width: 70px" src="<?=$nome?>" />
	</td>

	<td style="border:1px dashed silver">
	<p style="text-align: justify; font-weight: bold;font-size: 9px; ">
	<!-- <?php #echo mb_convert_case((utf8_encode($textoselo)), MB_CASE_UPPER, "UTF-8")?> -->
	<?=corrigirACENTO_utf8($textoselo)?>
	</p>
	</td>




	</tr>
	</table>
					
 </fieldset>

<fieldset style="display: inline;width: 18%;position: absolute;border:1px solid black; padding-top: 0%;height: 80%; border-right: none; border-bottom: none; margin-top: -3px;"><legend style="font-size: 9px"> AVERBAÇÕES/ANOTAÇÕES</legend>
<p style= "max-width: 90%">
<?php  
$busca_registro_add = $pdo->prepare("SELECT * from info_registros_civil where id_registro_casamento = '$id'");
		$busca_registro_add->execute();
		if ($busca_registro_add->rowCount()>0) :
			$bra = $busca_registro_add->fetchAll(PDO::FETCH_OBJ);
			foreach ($bra as $b) {
			echo $b->observacoes_registro;
			}
		endif;	
?>
</p></fieldset>
</div>

					

</body>
<?php endforeach; endif;  ?>
</html>
