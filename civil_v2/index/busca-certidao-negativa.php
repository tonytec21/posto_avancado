<?php 
include('../controller/db_functions.php');
$pdo = conectar();

$tabela = "registro_nascimento_novo";



$TIPOBUSCA = $_GET['TIPOBUSCA'];
$CPFBUSCA = $_GET['CPFBUSCA'];
$NOMEBUSCA = $_GET['NOMEBUSCA'];


if ($TIPOBUSCA == '1') {
$tabela = "registro_nascimento_novo";
$query = "SELECT ID, NOMENASCIDO FROM $tabela where NOMENASCIDO = '$NOMEBUSCA' ";
$query .= "UNION SELECT ID, CPFNASCIDO FROM $tabela where CPFNASCIDO = '$CPFBUSCA'";
$busca = $pdo->prepare($query);
$busca->execute();
if ($busca->rowCount()>0) {
die('<script>notify("danger", "NÃO SERÁ POSSÍVEL A EMISSÃO, FOI ENCONTRADO REGISTRO COM ESTES DADOS","");</script>');
} 
}


elseif ($TIPOBUSCA == '2') {
$tabela = "registro_casamento_novo";
$query = "SELECT ID, LIVROCASAMENTO FROM $tabela where NOMENUBENTE1 = '$NOMEBUSCA' ";
$query .= "SELECT ID, LIVROCASAMENTO FROM $tabela where NOMENUBENTE2 = '$NOMEBUSCA' ";
$query .= "UNION SELECT ID, LIVROCASAMENTO FROM $tabela where CPFNUBENTE1 = '$CPFBUSCA'";
$query .= "UNION SELECT ID, LIVROCASAMENTO FROM $tabela where CPFNUBENTE2 = '$CPFBUSCA'";
$busca = $pdo->prepare($query);
$busca->execute();
if ($busca->rowCount()>0) {
die('<script>notify("danger", "NÃO SERÁ POSSÍVEL A EMISSÃO, FOI ENCONTRADO REGISTRO COM ESTES DADOS","");</script>');
} 
}


elseif ($TIPOBUSCA == '3') {
$tabela = "registro_obito_novo";
$query = "SELECT ID, LIVROOBITO FROM $tabela where NOME = '$NOMEBUSCA' ";
$query .= "UNION SELECT ID, LIVROOBITO FROM $tabela where CPF = '$CPFBUSCA'";
$busca = $pdo->prepare($query);
$busca->execute();
if ($busca->rowCount()>0) {
die('<script>notify("danger", "NÃO SERÁ POSSÍVEL A EMISSÃO, FOI ENCONTRADO REGISTRO COM ESTES DADOS","");</script>');
} 
}

elseif ($TIPOBUSCA == '4') {
$tabela = "registro_livro_e";
$query = "SELECT ID, LIVRO FROM $tabela where NOMEPARTE1 = '$NOMEBUSCA' ";
$query .= "UNION SELECT ID, LIVRO FROM $tabela where CPFPARTE1 = '$CPFBUSCA'";
$busca = $pdo->prepare($query);
$busca->execute();
if ($busca->rowCount()>0) {
die('<script>notify("danger", "NÃO SERÁ POSSÍVEL A EMISSÃO, FOI ENCONTRADO REGISTRO COM ESTES DADOS","");</script>');
} 
}



?>


<?php if ($busca->rowCount()<1): ?>
<script type="text/javascript">$('#certidoes').modal({backdrop: 'static', keyboard: false});</script>
  
<div id="certidoes" class="modal fade"  tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">CERTIDÕES</h5>
        <input id="tipopartebuscar" type="hidden"></input>
        <input type="hidden" id="idreg2">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="formcertidao" target="blank" method="POST" action="emitir-certidao-negativa.php">
          <div class="row">

            <div class="col-md-12">
              <label for="country">NOME</label>
              <input class="form-control" type="text" name="NOMEPARTE" id="NOMEPARTE" required="true">
            </div>

            <div class="col-md-12">
              <label for="country">CPF</label>
              <input class="form-control cpf" type="text" name="CPFPARTE" id="CPFPARTE" required="true">
            </div>

            <div class="col-md-12">
              <label for="country">QUALIFICACAO</label>
              <textarea class="form-control"  name="QUALIFICACAOPARTE" id="QUALIFICACAOPARTE"></textarea>
            </div>

            <div class="col-lg-12">
              <br>
              <label for="country" class="text-center">ALTERAR ASSINATURA:</label>
              <select name="nomeassinatura" class="form-control">
                <option></option>
                <?php $q= PESQUISA_ALL('funcionario'); foreach($q as $q): if($q->strPermissaoAssinar == 'S')?>
                <option><?=$q->strNomeCompleto?>/<?=$q->strCargo?></option>
              <?php endforeach ?>
            </select>
            </div>

            <div class="col-lg-6 cert_geral">
              <br>
              <label for="country">TIPO PAPEL SEGURANÇA:</label>
              <select id="TIPOPAPELSEGURANCA" name="TIPOPAPELSEGURANCA"  class="form-control valid" aria-invalid="false">
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

            <div class="col-lg-6 cert_geral">
              <br>
              <label for="country">NUMERO PAPEL SEGURANÇA:</label>
              <input id="NUMEROPAPELSEGURANCA" name="NUMEROPAPELSEGURANCA" type="text"  class="form-control valid" aria-invalid="false" onblur="verificapapelseguranca($(this).val(), $('#TIPOPAPELSEGURANCA').val(), $(this).attr('id'))">
            </div>


            <input type="hidden" id="qtdatos" name="qtdatos" value="1">
            <input type="hidden" name="TIPOBUSCACERTIDAO" id="TIPOBUSCACERTIDAO" value="<?=$TIPOBUSCA?>">
            <div class="col-lg-3 cert_geral" >
              <br><br>
              <label for="country">ATO:</label>
              <input type="text" id="ATO1" name="ATO1" placeholder="Ex. 14.5.1" list="atosliberados" class="form-control campoato" required="true">
            </div>

            <div class="col-lg-2 cert_geral" >
              <br><br>
              <label for="country">QUANTIDADE:</label>
              <input type="number" id="QUANTIDADE1" name="QUANTIDADE1" class="form-control" required="true" value="1">
            </div>


            <div class="col-lg-4 cert_geral" >
              <br><br>
              <label for="country">SELO:</label>
              <input type="text" id="SELO1" name="SELO1" class="form-control" required="true">
            </div>

            <div class="col-lg-3 cert_geral" >
              <br><br><br>
              <a class="btn btn-info btn-lg" id="botaosolicitaselo1" onclick="selocertidao(1)"> <i class="ni ni-curved-next"></i>   SOLICITAR SELO</a>
            </div> 
          <div class="col-lg-12 cert_geral custom-control custom-checkbox" >
            <br>
           <input class="custom-control-input" id="CHECKSELOISENTO1" onclick="verificaisento(1)" value="1" type="checkbox">
           <label style="margin-left: 1.6%;" class="custom-control-label" for="CHECKSELOISENTO1">
            <span>SELO ISENTO</span>
          </label>
          <textarea style="display:none" class="form-control" id="MOTIVOSELOISENTO1" name="MOTIVOSELOISENTO1" rows="5" placeholder="INFORME O MOTIVO DA INSENÇÃO"></textarea>
          </div>

          </div>
          <div class="row" id="addatosmais">
          </div>
        </form>              
        <div class="row">
          <div class="col-lg-12 cert_geral">
            <br><br>
            <button class="btn btn-default btn-lg btn-block" onclick="addatocert()"> <i class="ni ni-fat-add"></i>  ADICIONAR MAIS ATOS</button>
          </div>

          <div class="col-lg-6" >
            <br><br>
            <a class="btn btn-info btn-lg btn-block" onclick="irparacertidao()"> <i style="font-size:40px" class="fa fa-print"></i><br> IR PARA CERTIDÃO</a>
          </div>
        </div>             

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////-->


<datalist id="atosliberados">
  <option style="max-width: 100%;font-size: 70%" value="14.5.1">14.5.1 Certidão com uma folha</option>
  <option style="max-width: 100%;font-size: 70%" value="14.5.6">14.5.6 Certidões de inteiro teor</option>
  <option style="max-width: 100%;font-size: 70%" value="14.5.6.1">14.5.6.1 Por folha acrescida além da primeira, mais...</option>
  <option style="max-width: 100%;font-size: 70%" value="14.5.7">14.5.7 Certidão Eletrônica com buscas e folhas excedentes incluídas</option>
  <option style="max-width: 100%;font-size: 70%" value="14.5.5">14.5.2  Por folha acrescida além da primeira, mais...</option>
  <option style="max-width: 100%;font-size: 70%" value="14.5.5">14.5.5 Certidão de Casamento Comunitário autorizado ou realizado pelo Poder Judiciário</option>


  <option style="max-width: 100%;font-size: 70%" value="14.4.1">14.4.1 Quando lavrada à margem do registro</option>
  <option style="max-width: 100%;font-size: 70%" value="14.4.2">14.4.2 Quando houver necessidade de transporte para outra
    folha 
  </option>
  <option style="max-width: 100%;font-size: 70%" value="14.4.3">14.4.3
    Quando for referente à anulação de casamento,
    separação judicial, divórcio ou restabelecimento de
  sociedade conjugal.</option>
  <option value="14.7" style="max-width: 100%;font-size: 70%">14.7 Anotação feita no próprio cartório ou mediante 
  comunicação, além do porte postal.</option>
  <option value="14.11" style="max-width: 100%;font-size: 70%">14.11 Pelos procedimentos administrativos de reconhecimento de paternidade ou maternidade...</option>
  <option value="14.3.3" style="max-width: 100%;font-size: 70%">14.3.3 Retificação, restauração ou cancelamento de registro, qualquer que seja a causa e alteração de patronímico familiar por determinação judicial, excluída a certidão. 
  </option>
  <option value="14.3.4" style="max-width: 100%;font-size: 70%">14.3.4 Procedimento de adoção e reconhecimento de filho por determinação judicial, excluída a certidão.
  </option>
  <option value="14.10" style="max-width: 100%;font-size: 70%">14.10 Retificação Simples 
  </option>
  <option value="14.2" style="max-width: 100%;font-size: 70%">14.2  Registro de emancipação, tutela, interdição ou ausência. (Alterado pela Lei nº 9.490, de 04/11/11)
  </option>
  <option style="max-width: 100%;font-size: 70%" value="14.6.1">14.6.1 Das buscas Até dois anos</option>
  <option style="max-width: 100%;font-size: 70%" value="14.6.2">14.6.2 Das buscas Até cinco anos</option>
  <option style="max-width: 100%;font-size: 70%" value="14.6.3">14.6.3 Das buscas Até dez anos</option>
  <option style="max-width: 100%;font-size: 70%" value="14.6.4">14.6.4 Das buscas Até quinze anos</option>
  <option style="max-width: 100%;font-size: 70%" value="14.6.5">14.6.5 Das buscas Até vinte anos</option>
  <option style="max-width: 100%;font-size: 70%" value="14.6.6">14.6.6 Das buscas Até trinta anos</option>
  <option style="max-width: 100%;font-size: 70%" value="14.6.7">14.6.7 Das buscas Até cinquenta anos</option>
  <option style="max-width: 100%;font-size: 70%" value="14.6.8">14.6.8 Das buscas Até acima de cinquenta anos</option>
  <option style="max-width: 100%;font-size: 70%" value="14.6.9">14.6.9 Se indicados dia, mês e ano da prática do ato, ou número e livro corretos do ato não serão cobradas buscas.</option>

</datalist>

<script type="text/javascript">
  $(".campoato").blur(function(){
    var value = $(this).val();
    var idcampo = $(this).attr("id");
    var confirm = "";
    $('#atosliberados').find('option').each(function(){
      if ($(this).val() == value) {
        confirm = "ok";
                  //alert(confirm);
                }
              });

    if (confirm == "") {swal("ATENÇÃO", "O ato '"+value+"' não pertence a lista de atos aceitáveis para este momento. clique em cima do campo e o sistema listará os atos aceitáveis!", "info");
    $("#"+idcampo).val("");
  }     
});
</script>



<?php endif ?>




<script type="text/javascript">
$(document).ready(function(){
    $('.table_exportable').DataTable( {
        dom: 'Bfrtip',
      
  buttons: [
    {
      "extend": 'excel',
      "text": '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar Excel',
      'className': 'btn btn-info '
    },
    {
      "extend": 'print',
      "text": '<i class="fa fa-print" ></i> Imprimir',
      'className': 'btn btn-info '
    }
  ]
});

$('#customers_filter').hide();
var htmlbuttons = $('.dt-buttons').addClass('row col-lg-12');
$('#divbuttons').html(htmlbuttons);
//$('#customers_wrapper').hide();
});



</script>

<script src="../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>


<script type="text/javascript">
  function verificapapelseguranca(numeropapel, tipopapel, idcampo){
 $.post('control/papelseguranca.php', {
  'idcampo':idcampo,
  'tipopapel':tipopapel,
  'numeropapel':numeropapel

}, 
function(data) {
            //$('#resultadogerarselo').html(data);  
            var retorno = data;
            console.log(data);
            var retorno = JSON.parse(retorno);

            if (typeof retorno['erro'] !== "undefined") {
              swal('Atenção!!!',retorno['erro'], "warning");
              //$('#'+idcampo).val('');
            }       

           if(typeof retorno['sucesso'] !== "undefined"){
             notify('success',retorno['sucesso'], "");
           }

           if(typeof retorno['warning'] !== "undefined"){
            notify('default',retorno['warning'], "");
           }
         });
}


function addatocert(){
  if (validar() == false) {
  var qtd = 1;
  if ($('#qtdatos').val() =='') {
    qtd = qtd+1;
    $('#qtdatos').val(qtd);
  }
  else{
    qtd = $('#qtdatos').val();
    qtd = parseInt(qtd);
    qtd = qtd+1;
    $('#qtdatos').val(qtd);
  }
  var p = '<div class="col-lg-1 ato'+qtd+' cert_geral"></div><div class="col-lg-10 ato'+qtd+' cert_geral"><br><button onclick="deleteato('+qtd+')" class="btn btn-danger btn-block ato'+qtd+'"><i class="fa fa-trash ato'+qtd+'"></i> EXCLUIR ESTE ATO</button></div>';
  var p1 = '<div class=" ato'+qtd+' col-lg-3 cert_geral"><br><br><label for="country">ATO:</label><input type="text" id="ATO'+qtd+'" name="ATO'+qtd+'" placeholder="Ex. 14.5.1" list="atosliberados" class=" ato'+qtd+' form-control campoato" required="true"></div>';
  var p2 ='<div class=" ato'+qtd+' col-lg-2 cert_geral"><br><br><label for="country">QUANTIDADE:</label><input type="number" id="QUANTIDADE'+qtd+'" name="QUANTIDADE'+qtd+'" class=" ato'+qtd+' form-control" required="true" value="1"></div>';
  var p3 ='<div class=" ato'+qtd+' col-lg-4 cert_geral"><br><br><label for="country">SELO:</label><input type="text" id="SELO'+qtd+'" name="SELO'+qtd+'" class=" ato'+qtd+' form-control" required="true"></div>';
  var p4 ='<div class=" ato'+qtd+' col-lg-3 cert_geral"><br><br><br><a id="botaosolicitaselo'+qtd+'" class=" ato'+qtd+' btn btn-info btn-lg" onclick="selocertidao('+qtd+')"> <i class=" ato'+qtd+' ni ni-curved-next"></i>  SOLICITAR SELO</a></div>';
  var p5 = '<div class="col-lg-12 cert_geral  custom-control custom-checkbox ato'+qtd+'"><br><input class="custom-control-input" id="CHECKSELOISENTO'+qtd+'" onclick="verificaisento('+qtd+')" value="'+qtd+'" type="checkbox"><label style="margin-left: 1.6%;" class="custom-control-label" for="CHECKSELOISENTO'+qtd+'"><span>SELO ISENTO</span></label><textarea style="display:none" class="form-control" id="MOTIVOSELOISENTO'+qtd+'" name="MOTIVOSELOISENTO'+qtd+'" rows="5" placeholder="INFORME O MOTIVO DA INSENÇÃO"></textarea></div>';
  $('#addatosmais').append(p1,p2,p3,p4,p5,p);
}
}

function deleteato(qtd){
  $('.ato'+qtd).remove();
  /*qtd = $('#qtdatos').val();
  qtd = qtd-1;
  $('#qtdatos').val(qtd);
  */
}
function irparacertidao(){
  swal({
      title: "Deseja realmente avançar?",
      text: "Tem certeza de que deseja prosseguir?",
      type: "warning",
      confirmButtonClass: "bg-green",
      confirmButtonText: "AVANCE!",
      showCancelButton: true,
      cancelButtonText:'NÃO, CANCELE!',
      cancelButtonClass: 'bg-red',
      showLoaderOnConfirm: false,
      closeOnConfirm: true

    },
    function(){ 
      $('#formcertidao').submit();
      $('#TIPOCERTIDAO').val('');
      $('.cert_geral').css("display","none");
      $('.prim_via').css("display","none");
  });
}


function selocertidao(indice){
  $('#SELO'+indice).prop("required", false);
  if (validar() == false) {
    
    var ATO = $('#ATO'+indice).val();
    var QUANTIDADE = $('#QUANTIDADE'+indice).val();
    var IDREGISTRO = $('#NOMEPARTE').val()+';'+$('#CPFPARTE').val()+';'+$('#QUALIFICACAOPARTE').val();
    var tipopapelseguranca = $('#TIPOPAPELSEGURANCA').val();
    var numeropapelseguranca = $('#NUMEROPAPELSEGURANCA').val();
    var motivo_isento = $('#MOTIVOSELOISENTO'+indice).val();

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

      $.post('../selador/gerar-selo-certidao.php', {
        'ato':ATO,
        'quantidade':QUANTIDADE,
        'id_registro' : IDREGISTRO,
        'tipopapelseguranca':tipopapelseguranca,
        'numeropapelseguranca':numeropapelseguranca,
        'motivo_isento':motivo_isento,
        'natureza_solicitacao' : "CERTIDAO_NEGATIVA"
      }, 
      function(data) {  
        var retorno = data;
        var retorno = JSON.parse(retorno);

        if (typeof retorno['status'] !== "undefined") {
          notify('danger',retorno['error']+':'+retorno['status']+' '+retorno['message'], "");
          notify('danger',retorno['details'], "");
          swal("ERRO", retorno['details'], 'error');
          console.log(retorno);
        }       

        else{
         notify('success',retorno['resumos']['0'].numeroSelo, "");
         swal("SUCESSO", retorno['resumos']['0'].textoSelo, 'success');
         $('#SELO'+indice).val(retorno['resumos']['0'].numeroSelo);
         console.log(retorno);
         $('#botaosolicitaselo'+indice).hide();  
       }
     });
    });

  }
  $('#SELO'+indice).prop("required", true);
}

function verificaisento(indice){
  if ($('#CHECKSELOISENTO'+indice).is(":checked") != false ){
    $('#MOTIVOSELOISENTO'+indice).css("display","block").prop("required",true);
  }
  else{
     $('#MOTIVOSELOISENTO'+indice).css("display","none").prop("required",false);
  }
}


function validar(){
  var erros = '';
  $('body').find('input[required=true]').each(function(){
    if(!$(this).val()){
      erros +='O campo ' + $(this).attr('id') + ' é obrigatório!<br>';
      $(this).css("border-color", 'red');
      $(this).css("color", 'red');
    }
  });
  $('body').find('textarea[required=true]').each(function(){
    if(!$(this).val()){
      erros +='O campo ' + $(this).attr('id') + ' é obrigatório!<br>';
      $(this).css("border-color", 'red');
      $(this).css("color", 'red');
    }
  });
  $('body').find('select[required=true]').each(function(){
    if(!$(this).val()){
      erros +='O campo ' + $(this).attr('id') + ' é obrigatório!<br>';
      $(this).css("border-color", 'red');
      $(this).css("color", 'red');
    }
  });
  if (erros != '') {
      //swal("ATENÇÃO",erros,"warning");  
      notify('danger',erros, "");
      //return false;
    }
    else{
      return false;
    } 
  }

</script>