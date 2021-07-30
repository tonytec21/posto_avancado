<?php 

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

<?php 
$busca_ja_existe = "NAO_USADO";
if ($busca_ja_existe== "NAO_USADO"): ?>

	<?php $r = PESQUISA_ALL_ID('registro_obito_novo',$id);
	foreach ($r as $r ) :
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
if (empty($r->ESTADOCIVIL)) {
	$ec = "";
}
	?>
<!--1º caso-->
<?php if ($r->TIPOLIVRO == '4' && $r->TIPOASSENTO != 'ORDEM'|| empty($r->TIPOLIVRO) && $r->TIPOASSENTO != 'ORDEM'): ?>
	
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
				<p style="text-align: center; font-weight: bold;">
				<?php if ($r->NOME !='DESCONHECIDO'): ?>
				<?=mb_strtoupper($r->NOME)?>
				<?php endif ?>
				<?php if ($r->NOME =='DESCONHECIDO'): ?>
				um(a) individuo de identidade desconhecida,
				<?php endif ?>
				</p>

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
				<?="Isento de emolumentos conforme Lei 9534 de 10/12/1997. Eu, ".mb_convert_case($_SESSION['nome'], MB_CASE_TITLE, "UTF-8").","?>
				<?=mb_convert_case($_SESSION['funcao'], MB_CASE_TITLE, "UTF-8").", digitei e assino."?>

				<!-- Matrícula -->
				Matrícula: <strong><?=$r->MATRICULA?></strong>.

				<!-- Selo -->
				<?php if (isset($r->SELO) && !empty($r->SELO)): ?>
				<?="Selo de Fiscalização: ".mb_strtoupper($r->SELO)?>
				<?php endif; ?>
				-------------------------------- <span style="font-size: 8px; text-align: center">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span> -------------------------------
<!--2º caso-->
<?php elseif ($r->TIPOLIVRO != '5' && $r->TIPOASSENTO == 'ORDEM'): ?>
				<p style="text-align: justify;">Ao(s) 	<?php //echo date('d/m/Y', strtotime($r->dataObito));
				if (isset($r->DATAENTRADA)):
				$data = $r->DATAENTRADA ;
				$novaData = explode("-", $data);

				if ($novaData[2] == '01' || $novaData[2] == '1') {
					echo " Um de  ";
				}elseif ($novaData[2] == '02' || $novaData[2] == '2') {
					echo " Dois de ";
				} elseif ($novaData[2] == '03' || $novaData[2] == '3') {
					echo " Três ";
				} elseif ($novaData[2] == '04' || $novaData[2] == '4') {
					echo " Quatro de ";
				} elseif ($novaData[2] == '05' || $novaData[2] == '5') {
					echo " Cinco de ";
				} elseif ($novaData[2] == '06' || $novaData[2] == '6') {
					echo " Seis de ";
				} elseif ($novaData[2] == '07' || $novaData[2] == '7') {
					echo " Sete de ";
				} elseif ($novaData[2] == '08' || $novaData[2] == '8') {
					echo " Oito de ";
				} elseif ($novaData[2] == '09' || $novaData[2] == '9') {
					echo " Nove de ";
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
					echo " de Outubro de";
				} elseif ($novaData[1] == '11') {
					echo " de Novembro de ";
				} elseif ($novaData[1] == '12') {
					echo " de Dezembro de ";
				} else {
					echo "Não definido";
				}

				echo dataum($novaData[0]);
				endif;
				?> neste

				<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?><?=$w->strRazaoSocial?> Estado do Maranhão <?php endforeach ?>,


				em cartório, por mandato judicial expedido pelo exmo. Juiz <?=$r->JUIZMANDATO?>, do(a) <?=$r->VARAMANDATO?> em <?=date('d/m/Y', strtotime($r->DATAEXPEDICAOMANDATO))?> sob nº <?=$r->NUMEROMANDATO?>, por sentença datada de <?=date('d/m/Y', strtotime($r->DATASENTENCAMANDATO))?>, onde consta a DO n° <?=$r->NDO?>, , a qual se encontra arquivada nesta Unidade de Serviço e exibindo atestado de óbito, firmado pelo  Dr. <?=$r->MEDICO?>, CRM nº <?=$r->CRM?>, que consta como causa da morte <b><?=mb_strtoupper($r->CAUSAOBITO)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOB)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOC)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOD)?></b>, sendo a morte

				 <?php if ($r->TIPOMORTE == 'NAT'): ?>
				 	por motivo natural,

				 	 <?php elseif ($r->TIPOMORTE == 'VIO'): ?>
				 	por motivo violento,
				 	<?php else: ?>
				 		
				 <?php endif ?> procedi ao registro de óbito ocorrido aos
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

				?> (<?=date('d/m/Y', strtotime($r->DATAOBITO))?>), <?php if ($r->HORAOBITO!='' && !empty($r->HORAOBITO)): ?> às <?=$r->HORAOBITO?> Horas,<?php endif ?> neste Subdistrito, no <?=$r->LOCALMORTE?>, situado em <?=$r->ENDERECOOBITO?>, <?php $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEOBITO));foreach($c as $c): ?><?=$c->cidade ?> (<?=$c->uf?>)<?php endforeach ?> faleceu
				<p style="text-align: center">
				<?php if ($r->NOME !='DESCONHECIDO'): ?>
				<?=strtoupper($r->NOME)?>
				<?php endif ?>
				<?php if ($r->NOME =='DESCONHECIDO'): ?>
				um (a) individuo de identidade desconhecida
				<?php endif ?>


				</p><?=$r->NACIONALIDADE?>, do sexo
				<?php if ($r->SEXO == 'M'):?>Masculino, <?php else: ?> Feminino, <?php endif ?> de cor

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
				<?=$cor?>, nascido (a) em
								<?php //echo date('d/m/Y', strtotime($r->dataObito));
								if ($r->DATANASCIMENTO) :
								$data = $r->DATANASCIMENTO ;
								$novaData = explode("-", $data);

								if ($novaData[2] == '01' || $novaData[2] == '1') {
									echo "Primeiro   ";
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
								}
								elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
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
								endif;
								if (isset($r->DATANASCIMENTO)):
								?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTO))?>)

								 <?php if ($r->DATANASCIMENTO!=''): ?>
								  com
								<?=date('Y',strtotime($r->DATAOBITO)) - date('Y', strtotime($r->DATANASCIMENTO))?> anos de idade.
							<?php endif;endif; ?>


				<?php #TESTE ABAIXO ?>

				<?php if ($r->NOME !='DESCONHECIDO'): ?>
				<?=$r->PROFISSAO?>, natural de
				<?php $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADE));foreach($c as $c): ?>
				<?=$c->cidade ?> (<?=$c->uf?>)<?php endforeach ?>,<?php endif ?>
				<?php if ($r->NOME !='DESCONHECIDO'): ?> domiciliado e residente em <?=$r->ENDERECO?>,
				<?php $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADE));foreach($c as $c): ?>
				<?=$c->cidade ?> (<?=$c->uf?>)<?php endforeach ?> <?=$ec?>,
				<?php endif ?>

				<?php if ($r->ESTADOCIVIL == 'CA' || $r->ESTADOCIVIL == 'VI'): ?>
				sendo, o(a) conjuge <?=mb_strtoupper($r->NOMECONJUGE)?>, casamento celebrado no cartório <?=mb_strtoupper($r->CARTORIOCASAMENTO)?>,
				<?php endif ?>


				filho(a) de <?php if (isset($r->NOMEPAI)): ?> <?=mb_strtoupper($r->NOMEPAI)?>, <?=$r->PROFISSAOPAI?> e <?php endif; ?><?php if (isset($r->NOMEMAE)): ?><?=mb_strtoupper($r->NOMEMAE)?>, <?=$r->PROFISSAOMAE?>,<?php endif ?> que será sepultado em <?=$r->LOCALSEPULTAMENTO?>. O declarante apresentou os seguintes documentos do falecido <?php if ($r->NOME !='DESCONHECIDO'): ?> RG nº <?=$r->RG?><?php endif ?>. Declaração de óbito nº <?=$r->NDO?>, CPF de número <?=$r->CPF?>,

				<?php if ($r->strTituloEleitor!=''): ?>
				 Titulo de Eleitor nº <?=$r->strTituloEleitor?>.
				<?php endif ?>
				<?php if ($r->strCtps!=''): ?>
				 CTPS nº <?=$r->strCtps?>.
				<?php endif ?>
				<?php if ($r->strPassaporte!=''): ?>
				Passaporte nº <?=$r->strPassaporte?>.
				<?php endif ?>
				<?php if ($r->strPisNis!=''): ?>
				 PIS/NIS: nº <?=$r->strPisNis?>.
				<?php endif ?>
				<?php if ($r->strCartSaude!=''): ?>
				 Cartão Saúde: nº <?=$r->strCartSaude?>.
				<?php endif ?>


				<?php if ($r->DEIXOUBENS == 'S'): ?>
				Deixou Bens, Com testamento Conhecido,

				<?php elseif ($r->DEIXOUBENS == 'S2'): ?>
				Deixou Bens, Sem testamento Conhecido,
				<?php elseif ($r->DEIXOUBENS == 'N'): ?>
				Não Deixou Bens, Com testamento Conhecido,
				<?php else: ?>
				Não deixou bens, Sem testamento Conhecido,
				<?php endif ?>

				<?php if ($r->ELEITOR == 'S'): ?>
				Era eleitor,
				<?php else: ?>
				não sendo eleitor,
				<?php endif ?>
				<?php #TESTE ABAIXO ?>

				<?php if ($r->DEIXOUFILHOS == 'S'): ?>
				Deixou filhos (as), sendo eles, <?=mb_strtoupper($r->NOMEFILHOS)?>.
				<?php else: ?>
				Não deixou nenhum filho.
				<?php endif ?>
				ISENTO DE EMOLUMENTOS CONFORME LEI 9534 DE 10/12/97. Eu,

				<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): ?><?=$w->strTituloServentia?><?php endforeach ?>
				digitei e assino. Selo de Fiscalização: <?=$r->SELO?>.
				(Registro isento de emolumentos). - Matrícula
				da 1ª Via da Certidão: <?=$r->MATRICULA?>-------------------------------------------------------------------------------
				<span style="font-size: 8px;">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>

				<br><br><br><br>
<!--3º caso-->
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


						 Eu <?=$_SESSION['nome']?>, digitei e assino. Selo de Fiscalização: <?=$r->SELO?>.
						(Registro isento de emolumentos). - Matrícula
						da 1ª Via da Certidão: <?=$r->MATRICULA?>-------------------------------------------------------------------------------
						<span style="font-size: 8px;">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>

		<?php endif ?>
			<?php endforeach; endif;  ?>