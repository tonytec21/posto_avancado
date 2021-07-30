<?php 

include('../../../controller/db_functions.php');
$pdo = conectar();
$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];

$busca_matricula = $pdo->prepare("SELECT * FROM `imoveis_registro` WHERE dataMatricula >= '$data_inicial' and 'dataMatricula' <= $data_final");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);


#versao do encoding xml
$dom = new DOMDocument("1.0","UTF-8");
#header("Content-Type: text/xml");
#retirar os espacos em branco
$dom->preserveWhiteSpace = false;

#gerar o codigo
$dom->formatOutput = true;
$registros_xml = $dom->createElement("registros");
foreach ($linhas as $key ) {
	
$matricula = $key->strMatricula;
$datamatricula = $key->dataMatricula;
$tipoImovel = $key->setTipoImovel;
$ccri = $key->strCCIRMunicipal;
$descricao = $key->strDescricao;
$area = $key->strArea;
$endereco = $key->strEndereco;	
$loteamento = $key->strLoteamento;
$lote = $key->strLote;
$cidade = $key->strCidade;
$desc_imovel = $key->strDadosImovel;


#criando o nó principal (Registro)

#nó filho (Registro0)
#parte inicial informações do registro:

$registro0_xml = $dom->createElement("registro0");
$ato0_xml = $dom->createElement("ato0");
$tipoRemessa_xml = $dom->createElement("tipo_remessa", 1);
$atoTipoId_xml = $dom->createElement("ato_tipo_id", 1);
$matricula_xml = $dom->createElement("matricula", 1);
$idDoAto_xml = $dom->createElement("identificacao_ato",$matricula);
$dataRegistro_xml = $dom->createElement("data_registro",$datamatricula);

$dados_xml = $dom->createElement("dados");
#--------------------------------------------------------------------

#tag dados:
#tudo que vem dentro da tag dadaos:

$numero_de_paginas_xml = $dom->createElement("numero_paginas", 12) ;
$tipo_do_imovel_xml = $dom->createElement("tipo_imovel", $tipoImovel) ;
$area_em_metros_quadrados_xml = $dom->createElement("area_metros_quadrados",$area) ;
//$codigo_do_iptu_xml = $dom->createElement("codigo_iptu",$codigo_iptu);
$cidade_xml = $dom->createElement("cidade", $cidade);
$endereco_conjundo_dados_xml = $dom->createElement("endereco");
//$tipo_logradouro_xml = $dom->createElement("tipo_logradouro");
$endereco_xml = $dom->createElement("endereco",$endereco);
#$complemento_xml = $dom->createElement("complemento",$complemento);
#$numero_xml = $dom->createElement("numero",$num);
#$bairro_xml = $dom->createElement("bairro",$bairro);
$lote_xml = $dom->createElement("lote",$lote);
$loteamento_xml = $dom->createElement("loteamento",$loteamento);
#$cep_xml = $dom->createElement("cep",$cep);
$descricao_matricula_xml =$dom->createElement("descricao_matricula",$desc_imovel);

#hierarquia xml:
#parte onde se define qual tag deve ficar dentro da outra:

$registros_xml->appendChild($registro0_xml);
#$registros_xml->appendChild($tag_partes_xml);
$registro0_xml->appendChild($ato0_xml);
$ato0_xml->appendChild($atoTipoId_xml);
$ato0_xml->appendChild($matricula_xml);
$ato0_xml->appendChild($idDoAto_xml);
$ato0_xml->appendChild($dataRegistro_xml);
$ato0_xml->appendChild($dados_xml);
$dados_xml->appendChild($numero_de_paginas_xml);
$dados_xml->appendChild($tipo_do_imovel_xml);
$dados_xml->appendChild($area_em_metros_quadrados_xml);
//$dados_xml->appendChild($codigo_do_iptu_xml);
$dados_xml->appendChild($endereco_conjundo_dados_xml);
$endereco_conjundo_dados_xml->appendChild($cidade_xml);
//$endereco_conjundo_dados_xml->appendChild($tipo_logradouro_xml);
$endereco_conjundo_dados_xml->appendChild($endereco_xml);
#$endereco_conjundo_dados_xml->appendChild($complemento_xml);
#$endereco_conjundo_dados_xml->appendChild($numero_xml);
#$endereco_conjundo_dados_xml->appendChild($bairro_xml);
#$endereco_conjundo_dados_xml->appendChild($cep_xml);
$endereco_conjundo_dados_xml->appendChild($loteamento_xml);
$endereco_conjundo_dados_xml->appendChild($lote_xml);
$dados_xml->appendChild($descricao_matricula_xml);

$dom->appendChild($registros_xml);
}

$data = $data_inicial.'-'.$data_final;

# Para salvar o arquivo, descomente a linha
$nomearquivo = utf8_decode("matriculas/".$data.".xml");
$dom->save($nomearquivo);
$tipo = "application/xml";

  	 header("Content-Type:".$tipo); // informa o tipo do arquivo ao navegador
      header("Content-Length: ".filesize($nomearquivo)); // informa o tamanho do arquivo ao navegador
      header("Content-Disposition: attachment; filename=".basename($nomearquivo)); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
      readfile($nomearquivo); // lê o arquivo
      exit; // aborta pós-ações

#cabeçalho da página

# imprime o xml na tela
//print $dom->saveXML();
     
header('location:../exportar-cartorios-ma.php');

 ?>

