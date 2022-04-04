<?php 
include('../../controller/db_functions.php');
session_start();
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
$tabela = 'registro_nascimento_novo';
$json_dados = json_table_registro($tabela, $id);
$json_dados = json_decode($json_dados, true); 
$dados = json_encode($json_dados[0],JSON_UNESCAPED_UNICODE);
$dados = json_decode($dados, true);

$pdo = conectar();
$busca_dados2 = $pdo->prepare("SELECT * FROM info_registros_civil where id_registro_nascimento = '$id'");
$busca_dados2->execute();
if ($busca_dados2->rowCount()>0) {
	$lin = $busca_dados2->fetchAll(PDO::FETCH_OBJ);
	$json_dados2 = json_encode($lin);
	$json_dados2 = json_decode($json_dados2, true); 
	$dados2 = json_encode($json_dados2[0],JSON_UNESCAPED_UNICODE);
	$dados2 = json_decode($dados2, true);
}


$json_dados  = $dados['JSON_DADOS_ADD'];
$json_dados = json_decode($json_dados,true);

if (isset($json_dados['IDPESSOADECLARANTE'])) {$id_declarante = $json_dados['IDPESSOADECLARANTE'];}
$dataRegistro = $dados['DATAENTRADA'];
if (isset($json_dados['IDPESSOAPAI'])) {$id_pai = $json_dados['IDPESSOAPAI'];}
if (isset($json_dados['IDPESSOAMAE'])) {$id_mae = $json_dados['IDPESSOAMAE'];}
if (isset($json_dados['IDPESSOAPAISOCIO'])) {$id_paisocio = $json_dados['IDPESSOAPAISOCIO'];}
if (isset($json_dados['IDPESSOAMAESOCIO'])) {$id_maesocio = $json_dados['IDPESSOAMAESOCIO'];}
if (isset($json_dados['IDPESSOATESTEMUNHA1'])) {$id_TESTEMUNHA1 = $json_dados['IDPESSOATESTEMUNHA1'];}
if (isset($json_dados['IDPESSOATESTEMUNHA2'])) {$id_TESTEMUNHA2 = $json_dados['IDPESSOATESTEMUNHA2'];}


$ass_funcionario = mb_strtoupper($_SESSION['nome']).'<br>'.mb_strtoupper($_SESSION['funcao']);
if (isset($_GET['nomeassinatura'])) {
	$ass_funcionario = str_replace("/","<br>",$_GET['nomeassinatura']);
}


 ?>


		<div id="conteudoregistro" style="border:none; text-align: justify;zoom:80%">

			<?php include('include-teornascimento.php'); ?>
			
		</div>
			
			
