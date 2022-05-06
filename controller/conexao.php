<?php

function conectar(){
 
try{

$pdo = new PDO("mysql:host=localhost;dbname=bookc", "root","");
	//$pdo->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
	$pdo->exec("SET CHARACTER SET utf8");

}

catch (PDOException $e) {

//echo '<pre>'.$e->getMessage().'</pre>';
}

return $pdo;
}



define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'bookc');
define('DB_PORT', '3306');
define('DB_CHARSET', 'utf8mb4');

 
define('DB_NAME_2', 'bookc_auditoria');


function conexao_logs(){

    try{
    $pdo = new PDO("mysql:host=" . DB_SERVER . ";charset=utf8;port=" . DB_PORT . ";dbname=" . DB_NAME_2, DB_USERNAME, DB_PASSWORD);
        // Set the PDO error mode to exception
       $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
        die("ERROR: Could not connect. " . $e->getMessage());
    }
    
    return $pdo;
    }




 ?>
