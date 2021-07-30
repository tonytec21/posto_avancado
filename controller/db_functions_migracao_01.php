<?php

include('conexao_migracao_01.php');

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


<?php 

 /**
   * RTF parser/formatter
   *
   * This code reads RTF files and formats the RTF data to HTML.
   *
   * PHP version 5
   *
   * @author   Alexander van Oostenrijk
   * @copyright  2014 Alexander van Oostenrijk
   * @license GNU
   * @version 1
   * @link     http://www.independent-software.com
   *
   * Sample of use:
   *
   * $reader = new RtfReader();
   * $rtf = file_get_contents("test.rtf"); // or use a string
   * $reader->Parse($rtf);
   * //$reader->root->dump(); // to see what the reader read
   * $formatter = new RtfHtml();
   * echo $formatter->Format($reader->root);
   */

class RtfElement
{
  protected function Indent($level)
  {
    for($i = 0; $i < $level * 2; $i++) echo "&nbsp;";
  }
}

class RtfGroup extends RtfElement
{
  public $parent;
  public $children;

  public function __construct()
  {
    $this->parent = null;
    $this->children = array();
  }

  public function GetType()
  {
    // No children?
    if(sizeof($this->children) == 0) return null;
    // First child not a control word?
    $child = $this->children[0];
    if(get_class($child) != "RtfControlWord") return null;
    return $child->word;
  }

  public function IsDestination()
  {
    // No children?
    if(sizeof($this->children) == 0) return null;
    // First child not a control symbol?
    $child = $this->children[0];
    if(get_class($child) != "RtfControlSymbol") return null;
    return $child->symbol == '*';
  }

  public function dump($level = 0)
  {
    echo "<div>";
    $this->Indent($level);
    echo "{";
    echo "</div>";

    foreach($this->children as $child)
    {
    if(get_class($child) == "RtfGroup")
    {
      if ($child->GetType() == "fonttbl") continue;
      if ($child->GetType() == "colortbl") continue;
      if ($child->GetType() == "stylesheet") continue;
      if ($child->GetType() == "info") continue;
      // Skip any pictures:
      if (substr($child->GetType(), 0, 4) == "pict") continue;
      if ($child->IsDestination()) continue;
    }
    $child->dump($level + 2);
    }

    echo "<div>";
    $this->Indent($level);
    echo "}";
    echo "</div>";
  }
}

class RtfControlWord extends RtfElement
{
  public $word;
  public $parameter;

  public function dump($level)
  {
    echo "<div style='color:green'>";
    $this->Indent($level);
    echo "WORD {$this->word} ({$this->parameter})";
    echo "</div>";
  }
}

class RtfControlSymbol extends RtfElement
{
  public $symbol;
  public $parameter = 0;

  public function dump($level)
  {
    echo "<div style='color:blue'>";
    $this->Indent($level);
    echo "SYMBOL {$this->symbol} ({$this->parameter})";
    echo "</div>";
  }
}

class RtfText extends RtfElement
{
  public $text;

  public function dump($level)
  {
    echo "<div style='color:red'>";
    $this->Indent($level);
    echo "TEXT {$this->text}";
    echo "</div>";
  }
}

class RtfReader
{
  public $root = null;

  protected function GetChar()
  {
    if (isset($this->rtf[$this->pos])) {
    $this->char = $this->rtf[$this->pos++];
  }
  }

  protected function ParseStartGroup()
  {
    // Store state of document on stack.
    $group = new RtfGroup();
    if($this->group != null) $group->parent = $this->group;
    if($this->root == null)
    {
    $this->group = $group;
    $this->root = $group;
    }
    else
    {
    array_push($this->group->children, $group);
    $this->group = $group;
    }
  }

  protected function is_letter()
  {
    if(ord($this->char) >= 65 && ord($this->char) <= 90) return TRUE;
    if(ord($this->char) >= 97 && ord($this->char) <= 122) return TRUE;
    return FALSE;
  }

  protected function is_digit()
  {
    if(ord($this->char) >= 48 && ord($this->char) <= 57) return TRUE;
    return FALSE;
  }

  protected function ParseEndGroup()
  {
    // Retrieve state of document from stack.
    $this->group = $this->group->parent;
  }

  protected function ParseControlWord()
  {
    $this->GetChar();
    $word = "";

    while($this->is_letter())
    {
    $word .= $this->char;
    $this->GetChar();
    }

    // Read parameter (if any) consisting of digits.
    // Paramater may be negative.
    $parameter = null;
    $negative = false;
    if($this->char == '-')
    {
    $this->GetChar();
    $negative = true;
    }
    while($this->is_digit())
    {
    if($parameter == null) $parameter = 0;
    $parameter = $parameter * 10 + $this->char;
    $this->GetChar();
    }
    if($parameter === null) $parameter = 1;
    if($negative) $parameter = -$parameter;

    // If this is \u, then the parameter will be followed by
    // a character.
    if($word == "u")
    {
    }
    // If the current character is a space, then
    // it is a delimiter. It is consumed.
    // If it's not a space, then it's part of the next
    // item in the text, so put the character back.
    else
    {
    if($this->char != ' ') $this->pos--;
    }

    $rtfword = new RtfControlWord();
    $rtfword->word = $word;
    $rtfword->parameter = $parameter;
    array_push($this->group->children, $rtfword);
  }

  protected function ParseControlSymbol()
  {
    // Read symbol (one character only).
    $this->GetChar();
    $symbol = $this->char;

    // Symbols ordinarily have no parameter. However,
    // if this is \', then it is followed by a 2-digit hex-code:
    $parameter = 0;
    if($symbol == '\'')
    {
    $this->GetChar();
    $parameter = $this->char;
    $this->GetChar();
    $parameter = hexdec($parameter . $this->char);
    }

    $rtfsymbol = new RtfControlSymbol();
    $rtfsymbol->symbol = $symbol;
    $rtfsymbol->parameter = $parameter;
    array_push($this->group->children, $rtfsymbol);
  }

  protected function ParseControl()
  {
    // Beginning of an RTF control word or control symbol.
    // Look ahead by one character to see if it starts with
    // a letter (control world) or another symbol (control symbol):
    $this->GetChar();
    $this->pos--;
    if($this->is_letter())
    $this->ParseControlWord();
    else
    $this->ParseControlSymbol();
  }

  protected function ParseText()
  {
    // Parse plain text up to backslash or brace,
    // unless escaped.
    $text = "";

    do
    {
    $terminate = false;
    $escape = false;

    // Is this an escape?
    if($this->char == '\\')
    {
      // Perform lookahead to see if this
      // is really an escape sequence.
      $this->GetChar();
      switch($this->char)
      {
      case '\\': $text .= '\\'; break;
      case '{':  $text .= '{';  break;
      case '}':  $text .= '}';  break;
      default:
        // Not an escape. Roll back.
        $this->pos = $this->pos - 2;
        $terminate = true;
        break;
      }
    }
    else if($this->char == '{' || $this->char == '}')
    {
      $this->pos--;
      $terminate = true;
    }

    if(!$terminate && !$escape)
    {
      $text .= $this->char;
      $this->GetChar();
    }
    }
    while(!$terminate && $this->pos < $this->len);

    $rtftext = new RtfText();
    $rtftext->text = $text;

    // If group does not exist, then this is not a valid RTF file. Throw an exception.
    if($this->group == NULL) {
    throw new Exception();
    }

    array_push($this->group->children, $rtftext);
  }

  /*
   * Attempt to parse an RTF string. Parsing returns TRUE on success or FALSE on failure
   */
  public function Parse($rtf)
  {
    try {
    $this->rtf = $rtf;
    $this->pos = 0;
    $this->len = strlen($this->rtf);
    $this->group = null;
    $this->root = null;

    while($this->pos < $this->len)
    {
      // Read next character:
      $this->GetChar();

      // Ignore \r and \n
      if($this->char == "\n" || $this->char == "\r") continue;

      // What type of character is this?
      switch($this->char)
      {
      case '{':
        $this->ParseStartGroup();
        break;
      case '}':
        $this->ParseEndGroup();
        break;
      case '\\':
        $this->ParseControl();
        break;
      default:
        $this->ParseText();
        break;
      }
    }

    return TRUE;
    }
    catch(Exception $ex) {
    return FALSE;
    }
  }
}

class RtfState
{
  public function __construct()
  {
    $this->Reset();
  }

  public function Reset()
  {
    $this->bold = false;
    $this->italic = false;
    $this->underline = false;
    $this->end_underline = false;
    $this->strike = false;
    $this->hidden = false;
    $this->fontsize = 0;
    $this->par = false;

    $this->class = array();
  }
}

class RtfHtml
{
  public function Format($root)
  {
    $this->output = "";
    // Create a stack of states:
    $this->states = array();
    // Put an initial standard state onto the stack:
    $this->state = new RtfState();
    array_push($this->states, $this->state);
    $this->FormatGroup($root);
    return $this->output;
  }

  protected function FormatGroup($group)
  {
    // Can we ignore this group?
    if ($group->GetType() == "fonttbl") return;
    if ($group->GetType() == "colortbl") return;
    if ($group->GetType() == "stylesheet") return;
    if ($group->GetType() == "info") return;
    // Skip any pictures:
    if (substr($group->GetType(), 0, 4) == "pict") return;
    if ($group->IsDestination()) return;

    // Push a new state onto the stack:
    $this->state = clone $this->state;
    array_push($this->states, $this->state);

    foreach($group->children as $child)
    {
      if(get_class($child) == "RtfGroup") $this->FormatGroup($child);
      if(get_class($child) == "RtfControlWord") $this->FormatControlWord($child);
      if(get_class($child) == "RtfControlSymbol") $this->FormatControlSymbol($child);
      if(get_class($child) == "RtfText") $this->FormatText($child);
    }

    // Pop state from stack.
    array_pop($this->states);
    $this->state = $this->states[sizeof($this->states)-1];
  }

  protected function FormatControlWord($word)
  {
    if($word->word == "plain") $this->state->Reset();
    if($word->word == "b") $this->state->bold = $word->parameter;
    if($word->word == "i") $this->state->italic = $word->parameter;
    if($word->word == "ul") $this->state->underline = $word->parameter;
    if($word->word == "ulnone") $this->state->end_underline = $word->parameter;
    if($word->word == "strike") $this->state->strike = $word->parameter;
    if($word->word == "v") $this->state->hidden = $word->parameter;
    if($word->word == "fs") $this->state->fontsize = ceil(($word->parameter / 24) * 16);
    if($word->word == "par") $this->state->par = true;

    // Characters:
    if($word->word == "lquote") $this->output .= "&lsquo;";
    if($word->word == "rquote") $this->output .= "&rsquo;";
    if($word->word == "ldblquote") $this->output .= "&ldquo;";
    if($word->word == "rdblquote") $this->output .= "&rdquo;";
    if($word->word == "emdash") $this->output .= "&mdash;";
    if($word->word == "endash") $this->output .= "&ndash;";
    if($word->word == "bullet") $this->output .= "&bull;";
    if($word->word == "u") $this->output .= "&loz;";
  }

  protected function BeginState()
  {
    $span = "";
    if($this->state->bold) $span .= " font-weight:bold;";
    if($this->state->italic) $span .= " font-style:italic;";
    if($this->state->underline) $span .= " text-decoration:underline;";
    if($this->state->end_underline) $span .= " text-decoration:none;";
    if($this->state->strike) $span .= " text-decoration:strikethrough;";
    if($this->state->hidden) $span .= " display:none;";
    if($this->state->fontsize != 0) $span .= " font-size: {$this->state->fontsize}px;";
    $this->output .= "<span style='{$span}'>";
    if($this->state->par)
      $this->output .= '<p>';
  }

  protected function EndState()
  {
    if($this->state->par)
      $this->output .= '</p>';
    $this->output .= "</span>";
  }

  protected function FormatControlSymbol($symbol)
  {
    if($symbol->symbol == '\'')
    {
    $this->BeginState();
    $this->output .= htmlentities(chr($symbol->parameter), ENT_QUOTES, 'ISO-8859-1');
    $this->EndState();
    }
  }

  protected function FormatText($text)
  {
    $this->BeginState();
    $this->output .= $text->text;
    $this->EndState();
  }
}

class RtfTableState
{
  public function __construct()
  {
    $this->Reset();
  }

  public function Reset()
  {
    $this->in_table = false;
    $this->row_start = false;
    $this->row_end = false;
    $this->headers_start = false;
    $this->headers_end = false;

    $this->class = array();
  }
}

class RtfTables
{
  public function Format($root)
  {
    $this->tables = array();
    $this->rowMatrix = array();
    $this->tableIdx = 0;
    $this->rowIdx = 0;
    $this->cellIdx = 0;

    // Create a stack of states:
    $this->states = array();
    // Put an initial standard state onto the stack:
    $this->state = new RtfTableState();
    array_push($this->states, $this->state);

    $this->FormatGroup($root);
    return $this->tables;
  }

  protected function FormatGroup($group)
  {
    // Can we ignore this group?
    if ($group->GetType() == "fonttbl") return;
    if ($group->GetType() == "colortbl") return;
    if ($group->GetType() == "stylesheet") return;
    if ($group->GetType() == "info") return;
    // Skip any pictures:
    if (substr($group->GetType(), 0, 4) == "pict") return;
    if ($group->IsDestination()) return;

    // Push a new state onto the stack:
    $this->state = clone $this->state;
    array_push($this->states, $this->state);

    foreach($group->children as $child)
    {
      if(get_class($child) == "RtfGroup") $this->FormatGroup($child);
      if(get_class($child) == "RtfControlWord") $this->FormatControlWord($child);
      if(get_class($child) == "RtfControlSymbol") $this->FormatControlSymbol($child);
      if(get_class($child) == "RtfText") $this->FormatText($child);
    }

    // Pop state from stack.
    array_pop($this->states);
    $this->state = $this->states[sizeof($this->states)-1];
  }

  protected function FormatControlWord($word)
  {
    if($word->word == "plain") $this->state->Reset();
    if($word->word == "intbl") $this->state->in_table = true;

    if($word->word == 'trowd') // start new row
    {
      $this->state->row_start = true;
      $this->state->row_end = false;
      $this->state->in_table = true;
    }

    if($word->word == 'trhdr') // start header row
    {
      $this->tableIdx++;
      $this->rowIdx = 0;
      $this->cellIdx = 0;
      $this->state->headers_start = true;
      $this->state->headers_end = false;
    }

    if($word->word == 'row')  // end row
    {
      if(!$this->state->headers_start)
        foreach($this->cellMatrix as $matrixSlug)
          if(!isset($this->tables[$this->tableIdx][$this->rowIdx][$matrixSlug]))
            $this->tables[$this->tableIdx][$this->rowIdx][$matrixSlug] = false;

      $this->cellIdx = 0;
      $this->rowIdx++;

      $this->state->headers_start = false;
      $this->state->headers_end = true;
      $this->state->row_end = true;
    }

    if($word->word == 'cell')  // end cell
    {
      $this->cellIdx++;
    }
  }

  protected function BeginState()
  {
  }

  protected function EndState($text = false)
  {
    if($this->state->headers_start and !$this->state->headers_end)
    {
      $slug = $this->slug($text->text);
      $this->cellMatrix[$this->cellIdx] = $slug;
    }

    if($this->state->in_table and !$this->state->headers_start)
      $this->tables[$this->tableIdx][$this->rowIdx][$this->cellMatrix[$this->cellIdx]] = $text->text;
  }

  protected function FormatControlSymbol($symbol)
  {
    if($symbol->symbol == '\'')
    {
    $this->BeginState();
    $this->output .= htmlentities(chr($symbol->parameter), ENT_QUOTES, 'ISO-8859-1');
    $this->EndState();
    }
  }

  protected function FormatText($text)
  {
    $this->BeginState();
    $text->text = trim($text->text);
    $this->EndState($text);
  }

  protected function slug($string, $replacement = '_')
  {
    if(is_string($string))
      $string = strtolower($string);

    $quotedReplacement = preg_quote($replacement, '/');

    $merge = array(
      '/[^\s\p{Zs}\p{Ll}\p{Lm}\p{Lo}\p{Lt}\p{Lu}\p{Nd}]/mu' => ' ',
      '/[\s\p{Zs}]+/mu' => $replacement,
      sprintf('/^[%s]+|[%s]+$/', $quotedReplacement, $quotedReplacement) => '',
    );

    $map = $this->_transliteration + $merge;
    return preg_replace(array_keys($map), array_values($map), $string);
  }

/**
 * Default map of accented and special characters to ASCII characters
 *
 * @var array
 */
  protected $_transliteration = array(
    '/À|Á|Â|Ã|Å|Ǻ|Ā|Ă|Ą|Ǎ/' => 'A',
    '/Æ|Ǽ/' => 'AE',
    '/Ä/' => 'Ae',
    '/Ç|Ć|Ĉ|Ċ|Č/' => 'C',
    '/Ð|Ď|Đ/' => 'D',
    '/È|É|Ê|Ë|Ē|Ĕ|Ė|Ę|Ě/' => 'E',
    '/Ĝ|Ğ|Ġ|Ģ|Ґ/' => 'G',
    '/Ĥ|Ħ/' => 'H',
    '/Ì|Í|Î|Ï|Ĩ|Ī|Ĭ|Ǐ|Į|İ|І/' => 'I',
    '/Ĳ/' => 'IJ',
    '/Ĵ/' => 'J',
    '/Ķ/' => 'K',
    '/Ĺ|Ļ|Ľ|Ŀ|Ł/' => 'L',
    '/Ñ|Ń|Ņ|Ň/' => 'N',
    '/Ò|Ó|Ô|Õ|Ō|Ŏ|Ǒ|Ő|Ơ|Ø|Ǿ/' => 'O',
    '/Œ/' => 'OE',
    '/Ö/' => 'Oe',
    '/Ŕ|Ŗ|Ř/' => 'R',
    '/Ś|Ŝ|Ş|Ș|Š/' => 'S',
    '/ẞ/' => 'SS',
    '/Ţ|Ț|Ť|Ŧ/' => 'T',
    '/Þ/' => 'TH',
    '/Ù|Ú|Û|Ũ|Ū|Ŭ|Ů|Ű|Ų|Ư|Ǔ|Ǖ|Ǘ|Ǚ|Ǜ/' => 'U',
    '/Ü/' => 'Ue',
    '/Ŵ/' => 'W',
    '/Ý|Ÿ|Ŷ/' => 'Y',
    '/Є/' => 'Ye',
    '/Ї/' => 'Yi',
    '/Ź|Ż|Ž/' => 'Z',
    '/à|á|â|ã|å|ǻ|ā|ă|ą|ǎ|ª/' => 'a',
    '/ä|æ|ǽ/' => 'ae',
    '/ç|ć|ĉ|ċ|č/' => 'c',
    '/ð|ď|đ/' => 'd',
    '/è|é|ê|ë|ē|ĕ|ė|ę|ě/' => 'e',
    '/ƒ/' => 'f',
    '/ĝ|ğ|ġ|ģ|ґ/' => 'g',
    '/ĥ|ħ/' => 'h',
    '/ì|í|î|ï|ĩ|ī|ĭ|ǐ|į|ı|і/' => 'i',
    '/ĳ/' => 'ij',
    '/ĵ/' => 'j',
    '/ķ/' => 'k',
    '/ĺ|ļ|ľ|ŀ|ł/' => 'l',
    '/ñ|ń|ņ|ň|ŉ/' => 'n',
    '/ò|ó|ô|õ|ō|ŏ|ǒ|ő|ơ|ø|ǿ|º/' => 'o',
    '/ö|œ/' => 'oe',
    '/ŕ|ŗ|ř/' => 'r',
    '/ś|ŝ|ş|ș|š|ſ/' => 's',
    '/ß/' => 'ss',
    '/ţ|ț|ť|ŧ/' => 't',
    '/þ/' => 'th',
    '/ù|ú|û|ũ|ū|ŭ|ů|ű|ų|ư|ǔ|ǖ|ǘ|ǚ|ǜ/' => 'u',
    '/ü/' => 'ue',
    '/ŵ/' => 'w',
    '/ý|ÿ|ŷ/' => 'y',
    '/є/' => 'ye',
    '/ї/' => 'yi',
    '/ź|ż|ž/' => 'z',
  );
}
?>




