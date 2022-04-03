<?php 
$tabela = "registro_nascimento_novo AS n left JOIN info_registros_civil AS i ON i.id_registro_nascimento = n.ID where n.ID = '$id'";
$id = $_GET['id'];
$pdo = conectar();
$busca = $pdo->prepare("SELECT * FROM $tabela");
$busca->execute();
$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
$json_dados = json_encode($linhas);
$json_dados = json_decode($json_dados, true); 
$dados = json_encode($json_dados[0],JSON_UNESCAPED_UNICODE);
$dados = addslashes($dados);
foreach($linhas as $b){
$dadosadd = $b->JSON_DADOS_ADD;	
}
?>


<script type="text/javascript">
function preencher_campos(){

var dados = JSON.parse('<?=$dados?>');
if (dados.TERMONASCIMENTO!='' && dados.TERMONASCIMENTO !=null) {
$('#status_registro').val('concluido');	
}

if (dados.SELO!='' && dados.SELO!=null) {
$('#botaoseloregistro').hide();	
}

$("#LIVRONASCIMENTO").val(dados.LIVRONASCIMENTO);
$("#FOLHANASCIMENTO").val(dados.FOLHANASCIMENTO);
$("#TERMONASCIMENTO").val(dados.TERMONASCIMENTO);
$("#MATRICULA").val(dados.MATRICULA);
$("#TIPOPAPELSEGURANCA").val(dados.TIPOPAPELSEGURANCA);
$("#NUMEROPAPELSEGURANCA").val(dados.NUMEROPAPELSEGURANCA);
$("#NOMENASCIDO").val(dados.NOMENASCIDO);
$("#CPFNASCIDO").val(dados.CPFNASCIDO);
$("#NATURALIDADENASCIDO").val(dados.NATURALIDADENASCIDO);
$("#SEXONASCIDO").val(dados.SEXONASCIDO);
$("#GEMEOS").val(dados.GEMEOS);
if (dados.GEMEOS == 'S') {$("#infogemeos").show();}
$("#NOMEMATRICULAGEMEOS").val(dados.NOMEMATRICULAGEMEOS);
$("#QUALIDADEDECLARANTE").val(dados.QUALIDADEDECLARANTE);
$("#NOMEDECLARANTE").val(dados.NOMEDECLARANTE);
if (dados.QUALIDADEDECLARANTE == 'OUTRO') {$(".outrodeclarante").show();}
$("#CPFDECLARANTE").val(dados.CPFDECLARANTE);
$("#JUIZMANDATO").val(dados.JUIZMANDATO);
$("#VARAMANDATO").val(dados.VARAMANDATO);
$("#DATAEXPEDICAOMANDATO").val(dados.DATAEXPEDICAOMANDATO);
$("#NUMEROMANDATO").val(dados.NUMEROMANDATO);
$("#DATASENTENCAMANDATO").val(dados.DATASENTENCAMANDATO);
$("#DATANASCIMENTO").val(dados.DATANASCIMENTO);
$("#HORANASCIMENTO").val(dados.HORANASCIMENTO);
$("#TIPOLOCALNASCIMENTO").val(dados.TIPOLOCALNASCIMENTO);
$("#LOCALNASCIMENTO").val(dados.LOCALNASCIMENTO);
$("#ENDERECOLOCALNASCIMENTO").val(dados.ENDERECOLOCALNASCIMENTO);
$("#CIDADENASCIMENTO").val(dados.CIDADENASCIMENTO);
$("#DNV").val(dados.DNV);
$("#RANI").val(dados.RANI);
$("#MEDICO").val(dados.MEDICO);
$("#CRM").val(dados.CRM);
$("#NOMEPAI").val(dados.NOMEPAI);
$("#CPFPAI").val(dados.CPFPAI);
$("#NOMEMAE").val(dados.NOMEMAE);
$("#CPFMAE").val(dados.CPFMAE);
$("#NOMETESTEMUNHA1").val(dados.NOMETESTEMUNHA1);
$("#CPFTESTEMUNHA1").val(dados.CPFTESTEMUNHA1);
$("#NOMETESTEMUNHA2").val(dados.NOMETESTEMUNHA2);
$("#CPFTESTEMUNHA2").val(dados.CPFTESTEMUNHA2);
$("#NOMEROGODECLARANTE").val(dados.ROGODECLARANTE);
$("#ROGOPAI").val(dados.ROGOPAI);
$("#ROGOMAE").val(dados.ROGOMAE);
$("#NOMEPAISOCIO").val(dados.NOMEPAISOCIO);
$("#CPFPAISOCIO").val(dados.CPFPAISOCIO);
$("#ROGOPAISOCIO").val(dados.ROGOPAISOCIO);
$("#NOMEMAESOCIO").val(dados.NOMEMAESOCIO);
$("#CPFMAESOCIO").val(dados.CPFMAESOCIO);
$("#ROGOMAESOCIO").val(dados.ROGOMAESOCIO);
$("#RGPAI").val(dados.RGPAI);
$("#ORGAOEMISSORPAI").val(dados.ORGAOEMISSORPAI);
$("#NACIONALIDADEPAI").val(dados.NACIONALIDADEPAI);
$("#NATURALIDADEPAI").val(dados.NATURALIDADEPAI);
$("#DATANASCIMENTOPAI").val(dados.DATANASCIMENTOPAI);
$("#SEXOPAI").val(dados.SEXOPAI);
$("#ESTADOCIVILPAI").val(dados.ESTADOCIVILPAI);
$("#PROFISSAOPAI").val(dados.PROFISSAOPAI);
$("#ENDERECOPAI").val(dados.ENDERECOPAI);
$("#BAIRROPAI").val(dados.BAIRROPAI);
$("#CIDADEPAI").val(dados.CIDADEPAI);
$("#AVO1PATERNO").val(dados.AVO1PATERNO);
$("#AVO2PATERNO").val(dados.AVO2PATERNO);
$("#RGMAE").val(dados.RGMAE);
$("#ORGAOEMISSORMAE").val(dados.ORGAOEMISSORMAE);
$("#NACIONALIDADEMAE").val(dados.NACIONALIDADEMAE);
$("#NATURALIDADEMAE").val(dados.NATURALIDADEMAE);
$("#DATANASCIMENTOMAE").val(dados.DATANASCIMENTOMAE);
$("#SEXOMAE").val(dados.SEXOMAE);
$("#ESTADOCIVILMAE").val(dados.ESTADOCIVILMAE);
$("#PROFISSAOMAE").val(dados.PROFISSAOMAE);
$("#ENDERECOMAE").val(dados.ENDERECOMAE);
$("#BAIRROMAE").val(dados.BAIRROMAE);
$("#CIDADEMAE").val(dados.CIDADEMAE);
$("#AVO1MATERNO").val(dados.AVO1MATERNO);
$("#AVO2MATERNO").val(dados.AVO2MATERNO);

if (dados.ROGODECLARANTE !='' && dados.ROGODECLARANTE!=null) {$(".DADOSROGODECLARANTE").show();}
if (dados.ROGOPAI !='' && dados.ROGOPAI!=null) {$(".DADOSROGOPAI").show();}
if (dados.ROGOMAE !='' && dados.ROGOMAE!=null) {$(".DADOSROGOMAE").show();}
if (dados.ROGOPAISOCIO !='' && dados.ROGOPAISOCIO != null) {$(".DADOSROGOPAISOCIO").show();}
if (dados.ROGOMAESOCIO !='' && dados.ROGOMAESOCIO !=null ) {$(".DADOSROGOMAESOCIO").show();}


$("#ATONASCIMENTO").val(dados.ATONASCIMENTO);
$("#TIPOPAPELSEGURANCA").val(dados.TIPOPAPELSEGURANCA);
$("#NUMEROPAPELSEGURANCA").val(dados.NUMEROPAPELSEGURANCA);
$("#TIPOASSENTO").val(dados.TIPOASSENTO);
$("#EXIBIROBSREGISTRO").val(dados.obs_visivel_certidao);
//tinymce.get("OBSERVACOESREGISTRO").setContent(dados.observacoes_registro);  
//tinymce.get("INTEIROTEOR").setContent(dados.inteiro_teor);  

if (dados.JSON_DADOS_ADD!='') {
var dadosadd = JSON.parse('<?=$dadosadd?>');
}
if (dados.JSON_DADOS_ADD!='') {
if (typeof (dadosadd.IDPESSOAPAI)!== "undefined") {
$('#formularioPAI').hide();	
}
else{
$('#formularioPAI').show();	
}

if (typeof (dadosadd.IDPESSOAMAE)!== "undefined") {
$('#formularioMAE').hide();	
}
else{
$('#formularioMAE').show();	
}

if (typeof (dadosadd.IDPESSOADECLARANTE)!== "undefined") {
$('#formularioDECLARANTE').hide();	
}
else{
$('#formularioDECLARANTE').show();	
}
}


}	
</script>