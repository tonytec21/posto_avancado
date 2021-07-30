<!DOCTYPE html>

<?php include('../../controller/db_functions.php');
$pdo = conectar();
$tirar_cidades = array("5300109/", "/");
$repor_cidades = array(" ",", ");
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

<style type="text/css">
fieldset{

margin-top: 0.5%;
margin-bottom: 0.5%;
font-size: 100%;
font-weight: bold;
}
legend{
	font-weight: bold;
	font-size: 78%;
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
	font-size: 78%!important;
	font-weight: bold;
	padding-left: 2px;
}
.right{
	float: right;
	font-size: 78%!important;
	font-weight: bold;
	text-align: center;
	padding-right: 8px;
}
body{text-transform: uppercase; padding-left: 1cm; padding-right: 1cm; padding-top: 4.5cm;padding-bottom: 2cm;zoom:80%;}
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
<br>
<div style="text-align: center">Nome</div><br>
<div style="text-align: center;margin-top: -14px;font-size: 18px;font-weight: bold;"><?=$r->NOMENASCIDO?> </div>
<br>
<fieldset style="padding: 0px 0px 0px 10px!important;margin-top: -8px;"> <legend>CPF</legend>
<p><?=linha_vazio($r->CPFNASCIDO)?></p>
</fieldset>


<div  style="text-align: center;"> MATRICULA</div>
<br>
<div  style="text-align: center; margin-top: -14px;font-size: 15px;font-weight: bold;"><?=linha_vazio($r->MATRICULA)?></div>



<div style="width: 101%">
	<fieldset style="width: 70%; display: inline-block;"><legend>DATA DE NASCIMENTO POR EXTENSO</legend>
  <?php //echo date('d/m/Y', strtotime($r->dataObito));

  $data = $r->DATANASCIMENTO ;
  $novaData = explode("-", $data);

  if ($novaData[2] == '01' || $novaData[2] == '1') {
    echo "Primeiro";
  }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
    echo "Dois";
  } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
    echo "Três";
  } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
    echo "Quatro";
  } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
    echo "Cinco";
  } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
    echo "Seis";
  } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
    echo "Sete";
  } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
    echo "Oito";
  } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
    echo "Nove";
  }
    elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
    echo  ucfirst(GExtenso::numero($novaData[2])).'um';
  }
   else {echo  ucfirst(GExtenso::numero($novaData[2]));}
  //Será exibido na tela a data: 16/02/2015
  // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
  if ($novaData[1] == '01' || $novaData[1] == '1') {
    echo " de janeiro de ";
  }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
    echo " de fevereiro de ";
  } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
    echo " de março de ";
  } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
    echo " de abril de ";
  } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
    echo " de maio de ";
  } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
    echo " de junho de ";
  } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
    echo " de julho de ";
  } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
    echo " de agosto de ";
  } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
    echo " de setembro de ";
  } elseif ($novaData[1] == '10') {
    echo " de outubro de ";
  } elseif ($novaData[1] == '11') {
    echo " de novembro de ";
  } elseif ($novaData[1] == '12') {
    echo " de dezembro de ";
  } else {
    echo "Não definido";
  }
  $udg = substr($novaData[0], 2,3);
  if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
   echo GExtenso::numero($novaData[0]).' um';
  }
  else{
    echo GExtenso::numero($novaData[0]);
  }


  ?>
	 </fieldset>

	<fieldset style="width: 5.33%;display: inline-block;margin-top: -1px;margin-left: 1%"><legend>DIA</legend>
		<?php echo $novaData[2] ?>
	</fieldset>
	<fieldset style="width: 5.33%;display: inline-block;margin-top: -1px;"><legend>MÊS</legend>
			<?php echo $novaData[1] ?>
	</fieldset>
	<fieldset style="width: 5.33%;display: inline-block;margin-top: -1px;"><legend>ANO</legend>
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
	<fieldset style="width: 95.2%;text-align:justify;text-transform: none!important;"><legend>FILIAÇÃO</legend>
			<?php if ($r->NOMEPAI!='NULL' && $r->NOMEPAI!=''):?>
			<?php if ($r->NATURALIDADEPAI!='' || $r->ENDERECOPAI!='' || $r->BAIRROPAI!='' || $r->CIDADEPAI!=''): ?>
      		<strong><?=mb_strtoupper($r->NOMEPAI)?></strong>,
      		<?php else: ?>            
      		<strong><?=mb_strtoupper($r->NOMEPAI)?></strong>
      		<?php endif; ?>

			<!-- Naturalidade do Pai do Registrado -->
			<?php if (isset($r->NATURALIDADEPAI) && !empty($r->NATURALIDADEPAI)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAI)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEPAI) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEPAI)?></span>
					<?php else: ?>
					<?php if ($r->ENDERECOPAI!='' || $r->BAIRROPAI!='' || $r->CIDADEPAI!=''): ?>
					<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
					<?php else: ?>
					<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf?> 
					<?php endif;endif ?>         
			<?php endforeach ?> 
			<?php endif; ?>
			
			<!-- Endereço do Pai -->
			<?php if ($r->ENDERECOPAI!='' || $r->BAIRROPAI!='' || $r->CIDADEPAI!=''): ?>
      		residente e domiciliado(a)
      		<?php endif; ?>

			<?php if (isset($r->ENDERECOPAI) && !empty(mb_convert_case($r->ENDERECOPAI, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="à ".mb_convert_case($r->ENDERECOPAI, MB_CASE_TITLE, "UTF-8")?>,
			<?php endif; ?>

      		<?php if (isset($r->BAIRROPAI) && !empty(mb_convert_case($r->BAIRROPAI, MB_CASE_TITLE, "UTF-8"))): ?>
      		<!-- Condição Endereço -->
      		<?php if (isset($r->ENDERECOPAI) && !empty($r->ENDERECOPAI)): ?>
      		<?php else: ?>  
      		no bairro
      		<?php endif ?>
      		<?=mb_convert_case($r->BAIRROPAI, MB_CASE_TITLE, "UTF-8")?>, 
      		<?php endif; ?>

      		<?php if (isset($r->CIDADEPAI) && !empty(mb_convert_case($r->CIDADEPAI, MB_CASE_TITLE, "UTF-8"))): ?>
      		<!-- Condição Cidade -->
      		<?php if (isset($r->BAIRROPAI) && !empty($r->BAIRROPAI)): ?>
      
      		<?php else: ?>  
      		na cidade de
      		<?php endif ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAI)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf?>
			<?php endforeach ?>
			<?php endif; ?>

			<br>
			<?php endif; ?>			
			
			<!-- Qualificação da Mãe do Registrado -->	
			<?php if ($r->NOMEMAE!='' && !empty($r->NOMEMAE)): ?>
      
			<?php if ($r->NATURALIDADEMAE!='' || $r->ENDERECOMAE!='' || $r->BAIRROMAE!='' || $r->CIDADEMAE!=''): ?>
			<strong><?=mb_strtoupper($r->NOMEMAE)?></strong>,
			<?php else: ?>            
	  		<strong><?=mb_strtoupper($r->NOMEMAE)?></strong>
	  		<?php endif; ?>
	
			<?php endif; ?>				

			<!-- Naturalidade da Mãe do Registrado -->
			<?php if (isset($r->NATURALIDADEMAE) && !empty($r->NATURALIDADEMAE)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAE)); foreach($c as $c):?>
			<?php if (intval($r->NATURALIDADEMAE) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEMAE)?></span>
					<?php else: ?>
					<?php if ($r->ENDERECOMAE!='' || $r->BAIRROMAE!='' || $r->CIDADEMAE!=''): ?>
					<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
					<?php else: ?>
					<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf?> 
					<?php endif;endif ?>         
			<?php endforeach ?> 
			<?php endif; ?>

			<!-- Endereço da Mãe -->
			<?php if ($r->ENDERECOMAE!='' || $r->BAIRROMAE!='' || $r->CIDADEMAE!=''): ?>
      		residente e domiciliado(a)
      		<?php endif; ?>

			<?php if (isset($r->ENDERECOMAE) && !empty(mb_convert_case($r->ENDERECOMAE, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="à ".mb_convert_case($r->ENDERECOMAE, MB_CASE_TITLE, "UTF-8")?>,
			<?php endif; ?>

			<?php if (isset($r->BAIRROMAE) && !empty(mb_convert_case($r->BAIRROMAE, MB_CASE_TITLE, "UTF-8"))): ?>
			<!-- Condição Endereço -->
			<?php if (isset($r->ENDERECOMAE) && !empty($r->ENDERECOMAE)): ?>
			<?php else: ?>  
			no bairro
			<?php endif ?>
			<?=mb_convert_case($r->BAIRROMAE, MB_CASE_TITLE, "UTF-8")?>, 
			<?php endif; ?>

			<?php if (isset($r->CIDADEMAE) && !empty(mb_convert_case($r->CIDADEMAE, MB_CASE_TITLE, "UTF-8"))): ?>
			<!-- Condição Cidade -->
			<?php if (isset($r->BAIRROMAE) && !empty($r->BAIRROMAE)): ?>
			
      		<?php else: ?>  
      		na cidade de
      		<?php endif ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAE)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf?>
			<?php endforeach ?>
			<?php endif; ?>

			<!--SOCIOAFETIVO-->
			<?php if ($r->NOMEPAISOCIO!='NULL' && $r->NOMEPAISOCIO!='' && $r->ROGOPAISOCIO!='PAIDEMENOR'):?>
				<br>
			<?php if ($r->NATURALIDADEPAISOCIO!='' || $r->ENDERECOPAISOCIO!='' || $r->BAIRROPAISOCIO!='' || $r->CIDADEPAISOCIO!=''): ?>
      		<strong><?=mb_strtoupper($r->NOMEPAISOCIO)?></strong>,
      		<?php else: ?>            
      		<strong><?=mb_strtoupper($r->NOMEPAISOCIO)?></strong>
      		<?php endif; ?>

			<!-- Naturalidade do PaiSOCIO do Registrado -->
			<?php if (isset($r->NATURALIDADEPAISOCIO) && !empty($r->NATURALIDADEPAISOCIO)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAISOCIO)); foreach($c as $c):?>
			<?php if (intval($r->NATURALIDADESOCIO) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADESOCIO)?></span>
					<?php else: ?>
					<?php if ($r->ENDERECOPAISOCIO!='' || $r->BAIRROPAISOCIO!='' || $r->CIDADEPAISOCIO!=''): ?>
					<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
					<?php else: ?>
					<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf?> 
					<?php endif;endif ?>         
			<?php endforeach ?> 
			<?php endif; ?>
			
			<!-- Endereço do PaiSOCIO -->
			<?php if ($r->ENDERECOPAISOCIO!='' || $r->BAIRROPAISOCIO!='' || $r->CIDADEPAISOCIO!=''): ?>
      		residente e domiciliado(a)
      		<?php endif; ?>

			<?php if (isset($r->ENDERECOPAISOCIO) && !empty(mb_convert_case($r->ENDERECOPAISOCIO, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="à ".mb_convert_case($r->ENDERECOPAISOCIO, MB_CASE_TITLE, "UTF-8")?>,
			<?php endif; ?>

      		<?php if (isset($r->BAIRROPAISOCIO) && !empty(mb_convert_case($r->BAIRROPAISOCIO, MB_CASE_TITLE, "UTF-8"))): ?>
      		<!-- Condição Endereço -->
      		<?php if (isset($r->ENDERECOPAISOCIO) && !empty($r->ENDERECOPAISOCIO)): ?>
      		<?php else: ?>  
      		no bairro
      		<?php endif ?>
      		<?=mb_convert_case($r->BAIRROPAISOCIO, MB_CASE_TITLE, "UTF-8")?>, 
      		<?php endif; ?>

      		<?php if (isset($r->CIDADEPAISOCIO) && !empty(mb_convert_case($r->CIDADEPAISOCIO, MB_CASE_TITLE, "UTF-8"))): ?>
      		<!-- Condição Cidade -->
      		<?php if (isset($r->BAIRROPAISOCIO) && !empty($r->BAIRROPAISOCIO)): ?>
      
      		<?php else: ?>  
      		na cidade de
      		<?php endif ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAISOCIO)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf?>
			<?php endforeach ?>
			<?php endif; ?>

			<br>
			<?php endif; ?>			
			
			<!-- Qualificação da Mãe do Registrado -->	
			<?php if ($r->NOMEMAESOCIO!='' && !empty($r->NOMEMAESOCIO) && $r->ROGOMAESOCIO!='MAEDEMENOR'): ?>
      
			<?php if ($r->NATURALIDADEMAESOCIO!='' || $r->ENDERECOMAESOCIO!='' || $r->BAIRROMAESOCIO!='' || $r->CIDADEMAESOCIO!=''): ?>
			<strong><?=mb_strtoupper($r->NOMEMAESOCIO)?></strong>,
			<?php else: ?>            
	  		<strong><?=mb_strtoupper($r->NOMEMAESOCIO)?></strong>
	  		<?php endif; ?>
	
			<?php endif; ?>				

			<!-- Naturalidade da Mãe do Registrado -->
			<?php if (isset($r->NATURALIDADEMAESOCIO) && !empty($r->NATURALIDADEMAESOCIO)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAESOCIO)); foreach($c as $c):?>
			<?php if (intval($r->NATURALIDADEMAESOCIO) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEMAESOCIO)?></span>
					<?php else: ?>
					<?php if ($r->ENDERECOMAESOCIO!='' || $r->BAIRROMAESOCIO!='' || $r->CIDADEMAESOCIO!=''): ?>
					<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
					<?php else: ?>
					<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf?> 
					<?php endif;endif ?>         
			<?php endforeach ?> 
			<?php endif; ?>

			<!-- Endereço da Mãe -->
			<?php if ($r->ENDERECOMAESOCIO!='' || $r->BAIRROMAESOCIO!='' || $r->CIDADEMAESOCIO!=''): ?>
      		residente e domiciliado(a)
      		<?php endif; ?>

			<?php if (isset($r->ENDERECOMAESOCIO) && !empty(mb_convert_case($r->ENDERECOMAESOCIO, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="à ".mb_convert_case($r->ENDERECOMAESOCIO, MB_CASE_TITLE, "UTF-8")?>,
			<?php endif; ?>

			<?php if (isset($r->BAIRROMAESOCIO) && !empty(mb_convert_case($r->BAIRROMAESOCIO, MB_CASE_TITLE, "UTF-8"))): ?>
			<!-- Condição Endereço -->
			<?php if (isset($r->ENDERECOMAESOCIO) && !empty($r->ENDERECOMAESOCIO)): ?>
			<?php else: ?>  
			no bairro
			<?php endif ?>
			<?=mb_convert_case($r->BAIRROMAESOCIO, MB_CASE_TITLE, "UTF-8")?>, 
			<?php endif; ?>

			<?php if (isset($r->CIDADEMAESOCIO) && !empty(mb_convert_case($r->CIDADEMAESOCIO, MB_CASE_TITLE, "UTF-8"))): ?>
			<!-- Condição Cidade -->
			<?php if (isset($r->BAIRROMAESOCIO) && !empty($r->BAIRROMAESOCIO)): ?>
			
      		<?php else: ?>  
      		na cidade de
      		<?php endif ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAESOCIO)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf?>
			<?php endforeach ?>
			<?php endif; ?>
	</fieldset>

	<fieldset style="text-transform: none!important;width: 95.2%"><legend>AVÓS</legend>

<?php if ($r->AVO1PATERNO!='') {
 echo $r->AVO1PATERNO.' e ';
}
if ($r->AVO2PATERNO!='') {
echo $r->AVO2PATERNO.'<br> ';
}

if ($r->AVO1MATERNO!='') {
 echo $r->AVO1MATERNO.' e ';
}
if ($r->AVO2MATERNO!='') {
echo $r->AVO2MATERNO.'<br>';
}

if ($r->AVO1PATERNOSOCIO!='') {
 echo $r->AVO1PATERNOSOCIO.' e ';
}
if ($r->AVO2PATERNOSOCIO!='') {
echo $r->AVO2PATERNOSOCIO.'<br> ';
}

if ($r->AVO1MATERNOSOCIO!='') {
 echo $r->AVO1MATERNOSOCIO.' e ';
}
if ($r->AVO2MATERNOSOCIO!='') {
echo $r->AVO2MATERNOSOCIO;
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
	<fieldset style="width: 82.2%;height: 2%;margin-top: 7px;display: inline-block;"><legend>NOME E MATRICULA DOS GEMEOS</legend>
	<?php linha_vazio($r->NOMEMATRICULAGEMEOS);

		?>
	</fieldset>
	<br>
	<fieldset style="width: 50%;display: inline-block; "><legend>DATA DO REGISTRO POR EXTENSO</legend>
		 <?php //echo date('d/m/Y', strtotime($r->dataObito));
    $data = substr($r->DATAENTRADA,0,10) ;

    $novaData = explode("-", $data);

    if ($novaData[2] == '01' || $novaData[2] == '1') {
      echo "Primeiro";
    }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
      echo "Dois";
    } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
      echo "Três";
    } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
      echo "Quatro";
    } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
      echo "Cinco";
    } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
      echo "Seis";
    } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
      echo "Sete";
    } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
      echo "Oito";
    } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
      echo "Nove";
    }
      elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
    echo  ucfirst(GExtenso::numero($novaData[2])).'um';
  }
     else {echo  ucfirst(GExtenso::numero($novaData[2]));}
    //Será exibido na tela a data: 16/02/2015
    // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
    if ($novaData[1] == '01' || $novaData[1] == '1') {
      echo " de janeiro de ";
    }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
      echo " de fevereiro de ";
    } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
      echo " de março de ";
    } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
      echo " de abril de ";
    } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
      echo " de maio de ";
    } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
      echo " de junho de ";
    } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
      echo " de julho de ";
    } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
      echo " de agosto de ";
    } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
      echo " de setembro de ";
    } elseif ($novaData[1] == '10') {
      echo " de outubro de ";
    } elseif ($novaData[1] == '11') {
      echo " de novembro de ";
    } elseif ($novaData[1] == '12') {
      echo " de dezembro de ";
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
	<fieldset style="width: 42.2%;display: inline-block; "><legend>NÚMERO DA DNV DECLARAÇÃO DE NASCIDO VIVO</legend>
		 <?=linha_vazio($r->DNV)?>
	 </fieldset>

	<fieldset style="width: 95%;padding: 0px 10px 0px 10px!important"><legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
	<p style="margin-top: 2px; text-align:justify;">

		<?=linha_vazio($r->AVERBACAOTERMOANTIGO)?>
		<?php 
		$busca_registro_add = $pdo->prepare("SELECT * from info_registros_civil where id_registro_nascimento = '$id'");
		$busca_registro_add->execute();
		if ($busca_registro_add->rowCount()>0) :
			$bra = $busca_registro_add->fetchAll(PDO::FETCH_OBJ);
			foreach ($bra as $b) {
			if ($b->obs_visivel_certidao == 'SIM') {
					echo $b->observacoes_registro;
				}	
			}
		endif;	
		 ?>

</p>
	</fieldset><br>
	</div>

<?php 

$exibir_tabela_check = file_get_contents("config_paginas/exibir_tabela_certidoes.json");
$exibir_tabela = json_decode($exibir_tabela_check, true);
if ($exibir_tabela['nascimento'] == 'S') : ?>

<fieldset style="max-width: 95%;padding: 10px;margin-top: -5px;"><legend>ANOTAÇÕES DE CADASTRO</legend>
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
<br>
<!-- Nota de Rodapé -->
<div style="text-align:justify; text-transform: none!important; font-size:8px!important">
As anotações do cadastro acima não dispensam a parte interessada a apresentação do documento original, quando exigido pelo orgão solicitante ou quando necessário para identificação de seu portador.
</div>
	</fieldset>
	<div style="
			font-size: 8px;
			text-align:center;
			font-weight:bold;
			margin-top: -4px;">
			Válido somente com selo de autenticidade.
		</div>
<?php endif ?>

	</div>
        <!-- Rodapé -->
        <div class="left">

          <!-- Informações da Serventia -->
          <?php $serv = PESQUISA_ALL('cadastroserventia');
          foreach ($serv as $serv): ?>  

          <!-- Razão Social -->
          <?=$serv->strRazaoSocial?>
          <br>

          <!-- Títular da Serventia -->
          <?=mb_convert_case($serv->strTituloServentia, MB_CASE_UPPER, "UTF-8")?>
          <br>

          <!-- Endereço Serventia -->
			    <?=mb_convert_case($serv->strLogradouro, MB_CASE_TITLE, "UTF-8").", Nº ".$serv->strNumero.", ".mb_convert_case($serv->strBairro, MB_CASE_TITLE, "UTF-8")?>
          <br>
          
          <!-- Cidade Serventia -->
          <?php  $c = PESQUISA_ALL_ID('uf_cidade',$serv->intUFcidade); foreach($c as $c):?>
			    <?=mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf?>
          <?php endforeach ?>
          <br>

          <!-- Telefone Serventia -->
          <?="Telefone: ".mb_strtolower($serv->strTelefone1)?>
          <br>

          <!-- E-mail Serventia -->          
          <?="E-mail: ".mb_strtolower($serv->strEmail)?>
        <?php endforeach ?> 
        </div>

        <div class="right">
          O conteúdo da certidão é verdadeiro. Dou Fé <br>

          <!-- CIDADE DA SERVENTIA -->  
          <?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
          $u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade); foreach ($u as $u):?> 
          <?=mb_convert_case($u->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>

          <!-- DATA DA CERTIDÃO -->
          <?php
          $data = date('Y-m-d') ;
          $novaDataRegistro = explode("-", $data);
          echo $novaDataRegistro[2];
          if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
            echo " de janeiro de ";
          }elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
            echo " de fevereiro de ";
          } elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
            echo " de março de ";
          } elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
            echo " de abril de ";
          } elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
            echo " de maio de ";
          } elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
            echo " de junho de ";
          } elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
            echo " de julho de ";
          } elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
            echo " de agosto de ";
          } elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
            echo " de setembro de ";
          } elseif ($novaDataRegistro[1] == '10') {
            echo " de outubro de";
          } elseif ($novaDataRegistro[1] == '11') {
            echo " de novembro de ";
          } elseif ($novaDataRegistro[1] == '12') {
            echo " de dezembro de ";
          } else {
            echo "Não definido";
          }

          echo $novaDataRegistro[0];

          ?>. 
          <?php endforeach; endforeach ?>
          <br><br><br>
          
          <!-- ASSINATURA - ESCREVENTE -->
          ____________________________________________ <br>
          <?=strtoupper($nome_assinatura)?><br>
          <?=$funcao_assinatura?>
        </div>


<div style="position: absolute;width: 50px; margin-left: -20px;width: 200px; margin-top: 100px;"> 
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


    echo '<img style="max-width:33%; margin-top:-32px;margin-left:15px;" src="'.$nome.'" />';
    ?>


        <!-- TEXTO DO SELO -->
        <p style="font-weight:bold;
                  text-align:justify;
                  font-size:8px;
                  margin-top:-65px;
                  width:100%;
                  margin-left:80px;">
        <?=caracteres_selador($textoselo)?>
        </p>
	</main>

<?php
#parte de auditoria:
/*
	$selo = $r->SELO;
	$livro = $r->LIVRONASCIMENTO;
	$folha = $r->FOLHANASCIMENTO;
	$ord = $r->TERMONASCIMENTO;
	$funcionario = $nome_assinatura;
	$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','CER_NASCIMENTO','2','1','',CURRENT_TIMESTAMP,'GRA','14.a','$livro',$folha,'$ord','<?=$r->TIPOPAPELSEGURANCA?>','<?=$r->NUMEROPAPELSEGURANCA?>')");
	$insert_auditoria->execute();
	unset($_SESSION['sucesso']);
	*/
 ?>

<?php endforeach  ?>
</body>
</html>
