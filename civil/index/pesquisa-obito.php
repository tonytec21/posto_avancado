<?php include('../controller/db_functions.php');
session_start();
$pdo=conectar();

$up_av = $pdo->prepare("UPDATE averbacoes_civil set strOrdem = 'A' where strOrdem = 'I'");
$up_av->execute();
unset($_SESSION['SELOOLD']);
unset($_SESSION['salvamento_automatico']);
if (empty($_SESSION['id']) && empty($_SESSION['nome'])) {
 $_SESSION['msg'] = "<div class='alert alert-info' role='alert' id='response'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
        &times;</span></button>
        Área restrita
        </div>";
        header("location: ../../login.php");
}

if (isset($_GET['id'])) {
      $id = $_GET['id'];
  }

if (isset($_GET['idexclusao'])) {
$idexclusao = $_GET['idexclusao'];
$del = $pdo->prepare("DELETE FROM averbacoes_civil where ID = '$idexclusao'");
$del->execute();
$_SESSION['sucesso'] = 'DELETADA A AVERBAÇÃO COM SUCESSO';
}
  
unset($_SESSION['nati']);  
 $URL_ATUAL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
 $titulo = 'ÓBITO - PESQUISA ';  
include('header.php');
include('menu.php');

  ?>

    <section class="content" style="margin-left: 60px!important"   >
        <div class="container-fluid">
            <div class="block-header">
              
            </div>
            <!-- Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-sm-8"></div>
              <!--a href="registro-civil-selo-folha-acrescida.php" class="btn waves-effect bg-amber"><i class="material-icons">add</i>SELO DE FOLHA ACRESCIDA NAS CERTIDÕES</a><br><br-->
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card" style="min-width: 100%; margin-left: -4.5%;">
                           <div class="col-sm-10"></div>
                            <a onclick="$('#impressao').modal();" class="btn waves-effect bg-orange">ALTERAR QUEM ASSINA</a>
                            <div class="modal fade" id="impressao" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                            <h4 class="modal-title" id="impressaoLabel">NOME NAS ASSINATURAS:</h4>
                            </div>
                            <div class="modal-body">
                            <form class="form-horizontal" method="POST" >

                            <label for="posicao">Assinatura:</label>
                            <select class="form-control" name="funcionario" required="">
                             <option value="">SELECIONE</option> 
                            <?php $q= PESQUISA_ALL('funcionario'); foreach($q as $q): if($q->strPermissaoAssinar == 'S')?>
                            <option><?=$q->strNomeCompleto?></option>
                            <?php endforeach ?>
                            <?php $w= PESQUISA_ALL_ID('cadastroserventia',1); foreach($w as $w): ?>
                            <option><?=$w->strTituloServentia?></option>
                            <?php endforeach ?>
                            </select>

                            <label for="posicao">CARGO:</label>
                            <select class="form-control" name="alteracargo" required="">
                               <option value="">SELECIONE</option> 
                            <?php $q= PESQUISA_ALL('funcionario'); foreach($q as $q): if($q->strPermissaoAssinar == 'S')?>
                            <option><?=$q->strCargo?></option>
                            <?php endforeach ?>
                            <option>TABELIÃO(a)/REGISTRADOR(a)</option>
                           
                            </select>



                            </div>
                            <div class="modal-footer">
                            <button type="subimit" class="btn bg-red waves-effect">
                            <i class="material-icons">check</i>
                            <span>CONFIRMAR </span>
                            </button>
                            </form>
                            <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">CANCELAR</button>
                            </div>
                            </div>
                            </div>
                            </div>


                            <?php 

                            if (isset($_POST['funcionario'])) {
                            $_SESSION['nomeapoio'] = $_POST['funcionario'];
                            $_SESSION['funcaoapoio'] = $_POST['alteracargo'];     
                            }

                            ?>
                        <div class="header">
                            <h2>
                           Arquivo de Pessoas
                            </h2>

                        </div>
                        <div class="body">
                         <div class="row">
                                


                            <div class="col-sm-6">
                                <label class="control-label col-md-4">NOME:</label>
                                <div class="col-md-8">
                                    <input type="text" id="NOME" name="NOME" class="form-control" required="" placeholder="NOME"
                                    onfocus="$('#CPF,#LIVRO,#FOLHA,#TERMO').val('');">
                                </div>
                            </div>


                            <div class="col-sm-6">
                                <label class="control-label col-md-4">CPF:</label>
                                <div class="col-md-8">
                                    <input type="text" id="CPF" name="CPF" class="form-control" required=""
                                    onfocus="$('#NOME,#LIVRO,#FOLHA,#TERMO').val('');">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="control-label col-md-4">LIVRO:</label>
                                <div class="col-md-8">
                                    <input type="text" id="LIVRO" name="LIVRO" class="form-control" required="" placeholder=""
                                    onfocus="$('#CPF,#NOME,#FOLHA,#TERMO').val('');">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="control-label col-md-4">FOLHA:</label>
                                <div class="col-md-8">
                                    <input type="text" id="FOLHA" name="FOLHA" class="form-control" required="" placeholder=""
                                    onfocus="$('#CPF,#LIVRO,#NOME,#TERMO').val('');">
                                </div>
                            </div>

                            <div class="col-sm-6">
                                <label class="control-label col-md-4">TERMO:</label>
                                <div class="col-md-8">
                                    <input type="text" id="TERMO" name="TERMO" class="form-control" required="" placeholder=""
                                    onfocus="$('#CPF,#LIVRO,#FOLHA,#NOME').val('');">
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="col-md-4"></div>
                                <div class="col-md-8">
                                <a id="botaopesquisa" class="btn waves-effect bg-grey"><i class="material-icons">search</i>CLIQUE PARA PESQUISAR</a>
                                </div>
                            </div>
                            </div>

                            <div id="resultado"></div>



                            <?php if (isset($_GET['livroav']) && isset($_GET['folhaav'])):
$liv_av = $_GET['livroav'];
$fol_av = $_GET['folhaav'];
$nati = $_GET['nati'];
$nome = $_GET['nomeav'];
?>            
<br><br><br>


                           <div class="table-responsive" id="pesquisaaverb">

<legend><h4>AVERBAÇÕES EM LIVRO <?=$_GET['livroav']?> FOLHA <?=$_GET['folhaav']?> :</h4></legend>

                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>DATA</th>
                                            <th>COD. MOTIVO</th>
                                                <th>AVERBACAO</th>
                                                <th>###########</th>
                                                <th>EXCLUIR</th>

                                          
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>DATA</th>
                                            <th>COD. MOTIVO</th>
                                                <th>AVERBACAO</th>
                                                <th>###########</th>
                                                <th>EXCLUIR</th>

                                           
                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $bn = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = $liv_av and strFolha = $fol_av and dataObito !='' and nome = '$nome'");
                        $bn->execute(); 
                        $busca_notas =  $bn->fetchAll(PDO::FETCH_OBJ);
                        foreach($busca_notas as $b):
                         ?>
                               
                                        
                                      
                                     
                                        
                                            <td><?=date('d/m/Y', strtotime($b->dataAverbacao))?></td>
                                            <td><?=$b->strMotivoAverbacao?></td>
                                                 <td><?=$b->strAverbacao?></td>
                                              <!--td><a href="PDFS/pdf-registro-livro-averbacao-obito.php?livro=<?=$liv_av?>&folha=<?=$fol_av?>&nati=<?=$nati?> " class="col-sm-12 btn waves-effect bg-indigo"><i class="material-icons">book</i> VER REGISTRO COMPLETO</a></td-->
                                              <td><a class="btn bg-blue" href="editar-averbacao-civil.php?id=<?=$b->ID?>"><i class="material-icons">edit</i>EDITAR TEXTO</a></td>
                                               <td><a href="pesquisa-obito.php?idexclusao=<?=$b->ID?>" class="btn waves-effect bg-red">X EXCLUIR</a></td>  
                                            
                                        </tr>
                                       
                        <?php endforeach ?>
                        <?php $bo = $pdo->prepare("SELECT * FROM registro_obito_novo where LIVROOBITO = '$liv_av' and FOLHAOBITO = '$fol_av' and NOME = '$nome' and AVERBACAOTERMOANTIGO!=''");
                        $bo->execute();
                        $co = $bo->fetchAll(PDO::FETCH_OBJ);
                        foreach ($co as $b):?>
                             <tr>
                                            <td style="background: #b6b9bf">ACERVO_FISICO</td>
                                            <td style="background: #b6b9bf">ACERVO_FISICO</td>
                                                 <td><?=$b->AVERBACAOTERMOANTIGO?></td>
                                                     <td style="background: #b6b9bf">ACERVO_FISICO</td>  
                                            
                                        </tr>
                         <?php endforeach ?> 
                                    </tbody>
                                </table>
                              
                            </div>
 <?php endif ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>

    <script>
$(document).ready(function(){
$("#imgBookc").click(function(){
$("#leftsidebar").toggle();
});
$('#motivoatoisento').hide();
$('#divselobusca').hide();
$('#motivoatoisento2').hide();
$('#divselobusca2').hide();
});
</script>




    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>



    <!-- Slimscroll Plugin Js -->
    <script src="../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

    <!-- Waves Effect Plugin Js -->
    <script src="../../plugins/node-waves/waves.js"></script>

    <!-- Jquery DataTable Plugin Js -->
    <script src="../../plugins/jquery-datatable/jquery.dataTables.js"></script>
    <script src="../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
    <script src="../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>

    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>

    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>
    <script src="../../plugins/ajax/screen.js"></script>
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
<?php if (isset($_GET['id']) && $_GET['id']!='') :
                            unset($_SESSION['sucesso']);
                            unset($_SESSION['erro']);
                            $k = PESQUISA_ALL_ID('registro_obito_novo',$_GET['id']);
                            foreach ($k as $k) :
                            $nome = $k->NOME; 
                            #echo '<h1>'.$nome.'<h1>';   
                            ?>    
                            <script type="text/javascript">
                           
                            var xhttp;
                            var nome = '<?=$nome?>';
                            $('#NOME').val('<?=$nome?>');
                            xhttp = new XMLHttpRequest();
                            xhttp.onreadystatechange = function() {
                            if (this.readyState == 4 && this.status == 200) {
                            $('#resultado').html (this.responseText);
                            return;
                            }
                            else{
                            $('#resultado').html ("<h4 class='text-center'>Carregando... <br> <img src='../../images/loading_modal.gif'> </h4>");
                            return;
                            }
                            };
                            xhttp.open("POST", "pesquisa-rapida-obito.php?nome="+nome, true);
                            xhttp.send();
                       
                            </script>
                        <?php endforeach;endif ?>

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
    function redirect(ID){
      $("#print").modal();
      var id = ID;
        pdfs(id);
    }

</script>

<script type="text/javascript">
function pdfs(id){
var select = document.getElementById('docs');
var id = id;
select.onchange = function(){
if (this.value == 1 ) {
    window.open("PDFS/pdf-obito.php?id="+id);
}
if (this.value == 2 ) {
    window.open("PDFS/pdf-obito-livro.php?id="+id);
}
if (this.value == 3 ) {
    window.open("PDFS/pdf-obito-livro-auxiliar.php?id="+id);
}
if (this.value == 4 ) {
    window.open("PDFS/pdf-obito-ordem-judicial.php?id="+id);
}

if (this.value == 27 ) {
       document.getElementById('idseloseg').value = id;
    $('#seloSegundaVia').modal();
}

if (this.value == 9 ) {
    document.getElementById('id').value = id;
    //window.location="PDFS/pdf-casamento-comunicacao-noivo.php?id="+id;
    $('#enderecoCartorio').modal();
}


if (this.value == 40 ) {
    //window.location="bd_INSERTS/gerador-certidao-xml-nascimento.php?id="+id;
     document.getElementById('idseloxml').value = id;
     $('#seloxml').modal();
}

}

}

</script>

  <div class="modal fade  " id="print" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content bg-indigo">
                     <div class="alert bg-indigo alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <h2 class="text-center">
                              <i class="material-icons">print</i> IMPRESSÕES </h2>
                              <p class="text-center">
                                  <select class="form-control" id="docs">
                                    <option value="0">selecione</option>
                                    <optgroup style="background: #23db54; color:white" label="ASSENTOS E MODELOS:"></optgroup>  
                                    <option value="2"> ASSENTO DE ÓBITO </option>
                                    <option value="3"> ASSENTO DE NATIMORTO </option>  
                                      <!-- <option value="4"> ASSENTO POR ORDEM JUDICIAL </option> -->
                                       <option value="9"> COMUNICAÇÃO DE ÓBITO </option>
                                     <optgroup style="background: #23db54; color:white" label="CERTIDÕES:"></optgroup>    
                                    <option value="1"> CERTIDÃO DE ÓBITO PRIMEIRA VIA </option>
                                     <!-- <option value="27"> CERTIDÃO DE ÓBITO SEGUNDA VIA </option>
                                    <option value="40"> CERTIDÃO XML - CRC </option>         -->

                                  </select>
                              </p>

                            </div>
                    </div>
                </div>
            </div>

   <!--SELO SEGUNDA VIA |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
                            <div class="modal fade  " id="seloSegundaVia" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-sm" role="document">
                            <div class="modal-content bg-grey">
                            <div class="alert bg-grey alert-dismissible" role="alert">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="text-center">
                            <i class="material-icons">print</i> DIGITE O SELO: </h4>
                            <form method="GET" id="formsegundavia" action="PDFS/pdf-obito-segunda-via.php?id=document.getElementById('idseloseg').value">
                            <input type="hidden" id="idseloseg" name="id" >


                            <div class="col-sm-12">
                            <label class="col-md-4 control-label" for="strSelo">TIPO PAPEL:</label>
                            <div class="col-md-7"><div class="form-line">
                            <div class="form-line">
                            <select id="TIPOPAPELSEGURANCA" name="TIPOPAPELSEGURANCA" class="form-control" required="">
                            <option value="">Selecione</option>
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

                            <div class="col-sm-12">
                            <label class="col-md-4 control-label" for="strSelo">NUMERO:</label>
                            <div class="col-md-7"><div class="form-line">
                            <div class="form-line">
                            <input type="text" id="NUMEROPAPELSEGURANCA" name="NUMEROPAPELSEGURANCA" required="" class="form-control">
                            </div>
                            </div>
                            </div>
                            </div>

                            <script type="text/javascript">
                            $("#NUMEROPAPELSEGURANCA").blur(function (e) {
                            var tipo = $('#TIPOPAPELSEGURANCA').val();
                            var numpapel = $('#NUMEROPAPELSEGURANCA').val();
                            $.post('../consultas/papel-seguranca.php', {'tipo':tipo, 'numpapel':numpapel}, function(data) {
                            $("#resultado2").html(data);
                            });
                            });
                            </script>
                            <br><br>
                            <textarea class="form-control" id="TEXTOFRASECERTIDAO" name="TEXTOFRASECERTIDAO" rows="5" placeholder="ADICONAR TEXTO  AO CAMPO ANOTAÇÕES/AVERBAÇÕES"></textarea>
                            <br>


                            <div class="col-sm-12">
                            <div class="col-md-12" ><div class="form-line">
                            <input type="checkbox" id="ATOCERTELETRONICA" name="ATOCERTELETRONICA" value="S" />
                            <label for="ATOCERTELETRONICA">USAR ATO 14.5.7</label>
                            </div> </div>
                            </div>


                            <div class="col-sm-12">
                            <div class="col-md-12" ><div class="form-line">
                            <input type="checkbox" id="SELOGRATUITO" onclick="$('#motivoatoisento').toggle()" />
                            <label for="SELOGRATUITO">MARQUE CASO O ATO SEJA ISENTO</label>
                            </div> </div>
                            </div>
                            <textarea class="form-control" id="motivoatoisento" name="motivoatoisento" placeholder="MOTIVO" rows="4"></textarea>  <br><br>                    

                                
                             <div class="col-sm-12">
                    <div class="col-md-12" ><div class="form-line">
                    <input type="checkbox" id="SELOBUSCA" name="SELOBUSCA" value="S" onclick="$('#divselobusca').toggle()" />
                    <label for="SELOBUSCA">UTILIZAR SELO DE BUSCA</label>
                    </div> </div>
                    </div>

                    <div class="col-sm-12" id="divselobusca">
                        <select class="form-control" id="selobusca1" name="selobusca">
                            <option value="">SELECIONE</option>
                            <option value="14.6.1">Das buscas: - Até dois anos</option>
                            <option value="14.6.2">Das buscas: - Até cinco anos</option>
                            <option value="14.6.3">Das buscas: - Até dez anos</option>
                            <option value="14.6.4">Das buscas: - Até quinze anos</option>
                            <option value="14.6.5">Das buscas: - Até vinte anos</option>
                            <option value="14.6.6">Das buscas: - Até trinta anos</option>
                            <option value="14.6.7">Das buscas: - Até cinquenta anos</option>
                            <option value="14.6.8">Das buscas: - Acima de cinquenta anos</option>
                        </select>
                    <br><br>
                    </div>
                            <!--button type="subimit" class="text-center btn waves-effect bg-black">SALVAR</button-->
                            <a class="text-center btn waves-effect bg-black" id="botaosalvarsegundavia">SALVAR</a>
                            <a onclick="var id = $('#idseloseg').val();
                            window.open('PDFS/preview-pdf-obito.php?id='+id+'&TEXTOFRASECERTIDAO='+$('#TEXTOFRASECERTIDAO').val());
                            "  class="btn waves-effect bg-orange">PRÉ-VISUALIZAR <i class="material-icons">search</i></a>
                            </form>

                            </div>
                            </div>
                            </div>
                            </div>
                            <script type="text/javascript">
                            $("#modalselo").click(function(){
                            $("#modalselosegundavia").modal();
                            });
                            </script>

<!--SELO SEGUNDA VIA |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->
 <div class="modal fade  " id="enderecoCartorio" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content bg-grey">
                     <div class="alert bg-grey alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <h4 class="text-center">
                              <i class="material-icons">print</i> ENDEREÇADO A: </h4>
                            <form method="GET" action="PDFS/pdf-obito-comunicacao.php?id= document.getElementById('id').value">
                                <input type="hidden" id="id" name="id" >
                                <label>Razão Social Cartório</label>
                                <input type="text" name="enderecocart" class="form-control">

                                <label>Cidade:</label>
                                <input class="form-control" type="text" name="cidadecart">

                                <label>Estado:</label>
                                <input class="form-control" type="text" name="estadocart">
                                <br>
                                <legend>REGISTRADO NO LIVRO A:</legend>
                                <label>Livro:</label>
                                <input class="form-control" type="text" name="livroa">

                                <label>Folha:</label>
                                <input class="form-control" type="text" name="folhaa">

                                <label>Termo:</label>
                                <input class="form-control" type="text" name="termoa">

                                <button  type="subimit" class="text-center btn waves-effect bg-black">GERAR</button>
                            </form>

                            </div>
                    </div>
                </div>
            </div>
             <script type="text/javascript">
                $('#botaosalvarsegundavia').click(function(){
                                
                                    
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

                               
                                    $('#formsegundavia').submit();
                                //window.location.reload();
                                }
                                );
                                

                                });

           </script>



<script type="text/javascript">
    
    $('#botaopesquisa').click(function(){
        if ($('#NOME').val()!='') {
            var xhttp;
            var nome = $('#NOME').val();
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            $('#resultado').html (this.responseText);
            return;
            }
            else{
            $('#resultado').html ("<h4 class='text-center'>Carregando... <br> <img src='../../images/loading_modal.gif'> </h4>");
            return;
            }
            };
            xhttp.open("POST", "pesquisa-rapida-obito.php?nome="+nome, true);
            xhttp.send();

        }
        

        else if ($('#CPF').val()!='') {
            var xhttp;
            var nome = $('#CPF').val();
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            $('#resultado').html (this.responseText);
            return;
            }
            else{
            $('#resultado').html ("<h4 class='text-center'>Carregando... <br> <img src='../../images/loading_modal.gif'> </h4>");
            return;
            }
            };
            xhttp.open("POST", "pesquisa-rapida-obito.php?cpf="+nome, true);
            xhttp.send();

        }

        else if ($('#LIVRO').val()!='') {
            var xhttp;
            var nome = $('#LIVRO').val();
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            $('#resultado').html (this.responseText);
            return;
            }
            else{
            $('#resultado').html ("<h4 class='text-center'>Carregando... <br> <img src='../../images/loading_modal.gif'> </h4>");
            return;
            }
            };
            xhttp.open("POST", "pesquisa-rapida-obito.php?livro="+nome, true);
            xhttp.send();

        }

        else if ($('#FOLHA').val()!='') {
            var xhttp;
            var nome = $('#FOLHA').val();
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            $('#resultado').html (this.responseText);
            return;
            }
            else{
            $('#resultado').html ("<h4 class='text-center'>Carregando... <br> <img src='../../images/loading_modal.gif'> </h4>");
            return;
            }
            };
            xhttp.open("POST", "pesquisa-rapida-obito.php?folha="+nome, true);
            xhttp.send();

        }


        else if ($('#TERMO').val()!='') {
            var xhttp;
            var nome = $('#TERMO').val();
            xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
            $('#resultado').html (this.responseText);
            return;
            }
            else{
            $('#resultado').html ("<h4 class='text-center'>Carregando... <br> <img src='../../images/loading_modal.gif'> </h4>");
            return;
            }
            };
            xhttp.open("POST", "pesquisa-rapida-obito.php?termo="+nome, true);
            xhttp.send();

        }


        else{
           swal("Não Encontrado!", "Digite um valor válido para pesquisar", "error");
           $('#resultado').html ("<h4 class='text-center bg-red'>Não encontrado, digite um valor válido para a busca </h4>");
        }

    });
</script>

<?php if (isset($_GET['pesquisa'])): ?>
    <script type="text/javascript">
            $('#NOME').val("<?=$_GET['pesquisa']?>");
    </script>
<?php endif ?>
























            <div class="modal fade  " id="seloxml" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-sm" role="document">
            <div class="modal-content bg-grey">
            <div class="alert bg-grey alert-dismissible" role="alert">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="text-center">
            <i class="material-icons">print</i>INFORMACÕES: </h4>
            <form method="GET" id="formsegundaviaxml" action="PDFS/pdf-obito-segunda-via.php?id=document.getElementById('idseloxml').value">
            <input type="hidden" id="idseloxml" name="id" >



            <div class="col-sm-12">
            <label class="col-md-4 control-label" for="strSelo">CÓDIGO DO PEDIDO:</label>
            <div class="col-md-7"><div class="form-line">
            <div class="form-line">
            <input type="text" id="CODIGOPEDIDOXML" name="CODIGOPEDIDOXML" required="" class="form-control">
            </div>
            </div>
            </div>
            </div>
            <br><br>

            <input type="hidden" name="TIPOPAPELSEGURANCA" value="0">
            <input type="hidden" name="NUMEROPAPELSEGURANCA" value="0">
            <input type="hidden" name="xmlcertidao" value="ok">

            <div class="col-sm-12">
            <div class="col-md-12" ><div class="form-line">
            <input type="checkbox" id="SELOGRATUITO2" onclick="$('#motivoatoisento2').toggle()" />
            <label for="SELOGRATUITO2">MARQUE CASO O ATO SEJA ISENTO</label>
            </div> </div>
            </div>
            <textarea class="form-control" id="motivoatoisento2" name="motivoatoisento" placeholder="MOTIVO" rows="4"></textarea>  <br><br>

            <div class="col-sm-12">
            <div class="col-md-12" ><div class="form-line">
            <input type="checkbox" id="SELOBUSCA2" name="SELOBUSCA2" value="S" onclick="$('#divselobusca2').toggle()" />
            <label for="SELOBUSCA2">UTILIZAR SELO DE BUSCA</label>
            </div> </div>
            </div>

            <div class="col-sm-12" id="divselobusca2">
            <select class="form-control" id="selobusca1" name="selobusca">
            <option value="">SELECIONE</option>
            <option value="14.6.1">Das buscas: - Até dois anos</option>
            <option value="14.6.2">Das buscas: - Até cinco anos</option>
            <option value="14.6.3">Das buscas: - Até dez anos</option>
            <option value="14.6.4">Das buscas: - Até quinze anos</option>
            <option value="14.6.5">Das buscas: - Até vinte anos</option>
            <option value="14.6.6">Das buscas: - Até trinta anos</option>
            <option value="14.6.7">Das buscas: - Até cinquenta anos</option>
            <option value="14.6.8">Das buscas: - Acima de cinquenta anos</option>
            </select>
            <br><br>
            </div>

            <a class="text-center btn waves-effect bg-black" id="botaosalvarxmlcert">SALVAR</a>
            </form>

            </div>
            </div>
            </div>
            </div>
   <script type="text/javascript">
                $('#botaosalvarxmlcert').click(function(){
                                
                                    
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

                               
                                    $('#formsegundaviaxml').submit();
                                //window.location.reload();
                                }
                                );
                                

                                });

           </script>         



           <script type="text/javascript">
               $('#ATOCERTELETRONICA').click(function(){
                if ($('#ATOCERTELETRONICA').is(":checked") == true ){
                    $('#ATOCERTELETRONICA').prop("checked", false);
                    swal({
                                title: "Alterar o ato para esta certidão?",
                                text: "Tem certeza de que deseja alterar o ato praticado nesta emissão de certidão para o '14.5.7'?",
                                type: "warning",
                                confirmButtonClass: "bg-green",
                                confirmButtonText: "SIM!",
                                showCancelButton: true,
                                cancelButtonText:'NÃO, CANCELE!',
                                cancelButtonClass: 'bg-red',
                                showLoaderOnConfirm: true,
                                closeOnConfirm: true

                                },
                                function(){
                                    $('#ATOCERTELETRONICA').prop("checked", true);

                                }
                                );
                    }

               });
           </script>










</body>

</html>
