<!DOCTYPE html>
<?php 

if ($_GET['tipo_busca'] == 'CA') {
$livro = 'CASAMENTOS';
}
if ($_GET['tipo_busca'] == 'NA') {
$livro = 'NASCIMENTOS';
}
if ($_GET['tipo_busca'] == 'OB') {
$livro = 'ÓBITOS';
}


$nome = $_GET['nome_certidao'];
$cpf = $_GET['cpf_certidao'];
if (isset($_GET['qualificacao_certidao'])) {
$quanficacao = $_GET['qualificacao_certidao'];
}
else{
$quanficacao ='';
}
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
	font-size: 100%;
}
.right{
	float: right;
	font-size: 100%;
	text-align: center;
}
body{ font-size: 10px;font-family: "Arial"; padding: 4cm 1cm 2cm 1cm;}
</style>
</head>

<body>
	



<h3 style="display: inline-block;margin-left: 35%"><span>CERTIDÃO </span>	<span style="text-align: center;width: 20%; display: inline;border:1px solid black; padding: 10px;padding-right:50px;"><b>NEGATIVA</b></span></h3><br>

<br><br>
<fieldset style="max-width: 100%;">
<p style="text-align: justify;font-size: 16px; ">
<span style="margin-left: 2cm">	
Eu, <?=mb_strtoupper($_SESSION['nome'])?>,

<?php 
$s = PESQUISA_ALL('cadastroserventia'); foreach ($s as $s):?>

<!--?=$s->strTituloServentia?--> <?=$_SESSION['funcao']?>, desta cidade de 
<?php  
$g = PESQUISA_ALL_ID('uf_cidade', $s->intUFcidade);
foreach ($g as $g):?>
<?=$g->cidade.'/'.$g->uf?>
<?php endforeach ?>,

<?php endforeach ?>
 por nomeação legal na forma da lei, 8.935/94
CERTIFICO, autorizado por lei e a requerimento verbal de pessoa
interessada e para que produza seus devidos e legais efeitos, que dando buscas
nos livros de registro de <?=$livro?> a cargo desta serventia, verifiquei não
figurar registro em nome de <?=strtoupper($nome)?>, <?=$quanficacao?>, CPF de número <?=strtoupper($cpf)?>.<br>
O referido é verdade dou fé.  

</fieldset>
<br><br>
<div class="left">
<?php $serv = PESQUISA_ALL('cadastroserventia');
foreach ($serv as $serv): ?>  

  <?=$serv->strRazaoSocial?>  <br>
  <?=$serv->strTituloServentia?> <br>
  <?php $c = PESQUISA_ALL_ID('uf_cidade',$serv->intUFcidade); foreach ($c as $c) {
  echo $c->cidade.'/'.$c->uf;
  } ?><br>
  <?=$serv->strLogradouro.' Nº '.$serv->strNumero?><br>
    <?=$serv->strTelefone1?><br>
    <?=$serv->strEmail?>
<?php endforeach ?> 
</div>

<div class="right">
  O conteúdo da certidão é verdadeiro Dou Fé <br>
  
          <?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
          $u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
          foreach ($u as $u):?> 

          <?=$u->cidade?>/<?=$u->uf?>

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
          <?php endforeach; endforeach ?>
           <br><br>
  _______________________________________ <br>
  <?=strtoupper($_SESSION['nome'])?><br>
  <?=$_SESSION['funcao']?>
</div>



<div style="position: absolute;width: 50px; margin-left: 0px;width: 200px; margin-top: 100px;"> 
<?php

	include_once('../../../plugins/phpqrcode/qrlib.php');
	
	  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($id).'.png';
	$nome1 = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome1, QR_ECLEVEL_H , 3);


		echo '<img style="max-width:50%; margin-top:-15px;margin-left:10px;" src="'.$nome1.'" />';
		?>

	<p style="font-weight: bold; font-size: 5px;margin-top: -90px;width: 50%; margin-left:110px;"><?=$textoselo?></p>

</div>

 <?php if (isset($_GET['selobusca']) && $_GET['selobusca']!=''): ?>





<div style="position: absolute;width: 50px; margin-left: 200px;width: 200px; margin-top: 100px;"> 
<?php

  include_once('../../../plugins/phpqrcode/qrlib.php');
  


  $img_local = "qrimagens/";
  $img_nome = tirarAcentos($id).'buscacerneg.png';
  $nome = $img_local.$img_nome;

    $conteudo = $qrbusca;
    QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


    echo '<img style="max-width:50%; margin-top:-15px;margin-left:10px;" src="'.$nome.'" />';
    ?>

  <p style="font-weight: bold; font-size: 5px;margin-top: -90px;width: 50%; margin-left:110px;"><?=$textoselobusca?></p>
</div>

  
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
<!--p style= "width: 100%; font-size: 10px;border-bottom: -100px;  text-align:justify;">*Emolumentos Acrescidos, FEMP (4%),  FADESP (4%), Conforme Leis Complementares nº 221/2019 e 222/2019.* </p-->
<?php endif ?>  

</body>

</html>
