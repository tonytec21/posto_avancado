<!DOCTYPE html>

<?php include_once('../../../controller/db_functions.php');
$pdo = conectar();

session_start(); ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>IMPRESSÕES - titulos</title>

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
                        <div class="header">
                           <h2>IMPRESSÃO DE TÍTULOS</h2>

                        </div>
                        <div class="body">
<?php $h = PESQUISA_ALL('protesto_dados_essenciais'); ?>
<div class="row clearfix">
<div class="col-sm-12">
<form action="" method="POST">
<textarea name="textoregistro" id="" rows="30">

<?php  foreach ($h as $h):

if ($h->banco_boleto  == 'BB') : ?>

<?php include('config_paginas/protesto-titulos-bb.php'); ?>

<?php elseif  ($h->banco_boleto  == 'BRA') : ?>

<?php include('config_paginas/protesto-titulos-bra.php'); ?>
<?php elseif  ($h->banco_boleto  == 'CEF') : ?>
<?php include('config_paginas/protesto-titulos-cef.php'); ?>

<?php elseif  ($h->banco_boleto  == 'ITA') : ?>

<?php include('config_paginas/protesto-titulos-itau.php'); ?>
<?php else: ?>
Não cadastrado corretamente!!!
<?php endif; ?>
<?php endforeach; ?>



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
