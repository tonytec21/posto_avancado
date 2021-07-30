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
<?php $r = PESQUISA_ALL_ID('registro_obito_novo',$id);
foreach ($r as $r ) :
#aqui vai preencher os inputs, vou preencher só um pra vc ver:
if ($r->ESTADOCIVIL == 'SO' ) {
	$ec = "SOLTEIRO";
}
else if ($r->ESTADOCIVIL == 'CA') {
	$ec = "CASADO";
}
else if ($r->ESTADOCIVIL == 'VI' ) {
	$ec = "VIÚVO";
}
else if($r->ESTADOCIVIL == 'UN' ){
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
<hr style="border:1px solid black;margin-top: -5px">
<p style="text-align: left;margin-left: 20px;">
Ilmo(a). Sr(a).<br>
Oficial do Registro Civil 	<br>	
<?=$enderecocart?>	<br>
</p>

<p style="text-align: justify;font-size: 16px; padding: 20px;color:#4e4f51">

Cumprindo o disposto nos Artigos 106 da Lei No
6.015 de 31 de Dezembro de 1973, comunico-vos que no Livro
<?=$r->LIVROOBITO?> às folhas <?=$r->FOLHAOBITO?> sob numero de ordem <?=$r->TERMOOBITO?>, 
em data de 

<?php
$data = $r->DATAENTRADA ;
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
óbito de <?=strtoupper($r->NOME)?>, registrado(a) No Livro <?=$_GET['livroa']?>, Folha <?=$_GET['folhaa']?>, Termo <?=$_GET['termoa']?>, <?=$ec?>, 

<?php if ($r->ESTADOCIVIL == 'CA' || $r->ESTADOCIVIL == 'VI'): ?>
	sendo, o(a) conjuge <?=mb_strtoupper($r->NOMECONJUGE)?>, casamento celebrado no cartório <?=mb_strtoupper($r->CARTORIOCASAMENTO)?>,
<?php endif ?>
Declaração de óbito nº <?=$r->NDO?>, CPF de número <?=$r->CPF?>, 

 filho(a) de
<?php if ($r->NOMEPAI !='' && $r->NOMEPAI!=='NAO_DECLARADO'): ?>
<?=strtoupper($r->NOMEPAI)?> e 
<?php endif ?>
<?=strtoupper($r->NOMEMAE)?>.

DO nº <?=$r->NDO?>,
firmado pelo  Dr. <?=$r->MEDICO?>, CRM nº <?=$r->CRM?>, que consta como causa da morte <b><?=mb_strtoupper($r->CAUSAOBITO)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOB)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOC)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOD)?></b>, sendo a morte

	 <?php if ($r->TIPOMORTE == 'NAT'): ?>
	 	por motivo natural,
	 	<?php else: ?>
	 		por motivo violento,
	 <?php endif ?>
em, 
	

 <?php //echo date('d/m/Y', strtotime($r->dataObito));

	$data = $r->DATAOBITO ;
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
		echo " de Outubro de ";
	} elseif ($novaData[1] == '11') {
		echo " de Novembro de ";
	} elseif ($novaData[1] == '12') {
		echo " de Dezembro de ";
	} else {
		echo "Não definido";
	}

	
  $udg = substr($novaData[0], 2,3);
  if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
   echo GExtenso::numero($novaData[0]).'  um';
  }
  else{
    echo GExtenso::numero($novaData[0]);
  }

	?> (<?=date('d/m/Y', strtotime($r->DATAOBITO))?>), às <?=$r->HORAOBITO?> Horas, neste Subdistrito, no <?=$r->LOCALMORTE?>, situado em <?=$r->ENDERECOOBITO?>, <?php $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEOBITO));foreach($c as $c): ?><?=$c->cidade ?> (<?=$c->uf?>)<?php endforeach ?>.

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
