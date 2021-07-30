<?php session_start();
unset($_SESSION['SELOOLD']);
include('header.php');
include('menu.php');
  ?>

    <section class="content"  style="margin-left: 30px!important" >
        <div class="container-fluid">
            <div class="block-header">
                <h2>
                    PESQUISAR Pessoas:
                    <small>Digite a busca:<a href="https://datatables.net/" target="_blank"></a></small>
                </h2>
            </div>
            <!-- Basic Examples -->
            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                           Arquivo de Pessoas
                            </h2>
                           
                        </div>
                        <div class="body">
                      <p class="text-center">
                                <img id="img" src="" style=" width: 10%">
                                 </p>
                        <div class="row">
                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">NOME:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NOME" id="NOME" class="form-control"  placeholder="">
                                    </div>
                                </div>

                                <div class="col-sm-4">
                                    <label class="col-md-4 control-label">CPF:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="CPF" id="CPF" class="form-control cpf"  placeholder="">
                                    </div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="col-md-4 control-label">RAZÃO SOCIAL:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="RAZAOSOCIAL" id="RAZAOSOCIAL" class="form-control"  placeholder="">
                                    </div>
                                </div>


                                <div class="col-sm-4">
                                    <label class="col-md-4 control-label">NUM. FICHA:</label>
                                    <div class="col-md-8">
                                        <input type="text" name="NUMFICHA" id="NUMFICHA" class="form-control"  placeholder="">
                                    </div>
                                </div>


                                <div class="col-sm-2">
                                    <button class="btn bg-grey waves-effect"><i class="material-icons">search</i></button>
                                </div>





                                          <script>


$('#NOME').blur(function(){
showCustomer($('#NOME').val(),'');
});

function showCustomer(nome,cpf) {
  var xhttp;
  var nome = nome;
  var cpf = cpf;

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


  xhttp.open("POST", "busca-rapida-pessoas-migracao.php?nome="+nome, true);
  xhttp.send();
}
</script>



                                          <script>


$('#CPF').blur(function(){
showCustomer2($('#CPF').val(),'');
});

function showCustomer2(nome,cpf) {
  var xhttp;
  var nome = nome;
  var cpf = cpf;

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


  xhttp.open("POST", "busca-rapida-pessoas-migracao.php?cpf="+nome, true);
  xhttp.send();
}
</script>


                                          <script>


$('#RAZAOSOCIAL').blur(function(){
showCustomer3($('#RAZAOSOCIAL').val(),'');
});

function showCustomer3(nome,cpf) {
  var xhttp;
  var nome = nome;
  var cpf = cpf;

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


  xhttp.open("POST", "busca-rapida-pessoas-migracao.php?razaoSocial="+nome, true);
  xhttp.send();
}
</script>




                                          <script>


$('#NUMFICHA').blur(function(){
showCustomer12($('#NUMFICHA').val(),'');
});

function showCustomer12(nome,cpf) {
  var xhttp;
  var nome = nome;
  var cpf = cpf;

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


  xhttp.open("POST", "busca-rapida-pessoas-migracao.php?numficha="+nome, true);
  xhttp.send();
}
</script>



                        </div>


                        <div id="resultado"></div>

                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Exportable Table -->
        </div>
    </section>

    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
      <script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>

    <script>
$(document).ready(function(){
$("#imgBookc").click(function(){
$("#leftsidebar").toggle();
});
$('#motivoatoisento').hide();
$(".cpf").inputmask("999.999.999-99");
});
</script>


    <!-- Bootstrap Core Js -->
    <script src="../../plugins/bootstrap/js/bootstrap.js"></script>

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




<script type="text/javascript">
    function cartAssinatura(id,tipo,temselo) {
var temselo = temselo;      
if (temselo =='S') {$('#botaoreimpressao').show();$('#botaogerarnovo').show();$('#salvarcartao').hide();}
else{$('#botaoreimpressao').hide(); $('#botaogerarnovo').hide();$('#salvarcartao').show()}      
$('#selopessoafisica').modal();$('#idselofsc').val(id);}

</script>

             <div class="modal fade  " id="selopessoafisica" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content bg-grey">
                     <div class="alert bg-grey alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <h4 class="text-center">
                              <i class="material-icons">print</i> CARTÃO DE ASSINTAURA: </h4>
                            <form method="GET" id="formcartao" action="PDFS/pdf-pessoa-fisica.php?id=document.getElementById('idselofsc').value">
                                   <input type="hidden" id="idselofsc" name="id" >


                    <div class="col-sm-12">
                    <div class="col-md-12" ><div class="form-line">
                    <input type="checkbox" id="SELOGRATUITO" onclick="$('#motivoatoisento').toggle()" />
                    <label for="SELOGRATUITO">MARQUE CASO O ATO SEJA ISENTO</label>
                    </div> </div>
                    </div>
                    <textarea class="form-control" id="motivoatoisento" name="motivoatoisento" placeholder="MOTIVO" rows="4"></textarea>  <br><br>

                    <!--div class="col-sm-12">
                    <div class="col-md-12" ><div class="form-line">
                    <input type="checkbox" id="reimpressao" name="reimpressao"  value="S" />
                    <label for="reimpressao">ESTOU REIMPRIMINDO A FICHA POR CONTA DE ALGUM PROBLEMA</label>
                    </div> </div>
                    </div-->

                    <a onclick="window.open('PDFS/pdf-pessoa-fisica.php?reimpressao=S&id='+document.getElementById('idselofsc').value)" id="botaoreimpressao" class="btn waves-effect bg-red col-sm-12"><i class="material-icons">print</i> REIMPRIMIR CARTÃO</a>
                    <br><br><br>

<script type="text/javascript">
    $('#ACERVOFISICO').click(function(){
if ($(this).is(":checked") == false ) {$('#strSelo').val('');}
else{$('#strSelo').val(' ');}

    });
</script>

                                <a id="botaogerarnovo" class="text-center btn waves-effect bg-indigo">GERAR NOVO CARTÃO</a>
                               <a id="salvarcartao" class="text-center btn waves-effect bg-black">SALVAR</a>
                            </form>

                            </div>
                    </div>
                </div>
            </div>


<div class="modal fade" id="seloCadastroModal" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button onclick="$('#selopessoafisica').modal();" type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">SELOS:</h4>
                        </div>
                        <div class="modal-body">
          <div class="body">
                      <p class="text-center">
                                <img id="img" src="" style=" width: 10%">
                                 </p>
                            <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>


                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>


                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $bn = $pdo->prepare("SELECT * FROM selo_fisico_uso WHERE  tipo = 'CAD' and status = 'L' or tipo ='GRA' and status = 'L' ");
                        $bn->execute();
                        $busca_notas = $bn->fetchAll(PDO::FETCH_OBJ);
                        foreach($busca_notas as $b):
                         ?>
                                      <tr  >


                                            <td><?=$b->selo?></td>
                                            <td><?=$b->strCartela?></td>
                                            <td><span class="badge
                                                <?php if ($b->tipo =='GER'): ?>
                                                    bg-indigo
                                                 <?php else: ?>
                                                 bg-pink
                                                <?php endif ?>
                                                "><?=$b->tipo?></span></td>
                                            <td>
                                            <?php if ($b->status == 'L'): ?>
                                            <span class="badge bg-green">LIVRE</span>
                                        <?php else: ?>
                                                 <span class="badge bg-red">USADO</span>
                                            <?php endif ?>



                                            </td>
                                            <!--td><?=date('d/m/Y', strtotime($b->dataNascimento))?></td-->

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

<script type="text/javascript">
    $('#modalselo,#modalselo1').click(function(){
$('#seloCadastroModal').modal();
    });
</script>



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


<?php if (isset($_SESSION['sucesso'])):?>
<script> $("#sucesso").modal();</script>

<?php
unset($_SESSION['sucesso']);
endif ?>


<?php if (isset($_SESSION['erro'])):?>
<script> $("#erro").modal();</script>

<?php
unset($_SESSION['erro']);
endif ?>

              <div class="modal fade  " id="exibecoisas" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content bg-black">
                     <div class="alert bg-black alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <h2 class="text-center">
                              <i class="material-icons">book</i>
                             </h2>

                                <p  class="text-center"> <img id="coisas" src=""> </p>

                            </div>
                    </div>
                </div>
            </div>


     <script type="text/javascript">
                                 function exibircoisas(coisa){
                                    $('#exibecoisas').modal();
                                    $('#coisas').html('<p id="coisas" class="text-center">' +coisa+'</p>');
                                 }
                             </script>


<script type="text/javascript">
  $(document).ready(function(){
    $('#botaoreimpressao').hide();
    $('botaogerarnovo').hide();
  });
</script>

</body>

</html>
