<?php 

include('../../../controller/db_functions.php');
$pdo = conectar();
$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];

$busca_matricula = $pdo->prepare("SELECT * FROM `averbacoes_civil` WHERE dataAverbacao >= '$data_inicial' and dataAverbacao <= '$data_final' and strTipo = 'CA' ");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);

$s = PESQUISA_ALL('cadastroserventia');
foreach ($s as $s) {
$cns = $s->strCNS;	
}


#versao do encoding xml
$dom = new DOMDocument("1.0","UTF-8");
#header("Content-Type: text/xml");
#retirar os espacos em branco
$dom->preserveWhiteSpace = true;

#gerar o codigo
$dom->formatOutput = true;

$carga_registro_xml = $dom->createElement("CARGAREGISTROS");
$versao_xml = $dom->createElement("VERSAO", 2.6);
$cns_xml = $dom->createElement("CNS",$cns);
$carga_registro_xml->appendChild($versao_xml);
$carga_registro_xml->appendChild($cns_xml);


foreach ($linhas as $key ) {	

# DADOS DO CASAMENTO EM VARIÁVEIS:
$carga_movimento_xml = $dom->createElement("MOVIMENTOCASAMENTOTC");
$carga_tipo_registro_xml = $dom->createElement("REGISTROCASAMENTOALTERACAO");
$acao_xml = $dom->createElement("ACAO",'CARGA');
$nomec1 = $key->Conjuge1;
$nomec2 = $key->Conjuge2;
$sexoc1 = $key->sexoConjuge1;
$sexoc2 = $key->sexoConjuge2;
$matricula = $key->matricula;
$data_registro = $key->dataRegistro;
$data_casamento = $key->dataCasamento;
$regime = $key->regime;
$ordem = $key->Ordem;
$invisivel = $key->setRegistroInvisivel;
$motivo = $key->strMotivoAverbacao;
$datav = $key->dataAverbacao;


#--------------------------------------------------------------------

#CRIANDO AS TAGAS XML:
$indice_registros1_xml = $dom->createElement("INDICEREGISTRO",$ordem);
$codigo_motivo_alteracao_xml = $dom->createElement("CODIGOMOTIVOALTERACAO",$motivo);
$data_averbacao_xml = $dom->createElement("DATAAVERBACAO",date('d/m/Y', strtotime($datav)));
$registro_invisivel_xml = $dom->createElement("REGISTROINVISIVEL",$invisivel); 
$nomec1_xml = $dom->createElement("NOMECONJUGE1",$nomec1);
$sexoc1_xml = $dom->createElement("SEXOCONJUGE1",$sexoc1);
$nomec2_xml = $dom->createElement("NOMECONJUGE2",$nomec2);
$sexoc2_xml = $dom->createElement("SEXOCONJUGE2",$sexoc2);
$matricula_xml = $dom->createElement("MATRICULA",$matricula);
$data_registro_xml = $dom->createElement("DATAREGISTRO",date('d/m/Y', strtotime($data_registro)));
$data_casamento_xml = $dom->createElement("DATACASAMENTO",date('d/m/Y', strtotime($data_casamento)));
if($regime =='CP') {
	$regime_casamento_xml = $dom->createElement("REGIMECASAMENTO",'COMUNHAO_PARCIAL');
}
else if($regime =='CU') {
	$regime_casamento_xml = $dom->createElement("REGIMECASAMENTO",'COMUNHAO_UNIVERSAL');
}
else if($regime =='PF') {
	$regime_casamento_xml = $dom->createElement("REGIMECASAMENTO",'PARTICIPACAO_FINAL_AQUESTOS');
}
else if($regime =='SB') {
	$regime_casamento_xml = $dom->createElement("REGIMECASAMENTO",'SEPARACAO_BENS');
}
else if($regime =='SC') {
	$regime_casamento_xml = $dom->createElement("REGIMECASAMENTO",'SEPARACAO_LEGAL_BENS');
}
else if($regime =='CB') {
	$regime_casamento_xml = $dom->createElement("REGIMECASAMENTO",'OUTROS');
}
else{ $regime_casamento_xml = $dom->createElement("REGIMECASAMENTO",'IGNORADO');}



#--------------------------------------------------------------------


#hierarquia xml:
#parte onde se define qual tag deve ficar dentro da outra:



$carga_registro_xml->appendChild($carga_movimento_xml);
$carga_movimento_xml->appendChild($carga_tipo_registro_xml);
$carga_tipo_registro_xml->appendChild($indice_registros1_xml); 
$carga_tipo_registro_xml->appendChild($registro_invisivel_xml);
$carga_tipo_registro_xml->appendChild($codigo_motivo_alteracao_xml);
$carga_tipo_registro_xml->appendChild($data_averbacao_xml);
$carga_tipo_registro_xml->appendChild($nomec1_xml);
$carga_tipo_registro_xml->appendChild($sexoc1_xml);
$carga_tipo_registro_xml->appendChild($nomec2_xml);
$carga_tipo_registro_xml->appendChild($sexoc2_xml);
$carga_tipo_registro_xml->appendChild($matricula_xml);
$carga_tipo_registro_xml->appendChild($data_registro_xml);
$carga_tipo_registro_xml->appendChild($data_casamento_xml);
$carga_tipo_registro_xml->appendChild($regime_casamento_xml);
$dom->appendChild($carga_registro_xml);


}


$nomedaremessa = 'CASAMENTO_AVERBACOES_Remessa_de_';
$data = $nomedaremessa.$data_inicial.'-'.$data_final;

# Para salvar o arquivo, descomente a linha
$nomearquivo = utf8_decode("Remessas_Civil/".$data.".xml");
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

