<?php include('../controller/db_functions.php');
session_start();
include_once("../assets/header.php");
include("../index/verifica-modulos.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
include_once("../assets/menu.php");
$tabela = 'registro_obito_novo';
$json_dados = json_table_registro($tabela, $id);
$json_dados = json_decode($json_dados, true); 
$dados = json_encode($json_dados[0],JSON_UNESCAPED_UNICODE);
$dados = json_decode($dados, true);

$pdo = conectar();
$busca_dados2 = $pdo->prepare("SELECT * FROM info_registros_civil where id_registro_obito = '$id'");
$busca_dados2->execute();
if ($busca_dados2->rowCount()>0) {
	$lin = $busca_dados2->fetchAll(PDO::FETCH_OBJ);
	$json_dados2 = json_encode($lin);
	$json_dados2 = json_decode($json_dados2, true); 
	$dados2 = json_encode($json_dados2[0],JSON_UNESCAPED_UNICODE);
	$dados2 = json_decode($dados2, true);
}

$ass_funcionario = mb_strtoupper($_SESSION['nome']).'<br>'.mb_strtoupper($_SESSION['funcao']);
if (isset($_POST['nomeassinatura']) && !empty($_POST['nomeassinatura'])) {
	$ass_funcionario = str_replace("/","<br>",$_POST['nomeassinatura']);
}

?>


<body class="index-page bg-secondary main_dark_mode" style="max-width: 98%">
	<section style="margin-top: -3%;">
		<div class="row">
			<div class="section section-components col-lg-12">
				<div class="container">

					<div class="row">
					<legend class="bg-white col-lg-2" style="padding:20px;box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .2);">
						<div class="row col-lg-12">
							<div class="col-lg-12"><i style="color: #172b4d; margin-left: 35%;font-size: 50px;" class=" ni ni-single-02"></i></div>
						</div> 
						<div class="col-lg-12 text-center">
								<h5 style="font-size:50%;"><?=$dados['NOME']?></h5>
								<p>Livro: 

									<?php if ($dados['TIPOLIVRO'] == '4'): ?>
										C
									<?php else: ?>
										C AUXILIAR 
									<?php endif ?>

									<?=$dados['LIVROOBITO']?>, Folha <?=$dados['FOLHAOBITO']?>, Termo <?=$dados['TERMOOBITO']?>, Matricula: <?=$dados['MATRICULA']?> </p>
							</div> 
							<hr>

							<div class="col-lg-12">
								<label for="country" class="text-center">ALTERAR ASSINATURA:</label>
								<select class="form-control" onchange="
								window.location.assign('<?="http://" .  $_SERVER['HTTP_HOST']. $_SERVER['REQUEST_URI']?>&nomeassinatura='+$(this).val());
								">
									<option></option>
									<?php $q= PESQUISA_ALL('funcionario'); foreach($q as $q): if($q->strPermissaoAssinar == 'S')?>
									<option><?=$q->strNomeCompleto?>/<?=$q->strCargo?></option>
								<?php endforeach ?>
								</select>
					</div>

					<?php if (isset($_POST['TIPOCERTIDAO']) && $_POST['TIPOCERTIDAO'] == '6'):?>
						<div class="col-lg-12">
							<a href="pdfs/certidao-xml-obito.php?id=<?=$dados['ID']?>" class="btn btn-info btn-block">GERAR XML</a>
						</div>
					<?php endif ?>

					</legend>
					<hr>

					<form class="col-lg-10">
					<textarea class="tinymce-500" id="texto_obito" name="texto_obito">

						<?php if (isset($_GET['tiporegistro']) && $_GET['tiporegistro'] == '1'): ?>
							<?php include_once('pdfs/certidao-obito-primeiravia.php') ?>

						<?php elseif (isset($_POST['TIPOCERTIDAO']) && $_POST['TIPOCERTIDAO'] == '1'): ?>
							<?php include_once('pdfs/certidao-obito-primeiravia.php') ?>
						<?php elseif (isset($_POST['TIPOCERTIDAO']) && $_POST['TIPOCERTIDAO'] == '2'):?>
							<?php include_once('pdfs/certidao-obito-segundavia.php') ?>
						<?php elseif (isset($_POST['TIPOCERTIDAO']) && $_POST['TIPOCERTIDAO'] == '3'):?>
							<?php include_once('pdfs/certidao-obito-inteiroteor.php') ?>	
						<?php elseif (isset($_POST['TIPOCERTIDAO']) && $_POST['TIPOCERTIDAO'] == '6'):?>
							<?php include_once('pdfs/certidao-obito-segundavia.php') ?>
						<?php elseif (isset($_POST['TIPOCERTIDAO']) && $_POST['TIPOCERTIDAO'] == '7'):?>
							<?php include_once('pdfs/certidao-obito-restauracao.php') ?>			
						<?php endif ?>

					</textarea>
					</form>

				</div>
			</div>
			</div>

		</div>
	</section>
</body>














<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/moment.min.js"></script>
<script src="../assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
<script src="../assets/js/plugins/bootstrap-datepicker.min.js"></script>
<script src="../assets/plugins/jquery.inputmask.bundle.js"></script>
<script src="../assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../assets/plugins/tinymce/tinymce.js"></script>
<script src="js/editor.js"></script>
<script src="js/funcoes-info-registro.js"></script>