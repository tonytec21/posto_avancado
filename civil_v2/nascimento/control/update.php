<?php 
include('../../controller/db_functions.php');
$pdo = conectar();

if (isset($_POST['dados_add'])) {
	$obs = addslashes($_POST['observacoes_registro']);
	$int_teor = addslashes($_POST['int_teor']);
	$exibir_obs_registro = $_POST['exibir_obs_registro'];
	$id = $_POST['id'];

	$busca_table_add = $pdo->prepare("SELECT * FROM info_registros_civil where id_registro_nascimento = '$id'");
	$busca_table_add->execute();
	
	if ($busca_table_add ->rowCount()<1) {
	$in_table_add = $pdo->prepare("INSERT INTO `bookc`.`info_registros_civil` (`id_registro_nascimento`, `inteiro_teor`, `observacoes_registro`, `obs_visivel_certidao`) VALUES ('$id', '$int_teor', '$obs', '$exibir_obs_registro');");
	$in_table_add->execute();
	}

	$query = "UPDATE info_registros_civil set obs_visivel_certidao = '$exibir_obs_registro', observacoes_registro ='$obs', inteiro_teor = '$int_teor' where id_registro_nascimento = '$id'" ;
	#$query = addslashes($query);
	$update = $pdo->prepare($query);
	if ($update->execute()) {
		die('{"sucesso":" salvo com sucesso"}');
	}
	else{
		$array = $update->errorInfo();
		$erro = $array[2];
		die('{"erro":"erro ao salvar informação : '.$erro.'"}');
	}
	exit();
}

$tabela = "registro_nascimento_novo";
$campo = $_POST['nome_campo_update'];
$valor = addslashes($_POST['campo_update']);
$id = $_POST['id'];

if (isset($_POST['campo_json']) && $_POST['campo_json'] == 'ok') {
	$busca = $pdo->prepare("SELECT JSON_DADOS_ADD from $tabela where ID = '$id' ");
	if ($busca->execute() && $busca->rowCount()>0) {
		$linha = $busca->fetch(PDO::FETCH_ASSOC);
		$campo_json = $linha['JSON_DADOS_ADD'];

		if (empty($campo_json) || $campo_json == '' || $campo_json == NULL) {
			$campo_json = '{ "'.$campo.'":"'.addslashes($valor).'" }';
		}
		else{
			$campo_json = str_replace("}", ",", $campo_json);
			$campo_json = str_replace($campo, ",", $campo_json);
			$campo_json = $campo_json.' "'.$campo.'":"'.addslashes($valor).'" }'; 
		}
	
	}
	else{
		$campo_json = '';
	}

	$campo = 'JSON_DADOS_ADD';
	$valor = $campo_json;

}

$update = $pdo->prepare("update $tabela set $campo = '$valor' where id = '$id'");
if ($update->execute()) {
	die('{"sucesso":"'.$campo.' salvo com sucesso"}');
}
else{
	$array = $update->errorInfo();
  	$erro = $array[2];
	die('{"erro":"erro ao salvar informação : '.$erro.'"}');
}
?>