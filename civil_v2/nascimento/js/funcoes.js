

function buscacidade(campo,id){

  var idcampo = campo;
  $('#idcampo').val(campo);
  $('#idreg').val(id);
  $('#modalbuscacidades').modal();

}

function buscarcadastro(tipoparte,id){
  $('#tipopartebuscar').val(tipoparte);
  $('#idreg2').val(id);
  $('#modalbuscapessoas').modal();

}

function bdcidades(pesquisa){
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      $('#resultbuscacidade').html (this.responseText);
      return;
    }
    else{
      $('#resultbuscacidade').html ("<br><br><h4 class='text-center'>Carregando...  <i class='fa fa-spinner'></i> </h4>");
      return;
    }
  };
  xhttp.open("POST", "control/busca-cidades.php?pesquisa="+pesquisa, true);
  xhttp.send();
}            

function bdpessoas(pesquisa){
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      $('#resultbuscapessoa').html (this.responseText);
      return;

    }
    else{
      $('#resultbuscapessoa').html ("<br><br><h4 class='text-center'>Carregando...  <i class='fa fa-spinner'></i> </h4>");
      return;
    }
  };
  xhttp.open("POST", "control/busca-pessoas.php?pesquisa="+pesquisa, true);
  xhttp.send();
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
  



function notify(classe,mensagem, titulo ){
  $.notify({
      // options
      title: titulo,
      message: mensagem,
      icon: 'glyphicon glyphicon-envelope',
    },{
      // settings
      element: 'body',
      position: null,
      type: classe,
      allow_dismiss: true,
      placement: {
        from: "bottom",
        align: "right"
      },
      delay: 2000,
      timer: 2000,
      url_target: '_blank',
  });
}

function campos_input(campo, id){

  if ($('#'+campo).prop('required') == true && $('#'+campo).val() == '') {
    swal("ATENÇÃO!", "O PREENCHIMENTO DESTE CAMPO É OBRIGATÓRIO", "warning");
  }
  else{

    $.post('control/update.php', {
      'campo_update':$('#'+campo).val(),
      'nome_campo_update':campo,
      'id':id
    }, 
    function(data) {
            //$('#resultadogerarselo').html(data);  
            var retorno = data;
            var retorno = JSON.parse(retorno);

            if (typeof retorno['erro'] !== "undefined") {
              notify('danger',retorno['erro'], "");
            }       

            else{
             notify('success',retorno['sucesso'], "");
           }
         });

  }
  }


  function campos_input_json(campo, id){

    $.post('control/update.php', {
      'campo_update':$('#'+campo).val(),
      'nome_campo_update':campo,
      'id':id,
      'campo_json':'ok'
    }, 
    function(data) {
            //$('#resultadogerarselo').html(data);  
            var retorno = data;
            var retorno = JSON.parse(retorno);

            if (typeof retorno['erro'] !== "undefined") {
              notify('danger',retorno['erro'], "");
            }       

            else{
             notify('success',retorno['sucesso'], "");
           }
         });

  
  }


function dadosregistro(){
$('#LIVRONASCIMENTO, #FOLHANASCIMENTO, #TERMONASCIMENTO, #MATRICULA').prop("required", false);
if(validar() == false){
  $('#LIVRONASCIMENTO, #FOLHANASCIMENTO, #TERMONASCIMENTO, #MATRICULA').prop("required", true);
  $('#modaldadosregistro').modal();
  if ($('#status_registro').val() !='concluido') {
  $.post('control/busca_dados_registro.php', {
      'busca':'ok',
    }, 
    function(data) {  
            var retorno = data;
            var retorno = JSON.parse(retorno);

            if (typeof retorno['erro'] !== "undefined") {
              notify('danger',retorno['erro'], "");
            }       

            else{
             if ($('#LIVRONASCIMENTO').val()=='' && $('#FOLHANASCIMENTO').val()=='' && $('#TERMONASCIMENTO').val()=='') {
             $('#LIVRONASCIMENTO').val(retorno['livro']);
             $('#FOLHANASCIMENTO').val(retorno['folha']);
             $('#TERMONASCIMENTO').val(retorno['termo']);
             }
           }
         });
    }

}
}


function finalizarregistro(id){
  if ($('#MATRICULA').val()!='') {

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
dataregistro = yyyy+'-'+mm+'-'+dd;   
$('#DATAENTRADA').val(dataregistro);
    
  var livro = $('#LIVRONASCIMENTO').val();
  var folha = $('#FOLHANASCIMENTO').val(); 
  var termo = $('#TERMONASCIMENTO').val();

  $.post('control/busca_dados_registro.php', {
      'livro_consulta':livro,
      'folha_consulta':folha,
      'termo_consulta':termo
    }, 
    function(data) {  
            var retorno = data;
            var retorno = JSON.parse(retorno);
            if (typeof retorno['erro'] !== "undefined") {
             notify('danger',retorno['erro'], "");
            }       

            else{
              campos_input('LIVRONASCIMENTO', id);
              campos_input('FOLHANASCIMENTO', id);
              campos_input('TERMONASCIMENTO', id);
              campos_input('MATRICULA', id);
              campos_input('DATAENTRADA', id);
              swal("SUCESSO", "DADOS DE REGISTRO SALVOS", "success");
              $('#finalizarregistro').hide();
            }
         });

}

else{
  notify('danger',"TODOS ESTES CAMPOS DEVEM SER PREENCHIDOS", "");
}
  
}

function gerarmatricula(livro, folha, termo, tiporegistro, tipolivro, tipoacervo){

var today = new Date();
var dd = String(today.getDate()).padStart(2, '0');
var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
var yyyy = today.getFullYear();
dataregistro = yyyy+'-'+mm+'-'+dd; 

if (livro !='' && folha!='' && termo!='' && dataregistro !='') {}
$.post('../consultas/gerador-matricula-externo.php', {
      'livro':livro,
      'folha':folha,
      'termo':termo,
      'dataRegistro':dataregistro,
      'tipoRegistro': tiporegistro,
      'tipoLivro': tipolivro,
      'tipoacervo': tipoacervo
    }, 
    function(data) {  
            var retorno = data;
            var retorno = JSON.parse(retorno);

            if (typeof retorno['erro'] !== "undefined") {
              notify('danger',retorno['erro'], "");
            }       

            else{
             $('#MATRICULA').val(retorno['matricula']);
           }
         });


}  

function opselo(){
  if(validar() == false){
  $('#modalseloregistro').modal();
  }
}



function divselo(iddivselo, id, natureza){

  $.post('control/montar-selos.php', {
    'id':id,
    'natureza':natureza,
  }, 
  function(data) {  
    var retorno = data;
    $(iddivselo).html(data);
  });

}


function solicitarselo(idregistro, livro, folha, termo, partes , isento, ato,quantidade, tipopapelseguranca, numeropapelseguranca, natureza){

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
//alert(idregistro+","+ livro+","+ folha+","+ termo+","+ partes.replace("'"," ") +","+ isento+","+ ato+","+ tipopapelseguranca+","+ numeropapelseguranca);
$.post('../selador/gerar-selo.php', {
  'livro':livro,
  'folha':folha,
  'termo':termo,
  'partes' :partes,
  'motivo_isento' : isento,
  'ato' : ato,
  'quantidade': quantidade,
  'id_registro': idregistro,
  'partes' : partes,
  'tipopapelseguranca':tipopapelseguranca,
  'numeropapelseguranca':numeropapelseguranca,
  'natureza_solicitacao' : "REGISTRO_NASCIMENTO"

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
   divselo('#contselos', idregistro, natureza);
   $('#SELO').val(retorno['resumos']['0'].numeroSelo);
   console.log(retorno);
   campos_input('ATONASCIMENTO', idregistro);
   campos_input('TIPOPAPELSEGURANCA', idregistro);
   campos_input('NUMEROPAPELSEGURANCA', idregistro);
   campos_input('SELO', idregistro);
   $('#botaoseloregistro').hide(); 
   $('#visualizarregistro').css("display", "block");  
 }
});
}
);


}

function pesquisaregistro(){
  var NOME = $('#NOME').val();
  var NOMEMAE = $('#NOMEMAE').val();
  var LIVRONASCIMENTO = $('#LIVRONASCIMENTO').val();
  var FOLHANASCIMENTO = $('#FOLHANASCIMENTO').val();
  var TERMONASCIMENTO = $('#TERMONASCIMENTO').val();
  var DATAENTRADA = $('#DATAENTRADA').val();
  var MATRICULA = $('#MATRICULA').val();

  if (
    NOME == '' &&
    NOMEMAE == '' &&
    LIVRONASCIMENTO == '' &&
    FOLHANASCIMENTO == '' &&
    TERMONASCIMENTO == '' &&
    DATAENTRADA == '' &&
    MATRICULA == '' 
    ) 
  {
    notify('danger',"AO MENOS UM CAMPO DEVE SER PREENCHIDO PARA A PESQUISA", "");
  }

  else{

    $('#modalresultado').modal();

    var xhttp;
    xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        $('#resultadobusca').html (this.responseText);
        return;

      }
      else{
        $('#resultadobusca').html ("<br><br><h4 class='text-center'>Carregando...  <i class='fa fa-spinner'></i> </h4>");
        return;
      }
    };



    xhttp.open("POST", "control/busca-pesquisa-nascimento.php?NOME="+NOME+"&NOMEMAE="+NOMEMAE+"&LIVRONASCIMENTO="+LIVRONASCIMENTO+"&FOLHANASCIMENTO="+FOLHANASCIMENTO+"&TERMONASCIMENTO="+TERMONASCIMENTO+"&MATRICULA="+MATRICULA+"&DATAENTRADA="+DATAENTRADA, true);
    xhttp.send();

  }

}

function guardar_info_add(id){
  var int_teor = tinymce.get("INTEIROTEOR").getContent();
  var observacoes_registro = tinymce.get("OBSERVACOESREGISTRO").getContent();
  var exibir_obs_registro = $("#EXIBIROBSREGISTRO").val();
  var id = id;

   $.post('control/update.php', {
      'id':id,
      'dados_add':'ok',
      'int_teor':int_teor,
      'observacoes_registro':observacoes_registro,
      'exibir_obs_registro':exibir_obs_registro
    }, 
    function(data) {
            //$('#resultadogerarselo').html(data);  
            var retorno = data;
            var retorno = JSON.parse(retorno);

            if (typeof retorno['erro'] !== "undefined") {
              notify('danger',retorno['erro'], "");
            }       

            else{
             notify('success',retorno['sucesso'], "");
           }
         });


}



function previewreg(id){
  var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      $('#previewreg').html (this.responseText);
      return;

    }
    else{
      $('#previewreg').html ("<br><br><h4 class='text-center'>Carregando...  <i class='fa fa-spinner'></i> </h4>");
      return;
    }
  };
  xhttp.open("POST", "pdfs/preview-nascimento-livro.php?id="+id, true);
  xhttp.send();
}


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