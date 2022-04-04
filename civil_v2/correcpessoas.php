<?php 
include('../controller/db_functions.php');
$pdo = conectar();

$busca = $pdo->prepare("SELECT ID,strNome, strCPFcnpj, dataNascimento,strProfissao, COUNT(*) as contador
FROM pessoa
GROUP BY strNome, strProfissao,dataNascimento, intUFcidade, strNaturalidade
HAVING COUNT(*) > 1");
$busca->execute();

$linhas = $busca->fetchAll(PDO::FETCH_OBJ);

foreach($linhas as $b){
	$contador = intval($b->contador);
	$cont = $contador - 1;

	$del = $pdo->prepare("DELETE FROM pessoa where strNome = '$b->strNome' and strProfissao = '$b->strProfissao' and dataNascimento = '$b->dataNascimento' and intUFcidade = '$b->intUFcidade' and strNaturalidade = '$b->strNaturalidade' limit".$cont);

	$del->execute();
}