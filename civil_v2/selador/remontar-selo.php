<?php 
include('../controller/db_functions.php');session_start();
$pdo = conectar();

$selo = $_POST['seloCodigo'];

$busca = $pdo->prepare("SELECT * FROM auditoria where strSelo like'%$selo%' limit 1");
$busca->execute();
$b = $busca->fetch(PDO::FETCH_ASSOC);
if ($busca->rowCount()>0) {
$retorno = $b['retorno'];
$retorno = json_decode($retorno, true);
#var_dump($retorno);
$qr = $retorno['qrCode'];
$texto = $retorno['textoSelo'];
die('
	<div class ="row col-lg-3"></div>
	<div class="col-lg-5 " id="seloremontado" style="display: inline-flex; margin-top:-40px;padding:10px;padding-top:40px;margin-bottom:40px; box-shadow: 1px 1px 1px 1px black">
									<p style="max-width: 40%; text-align: justify;margin-right: -5px;">
										<img style="background: none; width: 100px;margin-top: -25px;z-index: -1;" src="data:image/png;base64,'.$qr.'"alt="Qr Code" /> </img>
									</p>
									<p style="max-width: 70%;font-size: 8px;  text-align: justify;">
										'.caracteres_selador($texto).'
									</p>

								</div>

		<div class ="col-lg-4">
			<button style="font-size:8px" onclick="printBy()" class="btn gradient-azul-fraco"><i class="material-icons">print</i>IMPRIMIR</button>
 					<button style="font-size:8px" id="copiarseloremontado" onclick="copyToClipboard()" class="btn gradient-azul-fraco" data-clipboard-action="copy" data-clipboard-target="#seloremontado"><i class="material-icons">content_copy</i>COPIAR</button>
		</div>						


								');
}

else{
	die("SELO NÃO LOCALIZADO!");
}

 ?>

