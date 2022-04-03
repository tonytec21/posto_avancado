
<?php

include('../controller/db_functions.php');
$pdo = conectar();

if (isset($_POST['quantidadePaginas']) && isset($_POST['tipoLivro']) && $_POST['tipoLivro']!='' && $_POST['quantidadePaginas']!='' ):?>

<?php if ($_POST['tipoLivro'] == 'CASAMENTOS'): ?>

<!--SE FOR CASAMENTO:-->



<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">
	
<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO CIVIL - CASAMENTOS, feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

	$data = date('Y-m-d') ;
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

	echo GExtenso::numero($novaData[0]);

	?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>


<!--SE FOR CASAMENTO AUXILIAR:-->



<?php if ($_POST['tipoLivro'] == 'CASAMENTOSA'): ?>


<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO CIVIL - CASAMENTOS CIVIS COM EFEITO RELIGIOSO, feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d') ;
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

echo GExtenso::numero($novaData[0]);

?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>






<!--SE FOR NASCIMENTO:-->



<?php if ($_POST['tipoLivro'] == 'NASCIMENTOS'): ?>


<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO CIVIL - NASCIMENTOS, feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d') ;
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

echo GExtenso::numero($novaData[0]);

?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>



<!--SE FOR OBITOS:-->



<?php if ($_POST['tipoLivro'] == 'OBITOS'): ?>


<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO CIVIL - ÓBITOS, feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d') ;
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

echo GExtenso::numero($novaData[0]);

?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>





<!--SE FOR OBITOS AUXILIAR:-->



<?php if ($_POST['tipoLivro'] == 'OBITOSA'): ?>


<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO CIVIL - ÓBITOS (NATIMORTO), feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d') ;
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

echo GExtenso::numero($novaData[0]);

?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>




<!--SE FOR PROCLAMAS:-->



<?php if ($_POST['tipoLivro'] == 'PROCLAMAS'): ?>


<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO CIVIL - PROCLAMAS, feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d') ;
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

echo GExtenso::numero($novaData[0]);

?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>



<!--SE FOR ESCRITURAS:-->



<?php if ($_POST['tipoLivro'] == 'ESCRITURA'): ?>


<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO NOTARIAL - ESCRITURAS, feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d') ;
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

echo GExtenso::numero($novaData[0]);

?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>



<!--SE FOR PROCURACOES:-->



<?php if ($_POST['tipoLivro'] == 'PROCURACAO'): ?>


<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO NOTARIAL - PROCURAÇÕES, feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d') ;
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

echo GExtenso::numero($novaData[0]);

?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>




<!--SE FOR PROCURACOESPREV:-->



<?php if ($_POST['tipoLivro'] == 'PROCURACAOPREV'): ?>


<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO NOTARIAL - PROCURAÇÕES PARA FINS PREVIDENCIÁRIOS, feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d') ;
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

echo GExtenso::numero($novaData[0]);

?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>



<!--SE FOR RENUNCIA:-->



<?php if ($_POST['tipoLivro'] == 'RENUNCIA'): ?>


<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO NOTARIAL - RENÚNCIAS, feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d') ;
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

echo GExtenso::numero($novaData[0]);

?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>



<!--SE FOR REVOGACAO:-->



<?php if ($_POST['tipoLivro'] == 'REVOGACAO'): ?>


<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO NOTARIAL - REVOGAÇÕES, feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d') ;
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

echo GExtenso::numero($novaData[0]);

?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>



<!--SE FOR SUBSTABELECIMENTO:-->



<?php if ($_POST['tipoLivro'] == 'SUBSTABELECIMENTO'): ?>


<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO NOTARIAL - SUBSTABELECIMENTO, feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d') ;
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

echo GExtenso::numero($novaData[0]);

?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>



<?php if ($_POST['tipoLivro'] == 'ATANOTARIAL'): ?>


<img style="max-width: 100%" src="bd_INSERTS/cabecalhos/CAPA.jpg">

<h1 style="text-align: center;">TERMO DE ABERTURA</h1>
<p style="text-align: justify;">Cont&eacute;m este livro <?=GExtenso::numero($_POST['quantidadePaginas'])?> p&aacute;ginas numeradas de 1 a <?=$_POST['quantidadePaginas']?> e assinaladas com a rubrica do titular desta serventia como segue, _____________, e destina-se &agrave; transcri&ccedil;&atilde;o de REGISTRO NOTARIAL - ATA NOTARIAL, feitas por sistema de folhas soltas atrav&eacute;s de editora&ccedil;&atilde;o eletr&ocirc;nica em computador, encadernadas, e sendo este o livro que toma o n&uacute;mero 2 desta Serventia. <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): $c = PESQUISA_ALL_ID('uf_cidade', $w->intUFcidade);foreach ($c as $c):?><?=$c->cidade?> (<?=$c->uf?>)<?php endforeach;endforeach ?> , 

<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d') ;
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

echo GExtenso::numero($novaData[0]);

?>.</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">&nbsp;</p>
<p style="text-align: center;">________________________________________ <br> 
<?=mb_strtoupper($_SESSION['nome'])?> <br> <?=$_SESSION['funcao']?>
</p>


<?php endif ?>
















     