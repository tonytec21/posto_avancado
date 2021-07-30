<?php
//error_reporting(0);
//ini_set(“display_errors”, 0 );
//error_reporting(E_ALL);
//ini_set(“display_errors”, 1 );d

include('../controller/conexao.php');
$pdo = conectar();
$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];

$busca_matricula = $pdo->prepare("SELECT * FROM `registro_obito_novo`  WHERE DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final'");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);


$busca_cns = $pdo->prepare("SELECT * FROM `cadastroserventia`");
$busca_cns->execute();
$linha_cns= $busca_cns->fetchAll(PDO::FETCH_OBJ);

foreach ($linha_cns as $s) {
$cns = $s->strCNS;
}



function tirarAcentos($string){
return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(ý)/","/(Ý)/"),explode(" ","a A e E i I o O u U n N C c y Y"),$string);
}

$separador = ';';
$txt ='';
foreach ($linhas as $b ) {

$busca_cidade = $pdo->prepare("SELECT * FROM uf_cidade where id = ".intval($b->NATURALIDADE));
$busca_cidade->execute();
$natural = $busca_cidade->fetch(PDO::FETCH_ASSOC);
$naturalidade = $natural['cidade'].'/'.$natural['uf'];
$tirar = array(".","-");

$txt .= $b->NOME.$separador;
if (!empty($b->DATANASCIMENTO)) {$txt .= date('d/m/Y', strtotime($b->DATANASCIMENTO)).$separador;}
else{$txt .=$separador;}
if (!empty($b->NOMEPAI)) {$txt .= mb_strtoupper($b->NOMEPAI).$separador;}
else{$txt .=$separador;}
if (!empty($b->NOMEMAE)) {$txt .= mb_strtoupper($b->NOMEMAE).$separador;}
else{$txt .=$separador;}
if (!empty($naturalidade)) {$txt .= mb_strtoupper($naturalidade).$separador;}
else{$txt .=$separador;}
if (!empty($b->CPF)) {$txt .= str_replace($tirar, "", $b->strTituloEleitor).$separador;}
else{$txt .=$separador;}
if (!empty($b->RG)) {$txt .= $b->RG.'-'.$b->ORGAOEMISSOR.$separador;}
else{$txt .=$separador;}
$txt.=date('d/m/Y', strtotime($b->DATAOBITO)).$separador;
$txt .= 'C-'.$b->LIVROOBITO.$separador;
$txt .= $b->FOLHAOBITO.$separador;
$txt .= $b->TERMOOBITO.$separador;
$txt.=chr(13).chr(10);

}

$txt = tirarAcentos($txt);


# Para salvar o arquivo, descomente a linha
//$dom->save("contatos.txt");
session_start();
$data = date('Y-m-d');
$hora = date('H:i');
$faixa_remessa = 'de '.$data_inicial.' a '.$data_final;
$funcionario = $_SESSION['nome'];
$envio_remessa = $pdo->prepare("INSERT INTO envio_remessas values(null,'$data','$hora','INFODIP_OBITOS','$funcionario','PENDENTE','$faixa_remessa')");
$envio_remessa->execute();

#cabeçalho da página

$nome_arquivo = '../Remessas/INFODIP_'.date('dmY').'_'.date('His').'.txt';
$nome_arquivo_puro = 'INFODIP_'.date('dmY').'_'.date('His').'.txt';
$arquivo = fopen($nome_arquivo, 'w+');
$escrever = fwrite($arquivo, $txt);
fclose($arquivo);





#download automatico: ---------------------------------------------------------------
ob_clean();
header('Content-type: application/xml');
header('Content-disposition: attachment; filename="'.$nome_arquivo_puro.'"');
readfile($nome_arquivo);
unlink($nome_arquivo);


?>
