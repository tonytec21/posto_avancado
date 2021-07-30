<!DOCTYPE html>
<?php include('../../../controller/db_functions.php');
 session_start(); 
$pdo=conectar();

if (!isset($_GET['reimpressao']) && !isset($_SESSION['SELOOLD']) ) {
unset($_SESSION['RETORNOTEMP']);
include('../selador/civil_geral.php');

          if ($token =='' || empty($token)) {
                            $_SESSION['erro'] = 'NENHUM DADO RECEBIDO TENTE NOVAMENTE atualize a página';
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                            break;
                          }


          if ($token !='') {


      #PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
                  $ato_praticado = '14.5.1';
                  $escrevente = $_SESSION['nome'];
                  $nome = $_GET['nome_certidao'];
                  if ($_GET['motivoisentonegativa']!='') {
                  $isento = 'true';
                  $motivo_isento=$_GET['motivoisentonegativa'];
                  }else{
                  $isento = 'false';
                  $motivo_isento='';
                  }
                  
                  
                  $livro ='';
                  $folha='';
                   if (isset($_GET['motivoatoisento']) && $_GET['motivoatoisento']!='') {

                            $ConteudoPOST = '{
                              "ato" :{
                              "codigo":"17.5.1",
                              "codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
                              },
                              "natureza":{
                              "tipo":"0"
                              },
                              "partes": {
                              "nomesPartes":"X",
                              "parteAto":[
                              {
                              "nome":"'.$nome.'"
                              }
                              ]},

                              "selo":{
                              "isento":"true",
                              "motivoIsentoGratuito":"'.$motivo_isento.'",  
                              "escrevente":"'.$escrevente.'",
                              "protocolo": "0000",
                              "valorTitulo": "0000"
                              }



                              }';
                        }  


                        else{
                              $ConteudoPOST = '{
                              "ato" :{
                              "codigo":"17.5.1",
                              "codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
                              },
                              "natureza":{
                              "tipo":"0"
                              },
                              "partes": {
                              "nomesPartes":"X",
                              "parteAto":[
                              {
                              "nome":"'.$nome.'"
                              }
                              ]},

                              "selo":{
                              "escrevente":"'.$escrevente.'",
                              "protocolo": "0000",
                              "valorTitulo": "0000"
                              }



                              }';
                        }        
              
                           $ConteudoCabecalho = [
                              'Authorization: Bearer'.$token,
                              "Content-Type: application/json"
                              
                          ];
                          
                       $handler = curl_init($_SESSION['urlselodigital'].'protesto/certidao');

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
                $LIVRO ='0';
                $FOLHA = '0';
                $TERMO = '0';
                $ATO = '17.5.1';
                $TIPOPAPEL = $_GET['TIPOPAPELSEGURANCA'];
                $NUMEROPAPEL = $_GET['NUMEROPAPELSEGURANCA'];  
                $funcionario = $_SESSION['nome'];
                $insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','CERTIDAO_NEGATIVA_PROTESTO','5','1','$SELO',CURRENT_TIMESTAMP,'CER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
                $UPSEGURANCA = $pdo->prepare("UPDATE folhaseguranca set STATUS = 'U' WHERE EMPRESA = '$TIPOPAPEL' AND PAPEL = '$NUMEROPAPEL'");
                $UPSEGURANCA->execute();  
              
                

                #UPDATE_CAMPO_ID('registro_obito_novo','RETORNOSELODIGITAL',strip_tags($RETORNO),$id);
                $insert_auditoria->execute();
              
                         
                          $_POST['SELO2'] = $SELO;  
                
                

                }





                 if (isset($_GET['selobusca']) && $_GET['selobusca']!='') {
          
                            $ato_praticado = $_GET['selobusca'];
                             
                             if (isset($_GET['motivoatoisento']) && $_GET['motivoatoisento']!='') {

                            $ConteudoPOST = '{
                              "ato" :{
                              "codigo":"17.5.1",
                              "codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
                              },
                              "natureza":{
                              "tipo":"0"
                              },
                              "partes": {
                              "nomesPartes":"X",
                              "parteAto":[
                              {
                              "nome":"'.$nome.'"
                              }
                              ]},

                              "selo":{
                              "isento":"true",
                              "motivoIsentoGratuito":"'.$motivo_isento.'",  
                              "escrevente":"'.$escrevente.'",
                              "protocolo": "0000",
                              "valorTitulo": "0000"
                              }



                              }';
                        }  


                        else{
                              $ConteudoPOST = '{
                              "ato" :{
                              "codigo":"'.$ato_praticado.'",
                              "codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
                              },
                              "escrevente":"'.$escrevente.'",
                              "natureza":{
                              "tipo":"0"
                              },
                              "partes": {
                              "nomesPartes":"X",
                              "parteAto":[
                              {
                              "nome":"'.$nome.'"
                              }
                              ]},

                              "selo":{
                              "escrevente":"'.$escrevente.'",
                              "protocolo": "0000",
                              "valorTitulo": "0000"
                              }



                              }';
                        }     

                            $ConteudoCabecalho = [
                            'Authorization: Bearer'.$token,
                            "Content-Type: application/json"

                            ];



                            $handler = curl_init($_SESSION['urlselodigital'].'protesto/atos-em-geral');

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
                            #parte de auditoria:
                            $LIVRO ='0';
                            $FOLHA = '0';
                            $TERMO = '0';
                            $ATO = $ato_praticado;
                            $TIPOPAPEL = $_GET['TIPOPAPELSEGURANCA'];
                            $NUMEROPAPEL = $_GET['NUMEROPAPELSEGURANCA'];  
                            $funcionario = $_SESSION['nome'];
                            $insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','BUSCA_CERT_NEGATIVA','2','1','$SELOBUSCA',CURRENT_TIMESTAMP,'CER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNOBUSCA')");
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
        $SELO ='0';
      }

?>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Certidão Negativa</title>

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
                        <a href="../cartorio-protesto.php">
                            <i class="material-icons">person</i>
                            <span>Protesto</span>
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
                     
                        <div class="body">

<div class="row clearfix">
<div class="col-sm-12">	
<textarea name="" id="" rows="30">
	
<?php if (isset($SELO)) {include('config_paginas/certidao-negativa-protesto.php');} ?>










</textarea>
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