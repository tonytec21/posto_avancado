<?php include('../../controller/db_functions.php');
$pdo=conectar();
session_start();
function tirarAcentos($string){
return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/"),explode(" ","a A e E i I o O u U n N C c"),$string);
}


function corrigir_caracteres($string){
return preg_replace(array("/(º|°)/"), explode(" "," ", " "),$string);
}

function remover_espacos($string){
$array_tirar = array("  ", "   ", "    ");  
return str_replace($array_tirar, " ", $string);
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

$r = PESQUISA_ALL_ID('registro_nascimento_novo',$id);
foreach ($r as $r ) {
$matricula = str_replace(" ", "", $r->MATRICULA);
 $data = $r->DATANASCIMENTO ;
  $novaData = explode("-", $data);

  if ($novaData[2] == '01' || $novaData[2] == '1') {
    $datanas = " Primeiro   ";
  }elseif ($novaData[2] == '02' || $novaData[2] == '2') {
    $datanas = " Dois  ";
  } elseif ($novaData[2] == '03' || $novaData[2] == '3') {
    $datanas = " Três ";
  } elseif ($novaData[2] == '04' || $novaData[2] == '4') {
    $datanas = " Quatro  ";
  } elseif ($novaData[2] == '05' || $novaData[2] == '5') {
    $datanas = " Cinco  ";
  } elseif ($novaData[2] == '06' || $novaData[2] == '6') {
    $datanas = " Seis  ";
  } elseif ($novaData[2] == '07' || $novaData[2] == '7') {
    $datanas = " Sete  ";
  } elseif ($novaData[2] == '08' || $novaData[2] == '8') {
    $datanas = " Oito  ";
  } elseif ($novaData[2] == '09' || $novaData[2] == '9') {
    $datanas = " Nove  ";
  }
    elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
    $datanas=  ucfirst(GExtenso::numero($novaData[2])).'um';
  }
   else {$datanas =  ucfirst(GExtenso::numero($novaData[2]));}
  //Será exibido na tela a data: 16/02/2015
  // . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
  if ($novaData[1] == '01' || $novaData[1] == '1') {
    $datanas .= " de Janeiro de ";
  }elseif ($novaData[1] == '02' || $novaData[1] == '2') {
    $datanas .= " de Fevereiro de ";
  } elseif ($novaData[1] == '03' || $novaData[1] == '3') {
    $datanas .= " de Março de ";
  } elseif ($novaData[1] == '04' || $novaData[1] == '4') {
    $datanas .= " de Abril de ";
  } elseif ($novaData[1] == '05' || $novaData[1] == '5') {
    $datanas .= " de Maio de ";
  } elseif ($novaData[1] == '06' || $novaData[1] == '6') {
    $datanas .= " de Junho de ";
  } elseif ($novaData[1] == '07' || $novaData[1] == '7') {
    $datanas .= " de Julho de ";
  } elseif ($novaData[1] == '08' || $novaData[1] == '8') {
    $datanas .= " de Agosto de ";
  } elseif ($novaData[1] == '09' || $novaData[1] == '9') {
    $datanas .= " de Setembro de ";
  } elseif ($novaData[1] == '10') {
    $datanas .= " de Outubro de ";
  } elseif ($novaData[1] == '11') {
    $datanas .= " de Novembro de ";
  } elseif ($novaData[1] == '12') {
    $datanas .= " de Dezembro de ";
  } else {
    $datanas .= "Não definido";
  }
  $udg = substr($novaData[0], 2,3);
  if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
   $datanas .= GExtenso::numero($novaData[0]).'um';
  }
  else{
    $datanas .= GExtenso::numero($novaData[0]);
  }



$x =PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENASCIDO)); foreach ($x as $k) {
  $naturalidade_nascimento = $k->cidade.'/'.$k->uf ;
}

$x =PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENASCIMENTO)); foreach ($x as $k) {
  $cidade_nascimento =$k->cidade.'/'.$k->uf ;
}


$x =PESQUISA_ALL_ID('uf_cidade',intval($cidade_serv)); foreach ($x as $k) {
  $cidade_registro =$k->cidade.'/'.$k->uf ;
}

if ($r->SEXONASCIDO == 'M') {
      $sexo =  "Masculino";
    } else  {
      // code...
      $sexo =  "Feminino";
    }

$filiacao ='';
if (!empty($r->NOMEPAI) && $r->NOMEPAI != '' ) {
    $filiacao .= $r->NOMEPAI ;
    $filiacao .= " e " ;
  }
if (!empty($r->NOMEMAE) )   {
    $filiacao .= $r->NOMEMAE ;
  }


$avos ='';
  if ($r->AVO1PATERNO!='') {
$avos .= $r->AVO1PATERNO.', ';
}
if ($r->AVO2PATERNO!='') {
$avos .= $r->AVO2PATERNO.' e ';
}

if ($r->AVO1MATERNO!='') {
 $avos .= $r->AVO1MATERNO.', ';
}
if ($r->AVO2MATERNO!='') {
$avos .= $r->AVO2MATERNO;
}

if ($r->GEMEOS == 'S') {
      $gemeos = "Sim";
    } else  {
      $gemeos = "Não";
    }

$separa_gemeos = explode(";", $r->NOMEMATRICULAGEMEOS);
if (strlen($r->NOMEMATRICULAGEMEOS) <1 ) {
$count_gemeos = '0';
}
else{
$count_gemeos = count($separa_gemeos);
}

 $data2 = $r->DATAENTRADA ;
  $novaData2 = explode("-", $data2);

  if ($novaData2[2] == '01' || $novaData2[2] == '1') {
    $datareg = " Primeiro   ";
  }elseif ($novaData2[2] == '02' || $novaData2[2] == '2') {
    $datareg = " Dois  ";
  } elseif ($novaData2[2] == '03' || $novaData2[2] == '3') {
    $datareg = " Três ";
  } elseif ($novaData2[2] == '04' || $novaData2[2] == '4') {
    $datareg = " Quatro  ";
  } elseif ($novaData2[2] == '05' || $novaData2[2] == '5') {
    $datareg = " Cinco  ";
  } elseif ($novaData2[2] == '06' || $novaData2[2] == '6') {
    $datareg = " Seis  ";
  } elseif ($novaData2[2] == '07' || $novaData2[2] == '7') {
    $datareg = " Sete  ";
  } elseif ($novaData2[2] == '08' || $novaData2[2] == '8') {
    $datareg = " Oito  ";
  } elseif ($novaData2[2] == '09' || $novaData2[2] == '9') {
    $datareg = " Nove  ";
  }
    elseif ($novaData2[2] == '01' || $novaData2[2] == '1' ||  $novaData2[2] == '21'|| $novaData2[2] == '31'|| $novaData2[2] == '41' || $novaData2[2] == '51'|| $novaData2[2] == '61' || $novaData2[2] == '71' || $novaData2[2] == '81' || $novaData2[2] == '91') {
    $datareg=  ucfirst(GExtenso::numero($novaData2[2])).'um';
  }
   else {$datareg =  ucfirst(GExtenso::numero($novaData2[2]));}
  //Será exibido na tela a data: 16/02/2015
  // . "de".$novaData2[1] . " de " . GExtenso::numero ($novaData2[0])
  if ($novaData2[1] == '01' || $novaData2[1] == '1') {
    $datareg .= " de Janeiro de ";
  }elseif ($novaData2[1] == '02' || $novaData2[1] == '2') {
    $datareg .= " de Fevereiro de ";
  } elseif ($novaData2[1] == '03' || $novaData2[1] == '3') {
    $datareg .= " de Março de ";
  } elseif ($novaData2[1] == '04' || $novaData2[1] == '4') {
    $datareg .= " de Abril de ";
  } elseif ($novaData2[1] == '05' || $novaData2[1] == '5') {
    $datareg .= " de Maio de ";
  } elseif ($novaData2[1] == '06' || $novaData2[1] == '6') {
    $datareg .= " de Junho de ";
  } elseif ($novaData2[1] == '07' || $novaData2[1] == '7') {
    $datareg .= " de Julho de ";
  } elseif ($novaData2[1] == '08' || $novaData2[1] == '8') {
    $datareg .= " de Agosto de ";
  } elseif ($novaData2[1] == '09' || $novaData2[1] == '9') {
    $datareg .= " de Setembro de ";
  } elseif ($novaData2[1] == '10') {
    $datareg .= " de Outubro de ";
  } elseif ($novaData2[1] == '11') {
    $datareg .= " de Novembro de ";
  } elseif ($novaData2[1] == '12') {
    $datareg .= " de Dezembro de ";
  } else {
    $datareg .= "Não definido";
  }
  $udg = substr($novaData2[0], 2,3);
  if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
   $datareg .= GExtenso::numero($novaData2[0]).'um';
  }
  else{
    $datareg .= GExtenso::numero($novaData2[0]);
  }


$anotaverb ='';

$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVRONASCIMENTO' and strFolha = '$r->FOLHANASCIMENTO' and strTipo = 'NA' and setRegistroInvisivel!='S' ");
$busca_averbacoes->execute();
$ba = $busca_averbacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ba as $ba) {
$anotaverb .= strip_tags($ba->strAverbacao);
}

$busca_anotacoes = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$r->LIVRONASCIMENTO' and FOLHA = '$r->FOLHANASCIMENTO' and strTipo = 'NAS'  ");
$busca_anotacoes->execute();
$ban = $busca_anotacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ban as $ban) {
$anotaverb .= strip_tags($ban->ANOTACAO);
}

if ($r->AVERBACAOTERMOANTIGO!='') {
  strip_tags($anotaverb .= $r->AVERBACAOTERMOANTIGO);
}

if (isset($_GET['TEXTOFRASECERTIDAO']) && $_GET['TEXTOFRASECERTIDAO']!='') {
$anotaverb .= strip_tags($_GET['TEXTOFRASECERTIDAO']);
}

$anotaverb = html_entity_decode($anotaverb);

$xml ='<?xml version="1.0" encoding="ISO-8859-1"?>';
$xml .='<certidao>';
$xml .='<numero_cnj>'.$cns.'</numero_cnj>';
$xml .='<emissao>';
$xml .='<nome_crianca>'.mb_convert_case($r->NOMENASCIDO, MB_CASE_UPPER, "UTF-8").'</nome_crianca>';
$xml .='<cpf_registrado>'.utf8_decode(linha_vazio($r->CPFNASCIDO)).'</cpf_registrado>';
$xml .='<matricula>'.utf8_decode(linha_vazio($matricula)).'</matricula>';
$xml .='<data_registro>'.date('d/m/Y', strtotime($r->DATAENTRADA)).'</data_registro>';
$xml .='<data_nascimento_extenso>'.$datanas.'</data_nascimento_extenso>';
$xml .='<data_nascimento>'.date('d/m/Y', strtotime($r->DATANASCIMENTO)).'</data_nascimento>';
$xml .='<hora_nascimento>'.utf8_decode(linha_vazio($r->HORANASCIMENTO)).'</hora_nascimento>';
$xml .='<municipio_nascimento>'.utf8_decode($cidade_nascimento).'</municipio_nascimento>';
$xml .='<municipio_registro>'.utf8_decode($cidade_registro).'</municipio_registro>';
$xml .='<local_nascimento>'.utf8_decode($r->LOCALNASCIMENTO).'</local_nascimento>';
$xml .='<naturalidade>'.utf8_decode($naturalidade_nascimento).'</naturalidade>';
$xml .='<sexo>'.$sexo.'</sexo>';
$xml .='<filiacao>'.utf8_decode($filiacao).'</filiacao>';
$xml .='<avos>'.utf8_decode($avos).'</avos>';
$xml .='<flag_gemeo>'.utf8_decode($gemeos).'</flag_gemeo>';
$xml .='<gemeos>';
$xml .='<qtd_irmaos>'.$count_gemeos.'</qtd_irmaos>';

for ($i=0; $i <count($separa_gemeos) ; $i++) {

if (isset($separa_gemeos[$i])) {
$xml .='<irmao>';
$xml .='<nome_matricula>'.$separa_gemeos[$i].'</nome_matricula>';
$xml .='</irmao>';
}
}
if(count($separa_gemeos == 0)){
$xml .='<irmao>';
$xml .='<nome_matricula></nome_matricula>';
$xml .='</irmao>';
}
$xml .='</gemeos>';
$xml .='<data_registro_extenso>'.$datareg.'</data_registro_extenso>';
$xml .='<numero_dnv>'.utf8_decode(linha_vazio($r->DNV)).'</numero_dnv>';
$xml .='<observacoes_averbacoes>'.$anotaverb.'</observacoes_averbacoes>';
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

$xml = corrigir_caracteres($xml);
$xml = remover_espacos($xml);
$xml = tirarAcentos($xml);



$nome_arquivo = '../../arquivos/'.$r->NOMENASCIDO.'.xml';
$nome_arquivo_puro = $r->NOMENASCIDO.'.xml';
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
