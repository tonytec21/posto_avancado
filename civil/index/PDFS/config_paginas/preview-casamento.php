<!DOCTYPE html>
<?php include('../../controller/db_functions.php');
$pdo=conectar();

function cidade_estrangeiro($texto){
$tirar = array("1","2","3","4","5","6","7","8","9","0",",",);
if (intval(intval($texto) == '5300109')) {
return str_replace($tirar, "", $texto);
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


if (isset($_SESSION['nomeapoio'])) {
$nome_assinatura = $_SESSION['nomeapoio'];
$funcao_assinatura = $_SESSION['funcaoapoio'];
}
else{
$nome_assinatura = $_SESSION['nome'];
$funcao_assinatura = $_SESSION['funcao'];	
}

$id = $_GET['id'];
$r = PESQUISA_ALL_ID('registro_casamento_novo',$id);
foreach ($r as $r ) :

?>
<html>
<head>
	
	<title>Certidão de Casamento</title>
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
body{text-transform: uppercase;padding-top: 5.5cm; padding-bottom: -2cm;padding-left: 1.5cm;padding-right: 1.5cm;zoom:80%;background: url("../../../images/preview.jpg");}
</style>
</head>

<body>
<h1 style="text-align: center;margin-bottom: -20px;margin-top: 15px;">C<span style="font-size:20px">ERTIDÃO de </span>C<span style="font-size:20px">ASAMENTO</span></h1>
<br>
<div style="max-width: 100%; display: block;">
<legend>NOMES</legend><br>
<fieldset style="width: 65%;margin-top: -0px;display: inline-block;">
	<?=mb_convert_case($r->NOMECASADONUBENTE1, MB_CASE_UPPER, "UTF-8")?>
</fieldset>
<fieldset style="width: 29.5%;display: inline-block;margin-top: -0px;"><legend>CPF</legend>
	<?=$r->CPFNUBENTE1?>
	<?php if ($r->CPFNUBENTE1 ==''): ?>
		<br>
	<?php endif ?>
</fieldset>
<br>
<fieldset style="width: 65%;margin-top: 2px;display: inline-block;">
<?=mb_convert_case($r->NOMECASADONUBENTE2, MB_CASE_UPPER, "UTF-8")?>
</fieldset>
<fieldset style="width: 29.5%;display: inline-block;margin-top: 2px;"><legend>CPF</legend>
	<?=$r->CPFNUBENTE2?>
	<?php if ($r->CPFNUBENTE2 ==''): ?>
		<br>
	<?php endif ?>
</fieldset>
<br><br>
<p class="center" style="margin-top: -6px;font-size: 14px;"> MATRICULA</p>
<h3 class="center" style="margin-top: -16px;font-size: 14px;">	<?=$r->MATRICULA?></h3><br>

	<fieldset style="width: 97%;padding-top:4%;padding-bottom:-0.5%;margin-top: -0px;">
	<legend>Nome completo de solteiro, nacionalidade, naturalidade, data de nascimento,  e filiação dos conjugues.
		</legend><p style="margin-top: -30px;"><br>
<?=mb_convert_case($r->NOMENUBENTE1, MB_CASE_UPPER, "UTF-8")?>, <?=$r->NACIONALIDADENUBENTE1?>(a), 
<?php if ($r->NATURALIDADENUBENTE1!=''): ?>
					natural de 
					<?=cidade_estrangeiro($r->NATURALIDADENUBENTE1)?>
					<?php if (intval($r->NATURALIDADENUBENTE1)!='5300109'): ?>
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php endif ?> 
<?php if ($r->DATANASCIMENTONUBENTE1!=''): ?>
nascido (a) em
<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = $r->DATANASCIMENTONUBENTE1 ;
$novaDataNoivo = explode("-", $data);

if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
	echo " Primeiro   ";
}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
	echo " Dois  ";
} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
	echo " Três ";
} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
	echo " Quatro  ";
} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
	echo " Cinco  ";
} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
	echo " Seis  ";
} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
	echo " Sete  ";
} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
	echo " Oito  ";
} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
	echo " Nove  ";
}  elseif ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1' || $novaDataNoivo[2] == '21'|| $novaDataNoivo[2] == '31'|| $novaDataNoivo[2] == '41' || $novaDataNoivo[2] == '51'|| $novaDataNoivo[2] == '61' || $novaDataNoivo[2] == '71' || $novaDataNoivo[2] == '81' || $novaDataNoivo[2] == '91') {
    echo  ucfirst(GExtenso::numero($novaDataNoivo[2])).'um';
  }
   else {echo  ucfirst(GExtenso::numero($novaDataNoivo[2]));}
//Será exibido na tela a data: 16/02/2015
// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
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

 $udg = substr($novaDataNoivo[0], 2,3);
  if ($udg == '01' || $udg == '1' || $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
   echo GExtenso::numero($novaDataNoivo[0]).'  um';
  }
  else{
    echo GExtenso::numero($novaDataNoivo[0]);
  }

?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE1))?>), 
<?php endif ?>
 Filho(a) de <?php if (!empty($r->NOMEPAINUBENTE1)) {
	echo mb_convert_case($r->NOMEPAINUBENTE1, MB_CASE_UPPER, "UTF-8") ;
}  ?>
<?php if (!empty($r->NOMEPAINUBENTE1) && !empty($r->NOMEMAENUBENTE1) )   echo " e "; ?>
<?php if (!empty($r->NOMEMAENUBENTE1)) {
	echo  mb_convert_case($r->NOMEMAENUBENTE1, MB_CASE_UPPER, "UTF-8") ;
}  ?>.


</p>
<p style="margin-top: -5px;">

<?= mb_convert_case($r->NOMENUBENTE2, MB_CASE_UPPER, "UTF-8")?>, <?=$r->NACIONALIDADENUBENTE2?>(a), 
<?php if ($r->NATURALIDADENUBENTE2!=''): ?>
					natural de 
					<?=cidade_estrangeiro($r->NATURALIDADENUBENTE2)?>
					<?php if (intval($r->NATURALIDADENUBENTE2)!='5300109'): ?>
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>)<?php endforeach ?>
					<?php endif ?>
					<?php endif ?>,

<?php if ($r->DATANASCIMENTONUBENTE2!=''): ?>
					 nascido (a) em
<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = $r->DATANASCIMENTONUBENTE2 ;
$novaDataNoiva = explode("-", $data);

if ($novaDataNoiva[2] == '01' || $novaDataNoiva[2] == '1') {
	echo " Primeiro   ";
}elseif ($novaDataNoiva[2] == '02' || $novaDataNoiva[2] == '2') {
	echo " Dois  ";
} elseif ($novaDataNoiva[2] == '03' || $novaDataNoiva[2] == '3') {
	echo " Três ";
} elseif ($novaDataNoiva[2] == '04' || $novaDataNoiva[2] == '4') {
	echo " Quatro  ";
} elseif ($novaDataNoiva[2] == '05' || $novaDataNoiva[2] == '5') {
	echo " Cinco  ";
} elseif ($novaDataNoiva[2] == '06' || $novaDataNoiva[2] == '6') {
	echo " Seis  ";
} elseif ($novaDataNoiva[2] == '07' || $novaDataNoiva[2] == '7') {
	echo " Sete  ";
} elseif ($novaDataNoiva[2] == '08' || $novaDataNoiva[2] == '8') {
	echo " Oito  ";
} elseif ($novaDataNoiva[2] == '09' || $novaDataNoiva[2] == '9') {
	echo " Nove  ";
}  elseif ($novaDataNoiva[2] == '01' || $novaDataNoiva[2] == '1' ||  $novaDataNoiva[2] == '21'|| $novaDataNoiva[2] == '31'|| $novaDataNoiva[2] == '41' || $novaDataNoiva[2] == '51'|| $novaDataNoiva[2] == '61' || $novaDataNoiva[2] == '71' || $novaDataNoiva[2] == '81' || $novaDataNoiva[2] == '91') {
    echo  ucfirst(GExtenso::numero($novaDataNoiva[2])).'um';
  }
   else {echo  ucfirst(GExtenso::numero($novaDataNoiva[2]));}
//Será exibido na tela a data: 16/02/2015
// . "de".$novaDataNoiva[1] . " de " . GExtenso::numero ($novaDataNoiva[0])
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

 $udg = substr($novaDataNoiva[0],  2,3);
  if ($udg == '01' || $udg == '1' ||$udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
   echo GExtenso::numero($novaDataNoiva[0]).'  um';
  }
  else{
    echo GExtenso::numero($novaDataNoiva[0]);
  }

?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE2))?>),<?php endif ?> Filho(a) de <?php if (!empty($r->NOMEPAINUBENTE2)) {
	echo  mb_convert_case($r->NOMEPAINUBENTE2, MB_CASE_UPPER, "UTF-8");
}  ?>
<?php if (!empty($r->NOMEPAINUBENTE2) && !empty($r->NOMEMAENUBENTE2) )   echo " e "; ?>
<?php if (!empty($r->NOMEMAENUBENTE2)) {
	echo  mb_convert_case($r->NOMEMAENUBENTE2, MB_CASE_UPPER, "UTF-8");
}  ?>

</p>
	</fieldset>

<br>

<fieldset style="width: 69%; display: inline-block;margin-top: -8px;">
<legend>DATA DO REGISTRO DO CASAMENTO (POR EXTENSO)</legend>
<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = $r->DATAENTRADA;
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
<fieldset style="width: 6.5%;display: inline-block;margin-top: -0px;"><legend>ANO</legend>
	<?php echo $nova_data[0]; ?>

</fieldset>
<br>
</div>
<fieldset style="width: 95%;padding: 12px;margin-top: -0px;">
<legend>REGIME DE BENS DO CASAMENTO
</legend>
<?php if (strlen($r->REGIMECASAMENTO)>3) {
$regime_array = explode("@", $r->REGIMECASAMENTO);
$REGIMECASAMENTO = $regime_array[0];
if ($REGIMECASAMENTO == 'OT') {
$complemento = $regime_array[1];
}
}
else{
$REGIMECASAMENTO = $r->REGIMECASAMENTO;	
} 
?>
<?php if ($REGIMECASAMENTO == 'CP') {
	echo "Comunhão Parcial de Bens";
} elseif ($REGIMECASAMENTO == 'CU') {
	echo "Comunhão Universal de Bens";
}elseif ($REGIMECASAMENTO == 'PF') {
	echo "Participação Final nos Aquestos";
}elseif ($REGIMECASAMENTO == 'SB') {
	echo "Separação Total de Bens";
}elseif ($REGIMECASAMENTO == 'SC') {
	echo "Separação Obrigatória de bens";
}elseif ($REGIMECASAMENTO == 'SO') {
	echo "Separação Convencional de bens";
}elseif ($REGIMECASAMENTO == 'SE') {
	echo "Separação de bens";
}
else if ($REGIMECASAMENTO == 'SO') {
echo 'Separação Convencional de Bens';
}
else if ($REGIMECASAMENTO == 'SL') {
echo 'Separação Legal de Bens';
}
else if ($REGIMECASAMENTO == 'OT') {
echo $complemento;
}
elseif ($REGIMECASAMENTO == 'CB') {
	// code...
	echo "Comunhão de Bens";
}else {
	echo "Não disponivel";
}
 ?>
</fieldset>

<br>
<fieldset style="width: 97%;padding: 5px;padding-bottom:-0.5%;margin-top: -12px;">
<legend>NOME QUE CADA UM DOS CÔNJUGUES PASSOU A UTILIZAR (QUANDO HOUVER ALTERAÇÃO)
</legend>
1º CONJUGE: 
<?php if (!empty($r->NOMECASADONUBENTE1)) {
	if ($r->NOMECASADONUBENTE1 != $r->NOMENUBENTE1) {
	echo mb_convert_case($r->NOMECASADONUBENTE1, MB_CASE_UPPER, "UTF-8") ;
	}
	else{echo 'NÃO HOUVE ALTERAÇÃO';}
	
}  ?>
<br>
2º CONJUGE: 
<?php if (!empty($r->NOMECASADONUBENTE2)) {
	if ($r->NOMECASADONUBENTE2 != $r->NOMENUBENTE2) {
	echo mb_convert_case($r->NOMECASADONUBENTE2, MB_CASE_UPPER, "UTF-8") ;
	}
	else{echo 'NÃO HOUVE ALTERAÇÃO';}
	
}  ?>
	


</fieldset>

<br>
	<fieldset style="padding: 5px;margin-top: -12px;width: 97%;"><legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
<br>
<p style="max-width: 720px;word-wrap: break-word;">
<?php 
$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVROCASAMENTO' and strFolha = '$r->FOLHACASAMENTO' and strTipo = 'CA' and conjuge1 = '$r->NOMENUBENTE1' and setRegistroInvisivel!='S'");
$busca_averbacoes->execute();
$ba = $busca_averbacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ba as $ba) {
echo $ba->strAverbacao;
}

$busca_anotacoes = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$r->LIVROCASAMENTO' and FOLHA = '$r->FOLHACASAMENTO' and TIPO = 'CAS'");
$busca_anotacoes->execute();
$ban = $busca_anotacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ban as $ban) {
echo $ban->ANOTACAO;
}

if ($busca_averbacoes->rowCount() == 0) {
	echo "";
}

if ($r->AVERBACAOTERMOANTIGO!='') {
	echo $r->AVERBACAOTERMOANTIGO;
}

if (isset($_GET['TEXTOFRASECERTIDAO']) && $_GET['TEXTOFRASECERTIDAO']!='') {
echo '<p>'.$_GET['TEXTOFRASECERTIDAO'].'</p>';
}
 ?>

<?php if ($r->TIPOLIVRO == '3'): ?>
	Observação: Casamento religioso celebrado em  

		<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = $r->DATARELIGIOSO;
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
	echo " de Outubro de";
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
?> (<?=date('d/m/Y', strtotime($r->DATARELIGIOSO))?>). No(a) <?=$r->NOMEIGREJA?>, <?php 
$x = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEIGREJA)); foreach ($x as $k) :?>
<span style="text-transform: initial;"> <?=$k->cidade?>/<?=$k->uf?></span>, 

<?php endforeach ?> pelo(a) <?=$r->CELEBRANTERELIGIOSO?>. 

<?php endif ?>

 </p>
 <?php 

$busca_averbacoes_inv = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVROCASAMENTO' and strFolha = '$r->FOLHACASAMENTO' and strTipo = 'CA' and conjuge1 = '$r->NOMENUBENTE1' and setRegistroInvisivel='S' limit 1");
$busca_averbacoes_inv->execute();
if ($busca_averbacoes_inv->rowCount()>0) {
echo "Consta Averbação no Termo.";
}
elseif ($busca_averbacoes_inv->rowCount()>1) {
echo "Constam Averbações no Termo.";
}
$busca_registro_add = $pdo->prepare("SELECT * from info_registros_civil where id_registro_casamento = '$id'");
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
	</fieldset><br><br>

<?php 

$exibir_tabela_check = file_get_contents("config_paginas/exibir_tabela_certidoes.json");
$exibir_tabela = json_decode($exibir_tabela_check, true);
if ($exibir_tabela['casamento'] == 'S') : ?>

	<fieldset style="padding: 10px;margin-top: -15px;"><legend>ANOTAÇÕES DE CADASTRO</legend>
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
	</fieldset>
<?php endif ?>

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
    echo $novaDataRegistro[0];
  }

					?>. 
					<?php endforeach; endforeach ?>
					 <br><br><br><br>
	_______________________________________ <br>
	<?=strtoupper($nome_assinatura)?><br>
	<?=$funcao_assinatura?>
</div>




		<?php

/*
QRcode::png($conteudo, 'tamanho1.png', QR_ECLEVEL_H , tamanho );
estrutura acima:
$conteudo = texto que sera dicionado, ou url por exemplo.
QR_ECLEVEL_H  (Capacidade de correção de erros.
Isso compensa a sujeira, dano ou imprecisão do código qr
Um alto nível de ECC adiciona mais redundância ao custo de usar mais espaço
QR_ECLEVEL_L, QR_ECLEVEL_M, QR_ECLEVEL_Q, QR_ECLEVEL_H . Onde L é o menor, menos preciso, e o H é o mais preciso.)

tamanho = definido em valor numerico unico, correspondente ao tamanho da imagem gerado do qrcode

*/

/*	include_once('../../../plugins/phpqrcode/qrlib.php');
	$img_local = "qrimagens/";
	$img_nome = $r->NOMENUBENTE1.'.png';
	$nome = $img_local.$img_nome;

		$conteudo = '1º Nubente:'.$r->NOMENUBENTE1. '<br>'. '2º nubente:'.$r->NOMENUBENTE2;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);

		QRcode::png($conteudo, 'tamanho1.png', QR_ECLEVEL_H , 3);

		echo '<img style="max-width:20%" src="'.$nome.'" />';
*/		?>
	</div>
	</main>


</body>

<?php endforeach ?>


</html>
