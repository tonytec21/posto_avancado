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

function op_certidoes(){
  $('#certidoes').modal();
}

function tipocertidao(tipo){

  if (tipo =='1') {
    $('.prim_via').css("display","block");
    $('.cert_geral').css("display","none");
  }
  else{
    $('.prim_via').css("display","none");
    $('.cert_geral').css("display","block");
  }
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


function selocertidao(indice){
  $('#SELO'+indice).prop("required", false);
  if (validar() == false) {
    
    var ATO = $('#ATO'+indice).val();
    var QUANTIDADE = $('#QUANTIDADE'+indice).val();
    var IDREGISTRO = $('#idregistro').val();
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
        'natureza_solicitacao' : "CERTIDAO_NASCIMENTO"
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


function previewcertidao(){
      $('#formcertidao').submit();
}



//--------------- averbacoes ------------------------------------------------------------
function atualizaraverbacoes(livro, folha, tipo, nome){
 var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      $('#exibeaverbacoes').html (this.responseText);
      return;
    }
    else{
      $('#exibeaverbacoes').html ("<br><br><h4 class='text-center'>Carregando...  <i class='fa fa-spinner'></i> </h4>");
      return;
    }
  };
  xhttp.open("POST", "control/busca-averbacoes.php?livro="+livro+"&folha="+folha+"&tipo="+tipo+"&nome="+nome, true);
  xhttp.send();
}

function salvar_av(setexibir,texto, livro, folha, termo, idregistro, nome, tipo, data){
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
      console.log(texto);
      $.post('control/insert-averbacao.php', {
      'setexibir':setexibir,
      'texto':texto,
      'livro':livro,
      'folha':folha,
      'termo':termo,
      'id_registro':idregistro,
      'nome':nome,
      'tipo':tipo,
      'data':data
    }, 
    function(data) {  
            var retorno = data;
            var retorno = JSON.parse(retorno);

            if (typeof retorno['erro'] !== "undefined") {
              notify('danger',retorno['erro'], "");
            }       

            else{
             notify('success',retorno['sucesso'], "");
             //swal("SUCESSO", retorno['sucesso'],"success");
             atualizaraverbacoes(livro, folha, tipo, nome);
           }
         });
 });
}



function fquerybd(query, tipo){
  //USADA SOMENTE PARA AVERBAÇÕES, NÃO USAR EM OUTRA PARTE!!!
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
      $.post('control/executa-query.php', {
      'query':query
    }, 
    function(data) {  
            var retorno = data;
            var retorno = JSON.parse(retorno);

            if (typeof retorno['erro'] !== "undefined") {
              notify('danger',retorno['erro'], "");
            }       

            else{
             notify('success',retorno['sucesso'], "");
             if (tipo == 'EXCLUIR') {window.location.assign('pesquisa.php?mensagem=excluido com sucesso');}
             else if (tipo == 'UPDATE') {window.location.reload();}
           }
         });
 });
}


function seloaverbacao(indice,idaverbacao){
  $('#SELO'+indice).prop("required", false);
  if (validar() == false) {
    
    var ATO = $('#ATO'+indice).val();
    var QUANTIDADE = $('#QUANTIDADE'+indice).val();
    var IDREGISTRO = idaverbacao;
    var tipopapelseguranca = '';
    var numeropapelseguranca = '';
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
        'natureza_solicitacao' : "AVERBACAO_NASCIMENTO"
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
         $('#seloatribuir'+idaverbacao).css('display','block').val(retorno['resumos']['0'].numeroSelo);  
       }
     });
    });

  }
  $('#SELO'+indice).prop("required", true);
}


function printdiv(iddiv) {
  estiloetq = '';
  $.getJSON( "../conf/conf_etqselo.json", function( data ) {
    console.log(data);
    estiloetq = data.estilo_etq_pessoas;
    var div = iddiv;
    idstyle = "#"+div;

    var minhaTabela = "<div style='display:flex; width:100%'>";
    minhaTabela = minhaTabela+$('#' + div).html();
    minhaTabela = minhaTabela+"<div>";
    var style = "<style>";
    style = style + estiloetq;
    style = style + "</style>";
      console.log(estiloetq);
    // CRIA UM OBJETO WINDOW
    var win = window.open('', '', 'height=500,width=1000,left=200');
    win.document.write('<html><head>');
    win.document.write('<title>Impressão</title>');   // <title> CABEÇALHO DO PDF.
    win.document.write(style);                                     // INCLUI UM ESTILO NA TAB HEAD
    win.document.write('</head>');
    win.document.write('<body>');
    win.document.write(minhaTabela);                          // O CONTEUDO DA TABELA DENTRO DA TAG BODY
    win.document.write('</body></html>');
    win.document.close();                                            // FECHA A JANELA
    win.print();  
     });
}

function addslashes(string) {
    return string.replace(/\\/g, '\\\\').
        replace(/\u0008/g, '\\b').
        replace(/\t/g, '\\t').
        replace(/\n/g, '\\n').
        replace(/\f/g, '\\f').
        replace(/\r/g, '\\r').
        replace(/'/g, '\\\'').
        replace(/"/g, '\\"');
}

function editav(id,iddiv){
  $('#editaav').modal();
  $('#idupdateav').val(id);
  tinymce.get('TEXTOAVERBACAOEDIT').setContent($(iddiv).html());
}

function update_text_av(id, texto){
  
  query = "UPDATE averbacoes_civil set strAverbacao = '"+addslashes(texto)+"' where ID = '"+id+"'";
  //alert(query);
  fquerybd(query, "UPDATE");
} 

function update_exibir_av(id, setexibir){
  
  query = "UPDATE averbacoes_civil set setRegistroInvisivel = '"+setexibir+"' where ID = '"+id+"'";
  //alert(query);
  fquerybd(query, "UPDATE");
} 

//--------------- averbacoes ------------------------------------------------------------

// -------------- anotaçoes -------------------------------------------------------------

function atualizaranotacoes(livro, folha, tipo, nome){
 var xhttp;
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      $('#exibeanotacoes').html (this.responseText);
      return;
    }
    else{
      $('#exibeanotacoes').html ("<br><br><h4 class='text-center'>Carregando...  <i class='fa fa-spinner'></i> </h4>");
      return;
    }
  };
  xhttp.open("POST", "control/busca-anotacoes.php?livro="+livro+"&folha="+folha+"&tipo="+tipo+"&nome="+nome, true);
  xhttp.send();
}

function salvar_an(setexibir,texto, livro, folha, termo, idregistro, nome, tipo, data){
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
      console.log(texto);
      $.post('control/insert-anotacao.php', {
      'setexibir':setexibir,
      'texto':texto,
      'livro':livro,
      'folha':folha,
      'termo':termo,
      'id_registro':idregistro,
      'nome':nome,
      'tipo':tipo,
      'data':data
    }, 
    function(data) {  
            var retorno = data;
            var retorno = JSON.parse(retorno);

            if (typeof retorno['erro'] !== "undefined") {
              notify('danger',retorno['erro'], "");
            }       

            else{
             notify('success',retorno['sucesso'], "");
             //swal("SUCESSO", retorno['sucesso'],"success");
             atualizaranotacoes(livro, folha, tipo, nome);
           }
         });
 });
}

function editan(id,iddiv){
  $('#editaan').modal();
  $('#idupdatean').val(id);
  tinymce.get('TEXTOANOTACAOEDIT').setContent($(iddiv).html());
}

function update_text_an(id, texto){
  
  query = "UPDATE anotacoes_civil set ANOTACAO = '"+addslashes(texto)+"' where ID = '"+id+"'";
  //alert(query);
  fquerybd(query, "UPDATE");
} 

function update_exibir_an(id, setexibir){
  
  query = "UPDATE anotacoes_civil set EXIBIR = '"+setexibir+"' where ID = '"+id+"'";
  //alert(query);
  fquerybd(query, "UPDATE");
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