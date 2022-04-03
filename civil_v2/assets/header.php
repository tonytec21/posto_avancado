<!DOCTYPE html>
<html lang="pt_BR">

<head>
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
  <link href="../assets/css/style.css" rel="stylesheet" />
  <link href="../assets/plugins/sweetalert/sweetalert.css" rel="stylesheet" />
  <!-- <link href="http://localhost:8081/sistemas/pagina/assets/css/style.css" rel="stylesheet" /> -->
  <!-- CSS Files -->
  <link href="../assets/css/argon-design-system.css?v=1.2.0" rel="stylesheet" />
  <script src="../assets/plugins/ajax/ajax.min.js"></script>
  <script src="../assets/plugins/sweetalert/sweetalert.min.js"></script>
  
  <link href="../assets/plugins/icon/icon.css" rel="stylesheet" type="text/css">


<script src="../assets/demo/demo.js"></script>
<script src="../assets/js/argon-design-system.js"></script>
<script src="../assets/js/argon-design-system.min.js"></script>

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
    background: linear-gradient(45deg, #172b4d, rgb(116 117 120));

    border-radius: 50px;   
    border: 4px solid #f4f5f7;   /* espessura da barra e cor da borda */
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


  






