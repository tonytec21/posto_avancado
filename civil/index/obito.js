$('#modalselo').click(function(){
$('#selogratis').modal();
document.getElementById('tipomodal').value = 'S';
});
function preencheSelo(selo,tipo){
var selo = selo; 
var tipo = tipo; 
var modo = document.getElementById('tipomodal').value;
if (modo == 'S' && tipo == 'GRA') {$('#SELO2').val(selo);}

}
$('#ACERVOFISICO').click(function(){
if ($(this).is(":checked") == false ) {$('#LIVROOBITO, #FOLHAOBITO,#TERMOOBITO').prop('readonly', true); $('#containerselo').show();$('#ATOOBITO').prop('disabled',false);$('#TIPOPAPELSEGURANCA').prop('disabled',false);$('#NUMEROPAPELSEGURANCA').prop('disabled',false);$('#averbacaoantiga').hide();}
else{ {$('#LIVROOBITO, #FOLHAOBITO,#TERMOOBITO').prop('readonly', false).val('');$('#containerselo').hide();$('#ATOOBITO').prop('disabled',true);$('#TIPOPAPELSEGURANCA').prop('disabled',true);$('#NUMEROPAPELSEGURANCA').prop('disabled',true);$('#averbacaoantiga').show();}}	
});

$('#TIPOASSENTO').change(function(){
if($(this).val() == 'ORDEM'){
$('#dec').html('<input type="text" id="QUALIDADEDECLARANTE" name="QUALIDADEDECLARANTE" class="form-control">');	
$('.oj').show();
} 
else{
$('#dec').html('<input type="text" id="QUALIDADEDECLARANTE" name="QUALIDADEDECLARANTE" class="form-control" placeholder="na qualidade de...">');	
$('.oj').hide();	
}
});

$("#NATURALIDADEDECLARANTE").click(function(){
document.getElementById('tipomodal').value = 'DE';
$("#cidades").modal();
});
$("#CIDADEDECLARANTE").click(function(){
document.getElementById('tipomodal').value = 'CDE';
$("#cidades").modal();
});

$("#NATURALIDADE").click(function(){
document.getElementById('tipomodal').value = 'NC';
$("#cidades").modal();
});

$("#CIDADE").click(function(){
document.getElementById('tipomodal').value = 'CNC';
$("#cidades").modal();
});
$("#NATURALIDADEPAI").click(function(){
document.getElementById('tipomodal').value = 'PA';
$("#cidades").modal();
});
$("#CIDADEPAI").click(function(){
document.getElementById('tipomodal').value = 'CPA';
$("#cidades").modal();
});

$("#NATURALIDADEMAE").click(function(){
document.getElementById('tipomodal').value = 'MA';
$("#cidades").modal();
});

$("#CIDADEMAE").click(function(){
document.getElementById('tipomodal').value = 'CMA';
$("#cidades").modal();
});

$("#NATURALIDADETESTEMUNHA1").click(function(){
document.getElementById('tipomodal').value = 'T1';
$("#cidades").modal();
});
$("#CIDADETESTEMUNHA1").click(function(){
document.getElementById('tipomodal').value = 'CT1';
$("#cidades").modal();
});

$("#NATURALIDADETESTEMUNHA2").click(function(){
document.getElementById('tipomodal').value = 'T2';
$("#cidades").modal();
});
$("#CIDADETESTEMUNHA2").click(function(){
document.getElementById('tipomodal').value = 'CT2';
$("#cidades").modal();
});
$("#CIDADEOBITO").click(function(){
document.getElementById('tipomodal').value = 'CO';
$("#cidades").modal();
});

function preencheCidades(id,cidade,uf){
var id = id;  
var cidade = cidade;
var uf = uf;
if (id == "5300109") {
$('#cidadeestrangeiro').modal();	
}
var modo = document.getElementById('tipomodal').value;
if (modo == 'DE') {$('#NATURALIDADEDECLARANTE').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CDE') {$('#CIDADEDECLARANTE').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'NC') {$('#NATURALIDADE').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CNC') {$('#CIDADE').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'PA') {$('#NATURALIDADEPAI').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CPA') {$('#CIDADEPAI').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'MA') {$('#NATURALIDADEMAE').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CMA') {$('#CIDADEMAE').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'T1') {$('#NATURALIDADETESTEMUNHA1').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'T2') {$('#NATURALIDADETESTEMUNHA2').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CT1') {$('#CIDADETESTEMUNHA1').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CT2') {$('#CIDADETESTEMUNHA2').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CO') {$('#CIDADEOBITO').val(id+'/'+cidade+' '+'/'+ uf); }
}

$("#botao").click(function(){
document.getElementById('tipomodalPessoa').value = 'morto';
$("#pessoas").modal();
showCustomer(); 
});

$("#botaopai").click(function(){
document.getElementById('tipomodalPessoa').value = 'pai';
$("#pessoas").modal();
showCustomer(); 
});
$("#botaomae").click(function(){
document.getElementById('tipomodalPessoa').value = 'mae';
$("#pessoas").modal();
showCustomer(); 
});
$("#botaotestemunha1").click(function(){
document.getElementById('tipomodalPessoa').value = 'testemunha1';
$("#pessoas").modal();
showCustomer(); 
});
$("#botaotestemunha2").click(function(){
document.getElementById('tipomodalPessoa').value = 'testemunha2';
$("#pessoas").modal();
showCustomer(); 
});


function preenchePessoa(
nome,
id,
rg,
orgaoem,
sexo,	
cpf,
profissao,
naturalidade,
nacionalidade,
datanascimento,
estadoCivil,
filhos,
conjuge,
ex,
datacasamento,
cartoriocasamento,
logradouro,
email,
bairro,
cidade,
telefone1,
telefone2,
pai,
mae
)
{

var modopessoa = document.getElementById('tipomodalPessoa').value;	

if (modopessoa == 'morto') {
$('#NOME').val(nome);
$('#CPF').val(cpf);
$('#RG').val(rg);
$('#ORG').html('<label class="col-md-4 control-label" >ORÃO EMISSOR:</label><div class="col-md-8"><input name="ORGAOEMISSOR" id="ORGAOEMISSOR" class="form-control text-center" required="" readonly="" value="'+orgaoem+'"></div>');
$('#NACIONALIDADE').val(nacionalidade);
$('#NATURALIDADE').val(naturalidade);
$('#DATANASCIMENTO').val(datanascimento);
$('#SEX').html('<label class="col-md-4 control-label" >SEXO:</label><div class="col-md-8"><input name="SEXO" id="SEXO" class="form-control text-center" required="" readonly="" value="'+sexo+'"></div>');
$('#EC').html('<label class="col-md-4 control-label" >ESTADO CIVIL:</label><div class="col-md-8"><input name="ESTADOCIVIL" id="ESTADOCIVIL" class="form-control text-center" required="" readonly="" value="'+estadoCivil+'"></div>');
$('#ESTADOCIVIL').val(estadoCivil);
$('#PROFISSAO').val(profissao);
$('#ENDERECO').val(logradouro);
$('#BAIRRO').val(bairro);
$('#CIDADE').val(cidade);

}


if (modopessoa == 'pai') {
$('#NOMEPAI').val(nome);
$('#CPFPAI').val(cpf);
$('#RGPAI').val(rg);
$('#ORGPAI').html('<label class="col-md-4 control-label" >ORÃO EMISSOR:</label><div class="col-md-8"><input name="ORGAOEMISSORPAI" id="ORGAOEMISSORPAI" class="form-control text-center" required="" readonly="" value="'+orgaoem+'"></div>');
$('#NACIONALIDADEPAI').val(nacionalidade);
$('#NATURALIDADEPAI').val(naturalidade);
$('#DATANASCIMENTOPAI').val(datanascimento);
$('#SEXPAI').html('<label class="col-md-4 control-label" >SEXO:</label><div class="col-md-8"><input name="SEXOPAI" id="SEXOPAI" class="form-control text-center" required="" readonly="" value="'+sexo+'"></div>');
$('#ECPAI').html('<label class="col-md-4 control-label" >ESTADO CIVIL:</label><div class="col-md-8"><input name="ESTADOCIVILPAI" id="ESTADOCIVILPAI" class="form-control text-center" required="" readonly="" value="'+estadoCivil+'"></div>');
$('#ESTADOCIVILPAI').val(estadoCivil);
$('#PROFISSAOPAI').val(profissao);
$('#ENDERECOPAI').val(logradouro);
$('#BAIRROPAI').val(bairro);
$('#CIDADEPAI').val(cidade);
$('#AVO1PATERNO').val(pai);
$('#AVO2PATERNO').val(mae);
}

if (modopessoa == 'mae') {
$('#NOMEMAE').val(nome);
$('#CPFMAE').val(cpf);
$('#RGMAE').val(rg);
$('#ORGMAE').html('<label class="col-md-4 control-label" >ORÃO EMISSOR:</label><div class="col-md-8"><input name="ORGAOEMISSORMAE" id="ORGAOEMISSORMAE" class="form-control text-center" required="" readonly="" value="'+orgaoem+'"></div>');
$('#NACIONALIDADEMAE').val(nacionalidade);
$('#NATURALIDADEMAE').val(naturalidade);
$('#DATANASCIMENTOMAE').val(datanascimento);
$('#SEXMAE').html('<label class="col-md-4 control-label" >SEXO:</label><div class="col-md-8"><input name="SEXOMAE" id="SEXOMAE" class="form-control text-center" required="" readonly="" value="'+sexo+'"></div>');
$('#ECMAE').html('<label class="col-md-4 control-label" >ESTADO CIVIL:</label><div class="col-md-8"><input name="ESTADOCIVILMAE" id="ESTADOCIVILMAE" class="form-control text-center" required="" readonly="" value="'+estadoCivil+'"></div>');
$('#ESTADOCIVILMAE').val(estadoCivil);
$('#PROFISSAOMAE').val(profissao);
$('#ENDERECOMAE').val(logradouro);
$('#BAIRROMAE').val(bairro);
$('#CIDADEMAE').val(cidade);
$('#AVO1MATERNO').val(pai);
$('#AVO2MATERNO').val(mae);
}

if (modopessoa == 'testemunha1') {
$('#NOMETESTEMUNHA1').val(nome);
$('#CPFTESTEMUNHA1').val(cpf);
$('#RGTESTEMUNHA1').val(rg);
$('#ORGTEST1').html('<label class="col-md-4 control-label" >ORÃO EMISSOR:</label><div class="col-md-8"><input name="ORGAOEMISSORTESTEMUNHA1" id="ORGAOEMISSORTESTEMUNHA1" class="form-control text-center" required="" readonly="" value="'+orgaoem+'"></div>');
$('#NACIONALIDADETESTEMUNHA1').val(nacionalidade);
$('#NATURALIDADETESTEMUNHA1').val(naturalidade);
$('#DATANASCIMENTOTESTEMUNHA1').val(datanascimento);
$('#SEXTEST1').html('<label class="col-md-4 control-label" >SEXO:</label><div class="col-md-8"><input name="SEXOTESTEMUNHA1" id="SEXOTESTEMUNHA1" class="form-control text-center" required="" readonly="" value="'+sexo+'"></div>');
$('#ECTEST1').html('<label class="col-md-4 control-label" >ESTADO CIVIL:</label><div class="col-md-8"><input name="ESTADOCIVILTESTEMUNHA1" id="ESTADOCIVILTESTEMUNHA1" class="form-control text-center" required="" readonly="" value="'+estadoCivil+'"></div>');
$('#ESTADOCIVILTESTEMUNHA1').val(estadoCivil);
$('#PROFISSAOTESTEMUNHA1').val(profissao);
$('#ENDERECOTESTEMUNHA1').val(logradouro);
$('#BAIRROTESTEMUNHA1').val(bairro);
$('#CIDADETESTEMUNHA1').val(cidade);
}

if (modopessoa == 'testemunha2') {
$('#NOMETESTEMUNHA2').val(nome);
$('#CPFTESTEMUNHA2').val(cpf);
$('#RGTESTEMUNHA2').val(rg);
$('#ORGTEST2').html('<label class="col-md-4 control-label" >ORÃO EMISSOR:</label><div class="col-md-8"><input name="ORGAOEMISSORTESTEMUNHA2" id="ORGAOEMISSORTESTEMUNHA2" class="form-control text-center" required="" readonly="" value="'+orgaoem+'"></div>');
$('#NACIONALIDADETESTEMUNHA2').val(nacionalidade);
$('#NATURALIDADETESTEMUNHA2').val(naturalidade);
$('#DATANASCIMENTOTESTEMUNHA2').val(datanascimento);
$('#SEXTEST2').html('<label class="col-md-4 control-label" >SEXO:</label><div class="col-md-8"><input name="SEXOTESTEMUNHA2" id="SEXOTESTEMUNHA2" class="form-control text-center" required="" readonly="" value="'+sexo+'"></div>');
$('#ECTEST2').html('<label class="col-md-4 control-label" >ESTADO CIVIL:</label><div class="col-md-8"><input name="ESTADOCIVILTESTEMUNHA2" id="ESTADOCIVILTESTEMUNHA2" class="form-control text-center" required="" readonly="" value="'+estadoCivil+'"></div>');
$('#ESTADOCIVILTESTEMUNHA2').val(estadoCivil);
$('#PROFISSAOTESTEMUNHA2').val(profissao);
$('#ENDERECOTESTEMUNHA2').val(logradouro);
$('#BAIRROTESTEMUNHA2').val(bairro);
$('#CIDADETESTEMUNHA2').val(cidade);
}

}

$('#TIPOLIVRO').change(function(){
if ($(this).val() == '5') {
$('.dados').prop('required',false);
$('.somenatimorto').hide();
}
else{
$('.dados').prop('required',true);
$('.somenatimorto').show();	
}

});



$('#DATAENTRADA').blur(function(){
if ($(this).val() < $('#DATAOBITO').val() &&  $('#DATAENTRADA').val()!='') {
	swal("Bloqueado!",'DATA DO REGISTRO NÃO PODE SER INFERIOR A DO OBITO!', "error");
	$('#DATAENTRADA').val('');
}
});



$('#LIBERAREDICAO').click(function(){
if ($(this).is(":checked") == false ) {$('#ATOOBITO').prop('disabled',false);;$('#TIPOPAPELSEGURANCA').prop('disabled',false);$('#NUMEROPAPELSEGURANCA').prop('disabled',false);}
else{ {$('#ATOOBITO').prop('disabled',true);;$('#TIPOPAPELSEGURANCA').prop('disabled',true);$('#NUMEROPAPELSEGURANCA').prop('disabled',true);}}	
});


$('#ESTADOCIVIL').change(function(){
if ($(this).val() == 'CA' || $(this).val() == 'VI') {
	$('.secasado').show();
}
else{
	$('.secasado').hide();
}

});

$('#DEIXOUFILHOS').change(function(){

if ($(this).val() == 'S') {
	$('#sefilhos').show();
}
else{
	$('#sefilhos').hide();
}

});