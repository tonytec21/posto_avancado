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

    $qr = $retorno['valorQrCode'];
    $textoselo = $retorno['textoSelo']; 
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
	zoom:90%;
}
}
body{ font-size: 14px;font-family: "Arial"; padding: 4.5cm 1cm 1cm 1cm; 
<?php if (isset($_GET['naoofc'])): ?>
	background: url("../../../images/preview.jpg");
<?php endif ?>
}
</style>
</head>
<?php 
if ($r->ESTADOCIVIL == 'SO'  ) {
	$ec = "SOLTEIRO (a)";
}
 if($r->ESTADOCIVIL == 'CA'   ){
	$ec="CASADO (a)";
}


 if($r->ESTADOCIVIL == 'DI'  ){
	$ec="DIVORCIADO (a)";
}

 if($r->ESTADOCIVIL == 'VI'  ){
	$ec="VIUVO (a)";
}


 if($r->ESTADOCIVIL == 'UN' ){
	$ec="EM UNÎÃO ESTÁVEL";
}

	?>
<body>


<h2 style="text-align: center;">CERTIDÃO <span style="border: 1px solid black"> INTEIRO TEOR </span></h2>
<p style="text-align: center;"><b>Matrícula: <?=$r->MATRICULA?></b></p>
<p style="text-align: center;"><b>Nome: <?=$r->NOME?></b></p>
<p style="text-align: justify;">DESCRIÇÃO:</p>
<fieldset id="container_teor">

<p style="text-align: justify;">
Certifico que por ter sido requerido verbalmente por parte interessada, que
revendo os livros de Obito, deste ofício, encontrei no <?php if ($r->TIPOLIVRO == 4): ?>
	C
	<?php else: ?>
		C AUXILIAR
<?php endif ?> <?=$r->LIVROOBITO?>, folha <?=$r->FOLHAOBITO?>, sob o
número <?=$r->TERMOOBITO?>, o registro cujo teor segue: 
</p>
<!--TERMO NORMAL:|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
				<?php if ($r->TIPOLIVRO == '4'): ?>
					<p style="text-align: justify;">Aos 	

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
				echo GExtenso::numero($dataAno)." onze";
				}
				elseif (substr($dataAno, -1) == '1') {
				echo GExtenso::numero($dataAno)." um";
				}
				else {
				  echo GExtenso::numero($dataAno);
				}

				endif;?>

				(<?=date('d/m/Y',strtotime($r->DATAENTRADA))?>),


					 neste
					<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?>


							<?=mb_convert_case($w->strRazaoSocial, MB_CASE_TITLE, "UTF-8")?> Estado do Maranhão, <?php endforeach ?>



							<?php if (isset($r->NOMEDECLARANTE) && !empty($r->NOMEDECLARANTE)): ?>			
							compareceu neste Ofício de Registro Civil,
							<!-- Declarante -->
							<?php if (isset($r->NOMEDECLARANTE) && !empty($r->NOMEDECLARANTE)): ?>
							<strong><?=mb_strtoupper($r->NOMEDECLARANTE)?></strong>,
							<?php endif; ?> 

							<!-- Nacionalidade -->
							<?php if (isset($r->NACIONALIDADEDECLARANTE) && !empty($r->NACIONALIDADEDECLARANTE)): ?>
							<?=strtolower($r->NACIONALIDADEDECLARANTE)?>,
							<?php endif; ?> 

							<!-- Naturalidade -->
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

							<?php if (isset($r->QUALIDADEDECLARANTE) && !empty($r->QUALIDADEDECLARANTE)): ?>
								na qualidade de <?=$r->QUALIDADEDECLARANTE?>, 
							<?php endif ?>

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
					 		
					 		<!--SE NÃO TIVER DECLARANTE-->
					 		<?php else: ?>

					 		recebi neste Ofício de Registro Civil,
					 		<!-- DO -->
							<?php if (isset($r->NDO) && !empty($r->NDO)): ?>
							<?=" DO nº ".$r->NDO.", a qual se encontra arquivada nesta Unidade de Serviço"?>,
							<?php endif; ?> 

							<!-- Médico -->
							<?php if (isset($r->MEDICO) && !empty($r->MEDICO)): ?>
							<?="e atestado de óbito, firmado pelo  Dr. ".$r->MEDICO?>,
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

					 		<!--FIM DA CONDIÇÃO-->	
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
							<?php if ($r->NOME !='DESCONHECIDO'): ?>
							<?=mb_strtoupper($r->NOME)?>
							<?php endif ?>
							<?php if ($r->NOME =='DESCONHECIDO'): ?>
				 			um(a) individuo de identidade desconhecida,
							<?php endif ?>
							
							<!-- Gemeo -->
							<?php if ($r->GEMEO!='' && $r->GEMEO == 'S'): ?>
							<?php if ($r->SEXO == 'M'): ?>
							O falecido
							<?php else: ?>
							A falecida	
							<?php endif ?>	
							possui irmão gemeo,
							<?php endif ?>

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

							<!-- Idade do Falecido-->			
							<?php if ($r->DATANASCIMENTO!=''): ?>
							<?=" com ".idade_civil_antigo($r->DATANASCIMENTO,$r->DATAENTRADA)." anos de idade"?>,
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

							<!-- Testemunha 1 -->
							<?php if ($r->NOMETESTEMUNHA1!='' || $r->NOMETESTEMUNHA2!=''): ?>
				  
							São testemunhas do assento
							
							<!-- NOME TESTEMUNHA 1 -->
							<?php if (isset($r->NOMETESTEMUNHA1) && !empty($r->NOMETESTEMUNHA1)): ?>
							<?=strtolower($r->NOMETESTEMUNHA1)?>,
							<?php endif; ?> 
							
							<!-- Nacionalidade da Testemunha 1 -->
							<?php if (isset($r->NACIONALIDADETESTEMUNHA1) && !empty($r->NACIONALIDADETESTEMUNHA1)): ?>
							<?=strtolower($r->NACIONALIDADETESTEMUNHA1)?>,
							<?php endif; ?> 

							<!-- Naturalidade da Testemunha 1 -->
							<?php if (isset($r->NATURALIDADETESTEMUNHA1) && !empty($r->NATURALIDADETESTEMUNHA1)): ?>
							<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA1)); foreach($c as $c):?>
							<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
							<?php endif; ?> 
							
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
						
							<!-- RG da Testemunha 1 -->
							<?php if (isset($r->RGTESTEMUNHA1) && !empty($r->RGTESTEMUNHA1)): ?>
							<?="portador(a) do RG ".$r->RGTESTEMUNHA1?> <?=$r->ORGAOEMISSORTESTEMUNHA1?>,
							<?php endif; ?>

							<!-- CPF da Testemunha 1 -->
							<?php if (isset($r->CPFTESTEMUNHA1) && !empty($r->CPFTESTEMUNHA1)): ?>
							<?=" CPF nº ".$r->CPFTESTEMUNHA1?>,
							<?php endif; ?>
							
							<!-- Data de Nascimento da Testemunha 1 -->
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
							echo GExtenso::numero($dataAno)." onze";
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

							<!-- Endereço da Testemunha 1 -->
							<?php if (isset($r->ENDERECOTESTEMUNHA1) && !empty(mb_convert_case($r->ENDERECOTESTEMUNHA1, MB_CASE_TITLE, "UTF-8"))): ?>
							<?="residente e domiciliado(a) à ".mb_convert_case($r->ENDERECOTESTEMUNHA1, MB_CASE_TITLE, "UTF-8")?>,
							<?=mb_convert_case($r->BAIRROTESTEMUNHA1, MB_CASE_TITLE, "UTF-8")?>, 
							<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA1)); foreach($c as $c):?>
							<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
							<?php endforeach ?>
							<?php endif; ?>

							<!-- NOME TESTEMUNHA 2 -->
							<?php if (isset($r->NOMETESTEMUNHA2) && !empty($r->NOMETESTEMUNHA2)): ?>
							<?="e ".strtolower($r->NOMETESTEMUNHA2)?>,
							<?php endif; ?> 
							
							<!-- Nacionalidade da Testemunha 2 -->
							<?php if (isset($r->NACIONALIDADETESTEMUNHA2) && !empty($r->NACIONALIDADETESTEMUNHA2)): ?>
							<?=strtolower($r->NACIONALIDADETESTEMUNHA2)?>,
							<?php endif; ?> 

							<!-- Naturalidade da Testemunha 2 -->
							<?php if (isset($r->NATURALIDADETESTEMUNHA2) && !empty($r->NATURALIDADETESTEMUNHA2)): ?>
							<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA2)); foreach($c as $c):?>
							<?="natural de ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?><?php endforeach ?> 
							<?php endif; ?> 
							
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
						
							<!-- RG da Testemunha 2 -->
							<?php if (isset($r->RGTESTEMUNHA2) && !empty($r->RGTESTEMUNHA2)): ?>
							<?="portador(a) do RG ".$r->RGTESTEMUNHA2?> <?=$r->ORGAOEMISSORTESTEMUNHA2?>,
							<?php endif; ?>

							<!-- CPF da Testemunha 2 -->
							<?php if (isset($r->CPFTESTEMUNHA2) && !empty($r->CPFTESTEMUNHA2)): ?>
							<?=" CPF nº ".$r->CPFTESTEMUNHA2?>,
							<?php endif; ?>
							
							<!-- Data de Nascimento da Testemunha 2 -->
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
							echo GExtenso::numero($dataAno)." onze";
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

							<!-- Endereço da Testemunha 2 -->
							<?php if (isset($r->ENDERECOTESTEMUNHA2) && !empty(mb_convert_case($r->ENDERECOTESTEMUNHA2, MB_CASE_TITLE, "UTF-8"))): ?>
							<?="residente e domiciliado(a) à ".mb_convert_case($r->ENDERECOTESTEMUNHA2, MB_CASE_TITLE, "UTF-8")?>,
							<?=mb_convert_case($r->BAIRROTESTEMUNHA2, MB_CASE_TITLE, "UTF-8")?>, 
							<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA2)); foreach($c as $c):?>
							<?=" ".mb_convert_case($c->cidade, MB_CASE_TITLE, "UTF-8")."/".$c->uf.","?>
							<?php endforeach ?>
							<?php endif; ?>
							<?php endif ?>

							<!-- Funcionário / Função -->
							<?="Isento de emolumentos conforme Lei 9534 de 10/12/1997. Eu, ".mb_convert_case($nome_assinatura, MB_CASE_TITLE, "UTF-8").","?>
							<?=mb_convert_case($funcao_assinatura, MB_CASE_TITLE, "UTF-8").", digitei e assino."?>
						
							<!-- Matrícula -->
							Matrícula: <strong><?=$r->MATRICULA?></strong>.

							<?php if ($r->TIPOASSENTO == 'ORDEM'): ?>
							<p style="font-weight:bold; text-align:justify;">Registro Lavrado mediante autorização do Juiz(a) de Direito Dr(a) <?=$r->JUIZMANDATO?>, do(a) <?=$r->VARAMANDATO?> em <?=date('d/m/Y', strtotime($r->DATAEXPEDICAOMANDATO))?> sob nº <?=$r->NUMEROMANDATO?>, por sentença datada de <?=date('d/m/Y', strtotime($r->DATASENTENCAMANDATO))?>, em conformidade com a lei Nº 6.015, de 31 de dezembro de 1973, com as alterações da lei Nº 6216 de 30/06/1975.</p>	
							<?php endif ?>

				.Lido e achado
										conforme, o(a) declarante assina. <br>
<!--NATIMORTO:|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->


<!--NATIMORTO:|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
					<?php else: ?>

						<p style="text-align: justify;">Ao(s) 	<?php //echo date('d/m/Y', strtotime($r->dataObito));
						
						if ($r->DATAENTRADA == '') {
						$data = date('Y-m-d');
							}	
						else{		
						$data = $r->DATAENTRADA ;
						}
						$novaData = explode("-", $data);

						if ($novaData[2] == '01' || $novaData[2] == '1') {
							echo "Primeiro dia  ";
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
						} else {echo  ucfirst(GExtenso::numero($novaData[2]));}
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

						?> (<?=date('d/m/Y',strtotime($r->DATAENTRADA))?>), neste(a)

						<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?><?=$w->strRazaoSocial?> Estado do Maranhão <?php endforeach ?>, 

						<?php if ($r->TIPOASSENTO!='ORDEM'): ?>
							
						
						compareceu neste ofício de Registro Civil  <span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMEDECLARANTE)?></span>,
																			<?=strtolower($r->NACIONALIDADEDECLARANTE)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEDECLARANTE)); foreach($c as $c):?>
																			<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
																			<?php endforeach ?> 
																			<?php if ($r->ESTADOCIVILDECLARANTE == 'CA'): ?>
																			casado(a),
																			<?php elseif ($r->ESTADOCIVILDECLARANTE == 'SO'): ?>
																			solteiro(a),
																			<?php elseif ($r->ESTADOCIVILDECLARANTE == 'DI'): ?>
																			divorciado(a),	
																			<?php elseif ($r->ESTADOCIVILDECLARANTE == 'VI'): ?>
																			viúvo(a),	
																			<?php elseif ($r->ESTADOCIVILDECLARANTE == 'UN'): ?>
																			em união estável,
																			<?php else: ?>

																			<?php endif ?><?=mb_strtolower($r->PROFISSAODECLARANTE)?>, portador do RG de número <?=$r->RGDECLARANTE?>/<?=$r->ORGAOEMISSORDECLARANTE?>, inscrito no CPF de número <?=$r->CPFDECLARANTE?>,  

																			<?php if ($r->DATANASCIMENTODECLARANTE!=''): ?>


																			nascido em
																			<?php //echo date('d/m/Y', strtotime($r->dataObito));

																			$data = $r->DATANASCIMENTODECLARANTE ;
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


																			?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTODECLARANTE))?>),	
																			<?php if ($r->DATANASCIMENTODECLARANTE!=''): ?>
																			com <?=idade_civil_antigo($r->DATANASCIMENTODECLARANTE,$r->DATANASCIMENTO)?> anos de idade, 
																			<?php endif ?><?php endif ?>
																			residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECODECLARANTE)?>, <?=mb_strtolower($r->BAIRRODECLARANTE)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEDECLARANTE)); foreach($c as $c):?>
																			<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>,
						 que a apresentando a DO nº <?=$r->NDO?>, a qual se encontra arquivada nesta Unidade de Serviço e exibindo atestado de óbito, firmado pelo  Dr. <?=$r->MEDICO?>, CRM nº <?=$r->CRM?>, que consta como causa da morte <b><?=mb_strtoupper($r->CAUSAOBITO)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOB)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOC)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOD)?></b>, sendo a morte

						 <?php if ($r->TIPOMORTE == 'NAT'): ?>
						 	por motivo natural,

						 	 <?php elseif ($r->TIPOMORTE == 'VIO'): ?>
						 	por motivo violento,
						 	<?php else: ?>
						 		
						 <?php endif ?>
						  consta que no dia
						 <?php else: ?>
						 	por mandato judicial expedido pelo exmo. Juiz <?=$r->JUIZMANDATO?>, do(a) <?=$r->VARAMANDATO?> em <?=date('d/m/Y', strtotime($r->DATAEXPEDICAOMANDATO))?> sob nº <?=$r->NUMEROMANDATO?>, por sentença datada de <?=date('d/m/Y', strtotime($r->DATASENTENCAMANDATO))?>, onde consta a DO n° <?=$r->NDO?>, , a qual se encontra arquivada nesta Unidade de Serviço e exibindo atestado de óbito, firmado pelo  Dr. <?=$r->MEDICO?>, CRM nº <?=$r->CRM?>, que consta como causa da morte <b><?=mb_strtoupper($r->CAUSAOBITO)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOB)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOC)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOD)?></b>, sendo a morte

						 <?php if ($r->TIPOMORTE == 'NAT'): ?>
						 	por motivo natural,
						 	<?php else: ?>
						 		por motivo violento,
						 <?php endif ?> procedi ao registro de óbito ocorrido aos

						 <?php endif ?>
						
						

					 <?php //echo date('d/m/Y', strtotime($r->dataObito));

						$data = $r->DATAOBITO ;
						$novaData = explode("-", $data);
						echo $novaData[2];
						/*
						if ($novaData[2] == '01' || $novaData[1] == '1') {
							echo " Um de  ";
						}elseif ($novaData[2] == '02' || $novaData[1] == '2') {
							echo " Dois de ";
						} elseif ($novaData[2] == '03' || $novaData[1] == '3') {
							echo " Três ";
						} elseif ($novaData[2] == '04' || $novaData[1] == '4') {
							echo " Quatro de ";
						} elseif ($novaData[2] == '05' || $novaData[1] == '5') {
							echo " Cinco de ";
						} elseif ($novaData[2] == '06' || $novaData[1] == '6') {
							echo " Seis de ";
						} elseif ($novaData[2] == '07' || $novaData[1] == '7') {
							echo " Sete de ";
						} elseif ($novaData[2] == '08' || $novaData[1] == '8') {
							echo " Oito de ";
						} elseif ($novaData[2] == '09' || $novaData[1] == '9') {
							echo " Nove de ";
						} else {echo  ucfirst(GExtenso::numero($novaData[2]));}
						*/
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
							echo " de Outubro de";
						} elseif ($novaData[1] == '11') {
							echo " de Novembro de ";
						} elseif ($novaData[1] == '12') {
							echo " de Dezembro de ";
						} else {
							echo "Não definido";
						}

						echo GExtenso::numero($novaData[0]);

					?>, às <?=$r->HORAOBITO?> Horas,neste Subdistrito, no <?=$r->LOCALMORTE?>,situado na rua <?=$r->ENDERECOOBITO?>, com <?=$r->TEMPOINTRAUTERINA?> semanas de vida intra uterina, nasceu morta uma criança do sexo <?php if ($r->SEXO == 'M'):?>Masculino <?php else: ?> Feminino <?php endif ?>
					<?php if ($r->NOME!='NAO_REGISTRADO' && $r->NOME!=''): ?>
					, com nome <?=$r->NOME?>
					<?php endif ?> <?php if ($r->SEXO == 'M') :?>
																			Filho de
																			<?php else: ?>	
																			Filha de
																			<?php endif ?>
																		
																		<!--QUALIFICACAO PAI------------------------------------------------------------------------------------------------->	
																			<?php if ($r->NOMEPAI!='NULL' && $r->NOMEPAI!=''):?>
																			<span style="font-weight: bold; text-transform: capitalize;"><?=mb_strtoupper($r->NOMEPAI)?></span>,
																			<?=strtolower($r->NACIONALIDADEPAI)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAI)); foreach($c as $c):?>
																			<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
																			<?php endforeach ?> 
																			<?php if ($r->ESTADOCIVILPAI == 'CA'): ?>
																			casado(a),
																			<?php elseif ($r->ESTADOCIVILPAI == 'SO'): ?>
																			solteiro(a),
																			<?php elseif ($r->ESTADOCIVILPAI == 'DI'): ?>
																			divorciado(a),	
																			<?php elseif ($r->ESTADOCIVILPAI == 'VI'): ?>
																			viúvo(a),	
																			<?php elseif ($r->ESTADOCIVILPAI == 'UN'): ?>
																			em união estável,
																			<?php else: ?>

																			<?php endif ?><?=mb_strtolower($r->PROFISSAOPAI)?>, portador do RG de número <?=$r->RGPAI?>/<?=$r->ORGAOEMISSORPAI?>, inscrito no CPF de número <?=$r->CPFPAI?>,  

																			<?php if ($r->DATANASCIMENTOPAI!=''): ?>


																			nascido em
																			<?php //echo date('d/m/Y', strtotime($r->dataObito));

																			$data = $r->DATANASCIMENTOPAI ;
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


																			?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOPAI))?>),	
																			<?php if ($r->DATANASCIMENTOPAI!=''): ?>
																			com <?=idade_civil_antigo($r->DATANASCIMENTOPAI,$r->DATANASCIMENTO)?> anos de idade, 
																			<?php endif ?><?php endif ?>
																			residente e domiciliado em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOPAI)?>, <?=mb_strtolower($r->BAIRROPAI)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAI)); foreach($c as $c):?>
																			<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>,	  

																			e de 
																			<?php endif ?>

																			<span style="text-transform: capitalize;font-weight: bold"> <?=mb_strtoupper($r->NOMEMAE)?></span>, <?=strtolower($r->NACIONALIDADEMAE)?>, natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAE)); foreach($c as $c):?>
																			<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
																			<?php endforeach ?>

																			<?php if ($r->ESTADOCIVILMAE == 'CA'): ?>
																			casada,
																			<?php elseif ($r->ESTADOCIVILMAE == 'SO'): ?>
																			solteira,
																			<?php elseif ($r->ESTADOCIVILMAE == 'DI'): ?>
																			divorciada,	
																			<?php elseif ($r->ESTADOCIVILMAE == 'VI'): ?>
																			viúva,	
																			<?php elseif ($r->ESTADOCIVILMAE == 'UN'): ?>
																			em união estável,
																			<?php else: ?>

																			<?php endif ?>

																			<?=mb_strtolower($r->PROFISSAOMAE)?>,  portadora do RG de número <?=$r->RGMAE?>/<?=$r->ORGAOEMISSORMAE?>, inscrita no CPF de número <?=$r->CPFMAE?>,

																			<?php if ($r->DATANASCIMENTOMAE!=''): ?>

																			nascida em
																			<?php //echo date('d/m/Y', strtotime($r->dataObito));

																			$data = $r->DATANASCIMENTOMAE ;
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



																			?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTOMAE))?>),	
																			<?php endif ?>
																			<?php if ($r->DATANASCIMENTOMAE!=''): ?>
																			com <?=idade_civil_antigo($r->DATANASCIMENTOMAE, $r->DATANASCIMENTO)?> anos de idade na ocasião do parto, e agora com com <?=idade_civil_antigo($r->DATANASCIMENTOMAE,$r->DATANASCIMENTO)?> anos de idade,
																			<?php endif ?> residente e domiciliada em <span style="text-transform: capitalize;"><?=mb_strtolower($r->ENDERECOMAE)?>, <?=mb_strtolower($r->BAIRROMAE)?>,</span> <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAE)); foreach($c as $c):?>
																			<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?><?php endforeach ?>

					O declarante apresentou atestado de óbito firmado pelo <?=$r->MEDICO?>, dando como causa da morte <?=$r->CAUSAOBITO?>. Termo de óbito lavrado em 


					<?php //echo date('d/m/Y', strtotime($r->dataObito));

						$data = $r->DATAENTRADA ;
						$novaData = explode("-", $data);
						echo $novaData[2];
						/*
						if ($novaData[2] == '01' || $novaData[1] == '1') {
							echo " Um de  ";
						}elseif ($novaData[2] == '02' || $novaData[1] == '2') {
							echo " Dois de ";
						} elseif ($novaData[2] == '03' || $novaData[1] == '3') {
							echo " Três ";
						} elseif ($novaData[2] == '04' || $novaData[1] == '4') {
							echo " Quatro de ";
						} elseif ($novaData[2] == '05' || $novaData[1] == '5') {
							echo " Cinco de ";
						} elseif ($novaData[2] == '06' || $novaData[1] == '6') {
							echo " Seis de ";
						} elseif ($novaData[2] == '07' || $novaData[1] == '7') {
							echo " Sete de ";
						} elseif ($novaData[2] == '08' || $novaData[1] == '8') {
							echo " Oito de ";
						} elseif ($novaData[2] == '09' || $novaData[1] == '9') {
							echo " Nove de ";
						} else {echo  ucfirst(GExtenso::numero($novaData[2]));}
						*/
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
							echo " de Outubro de";
						} elseif ($novaData[1] == '11') {
							echo " de Novembro de ";
						} elseif ($novaData[1] == '12') {
							echo " de Dezembro de ";
						} else {
							echo "Não definido";
						}

						echo GExtenso::numero($novaData[0]);

					?>. <?php if ($r->QUALIDADEDECLARANTE == 'MAEDEMENOR'): 
																	$repmae = explode(",", $r->ROGODECLARANTE);	
																		?>
																	
																	<span style="font-weight: bold">	Observação: A mãe é de menor de idade, estando acompanhado do sr(a) <?=$repmae[0]?> sendo o mesmo seu(a) <?=$repmae[1]?>. Que assina este termo. </span>
																	<?php endif ?>


																	<?php if ($r->NOMETESTEMUNHA1!=''): ?>
					São testemunhas do assento 
						 <?=mb_strtoupper($r->NOMETESTEMUNHA1)?>, 
						<?php if ($r->ESTADOCIVILTESTEMUNHA1 == 'CA'): ?>
						casado(a)
						<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'SO'): ?>
						solteiro(a)
						<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'DI'): ?>
						solteiro(a)	
						<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'VI'): ?>
						viúvo(a)	
						<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'UN'): ?>
						em união estável
						<?php else: ?>

						<?php endif ?>, <?=$r->NACIONALIDADETESTEMUNHA1?>(a), natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA1)); foreach($c as $c):?>
						<?=$c->cidade?> (<?=$c->uf?>)
						<?php endforeach ?>,  <?=$r->PROFISSAOTESTEMUNHA1?>(a), residente e domiciliado(a) em <?=$r->ENDERECOTESTEMUNHA1?>, <?=$r->BAIRROTESTEMUNHA1?>, <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA1)); foreach($c as $c):?>
						<?=$c->cidade?> (<?=$c->uf?>)<?php endforeach ?> , portador do RG de número <?=$r->RGTESTEMUNHA1?>/<?=$r->ORGAOEMISSORTESTEMUNHA1?> e CPF de número <?=$r->CPFTESTEMUNHA1?>. 
						<?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>
						com <?=date('Y') - $r->DATANASCIMENTOTESTEMUNHA1?> anos de idade 
						<?php endif ?>
						<?php endif ?>

						<?php if ($r->NOMETESTEMUNHA2!=''): ?>
						e 	 <?=mb_strtoupper($r->NOMETESTEMUNHA2)?>, 
						<?php if ($r->ESTADOCIVILTESTEMUNHA2 == 'CA'): ?>
						casado(a)
						<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'SO'): ?>
						solteiro(a)
						<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'DI'): ?>
						solteiro(a)	
						<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'VI'): ?>
						viúvo(a)	
						<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'UN'): ?>
						em união estável
						<?php else: ?>

						<?php endif ?>

						, <?=$r->NACIONALIDADETESTEMUNHA2?>(a), natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA2)); foreach($c as $c):?>
						<?=$c->cidade?> (<?=$c->uf?>)
						<?php endforeach ?>,  <?=$r->PROFISSAOTESTEMUNHA2?>(a), residente e domiciliado(a) em <?=$r->ENDERECOTESTEMUNHA2?>, <?=$r->BAIRROTESTEMUNHA2?>, <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA2)); foreach($c as $c):?>
						<?=$c->cidade?> (<?=$c->uf?>)<?php endforeach ?> , portador do RG de número <?=$r->RGTESTEMUNHA2?>/<?=$r->ORGAOEMISSORTESTEMUNHA2?> e CPF de número <?=$r->CPFTESTEMUNHA2?>. 

						<?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>
							com <?=date('Y') - $r->DATANASCIMENTOTESTEMUNHA2?> anos de idade.

						<?php endif ?>
						<?php endif ?>
<!--NATIMORTO:|||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->

<?php endif ?>
						<?php 
$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVROOBITO' and strFolha = '$r->FOLHAOBITO' and strTipo = 'OB' and nome = '$r->NOME' and setRegistroInvisivel!='S'");
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
if ($r->AVERBACAOTERMOANTIGO!='') {
	echo $r->AVERBACAOTERMOANTIGO;
}
$busca_anotacoes = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$r->LIVROOBITO' and FOLHA = '$r->FOLHAOBITO' and TIPO = 'OBT'");
$busca_anotacoes->execute();
$ban = $busca_anotacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ban as $ban) {
echo $ban->ANOTACAO;
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

						 Eu, <?=$nome_assinatura?>, <?=strtoupper($funcao_assinatura)?>, do Registro Civil das Pessoas Naturais, dou fé e assino.  Era o que continha
						o referido registro aqui fielmente transcrito. Selo de Fiscalização: <?=$SELO?>.
					 	
						do inteiro teor da Certidão - Matrícula: <?=$r->MATRICULA?>
</fieldset>
<p style="font-size: 8px;text-align: center;">Válido somente com selo de autenticidade</p>
<br>

<div class="left">
<?php $serv = PESQUISA_ALL('cadastroserventia');
foreach ($serv as $serv): ?>	

	<?=$serv->strRazaoSocial?> 	<br>
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

					echo $novaDataRegistro[0];

					?>. 
					<?php endforeach; endforeach ?>
					 <br><br>
	_______________________________________ <br>
	<?=strtoupper($nome_assinatura)?><br>
	<?=$funcao_assinatura?>
</div>


<div style="position: absolute;width: 50px; margin-left: -20px;width: 200px; margin-top: 110px;"> 
<?php

	include_once('../../../plugins/phpqrcode/qrlib.php');
	
function tirarAcentos($string){
		return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(ý)/","/(Ý)/"),explode(" ","a A e E i I o O u U n N C c y Y"),$string);
		}
	$img_local = "qrimagens/";
	$img_nome = tirarAcentos($r->ID.$r->NOME).'INTTEOR.png';
	$nome = $img_local.$img_nome;

		$conteudo = $qr;
		QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


			echo '<img style="max-width:33%; margin-top:-5px;margin-left:10px;" src="'.$nome.'" />';
		?>

	<p style="font-weight: bold;text-align: justify;font-size: 8px;margin-top: -70px;width: 80%; margin-left:80px;"><?=$textoselo?></p>
	</main>
</div>

 <?php if (isset($_GET['selobusca']) && $_GET['selobusca']!=''): ?>





<div style="position: absolute;width: 50px; margin-left: 200px;width: 200px; margin-top: 100px;"> 
<?php

  include_once('../../../plugins/phpqrcode/qrlib.php');
  

  $img_local = "qrimagens/";
  $img_nome = tirarAcentos($r->ID.$r->NOME).'INTTEORBUSCA.png';
  $nome = $img_local.$img_nome;

    $conteudo = $qrbusca;
    QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


    echo '<img style="max-width:50%; margin-top:-15px;margin-left:10px;" src="'.$nome.'" />';
    ?>

  <p style="font-weight: bold; font-size: 5px;margin-top: -90px;width: 50%; margin-left:110px;"><?=$textoselobusca?></p>
</div>

  
<?php endif ?>

<?php if (isset($_GET['sav'])): 
$selo_busca_sav = $_GET['sav'].'<br>';
$busca_selo_sav = $pdo->prepare("SELECT * FROM auditoria where strSelo = '$selo_busca_sav' limit 1 ");
$busca_selo_sav->execute();
$bssav = $busca_selo_sav->fetch(PDO::FETCH_ASSOC);
	?>
<div style="position: absolute;width: 50px; margin-left: 280px;width: 200px; margin-top: 100px;"> 
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
<!--SELOS DE AVERBAÇÃO ==============================================================================-->

				<div style="
				display: flex;
				width: 70%;
				margin-left: 30%;
				padding-right: 0%;
				padding-top: 30px;
				margin-right: -30%;
				padding-left: 30px;
				margin-bottom: -300px;
				">



				<?php
				$cont_selos = 0;
				$data_hoje = date('Y-m-d');
				$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVROOBITO' and strFolha = '$r->FOLHAOBITO' and strTipo = 'OB'  and strOrdem!='A' and dataAverbacao = '$data_hoje' ");
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
								<?php if ($cont_selos >= 3): ?>margin-top: 680px;margin-left:-650px;<?php endif ?>
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
						$selos_array = '';
						endforeach; ?>
						</div>
<!--END SELOS DE AVERBAÇÃO ==============================================================================-->

<!--AVERBAÇÃO JOGADA PRA OUTRA FOLHA=======================================================================-->
			<?php if (!empty($av_outra_folha) && $av_outra_folha!=''): ?>
				<fieldset style="width: 95%;padding: 0px 10px 0px 10px!important; 

				<?php if ($cont_selos >=3): ?>
					margin-top: -410px;
					<?php elseif($cont_selos <= 2 && $cont_selos >0): ?>
						page-break-before: always;	
						margin-top: 100px;
					<?php else: ?>
					page-break-before: always;	
					margin-top: 100px;
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

			<?php endif ?>
<!--END AVERBAÇÃO JOGADA PRA OUTRA FOLHA===================================================================-->

</body>
</html>
