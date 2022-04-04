<?php include('../controller/db_functions.php');
session_start();
include_once("../assets/header.php");
include("../index/verifica-modulos.php");
if (isset($_GET['id'])) {
	$id = $_GET['id'];
}
include_once("../assets/menu.php");
$tabela = 'registro_nascimento_novo';
$json_dados = json_table_registro($tabela, $id);
$json_dados = json_decode($json_dados, true); 
$dados = json_encode($json_dados[0],JSON_UNESCAPED_UNICODE);
$dados = json_decode($dados, true);

$pdo = conectar();

#checando para que selos antigos não saiam nas novas certidões:
$up_avs = $pdo->prepare("UPDATE averbacoes_civil set strMotivoAverbacao = '0' where strMotivoAverbacao = '1'");
$up_avs->execute();

#buscando tabela auxiliar:
$busca_dados2 = $pdo->prepare("SELECT * FROM info_registros_civil where id_registro_nascimento = '$id'");
$busca_dados2->execute();
if ($busca_dados2->rowCount()>0) {
	$lin = $busca_dados2->fetchAll(PDO::FETCH_OBJ);
	$json_dados2 = json_encode($lin);
	$json_dados2 = json_decode($json_dados2, true); 
	$dados2 = json_encode($json_dados2[0],JSON_UNESCAPED_UNICODE);
	$dados2 = json_decode($dados2, true);
}

?>


<body class="index-page bg-secondary main_dark_mode" style="max-width:100%">
	<section style="margin-top: -3%;">
		<div class="row">
			<div class="section section-components col-lg-12">
				<div class="container">
					<legend class="bg-white" style="padding:20px">
						<div class="row col-lg-12">
							<div class="col-lg-2"><i style="font-size:100px; color: #172b4d" class=" ni ni-single-02"></i></div>
							<div class="col-lg-10">
								<h1><?=$dados['NOMENASCIDO']?></h1>
								<p>Livro: <?=$dados['LIVRONASCIMENTO']?>, Folha <?=$dados['FOLHANASCIMENTO']?>, Termo <?=$dados['TERMONASCIMENTO']?>, Matricula: <?=$dados['MATRICULA']?> </p>
							</div>

						</div>  
					</legend>
					<hr>

					<div class="card col-lg-12">
						<div class="row">

							<div class="col-lg-3">
								<?php if ($dados['status'] == 'ACV'): ?>
									<a class="btn btn-info btn-lg btn-block" href="nascimento-acervo.php?id=<?=$dados['ID']?>">
										<i style="font-size:50px" class="fa fa-pencil-square-o"></i><br>		
										ACESSAR FORMULÁRIO DE DADOS
									</a>
								<?php else: ?>
									<a class="btn btn-info btn-lg btn-block" href="nascimento-registro.php?id=<?=$dados['ID']?>">
										<i style="font-size:50px" class="fa fa-pencil-square-o"></i><br>		
										ACESSAR FORMULÁRIO DE DADOS
									</a>
								<?php endif ?>

							</div>

							<!-- <div class="col-lg-3">
								<a class="btn btn-primary btn-lg btn-block" href="averbacoes-registro.php?id=<?=$dados['ID']?>">
									<i style="font-size:60px" class="ni ni-ruler-pencil"></i><br>		
									AVERBAÇÕES
								</a>
							</div> -->

							<div class="col-lg-3">
								<a class="btn btn-default btn-lg btn-block" href="anotacoes-registro.php?id=<?=$dados['ID']?>">
									<i style="font-size:65px" class="fa fa-pencil-square"></i><br>		
									ANOTAÇÕES
								</a>
							</div>

							<div class="col-lg-3">
								<button class="btn btn-warning btn-lg btn-block" onclick="op_certidoes()">
									<i style="font-size:65px" class="ni ni-paper-diploma"></i><br>		
									CERTIDÕES
								</button>
							</div>
							
						</div>
					</div>

					<div class="card col-lg-12">
						<legend style="border-bottom: 1px solid silver;">IMPRESSÕES</legend>
						<div class="row">

							<div class="col-lg-3">
								<a  style="color:#525f7f; background: transparent!important;" class="btn  btn-lg btn-block" onclick="window.open('print-nascimento.php?id=<?=$id?>&tiporegistro=1')">
									<i style="font-size:65px; " class="fa fa-file-text"></i><br><br>		
									ASSENTO DE NASCIMENTO
								</a>
							</div>

							<div class="col-lg-3">
								<a  style="color:#525f7f; background: transparent!important;" class="btn  btn-lg btn-block" onclick="window.open('print-nascimento.php?id=<?=$id?>&tiporegistro=4')">
									<i style="font-size:65px; " class="fa fa-file-text"></i><br><br>		
									ASSENTO DE NASCIMENTO VERSÃO 2
								</a>
							</div>

							<div class="col-lg-3">
								<a  style="color:#525f7f; background: transparent!important;" class="btn  btn-lg btn-block" onclick="window.open('print-nascimento.php?id=<?=$id?>&tiporegistro=2')">
									<i style="font-size:65px; " class="fa fa-file-text"></i><br><br>		
									TERMO DE ALEGAÇÃO DE SUPOSTO PAI
								</a>
							</div>


							<div class="col-lg-3">
								<a  style="color:#525f7f; background: transparent!important;" class="btn  btn-lg btn-block" onclick="window.open('print-nascimento.php?id=<?=$id?>&tiporegistro=3')">
									<i style="font-size:65px; " class="fa fa-file-text"></i><br><br>		
									TERMO DE NEGAÇÃO DE PATERNIDADE
								</a>
							</div>


						</div>
						<?php if ($dados['status']!='CAN'): ?>
						<div class="row">
							<?php if ($dados['status'] == 'ACV'):?>
								<div class="col-lg-12">
									<a style="color:white" class="btn btn-danger btn-lg btn-block" onclick="fquerybd('delete from registro_nascimento_novo where ID = <?=$dados['ID']?>', 'EXCLUIR')" >
										<i style="font-size:15px" class="fa fa-trash"></i>		
										EXCLUIR REGISTRO
									</a>
								</div>
							<?php endif ?>

							<?php if ($_SESSION['logadoAdm'] == 'S'):?>
								<div class="col-lg-12">
									<a style="color:white" class="btn btn-danger btn-lg btn-block" onclick="$('#cancelarreg').modal()">
										<i style="font-size:15px" class="fa fa-close"></i>		
										CANCELAR ESTE REGISTRO
									</a>
								</div>
							<?php endif ?>
						</div>
					<?php else: ?>
						<span style="color:red; font-weight:bold; text-align: center;">
							<?=buscamotivocancelamento($id, 'nas')?>
						</span>
					<?php endif ?>

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
<script src="js/funcoes-info-registro.js"></script>

<!--///////////////////////////////////////////////////////////////////////////////////////-->

<div id="certidoes" class="modal fade"  tabindex="-1" role="dialog"   aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">CERTIDÕES</h5>
				<input id="tipopartebuscar" type="hidden"></input>
				<input type="hidden" id="idreg2">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="formcertidao" target="blank" method="POST" action="certidao-nascimento.php?id=<?=$id?>&tiporegistro=2">
					<div class="row">

						<div class="col-lg-12">
							<label for="country">TIPO CERTIDÃO:</label>
							<select onchange="tipocertidao($(this).val())" id="TIPOCERTIDAO" name="TIPOCERTIDAO" class="form-control valid" required="true">
								<option value="">SELECIONE</option>
								<option value="1">CERTIDÃO DE NASCIMENTO PRIMEIRA VIA</option>
								<!-- <option value="3">CERTIDÃO DE INTEIRO TEOR</option>
								<option value="4">CERTIDÃO DE CANCELAMENTO DE REGISTRO</option>
								<option value="5">CERTIDÃO DE CELIBATO</option>
								<option value="2">CERTIDÃO DE NASCIMENTO SEGUNDA VIA</option>
								<option value="6">CERTIDÃO XML (CRC)</option>
								<option value="7">CERTIDÃO DE NASCIMENTO PRIMEIRA VIA RESTAURAÇÃO</option>
								<option value="8">CERTIDÃO PORTÁVEL</option> -->
							</select>  
						</div>

						<div class="col-lg-12">
							<br>
							<label for="country" class="text-center">ALTERAR ASSINATURA:</label>
							<select name="nomeassinatura" class="form-control">
								<option></option>
								<?php $q= PESQUISA_ALL('funcionario'); foreach($q as $q): if($q->strPermissaoAssinar == 'S')?>
								<option><?=$q->strNomeCompleto?>/<?=$q->strCargo?></option>
							<?php endforeach ?>
						</select>
						</div>

						<div class="col-lg-6 cert_geral" style="display:none">
							<br>
							<label for="country">TIPO PAPEL SEGURANÇA:</label>
							<select id="TIPOPAPELSEGURANCA" name="TIPOPAPELSEGURANCA"  class="form-control valid" aria-invalid="false">
								<option value="0"> 0 – Sem papel</option>
								<option value="1"> 1 – Azul (Certidão Portável)</option>
								<option value="2"> 2 – Rosa (Certidão Portável)</option>
								<option value="3"> 3 – Papel de Segurança – TJMA</option>
								<option value="4"> 4 - Papel de Segurança – Arpen</option>
								<option value="5"> 5 - Papel de Segurança - Casa da Moeda</option>
								<option value="6"> 6 - Papel de Segurança - Extradigital Softwares e Equipamentos Ltda</option>
								<option value="7"> 7 - Papel de Segurança - Gráfica e Editora Líder  Ltda</option>
								<option value="8"> 8 - Papel de Segurança - Indústria Gráfica Brasileira Ltda</option>
								<option value="9"> 9 - Papel de Segurança - Js Grafica Editora Encadernadora Ltda</option>
								<option value="10"> 10 - Papel de Segurança – Setagraf</option>
								<option value="11"> 11 - Papel de Segurança - Tress Impressos De Segurança Ltda</option>
								<option value="12"> 12 - Papel de Segurança - Nattus Mercantil</option>
							</select>
						</div>

						<div class="col-lg-6 cert_geral" style="display:none">
							<br>
							<label for="country">NUMERO PAPEL SEGURANÇA:</label>
							<input id="NUMEROPAPELSEGURANCA" name="NUMEROPAPELSEGURANCA" type="text"  class="form-control valid" aria-invalid="false" onblur="verificapapelseguranca($(this).val(), $('#TIPOPAPELSEGURANCA').val(), $(this).attr('id'))">
						</div>

						<!--div class="col-lg-12 prim_via" style="display:none">
							<br><br>
							<a onclick="window.open('certidao-nascimento.php?id=<?=$id?>&tiporegistro=1')" class="btn btn-info btn-lg btn-block" href=""> <i style="font-size:40px" class="fa fa-print"></i><br> IR PARA CERTIDÃO</a>
						</div-->

						<input type="hidden" id="qtdatos" name="qtdatos" value="1">
						<input type="hidden" id="idregistro" name="idregistro" value="<?=$dados['ID']?>"> 

						<div class="col-lg-3 cert_geral" style="display:none">
							<br><br>
							<label for="country">ATO:</label>
							<input type="text" id="ATO1" name="ATO1" placeholder="Ex. 14.5.1" list="atosliberados" class="form-control campoato" required="true">
						</div>

						<div class="col-lg-2 cert_geral" style="display:none">
							<br><br>
							<label for="country">QUANTIDADE:</label>
							<input type="number" id="QUANTIDADE1" name="QUANTIDADE1" class="form-control" required="true" value="1">
						</div>


						<div class="col-lg-4 cert_geral" style="display:none">
							<br><br>
							<label for="country">SELO:</label>
							<input type="text" id="SELO1" name="SELO1" class="form-control" required="true">
						</div>

						<div class="col-lg-3 cert_geral" style="display:none">
							<br><br><br>
							<a class="btn btn-info btn-lg" id="botaosolicitaselo1" onclick="selocertidao(1)"> <i class="ni ni-curved-next"></i> 	SOLICITAR SELO</a>
						</div> 
					<div class="col-lg-12 cert_geral custom-control custom-checkbox" style="display:none">
						<br>
           <input class="custom-control-input" id="CHECKSELOISENTO1" onclick="verificaisento(1)" value="1" type="checkbox">
           <label style="margin-left: 1.6%;" class="custom-control-label" for="CHECKSELOISENTO1">
            <span>SELO ISENTO</span>
          </label>
          <textarea style="display:none" class="form-control" id="MOTIVOSELOISENTO1" name="MOTIVOSELOISENTO1" rows="5" placeholder="INFORME O MOTIVO DA INSENÇÃO"></textarea>
          </div>

					</div>
					<div class="row" id="addatosmais">
					</div>
				</form>              
				<div class="row">
					<div class="col-lg-12 cert_geral" style="display:none">
						<br><br>
						<button class="btn btn-default btn-lg btn-block" onclick="addatocert()"> <i class="ni ni-fat-add"></i> 	ADICIONAR MAIS ATOS</button>
					</div>

					<div class="col-lg-6" >
						<br><br>
						<a class="btn btn-info btn-lg btn-block" onclick="irparacertidao()"> <i style="font-size:40px" class="fa fa-print"></i><br> IR PARA CERTIDÃO</a>
					</div>

					<div class="col-lg-6" >
						<br><br>
						<a style="color:white!important" class="btn btn-primary btn-lg btn-block" onclick="previewcertidao()"> <i style="font-size:40px" class="fa fa-eye"></i><br> PRÉ VISUALIZAR</a>
					</div>
				</div>             

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
			</div>
		</div>
	</div>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////-->


<datalist id="atosliberados">
	<option style="max-width: 100%;font-size: 70%" value="14.5.1">14.5.1 Certidão com uma folha</option>
	<option style="max-width: 100%;font-size: 70%" value="14.5.6">14.5.6 Certidões de inteiro teor</option>
	<option style="max-width: 100%;font-size: 70%" value="14.5.6.1">14.5.6.1 Por folha acrescida além da primeira, mais...</option>
	<option style="max-width: 100%;font-size: 70%" value="14.5.7">14.5.7 Certidão Eletrônica com buscas e folhas excedentes incluídas</option>
	<option style="max-width: 100%;font-size: 70%" value="14.5.5">14.5.2 	Por folha acrescida além da primeira, mais...</option>
	<option style="max-width: 100%;font-size: 70%" value="14.5.5">14.5.5 Certidão de Casamento Comunitário autorizado ou realizado pelo Poder Judiciário</option>


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


	<option style="max-width: 100%;font-size: 70%" value="14.6.1">14.6.1 Das buscas Até dois anos</option>
	<option style="max-width: 100%;font-size: 70%" value="14.6.2">14.6.2 Das buscas Até cinco anos</option>
	<option style="max-width: 100%;font-size: 70%" value="14.6.3">14.6.3 Das buscas Até dez anos</option>
	<option style="max-width: 100%;font-size: 70%" value="14.6.4">14.6.4 Das buscas Até quinze anos</option>
	<option style="max-width: 100%;font-size: 70%" value="14.6.5">14.6.5 Das buscas Até vinte anos</option>
	<option style="max-width: 100%;font-size: 70%" value="14.6.6">14.6.6 Das buscas Até trinta anos</option>
	<option style="max-width: 100%;font-size: 70%" value="14.6.7">14.6.7 Das buscas Até cinquenta anos</option>
	<option style="max-width: 100%;font-size: 70%" value="14.6.8">14.6.8 Das buscas Até acima de cinquenta anos</option>
	<option style="max-width: 100%;font-size: 70%" value="14.6.9">14.6.9 Se indicados dia, mês e ano da prática do ato, ou número e livro corretos do ato não serão cobradas buscas.</option>


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


<div id="cancelarreg" class="modal fade"  tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CANCELAMENTO DE REGISTRO</h5>
        <input id="tipopartebuscar" type="hidden"></input>
        <input type="hidden" id="idreg2">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
          	<form method="POST" action="control/cancelar-nascimento.php?id=<?=$id?>">
            <label for="country">INFORME O MOTIVO DE ESTAR CANCELANDO O REGISTRO: </label>
            <textarea class="form-control" name="motivocancelamento" id="motivocancelamento" minlength="30" placeholder="No mínimo 30 caracteres" rows="5"></textarea>
            <br>

            <button type="submit" class="btn btn-block btn-danger"><i class="fa fa-close"></i> CANCELAR REGISTRO</button>
            </form>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>