<?php include('../controller/db_functions.php');session_start();
$pdo = conectar();



if (isset($_POST['texto'])) {
  INSERT_POST("cadastro_minutas_civil",$_POST);
  $buscando_ultimo_id = $pdo->prepare("SELECT * from cadastro_minutas_civil order by ID desc limit 1");
  $buscando_ultimo_id->execute();
  $bui = $buscando_ultimo_id->fetch(PDO::FETCH_ASSOC);
  $id = $bui['ID'];
}

elseif (isset($_POST['textoupdate'])) {
$id = $_POST['id'];
UPDATE_CAMPO_ID("cadastro_minutas_civil","titulo", $_POST['tituloupdate'], $id);
UPDATE_CAMPO_ID("cadastro_minutas_civil","texto", $_POST['textoupdate'], $id);
}

else{
  $id = $_GET['id'];

}

$b = PESQUISA_ALL_ID("cadastro_minutas_civil", $id);

foreach ($b as $b) {
$titulo = $b->titulo;
$texto = strip_tags(addslashes($b->texto));
}






include('header.php');
include('menu.php');
 ?>




<section class="content" style="margin-left: 30px">



        <div class="container-fluid">
            <div class="block-header">
                <h2></h2>
            </div>


            <!-- Horizontal Layout -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">

                        <div class="header">
                            <h2>
                                INCLUIR MODELO DE AVERBAÇÃO
                            </h2>
                           <form class="form-horizontal" id="formaverbacao"  method="POST" enctype="multipart/form-data" action="update-minuta-civil.php">
                           </div>
                           <br><br><br>

                           <div class="row">
                            <div class="col-md-10">
                                <label class="col-md-2">TITULO/DESCRIÇÃO:</label>
                                <div class="col-md-10">    
                                <input type="text" id="tituloupdate" name="tituloupdate" class="form-control" value="<?=$titulo?>">
                                <input type="hidden" name="id" value="<?=$id?>">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <label class="col-md-12">TEXTO DO MODELO</label>
                                <div class="col-md-12">
                                <textarea id="texto" name="textoupdate" class="textarea" >
                                    <?=$texto?>
                                </textarea>
                                </div>
                            </div>



                            </div>
                            <br><br>
                            <div class="row">
<div class="col-sm-1"></div>    
 
<div class="col-sm-10">
            <a id="botaoform" class="col-md-12 btn gradient-azul-forte  waves-effect waves-float">
            <i class="material-icons">save</i> SALVAR MODELO</a>
        </div>
</div>    


                            <br><br><br>    


 

    
                                </div>



                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Horizontal Layout -->

        </div>
    </section>

    <!-- Jquery Core Js -->
    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
             $('#motivoatoisento').hide(); 
        });
    </script>
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
            <script src="../../plugins/jquery-validation/jquery.validate.js"></script>
  <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

    <!-- TinyMCE -->
        <script src="../../js/pages/forms/editors.js"></script>
    <script src="../../plugins/tinymce/tinymce.js"></script>

<script>
  tinymce.init({
  selector: '.textarea',
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


<script type="text/javascript">
$('#informacaocod').click(function(){
$('#info').modal();

});
</script>


<script type="text/javascript">
    $("#modalselo").click(function(){
$("#selo").modal();
});
</script>          

</body>














<?php if (isset($_SESSION['sucesso'])):?>
<script> 
swal('SUCESSO',"<?=str_replace("<br>", " ", $_SESSION['sucesso'])?>",'success');
//$("#sucesso").modal();</script>

<?php
unset($_SESSION['sucesso']);
endif ?>


<?php if (isset($_SESSION['erro'])):?>
<script> 
swal('ERRO',"<?=$_SESSION['erro']?>",'error');
//$("#erro").modal();</script>

<?php
unset($_SESSION['erro']);
endif ?>





 <script type="text/javascript">
                $('#botaoform').click(function(){
                                
                                    
                                swal({
                                title: "Salvar modelo?",
                                text: "Você poderá usa-lo ao incluir averbações nos registros.",
                                type: "info",
                                confirmButtonClass: "bg-green",
                                confirmButtonText: "SALVAR!",
                                showCancelButton: true,
                                confirmButtonColor: 'green',
                                cancelButtonText:'NÃO, CANCELE!',
                                cancelButtonClass: '.bg-red',
                                cancelButtonColor: 'red',
                                showLoaderOnConfirm: true,
                                closeOnConfirm: false

                                },
                                function(){

                               
                                    $('#formaverbacao').submit();
                                //window.location.reload();
                                }
                                );
                                

                                });

           </script> 

</html>



<!-- TinyMCE -->
<script src="../../js/pages/forms/editors.js"></script>
<script src="../../plugins/tinymce/tinymce.js"></script>


<script>
  
    tinymce.init({



     selector: '.textarea',
    language: 'pt_BR',
    language_url : '../../plugins/tinymce/langs/pt_BR.js',
    theme: 'modern',

    plugins: [
    'advlist autolink lists link image charmap print preview hr anchor pagebreak',
    'searchreplace wordcount visualblocks visualchars code fullscreen',
    'insertdatetime media nonbreaking save table contextmenu directionality',
    'emoticons template paste textcolor colorpicker textpattern imagetools'
    ],
    toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | ',
    toolbar2: 'removeformat nocaps allcaps titlecase removebr  preview media | forecolor backcolor emoticons | fontsizeselect fontselect',
    font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;Arial Black=arial black,avant garde;Indie Flower=indie flower, cursive;Times New Roman=times new roman,times;',
    fontsize_formats: '8pt 9pt 10pt 11pt 12pt 13pt 14pt 18pt 24pt 36pt 48pt',
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
   <input name="image" type="file" id="upload" class="hidden" onchange="">