//AO CARREGAR A PAGINA
$(document).ready(function(){

// MASK CPF
$(".cpf").inputmask({
mask: ['999.999.999-99', '99.999.999/9999-99'],
keepStatic: true
});

// MASK DNV
$(".ndo").inputmask({
mask: ['99999999-9'],
keepStatic: true
});


//OMITIR INFO GEMEOS
$("#infogemeos").hide();

//OMITIR INFO CIDADE EXTERIOR
$("#divext").hide();

// OMITIR CAMPOS ROGO

$(".DADOSROGODECLARANTE").hide();
$(".DADOSROGOPAI").hide();
$(".DADOSROGOMAE").hide();
$(".DADOSROGOPAISOCIO").hide();
$(".DADOSROGOMAESOCIO").hide();

//OMITIR CAMPO MOTIVO SELO ISENTO
$("#MOTIVOSELOISENTO").hide();

//REGRA DE EXIBIÇÃO NATIMORTO:
if ($('#TIPOLIVRO').val() == '5') {
$('#tempointrauterina').css("display", "block");
$('#TEMPOINTRAUTERINA').prop("required", true);
}
else{
$('#tempointrauterina').css("display", "none");
$('#TEMPOINTRAUTERINA').prop("required", false);
}

//REGRA DE EXIBIÇÃO NOME FILHOS:
if ($('#DEIXOUFILHOS').val() == 'S') {
$('#nomefilhos').css("display", "block");
$('#NOMEFILHOS').prop("required", true);
}
else{
$('#nomefilhos').css("display", "none");
$('#NOMEFILHOS').prop("required", false);
}

//REGRA DE EXIBIÇÃO ELEITOR:
if ($('#ELEITOR').val() == 'S') {
$('#eleitor').css("display", "block");
$('#ELEITOR').prop("required", true);
}
else{
$('#eleitor').css("display", "none");
$('#ELEITOR').prop("required", false);
}


// PREENCHER CAMPOS
preencher_campos();

});


// REGRA DE EXIBIÇÃO DO CAMPO DECLARANTE:

$("#QUALIDADEDECLARANTE").change(function(){
if ($(this).val() == 'OUTRO') {
 //$(".outrodeclarante").show();   
}
else{
//$(".outrodeclarante").hide();   
}
});


//REGRA DE EXIBIÇÃO NATIMORTO:

$('#TIPOLIVRO').change(function(){

if ($(this).val() == '5') {
$('#tempointrauterina').css("display", "block");
$('#TEMPOINTRAUTERINA').prop("required", true);
}
else{
$('#tempointrauterina').css("display", "none");
$('#TEMPOINTRAUTERINA').prop("required", false);
}

});



//REGRA DE EXIBIÇÃO NOME FILHOS:

$('#DEIXOUFILHOS').change(function(){

if ($(this).val() == 'S') {
$('#nomefilhos').css("display", "block");
$('#NOMEFILHOS').prop("required", true);
}
else{
$('#nomefilhos').css("display", "none");
$('#NOMEFILHOS').prop("required", false);
}

});


//REGRA DE EXIBIÇÃO ELEITOR:

$('#ELEITOR').change(function(){

if ($(this).val() == 'S') {
$('#eleitor').css("display", "block");
$('#ELEITOR').prop("required", true);
}
else{
$('#eleitor').css("display", "none");
$('#ELEITOR').prop("required", false);
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


$('#POSSUISOCIOAFETIVA').click(function(){
  if ($(this).is(":checked") != false ){
    $('#socioafetiva').css("display", "block");
  }
  else{
   $('#socioafetiva').css("display", "none"); 
  }
});