
 <?php


// echo $URL_ATUAL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

// echo"<pre>";
// var_dump($_SERVER['HTTP_HOST']);

// var_dump($_SERVER);
// echo"</pre>";

// exit;
?>

 <!-- Navbar -->
 <nav id="navbar-main" class="navbar navbar-main navbar-expand-lg  navbar-light headroom  btn-secondary " style="background: #8c001a;z-index:100 !important">
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
              <span class="nav-link-inner--text">MÓDULOS</span>
            </a>
            <div class="dropdown-menu dropdown-menu-xl">
              <div class="dropdown-menu-inner">

                <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/index/cartorio-civil.php'?>" class="media d-flex align-items-center">
                  <div class="icon icon-shape bg-gradient-info rounded-circle text-white">
                  <i class="fa fa-user" aria-hidden="true"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h6 class="heading text-info mb-md-1">Registro Cívil</h6>
                    <p class="description d-none d-md-inline-block mb-0">Registro Cívil de Pessoas Naturais</p>
                  </div>
                </a>

                <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/pessoas/index.php'?>" class="media d-flex align-items-center">
                  <div class="icon icon-shape bg-gradient-red rounded-circle text-white">
                  <i class="fa fa-users" aria-hidden="true"></i>
                  </div>
                  <div class="media-body ml-3">
                    <h6 class="heading text-red mb-md-1">Cadastro de Pessoas</h6>
                    <p class="description d-none d-md-inline-block mb-0">Cadastro e Pesquisa</p>
                  </div>
                </a>


              </div>
            </div>
          </li>
         
          <li class="nav-item dropdown">
            <a href="#" class="nav-link" data-toggle="dropdown" href="#" role="button">
              <i class="ni ni-collection d-lg-none"></i>
              <span class="nav-link-inner--text">PESSOAS</span>
            </a>
            <div class="dropdown-menu">
              <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/pessoas/index.php'?>" class="dropdown-item" >Pagina Inicial</a>

            </div>
          </li>
        </ul>
        <ul class="navbar-nav align-items-lg-center ml-lg-auto">
         
          <li class="nav-item d-none d-lg-block ml-lg-4">
            <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/pessoas/index/cadastro_pessoas_new'?>" target="_blank" class="btn btn-neutral btn-icon">
              <span class="btn-inner--icon">
                <i class="fa fa-user"></i>
              </span>
              <span class="nav-link-inner--text">CADASTRAR PESSOA</span>
            </a>
            <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/pessoas/index/pesquisaPessoas'?>" target="_blank" class="btn btn-neutral btn-icon">
              <span class="btn-inner--icon">
              <i class="fa fa-search" aria-hidden="true"></i>
              </span>
              <span class="nav-link-inner--text">BUSCAR PESSOA</span>
            </a>

          

          </li>
          <li >
          
      
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