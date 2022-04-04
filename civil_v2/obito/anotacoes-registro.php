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
?>
<body class="index-page bg-secondary main_dark_mode" style="max-width:100%">
	<section style="margin-top: -3%;">
		<div class="row">
			<div class="section section-components col-lg-12">
				<div class="container">
					<legend class="bg-white" style="padding:20px">
						<div class="row col-lg-12">
							<div class="col-lg-2"><i style="font-size:100px; color:#172b4d" class=" ni ni-collection"></i></div>
							<div class="col-lg-10">
								<h1> ANOTAÇÕES NO REGISTRO</h1>
								<h5><?=$dados['NOME']?></h5>
								<p>Livro: <?=$dados['LIVROOBITO']?>, Folha <?=$dados['FOLHAOBITO']?>, Termo <?=$dados['TERMOOBITO']?>, Matricula: <?=$dados['MATRICULA']?> </p>
							</div>
							<div class="col-lg-12">
								<a href="info-registro-obito.php?id=<?=$id?>" id="visualizarregistro" class="btn btn-block btn-success">IR PARA REGISTRO</a>
							</div>
						</div>  
					</legend>
					<hr>

					<div class=" card col-lg-12">	
						<legend>INSERIR NOVA ANOTAÇÃO</legend>
						<div class="col-lg-12">
							<div class="col-lg-12">
								<label for="country">EXIBIR NAS CERTIDÕES?</label>
								<select id="EXIBIROBSREGISTRO" name="EXIBIROBSREGISTRO" class="form-control">
									<option value="S">SIM</option>
									<option value="N">NÃO</option>
								</select>
							</div>


							<div class="col-lg-12" style="margin-top:5%">
								<label for="country">TEXTO DA ANOTAÇÃO</label>
								<textarea id="TEXTOANOTACAO" name="TEXTOANOTACAO"  class="form-control valid tinymce-100" aria-invalid="false"></textarea>
							</div>
							<br>

							<div class="col-lg-12">
								<br>
								<button class="btn btn-info btn-block" onclick="
								salvar_an( 
									$('#EXIBIROBSREGISTRO').val(),
									tinymce.get('TEXTOANOTACAO').getContent(),
									'<?=$dados["LIVROOBITO"]?>',
									'<?=$dados["FOLHAOBITO"]?>',
									'<?=$dados["TERMOOBITO"]?>',
									'<?=$dados["ID"]?>',
									'<?=$dados["NOME"]?>',
									'OB',
									'<?=date('Y-m-d')?>'
									)
									"><i style="font-size:30px" class="fa fa-save"></i> <br> INSERIR ANOTAÇÃO</button>
								</div> 
								<br> 
							</div>
						</div>

						<div class="card col-lg-12">	
							<legend>ANOTAÇÕES PRESENTES NO REGISTRO</legend>
							<hr>
							<div class="" id="exibeanotacoes"></div>
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
	<script type="text/javascript">
		$(document).ready(function(){
			atualizaranotacoes('<?=$dados["LIVROOBITO"]?>', '<?=$dados["FOLHAOBITO"]?>', "OB", '<?=addslashes($dados["NOME"])?>');
		});
	</script>
	<script src="../assets/plugins/tooltips-popovers.js"></script>


<!--///////////////////////////////////////////////////////////////////////////////////////-->

<div id="editaan" class="modal fade"  tabindex="-1" role="dialog"   aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">EDITAR ANOTAÇÃO</h5>
				<input id="tipopartebuscar" type="hidden"></input>
				<input type="hidden" id="idreg2">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="col-lg-12" style="margin-top:5%">
					<label for="country">TEXTO DA ANOTAÇÃO</label>
					<textarea id="TEXTOANOTACAOEDIT" name="TEXTOANOTACAO"  class="form-control valid tinymce-100" aria-invalid="false"></textarea>
				</div>
				<br>
				<input type="hidden" id="idupdatean">
				<div class="col-lg-12">
					<br>
					<button class="btn btn-info btn-block" onclick="update_text_an($('#idupdatean').val(), tinymce.get('TEXTOANOTACAOEDIT').getContent())">
						<i style="font-size:30px" class="fa fa-save"></i> <br> SALVAR ALTERAÇÕES</button>
					</div> 
					<br> 

				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

<!--///////////////////////////////////////////////////////////////////////////////////////-->