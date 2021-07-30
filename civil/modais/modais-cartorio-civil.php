<div class="modal fade  " id="crc" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content bg-grey">
                     <div class="alert bg-grey alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <h2 class="text-center">
                              <i class="material-icons">backup</i> CRC </h2>
                              <p class="text-center">
<select class="form-control" id="docs">
<option value="0">selecione</option>
<option value="1">CASAMENTO </option>
<!--option value="2">CASAMENTO - AVERBAÇÕES/ANOTAÇÕES</option-->
<option value="3">NASCIMENTO  </option>
<option value="4">NASCIMENTO - AVERBAÇÕES/ANOTAÇÕES </option>
<option value="5">ÓBITO  </option>
<!--option value="6">ÓBITO - AVERBAÇÕES/ANOTAÇÕES </option-->



</select>
</p>        
</div>
</div>
</div>
</div>

<div class="modal fade  " id="ibge" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content bg-orange">
                     <div class="alert bg-orange alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <h2 class="text-center">
                              <i class="material-icons">backup</i> IBGE </h2>
                              <p class="text-center">
<select class="form-control" id="docs2">
<option value="0">selecione</option>
<!--option value="1">CASAMENTO </option-->
<option value="2">GERAR ARQUIVO COMPACTADO</option>
<!--option value="3">ÓBITOS</option>
<option value="4">ÓBITOS FETAIS </option-->




</select>
</p>        
</div>
</div>
</div>
</div>


<div class="modal fade  " id="sirc" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content bg-grey">
                     <div class="alert bg-grey alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <h2 class="text-center">
                              <i class="material-icons">backup</i> SIRC </h2>
                              <p class="text-center">
<select class="form-control" id="sircdocs">
<option value="0">selecione</option>
<option value="1">CASAMENTO </option>
<!--option value="2">CASAMENTO - AVERBAÇÕES</option-->
<option value="3">NASCIMENTO  </option>
<!--option value="4">NASCIMENTO - AVERBAÇÕES </option-->
<option value="5">ÓBITO  </option>
<!--option value="6">ÓBITO - AVERBAÇÕES </option-->



</select>
</p>        
</div>
</div>
</div>
</div>




<div class="modal fade  " id="infodip" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-sm" role="document">
                    <div class="modal-content bg-grey">
                     <div class="alert bg-grey alert-dismissible" role="alert">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                               <h2 class="text-center">
                              <i class="material-icons">backup</i> INFODIP </h2>
                              <p class="text-center">
<select class="form-control" id="docsinfodip">
<option value="0">selecione</option>
<!--option value="1">CASAMENTO </option-->
<option value="2">ARQUIVO DE ÓBITOS</option>
<!--option value="3">ÓBITOS</option>
<option value="4">ÓBITOS FETAIS </option-->




</select>
</p>        
</div>
</div>
</div>
</div>


<script type="text/javascript">
function pdfs(modal){
var modal = modal;
if (modal == 'crc') {	
var select = document.getElementById('docs');
var id = id;

select.onchange = function(){
if (this.value == 1 ) {
    window.location="exportar-crc-registro.php";
}
if (this.value == 2 ) {
    window.location="exportar-crc-registro-averbacoes.php";
}
if (this.value == 3) {
    window.location="exportar-crc-registro-nascimento.php";
}
if (this.value == 4) {
    window.location="exportar-crc-registro-averbacoes-nascimento.php";
}
if (this.value == 5) {
    window.location="exportar-crc-registro-obito.php";
}
if (this.value == 6) {
    window.location="exportar-crc-registro-averbacoes-obito.php";
}
}
}


//end if variavel modal ---------------------------------------------------------

if (modal == 'ibge') { 
var select = document.getElementById('docs2');
var id = id;

select.onchange = function(){
if (this.value == 1 ) {
    window.location="exportar-ibge-registro-casamento.php";
}
if (this.value == 2 ) {
    window.location="exportar-ibge-registro-nascimento.php";
}
if (this.value == 3) {
    window.location="exportar-ibge-registro-nascimento.php";
}
if (this.value == 4) {
    window.location="exportar-ibge-averbacao-nascimento.php";
}
if (this.value == 5) {
    window.location="exportar-ibge-registro-obito.php";
}
if (this.value == 6) {
    window.location="exportar-ibge-averbacao-obito.php";
}
}
}

//end if variavel modal ---------------------------------------------------------



if (modal == 'infodip') { 
var select = document.getElementById('docsinfodip');
var id = id;

select.onchange = function(){

if (this.value == 2 ) {
    window.location="exportar-infodip-registro-obito.php";
}
}
}


//end if variavel modal ---------------------------------------------------------



if (modal == 'sirc') { 
var select = document.getElementById('sircdocs');
var id = id;

select.onchange = function(){
if (this.value == 1 ) {
    window.location="exportar-sirc-registro.php";
}
if (this.value == 2 ) {
    window.location="exportar-sirc-registro-averbacoes.php";
}
if (this.value == 3) {
    window.location="exportar-sirc-registro-nascimento.php";
}
if (this.value == 4) {
    window.location="exportar-sirc-registro-averbacoes-nascimento.php";
}
if (this.value == 5) {
    window.location="exportar-sirc-registro-obito.php";
}
if (this.value == 6) {
    window.location="exportar-sirc-registro-averbacoes-obito.php";
}
}
}


//end if variavel modal ---------------------------------------------------------

}

</script>
