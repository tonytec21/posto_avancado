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
body{text-transform: uppercase; font-size: 16px;font-family: "Courier New";}
</style>
</head>

<body>
	<?php $r = PESQUISA_ALL_ID('registro_obito',$id);
	foreach ($r as $r ) :
	#aqui vai preencher os inputs, vou preencher só um pra vc ver:
		?>
<?php 
if ($r->setEstadoCivil == 'SO'  ) {
	$ec = "SOLTEIRO (a)";
}
 if($r->setEstadoCivil == 'CA'   ){
	$ec="CASADO (a)";
}


 if($r->setEstadoCivil == 'DI'  ){
	$ec="DIVORCIADO (a)";
}

 if($r->setEstadoCivil == 'VI'  ){
	$ec="VIUVO (a)";
}


 if($r->setEstadoCivil == 'UN' ){
	$ec="EM UNÎÃO ESTÁVEL";
}

	?>

	
<div style="width: 100%;" >
<p style="text-align: left;display: inline;">LIVRO: C <?=$r->Livro?></p>
<p style="text-align: center; display: inline;margin-left: 5cm;">ORDEM: <?=$r->Ordem?></p>
<p style="text-align: right; display: inline;margin-left: 4cm;">FOLHA: <?=$r->Folha?></p>	
</div>
<br>

<img style="max-width: 100%" src="../bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center"> Assento de Óbito</h1>	

<p style="text-align: justify;">Aos 	<?php //echo date('d/m/Y', strtotime($r->dataObito));

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

	?> neste

	<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?><?=$w->strRazaoSocial?> Estado do Maranhão <?php endforeach ?>, e conforme declaração prestada junto ao serviço funerário <?=$r->strNDO?>, por <?=$r->strDeclarante?>, na qualidade de <?=$r->strQualidadeDeclarante?>, a qual se encontra arquivada nesta Unidade de Serviço e exibindo atestado de óbito, firmado pelo  Dr. <?=$r->strMedico?>, CRM nº <?=$r->strCrmMedico?>, que consta como causa da morte <?=$r->strCausaMorte?>, registra-se que em, 
	

 <?php //echo date('d/m/Y', strtotime($r->dataObito));

	$data = $r->dataObito ;
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

	?>, às <?=$r->horaObito?> Horas,neste Subdistrito, no <?=$r->strLocalMorte?>, situado na rua <!--?=//$r->strEnderecoLocalMorte?-->, 
<?php if ($r->strNome !='DESCONHECIDO'): ?>
	faleceu <?=strtoupper($r->strNome)?>
<?php endif ?>
<?php if ($r->strNome =='DESCONHECIDO'): ?>
	faleceu um (a) individuo de identidade desconhecida
<?php endif ?>



, do sexo 
	<?php if ($r->setSexo == 'M'):?>Masculino <?php else: ?> Feminino <?php endif ?>, de cor 
	
	<?php 
	if ($r->setCor=='BR') {
		$cor = 'branca';
	} 
	if ($r->setCor=='PR') {
		$cor = 'preta';
	} 
	if ($r->setCor=='PA') {
		$cor = 'parda';
	} 
	if ($r->setCor=='AM') {
		$cor = 'amarela';
	} 
	if ($r->setCor=='IN') {
		$cor = 'indígena';
	} 


	?>
<?=$cor?>,<?php if ($r->strNome !='DESCONHECIDO'): ?> <?=$r->strProfissao?>, natural de <?php $c = PESQUISA_ALL_ID('uf_cidade',$r->strNatural);foreach($c as $c): ?><?=$c->cidade ?> (<?=$c->uf?>)<?php endforeach ?>,<?=$r->strProfissao?>,<?php endif ?> <?php if ($r->strNome !='DESCONHECIDO'): ?> domiciliado e residente em <?=$r->strEndereco?>, 
<?php $c = PESQUISA_ALL_ID('uf_cidade',$r->strCidade);foreach($c as $c): ?><?=$c->cidade ?> (<?=$c->uf?>)<?php endforeach ?> com <?=date('Y')- $r->dataNascimento?> anos de idade, <?=$ec?>, filho de <?=strtoupper($r->strPai)?>, <?=$r->strProfissaoPai?> e <?=strtoupper($r->strMae)?>, <?=$r->strProfissaoMae?>,<?php endif ?> que será sepultado em <?=$r->strLocalSepultamento?>. O declarante apresentou os seguintes documentos do falecido <?php if ($r->strNome !='DESCONHECIDO'): ?> RG nº <?=$r->strRG?> <?php endif ?>. Declaração de óbito nº <?=$r->strNDO?>.
<?php if ($r->setDeixouBens == 'S'): ?>
	Deixando Bens,
<?php else: ?>
Não deixando bens,	
<?php endif ?>

<?php if ($r->setEleitor == 'S'): ?>
	Era eleitor,
<?php else: ?>
não sendo eleitor,	
<?php endif ?>

<?php if ($r->setDeixouFilhos == 'S'): ?>
	Deixando os filhos (as) <?=$r->strNomeFilhos?>.
<?php else: ?>
	Não deixando nenhum filho.
<?php endif ?>
ISENTO DE EMOLUMENTOS CONFORME LEI 9534 DE 10/12/97. Eu,

<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): ?><?=$w->strTituloServentia?><?php endforeach ?>
 digitei e assino.






	 

<br><br><br><br>

<?php if ($r->strDeclarante != '' && $r->strDeclarante != 'NAO_DECLARADO' && $r->strDeclarante !='NULL'): ?>
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
<p style="max-width:  100%; text-align: center;">________________________________________ <br> <?=$r->strDeclarante?></p>
<br>
<?php endif ?>
<?php endif ?>


	<img src="../bd_INSERTS/<?=$_SESSION['assinatura']?>" style="width: 20%;margin-bottom: -40px;margin-left: 8cm">	
	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center"><?=$_SESSION['nome']?></p> 
		<p style="text-align: center">ESCREVENTE AUTORIZADO(A)</p> 


	</p>


<?php endforeach  ?>
</body>
</html>
