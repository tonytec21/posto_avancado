<!DOCTYPE html>
<?php session_start();
include('../../../controller/db_functions.php');
$pdo=conectar();
$count = 0;
 $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h):
                    $titular = $h->strTituloServentia; 
endforeach;
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

<?php 

$livro = 1;
$pagina = 1; 


?>
<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
      <?php 
      $livrorod = $livro;
      $paginarod = $pagina;
      $c = PESQUISA_ALL('cadastroserventia');
      foreach ($c as $c ):?>
      <div style="display: block;margin-top: -30px;">
      <div style="display: inline-block;width: 20%;">
      <img src="../../../images/brasao_ma.png" style="width: 50%;margin-left:28px; margin-top:-40px; ">

      </div>
      <div style="display: inline-block;width: 50%; margin-left: -50px;">  
      <h2 style=" text-align: right;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
      <h2 style=" text-align: right;font-size: 12px;margin-top: -18px;
      "><?=$c->strLogradouro?>, <?=$c->strNumero?> -
      <?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
      <?php endforeach ?>
      <br>
      Titular da Serventia: <?=$c->strTituloServentia?><br>
      Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
      <?php endforeach ?></h2>
      </div>

      </div>
      <hr style="border-bottom: 2px solid black">

      <p style="text-align: center">LIVRO: <?=$livro?> FOLHA:  <?=$pagina?> </p>        
<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
<?php 
#SABER QUAL FOI O PRIMEIRO DIA DE TRABALHO NO SISTEMA

$busca_primeiro = $pdo->prepare("SELECT * FROM  protesto_automatico_transacao ORDER BY ID ASC LIMIT 1");
$busca_primeiro->execute();
$bp = $busca_primeiro->fetchAll(PDO::FETCH_OBJ);
foreach ($bp as $key) {
$pri_data = $key->data_protocolo_transacao;
$dia_data_pri = substr($pri_data, 0,2);
$mes_data_pri = substr($pri_data, 2,2);
$ano_data_pri = substr($pri_data, 4,4);
$pri_data_format = $ano_data_pri.'-'.$mes_data_pri.'-'.$dia_data_pri;
}
$busca_ultimo = $pdo->prepare("SELECT * FROM  protesto_automatico_transacao ORDER BY ID DESC LIMIT 1");
$busca_ultimo->execute();
$bu = $busca_ultimo->fetchAll(PDO::FETCH_OBJ);
foreach ($bu as $key) {
$ult_data = $key->data_protocolo_transacao;
$dia_data = substr($ult_data, 0,2);
$mes_data = substr($ult_data, 2,2);
$ano_data = substr($ult_data, 4,4);
$ult_data_format = $ano_data.'-'.$mes_data.'-'.$dia_data;
}

#echo $pri_data_format.' - '.$ult_data_format;




#obtendo a quantidade de dias que usam o sistema:

$data_inicial = $pri_data_format;
if (isset($_GET['data_inicial'])) {
$data_inicial = $_GET['data_inicial'];  
}
$data_final = date('Y-m-d');
$diferenca = strtotime($data_final) - strtotime($data_inicial);
$dias = floor($diferenca / (60 * 60 * 24));
$cont_coisas = 0;
$cont_registros = 0;
$cont_sem_mov =0;
$cont_oco = 0;
$cont_apt = 0;


for ($i=0; $i <=$dias ; $i++) : 
$data = date("d/m/Y", strtotime($pri_data_format.'+'.$i.'days'));
$data_americano = date("Y-m-d", strtotime($pri_data_format.'+'.$i.'days'));

$diaSemana = array("Domingo","Segunda","Terça","Quarta","Quinta","Sexta","Sábado");
$data_semana = date($data_americano);
$diaSemana_numero = date('w', strtotime($data_semana));
$dia_semana_nome = $diaSemana[$diaSemana_numero];


$datalimpo = date("dmY", strtotime($pri_data_format.'+'.$i.'days'));

 ?>


<?php if ($dia_semana_nome!='Sábado' && $dia_semana_nome!='Domingo'): ?>
<fieldset> <legend style="text-align: right;font-weight: bold;">DIA <?=$data?></legend>
<?php 
$busca_titulos_apontados = $pdo->prepare("SELECT * FROM protesto_automatico_transacao WHERE data_protocolo_transacao = '$datalimpo'");
$busca_titulos_apontados->execute();
$bta = $busca_titulos_apontados->fetchAll(PDO::FETCH_OBJ);


?>




<?php if ($busca_titulos_apontados->rowCount()<1): $quantidade_titulos = $busca_titulos_apontados->rowCount(); $cont_sem_mov++;$cont_coisas++;  $cont_registros++;?>
  <h5 style="text-align: center;margin-bottom: -2px;margin-top: -5px; ">APONTAMENTOS DO DIA <?=$data.'-'.$dia_semana_nome?></h5>
<span style="padding: 10px">Dia: <?=$data.'-'.$dia_semana_nome?>, certifico que nesta data, não houve nenhum apontamento de título nesta serventia. <br> Do que dou fé_____________________________ <?=mb_strtoupper($titular)?>.</span><br>
<?php else: $quantidade_titulos = $busca_titulos_apontados->rowCount(); ?>


    <h5 style="text-align: center;margin-bottom: 0px;margin-top: -5px; ">APONTAMENTOS DO DIA <?=$data.'-'.$dia_semana_nome?></h5>
<?php endif ?>
<?php foreach ($bta as $b): $cont_apt++;$cont_coisas++; $cont_registros++;?>

<div style="max-width: 100%; padding: -30px;font-size: 80%;">
Protocolo nº . <?=$b->numero_protocolo_cartorio_transacao?> <br>
Nº Titulo: <?=$b->numero_titulo_transacao?> <br>
Valor Título: <?=number_format($b->saldo_titulo_transacao,2,",",".")?> <br>
Apresentante: 
<?php $pesquisa_apresentante = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$b->numero_codigo_portador_transacao'");
$pesquisa_apresentante->execute();
$l = $pesquisa_apresentante->fetchAll(PDO::FETCH_OBJ);
foreach ($l as $l) {
$apresentante = $l->nome;
}


if ($b->numero_codigo_portador_transacao == $_SESSION['numero_p_24']) {
$apresentante = $b->nome_beneficiario_favorecido_transacao;
}
?>
<b><?=$apresentante?></b> <br>
Credor: <br>
Sacador: <?=$b->nome_sacador_vendedor_transacao?><br>
<?php 
$busca_devedor = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$b->numero_protocolo_cartorio_transacao' LIMIT 2 ");
$busca_devedor->execute();
$linhas_devedor = $busca_devedor->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas_devedor as $ld):
?> 
Devedor: <b><?=$ld->nome_devedor_transacao?></b> <br><br>
<?php endforeach ?>
<?php if ($cont_registros >= 10): $pagina++; $cont_registros =0; ?> 
<?php endif ?>
<?php if ($cont_coisas >= 5): $cont_coisas = 0;?>
</fieldset>
  <div style="page-break-before: always;"></div>
  <!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
      <?php $c = PESQUISA_ALL('cadastroserventia');
      foreach ($c as $c ):?>
      <div style="display: block;margin-top: -40px;">
      <div style="display: inline-block;width: 20%;">
      <img src="../../../images/brasao_ma.png" style="width: 50%;margin-left:28px; margin-top:-40px; ">

      </div>
      <div style="display: inline-block;width: 50%; margin-left: -50px;">  
      <h2 style=" text-align: right;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
      <h2 style=" text-align: right;font-size: 12px;margin-top: -18px;
      "><?=$c->strLogradouro?>, <?=$c->strNumero?> -
      <?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
      <?php endforeach ?>
      <br>
      Titular da Serventia: <?=$c->strTituloServentia?><br>
      Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
      <?php endforeach ?></h2>
      </div>

      </div>
      <hr style="border-bottom: 2px solid black">   
      <p style="text-align: center">LIVRO: <?=$livro?> FOLHA:  <?=$pagina?> <?php if ($cont_registros >=5): ?>
        V
      <?php endif ?> </p>        
<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
<?php endif ?>
</div>
<?php endforeach;?> 

<?php 
$busca_ocorrencias = $pdo->prepare("SELECT * FROM protesto_automatico_transacao WHERE data_ocorrencia_transacao = '$data_americano' and tipo_ocorrencia_transacao!=''");
$busca_ocorrencias->execute();
if ($busca_ocorrencias->rowCount()>0) {
   echo '<h5 style="text-align: center; margin-bottom:-10px;">OCORRÊNCIAS DO DIA '. $data.'-'.$dia_semana_nome.'</h5>';
}
$bo = $busca_ocorrencias->fetchAll(PDO::FETCH_OBJ);
$pagos ='';
$protestados='';
$devolvidos='';
$retirados='';
$cancelados='';

foreach ($bo as $b) {


if ($b->status == 'PAGO') {
$pagos .= $b->numero_protocolo_cartorio_transacao.' ';
}

if ($b->status == 'PROTESTADO') {
$protestados .= $b->numero_protocolo_cartorio_transacao.' ';
}
if ($b->status == 'RETIRADO') {
$retirados .= $b->numero_protocolo_cartorio_transacao.' ';
}

if ($b->status == 'RECUSADO') {
$devolvidos .= $b->numero_protocolo_cartorio_transacao.' ';
}

if ($b->status == 'CANCELADO') {
$cancelados .= $b->numero_protocolo_cartorio_transacao.' ';
}



}

if (!empty($pagos)) {
echo "<span style='font-weight:bold'>Pagamentos <br>Protocolos: ".$pagos.'</span><br>';
}
if (!empty($protestados)) {
echo "<span style='font-weight:bold'>Protestados <br>Protocolos: ".$protestados.'</span><br>';
}

if (!empty($retirados)) {
echo "<span style='font-weight:bold'>Retirados <br>Protocolos: ".$retirados.'</span><br>';
}

if (!empty($devolvidos)) {
echo "<span style='font-weight:bold'>Devolvidos <br>Protocolos: ".$devolvidos.'</span><br>';
}

if (!empty($cancelados)) {
echo "<span style='font-weight:bold'>Cancelados <br>Protocolos: ".$cancelados.'</span><br>';
}
 ?>
<?php
 if ($quantidade_titulos>0): ?>
  Certifico que nesta data, houve <?=$quantidade_titulos?> apontamento(s) de título nesta serventia. <br> Do que dou fé_____________________________ <?=mb_strtoupper($titular)?>.</span><br>
<?php endif ?>
<span> OCORRENCIAS: <?=$cont_oco?></span>
<span> APT: <?=$cont_apt?></span>
<span> SEM: <?=$cont_sem_mov?></span>
<span> REG: <?=$cont_coisas?>/<?=$cont_registros?></span><br>

<?php if ($cont_registros >= 10): $pagina++; $cont_registros =0; ?> 
<?php endif ?>
<?php if ($cont_coisas >= 5): $cont_coisas = 0;?>
</fieldset>
  <div style="page-break-before: always;"></div>
  <!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
      <?php $c = PESQUISA_ALL('cadastroserventia');
      foreach ($c as $c ):?>
      <div style="display: block;margin-top: -40px;">
      <div style="display: inline-block;width: 20%;">
      <img src="../../../images/brasao_ma.png" style="width: 50%;margin-left:28px; margin-top:-40px; ">

      </div>
      <div style="display: inline-block;width: 50%; margin-left: -50px;">  
      <h2 style=" text-align: right;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
      <h2 style=" text-align: right;font-size: 12px;margin-top: -18px;
      "><?=$c->strLogradouro?>, <?=$c->strNumero?> -
      <?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
      <?php endforeach ?>
      <br>
      Titular da Serventia: <?=$c->strTituloServentia?><br>
      Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
      <?php endforeach ?></h2>
      </div>

      </div>
      <hr style="border-bottom: 2px solid black">   
      <p style="text-align: center">LIVRO: <?=$livro?> FOLHA:  <?=$pagina?> <?php if ($cont_registros >=5): ?>
        V
      <?php endif ?> </p>        
<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
<?php endif ?>

 </fieldset>




<?php if ($pagina == 300): $livro++?>  
<?php endif ?>


<?php endif; endfor ?>
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