<?php include('../controller/db_functions.php');
session_start();
$pdo = conectar();
unset($_SESSION['SELOOLD']);
include('header.php');
include('menu.php');
?>


    <section class="content" style="margin-left: 30px"  >

      <div class="container-fluid">
        
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        <form class="form-horizontal" id="form1" method="POST" action="config-xml-teste.php" enctype="multipart/form-data" >
        <div class="header">
        <h2 class="col-md-6">Ler arquivo xml</h2>
       

        
          <label for="arquivo_xml" class="col-sm-6">
        <label for="arquivo_xml" class="col-md-4"><i class="material-icons">cloud_upload</i>IMPORTAR ARQUIVO XML</a></label>
        <div class="col-md-8">
        <input type="file" name="arquivo_xml" id="arquivo_xml" class="btn bg-blue form-control " style="padding: 30px;" >
        </div>
        </label>
       
        <br><br>

      
        <div class="body">
    
                           <div class="row">
                             <div class="col-sm-10"></div>
                             <a id="botaoavancarform1" class="btn bg-green"><i class="material-icons">forward</i>AVANÇAR</a>
                           </div>








                           
                         
                                
                      


</form>


</div>


</div>
</section>



<!-- fim da 1 ####################################################################################################################-->




<script type="text/javascript">
    $(document).ready(function(){
  $("#cpf").inputmask("000.000.000-00");
  $("#dnv").inputmask("99-99999999-9");
  $('#motivoatoisento').hide();
  $('#motivoatoisento2').hide();

  $('#form2').css('opacity','.4');
  $('#form2 input').prop('disabled', true);
});


$('#form2').click(function(){
swal('NÃO DISPONÍVEL','A IMPORTAÇÃO DE CERTIDÕES DE INTEIRO TEOR, ENCONTRA-SE EM DESENVOLVIMENTO, AGUARDE AS PRÓXIMAS ATUALIZAÇÕES', 'warning');
});
</script>


    <!-- Jquery Core Js -->
    <script src="../../plugins/jquery/jquery.min.js"></script>
    <script>
$(document).ready(function(){
$("#imgBookc").click(function(){
$("#leftsidebar").toggle();
});
});
</script>

<?php if (isset($_SESSION['sucesso'])):?>
<script> 
swal('SUCESSO','<?=str_replace("<br>", " ", $_SESSION['sucesso'])?>','success');
//$("#sucesso").modal();</script>

<?php
unset($_SESSION['sucesso']);
endif ?>


<?php if (isset($_SESSION['erro'])):?>
<script> 
swal('ERRO','<?=$_SESSION['erro']?>','error');
//$("#erro").modal();</script>

<?php
unset($_SESSION['erro']);
endif ?>


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
  <!-- Input Mask Plugin Js -->
    <script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $(".cpf").inputmask("999.999.999-99");
   $(".rg").inputmask("999999999999-9/AAA-AA");
   $('#apresentantedados').hide();
   $('#sacadodados').hide();
   $('#cedentedados').hide();
   $('#sacadordados').hide();
   $('#avalistadados').hide();
   $('#demaissacadosdados').hide();
   
});
</script>


    <!-- Custom Js -->
    <script src="../../js/admin.js"></script>
    <script src="../../js/pages/tables/jquery-datatable.js"></script>
    <script src="../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
    <!-- Demo Js -->
    <script src="../../js/demo.js"></script>

    <script src="protesto.js"></script>
    <script>

    $(function () {
          $("#seloGratuito").click(function () {
              if ($(this).is(":checked")) {
                  $("#dvJustificativa").show();
                  $("#AddBranco").hide();
              } else {
                  $("#dvJustificativa").hide();
                  $("#AddBranco").show();
              }
          });
      });
  </script>


    <script>

    $(function () {
          $("#selocliente").click(function () {
              if ($(this).is(":checked")) {
                  $("#dvJustificativa").show();
                  $("#AddBranco").hide();
              } else {
                  $("#dvJustificativa").hide();
                  $("#AddBranco").show();
              }
          });
      });
  </script>
   <script>

    $(function () {
          $("#selocartorio").click(function () {
              if ($(this).is(":checked")) {
                  $("#dvJustificativa").show();
                  $("#AddBranco").hide();
              } else {
                  $("#dvJustificativa").hide();
                  $("#AddBranco").show();
              }
          });
      });
  </script>



  <script src="../../plugins/tinymce/tinymce.js"></script>
 <script>
    tinymce.init({
    selector: '#strTextoviaCartorio'
    });
    </script>
    <script>
    tinymce.init({
    selector: '#strTextoviaCliente'
    });
    </script>

  <script>

  $(function () {
        $("#seloGratuito2").click(function () {
            if ($(this).is(":checked")) {
                $("#dvJustificativa2").show();
                $("#AddBranco2").hide();
            } else {
                $("#dvJustificativa2").hide();
                $("#AddBranco2").show();
            }
        });
    });
</script>

<script type="text/javascript">
    $('#botaoinfo1').click(function(){
        $('#info1').modal();
    });
      $('#botaoinfo2').click(function(){
        $('#info2').modal();
    });
       $('#botaoinfo3').click(function(){
        $('#info3').modal();
    });

</script>


 <div class="modal fade  " id="info1" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                 <div class="modal-content bg-grey">
                                    <div class="alert bg-grey alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <b>
                                C – para Cédula de Crédito Bancário por Indicação, e que o Credor declara estar de posse da sua única via negociável desta CCB – Art. 41 da Lei 10.931, de 02/08/2004.
                                <br><br><br>
                                D – para DMI ou DSI sem aceite ou DSI com emissão de Nota Fiscal Eletrônica, com endosso MANDATO, com declaração do beneficiário ao portador, conforme transcrição a seguir:
                                “O Apresentante, como mero mandatário, agindo por conta e risco do representado, declara, sob as penas da lei, que os documentos originais ou suas cópias autenticadas, comprobatórios
                                da causa do saque, da entrega e do recebimento da mercadoria correspondente ou da efetiva prestação do serviço, são mantidos em poder do beneficiário, que compromete-se a exibi-los,
                                sempre que exigidos, no lugar onde for determinado, especialmente se sobrevir sustação judicial do protesto. O banco, como mero mandatário, alega possuir a declaração do beneficiário
                                nesse sentido.”
                                <br><br><br>
                                B – Para demais espécies de títulos, e exclusivamente para o Estado do Rio de Janeiro, com declaração do beneficiário ao portador, conforme transcrição a seguir:
                                “Declaro a garantia da origem e integridade do documento digitalizado, bem como a sua posse, comprometendo-me a exibi-lo, sempre que exigido, especialmente na hipótese de sustação
                                judicial do protesto”.
                                A – para os demais títulos, e demais estados com obrigatoriedade de apresentação física de documentação para protesto
                                <br><br><br>
                                T – para títulos com endosso TRANSLATIVO, e que o Portador faz a seguinte declaração: O Apresentante declara, sob as penas da lei, que os documentos originais ou suas cópias
                                autenticadas, comprobatórios da causa do saque, da entrega e do recebimento da mercadoria correspondente ou da efetiva prestação do serviço, são mantidos em seu poder,
                                comprometendo-se a exibi-los, sempre que exigidos, no lugar onde for determinado, especialmente se sobrevir sustação judicial do protesto.
                                <br><br><br>
                                R – para títulos com endosso TRANSLATIVO, onde o Portador deve encaminhar carta ao Cartório, solicitando a intimação/protesto do sacador/beneficiário, para fins de garantir o direito de
                                regresso, informando a identificação de quem deva ser intimado/protestado, conforme o anexo II.
                                <br><br><br>
                                P – para EC, significando que o Banco possui autorização do Condomínio para o envio a protesto dos encargos condominiais, bem como que o Condomínio declarou, sob as penas da
                                Lei, que:
                                a) o condomínio edilício está regularmente constituído, nos termos da Lei nº 4.591/64 e art. 1.332 do Código Civil;
                                b) o valor da quota de rateio das despesas condominiais foram aprovadas em assembleia geral;
                                c) o Condomínio está de posse da ata da assembleia que aprovou o valor da quota de rateio e também da ata da assembleia que elegeu o síndico ou da ata da assembleia que autorizou
                                a transferência dos poderes de representação ou as funções administrativas para a Administradora (art. 1.348, § 2º, do Código Civil), e obriga-se a apresentá-las onde e quando
                                exigidos, especialmente se sobrevier a sustação judicial do protesto;
                                d) a pessoa indicada como condômino-devedor é realmente a responsável pelo obrigação condominial inadimplida, sendo certo que, na hipótese de a unidade condominial estar
                                alugada ou dada em comodato a outrem, o proprietário ou possuidor foi cientificado de que o débito seria
                                encaminhado a protesto.
                             </b>

</div>
</div>
</div>
</div>


 <div class="modal fade  " id="info2" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                 <div class="modal-content bg-grey">
                                    <div class="alert bg-grey alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <b>
                                    1 - Pago. <hr>
                                    2 - Protestado. <hr>
                                    3 - Retirado. <hr>
                                    4 - Sustado. <hr>
                                    5 - Devolvido pelo Cartório por irregularidade – Sem custas. <hr>
                                    Quando o cartório não cobrar custas quando da devolução do título por irregularidade. <hr>
                                    6 - Devolvido pelo Cartório por irregularidade – Com custas. <hr>
                                    7 - Liquidação em Condicional - Utilizada para os títulos liquidados em Cartório com cheque do próprio devedor – Esta ocorrência é utilizada
                                    apenas para os cartórios que repassam ao banco o cheque do próprio devedor. <hr>
                                    8 - Título Aceito – Utilizado para Letras de Câmbio e Duplicatas, para aceite do pagador. <hr>
                                    9 - Edital, apenas nos Estados da Bahia e Rio de Janeiro. <hr>
                                    A - Protesto do banco cancelado <hr>
                                    B - Protesto já efetuado <hr>
                                    C - Protesto por edital <hr>
                                    D - Retirada por edital <hr>
                                    E - Protesto de terceiro cancelado <hr>
                                    F - Desistência do protesto por liquidação bancária <hr>
                                    G - Sustado Definitivo <hr>
                                    I - Emissão da 2ª via do Instrumento do Protesto <hr>
                                    K - Devolução de despesas cartorárias cobradas indevidamente para crédito ao beneficiário. <hr>
                                    J - Cancelamento já efetuado anteriormente <hr>
                                    X - Cancelamento não efetuado <hr>

                             </b>

</div>
</div>
</div>
</div>
 <div class="modal fade  " id="info3" tabindex="-1" role="dialog">
                            <div class="modal-dialog modal-lg" role="document">
                                 <div class="modal-content bg-grey">
                                    <div class="alert bg-grey alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                 <b>
                                    01 Data da apresentação inferior à data de vencimento.  <hr>
                                    02 Falta de comprovante da prestação de serviço.  <hr>
                                    03 Nome do pagador incompleto/incorreto.  <hr>
                                    04 Nome do beneficiário incompleto/incorreto.  <hr>
                                    05 Nome do sacador incompleto/incorreto.  <hr>
                                    06 Endereço do pagador insuficiente.  <hr>
                                    07 CNPJ/CPF do pagador inválido/incorreto <hr>
                                    08 CNPJ/CPF incompatível c/ o nome do pagador/sacador/avalista  <hr>
                                    09 CNPJ/CPF do pagador incompatível com o tipo de documento.  <hr>
                                    10 CNPJ/CPF do sacador incompatível com a espécie.  <hr>
                                    11 Título aceito sem a assinatura do pagador.  <hr>
                                    12 Título aceito rasurado ou rasgado.  <hr>
                                    13 Título aceito – falta título (ag ced: enviar).  <hr>
                                    14 CEP incorreto.  <hr>
                                    15 Praça de pagamento incompatível com endereço.  <hr>
                                    16 Falta número do título.  <hr>
                                    17 Título sem endosso do beneficiário ou irregular.  <hr>
                                    18 Falta data de emissão do título.  <hr>
                                    19 Título aceito: valor por extenso diferente do valor por numérico.  <hr>
                                    20 Data de emissão posterior ao vencimento. <hr>
                                    21 Espécie inválida para protesto <hr>
                                    22 CEP do pagador incompatível com a praça de protesto. <hr>
                                    23 Falta espécie do título. <hr>
                                    24 Saldo maior que o valor do título.
                                    25 Tipo de endosso inválido. <hr>
                                    26 Devolvido por ordem judicial <hr>
                                    27 Dados do título não conferem com disquete <hr>
                                    28 Pagador e Sacador/Avalista são a mesma pessoa <hr>
                                    29 Corrigir a espécie do título <hr>
                                    30 Aguardar um dia útil após o vencimento para protestar <hr>
                                    31 Data do vencimento rasurada <hr>
                                    32 Vencimento – extenso não confere com número <hr>
                                    33 Falta data de vencimento no título <hr>
                                    34 DM/DMI sem comprovante autenticado ou declaração <hr>
                                    35 Comprovante ilegível para conferência e microfilmagem <hr>
                                    36 Nome solicitado não confere com emitente ou pagador <hr>
                                    37 Confirmar se são 2 emitentes. Se sim, indicar os dados dos 2 <hr>
                                    38 Endereço do pagador igual ao do sacador ou do portador <hr>
                                    39 Endereço do apresentante incompleto ou não informado  <hr>
                                    40 Rua / Número inexistente no endereço  <hr>
                                    41 Informar a qualidade do endosso (M ou T)  <hr>
                                    42 Falta endosso do favorecido para o apresentante al <hr>
                                    43 Data da emissão rasurada  <hr>
                                    44 Protesto de cheque proibido – motivo 20/25/28/30 ou 35  <hr>
                                    45 Falta assinatura do emitente no cheque  <hr>
                                    46 Endereço do emitente no cheque igual ao do banco pagador  <hr>
                                    47 Falta o motivo da devolução no cheque ou motivo ilegível  <hr>
                                    48 Falta assinatura do sacador no título  <hr>
                                    49 Nome do apresentante não informado/incompleto/incorreto es <hr>
                                    50 Erro de preenchimento do título  <hr>
                                    51 Título com direito de regresso vencido  <hr>
                                    52 Título apresentado em duplicidade  <hr>
                                    53 Título já protestado <hr>
                                    54 Letra de Câmbio vencida – falta aceite do pagador <hr>
                                    55 Título – falta tradução por tradutor público <hr>
                                    56 Falta declaração de saldo assinada no título <hr>
                                    57 Contrato de Câmbio – falta conta gráfica <hr>
                                    58 Ausência do Documento Físico <hr>
                                    59 Pagador Falecido <hr>
                                    60 Pagador Apresentou Quitação do Título <hr>
                                    61 Título de outra jurisdição territorial <hr>
                                    62 Título com emissão anterior à concordata do pagador <hr>
                                    63 Pagador consta na lista de falência <hr>
                                    64 Apresentante não aceita publicação de edital <hr>
                                    65 Dados do sacador em branco ou inválido <hr>
                                    66 Titulo sem autorização para protesto por edital <hr>
                                    67 Valor divergente entre título e comprovante <hr>
                                    68 Condomínio não pode ser protestado para fins falimentares <hr>
                                    69 Vedada a intimação por edital para protesto falimentar  <hr>
                                    70 Dados do Beneficiário em branco ou inválido <hr>
                                    71 CNPJ/CPF do beneficiário incompatível com a espécie <hr>


 




</div>
</div>
</div>
</div>


                    </div>
                </div>
            </div>


<?php if (isset($_GET['id_update'])): ?>
  <script type="text/javascript">
    $(document).ready(function(){
      PREENCHERDADOS();
    });
  </script>
<?php endif ?>
<input type="hidden" id="tipomodalPessoa">

<script type="text/javascript">
  function dinheiro(i) {
var v = i.value.replace(/\D/g,'');
v = (v/100).toFixed(2) + '';
v = v.replace(".", ".");
v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
i.value = v;
}
</script>



<script type="text/javascript">
  
  $('.form-control').blur(function(){
    if ($(this).prop("required") ==  true && $(this).val() == '') {
      $(this).css("background", 'red');
       $(this).css("color", 'white');
        $(this).prop("placeholder", 'este campo é obrigatório');
        swal('ERRO', 'O CAMPO "'+ $(this).attr('id')+ '" É OBRIGATÓRIO', 'error');
    }
    else{
      $(this).css("background", 'none');
       $(this).css("color", 'black');
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
  $('#arquivo_xml').blur(function(){if($(this).val()!='') {
       verificaExtensaoArquivo($(this).val());
       $('.manual').prop('disabled',true);
       $('#divmanual').hide();
     }
    });

function verificaExtensaoArquivo(arquivo) { 
extensoes_permitidas = new Array(".XML", ".xml"); 
extensao = (arquivo.substring(arquivo.lastIndexOf("."))).toLowerCase();
permite = false;   
$(extensoes_permitidas).each(function(i){
if (extensoes_permitidas[i] == extensao) {

permite = true; 
return false; 

} 

});
if(!permite){
swal("Ops!", "Somente a extensão XML é aceita, a extensão '"+extensao+"' não é aceita!", "error");
return false;  
$('#arquivo_xml').val();
} 
return true;      
} 



$('input[type="date"]').blur(function(){

        var teste = $(this).val();

        if (teste.length>10) {
            
            swal("Ops!", "Data digitada está incorreta!", "error");
        }
    });    
</script>




<script src="../../plugins/jquery-validation/jquery.validate.js"></script>
































            <script type="text/javascript">
                $('#botaoavancarform1').click(function(){
                                
                                    
                                swal({
                                title: "Deseja realmente avançar?",
                                text: "Selo de materialização de certidão será gerado, Tem certeza de que deseja prosseguir?",
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

                                 
                                    $('#form1').submit();
                                //window.location.reload();
                                }
                                );
                                

                                });

           </script>         


                  <script type="text/javascript">
                $('#botaoavancarform2').click(function(){
                                
                                    
                                swal({
                                title: "Deseja realmente avançar?",
                                text: "Selo de materialização de certidão será gerado, Tem certeza de que deseja prosseguir?",
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

                               
                                    $('#form2').submit();
                                //window.location.reload();
                                }
                                );
                                

                                });

           </script>         







</body>

</html>
