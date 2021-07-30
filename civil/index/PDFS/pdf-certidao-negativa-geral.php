<!DOCTYPE html>
<?php include('../../controller/db_functions.php');
 session_start();
$pdo=conectar();

if (!isset($_GET['reimpressao']) && !isset($_SESSION['SELOOLD']) &&!isset($_GET['naoofc'])) {
#unset($_SESSION['RETORNOTEMP']);
include('../../selador/civil_geral.php');

          if ($token =='' || empty($token)) {
                            $_SESSION['erro'] = 'NENHUM DADO RECEBIDO TENTE NOVAMENTE atualize a página';
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                            break;
                          }


          if ($token !='') {


      #PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
                  $ato_praticado = '14.5.1';
                  if (isset($_GET['ATOCERTELETRONICA']) && $_GET['ATOCERTELETRONICA'] =='S'){
                    $ato_praticado = '14.5.7';
                  }
                  $escrevente = $_SESSION['nome'];
                  $nome = $_GET['nome_certidao'];
                  if ($_GET['motivoatoisento']!='') {
                  $isento = 'true';
                  $motivo_isento=$_GET['motivoatoisento'];
                  }else{
                  $isento = 'false';
                  $motivo_isento='';
                  }
                  $nomeparte1 ='SUPERINTENDÊNCIA ESTADUAL DE HABITAÇÃO - SUHAB';
                  $docparte1='04355863000132';

                  $livro ='';
                  $folha='';
                   if (isset($_GET['motivoatoisento']) && $_GET['motivoatoisento']!='') {

                                  $ConteudoPOST = '{
                                  "codigoAto":"'.$ato_praticado.'",
                                  "escrevente":"'.$escrevente.'",
                                  "nomeParte":"'.$nome.'",
                                  "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
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
                             $ConteudoPOST = '{
                                  "codigoAto":"'.$ato_praticado.'",
                                  "escrevente":"'.$escrevente.'",
                                  "nomeParte":"'.$nome.'",
                                  "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'",
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


                          if ($_GET['tipo_busca'] == 'CA') {
                          $handler = curl_init($_SESSION['urlselodigital'].'civil/casamento/certidao-negativa');
                          }
                          elseif ($_GET['tipo_busca'] == 'NA') {
                          $handler = curl_init($_SESSION['urlselodigital'].'civil/nascimento/certidao-negativa');
                          }
                          elseif ($_GET['tipo_busca'] == 'OB') {
                          $handler = curl_init($_SESSION['urlselodigital'].'civil/obito/certidao-negativa');
                          }


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
                $ATO = $ato_praticado;
                $TIPOPAPEL = $_GET['TIPOPAPELSEGURANCA'];
                $NUMEROPAPEL = $_GET['NUMEROPAPELSEGURANCA'];
                $funcionario = $_SESSION['nome'];
                $insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','CERTIDAO_NEGATIVA','2','1','$SELO',CURRENT_TIMESTAMP,'CER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
                $UPSEGURANCA = $pdo->prepare("UPDATE folhaseguranca set STATUS = 'U' WHERE EMPRESA = '$TIPOPAPEL' AND PAPEL = '$NUMEROPAPEL'");
                $UPSEGURANCA->execute();



                #UPDATE_CAMPO_ID('registro_obito_novo','RETORNOSELODIGITAL',strip_tags($RETORNO),$id);
                $insert_auditoria->execute();


                          $_POST['SELO2'] = $SELO;



                }
      


      if (isset($_GET['selobusca']) && $_GET['selobusca']!='') {
          
                            $ato_praticado = $_GET['selobusca'];
                             
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
                            "nome":"'.$nome.'"
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
                            "nome":"'.$nome.'"
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
  $SELO = '0';
   $RETORNO = '';
         if (isset($_SESSION['RETORNOTEMP'])) {
           #unset($_SESSION['RETORNOTEMP']);
         }}


         include('header.php');
include('menu.php');
?>

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

<?php if (isset($SELO)) {include('config_paginas/certidao-negativa-geral.php');} ?>










</textarea>

<button type="subimit" class="btn waves-effect bg-teal badge">SALVAR ALTERAÇÕES <i class="material-icons">book</i></button>
<?php

if (isset($_POST['textoregistro'])) :
$id_slv = '0000';
$tipo_slv = 'CERT_NEGATIVA_GERAL'.str_replace(".png", "", str_replace(" ", "", $img_nome));
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
  padding: 8px;
  font-size: 80%;
}
legend{
  font-size: 60%;
}
table{
  border: 1px solid black;
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
  font-size: 70%;
}
.right{
  float: right;
  font-size: 70%;
  text-align: center;
}

</style>
</head>'.str_replace("qrimagens", "PDFS/qrimagens", $_POST['textoregistro']).'<html>';

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
