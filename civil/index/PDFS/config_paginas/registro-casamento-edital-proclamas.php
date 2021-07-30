<!DOCTYPE html>
<?php include('../../../controller/db_functions.php');

#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
?>
<html>
<head>
	<title>Certidão de Casamento</title>
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

body{font-size: 14px;font-family: "Arial";}
</style>
</head>
<?php $r = PESQUISA_ALL_ID('registro_casamento',$id);
foreach ($r as $r ) :
#aqui vai preencher os inputs, vou preencher só um pra vc ver:
if ($r->setEstadoCivilNoivo == 'SO'  ) {
	$ec = "SOLTEIRO";
}
 if($r->setEstadoCivilNoiva == 'SO'  ){
	$ecnoiva="SOLTEIRA";
}

 if($r->setEstadoCivilNoivo == 'CA'   ){
	$ec="CASADO";
}

 if($r->setEstadoCivilNoiva == 'CA'   ){
	$ecnoiva="CASADA";
}

 if($r->setEstadoCivilNoivo == 'DI'  ){
	$ec="DIVORCIADO";
}

 if($r->setEstadoCivilNoiva == 'DI'  ){
	$ecnoiva="DIVORCIADA";
}
 if($r->setEstadoCivilNoivo == 'VI'  ){
	$ec="VIUVO";
}

 if($r->setEstadoCivilNoiva == 'VI'   ){
	$ecnoiva="VIUVA";
}

 if($r->setEstadoCivilNoivo == 'UN' ){
	$ec="EM UNIÃO ESTÁVEL";
}

 if($r->setEstadoCivilNoiva == 'UN'  ){
	$ecnoiva="EM UNIÃO ESTÁVEL";
}


	
	?>
<body>


<div style="width: 100%;" >
<h3 style="text-align: left;display: inline;margin-left:1.5cm">LIVRO: D <?=intval($r->Livro)?></h3>
<h3 style="text-align: center; display: inline;margin-left: 5cm;">ORDEM: <?=intval($r->Ordem)?></h3>
<h3 style="text-align: right; display: inline;margin-left: 4cm;">FOLHA: <?=intval($r->Folha)?></h3>	
</div>	
<br><br>




<h2 style="text-align: center; text-decoration: underline;margin-top: -3px">Edital de Proclamas</h2>
<h2 style="text-align: center;margin-top: -10px"><?=$r->strMatricula?></h2>

<p style="text-align: justify;font-size: 16px;"> 
<span style="margin-left: 2cm">Faço saber que pretendem casar-se e apresentaram documentos exigidos
pelo artigo 1.525 do Código Civil </span>Brasileiro, <?=strtoupper($r->strNomeNoivo)?> e <?=strtoupper($r->strNomeNoiva)?>. 
Ele, <?=$ec?> , 

com  

<?=(date('Y')- $r->dataNascimentoNoivo)  ; ?>
 anos de idade, <?=strtoupper($r->strNacionalidadeNoivo)?> (a), 
<?=strtoupper($r->strProfissaoNoivo)?>,

<?php 
$x = PESQUISA_ALL_ID('uf_cidade',$r->strNaturalNoivo); foreach ($x as $k) :?>

natural de <?=strtoupper($k->cidade.'/'.$k->uf)?>, 

<?php endforeach ?>

onde nasceu no dia
<?php
$data = $r->dataNascimentoNoivo ;
$novaDataNoivo = explode("-", $data);
echo $novaDataNoivo[2];
/*
if ($novaDataNoivo[2] == '01' || $novaDataNoivo[1] == '1') {
	echo " Um de  ";
}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[1] == '2') {
	echo " Dois de ";
} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[1] == '3') {
	echo " Três ";
} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[1] == '4') {
	echo " Quatro de ";
} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[1] == '5') {
	echo " Cinco de ";
} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[1] == '6') {
	echo " Seis de ";
} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[1] == '7') {
	echo " Sete de ";
} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[1] == '8') {
	echo " Oito de ";
} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[1] == '9') {
	echo " Nove de ";
} else {echo  ucfirst(GExtenso::numero($novaDataNoivo[2]));}
//Será exibido na tela a data: 16/02/2015
// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
*/
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
	echo " de Outubro de";
} elseif ($novaDataNoivo[1] == '11') {
	echo " de Novembro de ";
} elseif ($novaDataNoivo[1] == '12') {
	echo " de Dezembro de ";
} else {
	echo "Não definido";
}

echo $novaDataNoivo[0];

?>

residente e domiciliado em <?=strtoupper($r->strEnderecoNoivo)?>,

<?php $z = PESQUISA_ALL_ID('uf_cidade', $r->strCidadeNoivo); foreach ($z as $z):?>
<?=strtoupper($z->cidade.'/'.$z->uf)?>
<?php endforeach  ?>

filho de <?php if ($r->strPaiNoivo != 'NULL' && $r->strPaiNoivo!=''  && $r->strPaiNoivo !='NAO_DECLARADO'): ?>
	<?=strtoupper($r->strPaiNoivo)?> e de
<?php endif ?>
 <?php if ($r->strMaeNoivo != 'NULL' && $r->strMaeNoivo!=''): ?>
  <?=strtoupper($r->strMaeNoivo)?>. 
<?php endif ?>
<!--Noiva-->
Ela, <?=$ecnoiva?>, 

com  

<?=(date('Y')- $r->dataNascimentoNoiva)  ; ?>
 anos de idade, <?=strtoupper($r->strNacionalidadeNoiva)?> (o), 
<?=strtoupper($r->strProfissaoNoiva)?>,

<?php 
$x = PESQUISA_ALL_ID('uf_cidade',$r->strNaturalNoiva); foreach ($x as $k) :?>

natural de <?=$k->cidade.'/'.$k->uf?>, 

<?php endforeach ?>

onde nasceu no dia
<?php
$data = $r->dataNascimentoNoiva ;
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

residente e domiciliada em  <?=strtoupper($r->strEnderecoNoiva)?>,

<?php $z = PESQUISA_ALL_ID('uf_cidade', $r->strCidadeNoiva); foreach ($z as $z):?>
<?=strtoupper($z->cidade.'/'.$z->uf)?>
<?php endforeach  ?>

filho de 
<?php if ($r->strPaiNoiva != 'NULL' && $r->strPaiNoiva!=''  && $r->strPaiNoiva !='NAO_DECLARADO'): ?>
<?=strtoupper($r->strPaiNoiva)?>
 e de 
<?php endif ?>
 <?php if ($r->strMaeNoiva != 'NULL' && $r->strMaeNoiva!=''): ?>
 <?=strtoupper($r->strMaeNoiva)?>. 
<?php endif ?>

O regime de bens adotado será

<?php 

if ($r->setRegime == 'CP') {
	$regime = 'Comunhão Parcial de bens';
}

else if ($r->setRegime == 'CU') {
	$regime = 'Comunhão Universal de bens';
}

else if ($r->setRegime == 'PF') {
	$regime = 'Participação final nos aquestos';
}

else if ($r->setRegime == 'SB') {
	$regime = 'Separação  de bens';
}
else if ($r->setRegime == 'SC') {
	$regime = 'Separação Convencional';
}

else{
	$regime = 'Comunhão de Bens';
}
 


 ?>


<?=strtoupper($regime)?>. 



Se alguém souber de algum impedimento, oponha-o na forma da
Lei. Lavro o presente para ser afixado em Cartório no lugar de costume, no
prazo de 15 (quinze) dias. Observações: apresentaram petição ao Oficial,
certidões do Registro Civil dos nubentes e atestado de duas testemunhas.
Publicado nesta Serventia a partir de 

<?php
$data = $r->dataRegistro ;
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
 </p>

<p style="text-align: center">
<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
foreach ($u as $u):?>	

<?=$u->cidade?>,

<?php
$data = $r->dataRegistro ;
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

<br><br>

<p style="text-align: center">_______________________________________________________________________ <br>
<?=$_SESSION['nome']?><br>Oficial do Registro Civil</p>

</p> 

<p style="text-align: center;margin-top: -3px;">
<?=$h->strLogradouro?>,<?=$h->strNumero?> - <?=$u->cidade?> - <?=$u->uf?> -  Fone: <?=$h->strTelefone1?> / <?=$h->strTelefone2?>
</p>

<?php endforeach ?>
<?php endforeach ?>
</body>
<?php endforeach  ?>
</html>
