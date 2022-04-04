<?php

include('../../../controller/db_functions.php');
$pdo = conectar();


if(isset($_POST["seloCodigo"]) && !empty($_POST["seloCodigo"])){
    //Get all state data
$selo = $_POST['seloCodigo'];  


    $consulta = $pdo->prepare("SELECT * FROM selo_fisico_uso WHERE selo = $selo and tipo = 'GER' ");
    $consulta->execute();
    $valor = $consulta->fetch(PDO::FETCH_ASSOC);
    $cartela = $valor['strCartela'];
    $busca_selo_ant = $pdo->prepare("SELECT * from selo_fisico_uso where selo < $selo and tipo = 'GER'  and status = 'L' and strCartela = $cartela ");
    $busca_selo_ant->execute();

    //Count total number of rows
    $num_rows = $valor['status'];
    $tipo = $valor['tipo'];

    if ($consulta->rowCount() == 0){
        die('<div class="alert bg-red " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> Não Encontrado !!!</span>
            </div>

        

            ');
    }

       if ($num_rows == 'U' || $tipo !='GER'){
        die('<div class="alert bg-red " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> Selo Não disponível, tente outro !!!</span>
            </div>

        

            ');
    }

    if ($busca_selo_ant -> rowCount() != 0){
        die('<div class="alert bg-amber " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> Existem Selos anteriores a este e nesta cartela que não foram usados !!! <b style="color:green">(O SELO ESTÁ LIVRE)</b></span>
            </div>

        

            ');
    }

    else{
        die('<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-text-top">verified_user</i>
            <span>Tudo certo !!! Selo disponivel</span>
            </div>

        
            ');

    }

}

if (isset($_POST['seloGratuito'])) {
$selo = $_POST['seloGratuito'];  


    $consulta = $pdo->prepare("SELECT * FROM selo_fisico_uso WHERE selo = $selo and tipo = 'GRA' ");
    $consulta->execute();
    $valor = $consulta->fetch(PDO::FETCH_ASSOC);
    $cartela = $valor['strCartela'];
    $busca_selo_ant = $pdo->prepare("SELECT * from selo_fisico_uso where selo < $selo and tipo = 'GRA'  and status = 'L' and strCartela = $cartela ");
    $busca_selo_ant->execute();

    //Count total number of rows
    $num_rows = $valor['status'];
    $tipo = $valor['tipo'];

    if ($consulta->rowCount() == 0){
        die('<div class="alert bg-red " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> Não Encontrado !!!</span>
            </div>

        

            ');
    }

       if ($num_rows == 'U' || $tipo !='GRA'){
        die('<div class="alert bg-red " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> Selo Não disponível, tente outro !!!</span>
            </div>

        

            ');
    }

    if ($busca_selo_ant -> rowCount() != 0){
        die('<div class="alert bg-amber " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> Existem Selos anteriores a este e nesta cartela que não foram usados !!! <b style="color:green">(O SELO ESTÁ LIVRE)</b></span>
            </div>

        

            ');
    }

    else{
        die('<div class="alert alert-success" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-text-top">verified_user</i>
            <span>Tudo certo !!! Selo disponivel</span>
            </div>

        
            ');

    }

}

?>
