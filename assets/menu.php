
 <?php


// echo $URL_ATUAL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// echo"<pre>";
// var_dump($_SERVER['HTTP_HOST']);

// var_dump($_SERVER);
// echo"</pre>";

// exit;
?>
<link href="../plugins/icon/icon.css" rel="stylesheet" type="text/css">

<!-- Waves Effect Css -->
<link href="../plugins/node-waves/waves.css" rel="stylesheet" />

 <!-- Navbar -->
 <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg  navbar-light headroom  btn-secondary " style="background: linear-gradient(45deg, #121212, #262626, #3d3d3d, #565656);z-index:100 !important">
    <div class="container">
      <a class="navbar-brand mr-lg-5" href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/index.php'?>">
        <img src="../assets/img/brand/logo_1.png" style="height:50px !important" >
      </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="navbar-collapse collapse" id="navbar_global">
        <div class="navbar-collapse-header">
          <div class="row">
            <div class="col-6 collapse-brand">
              <a href="./index.html">
                <img src="../assets/img/brand/whites.png"   width="200px" style="height:50px !important" >
              </a>
            </div>
            <div class="col-6 collapse-close">
              <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbar_global" aria-controls="navbar_global" aria-expanded="false" aria-label="Toggle navigation">
                <span></span>
                <span></span>
              </button>
            </div>
          </div>
        </div>
        <ul class="navbar-nav navbar-nav-hover align-items-lg-center">
          <li class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
              <i class="ni ni-ui-04 d-lg-none"></i>
              <span class="nav-link-inner--text">FERRAMENTAS</span>
            </a>
            <div class="dropdown-menu dropdown-menu-xl">
              <div class="dropdown-menu-inner">

                <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/atos-praticados.php'?>" class="media d-flex align-items-center">
                  <div class="icon icon-shape bg-gradient-darker rounded-circle text-white">
                  <i class="fa fa-bar-chart" aria-hidden="true"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h6 class="heading text-darker mb-md-1">Atos Praticados</h6>
                    <p class="description d-none d-md-inline-block mb-0">Relatório de Selos Solicitados</p>
                  </div>
                </a>


              </div>
            </div>
          </li>




        </ul>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
         
          <li class="nav-item d-none d-lg-block ml-lg-4">
        
      <?php if(!empty($_SESSION['id'])){

           $nome = explode(" ",$_SESSION['nome']);

        echo "
        <div class='col-md-14' style='margin-left:-115px'>
        <div class='font-bold' style='color: #fff'>Olá ".$nome[0].",
       Bem vindo <a style='color: white' href='../sair.php' class='btn bg-red  waves-effect waves-float'><i  class='material-icons' margin-top='1px'>power_settings_new</i></a>

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

          

          </li>
          
          
      
 <!--<label class="switch">
      <input onclick="darkLight()" id="checkBox_darkmode" type="checkbox">
        <div class="slider round">
          <span class="on">🌓</span>
          <span class="off">🌓 </span>
        </div>
</label> -->
<!-- add id main_dark_mode  para ativar dark mode -->



          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- End Navbar -->