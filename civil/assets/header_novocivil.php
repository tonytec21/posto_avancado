<!DOCTYPE html>
<html lang="pt_BR">

<head>
  <?php 
header("location: ../../civil_v2/index.php"); 
?>
<?php header ('Content-type: text/html; charset=UTF-8'); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo_nova.png">
  <title>
    REGISTRO CIVIL
  </title>
  <!--     Fonts and icons  
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
  <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">    -->
  <!-- Nucleo Icons -->
  <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
  <!-- Font Awesome Icons -->
  <link href="../assets/css/font-awesome.css" rel="stylesheet" />
  <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />

  <!-- <link href="http://localhost:8081/sistemas/pagina/assets/css/style.css" rel="stylesheet" /> -->
  <!-- CSS Files -->
  <link href="../assets/css/argon-design-system.css?v=1.2.0" rel="stylesheet" />
  <script src="../assets/plugins/ajax/ajax.min.js"></script>
  <link href="../assets/plugins/icon/icon.css" rel="stylesheet" type="text/css">

<script src="../assets/plugins/ajax/jquery.min.js"></script>
<link href="../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

<style>
  /* ===== Scrollbar CSS ===== */
  /* Firefox */
  * {
    scrollbar-width: auto;
    scrollbar-color: #979597 #ffffff;
  }

  /* Chrome, Edge, and Safari */
  *::-webkit-scrollbar {
    width: 20px;
  }

  *::-webkit-scrollbar-track {
    background: #f4f5f7;    /* cor do fundo da barra */
  }

  *::-webkit-scrollbar-thumb {
    /* background-color: #133985;    cora da barra */
    background: linear-gradient(45deg, #3394d4, #daf0ff);

    border-radius: 50px;   
    border: 4px solid #f4f5f7;   /* espessura da barra e cor da borda */
  }
  </style>

<style>

.btn{
  font-size:12px !important;
}

</style>

</head>

<?php 
if (empty($_SESSION['id']) && empty($_SESSION['nome'])) {
$_SESSION['msg'] = "<div class='alert alert-info' role='alert' id='response'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
    &times;</span></button>
    Área restrita
    </div>";
    header("location:http://".$_SERVER['HTTP_HOST']."/sistema/index.php");
}

 ?>


    <script type="text/javascript">
    $(document).ready(function(){
    $('.formconsultaregistro').hide();       

    }); 
    </script>

    <!-- NASCIMENTO ------------------------------------------------------>
      <div class="modal fade  " id="oquedeseja" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content "  style="background: rgba(97, 137, 201, .9);border-radius: 10px;">
            <div class="alert alert-dismissible" role="alert" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="text-center"> NASCIMENTO - O QUE DESEJA FAZER?</h4><br>
            <div class="row">

            <div class="col-sm-12"><a style="border-radius: 10px; color: rgba(27, 53, 125,.8);font-size: 14px; font-weight: bold; padding: 1%;" class="btn bg-white col-sm-12" onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/civil/bd_INSERTS/insert-nascimento.php'?>'">
            <i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">library_books</i><i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">fiber_new</i><br>
            INSERIR NOVO REGISTRO 
            </a>
            </div>  
            <div class="col-sm-12"><br><a style="border-radius: 10px; color: rgba(27, 53, 125,.8);font-size: 14px; font-weight: bold; padding: 1%;" class="btn bg-white col-sm-12" onclick="$('.formconsultaregistro').show()">
            <i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">library_books</i><i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">folder</i><br>
            CADASTRAR DADOS DO ACERVO FÍSICO 
            </a>
            </div>    

            </div>
            <br>
            <div class="row formconsultaregistro">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">    
            <input type="number" class="form-control" id="LIVROCONSULTA" placeholder="Digite o Livro"><br>
            <input type="number" class="form-control" id="FOLHACONSULTA" placeholder="Digite a Folha"><br>
            <input type="number" class="form-control" id="TERMOCONSULTA" placeholder="Digite o Termo"><br>
            <button class="btn bg-primary col-md-12" id="verificaconsulta"><i class="material-icons" >search</i>VERIFICAR</button>
            <div class="col-md-12" id="resultadoconsulta"></div>
            </div>
            <script type="text/javascript">
            $("#verificaconsulta").click(function (e) {
            var livro = $('#LIVROCONSULTA').val();
            var folha = $('#FOLHACONSULTA').val();
            var termo = $('#TERMOCONSULTA').val();
            $.post('nascimento-tempo-real.php', {'LIVRONASCIMENTO':livro, 'FOLHANASCIMENTO':folha, 'TERMONASCIMENTO':termo}, function(data) {
            if (data == 0) {
            window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/civil/bd_INSERTS/insert-nascimento.php?acervo=ok'?>';
            }
            else{
            $("#resultadoconsulta").html(data);
            }
            });
            });
            </script>
            </div>
            </div>
            </div>
            </div>
      </div>
    <!-- NASCIMENTO ------------------------------------------------------>



    <!-- CASAMENTO ------------------------------------------------------>
      <div class="modal fade  " id="oquedesejacas" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content "  style="background: rgba(97, 137, 201, .9);border-radius: 10px;">
            <div class="alert alert-dismissible" role="alert" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="text-center"> CASAMENTO - O QUE DESEJA FAZER?</h4><br>
            <div class="row">

            <div class="col-sm-12"><a style="border-radius: 10px; color: rgba(27, 53, 125,.8);font-size: 14px; font-weight: bold; padding: 1%;" class="btn bg-white col-sm-12" onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/civil/bd_INSERTS/insert-casamento.php'?>'">
            <i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">library_books</i><i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">fiber_new</i><br>
            INSERIR NOVO REGISTRO 
            </a>
            </div>  
            <div class="col-sm-12"><br><a style="border-radius: 10px; color: rgba(27, 53, 125,.8);font-size: 14px; font-weight: bold; padding: 1%;" class="btn bg-white col-sm-12" onclick="$('.formconsultaregistro').show()">
            <i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">library_books</i><i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">folder</i><br>
            CADASTRAR DADOS DO ACERVO FÍSICO 
            </a>
            </div>    

            </div>
            <br>
            <div class="row formconsultaregistro">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">    
            <input type="number" class="form-control" id="LIVROCONSULTAcas" placeholder="Digite o Livro"><br>
            <input type="number" class="form-control" id="FOLHACONSULTAcas" placeholder="Digite a Folha"><br>
            <input type="number" class="form-control" id="TERMOCONSULTAcas" placeholder="Digite o Termo"><br>
            <select class="form-control" id="TIPOLIVROcas" >
            <option value="">SELECIONE O LIVRO</option>
            <option value="2">LIVRO B</option><option value="3">LIVRO B AUXILIAR</option>

            </select>
            <br><br>
            <button class="btn bg-primary col-md-12" id="verificaconsultacas"><i class="material-icons" >search</i>VERIFICAR</button>
            <div class="col-md-12" id="resultadoconsultacas"></div>
            </div>
            <script type="text/javascript">
            $("#verificaconsultacas").click(function (e) {
            var livro = $('#LIVROCONSULTAcas').val();
            var folha = $('#FOLHACONSULTAcas').val();
            var termo = $('#TERMOCONSULTAcas').val();
            var tipolivro = $('#TIPOLIVROcas').val();
            $.post('casamento-tempo-real.php', {'LIVROCASAMENTO':livro, 'FOLHACASAMENTO':folha, 'TERMOCASAMENTO':termo, 'TIPOLIVRO':tipolivro}, function(datacas) {
            if (datacas == 0) {
            window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/civil/bd_INSERTS/insert-casamento.php?acervo=ok'?>';
            }
            else{
            $("#resultadoconsultacas").html(datacas);
            }
            });
            });
            </script>
            </div>
            </div>
            </div>
            </div>
      </div>
    <!-- CASAMENTO ------------------------------------------------------>



    <!-- OBITO ------------------------------------------------------>
      <div class="modal fade  " id="oquedesejaobt" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content "  style="background: rgba(97, 137, 201, .9);border-radius: 10px;">
            <div class="alert alert-dismissible" role="alert" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="text-center"> ÓBITO - O QUE DESEJA FAZER?</h4><br>
            <div class="row">

            <div class="col-sm-12"><a style="border-radius: 10px; color: rgba(27, 53, 125,.8);font-size: 14px; font-weight: bold; padding: 1%;" class="btn bg-white col-sm-12" onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/civil/bd_INSERTS/insert-obito.php'?>'">
            <i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">library_books</i><i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">fiber_new</i><br>
            INSERIR NOVO REGISTRO 
            </a>
            </div>  
            <div class="col-sm-12"><br><a style="border-radius: 10px; color: rgba(27, 53, 125,.8);font-size: 14px; font-weight: bold; padding: 1%;" class="btn bg-white col-sm-12" onclick="$('.formconsultaregistro').show()">
            <i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">library_books</i><i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">folder</i><br>
            CADASTRAR DADOS DO ACERVO FÍSICO 
            </a>
            </div>    

            </div>
            <br>
            <div class="row formconsultaregistro">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">    
            <input type="number" class="form-control" id="LIVROCONSULTAobt" placeholder="Digite o Livro"><br>
            <input type="number" class="form-control" id="FOLHACONSULTAobt" placeholder="Digite a Folha"><br>
            <input type="number" class="form-control" id="TERMOCONSULTAobt" placeholder="Digite o Termo"><br>
            <select class="form-control" id="TIPOLIVROobt" >
            <option value="">SELECIONE O LIVRO</option>
            <option value="4">LIVRO C</option><option value="5">LIVRO C AUXILIAR</option>

            </select>
            <br><br>
            <button class="btn bg-primary col-md-12" id="verificaconsultaobt"><i class="material-icons" >search</i>VERIFICAR</button>
            <div class="col-md-12" id="resultadoconsultaobt"></div>
            </div>
            <script type="text/javascript">
            $("#verificaconsultaobt").click(function (e) {
            var livro = $('#LIVROCONSULTAobt').val();
            var folha = $('#FOLHACONSULTAobt').val();
            var termo = $('#TERMOCONSULTAobt').val();
            var tipolivro = $('#TIPOLIVROobt').val();
            $.post('obito-tempo-real.php', {'LIVROOBITO':livro, 'FOLHAOBITO':folha, 'TERMOOBITO':termo, 'TIPOLIVRO':tipolivro}, function(dataobt) {
            if (dataobt == 0) {   
            window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/civil/bd_INSERTS/insert-obito.php?acervo=ok'?>';
            }
            else{
            $("#resultadoconsultaobt").html(dataobt);   
            }
            });
            });
            </script>
            </div>
            </div>
            </div>
            </div>
      </div>
    <!-- OBITO ------------------------------------------------------>







