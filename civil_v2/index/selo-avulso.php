<?php include('../controller/db_functions.php');session_start();
$pdo = conectar();

include_once("../assets/header.php");
include_once("../assets/menu.php");

?>

<body class="index-page bg-secondary main_dark_mode" style="max-width:100%">
	<section style="margin-top: -3%;">
      <div class="row">
 <div class="section section-components col-lg-12">
 <div class="container">
 <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">SELO AVULSO</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" fa fa-ticket"></i></div>
                            </div>  
                            </legend>

		<div class="col-lg-12 card" style="display: none; margin-bottom: 10px" id="containerexibirselo">
			<br><br><br>
			<div class="row col-lg-12" id="resultadoremontar"></div>
		</div>
		<!--div id="divbutton" class="card col-lg-12" >
			
			<h4 class="text-center">O QUE DESEJA FAZER?<br><br><br></h4>
			<div class="row">
			<div class="col-lg-6"><button id="button2" class="btn btn-primary btn-block"><i class="fa fa-plus-square"></i> <br> GERAR NOVO</button><br><br><br></div>
			<div class="col-lg-6"><button id="button1" class="btn btn-info btn-block"><i class="fa fa-refresh"></i><br> REMONTAR SELO JÁ GERADO</button><br><br><br></div>
			</div>
		</div-->


		<!--div id="remontar" class="card col-lg-12">
			<h4 class="text-center">INFORME O NUMERO DO SELO QUE DESEJA REMONTAR:</h4><br><br>
			<input type="text" id="seloinformado" name="seloinformado" placeholder="NUMERO DO SELO" class="form-control">
			<br>
			<button id="remontarselo" class="btn btn-warning">REMONTAR SELO</button>
			<br><br>
			
		</div-->
		
	



		<div id="gerar" class="col-lg-12">
			<div class="header">
				<h4>DADOS PARA GERAÇÃO DO SELO</h4>
			</div>
			<br><br>
			<form id="formselos">
			<div class="row col-lg-12">	
			<div class="col-lg-4" >
				<label for="country">LIVRO:</label>
					<input type="number" description="Nº LIVRO" name="LIVRO" id="LIVRO" class="form-control" >
			</div>

			<div class="col-lg-4" >
				<label for="country">FOLHA:</label>

					<input type="number" description="Nº FOLHA" name="FOLHA" id="FOLHA" class="form-control" >

			</div>

			<div class="col-lg-4" >
				<label for="country">TERMO:</label>

					<input type="number" description="Nº TERMO" name="TERMO" id="TERMO" class="form-control" >

			</div>


			
			<div class="col-lg-12" >
				<label for="country">NOME:</label>

					<input type="text" description="NOME SOLICITANTE" name="NOMEPARTE" id="NOMEPARTE" class="form-control" required="true">

			</div>



			<div class="col-lg-12" >
				<label for="country">ATO:</label>

					<input type="text" description="ATO" name="ATO" id="ATO" class="form-control text-center" required="true" list="atos_civil">

			</div>

			<div class="col-lg-12" >
				<label for="country">QUANTIDADE:</label>

					<input type="number" description="QUANTIDADE" name="QUANTIDADE" id="QUANTIDADE" class="form-control text-center" required="true" 
					onfocus="animateqtd($(this))" value="1">

			</div>

			<datalist id="atos_civil" style="background: red;">
				<?php $busca_lista_atos = $pdo->prepare("SELECT * FROM ato_novo  where substr(strCodigoLei,1,2)='14'");
						$busca_lista_atos->execute();
						$bla = $busca_lista_atos->fetchAll(PDO::FETCH_OBJ);
						foreach ($bla as $bla):
						 ?>
						 <option value="<?=$bla->strCodigoLei?>"><?=$bla->strCodigoLei?> - <?=$bla->strTipoAto?></option>
						<?php endforeach ?> 
			</datalist>

						<div class="col-sm-12">
							<br>
								<div class="col-lg-6" >
									<input type="checkbox" id="SELOISENTO" name="SELOISENTO" class="selo"/>
									<label for="SELOISENTO">SELO ISENTO</label>
								</div>
							</div>

							<script type="text/javascript">
								$('#SELOISENTO').click(function(){
									if ($(this).is(":checked") == false) {
										$("#divisento").css("display","none");
										$("#MOTIVOISENTO").removeClass("motivois");
									}
									else{
										$("#divisento").css("display","block");
										$("#MOTIVOISENTO").addClass("motivois");
									}
								});
							</script>

							<div class="col-lg-12" style="display: none" id="divisento">
								<br><textarea class="form-control" id="MOTIVOISENTO" name="MOTIVOISENTO" placeholder="INFORME O MOTIVO DA INSENÇÃO" description="MOTIVO ISENÇÃO SELO " rows="5"></textarea><br>
							</div> 
							<br>

			</div>				
			</form>
			<div class="col-lg-12" style="margin-bottom: 60px" id="solicitarselobtndiv">
				<a id="solicitarselobtn" class="btn btn-info btn-block btn-lg">SOLICITAR SELO</a>
			</div>

			<div id="resultadogerarselo" class="col-lg-12"></div>

			
		</div>
	

		


	</div>
</section>

<script type="text/javascript">
	
	$(document).ready(function(){
		//$('#remontar,#gerar').hide();
	});

	$('#button1').click(function(){
		$('#divbutton').hide();
		$('#remontar').show();
		$('#gerar').hide();
		
	});
	$('#button2').click(function(){
		$('#divbutton').hide();
		$('#remontar').hide();
		$('#gerar').show();
		
	});



    $("#remontarselo").click(function (e) {
    var seloCod = $('#seloinformado').val();
    if (seloCod == '') {swal("ATENÇÃO", "POR FAVOR INFORME O CÓDIGO DO SELO A SER REMONTADO", "warning");}
    else{
    $.post('../selador/remontar-selo.php', {'seloCodigo':seloCod}, function(data) {
    $("#containerexibirselo").css("display","block");	
    $("#resultadoremontar").html(data);
    });
    }
    });


    function printdiv(iddiv) {
    	var div = iddiv;
    	var conteudo = $('#' + div).html();
    	tela_impressao = window.open('about:blank');
    	tela_impressao.document.write('<html>' + conteudo + '</html>');
    	tela_impressao.window.print();
    	tela_impressao.window.close();
    }

	function printBy(selector){
	var $print = $(selector)
	//.clone()
	.addClass('print')
	//.prependTo('body');

	// Stop JS execution
	window.print();

	// Remove div once printed
	//$print.remove();
	}



	$("#solicitarselobtn").click(function (e) {
   	
   	var	erros = '';
									$('#formselos').find('input[required=true]').each(function(){
										if(!$(this).val()){
											erros +='O campo ' + $(this).attr('description') + ' é obrigatório!\n';
											$(this).css("border-color", 'red');
											$(this).css("color", 'red');
										}
									});

									$('#formselos').find('textarea[class="form-control motivois"]').each(function(){
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
            title: "Deseja realmente avançar?",
            text: "Tem certeza de que deseja prosseguir?",
            type: "warning",
            confirmButtonClass: "bg-green",
            confirmButtonText: "AVANCE!",
            showCancelButton: true,
            cancelButtonText:'NÃO, CANCELE!',
            cancelButtonClass: 'bg-red',
            showLoaderOnConfirm: true,
            closeOnConfirm: false

        },
        function(){

        LIVRO = $('#LIVRO').val();
        FOLHA = $('#FOLHA').val();
        TERMO = $('#TERMO').val();
        PARTE = $('#NOMEPARTE').val();
        ATO = $('#ATO').val();
        QUANTIDADE = $('#QUANTIDADE').val();
        if ($('#MOTIVOISENTO').val()!='') {
        MOTIVOISENTO = $('#MOTIVOISENTO').val(); 	
        }
        else{
        MOTIVOISENTO ='';	
        }
        	
		$.post('../selador/gerar-selo-avulso.php', {
			'LIVRO':LIVRO,
			'FOLHA':FOLHA,
			'TERMO':TERMO,
			'PARTE':PARTE,
			'ATO':ATO,
			'QUANTIDADE':QUANTIDADE,
			'MOTIVOISENTO': MOTIVOISENTO,
			'NATUREZA':'SELO AVULSO REGISTRO CIVIL'

		}, 
		function(data) {
		//$('#resultadogerarselo').html(data);	
		var retorno = data;
		var retorno = JSON.parse(retorno);

		if (typeof retorno['status'] !== "undefined") {
		swal("ERRO AO GERAR SELO",retorno['message'],"error");
		}		

		else{
		var sucesso = 	retorno['resumos']['0'].numeroSelo;
		var texto = retorno['resumos']['0'].textoSelo;
		//$("#SELO_GERADO").val(sucesso);
		//$('.selo').prop("disabled", true);
		$('#botaoselo').hide();	
		swal("SUCESSO",texto,"success");
		$.post('../selador/remontar-selo.php', {'seloCodigo':sucesso}, function(data) {
		headerdiv = '<div class="header">SELO GERADO:</div><br><br><br>';
		$("#containerexibirselo").css("display","block");	
		$("#resultadoremontar").html(data);
		$('#solicitarselobtndiv').html('<a onclick="window.location.reload()" class="btn waves-efect gradient-azul-fraco col-lg-12"><i class="material-icons">reply</i>VOLTAR</a>');
		});
		}
		});

                            }
                            );									

   

    }});


</script>




<script src="../plugins/ajax/clipboard.min.js"></script>
<script>
var clipboard = new ClipboardJS('.gradient-azul-fraco');

clipboard.on('success', function(e) {
console.log(e);
});

clipboard.on('error', function(e) {
console.log(e);
});
function copyToClipboard() {
swal('COPIADO!','Localize onde deseja colar o conteúdo copiado e pressione "ctrl+V"!', 'info');
}
</script>
<style type="text/css">

	@page{
	size: 10.0cm 5.0cm;
	top:5cm;
	margin-bottom: -50cm;
	}
	@media print{
		.form-control{
			display: none;
		}
		button{
			display: none;
		}

		h4{
			display: none;
		}	
		.header{
			display: none;
		}
		#resultadoremontar{
		width: 10cm;
		height: 5cm;
		margin-left: -1cm;
		font-size: 12px;
		max-height: 100%;
		bottom: 3.5cm;
		margin-top: 1.5cm;
		zoom:130%;
					}

		legend{
			display: none!important;
		}		

		.bg-secondary{
			background: none!important;
		}			
		
		.card{
			border: none!important;
			background: none!important;
		}

		.btn{
			display: none;
		}



	}
</style>

<script type="text/javascript">
	function animateqtd(id){
		$(id).animate({width: '10%'}).attr("placeholder","");
	}
</script>