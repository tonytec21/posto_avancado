<?php include('../controller/db_functions.php');session_start();
$pdo = conectar();

include('header.php');
include('menu.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $idatividade = $_GET['id'];
    $d = PESQUISA_ALL_ID('registro_casamento_novo',$id);
    foreach ($d as $d) {
        $livro = $d->LIVROCASAMENTO;
        $folha = $d->FOLHACASAMENTO;
        $tipo = 'CA';
#dados que pertencem a certidão de casamento:
        $noivo = $d->NOMENUBENTE1;
        $c2 = $d->NOMENUBENTE2;
        $s1 = $d->SEXONUBENTE1;
        $s2 = $d->SEXONUBENTE2;
        $dataRegistro = $d->DATAENTRADA;
        $dataCasamento = $d->DATACASAMENTO;
        $matricula = $d->MATRICULA;

        if (strlen($d->REGIMECASAMENTO)>3) {        
            $regime_array = explode("@", $d->REGIMECASAMENTO);
            $regime = $regime_array[0];
            $complemento_regime = $regime_array[1];
        }
        else{
            $regime = $d->REGIMECASAMENTO;  
        }

        $matricula = $d->MATRICULA;

#---------------------------------------------

        $data = date('Y-m-d');
        $nome ='NULL';
        $sexo = 'IN';
        $data_nascimento = 'NULL';
        $local_nascimento = 'NULL';
        $cidade = 'NULL';
        $natural = 'NULL';
        $nome_genitor = 'NULL';
        $cidade =  'NULL';
        $corpele = 'NULL';
        $estadocivi = 'NULL';
        $eleitor = 'NULL';
        $deixoubens = 'NULL';
        $tipolocalobito = 'NULL';
        $tipomorte = 'NULL';
        $enderecoobtestrang = 'NULL';
        $causamorteantecedentes = 'NULL';
        $causamorteoutras = 'NULL';
        $nomeatestantep = 'NULL';
        $crmatestantep = 'NULL';
        $declarante = 'NULL';
        $dataObito = 'NULL';
        $estadocivil = 'NULL';
        $cont_ordem = $pdo->prepare("SELECT * FROM averbacoes_civil where strTipo = 'CA'");
        $cont_ordem->execute();
        $ordem = $cont_ordem->rowCount() + 1;
        $nome_genitor_mae = 'NULL';
        $ordem = $d->TERMOCASAMENTO;

    }
}

elseif (isset($_GET['idnasc']) && !isset($_GET['id'])) {
    $idatividade = $_GET['idnasc'];
    $id = $_GET['idnasc'];
    $d = PESQUISA_ALL_ID('registro_nascimento_novo',$id);
    foreach ($d as $d) {
        $livro = $d->LIVRONASCIMENTO;
        $folha = $d->FOLHANASCIMENTO;
        $nome = $d->NOMENASCIDO;
        $sexo = $d->SEXONASCIDO;
        $matricula = $d->MATRICULA;
        $data_registro = $d->DATAENTRADA;
        $data_nascimento = $d->DATANASCIMENTO;
        $local_nascimento = $d->LOCALNASCIMENTO;
        $cidade = $d->CIDADENASCIMENTO;
        $natural = $d->NATURALIDADEPAI;
        $ordem = $d->TERMONASCIMENTO;
        $nome_genitor = $d->NOMEPAI;
        $nome_genitor_mae = $d->NOMEMAE;
        $tipo = 'NA';
        $data = date('Y-m-d');
        $noivo = 'NULL';
        $c2 = 'NULL';
        $s1 = 'IN';
        $s2 = 'IN';
        $dataRegistro = 'NULL';
        $dataCasamento = 'NULL';
        $regime = 'IN';
        $corpele = 'NULL';
        $estadocivi = 'NULL';
        $eleitor = 'NULL';
        $deixoubens = 'NULL';
        $tipolocalobito = 'NULL';
        $tipomorte = 'NULL';
        $enderecoobtestrang = 'NULL';
        $causamorteantecedentes = 'NULL';
        $causamorteoutras = 'NULL';
        $nomeatestantep = 'NULL';
        $crmatestantep = 'NULL';
        $declarante = 'NULL';
        $dataObito = 'NULL';
        $estadocivil = 'NULL';
        $cont_ordem = $pdo->prepare("SELECT * FROM averbacoes_civil where strTipo = 'NA'");
        $cont_ordem->execute();
        $ordem = $cont_ordem->rowCount() + 1;
        $ordem = $d->TERMONASCIMENTO;
    }
}


elseif (isset($_GET['idobt'])) {
    $idatividade =  $_GET['idobt'];   
    $id = $_GET['idobt'];
    $d = PESQUISA_ALL_ID('registro_obito_novo',$id);
    foreach ($d as $d) {
        $livro = $d->LIVROOBITO;
        $folha = $d->FOLHAOBITO;
        $tipo = 'OB';
        $data = date('Y-m-d');
        $nome = $d->NOME;
        $sexo = $d->SEXO;
        $corpele = $d->COR;
        $estadocivil = $d->ESTADOCIVIL;
        $eleitor = $d->ELEITOR;
        $deixoubens = $d->DEIXOUBENS;
        $tipolocalobito = $d->TIPOLOCALOBITO;
        $tipomorte = $d->TIPOMORTE;
        $matricula = $d->MATRICULA;
        $enderecoobtestrang = '';
        $causamorteantecedentes = $d->CAUSAOBITO;
        $causamorteoutras = '';
        $nomeatestantep = $d->MEDICO;
        $crmatestantep = $d->CRM;
        $declarante = $d->NOMEDECLARANTE;
        $data_registro = $d->DATAENTRADA;
        $dataObito = $d->DATAOBITO;
        $data_nascimento = 'NULL';
        $local_nascimento = 'NULL';
        $cidade = $d->CIDADE;
        $natural = 'NULL';
        $ordem = $d->ID;
        $nome_genitor = 'NULL';
        $noivo = 'NULL';
        $c2 = 'NULL';
        $s1 = 'IN';
        $s2 = 'IN';
        $dataRegistro = 'NULL';
        $dataCasamento = 'NULL';
        $regime = 'IN';
        $cont_ordem = $pdo->prepare("SELECT * FROM averbacoes_civil where strTipo = 'OB'");
        $cont_ordem->execute();
        $ordem = $cont_ordem->rowCount() + 1;
        $nome_genitor_mae = 'NULL';
        $ordem = $d->TERMOOBITO;
    }
}

elseif (isset($_GET['idesp'])) {
    $idatividade =  $_GET['idesp'];   
    $id = $_GET['idesp'];

    $livro = $_GET['livro'];
    $folha = $_GET['folha'];
    $tipo = 'ES';
    $data = date('Y-m-d');
    $nome = '';
    $sexo = '';
    $corpele = '';
    $estadocivil = '';
    $eleitor = '';
    $deixoubens = '';
    $tipolocalobito = '';
    $tipomorte = '';
    $matricula = '';
    $enderecoobtestrang = '';
    $causamorteantecedentes = '';
    $causamorteoutras = '';
    $nomeatestantep = '';
    $crmatestantep = '';
    $declarante = '';
    $data_registro = '';
    $dataObito = '';
    $data_nascimento = 'NULL';
    $local_nascimento = 'NULL';
    $cidade ='';
    $natural = 'NULL';
    $ordem = '';
    $nome_genitor = 'NULL';
    $noivo = 'NULL';
    $c2 = 'NULL';
    $s1 = 'IN';
    $s2 = 'IN';
    $dataRegistro = 'NULL';
    $dataCasamento = 'NULL';
    $regime = 'IN';
    $cont_ordem = $pdo->prepare("SELECT * FROM averbacoes_civil where strTipo = 'ES'");
    $cont_ordem->execute();
    $ordem = $cont_ordem->rowCount() + 1;
    $nome_genitor_mae = 'NULL';
    $ordem = $_GET['termoes'];

}

else{
    $livro = 'NULL';
    $folha = 'NULL';
    $tipo = 'IN';
    $data = date('Y-m-d');
    $noivo = 'NULL';
    $c2 = 'NULL';
    $s1 = 'NULL';
    $s2 = 'NULL';
    $dataRegistro = 'NULL';
    $dataCasamento = 'NULL';
    $matricula = 'NULL';
    $regime = 'NULL';
    $nome ='NULL';
    $sexo = 'NULL';
    $data_registro = 'NULL';
    $data_nascimento ='NULL';
    $local_nascimento = 'NULL';
    $cidade = 'NULL';
    $natural = 'NULL';
    $nome_genitor = 'NULL';
    $nome_genitor_mae = 'NULL';
}

?>

<section class="content" style="margin-left: 30px">
 <!-- ESSE HIDDEN AQUI É VITAL PRO SALVAR COM AJAX FUNCIONAR -->
 <input type="hidden" id='hiddenId' name="hiddenId" value="<?=$idatividade?>">
 <!-- ESSE HIDDEN AQUI É VITAL PRO SALVAR COM AJAX FUNCIONAR -->

 <div class="container-fluid">
    <div class="block-header">
        <h2></h2>
    </div>
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">

                <div class="header">
                    <h2>
                        INCLUIR AVERBAÇÃO:
                    </h2>
                    <form class="form-horizontal" id="formaverbacao" method="POST" enctype="multipart/form-data" action="averbacao-etapa2-civil.php?id=<?=$id?>">


                    </div>
                    <div class="body">

                        <!--AVERBAÇÕES------------------------------------------------------------------------------------------>
                        <div class="row clearfix">
                            <div class="col-sm-4">

                                <label  class="col-md-2 ">Data:</label>
                                <div class="col-md-8">
                                    <input type="date" id="dataAverbacao" name="dataAverbacao" value="<?=$data?>" class="form-control naomud" readonly>
                                </div>
                            </div>
                            <div class="col-sm-8">

                                <label  class="col-md-2" >Espécie*:</label>
                                <div class="col-md-10"><div class="form-line">

                                    <select id="especieaverbacao"  name="especieaverbacao" class="form-control naomud" required="">
                                        <option value="">SELECIONE</option>
                                        <option value="0">Cancelamento de registro</option>
                                        <option value="1">Divórcio</option>
                                        <option value="2">Nulidade ou anulação do casamento</option>
                                        <option value="3">Alteração de regime de bens (art. 1.639, parág. 2º CCB);</option>
                                        <option value="4">Restabelecimento da sociedade conjugal</option>
                                        <option value="5">Reconhecimento de filiação</option>
                                        <option value="6">Retificação Administrativa</option>
                                        <option value="7">Perda ou suspensão do poder familiar</option>
                                        <option value="8">Retificação Judicial</option>
                                        <option value="9">Alteração de Patronímico</option>
                                        <option value="10">Separação</option>
                                        <option value="11">Ordem Judicial</option>
                                        <option value="12">Averbação de CPF</option>
                                        <option value="13">Outros</option>

                                    </select>


                                </div>
                            </div>
                        </div>

                        <div class="col-sm-4">
                            <label class="col-md-2">Motivo:*</label>
                            <div class="col-md-8">
                                <select name="strMotivoAverbacao" id="strMotivoAverbacao" class="form-control naomud" required="">
                                    <option value="">SELECIONE</option>

                                    <?php if (isset($_GET['idnasc'])): ?>
                                        <option value="10">ANOTAÇÃO CPF</option>
                                        <option value="20">RECONHECIMENTO SOCIOAFETIVO</option>
                                        <option value="30">OUTROS</option>
                                        <option value="40">NOME ABREVIADO</option>
                                        <option value="50">ACRÉSCIMO DE SOBRENOME</option>
                                        <option value="60">ALTERAÇÃO NOME ACRÉSCIMO</option>
                                        <option value="70">PERDA NACIONALIDADE</option>
                                        <option value="80">RECONHECIMENTO JUDICIAL</option>
                                        <option value="90">EXCLUSÃO</option>
                                        <option value="91">CONCESSÃO</option>
                                    <?php endif ?>


                                    <?php if (isset($_GET['id'])): ?>
                                        <option value="10">CONVERSÃO SEPARAÇÃO DIVÓRCIO</option>
                                        <option value="20">ANOTAÇÃO CPF</option>
                                        <option value="30">DIVÓRCIO</option>
                                        <option value="40">SEPARAÇÃO</option>
                                        <option value="50">NULIDADE</option>
                                        <option value="60">REESTABELECIMENTO SOCIEDADE CONJUGAL</option>
                                        <option value="70">OUTROS</option>
                                        <option value="80">ANULAÇÃO</option>
                                    <?php endif ?>


                                    <?php if (isset($_GET['idobt'])): ?>
                                        <option value="10">CREMAÇÃO</option>
                                        <option value="20">ALTERAÇÃO LOCAL SEPULTAMENTO</option>
                                        <option value="30">CANCELAMENTO</option>
                                        <option value="40">DOAÇÃO CADÁVER</option>
                                        <option value="50">OUTRO</option>
                                        
                                    <?php endif ?>
                                    <?php if (isset($_GET['idesp'])): ?>
                                        <option value="50">OUTRO</option>
                                    <?php endif ?>

                                </select>
                            </div>
                                        <!--div class="col-md-2">
                                             <a style="cursor: pointer;" id="informacaocod"><i class="material-icons">info</i></a>
                                         </div-->
                                     </div>



                                    <div class="col-sm-4" >
                                        <div class="col-md-6" >
                                            <input type="checkbox" id="setRegistroInvisivel" name="setRegistroInvisivel" value="S" onclick="$('.previewcertidao').toggle()" />
                                            <label for="setRegistroInvisivel">REGISTRO INVISÍVEL</label>
                                        </div>
                                        <a href="javascript:void(0);" data-trigger="focus" data-html="true" data-container="body" data-toggle="popover" data-placement="right" title="" data-content="Identifica o registro como Invisível (S ou N).São registros que possuem “alguma restrição quanto a sua publicação”. Por ex:
                                        Sigilo." data-original-title="Informação!"><i class="material-icons" >info</i></a>
                                    </div>


                                </div>
                                <div class="row">
                                  <div class="col-md-12">
                                    <span id="resultado5"></span> 
                                     <div class="col-md-9"></div>
                                    <div class="col-md-2">
                                        <a class="btn gradient-info" onclick="$('#modelos').modal()"><i style="font-size: 25px!important" class="material-icons">list</i>  VER MODELOS</a>
                                    </div>

                                    <br>
                                    <label >Texto da Averbação:</label><br>
                                    <textarea  class="form-control naomud textarea" id="strAverbacao" rows="7" name="strAverbacao" required="">
                                        <?php 

                                        if (isset($_SESSION['averbacaotemp'])) {
                                            echo ltrim($_SESSION['averbacaotemp']);
                                        }
                                        ?>
                                    </textarea>
                                    <div id="averbacaotextochek"  class="col-sm-4"></div>
                                </div>
                            </div>
                            <legend>INFO. REGISTRO</legend>                           
                            <span id="resultado"></span>


                    <div class="row clearfix">

                        <div class="col-md-6">
                            <label class="control-form col-md-4">Livro:</label>
                            <div class="col-md-8">
                                <input type="text" id="strLivro" name="strLivro" value="<?=$livro?>" class="form-control naomud" readonly >
                            </div>
                        </div>



                        <div class="col-md-6">
                            <label class="control-form col-md-4">Folha:</label>
                            <div class="col-md-8">
                                <input type="text" id="strFolha" value="<?=$folha?>" name="strFolha" class="form-control naomud" readonly>
                            </div>
                        </div>
                        <input type="hidden" name="formsubmit" value="ok">


                    <!--div class="col-lg-1 col-md-1 col-sm-1 col-xs-5 form-control-label">
                    <label >Folha:</label>
                    </div>
                    <div class="col-lg-2 col-md-2 col-sm-2 col-xs-9">
                    <div class="form-line">
                    <input type="text" id="strFolha" value="<?=$folha?>" name="strFolha" class="form-control naomud" readonly>
                    </div>
                </div-->



                <div class="col-sm-6">
                    <label class="control-form col-md-4" >Tipo:</label>
                    <div class="col-md-8">
                        <?php if ($tipo!=''): ?>
                            <input type="text" id="strTipo" value="<?=$tipo?>" name="strTipo" class="form-control naomud" readonly >
                            <?php else: ?>
                                <select id="strTipo" name="strTipo" class="form-control">
                                    <option value="CA">Casamento</option>
                                    <option value="NA">Nascimento</option>
                                    <option value="OB">Óbito</option>
                                </select>
                            <?php endif ?>
                        </div>
                    </div>



                    <div class="col-sm-6">
                        <label  class="col-md-2" >Matricula:</label>
                        <div class="col-md-10">
                            <input  type="text" id="matricula" value="<?=$matricula?>" name="matricula" class="form-control" readonly >
                        </div>
                    </div>
                    <div class="col-sm-6">

                        <label  class="col-md-4 ">Ordem:</label>
                        <div class="col-md-8">
                            <input   type="text" id="strOrdem" name="strOrdem" value="<?=$ordem?>" class=" naomud form-control" >
                        </div>
                    </div>
                    <!--AVERBAÇÕES--------------------------------------------------------------------------------------------------------------------------->



                    <!--legend><i class="material-icons">home</i>Dados</legend-->
                </div>
                <div class="row clearfix">

                    <br>
                    <div id="dadoscasamento">

                        <legend><i class="material-icons">person</i>Primeiro Nubente</legend>
                        <span id="resultado2"></span>
                        <br>
                        <div class="col-sm-6">

                            <label class="col-md-4" >1º Nubente:</label>
                            <div class="col-md-7">
                                <input type="text" id="Conjuge1" value="<?=$noivo?>" name="Conjuge1" class="form-control" >
                            </div>
                            <div id="c1chek" style="margin-left: -5%" class="col-sm-1"></div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-md-4" >Sexo:</label>
                            <div class="col-md-7">
                                <input type="text" id="sexoConjuge1" value="<?=$s1?>" name="sexoConjuge1" class="form-control" >
                            </div>
                            <div id="s1chek" style="margin-left: -5%" class="col-sm-1"></div>
                        </div>

                        <legend ><i class="material-icons">person</i>Segundo Nubente</legend>
                        <br>
                        <div class="col-sm-6">
                            <label class="col-md-4" >2º Nubente:</label>
                            <div class="col-md-7">
                                <input type="text" id="Conjuge2" value="<?=$c2?>" name="Conjuge2" class="form-control" >
                            </div>
                            <div id="c2chek" style="margin-left: -5%" class="col-sm-1"></div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-md-4" >Sexo:</label>

                            <div class="col-md-7">
                                <input type="text" id="sexoConjuge2" value="<?=$s2?>" name="sexoConjuge2" class="form-control" >
                            </div>
                            <div id="s2chek" style="margin-left: -5%" class="col-sm-1"></div>
                        </div>
                        <br><br>
                        <legend ><i class="material-icons">book</i>Dados Registro</legend>
                        <div class="col-sm-6">
                            <label class="col-md-4" >Data do Registro:</label>

                            <div class="col-md-7">
                                <input type="date" id="dataRegistro" value="<?=$dataRegistro?>" name="dataRegistro" class="form-control"  readonly>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-md-4" >Data do casamento:</label>

                            <div class="col-md-7">
                                <input type="date" id="dataCasamento" value="<?=$dataCasamento?>" name="dataCasamento" class="form-control" readonly >
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-md-4" >Regime:</label>

                            <div class="col-md-7">
                                <!--input type="text" id="regime" value="" name="regime" class="form-control"-->
                                <select name="regime" id="regime"  class="form-control" >


                                    <option value="CP">Comunhão Parcial de Bens</option>
                                    <option value="CU">Comunhão Universal de Bens</option>
                                    <option value="PF">Participação Final nos Aqüestos</option>
                                    <option value="SB">Separação de Bens</option>
                                    <option value="SC">Separação Convencional</option>
                                    <option value="CB">Comunhão de Bens</option>

                                </select>
                            </div>
                            <div id="rchek" style="margin-left: -5%" class="col-sm-1"></div>
                        </div>


                        <!-- fim dados casamento -->
                    </div>


                    <div id="dadosnascimento">
                        <legend ><i class="material-icons">book</i>Dados Registrado</legend>
                        <span id="resultado3"></span>
                        <div class="col-sm-6">
                            <label class="col-md-4" >Nome Registrado:</label>

                            <div class="col-md-7">
                                <input type="text" id="nome" value="<?=$nome?>" name="nome" class="form-control" >
                            </div>
                            <div id="registradochek" style="margin-left: -5%" class="col-sm-1"></div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-md-4" >Sexo:</label>
                            <div class="col-md-7">
                                <input type="text" id="sexo" value="<?=$sexo?>" name="sexo" class="form-control" >
                            </div>
                            <div id="sexoregistradochek" style="margin-left: -5%" class="col-sm-1"></div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-md-4" >Data do Registro:</label>

                            <div class="col-md-7">
                                <input type="date" id="dataRegistro" value="<?=$data_registro?>" name="dataRegistro" class="form-control" readonly>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-md-4" >Data de Nascimento:</label>

                            <div class="col-md-7">
                                <input type="date" id="dataNascimento" value="<?=$data_nascimento?>" name="dataNascimento" class="form-control" readonly>
                            </div>
                        </div>
                        <legend ><i class="material-icons">person</i>Filiação</legend>
                        <div class="col-sm-6">
                            <label class="col-md-4" >Mãe:</label>

                            <div class="col-md-7">
                                <input type="text" id="genitor_mae" value="<?=$nome_genitor_mae?>" name="genitor_mae" class="form-control" >
                            </div>
                            <div id="genitor_maeregistradochek" style="margin-left: -5%" class="col-sm-1"></div>
                        </div>

                        <div class="col-sm-6">
                            <label class="col-md-4" >Pai:</label>

                            <div class="col-md-7">
                                <input type="text" id="genitor" value="<?=$nome_genitor?>" name="genitor" class="form-control" >
                            </div>
                            <div id="genitorregistradochek" style="margin-left: -5%" class="col-sm-1"></div>
                        </div>

<!--div class="col-sm-6">
    <label class="col-md-4" >Local de Nascimento:</label-->

        <!--div class="col-md-8"-->
        <input type="hidden" id="local_nascimento" value="<?=$local_nascimento?>" name="local_nascimento" class="form-control" >
<!--/div>
</div>
<div class="col-sm-6">
    <label class="col-md-4" >Cidade:</label-->

        <!--div class="col-md-8"-->
        <input type="hidden" id="cidade_nascimento" value="<?=$cidade?>" name="cidade_nascimento" class="form-control" >
<!--/div>
</div-->



<!--div class="col-sm-6">
    <label class="col-md-4" >Naturalidade:</label-->

        <!--div class="col-md-8"-->
        <input type="hidden" id="naturalidadeGenitor" value="<?=$natural?>" name="naturalidadeGenitor" class="form-control" >
<!--/div>
</div-->

<div class="row">
    <br><br><br><br>
    <div class="col-sm-12">
        <a style="padding: 10px;" class="btn waves-effect bg-blue col-sm-12" onclick="$('#docsadnascimento').modal()"> INCLUIR/ALTERAR DOCUMENTOS ADICIONAIS  <i class="material-icons">edit</i></a></div>
    </div>    
</div>

<div id="dadosobito">
    <legend ><i class="material-icons">person</i>Dados do Óbito</legend>
    <span id="resultado4"></span>
    <div class="col-sm-6">
        <label class="col-md-4" >Nome Registrado:</label>

        <div class="col-md-7">
            <input type="text" id="nome" value="<?=$nome?>" name="nome" class="form-control" readonly>
        </div>
    </div>

    <div class="col-sm-6">
        <label class="col-md-4" >Sexo:</label>
        <div class="col-md-7">
            <input type="text" id="sexo" value="<?=$sexo?>" name="sexo" class="form-control" readonly >
        </div>
    </div>

    <div class="col-sm-6">
        <label class="col-md-4" >Data do Registro:</label>

        <div class="col-md-7">
            <input type="date" id="dataRegistro" value="<?=$data_registro?>" name="dataRegistro" class="form-control" readonly >
        </div>
    </div>


    <div class="col-sm-6" style="display: none;">
        <label class="col-md-4" >Cor da pele:</label>

        <div class="col-md-7">
            <input type="text" id="corpele" value="<?=$corpele?>" name="corpele" class="form-control" >
        </div>
    </div>


    <div class="col-sm-6" style="display: none;">
        <label class="col-md-4" >Estado Civil:</label>

        <div class="col-md-7" style="display: none;">
            <input type="text" id="estadocivil" value="<?=$estadocivil?>" name="estadocivil" class="form-control" >
        </div>
    </div>

    <div class="col-sm-6" style="display: none;">
        <label class="col-md-4" >Era eleitor?</label>

        <div class="col-md-7" style="display: none;">
            <input type="text" id="eleitor" value="<?=$eleitor?>" name="eleitor" class="form-control" >
        </div>
    </div>

    <div class="col-sm-6" style="display: none;">
        <label class="col-md-4" > Cidade:</label>

        <div class="col-md-7">
            <input type="text" id="cidade_nascimento" value="<?=$cidade?>" name="cidade_nascimento" class="form-control" >
        </div>
    </div>

    <div class="col-sm-6" style="display: none;">
        <label class="col-md-4" >Tipo Local Morte:</label>

        <div class="col-md-7">
            <input type="text" id="tipolocalobito" value="<?=$tipolocalobito?>" name="tipolocalobito" class="form-control" >
        </div>
    </div>

    <div class="col-sm-6">
        <label class="col-md-4" >Tipo de Morte</label>
        <div class="col-md-7">
          <select  id="tipomorte" name="tipomorte" class="form-control">
            <option value="<?=$tipomorte?>" class="bg-green"><?=$tipomorte?> -  (SELECIONADO)</option>
            <option value="NAT">Natural</option>
            <option value="VIO">Violenta</option>
        </select>

    </div>
    <div id="tipomortechek" style="margin-left: -5%" class="col-sm-1"></div>
</div>

<div class="col-sm-6" style="display: none;">
    <label class="col-md-4" >Data do Óbito:</label>

    <div class="col-md-7">
        <input type="date" id="dataObito" value="<?=$dataObito?>" name="dataObito" class="form-control" >
    </div>
</div>

<div class="col-sm-6" style="display: none;">
    <label class="col-md-4" >Dec. Primário:</label>

    <div class="col-md-7">
        <input type="text" id="nomeatestantep" value="<?=$nomeatestantep?>" name="nomeatestantep" class="form-control" >
    </div>
</div>

<div class="col-sm-6" style="display: none;">
    <label class="col-md-4" >CRM:</label>

    <div class="col-md-7">
        <input type="text" id="crmatestantep" value="<?=$crmatestantep?>" name="crmatestantep" class="form-control" >
    </div>
</div>

<div class="col-sm-6" >
    <label class="col-md-4" >Causa da morte:</label>

    <div class="col-md-7">
        <input type="text" id="causamorteantecedentes" value="<?=$causamorteantecedentes?>" name="causamorteantecedentes" class="form-control" >
    </div>
    <div id="causamortechek" style="margin-left: -5%" class="col-sm-1"></div>
</div>

<div class="col-sm-6" style="display: none;">
    <label class="col-md-4" >Declarante:</label>

    <div class="col-md-7">
        <input type="text" id="declarante" value="<?=$declarante?>" name="declarante" class="form-control" >
    </div>
</div>

<div class="col-sm-6" style="display: none;">
    <label class="col-md-4" >Deixou Bens?</label>

    <div class="col-md-7">
        <input type="text" id="deixoubens" value="<?=$deixoubens?>" name="deixoubens" class="form-control" >
    </div>
</div>

</div>
<input type="hidden" name="causamorteoutras" value="<?=$causamorteoutras?>">
<input type="hidden" name="enderecoobtestrang" value="<?=$enderecoobtestrang?>">






</div>
<br>
<div class="row">
    <div class="col-sm-6"></div>    
<!--div class="col-sm-3">
<?php if (isset($_GET['idnasc'])) :?>
<a target="_blank" href="PDFS/preview-etiqueta-averbacao.php?nasc=ok&id=<?=$_GET['idnasc']?>" class="btn bg-indigo  waves-effect waves-float"> <i class="material-icons">picture_as_pdf</i> PRÉ VISUALIZAR ETIQUETA </a>
<?php elseif(isset($_GET['idobt'])): ?>
<a target="_blank" href="PDFS/preview-etiqueta-averbacao.php?obt=ok&id=<?=$_GET['idobt']?>" class="btn bg-indigo  waves-effect waves-float"> <i class="material-icons">picture_as_pdf</i> PRÉ VISUALIZAR ETIQUETA </a>
<?php elseif(isset($_GET['idesp'])): ?>
<?php else: ?>
<a target="_blank" href="PDFS/preview-etiqueta-averbacao.php?casa=ok&id=<?=$_GET['id']?>" class="btn bg-indigo  waves-effect waves-float"> <i class="material-icons">picture_as_pdf</i> PRÉ VISUALIZAR ETIQUETA </a>
<?php endif ?>
</div-->


<!--div class="col-sm-3">
    <?php if (isset($_GET['idnasc'])) :?>
        <a target="_blank" href="PDFS/preview-pdf-nascimento.php?id=<?=$_GET['idnasc']?>" class="btn bg-orange previewcertidao  waves-effect waves-float"><i class="material-icons">picture_as_pdf</i> PRÉ VISUALIZAR CERTIDÃO </a>
        <?php elseif(isset($_GET['idobt'])): ?>
            <a target="_blank" href="PDFS/preview-pdf-obito.php?id=<?=$_GET['idobt']?>" class="btn bg-orange previewcertidao  waves-effect waves-float"><i class="material-icons">picture_as_pdf</i> PRÉ VISUALIZAR CERTIDÃO </a>
            <?php elseif(isset($_GET['idesp'])): ?>

                <?php else: ?>
                    <a target="_blank" href="PDFS/preview-pdf-casamento.php?id=<?=$_GET['id']?>" class="btn bg-orange previewcertidao  waves-effect waves-float"><i class="material-icons">picture_as_pdf</i> PRÉ VISUALIZAR CERTIDÃO </a>
                <?php endif ?>
            </div-->
               
            <div class="col-sm-12">
                <a id="botaoform" class="btn gradient-azul-forte  waves-effect waves-float col-md-12">
                    <i class="material-icons">save</i> SALVAR E AVANÇAR</a>
                </div>
            </div>        
        </div>



    </form>
</div>
</div>
</div>
</div>
<!-- #END# Horizontal Layout -->

</div>
</section>

<!-- Jquery Core Js -->
<!-- Jquery Core Js -->
<script src="../plugins/jquery/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
       $('#motivoatoisento').hide();
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
<script src="../js/admin.js"></script>
<script src="../js/pages/tables/jquery-datatable.js"></script>
<script src="../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<!-- Demo Js -->
<script src="../js/demo.js"></script>



<?php if (isset($_SESSION['sucesso'])):?>

    <?php if (isset($_GET['idnasc'])): ?>
        <script>
            id = '<?=$id?>'; 
            swal({
                type: "success",
                title: "<?=str_replace("<br>", " ", $_SESSION['sucesso'])?> <br>",
                text: "<a class='btn waves-effect bg-blue' href='pesquisa-nascimento.php?id="+id+"'>IR PARA PESQUISA</a><br>" ,
                html: ' ',
                confirmButtonText:
                'OK',
            });

        </script>   
    <?php endif ?>

    <?php if (isset($_GET['id'])): ?>
        <script>
            id = '<?=$id?>'; 
            swal({
                type: "success",
                title: "<?=str_replace("<br>", " ", $_SESSION['sucesso'])?> <br>",
                text: "<a class='btn waves-effect bg-blue' href='pesquisa-casamento.php?id="+id+"'>IR PARA PESQUISA</a><br>" ,
                html: ' ',
                confirmButtonText:
                'OK',
            });

        </script>   
    <?php endif ?>


    <?php if (isset($_GET['idobt'])): ?>
        <script>
            id = '<?=$id?>'; 
            swal({
                type: "success",
                title: "<?=str_replace("<br>", " ", $_SESSION['sucesso'])?> <br>",
                text: "<a class='btn waves-effect bg-blue' href='pesquisa-obito.php?id="+id+"'>IR PARA PESQUISA</a><br>" ,
                html: ' ',
                confirmButtonText:
                'OK',
            });

        </script>   
    <?php endif ?>
    <?php if (isset($_GET['idesp'])): ?>
        <script>
            id = '<?=$id?>'; 
            swal({
                type: "success",
                title: "<?=str_replace("<br>", " ", $_SESSION['sucesso'])?> <br>",
                text: "<a class='btn waves-effect bg-blue' href='pesquisa-livroe.php?id="+id+"'>IR PARA PESQUISA</a><br>" ,
                html: ' ',
                confirmButtonText:
                'OK',
            });

        </script>   
    <?php endif ?>


    <?php
    unset($_SESSION['sucesso']);
endif ?> 


<?php if (isset($_SESSION['erro'])):?>
    <script> 
        swal('ERRO',"<?=$_SESSION['erro']?>",'error');
    //$("#erro").modal();</script>

    <?php
    unset($_SESSION['erro']);
endif ?>

<div class="modal fade  " id="info" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content bg-blue">
           <div class="alert bg-blue ">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h2 class="text-center">Códigos:</h2>

            <p class="text-center">                                                     
                <h3>Código 10</h3> – Erro do cartório na digitação da carga (não requer data averbação)
                <br>
                <h3>Código 20</h3> – Retificação Judiciais e/ou administrativas (requer data averbação)
                <br>
                <h3>Código 30</h3> – Motivo destinado a retirar da consulta externa da CRC registros que por determinação judicial foi
                retirada a sua publicidade. Ex. Registro Cancelado por adoção, registro com averbação de proteção a testemunha, ou
                ainda qualquer outro motivo determinado judicialmente (requer data averbação)
                <br>
                <h3>Código 40</h3> – Motivo destinado a retirar da consulta externa da CRC. Utilizado por alguns cartórios para justificar falta
                de sequência de numeração de registros, utilização de numeração para transporte de registro.(não requer data averbação)
                <br>
                <h3>Código 50</h3> – Exclusivo para Registro e Transcrições de nascimento – Utilizar quando o seu motivo for o
                reconhecimento de paternidade, maternidade ou mesmo adoção (requer data averbação)
                <br>
                <h3>Código 60</h3> – Destinado a complementar informação que não foi feita no momento da carga original (não requer data
                averbação)


            </p>

        </div>
    </div>
</div>
</div>


<script type="text/javascript">
    $('#informacaocod').click(function(){
        $('#info').modal();

    });
</script>


<script type="text/javascript">
    $("#modalselo").click(function(){
        $("#selo").modal();
    });
</script>          

</body>












<div class="modal fade" id="docsadnascimento" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
          <div class="modal-header">
            <h4 class="modal-title" id="defaultModalLabel">Documentos Ad.:</h4>
        </div>
        <div id="cid" class="modal-body">


           <div role="tabpanel" class="row clearfix"  >

            <form class="form-horizontal" method="POST" action="../consultas/averbacoes-db.php?id=<?=$id?>">


                <div class="demo-masked-input" style="width: 103%">
                    <label class="bg-grey" style="width: 97%; margin-left: -1%"><i class="material-icons">person</i> DADOS:</label> 

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
                            <a onclick="$('.rgn1,.rgn2,.pisn1,.pisn2,.titn2,.titn1,.cepn2,.cepn1,.gpsan2,.gpsan1,.passn2,.passn1,.cartn2,.cartn1').val(' ');$('.rgn1,.rgn2,.pisn1,.pisn2,.titn2,.titn1,.cepn2,.cepn1,.gpsan2,.gpsan1,.passn2,.passn1,.cartn2,.cartn1').hide();" class="btn waves-effect bg-red"> <i class="material-icons">clear</i> TUDO EM BRANCO</a>
                        </div>
                        <div class="col-sm-2">
                          <button type="subimit" name="subimitdocs" class="btn bg-green  waves-effect waves-float">
                              <i class="material-icons">save</i> SALVAR
                          </button>
                      </div>
                  </div>
                  <br><br>
              </form>
          </div>
      </div>







  </div>
  
</div>  
</div>
</div>






<?php if ($tipo!='CA'): ?>
    <script type="text/javascript">
     $('#dadoscasamento').hide();
 </script>

<?php endif ?>
<?php if ($tipo!='NA'): ?>
    <script type="text/javascript">
    $('#dadosnascimento').hide();</script>
<?php endif ?>
<?php if ($tipo!='OB'): ?>
    <script type="text/javascript">
    $('#dadosobito').hide();</script>
<?php endif ?>
<input name="image" type="file" id="upload" class="hidden" onchange="">

<script src="incluir-averbacao.js"></script>
<script type="text/javascript">
    $('#botaoform').click(function(){
        
        if ($('#especieaverbacao').val()=='') {
        swal("","CAMPO ESPECIE DA AVERBAÇÃO NÃO PODE ESTAR EM BRANCO", "error");    
        }
        else if($('#strMotivoAverbacao').val()==''){
            swal("","CAMPO MOTIVO DA AVERBAÇÃO NÃO PODE ESTAR EM BRANCO", "error");    
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

         
            $('#formaverbacao').submit();
                                //window.location.reload();
                            }
                            );
        

    }});

</script> 

</html>



<!-- TinyMCE -->
<script src="../js/pages/forms/editors.js"></script>
<script src="../plugins/tinymce/tinymce.js"></script>


<!--TINYMCE EDITADO 1-->
                                <script>

                                    tinymce.init({
                                        selector: '.textarea',
                                        language: 'pt_BR',
                                        language_url : '../plugins/tinymce/langs/pt_BR.js',
                                        theme: 'modern',
                                        height: 150,

                                        plugins: [
                                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                                        'insertdatetime media nonbreaking save table contextmenu directionality',
                                        'emoticons template paste textcolor colorpicker textpattern imagetools'
                                        ],
                                        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify |  outdent indent | removeformat nocaps allcaps titlecase removebr  preview | fontsizeselect',
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
<input name="image" type="file" id="upload" class="hidden" onchange="">


<div class="modal fade" id="modelos" tabindex="-1" role="dialog">
<div class="modal-dialog modal-dialog" role="document">
<div class="modal-content ">
<div class="alert alert-dismissible" role="alert">
<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
<h2 class="text-center" style="color:black">
 MODELOS DE AVERBAÇÃO
</h2>
<?php 
$linhas = PESQUISA_ALL('cadastro_minutas_civil');
 ?>
<div class="body">
     <div class="table-responsive" >
                                <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                          <th>TITULO</th>
                                          <th>######</th>
                                          <th>EDITAR</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>TITULO</th>
                                            <th>######</th>
                                            <th>EDITAR</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php   foreach($linhas as $b):?>
                         
                                      <tr>
                                            <td><?=$b->titulo?></td>
                                            <td><a onclick='tinymce.get("strAverbacao").setContent("<?=strip_tags($b->texto)?>");' class="btn gradient-azul-forte" data-dismiss="modal">USAR MODELO</a></td>
                                            <td><a href="update-minuta-civil.php?id=<?=$b->ID?>"><i class="material-icons">edit</i></a></td>
                                        </tr>
                        
                    
                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
</div>



</div>
</div>
</div>
</div>
</body>
</html>
