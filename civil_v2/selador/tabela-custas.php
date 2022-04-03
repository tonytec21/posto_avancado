<?php
###Pegando .json  PHP
$tabela_custas = file_get_contents("custas.json");

### Decode dados JSON  apara array
$tabela_custas = json_decode($tabela_custas, true);
###var_dump($tabela_custas);
### Access values from the associative array. Ex.:
###echo $tabela_custas["notas"]."<br/>";
###echo $tabela_custas["tdpj"]."<br/>";
###echo $tabela_custas["imoveis"]."<br/>";
###echo $tabela_custas["registro_civil"]."<br/>";
###echo $tabela_custas["protesto"]."<br/>";

###Comente acima do decode pr baixo, se for usar este abaixo

###Decode dados JSON  para objeto. Ex.:
###$obj = json_decode($tabela_custas);
###echo $obj->notas."<br/>";
###echo $obj->tdpj."<br/>";
###echo $obj->imoveis."<br/>";
###echo $obj->registro_civil."<br/>";
###echo $obj->protesto."<br/>";
#var_dump($obj)

?>
