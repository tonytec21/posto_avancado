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






include('../assets/header.php');
include('../assets/menu.php');
 ?>


<body class="index-page bg-secondary main_dark_mode" style="max-width:100%">
    <section style="margin-top: -3%;">
    <div class="row">
     <div class="section section-components col-lg-12">
       <div class="container">
         <legend class="bg-white" style="padding:20px">
          <div class="row col-lg-12">
            <h3 class="col-lg-10">CADASTRO DE MODELOS DE AVERBAÇÃO</h3>
            <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" ni ni-archive-2"></i></div>
          </div>  
        </legend>



             
                           <form class="form-horizontal" id="formaverbacao"  method="POST" enctype="multipart/form-data" action="update-minuta-civil.php">


                           <div class="row">
                            <div class="col-lg-12">
                                <label for="country">TITULO/DESCRIÇÃO:</label>   
                                <input type="text" id="tituloupdate" name="tituloupdate" class="form-control" value="<?=$titulo?>">
                                <input type="hidden" name="id" value="<?=$id?>">
                            </div>

                            <div class="col-lg-12">
                                <label for="country">TEXTO DO MODELO</label>
                                <textarea id="texto" name="textoupdate" class="textarea tinymce-100" >
                                    <?=palavras_bloqueadas($texto)?>
                                </textarea>
                            </div>



                            </div>
                            <br><br>
                            <div class="row">
<div class="col-sm-1"></div>    
 
<div class="col-sm-10">
            <a id="botaoform" class="btn btn-block btn-lg btn-info">
            <i class="fa fa-save"></i> SALVAR MODELO</a>
        </div>
</div>    


                            <br><br><br>    


 

    







</form>
    </div>
  </div>
</div>
</section>
</body>
<script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/moment.min.js"></script>
<script src="../assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
<script src="../assets/js/plugins/bootstrap-datepicker.min.js"></script>
<script src="../assets/plugins/jquery.inputmask.bundle.js"></script>
<script src="../assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../assets/plugins/tinymce/tinymce.js"></script>
<script src="js/editor.js"></script>

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
