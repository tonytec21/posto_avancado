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

#versao do encoding xml
$dom = new DOMDocument("1.0", "UTF-8");

#retirar os espacos em branco
$dom->preserveWhiteSpace = false;

#gerar o codigo
$dom->formatOutput = true;

$movimentonascimentoto = $dom->createElement("movimentoNascimentoTO");
  $versaoLayoutNascimento = $dom->createElement("versaoLayoutNascimento", 1.10);
  $acao_xml = $dom->createElement("ACAO",'CARGA');
  $cns_xml = $dom->createElement("CNS",$cns);

  $movimentonascimentoto->appendChild($versaoLayoutNascimento);
  $movimentonascimentoto->appendChild($acao_xml);
  $movimentonascimentoto->appendChild($cns_xml);
   $registroNascimentoInclusao = $dom->createElement("registroNascimentoInclusao");
  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

function retorna_sexo($string){
  if ($string == 'M') {
    return "MASCULINO";
  }
  else{
    return "FEMININO";
  }
}

$id = explode("-", $_GET['id']);
$xml = '<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'; 
$xml .= '<movimentoNascimentoTO>';
$xml .= '<versaoLayoutNascimento>1.10</versaoLayoutNascimento>'; 
for ($i=0; $i <count($id) ; $i++) :
if (isset($id[$i])) {
$id_unic = $id[$i]; 
}



$busca_matricula = $pdo->prepare("SELECT * FROM `registro_nascimento_novo`  WHERE ID = '$id_unic'");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas as $b ) {

$matricula = str_replace(" ", "", $b->MATRICULA);

$xml .='<registroNascimentoInclusao>';
$xml .='<acervo>'.$acervo.'</acervo>';
$xml .='<anoRegistro>'.date('Y', strtotime($b->DATAENTRADA)).'</anoRegistro>';
$xml .='<codServentia>'.$cns.'</codServentia>';
$xml .='<dataRegistro>'.date('Y-m-d H:i:s', strtotime($b->DATAENTRADA)).'</dataRegistro>';
$xml .='<dvMatricula>'.substr($matricula,30,2).'</dvMatricula>';
$xml .='<folha>'.$b->FOLHANASCIMENTO.'</folha>';
$xml .='<numeroLivro>'.$b->LIVRONASCIMENTO.'</numeroLivro>';
$xml .='<observacoes></observacoes>';

if ($b->TIPOASSENTO == 'ORDEM') {
$xml .='<registroJudicial>true</registroJudicial>';
}
else{
$xml .='<registroJudicial>false</registroJudicial>';
}

$xml .='<termo>'.$b->TERMONASCIMENTO.'</termo>';
$xml .='<tipoLivro>1</tipoLivro>';
$xml .='<tipoServico>55</tipoServico>';

$xml .='<bairroFiliacao></bairroFiliacao>';
$xml .='<codigoIBGEMunicipio>'.intval($b->CIDADENASCIMENTO).'</codigoIBGEMunicipio>';
$xml .='<codigoIBGEMunicipioFiliacaoIgnorado>true</codigoIBGEMunicipioFiliacaoIgnorado>';

$xml .='<dataNascimento>'.date('d/m/Y', strtotime($b->DATANASCIMENTO)).'</dataNascimento>';

$dnv =  str_replace("-", "", $b->DNV);

if (strlen($dnv)<2) {
$xml .='<dnvInexistente>true</dnvInexistente>';
}
else{
 $xml .='<dnvInexistente>false</dnvInexistente>'; 
}



$xml .='<filiacoesNascimento>';
$xml .='<codigoOcupacaoSDCIgnorado>true</codigoOcupacaoSDCIgnorado>';
$xml .='<dataNascimentoIgnorada>true</dataNascimentoIgnorada>';
$xml .='<idadeIgnorada>true</idadeIgnorada>';
$xml .='<nacionalidadeIgnorada>true</nacionalidadeIgnorada>';
$xml .='<nome>'.tirarAcentos($b->NOMEMAE).'</nome>';
$xml .='<nomeIgnorado>false</nomeIgnorado>';
$xml .='<paisNascimentoIgnorado>true</paisNascimentoIgnorado>';
$xml .='<progenitores>';
$xml .='<nome>'.tirarAcentos($b->AVO2MATERNO).'</nome>';
$xml .='<sexo>FEMININO</sexo>';
$xml .='</progenitores>';
if (strlen($b->AVO1MATERNO)>2) {
$xml .='<progenitores>';
$xml .='<nome>'.tirarAcentos($b->AVO1MATERNO).'</nome>';
$xml .='<sexo>MASCULINO</sexo>';
$xml .='</progenitores>';
}
$xml .='<sexo>'.retorna_sexo($b->SEXOMAE).'</sexo>';
$xml .='<sexoIgnorado>false</sexoIgnorado>';
$xml .='</filiacoesNascimento>';

if (strlen($b->NOMEPAI)>2) {
$xml .='<filiacoesNascimento>';
$xml .='<codigoOcupacaoSDCIgnorado>true</codigoOcupacaoSDCIgnorado>';
$xml .='<dataNascimentoIgnorada>true</dataNascimentoIgnorada>';
$xml .='<idadeIgnorada>true</idadeIgnorada>';
$xml .='<nacionalidadeIgnorada>true</nacionalidadeIgnorada>';
$xml .='<nome>'.tirarAcentos($b->NOMEPAI).'</nome>';
$xml .='<nomeIgnorado>false</nomeIgnorado>';
$xml .='<paisNascimentoIgnorado>true</paisNascimentoIgnorado>';
$xml .='<progenitores>';
$xml .='<nome>'.tirarAcentos($b->AVO2PATERNO).'</nome>';
$xml .='<sexo>FEMININO</sexo>';
$xml .='</progenitores>';
if (strlen($b->AVO1PATERNO)>2) {
$xml .='<progenitores>';
$xml .='<nome>'.tirarAcentos($b->AVO1PATERNO).'</nome>';
$xml .='<sexo>MASCULINO</sexo>';
$xml .='</progenitores>';
}
$xml .='<sexo>'.retorna_sexo($b->SEXOPAI).'</sexo>';
$xml .='<sexoIgnorado>false</sexoIgnorado>';
$xml .='</filiacoesNascimento>';
}

else{
$xml.='<filiacoesNascimento>';  
$xml.='<codigoOcupacaoSDCIgnorado>true</codigoOcupacaoSDCIgnorado>';
$xml.='<dataNascimentoIgnorada>true</dataNascimentoIgnorada>';
$xml.='<idadeIgnorada>true</idadeIgnorada>';
$xml.='<nacionalidadeIgnorada>true</nacionalidadeIgnorada>';
$xml.='<nomeIgnorado>true</nomeIgnorado>';
$xml.='<paisNascimentoIgnorado>true</paisNascimentoIgnorado>';
$xml.='<sexoIgnorado>true</sexoIgnorado>';
$xml.='</filiacoesNascimento>';  
}

$horanascimento = date('H:i', strtotime($b->HORANASCIMENTO));

$xml .='<horaNascimento>'.$horanascimento.'</horaNascimento>';
$xml .='<horaNascimentoIgnorada>false</horaNascimentoIgnorada>';

 if (empty($key->TIPOLOCALNASCIMENTO) || $key->TIPOLOCALNASCIMENTO == NULL ) {
    $setTipoLocalNascimento = "IGNORADO";//$key->setTipoLocalNascimento;
  }else {
    $setTipoLocalNascimento = $key->TIPOLOCALNASCIMENTO;

  }

$xml .='<local>'.$setTipoLocalNascimento.'</local>';
$xml .='<logradouroFiliacaoIgnorado>true</logradouroFiliacaoIgnorado>';
$xml .='<nome>'.tirarAcentos($b->NOMENASCIDO).'</nome>';
$xml .='<numeroLogradouroFiliacaoIgnorado>true</numeroLogradouroFiliacaoIgnorado>';

if ($b->GEMEOS == 'S') {
$xml .='<possuiGemeos>true</possuiGemeos>';
}
else{
$xml .='<possuiGemeos>false</possuiGemeos>';
}
$xml .='<sexo>'.retorna_sexo($b->SEXONASCIDO).'</sexo>';
$xml .='</registroNascimentoInclusao>';
  
}
endfor;
$xml .= '</movimentoNascimentoTO>';





# Para salvar o arquivo, descomente a linha
//$dom->save("contatos.xml");
session_start();
$data = date('Y-m-d');
$hora = date('H:i');
$faixa_remessa = 'de '.$data_inicial.' a '.$data_final;
$funcionario = $_SESSION['nome'];
$envio_remessa = $pdo->prepare("INSERT INTO envio_remessas values(null,'$data','$hora','SIRC_NASCIMENTO','$funcionario','PENDENTE','$faixa_remessa')");
$envio_remessa->execute();

#cabeçalho da página

$nome_arquivo = '../Remessas/SIRCNASCIMENTOS_'.date('dmY').'.xml';
$nome_arquivo_puro = 'SIRCNASCIMENTOS_'.date('dmY').'.xml';
$arquivo = fopen($nome_arquivo, 'w+');
$escrever = fwrite($arquivo, $xml);
fclose($arquivo);



$xmlDoc = new DOMDocument();
$xmlDoc->formatOutput = true;
$xmlDoc->preserveWhiteSpace = false;
$xmlDoc->load($nome_arquivo);
$xmlDoc->save($nome_arquivo);

/*

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


$nome_arquivo_puro = 'SIRCNASCIMENTOS_'.date('dmY').'.mrc';
$nome_arquivo = '../Remessas/SIRCNASCIMENTOS_'.date('dmY').'.mrc';
$nome_arquivo_xml = '../Remessas/SIRCNASCIMENTOS_'.date('dmY').'.xml';
#download automatico: ---------------------------------------------------------------
*/
ob_clean();
header('Content-type: application/xml');
header('Content-disposition: attachment; filename="'.$nome_arquivo_puro.'"');
readfile($nome_arquivo);
unlink($nome_arquivo);
unlink($nome_arquivo_xml);

?>
