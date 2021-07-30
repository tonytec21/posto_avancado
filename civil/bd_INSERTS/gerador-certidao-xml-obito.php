<?php include('../controller/db_functions.php');
$pdo=conectar();
session_start();
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
    if (empty($nascimento)) {
    $idade = ($ano - $ano1)*(-1);
    }
    return $idade;

}

function tirarAcentos($string){
return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/"),explode(" ","a A e E i I o O u U n N C c"),$string);
}
#OBTENDO A CIDADE DA SERVENTIA:-------------------------------------
      $serv = PESQUISA_ALL_ID('cadastroserventia',1);
      foreach ($serv as $serv) {
      $cidade_serv = $serv->intUFcidade;
      $cns = $serv->strCNS;
      }

function linha_vazio($texto){
if ($texto!='' && $texto!=' ') {
return $texto;
}
else{
return 'SEM INFORMAÇÃO';
}
}

#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];

$r = PESQUISA_ALL_ID('registro_obito_novo',$id);
foreach ($r as $r ) {
$matricula = str_replace(" ", "", $r->MATRICULA);
$nome = tirarAcentos($r->NOME);
$cpf = utf8_decode(linha_vazio($r->CPF));
if ($r->SEXO == 'M') {
$sexo =  "Masculino";
} else  {
// code...
$sexo =  "Feminino";
}
if ($r->COR == 'BR') {
$cor = "Branca";
} elseif ($r->COR == 'PR') {

$cor = "Preta";
} elseif ($r->COR == 'PA') {

$cor = "Parda";
} elseif ($r->COR == 'AM') {

$cor = "Amarela";
} elseif($r->COR !='')  {

$cor = "Indígena";
}

else{
$cor = 'SEM INFORMAÇÃO';
}


if ($r->ESTADOCIVIL == 'SO') {
$estadocivil = "Solteiro(a),";
} elseif ($r->ESTADOCIVIL == 'CA') {

$estadocivil = "Casado(a),";
} elseif ($r->ESTADOCIVIL == 'DI') {

$estadocivil = "Divorciado(a),";
} elseif ($r->ESTADOCIVIL == 'VI') {

$estadocivil = "Viúvo(a),";
} 

elseif ($r->ESTADOCIVIL == 'UN') {

$estadocivil = "Em união Estável,";
}

elseif ($r->ESTADOCIVIL != '') {

$estadocivil = "Separado(a),";
}

else{
$estadocivil = 'SEM INFORMAÇÃO';
}


if ($r->DATANASCIMENTO!=''){
$idade  = idade_civil_antigo($r->DATANASCIMENTO,$r->DATAOBITO);
if ($idade == 0) {
$idade = ' 0 anos de idade ';
}
else{
if ($idade == '01' || $idade == '1' || $idade == '21'|| $idade == '31'|| $idade == '41' || $idade == '51'|| $idade == '61' || $idade == '71' || $idade == '81' || $idade == '91') {
$idade = GExtenso::numero($idade)." um anos de idade";
}
else{$idade = GExtenso::numero($idade)." anos de idade";}
}
}

$x = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADE)); foreach ($x as $k){
  $naturalidade = $k->cidade.'/'.$k->uf;
}

$documento_identificacao = linha_vazio($r->RG);


if ($r->ELEITOR == 'S') {
    $eleitor = "Sim";
  } elseif($r->ELEITOR =='N')  {
    // code...
    $eleitor = "Não";
  }

  else{$eleitor = 'SEM INFORMAÇÃO';}


$filiacao ='';
if (!empty($r->NOMEPAI) && $r->NOMEPAI != '' ) {
    $filiacao .= $r->NOMEPAI ;
    $filiacao .= " e " ;
  }
if (!empty($r->NOMEMAE) )   {
    $filiacao .= $r->NOMEMAE ;
  }


$residencia = "Residente e domiciliado(a) ". $r->ENDERECO." ".$r->BAIRRO." em: ";
$x =PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADE)); foreach ($x as $k) {
  $cidade =$k->cidade.'/'.$k->uf ;
}






$data = $r->DATAOBITO ;
  $novaData = explode("-", $data);

  if ($novaData[2] == '01' || $novaData[2] == '1') {
    $data_falecimento_extenso = " Primeiro de  ";
  }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
    $data_falecimento_extenso = " Dois de ";
  } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
    $data_falecimento_extenso = " Três ";
  } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
    $data_falecimento_extenso = " Quatro de ";
  } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
    $data_falecimento_extenso = " Cinco de ";
  } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
    $data_falecimento_extenso = " Seis de ";
  } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
    $data_falecimento_extenso = " Sete de ";
  } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
    $data_falecimento_extenso = " Oito de ";
  } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
    $data_falecimento_extenso = " Nove de ";
  } elseif ($novaData[2] == '01' || $novaData[2] == '1' || $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
    $data_falecimento_extenso =  ucfirst(GExtenso::numero($novaData[2])).'um';
  }
   else {$data_falecimento_extenso =  ucfirst(GExtenso::numero($novaData[2]));}
  //Será exibido na tela a data: 16/02/2015
  // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
  if ($novaData[1] == '01' || $novaData[1] == '1') {
    $data_falecimento_extenso = " de Janeiro de ";
  }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
    $data_falecimento_extenso = " de Fevereiro de ";
  } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
    $data_falecimento_extenso = " de Março de ";
  } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
    $data_falecimento_extenso = " de Abril de ";
  } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
    $data_falecimento_extenso = " de Maio de ";
  } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
    $data_falecimento_extenso = " de Junho de ";
  } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
    $data_falecimento_extenso = " de Julho de ";
  } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
    $data_falecimento_extenso = " de Agosto de ";
  } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
    $data_falecimento_extenso = " de Setembro de ";
  } elseif ($novaData[1] == '10') {
    $data_falecimento_extenso = " de Outubro de ";
  } elseif ($novaData[1] == '11') {
    $data_falecimento_extenso = " de Novembro de ";
  } elseif ($novaData[1] == '12') {
    $data_falecimento_extenso = " de Dezembro de ";
  } else {
    $data_falecimento_extenso = "Não definido";
  }

  $udg = substr($novaData[0], 2,3);
  if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
   $data_falecimento_extenso = GExtenso::numero($novaData[0]).'  um';
  }
  else{
    $data_falecimento_extenso = GExtenso::numero($novaData[0]);
  }



if ($r->HORAOBITO!='' && !empty($r->HORAOBITO)){

  $hora_falecimento = "às ".$r->HORAOBITO." Horas";
}



$data_falecimento = date('d/m/Y', strtotime($r->DATAOBITO));


if (!empty($r->LOCALMORTE)) {
    $local_morte = linha_vazio($r->LOCALMORTE) ;
  } 
if (!empty($r->ENDERECOOBITO)) {
    $endereco_local_morte=  linha_vazio($r->ENDERECOOBITO) ;
  }  
$x =PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEOBITO)); foreach ($x as $k) {
  $cidade_obito =$k->cidade.'/'.$k->uf ;
}

$causa_morte = $r->CAUSAOBITO.", ".$r->CAUSAOBITOB.", ".$r->CAUSAOBITOC.", ".$r->CAUSAOBITOD;
$local_sepultamento = linha_vazio($r->LOCALSEPULTAMENTO);
$nome_declarante = linha_vazio($r->NOMEDECLARANTE);

if (!empty($r->MEDICO)) {
 $medico = $r->MEDICO ;
} 
if (!empty($r->CRM)) {
$crm = " - CRM: ".$r->CRM ;
}


$anotaverb ='';

$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVROOBITO' and strFolha = '$r->FOLHAOBITO' and strTipo = 'OB' and setRegistroInvisivel!='S' ");
$busca_averbacoes->execute();
$ba = $busca_averbacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ba as $ba) {
$anotaverb .= $ba->strAverbacao;
}

$busca_anotacoes = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$r->LIVROOBITO' and FOLHA = '$r->FOLHAOBITO' and strTipo = 'OBT'  ");
$busca_anotacoes->execute();
$ban = $busca_anotacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ban as $ban) {
$anotaverb .= $ban->ANOTACAO;
}

if ($r->AVERBACAOTERMOANTIGO!='') {
  $anotaverb .= $r->AVERBACAOTERMOANTIGO;
}

if (isset($_GET['TEXTOFRASECERTIDAO']) && $_GET['TEXTOFRASECERTIDAO']!='') {
$anotaverb .= $_GET['TEXTOFRASECERTIDAO'];
}



$xml ='<?xml version="1.0" encoding="ISO-8859-1"?>';
$xml .='<certidao>';
$xml .='<numero_cnj>'.$cns.'</numero_cnj>';
$xml .='<emissao>';
$xml .='<nome_falecido>'.$nome.'</nome_falecido>';
$xml .='<cpf_registrado>'.$cpf.'</cpf_registrado>';
$xml .='<matricula>'.$matricula.'</matricula>';
$xml .='<sexo>'.$sexo.'</sexo>';
$xml .='<cor>'.$cor.'</cor>';
$xml .='<estado_civil_idade>'.$estadocivil.','.'$idade'.'</estado_civil_idade>';
$xml .='<naturalidade>'.$naturalidade.'</naturalidade>';
$xml .='<documento_identificacao>'.$documento_identificacao.'</documento_identificacao>';
$xml .='<matricula_nascimento></matricula_nascimento>';
$xml .='<eleitor>'.$eleitor.'</eleitor>';
$xml .='<residencia_filiacao></residencia_filiacao>';
$xml .='<data_hora_falecimento_extenso>'.$data_falecimento_extenso.','. $hora_falecimento.'</data_hora_falecimento_extenso>';
$xml .='<data_falecimento>'.$data_falecimento.'</data_falecimento>';
$xml .='<local_falecimento>'.$local_morte.', '.$endereco_local_morte.', '.$cidade_obito.'</local_falecimento>';
$xml .='<causa_morte>'.$causa_morte.'</causa_morte>';
$xml .='<cemiterio>'.$local_sepultamento.'</cemiterio>';
$xml .='<declarante>'.$nome_declarante.'</declarante>';
$xml .='<nome_numero_medico>'.$medico.','.$crm.'</nome_numero_medico>';
$xml .='<observacoes_averbacoes>'.strip_tags($anotaverb).'</observacoes_averbacoes>';
$xml .='<anotacoes_cadastro>';
$xml .='<registrado>';
$xml .='<cep_res></cep_res>';
$xml .='<grupo_sanguineo></grupo_sanguineo>';
$xml .='<titulo_eleitor>';
$xml .='<numero></numero>';
$xml .='<zona_secao></zona_secao>';
$xml .='<uf></uf>';
$xml .='<municipio></municipio>';
$xml .='</titulo_eleitor>';
$xml .='<documentos>';
$xml .='<documento>';
$xml .='<tipo_doc></tipo_doc>';
$xml .='<numero></numero>';
$xml .='<data_emissao></data_emissao>';
$xml .='<orgao_emissor></orgao_emissor>';
$xml .='<uf_emissao></uf_emissao>';
$xml .='<data_validade></data_validade>';
$xml .='</documento>';
$xml .='</documentos>';
$xml .='</registrado>';
$xml .='</anotacoes_cadastro>';
$xml .='</emissao>';
$xml .='<rejeicao>';
$xml .='<motivo_rejeicao></motivo_rejeicao>';
$xml .='</rejeicao>';
$xml .='</certidao>';




 
}


$xml = tirarAcentos($xml);

$nome_arquivo = '../Remessas/'.$_GET['CODIGOPEDIDOXML'].'.xml';
$nome_arquivo_puro = $_GET['CODIGOPEDIDOXML'].'.xml';
$arquivo = fopen($nome_arquivo, 'w+');
$escrever = fwrite($arquivo, $xml);
fclose($arquivo);

$xmlDoc = new DOMDocument();
$xmlDoc->formatOutput = true;
$xmlDoc->preserveWhiteSpace = false;
$xmlDoc->load($nome_arquivo);
$xmlDoc->save($nome_arquivo);


#download automatico: ---------------------------------------------------------------
ob_clean();
header('Content-type: application/xml');
header('Content-disposition: attachment; filename="'.$nome_arquivo_puro.'"');
readfile($nome_arquivo);


 ?>
