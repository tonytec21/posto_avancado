<!DOCTYPE html>
<?php include('../../controller/db_functions.php');
session_start();
clearstatcache(); 
#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
function tiraaspas($string){
$tirar = array("'", '"');
return str_replace($tirar, "", $string);
}
$pdo=conectar();
$r = PESQUISA_ALL_ID('registro_obito_novo',$id);
foreach ($r as $r ) :

if (empty($r->DATAENTRADA)) {
$_SESSION['erro'] = "DATA DE REGISTRO NÃO FOI PREENCHIDA!";
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
}

elseif (empty($r->DATAOBITO)) {
$_SESSION['erro'] = "DATA DO ÓBITO NÃO FOI PREENCHIDA!";
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit(); 
}


if (!isset($_GET['reimpressao'])&&!isset($_SESSION['SELOOLD'])) {
unset($_SESSION['RETORNOTEMP']);
include('../../selador/civil_geral.php');

          if ($token =='' || empty($token)) {
                            $_SESSION['erro'] = 'NENHUM DADO RECEBIDO TENTE NOVAMENTE atualize a página';
                          }


          if ($token !='') {
          $tabela_custas = retorna_tabela_custas('civil');  

      #PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
                  $ato_praticado = '14.5.1';

                   if (isset($_GET['ATOCERTELETRONICA']) && $_GET['ATOCERTELETRONICA'] =='S'){
                    $ato_praticado = '14.5.7';
                  }

                   if (isset($_GET['xmlcertidao'])){
                    $ato_praticado = '14.5.7';
                  }
                  $escrevente = $_SESSION['nome'];
                 
                  $nomeparte1 =tiraaspas($r->NOME);
                  $docparte1='04355863000132';
                  $nomeparte2 =$r->NOMEDECLARANTE;
                  $docparte2='78444063215';
                  $nomeparte3 ='';
                  $docparte3='';
                  $nomeparte4 ='';
                  $docparte4='';
                  $livro =$r->LIVROOBITO;
                  $folha=$r->FOLHAOBITO;


                  if (isset($_GET['motivoatoisento']) && $_GET['motivoatoisento']!='') {
                   $isento = 'true';
                   $motivo_isento = $_GET['motivoatoisento'];
                   $ConteudoPOST = '{
                                  "codigoAto":"'.$ato_praticado.'",
                                  "escrevente":"'.$escrevente.'",
                                  "versaoTabelaDeCustas":"'.$tabela_custas.'",
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
                                  "versaoTabelaDeCustas":"'.$tabela_custas.'"
                                  }
                                  }';
                  }
                  else{
                  $isento = 'false';
                  $motivo_isento='';
                  $ConteudoPOST = '{
                                  "codigoAto":"'.$ato_praticado.'",
                                  "escrevente":"'.$escrevente.'",
                                  "versaoTabelaDeCustas":"'.$tabela_custas.'",
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
                                  "versaoTabelaDeCustas":"'.$tabela_custas.'"
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
                          $SELO = $resp['resumos'][0]['numeroSelo'];
                          $TEXTOSELO = $resp['resumos'][0]['textoSelo'];
                          $QRCODE = $resp['resumos'][0]['valorQrCode'];
                          $RETORNO = json_encode($resp['resumos'][0]);
                          if (strlen($RETORNO) < 5) {
                            $_SESSION['erro'] = "ERRO AO SOLICITAR O SELO, SEM RESPOSTA DO SELADOR";
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                            break;
                          }

                          $_SESSION['SELOOLD'] =$SELO;
                          $_SESSION['sucesso'] = $TEXTOSELO;
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
                $LIVRO = $r->LIVROOBITO;
                $FOLHA = $r->FOLHAOBITO;
                $TERMO = intval($r->TERMOOBITO);
                $ATO = $ato_praticado;
                $TIPOPAPEL = $_GET['TIPOPAPELSEGURANCA'];
                $NUMEROPAPEL = $_GET['NUMEROPAPELSEGURANCA'];  
                $funcionario = $_SESSION['nome'];
                $insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','2VIA_OBITO','2','1','$SELO',CURRENT_TIMESTAMP,'CER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
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
                            "versaoTabelaDeCustas":"'.$tabela_custas.'",
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
                            "versaoTabelaDeCustas":"'.$tabela_custas.'"
                            }
                            }';
                            }
                            else{
                            $isento = 'false';
                            $motivo_isento='';
                            $ConteudoPOST = '{
                            "codigoAto":"'.$ato_praticado.'",
                            "escrevente":"'.$escrevente.'",
                            "versaoTabelaDeCustas":"'.$tabela_custas.'",
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
                            "versaoTabelaDeCustas":"'.$tabela_custas.'"
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
                            $LIVRO = $r->LIVROOBITO;
                            $FOLHA = $r->FOLHAOBITO;
                            $TERMO = intval($r->TERMOOBITO);
                            $ATO = $ato_praticado;
                            $TIPOPAPEL = $_GET['TIPOPAPELSEGURANCA'];
                            $NUMEROPAPEL = $_GET['NUMEROPAPELSEGURANCA'];  
                            $funcionario = $_SESSION['nome'];
                            $insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','BUSCA_2VIA_OBITO','2','1','$SELOBUSCA',CURRENT_TIMESTAMP,'CER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNOBUSCA')");
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

include('header.php');
include('menu.php');

?>

        <section class="content" style="margin-left: 30px"  >
        	   <div class="container-fluid">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <h2>REGISTRO OBITO LIVRO C</h2>

                        </div>
                        <div class="body">

<div class="row clearfix">
<div class="col-sm-12">	
<form action="" method="POST" enctype="multipart/form-data">
<textarea name="textoregistro" id="" rows="30">
  
	
<?php if (isset($SELO)) {include('config_paginas/registro-obito-segunda-via.php');} ?>










</textarea>
<button type="subimit" class="btn waves-effect bg-teal badge">SALVAR ALTERAÇÕES <i class="material-icons">book</i></button>
<?php if (isset($_GET['xmlcertidao'])): ?>  
<br><br>
<a  class=" col-md-12 btn waves-effect bg-orange" href="../../bd_INSERTS/gerador-certidao-xml-obito.php?id=<?=$id?>&CODIGOPEDIDOXML=<?=$_GET['CODIGOPEDIDOXML']?>">GERAR ARQUIVO XML</a>
<a class="btn col-md-12"  data-clipboard-action="copy" data-clipboard-target="#copiaselo"><i class="material-icons">content_copy</i>Copiar Numero do selo</a>
<div style=" color:white" id="copiaselo" class=""><?=$_SESSION['SELOOLD']?></div>
<?php endif ?>
<?php 

if (isset($_POST['textoregistro'])) :

$id_slv = $_GET['id'];
$tipo_slv = strip_tags($_SESSION['SELOOLD']);
$texto_salvar = '
<html>
<head>
<style type="text/css">


.center{
  text-align: center;

}
.all{

  width: 100%;
}
fieldset{
font-weight: bold;
font-size: 100%;
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
  border-left: 1px solid black;
}

td{
border-left: 1px solid black;
border-bottom: 1px solid black
}
.left{
  margin-top: -1%;
  float: left;
  font-size: 100%!important;
  font-weight: bold;
}
.right{
    margin-top: -1%;
  float: right;
  font-size: 100%!important;
  font-weight: bold;
  text-align: center;
}
body{text-transform: uppercase; padding-top: 5cm; padding-bottom: 1cm; padding-left: 2cm; padding-right: 2cm;zoom:80%;}
</style>
</head>
'.str_replace("qrimagens", "PDFS/qrimagens", $_POST['textoregistro']).'</html>';

$busca_ja_existe = $pdo->prepare("SELECT * FROM certidoes_salvas_civil where id_registro= '$id_slv' and selo_certidao = '$tipo_slv'");
$busca_ja_existe->execute();

if ($busca_ja_existe->rowCount()!=0) {
$up = $pdo->prepare("update certidoes_salvas_civil set certidao = '$texto_salvar' where id_registro= '$id_slv' and selo_certidao = '$tipo_slv' ");
$up->execute();
}
else{
$in = $pdo->prepare("INSERT INTO `certidoes_salvas_civil` (`ID`, `id_registro`, `selo_certidao`, `datahora`, `certidao`) VALUES (NULL, '$id_slv', '$tipo_slv', CURRENT_TIMESTAMP, '$texto_salvar');");
$in->execute();
}

$_SESSION['sucesso'] = 'ALTERAÇÕES SALVAS';
$_SESSION['salvamento_automatico'] = 'POR QUESTÕES DE SEGURANÇA UMA CÓPIA DESTA CERTIDÃO FOI SALVA EM REGISTRO CIVIL/ REIMPRESSÃO DE CERTIDÕES SALVAS COM O NOME: '.$tipo_slv;


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

<script src="../../plugins/ajax/clipboard.min.js"></script>

<!-- 3. Instantiate clipboard by passing a string selector -->
<script>
var clipboard = new ClipboardJS('.btn');

clipboard.on('success', function(e) {
console.log(e);
});

clipboard.on('error', function(e) {
console.log(e);
});
</script>


<!--TINYMCE EDITADO -->
      <script>
        
          tinymce.init({
          selector: 'textarea',
          language: 'pt_BR',
          language_url : '../../plugins/tinymce/langs/pt_BR.js',
          theme: 'modern',

          plugins: [
          'advlist autolink lists link image charmap print preview hr anchor pagebreak',
          'searchreplace wordcount visualblocks visualchars code fullscreen',
          'insertdatetime media nonbreaking save table contextmenu directionality',
          'emoticons template paste textcolor colorpicker textpattern imagetools'
          ],
          toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
          toolbar2: 'removeformat nocaps allcaps titlecase removebr imprimir preview media | forecolor backcolor emoticons | fontsizeselect fontselect',
          font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;Arial Black=arial black,avant garde;Indie Flower=indie flower, cursive;Times New Roman=times new roman,times;',
          fontsize_formats: '2pt 5pt 8pt 9pt 10pt 11pt 12pt 13pt 14pt 18pt 24pt 36pt 48pt',
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
          },
          setup: function (editor) {
          editor.on('change', function () {
          editor.save();
          });

          editor.addButton('imprimir', {
          text: '',
          tooltip: 'imprime o conteudo do editor',
          icon: 'print',
          image: '',
          onclick: function() {
            tinymce.activeEditor.execCommand('SelectAll');
            tinymce.activeEditor.execCommand('mcePrint');
          },
          }); 


          editor.addButton('removebr', {
          text: 'Remove brs',
          tooltip: 'Remove line breaks in the current selection.',
          icon: false,
          image: '',
          onclick: function() {
            seleccion = editor.selection.getContent({format : 'html'});
            seleccion = seleccion.replace(/<br \/>/g, '');
            editor.selection.setContent(seleccion);
          },
          });

            function removeTags(string, array){
            return array ? string.split("<").filter(function(val){ return f(array, val); }).map(function(val){ return f(array, val); }).join("") : string.split("<").map(function(d){ return d.split(">").pop(); }).join("");
            function f(array, value){
            return array.map(function(d){ return value.includes(d + ">"); }).indexOf(true) != -1 ? "<" + value : value.split(">")[1];
            }
            }
            // novo plugins
            // Register the commands
            editor.addCommand('nocaps', function() {
            String.prototype.lowerCase = function() {
            return this.toLowerCase();
            }
            var sel = editor.dom.decode(editor.selection.getContent());
            sel = sel.lowerCase();
            editor.selection.setContent(sel);
            editor.save();
            editor.isNotDirty = true;
            });

            editor.addCommand('allcaps', function() {
            String.prototype.upperCase = function() {
            return this.toUpperCase();
            }
            var sel = editor.dom.decode(editor.selection.getContent());
            sel = sel.upperCase();
            editor.selection.setContent(sel);
            editor.save();
            editor.isNotDirty = true;
            });

            editor.addCommand('sentencecase', function() {
            String.prototype.sentenceCase = function() {
            return this.toLowerCase().replace(/(^\s*\w|[\.\!\?]\s*\w)/g, function(c)
            {
            return c.toUpperCase()
            });
            }
            var sel = editor.dom.decode(editor.selection.getContent());
            sel = sel.sentenceCase();
            editor.selection.setContent(sel);
            editor.save();
            editor.isNotDirty = true;
            });

            editor.addCommand('titlecase', function() {
            String.prototype.titleCase = function() {
            return this.toLowerCase().replace(/(^|[^a-z])([a-z])/g, function(m, p1, p2)
            {
            return p1 + p2.toUpperCase();
            });
            }
            var sel = editor.dom.decode(editor.selection.getContent());
            sel = sel.titleCase();
            editor.selection.setContent(sel);
            editor.save();
            editor.isNotDirty = true;
            });

            // Register Keyboard Shortcuts
            editor.addShortcut('meta+shift+l','Lowercase', ['nocaps', false, 'Lowercase'], this);
            editor.addShortcut('meta+shift+u','Uppercase', ['allcaps', false, 'Uppercase'], this);
            editor.addShortcut('meta+shift+s','Sentence Case', ['sentencecase', false, 'Sentence Case'], this);
            editor.addShortcut('meta+shift+t','Title Case', ['titlecase', false, 'Lowercase'], this);

            // Register the buttons
            editor.addButton('nocaps', {
            title : 'Lowercase (Ctrl+Shift+L)',
            text: 'Minusculo',
            cmd : 'nocaps',
            });
            editor.addButton('allcaps', {
            title : 'Uppercase (Ctrl+Shift+U)',
            text: 'Maiusculo',
            cmd : 'allcaps',
            });
            editor.addButton('sentencecase', {
            title : 'Sentence Case (Ctrl+Shift+S)',
            text: 'Sentença',
            cmd : 'sentencecase',
            });
            editor.addButton('titlecase', {
            title : 'Title Case (Ctrl+Shift+T)',
            text: 'Aa',
            cmd : 'titlecase',
            });

            //

            editor.addButton('mybutton', {
            type: 'menubutton',
            text: 'Aa',
            icon: false,
            menu: [
            {text: 'MAIÚSCULAS ', onclick: function () {
            seleccion = editor.selection.getContent({format : 'html'});
            seleccion = seleccion.replace(/<span \/>/g, '');

            var recebe_selecao =  "<span style='text-transform:uppercase !important'>" +removeTags(seleccion) + "</span>";
            editor.insertContent(recebe_selecao);
            }

            },

            {text: 'mínusculo', onclick: function() {
            seleccion = editor.selection.getContent({format : 'textContent'});
            //  seleccion = seleccion.replace(/<span \/>/g, '');



            var recebe_selecao =  "<span style='text-transform:lowercase !important'>" +removeTags(seleccion) + "</span>";
            editor.insertContent(recebe_selecao);

            console.log(editor.getBody());
            }
            },

            {text: 'Alternado', onclick: function() {
            seleccion = editor.selection.getContent({format : 'textContent'});
            seleccion = seleccion.replace(/<span \/>/g, '');

            var recebe_selecao =  "<span style='text-transform:capitalize !important'>" +removeTags(seleccion) + "</span>";
            editor.insertContent(recebe_selecao);

            }
            },
            {text: 'CUSTOM', onclick: function() {editor.insertContent('<b>teste</b>');}}

            ]
            });


            }

            }

            );


            function setB() {
            document.execCommand('bold', false, null);
            }

            function setI() {
            document.execCommand('italic', false, null);
            }

            function setU() {
            document.execCommand('underline', false, null);
            }

            function setsC(e) {
            tags('span', 'sC');
            }

            function tags(tag, klass) {
            var ele = document.createElement(tag);
            ele.classList.add(klass);
            wrap(ele);
            }

            function wrap(tags) {
            var select = window.getSelection();
            if (select.rangeCount) {
            var range = select.getRangeAt(0).cloneRange();
            range.surroundContents(tags);
            select.removeAllRanges();
            select.addRange(range);
            }
            }
      </script>
<!--TINYMCE EDITADO -->
   <input name="image" type="file" id="upload" class="hidden" onchange="">
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
<script> swal('SUCESSO!','<?=$_SESSION["sucesso"]?>','success');</script>

<?php
unset($_SESSION['sucesso']);
endif ?>


<?php if (isset($_SESSION['erro'])):?>
<script> swal('ERRO!','<?=$_SESSION["erro"]?>','error');</script>

<?php
unset($_SESSION['erro']);
endif ?>



<?php if (!isset($_SESSION['salvamento_automatico'])): ?>
  <script type="text/javascript">
    setTimeout(function(){
    $('form').submit();
    }, 2000);
      </script>
<?php endif ?>

<?php if (isset($_SESSION['salvamento_automatico'])): ?>
  <script type="text/javascript">
//swal('SEGURANÇA!','<?=$_SESSION["salvamento_automatico"]?>','warning');
 </script>
<?php  endif ?>

</body>
<?php endforeach  ?>
</html>