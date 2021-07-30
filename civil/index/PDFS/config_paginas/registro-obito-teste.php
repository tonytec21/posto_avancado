<!DOCTYPE html>

<?php include('../../../../controller/db_functions.php');
session_start();
#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
?>
<html>
<head>
	<textarea class="form-control" id="strTextoLavraturaCartorio" rows="8" name="strObservacao" placeholder="Escreva a observação aqui">

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
</style>
</head>
<?php $r = PESQUISA_ALL_ID('registro_obito',$id);
foreach ($r as $r ) :
#aqui vai preencher os inputs, vou preencher só um pra vc ver:
	?>
<body>

<p style="text-align: center;"><img style="max-width: 7%" src="config_paginas/img/brasao.jpg"></p>
<p style="text-align: center;margin-bottom: -10px;color:#1894dc">REPÚBLICA FEDERATIVA DO BRASIL</p>
<p style="text-align: center;margin-bottom: -20px;color:#1894dc">REGISTRO CIVIL DAS PESSOAS NATURAIS</p>
<h1 style="text-align: center;margin-bottom: -10px;">C<span style="font-size:20px">ERTIDÃO de </span>Ó<span style="font-size:20px">BITO</span></h1>
<p style="text-align: center">Nome: <?=$r->strNome?></p>
<!--p style="text-align: center;margin-top: -14px;"><?=$r->strNome?> </p-->
<fieldset style="padding: 10px;"> <legend>CPF</legend>
<?=$r->strCPF?>
</fieldset>
<p class="center" style="margin-top: 1px;"> MATRICULA</p>
<h3 class="center" style="margin-top: -18px;"> <?=$r->strMatricula?> </h3>

	<fieldset style="width: 11%; display: inline-block;"><legend>SEXO</legend>
		<?php if ($r->setSexo == 'M') {
			echo "Masculino";
		} else  {
			// code...
			echo "Feminino";
		}
		 ?>
	 </fieldset>

	<fieldset style="width: 8%; display: inline-block;margin-top: -0px;"><legend>COR</legend>
		<?php if ($r->setCor == 'BR') {
			echo "Branca";
		} elseif ($r->setCor == 'PR') {
			// code...
			echo "Preta";
		} elseif ($r->setCor == 'PA') {
			// code...
			echo "Parda";
		} elseif ($r->setCor == 'AM') {
			// code...
			echo "Amarela";
		} else  {
			// code...
			echo "Indígena";
		}
		 ?>
	</fieldset>
	<fieldset style="width: 71%; display: inline-block;margin-top: -0px;"><legend>ESTADO CÍVIL E IDADE</legend>
		<?php if ($r->setEstadoCivil == 'SO') {
			echo "Solteiro(a),";
		} elseif ($r->setEstadoCivil == 'CA') {
			// code...
			echo "Casado(a),";
		} elseif ($r->setEstadoCivil == 'DI') {
			// code...
			echo "Divorciado(a),";
		} elseif ($r->setEstadoCivil == 'VI') {
			// code...
			echo "Viúvo(a),";
		} else  {
			// code...
			echo "Separado(a),";
		}
		 ?>

		<?php echo GExtenso::numero(calculo_idade($r->dataNascimento))." anos de idade"; ?>
	</fieldset>



<br>
<div class="all">
<fieldset style="width: 12%; display: inline-block;"><legend>NATURALIDADE</legend><?=$r->strNatural?></fieldset>
<fieldset style="width: 70%; display: inline-block;margin-top: -0px;"><legend>DOCUMENTO DE IDENTIFICAÇÃO</legend><?=$r->strRG?></fieldset>
<fieldset style="width: 8%; display: inline-block;margin-top: -0px;"><legend>ELEITOR</legend>
	<?php if ($r->setEleitor == 'S') {
		echo "Sim";
	} else  {
		// code...
		echo "Não";
	}
	 ?>
</fieldset>

<br>

<fieldset style="width: 100%;margin-top: -0px;"><legend>FILIAÇÃO E RESIDÊNCIA</legend>
	<p style=";margin-top: -4px;">
	Filho(a) de <?php if (!empty($r->strPai)) {
		echo $r->strPai ;
	}  ?>
	<?php if (!empty($r->strPai) && !empty($r->strMae) )   echo "e"; ?>
	<?php if (!empty($r->strMae)) {
		echo $r->strMae ;
	}  ?>, Residente e domiciliada <?=$r->strEndereco?>, em: <?=$r->strCidade?>, Estado do Maranhão
	</p>
</p>

</fieldset>
<br>
<fieldset style="width: 67%; display: inline-block;margin-top: -8px;"><legend>DATA E HORA DE FALECIMENTO</legend>
<?php //echo date('d/m/Y', strtotime($r->dataObito));

$data = $r->dataObito ;
$nova_data = explode("-", $data);
if ($nova_data[2] == '01' || $nova_data[1] == '1') {
		echo " Um de  ";
	}elseif ($nova_data[2] == '02' || $nova_data[1] == '2') {
		echo " Dois de ";
	} elseif ($nova_data[2] == '03' || $nova_data[1] == '3') {
		echo " Três ";
	} elseif ($nova_data[2] == '04' || $nova_data[1] == '4') {
		echo " Quatro de ";
	} elseif ($nova_data[2] == '05' || $nova_data[1] == '5') {
		echo " Cinco de ";
	} elseif ($nova_data[2] == '06' || $nova_data[1] == '6') {
		echo " Seis de ";
	} elseif ($nova_data[2] == '07' || $nova_data[1] == '7') {
		echo " Sete de ";
	} elseif ($nova_data[2] == '08' || $nova_data[1] == '8') {
		echo " Oito de ";
	} elseif ($nova_data[2] == '09' || $nova_data[1] == '9') {
		echo " Nove de ";
	} else {echo  ucfirst(GExtenso::numero($nova_data[2]));}
echo ucfirst(GExtenso::numero($nova_data[2]));
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

echo GExtenso::numero($nova_data[0]);

?>  às <?php echo date('H:i:s', strtotime($r->horaObito));
?> horas

</fieldset>
<fieldset style="width: 6%;display: inline-block;margin-top: -0px;"><legend>DIA</legend>
<?php echo $nova_data[2]; ?>
</fieldset>
<fieldset style="width: 6%;display: inline-block;margin-top: -0px;"><legend>MÊS</legend>
<?php echo $nova_data[1]; ?>
</fieldset>
<fieldset style="width: 8%;display: inline-block;margin-top: -0px;;"><legend>ANO</legend>
<?php echo $nova_data[0]; ?>
</fieldset>
<br>
<fieldset style="width: 100%;margin-top: -0px;"><legend>LOCAL DE FALECIMENTO</legend>

	 <?php if (!empty($r->strEnderecoObito)) {
		echo $r->strEnderecoObito ;
	}  ?>
	<?php if (!empty($r->strEnderecoObito) && !empty($r->strCidadeObito) )   echo "em "; ?>
	<?php if (!empty($r->strCidadeObito)) {
	 echo $r->strCidadeObito ;
 } echo " na cidade do Maranhão ";
	 ?>

 </fieldset>
<br>
<fieldset style="width: 100%;display: inline-block;margin-top: -13px;"><legend>CAUSA DA MORTE</legend>
<?=$r->strCausaMorte?>
</fieldset>
<br>
<fieldset style="width: 55%; display: inline-block;">
<legend>SEPULTAMENTO/CREMAÇÃO (município e cemitério se conhecido) </legend>
<?=$r->strLocalSepultamento?>

</fieldset>
<fieldset style="width: 270px;display: inline-block;"><legend>DECLARANTE</legend>
<?=$r->strDeclarante?>
</fieldset>
<br>

<fieldset style="width: 100%;display: inline-block;">
<legend>NOME E NÚMERO DO DOCUMENTO DO MÉDICO QUE ATESTOU O ÓBITO</legend>
<?=$r->strMedico?>

<?php if (!empty($r->strMedico)) {
 echo $r->strMedico ;
}  ?>
<?php echo " - CRM: "; ?>
<?php if (!empty($r->strCrmMedico)) {
echo $r->strCrmMedico ;
}
?>
</fieldset>
<br>
<fieldset style="padding: 15px;margin-top: 5px;"><legend>AVERBAÇÕES/ANOTAÇÕES A ACRESCER</legend>
	<?php if (!empty($r->strTextoAnatocoes)) {
	 echo '<span style="margin-top: -20px;>"'.$r->strTextoAnatocoes."</span>" ;
	}  ?>

</fieldset>
<br>
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
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	<tr>
	<td style="border-left: none">PIS/NIS</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	<tr>
	<td style="border-left: none">PASSAPORTE</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>
	<tr>
	<td style="border-left: none">CARTÃO NACIONAL DE SAÚDE</td>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>

</tbody>

</table>
<br>
<table width="100%" style="margin-top: -10px;">
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
	<td></td>
	<td></td>
	<td></td>
	<td></td>
	</tr>

	</tr>

</tbody>

</table>
<br>
<div style="float: left;">
<table style="width:40%;margin-top: -10px;">

<tbody>
	<tr style="">
	<td width="20%">CEP Residencial</td>
	<td width="20%"></td>
	</tr>
</tbody>

</table>
	</div>
<div style="float: left;margin-left:136px;margin-top: -10px;">
<table style="width:50%">
	<tbody>
<tr style="">
<td width="20%">Grupo sanguíneo</td>
<td width="20%"></td>
	</tr>
	</tbody>
</table>
</div>
<br><br>
* As anotações do cadastro acima não dispensam a apresentação do documento original, quando exigido pelo orgão solicitante.
	</fieldset>


	</div>
	<br>
<div class="left">
	NOME DO OFÍCIO 	<br>
	OFICIAL REGISTRADOR <br>
	MUNICÍPIO/UF <br>
	ENDEREÇO<br>
	TELEFONE<br>
	EMAIL
</div>

<div class="right">
	O conteúdo da certidão é verdadeiro Dou Fé <br>
	Data e local <br><br><br>
	_______________________________________ <br>
	Assinatura do Oficial
</div>
</body>
<?php endforeach  ?>
</textarea>
</html>
