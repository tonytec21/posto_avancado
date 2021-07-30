
<!DOCTYPE html>
<?php include('../../controller/db_functions.php');

#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
?>
<html>
<head>
	<title>Registro - Nascimento</title>
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
body{ font-size: 14px;font-family: "Arial";}
</style>
</head>

<body>
	<?php $r = PESQUISA_ALL_ID('registro_nascimento_novo',$id);
	foreach ($r as $r ) :
	#aqui vai preencher os inputs, vou preencher só um pra vc ver:
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
<div style="width: 100%; text-align: center; display: block;margin-top: -10px;" >
<hr style="border:1px solid black">
<h3 style="display: inline;margin-left: 0cm">LIVRO: A <?=intval($r->LIVRONASCIMENTO)?></h3>
<h3 style="display: inline;margin-left: 1cm">ORDEM: <?=$r->TERMONASCIMENTO?></h3>
<h3 style="display: inline;margin-left: 1cm">FOLHA: <?=intval($r->FOLHANASCIMENTO)?></h3>	
</div>	
</div>
<br>


<h2 style="text-align: center"> Declaração de Nascido Fora da Maternidade</h2>	

<p style="text-align: justify;">Declaro o nascimento da criança abaixo identificada, ocorrido fora da maternidade ou estabelecimento hospitalar. E para tanto, atesto que os dados e qualificações a seguir indicados são inteiramente verdadeiros.</p>
<p style="padding:5px; font-size: 12px; text-transform: uppercase;">	
	<b>data do nascimento:</b>  dia <?php //echo date('d/m/Y', strtotime($r->dataObito));

	$data = $r->DATANASCIMENTO ;
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

	?><br> <b>hora do nascimento:</b>  <?=$r->HORANASCIMENTO?> Horas <br> 

	<b>local nascimento:</b> <?=$r->LOCALNASCIMENTO?> <br> 
	<b>sexo da criança:</b> 
	<?php if ($r->SEXONASCIDO== 'M') :?>
	Masculino
	<?php else: ?>	
	Feminino
	<?php endif ?><br> 
	<b> nome completo da criança:</b> <?=strtoupper($r->NOMENASCIDO)?> <br>




	<b>Nome e Qualificação do Pai:</b> <?=strtoupper($r->NOMEPAI)?>, <?=$r->NACIONALIDADEPAI?>, <?=$r->PROFISSAOPAI?>  <br>
	<b>Nome e Qualificacao da Mãe:</b> <?=strtoupper($r->NOMEMAE)?>, <?=$r->NACIONALIDADEMAE?>, <?=$r->PROFISSAOMAE?><br>

	<b>Nome e qualificação avós paternos:</b> <?=strtoupper($r->AVO1PATERNO)?> e <?=strtoupper($r->AVO2PATERNO)?>. <br>
	<b>Nome e qualificação avós maternos:</b> <?=strtoupper($r->AVO1MATERNO)?> e <?=strtoupper($r->AVO2MATERNO)?> <br>
	</p>
<br><br><br> 
	Estou ciente de que o fornecimento de dados falsos constitui crime e que a presente declaração será comunicada ao juiz corregedor permanente.
	<br><br><br>


	<p style="text-align: center">_____________________________________</p> 
	<p style="text-align: center"><?=$_SESSION['nome']?></p> 
		<p style="text-align: center;margin-top: -10px;"><?=$_SESSION['funcao']?></p>





	</p>
	 </fieldset>

<?php endforeach  ?>
</body>
</html>
