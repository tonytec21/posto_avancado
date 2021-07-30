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
body{text-transform: uppercase;}
</style>
</head>
<?php $r = PESQUISA_ALL_ID('registro_casamento',$id);
foreach ($r as $r ) :
if ($r->setEstadoCivilNoivo == 'CA' || $r->setEstadoCivilNoivo == 'UN') {
	$_SESSION['erro'] = 'NÃO SERÁ POSSÍVEL EMITIR, INDIVÍDUO É CASADO(A) OU EM UNIÃO ESTÁVEL!';
echo '<span style="color:white; background:red"> NÃO SERÁ POSSÍVEL EMITIR, INDIVÍDUO É CASADO(A) OU EM UNIÃO ESTÁVEL!</span>';
break;
	}	
#aqui vai preencher os inputs, vou preencher só um pra vc ver:
if ($r->setEstadoCivilNoivo == 'SO' || $r->setEstadoCivilTestemunha1 == 'SO' || $r->setEstadoCivilTestemunha2 =='SO') {
	$ec = "SOLTEIRO";
}
else if($r->setEstadoCivilNoiva == 'SO' || $r->setEstadoCivilTestemunha1 == 'SO' || $r->setEstadoCivilTestemunha2 =='SO' ){
	$ecnoiva="SOLTEIRA";
}

else if($r->setEstadoCivilNoivo == 'CA' || $r->setEstadoCivilTestemunha1 == 'CA' || $r->setEstadoCivilTestemunha2 =='CA' ){
	$ec="CASADO";
}

else if($r->setEstadoCivilNoiva == 'CA' || $r->setEstadoCivilTestemunha1 == 'CA' || $r->setEstadoCivilTestemunha2 =='CA' ){
	$ecnoiva="CASADA";
}

else if($r->setEstadoCivilNoivo == 'DI' || $r->setEstadoCivilTestemunha1 == 'DI' || $r->setEstadoCivilTestemunha2 =='DI' ){
	$ec="DIVORCIADO";
}

else if($r->setEstadoCivilNoiva == 'DI' || $r->setEstadoCivilTestemunha1 == 'DI' || $r->setEstadoCivilTestemunha2 =='DI' ){
	$ecnoiva="DIVORCIADA";
}
else if($r->setEstadoCivilNoivo == 'VI' || $r->setEstadoCivilTestemunha1 == 'VI' || $r->setEstadoCivilTestemunha2 =='VI' ){
	$ec="VIUVO";
}

else if($r->setEstadoCivilNoiva == 'VI' || $r->setEstadoCivilTestemunha1 == 'VI' || $r->setEstadoCivilTestemunha2 =='VI' ){
	$ecnoiva="VIUVA";
}

else{
	$ec = 'EM UNIÃO ESTÁVEL';
	$ecnoiva = 'EM UNIÃO ESTÁVEL';
}
	?>
<body>
	

<br><br>

<img style="max-width: 100%" src="../bd_INSERTS/cabecalhos/CAPA.jpg">

<h2 style="text-align: center;text-decoration: underline;">CERTIDÃO NEGATIVA</h2>	
<p style="text-align: justify;font-size: 16px; padding: 20px;color:#4e4f51">
<span style="margin-left: 2cm">	
Eu, <?=strtoupper($_SESSION['nome'])?>,

<?php 
$s = PESQUISA_ALL('cadastroserventia'); foreach ($s as $s):?>

<!--?=$s->strTituloServentia?--> Oficial do Registro Civil deste Registro
Civil das Pessoas Naturais desta cidade de 
<?php  
$g = PESQUISA_ALL_ID('uf_cidade', $s->intUFcidade);
foreach ($g as $g):?>
<?=$g->cidade.'/'.$g->uf?>
<?php endforeach ?>,

<?php endforeach ?>
 por nomeação legal na forma da lei, 8.935/94
CERTIFICO, autorizado por lei e a requerimento verbal de pessoa
interessada e para que produza seus devidos e legais efeitos, que dando buscas
nos livros de registro de casamento a cargo desta serventia, verifiquei não
figurar registro em nome de <?=strtoupper($r->strNomeNoivo)?>, <?=strtoupper($r->strCPFnoivo)?>.<br>
O referido é verdade dou fé. <br> 
<p style="text-align: center">
<?php  
$g = PESQUISA_ALL_ID('uf_cidade', $s->intUFcidade);
foreach ($g as $g):?>
<?=$g->cidade?>
<?php endforeach ?>,

<?php  
$data = date('Y-m-d') ;
$novaDataRegistro = explode("-", $data);
echo $novaDataRegistro[2]." de ";
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
	echo " de Janeiro de  ";
}elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
	echo " de Fevereiro de  ";
} elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
	echo " de Março de  ";
} elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
	echo " de Abril de  ";
} elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
	echo " de Maio de  ";
} elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
	echo " de Junho de  ";
} elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
	echo " de Julho de  ";
} elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
	echo " de Agosto de  ";
} elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
	echo " de Setembro de  ";
} elseif ($novaDataRegistro[1] == '10') {
	echo " de Outubro de ";
} elseif ($novaDataRegistro[1] == '11') {
	echo " de Novembro de ";
} elseif ($novaDataRegistro[1] == '12') {
	echo " de Dezembro de  ";
} else {
	echo "Não definido";
}

echo $novaDataRegistro[0];

?>
</p>
<br>
<p style="text-align: center;">_______________________________________________ <br>
<?php $h = PESQUISA_ALL('cadastroserventia');foreach ($h as $h):?><?=$_SESSION['nome']?><?php endforeach ?>
</p>



</body>
<?php endforeach  ?>
</html>
