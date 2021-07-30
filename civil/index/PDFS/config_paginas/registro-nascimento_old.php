<!DOCTYPE html>

<?php include('../../../controller/db_functions.php');
$pdo = conectar();
ob_clean();
clearstatcache();
#aqui tá pegando o id mandado da página pesquisa 
$id = $_GET['id'];


function linha_vazio($texto){
if ($texto!='' && $texto!=' ') {
echo $texto;
}
else{
	echo '<hr style="width:100%; max-width:100%; border:1px dashed black">';
}
}

?>
<html>
<head>

<style type="text/css">
fieldset{

margin-top: 0.5%;
margin-bottom: 0.5%;
font-size: 100%;
font-weight: bold;
}
legend{
	font-weight: bold;
	font-size: 80%;
}
table{
	border: 1px solid black;
	font-size: 50%;
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
	font-size: 70%!important;
	font-weight: bold;
}
.right{
	float: right;
	font-size: 70%!important;
	font-weight: bold;
	text-align: center;
}
body{text-transform: uppercase; padding-left: 2cm;padding-right: 2cm; padding-top: 4cm;padding-bottom: 2cm;zoom:80%; }
</style>
</head>

<body>
	<?php $r = PESQUISA_ALL_ID('registro_nascimento_novo',$id);
	foreach ($r as $r ) :
		preenche_vazio($r, 'CPFNASCIDO');
		preenche_vazio($r, 'DNV');
		$retorno = json_decode($r->RETORNOSELODIGITAL,true);
		$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];




		?>
<br>

<?php if ($r->DATAENTRADA==''): ?>
	<span style="color: red">O CAMPO "DATA DO REGISTRO" NÃO FOI PREENCHIDO POR FAVOR RETORNE E PREENCHA.</span>
<?php break; endif ?>

<?php if ($r->DATANASCIMENTO==''): ?>
	<span style="color: red">O CAMPO "DATA DO NASCIMENTO" NÃO FOI PREENCHIDO POR FAVOR RETORNE E PREENCHA.</span>
<?php break; endif ?>

<h1 style="text-align: center;margin-bottom: -20px;margin-top: 15px;">C<span style="font-size:20px">ERTIDÃO de </span>N<span style="font-size:20px">ASCIMENTO</span></h1><br>
<p style="text-align: center">Nome</p><br>
<p style="text-align: center;margin-top: -14px;font-size: 17px;font-weight: bold;"><?=$r->NOMENASCIDO?> </p>

<fieldset style="padding: 2px;margin-top: -8px;"> <legend>CPF</legend>
<p><?=linha_vazio($r->CPFNASCIDO)?></p>
</fieldset>
<p  style="margin-top: -2px; text-align: center; font-size: 17px;"> MATRICULA</p>
<h3  style="margin-top: -14px; text-align: center; font-size: 14px;"><?=linha_vazio($r->MATRICULA)?></h3>



<div style="width: 101%">
	<fieldset style="width: 70%; display: inline-block;"><legend>DATA DE NASCIMENTO POR EXTENSO</legend>
  <?php //echo date('d/m/Y', strtotime($r->dataObito));

  $data = $r->DATANASCIMENTO ;
  $novaData = explode("-", $data);

  if ($novaData[2] == '01' || $novaData[2] == '1') {
    echo " Primeiro   ";
  }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
    echo " Dois  ";
  } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
    echo " Três ";
  } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
    echo " Quatro  ";
  } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
    echo " Cinco  ";
  } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
    echo " Seis  ";
  } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
    echo " Sete  ";
  } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
    echo " Oito  ";
  } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
    echo " Nove  ";
  }
    elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
    echo  ucfirst(GExtenso::numero($novaData[2])).'um';
  }
   else {echo  ucfirst(GExtenso::numero($novaData[2]));}
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


  ?>
	 </fieldset>

	<fieldset style="width: 5%;display: inline-block;margin-top: -1px;margin-left: 1%"><legend>DIA</legend>
		<?php echo $novaData[2] ?>
	</fieldset>
	<fieldset style="width: 5%;display: inline-block;margin-top: -1px;"><legend>MÊS</legend>
			<?php echo $novaData[1] ?>
	</fieldset>
	<fieldset style="width: 5%;display: inline-block;margin-top: -1px;"><legend>ANO</legend>
			<?php echo $novaData[0] ?>
	</fieldset>
<br>
<div class="all">
	<fieldset style="width: 21%;;display: inline-block;"><legend>HORA DE NASCIMENTO</legend>

		<?php if ($r->HORANASCIMENTO!=''): ?>
			<?=date('H:i',strtotime($r->HORANASCIMENTO))?>
			<?php else: ?>
				<br>
		<?php endif ?></fieldset>
	<fieldset style="width: 70.5%;display: inline-block; margin-left: 1.5%;margin-top: -0px;"><legend>NATURALIDADE</legend>
<?php
$x = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENASCIDO)); foreach ($x as $k) :?>

<?=$k->cidade?>/<?=$k->uf?>

<?php endforeach ?>
	 </fieldset>
	<br>
	<fieldset style="width: 30%;display: inline-block;"><legend>MUNICIPIO REGISTRO UNIDADE DA FEDERAÇÃO</legend>
			<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h):
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>

					<?=$u->cidade?>/<?=$u->uf?>
<?php endforeach ?>
<?php endforeach ?>
 </fieldset>
	<fieldset style="width: 43%;display: inline-block;"><legend>LOCAL, MUNICÍPIO DE NASCIMENTO E UF</legend>
		<?=$r->LOCALNASCIMENTO?>, <?php
$x = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENASCIMENTO)); foreach ($x as $k) :?>

<?=$k->cidade?>/<?=$k->uf?>

<?php endforeach ?>
	</fieldset>
	<fieldset style="width: 16.5%;display: inline-block;"><legend>SEXO</legend>
		<?php if ($r->SEXONASCIDO == 'M') {
			echo "Masculino";
		} else  {
			// code...
			echo "Feminino";
		}
		 ?>
	</fieldset>
	<fieldset style="width: 96%"><legend>FILIAÇÃO</legend>
	<?php if (!empty($r->NOMEPAI) && $r->NOMEPAI != '' ) {
 		echo $r->NOMEPAI ;
 		echo " e " ;
 	}  ?>
 	<?php if (!empty($r->NOMEPAI) && !empty($r->NOMEMAE) )    ?>
 	<?php if (!empty($r->NOMEMAE)) {
 		echo $r->NOMEMAE ;
 	}



 	  if ($r->NOMEPAISOCIO!='' && $r->ROGOPAISOCIO!='PAIDEMENOR') {
    echo  '; '.$r->NOMEPAISOCIO.' e';
  }
  if ($r->NOMEMAESOCIO!=''&& $r->ROGOMAESOCIO!='MAEDEMENOR') {
    echo ' '.$r->NOMEMAESOCIO;
  }

 	?>
	</fieldset>
	<fieldset style="width: 96%"><legend>AVÓS</legend>

<?php if ($r->AVO1PATERNO!='') {
 echo $r->AVO1PATERNO.', ';
}
if ($r->AVO2PATERNO!='') {
echo $r->AVO2PATERNO.'; ';
}

if ($r->AVO1MATERNO!='') {
 echo $r->AVO1MATERNO.', ';
}
if ($r->AVO2MATERNO!='') {
echo $r->AVO2MATERNO;
}


?>

	</fieldset>
	<legend></legend>
	<fieldset style="width: 10%;display: inline-block;"><legend>GEMEOS</legend>
		<?php if ($r->GEMEOS == 'S') {
			echo "Sim";
		} else  {
			// code...
			echo "Não";
		}
		 ?>
	</fieldset>
	<fieldset style="width: 82.8%;height: 2%;margin-top: 7px;display: inline-block;"><legend>NOME E MATRICULA DOS GEMEOS</legend>
	<?php linha_vazio($r->NOMEMATRICULAGEMEOS);

		?>
	</fieldset>
	<br>
	<fieldset style="width: 50%;display: inline-block; "><legend>DATA DO REGISTRO POR EXTENSO</legend>
		 <?php //echo date('d/m/Y', strtotime($r->dataObito));
    $data = substr($r->DATAENTRADA,0,10) ;

    $novaData = explode("-", $data);

    if ($novaData[2] == '01' || $novaData[2] == '1') {
      echo " Primeiro   ";
    }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
      echo " Dois  ";
    } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
      echo " Três ";
    } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
      echo " Quatro  ";
    } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
      echo " Cinco  ";
    } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
      echo " Seis  ";
    } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
      echo " Sete  ";
    } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
      echo " Oito  ";
    } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
      echo " Nove  ";
    }
      elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
    echo  ucfirst(GExtenso::numero($novaData[2])).'um';
  }
     else {echo  ucfirst(GExtenso::numero($novaData[2]));}
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

    ?>
	</fieldset>
	<fieldset style="width: 42.8%;display: inline-block; "><legend>NÚMERO DA DNV DECLARAÇÃO DE NASCIDO VIVO</legend>
		 <?=linha_vazio($r->DNV)?>
	 </fieldset>

	<fieldset style="width: 96%;padding: 10px;"><legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
<p style="margin-top: -15px;">

		<?=linha_vazio($r->AVERBACAOTERMOANTIGO)?>


</p>
	</fieldset><br>
	</div>

<?php #if ($r->strNumeroRg!=''||$r->strNumeroPisNis!=''||$r->strNumeroPassaporte!=''||$r->strNumeroCartSaude!=''||$r->strNumeroTituloEleitor!=''): ?>

<fieldset style="max-width: 100%;padding: 10px;margin-top: -5px;"><legend>ANOTAÇÕES DE CADASTRO</legend>
<table style="width:100%;">
	<thead align="center">
		<tr>
		<th style="border-left: none">TIPO DOCUMENTO</th>
		<th width="20%">NÚMERO</th>
		<th width="20%">DATA EXPEDIÇÃO</th>
		<th width="20%">ÓRGÃO EMISSOR</th>
		<th width="20%">DATA DE VALIDADE</th>
	</tr>
	</thead>
<tbody>

	<tr style="">
	<td style="border-left: none">RG</td>
	<td><?=$r->strNumeroRg?></td>
	<td><?=$r->dataExpRg?></td>
	<td><?=$r->OrgaoExpRg?></td>
	<td><?=$r->dataValidadeRg?></td>
	</tr>


	<tr>
	<td style="border-left: none">PIS/NIS</td>
	<td><?=$r->strNumeroPisNis?></td>
	<td><?=$r->dataExpPisNis?></td>
	<td><?=$r->OrgaoExpPisNis?></td>
	<td><?=$r->dataValidadePisNis?></td>
	</tr>

	<tr>
	<td style="border-left: none">PASSAPORTE</td>
	<td><?=$r->strNumeroPassaporte?></td>
	<td><?=$r->dataExpPassaporte?></td>
	<td><?=$r->OrgaoExpPassaporte?></td>
	<td><?=$r->dataValidadePassaporte?></td>
	</tr>

	<tr>
	<td style="border-left: none">CARTÃO NACIONAL DE SAÚDE</td>
	<td><?=$r->strNumeroCartSaude?></td>
	<td><?=$r->dataExpCartSaude?></td>
	<td><?=$r->OrgaoExpCartSaude?></td>
	<td><?=$r->dataValidadeCartSaude?></td>
	</tr>


	<tr style="">
	<td style="border-left: none">TÍTULO DE ELEITOR</td>
	<td><?=$r->strNumeroTituloEleitor?></td>
	<td><?=$r->dataExpTituloEleitor?></td>
	<td><?=$r->OrgaoExpTituloEleitor?></td>
	<td><?=$r->dataValidadeTituloEleitor?></td>
	</tr>

	</tr>

</tbody>

</table>
<br>
<div style="float: left;display: inline-table;">
<table style="width:150%;margin-top: -10px;">

<tbody>
	<tr style="">
	<td width="20%">CEP Residencial</td>
	<td width="20%"><?=$r->strCep?></td>
	</tr>
</tbody>

</table>
	</div>
<div style="float: left;margin-left:47%;margin-top: -10px;display: inline-table;">
<table style="width:150%">
	<tbody>
<tr style="">
<td width="40%">Grupo sanguíneo</td>
<td width="20%"><?=$r->strGrupoSanguineo?></td>
	</tr>
	</tbody>
</table>
</div>

<p>
* As anotações do cadastro acima não dispensam a parte interessada a apresentação do documento original, quando exigido pelo orgão solicitante ou quando necessário para identificação de seu portador.
</p>
	</fieldset>

<?php #endif ?>

	</div>
	<br>
<div class="left" style="font-size: 8px">
<?php $serv = PESQUISA_ALL('cadastroserventia');
foreach ($serv as $serv): ?>
<span style="text-transform: uppercase;">
	<?=$serv->strRazaoSocial?> 	<br>
	<?=$serv->strTituloServentia?> <br>
	<?php $c = PESQUISA_ALL_ID('uf_cidade',$serv->intUFcidade); foreach ($c as $c) {
	echo $c->cidade.'/'.$c->uf;
	} ?><br>
	<?=$serv->strLogradouro.' Nº '.$serv->strNumero?><br>
		<?=$serv->strTelefone1?><br>
		<?=$serv->strEmail?>
		</span>
<?php endforeach ?>
</div>

<div class="right" style="font-size: 8px">
	O conteúdo da certidão é verdadeiro Dou Fé <br>

					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h):
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>

					<?=$u->cidade?>/<?=$u->uf?>,

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
						echo " de Outubro de ";
					} elseif ($novaDataRegistro[1] == '11') {
						echo " de Novembro de ";
					} elseif ($novaDataRegistro[1] == '12') {
						echo " de Dezembro de ";
					} else {
						echo "Não definido";
					}

					echo $novaDataRegistro[0];

					?>.
					<?php endforeach; endforeach ?>
					 <br><br><br><br>
	_______________________________________ <br>
	<?=strtoupper($_SESSION['nome'])?><br>
	<?=$_SESSION['funcao']?>
</div>


		<?php

	include_once('../../../plugins/phpqrcode/qrlib.php');

function tirarAcentos($string){
return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(ý)/","/(Ý)/"),explode(" ","a A e E i I o O u U n N C c y Y"),$string);
}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->ID).'nasccert.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		echo '<img style="max-width:20%; margin-top:-15px;margin-left:10px;" src="'.$nome.'" />';
		?>
	</div>
	<p style="font-weight: bold; font-size: 6px;"><?=$textoselo?></p>
	</main>

<?php
#parte de auditoria:
/*
	$selo = $r->SELO;
	$livro = $r->LIVRONASCIMENTO;
	$folha = $r->FOLHANASCIMENTO;
	$ord = $r->TERMONASCIMENTO;
	$funcionario = $_SESSION['nome'];
	$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','CER_NASCIMENTO','2','1','',CURRENT_TIMESTAMP,'GRA','14.a','$livro',$folha,'$ord','<?=$r->TIPOPAPELSEGURANCA?>','<?=$r->NUMEROPAPELSEGURANCA?>')");
	$insert_auditoria->execute();
	unset($_SESSION['sucesso']);
	*/
 ?>

<?php endforeach  ?>
</body>
</html>
