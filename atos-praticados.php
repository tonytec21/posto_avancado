<?php include('controller/db_functions.php');session_start();


if(!isset($_SESSION['id'])) {header('location:login.php');};

?>

<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<title>SISTEMA BOOKC</title>
<!-- Favicon-->
<link rel="icon" href="favicon.ico" type="image/x-icon">

<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
<link href="plugins/icon/icon.css" rel="stylesheet" type="text/css">

<!-- Bootstrap Core Css -->
<link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

<!-- Waves Effect Css -->
<link href="plugins/node-waves/waves.css" rel="stylesheet" />

<!-- Animation Css -->
<link href="plugins/animate-css/animate.css" rel="stylesheet" />

<!-- Morris Chart Css-->
<link href="plugins/morrisjs/morris.css" rel="stylesheet" />

<!-- Custom Css -->
<link href="css/style.css" rel="stylesheet">

<!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
<link href="css/themes/all-themes.css" rel="stylesheet" />

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
}
.ico-menu{
    color:white; margin-top: 5px; margin-left: 40px; cursor:pointer;
}
</style>
<script src="plugins/sweetalert/sweetalert.min.js"></script>
<link href="plugins/sweetalert/sweetalert.css" rel="stylesheet" />
<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>
<script src="js/pages/ui/tooltips-popovers.js"></script>
</head>
<nav class="navbar" style="background: #2e2e2e!important; height: 80px!important;">
        <div class="container-fluid">
                <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                 <a class="navbar-brand" href="#"><img src="images/logo_1.png" id="imgBookc"  style="max-width: 12%!important;margin-top: -15px;margin-left: 150px"></a>

                      </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    <!-- Call Search -->

                    <!-- Notifications -->


                    <!-- #END# Notifications -->
                    <!-- Tasks -->

                    </li>
                    <!-- #END# Tasks -->

                </ul>
    <div style="cursor:pointer;color:white;margin-left: 80%;margin-top: 1.5%" >
      <?php if(!empty($_SESSION['id'])){

           $nome = explode(" ",$_SESSION['nome']);

        echo "
        <div class='col-md-14' style='margin-left:-115px'>
        <p class='font-bold col-white'>Olá ".$nome[0].",
       Bem vindo <a style='color: white' href='sair.php' class='btn bg-red  waves-effect waves-float'> <i  class='material-icons' margin-top='1px'>power_settings_new</i>Sair</a>

        </div>";
        echo "";
      }else{
        $_SESSION['msg'] = "<div class='alert alert-info' role='alert' id='response'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
        &times;</span></button>
        Área restrita
        </div>";
        header("location: login.php");
      } ?>


    </div>
            </div>
        </div>


    </nav>
    <?php if (isset($_SESSION['logadoAdm']) && $_SESSION['logadoAdm'] =='S'): ?>
    <nav class="navbar bg-grey" style="margin-top: 5.7%;padding-left: 150px">
    <?php else: ?>
      <nav class="navbar bg-grey" style="margin-top: 5.7%;padding-left: 350px">
    <?php endif ?> 
        <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/index.php'?>">   
       <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="Voltar para area de trabalho" >reply</i>
       </a>

       <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="Atos praticados" onclick="window.open('atos-praticados.php')">assessment</i> 

       <!-- <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="Ordens de Serviço" onclick="window.open('ordem-servico.php')">assignment_turned_in</i>  


       <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="indisponibilidade" onclick="window.open('pages/tables/indisponibilidade/api/pesquisa-indisponibilidade.php')">line_weight</i> 

       <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="Menu de Livros" onclick="window.open('pages/tables/configuracoes-livro.php')">chrome_reader_mode</i> 

       <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="Cadastro de Folhas de Segurança" onclick="window.open('pages/tables/cadastrar-folha-seguranca.php')">description</i> 

       <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="Lembretes" onclick="window.open('pages/tables/incluir-lembrete.php')">alarm_on</i> 

       <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="Editor de Texto" onclick="window.open('texto-livre.php')">assignment</i> 

       <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="Configurações de Etiqueta" onclick="window.open('pages/tables/configuracao-etiqueta.php')">straighten</i>     
       
        <?php if (isset($_SESSION['logadoAdm']) && $_SESSION['logadoAdm'] =='S'): ?>
        <?php 

        $array_meses = array(' ','JAN','FEV', 'MAR', 'ABR', 'MAI', 'JUN', 'JUL', 'AGO', 'SET', 'OUT', 'NOV', 'DEZ');
        $indice = intval(date('m'));
        $data_active = $array_meses[$indice];
        $ini = date('Y-m').'-01';
        $fin = date('Y-m').'-31';
        ?>       


       <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="Livro Caixa" onclick="window.open('livro_caixa/livro-caixa.php?mes=<?=$data_active?>&ini=<?=$ini?>&fin=<?=$fin?>&ano_sel=<?=date('Y')?>')">account_balance</i> 

       <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="Funcionários" onclick="window.open('pages/tables/cadastro-funcionario.php')">person</i> 

       <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="Informações da serventia" onclick="window.open('pages/tables/cadastro-serventia.php?id=1')">store</i> 

       <i class="material-icons ico-menu " style="font-size: 40px" data-toggle="tooltip" data-placement="bottom" title="Painel do Administrador" onclick="window.open('graficos.php')">work</i> 
        <?php endif ?> -->

    </nav>
    <br><br>
    <section id="ras" class="content" style="margin-left: 30px!important" >
        <div class="container-fluid">
         
           
              <div class="card">
                <br>
           
                    
              <div class="row bg-grey" style="padding-left: 5%; max-width: 100%; margin-left: -0.1%;padding: 10px;margin-top: -2%; ">
                     <h5>MOSTRANDO ATOS DE:</h5>
                            <div class="col-md-4">
                           <label class="col-md-4">Data inicial:</label>
                           <div class="col-md-8">
                           <input type="date" id="data_inicial" class="form-control" name="data_inicial"> 
                           </div>
                           </div>

                           <div class="col-md-4">
                           <label class="col-md-4">Data Final:</label>
                           <div class="col-md-8">
                           <input type="date" id="data_final"  class="form-control" name="data_final"> 
                           
                           </div>
                           </div>
                   
        
                           <a class="btn waves-efect bg-green" onclick="carregaatos()"><i class="material-icons">search</i> Buscar</a> 
            
              </div>
              <br><br>
            <div class="row">
                <?php 

                $hoje = date('Y-m-d');
                $dias = date('Y-m-d', strtotime($hoje.'-15days'));
                 ?>


                    


                        <div id="fun" class="modal-body">
                    
                        </div>

              </div>

                </div>


              
            
        </div>
    </section>

























    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>
                      <script>
$(document).ready(function(){
  $("#imgBookc").click(function(){
    $("#leftsidebar").toggle();
  });
 

var datainicial = '<?=$hoje?>';
var datafinal = '<?=$dias?>';
  $('#data_inicial').val(datafinal);
   $('#data_final').val(datainicial);

  carregaatos();



});
</script>


    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>



    <!-- Slimscroll Plugin Js -->
    <script src="plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Jquery CountTo Plugin Js -->
    <script src="plugins/jquery-countto/jquery.countTo.js"></script>

    <!-- Morris Plugin Js -->
    <script src="plugins/raphael/raphael.min.js"></script>
    <script src="plugins/morrisjs/morris.js"></script>

    <!-- ChartJs -->
    <script src="plugins/chartjs/Chart.bundle.js"></script>

    <!-- Flot Charts Plugin Js -->
    <script src="plugins/flot-charts/jquery.flot.js"></script>
    <script src="plugins/flot-charts/jquery.flot.resize.js"></script>
    <script src="plugins/flot-charts/jquery.flot.pie.js"></script>
    <script src="plugins/flot-charts/jquery.flot.categories.js"></script>
    <script src="plugins/flot-charts/jquery.flot.time.js"></script>

    <!-- Sparkline Chart Plugin Js -->
    <script src="plugins/jquery-sparkline/jquery.sparkline.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/index.js"></script>

    <!-- Demo Js -->
    <script src="js/demo.js"></script>


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
<!--script>
document.onkeyup = function(e) {
  if (e.which == 78 && $('#iddosrecibos').val() == '') {
  // window.open("cartorio-notas.php");
     window.location = "pages/tables/cartorio-notas.php";

  }else if (e.which == 73 && $('#iddosrecibos').val() == '') {
    window.location = "pages/tables/cartorio-imoveis.php";
  } else if (e.which == 84 && $('#iddosrecibos').val() == '') {
    window.location = "pages/tables/cartorio-tdpj.php";
  } else if (e.which == 67 && $('#iddosrecibos').val() == '') {
    window.location = "pages/tables/cartorio-civil.php";
  } else if (e.which == 65 && $('#iddosrecibos').val() == '') {
    window.location = "pages/tables/pessoas.php";
  } else if (e.which == 80 && $('#iddosrecibos').val() == '') {
    window.location = "pages/tables/cartorio-protesto.php";
  }


  };
  </script-->

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


 <div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                  <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">Configurações</h4>
                        </div>
                        <div class="modal-body">
                    <ul class="nav nav-tabs tab-nav-right" role="tablist">
                <li role="presentation" class="active"><a href="#skins" data-toggle="tab">Informações do Cartório</a></li>
                <li role="presentation"><a href="#settings" data-toggle="tab">Funcionários</a></li>
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane fade in active in active" id="skins">

                 <?php $w = PESQUISA_ALL('cadastroserventia'); foreach ($w as $k):?>

                 <div class="card">
                     <div class="row clearfix">
                         <div class="col-sm-12 text-center">
                         <h3 class="text-center"><i class="material-icons">store</i><?=$k->strRazaoSocial?></h3>
                         <i class="material-icons">people</i> <?=$k->strTituloServentia?>
                        <br>
                        <br>

                        <a href="pages/tables/cadastro-serventia.php?id=1" class="btn bg-black waves-effect  waves-float">
                        <i class="material-icons">lock</i>
                        <span>Acessar Informações da Serventia</span><br>
                        </a>
                        <br><br>
                          <a href="pages/tables/configuracoes-livro.php" class="btn bg-black waves-effect  waves-float">
                        <i class="material-icons">lock bookmark</i>
                        <span>Livros</span><br>
                        </a>

                        <br><br>



              <a href="pages/tables/selo-fisico.php" class="btn bg-black waves-effect  waves-float">

              <i class="material-icons">lock collections_bookmark</i>

              <span>Selo</span><br>

              </a>

                         </div>




                     </div>

                 </div>

                <?php endforeach ?>
                </div>
                <div role="tabpanel" class="tab-pane fade" id="settings">
                    <div class="demo-settings">
                      <div class="row clearfix">
                         <div class="col-sm-12 text-center">

                        <br>
                        <br>

                          <a href="pages/tables/cadastro-funcionario.php" class="btn bg-black  waves-effect  waves-float">
                    <i class="material-icons">lock</i>
                      <span>Acessar Informações de Funcionários</span>
                    </a>

                    </div>
                </div>
            </div>

                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
  $('#sobresist').click(function(){
$('#sobresistema').modal();
 });

</script>
<div class="modal fade" id="sobresistema" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">SOBRE O SISTEMA:</h4>
                        </div>
                        <div  class="modal-body">

  <h2>SISTEMA BOOKC - GESTÃO DE SERVENTIAS EXTRAJUDICIAIS</h2>
  <p class="text-center">VERSÃO 1.0 - ZM DEVELOPERS <?=date('Y')?> &copy TODOS OS DIREITOS RESERVADOS</p>
  <div class="panel-group">
    <div class="panel  panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse1">Citações, ferramentas e agradecimentos</a>
        </h4>
      </div>
      <div id="collapse1" class="panel-collapse collapse">
        <div class="panel-body">-...</div>
        <div class="panel-footer">bookc - <?=date('Y')?> &copy todos os direitos reservados</div>
      </div>
    </div>
  </div>

    <div class="panel-group">
    <div class="panel  panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse2">Manuais de uso</a>
        </h4>
      </div>
      <div id="collapse2" class="panel-collapse collapse">
        <div class="panel-body">

<a class="badge semback" target="_blank" href="pages/tables/manuais/admnistrativo.pdf"> <i class="material-icons">book</i> - MANUAL MÓDULO ADMNISTRATIVO</a> <hr>
<a class="badge semback" target="_blank" href="pages/tables/manuais/PESSOAS_PARTE1.webm"> <i class="material-icons">book</i> - MANUAL MÓDULO CADASTRO DE PESSOAS PARTE 1</a> <hr>
<a class="badge semback" target="_blank" href="pages/tables/manuais/PESSOAS_PARTE2.webm"> <i class="material-icons">book</i> - MANUAL MÓDULO CADASTRO DE PESSOAS PARTE 2</a> <hr>
<!--a class="badge semback" target="_blank" href="pages/tables/manuais/"> <i class="material-icons">book</i> - MANUAL MÓDULO NOTAS</a> <hr>
<a class="badge semback" target="_blank" href="pages/tables/manuais/"> <i class="material-icons">book</i> - MANUAL MÓDULO REGISTRO CIVIL</a> <hr>
<a class="badge semback" target="_blank" href="pages/tables/manuais/"> <i class="material-icons">book</i> - MANUAL MÓDULO TITULOS E DOC. PESSOA JURÍDICA</a> <hr-->
              <a data-toggle="collapse" href="#collapse21" class="semback"><i class="material-icons">keyboard_arrow_down</i> - MANUAL MÓDULO REGISTRO CIVIL</a>

              <div id="collapse21" class="panel-collapse collapse">
                <div class="panel-body">
                <a class="badge semback" target="_blank" href="pages/tables/manuais/REGISTRO_NASCIMENTO_NOVO.webm"> <i class="material-icons">play_circle_filled</i> 1. REGISTRO DE NASCIMENTO</a> <hr style="margin-bottom: -20px; ">
                <a class="badge semback" target="_blank" href="pages/tables/manuais/ACERVO_FISICO_NASCIMENTO.webm"> <i class="material-icons">play_circle_filled</i> 2. CERTIDÕES DE NASCIMENTO ACERVO JÁ EXISTENTE</a> <hr style="margin-bottom: -20px; ">
                <a class="badge semback" target="_blank" href="pages/tables/manuais/REGISTRO_CASAMENTO_NOVO.webm"> <i class="material-icons">play_circle_filled</i> 3. REGISTRO DE CASAMENTO</a> <hr style="margin-bottom: -20px; ">
                <a class="badge semback" target="_blank" href="pages/tables/manuais/ACERVO_FISICO_CASAMENTO.webm"> <i class="material-icons">play_circle_filled</i> 4. CERTIDÕES DE CASAMENTO ACERVO JÁ EXISTENTE</a> <hr style="margin-bottom: -20px; ">
                <a class="badge semback" target="_blank" href="pages/tables/manuais/REGISTRO_OBITO_NOVO.webm"> <i class="material-icons">play_circle_filled</i> 5. REGISTRO DE ÓBITO</a> <hr style="margin-bottom: -20px; ">
                <a class="badge semback" target="_blank" href="pages/tables/manuais/ACERVO_FISICO_OBITO.webm"> <i class="material-icons">play_circle_filled</i> 6. CERTIDÕES DE ÓBITO ACERVO JÁ EXISTENTE</a> <hr style="margin-bottom: -20px; ">
                <a class="badge semback" target="_blank" href="pages/tables/manuais/AVERBACOES_ANOTACOES.webm"> <i class="material-icons">play_circle_filled</i> 7. INCLUINDO AVERBAÇÕES/ANOTAÇÕES NOS REGISTROS</a> <hr style="margin-bottom: -20px; ">
                <a class="badge semback" target="_blank" href="pages/tables/manuais/CRC_IBGE.webm"> <i class="material-icons">play_circle_filled</i> 8.EXPORTANDO ARQUIVOS CRC E IBGE</a> <hr style="margin-bottom: -20px; ">
                <a class="badge semback" target="_blank" href="pages/tables/manuais/ETIQUETAS_AVERBACOES.webm"> <i class="material-icons">play_circle_filled</i> 9. IMPRIMINDO ETIQUETAS DE AVERBACÕES NOVAS</a> <hr style="margin-bottom: -20px; ">
                <a class="badge semback" target="_blank" href="pages/tables/manuais/COMPROVACAO.webm"> <i class="material-icons">play_circle_filled</i> 10. PESQUISA REGISTRO COMPROVAÇÃO</a> <hr style="margin-bottom: -20px; ">


                </div>
                <div class="panel-footer">bookc - <?=date('Y')?> &copy todos os direitos reservados</div>
                </div>
                 <br><br>
                <a data-toggle="collapse" href="#collapse24" class="semback"><i class="material-icons">keyboard_arrow_down</i> - MANUAL MÓDULO PROTESTO</a>

              <div id="collapse24" class="panel-collapse collapse">
                <div class="panel-body">
                <a class="badge semback" target="_blank" href="pages/tables/manuais/PROTESTO1.webm"> <i class="material-icons">play_circle_filled</i> 1. PROTESTO PARTE 1</a> <hr style="margin-bottom: -20px; ">
                <a class="badge semback" target="_blank" href="pages/tables/manuais/PROTESTO2.webm"> <i class="material-icons">play_circle_filled</i> 2. PROTESTO PARTE 2</a> <hr style="margin-bottom: -20px; ">



                </div>
                <div class="panel-footer">bookc - <?=date('Y')?> &copy todos os direitos reservados</div>
                </div>


        </div>
        <div class="panel-footer">bookc - <?=date('Y')?> &copy todos os direitos reservados</div>
      </div>
    </div>
  </div>


      <div class="panel-group">
    <div class="panel  panel-default">
      <div class="panel-heading">
        <h4 class="panel-title">
          <a data-toggle="collapse" href="#collapse3">Palavra dos desenvolvedores</a>
        </h4>
      </div>
      <div id="collapse3" class="panel-collapse collapse">
        <div class="panel-body">O SISTEMA BOOKC DE GESTÃO DE SERVENTIAS EXTRAJUDICIAIS FOI PENSADO PARA FACILITAR A VIDA DE ESCREVENTES E TITULARES DE CARTÓRIOS...</div>
        <div class="panel-footer">bookc - <?=date('Y')?> &copy todos os direitos reservados</div>
      </div>
    </div>
  </div>

                </div>

            </div>
        </div>
    </div>

</body>
<?php
if ($_SESSION['permissao']!=='S') {
  $_SESSION['assinatura']="";
}


$urls = PESQUISA_ALL_ID('cadastroserventia',1);
foreach ($urls as $urls) {
$_SESSION['urltoken'] = $urls->url_token;
$_SESSION['urlselodigital'] = $urls->url_selo;
$_SESSION['username_token'] = $urls->username_token;
$_SESSION['password_token'] = $urls->password_token;
$_SESSION['client_id_token'] = $urls->client_id_token;
$_SESSION['grant_type_token'] = $urls->grant_type_token;

#https://ma.portalselo.com.br:9443/auth - token
#https://ma.portalselo.com.br:9443/selo/ - selo
}





 ?>

<!-- Jquery DataTable Plugin Js -->
    <script src="plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script type="text/javascript">
  $('#atividadeFuncionarios').click(function(){
    $('#funcionarios').modal();
    showCustomer();
  });
</script>


<div class="modal fade" id="funcionarios" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                  <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">ATIVIDADES - FUNCIONÁRIOS:</h4>
                        </div>
                        <div id="fun" class="modal-body">
                     <script>


function showCustomer() {
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      $('#fun').html (this.responseText);
    return;
    }
    else{
      $('#fun').html ("<h4 class='text-center'>Carregando... <br> <img src='../../images/loading_modal.gif'> </h4>");
       return;
    }

  };
  xhttp.open("POST", "busca-funcionarios-graficos-index.php", true);
  xhttp.send();
}
</script>
                </div>

            </div>
        </div>
    </div>
              <div class="modal fade  " id="pessoarecibo" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content bg-grey">
                     <div  class="alert bg-grey alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h2 class="text-center">
                              <i class="material-icons">book</i> RECIBO
                             </h2>
                             <form method="POST" action="imprimir-recibo.php">
                             <input style="color:black" type="hidden" id="idrecibo" name="idrecibo"  >
                             <div class="row">
                             <div class="col-sm-12">
                               <label class="control-label col-md-4">NOME CLIENTE:</label>
                               <div class="col-md-8">
                                 <input type="text" name="nomecliente" id="nomecliente" class="form-control">
                               </div>
                             </div>
                             <br><br>

                             <div class="col-sm-12">
                               <label class="control-label col-md-4">VALOR RECEBIDO DO CLIENTE:</label>
                               <div class="col-md-8">
                                 <input type="text" name="valorrecebido" id="valorrecebido" class="form-control" onkeyup="dinheiro(this)">
                               </div>
                             </div>
                             <br><br>


                             <div class="col-sm-12">
                               <label class="control-label col-md-4">FUNCIONÁRIO:</label>
                               <div class="col-md-8">
                                 <select class="form-control" name="funcionariorecibo" id="funcionariorecibo">
                                   <option value="">SELECIONE</option>
                                   <?php $w = PESQUISA_ALL('funcionario'); foreach($w as $w): ?>
                                   <option value="<?=$w->strNomeCompleto?>"><?=$w->strNomeCompleto?></option>
                                 <?php endforeach ?>
                                 <?php if (isset($_SESSION['logadoAdm']) && $_SESSION['logadoAdm'] == 'S'): ?>
                                   <option value="<?=$_SESSION['nome']?>"><?=$_SESSION['nome']?></option>
                                 <?php endif ?>
                                 </select>
                               </div>
                             </div>
                             <input type="hidden" name="iddosrecibos" id="iddosrecibos" >
                             <div class="col-sm-9"></div>

                             <button style="margin-top: 20px;" type="submit" class="btn waves-effect bg-black"><i class="material-icons">print</i>IMPRIMIR</button>
                             </div>
                             </form>
                            </div>
                    </div>
                </div>
            </div>
<?php #limpa_pasta('pages/tables/PDFS/qrimagens/');?>



 <div class="modal fade  " id="funcordemservico" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-md" role="document">
                    <div class="modal-content bg-grey">
                     <div  class="alert bg-grey alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h2 class="text-center">
                              <i class="material-icons">book</i> GERAR ORDEM DE SERVIÇO
                             </h2>
                             <form method="GET" action="imprimir-ordem-servico.php">
                             <input style="color:black" type="hidden" id="idrecibo" name="idrecibo"  >
                             <div class="row">
                             <div class="col-sm-12">
                               <label class="control-label col-md-4">NOME CLIENTE:</label>
                               <div class="col-md-8">
                                 <input type="text" name="nomecliente" id="nomecliente" class="form-control">
                               </div>
                             </div>
                             <br><br>


                             <div class="col-sm-12">
                               <label class="control-label col-md-4">FUNCIONÁRIO:</label>
                               <div class="col-md-8">
                                 <select class="form-control" name="funcionariorecibo" id="funcionariorecibo">
                                   <option value="">SELECIONE</option>
                                   <?php $w = PESQUISA_ALL('funcionario'); foreach($w as $w): ?>
                                   <option value="<?=$w->strNomeCompleto?>"><?=$w->strNomeCompleto?></option>
                                 <?php endforeach ?>
                                 <?php if (isset($_SESSION['logadoAdm']) && $_SESSION['logadoAdm'] == 'S'): ?>
                                   <option value="<?=$_SESSION['nome']?>"><?=$_SESSION['nome']?></option>
                                 <?php endif ?>
                                 </select>
                               </div>
                             </div>



                             <br><br><br><br>
                             <div class="col-sm-12">
                               <label class="control-label col-md-4">ATOS:</label>
                               <div class="col-md-8">
                                 <input style="font-size: 10px" type="text" id="atospraticados" name="atospraticados" class="form-control" required="" placeholder="SEPARE CODIGOS COM UM ESPAÇO SIMPLES Ex: 14.5.1 14.2" >
                               </div>
                             </div>
                             <br><br>
                              <div class="col-sm-12">
                               <textarea class="form-control" name="descreveato" placeholder="ADICIONAR MAIS DESCRIÇÕES" style="text-transform: none!important"></textarea>
                             </div>
                             <br><br>

                             <div class="col-sm-5"></div>
                              <a href="pesquisa-os.php" style="margin-top: 20px;" class="btn waves-effect bg-orange "><i class="material-icons">book</i>VER ORDENS DE SERVIÇO</a>
                             <button style="margin-top: 20px;" type="submit" class="btn waves-effect bg-black"><i class="material-icons">print</i>IMPRIMIR</button>
                             </div>

                            

                             </form>
                            </div>
                    </div>
                </div>
            </div>


<script src='js/bootstrap-notify.min.js'></script>
    <script>
                        function carregaatos() {
                        var xhttp;
                        var datainicial = $('#data_inicial').val();
                        var datafinal = $('#data_final').val();
                        xhttp = new XMLHttpRequest();
                        xhttp.onreadystatechange = function() {
                        if (this.readyState == 4 && this.status == 200) {
                        $('#fun').html (this.responseText);
                        return;
                        }
                        else{
                        $('#fun').html ("<h4 class='text-center'>Carregando... <br> <img src='images/loading_modal.gif'> </h4>");
                        return;
                        }

                        };
                        xhttp.open("POST", "busca-funcionarios-graficos-index.php?datainicial="+datainicial+"&datafinal="+datafinal, true);
                        xhttp.send();
                        }
                        //setInterval("carregaatos()", 30000);
                        </script>
                        

</html>
<script type="text/javascript">
  function dinheiro(i) {
var v = i.value.replace(/\D/g,'');
v = (v/100).toFixed(2) + '';
v = v.replace(".", ".");
v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
i.value = v;
}
</script>