<?php 
$tabela = "registro_obito_novo AS n left JOIN info_registros_civil AS i ON i.id_registro_obito = n.ID where n.ID = '$id'";
$id = $_GET['id'];
$pdo = conectar();
$busca = $pdo->prepare("SELECT * FROM $tabela");
$busca->execute();
$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
$json_dados = json_encode($linhas);
$json_dados = json_decode($json_dados, true); 
$dados = json_encode($json_dados[0],JSON_UNESCAPED_UNICODE);
$dados = addslashes($dados);
?>


<script type="text/javascript">
function preencher_campos(){

var dados = JSON.parse('<?=$dados?>');
if (dados.TERMOOBITO!='' && dados.TERMOOBITO !=null) {
$('#status_registro').val('concluido');	
}

if (dados.SELO!='' && dados.SELO!=null) {
$('#botaoseloregistro').hide();	
}

$("#LIVROOBITO").val(dados.LIVROOBITO);
$("#FOLHAOBITO").val(dados.FOLHAOBITO);
$("#TERMOOBITO").val(dados.TERMOOBITO);
$("#MATRICULA").val(dados.MATRICULA);
$("#TIPOPAPELSEGURANCA").val(dados.TIPOPAPELSEGURANCA);
$("#NUMEROPAPELSEGURANCA").val(dados.NUMEROPAPELSEGURANCA);
$("#NOME").val(dados.NOME);
$("#CPF").val(dados.CPF);
$("#COR").val(dados.COR);
$("#SEXO").val(dados.SEXO);
$("#DEIXOUFILHOS").val(dados.DEIXOUFILHOS);
$("#ELEITOR").val(dados.ELEITOR);
$("#DEIXOUBENS").val(dados.DEIXOUBENS);
$("#TIPOLIVRO").val(dados.TIPOLIVRO);
$("#TIPOMORTE").val(dados.TIPOMORTE);
$("#GEMEO").val(dados.GEMEO);
$("#QUALIDADEDECLARANTE").val(dados.QUALIDADEDECLARANTE);
$("#NOMEDECLARANTE").val(dados.NOMEDECLARANTE);
if (dados.QUALIDADEDECLARANTE == 'OUTRO') {$(".outrodeclarante").show();}
$("#CPFDECLARANTE").val(dados.CPFDECLARANTE);
$("#JUIZMANDATO").val(dados.JUIZMANDATO);
$("#VARAMANDATO").val(dados.VARAMANDATO);
$("#DATAEXPEDICAOMANDATO").val(dados.DATAEXPEDICAOMANDATO);
$("#NUMEROMANDATO").val(dados.NUMEROMANDATO);
$("#DATASENTENCAMANDATO").val(dados.DATASENTENCAMANDATO);
$("#DATAOBITO").val(dados.DATAOBITO);
$("#HORAOBITO").val(dados.HORAOBITO);
$("#TIPOLOCALOBITO").val(dados.TIPOLOCALOBITO);
$("#LOCALMORTE").val(dados.LOCALMORTE);
$("#ENDERECOOBITO").val(dados.ENDERECOOBITO);
$("#CIDADEOBITO").val(dados.CIDADEOBITO);
$("#CAUSAOBITO").val(dados.CAUSAOBITO);
$("#NDO").val(dados.NDO);
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
$("#RGDECLARANTE").val(dados.RGDECLARANTE);
$("#ORGAOEMISSORDECLARANTE").val(dados.ORGAOEMISSORDECLARANTE);
$("#NACIONALIDADEDECLARANTE").val(dados.NACIONALIDADEDECLARANTE);
$("#NATURALIDADEDECLARANTE").val(dados.NATURALIDADEDECLARANTE);
$("#DATANASCIMENTODECLARANTE").val(dados.DATANASCIMENTODECLARANTE);
$("#SEXODECLARANTE").val(dados.SEXODECLARANTE);
$("#ESTADOCIVILDECLARANTE").val(dados.ESTADOCIVILDECLARANTE);
$("#PROFISSAODECLARANTE").val(dados.PROFISSAODECLARANTE);
$("#ENDERECODECLARANTE").val(dados.ENDERECODECLARANTE);
$("#BAIRRODECLARANTE").val(dados.BAIRRODECLARANTE);
$("#CIDADEDECLARANTE").val(dados.CIDADEDECLARANTE);
$("#ESTADOCIVIL").val(dados.ESTADOCIVIL);
$("#PROFISSAO").val(dados.PROFISSAO);
$("#ENDERECO").val(dados.ENDERECO);
$("#BAIRRO").val(dados.BAIRRO);
$("#CIDADE").val(dados.CIDADE);
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
$("#RG").val(dados.RG);
$("#ORGAOEMISSOR").val(dados.ORGAOEMISSOR);
$("#NACIONALIDADE").val(dados.NACIONALIDADE);
$("#NATURALIDADE").val(dados.NATURALIDADE);
$("#DATANASCIMENTO").val(dados.DATANASCIMENTO);
$("#LOCALMORTE").val(dados.LOCALMORTE);
$("#LOCALSEPULTAMENTO").val(dados.LOCALSEPULTAMENTO);

if (dados.ROGODECLARANTE !='' && dados.ROGODECLARANTE!=null) {$(".DADOSROGODECLARANTE").show();}
if (dados.ROGOPAI !='' && dados.ROGOPAI!=null) {$(".DADOSROGOPAI").show();}
if (dados.ROGOMAE !='' && dados.ROGOMAE!=null) {$(".DADOSROGOMAE").show();}
if (dados.ROGOPAISOCIO !='' && dados.ROGOPAISOCIO != null) {$(".DADOSROGOPAISOCIO").show();}
if (dados.ROGOMAESOCIO !='' && dados.ROGOMAESOCIO !=null ) {$(".DADOSROGOMAESOCIO").show();}


$("#ATOOBITO").val(dados.ATOOBITO);
$("#TIPOPAPELSEGURANCA").val(dados.TIPOPAPELSEGURANCA);
$("#NUMEROPAPELSEGURANCA").val(dados.NUMEROPAPELSEGURANCA);
$("#EXIBIROBSREGISTRO").val(dados.obs_visivel_certidao);
//tinymce.get("OBSERVACOESREGISTRO").setContent(dados.observacoes_registro);  
//tinymce.get("INTEIROTEOR").setContent(dados.inteiro_teor);  
}	
</script>