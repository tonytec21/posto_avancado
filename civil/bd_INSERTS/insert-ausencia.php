<?php 	
session_start();
include('../controller/conexao.php'); 
$pdo=conectar();

#executando limpeza

$busca_limpeza = $pdo->prepare("SELECT * FROM registro_ausencia_novo");
$busca_limpeza->execute();
$limpa = $busca_limpeza->fetchAll(PDO::FETCH_OBJ);
foreach ($limpa as $l) {
if ($l->SELO == '' && $l->NOME =='' && $l->NOMECURADOR == '' && $l->NOMEPROMOTOR == '' && $l->LIVROESPECIAL =='' && $l->FOLHAESPECIAL =='' ) {
$del  = $pdo->prepare("DELETE FROM registro_ausencia_novo where ID = '$l->ID'");
$del->execute();
}
}


$in = $pdo->prepare("INSERT INTO `registro_ausencia_novo` (`ID`, `JUIZ`, `VARA`, `DATASENTENCA`, `NOMECURADOR`, `CPFCURADOR`, `ESTADOCIVILCURADOR`, `PROFISSAOCURADOR`, `ENDERECOCURADOR`, `BAIRROCURADOR`, `CIDADECURADOR`, `ROGOCURADOR`, `NOMEPROMOTOR`, `TEMPOAUSENCIA`, `LIMITESCURATELA`, `NOME`, `CPF`, `NATURALIDADE`, `DATANASCIMENTO`, `ESTADOCIVIL`, `NOMECONJUGE`, `CARTORIOCASAMENTO`, `PROFISSAO`, `ENDERECO`, `BAIRRO`, `CIDADE`, `CARTORIOREGISTRO`, `LIVROREGISTRONASCIMENTO`, `FOLHAREGISTRONASCIMENTO`, `ATOESPECIAL`, `LIVROESPECIAL`, `FOLHAESPECIAL`, `TERMOESPECIAL`, `DATAENTRADA`, `TIPOPAPELSEGURANCA`, `NUMEROPAPELSEGURANCA`, `SELO`, `RETORNOSELODIGITAL`, `AVERBACAOTERMOANTIGO`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
$in->execute();

$busca = $pdo->prepare("SELECT * FROM `registro_ausencia_novo` ORDER BY ID DESC LIMIT 1");
$busca->execute();
$linhas = $busca->fetch(PDO::FETCH_ASSOC);
$id = $linhas['ID'];

header('location:../index/registro-ausencia-novo.php?id='.$id);