<?php 	
session_start();
include('../controller/conexao.php'); 
$pdo=conectar();

#executando limpeza

$busca_limpeza = $pdo->prepare("SELECT * FROM registro_emancipacao_novo");
$busca_limpeza->execute();
$limpa = $busca_limpeza->fetchAll(PDO::FETCH_OBJ);
foreach ($limpa as $l) {
if ($l->SELO == '' && $l->NOMEEMANCIPADO =='' && $l->NOMEMAE == '' && $l->NOMEPAI == '' && $l->LIVROESPECIAL =='' && $l->FOLHAESPECIAL =='' ) {
$del  = $pdo->prepare("DELETE FROM registro_emancipacao_novo where ID = '$l->ID'");
$del->execute();
}
}


$in = $pdo->prepare("INSERT INTO `registro_emancipacao_novo` (`ID`, `NOMEEMANCIPADO`, `DATANASCIMENTOEMANCIPADO`, `NATURALIDADEEMANCIPADO`, `SEXOEMANCIPADO`, `PROFISSAOEMANCIPADO`, `ENDERECOEMANCIPADO`, `BAIRROEMANCIPADO`, `CIDADEEMANCIPADO`, `CARTORIOREGISTRO`, `LIVROREGISTRONASCIMENTO`, `FOLHAREGISTRONASCIMENTO`, `DATAEMANCIPACAO`, `DATAJULGADO`, `NOMEPAI`, `NATURALIDADEPAI`, `PROFISSAOPAI`, `ENDERECOPAI`, `BAIRROPAI`, `CIDADEPAI`, `ROGOPAI`, `NOMEMAE`, `NATURALIDADEMAE`, `PROFISSAOMAE`, `ENDERECOMAE`, `BAIRROMAE`, `CIDADEMAE`, `ROGOMAE`, `NOMETUTOR`, `NATURALIDADETUTOR`, `PROFISSAOTUTOR`, `ENDERECOTUTOR`, `BAIRROTUTOR`, `CIDADETUTOR`, `ROGOTUTOR`, `ATOESPECIAL`, `LIVROESPECIAL`, `FOLHAESPECIAL`, `TERMOESPECIAL`, `DATAENTRADA`, `AVERBACAOTERMOANTIGO`, `SELO`, `RETORNOSELODIGITAL`, `TIPOPAPELSEGURANCA`, `NUMEROPAPELSEGURANCA`, `CPFPAI`, `CPFMAE`, `CPFTUTOR`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);");
$in->execute();

$busca = $pdo->prepare("SELECT * FROM `registro_emancipacao_novo` ORDER BY ID DESC LIMIT 1");
$busca->execute();
$linhas = $busca->fetch(PDO::FETCH_ASSOC);
$id = $linhas['ID'];

header('location:../index/registro-emancipacao-novo.php?id='.$id);