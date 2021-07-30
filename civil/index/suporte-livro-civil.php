<?php include('../controller/db_functions.php');session_start();include('header.php');
include('menu.php'); ?>


    <section class="content" style="margin-left: 30px!important"  >
        <div class="container-fluid">
            <!-- Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                     
                        <div class="body" >
                           <h3>Selecione o Livro:</h3>
                           <div class="row clearfix">
                            <form>
                              <div class="col-sm-1"></div>
                              <div class="col-sm-10">
                            <select class="form-control" id="" name="tipo_livro">
                              <option value="">SELECIONE</option>
                              <option value="livro_nascimentos">NASCIMENTOS</option>
                              <option value="livro_casamentos">CASAMENTOS</option>
                              <option value="livro_casamentos_auxiliar">CASAMENTOS AUXILIAR</option>
                              <option value="livro_obitos">OBITOS</option>
                              <option value="livro_obitos_auxiliar">OBITOS AUXILIAR</option>
                              <option value="livro_especial">LIVRO ESPECIAL</option>
                            </select>
                            <br><br>
                           <button class="col-sm-12 btn waves-efect bg-green" type="subimit"><i class="material-icons">search</i> Buscar</button> 
                            </div>
                            
                          <br><br>
                           </form>
                           
                           </div>

<div id="principal">
 <?php if (isset($_GET['tipo_livro'])){
include('busca-liberar-livro-civil.php');}
?>
            </div>

                        </div>
                    </div>
                </div>
            </div>

            <!-- #END# Exportable Table -->
        </div>
    </section>

<!-- fim da 1 ####################################################################################################################-->




<script type="text/javascript">
    $(document).ready(function(){
  $("#cpf").inputmask("000.000.000-00");

});
</script>

    <!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>

    <script>
$(document).ready(function(){
$("#imgBookc").click(function(){
$("#leftsidebar").toggle();
});
});
</script>




    <!-- Bootstrap Core Js -->
    <script src="../plugins/bootstrap/js/bootstrap.js"></script>


    <!-- Slimscroll Plugin Js -->
    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

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
<script type="text/javascript">
$(document).ready(function(){
  $(".cpf").inputmask("999.999.999-99");
   $(".rg").inputmask("999999999999-9/AAA-AA");

});
</script>


    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>
    <script src="../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <!-- Demo Js -->
    <script src="../js/demo.js"></script>


    <script>

    $(function () {
          $("#seloGratuito").click(function () {
              if ($(this).is(":checked")) {
                  $("#dvJustificativa").show();
                  $("#AddBranco").hide();
              } else {
                  $("#dvJustificativa").hide();
                  $("#AddBranco").show();
              }
          });
      });
  </script>


    <script>

    $(function () {
          $("#selocliente").click(function () {
              if ($(this).is(":checked")) {
                  $("#dvJustificativa").show();
                  $("#AddBranco").hide();
              } else {
                  $("#dvJustificativa").hide();
                  $("#AddBranco").show();
              }
          });
      });
  </script>
   <script>

    $(function () {
          $("#selocartorio").click(function () {
              if ($(this).is(":checked")) {
                  $("#dvJustificativa").show();
                  $("#AddBranco").hide();
              } else {
                  $("#dvJustificativa").hide();
                  $("#AddBranco").show();
              }
          });
      });
  </script>



  <script src="../plugins/tinymce/tinymce.js"></script>
 <script>
    tinymce.init({
    selector: '#strTextoviaCartorio'
    });
    </script>
    <script>
    tinymce.init({
    selector: '#strTextoviaCliente'
    });
    </script>

  <script>

  $(function () {
        $("#seloGratuito2").click(function () {
            if ($(this).is(":checked")) {
                $("#dvJustificativa2").show();
                $("#AddBranco2").hide();
            } else {
                $("#dvJustificativa2").hide();
                $("#AddBranco2").show();
            }
        });
    });
</script>
<script >
  function LoadPage(caminho) {
var xhttp;   xhttp = new XMLHttpRequest();

xhttp.onreadystatechange = function() {
if (this.readyState == 4 && this.status == 200) {
document.getElementById("principal").innerHTML = this.responseText;
return;} else{
document.getElementById("principal").innerHTML = "ERRO: Nenhuma Solicitação"; 
return;}
};
xhttp.open("GET", caminho, true); xhttp.send();}
</script>

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
