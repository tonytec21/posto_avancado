<!DOCTYPE html>
<?php include('../../controller/db_functions.php');

#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
$enderecocart = $_GET['enderecocart'];
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
body{ font-size: 14px;font-family: "Arial";}
</style>
</head>
<?php $r = PESQUISA_ALL_ID('registro_casamento_novo',$id);
foreach ($r as $r ) :
#aqui vai preencher os inputs, vou preencher só um pra vc ver:
if ($r->ESTADOCIVILNUBENTE1 == 'SO' || $r->ESTADOCIVILNUBENTE2 == 'SO') {
	$ec = "SOLTEIRO";
}
else if ($r->ESTADOCIVILNUBENTE1 == 'CA'|| $r->ESTADOCIVILNUBENTE2 == 'CA') {
	$ec = "CASADO";
}
else if ($r->ESTADOCIVILNUBENTE1 == 'VI' || $r->ESTADOCIVILNUBENTE2 == 'VI') {
	$ec = "VIÚVO";
}
else if($r->ESTADOCIVILNUBENTE1 == 'UN' || $r->ESTADOCIVILNUBENTE2 == 'UN'){
$ec = 'EM UNIÃO ESTÁVEL';
}
else {
	$ec = "DIVORCIADO";
}		
	?>
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
				     
<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
<hr style="border:1px solid black">
<p style="text-align: left;margin-left: 20px;">
Ilmo(a). Sr(a).<br>
Oficial do Registro Civil 	<br>	
<?=$enderecocart?>	<br>
</p>

<p style="text-align: justify;font-size: 16px; padding: 20px;color:#4e4f51">

Cumprindo o disposto nos Artigos 106 da Lei No
6.015 de 31 de Dezembro de 1973, comunico-vos que no Livro

<?php if ($r->TIPOLIVRO == '2'): ?>
	B 
<?php else: ?>
	B AUXILIAR 
<?php endif ?>
<?=$r->LIVROCASAMENTO?> às folhas <?=$r->FOLHACASAMENTO?> sob numero de ordem <?=$r->TERMOCASAMENTO?>, 
em data de 

<?php
$data = $r->DATACASAMENTO ;
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
	echo "Janeiro de  ";
}elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
	echo "Fevereiro de  ";
} elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
	echo "Março de  ";
} elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
	echo "Abril de  ";
} elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
	echo "Maio de  ";
} elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
	echo "Junho de  ";
} elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
	echo "Julho de  ";
} elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
	echo "Agosto de  ";
} elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
	echo "Setembro de  ";
} elseif ($novaDataRegistro[1] == '10') {
	echo "Outubro de ";
} elseif ($novaDataRegistro[1] == '11') {
	echo "Novembro de ";
} elseif ($novaDataRegistro[1] == '12') {
	echo "Dezembro de  ";
} else {
	echo "Não definido";
}

echo $novaDataRegistro[0];

?>





foi registrado o assento referente ao
casamento de <?=strtoupper($r->NOMENUBENTE1)?>, registrado(a) No Livro <?=$_GET['livroa']?>, Folha <?=$_GET['folhaa']?>, Termo <?=$_GET['termoa']?> e <?=strtoupper($r->NOMENUBENTE2)?>,

<?php if ($r->NOMENUBENTE1!=$r->NOMECASADONUBENTE1): ?>
	passando o(a) mesmo(<a href=""></a>) após o casamento a chamar-se <?=strtoupper($r->NOMECASADONUBENTE1)?>, 
	<?php else: ?>
	o mesmo(a) permanecerá a usar o mesmo nome,		
<?php endif ?> filho de
<?php if ($r->NOMEPAINUBENTE1 !='' && $r->NOMEPAINUBENTE1!=='NAO_DECLARADO'): ?>
<?=strtoupper($r->NOMEPAINUBENTE1)?> e 
<?php endif ?>
<?=strtoupper($r->NOMEMAENUBENTE1)?>.

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
							$regime = 'Separação Obrigatória de bens'.', '.$COMPLEMENTOREGIME;
							}

							else{
							$regime = 'Comunhão de Bens';
							}



							?>
							O regime do casamento será o da <?=$regime?>.








<p style="text-align: center">
<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
foreach ($u as $u):?>	

<?=$u->cidade?>,

<?php endforeach ?>
<?php endforeach ?>
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


<br>
<h4 style="text-align: center;">
ATENCIOSAMENTE
</h4>
<br>

	<p style="text-align: center">_____________________________________</p>  
<p style="text-align: center;"><b><?=$nome_assinatura?></b><br><?=$funcao_assinatura?></p>



</body>
<?php endforeach  ?>
</html>
