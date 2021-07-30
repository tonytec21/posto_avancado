<!DOCTYPE html>
<?php include('../../../controller/db_functions.php');
$pdo = conectar();
#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
if (isset($_GET['id_apagar'])) {$id_apagar = $_GET['id_apagar'];
    $del = $pdo->prepare("DELETE FROM salvar_editor where IDREGISTRO ='$id_apagar' and TIPO = 'TERMO_OBITO' ");
    $del->execute();
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
body{ font-size: 14px;font-family: "Arial";margin-left: 2cm;margin-bottom: -10cm;}
</style>
</head>

<body>

<?php 
$busca_ja_existe = $pdo->prepare("SELECT * FROM salvar_editor where IDREGISTRO = '$id' and TIPO = 'TERMO_OBITO'");
	$busca_ja_existe->execute();

	if ($busca_ja_existe->rowCount()!=0) {
	$recebe_texto = $busca_ja_existe->fetch(PDO::FETCH_ASSOC);
	echo $recebe_texto['TEXTO'];
	}	
	?>
	<?php if ($busca_ja_existe->rowCount()==0): ?>

	<?php $r = PESQUISA_ALL_ID('registro_obito_novo',$id);
	foreach ($r as $r ) :
	#aqui vai preencher os inputs, vou preencher só um pra vc ver:
		?>
<?php 
if ($r->ESTADOCIVIL == 'SO'  ) {
	$ec = "solteiro(a)";
}
 if($r->ESTADOCIVIL == 'CA'   ){
	$ec="casado(a)";
}


 if($r->ESTADOCIVIL == 'DI'  ){
	$ec="divorciado(a)";
}

 if($r->ESTADOCIVIL == 'VI'  ){
	$ec="viúvo(a)";
}


 if($r->ESTADOCIVIL == 'UN' ){
	$ec="em união estável";
}

 if($r->ESTADOCIVIL == 'SJ' ){
	$ec="separado(a) judicialmente";
}
	?>
<img style="width: 100%;height: 4cm; margin-top: -60px;" src="../bd_INSERTS/cabecalhos/CAPA.jpg">
<div style="width: 100%; text-align: center; display: block;margin-top: -30px;" >
												<h3 style="display: inline-block;">LIVRO: C <?=intval($r->LIVROOBITO)?></h3>
												<h3 style="display: inline-block;margin-left: 1cm">ORDEM: <?=$r->TERMOOBITO?></h3>
												<h3 style="display: inline-block;margin-left: 1cm">FOLHA: <?=intval($r->FOLHAOBITO)?></h3>	
												</div>
<hr style="border:1px solid black;margin-top: -5px">

<?php if ($r->DATAENTRADA==''): ?>
	<span style="color: red">O CAMPO "DATA DO REGISTRO" NÃO FOI PREENCHIDO POR FAVOR RETORNE E PREENCHA.</span>
<?php break; endif ?>

<?php if ($r->DATAOBITO==''): ?>
	<span style="color: red">O CAMPO "DATA DO OBITO" NÃO FOI PREENCHIDO POR FAVOR RETORNE E PREENCHA.</span>
<?php break; endif ?>

<h1 style="text-align: center;margin-top: -5px">Registro de Óbito</h1>	

<p style="text-align: justify;">Ao(s) 



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
echo GExtenso::numero($novaDataRegistro[2]);
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
echo "onze";
}
elseif (substr($dataAno, -1) == '1') {
echo "um";
}
else {
  echo GExtenso::numero($dataAno);
}

endif;?>

(<?=date('d/m/Y',strtotime($r->DATAENTRADA))?>),


	 neste
	<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?>


			<?=mb_convert_case($w->strRazaoSocial, MB_CASE_TITLE, "UTF-8")?> Estado do Maranhão, <?php endforeach ?>
			compareceu neste Ofício de Registro Civil,
			<!-- Declarante -->
			<?php if (isset($r->NOMEDECLARANTE) && !empty($r->NOMEDECLARANTE)): ?>
			<strong><?=mb_strtoupper($r->NOMEDECLARANTE)?></strong>,
			<?php endif; ?> 

			<!-- Nacionalidade -->
			<?php if (isset($r->NACIONALIDADEDECLARANTE) && !empty($r->NACIONALIDADEDECLARANTE)): ?>
			<?=strtolower($r->NACIONALIDADEDECLARANTE)?>,
			<?php endif; ?> 

			<!-- Nacionalidade -->
			<?php if (isset($r->NATURALIDADEDECLARANTE) && !empty($r->NATURALIDADEDECLARANTE)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEDECLARANTE)); foreach($c as $c):?>
			<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
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

			<!-- RG -->
			<?php if (isset($r->RGDECLARANTE) && !empty($r->RGDECLARANTE)): ?>
			<?="portador(a) do RG ".$r->RGDECLARANTE?> <?=$r->ORGAOEMISSORDECLARANTE?>,
			<?php endif; ?>

			<!-- CPF -->
			<?php if (isset($r->CPFDECLARANTE) && !empty($r->CPFDECLARANTE)): ?>
			<?=" CPF nº ".$r->CPFDECLARANTE?>,
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
			echo GExtenso::numero($novaDataRegistro[2]);
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
			echo "onze";
			}
			elseif (substr($dataAno, -1) == '1') {
			echo "um";
			}
			else {
			echo GExtenso::numero($dataAno);
			} 
			endif;?>
			(<?=date('d/m/Y',strtotime($r->DATANASCIMENTODECLARANTE))?>),
			<?php endif; ?>

			<!-- Idade -->			
			<?php if ($r->DATANASCIMENTODECLARANTE!=''): ?>
			<?=" com ".idade_civil_antigo($r->DATANASCIMENTODECLARANTE,$r->DATAOBITO)." anos de idade"?>,
			<?php endif ?>

			<!-- Endereço -->
			<?php if (isset($r->ENDERECODECLARANTE) && !empty(mb_convert_case($r->ENDERECODECLARANTE, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="residente e domiciliado(a) à ".mb_convert_case($r->ENDERECODECLARANTE, MB_CASE_TITLE, "UTF-8")?>,
			<?=mb_convert_case($r->BAIRRODECLARANTE, MB_CASE_TITLE, "UTF-8")?>, 
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEDECLARANTE)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
			<?php endforeach ?>
			<?php endif; ?>

			<!-- DO -->
			<?php if (isset($r->NDO) && !empty($r->NDO)): ?>
			<?="que apresentando a DO nº ".$r->NDO.", a qual se encontra arquivada nesta Unidade de Serviço"?>,
			<?php endif; ?> 

			<!-- Médico -->
			<?php if (isset($r->MEDICO) && !empty($r->MEDICO)): ?>
			<?="e exibindo atestado de óbito, firmado pelo  Dr. ".$r->MEDICO?>,
			<?php endif; ?> 
			<?php if (isset($r->CRM) && !empty($r->CRM)): ?>
			<?="CRM nº ".$r->CRM." que consta como causa da morte"?>,
			<?php endif; ?> 

			<!-- Causas da Morte -->
			<strong>
			<?php if (isset($r->CAUSAOBITO) && !empty($r->CAUSAOBITO)): ?>
			<?=mb_strtoupper($r->CAUSAOBITO)?>,
			<?php endif; ?> 
			<?php if (isset($r->CAUSAOBITOB) && !empty($r->CAUSAOBITOB)): ?>
			<?=mb_strtoupper($r->CAUSAOBITOB)?>,
			<?php endif; ?> 
			<?php if (isset($r->CAUSAOBITOC) && !empty($r->CAUSAOBITOC)): ?>
			<?=mb_strtoupper($r->CAUSAOBITOC)?>,
			<?php endif; ?>
			<?php if (isset($r->CAUSAOBITOD) && !empty($r->CAUSAOBITOD)): ?>
			<?=mb_strtoupper($r->CAUSAOBITOD)?>,
			<?php endif; ?>
			</strong>

	 		<?php if ($r->TIPOMORTE == 'NAT'): ?>
			sendo a morte por motivo natural,
	 	 	<?php elseif ($r->TIPOMORTE == 'VIO'): ?>
			sendo a morte por motivo violento,
	 		<?php else: ?>
	 		<?php endif ?>

	  		registra-se que em, 

			<!-- DATA DO ÓBITO -->
			<?php  if (!empty($r->DATAOBITO) && $r->DATAOBITO != '0000-00-00'  || $r->DATAOBITO != NULL  && $r->DATAOBITO != '0000-00-00'  ) :?>
			<?php
			$data = $r->DATAOBITO ;
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
			echo GExtenso::numero($novaDataRegistro[2]);
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
			echo "onze";
			}
			elseif (substr($dataAno, -1) == '1') {
			echo "um";
			}
			else {
			echo GExtenso::numero($dataAno);
			}

			endif;?>

			(<?=date('d/m/Y',strtotime($r->DATAOBITO))?>),	

			<!-- Hora do Óbito -->
			<?php if ($r->HORAOBITO!='' && !empty($r->HORAOBITO)): ?>
			<?="às ".$r->HORAOBITO." horas"?>,
			<?php endif ?>

			<!-- Local da Morte -->
			<?php if ($r->LOCALMORTE!='' && !empty($r->LOCALMORTE)): ?>
			<?="no(a) ".mb_convert_case($r->LOCALMORTE, MB_CASE_TITLE, "UTF-8")?>,
			<?php endif ?>

			<!-- Endereço do Óbito -->
			<?php if (isset($r->ENDERECOOBITO) && !empty(mb_convert_case($r->ENDERECOOBITO, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="situado à  ".mb_convert_case($r->ENDERECOOBITO, MB_CASE_TITLE, "UTF-8")?>,
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEOBITO)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
			<?php endforeach ?>
			<?php endif; ?>
			 
			  faleceu:
			
			<!-- Nome do Falecido -->
			<p style="text-align: center; font-weight: bold;">
			<?php if ($r->NOME !='DESCONHECIDO'): ?>
			<?=mb_strtoupper($r->NOME)?>
			<?php endif ?>
			<?php if ($r->NOME =='DESCONHECIDO'): ?>
 			um(a) individuo de identidade desconhecida,
			<?php endif ?>
			</p>
			
			<!-- Nacionalidade do Falecido -->
			<?php if ($r->NACIONALIDADE!='' && !empty($r->NACIONALIDADE)): ?>
			<?=mb_strtolower($r->NACIONALIDADE)?>,
			<?php endif ?>

			<!-- Estado Civil do Falecido -->
			<?php if (isset($ec) && $ec!=''): ?>
			<?=$ec?>, 
			<?php endif ?>
			<?php if ($r->ESTADOCIVIL == 'CA' || $r->ESTADOCIVIL == 'VI'): ?>
			sendo, o(a) conjuge <?=mb_strtoupper($r->NOMECONJUGE)?>, casamento celebrado no cartório <?=mb_strtoupper($r->CARTORIOCASAMENTO)?>,
			<?php endif ?>
			
			<!-- Sexo do Falecido -->
			<?php if ($r->SEXO!='' && !empty($r->SEXO)): ?>
			<?php if ($r->SEXO == 'M'):?>do sexo masculino, <?php else: ?>do sexo feminino, <?php endif ?>
			<?php endif ?>
				
			<!-- Cor do Falecido -->
			<?php if ($r->COR!='' && !empty($r->COR)): ?>
			<?php 
			if ($r->COR=='BR') {
				$cor = 'branca';
			} 
			if ($r->COR=='PR') {
				$cor = 'preta';
			} 
			if ($r->COR=='PA') {
				$cor = 'parda';
			} 
			if ($r->COR=='AM') {
				$cor = 'amarela';
			} 
			if ($r->COR=='IN') {
				$cor = 'indígena';
			}
			if ($r->COR=='') {
				$cor = '';
			} 
			?>
			<?="de cor ".$cor?>,
			<?php endif ?>

			<!-- Data de Nascimento do Falecido -->
			<?php if ($r->DATANASCIMENTO!='' && !empty($r->DATANASCIMENTO)): ?>
			<?="nascido(a) em "?>
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
			echo GExtenso::numero($novaDataRegistro[2]);
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
			echo "onze";
			}
			elseif (substr($dataAno, -1) == '1') {
			echo "um";
			}
			else {
			echo GExtenso::numero($dataAno);
			} 
			endif;?>
			(<?=date('d/m/Y',strtotime($r->DATANASCIMENTO))?>),
			<?php endif ?>

			<!-- Idade do Falecido-->			
			<?php if ($r->DATANASCIMENTO!=''): ?>
			<?=" com ".idade_civil_antigo($r->DATANASCIMENTO,$r->DATAOBITO)." anos de idade"?>,
			<?php endif ?>
			
			<!-- Profissão do Falecido -->
			<?php if (isset($r->PROFISSAO) && !empty($r->PROFISSAO)): ?>
			<?=mb_strtolower($r->PROFISSAO)?>,
			<?php endif; ?> 

			<!-- Naturalidade do Falecido -->
			<?php if (isset($r->NATURALIDADE) && !empty($r->NATURALIDADE)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADE)); foreach($c as $c):?>
			<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
			<?php endif; ?>

			<!-- Endereço do Falecido -->
			<?php if (isset($r->ENDERECO) && !empty(mb_convert_case($r->ENDERECO, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="residente e domiciliado(a) à ".mb_convert_case($r->ENDERECO, MB_CASE_TITLE, "UTF-8")?>,
			<?=mb_convert_case($r->BAIRRO, MB_CASE_TITLE, "UTF-8")?>, 
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADE)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
			<?php endforeach ?>
			<?php endif; ?>
		
			filho(a) de
													
			<!-- Qualificação do Pai do Faleicido -->	
			<?php if ($r->NOMEPAI!='NULL' && $r->NOMEPAI!=''):?>
			<?=mb_strtoupper($r->NOMEPAI)?>

			<!-- Nacionalidade do Pai do Falecido -->
			<?php if ($r->NACIONALIDADEPAI!='' && !empty($r->NACIONALIDADEPAI)): ?>
			<?=", ".mb_strtolower($r->NACIONALIDADEPAI)?>,
			<?php endif ?>
			
			<!-- Naturalidade do Pai do Falecido -->
			<?php if (isset($r->NATURALIDADEPAI) && !empty($r->NATURALIDADEPAI)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAI)); foreach($c as $c):?>
			<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
			<?php endif; ?>

			<!-- Estado Civil do Pai do Falecido -->
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

			<!-- Profissão do Pai do Falecido -->
			<?php if (isset($r->PROFISSAOPAI) && !empty($r->PROFISSAOPAI)): ?>
			<?=mb_strtolower($r->PROFISSAOPAI)?>,
			<?php endif; ?> 

			<!-- RG do Pai do Falecido -->
			<?php if (isset($r->RGPAI) && !empty($r->RGPAI)): ?>
			<?="portador(a) do RG ".$r->RGPAI?> <?=$r->ORGAOEMISSORPAI?>,
			<?php endif; ?>

			<!-- CPF do Pai do Falecido -->
			<?php if (isset($r->CPFPAI) && !empty($r->CPFPAI)): ?>
			<?=" CPF nº ".$r->CPFPAI?>,
			<?php endif; ?>

			<!-- Data de Nascimento do Pai do Falecido-->
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
			echo GExtenso::numero($novaDataRegistro[2]);
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
			echo "onze";
			}
			elseif (substr($dataAno, -1) == '1') {
			echo "um";
			}
			else {
			echo GExtenso::numero($dataAno);
			} 
			endif;?>
			(<?=date('d/m/Y',strtotime($r->DATANASCIMENTOPAI))?>),
			<?php endif; ?>

			<!-- Idade do Pai do Falecido -->			
			<?php if ($r->DATANASCIMENTOPAI!=''): ?>
			<?=" com ".idade_civil_antigo($r->DATANASCIMENTOPAI,$r->DATAOBITO)." anos de idade"?>,
			<?php endif ?>

			<!-- Endereço do Pai do Falecido -->
			<?php if (isset($r->ENDERECOPAI) && !empty(mb_convert_case($r->ENDERECOPAI, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="residente e domiciliado(a) à ".mb_convert_case($r->ENDERECOPAI, MB_CASE_TITLE, "UTF-8")?>,
			<?=mb_convert_case($r->BAIRROPAI, MB_CASE_TITLE, "UTF-8")?>, 
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAI)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
			<?php endforeach ?>
			<?php endif; ?>
			
			<!-- E de -->			
			<?php if ($r->NOMEPAI!='' && !empty($r->NOMEPAI)): ?>
			<?=" e de "?>
			<?php endif; ?>
			
			<!-- Qualificação da Mãe do Faleicido -->	
			<?php if ($r->NOMEMAE!='' && !empty($r->NOMEMAE)): ?>
			<?=mb_strtoupper($r->NOMEMAE)?>
			<?php endif; ?>

			<!-- Nacionalidade da Mãe do Falecido -->
			<?php if ($r->NACIONALIDADEMAE!='' && !empty($r->NACIONALIDADEMAE)): ?>
			<?=", ".mb_strtolower($r->NACIONALIDADEMAE)?>,
			<?php endif; ?>
			
			<!-- Naturalidade da Mãe do Falecido -->
			<?php if (isset($r->NATURALIDADEMAE) && !empty($r->NATURALIDADEMAE)): ?>
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAE)); foreach($c as $c):?>
			<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
			<?php endif; ?>

			<!-- Estado Civil da Mãe do Falecido -->
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

			<!-- Profissão da Mãe do Falecido -->
			<?php if (isset($r->PROFISSAOMAE) && !empty($r->PROFISSAOMAE)): ?>
			<?=mb_strtolower($r->PROFISSAOMAE)?>,
			<?php endif; ?> 

			<!-- RG da Mãe do Falecido -->
			<?php if (isset($r->RGMAE) && !empty($r->RGMAE)): ?>
			<?="portador(a) do RG ".$r->RGMAE?> <?=$r->ORGAOEMISSORMAE?>,
			<?php endif; ?>

			<!-- CPF da Mãe do Falecido -->
			<?php if (isset($r->CPFMAE) && !empty($r->CPFMAE)): ?>
			<?=" CPF nº ".$r->CPFMAE?>,
			<?php endif; ?>

			<!-- Data de Nascimento da Mãe do Falecido-->
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
			echo GExtenso::numero($novaDataRegistro[2]);
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
			echo "onze";
			}
			elseif (substr($dataAno, -1) == '1') {
			echo "um";
			}
			else {
			echo GExtenso::numero($dataAno);
			} 
			endif;?>
			(<?=date('d/m/Y',strtotime($r->DATANASCIMENTOMAE))?>),
			<?php endif; ?>

			<!-- Idade da Mãe do Falecido -->			
			<?php if ($r->DATANASCIMENTOMAE!=''): ?>
			<?=" com ".idade_civil_antigo($r->DATANASCIMENTOMAE,$r->DATANASCIMENTO)." anos de idade na ocasião do parto,"?>
			<?php endif; ?>
			<?php if ($r->DATANASCIMENTOMAE!=''): ?>
			<?=" e agora com ".idade_civil_antigo($r->DATANASCIMENTOMAE,$r->DATAENTRADA)." anos de idade"?>,
			<?php endif; ?>

			<!-- Endereço da Mãe do Falecido -->
			<?php if (isset($r->ENDERECOMAE) && !empty(mb_convert_case($r->ENDERECOMAE, MB_CASE_TITLE, "UTF-8"))): ?>
			<?="residente e domiciliado(a) à ".mb_convert_case($r->ENDERECOMAE, MB_CASE_TITLE, "UTF-8")?>,
			<?=mb_convert_case($r->BAIRROMAE, MB_CASE_TITLE, "UTF-8")?>, 
			<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAE)); foreach($c as $c):?>
			<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
			<?php endforeach ?>
			<?php endif; ?>						
			<?php endif; ?>

			<!-- Final Filiação -->			
			<?php if ($r->NOMEMAE!='' && !empty($r->NOMEMAE)): ?>
			<?="."?>
			<?php endif; ?>
			
			<!-- Local de Sepultamento -->
			<?php if (isset($r->LOCALSEPULTAMENTO) && !empty($r->LOCALSEPULTAMENTO)): ?>
			<?="Local de sepultamento: ".mb_convert_case($r->LOCALSEPULTAMENTO, MB_CASE_TITLE, "UTF-8")?>.
			<?php endif; ?>

			<!-- Documentos apresentados -->
			<?php if (isset($r->NOME)): ?>
			<?="O declarante apresentou os seguintes documentos do falecido,"?>
			<?php if (isset($r->NOME) & !empty($r->RG)): ?>
			<?="RG nº ".$r->RG?> <?=$r->ORGAOEMISSOR.","?>
			<?php endif; ?>
			<?php if (isset($r->NOME) && !empty($r->CPF)): ?>
			<?="CPF nº ".$r->CPF.","?>
			<?php endif; ?>
			<?php if (isset($r->NOME) && !empty($r->NDO)): ?>
			<?="DO nº ".$r->NDO.","?>
			<?php endif; ?>
			<?php if ($r->strTituloEleitor!=''): ?>
			<?="Titulo de Eleitor nº ".$r->strTituloEleitor.","?>
			<?php endif; ?>
			<?php if ($r->strCtps!=''): ?>
			<?="CTPS nº ".$r->strCtps.","?>
			<?php endif; ?>
			<?php if ($r->strPassaporte!=''): ?>
			<?="Passaporte nº ".$r->strPassaporte.","?>
			<?php endif; ?>
			<?php if ($r->strPisNis!=''): ?>
			<?="PIS/NIS: nº ".$r->strPisNis.","?>
			<?php endif; ?>
			<?php if ($r->strCartSaude!=''): ?>
			<?="Cartão Saúde: nº ".$r->strCartSaude.","?>
			<?php endif; ?>
			<?php endif; ?>
			
			<!-- Dos Bens -->
		    <?php if ($r->DEIXOUBENS == 'S'): ?>
			deixou bens, com testamento Conhecido, 
			<?php elseif ($r->DEIXOUBENS == 'S2'): ?>
			deixou bens, sem testamento Conhecido,
			<?php elseif ($r->DEIXOUBENS == 'N'): ?>
			não deixou bens, Com testamento conhecido,	
			<?php else: ?>
			não deixou bens, sem testamento conhecido,	
			<?php endif ?> 

			<!-- Eleitor -->
			<?php if ($r->ELEITOR == 'S'): ?>
			era eleitor,
			<?php else: ?>
			não sendo eleitor,	
			<?php endif ?>

			<!-- Dos Filhos -->
			<?php if ($r->DEIXOUFILHOS == 'S'): ?>
			deixou filhos(as), sendo eles: <?=mb_strtoupper($r->NOMEFILHOS)?>.
			<?php else: ?>
			não deixou nenhum filho(a).
			<?php endif ?>
			

<!-- PAREI AQUI -->


			<?php if ($r->NOMETESTEMUNHA1!='' || $r->NOMETESTEMUNHA2!=''): ?>
  

												  São testemunhas do assento 
													
														<span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMETESTEMUNHA1)?></span>,
														<?=strtolower($r->NACIONALIDADETESTEMUNHA1)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA1)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
														<?php endforeach ?> 
														<?php if ($r->ESTADOCIVILTESTEMUNHA1 == 'CA'): ?>
														casado(a),
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'SO'): ?>
														solteiro(a),
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'DI'): ?>
														divorciado(a),	
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'VI'): ?>
														viúvo(a),	
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'UN'): ?>
														em união estável,
														<?php else: ?>

														<?php endif ?><?=mb_strtolower($r->PROFISSAOTESTEMUNHA1)?>, portador do RG de número <?=$r->RGTESTEMUNHA1?>/<?=$r->ORGAOEMISSORTESTEMUNHA1?>, inscrito no CPF de número <?=$r->CPFTESTEMUNHA1?>,  

														<?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>


														nascido em
														<?php //echo date('d/m/Y', strtotime($r->dataObito));

														$data = $r->DATANASCIMENTOTESTEMUNHA1 ;
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
														} elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
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


														?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOTESTEMUNHA1))?>),	
														<?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>
														com <?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA1,$r->DATAOBITO)?> anos de idade, 
														<?php endif ?><?php endif ?>
														residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOTESTEMUNHA1)?>, <?=mb_strtolower($r->BAIRROTESTEMUNHA1)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA1)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,<?php endforeach ?>

													e 	 
																<span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMETESTEMUNHA2)?></span>,
														<?=strtolower($r->NACIONALIDADETESTEMUNHA2)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA2)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
														<?php endforeach ?> 
														<?php if ($r->ESTADOCIVILTESTEMUNHA2 == 'CA'): ?>
														casado(a),
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'SO'): ?>
														solteiro(a),
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'DI'): ?>
														divorciado(a),	
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'VI'): ?>
														viúvo(a),	
														<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'UN'): ?>
														em união estável,
														<?php else: ?>

														<?php endif ?><?=mb_strtolower($r->PROFISSAOTESTEMUNHA2)?>, portador do RG de número <?=$r->RGTESTEMUNHA2?>/<?=$r->ORGAOEMISSORTESTEMUNHA2?>, inscrito no CPF de número <?=$r->CPFTESTEMUNHA2?>,  

														<?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>


														nascido em
														<?php //echo date('d/m/Y', strtotime($r->dataObito));

														$data = $r->DATANASCIMENTOTESTEMUNHA2 ;
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
														} elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
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


														?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOTESTEMUNHA2))?>),	
														<?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>
														com <?=idade_civil_antigo($r->DATANASCIMENTOTESTEMUNHA2,$r->DATAOBITO)?> anos de idade, 
														<?php endif ?><?php endif ?>
														residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOTESTEMUNHA2)?>, <?=mb_strtolower($r->BAIRROTESTEMUNHA2)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA2)); foreach($c as $c):?>
														<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>.
													<?php endif ?>



	<!-- Funcionário / Função -->
	<?="Isento de emolumentos conforme Lei 9534 de 10/12/1997. Eu, ".mb_convert_case($_SESSION['nome'], MB_CASE_TITLE, "UTF-8").","?>
	<?=mb_convert_case($_SESSION['funcao'], MB_CASE_TITLE, "UTF-8").", digitei e assino."?>
 
	<!-- Matrícula -->
 	Matrícula: <strong><?=$r->MATRICULA?></strong>.

	<!-- Selo -->
 	<?php if (isset($r->SELO) && !empty($r->SELO)): ?>
	<?="Selo de Fiscalização: ".mb_strtoupper($r->SELO)?>
	<?php endif; ?>
	-------------------------------------- <span style="font-size: 8px; text-align: center">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span> -------------------------------------


<?php if ($r->QUALIDADEDECLARANTE == 'MAEDEMENOR'): 
												$repmae = explode(",", $r->ROGODECLARANTE);	
													?>
												
												<span style="font-weight: bold">	Observação: A mãe é de menor de idade, estando acompanhado do sr(a) <?=$repmae[0]?> sendo o mesmo seu(a) <?=$repmae[1]?>. Que assina este termo. </span>
												<?php endif ?>


	 

<br><br>
	<?php if ($r->QUALIDADEDECLARANTE == 'MAEDEMENOR'): ?>
		<br>
		<p style="max-width:  100%; text-align: center;">_________________________________ <br>  <?=mb_strtoupper($repmae[0])?></p><br><br>
		<?php endif ?>
		
<?php if (empty($r->ROGODECLARANTE)): ?>	
	
		
			<p style="max-width:  100%; text-align: center;">__________________________________________________ <br> <?=strtoupper($r->NOMEDECLARANTE)?></p>
			<br>
	
		<?php endif ?>	
	<?php if (!empty($r->ROGODECLARANTE)): $busca_rogo_pai = $pdo->prepare("SELECT * from pessoa where strCPFcnpj = '$r->ROGODECLARANTE'"); $busca_rogo_pai->execute();
		$brp = $busca_rogo_pai->fetchAll(PDO::FETCH_OBJ);	
		foreach ($brp as $b):
		 ?>
	
		

		 <p style="display: inline-block;width: 40%; text-align:justify;font-weight: bold">
			O declarante, na impossibilidade de assinar, está acompanhado de seu assinante a rogo, 
			<?=mb_strtoupper($b->strNome)?>, 

			<?php if (!empty($b->strProfissao)): ?>
			<?=mb_strtolower($b->strProfissao)?>, 	
			<?php endif ?>

			<?php if (!empty($b->strNacionalidade)): ?>
			<?=$b->strNacionalidade?>, 	
			<?php endif ?>

			<?php if ($b->setEstadoCivil == 'CA'): ?>
			casado(a),
			<?php elseif ($b->setEstadoCivil == 'SO'): ?>
			solteiro(a),
			<?php elseif ($b->setEstadoCivil == 'DI'): ?>
			divorciado(a),	
			<?php elseif ($b->setEstadoCivil == 'VI'): ?>
			viúvo(a),	
			<?php elseif ($b->setEstadoCivil == 'UN'): ?>
			em união estável,
			<?php else: ?>

			<?php endif ?>

			<?php if (!empty($b->strNaturalidade)): ?>
			natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($b->strNaturalidade)); foreach($c as $c):?>
			<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
			<?php endforeach ?> 
			<?php endif ?>	

			residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($b->strLogradouro)?>, <?php if ($b->strBairro!=''): ?>

			<?=mb_strtolower($b->strBairro)?>,	<?php endif ?></span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($b->intUFcidade)); foreach($c as $c):?>
			<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>. Que assina este termo.

			</p>
			

		


	
			
		
	 	<table style="border: none; display: inline-block; margin-left: 40px; width: 50%; margin-bottom: -30px">
				<tr style="border: none">
					<td style="border: 1px dashed black;max-width: 50%!important; padding: 30px;"></td>
					<td style="border: none; text-align: center; padding-left: 10px;">_______________________________________________</td>
				</tr>
				<tr style="border: none">
					<td style="border: none;text-align: center;">DIGITAL <?=strtoupper($r->NOMEDECLARANTE)?> </td>
					<td style="border: none; text-align: center; "><p style="margin-top: -40px"><?=strtoupper($b->strNome)?></p></td>
				</tr>
			</table>
			<br><br><br>
		<?php endforeach; endif ?>

<?php if ($r->NOMETESTEMUNHA1 != '' && $r->NOMETESTEMUNHA1 != 'NAO_DECLARADO' && $r->NOMETESTEMUNHA1 !='NULL'): ?>

<p style="max-width:  100%; text-align: center;">________________________________________ <br> <?=$r->NOMETESTEMUNHA1?></p>
<?php endif ?>


<?php if ($r->NOMETESTEMUNHA2 != '' && $r->NOMETESTEMUNHA2 != 'NAO_DECLARADO' && $r->NOMETESTEMUNHA2 !='NULL'): ?>
	
<p style="max-width:  100%; text-align: center;">________________________________________ <br> <?=$r->NOMETESTEMUNHA2?></p>
<?php endif ?>

	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center"><?=mb_strtoupper($_SESSION['nome'])?></p> 
		<p style="text-align: center; margin-top: -10px;"><?=mb_strtoupper($_SESSION['funcao'])?></p> 


	</p>



<div style="width: 60%; position: absolute;margin-top: ">
	<?php
		$retorno = json_decode($r->RETORNOSELODIGITAL,true);
		$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];
	include_once('../../../plugins/phpqrcode/qrlib.php');
	
function tirarAcentos($string){
return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/"),explode(" ","a A e E i I o O u U n N C c"),$string);
}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->NOME).'.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


		#echo '<img style="max-width:20%; margin-top:-12px;margin-left:10px;" src="'.$nome.'" />';
		?>
	
	<!--p style="font-weight: bold; font-size: 6px;"><?=$textoselo?></p-->
</div>
<table style="border:none; max-width: 100%;">
<tr style="border:none">

<td style="border:1px dashed silver">
<img src="<?=$nome?>" />
</td>

<td style="border:1px dashed silver">
<p style="text-align: justify; font-weight: bold; ">
<!-- <?php #echo mb_convert_case((utf8_encode($textoselo)), MB_CASE_UPPER, "UTF-8")?> -->
<?=corrigirACENTO_utf8($textoselo)?>
</p>
</td>




</tr>
</table>


	

<?php endforeach; endif;  ?>
</body>
</html>
