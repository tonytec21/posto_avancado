<?php 	
session_start();
include('../../controller/conexao.php'); 
$pdo=conectar();


/*
#executando limpeza

$busca_limpeza = $pdo->prepare("SELECT * FROM registro_nascimento_novo");
$busca_limpeza->execute();
$limpa = $busca_limpeza->fetchAll(PDO::FETCH_OBJ);
foreach ($limpa as $l) {
if ($l->SELO == '' && $l->NOMENASCIDO =='' && $l->NOMEMAE == '' && $l->NOMEPAI == '' && $l->LIVRONASCIMENTO =='' && $l->FOLHANASCIMENTO =='' ) {
$del  = $pdo->prepare("DELETE FROM registro_nascimento_novo where ID = '$l->ID'");
$del->execute();
}
}
*/

$in = $pdo->prepare("INSERT INTO `registro_obito_novo` (`ID`, `ATOOBITO`, `TIPOLIVRO`, `LIVROOBITO`, `FOLHAOBITO`, `TERMOOBITO`, `MATRICULA`, `SELO`, `DATAENTRADA`, `TIPOASSENTO`, `TIPOPAPELSEGURANCA`, `NUMEROPAPELSEGURANCA`, `NDO`, `QUALIDADEDECLARANTE`, `NOMEDECLARANTE`, `CPFDECLARANTE`, `RGDECLARANTE`, `ORGAOEMISSORDECLARANTE`, `NACIONALIDADEDECLARANTE`, `NATURALIDADEDECLARANTE`, `DATANASCIMENTODECLARANTE`, `SEXODECLARANTE`, `ESTADOCIVILDECLARANTE`, `PROFISSAODECLARANTE`, `ENDERECODECLARANTE`, `BAIRRODECLARANTE`, `CIDADEDECLARANTE`, `JUIZMANDATO`, `VARAMANDATO`, `DATAEXPEDICAOMANDATO`, `NUMEROMANDATO`, `DATASENTENCAMANDATO`, `LOCALMORTE`, `ENDERECOOBITO`, `TIPOLOCALOBITO`, `CIDADEOBITO`, `DATAOBITO`, `HORAOBITO`, `CAUSAOBITO`, `TIPOMORTE`, `LOCALSEPULTAMENTO`, `MEDICO`, `CRM`, `NOME`, `CPF`, `RG`, `ORGAOEMISSOR`, `NACIONALIDADE`, `NATURALIDADE`, `DATANASCIMENTO`, `SEXO`, `COR`, `GEMEO`, `DEIXOUFILHOS`, `ELEITOR`, `DEIXOUBENS`, `ESTADOCIVIL`, `PROFISSAO`, `ENDERECO`, `BAIRRO`, `CIDADE`, `TEMPOINTRAUTERINA`, `NOMEPAI`, `CPFPAI`, `RGPAI`, `ORGAOEMISSORPAI`, `NACIONALIDADEPAI`, `NATURALIDADEPAI`, `DATANASCIMENTOPAI`, `SEXOPAI`, `ESTADOCIVILPAI`, `PROFISSAOPAI`, `ENDERECOPAI`, `BAIRROPAI`, `CIDADEPAI`, `NOMEMAE`, `CPFMAE`, `RGMAE`, `ORGAOEMISSORMAE`, `NACIONALIDADEMAE`, `NATURALIDADEMAE`, `DATANASCIMENTOMAE`, `SEXOMAE`, `ESTADOCIVILMAE`, `PROFISSAOMAE`, `ENDERECOMAE`, `BAIRROMAE`, `CIDADEMAE`, `NOMETESTEMUNHA1`, `CPFTESTEMUNHA1`, `RGTESTEMUNHA1`, `ORGAOEMISSORTESTEMUNHA1`, `PROFISSAOTESTEMUNHA1`, `NACIONALIDADETESTEMUNHA1`, `NATURALIDADETESTEMUNHA1`, `DATANASCIMENTOTESTEMUNHA1`, `SEXOTESTEMUNHA1`, `ESTADOCIVILTESTEMUNHA1`, `ENDERECOTESTEMUNHA1`, `BAIRROTESTEMUNHA1`, `CIDADETESTEMUNHA1`, `NOMETESTEMUNHA2`, `CPFTESTEMUNHA2`, `RGTESTEMUNHA2`, `ORGAOEMISSORTESTEMUNHA2`, `PROFISSAOTESTEMUNHA2`, `NACIONALIDADETESTEMUNHA2`, `NATURALIDADETESTEMUNHA2`, `DATANASCIMENTOTESTEMUNHA2`, `SEXOTESTEMUNHA2`, `ESTADOCIVILTESTEMUNHA2`, `ENDERECOTESTEMUNHA2`, `BAIRROTESTEMUNHA2`, `CIDADETESTEMUNHA2`, `strNumeroRg`, `dataExpRg`, `OrgaoExpRg`, `dataValidadeRg`, `strPisNis`, `dataExpPisNis`, `OrgaoExpPisNis`, `dataValidadePisNis`, `strPassaporte`, `dataExpPassaporte`, `OrgaoExpPassaporte`, `dataValidadePassaporte`, `strCartSaude`, `dataExpCartSaude`, `OrgaoExpCartSaude`, `dataValidadeCartSaude`, `strTituloEleitor`, `dataExpTituloEleitor`, `OrgaoExpTituloEleitor`, `dataValidadeTituloEleitor`, `strCtps`, `dataExpCtps`, `OrgaoExpCtps`, `dataValidadeCtps`, `strCep`, `strGrupoSanguineo`, `ROGODECLARANTE`, `AVERBACAOTERMOANTIGO`) VALUES (NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '', '', '', '', NULL, NULL, NULL, NULL);");
$in->execute();


$busca = $pdo->prepare("SELECT * FROM `registro_obito_novo` ORDER BY ID DESC LIMIT 1");
$busca->execute();
$linhas = $busca->fetch(PDO::FETCH_ASSOC);
$id = $linhas['ID'];
if (isset($_GET['acervo'])) {
$up_acervo = $pdo->prepare("UPDATE registro_obito_novo set status = 'ACV' where id = '$id'");
$up_acervo->execute();
header('location:../obito-acervo.php?id='.$id);
}
else{
	header('location:../obito-registro.php?id='.$id);
}