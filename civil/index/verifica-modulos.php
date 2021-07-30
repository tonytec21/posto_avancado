<?php 

if (!file_exists('modulos-sistema.json')) {

$arquivo = fopen("modulos-sistema.json", "w");
$r = PESQUISA_ALL('cadastroserventia'); foreach ($r as $r ):
if ($r->checkboxNotas =='S') {$checkboxNotas = 'S';	} else{$checkboxNotas = 'N';}
if ($r->checkboxImoveis =='S') {$checkboxImoveis ='S';}else{$checkboxImoveis ='N';}
if ($r->checkboxCivil =='S') {$checkboxCivil = 'S';}else{$checkboxCivil = 'N';}
if ($r->checkboxProtesto =='S') {$checkboxProtesto = 'S';} else{$checkboxProtesto = 'N';}
if ($r->checkboxTitulos =='S') {$checkboxTitulos = 'S';} else{$checkboxTitulos = 'N';}
endforeach;
$conteudo = '{"checkboxNotas":"'.$checkboxNotas.'", "checkboxImoveis":"'.$checkboxImoveis.'",  "checkboxCivil":"'.$checkboxCivil.'", "checkboxProtesto":"'.$checkboxProtesto.'" , "checkboxTitulos":"'.$checkboxTitulos.'" }';

$escrever = fwrite($arquivo, $conteudo);
$fechar = fclose($arquivo);


}

elseif (file_exists('modulos-sistema.json')) {

$arquivo = fopen("modulos-sistema.json", "w");
$r = PESQUISA_ALL('cadastroserventia'); foreach ($r as $r ):
if ($r->checkboxNotas =='S') {$checkboxNotas = 'S';	} else{$checkboxNotas = 'N';}
if ($r->checkboxImoveis =='S') {$checkboxImoveis ='S';}else{$checkboxImoveis ='N';}
if ($r->checkboxCivil =='S') {$checkboxCivil = 'S';}else{$checkboxCivil = 'N';}
if ($r->checkboxProtesto =='S') {$checkboxProtesto = 'S';} else{$checkboxProtesto = 'N';}
if ($r->checkboxTitulos =='S') {$checkboxTitulos = 'S';} else{$checkboxTitulos = 'N';}
endforeach;
$conteudo = '{"checkboxNotas":"'.$checkboxNotas.'", "checkboxImoveis":"'.$checkboxImoveis.'",  "checkboxCivil":"'.$checkboxCivil.'", "checkboxProtesto":"'.$checkboxProtesto.'" , "checkboxTitulos":"'.$checkboxTitulos.'" }';

$escrever = fwrite($arquivo, $conteudo);
$fechar = fclose($arquivo);


}


 ?>