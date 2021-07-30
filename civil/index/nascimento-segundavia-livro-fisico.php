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
    <title>Registro de Nascimento Segunda via </title>

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

        <legend  style="width: 100%"><i class="material-icons">home</i>Dados do Nascimento</legend>

      <!-- Text input-->






<div class="col-sm-4">
<label class="control-form col-md-4">Livro:</label>
<div class="col-md-8">
<input type="text" name="strLivro" id="strLivro" placeholder="" ="" class="form-control">	
</div>	
</div>	

<div class="col-sm-4">
<label class="control-form col-md-4">Folha:</label>
<div class="col-md-8">
<input type="text" name="strFolha" id="strFolha" placeholder="" ="" class="form-control">	
</div>	
</div>

<div class="col-sm-4">
<label class="control-form col-md-4">Termo:</label>
<div class="col-md-8">
<input type="text" name="strTermo" id="strTermo" placeholder="" ="" class="form-control">	
</div>	
</div>


<div class="col-sm-4">
<label class="control-form col-md-4">Data do Registro:</label>
<div class="col-md-8">
<input type="date" name="dataRegistro" id="dataRegistro" placeholder="" ="" class="form-control">	
</div>	
</div>


<div class="col-sm-6">
<label class="control-form col-md-3">Matricula:</label>
<div class="col-md-8">
<input style="margin-left: -6%" type="text" name="strMatricula" id="strMatricula" placeholder="" ="" class="form-control">	
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
<br>
<div class="row">
     
  <label class="bg-grey" style="width: 103%;padding: 5px;"><i class="material-icons">person</i>Nascido:</label>
<hr>
</div>


                                                <!-- Text input-->
                      <div class="col-sm-12">

                      <label class="col-md-1 control-form" for="strNomeFilho" style="margin-left: -2.5%">Nome completo:</label>
                      <div class="col-md-9" >
                      <input style="margin-left: -0.5%" type="text" id="strNomeFilho" name="strNomeFilho" class="form-control input-md" placeholder=""   />
                      </div>


                      </div>

                                <!-- Text input-->
                      <div class="row clearfix">
                      <div class="col-sm-4">
                      <label class="col-md-3 control-label" style="margin-left: -4%">Sexo:</label>
                      <div class="col-md-7">
                      <select  id="setSexoFilho" name="setSexoFilho" class="form-control" ="">

                      <option value="">Selecione</option>
                      <option value="M">Masculino</option>
                      <option value="F">Feminino</option>
                      </select>
                      </div>
                      </div>


                      <div class="col-sm-4">
                      <label class="col-md-3 control-label">Gêmeos:</label>
                      <div class="col-md-8">
                      <select  id="setGemeos" name="setGemeos" class="form-control">

                       <option value="">Selecione</option>
                      <option value="S">Sim</option>
                      <option value="N">Não</option>
                      </select>
                      </div>
                      </div>

                      <div class="col-sm-4">
                      <label class="col-md-3 control-label" for="strCPFfilho">CPF:</label>
                      <div class="col-md-8">
                      <input type="text" name="strCPFfilho" id="strCPFfilho" class="cpf form-control " placeholder="000.000.000-00">
                      </div>
                      </div>

                      <div class="col-sm-12" style=" display: none;" id="divmatriculagemeos">
                        <br>
                      <div class="col-md-12">
                      <input style="padding: 40px;" type="text" name="strNomeMatriculaGemeos" id="strNomeMatriculaGemeos" class="form-control" placeholder="Nome, Matricula dos gemeos.">
                    <br>
                      </div>
                      </div>

            
                      <!-- Text input-->
                   
</div>
<!-- Locais / Pesquisar no banco de dados-->

                    <div class="row clearfix">


   <div class="col-sm-4">
                      <label class="col-md-4 control-form" style="margin-left: -2%">Cor da Pele:</label>
                      <div class="col-md-7">
                      <select style="margin-left: -20%"  id="setCorPele" name="setCorPele" class="form-control" >

                 <option value="">Selecione</option>
                      <option value="A">Amarela</option>
                      <option value="B">Branca</option>
                      <option value="PA">Parda</option>
                      <option value="PR">Preta</option>
                      <option value="I">Indigena</option>

                      </select>
                      </div>
                      </div>                      <!-- Locais / Pesquisar no banco de dados-->

                    <div class="col-sm-4" >
                    <label class="col-md-3 control-form">Filiação:</label>
                    <div class="col-sm-8">
                    <select  id="setFiliacao" name="setFiliacao"  class="form-control" >
                    <option value="">Selecione</option>
                    <option value="PM">Pai e Mãe</option>
                    <option value="SM">Só Mãe</option>
                    <option value="DM">Dupla Maternidade</option>
                    <option value="DP">Dupla Paternidade</option>
                    </select>
                    </div>
                    </div>


                    <div class="col-sm-4" >
                    <label class="col-md-3 control-form" for="strCidadeFilho">Cidade*:</label>
                    <div class="col-sm-8">
                    <input id="strCidadeFilho" name="strCidadeFilho" placeholder="Clique para pesquisar" type="hidden" class="form-control input-md" ="" >
                    <input id="strCidadeFilhoNome" name="strCidadeFilhoNome" placeholder="Clique para pesquisar" type="text" class="form-control input-md" ="" >
                    </div>
                    </div>

                   

                    </div>


                    <div class="row clearfix">
                    <div class="col-sm-4" >
                    <label class="col-md-5 control-label" style="margin-left: -3%">Naturalidade:</label>
                    <div class="col-md-6">
                    <input type="hidden" style="margin-left:-20%" id="strNaturalidade" name="strNaturalidade"  class="form-control" >
                    <input type="text" style="margin-left:-20%" id="strNaturalidadeNome" name="strNaturalidadeNome"  class="form-control" >
                    </div>
                    </div> 

                    <div class="col-sm-4" >
                    <label class="col-md-4 control-form" style="margin-left:" for="dataNascimento">Data :</label>
                    <div class="col-md-8">
                    <input id="dataNascimento" style="margin-left: -15%;" name="dataNascimento" type="date" class="form-control input-md" ="" >
                    </div>
                    </div>

                    <div class="col-sm-4" >
                    <label class="col-md-4 control-form" >Hora:</label>
                    <div class="col-md-8">  
                    <input id="horaNascimento" style="margin-left: -15%;" name="horaNascimento" type="time" class="form-control input-md" ="" >
                    </div>
                    </div>


              



                    <!--div class="col-sm-10">
                      <br>
                    <label style="margin-left: -15%" class="col-md-4 control-label" for="strOrdemFiliacao">Ordem de Filiação:</label>
                    <div class="col-md-8" >
                    <input style="margin-left: -4%" type="text" id="strOrdemFiliacao" name="strOrdemFiliacao" class="form-control input-md" placeholder="ordem entre irmãos com mesmo sobrenome (por extenso)" />
                    </div>
                    </div-->

                    </div>

                    <div class="row clearfix">


<label class="bg-grey" style="width: 100%;padding: 5px;"> <i class="material-icons">local_hospital</i> Dados Médicos</label>
<hr>

                    <div class="col-sm-6" >
                    <label style="margin-left: -1%" class="col-md-4 control-form" for="setTipoLocalNascimento">Tipo de Local:</label>
                    <div class="col-md-8" >
                  <select  style="margin-left: -15%"  class="form-control" id="setTipoLocalNascimento" name="setTipoLocalNascimento" >
                    <option value="IGNORADO">IGNORADO</option>
                    <option value="UNIDADE_SAUDE">Maternidade/ Hospital</option>
                    <option value="FORA_UNIDADE_SAUDE">Fora da Maternidade</option>
                        <option value="RANI">Registro de Nascimento de Indígena</option>
                  </select>
                    </div>
                    </div>

<script type="text/javascript">
function camposmedicos(){
var sel = document.getElementById('setTipoLocalNascimento');
sel.onchange = function(){
if (this.value == 'FORA_UNIDADE_SAUDE' ) {
document.getElementById('strNumDNV').disabled = true;
document.getElementById('strNomeMedico').disabled = true;
document.getElementById('strCRMMedico').disabled = true;
document.getElementById('strNumDNV').value="NULL";
document.getElementById('strNomeMedico').value="NULL";
document.getElementById('strCRMMedico').value="NULL";
document.getElementById('strNumDNV').style.backgroundColor = "silver";
document.getElementById('strNomeMedico').style.backgroundColor = "silver";
document.getElementById('strCRMMedico').style.backgroundColor = "silver";
document.getElementById('ranidiv').style.display = "none"; 
document.getElementById('dnvdiv').style.display = "block"; 
}

else if(this.value == 'RANI'){
document.getElementById('strNumDNV').disabled = false;
document.getElementById('strNomeMedico').disabled = false;
document.getElementById('strCRMMedico').disabled = false;
document.getElementById('strNumDNV').value="";
document.getElementById('strNomeMedico').value="";
document.getElementById('strCRMMedico').value="";
document.getElementById('strNumDNV').style.backgroundColor = "white";
document.getElementById('strNomeMedico').style.backgroundColor = "white";
document.getElementById('strCRMMedico').style.backgroundColor = "white";
document.getElementById('ranidiv').style.display = "block"; 
document.getElementById('dnvdiv').style.display = "block";  
}

else{
document.getElementById('strNumDNV').disabled = false;
document.getElementById('strNomeMedico').disabled = false;
document.getElementById('strCRMMedico').disabled = false;
document.getElementById('strNumDNV').value="";
document.getElementById('strNomeMedico').value="";
document.getElementById('strCRMMedico').value="";
document.getElementById('strNumDNV').style.backgroundColor = "white";
document.getElementById('strNomeMedico').style.backgroundColor = "white";
document.getElementById('strCRMMedico').style.backgroundColor = "white";
document.getElementById('ranidiv').style.display = "none"; 
document.getElementById('dnvdiv').style.display = "block"; 
}
}

}
</script>

                    <div class="col-sm-6" >
                    <label  style="margin-left: -1%"  class="col-md-4 control-form" for="strLocalNascimento">Local de Nascimento:</label>
                    <div class="col-md-8" >
                    <input type="text"  style="margin-left: -15%"  id="strLocalNascimento" name="strLocalNascimento" class="form-control input-md" placeholder="Local de Nascimento" / ="">
                    </div>
                    </div>

                    <div class="col-sm-6" >
                    <label  style="margin-left: -1%"  class="col-md-4 control-form" for="strEnderecoLocalNascimento">Endereço:</label>
                    <div class="col-md-8" >
                    <input  style="margin-left: -15%"  type="text" id="strEnderecoLocalNascimento" name="strEnderecoLocalNascimento" class="form-control input-md" placeholder="Rua, Nº" ="" />
                    </div>
                    </div>

                    <div class="col-sm-6" id="dnvdiv">
                    <label  style="margin-left: -1%"  class="col-md-3  control-form" for="strNumDNV" >Número da D.N.V:</label>
                    <div class="col-md-8"   >
                    <input type="text"  id="strNumDNV" name="strNumDNV" maxlength="14" class="dnv form-control input-md" placeholder="Declaração de Nascido Vivo" ="" />
                    </div>
                    </div>
                      <div class="col-sm-6" id="ranidiv" style="display: none">
                    <label  style="margin-left: -1%"  class="col-md-3  control-form" for="strRani" >RANI</label>
                    <div class="col-md-8"   >
                    <input type="text"  id="strRani" name="strRani" maxlength="9" class="form-control input-md" placeholder="Registro Adm. Nacional do Índio" />
                    </div>
                    </div>

                        <div class="col-sm-6">
                    <label  style="margin-left: -1%"  class="col-md-2  control-form" for="strNomeMedico" >Médico/Prof.:</label>
                    <div class="col-md-8" >
                    <input style="margin-left: 12%;" type="text" id="strNomeMedico" name="strNomeMedico" class="form-control input-md" placeholder="Nome"  />
                    </div>
                    </div>


                        <div class="col-sm-6">
                    <label class="col-md-4  control-label" for="strCRMMedico" style="margin-left: -20%">CRM/DOC:</label>
                    <div class="col-md-8" >
                    <input type="text" style="margin-left: 18%" id="strCRMMedico" name="strCRMMedico" class="form-control input-md" placeholder=""  />
                    </div>
                    </div>

<label class="bg-grey" style="width: 100%;padding: 5px"> <i class="material-icons">person</i> Declarante </label>
<hr>


<a  id="declarantePai" class="btn waves-effect waves-float" >Pai</a>


<a  id="declaranteMae" class="btn  waves-effect waves-float">Mãe</a>

<a  id="declaranteOutro" class="btn  waves-effect waves-float">Outro</a>
<a  id="regTardio" class="btn  waves-effect waves-float">Registro Tardio</a>
<a  id="ordemJud" class="btn  waves-effect waves-float">Ordem Judicial</a>
<a  id="restauracao" class="btn  waves-effect waves-float">Restauração de Registro</a>


<input type="hidden" class=""  id="declarantePais" name="declarantePais">
<br>
<div class="col-sm-9"></div>


<br><br>
<div id="dadosdec" style="display: none">
                    <div class="col-sm-12">
                    <label class="col-md-4  control-form" for="strNomeDeclarante" >Nome do Declarante:</label>
                    <div class="col-md-8" >
                    <input style="margin-left: -27%;" type="text" id="strNomeDeclarante" name="strNomeDeclarante" class="form-control input-md" placeholder="Nome" />
                    </div>
                    </div>

                     <!-- Pesquisar Naturalidade no banco de dados-->
                <div class="col-sm-6" >
                <label class="col-md-4 control-form" for="strNaturalidadeDeclarante">Naturalidade*:</label>
                <div class="col-md-6">
                <input  id="strNaturalidadeDeclarante" name="strNaturalidadeDeclarante" type="text" class="form-control input-md" >

                </div>
                </div>

                <div class="col-sm-6" >
                <label style="margin-left: -27%;" class="col-md-4 control-form" for="strNacionalidadeDeclarante">Nacionalidade*:</label>
                <div class="col-md-7">
                <input id="strNacionalidadeDeclarante" name="strNacionalidadeDeclarante" type="text" class="form-control input-md" >

                </div>
                </div>

                <div class="col-sm-6" >

                <label class="col-md-4 control-form">Sexo*:</label>
                <div class="col-md-6">
                <select   id="strSexoDeclarante" name="strSexoDeclarante" class="form-control">

                <option>Selecione</option>
                <option value="M">Masculino</option>
                <option value="F">Feminino</option>
                </select>
<input type="hidden" id="valorsexoDeclarante" name="valorsexoDeclarante" value="" class="form-control" >
                </div>
                </div>
                <!-- Text input-->
                <div class="col-sm-6" >

                <label style="margin-left: -27%;" class="col-md-4 control-form">Estado Civil*:</label>
                <div class="col-md-6">
                <select id="strEstadoCivilDeclarante" name="strEstadoCivilDeclarante"  class="form-control" >

                <option>Selecione</option>
                <option value="SO">Solteiro</option>
                <option value="CA">Casado</option>
                <option value="CA">Viúvo</option>
                <option value="SE">Separado Judicialmente</option>
                <option value="DE">Dequitado</option>
                <option value="DI">Divorciado</option>
                <option value="UC">União consensual</option>
                <option value="NC">Não consta</option>

                </select>
                <input type="hidden" id="valorECDeclarante" name="valorECDeclarante" value="" class="form-control"  style="background-color: silver">
                </div>
                </div>
                <!-- Text input-->
                <div class="col-sm-6" >
                <label  class="col-md-4 control-form" for="dataDeclarante">Data de Nascimento*:</label>
                <div class="col-md-6">
                <input  id="dataDeclarante" name="dataDeclarante" type="date" class="form-control input-md" >
                </div>
                </div>

                <div class="col-sm-4" style="margin-left: -12%;" >
                <label class="col-md-4 control-form" for="strProfissaoDeclarante">Profissão*:</label>
                <div class="col-md-8">
                <input style="margin-left:30%;" id="strProfissaoDeclarante" name="strProfissaoDeclarante" type="text" class="form-control input-md">

                </div>
                </div>


                <div class="col-sm-10" >
                <div class="form-group">

                <label style="margin-left: 2%"  class="col-md-4 control-form" for="strEnderecoDeclarante">Endereço:</label>
                <div class="col-md-7" >  <div class="form-line">
                <input style="margin-left: -26%;min-width: 140%" type="text" id="strEnderecoDeclarante" name="strEnderecoDeclarante" class="form-control input-md" placeholder="Local de Nascimento" />
                </div>
                </div>

                </div>
                </div>


                <div class="col-sm-6" >
                <div class="form-group">

                <label style="margin-left: 15px" class="col-md-4 control-form" for="strBairroDeclarante">Bairro:</label>
                <div class="col-md-6" >  <div class="form-line">
                <input type="text" id="strBairroDeclarante" name="strBairroDeclarante" class="form-control input-md" placeholder="" />
                </div>
                </div>

                </div>
                </div>


                <div class="col-sm-6" >
                <div class="form-group">
                <!-- Cidade / Pesquisar no banco de dados-->

                <label style="margin-left: -14%;"  class="col-md-4 control-form" for="strCidadeDeclarante">Cidade:</label>
                <div class="col-md-6" >  <div class="form-line">
                <input style="margin-left: -7%;" type="text" id="strCidadeDeclarante" name="strCidadeDeclarante" class="form-control input-md" placeholder=""  />
                </div>
                </div>

                </div>
                </div>


</div>


                        <div class="col-sm-12">
                    <label class="col-md-1  control-label" for="strQualificacaoDeclarante" >Qualificação:</label>
                    <div class="col-md-3" >
                    <input type="text" style="margin-left: 40px" id="strQualificacaoDeclarante" name="strQualificacaoDeclarante" class="form-control input-md" placeholder="Na qualidade de..." />
                    <br><br>
                    </div>
                    </div>


<div class="row">


                    <div class="col-sm-6 oj " >
                    <div class="form-group">

                    <label style="margin-left: 15px" class="col-md-4 control-form" for="strJuizMandato">Juiz:</label>
                    <div class="col-md-6" >  <div class="form-line">
                    <input type="text" id="strJuizMandato" name="strJuizMandato" class="form-control input-md nascordemjud" placeholder="" />
                    </div>
                    </div>

                    </div>
                    </div>

                    <div class="col-sm-6 oj" >
                    <div class="form-group">

                    <label style="margin-left: 15px" class="col-md-4 control-form" for="strVaraMandato">Vara:</label>
                    <div class="col-md-6" >  <div class="form-line">
                    <input type="text" id="strVaraMandato" name="strVaraMandato" class="form-control input-md nascordemjud" placeholder="" />
                    </div>
                    </div>

                    </div>
                    </div>

                             <div class="col-sm-6 oj" >
                    <div class="form-group">

                    <label style="margin-left: 15px" class="col-md-4 control-form" for="dataExpedicaoMandato">Data de Expedição:</label>
                    <div class="col-md-6" >  <div class="form-line">
                    <input type="date" id="dataExpedicaoMandato" name="dataExpedicaoMandato" class="form-control input-md nascordemjud" placeholder="" />
                    </div>
                    </div>

                    </div>
                    </div>

                                 <div class="col-sm-6 oj" >
                    <div class="form-group">

                    <label style="margin-left: 15px" class="col-md-4 control-form" for="NumMandato">Número:</label>
                    <div class="col-md-6" >  <div class="form-line">
                    <input type="text" id="NumMandato" name="NumMandato" class="form-control input-md nascordemjud" placeholder="" />
                    </div>
                    </div>

                    </div>
                    </div>


                                 <div class="col-sm-6 oj" >
                    <div class="form-group">

                    <label style="margin-left: 15px" class="col-md-4 control-form" for="dataSentencaMandato">Data da Sentença:</label>
                    <div class="col-md-6" >  <div class="form-line">
                    <input type="date" id="dataSentencaMandato" name="dataSentencaMandato" class="form-control input-md nascordemjud" placeholder="" />
                    </div>
                    </div>

                    </div>
                    </div>


</div>

 <label class="bg-grey" style="width: 103%"><i class="material-icons">person</i>Mãe:</label>
<hr>



                        <div class="col-sm-10">
                        <br>
                        <label style="margin-left: -65px" class="col-md-2 control-label" for="strNomeMae">Nome:</label>
                        <div class="col-md-10" >
                        <input type="text" id="strNomeMae" name="strNomeMae" class="form-control  input-md" placeholder="Digite o nome" =""   />
                        </div>
                        </div>

                   <div class="row clearfix">

                        <div class="col-sm-6">
                        <label class="col-md-4 control-form" for="strRGMae " >RG/ Órgão Emissor:</label>
                        <div class="col-md-5">
                        <input type="text" class="form-control  input-md" name="strRGMae" id="strRGMae"  ="">
                        </div>
                         <div class="col-md-3">
                        <input type="text" class="form-control  input-md" name="strOrgaoEmMae" id="strOrgaoEmMae" placeholder="SSP/MA"  ="">
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <label class="col-md-4 control-form" for="strCPFMae " >CPF:</label>
                        <div class="col-md-8">
                        <input type="text" class="form-control  input-md" name="strCPFMae" id="strCPFMae"  ="">
                        </div>
                        </div>

<div class="maismae">

                          <div class="col-sm-6">
                           <label class="col-md-4 control-form" for="strNaturalidadeMae " >Naturalidade:</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control  input-md" placeholder="clique" name="strNaturalidadeMae" id="strNaturalidadeMae"  ="">
                          </div>
                          </div>


                            <div class="col-sm-6" >
                          <label class="col-md-4 control-form" for="strNacionalidadeMae">Nacionalidade*:</label>
                          <div class="col-md-8">
                          <input id="strNacionalidadeMae" name="strNacionalidadeMae" type="text" class="form-control  input-md"  ="">
                          </div>
                          </div>



                          <div class="col-sm-6"  >
                          <label class="col-md-4 control-form">Sexo*:</label>
                          <div class="col-md-8">
                          <!--select  id="strSexoMae" name="strSexoMae"  class="form-control " >
                          <option value="">Selecione</option>
                          <option value="M">Masculino</option>
                          <option value="F">Feminino</option>
                          </select-->
                            <input type="text" id="vsm" name="vsm" value="" class="form-control " >
                          </div>
                          </div>





                          <div class="col-sm-6" >
                          <label class="col-md-4 control-form">Estado Civil*:</label>
                          <div class="col-md-8">
                          <!--select  id="strEstadoCivilMae" name="strEstadoCivilMae" class="form-control "  disabled="" >

                          <option value="">Selecione</option>
                          <option value="SO">Solteiro</option>
                          <option value="CA">Casado</option>
                          <option value="CA">Viúvo</option>
                          <option value="SE">Separado Judicialmente</option>
                          <option value="DE">Dequitado</option>
                          <option value="DI">Divorciado</option>
                          <option value="UC">União consensual</option>
                          <option value="NC">Não consta</option>
                          </select-->
                          <input type="text" id="vECm" name="vECm" value="" class="form-control " >
                          </div>
                          </div>


                          <!--div class="col-sm-6">
                          <label class="col-md-4 control-form">Parentesco:</label>
                          <div class="col-md-8">
                          <select  id="setParentescoAvos2" name="setParentescoAvos2" class="form-control " >
                          <option>Selecione</option>
                          <option value="MA">Materno</option>
                          <option value="PA">Paterno</option>

                          </select>
                          </div>
                          </div-->
                          <!-- Text input-->




                          <div class="col-sm-6">
                          <label class="col-md-5 control-form" for="dataMae">Data de Nascimento*:</label>
                          <div class="col-sm-7" >
                          <input id="dataMae" name="dataMae" type="date" class="form-control  input-md"  ="">
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <label class="col-md-4 control-form" for="strProfissaoMae">Profissão*:</label>
                          <div class="col-md-8" >
                          <input id="strProfissaoMae" name="strProfissaoMae" type="text" class="form-control  input-md" >

                          </div>
                          </div>

</div>
                          <!-- Text input-->

                          <!--div class="col-sm-6" >
                                 <label class="col-md-4 control-form">Tipo de Documento*:</label>
                          <div class="col-sm-8">
                          <select  id="setTipoDocumentoMae" name="setTipoDocumentoMae" class="form-control " >

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
</div>
                                         

                          
                          <hr>
   <div class="maismae">   
                          <div class="row clearfix" style="margin-left: 10px;">
                          <!-- Locais / Pesquisar no banco de dados-->
                          <div class="col-sm-8" >
                          <div class="form-group">

                          <label class="col-md-2 control-form" for="strEnderecoMae">Endereço:</label>
                          <div class="col-md-8" >  <div class="form-line">
                          <input type="text" id="strEnderecoMae" name="strEnderecoMae" class="form-control  input-md" placeholder="Local de Nascimento"  />
                          </div>
                          </div>

                          </div>
                          </div>

                          <!--div class="col-sm-4" >
                          <div class="form-group">

                          <label class="col-md-2 control-form" for="strNdaCasaMae">N°:</label>
                          <div class="col-md-6" >  <div class="form-line">
                          <input type="text" id="strNdaCasaMae" name="strNdaCasaMae" class="form-control input-md" placeholder="Numero"  />
                          </div>
                          </div>

                          </div>
                          </div-->

                          </div>
                          <div class="row clearfix" style="margin-left: 10px">
                          <div class="col-sm-6" >
                          <div class="form-group">

                          <label class="col-md-3 control-form" for="strBairroMae">Bairro:</label>
                          <div class="col-md-6" >  <div class="form-line">
                          <input type="text" id="strBairroMae" name="strBairroMae" class="form-control  input-md" placeholder=""   />
                          </div>
                          </div>

                          </div>
                          </div>

                   


                          <div class="row clearfix" style="margin-left: 10px">
                          <div class="col-sm-6" >
                          <div class="form-group">
                          <!-- Cidade / Pesquisar no banco de dados-->

                          <label class="col-md-3 control-form" for="strCidadeMae">Cidade:</label>
                          <div class="col-md-6" >  <div class="form-line">
                          <input type="text" id="strCidadeMae" name="strCidadeMae" class="form-control  input-md" placeholder="clique"   />
                          </div>
                          </div>

                          </div>
                          </div>


                  

                          </div>

                          </div>

  <hr>
  <label class="bg-grey" style="width: 100%"><i class="material-icons">assignment_ind</i>Pai</label>



<div class="col-sm-8"></div>


<div class="col-sm-4" >
<label class="col-md-1 control-label" ></label>
<div class="col-md-12" >
<input type="checkbox" id="naodeclaradopai"  />
<label for="naodeclaradopai" >Não Registrado</label>
</div>
</div>

<br><br>
  <hr>
   <div class="col-sm-10">
                        <label style="margin-left: -65px" class="col-md-2 control-label" for="strNomePai">Nome:</label>
                        <div class="col-md-10" >
                        <input type="text" id="strNomePai" name="strNomePai" class="form-control   input-md" placeholder="Digite o nome"   />
                        </div>
                        </div>

                   <div class="row clearfix">

                          <div class="col-sm-6">
                        <label class="col-md-4 control-form" for="strRGPai " >RG/ Órgão Emissor:</label>
                        <div class="col-md-5">
                        <input type="text" class="form-control  input-md" name="strRGPai" id="strRGPai" ="">
                        </div>
                           <div class="col-md-3">
                        <input type="text" class="form-control  input-md" name="strOrgaoEmPai" id="strOrgaoEmPai" placeholder="SSP/MA"   ="">
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <label class="col-md-4 control-form" for="strCPFPai " >CPF:</label>
                        <div class="col-md-8">
                        <input type="text" class="form-control  input-md" name="strCPFPai" id="strCPFPai"   ="">
                        </div>
                        </div>

<div class="maispai">
                          <div class="col-sm-6">
                          <label class="col-md-4 control-form" for="strNaturalidadePai">Naturalidade:</label>
                          <div class="col-md-8">
                          <input type="text" class="form-control  input-md" name="strNaturalidadePai" id="strNaturalidadePai"   ="">
                          </div>
                          </div>


                            <div class="col-sm-6" >
                          <label class="col-md-4 control-form" for="strNacionalidadePai">Nacionalidade*:</label>
                          <div class="col-md-8">
                          <input id="strNacionalidadePai" name="strNacionalidadePai" type="text" class="form-control  input-md"   ="">
                          </div>
                          </div>



                          <div class="col-sm-6" >
                          <label class="col-md-4 control-form">Sexo*:</label>
                          <div class="col-md-8">
                          <!--select  id="strSexoPai" name="strSexoPai"  class="form-control " >
                          <option value="">Selecione</option>
                          <option value="M">Masculino</option>
                          <option value="F">Feminino</option>
                          </select-->
                          <input type="text" id="vsp" name="vsp" class="form-control "  >
                          </div>
                          </div>




                          <div class="col-sm-6" >
                          <label class="col-md-4 control-form">Estado Civil*:</label>
                          <div class="col-md-8">
                          <!--select  id="strEstadoCivilPai" name="strEstadoCivilPai" class="form-control "   disabled="" >

                          <option value="">Selecione</option>
                          <option value="SO">Solteiro</option>
                          <option value="CA">Casado</option>
                          <option value="CA">Viúvo</option>
                          <option value="SE">Separado Judicialmente</option>
                          <option value="DE">Dequitado</option>
                          <option value="DI">Divorciado</option>
                          <option value="UC">União consensual</option>
                          <option value="NC">Não consta</option>
                          </select-->
                           <input type="text" id="vECp" name="vECp"  class="form-control "  >
                          </div>
                          </div>


                          <!--div class="col-sm-6">
                          <label class="col-md-4 control-form">Parentesco:</label>
                          <div class="col-md-8">
                          <select  id="setParentescoAvos2" name="setParentescoAvos2" class="form-control" >
                          <option>Selecione</option>
                          <option value="MA">Materno</option>
                          <option value="PA">Paterno</option>

                          </select>
                          </div>
                          </div-->
                          <!-- Text input-->




                          <div class="col-sm-6">
                          <label class="col-md-5 control-form" for="dataPai">Data de Nascimento*:</label>
                          <div class="col-sm-7" >
                          <input id="dataPai" name="dataPai" type="date" class="form-control  input-md" =""  >
                          </div>
                          </div>

                          <div class="col-sm-6">
                          <label class="col-md-4 control-form" for="strProfissaoPai">Profissão*:</label>
                          <div class="col-md-8" >
                          <input id="strProfissaoPai" name="strProfissaoPai" type="text" class="form-control  input-md"  >

                          </div>
                          </div>

</div>
                          <!-- Text input-->

                          <!--div class="col-sm-6" >
                                 <label class="col-md-4 control-form">Tipo de Documento*:</label>
                          <div class="col-sm-8">
                          <select  id="setTipoDocumentoPai" name="setTipoDocumentoPai" class="form-control " ="">

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



                          </div>
                                                                   

  <hr>
  <div class="maispai">
  <div class=" row clearfix" style="margin-left: 10px">
  <!-- Locais / Pesquisar no banco de dados-->
  <div class="col-sm-8" >
                    <div class="form-group">

                    <label class="col-md-2 control-form" for="strEnderecoPai">Endereço:</label>
                        <div class="col-md-8" >  <div class="form-line">
                        <input type="text" id="strEnderecoPai" name="strEnderecoPai" class="form-control input-md" placeholder="Local de Nascimento"   />
                        </div>
                        </div>

                    </div>
  </div>

                    <!--div class="col-sm-4" >
                          <div class="form-group">

                          <label class="col-md-2 control-form" for="strNdaCasaPai">N°:</label>
                              <div class="col-md-6" >  <div class="form-line">
                              <input type="text" id="strNdaCasaPai" name="strNdaCasaPai" class="form-control input-md" placeholder="Numero"   />
                              </div>
                              </div>

                          </div>
                    </div-->

  </div>
  <div class="row clearfix" style="margin-left: 10px">
        <div class="col-sm-6" >
                  <div class="form-group">

                  <label class="col-md-3 control-form" for="strBairroPai">Bairro:</label>
                      <div class="col-md-6" >  <div class="form-line">
                      <input type="text" id="strBairroPai" name="strBairroPai" class="form-control input-md" placeholder=""    />
                      </div>
                      </div>

                  </div>
        </div>

     
  </div>


  <div class="row clearfix" style="margin-left: 10px">
        <div class="col-sm-6" >
                  <div class="form-group">
                    <!-- Cidade / Pesquisar no banco de dados-->

                  <label class="col-md-3 control-form" for="strCidadePai">Cidade:</label>
                      <div class="col-md-6" >  <div class="form-line">
                      <input type="text" id="strCidadePai" name="strCidadePai" class="form-control input-md" placeholder=""    />
                      </div>
                      </div>

                  </div>
        </div>

        
  </div>
</div>
<legend><i class="material-icons">person</i> AVÓS MATERNOS</legend>
<div class="row">    
    <div class="col-sm-10">
                        <label style="margin-left: -63px" class="col-md-2 control-label" for="strNomeAvos1a">Avô:</label>
                        <div class="col-md-10" >  <div class="form-line">
                        <input type="text" id="strNomeAvos1a" name="strNomeAvos1a" class="form-control   input-md" placeholder="Digite o nome" >
                        </div>
                        </div>
                        </div>

                          <div class="col-sm-10">
                          <label style="margin-left: -63px" class="col-md-2 control-label" for="strNomeAvos1b">Avó:</label>
                          <div class="col-md-10" >  <div class="form-line">
                          <input type="text" id="strNomeAvos1b" name="strNomeAvos1b" class="form-control   input-md" placeholder="Digite o nome" >
                          </div>
                          </div>
                          </div>
</div>
<legend><i class="material-icons">person</i> AVÓS PATERNOS</legend>                          
     <div class="col-sm-10">
                        <label style="margin-left: -63px" class="col-md-2 control-label" for="strNomeAvos2a">Avô:</label>
                        <div class="col-md-10" >  <div class="form-line">
                        <input type="text" id="strNomeAvos2a" name="strNomeAvos2a" class="form-control   input-md" placeholder="Digite o nome" >
                        </div>
                        </div>
                        </div>
   <div class="col-sm-10">
                          <label style="margin-left: -63px" class="col-md-2 control-label" for="strNomeAvos2b">Avó:</label>
                          <div class="col-md-10" >  <div class="form-line">
                          <input type="text" id="strNomeAvos2b" name="strNomeAvos2b" class="form-control   input-md" placeholder="Digite o nome" >
                          </div>
                          </div>
                          </div>

    </div>
</div>
    <legend><i class="material-icons">person</i>Testemunha 1</legend>
<div class="row">    
   <div class="col-md-12" >
                <label   class="col-md-1 control-form" for="strNomeTestemunhas1" >Nome:</label>
                <div class="col-md-8">
                <input type="text" id="strNomeTestemunhas1" name="strNomeTestemunhas1" class="form-control naopreencher input-md" placeholder="Digite o nome" ="" />
                </div>
                </div>
<div class="col-sm-6" >
                <label   class="col-md-4 control-form" for="strNaturalidadeTestemunhas1">Naturalidade*:</label>
                <div class="col-md-7">
                <input id="strNaturalidadeTestemunhas1" name="strNaturalidadeTestemunhas1" type="text" class="form-control naopreencher input-md" ="">

                </div>
                </div>
 <div class="col-sm-6" >
                <div class="form-group">

                <label class="col-md-2 control-form" for="strEnderecoTestemunhas1">Endereço:</label>
                <div class="col-md-8" >  <div class="form-line">
                <input type="text" id="strEnderecoTestemunhas1" name="strEnderecoTestemunhas1" class="form-control naopreencher input-md" placeholder="Rua, nº" />
                </div>
                </div>

                </div>
                </div>


                 <div class="col-sm-6" >
            

                <label class="col-md-4 control-form" for="strEnderecoTestemunhas2">Bairro:</label>
                <div class="col-md-8" >  
                <input type="text" id="strBairroTestemunhas1" name="strBairroTestemunhas1" class="form-control naopreencher input-md" placeholder="Rua, nº" />
             
            

                </div>
                </div>

                 <div class="col-sm-6" >
                <div class="form-group">

                <label class="col-md-2 control-form" for="strEnderecoTestemunhas1">Cidade:</label>
                <div class="col-md-8" >  <div class="form-line">
                <input type="text" id="strCidadeTestemunhas1" name="strCidadeTestemunhas1" class="form-control naopreencher input-md" placeholder="" />
                </div>
                </div>

                </div>
                </div>
                 <div class="col-sm-6" >
             

                <label class="col-md-4 control-form" for="strEnderecoTestemunhas1">CPF:</label>
                <div class="col-md-8" >  <div class="form-line">
                <input type="text" id="strCpfTestemunhas1" name="strCpfTestemunhas1" class="form-control cpf input-md" placeholder="" />
                </div>
          </div> 
</div>
</div>
    <legend><i class="material-icons">person</i>Testemunha 2</legend>

          <div class="row">    
   <div class="col-md-12" >
                <label   class="col-md-1 control-form" for="strNomeTestemunhas1" >Nome:</label>
                <div class="col-md-8">
                <input type="text" id="strNomeTestemunhas2" name="strNomeTestemunhas2" class="form-control naopreencher input-md" placeholder="Digite o nome" ="" />
                </div>
                </div>
<div class="col-sm-6" >
                <label   class="col-md-4 control-form" for="strNaturalidadeTestemunhas2">Naturalidade*:</label>
                <div class="col-md-7">
                <input id="strNaturalidadeTestemunhas2" name="strNaturalidadeTestemunhas2" type="text" class="form-control naopreencher input-md" ="">

                </div>
                </div>
 <div class="col-sm-6" >
                <div class="form-group">

                <label class="col-md-2 control-form" for="strEnderecoTestemunhas2">Endereço:</label>
                <div class="col-md-8" >  <div class="form-line">
                <input type="text" id="strEnderecoTestemunhas2" name="strEnderecoTestemunhas2" class="form-control naopreencher input-md" placeholder="Rua, nº" />
                </div>
                </div>

                </div>
                </div>

 <div class="col-sm-6" >
              

                <label class="col-md-4 control-form" for="strEnderecoTestemunhas2">Bairro:</label>
                <div class="col-md-8" >  <div class="form-line">
                <input type="text" id="strBairroTestemunhas2" name="strBairroTestemunhas2" class="form-control naopreencher input-md" placeholder="Rua, nº" />
              
                </div>

                </div>
                </div>

                 <div class="col-sm-6" >
                <div class="form-group">

                <label class="col-md-2 control-form" for="strEnderecoTestemunhas2">Cidade:</label>
                <div class="col-md-8" >  <div class="form-line">
                <input type="text" id="strCidadeTestemunhas2" name="strCidadeTestemunhas2" class="form-control naopreencher input-md" placeholder="" />
                </div>
                </div>

                </div>
                </div>

                 <div class="col-sm-6" >
             

                <label class="col-md-4 control-form" for="strEnderecoTestemunhas2">CPF:</label>
                <div class="col-md-8" >  <div class="form-line">
                <input type="text" id="strCpfTestemunhas2" name="strCpfTestemunhas2" class="form-control cpf input-md" placeholder="" />
                </div>
          </div> 

                </div>
                </div>


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






    <!-- Jquery Core Js necessario para funcionar o fullscreen-->
<script src="../../plugins/ajax/screen.js"></script>

<!-- Jquery Core Js -->
<script src="../../plugins/jquery/jquery.min.js"></script>

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
$('#canc').hide();
camposmedicos();
});


$('.').dblclick(function(){
alert('O CADASTRO DE NOVAS PESSOAS DEVE SER FEITO CLICANDO EM "CADASTRAR PESSOA" E AS PARTES INSERIDAS EM TEMPO REAL ATRAVÉS DOS BOTÕES "BUSCAR NOS REGISTROS" ')
});

</script>

<script>
/*
document.onkeyup = function(e) {
if (e.which == 37) {
// window.open("cartorio-notas.php");
window.location = "../../index.php";
}

};
*/
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
    $(".dnv").inputmask("99-99999999-9");
$("#form1").validate();
$("#form2").validate();
$("#form3").validate();
$("#form4").validate();
$("#form5").validate();
$("#form6").validate();

$('.rogo').hide();
showCustomer2();

$('.naopreencher').prop( "", true );
$('.nascordemjud').hide();
$('.oj').hide();


$('#setGemeos').change(function(){

if ($(this).val() == 'S') {
  $('#divmatriculagemeos').show();
  $('#strNomeMatriculaGemeos').prop( "", true );
}

else{
  $('#divmatriculagemeos').hide();
  $('#strNomeMatriculaGemeos').prop( "", false );}

});

});
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
<?php include('modais-nascimento.php'); ?>


<input type="hidden" id="tipomodal" name="">
<input type="hidden" id="tipomodalPessoa" name="">

<script src="nascimento.js"></script>




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
<input name="image" type="file" id="upload" class="hidden" onchange="">
<?php include('modais/modais-pesquisa-selo.php') ?>
</body>

</html>
