<?php
//error_reporting(0);
//ini_set(“display_errors”, 0 );
//error_reporting(E_ALL);
//ini_set(“display_errors”, 1 );d

include('../controller/conexao.php');

function idade_civil_antigo($nascimento,$dataregistro){
  $data = explode("-",$nascimento);
  $registro = explode("-",$dataregistro);

  $ano = $data[0];
  $mes = $data[1];
  $dia = $data[2];

  $ano1 = $registro[0];
  $mes1 = $registro[1];
  $dia1 = $registro[2];



    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime( 0, 0, 0, $mes1, $dia1, $ano1);
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

    // Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

    return $idade;

}

$pdo = conectar();
$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];

$busca_matricula = $pdo->prepare("SELECT * FROM `registro_nascimento_novo`  WHERE DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final'");
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
   $carga_movimento_xml = $dom->createElement("MOVIMENTONASCIMENTOTN");
  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

foreach ($linhas as $key ) {


  $nome = $key->NOMENASCIDO;
  $sexo = $key->SEXONASCIDO;
  $tirar = array(".","-");
  $cpf = str_replace($tirar, "", $key->CPFNASCIDO);
  $matricula = str_replace(" ", "", $key->MATRICULA);
  $tirardnv = array("-","_");
  $dnv =str_replace($tirardnv, "", $key->DNV);
  $horanascimento = date('H:i', strtotime($key->HORANASCIMENTO));
  $possuigemeos= $key->GEMEOS;
  if ($key->GEMEOS == 'S') {
 $nomematricula = explode(";", $key->NOMEMATRICULAGEMEOS);
  $numerogemeos = count($nomematricula);
  }
  else{
  $numerogemeos = '';
  }
  
  if (intval($key->CIDADENASCIMENTO) !='5300109') {
  $paisnascimento = '076';
   $nacionalidade= '076'; 
  }
 

  $data_registro = date('d/m/Y', strtotime($key->DATAENTRADA));
  $data_nascimento = date('d/m/Y', strtotime($key->DATANASCIMENTO));
  if (empty($key->TIPOLOCALNASCIMENTO) || $key->TIPOLOCALNASCIMENTO == NULL || $key->TIPOLOCALNASCIMENTO == "RANI") {
    $setTipoLocalNascimento = "IGNORADO";//$key->setTipoLocalNascimento;
  }else {
    $setTipoLocalNascimento = $key->TIPOLOCALNASCIMENTO;

  }
//  $setTipoLocalNascimento = "FORA_UNIDADE_SAUDE";//$key->setTipoLocalNascimento;
  $local_nascimento = $key->LOCALNASCIMENTO;
  $cidade = $key->CIDADENASCIMENTO;

  if (!empty($key->NOMEMAE) || $key->NOMEMAE != NULL ) {
    $nome_genitor = $key->NOMEMAE;
    $natural = intval($key->NATURALIDADEMAE);
    if ($natural == 0) {
      $natural = '';
    }
    $sexo_genitor = $key->SEXOMAE;
    if ($key->DATANASCIMENTOMAE!='') {
    $idade_mae = idade_civil_antigo($key->DATANASCIMENTOMAE, $key->DATAENTRADA);  
    $data_nascimento_genitor = date('d/m/Y', strtotime($key->DATANASCIMENTOMAE));
      }
      else{$data_nascimento_genitor = ''; $idade_mae = '';}
  
  }else {
    $nome_genitor = $key->NOMEMAE;
    $natural = $key->NATURALIDADEMAE;
    $sexo_genitor = $key->SEXOMAE;
    $data_nascimento_genitor = '';
  }


    if (!empty($key->NOMEPAI) || $key->NOMEPAI != NULL ) {
    $nome_genitor2 = $key->NOMEPAI;
    $natural2 = intval($key->NATURALIDADEPAI);
    if ($natural2 == 0) {
      $natural2 = '';
    }
    $sexo_genitor2 = $key->SEXOPAI;
    if ($key->DATANASCIMENTOPAI!='') {
    $data_nascimento_genitor_2 = date('d/m/Y', strtotime($key->DATANASCIMENTOPAI));
    $idade_pai = idade_civil_antigo($key->DATANASCIMENTOPAI, $key->DATAENTRADA);  
  }
    else{$data_nascimento_genitor_2 = ''; $idade_pai ='';}

  }else {
    $nome_genitor2 = $key->NOMEPAI;
    $natural2 = $key->NATURALIDADEPAI;
    $sexo_genitor2 = $key->SEXOPAI;
    $data_nascimento_genitor_2 = '';
  }

  //$natural = $key->strNaturalidadePai;
  $ordem = $key->TERMONASCIMENTO;
//  $nome_genitor = $key->strNomePai;





$nome_genitor =  tirarAcentos($nome_genitor);


  #--------------------------------------------------------------------

  #CRIANDO AS TAGAS XML:

  # DADOS DO NASCIMENTO -LOOP EM VARIÁVEIS:
   
      $carga_tipo_registro_xml = $dom->createElement("REGISTRONASCIMENTOINCLUSAO");
      $indice_registros1_xml = $dom->createElement("INDICEREGISTRO",$ordem);
      $nome_registrado_xml = $dom->createElement("NOMEREGISTRADO",$nome);
      $cpf_registrado_xml = $dom->createElement("CPFREGISTRADO",$cpf);
      $matricula_xml = $dom->createElement("MATRICULA",$matricula);
      $data_registro_xml = $dom->createElement("DATAREGISTRO",$data_registro);
      $dnv_xml = $dom->createElement("DNV",$dnv);
      $data_nascimento_xml = $dom->createElement("DATANASCIMENTO",$data_nascimento);
      $hora_nascimento_xml = $dom->createElement("HORANASCIMENTO",$horanascimento);
      $local_nascimento_xml = $dom->createElement("LOCALNASCIMENTO",$setTipoLocalNascimento);
      $sexo_xml = $dom->createElement("SEXO",$sexo);
      $possuigemeos_xml = $dom->createElement("POSSUIGEMEOS",$possuigemeos);
      $numgemeos_xml = $dom->createElement("NUMEROGEMEOS",$numerogemeos);
      $codigo_ibge_mun_nascimento = $dom->createElement("CODIGOIBGEMUNNASCIMENTO",intval($cidade));
      $paisnascimento_xml = $dom->createElement("PAISNASCIMENTO",$paisnascimento);
      $nacionalidade_xml = $dom->createElement("NACIONALIDADE",$nacionalidade);
      $textoestrangeiro_xml = $dom->createElement("TEXTONACIONALIDADEESTRANGEIRO");

      if ($nome_genitor2!='' && strlen($nome_genitor2)>2) {
      $filiacao_xml_1 = $dom->createElement("FILIACAONASCIMENTO");
      $indice_registros2_xml_1 = $dom->createElement("INDICEREGISTRO",$ordem);
      $indice_filiacao_xml_1 = $dom->createElement("INDICEFILIACAO",1);
      $nome_genitor_xml_1 = $dom->createElement("NOME",$nome_genitor2);
      $sexo_filiacao_xml_1 = $dom->createElement("SEXO", $sexo_genitor2);
      $cpf_filiacao_xml_1 = $dom->createElement("CPF");
      $dnascimento_filiacao_xml_1 = $dom->createElement("DATANASCIMENTO", $data_nascimento_genitor_2);
      $idade_filiacao_xml_1 = $dom->createElement("IDADE", $idade_pai);
      $idadeextenso_filiacao_xml_1 = $dom->createElement("IDADE_DIAS_MESES_ANOS");
      $codigoibge_filiacao_xml_1 = $dom->createElement("CODIGOIBGEMUNLOGRADOURO");
      $logradouro_filiacao_xml_1 = $dom->createElement("LOGRADOURO");
      $numlogradouro_filiacao_xml_1 = $dom->createElement("NUMEROLOGRADOURO");
      $complogradouro_filiacao_xml_1 = $dom->createElement("COMPLEMENTOLOGRADOURO");
      $bairro_filiacao_xml_1 = $dom->createElement("BAIRRO");
      $nacionalidade_filiacao_xml_1 = $dom->createElement("NACIONALIDADE");
      $domicilio_filiacao_xml_1 = $dom->createElement("DOMICILIOESTRANGEIRO");
      $codibgenatural_filiacao_xml_1 = $dom->createElement("CODIGOIBGEMUNNATURALIDADE",$natural2);
      $codocupacap_filiacao_xml_1 = $dom->createElement("CODIGOOCUPACAOSDC");
      }

      $filiacao_xml = $dom->createElement("FILIACAONASCIMENTO");
      $indice_registros2_xml = $dom->createElement("INDICEREGISTRO",$ordem);
      $indice_filiacao_xml = $dom->createElement("INDICEFILIACAO",2);
      $nome_genitor_xml = $dom->createElement("NOME",$nome_genitor);
      $sexo_filiacao_xml = $dom->createElement("SEXO", $sexo_genitor);
      $cpf_filiacao_xml = $dom->createElement("CPF");
      $dnascimento_filiacao_xml = $dom->createElement("DATANASCIMENTO", $data_nascimento_genitor);
      $idade_filiacao_xml = $dom->createElement("IDADE",$idade_mae);
      $idadeextenso_filiacao_xml = $dom->createElement("IDADE_DIAS_MESES_ANOS");
      $codigoibge_filiacao_xml = $dom->createElement("CODIGOIBGEMUNLOGRADOURO");
      $logradouro_filiacao_xml = $dom->createElement("LOGRADOURO");
      $numlogradouro_filiacao_xml = $dom->createElement("NUMEROLOGRADOURO");
      $complogradouro_filiacao_xml = $dom->createElement("COMPLEMENTOLOGRADOURO");
      $bairro_filiacao_xml = $dom->createElement("BAIRRO");
      $nacionalidade_filiacao_xml = $dom->createElement("NACIONALIDADE");
      $domicilio_filiacao_xml = $dom->createElement("DOMICILIOESTRANGEIRO");
      $codibgenatural_filiacao_xml = $dom->createElement("CODIGOIBGEMUNNATURALIDADE",$natural);
      $codocupacap_filiacao_xml = $dom->createElement("CODIGOOCUPACAOSDC");

      


      $observacoes_xml = $dom->createElement("OBSERVACOES");




  #--------------------------------------------------------------------




  #--------------------------------------------------------------------

  #tag d
  #hierarquia xml:
  #parte onde se define qual tag deve ficar dentro da outra:


  $carga_registro_xml->appendChild($carga_movimento_xml);
  $carga_movimento_xml->appendChild($carga_tipo_registro_xml);
  $carga_tipo_registro_xml->appendChild($indice_registros1_xml);
  $carga_tipo_registro_xml->appendChild($nome_registrado_xml);
  $carga_tipo_registro_xml->appendChild($cpf_registrado_xml);
  $carga_tipo_registro_xml->appendChild($matricula_xml);
  $carga_tipo_registro_xml->appendChild($data_registro_xml);
  $carga_tipo_registro_xml->appendChild($dnv_xml);
  $carga_tipo_registro_xml->appendChild($data_nascimento_xml);
  $carga_tipo_registro_xml->appendChild($hora_nascimento_xml);
  $carga_tipo_registro_xml->appendChild($local_nascimento_xml);
  $carga_tipo_registro_xml->appendChild($sexo_xml);
  $carga_tipo_registro_xml->appendChild($possuigemeos_xml);
  $carga_tipo_registro_xml->appendChild($numgemeos_xml);
  $carga_tipo_registro_xml->appendChild($codigo_ibge_mun_nascimento);
  $carga_tipo_registro_xml->appendChild($paisnascimento_xml);
  $carga_tipo_registro_xml->appendChild($nacionalidade_xml);
  $carga_tipo_registro_xml->appendChild($textoestrangeiro_xml);
  if ($nome_genitor2!='' && strlen($nome_genitor2)>2) {
  $carga_tipo_registro_xml->appendChild($filiacao_xml_1);
  } 
  $carga_tipo_registro_xml->appendChild($filiacao_xml);
  
  if ($nome_genitor2!='' && strlen($nome_genitor2)>2) {
  $filiacao_xml_1->appendChild($indice_registros2_xml_1);
  $filiacao_xml_1->appendChild($indice_filiacao_xml_1);
  $filiacao_xml_1->appendChild($nome_genitor_xml_1);
  $filiacao_xml_1->appendChild($sexo_filiacao_xml_1);
  $filiacao_xml_1->appendChild($cpf_filiacao_xml_1);
  $filiacao_xml_1->appendChild($dnascimento_filiacao_xml_1);
  $filiacao_xml_1->appendChild($idade_filiacao_xml_1);
  $filiacao_xml_1->appendChild($idadeextenso_filiacao_xml_1);
  $filiacao_xml_1->appendChild($codigoibge_filiacao_xml_1);
  $filiacao_xml_1->appendChild($logradouro_filiacao_xml_1);
  $filiacao_xml_1->appendChild($numlogradouro_filiacao_xml_1);
  $filiacao_xml_1->appendChild($complogradouro_filiacao_xml_1);
  $filiacao_xml_1->appendChild($bairro_filiacao_xml_1);
  $filiacao_xml_1->appendChild($nacionalidade_filiacao_xml_1);
  $filiacao_xml_1->appendChild($domicilio_filiacao_xml_1);
  $filiacao_xml_1->appendChild($codibgenatural_filiacao_xml_1);
  $filiacao_xml_1->appendChild($codocupacap_filiacao_xml_1);
  }
  
  $filiacao_xml->appendChild($indice_registros2_xml);
  $filiacao_xml->appendChild($indice_filiacao_xml);
  $filiacao_xml->appendChild($nome_genitor_xml);
  $filiacao_xml->appendChild($sexo_filiacao_xml);
  $filiacao_xml->appendChild($cpf_filiacao_xml);
  $filiacao_xml->appendChild($dnascimento_filiacao_xml);
  $filiacao_xml->appendChild($idade_filiacao_xml);
  $filiacao_xml->appendChild($idadeextenso_filiacao_xml);
  $filiacao_xml->appendChild($codigoibge_filiacao_xml);
  $filiacao_xml->appendChild($logradouro_filiacao_xml);
  $filiacao_xml->appendChild($numlogradouro_filiacao_xml);
  $filiacao_xml->appendChild($complogradouro_filiacao_xml);
  $filiacao_xml->appendChild($bairro_filiacao_xml);
  $filiacao_xml->appendChild($nacionalidade_filiacao_xml);
  $filiacao_xml->appendChild($domicilio_filiacao_xml);
  $filiacao_xml->appendChild($codibgenatural_filiacao_xml);
  $filiacao_xml->appendChild($codocupacap_filiacao_xml);

 


  $carga_tipo_registro_xml->appendChild($observacoes_xml);
  $dom->appendChild($carga_registro_xml);





}

# Para salvar o arquivo, descomente a linha
//$dom->save("contatos.xml");
session_start();
$data = date('Y-m-d');
$hora = date('H:i');
$faixa_remessa = 'de '.$data_inicial.' a '.$data_final;
$funcionario = $_SESSION['nome'];
$envio_remessa = $pdo->prepare("INSERT INTO envio_remessas values(null,'$data','$hora','CRC_NASCIMENTO','$funcionario','PENDENTE','$faixa_remessa')");
$envio_remessa->execute();

#cabeçalho da página

$data = 'NASCIMENTOS '.$data_inicial.'-'.$data_final;
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
