
$('#modalselo').click(function(){
$('#selogratis').modal();
document.getElementById('tipomodal').value = 'S';
});

$("#modalselo1").click(function(){
$("#selorestaura").modal();
});

$("#modalselo2").click(function(){
$("#selorestaura").modal();
});

function preencheSelo(selo,tipo){
var selo = selo; 
var tipo = tipo; 
var modo = document.getElementById('tipomodal').value;
if (modo == 'S' && tipo == 'GRA') {$('#SELO2').val(selo);}

}


$('#ACERVOFISICO').click(function(){
if ($(this).is(":checked") == false ) {$('#LIVRONASCIMENTO, #FOLHANASCIMENTO,#TERMONASCIMENTO').prop('readonly', true);$('#containerselo').show();$('#ATONASCIMENTO').prop('disabled',false);$('#TIPOPAPELSEGURANCA').prop('disabled',false);$('#NUMEROPAPELSEGURANCA').prop('disabled',false);$('#averbacaoantiga').hide();$('#DNV').prop('required',true);$('#DATANASCIMENTOPAI').prop('required',true);$('#DATANASCIMENTOMAE').prop('required',true);}
else{ {$('#LIVRONASCIMENTO, #FOLHANASCIMENTO,#TERMONASCIMENTO').prop('readonly', false).val('');$('#containerselo').hide();$('#ATONASCIMENTO').prop('disabled',true);$('#TIPOPAPELSEGURANCA').prop('disabled',true);$('#NUMEROPAPELSEGURANCA').prop('disabled',true);$('#averbacaoantiga').show();$('#DNV').prop('required',false);$('#DATANASCIMENTOPAI').prop('required', false);$('#DATANASCIMENTOMAE').prop('required', false);}}	
});

$('#TIPOASSENTO').change(function(){
if($(this).val() == 'REGISTROT'){
	
$('.oj').hide();
if ($('#ACERVOFISICO').is(":checked") == false ){
$('#containerselo').show();
$('#ATONASCIMENTO').prop("disabled",false);
$('#containerselorest1').hide();
$('#containerselorest2').hide();
$('#TIPOPAPELSEGURANCA').prop('disabled',false);$('#NUMEROPAPELSEGURANCA').prop('disabled',false);
$('#DNV').prop('required',false);
}		
} 

else if($(this).val() == 'RESTAURACAO'){
$('#containerselo').hide();
$('#ATONASCIMENTO').prop("disabled",true);
$('#containerselorest1').show();
$('#containerselorest2').show();	
$('.oj').hide();
$('#TIPOPAPELSEGURANCA').prop('disabled',true);$('#NUMEROPAPELSEGURANCA').prop('disabled',true);
$('#DNV').prop('required',false);		
}
else if($(this).val() == 'ORDEM' ){
$('#dec').html('<input type="text" id="QUALIDADEDECLARANTE" name="QUALIDADEDECLARANTE" class="form-control" required="" readonly="" disabled="" value="NULL">');	
$('.oj').show();
if ($('#ACERVOFISICO').is(":checked") == false ){
$('#containerselo').show();
$('#ATONASCIMENTO').prop("disabled",false);
$('#containerselorest1').hide();
$('#containerselorest2').hide();
$('#TIPOPAPELSEGURANCA').prop('disabled',false);$('#NUMEROPAPELSEGURANCA').prop('disabled',false);
$('#DNV').prop('required',false);
}		
}
else if($(this).val() == 'COMUN'){
$('#dec').html('<select id="QUALIDADEDECLARANTE" name="QUALIDADEDECLARANTE" class="form-control" required=""><option value=""> Selecione</option><option value="PAI">PAI</option><option value="MAE">MÃE</option><option value="AMBOSPAI">AMBOS OS PAIS</option><option value="OUTRO">OUTRO</option><option value="IGNORADO">IGNORADO</option></select>');	
$('.oj').hide();
if ($('#ACERVOFISICO').is(":checked") == false ){
$('#containerselo').show();
$('#ATONASCIMENTO').prop("disabled",false);
$('#containerselorest1').hide();
$('#containerselorest2').hide();
$('#TIPOPAPELSEGURANCA').prop('disabled',false);$('#NUMEROPAPELSEGURANCA').prop('disabled',false);
$('#DNV').prop('required',true);
}	
$('#QUALIDADEDECLARANTE').change(function(){
	if($(this).val() == 'OUTRO'){$('.declarante').show();}
	else{$('.declarante').hide();}
});		
}
});

$('#QUALIDADEDECLARANTE').change(function(){
	if($(this).val() == 'OUTRO'){$('.declarante').show();}
	else{$('.declarante').hide();}
});


$("#NATURALIDADEDECLARANTE").click(function(){
document.getElementById('tipomodal').value = 'DE';
$("#cidades").modal();
});
$("#CIDADEDECLARANTE").click(function(){
document.getElementById('tipomodal').value = 'CDE';
$("#cidades").modal();
});

$("#NATURALIDADENASCIDO").click(function(){
document.getElementById('tipomodal').value = 'NC';
$("#cidades").modal();
});

$("#CIDADENASCIMENTO").click(function(){
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

$("#NATURALIDADEPAISOCIO").click(function(){
document.getElementById('tipomodal').value = 'PASO';
$("#cidades").modal();
});
$("#CIDADEPAISOCIO").click(function(){
document.getElementById('tipomodal').value = 'CPASO';
$("#cidades").modal();
});

$("#NATURALIDADEMAESOCIO").click(function(){
document.getElementById('tipomodal').value = 'MASO';
$("#cidades").modal();
});

$("#CIDADEMAESOCIO").click(function(){
document.getElementById('tipomodal').value = 'CMASO';
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
$("#CIDADECASAMENTO").click(function(){
document.getElementById('tipomodal').value = 'CCP';
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
if (modo == 'NC') {$('#NATURALIDADENASCIDO').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CNC') {$('#CIDADENASCIMENTO').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'PA') {$('#NATURALIDADEPAI').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CPA') {$('#CIDADEPAI').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'MA') {$('#NATURALIDADEMAE').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CMA') {$('#CIDADEMAE').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'PASO') {$('#NATURALIDADEPAISOCIO').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CPASO') {$('#CIDADEPAISOCIO').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'MASO') {$('#NATURALIDADEMAESOCIO').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CMASO') {$('#CIDADEMAESOCIO').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'T1') {$('#NATURALIDADETESTEMUNHA1').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'T2') {$('#NATURALIDADETESTEMUNHA2').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CT1') {$('#CIDADETESTEMUNHA1').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CT2') {$('#CIDADETESTEMUNHA2').val(id+'/'+cidade+' '+'/'+ uf); }
if (modo == 'CCP') {$('#CIDADECASAMENTO').val(id+'/'+cidade+' '+'/'+ uf); }
}

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
$("#botaopaisocio").click(function(){
document.getElementById('tipomodalPessoa').value = 'paisoc';
$("#pessoas").modal();
showCustomer(); 
});
$("#botaomaesocio").click(function(){
document.getElementById('tipomodalPessoa').value = 'maesoc';
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

if (modopessoa == 'paisoc') {
$('#NOMEPAISOCIO').val(nome);
$('#CPFPAISOCIO').val(cpf);
$('#RGPAISOCIO').val(rg);
$('#ORGPAISOCIO').html('<label class="col-md-4 control-label" >ORÃO EMISSOR:</label><div class="col-md-8"><input name="ORGAOEMISSORPAISOCIO" id="ORGAOEMISSORPAISOCIO" class="form-control text-center" required="" readonly="" value="'+orgaoem+'"></div>');
$('#NACIONALIDADEPAISOCIO').val(nacionalidade);
$('#NATURALIDADEPAISOCIO').val(naturalidade);
$('#DATANASCIMENTOPAISOCIO').val(datanascimento);
$('#SEXPAISOCIO').html('<label class="col-md-4 control-label" >SEXO:</label><div class="col-md-8"><input name="SEXOPAISOCIO" id="SEXOPAISOCIO" class="form-control text-center" required="" readonly="" value="'+sexo+'"></div>');
$('#ECPAISOCIO').html('<label class="col-md-4 control-label" >ESTADO CIVIL:</label><div class="col-md-8"><input name="ESTADOCIVILPAISOCIO" id="ESTADOCIVILPAISOCIO" class="form-control text-center" required="" readonly="" value="'+estadoCivil+'"></div>');
$('#ESTADOCIVILPAISOCIO').val(estadoCivil);
$('#PROFISSAOPAISOCIO').val(profissao);
$('#ENDERECOPAISOCIO').val(logradouro);
$('#BAIRROPAISOCIO').val(bairro);
$('#CIDADEPAISOCIO').val(cidade);
$('#AVO1PATERNOSOCIO').val(pai);
$('#AVO2PATERNOSOCIO').val(mae);
}

if (modopessoa == 'maesoc') {
$('#NOMEMAESOCIO').val(nome);
$('#CPFMAESOCIO').val(cpf);
$('#RGMAESOCIO').val(rg);
$('#ORGMAESOCIO').html('<label class="col-md-4 control-label" >ORÃO EMISSOR:</label><div class="col-md-8"><input name="ORGAOEMISSORMAESOCIO" id="ORGAOEMISSORMAESOCIO" class="form-control text-center" required="" readonly="" value="'+orgaoem+'"></div>');
$('#NACIONALIDADEMAESOCIO').val(nacionalidade);
$('#NATURALIDADEMAESOCIO').val(naturalidade);
$('#DATANASCIMENTOMAESOCIO').val(datanascimento);
$('#SEXMAESOCIO').html('<label class="col-md-4 control-label" >SEXO:</label><div class="col-md-8"><input name="SEXOMAESOCIO" id="SEXOMAESOCIO" class="form-control text-center" required="" readonly="" value="'+sexo+'"></div>');
$('#ECMAESOCIO').html('<label class="col-md-4 control-label" >ESTADO CIVIL:</label><div class="col-md-8"><input name="ESTADOCIVILMAESOCIO" id="ESTADOCIVILMAESOCIO" class="form-control text-center" required="" readonly="" value="'+estadoCivil+'"></div>');
$('#ESTADOCIVILMAESOCIO').val(estadoCivil);
$('#PROFISSAOMAESOCIO').val(profissao);
$('#ENDERECOMAESOCIO').val(logradouro);
$('#BAIRROMAESOCIO').val(bairro);
$('#CIDADEMAESOCIO').val(cidade);
$('#AVO1MATERNOSOCIO').val(pai);
$('#AVO2MATERNOSOCIO').val(mae);
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

$('#GEMEOS').change(function(){
if ($(this).val() == 'S') {
	$('#nomematrigemeos').show();
	$('#NOMEMATRICULAGEMEOS').prop('required',true);
}	
else{
	$('#nomematrigemeos').hide();
	$('#NOMEMATRICULAGEMEOS').prop('required',false);	
}
});

$('#DATAENTRADA').blur(function(){
if ($(this).val() < $('#DATANASCIMENTO').val() &&  $('#DATAENTRADA').val()!='') {
	swal("Bloqueado!",'DATA DO REGISTRO NÃO PODE SER INFERIOR A DO NASCIMENTO!', "error");
	$('#DATAENTRADA').val('');
}
});


$('#LIBERAREDICAO').click(function(){
if ($(this).is(":checked") == false ) {$('#ATONASCIMENTO').prop('disabled',false);$('#TIPOPAPELSEGURANCA').prop('disabled',false);$('#NUMEROPAPELSEGURANCA').prop('disabled',false);}
else{ {$('#ATONASCIMENTO').prop('disabled',true);;$('#TIPOPAPELSEGURANCA').prop('disabled',true);$('#NUMEROPAPELSEGURANCA').prop('disabled',true);}}	
});


$('#PAISCASADOS').click(function(){
if ($(this).is(":checked") == false ) {
	var ESTADOCIVILPAI = document.getElementById("ESTADOCIVILPAI");	
		for (var i = 0; i < ESTADOCIVILPAI.options.length; i++){
		if (ESTADOCIVILPAI.options[i].value == ''){
		ESTADOCIVILPAI.options[i].selected = "true";
		break;}
		}
		var ESTADOCIVILMAE = document.getElementById("ESTADOCIVILMAE");	
		for (var i = 0; i < ESTADOCIVILMAE.options.length; i++){
		if (ESTADOCIVILMAE.options[i].value == ''){
		ESTADOCIVILMAE.options[i].selected = "true";
		break;}
		}

		$('#dadoscasamentopais').hide();
}
else{


	var ESTADOCIVILPAI = document.getElementById("ESTADOCIVILPAI");	
		for (var i = 0; i < ESTADOCIVILPAI.options.length; i++){
		if (ESTADOCIVILPAI.options[i].value == 'CA'){
		ESTADOCIVILPAI.options[i].selected = "true";
		break;}
		}
		var ESTADOCIVILMAE = document.getElementById("ESTADOCIVILMAE");	
		for (var i = 0; i < ESTADOCIVILMAE.options.length; i++){
		if (ESTADOCIVILMAE.options[i].value == 'CA'){
		ESTADOCIVILMAE.options[i].selected = "true";
		break;}
		}
		$('#dadoscasamentopais').show();
}	
});

$('#SOCIOAFETIVO').click(function(){
if ($(this).is(":checked") == false ) {
	$(".socioafetivo").hide();
	}
else{
	$(".socioafetivo").show();
}

});


$(document).ready(function(){
if($('#TIPOASSENTO').val() == 'REGISTROT'){
	
$('.oj').hide();
if ($('#ACERVOFISICO').is(":checked") == false ){
$('#containerselo').show();
$('#ATONASCIMENTO').prop("disabled",false);
$('#containerselorest1').hide();
$('#containerselorest2').hide();
$('#TIPOPAPELSEGURANCA').prop('disabled',false);$('#NUMEROPAPELSEGURANCA').prop('disabled',false);
$('#DNV').prop('required',false);
}		
} 

else if($('#TIPOASSENTO').val() == 'RESTAURACAO'){
$('#containerselo').hide();
$('#ATONASCIMENTO').prop("disabled",true);
$('#containerselorest1').show();
$('#containerselorest2').show();	
$('.oj').hide();
$('#TIPOPAPELSEGURANCA').prop('disabled',true);$('#NUMEROPAPELSEGURANCA').prop('disabled',true);
$('#DNV').prop('required',false);		
}
else if($('#TIPOASSENTO').val() == 'ORDEM' ){
$('#dec').html('<input type="text" id="QUALIDADEDECLARANTE" name="QUALIDADEDECLARANTE" class="form-control" required="" readonly="" disabled="" value="NULL">');	
$('.oj').show();
if ($('#ACERVOFISICO').is(":checked") == false ){
$('#containerselo').show();
$('#ATONASCIMENTO').prop("disabled",false);
$('#containerselorest1').hide();
$('#containerselorest2').hide();
$('#TIPOPAPELSEGURANCA').prop('disabled',false);$('#NUMEROPAPELSEGURANCA').prop('disabled',false);
$('#DNV').prop('required',false);
}		
}
else if($('#TIPOASSENTO').val() == 'COMUN'){
//$('#dec').html('<select id="QUALIDADEDECLARANTE" name="QUALIDADEDECLARANTE" class="form-control" required=""><option value=""> Selecione</option><option value="PAI">PAI</option><option value="MAE">MÃE</option><option value="AMBOSPAI">AMBOS OS PAIS</option><option value="OUTRO">OUTRO</option><option value="IGNORADO">IGNORADO</option></select>');	
$('.oj').hide();
if ($('#ACERVOFISICO').is(":checked") == false ){
$('#containerselo').show();
$('#ATONASCIMENTO').prop("disabled",false);
$('#containerselorest1').hide();
$('#containerselorest2').hide();
$('#TIPOPAPELSEGURANCA').prop('disabled',false);$('#NUMEROPAPELSEGURANCA').prop('disabled',false);
$('#DNV').prop('required',true);
}	
}


if ($('#NOMEPAISOCIO').val()!='' || $('#NOMEMAESOCIO').val()!='') {
	$(".socioafetivo").show();
}


});



/*
$('#ATONASCIMENTO').change(function(){
	if ($(this).val() == '14.11') {
		$('#LIVRONASCIMENTO, #FOLHANASCIMENTO,#TERMONASCIMENTO').prop('readonly', false).val('');
	}
	else{
		$('#LIVRONASCIMENTO, #FOLHANASCIMENTO,#TERMONASCIMENTO').prop('readonly', true);
	}
})
*/

