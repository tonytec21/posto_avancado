<?php
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];


if (isset($_POST['subimit1'])) {
unset($_POST['subimit1']);


UPDATE_CAMPO_ID('registro_obito','strNome',$_POST['strNome'],$id);
UPDATE_CAMPO_ID('registro_obito','strMatricula',$_POST['strMatricula'],$id);
UPDATE_CAMPO_ID('registro_obito','strRG',$_POST['strRG'],$id);
UPDATE_CAMPO_ID('registro_obito','strCPF',$_POST['strCPF'],$id);
UPDATE_CAMPO_ID('registro_obito','dataNascimento',$_POST['dataNascimento'],$id);
UPDATE_CAMPO_ID('registro_obito','strNomeConjugue',$_POST['strNomeConjugue'],$id);
UPDATE_CAMPO_ID('registro_obito','setSexo',$_POST['setSexo'],$id);

UPDATE_CAMPO_ID('registro_obito','setEstadoCivil',$_POST['setEstadoCivil'],$id);
UPDATE_CAMPO_ID('registro_obito','setCor',$_POST['setCor'],$id);
UPDATE_CAMPO_ID('registro_obito','dataRegistro',$_POST['dataRegistro'],$id);
UPDATE_CAMPO_ID('registro_obito','setGestante',$_POST['setGestante'],$id);
UPDATE_CAMPO_ID('registro_obito','strGemeo',$_POST['strGemeo'],$id);
UPDATE_CAMPO_ID('registro_obito','setDeixouFilhos',$_POST['setDeixouFilhos'],$id);
UPDATE_CAMPO_ID('registro_obito','strNomeFilhos',$_POST[ 'strNomeFilhos'],$id);
UPDATE_CAMPO_ID('registro_obito','strProfissao',$_POST['strProfissao' ],$id);
UPDATE_CAMPO_ID('registro_obito','strNacionalidade',$_POST[ 'strNacionalidade'],$id);
UPDATE_CAMPO_ID('registro_obito','strNatural',$_POST[ 'strNatural' ],$id);
UPDATE_CAMPO_ID('registro_obito','setEleitor',$_POST[ 'setEleitor' ],$id);
UPDATE_CAMPO_ID('registro_obito','setDeixouBens',$_POST[ 'setDeixouBens'],$id);
UPDATE_CAMPO_ID('registro_obito','strNDO',$_POST[ 'strNDO'],$id);
UPDATE_CAMPO_ID('registro_obito','strDeclarante',$_POST[ 'strDeclarante'],$id);
UPDATE_CAMPO_ID('registro_obito','strEndereco',$_POST[ 'strEndereco'],$id);
UPDATE_CAMPO_ID('registro_obito','strCidade',$_POST[ 'strCidade'],$id);
UPDATE_CAMPO_ID('registro_obito','strPai',$_POST[ 'strPai' ],$id);
UPDATE_CAMPO_ID('registro_obito','strMae',$_POST[ 'strMae' ],$id);

$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('Location: ' . $_SERVER['HTTP_REFERER']);
}

if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);



UPDATE_CAMPO_ID('registro_obito','strEnderecoObito',$_POST['strEnderecoObito'],$id);
UPDATE_CAMPO_ID('registro_obito','strCidadeObito',$_POST['strCidadeObito'],$id);
UPDATE_CAMPO_ID('registro_obito','dataObito',$_POST['dataObito'],$id);
UPDATE_CAMPO_ID('registro_obito','horaObito',$_POST['horaObito'],$id);
UPDATE_CAMPO_ID('registro_obito','strCausaMorte',$_POST['strCausaMorte'],$id);
UPDATE_CAMPO_ID('registro_obito','strLocalSepultamento',$_POST['strLocalSepultamento'],$id);
UPDATE_CAMPO_ID('registro_obito','strMedico',$_POST['strMedico'],$id);
UPDATE_CAMPO_ID('registro_obito','strCrmMedico',$_POST['strMatricula'],$id);
UPDATE_CAMPO_ID('registro_obito','strTextoAnatocoes',$_POST['strTextoAnatocoes'],$id);


header('Location: ' . $_SERVER['HTTP_REFERER']);
$_SESSION['sucesso'] = 'FORMULÁRIO CONCLUIDO (ÓBITO)';

}







 ?>
