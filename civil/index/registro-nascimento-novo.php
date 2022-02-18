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



     <section class="content" style="margin-left: 30px"  >
    <div class="container-fluid">
        <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
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
        <li id="li1" role="presentation" class="<?=$parte1?>">
        <a href="#dadosnascimento"  data-toggle="tab">
        <i class="material-icons">account_box</i> Dados - Nascimento
        </a>
        </li>
        <li id="li2" role="presentation"  class="<?=$parte2?>">
        <a href="#detalheFiliacao"  data-toggle="tab">
        <i class="material-icons">people</i> Filiação
        </a>
        </li>

        <li id="li3" role="presentation" class="<?=$parte3?>" >
        <a href="#detalheTestemunhas"  data-toggle="tab">
        <i class="material-icons">person_add</i> Testemunhas
        </a>
        </li>

        <li id="li3" role="presentation" class="<?=$parte3?>" >
        <a href="#dadosadicionais"  data-toggle="tab">
        <i class="material-icons">note_add</i> Dados Adicionais
        </a>
        </li>
       
        <li id="li4" role="presentation" class="<?=$parte4?>" >
        <a href="#registrotab" data-toggle="tab" onclick="swal('ATENÇÃO','ATENÇÃO ANTES DE PROSSEGUIR PARA A FINALIZAÇÃO DO ATO CERTIFIQUE-SE DE TER PREENCHIDO TODOS OS DADOS CORRETAMENTE. CASO SIM PROSSIGA!')">
        <i class="material-icons">book</i> Dados do Registro
        </a>
        </li>

        <!--li id="li4" role="presentation" >
        <a href="#assento" data-toggle="tab">
        <i class="material-icons">feedback</i>  Assento
        </a>
        </li-->

        


        </ul>


<div class="tab-content">
<!--===================================================== DADOS NASCIDO =========== -->
    <div role="tabpanel" class="tab-pane fade <?=$parte1?>" id="dadosnascimento" >
        <form id="formnascido" method="POST" action="../bd_UPDATE/update-nascimento.php?id=<?=$id?>">
                <div class="row">
                        <legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">book </i>  DADOS DO NASCIDO </legend>

                            <div class="col-sm-6">
                                <label class="control-label col-md-4">NOME:</label>
                                <div class="col-md-8">
                                    <input type="text" id="NOMENASCIDO" name="NOMENASCIDO" class="form-control" required="" placeholder="NOME COMPLETO">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="control-label col-md-4">CPF:</label>
                                <div class="col-md-8">
                                    <input type="text" id="CPFNASCIDO" name="CPFNASCIDO" class="form-control cpf"  placeholder="">
                                <div class="col-md-12" id="resultadonascido"></div>
                                </div>
                                <script type="text/javascript">
                                $("#CPFNASCIDO").blur(function (e) {
                                var seloCod = $(this).val();
                                $.post('../consultas/validador-cpf-pessoas.php', {'seloCodigo':seloCod}, function(data) {
                                $("#resultadonascido").html(data);
                                });
                                });
                                </script>                               
                            </div>

                            <div class="col-sm-6">
                                <label class="control-label col-md-4">NATURALIDADE:</label>
                                <div class="col-md-8">
                                    <input type="text" id="NATURALIDADENASCIDO" name="NATURALIDADENASCIDO" class="form-control " required="" placeholder="CLIQUE PARA PESQUISAR" readonly>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label col-md-4">SEXO:</label>
                                <div class="col-md-8">
                                    <select id="SEXONASCIDO" name="SEXONASCIDO" class="form-control" required="">
                                        <option value="">Selecione</option>
                                        <option value="M">MASCULINO</option>
                                        <option value="F">FEMININO</option>
                                        <option value="I">INDEFINIDO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <label class="control-label col-md-4">GEMEO:</label>
                                <div class="col-md-8">
                                    <select id="GEMEOS" name="GEMEOS" class="form-control" required="">
                                        <option value="">Selecione</option>
                                        <option value="S">SIM</option>
                                        <option value="N">NÃO</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-sm-6" id="nomematrigemeos">
                                <label class="control-label col-md-4">NOME E MATRÍCULA GEMEOS:</label>
                                <div class="col-md-8">
                                    <textarea id="NOMEMATRICULAGEMEOS" name="NOMEMATRICULAGEMEOS" class="form-control" rows="5" placeholder="SEPARAR IRMÃOS COM ; EX: PEDRO PAULO DA SILVA, MATRICULA: 123456700000; JOÃO CARLOS DA SILVA, MATRICULA: 4643764234. DIGITE O NÚMERO DA MATRÍCULA SEM ESPAÇOS EM BRANCO" ></textarea>

                                </div>
                            </div>

                              <div class="col-sm-6">
                                    <label class="col-md-4 control-label" for="strFolha">TIPO DE ASSENTO:</label>
                                    <div class="col-md-8"><div class="form-line">
                                    <div class="form-line">
                                    <select id="TIPOASSENTO" name="TIPOASSENTO" class="form-control" required="">
                                    <option value="">Selecione</option>
                                    <option value="COMUN">COMUM</option>
                                    <option value="ORDEM">ORDEM JUDICIAL</option>
                                    <option value="REGISTROT">REGISTRO TARDIO</option>
                                    <option value="POSTO">REGISTRO FEITO EM POSTO AVANÇADO</option>
                                     <option value="UNIDADE_INTERLIGADA">UNIDADE INTERLIGADA</option>
                                    </select>
                                    </div>
                                    </div>
                                    </div>
                                </div>
                </div>
                <div class="row">
                        <legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">book </i>  SOBRE O NASCIMENTO </legend>
                        <div class="col-sm-6" >
                        <label class="control-label col-md-4">DECLARANTE:</label>
                        <div class="col-md-8" id="dec">
                        <select id="QUALIDADEDECLARANTE" name="QUALIDADEDECLARANTE" class="form-control" required="">
                            <option value=""> Selecione</option>
                            <option value="PAI">PAI</option>
                            <option value="MAE">MÃE</option>
                            <option value="AMBOSPAI">AMBOS OS PAIS</option>
                            <option value="OUTRO">OUTRO</option>
                            <option value="IGNORADO">IGNORADO</option>
                        </select>
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
                        <div  id="resultadodeclarante"></div>
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
                        <input class="form-control" type="text" name="ORGAOEMISSORDECLARANTE" id="ORGAOEMISSORDECLARANTE" placeholder="SIGLA/UF">
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
                        <input type="text" name="NATURALIDADEDECLARANTE" id="NATURALIDADEDECLARANTE" class="form-control" maxlength="100"  placeholder="clique para pesquisar" readonly>
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
                        <input type="text" name="CIDADEDECLARANTE" id="CIDADEDECLARANTE" class="form-control" maxlength="100"  placeholder="clique para pesquisar" readonly>
                        </div>
                        </div>
                        <div class="col-sm-12 declarante">
                                <div class="col-md-2" >
                                <input type="checkbox" id="rogoDECLARANTE" value="" onclick="$('#ROGODECLARANTE').toggle();" />
                                <label for="rogoDECLARANTE">Ass. Rogo</label>
                                </div>
                                 <div class="col-md-4" id="ROGODECLARANTE">
                                <input type="text" id="ROGODECLARANTE" name="ROGODECLARANTE" class="form-control input-md cpf rogocpf"/>
                                <span style="color:red">Preencha o cpf do assinante a rogo, o mesmo deve estar cadastrado no cadastro de pessoas</span>
                                </div>
                                </div>



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
                        <label  class="col-md-4 control-label" for="DATASENTENÇAMANDATO">Data da Sentença:</label>
                        <div class="col-md-8" >  <div class="form-line">
                        <input type="date" id="DATASENTENCAMANDATO" name="DATASENTENCAMANDATO" class="form-control input-md nascordemjud" placeholder="" />
                        </div>
                        </div>
                        </div>

                        <div class="col-sm-6 " >
                        <label  class="col-md-4 control-label" for="DATANASCIMENTO">Data NASCIMENTO:</label>
                        <div class="col-md-8" >  <div class="form-line">
                        <input type="date" id="DATANASCIMENTO" name="DATANASCIMENTO" class="form-control input-md nascordemjud" placeholder="" required="" />
                        </div>
                        </div>
                        </div>
                        <div class="col-sm-6 " >
                        <label  class="col-md-4 control-label" for="HORANASCIMENTO">HORA NASCIMENTO:</label>
                        <div class="col-md-8" >  <div class="form-line">
                        <input type="time" id="HORANASCIMENTO" name="HORANASCIMENTO" class="form-control input-md nascordemjud" placeholder="" />
                        </div>
                        </div>
                        </div>

                        <div class="col-sm-6" >
                        <label  class="col-md-4 control-label" for="TIPOLOCALNASCIMENTO">Tipo de Local:</label>
                        <div class="col-md-8" >
                        <select  class="form-control" id="TIPOLOCALNASCIMENTO" name="TIPOLOCALNASCIMENTO" required="" >
                        <option value="">SELECIONE</option>
                        <?php if (isset($_GET['acervo'])): ?>
                            <option value="IGNORADO">IGNORADO</option>
                        <?php endif ?>
                        <option value="UNIDADE_SAUDE">Maternidade/ Hospital</option>
                        <option value="FORA_UNIDADE_SAUDE">Fora da Maternidade</option>
                        <option value="RANI">Registro de Nascimento de Indígena</option>
                        </select>
                        </div>
                        </div>

                        <script type="text/javascript">
                        function camposmedicos(){
                        var sel = document.getElementById('TIPOLOCALNASCIMENTO');
                        sel.onchange = function(){
                        if (this.value == 'FORA_UNIDADE_SAUDE' ) {
                    
                        
                    
                        
                        document.getElementById('ranidiv').style.display = "none";
                        document.getElementById('dnvdiv').style.display = "block";
                        }

                        else if(this.value == 'RANI'){
                        document.getElementById('DNV').disabled = false;
                        document.getElementById('MEDICO').disabled = false;
                        document.getElementById('CRM').disabled = false;
                        document.getElementById('DNV').value="";
                        document.getElementById('MEDICO').value="";
                        document.getElementById('CRM').value="";
                        document.getElementById('DNV').style.backgroundColor = "white";
                        document.getElementById('MEDICO').style.backgroundColor = "white";
                        document.getElementById('CRM').style.backgroundColor = "white";
                        document.getElementById('ranidiv').style.display = "block";
                        document.getElementById('dnvdiv').style.display = "block";
                        }

                        else{
                        document.getElementById('DNV').disabled = false;
                        document.getElementById('MEDICO').disabled = false;
                        document.getElementById('CRM').disabled = false;
                        document.getElementById('DNV').value="";
                        document.getElementById('MEDICO').value="";
                        document.getElementById('CRM').value="";
                        document.getElementById('DNV').style.backgroundColor = "white";
                        document.getElementById('MEDICO').style.backgroundColor = "white";
                        document.getElementById('CRM').style.backgroundColor = "white";
                        document.getElementById('ranidiv').style.display = "none";
                        document.getElementById('dnvdiv').style.display = "block";
                        }
                        }

                        }
                        </script>

                        <div class="col-sm-6" >
                        <label  class="col-md-4 control-label" for="LOCALNASCIMENTO">Local de Nascimento:</label>
                        <div class="col-md-8" >
                        <input type="text" id="LOCALNASCIMENTO" name="LOCALNASCIMENTO" class="form-control input-md" placeholder="Local de Nascimento" / >
                        </div>
                        </div>

                        <div class="col-sm-6" >
                        <label    class="col-md-4 control-label" for="ENDERECOLOCALNASCIMENTO">Endereço:</label>
                        <div class="col-md-8" >
                        <input    type="text" id="ENDERECOLOCALNASCIMENTO" name="ENDERECOLOCALNASCIMENTO" class="form-control input-md" placeholder="Rua, Nº"  />
                        </div>
                        </div>
                            <div class="col-sm-6">
                            <label class="col-md-4 control-label">CIDADE:</label>
                            <div class="col-md-8">
                            <input type="text" name="CIDADENASCIMENTO" id="CIDADENASCIMENTO" class="form-control dadospai" maxlength="100" required="" placeholder="clique para pesquisar" readonly>
                            </div>
                            </div>

                        <div class="col-sm-6" id="dnvdiv">
                        <label  class="col-md-4  control-label" for="strNumDNV" >Número da D.N.V:</label>
                        <div class="col-md-7"   >
                        <input type="text"  id="DNV" name="DNV" maxlength="14" class="dnv form-control input-md" required="" placeholder="Declaração de Nascido Vivo"  />
                        </div>
                        <a onclick="$('#DNV').prop('required',false).hide();" class="btn bg-red waves-effect">X</a>
                        </div>
                        <div class="col-sm-6" id="ranidiv" style="display: none">
                        <label   class="col-md-4  control-label" for="strRani" >RANI</label>
                        <div class="col-md-8"   >
                        <input type="text"  id="RANI" name="RANI" maxlength="14" class="form-control input-md" placeholder="Registro Adm. Nacional do Índio" />
                        </div>
                        </div>

                        <div class="col-sm-6">
                        <label   class="col-md-4  control-label" for="MEDICO" >Médico/Prof. SAÚDE:</label>
                        <div class="col-md-8" >
                        <input  type="text" id="MEDICO" name="MEDICO" class="form-control input-md" placeholder="Nome"  />
                        </div>
                        </div>


                        <div class="col-sm-6">
                        <label class="col-md-4  control-label" for="CRM" >CRM/DOCUMENTO:</label>
                        <div class="col-md-8" >
                        <input type="text"  id="CRM" name="CRM" class="form-control input-md" placeholder=""  />
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

<!--====================================================================================================================================================== -->


<!--======================================================================= DADOS PAIS =============================================================== -->
    <div role="tabpanel" class="tab-pane fade <?=$parte2?> " id="detalheFiliacao" >
        <form id="formfiliacao" method="POST" action="../bd_UPDATE/update-nascimento.php?id=<?=$id?>">
                <div class="row">
                        <div class="col-sm-6">
                            <div class="col-md-8" >
                            <input type="checkbox" id="SOCIOAFETIVO" />
                            <label for="SOCIOAFETIVO">Registro de Filiação Socioafetiva</label>
                            </div>
                              <a href="javascript:void(0);" data-trigger="focus" data-html="true" data-container="body" data-toggle="popover" data-placement="right" title="" data-content="ADICIONA O FORMULÁRIO PARA PREENCHIMENTO" data-original-title="Informação!">
                          <i class="material-icons" >info</i>
                        </a>
                        </div>

                        <div class="col-sm-6">
                            <div class="col-md-6" >
                            <input type="checkbox" id="PAISCASADOS"/>
                            <label for="PAISCASADOS">Pais Casados entre si</label>
                            </div>
                              <a href="javascript:void(0);" data-trigger="focus" data-html="true" data-container="body" data-toggle="popover" data-placement="right" title="" data-content="QUANDO OS PAIS DO REGISTRADO SÃO CASADOS ENTRE SI" data-original-title="Informação!">
                          <i class="material-icons" >info</i>
                        </a>
                        </div>
                        </div>

                        <div class="row" id="dadoscasamentopais">
                            <div class="col-sm-6">
                                    <label class="col-md-4 control-label">LOCAL CASAMENTO:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="LUGARCASAMENTO" id="LUGARCASAMENTO" class="form-control"  placeholder="LOCAL ONDE SE CASARAM">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CIDADECASAMENTO" id="CIDADECASAMENTO" class="form-control"  placeholder="CLIQUE PARA PESQUISAR" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CARTÓRIO:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CARTORIOCASAMENTO" id="CARTORIOCASAMENTO" class="form-control"  placeholder="">
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
                                        <input type="text" name="CPFPAI" id="CPFPAI" class="form-control cpf dadospai" maxlength="20"  placeholder="">
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
                                        <input type="text" name="RGPAI" id="RGPAI" class="form-control dadospai" maxlength="20"  placeholder="ex: 0000000000-0">
                                    </div>
                                </div>
                                     <div class="col-sm-6" id="ORGPAI">
                                    <label class="col-md-4 control-label">ÓRGÃO EMISSOR:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="ORGAOEMISSORPAI" id="ORGAOEMISSORPAI" class="form-control dadospai" placeholder="SIGLA/UF">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NACIONALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NACIONALIDADEPAI" id="NACIONALIDADEPAI" class="form-control dadospai" maxlength="100"  placeholder="">
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NATURALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NATURALIDADEPAI" id="NATURALIDADEPAI" class="form-control dadospai" maxlength="100"  placeholder="clique para pesquisar" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">DATA DE NASCIMENTO:</label>
                                    <div class="col-md-8">
                                        <input type="date" name="DATANASCIMENTOPAI" id="DATANASCIMENTOPAI" class="form-control dadospai text-center"  placeholder="clique para pesquisar"  >
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
                                    <input type="text" name="PROFISSAOPAI" id="PROFISSAOPAI" class="form-control dadospai" maxlength="100"  placeholder="">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <label class="col-md-4 control-label">ENDEREÇO:</label>
                                <div class="col-md-8">
                                    <input type="text" name="ENDERECOPAI" id="ENDERECOPAI" class="form-control dadospai" maxlength="100"  placeholder="RUA, Nº">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">BAIRRO:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="BAIRROPAI" id="BAIRROPAI" class="form-control dadospai" maxlength="100"  placeholder="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CIDADEPAI" id="CIDADEPAI" class="form-control dadospai" maxlength="100"  placeholder="clique para pesquisar" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">PAI:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="AVO1PATERNO" id="AVO1PATERNO" class="form-control dadospai" maxlength="100"   placeholder="">
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <label class="col-md-4 control-label">MÃE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="AVO2PATERNO" id="AVO2PATERNO" class="form-control dadospai" maxlength="100"  placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-2" >
                                <div class="col-md-12" >
                                <input type="checkbox" id="rogoPAI" value="" onclick="$('#ROGOPAI').toggle();" />
                                <label for="rogoPAI">Ass. Rogo</label>
                                </div>
                                </div>

                                <div class="col-sm-2" >
                                <div class="col-md-12" >
                                <input type="checkbox" id="procuradorPAI" value="" onclick="$('#PROCURADORPAIDIV').toggle();" />
                                <label for="procuradorPAI">Possui procurador</label>
                                </div>
                                </div>


                                <!--div class="col-sm-4" >
                                <div class="col-md-12" >
                                <input type="checkbox" id="menorPAI" name="menorPAI" value="S" />
                                <label for="menorPAI">O PAI É MENOR</label>
                                </div>
                                </div-->
                                <script type="text/javascript">
                                    $('#menorPAI').click(function(){
                                        if ($(this).is(":checked") == false) {
                                        $('#RESPPAI').hide();
                                        $('#RESPONSAVELPAI').prop("required", false);
                                        $('#PARENTESCORESPONSAVELPAI').prop("required", false);   
                                        }
                                        else{
                                        $('#RESPPAI').show();
                                        $('#RESPONSAVELPAI').prop("required", true);
                                        $('#PARENTESCORESPONSAVELPAI').prop("required", true);        
                                        }
                                    });
                                </script>


                                <div class="col-md-4" id="ROGOPAI">
                                <input type="text" id="ROGOPAI" name="ROGOPAI" class="form-control input-md cpf rogocpf"   />
                                <span style="color:red">Preencha o cpf do assinante a rogo, o mesmo deve estar cadastrado no cadastro de pessoas</span>
                                </div>

                                <div class="col-md-4" id="PROCURADORPAIDIV">
                                <input type="text" id="PROCURADORPAI" name="PROCURADORPAI" class="form-control input-md"  placeholder="NOME DO PROCURADOR" />
                                <textarea type="text" class="form-control" id="QUALIFICACAOPROCURADORPAI"  name="QUALIFICACAOPROCURADORPAI" placeholder="QUALIFICAÇÃO PROCURADOR e informe DOCUMENTO APRESENTADO, EX: PROCURAÇÃO OU DOCUMENTO DE RECONHECIMENTO DE FILHO" rows="5"></textarea><br><br>
                                </div>

                                <div class="col-md-6" id="RESPPAI">
                                <input type="text" id="RESPONSAVELPAI" name="RESPONSAVELPAI" class="form-control input-md" placeholder="Nome"  />
                                <input type="text" id="PARENTESCORESPONSAVELPAI" name="PARENTESCORESPONSAVELPAI" class="form-control input-md" placeholder="GRAU DE PARENTESCO"  />
                                </div>
                        </div>
                                                   <legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">person</i> QUALIFICAÇÃO MÃE</legend>
                        <div class="row clearfix">
                               <div class="col-sm-9"></div>
                                <div class="col-sm-2 bot_direita">
                                <a class="btn waves-effect bg-indigo" id="botaomae"><i class="material-icons">person</i><b>+</b> BUSCAR NOS REGISTROS</a>
                                </div>
                                <div class="col-sm-12"></div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">Nome:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NOMEMAE" id="NOMEMAE" class="form-control" maxlength="200" required="" placeholder="NOME COMPLETO">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CPF:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CPFMAE" id="CPFMAE" class="form-control cpf" maxlength="20"  placeholder="">
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
                                        <input type="text" name="RGMAE" id="RGMAE" class="form-control" maxlength="20"  placeholder="ex: 0000000000-0">
                                    </div>
                                </div>
                                     <div class="col-sm-6" id="ORGMAE">
                                    <label class="col-md-4 control-label">ÓRGÃO EMISSOR:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="ORGAOEMISSORMAE" id="ORGAOEMISSORMAE" class="form-control" placeholder="SIGLA/UF">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NACIONALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NACIONALIDADEMAE" id="NACIONALIDADEMAE" class="form-control" maxlength="100"  placeholder="">
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NATURALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NATURALIDADEMAE" id="NATURALIDADEMAE" class="form-control" maxlength="100"  placeholder="clique para pesquisar" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">DATA DE NASCIMENTO:</label>
                                    <div class="col-md-8">
                                        <input type="date" name="DATANASCIMENTOMAE" id="DATANASCIMENTOMAE" class="form-control text-center"  placeholder="clique para pesquisar"  >
                                    </div>
                                </div>

                                <div class="col-sm-6" id="SEXMAE">
                                    <label class="col-md-4 control-label">SEXO:</label>
                                    <div class="col-md-8">
                                        <select name="SEXOMAE" id="SEXOMAE" class="form-control text-center" required="">
                                            <option value="">Selecione</option>
                                            <option value="M">MASCULINO</option>
                                            <option value="F">FEMININO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6" id="ECMAE">
                                    <label class="col-md-4 control-label">ESTADO CIVIL:</label>
                                    <div class="col-md-8">
                                        <select id="ESTADOCIVILMAE" name="ESTADOCIVILMAE" class="form-control">
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
                                    <input type="text" name="PROFISSAOMAE" id="PROFISSAOMAE" class="form-control" maxlength="100"  placeholder="">
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
                                    <input type="text" name="ENDERECOMAE" id="ENDERECOMAE" class="form-control dadosmae" maxlength="100"  placeholder="RUA, Nº">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">BAIRRO:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="BAIRROMAE" id="BAIRROMAE" class="form-control" maxlength="100"  placeholder="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CIDADEMAE" id="CIDADEMAE" class="form-control" maxlength="100"  placeholder="clique para pesquisar" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">PAI:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="AVO1MATERNO" id="AVO1MATERNO" class="form-control" maxlength="100"  placeholder="">
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <label class="col-md-4 control-label">MÃE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="AVO2MATERNO" id="AVO2MATERNO" class="form-control" maxlength="100"  placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-2" >
                                <div class="col-md-12" >
                                <input type="checkbox" id="rogoMAE" value="" onclick="$('#ROGOMAE').toggle();" />
                                <label for="rogoMAE">Ass. Rogo</label>
                                </div>
                                </div>

                                <!--div class="col-sm-4" >
                                <div class="col-md-12" >
                                <input type="checkbox" id="menorMAE" name="menorMAE" value="S" />
                                <label for="menorMAE">A MÃE É MENOR</label>
                                </div>
                                </div-->
                                <script type="text/javascript">
                                    $('#menorMAE').click(function(){
                                        if ($(this).is(":checked") == false) {
                                        $('#RESPMAE').hide();
                                        $('#RESPONSAVELMAE').prop("required", false);
                                        $('#PARENTESCORESPONSAVELMAE').prop("required", false);   
                                        }
                                        else{
                                        $('#RESPMAE').show();
                                        $('#RESPONSAVELMAE').prop("required", true);
                                        $('#PARENTESCORESPONSAVELMAE').prop("required", true);        
                                        }
                                    });
                                </script>
                                <div class="col-md-6" id="RESPMAE">
                                <input type="text" id="RESPONSAVELMAE" name="RESPONSAVELMAE" class="form-control input-md" placeholder="Nome e parentesco separados por virgula, ex: fulana, Mãe"  />
                                <input type="text" id="PARENTESCORESPONSAVELMAE" name="PARENTESCORESPONSAVELMAE" class="form-control input-md" placeholder="GRAU DE PARENTESCO"  />
                                </div>

                                <div class="col-md-4" id="ROGOMAE">
                                <input type="text" id="ROGOMAE" name="ROGOMAE" class="form-control input-md cpf rogocpf"   />
                                <span style="color:red">Preencha o cpf do assinante a rogo, o mesmo deve estar cadastrado no cadastro de pessoas</span>
                                </div>

                        </div>










                                                   <legend style="font-size: 70%" class="badge bg-light-green socioafetivo"><i class="material-icons">person</i> PAI SOCIOAFETIVO 1</legend>
                        <div class="row clearfix socioafetivo">
                               <div class="col-sm-9"></div>
                               
                                <div class="col-sm-2">
                                <a class="btn waves-effect bg-indigo" id="botaopaisocio"><i class="material-icons">person</i><b>+</b> BUSCAR NOS REGISTROS</a>
                                </div>
                                <div class="col-sm-12"></div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">Nome:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NOMEPAISOCIO" id="NOMEPAISOCIO" class="form-control " maxlength="200" placeholder="NOME COMPLETO">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CPF:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CPFPAISOCIO" id="CPFPAISOCIO" class="form-control cpf " maxlength="20"  placeholder="">
                                        <div id="resultadopaiSOCIO"></div>
                                    </div>
                                    <script type="text/javascript">
                                    $("#CPFPAISOCIO").blur(function (e) {
                                    var seloCod = $(this).val();
                                    $.post('../consultas/validador-cpf-pessoas.php', {'seloCodigo':seloCod}, function(data) {
                                    $("#resultadopaiSOCIO").html(data);
                                    });
                                    });
                                    </script>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">RG:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="RGPAISOCIO" id="RGPAISOCIO" class="form-control " maxlength="20"  placeholder="ex: 0000000000-0">
                                    </div>
                                </div>
                                     <div class="col-sm-6" id="ORGPAISOCIO">
                                    <label class="col-md-4 control-label">ÓRGÃO EMISSOR:</label>
                                    <div class="col-md-8">
                                        <select class="form-control " name="ORGAOEMISSORPAISOCIO" id="ORGAOEMISSORPAISOCIO"  >
                                            <option value="">Selecione</option>
                                            <option value="SSP">Secretaria de Segurança Pública</option>
                                            <option value="PM">Polícia Militar</option>
                                            <option value="PC">Polícia Civil</option>
                                            <option value="CNT">Carteira Nacional de Habilitação</option>
                                            <option value="DIC">Diretoria de Identificação Civil</option>
                                            <option value="CTPS">Carteira de Trabalaho e Previdência Social</option>
                                            <option value="FGTS">Fundo de Garantia do Tempo de Serviço</option>
                                            <option value="IFP">Instituto Félix Pacheco</option>
                                            <option value="IPF">Instituto Pereira Faustino</option>
                                            <option value="IML">Instituto Médico Legal</option>
                                            <option value="MTE">Ministério do Trabalho e Emprego</option>
                                            <option value="MNA">Ministério da Marinha</option>
                                            <option value="MAE">Ministério da Aeronáutica</option>
                                            <option value="MEX">Ministério do Exército</option>
                                            <option value="POF">Polícia Federal</option>
                                            <option value="SES">Carteira de Estrangeiro</option>
                                            <option value="SJS">Secretaria da Justiça e Segurança</option>
                                            <option value="SJTS">Secretaria da Justiça do Trabalho e Segurança</option>
                                            <option value="OTH">Outro</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NACIONALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NACIONALIDADEPAISOCIO" id="NACIONALIDADEPAISOCIO" class="form-control " maxlength="100"  placeholder="">
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NATURALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NATURALIDADEPAISOCIO" id="NATURALIDADEPAISOCIO" class="form-control " maxlength="100"  placeholder="clique para pesquisar" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">DATA DE NASCIMENTO:</label>
                                    <div class="col-md-8">
                                        <input type="date" name="DATANASCIMENTOPAISOCIO" id="DATANASCIMENTOPAISOCIO" class="form-control  text-center"  placeholder="clique para pesquisar"  >
                                    </div>
                                </div>

                                <div class="col-sm-6" id="SEXPAISOCIO">
                                    <label class="col-md-4 control-label">SEXO:</label>
                                    <div class="col-md-8">
                                        <select name="SEXOPAISOCIO" id="SEXOPAISOCIO" class="form-control  text-center" >
                                            <option value="">Selecione</option>
                                            <option value="M">MASCULINO</option>
                                            <option value="F">FEMININO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6" id="ECPAISOCIO">
                                    <label class="col-md-4 control-label">ESTADO CIVIL:</label>
                                    <div class="col-md-8">
                                        <select id="ESTADOCIVILPAISOCIO" name="ESTADOCIVILPAISOCIO" class="form-control ">
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
                                    <input type="text" name="PROFISSAOPAISOCIO" id="PROFISSAOPAISOCIO" class="form-control " maxlength="100"  placeholder="">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <label class="col-md-4 control-label">ENDEREÇO:</label>
                                <div class="col-md-8">
                                    <input type="text" name="ENDERECOPAISOCIO" id="ENDERECOPAISOCIO" class="form-control " maxlength="100"  placeholder="RUA, Nº">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">BAIRRO:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="BAIRROPAISOCIO" id="BAIRROPAISOCIO" class="form-control " maxlength="100"  placeholder="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CIDADEPAISOCIO" id="CIDADEPAISOCIO" class="form-control " maxlength="100"  placeholder="clique para pesquisar" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">PAISOCIO:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="AVO1PATERNOSOCIO" id="AVO1PATERNOSOCIO" class="form-control " maxlength="100"   placeholder="">
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <label class="col-md-4 control-label">MÃE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="AVO2PATERNOSOCIO" id="AVO2PATERNOSOCIO" class="form-control " maxlength="100"  placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-2" >
                                <div class="col-md-12" >
                                <input type="checkbox" id="rogoPAISOCIO" value="" onclick="$('#ROGOPAISOCIO').toggle();" />
                                <label for="rogoPAISOCIO">Ass. Rogo</label>
                                </div>
                                </div>

                                <div class="col-md-6" id="assrogoPAISOCIO">
                                <input type="text" id="ROGOPAISOCIO" name="ROGOPAISOCIO" class="form-control input-md" placeholder="Nome completo"  />
                                </div>
                        </div>
                                                   <legend style="font-size: 70%" class="badge bg-light-green socioafetivo"><i class="material-icons">person</i> PAI SOCIOAFETIVO 2</legend>
                        <div class="row clearfix socioafetivo">
                               <div class="col-sm-9"></div>
                                <div class="col-sm-2">
                                <a class="btn waves-effect bg-indigo" id="botaomaesocio"><i class="material-icons">person</i><b>+</b> BUSCAR NOS REGISTROS</a>
                                </div>
                                <div class="col-sm-12"></div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">Nome:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NOMEMAESOCIO" id="NOMEMAESOCIO" class="form-control" maxlength="200"  placeholder="NOME COMPLETO">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CPF:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CPFMAESOCIO" id="CPFMAESOCIO" class="form-control cpf" maxlength="20"  placeholder="">
                                        <div id="resultadomaeSOCIO"></div>
                                    </div>
                                    <script type="text/javascript">
                                    $("#CPFMAESOCIO").blur(function (e) {
                                    var seloCod = $(this).val();
                                    $.post('../consultas/validador-cpf-pessoas.php', {'seloCodigo':seloCod}, function(data) {
                                    $("#resultadomaeSOCIO").html(data);
                                    });
                                    });
                                    </script>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">RG:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="RGMAESOCIO" id="RGMAESOCIO" class="form-control" maxlength="20"  placeholder="ex: 0000000000-0">
                                    </div>
                                </div>
                                     <div class="col-sm-6" id="ORGMAESOCIO">
                                    <label class="col-md-4 control-label">ÓRGÃO EMISSOR:</label>
                                    <div class="col-md-8">
                                        <select class="form-control" name="ORGAOEMISSORMAESOCIO" id="ORGAOEMISSORMAESOCIO"  >
                                            <option value="">Selecione</option>
                                            <option value="SSP">Secretaria de Segurança Pública</option>
                                            <option value="PM">Polícia Militar</option>
                                            <option value="PC">Polícia Civil</option>
                                            <option value="CNT">Carteira Nacional de Habilitação</option>
                                            <option value="DIC">Diretoria de Identificação Civil</option>
                                            <option value="CTPS">Carteira de Trabalaho e Previdência Social</option>
                                            <option value="FGTS">Fundo de Garantia do Tempo de Serviço</option>
                                            <option value="IFP">Instituto Félix Pacheco</option>
                                            <option value="IPF">Instituto Pereira Faustino</option>
                                            <option value="IML">Instituto Médico Legal</option>
                                            <option value="MTE">Ministério do Trabalho e Emprego</option>
                                            <option value="MNA">Ministério da Marinha</option>
                                            <option value="MAESOCIO">Ministério da Aeronáutica</option>
                                            <option value="MEX">Ministério do Exército</option>
                                            <option value="POF">Polícia Federal</option>
                                            <option value="SES">Carteira de Estrangeiro</option>
                                            <option value="SJS">Secretaria da Justiça e Segurança</option>
                                            <option value="SJTS">Secretaria da Justiça do Trabalho e Segurança</option>
                                            <option value="OTH">Outro</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NACIONALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NACIONALIDADEMAESOCIO" id="NACIONALIDADEMAESOCIO" class="form-control" maxlength="100"  placeholder="">
                                    </div>
                                </div>

                                 <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NATURALIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NATURALIDADEMAESOCIO" id="NATURALIDADEMAESOCIO" class="form-control" maxlength="100"  placeholder="clique para pesquisar" readonly>
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">DATA DE NASCIMENTO:</label>
                                    <div class="col-md-8">
                                        <input type="date" name="DATANASCIMENTOMAESOCIO" id="DATANASCIMENTOMAESOCIO" class="form-control text-center"  placeholder="clique para pesquisar"  >
                                    </div>
                                </div>

                                <div class="col-sm-6" id="SEXMAESOCIO">
                                    <label class="col-md-4 control-label">SEXO:</label>
                                    <div class="col-md-8">
                                        <select name="SEXOMAESOCIO" id="SEXOMAESOCIO" class="form-control text-center" >
                                            <option value="">Selecione</option>
                                            <option value="M">MASCULINO</option>
                                            <option value="F">FEMININO</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-sm-6" id="ECMAESOCIO">
                                    <label class="col-md-4 control-label">ESTADO CIVIL:</label>
                                    <div class="col-md-8">
                                        <select id="ESTADOCIVILMAESOCIO" name="ESTADOCIVILMAESOCIO" class="form-control">
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
                                    <input type="text" name="PROFISSAOMAESOCIO" id="PROFISSAOMAESOCIO" class="form-control" maxlength="100"  placeholder="">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                <label class="col-md-4 control-label">ENDEREÇO:</label>
                                <div class="col-md-8">
                                    <input type="text" name="ENDERECOMAESOCIO" id="ENDERECOMAESOCIO" class="form-control dadosmaeSOCIO" maxlength="100"  placeholder="RUA, Nº">
                                </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">BAIRRO:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="BAIRROMAESOCIO" id="BAIRROMAESOCIO" class="form-control" maxlength="100"  placeholder="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">CIDADE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CIDADEMAESOCIO" id="CIDADEMAESOCIO" class="form-control" maxlength="100"  placeholder="clique para pesquisar" readonly>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">PAI:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="AVO1MATERNOSOCIO" id="AVO1MATERNOSOCIO" class="form-control" maxlength="100"  placeholder="">
                                    </div>
                                </div>
                                 <div class="col-sm-6">
                                    <label class="col-md-4 control-label">MÃE:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="AVO2MATERNOSOCIO" id="AVO2MATERNOSOCIO" class="form-control" maxlength="100"  placeholder="">
                                    </div>
                                </div>
                                <div class="col-sm-2" >
                                <div class="col-md-12" >
                                <input type="checkbox" id="rogoMAESOCIO" value="" onclick="$('#ROGOMAESOCIO').toggle();" />
                                <label for="rogoMAESOCIO">Ass. Rogo</label>
                                </div>
                                </div>

                                <div class="col-md-6" id="assrogoMAESOCIO">
                                <input type="text" id="ROGOMAESOCIO" name="ROGOMAESOCIO" class="form-control input-md" placeholder="Nome completo"  />
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
<!--====================================================================================================================================================== -->


<!--======================================================================= DADOS TESTEMUNHAS ============================================================ -->

    <div role="tabpanel" class="tab-pane fade <?=$parte3?> " id="detalheTestemunhas" >
      <form id="formtestemunha" method="POST" action="../bd_UPDATE/update-nascimento.php?id=<?=$id?>">
         <legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">person</i> QUALIFICAÇÃO TESTEMUNHA 1</legend>
                <div class="row">
                   <div class="col-sm-7"></div>
                            <div class="col-sm-3">
                                <a onclick="$('.testemunhasdados').val(null).prop('required',false).prop('disabled',true)" class="btn waves-effect bg-black"><i class="material-icons">close</i>DISPENSAR TESTEMUNHAS</a>
                            </div>
                            <div class="col-sm-2 botadireita">
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
                            <input type="text" name="ORGAOEMISSORTESTEMUNHA1" id="ORGAOEMISSORTESTEMUNHA1" class="testemunhasdados form-control" placeholder="SIGLA/UF">
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
                            <input type="text" name="NATURALIDADETESTEMUNHA1" id="NATURALIDADETESTEMUNHA1" class="form-control testemunhasdados" maxlength="100" placeholder="clique para pesquisar" readonly>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">DATA DE NASCIMENTO:</label>
                        <div class="col-md-8">
                            <input type="date" name="DATANASCIMENTOTESTEMUNHA1" id="DATANASCIMENTOTESTEMUNHA1" class="form-control testemunhasdados text-center" placeholder="clique para pesquisar" >
                        </div>
                    </div>

                    <div class="col-sm-6" id="SEXTEST1">
                        <label class="col-md-4 control-label">SEXO:</label>
                        <div class="col-md-8">
                            <select name="SEXOTESTEMUNHA1" id="SEXOTESTEMUNHA1" class="form-control testemunhasdados text-center">
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
                            <input type="text" name="CIDADETESTEMUNHA1" id="CIDADETESTEMUNHA1" class="form-control testemunhasdados" maxlength="100"  placeholder="clique para pesquisar" readonly>
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
                            <input type="text" name="NOMETESTEMUNHA2" id="NOMETESTEMUNHA2" class="form-control testemunhasdados" maxlength="200" required="" placeholder="NOME COMPLETO">
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
                           <input type="text" class="testemunhasdados form-control" name="ORGAOEMISSORTESTEMUNHA2" id="ORGAOEMISSORTESTEMUNHA2" placeholder="SIGLA/UF">
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
                            <input type="text" name="NATURALIDADETESTEMUNHA2" id="NATURALIDADETESTEMUNHA2" class="form-control testemunhasdados" maxlength="100"  placeholder="clique para pesquisar" readonly>
                        </div>
                    </div>

                    <div class="col-sm-6">
                        <label class="col-md-4 control-label">DATA DE NASCIMENTO:</label>
                        <div class="col-md-8">
                            <input type="date" name="DATANASCIMENTOTESTEMUNHA2" id="DATANASCIMENTOTESTEMUNHA2" class="form-control testemunhasdados text-center"  placeholder="clique para pesquisar" >
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
                            <input type="text" name="CIDADETESTEMUNHA2" id="CIDADETESTEMUNHA2" class="form-control testemunhasdados" maxlength="100"  placeholder="clique para pesquisar" readonly>
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

<!--====================================================================================================================================================== -->



<!--======================================================================= DADOS ASSENTO ================================================================= -->
    <div role="tabpanel" class="tab-pane fade " id="dadosadicionais" >

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
<!--====================================================================================================================================================== -->

<!--======================================================================= DADOS REGISTRO =============================================================== -->
    <div role="tabpanel" class="tab-pane fade <?=$parte4?> " id="registrotab" >
        <form id="formnascido" method="POST" action="../bd_UPDATE/update-nascimento.php?id=<?=$id?>">
                <legend style="font-size: 70%" class="badge bg-light-blue"><i class="material-icons">book </i>  DADOS DO REGISTRO </legend>

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

                         <?php if (!empty($livro_nas) && !empty($folha_nas) && !empty($termo_nas)): ?>
                             

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
                            <select name="ATONASCIMENTO" id="ATONASCIMENTO"  class="col-sm-5 form-control"  required>

                                 <option value=""> Selecione </option>
                                <option value="14.a"> 14.a - Registro de nascimento, bem como pela primeira
                                certidão respectiva. Isento...
                                </option>
                                <option value="14.b">14.b - Registro de nascimento realizado pelas Centrais ou
                                Postos de Registro mantidos pelo poder público...
                                </option>
                            </select>

                            </div>
                            </div>
                            <div class="col-sm-6"></div>

                               <div class="col-sm-6">
                                <label class="col-md-4 control-label" for="LIVRONASCIMENTO">Livro:</label>
                                <div class="col-md-8"><div class="form-line">
                                <div class="form-line">
                                <input id="LIVRONASCIMENTO" name="LIVRONASCIMENTO" type="text" value=""  class="form-control " required="" >
                                </div>
                                </div>
                                </div>
                                </div>


                            <div class="col-sm-6">
                                <label class="col-md-4 control-label" for="FOLHANASCIMENTO">Folha:</label>
                                <div class="col-md-8"><div class="form-line">
                                <div class="form-line">
                                <input id="FOLHANASCIMENTO" name="FOLHANASCIMENTO" type="text" value="" class="form-control " required="" >
                                </div>
                                </div>
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <label class="col-md-4 control-label" for="TERMONASCIMENTO">Termo:</label>
                                <div class="col-md-8"><div class="form-line">
                                <div class="form-line">
                                <input id="TERMONASCIMENTO" name="TERMONASCIMENTO" type="text" value="" class="form-control " required="" >
                                </div>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                    <label class="col-md-4 control-label" for="DATAENTRADA">Data Registro:</label>
                                    <div class="col-md-8"><div class="form-line">
                                    <div class="form-line">
                                    <input id="DATAENTRADA" name="DATAENTRADA" type="date" value="" class="form-control  text-center" required="" >
                                    </div>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-sm-8">
                                <label class="col-md-3 control-label" for="MATRIUCLA">MATRICULA:</label>
                                <div class="col-md-6"><div class="form-line">
                                <div class="form-line">
                                <input style="margin-left: -1%" id="MATRICULA" name="MATRICULA" type="text" value="" class="form-control " required="" readonly="" >
                                </div>
                                </div>
                                </div>
                                <a onclick="matricula()" ondblclick="matricula2()" class="btn waves-effect bg-green"><i class="material-icons">refresh</i> GERAR</a>
                                </div>

                                <script type="text/javascript">
                                function matricula(){
                                var livro = $('#LIVRONASCIMENTO').val();
                                var folha = $('#FOLHANASCIMENTO').val();
                                var termo = $('#TERMONASCIMENTO').val();
                                var dataRegistro = $('#DATAENTRADA').val();

                                var tipoLivro = 1;
                                var tipoRegistro = 'NA';
                                if ($('#DATAENTRADA').val()!='') {
                                $.post('gerador-matricula-externo.php', {'livro':livro, 'folha':folha, 'termo':termo,'dataRegistro':dataRegistro, 'tipoLivro':tipoLivro, 'tipoRegistro':tipoRegistro}, function(data) {
                                $("#MATRICULA").val(data);
                                });
                                }
                                if ($('#DATAENTRADA').val() =='') {
                                        $('#MATRICULA').val('');
                                        swal('OPS', 'VOCÊ NÃO PREENCHEU A DATA DO REGISTRO', "error");
                                        
                                    }
                                }

                                function matricula2(){
                                confirm = confirm("DESEJA MESMO GERAR MATRICULA COMO ACERVO INCORPORADO?");
                                if (confirm == true) {
                                var livro = $('#LIVRONASCIMENTO').val();
                                var folha = $('#FOLHANASCIMENTO').val();
                                var termo = $('#TERMONASCIMENTO').val();
                                var dataRegistro = $('#DATAENTRADA').val();
                                var tipoLivro = 1;
                                var tipoRegistro = 'NA';
                                var incorporado = 'ok';
                                $.post('gerador-matricula-externo.php', {'livro':livro, 'folha':folha, 'termo':termo,'dataRegistro':dataRegistro, 'tipoLivro':tipoLivro, 'tipoRegistro':tipoRegistro,'incorporado':incorporado}, function(data) {
                                $("#MATRICULA").val(data);
                                });
                                }
                                }
                                </script>

                           



                            <div class="col-sm-6" id="containerselorest1">
                                <label class="col-md-4 control-label" for="SELO">Selo Geral 1:</label>
                                <div class="col-md-5"><div class="form-line">
                                <div class="form-line">
                                <input type="text" id="SELORESTAURA1" name="SELORESTAURA1" class="form-control input-md" placeholder="" style="background: white!important"  />
                                </div>
                                </div>
                                </div>

                                <div class="col-md-1">
                                <a id="modalselo1" style="cursor: pointer;"  type="button" class="btn bg-grey waves-effect"><i class="material-icons">search</i></a>
                                </div>
                                    <script type="text/javascript">
                                    $("#SELORESTAURA1").keyup(function (e) {
                                    document.getElementById('SELOGRATUITO2').value = '';
                                    var seloCod = $(this).val();
                                    $.post('consultas/selo-casamento.php', {'seloCodigo':seloCod}, function(data) {
                                    $("#resultado2").html(data);
                                    });
                                    });
                                    </script>
                            </div>
                            <div class="col-sm-6" id="containerselorest2">
                                <label class="col-md-4 control-label" for="SELO">Selo Geral 2:</label>
                                <div class="col-md-5"><div class="form-line">
                                <div class="form-line">
                                <input type="text" id="SELORESTAURA2" name="SELORESTAURA2" class="form-control input-md" placeholder="" style="background: white!important"  />
                                </div>
                                </div>
                                </div>

                                <div class="col-md-1">
                                <a id="modalselo2" style="cursor: pointer;"  type="button" class="btn bg-grey waves-effect"><i class="material-icons">search</i></a>
                                </div>
                                    <script type="text/javascript">
                                    $("#SELORESTAURA2").keyup(function (e) {
                                    document.getElementById('SELOGRATUITO2').value = '';
                                    var seloCod = $(this).val();
                                    $.post('consultas/selo-casamento.php', {'seloCodigo':seloCod}, function(data) {
                                    $("#resultado2").html(data);
                                    });
                                    });
                                    </script>
                            </div>


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
                                    <input id="NUMEROPAPELSEGURANCA" name="NUMEROPAPELSEGURANCA" type="text" required="" value="" class="form-control "  required="">
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
                                <input type="text" id="SELO2" name="SELO2" class="form-control input-md" placeholder="" style="background:silver!important" readonly=""  />
                                <textarea class="form-control" id="motivoisento" name="motivoisento" placeholder="MOTIVO" rows="4"></textarea>
                                </div>
                                </div>
                                </div>

                                <div class="col-sm-10">
                                <div class="col-md-12" ><div class="form-line">
                                <input type="checkbox" id="SELOGRATUITO" onclick="$('#motivoisento').toggle()" />
                                <label for="SELOGRATUITO">MARQUE CASO O ATO SEJA ISENTO</label>
                                </div> </div>
                                </div>

                               
                                
                            </div>

                </div>
                                 <div class="row">
                        <div class="col-sm-10"> </div>
                          <div class="col-sm-2">
                            <br><br>
                            <!--button type="subimit" name="subimitselo" class=" btn waves-effect bg-green"><i class="material-icons">save</i>SALVAR</button-->
                            <a id="subimitselo"  class=" btn waves-effect bg-green"><i class="material-icons">save</i>SALVAR</a>
                        </div>
                    </div>
         </form>
    </div>

<!--=========================================================================================== -->

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
if ($('#ACERVOFISICO').is(":checked") == false ) {$('#LIVRONASCIMENTO, #FOLHANASCIMENTO,#TERMONASCIMENTO').prop('readonly', true);$('#containerselo').show();$('#ATONASCIMENTO').prop('disabled',false);$('#TIPOPAPELSEGURANCA').prop('disabled',false);$('#NUMEROPAPELSEGURANCA').prop('disabled',false);$('#averbacaoantiga').hide();$('#DNV').prop('required',true);$('#DATANASCIMENTOPAI').prop('required',false);$('#DATANASCIMENTOMAE').prop('required',false);}
else{ {$('#LIVRONASCIMENTO, #FOLHANASCIMENTO,#TERMONASCIMENTO').prop('readonly', false);$('#containerselo').hide();$('#ATONASCIMENTO').prop('disabled',true);$('#TIPOPAPELSEGURANCA').prop('disabled',true);$('#NUMEROPAPELSEGURANCA').prop('disabled',true);$('#averbacaoantiga').show();$('#DNV').prop('required',false);$('#DATANASCIMENTOPAI').prop('required', false);$('#DATANASCIMENTOMAE').prop('required', false);}}   
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


    <script type="text/javascript">
        $("#TERMONASCIMENTO").blur(function (e) {
        var livro = $('#LIVRONASCIMENTO').val();
        var folha = $('#FOLHANASCIMENTO').val();
        var termo = $('#TERMONASCIMENTO').val();    


        $.post('../consultas/papel-seguranca.php', {'livroconsultanascimento':livro, 'folhaconsultanascimento':folha,'termoconsultanascimento':termo}, function(data) {
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





<script type="text/javascript">


var acervo;
var liberar;

$('#subimitselo').click(function(){
if ($('#ACERVOFISICO').is(":checked") == false ) { acervo = '';}
else{ acervo = 'S';}
if ($('#LIBERAREDICAO').is(":checked") == false ) { liberar = '';}
else{ liberar = 'S';}    
if (

$('#ATONASCIMENTO').val() =='' && acervo =='' ||
$('#LIVRONASCIMENTO').val() =='' ||
$('#FOLHANASCIMENTO').val() =='' ||  
$('#TERMONASCIMENTO').val() =='' ||
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
url: "../bd_UPDATE/update-nascimento.php?id=<?=$id?>",
data: {
subimitselo: 'ok',
ACERVOFISICO : acervo,
LIBERAREDICAO: liberar,  
ATONASCIMENTO : $('#ATONASCIMENTO').val(),
LIVRONASCIMENTO : $('#LIVRONASCIMENTO').val(),
FOLHANASCIMENTO : $('#FOLHANASCIMENTO').val(),
TERMONASCIMENTO : $('#TERMONASCIMENTO').val(),
DATAENTRADA : $('#DATAENTRADA').val(),
MATRICULA : $('#MATRICULA').val(),
SELO2: $('#SELO2').val(),
AVERBACAOTERMOANTIGO : $('#AVERBACAOTERMOANTIGO').val(),
TIPOPAPELSEGURANCA : $('#TIPOPAPELSEGURANCA').val(),
NUMEROPAPELSEGURANCA : $('#NUMEROPAPELSEGURANCA').val(),
MOTIVOISENTO : $('#motivoisento').val(),



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
      <script src="nascimento.js"></script>

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
    $('#LIVRONASCIMENTO, #FOLHANASCIMENTO,#TERMONASCIMENTO').prop('readonly', true);
    $('.declarante').hide();
    $('#nomematrigemeos').hide();
    $('.oj').hide();
    $('#ROGODECLARANTE').hide();
     $('#ROGOPAI').hide();
     $('#PROCURADORPAIDIV').hide();
     $('#ROGOMAE').hide();
     $('#ROGOPAISOCIO').hide();
     $('#ROGOMAESOCIO').hide();
         $('#RESPPAI').hide();
        $('#RESPMAE').hide();
    camposmedicos();
    PREENCHERDADOS();
        $('#containerselorest1').hide();
    $('#containerselorest2').hide();
    $('#averbacaoantiga').hide();
    $('#dadoscasamentopais').hide();
     $('.socioafetivo').hide();
     $('#motivoisento').hide();
     if ($('#GEMEOS').val() == 'S') {
    $('#nomematrigemeos').show();
    $('#NOMEMATRICULAGEMEOS').prop('required',true);
}   
else{
    $('#nomematrigemeos').hide();
    $('#NOMEMATRICULAGEMEOS').prop('required',false);   
}
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

      <input name="image" type="file" id="upload" class="hidden" onchange="">


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



<!--script type="text/javascript">
$("#ATONASCIMENTO,#SELO2,#LIVRONASCIMENTO,#FOLHANASCIMENTO,#TERMONASCIMENTO,#DATAENTRADA").click(function (e) {
var livro = $('#LIVRONASCIMENTO').val();
var folha = $('#FOLHANASCIMENTO').val();
$.post('nascimento-tempo-real.php', {'LIVRONASCIMENTO':livro, 'FOLHANASCIMENTO':folha}, function(data) {
$("#resultado1036").html(data);
});
});
</script-->


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
                        <script type="text/javascript">
                                $('#LIVRONASCIMENTO').keyup(function(){
                                    var crm = $(this).val();
                                    crm = crm.replace(/[^\d]+/g,'');
                                    $('#LIVRONASCIMENTO').val(crm);
                                });
                                  $('#FOLHANASCIMENTO').keyup(function(){
                                    var crm = $(this).val();
                                    crm = crm.replace(/[^\d]+/g,'');
                                    $('#FOLHANASCIMENTO').val(crm);
                                });
                                 $('#TERMONASCIMENTO').keyup(function(){
                                    var crm = $(this).val();
                                    crm = crm.replace(/[^\d]+/g,'');
                                    $('#TERMONASCIMENTO').val(crm);
                                });
                            </script>

<div id="resultadorogo"></div>

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
</body>
</html>

