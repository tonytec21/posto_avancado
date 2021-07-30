<!DOCTYPE html>
<?php 
#registro-nascimento-inteiro-teor
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
echo GExtenso::numero($dataAno)." ";
}
elseif (substr($dataAno, -1) == '1') {
echo GExtenso::numero($dataAno)." um";
}
else {
  echo GExtenso::numero($dataAno);
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
@media print{
	#container_teor{
		zoom:85%;
	}
}
body{font-size: 15px;font-family: "Arial"; padding: 4.5cm 1cm 2cm 1cm;
<?php if (isset($_GET['naoofc'])): ?>
	background: url("../../../images/preview.jpg");
<?php endif ?>}
</style>
</head>

<body>
<?php ?>
      
      <h2 style="text-align: center;">CERTIDÃO DE <span style="border: 1px solid black"><span style="color: #fff">.</span>INTEIRO TEOR<span style="color: #fff">.</span></h2></span>
      <p style="text-align: center;font-size: 15px;font-family: Arial">
      <div style="text-align: center;font-size: 12px;font-family: Arial">NOME: <div style="text-align: center;font-size: 18px;font-family: Arial"><b><?=$r->NOMENASCIDO?></b></p>
      <div style="text-align: center;font-size: 12px;font-family: Arial">MATRÍCULA <div style="text-align: center;font-size: 15px;font-family: Arial"><b><?=$r->MATRICULA?></b></div></div>
      <div style="margin-left: 2px;font-size: 11px;font-family:Arial;">DESCRIÇÃO:</div>
      <fieldset style="max-width: 100%" id="container_teor">

      <!-- CABEÇALHO -->
      <div style="text-align: justify;">
      Certifico que revendo os livros de Nascimento, deste ofício, requerido verbalmente por parte interessada,
      encontrei no livro A <?=$r->LIVRONASCIMENTO?>, folha <?=$r->FOLHANASCIMENTO?>, sob o número
      <?=$r->TERMONASCIMENTO?>, o registro cujo teor segue: 
      
      <?php 
		$busca_registro_add = $pdo->prepare("SELECT * from info_registros_civil where id_registro_nascimento = '$id'");
		$busca_registro_add->execute();
		if ($busca_registro_add->rowCount()>0) :
		$bra = $busca_registro_add->fetchAll(PDO::FETCH_OBJ);
		foreach ($bra as $b) {
			echo addslashes($b->inteiro_teor);
		}
		
		
		else:

       ?>

      <?php if ($r->TIPOASSENTO != 'ORDEM'): ?> 
      <!--REGISTRO NASCIMENTO LIVRO BASICO --> 

      ao(s)   
   
      <!-- DATA ENTRADA -->
      <?php  if (!empty($r->DATAENTRADA) && $r->DATAENTRADA != '0000-00-00'  || $r->DATAENTRADA != NULL  && $r->DATAENTRADA != '0000-00-00'  ) :?>

      <?php
      $data = $r->DATAENTRADA ;
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
        echo " de outubro de ";
      } elseif ($novaDataRegistro[1] == '11') {
        echo " de novembro de ";
      } elseif ($novaDataRegistro[1] == '12') {
        echo " de dezembro de ";
      } else {
        echo "Não definido";
      }


      $dataAno = $novaDataRegistro[0];
      if (substr($dataAno, -2) == '11') {
      echo GExtenso::numero($dataAno)." ";
      }
      elseif (substr($dataAno, -1) == '1') {
      echo GExtenso::numero($dataAno)." um";
      }
      else {
        echo GExtenso::numero($dataAno);
      }

      endif;?>

      (<?=date('d/m/Y',strtotime($r->DATAENTRADA))?>), 
      
      <!-- Cartório -->
      neste(a)
	    <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?>
			<?=mb_convert_case($w->strRazaoSocial, MB_CASE_TITLE, "UTF-8")?> Estado do Maranhão, <?php endforeach ?>
 
      <!-- TIPOS DE DECLARANTES -->
      
      <!-- DECLARANTE PAI -->
      <?php if ($r->QUALIDADEDECLARANTE =='PAI'): ?>
      compareceu <?=mb_strtoupper($r->NOMEPAI)?>, na qualidade de PAI, abaixo qualificado, apresentando a DNV nº 
      <b><?=$r->DNV?></b>, e declarou que no dia 

      <!-- DECLARANTE MÃE -->
      <?php elseif ($r->QUALIDADEDECLARANTE =='MAE'): ?>
      compareceu <?=mb_strtoupper($r->NOMEMAE)?>, na qualidade de MÃE, abaixo qualificada, apresentando a DNV nº
      <b><?=$r->DNV?></b>, e declarou que no dia
      <?php elseif ($r->QUALIDADEDECLARANTE =='AMBOSPAI'): ?>
      compareceram os pais do(a) registrado(a), apresentando a DNV nº <b> <?=$r->DNV?></b>, e declararam que no dia

      <!-- DECLARANTE OUTROS -->
      <?php else : ?>
      compareceu  

			<!-- Declarante -->
			<?php if (isset($r->NOMEDECLARANTE) && !empty($r->NOMEDECLARANTE)): ?>
			<?=mb_strtoupper($r->NOMEDECLARANTE)?>,
			<?php endif; ?> 

			<!-- Nacionalidade -->
			<?php if (isset($r->NACIONALIDADEDECLARANTE) && !empty($r->NACIONALIDADEDECLARANTE)): ?>
			<?=strtolower($r->NACIONALIDADEDECLARANTE)?>,
			<?php endif; ?> 

			<!-- Estado Civil -->
			<?php if (isset($r->ESTADOCIVILDECLARANTE) && !empty($r->ESTADOCIVILDECLARANTE)): ?>
			<?php if ($r->ESTADOCIVILDECLARANTE == "CA")
			echo "casado(a)";
			elseif ($r->ESTADOCIVILDECLARANTE == "SO") {
			echo "solteiro(a)";
			}elseif ($r->ESTADOCIVILDECLARANTE == "DI") {
			echo "divorciado(a)";
			}elseif ($r->ESTADOCIVILDECLARANTE == "UN") {
			echo "em união estável";
			}elseif ($r->ESTADOCIVILDECLARANTE == "SJ") {
			echo "separado(a) judicialmente";
			}elseif ($r->ESTADOCIVILDECLARANTE == "VI") {
			echo "viúvo(a)";
			} ?>,
			<?php endif; ?> 

			<!-- Profissão -->
			<?php if (isset($r->PROFISSAODECLARANTE) && !empty($r->PROFISSAODECLARANTE)): ?>
			<?=mb_strtolower($r->PROFISSAODECLARANTE)?>,
			<?php endif; ?> 

			<!-- Naturalidade -->
			<?php if (isset($r->NATURALIDADEDECLARANTE) && !empty($r->NATURALIDADEDECLARANTE)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEDECLARANTE)); foreach($c as $c):?>
			<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
			<?php endif; ?>
		
			<!-- Data de Nascimento -->
			<?php if ($r->DATANASCIMENTODECLARANTE!='' && !empty($r->DATANASCIMENTODECLARANTE)): ?>
			<?="nascido(a) em "?>
			<?php  if (!empty($r->DATANASCIMENTODECLARANTE) && $r->DATANASCIMENTODECLARANTE != '0000-00-00'  || $r->DATANASCIMENTODECLARANTE != NULL  && $r->DATANASCIMENTODECLARANTE != '0000-00-00'  ) :?>
			<?php
			$data = $r->DATANASCIMENTODECLARANTE ;
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
			echo GExtenso::numero($dataAno)." ";
			}
			elseif (substr($dataAno, -1) == '1') {
			echo GExtenso::numero($dataAno)." um";
			}
			else {
			echo GExtenso::numero($dataAno);
			} 
			endif;?>
			(<?=date('d/m/Y',strtotime($r->DATANASCIMENTODECLARANTE))?>),
			<?php endif; ?>

			<!-- RG -->
			<?php if (isset($r->RGDECLARANTE) && !empty($r->RGDECLARANTE)): ?>
			<?="portador(a) do RG ".$r->RGDECLARANTE?> <?=$r->ORGAOEMISSORDECLARANTE?>,
			<?php endif; ?>

			<!-- CPF -->
			<?php if (isset($r->CPFDECLARANTE) && !empty($r->CPFDECLARANTE)): ?>
			<?=" CPF nº ".$r->CPFDECLARANTE?>,
			<?php endif; ?>

			<!-- Endereço do Declarante -->
      <?php if ($r->ENDERECODECLARANTE!='' || $r->BAIRRODECLARANTE!='' || $r->CIDADEDECLARANTE!=''): ?>
      residente e domiciliado(a)
      <?php endif; ?>

			<?php if (isset($r->ENDERECODECLARANTE) && !empty(mb_convert_case($r->ENDERECODECLARANTE, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="à ".mb_convert_case($r->ENDERECODECLARANTE, MB_CASE_TITLE, "UTF-8")?>,
			<?php endif; ?>

      <?php if (isset($r->BAIRRODECLARANTE) && !empty(mb_convert_case($r->BAIRRODECLARANTE, MB_CASE_TITLE, "UTF-8"))): ?>
      <!-- Condição Endereço -->
      <?php if (isset($r->ENDERECODECLARANTE) && !empty($r->ENDERECODECLARANTE)): ?>
      <?php else: ?>  
      no bairro
      <?php endif ?>
      <?=mb_convert_case($r->BAIRRODECLARANTE, MB_CASE_TITLE, "UTF-8")?>, 
      <?php endif; ?>

      <?php if (isset($r->CIDADEDECLARANTE) && !empty(mb_convert_case($r->CIDADEDECLARANTE, MB_CASE_TITLE, "UTF-8"))): ?>
      <!-- Condição Cidade -->
      <?php if (isset($r->BAIRRODECLARANTE) && !empty($r->BAIRRODECLARANTE)): ?>
      
      <?php else: ?>  
      na cidade de
      <?php endif ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEDECLARANTE)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
			<?php endforeach ?>
			<?php endif; ?>

      <!-- RG -->
			<?php if (isset($r->DNV) && !empty($r->DNV)): ?>
      apresentando a DNV nº
      <b><?=$r->DNV?></b>,
			<?php endif; ?>
      
      e declarou que no dia
      <?php endif ?>

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
			echo GExtenso::numero($dataAno)." ";
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

      <!-- Hora do Nascimento -->
			<?php if ($r->HORANASCIMENTO!='' && !empty($r->HORANASCIMENTO)): ?>
			<?="às ".$r->HORANASCIMENTO." horas"?>,
			<?php endif ?>
      
      <!-- Local do Nascimento -->
			<?php if ($r->LOCALNASCIMENTO!='' && !empty($r->LOCALNASCIMENTO)): ?>
			<?="no(a) ".mb_convert_case($r->LOCALNASCIMENTO, MB_CASE_TITLE, "UTF-8")?>,
			<?php endif ?>

			<!-- Endereço de Nascimento -->
      <?php if ($r->ENDERECOLOCALNASCIMENTO!='' || $r->CIDADENASCIMENTO!=''): ?>
      situado
      <?php endif; ?>

			<?php if (isset($r->ENDERECOLOCALNASCIMENTO) && !empty(mb_convert_case($r->ENDERECOLOCALNASCIMENTO, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="à ".mb_convert_case($r->ENDERECOLOCALNASCIMENTO, MB_CASE_TITLE, "UTF-8")?>,
			<?php endif; ?>

      <?php if (isset($r->CIDADENASCIMENTO) && !empty(mb_convert_case($r->CIDADENASCIMENTO, MB_CASE_TITLE, "UTF-8"))): ?>
      <!-- Condição Cidade -->
      <?php if (isset($r->ENDERECOLOCALNASCIMENTO) && !empty($r->ENDERECOLOCALNASCIMENTO)): ?>
      
      <?php else: ?>  
      na cidade de
      <?php endif ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENASCIMENTO)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
			<?php endforeach ?>
			<?php endif; ?>
      
      nasceu uma criança  
      
      <!-- Sexo do Registrado -->
			<?php if ($r->SEXONASCIDO!='' && !empty($r->SEXONASCIDO)): ?>
			<?php if ($r->SEXONASCIDO == 'M'):?> do sexo masculino, <?php else: ?> do sexo feminino, <?php endif ?>
			<?php endif ?>
      
      <!-- CPF do Registrado -->
			<?php if (isset($r->CPFNASCIDO) && !empty($r->CPFNASCIDO)): ?>
			<?="com CPF nº ".$r->CPFNASCIDO?>,
			<?php endif; ?>

      <!-- Naturalidade do Registrado -->
			<?php if (isset($r->NATURALIDADENASCIDO) && !empty($r->NATURALIDADENASCIDO)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENASCIDO)); foreach($c as $c):?>
			<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
			<?php endif; ?>
      
       
      que recebeu o nome de:
      <b><?=mb_convert_case($r->NOMENASCIDO, MB_CASE_UPPER, "UTF-8")?></b>,
  
      filho(a) de

			<!-- Qualificação da Mãe do Registrado -->	
			<?php if ($r->NOMEPAI!='NULL' && $r->NOMEPAI!=''):?>
      
      <?php if ($r->NACIONALIDADEPAI!='' || $r->SEXOPAI!='' || $r->ESTADOCIVILPAI!='' || $r->PROFISSAOPAI!='' || $r->NATURALIDADEPAI!='' || $r->DATANASCIMENTOPAI!='' || $r->RGPAI!='' || $r->CPFPAI!='' || $r->ENDERECOPAI!='' || $r->BAIRROPAI!='' || $r->CIDADEPAI!=''): ?>
      <strong><?=mb_strtoupper($r->NOMEPAI)?></strong>,
      <?php else: ?>            
      <strong><?=mb_strtoupper($r->NOMEPAI)?></strong>
      <?php endif; ?>

			<!-- Nacionalidade do Pai do Registrado -->
			<?php if ($r->NACIONALIDADEPAI!='' && !empty($r->NACIONALIDADEPAI)): ?>
			<?=mb_strtolower($r->NACIONALIDADEPAI)?>,
      <?php endif; ?>

      <!-- Sexo do Pai do Registrado -->
			<?php if ($r->SEXOPAI!='' && !empty($r->SEXOPAI)): ?>
			<?php if ($r->SEXOPAI == 'M'):?>do sexo masculino, <?php else: ?>do sexo feminino, <?php endif ?>
			<?php endif ?>
			
			<!-- Estado Civil do Pai do Registrado -->
			<?php if (isset($r->ESTADOCIVILPAI) && !empty($r->ESTADOCIVILPAI)): ?>
			<?php if ($r->ESTADOCIVILPAI == "CA")
			echo "casado(a)";
			elseif ($r->ESTADOCIVILPAI == "SO") {
			echo "solteiro(a)";
			}elseif ($r->ESTADOCIVILPAI == "DI") {
			echo "divorciado(a)";
			}elseif ($r->ESTADOCIVILPAI == "UN") {
			echo "em união estável";
			}elseif ($r->ESTADOCIVILPAI == "SJ") {
			echo "separado(a) judicialmente";
			}elseif ($r->ESTADOCIVILPAI == "VI") {
			echo "viúvo(a)";
			} ?>,
			<?php endif; ?> 

			<!-- Profissão do Pai do Registrado -->
			<?php if (isset($r->PROFISSAOPAI) && !empty($r->PROFISSAOPAI)): ?>
			<?=mb_strtolower($r->PROFISSAOPAI)?>,
			<?php endif; ?> 

			<!-- Naturalidade do Pai do Registrado -->
			<?php if (isset($r->NATURALIDADEPAI) && !empty($r->NATURALIDADEPAI)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAI)); foreach($c as $c):?>
			<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
			<?php endif; ?>

			<!-- Data de Nascimento do Pai do Registrado-->
			<?php if ($r->DATANASCIMENTOPAI!='' && !empty($r->DATANASCIMENTOPAI)): ?>
			<?="nascido(a) em "?>
			<?php  if (!empty($r->DATANASCIMENTOPAI) && $r->DATANASCIMENTOPAI != '0000-00-00'  || $r->DATANASCIMENTOPAI != NULL  && $r->DATANASCIMENTOPAI != '0000-00-00'  ) :?>
			<?php
			$data = $r->DATANASCIMENTOPAI ;
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
			echo GExtenso::numero($dataAno)." ";
			}
			elseif (substr($dataAno, -1) == '1') {
			echo GExtenso::numero($dataAno)." um";
			}
			else {
			echo GExtenso::numero($dataAno);
			} 
			endif;?>
			(<?=date('d/m/Y',strtotime($r->DATANASCIMENTOPAI))?>),
			<?php endif; ?>

			<!-- Idade do Pai do Registrado -->			
			<?php if ($r->DATANASCIMENTOPAI!=''): ?>
			<?="com ".idade_civil_antigo($r->DATANASCIMENTOPAI,$r->DATANASCIMENTO)." anos de idade"?>,
			<?php endif ?>

			<!-- RG do Pai do Registrado -->
			<?php if (isset($r->RGPAI) && !empty($r->RGPAI)): ?>
			<?="portador(a) do RG ".$r->RGPAI?> <?=$r->ORGAOEMISSORPAI?>,
			<?php endif; ?>

			<!-- CPF do Pai do Registrado -->
			<?php if (isset($r->CPFPAI) && !empty($r->CPFPAI)): ?>
			<?=" CPF nº ".$r->CPFPAI?>,
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

			e de
			<?php endif; ?>
			
			<!-- Qualificação da Mãe do Registrado -->	
			<?php if ($r->NOMEMAE!='' && !empty($r->NOMEMAE)): ?>
      
        <?php if ($r->NACIONALIDADEMAE!='' || $r->SEXOMAE!='' || $r->ESTADOCIVILMAE!='' || $r->PROFISSAOMAE!='' || $r->NATURALIDADEMAE!='' || $r->DATANASCIMENTOMAE!='' || $r->RGMAE!='' || $r->CPFMAE!='' || $r->ENDERECOMAE!='' || $r->BAIRROMAE!='' || $r->CIDADEMAE!=''): ?>
        <strong><?=mb_strtoupper($r->NOMEMAE)?></strong>,
        <?php else: ?>            
        <strong><?=mb_strtoupper($r->NOMEMAE)?></strong>
        <?php endif; ?>
      
      <?php endif; ?>

			<!-- Nacionalidade da Mãe do Registrado -->
			<?php if ($r->NACIONALIDADEMAE!='' && !empty($r->NACIONALIDADEMAE)): ?>
			<?=mb_strtolower($r->NACIONALIDADEMAE)?>,
			<?php endif; ?>

      <!-- Sexo da Mãe do Registrado -->
			<?php if ($r->SEXOMAE!='' && !empty($r->SEXOMAE)): ?>
			<?php if ($r->SEXOMAE == 'M'):?>do sexo masculino, <?php else: ?>do sexo feminino, <?php endif ?>
			<?php endif ?>
      			
			<!-- Estado Civil da Mãe do Registrado -->
			<?php if (isset($r->ESTADOCIVILMAE) && !empty($r->ESTADOCIVILMAE)): ?>
			<?php if ($r->ESTADOCIVILMAE == "CA")
			echo "casado(a)";
			elseif ($r->ESTADOCIVILMAE == "SO") {
			echo "solteiro(a)";
			}elseif ($r->ESTADOCIVILMAE == "DI") {
			echo "divorciado(a)";
			}elseif ($r->ESTADOCIVILMAE == "UN") {
			echo "em união estável";
			}elseif ($r->ESTADOCIVILMAE == "SJ") {
			echo "separado(a) judicialmente";
			}elseif ($r->ESTADOCIVILMAE == "VI") {
			echo "viúvo(a)";
			} ?>,
			<?php endif; ?> 

			<!-- Profissão da Mãe do Registrado -->
			<?php if (isset($r->PROFISSAOMAE) && !empty($r->PROFISSAOMAE)): ?>
			<?=mb_strtolower($r->PROFISSAOMAE)?>,
			<?php endif; ?> 

			<!-- Naturalidade da Mãe do Registrado -->
			<?php if (isset($r->NATURALIDADEMAE) && !empty($r->NATURALIDADEMAE)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAE)); foreach($c as $c):?>
			<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
			<?php endif; ?>

			<!-- Data de Nascimento da Mãe do Registrado-->
			<?php if ($r->DATANASCIMENTOMAE!='' && !empty($r->DATANASCIMENTOMAE)): ?>
			<?="nascido(a) em "?>
			<?php  if (!empty($r->DATANASCIMENTOMAE) && $r->DATANASCIMENTOMAE != '0000-00-00'  || $r->DATANASCIMENTOMAE != NULL  && $r->DATANASCIMENTOMAE != '0000-00-00'  ) :?>
			<?php
			$data = $r->DATANASCIMENTOMAE ;
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
			echo GExtenso::numero($dataAno)." ";
			}
			elseif (substr($dataAno, -1) == '1') {
			echo GExtenso::numero($dataAno)." um";
			}
			else {
			echo GExtenso::numero($dataAno);
			} 
			endif;?>
			(<?=date('d/m/Y',strtotime($r->DATANASCIMENTOMAE))?>),
			<?php endif; ?>

			<!-- Idade da Mãe do Registrado -->			
			<?php if ($r->DATANASCIMENTOMAE!=''): ?>
			<?=" com ".idade_civil_antigo($r->DATANASCIMENTOMAE,$r->DATANASCIMENTO)." anos de idade na ocasião do parto,"?>
			<?php endif; ?>
			<?php if ($r->DATANASCIMENTOMAE!=''): ?>
			<?=" e agora com ".idade_civil_antigo($r->DATANASCIMENTOMAE,$r->DATAENTRADA)." anos de idade"?>,
			<?php endif; ?>

			<!-- RG da Mãe do Registrado -->
			<?php if (isset($r->RGMAE) && !empty($r->RGMAE)): ?>
			<?="portador(a) do RG ".$r->RGMAE?> <?=$r->ORGAOEMISSORMAE?>,
			<?php endif; ?>

			<!-- CPF da Mãe do Registrado -->
			<?php if (isset($r->CPFMAE) && !empty($r->CPFMAE)): ?>
			<?=" CPF nº ".$r->CPFMAE?>,
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
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
			<?php endforeach ?>
			<?php endif; ?>

      <!-- Casamento dos Pais -->
      <?php if ($r->LUGARCASAMENTO!='' || $r->CARTORIOCASAMENTO!=''): ?>
      Os pais da criança são casados entre si, o casamento foi feito
      
      <!-- Lugar do Casamento -->
      <?php if (isset($r->LUGARCASAMENTO) && !empty($r->LUGARCASAMENTO)): ?>
			<?="em ".$r->LUGARCASAMENTO.","?>
			<?php endif; ?>

      <!-- Cidade de Casamento -->
      <?php if (isset($r->CIDADECASAMENTO) && !empty($r->CIDADECASAMENTO)): ?>
      <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADECASAMENTO)); foreach($c as $c):?>
      <?="na cidade de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
      <?php endforeach ?>
      <?php endif; ?>
      
      <!-- Cartório de Casamento -->
      <?php if (isset($r->CARTORIOCASAMENTO) && !empty($r->CARTORIOCASAMENTO)): ?>
      <?="no(a) ".mb_convert_case($r->CARTORIOCASAMENTO, MB_CASE_TITLE, "UTF-8")."."?>
			<?php endif; ?>
      <?php endif ?>

      <!-- Gêmeos -->
      <?php if ($r->NOMEMATRICULAGEMEOS!=''): ?>
      O registrado possui irmão(s) gemeo(s), sendo: <?=$r->NOMEMATRICULAGEMEOS?>.
      <?php endif ?>

      <!-- Avós Paternos -->
      <?php if ($r->AVO1PATERNO!='' || $r->AVO2PATERNO!=''): ?>
      São seus avós paternos: 
      <?php endif ?>
      
      <!-- Avô Paterno -->
			<?php if (isset($r->AVO1PATERNO) && !empty($r->AVO1PATERNO)): ?>
			<strong><?=mb_strtoupper($r->AVO1PATERNO)?></strong>
			<?php endif; ?>
      
      <!-- Condição E -->
      <?php if (isset($r->AVO2PATERNO) && !empty($r->AVO2PATERNO)): ?>
      e
      <?php else: ?>  
      .
      <?php endif ?>

      <!-- Avó Paterna -->
      <?php if (isset($r->AVO2PATERNO) && !empty($r->AVO2PATERNO)): ?>
			<strong><?=mb_strtoupper($r->AVO2PATERNO)?></strong>.
			<?php endif; ?>

      
      <!-- Avós Maternos -->
      <?php if ($r->AVO1MATERNO!='' || $r->AVO2MATERNO!=''): ?>
      São seus avós maternos: 
      <?php endif ?>
      
      <!-- Avô Materno -->
			<?php if (isset($r->AVO1MATERNO) && !empty($r->AVO1MATERNO)): ?>
			<strong><?=mb_strtoupper($r->AVO1MATERNO)?></strong>
			<?php endif; ?>
      
      <!-- Condição E -->
      <?php if (isset($r->AVO2MATERNO) && !empty($r->AVO2MATERNO)): ?>
      e
      <?php else: ?>  
      .
      <?php endif ?>

      <!-- Avó Materna -->
      <?php if (isset($r->AVO2MATERNO) && !empty($r->AVO2MATERNO)): ?>
			<strong><?=mb_strtoupper($r->AVO2MATERNO)?></strong>.
			<?php endif; ?>
                        
      <!-- Testemunhas -->                  
      <?php if ($r->NOMETESTEMUNHA1!='' || $r->NOMETESTEMUNHA2!=''): ?>
      São testemunhas do assento 

      <!-- Testemunha 1 --> 
      <?php if ($r->NOMETESTEMUNHA1!='' && !empty($r->NOMETESTEMUNHA1)): ?>
			<strong><?=mb_strtoupper($r->NOMETESTEMUNHA1)?></strong>
			<?php endif; ?>                         

			<!-- Nacionalidade da Testemunha 1 -->
			<?php if ($r->NACIONALIDADETESTEMUNHA1!='' && !empty($r->NACIONALIDADETESTEMUNHA1)): ?>
			<?=", ".mb_strtolower($r->NACIONALIDADETESTEMUNHA1)?>,
			<?php endif; ?>

      <!-- Sexo da Testemunha 1 -->
			<?php if ($r->SEXOTESTEMUNHA1!='' && !empty($r->SEXOTESTEMUNHA1)): ?>
			<?php if ($r->SEXOTESTEMUNHA1 == 'M'):?>do sexo masculino, <?php else: ?>do sexo feminino, <?php endif ?>
			<?php endif ?>
      			
			<!-- Estado Civil da Testemunha 1 -->
			<?php if (isset($r->ESTADOCIVILTESTEMUNHA1) && !empty($r->ESTADOCIVILTESTEMUNHA1)): ?>
			<?php if ($r->ESTADOCIVILTESTEMUNHA1 == "CA")
			echo "casado(a)";
			elseif ($r->ESTADOCIVILTESTEMUNHA1 == "SO") {
			echo "solteiro(a)";
			}elseif ($r->ESTADOCIVILTESTEMUNHA1 == "DI") {
			echo "divorciado(a)";
			}elseif ($r->ESTADOCIVILTESTEMUNHA1 == "UN") {
			echo "em união estável";
			}elseif ($r->ESTADOCIVILTESTEMUNHA1 == "SJ") {
			echo "separado(a) judicialmente";
			}elseif ($r->ESTADOCIVILTESTEMUNHA1 == "VI") {
			echo "viúvo(a)";
			} ?>,
			<?php endif; ?> 

			<!-- Profissão da Testemunha 1 -->
			<?php if (isset($r->PROFISSAOTESTEMUNHA1) && !empty($r->PROFISSAOTESTEMUNHA1)): ?>
			<?=mb_strtolower($r->PROFISSAOTESTEMUNHA1)?>,
			<?php endif; ?> 

			<!-- Naturalidade da Testemunha 1 -->
			<?php if (isset($r->NATURALIDADETESTEMUNHA1) && !empty($r->NATURALIDADETESTEMUNHA1)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA1)); foreach($c as $c):?>
			<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
			<?php endif; ?>

			<!-- Data de Nascimento da Testemunha 1-->
			<?php if ($r->DATANASCIMENTOTESTEMUNHA1!='' && !empty($r->DATANASCIMENTOTESTEMUNHA1)): ?>
			<?="nascido(a) em "?>
			<?php  if (!empty($r->DATANASCIMENTOTESTEMUNHA1) && $r->DATANASCIMENTOTESTEMUNHA1 != '0000-00-00'  || $r->DATANASCIMENTOTESTEMUNHA1 != NULL  && $r->DATANASCIMENTOTESTEMUNHA1 != '0000-00-00'  ) :?>
			<?php
			$data = $r->DATANASCIMENTOTESTEMUNHA1 ;
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
			echo GExtenso::numero($dataAno)." ";
			}
			elseif (substr($dataAno, -1) == '1') {
			echo GExtenso::numero($dataAno)." um";
			}
			else {
			echo GExtenso::numero($dataAno);
			} 
			endif;?>
			(<?=date('d/m/Y',strtotime($r->DATANASCIMENTOTESTEMUNHA1))?>),
			<?php endif; ?>

			<!-- Idade da Testemunha 1 -->			
			<?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>
			<?=" com ".idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA1,$r->DATANASCIMENTO)." anos de idade na ocasião do parto,"?>
			<?php endif; ?>

			<!-- RG da Testemunha 1 -->
			<?php if (isset($r->RGTESTEMUNHA1) && !empty($r->RGTESTEMUNHA1)): ?>
			<?="portador(a) do RG ".$r->RGTESTEMUNHA1?> <?=$r->ORGAOEMISSORTESTEMUNHA1?>,
			<?php endif; ?>

			<!-- CPF da Testemunha 1 -->
			<?php if (isset($r->CPFTESTEMUNHA1) && !empty($r->CPFTESTEMUNHA1)): ?>
			<?=" CPF nº ".$r->CPFTESTEMUNHA1?>,
			<?php endif; ?>

			<!-- Endereço da Testemunha 1 -->
      <?php if ($r->ENDERECOTESTEMUNHA1!='' || $r->BAIRROTESTEMUNHA1!='' || $r->CIDADETESTEMUNHA1!=''): ?>
      residente e domiciliado(a)
      <?php endif; ?>

			<?php if (isset($r->ENDERECOTESTEMUNHA1) && !empty(mb_convert_case($r->ENDERECOTESTEMUNHA1, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="à ".mb_convert_case($r->ENDERECOTESTEMUNHA1, MB_CASE_TITLE, "UTF-8")?>,
			<?php endif; ?>

      <?php if (isset($r->BAIRROTESTEMUNHA1) && !empty(mb_convert_case($r->BAIRROTESTEMUNHA1, MB_CASE_TITLE, "UTF-8"))): ?>
      <!-- Condição Endereço -->
      <?php if (isset($r->ENDERECOTESTEMUNHA1) && !empty($r->ENDERECOTESTEMUNHA1)): ?>
      <?php else: ?>  
      no bairro
      <?php endif ?>
      <?=mb_convert_case($r->BAIRROTESTEMUNHA1, MB_CASE_TITLE, "UTF-8")?>, 
      <?php endif; ?>

      <?php if (isset($r->CIDADETESTEMUNHA1) && !empty(mb_convert_case($r->CIDADETESTEMUNHA1, MB_CASE_TITLE, "UTF-8"))): ?>
      <!-- Condição Cidade -->
      <?php if (isset($r->BAIRROTESTEMUNHA1) && !empty($r->BAIRROTESTEMUNHA1)): ?>
      
      <?php else: ?>  
      na cidade de
      <?php endif ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA1)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
			<?php endforeach ?>
			<?php endif; ?>

      <!-- Condição E -->
      <?php if (isset($r->NOMETESTEMUNHA2) && !empty($r->NOMETESTEMUNHA2)): ?>
      e
      <?php else: ?>  
      .
      <?php endif ?>

      <!-- Testemunha 2 -->
      <?php if ($r->NOMETESTEMUNHA2!='' && !empty($r->NOMETESTEMUNHA2)): ?>
			<strong><?=mb_strtoupper($r->NOMETESTEMUNHA2)?></strong>
			<?php endif; ?>                               

			<!-- Nacionalidade da Testemunha 2 -->
			<?php if ($r->NACIONALIDADETESTEMUNHA2!='' && !empty($r->NACIONALIDADETESTEMUNHA2)): ?>
			<?=", ".mb_strtolower($r->NACIONALIDADETESTEMUNHA2)?>,
			<?php endif; ?>

      <!-- Sexo da Testemunha 2 -->
			<?php if ($r->SEXOTESTEMUNHA2!='' && !empty($r->SEXOTESTEMUNHA2)): ?>
			<?php if ($r->SEXOTESTEMUNHA2 == 'M'):?>do sexo masculino, <?php else: ?>do sexo feminino, <?php endif ?>
			<?php endif ?>
      			
			<!-- Estado Civil da Testemunha 2 -->
			<?php if (isset($r->ESTADOCIVILTESTEMUNHA2) && !empty($r->ESTADOCIVILTESTEMUNHA2)): ?>
			<?php if ($r->ESTADOCIVILTESTEMUNHA2 == "CA")
			echo "casado(a)";
			elseif ($r->ESTADOCIVILTESTEMUNHA2 == "SO") {
			echo "solteiro(a)";
			}elseif ($r->ESTADOCIVILTESTEMUNHA2 == "DI") {
			echo "divorciado(a)";
			}elseif ($r->ESTADOCIVILTESTEMUNHA2 == "UN") {
			echo "em união estável";
			}elseif ($r->ESTADOCIVILTESTEMUNHA2 == "SJ") {
			echo "separado(a) judicialmente";
			}elseif ($r->ESTADOCIVILTESTEMUNHA2 == "VI") {
			echo "viúvo(a)";
			} ?>,
			<?php endif; ?> 

			<!-- Profissão da Testemunha 2 -->
			<?php if (isset($r->PROFISSAOTESTEMUNHA2) && !empty($r->PROFISSAOTESTEMUNHA2)): ?>
			<?=mb_strtolower($r->PROFISSAOTESTEMUNHA2)?>,
			<?php endif; ?> 

			<!-- Naturalidade da Testemunha 2 -->
			<?php if (isset($r->NATURALIDADETESTEMUNHA2) && !empty($r->NATURALIDADETESTEMUNHA2)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA2)); foreach($c as $c):?>
			<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
			<?php endif; ?>

			<!-- Data de Nascimento da Testemunha 2-->
			<?php if ($r->DATANASCIMENTOTESTEMUNHA2!='' && !empty($r->DATANASCIMENTOTESTEMUNHA2)): ?>
			<?="nascido(a) em "?>
			<?php  if (!empty($r->DATANASCIMENTOTESTEMUNHA2) && $r->DATANASCIMENTOTESTEMUNHA2 != '0000-00-00'  || $r->DATANASCIMENTOTESTEMUNHA2 != NULL  && $r->DATANASCIMENTOTESTEMUNHA2 != '0000-00-00'  ) :?>
			<?php
			$data = $r->DATANASCIMENTOTESTEMUNHA2 ;
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
			echo GExtenso::numero($dataAno)." ";
			}
			elseif (substr($dataAno, -1) == '1') {
			echo GExtenso::numero($dataAno)." um";
			}
			else {
			echo GExtenso::numero($dataAno);
			} 
			endif;?>
			(<?=date('d/m/Y',strtotime($r->DATANASCIMENTOTESTEMUNHA2))?>),
			<?php endif; ?>

			<!-- Idade da Testemunha 2 -->			
			<?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>
			<?=" com ".idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA2,$r->DATANASCIMENTO)." anos de idade na ocasião do parto,"?>
			<?php endif; ?>

			<!-- RG da Testemunha 2 -->
			<?php if (isset($r->RGTESTEMUNHA2) && !empty($r->RGTESTEMUNHA2)): ?>
			<?="portador(a) do RG ".$r->RGTESTEMUNHA2?> <?=$r->ORGAOEMISSORTESTEMUNHA2?>,
			<?php endif; ?>

			<!-- CPF da Testemunha 2 -->
			<?php if (isset($r->CPFTESTEMUNHA2) && !empty($r->CPFTESTEMUNHA2)): ?>
			<?=" CPF nº ".$r->CPFTESTEMUNHA2?>,
			<?php endif; ?>

			<!-- Endereço da Testemunha 2 -->
      <?php if ($r->ENDERECOTESTEMUNHA2!='' || $r->BAIRROTESTEMUNHA2!='' || $r->CIDADETESTEMUNHA2!=''): ?>
      residente e domiciliado(a)
      <?php endif; ?>

			<?php if (isset($r->ENDERECOTESTEMUNHA2) && !empty(mb_convert_case($r->ENDERECOTESTEMUNHA2, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="à ".mb_convert_case($r->ENDERECOTESTEMUNHA2, MB_CASE_TITLE, "UTF-8")?>,
			<?php endif; ?>

      <?php if (isset($r->BAIRROTESTEMUNHA2) && !empty(mb_convert_case($r->BAIRROTESTEMUNHA2, MB_CASE_TITLE, "UTF-8"))): ?>
      <!-- Condição Endereço -->
      <?php if (isset($r->ENDERECOTESTEMUNHA2) && !empty($r->ENDERECOTESTEMUNHA2)): ?>
      <?php else: ?>  
      no bairro
      <?php endif ?>
      <?=mb_convert_case($r->BAIRROTESTEMUNHA2, MB_CASE_TITLE, "UTF-8")?>, 
      <?php endif; ?>

      <?php if (isset($r->CIDADETESTEMUNHA2) && !empty(mb_convert_case($r->CIDADETESTEMUNHA2, MB_CASE_TITLE, "UTF-8"))): ?>
      <!-- Condição Cidade -->
      <?php if (isset($r->BAIRROTESTEMUNHA2) && !empty($r->BAIRROTESTEMUNHA2)): ?>
      
      <?php else: ?>  
      na cidade de
      <?php endif ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA2)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
			<?php endforeach ?>
			<?php endif; ?>
      
      que declaram sob as penas da lei conhecer a mãe e a existência da gravidez.
    <?php endif ?>

      <!-- Tipo de Local de Nascimento -->
      <!-- Nascido fora da unidade de saúde -->
      <?php if ($r->TIPOLOCALNASCIMENTO == 'FORA_UNIDADE_SAUDE' && $r->TIPOASSENTO == 'COMUN'): ?>
      Observação: nascimento ocorrido sem assistência médica, em residência, fora de unidade hospitalar ou fora de casa de saúde.

      <?php if (isset($r->DNV) && !empty($r->DNV)): ?>
			<?="DNV (declaração de nascido vivo) preenchida por este oficial e identificada pelo nº ".$r->DNV.". Lido em voz alta e clara, achado conforme,"?>
			<?php endif; ?>

      <!-- AQUI -->
      
      <!-- Condição E -->
      <?php if (isset($r->NOMETESTEMUNHA1) && !empty($r->NOMETESTEMUNHA2)): ?>
      segue assinado pelo(a) declarante e duas testemunhas.
      <?php else: ?>  
      segue assinado pelo(a) declarante.
      <?php endif ?>

      <?php endif ?>

      <!-- Registro de indígena -->
      <?php if ($r->RANI!=''): ?>
      Observação: registro de nascimento indígena, Nº RANI: <?=$r->RANI?>. 
      <?php endif ?>
      
      <!-- Registro Tardio -->
      <?php if ($r->TIPOASSENTO == 'REGISTROT'): ?>
      Observação: registro tardio feito conforme Art. 46 e seguintes da Lei 6.015 e Provimento Nº 28 do CNJ -
      Conselho Nacional de Justiça.
      <?php endif ?>
      
      <!-- Posto Avançado -->
      <?php if ($r->TIPOASSENTO == 'POSTO' && $r->TIPOLOCALNASCIMENTO == 'UNIDADE_SAUDE'): ?> 
      Observação: registro de nascimento feito em posto avançado de registro de nascimentos, administrado por esta serventia.
      <?php endif ?>

      <?php if ($r->QUALIDADEDECLARANTE =='PAI'): ?>
      Assina o pai.
      <?php elseif ($r->QUALIDADEDECLARANTE =='MAE'): ?>
      Assina a mãe.
      <?php elseif ($r->QUALIDADEDECLARANTE =='AMBOSPAI'): ?>
      Assinam os pais do registrando.
      <?php else : ?>
      Assina o declarante.
      <?php endif ?>

      <!-- Pai Menor -->
      <?php if ($r->ROGOPAISOCIO == 'PAIDEMENOR'): 
      $reppai = explode(",", $r->NOMEPAISOCIO); 
      ?>
      Observação: o pai é de menor de idade, estando acompanhado(a) do(a) Sr(a). <strong><?=mb_strtoupper($reppai[0])?></strong>, sendo o(a) mesmo(a) seu(ua) <?=mb_strtolower($reppai[1])?>. Que assina este termo.
      <?php endif ?>

      <!-- Mãe Menor -->
      <?php if ($r->ROGOMAESOCIO == 'MAEDEMENOR'): 
      $repmae = explode(",", $r->NOMEMAESOCIO); 
      ?>
      Observação: a mãe é de menor de idade, estando acompanhado(a) do Sr(a). <strong><?=mb_strtoupper($repmae[0])?></strong>, sendo o(a) mesmo(a) seu(ua) <?=mb_strtolower($repmae[1])?>. Que assina este termo.
      <?php endif ?>

<?php endif ?>

      <!-- REGISTRO POR ÓRDEM JUDICIAL -->
      <?php if ($r->TIPOASSENTO == 'ORDEM'): ?>

        ao(s)   
   
          <!-- DATA ENTRADA -->
          <?php  if (!empty($r->DATAENTRADA) && $r->DATAENTRADA != '0000-00-00'  || $r->DATAENTRADA != NULL  && $r->DATAENTRADA != '0000-00-00'  ) :?>

          <?php
          $data = $r->DATAENTRADA ;
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
          echo GExtenso::numero($dataAno)." ";
          }
          elseif (substr($dataAno, -1) == '1') {
          echo GExtenso::numero($dataAno)." um";
          }
          else {
            echo GExtenso::numero($dataAno);
          }

          endif;?>

          (<?=date('d/m/Y',strtotime($r->DATAENTRADA))?>), 
          
          <!-- Cartório -->
          neste(a)
          <?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?>
          <?=mb_convert_case($w->strRazaoSocial, MB_CASE_TITLE, "UTF-8")?> Estado do Maranhão, <?php endforeach ?>
          
          por Mandato Judicial

          <!-- NUMERO DO MANDADO -->
          <?php if ($r->NUMEROMANDATO!='' && !empty($r->NUMEROMANDATO)): ?>
          <?="nº ".$r->NUMEROMANDATO.","?>
          <?php endif; ?>
          
          <!-- JUIZ -->
          <?php if ($r->JUIZMANDATO!='' && !empty($r->JUIZMANDATO)): ?>
          <?="expedido pelo(a) M.M Juiz(a) ".mb_convert_case($r->JUIZMANDATO, MB_CASE_UPPER, "UTF-8")?>,
          <?php endif; ?>

          <!-- VARA/COMARCA -->
          <?php if ($r->VARAMANDATO!='' && !empty($r->VARAMANDATO)): ?>
          <?="do(a) ".mb_convert_case($r->VARAMANDATO, MB_CASE_TITLE, "UTF-8")?>,
          <?php endif; ?>
          
          <!-- DATA DO MANDADO -->
          <?php if ($r->DATAEXPEDICAOMANDATO!='' && !empty($r->DATAEXPEDICAOMANDATO)): ?>
          <?="em ".date('d/m/Y', strtotime($r->DATAEXPEDICAOMANDATO))?>,
          <?php endif; ?>

          <!-- DATA DA SENTEÇA -->
          <?php if ($r->DATASENTENCAMANDATO!='' && !empty($r->DATASENTENCAMANDATO)): ?>
          <?="com sentença datada de ".date('d/m/Y', strtotime($r->DATASENTENCAMANDATO))?>,
          <?php endif; ?>
          
          <!-- DNV -->
          <?php if ($r->DNV!='' && !empty($r->DNV)): ?>
          <?="onde consta a DNV nº ".$r->DNV?>,
          <?php endif; ?>

          procede-se o registro de uma criança

          <!-- Sexo do Registrado -->
          <?php if ($r->SEXONASCIDO!='' && !empty($r->SEXONASCIDO)): ?>
          <?php if ($r->SEXONASCIDO == 'M'):?>do sexo masculino, <?php else: ?>do sexo feminino, <?php endif ?>
          <?php endif ?>
          
          <?php if ($r->DATANASCIMENTO!='' && !empty($r->DATANASCIMENTO)): ?>
          nascido(a) em
          <?php endif; ?>

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
          echo GExtenso::numero($dataAno)." ";
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

          <!-- Hora do Nascimento -->
          <?php if ($r->HORANASCIMENTO!='' && !empty($r->HORANASCIMENTO)): ?>
          <?="às ".$r->HORANASCIMENTO." horas"?>,
          <?php endif ?>
          
          <!-- Local do Nascimento -->
          <?php if ($r->LOCALNASCIMENTO!='' && !empty($r->LOCALNASCIMENTO)): ?>
          <?="no(a) ".mb_convert_case($r->LOCALNASCIMENTO, MB_CASE_TITLE, "UTF-8")?>,
          <?php endif ?>

          <!-- Endereço de Nascimento -->
          <?php if ($r->ENDERECOLOCALNASCIMENTO!='' || $r->CIDADENASCIMENTO!=''): ?>
          situado
          <?php endif; ?>

          <?php if (isset($r->ENDERECOLOCALNASCIMENTO) && !empty(mb_convert_case($r->ENDERECOLOCALNASCIMENTO, MB_CASE_TITLE, "UTF-8"))): ?>
          <?="à ".mb_convert_case($r->ENDERECOLOCALNASCIMENTO, MB_CASE_TITLE, "UTF-8")?>,
          <?php endif; ?>

          <?php if (isset($r->CIDADENASCIMENTO) && !empty(mb_convert_case($r->CIDADENASCIMENTO, MB_CASE_TITLE, "UTF-8"))): ?>
          <!-- Condição Cidade -->
          <?php if (isset($r->ENDERECOLOCALNASCIMENTO) && !empty($r->ENDERECOLOCALNASCIMENTO)): ?>
          
          <?php else: ?>  
          na cidade de
          <?php endif ?>
          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENASCIMENTO)); foreach($c as $c):?>
          <?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
          <?php endforeach ?>
          <?php endif; ?>
          
          <!-- CPF do Registrado -->
          <?php if (isset($r->CPFNASCIDO) && !empty($r->CPFNASCIDO)): ?>
          <?="com CPF nº ".$r->CPFNASCIDO?>,
          <?php endif; ?>

          <!-- Naturalidade do Registrado -->
          <?php if (isset($r->NATURALIDADENASCIDO) && !empty($r->NATURALIDADENASCIDO)): ?>
          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENASCIDO)); foreach($c as $c):?>
          <?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
          <?php endif; ?>
          
          que recebeu o nome de:
          <b><?=mb_convert_case($r->NOMENASCIDO, MB_CASE_UPPER, "UTF-8")?></b>,
      
          filho(a) de

          <!-- Qualificação da Mãe do Registrado -->	
          <?php if ($r->NOMEPAI!='NULL' && $r->NOMEPAI!=''):?>
          
          <?php if ($r->NACIONALIDADEPAI!='' || $r->SEXOPAI!='' || $r->ESTADOCIVILPAI!='' || $r->PROFISSAOPAI!='' || $r->NATURALIDADEPAI!='' || $r->DATANASCIMENTOPAI!='' || $r->RGPAI!='' || $r->CPFPAI!='' || $r->ENDERECOPAI!='' || $r->BAIRROPAI!='' || $r->CIDADEPAI!=''): ?>
          <strong><?=mb_strtoupper($r->NOMEPAI)?></strong>,
          <?php else: ?>            
          <strong><?=mb_strtoupper($r->NOMEPAI)?></strong>
          <?php endif; ?>

          <!-- Nacionalidade do Pai do Registrado -->
          <?php if ($r->NACIONALIDADEPAI!='' && !empty($r->NACIONALIDADEPAI)): ?>
          <?=mb_strtolower($r->NACIONALIDADEPAI)?>,
          <?php endif; ?>

          <!-- Sexo do Pai do Registrado -->
          <?php if ($r->SEXOPAI!='' && !empty($r->SEXOPAI)): ?>
          <?php if ($r->SEXOPAI == 'M'):?>do sexo masculino, <?php else: ?>do sexo feminino, <?php endif ?>
          <?php endif ?>
          
          <!-- Estado Civil do Pai do Registrado -->
          <?php if (isset($r->ESTADOCIVILPAI) && !empty($r->ESTADOCIVILPAI)): ?>
          <?php if ($r->ESTADOCIVILPAI == "CA")
          echo "casado(a)";
          elseif ($r->ESTADOCIVILPAI == "SO") {
          echo "solteiro(a)";
          }elseif ($r->ESTADOCIVILPAI == "DI") {
          echo "divorciado(a)";
          }elseif ($r->ESTADOCIVILPAI == "UN") {
          echo "em união estável";
          }elseif ($r->ESTADOCIVILPAI == "SJ") {
          echo "separado(a) judicialmente";
          }elseif ($r->ESTADOCIVILPAI == "VI") {
          echo "viúvo(a)";
          } ?>,
          <?php endif; ?> 

          <!-- Profissão do Pai do Registrado -->
          <?php if (isset($r->PROFISSAOPAI) && !empty($r->PROFISSAOPAI)): ?>
          <?=mb_strtolower($r->PROFISSAOPAI)?>,
          <?php endif; ?> 

          <!-- Naturalidade do Pai do Registrado -->
          <?php if (isset($r->NATURALIDADEPAI) && !empty($r->NATURALIDADEPAI)): ?>
          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAI)); foreach($c as $c):?>
          <?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
          <?php endif; ?>

          <!-- Data de Nascimento do Pai do Registrado-->
          <?php if ($r->DATANASCIMENTOPAI!='' && !empty($r->DATANASCIMENTOPAI)): ?>
          <?="nascido(a) em "?>
          <?php  if (!empty($r->DATANASCIMENTOPAI) && $r->DATANASCIMENTOPAI != '0000-00-00'  || $r->DATANASCIMENTOPAI != NULL  && $r->DATANASCIMENTOPAI != '0000-00-00'  ) :?>
          <?php
          $data = $r->DATANASCIMENTOPAI ;
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
          echo GExtenso::numero($dataAno)." ";
          }
          elseif (substr($dataAno, -1) == '1') {
          echo GExtenso::numero($dataAno)." um";
          }
          else {
          echo GExtenso::numero($dataAno);
          } 
          endif;?>
          (<?=date('d/m/Y',strtotime($r->DATANASCIMENTOPAI))?>),
          <?php endif; ?>

          <!-- Idade do Pai do Registrado -->			
          <?php if ($r->DATANASCIMENTOPAI!=''): ?>
          <?="com ".idade_civil_antigo($r->DATANASCIMENTOPAI,$r->DATANASCIMENTO)." anos de idade"?>,
          <?php endif ?>

          <!-- RG do Pai do Registrado -->
          <?php if (isset($r->RGPAI) && !empty($r->RGPAI)): ?>
          <?="portador(a) do RG ".$r->RGPAI?> <?=$r->ORGAOEMISSORPAI?>,
          <?php endif; ?>

          <!-- CPF do Pai do Registrado -->
          <?php if (isset($r->CPFPAI) && !empty($r->CPFPAI)): ?>
          <?=" CPF nº ".$r->CPFPAI?>,
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

          e de
          <?php endif; ?>
          
          <!-- Qualificação da Mãe do Registrado -->	
          <?php if ($r->NOMEMAE!='' && !empty($r->NOMEMAE)): ?>
          
            <?php if ($r->NACIONALIDADEMAE!='' || $r->SEXOMAE!='' || $r->ESTADOCIVILMAE!='' || $r->PROFISSAOMAE!='' || $r->NATURALIDADEMAE!='' || $r->DATANASCIMENTOMAE!='' || $r->RGMAE!='' || $r->CPFMAE!='' || $r->ENDERECOMAE!='' || $r->BAIRROMAE!='' || $r->CIDADEMAE!=''): ?>
            <strong><?=mb_strtoupper($r->NOMEMAE)?></strong>,
            <?php else: ?>            
            <strong><?=mb_strtoupper($r->NOMEMAE)?></strong>
            <?php endif; ?>
          
          <?php endif; ?>

          <!-- Nacionalidade da Mãe do Registrado -->
          <?php if ($r->NACIONALIDADEMAE!='' && !empty($r->NACIONALIDADEMAE)): ?>
          <?=mb_strtolower($r->NACIONALIDADEMAE)?>,
          <?php endif; ?>

          <!-- Sexo da Mãe do Registrado -->
          <?php if ($r->SEXOMAE!='' && !empty($r->SEXOMAE)): ?>
          <?php if ($r->SEXOMAE == 'M'):?>do sexo masculino, <?php else: ?>do sexo feminino, <?php endif ?>
          <?php endif ?>
                
          <!-- Estado Civil da Mãe do Registrado -->
          <?php if (isset($r->ESTADOCIVILMAE) && !empty($r->ESTADOCIVILMAE)): ?>
          <?php if ($r->ESTADOCIVILMAE == "CA")
          echo "casado(a)";
          elseif ($r->ESTADOCIVILMAE == "SO") {
          echo "solteiro(a)";
          }elseif ($r->ESTADOCIVILMAE == "DI") {
          echo "divorciado(a)";
          }elseif ($r->ESTADOCIVILMAE == "UN") {
          echo "em união estável";
          }elseif ($r->ESTADOCIVILMAE == "SJ") {
          echo "separado(a) judicialmente";
          }elseif ($r->ESTADOCIVILMAE == "VI") {
          echo "viúvo(a)";
          } ?>,
          <?php endif; ?> 

          <!-- Profissão da Mãe do Registrado -->
          <?php if (isset($r->PROFISSAOMAE) && !empty($r->PROFISSAOMAE)): ?>
          <?=mb_strtolower($r->PROFISSAOMAE)?>,
          <?php endif; ?> 

          <!-- Naturalidade da Mãe do Registrado -->
          <?php if (isset($r->NATURALIDADEMAE) && !empty($r->NATURALIDADEMAE)): ?>
          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAE)); foreach($c as $c):?>
          <?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
          <?php endif; ?>

          <!-- Data de Nascimento da Mãe do Registrado-->
          <?php if ($r->DATANASCIMENTOMAE!='' && !empty($r->DATANASCIMENTOMAE)): ?>
          <?="nascido(a) em "?>
          <?php  if (!empty($r->DATANASCIMENTOMAE) && $r->DATANASCIMENTOMAE != '0000-00-00'  || $r->DATANASCIMENTOMAE != NULL  && $r->DATANASCIMENTOMAE != '0000-00-00'  ) :?>
          <?php
          $data = $r->DATANASCIMENTOMAE ;
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
          echo GExtenso::numero($dataAno)." ";
          }
          elseif (substr($dataAno, -1) == '1') {
          echo GExtenso::numero($dataAno)." um";
          }
          else {
          echo GExtenso::numero($dataAno);
          } 
          endif;?>
          (<?=date('d/m/Y',strtotime($r->DATANASCIMENTOMAE))?>),
          <?php endif; ?>

          <!-- Idade da Mãe do Registrado -->			
          <?php if ($r->DATANASCIMENTOMAE!=''): ?>
          <?=" com ".idade_civil_antigo($r->DATANASCIMENTOMAE,$r->DATANASCIMENTO)." anos de idade na ocasião do parto,"?>
          <?php endif; ?>
          <?php if ($r->DATANASCIMENTOMAE!=''): ?>
          <?=" e agora com ".idade_civil_antigo($r->DATANASCIMENTOMAE,$r->DATAENTRADA)." anos de idade"?>,
          <?php endif; ?>

          <!-- RG da Mãe do Registrado -->
          <?php if (isset($r->RGMAE) && !empty($r->RGMAE)): ?>
          <?="portador(a) do RG ".$r->RGMAE?> <?=$r->ORGAOEMISSORMAE?>,
          <?php endif; ?>

          <!-- CPF da Mãe do Registrado -->
          <?php if (isset($r->CPFMAE) && !empty($r->CPFMAE)): ?>
          <?=" CPF nº ".$r->CPFMAE?>,
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
          <?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
          <?php endforeach ?>
          <?php endif; ?>

          <!-- Casamento dos Pais -->
          <?php if ($r->LUGARCASAMENTO!='' || $r->CARTORIOCASAMENTO!=''): ?>
          Os pais da criança são casados entre si, o casamento foi feito
          
          <!-- Lugar do Casamento -->
          <?php if (isset($r->LUGARCASAMENTO) && !empty($r->LUGARCASAMENTO)): ?>
          <?="em ".$r->LUGARCASAMENTO.","?>
          <?php endif; ?>

          <!-- Cidade de Casamento -->
          <?php if (isset($r->CIDADECASAMENTO) && !empty($r->CIDADECASAMENTO)): ?>
          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADECASAMENTO)); foreach($c as $c):?>
          <?="na cidade de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
          <?php endforeach ?>
          <?php endif; ?>
          
          <!-- Cartório de Casamento -->
          <?php if (isset($r->CARTORIOCASAMENTO) && !empty($r->CARTORIOCASAMENTO)): ?>
          <?="no(a) ".mb_convert_case($r->CARTORIOCASAMENTO, MB_CASE_TITLE, "UTF-8")."."?>
          <?php endif; ?>
          <?php endif ?>

          <!-- Gêmeos -->
          <?php if ($r->NOMEMATRICULAGEMEOS!=''): ?>
          O registrado possui irmão(s) gemeo(s), sendo: <?=$r->NOMEMATRICULAGEMEOS?>.
          <?php endif ?>

          <!-- Avós Paternos -->
          <?php if ($r->AVO1PATERNO!='' || $r->AVO2PATERNO!=''): ?>
          São seus avós paternos: 
          <?php endif ?>
          
          <!-- Avô Paterno -->
          <?php if (isset($r->AVO1PATERNO) && !empty($r->AVO1PATERNO)): ?>
          <strong><?=mb_strtoupper($r->AVO1PATERNO)?></strong>
          <?php endif; ?>
          
          <!-- Condição E -->
          <?php if (isset($r->AVO2PATERNO) && !empty($r->AVO2PATERNO)): ?>
          e
          <?php else: ?>  
          .
          <?php endif ?>

          <!-- Avó Paterna -->
          <?php if (isset($r->AVO2PATERNO) && !empty($r->AVO2PATERNO)): ?>
          <strong><?=mb_strtoupper($r->AVO2PATERNO)?></strong>.
          <?php endif; ?>

          
          <!-- Avós Maternos -->
          <?php if ($r->AVO1MATERNO!='' || $r->AVO2MATERNO!=''): ?>
          São seus avós maternos: 
          <?php endif ?>
          
          <!-- Avô Materno -->
          <?php if (isset($r->AVO1MATERNO) && !empty($r->AVO1MATERNO)): ?>
          <strong><?=mb_strtoupper($r->AVO1MATERNO)?></strong>
          <?php endif; ?>
          
          <!-- Condição E -->
          <?php if (isset($r->AVO2MATERNO) && !empty($r->AVO2MATERNO)): ?>
          e
          <?php else: ?>  
          .
          <?php endif ?>

          <!-- Avó Materna -->
          <?php if (isset($r->AVO2MATERNO) && !empty($r->AVO2MATERNO)): ?>
          <strong><?=mb_strtoupper($r->AVO2MATERNO)?></strong>.
          <?php endif; ?>
                            
          <!-- Testemunhas -->                  
          <?php if ($r->NOMETESTEMUNHA1!='' || $r->NOMETESTEMUNHA2!=''): ?>
          São testemunhas do assento 

          <!-- Testemunha 1 --> 
          <?php if ($r->NOMETESTEMUNHA1!='' && !empty($r->NOMETESTEMUNHA1)): ?>
          <strong><?=mb_strtoupper($r->NOMETESTEMUNHA1)?></strong>
          <?php endif; ?>                         

          <!-- Nacionalidade da Testemunha 1 -->
          <?php if ($r->NACIONALIDADETESTEMUNHA1!='' && !empty($r->NACIONALIDADETESTEMUNHA1)): ?>
          <?=", ".mb_strtolower($r->NACIONALIDADETESTEMUNHA1)?>,
          <?php endif; ?>

          <!-- Sexo da Testemunha 1 -->
          <?php if ($r->SEXOTESTEMUNHA1!='' && !empty($r->SEXOTESTEMUNHA1)): ?>
          <?php if ($r->SEXOTESTEMUNHA1 == 'M'):?>do sexo masculino, <?php else: ?>do sexo feminino, <?php endif ?>
          <?php endif ?>
                
          <!-- Estado Civil da Testemunha 1 -->
          <?php if (isset($r->ESTADOCIVILTESTEMUNHA1) && !empty($r->ESTADOCIVILTESTEMUNHA1)): ?>
          <?php if ($r->ESTADOCIVILTESTEMUNHA1 == "CA")
          echo "casado(a)";
          elseif ($r->ESTADOCIVILTESTEMUNHA1 == "SO") {
          echo "solteiro(a)";
          }elseif ($r->ESTADOCIVILTESTEMUNHA1 == "DI") {
          echo "divorciado(a)";
          }elseif ($r->ESTADOCIVILTESTEMUNHA1 == "UN") {
          echo "em união estável";
          }elseif ($r->ESTADOCIVILTESTEMUNHA1 == "SJ") {
          echo "separado(a) judicialmente";
          }elseif ($r->ESTADOCIVILTESTEMUNHA1 == "VI") {
          echo "viúvo(a)";
          } ?>,
          <?php endif; ?> 

          <!-- Profissão da Testemunha 1 -->
          <?php if (isset($r->PROFISSAOTESTEMUNHA1) && !empty($r->PROFISSAOTESTEMUNHA1)): ?>
          <?=mb_strtolower($r->PROFISSAOTESTEMUNHA1)?>,
          <?php endif; ?> 

          <!-- Naturalidade da Testemunha 1 -->
          <?php if (isset($r->NATURALIDADETESTEMUNHA1) && !empty($r->NATURALIDADETESTEMUNHA1)): ?>
          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA1)); foreach($c as $c):?>
          <?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
          <?php endif; ?>

          <!-- Data de Nascimento da Testemunha 1-->
          <?php if ($r->DATANASCIMENTOTESTEMUNHA1!='' && !empty($r->DATANASCIMENTOTESTEMUNHA1)): ?>
          <?="nascido(a) em "?>
          <?php  if (!empty($r->DATANASCIMENTOTESTEMUNHA1) && $r->DATANASCIMENTOTESTEMUNHA1 != '0000-00-00'  || $r->DATANASCIMENTOTESTEMUNHA1 != NULL  && $r->DATANASCIMENTOTESTEMUNHA1 != '0000-00-00'  ) :?>
          <?php
          $data = $r->DATANASCIMENTOTESTEMUNHA1 ;
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
          echo GExtenso::numero($dataAno)." ";
          }
          elseif (substr($dataAno, -1) == '1') {
          echo GExtenso::numero($dataAno)." um";
          }
          else {
          echo GExtenso::numero($dataAno);
          } 
          endif;?>
          (<?=date('d/m/Y',strtotime($r->DATANASCIMENTOTESTEMUNHA1))?>),
          <?php endif; ?>

          <!-- Idade da Testemunha 1 -->			
          <?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>
          <?=" com ".idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA1,$r->DATANASCIMENTO)." anos de idade na ocasião do parto,"?>
          <?php endif; ?>

          <!-- RG da Testemunha 1 -->
          <?php if (isset($r->RGTESTEMUNHA1) && !empty($r->RGTESTEMUNHA1)): ?>
          <?="portador(a) do RG ".$r->RGTESTEMUNHA1?> <?=$r->ORGAOEMISSORTESTEMUNHA1?>,
          <?php endif; ?>

          <!-- CPF da Testemunha 1 -->
          <?php if (isset($r->CPFTESTEMUNHA1) && !empty($r->CPFTESTEMUNHA1)): ?>
          <?=" CPF nº ".$r->CPFTESTEMUNHA1?>,
          <?php endif; ?>

          <!-- Endereço da Testemunha 1 -->
          <?php if ($r->ENDERECOTESTEMUNHA1!='' || $r->BAIRROTESTEMUNHA1!='' || $r->CIDADETESTEMUNHA1!=''): ?>
          residente e domiciliado(a)
          <?php endif; ?>

          <?php if (isset($r->ENDERECOTESTEMUNHA1) && !empty(mb_convert_case($r->ENDERECOTESTEMUNHA1, MB_CASE_TITLE, "UTF-8"))): ?>
          <?="à ".mb_convert_case($r->ENDERECOTESTEMUNHA1, MB_CASE_TITLE, "UTF-8")?>,
          <?php endif; ?>

          <?php if (isset($r->BAIRROTESTEMUNHA1) && !empty(mb_convert_case($r->BAIRROTESTEMUNHA1, MB_CASE_TITLE, "UTF-8"))): ?>
          <!-- Condição Endereço -->
          <?php if (isset($r->ENDERECOTESTEMUNHA1) && !empty($r->ENDERECOTESTEMUNHA1)): ?>
          <?php else: ?>  
          no bairro
          <?php endif ?>
          <?=mb_convert_case($r->BAIRROTESTEMUNHA1, MB_CASE_TITLE, "UTF-8")?>, 
          <?php endif; ?>

          <?php if (isset($r->CIDADETESTEMUNHA1) && !empty(mb_convert_case($r->CIDADETESTEMUNHA1, MB_CASE_TITLE, "UTF-8"))): ?>
          <!-- Condição Cidade -->
          <?php if (isset($r->BAIRROTESTEMUNHA1) && !empty($r->BAIRROTESTEMUNHA1)): ?>
          
          <?php else: ?>  
          na cidade de
          <?php endif ?>
          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA1)); foreach($c as $c):?>
          <?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
          <?php endforeach ?>
          <?php endif; ?>

          <!-- Condição E -->
          <?php if (isset($r->NOMETESTEMUNHA2) && !empty($r->NOMETESTEMUNHA2)): ?>
          e
          <?php else: ?>  
          .
          <?php endif ?>

          <!-- Testemunha 2 -->
          <?php if ($r->NOMETESTEMUNHA2!='' && !empty($r->NOMETESTEMUNHA2)): ?>
          <strong><?=mb_strtoupper($r->NOMETESTEMUNHA2)?></strong>
          <?php endif; ?>                               

          <!-- Nacionalidade da Testemunha 2 -->
          <?php if ($r->NACIONALIDADETESTEMUNHA2!='' && !empty($r->NACIONALIDADETESTEMUNHA2)): ?>
          <?=", ".mb_strtolower($r->NACIONALIDADETESTEMUNHA2)?>,
          <?php endif; ?>

          <!-- Sexo da Testemunha 2 -->
          <?php if ($r->SEXOTESTEMUNHA2!='' && !empty($r->SEXOTESTEMUNHA2)): ?>
          <?php if ($r->SEXOTESTEMUNHA2 == 'M'):?>do sexo masculino, <?php else: ?>do sexo feminino, <?php endif ?>
          <?php endif ?>
                
          <!-- Estado Civil da Testemunha 2 -->
          <?php if (isset($r->ESTADOCIVILTESTEMUNHA2) && !empty($r->ESTADOCIVILTESTEMUNHA2)): ?>
          <?php if ($r->ESTADOCIVILTESTEMUNHA2 == "CA")
          echo "casado(a)";
          elseif ($r->ESTADOCIVILTESTEMUNHA2 == "SO") {
          echo "solteiro(a)";
          }elseif ($r->ESTADOCIVILTESTEMUNHA2 == "DI") {
          echo "divorciado(a)";
          }elseif ($r->ESTADOCIVILTESTEMUNHA2 == "UN") {
          echo "em união estável";
          }elseif ($r->ESTADOCIVILTESTEMUNHA2 == "SJ") {
          echo "separado(a) judicialmente";
          }elseif ($r->ESTADOCIVILTESTEMUNHA2 == "VI") {
          echo "viúvo(a)";
          } ?>,
          <?php endif; ?> 

          <!-- Profissão da Testemunha 2 -->
          <?php if (isset($r->PROFISSAOTESTEMUNHA2) && !empty($r->PROFISSAOTESTEMUNHA2)): ?>
          <?=mb_strtolower($r->PROFISSAOTESTEMUNHA2)?>,
          <?php endif; ?> 

          <!-- Naturalidade da Testemunha 2 -->
          <?php if (isset($r->NATURALIDADETESTEMUNHA2) && !empty($r->NATURALIDADETESTEMUNHA2)): ?>
          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA2)); foreach($c as $c):?>
          <?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
          <?php endif; ?>

          <!-- Data de Nascimento da Testemunha 2-->
          <?php if ($r->DATANASCIMENTOTESTEMUNHA2!='' && !empty($r->DATANASCIMENTOTESTEMUNHA2)): ?>
          <?="nascido(a) em "?>
          <?php  if (!empty($r->DATANASCIMENTOTESTEMUNHA2) && $r->DATANASCIMENTOTESTEMUNHA2 != '0000-00-00'  || $r->DATANASCIMENTOTESTEMUNHA2 != NULL  && $r->DATANASCIMENTOTESTEMUNHA2 != '0000-00-00'  ) :?>
          <?php
          $data = $r->DATANASCIMENTOTESTEMUNHA2 ;
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
          echo GExtenso::numero($dataAno)." ";
          }
          elseif (substr($dataAno, -1) == '1') {
          echo GExtenso::numero($dataAno)." um";
          }
          else {
          echo GExtenso::numero($dataAno);
          } 
          endif;?>
          (<?=date('d/m/Y',strtotime($r->DATANASCIMENTOTESTEMUNHA2))?>),
          <?php endif; ?>

          <!-- Idade da Testemunha 2 -->			
          <?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>
          <?=" com ".idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA2,$r->DATANASCIMENTO)." anos de idade na ocasião do parto,"?>
          <?php endif; ?>

          <!-- RG da Testemunha 2 -->
          <?php if (isset($r->RGTESTEMUNHA2) && !empty($r->RGTESTEMUNHA2)): ?>
          <?="portador(a) do RG ".$r->RGTESTEMUNHA2?> <?=$r->ORGAOEMISSORTESTEMUNHA2?>,
          <?php endif; ?>

          <!-- CPF da Testemunha 2 -->
          <?php if (isset($r->CPFTESTEMUNHA2) && !empty($r->CPFTESTEMUNHA2)): ?>
          <?=" CPF nº ".$r->CPFTESTEMUNHA2?>,
          <?php endif; ?>

          <!-- Endereço da Testemunha 2 -->
          <?php if ($r->ENDERECOTESTEMUNHA2!='' || $r->BAIRROTESTEMUNHA2!='' || $r->CIDADETESTEMUNHA2!=''): ?>
          residente e domiciliado(a)
          <?php endif; ?>

          <?php if (isset($r->ENDERECOTESTEMUNHA2) && !empty(mb_convert_case($r->ENDERECOTESTEMUNHA2, MB_CASE_TITLE, "UTF-8"))): ?>
          <?="à ".mb_convert_case($r->ENDERECOTESTEMUNHA2, MB_CASE_TITLE, "UTF-8")?>,
          <?php endif; ?>

          <?php if (isset($r->BAIRROTESTEMUNHA2) && !empty(mb_convert_case($r->BAIRROTESTEMUNHA2, MB_CASE_TITLE, "UTF-8"))): ?>
          <!-- Condição Endereço -->
          <?php if (isset($r->ENDERECOTESTEMUNHA2) && !empty($r->ENDERECOTESTEMUNHA2)): ?>
          <?php else: ?>  
          no bairro
          <?php endif ?>
          <?=mb_convert_case($r->BAIRROTESTEMUNHA2, MB_CASE_TITLE, "UTF-8")?>, 
          <?php endif; ?>

          <?php if (isset($r->CIDADETESTEMUNHA2) && !empty(mb_convert_case($r->CIDADETESTEMUNHA2, MB_CASE_TITLE, "UTF-8"))): ?>
          <!-- Condição Cidade -->
          <?php if (isset($r->BAIRROTESTEMUNHA2) && !empty($r->BAIRROTESTEMUNHA2)): ?>
          
          <?php else: ?>  
          na cidade de
          <?php endif ?>
          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA2)); foreach($c as $c):?>
          <?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
          <?php endforeach ?>
          <?php endif; ?>
          
          que declaram sob as penas da lei conhecer a mãe e a existência da gravidez.
        <?php endif ?>

          <!-- Tipo de Local de Nascimento -->
          <!-- Nascido fora da unidade de saúde -->
          <?php if ($r->TIPOLOCALNASCIMENTO == 'FORA_UNIDADE_SAUDE' && $r->TIPOASSENTO == 'COMUN'): ?>
          Observação: nascimento ocorrido sem assistência médica, em residência, fora de unidade hospitalar ou fora de casa de saúde.

          <?php if (isset($r->DNV) && !empty($r->DNV)): ?>
          <?="DNV (declaração de nascido vivo) preenchida por este oficial e identificada pelo nº ".$r->DNV.". Lido em voz alta e clara, achado conforme,"?>
          <?php endif; ?>

          <!-- AQUI -->
          
          <!-- Condição E -->
          <?php if (isset($r->NOMETESTEMUNHA1) && !empty($r->NOMETESTEMUNHA2)): ?>
          segue assinado pelo(a) declarante e duas testemunhas.
          <?php else: ?>  
          segue assinado pelo(a) declarante.
          <?php endif ?>

          <?php endif ?>

          <!-- Registro de indígena -->
          <?php if ($r->RANI!=''): ?>
          Observação: registro de nascimento indígena, Nº RANI: <?=$r->RANI?>. 
          <?php endif ?>
          
          <!-- Registro Tardio -->
          <?php if ($r->TIPOASSENTO == 'REGISTROT'): ?>
          Observação: registro tardio feito conforme Art. 46 e seguintes da Lei 6.015 e Provimento Nº 28 do CNJ -
          Conselho Nacional de Justiça.
          <?php endif ?>
          
          <!-- Posto Avançado -->
          <?php if ($r->TIPOASSENTO == 'POSTO' && $r->TIPOLOCALNASCIMENTO == 'UNIDADE_SAUDE'): ?> 
          Observação: registro de nascimento feito em posto avançado de registro de nascimentos, administrado por esta serventia.
          <?php endif ?>

          <?php if ($r->QUALIDADEDECLARANTE =='PAI'): ?>
          Assina o pai.
          <?php elseif ($r->QUALIDADEDECLARANTE =='MAE'): ?>
          Assina a mãe.
          <?php elseif ($r->QUALIDADEDECLARANTE =='AMBOSPAI'): ?>
          Assinam os pais do registrando.
          <?php else : ?>
          Assina o declarante.
          <?php endif ?>

          <!-- Pai Menor -->
          <?php if ($r->ROGOPAISOCIO == 'PAIDEMENOR'): 
          $reppai = explode(",", $r->NOMEPAISOCIO); 
          ?>
          Observação: o pai é de menor de idade, estando acompanhado(a) do(a) Sr(a). <strong><?=mb_strtoupper($reppai[0])?></strong>, sendo o(a) mesmo(a) seu(ua) <?=mb_strtolower($reppai[1])?>. Que assina este termo.
          <?php endif ?>

          <!-- Mãe Menor -->
          <?php if ($r->ROGOMAESOCIO == 'MAEDEMENOR'): 
          $repmae = explode(",", $r->NOMEMAESOCIO); 
          ?>
          Observação: a mãe é de menor de idade, estando acompanhado(a) do Sr(a). <strong><?=mb_strtoupper($repmae[0])?></strong>, sendo o(a) mesmo(a) seu(ua) <?=mb_strtolower($repmae[1])?>. Que assina este termo.
          <?php endif ?>


          <?php endif ?> 

          <?php endif ?>
          <!-- Averbação -->
          <?php 
			$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVRONASCIMENTO' and strFolha = '$r->FOLHANASCIMENTO' and strTipo = 'NA' and nome = '$r->NOMENASCIDO' and setRegistroInvisivel!='S' ");
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
          if ($busca_averbacoes->rowCount() == 0) {
            echo "";
          }
          if ($r->AVERBACAOTERMOANTIGO!='') {
            echo $r->AVERBACAOTERMOANTIGO;
          }

          $busca_anotacoes = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$r->LIVRONASCIMENTO' and FOLHA = '$r->FOLHANASCIMENTO' and TIPO = 'NAS'  ");
          $busca_anotacoes->execute();
          $ban = $busca_anotacoes->fetchAll(PDO::FETCH_OBJ);
          foreach ($ban as $ban) {
          	echo $ban->ANOTACAO;
          }
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


      <!-- Final -->
      Eu, <?=mb_strtoupper($nome_assinatura)?>, <?=mb_strtoupper($funcao_assinatura)?>,
      do Registro Civil das Pessoas Naturais, dou fé e assino. Era o que continha
      o referido registro aqui fielmente transcrito. 
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


<!--SELOS DE AVERBAÇÃO ==============================================================================-->

				<div style="
				display: flex;
				width: 70%;
				margin-left: 33%;
				padding-right: 0%;
				padding-top: 14px;
				margin-right: -30%;
				padding-left: 30px;
				margin-bottom: -300px;
				">



				<?php
				$cont_selos = 0;
				$data_hoje = date('Y-m-d');
				$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVRONASCIMENTO' and strFolha = '$r->FOLHANASCIMENTO' and strTipo = 'NA' and strOrdem!='A' and dataAverbacao = '$data_hoje' ");
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
								<?php if ($cont_selos >= 3): ?>margin-top: 18cm;margin-left:-18cm;<?php endif ?>
								">
									<p style="max-width: 40%; text-align: justify;margin-right: -5px;">
										<img style="background: none; width: 90px;margin-top: -30px;z-index: -1;" src="data:image/png;base64,<?=$seloret->qrCode?>"alt="Qr Code" /> </img>
									</p>
									<p style="max-width: 70%;font-size: 7px;  text-align: justify;">
										<?=caracteres_selador($seloret->textoSelo)?>
									</p>
								</div>


							<?php endforeach;endif; endfor?>	
						


						<?php

						$up_av = $pdo->prepare("UPDATE averbacoes_civil set strOrdem = 'I' where ID = '$ba->ID'");
						$up_av->execute();
						$selos_array = '';
						endforeach; ?>
						</div>
<!--END SELOS DE AVERBAÇÃO ==============================================================================-->			



<?php if ($r->ATONASCIMENTO == '14.11' && $busca_averbacoes->rowCount()>0): ?>
<div style="position: absolute;width: 50px; margin-left: 0px;width: 200px; margin-top: 30px;"> 
<?php
	$retorno = json_decode($r->RETORNOSELODIGITAL,true);
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

<!--


1. verificar se ja foi registrado log da exibição do selo.
2. se não foi, acrescentar no log e exibir;
3. se foi decrescentar do log, se a quantidade de exibições for menor que 1 não exibira mais.


-->


<?php 

$abrir_arquivo_exibir_selos = file_get_contents("config_paginas/exibir_selo.json");
$decode_exibir = json_decode($abrir_arquivo_exibir_selos, true);
$nome_cert = "cert_id_".$id;

if (isset($decode_exibir[$nome_cert])){

	$quantidade_exibir = $decode_exibir[$nome_cert];

	if ($quantidade_exibir > 0) {
		$nova_quantidade_exibir = $quantidade_exibir - 1;
	}
	else{
	$nova_quantidade_exibir = 0;	
	}


	$preconteudo = $abrir_arquivo_exibir_selos;
	$conteudo = str_replace('"cert_id_'.$id.'":"'.$decode_exibir[$nome_cert].'"}', '"cert_id_'.$id.'":"'.$nova_quantidade_exibir.'"}', $preconteudo);
	$arquivo = fopen('config_paginas/exibir_selo.json','w');
	$escrever = fwrite($arquivo, $conteudo);
	$fechar = fclose($arquivo);	


}

else{
	$conteudo = str_replace("}", "", $abrir_arquivo_exibir_selos);
	$conteudo .= ',"cert_id_'.$id.'":"3"}';
	$arquivo = fopen('config_paginas/exibir_selo.json','w');
	$escrever = fwrite($arquivo, $conteudo);
	$fechar = fclose($arquivo);	
}




$abrir_arquivo_exibir_selos = file_get_contents("config_paginas/exibir_selo.json");
$decode_exibir = json_decode($abrir_arquivo_exibir_selos, true);
$nome_cert = "cert_id_".$id;


 ?>


<?php if ($r->ATONASCIMENTO == '14.3.4' && $decode_exibir[$nome_cert] > 0): ?>
<div style="position: absolute;width: 50px; margin-left: 0px;width: 200px; margin-top: 30px;"> 
<?php
	$retorno = json_decode($r->RETORNOSELODIGITAL,true);
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





<?php if (isset($_GET['sav'])): 
$selo_busca_sav = $_GET['sav'].'<br>';
$busca_selo_sav = $pdo->prepare("SELECT * FROM auditoria where strSelo = '$selo_busca_sav' limit 1 ");
$busca_selo_sav->execute();
$bssav = $busca_selo_sav->fetch(PDO::FETCH_ASSOC);
	?>
<div style="position: absolute;width: 50px; margin-left: 0px;width: 200px; margin-top: 30px;"> 
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
					margin-top: -23cm;
					<?php elseif($cont_selos <= 2 && $cont_selos >0): ?>
						margin-top: 300px;
					<?php else: ?>
					margin-top: 300px;
					<?php  ?>	
				<?php endif ?>
				"><legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
					<?=$av_outra_folha?>
				</fieldset>
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


</body>
</html>
