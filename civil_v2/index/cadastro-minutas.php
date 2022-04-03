<?php include('../controller/db_functions.php');session_start();
$pdo = conectar();

include_once("../assets/header.php");
include_once("../assets/menu.php");

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

        <div class="row col-lg-12">
        <div class="col-lg-9"></div>
        <div class="col-lg-3" >
          <a class="btn btn-info btn-lg btn-block" onclick="$('#modelos').modal()"><i class="fa fa-eye"></i> VER MODELOS</a>
        </div>
        <form class="form-horizontal" id="formaverbacao"  method="POST" enctype="multipart/form-data" action="update-minuta-civil.php">
        </div>

        <div class="row">
          <div class="col-lg-12">
            <label for="country">TITULO/DESCRIÇÃO:</label>    
              <input type="text" id="titulo" name="titulo" class="form-control">
          </div>

          <div class="col-lg-12">
            <label for="country">TEXTO DO MODELO</label>

              <textarea id="texto" name="texto" class="textarea tinymce-100">
              </textarea>

          </div>
        </div>
        <br><br>
        <div class="row">
          <div class="col-sm-1"></div>    

          <div class="col-sm-10">
            <a id="botaoform" class="btn btn-primary btn-block btn-lg">
              <i class="fa fa-save"></i> SALVAR MODELO</a>
            </div>
          </div>
          </div>    
          <br><br><br>    
        </div>
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


<div id="modelos" class="modal fade"  tabindex="-1" role="dialog"   aria-hidden="true">
    <?php $linhas = PESQUISA_ALL('cadastro_minutas_civil');?>
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">MODELOS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">

          <div class="table-responsive" >
            <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
              <thead>
                <tr>
                  <th>TITULO</th>
                  <th>######</th>
                  <th>EDITAR</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th>TITULO</th>
                  <th>######</th>
                  <th>EDITAR</th>
                </tr>
              </tfoot>
              <tbody>
                <?php   foreach($linhas as $b):?>

                  <tr>
                    <td><?=$b->titulo?></td>
                    <td><a onclick='tinymce.get("texto").setContent("<?=strip_tags($b->texto)?>");' class="btn gradient-azul-forte" data-dismiss="modal">USAR MODELO</a></td>
                    <td><a href="update-minuta-civil.php?id=<?=$b->ID?>"><i class="material-icons">edit</i></a></td>
                  </tr>


                <?php endforeach ?>
              </tbody>
            </table>

          </div>


          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
          </div>
        </div>
      </div>
    </div>
  </div>