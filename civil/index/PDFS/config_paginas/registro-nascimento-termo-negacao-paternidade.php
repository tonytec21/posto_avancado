
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
body{font-size: 14px;padding: 0 1cm 0 1cm;}
</style>
</head>

<body>
	<?php $r = PESQUISA_ALL_ID('registro_nascimento_novo',$id);
	foreach ($r as $r ) :
			if ($r->NOMEPAI =='NULL' && $r->NOMEPAI=='') {
$_SESSION['erro'] = 'NÃO SERÁ POSSÍVEL EMITIR, DODOS DO PAI PRESENTES NO REGISTRO!';
echo '<span style="color:white; background:red"> NÃO SERÁ POSSÍVEL EMITIR, DODOS DO PAI PRESENTES NO REGISTRO!!</span>';
break;
}
		?>
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

<br>





<h1 style="text-align: center"> TERMO DE NEGATIVA DE ALEGAÇÃO DE PATERNIDADE</h1>	


<p style="text-align: justify;">Aos 	<?php 

	$data = date('Y-m-d') ;
	$novaData = explode("-", $data);
	if ($novaData[2] == '01' || $novaData[2] == '1') {
		echo " Um dias  ";
	}elseif ($novaData[2] == '02' || $novaData[2] == '2') {
		echo " Dois dias ";
	} elseif ($novaData[2] == '03' || $novaData[2] == '3') {
		echo " Três dias";
	} elseif ($novaData[2] == '04' || $novaData[2] == '4') {
		echo " Quatro dias ";
	} elseif ($novaData[2] == '05' || $novaData[2] == '5') {
		echo " Cinco dias ";
	} elseif ($novaData[2] == '06' || $novaData[2] == '6') {
		echo " Seis dias ";
	} elseif ($novaData[2] == '07' || $novaData[2] == '7') {
		echo " Sete dias ";
	} elseif ($novaData[2] == '08' || $novaData[2] == '8') {
		echo " Oito dias ";
	} elseif ($novaData[2] == '09' || $novaData[2] == '9') {
		echo " Nove dias ";
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

	<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?><?=$w->strRazaoSocial?> Estado do Maranhão <?php endforeach ?>, em cartório, compareceu 

	 <?=strtoupper($r->NOMEMAE)?>, <?=$r->NACIONALIDADEMAE?>(a), <?=$r->PROFISSAOMAE?>(a), portadora do RG nº <?=$r->RGMAE?> expedido por <?=$r->ORGAOEMISSORMAE?>, natural de 	<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAE)); foreach($c as $c):?>
<?=$c->cidade?> (<?=$c->uf?>)
	<?php endforeach ?>, residente e domiciliada em <?=$r->ENDERECOMAE?>,<?=$r->BAIRROMAE?> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAE)); foreach($c as $c):?>
<?=$c->cidade?> (<?=$c->uf?>)
	<?php endforeach ?>, mãe do menor <?=$r->NOMENASCIDO?>, 


	nascido em 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

	$data = $r->DATANASCIMENTO;
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

	?> as <?=$r->HORANASCIMENTO?> Horas, no(a) <?=$r->LOCALNASCIMENTO?>, em municipio de 

	<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENASCIMENTO)); foreach($c as $c):?>
<?=$c->cidade?> (<?=$c->uf?>)
	<?php endforeach ?>

 registrado 

Aos 	<?php //echo date('d/m/Y', strtotime($r->dataObito));

	$data = $r->DATAENTRADA ;
	$novaData = explode("-", $data);

	if ($novaData[2] == '01' || $novaData[2] == '1') {
		echo " Um dias  ";
	}elseif ($novaData[2] == '02' || $novaData[2] == '2') {
		echo " Dois dias ";
	} elseif ($novaData[2] == '03' || $novaData[2] == '3') {
		echo " Três ";
	} elseif ($novaData[2] == '04' || $novaData[2] == '4') {
		echo " Quatro dias ";
	} elseif ($novaData[2] == '05' || $novaData[2] == '5') {
		echo " Cinco dias ";
	} elseif ($novaData[2] == '06' || $novaData[2] == '6') {
		echo " Seis dias ";
	} elseif ($novaData[2] == '07' || $novaData[2] == '7') {
		echo " Sete dias ";
	} elseif ($novaData[2] == '08' || $novaData[2] == '8') {
		echo " Oito dias ";
	} elseif ($novaData[2] == '09' || $novaData[2] == '9') {
		echo " Nove dias ";
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

	?>, neste Ofício, conforme assento de nascimento lavrado no livro <?=$r->LIVRONASCIMENTO?>, folha <?=$r->FOLHANASCIMENTO?>, termo <?=$r->TERMONASCIMENTO?>, e declarou-me expressamente que não deseja informar o nome do suposto pai do registrando e tem pleno conhecimento da facultadade da declaração para averiguação oficiosa da paternidade, prevista na Lei nº 8.560, de 29 de dezembro de 1992 e o provimento 16 do CNJ, alegando, inclusive, ter sido cumprido, por parte deste Ofício, as determinações do CNJ; e declarando mais: que não pretende, de momento, promover ação de investigação de paternidade contra o suposto pai. Depois de ter cientificado a interessada, digitei este termo em duas vias, o qual, após lido e achado conforme, vai assinado por mim, <?=$_SESSION['nome']?>, e pela interessada.



<p style="text-align: center">
<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
foreach ($u as $u):?>	

<?=$u->cidade?>,

<?php
$data = date('Y-m-d') ;
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
<?php endforeach;endforeach ?>


<br>
<?php if (isset($r->ROGOMAE) && $r->ROGOMAE!=''): ?>
<p >
<br><br>	
<div style="border: 3px dashed silver; width: 7%; height: 60px; padding: 30px;margin-left: 20%;margin-bottom: -3%"></div>
<p style="display: inline; margin-left: 40%;">________________________________________________</p><br>
<p style="display: inline;margin-left: 21%">(Digital Mãe)</p>
<p style="display: inline;margin-left: 19%">&nbsp&nbsp&nbsp<?=$r->ROGOMAE?></p>
</p>
<?php else: ?>
<br><br>	
<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=strtoupper($r->NOMEMAE)?></p>
<br>	
<?php endif ?>

<br><br>
	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center;margin-top: -10px;"><?=$_SESSION['nome']?></p> 
		<p style="text-align: center;margin-top: -10px;"><?=$_SESSION['funcao']?></p> 




	</p>
	 </fieldset>

<?php endforeach  ?>
</body>
</html>
