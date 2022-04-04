<?php include('../controller/db_functions.php');
session_start();
include_once("../assets/header.php");
include("../index/verifica-modulos.php");
$id = $_GET['id'];
$tabela = 'registro_obito_novo';
$json_dados = json_table_registro($tabela, $id);
$json_dados = json_decode($json_dados, true); 
$dados = json_encode($json_dados[0],JSON_UNESCAPED_UNICODE);
$dados = json_decode($dados, true);
#buscando tabela auxiliar:
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
?>
<?php include_once("../assets/menu.php");?>


<body class="index-page bg-secondary main_dark_mode" style="max-width:100%">



  <section style="margin-top: -3%;">
      <div class="row">
        <div class="section section-components col-lg-12">
          <div class="container">
              <div class="header"><h3 class="">CADASTRO DE REGISTROS LAVRADOS</h3>
              </div>
              <div class="row justify-content-center">
                <div class="col-lg-12">

                  <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row col-lg-12" id="tabs-icons-text" role="tablist">

                      <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="dadosregistro-tab" data-toggle="tab" href="#dadosregistro" role="tab" aria-controls="dadosregistro" aria-selected="false"> <i class="fa fa-book"></i> DADOS REGISTRO</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="tabs-icons-text-1-tab" data-toggle="tab" href="#dadosfalecido" role="tab" aria-controls="dadosfalecido" aria-selected="true"><i class="fa fa-book"></i> DADOS DO ÓBITO</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="dadosdeclarante-tab" data-toggle="tab" href="#dadosdeclarante" role="tab" aria-controls="dadosdeclarante" aria-selected="false"><i class="fa fa-book"></i> DECLARANTE</a>
                      </li>
                      <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="dadosfiliacao-tab" data-toggle="tab" href="#dadosfiliacao" role="tab" aria-controls="dadosfiliacao" aria-selected="false"><i class="fa fa-book"></i> FILIAÇÃO</a>
                      </li>
                      
                      <li class="nav-item" style="margin-bottom: 3%">
                        <a class="nav-link mb-sm-3 mb-md-0" id="dadostestemunhas-tab" data-toggle="tab" href="#dadostestemunhas" role="tab" aria-controls="dadostestemunhas" aria-selected="false"> <i class="fa fa-book"></i> TESTEMUNHAS</a>
                      </li>

                      <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="dadossentenca-tab" data-toggle="tab" href="#dadossentenca" role="tab" aria-controls="dadossentenca" aria-selected="false"> <i class="fa fa-book"></i> SENTENÇA/MANDADO JUDICIAL</a>
                      </li>

                    
                      <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0" id="dadosadd-tab" data-toggle="tab" href="#dadosadd" role="tab" aria-controls="dadosadd" aria-selected="false"> <i class="fa fa-book"></i> DADOS ADICIONAIS</a>
                      </li>

                      
                    </ul>
                  </div>
                  <div class="">
                    <div class="card-body">
                      <div class="tab-content" id="myTabContent">
                        
                        <div class="tab-pane fade show active" id="dadosregistro" role="tabpanel" aria-labelledby="dadosregistro-tab">
                          <div class="row">
                            <div class="col-lg-6">
                              <label for="country">TIPO DE ACERVO:</label>
                              <select class="form-control" id="TIPOACERVO" name="TIPOACERVO">
                                <option value="1">PRÓPRIO</option>
                                <option value="2">INCORPORADO</option>
                              </select>
                            </div>
                            <div class="col-lg-6">
                              <label for="country">TIPO LIVRO:</label>
                              <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" class="form-control" id="TIPOLIVRO" name="TIPOLIVRO" required="true">
                                <option value="">SELECIONE</option>
                                <option value="4">LIVRO C</option>
                                <option value="5">LIVRO C AUXILIAR</option>
                              </select>
                            </div>
                            <div class="col-lg-6">
                              <label for="country">LIVRO:</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="LIVROOBITO" name="LIVROOBITO" type="number"  class="form-control valid" aria-invalid="false" required="true">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">FOLHA:</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="FOLHAOBITO" name="FOLHAOBITO" type="number"  class="form-control valid" aria-invalid="false" required="true">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">TERMO:</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="TERMOOBITO" name="TERMOOBITO" type="number"  class="form-control valid" aria-invalid="false" required="true">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">DATA REGISTRO:</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="DATAENTRADA" name="DATAENTRADA" type="date"  class="form-control valid" aria-invalid="false" required="true">
                              <input type="hidden" id="status" name="" value="ACV">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">MATRICULA:</label>
                              <input id="MATRICULA" name="MATRICULA" type="text"  class="form-control valid" aria-invalid="false" readonly="">
                              <button class="btn btn-info btn-lg btn-block" onclick="gerarmatricula($('#LIVROOBITO').val(), $('#FOLHAOBITO').val(), $('#TERMOOBITO').val(), 'OB', $('#TIPOLIVRO').val(), $('#TIPOACERVO').val(), $('#DATAENTRADA').val())
                              campos_input('MATRICULA', '<?=$id?>')
                              "> GERAR MATRICULA</button>
                            </div>
                          </div>
                          <br><br>
                          <button class="btn btn-primary btn-lg btn-block" onclick="finalizarregistro('<?=$id?>')"> <i class="fa fa-check-square-o" aria-hidden="true"></i>
                          SALVAR DADOS DO REGISTRO </button>
                        </div>


                         <div class="tab-pane fade" id="dadosfalecido" role="tabpanel" aria-labelledby="dadosfalecido-tab">
                         <legend class="bg-white" style="padding:20px">
                            <div class="row col-lg-12">
                              <h3 class="col-lg-10">DADOS PESSOA FALECIDA</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <hr style="margin-top:-10px">
                          <div class="row">
                            <div class="col-lg-12">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div>  
                            <div class="col-lg-12">
                              <label for="country">NOME</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOME" name="NOME" type="text"  class="form-control valid" aria-invalid="false">
                              <input type="hidden" id="IDPESSOA" name="IDPESSOA">
                            </div> 
                            
                            <div class="col-lg-12" id="formulario">
                              <div class="row">
                                <div class="col-lg-6">
                                  <label for="country">CPF</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="CPF" name="CPF" type="text"  class="cpf form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">RG</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="RG" name="RG" type="text"  class="form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">ORGÃO EMISSOR</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ORGAOEMISSOR" name="ORGAOEMISSOR" type="text"  class="form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">NACIONALIDADE</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NACIONALIDADE" name="NACIONALIDADE" type="text"  class="form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">NATURALIDADE</label>
                                  <input onclick="buscacidade($(this).attr('id'), '<?=$id?>')" readonly="" placeholder="CLIQUE PARA PESQUISAR" id="NATURALIDADE" name="NATURALIDADE" type="text"  class="form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">DATANASCIMENTO</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="DATANASCIMENTO" name="DATANASCIMENTO" type="date"  class="form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">SEXO</label>
                                  <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="SEXO" name="SEXO" class="form-control valid" required="true">
                                    <option value=""></option>
                                    <option value="M">MASCULINO</option>
                                    <option value="F">FEMININO</option>
                                  </select>  
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">ESTADOCIVIL</label>
                                  <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="ESTADOCIVIL" name="ESTADOCIVIL" type="text"  class="form-control valid" aria-invalid="false">
                                    <option value="SO">Solteiro (a)</option>
                                    <option value="CA">Casado (a)</option>
                                    <option value="DI">Divorciado(a)</option>
                                    <option value="VI">Viúvo (a)</option>
                                    <option value="UN">União Estável</option>
                                    <option value="SJ">Separdo Judicialmente</option>
                                  </select>
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">PROFISSAO</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="PROFISSAO" name="PROFISSAO" type="text"  class="form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">ENDERECO</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="ENDERECO" name="ENDERECO" type="text"  class="form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">BAIRRO</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="BAIRRO" name="BAIRRO" type="text"  class="form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">CIDADE</label>
                                  <input onclick="buscacidade($(this).attr('id'), '<?=$id?>')" readonly="" placeholder="CLIQUE PARA PESQUISAR" id="CIDADE" name="CIDADE" type="text"  class="form-control valid" aria-invalid="false">
                                </div>
                              </div>
                            </div>  

                            <legend class="col-lg-12"><br>Outros dados:<hr></legend>

                            <div class="col-lg-6">
                              <label for="country">POSSUI GÊMEO:</label>
                              <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="GEMEO" name="GEMEO" class="form-control" required="true">
                                <option value="">SELECIONE</option>
                                <option value="S">SIM</option>
                                <option value="N">NÃO</option>
                              </select>
                            </div>

                            <div class="col-lg-6">
                              <label for="country">COR:</label>
                              <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="COR" name="COR" class="form-control">
                                <option value=""> Selecione </option>
                                <option value="BR">Branca</option>
                                <option value="PR">Preta</option>
                                <option value="PA">Parda</option>
                                <option value="AM">Amarela</option>
                                <option value="IN">Indígena</option>
                              </select>
                            </div>

                            <div class="col-lg-6">
                              <label for="country">DEIXOU FILHOS:</label>
                              <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="DEIXOUFILHOS" name="DEIXOUFILHOS" class="form-control " required="true">
                                <option value=""> Selecione </option>
                                <option value="S">Sim</option>
                                <option value="N">Não</option>
                              </select>
                            </div>

                            <div class="col-lg-6" id="nomefilhos" style="display:none">
                              <label for="country">NOME DOS FILHOS:</label>
                              <textarea onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMEFILHOS" name="NOMEFILHOS" class="form-control" placeholder="NOME, IDADE DOS FILHOS SEPARADOS POR PONTO E VÍRGULA ';' "></textarea>
                            </div>


                            <div class="col-lg-6">
                              <label for="country">ERA ELEITOR:</label>
                              <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="ELEITOR" name="ELEITOR" class="form-control " required="true">
                                <option value=""> Selecione </option>
                                <option value="S">Sim</option>
                                <option value="N">Não</option>
                              </select>
                            </div>

                            <div class="col-lg-6" id="eleitor" style="display:none">
                              <label for="country">Nº TÍTULO DE ELEITOR:</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" type="text" id="strTituloEleitor" name="strTituloEleitor" class="form-control " placeholder=" ">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">DEIXOU BENS:</label>
                              <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="DEIXOUBENS" name="DEIXOUBENS" class="form-control">
                                <option value=""> Selecione </option>
                                <option value="S">Sim, com Testamento conhecido</option>
                                <option value="S2">Sim, sem Testamento conhecido</option>
                                <option value="N">Não, com testamento conhecido</option>
                                <option value="N2">Não, sem testamento conhecido</option>

                              </select>
                            </div>

                            <!--div class="col-lg-6">
                              <label for="country">TIPO LIVRO:</label>
                              <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" class="form-control" id="TIPOLIVRO" name="TIPOLIVRO" required="true">
                                <option value="">SELECIONE</option>
                                <option value="4">LIVRO C</option>
                                <option value="5">LIVRO C AUXILIAR</option>
                              </select>
                            </div-->

                            <div class="col-lg-6" id="tempointrauterina" style="display:none">
                              <label for="country">TEMPO DE VIDA INTRAUTERINA (SEMANAS):</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" type="number" id="TEMPOINTRAUTERINA" name="TEMPOINTRAUTERINA" class="form-control"></input>
                            </div>

                            <div class="col-lg-6">
                              <label for="country">DATA ÓBITO:</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" type="date" id="DATAOBITO" name="DATAOBITO" class="form-control " placeholder=" " required="true">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">HORA ÓBITO:</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" type="time" id="HORAOBITO" name="HORAOBITO" class="form-control " placeholder=" ">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">TIPO MORTE:</label>
                              <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="TIPOMORTE" name="TIPOMORTE" class="form-control" required="true">
                                  <option value=""> Selecione </option>
                                <option value="NAT">NATURAL</option>
                                <option value="VIO">VIOLENTA</option>
                                </select>
                            </div>

                            <div class="col-lg-6">
                              <label for="country">LOCAL DO ÓBITO:</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" type="text" id="LOCALMORTE" name="LOCALMORTE" class="form-control " placeholder=" ">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">ENDEREÇO LOCAL DO ÓBITO:</label>
                                <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" type="text" id="ENDERECOOBITO" name="ENDERECOOBITO" class="form-control" placeholder="Rua, Nº" />
                            </div>


                            <div class="col-lg-6">
                            <label for="country">CIDADE ÓBITO:</label>
                            <input onclick="buscacidade($(this).attr('id'), '<?=$id?>')" id="CIDADEOBITO" name="CIDADEOBITO" type="text"  class="form-control valid" readonly="" placeholder="CLIQUE PARA PESQUISAR" required="true">
                          </div>


                            <div class="col-lg-6">
                              <label for="country">TIPO DE LOCAL DO ÓBITO:</label>
                                <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="TIPOLOCALOBITO" name="TIPOLOCALOBITO" class="form-control" required="true">
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


                            <div class="col-lg-6">
                              <label for="country">MEDICO ATESTANTE:</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" type="text" id="MEDICO" name="MEDICO" class="form-control " placeholder=" ">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">CRM MEDICO ATESTANTE:</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" type="text" id="CRM" name="CRM" class="form-control " placeholder="Nº CRM/UF">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">NUM DECLARAÇÃO DE ÓBITO:</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" type="text" id="NDO" name="NDO" class="form-control ndo " placeholder=" " required = "true">
                            </div>


                            <div class="col-lg-6">
                              <label for="country">CAUSA DA MORTE:</label>
                                  <textarea onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="CAUSAOBITO" name="CAUSAOBITO" class="form-control" required="true" placeholder="CAUSA OU CAUSAS DA MORTE SEPARADOS POR PONTO E VÍRGULA"></textarea>
                            </div>

                            <div class="col-lg-6">
                              <label for="country">LOCAL SEPULTAMENTO:</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" type="text" id="LOCALSEPULTAMENTO" name="LOCALSEPULTAMENTO" class="form-control " placeholder=" " required="true">
                            </div>

                          
                          </div>
                          <br><br>
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
                              <label for="country">O DECLARANTE É:</label>
                              <input type="text" onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="QUALIDADEDECLARANTE" name="QUALIDADEDECLARANTE" class="form-control" aria-invalid="false" placeholder="EX: mãe">
                            </div>   

                            
                            <div class="col-lg-12 outrodeclarante">
                              <br><br>
                              <button class="btn btn-info btn-lg btn-block outrodeclarante"  type="button" onclick="buscarcadastro('DECLARANTE','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                            <div class="col-lg-12">
                              <label for="country">NOME</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMEDECLARANTE" name="NOMEDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                              <input type="hidden" id="IDPESSOADECLARANTE" name="IDPESSOADECLARANTE">
                              </div>

                              <div class="col-lg-12" id="formularioDECLARANTE">
                                <div class="row">
                                  <div class="col-lg-6">
                                    <label for="country">CPF</label>
                                    <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="CPFDECLARANTE" name="CPFDECLARANTE" type="text"  class="form-control valid cpf" aria-invalid="false">
                                  </div>

                                  <div class="col-lg-6">
                                    <label for="country">RG</label>
                                    <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="RGDECLARANTE" name="RGDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                                  </div>

                                  <div class="col-lg-6">
                                    <label for="country">ORGÃO EMISSOR</label>
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
                                    <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="SEXODECLARANTE" name="SEXODECLARANTE" class="form-control valid">
                                      <option value=""></option>
                                      <option value="M">MASCULINO</option>
                                      <option value="F">FEMININO</option>
                                    </select>  
                                  </div>

                                  <div class="col-lg-6">
                                    <label for="country">ESTADOCIVIL</label>
                                    <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="ESTADOCIVILDECLARANTE" name="ESTADOCIVILDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                                      <option value="SO">Solteiro (a)</option>
                                      <option value="CA">Casado (a)</option>
                                      <option value="DI">Divorciado(a)</option>
                                      <option value="VI">Viúvo (a)</option>
                                      <option value="UN">União Estável</option>
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
                              <h3 class="col-lg-10">DADOS FILIAÇÃO 1</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <hr style="margin-top:-10px">
                          <div class="row">
                            <div class="col-lg-12">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('PAI','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div>  
                            <div class="col-lg-12">
                              <label for="country">NOME</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMEPAI" name="NOMEPAI" type="text"  class="form-control valid" aria-invalid="false">
                              <input type="hidden" id="IDPESSOAPAI" name="IDPESSOAPAI">
                            </div> 

                            <div class="col-lg-12" id="formularioPAI">
                              <div class="row">
                                <div class="col-lg-6">
                                  <label for="country">CPF</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="CPFPAI" name="CPFPAI" type="text"  class=" cpf form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">RG</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="RGPAI" name="RGPAI" type="text"  class="form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">ORGAOEMISSOR</label>
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
                                  <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="SEXOPAI" name="SEXOPAI" class="form-control valid">
                                    <option value=""></option>
                                    <option value="M">MASCULINO</option>
                                    <option value="F">FEMININO</option>
                                  </select>  
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">ESTADOCIVIL</label>
                                  <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="ESTADOCIVILPAI" name="ESTADOCIVILPAI" type="text"  class="form-control valid" aria-invalid="false">
                                    <option value="SO">Solteiro (a)</option>
                                    <option value="CA">Casado (a)</option>
                                    <option value="DI">Divorciado(a)</option>
                                    <option value="VI">Viúvo (a)</option>
                                    <option value="UN">União Estável</option>
                                    <option value="SJ">Separdo Judicialmente</option>
                                  </select>
                                </div>

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
                              <h3 class="col-lg-10">DADOS FILIAÇÃO 2</h3>
                              <div class="col-lg-2"><i style="font-size:40px; color: #172b4d" class=" ni ni-single-02"></i></div>
                            </div>  
                            </legend>
                            <hr style="margin-top:-10px">
                          <div class="row">
                            <div class="col-lg-12">
                            <button class="btn btn-info btn-lg btn-block"  type="button" onclick="buscarcadastro('MAE','<?=$id?>')"> <i class="fa fa-search" aria-hidden="true"></i> BUSCAR NO CADASTRO
                            </button>
                          </div> 
                            <div class="col-lg-12">
                              <label for="country">NOME</label>
                              <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NOMEMAE" name="NOMEMAE" type="text"  class="form-control valid" aria-invalid="false" required="true">
                              <input type="hidden" id="IDPESSOAMAE" name="IDPESSOAMAE">
                            </div> 

                            <div class="col-lg-12" id="formularioMAE">
                              <div class="row">
                                <div class="col-lg-6">
                                  <label for="country">CPF</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="CPFMAE" name="CPFMAE" type="text"  class="cpf form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">RG</label>
                                  <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="RGMAE" name="RGMAE" type="text"  class="form-control valid" aria-invalid="false">
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">ORGAOEMISSOR</label>
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
                                  <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="SEXOMAE" name="SEXOMAE" class="form-control valid">
                                    <option value=""></option>
                                    <option value="M">MASCULINO</option>
                                    <option value="F">FEMININO</option>
                                  </select>  
                                </div>

                                <div class="col-lg-6">
                                  <label for="country">ESTADOCIVIL</label>
                                  <select onchange="campos_input($(this).attr('id'), '<?=$id?>')" id="ESTADOCIVILMAE" name="ESTADOCIVILMAE" type="text"  class="form-control valid" aria-invalid="false">
                                    <option value="SO">Solteiro (a)</option>
                                    <option value="CA">Casado (a)</option>
                                    <option value="DI">Divorciado(a)</option>
                                    <option value="VI">Viúvo (a)</option>
                                    <option value="UN">União Estável</option>
                                    <option value="SJ">Separdo Judicialmente</option>
                                  </select>
                                </div>

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


                          <br>
                          <div class="row">
                          <div class="col-lg-12">
                          <div class="col-6 col-md-6 custom-control custom-checkbox">
                               <br> 
                              <input class="custom-control-input" id="POSSUISOCIOAFETIVA" value="1" type="checkbox">
                              <label class="custom-control-label" for="POSSUISOCIOAFETIVA">
                                <span>Filiação Socioafetiva</span>
                              </label>
                            </div>  
                          </div>
                          </div>
                          <br>
                          <div id="socioafetiva" style="display:none">
                            <legend class="bg-white" style="padding:20px">
                              <div class="row col-lg-12">
                                <h3 class="col-lg-10">DADOS FILIAÇÃO SOCIOAFETIVA 1</h3>
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
                              <h3 class="col-lg-10">DADOS FILIAÇÃO SOCIOAFETIVA 2</h3>
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
                            <label for="country">DATA EXPEDICÃO:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="DATAEXPEDICAOMANDATO" name="DATAEXPEDICAOMANDATO" type="date"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NUMERO:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="NUMEROMANDATO" name="NUMEROMANDATO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">DATA SENTENÇA:</label>
                            <input onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="DATASENTENCAMANDATO" name="DATASENTENCAMANDATO" type="date"  class="form-control valid" aria-invalid="false">
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
                              <label for="country">EXIBIR ESTAS INFORMAÇÕES NAS CERTIDÕES</label>
                              <select id="EXIBIROBSREGISTRO" name="EXIBIROBSREGISTRO" class="form-control">
                                <option value="S">SIM</option>
                                <option value="N">NÃO</option>
                              </select>
                            </div>
                          <div class="col-lg-12" style="margin-top:5%">
                              <label for="country">OBSERVAÇÕES NO REGISTRO</label>
                              <textarea onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="OBSERVACOESREGISTRO" name="OBSERVACOESREGISTRO"  class="form-control valid tinymce-100" aria-invalid="false"><?php if (isset($dados2['observacoes_registro'])): ?>
                                  <?=$dados2['observacoes_registro']?> <br>
                                <?php endif ?>
                                 <?=$dados['AVERBACAOTERMOANTIGO']?>
                                 <br>
                                 Observações:

                                 Número da declaração de óbito: <?=$dados['NDO']?>.  
                                 <?php if ($dados['DEIXOUBENS'] == 'S'): ?>
                                 O(a) falecido(a), Deixou Bens, Com testamento Conhecido, 

                                <?php elseif ($dados['DEIXOUBENS'] == 'S2'): ?>
                                  O(a) falecido(a), Deixou Bens, Sem testamento Conhecido,
                                <?php elseif ($dados['DEIXOUBENS'] == 'N'): ?>
                                  O(a) falecido(a), Não Deixou Bens, Com testamento Conhecido,  
                                <?php else: ?>
                                  O(a) falecido(a), Não deixou bens, Sem testamento Conhecido,  
                                <?php endif ?> 

                                <?php if ($dados['ELEITOR'] == 'S'): ?>
                                  Era eleitor,
                                <?php else: ?>
                                  não era eleitor,  
                                <?php endif ?>

                                <?php if ($dados['DEIXOUFILHOS'] == 'S'): ?>
                                  Deixou filhos (as), sendo eles, <?=mb_strtoupper($r->NOMEFILHOS)?>
                                <?php else: ?>
                                  Não deixou nenhum filho.
                                  <?php endif ?>
                                  <?php if ($dados['ORDEM'] == 'ORDEM'): ?>
                                    Registro feito por ordem Judicial.
                                  <?php endif ?>
                               </textarea></textarea>
                            </div>

                            <div class="col-lg-12" style="margin-top:5%">
                              <label for="country">CONFIGURAR MANUALMENTE INTEIRO TEOR</label>
                              <textarea onblur="campos_input($(this).attr('id'), '<?=$id?>')" id="INTEIROTEOR" name="INTEIROTEOR"  class="form-control valid tinymce-500" aria-invalid="false"><?php if (isset($dados2['observacoes_registro'])): ?><?=$dados2['inteiro_teor']?><?php endif ?></textarea>
                            </div> 

                            <?php include('form-dadosadd.php'); ?>
                           
                            
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>

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
<?php include('modais-acervo.php'); ?>
<?php include('control/preencher_campos_acervo.php'); ?>
<script src="js/obito-acervo.js"></script>
<script src="../assets/plugins/tinymce/tinymce.js"></script>
<script src="js/editor.js"></script>
<input name="image" type="file" id="upload" class="hidden" onchange="" style="display: none;">
<script src="js/funcoes-acervo.js"></script>
<input type="hidden" id="status_registro">

