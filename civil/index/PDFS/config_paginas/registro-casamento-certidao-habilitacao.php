<!DOCTYPE html>
<?php include('../../controller/db_functions.php');

#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];

?>
<html>
<head>
	<title>Casamento- Autuamento</title>
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
body{ font-size: 12px;font-family: "Arial";}
</style>
</head>
<?php $r = PESQUISA_ALL_ID('registro_casamento',$id);
foreach ($r as $r ) :

if ($r->dataHabilitacao =='1111-11-11') {
$_SESSION['erro'] = 'NÃO SERÁ POSSÍVEL EMITIR, DADOS DA HABILITAÇÃO NÃO INFORMADOS!';
echo '<span style="color:white; background:red"> NÃO SERÁ POSSÍVEL EMITIR, DADOS DA HABILITAÇÃO NÃO INFORMADOS!</span>';
break;
}

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
	



<h2 style="text-align: center; text-decoration: underline;margin-top: -3px">CERTIDÃO DE HABILITAÇÃO</h2>	


<p style="text-align: justify;">

CERTIFICO que foi afixado no lugar de costume e publicado pela imprensa, na forma da lei, os editais de proclamas do casamento de <?=strtoupper($r->strNomeNoivo)?> e <?=strtoupper($r->strNomeNoiva)?> <br><br>

O PRETENDENTE <?=strtoupper($r->strNomeNoivo)?>, <?=$ec?>, 

com  

<?=(date('Y')- $r->dataNascimentoNoivo)  ; ?>
  anos de idade,<?=$r->strNacionalidadeNoivo?>, 
<?=$r->strProfissaoNoivo?>,

<?php 
$x = PESQUISA_ALL_ID('uf_cidade',$r->strNaturalNoivo); foreach ($x as $k) :?>

natural de <?=$k->cidade?>, 

<?php endforeach ?>

onde nasceu no dia
<?php
$data = $r->dataNascimentoNoivo ;
$novaDataNoivo = explode("-", $data);
echo $novaDataNoivo[2]." de ";
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

residente e domiciliado <?=$r->strEnderecoNoivo?>,

<?php $z = PESQUISA_ALL_ID('uf_cidade', $r->strCidadeNoivo); foreach ($z as $z):?>
<?=$z->cidade?>
<?php endforeach  ?>

filho de 

<?php if ($r->strPaiNoivo!=''&&$r->strPaiNoivo!='NAO_DECLARADO'): ?>
<?=$r->strPaiNoivo?>
 e de 
<?php endif ?>
 <?=$r->strMaeNoivo?>. 
<?php if ($r->strPaiNoivo!=''&&$r->strPaiNoivo!='NAO_DECLARADO'): ?>
ele natural de <?php $z = PESQUISA_ALL_ID('uf_cidade', $r->NaturalidadePaiNoivo); foreach ($z as $z):?>
<?=$z->cidade?>
<?php endforeach  ?>, 

nascido aos 
<?php
$data = $r->dataNascimentoPaiNoivo ;
$novaDataPaiNoivo = explode("-", $data);
echo $novaDataPaiNoivo[2]." de ";
/*
if ($novaDataPaiNoivo[2] == '01' || $novaDataPaiNoivo[1] == '1') {
	echo " Um de  ";
}elseif ($novaDataPaiNoivo[2] == '02' || $novaDataPaiNoivo[1] == '2') {
	echo " Dois de ";
} elseif ($novaDataPaiNoivo[2] == '03' || $novaDataPaiNoivo[1] == '3') {
	echo " Três ";
} elseif ($novaDataPaiNoivo[2] == '04' || $novaDataPaiNoivo[1] == '4') {
	echo " Quatro de ";
} elseif ($novaDataPaiNoivo[2] == '05' || $novaDataPaiNoivo[1] == '5') {
	echo " Cinco de ";
} elseif ($novaDataPaiNoivo[2] == '06' || $novaDataPaiNoivo[1] == '6') {
	echo " Seis de ";
} elseif ($novaDataPaiNoivo[2] == '07' || $novaDataPaiNoivo[1] == '7') {
	echo " Sete de ";
} elseif ($novaDataPaiNoivo[2] == '08' || $novaDataPaiNoivo[1] == '8') {
	echo " Oito de ";
} elseif ($novaDataPaiNoivo[2] == '09' || $novaDataPaiNoivo[1] == '9') {
	echo " Nove de ";
} else {echo  ucfirst(GExtenso::numero($novaDataPaiNoivo[2]));}
//Será exibido na tela a data: 16/02/2015
// . "de".$novaDataPaiNoivo[1] . " de " . GExtenso::numero ($novaDataPaiNoivo[0])
*/
if ($novaDataPaiNoivo[1] == '01' || $novaDataPaiNoivo[1] == '1') {
	echo " de Janeiro de ";
}elseif ($novaDataPaiNoivo[1] == '02' || $novaDataPaiNoivo[1] == '2') {
	echo " de Fevereiro de ";
} elseif ($novaDataPaiNoivo[1] == '03' || $novaDataPaiNoivo[1] == '3') {
	echo " de Março de ";
} elseif ($novaDataPaiNoivo[1] == '04' || $novaDataPaiNoivo[1] == '4') {
	echo " de Abril de ";
} elseif ($novaDataPaiNoivo[1] == '05' || $novaDataPaiNoivo[1] == '5') {
	echo " de Maio de ";
} elseif ($novaDataPaiNoivo[1] == '06' || $novaDataPaiNoivo[1] == '6') {
	echo " de Junho de ";
} elseif ($novaDataPaiNoivo[1] == '07' || $novaDataPaiNoivo[1] == '7') {
	echo " de Julho de ";
} elseif ($novaDataPaiNoivo[1] == '08' || $novaDataPaiNoivo[1] == '8') {
	echo " de Agosto de ";
} elseif ($novaDataPaiNoivo[1] == '09' || $novaDataPaiNoivo[1] == '9') {
	echo " de Setembro de ";
} elseif ($novaDataPaiNoivo[1] == '10') {
	echo " de Outubro de";
} elseif ($novaDataPaiNoivo[1] == '11') {
	echo " de Novembro de ";
} elseif ($novaDataPaiNoivo[1] == '12') {
	echo " de Dezembro de ";
} else {
	echo "Não definido";
}

echo $novaDataPaiNoivo[0];

?>
, 




<?=$r->strProfissaoPaiNoivo?>; <?php endif ?>ela, natural de <?php $z = PESQUISA_ALL_ID('uf_cidade', $r->NaturalidadeMaeNoivo); foreach ($z as $z):?>
<?=$z->cidade?>
<?php endforeach  ?>, 

nascido aos 

<?php
$data = $r->dataNascimentoMaeNoivo ;
$novaDataMaeNoivo = explode("-", $data);
echo $novaDataMaeNoivo[2]." de ";
/*
if ($novaDataMaeNoivo[2] == '01' || $novaDataMaeNoivo[1] == '1') {
	echo " Um de  ";
}elseif ($novaDataMaeNoivo[2] == '02' || $novaDataMaeNoivo[1] == '2') {
	echo " Dois de ";
} elseif ($novaDataMaeNoivo[2] == '03' || $novaDataMaeNoivo[1] == '3') {
	echo " Três ";
} elseif ($novaDataMaeNoivo[2] == '04' || $novaDataMaeNoivo[1] == '4') {
	echo " Quatro de ";
} elseif ($novaDataMaeNoivo[2] == '05' || $novaDataMaeNoivo[1] == '5') {
	echo " Cinco de ";
} elseif ($novaDataMaeNoivo[2] == '06' || $novaDataMaeNoivo[1] == '6') {
	echo " Seis de ";
} elseif ($novaDataMaeNoivo[2] == '07' || $novaDataMaeNoivo[1] == '7') {
	echo " Sete de ";
} elseif ($novaDataMaeNoivo[2] == '08' || $novaDataMaeNoivo[1] == '8') {
	echo " Oito de ";
} elseif ($novaDataMaeNoivo[2] == '09' || $novaDataMaeNoivo[1] == '9') {
	echo " Nove de ";
} else {echo  ucfirst(GExtenso::numero($novaDataMaeNoivo[2]));}
//Será exibido na tela a data: 16/02/2015
// . "de".$novaDataMaeNoivo[1] . " de " . GExtenso::numero ($novaDataMaeNoivo[0])
*/
if ($novaDataMaeNoivo[1] == '01' || $novaDataMaeNoivo[1] == '1') {
	echo " de Janeiro de ";
}elseif ($novaDataMaeNoivo[1] == '02' || $novaDataMaeNoivo[1] == '2') {
	echo " de Fevereiro de ";
} elseif ($novaDataMaeNoivo[1] == '03' || $novaDataMaeNoivo[1] == '3') {
	echo " de Março de ";
} elseif ($novaDataMaeNoivo[1] == '04' || $novaDataMaeNoivo[1] == '4') {
	echo " de Abril de ";
} elseif ($novaDataMaeNoivo[1] == '05' || $novaDataMaeNoivo[1] == '5') {
	echo " de Maio de ";
} elseif ($novaDataMaeNoivo[1] == '06' || $novaDataMaeNoivo[1] == '6') {
	echo " de Junho de ";
} elseif ($novaDataMaeNoivo[1] == '07' || $novaDataMaeNoivo[1] == '7') {
	echo " de Julho de ";
} elseif ($novaDataMaeNoivo[1] == '08' || $novaDataMaeNoivo[1] == '8') {
	echo " de Agosto de ";
} elseif ($novaDataMaeNoivo[1] == '09' || $novaDataMaeNoivo[1] == '9') {
	echo " de Setembro de ";
} elseif ($novaDataMaeNoivo[1] == '10') {
	echo " de Outubro de";
} elseif ($novaDataMaeNoivo[1] == '11') {
	echo " de Novembro de ";
} elseif ($novaDataMaeNoivo[1] == '12') {
	echo " de Dezembro de ";
} else {
	echo "Não definido";
}

echo $novaDataMaeNoivo[0];

?>
, 




<?=$r->strProfissaoMaeNoivo?>. <br>

 <br>

A PRETENDENTE <?=strtoupper($r->strNomeNoiva)?>, <?=$ecnoiva?>, 

com  

 <?=(date('Y')- $r->dataNascimentoNoiva)  ; ?>
  anos de idade,<?=$r->strNacionalidadeNoiva?>, 
<?=$r->strProfissaoNoiva?>,

<?php 
$x = PESQUISA_ALL_ID('uf_cidade',$r->strNaturalNoiva); foreach ($x as $k) :?>

natural de <?=$k->cidade?>, 

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

residente e domiciliado <?=$r->strEnderecoNoiva?>,

<?php $z = PESQUISA_ALL_ID('uf_cidade', $r->strCidadeNoiva); foreach ($z as $z):?>
<?=$z->cidade?>
<?php endforeach  ?>

filha de 
<?php if ($r->strPaiNoivo!=''&&$r->strPaiNoivo!='NAO_DECLARADO'): ?><?=$r->strPaiNoiva?>
 e de <?php endif ?><?=$r->strMaeNoiva?>. 


<?php if ($r->strPaiNoivo!=''&&$r->strPaiNoivo!='NAO_DECLARADO'): ?>ele natural de <?php $z = PESQUISA_ALL_ID('uf_cidade', $r->NaturalidadePaiNoiva); foreach ($z as $z):?>
<?=$z->cidade?>
<?php endforeach  ?>, 

nascido aos 

<?php
$data = $r->dataNascimentoPaiNoiva ;
$novaDataPaiNoiva = explode("-", $data);
echo $novaDataPaiNoiva[2]." de ";
/*
if ($novaDataPaiNoiva[2] == '01' || $novaDataPaiNoiva[1] == '1') {
	echo " Um de  ";
}elseif ($novaDataPaiNoiva[2] == '02' || $novaDataPaiNoiva[1] == '2') {
	echo " Dois de ";
} elseif ($novaDataPaiNoiva[2] == '03' || $novaDataPaiNoiva[1] == '3') {
	echo " Três ";
} elseif ($novaDataPaiNoiva[2] == '04' || $novaDataPaiNoiva[1] == '4') {
	echo " Quatro de ";
} elseif ($novaDataPaiNoiva[2] == '05' || $novaDataPaiNoiva[1] == '5') {
	echo " Cinco de ";
} elseif ($novaDataPaiNoiva[2] == '06' || $novaDataPaiNoiva[1] == '6') {
	echo " Seis de ";
} elseif ($novaDataPaiNoiva[2] == '07' || $novaDataPaiNoiva[1] == '7') {
	echo " Sete de ";
} elseif ($novaDataPaiNoiva[2] == '08' || $novaDataPaiNoiva[1] == '8') {
	echo " Oito de ";
} elseif ($novaDataPaiNoiva[2] == '09' || $novaDataPaiNoiva[1] == '9') {
	echo " Nove de ";
} else {echo  ucfirst(GExtenso::numero($novaDataPaiNoiva[2]));}
//Será exibido na tela a data: 16/02/2015
// . "de".$novaDataPaiNoiva[1] . " de " . GExtenso::numero ($novaDataPaiNoiva[0])
*/
if ($novaDataPaiNoiva[1] == '01' || $novaDataPaiNoiva[1] == '1') {
	echo " de Janeiro de ";
}elseif ($novaDataPaiNoiva[1] == '02' || $novaDataPaiNoiva[1] == '2') {
	echo " de Fevereiro de ";
} elseif ($novaDataPaiNoiva[1] == '03' || $novaDataPaiNoiva[1] == '3') {
	echo " de Março de ";
} elseif ($novaDataPaiNoiva[1] == '04' || $novaDataPaiNoiva[1] == '4') {
	echo " de Abril de ";
} elseif ($novaDataPaiNoiva[1] == '05' || $novaDataPaiNoiva[1] == '5') {
	echo " de Maio de ";
} elseif ($novaDataPaiNoiva[1] == '06' || $novaDataPaiNoiva[1] == '6') {
	echo " de Junho de ";
} elseif ($novaDataPaiNoiva[1] == '07' || $novaDataPaiNoiva[1] == '7') {
	echo " de Julho de ";
} elseif ($novaDataPaiNoiva[1] == '08' || $novaDataPaiNoiva[1] == '8') {
	echo " de Agosto de ";
} elseif ($novaDataPaiNoiva[1] == '09' || $novaDataPaiNoiva[1] == '9') {
	echo " de Setembro de ";
} elseif ($novaDataPaiNoiva[1] == '10') {
	echo " de Outubro de";
} elseif ($novaDataPaiNoiva[1] == '11') {
	echo " de Novembro de ";
} elseif ($novaDataPaiNoiva[1] == '12') {
	echo " de Dezembro de ";
} else {
	echo "Não definido";
}

echo $novaDataPaiNoiva[0];

?>
, 




<?=$r->strProfissaoPaiNoiva?>; <?php endif ?>ela, natural de <?php $z = PESQUISA_ALL_ID('uf_cidade', $r->NaturalidadeMaeNoiva); foreach ($z as $z):?>
<?=$z->cidade?>
<?php endforeach  ?>, 



<?php
if ($r->dataNascimentoMaeNoiva =='') {
	echo "Já Falecida em ";
$data = $r->dataMorteMaeNoiva;
}
else{
echo "Nascida aos";	
$data = $r->dataNascimentoMaeNoiva ;
}
$novaDataMaeNoiva = explode("-", $data);
echo $novaDataMaeNoiva[2]." de ";
/*
if ($novaDataMaeNoiva[2] == '01' || $novaDataMaeNoiva[1] == '1') {
	echo " Um de  ";
}elseif ($novaDataMaeNoiva[2] == '02' || $novaDataMaeNoiva[1] == '2') {
	echo " Dois de ";
} elseif ($novaDataMaeNoiva[2] == '03' || $novaDataMaeNoiva[1] == '3') {
	echo " Três ";
} elseif ($novaDataMaeNoiva[2] == '04' || $novaDataMaeNoiva[1] == '4') {
	echo " Quatro de ";
} elseif ($novaDataMaeNoiva[2] == '05' || $novaDataMaeNoiva[1] == '5') {
	echo " Cinco de ";
} elseif ($novaDataMaeNoiva[2] == '06' || $novaDataMaeNoiva[1] == '6') {
	echo " Seis de ";
} elseif ($novaDataMaeNoiva[2] == '07' || $novaDataMaeNoiva[1] == '7') {
	echo " Sete de ";
} elseif ($novaDataMaeNoiva[2] == '08' || $novaDataMaeNoiva[1] == '8') {
	echo " Oito de ";
} elseif ($novaDataMaeNoiva[2] == '09' || $novaDataMaeNoiva[1] == '9') {
	echo " Nove de ";
} else {echo  ucfirst(GExtenso::numero($novaDataMaeNoiva[2]));}
//Será exibido na tela a data: 16/02/2015
// . "de".$novaDataMaeNoiva[1] . " de " . GExtenso::numero ($novaDataMaeNoiva[0])
*/
if ($novaDataMaeNoiva[1] == '01' || $novaDataMaeNoiva[1] == '1') {
	echo " de Janeiro de ";
}elseif ($novaDataMaeNoiva[1] == '02' || $novaDataMaeNoiva[1] == '2') {
	echo " de Fevereiro de ";
} elseif ($novaDataMaeNoiva[1] == '03' || $novaDataMaeNoiva[1] == '3') {
	echo " de Março de ";
} elseif ($novaDataMaeNoiva[1] == '04' || $novaDataMaeNoiva[1] == '4') {
	echo " de Abril de ";
} elseif ($novaDataMaeNoiva[1] == '05' || $novaDataMaeNoiva[1] == '5') {
	echo " de Maio de ";
} elseif ($novaDataMaeNoiva[1] == '06' || $novaDataMaeNoiva[1] == '6') {
	echo " de Junho de ";
} elseif ($novaDataMaeNoiva[1] == '07' || $novaDataMaeNoiva[1] == '7') {
	echo " de Julho de ";
} elseif ($novaDataMaeNoiva[1] == '08' || $novaDataMaeNoiva[1] == '8') {
	echo " de Agosto de ";
} elseif ($novaDataMaeNoiva[1] == '09' || $novaDataMaeNoiva[1] == '9') {
	echo " de Setembro de ";
} elseif ($novaDataMaeNoiva[1] == '10') {
	echo " de Outubro de";
} elseif ($novaDataMaeNoiva[1] == '11') {
	echo " de Novembro de ";
} elseif ($novaDataMaeNoiva[1] == '12') {
	echo " de Dezembro de ";
} else {
	echo "Não definido";
}

echo $novaDataMaeNoiva[0];

?>
, 




<?=$r->strProfissaoMaeNoiva?>. <br>

 <br> 


 Decorreu o prazo da lei, que terminou em 

 <?php
$data = $r->dataHabilitacao ;
$novaDataHabilitacao = explode("-", $data);
#echo $novaDataHabilitacao[2]." de ";

if ($novaDataHabilitacao[2] == '01' || $novaDataHabilitacao[1] == '1') {
	echo " Um de  ";
}elseif ($novaDataHabilitacao[2] == '02' || $novaDataHabilitacao[1] == '2') {
	echo " Dois de ";
} elseif ($novaDataHabilitacao[2] == '03' || $novaDataHabilitacao[1] == '3') {
	echo " Três ";
} elseif ($novaDataHabilitacao[2] == '04' || $novaDataHabilitacao[1] == '4') {
	echo " Quatro de ";
} elseif ($novaDataHabilitacao[2] == '05' || $novaDataHabilitacao[1] == '5') {
	echo " Cinco de ";
} elseif ($novaDataHabilitacao[2] == '06' || $novaDataHabilitacao[1] == '6') {
	echo " Seis de ";
} elseif ($novaDataHabilitacao[2] == '07' || $novaDataHabilitacao[1] == '7') {
	echo " Sete de ";
} elseif ($novaDataHabilitacao[2] == '08' || $novaDataHabilitacao[1] == '8') {
	echo " Oito de ";
} elseif ($novaDataHabilitacao[2] == '09' || $novaDataHabilitacao[1] == '9') {
	echo " Nove de ";
} else {echo  ucfirst(GExtenso::numero($novaDataHabilitacao[2]));}
//Será exibido na tela a data: 16/02/2015
// . "de".$novaDataHabilitacao[1] . " de " . GExtenso::numero ($novaDataHabilitacao[0])

if ($novaDataHabilitacao[1] == '01' || $novaDataHabilitacao[1] == '1') {
	echo " de Janeiro de ";
}elseif ($novaDataHabilitacao[1] == '02' || $novaDataHabilitacao[1] == '2') {
	echo " de Fevereiro de ";
} elseif ($novaDataHabilitacao[1] == '03' || $novaDataHabilitacao[1] == '3') {
	echo " de Março de ";
} elseif ($novaDataHabilitacao[1] == '04' || $novaDataHabilitacao[1] == '4') {
	echo " de Abril de ";
} elseif ($novaDataHabilitacao[1] == '05' || $novaDataHabilitacao[1] == '5') {
	echo " de Maio de ";
} elseif ($novaDataHabilitacao[1] == '06' || $novaDataHabilitacao[1] == '6') {
	echo " de Junho de ";
} elseif ($novaDataHabilitacao[1] == '07' || $novaDataHabilitacao[1] == '7') {
	echo " de Julho de ";
} elseif ($novaDataHabilitacao[1] == '08' || $novaDataHabilitacao[1] == '8') {
	echo " de Agosto de ";
} elseif ($novaDataHabilitacao[1] == '09' || $novaDataHabilitacao[1] == '9') {
	echo " de Setembro de ";
} elseif ($novaDataHabilitacao[1] == '10') {
	echo " de Outubro de";
} elseif ($novaDataHabilitacao[1] == '11') {
	echo " de Novembro de ";
} elseif ($novaDataHabilitacao[1] == '12') {
	echo " de Dezembro de ";
} else {
	echo "Não definido";
}

echo $novaDataHabilitacao[0];

?>, sem que aparecesse pessoa alguma se opondo ao casamento, nem me consta que haja impedimento que por este oficio cabe opor, e, por isso, certifica-se que os ditos pretendentes acham-se habilitados a se casar dentro do prazo de 90 (noventa) dias, a constar desta presente data. 

<p style="text-align: center">O referido é verdade e dou fé</p>
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
	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center"><?=$_SESSION['nome']?></p> 
		<p style="text-align: center">ESCREVENTE AUTORIZADO(A)</p> 
<?php endforeach;endforeach ?>

	
</p>

</body>
<?php endforeach  ?>
</html>
