<?php include('../controller/db_functions.php');
session_start();
include_once("../assets/header.php");
include("../index/verifica-modulos.php");
$id = $_GET['id'];
$tabela = 'registro_nascimento_novo';
$json_dados = json_table_registro($tabela, $id);
$json_dados = json_decode($json_dados, true); 
$dados = json_encode($json_dados[0],JSON_UNESCAPED_UNICODE);
$dados = json_decode($dados, true);
#buscando tabela auxiliar:
$pdo = conectar();
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
<?php include_once("../assets/menu.php");?>


<body class="index-page bg-secondary main_dark_mode" style="max-width:100%">



  <section style="margin-top: -3%;">
      <div class="row">
        <div class="section section-components col-lg-7">
          <div class="container">
              <div class="header"><h3 class="">REGISTRO DE NASCIMENTO</h3>
              </div>
              <div class="row justify-content-center" style="border-right: 2px solid purple;">
                <div class="col-lg-12">
                  <form id="formprincipal">
                  <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row col-lg-12" id="tabs-icons-text" role="tablist">

                      <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#dadosnascido" role="tab" aria-controls="dadosnascido" aria-selected="true"><i class="fa fa-book"></i> DADOS DO NASCIDO</a>
                      </li>
                      <li class="nav-item" onclick="previewreg('<?=$id?>')">
                        <a class="nav-link mb-sm-3 mb-md-0" id="dadosdeclarante-tab" data-toggle="tab" href="#dadosdeclarante" role="tab" aria-controls="dadosdeclarante" aria-selected="false"><i class="fa fa-book"></i> DECLARANTE</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="dadosfiliacao-tab" data-toggle="tab" href="#dadosfiliacao" role="tab" aria-controls="dadosfiliacao" aria-selected="false"><i class="fa fa-book"></i> FILIA????O</a>
                      </li>
                      
                      <!-- <li class="nav-item" style="margin-bottom: 3%">
                        <a class="nav-link mb-sm-3 mb-md-0" id="dadostestemunhas-tab" data-toggle="tab" href="#dadostestemunhas" role="tab" aria-controls="dadostestemunhas" aria-selected="false"> <i class="fa fa-book"></i> TESTEMUNHAS</a>
                      </li> -->

                      <!-- <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="dadossentenca-tab" data-toggle="tab" href="#dadossentenca" role="tab" aria-controls="dadossentenca" aria-selected="false"> <i class="fa fa-book"></i> SENTEN??A/MANDADO JUDICIAL</a>
                      </li> -->

                      <!-- <li class="nav-item" style="margin-bottom: 3%">
                        <a class="nav-link mb-sm-3 mb-md-0" id="dadosfiliacaosocio-tab" data-toggle="tab" href="#dadosfiliacaosocio" role="tab" aria-controls="dadosfiliacaosocio" aria-selected="false"> <i class="fa fa-book"></i> FILIA????O SOCIOAFETIVA</a>
                      </li> -->

                      <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="dadosadd-tab" data-toggle="tab" href="#dadosadd" role="tab" aria-controls="dadosadd" aria-selected="false"> <i class="fa fa-book"></i> DADOS ADICIONAIS</a>
                      </li>
                    </ul>
                  </div>
                  <div class="">
                    <div class="card-body">
                      <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="dadosnascido" role="tabpanel" aria-labelledby="dadosnascido-tab">
                         <div class="row">
                          <div class="col-lg-12">
                            <label for="country">NOME NASCIDO:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMENASCIDO" name="NOMENASCIDO" type="text"  class="form-control valid" aria-invalid="false" required="true">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CPF NASCIDO:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="CPFNASCIDO" name="CPFNASCIDO" type="text"  class="form-control cpf valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NATURALIDADE NASCIDO:</label>
                            <input onclick="buscacidade($(this).attr('id'), '<?=$id?>')" id="NATURALIDADENASCIDO" name="NATURALIDADENASCIDO" type="text"  class="form-control valid" readonly="" placeholder="CLIQUE PARA PESQUISAR" required="true">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">SEXO NASCIDO:</label>
                            <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="SEXONASCIDO" name="SEXONASCIDO" class="form-control valid" required="true">
                              <option value=""></option>
                              <option value="M">MASCULINO</option>
                              <option value="F">FEMININO</option>
                              <option value="I">INDEFINIDO</option>
                            </select>  
                          </div>
                          <div class="col-lg-6">
                            <label for="country">POSSUI GEMEOS:</label>
                            <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="GEMEOS" name="GEMEOS" class="form-control" required="true">
                            <option value="">Selecione</option>
                            <option value="S">SIM</option>
                            <option value="N">N??O</option>
                            </select>
                          </div>
                          <div class="col-lg-6" id="infogemeos">
                            <label for="country">NOME MATRICULA GEMEO(S):</label>
                            <textarea onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMEMATRICULAGEMEOS" name="NOMEMATRICULAGEMEOS" class="form-control valid" aria-invalid="false"></textarea>
                          </div>
                          <div class="col-lg-6">
                            <label for="country">LOCAL NASCIMENTO:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="LOCALNASCIMENTO" name="LOCALNASCIMENTO" type="text"  class="form-control valid" aria-invalid="false" required="true">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ENDERE??O LOCAL NASCIMENTO:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ENDERECOLOCALNASCIMENTO" name="ENDERECOLOCALNASCIMENTO" type="text"  class="form-control valid" aria-invalid="false" required="true">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CIDADE NASCIMENTO:</label>
                            <input onclick="buscacidade($(this).attr('id'), '<?=$id?>')" id="CIDADENASCIMENTO" name="CIDADENASCIMENTO" type="text"  class="form-control valid" readonly="" placeholder="CLIQUE PARA PESQUISAR" required="true">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">DATA NASCIMENTO:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="DATANASCIMENTO" name="DATANASCIMENTO" type="date"  class="form-control valid" aria-invalid="false" required="true">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">HORA NASCIMENTO:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="HORANASCIMENTO" name="HORANASCIMENTO" type="time"  class="form-control valid" aria-invalid="false" required="true">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">TIPO LOCAL NASCIMENTO:</label>
                            <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="TIPOLOCALNASCIMENTO" name="TIPOLOCALNASCIMENTO"  class="form-control valid" aria-invalid="false" required="true">
                              <option value="IGNORADO">IGNORADO</option>
                              <option value="UNIDADE_SAUDE">Maternidade/ Hospital</option>
                              <option value="FORA_UNIDADE_SAUDE">Fora da Maternidade/Hospital</option>
                            </select>
                          </div>

                          <div class="col-lg-6">
                            <label for="country">DNV:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="DNV" name="DNV" type="text"  class="form-control valid dnv" aria-invalid="false">
                          </div>
                          <!-- <div class="col-lg-6">
                            <label for="country">MEDICO/PROF. DE SA??DE:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="MEDICO" name="MEDICO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CRM/DOCUMENTO:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="CRM" name="CRM" type="text"  class="form-control valid" aria-invalid="false">
                          </div> -->
                          <div class="col-lg-6">
                            <label for="country">TIPO DE REGISTRO:</label>
                            <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="TIPOASSENTO" name="TIPOASSENTO" class="form-control valid" required="true">
                              <option value=""></option>
                              <!-- <option value="COMUN">COMUM</option> -->
                              <option value="UNIDADE_INTERLIGADA">UNIDADE INTERLIGADA</option>
                              <!-- <option value="REGISTROT">REGISTRO TARDIO</option> -->
                              <option value="POSTO">REGISTRO FEITO EM POSTO AVAN??ADO</option>
                            </select>  
                          </div>
                          
                          <div class="col-lg-6">
                            <label for="country">RANI:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="RANI" name="RANI" type="text"  class="form-control valid" aria-invalid="false">
                          </div>

                         </div>
                       </div>
                       

                        <div class="tab-pane fade" id="dadosdeclarante" role="tabpanel" aria-labelledby="dadosdeclarante-tab">
                            <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">DECLARANTE</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <hr style="margin-top:-10px">
                          <div class="row">

                            <div class="col-lg-12">
                              <label for="country">O DECLARANTE ??:</label>
                              <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="QUALIDADEDECLARANTE" name="QUALIDADEDECLARANTE" class="form-control" aria-invalid="false" required="true">
                                <option value="">SELECIONE</option>
                                 <option value="PAI">O PAI</option>
                                 <option value="MAE">A M??E</option>
                                 <option value="AMBOSPAI">OS PAIS</option>
                                 <option value="OUTRO">OUTRO</option>
                                 <option value="IGNORADO">UNIDADE INTERLIGADA</option>
                              </select>
                            </div>   

                            
                            <div class="col-lg-12 outrodeclarante">
                              <br>
                              <button class="btn btn-info btn-lg btn-block outrodeclarante"  type="button" onclick="buscarcadastro('DECLARANTE','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                            <div class="row">
                              <div class="col-lg-6">  
                                <label for="country">NOME</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMEDECLARANTE" name="NOMEDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                                <input type="hidden" id="IDPESSOADECLARANTE" name="IDPESSOADECLARANTE">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">CPF</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="CPFDECLARANTE" name="CPFDECLARANTE" type="text"  class="form-control valid cpf" aria-invalid="false">
                              </div>
                            </div>
                              <div class="row" id="formularioDECLARANTE">

                            <div class="col-lg-6">
                              <label for="country">RG</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="RGDECLARANTE" name="RGDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">ORG??O EMISSOR</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ORGAOEMISSORDECLARANTE" name="ORGAOEMISSORDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">NACIONALIDADE</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NACIONALIDADEDECLARANTE" name="NACIONALIDADEDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">NATURALIDADE</label>
                              <input onclick="buscacidade($(this).attr('id'), '<?=$id?>')" readonly="" placeholder="CLIQUE PARA PESQUISAR" id="NATURALIDADEDECLARANTE" name="NATURALIDADEDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">DATANASCIMENTO</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="DATANASCIMENTODECLARANTE" name="DATANASCIMENTODECLARANTE" type="date"  class="form-control valid" aria-invalid="false">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">SEXO</label>
                              <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="SEXODECLARANTE" name="SEXODECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                                <option value="M">Masculino</option>
                                <option value="F">Feminino</option>
                              </select>
                            </div>

                            <div class="col-lg-6">
                              <label for="country">ESTADOCIVIL</label>
                              <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="ESTADOCIVILDECLARANTE" name="ESTADOCIVILDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                                <option value="SO">Solteiro (a)</option>
                                <option value="CA">Casado (a)</option>
                                <option value="DI">Divorciado(a)</option>
                                <option value="VI">Vi??vo (a)</option>
                                <option value="UN">Uni??o Est??vel</option>
                                <option value="SJ">Separdo Judicialmente</option>
                              </select>
                            </div>

                            <div class="col-lg-6">
                              <label for="country">PROFISSAO</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="PROFISSAODECLARANTE" name="PROFISSAODECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">ENDERECO</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ENDERECODECLARANTE" name="ENDERECODECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">BAIRRO</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="BAIRRODECLARANTE" name="BAIRRODECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">CIDADE</label>
                              <input onclick="buscacidade($(this).attr('id'), '<?=$id?>')" readonly="" placeholder="CLIQUE PARA PESQUISAR" id="CIDADEDECLARANTE" name="CIDADEDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>

                          </div>


                            </div> 

                          <div class="col-lg-12 outrodeclarante">
                            
                            <div class="col-3 col-md-4 custom-control custom-checkbox outrodeclarante">
                               <br> 
                              <input class="custom-control-input" id="POSSUIROGODECLARANTE" value="1" type="checkbox">
                              <label class="custom-control-label" for="POSSUIROGODECLARANTE">
                                <span>Assinante a rogo</span>
                              </label>
                            </div>  

                          </div>
                          <div class="col-lg-12 DADOSROGODECLARANTE">
                            <br>
                            <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">ASSINANTE A ROGO:</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #8094cf" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <div class="col-lg-12 DADOSROGODECLARANTE">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('ROGODECLARANTE','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div>
                              <label for="country">CPF</label>
                              <input type="text" class="form-control" onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ROGODECLARANTE" name="CPFROGODECLARANTE">
                              <input type="hidden" id="IDPESSOAROGODECLARANTE" name="IDPESSOAROGODECLARANTE">
                          </div>  
                          
                             
                          

                          </div>
                          
                      </div>

                      <div class="tab-pane fade" id="dadosfiliacao" role="tabpanel" aria-labelledby="dadosfiliacao-tab">
                            <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">DADOS FILIA????O 1</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <hr style="margin-top:-10px">
                          <div class="row">
                            <div class="col-lg-12">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('PAI','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div>  
                            <div class="col-lg-6">
                              <label for="country">NOME</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMEPAI" name="NOMEPAI" type="text"  class="form-control valid" aria-invalid="false">

                              <input type="hidden" id="IDPESSOAPAI" name="IDPESSOAPAI">
                            </div> 

                            <div class="col-lg-6">
                                <label for="country">CPF</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="CPFPAI" name="CPFPAI" type="text"  class="form-control valid cpf" aria-invalid="false">
                              </div>

                            <div class="col-lg-12" id="formularioPAI">
                              <div class="row">
                              <div class="col-lg-6">
                                <label for="country">RG</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="RGPAI" name="RGPAI" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">ORG??O EMISSOR</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ORGAOEMISSORPAI" name="ORGAOEMISSORPAI" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">NACIONALIDADE</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NACIONALIDADEPAI" name="NACIONALIDADEPAI" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">NATURALIDADE</label>
                                <input onclick="buscacidade($(this).attr('id'), '<?=$id?>')" readonly="" placeholder="CLIQUE PARA PESQUISAR" id="NATURALIDADEPAI" name="NATURALIDADEPAI" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">DATANASCIMENTO</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="DATANASCIMENTOPAI" name="DATANASCIMENTOPAI" type="date"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">SEXO</label>
                                <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="SEXOPAI" name="SEXOPAI" type="text"  class="form-control valid" aria-invalid="false">
                                  <option value="M">Masculino</option>
                                  <option value="F">Feminino</option>
                                </select>
                              </div>

                              <!-- <div class="col-lg-6">
                                <label for="country">ESTADOCIVIL</label>
                                <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="ESTADOCIVILPAI" name="ESTADOCIVILPAI" type="text"  class="form-control valid" aria-invalid="false">
                                  <option value="SO">Solteiro (a)</option>
                                  <option value="CA">Casado (a)</option>
                                  <option value="DI">Divorciado(a)</option>
                                  <option value="VI">Vi??vo (a)</option>
                                  <option value="UN">Uni??o Est??vel</option>
                                  <option value="SJ">Separdo Judicialmente</option>
                                </select>
                              </div> -->

                              <div class="col-lg-6">
                                <label for="country">PROFISSAO</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="PROFISSAOPAI" name="PROFISSAOPAI" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">ENDERECO</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ENDERECOPAI" name="ENDERECOPAI" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">BAIRRO</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="BAIRROPAI" name="BAIRROPAI" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">CIDADE</label>
                                <input onclick="buscacidade($(this).attr('id'), '<?=$id?>')" readonly="" placeholder="CLIQUE PARA PESQUISAR" id="CIDADEPAI" name="CIDADEPAI" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">AV??S 1</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="AVO1PATERNO" name="AVO1PATERNO" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">AV??S 2</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="AVO2PATERNO" name="AVO2PATERNO" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              </div>
                            </div>
                          
                          <div class="col-lg-12">
                          <div class="col-lg-6 custom-control custom-checkbox">
                               <br> 
                              <input class="custom-control-input" id="POSSUIROGOPAI" value="1" type="checkbox">
                              <label class="custom-control-label" for="POSSUIROGOPAI">
                                <span>Assinante a rogo</span>
                              </label>
                            </div>  

                              <div class="col-lg-6 custom-control custom-checkbox">
                               <br> 
                              <input class="custom-control-input" id="POSSUIPROCURADORPAI" value="1" type="checkbox">
                              <label class="custom-control-label" for="POSSUIPROCURADORPAI">
                                <span>Procurador</span>
                              </label>
                            </div> 
                            </div>


                            <div class="col-lg-12 DADOSPROCURADORPAI">
                            <br>
                            <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">PROCURADOR:</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #e3394f" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <div class="col-lg-12 DADOSPROCURADORPAI">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('PROCURADORPAI','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div> 
                              <label for="country">CPF</label>
                              <input type="text" class="form-control" onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="PROCURADORPAI" name="CPFPROCURADORPAI">
                              <input type="hidden" id="IDPESSOAPROCURADORPAI" name="IDPESSOAPROCURADORPAI">
                          </div>  
                          


                            <div class="col-lg-12 DADOSROGOPAI">
                            <br>
                            <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">ASSINANTE A ROGO:</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #8094cf" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <div class="col-lg-12 DADOSROGOPAI">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('ROGOPAI','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div> 
                              <label for="country">CPF</label>
                              <input type="text" class="form-control" onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ROGOPAI" name="CPFROGOPAI">
                              <input type="hidden" id="IDPESSOAROGOPAI" name="IDPESSOAROGOPAI">
                          </div>  
                          
                          </div>
                          <br><br>
                          <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">DADOS FILIA????O 2</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <hr style="margin-top:-10px">
                          <div class="row">
                            <div class="col-lg-12">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('MAE','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div> 
                            <div class="col-lg-6">
                              <label for="country">NOME</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMEMAE" name="NOMEMAE" type="text"  class="form-control valid" aria-invalid="false"  required="true">
                              <input type="hidden" id="IDPESSOAMAE" name="IDPESSOAMAE">
                            </div> 
                            
                             <div class="col-lg-6">
                                <label for="country">CPF</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="CPFMAE" name="CPFMAE" type="text"  class="form-control valid cpf" aria-invalid="false">
                              </div>

                            <div class="col-lg-12" id="formularioMAE">
                              <div class="row">
                              <div class="col-lg-6">
                                <label for="country">RG</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="RGMAE" name="RGMAE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">ORG??O EMISSOR</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ORGAOEMISSORMAE" name="ORGAOEMISSORMAE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">NACIONALIDADE</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NACIONALIDADEMAE" name="NACIONALIDADEMAE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">NATURALIDADE</label>
                                <input onclick="buscacidade($(this).attr('id'), '<?=$id?>')" readonly="" placeholder="CLIQUE PARA PESQUISAR" id="NATURALIDADEMAE" name="NATURALIDADEMAE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">DATANASCIMENTO</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="DATANASCIMENTOMAE" name="DATANASCIMENTOMAE" type="date"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">SEXO</label>
                                <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="SEXOMAE" name="SEXOMAE" type="text"  class="form-control valid" aria-invalid="false">
                                  <option value="M">Masculino</option>
                                  <option value="F">Feminino</option>
                                </select>
                              </div>

                              <!-- <div class="col-lg-6">
                                <label for="country">ESTADOCIVIL</label>
                                <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="ESTADOCIVILMAE" name="ESTADOCIVILMAE" type="text"  class="form-control valid" aria-invalid="false">
                                  <option value="SO">Solteiro (a)</option>
                                  <option value="CA">Casado (a)</option>
                                  <option value="DI">Divorciado(a)</option>
                                  <option value="VI">Vi??vo (a)</option>
                                  <option value="UN">Uni??o Est??vel</option>
                                  <option value="SJ">Separdo Judicialmente</option>
                                </select>
                              </div> -->

                              <div class="col-lg-6">
                                <label for="country">PROFISSAO</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="PROFISSAOMAE" name="PROFISSAOMAE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">ENDERECO</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ENDERECOMAE" name="ENDERECOMAE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">BAIRRO</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="BAIRROMAE" name="BAIRROMAE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">CIDADE</label>
                                <input onclick="buscacidade($(this).attr('id'), '<?=$id?>')" readonly="" placeholder="CLIQUE PARA PESQUISAR" id="CIDADEMAE" name="CIDADEMAE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">AV??S 1</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="AVO1MATERNO" name="AVO1MATERNO" type="text"  class="form-control valid" aria-invalid="false">
                              </div>

                              <div class="col-lg-6">
                                <label for="country">AV??S 2</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="AVO2MATERNO" name="AVO2MATERNO" type="text"  class="form-control valid" aria-invalid="false">
                              </div>
                              </div>
                            </div>  

                          <div class="col-lg-12">
                          <div class="col-6 col-md-6 custom-control custom-checkbox">
                               <br> 
                              <input class="custom-control-input" id="POSSUIROGOMAE" value="1" type="checkbox">
                              <label class="custom-control-label" for="POSSUIROGOMAE">
                                <span>Assinante a rogo</span>
                              </label>
                            </div>  
                          </div>
                          <div class="col-lg-12 DADOSROGOMAE">
                            <br>
                            <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">ASSINANTE A ROGO:</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #8094cf" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <div class="col-lg-12 DADOSROGOMAE">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('ROGOMAE','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div>
                              <label for="country">CPF</label>
                              <input type="text" class="form-control" onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ROGOMAE" name="CPFROGOMAE">
                              <input type="hidden" id="IDPESSOAROGOMAE" name="IDPESSOAROGOMAE">
                          </div>  
                          
                          </div>
                      </div>


                      <div class="tab-pane fade" id="dadostestemunhas" role="tabpanel" aria-labelledby="dadostestemunhas-tab">
                           <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">DADOS TESTEMUNHA 1</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <hr style="margin-top:-10px">
                          <div class="row">
                            <div class="col-lg-12">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('TESTEMUNHA1','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div>  
                            <div class="col-lg-12">
                              <label for="country">NOME</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMETESTEMUNHA1" name="NOMETESTEMUNHA1" type="text"  class="form-control valid" aria-invalid="false" readonly="">
                              <input type="hidden" id="CPFTESTEMUNHA1" name="CPFTESTEMUNHA1">
                              <input type="hidden" id="IDPESSOATESTEMUNHA1" name="IDPESSOATESTEMUNHA1">
                            </div> 

                          

                          
                          </div>
                          <br><br>
                          <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">DADOS TESTEMUNHA 2</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <hr style="margin-top:-10px">
                          <div class="row">
                            <div class="col-lg-12">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('TESTEMUNHA2','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>

                          </div>  
                            <div class="col-lg-12">
                              <label for="country">NOME</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMETESTEMUNHA2" name="NOMETESTEMUNHA2" type="text"  class="form-control valid" aria-invalid="false" readonly="">
                              <input type="hidden" id="CPFTESTEMUNHA2" name="CPFTESTEMUNHA2">
                              <input type="hidden" id="IDPESSOATESTEMUNHA2" name="IDPESSOATESTEMUNHA2">
                            </div> 


                                                    
                          </div>
                      </div>


                      <div class="tab-pane fade" id="dadossentenca" role="tabpanel" aria-labelledby="dadossentenca-tab">
                        <div class="row">
                          <div class="col-lg-6">
                            <label for="country">JUIZ:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="JUIZMANDATO" name="JUIZMANDATO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">VARA:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="VARAMANDATO" name="VARAMANDATO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">DATA EXPEDIC??O:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="DATAEXPEDICAOMANDATO" name="DATAEXPEDICAOMANDATO" type="date"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NUMERO:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NUMEROMANDATO" name="NUMEROMANDATO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">DATA SENTEN??A:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="DATASENTENCAMANDATO" name="DATASENTENCAMANDATO" type="date"  class="form-control valid" aria-invalid="false">
                          </div>
                        </div>
                      </div>


                      <div class="tab-pane fade" id="dadosfiliacaosocio" role="tabpanel" aria-labelledby="dadosfiliacaosocio-tab">
                            <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">DADOS FILIA????O SOCIOAFETIVA 1</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <hr style="margin-top:-10px">
                          <div class="row">
                            <div class="col-lg-12">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('PAISOCIO','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div>  
                            <div class="col-lg-12">
                              <label for="country">NOME</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMEPAISOCIO" name="NOMEPAISOCIO" type="text"  class="form-control valid" aria-invalid="false" readonly="">
                              <input type="hidden" id="CPFPAISOCIO" name="CPFPAISOCIO">
                              <input type="hidden" id="IDPESSOAPAISOCIO" name="IDPESSOAPAISOCIO">
                            </div> 


                          
                          <div class="col-lg-12">
                          <div class="col-6 col-md-6 custom-control custom-checkbox">
                               <br> 
                              <input class="custom-control-input" id="POSSUIROGOPAISOCIO" value="1" type="checkbox">
                              <label class="custom-control-label" for="POSSUIROGOPAISOCIO">
                                <span>Assinante a rogo</span>
                              </label>
                            </div>
                            </div>
                           <div class="col-lg-12 DADOSROGOPAISOCIO">
                            <br>
                            <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">ASSINANTE A ROGO:</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #8094cf" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <div class="col-lg-12 DADOSROGOPAISOCIO">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('ROGOPAISOCIO','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div>  
                              <label for="country">CPF</label>
                              <input type="text" class="form-control" onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ROGOPAISOCIO" name="CPFROGOPAISOCIO">
                              <input type="hidden" id="IDPESSOAROGOPAISOCIO" name="IDPESSOAROGOPAISOCIO">
                          </div>  
                            
                          </div>
                          <br><br>
                          <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">DADOS FILIA????O SOCIOAFETIVA 2</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <hr style="margin-top:-10px">
                          <div class="row">
                            <div class="col-lg-12">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('MAESOCIO','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div> 
                            <div class="col-lg-12">
                              <label for="country">NOME</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMEMAESOCIO" name="NOMEMAESOCIO" type="text"  class="form-control valid" aria-invalid="false" readonly="">
                              <input type="hidden" id="CPFMAESOCIO" name="CPFMAESOCIO">
                              <input type="hidden" id="IDPESSOAMAESOCIO" name="IDPESSOAMAESOCIO">
                            </div> 

                           
                          <div class="col-lg-12">
                          <div class="col-6 col-md-6 custom-control custom-checkbox">
                               <br> 
                              <input class="custom-control-input" id="POSSUIROGOMAESOCIO" value="1" type="checkbox">
                              <label class="custom-control-label" for="POSSUIROGOMAESOCIO">
                                <span>Assinante a rogo</span>
                              </label>
                            </div>  
                          </div>
                          <div class="col-lg-12 DADOSROGOMAESOCIO">
                            <br>
                            <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">ASSINANTE A ROGO:</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #8094cf" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <div class="col-lg-12 DADOSROGOMAESOCIO">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('ROGOMAESOCIO','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div>
                              <label for="country">CPF</label>
                              <input type="text" class="form-control" onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ROGOMAESOCIO" name="CPFROGOMAESOCIO">
                              <input type="hidden" id="IDPESSOAROGOMAESOCIO" name="IDPESSOAROGOMAESOCIO">
                          </div>  
                          
                          </div>
                      </div>


                      <div class="tab-pane fade" id="dadosadd" role="tabpanel" aria-labelledby="dadosadd-tab">
                        <div class="row">

                     
                        <div class="col-lg-12">
                              <button onclick="guardar_info_add('<?=$id?>')" class="btn btn-info btn-lg btn-block"  type="button"> <i class="fa fa-save" aria-hidden="true"></i> GUARDAR INFO. ADICIONAIS
                              </button>
                              <br><br>
                          </div>  

                           <div class="col-lg-12">
                              <label for="country">EXIBIR ESTAS INFORMA????ES NAS CERTID??ES</label>
                              <select id="EXIBIROBSREGISTRO" name="EXIBIROBSREGISTRO" class="form-control">
                                <option value="S">SIM</option>
                                <option value="N">N??O</option>
                              </select>
                            </div>
                          <div class="col-lg-12" style="margin-top:5%">
                              <label for="country">OBSERVA????ES NO REGISTRO</label>
                              <textarea onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="OBSERVACOESREGISTRO" name="OBSERVACOESREGISTRO"  class="form-control valid tinymce-100" aria-invalid="false">
                                <?php if (isset($dados2['observacoes_registro'])): ?>
                                  <?=$dados2['observacoes_registro']?> <br>
                                <?php endif ?>
                                 <?=$dados['AVERBACAOTERMOANTIGO']?></textarea>
                            </div>

                            <div class="col-lg-12" style="margin-top:5%">
                              <label for="country">CONFIGURAR MANUALMENTE INTEIRO TEOR</label>
                              <textarea onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="INTEIROTEOR" name="INTEIROTEOR"  class="form-control valid tinymce-500" aria-invalid="false"> <?php if (isset($dados2['observacoes_registro'])): ?><?=$dados2['inteiro_teor']?><?php endif ?></textarea>
                            </div> 
                           <?php include('form-dadosadd.php') ?>
                            
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              </form>
            </div>
          </div>
        </div>
        <div class="section section-components col-lg-5">
          <div class="container">
               <div class="col-lg-12 " id="info_salvar">
              </div>
              <br>
              <div class="col-lg-12">
               <button onclick="dadosregistro()" class="btn btn-info btn-lg btn-block"  type="button"> <i class="fa fa-file-text-o" aria-hidden="true"></i> DADOS DO REGISTRO</button>
              </div>
              <hr>
              <div class="col-lg-12">
                <button onclick="opselo()" class="btn gradient-azul-forte btn-lg btn-block"> <i class="fa fa-shield"></i> SOLICITAR SELO(S) </button>
              </div>
              <hr>
              <div class="header"><h6>PR?? VISUALIZA????O</h6></div>
              <button class="btn btn-success btn-block" onclick="previewreg('<?=$id?>')"><i class="fa fa-refresh">ATUALIZAR</i></button>
              <div class="card" id="previewreg" >
                TEXTO AQUI<br><br>
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
<?php include('modais.php'); ?>
<?php include('control/preencher_campos.php'); ?>
<script src="js/nascimento.js"></script>
<script src="../assets/plugins/tinymce/tinymce.js"></script>
<script src="js/editor.js"></script>
<input name="image" type="file" id="upload" class="hidden" onchange="" style="display: none;">
<script src="../assets/plugins/ajax/clipboard.min.js"></script>
<script src="js/funcoes.js"></script>
<input type="hidden" id="status_registro">


