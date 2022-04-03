<?php


function rnfv($string){
  if (empty($string)) {
    return "NÃO INFORMADO";
  }

  else{
    return $string;
  }
}



include('../controller/db_functions.php');
$pdo = conectar();


if(isset($_POST["seloCodigo"]) && !empty($_POST["seloCodigo"])){
    //Get all state data
    $cpf = $_POST['seloCodigo'];
    $limpar = array(".","-");
$cpf_limpo = str_replace($limpar,"", $cpf);



#echo $cpf_limpo.'<br>';
$num1 =  substr($cpf_limpo,0,1);
$num2 =  substr($cpf_limpo,1,1);
$num3 =  substr($cpf_limpo,2,1);
$num4 =  substr($cpf_limpo,3,1);
$num5 =  substr($cpf_limpo,4,1);
$num6 =  substr($cpf_limpo,5,1);
$num7 =  substr($cpf_limpo,6,1);
$num8 =  substr($cpf_limpo,7,1);
$num9 =  substr($cpf_limpo,8,1);


#MULTIPLICANDO CADA NUMERO 
$num1 = $num1 * 10;
$num2 = $num2 * 9;
$num3 = $num3 * 8;
$num4 = $num4 * 7;
$num5 = $num5 * 6;
$num6 = $num6 * 5;
$num7 = $num7 * 4;
$num8 = $num8 * 3;
$num9 = $num9 * 2;

$somatorio1 = $num1+ $num2 + $num3 + $num4 + $num5 + $num6 + $num7 + $num8 + $num9;
#echo $somatorio1;
$divisao = intval($somatorio1*10/11);
#echo $divisao;

if ($somatorio1*10%11 == 10 || $somatorio1*10%11 ==11 ) {
$digito1 = 0; 
}
else{
  $digito1 =  intval($somatorio1*10%11);
}


#digito 2:
$num1 =  substr($cpf_limpo,0,1);
$num2 =  substr($cpf_limpo,1,1);
$num3 =  substr($cpf_limpo,2,1);
$num4 =  substr($cpf_limpo,3,1);
$num5 =  substr($cpf_limpo,4,1);
$num6 =  substr($cpf_limpo,5,1);
$num7 =  substr($cpf_limpo,6,1);
$num8 =  substr($cpf_limpo,7,1);
$num9 =  substr($cpf_limpo,8,1);

$num1 = $num1 * 11;
$num2 = $num2 * 10;
$num3 = $num3 * 9;
$num4 = $num4 * 8;
$num5 = $num5 * 7;
$num6 = $num6 * 6;
$num7 = $num7 * 5;
$num8 = $num8 * 4;
$num9 = $num9 * 3;
$md1 = $digito1 * 2;



$somatorio2 = intval($num1+ $num2 + $num3 + $num4 + $num5 + $num6 + $num7 + $num8 + $num9 + $md1);

if ($somatorio2*10%11 == 10 || $somatorio2*10%11 == 11 ) {
  $digito2 = 0;
}
else{
  $digito2 = $somatorio2*10%11;
}

    if ($digito1 == substr($cpf_limpo, 9,1) && $digito2 == substr($cpf_limpo, 10,1)){
      echo '<div class="alert alert-success" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
          <i class="material-icons align-text-top">verified_user</i>
          <span>Tudo certo !!! CPF válido</span>
          </div>

          <!-- fecha o alerta depois de 5 segundos o alerta
          <script>
          window.setTimeout(function() {
          $(".alert").fadeTo(5000, 0).slideUp(500, function(){
            $(this).remove();
          });
          }, 4000);
               </script> -->
          ';


       
}

else{
     die('<div class="alert bg-red " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="material-icons align-baseline">error</i>
        <span> CPF INVÁLIDO!!!  </span>
        </div>

        <!-- fecha o alerta depois de 5 segundos o alerta
        <script>
        window.setTimeout(function() {
        $(".alert").fadeTo(5000, 0).slideUp(500, function(){
          $(this).remove();
        });
        }, 4000);
             </script> -->

        ');
}
}




#BUSCA E PREENCHIMENTO DE CADASTRO: --------------------------------------------------------------------------------------------------------------------------------------
      if (isset($_POST['buscacpf'])) {
          $busca = $_POST['buscacpf'];
          $parte = $_POST['parte'];
          if (empty($busca)) {
          die('');
          }
          $query = $pdo->prepare("SELECT ID, setTipoPessoa, hiddencaminhofoto, strNome, strRazaoSocial,strCPFcnpj, strRG, strOrgaoEm, strProfissao, strNaturalidade, setSexo, strNacionalidade,dataNascimento,setEstadoCivil,strNomeFilhos,strNomeConjuge,strNomeExConjuge,dataCasamento,strCartorioCasamento,strLogradouro,strEmail,strBairro,intUFcidade,strUF,strTelefone,strTelCelular,strNomePai,strNomeMae,dataCadastro,strRepresentante1,strRepresentante2,strRepresentante3,strObservacao,setRegimeBens,dataEmissao,strFicha,tipo_cadastro, pessoa_viva, descdocestrangeiro, docestrangeiro, RETORNOSELODIGITAL from pessoa WHERE strCPFcnpj='$busca' LIMIT 1");
          $query->execute();
          if ($query->rowCount()<1) {
          die('<span style="font-size: 9px" class="badge bg-red ">PESSOA NÃO CADASTRADA, CLIQUE NO BOTÃO PARA CADASTRAR</span> <a href="http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/cadastro_pessoas_new" target="_blank" class="btn bg-indigo col-md-12"> + CADASTRAR</a>');
          }
          $linhas_query = $query->fetch(PDO::FETCH_ASSOC);

          $qualificacao =rnfv($linhas_query['strNome']).', CPF: '.rnfv($linhas_query['strCPFcnpj']);
          die('<textarea class="form-control" readonly="" id="TEXTDEMONSTCPF'.$parte.'" name="TEXTDEMONSTCPF'.$parte.'" >'.$qualificacao.'</textarea>
            <input type="hidden" id="IDPESSOAPARTE'.$parte.'" name="IDPESSOAPARTE'.$parte.'" value="'.$linhas_query['ID'].'">
              <label class="col-md-12">QUALIFICAÇÃO PAI</label>
            <textarea class="form-control"  id="QUALIFICACAOPAI'.$parte.'" name="QUALIFICACAOPAI'.$parte.'" >'.$linhas_query['strNomePai'].'</textarea>
            <span class=""><i class="material-icons">info</i> Ex: Pedro da Silva, solteiro, brasileiro, domiciliado em...</span>
            <legend> </legend>
              <label class="col-md-12">QUALIFICAÇÃO MÃE</label>
              <textarea class="form-control" id="QUALIFICACAOMAE'.$parte.'" name="QUALIFICACAOMAE'.$parte.'" >'.$linhas_query['strNomeMae'].'</textarea>
              <span class=""><i class="material-icons">info</i> Ex: Maria da Silva, solteira, brasileira, domiciliada em...</span>
          <a id="editabotãocadastro'.$parte.'" class="btn bg-amber col-md-12" href="http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/cadastro_pessoas_edit.php?id='.$linhas_query['ID'].'" target="_blank">+<i class="material-icons">edit</i>VER EDITAR DADOS</a>
          ');
      }


      if (isset($_POST['buscarg'])) {
            $busca = $_POST['buscarg'];
            $parte = $_POST['parte'];
            if (empty($busca)) {
            die('');
            }
            $query = $pdo->prepare("SELECT ID, setTipoPessoa, hiddencaminhofoto, strNome, strRazaoSocial,strCPFcnpj, strRG, strOrgaoEm, strProfissao, strNaturalidade, setSexo, strNacionalidade,dataNascimento,setEstadoCivil,strNomeFilhos,strNomeConjuge,strNomeExConjuge,dataCasamento,strCartorioCasamento,strLogradouro,strEmail,strBairro,intUFcidade,strUF,strTelefone,strTelCelular,strNomePai,strNomeMae,dataCadastro,strRepresentante1,strRepresentante2,strRepresentante3,strObservacao,setRegimeBens,dataEmissao,strFicha,tipo_cadastro, pessoa_viva, descdocestrangeiro, docestrangeiro, RETORNOSELODIGITAL from pessoa WHERE strRG = '$busca' LIMIT 1");
            $query->execute();
            if ($query->rowCount()<1) {
            die('<span style="font-size: 9px" class="badge bg-red ">PESSOA NÃO CADASTRADA, CLIQUE NO BOTÃO PARA CADASTRAR</span> <a href="http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/cadastro_pessoas_new" target="_blank" class="btn bg-indigo col-md-12"> + CADASTRAR</a>');
            }
            $linhas_query = $query->fetch(PDO::FETCH_ASSOC);
            $qualificacao =rnfv($linhas_query['strNome']).', RG: '.rnfv($linhas_query['strRG']).'/'.$linhas_query['strOrgaoEm'];
              die('<textarea class="form-control" readonly="" id="TEXTDEMONSTCPF'.$parte.'" name="TEXTDEMONSTCPF'.$parte.'" >'.$qualificacao.'</textarea>
                <input type="hidden" id="IDPESSOAPARTE'.$parte.'" name="IDPESSOAPARTE'.$parte.'" value="'.$linhas_query['ID'].'">
              <label class="col-md-12">QUALIFICAÇÃO PAI</label>
            <textarea class="form-control"  id="QUALIFICACAOPAI'.$parte.'" name="QUALIFICACAOPAI'.$parte.'" >'.$linhas_query['strNomePai'].'</textarea>
            <span class=""><i class="material-icons">info</i> Ex: Pedro da Silva, solteiro, brasileiro, domiciliado em...</span>
            <legend> </legend>
              <label class="col-md-12">QUALIFICAÇÃO MÃE</label>
              <textarea class="form-control" id="QUALIFICACAOMAE'.$parte.'" name="QUALIFICACAOMAE'.$parte.'" >'.$linhas_query['strNomeMae'].'</textarea>
              <span class=""><i class="material-icons">info</i> Ex: Maria da Silva, solteira, brasileira, domiciliada em...</span>
          <a id="editabotãocadastro'.$parte.'" class="btn bg-amber col-md-12" href="http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/cadastro_pessoas_edit.php?id='.$linhas_query['ID'].'" target="_blank">+<i class="material-icons">edit</i>VER EDITAR DADOS</a>
          ');
      }


      if (isset($_POST['buscadoc'])) {
            $busca = $_POST['buscadoc'];
            $parte = $_POST['parte'];
            if (empty($busca)) {
            die('');
            }
            $query = $pdo->prepare("SELECT ID, setTipoPessoa, hiddencaminhofoto, strNome, strRazaoSocial,strCPFcnpj, strRG, strOrgaoEm, strProfissao, strNaturalidade, setSexo, strNacionalidade,dataNascimento,setEstadoCivil,strNomeFilhos,strNomeConjuge,strNomeExConjuge,dataCasamento,strCartorioCasamento,strLogradouro,strEmail,strBairro,intUFcidade,strUF,strTelefone,strTelCelular,strNomePai,strNomeMae,dataCadastro,strRepresentante1,strRepresentante2,strRepresentante3,strObservacao,setRegimeBens,dataEmissao,strFicha,tipo_cadastro, pessoa_viva, descdocestrangeiro, docestrangeiro, RETORNOSELODIGITAL from pessoa WHERE docestrangeiro = '$busca' LIMIT 1");
            $query->execute();
            if ($query->rowCount()<1) {
            die('<span style="font-size: 9px" class="badge bg-red ">PESSOA NÃO CADASTRADA, CLIQUE NO BOTÃO PARA CADASTRAR</span> <a href="http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/cadastro_pessoas_new" target="_blank" class="btn bg-indigo col-md-12"> + CADASTRAR</a>');
            }
            $linhas_query = $query->fetch(PDO::FETCH_ASSOC);
            $qualificacao =rnfv($linhas_query['strNome']).', DOCUMENTO: '.rnfv($linhas_query['descdocestrangeiro']).' NUM.: '.$linhas_query['docestrangeiro'];
              die('<textarea class="form-control" readonly="" id="TEXTDEMONSTCPF'.$parte.'" name="TEXTDEMONSTCPF'.$parte.'" >'.$qualificacao.'</textarea>
                <input type="hidden" id="IDPESSOAPARTE'.$parte.'" name="IDPESSOAPARTE'.$parte.'" value="'.$linhas_query['ID'].'">
              <label class="col-md-12">QUALIFICAÇÃO PAI</label>
            <textarea class="form-control"  id="QUALIFICACAOPAI'.$parte.'" name="QUALIFICACAOPAI'.$parte.'" >'.$linhas_query['strNomePai'].'</textarea>
            <span class=""><i class="material-icons">info</i> Ex: Pedro da Silva, solteiro, brasileiro, domiciliado em...</span>
            <legend> </legend>
              <label class="col-md-12">QUALIFICAÇÃO MÃE</label>
              <textarea class="form-control" id="QUALIFICACAOMAE'.$parte.'" name="QUALIFICACAOMAE'.$parte.'" >'.$linhas_query['strNomeMae'].'</textarea>
              <span class=""><i class="material-icons">info</i> Ex: Maria da Silva, solteira, brasileira, domiciliada em...</span>
          <a id="editabotãocadastro'.$parte.'" class="btn bg-amber col-md-12" href="http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/cadastro_pessoas_edit.php?id='.$linhas_query['ID'].'" target="_blank">+<i class="material-icons">edit</i>VER EDITAR DADOS</a>
          ');
      }
#BUSCA E PREENCHIMENTO DE CADASTRO: --------------------------------------------------------------------------------------------------------------------------------------


#OUTRAS BUSCAS -----------------------------------------------------------------------------------------------------------------------


      if (isset($_POST['cpfrepresentante']) && !empty($_POST['cpfrepresentante']) ) {
      $var_teste = $_POST['cpfrepresentante'];

      $buscando_cpf = $pdo->prepare("SELECT * FROM pessoa where strCPFcnpj = '$var_teste' limit 1");
      $buscando_cpf->execute();
      if ($buscando_cpf->rowCount()>0) {
      $cpf_enc = $buscando_cpf->fetch(PDO::FETCH_ASSOC);
      $nome = $cpf_enc['strNome'];
      if ($cpf_enc['strFicha']< 1) {
        die('0');
      }
      die($nome);
      }
      else{
      die('0');
      }
      }





if (isset($_POST['ficha']) && !empty($_POST['ficha'])) {
$ficha = $_POST['ficha'];
$confere_repeticoes = $pdo->prepare("SELECT ID, strNome FROM pessoa where strFicha = '$ficha' limit 1");
$confere_repeticoes->execute();
if ($confere_repeticoes->rowCount()>0) {
die('<div class="alert bg-red " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="material-icons align-baseline">error</i>
        <span> FICHA JA CADASTRADA!!!  </span>
        </div>

        <script>
        $("#botaosalvar").hide();
        </script>

        <!-- fecha o alerta depois de 5 segundos o alerta
        <script>
        window.setTimeout(function() {
        $(".alert").fadeTo(5000, 0).slideUp(500, function(){
          $(this).remove();
        });
        }, 4000);
             </script> -->

        ');
}
}


if (isset($_POST['pessoas'])) {
$confere_repeticoes = $pdo->prepare("SELECT ID, strNome FROM pessoa where strCPFcnpj = '$cpf' limit 1");
$confere_repeticoes->execute();
if ($confere_repeticoes->rowCount()>0) {
die('<div class="alert bg-red " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="material-icons align-baseline">error</i>
        <span> CPF JÁ EXISTE NO CADASTRO!!!  </span>
        </div>

        <script>
        $("#botaosalvar").hide();
        swal("ERRO","CPF JÁ CADASTRADO","error");
        </script>

        <!-- fecha o alerta depois de 5 segundos o alerta
        <script>
        window.setTimeout(function() {
        $(".alert").fadeTo(5000, 0).slideUp(500, function(){
          $(this).remove();
        });
        }, 4000);
             </script> -->

        ');
}
else{
  die('<script>
$("#botaosalvar").show();
        </script>');
}
}


if (isset($_POST['pessoasRG'])) {
$cpf = $_POST['rgCodigo'];
$orgaoem = $_POST['oemissor'];
$confere_repeticoes = $pdo->prepare("SELECT ID, strNome FROM pessoa where strRG = '$cpf' and strOrgaoEm = '$orgaoem' limit 1");
$confere_repeticoes->execute();
if ($confere_repeticoes->rowCount()>0) {
die('<div class="alert bg-red " role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
        <i class="material-icons align-baseline">error</i>
        <span> RG/ORG.EMISSOR JÁ EXISTE NO CADASTRO!!!  </span>
        </div>

        <script>
        swal("ERRO","RG/ORG.EMISSOR JÁ CADASTRADO","error");
        </script>

        <!-- fecha o alerta depois de 5 segundos o alerta
        <script>
        window.setTimeout(function() {
        $(".alert").fadeTo(5000, 0).slideUp(500, function(){
          $(this).remove();
        });
        }, 4000);
             </script> -->

        ');
}
}


?>


