<?php

function conectar(){

try{

$pdo = new PDO("mysql:host=localhost;dbname=civilsao", "root","");
	//$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$pdo->exec("SET CHARACTER SET utf8");

}

catch (PDOException $e) {

//echo '<pre>'.$e->getMessage().'</pre>';
}

return $pdo;
}


 ?>
