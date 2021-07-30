<?php
include('../controller/db_functions.php');
$pdo = conectar();
session_start();
$_SESSION['log_erros'] = '';
$id = explode("-", $_GET['id']);
#OBTENDO A CIDADE DA SERVENTIA:-------------------------------------
			$serv = PESQUISA_ALL_ID('cadastroserventia',1);
			foreach ($serv as $serv) {
			$cidade_serv = $serv->intUFcidade;
			}


$xml = '<?xml version="1.0" encoding="ISO8859-1" ?>';
$xml.='<pessoas>';

for ($i=0; $i <count($id) ; $i++) :
if (isset($id[$i])) {
$id_unic = $id[$i];	
}

$busca_matricula = $pdo->prepare("SELECT * FROM pessoa WHERE ID = '$id_unic' ");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas as $b) {
/*
if (empty($b->scanImgDigital)) {
	$_SESSION['log_erros'] .= "ERRO,".$b->strNome." PESSOA NÃO POSSUI IMAGEM DO DOCUMENTO ANEXADA!<br>";
}
*/
if (empty($b->scanImgAssinatura)) {
	$_SESSION['log_erros'] .= "ERRO,".$b->strNome." PESSOA NÃO POSSUI IMAGEM DA FICHA ANEXADA!<br>";
}


$xml.='<pessoa>';

if ($b->setEstadoCivil == 'SO') {
$estado_civil = "SOLTEIRO(A)";
} elseif  ($b->setEstadoCivil == 'VI') {
$estado_civil = "VÍUVO(A)";}
elseif ($b->setEstadoCivil == 'CA')  {
$estado_civil = "CASADO(A)";
}elseif ($b->setEstadoCivil == 'DI')  {
$estado_civil = "DIVORCIADO(A)";
}elseif ($b->setEstadoCivil == 'UN')  {
$estado_civil = "UNIÃO ESTAVÉL";
}

else {
	$estado_civil = " ";
}
$xml.='<estadoCivil>'.$estado_civil.'</estadoCivil>';

$tirar = array('.',',','-','/');

$xml.='<cpf>'.str_replace($tirar, "", $b->strCPFcnpj).'</cpf>';
$xml.='<nome>'.$b->strNome.'</nome>';
$xml.='<sexo>'.$b->setSexo.'</sexo>';
$xml.='<mae>'.$b->strNomeMae.'</mae>';
$xml.='<pai>'.$b->strNomePai.'</pai>';
$xml.='<profissao>'.$b->strProfissao.'</profissao>';

	if (intval($b->strNaturalidade) == '5300109'):
	$cid_ext = explode("/", $b->strNaturalidade);
	$cidade_naturalidade = $cid_ext[3];

	else:
	$e = PESQUISA_ALL_ID('uf_cidade',intval($b->strNaturalidade)); foreach ($e as $e):
	$cidade_naturalidade = $e->cidade.'/'.$e->uf;
	endforeach;
	endif;

$xml.='<cidadeNaturalidade>'.$cidade_naturalidade.'</cidadeNaturalidade>';
$xml.='<dataNascimento>'.$b->dataNascimento.'</dataNascimento>';
$xml.='<email>'.$b->strEmail.'</email>';

#xml endereco:
$xml.='<endereco>';
$xml.='<cep></cep>';

	if (intval($b->intUFcidade) == '5300109'):
	$cid = explode("/", $b->intUFcidade);
	$cidade_residencia = $cid[3];

	else:
	$e = PESQUISA_ALL_ID('uf_cidade',intval($b->intUFcidade)); foreach ($e as $e):
	$cidade_residencia = $e->cidade.'/'.$e->uf;
	endforeach;
	endif;

$xml.='<cidade>'.$cidade_residencia.'</cidade>';
$xml.='<endereco>'.$b->strLogradouro.', '.$b->strBairro.'</endereco>';
$xml.='<numero></numero>';
$xml.='</endereco>';

#xml documento
if (!empty($b->scanImgDigital)) {
$img_doc_b64 = base64_encode($b->scanImgDigital);
}
else{
$img_doc_b64 = '';	
}


$xml.='<documento>';
$xml.='<docIdentidade>'.str_replace($tirar, "", $b->strRG).'</docIdentidade>';
$xml.='<orgaoEmissor>'.$b->strOrgaoEm.'</orgaoEmissor>';
$xml.='<dataEmissao>'.$b->dataEmisao.'</dataEmissao>';
$xml.='<imagemDocumento>'.$img_doc_b64.'</imagemDocumento>';
$xml.='</documento>';

#xml ficha
$retorno = json_decode($b->RETORNOSELODIGITAL,true);
$strSelo = $retorno['numeroSelo'].'<br>';

$busca_data_ficha = $pdo->prepare("SELECT dataHora from auditoria where strSelo = '$strSelo'");
$busca_data_ficha->execute();
$bdf = $busca_data_ficha->fetch(PDO::FETCH_ASSOC);
$data_ficha = date('Y-m-d', strtotime($bdf['dataHora'])); 

if (!empty($b->scanImgAssinatura)) {
$img_ficha_b64 = base64_encode($b->scanImgAssinatura);
}
else{
$img_ficha_b64 = '';
#$_SESSION['log_erros'] .= '- FICHA Nº'.$b->strFicha.' NÃO POSSUI IMAGEM DE FICHA ANEXADA';	
}


$xml.='<ficha>';
$xml.='<dataFicha>'.$data_ficha.'</dataFicha>';
$xml.='<numeroFicha>'.$b->strFicha.'</numeroFicha>';
$xml.="<imagensFicha>".$img_ficha_b64." </imagensFicha>";
$xml.='</ficha>';
$xml.='<imagemFoto></imagemFoto>';
$xml.='</pessoa>';
}
endfor;

$xml.='</pessoas>';






$xml = str_replace("&", "e", $xml);




if ($_SESSION['log_erros']!='') {
header('location:arquivo-ccn.php');
break;
}


$nomexml = 'CCN'.date('dmY').'-'.rand(1,9);

$nome_arquivo = '../Remessas/'.$nomexml.'.xml';
$nome_arquivo_puro = $nomexml.'.xml';
$arquivo = fopen($nome_arquivo, 'w+');
$escrever = fwrite($arquivo, $xml);
fclose($arquivo);
$xmlDoc = new DOMDocument();
$xmlDoc->formatOutput = true;
$dom->preserveWhiteSpace = false;
$xmlDoc->load($nome_arquivo);
$xmlDoc->save($nome_arquivo);


#download automatico: ---------------------------------------------------------------
ob_clean();
header('Content-type: application/xml');
header('Content-disposition: attachment; filename="'.$nome_arquivo_puro.'"');
readfile($nome_arquivo);

 ?>
