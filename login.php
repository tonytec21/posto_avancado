<!DOCTYPE html>
<html>

<?php

session_start();
//include_once('controller/db_functions.php');

unset($_SESSION['sucesso']);
unset($_SESSION['erro']);



?>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>bookC - Página Inicial</title>
    <!-- Favicon-->
    <!--link rel="icon" href="favicon.ico" type="image/x-icon"-->

    <!-- Google Fonts -->



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
       <link href="plugins/icon/icon.css" rel="stylesheet" type="text/css">
    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="css/themes/all-themes.css" rel="stylesheet" />
    <style type="text/css">
        .form-control{
            text-transform: none;
        }
      .material-icons{
        color:white!important;
      }
          label{
        color:white!important;
      }
      .background{
    position:fixed;
    right: 0;
    bottom: 0;
    min-width: 100%;
    min-height: 100%;
    width: auto;
    height: auto;
    z-index: -1000;
    background-size: cover;
    opacity: .2;
}
    </style>

</head>


<body  style="background:white!important;">

<div class="container">

    <div class="row" style="">
        
        <div class="col-sm-6 card bg-blue" style="padding-bottom: 10%;padding-top: 10%" >
            
            <img src="images/logo_1.png" style="width: 80%; margin-left: 10%">
            <h3 class="text-center">SEU SISTEMA DE CARTÓRIO</h3>
            <h6 class="text-center"><a class="text-center" href="https://sistemabookcartorios.com">www.sistemabookcartorios.com</a></h6>

        </div>
        <div class="col-sm-3"></div>
        <div class="col-sm-3 card" style="padding-bottom: 10%;padding-top: 17%;background: #f7f7f2">
            <form method="POST" action="valida.php">
                    <div class="text-center" style="color: black">Entre para iniciar sua sessão</div>
                    <br><br>
                    <?php
                    if(isset($_SESSION['msg'])){
                      echo $_SESSION['msg'];
                      unset($_SESSION['msg']);
                    }
                     ?>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="color:#2196F3!important">person</i>
                        </span>
                        <div class="form-line">
                            <input type="text" class="form-control" name="usuario" placeholder="Usuário" required autofocus>

                        </div>
                    </div>
                    <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons" style="color:#2196F3!important">lock</i>
                        </span>
                        <div class="form-line">
                            <input type="password" class="form-control" name="senha" placeholder="Senha" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-8 p-t-5">
                            <input type="checkbox" name="rememberme" id="rememberme" class="filled-in chk-col-pink">
                            <label style="color:black!important" for="rememberme">Lembrar senha?</label>
                        </div>
                        <div class="col-xs-4">
                            <input class="btn btn-block bg-blue waves-effect" name="btnLogin" type="submit" value="Entrar">
                        </div>
                    </div>
              
                </form>

                
        </div>    


    </div>
</div>

<div class="col-sm-12" style=" margin-bottom: -20%; padding-top: 0.3%">
                    <p class="text-center">&copy  SISTEMA BOOKC <?=date('Y') ?> </p>
                    <p class="text-center">TODOS OS DIREITOS RESERVADOS</p>
                </div>
    
    <!-- Jquery Core Js -->
    <script src="plugins/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core Js -->
    <script src="plugins/bootstrap/js/bootstrap.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="plugins/node-waves/waves.js"></script>

    <!-- Validation Plugin Js -->
    <script src="plugins/jquery-validation/jquery.validate.js"></script>

    <!-- Custom Js -->
    <script src="js/admin.js"></script>
    <script src="js/pages/examples/sign-in.js"></script>


   <script>
   window.setTimeout(function() {
 $(".alert").fadeTo(5000, 0).slideUp(500, function(){
     $(this).remove();
 });
}, 4000);
        </script>
<video autoplay="" muted="" loop="" poster="fundo.jpg" class="background">
    <source src="back.webm" type="video/webm">
    <source src="back.mp4" type="video/mp4">
   
</video>
</body>


</html>
