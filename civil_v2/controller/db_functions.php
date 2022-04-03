<?php
error_reporting(0);
ini_set('display_errors', 0);
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
  $array = $inserir->errorInfo();
  $erro = $array[2];
  $_SESSION['erro'] = 'ERRO!!! POR FAVOR VERIFIQUE O PROCEDIMENTO FEITO E TENTE NOVAMENTE! <br> '.addslashes($erro);
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
echo'$'.$key->Field.' = $nubente->'. $key->Field.';<br>';
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


# FUNÇÕES UTEIS:
#------------------------------------------


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
<?php 

// NOVAS FUNCOES
#----------------------------------

function UPDATES_CAMPOS($all_campos,$id){
  $pdo = conectar();

  end($all_campos);
  $ultimo_campo = key($all_campos);
  $bindString = ' ';
  foreach($all_campos as $campo => $dado){
    $bindString .= $campo . '=' . $dado;
    $bindString .= ($campo === $ultimo_campo ? ' ' : ',');
  }

  $query = "UPDATE notas_lavratura SET" . $bindString . "WHERE ID =".$id;

$valor = str_replace('"','',$query);
$result = $pdo->prepare($valor);
//var_dump($valor);
if($result->execute()){
  $value = array( 
    "sucesso"=>"OK !!!",
    "status" => "1",); 
    echo json_encode($value);
#echo 'SIM';
}else{
  $value = array( 
    "error"=>"Erro !!!",
    "status" => "0",); 
    echo json_encode($value);
}


}

function SEARCH_ID($table,$ID, $ORDER_BY){
  if($ORDER_BY != 'no'){
    $ORDER_BY = ' ORDER BY '.$ORDER_BY.' DESC';
  }else{
    $ORDER_BY = ' ';
  }
  
  $pdo = conectar();
  $search_all = $pdo->prepare("select * from $table where id = $ID $ORDER_BY");
  $search_all->execute();
  $row = $search_all->fetchAll(PDO::FETCH_ASSOC);
  
  if ($search_all->execute()) {
    return $row;
  }
  else{
    return $error = $search_all->errorInfo();
  }
}


function EXISTE($valor){
  
  if (isset($valor)) {
  return $valor;
  }
  
  else{
    $valor = '';
    return $valor;
   }
}

function retiraAcentos($string){
  $acentos  =  'ÀÁÂÃÄÅÆÇÈÉÊËÌÍÎÏÐÑÒÓÔÕÖØÙÚÛÜÝÞßàáâãäåæçèéêëìíîïðñòóôõöøùúûýýþÿŔŕ';
  $sem_acentos  =  'AAAAAAACEEEEIIIIDNOOOOOOUUUUYbsaaaaaaaceeeeiiiidnoooooouuuyybyRr';
  $string = strtr($string, utf8_decode($acentos), $sem_acentos);
  //$string = str_replace(" "," ",$string);
  return utf8_decode($string);
}

// FIM 






function pesquisa_existe_tabela($tabela,$campo, $valor){
  $pdo = conectar();

  $busca = $pdo->prepare("SELECT * FROM $tabela where $campo = '$valor'");
  $busca->execute();
  if ($busca->rowCount()>0) {
    return true;
  }
  else{
    return false;
  }
}


function captura_acao($dados, $funcionario, $data_sis, $hora_sis){
  $pdo = conectar();
  $in = $pdo->prepare("INSERT INTO bookc_auditoria.trilha_auditoria (`ID`, `FUNCIONARIO`, `DATA_BD`, `DATA_SIS`, `HORA_SIS`, `DADOS_ALTERADOS`) VALUES (NULL, '$funcionario', CURRENT_TIMESTAMP, '$data_sis', '$hora_sis', '$dados');");
  if($in->execute()){
    $_SESSION['trilha_auditoria'] = "dados de auditoria capturados com sucesso";
  }
  else{
    $_SESSION['trilha_auditoria'] = "não foi possivel capturar dados de auditoria";
  }

}


function captura_acao_arquivo($dados, $funcionario, $data_sis, $hora_sis){
  if (!file_exists('C:\AUDITBOOKC')) {
  mkdir('C:\AUDITBOOKC', 0777, true);
  } 
 $URL_ATUAL= "$_SERVER[REQUEST_URI]";
 $montar_arquivo = fopen("C:\AUDITBOOKC/".date('Y-m-d').".bkc", "a+");
 $conteudo = chr(13).chr(10)."DADOS DE AUDITORIA GRAVADOS EM ". date('d/m/Y').'--------------------------------'.chr(13).chr(10);
 $conteudo .= "PAGINA DO SISTEMA: ".$URL_ATUAL.chr(13).chr(10);
 $conteudo .= json_encode($dados).chr(13).chr(10);
 $conteudo .="AÇÃO PRATICADA POR LOGIN: ". $funcionario.chr(13).chr(10);
 $conteudo .= "DATA/HORÁRIO: ".$data_sis."/".$hora_sis;
 $conteudo .="----------------------------------------------------------------------".chr(13).chr(10);
 fwrite($montar_arquivo, $conteudo);
 fclose($montar_arquivo);

}


function retorna_info_auditoria($selo){
  $pdo = conectar();
  $busca = $pdo->prepare("SELECT retorno FROM auditoria where strSelo like '%$selo%' LIMIT 1 ");
  $busca->execute();
  $b = $busca->fetch(PDO::FETCH_ASSOC);
  $retorno = json_decode($b['retorno'], true);

  return $retorno['textoSelo'];

}

function retorna_tabela_custas($tabela){
  if ($tabela == 'civil') {
    return "0120220101";
  }

  elseif($tabela == 'protesto'){
    return "0320210328";
  }

}

# FUNÇÕES 2021:


function verifica_ibge($livro){
 $pdo = conectar();
 $livro = $livro = str_pad($livro, 5, "0", STR_PAD_LEFT);
 $busca = $pdo->prepare("SELECT * FROM livronotas where intIdUnico = '$livro'");
 $busca->execute();
 if ($busca->rowCount()<1) {
   $mensagem = '<span class="" style="color:red; font-weight: bold;"><i class="material-icons">error</i> indícios de erro...</span> 
   <script type="text/javascript">swal("ATENÇÃO","HÁ INDÍCIOS DE ERROS DE PREENCHIMENTO NOS REGISTROS DO TRIMESTRE","error");
   $("#'.$livro.'").css("background","#f78b95");
   </script>
   '; 
 }
 else{
  $mensagem = '<span class="" style="color:green; font-weight: bold;"><i class="material-icons">check_circle</i></span>';
  }
  

   return $mensagem;
}



# MONTA AS INPUTS DE CADA CAMPO DA TABELA
function monta_form($tabela, $coment1, $coment2){

$pdo = conectar();
$DESC = $pdo->prepare("DESC $tabela");
$DESC->execute();
$linhas = $DESC->fetchAll(PDO::FETCH_OBJ);
echo '<!--'.$coment1.'-->';
foreach ($linhas as $key) {


$nome_campo = $key->Field;




if (substr($nome_campo, 0, 4) == 'DATA') {
echo '<div class="col-lg-3">
              <label for="country">'.$nome_campo.':</label>
              <input id="'.$nome_campo.'" name="'.$nome_campo.'" type="date"  class="form-control valid" aria-invalid="false">
            </div>';
}

elseif (substr($nome_campo, 0, 6) == 'CIDADE') {
echo '<div class="col-lg-3">
              <label for="country">'.$nome_campo.':</label>
              <input id="'.$nome_campo.'" name="'.$nome_campo.'" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
            </div>';
}



elseif (substr($nome_campo, 0, 7) == 'NATURAL') {
echo '<div class="col-lg-3">
              <label for="country">'.$nome_campo.':</label>
              <input id="'.$nome_campo.'" name="'.$nome_campo.'" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
            </div>';
}


elseif (substr($nome_campo, 0, 4) == 'TIPO') {
echo '<div class="col-lg-3">
              <label for="country">'.$nome_campo.':</label>
              <select id="'.$nome_campo.'" name="'.$nome_campo.'"  class="form-control valid" aria-invalid="false">
              <option value="">OPÇÃO</option>
              <option value="">OPÇÃO</option>
              <option value="">OPÇÃO</option>
              <option value="">OPÇÃO</option>
              <option value="">OPÇÃO</option>
              </select>
            </div>';
}

elseif (substr($nome_campo, 0, 4) == 'SEXO') {
echo '<div class="col-lg-3">
              <label for="country">'.$nome_campo.':</label>
              <select id="'.$nome_campo.'" name="'.$nome_campo.'"  class="form-control valid" aria-invalid="false">
              <option value=""></option>
              <option value="M">MASCULINO</option>
              <option value="F">FEMININO</option>
              </select>
            </div>';
}



else {
echo '<div class="col-lg-3">
              <label for="country">'.$nome_campo.':</label>
              <input id="'.$nome_campo.'" name="'.$nome_campo.'" type="text"  class="form-control valid" aria-invalid="false">
            </div>';
}


  

}

echo '<!--'.$coment2.'-->';
}




#RETORNA A IDADE A PARTIR DA DATA DO REGISTRO
function idade_civil($nascimento,$dataregistro){
  $data = explode("-",$nascimento);
  $registro = explode("-",$dataregistro);
  if (!isset($dataregistro)) {
  $registro = explode("-",date('Y-m-d'));
  }

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

#FUNÇÃO PARA CORRIGIR O BUG NA FUNÇÃO DE ESCREVER POR EXTENSO
function dataum($data){
$dataAno = $data;
if (substr($dataAno, -2) == '11') {
echo GExtenso::numero($dataAno);
}
elseif (substr($dataAno, -1) == '1') {
echo GExtenso::numero($dataAno)." um";
}
else {
  echo GExtenso::numero($dataAno);
}

}

#MONTA QUALIFICAÇÃO COMPLETA A PARTIR DO ID DA TABELA 'pessoa'
function montaqualificacaotext_id($id, $dataRegistro,$remover){
  $pdo = conectar();
  $busca_pessoa = $pdo->prepare("SELECT * FROM pessoa where ID = '$id' LIMIT 1");
  $busca_pessoa->execute();
  $qualificacao = '';
  if ($busca_pessoa->rowCount()) {
    $linha = $busca_pessoa->fetchAll(PDO::FETCH_OBJ);
    foreach($linha as $b){

// 1. NOME
      $qualificacao .= '<span style="text-transform: uppercase;">'.addslashes(mb_strtolower($b->strNome)).'</span>';

//2. PROFISSÃO

      if (!empty($b->strProfissao) && $b->strProfissao!='') {
        $qualificacao .= ", ".$b->strProfissao;
      }

//3. CPF

      if (!empty($b->strCPFcnpj) && $b->strCPFcnpj!='') {
        $qualificacao .= ", CPF de Número ".$b->strCPFcnpj;
      }


// 4. RG

      if (!empty($b->strRG) && $b->strRG!='') {
        $qualificacao .= ", RG de Número ".$b->strRG;
      }

// 5. ORGAO EMISSOR

      if (!empty($b->strOrgaoEm) && $b->strOrgaoEm!='') {
        $qualificacao .= "/".$b->strOrgaoEm;
      }



// 6. NATURALIDADE:
      if (!empty($b->strNaturalidade) && $b->strNaturalidade!='') {
        $qualificacao .= ", natural de ";  
        if (intval($b->strNaturalidade) == '5300109'):
          $cid_ext = explode("/", $b->strNaturalidade);
          $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
        else:
          $e = PESQUISA_ALL_ID('uf_cidade',intval($b->strNaturalidade)); 
          foreach ($e as $e): 
            $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
          endforeach;
        endif;
      }

// 7 .NACIONALIDADE

      if (!empty($b->strNacionalidade) && $b->strNacionalidade!='') {
        $qualificacao .= ', '.$b->strNacionalidade;
      }

if ($remover!='estadocivil') {
// 8. ESTADO CIVIL 
      if ($b->setSexo == 'M') {
        if ($b->setEstadoCivil == 'SO') {
          $qualificacao .= ", solteiro";
        } elseif  ($b->setEstadoCivil == 'VI') {
          $qualificacao .= ", viuvo";}
          elseif ($b->setEstadoCivil == 'CA')  {
            $qualificacao .= ", casado";
          }elseif ($b->setEstadoCivil == 'DI')  {
            $qualificacao .= ", divorciado";
          }elseif ($b->setEstadoCivil == 'UN')  {
            $qualificacao .= ", em união estável";
          }

          else {
            $qualificacao .= "";
          }
        }
        else{
          if ($b->setEstadoCivil == 'SO') {
            $qualificacao .= ", solteira";
          } elseif  ($b->setEstadoCivil == 'VI') {
            $qualificacao .= ", viuva";}
            elseif ($b->setEstadoCivil == 'CA')  {
              $qualificacao .= ", casada";
            }elseif ($b->setEstadoCivil == 'DI')  {
              $qualificacao .= ", divorciada";
            }elseif ($b->setEstadoCivil == 'UN')  {
              $qualificacao .= ", em união estável";
            }

            else {
              $qualificacao .= "";
            }
          }

}

// 9. ENDEREÇO

          if (!empty($b->strLogradouro) && !empty($b->strBairro)  && $b->strLogradouro!='' && $b->strBairro!='') {
           if ($b->setSexo == 'M') {
              $qualificacao .= ", residente e domiciliado a ";
            } 
            else{
              $qualificacao .= ", residente e domiciliada a ";
            }
           
         }  
           
// 10. LOGRADOURO
         if (!empty($b->strLogradouro) && $b->strLogradouro!='') {
          $qualificacao .= $b->strLogradouro;
        }
// 11. BAIRRO
        if (!empty($b->strBairro) && $b->strBairro!='') {
          $qualificacao .= ", ".$b->strBairro;
        }
// 12. CIDADE
        if (!empty($b->intUFcidade) && $b->intUFcidade!='') {
          $qualificacao .= ", ";  
          if (intval($b->intUFcidade) == '5300109'):
            $cid_ext = explode("/", $b->intUFcidade);
            $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
          else:
            $e = PESQUISA_ALL_ID('uf_cidade',intval($b->intUFcidade)); 
            foreach ($e as $e): 
              $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
            endforeach;
          endif;
        }


// 13. DATA DE NASCIMENTO

        if (!empty($b->dataNascimento) && $b->dataNascimento!='') {
          if ($b->setSexo == 'M') {
            $qualificacao .= ", nascido em ";
          }
          else
          {
            $qualificacao .= ", nascida em ";
          }
          
          $data = $b->dataNascimento ;
          $novaDataRegistro = explode("-", $data);
          if ($novaDataRegistro[2] == 1 || $novaDataRegistro[2] == 01 ) {
            $qualificacao .= "primeiro";
          }
          elseif ($novaDataRegistro[2] == '2' || $novaDataRegistro[2] == '02' ) {
            $qualificacao .= "dois";
          }
          elseif ($novaDataRegistro[2] == '3' || $novaDataRegistro[2] == '03' ) {
            $qualificacao .= "três";
          }
          elseif ($novaDataRegistro[2] == '4' || $novaDataRegistro[2] == '04' ) {
            $qualificacao .= "quatro";
          }
          elseif ($novaDataRegistro[2] == '5' || $novaDataRegistro[2] == '05' ) {
            $qualificacao .= "cinco";
          }
          elseif ($novaDataRegistro[2] == '6' || $novaDataRegistro[2] == '06' ) {
            $qualificacao .= "seis";
          }
          elseif ($novaDataRegistro[2] == '7' || $novaDataRegistro[2] == '07' ) {
            $qualificacao .= "sete";
          }
          elseif ($novaDataRegistro[2] == '8' || $novaDataRegistro[2] == '08' ) {
            $qualificacao .= "oito";
          }
          elseif ($novaDataRegistro[2] == '9' || $novaDataRegistro[2] == '09' ) {
            $qualificacao .= "nove";
          }

          else{
             $qualificacao .= GExtenso::numero($novaDataRegistro[2]);
          }

          if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
            $qualificacao .= " de janeiro de ";
          }elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
            $qualificacao .= " de fevereiro de ";
          } elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
            $qualificacao .= " de março de ";
          } elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
            $qualificacao .= " de abril de ";
          } elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
            $qualificacao .= " de maio de ";
          } elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
            $qualificacao .= " de junho de ";
          } elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
            $qualificacao .= " de julho de ";
          } elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
            $qualificacao .= " de agosto de ";
          } elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
            $qualificacao .= " de setembro de ";
          } elseif ($novaDataRegistro[1] == '10') {
            $qualificacao .= " de outubro de";
          } elseif ($novaDataRegistro[1] == '11') {
            $qualificacao .= " de novembro de ";
          } elseif ($novaDataRegistro[1] == '12') {
            $qualificacao .= " de dezembro de ";
          } else {
            $qualificacao .= "Não definido";
          }

          $dataAno = $novaDataRegistro[0];
          if (substr($dataAno, -2) == '11') {
            $qualificacao .= GExtenso::numero($dataAno)." onze";
          }
          elseif (substr($dataAno, -1) == '1') {
            $qualificacao .= GExtenso::numero($dataAno)." um";
          }
          else {
            $qualificacao .= GExtenso::numero($dataAno);
          }



          $qualificacao .= " (".date('d/m/Y', strtotime($b->dataNascimento)).')';
        }

// 14. IDADE

        if (!empty($b->dataNascimento) && $b->dataNascimento!='') {
          $qualificacao .= ", com ".idade_civil($b->dataNascimento, $dataRegistro). " anos de idade.";
        }




      }  
    }
    return $qualificacao;
  }

#MONTA QUALIFICAÇÃO COMPLETA A PARTIR DO CPF DA TABELA 'pessoa'
function montaqualificacaotext_cpf($cpf, $dataRegistro, $remover){
  $pdo = conectar();
  $busca_pessoa = $pdo->prepare("SELECT * FROM pessoa where strCPFcnpj = '$cpf' LIMIT 1");
  $busca_pessoa->execute();
  $qualificacao = '';
  if ($busca_pessoa->rowCount()) {
    $linha = $busca_pessoa->fetchAll(PDO::FETCH_OBJ);
    foreach($linha as $b){

// 1. NOME
      $qualificacao .= '<span style="text-transform: uppercase;">'.addslashes(mb_strtolower($b->strNome)).'</span>';

//2. PROFISSÃO

      if (!empty($b->strProfissao) && $b->strProfissao!='') {
        $qualificacao .= ", ".$b->strProfissao;
      }

//3. CPF

      if (!empty($b->strCPFcnpj) && $b->strCPFcnpj!='') {
        $qualificacao .= ", CPF de Número ".$b->strCPFcnpj;
      }


// 4. RG

      if (!empty($b->strRG) && $b->strRG!='') {
        $qualificacao .= ", RG de Número ".$b->strRG;
      }

// 5. ORGAO EMISSOR

      if (!empty($b->strOrgaoEm) && $b->strOrgaoEm!='') {
        $qualificacao .= "/".$b->strOrgaoEm;
      }



// 6. NATURALIDADE:
      if (!empty($b->strNaturalidade) && $b->strNaturalidade!='') {
        $qualificacao .= ", natural de ";  
        if (intval($b->strNaturalidade) == '5300109'):
          $cid_ext = explode("/", $b->strNaturalidade);
          $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
        else:
          $e = PESQUISA_ALL_ID('uf_cidade',intval($b->strNaturalidade)); 
          foreach ($e as $e): 
            $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
          endforeach;
        endif;
      }

// 7 .NACIONALIDADE

      if (!empty($b->strNacionalidade) && $b->strNacionalidade!='') {
        $qualificacao .= ', '.$b->strNacionalidade;
      }

if ($remover!='estadocivil') {
// 8. ESTADO CIVIL 
      if ($b->setSexo == 'M') {
        if ($b->setEstadoCivil == 'SO') {
          $qualificacao .= ", solteiro";
        } elseif  ($b->setEstadoCivil == 'VI') {
          $qualificacao .= ", viuvo";}
          elseif ($b->setEstadoCivil == 'CA')  {
            $qualificacao .= ", casado";
          }elseif ($b->setEstadoCivil == 'DI')  {
            $qualificacao .= ", divorciado";
          }elseif ($b->setEstadoCivil == 'UN')  {
            $qualificacao .= ", em união estável";
          }

          else {
            $qualificacao .= "";
          }
        }
        else{
          if ($b->setEstadoCivil == 'SO') {
            $qualificacao .= ", solteira";
          } elseif  ($b->setEstadoCivil == 'VI') {
            $qualificacao .= ", viuva";}
            elseif ($b->setEstadoCivil == 'CA')  {
              $qualificacao .= ", casada";
            }elseif ($b->setEstadoCivil == 'DI')  {
              $qualificacao .= ", divorciada";
            }elseif ($b->setEstadoCivil == 'UN')  {
              $qualificacao .= ", em união estável";
            }

            else {
              $qualificacao .= "";
            }
          }

}

// 9. ENDEREÇO

         if (!empty($b->strLogradouro) && !empty($b->strBairro)  && $b->strLogradouro!='' && $b->strBairro!='') {
           if ($b->setSexo == 'M') {
              $qualificacao .= ", residente e domiciliado a ";
            } 
            else{
              $qualificacao .= ", residente e domiciliada a ";
            }
           
         }   
// 10. LOGRADOURO
         if (!empty($b->strLogradouro) && $b->strLogradouro!='') {
          $qualificacao .= $b->strLogradouro;
        }
// 11. BAIRRO
        if (!empty($b->strBairro) && $b->strBairro!='') {
          $qualificacao .= ", ".$b->strBairro;
        }
// 12. CIDADE
        if (!empty($b->intUFcidade) && $b->intUFcidade!='') {
          $qualificacao .= ", ";  
          if (intval($b->intUFcidade) == '5300109'):
            $cid_ext = explode("/", $b->intUFcidade);
            $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
          else:
            $e = PESQUISA_ALL_ID('uf_cidade',intval($b->intUFcidade)); 
            foreach ($e as $e): 
              $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
            endforeach;
          endif;
        }


// 13. DATA DE NASCIMENTO

        if (!empty($b->dataNascimento) && $b->dataNascimento!='') {
          if ($b->setSexo == 'M') {
            $qualificacao .= ", nascido em ";
          }
          else
          {
            $qualificacao .= ", nascida em ";
          }
          
          $data = $b->dataNascimento ;
          $novaDataRegistro = explode("-", $data);
          if ($novaDataRegistro[2] == 1 || $novaDataRegistro[2] == 01 ) {
            $qualificacao .= "primeiro";
          }
          elseif ($novaDataRegistro[2] == '2' || $novaDataRegistro[2] == '02' ) {
            $qualificacao .= "dois";
          }
          elseif ($novaDataRegistro[2] == '3' || $novaDataRegistro[2] == '03' ) {
            $qualificacao .= "três";
          }
          elseif ($novaDataRegistro[2] == '4' || $novaDataRegistro[2] == '04' ) {
            $qualificacao .= "quatro";
          }
          elseif ($novaDataRegistro[2] == '5' || $novaDataRegistro[2] == '05' ) {
            $qualificacao .= "cinco";
          }
          elseif ($novaDataRegistro[2] == '6' || $novaDataRegistro[2] == '06' ) {
            $qualificacao .= "seis";
          }
          elseif ($novaDataRegistro[2] == '7' || $novaDataRegistro[2] == '07' ) {
            $qualificacao .= "sete";
          }
          elseif ($novaDataRegistro[2] == '8' || $novaDataRegistro[2] == '08' ) {
            $qualificacao .= "oito";
          }
          elseif ($novaDataRegistro[2] == '9' || $novaDataRegistro[2] == '09' ) {
            $qualificacao .= "nove";
          }

          else{
             $qualificacao .= GExtenso::numero($novaDataRegistro[2]);
          }

          if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
            $qualificacao .= " de janeiro de ";
          }elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
            $qualificacao .= " de fevereiro de ";
          } elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
            $qualificacao .= " de março de ";
          } elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
            $qualificacao .= " de abril de ";
          } elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
            $qualificacao .= " de maio de ";
          } elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
            $qualificacao .= " de junho de ";
          } elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
            $qualificacao .= " de julho de ";
          } elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
            $qualificacao .= " de agosto de ";
          } elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
            $qualificacao .= " de setembro de ";
          } elseif ($novaDataRegistro[1] == '10') {
            $qualificacao .= " de outubro de";
          } elseif ($novaDataRegistro[1] == '11') {
            $qualificacao .= " de novembro de ";
          } elseif ($novaDataRegistro[1] == '12') {
            $qualificacao .= " de dezembro de ";
          } else {
            $qualificacao .= "Não definido";
          }

          $dataAno = $novaDataRegistro[0];
          if (substr($dataAno, -2) == '11') {
            $qualificacao .= GExtenso::numero($dataAno)." onze";
          }
          elseif (substr($dataAno, -1) == '1') {
            $qualificacao .= GExtenso::numero($dataAno)." um";
          }
          else {
            $qualificacao .= GExtenso::numero($dataAno);
          }



          $qualificacao .= " (".date('d/m/Y', strtotime($b->dataNascimento)).')';
        }

// 14. IDADE

        if (!empty($b->dataNascimento) && $b->dataNascimento!='') {
          $qualificacao .= ", com ".idade_civil($b->dataNascimento, $dataRegistro). " anos de idade";
        }




      }  
    }
    return $qualificacao;
  }


#RETORNA OS DADOS DE UMA LINHA EM JSON
function json_table_registro($tabela, $id){
$pdo = conectar();
$busca = $pdo->prepare("SELECT * FROM $tabela where ID = '$id' ");
$busca->execute();
$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
return json_encode($linhas);
}


#FUNÇÃO INATIVA!!!!
/*function montarselo_unico($id){
  $pdo= conectar();
  $busca = $pdo->prepare("SELECT RETORNOSELODIGITAL from pessoa where ID = '$id'");
  $busca->execute();

  if ($busca->rowCount()<1) {
    echo "<h1 style='text-align:center; color:silver'>NENHUM SELO LOCALIZADO PARA ESTE REGISTRO</h1>";
  }


  if ($busca->rowCount()>0) {
  echo '<div id="containerselos" style="width: 100%;max-width: 100%;display: flex;flex-wrap: wrap;flex-direction: row;padding-top:5px">';  
  $b = $busca->fetchAll(PDO::FETCH_OBJ);
  foreach ($b as $b) {

  $DECODE = json_decode($b->RETORNOSELODIGITAL, true);  
  $qrcode = $DECODE['qrCode'];
  $textoselo = $DECODE['textoSelo'];
  echo '<div style="display: inline-flex;width: 100%; max-width: 100%;margin-right:40px; zoom:90%;">';
   echo '<p style="display:  max-width: 50%;margin-left:20px;text-align:justify; font-size:15px; font-weight:bold">'.caracteres_selador($textoselo).'</p>';
  echo '<p style="display:  max-width: 30%;margin-right:-50px"><img id="imgfuncaoqr" style="background: none; width: 150px;margin-top: -35px;z-index: -1;" src="data:image/png;base64,'.$qrcode.'"alt="Qr Code" /> </img></p>';
  echo '</div>';
  }
  echo '</div>';
  }

}*/

#MONTA OS SELOS REFERENTE A UMA NATUREZA E OS IMPRIME LINDAMENTE NA TELA
function montarselo($id, $natureza){
  $pdo= conectar();
  $busca = $pdo->prepare("SELECT * FROM selagem_atos_retorno where id_registro = '$id' and tipo_registro = '$natureza'");
  $busca->execute();

  if ($busca->rowCount()<1) {
    echo "<h1 style='text-align:center; color:silver'>NENHUM SELO LOCALIZADO PARA ESTE REGISTRO</h1>";
  }


  if ($busca->rowCount()>0) {
  echo '<div id="containerselos" style="width: 100%;max-width: 100%;display: flex;flex-wrap: wrap;flex-direction: row;padding-top:5px">';  
  $b = $busca->fetchAll(PDO::FETCH_OBJ);
  foreach ($b as $b) { 
  $qrcode = $b->qrCode;
  $textoselo = $b->textoSelo;
  $numeroselo = $b->numeroSelo;
  echo '<div id="div'.$numeroselo.'" style="display: inline-flex;width:80%; max-width:80%;margin-right:40px; zoom:90%;margin-bottom:20px">';
  echo '<p style="display:  max-width: 50%;margin-left:20px;text-align:justify; font-size:15px;font-weight:bold">'.caracteres_selador($textoselo).'</p>';
  echo '<p style="display:  max-width: 30%;margin-right:-50px"><img id="imgfuncaoqr" style="background: none; width: 150px;margin-top: -35px;z-index: -1;" src="data:image/png;base64,'.$qrcode.'"alt="Qr Code" /> </img></p>';
  echo '</div>';

  echo '<div style="display: flex inline-flex;width:8%; max-width:8%;margin-right:40px; zoom:90%;">';
  echo '<a id="print'.$numeroselo.'"  class="btn bg-light-blue printbtn" style=""><i class="material-icons">print</i></a>
  <a id="copy'.$numeroselo.'" class="btn bg-light-green copybtn" data-clipboard-action="copy" data-clipboard-target="#div'.$numeroselo.'" style=""><i class="material-icons">content_copy</i></a>';  
  echo '</div>';


  }
  echo '</div>';
  }

}



#MONTA O SELO A PARTIR DO CODIGO DO MESMO
function montarselo_selo($selo){
  $pdo= conectar();
  $busca = $pdo->prepare("SELECT * FROM selagem_atos_retorno where numeroSelo = '$selo'");
  $busca->execute();

  if ($busca->rowCount()<1) {
    echo "<h1 style='text-align:center; color:silver'>NENHUM SELO LOCALIZADO PARA ESTE REGISTRO</h1>";
  }


  if ($busca->rowCount()>0) {
  echo '<div id="containerselos" style="width: 100%;max-width: 100%;display: flex;flex-wrap: wrap;flex-direction: row;padding-top:5px">';  
  $b = $busca->fetchAll(PDO::FETCH_OBJ);
  foreach ($b as $b) { 
  $qrcode = $b->qrCode;
  $textoselo = $b->textoSelo;
  $numeroselo = $b->numeroSelo;
  echo '<div id="div'.$numeroselo.'" style="display: inline-flex;width:80%; max-width:80%;margin-right:40px; zoom:90%;margin-bottom:20px">';
  echo '<p style="display:  max-width: 50%;margin-left:20px;text-align:justify; font-size:15px;font-weight:bold">'.caracteres_selador($textoselo).'</p>';
  echo '<p style="display:  max-width: 30%;margin-right:-50px"><img id="imgfuncaoqr" style="background: none; width: 150px;margin-top: -35px;z-index: -1;" src="data:image/png;base64,'.$qrcode.'"alt="Qr Code" /> </img></p>';
  echo '</div>';

  echo '<div style="display: flex inline-flex;width:8%; max-width:8%;margin-right:40px; zoom:90%;">';
  echo '<a id="print'.$numeroselo.'"  class="btn bg-light-blue printbtn" style=""><i class="material-icons">print</i></a>
  <a id="copy'.$numeroselo.'" class="btn bg-light-green copybtn" data-clipboard-action="copy" data-clipboard-target="#div'.$numeroselo.'" style=""><i class="material-icons">content_copy</i></a>';  
  echo '</div>';


  }
  echo '</div>';
  }

}




#RETORNA SÓ O QRCODE DO SELO
function qrselo($selo){
  $pdo= conectar();
  $busca = $pdo->prepare("SELECT * from selagem_atos_retorno where numeroSelo = '$selo'");
  $busca->execute();

  if ($busca->rowCount()>0) {  
  $b = $busca->fetchAll(PDO::FETCH_OBJ);
  foreach ($b as $b) {

  $qrcode = $b->qrCode;
  $textoselo = $b->textoSelo;
  echo '<p style="display:  max-width: 20%;"><img id="imgfuncaoqr" style="background: none; width: 100px;margin-top: -15px;z-index: -1;" src="data:image/png;base64,'.$qrcode.'"alt="Qr Code" /> </img></p>';
  }
  }

}

#RETORNA SO O TEXTO DO SELO 
function textoselo($selo){
  $pdo= conectar();
  $busca = $pdo->prepare("SELECT * from selagem_atos_retorno where numeroSelo = '$selo'");
  $busca->execute();

  if ($busca->rowCount()>0) {  
  $b = $busca->fetchAll(PDO::FETCH_OBJ);
  foreach ($b as $b) {

   $qrcode = $b->qrCode;
  $textoselo = $b->textoSelo;
  echo '<p style="display:  max-width: 50%;text-align:justify;">'.caracteres_selador($textoselo).'</p>';
  }
  }

}

#OBTEM O REGIME DE CASAMENTO A PARTIR DA SIGLA
function retornaregime($regime){
  if ($regime == 'CP') {
    echo "COMUNHÃO PARCIAL DE BENS";
  }
  elseif ($regime == 'CU') {
    echo "COMUNHÃO UNIVERSAL DE BENS";
  }
  elseif ($regime == 'PF') {
    echo "PARTICIPAÇÃO FINAL NOS AQUESTOS";
  }
  elseif ($regime == 'SB') {
    echo "SEPARAÇÃO TOTAL DE BENS";
  }
  elseif ($regime == 'SC') {
    echo "SEPARAÇÃO OBRIGATÓRIA DE BENS";
  }
  elseif ($regime == 'SO') {
    echo "SEPARAÇÃO CONVENCIONAL DE BENS";
  }
  elseif ($regime == 'SE') {
    echo "SEPARAÇÃO DE BENS";
  }
  elseif ($regime == 'CB') {
    echo "COMUNHÃO DE BENS";
  }else {
    echo "";
  }
}



#ESCREVE A DATA POR EXTENSO 
function escrevedataextenso($data){
          $novaDataRegistro = explode("-", $data);
          if ($novaDataRegistro[2] == 1 || $novaDataRegistro[2] == 01 ) {
            echo "primeiro";}
          elseif ($novaDataRegistro[2] == '2' || $novaDataRegistro[2] == '02' ) {
            echo "dois";}
          elseif ($novaDataRegistro[2] == '3' || $novaDataRegistro[2] == '03' ) {
            echo "três";}
          elseif ($novaDataRegistro[2] == '4' || $novaDataRegistro[2] == '04' ) {
            echo "quatro";}
          elseif ($novaDataRegistro[2] == '5' || $novaDataRegistro[2] == '05' ) {
            echo "cinco";}
          elseif ($novaDataRegistro[2] == '6' || $novaDataRegistro[2] == '06' ) {
            echo "seis";}
          elseif ($novaDataRegistro[2] == '7' || $novaDataRegistro[2] == '07' ) {
            echo "sete";}
          elseif ($novaDataRegistro[2] == '8' || $novaDataRegistro[2] == '08' ) {
            echo "oito";}
          elseif ($novaDataRegistro[2] == '9' || $novaDataRegistro[2] == '09' ) {
            echo "nove";}
          else{echo dataum($novaDataRegistro[2]);}

          if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
            echo " de janeiro de ";}
            elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
            echo " de fevereiro de ";} 
            elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
            echo " de março de ";} 
            elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
            echo " de abril de ";} 
            elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
            echo " de maio de ";} 
            elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
            echo " de junho de ";} 
            elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
            echo " de julho de ";} 
            elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
            echo " de agosto de ";} 
            elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
            echo " de setembro de ";} 
            elseif ($novaDataRegistro[1] == '10') {
            echo " de outubro de ";} 
            elseif ($novaDataRegistro[1] == '11') {
            echo " de novembro de ";} 
            elseif ($novaDataRegistro[1] == '12') {
            echo " de dezembro de ";} 
            else {
            echo "Não definido";}

          $dataAno = $novaDataRegistro[0];
          if (substr($dataAno, -2) == '11') {
            echo GExtenso::numero($dataAno);}
          elseif (substr($dataAno, -1) == '1') {
            echo GExtenso::numero($dataAno)." um";}
          else {
            echo GExtenso::numero($dataAno);}



          echo " (".date('d/m/Y', strtotime($data)).')';
        }

        #ESCREVE A DATA POR EXTENSO SEM A DATA COM NUMERAL
function escrevedataextenso1($data){
          $novaDataRegistro = explode("-", $data);
          if ($novaDataRegistro[2] == 1 || $novaDataRegistro[2] == 01 ) {
            echo "primeiro";}
          elseif ($novaDataRegistro[2] == '2' || $novaDataRegistro[2] == '02' ) {
            echo "dois";}
          elseif ($novaDataRegistro[2] == '3' || $novaDataRegistro[2] == '03' ) {
            echo "três";}
          elseif ($novaDataRegistro[2] == '4' || $novaDataRegistro[2] == '04' ) {
            echo "quatro";}
          elseif ($novaDataRegistro[2] == '5' || $novaDataRegistro[2] == '05' ) {
            echo "cinco";}
          elseif ($novaDataRegistro[2] == '6' || $novaDataRegistro[2] == '06' ) {
            echo "seis";}
          elseif ($novaDataRegistro[2] == '7' || $novaDataRegistro[2] == '07' ) {
            echo "sete";}
          elseif ($novaDataRegistro[2] == '8' || $novaDataRegistro[2] == '08' ) {
            echo "oito";}
          elseif ($novaDataRegistro[2] == '9' || $novaDataRegistro[2] == '09' ) {
            echo "nove";}
          else{echo dataum($novaDataRegistro[2]);}

          if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
            echo " de janeiro de ";}
            elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
            echo " de fevereiro de ";} 
            elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
            echo " de março de ";} 
            elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
            echo " de abril de ";} 
            elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
            echo " de maio de ";} 
            elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
            echo " de junho de ";} 
            elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
            echo " de julho de ";} 
            elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
            echo " de agosto de ";} 
            elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
            echo " de setembro de ";} 
            elseif ($novaDataRegistro[1] == '10') {
            echo " de outubro de ";} 
            elseif ($novaDataRegistro[1] == '11') {
            echo " de novembro de ";} 
            elseif ($novaDataRegistro[1] == '12') {
            echo " de dezembro de ";} 
            else {
            echo "Não definido";}

          $dataAno = $novaDataRegistro[0];
          if (substr($dataAno, -2) == '11') {
            echo GExtenso::numero($dataAno)." onze";}
          elseif (substr($dataAno, -1) == '1') {
            echo GExtenso::numero($dataAno)." um";}
          else {
            echo GExtenso::numero($dataAno);}
        }


        #ESCREVE A CIDADE A PARTIR DO CODIGO DO IBGE
        function escrevecidadecivil($cidade){
          if (!empty($cidade) && $cidade!='') { 
          if (intval($cidade) == '5300109'):
            $cid_ext = explode("/", $cidade);
            echo '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
          else:
            $e = PESQUISA_ALL_ID('uf_cidade',intval($cidade)); 
            foreach ($e as $e): 
              echo '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
            endforeach;
          endif;
        }
        }

        #RETORNA A FILIAÇÃO A PARTIR DA TABELA PESSOAS
        function buscafiliacaoid($id){
          $pdo = conectar();
          $busca  = $pdo->prepare("SELECT * FROM pessoa where ID = '$id' LIMIT 1");
          $busca->execute();
          $filiacao = '';
          if ($busca->rowCount()>0) {
            $linhas = $busca->fetch(PDO::FETCH_ASSOC);
            if (!empty($linhas['strNomePai'])) {
             $filiacao .= $linhas['strNomePai'].' e ';
            }  

            if (!empty($linhas['strNomeMae'])) {
             $filiacao .= $linhas['strNomeMae'];
            }  
          }
          return $filiacao;
        }


        #IMPRIME AS ASSINATURAS:
        function assinatura($nome,$qualidade, $cpfrogo, $cpfprocurador){
          if (!empty($nome)) {

            echo '<table style="width: 50%;max-width: 50%;display: inline-grid;border: none;">';

            if (!empty($cpfrogo)) {
              echo '<tr style="border:none">
              <td class="tdconteudo" style="border:none">
              <p style="width:100%;word-wrap: break-word;">'.$nome.', '.$qualidade.', Impossibilitado(a) de assinar, está sendo representado por seu(a) assinante a rogo '.montaqualificacaotext_cpf($cpfrogo, date("Y-m-d"), "").' </p>
              </td>
              <td style="border:none">
              <div class="caixarogo"><span class="placeholderpdf">DIGITAL</span></div>  
              </td>
              </tr>
              <tr>
              <td style="border:none; text-align:center"><br><hr style="width:250px;margin-bottom:-10px;border: 0.1px solid black"><br>ASS. A ROGO</td>
              <td style="border:none"></td>

              </tr>
              </table>

              ';
            }

            elseif (!empty($cpfprocurador)) {
              echo '<tr style="border:none">
              <td class="tdconteudo" style="border:none">
              <p style="width:100%;word-wrap: break-word;">'.$nome.', Impossibilitado(a) de comparecer, está sendo representado por seu(a) procurador(a), '.montaqualificacaotext_cpf($cpfprocurador, date("Y-m-d"), "").' </p>
              </td>
              </tr>
              <tr>
              <td style="border:none; text-align:center"><br><hr style="width:250px;margin-bottom:-10px;border: 0.1px solid black"><br>PROCURADOR</td>
              <td style="border:none"></td>

              </tr>
              </table>
              ';
            }
            else{
              echo ' <tr>
              <td class="tdconteudo" style="border:none; text-align:center"><br><hr style="width:250px;margin-bottom:-10px;border: 0.1px solid black"><br>'.$nome.'<br> '.$qualidade.'</td>
              <td style="border:none"></td>

              </tr>
              </table>';
            }
          }
        }


function retornasexo($id){
  $pdo = conectar();
  $busca = $pdo->prepare("SELECT setSexo from pessoa where ID = '$id'");
  $busca->execute();
  $linha = $busca->fetch(PDO::FETCH_ASSOC);
  $string = $linha['setSexo'];
  if ($string == 'M' || $string =='m' ) {
   return "masculino";
  }
  elseif ($string == 'F' || $string =='f' ) {
   return "feminino";
  }
  else{
     return "indefinido";
  }
}

function verificacampocertidao($string){
  if (empty($string) || $string == '') {
    echo '<hr style="border:1px dashed black;">';
  }
  else{
    echo $string;
  }
}



#MONTA QUALIFICAÇÃO RESUMIDA A PARTIR DO ID DA TABELA 'pessoa'
function montaqualificacaoresumidatext_id($id, $dataRegistro,$remover){
  $pdo = conectar();
  $busca_pessoa = $pdo->prepare("SELECT * FROM pessoa where ID = '$id' LIMIT 1");
  $busca_pessoa->execute();
  $qualificacao = '';
  if ($busca_pessoa->rowCount()) {
    $linha = $busca_pessoa->fetchAll(PDO::FETCH_OBJ);
    foreach($linha as $b){

// 1. NOME
      $qualificacao .= '<span style="text-transform: uppercase;">'.addslashes(mb_strtolower($b->strNome)).'</span>';



// 6. NATURALIDADE:
      if (!empty($b->strNaturalidade) && $b->strNaturalidade!='') {
        $qualificacao .= ", natural de ";  
        if (intval($b->strNaturalidade) == '5300109'):
          $cid_ext = explode("/", $b->strNaturalidade);
          $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
        else:
          $e = PESQUISA_ALL_ID('uf_cidade',intval($b->strNaturalidade)); 
          foreach ($e as $e): 
            $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
          endforeach;
        endif;
      }



// 9. ENDEREÇO

         // 9. ENDEREÇO

          if (!empty($b->strLogradouro)  && $b->strLogradouro!='') {
           if ($b->setSexo == 'M') {
              $qualificacao .= ", residente e domiciliado a ";
            } 
            else{
              $qualificacao .= ", residente e domiciliada a ";
            }
           
         }  
             
// 10. LOGRADOURO
         if (!empty($b->strLogradouro) && $b->strLogradouro!='') {
          $qualificacao .= $b->strLogradouro;
        }
// 11. BAIRRO
        if (!empty($b->strBairro) && $b->strBairro!='') {
          $qualificacao .= ", ".$b->strBairro;
        }
// 12. CIDADE
        if (!empty($b->intUFcidade) && $b->intUFcidade!='') {
          $qualificacao .= ", ";  
          if (intval($b->intUFcidade) == '5300109'):
            $cid_ext = explode("/", $b->intUFcidade);
            $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
          else:
            $e = PESQUISA_ALL_ID('uf_cidade',intval($b->intUFcidade)); 
            foreach ($e as $e): 
              $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
            endforeach;
          endif;
        }




      }  
    }
    return $qualificacao;
  }

#MONTA QUALIFICAÇÃO COMPLETA A PARTIR DO CPF DA TABELA 'pessoa'
function montaqualificacaoresumidatext_cpf($cpf, $dataRegistro, $remover){
  $pdo = conectar();
  $busca_pessoa = $pdo->prepare("SELECT * FROM pessoa where strCPFcnpj = '$cpf' LIMIT 1");
  $busca_pessoa->execute();
  $qualificacao = '';
  if ($busca_pessoa->rowCount()) {
    $linha = $busca_pessoa->fetchAll(PDO::FETCH_OBJ);
    foreach($linha as $b){

// 1. NOME
      $qualificacao .= '<span style="text-transform: uppercase;">'.addslashes(mb_strtolower($b->strNome)).'</span>';



// 6. NATURALIDADE:
      if (!empty($b->strNaturalidade) && $b->strNaturalidade!='') {
        $qualificacao .= ", natural de ";  
        if (intval($b->strNaturalidade) == '5300109'):
          $cid_ext = explode("/", $b->strNaturalidade);
          $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
        else:
          $e = PESQUISA_ALL_ID('uf_cidade',intval($b->strNaturalidade)); 
          foreach ($e as $e): 
            $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
          endforeach;
        endif;
      }



// 9. ENDEREÇO

          if (!empty($b->strLogradouro)  && $b->strLogradouro!='') {
           $qualificacao .= ", residente e domiciliado a ";
         }    
// 10. LOGRADOURO
         if (!empty($b->strLogradouro) && $b->strLogradouro!='') {
          $qualificacao .= $b->strLogradouro;
        }
// 11. BAIRRO
        if (!empty($b->strBairro) && $b->strBairro!='') {
          $qualificacao .= ", ".$b->strBairro;
        }
// 12. CIDADE
        if (!empty($b->intUFcidade) && $b->intUFcidade!='') {
          $qualificacao .= ", ";  
          if (intval($b->intUFcidade) == '5300109'):
            $cid_ext = explode("/", $b->intUFcidade);
            $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
          else:
            $e = PESQUISA_ALL_ID('uf_cidade',intval($b->intUFcidade)); 
            foreach ($e as $e): 
              $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
            endforeach;
          endif;
        }

      }  
    }
    return $qualificacao;
  }


  function relacaoselosnatureza($id_registro, $natureza){
    $pdo = conectar();
    $busca = $pdo->prepare("SELECT * FROM selagem_atos_retorno where tipo_registro = '$natureza' and id_registro = '$id_registro'");
    $busca->execute();
    $linhas = $busca->fetchAll(PDO::FETCH_OBJ);
    return $linhas;
  }












#MONTA QUALIFICAÇÃO COMPLETA A PARTIR DO ID DA TABELA 'pessoa'
function montaqualificacaonubentescertidao_id($id, $dataRegistro,$remover){
  $pdo = conectar();
  $busca_pessoa = $pdo->prepare("SELECT * FROM pessoa where ID = '$id' LIMIT 1");
  $busca_pessoa->execute();
  $qualificacao = '';
  if ($busca_pessoa->rowCount()) {
    $linha = $busca_pessoa->fetchAll(PDO::FETCH_OBJ);
    foreach($linha as $b){

// 1. NOME
      $qualificacao .= '<span style="text-transform: uppercase;">'.addslashes(mb_strtolower($b->strNome)).'</span>';



// 6. NATURALIDADE:
      if (!empty($b->strNaturalidade) && $b->strNaturalidade!='') {
        $qualificacao .= ", natural de ";  
        if (intval($b->strNaturalidade) == '5300109'):
          $cid_ext = explode("/", $b->strNaturalidade);
          $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
        else:
          $e = PESQUISA_ALL_ID('uf_cidade',intval($b->strNaturalidade)); 
          foreach ($e as $e): 
            $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
          endforeach;
        endif;
      }

// 7 .NACIONALIDADE

      if (!empty($b->strNacionalidade) && $b->strNacionalidade!='') {
        $qualificacao .= ', '.$b->strNacionalidade;
      }



// 13. DATA DE NASCIMENTO

        if (!empty($b->dataNascimento) && $b->dataNascimento!='') {
          if ($b->setSexo == 'M') {
            $qualificacao .= ", nascido em ";
          }
          else
          {
            $qualificacao .= ", nascida em ";
          }
          
          $data = $b->dataNascimento ;
          $novaDataRegistro = explode("-", $data);
          if ($novaDataRegistro[2] == 1 || $novaDataRegistro[2] == 01 ) {
            $qualificacao .= "primeiro";
          }
          elseif ($novaDataRegistro[2] == '2' || $novaDataRegistro[2] == '02' ) {
            $qualificacao .= "dois";
          }
          elseif ($novaDataRegistro[2] == '3' || $novaDataRegistro[2] == '03' ) {
            $qualificacao .= "três";
          }
          elseif ($novaDataRegistro[2] == '4' || $novaDataRegistro[2] == '04' ) {
            $qualificacao .= "quatro";
          }
          elseif ($novaDataRegistro[2] == '5' || $novaDataRegistro[2] == '05' ) {
            $qualificacao .= "cinco";
          }
          elseif ($novaDataRegistro[2] == '6' || $novaDataRegistro[2] == '06' ) {
            $qualificacao .= "seis";
          }
          elseif ($novaDataRegistro[2] == '7' || $novaDataRegistro[2] == '07' ) {
            $qualificacao .= "sete";
          }
          elseif ($novaDataRegistro[2] == '8' || $novaDataRegistro[2] == '08' ) {
            $qualificacao .= "oito";
          }
          elseif ($novaDataRegistro[2] == '9' || $novaDataRegistro[2] == '09' ) {
            $qualificacao .= "nove";
          }

          else{
             $qualificacao .= GExtenso::numero($novaDataRegistro[2]);
          }

          if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
            $qualificacao .= " de janeiro de ";
          }elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
            $qualificacao .= " de fevereiro de ";
          } elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
            $qualificacao .= " de março de ";
          } elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
            $qualificacao .= " de abril de ";
          } elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
            $qualificacao .= " de maio de ";
          } elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
            $qualificacao .= " de junho de ";
          } elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
            $qualificacao .= " de julho de ";
          } elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
            $qualificacao .= " de agosto de ";
          } elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
            $qualificacao .= " de setembro de ";
          } elseif ($novaDataRegistro[1] == '10') {
            $qualificacao .= " de outubro de";
          } elseif ($novaDataRegistro[1] == '11') {
            $qualificacao .= " de novembro de ";
          } elseif ($novaDataRegistro[1] == '12') {
            $qualificacao .= " de dezembro de ";
          } else {
            $qualificacao .= "Não definido";
          }

          $dataAno = $novaDataRegistro[0];
          if (substr($dataAno, -2) == '11') {
            $qualificacao .= GExtenso::numero($dataAno)." onze";
          }
          elseif (substr($dataAno, -1) == '1') {
            $qualificacao .= GExtenso::numero($dataAno)." um";
          }
          else {
            $qualificacao .= GExtenso::numero($dataAno);
          }



          $qualificacao .= " (".date('d/m/Y', strtotime($b->dataNascimento)).')';
        }

      }  
    }
    return $qualificacao;
  }






#IMPRIME AS ASSINATURAS:
        function assinatura_nubente($nome,$qualidade, $cpfrogo,$cpfrogo2, $cpfprocurador){
          if (!empty($nome)) {

            echo '<table style="width: 50%;max-width: 50%;display: inline-grid;border: none;">';

            if (!empty($cpfrogo)) {
              echo '<tr style="border:none;">
              <td class="tdconteudo" style="border:none">
              <p style="width:100%;word-wrap: break-word;">'.$nome.', '.$qualidade.', Impossibilitado(a) de assinar, está sendo representado por suas testemunhas assinantes a rogo, '.montaqualificacaotext_cpf($cpfrogo, date("Y-m-d"), "").' <br>'.montaqualificacaotext_cpf($cpfrogo2, date("Y-m-d"), "").'</p>
              </td>
              </tr>
              </table>

              <table style="width: 50%;max-width: 50%;display: inline-grid;border: none;">
              <tr>
              <td style="border:none; padding-top:-300px;">
              <div class="caixarogo" style="margin-top:-150px"><span class="placeholderpdf">DIGITAL</span></div>  
              </td>
              <td style="border:none; text-align:center;padding-top:-300px;"><br><hr style="width:200px;margin-left:20px;margin-bottom:-10px;border: 0.1px solid black; margin-top:-150px"><br>ASS. A ROGO<br><br><br><hr style="width:200px;margin-left:20px;margin-bottom:0px;border: 0.1px solid black">ASS. A ROGO</td>
              <td style="border:none"></td>

              </tr>
              </table>

              ';
            }

            elseif (!empty($cpfprocurador)) {
              echo '<tr style="border:none">
              <td class="tdconteudo" style="border:none">
              <p style="width:100%;word-wrap: break-word;">'.$nome.', Impossibilitado(a) de comparecer, está sendo representado por seu(a) procurador(a), '.montaqualificacaotext_cpf($cpfprocurador, date("Y-m-d"), "").' </p>
              </td>
              </tr>
              <tr>
              <td style="border:none; text-align:center"><br><hr style="width:250px;margin-bottom:-10px;border: 0.1px solid black"><br>PROCURADOR</td>
              <td style="border:none"></td>

              </tr>
              </table>
              ';
            }
            else{
              echo ' <tr>
              <td class="tdconteudo" style="border:none; text-align:center"><br><hr style="width:250px;margin-bottom:-10px;border: 0.1px solid black"><br>'.$nome.'<br> '.$qualidade.'</td>
              <td style="border:none"></td>

              </tr>
              </table>';
            }
          }
        }



function retornacorpele($siglacor){
  if ($siglacor == 'BR') {
    return "BRANCA";
  }
  else if ($siglacor == 'PR') {
    return "PRETA";
  }
  else if ($siglacor == 'PA') {
    return "PARDA";
  }
  else if ($siglacor == 'AM') {
    return "AMARELA";
  }
  else if ($siglacor == 'IN') {
    return "INDÍGENA";
  }

}


function setsexo($sexo){
  if ($sexo == 'M' || $sexo == 'm') {
    return "MASCULINO";
  }
  elseif($sexo == 'F' || $sexo == 'f'){
     return "FEMININO";
  }
  else{
    return "INDEFINIDO";
  }
}



#MONTA QUALIFICAÇÃO COMPLETA A PARTIR DA TABELA DE CIVIL
function montaqualificacaocivil($dados, $tipoparte,$remover, $dataRegistro){
  $qualificacao = '';


// 1. NOME
  $qualificacao .= '<span style="text-transform: uppercase;">'.addslashes($dados['NOME'.$tipoparte]).'</span>';

//2. PROFISSÃO

  if (!empty($dados['PROFISSAO'.$tipoparte]) && $dados['PROFISSAO'.$tipoparte]!='') {
    $qualificacao .= ", ".$dados['PROFISSAO'.$tipoparte];
  }
  else{$qualificacao .= '<span style="display:none">,</span>';}
//3. CPF

  if (!empty($dados['CPF'.$tipoparte]) && $dados['CPF'.$tipoparte]!='') {
    $qualificacao .= ", CPF de Número ".$dados['CPF'.$tipoparte];
  }
  else{$qualificacao .= '<span style="display:none">,</span>';}

// 4. RG

  if (!empty($dados['RG'.$tipoparte]) && $dados['RG'.$tipoparte]!='') {
    $qualificacao .= ", RG de Número ".$dados['RG'.$tipoparte];
  }
  else{$qualificacao .= '<span style="display:none">,</span>';}

// 5. ORGAO EMISSOR

  if (!empty($dados['ORGAOEMISSOR'.$tipoparte]) && $dados['ORGAOEMISSOR'.$tipoparte]!='') {
    $qualificacao .= ", ".$dados['ORGAOEMISSOR'.$tipoparte];
  }
  else{$qualificacao .= '<span style="display:none">,</span>';}



// 6. NATURALIDADE:
  if (!empty($dados['NATURALIDADE'.$tipoparte]) && $dados['NATURALIDADE'.$tipoparte]!='') {
    $qualificacao .= ", natural de ";  
    if (intval($dados['NATURALIDADE'.$tipoparte]) == '5300109'):
      $cid_ext = explode("/", $dados['NATURALIDADE'.$tipoparte]);
      $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
    else:
      $e = PESQUISA_ALL_ID('uf_cidade',intval($dados['NATURALIDADE'.$tipoparte])); 
      foreach ($e as $e): 
        $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
      endforeach;
    endif;
  }
  else{$qualificacao .= '<span style="display:none">,</span>';}

// 7 .NACIONALIDADE

  if (!empty($dados['NACIONALIDADE'.$tipoparte]) && $dados['NACIONALIDADE'.$tipoparte]!='') {
    $qualificacao .= ', '.$dados['NACIONALIDADE'.$tipoparte];
  }
  else{$qualificacao .= '<span style="display:none">,</span>';}

  if ($remover!='estadocivil') {
// 8. ESTADO CIVIL 
    if ($dados['SEXO'.$tipoparte] == 'M') {
      if ($dados['ESTADOCIVIL'.$tipoparte] == 'SO') {
        $qualificacao .= ", solteiro";
      } elseif  ($dados['ESTADOCIVIL'.$tipoparte] == 'VI') {
        $qualificacao .= ", viuvo";}
        elseif ($dados['ESTADOCIVIL'.$tipoparte] == 'CA')  {
          $qualificacao .= ", casado";
        }elseif ($dados['ESTADOCIVIL'.$tipoparte] == 'DI')  {
          $qualificacao .= ", divorciado";
        }elseif ($dados['ESTADOCIVIL'.$tipoparte] == 'UN')  {
          $qualificacao .= ", em união estável";
        }

        else {
          $qualificacao .= "";
        }
      }
      else{
        if ($dados['ESTADOCIVIL'.$tipoparte] == 'SO') {
          $qualificacao .= ", solteira";
        } elseif  ($dados['ESTADOCIVIL'.$tipoparte] == 'VI') {
          $qualificacao .= ", viuva";}
          elseif ($dados['ESTADOCIVIL'.$tipoparte] == 'CA')  {
            $qualificacao .= ", casada";
          }elseif ($dados['ESTADOCIVIL'.$tipoparte] == 'DI')  {
            $qualificacao .= ", divorciada";
          }elseif ($dados['ESTADOCIVIL'.$tipoparte] == 'UN')  {
            $qualificacao .= ", em união estável";
          }

          else {
            $qualificacao .= "";
          }
        }

      }
      else{$qualificacao .= '<span style="display:none">,</span>';}

// 9. ENDEREÇO

      if (!empty($dados['ENDERECO'.$tipoparte]) && !empty($dados['BAIRRO'.$tipoparte])  && $dados['ENDERECO'.$tipoparte]!='' && $dados['BAIRRO'.$tipoparte]!='') {
        if ($dados['SEXO'.$tipoparte] == 'M') {
          $qualificacao .= ", residente e domiciliado a ";
        } 
        else{
          $qualificacao .= ", residente e domiciliada a ";
        }
        
      }
      else{$qualificacao .= '<span style="display:none">,</span>';}  
      
// 9.1 LOGRADOURO
      if (!empty($dados['ENDERECO'.$tipoparte]) && $dados['ENDERECO'.$tipoparte]!='') {
        $qualificacao .= $dados['ENDERECO'.$tipoparte];
      }
// 10. BAIRRO
      if (!empty($dados['BAIRRO'.$tipoparte]) && $dados['BAIRRO'.$tipoparte]!='') {
        $qualificacao .= ", ".$dados['BAIRRO'.$tipoparte];
      }
      else{$qualificacao .= '<span style="display:none">,</span>';}
// 11. CIDADE
      if (!empty($dados['CIDADE'.$tipoparte]) && $dados['CIDADE'.$tipoparte]!='') {
        $qualificacao .= ", ";  
        if (intval($dados['CIDADE'.$tipoparte]) == '5300109'):
          $cid_ext = explode("/", $dados['CIDADE'.$tipoparte]);
          $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
        else:
          $e = PESQUISA_ALL_ID('uf_cidade',intval($dados['CIDADE'.$tipoparte])); 
          foreach ($e as $e): 
            $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
          endforeach;
        endif;
      }
      else{$qualificacao .= '<span style="display:none">,</span>';}


// 12. DATA DE NASCIMENTO

      if (!empty($dados['DATANASCIMENTO'.$tipoparte]) && $dados['DATANASCIMENTO'.$tipoparte]!='') {
        if ($dados['SEXO'.$tipoparte] == 'M') {
          $qualificacao .= ", nascido em ";
        }
        else
        {
          $qualificacao .= ", nascida em ";
        }
        
        $data = $dados['DATANASCIMENTO'.$tipoparte] ;
        $novaDataRegistro = explode("-", $data);
        if ($novaDataRegistro[2] == 1 || $novaDataRegistro[2] == 01 ) {
          $qualificacao .= "primeiro";
        }
        elseif ($novaDataRegistro[2] == '2' || $novaDataRegistro[2] == '02' ) {
          $qualificacao .= "dois";
        }
        elseif ($novaDataRegistro[2] == '3' || $novaDataRegistro[2] == '03' ) {
          $qualificacao .= "três";
        }
        elseif ($novaDataRegistro[2] == '4' || $novaDataRegistro[2] == '04' ) {
          $qualificacao .= "quatro";
        }
        elseif ($novaDataRegistro[2] == '5' || $novaDataRegistro[2] == '05' ) {
          $qualificacao .= "cinco";
        }
        elseif ($novaDataRegistro[2] == '6' || $novaDataRegistro[2] == '06' ) {
          $qualificacao .= "seis";
        }
        elseif ($novaDataRegistro[2] == '7' || $novaDataRegistro[2] == '07' ) {
          $qualificacao .= "sete";
        }
        elseif ($novaDataRegistro[2] == '8' || $novaDataRegistro[2] == '08' ) {
          $qualificacao .= "oito";
        }
        elseif ($novaDataRegistro[2] == '9' || $novaDataRegistro[2] == '09' ) {
          $qualificacao .= "nove";
        }

        else{
          $qualificacao .= GExtenso::numero($novaDataRegistro[2]);
        }

        if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
          $qualificacao .= " de janeiro de ";
        }elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
          $qualificacao .= " de fevereiro de ";
        } elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
          $qualificacao .= " de março de ";
        } elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
          $qualificacao .= " de abril de ";
        } elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
          $qualificacao .= " de maio de ";
        } elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
          $qualificacao .= " de junho de ";
        } elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
          $qualificacao .= " de julho de ";
        } elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
          $qualificacao .= " de agosto de ";
        } elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
          $qualificacao .= " de setembro de ";
        } elseif ($novaDataRegistro[1] == '10') {
          $qualificacao .= " de outubro de";
        } elseif ($novaDataRegistro[1] == '11') {
          $qualificacao .= " de novembro de ";
        } elseif ($novaDataRegistro[1] == '12') {
          $qualificacao .= " de dezembro de ";
        } else {
          $qualificacao .= "Não definido";
        }

        $dataAno = $novaDataRegistro[0];
        if (substr($dataAno, -2) == '11') {
          $qualificacao .= GExtenso::numero($dataAno)." onze";
        }
        elseif (substr($dataAno, -1) == '1') {
          $qualificacao .= GExtenso::numero($dataAno)." um";
        }
        else {
          $qualificacao .= GExtenso::numero($dataAno);
        }



        $qualificacao .= " (".date('d/m/Y', strtotime($dados['DATANASCIMENTO'.$tipoparte])).')';
      }
      else{$qualificacao .= '<span style="display:none">,</span>';}

// 13. IDADE

      if (!empty($dados['DATANASCIMENTO'.$tipoparte]) && $dados['DATANASCIMENTO'.$tipoparte]!='') {
        $qualificacao .= ", com ".idade_civil($dados['DATANASCIMENTO'.$tipoparte], $dataRegistro). " anos de idade.";
      }
      else{$qualificacao .= '<span style="display:none">,</span>';}

      
      return $qualificacao;
    }







#MONTA QUALIFICAÇÃO RESUMIDA A PARTIR DO ID DA TABELA 'pessoa'
function montaqualificacaoresumidatext_civil($dados, $dataRegistro,$remover, $tipoparte){
   $qualificacao = '';

// 1. NOME
  $qualificacao .= '<span style="text-transform: uppercase;">'.addslashes($dados['NOME'.$tipoparte]).'</span>';



// 6. NATURALIDADE:
  if (!empty($dados['NATURALIDADE'.$tipoparte]) && $dados['NATURALIDADE'.$tipoparte]!='') {
    $qualificacao .= ", natural de ";  
    if (intval($dados['NATURALIDADE'.$tipoparte]) == '5300109'):
      $cid_ext = explode("/", $dados['NATURALIDADE'.$tipoparte]);
      $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
    else:
      $e = PESQUISA_ALL_ID('uf_cidade',intval($dados['NATURALIDADE'.$tipoparte])); 
      foreach ($e as $e): 
        $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
      endforeach;
    endif;
  }

// 9. ENDEREÇO

      if (!empty($dados['ENDERECO'.$tipoparte]) && $dados['ENDERECO'.$tipoparte]!='' ) {
        if ($dados['SEXO'.$tipoparte] == 'M') {
          $qualificacao .= ", residente e domiciliado a ";
        } 
        else{
          $qualificacao .= ", residente e domiciliada a ";
        }
        
      }  
      
// 10. LOGRADOURO
      if (!empty($dados['ENDERECO'.$tipoparte]) && $dados['ENDERECO'.$tipoparte]!='') {
        $qualificacao .= $dados['ENDERECO'.$tipoparte];
      }
// 11. BAIRRO
      if (!empty($dados['BAIRRO'.$tipoparte]) && $dados['BAIRRO'.$tipoparte]!='') {
        $qualificacao .= ", ".$dados['BAIRRO'.$tipoparte];
      }
// 12. CIDADE
      if (!empty($dados['CIDADE'.$tipoparte]) && $dados['CIDADE'.$tipoparte]!='') {
        $qualificacao .= ", ";  
        if (intval($dados['CIDADE'.$tipoparte]) == '5300109'):
          $cid_ext = explode("/", $dados['CIDADE'.$tipoparte]);
          $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
        else:
          $e = PESQUISA_ALL_ID('uf_cidade',intval($dados['CIDADE'.$tipoparte])); 
          foreach ($e as $e): 
            $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
          endforeach;
        endif;
      }

      
      return $qualificacao;
  }



  #MONTA QUALIFICAÇÃO RESUMIDA A PARTIR DO ID DA TABELA 'pessoa'
function montaqualificacaonubentescertidao_civil($dados, $dataRegistro,$remover, $tipoparte){
   $qualificacao = '';

// 1. NOME
  $qualificacao .= '<span style="text-transform: uppercase;">'.addslashes($dados['NOME'.$tipoparte]).'</span>';



// 6. NATURALIDADE:
  if (!empty($dados['NATURALIDADE'.$tipoparte]) && $dados['NATURALIDADE'.$tipoparte]!='') {
    $qualificacao .= ", natural de ";  
    if (intval($dados['NATURALIDADE'.$tipoparte]) == '5300109'):
      $cid_ext = explode("/", $dados['NATURALIDADE'.$tipoparte]);
      $qualificacao .= '<span style="text-transform: capitalize;">'. $cid_ext[3].'</span>';
    else:
      $e = PESQUISA_ALL_ID('uf_cidade',intval($dados['NATURALIDADE'.$tipoparte])); 
      foreach ($e as $e): 
        $qualificacao .= '<span style="text-transform: capitalize;">'.mb_strtolower($e->cidade).'</span>'.'/'.$e->uf ;  
      endforeach;
    endif;
  }


  // 7 .NACIONALIDADE

  if (!empty($dados['NACIONALIDADE'.$tipoparte]) && $dados['NACIONALIDADE'.$tipoparte]!='') {
    $qualificacao .= ', '.$dados['NACIONALIDADE'.$tipoparte];
  }
// 13. DATA DE NASCIMENTO

      if (!empty($dados['DATANASCIMENTO'.$tipoparte]) && $dados['DATANASCIMENTO'.$tipoparte]!='') {
        if ($dados['SEXO'.$tipoparte] == 'M') {
          $qualificacao .= ", nascido em ";
        }
        else
        {
          $qualificacao .= ", nascida em ";
        }
        
        $data = $dados['DATANASCIMENTO'.$tipoparte] ;
        $novaDataRegistro = explode("-", $data);
        if ($novaDataRegistro[2] == 1 || $novaDataRegistro[2] == 01 ) {
          $qualificacao .= "primeiro";
        }
        elseif ($novaDataRegistro[2] == '2' || $novaDataRegistro[2] == '02' ) {
          $qualificacao .= "dois";
        }
        elseif ($novaDataRegistro[2] == '3' || $novaDataRegistro[2] == '03' ) {
          $qualificacao .= "três";
        }
        elseif ($novaDataRegistro[2] == '4' || $novaDataRegistro[2] == '04' ) {
          $qualificacao .= "quatro";
        }
        elseif ($novaDataRegistro[2] == '5' || $novaDataRegistro[2] == '05' ) {
          $qualificacao .= "cinco";
        }
        elseif ($novaDataRegistro[2] == '6' || $novaDataRegistro[2] == '06' ) {
          $qualificacao .= "seis";
        }
        elseif ($novaDataRegistro[2] == '7' || $novaDataRegistro[2] == '07' ) {
          $qualificacao .= "sete";
        }
        elseif ($novaDataRegistro[2] == '8' || $novaDataRegistro[2] == '08' ) {
          $qualificacao .= "oito";
        }
        elseif ($novaDataRegistro[2] == '9' || $novaDataRegistro[2] == '09' ) {
          $qualificacao .= "nove";
        }

        else{
          $qualificacao .= GExtenso::numero($novaDataRegistro[2]);
        }

        if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
          $qualificacao .= " de janeiro de ";
        }elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
          $qualificacao .= " de fevereiro de ";
        } elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
          $qualificacao .= " de março de ";
        } elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
          $qualificacao .= " de abril de ";
        } elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
          $qualificacao .= " de maio de ";
        } elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
          $qualificacao .= " de junho de ";
        } elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
          $qualificacao .= " de julho de ";
        } elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
          $qualificacao .= " de agosto de ";
        } elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
          $qualificacao .= " de setembro de ";
        } elseif ($novaDataRegistro[1] == '10') {
          $qualificacao .= " de outubro de";
        } elseif ($novaDataRegistro[1] == '11') {
          $qualificacao .= " de novembro de ";
        } elseif ($novaDataRegistro[1] == '12') {
          $qualificacao .= " de dezembro de ";
        } else {
          $qualificacao .= "Não definido";
        }

        $dataAno = $novaDataRegistro[0];
        if (substr($dataAno, -2) == '11') {
          $qualificacao .= GExtenso::numero($dataAno)." onze";
        }
        elseif (substr($dataAno, -1) == '1') {
          $qualificacao .= GExtenso::numero($dataAno)." um";
        }
        else {
          $qualificacao .= GExtenso::numero($dataAno);
        }



        $qualificacao .= " (".date('d/m/Y', strtotime($dados['DATANASCIMENTO'.$tipoparte])).')';
      }

      
      return $qualificacao;
  }


  function avinvisivel($id, $livro, $folha, $nome, $tipo){
    $pdo = conectar();
    $temav = '';

    if($tipo == 'nas'){
      $averbacao = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$livro' and strFolha = '$folha' and setRegistroInvisivel!='N' and nome = '$nome'");
      $averbacao->execute();
      $obs = $pdo->prepare("SELECT * FROM info_registros_civil where id_registro_nascimento = '$id' and obs_visivel_certidao!='S'");
      $obs->execute();
    }


    if($tipo == 'cas'){
      $averbacao = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$livro' and strFolha = '$folha' and setRegistroInvisivel!='N' and strTipo = 'CA'");
      $averbacao->execute();
      $obs = $pdo->prepare("SELECT * FROM info_registros_civil where id_registro_casamento = '$id' and obs_visivel_certidao!='S'");
      $obs->execute();
    }

    if($tipo == 'obt'){
      $averbacao = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$livro' and strFolha = '$folha' and setRegistroInvisivel!='N' and nome = '$nome'");
      $averbacao->execute();
      $obs = $pdo->prepare("SELECT * FROM info_registros_civil where id_registro_obito = '$id' and obs_visivel_certidao!='S'");
      $obs->execute();
    }

    if($tipo == 'live'){
      $averbacao = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$livro' and strFolha = '$folha' and setRegistroInvisivel!='N' and strTipo = 'ES'");
      $averbacao->execute();
      $obs = $pdo->prepare("SELECT * FROM info_registros_civil where id_registro_especial = '$id' and obs_visivel_certidao!='S'");
      $obs->execute();
    }

    if ($averbacao->rowCount()>0) {
      $temav = 'ok';
    }
    if ($obs->rowCount()>0) {
      $temav = 'ok';
    }

    if ($temav!='') {
      echo "EXISTEM AVERBAÇÕES A MARGEM DO TERMO.";
    } 

  }




function buscamotivocancelamento($id, $tipo){
$pdo = conectar();
if ($tipo == 'nas') {
$campo = "id_registro_nascimento";
}
elseif($tipo == 'cas'){
$campo = "id_registro_casamento";
}

elseif($tipo == 'obt'){
$campo = "id_registro_obito"; 
}

elseif($tipo == 'live'){
$campo = "id_registro_especial"; 
}


$busca = $pdo->prepare("SELECT * FROM info_registros_civil where $campo = '$id' and obs_visivel_certidao = 'C'");
$busca->execute();
if ($busca->rowCount()>0) {
$linhas = $busca->fetch(PDO::FETCH_ASSOC);
return $linhas['observacoes_registro'];
}

}


 ?>

 <?php require_once('funcoes.php') ?>
