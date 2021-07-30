<!DOCTYPE html>
<?php ob_clean();
clearstatcache(); 
if (!isset($RETORNO)) {
$retorno = json_decode($_SESSION['RETORNOTEMP'],true);
}
else{
$retorno = json_decode($RETORNO,true);
}
if (!isset($_SESSION['RETORNOTEMP']) && !isset($RETORNO)) {
echo 'NENHUM SELO DE SEGUNDA VIA FOI GERADO, NÃO SERÁ POSSIVEL A REIMPRESSÃO';
break;
}
		$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];



if (isset($_GET['selobusca']) && $_GET['selobusca']!='') {
if (!isset($RETORNOBUSCA)) {
$retornobusca = json_decode($_SESSION['RETORNOTEMPBUSCA'],true);
}
else{
$retornobusca = json_decode($RETORNOBUSCA,true);
}
$qrbusca = $retornobusca['valorQrCode'];
$textoselobusca = $retornobusca['textoSelo'];
}



function linha_vazio($texto){
if ($texto!='' && $texto!=' ') {
echo $texto;
}
else{
	echo '<hr style="width:100%; max-width:100%; border:1px dashed black">';
}
}
function echo_exist($texto){
if ($texto!='' && $texto!=' ' && $texto!=NULL) {
		/*
		if (str_word_count($texto)>1 && str_word_count($texto)<7) {
			$texto = '<span style="font-weight:bold">'.$texto.'</span>';
		}

		else{
			$texto = ucfirst(mb_strtolower($texto));
		}
		*/
		return $texto;
	}
}


function cidade_estrangeiro($texto){
$tirar = array("1","2","3","4","5","6","7","8","9","0",",",);
if (intval(intval($texto) == '5300109')) {
return str_replace($tirar, "", $texto);
	}	
}
		

?>
<html>
<head>
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
padding: 5px;
font-weight: bold;
font-size: 100%;
}
legend{
	font-size: 80%;
}
table{
	font-size: 40%;
	border: 1px solid black;
}
thead{
	border-bottom: 1px solid black;
}
th{
	font-size: 9px;
	border-left: 1px solid black;
}

td{
font-size: 9px;	
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
body{text-transform: uppercase;padding-top: 5.5cm; padding-bottom: -2cm;padding-left: 1.5cm;padding-right: 1.5cm;zoom:80%; }
</style>
</head>

<body>
<h1 style="text-align: center;margin-bottom: -20px;margin-top: 15px;">C<span style="font-size:20px">ERTIDÃO de </span>C<span style="font-size:20px">ASAMENTO</span></h1>
<br>
<div style="max-width: 100%; display: block;">
<legend>NOMES</legend><br>
<fieldset style="width: 65%;margin-top: -0px;display: inline-block;">
	<?=mb_convert_case($nome_registrado_1, MB_CASE_UPPER, "UTF-8")?>
</fieldset>
<fieldset style="width: 29.5%;display: inline-block;margin-top: -0px;"><legend>CPF</legend>
	<?=$cpf_registrado_1?>
	<?php if ($cpf_registrado_1 ==''): ?>
		<br>
	<?php endif ?>
</fieldset>
<br>
<fieldset style="width: 65%;margin-top: 2px;display: inline-block;">
<?=mb_convert_case($nome_registrado_2, MB_CASE_UPPER, "UTF-8")?>
</fieldset>
<fieldset style="width: 29.5%;display: inline-block;margin-top: 2px;"><legend>CPF</legend>
	<?=$cpf_registrado_2?>
	<?php if ($cpf_registrado_2 ==''): ?>
		<br>
	<?php endif ?>
</fieldset>
<br><br>
<p class="center" style="margin-top: -6px;font-size: 14px;"> MATRICULA</p>
<h3 class="center" style="margin-top: -16px;font-size: 14px;">	<?=$matricula?></h3><br>

	<fieldset style="width: 97%;padding-top:4%;padding-bottom:-0.5%;margin-top: -0px;">
	<legend>Nome completo de solteiro, nacionalidade, naturalidade, data de nascimento,  e filiação dos conjugues.
		</legend><p style="margin-top: -30px;"><br>
<?=$nomes_datas_locais?>
</p>
	</fieldset>

<br>

<fieldset style="width: 69%; display: inline-block;margin-top: -8px;">
<legend>DATA DO REGISTRO DO CASAMENTO (POR EXTENSO)</legend>
<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = date('Y-m-d', strtotime($data_registro));
$nova_data = explode("-", $data);

if ($nova_data[2] == '01' || $nova_data[2] == '1') {
	echo " Primeiro   ";
}elseif ($nova_data[2] == '02' || $nova_data[2] == '2') {
	echo " Dois  ";
} elseif ($nova_data[2] == '03' || $nova_data[2] == '3') {
	echo " Três ";
} elseif ($nova_data[2] == '04' || $nova_data[2] == '4') {
	echo " Quatro  ";
} elseif ($nova_data[2] == '05' || $nova_data[2] == '5') {
	echo " Cinco  ";
} elseif ($nova_data[2] == '06' || $nova_data[2] == '6') {
	echo " Seis  ";
} elseif ($nova_data[2] == '07' || $nova_data[2] == '7') {
	echo " Sete  ";
} elseif ($nova_data[2] == '08' || $nova_data[2] == '8') {
	echo " Oito  ";
} elseif ($nova_data[2] == '09' || $nova_data[2] == '9') {
	echo " Nove  ";
}  elseif ($nova_data[2] == '01' || $nova_data[2] == '1' ||  $nova_data[2] == '21'|| $nova_data[2] == '31'|| $nova_data[2] == '41' || $nova_data[2] == '51'|| $nova_data[2] == '61' || $nova_data[2] == '71' || $nova_data[2] == '81' || $nova_data[2] == '91') {
    echo  ucfirst(GExtenso::numero($nova_data[2])).'um';
  }
   else {echo  ucfirst(GExtenso::numero($nova_data[2]));}
//Será exibido na tela a data: 16/02/2015
// . "de".$nova_data[1] . " de " . GExtenso::numero ($nova_data[0])
if ($nova_data[1] == '01' || $nova_data[1] == '1') {
	echo " de Janeiro de ";
}elseif ($nova_data[1] == '02' || $nova_data[1] == '2') {
	echo " de Fevereiro de ";
} elseif ($nova_data[1] == '03' || $nova_data[1] == '3') {
	echo " de Março de ";
} elseif ($nova_data[1] == '04' || $nova_data[1] == '4') {
	echo " de Abril de ";
} elseif ($nova_data[1] == '05' || $nova_data[1] == '5') {
	echo " de Maio de ";
} elseif ($nova_data[1] == '06' || $nova_data[1] == '6') {
	echo " de Junho de ";
} elseif ($nova_data[1] == '07' || $nova_data[1] == '7') {
	echo " de Julho de ";
} elseif ($nova_data[1] == '08' || $nova_data[1] == '8') {
	echo " de Agosto de ";
} elseif ($nova_data[1] == '09' || $nova_data[1] == '9') {
	echo " de Setembro de ";
} elseif ($nova_data[1] == '10') {
	echo " de Outubro de ";
} elseif ($nova_data[1] == '11') {
	echo " de Novembro de ";
} elseif ($nova_data[1] == '12') {
	echo " de Dezembro de ";
} else {
	echo "Não definido";
}

 $udg = substr($nova_data[0], 2,3);
  if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
   echo GExtenso::numero($nova_data[0]).'  um';
  }
  else{
    echo GExtenso::numero($nova_data[0]);
  }

?>
</fieldset>
<fieldset style="width: 8%;display: inline-block;margin-top: -0px;"><legend>DIA</legend>
<?php echo $nova_data[2]; ?>
</fieldset>
<fieldset style="width: 6%;display: inline-block;margin-top: -0px;"><legend>MÊS</legend>
<?php echo $nova_data[1]; ?>
</fieldset>
<fieldset style="width: 7%;display: inline-block;margin-top: -0px;margin-right: -1cm"><legend>ANO</legend>
	<?php echo $nova_data[0]; ?>

</fieldset>
<br>
</div>
<fieldset style="width: 95.4%;padding: 12px;margin-top: -0px;margin-right: -1cm">
<legend>REGIME DE BENS DO CASAMENTO
</legend>
<?=$regime_bens?>
</fieldset>

<br>
<fieldset style="width: 97.5%;padding: 5px;padding-bottom:-0.5%;margin-top: -12px;margin-right: -1cm">
<legend>NOME QUE CADA UM DOS CÔNJUGUES PASSOU A UTILIZAR (QUANDO HOUVER ALTERAÇÃO)
</legend>
<?=$novos_nomes?>
	


</fieldset>

<br>
	<fieldset style="padding: 5px;margin-top: -12px;width: 97.5%;margin-right: -1cm"><legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
<br>
<p style="max-width: 720px;word-wrap: break-word;">
<?=$observacoes_averbacoes?>

 </p>
	</fieldset><br><br>

<?php #if ($r->strNumeroRgNoivo!=''||$r->strPisNisNoivo!=''||$r->strPassaporteNoivo!=''||$r->strCartaoSaudeNoivo!=''||$r->strTituloEleitorNoivo!=''||$r->strNumeroRgNoiva!=''||$r->strPisNisNoiva!=''||$r->strPassaporteNoiva!=''||$r->strCartaoSaudeNoiva!=''||$r->strTituloEleitorNoiva!=''): ?>

	<!--fieldset style="padding: 10px;margin-top: -15px;"><legend>ANOTAÇÕES DE CADASTRO</legend>
<table style="width:100%; font-size: 50%" >
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
	<td><?=$r->strNumeroRgNoivo?></td>
	<td><?=$r->dataExpRgNoivo?></td>
	<td><?=$r->OrgaoExpRgNoivo?></td>
	<td><?=$r->dataValidadeRgNoivo?></td>
	</tr>
		<tr style="">
	<td style="border-left: none">RG</td>
	<td><?=$r->strNumeroRgNoiva?></td>
	<td><?=$r->dataExpRgNoiva?></td>
	<td><?=$r->OrgaoExpRgNoiva?></td>
	<td><?=$r->dataValidadeRgNoiva?></td>
	</tr>
	<tr>
	<td style="border-left: none">PIS/NIS</td>
	<td><?=$r->strPisNisNoivo?></td>
	<td><?=$r->dataExpPisNisNoivo?></td>
	<td><?=$r->OrgaoExpPisNisNoivo?></td>
	<td><?=$r->dataValidadePisNisNoivo?></td>
	</tr>
		<tr>
	<td style="border-left: none">PIS/NIS</td>
	<td><?=$r->strPisNisNoiva?></td>
	<td><?=$r->dataExpPisNisNoiva?></td>
	<td><?=$r->OrgaoExpPisNisNoiva?></td>
	<td><?=$r->dataValidadePisNisNoiva?></td>
	</tr>
	<tr>
	<td style="border-left: none">PASSAPORTE</td>
	<td><?=$r->strPassaporteNoivo?></td>
	<td><?=$r->dataExpPassaporteNoivo?></td>
	<td><?=$r->OrgaoExpPassaporteNoivo?></td>
	<td><?=$r->dataValidadePassaporteNoivo?></td>
	</tr>
		<tr>
	<td style="border-left: none">PASSAPORTE</td>
	<td><?=$r->strPassaporteNoiva?></td>
	<td><?=$r->dataExpPassaporteNoiva?></td>
	<td><?=$r->OrgaoExpPassaporteNoiva?></td>
	<td><?=$r->dataValidadePassaporteNoiva?></td>
	</tr>
	<tr>
	<td style="border-left: none">CARTÃO NACIONAL DE SAÚDE</td>
	<td><?=$r->strCartaoSaudeNoivo?></td>
	<td><?=$r->dataExpCartaoSaudeNoivo?></td>
	<td><?=$r->OrgaoExpCartaoSaudeNoivo?></td>
	<td><?=$r->dataValidadeCartaoSaudeNoivo?></td>
	</tr>
		<tr>
	<td style="border-left: none">CARTÃO NACIONAL DE SAÚDE</td>
	<td><?=$r->strCartaoSaudeNoiva?></td>
	<td><?=$r->dataExpCartaoSaudeNoiva?></td>
	<td><?=$r->OrgaoExpCartaoSaudeNoiva?></td>
	<td><?=$r->dataValidadeCartaoSaudeNoiva?></td>
	</tr>
<tr>
	<td style="border-left: none">CTPS</td>
	<td><?=$r->strCtpsNoivo?></td>
	<td><?=$r->dataExpCtpsNoivo?></td>
	<td><?=$r->OrgaoExpCtpsNoivo?></td>
	<td><?=$r->dataValidadeCtpsNoivo?></td>
	</tr>
		<tr>
	<td style="border-left: none">CTPS</td>
	<td><?=$r->strCtpsNoiva?></td>
	<td><?=$r->dataExpCtpsNoiva?></td>
	<td><?=$r->OrgaoExpCtpsNoiva?></td>
	<td><?=$r->dataValidadeCtpsNoiva?></td>
	</tr>

</tbody>

</table>
<br>
<table width="100%" style="margin-top: -1px;">
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
	<td style="border-left: none">TÍTULO DE ELEITOR</td>
	<td><?=$r->strTituloEleitorNoivo?></td>
	<td><?=$r->dataExpTituloEleitorNoivo?></td>
	<td><?=$r->OrgaoExpTituloEleitorNoivo?></td>
	<td><?=$r->dataValidadeTituloEleitorNoivo?></td>
	</tr>

	</tr>

	<tr style="">
	<td style="border-left: none">TÍTULO DE ELEITOR</td>
	<td><?=$r->strTituloEleitorNoiva?></td>
	<td><?=$r->dataExpTituloEleitorNoiva?></td>
	<td><?=$r->OrgaoExpTituloEleitorNoiva?></td>
	<td><?=$r->dataValidadeTituloEleitorNoiva?></td>
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
	<td width="20%"><?=$r->strCepNoivo?></td>
	</tr>
	<tr style="">
	<td width="20%">CEP Residencial</td>
	<td width="20%"><?=$r->strCepNoiva?></td>
	</tr>

</tbody>

</table>
	</div>
<div style=" margin-left: 55%;display: inline-table; margin-top: -10px;">
<table style="width:150%">
	<tbody>
<tr style="">
<td width="40%">Grupo sanguíneo</td>
<td width="20%"><?=$r->strGrupoSanguineoNoivo?></td>
	</tr>
	<tr style="">
<td width="40%">Grupo sanguíneo</td>
<td width="20%"><?=$r->strGrupoSanguineoNoiva?></td>
	</tr>
	</tbody>
</table>
</div>
<br><br>
* As anotações do cadastro acima não dispensam a parte interessada a apresentação do documento original, quando exigido pelo orgão solicitante ou quando necessário para identificação de seu portador.
	</fieldset-->
<?php #endif ?>

	</div>
	<br>
<div class="left" style="font-size: 7px">
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

<div class="right" style="font-size: 7px">
	O conteúdo da certidão é verdadeiro Dou Fé <br>
	
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

					 $udg = substr($novaDataRegistro[0], 2,3);
 if ($udg == '01' || $udg == '1' || $udg == '11' || $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
   echo GExtenso::numero($novaDataRegistro[0]).'  um';
  }
  else{
    echo GExtenso::numero($novaDataRegistro[0]);
  }

					?>. 
					<?php endforeach; endforeach ?>
					 <br><br><br><br>
	_______________________________________ <br>
	<?=strtoupper($_SESSION['nome'])?><br>
	<?=$_SESSION['funcao']?>
</div>



<div style="position: absolute;width: 50px; margin-left: 150px;width: 200px;margin-top: 35px;"> 
<?php

	include_once('../../../plugins/phpqrcode/qrlib.php');
	
function tirarAcentos($string){
return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/"),explode(" ","a A e E i I o O u U n N C c"),$string);
}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->nome_registrado_1.$nome_registrado_2).'2.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		echo '<img style="max-width:50%; margin-top:-15px;margin-left:10px;" src="'.$nome.'" />';
		?>
	
	<p style="font-weight: bold; font-size: 5px;margin-top: -90px;width: 50%; margin-left:110px; "><?=$textoselo?></p>
	</div>

<?php if (isset($_GET['primvia'])): 
$retorno = json_decode($r->RETORNOSELODIGITALCASAMENTO,true);
$qr = $retorno['valorQrCode'];
$textoselo = $retorno['textoSelo'];

	?>





<div style="position: absolute;width: 50px; margin-left: 320px;width: 200px; margin-top: 35px;"> 
<?php

	include_once('../../../plugins/phpqrcode/qrlib.php');
	

	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($nome_registrado_1.'&'.$nome_registrado_2).'.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		echo '<img style="max-width:50%; margin-top:-15px;margin-left:10px;" src="'.$nome.'" />';
		?>

	<p style="font-weight: bold; font-size: 5px;margin-top: -90px;width: 50%; margin-left:110px;"><?=$textoselo?></p>
</div>

	
<?php endif ?>

<?php if (isset($_GET['selobusca']) && $_GET['selobusca']!=''): ?>





<div style="position: absolute;width: 50px; margin-left: 320px;width: 200px; margin-top: 35px;"> 
<?php

	include_once('../../../plugins/phpqrcode/qrlib.php');
	

	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->ID).'NASCSEGUNDAVIABUSCA.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qrbusca;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		echo '<img style="max-width:50%; margin-top:-15px;margin-left:10px;" src="'.$nome.'" />';
		?>

	<p style="font-weight: bold; font-size: 5px;margin-top: -90px;width: 50%; margin-left:110px;"><?=$textoselobusca?></p>
</div-->

	
<?php endif ?>
<?php 
function descrimina_emols($ato,$quantidade){
$pdo = conectar();
$busca_emol =  $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '$ato' ");
$busca_emol->execute();
$be = $busca_emol->fetch(PDO::FETCH_ASSOC);
return number_format($quantidade * ($be['monValor']+$be['monValorFerc']),2);
}
 ?>
<?php if (isset($_SESSION['taxaff']) && $_SESSION['taxaff'] == 'S'): $taxaff = descrimina_emols('14.5.1',1) * 8/100;?>
<span style="position: absolute;width: 40px; margin-left: 240px;width: 300px;margin-top: 120px;  text-align:justify; ">*Emolumentos Acrescidos, FEMP (4%),  FADESP (4%), Conforme Leis Complementares nº 221/2019 e 222/2019.* </span>
<?php endif ?>	
</body>

<?php 
#parte de auditoria:
/*
	$selo = $r->SELO;
	$livro = $r->LIVROCASAMENTO;
	$folha = $r->FOLHACASAMENTO;
	$ord = $r->TERMOCASAMENTO;
	$funcionario = $_SESSION['nome'];
	$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','CER_CASAMENTO','2','1','$selo',CURRENT_TIMESTAMP,'GER','14.5.1','$livro',$folha,'$ord','<?=$r->TIPOPAPELSEGURANCA?>','<?=$r->NUMEROPAPELSEGURANCA?>')");
	$insert_auditoria->execute();
	unset($_SESSION['sucesso']);
	*/
 ?>

</html>
