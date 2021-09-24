<?php

include('conexao.php');
error_reporting(0);
ini_set('display_errors', 0);
#PESQUISA NO BANCO:
#----------------------------------------------------------

function PESQUISA_ALL($tabela){

$pdo = conectar();
$busca = $pdo->prepare("select * from $tabela ");
$busca->execute();
$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
if ($busca->execute()) {
return $linhas;
}

else{
	//echo $busca->errorInfo();
}
}

function PESQUISA_ALL_ID ($tabela, $id){

$pdo = conectar();
$busca = $pdo->prepare("select * from $tabela where id = $id ");
$busca->execute();
$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
if ($busca->execute()) {
return $linhas;
}

else{
	echo $busca->errorInfo();
}
}

function PESQUISA_ALL_CAMPO ($tabela, $campo, $valor){

$pdo = conectar();
$busca = $pdo->prepare("select * from $tabela where $campo = '$valor' ");
$busca->execute();
$linhas = $busca->fetchall(PDO::FETCH_OBJ);
if ($busca->execute()) {
return $linhas;
}

else{
	echo $busca->errorInfo();
}
}
#PESQUISA EXCLUSIVA:
#----------------------------------------------------------

function PESQUISA_CAMPO_ID ($tabela, $id,$campo){

$pdo = conectar();
$busca = $pdo->prepare("select $campo from $tabela where id = $id ");
$busca->execute();
$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
if ($busca->execute()) {
return $linhas;
}

else{
	$linhas = 'Erro!!!';
	echo $linhas;
	echo $busca->errorInfo();
}
}


#INSERIR NO BANCO VARIÁVEIS POST:BOOKC_#$cart00001
#----------------------------------------------------------


function INSERT_POST($tabela, $dados) {

$con = conectar();
foreach ($dados as $key => $val) {
   $campo[] = $key;
   $valor[] = "'$val'";
   $campos = implode(",", $campo);
   $valores = implode(',', $valor);


}
$campo = implode(',', $campo);
$valor = implode(',', $valor);

$inserir = $con->prepare("INSERT INTO $tabela($campo) VALUES($valor)");
if ($inserir->execute()) {
$_SESSION['sucesso'] = 'INSERIDO COM SUCESSO!';

}

else {
  $_SESSION['erro'] = 'ERRO!!! POR FAVOR VERIFIQUE O PROCEDIMENTO FEITO E TENTE NOVAMENTE!';

}

}



#DESCOBRI CAMPOS DA TABELA
#----------------------------------------------------------

function DESC_TABELA_TELA($tabela){

$pdo = conectar();
$DESC = $pdo->prepare("DESC $tabela");
$DESC->execute();
$linhas = $DESC->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas as $key) {
echo $key->Field.'<br>';
}
}

function DESC_TABELA_INPUT($tabela){
$pdo = conectar();
$DESC = $pdo->prepare("DESC $tabela");
$DESC->execute();
$linhas = $DESC->fetchAll(PDO::FETCH_OBJ);
return $linhas;

}

#UPDATE POR ID:
#----------------------------------------------------------

function UPDATE_CAMPO_ID($tabela,$campo,$valor,$id)
{

$pdo = conectar();
$update = $pdo->prepare("update $tabela set $campo = '$valor' where id = '$id'");

if ($update->execute()) {
	$_SESSION['sucesso'] = 'ALTERADO COM SUCESSO!';

}
else{

	 $_SESSION['erro'] = 'ATENÇÃO, ALGUNS DADOS NÃO INSERIDOS, VEJA O PROCEDIMENTO OU ENTRE EM CONTATO COM O SUPORTE'.'<br>'.$campo;
}
}

function SEARCH_TYPE($TABLE,$TYPE,$NAME_TYPE){

	$pdo = conectar();
	$search_all = $pdo->prepare("select * from $TABLE where $TYPE = '$NAME_TYPE'");
	$search_all->execute();
	$row = $search_all->fetchAll(PDO::FETCH_ASSOC);

	if ($search_all->execute()) {
		return $row;
	}
	else{
		return $error = $search_all->errorInfo();
	}
}

//echo date('d/m/Y', strtotime($r->dataNascimento));
//Função calcular idade
function calculo_idade($data) {
    //Data atual
    $dia = date('d');
    $mes = date('m');
    $ano = date('Y');
    //Data do aniversário
    //$nascimento = explode('/', $data);
  //  $dianasc = ($nascimento[0]);
//$mesnasc = ($nascimento[1]);
  //  $anonasc = ($nascimento[2]);
    // se for formato do banco, use esse código em vez do de cima!

    $nascimento = explode('-', $data);
    $dianasc = ($nascimento[2]);
    $mesnasc = ($nascimento[1]);
    $anonasc = ($nascimento[0]);

    //Calculando sua idade
    $idade = $ano - $anonasc; // simples, ano- nascimento!
    if ($mes < $mesnasc) // se o mes é menor, só subtrair da idade
    {
        $idade--;
        return $idade;
    }
    elseif ($mes == $mesnasc && $dia <= $dianasc) // se esta no mes do aniversario mas não passou ou chegou a data, subtrai da idade
    {
        $idade--;
        return $idade;
    }
    else // ja fez aniversario no ano, tudo certo!
    {
        return $idade;
    }
}


function calculo_idade_obito($data,$datafin) {
    //Data atual
    $obito = explode('-', $datafin);
    $diaobt = ($obito[2]);
    $mesobt = ($obito[1]);
    $anoobt = ($obito[0]);

    //Data do aniversário
    //$nascimento = explode('/', $data);
  //  $dianasc = ($nascimento[0]);
//$mesnasc = ($nascimento[1]);
  //  $anonasc = ($nascimento[2]);
    // se for formato do banco, use esse código em vez do de cima!

    $nascimento = explode('-', $data);
    $dianasc = ($nascimento[2]);
    $mesnasc = ($nascimento[1]);
    $anonasc = ($nascimento[0]);

    //Calculando sua idade
    $idade = $anoobt - $anonasc; // simples, ano- nascimento!
    if ($mesobt < $mesnasc) // se o mes é menor, só subtrair da idade
    {
        $idade--;
        return $idade;
    }
    elseif ($mesobt == $mesnasc && $diaobt <= $dianasc) // se esta no mes do aniversario mas não passou ou chegou a data, subtrai da idade
    {
        $idade--;
        return $idade;
    }
    else // ja fez aniversario no ano, tudo certo!
    {
        return $idade;
    }
}


/*
function UPDATE_POST_ID($tabela, $dados,$id) {

$con = conectar();
foreach ($dados as $key => $val) {
   $campo[] = $key;
   $valor[] = "'$val'";
   $campos = implode(",", $campo);
   $valores = implode(',', $valor);


}
$campo = implode(',', $campo);
$valor = implode(',', $valor);

$update = $con->prepare("UPDATE $tabela set $campo ='$valor'");
if ($update->execute()) {
$_SESSION['sucesso'] = 'INSERIDO COM SUCESSO!';

}

else {
  $_SESSION['erro'] = 'ERRO!!! POR FAVOR VERIFIQUE O PROCEDIMENTO FEITO E TENTE NOVAMENTE!';

}

}
*/
#---------------------------------------------------------------


#---- Função abaixo esvreve o numero por extenso

#funcao de preencher fieldsets quando estiverem vazios:
function preenche_vazio($vetor, $posicao){
  if ($vetor->$posicao == '') {
    $vetor->$posicao = '<br>';
  }
}


class Monetary {

  private static $unidades = array("um", "dois", "três", "quatro", "cinco", "seis", "sete", "oito", "nove", "dez", "onze", "doze",
    "treze", "quatorze", "quinze", "dezesseis", "dezessete", "dezoito", "dezenove");
  private static $dezenas = array("dez", "vinte", "trinta", "quarenta", "cinquenta", "sessenta", "setenta", "oitenta", "noventa");
  private static $centenas = array("cem", "duzentos", "trezentos", "quatrocentos", "quinhentos",
    "seiscentos", "setecentos", "oitocentos", "novecentos");
  private static $milhares = array(
    array("text" => "mil", "start" => 1000, "end" => 999999, "div" => 1000),
    array("text" => "milhão", "start" => 1000000, "end" => 1999999, "div" => 1000000),
    array("text" => "milhões", "start" => 2000000, "end" => 999999999, "div" => 1000000),
    array("text" => "bilhão", "start" => 1000000000, "end" => 1999999999, "div" => 1000000000),
    array("text" => "bilhões", "start" => 2000000000, "end" => 2147483647, "div" => 1000000000)
  );

  const MIN = 0.01;
  const MAX = 2147483647.99;
  const MOEDA = " real ";
  const MOEDAS = " reais ";
  const CENTAVO = " centavo ";
  const CENTAVOS = " centavos ";

  static
  function numberToExt($number, $moeda = true) {
    if ($number >= self::MIN && $number <= self::MAX) {
      $value = self::conversionR((int) $number);
      if ($moeda) {
        if (floor($number) == 1) {
          $value.= self::MOEDA;
        } else if (floor($number) > 1)
          $value.= self::MOEDAS;
      }

      $decimals = self::extractDecimals($number);
      if ($decimals > 0.00) {
        $decimals = round($decimals * 100);
        $value.= " e ".self::conversionR($decimals);
        if ($moeda) {
          if ($decimals == 1) {
            $value.= self::CENTAVO;
          } else if ($decimals > 1)
            $value.= self::CENTAVOS;
        }
      }
    }
    return trim($value);
  }

  private static
  function extractDecimals($number) {
    return $number - floor($number);
  }

  static
  function conversionR($number) {
    if (in_array($number, range(1, 19))) {
      $value = self::$unidades[$number - 1];
    } else if (in_array($number, range(20, 90, 10))) {
      $value = self::$dezenas[floor($number / 10) - 1].
      " ";
    } else if (in_array($number, range(21, 99))) {
      $value = self::$dezenas[floor($number / 10) - 1].
      " e ".self::conversionR($number % 10);
    } else if (in_array($number, range(100, 900, 100))) {
      $value = self::$centenas[floor($number / 100) - 1].
      " ";
    } else if (in_array($number, range(101, 199))) {
      $value = ' cento e '.self::conversionR($number % 100);
    } else if (in_array($number, range(201, 999))) {
      $value = self::$centenas[floor($number / 100) - 1].
      " e ".self::conversionR($number % 100);
    } else {
      foreach(self::$milhares as $item) {
        if ($number >= $item['start'] && $number <= $item['end']) {
          $value = self::conversionR(floor($number / $item['div'])).
          " ".$item['text'].
          " ".self::conversionR($number % $item['div']);
          break;
        }
      }
    }
    return $value;
  }

}



# FUNÃO PARA LIMPAR TODOS OS ARQUIVOS DE UMA PASTA ESPECÍFICA BASTA ESPECIFICAR O CAMINHO:
# -- PS: ESTOU USANDO ELA PARA LIMPAR OS QR DA PASTA QRIMAGENS


function limpa_pasta($pasta){

    $pasta = $pasta;

    if(is_dir($pasta)){

                $diretorio = dir($pasta);
                while ($arquivo = $diretorio->read()) {
                    if(($arquivo != '.') && ($arquivo != '..')){
                        unlink($pasta.$arquivo);
                    }
                }
        $diretorio->close();
    }
    else{
         echo 'A pasta não existe.';
    }



}

function infoValida($string){

  if(isset($string) &&  !empty($string)   ){


    $string =  $string;
  }else{

    $string = NULL;
  }

  return $string;

}

  #Função para corrigir acentos e caracteres especiais do selador
  function caracteres_selador($string)
  {
    $utf8_ansi2 = array(
      "u00c0" =>"À","u00c1" =>"Á","u00c2" =>"Â",
      "u00c3" =>"Ã","u00c4" =>"Ä","u00c5" =>"Å",
      "u00c6" =>"Æ","u00c7" =>"Ç","u00c8" =>"È",
      "u00c9" =>"É","u00ca" =>"Ê","u00cb" =>"Ë",
      "u00cc" =>"Ì","u00cd" =>"Í","u00ce" =>"Î",
      "u00cf" =>"Ï","u00d1" =>"Ñ","u00d2" =>"Ò",
      "u00d3" =>"Ó","u00d4" =>"Ô","u00d5" =>"Õ",
      "u00d6" =>"Ö","u00d8" =>"Ø","u00d9" =>"Ù",
      "u00da" =>"Ú","u00db" =>"Û","u00dc" =>"Ü",
      "u00dd" =>"Ý","u00df" =>"ß","u00e0" =>"à",
      "u00e1" =>"á","u00e2" =>"â","u00e3" =>"ã",
      "u00e4" =>"ä","u00e5" =>"å","u00e6" =>"æ",
      "u00e7" =>"ç","u00e8" =>"è","u00e9" =>"é",
      "u00ea" =>"ê","u00eb" =>"ë","u00ec" =>"ì",
      "u00ed" =>"í","u00ee" =>"î","u00ef" =>"ï",
      "u00f0" =>"ð","u00f1" =>"ñ","u00f2" =>"ò",
      "u00f3" =>"ó","u00f4" =>"ô","u00f5" =>"õ",
      "u00f6" =>"ö","u00f8" =>"ø","u00f9" =>"ù",
      "u00fa" =>"ú","u00fb" =>"û","u00fc" =>"ü",
      "u00fd" =>"ý","u2013" => "–","u00ff" =>"ÿ");
      return strtr($string, $utf8_ansi2);
  }


  function corrigirACENTO_utf8($string){
    // return utf8_encode($string);
    $utf8_ansi = array(
    "00c0" =>"À",
    "00c1" =>"Á",
    "00c2" =>"Â",
    "00c3" =>"Ã",
    "00c4" =>"Ä",
    "00c5" =>"Å",
    "00c6" =>"Æ",
    "00c7" =>"Ç",
    "00c8" =>"È",
    "00c9" =>"É",
    "00ca" =>"Ê",
    "00cb" =>"Ë",
    "00cc" =>"Ì",
    "00cd" =>"Í",
    "00ce" =>"Î",
    "00cf" =>"Ï",
    "00d1" =>"Ñ",
    "00d2" =>"Ò",
    "00d3" =>"Ó",
    "00d4" =>"Ô",
    "00d5" =>"Õ",
    "00d6" =>"Ö",
    "00d8" =>"Ø",
    "00d9" =>"Ù",
    "00da" =>"Ú",
    "00db" =>"Û",
    "00dc" =>"Ü",
    "00dd" =>"Ý",
    "00df" =>"ß",
    "00e0" =>"à",
    "00e1" =>"á",
    "00e2" =>"â",
    "00e3" =>"ã",
    "00e4" =>"ä",
    "00e5" =>"å",
    "00e6" =>"æ",
    "00e7" =>"ç",
    "00e8" =>"è",
    "00e9" =>"é",
    "00ea" =>"ê",
    "00eb" =>"ë",
    "00ec" =>"ì",
    "00ed" =>"í",
    "00ee" =>"î",
    "00ef" =>"ï",
    "00f0" =>"ð",
    "00f1" =>"ñ",
    "00f2" =>"ò",
    "00f3" =>"ó",
    "00f4" =>"ô",
    "00f5" =>"õ",
    "00f6" =>"ö",
    "00f8" =>"ø",
    "00f9" =>"ù",
    "00fa" =>"ú",
    "00fb" =>"û",
    "00fc" =>"ü",
    "00fd" =>"ý",
    "00ff" =>"ÿ",
    "u2013" => "–");
    
    return strtr($string, $utf8_ansi);
    }
    function corrigir_acento_m1($string) {
      $utf8_ansi2 = array(
        "\u00c0" =>"À",
        "\u00c1" =>"Á",
        "\u00c2" =>"Â",
        "\u00c3" =>"Ã",
        "\u00c4" =>"Ä",
        "\u00c5" =>"Å",
        "\u00c6" =>"Æ",
        "\u00c7" =>"Ç",
        "\u00c8" =>"È",
        "\u00c9" =>"É",
        "\u00ca" =>"Ê",
        "\u00cb" =>"Ë",
        "\u00cc" =>"Ì",
        "\u00cd" =>"Í",
        "\u00ce" =>"Î",
        "\u00cf" =>"Ï",
        "\u00d1" =>"Ñ",
        "\u00d2" =>"Ò",
        "\u00d3" =>"Ó",
        "\u00d4" =>"Ô",
        "\u00d5" =>"Õ",
        "\u00d6" =>"Ö",
        "\u00d8" =>"Ø",
        "\u00d9" =>"Ù",
        "\u00da" =>"Ú",
        "\u00db" =>"Û",
        "\u00dc" =>"Ü",
        "\u00dd" =>"Ý",
        "\u00df" =>"ß",
        "\u00e0" =>"à",
        "\u00e1" =>"á",
        "\u00e2" =>"â",
        "\u00e3" =>"ã",
        "\u00e4" =>"ä",
        "\u00e5" =>"å",
        "\u00e6" =>"æ",
        "\u00e7" =>"ç",
        "\u00e8" =>"è",
        "\u00e9" =>"é",
        "\u00ea" =>"ê",
        "\u00eb" =>"ë",
        "\u00ec" =>"ì",
        "\u00ed" =>"í",
        "\u00ee" =>"î",
        "\u00ef" =>"ï",
        "\u00f0" =>"ð",
        "\u00f1" =>"ñ",
        "\u00f2" =>"ò",
        "\u00f3" =>"ó",
        "\u00f4" =>"ô",
        "\u00f5" =>"õ",
        "\u00f6" =>"ö",
        "\u00f8" =>"ø",
        "\u00f9" =>"ù",
        "\u00fa" =>"ú",
        "\u00fb" =>"û",
        "\u00fc" =>"ü",
        "\u00fd" =>"ý",
        "\u00ff" =>"ÿ");
    
        return strtr($string, $utf8_ansi2);
    
    
    }
    
    function corrigir_acento_m2($string) {
      $utf8_ansi2 = array(
        "\U00C0" =>"À",
        "\U00C1" =>"Á",
        "\U00C2" =>"Â",
        "\U00C3" =>"Ã",
        "\U00C4" =>"Ä",
        "\U00C5" =>"Å",
        "\U00C6" =>"Æ",
        "\U00C7" =>"Ç",
        "\U00C8" =>"È",
        "\U00C9" =>"É",
        "\U00CA" =>"Ê",
        "\U00CB" =>"Ë",
        "\U00CC" =>"Ì",
        "\U00CD" =>"Í",
        "\U00CE" =>"Î",
        "\U00CF" =>"Ï",
        "\U00D1" =>"Ñ",
        "\U00D2" =>"Ò",
        "\U00D3" =>"Ó",
        "\U00D4" =>"Ô",
        "\U00D5" =>"Õ",
        "\U00D6" =>"Ö",
        "\U00D8" =>"Ø",
        "\U00D9" =>"Ù",
        "\U00DA" =>"Ú",
        "\U00DB" =>"Û",
        "\U00DC" =>"Ü",
        "\U00DD" =>"Ý",
        "\U00DF" =>"ß",
        "\U00E0" =>"à",
        "\U00E1" =>"á",
        "\U00E2" =>"â",
        "\U00E3" =>"ã",
        "\U00E4" =>"ä",
        "\U00E5" =>"å",
        "\U00E6" =>"æ",
        "\U00E7" =>"ç",
        "\U00E8" =>"è",
        "\U00E9" =>"é",
        "\U00EA" =>"ê",
        "\U00EB" =>"ë",
        "\U00EC" =>"ì",
        "\U00ED" =>"í",
        "\U00EE" =>"î",
        "\U00EF" =>"ï",
        "\U00F0" =>"ð",
        "\U00F1" =>"ñ",
        "\U00F2" =>"ò",
        "\U00F3" =>"ó",
        "\U00F4" =>"ô",
        "\U00F5" =>"õ",
        "\U00F6" =>"ö",
        "\U00F8" =>"ø",
        "\U00F9" =>"ù",
        "\U00FA" =>"ú",
        "\U00FB" =>"û",
        "\U00FC" =>"ü",
        "\U00FD" =>"ý",
        "\U00FF" =>"ÿ");
    
        return strtr($string, $utf8_ansi2);
    
    
    }
    
    function corrigir_acento_m3($string) {
      $utf8_ansi2 = array(
        "U00C0" =>"À",
        "U00C1" =>"Á",
        "U00C2" =>"Â",
        "U00C3" =>"Ã",
        "U00C4" =>"Ä",
        "U00C5" =>"Å",
        "U00C6" =>"Æ",
        "U00C7" =>"Ç",
        "U00C8" =>"È",
        "U00C9" =>"É",
        "U00CA" =>"Ê",
        "U00CB" =>"Ë",
        "U00CC" =>"Ì",
        "U00CD" =>"Í",
        "U00CE" =>"Î",
        "U00CF" =>"Ï",
        "U00D1" =>"Ñ",
        "U00D2" =>"Ò",
        "U00D3" =>"Ó",
        "U00D4" =>"Ô",
        "U00D5" =>"Õ",
        "U00D6" =>"Ö",
        "U00D8" =>"Ø",
        "U00D9" =>"Ù",
        "U00DA" =>"Ú",
        "U00DB" =>"Û",
        "U00DC" =>"Ü",
        "U00DD" =>"Ý",
        "U00DF" =>"ß",
        "U00E0" =>"à",
        "U00E1" =>"á",
        "U00E2" =>"â",
        "U00E3" =>"ã",
        "U00E4" =>"ä",
        "U00E5" =>"å",
        "U00E6" =>"æ",
        "U00E7" =>"ç",
        "U00E8" =>"è",
        "U00E9" =>"é",
        "U00EA" =>"ê",
        "U00EB" =>"ë",
        "U00EC" =>"ì",
        "U00ED" =>"í",
        "U00EE" =>"î",
        "U00EF" =>"ï",
        "U00F0" =>"ð",
        "U00F1" =>"ñ",
        "U00F2" =>"ò",
        "U00F3" =>"ó",
        "U00F4" =>"ô",
        "U00F5" =>"õ",
        "U00F6" =>"ö",
        "U00F8" =>"ø",
        "U00F9" =>"ù",
        "U00FA" =>"ú",
        "U00FB" =>"û",
        "U00FC" =>"ü",
        "U00FD" =>"ý",
        "U00FF" =>"ÿ");
    
        return strtr($string, $utf8_ansi2);
    
    
    }
    
    function corrigir_acento_m4($string) {
      $utf8_ansi2 = array(
        "u00c0" =>"À",
        "u00c1" =>"Á",
        "u00c2" =>"Â",
        "u00c3" =>"Ã",
        "u00c4" =>"Ä",
        "u00c5" =>"Å",
        "u00c6" =>"Æ",
        "u00c7" =>"Ç",
        "u00c8" =>"È",
        "u00c9" =>"É",
        "u00ca" =>"Ê",
        "u00cb" =>"Ë",
        "u00cc" =>"Ì",
        "u00cd" =>"Í",
        "u00ce" =>"Î",
        "u00cf" =>"Ï",
        "u00d1" =>"Ñ",
        "u00d2" =>"Ò",
        "u00d3" =>"Ó",
        "u00d4" =>"Ô",
        "u00d5" =>"Õ",
        "u00d6" =>"Ö",
        "u00d8" =>"Ø",
        "u00d9" =>"Ù",
        "u00da" =>"Ú",
        "u00db" =>"Û",
        "u00dc" =>"Ü",
        "u00dd" =>"Ý",
        "u00df" =>"ß",
        "u00e0" =>"à",
        "u00e1" =>"á",
        "u00e2" =>"â",
        "u00e3" =>"ã",
        "u00e4" =>"ä",
        "u00e5" =>"å",
        "u00e6" =>"æ",
        "u00e7" =>"ç",
        "u00e8" =>"è",
        "u00e9" =>"é",
        "u00ea" =>"ê",
        "u00eb" =>"ë",
        "u00ec" =>"ì",
        "u00ed" =>"í",
        "u00ee" =>"î",
        "u00ef" =>"ï",
        "u00f0" =>"ð",
        "u00f1" =>"ñ",
        "u00f2" =>"ò",
        "u00f3" =>"ó",
        "u00f4" =>"ô",
        "u00f5" =>"õ",
        "u00f6" =>"ö",
        "u00f8" =>"ø",
        "u00f9" =>"ù",
        "u00fa" =>"ú",
        "u00fb" =>"û",
        "u00fc" =>"ü",
        "u00fd" =>"ý",
        "u00ff" =>"ÿ");
    
        return strtr($string, $utf8_ansi2);
    
    
    }
    

 ?>
