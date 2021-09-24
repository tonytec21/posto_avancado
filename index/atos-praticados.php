<?php include('../controller_index/db_functions.php');
#error_reporting(0);
#ini_set('display_errors', 0);
session_start();
if(!isset($_SESSION['id'])) {header('location:../login.php');};

/*if (empty($_SESSION['id']) && empty($_SESSION['nome'])) {
$_SESSION['msg'] = "<div class='alert alert-info' role='alert' id='response'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
    &times;</span></button>
    Área restrita
    </div>";
    header("location: .../.../login.php");
}
*/

$URL_ATUAL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$titulo = '';
$pdo = conectar();
if (isset($_GET['id'])) {
$id = $_GET['id'];
}
else{
$id=0;
}

#var_dump($pdo);

$r = PESQUISA_ALL('cadastroserventia'); foreach ($r as $r ){};
include_once("../assets/header.php");

$config_json = file_get_contents("./configs.json");
$config_json = json_decode($config_json);

?>



<?php include_once("../assets/menu.php");?>

<style type="text/css">
@media only screen and (max-width: 700px) {
#ras{ max-width: 100%!important; padding-left: 0%!important; }
.samobile{min-width: 140%!important;margin-left: -35%}
.panel-default a {background: #ddeaff;color:#0d2244!important;}
.semback  {background:white!important;color:#0d2244!important;}

}
@media (min-width: 768px) {
.modal-xl {
width: 100%;
max-width:1300px;
}
}
.samobile{
    width: 50%;
    /* margin-bottom: 10px; */
}
.ico-menu{
    color:white; margin-top: 5px; margin-left: 40px; cursor:pointer;
}

	a:hover, a:focus{
		color:#2e2e2e;
	}

    #customers th {
    padding-top: 12px;
    padding-bottom: 12px;
    text-align: left;
    background-color: #121212;
    color: white;
}

.btn-primary {
    color: #fff;
    background-color: #121212;
    border-color: #121212;
}

.bg-blue {
    background-color: #121212 !important;
}



.info-box:hover{
    opacity: 1;
    box-shadow: 0px 1px black;
    transition: all 0.2s cubic-bezier(1, 0.03, 1, 1.36);
    transform: scale(1.1);
    border-radius: 6px;
}
</style>


<body class="index-page bg-secondary main_dark_mode">
<div id='loader' style="display:none; overflow: hidden;">
			 
		   <!-- Page Loader -->
		<div class="page-loader-wrapper" style=" overflow: hidden;">
    
        <div class="sk-folding-cube">
        <div class="sk-cube1 sk-cube"></div>
        <div class="sk-cube2 sk-cube"></div>
        <div class="sk-cube4 sk-cube"></div>
        <div class="sk-cube3 sk-cube"></div>
        </div>

    </div>
  </div>
      <!-- #END# Page Loader -->
      

<section>

<div class="container-fluid">

         
<div class="card">


<form method="post" id="pesquisa_ordem">
                <div class="row">
                    <div class="col-md-12 offset-md-0 mt-4">
                        <div class="row">
                            <div class="col-4">
                                <div class="form-group">
                                    <label>Resultado por Funcionario:</label>
                                    <select  class="form-control select2" name="funcionario[]"  multiple="" data-placeholder=" - " style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">
                                    <option><?=$_SESSION['nome'];?></option>
                            <?php $w = PESQUISA_ALL('funcionario'); foreach($w as $w): ?>
                            <option><?=$w->strNomeCompleto?></option>
                            <?php endforeach ?>                               
                                     </select>
                                </div>
                            </div>

                            <div class="col-4">
                                <div class="form-group">
                                    <label>Resultado Por Código de Ato: </label>
                                    <select class="form-control select2 js-example-basic-single select2-hidden-accessible"  name="codigo_ato[]"  multiple="" data-placeholder=" - " style="width: 100%;" data-select2-id="1" tabindex="-1" aria-hidden="true">

                            <?php $w = PESQUISA_ALL('ato_novo'); foreach($w as $w): ?>
                            <option value="<?=$w->strCodigoLei;?>"><?=$w->strCodigoLei;?></option>
                            <?php endforeach ?>   
   
                                                    
                                 </select>
                                </div>
                            </div>

                 

                            <div class="col-3">
                                <div class="form-group">
                                <label>Atribuição:</label>
                                    <select class="form-control select2"   name="atribuicao" data-placeholder=" - "  style="width: 100%;" aria-hidden="true">
                                        <option value=" ">SELECIONAR</option>
                                        <option value="13">NOTAS</option>
                                        <option value="14">REGISTRO CIVIL</option>
                                        <option value="15">RTDPJ</option>
                                        <option value="16">IMÓVES</option>
                                        <option value="17">PROTESTO</option>

                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="row">

                        
                        <div class="col-4">
                                <div class="form-group">
                                    <label>Data Inicial:</label>
								                  	<input type="date" name="data_inicio" style="margin-left:-0px !important" class="form-control form-control" placeholder="">
                                </div>
                            </div>


						          	<div class="col-4">
                                <div class="form-group">
                                    <label>Data Final:</label>
								                  	<input type="date" name="data_fim"  style="margin-left:-0px !important"  class="form-control form-control" placeholder="" >                                    
                                </div>
                            </div>

                            <div class="col-3">
                                <div class="form-group">
                                    <label>Ordem:</label>
                                    <select class="form-control select2"   name="ordem" data-placeholder=" - "  style="width: 100%;" aria-hidden="true">
                                        <option value="DESC">DECRESCENTE</option>
                                        <option value="ASC">CRESCENTE</option>
                                    </select>
                                </div>
                            </div>



                        </div>

						<button name="btn-buscar" id="btn-buscar"class="btn btn-lg btn-default">
                                        <i class="fa fa-search"></i> Buscar
                                    </button>



                        
                    </div>
                </div>
            </form>
	


                                    <br><br>

                        <div id="listar"></div>

                        <script type="text/javascript">
                        $(document).ready(function(){

                        $.ajax({
                            url: "./consultas/listar-atos-praticados.php",
                            method: "post",
                        data: $('#pesquisa_ordem').serialize() + '&list=list',
                            dataType: "html",
                            beforeSend: function (data) {

                            $("#loader").show(); // Note the ,e that I added

                            },
                            success: function(result){
                                $('#listar').html(result)
                                
                            },
                            complete: function (data) {
         
                                    $("#loader").hide();
                                },
                                    error: function(xhr, textStatus, errorThrown) {

                                    Swal.fire("RETORNO!", " "+ xhr.responseText + " ", "error");

                            }
                            

                        });

                        //     $(function(){
                        //       $('#btn-buscar').click();
                        // });

                        $('#btn-buscar').click(function(event){
                        event.preventDefault();	

                        $.ajax({
                            url: "./consultas/listar-atos-praticados.php",
                            method: "post",
                        data: $('#pesquisa_ordem').serialize(),
                            dataType: "html",
                            beforeSend: function (data) {

                            $("#loader").show(); // Note the ,e that I added

                            },
                            success: function(result){
                                $('#listar').html(result)
                                
                            },
                            complete: function (data) {
         
                                    $("#loader").hide();
                                },
                                    error: function(xhr, textStatus, errorThrown) {

                                    Swal.fire("RETORNO!", " "+ xhr.responseText + " ", "error");

                            }
                            

                        });

                        });







                        });



                        </script>


    </div></div>

</section>


<div class="modal fade" id="livro_ordem" role="dialog" aria-labelledby="modal-notification"
                aria-hidden="true">
                <div class="modal-dialog modal-info  modal-lg modal-dialog-centered" role="document">
                    <div class="modal-content " style="background: linear-gradient(45deg, #000000, #133985);z-index:100 !important">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-notification">###</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="py-3 text-center">
                                <!-- <i class="ni ni-bell-55 ni-3x"></i> -->
                                <i class="fa fa-book fa-3x" aria-hidden="true"></i>

                                <h2 class="heading-title mt-2 text-white">Recibo</h2>
                                <p>
                                   
                                </p>
                                <p>

                                <form action="./imprimir-recibo.php" method="post">

                                  <div class="row ">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <input type="text" name="nome_cliente" style="margin-left:-0px !important" class="form-control form-control" placeholder="Nome do Cliente" required>
                                            </div>
                                        </div>
                                  </div>


                                  <div class="row ">
                                        <div class="col-6">
                                            <div class="form-group">
                                                <input type="text" name="valor_recebido"  onkeyup="dinheiro(this)" style="margin-left:-0px !important" class="form-control" placeholder="" required>
                                            </div>
                                        </div>

                                        <div class="col-8">
                                            <div class="form-group">
                                            <select  class="form-control" name="funcionario_">
                                            <option value="">Selecionar Funcionario</option>
                                            <option><?=$_SESSION['nome'];?></option>                                            
                                            <?php $w = PESQUISA_ALL('funcionario'); foreach($w as $w): ?>
                                            <option><?=$w->strNomeCompleto?></option>
                                            <?php endforeach ?>                               
                                            </select>                                          
                                              </div>
                                        </div>
                                  </div>

                                    <hr>
                                       
                                    <div id="resultado_atos"></div>


                                <BR><BR>
                                <button class="btn btn-warning">
                    <!-- <button data-id="39"  value="39" onclick="getCampo(this)" type="button" class="btn btn-primary" >\ -->
                <i class="fa fa-print"></i>  Imprimir
                </button>
                </form>

                                </p>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <!-- <button type="button" class="btn btn-white">Ok, Got it</button> -->
                            <button type="button" class="btn btn-link text-white ml-auto"
                                data-dismiss="modal">Fechar</button>
                        </div>
                    </div>
                </div>
            </div>

</body>


<?php include_once("../assets/footer.php");?>