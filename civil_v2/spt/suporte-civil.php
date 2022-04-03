<?php include('../controller/db_functions.php');
session_start();
include_once("../assets/header.php");
include("../index/verifica-modulos.php");
include_once("../assets/menu.php");
?>

<body class="index-page bg-secondary main_dark_mode" style="max-width:100%">
	<section style="margin-top: -3%;">
      <div class="row">
        <div class="section section-components col-lg-12">
          <div class="container">
             <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">LIBERAR FOLHA PARA REGISTRO</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" fa fa-search"></i></div>
                            </div>  
                            </legend>
 <form>
                           
                              
                            <div class="col-lg-12">
                              <label for="country">SELECIONE O LIVRO:</label>
                              <select class="form-control" id="" name="tipo_livro">
                              <option value="">SELECIONE</option>
                              <option value="livro_nascimentos">NASCIMENTOS</option>
                              <option value="livro_casamentos">CASAMENTOS</option>
                              <option value="livro_casamentos_auxiliar">CASAMENTOS AUXILIAR</option>
                              <option value="livro_proclamas">PROCLAMAS</option>
                              <option value="livro_obitos">OBITOS</option>
                              <option value="livro_obitos_auxiliar">OBITOS AUXILIAR</option>
                              <option value="livro_especial">LIVRO ESPECIAL</option>
                            </select>
                            </div>


                            
                     
                          <br><br>
                          <button class="btn btn-primary btn-lg btn-block"> <i class="fa fa-search" aria-hidden="true"></i>
                          BUSCAR </button>
                     
                   

                             </form>
                

                        <div class="col-lg-12">
                           <?php if (isset($_GET['tipo_livro'])){
                            include('busca-liberar-livro-civil.php');}
                            ?>
                            </div>
                                </div>


      </div>

  </div>
</section>
</body>	
<!--   Core JS Files   -->
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

<script type="text/javascript">
function notify(classe,mensagem, titulo ){
  $.notify({
      // options
      title: titulo,
      message: mensagem,
      icon: 'glyphicon glyphicon-envelope',
    },{
      // settings
      element: 'body',
      position: null,
      type: classe,
      allow_dismiss: true,
      placement: {
        from: "bottom",
        align: "right"
      },
      delay: 2000,
      timer: 2000,
      url_target: '_blank',
  });
}
	
</script>

<script src="../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script type="text/javascript">
      $('.table').DataTable();
      $('#DataTables_Table_0_wrapper').removeClass('form-inline');
</script>