<?php 
include('../../controller/db_functions.php');
$pdo = conectar();

$busca = $pdo->prepare("SELECT * FROM livro_nascimentos where Status = 'L' ORDER BY PaginaLivro asc");

if (isset($_POST['busca'])){
$busca->execute();
if ($busca->rowCount()<1) {
die('{"erro":"Nenhum Livro Encontrado!"}');
}
else{
$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
foreach($linhas as $b){
$livro = $b->identifcadorLivro;
$folha = $b->PaginaLivro;
$termo = $b->LivroInicial;
die('{"livro":"'.$livro.'","folha":"'.$folha.'","termo":"'.$termo.'"}');
}
}
}

if (isset($_POST['livro_consulta']) && isset($_POST['folha_consulta'])) {
$livro = $_POST['livro_consulta'];
$folha = $_POST['folha_consulta'];
$termo = $_POST['termo_consulta'];

$busca = $pdo->prepare("SELECT * FROM livro_nascimentos where identifcadorLivro = '$livro' and PaginaLivro = '$folha' and LivroInicial = '$termo' ");
$busca->execute();
$linha = $busca->fetch(PDO::FETCH_ASSOC);
if ($linha['Status'] == 'L') {
$up_folha = $pdo->prepare("UPDATE livro_nascimentos set Status = 'U' where identifcadorLivro = '$livro' and PaginaLivro = '$folha' and LivroInicial = '$termo'");
$up_folha->execute();	
die('{"sucesso":"true"}');
}
else{
die('{"erro":"folha ja utilizada"}');	
}

}




?>
