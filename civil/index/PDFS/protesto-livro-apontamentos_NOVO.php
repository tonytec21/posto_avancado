<!DOCTYPE html>
<?php session_start();
include('../../../controller/db_functions.php');
$pdo=conectar();
$count = 0;
function molda_cpf($var){

if (substr($var, 0,3) == 000) {
$var = substr($var, 3,11);
}

  if (strlen($var) == 11) {
    return substr($var, 0,3).'.'.substr($var, 3,3).'.'.substr($var, 6,3).'-'.substr($var, 9,2);
  }

  else{
  return substr($var, 0,2).'.'.substr($var, 2,3).'.'.substr($var, 5,3).'/'.substr($var, 8,4).'-'.substr($var, 12,2);  
  }
}

 ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 

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

<div class="btn-group col-md-3" style="background: none;border: none;box-shadow: none;margin-right: 70px;">
<button type="button" class="btn bg-light-green dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
<i class="material-icons">monetization_on</i> Protesto <span class="caret"></span>
</button>
<ul class="dropdown-menu">
<li><a href="../protesto-remessa-automatica.php" class=" waves-effect waves-block"> Protesto Entrada Automática</a></li>
<li><a href="../protesto-entrada-manual.php" class=" waves-effect waves-block"> Protesto Entrada Manual</a></li>
<li><a href="../pesquisa-protesto.php" class=" waves-effect waves-block">Pesquisa</a></li>
</ul>
</div>


<li class="col-md-2 hide-on-med-and-down" ><a style="margin-top:-7px; margin-right: -60px;" class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons large" style="font-size: 30px">settings_overscan</i></a></li>

</ul>



            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
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
                            <i class="material-icons">monetization_on</i>
                            <span>Protesto</span>
                        </a>
                    </li>
                       <a target="_blank" href="../pessoas.php"><h6><i class="material-icons">person</i> CADASTRAR PESSOA </h6></a>
                         <a target="_blank" href="../selo-fisico.php"><h6><i class="material-icons">lock</i> SELOS  </h6></a>
                          <a href="../cadastrar-folha-seguranca.php"><h6><i class="material-icons">lock</i> FOLHAS DE SEGURANÇA </h6></a>
                             <a target="_blank" href="../configuracoes-livro.php"><h6> <i class="material-icons">lock</i> LIVROS  </h6></a>
                              <a href="../exportar-ferj.php"><h6><i class="material-icons">lock</i> ARQUIVO FERJ </h6></a>
                              <a href="../incluir-lembrete.php"><h6><i class="material-icons">alarm</i> LEMBRETES </h6></a>
                        <?php if (isset($_SESSION['logadoAdm']) && $_SESSION['logadoAdm'] =='S'): ?>
                           <a target="_blank" href="../cadastro-serventia.php?id=1"><h6><i class="material-icons">lock</i> INFORMAÇÕES DA SERVENTIA  </h6></a>
                                    <a target="_blank" href="../cadastro-funcionario.php"><h6><i class="material-icons">lock</i> FUNCIONÁRIOS  </h6></a>
                                <?php endif ?>
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
  <form action="" method="POST">
<textarea name="textoregistro" id="" rows="30">
<img style="max-width: 100%; margin-top: 5px;" src="../bd_INSERTS/cabecalhos/CAPA.jpg">


<?php
$espaco = "           ";
$folha_ant = "";
$numero_do_livro = 11;
$numero_da_folha = 139;
$busca_no_livro = $pdo->prepare("SELECT * FROM livro_protestos_apontamentos order by PaginaLivro");
$busca_no_livro->execute();
$k = $busca_no_livro->fetchAll(PDO::FETCH_OBJ);
foreach ($k as $k):
if ($numero_da_folha>299) {
$numero_do_livro++;
$numero_da_folha = 1;
}
 ?>

<?php 
  $busca_apontado = $pdo->prepare("SELECT * FROM protesto_automatico_transacao where numero_protocolo_cartorio_transacao!='' and numero_protocolo_cartorio_transacao = '$k->assento'");
  $busca_apontado->execute();
  $linhas = $busca_apontado->fetchAll(PDO::FETCH_OBJ);
  foreach ($linhas as $b):
   ?>

<fieldset style="max-width: 100%; border:1px solid black"><legend style="text-align: center; font-weight: bold">LIVRO: <?=$numero_do_livro?> PAGINA: <?=$numero_da_folha?> N. PROTOCOLO: <?=$k->assento?></legend>


<?php $data_protocolo = substr($b->data_protocolo_transacao,4,4).'-'.substr($b->data_protocolo_transacao,2,2).'-'.substr($b->data_protocolo_transacao,0,2); ?>
<p style="text-align: center; font-weight: bold">DATA APONTAMENTO: <?=date('d/m/Y',strtotime($data_protocolo))?>
 <br>
ESPÉCIE DO TITULO: <?php 


          $busca_especie = $pdo->prepare("SELECT * FROM especie_protesto WHERE codigo = '$b->especie_titulo_transacao'");
              $busca_especie->execute();
              $be = $busca_especie->fetch(PDO::FETCH_ASSOC);
              echo $be['descricao_especie'];

           ?>
<table style="border: 2px solid black; margin-left: 1cm; width: 92%;max-width: 100%;">
              <tr>
                <th style="border: 1px solid black">Nº TÍTULO</th>
                <th style="border: 1px solid black">VENCIMENTO</th>
                <th style="border: 1px solid black">VALOR R$</th>
                <th style="border: 1px solid black">PROTOCOLO Nº</th>
              </tr>
              <tr>
                <td style="border: 1px solid black"><?=$b->numero_titulo_transacao?></td>

                <?php if ($b->data_vencimento_titulo_transacao == '99999999' || empty($b->data_vencimento_titulo_transacao)): ?>
                  <td style="border: 1px solid black">A VISTA</td>    
                <?php else: ?>    
                <td style="border: 1px solid black"><?=substr($b->data_vencimento_titulo_transacao,0,2).'/'.substr($b->data_vencimento_titulo_transacao,2,2).'/'.substr($b->data_vencimento_titulo_transacao,4,4)?></td>
                <?php endif ?>  
                <td style="border: 1px solid black"><?=number_format($b->saldo_titulo_transacao,2,",",".")?></td>
                <td style="border: 1px solid black"><?=$b->numero_protocolo_cartorio_transacao?></td>
              </tr>

          </table>
          <table style="margin-left: 1cm; width: 92%; max-width: 100%; ">
            <tr>
              <th style="border: 1px solid black">DEVEDOR </th>
              <th style="border: 1px solid black">CEDENTE</th>
            </tr>
            <tr>
              <td style="border: 1px solid black">
                
              <?php 
              $busca_devedor = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$b->numero_protocolo_cartorio_transacao' ");
              $busca_devedor->execute();
              $linhas_devedor = $busca_devedor->fetchAll(PDO::FETCH_OBJ);
              foreach ($linhas_devedor as $ld):
               ?> 
                <b><?=$ld->nome_devedor_transacao?></b> <br>
                <b><?=$ld->endereco_devedor_transacao?></b> <br>
                <b><?=$ld->bairro_devedor_transacao?></b> - <b><?=$ld->cidade_devedor_transacao?></b> - <b><?=$ld->uf_devedor_transacao?></b> - <b><?=$ld->cep_devedor_transacao?></b>, <b>CPF/CNPJ: <?=molda_cpf($ld->numero_identificacao_devedor_transacao)?> </b><br>
              <?php endforeach ?>
              </td>
              <td style="border: 1px solid black">
                <b><?=$b->nome_beneficiario_favorecido_transacao?></b>
              </td>
            </tr>
          </table>
<br>
          <table style="margin-left: 1cm; width: 92%; max-width: 100%; margin-top: -13px;">
            <tr>
              <th style="border: 1px solid black">CREDOR </th>
              <th style="border: 1px solid black">APRESENTADO POR</th>
            </tr>
            <tr>
              <td style="border: 1px solid black">
                
                
                <b><?=$b->nome_sacador_vendedor_transacao?></b>
              </td>
              <td style="border: 1px solid black">
                <?php $pesquisa_apresentante = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$b->numero_codigo_portador_transacao'");
            $pesquisa_apresentante->execute();
            $l = $pesquisa_apresentante->fetchAll(PDO::FETCH_OBJ);
            foreach ($l as $l) {
            $apresentante = $l->nome;
            }


            if ($b->numero_codigo_portador_transacao == $_SESSION['numero_p_24']) {
              $apresentante = $b->nome_beneficiario_favorecido_transacao.', CPF/CNPJ: '.molda_cpf($b->agencia_codigo_beneficiario_transacao);
            }
             ?>
            <b><?=$apresentante?></b> <br>
              </td>
            </tr>
          </table>

</p>

<?php if($b->status == 'PROTESTADO'): ?>
<p style="font-weight: bold; margin-left: 1cm"> TÍTULO PROTESTADO EM <?=date('d/m/Y', strtotime($b->data_ocorrencia_transacao))?>
<?php elseif($b->status == 'PAGO'): ?>
<p style="font-weight: bold; margin-left: 1cm"> TÍTULO PAGO EM <?=date('d/m/Y', strtotime($b->data_ocorrencia_transacao))?>
<?php elseif($b->status == 'CANCELADO'): ?>
<p style="font-weight: bold; margin-left: 1cm"> TÍTULO CANCELADO EM <?=date('d/m/Y', strtotime($b->data_ocorrencia_transacao))?>  
<?php elseif($b->status == 'RETIRADO'): ?>
<p style="font-weight: bold; margin-left: 1cm"> TÍTULO RETIRADO EM <?=date('d/m/Y', strtotime($b->data_ocorrencia_transacao))?>    
<?php endif ?>

</fieldset>

<?php $count++; $numero_da_folha++; endforeach ?>
 <div style="page-break-before: always; "></div>
<img style="max-width: 100%; margin-top: 5px;" src="../bd_INSERTS/cabecalhos/CAPA.jpg">


<?php 


 endforeach; ?>












</textarea>


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
</body>
</html>