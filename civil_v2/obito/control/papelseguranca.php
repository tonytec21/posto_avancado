<?php
include('../../controller/db_functions.php');
$pdo = conectar();

$npapel = $_POST['numeropapel'];
$tpapel = $_POST['tipopapel'];

$busca = $pdo->prepare("SELECT * FROM folhaseguranca where EMPRESA = '$tpapel' and PAPEL = '$npapel'");
$busca->execute();


if ($busca->rowCount()>0) {
	$b = $busca->fetch(PDO::FETCH_ASSOC);
	
	if ($b['STATUS'] == 'U') {
		die('{"erro":"Atenção!, Folha de segurança ja utilizada anteriormente"}');
	}
	elseif ($b['STATUS'] == 'L') {
		die('{"sucesso":"Tudo certo, Folha Livre"}');
	}
	

}

else{
	die('{"warning":"Folha informada não foi inserida no cadastro de folhas de segurança"}');	
}




?>