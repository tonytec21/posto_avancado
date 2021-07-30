<?php
//error_reporting(0);
//ini_set(“display_errors”, 0 );
//error_reporting(E_ALL);
//ini_set(“display_errors”, 1 );d

if (!file_exists('./Remessas_Civil/IBGE/')) {
mkdir('./Remessas_Civil/IBGE/', 0777, true);
}

unlink('Remessas_Civil/IBGE/CARTINF01.TXT'); 
unlink('Remessas_Civil/IBGE/CARTINF02.TXT'); 
unlink('Remessas_Civil/IBGE/CARTINF03.TXT'); 
unlink('Remessas_Civil/IBGE/CARTINF04.TXT'); 
unlink('Remessas_Civil/IBGE/CARTINF10.TXT'); 
unlink('Remessas_Civil/IBGE/CARTINF.zip');


include('../controller/conexao.php');
$pdo = conectar();
$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];
$busca_cns = $pdo->prepare("SELECT * FROM `cadastroserventia`");
$busca_cns->execute();
$linha_cns= $busca_cns->fetchAll(PDO::FETCH_OBJ);
session_start();
$data = date('Y-m-d');
$hora = date('H:i');
$faixa_remessa = 'de '.$data_inicial.' a '.$data_final;
$funcionario = $_SESSION['nome'];
$envio_remessa = $pdo->prepare("INSERT INTO envio_remessas values(null,'$data','$hora','IBGE','$funcionario','PENDENTE','$faixa_remessa')");
$envio_remessa->execute();

foreach ($linha_cns as $s) {
$cns = $s->strCNS;
$uf = $s->UF_PESQUISA;
$mun = $s->MUN_PESQUISA;
$dist = $s->DIST_PESQUISA;
$codcar = $s->COD_CARTORIO;
}
$diretorio_pasta = 'Remessas_Civil/IBGE/'; #diretorio onde ta salvando os arquivos
$UF_PESQUISA =str_pad($uf, 2, "0", STR_PAD_LEFT);
$MUN_PESQUISA =str_pad($mun, 5, "0", STR_PAD_LEFT);
$DIST_PESQUISA =str_pad($dist, 2, "0", STR_PAD_LEFT);
$COD_CARTORIO = str_pad($codcar, 2, "0", STR_PAD_LEFT);

#-------------------------------------------------------     CARTINF01.TXT ----------------------------------------------------------
#====================================================================================================================================

$busca_matricula_nascimento = $pdo->prepare("SELECT * FROM registro_nascimento_novo WHERE DATAENTRADA >= '$data_inicial' and  DATAENTRADA <= '$data_final' and NOMENASCIDO!='' AND LIVRONASCIMENTO!='' AND NOMEMAE!='' ORDER BY TERMONASCIMENTO ASC");
$busca_matricula_nascimento->execute();
if ($busca_matricula_nascimento->rowCount() == 0) {
$txt = '';
$numeronas = $busca_matricula_nascimento->rowCount();
#campos para o arquivo de resumo:
$primeiro_registro_nascimento = 0;
$ultimo_registro_nascimento = 0;
$livro_primeiro_registro_nascimento = 0;
$filename = 'CARTINF01';

$arquivo = fopen($diretorio_pasta.$filename.'.TXT', 'a+');
$escrever = fwrite($arquivo, $txt);
fclose($arquivo);

$filename = $filename.'.txt';
}
else{
$numeronas = $busca_matricula_nascimento->rowCount(); 
$linhas = $busca_matricula_nascimento->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas as $k) {
$data = explode("-", $data_inicial);
if ($data[1] <=  3) {$TRIM_PESQUISA = 1;}
if ($data[1] >  3 && $data[1] <  7) {$TRIM_PESQUISA = 2;}
if($data[1] > 6 && $data[1] <  9){$TRIM_PESQUISA = 3;}
if($data[1] > 9){$TRIM_PESQUISA = 4;}
$data_registro = explode("-", $k->DATAENTRADA);

$txt = $UF_PESQUISA;
$txt .=$MUN_PESQUISA;
$txt .=$DIST_PESQUISA;
$txt .=$COD_CARTORIO;
$txt .=$TRIM_PESQUISA;
$txt .=str_pad(date('y', strtotime($data_final)), 2, "9", STR_PAD_LEFT);
$txt .=str_pad('A'.intval($k->LIVRONASCIMENTO), 12, " ", STR_PAD_RIGHT);
$txt .=str_pad($k->TERMONASCIMENTO, 7, "0", STR_PAD_LEFT);

#campos para o arquivo de resumo:
$primeiro_registro_nascimento = min($k->TERMONASCIMENTO,100000);
$ultimo_registro_nascimento = max($k->TERMONASCIMENTO,$numeronas);
$livro_primeiro_registro_nascimento = intval($k->LIVRONASCIMENTO);

$txt .=str_pad($data_registro[2], 2, "0", STR_PAD_LEFT);
$txt .=str_pad($data_registro[1], 2, "0", STR_PAD_LEFT);
$txt .=str_replace("-", "", date('dmY', strtotime($k->DATANASCIMENTO))) ;

if ($k->TIPOLOCALNASCIMENTO == 'UNIDADE_SAUDE') {
$txt .='1';
}
elseif ($k->TIPOLOCALNASCIMENTO == 'FORA_UNIDADE_SAUDE') {
$txt .='5';
}
else{
$txt .='9';
}
$txt .=str_pad(substr(intval($k->CIDADENASCIMENTO),0,2), 2, "9", STR_PAD_LEFT);
$txt .= str_pad(substr(intval($k->CIDADENASCIMENTO),2,5), 5, "9", STR_PAD_LEFT);
if ($k->GEMEOS == 'N') {$txt .='1';}
elseif ($k->GEMEOS == 'S'){$txt .='2';}
else{$txt .='GEMEO='.'9';}

if ($k->SEXONASCIDO == 'M') {$txt .='1';}
elseif ($k->SEXONASCIDO == 'F'){$txt .='2';}
else{$txt .='9';}
$txt .=str_pad(substr(intval($k->NATURALIDADEPAI), 0,2), 2, "9", STR_PAD_LEFT);
$txt .='999';
$txt .=str_pad(substr(intval($k->NATURALIDADEMAE), 0,2), 2, "9", STR_PAD_LEFT);
$txt .='999';
$txt .=str_pad(substr(intval($k->CIDADEMAE), 0,2), 2, "9", STR_PAD_LEFT);
$txt .=str_pad(substr(intval($k->CIDADEMAE),2,5), 5, "9", STR_PAD_LEFT);
$dataMae = $k->DATAENTRADA - $k->DATANASCIMENTOMAE; 
if (empty($k->DATANASCIMENTOMAE)) {
$dataMae = '99';
}
$txt .='999';
$txt .=$dataMae;

$repl = array(".","-");

if (empty($k->DNV)) {
if ($k->TIPOASSENTO == 'ORDEM') {
$txt .=str_pad(str_replace($repl, "", "ORDEMJUDICIAL"), 35, " ", STR_PAD_RIGHT);
}
if ($k->TIPOASSENTO == 'REGISTROT') {
$txt .=str_pad(str_replace($repl, "", "REGISTROTARDIO"), 35, " ", STR_PAD_RIGHT);
}
}
else{
$txt .=str_pad(str_replace($repl, "", $k->DNV), 35, " ", STR_PAD_RIGHT);
}


$txt.=chr(13).chr(10);
$filename = 'CARTINF01';

$arquivo = fopen($diretorio_pasta.$filename.'.TXT', 'a+');
$escrever = fwrite($arquivo, $txt);
fclose($arquivo);

$filename = $filename.'.txt';

}
//$filename = rand(5, 15);

}


/*
header('Content-disposition: attachment; filename=CARTINF01.TXT');
header('Content-type: text/plain');
readfile($diretorio_pasta.$filename);
*/


#-------------------------------------------------------     CARTINF02.TXT ----------------------------------------------------------
#====================================================================================================================================

$busca_matricula_casamento = $pdo->prepare("SELECT * FROM `registro_casamento_novo` WHERE DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final' and ANDAMENTOPROCESSO = 'HABILITADO' ORDER BY TERMOCASAMENTO ASC");
$busca_matricula_casamento->execute();
$numerocasa = $busca_matricula_casamento->rowCount(); 
if ($busca_matricula_casamento->rowCount() == 0) {
$txt = '';
//$filename = rand(5, 15);
$filename2 = 'CARTINF02';

$arquivo = fopen($diretorio_pasta.$filename2.'.TXT', 'a+');
$escrever = fwrite($arquivo, $txt);
fclose($arquivo);

$filename2 = $filename2.'.txt';
}
else{

$linhas = $busca_matricula_casamento->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas as $k) {
if ($k->DATACASAMENTO!='NULL') {
$data = explode("-", $data_inicial);
if ($data[1] <=  3) {$TRIM_PESQUISA = 1;}
if ($data[1] >  3 && $data[1] <  7) {$TRIM_PESQUISA = 2;}
if($data[1] > 6 && $data[1] <  9){$TRIM_PESQUISA = 3;}
if($data[1] > 9){$TRIM_PESQUISA = 4;}
$data_registro = explode("-", $k->DATAENTRADA);

$txt =$UF_PESQUISA;
$txt .=$MUN_PESQUISA;
$txt .=$DIST_PESQUISA;
$txt .=$COD_CARTORIO;
$txt .=$TRIM_PESQUISA;
$txt .=date('y', strtotime($data_final));
if($k->TIPOLIVRO =='2'){$letralivro = 'B';}else{$letralivro = 'BAUXILIAR';}
$txt .=str_pad($letralivro.intval($k->LIVROCASAMENTO), 12, " ", STR_PAD_RIGHT);
$txt .=str_pad($k->TERMOCASAMENTO, 7, "0", STR_PAD_LEFT);
#campos para o arquivo de resumo:
$primeiro_registro_casamento = min($k->TERMOCASAMENTO,1000);
$livro_primeiro_registro_casamento = intval($k->LIVROCASAMENTO);

$txt .=str_pad($data_registro[2], 2, "0", STR_PAD_LEFT);
$txt .=str_pad($data_registro[1], 2, "0", STR_PAD_LEFT);
$txt .=str_replace("-", "", date('dmY', strtotime($k->DATACASAMENTO))) ;
if ($k->SEXONUBENTE1 == 'M') {$txt .='1';}
else{$txt .='2';}
if ($k->SEXONUBENTE2 == 'M') {$txt .='1';}
else{$txt .='2';}

if ($k->ESTADOCIVILNUBENTE1 == 'SO') {
$txt .='1';
}
elseif ($k->ESTADOCIVILNUBENTE1 == 'VI') {
$txt .='2';
}
elseif ($k->ESTADOCIVILNUBENTE1 == 'DI') {
$txt .='3';
}
else{$txt .='9';}


if ($k->ESTADOCIVILNUBENTE2 == 'SO') {
$txt .='1';
}
elseif ($k->ESTADOCIVILNUBENTE2 == 'VI') {
$txt .='2';
}
elseif ($k->ESTADOCIVILNUBENTE2 == 'DI') {
$txt .='3';
}
else{$txt .='9';}

$txt .=str_replace("-", "", date('dmY', strtotime($k->DATANASCIMENTONUBENTE1))) ;
$txt .=str_replace("-", "", date('dmY', strtotime($k->DATANASCIMENTONUBENTE2))) ;

$natural_uf_nub1 = substr(intval($k->NATURALIDADENUBENTE1),0,2) ;
$natural_mun_nub1 = substr(intval($k->NATURALIDADENUBENTE1),2,5);
$cidade_uf_nub1 = substr(intval($k->CIDADENUBENTE1),0,2) ;
$cidade_mun_nub1 = substr(intval($k->CIDADENUBENTE1),2,5);


$natural_uf_nub2 = substr(intval($k->NATURALIDADENUBENTE2),0,2) ;
$natural_mun_nub2 = substr(intval($k->NATURALIDADENUBENTE2),2,5);
$cidade_uf_nub2 = substr(intval($k->CIDADENUBENTE2),0,2) ;
$cidade_mun_nub2 = substr(intval($k->CIDADENUBENTE2),2,5);

$txt .= $natural_uf_nub1;
$txt .=$natural_mun_nub1;
$txt .='999';

$txt .=$natural_uf_nub2;
$txt .=$natural_mun_nub2;
$txt .='999';

$txt .=$cidade_uf_nub1;
$txt .=$cidade_mun_nub1;
$txt .='999';

$txt .=$cidade_uf_nub2;
$txt .=$cidade_mun_nub2;
$txt .='999';
}

$txt.=chr(13).chr(10);

//$filename = rand(5, 15);
$filename2 = 'CARTINF02';

$arquivo = fopen($diretorio_pasta.$filename2.'.TXT', 'a+');
$escrever = fwrite($arquivo, $txt);
fclose($arquivo);

$filename2 = $filename2.'.txt';

}
}



/*
header('Content-disposition: attachment; filename=CARTINF02.TXT');
header('Content-type: text/plain');
readfile($diretorio_pasta.$filename2);
*/




#-------------------------------------------------------     CARTINF03.TXT ----------------------------------------------------------
#====================================================================================================================================

$busca_obito_comun = $pdo->prepare("SELECT * FROM registro_obito_novo where DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final' and TIPOLIVRO ='4' ORDER BY TERMOOBITO ASC ");
$busca_obito_comun->execute();
$numerobt = $busca_obito_comun->rowCount(); 
if ($busca_obito_comun->rowCount() == 0) {
$txt = '';
$filename3 = 'CARTINF03';

$arquivo = fopen($diretorio_pasta.$filename3.'.TXT', 'a+');
$escrever = fwrite($arquivo, $txt);
fclose($arquivo);

$filename3 = $filename3.'.txt';
}
else{  
$linhas = $busca_obito_comun->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas as $k) {
$data = explode("-", $data_inicial);
if ($data[1] <=  3) {$TRIM_PESQUISA = 1;}
if ($data[1] >  3 && $data[1] <  7) {$TRIM_PESQUISA = 2;}
if($data[1] > 6 && $data[1] <  9){$TRIM_PESQUISA = 3;}
if($data[1] > 9){$TRIM_PESQUISA = 4;}
$data_registro = explode("-", $k->DATAENTRADA);

$txt =$UF_PESQUISA;
$txt .=$MUN_PESQUISA;
$txt .=$DIST_PESQUISA;
$txt .=$COD_CARTORIO;
$txt .=$TRIM_PESQUISA;
$txt .=date('y', strtotime($data_final));
$txt .=str_pad('C'.intval($k->LIVROOBITO), 12, " ", STR_PAD_RIGHT);
$txt .=str_pad($k->TERMOOBITO, 7, "0", STR_PAD_LEFT);
#campos para o arquivo de resumo:
$primeiro_registro_obito = min($k->TERMOOBITO,1000);
$livro_primeiro_registro_obito = intval($k->LIVROOBITO);
$txt .=str_pad($data_registro[2], 2, "0", STR_PAD_LEFT);
$txt .=str_pad($data_registro[1], 2, "0", STR_PAD_LEFT);
$txt .=str_replace("-", "", date('dmY', strtotime($k->DATAOBITO))) ;

if ($k->TIPOMORTE == 'NAT') {
$txt .='1';
}
elseif ($k->TIPOMORTE == 'VIO') {
$txt .='2';
}
else{$txt .='9';}

#local:
if ($k->TIPOLOCALOBITO == 'HOSPITAL') {
$txt .='1';
}
elseif ($k->TIPOLOCALOBITO == 'AMBULANCIA' || $k->TIPOLOCALOBITO == 'OUTRO_SERVICO_SAUDE' || $k->TIPOLOCALOBITO == 'POSTO_SAUDE' ) {
$txt .='2';
}

elseif ($k->TIPOLOCALOBITO == 'DOMICILIO' ) {
$txt .='3';
}
elseif ($k->TIPOLOCALOBITO == 'VIA_PUBLICA' ) {
$txt .='4';
}
elseif ($k->TIPOLOCALOBITO == 'OUTROS' ) {
$txt .='5';
}
else{$txt .='9';}
$txt .=str_pad(substr(intval($k->CIDADE), 0,2),2,"9",STR_PAD_LEFT);
$txt .=str_pad(substr(intval($k->CIDADE), 2,5),5,"9",STR_PAD_LEFT);;
$txt .='999';

if ($k->SEXO == 'M') {$txt .='1';}
elseif ($k->SEXO == 'F'){$txt .='2';}
else{$txt .='9';}

if ($k->DATANASCIMENTO!='') {
$dataNas = $k->DATAENTRADA - $k->DATANASCIMENTO; 
}
else{
	$dataNas = '999';
}
#$txt .=$dataNas;
$txt .=str_pad($dataNas, 3, "0", STR_PAD_LEFT);
$txt .='4';

if ($k->ESTADOCIVIL == 'SO') {
$txt .='1';
}
elseif ($k->ESTADOCIVIL == 'CA') {
$txt .='2';
}
elseif ($k->ESTADOCIVIL == 'VI') {
$txt .='3';
}
else{$txt .='9';}

$txt .=str_pad(substr(intval($k->NATURALIDADE), 0,2),2,"9",STR_PAD_LEFT);
$txt .='999';

$repl = array(".","-");
$txt .=str_pad(str_replace($repl, "", $k->NDO), 35, " ", STR_PAD_RIGHT);

$txt.=chr(13).chr(10);
//$filename = rand(5, 15);
$filename3 = 'CARTINF03';

$arquivo = fopen($diretorio_pasta.$filename3.'.TXT', 'a+');
$escrever = fwrite($arquivo, $txt);
fclose($arquivo);

$filename3 = $filename3.'.txt';
}
}


/*
header('Content-disposition: attachment; filename=CARTINF02.TXT');
header('Content-type: text/plain');
readfile($diretorio_pasta.$filename3);
*/









#-------------------------------------------------------     CARTINF04.TXT ----------------------------------------------------------
#====================================================================================================================================

$busca_obito_fetal = $pdo->prepare("SELECT * FROM registro_obito_novo where DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final' and TIPOLIVRO='5' ORDER BY TERMOOBITO ASC");
$busca_obito_fetal->execute();
$numeronati = $busca_obito_fetal->rowCount();
if ($busca_obito_fetal->rowCount() == 0) {
$txt = '';
$filename4 = 'CARTINF04';

$arquivo = fopen($diretorio_pasta.$filename4.'.TXT', 'a+');
$escrever = fwrite($arquivo, $txt);
fclose($arquivo);

$filename4 = $filename4.'.txt';
}  
else{
$linhas = $busca_obito_fetal->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas as $k) {
$data = explode("-", $data_inicial);
if ($data[1] <=  3) {$TRIM_PESQUISA = 1;}
if ($data[1] >  3 && $data[1] <  7) {$TRIM_PESQUISA = 2;}
if($data[1] > 6 && $data[1] <  9){$TRIM_PESQUISA = 3;}
if($data[1] > 9){$TRIM_PESQUISA = 4;}
$data_registro = explode("-", $k->DATAENTRADA);

$txt =$UF_PESQUISA;
$txt .=$MUN_PESQUISA;
$txt .=$DIST_PESQUISA;
$txt .=$COD_CARTORIO;
$txt .=$TRIM_PESQUISA;
$txt .=date('y', strtotime($data_final));
$txt .=str_pad('CAUXILIAR'.intval($k->LIVROOBITO), 12, " ", STR_PAD_RIGHT);
$txt .=str_pad($k->TERMOOBITO, 7, "0", STR_PAD_LEFT);
#campos para o arquivo de resumo:
$primeiro_registro_natimorto = min($k->TERMOOBITO,1000);
$livro_primeiro_registro_natimorto = intval($k->LIVROOBITO);
$txt .=str_pad($data_registro[2], 2, "0", STR_PAD_LEFT);
$txt .=str_pad($data_registro[1], 2, "0", STR_PAD_LEFT);
$txt .='9';
$txt .='21';
$txt .=str_pad(substr($k->NATURALIDADE,2,5), 5, "9", STR_PAD_LEFT);
if ($k->GEMEO == 'N') {$txt .='1';}
elseif ($k->GEMEO == 'S'){$txt .='2';}
else{$txt .='9';}
if ($k->SEXO == 'M') {$txt .='1';}
elseif ($k->SEXO == 'F'){$txt .='2';}
else{$txt .='9';}
$txt .=str_pad(substr(intval($k->NATURALIDADEPAI), 0,2), 2, "9", STR_PAD_LEFT);
$txt .='999';
$txt .=substr(intval($k->NATURALIDADEMAE), 0,2);
$txt .='999';
$txt .=str_pad(substr(intval($k->CIDADEMAE), 0,2), 2, "9", STR_PAD_LEFT);
$txt .=str_pad(substr(intval($k->CIDADEMAE),2,5), 5, "9", STR_PAD_LEFT);
$dataMae = $k->DATAENTRADA - $k->DATANASCIMENTOMAE; 
if (empty($k->DATANASCIMENTOMAE)) {
$dataMae = '99';
}
$txt .='999';
$txt .=$dataMae;
#$txt .=str_pad(substr($k->CIDADEMAE,0,5), 5, "9", STR_PAD_LEFT);
#$txt .='999';
#$txt .='99';
if ($k->TEMPOINTRAUTERINA<=22) {
$txt .='1';
}
elseif ($k->TEMPOINTRAUTERINA >22 && $k->TEMPOINTRAUTERINA <=27) {
$txt .='2';
}
elseif ( $k->TEMPOINTRAUTERINA  > 28 && $k->TEMPOINTRAUTERINA <=31) {
$txt .='3';
}
elseif ( $k->TEMPOINTRAUTERINA  > 32 && $k->TEMPOINTRAUTERINA <=36) {
$txt .='4';
}
elseif ( $k->TEMPOINTRAUTERINA  > 37 && $k->TEMPOINTRAUTERINA <=41) {
$txt .='5';
}
elseif ( $k->TEMPOINTRAUTERINA  > 42 ) {
$txt .='6';
}

else{
$txt .='9';
}


$repl = array(".","-");
$txt .=str_pad(str_replace($repl,"", $k->NDO), 25, " ", STR_PAD_RIGHT);

$txt.=chr(13).chr(10);

//$filename = rand(5, 15);
$filename4 = 'CARTINF04';

$arquivo = fopen($diretorio_pasta.$filename4.'.TXT', 'a+');
$escrever = fwrite($arquivo, $txt);
fclose($arquivo);

$filename4 = $filename4.'.txt';


}
}

/*
header('Content-disposition: attachment; filename=CARTINF02.TXT');
header('Content-type: text/plain');
readfile($diretorio_pasta.$filename4);
*/

$txt = '';
#-------------------------------------------------------     CARTINF10.TXT ----------------------------------------------------------
#====================================================================================================================================

$busca_10_nascimentos =  $pdo->prepare("SELECT * FROM livronotas where setTipoLivro = 'NASCIMENTOS' ");
$busca_10_nascimentos->execute();
$linhas_10_nascimentos = $busca_10_nascimentos->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas_10_nascimentos as $l10n) {
$busca_interna = $pdo->prepare("SELECT * from registro_nascimento_novo where LIVRONASCIMENTO = '$l10n->intIdUnico' and DATAENTRADA >= '$data_inicial' and  DATAENTRADA <= '$data_final' and NOMENASCIDO!='' AND LIVRONASCIMENTO!='' AND NOMEMAE!=''");
$busca_interna->execute();
if ($busca_interna->rowCount()!=0) {
$linhas_interna = $busca_interna->fetchAll(PDO::FETCH_OBJ);
$max_termo = 0;
$min_termo = 0;
foreach ($linhas_interna as $lint) {	
$quantidade_registros = $busca_interna->rowCount();
$busca_max = $pdo->prepare("SELECT TERMONASCIMENTO from registro_nascimento_novo where LIVRONASCIMENTO = '$l10n->intIdUnico' and DATAENTRADA >= '$data_inicial' and  DATAENTRADA <= '$data_final' and NOMENASCIDO!='' AND LIVRONASCIMENTO!='' AND NOMEMAE!='' ORDER BY TERMONASCIMENTO DESC LIMIT 1");
$busca_max->execute();
$busca_min = $pdo->prepare("SELECT TERMONASCIMENTO from registro_nascimento_novo where LIVRONASCIMENTO = '$l10n->intIdUnico' and DATAENTRADA >= '$data_inicial' and  DATAENTRADA <= '$data_final' and NOMENASCIDO!='' AND LIVRONASCIMENTO!='' AND NOMEMAE!='' ORDER BY TERMONASCIMENTO ASC LIMIT 1");
$busca_min->execute();

$min = $busca_min->fetch(PDO::FETCH_ASSOC);
$max = $busca_max->fetch(PDO::FETCH_ASSOC);

$primeiro_registro = $min['TERMONASCIMENTO'];
$ultimo_registro = $max['TERMONASCIMENTO'];
}
}
else{
$quantidade_registros = 0;
$primeiro_registro = 0 ;
$ultimo_registro = 0;
}

$data = explode("-", $data_inicial);
if ($data[1] <=  3) {$TRIM_PESQUISA = 1;}
if ($data[1] >  3) {$TRIM_PESQUISA = 2;}
if($data[1] > 6){$TRIM_PESQUISA = 3;}
if($data[1] > 9){$TRIM_PESQUISA = 4;}
$txt .=$UF_PESQUISA;
$txt .=$MUN_PESQUISA;
$txt .=$DIST_PESQUISA;
$txt .=$COD_CARTORIO;
$txt .=$TRIM_PESQUISA;
$txt .=date('y', strtotime($data_final));
#AQUI TO PREENHENDO COM NASCIMENTO, MAS NÃO SEI SE É ASSIM ESSE MANUAL É UM LIXO!!!
$txt .=str_pad('A'.intval($l10n->intIdUnico), 12, " ", STR_PAD_RIGHT);
$txt .=str_pad($primeiro_registro, 7, "0", STR_PAD_LEFT);
$txt .=str_pad($ultimo_registro, 7, "0", STR_PAD_LEFT);
$txt .=str_pad($quantidade_registros, 5, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .='0000';
$txt .='0000';
$txt.=chr(13).chr(10);

}




$busca_10_casamentos =  $pdo->prepare("SELECT * FROM livronotas where setTipoLivro = 'CASAMENTOS' ");
$busca_10_casamentos->execute();
$linhas_10_casamentos = $busca_10_casamentos->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas_10_casamentos as $l10n) {
$busca_interna = $pdo->prepare("SELECT * from registro_casamento_novo where LIVROCASAMENTO = '$l10n->intIdUnico' and DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final' and ANDAMENTOPROCESSO = 'HABILITADO'");
$busca_interna->execute();
if ($busca_interna->rowCount()!=0) {
$linhas_interna = $busca_interna->fetchAll(PDO::FETCH_OBJ);
$max_termo1 ='';
$min_termo1 = 0;
foreach ($linhas_interna as $lint) {	
$quantidade_registros = $busca_interna->rowCount();
$busca_min = $pdo->prepare("SELECT TERMOCASAMENTO from registro_casamento_novo where LIVROCASAMENTO = '$l10n->intIdUnico' and DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final' and ANDAMENTOPROCESSO = 'HABILITADO' ORDER BY TERMOCASAMENTO ASC LIMIT 1");
$busca_min->execute();
$busca_max = $pdo->prepare("SELECT TERMOCASAMENTO from registro_casamento_novo where LIVROCASAMENTO = '$l10n->intIdUnico' and DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final' and ANDAMENTOPROCESSO = 'HABILITADO' ORDER BY TERMOCASAMENTO DESC LIMIT 1");
$busca_max->execute();
$min = $busca_min->fetch(PDO::FETCH_ASSOC);
$max = $busca_max->fetch(PDO::FETCH_ASSOC);

$primeiro_registro_casamento = $min['TERMOCASAMENTO'];
$ultimo_registro_casamento = $max['TERMOCASAMENTO'];

}
}



else{
$quantidade_registros = 0;
$primeiro_registro_casamento = 0 ;
$ultimo_registro_casamento = 0;
}

$data = explode("-", $data_inicial);
if ($data[1] <=  3) {$TRIM_PESQUISA = 1;}
if ($data[1] >  3) {$TRIM_PESQUISA = 2;}
if($data[1] > 6){$TRIM_PESQUISA = 3;}
if($data[1] > 9){$TRIM_PESQUISA = 4;}
$txt .=$UF_PESQUISA;
$txt .=$MUN_PESQUISA;
$txt .=$DIST_PESQUISA;
$txt .=$COD_CARTORIO;
$txt .=$TRIM_PESQUISA;
$txt .=date('y', strtotime($data_final));
#AQUI TO PREENHENDO COM NASCIMENTO, MAS NÃO SEI SE É ASSIM ESSE MANUAL É UM LIXO!!!
$txt .=str_pad('B'.intval($l10n->intIdUnico), 12, " ", STR_PAD_RIGHT);
$txt .=str_pad($primeiro_registro_casamento, 7, "0", STR_PAD_LEFT);
$txt .=str_pad($ultimo_registro_casamento, 7, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .=str_pad($quantidade_registros, 5, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .='0000';
$txt .='0000';
$txt.=chr(13).chr(10);

}



$busca_10_casamentosaux =  $pdo->prepare("SELECT * FROM livronotas where setTipoLivro = 'CASAMENTOSA'  ");
$busca_10_casamentosaux->execute();
$linhas_10_casamentosaux = $busca_10_casamentosaux->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas_10_casamentosaux as $l10n) {
$busca_interna = $pdo->prepare("SELECT * from registro_casamento_novo where LIVROCASAMENTO = '$l10n->intIdUnico' and DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final' and ANDAMENTOPROCESSO = 'HABILITADO' AND TIPOLIVRO ='3'");
$busca_interna->execute();
if ($busca_interna->rowCount()!=0) {
$linhas_interna = $busca_interna->fetchAll(PDO::FETCH_OBJ);
$max_termo2 = 0;
$min_termo2 = 0;
foreach ($linhas_interna as $lint) {	
$quantidade_registros = $busca_interna->rowCount();
$busca_min = $pdo->prepare("SELECT TERMOCASAMENTO from registro_casamento_novo where LIVROCASAMENTO = '$l10n->intIdUnico' and DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final' and ANDAMENTOPROCESSO = 'HABILITADO' AND TIPOLIVRO ='3' ODER BY TERMOCASAMENTO ASC LIMIT 1");
$busca_min->execute();

$busca_max = $pdo->prepare("SELECT TERMOCASAMENTO from registro_casamento_novo where LIVROCASAMENTO = '$l10n->intIdUnico' and DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final' and ANDAMENTOPROCESSO = 'HABILITADO' AND TIPOLIVRO ='3' ODER BY TERMOCASAMENTO DESC LIMIT 1");
$busca_max->execute();
$min = $busca_min->fetch(PDO::FETCH_ASSOC);
$max = $busca_max->fetch(PDO::FETCH_ASSOC);

$primeiro_registro_casamentoa = $min['TERMOCASAMENTO'];
$ultimo_registro_casamentoa = $max['TERMOCASAMENTO'];


}
}

else{
$quantidade_registros = 0;
$primeiro_registro_casamentoa = 0 ;
$ultimo_registro_casamentoa = 0;
}
$data = explode("-", $data_inicial);
if ($data[1] <=  3) {$TRIM_PESQUISA = 1;}
if ($data[1] >  3) {$TRIM_PESQUISA = 2;}
if($data[1] > 6){$TRIM_PESQUISA = 3;}
if($data[1] > 9){$TRIM_PESQUISA = 4;}
$txt .=$UF_PESQUISA;
$txt .=$MUN_PESQUISA;
$txt .=$DIST_PESQUISA;
$txt .=$COD_CARTORIO;
$txt .=$TRIM_PESQUISA;
$txt .=date('y', strtotime($data_final));
#AQUI TO PREENHENDO COM NASCIMENTO, MAS NÃO SEI SE É ASSIM ESSE MANUAL É UM LIXO!!!
$txt .=str_pad('BAUXILIAR'.intval($l10n->intIdUnico), 12, " ", STR_PAD_RIGHT);
$txt .=str_pad($primeiro_registro_casamentoa, 7, "0", STR_PAD_LEFT);
$txt .=str_pad($ultimo_registro_casamentoa, 7, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .=str_pad($quantidade_registros, 5, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .='0000';
$txt .='0000';
$txt.=chr(13).chr(10);

}



$busca_10_obitos =  $pdo->prepare("SELECT * FROM livronotas where setTipoLivro = 'OBITOS'  ");
$busca_10_obitos->execute();
$linhas_10_obitos = $busca_10_obitos->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas_10_obitos as $l10n) {
$busca_interna = $pdo->prepare("SELECT * from registro_obito_novo where LIVROOBITO = '$l10n->intIdUnico' AND TIPOLIVRO ='4' and DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final'");
$busca_interna->execute();
if ($busca_interna->rowCount()!=0) {
$linhas_interna = $busca_interna->fetchAll(PDO::FETCH_OBJ);
$max_termo3 = 0;
$min_termo3 = 0;
foreach ($linhas_interna as $lint) {	
$quantidade_registros = $busca_interna->rowCount();
$busca_min = $pdo->prepare("SELECT TERMOOBITO from registro_obito_novo where LIVROOBITO = '$l10n->intIdUnico' AND TIPOLIVRO ='4' and DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final' ORDER BY TERMOOBITO ASC LIMIT 1");
$busca_min->execute();

$busca_max = $pdo->prepare("SELECT TERMOOBITO from registro_obito_novo where LIVROOBITO = '$l10n->intIdUnico' AND TIPOLIVRO ='4' and DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final' ORDER BY TERMOOBITO DESC LIMIT 1");
$busca_max->execute();


$min = $busca_min->fetch(PDO::FETCH_ASSOC);
$max = $busca_max->fetch(PDO::FETCH_ASSOC);


$primeiro_registro_obito = $min['TERMOOBITO'];
$ultimo_registro_obito = $max['TERMOOBITO'];

}
}


else{
$quantidade_registros = 0;
$primeiro_registro_obito = 0 ;
$ultimo_registro_obito = 0;
}
$data = explode("-", $data_inicial);
if ($data[1] <=  3) {$TRIM_PESQUISA = 1;}
if ($data[1] >  3) {$TRIM_PESQUISA = 2;}
if($data[1] > 6){$TRIM_PESQUISA = 3;}
if($data[1] > 9){$TRIM_PESQUISA = 4;}
$txt .=$UF_PESQUISA;
$txt .=$MUN_PESQUISA;
$txt .=$DIST_PESQUISA;
$txt .=$COD_CARTORIO;
$txt .=$TRIM_PESQUISA;
$txt .=date('y', strtotime($data_final));
#AQUI TO PREENHENDO COM NASCIMENTO, MAS NÃO SEI SE É ASSIM ESSE MANUAL É UM LIXO!!!
$txt .=str_pad('C'.intval($l10n->intIdUnico), 12, " ", STR_PAD_RIGHT);
$txt .=str_pad($primeiro_registro_obito, 7, "0", STR_PAD_LEFT);
$txt .=str_pad($ultimo_registro_obito, 7, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .=str_pad($quantidade_registros, 5, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .='0000';
$txt .='0000';
$txt.=chr(13).chr(10);

}



$busca_10_obitosaux =  $pdo->prepare("SELECT * FROM livronotas where setTipoLivro = 'OBITOSA' ");
$busca_10_obitosaux->execute();
$linhas_10_obitosaux = $busca_10_obitosaux->fetchAll(PDO::FETCH_OBJ);
foreach ($linhas_10_obitosaux as $l10n) {
$busca_interna = $pdo->prepare("SELECT * from registro_obito_novo where LIVROOBITO = '$l10n->intIdUnico' and DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final'  AND TIPOLIVRO ='5' and TEMPOINTRAUTERINA!=''");
$busca_interna->execute();
if ($busca_interna->rowCount()!=0) {
$linhas_interna = $busca_interna->fetchAll(PDO::FETCH_OBJ);
$max_termo4 = 0;
$min_termo4 = 0;
foreach ($linhas_interna as $lint) {	
$quantidade_registros = $busca_interna->rowCount();
$busca_min = $pdo->prepare("SELECT TERMOOBITO from registro_obito_novo where LIVROOBITO = '$l10n->intIdUnico' and DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final'  AND TIPOLIVRO ='5' and TEMPOINTRAUTERINA!='' ORDER BY TERMOOBITO ASC LIMIT 1");
$busca_min->execute();

$busca_max = $pdo->prepare("SELECT TERMOOBITO from registro_obito_novo where LIVROOBITO = '$l10n->intIdUnico' and DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final'  AND TIPOLIVRO ='5' and TEMPOINTRAUTERINA!='' ORDER BY TERMOOBITO DESC LIMIT 1");
$busca_max->execute();

$min = $busca_min->fetch(PDO::FETCH_ASSOC);
$max = $busca_max->fetch(PDO::FETCH_ASSOC);


$primeiro_registro_obitoa = $min['TERMOOBITO'];
$ultimo_registro_obitoa = $max['TERMOOBITO'];

}
}
else{
$quantidade_registros = 0;
$primeiro_registro_obitoa = 0 ;
$ultimo_registro_obitoa = 0;
}
$data = explode("-", $data_inicial);
if ($data[1] <=  3) {$TRIM_PESQUISA = 1;}
if ($data[1] >  3) {$TRIM_PESQUISA = 2;}
if($data[1] > 6){$TRIM_PESQUISA = 3;}
if($data[1] > 9){$TRIM_PESQUISA = 4;}
$txt .=$UF_PESQUISA;
$txt .=$MUN_PESQUISA;
$txt .=$DIST_PESQUISA;
$txt .=$COD_CARTORIO;
$txt .=$TRIM_PESQUISA;
$txt .=date('y', strtotime($data_final));
#AQUI TO PREENHENDO COM NASCIMENTO, MAS NÃO SEI SE É ASSIM ESSE MANUAL É UM LIXO!!!
$txt .=str_pad('CAUXILIAR'.intval($l10n->intIdUnico), 12, " ", STR_PAD_RIGHT);
$txt .=str_pad($primeiro_registro_obitoa, 7, "0", STR_PAD_LEFT);
$txt .=str_pad($ultimo_registro_obitoa, 7, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .=str_pad(0, 5, "0", STR_PAD_LEFT);
$txt .=str_pad($quantidade_registros, 5, "0", STR_PAD_LEFT);
$txt .='0000';
$txt .='0000';
$txt.=chr(13).chr(10);

}



//$filename = rand(5, 15);
$filename5 = 'CARTINF10';

$arquivo = fopen($diretorio_pasta.$filename5.'.TXT', 'a+');
$escrever = fwrite($arquivo, $txt);

$filename5 = $filename5.'.txt';
/*
header('Content-disposition: attachment; filename=CARTINF02.TXT');
header('Content-type: text/plain');
readfile($diretorio_pasta.$filename5);
*/



$txt ='';
//$filename = rand(5, 15);
$filename6 = 'CONTROLE.SIS';

$arquivo = fopen($diretorio_pasta.$filename6, 'a+');
$escrever = fwrite($arquivo, $txt);
fclose($arquivo);

$filename6 = $filename6;
/*
header('Content-disposition: attachment; filename=CARTINF02.TXT');
header('Content-type: text/plain');
readfile($diretorio_pasta.$filename6);
*/

/*
$zip = new ZipArchive();

if( $zip->open('Remessas_Civil/CARTINF.zip' , ZipArchive::CREATE )  === true){   ###nome do arquivo que vai ser criado
      
$zip->addFile('Remessas_Civil/'.$filename, 'CARTINF01.TXT'); 
$zip->addFile('Remessas_Civil/'.$filename2, 'CARTINF02.TXT'); 
$zip->addFile('Remessas_Civil/'.$filename3, 'CARTINF03.TXT'); 
$zip->addFile('Remessas_Civil/'.$filename4, 'CARTINF04.TXT'); 
$zip->addFile('Remessas_Civil/'.$filename5, 'CARTINF10.TXT'); 
$zip->addFile('Remessas_Civil/'.$filename6, 'CONTROLE.SIS');    
    #caminho do arquivo de texto que sera adicionado no arquivo criado --- nome do arquivo adicionado no zip
          
    $zip->close();

    header('Content-type: application/zip');
    header('Content-disposition: attachment; filename="CARTINF.zip"');
    readfile('Remessas_Civil/CARTINF.zip');   #faz o download do arquivo
    //ob_clean(); # se descomentar não vai abrir o arquivo do download só o da pasta
    //unlink('Remessas_Civil/IBGE.zip');   #deleta o arquivo depois que salvou o download
}
*/


// Get real path for our folder
$rootPath = realpath($diretorio_pasta);

// Initialize archive object
$zip = new ZipArchive();
$nome_arq =  'CARTINF.zip';
$zip->open($diretorio_pasta.$nome_arq, ZipArchive::CREATE | ZipArchive::OVERWRITE);

// Create recursive directory iterator
/** @var SplFileInfo[] $files */
$files = new RecursiveIteratorIterator(
    new RecursiveDirectoryIterator($rootPath),
    RecursiveIteratorIterator::LEAVES_ONLY
);

foreach ($files as $name => $file)
{
    // Skip directories (they would be added automatically)
    if (!$file->isDir())
    {
        // Get real and relative path for current file
        $filePath = $file->getRealPath();
        $relativePath = substr($filePath, strlen($rootPath) + 1);

        // Add current file to archive
        $zip->addFile($filePath, $relativePath);
    }
}

// Zip archive will be created only after closing object
$zip->close();

header('Content-type: application/zip');
header('Content-disposition: attachment; filename="CARTINF.zip"');
readfile('Remessas_Civil/IBGE/CARTINF.zip');   #faz o download do arquivo
//ob_clean(); # se descomentar não vai abrir o arquivo do download só o da pasta
//unlink('Remessas_Civil/IBGE.zip');   #deleta o arquivo depois que salvou o download

?>
