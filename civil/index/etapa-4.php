<!-- ==================================================== PHP INICIAL ====================================================-->	
		<?php include('../controller/db_functions.php');
		session_start();
		$pdo = conectar();
		$id = $_GET['id'];
		if (empty($_SESSION['id']) && empty($_SESSION['nome'])) {
			$_SESSION['msg'] = "<div class='alert alert-info' role='alert' id='response'>
			<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
			&times;</span></button>
			Área restrita
			</div>";
			header("location: ../login.php");
		}


		include('header.php');
		include('menu.php');
		include('nascimento-bd.php');
		?>
<!-- ==================================================== PHP INICIAL ====================================================-->

<!-- ==================================================== CORPO DA PAGINA ================================================-->
	<body>

	<section class="content" style="margin-left: 30px"  >
    <div class="container-fluid">
        <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card geralcard">
        <div class="header row">
        <h2 class="col-md-6">Registro de Nascimento</h2>
        <?php if ($parte4 == 'in active'): ?>
        <a class="btn bg-blue col-md-3 badge" target="_blank" href="PDFS/preview-pdf-nascimento?id=<?=$id?>&preview=ok"><i class="material-icons">receipt</i>PRÉ VISUALIZAR CERTIDÃO</a>
        <a class="btn bg-grey col-md-3 badge" target="_blank" href="PDFS/pdf-nascimento-registro-basico?id=<?=$id?>&preview=ok"><i class="material-icons">description</i>PRÉ VISUALIZAR TERMO</a>
        <?php endif ?>
        </div>
        <div class="body">
        <!-- Nav tabs -->


        <ul class="nav nav-tabs" role="tablist">
        <li id="li1" role="presentation" >
        <a href="etapa-1.php?id=<?=$id?>">
        <i class="material-icons">account_box</i> Dados - Nascimento
        </a>
        </li>
        <li id="li2" role="presentation"  class="">
        <a href="etapa-2.php?id=<?=$id?>">
        <i class="material-icons">people</i> Filiação
        </a>
        </li>

        <li id="li3" role="presentation" class="" >
        <a href="etapa-3.php?id=<?=$id?>">
        <i class="material-icons">person_add</i> Testemunhas
        </a>
        </li>

        <li id="li5" role="presentation" class="active" >
        <a href="etapa-4.php?id=<?=$id?>">
        <i class="material-icons">note_add</i> Dados adicionais
        </a>
        </li>

        <li id="li4" role="presentation" class="" >
        <a href="etapa-5.php?id=<?=$id?>" >
        <i class="material-icons">book</i> Dados do Registro
        </a>
        </li>


        


        </ul>


		<div class="tab-content">
				<div role="tabpanel" class="tab-pane fade in active" id="dadosadicionais" >

				        <form id="formdadosadd" method="POST" action="../bd_UPDATE/update-nascimento.php?id=<?=$id?>">
				        	<input type="hidden" name="submit4">
									<div class="row">
									<?php 
									$busca_registro_add = $pdo->prepare("SELECT * from info_registros_civil where id_registro_nascimento = '$id'");
									$busca_registro_add->execute();
									$bra = $busca_registro_add->fetchAll(PDO::FETCH_OBJ);
									foreach ($bra as $b) {
									$inteiro_teor = $b->inteiro_teor;
									$observacoes_registro = $b->observacoes_registro;
									}
									if($busca_registro_add->rowCount()<1){
									$inteiro_teor = '';
									$observacoes_registro = '';
									}
									?>

				        			  	

				        			 <div class="col-sm-12">
				        			 	<legend>ADICIONAR ALGUMA OBSERVAÇÃO/INFORMAÇÃO AO REGISTRO:</legend>
				        			 	 <div class="col-sm-12">
				        			 	<label class="col-md-10">INFORMAÇÕES/OBSERVAÇÕES DEVEM ESTAR VÍSIVEIS NAS CERTIDÕES?</label>
				        			 	<div class="col-md-2">
				        			 		<select class="form-control" id="obs_visivel_certidao" name="obs_visivel_certidao">
				        			 			<option value="">SELECIONE</option>
				        			 			<option value="SIM">SIM</option>
				        			 			<option value="NAO">NÃO</option>
				        			 			
				        			 		</select>
				        			 	</div>
				        			 </div><br><br><br><br>	

				        			 	<textarea class="form-control" name="observacoes_registro" id="observacoes_registro" rows="20"><?=$observacoes_registro?></textarea>
				        			 </div>

				        			
				        			 <hr><br>
				        			  <div class="col-sm-12">
				        			 	<legend>CONFIGURAR MANUALMENTE TEOR DO REGISTRO:</legend>
				        			 	<textarea class="form-control" name="inteiro_teor" id="inteiro_teor" rows="20">
				        			 		<?php 

				        			 		if (!empty($inteiro_teor)) {
				        			 		echo $inteiro_teor;
				        			 		}
				        			 		else{
				        			 		include('includes/config-teor-registro-nascimento.php'); 
				        			 		}
				        			 		?>
				        			 	</textarea>
				        			 </div>
				        			 </div>
				        			 <br><br><br>
				        			 <div class="col-md-10"></div>
				        			 <button type="submit4" class="btn waves-effect bg-green"><i class="material-icons">save</i>SALVAR</button>
				        </form>       

				</div>                	
		</div>
<!-- ==================================================== CORPO DA PAGINA ================================================-->

<!-- ==================================================== CONFIGURAÇÃO DA PAGINA =========================================-->	
 	<!--nav class="navbar-fixed-bottom footer">
					<div class="options-bookc">
						<div class="col-md-2"><a  class = "btn waves-effect bg-info" href="etapa-3.php?id=<?=$id?>"> <i class="material-icons">fast_rewind</i>VOLTAR</a></div>
						<div class="col-md-8"><h5 class="text-center">&copy SISTEMA BOOKC - TODOS OS DIREITOS RESERVADOS</h5></div>
						<div class="col-md-2"><a class = "btn waves-effect bg-info" href="#" onclick="salvar()">AVANÇAR <i class="material-icons">fast_forward</i></a></div>
					</div>
				</nav-->
 	<!-- Jquery Core Js -->
    <script src="../plugins/jquery/jquery.min.js"></script>
    <script type="text/javascript">
    	$('textarea').keyup(function(e){
    		if(e.which == 13){
		//swal("Ops!", "Não pressione enter ao digitar nas caixas de texto, use ponto e vírgula", "error");
		var texto = $(this).val();
		texto = texto.replace('\n', ';');
		$(this).val(texto);
		}

		});
	</script>
	<?php if (isset($_SESSION['sucesso'])):?>
		<script> swal('SUCESSO!','<?=$_SESSION["sucesso"]?>','success');</script>

		<?php
		unset($_SESSION['sucesso']);
	endif ?>
	<?php if (isset($_SESSION['erro'])):?>
		<script> swal('ERRO!','<?=$_SESSION["erro"]?>','error');</script>

		<?php
		unset($_SESSION['erro']);
	endif ?>
	<script type="text/javascript">
				$("#NUMEROPAPELSEGURANCA").blur(function (e) {
					var tipo = $('#TIPOPAPELSEGURANCA').val();
					var numpapel = $('#NUMEROPAPELSEGURANCA').val();
					$.post('../consultas/papel-seguranca.php', {'tipo':tipo, 'numpapel':numpapel}, function(data) {
						$("#resultado2").html(data);
					});
				});
	</script>
    <!-- Bootstrap Core Js -->
		    <script src="../plugins/bootstrap/js/bootstrap.js"></script>
		    <!-- Slimscroll Plugin Js -->
		    <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>
		    <!-- Waves Effect Plugin Js -->
		    <script src="../plugins/node-waves/waves.js"></script>
		    <!-- Jquery DataTable Plugin Js -->
		    <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
		    <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
		    <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
		    <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
		    <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
		    <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
		    <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
		    <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
		    <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
		    <!-- Input Mask Plugin Js -->
		    <script src="../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
		    <script src="../plugins/jquery-validation/jquery.validate.js"></script>
		    <script type="text/javascript">
						    	$(document).ready(function(){
						    		$('input[type="date"]').blur(function(){
						    			var teste = $(this).val();
						    			if (teste.length>10) {
						    				swal("Ops!", "Data digitada está incorreta!", "error");
						    			}
						    		});    


						    		$(".cpf").inputmask("999.999.999-99");
						    		$(".dnv").inputmask("99-99999999-9");
						    		showCustomer2();
						    		$('[data-toggle="popover"]').popover();
						    	});
    PREENCHERDADOS6();
    </script>
    <!-- Custom Js -->
    <script src="../js/admin.js"></script>
    <script src="../js/pages/tables/jquery-datatable.js"></script>
    <script src="../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <!-- Demo Js -->
    <script src="../js/demo.js"></script>
    <script src="../plugins/ajax/screen.js"></script>
    <!-- TinyMCE -->
    <script src="../js/pages/forms/editors.js"></script>
    <script src="../plugins/tinymce/tinymce.js"></script>
    <?php include('modais-nascimento.php'); ?>
    
    <input type="hidden" id="tipomodal" name="">
    <input type="hidden" id="tipomodalPessoa" name="">
    <script src="../nascimento.js"></script>
    <input name="image" type="file" id="upload" class="hidden" onchange="">
    <script type="text/javascript">
    	$('.rogocpf').blur(function(){
    		var cpf =$(this).val();
    		$.post('nascimento-tempo-real.php', {'CPFROGO':cpf}, function(data) {
    			$("#resultadorogo").html(data);
    		});
    	});
    </script>
    <script type="text/javascript">

    	$('.form-control').blur(function(){
    		if ($(this).prop("required") ==  true && $(this).val() == '' && $(this).prop("placeholder") !=  "clique para pesquisar" && $(this).prop("placeholder") != "CLIQUE PARA PESQUISAR") {
    			$(this).css("border-color", 'red');
    			$(this).css("color", 'red');
    			$(this).prop("placeholder", 'este campo é obrigatório');
				//swal('ERRO', 'O CAMPO É OBRIGATÓRIO', 'error');
			}
			else{
				$(this).css("border-color", 'silver');
				$(this).css("color", 'black');
			}

			});
	</script>
	<div id="resultadorogo"></div>
		<script type="text/javascript">
									function salvar() {
									var	erros = '';
									$('#formdadosadd').find('input[required=true]').each(function(){
									if(!$(this).val()){
									erros +='O campo ' + $(this).attr('description') + ' é obrigatório!\n';
									$(this).css("border-color", 'red');
									$(this).css("color", 'red');
									}
									});

									$('#formdadosadd').find('select[required=true]').each(function(){
									if(!$(this).val()){
									erros +='O campo ' + $(this).attr('description') + ' é obrigatório!\n';
									$(this).css("border-color", 'red');
									$(this).css("color", 'red');
									}
									});

									if (erros != '') {
									swal("ATENÇÃO",erros,"warning");	
									}

									else{
									swal({
									title: "Deseja realmente avançar para próxima etapa?",
									text: "Parece que está tudo certo! Você preencheu todos os campos necessários para avançar",
									type: "success",
									confirmButtonClass: "bg-green",
									confirmButtonText: "AVANCE!",
									showCancelButton: true,
									cancelButtonText:'NÃO, CANCELE!',
									cancelButtonClass: 'bg-red',
									showLoaderOnConfirm: true,
									closeOnConfirm: false

									},
									function(){
									$('#formdadosadd').submit();
									}
									);

									}

									}
								</script>


							<!--TINYMCE EDITADO 1-->
								<script>

									tinymce.init({
										selector: 'textarea',
										language: 'pt_BR',
										language_url : '../plugins/tinymce/langs/pt_BR.js',
										theme: 'modern',
										height: 250,

										plugins: [
										'advlist autolink lists link image charmap print preview hr anchor pagebreak',
										'searchreplace wordcount visualblocks visualchars code fullscreen',
										'insertdatetime media nonbreaking save table contextmenu directionality',
										'emoticons template paste textcolor colorpicker textpattern imagetools'
										],
										toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
										toolbar2: 'removeformat nocaps allcaps titlecase removebr imprimir preview media | forecolor backcolor emoticons | fontsizeselect fontselect',
										font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;Arial Black=arial black,avant garde;Indie Flower=indie flower, cursive;Times New Roman=times new roman,times;',
										fontsize_formats: '2pt 5pt 8pt 9pt 10pt 11pt 12pt 13pt 14pt 18pt 24pt 36pt 48pt',
										image_advtab: true,
										file_picker_callback: function(callback, value, meta) {
											if (meta.filetype == 'image') {
												$('#upload').trigger('click');
												$('#upload').on('change', function() {
													var file = this.files[0];
													var reader = new FileReader();
													reader.onload = function(e) {
														callback(e.target.result, {
															alt: ''
														});
													};
													reader.readAsDataURL(file);
												});
											}
										},
										setup: function (editor) {
											editor.on('change', function () {
												editor.save();
											});

											editor.addButton('imprimir', {
												text: '',
												tooltip: 'imprime o conteudo do editor',
												icon: 'print',
												image: '',
												onclick: function() {
													tinymce.activeEditor.execCommand('SelectAll');
													tinymce.activeEditor.execCommand('mcePrint');
												},
											}); 


											editor.addButton('removebr', {
												text: 'Remove brs',
												tooltip: 'Remove line breaks in the current selection.',
												icon: false,
												image: '',
												onclick: function() {
													seleccion = editor.selection.getContent({format : 'html'});
													seleccion = seleccion.replace(/<br \/>/g, '');
													editor.selection.setContent(seleccion);
												},
											});

											function removeTags(string, array){
												return array ? string.split("<").filter(function(val){ return f(array, val); }).map(function(val){ return f(array, val); }).join("") : string.split("<").map(function(d){ return d.split(">").pop(); }).join("");
												function f(array, value){
													return array.map(function(d){ return value.includes(d + ">"); }).indexOf(true) != -1 ? "<" + value : value.split(">")[1];
												}
											}
								// novo plugins
								// Register the commands
								editor.addCommand('nocaps', function() {
									String.prototype.lowerCase = function() {
										return this.toLowerCase();
									}
									var sel = editor.dom.decode(editor.selection.getContent());
									sel = sel.lowerCase();
									editor.selection.setContent(sel);
									editor.save();
									editor.isNotDirty = true;
								});

								editor.addCommand('allcaps', function() {
									String.prototype.upperCase = function() {
										return this.toUpperCase();
									}
									var sel = editor.dom.decode(editor.selection.getContent());
									sel = sel.upperCase();
									editor.selection.setContent(sel);
									editor.save();
									editor.isNotDirty = true;
								});

								editor.addCommand('sentencecase', function() {
									String.prototype.sentenceCase = function() {
										return this.toLowerCase().replace(/(^\s*\w|[\.\!\?]\s*\w)/g, function(c)
										{
											return c.toUpperCase()
										});
									}
									var sel = editor.dom.decode(editor.selection.getContent());
									sel = sel.sentenceCase();
									editor.selection.setContent(sel);
									editor.save();
									editor.isNotDirty = true;
								});

								editor.addCommand('titlecase', function() {
									String.prototype.titleCase = function() {
										return this.toLowerCase().replace(/(^|[^a-z])([a-z])/g, function(m, p1, p2)
										{
											return p1 + p2.toUpperCase();
										});
									}
									var sel = editor.dom.decode(editor.selection.getContent());
									sel = sel.titleCase();
									editor.selection.setContent(sel);
									editor.save();
									editor.isNotDirty = true;
								});

								// Register Keyboard Shortcuts
								editor.addShortcut('meta+shift+l','Lowercase', ['nocaps', false, 'Lowercase'], this);
								editor.addShortcut('meta+shift+u','Uppercase', ['allcaps', false, 'Uppercase'], this);
								editor.addShortcut('meta+shift+s','Sentence Case', ['sentencecase', false, 'Sentence Case'], this);
								editor.addShortcut('meta+shift+t','Title Case', ['titlecase', false, 'Lowercase'], this);

								// Register the buttons
								editor.addButton('nocaps', {
									title : 'Lowercase (Ctrl+Shift+L)',
									text: 'Minusculo',
									cmd : 'nocaps',
								});
								editor.addButton('allcaps', {
									title : 'Uppercase (Ctrl+Shift+U)',
									text: 'Maiusculo',
									cmd : 'allcaps',
								});
								editor.addButton('sentencecase', {
									title : 'Sentence Case (Ctrl+Shift+S)',
									text: 'Sentença',
									cmd : 'sentencecase',
								});
								editor.addButton('titlecase', {
									title : 'Title Case (Ctrl+Shift+T)',
									text: 'Aa',
									cmd : 'titlecase',
								});

								//

								editor.addButton('mybutton', {
									type: 'menubutton',
									text: 'Aa',
									icon: false,
									menu: [
									{text: 'MAIÚSCULAS ', onclick: function () {
										seleccion = editor.selection.getContent({format : 'html'});
										seleccion = seleccion.replace(/<span \/>/g, '');

										var recebe_selecao =  "<span style='text-transform:uppercase !important'>" +removeTags(seleccion) + "</span>";
										editor.insertContent(recebe_selecao);
									}

								},

								{text: 'mínusculo', onclick: function() {
									seleccion = editor.selection.getContent({format : 'textContent'});
								//  seleccion = seleccion.replace(/<span \/>/g, '');



								var recebe_selecao =  "<span style='text-transform:lowercase !important'>" +removeTags(seleccion) + "</span>";
								editor.insertContent(recebe_selecao);

								console.log(editor.getBody());
								}
								},

								{text: 'Alternado', onclick: function() {
									seleccion = editor.selection.getContent({format : 'textContent'});
									seleccion = seleccion.replace(/<span \/>/g, '');

									var recebe_selecao =  "<span style='text-transform:capitalize !important'>" +removeTags(seleccion) + "</span>";
									editor.insertContent(recebe_selecao);

								}
								},
								{text: 'CUSTOM', onclick: function() {editor.insertContent('<b>teste</b>');}}

								]
								});


								}

								}

								);


								function setB() {
									document.execCommand('bold', false, null);
								}

								function setI() {
									document.execCommand('italic', false, null);
								}

								function setU() {
									document.execCommand('underline', false, null);
								}

								function setsC(e) {
									tags('span', 'sC');
								}

								function tags(tag, klass) {
									var ele = document.createElement(tag);
									ele.classList.add(klass);
									wrap(ele);
								}

								function wrap(tags) {
									var select = window.getSelection();
									if (select.rangeCount) {
										var range = select.getRangeAt(0).cloneRange();
										range.surroundContents(tags);
										select.removeAllRanges();
										select.addRange(range);
									}
								}
							</script>
							<!--TINYMCE EDITADO -->
<!-- ==================================================== CONFIGURAÇÃO DA PAGINA =========================================-->		

</body>
</html>



	