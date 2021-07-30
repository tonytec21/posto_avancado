<?php

include('../controller/db_functions.php');
$pdo = conectar();

if (isset($_POST['titulo']) && isset($_POST['valor'])) {

$titulo = $_POST['titulo'];
$valor = str_replace(".", "", $_POST['valor']);



$up_titulo = $pdo->prepare("UPDATE protesto_automatico_transacao set valor_custas_cartorio_transacao  = '$valor' where numero_protocolo_cartorio_transacao = '$titulo'");

if ($up_titulo->execute()) {
die("<script type='text/javascript'>swal('SUCESSO','CUSTAS DO TITULO ".$titulo." ADICIONADAS', 'success');</script>");
}

else{
	die("<script type='text/javascript'>swal('ERRO','NÃO FOI POSSIVEL ALTERAR CUSTAS DO TITULO', 'error');</script>");
}



}

?>



