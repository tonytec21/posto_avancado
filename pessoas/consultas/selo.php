<?php

include('../controller/db_functions.php');
$pdo = conectar();


if(isset($_POST["seloCodigo"]) && !empty($_POST["seloCodigo"])){
    //Get all state data

    $consulta = $pdo->prepare("SELECT * FROM selo_fisico_uso WHERE selo = ".$_POST['seloCodigo']." AND status = 'U'  ");
    $consulta->execute();
    $valor = $consulta->fetch(PDO::FETCH_ASSOC);

    //Count total number of rows
    $num_rows = $consulta->rowCount();

    //Display states list
  //  if($num_rows > 0){
      //  echo '<option value="">Selecionar qualidade da parte</option>';
    //    while($valor = $consulta->fetch(PDO::FETCH_ASSOC)){
          //  echo '<option value="'.$valor['idCodAtoCesdi'].'">'.$valor['Qualidade'].'</option>';
    //    }
  //  }else{
  //      echo '<option value="">Nao avaliado</option>';
  //  }

    if ($num_rows>0){
        die('<div class="alert bg-red " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> Não é possivel utilizar este Selo. Tente outro !!!</span>
            </div>

            <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(5000, 0).slideUp(500, function(){
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
            <span>Tudo certo !!! Selo disponivel</span>
            </div>

            <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(5000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 4000);
                 </script>
            ');

    }

}

?>
