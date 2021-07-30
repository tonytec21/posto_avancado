<?php
session_start();
$connection = mysqli_connect('localhost','root','','bookc');

$tables = array();
$result = mysqli_query($connection,"SHOW TABLES");
while($row = mysqli_fetch_row($result)){
  $tables[] = $row[0];
}

$return = '';
foreach($tables as $table){
  $result = mysqli_query($connection,"SELECT * FROM ".$table);
  $num_fields = mysqli_num_fields($result);
  
  $return .= 'DROP TABLE '.$table.';';
  $row2 = mysqli_fetch_row(mysqli_query($connection,"SHOW CREATE TABLE ".$table));
  $return .= "\n\n".$row2[1].";\n\n";
  
  for($i=0;$i<$num_fields;$i++){
    while($row = mysqli_fetch_row($result)){
      $return .= "INSERT INTO ".$table." VALUES(";
      for($j=0;$j<$num_fields;$j++){
        $row[$j] = addslashes($row[$j]);
        if(isset($row[$j])){ $return .= '"'.$row[$j].'"';}
        else{ $return .= '""';}
        if($j<$num_fields-1){ $return .= ',';}
      }
      $return .= ");\n";
    }
  }
  $return .= "\n\n\n";
}

//save file
$data = date('d/m/Y');
$handle = fopen("../backups/backup.sql","w+");
fwrite($handle,$return);
fclose($handle);
#echo "Successfully backed up";
$_SESSION['sucesso'] =  'UM ARQUIVO DE BACKUP FOI CRIADO EM C: BACKUPSBOOKC';

if (!file_exists('../../../../BACKUPSBOOKC')) {
mkdir('../../../../BACKUPSBOOKC/', 0777, true);
}


$diretorio='../../../../BACKUPSBOOKC/';
$zip = new ZipArchive();


// Cria o Arquivo Zip, caso não consiga exibe mensagem de erro e finaliza script
if($zip->open($diretorio.date('d-m-Y').'-backup-BOOKC.zip', ZIPARCHIVE::CREATE) == TRUE){
// Insere os arquivos que devem conter no arquivo zip
$zip->addFile('../backups/backup.sql','backup.sql');
echo 'Arquivo criado com sucesso.';
}
else{
exit('O Arquivo não pode ser criado.');
}

// Fecha arquivo Zip aberto

$zip->close();
header('Location: ' . $_SERVER['HTTP_REFERER']);

?>