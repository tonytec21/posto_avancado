<?php 

include('../controller/db_functions.php');session_start();
$pdo = conectar();

if ($_POST['acao']  =='liberar') {$status = 'L';}
else{$status = 'U';}


$livro = $_POST['livro'];
$folha = $_POST['folha'];
$termo = $_POST['termo'];
$tabela = $_POST['tabela'];


$bd = $pdo->prepare("UPDATE $tabela set Status = '$status' where identifcadorLivro = '$livro' and PaginaLivro = '$folha' and LivroInicial = '$termo'");
if ($bd->execute()) {
die('1');
#die('<script type="text/javascript">swal("ALTERADO COM SUCESSO", "", "success");</script>');
}
else{
die('0');
#die('<script type="text/javascript">swal("NÃO FOI POSSIVEL ALTERAR", "", "error");</script>');
}



 ?>

