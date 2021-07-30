<html>
<?php include('../../../controller/db_functions.php');
session_start();
$pdo = conectar();
#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
$j = PESQUISA_ALL_ID('pessoa', $id);
	$c = PESQUISA_ALL('cadastroserventia');
	foreach ($c as $c ):?>
	<?php foreach ($j as $key): 


$idpessoa = $_GET['id'];

if (!isset($_GET['reimpressao'])&&!isset($_SESSION['SELOOLD'])) {

unset($_SESSION['RETORNOTEMP']);
include('../selador/civil_geral.php');

if ($token =='' || empty($token)) {
$_SESSION['erro'] = 'NENHUM DADO RECEBIDO TENTE NOVAMENTE atualize a página';
header('Location: ' . $_SERVER['HTTP_REFERER']);
break;
}


if ($token !='') {


#PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
$ato_praticado = '13.17.1';
$escrevente = $_SESSION['nome'];
$isento = 'false';
if (isset($_GET['motivoatoisento']) && $_GET['motivoatoisento']!='' ) {
$isento = 'true';
$motivoisento = $_GET['motivoatoisento'];
}
if ($key->setTipoPessoa== 'J') {
$nomeparte1 = $key->strRazaoSocial;
}
else{
$nomeparte1 = $key->strNome;
}

$livro ='';
$folha='';

if (isset($_GET['motivoatoisento']) && $_GET['motivoatoisento']!='' ) {
$ConteudoPOST = '{
"ato" :{
"codigo":"13.17.1",
"codigoTabelaCusta":"0520201011"
},
"escrevente":"'.$escrevente.'",
"isento":{
"value":'.$isento.',
"motivo":"'.$motivoisento.'"
},
"versaoTabelaDeCustas":"0520201011",
"partes": {
"nomesPartes":"X",
"parteAto":[
{
"nome":"'.$nomeparte1.'"
}
]}

}';
}

else{
$ConteudoPOST = '{
"ato" :{
"codigo":"13.17.1",
"codigoTabelaCusta":"0520201011"
},
"escrevente":"'.$escrevente.'",
"versaoTabelaDeCustas":"0520201011",
"partes": {
"nomesPartes":"X",
"parteAto":[
{
"nome":"'.$nomeparte1.'"
}
]}

}';	
}

$ConteudoCabecalho = [
'Authorization: Bearer'.$token,
"Content-Type: application/json"

];



$handler = curl_init($_SESSION['urlselodigital'].'notas/cartao-assinatura');

curl_setopt_array($handler, [

CURLOPT_RETURNTRANSFER => true,
CURLOPT_ENCODING => "",
CURLOPT_MAXREDIRS => 10,
CURLOPT_SSL_VERIFYHOST => 0,
CURLOPT_SSL_VERIFYPEER => 0,
CURLOPT_TIMEOUT => 0,
CURLOPT_FOLLOWLOCATION => false,
CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
CURLOPT_CUSTOMREQUEST => "POST",
CURLOPT_POSTFIELDS =>"$ConteudoPOST",
CURLOPT_HTTPHEADER => array(
"Authorization: Bearer $token",
"Content-Type: application/json"
),
]);

$resp = curl_exec($handler);
$resp = json_decode($resp, true);
#var_dump($resp);
#echo curl_error($handler);
$erro = curl_error($handler);
if (isset($resp['status'])) {
#die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
$_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
header('Location: ' . $_SERVER['HTTP_REFERER']);
break;
}
$SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
$TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
$QRCODE = $resp['resumos'][0]['valorQrCode'];
$RETORNO = json_encode($resp['resumos'][0]);
$_SESSION['SELOOLD'] =$SELO;
$_SESSION['sucesso'] = $SELO;
$_SESSION['RETORNOTEMPPESSOAS'] = $RETORNO;
#echo $resp['resumos'][0]['dataGeracao'].'<br>';
#echo $resp['resumos'][0]['numeroSelo'].'<br>';
#echo $resp['resumos'][0]['numeroSelo'].'<br>';
#$info = curl_getinfo($handler);
#var_dump($info);
#echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




if ($erro!='') {
$erro;
}






else{

#parte de auditoria:
$LIVRO ='0';
$FOLHA = '0';
$TERMO = '0';
$ATO = '13.17.1';
$TIPOPAPEL = '0';
$NUMEROPAPEL = '0';  
$funcionario = $_SESSION['nome'];
$insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','CART_ASSINATURA','2','1','$SELO',CURRENT_TIMESTAMP,'CER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
$UPSEGURANCA = $pdo->prepare("UPDATE folhaseguranca set STATUS = 'U' WHERE EMPRESA = '$TIPOPAPEL' AND PAPEL = '$NUMEROPAPEL'");
$UPSEGURANCA->execute();  



UPDATE_CAMPO_ID('pessoa','RETORNOSELODIGITAL',strip_tags($RETORNO),$id);
$insert_auditoria->execute();


$_POST['SELO2'] = $SELO;  



}
}
}
else{
$SELO ='0';
}






#tags a usar:
# page
#style ?>
<head>

<style>

@page {
margin: 180px 50px 150px;
margin-left: 3cm;
margin-bottom: 0.5cm;
margin-right: 3cm;
margin-top: 0.3cm;

/** Define the margins of your page
margin-top: 5cm;margin-bottom: 2cm;

 margin-left: 2cm;
 margin-right: 1cm;

margin-bottom: 2cm;
**/
}
body{text-transform: uppercase;}

header { position: fixed; left: 0px; top: -174px; right: 0px; height: 150px; background-color: white; text-align: center; }
/** Extra personal styles
background-color: #03a9f4;**/

footer {
position: fixed;
bottom: -60px;
left: 0px;
right: 0px;
height: 20px;

/** Extra personal styles
background-color: #03a9f4;**/
color: black;
text-align: center;
line-height: 35px;
}
#footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 165px; background-color: white; z-index: -10}

fieldset{ 
padding: 7px;
font-size: 40%;
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
div#marca{


}
.vertical-text {
  transform: rotate(-90deg);
  transform-origin: left top 0;
    margin-left: 668px;
    margin-top: 500px;
  flex-wrap: nowrap;
  float: left;
  display: inline;
  white-space: nowrap;
}
/*
main {
border-style: solid;
border-width: 1px;
}*/
.break-before { page-break-before: always; }
  .section { margin-top: 200px; }

p {

  -webkit-margin-before:  0.350em;
  -webkit-margin-after: 0.350em;
 
  margin-bottom: 6px;
 }

  main { background: #fff;
 ; border: 1px solid #fff;
         z-index: 1;
         position: relative;

  }

.pagenum:before { content: counter(page); }

</style>
</head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<body>

	<?php
	$reimpressao_acervo = 'N';
	if ($key->RETORNOSELODIGITAL=='') {
	$retorno = json_decode($_SESSION['RETORNOTEMPPESSOAS'],true);
	$_SESSION['RETORNOTEMPPESSOAS'] = NULL;

	}
	else{
	$retorno = json_decode($key->RETORNOSELODIGITAL,true);
	}
	if (!isset($_SESSION['RETORNOTEMPPESSOAS']) && $key->RETORNOSELODIGITAL=='') {
	#echo 'NENHUM SELO FOI GERADO, REIMPRESSÃO';
	$reimpressao_acervo = 'S';
	}
	$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];
		$strSelo = strip_tags($retorno['numeroSelo']);

		?>


<header>

</header>

<footer>


</footer>
<div id="footer" style="width: 100%;text-align:center;">

</div>

<main>
<!-- TIPO PESSOA FISICA -->
	<?php if ($key->setTipoPessoa =='F'): ?>

	<!--div style="float: right;margin-left: -90px;margin-top:34px;text-align: center;position:absolute;;font-size:10px">

		<B> FICHA: <?=$id?> </B>
	</div-->
<div style="text-align: center;padding-bottom:2px; margin-left: -110px">
<fieldset style="width:14.1cm;margin-bottom: -1cm">

<div style="text-align: center">


<table style="width: 100%;text-align: center; border-collapse: collapse;" border="1" cellpadding="1">
<tbody>
<tr>
	<td style="width: 30%;">&nbsp;

		<?php if (isset($key->hiddencaminhofoto) && !empty($key->hiddencaminhofoto) && $key->hiddencaminhofoto != 'NULL'): ?>
		<div style="margin-top:-15px">
		<img style="width: 50px; height: 60px;" src="../<?=$key->hiddencaminhofoto?>"  >
		</div>
		<?php endif ?>

			<?php
 		if ($reimpressao_acervo  != 'S') :

			include_once('../../../plugins/phpqrcode/qrlib.php');

			function tirarAcentos($string){
			return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
			}
			$img_local = "qrimagens/";
			$img_nome = tirarAcentos($key->strNome).'.png';
			$nome = $img_local.$img_nome;

			$conteudo = $qr;
			QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


			echo '<img style="width:40px; margin-top:5px; " src="'.$nome.'" />';
		endif;
			?>
			<!--p style="font-weight: bold; font-size: 6px;display: inline-block;"><?=$textoselo?></p-->

	</td>

<td style="width: 80%;text-transform: uppercase;">&nbsp;


<?=strtoupper($c->strRazaoSocial)?><br>
<?=$c->strLogradouro?>, <?=$c->strNumero?> -
<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
<?php endforeach ?>
<br>
Titular da Serventia: <?=$c->strTituloServentia?><br>
Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?>



</td>
<?php 
if (!isset($_GET['reimpressao']) || $_GET['reimpressao'] == '') {
if ($key->strFicha == '0' || $key->strFicha =='NULL') {
	$busca_max = $pdo->prepare("SELECT strFicha from pessoa where strFicha!='0' ORDER BY strFicha DESC LIMIT 1");
$busca_max->execute();
$bm = $busca_max->fetch(PDO::FETCH_ASSOC);
$maximo = $bm['strFicha'];	
UPDATE_CAMPO_ID('pessoa', 'strFicha',$maximo+1, $id);
$fichanum = $maximo + 1;
}
else{
	$fichanum = $key->strFicha;
}
}
else{$fichanum='';}
 ?>

<td style="width: 10%; font-size: 60%">&nbsp;
<B> FICHA <br>

<?php if (empty($key->strFicha) && $fichanum==''){
echo 'Nº';

}
elseif ($fichanum!='') {
	echo $fichanum;
}

else {
  echo $key->strFicha;
}
?>
   </B>
<?php if ($reimpressao_acervo  != 'S') : ?>
<p style="font-size:4px">REIMPRESSÃO</p>
<?php endif;?>
</td>
</tr>
</tbody>
</table>


</div>


<fieldset style="height:2px;width: 100%;font-size:9px;text-align:left" ><legend>NOME</legend> <?=strtoupper($key->strNome)?></fieldset>

<div style=" display: inline-block;width: 105%;text-align:left">
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>NACIONALIDADE</legend> <?=strtoupper($key->strNacionalidade)?></fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:8px"><legend>NATURALIDADE</legend>

	<?php $e = PESQUISA_ALL_ID('uf_cidade',$key->strNaturalidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?> <?php endforeach ?>

</fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>ESTADO CIVIL</legend>
<?php if ($key->setEstadoCivil == 'SO') {
echo "SOLTEIRO(A)";
} elseif  ($key->setEstadoCivil == 'VI') {
echo "VÍUVO(A)";}
elseif ($key->setEstadoCivil == 'CA')  {
echo "CASADO(A)";
}elseif ($key->setEstadoCivil == 'DI')  {
echo "DIVORCIADO(A)";
}elseif ($key->setEstadoCivil == 'UN')  {
echo "UNIÃO ESTAVÉL";
}

else {
	echo "NULL";
}
?>

</fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px;position:absolute"><legend>DATA NASCIMENTO</legend> <?=strtoupper( date('d/m/Y', strtotime($key->dataNascimento)))?></fieldset>
</div>

<div style="display: inline-block;width: 105%;clear:both;text-align:left">
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>DOC/IE</legend> <?=strtoupper($key->strRG)?></fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>ORGÃO EMISSOR</legend><?=strtoupper($key->strOrgaoEm)?></fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>DATA EMISSÃO</legend><?=strtoupper($key->dataEmissao)?> </fieldset>

<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>CPF/CNPJ</legend> <?=strtoupper($key->strCPFcnpj)?></fieldset>
</div>

<div style="display: inline-block;width: 105%;clear:both;text-align:left">
<fieldset style="height:2px;width: 67.6%; display: inline-block;font-size:9px"><legend>ENDEREÇO</legend> <?=strtoupper($key->strLogradouro)?> - <?=strtoupper($key->strBairro)?></fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:8px"><legend>CIDADE</legend><div style="margin-top:-3px;">
	<?php $e = PESQUISA_ALL_ID('uf_cidade',$key->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?> <?php endforeach ?>
</div>

</fieldset>

</div>

<div style="display: inline-block;width: 105%;clear:both;text-align:left">
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>PROFISSÃO</legend> <?=strtoupper($key->strProfissao)?></fieldset>
<fieldset style="height:2px;width: 67.6%; display: inline-block;font-size:9px"><legend>FILIAÇÃO</legend><?=strtoupper($key->strNomePai)?> ; <?=strtoupper($key->strNomeMae)?></fieldset>
</div>

<div style="display: inline-block;width: 105%;clear:both;text-align:left">
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>Regime</legend>
<?php if ($key->setRegimeBens == 'CP') {
echo "Comunhão Parcial de Bens";
}
elseif ($key->setRegimeBens == 'CU') {
  echo "Comunhão Universal de Bens";
}
elseif ($key->setRegimeBens == 'PF') {
  echo "Participação Final nos Aqüestos";
}elseif ($key->setRegimeBens == 'SB') {
  echo "Separação de Bens";
}else {
  echo "";
}

?>

</fieldset>
<fieldset style="height:2px;width: 67.6%; display: inline-block;font-size:9px"><legend>Conjuge</legend>

<?php if ($key->strNomeConjuge!='NULL'): ?>
	<?=strtoupper($key->strNomeConjuge)?>
<?php endif ?>

	</fieldset>
</div>

<div style="display: inline-block;width: 105%;clear:both;text-align:left">
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>DATA</legend> <?=strtoupper( date('d/m/Y', strtotime($key->dataCadastro)))?></fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>TEL FIXO</legend> <?=strtoupper($key->strTelefone)?></fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>TEL CEL.</legend> <?=strtoupper($key->strTelCelular)?></fieldset>
</div>

<br><br>
<fieldset style="height:9px;width: 100%;font-size:9px;text-align:left; border: none" ><legend>ASSINATURA 1</legend><hr></fieldset>
<br>
<fieldset style="height:9px;width: 100%;font-size:9px;text-align:left; border: none" ><legend>ASSINATURA 2</legend><hr></fieldset>
<br>
<fieldset style="height:9px;width: 100%;font-size:9px;text-align:left;border:none" ><legend>ASSINATURA 3 OU RUBRICA</legend><hr></fieldset>

<p style="margin-left: -60%; font-size: 60%;padding-top:2px">SELO: <?=strtoupper($strSelo)?></p>
<p style="margin-left: 40%; margin-top: -30px;font-size: 60%;padding-top:4px">
  <?=mb_convert_case($_SESSION['nome'], MB_CASE_UPPER, "UTF-8")?> _______________________________</p>
<p>

</div>
<br>
</fieldset>


<!--  FECHA TIPO PESSOA FISICA -->
<?php endif; ?>

<!-- TIPO PESSOA JURDICA -->
<?php if ($key->setTipoPessoa =='J'): ?>

	<div style="text-align: center;padding-bottom:2px;margin-left: -110px;">
	<fieldset style="width:14.1cm;">

	<div style="text-align: center">


	<table style="width: 100%;text-align: center; border-collapse: collapse;" border="1" cellpadding="1">
	<tbody>
	<tr>
		<td style="width: 10%;">&nbsp;


	<?php

			include_once('../../../plugins/phpqrcode/qrlib.php');

			function tirarAcentos($string){
			return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
			}
			$img_local = "qrimagens/";
			$img_nome = tirarAcentos($key->strNome).'.png';
			$nome = $img_local.$img_nome;

			$conteudo = $qr;
			QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


			echo '<img style="width:40px; margin-top:5px; " src="'.$nome.'" />';
			?>
		</td>

	<td style="width: 80%;">&nbsp;


	<?=$c->strRazaoSocial?><br>
	<?=$c->strLogradouro?>, <?=$c->strNumero?> -
	<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
	<?php endforeach ?>
	<br>
	Titular da Serventia: <?=$c->strTituloServentia?><br>
	Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?>



	</td>
	<td style="width: 10%;">&nbsp;
	<B> FICHA <br><?=$id?> </B>


	</td>
	</tr>
	</tbody>
	</table>


	</div>


	<fieldset style="height:2px;width: 100%;font-size:9px;text-align:left" ><legend>RAZÃO SOCIAL</legend> <?=strtoupper($key->strRazaoSocial)?></fieldset>

	<div style=" display: inline-block;width: 105%;text-align:left">
	<fieldset style="height:2px;width: 43.8%; display: inline-block;font-size:9px"><legend>CNPJ</legend> <?=strtoupper($key->strCPFcnpj)?> </fieldset>
	<fieldset style="height:2px;width: 43.8%; display: inline-block;font-size:9px;position:absolute"><legend>TELEFONE</legend> <?=strtoupper($key->strTelefone)?></fieldset>
	</div>


	<div style=" display: inline-block;width: 105%;text-align:left;clear:both;">
	<fieldset style="height:2px;width: 43.8%; display: inline-block;font-size:9px"><legend>1° REPRESENTANTE</legend><?=strtoupper($key->strRepresentante1)?></fieldset>
	<fieldset style="height:2px;width: 43.8%; display: inline-block;font-size:9px;position:absolute"><legend>2° REPRESENTANTE</legend><?=strtoupper($key->strRepresentante2)?></fieldset>
	</div>


	<div style=" display: inline-block;width: 105%;text-align:left;clear:both;">
	<fieldset style="height:2px;width: 43.8%; display: inline-block;font-size:9px"><legend>3° REPRESENTANTE</legend><?=strtoupper($key->strRepresentante3)?></fieldset>
	<fieldset style="height:2px;width: 43.8%; display: inline-block;font-size:9px;position:absolute"><legend>DATA ABERTURA</legend> <?=strtoupper(date('d/m/Y - H:i:s',strtotime($key->dataCadastro)))?></fieldset>
	</div>

	<fieldset style="height:2px;width: 100%;font-size:9px;text-align:left" ><legend>ASSINATURA 1</legend></fieldset>

	<fieldset style="height:2px;width: 100%;font-size:9px;text-align:left" ><legend>ASSINATURA 2</legend></fieldset>

	<fieldset style="height:2px;width: 100%;font-size:9px;text-align:left" ><legend>ASSINATURA 3 OU RUBRICA</legend></fieldset>

	<p style="margin-left: 59%; font-size: 60%;padding-top:2px">
	___________________________________________
	</p>
	 <p style="margin-left: -60%; font-size: 60%;padding-top:2px">SELO: <?=strtoupper($strSelo)?></p>
	<p style="margin-left: 65%; margin-top: -30px;font-size: 60%;padding-top:4px">
	<br>
	  <?=mb_convert_case($_SESSION['nome'], MB_CASE_UPPER, "UTF-8")?></p>
	<p>

	</div>
	</fieldset>
<?php endif; ?>
</main>

</body>
<?php endforeach ?>
<?php endforeach ?>



</html>
