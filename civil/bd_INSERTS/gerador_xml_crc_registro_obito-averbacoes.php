<?php
//error_reporting(0);
//ini_set(“display_errors”, 0 );
//error_reporting(E_ALL);
//ini_set(“display_errors”, 1 );d

include('../../../controller/conexao.php');
$pdo = conectar();
$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];

$busca_matricula = $pdo->prepare("SELECT * FROM `averbacoes_civil` WHERE dataRegistro >= '$data_inicial' and dataRegistro <= '$data_final' and strTipo = 'OB'");
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


	if ($key->nome == 'DESCONHECIDO') {
$nome = 'DESCONHECIDO';
$flag_desconhecido = 'S';
}elseif  ($key->nome =='NAO_REGISTRADO') {
	$nome = 'NAO_REGISTRADO';
	$flag_desconhecido = 'S';
}
else{
$nome = $key->nome;
$flag_desconhecido ='N' ;
}

$cor_pele = $key->corpele;
$sexo = $key->sexo;
$matricula = $key->matricula;
$data_registro = $key->dataRegistro;
$data_obito = $key->dataObito;
$estadocivil = $key->estadocivil;
$cidade = $key->cidade_nascimento;
$ordem = $key->strOrdem;
$tipomorte = $key->tipoMorte;
$tipolocalmorte = $key->tipolocalobito;
$causa_morte = $key->causamorteantecedentes	;
$causa_morte_outras = '';
$endereco_estrang = '';
$nome_medico = $key->nomeatestantep;
$crm = $key->crmatestantep;
$declarante = $key->declarante;
$invisivel = $key->setRegistroInvisivel;
$motivo = $key->strMotivoAverbacao;
$datav = $key->dataAverbacao;
$eleitor = $key->eleitor;
$possuibens = $key->deixoubens;


  #--------------------------------------------------------------------

  #CRIANDO AS TAGAS XML:

  # DADOS DO NASCIMENTO -LOOP EM VARIÁVEIS:
    $carga_movimento_xml = $dom->createElement("MOVIMENTOOBITOTO");
      $carga_tipo_registro_xml = $dom->createElement("REGISTROOBITOINCLUSAO");
      $indice_registros1_xml = $dom->createElement("INDICEREGISTRO",$ordem);

			$registro_invisivel_xml = $dom->createElement("REGISTROINVISIVEL",$invisivel);
			$cod_alteracao_xml = $dom->createElement("CODIGOMOTIVOALTERACAO",$motivo);
			$data_averbacao_xml = $dom->createElement("DATAAVERBACAO",$datav);

			$desconhecido_xml = $dom->createElement("FLAGDESCONHECIDO",$flag_desconhecido);
      $nome_registrado_xml = $dom->createElement("NOMEFALECIDO",$nome);

			$cpf_registrado_xml = $dom->createElement("CPFFALECIDO");
      $matricula_xml = $dom->createElement("MATRICULA",$matricula);
      $data_registro_xml = $dom->createElement("DATAREGISTRO",date('d/m/Y', strtotime($data_registro)));
      $nomepai_xml = $dom->createElement("NOMEPAI");
			$cpfpai_xml = $dom->createElement("CPFPAI");
			$sexopai_xml = $dom->createElement("SEXOPAI");
			$nomemae_xml = $dom->createElement("NOMEMAE");
			$cpfmae_xml = $dom->createElement("CPFMAE");
			$sexomae_xml = $dom->createElement("SEXOMAE");
			$dataobito_xml = $dom->createElement("DATAOBITO");
			$horaobito_xml = $dom->createElement("HORAOBITO");
			$sexo_xml = $dom->createElement("SEXO",$sexo);
			$corpelo_xml = $dom->createElement("CORPELE",$cor_pele);
			$estadocivil_xml = $dom->createElement("ESTADOCIVIL");
			$eleitor_xml = $dom->createElement("ELEITOR",$eleitor);
			$possuibens_xml = $dom->createElement("POSSUIBENS",$possuibens);
			$data_nasc_falecido_xml = $dom->createElement("DATANASCIMENTOFALECIDO");
			$idade_falecido_xml = $dom->createElement("IDADE");
			$dados_idade_xml = $dom->createElement("IDADE_DIAS_MESES_ANOS");
			$codigo_ocupacao_xml = $dom->createElement("CODIGOOCUPACAOSDC");
			$pais_falecido_xml = $dom->createElement("PAISNASCIMENTO");
			$nacionalidade_falecido_xml = $dom->createElement("NACIONALIDADE");
			$codibgenatu_falecido_xml = $dom->createElement("CODIGOIBGEMUNNATURALIDADE");
			$textomunnat_falecido_xml = $dom->createElement("TEXTOLIVREMUNICIPIONAT");
			$codibgemunnatu_falecido_xml = $dom->createElement("CODIGOIBGEMUNNATURALIDADE");
			$codlogribge_falecido_xml = $dom->createElement("CODIGOIBGEMUNLOGRADOURO");
			$domextrangeiro_falecido_xml = $dom->createElement("DOMICILIOESTRANGEIROFALECIDO");
			$logradouro_falecido_xml = $dom->createElement("LOGRADOURO");
			$numerologradouro_falecido_xml = $dom->createElement("NUMEROLOGRADOURO");
			$complementologr_falecido_xml = $dom->createElement("COMPLEMENTOLOGRADOURO");
			$bairro_falecido_xml = $dom->createElement("BAIRRO");
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
			$tipolocalobito_xml = $dom->createElement("TIPOLOCALOBITO");
			$tipomorte_xml = $dom->createElement("TIPOMORTE");

			$declaracaoobito_xml = $dom->createElement("NUMDECLARACAOOBITO");
			$numdeclaracaoobito_xml = $dom->createElement("NUMDECLARACAOOBITOIGNORADA");
			$paisobito_xml = $dom->createElement("PAISOBITO");
			$codigo_ibge_mun_nascimento_xml = $dom->createElement("CODIGOIBGEMUNLOGRADOUROOBITO",$cidade);
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
			$lugarfalecimento_xml = $dom->createElement("LUGARFALECIMENTO");
			$lugarsepultura_xml = $dom->createElement("LUGARSEPULTAMENTOCEMITERIO");
			$atestante_primario_xml = $dom->createElement("NOMEATESTANTEPRIMARIO",$nome_medico);
			$crm_xml = $dom->createElement("CRMATESTANTEPRIMARIO",$crm);
			$atestante_secundario_xml = $dom->createElement("NOMEATESTANTESECUNDARIO");
			$crm2_xml = $dom->createElement("CRMATESTANTESECUNDARIO");
			$declarante_xml = $dom->createElement("NOMEDECLARANTE",$declarante);
			$cpf_declarente_xml = $dom->createElement("CPFDECLARANTE");
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

	$carga_tipo_registro_xml->appendChild($cod_alteracao_xml);
	$carga_tipo_registro_xml->appendChild($data_averbacao_xml);
	$carga_tipo_registro_xml->appendChild($registro_invisivel_xml);

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
	$carga_tipo_registro_xml->appendChild($codibgemunnatu_falecido_xml);

	$carga_tipo_registro_xml->appendChild($codlogribge_falecido_xml);
	$carga_tipo_registro_xml->appendChild($domextrangeiro_falecido_xml);
	$carga_tipo_registro_xml->appendChild($logradouro_falecido_xml);
	$carga_tipo_registro_xml->appendChild($numerologradouro_falecido_xml);
	$carga_tipo_registro_xml->appendChild($bairro_falecido_xml);
	$carga_tipo_registro_xml->appendChild($benefiviosprev_falecido_xml);
	$benefiviosprev_falecido_xml->appendChild($indice_benefiviosprev_xml);
	$benefiviosprev_falecido_xml->appendChild($numero_benefiviosprev_xml);
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

	$carga_tipo_registro_xml->appendChild($tipolocalobito_xml);
	$carga_tipo_registro_xml->appendChild($tipomorte_xml);
	$carga_tipo_registro_xml->appendChild($declaracaoobito_xml);
	$carga_tipo_registro_xml->appendChild($numdeclaracaoobito_xml);
	$carga_tipo_registro_xml->appendChild($paisobito_xml);
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
	$carga_tipo_registro_xml->appendChild($orgaoexterior_xml);
	$carga_tipo_registro_xml->appendChild($infoconsulado_xml);
	$carga_tipo_registro_xml->appendChild($obs_falecimento_xml);

  $dom->appendChild($carga_registro_xml);





}

session_start();
$data = date('Y-m-d');
$hora = date('H:i');
$faixa_remessa = 'de '.$data_inicial.' a '.$data_final;
$funcionario = $_SESSION['nome'];
$envio_remessa = $pdo->prepare("INSERT INTO envio_remessas values(null,'$data','$hora','CRC_AVERBACAO_OBITO','$funcionario','PENDENTE','$faixa_remessa')");
$envio_remessa->execute();
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
