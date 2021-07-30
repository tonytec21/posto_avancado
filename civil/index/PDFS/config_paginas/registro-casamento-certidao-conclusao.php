<!DOCTYPE html>
<?php include('../../controller/db_functions.php');

#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
$tirar_cidades = array("5300109/", "/");
$repor_cidades = array(" ",", ");
if (isset($_GET['id_apagar'])) {$id_apagar = $_GET['id_apagar'];
    $del = $pdo->prepare("DELETE FROM salvar_editor where IDREGISTRO ='$id_apagar' and TIPO = '1_HAB_CASAMENTO' ");
    $del->execute();
    }

function echo_exist($texto){
if ($texto!='' && $texto!=' ' && $texto!=NULL) {
		echo $texto;
	}
}

function cidade_estrangeiro($texto){
/*$tirar = array("1","2","3","4","5","6","7","8","9","0",",",);
if (intval(intval($texto) == '5300109')) {
return str_replace($tirar, "", $texto);
	}	
*/;
return "";	
}

function idade_civil_antigo($nascimento,$dataregistro){
  $data = explode("-",$nascimento);
  $registro = explode("-",$dataregistro);	

  if (!isset($dataegistro) ) {
  	$registro = explode("-",date('Y-m-d'));
  }
 
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
foreach ($r as $r ) :?>
<body>

<!--outro-->

	<div style="margin-top: 2cm; text-align: justify; padding-left: 3cm; padding-right: 2cm; font-size: 14px;">
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
						
						<h2 style="text-align:center;">CERTIDÃO DE HABILITAÇÃO PARA CASAMENTO <br> (Art. 1.531 do CC)</h2>
						<p style="text-align: justify;">

						C E R T I F I C O que, em virtude dos documentos

						legais, que me foram apresentados pelos contraentes:
						<b><?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?></b>


						<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify;">O(a) CONTRAENTE
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
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE1)?></span>
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
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->CIDADENUBENTE1)?></span>
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
						} else {echo  dataum($novaDataNoivo[2]);}
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

						$udg = substr($novaDataNoivo[0],  2,3);
						if ($udg == '01' || $udg == '1' ||$udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE1))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE1, $r->DATAENTRADA)?> anos de idade.
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


					Filho(a) de 

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
					<?php if (intval($r->NATURALIDADEPAINUBENTE1) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEPAINUBENTE1)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
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
					<?=idade_civil_antigo($r->DATANASCIMENTOPAINUBENTE1, $r->DATAENTRADA)?> anos de idade. E de 
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
					<?php if (intval($r->NATURALIDADEMAENUBENTE1) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEMAENUBENTE1)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
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
					<?=idade_civil_antigo($r->DATANASCIMENTOMAENUBENTE1,$r->DATAENTRADA)?> anos de idade. 
					<?php endif ?>
					<?php endif ?>
			 </p>
		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->

		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify;">O(a) CONTRAENTE
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
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE2)?></span>
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
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE2)?></span>
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
						} else {echo  dataum($novaDataNoivo[2]);}
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

						$udg = substr($novaDataNoivo[0],  2,3);
						if ($udg == '01' || $udg == '1' ||$udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE2))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE2,$r->DATAENTRADA)?> anos de idade.
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
					<?php if (intval($r->NATURALIDADEPAINUBENTE2) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEPAINUBENTE2)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
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
					} else {echo  dataum($novaDataNoivo[2]);}
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
					<?=idade_civil_antigo($r->DATANASCIMENTOPAINUBENTE2, $r->DATAENTRADA)?> anos de idade. E de 
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
					<?php if (intval($r->NATURALIDADEMAENUBENTE2) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEMAENUBENTE2)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
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
					<?=idade_civil_antigo($r->DATANASCIMENTOMAENUBENTE2, $r->DATAENTRADA)?> anos de idade. 
					<?php endif ?>
					<?php endif ?>
			 </p>
		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->


						Satisfizeram as exigências do art. 1.531 do Código
						Civil Brasileiro, em vigor, tendo afixado no lugar do costume os
						editais de proclamas, decorreu o prazo legal e nenhum impedimento
						foi apresentado, pelo que ficam habilitados para contraírem
						matrimônio dentro de 90(noventa) dias, a contar desta data.	

						</p>
						<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					$data = $r->DATAHABILITACAO ;
					if (empty($r->DATAHABILITACAO)) {
					$data = date('Y-m-d');
					}
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
					<p style="text-align: center;">
					____________________________________________ <br>	
					<?=strtoupper($_SESSION['nome'])?></p>
					<p style="text-align: center;margin-top: -7px;"><?=$_SESSION['funcao']?></p>
	</div>	
<!--CERTIDAO HABILITACAO-->
	<div style="page-break-before: always;margin-top: 2cm; text-align: justify; padding-left: 3cm; padding-right: 2cm; font-size: 14px;">
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
						<h2 style="text-align: center;">AUTOS DO PEDIDO DE HABILITAÇÃO <br><span style="font-size: 12px;">(Art. Art. 1.526 do CC)</span></h2>
						<p style="text-align: justify;">
						HOMOLOGO, nos termos do artigo 1.526, do Código Civil
						Brasileiro, o pedido de habilitação para casamento civil
						formulado por <b><?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?></b> , 
						tendo em vista o cumprimento das
						formalidades do artigo 1.525, incisos I, III e IV, do Código
						Civil Brasileiro e o parecer favorável do Ilustre Representante
						do Ministério Público Estadual, consoante ao que dispõe o Art.
						5º, II, da Recomendação Nº 16, de 28 de abril de 2010, do
						Conselho Nacional do Ministério Público.	
						</p>
						<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAHABILITACAO=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAHABILITACAO ;
					}
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
					<p style="text-align: center;">
					________________________________ <br>	
					<?=strtoupper($_SESSION['nome'])?></p>
					<p style="text-align: center;margin-top: -7px;"><?=$_SESSION['funcao']?></p>
	</div>						
<!--CERTIDAO HABILITACAO2-->
	<div style="page-break-before: always;margin-top: 2cm; text-align: justify; padding-left: 3cm; padding-right: 2cm; font-size: 14px;">
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
						<h2 style="text-align: center;">CERTIDÃO</h2>
						<p style="text-align: justify;">
						CERTIFICO que afixei e publiquei o Edital de Proclamas dos Contraentes <b><?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?></b> em 
						<?=date('d/m/Y', strtotime($r->DATAEDITAL))?> no Placar do Fórum e no Átrio deste Cartório, e que transcorreu o prazo de 15 dias, findando-se aos 



						<?php
					$data = date('Y-m-d', strtotime($r->DATAEDITAL.'+15days')) ;
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
				
					






						sem que tenha sido manifestado impugnação ou impedimento de qualquer natureza.	
						</p>
						<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAHABILITACAO=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAHABILITACAO ;
					}
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
					<p style="text-align: center;">
					________________________________ <br>	
					<?=strtoupper($_SESSION['nome'])?></p>
					<p style="text-align: center;margin-top: -7px;"><?=$_SESSION['funcao']?></p>
	</div>							

<!--outro-->

	<div style="page-break-before: always;margin-top: 2cm; text-align: justify; padding-left: 1cm; padding-right: 1cm; font-size: 14px;">
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
						<p style="text-align: justify;">

							<h3>EXCELENTÍSSIMO SENHOR DOUTOR (a) JUIZ (A) DE CASAMENTOS DO REGISTRO CIVIL.
							(Art. 1.533 do CC) </h3>

							<p style="text-align: center;">Como requerem

							Em <br>

							___________________________
							</p>
							<p style="">
							<b><?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?></b>, achando-se habilitados a contraírem matrimônio, requerem a Vossa Excelência designe dia e hora para celebração do competente ato.</p>
							<p style="text-align: center;">
							Nestes Termos,
							Pedem Deferimento.
							</p>
							

							<p style="text-align: center">
							<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
							$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
							foreach ($u as $u):?>	

							<?=$u->cidade?>,

							<?php
							if ($r->DATAHABILITACAO=='') {
							$data = date('Y-m-d');
							}
							else{
							$data = $r->DATAHABILITACAO ;
							}
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
							<p style="text-align: center">
							_______________________________ <br>	
							<?=$r->NOMENUBENTE1?><br><br>
							________________________________ <br>
							<?=$r->NOMENUBENTE2?><br>
							</p>
							<br>
							


						
	</div>	




</body>
<?php endforeach  ?>
</html>
