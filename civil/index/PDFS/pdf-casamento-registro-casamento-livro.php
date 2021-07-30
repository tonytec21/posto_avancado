
<?php session_start(); $id = $_GET['id'];
include('header.php');
include('menu.php');

?>

        <section class="content" style="margin-left: 30px"  >
        	   <div class="container-fluid">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <h2 class="col-md-7">REGISTRO CASAMENTO LIVRO B</h2>
                           <div class="col-md-2" style="padding-top: 10px">
                             <select class="form-control" id="versaotermo">
                              <option>VERSÃO</option>
                               <option value="1">VERSÃO 1</option>
                               <option value="2">VERSÃO 2</option>
                               <!--option value="3">VERSÃO 3</option-->
                             </select>
                           </div>
                           <a href="pdf-casamento-registro-casamento-livro?id=<?=$id?>&id_apagar=<?=$id?>" class="btn col-md-3 waves-effect bg-red "><i class="material-icons">stop_screen_share</i> Limpar edições feitas </a>
                        </div>
                        <div class="body">

<div class="row clearfix">
<div class="col-sm-12">	
  <form action="" method="POST">
<textarea name="textoregistro" id="" rows="30">
	
<?php

if (isset($_GET['v2'])) {
   include('config_paginas/registro-casamento-livrov2.php');
}
elseif (isset($_GET['v3'])) {
   include('config_paginas/registro-casamento-livrov3.php');
}
else{
 include('config_paginas/registro-casamento-livro.php');
}
  ?>










</textarea>
<button type="subimit" class="btn waves-effect bg-teal badge">SALVAR ALTERAÇÕES <i class="material-icons">book</i></button>
<?php 

if (isset($_POST['textoregistro'])) :

$texto_salvar = ltrim($_POST['textoregistro']);

$busca_ja_existe = $pdo->prepare("SELECT * FROM salvar_editor where IDREGISTRO = '$id' and TIPO = 'TERMO_CASAMENTO'");
$busca_ja_existe->execute();

if ($busca_ja_existe->rowCount()!=0) {
$up = $pdo->prepare("UPDATE salvar_editor set TEXTO = '$texto_salvar' where IDREGISTRO = '$id' and TIPO = 'TERMO_CASAMENTO' ");
$up->execute();
}
else{
$in = $pdo->prepare("INSERT into salvar_editor values('$id', 'TERMO_CASAMENTO', '$texto_salvar')");
$in->execute();
}

$_SESSION['sucesso'] = 'ALTERAÇÕES SALVAS';



 ?>


  <script type="text/javascript">
    window.location.assign('pdf-casamento-registro-casamento-livro.php?id=<?=$id?>');

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

   <!-- Jquery Core Js -->
<script src="../../plugins/jquery/jquery.min.js"></script>


   <script type="text/javascript">
 
    $('#versaotermo').change(function(){
      if ($('#versaotermo').val() == '1') {
        window.location='pdf-casamento-registro-casamento-livro.php?id=<?=$id?>';
      }
      else if ($(this).val() == '2') {
          window.location='pdf-casamento-registro-casamento-livro.php?id=<?=$id?>&v2=ok';
        }

      else if ($(this).val() == '3') {
          window.location='pdf-casamento-registro-casamento-livro.php?id=<?=$id?>&v3=ok';
        }
    });
    
   </script>


</body>
</html>