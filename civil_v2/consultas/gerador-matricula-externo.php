<?php include('../controller/db_functions.php');
session_start();
 $pdo = conectar();

$busca_serventia = $pdo->prepare("SELECT * FROM cadastroserventia");
$busca_serventia->execute();
$serv = $busca_serventia->fetch(PDO::FETCH_ASSOC);
$cns = str_pad($serv['strCNS'],6,"0", STR_PAD_LEFT);
if (isset($_POST['incorporado']) && $_POST['incorporado'] == 'ok') {
	$acervo= str_pad(2,2,"0", STR_PAD_LEFT);
}
else{
$acervo= str_pad($serv['setTipoAcervo'],2,"0", STR_PAD_LEFT);	
}




if ($_POST['tipoRegistro'] == 'NA') {
# REGISTRO DE NASCIMENTO

if (isset($_POST['livro'])) {

$livro = str_pad($_POST['livro'], 5, "0", STR_PAD_LEFT);
$folha = str_pad($_POST['folha'], 3, "0", STR_PAD_LEFT);
$termo = str_pad($_POST['termo'], 7, "0", STR_PAD_LEFT);
$dataRegistro = explode("-", $_POST['dataRegistro']);
$tipoLivro  = $_POST['tipoLivro'];
$acervo = str_pad($_POST['tipoacervo'],2,"0", STR_PAD_LEFT);;

$matricula = $cns.$acervo.'55'.$dataRegistro[0].$tipoLivro.$livro.$folha.str_pad($termo,7,"0", STR_PAD_LEFT);

$qtdMatricula=strlen($matricula);
$valorUnicoMatricula = [];
for ($i=1; $i <= 31 ; ++$i) {
$valorUnicoMatricula = substr($matricula, 0, $i);
}


############################Calculo Digito 1 ##################
$multiplicadorFase1 = "32";
$valor =[];
$soma = "0";
for ($i=0; $i < 30; $i++) {
$multiplicadorFase1--;
//echo "<br>===".$valorUnicoMatricula[$i]."==".$multiplicadorFase1."===";
$valor[$i] = $valorUnicoMatricula[$i]*$multiplicadorFase1;
$soma += $valor[$i];
}
//Valor do digito 1 = é o resto de soma1 * 10 / 11

$digito1 = ($soma*10)%11;
if (strlen($digito1) >1 )  {
$digito1 = $digito1/10;
}

############################fecha Calculo Digito 1 ##################

############################Calculo Digito 2 ##################
$valor2 =[];
$soma2 = "0";
$multiplicadorFase2 = "33";
for ($j=0; $j < 30; $j++) {
$multiplicadorFase2--;
//echo "<br>===".$valorUnicoMatricula[$j]."==".$multiplicadorFase2."===";
$valor2[$j] = $valorUnicoMatricula[$j]*$multiplicadorFase2;
$soma2 += $valor2[$j];
}
//Soma + Soma*multiplicacao do ultimo digito1
$soma2 = $soma2+($digito1*2);
//Digito 2 = é o resto de soma2 * 10 / 11
$digito2 = (($soma2*10)%11);
if (strlen($digito2) >1 )  {
$digito2 = $digito2/10;
}
############################fecha calculo Digito 2 ##################

$matricula = $cns.' '.$acervo.' '.'55'.' '.$dataRegistro[0].' '.$tipoLivro.' '.$livro.' '.$folha.' '.str_pad($termo,7,"0", STR_PAD_LEFT).' '.$digito1.$digito2;

die('{"matricula":"'.$matricula.'"}');	
}
}



if ($_POST['tipoRegistro'] == 'CA') {
# REGISTRO DE NASCIMENTO

if (isset($_POST['livro'])) {

$livro = str_pad($_POST['livro'], 5, "0", STR_PAD_LEFT);
$folha = str_pad($_POST['folha'], 3, "0", STR_PAD_LEFT);
$termo = str_pad($_POST['termo'], 7, "0", STR_PAD_LEFT);
$dataRegistro = explode("-", $_POST['dataRegistro']);
$tipoLivro  = intval($_POST['tipoLivro']);
if ($tipoLivro == '7') {
$tipoLivro = '2';
}
$matricula = $cns.$acervo.'55'.$dataRegistro[0].$tipoLivro.$livro.$folha.str_pad($termo,7,"0", STR_PAD_LEFT);

$qtdMatricula=strlen($matricula);
$valorUnicoMatricula = [];
for ($i=1; $i <= 31 ; ++$i) {
$valorUnicoMatricula = substr($matricula, 0, $i);
}


############################Calculo Digito 1 ##################
$multiplicadorFase1 = "32";
$valor =[];
$soma = "0";
for ($i=0; $i < 30; $i++) {
$multiplicadorFase1--;
//echo "<br>===".$valorUnicoMatricula[$i]."==".$multiplicadorFase1."===";
$valor[$i] = $valorUnicoMatricula[$i]*$multiplicadorFase1;
$soma += $valor[$i];
}
//Valor do digito 1 = é o resto de soma1 * 10 / 11

$digito1 = ($soma*10)%11;
if (strlen($digito1) >1 )  {
$digito1 = $digito1/10;
}
############################fecha Calculo Digito 1 ##################

############################Calculo Digito 2 ##################
$valor2 =[];
$soma2 = "0";
$multiplicadorFase2 = "33";
for ($j=0; $j < 30; $j++) {
$multiplicadorFase2--;
//echo "<br>===".$valorUnicoMatricula[$j]."==".$multiplicadorFase2."===";
$valor2[$j] = $valorUnicoMatricula[$j]*$multiplicadorFase2;
$soma2 += $valor2[$j];
}
//Soma + Soma*multiplicacao do ultimo digito1
$soma2 = $soma2+($digito1*2);
//Digito 2 = é o resto de soma2 * 10 / 11
$digito2 = (($soma2*10)%11);
############################fecha calculo Digito 2 ##################
if (strlen($digito2) >1 )  {
$digito2 = $digito2/10;
}

$matricula = $cns.' '.$acervo.' '.'55'.' '.$dataRegistro[0].' '.$tipoLivro.' '.$livro.' '.$folha.' '.str_pad($termo,7,"0", STR_PAD_LEFT).' '.$digito1.$digito2;

die('{"matricula":"'.$matricula.'"}');	


}
}



if ($_POST['tipoRegistro'] == 'OB') {
# REGISTRO DE NASCIMENTO

if (isset($_POST['livro'])) {

$livro = str_pad($_POST['livro'], 5, "0", STR_PAD_LEFT);
$folha = str_pad($_POST['folha'], 3, "0", STR_PAD_LEFT);
$termo = str_pad($_POST['termo'], 7, "0", STR_PAD_LEFT);
$dataRegistro = explode("-", $_POST['dataRegistro']);
$tipoLivro  = $_POST['tipoLivro'];
$matricula = $cns.$acervo.'55'.$dataRegistro[0].$tipoLivro.$livro.$folha.str_pad($termo,7,"0", STR_PAD_LEFT);

$qtdMatricula=strlen($matricula);
$valorUnicoMatricula = [];
for ($i=1; $i <= 31 ; ++$i) {
$valorUnicoMatricula = substr($matricula, 0, $i);
}


############################Calculo Digito 1 ##################
$multiplicadorFase1 = "32";
$valor =[];
$soma = "0";
for ($i=0; $i < 30; $i++) {
$multiplicadorFase1--;
//echo "<br>===".$valorUnicoMatricula[$i]."==".$multiplicadorFase1."===";
$valor[$i] = $valorUnicoMatricula[$i]*$multiplicadorFase1;
$soma += $valor[$i];
}
//Valor do digito 1 = é o resto de soma1 * 10 / 11

$digito1 = ($soma*10)%11;
if (strlen($digito1) >1 )  {
$digito1 = $digito1/10;
}

############################fecha Calculo Digito 1 ##################

############################Calculo Digito 2 ##################
$valor2 =[];
$soma2 = "0";
$multiplicadorFase2 = "33";
for ($j=0; $j < 30; $j++) {
$multiplicadorFase2--;
//echo "<br>===".$valorUnicoMatricula[$j]."==".$multiplicadorFase2."===";
$valor2[$j] = $valorUnicoMatricula[$j]*$multiplicadorFase2;
$soma2 += $valor2[$j];
}
//Soma + Soma*multiplicacao do ultimo digito1
$soma2 = $soma2+($digito1*2);
//Digito 2 = é o resto de soma2 * 10 / 11
$digito2 = (($soma2*10)%11);
if (strlen($digito2) >1 )  {
$digito2 = $digito2/10;
}
############################fecha calculo Digito 2 ##################

$matricula = $cns.' '.$acervo.' '.'55'.' '.$dataRegistro[0].' '.$tipoLivro.' '.$livro.' '.$folha.' '.str_pad($termo,7,"0", STR_PAD_LEFT).' '.$digito1.$digito2;

die('{"matricula":"'.$matricula.'"}');	


}
}



if ($_POST['tipoRegistro'] == 'PR') {
# REGISTRO DE NASCIMENTO

if (isset($_POST['livro'])) {

$livro = str_pad($_POST['livro'], 5, "0", STR_PAD_LEFT);
$folha = str_pad($_POST['folha'], 3, "0", STR_PAD_LEFT);
$termo = str_pad($_POST['termo'], 7, "0", STR_PAD_LEFT);
$dataRegistro = explode("-", $_POST['dataRegistro']);
$tipoLivro  = $_POST['tipoLivro'];
$matricula = $cns.$acervo.'55'.$dataRegistro[0].$tipoLivro.$livro.$folha.str_pad($termo,7,"0", STR_PAD_LEFT);

$qtdMatricula=strlen($matricula);
$valorUnicoMatricula = [];
for ($i=1; $i <= 31 ; ++$i) {
$valorUnicoMatricula = substr($matricula, 0, $i);
}


############################Calculo Digito 1 ##################
$multiplicadorFase1 = "32";
$valor =[];
$soma = "0";
for ($i=0; $i < 30; $i++) {
$multiplicadorFase1--;
//echo "<br>===".$valorUnicoMatricula[$i]."==".$multiplicadorFase1."===";
$valor[$i] = $valorUnicoMatricula[$i]*$multiplicadorFase1;
$soma += $valor[$i];
}
//Valor do digito 1 = é o resto de soma1 * 10 / 11

$digito1 = ($soma*10)%11;
if (strlen($digito1) >1 )  {
$digito1 = $digito1/10;
}

############################fecha Calculo Digito 1 ##################

############################Calculo Digito 2 ##################
$valor2 =[];
$soma2 = "0";
$multiplicadorFase2 = "33";
for ($j=0; $j < 30; $j++) {
$multiplicadorFase2--;
//echo "<br>===".$valorUnicoMatricula[$j]."==".$multiplicadorFase2."===";
$valor2[$j] = $valorUnicoMatricula[$j]*$multiplicadorFase2;
$soma2 += $valor2[$j];
}
//Soma + Soma*multiplicacao do ultimo digito1
$soma2 = $soma2+($digito1*2);
//Digito 2 = é o resto de soma2 * 10 / 11
$digito2 = (($soma2*10)%11);
if (strlen($digito2) >1 )  {
$digito2 = $digito2/10;
}
############################fecha calculo Digito 2 ##################

$matricula = $cns.' '.$acervo.' '.'55'.' '.$dataRegistro[0].' '.$tipoLivro.' '.$livro.' '.$folha.' '.str_pad($termo,7,"0", STR_PAD_LEFT).' '.$digito1.$digito2;

die('{"matricula":"'.$matricula.'"}');  


}
}

 ?>