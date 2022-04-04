<?php 
include('../controller/db_functions.php');
$pdo = conectar();



function insertpessoa(
    $nome,
    $tipopessoa,
    $cpf,
    $rg,
    $orgaoem,
    $sexo,
    $profissao,
    $nacionalidade,
    $naturalidade,
    $datanascimento,
    $estadocivil,
    $endereco,
    $bairro,
    $cidade,
    $nomepai,
    $nomemae
)
{
$pdo = conectar();


$nome = addslashes($nome);
$endereco = addslashes($endereco);
$bairro = addslashes($bairro);
$naturalidade = addslashes($naturalidade);
$cidade = addslashes($cidade);
$nomepai = addslashes($nomepai);
$nomemae = addslashes($nomemae);
$profissao = addslashes($profissao);
$nacionalidade = addslashes($nacionalidade);

if (empty($estadocivil) || strlen($estadocivil)>3) {
$estadocivil = 'SO';
}

$query = "INSERT INTO `pessoa` (`ID`, `setTipoPessoa`, `hiddencaminhofoto`, `strNome`, `strRazaoSocial`, `strCPFcnpj`, `strRG`, `strOrgaoEm`, `strProfissao`, `strNaturalidade`, `setSexo`, `strNacionalidade`, `dataNascimento`, `setEstadoCivil`, `strNomeFilhos`, `strNomeConjuge`, `strNomeExConjuge`, `dataCasamento`, `strCartorioCasamento`, `strLogradouro`, `strEmail`, `strBairro`, `intUFcidade`, `strUF`, `strTelefone`, `strTelCelular`, `strNomePai`, `strNomeMae`, `dataCadastro`, `strRepresentante1`, `strRepresentante2`, `strRepresentante3`, `strObservacao`, `setRegimeBens`, `dataEmissao`, `strFicha`, `scanImgAssinatura`, `scanImgDigital`, `RETORNOSELODIGITAL`, `pessoa_viva`, `tipo_cadastro`, `descdocestrangeiro`, `docestrangeiro`, `cpfRepresentante1`, `cpfRepresentante2`, `cpfRepresentante3`) VALUES (NULL, 'F', NULL, '$nome', NULL, '$cpf', '$rg', '$orgaoem', '$profissao', '$naturalidade', '$sexo', '$nacionalidade', '$datanascimento', '$estadocivil', NULL, NULL, NULL, NULL, NULL, '$endereco', NULL, '$bairro', '$cidade', 'MA', NULL, NULL, '$nomepai', '$nomemae', CURRENT_TIMESTAMP, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2', NULL, NULL, NULL, NULL, NULL);";


//VENDO SE NÃO JA ESTÁ NA TABELA
$busca = $pdo->prepare("SELECT ID FROM pessoa where strCPFcnpj = '$cpf' limit 1");

if (strlen($cpf) < 9 &&  strlen($naturalidade) < 5 && strlen($cidade) < 5 && strlen($datanascimento) < 5) {
$busca = $pdo->prepare("SELECT ID FROM pessoa where strNome = '$nome' limit 1");   
}
elseif (strlen($cpf) < 9 &&  strlen($naturalidade) > 5 && strlen($cidade) < 5 && strlen($datanascimento) < 5){
$busca = $pdo->prepare("SELECT ID FROM pessoa where strNome = '$nome' and strNaturalidade = '$naturalidade' limit 1");
}

elseif (strlen($cpf) < 9 &&  strlen($naturalidade) < 5 && strlen($cidade) > 5 && strlen($datanascimento) < 5){
$busca = $pdo->prepare("SELECT ID FROM pessoa where strNome = '$nome' and intUFcidade = '$cidade' limit 1");
}

elseif (strlen($cpf) < 9 &&  strlen($naturalidade) < 5 && strlen($cidade) < 5 && strlen($datanascimento) > 5){
$busca = $pdo->prepare("SELECT ID FROM pessoa where strNome = '$nome' and dataNascimento = '$datanascimento' limit 1");
}


$busca->execute();
if($busca->rowCount()<1)
{
    if(!empty($nome) && strlen($nome) > 5){
    $inpessoas = $pdo->prepare($query);
    if($inpessoas->execute()){
        $id = $pdo->prepare("SELECT ID from pessoa ORDER BY ID DESC LIMIT 1");
        $id->execute();
        $bid = $id->fetch(PDO::FETCH_ASSOC);
        $lastid = $bid['ID'];
        return $lastid;
    }

    else{
        return "REGISTRO NÃO INSERIDO <br>";
    }
}
}
else{
    echo "ja encontrado na tabela pessoas <br>";
    var_dump($busca);
    if(!empty($nome) && strlen($nome) > 5){
    $linhas = $busca->fetch(PDO::FETCH_ASSOC);
    $id = $linhas['ID'];
    return $id;
    }
    else{
        $id = '';
        return $id;
    }
}

}



//FORMATANDO DADOS NASCIMENTO ------- 

$busca = $pdo->prepare("SELECT * FROM registro_nascimento_novo");
$busca->execute();
$linha = $busca->fetchAll(PDO::FETCH_OBJ);
foreach ($linha as $b){



echo "REGISTRO NASCIMENTO:".$b->ID."--------------------------------- <br>";
/*

echo "OBTENDOS DADOS DO PAI: <br>";


$NOMEPAI = $b->NOMEPAI;
$CPFPAI = $b->CPFPAI;
$NACIONALIDADEPAI = $b->NACIONALIDADEPAI;
$NATURALIDADEPAI = $b->NATURALIDADEPAI;
$RGPAI = $b->RGPAI;
$ORGAOEMISSORPAI = $b->ORGAOEMISSORPAI;
$CIDADEPAI = $b->CIDADEPAI;
$ENDERECOPAI = $b->ENDERECOPAI;
$BAIRROPAI = $b->BAIRROPAI;
$ESTADOCIVILPAI = $b->ESTADOCIVILPAI;
$DATANASCIMENTOPAI = $b->DATANASCIMENTOPAI;
$SEXOPAI = $b->SEXOPAI;
$PROFISSAOPAI = $b->PROFISSAOPAI;
$AVO1PATERNO = $b->AVO1PATERNO;
$AVO2PATERNO = $b->AVO2PATERNO;


$idpai = insertpessoa($NOMEPAI,'F',$CPFPAI,$RGPAI,$ORGAOEMISSORPAI,$SEXOPAI,$PROFISSAOPAI,$NACIONALIDADEPAI,$NATURALIDADEPAI,$DATANASCIMENTOPAI,$ESTADOCIVILPAI,$ENDERECOPAI,$BAIRROPAI,$CIDADEPAI,$AVO1PATERNO,$AVO2PATERNO);

echo $idpai."<br>";



echo "OBTENDOS DADOS DA MAE: <br>";
$NOMEMAE = $b->NOMEMAE;
$CPFMAE = $b->CPFMAE;
$NACIONALIDADEMAE = $b->NACIONALIDADEMAE;
$NATURALIDADEMAE = $b->NATURALIDADEMAE;
$RGMAE = $b->RGMAE;
$ORGAOEMISSORMAE = $b->ORGAOEMISSORMAE;
$CIDADEMAE = $b->CIDADEMAE;
$ENDERECOMAE = $b->ENDERECOMAE;
$BAIRROMAE = $b->BAIRROMAE;
$ESTADOCIVILMAE = $b->ESTADOCIVILMAE;
$DATANASCIMENTOMAE = $b->DATANASCIMENTOMAE;
$SEXOMAE = $b->SEXOMAE;
$PROFISSAOMAE = $b->PROFISSAOMAE;
$AVO1MATERNO = $b->AVO1MATERNO;
$AVO2MATERNO = $b->AVO2MATERNO;

$idmae = insertpessoa($NOMEMAE,'F',$CPFMAE,$RGMAE,$ORGAOEMISSORMAE,$SEXOMAE,$PROFISSAOMAE,$NACIONALIDADEMAE,$NATURALIDADEMAE,$DATANASCIMENTOMAE,$ESTADOCIVILMAE,$ENDERECOMAE,$BAIRROMAE,$CIDADEMAE,$AVO1MATERNO,$AVO2MATERNO);

echo $idmae."<br>";




echo "OBTENDOS DADOS DA TESTEMUNHA1: <br>";
$NOMETESTEMUNHA1 = $b->NOMETESTEMUNHA1;
$CPFTESTEMUNHA1 = $b->CPFTESTEMUNHA1;
$NACIONALIDADETESTEMUNHA1 = $b->NACIONALIDADETESTEMUNHA1;
$NATURALIDADETESTEMUNHA1 = $b->NATURALIDADETESTEMUNHA1;
$RGTESTEMUNHA1 = $b->RGTESTEMUNHA1;
$ORGAOEMISSORTESTEMUNHA1 = $b->ORGAOEMISSORTESTEMUNHA1;
$CIDADETESTEMUNHA1 = $b->CIDADETESTEMUNHA1;
$ENDERECOTESTEMUNHA1 = $b->ENDERECOTESTEMUNHA1;
$BAIRROTESTEMUNHA1 = $b->BAIRROTESTEMUNHA1;
$ESTADOCIVILTESTEMUNHA1 = $b->ESTADOCIVILTESTEMUNHA1;
$DATANASCIMENTOTESTEMUNHA1 = $b->DATANASCIMENTOTESTEMUNHA1;
$SEXOTESTEMUNHA1 = $b->SEXOTESTEMUNHA1;
$PROFISSAOTESTEMUNHA1 = $b->PROFISSAOTESTEMUNHA1;

$idtestemunha1 = insertpessoa($NOMETESTEMUNHA1,'F',$CPFTESTEMUNHA1,$RGTESTEMUNHA1,$ORGAOEMISSORTESTEMUNHA1,$SEXOTESTEMUNHA1,$PROFISSAOTESTEMUNHA1,$NACIONALIDADETESTEMUNHA1,$NATURALIDADETESTEMUNHA1,$DATANASCIMENTOTESTEMUNHA1,$ESTADOCIVILTESTEMUNHA1,$ENDERECOTESTEMUNHA1,$BAIRROTESTEMUNHA1,$CIDADETESTEMUNHA1,"","");

echo $idtestemunha1."<br>";


echo "OBTENDOS DADOS DA TESTEMUNHA2: <br>";
$NOMETESTEMUNHA2 = $b->NOMETESTEMUNHA2;
$CPFTESTEMUNHA2 = $b->CPFTESTEMUNHA2;
$NACIONALIDADETESTEMUNHA2 = $b->NACIONALIDADETESTEMUNHA2;
$NATURALIDADETESTEMUNHA2 = $b->NATURALIDADETESTEMUNHA2;
$RGTESTEMUNHA2 = $b->RGTESTEMUNHA2;
$ORGAOEMISSORTESTEMUNHA2 = $b->ORGAOEMISSORTESTEMUNHA2;
$CIDADETESTEMUNHA2 = $b->CIDADETESTEMUNHA2;
$ENDERECOTESTEMUNHA2 = $b->ENDERECOTESTEMUNHA2;
$BAIRROTESTEMUNHA2 = $b->BAIRROTESTEMUNHA2;
$ESTADOCIVILTESTEMUNHA2 = $b->ESTADOCIVILTESTEMUNHA2;
$DATANASCIMENTOTESTEMUNHA2 = $b->DATANASCIMENTOTESTEMUNHA2;
$SEXOTESTEMUNHA2 = $b->SEXOTESTEMUNHA2;
$PROFISSAOTESTEMUNHA2 = $b->PROFISSAOTESTEMUNHA2;


$idtestemunha2= insertpessoa($NOMETESTEMUNHA2,'F',$CPFTESTEMUNHA2,$RGTESTEMUNHA2,$ORGAOEMISSORTESTEMUNHA2,$SEXOTESTEMUNHA2,$PROFISSAOTESTEMUNHA2,$NACIONALIDADETESTEMUNHA2,$NATURALIDADETESTEMUNHA2,$DATANASCIMENTOTESTEMUNHA2,$ESTADOCIVILTESTEMUNHA2,$ENDERECOTESTEMUNHA2,$BAIRROTESTEMUNHA2,$CIDADETESTEMUNHA2,"","");

echo $idtestemunha2."<br>";






echo "OBTENDOS DADOS DA DECLARANTE: <br>";
$NOMEDECLARANTE = $b->NOMEDECLARANTE;
$CPFDECLARANTE = $b->CPFDECLARANTE;
$NACIONALIDADEDECLARANTE = $b->NACIONALIDADEDECLARANTE;
$NATURALIDADEDECLARANTE = $b->NATURALIDADEDECLARANTE;
$RGDECLARANTE = $b->RGDECLARANTE;
$ORGAOEMISSORDECLARANTE = $b->ORGAOEMISSORDECLARANTE;
$CIDADEDECLARANTE = $b->CIDADEDECLARANTE;
$ENDERECODECLARANTE = $b->ENDERECODECLARANTE;
$BAIRRODECLARANTE = $b->BAIRRODECLARANTE;
$ESTADOCIVILDECLARANTE = $b->ESTADOCIVILDECLARANTE;
$DATANASCIMENTODECLARANTE = $b->DATANASCIMENTODECLARANTE;
$SEXODECLARANTE = $b->SEXODECLARANTE;
$PROFISSAODECLARANTE = $b->PROFISSAODECLARANTE;


$iddeclarante= insertpessoa($NOMEDECLARANTE,'F',$CPFDECLARANTE,$RGDECLARANTE,$ORGAOEMISSORDECLARANTE,$SEXODECLARANTE,$PROFISSAODECLARANTE,$NACIONALIDADEDECLARANTE,$NATURALIDADEDECLARANTE,$DATANASCIMENTODECLARANTE,$ESTADOCIVILDECLARANTE,$ENDERECODECLARANTE,$BAIRRODECLARANTE,$CIDADEDECLARANTE,"","");

echo $iddeclarante."<br>";




echo "----------------------------------------------------- <br>";



$jsondados = '
{

"IDPESSOADECLARANTE":"'.$iddeclarante.'",
"IDPESSOAPAI":"'.$idpai.'",
"IDPESSOAMAE":"'.$idmae.'",
"IDPESSOATESTEMUNHA1":"'.$idtestemunha1.'",
"IDPESSOATESTEMUNHA2":"'.$idtestemunha2.'"

}';

*/

if ($b->SELO == '') {
UPDATE_CAMPO_ID("registro_nascimento_novo", "status","ACV",$b->ID);
echo "ACERVO REGISTRO: ".$b->ID."<br>";
}


/*
if (empty($b->JSON_DADOS_ADD)) {
 UPDATE_CAMPO_ID("registro_nascimento_novo", "JSON_DADOS_ADD", $jsondados, $b->ID);
}
else{
$jsonbd = str_replace("}", "", $b->JSON_DADOS_ADD);
$jsonbd = $jsonbd.$jsondados.'}';
UPDATE_CAMPO_ID("registro_nascimento_novo", "JSON_DADOS_ADD", $jsonbd, $b->ID);
}
*/



} 
 ?>



