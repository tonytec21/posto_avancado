 <?php include_once('../../controller/db_functions.php');
session_start();

if (empty($_SESSION['id']) && empty($_SESSION['nome'])) {
 $_SESSION['msg'] = "<div class='alert alert-info' role='alert' id='response'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
        &times;</span></button>
        Área restrita
        </div>";
        header("location: ../../login.php");
}
 $pdo = conectar();

 ?>


<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Registro de Óbito Segunda via </title>

    <!-- Favicon-->
    <link rel="icon" href="../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts ->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <!- Bootstrap Core Css -->
    <link href="../../plugins/icon/font.css" rel="stylesheet">

    <link href="../../plugins/icon/icon.css" rel="stylesheet">
    <!-- Bootstrap Core Css -->
    <link href="../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="../../plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="../../plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="../../plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="../../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../css/themes/all-themes.css" rel="stylesheet" />
    <!-- JQuery DataTable Css -->
    <link href="../../plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

    <!-- essencial para ajax -->

     <script src="../../plugins/ajax/ajax.min.js"></script>


</head>
<style>
body{border:0}
.dataTables_scroll{position:relative}
.dataTables_scrollHead{margin-bottom:40px;}
.dataTables_scrollFoot{position:absolute; top:38px}
</style>
<body class="theme-red" ng-app="">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Carregando...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
 <nav class="navbar" style="background: rgba(0,0,0,.9)">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#"><img src="../../images/logo_1.png" id="imgBookc"  style="max-width: 9%"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">

                <ul class="nav navbar-nav navbar-right" style="margin-top: 10px">
                    <!-- Call Search -->
             <div class="btn-group col-md-3" style="background: none;border: none;box-shadow: none;">
                                    <button type="button" class="btn  bg-red dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                      <i class="material-icons">favorite</i> Casamento <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a href="bd_INSERTS/insert-casamento.php" class=" waves-effect waves-block"> + Novo</a></li>
                                        <li><a href="pesquisa-casamento.php" class=" waves-effect waves-block">Pesquisa</a></li>


                                    </ul>
                                </div>
                                     <div class="btn-group col-md-3" style="background: none;border: none;box-shadow: none;">
                                    <button type="button" class="btn bg-teal dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                      <i class="material-icons">child_friendly</i> Nascimento <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                   <li><a href="bd_INSERTS/insert-nascimento.php" class=" waves-effect waves-block"> + Novo</a></li>
                                        <li><a href="pesquisa-nascimento.php" class=" waves-effect waves-block">Pesquisa</a></li>
                                    </ul>
                                </div>
                                     <div class="btn-group col-md-3" style="background: none;border: none;box-shadow: none;margin-left: 5px">
                                    <button type="button" class="btn bg-grey dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                      <i class="material-icons">airline_seat_flat</i> Óbito <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                         <li><a href="bd_INSERTS/insert-obito.php" class=" waves-effect waves-block"> + Novo</a></li>
                                        <li><a href="pesquisa-obito.php" class=" waves-effect waves-block">Pesquisa</a></li>
                                    </ul>
                                </div>

<li class="col-md-2 hide-on-med-and-down" ><a style="margin-top:-7px" class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons large" style="font-size: 30px">settings_overscan</i></a></li>

                </ul>



            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
       <?php include('aside-lateral-civil-include.php'); ?>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

        <!-- #END# Right Sidebar -->
    </section>

 <section class="content" style="margin-left: 30px"  >
        <div class="container-fluid">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                           <h2>Nascimento - segunda via </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <div class="body">
              

                            <!-- Tab panes -->
                            <div class="tab-content">
                                <div role="tabpanel" class="tab-pane fade in active" id="pessoaJ">



                            <form class="form-horizontal" method="POST" action="bd_INSERTS/insert-autenticacao.php">

<!--*********************************                  Inicio do Form - Autenticação          *********************************************************** -->





      <fieldset><div class="demo-masked-input">
      <div class="row clearfix">

        <legend  style="width: 100%"><i class="material-icons">home</i>Dados do Óbito</legend>

      <!-- Text input-->






<div class="col-sm-4">
<label class="control-form col-md-4">Livro:</label>
<div class="col-md-8">
<input type="text" name="strLivro" id="strLivro" placeholder="" required="" class="form-control">	
</div>	
</div>	

<div class="col-sm-4">
<label class="control-form col-md-4">Folha:</label>
<div class="col-md-8">
<input type="text" name="strFolha" id="strFolha" placeholder="" required="" class="form-control">	
</div>	
</div>

<div class="col-sm-4">
<label class="control-form col-md-4">Termo:</label>
<div class="col-md-8">
<input type="text" name="strTermo" id="strTermo" placeholder="" required="" class="form-control">	
</div>	
</div>


<div class="col-sm-4">
<label class="control-form col-md-4">Data do Registro:</label>
<div class="col-md-8">
<input type="date" name="dataRegistro" id="dataRegistro" placeholder="" required="" class="form-control">	
</div>	
</div>


<div class="col-sm-6">
<label class="control-form col-md-3">Matricula:</label>
<div class="col-md-8">
<input style="margin-left: -6%" type="text" name="strMatricula" id="strMatricula" placeholder="" required="" class="form-control">	
</div>	
</div>

<a style="margin-left: -6%; opacity: .8" onclick="matricula()" class="btn waves-effect bg-light-green"><i class="material-icons">refresh</i> Gerar Matrícula </a>

        <script type="text/javascript">
        function matricula(){
        var livro = $('#strLivro').val();
        var folha = $('#strFolha').val();
        var termo = $('#strTermo').val();
        var civil = 55;
        var acervo = 01;
         $.post('gerador-matricula-externo', {'livro':livro, 'folha':folha, 'termo':termo, 'civil':civil, 'acervo':acervo}, function(data) {
         $("#strMatricula").val(data);
         });
        }
        </script>
</div>
<div class="col-sm-6" >

<label class="col-md-4 control-form" style="margin-left: -14px;" for="strEnderecoObito">Endereço:</label>
<div class="col-md-8" >

<input type="text" id="strEnderecoObito" name="strEnderecoObito" class="form-control input-md" placeholder="Rua, Nº" />
</div>
</div>


<div class="col-sm-6" >

<label class="col-md-4 control-form" for="setTipoLocalObito">Tipo de local da morte:</label>
<div class="col-md-8" >

<select id="setTipoLocalObito" name="setTipoLocalObito" class="form-control ">
    <option>IGNORADO</option>
     <option>AMBULANCIA</option>
      <option>DOMICILIO</option>
       <option>HOSPITAL</option>
        <option>OUTRO</option>
         <option>OUTRO_SERVICO_SAUDE</option>
          <option>POSTO_SAUDE</option>
          <option>VIA_PUBLICA</option>
</select>
</div>
</div>


              <!-- Cidade / Pesquisar no banco de dados-->
  <div class="col-sm-6" >
  <label class="col-md-4 control-form" style="margin-left: -15px" for="strCidadeObito">Cidade*:</label>
  <div class="col-md-8">
  <input id="strCidadeObito" name="strCidadeObito" type="text" class="form-control input-md" required="">
  </div>
  </div>
              <!-- Cidade / Pesquisar no banco de dados-->

                <div class="col-sm-6" >

                    <label class="col-md-4 control-form">Data:</label>
                <div class="col-md-8">
                    <input id="dataObito" name="dataObito" type="date" class="form-control input-md" required="">

             </div>
            </div>
                 <div class="col-sm-6" >

                        <label class="col-md-4 control-form" style="margin-left: -15px">Hora:</label>
                        <div class="col-md-8">
                        <input id="horaObito" name="horaObito" type="time" class="form-control input-md" required="">
                        </div>


            </div>


  <div class="row clearfix">

      <div class="col-sm-6" >


                <label class="col-md-4 control-form" for="strCausaMorte">Causa  da  morte*:</label>

                    <div class="col-md-8">
                    <input style="margin-left: -2%; max-width: 96%" type="text" id="strCausaMorte" name="strCausaMorte" class="form-control input-md" placeholder="" />
                    </div>
                </div>


          <div class="col-sm-6" >


                <label class="col-md-4 control-form" for="strTipoMorte">Tipo*:</label>

                    <div class="col-md-8">
                    <select style="margin-left: -2%" id="strTipoMorte" name="strTipoMorte" class="form-control">
                      <option value="NAT">Natural</option>
                       <option value="VIO">Violenta</option>
                    </select>


            </div>

      </div>

      <div class="col-sm-6" >

                <label class="col-md-4 control-form" for="strLocalSepultamento">Local Sepultameto*:</label>
                <div class="col-md-8">
                <input style="margin-left: -2%" id="strLocalSepultamento" name="strLocalSepultamento" type="text" class="form-control input-md" required="">

                </div>

      </div>
<div class="col-sm-6" >


                <label class="col-md-4 control-form" for="strMedico">Medico*:</label>

                    <div class="col-md-8">
                    <input style="margin-left: -2%" type="text" id="strMedico" name="strMedico" class="form-control input-md" placeholder="Nome do Médico" />
                    </div>
                </div>



           <div class="col-sm-6" >

                <label class="col-md-4 control-form" for="strCrmMedico">CRM*:</label>
                <div class="col-md-8">
                <input style="margin-left: -2%" id="strCrmMedico" name="strCrmMedico" type="text" class="form-control input-md" required="">

                </div>

      </div>

          <div class="col-sm-6">

        <label class="col-md-4 control-form">N D.O:*</label>
        <div class="form-line">
      <div class="col-md-8">
          <input type="text" id="strNDO" name="strNDO" class="form-control ndo " placeholder=" " >
        </div>

      </div>
    </div>
</div>
<legend><i class="material-icons">book</i>Dados do Morto</legend>



<div class="col-sm-12" style="min-width: 105%">
<br>  
<label class="col-md-2 control-form" style="margin-left: -2.5%" for="strNome">Nome Completo:</label>
<div class="col-md-5" >
<input style="margin-left: -10.5%; min-width: 115%"  type="text" id="strNome" name="strNome" class="form-control naopreencher input-md" placeholder="CASO NÃO HAJA NOME OBSERVE OS BOTÕES AO LADO" required="" />
</div>

</div>

                                <!-- Text input-->

<div class="col-sm-6 mais podesumir">
<label  class="col-md-3 control-form">Pai*:</label>
<div class="col-md-8">
<input  type="text" id="strPai" name="strPai" class="cpf form-control naopreencher " placeholder=""  >
</div>
</div>


<div class="col-sm-6 mais podesumir">
<label  class="col-md-3 control-form">Mãe*:</label>
<div class="col-md-8">
<input  type="text" id="strMae" name="strMae" class="cpf form-control naopreencher " placeholder=""  >
</div>
</div>


<div class="row clearfix">

<!-- Text input-->
<div class="col-sm-6 mais podesumir">

<label class="col-md-5 control-form" style="margin-left: -5px;">RG / Orgão Emissor *</label>
<div class="col-md-5">
<input style="margin-left: -16%;min-width: 130%" type="text" id="strRG" name="strRG" class="rg form-control naopreencher " placeholder="000000000000-0/OEM./UF" >
</div>
<div class="col-md-2">
<input style="margin-left: -10%; min-width: 200%" type="text" id="strOrgaoEm" name="strOrgaoEm" class=" form-control naopreencher " placeholder="SSP/MA"  >
</div>
</div>


<div class="col-sm-6 mais podesumir">
<label style="margin-left: 5%;" class="col-md-3 control-form">CPF*:</label>
<div class="col-md-8">
<input style="margin-left: -20%" type="text" id="strCPF" name="strCPF" class="cpf form-control naopreencher " placeholder="000.000.000-00"  >
</div>
</div>

<div class="col-sm-6 mais">
<label style="margin-left: -1%" class="col-md-5 control-form" for="dataNascimento">Data de Nascimento</label>
<div class="col-md-6">
<input type="date" id="dataNascimento" name="dataNascimento" class="form-control naopreencher " placeholder="" >
</div>
</div>
                                <!-- Text input-->


<div class="col-sm-6  mais" >

<label style="margin-left: 5%" class="col-md-3 control-form" style="margin-left: -5px;">Sexo*:</label>
<div class="col-md-6">
<!--select  id="setSexo" name="setSexo" class="form-control naopreencher">

<option>Selecione</option>
<option value="M">Masculino</option>
<option value="F">Feminino</option>

</select-->
</div>
<div class="col-md-8  mais">
<input style="margin-left: -20%" type="text" id="valorsexo" name="valorsexo" value="" class="form-control " =""   placeholder="M , F ou I">
</div>
</div>
<!-- Text input-->
<div class="col-sm-6 mais podesumir"  >
<label style="margin-left: -1%" class="col-md-4 control-form">Estado Civil*:</label>
<div class="col-md-8">
<!--select  id="setEstadoCivil" name="setEstadoCivil"  class="form-control naopreencher">
<option value="" selected="selected"> Selecione </option>
<option value="SO">Solteiro(a)</option>
<option value="CA">Casado(a)</option>
<option value="DI">Divorciado(a)</option>
<option value="VI">Viúvo(a)</option>
<option value="SE">Separado(a)</option>

</select-->
</div>
<div class="col-md-8">
      <input type="text" id="valorEC" name="valorEC" value="" class="form-control naopreencher" =""  >
</div>
</div>

</div>


<div class="row clearfix" id="conjuge">

<hr class="mais podesumir">
<label class="bg-grey mais" style="width: 100%" ><i class="material-icons">person</i>Conjuge</label>
<br><br>

<div class="col-sm-10 mais podesumir">
<label style="margin-left: -13%" class="col-md-4 control-label" style="margin-left: 30px" for="strNomeConjugue">Nome do Conjugue:</label>
<div class="col-md-8" >  <div class="form-line">
<input type="text" id="strNomeConjugue" name="strNomeConjugue" class="form-control naopreencher input-md" placeholder="individuos casados, ou viuvos" />
</div>
</div>

</div>

<div class="col-sm-10 mais podesumir">

<label style="margin-left: -9.8%" class="col-md-4 control-label" for="strCartorioCasamento">Cartório do Casamento:</label>
<div class="col-md-8" >  <div class="form-line">
<input style="margin-left: -5%"type="text" id="strCartorioCasamento" name="strCartorioCasamento" class="form-control naopreencher input-md" placeholder="individuos casados, ou viuvos" />
</div>
</div>

</div>

</div>



          <!-- Text input-->
          <!-- Text input-->
<div class="row clearfix">
  <hr>
<div class="col-sm-6" >

<label class="col-md-4 control-form">Cor*:</label>
<div class="col-md-8">
<select  id="setCor" name="setCor"  class="form-control">
<option value="" selected="selected"> Selecione </option>
<option value="BR">Branca</option>
<option value="PR">Preta</option>
<option value="PA">Parda</option>
<option value="AM">Amarela</option>
<option value="IN">Indígena</option>

</select>
</div>
</div>



          <!-- Text input-->
<div class="col-sm-6 podesumir" >
<label class="col-md-4 control-form">Gestante*:</label>
<div class="col-md-8">
<select  id="setGestante" name="setGestante" class="form-control">

<option value="" selected="selected"> Selecione </option>
<option value="S">Sim</option>
<option value="N">Não</option>
</select>
</div>
</div>

<div class="col-sm-6">
<label class="col-md-4 control-form">Gêmeo:*</label>
<div class="col-md-8">
<select  id="strGemeo" name="strGemeo" class="form-control "  >
  <option value="" selected="selected"> Selecione </option>
<option value="S">SIM</option>
<option value="N">NÃO</option>
</select>
</div>

</div>
</div>

<div class="row clearfix">
     <!-- Text input-->
<div class="col-sm-6 podesumir" >

<label class="col-md-4 control-form">Deixou Filhos?*:</label>
<div class="col-md-8">
<select  id="setDeixouFilhos" name="setDeixouFilhos" class="form-control ">
<option value="" selected="selected"> Selecione </option>
<option value="S">Sim</option>
<option value="N">Não</option>
</select>
</div>
</div>




<div class="col-sm-6 podesumir" id="nomefilhos"  >
<label class="col-md-4 control-form" for="strNomeFilhos">Nome dos Filhos:</label>
<div class="col-md-8">
<input type="text" id="strNomeFilhos" name="strNomeFilhos" class="form-control input-md" placeholder="Nome, Idade: Ex: Pedro João, 16 anos " />
</div>
</div>
</div>


<div class="row clearfix">

<div class="col-sm-6 mais podesumir">
<label class="col-md-4 control-form">Profissão:*</label>
<div class="col-md-8">
<input type="text" id="strProfissao" name="strProfissao"  class="form-control " placeholder=" "  >
</div>
</div>

<div class="col-sm-6 ">
<label class="col-md-4 control-form">Nacionalidade:*</label>
<div class="col-md-8">
<input type="text" id="strNacionalidade" name="strNacionalidade" class="form-control  naopreencher" placeholder=" " required >
</div>
</div>

<div class="col-sm-6 ">
<label class="col-md-4 control-form">Natural:*</label>
<div class="col-md-8">
<input type="text" id="strNatural" name="strNatural" class="form-control naopreencher " placeholder="Clique para pesquisar " required >
</div>
</div>



    <div class="col-sm-6 podesumir" >
            <label class="col-md-4 control-form">Eleitor?*:</label>
            <div class="col-md-8">
            <select  id="setEleitor" name="setEleitor"  class="form-control">
              <option value="" selected="selected"> Selecione </option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
            </select>
            </div>
    </div>

    <div class="col-sm-6 podesumir" >

            <label class="col-md-4 control-form">Deixou Bens?*:</label>
            <div class="col-md-8">
            <select  id="setDeixouBens" name="setDeixouBens"  class="form-control">
              <option value="" selected="selected"> Selecione </option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
            </select>
            </div>
    </div>

       <div class="col-sm-6 podesumir" id="bens" >

            <label class="col-md-6 control-form">Herdeiros Menores ou Interditos*:</label>
            <div class="col-md-6">
            <select  id="setMenoresInterditos" name="setMenoresInterditos"  class="form-control" disabled="">
              <option value="" selected="selected"> Selecione </option>
                    <option value="S">Sim</option>
                    <option value="N">Não</option>
            </select>
            </div>
    </div>


<div class="col-sm-6" id="porordemjud" >
<label class="col-md-1 control-label" ></label>
<div class="col-md-12" >
<input type="checkbox" id="ordemJud"  />
<label for="ordemJud" >Ordem Judicial: </label>
</div>
</div>
</div>




<br>

    <legend><i class="material-icons">person</i>Dados do Declarante</legend>

    <br><br>
    <div class="col-sm-6">

        <label style="margin-left: -4%" class="col-md-3 control-form">Nome:*</label>
        <div class="form-line">
      <div class="col-md-8">
          <input style="margin-left: 20%" type="text" id="strDeclarante" name="strDeclarante" class="form-control naopreencher " placeholder="" required>
        </div>

      </div>
    </div>

       <div class="col-sm-6">

        <label style="margin-left: -4%" class="col-md-3 control-form">CPF:*</label>
        <div class="form-line">
      <div class="col-md-8">
          <input style="margin-left: 20%" type="text" id="strCpfDeclarante" name="strCpfDeclarante" class="form-control naopreencher " placeholder="" required>
        </div>

      </div>
    </div>


    <div class="col-sm-6">

<label class="col-md-5 control-form" style="margin-left: -20px;">RG / Orgão Emissor *</label>
<div class="col-md-5">
<input style="margin-left: -19%;min-width: 130%" type="text" id="strRGDeclarante" name="strRGDeclarante" class="rg form-control naopreencher " placeholder="000000000000-0/OEM./UF" >
</div>
<div class="col-md-2">
<input style="margin-left: -10%; min-width: 200%" type="text" id="strOrgaoEmDeclarante" name="strOrgaoEmDeclarante" class=" form-control naopreencher " placeholder="SSP/MA"  >
</div>
</div>
        <div class="col-sm-6">

        <label style="margin-left: -4%" class="col-md-3 control-form">Nacionalidade:*</label>
        <div class="form-line">
      <div class="col-md-8">
          <input style="margin-left: 20%" type="text" id="strNacionalidadeDeclarante" name="strNacionalidadeDeclarante" class="form-control naopreencher " placeholder="" required>
        </div>

      </div>
    </div>
        <div class="col-sm-6">

        <label style="margin-left: -4%" class="col-md-3 control-form">Profissao:*</label>
        <div class="form-line">
      <div class="col-md-8">
          <input style="margin-left: 20%" type="text" id="strProfissaoDeclarante" name="strProfissaoDeclarante" class="form-control naopreencher " placeholder="" required>
        </div>

      </div>
    </div>

            <div class="col-sm-6">

        <label style="margin-left: -4%" class="col-md-3 control-form">Estado Civil:*</label>
        <div class="form-line">
      <div class="col-md-8">
          <input style="margin-left: 20%" type="text" id="strEstadoCivilDeclarante" name="strEstadoCivilDeclarante" class="form-control naopreencher " placeholder="" required>
        </div>

      </div>
    </div>


            <div class="col-sm-6">

        <label style="margin-left: -4%" class="col-md-3 control-form">Endereço:*</label>
        <div class="form-line">
      <div class="col-md-8">
          <input style="margin-left: 20%" type="text" id="strEnderecoDeclarante" name="strEnderecoDeclarante" class="form-control naopreencher " placeholder="Rua, nº" required>
        </div>

      </div>
    </div>


        <div class="col-sm-6">

        <label style="margin-left: -4%" class="col-md-3 control-form">Bairro:*</label>
        <div class="form-line">
      <div class="col-md-8">
          <input style="margin-left: 20%" type="text" id="strBairroDeclarante" name="strBairroDeclarante" class="form-control naopreencher " placeholder="" required>
        </div>

      </div>
    </div>
         <div class="col-sm-6">

        <label style="margin-left: -4%" class="col-md-3 control-form">Cidade:* </label>
        <div class="form-line">
      <div class="col-md-8">
          <input style="margin-left: 20%" type="text" id="strCidadeDeclarante" name="strCidadeDeclarante" class="form-control naopreencher " placeholder="" required>
        </div>

      </div>
    </div>


    <div class="col-sm-6">

        <label style="margin-left: -4%" class="col-md-3 control-form">Qualidade Declarante:*</label>
        <div class="form-line">
      <div class="col-md-8">
          <input style="margin-left: 20%" type="text" id="strQualificacaoDeclarante" name="strQualificacaoDeclarante" class="form-control " placeholder="Na qualidade de..." required>
        </div>

      </div>
    </div>


       <label class="bg-grey" style="width: 98%; margin-left: 1%"><i class="material-icons">assignment_ind</i>Testemunha 1 </label>
              <hr>
 <div class="col-sm-7"></div>
 <a onclick="$('.testemunhaform').val(' ');$('#canc').toggle();$('#disp').toggle();" id="disp" class="btn waves-effect bg-black"><i class="material-icons"></i>Dispensar Testemunhas</a>
  <a onclick="$('.testemunhaform').val('');$('#canc').toggle();$('#disp').toggle()" id="canc"  class="btn waves-effect bg-red"><i class="material-icons"></i>X</a>

<br><br>

                <div class="col-md-12" >
                <label style="margin-left: -1.5%"  class="col-md-1 control-form" for="strNomeTestemunhas1" >Nome:</label>
                <div class="col-md-8">
                <input type="text" id="strNomeTestemunhas1" name="strNomeTestemunhas1" class="form-control naopreencher testemunhaform input-md" placeholder="Digite o nome" required="" />
                </div>
                </div>
<div class="maistestemunha">
                <!-- Pesquisar Naturalidade no banco de dados-->
                <div class="col-sm-6" >
                <label  style="margin-left: -3%" class="col-md-4 control-form" for="strNaturalidadeTestemunhas1">Naturalidade*:</label>
                <div class="col-md-7">
                <input id="strNaturalidadeTestemunhas1" name="strNaturalidadeTestemunhas1" type="text" class="form-control naopreencher testemunhaform input-md" ="">

                </div>
                </div>
                <!-- Text input-->
                <div class="col-sm-6" >
                <label class="col-md-4 control-form" for="strNacionalidadeTestemunhas1">Nacionalidade*:</label>
                <div class="col-md-7">
                <input id="strNacionalidadeTestemunhas1" name="strNacionalidadeTestemunhas1" type="text" class="form-control naopreencher testemunhaform input-md" ="">

                </div>
                </div>
                <!-- Text input-->

                <div class="col-sm-6" >

                <label style="margin-left: -3%" class="col-md-4 control-form">Sexo*:</label>
                <div class="col-md-7">
                <!--select  id="strSexoTestemunhas1" name="strSexoTestemunhas1" class="form-control naopreencher testemunhaform">

                <option>Selecione</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                </select-->
<input type="text" id="valorsexoTestemunhas1" name="valorsexoTestemunhas1" value="" class="form-control naopreencher testemunhaform"  >
                </div>
                </div>
                <!-- Text input-->
                <div class="col-sm-6" >

                <label   class="col-md-4 control-form">Estado Civil*:</label>
                <div class="col-md-7">
                <!--select  id="strEstadoCivilTestemunhas1" name="strEstadoCivilTestemunhas1"  class="form-control naopreencher testemunhaform">

                <option>Selecione</option>
                <option value="SO">Solteiro</option>
                <option value="CA">Casado</option>
                <option value="CA">Viúvo</option>
                <option value="SE">Separado Judicialmente</option>
                <option value="DE">Dequitado</option>
                <option value="DI">Divorciado</option>
                <option value="UC">União consensual</option>
                <option value="NC">Não consta</option>

                </select-->
                <input type="text" id="valorECTestemunhas1" name="valorECTestemunhas1" value="" class="form-control naopreencher testemunhaform"  >
                </div>
                </div>
                <!-- Text input-->
                <div class="col-sm-6" >
                <label  style="margin-left: -3%" class="col-md-4 control-form" for="dataTestemunhas1">Data Nascimento*:</label>
                <div class="col-md-7">
                <input id="dataTestemunhas1" name="dataTestemunhas1" type="date" class="form-control naopreencher testemunhaform input-md" ="">
                </div>
                </div>

                <div class="col-sm-6" >
                <label  class="col-md-4 control-form" for="strProfissaoTestemunhas1">Profissão*:</label>
                <div class="col-md-7">
                <input id="strProfissaoTestemunhas1" name="strProfissaoTestemunhas1" type="text" class="form-control naopreencher testemunhaform input-md">

                </div>
                </div>
</div>
                <!-- Text input-->
                <!--div class="col-sm-6" >

                <label  style="margin-left: -3%" class="col-md-5 control-form">Tipo de Documento*:</label>
                <div class="col-md-7">
                <select  id="setTipoDocumentoTestemunhas1" name="setTipoDocumentoTestemunhas1"  class="form-control ">

                <option value="" selected="selected"> Selecione</option>
                <option value="1"> Cédula de Identidade</option>
                <option value="2"> Cédula de Identidade Profissional</option>
                <option value="3"> Cédula de Identidade Estrangeiro</option>
                <option value="4"> C.T.P.S. (Carteira Profissional)</option>
                <option value="5"> Carteira de Reservista</option>
                <option value="6"> Carteira de Dispensa  de Incorporação</option>
                <option value="7"> Título de Eleitor</option>
                <option value="8"> Certidão de Casamento</option>
                <option value="9"> Certidão de Nascimento</option>
                <option value="10"> Carteira Nacional de Habilitação</option>
                <option value="11"> Passaporte</option>

                </select>
                </div>
                </div-->

                <hr>
<div class="maistestemunha">      
                <div class="row clearfix">
                <!-- Locais / Pesquisar no banco de dados-->
                <div class="col-sm-8" >
                <div class="form-group">

                <label style="margin-left: 20px" class="col-md-2 control-form" for="strEnderecoTestemunhas1">Endereço:</label>
                <div class="col-md-8" >  <div class="form-line">
                <input type="text" id="strEnderecoTestemunhas1" name="strEnderecoTestemunhas1" class="form-control naopreencher testemunhaform input-md" placeholder="Local de Nascimento" />
                </div>
                </div>

                </div>
                </div>

                <!--div class="col-sm-4" >
                <div class="form-group">

                <label class="col-md-2 control-form" for="strNdaCasaTestemunhas1">N°:</label>
                <div class="col-md-6" >  <div class="form-line">
                <input type="text" id="strNdaCasaTestemunhas1" name="strNdaCasaTestemunhas1" class="form-control naopreencher testemunhaform input-md" placeholder="Numero" />
                </div>
                </div>

                </div>
                </div-->

                </div>
                <div class="row clearfix">
                <div class="col-sm-6" >
                <div class="form-group">

                <label style="margin-left: 20px" class="col-md-3 control-form" for="strBairroTestemunhas1">Bairro:</label>
                <div class="col-md-6" >  <div class="form-line">
                <input type="text" id="strBairroTestemunhas1" name="strBairroTestemunhas1" class="form-control naopreencher testemunhaform input-md" placeholder=""  />
                </div>
                </div>

                </div>
                </div>

          


                <div class="row clearfix">
                <div class="col-sm-6" >
                <div class="form-group">
                <!-- Cidade / Pesquisar no banco de dados-->

                <label style="margin-left: 20px" class="col-md-3 control-form" for="strCidadeTestemunhas1">Cidade:</label>
                <div class="col-md-6" >  <div class="form-line">
                <input type="text" id="strCidadeTestemunhas1" name="strCidadeTestemunhas1" class="form-control naopreencher testemunhaform input-md" placeholder=""  />
                </div>
                </div>

                </div>
                </div>

          
</div>
</div>















<label class="bg-grey" style="width: 98%; margin-left: 1%"><i class="material-icons">assignment_ind</i>Testemunha 2 </label>
              <hr>
 <div class="col-sm-9"></div>

<br><br>
        <div class="col-md-12" >
                <label style="margin-left: -1.5%"  class="col-md-1 control-form" for="strNomeTestemunhas1" >Nome:</label>
                <div class="col-md-8">
                <input type="text" id="strNomeTestemunhas2" name="strNomeTestemunhas2" class="form-control naopreencher testemunhaform input-md" placeholder="Digite o nome" required="" />
                </div>
                </div>
<div class="maistestemunha">
                <!-- Pesquisar Naturalidade no banco de dados-->
                <div class="col-sm-6" >
                <label  style="margin-left: -3%" class="col-md-4 control-form" for="strNaturalidadeTestemunhas2">Naturalidade*:</label>
                <div class="col-md-7">
                <input id="strNaturalidadeTestemunhas2" name="strNaturalidadeTestemunhas2" type="text" class="form-control naopreencher testemunhaform input-md" ="">

                </div>
                </div>
                <!-- Text input-->
                <div class="col-sm-6" >
                <label class="col-md-4 control-form" for="strNacionalidadeTestemunhas2">Nacionalidade*:</label>
                <div class="col-md-7">
                <input id="strNacionalidadeTestemunhas2" name="strNacionalidadeTestemunhas2" type="text" class="form-control naopreencher testemunhaform input-md" ="">

                </div>
                </div>
                <!-- Text input-->

                <div class="col-sm-6" >

                <label style="margin-left: -3%" class="col-md-4 control-form">Sexo*:</label>
                <div class="col-md-7">
                <!--select  id="strSexoTestemunhas2" name="strSexoTestemunhas2" class="form-control naopreencher testemunhaform">

                <option>Selecione</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                </select-->
<input type="text" id="valorsexoTestemunhas2" name="valorsexoTestemunhas2" value="" class="form-control naopreencher testemunhaform"  >
                </div>
                </div>
                <!-- Text input-->
                <div class="col-sm-6" >

                <label   class="col-md-4 control-form">Estado Civil*:</label>
                <div class="col-md-7">
                <!--select  id="strEstadoCivilTestemunhas2" name="strEstadoCivilTestemunhas2"  class="form-control naopreencher testemunhaform">

                <option>Selecione</option>
                <option value="SO">Solteiro</option>
                <option value="CA">Casado</option>
                <option value="CA">Viúvo</option>
                <option value="SE">Separado Judicialmente</option>
                <option value="DE">Dequitado</option>
                <option value="DI">Divorciado</option>
                <option value="UC">União consensual</option>
                <option value="NC">Não consta</option>

                </select-->
                <input type="text" id="valorECTestemunhas2" name="valorECTestemunhas2" value="" class="form-control naopreencher testemunhaform"  >
                </div>
                </div>
                <!-- Text input-->
                <div class="col-sm-6" >
                <label  style="margin-left: -3%" class="col-md-4 control-form" for="dataTestemunhas2">Data Nascimento*:</label>
                <div class="col-md-7">
                <input id="dataTestemunhas2" name="dataTestemunhas2" type="date" class="form-control naopreencher testemunhaform input-md" ="">
                </div>
                </div>

                <div class="col-sm-6" >
                <label  class="col-md-4 control-form" for="strProfissaoTestemunhas2">Profissão*:</label>
                <div class="col-md-7">
                <input id="strProfissaoTestemunhas2" name="strProfissaoTestemunhas2" type="text" class="form-control naopreencher testemunhaform input-md">

                </div>
                </div>
</div>
                <!-- Text input-->
                <!--div class="col-sm-6" >

                <label  style="margin-left: -3%" class="col-md-5 control-form">Tipo de Documento*:</label>
                <div class="col-md-7">
                <select  id="setTipoDocumentoTestemunhas2" name="setTipoDocumentoTestemunhas2"  class="form-control ">

                <option value="" selected="selected"> Selecione</option>
                <option value="1"> Cédula de Identidade</option>
                <option value="2"> Cédula de Identidade Profissional</option>
                <option value="3"> Cédula de Identidade Estrangeiro</option>
                <option value="4"> C.T.P.S. (Carteira Profissional)</option>
                <option value="5"> Carteira de Reservista</option>
                <option value="6"> Carteira de Dispensa  de Incorporação</option>
                <option value="7"> Título de Eleitor</option>
                <option value="8"> Certidão de Casamento</option>
                <option value="9"> Certidão de Nascimento</option>
                <option value="10"> Carteira Nacional de Habilitação</option>
                <option value="11"> Passaporte</option>

                </select>
                </div>
                </div-->

                <hr>
<div class="maistestemunha">      
                <div class="row clearfix">
                <!-- Locais / Pesquisar no banco de dados-->
                <div class="col-sm-8" >
                <div class="form-group">

                <label style="margin-left: 20px" class="col-md-2 control-form" for="strEnderecoTestemunhas2">Endereço:</label>
                <div class="col-md-8" >  <div class="form-line">
                <input type="text" id="strEnderecoTestemunhas2" name="strEnderecoTestemunhas2" class="form-control naopreencher testemunhaform input-md" placeholder="Local de Nascimento" />
                </div>
                </div>

                </div>
                </div>

                <!--div class="col-sm-4" >
                <div class="form-group">

                <label class="col-md-2 control-form" for="strNdaCasaTestemunhas2">N°:</label>
                <div class="col-md-6" >  <div class="form-line">
                <input type="text" id="strNdaCasaTestemunhas2" name="strNdaCasaTestemunhas2" class="form-control naopreencher testemunhaform input-md" placeholder="Numero" />
                </div>
                </div>

                </div>
                </div-->

                </div>
                <div class="row clearfix">
                <div class="col-sm-6" >
                <div class="form-group">

                <label style="margin-left: 20px" class="col-md-3 control-form" for="strBairroTestemunhas2">Bairro:</label>
                <div class="col-md-6" >  <div class="form-line">
                <input type="text" id="strBairroTestemunhas2" name="strBairroTestemunhas2" class="form-control naopreencher testemunhaform input-md" placeholder=""  />
                </div>
                </div>

                </div>
                </div>

            


                <div class="row clearfix">
                <div class="col-sm-6" >
                <div class="form-group">
                <!-- Cidade / Pesquisar no banco de dados-->

                <label style="margin-left: 20px" class="col-md-3 control-form" for="strCidadeTestemunhas2">Cidade:</label>
                <div class="col-md-6" >  <div class="form-line">
                <input type="text" id="strCidadeTestemunhas2" name="strCidadeTestemunhas2" class="form-control naopreencher testemunhaform input-md" placeholder=""  />
                </div>
                </div>

                </div>
                </div>


                      </div>                      <!-- Locais / Pesquisar no banco de dados-->


      <div class="col-sm-10"></div>
      <button type="subimit" name="subimit" class="btn bg-green  waves-effect waves-float">
      <i class="material-icons">save</i> SALVAR
    </button><br>

      </fieldset>
      </form>
      </div>


<!--##########################################       FIm do form - Autenticação                      ##################################-->



                            </div>
                        </div>
                    </div>
                </div>
            </div>
</div>



<script type="text/javascript">
    $(document).ready(function(){
  $("#cpf").inputmask("000.000.000-00");

});
</script>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <script>
$(document).ready(function(){
$("#imgBookc").click(function(){
$("#leftsidebar").toggle();
});
$('.nascordemjud').hide();
$('.oj').hide();
});
</script>

<script>
document.onkeyup = function(e) {
if (e.which == 133) {
// window.open("cartorio-notas.php");
window.location = "../../index.php";
}

};
</script>

    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>



    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
  <!-- Input Mask Plugin Js -->
    <script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
        <script src="../../plugins/jquery-validation/jquery.validate.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".cpf").inputmask("999.999.999-99");
    $(".ndo").inputmask("99999999-9");
$("#form1").validate();
$("#form2").validate();
$("#form3").validate();
$("#form4").validate();
$('.rogo').hide();
$('#canc').hide();

showCustomer2();

$('.naopreencher').dblclick(function(){
alert('O CADASTRO DE NOVAS PESSOAS DEVE SER FEITO CLICANDO EM "CADASTRAR PESSOA" E AS PARTES INSERIDAS EM TEMPO REAL ATRAVÉS DOS BOTÕES "BUSCAR NOS REGISTROS" ')
});

verificatipoobito();

} );

</script>




    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
    <script src="../../plugins/ajax/screen.js"></script>
    <!-- TinyMCE -->
        <script src="../../js/pages/forms/editors.js"></script>
    <script src="../../plugins/tinymce/tinymce.js"></script>


<script>
  tinymce.init({
  selector: 'textarea',
    language: 'pt_BR',
    language_url : '../../plugins/tinymce/langs/pt_BR.js',
    theme: 'modern',
    plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
       toolbar2: 'print preview media | forecolor backcolor emoticons | fontsizeselect fontselect',
      font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;Arial Black=arial black,avant garde;Indie Flower=indie flower, cursive;Times New Roman=times new roman,times;',
      fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
       image_advtab: true,
     file_picker_callback: function(callback, value, meta) {
     if (meta.filetype == 'image') {
       $('#upload').trigger('click');
       $('#upload').on('change', function() {
         var file = this.files[0];
         var reader = new FileReader();
         reader.onload = function(e) {
           callback(e.target.result, {
             alt: ''
           });
         };
         reader.readAsDataURL(file);
       });
     }
   }
  });
  </script>

    <script>

    $(function () {
          $("#seloGratuito").click(function () {
              if ($(this).is(":checked")) {
                  $("#dvJustificativa").show();
                  $("#AddBranco").hide();
              } else {
                  $("#dvJustificativa").hide();
                  $("#AddBranco").show();
              }
          });
      });
  </script>

  <script>

  $(function () {
        $("#seloGratuito2").click(function () {
            if ($(this).is(":checked")) {
                $("#dvJustificativa2").show();
                $("#AddBranco2").hide();
            } else {
                $("#dvJustificativa2").hide();
                $("#AddBranco2").show();
            }
        });
    });
</script>

<script>

$(function () {
      $("#checkboxConjungue").click(function () {
          if ($(this).is(":checked")) {
              $("#dvConjungue").show();
              $("#AddBranco").hide();
          } else {
              $("#dvConjungue").hide();
              $("#AddBrancoConjugue").show();
          }
      });
  });
</script>

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

<script type="text/javascript">
window.onload = function(){
document.getElementById('strNomeFilhos').disabled=true;
var select = document.getElementById('valorEC');
var selectfilhos = document.getElementById('setDeixouFilhos');
var selectbens = document.getElementById('setDeixouBens');

select.onchange = function(){
if (this.value == 'CA') {document.getElementById('conjuge').style.display="block";}
else if (this.value == 'VI') {document.getElementById('conjuge').style.display="block";}
else{ document.getElementById('conjuge').style.display="none"; }
};

selectfilhos.onchange = function(){
if (this.value == 'S') {document.getElementById('strNomeFilhos').disabled= false;}
else{ document.getElementById('strNomeFilhos').disabled= true; }
};

selectbens.onchange = function(){
if (this.value == 'S') {document.getElementById('setMenoresInterditos').disabled=false;}
else{ document.getElementById('setMenoresInterditos').disabled=true; }
};




};


</script>
<?php include('modais-obito.php'); ?>
<script src="obito.js"></script>
<input type="hidden" id="tipomodal" name="">
<input type="hidden" id="tipomodalPessoa" name="">
<input name="image" type="file" id="upload" class="hidden" onchange="">
<?php include('modais/modais-pesquisa-selo.php') ?>
</body>

</html>
