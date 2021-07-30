<?php
session_start();
include('../../../controller/db_functions.php');
$id = $_GET['id'];
if (isset($_POST['subimit'])) {
unset($_POST['subimit']);

UPDATE_CAMPO_CNS('serventia','segmentoServentia',$_POST['segmentoServentia'],$id);
UPDATE_CAMPO_CNS('serventia','cnpj',$_POST['strCNPJ'],$id);
UPDATE_CAMPO_CNS('serventia','razaoSocial',$_POST['strRazaoSocial'],$id);
UPDATE_CAMPO_CNS('serventia','titularServentia',$_POST['strTituloServentia'],$id);
UPDATE_CAMPO_CNS('serventia','titularCpf',$_POST['strCpfTitular'],$id);
UPDATE_CAMPO_CNS('serventia','telefone1',$_POST['strTelefone1'],$id);
UPDATE_CAMPO_CNS('serventia','telefone2',$_POST['strTelefone2'],$id);
UPDATE_CAMPO_CNS('serventia','valorISSQN',$_POST['strMunicipioISSQN'],$id);
UPDATE_CAMPO_CNS('serventia','atoProcuracao',$_POST['strNumeroAtoProcuracao'],$id);
UPDATE_CAMPO_CNS('serventia','atoEscritura',$_POST['strNumeroAtoEscritura'],$id);
UPDATE_CAMPO_CNS('serventia','logradouro',$_POST['strLogradouro'],$id);
UPDATE_CAMPO_CNS('serventia','bairro',$_POST['strBairro'],$id);
UPDATE_CAMPO_CNS('serventia','Numero',$_POST['strNumero'],$id);
UPDATE_CAMPO_CNS('serventia','cep',$_POST['strCEP'],$id);
UPDATE_CAMPO_CNS('serventia','ufCidadeid',$_POST['intUFcidade'],$id);
var_dump($_POST);
//Volta para a pagina anterior
//header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'ALTERADO COM ÊXITO';

}





function UPDATE_CAMPO_CNS($tabela,$campo,$valor,$cns)
{

$pdo = conectar();
$update = $pdo->prepare("update $tabela set $campo = '$valor' where cns = '$cns'");

if ($update->execute()) {
	$_SESSION['sucesso'] = 'ALTERADO COM SUCESSO!';

}
else{

	 $_SESSION['erro'] = 'ERRO!!! VEJA O PROCEDIMENTO E TENTE NOVAMENTE'.'<br>'.$campo;
}
}




 ?>
