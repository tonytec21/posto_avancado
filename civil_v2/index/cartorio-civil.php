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

$tabela_custas = file_get_contents("../selador/custas.json");
$tabela_custas = json_decode($tabela_custas, true);
$_SESSION['tabelavigente'] = $tabela_custas["registro_civil"];

include_once("../assets/header.php");
include("verifica-modulos.php");

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
                    REGISTROS
                </legend>
            </div>

            <div class="row">


                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="hovicon effect-9 sub-a" style="background:linear-gradient(45deg, #172b4d, rgb(116 117 120));">
                        <div onclick="window.location.href='../nascimento/inserts/insert-nascimento.php'" style="cursor:pointer" class="icon">
                             <i class="material-icons" style="font-size: 50px;margin-top: 18px;">child_friendly</i>
                        </div>
                        
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;margin-left: -8px;">Nascimento</div>
                </div>
                

                <!-- <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="hovicon effect-9 sub-a" style="background:linear-gradient(45deg, #172b4d, rgb(116 117 120));">
                        <div onclick="window.location.href='../obito/inserts/insert-obito.php'" style="cursor:pointer" class="icon">
                             <i class="material-icons" style="font-size: 50px;margin-top: 18px;">airline_seat_flat</i>
                        </div>

                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;margin-left: -8px;">Óbito</div>
                </div> -->


            </div>



            <hr>
            


            <div class="row">
                <legend>
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                   CONSULTAS
                </legend>
            </div>

            <div class="row">


                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="hovicon effect-9 sub-a" style="background:linear-gradient(45deg, #172b4d, rgb(116 117 120));">
                        <div onclick="window.location.href='../nascimento/pesquisa.php'" style="cursor:pointer" class="icon">

                        <i class="material-icons" style="font-size: 30px;margin-top: 38px;margin-left: 18px;position: absolute;color: #000;">child_friendly</i>
                        <i class="fa fa-search" style="font-size: 50px;color: #f4f5f7;" aria-hidden="true"></i>     
                             
                        </div>

                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;margin-left: -8px;">Pesquisa Nascimento</div>
                </div>
                
                <!-- <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class="hovicon effect-9 sub-a" style="background:linear-gradient(45deg, #172b4d, rgb(116 117 120));">
                        <div onclick="window.location.href='../obito/pesquisa.php'" style="cursor:pointer" class="icon">

                        <i class="material-icons" style="font-size: 30px;margin-top: 38px;margin-left: 18px;position: absolute;color: #000;">airline_seat_flat</i>
                        <i class="fa fa-search" style="font-size: 50px;color: #f4f5f7;" aria-hidden="true"></i>     

                        </div>

                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;margin-left: -8px;">Pesquisa Óbito</div>
                </div> -->




                <?php 

                $conf = file_get_contents("../consultas/configuracoes_basicas.json");
                $decode = json_decode($conf,true);
                if ($decode['usa_migracao'] == 'S') :
                 ?>

                <?php if ($decode['tipo_migracao'] == '3'): ?>
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="hovicon effect-9 sub-a" style="background:linear-gradient(to top, #4583ed 0%, #330867 200%) !important;">
                        <div onclick="window.location.href='../../pages/tables/migracao_03/cartorio-civil'" style="cursor:pointer" class="icon">
                             <i class="material-icons" style="font-size: 50px;margin-left: -4px;margin-top: 18px;">sd_storage</i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;margin-left: -8px;">Registros Migrados de Outra Base</div>
                </div>
              
            <?php elseif($decode['tipo_migracao'] == '1'): ?>
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="hovicon effect-9 sub-a" style="background:linear-gradient(to top, #4583ed 0%, #330867 200%) !important;">
                        <div onclick="window.location.href='../../pages/tables/migracao_01/cartorio-civil'" style="cursor:pointer" class="icon">
                             <i class="material-icons" style="font-size: 50px;margin-left: -4px;margin-top: 18px;">sd_storage</i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;margin-left: -8px;">Registros Migrados de Outra Base</div>
                </div>
              <?php endif ?>    
            <?php endif ?>




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
                    <div class="hovicon effect-9 sub-a" style="background:linear-gradient(45deg, #172b4d, rgb(116 117 120));">
                        <div onclick="window.location.href='../nascimento/relatorio-nascimentos.php'"  style="cursor:pointer" class="icon">
                        
                        <i class="material-icons" style="font-size: 30px;margin-top: 35px;margin-left: 18px;position: absolute;color: #000;">child_friendly</i>
                        <i class="fa fa-bar-chart" style="font-size: 50px;color: #f4f5f7;" aria-hidden="true"></i>     
                           
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;margin-left: -8px;">Relatório Nascimento</div>
                </div>
                

                <!-- <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="hovicon effect-9 sub-a" style="background:linear-gradient(45deg, #172b4d, rgb(116 117 120));">
                        <div onclick="window.location.href='../obito/relatorio-obitos.php'" style="cursor:pointer" class="icon">
                        
                        <i class="material-icons" style="font-size: 30px;margin-top: 40px;margin-left: 18px;position: absolute;color: #000;">airline_seat_flat</i>
                        <i class="fa fa-bar-chart" style="font-size: 50px;color: #f4f5f7;" aria-hidden="true"></i>     
                        
                        </div>
                        <div class="content">
                        </div>
                    </div>
                   <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;margin-left: -8px;">Relatório Óbitos</div>
                </div> -->


             


            </div>

    


                <!--div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                <div class=" hovicon effect-9 sub-a" style="background:#fff !important;">
                       <div onclick="window.location.href='exportar-eproclamas.php'"
                            style="cursor:pointer" class="icon">
                            <img src="../images/eproclamas-index.png" width="75px" style="margin-top: -6px;margin-left: -14px;"></img>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -10px;margin-bottom: 10px;">e-proclamas</div>
                </div>
          </div-->

          <!--
            <hr>
             <div class="row">
                <legend>
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    MATERIALIZAÇÃO DE CERTIDÃO CRC

                </legend>
            </div>
                        <div class="row">


                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="hovicon effect-9 sub-a" style="background:linear-gradient(to top, #4583ed 0%, #330867 200%) !important;">
                        <div onclick="window.location.href='../index/materializacao-certidao-nascimento'"  style="cursor:pointer" class="icon">
                             <i class="material-icons" style="color:white!important">child_friendly</i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Certidão de Nascimento</div>
                </div>
                
                <div class="col-lg-2 col-md-3 col-sm-3 col-xs-12">
                    <div class="hovicon effect-9 sub-a" style="background:linear-gradient(to top, #4583ed 0%, #330867 200%) !important;">
                        <div onclick="window.location.href='../index/materializacao-certidao-casamento'" style="cursor:pointer" class="icon">
                             <i class="material-icons" style="color:white!important">favorite</i>
                        </div>
                        <div class="content">
                        </div>
                    </div>
                    <div class="text-center" style="margin-top: -20px;margin-bottom: 10px;">Certidão de Casamento</div>
                </div>




            </div> -->

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
                    <div class="hovicon effect-9 sub-a" style="background:linear-gradient(to top, #4583ed 0%, #330867 200%) !important;">
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
                    <div class="hovicon effect-9 sub-a" style="background:linear-gradient(to top, #4583ed 0%, #330867 200%) !important;">
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
                            window.location.href = "../crc/carga-nascimento.php";
                        }

                        if (this.value == 2) {
                            window.location.href = "../crc/carga-casamento.php";
                        }

                        if (this.value == 3) {
                            window.location.href = "../crc/carga-obito.php";
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


 <div class="modal fade" id="atualizacoes_modal" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content" style="background: #f5f5f5;border-radius: 10px!important;">
                  <button type="button" class="btn col-md-12  bg-red waves-effect" data-dismiss="modal" style="color:white">X</button>
                  <div class="modal-header">
                    <h4 class="modal-title" id="defaultModalLabel">CONFIRA AS ATUALIZAÇÕES DO MÓDULO! ASSISTA O VÍDEO: <span id="protocolotitulospan"></span></h4>
                </div>
                <legend></legend>

                <input type="hidden" id="prottitulo">

                <div id="tituloinfo">
                    <iframe width="700" height="500" style="margin-left:5%" src="https://www.youtube.com/embed/P-yUVg5OWgQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                </div>


                <br><br><br><br><br>

            </div>
        </div>
        </div>


<?php 

$arquivo_video = file_get_contents("../conf/video-check.json");
$decode = json_decode($arquivo_video, true);
$quantidade_exibicoes = $decode['qtd_exibicoes'];
if ($quantidade_exibicoes >0) :
    $new_qtd = $quantidade_exibicoes -1;
    $json = '{"qtd_exibicoes":"'.$new_qtd.'"}';
    $abrir_json = fopen("../conf/video-check.json","w");
    $escrever = fwrite($abrir_json, $json);
    $fechar = fclose($abrir_json);
 ?>
 <script type="text/javascript">
     $('#atualizacoes_modal').modal();
 </script>

 <?php endif ?>       