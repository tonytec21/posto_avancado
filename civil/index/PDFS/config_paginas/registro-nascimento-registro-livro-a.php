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
	<?php $r = PESQUISA_ALL_ID('registro_nascimento',$id);
	foreach ($r as $r ) :
	#aqui vai preencher os inputs, vou preencher só um pra vc ver:
		if ($r->strQualificacaoDeclarante =='NAO_DECLARADO') {
$_SESSION['erro'] = 'NÃO SERÁ POSSÍVEL EMITIR, DADOS DO DECLARANTE NÃO INFORMADOS!';
echo '<span style="color:white; background:red"> NÃO SERÁ POSSÍVEL EMITIR, DADOS DO DECLARANTE NÃO INFORMADOS!!</span>';
break;
}	
		?>
	
<div style="width: 100%;" >
<h3 style="text-align: left;display: inline;margin-left: 1cm">LIVRO: A <?=intval($r->Livro)?></h3>
<h3 style="text-align: center; display: inline;margin-left: 5cm;">ORDEM: <?=intval($r->Ordem)?></h3>
<h3 style="text-align: right; display: inline;margin-left: 4.5cm;">FOLHA: <?=intval($r->Folha)?></h3>	
</div>
<br>



<h1 style="text-align: center"> Registro de Nascimento</h1>

<p style="text-align: justify;">Em	<?php //echo date('d/m/Y', strtotime($r->dataObito));

	$data = $r->dataRegistro ;
	$novaData = explode("-", $data);

	if ($novaData[2] == '01' || $novaData[2] == '1') {
		echo " Um de  ";
	}elseif ($novaData[2] == '02' || $novaData[2] == '2') {
		echo " Dois de ";
	} elseif ($novaData[2] == '03' || $novaData[2] == '3') {
		echo " Três ";
	} elseif ($novaData[2] == '04' || $novaData[2] == '4') {
		echo " Quatro de ";
	} elseif ($novaData[2] == '05' || $novaData[2] == '5') {
		echo " Cinco de ";
	} elseif ($novaData[2] == '06' || $novaData[2] == '6') {
		echo " Seis de ";
	} elseif ($novaData[2] == '07' || $novaData[2] == '7') {
		echo " Sete de ";
	} elseif ($novaData[2] == '08' || $novaData[2] == '8') {
		echo " Oito de ";
	} elseif ($novaData[2] == '09' || $novaData[2] == '9') {
		echo " Nove de ";
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

	?>, nesta comarca 

	<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?><?=$w->strRazaoSocial?> Estado do Maranhão <?php endforeach ?>, no 2º Subdistrito do Ofício de Registro Civíl das Pessoas Naturais, nesta serventia, procedo ao registro de nascimento nos termos do provimento nº _________/________________ da Egrégia Corregedoria Geral de Justiça do Estado do Maranhão, Cidade de  <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?><?php endforeach;endforeach ?>, de acordo com a declaração de nascido vivo nº <?=$r->strNumDNV?>, conforme a declaração assinada pelo pai em diligência no Hospital
	<?=$r->strLocalNascimento?>, situado em <?=$r->strEnderecoLocalNascimento?>, neste subdistrito, nasceu uma criança do sexo <?php if ($r->setSexoFilho == 'M') :?>
	Masculino
	<?php else: ?>	
	Feminino
	<?php endif ?>, que recebeu o nome de <?=strtoupper($r->strNomeFilho)?>, cpf de Numero <?=$r->CPFNASCIDO?> filho(a) de <?php if ($r->strNomePai!='NULL'):?> <?=strtoupper($r->strNomePai)?>, natural de 
<?php $d=PESQUISA_ALL_ID('uf_cidade',$r->strNaturalidadePai);foreach($d as $d):?><?=$d->cidade?>, <?=$d->uf?><?php endforeach ?>, Documento de identidade nº <?=$r->strRgPai?>

	 <?=$r->strNacionalidadePai?>(a), <?=$r->strProfissaoPai?>(a) e <?php endif ?>
	<?=strtoupper($r->strNomeMae)?>, natural de 
<?php $d=PESQUISA_ALL_ID('uf_cidade',$r->strNaturalidadeMae);foreach($d as $d):?><?=$d->cidade?>, <?=$d->uf?><?php endforeach ?>, Documento de identidade nº <?=$r->strRgMae?>
 <?=$r->strNacionalidadeMae?>(a), <?=$r->strProfissaoMae?>(a). São seus avós paternos: <?=strtoupper($r->strNomeAvos1a)?> e <?=strtoupper($r->strNomeAvos1b)?>. São seus avós maternos: <?=strtoupper($r->strNomeAvos2a)?> e <?=strtoupper($r->strNomeAvos2b)?>, Nº DNV : <?=$r->strNumDNV?>, nada mais dispensada a presença das testemunhas nos termos da Lei 9.997/2000.Eu <?=$_SESSION['nome']?>, escrevente, digitei subscrevo e assino.

	<br><br>



<br>
<?php if ($r->strRogoMae!=''): ?>
<p >
<br><br>	
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Mãe)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->strRogoMae?></p>
</p>
<?php else: ?>
<br><br>	
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=strtoupper($r->strNomeMae)?></p>
<br>	
<?php endif ?>

<?php if ($r->strNomePai !='NULL'): ?>
	
<?php if ($r->strRogoPai!=''): ?>
<p >
<br><br>	
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Pai)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->strRogoPai?></p>
</p>	
<?php else: ?>
<br><br>	
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=strtoupper($r->strNomePai)?></p>
<br>
<?php endif ?>
<?php endif ?>

<?php if ($r->strNomeDeclarante != '' && $r->strNomeDeclarante != 'NAO_DECLARADO' && $r->strNomeDeclarante !='NULL'): ?>
<?php if ($r->strRogoDeclarante!=''): ?>
<p >
<br><br>	
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Declarante)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->strRogoDeclarante?></p>
</p>	
<?php else: ?>
<br><br>	
<p style="max-width:  100%; text-align: center;">_______________________________________________________________________ <br> <?=strtoupper($r->strNomeDeclarante)?></p>
<br>
<?php endif ?>
<?php endif ?>


	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center;margin-top: -10px;"><?=strtoupper($_SESSION['nome'])?></p> 
		<p style="text-align: center;margin-top: -10px;">ESCREVENTE AUTORIZADO(A)</p> 

<?php endforeach  ?>
</body>
</html>
