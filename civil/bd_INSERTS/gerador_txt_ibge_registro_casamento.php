<?php
//error_reporting(0);
//ini_set(“display_errors”, 0 );
//error_reporting(E_ALL);
//ini_set(“display_errors”, 1 );d

include('../../../controller/conexao.php');
$pdo = conectar();
$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];

$busca_matricula = $pdo->prepare("SELECT * FROM `registro_casamento` WHERE dataRegistro >= '$data_inicial' and 'dataRegistro' <= $data_final");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);


$busca_cns = $pdo->prepare("SELECT * FROM `cadastroserventia`");
$busca_cns->execute();
$linha_cns= $busca_cns->fetchAll(PDO::FETCH_OBJ);

foreach ($linha_cns as $s) {
$cns = $s->strCNS;
}

#versao do encoding xml
$dom = new DOMDocument("1.0", "UTF-8");

#retirar os espacos em branco
$dom->preserveWhiteSpace = false;

#gerar o codigo
$dom->formatOutput = true;

$carga_registro_xml = $dom->createElement("CARGAREGISTROS");
  $versao_xml = $dom->createElement("VERSAO", 2.6);
  $acao_xml = $dom->createElement("ACAO",'CARGA');
  $cns_xml = $dom->createElement("CNS",$cns);

  $carga_registro_xml->appendChild($versao_xml);
  $carga_registro_xml->appendChild($acao_xml);
  $carga_registro_xml->appendChild($cns_xml);

foreach ($linhas as $key ) {

  $nomec1 = $key->strNomeNoivo;
  $nomec2 = $key->strNomeNoiva;
  $sexoc1 = $key->setSexoNoivo;
  $sexoc2 = $key->setSexoNoiva;
  $matricula = $key->strMatricula;
  $data_registro = $key->dataRegistro;
  $data_casamento = $key->dataCasamento;
  $regime = $key->setRegime;
  $ordem = $key->Ordem;



  #--------------------------------------------------------------------

  #CRIANDO AS TAGAS XML:

  # DADOS DO NASCIMENTO -LOOP EM VARIÁVEIS:
    $carga_movimento_xml = $dom->createElement("MOVIMENTOCASAMENTOTC");
      $carga_tipo_registro_xml = $dom->createElement("REGISTROCASAMENTOINCLUSAO");
      $indice_registros1_xml = $dom->createElement("INDICEREGISTRO",$ordem);


    $nome_conjuge1_xml = $dom->createElement("NOMECONJUGE1",$nomec1);
    $novonome_conjuge1_xml = $dom->createElement("SEXOCONJUGE1",$sexoc1);
    $cpf_conjuge1_xml = $dom->createElement("CPFCONJUGE1");
    $sexo_conjuge1_xml = $dom->createElement("SEXOCONJUGE1");
    $datanasc_conjuge1_xml = $dom->createElement("DATANASCIMENTOCONJUGE1");
    $nomepai_conjuge1_xml = $dom->createElement("NOMEPAICONJUGE1");
    $sexopai_conjuge1_xml = $dom->createElement("SEXOPAICONJUGE1");
    $nomemae_conjuge1_xml = $dom->createElement("NOMEMAECONJUGE1");
    $sexomae_conjuge1_xml = $dom->createElement("SEXOMAECONJUGE1");
    $codocup_conjuge1_xml = $dom->createElement("CODIGOOCUPACAOSDCCONJUGE1");
    $paisnacimento_conjuge1_xml = $dom->createElement("PAISNASCIMENTOCONJUGE1");
    $nacionalidade_conjuge1_xml = $dom->createElement("NACIONALIDADECONJUGE1");
    $codibgenatu_conjuge1_xml = $dom->createElement("CODIGOIBGEMUNNATCONJUGE1");
    $textolivre_conjuge1_xml = $dom->createElement("TEXTOLIVREMUNNATCONJUGE1");
    $codibgemunlogr_conjuge1_xml = $dom->createElement("CODIGOIBGEMUNLOGRADOURO1");
    $domiciolioextr_conjuge1_xml = $dom->createElement("DOMICILIOESTRANGEIRO1");


          $nome_conjuge2_xml = $dom->createElement("NOMECONJUGE2",$nomec2);
          $novonome_conjuge2_xml = $dom->createElement("NOVONOMECONJUGE2");
          $cpf_conjuge2_xml = $dom->createElement("CPFCONJUGE2");
          $sexo_conjuge2_xml = $dom->createElement("SEXOCONJUGE2",$sexoc2);
          $datanasc_conjuge2_xml = $dom->createElement("DATANASCIMENTOCONJUGE2");
          $nomepai_conjuge2_xml = $dom->createElement("NOMEPAICONJUGE2");
          $sexopai_conjuge2_xml = $dom->createElement("SEXOPAICONJUGE2");
          $nomemae_conjuge2_xml = $dom->createElement("NOMEMAECONJUGE2");
          $sexomae_conjuge2_xml = $dom->createElement("SEXOMAECONJUGE2");
          $codocup_conjuge2_xml = $dom->createElement("CODIGOOCUPACAOSDCCONJUGE2");
          $paisnacimento_conjuge2_xml = $dom->createElement("PAISNASCIMENTOCONJUGE2");
          $nacionalidade_conjuge2_xml = $dom->createElement("NACIONALIDADECONJUGE2");
          $codibgenatu_conjuge2_xml = $dom->createElement("CODIGOIBGEMUNNATCONJUGE2");
          $textolivre_conjuge2_xml = $dom->createElement("TEXTOLIVREMUNNATCONJUGE2");
          $codibgemunlogr_conjuge2_xml = $dom->createElement("CODIGOIBGEMUNLOGRADOURO2");
          $domiciolioextr_conjuge2_xml = $dom->createElement("DOMICILIOESTRANGEIRO2");


          $matricula_xml = $dom->createElement("MATRICULA");
          $dataregistro_xml = $dom->createElement("DATAREGISTRO",date('d/m/Y', strtotime($data_registro)));
          $datacasamento_xml = $dom->createElement("DATACASAMENTO",date('d/m/Y', strtotime($data_casamento)));


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


          $documentos_xml = $dom->createElement("DOCUMENTOS");
          $indice_registros2_xml = $dom->createElement("INDICEREGISTRO");
          $dono_xml = $dom->createElement("DONO");
          $tipodoc_xml = $dom->createElement("TIPO_DOC");
          $descricao_xml = $dom->createElement("DESCRICAO");
          $numero_xml = $dom->createElement("NUMERO");
          $numserie_xml = $dom->createElement("NUMERO_SERIE");
          $codemissor_xml = $dom->createElement("CODIGOORGAOEMISSOR");
          $ufemissor_xml = $dom->createElement("UF_EMISSAO");
          $dataemissor_xml = $dom->createElement("DATA_EMISSAO");
          $orgaoexterior_xml = $dom->createElement("ORGAOEMISSOREXTERIOR");
          $informacaoconsulado_xml = $dom->createElement("INFORMACOESCONSULADO");
          $observacao_xml = $dom->createElement("OBSERVACOES");

  #--------------------------------------------------------------------




  #--------------------------------------------------------------------

  #tag d
  #hierarquia xml:
  #parte onde se define qual tag deve ficar dentro da outra:

  $carga_registro_xml->appendChild($carga_movimento_xml);
  $carga_movimento_xml->appendChild($carga_tipo_registro_xml);
  $carga_tipo_registro_xml->appendChild($indice_registros1_xml);


  $carga_tipo_registro_xml->appendChild($nome_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($novonome_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($cpf_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($sexo_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($datanasc_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($nomepai_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($sexopai_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($nomemae_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($sexomae_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($codocup_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($paisnacimento_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($nacionalidade_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($codibgenatu_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($textolivre_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($codibgemunlogr_conjuge1_xml);
  $carga_tipo_registro_xml->appendChild($domiciolioextr_conjuge1_xml);


  $carga_tipo_registro_xml->appendChild($nome_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($novonome_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($cpf_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($sexo_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($datanasc_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($nomepai_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($sexopai_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($nomemae_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($sexomae_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($codocup_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($paisnacimento_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($nacionalidade_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($codibgenatu_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($textolivre_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($codibgemunlogr_conjuge2_xml);
  $carga_tipo_registro_xml->appendChild($domiciolioextr_conjuge2_xml);


  $carga_tipo_registro_xml->appendChild($matricula_xml);
  $carga_tipo_registro_xml->appendChild($dataregistro_xml);
  $carga_tipo_registro_xml->appendChild($datacasamento_xml);

  $carga_tipo_registro_xml->appendChild($regime_casamento_xml);


  $carga_tipo_registro_xml->appendChild($documentos_xml);
  $documentos_xml->appendChild($indice_registros2_xml);
  $documentos_xml->appendChild($dono_xml);
  $documentos_xml->appendChild($tipodoc_xml);
  $documentos_xml->appendChild($descricao_xml);
  $documentos_xml->appendChild($numero_xml);
  $documentos_xml->appendChild($numserie_xml);
  $documentos_xml->appendChild($codemissor_xml);
  $documentos_xml->appendChild($ufemissor_xml);
  $documentos_xml->appendChild($dataemissor_xml);
  $carga_tipo_registro_xml->appendChild($orgaoexterior_xml);
  $carga_tipo_registro_xml->appendChild($informacaoconsulado_xml);
  $carga_tipo_registro_xml->appendChild($observacao_xml);
  $dom->appendChild($carga_registro_xml);





}

# Para salvar o arquivo, descomente a linha
//$dom->save("contatos.xml");

#cabeçalho da página

$data = $data_inicial.'-'.$data_final;
//$data ='teste';
# Para salvar o arquivo, descomente a linha
$nomearquivo = utf8_decode("Remessas_Civil/".$data.".xml");
$dom->save($nomearquivo);
$tipo = "application/xml";

  	 header("Content-Type:".$tipo); // informa o tipo do arquivo ao navegador
      header("Content-Length: ".filesize($nomearquivo)); // informa o tamanho do arquivo ao navegador
      header("Content-Disposition: attachment; filename=".basename($nomearquivo)); // informa ao navegador que é tipo anexo e faz abrir a janela de download, tambem informa o nome do arquivo
      readfile($nomearquivo); // lê o arquivo
      exit; // aborta pós-ações
# imprime o xml na tela
print $dom->saveXML();
header('location:../exportar-cartorios-ma.php');

?>
