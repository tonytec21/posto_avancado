<?php 

include('../controller/db_functions.php');
session_start();
$pdo = conectar();




if (isset($_POST['FOLHAOBITO']) || $_POST['LIVROOBITO']  || $_POST['TERMOOBITO']) {

$livro = $_POST['LIVROOBITO'];
$folha = $_POST['FOLHAOBITO'];
$termo = $_POST['TERMOOBITO'];



if($_POST['TIPOLIVRO'] == '4'){
	$pesquisa_livro_tempo_real = $pdo->prepare("SELECT * FROM registro_obito_novo where TIPOLIVRO = '4' AND TERMOOBITO = '$termo'");
}
else{
	$pesquisa_livro_tempo_real = $pdo->prepare("SELECT * FROM registro_obito_novo where TIPOLIVRO = '5' AND TERMOOBITO = '$termo'");
}
$pesquisa_livro_tempo_real->execute();

if ($pesquisa_livro_tempo_real->rowCount()>0) {
	
die('<br><div class="badge bg-black col-sm-12"><h6> <i class="material-icons">warning</i>LIVRO, FOLHA E TERMO JA CADASTRADOS</h6></div>
	');
}

else{
	die('0');
}

}

 ?>