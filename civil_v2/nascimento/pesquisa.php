<?php include('../controller/db_functions.php');
session_start();
include_once("../assets/header.php");
include("../index/verifica-modulos.php");
if (isset($_GET['id_busca'])) {
$id = $_GET['id_busca'];
}

if (isset($_GET['mensagem'])) {$mensagem = $_GET['mensagem'];}
else{$mensagem = '';}

include_once("../assets/menu.php");
?>



<body class="index-page bg-secondary main_dark_mode" style="max-width:100%">
	<section style="margin-top: -3%;">
      <div class="row">
        <div class="section section-components col-lg-12">
          <div class="container">
             <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">PESQUISAR REGISTROS</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" fa fa-search"></i></div>
                            </div>  
                            </legend>

                            <div class="row">
                            <div class="col-lg-6">
                              <label for="country">LIVRO:</label>
                              <input id="LIVRONASCIMENTO" name="LIVRONASCIMENTO" type="number"  class="form-control valid" aria-invalid="false" required="true">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">FOLHA:</label>
                              <input id="FOLHANASCIMENTO" name="FOLHANASCIMENTO" type="number"  class="form-control valid" aria-invalid="false" required="true">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">TERMO:</label>
                              <input id="TERMONASCIMENTO" name="TERMONASCIMENTO" type="number"  class="form-control valid" aria-invalid="false" required="true">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">DATA REGISTRO:</label>
                              <input id="DATAENTRADA" name="DATAENTRADA" type="date"  class="form-control valid" aria-invalid="false" required="true">
                            </div>

                            <div class="col-lg-12">
                              <label for="country">MATRICULA:</label>
                              <input id="MATRICULA" name="MATRICULA" type="text"  class="form-control valid" aria-invalid="false" >
                            </div>

                            <div class="col-lg-12">
                              <label for="country">NOME:</label>
                              <input id="NOME" name="NOME" type="text"  class="form-control valid" aria-invalid="false" required="true">
                            </div>
                            
                            <div class="col-lg-12">
                              <label for="country">FILIAÇÃO:</label>
                              <input id="NOMEMAE" name="NOMEMAE" type="text"  class="form-control valid" aria-invalid="false" required="true">
                            </div>


                            
                          </div>
                          <br><br>
                          <button class="btn btn-primary btn-lg btn-block" onclick="pesquisaregistro()"> <i class="fa fa-search" aria-hidden="true"></i>
                          BUSCAR </button>

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
<script src="js/funcoes.js"></script>

<!--///////////////////////////////////////////////////////////////////////////////////////-->

<div id="modalresultado" class="modal fade"  tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">RESULTADOS PARA A BUSCA</h5>
        <input id="tipopartebuscar" type="hidden"></input>
        <input type="hidden" id="idreg2">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-lg-12" id="resultadobusca">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////-->

<script type="text/javascript">
  $(document).ready(function(){
    var check_message = '<?=$mensagem?>';
    if (check_message!='') {
     notify('success',check_message, "");
    }

  });
 
</script>