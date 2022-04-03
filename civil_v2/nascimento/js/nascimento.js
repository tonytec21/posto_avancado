//AO CARREGAR A PAGINA
$(document).ready(function(){

// MASK CPF
$(".cpf").inputmask({
mask: ['999.999.999-99', '99.999.999/9999-99'],
keepStatic: true
});

// MASK DNV
$(".dnv").inputmask({
mask: ['99-99999999-9'],
keepStatic: true
});

//OMITIR DECLARANTE
$(".outrodeclarante").hide();

//OMITIR INFO GEMEOS
$("#infogemeos").hide();

//OMITIR INFO CIDADE EXTERIOR
$("#divext").hide();

// OMITIR CAMPOS ROGO

$(".DADOSROGODECLARANTE").hide();
$(".DADOSROGOPAI").hide();
$(".DADOSPROCURADORPAI").hide();
$(".DADOSROGOMAE").hide();
$(".DADOSROGOPAISOCIO").hide();
$(".DADOSROGOMAESOCIO").hide();

//OMITIR CAMPO MOTIVO SELO ISENTO
$("#MOTIVOSELOISENTO").hide();

// PREENCHER CAMPOS
preencher_campos();

});


// REGRA DE EXIBIÇÃO DO CAMPO DECLARANTE:

$("#QUALIDADEDECLARANTE").change(function(){
if ($(this).val() == 'OUTRO') {
 $(".outrodeclarante").show();   
}
else{
$(".outrodeclarante").hide();   
}
});


// REGRA DE EXIBIÇÃO DO CAMPO GEMEOS:

$("#GEMEOS").change(function(){
if ($(this).val() == 'S') {
 $("#infogemeos").show();   
}
else{
$("#infogemeos").hide();   
}
});

// REGRA CIDADE EXTERIOR

$('#tipobuscacidade').change(function(){
if ($(this).val() == 'ex') {
   $('#campocod').val('5300109');
   $('#divext').show();
   $('#nomecidadebusca').prop("readonly",true);
   $('#resultbuscacidade').hide();    
}
else{
 $('#campocod').val('');
   $('#divext').hide(); 
   $('#nomecidadebusca').prop("readonly",false); 
    $('#resultbuscacidade').show();         
}
});


// BUSCA CIDADES

$('#nomecidadebusca').keydown(function(){
if ($(this).val()!='') {    
bdcidades($(this).val());
}
});

// BUSCA PESSOAS

$('#buttonbuscarpessoa').click(function(){
if ($('#nomepessoabusca').val()!='') {    
bdpessoas($('#nomepessoabusca').val());
}
});


$("#ATONASCIMENTO").blur(function(){
  var value = $(this).val();
  var idcampo = $(this).attr("id");
  var confirm = "";
  $('#atosliberados').find('option').each(function(){
    if ($(this).val() == value) {
      confirm = "ok";
                  //alert(confirm);
                }
              });

  if (confirm == "") {swal("ERRO", "O ato "+value+" não pertence a lista de atos aceitáveis para este momento. clique em cima do campo e o sistema listará os atos aceitáveis!", "info");
  $("#"+idcampo).val("");
}     
});


$('#CHECKSELOISENTO').click(function(){
  if ($(this).is(":checked") != false ){
    $('#MOTIVOSELOISENTO').show().prop("required", true);
  }
  else{
    $('#MOTIVOSELOISENTO').hide().prop("required", false);  
  }
});

$('#POSSUIROGODECLARANTE').click(function(){
  if ($(this).is(":checked") != false ){
   $('.DADOSROGODECLARANTE').show().prop("required", true);
 }
 else{
   $('.DADOSROGODECLARANTE').hide().prop("required", false);
 }
});

$('#POSSUIROGOPAI').click(function(){
  if ($(this).is(":checked") != false ){
   $('.DADOSROGOPAI').show().prop("required", true);
 }
 else{
   $('.DADOSROGOPAI').hide().prop("required", false);
 }
});


$('#POSSUIPROCURADORPAI').click(function(){
  if ($(this).is(":checked") != false ){
   $('.DADOSPROCURADORPAI').show().prop("required", true);
 }
 else{
   $('.DADOSPROCURADORPAI').hide().prop("required", false);
 }
});

$('#POSSUIROGOMAE').click(function(){
  if ($(this).is(":checked") != false ){
   $('.DADOSROGOMAE').show().prop("required", true);
 }
 else{
   $('.DADOSROGOMAE').hide().prop("required", false);
 }
});


$('#POSSUIROGOPAISOCIO').click(function(){
  if ($(this).is(":checked") != false ){
   $('.DADOSROGOPAISOCIO').show().prop("required", true);
 }
 else{
   $('.DADOSROGOPAISOCIO').hide().prop("required", false);
 }
});

$('#POSSUIROGOMAESOCIO').click(function(){
  if ($(this).is(":checked") != false ){
   $('.DADOSROGOMAESOCIO').show().prop("required", true);
 }
 else{
   $('.DADOSROGOMAESOCIO').hide().prop("required", false);
 }
});



$.getJSON( "../conf/conf_etqselo.json", function( data ) {
  estiloetq = data.estilo_etq_pessoas;
  var clipboard = new ClipboardJS('.btn');
  clipboard.on('success', function(e) {
    console.log(e);
  });

  clipboard.on('error', function(e) {
    console.log(e);
  });

  $('.printbtn').click(function(){
    var iddiv = $(this).attr("id");
    iddiv = iddiv.replace("print","");
    iddiv = "div"+iddiv;
    printdiv(iddiv);
  });
  $('.copybtn').click(function(){
    var iddiv = $(this).attr("id");
    iddiv = iddiv.replace("copy","");
    iddiv = "div"+iddiv;
    copyToClipboard(iddiv);
  });

  function printdiv(iddiv) {
    var div = iddiv;
    idstyle = "#"+div;

    var minhaTabela = "<div style='display:flex; width:100%'>";
    minhaTabela = minhaTabela+$('#' + div).html();
    minhaTabela = minhaTabela+"<div>";
    var style = "<style>";
    style = style + estiloetq;
    style = style + "</style>";
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

  }

  function printBy(selector){
    var $print = $(selector)
  //.clone()
  .addClass('print')
  //.prependTo('body');

  // Stop JS execution
  window.print();

  // Remove div once printed
  //$print.remove();
}
function copyToClipboard(iddiv) {
  swal('COPIADO!','Localize onde deseja colar o conteúdo copiado e pressione "ctrl+V"!', 'info');
}

});