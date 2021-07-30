<!DOCTYPE html>
<?php include('../../controller/db_functions.php');

#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
$pdo=conectar();
function linha_vazio($texto){
if ($texto!='' && $texto!=' ') {
echo $texto;
}
else{
	echo '<hr style="width:100%; max-width:100%; border:1px dashed black">';
}
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
    $nascimento = mktime(0, 0, 0, $mes, $dia, $ano);

  

    // Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);
  	
  	if (empty($nascimento)) {
    $idade = ($ano - $ano1)*(-1);
    }

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
$r = PESQUISA_ALL_ID('registro_obito_novo',$id);
foreach ($r as $r ) :
?>
<html>
<head>
	<title>Certidão de Óbito</title>
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
font-size: 100%;
max-width: 100%;
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
	border-left: 1px solid black;
}

td{
border-left: 1px solid black;
border-bottom: 1px solid black
}
.left{
	margin-top: -1%;
	float: left;
	font-size: 70%!important;
}
.right{
		margin-top: -1%;
	float: right;
	font-size: 70%!important;
	text-align: center;
}
body{text-transform: uppercase; padding-top: 6.5cm; padding-bottom: 1cm; padding-left: 2cm; padding-right: 2cm;background: url("../../../images/preview.jpg");zoom:80%;}
</style>
</head>
<?php 
#aqui vai preencher os inputs, vou preencher só um pra vc ver:
	?>
<body>

<?php if ($r->ATOOBITO!='14.d'): ?>
<h1 style="text-align: center;margin-bottom: -20px;margin-top: 15px;">C<span style="font-size:20px">ERTIDÃO de </span>Ó<span style="font-size:20px">BITO</span></h1><br>
<?php else: ?>
	<h1 style="text-align: center;margin-bottom: -20px;margin-top: 15px;">C<span style="font-size:20px">ERTIDÃO de </span>N<span style="font-size:20px">ATIMORTO</span></h1><br>
<?php endif ?>
<div style="max-width: 100%; display: block;">
<p style="text-align: center; font-size: 14px;font-weight: bold;">Nome: <?=$r->NOME?></p>
<!--p style="text-align: center;margin-top: -14px;"><?=$r->NOME?> </p-->
<fieldset style="padding: 10px;"> <legend>CPF</legend>
<?=$r->CPF?>
<?php if ($r->CPF == ''): ?>
	<span style="opacity: .1">-</span>
<?php endif ?>
</fieldset>
<br>
<p class="center" style="margin-top: 1px;font-size: 14px;"> MATRICULA</p><br>
<h3 class="center" style="margin-top: -18px;font-size: 14px;"> <?=$r->MATRICULA?> </h3>

	<fieldset style="width: 11%; display: inline-block;"><legend>SEXO</legend>
		<?php if ($r->SEXO == 'M') {
			echo "Masculino";
		} else  {
		
			echo "Feminino";
		}
		 ?>
	 </fieldset>

	<fieldset style="width: 8%; display: inline-block;margin-top: -0px;"><legend>COR</legend>
		<?php if ($r->COR == 'BR') {
			echo "Branca";
		} elseif ($r->COR == 'PR') {
		
			echo "Preta";
		} elseif ($r->COR == 'PA') {
		
			echo "Parda";
		} elseif ($r->COR == 'AM') {
		
			echo "Amarela";
		} elseif($r->COR !='')  {
		
			echo "Indígena";
		}

		else{
			echo '<hr style="width:100%; max-width:100%; border:1px dashed black">';
		}

		 ?>
	</fieldset>
	<fieldset style="width: 70.94%; display: inline-block;margin-top: -0px;"><legend>ESTADO CÍVIL E IDADE</legend>
		<?php if ($r->NOME!='DESCONHECIDO' && $r->NOME!='NAO_REGISTRADO'): ?>
		<?php if ($r->ESTADOCIVIL == 'SO') {
			echo "Solteiro(a),";
		} elseif ($r->ESTADOCIVIL == 'CA') {
		
			echo "Casado(a),";
		} elseif ($r->ESTADOCIVIL == 'DI') {
		
			echo "Divorciado(a),";
		} elseif ($r->ESTADOCIVIL == 'VI') {
		
			echo "Viúvo(a),";
		}
		elseif ($r->ESTADOCIVIL == 'UN') {
		
			echo "Em união Estável,";
		}
		 elseif ($r->ESTADOCIVIL != '') {
		
			echo "Separado(a),";
		}

		else{
			echo '<hr style="width:100%; max-width:100%; border:1px dashed black">';
		}

		 ?>
		<?php else: ?>
			<span style="opacity: .1">-</span>
		<?php endif ?>
			<?php if ($r->DATANASCIMENTO!=''): ?>
				<?php 
				$idade  = idade_civil_antigo($r->DATANASCIMENTO,$r->DATAOBITO);
				if ($idade == 0) {
				echo ' 0 anos de idade ';
				}
				else{
				if ($idade == '01' || $idade == '1' || $idade == '21'|| $idade == '31'|| $idade == '41' || $idade == '51'|| $idade == '61' || $idade == '71' || $idade == '81' || $idade == '91') {
    	echo GExtenso::numero($idade)." um anos de idade";
  }
  else{echo GExtenso::numero($idade)." anos de idade";}
				 }
				 ?>
	<?php else: ?>

	<?php endif ?>
	</fieldset>



<br>
</div>
<div class="all">
<fieldset style="width: 45%; display: inline-block;"><legend>NATURALIDADE</legend>	<?php 
$x = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADE)); foreach ($x as $k) :?>

<?=$k->cidade?> <?=$k->uf?> 

<?php endforeach ?> </fieldset>
<fieldset style="width: 33%; display: inline-block;margin-top: -0px;"><legend>DOCUMENTO DE IDENTIFICAÇÃO</legend><?=$r->RG?>
<?php if ($r->RG == ''): ?>
	<hr style="width:100%; max-width:100%; border:1px dashed black">
<?php endif ?>
</fieldset>
<fieldset style="width: 11.94%; display: inline-block;margin-top: -0px;"><legend>ELEITOR</legend>
	<?php if ($r->ELEITOR == 'S') {
		echo "Sim";
	} elseif($r->ELEITOR =='N')  {
		// code...
		echo "Não";
	}

	else{echo '<hr style="width:100%; max-width:100%; border:1px dashed black">';}

	 ?>
</fieldset>

<br>


<fieldset style="width: 96.80%;margin-top: -0px;"><legend>FILIAÇÃO E RESIDÊNCIA</legend>
	<p style=";margin-top: -4px;">
	Filho(a) de <?php if (!empty($r->NOMEPAI)) {
		echo $r->NOMEPAI ;
	}  ?>
	<?php if (!empty($r->NOMEPAI) && !empty($r->NOMEMAE) )   echo "e"; ?>
	<?php if (!empty($r->NOMEMAE)) {
		echo $r->NOMEMAE ;
	}  ?>, Residente e domiciliado(a) <?=$r->ENDERECO?>, <?=$r->BAIRRO?> em: 	<?php 
$x = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADE)); foreach ($x as $k) :?>

<?=$k->cidade?> <?=$k->uf?> 

<?php endforeach ?> 
	</p>
</p>

</fieldset>
<br>
<fieldset style="max-width: 67%;min-width: 67%; display: inline-block;margin-top: -8px;"><legend>DATA E HORA DE FALECIMENTO</legend>
<?php //echo date('d/m/Y', strtotime($r->dataObito));

	$data = $r->DATAOBITO ;
	$novaData = explode("-", $data);

	if ($novaData[2] == '01' || $novaData[2] == '1') {
		echo " Primeiro de  ";
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
	} elseif ($novaData[2] == '01' || $novaData[2] == '1' || $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
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

	?>  <?php if ($r->HORAOBITO!='' && !empty($r->HORAOBITO)): ?> às <?=$r->HORAOBITO?> Horas,<?php endif ?>

</fieldset>

<fieldset style="width: 6%;display: inline-block;margin-top: -0px;"><legend>DIA</legend>
<?php echo $novaData[2]; ?>
</fieldset>
<fieldset style="width: 6%;display: inline-block;margin-top: -0px;"><legend>MÊS</legend>
<?php echo $novaData[1]; ?>
</fieldset>
<fieldset style="width: 8.05%;display: inline-block;margin-top: -0px;margin-left: 0px;margin-right: 0px;"><legend>ANO</legend>
<?php echo $novaData[0]; ?>
</fieldset>

<br>
<fieldset style="width: 96.9%;margin-top: -0px;margin-right: 0px;"><legend>LOCAL DE FALECIMENTO</legend>
	 <?php if (!empty($r->LOCALMORTE)) {
		 linha_vazio($r->LOCALMORTE) ;
	}  ?>
	 <?php if (!empty($r->ENDERECOOBITO)) {
		 linha_vazio($r->ENDERECOOBITO) ;
	}  ?>
<?php 
$x = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEOBITO)); foreach ($x as $k) :?>

<?=$k->cidade?>, <?=$k->uf?> 

<?php endforeach ?>

 </fieldset>
<br>
<fieldset style="width: 96.9%;display: inline-block;margin-top: -13px;margin-right: 0px;"><legend>CAUSA DA MORTE</legend>
<?=$r->CAUSAOBITO?>, <?=$r->CAUSAOBITOB?>, <?=$r->CAUSAOBITOC?>, <?=$r->CAUSAOBITOD?>
</fieldset>
<br>
<fieldset style="width: 55%; display: inline-block;">
<legend>SEPULTAMENTO/CREMAÇÃO (município e cemitério se conhecido) </legend>
<?=$r->LOCALSEPULTAMENTO?>
<?php if ($r->LOCALSEPULTAMENTO == '' || $r->LOCALSEPULTAMENTO == ' '): ?>
	<hr style="width:100%; max-width:100%; border:1px dashed black">
<?php endif ?>
</fieldset>
<fieldset style="width: 38.8%;display: inline-block;margin-right: 0px;margin-left: 0px;"><legend>DECLARANTE</legend>
<?=linha_vazio($r->NOMEDECLARANTE)?>
</fieldset>
<br>
<br>
<fieldset style="width: 97%;display: inline-block;margin-right: 0px;">
<legend>NOME E NÚMERO DO DOCUMENTO DO MÉDICO QUE ATESTOU O ÓBITO</legend>


<?php if (!empty($r->MEDICO)) {
 echo $r->MEDICO ;
}  ?>
<?php if (!empty($r->CRM)) {
echo " - CRM: ".$r->CRM ;
}
?>
</fieldset>
<br>
<fieldset style="padding: 15px;margin-top: 5px;"><legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
<p style="max-width: 650px; word-wrap: break-word; text-align: justify;">
<?php 
$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVROOBITO' and strFolha = '$r->FOLHAOBITO' and strTipo = 'OB' and nome = '$r->NOME' and setRegistroInvisivel!='S'");
$busca_averbacoes->execute();
$ba = $busca_averbacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ba as $ba) {
echo $ba->strAverbacao;
}

$busca_anotacoes = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$r->LIVROOBITO' and FOLHA = '$r->FOLHAOBITO' and TIPO = 'OBT'");
$busca_anotacoes->execute();
$ban = $busca_anotacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ban as $ban) {
echo $ban->ANOTACAO;
}
if ($busca_averbacoes->rowCount() == 0) {
	echo "<br>";
}	
if ($r->AVERBACAOTERMOANTIGO!='') {
	echo $r->AVERBACAOTERMOANTIGO;
}
if (isset($_GET['TEXTOFRASECERTIDAO']) && $_GET['TEXTOFRASECERTIDAO']!='') {
echo '<br>'.$_GET['TEXTOFRASECERTIDAO'];
}
 ?>
</p>

Observações:

Número da declaração de óbito: <?=$r->NDO?>. O(a) falecido(a) 
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
não era eleitor,	
<?php endif ?>

<?php if ($r->DEIXOUFILHOS == 'S'): ?>
	Deixou filhos (as), sendo eles, <?=mb_strtoupper($r->NOMEFILHOS)?>
<?php else: ?>
	Não deixou nenhum filho.
<?php endif ?>, 
<?php if ($r->ESTADOCIVIL == 'CA'): ?>
	Deixou, o(a) conjuge <?=mb_strtoupper($r->NOMECONJUGE)?>, casamento celebrado no cartório <?=mb_strtoupper($r->CARTORIOCASAMENTO)?>,
<?php endif ?>
<?php if ($r->ESTADOCIVIL == 'VI'): ?>
	Era viuvo(a), sendo o(a) conjuge <?=mb_strtoupper($r->NOMECONJUGE)?>, casamento celebrado no cartório <?=mb_strtoupper($r->CARTORIOCASAMENTO)?>,
<?php endif ?>
<?php if ($r->TIPOASSENTO == 'ORDEM'): ?>
	Registro feito por ordem Judicial.
<?php endif ?>

<?php 

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
</fieldset><br>
<br>
<?php 

$exibir_tabela_check = file_get_contents("config_paginas/exibir_tabela_certidoes.json");
$exibir_tabela = json_decode($exibir_tabela_check, true);
if ($exibir_tabela['nascimento'] == 'S') : ?>
	<fieldset style="padding: 10px;margin-top: -15px;"><legend>ANOTAÇÕES DE CADASTRO</legend>
<table style="width:100%" >
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
	<td><?=$r->strNumeroRg?></td>
	<td><?=$r->dataExpRg?></td>
	<td><?=$r->OrgaoExpRg?></td>
	<td><?=$r->dataValidadeRg?></td>
	</tr>
	<tr>
	<td style="border-left: none">PIS/NIS</td>
	<td><?=$r->strPisNis?></td>
	<td><?=$r->dataExpPisNis?></td>
	<td><?=$r->OrgaoExpPisNis?></td>
	<td><?=$r->dataValidadePisNis?></td>
	</tr>
	<tr>
	<td style="border-left: none">PASSAPORTE</td>
	<td><?=$r->strPassaporte?></td>
	<td><?=$r->dataExpPassaporte?></td>
	<td><?=$r->OrgaoExpPassaporte?></td>
	<td><?=$r->dataValidadePassaporte?></td>
	</tr>
	<tr>
	<td style="border-left: none">CARTÃO NACIONAL DE SAÚDE</td>
	<td><?=$r->strCartSaude?></td>
	<td><?=$r->dataExpCartSaude?></td>
	<td><?=$r->OrgaoExpCartSaude?></td>
	<td><?=$r->dataValidadeCartSaude?></td>
	</tr>


	<tr style="">
	<td style="border-left: none">TÍTULO DE ELEITOR</td>
	<td><?=$r->strTituloEleitor?></td>
	<td><?=$r->dataExpTituloEleitor?></td>
	<td><?=$r->OrgaoExpTituloEleitor?></td>
	<td><?=$r->dataValidadeTituloEleitor?></td>
	</tr>

	</tr>
	<tr style="">
	<td style="border-left: none">CTPS</td>
	<td><?=$r->strCtps?></td>
	<td><?=$r->dataExpCtps?></td>
	<td><?=$r->OrgaoExpCtps?></td>
	<td><?=$r->dataValidadeCtps?></td>
	</tr>

</tbody>

</table>
<br>
<div style="float: left;display: inline-table;">
<table style="width:150%;margin-top: -10px;">

<tbody>
	<tr style="">
	<td width="20%">CEP Residencial</td>
	<td width="20%"><?=$r->strCep?></td>
	</tr>
</tbody>

</table>
	</div>
<div style="float: left;margin-left:47%;margin-top: -10px;display: inline-table;">
<table style="width:150%">
	<tbody>
<tr style="">
<td width="40%">Grupo sanguíneo</td>
<td width="20%"><?=$r->strGrupoSanguineo?></td>
	</tr>
	</tbody>
</table>
</div>
<br><br>
* As anotações do cadastro acima não dispensam a apresentação do documento original, quando exigido pelo orgão solicitante.
	</fieldset>

<?php endif ?>

	</div>
	<br>
<div class="left" style="font-size: 8px;">
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

<div class="right" style="font-size: 8px">
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
						echo " Primeiro de  ";
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
					 <br><br><br><br>
	_______________________________________ <br>
	<?=strtoupper($nome_assinatura)?><br>
	<?=$funcao_assinatura?>
</div>






</body>



<?php endforeach  ?>
</html>
