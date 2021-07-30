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
  $carga_movimento_xml = $dom->createElement("MOVIMENTOOBITOTO");
  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

foreach ($linhas as $key ) {


	if ($key->NOME == 'DESCONHECIDO' || $key->NOME =='NAO_REGISTRADO' || $key->NOME =='NAO_REGISTRADO'|| $key->NOME == '') {
$nome = '';
$flag_desconhecido = 'S';
}
else{
$nome = $key->NOME;
$flag_desconhecido ='N' ;
}

if ($key->COR == 'BR') {
$cor_pele ='BRANCA';
}

if ($key->COR == 'PR') {
$cor_pele ='PRETA';
}

if ($key->COR == 'PA') {
$cor_pele ='PARDA';
}

if ($key->COR == 'AM') {
$cor_pele ='AMARELA';
}

if ($key->COR == 'IN') {
$cor_pele ='INDIGENA';
}

if (empty($key->COR)) {
$cor_pele ='IGNORADA';
}

$sexo = $key->SEXO;
$matricula = str_replace(" ", "", $key->MATRICULA);
$data_registro = date('d/m/Y', strtotime($key->DATAENTRADA));
$data_nascimento = date('d/m/Y', strtotime($key->DATANASCIMENTO));
$cidadeobito = intval($key->CIDADEOBITO);
$cidade = intval($key->CIDADE);
$naturalidade = intval($key->NATURALIDADE);

if ($naturalidade == 0) {
$naturalidade = '';
}


$ordem = $key->TERMOOBITO;
$causa_morte = $key->CAUSAOBITO;
$causa_morte_outras = '';
$endereco_estrang = '';
$nome_medico = str_replace(".", "", $key->MEDICO);



$crm = explode("/", $key->CRM);
if (isset($crm[0])) {
$num_crm = $crm[0];	
}
else{
$num_crm = '';	
}
$crm = $num_crm;
$declarante = $key->NOMEDECLARANTE;
$nomepai =$key->NOMEPAI ;
$nomemae =$key->NOMEMAE;
$sexopai =$key->SEXOPAI;
$sexomae=$key->SEXOMAE;

$tirar = array(".","-");
$cpf =  str_replace($tirar, "", $key->CPF);
$cpfpai = str_replace($tirar, "", $key->CPFPAI);
$cpfmae = str_replace($tirar, "", $key->CPFMAE);
$cpfdeclarante =  str_replace($tirar, "", $key->CPFDECLARANTE);

$dataobito = date('d/m/Y', strtotime($key->DATAOBITO));
$horaobito =date('H:i', strtotime($key->HORAOBITO));

if ($key->ESTADOCIVIL == 'CA') {
$estadocivil = 'CASADO';
}
elseif ($key->ESTADOCIVIL == 'SO') {
$estadocivil = 'SOLTEIRO';
}
elseif ($key->ESTADOCIVIL == 'DI') {
$estadocivil = 'DIVORCIADO';
}
elseif ($key->ESTADOCIVIL == 'VI') {
$estadocivil = 'VIUVO';
}
else{
	$estadocivil = 'IGNORADO';
}
$datanascimento=date('d/m/Y', strtotime($key->DATANASCIMENTO));
$idade=$key->DATAOBITO - $key->DATANASCIMENTO;
$eleitor=$key->ELEITOR;
if ($key->ELEITOR == '') {
	$eleitor = 'N';
}


$possuibens=$key->DEIXOUBENS;
if ($key->DEIXOUBENS =='S2') {
$possuibens = 'S';
}

if ($key->DEIXOUBENS == 'N2') {
	$possuibens = 'N';
}
if ($key->DEIXOUBENS == '') {
	$possuibens = 'N';
}
if (empty($key->DATANASCIMENTO)) {
$datanascimento ='';
$idade ='';	
}

  if (intval($key->CIDADE) !='5300109') {
  $paisnascimento = '076';
   $nacionalidade= '076'; 
  }
$numerostirar = array('1','2','3','4','5','6','7','8','9','0','Nº','nº');
$endereco=str_replace($numerostirar, "", $key->ENDERECO);
$numero = intval($key->ENDERECO);
$bairro=$key->BAIRRO;
$tipolocalobito=$key->TIPOLOCALOBITO;



if ($key->TIPOMORTE =='NAT') {
$tipomorte = 'NATURAL';
}

elseif ($key->TIPOMORTE =='VIO') {
$tipomorte = 'VIOLENTA';
}
else{
	$tipomorte = 'IGNORADA';
}

$lugarfalecimento=$key->LOCALMORTE;
$lugarsepultamento=$key->LOCALSEPULTAMENTO;
$tirardnv = array("-","_");
$dno= str_replace($tirardnv, "", $key->NDO);



$nome = tirarAcentos($nome);
$endereco= tirarAcentos($endereco);
$bairro= tirarAcentos($bairro);
$causa_morte =  tirarAcentos($causa_morte);
$nome_medico =  tirarAcentos($nome_medico);
$declarante = tirarAcentos($declarante);
$nomepai = tirarAcentos($nomepai) ;
$nomemae = tirarAcentos($nomemae);
$sexopai = 'M';
$sexomae = 'F';

if ($key->NOMEPAI =='' || $key->NOMEPAI ==' ') {
$sexopai = '';
}

if ($key->NOMEMAE =='' || $key->NOMEMAE ==' ') {
$sexomae = '';
}
$lugarfalecimento=tirarAcentos($lugarfalecimento);
$lugarsepultamento=tirarAcentos($lugarsepultamento);
  #--------------------------------------------------------------------

  #CRIANDO AS TAGAS XML:

  # DADOS DO NASCIMENTO -LOOP EM VARIÁVEIS:
    
      $carga_tipo_registro_xml = $dom->createElement("REGISTROOBITOINCLUSAO");
      $indice_registros1_xml = $dom->createElement("INDICEREGISTRO",$ordem);
			$desconhecido_xml = $dom->createElement("FLAGDESCONHECIDO",$flag_desconhecido);
      $nome_registrado_xml = $dom->createElement("NOMEFALECIDO",$nome);

			$cpf_registrado_xml = $dom->createElement("CPFFALECIDO",$cpf);
      $matricula_xml = $dom->createElement("MATRICULA",$matricula);
      $data_registro_xml = $dom->createElement("DATAREGISTRO",$data_registro);
      $nomepai_xml = $dom->createElement("NOMEPAI",$nomepai);
			$cpfpai_xml = $dom->createElement("CPFPAI",$cpfpai);
			$sexopai_xml = $dom->createElement("SEXOPAI",$sexopai);
			$nomemae_xml = $dom->createElement("NOMEMAE",$nomemae);
			$cpfmae_xml = $dom->createElement("CPFMAE",$cpfmae);
			$sexomae_xml = $dom->createElement("SEXOMAE",$sexomae);
			$dataobito_xml = $dom->createElement("DATAOBITO",$dataobito);
			$horaobito_xml = $dom->createElement("HORAOBITO",$horaobito);
			$sexo_xml = $dom->createElement("SEXO",$sexo);
			$corpelo_xml = $dom->createElement("CORPELE",$cor_pele);
			$estadocivil_xml = $dom->createElement("ESTADOCIVIL",$estadocivil);
			$data_nasc_falecido_xml = $dom->createElement("DATANASCIMENTOFALECIDO",$datanascimento);
			$idade_falecido_xml = $dom->createElement("IDADE",$idade);
			$dados_idade_xml = $dom->createElement("IDADE_DIAS_MESES_ANOS");
			$eleitor_xml = $dom->createElement("ELEITOR",$eleitor);
			$possuibens_xml = $dom->createElement("POSSUIBENS",$possuibens);
			$codigo_ocupacao_xml = $dom->createElement("CODIGOOCUPACAOSDC");
			$pais_falecido_xml = $dom->createElement("PAISNASCIMENTO",$paisnascimento);
			$nacionalidade_falecido_xml = $dom->createElement("NACIONALIDADE",$nacionalidade);
			$codibgenatu_falecido_xml = $dom->createElement("CODIGOIBGEMUNNATURALIDADE",$naturalidade);
			$textomunnat_falecido_xml = $dom->createElement("TEXTOLIVREMUNICIPIONAT");
			#$codibgemunnatu_falecido_xml = $dom->createElement("CODIGOIBGEMUNNATURALIDADE");
			$codlogribge_falecido_xml = $dom->createElement("CODIGOIBGEMUNLOGRADOURO",$cidade);
			$domextrangeiro_falecido_xml = $dom->createElement("DOMICILIOESTRANGEIROFALECIDO");
			$logradouro_falecido_xml = $dom->createElement("LOGRADOURO",$endereco);
			$numerologradouro_falecido_xml = $dom->createElement("NUMEROLOGRADOURO",$numero);
			$complementologr_falecido_xml = $dom->createElement("COMPLEMENTOLOGRADOURO");
			$bairro_falecido_xml = $dom->createElement("BAIRRO",$bairro);
			$benefiviosprev_falecido_xml = $dom->createElement("BENEFICIOS_PREVIDENCIARIOS");
			$indice_benefiviosprev_xml = $dom->createElement("INDICEREGISTRO");
			$numero_benefiviosprev_xml = $dom->createElement("NUMEROBENEFICIO");
			$documentos_falecido_xml = $dom->createElement("DOCUMENTOS");
			$indice_documento_xml = $dom->createElement("INDICEREGISTRO");
			$registro_documento_xml = $dom->createElement("INDICEREGISTRO");
			$dono_documento_xml = $dom->createElement("DONO");
			$tipodoc_documento_xml = $dom->createElement("TIPO_DOC");
			$descr_documento_xml = $dom->createElement("DESCRICAO");
			$numero_documento_xml = $dom->createElement("NUMERO");
			$numserie_documento_xml = $dom->createElement("NUMERO_SERIE");
			$codemissor_documento_xml = $dom->createElement("CODIGOORGAOEMISSOR");
			$ufemissor_documento_xml = $dom->createElement("UF_EMISSAO");
			$dataemissor_documento_xml = $dom->createElement("DATA_EMISSAO");
			$tipolocalobito_xml = $dom->createElement("TIPOLOCALOBITO", $tipolocalobito);
			$tipomorte_xml = $dom->createElement("TIPOMORTE", $tipomorte);

			$declaracaoobito_xml = $dom->createElement("NUMDECLARACAOOBITO",$dno);
			$numdeclaracaoobito_xml = $dom->createElement("NUMDECLARACAOOBITOIGNORADA");
			$paisobito_xml = $dom->createElement("PAISOBITO",$nacionalidade);
			$codigo_ibge_mun_nascimento_xml = $dom->createElement("CODIGOIBGEMUNLOGRADOUROOBITO",$cidadeobito);
			$codigo_ibge_mun_extrang_xml = $dom->createElement("ENDERECOLOCALOBITOESTRANGEIRO",$endereco_estrang);
			$logrobito_xml = $dom->createElement("LOGRADOUROOBITO");
			$numlograobito_xml = $dom->createElement("NUMEROLOGRADOUROOBITO");
			$complogrobito_xml = $dom->createElement("COMPLEMENTOLOGRADOUROOBITO");
			$bairroobito_xml = $dom->createElement("BAIRROOBITO");
			$causa_morte_xml = $dom->createElement("CAUSAMORTEANTECEDENTES_A",$causa_morte);
			$causa_morteb_xml = $dom->createElement("CAUSAMORTEANTECEDENTES_B");
			$causa_mortec_xml = $dom->createElement("CAUSAMORTEANTECEDENTES_C");
			$causa_morted_xml = $dom->createElement("CAUSAMORTEANTECEDENTES_D");
			$causa_morte_outras_xml = $dom->createElement("CAUSAMORTEOUTRASCOND_A",$causa_morte);

			$causa_morte_outrasb_xml = $dom->createElement("CAUSAMORTEOUTRASCOND_B");
			$lugarfalecimento_xml = $dom->createElement("LUGARFALECIMENTO",$lugarfalecimento);
			$lugarsepultura_xml = $dom->createElement("LUGARSEPULTAMENTOCEMITERIO",$lugarsepultamento);
			$atestante_primario_xml = $dom->createElement("NOMEATESTANTEPRIMARIO",$nome_medico);
			$crm_xml = $dom->createElement("CRMATESTANTEPRIMARIO",$crm);
			$atestante_secundario_xml = $dom->createElement("NOMEATESTANTESECUNDARIO");
			$crm2_xml = $dom->createElement("CRMATESTANTESECUNDARIO");
			$declarante_xml = $dom->createElement("NOMEDECLARANTE",$declarante);
			$cpf_declarente_xml = $dom->createElement("CPFDECLARANTE",$cpfdeclarante);
			$orgaoexterior_xml = $dom->createElement("ORGAOEMISSOREXTERIOR");
			$infoconsulado_xml = $dom->createElement("INFORMACOESCONSULADO");
			$obs_falecimento_xml = $dom->createElement("OBSERVACOES");


  #--------------------------------------------------------------------




  #--------------------------------------------------------------------

  #tag d
  #hierarquia xml:
  #parte onde se define qual tag deve ficar dentro da outra:


  $carga_registro_xml->appendChild($carga_movimento_xml);
  $carga_movimento_xml->appendChild($carga_tipo_registro_xml);
  $carga_tipo_registro_xml->appendChild($indice_registros1_xml);
	$carga_tipo_registro_xml->appendChild($desconhecido_xml);
  $carga_tipo_registro_xml->appendChild($nome_registrado_xml);

	$carga_tipo_registro_xml->appendChild($cpf_registrado_xml);
	$carga_tipo_registro_xml->appendChild($matricula_xml);
	$carga_tipo_registro_xml->appendChild($data_registro_xml);
	$carga_tipo_registro_xml->appendChild($nomepai_xml);
	$carga_tipo_registro_xml->appendChild($cpfpai_xml);
	$carga_tipo_registro_xml->appendChild($sexopai_xml);
	$carga_tipo_registro_xml->appendChild($nomemae_xml);
	$carga_tipo_registro_xml->appendChild($cpfmae_xml);
	$carga_tipo_registro_xml->appendChild($sexomae_xml);
	$carga_tipo_registro_xml->appendChild($dataobito_xml);
	$carga_tipo_registro_xml->appendChild($horaobito_xml);

	$carga_tipo_registro_xml->appendChild($sexo_xml);
	$carga_tipo_registro_xml->appendChild($corpelo_xml);

	$carga_tipo_registro_xml->appendChild($estadocivil_xml);
	$carga_tipo_registro_xml->appendChild($data_nasc_falecido_xml);
	$carga_tipo_registro_xml->appendChild($idade_falecido_xml);
	$carga_tipo_registro_xml->appendChild($dados_idade_xml);
	$carga_tipo_registro_xml->appendChild($eleitor_xml);
	$carga_tipo_registro_xml->appendChild($possuibens_xml);
	$carga_tipo_registro_xml->appendChild($codigo_ocupacao_xml);
	$carga_tipo_registro_xml->appendChild($pais_falecido_xml);
	$carga_tipo_registro_xml->appendChild($nacionalidade_falecido_xml);
	$carga_tipo_registro_xml->appendChild($codibgenatu_falecido_xml);
	$carga_tipo_registro_xml->appendChild($textomunnat_falecido_xml);
	#$carga_tipo_registro_xml->appendChild($codibgemunnatu_falecido_xml);

	$carga_tipo_registro_xml->appendChild($codlogribge_falecido_xml);
	$carga_tipo_registro_xml->appendChild($domextrangeiro_falecido_xml);
	$carga_tipo_registro_xml->appendChild($logradouro_falecido_xml);
	$carga_tipo_registro_xml->appendChild($numerologradouro_falecido_xml);
	$carga_tipo_registro_xml->appendChild($complementologr_falecido_xml);
	$carga_tipo_registro_xml->appendChild($bairro_falecido_xml);
	$carga_tipo_registro_xml->appendChild($benefiviosprev_falecido_xml);
	$benefiviosprev_falecido_xml->appendChild($indice_benefiviosprev_xml);
	$benefiviosprev_falecido_xml->appendChild($numero_benefiviosprev_xml);
	
	/* ESSAS TAGS NÃO ESTÃO NO ARQUIVO QUE ESTÁ PASSANDO
	$carga_tipo_registro_xml->appendChild($documentos_falecido_xml);
	$documentos_falecido_xml->appendChild($indice_documento_xml);
	$documentos_falecido_xml->appendChild($dono_documento_xml);
	$documentos_falecido_xml->appendChild($tipodoc_documento_xml);
	$documentos_falecido_xml->appendChild($descr_documento_xml);
	$documentos_falecido_xml->appendChild($numero_documento_xml);
	$documentos_falecido_xml->appendChild($numserie_documento_xml);
	$documentos_falecido_xml->appendChild($codemissor_documento_xml);
	$documentos_falecido_xml->appendChild($ufemissor_documento_xml);
	$documentos_falecido_xml->appendChild($dataemissor_documento_xml);
	*/	

	$carga_tipo_registro_xml->appendChild($tipolocalobito_xml);
	$carga_tipo_registro_xml->appendChild($tipomorte_xml);
	$carga_tipo_registro_xml->appendChild($declaracaoobito_xml);
	#$carga_tipo_registro_xml->appendChild($numdeclaracaoobito_xml);
	#$carga_tipo_registro_xml->appendChild($paisobito_xml);
	$carga_tipo_registro_xml->appendChild($codigo_ibge_mun_nascimento_xml);

	$carga_tipo_registro_xml->appendChild($codigo_ibge_mun_extrang_xml);
	$carga_tipo_registro_xml->appendChild($logrobito_xml);
	$carga_tipo_registro_xml->appendChild($numlograobito_xml);
	$carga_tipo_registro_xml->appendChild($complogrobito_xml);
	$carga_tipo_registro_xml->appendChild($bairroobito_xml);
	$carga_tipo_registro_xml->appendChild($causa_morte_xml);
	$carga_tipo_registro_xml->appendChild($causa_morteb_xml);
	$carga_tipo_registro_xml->appendChild($causa_mortec_xml);
	$carga_tipo_registro_xml->appendChild($causa_morted_xml);
	$carga_tipo_registro_xml->appendChild($causa_morte_outras_xml);
	$carga_tipo_registro_xml->appendChild($causa_morte_outrasb_xml);
	$carga_tipo_registro_xml->appendChild($lugarfalecimento_xml);
	$carga_tipo_registro_xml->appendChild($lugarsepultura_xml);
	$carga_tipo_registro_xml->appendChild($atestante_primario_xml);
	$carga_tipo_registro_xml->appendChild($crm_xml);
	$carga_tipo_registro_xml->appendChild($atestante_secundario_xml);
	$carga_tipo_registro_xml->appendChild($crm2_xml);
	$carga_tipo_registro_xml->appendChild($declarante_xml);
	$carga_tipo_registro_xml->appendChild($cpf_declarente_xml);
	#$carga_tipo_registro_xml->appendChild($orgaoexterior_xml);
	#$carga_tipo_registro_xml->appendChild($infoconsulado_xml);
	$carga_tipo_registro_xml->appendChild($obs_falecimento_xml);

  $dom->appendChild($carga_registro_xml);





}

# Para salvar o arquivo, descomente a linha
//$dom->save("contatos.xml");

session_start();
$data = date('Y-m-d');
$hora = date('H:i');
$faixa_remessa = 'de '.$data_inicial.' a '.$data_final;
$funcionario = $_SESSION['nome'];
$envio_remessa = $pdo->prepare("INSERT INTO envio_remessas values(null,'$data','$hora','CRC_OBITO','$funcionario','PENDENTE','$faixa_remessa')");
$envio_remessa->execute();

#cabeçalho da página

$data = 'OBITOS '.$data_inicial.'-'.$data_final;
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
