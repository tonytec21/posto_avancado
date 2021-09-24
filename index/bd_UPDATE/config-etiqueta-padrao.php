<?php
include('../../controller/db_functions.php');
session_start();
$id = $_POST['id'];
if (isset($_POST['subimit_padrao'])) {
unset($_POST['subimit_padrao']);


UPDATE_CAMPO_ID('configuracao_etiqueta','LARGURA',$_POST['LARGURA'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','ALTURA',$_POST['ALTURA'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','POSICAO_VERTICAL',$_POST['POSICAO_VERTICAL'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','POSICAO_HORIZONTAL',$_POST['POSICAO_HORIZONTAL'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','MARGEM_ESQUERDA',$_POST['MARGEM_ESQUERDA'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','MARGEM_DIREITA',$_POST['MARGEM_DIREITA'],$id);
//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'CONFIGURAÇÕES DA ETIQUETA DE RECONHECIMENTO FORAM SALVAS';

}


if (isset($_POST['subimit_rec'])) {
unset($_POST['subimit_rec']);


UPDATE_CAMPO_ID('configuracao_etiqueta','LARGURA',$_POST['LARGURA'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','ALTURA',$_POST['ALTURA'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','POSICAO_VERTICAL',$_POST['POSICAO_VERTICAL'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','POSICAO_HORIZONTAL',$_POST['POSICAO_HORIZONTAL'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','MARGEM_ESQUERDA',$_POST['MARGEM_ESQUERDA'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','MARGEM_DIREITA',$_POST['MARGEM_DIREITA'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','VERTICAL_QR_CODE',$_POST['VERTICAL_QR_CODE'],$id);

//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'CONFIGURAÇÕES DA ETIQUETA PADRÃO FORAM SALVAS';

}





if (isset($_POST['subimit_aut'])) {
unset($_POST['subimit_aut']);


UPDATE_CAMPO_ID('configuracao_etiqueta','LARGURA',$_POST['LARGURA'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','ALTURA',$_POST['ALTURA'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','POSICAO_VERTICAL',$_POST['POSICAO_VERTICAL'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','POSICAO_HORIZONTAL',$_POST['POSICAO_HORIZONTAL'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','MARGEM_ESQUERDA',$_POST['MARGEM_ESQUERDA'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','MARGEM_DIREITA',$_POST['MARGEM_DIREITA'],$id);
UPDATE_CAMPO_ID('configuracao_etiqueta','VERTICAL_QR_CODE',$_POST['VERTICAL_QR_CODE'],$id);

//Volta para a pagina anterior
header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'CONFIGURAÇÕES DA ETIQUETA PADRÃO FORAM SALVAS';

}


 ?>
