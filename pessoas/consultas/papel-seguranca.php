<?php

include('../controller/db_functions.php');
$pdo = conectar();


if(isset($_POST["tipo"]) && !empty($_POST["tipo"]) && isset($_POST["numpapel"]) && !empty($_POST["numpapel"])   ){
    //Get all state data
$tipo = $_POST['tipo'];
$numpapel = $_POST['numpapel'];    


    $consulta = $pdo->prepare("SELECT * FROM folhaseguranca WHERE EMPRESA = '$tipo' and PAPEL = '$numpapel' ");
    $consulta->execute();
    $valor = $consulta->fetch(PDO::FETCH_ASSOC);

    //Count total number of rows
    $num_rows = $valor['STATUS'];
   

    if ($consulta->rowCount() == 0){
        die('<div class="alert bg-red " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> Não Encontrado !!!</span>
            </div>

            <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $("#resultado").fadeTo(5000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 4000);
                 </script>

            ');
    }

       elseif ($num_rows == 'U'){
        die('<div class="alert bg-red " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> Folha Não disponível, tente outro !!!</span>
            </div>

            <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $("#resultado").fadeTo(5000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 4000);
                 </script>

            ');
    }

    else{

         die('<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-text-top">verified_user</i>
            <span>Tudo certo !!! Folha Encontrada</span>
            </div>

            <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $("#resultado").fadeTo(5000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 4000);
                 </script>
            ');
    }

    

}




if (isset($_POST['livroconsultanascimento']) && isset($_POST['folhaconsultanascimento']) && !empty($_POST['livroconsultanascimento']) && !empty($_POST['folhaconsultanascimento'])) {

$livro = $_POST['livroconsultanascimento'];
$folha = $_POST['folhaconsultanascimento'];
$termo = $_POST['termoconsultanascimento'];

$consulta = $pdo->prepare("SELECT * FROM registro_nascimento_novo where LIVRONASCIMENTO = '$livro' and FOLHANASCIMENTO = '$folha'  and TERMONASCIMENTO = '$termo'");
$consulta->execute();
if ($consulta->rowCount()>0) {
 die('<div class="alert bg-red " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> Livro, folha e termo ja cadastrados anteriormente fique atento!!!</span>
            </div>

            <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $("#resultado").fadeTo(5000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 4000);
                 </script>

            ');
}


}



if (isset($_POST['livroconsultacasamento']) && isset($_POST['folhaconsultacasamento']) && !empty($_POST['livroconsultacasamento']) && !empty($_POST['folhaconsultacasamento'])) {

$livro = $_POST['livroconsultacasamento'];
$folha = $_POST['folhaconsultacasamento'];
$termo = $_POST['termoconsultacasamento'];

$consulta = $pdo->prepare("SELECT * FROM registro_casamento_novo where LIVROCASAMENTO = '$livro' and FOLHACASAMENTO = '$folha'  and TERMOCASAMENTO = '$termo'");
$consulta->execute();
if ($consulta->rowCount()>0) {
 die('<div class="alert bg-red " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> Livro, folha e termo ja cadastrados anteriormente fique atento!!!</span>
            </div>

            <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $("#resultado").fadeTo(5000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 4000);
                 </script>

            ');
}


}



if (isset($_POST['livroconsultaobito']) && isset($_POST['folhaconsultaobito']) && !empty($_POST['livroconsultaobito']) && !empty($_POST['folhaconsultaobito'])) {

$livro = $_POST['livroconsultaobito'];
$folha = $_POST['folhaconsultaobito'];
$termo = $_POST['termoconsultaobito'];

$consulta = $pdo->prepare("SELECT * FROM registro_obito_novo where LIVROOBITO = '$livro' and FOLHAOBITO = '$folha'  and TERMOOBITO = '$termo'");
$consulta->execute();
if ($consulta->rowCount()>0) {
 die('<div class="alert bg-red " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> Livro, folha e termo ja cadastrados anteriormente fique atento!!!</span>
            </div>

            <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $("#resultado").fadeTo(5000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 4000);
                 </script>

            ');
}


}



?>
