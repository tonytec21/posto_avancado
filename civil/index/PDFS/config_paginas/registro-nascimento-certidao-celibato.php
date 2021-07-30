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

function idade_civil_antigo($nascimento,$dataregistro){
  $data = explode("-",$nascimento);
  $registro = explode("-",$dataregistro);

  $ano = $data[0];
  $mes = $data[1];
  $dia = $data[2];

  $ano1 = $registro[0];
  $mes1 = $registro[1];
  $dia1 = $registro[2];



    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime( 0, 0, 0, $mes1, $dia1, $ano1);
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

    // Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

    return $idade;

}
function dataum($data){
$dataAno = $data;
if (substr($dataAno, -2) == '11') {
echo GExtenso::numero($dataAno)." onze";
}
elseif (substr($dataAno, -1) == '1') {
echo GExtenso::numero($dataAno)." um";
}
else {
  echo GExtenso::numero($dataAno);
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

body{font-size: 15px;font-family: "Arial"; padding: 4.5cm 1cm 2cm 1cm;}
</style>
</head>

<body>
<?php ?>
      
      <h2 style="text-align: center;">CERTIDÃO DE <span style="border: 1px solid black"><span style="color: #fff">.</span>CELIBATO<span style="color: #fff">.</span></h2></span>
      <p style="text-align: center;font-size: 15px;font-family: Arial">
      <div style="text-align: center;font-size: 12px;font-family: Arial">NOME: <div style="text-align: center;font-size: 18px;font-family: Arial"><b><?=$r->NOMENASCIDO?></b></p>
      <div style="text-align: center;font-size: 12px;font-family: Arial">MATRÍCULA <div style="text-align: center;font-size: 15px;font-family: Arial"><b><?=$r->MATRICULA?></b></div></div>
      <div style="margin-left: 2px;font-size: 11px;font-family:Arial;">DESCRIÇÃO:</div>
      <fieldset style="max-width: 100%">

      <!-- CABEÇALHO -->
      <div style="text-align: justify;">
      Certifico que revendo os livros de Nascimento, deste ofício, requerido verbalmente por parte interessada,
      encontrei no livro A <?=$r->LIVRONASCIMENTO?>, folha <?=$r->FOLHANASCIMENTO?>, sob o número
      <?=$r->TERMONASCIMENTO?>, o assento de nascimento de   <b><?=mb_convert_case($r->NOMENASCIDO, MB_CASE_UPPER, "UTF-8")?></b>, <?php if ($r->SEXONASCIDO == 'M'): ?>
      	nascido
      	<?php else: ?>
      		nascida
      <?php endif ?> 
      em 
       <!-- Data de Nascimento  -->
			<?php if ($r->DATANASCIMENTO!='' && !empty($r->DATANASCIMENTO)): ?>
			<?php  if (!empty($r->DATANASCIMENTO) && $r->DATANASCIMENTO != '0000-00-00'  || $r->DATANASCIMENTO != NULL  && $r->DATANASCIMENTO != '0000-00-00'  ) :?>
			<?php
			$data = $r->DATANASCIMENTO ;
			$novaDataRegistro = explode("-", $data);
			if ($novaDataRegistro[2] == 1 || $novaDataRegistro[2] == 01 ) {
				echo "primeiro";
			}
			elseif ($novaDataRegistro[2] == '2' || $novaDataRegistro[2] == '02' ) {
				echo "dois";
			}
			elseif ($novaDataRegistro[2] == '3' || $novaDataRegistro[2] == '03' ) {
				echo "três";
			}
			elseif ($novaDataRegistro[2] == '4' || $novaDataRegistro[2] == '04' ) {
				echo "quatro";
			}
			elseif ($novaDataRegistro[2] == '5' || $novaDataRegistro[2] == '05' ) {
				echo "cinco";
			}
			elseif ($novaDataRegistro[2] == '6' || $novaDataRegistro[2] == '06' ) {
				echo "seis";
			}
			elseif ($novaDataRegistro[2] == '7' || $novaDataRegistro[2] == '07' ) {
				echo "sete";
			}
			elseif ($novaDataRegistro[2] == '8' || $novaDataRegistro[2] == '08' ) {
				echo "oito";
			}
			elseif ($novaDataRegistro[2] == '9' || $novaDataRegistro[2] == '09' ) {
				echo "nove";
			}

			else{
			echo dataum($novaDataRegistro[2]);
			}

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

			$dataAno = $novaDataRegistro[0];
			if (substr($dataAno, -2) == '11') {
			echo GExtenso::numero($dataAno)." onze";
			}
			elseif (substr($dataAno, -1) == '1') {
			echo GExtenso::numero($dataAno)." um";
			}
			else {
			echo GExtenso::numero($dataAno);
			} 
			endif;?>
			(<?=date('d/m/Y',strtotime($r->DATANASCIMENTO))?>),
			<?php endif ?>
			<!-- Naturalidade do Registrado -->
			<?php if (isset($r->NATURALIDADENASCIDO) && !empty($r->NATURALIDADENASCIDO)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENASCIDO)); foreach($c as $c):?>
			<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
			<?php endif; ?>
			filho de 
			<?php if (!empty($r->NOMEPAI)): ?>
				<?=mb_strtoupper($r->NOMEPAI)?> e 
			<?php endif ?>
			<?=mb_strtoupper($r->NOMEMAE)?>. Nada consta a margem do assento que <?php if ($r->SEXONASCIDO == 'M'): ?>
      	o (a) mesmo (a)
      	<?php else: ?>
      	o (a) mesmo (a)
      <?php endif ?> 
     tenha contraído matrimônio até a presente data.



      <!-- Final -->
      Eu, <?=mb_strtoupper($_SESSION['nome'])?>, <?=mb_strtoupper($_SESSION['funcao'])?>,
      do Registro Civil das Pessoas Naturais, dou fé e assino. 
      Selo de fiscalização:
      <?=$SELO?>

</fieldset>

<div style="font-size: 8px;text-align:center">Válido somente com selo de autenticidade.</div>
        
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
			    <?=mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
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
          <?=strtoupper($_SESSION['nome'])?><br>
          <?=$_SESSION['funcao']?>
        </div>


<div style="position: absolute;width: 50px; margin-left: -20px;width: 200px; margin-top: 100px;"> 
<?php

  include_once('../../../plugins/phpqrcode/qrlib.php');
  
function tirarAcentos($string){
		return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(ý)/","/(Ý)/"),explode(" ","a A e E i I o O u U n N C c y Y"),$string);
		}
  $img_local = "qrimagens/";
  $img_nome = tirarAcentos($r->ID.'_'.$r->NOMENASCIDO).'INTTEORNAS.png';
  $nome = $img_local.$img_nome;

    $conteudo = $qr;
    QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


    echo '<img style="max-width:30%; margin-top:-18px;margin-left:15px;" src="'.$nome.'" />';
    ?>


        <!-- TEXTO DO SELO -->
        <p style="font-weight:bold;
                  text-align:justify;
                  font-size:8px;
                  margin-top:-60px;
                  width:90%;
                  margin-left:80px;">
        <?=caracteres_selador($textoselo)?>
        </p>
  </main>
</div>


 <?php if (isset($_GET['selobusca']) && $_GET['selobusca']!=''): ?>





<div style="position: absolute;width: 50px; margin-left: 200px;width: 200px; margin-top: 100px;"> 
<?php

  include_once('../../../plugins/phpqrcode/qrlib.php');
  

  $img_local = "qrimagens/";
  $img_nome = tirarAcentos($r->ID.'_'.$r->NOMENASCIDO).'INTTEORNASBUSCA.png';
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
<!--p style= "width: 100%; font-size: 10px;border-bottom: -100px;  text-align:justify;">Emolumentos Acrescidos, FEMP (4%),  FADESP (4%), Conforme Leis Complementares nº 221/2019 e 222/2019.</p-->
<?php endif ?>  

</body>
</html>
