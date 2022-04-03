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
								<h1> AVERBAÇÕES NO REGISTRO</h1>
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
						<legend>INSERIR NOVA AVERBAÇÃO</legend>
						<div class="col-lg-12">
							<div class="col-lg-12">
								<label for="country">EXIBIR NAS CERTIDÕES?</label>
								<select id="EXIBIROBSREGISTRO" name="EXIBIROBSREGISTRO" class="form-control">
									<option value="N">SIM</option>
									<option value="S">NÃO</option>
								</select>
							</div>
							<div class="col-lg-12">
								<br>
								<button class="btn btn-default btn-block" onclick="$('#modelos').modal()"><i style="font-size:30px" class="fa fa-eye"></i> <br> VER MODELOS</button>
							</div>  


							<div class="col-lg-12" style="margin-top:5%">
								<label for="country">TEXTO DA AVERBAÇÃO</label>
								<textarea id="TEXTOAVERBACAO" name="TEXTOAVERBACAO"  class="form-control valid tinymce-100" aria-invalid="false"></textarea>
							</div>
							<br>

							<div class="col-lg-12">
								<br>
								<button class="btn btn-info btn-block" onclick="
								salvar_av( 
									$('#EXIBIROBSREGISTRO').val(),
									tinymce.get('TEXTOAVERBACAO').getContent(),
									'<?=$dados["LIVROOBITO"]?>',
									'<?=$dados["FOLHAOBITO"]?>',
									'<?=$dados["TERMOOBITO"]?>',
									'<?=$dados["ID"]?>',
									'<?=$dados["NOME"]?>',
									'OB',
									'<?=date('Y-m-d')?>'
									)
									"><i style="font-size:30px" class="fa fa-save"></i> <br> INSERIR AVERBAÇÃO</button>
								</div> 
								<br> 
							</div>
						</div>

						<div class="card col-lg-12">	
							<legend>AVERBAÇÕES PRESENTES NO REGISTRO</legend>
							<hr>
							<div class="" id="exibeaverbacoes"></div>
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
			atualizaraverbacoes('<?=$dados["LIVROOBITO"]?>', '<?=$dados["FOLHAOBITO"]?>', "OB", '<?=addslashes($dados["NOME"])?>');
		});
	</script>
	<script src="../assets/plugins/tooltips-popovers.js"></script>

	<div id="modelos" class="modal fade"  tabindex="-1" role="dialog"   aria-hidden="true">
		<?php $linhas = PESQUISA_ALL('cadastro_minutas_civil');?>
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">MODELOS</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">

					<div class="table-responsive" >
						<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
							<thead>
								<tr>
									<th>TITULO</th>
									<th>######</th>
									<!--th>EDITAR</th-->
								</tr>
							</thead>
							<tfoot>
								<tr>
									<th>TITULO</th>
									<th>######</th>
									<!--th>EDITAR</th-->
								</tr>
							</tfoot>
							<tbody>
								<?php   foreach($linhas as $b):?>

									<tr>
										<td><?=$b->titulo?></td>
										<td><a onclick='tinymce.get("TEXTOAVERBACAO").setContent("<?=strip_tags($b->texto)?>");' class="btn gradient-azul-forte" data-dismiss="modal">USAR MODELO</a></td>
										<!--td><a href="../index/update-minuta-civil.php?id=<?=$b->ID?>"><i class="material-icons">edit</i></a></td-->
									</tr>


								<?php endforeach ?>
							</tbody>
						</table>

					</div>


					<div class="modal-footer">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
					</div>
				</div>
			</div>
		</div>
	</div>


	<!--///////////////////////////////////////////////////////////////////////////////////////-->

	<div id="seloaverbacoes" class="modal fade"  tabindex="-1" role="dialog"   aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">SOLICITAR SELO(S)</h5>
					<input id="tipopartebuscar" type="hidden"></input>
					<input type="hidden" id="idreg2">
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form id="formcertidao" method="POST" action="../index/teste.php">
						<div class="row">

							<input type="hidden" id="qtdatos" name="qtdatos">
							<input type="hidden" id="idav" name="idav"> 

							<div class="col-lg-3 cert_geral">

								<label for="country">ATO:</label>
								<input type="text" id="ATO1" name="ATO1" placeholder="Ex. 14.4.1" list="atosliberados" class="form-control campoato" required="true">
							</div>

							<div class="col-lg-2 cert_geral">

								<label for="country">QUANTIDADE:</label>
								<input type="number" id="QUANTIDADE1" name="QUANTIDADE1" value="1" readonly="" class="form-control" required="true">
							</div>


							<div class="col-lg-4 cert_geral">

								<label for="country">SELO:</label>
								<input type="text" id="SELO1" name="SELO1" class="form-control" required="true" readonly="">
							</div>

							<div class="col-lg-3 cert_geral">
								<br>
								<a class="btn btn-info btn-lg" id="botaosolicitaselo1" onclick="seloaverbacao(1,$('#idav').val())"> <i class="ni ni-curved-next"></i> 	SOLICITAR SELO</a>
							</div> 
							<div class="col-lg-12 cert_geral custom-control custom-checkbox" >
								<br>
								<input class="custom-control-input" id="CHECKSELOISENTO1" onclick="verificaisento(1)" value="1" type="checkbox">
								<label style="margin-left: 1.6%;" class="custom-control-label" for="CHECKSELOISENTO1">
									<span>SELO ISENTO</span>
								</label>
								<textarea style="display:none" class="form-control" id="MOTIVOSELOISENTO1" name="MOTIVOSELOISENTO1" rows="5" placeholder="INFORME O MOTIVO DA INSENÇÃO"></textarea>
							</div>

						</div>

					</form>              


				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
				</div>
			</div>
		</div>
	</div>

	<!--///////////////////////////////////////////////////////////////////////////////////////-->


	<datalist id="atosliberados">
		<option style="max-width: 100%;font-size: 70%" value="14.4.1">14.4.1 Quando lavrada à margem do registro</option>
		<option style="max-width: 100%;font-size: 70%" value="14.4.2">14.4.2 Quando houver necessidade de transporte para outra
			folha 
		</option>
		<option style="max-width: 100%;font-size: 70%" value="14.4.3">14.4.3
			Quando for referente à anulação de casamento,
			separação judicial, divórcio ou restabelecimento de
		sociedade conjugal.</option>
		<option value="14.7" style="max-width: 100%;font-size: 70%">14.7 Anotação feita no próprio cartório ou mediante 
		comunicação, além do porte postal.</option>
		<option value="14.11" style="max-width: 100%;font-size: 70%">14.11 Pelos procedimentos administrativos de reconhecimento de paternidade ou maternidade...</option>
		<option value="14.3.3" style="max-width: 100%;font-size: 70%">14.3.3 Retificação, restauração ou cancelamento de registro, qualquer que seja a causa e alteração de patronímico familiar por determinação judicial, excluída a certidão. 
		</option>
		<option value="14.3.4" style="max-width: 100%;font-size: 70%">14.3.4 Procedimento de adoção e reconhecimento de filho por determinação judicial, excluída a certidão.
		</option>
		<option value="14.10" style="max-width: 100%;font-size: 70%">14.10 Retificação Simples 
		</option>
		<option value="14.2" style="max-width: 100%;font-size: 70%">14.2  Registro de emancipação, tutela, interdição ou ausência. (Alterado pela Lei nº 9.490, de 04/11/11)
		</option>

	</datalist>

	<script type="text/javascript">
		$(".campoato").blur(function(){
			var value = $(this).val();
			var idcampo = $(this).attr("id");
			var confirm = "";
			$('#atosliberados').find('option').each(function(){
				if ($(this).val() == value) {
					confirm = "ok";
									//alert(confirm);
								}
							});

			if (confirm == "") {swal("ATENÇÃO", "O ato '"+value+"' não pertence a lista de atos aceitáveis para este momento. clique em cima do campo e o sistema listará os atos aceitáveis!", "info");
			$("#"+idcampo).val("");
		}			
	});
</script>




<!--///////////////////////////////////////////////////////////////////////////////////////-->

<div id="editaav" class="modal fade"  tabindex="-1" role="dialog"   aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">EDITAR AVERBAÇÃO</h5>
				<input id="tipopartebuscar" type="hidden"></input>
				<input type="hidden" id="idreg2">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">

				<div class="col-lg-12" style="margin-top:5%">
					<label for="country">TEXTO DA AVERBAÇÃO</label>
					<textarea id="TEXTOAVERBACAOEDIT" name="TEXTOAVERBACAO"  class="form-control valid tinymce-100" aria-invalid="false"></textarea>
				</div>
				<br>
				<input type="hidden" id="idupdateav">
				<div class="col-lg-12">
					<br>
					<button class="btn btn-info btn-block" onclick="update_text_av($('#idupdateav').val(), tinymce.get('TEXTOAVERBACAOEDIT').getContent())">
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