<?php include('../controller/db_functions.php');
session_start();
$pdo=conectar();
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
include('obito-db.php');
?>


<section class="content" style="margin-left: 30px"  >
        <div class="container-fluid">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header row">
                           <h2 class="col-md-6">Cadastro de Registro de Obito</h2>
						<?php if ($parte4 == 'in active'): ?>
						<a class="btn bg-blue col-md-3 badge" target="_blank" href="PDFS/preview-pdf-obito?id=<?=$id?>&preview=ok"><i class="material-icons">receipt</i>PRÉ VISUALIZAR CERTIDÃO</a>
						<a class="btn bg-grey col-md-3 badge" target="_blank" href="PDFS/pdf-obito-livro?id=<?=$id?>&preview=ok"><i class="material-icons">description</i>PRÉ VISUALIZAR TERMO</a>
						<?php endif ?>
                        </div>
                        <div class="body">
                            <!-- Nav tabs -->

                                 <ul class="nav nav-tabs" role="tablist">



                                <li id="li1" role="presentation" class="<?=$parte1?>">
                                    <a  href="#dadosObito" data-toggle="tab">
                                       <i  class="material-icons">account_box</i>Dados Óbito
                                    </a>
                                </li>
                                 
                                <li id="li2" role="presentation" class="<?=$parte2?>" >
                                    <a  href="#dadosPessoais" data-toggle="tab">
                                        <i class="material-icons">feedback</i>Dados Pessoais
                                    </a>
                                </li>
								<li id="li3" role="presentation" class="<?=$parte3?>">
								<a href="#detalheTestemunhas"  data-toggle="tab">
								<i class="material-icons">person_add</i> Testemunhas
								</a>
								</li>
								<!--li id="li4" role="presentation" >
								<a href="#assento" data-toggle="tab">
								<i class="material-icons">feedback</i>  Assento
								</a>
								</li-->
                                   <li role="presentation"  >
                                    <a  href="#docsAd" data-toggle="tab">
                                        <i class="material-icons">feedback</i>Documentos Ad.
                                    </a>
                                </li>

                                  <li id="li1" role="presentation" class="<?=$parte4?>" >
                                    <a  href="#dadosregistro" data-toggle="tab" onclick="swal('ATENÇÃO','ATENÇÃO ANTES DE PROSSEGUIR PARA A FINALIZAÇÃO DO ATO CERTIFIQUE-SE DE TER PREENCHIDO TODOS OS DADOS CORRETAMENTE. CASO SIM PROSSIGA!')">
                                       <i  class="material-icons">account_box</i>Dados do Registro
                                    </a>
                                </li>

								<li id="li3" role="presentation" class="<?=$parte3?>" >
								<a href="#dadosadicionais"  data-toggle="tab">
								<i class="material-icons">note_add</i> Dados Adicionais
								</a>
								</li>


                            </ul>

                            <div class="tab-content">
<!--================================================================= DADOS ÓBTIO ==================================================--> 
	<div role="tabpanel" id="dadosObito" class="tab-pane fade <?=$parte1?>">
		<form id="formdadosobito" method="POST" action="../bd_UPDATE/update-obito.php?id=<?=$id?>"> 	
		 		
								<br>	
						  <div class="row">
									<div class="col-sm-6">
										<label class="col-md-4 control-label" for="strFolha">TIPO DE ASSENTO:</label>
										<div class="col-md-8"><div class="form-line">
										<div class="form-line">
										<select id="TIPOASSENTO" name="TIPOASSENTO" class="form-control" required="">
										<!-- <option value="">Selecione</option> -->
										<option value="COMUN">COMUM</option>
										<!-- <option value="ORDEM">ORDEM JUDICIAL</option> -->
										</select>
										</div>
										</div>
										</div>
									</div>
									<div class="col-sm-6">
									<label class="col-md-4 control-label">N D.O:</label>
									<div class="form-line">
									<div class="col-md-8">
									<input type="text" id="NDO" name="NDO" class="form-control ndo" placeholder=" " >
									</div>
									</div>
									</div>
								
							</div>		
				
							 		 <legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">person</i> DADOS DO DECLARANTE</legend>

					<div class="row">		
										<div class="col-sm-6" >
										<label class="control-label col-md-4">DECLARANTE:</label>
										<div class="col-md-8" id="dec">
										<input type="text" id="QUALIDADEDECLARANTE" name="QUALIDADEDECLARANTE" class="form-control"  placeholder="NA QUALIDADE DE...">
										</div>
										</div>
										<div class="col-sm-6 declarante">
										<label class="control-label col-md-4">NOME:</label>
										<div class="col-md-8">
										<input type="text" id="NOMEDECLARANTE" name="NOMEDECLARANTE" class="form-control"  placeholder="NOME COMPLETO">
										</div>
										</div>
										<div class="col-sm-6 declarante">
										<label class="col-md-4 control-label">CPF:</label>
										<div class="col-md-8">
										<input type="text" name="CPFDECLARANTE" id="CPFDECLARANTE" class="form-control cpf" maxlength="20"  placeholder="">
										<div id="resultadodeclarante"></div>
										</div>
										<script type="text/javascript">
										$("#CPFDECLARANTE").blur(function (e) {
										var seloCod = $(this).val();
										$.post('../consultas/validador-cpf-pessoas.php', {'seloCodigo':seloCod}, function(data) {
										$("#resultadodeclarante").html(data);
										});
										});
										</script>
										</div>

										<div class="col-sm-6 declarante">
										<label class="col-md-4 control-label">RG:</label>
										<div class="col-md-8">
										<input type="text" name="RGDECLARANTE" id="RGDECLARANTE" class="form-control" maxlength="20"  placeholder="ex: 0000000000-0">
										</div>
										</div>
										<div class="col-sm-6 declarante" id="ORGDEC">
										<label class="col-md-4 control-label">ÓRGÃO EMISSOR:</label>
										<div class="col-md-8">
										<input type="text" class="form-control" name="ORGAOEMISSORDECLARANTE" id="ORGAOEMISSORDECLARANTE">	
										</div>
										</div>

										<div class="col-sm-6 declarante">
										<label class="col-md-4 control-label">NACIONALIDADE:</label>
										<div class="col-md-8">
										<input type="text" name="NACIONALIDADEDECLARANTE" id="NACIONALIDADEDECLARANTE" class="form-control" maxlength="100"  placeholder="">
										</div>
										</div>

										<div class="col-sm-6 declarante">
										<label class="col-md-4 control-label">NATURALIDADE:</label>
										<div class="col-md-8">
										<input type="text" name="NATURALIDADEDECLARANTE" id="NATURALIDADEDECLARANTE" class="form-control" maxlength="100"  placeholder="clique para pesquisar" readonly="">
										</div>
										</div>

										<div class="col-sm-6 declarante">
										<label class="col-md-4 control-label">DATA DE NASCIMENTO:</label>
										<div class="col-md-8">
										<input type="date" name="DATANASCIMENTODECLARANTE" id="DATANASCIMENTODECLARANTE" class="form-control text-center"  >
										</div>
										</div>

										<div class="col-sm-6 declarante" id="SEXDEC">
										<label class="col-md-4 control-label">SEXO:</label>
										<div class="col-md-8">
										<select name="SEXODECLARANTE" id="SEXODECLARANTE" class="form-control text-center" >
										<option value="">Selecione</option>
										<option value="M">MASCULINO</option>
										<option value="F">FEMININO</option>
										</select>
										</div>
										</div>

										<div class="col-sm-6 declarante" id="ECDEC">
										<label class="col-md-4 control-label">ESTADO CIVIL:</label>
										<div class="col-md-8">
										<select id="ESTADOCIVILDECLARANTE" name="ESTADOCIVILDECLARANTE" class="form-control">
										<option value="">Selecione</option>
										<option value="SO">Solteiro (a)</option>
										<option value="CA">Casado (a)</option>
										<option value="DI">Divorciado(a)</option>
										<option value="VI">Viúvo (a)</option>
										<option value="UN">União Estável</option>
										<option value="SJ">Separado Judicialmente</option>
										</select>
										</div>
										</div>

										<div class="col-sm-6 declarante">
										<label class="col-md-4 control-label">PROFISSÃO:</label>
										<div class="col-md-8">
										<input type="text" name="PROFISSAODECLARANTE" id="PROFISSAODECLARANTE" class="form-control" maxlength="100"  placeholder="">
										</div>
										</div>  

										<div class="col-sm-6 declarante">
										<label class="col-md-4 control-label">ENDEREÇO:</label>
										<div class="col-md-8">
										<input type="text" name="ENDERECODECLARANTE" id="ENDERECODECLARANTE" class="form-control" maxlength="100"  placeholder="RUA, Nº ">
										</div>
										</div>

										<div class="col-sm-6 declarante">
										<label class="col-md-4 control-label">BAIRRO:</label>
										<div class="col-md-8">
										<input type="text" name="BAIRRODECLARANTE" id="BAIRRODECLARANTE" class="form-control" maxlength="100"  placeholder="">
										</div>
										</div>

										<div class="col-sm-6 declarante">
										<label class="col-md-4 control-label">CIDADE (DECLARANTE):</label>
										<div class="col-md-8">
										<input type="text" name="CIDADEDECLARANTE" id="CIDADEDECLARANTE" class="form-control" maxlength="100"  placeholder="clique para pesquisar" readonly="">
										</div>
										</div>
											<div class="col-sm-12 declarante" >
											<div class="col-md-2" >
											<input type="checkbox" id="rogoDECLARANTE" value="" onclick="$('#ROGODECLARANTE').toggle();" />
											<label for="rogoDECLARANTE">Ass. Rogo</label>
											</div>
											<div class="col-md-4" id="ROGODECLARANTE">
											<input type="text" id="ROGODECLARANTE" name="ROGODECLARANTE" class="form-control input-md cpf rogocpf" />
											<span style="color:red">Preencha o cpf do assinante a rogo, o mesmo deve estar cadastrado no cadastro de pessoas</span>
											</div>
											</div>
											<legend class="oj">DADOS ORDEM JUDICIAL</legend>
											<div class="col-sm-6 oj " >
											<label  class="col-md-4 control-label" for="JUIZMANDATO">Juiz:</label>
											<div class="col-md-8" >  <div class="form-line">
											<input type="text" id="JUIZMANDATO" name="JUIZMANDATO" class="form-control input-md nascordemjud" placeholder="" />
											</div>
											</div>
											</div>

											<div class="col-sm-6 oj" >
											<label  class="col-md-4 control-label" for="VARAMANDATO">Vara:</label>
											<div class="col-md-8" >  <div class="form-line">
											<input type="text" id="VARAMANDATO" name="VARAMANDATO" class="form-control input-md nascordemjud" placeholder="" />
											</div>
											</div>
											</div>

											<div class="col-sm-6 oj" >
											<label class="col-md-4 control-label" for="DATAEXPEDICAOMANDATO">Data de Expedição:</label>
											<div class="col-md-8" >  <div class="form-line">
											<input type="date" id="DATAEXPEDICAOMANDATO" name="DATAEXPEDICAOMANDATO" class="form-control input-md nascordemjud" placeholder="" />
											</div>
											</div>
											</div>

											<div class="col-sm-6 oj" >
											<label class="col-md-4 control-label" for="NUMEROMANDATO">Número:</label>
											<div class="col-md-8" >  <div class="form-line">
											<input type="text" id="NUMEROMANDATO" name="NUMEROMANDATO" class="form-control input-md nascordemjud" placeholder="" />
											</div>
											</div>
											</div>


											<div class="col-sm-6 oj" >
											<label  class="col-md-4 control-label" for="DATASENTENCAMANDATO">Data da Sentença:</label>
											<div class="col-md-8" >  <div class="form-line">
											<input type="date" id="DATASENTENCAMANDATO" name="DATASENTENCAMANDATO" class="form-control input-md nascordemjud" placeholder="" />
											</div>
											</div>
											</div>


	                </div>
	                	<legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">person</i> DADOS DO FALECIMENTO</legend>
	                <div class="row">
							<div class="col-sm-6">
							<label  class="col-md-4 control-label">Local óbito:</label>
							<div class="form-line">
							<div class="col-md-8">
							<input type="text" id="LOCALMORTE" name="LOCALMORTE" class="form-control " placeholder=" " required>
							</div>
							</div>
							</div>
							<div class="col-sm-6" >

							<label class="col-md-4 control-label" for="ENDERECOOBITO">Endereço:</label>
							<div class="col-md-8" >

							<input type="text" id="ENDERECOOBITO" name="ENDERECOOBITO" class="form-control" placeholder="Rua, Nº" />
							</div>
							</div>


							<div class="col-sm-6" >

							<label class="col-md-4 control-label" for="TIPOLOCALOBITO">Tipo de local ÓBITO:</label>
							<div class="col-md-8" >

							<select id="TIPOLOCALOBITO" name="TIPOLOCALOBITO" class="form-control ">
							<option>IGNORADO</option>
							<option>AMBULANCIA</option>
							<option>DOMICILIO</option>
							<option>HOSPITAL</option>
							<option>OUTRO</option>
							<option>OUTROS_SERVICOS_SAUDE</option>
							<option>POSTO_SAUDE</option>
							<option>VIA_PUBLICA</option>
							</select>
							</div>
							</div>


							<!-- Cidade / Pesquisar no banco de dados-->
							<div class="col-sm-6" >
							<label class="col-md-4 control-label" for="CIDADEOBITO">Cidade*:</label>
							<div class="col-md-8">
							<input id="CIDADEOBITO" name="CIDADEOBITO" type="text" class="form-control" required="" placeholder="CLIQUE PARA Pesquisar" readonly="">
							</div>
							</div>


							<div class="col-sm-6" >

							<label class="col-md-4 control-label">Data:</label>
							<div class="col-md-8">
							<input id="DATAOBITO" name="DATAOBITO" type="date" class="form-control" required="">

							</div>
							</div>
							<div class="col-sm-6" >

							<label class="col-md-4 control-label">Hora:</label>
							<div class="col-md-8">
							<input id="HORAOBITO" name="HORAOBITO" type="time" class="form-control" >
							</div>
							</div>

							<div class="col-sm-6" >
							<label class="col-md-4 control-label" for="strCausaMorte">Causa Morte Antecedentes a.*:</label>
							<div class="col-md-8">
							<input  type="text" id="CAUSAOBITO" name="CAUSAOBITO" class="form-control" placeholder="" />
							</div>
							<label class="col-md-4 control-label" for="strCausaMorte">b*:</label>
							<div class="col-md-8">
							<input  type="text" id="CAUSAOBITOB" name="CAUSAOBITOB" class="form-control" placeholder="" />
							</div>
							<label class="col-md-4 control-label" for="strCausaMorte">C*:</label>
							<div class="col-md-8">
							<input  type="text" id="CAUSAOBITOC" name="CAUSAOBITOC" class="form-control" placeholder="" />
							</div>
							<label class="col-md-4 control-label" for="strCausaMorte">d*:</label>
							<div class="col-md-8">
							<input  type="text" id="CAUSAOBITOD" name="CAUSAOBITOD" class="form-control" placeholder="" />
							</div>
							</div>


							<div class="col-sm-6" >


							<label class="col-md-4 control-label" for="TIPOMORTE">Tipo MORTE*:</label>

							<div class="col-md-8">
							<select  id="TIPOMORTE" name="TIPOMORTE" class="form-control" required="">
							<option value="">SELECIONE</option>
							<option value="NAT">Natural</option>
							<option value="VIO">Violenta</option>
							</select>


							</div>
							</div>
							
							<div class="col-sm-6" >

							<label class="col-md-4 control-label" for="LOCALSEPULTAMENTO">Local Sepultameto*:</label>
							<div class="col-md-8">
							<input id="LOCALSEPULTAMENTO" name="LOCALSEPULTAMENTO" type="text" class="form-control" required="">
							</div>
							</div>

							<div class="col-sm-6" >
							<label class="col-md-4 control-label" for="MEDICO">Medico:</label>
							<div class="col-md-8">
							<input type="text" id="MEDICO" name="MEDICO" class="form-control" placeholder="Nome do Médico" />
							</div>
							</div>


							<div class="col-sm-6" >
							<label class="col-md-4 control-label" for="CRM">CRM/UF:</label>
							<div class="col-md-4">
							<input  id="CRM" name="CRM" type="text" class="form-control"  placeholder="SOMENTE NUMEROS">
							<script type="text/javascript">
								$('#CRM').blur(function(){
									var crm = $(this).val();
									crm = crm.replace(/[^\d]+/g,'');
									$('#CRM').val(crm);
								});
							</script>
							</div>
							<div class="col-md-4">
								<input type="text" name="UFCRM" id="UFCRM" placeholder="UF" class="form-control">
							</div>	
							</div>
	                </div>
	                  <div class="row">
	                        <div class="col-sm-10"> </div>
		                       <div class="col-sm-2">  
		                            <br><br>
		                            <button type="subimit" name="subimit1" class=" btn waves-effect bg-green"><i class="material-icons">save</i>SALVAR</button>
		                        </div>
	                    </div>
		</form>
	</div>  
<!--=================================================================================================================================-->
<!--================================================================= DADOS PESSOAIS ================================================--> 
	<div role="tabpanel" id="dadosPessoais" class="tab-pane <?=$parte2?>">
				<form id="formdadospessoais" method="POST" action="../bd_UPDATE/update-obito.php?id=<?=$id?>">	
			                                           <legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">person</i> QUALIFICAÇÃO</legend>   
                        <div class="row clearfix">
                               <div class="col-sm-9"></div>   
                                <div class="col-sm-2 bot_direita">
                                <a class="btn waves-effect bg-indigo" id="botao"><i class="material-icons">person</i><b>+</b> BUSCAR NOS REGISTROS</a>
                                </div>
                                <div class="col-sm-12"></div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">Nome:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NOME" id="NOME" class="form-control dados" maxlength="200" required="" placeholder="NOME COMPLETO">
                                    </div>
                                </div>

                                <div class="col-sm-6 somenatimorto">
                                    <label class="col-md-4 control-label">CPF:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CPF" id="CPF" class="form-control cpf dados" maxlength="20"  placeholder="">
                                        <div id="resultadocpf"></div>
                                    </div>
                                    <script type="text/javascript">
										$("#CPF").blur(function (e) {
										var seloCod = $(this).val();
										$.post('../consultas/validador-cpf-pessoas.php', {'seloCodigo':seloCod}, function(data) {
										$("#resultadocpf").html(data);
										});
										});
										</script>
                                </div>

                                <div class="col-sm-6 somenatimorto">
                                    <label class="col-md-4 control-label">RG:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="RG" id="RG" class="form-control dados" maxlength="20"  placeholder="ex: 0000000000-0">
                                    </div>
                                </div>
                                     <div class="col-sm-6 somenatimorto" id="ORG">
                                    <label class="col-md-4 control-label">ÓRGÃO EMISSOR:</label>
                                    <div class="col-md-8">
                                    	<input type="text" class="form-control dados" name="ORGAOEMISSOR" id="ORGAOEMISSOR">
                                    </div>
                                </div>

                                <div class="col-sm-6 somenatimorto">
                                    <label class="col-md-4 control-label">NACIONALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NACIONALIDADE" id="NACIONALIDADE" class="form-control dados" maxlength="100"  placeholder="">
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NATURALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NATURALIDADE" id="NATURALIDADE" class="form-control dados" maxlength="100"  placeholder="clique para pesquisar" readonly="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">DATA DE NASCIMENTO:</label>
                                    <div class="col-md-8">
                                        <input type="date" name="DATANASCIMENTO" id="DATANASCIMENTO" class="form-control dados text-center"  placeholder="clique para pesquisar">
                                    </div>
                                </div>

                                <div class="col-sm-6" id="SEX">
                                    <label class="col-md-4 control-label">SEXO:</label>
                                    <div class="col-md-8">
                                        <select name="SEXO" id="SEXO" class="form-control dados text-center" required="">
                                            <option value="">Selecione</option>
                                            <option value="M">MASCULINO</option>
                                            <option value="F">FEMININO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6" >
									<label class="col-md-4 control-label">Cor*:</label>
									<div class="col-md-8">
									<select  id="COR" name="COR"  class="form-control">
									<option value=""> Selecione </option>
									<option value="BR">Branca</option>
									<option value="PR">Preta</option>
									<option value="PA">Parda</option>
									<option value="AM">Amarela</option>
									<option value="IN">Indígena</option>
									</select>
									</div>
								</div>
								<div class="col-sm-6">
									<label class="col-md-4 control-label">Gêmeo:*</label>
									<div class="col-md-8">
									<select  id="GEMEO" name="GEMEO" class="form-control" >
									<option value="" > Selecione </option>
									<option value="S">SIM</option>
									<option value="N">NÃO</option>
									</select>
									</div>

									</div>

								<div class="col-sm-6 somenatimorto" >
									<label class="col-md-4 control-label">Deixou Filhos?*:</label>
									<div class="col-md-8">
									<select  id="DEIXOUFILHOS" name="DEIXOUFILHOS" class="form-control ">
									<option value=""> Selecione </option>
									<option value="S">Sim</option>
									<option value="N">Não</option>
									</select>
									</div>
								</div>
								<div class="col-sm-6 somenatimorto" id="sefilhos">
									<label class="col-md-4 control-label">Nome Filhos:</label>
									<div class="col-md-8">
										<textarea class="form-control" name="NOMEFILHOS" id="NOMEFILHOS" placeholder="Nome, Idade"></textarea>
									</div>
								</div>

								<div class="col-sm-6 somenatimorto" >
									<label class="col-md-4 control-label">Eleitor?*:</label>
									<div class="col-md-8">
									<select  id="ELEITOR" name="ELEITOR"  class="form-control">
									<option value=""> Selecione </option>
									<option value="S">Sim</option>
									<option value="N">Não</option>
									</select>
									</div>
								</div>
								<script type="text/javascript">
									$('#ELEITOR').change(function(){
										if ($(this).val()=='S') {
										$('#titulodiv').css("display", 'block');
										}
										else{
										$('#titulodiv').css("display", 'none');	
										}
									});
								</script>
								
								<div class="col-sm-6" id="titulodiv">
                                <label class="col-md-4 control-label">Nº TITULO ELEITOR:</label>
                                <div class="col-md-8">
                                    <input type="text" name="strTituloEleitor" id="strTituloEleitor2" class="form-control dados"  placeholder="">
                                </div>
                                </div> 


								<div class="col-sm-6 somenatimorto" >
									<label class="col-md-4 control-label">Deixou Bens?*:</label>
									<div class="col-md-8">
									<select  id="DEIXOUBENS" name="DEIXOUBENS"  class="form-control">
									<option value=""> Selecione </option>
									<option value="S">Sim, com Testamento conhecido</option>
									<option value="S2">Sim, sem Testamento conhecido</option>
									<option value="N">Não, com testamento conhecido</option>
									<option value="N2">Não, sem testamento conhecido</option>

									</select>
									</div>
								</div>  

                                <div class="col-sm-6 somenatimorto" id="EC">
                                    <label class="col-md-4 control-label">ESTADO CIVIL:</label>
                                    <div class="col-md-8">
                                        <select id="ESTADOCIVIL" name="ESTADOCIVIL" class="form-control dados">
                                            <option value="">Selecione</option>
                                            <option value="SO">Solteiro (a)</option>
                                            <option value="CA">Casado (a)</option>
                                            <option value="DI">Divorciado(a)</option>
                                            <option value="VI">Viúvo (a)</option>
                                            <option value="UN">União Estável</option>
                                            <option value="SJ">Separado Judicialmente</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6 somenatimorto secasado">
                                <label class="col-md-4 control-label">CONJUGE:</label>
                                <div class="col-md-8">
                                    <input type="text" name="NOMECONJUGE" id="NOMECONJUGE" class="form-control dados"  placeholder="">
                                </div>
                                </div> 
                                <div class="col-sm-6 somenatimorto secasado">
                                <label class="col-md-4 control-label">CARTÓRIO CASAMENTO:</label>
                                <div class="col-md-8">
                                    <input type="text" name="CARTORIOCASAMENTO" id="CARTORIOCASAMENTO" class="form-control dados"  placeholder="">
                                </div>
                                </div> 

                                
                                <div class="col-sm-6 somenatimorto">
                                <label class="col-md-4 control-label">PROFISSÃO:</label>
                                <div class="col-md-8">
                                    <input type="text" name="PROFISSAO" id="PROFISSAO" class="form-control dados" maxlength="100"  placeholder="">
                                </div>
                                </div>
                                <div class="col-sm-6 somenatimorto">
                                <label class="col-md-4 control-label">ENDEREÇO:</label>
                                <div class="col-md-8">
                                    <input type="text" name="ENDERECO" id="ENDERECO" class="form-control dados" maxlength="100"  placeholder="RUA, Nº">
                                </div>
                                </div>
                                <div class="col-sm-6 somenatimorto">
                                    <label class="col-md-4 control-label">BAIRRO:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="BAIRRO" id="BAIRRO" class="form-control dados" maxlength="100" placeholder="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CIDADE" id="CIDADE" class="form-control dados" maxlength="100"  placeholder="clique para pesquisar" readonly="">
                                    </div>
                                </div>
                              	<div class="col-sm-6" >
									<label class="col-md-4 control-label" for="">TEMPO VIDA INTRAUTERINA (SEMANAS):</label>
									<div class="col-md-8">
									<input  id="TEMPOINTRAUTERINA" name="TEMPOINTRAUTERINA" type="number" min="0" class="form-control" >
									</div>
								</div>

                        </div>
                        		                                           <legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">person</i> QUALIFICAÇÃO PAI</legend>   
                        <div class="row clearfix">
                               <div class="col-sm-8"></div>   
                                 <div class="col-sm-2">
                                 	<a onclick="$('.dadospai').val(null).prop('required', false).prop('disabled',true).toggle()" class="btn waves-effect bg-black"><i class="material-icons">close</i> NÃO DECLARADO</a>
                                 </div>	
                                <div class="col-sm-2 botadireita">
                                <a class="btn waves-effect bg-indigo" id="botaopai"><i class="material-icons">person</i><b>+</b> BUSCAR NOS REGISTROS</a>
                                </div>
                                <div class="col-sm-12"></div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">Nome:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NOMEPAI" id="NOMEPAI" class="form-control dadospai" maxlength="200" required="" placeholder="NOME COMPLETO">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CPF:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CPFPAI" id="CPFPAI" class="form-control cpf dadospai" maxlength="20" required="" placeholder="">
                                        <div id="resultadopai"></div>
                                    </div>
                                    <script type="text/javascript">
										$("#CPFPAI").blur(function (e) {
										var seloCod = $(this).val();
										$.post('../consultas/validador-cpf-pessoas.php', {'seloCodigo':seloCod}, function(data) {
										$("#resultadopai").html(data);
										});
										});
									</script>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">RG:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="RGPAI" id="RGPAI" class="form-control dadospai" maxlength="20" required="" placeholder="ex: 0000000000-0">
                                    </div>
                                </div>
                                     <div class="col-sm-6" id="ORGPAI">
                                    <label class="col-md-4 control-label">ÓRGÃO EMISSOR:</label>
                                    <div class="col-md-8">
                                    	<input type="text" class="form-control dadospai" name="ORGAOEMISSORPAI" id="ORGAOEMISSORPAI" required="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NACIONALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NACIONALIDADEPAI" id="NACIONALIDADEPAI" class="form-control dadospai" maxlength="100" required="" placeholder="">
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NATURALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NATURALIDADEPAI" id="NATURALIDADEPAI" class="form-control dadospai" maxlength="100" required="" placeholder="clique para pesquisar" readonly="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">DATA DE NASCIMENTO:</label>
                                    <div class="col-md-8">
                                        <input type="date" name="DATANASCIMENTOPAI" id="DATANASCIMENTOPAI" class="form-control dadospai text-center" required="" placeholder="clique para pesquisar">
                                    </div>
                                </div>

                                <div class="col-sm-6" id="SEXPAI">
                                    <label class="col-md-4 control-label">SEXO:</label>
                                    <div class="col-md-8">
                                        <select name="SEXOPAI" id="SEXOPAI" class="form-control dadospai text-center" required="">
                                            <option value="">Selecione</option>
                                            <option value="M">MASCULINO</option>
                                            <option value="F">FEMININO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6" id="ECPAI">
                                    <label class="col-md-4 control-label">ESTADO CIVIL:</label>
                                    <div class="col-md-8">
                                        <select id="ESTADOCIVILPAI" name="ESTADOCIVILPAI" class="form-control dadospai">
                                            <option value="">Selecione</option>
                                            <option value="SO">Solteiro (a)</option>
                                            <option value="CA">Casado (a)</option>
                                            <option value="DI">Divorciado(a)</option>
                                            <option value="VI">Viúvo (a)</option>
                                            <option value="UN">União Estável</option>
                                            <option value="SJ">Separado Judicialmente</option>
                                        </select>
                                    </div>
                                </div>       
                                
                                <div class="col-sm-6">
                                <label class="col-md-4 control-label">PROFISSÃO:</label>
                                <div class="col-md-8">
                                    <input type="text" name="PROFISSAOPAI" id="PROFISSAOPAI" class="form-control dadospai" maxlength="100" required="" placeholder="">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <label class="col-md-4 control-label">ENDEREÇO:</label>
                                <div class="col-md-8">
                                    <input type="text" name="ENDERECOPAI" id="ENDERECOPAI" class="form-control dadospai" maxlength="100" required="" placeholder="RUA, Nº">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">BAIRRO:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="BAIRROPAI" id="BAIRROPAI" class="form-control dadospai" maxlength="100" required="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CIDADEPAI" id="CIDADEPAI" class="form-control dadospai" maxlength="100" required="" placeholder="clique para pesquisar" readonly="">
                                    </div>
                                </div>

                        </div>
                        		                   <legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">person</i> QUALIFICAÇÃO MÃE</legend>   
                        <div class="row clearfix">
                               <div class="col-sm-8"></div>   
                                 <div class="col-sm-2">
                                 	<a onclick="$('.dadosmae').val(null).prop('required', false).prop('disabled',true).toggle()" class="btn waves-effect bg-black"><i class="material-icons">close</i> NÃO DECLARADO</a>
                                 </div>	
                                <div class="col-sm-2 botadireita">
                                <a class="btn waves-effect bg-indigo" id="botaomae"><i class="material-icons">person</i><b>+</b> BUSCAR NOS REGISTROS</a>
                                </div>
                                <div class="col-sm-12"></div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">Nome:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NOMEMAE" id="NOMEMAE" class="form-control dadosmae " maxlength="200" required="" placeholder="NOME COMPLETO">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CPF:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CPFMAE" id="CPFMAE" class="form-control dadosmae cpf" maxlength="20" required="" placeholder="">
                                        <div id="resultadomae"></div>
                                    </div>
                                    <script type="text/javascript">
										$("#CPFMAE").blur(function (e) {
										var seloCod = $(this).val();
										$.post('../consultas/validador-cpf-pessoas.php', {'seloCodigo':seloCod}, function(data) {
										$("#resultadomae").html(data);
										});
										});
										</script>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">RG:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="RGMAE" id="RGMAE" class="form-control dadosmae" maxlength="20" required="" placeholder="ex: 0000000000-0">
                                    </div>
                                </div>
                                     <div class="col-sm-6" id="ORGMAE">
                                    <label class="col-md-4 control-label">ÓRGÃO EMISSOR:</label>
                                    <div class="col-md-8">
                                        <input type="text" class="form-control dadosmae" name="ORGAOEMISSORMAE" id="ORGAOEMISSORMAE" required="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NACIONALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NACIONALIDADEMAE" id="NACIONALIDADEMAE" class="form-control dadosmae" maxlength="100" required="" placeholder="">
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NATURALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NATURALIDADEMAE" id="NATURALIDADEMAE" class="form-control dadosmae" maxlength="100" required="" placeholder="clique para pesquisar" readonly="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">DATA DE NASCIMENTO:</label>
                                    <div class="col-md-8">
                                        <input type="date" name="DATANASCIMENTOMAE" id="DATANASCIMENTOMAE" class="form-control dadosmae text-center" required="" placeholder="clique para pesquisar">
                                    </div>
                                </div>

                                <div class="col-sm-6" id="SEXMAE">
                                    <label class="col-md-4 control-label">SEXO:</label>
                                    <div class="col-md-8">
                                        <select name="SEXOMAE" id="SEXOMAE" class="form-control dadosmae text-center" required="">
                                            <option value="">Selecione</option>
                                            <option value="M">MASCULINO</option>
                                            <option value="F">FEMININO</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6" id="ECMAE">
                                    <label class="col-md-4 control-label">ESTADO CIVIL:</label>
                                    <div class="col-md-8">
                                        <select id="ESTADOCIVILMAE" name="ESTADOCIVILMAE" class="form-control dadosmae">
                                            <option value="">Selecione</option>
                                            <option value="SO">Solteiro (a)</option>
                                            <option value="CA">Casado (a)</option>
                                            <option value="DI">Divorciado(a)</option>
                                            <option value="VI">Viúvo (a)</option>
                                            <option value="UN">União Estável</option>
                                            <option value="SJ">Separado Judicialmente</option>
                                        </select>
                                    </div>
                                </div>        
                                
                                <div class="col-sm-6">
                                <label class="col-md-4 control-label">PROFISSÃO:</label>
                                <div class="col-md-8">
                                    <input type="text" name="PROFISSAOMAE" id="PROFISSAOMAE" class="form-control dadosmae" maxlength="100" required="" placeholder="">
                                </div>
                                </div>
                                <div class="col-sm-12" >
                                <div class="col-md-9"></div>  
                                <a onclick="mesmoendereco()" class="badge col-md-3 btn bg-grey" style="margin-left: -15px;"><i class="material-icons">home</i> MESMO ENDEREÇO DO PAI</a>
                                <script type="text/javascript">
                                    function mesmoendereco(){
                                    $('#ENDERECOMAE').val($('#ENDERECOPAI').val());
                                    $('#BAIRROMAE').val($('#BAIRROPAI').val());
                                    $('#CIDADEMAE').val($('#CIDADEPAI').val());
                                    } 
                                </script>
                               
                                </div>

                                <div class="col-sm-6">
                                <label class="col-md-4 control-label">ENDEREÇO:</label>
                                <div class="col-md-8">
                                    <input type="text" name="ENDERECOMAE" id="ENDERECOMAE" class="form-control dadosmae" maxlength="100" required="" placeholder="RUA, Nº">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">BAIRRO:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="BAIRROMAE" id="BAIRROMAE" class="form-control dadosmae" maxlength="100" required="" placeholder="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CIDADEMAE" id="CIDADEMAE" class="form-control dadosmae" maxlength="100" required="" placeholder="clique para pesquisar" readonly="">
                                    </div>
                                </div>

                                 <div class="col-sm-4" >
                                <div class="col-md-12" >
                                <input type="checkbox" id="menorMAE" name="menorMAE" value="S" onclick="$('#RESPMAE').toggle();" />
                                <label for="menorMAE">A MÃE É MENOR</label>
                                </div>
                                </div>
                                <div class="col-md-6" id="RESPMAE">
                                <input type="text" id="RESPONSAVELMAE" name="RESPONSAVELMAE" class="form-control input-md" placeholder="Nome e parentesco separados por virgula, ex: fulana, Mãe"  />
                                </div>

                        </div>
                        <div class="row">
	                        <div class="col-sm-10"> </div>
		                       <div class="col-sm-2">  
		                            <br><br>
		                            <button type="subimit" name="subimit2" class=" btn waves-effect bg-green"><i class="material-icons">save</i>SALVAR</button>
		                        </div>
	                    </div>
	     		</form>               
	</div>
<!--=================================================================================================================================-->
<!--================================================================== DADOS TESTEMUNHAS ============================================ -->
  	
	<div role="tabpanel" class="tab-pane fade <?=$parte3?>" id="detalheTestemunhas" >
	  <form id="formtestemunha" method="POST" action="../bd_UPDATE/update-obito.php?id=<?=$id?>">	
		 <legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">person</i> QUALIFICAÇÃO TESTEMUNHA 1</legend>    
                <div class="row">
                   <div class="col-sm-7"></div>   
                   			<div class="col-sm-2">
                   				<a onclick="$('.testemunhasdados').val(null).prop('required',false).prop('disabled',true)" class="btn waves-effect bg-black"><i class="material-icons">close</i>DISPENSAR TESTEMUNHAS</a>
                   			</div>
                            <div class="col-sm-2 bot_direita">
                            <a class="btn waves-effect bg-indigo" id="botaotestemunha1"><i class="material-icons">person</i><b>+</b> BUSCAR NOS REGISTROS</a>
                            </div>
                            <div class="col-sm-12"></div>   
                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">Nome:</label>
                        <div class="col-md-8">
                            <input type="text" name="NOMETESTEMUNHA1" id="NOMETESTEMUNHA1" class="form-control testemunhasdados" maxlength="200" required="" placeholder="NOME COMPLETO">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">CPF:</label>
                        <div class="col-md-8">
                            <input type="text" name="CPFTESTEMUNHA1" id="CPFTESTEMUNHA1" class="form-control testemunhasdados cpf" maxlength="20" placeholder="">
                            <div id="resultadotestemunha1"></div>
                        </div>
                        <script type="text/javascript">
                                    $("#CPFTESTEMUNHA1").blur(function (e) {
                                    var seloCod = $(this).val();
                                    $.post('../consultas/validador-cpf-pessoas.php', {'seloCodigo':seloCod}, function(data) {
                                    $("#resultadotestemunha1").html(data);
                                    });
                                    });
                                    </script>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">RG:</label>
                        <div class="col-md-8">
                            <input type="text" name="RGTESTEMUNHA1" id="RGTESTEMUNHA1" class="form-control testemunhasdados" maxlength="20" placeholder="ex: 0000000000-0">
                        </div>
                    </div>
                         <div class="col-sm-6" id="ORGTEST1">
                        <label class="col-md-4 control-label">ÓRGÃO EMISSOR:</label>
                        <div class="col-md-8">
                        	<input type="text" class="form-control testemunhasdados" name="ORGAOEMISSORTESTEMUNHA1" id="ORGAOEMISSORTESTEMUNHA1">
                        </div>
                    </div>

                     <div class="col-sm-6">
                        <label class="col-md-4 control-label">PROFISSÃO:</label>
                        <div class="col-md-8">
                            <input type="text" name="PROFISSAOTESTEMUNHA1" id="PROFISSAOTESTEMUNHA1" class="form-control testemunhasdados" maxlength="100" placeholder="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">NACIONALIDADE:</label>
                        <div class="col-md-8">
                            <input type="text" name="NACIONALIDADETESTEMUNHA1" id="NACIONALIDADETESTEMUNHA1" class="form-control testemunhasdados" maxlength="100" placeholder="">
                        </div>
                    </div>

                     <div class="col-sm-6">
                        <label class="col-md-4 control-label">NATURALIDADE:</label>
                        <div class="col-md-8">
                            <input type="text" name="NATURALIDADETESTEMUNHA1" id="NATURALIDADETESTEMUNHA1" class="form-control testemunhasdados" maxlength="100" placeholder="clique para pesquisar" readonly="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">DATA DE NASCIMENTO:</label>
                        <div class="col-md-8">
                            <input type="date" name="DATANASCIMENTOTESTEMUNHA1" id="DATANASCIMENTOTESTEMUNHA1" class="form-control testemunhasdados text-center" placeholder="clique para pesquisar">
                        </div>
                    </div>

                    <div class="col-sm-6" id="SEXTEST1">
                        <label class="col-md-4 control-label">SEXO:</label>
                        <div class="col-md-8">
                            <select name="SEXOTESTEMUNHA1" id="SEXOTESTEMUNHA1" class="form-control testemunhasdados text-center" >
                                <option value="">Selecione</option>
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMININO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6" id="ECTEST1">
                        <label class="col-md-4 control-label">ESTADO CIVIL:</label>
                        <div class="col-md-8">
                            <select id="ESTADOCIVILTESTEMUNHA1" name="ESTADOCIVILTESTEMUNHA1" class="form-control testemunhasdados">
                                <option value="">Selecione</option>
                                <option value="SO">Solteiro (a)</option>
                                <option value="CA">Casado (a)</option>
                                <option value="DI">Divorciado(a)</option>
                                <option value="VI">Viúvo (a)</option>
                                <option value="UN">União Estável</option>
                                <option value="SJ">Separado Judicialmente</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">ENDEREÇO:</label>
                        <div class="col-md-8">
                            <input type="text" name="ENDERECOTESTEMUNHA1" id="ENDERECOTESTEMUNHA1" class="form-control testemunhasdados" maxlength="100" placeholder="RUA, Nº ">
                        </div>
                    </div>
                    
                     <div class="col-sm-6">
                        <label class="col-md-4 control-label">BAIRRO:</label>
                        <div class="col-md-8">
                            <input type="text" name="BAIRROTESTEMUNHA1" id="BAIRROTESTEMUNHA1" class="form-control testemunhasdados" maxlength="100"  placeholder="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">CIDADE:</label>
                        <div class="col-md-8">
                            <input type="text" name="CIDADETESTEMUNHA1" id="CIDADETESTEMUNHA1" class="form-control testemunhasdados" maxlength="100"  placeholder="clique para pesquisar" readonly="">
                        </div>
                    </div>
                </div>
                	<legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">person</i> QUALIFICAÇÃO TESTEMUNHA 2</legend> 
                <div class="row">
                   <div class="col-sm-9"></div>   
                            <div class="col-sm-2 bot_direita">
                            <a class="btn waves-effect bg-indigo" id="botaotestemunha2"><i class="material-icons">person</i><b>+</b> BUSCAR NOS REGISTROS</a>
                            </div>
                            <div class="col-sm-12"></div>   
                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">Nome:</label>
                        <div class="col-md-8">
                            <input type="text" name="NOMETESTEMUNHA2" id="NOMETESTEMUNHA2" class="form-control testemunhasdados" maxlength="200"  placeholder="NOME COMPLETO">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">CPF:</label>
                        <div class="col-md-8">
                            <input type="text" name="CPFTESTEMUNHA2" id="CPFTESTEMUNHA2" class="form-control testemunhasdados cpf" maxlength="20"  placeholder="">
                            <div id="resultadotestemunha2"></div>
                        </div>
                        <script type="text/javascript">
                                    $("#CPFTESTEMUNHA2").blur(function (e) {
                                    var seloCod = $(this).val();
                                    $.post('../consultas/validador-cpf-pessoas.php', {'seloCodigo':seloCod}, function(data) {
                                    $("#resultadotestemunha2").html(data);
                                    });
                                    });
                                    </script>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">RG:</label>
                        <div class="col-md-8">
                            <input type="text" name="RGTESTEMUNHA2" id="RGTESTEMUNHA2" class="form-control testemunhasdados" maxlength="20"  placeholder="ex: 0000000000-0">
                        </div>
                    </div>
                         <div class="col-sm-6" id="ORGTEST2">
                        <label class="col-md-4 control-label">ÓRGÃO EMISSOR:</label>
                        <div class="col-md-8">
                        	<input type="text" class="form-control testemunhasdados" name="ORGAOEMISSORTESTEMUNHA2" id="ORGAOEMISSORTESTEMUNHA2">
                        </div>
                    </div>

                     <div class="col-sm-6">
                        <label class="col-md-4 control-label">PROFISSÃO:</label>
                        <div class="col-md-8">
                            <input type="text" name="PROFISSAOTESTEMUNHA2" id="PROFISSAOTESTEMUNHA2" class="form-control testemunhasdados" maxlength="100"  placeholder="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">NACIONALIDADE:</label>
                        <div class="col-md-8">
                            <input type="text" name="NACIONALIDADETESTEMUNHA2" id="NACIONALIDADETESTEMUNHA2" class="form-control testemunhasdados" maxlength="100"  placeholder="">
                        </div>
                    </div>

                     <div class="col-sm-6">
                        <label class="col-md-4 control-label">NATURALIDADE:</label>
                        <div class="col-md-8">
                            <input type="text" name="NATURALIDADETESTEMUNHA2" id="NATURALIDADETESTEMUNHA2" class="form-control testemunhasdados" maxlength="100"  placeholder="clique para pesquisar" readonly="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">DATA DE NASCIMENTO:</label>
                        <div class="col-md-8">
                            <input type="date" name="DATANASCIMENTOTESTEMUNHA2" id="DATANASCIMENTOTESTEMUNHA2" class="form-control testemunhasdados text-center"  placeholder="clique para pesquisar">
                        </div>
                    </div>

                    <div class="col-sm-6" id="SEXTEST2">
                        <label class="col-md-4 control-label">SEXO:</label>
                        <div class="col-md-8">
                            <select name="SEXOTESTEMUNHA2" id="SEXOTESTEMUNHA2" class="form-control testemunhasdados text-center" >
                                <option value="">Selecione</option>
                                <option value="M">MASCULINO</option>
                                <option value="F">FEMININO</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-6" id="ECTEST2">
                        <label class="col-md-4 control-label">ESTADO CIVIL:</label>
                        <div class="col-md-8">
                            <select id="ESTADOCIVILTESTEMUNHA2" name="ESTADOCIVILTESTEMUNHA2" class="form-control testemunhasdados">
                                <option value="">Selecione</option>
                                <option value="SO">Solteiro (a)</option>
                                <option value="CA">Casado (a)</option>
                                <option value="DI">Divorciado(a)</option>
                                <option value="VI">Viúvo (a)</option>
                                <option value="UN">União Estável</option>
                                <option value="SJ">Separado Judicialmente</option>
                            </select>
                        </div>
                    </div>
                    
                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">ENDEREÇO:</label>
                        <div class="col-md-8">
                            <input type="text" name="ENDERECOTESTEMUNHA2" id="ENDERECOTESTEMUNHA2" class="form-control testemunhasdados" maxlength="100"  placeholder="RUA, Nº ">
                        </div>
                    </div>
                    
                     <div class="col-sm-6">
                        <label class="col-md-4 control-label">BAIRRO:</label>
                        <div class="col-md-8">
                            <input type="text" name="BAIRROTESTEMUNHA2" id="BAIRROTESTEMUNHA2" class="form-control testemunhasdados" maxlength="100"  placeholder="">
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">CIDADE:</label>
                        <div class="col-md-8">
                            <input type="text" name="CIDADETESTEMUNHA2" id="CIDADETESTEMUNHA2" class="form-control testemunhasdados" maxlength="100"  placeholder="clique para pesquisar" readonly="">
                        </div>
                    </div>
                </div>

                    <div class="row">
                        <div class="col-sm-10"> </div>
                          <div class="col-sm-2">  
                            <br><br>
                            <button type="subimit" name="subimit3" class=" btn waves-effect bg-green"><i class="material-icons">save</i>SALVAR</button>
                        </div>
                    </div>
      </form>
	</div>	
		
<!--================================================================================================================================== -->
<!--======================================================================= DADOS ASSENTO ================================================================= -->
    <div role="tabpanel" class="tab-pane fade " id="dadosadicionais" >

                        <form id="formdadosadd" method="POST" action="../bd_UPDATE/update-obito.php?id=<?=$id?>">
                            <input type="hidden" name="submit4">
                                    <div class="row">
                                    <?php 
                                    $busca_registro_add = $pdo->prepare("SELECT * from info_registros_civil where id_registro_obito = '$id'");
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

                                        <textarea class="textarea form-control" name="observacoes_registro" id="observacoes_registro" rows="20"><?=$observacoes_registro?></textarea>
                                     </div>

                                    
                                     <hr><br>
                                      <div class="col-sm-12">
                                        <legend>CONFIGURAR MANUALMENTE TEOR DO REGISTRO:</legend>
                                        <textarea class="textarea form-control" name="inteiro_teor" id="inteiro_teor" rows="20">
                                            <?php 

                                            if (!empty($inteiro_teor)) {
                                            echo $inteiro_teor;
                                            }
                                            else{
                                            include('includes/config-teor-registro-obito.php'); 
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
<!--====================================================================================================================================================== -->
<!--=====================================================================DOCS AD =========================================================-->
	<div role="tabpanel" class="tab-pane " id="docsAd" >

		<form id="formdocsad"  method="POST" action="../bd_UPDATE/update-obito.php?id=<?=$id?>">


		<div class="demo-masked-input" style="padding-left: 3%; width: 103%">
		<label class="bg-grey" style="width: 106%; margin-left: -3%"><i class="material-icons">person</i> DADOS:</label> 

		<div class="row">
		<div class="col-sm-2"><label class="control-label">RG</label></div>  
		<div class="col-sm-2">
		<input type="text"  name="strNumeroRg" id="strNumeroRg" class="form-control input-md rgn1" placeholder="número">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="dataExpRg" id="dataExpRg" class="form-control input-md rgn1" placeholder="dta. exp">  
		</div>

		<div class="col-sm-2">  
		<input type="text"  name="OrgaoExpRg" id="OrgaoExpRg" class="form-control input-md rgn1" placeholder="org. exp">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="dataValidadeRg" id="dataValidadeRg" class="form-control input-md rgn1" placeholder="dta. validade">  
		</div>
		<div class="col-sm-2"><a onclick="$('.rgn1').val(' ');;$('.rgn1').toggle()" class="btn waves-effect bg-red"> <i class="material-icons">clear</i></a></div>
		</div>

		<div class="row">
		<div class="col-sm-2"><label class="control-label">PIS/NIS</label></div>  
		<div class="col-sm-2">
		<input type="text" name="strPisNis" id="strPisNis" class="form-control input-md pisn1" placeholder="número">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="dataExpPisNis" id="dataExpPisNis" class="form-control input-md pisn1" placeholder="dta. exp">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="OrgaoExpPisNis" id="OrgaoExpPisNis" class="form-control input-md pisn1" placeholder="org. exp">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="dataValidadePisNis" id="dataValidadePisNis" class="form-control input-md pisn1" placeholder="dta. validade">  
		</div>
		<div class="col-sm-2"><a onclick="$('.pisn1').val(' ');$('.pisn1').toggle()" class="btn waves-effect bg-red"> <i class="material-icons">clear</i></a></div>
		</div>

		<div class="row">
		<div class="col-sm-2"><label class="control-label">PASSAPORTE</label></div>  
		<div class="col-sm-2">
		<input type="text" name="strPassaporte" id="strPassaporte" class="form-control input-md passn1" placeholder="número">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="dataExpPassaporte" id="dataExpPassaporte" class="form-control input-md passn1" placeholder="dta. exp">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="OrgaoExpPassaporte" id="OrgaoExpPassaporte" class="form-control input-md passn1" placeholder="org. exp">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="dataValidadePassaporte" id="dataValidadePassaporte" class="form-control input-md passn1" placeholder="dta. validade">  
		</div>
		<div class="col-sm-2"><a onclick="$('.passn1').val(' ');$('.passn1').toggle()" class="btn waves-effect bg-red"> <i class="material-icons">clear</i></a></div>
		</div>

		<div class="row">
		<div class="col-sm-2"><label class="control-label">CART. NAC. SAÚDE</label></div>  
		<div class="col-sm-2">
		<input type="text" name="strCartaoSaude" id="strCartaoSaude" class="form-control input-md cartn1" placeholder="número">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="dataExpCartaoSaude" id="dataExpCartaoSaude" class="form-control input-md cartn1" placeholder="dta. exp">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="OrgaoExpCartaoSaude" id="OrgaoExpCartaoSaude" class="form-control input-md cartn1" placeholder="org. exp">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="dataValidadeCartaoSaude" id="dataValidadeCartaoSaude" class="form-control input-md cartn1" placeholder="dta. validade">  
		</div>
		<div class="col-sm-2"><a onclick="$('.cartn1').val(' ');;$('.cartn1').toggle()" class="btn waves-effect bg-red"> <i class="material-icons">clear</i></a></div>
		</div>

		<div class="row">
		<div class="col-sm-2"><label class="control-label">TÍTULO DE ELEITOR</label></div>  
		<div class="col-sm-2">
		<input type="text" name="strTituloEleitor" id="strTituloEleitor" class="form-control input-md titn1" placeholder="número">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="dataExpTituloEleitor" id="dataExpTituloEleitor" class="form-control input-md titn1" placeholder="dta. exp">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="OrgaoExpTituloEleitor" id="OrgaoExpTituloEleitor" class="form-control input-md titn1" placeholder="org. exp">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="dataValidadeTituloEleitor" id="dataValidadeTituloEleitor" class="form-control input-md titn1" placeholder="dta. validade">  
		</div>
		<div class="col-sm-2"><a onclick="$('.titn1').val(' ');$('.titn1').toggle()" class="btn waves-effect bg-red"> <i class="material-icons">clear</i></a></div>
		</div>

		<div class="row">
		<div class="col-sm-2"><label class="control-label">CTPS</label></div>  
		<div class="col-sm-2">
		<input type="text" name="strCtps" id="strCtps" class="form-control input-md ctpsn1" placeholder="número">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="dataExpCtps" id="dataExpCtps" class="form-control input-md ctpsn1" placeholder="dta. exp">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="OrgaoExpCtps" id="OrgaoExpCtps" class="form-control input-md ctpsn1" placeholder="org. exp">  
		</div>

		<div class="col-sm-2">
		<input type="text" name="dataValidadeCtps" id="dataValidadeCtps" class="form-control input-md ctpsn1" placeholder="dta. validade">  
		</div>
		<div class="col-sm-2"><a onclick="$('.ctpsn1').val(' ');$('.ctpsn1').toggle()" class="btn waves-effect bg-red"> <i class="material-icons">clear</i></a></div>
		</div>

		<div class="row">
		<div class="col-sm-2"><label class="control-label">CEP RESIDENCIAL</label></div>  
		<div class="col-sm-2">  
		<input type="text"  name="strCep" id="strCep" class="form-control input-md cepn1" placeholder="número">  
		</div>
		<div class="col-sm-2"><div class="col-sm-2"><a onclick="$('.cepn1').val(' ');$('.cepn1').toggle()" class="btn waves-effect bg-red"> <i class="material-icons">clear</i></a></div></div>
		<div class="row">
		<div class="col-sm-2"><label class="control-label">GRUPO SANGUÍNEO</label></div>  
		<div class="col-sm-2">
		<input style="margin-left: -6%" type="text" name="strGrupoSanguineo" id="strGrupoSanguineo" class="form-control input-md gpsan1" placeholder="número">  
		</div>
		<div  style="margin-left: -1%" class="col-sm-2"><a id="xemtudo" onclick="$('.gpsan1').val(' ');$('.gpsan1').toggle()" class="btn waves-effect bg-red"> <i class="material-icons">clear</i></a></div>
		</div>    
		</div>
		<br><br>
		<div class="row">
		<div class="col-sm-8"></div>
		<div class="col-sm-2">
		<a onclick="$('.rgn1,.rgn2,.pisn1,.pisn2,.titn2,.titn1,.cepn2,.cepn1,.gpsan2,.gpsan1,.passn2,.passn1,.cartn2,.cartn1,.ctpsn1').val(' ');$('.rgn1,.rgn2,.pisn1,.pisn2,.titn2,.titn1,.cepn2,.cepn1,.gpsan2,.gpsan1,.passn2,.passn1,.cartn2,.cartn1,.ctpsn1').hide();" class="btn waves-effect bg-red"> <i class="material-icons">clear</i> TUDO EM BRANCO</a>
		</div>
		<div class="col-sm-2">
		<button type="subimit" name="subimit5" class="btn bg-green  waves-effect waves-float">
		<i class="material-icons">save</i> SALVAR
		</button>
		</div>
		</div>
		<br><br>
		</form>
		</div>
	</div>
<!--===================================================================================================================================================-->
<!--================================================================= DADOS REGISTRO ==================================================--> 
	<div role="tabpanel" id="dadosregistro" class="tab-pane fade <?=$parte4?> ">
		<form id="formdadosobito" method="POST" action="../bd_UPDATE/update-obito.php?id=<?=$id?>"> 	
		 		 <legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">person</i> DADOS DO REGISTRO</legend>

	                <div class="row">
	                	<div id="resultado1036"></div>  
                         <?php if (isset($_GET['acervo']) || $tipo_acervo == 'ACV'): ?>
                        <div class="col-sm-6">
                            <div class="col-md-8" >
                            <input type="checkbox" id="ACERVOFISICO" name="ACERVOFISICO" value="S" 
                                checked 
                                disabled
                            />  
                            <label for="ACERVOFISICO">Inclusão de registro do Acervo Físico</label>
                            </div>
                              <a href="javascript:void(0);" data-trigger="focus" data-html="true" data-container="body" data-toggle="popover" data-placement="right" title="" data-content="Libera os campos 'Livro', 'Folha', 'Termo' para inclusão de registros do acervo físico, para segundas vias e inteiro teor. <b style='color:red'>AVISO AO MARCAR ESTE CAMPO DEIXAR O CAMPO SELO EM BRANCO! O SELO SERÁ USADO APENAS NO ATO DE EXPORTAR CERTIDÕES</b> " data-original-title="Informação!">
                          <i class="material-icons" >info</i>
                        </a>
                        </div>
                         <?php endif ?>
                         <?php if (!empty($livro_obt) && !empty($folha_obt) && !empty($termo_obt)): ?>
                         	
           
                      <div class="col-sm-6">
                            <div class="col-md-6" >
                            <input type="checkbox" id="LIBERAREDICAO" name="LIBERAREDICAO" value="S" />
                            <label for="LIBERAREDICAO">Liberar Registro para edição</label>
                            </div>
                              <a href="javascript:void(0);" data-trigger="focus" data-html="true" data-container="body" data-toggle="popover" data-placement="right" title="" data-content="RETIRA AS VALIDAÇÕES PARA EDIÇÃO DOS DADOS INSERIDOS" data-original-title="Informação!">
                          <i class="material-icons" >info</i>
                        </a>
                        </div>
                                      <?php endif ?>
                        <br>
                        <div class="col-sm-12"></div>
                        <div class="col-sm-12"></div>

	                            <div class="col-sm-6">

	                            <label  class="col-md-4 control-label">ATO*:</label>
	                            <div class="col-md-8">
	                            <select name="ATOOBITO" id="ATOOBITO"  class="col-sm-5 form-control" style="background: white!important; " required>

								                        
								<option value=""> Selecione </option>
								<option value="14.c"> 14.c - Assento de óbito, bem como pela primeira certidão
								respectiva. Isento...
								</option>
								<option value="14.d">14.d - Assento de natimorto, bem como pela primeira certidão
								respectiva. Isento...
								</option>

	                            </select>

	                            </div>
	                            </div>
	                            <div class="col-sm-6">
	                                <label class="col-md-4 control-label" for="TIPOLIVRO">TIPO LIVRO:</label>
	                                <div class="col-md-8"><div class="form-line">
	                                <div class="form-line">
	                                 <select id="TIPOLIVRO" name="TIPOLIVRO" class="form-control " required="" >
	                                   <option value="">Selecione</option>
	                                   <option value="4">LIVRO C</option>
	                                   <option value="5">LIVRO C -  AUXILIAR</option>   
	                                 </select>   

	                                </div>
	                                </div>
	                                </div>
	                            </div>  
	                            <div class="col-sm-6"></div>

	                               <div class="col-sm-6">
	                                <label class="col-md-4 control-label" for="LIVROOBITO">Livro:</label>
	                                <div class="col-md-8"><div class="form-line">
	                                <div class="form-line">
	                                <input id="LIVROOBITO" name="LIVROOBITO" type="text" value=""  class="form-control "  >
	                                </div>
	                                </div>
	                                </div>
	                            	</div>


	                            <div class="col-sm-6">
	                                <label class="col-md-4 control-label" for="FOLHAOBITO">Folha:</label>
	                                <div class="col-md-8"><div class="form-line">
	                                <div class="form-line">
	                                <input id="FOLHAOBITO" name="FOLHAOBITO" type="text" value="" class="form-control " >
	                                </div>
	                                </div>
	                                </div>
	                            </div>


	                            <div class="col-sm-6">
	                                <label class="col-md-4 control-label" for="TERMOOBITO">Termo:</label>
	                                <div class="col-md-8"><div class="form-line">
	                                <div class="form-line">
	                                <input id="TERMOOBITO" name="TERMOOBITO" type="text" value="" class="form-control " >
	                                </div>
	                                </div>
	                                </div>
	                            </div>
	                            <div class="col-sm-6">
										<label class="col-md-4 control-label" for="DATAENTRADA">Data Registro:</label>
										<div class="col-md-8"><div class="form-line">
										<div class="form-line">
										<input id="DATAENTRADA" name="DATAENTRADA" type="date" value="" class="form-control  text-center" >
										</div>
										</div>
										</div>
									</div>

	                                <div class="col-sm-8">
	                                <label class="col-md-3 control-label" for="MATRIUCLA">MATRICULA:</label>
	                                <div class="col-md-6"><div class="form-line">
	                                <div class="form-line">
	                                <input style="margin-left: -1%" id="MATRICULA" name="MATRICULA" type="text" value="" class="form-control " readonly="" >
	                                </div>
	                                </div>
	                                </div>
	                                <a onclick="matricula()" ondblclick="matricula2()" class="btn waves-effect bg-green"><i class="material-icons">refresh</i> GERAR</a>
	                                </div>

	                                <script type="text/javascript">
	                                function matricula(){
	                                var livro = $('#LIVROOBITO').val();
	                                var folha = $('#FOLHAOBITO').val();
	                                var termo = $('#TERMOOBITO').val();
	                                var dataRegistro = $('#DATAENTRADA').val();
	                               
	                                var tipoLivro = $('#TIPOLIVRO').val();

	                               
	                                var tipoRegistro = 'OB';
	                                if ($('#DATAENTRADA').val() !='' && tipoLivro != '') {
	                                $.post('gerador-matricula-externo.php', {'livro':livro, 'folha':folha, 'termo':termo,'dataRegistro':dataRegistro, 'tipoLivro':tipoLivro, 'tipoRegistro':tipoRegistro}, function(data) {
	                                $("#MATRICULA").val(data);

	                                });
	                                }
	                                if ($('#DATAENTRADA').val() =='') {$('#MATRICULA').val();swal('OPS', 'VOCÊ NÃO PREENCHEU A DATA DO REGISTRO', "error");}
 									if (tipoLivro == '') {$('#MATRICULA').val();swal('OPS', 'VOCÊ NÃO PREENCHEU O TIPO DO LIVRO', "error");}
	                                }

	                                function matricula2(){
	                                confirm = confirm("DESEJA MESMO GERAR MATRICULA COMO ACERVO INCORPORADO?");
                                	if (confirm == true) {
	                                var livro = $('#LIVROOBITO').val();
	                                var folha = $('#FOLHAOBITO').val();
	                                var termo = $('#TERMOOBITO').val();
	                                var dataRegistro = $('#DATAENTRADA').val();
	                                var tipoLivro = $('#TIPOLIVRO').val();
	                                var tipoRegistro = 'OB';
	                                var incorporado = 'ok';
	                                $.post('gerador-matricula-externo.php', {'livro':livro, 'folha':folha, 'termo':termo,'dataRegistro':dataRegistro, 'tipoLivro':tipoLivro, 'tipoRegistro':tipoRegistro,'incorporado':incorporado}, function(data) {
	                                $("#MATRICULA").val(data);
	                                });
	                                }
	                            	}
	                                </script>


	                        
	                                <div class="col-sm-12" id="resultado2"></div>
									
									                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label" for="strFolha">TIPO PAPEL DE SEGURANÇA:</label>
                                    <div class="col-md-8"><div class="form-line">
                                    <div class="form-line">
                                    <select id="TIPOPAPELSEGURANCA" name="TIPOPAPELSEGURANCA" class="form-control" required="">
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
                                    </div>
                                    </div>
                                </div>    


                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label" for="NUMEROPAPELSEGURANCA">Nº PAPEL:</label>
                                    <div class="col-md-8"><div class="form-line">
                                    <div class="form-line">
                                    <input id="NUMEROPAPELSEGURANCA" name="NUMEROPAPELSEGURANCA" type="text" required="" value="" class="form-control " >
                                    </div>
                                    </div>
                                    </div>
                                </div>
											<div class="col-sm-12" id="averbacaoantiga" >
		                                <label class="col-md-2 control-label" for="DATAENTRADA">AVERBAÇÃO PRESENTE NO TERMO:</label>
		                                <div class="col-md-8"><div class="form-line">
		                                <div class="form-line">
		                                <textarea id="AVERBACAOTERMOANTIGO" name="AVERBACAOTERMOANTIGO" class="form-control  text-center" rows="5" ></textarea>
		                                </div>
		                                </div>
		                                </div>
		                                </div>
		                                    <div class="col-sm-6" id="containerselo">
	                                <label class="col-md-4 control-label" for="SELO">Selo:</label>
	                                <div class="col-md-8"><div class="form-line">
	                                <div class="form-line">
	                                <input type="text" id="SELO2" name="SELO2" class="form-control input-md" placeholder="" style="background: silver!important" readonly=""  />
	                                </div>
	                                </div>
	                                </div>
	                     
	                            </div>

					</div>
					
	           
	                  <div class="row">
	                        <div class="col-sm-10"> </div>
		                       <div class="col-sm-2">  
		                            <br><br>
		                            <!--button type="subimit" name="subimit1" class=" btn waves-effect bg-green"><i class="material-icons">save</i>SALVAR</button-->
		                            <a id="subimitselo"  class=" btn waves-effect bg-green"><i class="material-icons">save</i>SALVAR</a>
		                        </div>
	                    </div>
		</form>
	</div>  
<!--=================================================================================================================================-->




                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
      <!-- Jquery Core Js -->
<script src="../plugins/jquery/jquery.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
		if ($('#ACERVOFISICO').is(":checked") == false ) {$('#LIVROOBITO, #FOLHAOBITO,#TERMOOBITO').prop('readonly', true); $('#containerselo').show();$('#ATOOBITO').prop('disabled',false);$('#TIPOPAPELSEGURANCA').prop('disabled',false);$('#NUMEROPAPELSEGURANCA').prop('disabled',false);$('#averbacaoantiga').hide();}
		else{ {$('#LIVROOBITO, #FOLHAOBITO,#TERMOOBITO').prop('readonly', false).val('');$('#containerselo').hide();$('#ATOOBITO').prop('disabled',true);$('#TIPOPAPELSEGURANCA').prop('disabled',true);$('#NUMEROPAPELSEGURANCA').prop('disabled',true);$('#averbacaoantiga').show();}}	
		});		


	</script>

    <script type="text/javascript">
        $("#NUMEROPAPELSEGURANCA").blur(function (e) {
        var tipo = $('#TIPOPAPELSEGURANCA').val();
        var numpapel = $('#NUMEROPAPELSEGURANCA').val();
        $.post('../consultas/papel-seguranca.php', {'tipo':tipo, 'numpapel':numpapel}, function(data) {
        $("#resultado2").html(data);
        });
        });
    </script>


    <script type="text/javascript">
        $("#TERMOOBITO").blur(function (e) {
        var livro = $('#LIVROOBITO').val();
        var folha = $('#FOLHAOBITO').val();
        var termo = $('#TERMOOBITO').val();    


        $.post('../consultas/papel-seguranca.php', {'livroconsultaobito':livro, 'folhaconsultaobito':folha,'termoconsultaobito':termo}, function(data) {
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
$(".cpf").inputmask("999.999.999-99");
$(".ndo").inputmask("99999999-9");
showCustomer2();
//verificatipoobito();
$('[data-toggle="popover"]').popover();
if ($('#ACERVOFISICO').is(":checked") == false ) {
$('#LIVROOBITO, #FOLHAOBITO,#TERMOOBITO').prop('readonly', true);
}
$('.oj').hide();
$('#ROGODECLARANTE').hide();
PREENCHERDADOS();

if ($('#ACERVOFISICO').is(":checked") == false ) {
$('#averbacaoantiga').hide();
}
$('#sefilhos').hide();
$('.secasado').hide();
 $('#RESPMAE').hide();
    $('input[type="date"]').blur(function(){

        var teste = $(this).val();

        if (teste.length>10) {
            
            swal("Ops!", "Data digitada está incorreta!", "error");
        }
    }); 


   $('.dadospai').prop('required', false);
   $('.dadosmae').prop('required', false);
   if($('#TIPOASSENTO').val() == 'ORDEM'){	
   	$('.oj').show();
   } 
   else{
   	$('.oj').hide();	
   }

   if ($('#DEIXOUFILHOS').val() == 'S') {
   	$('#sefilhos').show();
   }
   else{
   	$('#sefilhos').hide();
   }			
   
   if ($('#ESTADOCIVIL').val() == 'CA' || $(this).val() == 'VI') {
   	$('.secasado').show();
   }
   else{
   	$('.secasado').hide();
   }


   PREENCHERDADOS6();  

});
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



<?php include('modais-obito.php'); ?>
<script src="obito.js"></script>
<input type="hidden" id="tipomodal" name="">
<input type="hidden" id="tipomodalPessoa" name="">
<input name="image" type="file" id="upload" class="hidden" onchange="">

 <div class="modal fade  " id="sucesso" tabindex="-1" role="dialog">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content bg-green">
<div class="alert bg-green alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h2 class="text-center">
<i class="material-icons">verified_user</i> </h2>
<p class="text-center"><?=$_SESSION['sucesso']?></p>

</div>
</div>
</div>
</div>

<div class="modal fade  " id="erro" tabindex="-1" role="dialog">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content bg-red">
<div class="alert bg-red alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h2 class="text-center">
<i class="material-icons">error_outline</i>
</h2>
<p class="text-center"> <?=$_SESSION['erro']?></p>

</div>
</div>
</div>
</div>

<div class="modal fade  " id="lembrete" tabindex="-1" role="dialog">
<div class="modal-dialog modal-sm" role="document">
<div class="modal-content" style="background: #ffda0c">
<div class="alert alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h2 class="text-center">
<i class="material-icons">alarm</i>
</h2>
<h3 class="text-center"><?=$_SESSION['lembrete']?></h3>

</div>
</div>
</div>
</div>


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
<!--script type="text/javascript">
$("#ATOOBITO,#TIPOLIVRO,#TIPOPAPELSEGURANCA").click(function (e) {
var livro = $('#LIVROOBITO').val();
var folha = $('#FOLHAOBITO').val();
var tipo = $('#TIPOLIVRO').val();
$.post('obito-tempo-real.php', {'LIVROOBITO':livro, 'FOLHAOBITO':folha, 'TIPOLIVRO':tipo}, function(data) {
$("#resultado1036").html(data);
});
});
</script-->



<script type="text/javascript">


var acervo;
var liberar;

$('#subimitselo').click(function(){
if ($('#ACERVOFISICO').is(":checked") == false ) { acervo = '';}
else{ acervo = 'S';}
if ($('#LIBERAREDICAO').is(":checked") == false ) { liberar = '';}
else{ liberar = 'S';}    
if (

$('#ATOOBITO').val() =='' && acervo =='' ||
$('#LIVROOBITO').val() =='' ||
$('#FOLHAOBITO').val() =='' ||  
$('#TERMOOBITO').val() =='' ||
$('#DATAENTRADA').val() =='' ||
$('#MATRICULA').val() =='' 

) {

swal({
 type: "error",
     title: '<p style="text-transform:uppercase;font-weight:bold"<center></center>RETORNO</p>',
     text: ' Parece que alguns dados essenciais para avançar não foram preenchidos por favor reveja', 
    html: ' ',
    confirmButtonText:
      'OK',

    });    

}


else {

    
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

$.ajax({

type: "POST",
url: "../bd_UPDATE/update-obito.php?id=<?=$id?>",
data: {
subimitselo: 'ok',
ACERVOFISICO : acervo,
LIBERAREDICAO: liberar,  
ATOOBITO : $('#ATOOBITO').val(),
TIPOLIVRO : $('#TIPOLIVRO').val(),
LIVROOBITO : $('#LIVROOBITO').val(),
FOLHAOBITO : $('#FOLHAOBITO').val(),
TERMOOBITO : $('#TERMOOBITO').val(),
DATAENTRADA : $('#DATAENTRADA').val(),
MATRICULA : $('#MATRICULA').val(),
SELO2: $('#SELO2').val(),
AVERBACAOTERMOANTIGO : $('#AVERBACAOTERMOANTIGO').val(),
TIPOPAPELSEGURANCA : $('#TIPOPAPELSEGURANCA').val(),
NUMEROPAPELSEGURANCA : $('#NUMEROPAPELSEGURANCA').val(),



},
success: function(data) {
$('#SELO2').val(data);
var data = '<span style="text-transform:uppercase">'+data+'</span>';
if (data =='') {data = 'NENHUM DADO RETORNADO POR FAVOR CLIQUE NOVAMENTE EM SALVAR PARA UMA NOVA TENTATIVA';}
swal({
 type: "success",
     title: '<p style="text-transform:uppercase;font-weight:bold"<center></center>RETORNO</p>',
     text: ''+data, 
    html: ' ',
    confirmButtonText:
      'OK',

    });
}
});

//window.location.reload();
}
);
}

});

           
    </script>



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
<script type="text/javascript">
    $('.rogocpf').blur(function(){
        var cpf =$(this).val();
        $.post('nascimento-tempo-real.php', {'CPFROGO':cpf}, function(data) {
        $("#resultadorogo").html(data);
        });
    });


</script>

<div id="resultadorogo"></div>


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


 							<script type="text/javascript">
                                $('#LIVROOBITO').keyup(function(){
                                    var crm = $(this).val();
                                    crm = crm.replace(/[^\d]+/g,'');
                                    $('#LIVROOBITO').val(crm);
                                });
                                  $('#FOLHAOBITO').keyup(function(){
                                    var crm = $(this).val();
                                    crm = crm.replace(/[^\d]+/g,'');
                                    $('#FOLHAOBITO').val(crm);
                                });
                                 $('#TERMOOBITO').keyup(function(){
                                    var crm = $(this).val();
                                    crm = crm.replace(/[^\d]+/g,'');
                                    $('#TERMOOBITO').val(crm);
                                });
                            </script>
                            <!--TINYMCE EDITADO 1-->
                                <script>

                                    tinymce.init({
                                        selector: '.textarea',
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

<div class="modal fade" id="cidadeestrangeiro" tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog" role="document">
<div class="modal-content ">
<div class="alert  gradient-info alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h2 class="text-center">
<i class="material-icons">info</i>
</h2>
<p class="text-center">

<input type="text" class="form-control" id="campoextrangeiro" placeholder="INFORME A CIDADE/ESTADO/PAIS SEPARADOS POR ' / '" >

<br><br>

<a class="btn gradient-amarelo"

onclick="preencheCidades('5300109',$('#campoextrangeiro').val(),'')" 

 data-dismiss="modal"><i class="material-icons">check</i>CONFIRMAR</a>

 </p>

</div>
</div>
</div>
</div>
</body>
</html>

