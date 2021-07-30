<?php 

include_once('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];

$j = PESQUISA_ALL_ID('pessoa', $id);


#tags a usar:
# page
#style

?>

<!DOCTYPE html>
<html>
<head>
<style type="text/css">

#container {
    width: 100%;
  
    border:4px solid black;
}

.box {

    width: 40%;
    margin-left: 10px;
   
}
.dados{
	width: 40%;
	display: inline-block;
}

</style>	
	<title></title>
</head>
<body >
<?php 	
$c = PESQUISA_ALL('serventia');
foreach ($c as $c ):?>

<div style="text-align: center">	
<h1> <?=$c->razaoSocial?> (Cartório Único)  	
<br>	
Titular da Serventia: <?=$c->titularServentia?>
<br>Telefone:<?=$c->telefone1?>; // <?=$c->telefone2?>
</h1>
<?php endforeach ?>
</div>	

<div id="container" >


<?php foreach ($j as $key): ?>
<div class="box" style="background: silver;width: 100% ">Razão Social: <?=$key->strRazaoSocial?></div>	
<div>
<h4 style="text-align: left; display: inline">Nº da Ficha (<?=$key->ID?>) <br>	Data de Abertura:<?=$key->dataCadastro?>	</h4>

<hr>
<br>
<div style="margin-left: 10px;" class="dados">CNPJ: <?=$key->strCPFcnpj?><br>
TELEFONE: <?=$key->strTelefone?><br>
CELULAR: <?=$key->strTelCelular?><br>
DATA ABERTURA: <?=$key->dataCadastro?><br>
DATA DE NASCIMENTO: <?=$key->dataNascimento?></div>

<div class="dados" style="margin-left: 15%;">
	<h5>Representantes:	</h5>
	Representante 1: <?=$key->strRepresentante1?><br>
	Representante 1: <?=$key->strRepresentante2?><br>
	Representante 1: <?=$key->strRepresentante3?><br>
</div>	

<hr>	


<h5>Assinaturas por extenso ou abreviadas:	</h5>

<hr>
<br>
<br>			
<hr>	
<br>
<br>		
<hr>	
<br>

</div>
	

<?php endforeach ?>
</div>


</body>
</html>