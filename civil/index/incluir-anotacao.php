<!DOCTYPE html>
<?php  session_start();  include('../controller/db_functions.php'); $pdo=conectar();  

if (empty($_SESSION['id']) && empty($_SESSION['nome'])) {
 $_SESSION['msg'] = "<div class='alert alert-info' role='alert' id='response'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
        &times;</span></button>
        Área restrita
        </div>";
        header("location: ../login.php");
}

$livro = $_GET['livro'];
$folha = $_GET['folha'];
$DATA = date('d-m-Y');


if (isset($_POST['subimit1'])) {
unset($_POST['subimit1']);
INSERT_POST('anotacoes_civil',$_POST);
$_SESSION['sucesso'] = 'ANOTAÇÃO INSERIDA!';
header('location:pesquisa-casamento.php');
}
if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);
INSERT_POST('anotacoes_civil',$_POST);
$_SESSION['sucesso'] = 'ANOTAÇÃO INSERIDA!';
header('location:pesquisa-nascimento.php');
}
if (isset($_POST['subimit3'])) {
unset($_POST['subimit3']);
INSERT_POST('anotacoes_civil',$_POST);
$_SESSION['sucesso'] = 'ANOTAÇÃO INSERIDA!';
header('location:pesquisa-obito.php');
}

if (isset($_GET['excluir'])) {
$id = $_GET['excluir'];
$tipo = $_GET['tipo'];

$del = $pdo->prepare("DELETE FROM anotacoes_civil where ID = '$id' and TIPO = '$tipo'");
$del->execute();
$_SESSION['sucesso'] =  'DELETADA A ANOTAÇÃO COM SUCESSO';

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
                           <h2>ANOTAÇÕES NOS REGISTROS</h2>

                        </div>
                        <div class="body">

<div class="row clearfix">
	
<legend><i class="material-icons">book</i>  ANOTAÇÕES JÁ PRESENTES NO REGISTRO</legend>
<?php if (isset($_GET['casamento'])): 
$busca = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$livro' and FOLHA = '$folha' and TIPO = 'CAS' ");
$busca->execute();
$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas as $r ) :  ?>
<div class="col-sm-4">
<div class="row bg-blue text-center" style="opacity: .5; border-left: 4px solid black"><h5><?=$r->DATA?></h5></div>
<div class="col-sm-12 ">
<p style="word-wrap: break-word;text-align: justify;"><?=$r->ANOTACAO?></p>
</div>
<a href="incluir-anotacao.php?excluir=<?=$r->ID?>&tipo=CAS&livro=<?=$livro?>&folha=<?=$folha?>&casamento=ok" class=" bg-red btn waves-efect">EXCLUIR ANOTAÇÃO X</a>
</div>
<?php endforeach ?>
<?php if ($busca->rowCount()==0): ?>
  <div class="text-center">Nenhuma anotação encontrada.</div>
<?php endif ?>
</div>

<div class="row clearfix">
 <br> 
<!--legend><i class="material-icons">add</i>INCLUIR NOVA ANOTAÇÃO</legend>
<form method="POST" action="incluir-anotacao.php"> 


<input type="hidden" name="TIPO" value="CAS" >
<input type="hidden" name="DATA" value="<?=$DATA?>">
<br>
<div class="col-sm-4">
<label class="col-md-4 control-form">Livro:</label>
<div class="col-md-8">
<input type="text" class="form-control" name="LIVRO" value="<?=$livro?>" readonly>  
</div>  
</div>

<div class="col-sm-4">
<label class="col-md-4 control-form">Folha:</label>
<div class="col-md-8">
<input type="text" class="form-control" name="FOLHA" value="<?=$folha?>" readonly>  
</div>  
</div>
<br><br><br>
<div class="col-sm-12">
<label class="col-md-12 control-form ">Anotação:</label>
<div class="col-md-12">
<textarea name="ANOTACAO" class="form-control" rows="5"></textarea>
</div>  
</div>  

<div class="col-sm-10"></div>
<button class="btn waves-effect bg-green" name="subimit1" type="subimit"><i class="material-icons">save</i>SALVAR</button-->


</form>
</div>  
<?php endif ?>


<?php if (isset($_GET['nascimento'])): 
$busca = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$livro' and FOLHA = '$folha' and TIPO = 'NAS' ");
$busca->execute();
$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas as $r ) :  ?>
<div class="col-sm-4">
<div class="row bg-blue text-center" style="opacity: .5; border-left: 4px solid black"><h5><?=$r->DATA?></h5></div>
<div class="col-sm-12 ">
<p style="word-wrap: break-word;text-align: justify;"><?=$r->ANOTACAO?></p>
</div>
<a href="incluir-anotacao.php?excluir=<?=$r->ID?>&tipo=NAS&livro=<?=$livro?>&folha=<?=$folha?>&nascimento=ok" class=" bg-red btn waves-efect">EXCLUIR ANOTAÇÃO X</a>  
</div>
<?php endforeach ?>
<?php if ($busca->rowCount()==0): ?>
  <div class="text-center">Nenhuma anotação encontrada.</div>
<?php endif ?>
</div>

<div class="row clearfix">
 <br> 
<!--legend><i class="material-icons">add</i>INCLUIR NOVA ANOTAÇÃO</legend>
<form method="POST" action="incluir-anotacao.php"> 


<input type="hidden" name="TIPO" value="NAS" >
<input type="hidden" name="DATA" value="<?=$DATA?>">
<br>
<div class="col-sm-4">
<label class="col-md-4 control-form">Livro:</label>
<div class="col-md-8">
<input type="text" class="form-control" name="LIVRO" value="<?=$livro?>" readonly>  
</div>  
</div>

<div class="col-sm-4">
<label class="col-md-4 control-form">Folha:</label>
<div class="col-md-8">
<input type="text" class="form-control" name="FOLHA" value="<?=$folha?>" readonly>  
</div>  
</div>
<br><br><br>
<div class="col-sm-12">
<label class="col-md-12 control-form ">Anotação:</label>
<div class="col-md-12">
<textarea name="ANOTACAO" class="form-control" rows="5"></textarea>
</div>  
</div>  

<div class="col-sm-10"></div>
<button class="btn waves-effect bg-green" name="subimit2" type="subimit"><i class="material-icons">save</i>SALVAR</button-->


</form>
</div>  
<?php endif ?>




<?php if (isset($_GET['obito'])): 
$busca = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$livro' and FOLHA = '$folha' and TIPO = 'OBT' ");
$busca->execute();
$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas as $r ) :  ?>
<div class="col-sm-4">
<div class="row bg-blue text-center" style="opacity: .5; border-left: 4px solid black"><h5><?=$r->DATA?></h5></div>
<div class="col-sm-12 ">
<p style="word-wrap: break-word;text-align: justify;"><?=$r->ANOTACAO?></p>
</div>
<a href="incluir-anotacao.php?excluir=<?=$r->ID?>&tipo=OBT&livro=<?=$livro?>&folha=<?=$folha?>&obito=ok" class=" bg-red btn waves-efect">EXCLUIR ANOTAÇÃO X</a>  
</div>
<?php endforeach ?>
<?php if ($busca->rowCount()==0): ?>
  <div class="text-center">Nenhuma anotação encontrada.</div>
<?php endif ?>
</div>

<div class="row clearfix">
 <br> 
<!--legend><i class="material-icons">add</i>INCLUIR NOVA ANOTAÇÃO</legend>
<form method="POST" action="incluir-anotacao.php"> 


<input type="hidden" name="TIPO" value="OBT" >
<input type="hidden" name="DATA" value="<?=$DATA?>">
<br>
<div class="col-sm-4">
<label class="col-md-4 control-form">Livro:</label>
<div class="col-md-8">
<input type="text" class="form-control" name="LIVRO" value="<?=$livro?>" readonly>  
</div>  
</div>

<div class="col-sm-4">
<label class="col-md-4 control-form">Folha:</label>
<div class="col-md-8">
<input type="text" class="form-control" name="FOLHA" value="<?=$folha?>" readonly>  
</div>  
</div>
<br><br><br>
<div class="col-sm-12">
<label class="col-md-12 control-form ">Anotação:</label>
<div class="col-md-12">
<textarea name="ANOTACAO" class="form-control" rows="5"></textarea>
</div>  
</div>  

<div class="col-sm-10"></div>
<button class="btn waves-effect bg-green" name="subimit3" type="subimit"><i class="material-icons">save</i>SALVAR</button-->


</form>
</div>  
<?php endif ?>

</div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>
 <!-- Bootstrap Core Js -->
<script src="../plugins/bootstrap/js/bootstrap.js"></script>



<!-- Waves Effect Plugin Js -->
<script src="../plugins/node-waves/waves.js"></script>

<!-- Jquery DataTable Plugin Js -->
<script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<!-- Input Mask Plugin Js -->
    <script src="../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<!-- Custom Js -->
<script src="../js/admin.js"></script>
<script src="../js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="../js/demo.js"></script>
<script src="../plugins/ajax/screen.js"></script>

<!-- TinyMCE -->
<script src="../js/pages/forms/editors.js"></script>
<script src="../plugins/tinymce/tinymce.js"></script>
<script>
  tinymce.init({
  selector: '.textarea',
    language: 'pt_BR',
    language_url : '../plugins/tinymce/langs/pt_BR.js',
    theme: 'modern',
    plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
       toolbar2: 'preview media | forecolor backcolor emoticons | fontsizeselect fontselect',
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