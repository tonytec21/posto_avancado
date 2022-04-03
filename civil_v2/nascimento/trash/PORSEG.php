<?php include('../controller/db_functions.php');
session_start();
include_once("../assets/header.php");
include("../index/verifica-modulos.php");
?>
<?php include_once("../assets/menu.php");?>


<body class="index-page bg-secondary main_dark_mode">



  <section style="margin-top: -3%;">
      <div class="row">
        <div class="section section-components col-lg-7">
          <div class="container">
              <div class="header row"><h3 class="col-lg-7">REGISTRO DE NASCIMENTO</h3>
               <button class="btn btn-info btn-lg btn-block col-lg-4"  type="button"> <i class="fa fa-file-text-o" aria-hidden="true"></i> REGISTRO</button>
              </div>
              <div class="row justify-content-center" style="border-right: 2px solid purple;">
                <div class="col-lg-12">
                  <form id="formprincipal">
                  <div class="nav-wrapper">
                    <ul class="nav nav-pills nav-fill flex-column flex-md-row col-lg-12" id="tabs-icons-text" role="tablist">

                      <li class="nav-item">
                        <a class="nav-link mb-sm-3 mb-md-0 active" id="tabs-icons-text-1-tab" data-toggle="tab" href="#dadosnascido" role="tab" aria-controls="dadosnascido" aria-selected="true"><i class="fa fa-book"></i> DADOS DO NASCIDO</a>
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

                      <li class="nav-item" style="margin-bottom: 3%">
                        <a class="nav-link mb-sm-3 mb-md-0" id="dadosfiliacaosocio-tab" data-toggle="tab" href="#dadosfiliacaosocio" role="tab" aria-controls="dadosfiliacaosocio" aria-selected="false"> <i class="fa fa-book"></i> FILIAÇÃO SOCIOAFETIVA</a>
                      </li>

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
                            <input onblur="campos_input($(this).attr('id'))" id="NOMENASCIDO" name="NOMENASCIDO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CPF NASCIDO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="CPFNASCIDO" name="CPFNASCIDO" type="text"  class="form-control cpf valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NATURALIDADE NASCIDO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NATURALIDADENASCIDO" name="NATURALIDADENASCIDO" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">SEXO NASCIDO:</label>
                            <select onchange="campos_input($(this).attr('id'))" id="SEXONASCIDO" name="SEXONASCIDO" class="form-control valid">
                              <option value=""></option>
                              <option value="M">MASCULINO</option>
                              <option value="F">FEMININO</option>
                              <option value="F">INDEFINIDO</option>
                            </select>  
                          </div>
                          <div class="col-lg-6">
                            <label for="country">GEMEOS:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="GEMEOS" name="GEMEOS" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NOME MATRICULA GEMEO(S):</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NOMEMATRICULAGEMEOS" name="NOMEMATRICULAGEMEOS" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">LOCAL NASCIMENTO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="LOCALNASCIMENTO" name="LOCALNASCIMENTO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ENDEREÇO LOCAL NASCIMENTO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ENDERECOLOCALNASCIMENTO" name="ENDERECOLOCALNASCIMENTO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CIDADE NASCIMENTO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="CIDADENASCIMENTO" name="CIDADENASCIMENTO" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">DATA NASCIMENTO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="DATANASCIMENTO" name="DATANASCIMENTO" type="date"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">HORA NASCIMENTO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="HORANASCIMENTO" name="HORANASCIMENTO" type="time"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">TIPO LOCAL NASCIMENTO:</label>
                            <select onchange="campos_input($(this).attr('id'))" id="TIPOLOCALNASCIMENTO" name="TIPOLOCALNASCIMENTO"  class="form-control valid" aria-invalid="false">
                              <option value="">OPÇÃO</option>
                              <option value="">OPÇÃO</option>
                              <option value="">OPÇÃO</option>
                              <option value="">OPÇÃO</option>
                              <option value="">OPÇÃO</option>
                            </select>
                          </div>

                          <div class="col-lg-6">
                            <label for="country">DNV:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="DNV" name="DNV" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">RANI:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="RANI" name="RANI" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">MEDICO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="MEDICO" name="MEDICO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CRM:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="CRM" name="CRM" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                       
                         </div>
                       </div>
                       

                        <div class="tab-pane fade" id="dadosdeclarante" role="tabpanel" aria-labelledby="dadosdeclarante-tab">
                            <br>
                            <legend>DADOS DECLARANTE</legend>
                            <hr>
                          <div class="row">
                              <div class="col-lg-6">
                                <label for="country">QUALIDADE</label>
                                <input onblur="campos_input($(this).attr('id'))" id="QUALIDADEDECLARANTE" name="QUALIDADEDECLARANTE" type="text"  class="form-control valid" aria-invalid="false" placeholder="Ex. Na qualidade de Avó">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">NOME</label>
                                <input onblur="campos_input($(this).attr('id'))" id="NOMEDECLARANTE" name="NOMEDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">CPF</label>
                                <input onblur="campos_input($(this).attr('id'))" id="CPFDECLARANTE" name="CPFDECLARANTE" type="text"  class="form-control valid cpf" aria-invalid="false">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">RG</label>
                                <input onblur="campos_input($(this).attr('id'))" id="RGDECLARANTE" name="RGDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">ORGÃO EMISSOR</label>
                                <input onblur="campos_input($(this).attr('id'))" id="ORGAOEMISSORDECLARANTE" name="ORGAOEMISSORDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">NACIONALIDADE</label>
                                <input onblur="campos_input($(this).attr('id'))" id="NACIONALIDADEDECLARANTE" name="NACIONALIDADEDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">NATURALIDADE</label>
                                <input onblur="campos_input($(this).attr('id'))" id="NATURALIDADEDECLARANTE" name="NATURALIDADEDECLARANTE" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">DATA NASCIMENTO</label>
                                <input onblur="campos_input($(this).attr('id'))" id="DATANASCIMENTODECLARANTE" name="DATANASCIMENTODECLARANTE" type="date"  class="form-control valid" aria-invalid="false">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">SEXO</label>
                                <input onblur="campos_input($(this).attr('id'))" id="SEXODECLARANTE" name="SEXODECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">ESTADO CIVIL</label>
                                <input onblur="campos_input($(this).attr('id'))" id="ESTADOCIVILDECLARANTE" name="ESTADOCIVILDECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">PROFISSAO</label>
                                <input onblur="campos_input($(this).attr('id'))" id="PROFISSAODECLARANTE" name="PROFISSAODECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">ENDERECO</label>
                                <input onblur="campos_input($(this).attr('id'))" id="ENDERECODECLARANTE" name="ENDERECODECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">BAIRRO</label>
                                <input onblur="campos_input($(this).attr('id'))" id="BAIRRODECLARANTE" name="BAIRRODECLARANTE" type="text"  class="form-control valid" aria-invalid="false">
                              </div>
                              <div class="col-lg-6">
                                <label for="country">CIDADE</label>
                                <input onblur="campos_input($(this).attr('id'))" id="CIDADEDECLARANTE" name="CIDADEDECLARANTE" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                              </div>
                          </div>
                      </div>

                      <div class="tab-pane fade" id="dadosfiliacao" role="tabpanel" aria-labelledby="dadosfiliacao-tab">
                            <br>
                            <legend>DADOS PAI</legend>
                            <hr>
                          <div class="row">
                            <div class="col-lg-6">
                              <label for="country">NOME</label>
                              <input onblur="campos_input($(this).attr('id'))" id="NOMEPAI" name="NOMEPAI" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">CPF</label>
                              <input onblur="campos_input($(this).attr('id'))" id="CPFPAI" name="CPFPAI" type="text"  class="form-control valid cpf" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">RG</label>
                              <input onblur="campos_input($(this).attr('id'))" id="RGPAI" name="RGPAI" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">ORGÃO EMISSOR</label>
                              <input onblur="campos_input($(this).attr('id'))" id="ORGAOEMISSORPAI" name="ORGAOEMISSORPAI" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">NACIONALIDADE</label>
                              <input onblur="campos_input($(this).attr('id'))" id="NACIONALIDADEPAI" name="NACIONALIDADEPAI" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">NATURALIDADE</label>
                              <input onblur="campos_input($(this).attr('id'))" id="NATURALIDADEPAI" name="NATURALIDADEPAI" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">DATA NASCIMENTO</label>
                              <input onblur="campos_input($(this).attr('id'))" id="DATANASCIMENTOPAI" name="DATANASCIMENTOPAI" type="date"  class="form-control valid" aria-invalid="false">
                            </div>

                            <div class="col-lg-6">
                              <label for="country">IDADE</label>
                              <input onblur="campos_input($(this).attr('id'))" id="IDADEPAI" name="IDADEPAI" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">SEXO</label>
                              <input onblur="campos_input($(this).attr('id'))" id="SEXOPAI" name="SEXOPAI" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">ESTADO CIVIL</label>
                              <input onblur="campos_input($(this).attr('id'))" id="ESTADOCIVILPAI" name="ESTADOCIVILPAI" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">PROFISSAO</label>
                              <input onblur="campos_input($(this).attr('id'))" id="PROFISSAOPAI" name="PROFISSAOPAI" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">ENDEREÇO</label>
                              <input onblur="campos_input($(this).attr('id'))" id="ENDERECOPAI" name="ENDERECOPAI" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">BAIRRO</label>
                              <input onblur="campos_input($(this).attr('id'))" id="BAIRROPAI" name="BAIRROPAI" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">CIDADE</label>
                              <input onblur="campos_input($(this).attr('id'))" id="CIDADEPAI" name="CIDADEPAI" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">AVO 1 PATERNO:</label>
                              <input onblur="campos_input($(this).attr('id'))" id="AVO1PATERNO" name="AVO1PATERNO" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">AVO 2 PATERNO:</label>
                              <input onblur="campos_input($(this).attr('id'))" id="AVO2PATERNO" name="AVO2PATERNO" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            </div>
                            <br>
                            <legend>MÃE</legend>
                            <hr>
                            <div class="row">
                            <div class="col-lg-6">
                              <label for="country">NOME </label>
                              <input onblur="campos_input($(this).attr('id'))" id="NOMEMAE" name="NOMEMAE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">CPF </label>
                              <input onblur="campos_input($(this).attr('id'))" id="CPFMAE" name="CPFMAE" type="text"  class="form-control valid cpf" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">RG </label>
                              <input onblur="campos_input($(this).attr('id'))" id="RGMAE" name="RGMAE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">ORGÃO EMISSOR </label>
                              <input onblur="campos_input($(this).attr('id'))" id="ORGAOEMISSORMAE" name="ORGAOEMISSORMAE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">NACIONALIDADE </label>
                              <input onblur="campos_input($(this).attr('id'))" id="NACIONALIDADEMAE" name="NACIONALIDADEMAE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">NATURALIDADE </label>
                              <input onblur="campos_input($(this).attr('id'))" id="NATURALIDADEMAE" name="NATURALIDADEMAE" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">DATA NASCIMENTO </label>
                              <input onblur="campos_input($(this).attr('id'))" id="DATANASCIMENTOMAE" name="DATANASCIMENTOMAE" type="date"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">IDADE </label>
                              <input onblur="campos_input($(this).attr('id'))" id="IDADEMAE" name="IDADEMAE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">SEXO </label>
                              <input onblur="campos_input($(this).attr('id'))" id="SEXOMAE" name="SEXOMAE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">ESTADO CIVIL </label>
                              <input onblur="campos_input($(this).attr('id'))" id="ESTADOCIVILMAE" name="ESTADOCIVILMAE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">PROFISSAO </label>
                              <input onblur="campos_input($(this).attr('id'))" id="PROFISSAOMAE" name="PROFISSAOMAE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">ENDEREÇO </label>
                              <input onblur="campos_input($(this).attr('id'))" id="ENDERECOMAE" name="ENDERECOMAE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">BAIRRO </label>
                              <input onblur="campos_input($(this).attr('id'))" id="BAIRROMAE" name="BAIRROMAE" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                              <label for="country">CIDADE </label>
                              <input onblur="campos_input($(this).attr('id'))" id="CIDADEMAE" name="CIDADEMAE" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                            </div>
                            <div class="col-lg-6">
                            <label for="country">AVO 1 MATERNO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="AVO1MATERNO" name="AVO1MATERNO" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                            <div class="col-lg-6">
                            <label for="country">AVO 2 MATERNO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="AVO2MATERNO" name="AVO2MATERNO" type="text"  class="form-control valid" aria-invalid="false">
                            </div>
                          </div>
                      </div>


                      <div class="tab-pane fade" id="dadostestemunhas" role="tabpanel" aria-labelledby="dadostestemunhas-tab">
                        <br>
                        <legend>TESTEMUNHA 1</legend>
                        <hr>
                        <div class="row">
                          <div class="col-lg-6">
                            <label for="country">NOME</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NOMETESTEMUNHA1" name="NOMETESTEMUNHA1" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CPF</label>
                            <input onblur="campos_input($(this).attr('id'))" id="CPFTESTEMUNHA1" name="CPFTESTEMUNHA1" type="text"  class="form-control valid cpf" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">RG</label>
                            <input onblur="campos_input($(this).attr('id'))" id="RGTESTEMUNHA1" name="RGTESTEMUNHA1" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ORGÃO EMISSOR</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ORGAOEMISSORTESTEMUNHA1" name="ORGAOEMISSORTESTEMUNHA1" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">PROFISSAO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="PROFISSAOTESTEMUNHA1" name="PROFISSAOTESTEMUNHA1" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NACIONALIDADE</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NACIONALIDADETESTEMUNHA1" name="NACIONALIDADETESTEMUNHA1" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NATURALIDADE</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NATURALIDADETESTEMUNHA1" name="NATURALIDADETESTEMUNHA1" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">DATA NASCIMENTO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="DATANASCIMENTOTESTEMUNHA1" name="DATANASCIMENTOTESTEMUNHA1" type="date"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">SEXO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="SEXOTESTEMUNHA1" name="SEXOTESTEMUNHA1" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ESTADO CIVIL</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ESTADOCIVILTESTEMUNHA1" name="ESTADOCIVILTESTEMUNHA1" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ENDEREÇO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ENDERECOTESTEMUNHA1" name="ENDERECOTESTEMUNHA1" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">BAIRRO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="BAIRROTESTEMUNHA1" name="BAIRROTESTEMUNHA1" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CIDADE</label>
                            <input onblur="campos_input($(this).attr('id'))" id="CIDADETESTEMUNHA1" name="CIDADETESTEMUNHA1" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                          </div>
                          </div>
                          <br>
                          <legend>TESTEMUNHA 2</legend>
                          <hr>
                          <div class="row">
                          <div class="col-lg-6">
                            <label for="country">NOME</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NOMETESTEMUNHA2" name="NOMETESTEMUNHA2" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CPF</label>
                            <input onblur="campos_input($(this).attr('id'))" id="CPFTESTEMUNHA2" name="CPFTESTEMUNHA2" type="text"  class="form-control valid cpf" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">RG</label>
                            <input onblur="campos_input($(this).attr('id'))" id="RGTESTEMUNHA2" name="RGTESTEMUNHA2" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ORGÃO EMISSOR</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ORGAOEMISSORTESTEMUNHA2" name="ORGAOEMISSORTESTEMUNHA2" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">PROFISSAO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="PROFISSAOTESTEMUNHA2" name="PROFISSAOTESTEMUNHA2" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NACIONALIDADE</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NACIONALIDADETESTEMUNHA2" name="NACIONALIDADETESTEMUNHA2" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NATURALIDADE</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NATURALIDADETESTEMUNHA2" name="NATURALIDADETESTEMUNHA2" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">DATA NASCIMENTO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="DATANASCIMENTOTESTEMUNHA2" name="DATANASCIMENTOTESTEMUNHA2" type="date"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">SEXO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="SEXOTESTEMUNHA2" name="SEXOTESTEMUNHA2" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ESTADO CIVIL</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ESTADOCIVILTESTEMUNHA2" name="ESTADOCIVILTESTEMUNHA2" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ENDEREÇO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ENDERECOTESTEMUNHA2" name="ENDERECOTESTEMUNHA2" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">BAIRRO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="BAIRROTESTEMUNHA2" name="BAIRROTESTEMUNHA2" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CIDADE</label>
                            <input onblur="campos_input($(this).attr('id'))" id="CIDADETESTEMUNHA2" name="CIDADETESTEMUNHA2" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                          </div>
                        </div>
                      </div>


                      <div class="tab-pane fade" id="dadossentenca" role="tabpanel" aria-labelledby="dadossentenca-tab">
                        <div class="row">
                          <div class="col-lg-6">
                            <label for="country">JUIZ:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="JUIZMANDATO" name="JUIZMANDATO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">VARA:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="VARAMANDATO" name="VARAMANDATO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">DATA EXPEDICÃO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="DATAEXPEDICAOMANDATO" name="DATAEXPEDICAOMANDATO" type="date"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NUMERO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NUMEROMANDATO" name="NUMEROMANDATO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">DATA SENTENÇA:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="DATASENTENCAMANDATO" name="DATASENTENCAMANDATO" type="date"  class="form-control valid" aria-invalid="false">
                          </div>
                        </div>
                      </div>


                      <div class="tab-pane fade" id="dadosfiliacaosocio" role="tabpanel" aria-labelledby="dadosfiliacaosocio-tab">
                        <br>
                          <legend>PAI SOCIOAFETIVA</legend>
                          <hr>
                        <div class="row">
                          <div class="col-lg-6">
                            <label for="country">NOME</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NOMEPAISOCIO" name="NOMEPAISOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CPF</label>
                            <input onblur="campos_input($(this).attr('id'))" id="CPFPAISOCIO" name="CPFPAISOCIO" type="text"  class="form-control valid cpf" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">RG</label>
                            <input onblur="campos_input($(this).attr('id'))" id="RGPAISOCIO" name="RGPAISOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ORGÃO EMISSOR</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ORGAOEMISSORPAISOCIO" name="ORGAOEMISSORPAISOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NACIONALIDADE</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NACIONALIDADEPAISOCIO" name="NACIONALIDADEPAISOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NATURALIDADE</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NATURALIDADEPAISOCIO" name="NATURALIDADEPAISOCIO" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">DATA NASCIMENTO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="DATANASCIMENTOPAISOCIO" name="DATANASCIMENTOPAISOCIO" type="date"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">SEXO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="SEXOPAISOCIO" name="SEXOPAISOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ESTADO CIVIL</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ESTADOCIVILPAISOCIO" name="ESTADOCIVILPAISOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">PROFISSAO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="PROFISSAOPAISOCIO" name="PROFISSAOPAISOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ENDEREÇO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ENDERECOPAISOCIO" name="ENDERECOPAISOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">BAIRRO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="BAIRROPAISOCIO" name="BAIRROPAISOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CIDADE</label>
                            <input onblur="campos_input($(this).attr('id'))" id="CIDADEPAISOCIO" name="CIDADEPAISOCIO" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">AVO 1 PATERNO SOCIO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="AVO1PATERNOSOCIO" name="AVO1PATERNOSOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">AVO 2 PATERNO SOCIO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="AVO2PATERNOSOCIO" name="AVO2PATERNOSOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          </div>
                          <br>
                          <legend>MÃE SOCIOAFETIVA</legend>
                          <hr>
                          <div class="row">
                          <div class="col-lg-6">
                            <label for="country">NOME</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NOMEMAESOCIO" name="NOMEMAESOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CPF</label>
                            <input onblur="campos_input($(this).attr('id'))" id="CPFMAESOCIO" name="CPFMAESOCIO" type="text"  class="form-control valid cpf" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">RG</label>
                            <input onblur="campos_input($(this).attr('id'))" id="RGMAESOCIO" name="RGMAESOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ORGÃO EMISSOR</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ORGAOEMISSORMAESOCIO" name="ORGAOEMISSORMAESOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NACIONALIDADE</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NACIONALIDADEMAESOCIO" name="NACIONALIDADEMAESOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">NATURALIDADE</label>
                            <input onblur="campos_input($(this).attr('id'))" id="NATURALIDADEMAESOCIO" name="NATURALIDADEMAESOCIO" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">DATA NASCIMENTO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="DATANASCIMENTOMAESOCIO" name="DATANASCIMENTOMAESOCIO" type="date"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">SEXO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="SEXOMAESOCIO" name="SEXOMAESOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ESTADO CIVIL</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ESTADOCIVILMAESOCIO" name="ESTADOCIVILMAESOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">PROFISSAO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="PROFISSAOMAESOCIO" name="PROFISSAOMAESOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">ENDEREÇO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="ENDERECOMAESOCIO" name="ENDERECOMAESOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">BAIRRO</label>
                            <input onblur="campos_input($(this).attr('id'))" id="BAIRROMAESOCIO" name="BAIRROMAESOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">CIDADE</label>
                            <input onblur="campos_input($(this).attr('id'))" id="CIDADEMAESOCIO" name="CIDADEMAESOCIO" type="text"  class="form-control valid" aria-invalid="false" placeholder="CLIQUE PARA PESQUISAR">
                          </div>

                          <div class="col-lg-6">
                            <label for="country">AVO 1 MATERNO SOCIO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="AVO1MATERNOSOCIO" name="AVO 1 MATERNO SOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                          <div class="col-lg-6">
                            <label for="country">AVO 2 MATERNO SOCIO:</label>
                            <input onblur="campos_input($(this).attr('id'))" id="AVO2MATERNOSOCIO" name="AVO 2 MATERNO SOCIO" type="text"  class="form-control valid" aria-invalid="false">
                          </div>
                        </div>
                      </div>


                      <div class="tab-pane fade" id="dadosadd" role="tabpanel" aria-labelledby="dadosadd-tab">
                        add
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
              <div class="header"><h3>PRÉ VISUALIZAÇÃO</h3></div>
              <div class="card" style="padding: 20px;">
                

                TEXTO AQUI

              </div>
              <div class="col-lg-12">
                <span id="info_salvar" style="color: silver"></span>
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
<script src="js/nascimento.js"></script>

<script type="text/javascript">
  
/*
  function campos_input2(campo){
    var erros = '';
    $('#formprincipal').find('.form-control').each(function(){
      if(!$(this).val()){
        erros +='O campo ' + $(this).attr('description') + ' é obrigatório!\n';
        $(this).css("border-color", 'red');
        $(this).css("color", 'red');
      }
    });
    if (erros != '') {
      swal("ATENÇÃO",erros,"warning");  
    }
  }
*/

  function campos_input(campo){
    if (campo!='') {
      //swal("INFORMAÇÃO INSERIDA: ", campo, "info");
       $('#info_salvar').html("salvando dados...");
      setTimeout(function(){
        $('#info_salvar').html("");
      },500);


    }
  }



</script>