<?php

include('conexao.php');

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




 ?>
 <?php require_once('funcoes.php') ?>

 