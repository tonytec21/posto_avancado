<?php include('../controller/db_functions.php');
session_start();
$pdo = conectar();

include('header.php');
include('menu.php');
?>
<br><br><br>
     <section class="content"  style="margin-left: 30px!important; "  >
    <div class="container-fluid">
        <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        <div class="header">
        <h2>Cadastro de pessoas</h2>
        </div>
        <div class="body">
        <!-- Nav tabs -->


        <ul class="nav nav-tabs" role="tablist">
        <li id="li1" role="presentation" class="active">
        <a href="#dadosnascimento"  data-toggle="tab">
        <i class="material-icons">keyboard</i> Dados 
        </a>
        </li>
        <!--li id="li2" role="presentation"  class="">
        <a href="./ficha.php"  >
        <i class="material-icons">contacts</i> Ficha/Documento
        </a>
        </li>

        <li id="li4" role="presentation" class="" >
        <a href="./identificacao.php"  >
        <i class="material-icons">camera_front</i> Foto/Identificação
        </a>
        </li>

        <li id="li4" role="presentation" class="" >
        <a href="./cartao-assinatura"  >
        <i class="material-icons">picture_in_picture_alt</i> Cartão de assinatura
        </a>
        </li-->

        <!--li id="li4" role="presentation" >
        <a href="#assento" data-toggle="tab">
        <i class="material-icons">feedback</i>  Assento
        </a>
        </li-->

        


        </ul>


<div class="tab-content">
<!--======================================================================= DADOS PESSOA =============================================================== -->
    <div role="tabpanel" class="tab-pane fade in active" id="dadosnascimento" >
     <form method="POST" action="insert-pessoa.php">       
            <div class="row clearfix" style="background: #8c001a; color: white!important" >
                <br>
                        <div class="col-sm-4">
                            <div class="col-md-12 " >
                            <input type="checkbox" id="CID_ESTRANGEIRO" />
                            <label for="CID_ESTRANGEIRO">CADASTRO DE CIDADÃO ESTRANGEIRO</label>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label class="control-label col-md-4">TIPO DE CADASTRO</label>
                            <div class="col-md-8" >
                            <select class="form-control" required="" id="tipo_cadastro" name="tipo_cadastro" style="color:black!important">
                                <!-- <option value="">SELECIONE</option> -->
                                <option value="1">CADASTRO NOVO</option>
                                <!-- <option value="2">CADASTRO DE ACERVO FÍSICO</option>
                                <option value="3">CADASTRO MIGRADO DE OUTRA BASE</option> -->
                            </select>
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <label class="control-label col-md-4">PESSOA VIVA?</label>
                            <div class="col-md-8" >
                            <select class="form-control" required="" id="pessoa_viva" name="pessoa_viva">
                                <!-- <option value="">SELECIONE</option> -->
                                <option value="S">SIM, CADASTRO ATIVO</option>
                                <!-- <option value="N">NÃO PESSOA FALECIDA</option> -->
                            </select>
                            </div>
                        </div>

                       

                        </div>
                        
                        <div class="row" style="background: #8c001a; color: white!important" >
                         <div class="col-sm-4">
                            <!-- <div class="col-md-12 " >
                            <input type="checkbox" id="PESSOA_JUD" value="S" />
                            <label for="PESSOA_JUD">CADASTRO DE PESSOA JURIDICA</label>
                            </div> -->
                        </div>
                        <div class="col-sm-4" onclick="$('.form-control').prop('required',false)">
                                        <label class="col-md-2 control-label" for="cn"></label>
                                        <div style="margin-left: -15%" class="col-md-6" >
                                        <input type="checkbox" id="DES"  />
                                        <label for="DES">DESABILITE EXIGENCIAS</label>
                                        </div>
                                        </div>
                        <div class="col-sm-4" >
                        <!-- <label class="col-md-4 control-label" for="strNome">Número Ficha:</label>
                        <div class="col-md-8" >
                        <input  id="strFicha" name="strFicha" type="text" class="form-control input-md">
                        </div> -->
                        </div>
                        </div>
                        <br>
                          <div id="resultado"></div>
                           <input id="setTipoPessoa" name="setTipoPessoa" type="hidden">
                        <legend class="PESSOAF"></legend>
                        <br>
                        <div class="row clearfix PESSOAF" >

                        <div class="col-sm-6">
                            <label class="col-md-2" id="labelnome">NOME:</label>
                            <div class="col-md-10">
                                  <input  id="strNome" name="strNome" type="text" class="form-control input-md" required="" placeholder="Nome Completo">
                            </div>
                        </div>

                         <div class="col-sm-6">
                            <label class="col-md-2" id="labelcpf">CPF:</label>
                            <div class="col-md-10">
                                <input type="text" id="strCPF" name="strCPFcnpj" class="cpf form-control " placeholder="000.000.000-00">
                            </div>
                        </div>

                        
                       

                       <div class="col-sm-4">
                            <label class="col-md-3">RG:</label>
                            <div class="col-md-9">
                                <input type="text" id="strRG" name="strRG" class=" form-control " placeholder="000000000000-0">
                            </div>
                        </div>


                        <div class="col-sm-4">
                            <label class="col-md-6">ÓRGÃO EMISSOR:</label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="strOrgaoEm" id="strOrgaoEm" maxlength="10" placeholder="SIGLA/UF">
                            </div>
                        </div>



                        <div class="col-sm-4">
                            <label class="col-md-4">DATA DE EMISSÃO:</label>
                            <div class="col-md-8">
                                 <input  id="dataEmissao" name="dataEmissao" type="date" placeholder="" class="form-control input-md">
                            </div>
                        </div>

                        <div class="col-sm-6 dadosestrangeiro">
                            <label class="col-md-2">DOCUMENTO:</label>
                            <div class="col-md-10">
                                <input type="text" id="descdocestrangeiro" name="descdocestrangeiro" class="form-control " placeholder="DESCRIÇÃO">    
                                <input type="text" id="docestrangeiro" name="docestrangeiro" class="form-control " placeholder="NÚMERO/IDENTIFICÇÃO">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <label class="col-md-2">SEXO:</label>
                            <div class="col-md-10">
                            <select class="form-control" name="setSexo">
                            <option value="M">Masculino</option>
                            <option value="F">Feminino</option>
                            </select>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-md-4">DATA DE NASCIMENTO:</label>
                            <div class="col-md-8">
                                 <input id="dataNascimento" name="dataNascimento" type="date" placeholder="Ex: 30/07/2016" class="form-control input-md date" required="">
                            </div>
                        </div>    
                            

            </div>
            <br><legend class="PESSOAF"></legend>
            <div class="row clearfix PESSOAF">
                        <div class="col-sm-6">
                            <label class="col-md-3">NACIONALIDADE:</label>
                            <div class="col-md-9">
                                 <input  id="strNacionalidade" onkeypress="exibe()" name="strNacionalidade" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-md-3">NATURALIDADE:</label>
                            <div class="col-md-9">
                               <input id="strNaturalidade" onkeypress="exibe()" name="strNaturalidade" type="text" placeholder="clique para pesquisar" readonly class="form-control input-md">
                               <input id="textnaturalidade" name="textnaturalidade" type="text" placeholder="DIGITE A NATURALIDADE ESTRANGEIRA " class="form-control input-md dadosestrangeiro">

                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-md-3">PROFISSÃO:</label>
                            <div class="col-md-9">
                              <input  id="strProfissao" name="strProfissao" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>

                        
            </div>
            <br><legend class="PESSOAF"></legend>
            <div class="row clearfix PESSOAF">
                    <div class="col-sm-6">
                            <label class="col-md-3">ESTADO CIVIL:</label>
                            <div class="col-md-9">
                            <select id="setEstadoCivil" name="setEstadoCivil" class="form-control" >
                            <option value="SO">Solteiro (a)</option>
                            <option value="CA">Casado (a)</option>
                            <option value="DI">Divorciado(a)</option>
                            <option value="VI">Viúvo (a)</option>
                            <option value="UN">União Estável</option>
                            <option value="SJ">Separdo Judicialmente</option>
                            </select>
                            </div>
                        </div>

                        <div class="col-sm-6 estcivil" id="conjuge">
                            <label class="col-md-3">CONJUGE:</label>
                            <div class="col-md-9">
                                  <input id="strNomeConjuge" name="strNomeConjuge" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-sm-6 estcivil" id="ex">
                            <label class="col-md-3">EX-CONJUGE:</label>
                            <div class="col-md-9">
                                <input  id="strNomeExConjuge" name="strNomeExConjuge" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-sm-6 estcivil" id="datacas">
                            <label class="col-md-4">DATA CASAMENTO/DISOLUÇÃO:</label>
                            <div class="col-md-8">
                                <input  id="dataCasamento" name="dataCasamento" type="date" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                        <div class="col-sm-6 estcivil" id="cartoriocasamento">
                            <label class="col-md-3">CARTÓRIO CASAMENTO:</label>
                            <div class="col-md-9">
                                <input id="strCartorioCasamento" name="strCartorioCasamento" type="text" placeholder="" class="form-control input-md">
                            </div>
                        </div>
                    
                        <div class="col-sm-6 estcivil" id="regimecasamento">
                            <label class="col-md-3">REGIME DE BENS:</label>
                            <div class="col-md-9">
                            <select id="setRegimeBens" name="setRegimeBens" class="form-control" >
                            <option value="">Selecione</option>
                            <option value="CP">Comunhão Parcial de Bens</option>
                            <option value="CU">Comunhão Universal de Bens</option>
                            <option value="PF">Participação Final nos Aquestos</option>
                            <option value="SB">Separação Total de Bens</option>
                            <option value="SC">Separação Obrigatória de Bens</option>
                            <option value="SO">Separação Convencional de Bens</option>
                            <option value="SE">Separação de Bens</option>
                            <option value="CB">Comunhão de Bens</option>
                            </select>
                            </div>
                        </div>
                        

                        <div class="col-sm-6 ">
                            <label class="col-md-3">FILHOS:</label>
                            <div class="col-md-9">
                                <input id="strNomeFilhos" name="strNomeFilhos" type="text" placeholder="NOME, IDADE;" class="form-control input-md">
                            </div>
                        </div>
                    

            </div>
            <legend class="PESSOAF"></legend>
            <div class="row PESSOAF">
                <div class="col-sm-6">
                <label class="col-md-3">NOME DO PAI:</label>
                <div class="col-md-9">
                <input id="strNomePai" name="strNomePai" type="text" placeholder="" class="form-control input-md">
                </div>
                </div>

                <div class="col-sm-6">
                <label class="col-md-3">NOME DA MÃE:</label>
                <div class="col-md-9">
                <input id="strNomeMae" name="strNomeMae" type="text" placeholder="" class="form-control input-md">
                </div>
                </div>
            </div>
            <br>
            <div class="row PESSOAJ" style="margin-top: -70px;">
                            <div class="col-sm-8">
                            <label class="col-md-2 control-form" for="strRazaoSocial">Razão Social*</label>
                            <div class="form-line"><div class="col-md-10">
                            <input id="strRazaoSocial" name="strRazaoSocial" type="text" class="form-control input-md" >

                            </div> </div>
                            </div>

                            <!-- Text input-->
                            <div class="col-sm-4">
                            <label class="col-md-4 control-form" for="strCPFcnpj">CNPJ*</label>
                            <div class="form-line"><div class="col-md-8">
                            <div class="form-line">
                            <input type="text" id="strCPFcnpj" name="strcnpj" class="form-control cpf" placeholder="">
                            </div>
                            </div></div>
                            </div>

                            <!-- Text input-->
                            <div class="col-sm-6">
                            <label class="col-md-4 control-form" for="strRepresentante1">Representante 1</label>
                            <div class="form-line"> <div class="col-md-8">

                            <input id="strRepresentante1" name="strRepresentante1" type="text" placeholder="" class="form-control input-md">
                            <input id="cpfRepresentante1" name="cpfRepresentante1" type="text" placeholder="CPF" class="form-control input-md cpf">


                            
                            </div></div>
                            </div>

                            <!-- Text input-->
                            <div class="col-sm-6">
                            <label class="col-md-4 control-form" for="strRepresentante2">Representante 2</label>
                            <div class="form-line"> <div class="col-md-8">
                            <input id="strRepresentante2" name="strRepresentante2" type="text" placeholder="" class="form-control input-md">
                            <input id="cpfRepresentante2" name="cpfRepresentante2" type="text" placeholder="CPF" class="form-control input-md cpf">

                            
                            </div></div>
                            </div>

                            <!-- Text input-->
                            <div class="col-sm-6">
                            <label class="col-md-4 control-form" for="strRepresentante3">Representante 3</label>
                            <div class="form-line"> <div class="col-md-8">
                            <input id="strRepresentante3" name="strRepresentante3" type="text" placeholder="" class="form-control input-md">
                            <input id="cpfRepresentante3" name="cpfRepresentante3" type="text" placeholder="CPF" class="form-control input-md cpf">


                            </div></div>
                            </div>   


            </div>

            <br><legend></legend>
            <div class="row ">
                         <div class="col-sm-12">
                            <div class="col-md-10 " >
                            <input type="checkbox" id="RES_ESTRANGEIRO" value="S" />
                            <label for="RES_ESTRANGEIRO">RESIDENCIA EM OUTRO PAÍS</label>
                            </div>
                        </div> 

                        <div class="col-sm-6">
                        <label class="col-md-3 " for="intUFcidade">CEP</label>
                        <div class="col-sm-9">
                        <input  onkeyup="removerPonto(this);" type="text" id="intImovelCep"  class="form-control">
                        
                        </div>
                        </div>


                        <div class="col-sm-6">
                        <label class="col-md-3">ENDEREÇO:</label>
                        <div class="col-md-9">
                            <input id="endereco" name="strLogradouro" type="text" placeholder="Rua, Nº" class="form-control input-md" required="">
                        </div>
                        </div>
                        
                        <div class="col-sm-6">
                        <label class="col-md-3">BAIRRO:</label>
                        <div class="col-md-9">
                            <input id="bairro" name="strBairro" type="text" placeholder="" class="form-control input-md">
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <label class="col-md-3">CIDADE/UF:</label>
                        <div class="col-md-9">
                            <input type="text" name="intUFcidade" id="intUFcidade" class="form-control input-md" placeholder="clique para pesquisar" required="" readonly>
                            <input type="text" name="decresidenciaestrangeiro" id="decresidenciaestrangeiro" class="form-control input-md residenciaestrangeiro" placeholder="INFORME CIDADE/ESTADO/PAIS">
                        </div>
                        </div>

            </div>
            <br><legend></legend>
            <div class="row">
                    <div class="col-sm-6">
                    <label class="col-md-3 " for="strTelefone">Tel. Fixo</label>
                    <div class="col-md-9">
                    <input id="strTelefone" name="strTelefone" type="text" placeholder="" class="form-control input-md phone-number">

                    </div>
                    </div>


                    <div class="col-sm-6">
                    <label class="col-md-3 " for="strTelCelular">Tel. Celular</label>
                    <div class="col-md-9">
                    <input style="margin-left: -10%" id="strTelCelular" name="strTelCelular" type="text" placeholder="" class="form-control input-md mobile-phone-number">

                    </div>  
                    </div>


                    <div class="col-sm-6">
                    <label class="col-md-3 " for="strEmail">Email</label>
                    <div class="col-md-9">
                    <input id="strEmail" name="strEmail" type="text" placeholder="" class="form-control " >

                    </div>
                    </div>
            </div>
            <br><legend></legend>
            <div class="row">
                <div class="col-sm-12">
                   
                   <textarea  class="form-control" id="strObservacao" rows="4" name="strObservacao" placeholder="OUTRAS INFORMAÇÕES/OBSERVAÇÕES"></textarea>

                     
                    </div>
            </div>
            <div class="row">
                <div class="col-sm-10"></div>
                    <button type="subimit" name="subimit2" id="botaosalvar" class="btn bg-green  waves-effect waves-float" >
                    <i class="material-icons">save</i> SALVAR
                    </button><br>
            </div>

      </form>      
    </div>

<!--====================================================================================================================================================== -->



</div>
                        </div>

                    </div>
                </div>
              </div>
        </div>
     </section>


















<!--========================================================================= SCRIPTS FUNÇÕES E INCLUDES =======================================================
                        <!-- Large Size -->




                        <!-- Jquery Core Js -->
                        <script src="../plugins/jquery/jquery.min.js"></script>



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
                        $(document).ready(function(){

                        $('input[type="date"]').blur(function(){

                        var teste = $(this).val();

                        if (teste.length>10) {

                        swal("Ops!", "Data digitada está incorreta!", "error");
                        }
                        });




                        
  
                        $('.form-control').blur(function(){
                         if ($(this).prop("required") ==  true && $(this).val() == '' && $(this).prop("placeholder") !=  "clique para pesquisar" && $(this).prop("placeholder") != "CLIQUE PARA PESQUISAR") {
                        $(this).css("border-color", 'red');
                        $(this).css("color", 'white');
                        $(this).prop("placeholder", 'este campo é obrigatório');
                        //swal('ERRO', 'O CAMPO É OBRIGATÓRIO', 'error');
                        }
                        else{
                        $(this).css("border-color", 'none');
                        $(this).css("color", 'black');
                        }

                        });

                        $('.dadosestrangeiro').toggle();
                        $('.residenciaestrangeiro').toggle();
                        $('.PESSOAJ').hide();
                        $('#setTipoPessoa').val('F');
                        showCustomer2();
                        showCustomer3(); 
                        });    


                        </script>
                        <script type="text/javascript">
                        $(document).ready(function(){
                        $(".cpf").inputmask({
                        mask: ['999.999.999-99', '99.999.999/9999-99'],
                        keepStatic: true
                        });
                        $(".rg").inputmask("999999999999-9/AAA-AA");
                        $(".mobile-phone-number").inputmask("+55(99)9 9999-9999");
                        $(".phone-number").inputmask("+55(999)9999-9999");
                        exibe();
                        $('.estcivil').hide();
                        });
                        </script>
                        

                        <!-- Custom Js -->
                        <script src="../js/admin.js"></script>
                        <script src="../js/pages/tables/jquery-datatable.js"></script>
                        <script src="../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
                        <!-- Demo Js -->
                        <script src="../js/demo.js"></script>

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
                        <!-- Adicionando Javascript -->
                        <script type="text/javascript" >

                        $(document).ready(function() {

                        //Quando o campo cep perde o foco.
                        $("#intImovelCep").blur(function() {

                        //Nova variável "cep" somente com dígitos.
                        var cep = $(this).val().replace(/\D/g, '');

                        //Verifica se campo cep possui valor informado.
                        if (cep != "") {

                        //Expressão regular para validar o CEP.
                        var validacep = /^[0-9]{8}$/;

                        //Valida o formato do CEP.
                        if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("Procurando ...");
                        $("#bairro").val("Procurando...");
                        $("#intUFcidade").val("Procurando ...");



                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#endereco").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#intUFcidade").val(dados.ibge+'/'+dados.localidade+'/'+dados.uf);

                        //    $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                        //CEP pesquisado não foi encontrado.
                        //  limpa_formulário_cep();
                        alert("CEP não encontrado.");
                        }
                        });
                        } //end if.
                        else {
                        //cep é inválido.
                        //limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                        }
                        } //end if.
                        else {
                        //cep sem valor, limpa formulário.
                        //limpa_formulário_cep();
                        }
                        });
                        });

                        </script>



                        <script type="text/javascript">
                        //window.onload=exibe();
                        function exibe(){
                        var select = document.getElementById('setEstadoCivil');

                        select.onchange = function(){

                        if (this.value == 'DI') {
                        document.getElementById('ex').style.display="block";
                        document.getElementById('conjuge').style.display="none";
                        document.getElementById('cartoriocasamento').style.display="block";
                        document.getElementById('regimecasamento').style.display="block";
                        document.getElementById('datacas').style.display="block";
                        }

                        else if (this.value == 'CA') {
                        document.getElementById('conjuge').style.display="block";
                        document.getElementById('ex').style.display="none";
                        document.getElementById('cartoriocasamento').style.display="block";
                        document.getElementById('regimecasamento').style.display="block";
                        document.getElementById('datacas').style.display="block";
                        }

                        else if (this.value == 'UN') {
                        document.getElementById('conjuge').style.display="block";
                        document.getElementById('ex').style.display="none";
                        document.getElementById('cartoriocasamento').style.display="block";
                        document.getElementById('regimecasamento').style.display="block";
                        document.getElementById('datacas').style.display="block";
                        }



                        else{
                        document.getElementById('ex').style.display="none";
                        document.getElementById('conjuge').style.display="none";
                        document.getElementById('cartoriocasamento').style.display="none";
                        document.getElementById('regimecasamento').style.display="none";
                        document.getElementById('datacas').style.display="none"; }
                        };
                        };

                        </script>

                        <script type="text/javascript">
                        $("#strNaturalidade").click(function(){
                        $("#cidadesNaturalidade").modal();
                        });

                        $("#intUFcidade").click(function(){
                        $("#cidade").modal();
                        });
                        $("#intUFcidadePJ").click(function(){
                        $("#cidade2").modal();
                        });

                        </script>

                       

                        <script type="text/javascript">
                        $("#strOrgaoEm").change(function(){
                        var select = $("#strOrgaoEm").val();
                        if (select === 'OTH') {
                        $('#strOrgaoEmOTH').show();
                        }
                        else{  $('#strOrgaoEmOTH').hide();}

                        });
                        </script>

                        <script src="../plugins/ajax/screen.js"></script>

                        <!-- TinyMCE -->
                        <script src="../js/pages/forms/editors.js"></script>
                        <script src="../plugins/tinymce/tinymce.js"></script>
                        <script>
                        tinymce.init({
                        selector: '.textarea',
                        language: 'pt_BR',
                        language_url : '../plugins/tinymce/langs/pt_BR.js',
                        theme: 'modern',
                        plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save table contextmenu directionality',
                        'emoticons template paste textcolor colorpicker textpattern imagetools'
                        ],
                        toolbar1: 'insertfile undo redo | link image',
                        toolbar2: 'print preview media | ',
                        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
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
                        }
                        });
                        </script>
                         <input name="image" type="file" id="upload" class="hidden" onchange="">

                        


                        <script type="text/javascript">
                             
                        $('#CID_ESTRANGEIRO').click(function(){
                        if ($(this).is(":checked") == true ) { 
                        $('#docestrangeiro').prop("required", true);
                        $('#descdocestrangeiro').prop("required", true);
                        $('#naturalidadeestrangeiro').prop("required", true);
                        $('#strNacionalidade').prop("required", true);
                        $('#strNaturalidade').val('5300109/ESTRANGEIRO/EX').prop("readonly", true).css("background","silver");
                        $('.dadosestrangeiro').toggle();   
                        }

                        else{
                        $('#docestrangeiro').prop("required", false);
                        $('#descdocestrangeiro').prop("required", false);
                        $('#naturalidadeestrangeiro').prop("required", false);
                        $('#strNacionalidade').prop("required", false);
                        $('#strNaturalidade').val('').prop("readonly", false).css("background","none");
                        $('.dadosestrangeiro').hide();    

                        }

                        });




                        $('#RES_ESTRANGEIRO').click(function(){
                        if ($(this).is(":checked") == true ) { 
                        $('#intUFcidade').val('5300109/ESTRANGEIRO/EX').prop("readonly", true).css("background","silver");
                        $('#decresidenciaestrangeiro').prop("required", true);
                        $('.residenciaestrangeiro').toggle();   
                        }

                        else{
                        $('#intUFcidade').val('').prop("readonly", false).css("background","none");
                        $('#decresidenciaestrangeiro').prop("required", false);
                        $('.residenciaestrangeiro').hide();

                        }

                        });



                        $('#PESSOA_JUD').click(function(){
                        if ($(this).is(":checked") == true ) { 
                        $('.PESSOAJ').toggle();
                        $('.PESSOAF').hide();    
                        $('#setTipoPessoa').val('J');
                        $('#pessoa_viva').val("S").prop("disabled",true);
                          $('.form-control').prop("required", false);
                        $('#strRazaoSocial').prop("required",true);
                        }

                        else{
                        $('.PESSOAF').toggle();
                        $('.PESSOAJ').hide();  
                        $('#setTipoPessoa').val('F');
                        $('#pessoa_viva').val("").prop("disabled",false);
                        $('#strRazaoSocial').prop("required",false);
                        }

                        });

                        $('#tipo_cadastro').change(function(){
                    

                         if ($(this).val()=='2'){
                        swal("VALIDAÇÕES DOS CAMPOS REMOVIDAS");
                        $('.form-control').prop("required", false);
                        $('#strFicha').prop("required",true);    
                        }

                        });

                        </script>





                        <script type="text/javascript">
                        $("#strCPF").blur(function (e) {
                        var seloCod = $(this).val();
                        var pessoa = 'ok';
                        $.post('../consultas/validador-cpf-pessoas.php', {'seloCodigo':seloCod, 'pessoas': pessoa}, function(data) {
                        $("#resultado").html(data);
                        });
                        });
                        </script>


                        <script type="text/javascript">
                        $("#strOrgaoEm").blur(function (e) {
                        var seloCod = $('#strRG').val();
                        var oe = $('#strOrgaoEm').val();
                        var pessoa = 'ok';
                        $.post('../consultas/validador-cpf-pessoas.php', {'rgCodigo':seloCod, 'pessoasRG': pessoa, 'oemissor': oe}, function(data) {
                        $("#resultado").html(data);
                        });
                        });
                        </script>


                        <script type="text/javascript">
                        $("#docestrangeiro").blur(function (e) {
                        var seloCod = $(this).val();
                        var oe = $('#descdocestrangeiro').val();
                        var pessoa = 'ok';
                        $.post('../consultas/validador-cpf-pessoas.php', {'seloCodigo':seloCod, 'pessoasEST': pessoa, 'oemissor': oe}, function(data) {
                        //$("#resultado").html(data);
                        });
                        });
                        </script>


                        <script type="text/javascript">
                        $("#cpfRepresentante1").blur(function (e) {
                        var seloCod = $(this).val();
                        $.post('../consultas/validador-cpf-pessoas.php', {'cpfrepresentante':seloCod}, function(data) {
                        if (data == 0) {
                            swal("ERRO!","CPF INFORMADO NÃO FOI LOCALIZADO NO CADASTRO, OU PESSOA NÃO POSSUI FICHA!", 'error');
                        }
                        else{
                        $("#strRepresentante1").val(data);
                        }
                        });
                        });
                        </script>

                        <script type="text/javascript">
                        $("#cpfRepresentante2").blur(function (e) {
                        var seloCod = $(this).val();
                        $.post('../consultas/validador-cpf-pessoas.php', {'cpfrepresentante':seloCod}, function(data) {
                        if (data == 0) {
                            swal("ERRO!","CPF INFORMADO NÃO FOI LOCALIZADO NO CADASTRO, OU PESSOA NÃO POSSUI FICHA!", 'error');
                        }
                        else{
                        $("#strRepresentante2").val(data);
                        }
                        });
                        });
                        </script>

                        <script type="text/javascript">
                        $("#cpfRepresentante3").blur(function (e) {
                        var seloCod = $(this).val();
                        $.post('../consultas/validador-cpf-pessoas.php', {'cpfrepresentante':seloCod}, function(data) {
                        if (data == 0) {
                            swal("ERRO!","CPF INFORMADO NÃO FOI LOCALIZADO NO CADASTRO, OU PESSOA NÃO POSSUI FICHA!", 'error');
                        }
                        else{
                        $("#strRepresentante3").val(data);
                        }
                        });
                        });
                        </script>

                        <script type="text/javascript">
                        $("#strFicha").blur(function (e) {
                        var seloCod = $(this).val();
                        var pessoa = 'ok';
                        $.post('../consultas/validador-cpf-pessoas.php', {'ficha':seloCod}, function(data) {
                        $("#resultado").html(data);
                        });
                        });
                        </script>
                        

                        
                        <script type="text/javascript">
                        function preencheNoivo(id,uf,cidade){
                        document.getElementById('strNaturalidade').value = id+'/'+uf+'/'+cidade;
                        document.getElementById('strUF').value = uf;}

                        function preencheNoivo2(id,uf,cidade){document.getElementById('intUFcidade').value = id+'/'+uf+'/'+cidade;}
                        function preencheNoivo3(id,uf,cidade){document.getElementById('intUFcidadePJ').value = id+'/'+uf+'/'+cidade;}
                        </script>
                         <?php include('modais-pessoas.php'); ?>

<!--========================================================================= SCRIPTS FUNÇÕES E INCLUDES =======================================================-->
</body>
</html>
