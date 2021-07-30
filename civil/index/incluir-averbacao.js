var id = $('#hiddenId').val();
var livro = $('#strLivro').val();
var folha = $('#strFolha').val();

//----------------------------------------------------------------------------------------------------------------------
//                                                  AVERBAÇÕES EM CASAMENTO                                           |
//----------------------------------------------------------------------------------------------------------------------

$('#Conjuge1').keyup(function(){
$(this).css("background-color", "#99d9ff");
$('#c1chek').html('<a id="salvarC1" class="waves-effect btn bg-red"><i class="material-icons">save</i></a>');
var Conjuge1 = $(this).val();
$('#salvarC1').click(function salvarC1(){
$.post('../consultas/averbacoes-db.php', {'Conjuge1':Conjuge1, 'id':id}, function(data) {
$("#resultado2").html(data);
});
$('#c1chek').html('');
});
});
//----------------------------------------------------------------------------------------------------------------------

$('#sexoConjuge1').keyup(function(){
$(this).css("background-color", "#99d9ff");
$('#s1chek').html('<a id="salvarS1" class="waves-effect btn bg-red"><i class="material-icons">save</i></a>');
var sexoConjuge1 = $(this).val();
$('#salvarS1').click(function salvarS1(){
$.post('../consultas/averbacoes-db.php', {'sexoConjuge1':sexoConjuge1, 'id':id}, function(data) {
$("#resultado2").html(data);
});
$('#s1chek').html('');
});
});
//----------------------------------------------------------------------------------------------------------------------
$('#Conjuge2').keyup(function(){
$(this).css("background-color", "#99d9ff");
$('#c2chek').html('<a id="salvarC2" class="waves-effect btn bg-red"><i class="material-icons">save</i></a>');
var Conjuge2 = $(this).val();
$('#salvarC2').click(function salvarC2(){
$.post('../consultas/averbacoes-db.php', {'Conjuge2':Conjuge2, 'id':id}, function(data) {
$("#resultado2").html(data);
});
$('#c2chek').html('');
});
});
//----------------------------------------------------------------------------------------------------------------------

$('#sexoConjuge2').keyup(function(){
$(this).css("background-color", "#99d9ff");
$('#s2chek').html('<a id="salvarS2" class="waves-effect btn bg-red"><i class="material-icons">save</i></a>');
var sexoConjuge2 = $(this).val();
$('#salvarS2').click(function salvarS2(){
$.post('../consultas/averbacoes-db.php', {'sexoConjuge2':sexoConjuge2, 'id':id}, function(data) {
$("#resultado2").html(data);
});
$('#s2chek').html('');
});
});
//----------------------------------------------------------------------------------------------------------------------
$('#regime').change(function(){
$(this).css("background-color", "#99d9ff");
$('#rchek').html('<a id="salvarRegime" class="waves-effect btn bg-red"><i class="material-icons">save</i></a>');
var regime = $(this).val();
$('#salvarRegime').click(function salvarRegime(){
$.post('../consultas/averbacoes-db.php', {'regime':regime, 'id':id}, function(data) {
$("#resultado2").html(data);
});
$('#rchek').html('');
});
});
//----------------------------------------------------------------------------------------------------------------------
//                                                  AVERBAÇÕES EM NASCIMENTO                                           |
//----------------------------------------------------------------------------------------------------------------------
$('#nome').keyup(function(){
$(this).css("background-color", "#99d9ff");
$('#registradochek').html('<a id="salvarnome" class="waves-effect btn bg-red"><i class="material-icons">save</i></a>');
var nome = $(this).val();
$('#salvarnome').click(function salvarnome(){
$.post('../consultas/averbacoes-db.php', {'nome':nome, 'id':id}, function(data) {
$("#resultado3").html(data);
});
$('#registradochek').html('');
});
});
$('#sexo').keyup(function(){
$(this).css("background-color", "#99d9ff");
$('#sexoregistradochek').html('<a id="salvarsexo" class="waves-effect btn bg-red"><i class="material-icons">save</i></a>');
var sexo = $(this).val();
$('#salvarsexo').click(function salvarsexo(){
$.post('../consultas/averbacoes-db.php', {'sexo':sexo, 'id':id}, function(data) {
$("#resultado3").html(data);
});
$('#sexoregistradochek').html('');
});
});
$('#genitor_mae').keyup(function(){
$(this).css("background-color", "#99d9ff");
$('#genitor_maeregistradochek').html('<a id="salvargenitor_mae" class="waves-effect btn bg-red"><i class="material-icons">save</i></a>');
var genitor_mae = $(this).val();
$('#salvargenitor_mae').click(function salvargenitor_mae(){
$.post('../consultas/averbacoes-db.php', {'genitor_mae':genitor_mae, 'id':id}, function(data) {
$("#resultado3").html(data);
});
$('#genitor_maeregistradochek').html('');
});
});
$('#genitor').keyup(function(){
$(this).css("background-color", "#99d9ff");
$('#genitorregistradochek').html('<a id="salvargenitor" class="waves-effect btn bg-red"><i class="material-icons">save</i></a>');
var genitor = $(this).val();
$('#salvargenitor').click(function salvargenitor(){
$.post('../consultas/averbacoes-db.php', {'genitor':genitor, 'id':id}, function(data) {
$("#resultado3").html(data);
});
$('#genitorregistradochek').html('');
});
});

//----------------------------------------------------------------------------------------------------------------------
//                                                  AVERBAÇÕES EM OBITO                                               |
//----------------------------------------------------------------------------------------------------------------------

$('#tipomorte').change(function(){
$(this).css("background-color", "#99d9ff");
$('#tipomortechek').html('<a id="salvartipomorte" class="waves-effect btn bg-red"><i class="material-icons">save</i></a>');
var tipomorte = $(this).val();
$('#salvartipomorte').click(function salvartipomorte(){
$.post('../consultas/averbacoes-db.php', {'tipomorte':tipomorte, 'id':id}, function(data) {
$("#resultado4").html(data);
});
$('#tipomortechek').html('');
});
});

$('#causamorteantecedentes').keyup(function(){
$(this).css("background-color", "#99d9ff");
$('#causamortechek').html('<a id="salvarcausamorteantecedentes" class="waves-effect btn bg-red"><i class="material-icons">save</i></a>');
var causamorteantecedentes = $(this).val();
$('#salvarcausamorteantecedentes').click(function salvarcausamorteantecedentes(){
$.post('../consultas/averbacoes-db.php', {'causamorteantecedentes':causamorteantecedentes, 'id':id}, function(data) {
$("#resultado4").html(data);
});
$('#causamortechek').html('');
});
});

//----------------------------------------------------------------------------------------------------------------------
//                                                TEXTO DA AVERBAÇÃO                                                    |
//----------------------------------------------------------------------------------------------------------------------

$('#strAverbacao').keyup(function(){
//$('#averbacaotextochek').html('<a id="salvarstrAverbacao" class="waves-effect btn bg-red"><i class="material-icons">save</i> SALVAR O PRÉVIA</a>');
var strAverbacao = $(this).val();
salvarstrAverbacao();
function salvarstrAverbacao(){
$.post('../consultas/averbacoes-db.php', {'strAverbacao':strAverbacao, 'livro':livro, 'folha':folha, 'id':id}, function(data) {
$("#resultado5").html(data);
});

}
});