<?php include('../controller/db_functions.php');session_start();include('header.php');
include('menu.php'); ?>


    <section class="content" style="margin-left: 30px"  >
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    PESQUISAR
                    <small>Digite a busca:<a href="https://datatables.net/" target="_blank"></a></small>
                </h2>
            </div>
            <!-- Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                        AVERBAÇÕES 
                            </h2>

                        </div>
                        <div class="body" >
                           <h3>Pesquisar averbações para exportação:</h3>
                           <div class="row clearfix">
                            <form>
                            <div class="col-md-4">
                           <label class="col-md-4">Data inicial:</label>
                           <div class="col-md-8">
                           <input type="date" class="form-control" name="data_inicial"> 
                           </div>
                           </div>

                           <div class="col-md-4">
                           <label class="col-md-4">Data Final:</label>
                           <div class="col-md-8">
                           <input type="date"  class="form-control" name="data_final"> 
                           
                           </div>
                           </div>
                          
                           <button class="btn waves-efect bg-green" type="subimit"><i class="material-icons">search</i> Buscar</button> 
                          
                           </form>
                           
                           </div>

<div id="principal">
 <?php if (isset($_GET['data_final']) && isset($_GET['data_inicial']))
include('busca_averbacoes.php');
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

<script>
document.onkeyup = function(e) {
if (e.which == 37) {
// window.open("cartorio-notas.php");
window.location = "../index.php";
}

};
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



  <div class="modal fade" id="impressao" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title" id="impressaoLabel">IMPRESSÃO:</h4>
  </div>
  <div class="modal-body">
  <form class="form-horizontal" method="POST" action="PDFS/pdf-averbacao.php?data_inicial=<?=$data_inicial?>&data_final=<?=$data_final?>" >
  <input type="hidden" name="id" id="id">
  <label for="posicao">Posicao inicial:</label>
  <input class="form-control" type="number" value="1" name="posicao" min='1' max="16" required="">
  <br><br>
  <label for="posicao">Assinatura:</label>
  <select class="form-control" name="funcionario" required="">
  <option value="">SELECIONE</option> 
  <?php $q= PESQUISA_ALL('funcionario'); foreach($q as $q): if($q->strPermissaoAssinar == 'S')?>
  <option><?=$q->strNomeCompleto?></option>
  <?php endforeach ?>
  <?php $w= PESQUISA_ALL_ID('cadastroserventia',1); foreach($w as $w): ?>
  <option><?=$w->strTituloServentia?></option>
  <?php endforeach ?>
  </select>
  <br><br>
  <div class="col-md-12">

  <div style="margin-left: -15%" class="col-md-6" >
  <input type="checkbox" id="setImpressoraTermica" name="setImpressoraTermica" value="S" />
  <label for="setImpressoraTermica" class="control-form col-md-4">IMPRESSORA TÉRMICA</label>
  </div>
  </div>

  <br><br>

  </div>
  <div class="modal-footer">
  <button type="subimit" class="btn bg-red waves-effect">
  <i class="material-icons">print</i>
  <span>IMPRIMIR </span>
  </button>
  </form>
  <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCELAR</button>
  </div>
  </div>
  </div>
  </div>

    <div class="modal fade" id="impressao2" tabindex="-1" role="dialog">
  <div class="modal-dialog modal-sm" role="document">
  <div class="modal-content">
  <div class="modal-header">
  <h4 class="modal-title" id="impressaoLabel">IMPRESSÃO:</h4>
  </div>
  <div class="modal-body">
  <form class="form-horizontal" method="POST" action="PDFS/pdf-averbacao.php?data_inicial=<?=$data_inicial?>&data_final=<?=$data_final?>&anotacao=ok" >
  <input type="hidden" name="id" id="id2">
  <label for="posicao">Posicao inicial:</label>
  <input class="form-control" type="number" value="1"  name="posicao" min="1" max="16" required="">
  <br><br>
  <label for="posicao">Assinatura:</label>
  <select class="form-control" name="funcionario" required="">
  <option value="">SELECIONE</option> 
  <?php $q= PESQUISA_ALL('funcionario'); foreach($q as $q): if($q->strPermissaoAssinar == 'S')?>
  <option><?=$q->strNomeCompleto?></option>
  <?php endforeach ?>
  <?php $w= PESQUISA_ALL_ID('cadastroserventia',1); foreach($w as $w): ?>
  <option><?=$w->strTituloServentia?></option>
  <?php endforeach ?>
  </select>
  <br><br>
  <div class="col-md-12">

  <div style="margin-left: -15%" class="col-md-6" >
  <input type="checkbox" id="setImpressoraTermica2" name="setImpressoraTermica" value="S" />
  <label for="setImpressoraTermica2" class="control-form col-md-4">IMPRESSORA TÉRMICA</label>
  </div>
  </div>

  <br><br>

  </div>
  <div class="modal-footer">
  <button type="subimit" class="btn bg-red waves-effect">
  <i class="material-icons">print</i>
  <span>IMPRIMIR </span>
  </button>
  </form>
  <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCELAR</button>
  </div>
  </div>
  </div>
  </div>
</body>

</html>
