<!DOCTYPE html>
<?php include('../../../controller/db_functions.php');
$pdo=conectar();
session_start();
$arr = json_decode($_GET['dados'], true);

$func_exp = $_GET['func_exp'];
$cart_exp = $_GET['cart_exp'];
$cid_exp = $_GET['cid_exp'];
$est_exp = $_GET['est_exp'];
$emols_exp = $_GET['emols_exp'];


#var_dump($arr);
#exit();
#echo $arr['nome_crianca'][0];

foreach ($arr as $b => $c) {
#echo $b.': '.$c;
 foreach ($c as $k => $value) {
 $$b = $value;
 }
}

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
ob_clean();
clearstatcache(); 
#aqui tá pegando o id mandado da página pesquisa

if (!isset($_GET['reimpressao'])&&!isset($_SESSION['SELOOLD'])) {

#unset($_SESSION['RETORNOTEMP']);
include('../selador/civil_geral.php');

          if ($token =='' || empty($token)) {
                            $_SESSION['erro'] = 'NENHUM DADO RECEBIDO TENTE NOVAMENTE atualize a página';
                          }


          if ($token !='') {


      #PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
                  if (isset($_GET['CERTPORTATIL'])) {
                   $ato_praticado = '14.5.1';
                  }
                  else{
                  $ato_praticado = '14.5.1';
                  }
                  $escrevente = $_SESSION['nome'];

                  
                  $nomeparte1 =$nome_crianca;
                  $nomeparte2 ='';
                  $nomeparte3 ='';
                  $docparte3='';
                  $nomeparte4 ='';
                  $docparte4='';
                  $livro ='';
                  $folha='';


                  if (isset($_GET['motivoatoisento']) && $_GET['motivoatoisento']!='') {
                   $isento = 'true';
                   $motivo_isento = $_GET['motivoatoisento'];
                   $ConteudoPOST = '{
                                  "cidadeCartorioExpedidor":"'.$cid_exp.'",
                                  "estadoCartorioExpedidor":"'.$est_exp.'",
                                  "nomeCartorioExpedidor":"'.$cart_exp.'",
                                  "nomeFuncionarioExpedidor":"'.$func_exp.'",
                                  "valorEmolumentosCertidao":"'.$emols_exp.'",
                                  "codigoAto":"'.$ato_praticado.'",
                                  "escrevente":"'.$escrevente.'",
                                  "nomeParte":"'.$nomeparte1.'",
                                  "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
                                  "nomesPartes": {
                                  "nomesPartes":"X",
                                  "parteAto":[
                                  {
                                  "nome":"'.$nomeparte1.'"
                                  }
                                  ]},

                                  "dadosSelo":{
                                  "isento":"true",
                                  "motivoIsentoGratuito":"'.$motivo_isento.'",  
                                  "escrevente":"'.$escrevente.'",
                                  "folha": "'.$folha.'",
                                  "livro": "'.$livro.'",
                                  "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
                                  }
                                  }';
                  }
                  else{
                  $isento = 'false';
                  $motivo_isento='';
                  $ConteudoPOST = '{
                                  "cidadeCartorioExpedidor":"'.$cid_exp.'",
                                  "estadoCartorioExpedidor":"'.$est_exp.'",
                                  "nomeCartorioExpedidor":"'.$cart_exp.'",
                                  "nomeFuncionarioExpedidor":"'.$func_exp.'",
                                  "valorEmolumentosCertidao":"'.$emols_exp.'",
                                  "nomeParte":"'.$nomeparte1.'",
                                  "codigoAto":"'.$ato_praticado.'",
                                  "escrevente":"'.$escrevente.'",
                                  "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
                                  "nomesPartes": {
                                  "nomesPartes":"X",
                                  "parteAto":[
                                  {
                                  "nome":"'.$nomeparte1.'"
                                  }
                                  ]},

                                  "dadosSelo":{
                                  "escrevente":"'.$escrevente.'",
                                  "folha": "'.$folha.'",
                                  "livro": "'.$livro.'",
                                  "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
                                  }
                                  }';
                  }

              
                          $ConteudoCabecalho = [
                              'Authorization: Bearer'.$token,
                              "Content-Type: application/json"
                              
                          ];
                          
                       

                          $handler = curl_init($_SESSION['urlselodigital'].'civil/certidao/materializacao');

                          curl_setopt_array($handler, [

                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_SSL_VERIFYHOST => 0,
                          CURLOPT_SSL_VERIFYPEER => 0,
                          CURLOPT_TIMEOUT => 0,
                          CURLOPT_FOLLOWLOCATION => false,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "POST",
                          CURLOPT_POSTFIELDS =>"$ConteudoPOST",
                          CURLOPT_HTTPHEADER => array(
                          "Authorization: Bearer $token",
                          "Content-Type: application/json"
                          ),
                          ]);

                          $resp = curl_exec($handler);
                          $resp = json_decode($resp, true);
                          #var_dump($resp);
                          #echo curl_error($handler);
                          $erro = curl_error($handler);
                          if (isset($resp['status'])) {
                    #die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
                    $_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    break;
                  }
                          $SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
                          $TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
                          $QRCODE = $resp['resumos'][0]['valorQrCode'];
                          $RETORNO = json_encode($resp['resumos'][0]);
                          $_SESSION['SELOOLD'] =$SELO;
                          $_SESSION['sucesso'] = $SELO;
                          $_SESSION['RETORNOTEMP'] = $RETORNO;
                          #echo $resp['resumos'][0]['dataGeracao'].'<br>';
                          #echo $resp['resumos'][0]['numeroSelo'].'<br>';
                          #echo $resp['resumos'][0]['numeroSelo'].'<br>';
                          #$info = curl_getinfo($handler);
                          #var_dump($info);
                          #echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];



                
                if ($erro!='') {
                              $erro;
                          }
                
                  

                         
                          

                          else{
                
                #parte de auditoria:
                $LIVRO = $r->LIVRONASCIMENTO;
                $FOLHA = $r->FOLHANASCIMENTO;
                $TERMO = intval($r->TERMONASCIMENTO);
                $ATO = '14.5.1';
                $TIPOPAPEL = $_GET['TIPOPAPELSEGURANCA'];
                $NUMEROPAPEL = $_GET['NUMEROPAPELSEGURANCA'];  
                $funcionario = $_SESSION['nome'];
                $insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','2VIA_NASCIMENTO','2','1','$SELO',CURRENT_TIMESTAMP,'CER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
                $UPSEGURANCA = $pdo->prepare("UPDATE folhaseguranca set STATUS = 'U' WHERE EMPRESA = '$TIPOPAPEL' AND PAPEL = '$NUMEROPAPEL'");
                $UPSEGURANCA->execute();  
              
                

                #UPDATE_CAMPO_ID('registro_obito_novo','RETORNOSELODIGITAL',strip_tags($RETORNO),$id);
                $insert_auditoria->execute();
              
                         
                          $_POST['SELO2'] = $SELO;  
                
                

                }




      if (isset($_GET['selobusca']) && $_GET['selobusca']!='') {
          
                            $ato_praticado = $_GET['selobusca'];
                            if (isset($_GET['motivoatoisento']) && $_GET['motivoatoisento']!='') {
                            $isento = 'true';
                            $motivo_isento = $_GET['motivoatoisento'];
                            $ConteudoPOST = '{
                            "codigoAto":"'.$ato_praticado.'",
                            "escrevente":"'.$escrevente.'",
                            "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
                            "nomesPartes": {
                            "nomesPartes":"X",
                            "parteAto":[
                            {
                            "nome":"'.$nomeparte1.'"
                            }
                            ]},

                            "dadosSelo":{
                            "isento":"true",
                            "motivoIsentoGratuito":"'.$motivo_isento.'",  
                            "escrevente":"'.$escrevente.'",
                            "folha": "'.$folha.'",
                            "livro": "'.$livro.'",
                            "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
                            }
                            }';
                            }
                            else{
                            $isento = 'false';
                            $motivo_isento='';
                            $ConteudoPOST = '{
                            "codigoAto":"'.$ato_praticado.'",
                            "escrevente":"'.$escrevente.'",
                            "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
                            "nomesPartes": {
                            "nomesPartes":"X",
                            "parteAto":[
                            {
                            "nome":"'.$nomeparte1.'"
                            }
                            ]},

                            "dadosSelo":{
                            "escrevente":"'.$escrevente.'",
                            "folha": "'.$folha.'",
                            "livro": "'.$livro.'",
                            "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
                            }
                            }';
                            }


                            $ConteudoCabecalho = [
                            'Authorization: Bearer'.$token,
                            "Content-Type: application/json"

                            ];



                            $handler = curl_init($_SESSION['urlselodigital'].'civil/atos-em-geral');

                            curl_setopt_array($handler, [

                            CURLOPT_RETURNTRANSFER => true,
                            CURLOPT_ENCODING => "",
                            CURLOPT_MAXREDIRS => 10,
                            CURLOPT_SSL_VERIFYHOST => 0,
                            CURLOPT_SSL_VERIFYPEER => 0,
                            CURLOPT_TIMEOUT => 0,
                            CURLOPT_FOLLOWLOCATION => false,
                            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                            CURLOPT_CUSTOMREQUEST => "POST",
                            CURLOPT_POSTFIELDS =>"$ConteudoPOST",
                            CURLOPT_HTTPHEADER => array(
                            "Authorization: Bearer $token",
                            "Content-Type: application/json"
                            ),
                            ]);

                            $resp = curl_exec($handler);
                            $resp = json_decode($resp, true);
                            #var_dump($resp);
                            #echo curl_error($handler);
                            $erro = curl_error($handler);
                            if (isset($resp['status'])) {
                            #die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
                            $_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                            break;
                            }
                            $SELOBUSCA = $resp['resumos'][0]['numeroSelo'].'<br>';
                            $TEXTOSELOBUSCA = $resp['resumos'][0]['textoSelo'].'<br>';
                            $QRCODEBUSCA = $resp['resumos'][0]['valorQrCode'];
                            $RETORNOBUSCA = json_encode($resp['resumos'][0]);
                            $_SESSION['SELOOLDBUSCA'] =$SELOBUSCA;
                            $_SESSION['sucesso'] .= '<br>'.$SELOBUSCA;
                            $_SESSION['RETORNOTEMPBUSCA'] = $RETORNOBUSCA;
                            #echo $resp['resumos'][0]['dataGeracao'].'<br>';
                            #echo $resp['resumos'][0]['numeroSelo'].'<br>';
                            #echo $resp['resumos'][0]['numeroSelo'].'<br>';
                            #$info = curl_getinfo($handler);
                            #var_dump($info);
                            #echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];




                            if ($erro!='') {
                            $erro;
                            }






                            else{

                            #parte de auditoria:
                            $LIVRO = $r->LIVRONASCIMENTO;
                            $FOLHA = $r->FOLHANASCIMENTO;
                            $TERMO = intval($r->TERMONASCIMENTO);
                            $ATO = $ato_praticado;
                            $TIPOPAPEL = $_GET['TIPOPAPELSEGURANCA'];
                            $NUMEROPAPEL = $_GET['NUMEROPAPELSEGURANCA'];  
                            $funcionario = $_SESSION['nome'];
                            $insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','BUSCA_2VIA_NASCIMENTO','2','1','$SELOBUSCA',CURRENT_TIMESTAMP,'CER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNOBUSCA')");
                            $UPSEGURANCA = $pdo->prepare("UPDATE folhaseguranca set STATUS = 'U' WHERE EMPRESA = '$TIPOPAPEL' AND PAPEL = '$NUMEROPAPEL'");
                            $UPSEGURANCA->execute();  



                            #UPDATE_CAMPO_ID('registro_obito_novo','RETORNOSELODIGITAL',strip_tags($RETORNO),$id);
                            $insert_auditoria->execute();


                            $_POST['SELO2'] = $SELO;  



                            }



            }      
         


      }
      }
else{
  $SELO = '0';
}

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>Obito - Impressões</title>

    <!-- Favicon-->
    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="../../../plugins/icon/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="../../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="../../../plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="../../../plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="../../../plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">



    <!-- noUISlider Css -->
    <link href="../../../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../../css/themes/all-themes.css" rel="stylesheet" />

      <script src="../../../plugins/ajax/ajax.min.js"></script>

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Carregando...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
       <nav class="navbar" style="background: rgba(0,0,0,.9)">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#"><img src="../../../images/logo_1.png" id="imgBookc"  style="max-width: 9%"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">

                <ul class="nav navbar-nav navbar-right" style="margin-top: 10px">
                    <!-- Call Search -->
             <div class="btn-group col-md-3" style="background: none;border: none;box-shadow: none;">
                                    <button type="button" class="btn  bg-red dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                      <i class="material-icons">favorite</i> Casamento <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="../bd_INSERTS/insert-casamento.php" class=" waves-effect waves-block"> + Novo</a></li>
                                        <li><a href="../pesquisa-casamento.php" class=" waves-effect waves-block">Pesquisa</a></li>


                                    </ul>
                                </div>
                                     <div class="btn-group col-md-3" style="background: none;border: none;box-shadow: none;">
                                    <button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                      <i class="material-icons">child_friendly</i> Nascimento <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                   <li><a href="../bd_INSERTS/insert-nascimento.php" class=" waves-effect waves-block"> + Novo</a></li>
                                        <li><a href="../pesquisa-nascimento.php" class=" waves-effect waves-block">Pesquisa</a></li>
                                    </ul>
                                </div>
                                     <div class="btn-group col-md-3" style="background: none;border: none;box-shadow: none;margin-left: 5px">
                                    <button type="button" class="btn bg-grey dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                      <i class="material-icons">airline_seat_flat</i> Óbito <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                         <li><a href="../bd_INSERTS/insert-obito.php" class=" waves-effect waves-block"> + Novo</a></li>
                                        <li><a href="../pesquisa-obito.php" class=" waves-effect waves-block">Pesquisa</a></li>
                                    </ul>
                                </div>

<li class="col-md-2 hide-on-med-and-down" ><a style="margin-top:-7px" class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons large" style="font-size: 30px">settings_overscan</i></a></li>

                </ul>



            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
   <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar"  >
            <!-- User Info -->

            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <!--li class="header">MENU PRINCIPAL</li-->
                    <li class="active">
                        <a href="../../../index.php">
                            <i class="material-icons">home</i>
                            <span>Área de Trabalho</span>
                        </a>
                    </li>
                         <li class="active">
                        <a href="../cartorio-civil.php">
                            <i class="material-icons">person</i>
                            <span>Registro Civil</span>
                        </a>
                    </li>
                       <a target="_blank" href="../pessoas.php"><h6><i class="material-icons">person</i> CADASTRAR PESSOA </h6></a>
                           <a target="_blank" href="../cadastro-serventia.php?id=1"><h6><i class="material-icons">lock</i> INFORMAÇÕES DA SERVENTIA  </h6></a>
                                 <a target="_blank" href="../configuracoes-livro.php"><h6> <i class="material-icons">lock</i> LIVROS  </h6></a>
                                 <a target="_blank" href="../selo-fisico.php"><h6><i class="material-icons">lock</i> SELOS  </h6></a>
                                    <a target="_blank" href="../cadastro-funcionario.php"><h6><i class="material-icons">lock</i> FUNCIONÁRIOS  </h6></a>
                        <ul class="ml-menu">
                            <li>
                            <!--##################### MENU LATERAL ##################################-->

                                <li class="">
                            <!--##################### CART NOTAS: ##################################-->
                                    <li>
                                     
                                    </li>
                                     <li>
                                  
                                    </li>
                                     <li>
                                        
                                    </li>
                                     <li>
                                     
                                    </li>
                                   
                                </li>
                            </li>

                        </ul>
                    </li>
                  </li>
              

          
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <!--div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

        <!-- #END# Right Sidebar -->
    </section>
        <section class="content" style="margin-left: 30px"  >
        	   <div class="container-fluid">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <h2>REGISTRO NASCIMENTO LIVRO A</h2>

                        </div>
                        <div class="body">

<div class="row clearfix">
<div class="col-sm-12">	
<form action="" method="POST" enctype="multipart/form-data">
<textarea name="textoregistro" id="" rows="30">
	
<?php 


if (isset($SELO)) {include('config_paginas/registro-nascimento-materializacao.php');}?>










</textarea>
<button type="subimit" class="btn waves-effect bg-teal badge">SALVAR ALTERAÇÕES <i class="material-icons">book</i></button>
<?php if (isset($_GET['xmlcertidao'])): ?>  
<a  class="btn waves-effect bg-orange" href="../bd_INSERTS/gerador-certidao-xml-nascimento.php?id=<?=$id?>&CODIGOPEDIDOXML=<?=$_GET['CODIGOPEDIDOXML']?>">GERAR ARQUIVO XML</a>
<?php endif ?>

<?php 

if (isset($_POST['textoregistro'])) :

$id_slv = '0000';
$tipo_slv = '2_VIA_CERTIDAO_NASCIMENTO_'.str_replace(".png", "", str_replace(" ", "", $img_nome));
$texto_salvar = '<html>
<head>

<style type="text/css">
fieldset{

margin-top: 0.5%;
margin-bottom: 0.5%;
font-size: 100%;
font-weight: bold;
}
legend{
  font-weight: bold;
  font-size: 80%;
}
table{
  border: 1px solid black;
  font-size: 50%;
}
thead{
  border-bottom: 1px solid black;
}
th{
  border-left: 1px solid black;
}

td{
border-left: 1px solid black;
border-bottom: 1px solid black
}
.left{
  float: left;
  font-size: 100%!important;
  font-weight: bold;
}
.right{
  float: right;
  font-size: 100%!important;
  font-weight: bold;
  text-align: center;
}
body{text-transform: uppercase; padding-left: 2cm;padding-right: 2cm; padding-top: 4cm;padding-bottom: 2cm;zoom:80%; }
</style>
</head>
'.str_replace("qrimagens", "PDFS/qrimagens", $_POST['textoregistro']).'</html>';
$texto_salvar = str_replace("<div><fieldset", "<fieldset", $texto_salvar);
$busca_ja_existe = $pdo->prepare("SELECT * FROM salvar_editor where IDREGISTRO = '$id_slv' and TIPO = '$tipo_slv'");
$busca_ja_existe->execute();

if ($busca_ja_existe->rowCount()!=0) {
$up = $pdo->prepare("update salvar_editor set TEXTO = '$texto_salvar' where IDREGISTRO = '$id_slv' and TIPO = '$tipo_slv' ");
$up->execute();
}
else{
$in = $pdo->prepare("INSERT into salvar_editor values('$id_slv', '$tipo_slv', '$texto_salvar')");
$in->execute();
}

$_SESSION['sucesso'] = 'ALTERAÇÕES SALVAS';



 ?>


  <script type="text/javascript">
    window.location.assign('<?="http://" .  $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']?>');

  </script>

<?php unset($_POST['textoregistro']); endif;  ?>



</form>
</div>
</div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <!-- Bootstrap Core Js -->
<script src="../../../plugins/bootstrap/js/bootstrap.js"></script>


<!-- Slimscroll Plugin Js -->
<script src="../../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../../../plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="../../../plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="../../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="../../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="../../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="../../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="../../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="../../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="../../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Input Mask Plugin Js -->
    <script src="../../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<!-- Custom Js -->
<script src="../../../js/admin.js"></script>
<script src="../../../js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="../../../js/demo.js"></script>
<script src="../../../plugins/ajax/screen.js"></script>

<!-- TinyMCE -->
<script src="../../../js/pages/forms/editors.js"></script>
<script src="../../../plugins/tinymce/tinymce.js"></script>


<script>
  tinymce.init({
  selector: 'textarea',
    language: 'pt_BR',
    language_url : '../../../plugins/tinymce/langs/pt_BR.js',
    theme: 'modern',
    plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
       toolbar2: 'print preview media | forecolor backcolor emoticons | fontsizeselect fontselect',
      font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;Arial Black=arial black,avant garde;Indie Flower=indie flower, cursive;Times New Roman=times new roman,times;',
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
       image_advtab: true,
     file_picker_callback: function(callback, value, meta) {
     if (meta.filetype == 'image') {
       $('#upload').trigger('click');
       $('#upload').on('change', function() {
         var file = this.files[0];
         var reader = new FileReader();
         reader.onload = function(e) {
           callback(e.target.result, {
             alt: ''
           });
         };
         reader.readAsDataURL(file);
       });
     }
   }
  });
  </script>
   <input name="image" type="file" id="upload" class="hidden" onchange="">
       <div class="modal fade  " id="sucesso" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content bg-green">
                     <div class="alert bg-green alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <h2 class="text-center">
                              <i class="material-icons">verified_user</i> </h2>
                              <p class="text-center"><?=$_SESSION['sucesso']?></p>
                               
                            </div>
                    </div>
                </div>
            </div>

              <div class="modal fade  " id="erro" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content bg-red">
                     <div class="alert bg-red alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h2 class="text-center">
                              <i class="material-icons">error_outline</i>
                             </h2>
                                <p class="text-center"> <?=$_SESSION['erro']?></p>

                            </div>
                    </div>
                </div>
            </div>


<?php if (isset($_SESSION['sucesso'])):?>
<script> $("#sucesso").modal();</script>

<?php
unset($_SESSION['sucesso']);
endif ?>


<?php if (isset($_SESSION['erro'])):?>
<script> $("#erro").modal();</script>

<?php
unset($_SESSION['erro']);
endif ?>

</body>
</html>

