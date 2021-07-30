<?php include('../controller/db_functions.php');
$pdo=conectar();
session_start();
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


function data_nas_extenso($data){
  if ($data!='') {


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
   $datanas .= GExtenso::numero($novaData[0]).'  um';
  }
  else{
    $datanas .= GExtenso::numero($novaData[0]);
  }

return $datanas;
  }

  else{
    return " 'DATA DE NASCIMENTO NAO INFORMADA' ";
  }
}



#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];

$r = PESQUISA_ALL_ID('registro_casamento_novo',$id);
foreach ($r as $r ) {
$matricula = str_replace(" ", "", $r->MATRICULA);
$qualificacaonoivos ='';
$qualificacaonoivos .= mb_convert_case($r->NOMENUBENTE1, MB_CASE_UPPER, "UTF-8").', '.$r->NACIONALIDADENUBENTE1.'(a), ';
$x = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE1)); foreach ($x as $k) :
$qualificacaonoivos .= 'natural de '.$k->cidade.'/'.$k->uf.', nascido (a) em '.data_nas_extenso($r->DATANASCIMENTONUBENTE1).
'Filho(a) de ';

if (!empty($r->NOMEPAINUBENTE1)) {
$qualificacaonoivos .= mb_convert_case($r->NOMEPAINUBENTE1, MB_CASE_UPPER, "UTF-8").'e de ';
}

if (!empty($r->NOMEMAENUBENTE1)) {
$qualificacaonoivos .=  mb_convert_case($r->NOMEMAENUBENTE1, MB_CASE_UPPER, "UTF-8").chr(13).chr(10);
}

endforeach ;



$qualificacaonoivos .= mb_convert_case($r->NOMENUBENTE2, MB_CASE_UPPER, "UTF-8").', '.$r->NACIONALIDADENUBENTE2.'(a), ';
$x = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE2)); foreach ($x as $k) :
$qualificacaonoivos .= 'natural de '.$k->cidade.'/'.$k->uf.', nascido (a) em '.data_nas_extenso($r->DATANASCIMENTONUBENTE2).
'Filho(a) de ';

if (!empty($r->NOMEPAINUBENTE2)) {
$qualificacaonoivos .= mb_convert_case($r->NOMEPAINUBENTE2, MB_CASE_UPPER, "UTF-8").'e de ';
}

if (!empty($r->NOMEMAENUBENTE2)) {
$qualificacaonoivos .=  mb_convert_case($r->NOMEMAENUBENTE2, MB_CASE_UPPER, "UTF-8").chr(13).chr(10);
}

endforeach ;



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
   $datareg .= GExtenso::numero($novaData2[0]).'  um';
  }
  else{
    $datareg .= GExtenso::numero($novaData2[0]);
  }

if (strlen($r->REGIMECASAMENTO)>3) {
$regime_array = explode("@", $r->REGIMECASAMENTO);
$REGIMECASAMENTO = $regime_array[0];
}
else{
$REGIMECASAMENTO = $r->REGIMECASAMENTO; 
} 
if ($REGIMECASAMENTO == 'CP') {
  $regime =  "Comunhão Parcial de Bens";
} elseif ($REGIMECASAMENTO == 'CU') {
  $regime =  "Comunhão Universal de Bens";
}elseif ($REGIMECASAMENTO == 'PF') {
  $regime =  "Participação Final nos Aquestos";
}elseif ($REGIMECASAMENTO == 'SB') {
  $regime =  "Separação Total de Bens";
}elseif ($REGIMECASAMENTO == 'SC') {
  $regime =  "Separação Obrigatória de bens";
}elseif ($REGIMECASAMENTO == 'SO') {
  $regime =  "Separação Convencional de bens";
}elseif ($REGIMECASAMENTO == 'SE') {
  $regime =  "Separação de bens";
}

elseif ($REGIMECASAMENTO == 'CB') {
  // code...
  $regime =  "Comunhão de Bens";
}else {
  $regime =  "Não disponivel";
}

$novosnomes ='';
if (!empty($r->NOMECASADONUBENTE1)) {
  if ($r->NOMECASADONUBENTE1 != $r->NOMENUBENTE1) {
  $novosnomes .=  mb_convert_case($r->NOMECASADONUBENTE1, MB_CASE_UPPER, "UTF-8"). chr(13).chr(10) ;
  }
  else{$novosnomes .='';}

}

if (!empty($r->NOMECASADONUBENTE2)) {
  if ($r->NOMECASADONUBENTE2 != $r->NOMENUBENTE2) {
  $novosnomes .=  mb_convert_case($r->NOMECASADONUBENTE2, MB_CASE_UPPER, "UTF-8") ;
  }
  else{$novosnomes .= '';}

}


$anotaverb ='';

$busca_averbacoes = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$r->LIVROCASAMENTO' and strFolha = '$r->FOLHACASAMENTO' and strTipo = 'CA' and setRegistroInvisivel!='S'");
$busca_averbacoes->execute();
$ba = $busca_averbacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ba as $ba) {
$anotaverb.= addslashes($ba->strAverbacao);
}
/*
$busca_anotacoes = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$r->LIVROCASAMENTO' and FOLHA = '$r->FOLHACASAMENTO' and strTipo = 'CAS'");
$busca_anotacoes->execute();
$ban = $busca_anotacoes->fetchAll(PDO::FETCH_OBJ);
foreach ($ban as $ban) {
$anotaverb.= $ban->ANOTACAO;
}
*/

if ($r->AVERBACAOTERMOANTIGO!='') {
  $anotaverb.= $r->AVERBACAOTERMOANTIGO;
}

if (isset($_GET['TEXTOFRASECERTIDAO']) && $_GET['TEXTOFRASECERTIDAO']!='') {
$anotaverb.= $_GET['TEXTOFRASECERTIDAO'];
}


$separa_antig_averba = explode(chr(13).chr(10), $r->AVERBACAOTERMOANTIGO);
$count_separa = count($separa_antig_averba);

if ($busca_averbacoes->rowCount() != 0 && strlen($r->AVERBACAOTERMOANTIGO) >1) {
$quantidade_averbacoes = $busca_averbacoes->rowCount() + $count_separa ;
}
else{
  $quantidade_averbacoes = '0';
}



$xml ='<?xml version="1.0" encoding="ISO-8859-1"?>';
$xml .='<certidao>';
$xml .='<numero_cnj>'.$cns.'</numero_cnj>';
$xml .='<emissao>';
$xml .='<qtd_averbacoes>'.$quantidade_averbacoes.'</qtd_averbacoes>';
$xml .='<nome_registrado_1>'.mb_convert_case($r->NOMENUBENTE1, MB_CASE_UPPER, "UTF-8").'</nome_registrado_1>';
$xml .='<nome_registrado_2>'.mb_convert_case($r->NOMENUBENTE2, MB_CASE_UPPER, "UTF-8").'</nome_registrado_2>';
$xml .='<cpf_registrado_1>'.$r->CPFNUBENTE1.'</cpf_registrado_1>';
$xml .='<cpf_registrado_2>'.$r->CPFNUBENTE2.'</cpf_registrado_2>';
$xml .='<matricula>'.$matricula.'</matricula>';
$xml .='<nomes_datas_locais>'.$qualificacaonoivos.'</nomes_datas_locais>';
$xml .='<data_registro_extenso>'.$datareg.'</data_registro_extenso>';
$xml .='<data_registro>'.date('d/m/Y', strtotime($r->DATAENTRADA)).'</data_registro>';
$xml .='<regime_bens>'.$regime.'</regime_bens>';
$xml .='<novos_nomes>'.utf8_decode($novosnomes).'</novos_nomes>';
$xml .='<observacoes_averbacoes>'.strip_tags($anotaverb).'</observacoes_averbacoes>';
$xml .='<anotacoes_cadastro>';
$xml .='<registrados>';
$xml .='<registrado_1>';
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
$xml .='</registrado_1>';
$xml .='<registrado_2>';
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
$xml .='</registrado_2>';
$xml .='</registrados>';
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
