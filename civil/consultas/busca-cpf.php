<?php

include('../controller/db_functions.php');
$pdo = conectar();
$matricula =$_POST["matricula"];

?>
<?php
header("content-type:application/json");

$acao = filter_input(INPUT_POST, 'acao', FILTER_DEFAULT);
switch ($acao):
case 'pesquisar':
$consulta = $pdo->prepare("SELECT strNome FROM pessoa WHERE strCPFcnpj = '$matricula' ");
$consulta->execute();

$serv = $consulta->fetch(PDO::FETCH_ASSOC);
//$array_resultado = array_merge($array_1, $array_2);

    if  ($serv) :
      echo json_encode($serv);
    else:
        echo json_encode(array('erro' => 'Não encontrado'));


    endif;
    break;
endswitch;



 ?>
