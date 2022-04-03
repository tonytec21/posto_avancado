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
                              <h3 class="col-lg-10">RELATÓRIO DE REGISTROS</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" fa fa-search"></i></div>
                            </div>  
                            </legend>

                            <div class="row">
                            <div class="col-lg-6">
                              <label for="country">LIVRO:</label>
                              <input id="LIVRONASCIMENTO" name="LIVRONASCIMENTO" type="number"  class="form-control valid" aria-invalid="false" required="true">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">DATA INICIAL:</label>
                              <input id="DATAINICIAL" name="DATAINICIAL" type="date"  class="form-control valid" aria-invalid="false" required="true">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">DATA FINAL:</label>
                              <input id="DATAFINAL" name="DATAFINAL" type="date"  class="form-control valid" aria-invalid="false" required="true">
                            </div>

                            
                          </div>
                          <br><br>
                          <button class="btn btn-primary btn-lg btn-block" onclick="busca()"> <i class="fa fa-search" aria-hidden="true"></i>
                          BUSCAR </button>

                       
                        <div class="col-lg-12 card" id="resultadobusca" style="padding: 5%;"></div>   
          </div>

      </div>


  </div>
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
	function busca(){
  var LIVRONASCIMENTO = $('#LIVRONASCIMENTO').val();
  var DATAINICIAL = $('#DATAINICIAL').val();
  var DATAFINAL = $('#DATAFINAL').val();


  if (LIVRONASCIMENTO == '' && DATAINICIAL == '' &&	DATAFINAL == '') 
  {
    notify('danger',"AO MENOS UM CAMPO DEVE SER PREENCHIDO PARA A PESQUISA", "");
  }

  else{

    $('#modalresultado').modal();

    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        $('#resultadobusca').html (this.responseText);
        return;

      }
      else{
        $('#resultadobusca').html ("<br><br><h4 class='text-center'>Carregando...  <i class='fa fa-spinner'></i> </h4>");
        return;
      }
    };



    xhttp.open("POST", "control/busca-relatorio-nascimento.php?LIVRONASCIMENTO="+LIVRONASCIMENTO+"&DATAINICIAL="+DATAINICIAL+"&DATAFINAL="+DATAFINAL, true);
    xhttp.send();

  }

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
