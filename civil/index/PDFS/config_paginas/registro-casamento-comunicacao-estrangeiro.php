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
body{font-size: 14px;font-family: "Arial";}
</style>
</head>
<?php $r = PESQUISA_ALL_ID('registro_casamento',$id);
foreach ($r as $r ) :
#aqui vai preencher os inputs, vou preencher só um pra vc ver:
if ($r->setEstadoCivilNoivo == 'SO' || $r->setEstadoCivilNoiva == 'SO') {
	$ec = "SOLTEIRO";
}
else if ($r->setEstadoCivilNoivo == 'CA'|| $r->setEstadoCivilNoiva == 'CA') {
	$ec = "CASADO";
}
else if ($r->setEstadoCivilNoivo == 'VI' || $r->setEstadoCivilNoiva == 'VI') {
	$ec = "VIÚVO";
}
else if($r->setEstadoCivilNoivo == 'UN' || $r->setEstadoCivilNoiva == 'UN'){
$ec = 'EM UNIÃO ESTÁVEL';
}
else {
	$ec = "DIVORCIADO";
}		
	?>
<body>
	

<p style="text-align: left;">
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

?>. <br>
Assunto: Comunicação de lavratura de casamento de estrangeiro e remessa de
Certidão do ato.	<br><br>
Ilustríssimo Senhor Delegado de Polícia Federal,
</p>

<p style="text-align: justify;">
	
Após cumprimentá-lo, tenho a elevada honra de me dirigir a Vossa Senhoria, em
cumprimento ao artigo 46 da Lei no 6.815 de 19/08/1980 e artigo 87, VIII, § 2o
do Prov. CGJ/CE no 06/2010, que no dia 


<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = $r->dataRegistro ;
$nova_data = explode("-", $data);

if ($nova_data[2] == '01' || $nova_data[1] == '1') {
	echo " Um de  ";
}elseif ($nova_data[2] == '02' || $nova_data[1] == '2') {
	echo " Dois de ";
} elseif ($nova_data[2] == '03' || $nova_data[1] == '3') {
	echo " Três ";
} elseif ($nova_data[2] == '04' || $nova_data[1] == '4') {
	echo " Quatro de ";
} elseif ($nova_data[2] == '05' || $nova_data[1] == '5') {
	echo " Cinco de ";
} elseif ($nova_data[2] == '06' || $nova_data[1] == '6') {
	echo " Seis de ";
} elseif ($nova_data[2] == '07' || $nova_data[1] == '7') {
	echo " Sete de ";
} elseif ($nova_data[2] == '08' || $nova_data[1] == '8') {
	echo " Oito de ";
} elseif ($nova_data[2] == '09' || $nova_data[1] == '9') {
	echo " Nove de ";
} else {echo  ucfirst(GExtenso::numero($nova_data[2]));}
//Será exibido na tela a data: 16/02/2015
// . "de".$nova_data[1] . " de " . GExtenso::numero ($nova_data[0])
if ($nova_data[1] == '01' || $nova_data[1] == '1') {
	echo "  Janeiro de ";
}elseif ($nova_data[1] == '02' || $nova_data[1] == '2') {
	echo "  Fevereiro de ";
} elseif ($nova_data[1] == '03' || $nova_data[1] == '3') {
	echo "  Março de ";
} elseif ($nova_data[1] == '04' || $nova_data[1] == '4') {
	echo "  Abril de ";
} elseif ($nova_data[1] == '05' || $nova_data[1] == '5') {
	echo "  Maio de ";
} elseif ($nova_data[1] == '06' || $nova_data[1] == '6') {
	echo "  Junho de ";
} elseif ($nova_data[1] == '07' || $nova_data[1] == '7') {
	echo "  Julho de ";
} elseif ($nova_data[1] == '08' || $nova_data[1] == '8') {
	echo "  Agosto de ";
} elseif ($nova_data[1] == '09' || $nova_data[1] == '9') {
	echo "  Setembro de ";
} elseif ($nova_data[1] == '10') {
	echo "  Outubro de";
} elseif ($nova_data[1] == '11') {
	echo "  Novembro de ";
} elseif ($nova_data[1] == '12') {
	echo "  Dezembro de ";
} else {
	echo "Não definido";
}

echo GExtenso::numero($nova_data[0]);

?>
  celebrei o casamento de <?=strtoupper($r->strNomeNoiva)?>, <?=$r->strNacionalidadeNoiva?>,
natural de 
<?php $g=PESQUISA_ALL_ID('uf_cidade',$r->strNaturalNoiva); foreach ($g as $g):?><?=$g->cidade.'/'.$g->uf?><?php endforeach ?>, 

nascida no dia 

<?php
$data = $r->dataNascimentoNoiva ;
$novaDataNoiva = explode("-", $data);
echo $novaDataNoiva[2];
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

, <?=$r->strProfissaoNoiva?>, filha de
<?php if ($r->strPaiNoiva!=''&&$r->strPaiNoiva!='NAO_DECLARADO'): ?>
<?=strtoupper($r->strPaiNoiva)?> e 	
<?php endif ?>
<?=strtoupper($r->strMaeNoiva)?>.
Importa salientar que a mesma contraiu núpcias com 
<?=strtoupper($r->strNomeNoivo)?> cidadão brasileiro e que em virtude do seu novo estado civil
passou a chamar-se <?=strtoupper($r->strNomePosCasadoNoiva)?>;
Visando a melhor instrução remeto a certidão de casamento atualizada do ato em
referência.
Nada mais havendo para o momento, pondo-me ao vosso inteiro dispor para
eventuais esclarecimentos, despeço-me mui atenciosamente.

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
<?php endforeach ?>
<?php endforeach ?>
<br><br>
Ao Ilustríssimo Senhor Delegado de Polícia Federal

</p>

<h4 style="text-align: center;">
ATENCIOSAMENTE
</h4>
<br>


	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center"><?=$_SESSION['nome']?></p> 
<p style="text-align: center;"><b><?=$_SESSION['nome']?></b><br>Oficial do Registro Civil</p>



</body>
<?php endforeach  ?>
</html>
