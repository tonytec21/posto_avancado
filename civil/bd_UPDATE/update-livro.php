<?php
include('../controller/db_functions.php');
session_start();
$id = $_GET['id'];


if (empty($_POST['subimit'])) {

unset($_POST['subimit']);
$extensao = strtolower(substr($_FILES['imgCabecalho']['name'], -4));
	$tipo = strtolower($_FILES['imgCabecalho']['type']);
	$nome = strtolower(($_FILES['imgCabecalho']['name']));
	$novo_nome = $nome;
	$diretorio = "../cabecalhos/";
move_uploaded_file($_FILES['imgCabecalho']['tmp_name'], $diretorio.$novo_nome);
$foto = $diretorio.$novo_nome;
unset($_POST['imgCabecalho']);
$_POST['imgCabecalho'] = $foto;


UPDATE_CAMPO_ID('livronotas','imgCabecalho',$_POST['imgCabecalho'],$id);

UPDATE_CAMPO_ID('livronotas','setTipoLivro',$_POST['setTipoLivro'],$id);
UPDATE_CAMPO_ID('livronotas','intIdUnico',$_POST['intIdUnico'],$id);
UPDATE_CAMPO_ID('livronotas','strDescricao',$_POST['strDescricao'],$id);
UPDATE_CAMPO_ID('livronotas','strLivroInicial',$_POST['strLivroInicial'],$id);
UPDATE_CAMPO_ID('livronotas','strFolhaInicial',$_POST['strFolhaInicial'],$id);
UPDATE_CAMPO_ID('livronotas','strDescricao',$_POST['strDescricao'],$id);

//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
//$_SESSION['sucesso'] = 'FORMULÁRIO ATUALIZADO (pessoa)';

}

 ?>
