<?php
//error_reporting(0);
//ini_set(“display_errors”, 0 );
//error_reporting(E_ALL);
//ini_set(“display_errors”, 1 );d

include('../../../controller/conexao.php');
$pdo = conectar();
$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];




$busca_cns = $pdo->prepare("SELECT * FROM `cadastroserventia`");
$busca_cns->execute();
$linha_cns= $busca_cns->fetchAll(PDO::FETCH_OBJ);

foreach ($linha_cns as $s) {
$cns = $s->strCNS;
$acervo = intval($s->setTipoAcervo);
}
function retorna_sexo($string){
  if ($string == 'M') {
    return "MASCULINO";
  }
  else{
    return "FEMININO";
  }
}


    function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

$xml ='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>';
$xml .='<movimentoCasamentoTO>';
$xml .='<versaoLayoutCasamento>1.6</versaoLayoutCasamento>';

$id = explode("-", $_GET['id']);
for ($i=0; $i <count($id) ; $i++) :
if (isset($id[$i])) {
$id_unic = $id[$i]; 
}
$busca_matricula = $pdo->prepare("SELECT * FROM `registro_casamento_novo` WHERE ID = '$id_unic' and ANDAMENTOPROCESSO = 'HABILITADO'");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas as $b ) {
$xml .='<registroCasamentoInclusao>';
$xml .='<acervo>'.$acervo.'</acervo>';
$xml .='<anoRegistro>'.date('Y', strtotime($b->DATAENTRADA)).'</anoRegistro>';
$xml .='<codServentia>'.$cns.'</codServentia>';
$xml .='<dataRegistro>'.date('Y-m-d H:i:s', strtotime($b->DATAENTRADA)).'</dataRegistro>';
$xml .='<dvMatricula>'.substr($b->MATRICULA,30,2).'</dvMatricula>';
$xml .='<folha>'.$b->FOLHACASAMENTO.'</folha>';
$xml .='<numeroLivro>'.$b->LIVROCASAMENTO.'</numeroLivro>';
$xml .='<observacoes></observacoes>';
$xml .='<registroJudicial>false</registroJudicial>';
$xml .='<termo>'.$b->TERMOCASAMENTO.'</termo>';
$xml .='<tipoLivro>'.$b->TIPOLIVRO.'</tipoLivro>';
$xml .='<tipoServico>55</tipoServico>';
$xml .='<dataCelebracaoCasamento>'.date('Y-m-dH:i:s', strtotime($b->DATACASAMENTO)).'</dataCelebracaoCasamento>';
$xml .='<dataCelebracaoCasamentoIgnorada>false</dataCelebracaoCasamentoIgnorada>';
$xml .='<dataPublicacaoProclamas>'.date('Y-m-dH:i:s', strtotime($b->DATAEDITAL)).'</dataPublicacaoProclamas>';


          if($b->REGIMECASAMENTO =='CP') {
          $regime_casamento = 'COMUNHAO_PARCIAL';
          }
          else if($b->REGIMECASAMENTO =='CU') {
          $regime_casamento = 'COMUNHAO_UNIVERSAL';
          }
          else if($b->REGIMECASAMENTO =='PF') {
          $regime_casamento = 'PARTICIPACAO_FINAL_AQUESTOS';
          }
          else if($b->REGIMECASAMENTO =='SB') {
          $regime_casamento = 'SEPARACAO_BENS';
          }
          else if($b->REGIMECASAMENTO =='SC') {
          $regime_casamento = 'SEPARACAO_LEGAL_BENS';
          }
          else if($b->REGIMECASAMENTO =='CB') {
          $regime_casamento = 'OUTROS';
          }
          else{ $regime_casamento = 'IGNORADO';}

$xml .='<regimeCasamento>'.$regime_casamento.'</regimeCasamento>';


$xml .='<conjuge1>';
$xml .='<bairroConjuge>'.$b->BAIRRONUBENTE1.'</bairroConjuge>';

if ($b->CIDADENUBENTE1!='') {
$xml .='<codigoIBGEMunicipioLogradouroConjuge>'.intval($b->CIDADENUBENTE1).'</codigoIBGEMunicipioLogradouroConjuge>';
$xml .='<codigoIBGEMunicipioLogradouroConjugeIgnorado>false</codigoIBGEMunicipioLogradouroConjugeIgnorado>';
}
else{
$xml .='<codigoIBGEMunicipioLogradouroConjugeIgnorado>true</codigoIBGEMunicipioLogradouroConjugeIgnorado>';  
}
$xml .='<codigoIBGEMunicipioNaturalidade>'.intval($b->NATURALIDADENUBENTE1).'</codigoIBGEMunicipioNaturalidade>';
$xml .='<codigoOcupacaoSDCIgnorado>true</codigoOcupacaoSDCIgnorado>';
$xml .='<complementoLogradouroConjuge></complementoLogradouroConjuge>';

if ($b->DATANASCIMENTONUBENTE1!='') {
$xml .='<dataNascimento>'.date('Y-m-dH:i:s', strtotime($b->DATANASCIMENTONUBENTE1)).'</dataNascimento>';
$xml .='<dataNascimentoIgnorada>false</dataNascimentoIgnorada>';
}
else{
  $xml .='<dataNascimentoIgnorada>true</dataNascimentoIgnorada>';
}

$tirar = array(".","-");
$cpfc1 = str_replace($tirar, "", $b->CPFNUBENTE1);
$cpfc2 = str_replace($tirar, "", $b->CPFNUBENTE2);

if ($b->CPFNUBENTE1!='') {
$xml .='<documentosConjuge>';
$xml .='<dono>CONJUGE1</dono>';
$xml .='<numero>'.$cpfc1.'</numero>';
$xml .='<tipo>CPF</tipo>';
$xml .='</documentosConjuge>';
$xml .='<documentosConjugeIgnorado>false</documentosConjugeIgnorado>';
}
else{
  $xml .='<documentosConjugeIgnorado>true</documentosConjugeIgnorado>';
}



if (strlen($b->NOMEMAENUBENTE1)>2) {

$xml .='<filiacoesConjuge>';
$xml .='<nome>'.tirarAcentos($b->NOMEMAENUBENTE1).'</nome>';
$xml .='<nomeIgnorado>false</nomeIgnorado>';
$xml .='<sexo>'.retorna_sexo($b->SEXOMAENUBENTE1).'</sexo>';
$xml .='<sexoIgnorado>false</sexoIgnorado>';
$xml .='</filiacoesConjuge>';

}


if (strlen($b->NOMEPAINUBENTE1)>2) {

$xml .='<filiacoesConjuge>';
$xml .='<nome>'.tirarAcentos($b->NOMEPAINUBENTE1).'</nome>';
$xml .='<nomeIgnorado>false</nomeIgnorado>';
$xml .='<sexo>'.retorna_sexo($b->SEXOPAINUBENTE1).'</sexo>';
$xml .='<sexoIgnorado>false</sexoIgnorado>';
$xml .='</filiacoesConjuge>';

}

if ($b->ENDERECONUBENTE1!='') {
$xml .='<logradouroConjuge>'.$b->ENDERECONUBENTE1.'</logradouroConjuge>';
$xml .='<logradouroConjugeIgnorado>false</logradouroConjugeIgnorado>';
$xml .='<municipioNaturalidadeIgnoradoDuplo>false</municipioNaturalidadeIgnoradoDuplo>';
}
else{
 $xml .='<logradouroConjugeIgnorado>true</logradouroConjugeIgnorado>';
 $xml .='<municipioNaturalidadeIgnoradoDuplo>false</municipioNaturalidadeIgnoradoDuplo>'; 
}

$xml .='<nacionalidadeIgnorada>true</nacionalidadeIgnorada>';
$xml .='<nome>'.tirarAcentos($b->NOMENUBENTE1).'</nome>';
$xml .='<nomeConjugePosCasamentoIgnorado>true</nomeConjugePosCasamentoIgnorado>';
$xml .='<numeroLogradouroConjuge>SN</numeroLogradouroConjuge>';
$xml .='<numeroLogradouroConjugeIgnorado>true</numeroLogradouroConjugeIgnorado>';

if (intval($b->NATURALIDADENUBENTE1) !='5300109') {
$xml .='<paisNascimento>76</paisNascimento>';
$xml .='<paisNascimentoIgnorado>false</paisNascimentoIgnorado>';
}
else{
$xml .='<paisNascimentoIgnorado>true</paisNascimentoIgnorado>';  
}


$xml .='<sexo>'.retorna_sexo($b->SEXONUBENTE1).'</sexo>';
$xml .='</conjuge1>';




$xml .='<conjuge2>';
$xml .='<bairroConjuge>'.$b->BAIRRONUBENTE2.'</bairroConjuge>';

if ($b->CIDADENUBENTE2!='') {
$xml .='<codigoIBGEMunicipioLogradouroConjuge>'.intval($b->CIDADENUBENTE2).'</codigoIBGEMunicipioLogradouroConjuge>';
$xml .='<codigoIBGEMunicipioLogradouroConjugeIgnorado>false</codigoIBGEMunicipioLogradouroConjugeIgnorado>';
}
else{
$xml .='<codigoIBGEMunicipioLogradouroConjugeIgnorado>true</codigoIBGEMunicipioLogradouroConjugeIgnorado>';  
}
$xml .='<codigoIBGEMunicipioNaturalidade>'.intval($b->NATURALIDADENUBENTE2).'</codigoIBGEMunicipioNaturalidade>';
$xml .='<codigoOcupacaoSDCIgnorado>true</codigoOcupacaoSDCIgnorado>';
$xml .='<complementoLogradouroConjuge></complementoLogradouroConjuge>';

if ($b->DATANASCIMENTONUBENTE2!='') {
$xml .='<dataNascimento>'.date('Y-m-dH:i:s', strtotime($b->DATANASCIMENTONUBENTE2)).'</dataNascimento>';
$xml .='<dataNascimentoIgnorada>false</dataNascimentoIgnorada>';
}
else{
  $xml .='<dataNascimentoIgnorada>true</dataNascimentoIgnorada>';
}

$tirar = array(".","-");
$cpfc1 = str_replace($tirar, "", $b->CPFNUBENTE2);
$cpfc2 = str_replace($tirar, "", $b->CPFNUBENTE2);

if ($b->CPFNUBENTE2!='') {
$xml .='<documentosConjuge>';
$xml .='<dono>CONJUGE2</dono>';
$xml .='<numero>'.$cpfc2.'</numero>';
$xml .='<tipo>CPF</tipo>';
$xml .='</documentosConjuge>';
$xml .='<documentosConjugeIgnorado>false</documentosConjugeIgnorado>';
}
else{
  $xml .='<documentosConjugeIgnorado>true</documentosConjugeIgnorado>';
}



if (strlen($b->NOMEMAENUBENTE2)>2) {

$xml .='<filiacoesConjuge>';
$xml .='<nome>'.tirarAcentos($b->NOMEMAENUBENTE2).'</nome>';
$xml .='<nomeIgnorado>false</nomeIgnorado>';
$xml .='<sexo>'.retorna_sexo($b->SEXOMAENUBENTE2).'</sexo>';
$xml .='<sexoIgnorado>false</sexoIgnorado>';
$xml .='</filiacoesConjuge>';

}


if (strlen($b->NOMEPAINUBENTE2)>2) {

$xml .='<filiacoesConjuge>';
$xml .='<nome>'.tirarAcentos($b->NOMEPAINUBENTE2).'</nome>';
$xml .='<nomeIgnorado>false</nomeIgnorado>';
$xml .='<sexo>'.retorna_sexo($b->SEXOPAINUBENTE2).'</sexo>';
$xml .='<sexoIgnorado>false</sexoIgnorado>';
$xml .='</filiacoesConjuge>';

}

if ($b->ENDERECONUBENTE2!='') {
$xml .='<logradouroConjuge>'.$b->ENDERECONUBENTE2.'</logradouroConjuge>';
$xml .='<logradouroConjugeIgnorado>false</logradouroConjugeIgnorado>';
$xml .='<municipioNaturalidadeIgnoradoDuplo>false</municipioNaturalidadeIgnoradoDuplo>';
}
else{
 $xml .='<logradouroConjugeIgnorado>true</logradouroConjugeIgnorado>';
 $xml .='<municipioNaturalidadeIgnoradoDuplo>false</municipioNaturalidadeIgnoradoDuplo>'; 
}

$xml .='<nacionalidadeIgnorada>true</nacionalidadeIgnorada>';
$xml .='<nome>'.tirarAcentos($b->NOMENUBENTE2).'</nome>';
$xml .='<nomeConjugePosCasamentoIgnorado>true</nomeConjugePosCasamentoIgnorado>';
$xml .='<numeroLogradouroConjuge>SN</numeroLogradouroConjuge>';
$xml .='<numeroLogradouroConjugeIgnorado>true</numeroLogradouroConjugeIgnorado>';

if (intval($b->NATURALIDADENUBENTE2) !='5300109') {
$xml .='<paisNascimento>76</paisNascimento>';
$xml .='<paisNascimentoIgnorado>false</paisNascimentoIgnorado>';
}
else{
$xml .='<paisNascimentoIgnorado>true</paisNascimentoIgnorado>';  
}


$xml .='<sexo>'.retorna_sexo($b->SEXONUBENTE2).'</sexo>';
$xml .='</conjuge2>';


$xml .='</registroCasamentoInclusao>';


}
endfor;

$xml .='</movimentoCasamentoTO>';

# Para salvar o arquivo, descomente a linha
//$dom->save("contatos.xml");
session_start();
$data = date('Y-m-d');
$hora = date('H:i');
$faixa_remessa = 'de '.$data_inicial.' a '.$data_final;
$funcionario = $_SESSION['nome'];
$envio_remessa = $pdo->prepare("INSERT INTO envio_remessas values(null,'$data','$hora','SIRC_CASAMENTOS','$funcionario','PENDENTE','$faixa_remessa')");
$envio_remessa->execute();

#cabeçalho da página

$nome_arquivo = '../Remessas/SIRCCASAMENTOS_'.date('dmY').'.xml';
$nome_arquivo_puro = 'SIRCCASAMENTOS_'.date('dmY').'.xml';
$arquivo = fopen($nome_arquivo, 'w+');
$escrever = fwrite($arquivo, $xml);
fclose($arquivo);

$xmlDoc = new DOMDocument();
$xmlDoc->formatOutput = true;
$xmlDoc->preserveWhiteSpace = false;
$xmlDoc->load($nome_arquivo);
$xmlDoc->save($nome_arquivo);

$data = implode("", file($nome_arquivo));

include('AES_ENCRYPT/AESOld.php');

$imputText = $data;
$imputKey = md5($cns);
$blockSize = 128;
$aes = new AES($imputText, $imputKey, $blockSize);
$enc = $aes->encrypt();
$gzdata = gzencode($enc, 9,FORCE_DEFLATE);
$nome_arquivo = str_replace(".xml", "", $nome_arquivo);
$fp = fopen($nome_arquivo.".mrc", "w");
fwrite($fp, $gzdata);
fclose($fp);


$nome_arquivo_puro = 'SIRCCASAMENTOS_'.date('dmY').'.mrc';
$nome_arquivo = '../Remessas/SIRCCASAMENTOS_'.date('dmY').'.mrc';
$nome_arquivo_xml = '../Remessas/SIRCCASAMENTOS_'.date('dmY').'.xml';
#download automatico: ---------------------------------------------------------------

ob_clean();
header('Content-type: application/xml');
header('Content-disposition: attachment; filename="'.$nome_arquivo_puro.'"');
readfile($nome_arquivo);
unlink($nome_arquivo);
unlink($nome_arquivo_xml);


?>
