<!DOCTYPE html>
<?php include('../../controller/db_functions.php');
$pdo=conectar();
session_start();

header("Cache-Control: no-cache, must-revalidate"); // HTTP/1.1
#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];

$r = PESQUISA_ALL_ID('registro_emancipacao_novo',$id);
	foreach ($r as $r ) :
if (!isset($_GET['reimpressao'])&&!isset($_SESSION['SELOOLD'])) {


include('../../selador/civil_geral.php');

          if ($token =='' || empty($token)) {
                            $_SESSION['erro'] = 'NENHUM DADO RECEBIDO TENTE NOVAMENTE atualize a página';
                            header('Location: ' . $_SERVER['HTTP_REFERER']);
                    break;
                          }


          if ($token !='') {


      #PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
                  $ato_praticado = '14.5.1';
                  $escrevente = $_SESSION['nome'];
                  $nomeparte1 =$r->NOMEEMANCIPADO;
                  $livro =$r->LIVROESPECIAL;
                  $folha=$r->FOLHAESPECIAL;
                   $escrevente = $_SESSION['nome'];


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
                                  "folha": "'.$livro.'",
                                  "livro": "'.$folha.'",
                                  "versaoTabelaDeCustas":"'.$_SESSION['tabelavigente'].'"
                                  }
                                  }';
              
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
                $LIVRO = $r->LIVROESPECIAL;
                $FOLHA = $r->FOLHAESPECIAL;
                $TERMO = intval($r->TERMOESPECIAL);
                $ATO = '14.5.1';
                $TIPOPAPEL = $_GET['TIPOPAPELSEGURANCA'];
                $NUMEROPAPEL = $_GET['NUMEROPAPELSEGURANCA'];  
                $funcionario = $_SESSION['nome'];
                $insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','2VIA_EMANCIPACAO','2','1','$SELO',CURRENT_TIMESTAMP,'CER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
                $UPSEGURANCA = $pdo->prepare("UPDATE folhaseguranca set STATUS = 'U' WHERE EMPRESA = '$TIPOPAPEL' AND PAPEL = '$NUMEROPAPEL'");
                $UPSEGURANCA->execute();  
              
                

                #UPDATE_CAMPO_ID('registro_obito_novo','RETORNOSELODIGITAL',strip_tags($RETORNO),$id);
                $insert_auditoria->execute();
              
                         
                          $_POST['SELO2'] = $SELO;  
                
                

                }
      }
      }
else{
  $SELO = '0';
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
                    

                        </div>
                        <div class="body">

<div class="row clearfix">
<div class="col-sm-12">	
<textarea name="" id="" rows="30">
	
<?php 

if (isset($SELO)) {include('config_paginas/registro-emancipacao-segunda-via.php');}?>










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
<script src="../../plugins/bootstrap/js/bootstrap.js"></script>


<!-- Slimscroll Plugin Js -->
<script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="../../plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Input Mask Plugin Js -->
    <script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<!-- Custom Js -->
<script src="../../js/admin.js"></script>
<script src="../../js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="../../js/demo.js"></script>
<script src="../../plugins/ajax/screen.js"></script>

<!-- TinyMCE -->
<script src="../../js/pages/forms/editors.js"></script>
<script src="../../plugins/tinymce/tinymce.js"></script>


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
<?php endforeach  ?>