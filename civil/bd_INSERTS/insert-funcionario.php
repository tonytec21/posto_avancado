<?php 
session_start();
include('../../../controller/db_functions.php'); 
$tirar = array("-","/","_",".");
$funcionario = str_replace($tirar, '', $_POST['strUsuario']);

if (isset($_FILES['imgAssinatura']) && $_FILES['imgAssinatura']!='') {

#RECEBENDO E GUARDANDO A IMAGEM DA ASSINATURA DO :
$extensao = strtolower(substr($_FILES['imgAssinatura']['name'], -4));
	$tipo = strtolower($_FILES['imgAssinatura']['type']);
	$nome = strtolower(($_FILES['imgAssinatura']['name']));
	$novo_nome = $funcionario.'.png';	
	$diretorio = "assinaturas/";
move_uploaded_file($_FILES['imgAssinatura']['tmp_name'], $diretorio.$novo_nome);
$foto = $diretorio.$novo_nome;
$_POST['imgAssinatura'] = $foto;
//unset($_POST['imgAssinaturaTitular']);
}

else{$_POST['imgAssinatura'] ='NULL';}

echo '<img src="$foto">';

if ($_POST['strConfirmaSenha'] != $_POST['strSenha']) {
	header('location:../cadastro-funcionario.php');
	$_SESSION['erro'] = "OS CAMPOS SENHA E CONFIRMAÇÃO DE SENHA DEVEM SER IGUAIS ";
}

else{
$vowels = array("-",".");
$_POST['strUsuario'] = str_replace($vowels, "", $_POST['strUsuario']);
if (isset($_POST['subimit'])) {
unset($_POST['subimit']);
unset($_POST['strConfirmaSenha']);
INSERT_POST('funcionario',$_POST);	
header('location:../cadastro-funcionario.php');

}

}








 ?>