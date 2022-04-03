<?php 
include('../controller/db_functions.php'); 
$pdo = conectar();
#monta_form('registro_casamento_novo', "pessoa", "pessoa");


function prepara($tabela){

$pdo = conectar();
$DESC = $pdo->prepare("DESC $tabela");
$DESC->execute();
$linhas = $DESC->fetchAll(PDO::FETCH_OBJ);
$idnotexto = "campos_input($(this).attr('id'), '<?=$id?>')";
foreach ($linhas as $key) {
#echo'$'.$key->Field.' = $nubente->'. $key->Field.';<br>';

/*
echo '
<div class="col-lg-6">
                            <label for="country">'.$key->Field.'</label>
                            <input onblur="'.$idnotexto.'" id="'.$key->Field.'" name="'.$key->Field.'" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
';
*/


echo '$("#'.$key->Field.'").val(dados.'.$key->Field.');<br>';

}
}

prepara('registro_obito_novo');








 ?>





 

