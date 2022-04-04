<?php 
include('../controller/db_functions.php');
$pdo = conectar();



function buscapessoa($cpf)
{
$pdo = conectar();



$query = " SELECT ID, strNome from pessoa where strCPFcnpj = '$cpf' LIMIT 1";
    $bpessoas = $pdo->prepare($query);
    if($bpessoas->execute()){
    $linha = $bpessoas->fetch(PDO::FETCH_ASSOC);
    return json_encode($linha);
    }
}



//FORMATANDO DADOS ESPECIAL ------- 

$busca = $pdo->prepare("SELECT * FROM registro_livro_e where DATAREGISTRO < '2021-01-01'");
$busca->execute();
$linha = $busca->fetchAll(PDO::FETCH_OBJ);
foreach ($linha as $b){



echo "REGISTRO ESPECIAL:".$b->ID."--------------------------------- <br>";


echo "OBTENDOS DADOS PARTE1: <br>";

if (!empty($b->NOMEPARTE1)) {
if(!empty(buscapessoa($b->NOMEPARTE1))){

$dados = json_decode(buscapessoa($b->NOMEPARTE1), true);

$NOMEPARTE1 = $dados['strNome'];
$IDPARTE1 = $dados['ID'];
$CPFPARTE1 = $b->NOMEPARTE1;
$QUALIDADEPARTE1 = 'PARTE1';
}
}


echo "<br>";



echo "OBTENDOS DADOS PARTE2: <br>";

if (!empty($b->NOMEPARTE2)) {
if(!empty(buscapessoa($b->NOMEPARTE2))){

$dados = json_decode(buscapessoa($b->NOMEPARTE2), true);

$NOMEPARTE2 = $dados['strNome'];
$IDPARTE2 = $dados['ID'];
$CPFPARTE2 = $b->NOMEPARTE2;
$QUALIDADEPARTE2 = 'PARTE2';
}
}


echo "<br>";



echo "OBTENDOS DADOS PARTE3: <br>";

if (!empty($b->NOMEPARTE3)) {
if(!empty(buscapessoa($b->NOMEPARTE3))){

$dados = json_decode(buscapessoa($b->NOMEPARTE3), true);

$NOMEPARTE3 = $dados['strNome'];
$IDPARTE3 = $dados['ID'];
$CPFPARTE3 = $b->NOMEPARTE3;
$QUALIDADEPARTE3 = 'PARTE3';
}
}



echo "<br>";


echo "----------------------------------------------------- <br>";



$jsondados = '
{

"IDPESSOAPARTE1":"'.$IDPARTE1.'",
"IDPESSOAPARTE2":"'.$IDPARTE2.'",
"IDPESSOAPARTE3":"'.$IDPARTE3.'"


}';


UPDATE_CAMPO_ID("registro_livro_e", "CPFPARTE1", $CPFPARTE1, $b->ID);
UPDATE_CAMPO_ID("registro_livro_e", "NOMEPARTE1", $NOMEPARTE1, $b->ID);
UPDATE_CAMPO_ID("registro_livro_e", "QUALIDADEPARTE1", $QUALIDADEPARTE1, $b->ID);

UPDATE_CAMPO_ID("registro_livro_e", "CPFPARTE2", $CPFPARTE2, $b->ID);
UPDATE_CAMPO_ID("registro_livro_e", "NOMEPARTE2", $NOMEPARTE2, $b->ID);
UPDATE_CAMPO_ID("registro_livro_e", "QUALIDADEPARTE2", $QUALIDADEPARTE2, $b->ID);

UPDATE_CAMPO_ID("registro_livro_e", "CPFPARTE3", $CPFPARTE3, $b->ID);
UPDATE_CAMPO_ID("registro_livro_e", "NOMEPARTE3", $NOMEPARTE3, $b->ID);
UPDATE_CAMPO_ID("registro_livro_e", "QUALIDADEPARTE3", $QUALIDADEPARTE3, $b->ID);



if (empty($b->JSON_DADOS_ADD)) {
 UPDATE_CAMPO_ID("registro_livro_e", "JSON_DADOS_ADD", $jsondados, $b->ID);
}
else{
$jsonbd = str_replace("}", "", $b->JSON_DADOS_ADD);
$jsonbd = $jsonbd.$jsondados.'}';
UPDATE_CAMPO_ID("registro_livro_e", "JSON_DADOS_ADD", $jsonbd, $b->ID);
}




} 
 ?>



