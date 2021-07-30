<?php 	
session_start();
include('../controller/conexao.php'); 
$pdo=conectar();



$tipo_registro = $_GET['tiporeg']; 


#executando limpeza
/*
$busca_limpeza = $pdo->prepare("SELECT * FROM registro_livro_e");
$busca_limpeza->execute();
$limpa = $busca_limpeza->fetchAll(PDO::FETCH_OBJ);
foreach ($limpa as $l) {
if (empty($l->JSON_DADOS)) {
$del  = $pdo->prepare("DELETE FROM registro_livro_e where ID = '$l->ID'");
$del->execute();
}
}
*/

$in = $pdo->prepare("INSERT INTO `registro_livro_e` (`TIPOREGISTRO`) VALUES ('$tipo_registro');");



if ($in->execute()) {
$busca = $pdo->prepare("SELECT * FROM `registro_livro_e` ORDER BY ID DESC LIMIT 1");
$busca->execute();
$linhas = $busca->fetch(PDO::FETCH_ASSOC);
$id = $linhas['ID'];

header('location:../index/registro-livroe-novo.php?id='.$id.'&tiporeg='.$tipo_registro);

}

else{
$forma_table = $pdo->prepare("CREATE TABLE IF NOT EXISTS `registro_livro_e` (
  `ID` int(11) NOT NULL AUTO_INCREMENT,
  `DOCPARTE1` varchar(30) DEFAULT NULL,
  `TIPODOCPARTE1` varchar(3) DEFAULT NULL,
  `DOCPARTE2` varchar(30) DEFAULT NULL,
  `TIPODOCPARTE2` varchar(3) DEFAULT NULL,
  `DOCPARTE3` varchar(30) DEFAULT NULL,
  `TIPODOCPARTE3` varchar(3) DEFAULT NULL,
  `TEXTO_REGISTRO` longtext,
  `SELO` varchar(100) DEFAULT NULL,
  `RETORNOSELODIGITAL` mediumtext,
  `LIVRO` varchar(10) DEFAULT NULL,
  `FOLHA` varchar(10) DEFAULT NULL,
  `TERMO` varchar(10) DEFAULT NULL,
  `MATRICULA` varchar(50) DEFAULT NULL,
  `DATAREGISTRO` varchar(10) DEFAULT NULL,
  `ATO` varchar(45) DEFAULT NULL,
  `TIPOATO` varchar(45) DEFAULT NULL,
  `AVERBACAOTERMOANTIGO` mediumtext,
  `TIPOREGISTRO` varchar(20) DEFAULT NULL,
  `QUALIFICACAOPAIPARTE1` mediumtext,
  `QUALIFICACAOMAEPARTE1` mediumtext,
  `QUALIFICACAOPAIPARTE2` mediumtext,
  `QUALIFICACAOMAEPARTE2` mediumtext,
  `QUALIFICACAOPAIPARTE3` mediumtext,
  `QUALIFICACAOMAEPARTE3` mediumtext,
  `DATAOCORRIDO` varchar(15) DEFAULT NULL,
  `REGIMECASAMENTO` mediumtext,
  `DESCRICAOREGISTRO` mediumtext,
  `IDPESSOAPARTE1` int(11) DEFAULT NULL,
  `IDPESSOAPARTE2` int(11) DEFAULT NULL,
  `IDPESSOAPARTE3` int(11) DEFAULT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;
");

$forma_table->execute();

$_SESSION['erro'] = "SERVIÇO INICIALIZADO, FAVOR ACESSE NOVAMENTE PARA FAZER PRIMEIRO REGISTRO";

header('Location: ' . $_SERVER['HTTP_REFERER']);


}