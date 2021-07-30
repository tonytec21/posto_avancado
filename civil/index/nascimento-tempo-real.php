<?php 

include('../controller/db_functions.php');
session_start();
$pdo = conectar();




if (!isset($_POST['CPFROGO'])) {



if (isset($_POST['FOLHANASCIMENTO']) || $_POST['LIVRONASCIMENTO'] || $_POST['TERMONASCIMENTO']) {

$livro = $_POST['LIVRONASCIMENTO'];
$folha = $_POST['FOLHANASCIMENTO'];
$termo = $_POST['TERMONASCIMENTO'];
#$id = $_POST['id'];




$pesquisa_livro_tempo_real = $pdo->prepare("SELECT * FROM registro_nascimento_novo where TERMONASCIMENTO = '$termo'");
$pesquisa_livro_tempo_real->execute();

if ($pesquisa_livro_tempo_real->rowCount()>0) {
	
die('<br><div class="badge bg-black col-sm-12"><h6> <i class="material-icons">warning</i>LIVRO, FOLHA E TERMO JA CADASTRADOS</h6></div>
	');
}

else{
	die('0');
}

}

}



if (isset($_POST['CPFROGO']) && !empty($_POST['CPFROGO']) ) {
	$var_teste = $_POST['CPFROGO'];

	$buscando_cpf = $pdo->prepare("SELECT * FROM pessoa where strCPFcnpj = '$var_teste' limit 1");
	$buscando_cpf->execute();
	if ($buscando_cpf->rowCount()>0) {
		$cpf_enc = $buscando_cpf->fetch(PDO::FETCH_ASSOC);
		$nome = $cpf_enc['strNome'];
		die('<script type="text/javascript">swal("SUCESSO!"," ASSINANTE A ROGO: '.$nome.'","success");</script>');
	}
	else{
		die('<script type="text/javascript">swal("ERRO!","ASSINANTE A ROGO INFORMADO NÃO LOCALIZADO NO CADASTRO DE PESSOAS","error");</script>');
	}
}

 ?>