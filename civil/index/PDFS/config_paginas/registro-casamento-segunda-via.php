<!DOCTYPE html>
<?php 
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
body{text-transform: uppercase;padding-top: 4.5cm; uppercase;font-family: Arial, Helvetica, padding-bottom: -2cm;padding-left: 1.5cm;padding-right: 1.5cm;zoom:80%; }


@media print{
#tabelainutil{
	zoom:75%!important;
}
#container_av1{
	font-size: 85%;
	text-align: justify;
	padding-top: 0px;
}
#dadosnubentes{
	font-size: 85%;
	text-align: justify;
}
}

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
<fieldset style="width: 65%;margin-top: 2px;display: inline-block;" >
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

	<fieldset style="width: 97%;padding-top:3%;padding-bottom:-0.5%;margin-top: -20px;text-align: justify;" id="dadosnubentes">
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



<fieldset style="width: 69%; display: inline-block;margin-top: 5px;">
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
<fieldset style="width: 7%;display: inline-block;margin-top: -0px;margin-right: -1cm"><legend>ANO</legend>
	<?php echo $nova_data[0]; ?>

</fieldset>
<br>
</div>
<fieldset style="width: 95.4%;padding: 12px;margin-top: -0px;margin-right: -1cm">
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
<fieldset style="width: 97.5%;padding: 5px;padding-bottom:-0.5%;margin-top: -12px;margin-right: -1cm">
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
	<fieldset id="container_av1" style="padding: 5px;margin-top: -12px;width: 97.5%;margin-right: -1cm"><legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
<p style="max-width: 720px;word-wrap: break-word;margin-top: -10px; " >
<?php 
$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVROCASAMENTO' and strFolha = '$r->FOLHACASAMENTO' and strTipo = 'CA' and conjuge1 = '$r->NOMENUBENTE1' and setRegistroInvisivel!='S'");
$busca_averbacoes->execute();
$ba = $busca_averbacoes->fetchAll(PDO::FETCH_OBJ);
$cont_av = 0;
$av_outra_folha ='';
foreach ($ba as $ba) {
$cont_av++;
if ($cont_av >=2) {
$av_outra_folha .= $ba->strAverbacao.'<br>'; 
}
else{
echo $ba->strAverbacao;
}
}
if (!empty($av_outra_folha) && $av_outra_folha!='') {
echo "EXISTEM MAIS AVERBAÇÕES NO VERSO DESTA CERTIDÃO<br>"; 
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
<table style="width:100%; font-size: 50%" id="tabelainutil">
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



<!--div style="position: absolute;width: 50px; margin-left: 150px;width: 200px;margin-top: 35px;"> 
<?php

	include_once('../../../plugins/phpqrcode/qrlib.php');
	
function tirarAcentos($string){
return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/"),explode(" ","a A e E i I o O u U n N C c"),$string);
}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->NOMENUBENTE1.$r->NOMENUBENTE2).'2.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		echo '<img style="max-width:50%; margin-top:-15px;margin-left:10px;" src="'.$nome.'" />';
		?>
	
	<p style="font-weight: bold; font-size: 5px;margin-top: -90px;width: 50%; margin-left:110px; "><?=$textoselo?></p>
	</div-->


<!-- SELO DE CERTIDAO-->
		<div style="
				position: absolute;
				width: 50px;
				margin-left: 0px;
				width: 200px;
				margin-top: 120px;"> 
		<?php
		include_once('../../../plugins/phpqrcode/qrlib.php');
		$img_local = "qrimagens/";
		$img_nome = tirarAcentos($r->NOMENUBENTE1.$r->NOMENUBENTE2).'2.png';
		$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);

		echo '<img style="max-width:33%; margin-top: -100px!important;margin-left:-6px;" src="'.$nome.'" />';
		?>

        <!-- TEXTO DO SELO DE CERTIDAO -->
		<p style="
				font-weight:bold;
            	text-align:justify;
            	font-size:8px;
            	margin-top:-63px;
            	width:100%;
            	margin-left:60px;">
				<?=caracteres_selador($textoselo)?>
		</p>
	</div>



<?php if (isset($_GET['primvia'])): 
$retorno = json_decode($r->RETORNOSELODIGITALCASAMENTO,true);
$qr = $retorno['valorQrCode'];
$textoselo = $retorno['textoSelo'];

	?>





<!--div style="position: absolute;width: 50px; margin-left: 320px;width: 200px; margin-top: 35px;"> 
<?php

	include_once('../../../plugins/phpqrcode/qrlib.php');
	

	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->NOMENUBENTE1.'&'.$r->NOMENUBENTE2).'.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		echo '<img style="max-width:50%; margin-top:-15px;margin-left:10px;" src="'.$nome.'" />';
		?>

	<p style="font-weight: bold; font-size: 5px;margin-top: -90px;width: 50%; margin-left:110px;"><?=$textoselo?></p>
</div-->
<!-- SELO DE PRIM VIA-->
		<div style="
				position: absolute;
				width: 50px;
				margin-left: 280px;
				width: 200px;
				margin-top: 120px;"> 
		<?php
		include_once('../../../plugins/phpqrcode/qrlib.php');
		$img_local = "qrimagens/";
		$img_nome = tirarAcentos($r->NOMENUBENTE1.$r->NOMENUBENTE2).'1V.png';
		$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);

		echo '<img style="max-width:33%; margin-top: -100px!important;margin-left:-6px;" src="'.$nome.'" />';
		?>

        <!-- TEXTO DO SELO DE PRIM VIA-->
		<p style="
				font-weight:bold;
            	text-align:justify;
            	font-size:8px;
            	margin-top:-63px;
            	width:100%;
            	margin-left:60px;
            	z-index: 0;
            	">
				<?=caracteres_selador($textoselo)?>
		</p>
	</div>

	
<?php endif ?>

<?php if (isset($_GET['selobusca']) && $_GET['selobusca']!=''): ?>





<!--div style="position: absolute;width: 50px; margin-left: 320px;width: 200px; margin-top: 35px;"> 
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

<!-- SELO DE BUSCA-->
		<div style="
				position: absolute;
				width: 50px;
				margin-left: 0px;
				width: 200px;
				margin-top: 200px;"> 
		<?php
		include_once('../../../plugins/phpqrcode/qrlib.php');
		$img_local = "qrimagens/";
		$img_nome = tirarAcentos($r->NOMENUBENTE1.$r->NOMENUBENTE2).'2.png';
		$nome = $img_local.$img_nome;

		$conteudo = $qrbusca;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);

		echo '<img style="max-width:33%; margin-top: -100px!important;margin-left:-6px;" src="'.$nome.'" />';
		?>

        <!-- TEXTO DO SELO DE BUSCA -->
		<p style="
				font-weight:bold;
            	text-align:justify;
            	font-size:8px;
            	margin-top:-63px;
            	width:100%;
            	margin-left:60px;">
				<?=caracteres_selador($textoselobusca)?>
		</p>
	</div>

	
<?php endif ?>

<!--SELO AVERBACAO ======================================================================-->
				<div style="
								display: flex;
								width: 70%;
								margin-left: 30%;
								padding-right: 0%;
								padding-top: 14px;
								margin-right: -30%;
								padding-left: 30px;
								margin-bottom: -300px;
								z-index: -1;
								">



				<?php
				$cont_selos = 0;
				$data_hoje = date('Y-m-d');
				$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVROCASAMENTO' and strFolha = '$r->FOLHACASAMENTO' and strTipo = 'CA'  and strOrdem!='A' and dataAverbacao = '$data_hoje' ");
				$busca_averbacoes->execute();
				$ba = $busca_averbacoes->fetchAll(PDO::FETCH_OBJ);
				foreach ($ba as $ba) :
				$selos_array = explode("|", $ba->strSelo);
									#var_dump($selos_array);
									for($i=0;$i<=count($selos_array);$i++):
										if(isset($selos_array[$i])):
											$selo = trim($selos_array[$i]);
											$busca_selos_gerados = $pdo->prepare("SELECT * FROM selagem_atos_retorno WHERE numeroSelo = '$selo'");
											$busca_selos_gerados->execute();
											$bsg = $busca_selos_gerados->fetchAll(PDO::FETCH_OBJ);
											foreach ($bsg as $seloret):
											$cont_selos ++;	
												?>

												<div style="display: inline-flex;max-width: 50%;width: 50%;
												<?php if ($cont_selos >= 3): ?>margin-top:16cm;margin-left:-22cm<?php endif ?>
												">
													<p style="max-width: 40%; text-align: justify;margin-right: -5px;">
														<img style="background: none; width: 100px;margin-top: -25px;z-index: -1;" src="data:image/png;base64,<?=$seloret->qrCode?>"alt="Qr Code" /> </img>
													</p>
													<p style="max-width: 70%;font-size: 8px;  text-align: justify;">
														<?=caracteres_selador($seloret->textoSelo)?>
													</p>
												</div>


											<?php endforeach;endif; endfor?>
				


				<?php
				$up_av = $pdo->prepare("UPDATE averbacoes_civil set strOrdem = 'I' where ID = '$ba->ID'");
				$up_av->execute();

				 endforeach; ?>

				</div>
<!--END SELO AVERBACAO ==================================================================--->
<?php if (isset($_GET['sav'])): 
$selo_busca_sav = $_GET['sav'].'<br>';
$busca_selo_sav = $pdo->prepare("SELECT * FROM auditoria where strSelo = '$selo_busca_sav' limit 1 ");
$busca_selo_sav->execute();
$bssav = $busca_selo_sav->fetch(PDO::FETCH_ASSOC);
	?>
<div style="position: absolute;width: 50px; margin-left: 280px;width: 200px; margin-top: 10px;"> 
<?php
	$retorno = json_decode($bssav['retorno'],true);
		$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];
	include_once('../../../plugins/phpqrcode/qrlib.php');


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
<?php endif ?>

<!--AVERBAÇÃO JOGADA PRA OUTRA FOLHA=======================================================================-->
			<?php if (!empty($av_outra_folha) && $av_outra_folha!=''): ?>
				<div style="page-break-before: always;">
				<fieldset style="width: 95%;padding: 0px 10px 0px 10px!important; 

				<?php if ($cont_selos >=3): ?>
					margin-top: -33cm;
					<?php elseif($cont_selos <= 2 && $cont_selos >0): ?>
						margin-top: 2cm;
					<?php else: ?>
					margin-top: 2cm;
					<?php  ?>	
				<?php endif ?>
				"><legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
					<?=$av_outra_folha?>
				</fieldset>
				<br><br>
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
			    </div>
			<?php endif ?>
<!--END AVERBAÇÃO JOGADA PRA OUTRA FOLHA===================================================================-->