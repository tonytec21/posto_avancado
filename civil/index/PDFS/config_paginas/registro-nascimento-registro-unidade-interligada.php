
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
		echo " Um   ";
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
		echo " de Outubro de";
	} elseif ($novaData[1] == '11') {
		echo " de Novembro de ";
	} elseif ($novaData[1] == '12') {
		echo " de Dezembro de ";
	} else {
		echo "Não definido";
	}

	echo GExtenso::numero($novaData[0]);

	?> neste

	<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?><?=$w->strRazaoSocial?> Estado do Maranhão <?php endforeach ?>, foi enviado pelo Sistema Informatizado via rede mundial de computadores (art 1º) da Unidade Interligada <?=$r->strLocalNascimento?>, requerimento para lavratura do assento de nascimento conforme com o Prov. 13/10 CNJ nos seguintes termos: o pai do registrado declarou na Unidade Interligada que no dia 

	
 <?php //echo date('d/m/Y', strtotime($r->dataObito));

	$data = $r->dataNascimento ;
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

	echo GExtenso::numero($novaData[0]);

	?> as <?=$r->horaNascimento?> Horas, na <?=$r->strLocalNascimento?>, em municipio de 

	<?php  $c = PESQUISA_ALL_ID('uf_cidade',$r->strCidadeFilho); foreach($c as $c):?>
<?=$c->cidade?> (<?=$c->uf?>)
	<?php endforeach ?>, Nasceu uma criança do sexo 
	<?php if ($r->setSexoFilho == 'M') :?>
	Masculino
	<?php else: ?>	
	Feminino
	<?php endif ?>, que recebeu o nome de <?=strtoupper($r->strNomeFilho)?>, filho(a) de <?php if ($r->strNomePai!='NULL'):?><?=strtoupper($r->strNomePai)?>, <?=$r->strNacionalidadePai?>(a), <?=$r->strProfissaoPai?>(a) e <?php endif ?>
	<?=strtoupper($r->strNomeMae)?>, <?=$r->strNacionalidadeMae?>(a), <?=$r->strProfissaoMae?>(a). São seus avós paternos: <?=strtoupper($r->strNomeAvos1a)?> e <?=strtoupper($r->strNomeAvos1b)?>. São seus avós maternos: <?=strtoupper($r->strNomeAvos2a)?> e <?=strtoupper($r->strNomeAvos2b)?>, 1º via Isenta de emolumentos, conforme Lei nº 9.534, de 10 de dezembro de 1997. Registro lavrado de acordo com o provimento _______/_________ do Conselho nacional de Justiça do estado do Maranhão, cuja declaração Nº DNV : <?=$r->strNumDNV?> fica arquivada nesta serventia. nada mais se declarou. Dou fé. Lido e achado conforme assina o declarante Eu 	
<?=$_SESSION['nome']?>, escrevente autorizado(a), digitei subscrevo e assino.


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
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=$r->strNomeMae?></p>
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
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=$r->strNomePai?></p>
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
<p style="max-width:  100%; text-align: center;">_______________________________________________________________________ <br> <?=$r->strNomeDeclarante?></p>
<br>
<?php endif ?>
<?php endif ?>



	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center"><?=$_SESSION['nome']?></p> 
		<p style="text-align: center">ESCREVENTE AUTORIZADO(A)</p> 
	

<br><br>


	</p>
	 </fieldset>

<?php endforeach  ?>
</body>
</html>
