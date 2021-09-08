<?php include('../controller/db_functions.php');

session_start();

unset($_SESSION['tab1']);
unset($_SESSION['tab2']);
unset($_SESSION['tab3']);
unset($_SESSION['tab4']);
unset($_SESSION['tab5']);
unset($_SESSION['tab6']);
unset($_SESSION['numero_registro']);
unset($_SESSION['averbacaotemp']);

if (isset($_SESSION['nomeapoio']) && $_SESSION['nomeapoio']!='' && $_SESSION['nomeapoio']!=' ') {
$_SESSION['nome'] = $_SESSION['nomeapoio'];
}

if (isset($_SESSION['funcaoapoio']) && $_SESSION['funcaoapoio']!='' && $_SESSION['funcaoapoio']!=' ') {
$_SESSION['funcao'] = $_SESSION['funcaoapoio'];
}
$tabela_custas = file_get_contents("../selador/custas.json");
$tabela_custas = json_decode($tabela_custas, true);
$_SESSION['tabelavigente'] = $tabela_custas["registro_civil"];

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
                    NASCIMENTO
                </legend>
            </div>

            <div class="row">


                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="hovicon effect-9 sub-a" style="background:linear-gradient(45deg, #3394d4, #daf0ff);">
                    <div onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/bd_INSERTS/insert-nascimento.php'?>'" style="cursor:pointer" class="icon">
                    <i class="material-icons" style="font-size: 50px;margin-top: 18px;">child_friendly</i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Nascimento</div>
                </div>
                
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="hovicon effect-9 sub-a" style="background:linear-gradient(45deg, #3394d4, #daf0ff);">
                <div onclick="window.location.href='pesquisa-nascimento.php'" style="cursor:pointer" class="icon">
                        <i class="fa fa-search" style="font-size: 60px; line-height: 103px; position: absolute; color: #04050782" aria-hidden="true"></i>
                        <i class="material-icons" style="font-size: 50px;margin-top: 18px;">child_friendly</i>                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Pesquisa Nascimento</div>
                </div>
                
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="hovicon effect-9 sub-a" style="background:linear-gradient(45deg, #3394d4, #daf0ff);">
                        <div onclick="window.location.href='relatorio-pdf-nascimentos.php'"  style="cursor:pointer" class="icon">
                        <i class="fa fa-bar-chart" style="font-size: 50px;margin-left: -4px;margin-top: 18px;" aria-hidden="true"></i>     
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;margin-left: -8px;">Relatório Nascimento</div>
                </div>



            <hr>

            <!-- <div class="row">
                <legend>
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    ÓBITO
                </legend>
            </div>

            <div class="row">


                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box  hovicon effect-9 sub-a" style="background-image: linear-gradient(rgb(69 131 237 / 36%), rgb(60 72 173 / 9%)), url(../images/ico-obito-edit.png)">
                    <div onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/bd_INSERTS/insert-obito.php'?>'" style="cursor:pointer" class="icon"> 
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Óbito</div>
                </div>
                
                
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box  hovicon effect-9 sub-a" style="background-image: linear-gradient(rgb(69 131 237 / 36%), rgb(60 72 173 / 9%)), url(../images/ico-pesquisa-obito-edit.png)">
                        <div onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/index/pesquisa-obito'?>'"  style="cursor:pointer" class="icon">
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Pesquisa Óbito</div>
                </div>
                
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box  hovicon effect-9 sub-a" style="background:linear-gradient(to top, #4583ed 0%, #330867 200%) !important;">
                        <div onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/index/relatorio-pdf-obitos'?>'" style="cursor:pointer" class="icon">
                           <i class="material-icons" style="color:white!important">airline_seat_flat</i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                   <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Relatório Óbitos</div>
                </div>



            <hr> -->


            <!--DESCOMENTAR EM MIGRACAO 01 -->
            <!--hr>
             <div class="row">
                <legend>
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    MIGRAÇÃO DE OUTROS SISTEMAS

                </legend>
            </div>
                        <div class="row">


                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box  hovicon effect-9 sub-a" style="background:linear-gradient(to top, #4583ed 0%, #330867 200%) !important;">
                        <div onclick="window.location.href='../../pages/tables/migracao_01/cartorio-civil.php'"  style="cursor:pointer" class="icon">
                             <i class="material-icons" style="color:white!important">screen_share</i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Pagina Inicial</div>
                </div>
            </div-->


             <!--DESCOMENTAR EM MIGRACAO 03 -->
            <!--hr>
             <div class="row">
                <legend>
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    MIGRAÇÃO DE OUTROS SISTEMAS

                </legend>
            </div>
                        <div class="row">


                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="info-box  hovicon effect-9 sub-a" style="background:linear-gradient(to top, #4583ed 0%, #330867 200%) !important;">
                        <div onclick="window.location.href='../../pages/tables/migracao_03/cartorio-civil.php'"  style="cursor:pointer" class="icon">
                             <i class="material-icons" style="color:white!important">screen_share</i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Pagina Inicial</div>
                </div>
            </div-->



            <div class="modal fade" id="crc" tabindex="-1" role="dialog" aria-labelledby="modal-notification"
                aria-hidden="true">
                <div class="modal-dialog modal-info modal-dialog-centered modal-" role="document">
                    <div class="modal-content bg-gradient-info">
                        <div class="modal-header">
                            <h6 class="modal-title" id="modal-title-notification">###</h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="py-3 text-center">
                                <!-- <i class="ni ni-bell-55 ni-3x"></i> -->
                                <i class="fa fa-cloud fa-3x" aria-hidden="true"></i>

                                <h2 class="heading-title mt-2 text-white">CRC</h2>
                                <p>
                                    Escolha uma das opções abaixo que você deseja realizar a exportação.
                                </p>
                                <p>

                                    <select class="form-control" id="docs">

                                        <option value="" selected>SELECIONAR</option>
                                        <option value="1">NASCIMENTO</option>
                                        <option value="2">CASAMENTOS
                                        </option>
                                        <option value="3">ÓBITOS</option>

                                    </select>

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
        </div>


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
                if (modal == 'crc') {
                    var select = document.getElementById('docs');
                    var id = id;

                    select.onchange = function () {
                        if (this.value == 1) {
                            window.location.href = "exportar-crc-registro-nascimento.php";
                        }

                        if (this.value == 2) {
                            window.location.href = "exportar-crc-registro.php";
                        }

                        if (this.value == 3) {
                            window.location.href = "exportar-crc-registro-obito.php";
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

   