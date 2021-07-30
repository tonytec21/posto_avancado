<!DOCTYPE html>
<?php include('../../controller/db_functions.php');
$pdo = conectar();
#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
if (isset($_GET['id_apagar'])) {$id_apagar = $_GET['id_apagar'];
    $del = $pdo->prepare("DELETE FROM salvar_editor where IDREGISTRO ='$id_apagar' and TIPO = 'TERMO_OBITO_AUXILIAR' ");
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
body{ font-size: 12px;font-family: "Arial";margin-left: 1cm;margin-bottom: -10cm;}
</style>
</head>

<body>
<?php 
$busca_ja_existe = $pdo->prepare("SELECT * FROM salvar_editor where IDREGISTRO = '$id' and TIPO = 'TERMO_OBITO_AUXILIAR'");
	$busca_ja_existe->execute();

	if ($busca_ja_existe->rowCount()!=0) {
	$recebe_texto = $busca_ja_existe->fetch(PDO::FETCH_ASSOC);
	echo $recebe_texto['TEXTO'];
	}	
	?>
	<?php if ($busca_ja_existe->rowCount()==0): ?>

	<?php $r = PESQUISA_ALL_ID('registro_obito_novo',$id);
	foreach ($r as $r ) :
	if ($r->TIPOLIVRO!='5') {
$_SESSION['erro'] = 'NÃO SERÁ POSSÍVEL EMITIR, O REGISTRO NÃO FOI FEITO COMO NATIMORTO!';
echo '<span style="color:white; background:red"> NÃO SERÁ POSSÍVEL EMITIR, O REGISTRO NÃO FOI FEITO COMO NATIMORTO!!</span>';
break;
		}	
	#aqui vai preencher os inputs, vou preencher só um pra vc ver:
		?>
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
<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
      <?php $c = PESQUISA_ALL('cadastroserventia');
      foreach ($c as $c ):?>
      <div style="display: block;margin-top: -40px;min-width: 100%;">
      <div style="display: inline-block;width: 17%;">
      <img src="../../images/brasao_ma.png" style="width: 60%;margin-left:28px; margin-top:10px; ">

      </div>
      <div style="display: inline-block;width: 80%; margin-left: -50px;">  
      <h2 style=" text-align: center;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
      <h2 style=" text-align: center;font-size: 12px;margin-top: -18px;
      "><?=$c->strLogradouro?>, <?=$c->strNumero?> -
      <?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
      <?php endforeach ?>
      <br>
      Titular da Serventia: <?=$c->strTituloServentia?><br>
      Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
      <?php endforeach ?></h2>
      </div>

      </div>
				     
<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
<br>
<div style="width: 100%; text-align: center; display: block;margin-top: -30px;" >
												<h3 style="display: inline-block;">LIVRO: C AUXILIAR <?=intval($r->LIVROOBITO)?></h3>
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

<?php if ($r->DATANASCIMENTO==''): ?>
	<span style="color: red">O CAMPO "DATA DO NASCIMENTO" NÃO FOI PREENCHIDO POR FAVOR RETORNE E PREENCHA.</span>
<?php break; endif ?>
<div style="display: block;">
			<fieldset style="border:1px solid black; max-width: 75%; font-size: 95%; display: inline-block;border-right: none; border-bottom: none">
<h1 style="text-align: center; margin-top: 0px">Registro de Natimorto</h1>	

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


												 Eu <?=$nome_assinatura?>, digitei e assino. Selo de Fiscalização: <?=$r->SELO?>.
(Registro isento de emolumentos). - Matrícula
da 1ª Via da Certidão: <?=$r->MATRICULA?>-------------------------------------------------------------------------------
<span style="font-size: 8px;">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>

	 

<br><br><br><br>
<?php if ($r->TIPOASSENTO!='ORDEM'): ?>
	

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
					<td style="border: none;text-align: center;">DIGITAL <?=strtoupper($r->NOMEPAI)?> </td>
					<td style="border: none; text-align: center; "><p style="margin-top: -40px"><?=strtoupper($b->strNome)?></p></td>
				</tr>
			</table>
			<br><br><br>
		<?php endforeach; endif ?>	

<?php if ($r->QUALIDADEDECLARANTE == 'MAEDEMENOR'): ?>
		<br>
		<p style="max-width:  100%; text-align: center;">_________________________________ <br>  <?=mb_strtoupper($repmae[0])?></p><br><br>
		<?php endif ?>


		<?php if ($r->NOMETESTEMUNHA1 != '' && $r->NOMETESTEMUNHA1 != 'NAO_DECLARADO' && $r->NOMETESTEMUNHA1 !='NULL'): ?>

<p style="max-width:  100%; text-align: center;">________________________________________ <br> <?=$r->NOMETESTEMUNHA1?></p>
<?php endif ?>


<?php if ($r->NOMETESTEMUNHA2 != '' && $r->NOMETESTEMUNHA2 != 'NAO_DECLARADO' && $r->NOMETESTEMUNHA2 !='NULL'): ?>
	
<p style="max-width:  100%; text-align: center;">________________________________________ <br> <?=$r->NOMETESTEMUNHA2?></p>
<?php endif ?>
<?php endif ?>
	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center"><?=$nome_assinatura?></p> 
		<p style="text-align: center; margin-top: -10px;"><?=mb_strtoupper($funcao_assinatura)?></p> 


	</p>

<div style="width: 60%; position: absolute;margin-top:-40px; ">
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
	<table style="border:none; max-width: 60%; margin-left:20%">
	<tr style="border:none">

	<td style="border:1px dashed silver">
	<img style="width: 70px" src="<?=$nome?>" />
	</td>

	<td style="border:1px dashed silver">
	<p style="text-align: justify; font-weight: bold;font-size: 9px; ">
	<!-- <?php #echo mb_convert_case((utf8_encode($textoselo)), MB_CASE_UPPER, "UTF-8")?> -->
	<?=corrigirACENTO_utf8($textoselo)?>
	</p>
	</td>




	</tr>
	</table>

					
 </fieldset>

<fieldset style="display: inline;width: 18%;position: absolute;border:1px solid black; padding-top: 120%; border-right: none; border-bottom: none; margin-top: -3px;"><legend style="font-size: 9px"> AVERBAÇÕES/ANOTAÇÕES</legend></fieldset>
</div>
<?php endforeach; endif;  ?>
</body>
</html>
