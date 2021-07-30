<!DOCTYPE html>
<?php include('../../controller/db_functions.php');
$pdo=conectar();
session_start();

$id = $_GET['id'];
$r = PESQUISA_ALL_ID('registro_casamento_novo',$id);
foreach ($r as $r ) :
if (!isset($_GET['reimpressao'])&&!isset($_SESSION['SELOOLD'])) {

unset($_SESSION['RETORNOTEMP']);
include('../../selador/civil_geral.php');

          if ($token =='' || empty($token)) {
                            $_SESSION['erro'] = 'NENHUM DADO RECEBIDO TENTE NOVAMENTE atualize a página';
                          }


          if ($token !='') {


      #PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
                  if (isset($_GET['OUTRACERT']) && $_GET['OUTRACERT'] !='') {
                    $ato_praticado = '14.5.5';
                  }
                  else{
                  $ato_praticado = '14.5.1';
                  }
                  $escrevente = $_SESSION['nome'];
              
                  $nomeparte1 =$r->NOMENUBENTE1;
                  $docparte1='04355863000132';
                  $nomeparte2 =$r->NOMENUBENTE2;
                  $docparte2='78444063215';
                  $nomeparte3 ='';
                  $docparte3='';
                  $nomeparte4 ='';
                  $docparte4='';
                  $livro =$r->LIVROCASAMENTO;
                  $folha=$r->FOLHACASAMENTO;
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
                                  },
                                  {
                                  "nome":"'.$nomeparte2.'"
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
                                  },
                                  {
                                  "nome":"'.$nomeparte2.'"
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
                $LIVRO = $r->LIVROCASAMENTO;
                $FOLHA = $r->FOLHACASAMENTO;
                $TERMO = intval($r->TERMOCASAMENTO);
                $ATO = '14.5.1';
                
                if (isset($_GET['primvia'])) {
                $TIPOPAPEL = $r->TIPOPAPELSEGURANCA;
                $NUMEROPAPEL = $r->NUMEROPAPELSEGURANCA;  
                            }
                else{
                  $TIPOPAPEL = $_GET['TIPOPAPELSEGURANCA'];
                $NUMEROPAPEL = $_GET['NUMEROPAPELSEGURANCA'];
                }            

                $funcionario = $_SESSION['nome'];
                $insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','2VIA_CASAMENTO_LIVROE','2','1','$SELO',CURRENT_TIMESTAMP,'CER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
                $UPSEGURANCA = $pdo->prepare("UPDATE folhaseguranca set STATUS = 'U' WHERE EMPRESA = '$TIPOPAPEL' AND PAPEL = '$NUMEROPAPEL'");
                $UPSEGURANCA->execute();  
              
                

                #UPDATE_CAMPO_ID('registro_obito_novo','RETORNOSELODIGITAL',strip_tags($RETORNO),$id);
                $insert_auditoria->execute();
              
                         
                          $_POST['SELO2'] = $SELO;  
                
                

                }
      }
      }
      else{
        $SELO ='0';
      }
include('header.php');
include('menu.php');
?>

        <section class="content" style="margin-left: 30px"  >
             <div class="container-fluid">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <h2>REGISTRO CASAMENTO LIVRO B</h2>

                        </div>
                        <div class="body">

<div class="row clearfix">
<div class="col-sm-12"> 
<form action="" method="POST" enctype="multipart/form-data">
<textarea name="textoregistro" id="" rows="30">
  
<?php if (isset($SELO)) {include('config_paginas/certidao-casamento-livroe.php'); } ?>










</textarea>
<button type="subimit" class="btn waves-effect bg-teal badge">SALVAR ALTERAÇÕES <i class="material-icons">book</i></button>
<?php if (isset($_GET['xmlcertidao'])): ?>  
<a  class="btn waves-effect bg-orange" href="../bd_INSERTS/gerador-certidao-xml-casamento.php?id=<?=$id?>&CODIGOPEDIDOXML=<?=$_GET['CODIGOPEDIDOXML']?>">GERAR ARQUIVO XML</a>
<?php endif ?>
<?php 

if (isset($_POST['textoregistro'])) :

$id_slv = '0000';
$mudar = array(".png","&");
$tipo_slv = '2_VIA_CERTIDAO_CASAMENTO_LIVROE'.str_replace($mudar, "", str_replace(" ", "", $img_nome));
$texto_salvar = '<html>
<head>
<style type="text/css">
  @page {

  margin-top: 0;
}

.center{
  text-align: center;

}
.all{

  width: 100%;
}
fieldset{
font-weight: bold;
font-size: 100%;
margin-left:0px!important;
display:inline-block!important;
}
legend{
  font-size: 80%;
}
table{
  font-size: 40%;
  border: 1px solid black;
}
thead{
  border-bottom: 1px solid black;
}
th{
  font-size: 9px;
  border-left: 1px solid black;
}

td{
font-size: 9px; 
border-left: 1px solid black;
border-bottom: 1px solid black
}
.left{

  float: left;
  font-size: 70%!important;
  font-weight: bold;
}
.right{

  float: right;
  font-size: 70%!important;
  font-weight: bold;
  text-align: center;
}
body{text-transform: uppercase; padding-left: 2cm;padding-right: 2cm; padding-top: 4cm;padding-bottom: 2cm;zoom:75%; }
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
<?php endforeach ?>
</html>