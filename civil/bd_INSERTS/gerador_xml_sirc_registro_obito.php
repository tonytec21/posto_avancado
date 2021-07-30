<?php
//error_reporting(0);
//ini_set(“display_errors”, 0 );
//error_reporting(E_ALL);
//ini_set(“display_errors”, 1 );d

include('../../../controller/conexao.php');
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
$xml.='<movimentoObitoTO>';
$xml.='<versaoLayoutObito>1.8</versaoLayoutObito>';

$id = explode("-", $_GET['id']);
for ($i=0; $i <count($id) ; $i++) :
if (isset($id[$i])) {
$id_unic = $id[$i]; 
}
$busca_matricula = $pdo->prepare("SELECT * FROM `registro_obito_novo`  WHERE ID ='$id_unic'");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);

foreach ($linhas as $b ) {
$matricula = str_replace(" ", "", $b->MATRICULA);
  
$xml.='<registroObitoInclusao>';
$xml.='<acervo>'.$acervo.'</acervo>';
$xml.='<anoRegistro>'.date('Y', strtotime($b->DATAENTRADA)).'</anoRegistro>';
$xml.='<codServentia>'.$cns.'</codServentia>';
$xml.='<dataRegistro>'.date('Y-m-d H:i:s', strtotime($b->DATAENTRADA)).'</dataRegistro>';
$xml.='<dvMatricula>'.substr($matricula,30,2).'</dvMatricula>';
$xml.='<folha>'.$b->FOLHAOBITO.'</folha>';
$xml.='<numeroLivro>'.$b->LIVROOBITO.'</numeroLivro>';
$xml.='<observacoes></observacoes>';
if ($b->TIPOASSENTO == 'ORDEM') {
$xml.='<registroJudicial>true</registroJudicial>';
}
else{
$xml.='<registroJudicial>false</registroJudicial>';
}

$xml.='<termo>'.$b->TERMOOBITO.'</termo>';
$xml.='<tipoLivro>'.$b->TIPOLIVRO.'</tipoLivro>';
$xml.='<tipoServico>55</tipoServico>';
$xml.='<bairro>'.$b->BAIRRO.'</bairro>';

$xml.='<beneficiosPrevidenciarios>';
$xml.='<numeroBeneficio></numeroBeneficio>';
$xml.='</beneficiosPrevidenciarios>';


$xml.='<beneficiosPrevidenciariosIgnorado>true</beneficiosPrevidenciariosIgnorado>';
$xml.='<causaMorteConhecida>'.$b->CAUSAOBITO.'</causaMorteConhecida>';
$xml.='<causaMorteConhecidaIgnorada>false</causaMorteConhecidaIgnorada>';

if ($b->CIDADE!='') {
$xml.='<codigoIBGEMunicipioLogradouro>'.intval($b->CIDADE).'</codigoIBGEMunicipioLogradouro>';
$xml.='<codigoIBGEMunicipioLogradouroIgnorado>false</codigoIBGEMunicipioLogradouroIgnorado>';
}
else{
$xml.='<codigoIBGEMunicipioLogradouroIgnorado>true</codigoIBGEMunicipioLogradouroIgnorado>';  
}


if ($b->CIDADEOBITO!='') {
$xml.='<codigoIBGEMunicipioLogradouroObito>'.intval($b->CIDADEOBITO).'</codigoIBGEMunicipioLogradouroObito>';
$xml.='<codigoIBGEMunicipioLogradouroObitoIgnorado>false</codigoIBGEMunicipioLogradouroObitoIgnorado>';
}
else{
$xml.='<codigoIBGEMunicipioLogradouroIgnorado>true</codigoIBGEMunicipioLogradouroIgnorado>';  
}


$xml.='<codigoIBGEMunicipioNaturalidade>'.intval($b->NATURALIDADE).'</codigoIBGEMunicipioNaturalidade>';

if ($b->COR == 'BR') {
$cor_pele ='BRANCA';
}

if ($b->COR == 'PR') {
$cor_pele ='PRETA';
}

if ($b->COR == 'PA') {
$cor_pele ='PARDA';
}

if ($b->COR == 'AM') {
$cor_pele ='AMARELA';
}

if ($b->COR == 'IN') {
$cor_pele ='INDIGENA';
}

if ($b->COR!='') {
$xml.='<corPele>'.$cor_pele.'</corPele>';
$xml.='<corPeleIgnorada>false</corPeleIgnorada>';
}
else{
	$xml.='<corPeleIgnorada>true</corPeleIgnorada>';
}

if ($b->DATANASCIMENTO!='') {
$xml.='<dataNascimentoFalecido>'.date('Y-m-dH:i:s', strtotime($b->DATANASCIMENTO)).'</dataNascimentoFalecido>';
$xml.='<dataNascimentoFalecidoIgnorada>false</dataNascimentoFalecidoIgnorada>';
}
else{
	$xml.='<dataNascimentoFalecidoIgnorada>true</dataNascimentoFalecidoIgnorada>';
}

if ($b->DATAOBITO!='') {
$xml.='<dataObito>'.date('d/m/Y', strtotime($b->DATAOBITO)).'</dataObito>';
$xml.='<dataObitoIgnorada>false</dataObitoIgnorada>';
}
else{
	$xml.='<dataObitoIgnorada>true</dataObitoIgnorada>';
}

$tirar = array(".","-");

if ($b->NDO!='') {
$xml.='<declaracaoObito>'.str_replace($tirar, "", $b->NDO).'</declaracaoObito>';
$xml.='<declaracaoObitoIgnorada>false</declaracaoObitoIgnorada>';
}
else{
$xml.='<declaracaoObitoIgnorada>true</declaracaoObitoIgnorada>';

}


$xml.='<documentosDeclarante>';
$xml.='<dono>DECLARANTE</dono>';
$xml.='<numero>'.str_replace($tirar, "", $b->CPFDECLARANTE).'</numero>';
$xml.='<tipo>CPF</tipo>';
$xml.='</documentosDeclarante>';

if ($b->CPF!='') {
$xml.='<documentosFalecido>';
$xml.='<dono>FALECIDO</dono>';
$xml.='<numero>'.str_replace($tirar, "", $b->CPF).'</numero>';
$xml.='<tipo>CPF</tipo>';
$xml.='</documentosFalecido>';
}
else{
$xml.='<documentosFalecidoIgnorado>false</documentosFalecidoIgnorado>';
}


if ($b->ELEITOR!='S') {
$xml.='<eleitor>false</eleitor>';
}
else{
$xml.='<eleitor>true</eleitor>';
}

if ($b->ESTADOCIVIL == 'CA') {
$estadocivil = 'CASADO';
$xml.='<estadoCivil>'.$estadocivil.'</estadoCivil>';
$xml.='<estadoCivilIgnorado>false</estadoCivilIgnorado>';
}
elseif ($b->ESTADOCIVIL == 'SO') {
$estadocivil = 'SOLTEIRO';
$xml.='<estadoCivil>'.$estadocivil.'</estadoCivil>';
$xml.='<estadoCivilIgnorado>false</estadoCivilIgnorado>';
}
elseif ($b->ESTADOCIVIL == 'DI') {
$estadocivil = 'DIVORCIADO';
$xml.='<estadoCivil>'.$estadocivil.'</estadoCivil>';
$xml.='<estadoCivilIgnorado>false</estadoCivilIgnorado>';
}
elseif ($b->ESTADOCIVIL == 'VI') {
$estadocivil = 'VIUVO';
$xml.='<estadoCivil>'.$estadocivil.'</estadoCivil>';
$xml.='<estadoCivilIgnorado>false</estadoCivilIgnorado>';
}
else{
$xml.='<estadoCivilIgnorado>true</estadoCivilIgnorado>';	
}


if (strlen($b->NOMEMAE)>2) {
$xml.='<filiacoesObito>';
$xml.='<nacionalidadeIgnorada>true</nacionalidadeIgnorada>';
$xml.='<nome>'.tirarAcentos($b->NOMEMAE).'</nome>';
$xml.='<nomeIgnorado>false</nomeIgnorado>';
$xml.='<paisNascimentoIgnorado>true</paisNascimentoIgnorado>';
$xml.='<sexo>FEMININO</sexo>';
$xml.='<sexoIgnorado>false</sexoIgnorado>';
$xml.='</filiacoesObito>';
}

if (strlen($b->NOMEPAI)>2) {
$xml.='<filiacoesObito>';
$xml.='<nacionalidadeIgnorada>true</nacionalidadeIgnorada>';
$xml.='<nome>'.tirarAcentos($b->NOMEPAI).'</nome>';
$xml.='<nomeIgnorado>false</nomeIgnorado>';
$xml.='<paisNascimentoIgnorado>true</paisNascimentoIgnorado>';
$xml.='<sexo>MASCULINO</sexo>';
$xml.='<sexoIgnorado>false</sexoIgnorado>';
$xml.='</filiacoesObito>';
}


if ($b->HORAOBITO!='') {
$horaobito =date('H:i', strtotime($b->HORAOBITO));
$xml.='<horaObito>'.$horaobito.'</horaObito>';
$xml.='<horaObitoIgnorada>false</horaObitoIgnorada>';
}
else{
$xml.='<horaObitoIgnorada>true</horaObitoIgnorada>';	
}



if ($b->ENDERECO!='') {


$xml.='<logradouro>'.$b->ENDERECO.'</logradouro>';
$xml.='<logradouroIgnorado>false</logradouroIgnorado>';
}

else{
	$xml.='<logradouroIgnorado>true</logradouroIgnorado>';
}

$xml.='<logradouroObitoIgnorado>true</logradouroObitoIgnorado>';
$xml.='<lugarFalecimento>'.$b->LOCALMORTE.'</lugarFalecimento>';
$xml.='<lugarSepultamentoCemiterio>'.$b->LOCALSEPULTAMENTO.'</lugarSepultamentoCemiterio>';
$xml.='<lugarSepultamentoCemiterioIgnorado>false</lugarSepultamentoCemiterioIgnorado>';
$xml.='<nacionalidadeIgnorada>true</nacionalidadeIgnorada>';
$xml.='<nome>'.tirarAcentos($b->NOME).'</nome>';
$xml.='<nomeDeclarante>'.tirarAcentos($b->NOMEDECLARANTE).'</nomeDeclarante>';
$xml.='<nomeDeclaranteIgnorado>false</nomeDeclaranteIgnorado>';
$xml.='<nomeIgnorado>false</nomeIgnorado>';
$xml.='<nomeLocalObito>'.$b->LOCALMORTE.'</nomeLocalObito>';
$xml.='<nomeLocalObitoIgnorado>false</nomeLocalObitoIgnorado>';
$xml.='<numeroLogradouroIgnorado>true</numeroLogradouroIgnorado>';
$xml.='<numeroLogradouroObitoIgnorado>true</numeroLogradouroObitoIgnorado>';
$xml.='<paisNascimento>76</paisNascimento>';
$xml.='<paisNascimentoIgnorado>false</paisNascimentoIgnorado>';
$xml.='<sexo>'.retorna_sexo($b->SEXO).'</sexo>';
$xml.='<sexoIgnorado>false</sexoIgnorado>';
$xml.='<tipoLocalObito>'.$b->TIPOLOCALOBITO.'</tipoLocalObito>';
$xml.='<tipoLocalObitoIgnorado>false</tipoLocalObitoIgnorado>';

if ($b->TIPOMORTE =='NAT') {
$tipomorte = 'NATURAL';
}
else{
	$tipomorte = 'VIOLENTA';
}
$xml.='<tipoMorte>'.$tipomorte.'</tipoMorte>';
$xml.='<tipoMorteIgnorado>false</tipoMorteIgnorado>';
$xml.='</registroObitoInclusao>';


}
endfor;
$xml.='</movimentoObitoTO>';
# Para salvar o arquivo, descomente a linha
//$dom->save("contatos.xml");
session_start();
$data = date('Y-m-d');
$hora = date('H:i');
$faixa_remessa = 'de '.$data_inicial.' a '.$data_final;
$funcionario = $_SESSION['nome'];
$envio_remessa = $pdo->prepare("INSERT INTO envio_remessas values(null,'$data','$hora','SIRC_OBITOS','$funcionario','PENDENTE','$faixa_remessa')");
$envio_remessa->execute();

#cabeçalho da página

$nome_arquivo = '../Remessas/SIRCOBITOS_'.date('dmY').'.xml';
$nome_arquivo_puro = 'SIRCOBITOS_'.date('dmY').'.xml';
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


$nome_arquivo_puro = 'SIRCOBITOS_'.date('dmY').'.mrc';
$nome_arquivo = '../Remessas/SIRCOBITOS_'.date('dmY').'.mrc';
$nome_arquivo_xml = '../Remessas/SIRCOBITOS_'.date('dmY').'.xml';
#download automatico: ---------------------------------------------------------------

ob_clean();
header('Content-type: application/xml');
header('Content-disposition: attachment; filename="'.$nome_arquivo_puro.'"');
readfile($nome_arquivo);
unlink($nome_arquivo);
unlink($nome_arquivo_xml);



?>
