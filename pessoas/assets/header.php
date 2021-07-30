<!DOCTYPE html>
<html lang="pt_BR">

<head>
<?php header ('Content-type: text/html; charset=UTF-8'); ?>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
  <link rel="icon" type="image/png" href="../assets/img/logo_nova.png">
  <title>
    PESSOAS
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
  

<script src="../assets/plugins/ajax/jquery.min.js"></script>
<link href="../assets/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css" rel="stylesheet">

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