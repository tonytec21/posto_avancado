<!DOCTYPE html>
<?php include('../../../controller/db_functions.php');

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
body{ font-size: 11px;font-family: "Arial";}
</style>
</head>
<?php $r = PESQUISA_ALL_ID('registro_casamento',$id);
foreach ($r as $r ) :

if ($r->dataHabilitacao =='1111-11-11') {
	header('Location: ' . $_SERVER['HTTP_REFERER']);
	$_SESSION['erro'] = 'NÃO SERÁ POSSÍVEL EMITIR, DADOS DA HABILITAÇÃO NÃO INFORMADOS!';
}

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
	$ec="EM UNÎÃO ESTÁVEL";
}

 if($r->setEstadoCivilNoiva == 'UN'  ){
	$ecnoiva="EM UNIÃO ESTÁVEL";
}

#_______________________________________

if ($r->setEstadoCivilTestemunha1 == 'SO'  ) {
	$ect1 = "SOLTEIRO";
}
 if($r->setEstadoCivilTestemunha1 == 'CA'   ){
	$ect1="CASADO";
}
 if($r->setEstadoCivilTestemunha1 == 'DI'  ){
	$ect1="DIVORCIADO";
}
 if($r->setEstadoCivilTestemunha1 == 'VI'  ){
	$ect1="VIUVO";
}
 if($r->setEstadoCivilTestemunha1 == 'UN' ){
	$ect1="EM UNÎÃO ESTÁVEL";
}

if ($r->setEstadoCivilTestemunha2 == 'SO'  ) {
	$ect2 = "SOLTEIRO";
}
 if($r->setEstadoCivilTestemunha2 == 'CA'   ){
	$ect2="CASADO";
}
 if($r->setEstadoCivilTestemunha2 == 'DI'  ){
	$ect2="DIVORCIADO";
}
 if($r->setEstadoCivilTestemunha2 == 'VI'  ){
	$ect2="VIUVO";
}
 if($r->setEstadoCivilTestemunha2 == 'UN' ){
	$ect2="EM UNÎÃO ESTÁVEL";
}
	?>
<body>
<div style="width: 100%;" >
<h3 style="text-align: left;display: inline;margin-left: 1cm">LIVRO: B <?=intval($r->Livro)?></h3>
<h3 style="text-align: center; display: inline;margin-left: 5cm;">ORDEM: <?=intval($r->Ordem)?></h3>
<h3 style="text-align: right; display: inline;margin-left: 4.5cm;">FOLHA: <?=intval($r->Folha)?></h3>	
</div>
<br>	

<h2 style="text-align: center;margin-top: -3px">REGISTRO DE CONVERSÃO DE UNIÃO ESTÁVEL EM CASAMENTO</h2>


<p style="text-align: justify;">

Aos dias


<?php
$data = $r->dataRegistro ;
$novaDataRegistro = explode("-", $data);
if ($novaDataRegistro[2] == 1 || $novaDataRegistro[2] == 01 ) {
	echo "Um";
}
else{
echo GExtenso::numero($novaDataRegistro[2]);
}
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

echo GExtenso::numero($novaDataRegistro[0]);

?> nesta Serventia, Neste Subdistrito Civil __________ Comarca do Município de

<?php $f = PESQUISA_ALL('cadastroserventia'); foreach($f as $f): $e = PESQUISA_ALL_ID('uf_cidade',$f->intUFcidade); foreach($e as $e): ?>
<?=$e->cidade?> do Estado
<?php if ($e->uf =='MA') {
$estado = 'do Maranhão';
}
else{
	$estado ='de '.$e->uf;
}

 ?>

<?=$estado?>,


<?php endforeach; endforeach ?>
nas dependências deste Oficial do Registro Civil das Pessoas Naturais,
depois cumpridas as formalidades legais da prévia habilitação dos autos n° _____/_____
procede o registro de conversão de união estavél em casamento requerido por
<?=strtoupper($r->strNomeNoivo)?> e <?=strtoupper($r->strNomeNoiva)?>.
ELE,  <?=$r->strNacionalidadeNoivo?>, <?=$r->strProfissaoNoivo?>, <?php
#aqui vai preencher os inputs, vou preencher só um pra vc ver:
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
	$ec="EM UNÎÃO ESTÁVEL";
}

 if($r->setEstadoCivilNoiva == 'UN'  ){
	$ecnoiva="EM UNIÃO ESTÁVEL";
}

	?><?=$ec?> , com
	<?php echo date('Y') - date('Y', strtotime($r->dataNascimentoNoivo)); ?>

anos, <?php
$x = PESQUISA_ALL_ID('uf_cidade',$r->strNaturalNoivo); foreach ($x as $k) :?>

natural de <?=$k->cidade?>



<?php endforeach ?>

, nascido no dia
<?php
$data = $r->dataNascimentoNoivo ;
$novaDataNoivo = explode("-", $data);
echo $novaDataNoivo[2]." ";
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

echo  ucfirst(GExtenso::numero($novaDataNoivo[0]));

?>

residente em <?=$r->strEnderecoNoivo?>,

<?php $z = PESQUISA_ALL_ID('uf_cidade', $r->strCidadeNoivo); foreach ($z as $z):?>
<?=$z->cidade?>
<?php endforeach  ?>

filho de
<?php if ($r->strPaiNoivo!='' && $r->strPaiNoivo!='NAO_DECLARADO'): ?>
	

<?=$r->strPaiNoivo?>, <?=$r->NacionalidadePaiNoivo?>,
<?php if (empty($r->dataMortePaiNoivo)) { echo 'nascido(a) em '.date('d/m/Y', strtotime($r->dataNascimentoPaiNoivo))  ; }?>
<?php if (empty($r->dataNascimentoPaiNoivo)) echo 'falecido(a) em'.date('d/m/Y', strtotime($r->dataMortePaiNoivo)); ?>
, residente em <?=$r->EnderecoPaiNoivo?>,

<?php $z = PESQUISA_ALL_ID('uf_cidade', $r->CidadePaiNoivo); foreach ($z as $z):?>
<?=$z->cidade?>
<?php endforeach  ?>
 e de<?php endif ?> <?=$r->strMaeNoivo?>, <?=$r->NacionalidadeMaeNoivo?>,
 <?php if (empty($r->dataMorteMaeNoivo)) { echo 'nascido(a) em '.date('d/m/Y', strtotime($r->dataNascimentoMaeNoivo))  ; }?>
 <?php if (empty($r->dataNascimentoMaeNoivo)) echo 'falecido(a) em'.date('d/m/Y', strtotime($r->dataMorteMaeNoivo)); ?>
 , residente em <?=$r->EnderecoMaeNoivo?>,

 <?php $z = PESQUISA_ALL_ID('uf_cidade', $r->CidadeMaeNoivo); foreach ($z as $z):?>
 <?=$z->cidade?>
 <?php endforeach  ?>.
<br>
ELA, <?=$r->strNacionalidadeNoiva?>, <?=$r->strProfissaoNoiva?>,

<?=$ecnoiva?> , com
<?php echo date('Y') - date('Y', strtotime($r->dataNascimentoNoiva)); ?>

anos, <?php
$x = PESQUISA_ALL_ID('uf_cidade',$r->strNaturalNoiva); foreach ($x as $k) :?>

natural de <?=$k->cidade?>



<?php endforeach ?>

, nascido no dia
<?php
$data = $r->dataNascimentoNoiva ;
$novaDataNoiva = explode("-", $data);
echo $novaDataNoiva[2]." ";
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

echo  ucfirst(GExtenso::numero($novaDataNoiva[0]));

?>

residente em <?=$r->strEnderecoNoiva?>,

<?php $z = PESQUISA_ALL_ID('uf_cidade', $r->strCidadeNoiva); foreach ($z as $z):?>
<?=$z->cidade?>
<?php endforeach  ?>


filha de 
<?php if ($r->strPaiNoiva!='' && $r->strPaiNoiva!='NAO_DECLARADO'): ?>
<?=$r->strPaiNoiva?>, <?=$r->NacionalidadePaiNoiva?>,
<?php if (empty($r->dataMortePaiNoiva)) { echo 'nascido(a) em '.date('d/m/Y', strtotime($r->dataNascimentoPaiNoiva))  ; }?>
<?php if (empty($r->dataNascimentoPaiNoiva)) echo 'falecido(a) em'.date('d/m/Y', strtotime($r->dataMortePaiNoiva)); ?>
, residente em <?=$r->EnderecoPaiNoiva?>,

<?php $z = PESQUISA_ALL_ID('uf_cidade', $r->CidadePaiNoiva); foreach ($z as $z):?>
<?=$z->cidade?>
<?php endforeach  ?>
 e de <?php endif ?> <?=$r->strMaeNoiva?>, <?=$r->NacionalidadeMaeNoiva?>,
 <?php if (empty($r->dataMorteMaeNoiva)) { echo 'nascido(a) em '.date('d/m/Y', strtotime($r->dataNascimentoMaeNoiva))  ; }?>
 <?php if (empty($r->dataNascimentoMaeNoiva)) echo 'falecido(a) em'.date('d/m/Y', strtotime($r->dataMorteMaeNoiva)); ?>
 , residente em <?=$r->EnderecoMaeNoiva?>,

 <?php $z = PESQUISA_ALL_ID('uf_cidade', $r->CidadeMaeNoiva); foreach ($z as $z):?>
 <?=$z->cidade?>
 <?php endforeach  ?>.



 <br>


<?php
if ($r->setRegime =='CP') {
$regime = 'Comunhão Parcial de Bens';
}
if ($r->setRegime =='CU') {
$regime = 'Comunhão Universal de Bens';
}
if ($r->setRegime =='PF') {
$regime = 'Participação Final nos Aquestos';
}
if ($r->setRegime =='SB') {
$regime = 'Separação de Bens';
}
if ($r->setRegime =='SC') {
$regime = 'Separação Convencional';
}
if ($r->setRegime =='CB') {
$regime = 'Comunhão de Bens';
}

?>

O regime adotado é o de <?=$regime?>. <br>


Em virtude do casamento o contratante passou a assinar <?=$r->strNomePosCasadoNoivo?>
<?php if ($r->strNomePosCasadoNoivo == $r->strNomeNoivo): ?>
(o mesmo nome)
<?php endif ?>
, e a contraente continua a assinar <?=$r->strNomePosCasadoNoiva?>  <?php if ($r->strNomePosCasadoNoiva == $r->strNomeNoiva): ?>
(o mesmo nome).
<?php endif ?>
<br>
Foram apresentados os documentos a que se refere o artigo 1.525,nºs I,III,IV,
do Código Cívil Brasileiro.
<br>
Eu <?=$_SESSION['nome']?>, Escrevente Autorizado, digitei, subscrevo e assino. <br>

<?php if ($r->strNomeNoivo !=''): ?>
	
<?php if ($r->strRogoNoivo!=''): ?>
<p style="">	
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Noivo)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->strRogoNoivo?></p>
</p>	
<?php else: ?>	
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=$r->strNomeNoivo?></p>
<?php endif ?>
<?php endif ?>

<?php if ($r->strRogoNoiva!=''): ?>
<p style="">	
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Noiva)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->strRogoNoiva?></p>
</p>
<?php else: ?>
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=$r->strNomeNoiva?></p>	
<?php endif ?>
<?php if ($r->strTestemunha1!=''): ?>
	
<?php if ($r->strRogoTestemunha1!=''): ?>
<p style="">	
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Testemunha)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->strRogoTestemunha1?></p>
</p>	
<?php else: ?>	
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=$r->strTestemunha1?></p>
<?php endif ?>
<?php endif ?>

<?php if ($r->strTestemunha2!=''): ?>
	
<?php if ($r->strRogoTestemunha2!=''): ?>
<p style="">	
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Testemunha)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->strRogoTestemunha2?></p>
</p>	
<?php else: ?>
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=$r->strTestemunha2?></p>
<?php endif ?>
<?php endif ?>
<br>
<div style="max-width: 100%;padding-left: 10%">	
<div style="display: inline-block;max-width: 50%">	
	<p style="">_____________________________________</p> 
	<p style=""><?=$_SESSION['nome']?></p> 
		<p style="">ESCREVENTE AUTORIZADO(A)</p> 
</div>

<div style="display: inline-block;max-width: 50%; margin-left: 20%">
<p><b>Assinaturas Adicionais:</b></p><br>
_________________________________________ <br><br>
_________________________________________ <br><br>
_________________________________________ <br><br>
_________________________________________ 
</div>
</div>
</body>
<?php endforeach  ?>
</html>
