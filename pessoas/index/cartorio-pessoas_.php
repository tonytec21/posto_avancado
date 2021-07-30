<?php include('../controller/db_functions.php');
#error_reporting(0);
#ini_set('display_errors', 0);
session_start();

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
$titulo = 'Procuração';
$pdo = conectar();
if (isset($_GET['id'])) {
$id = $_GET['id'];
}
else{
$id=0;
}
#var_dump($pdo);
$dados_lavratura = SEARCH_ID('notas_lavratura',$id,'no');
$r = PESQUISA_ALL_ID('notas_lavratura',$id);

include_once("../assets/header.php");
?>

<?php include_once("../assets/menu.php");?>


<body class="index-page bg-secondary main_dark_mode">


<section>
    <br>

    <div class="container">


        <div class="py-2 bg-secondary">


            <div class="row">
                <legend>
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    CADASTRO DE PESSOAS
                </legend>
            </div>

            <div class="row">


                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">

                    <div class="info-box  hovicon effect-9 sub-a" style="background: linear-gradient(to top, #8c001a 0%, #330867 150%) !important;">
                        <div onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/pesquisaPessoas.php'?>'" style="cursor:pointer"
                            class="icon">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Buscar Pessoas
                    </div>
                </div>

                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box  hovicon effect-9 sub-a" style="background: linear-gradient(to top, #8c001a 0%, #330867 150%) !important;">
                        <div onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/cadastro_pessoas_new.php'?>'" style="cursor:pointer"
                            class="icon">
                            <i class="fa fa-user-plus" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Cadastrar Pessoas</div>
                </div>

            </div>
<hr>



            <div class="row">
                <legend>
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    RELATÓRIOS
                </legend>
            </div>

            <div class="row">

                
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box  hovicon effect-9 sub-a" style="background: linear-gradient(to top, #8c001a 0%, #330867 150%) !important;"
                        style="background: linear-gradient(to top, #8c001a 0%, #330867 150%) !important;">
                        <div onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/pessoas-relatorio.php'?>'" style="cursor:pointer"
                            class="icon">
                            <i class="fa fa-book" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Relatório de Cadastro</div>
                </div>



                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box  hovicon effect-9 sub-a" style="background: linear-gradient(to top, #8c001a 0%, #330867 150%) !important;">
                        <div onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/pessoas-relatorio-fichas.php'?>'" style="cursor:pointer"
                            class="icon">
                            <i class="fa fa-file-text" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Relatório de Ficha</div>
                </div>




            </div>

              <div class="row">
                <legend>
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    COMUNICAÇÕES COM SISTEMAS EXTERNOS
                </legend>
            </div>

            <div class="row">
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box  hovicon effect-9 sub-a" style="background: linear-gradient(to top, #8c001a 0%, #330867 150%) !important;">
                        <div onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/arquivo-ccn.php'?>'" style="cursor:pointer"
                            class="icon">
                            <i class="fa fa-save" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Cadastro Único de Clientes - CCN</div>
                </div>




            </div>
<!-- 

            <div class="row">
                <legend>
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    CADASTRO DE PESSOAS (MIGRAÇÃO):
                </legend>
            </div>

            <div class="row">


                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">

                    <div class="info-box  hovicon effect-9 sub-a" style="background: linear-gradient(to top, #8c001a 0%, #330867 150%) !important;">
                        <div onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/pesquisa-pessoa-migracao.php'?>'" style="cursor:pointer"
                            class="icon">
                            <i class="fa fa-search-minus" aria-hidden="true"></i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;font-weight:bold">
                        Buscar Pessoas (Migração)</div>
                </div>


            </div> -->





        <script type="text/javascript">
  $(document).ready(function () {

      setTimeout(function(){ 
        
        $('#docs').val('');
      //  window.scrollBy(0, 0);
        },
       100);
 });
            function pdfs(modal) {
                var modal = modal;
                if (modal == 'censec') {
                    var select = document.getElementById('docs');
                    var id = id;

                    select.onchange = function () {
                        if (this.value == 1) {
                            window.location = "exportar-censec-cep.php";
                        }

                        if (this.value == 2) {
                            window.location = "exportar-censec-cesdi.php";
                        }

                        if (this.value == 3) {
                            window.location = "exportar-censec-rcto.php";
                        }
                    }
                }


                //end if variavel modal ---------------------------------------------------------



            }
        </script>
        <!-- OUTROS -->
        <!-- OUTROS -->
        <!-- OUTROS -->

    </div>



    </div>


</section>

</body>



<?php include_once("../assets/footer.php");?>