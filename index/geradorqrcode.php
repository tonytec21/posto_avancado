<?php include('./controller/db_functions.php');

session_start();
if(!isset($_SESSION['id'])) {header('location:../login.php');};

/*if (empty($_SESSION['id']) && empty($_SESSION['nome'])) {
$_SESSION['msg'] = "<div class='alert alert-info' role='alert' id='response'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
    &times;</span></button>
    Área restrita
    </div>";
    header("location: .../.../login.php");
}
*/

$URL_ATUAL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$titulo = '';
$pdo = conectar();

$b_total = $pdo->prepare('SELECT * FROM auditoria');
$b_total->execute();
$total_de_linhas_geral = $b_total->rowCount();
$id = $_GET['id'];


$r = PESQUISA_ALL('cadastroserventia'); foreach ($r as $r ){};
include_once("../assets/header.php");


?>



<?php include_once("../assets/menu.php");?>

<style type="text/css">
@media only screen and (max-width: 700px) {
#ras{ max-width: 100%!important; padding-left: 0%!important; }
.samobile{min-width: 140%!important;margin-left: -35%}
.panel-default a {background: #ddeaff;color:#0d2244!important;}
.semback  {background:white!important;color:#0d2244!important;}

}
@media (min-width: 768px) {
.modal-xl {
width: 100%;
max-width:1300px;
}
}
.samobile{
    width: 50%;
    /* margin-bottom: 10px; */
}
.ico-menu{
    color:white; margin-top: 5px; margin-left: 40px; cursor:pointer;
}

	a:hover, a:focus{
		color:#2e2e2e;
	}

.info-box:hover{
    opacity: 1;
    box-shadow: 0px 1px black;
    transition: all 0.2s cubic-bezier(1, 0.03, 1, 1.36);
    transform: scale(1.1);
    border-radius: 6px;
}
.card{
    background-color: #fff0!important;
}
</style>


<body class="index-page bg-secondary main_dark_mode">



<section>

<div class="container-fluid">

         
    <div class="card mt-4">

    <section id="ras" class="content" style="margin-left: 0px!important" >

<div  class="container" style="text-align:center;max-width: 45%;" >
<div id="divselotodo" style=" padding-right: 10px;background: white;border: solid 1px black" >
<?php



$busca_qr = $pdo->prepare("SELECT * FROM auditoria where id =".$_GET['id']);
$busca_qr->execute();
$k = $busca_qr->fetchAll(PDO::FETCH_OBJ);
foreach ($k as $r) :?>
<?php

$retorno = json_decode($r->retorno,true);
//    $qr = $retorno['valorQrCode'];
//    $textoselo = $retorno['textoSelo'];
if (isset($retorno['valorQrCode'])  && !empty($retorno['valorQrCode']) ) {

  $qr = $retorno['qrCode'];
  $textoselo = caracteres_selador($retorno['textoSelo']);
  $valorQrCode = $retorno['valorQrCode'];

}else {

 # $textoselo = (infoValida($retorno['textoSelo']))  ?  corrigirACENTO_utf8($retorno['textoSelo'])   :    ''  ;


  $busca_retorno_qr = $pdo->prepare("SELECT * FROM auditoria INNER JOIN retorno_selos ON auditoria.strSelo = retorno_selos.SELO WHERE auditoria.id  =".$_GET['id']);
  $busca_retorno_qr->execute();
  $b =  $busca_retorno_qr->fetchAll();
  foreach($b as $b){
  $qr = $b["QR_CODE_IMG"];
  $textoselo = mb_strtoupper($b["TEXTO_SELO"]);
  $valorQrCode = $retorno['VALOR_QR_CODE'];

  }

}

$nome = $qr;
#QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);



?>


<table>
  <tr>

<td  id="target-qrcode">
<img  src="data:image/png;base64,<?=$nome?>"  />
</td>

<td>
<p style="text-align: justify;font-size:11px !important;line-height:0.4cm" class="text-black" id="target-texto-selo">
<!-- <?php #echo mb_convert_case((utf8_encode($textoselo)), MB_CASE_UPPER, "UTF-8")?> -->
<?=corrigirACENTO_utf8($textoselo)?>
</p>
</td>




</tr>
</table>

<?php endforeach; ?>
</div></div>
<div  class="container" style="text-align:center" >
Chave QR Code: <span  id="target-valorqrcode"><?=$valorQrCode?></span>
<div class='row mt-4'></div>
<a class="btn btn-secondary"  data-clipboard-action="copy" data-clipboard-target="#div-target-info"><i class="fa fa-copy"> </i> Copiar</a>
<a class="btn btn-secondary"  data-clipboard-action="copy" data-clipboard-target="#target-valorqrcode"><i class="fa fa-copy"> </i> Copiar Chave Qr Code</a>
<a class="btn btn-secondary"  data-clipboard-action="copy" data-clipboard-target="#target-qrcode"><i class="fa fa-copy"> </i> Copiar QR Code</a>
<a class="btn btn-secondary"  data-clipboard-action="copy" data-clipboard-target="#target-texto-selo"><i class="fa fa-copy"> </i> Copiar Texto</a>
<!--a onclick="printdiv('divselotodo')" class="btn "><i class="material-icons">print</i></a-->
</div>
</div>
<br><br>
<div class="container" style="text-align:center">

<form class="" action="./PDFS/pdf-etiqueta-padrao.php?id=<?=$id?>" target="_blank" method="post">
<input type="hidden" name="idauditoria" value="<?=$id?>">
<input type="hidden" name="imgqrcode" value="<?=$nome?>">
<input type="hidden" name="txtqrcode" value="<?=addslashes(corrigirACENTO_utf8($textoselo))?>">

<button type="subimit" name="subimit" class="btn bg-red text-white waves-effect waves-float">
<i class="fa fa-print"> </i> IMPRIMIR
</button>
</form>
</div>
</section>





    </div>

 </div>

</section>


</body>


<?php include_once("../assets/footer.php");?>