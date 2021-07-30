<?php 
$busca_livro_obito = $pdo->prepare("SELECT * FROM livro_obitos WHERE Status = 'L' ORDER BY PaginaLivro limit 1");
$busca_livro_obito->execute();
$blo = $busca_livro_obito->fetch(PDO::FETCH_ASSOC);
$livro_obito = $blo['identifcadorLivro'];
$folha_obito = $blo['PaginaLivro'];
$termo_obito = str_pad($blo['LivroInicial'],7,"0",STR_PAD_LEFT) ;

$busca_livro_obito_auxiliar = $pdo->prepare("SELECT * FROM `livro_obitos_auxiliar` WHERE Status = 'L' limit 1");
$busca_livro_obito_auxiliar->execute();
$bla = $busca_livro_obito_auxiliar->fetch(PDO::FETCH_ASSOC);
$livro_obito_auxiliar = $bla['identifcadorLivro'];
$folha_obito_auxiliar = $bla['PaginaLivro'];
$termo_obito_auxiliar = str_pad($bla['LivroInicial'],7,"0",STR_PAD_LEFT) ;
$busca_dados = PESQUISA_ALL_ID('registro_obito_novo',$id);

$parte1 = '';
$parte2 = '';
$parte3 = '';
$parte4 = '';




foreach ($busca_dados as $b):


if (empty($b->DATAOBITO)) {
$parte1 = 'in active';
$parte2 = '';
$parte3 = '';
$parte4 = '';
}

elseif (!empty($b->DATAOBITO) && empty($b->NOME)) {
$parte1 = '';
$parte2 = 'in active';
$parte3 = '';
$parte4 = '';
}

else{
$parte1 = '';
$parte2 = '';
$parte3 = '';
$parte4 = 'in active';	
}

$crm = explode("/", $b->CRM);
if (isset($crm[0])) {
$num_crm = $crm[0];	
}
else{
$num_crm = '';	
}

if (isset($crm[1])) {
$uf_crm = $crm[1];	
}
else{
	$uf_crm = '';
}

$livro_obt = $b->LIVROOBITO;
$folha_obt = $b->FOLHAOBITO;
$termo_obt = $b->TERMOOBITO;
$tipo_acervo = $b->status;

	?>
<script type="text/javascript">
	function PREENCHERDADOS(){
		
		var ATOOBITO = document.getElementById("ATOOBITO");	
		for (var i = 0; i < ATOOBITO.options.length; i++){
		if (ATOOBITO.options[i].value == '<?=$b->ATOOBITO?>'){
		ATOOBITO.options[i].selected = "true";
		break;}
		}

			var LIVROobt = '<?=$b->LIVROOBITO?>';
			var FOLHAobt = '<?=$b->FOLHAOBITO?>';
			var TERMOobt = '<?=$b->TERMOOBITO?>';
				
			if (LIVROobt =='' || FOLHAobt =='' || TERMOobt =='') {
			$('#TIPOLIVRO').change(function(){
			if ($('#ACERVOFISICO').is(":checked") == false) {	
				if ($(this).val() == '5') {
					$('#LIVROOBITO').val('<?=$livro_obito_auxiliar?>');
					$('#FOLHAOBITO').val('<?=$folha_obito_auxiliar?>');
					$('#TERMOOBITO').val('<?=$termo_obito_auxiliar?>');
				}
				else{
					$('#LIVROOBITO').val('<?=$livro_obito?>');
					$('#FOLHAOBITO').val('<?=$folha_obito?>');
					$('#TERMOOBITO').val('<?=$termo_obito?>');
				}
			}	
			});

			}
			else{
			$('#LIVROOBITO').val('<?=$b->LIVROOBITO?>');
			$('#FOLHAOBITO').val('<?=$b->FOLHAOBITO?>');
			$('#TERMOOBITO').val('<?=$b->TERMOOBITO?>');
			}


		$('#MATRICULA').val('<?=$b->MATRICULA?>');
		$('#SELO2').val('<?=$b->SELO?>');
		$('#DATAENTRADA').val('<?=$b->DATAENTRADA?>');
		var TIPOASSENTO = document.getElementById("TIPOASSENTO");	
		for (var i = 0; i < TIPOASSENTO.options.length; i++){
		if (TIPOASSENTO.options[i].value == '<?=$b->TIPOASSENTO?>'){
		TIPOASSENTO.options[i].selected = "true";
		break;}
		}
		var TIPOPAPELSEGURANCA = document.getElementById("TIPOPAPELSEGURANCA");	
		for (var i = 0; i < TIPOPAPELSEGURANCA.options.length; i++){
		if (TIPOPAPELSEGURANCA.options[i].value == '<?=$b->TIPOPAPELSEGURANCA?>'){
		TIPOPAPELSEGURANCA.options[i].selected = "true";
		break;}
		}
		var TIPOLIVRO = document.getElementById("TIPOLIVRO");	
		for (var i = 0; i < TIPOLIVRO.options.length; i++){
		if (TIPOLIVRO.options[i].value == '<?=$b->TIPOLIVRO?>'){
		TIPOLIVRO.options[i].selected = "true";
		break;}
		}
		$('#NUMEROPAPELSEGURANCA').val('<?=$b->NUMEROPAPELSEGURANCA?>');
		$('#NDO').val('<?=$b->NDO?>');
					//-------------- DADOS DECLARANTE -----------------------------------
		$('#QUALIDADEDECLARANTE').val('<?=$b->QUALIDADEDECLARANTE?>');
		$('#NOMEDECLARANTE').val('<?=addslashes($b->NOMEDECLARANTE)?>');
		$('#CPFDECLARANTE').val('<?=$b->CPFDECLARANTE?>');
		$('#RGDECLARANTE').val('<?=$b->RGDECLARANTE?>');
		$('#ORGAOEMISSORDECLARANTE').val('<?=$b->ORGAOEMISSORDECLARANTE?>');
		$('#NACIONALIDADEDECLARANTE').val('<?=$b->NACIONALIDADEDECLARANTE?>');
		$('#NATURALIDADEDECLARANTE').val('<?=addslashes($b->NATURALIDADEDECLARANTE)?>');
		$('#DATANASCIMENTODECLARANTE').val('<?=$b->DATANASCIMENTODECLARANTE?>');
		var SEXODECLARANTE = document.getElementById("SEXODECLARANTE");	
		for (var i = 0; i < SEXODECLARANTE.options.length; i++){
		if (SEXODECLARANTE.options[i].value == '<?=$b->SEXODECLARANTE?>'){
		SEXODECLARANTE.options[i].selected = "true";
		break;}
		}
		var ESTADOCIVILDECLARANTE = document.getElementById("ESTADOCIVILDECLARANTE");	
		for (var i = 0; i < ESTADOCIVILDECLARANTE.options.length; i++){
		if (ESTADOCIVILDECLARANTE.options[i].value == '<?=$b->ESTADOCIVILDECLARANTE?>'){
		ESTADOCIVILDECLARANTE.options[i].selected = "true";
		break;}
		}
		$('#PROFISSAODECLARANTE').val('<?=addslashes($b->PROFISSAODECLARANTE)?>');
		$('#ENDERECODECLARANTE').val('<?=addslashes($b->ENDERECODECLARANTE)?>');
		$('#BAIRRODECLARANTE').val('<?=addslashes($b->BAIRRODECLARANTE)?>');
		$('#CIDADEDECLARANTE').val('<?=addslashes($b->CIDADEDECLARANTE)?>');
		$('#JUIZMANDATO').val('<?=$b->JUIZMANDATO?>');
		$('#VARAMANDATO').val('<?=$b->VARAMANDATO?>');
		$('#DATAEXPEDICAOMANDATO').val('<?=$b->DATAEXPEDICAOMANDATO?>');
		$('#NUMEROMANDATO').val('<?=$b->NUMEROMANDATO?>');
		$('#DATASENTENCAMANDATO').val('<?=$b->DATASENTENCAMANDATO?>');

		$('#LOCALMORTE').val('<?=addslashes($b->LOCALMORTE)?>');
		$('#ENDERECOOBITO').val('<?=addslashes($b->ENDERECOOBITO)?>');
		$('#TIPOLOCALOBITO').val('<?=$b->TIPOLOCALOBITO?>');
		$('#CIDADEOBITO').val('<?=addslashes($b->CIDADEOBITO)?>');
		$('#DATAOBITO').val('<?=$b->DATAOBITO?>');
		$('#HORAOBITO').val('<?=$b->HORAOBITO?>');
		$('#CAUSAOBITO').val('<?=$b->CAUSAOBITO?>');
		$('#CAUSAOBITOB').val('<?=$b->CAUSAOBITOB?>');
		$('#CAUSAOBITOC').val('<?=$b->CAUSAOBITOC?>');
		$('#CAUSAOBITOD').val('<?=$b->CAUSAOBITOD?>');
		$('#HORAOBITO').val('<?=$b->HORAOBITO?>');
		$('#TIPOMORTE').val('<?=$b->TIPOMORTE?>');
		$('#LOCALSEPULTAMENTO').val('<?=$b->LOCALSEPULTAMENTO?>');
		$('#MEDICO').val('<?=$b->MEDICO?>');
		$('#CRM').val('<?=$num_crm?>');
		$('#UFCRM').val('<?=$uf_crm?>');
		//-------------- DADOS PAI -----------------------------------
		$('#NOMEPAI').val('<?=addslashes($b->NOMEPAI)?>');
		$('#CPFPAI').val('<?=$b->CPFPAI?>');
		$('#RGPAI').val('<?=$b->RGPAI?>');
		$('#ORGAOEMISSORPAI').val('<?=$b->ORGAOEMISSORPAI?>');
		$('#NACIONALIDADEPAI').val('<?=$b->NACIONALIDADEPAI?>');
		$('#NATURALIDADEPAI').val('<?=addslashes($b->NATURALIDADEPAI)?>');
		$('#DATANASCIMENTOPAI').val('<?=$b->DATANASCIMENTOPAI?>');
		var SEXOPAI = document.getElementById("SEXOPAI");	
		for (var i = 0; i < SEXOPAI.options.length; i++){
		if (SEXOPAI.options[i].value == '<?=$b->SEXOPAI?>'){
		SEXOPAI.options[i].selected = "true";
		break;}
		}
		var ESTADOCIVILPAI = document.getElementById("ESTADOCIVILPAI");	
		for (var i = 0; i < ESTADOCIVILPAI.options.length; i++){
		if (ESTADOCIVILPAI.options[i].value == '<?=$b->ESTADOCIVILPAI?>'){
		ESTADOCIVILPAI.options[i].selected = "true";
		break;}
		}
		$('#PROFISSAOPAI').val('<?=addslashes($b->PROFISSAOPAI)?>');
		$('#ENDERECOPAI').val('<?=addslashes($b->ENDERECOPAI)?>');
		$('#BAIRROPAI').val('<?=addslashes($b->BAIRROPAI)?>');
		$('#CIDADEPAI').val('<?=addslashes($b->CIDADEPAI)?>');

		//-------------- DADOS MAE -----------------------------------
		$('#NOMEMAE').val('<?=addslashes($b->NOMEMAE)?>');
		$('#CPFMAE').val('<?=$b->CPFMAE?>');
		$('#RGMAE').val('<?=$b->RGMAE?>');
		$('#ORGAOEMISSORMAE').val('<?=$b->ORGAOEMISSORMAE?>');
		$('#NACIONALIDADEMAE').val('<?=$b->NACIONALIDADEMAE?>');
		$('#NATURALIDADEMAE').val('<?=addslashes($b->NATURALIDADEMAE)?>');
		$('#DATANASCIMENTOMAE').val('<?=$b->DATANASCIMENTOMAE?>');
		var SEXOMAE = document.getElementById("SEXOMAE");	
		for (var i = 0; i < SEXOMAE.options.length; i++){
		if (SEXOMAE.options[i].value == '<?=$b->SEXOMAE?>'){
		SEXOMAE.options[i].selected = "true";
		break;}
		}
		var ESTADOCIVILMAE = document.getElementById("ESTADOCIVILMAE");	
		for (var i = 0; i < ESTADOCIVILMAE.options.length; i++){
		if (ESTADOCIVILMAE.options[i].value == '<?=$b->ESTADOCIVILMAE?>'){
		ESTADOCIVILMAE.options[i].selected = "true";
		break;}
		}
		$('#PROFISSAOMAE').val('<?=addslashes($b->PROFISSAOMAE)?>');
		$('#ENDERECOMAE').val('<?=addslashes($b->ENDERECOMAE)?>');
		$('#BAIRROMAE').val('<?=addslashes($b->BAIRROMAE)?>');
		$('#CIDADEMAE').val('<?=addslashes($b->CIDADEMAE)?>');
	
		//-------------- DADOS TESTEMUNHA1 -----------------------------------
		$('#NOMETESTEMUNHA1').val('<?=$b->NOMETESTEMUNHA1?>');
		$('#CPFTESTEMUNHA1').val('<?=$b->CPFTESTEMUNHA1?>');
		$('#RGTESTEMUNHA1').val('<?=$b->RGTESTEMUNHA1?>');
		$('#ORGAOEMISSORTESTEMUNHA1').val('<?=$b->ORGAOEMISSORTESTEMUNHA1?>');
		$('#NACIONALIDADETESTEMUNHA1').val('<?=$b->NACIONALIDADETESTEMUNHA1?>');
		$('#NATURALIDADETESTEMUNHA1').val('<?=$b->NATURALIDADETESTEMUNHA1?>');
		$('#DATANASCIMENTOTESTEMUNHA1').val('<?=$b->DATANASCIMENTOTESTEMUNHA1?>');
		var SEXOTESTEMUNHA1 = document.getElementById("SEXOTESTEMUNHA1");	
		for (var i = 0; i < SEXOTESTEMUNHA1.options.length; i++){
		if (SEXOTESTEMUNHA1.options[i].value == '<?=$b->SEXOTESTEMUNHA1?>'){
		SEXOTESTEMUNHA1.options[i].selected = "true";
		break;}
		}
		var ESTADOCIVILTESTEMUNHA1 = document.getElementById("ESTADOCIVILTESTEMUNHA1");	
		for (var i = 0; i < ESTADOCIVILTESTEMUNHA1.options.length; i++){
		if (ESTADOCIVILTESTEMUNHA1.options[i].value == '<?=$b->ESTADOCIVILTESTEMUNHA1?>'){
		ESTADOCIVILTESTEMUNHA1.options[i].selected = "true";
		break;}
		}
		$('#PROFISSAOTESTEMUNHA1').val('<?=$b->PROFISSAOTESTEMUNHA1?>');
		$('#ENDERECOTESTEMUNHA1').val('<?=$b->ENDERECOTESTEMUNHA1?>');
		$('#BAIRROTESTEMUNHA1').val('<?=$b->BAIRROTESTEMUNHA1?>');
		$('#CIDADETESTEMUNHA1').val('<?=$b->CIDADETESTEMUNHA1?>');
		//-------------- DADOS TESTEMUNHA2 -----------------------------------
		$('#NOMETESTEMUNHA2').val('<?=$b->NOMETESTEMUNHA2?>');
		$('#CPFTESTEMUNHA2').val('<?=$b->CPFTESTEMUNHA2?>');
		$('#RGTESTEMUNHA2').val('<?=$b->RGTESTEMUNHA2?>');
		$('#ORGAOEMISSORTESTEMUNHA2').val('<?=$b->ORGAOEMISSORTESTEMUNHA2?>');
		$('#NACIONALIDADETESTEMUNHA2').val('<?=$b->NACIONALIDADETESTEMUNHA2?>');
		$('#NATURALIDADETESTEMUNHA2').val('<?=$b->NATURALIDADETESTEMUNHA2?>');
		$('#DATANASCIMENTOTESTEMUNHA2').val('<?=$b->DATANASCIMENTOTESTEMUNHA2?>');
		var SEXOTESTEMUNHA2 = document.getElementById("SEXOTESTEMUNHA2");	
		for (var i = 0; i < SEXOTESTEMUNHA2.options.length; i++){
		if (SEXOTESTEMUNHA2.options[i].value == '<?=$b->SEXOTESTEMUNHA2?>'){
		SEXOTESTEMUNHA2.options[i].selected = "true";
		break;}
		}
		var ESTADOCIVILTESTEMUNHA2 = document.getElementById("ESTADOCIVILTESTEMUNHA2");	
		for (var i = 0; i < ESTADOCIVILTESTEMUNHA2.options.length; i++){
		if (ESTADOCIVILTESTEMUNHA2.options[i].value == '<?=$b->ESTADOCIVILTESTEMUNHA2?>'){
		ESTADOCIVILTESTEMUNHA2.options[i].selected = "true";
		break;}
		}
		$('#PROFISSAOTESTEMUNHA2').val('<?=$b->PROFISSAOTESTEMUNHA2?>');
		$('#ENDERECOTESTEMUNHA2').val('<?=$b->ENDERECOTESTEMUNHA2?>');
		$('#BAIRROTESTEMUNHA2').val('<?=$b->BAIRROTESTEMUNHA2?>');
		$('#CIDADETESTEMUNHA2').val('<?=$b->CIDADETESTEMUNHA2?>');
				//-------------- DADOS FALECIDO -----------------------------------
		$('#NOME').val('<?=addslashes($b->NOME)?>');
		$('#CPF').val('<?=$b->CPF?>');
		$('#RG').val('<?=$b->RG?>');
		$('#ORGAOEMISSOR').val('<?=$b->ORGAOEMISSOR?>');
		$('#NACIONALIDADE').val('<?=$b->NACIONALIDADE?>');
		$('#NATURALIDADE').val('<?=addslashes($b->NATURALIDADE)?>');
		$('#DATANASCIMENTO').val('<?=$b->DATANASCIMENTO?>');
		var SEXO = document.getElementById("SEXO");	
		for (var i = 0; i < SEXO.options.length; i++){
		if (SEXO.options[i].value == '<?=$b->SEXO?>'){
		SEXO.options[i].selected = "true";
		break;}
		}
		var ESTADOCIVIL = document.getElementById("ESTADOCIVIL");	
		for (var i = 0; i < ESTADOCIVIL.options.length; i++){
		if (ESTADOCIVIL.options[i].value == '<?=$b->ESTADOCIVIL?>'){
		ESTADOCIVIL.options[i].selected = "true";
		break;}
		}
		$('#PROFISSAO').val('<?=addslashes($b->PROFISSAO)?>');
		$('#ENDERECO').val('<?=addslashes($b->ENDERECO)?>');
		$('#BAIRRO').val('<?=addslashes($b->BAIRRO)?>');
		$('#CIDADE').val('<?=addslashes($b->CIDADE)?>');
		var COR = document.getElementById("COR");	
		for (var i = 0; i < COR.options.length; i++){
		if (COR.options[i].value == '<?=$b->COR?>'){
		COR.options[i].selected = "true";
		break;}
		}
				var GEMEO = document.getElementById("GEMEO");	
		for (var i = 0; i < GEMEO.options.length; i++){
		if (GEMEO.options[i].value == '<?=$b->GEMEO?>'){
		GEMEO.options[i].selected = "true";
		break;}
		}
		var ELEITOR = document.getElementById("ELEITOR");	
		for (var i = 0; i < ELEITOR.options.length; i++){
		if (ELEITOR.options[i].value == '<?=$b->ELEITOR?>'){
		ELEITOR.options[i].selected = "true";
		break;}
		}
		var DEIXOUFILHOS = document.getElementById("DEIXOUFILHOS");	
		for (var i = 0; i < DEIXOUFILHOS.options.length; i++){
		if (DEIXOUFILHOS.options[i].value == '<?=$b->DEIXOUFILHOS?>'){
		DEIXOUFILHOS.options[i].selected = "true";
		break;}
		}
				var DEIXOUBENS = document.getElementById("DEIXOUBENS");	
		for (var i = 0; i < DEIXOUBENS.options.length; i++){
		if (DEIXOUBENS.options[i].value == '<?=$b->DEIXOUBENS?>'){
		DEIXOUBENS.options[i].selected = "true";
		break;}
		}
			$('#TEMPOINTRAUTERINA').val('<?=$b->TEMPOINTRAUTERINA?>');
			$('#NOMEFILHOS').val('<?=$b->NOMEFILHOS?>');
			$('#NOMECONJUGE').val('<?=$b->NOMECONJUGE?>');
			$('#CARTORIOCASAMENTO').val('<?=$b->CARTORIOCASAMENTO?>');

			$('#strNumeroRg').val('<?=$b->strNumeroRg?>');
			$('#dataExpRg').val('<?=$b->dataExpRg?>');
			$('#dataValidadeRg').val('<?=$b->dataValidadeRg?>');
			$('#OrgaoExpRg').val('<?=$b->OrgaoExpRg?>');

			$('#strPisNis').val('<?=$b->strPisNis?>');
			$('#dataExpPisNis').val('<?=$b->dataExpPisNis?>');
			$('#dataValidadePisNis').val('<?=$b->dataValidadePisNis?>');
			$('#OrgaoExpPisNis').val('<?=$b->OrgaoExpPisNis?>');

			$('#strPassaporte').val('<?=$b->strPassaporte?>');
			$('#dataExpPassaporte').val('<?=$b->dataExpPassaporte?>');
			$('#dataValidadePassaporte').val('<?=$b->dataValidadePassaporte?>');
			$('#OrgaoExpPassaporte').val('<?=$b->OrgaoExpPassaporte?>');

			$('#strCartaoSaude').val('<?=$b->strCartSaude?>');
			$('#dataExpCartaoSaude').val('<?=$b->dataExpCartSaude?>');
			$('#dataValidadeCartaoSaude').val('<?=$b->dataValidadeCartSaude?>');
			$('#OrgaoExpCartaoSaude').val('<?=$b->OrgaoExpCartSaude?>');

			$('#strTituloEleitor').val('<?=$b->strTituloEleitor?>');
			$('#strTituloEleitor2').val('<?=$b->strTituloEleitor?>');
			$('#dataExpTituloEleitor').val('<?=$b->dataExpTituloEleitor?>');
			$('#dataValidadeTituloEleitor').val('<?=$b->dataValidadeTituloEleitor?>');
			$('#OrgaoExpTituloEleitor').val('<?=$b->OrgaoExpTituloEleitor?>');

			$('#strCtps').val('<?=$b->strCtps?>');
			$('#dataExpCtps').val('<?=$b->dataExpCtps?>');
			$('#dataValidadeCtps').val('<?=$b->dataValidadeCtps?>');
			$('#OrgaoExpCtps').val('<?=$b->OrgaoExpCtps?>');
			$('#strGrupoSanguineo').val('<?=$b->strGrupoSanguineo?>');
			$('#strCep').val('<?=$b->strCep?>');


			$('#AVERBACAOTERMOANTIGO').val('<?=addslashes($b->AVERBACAOTERMOANTIGO)?>');
		
	}
</script>

<?php endforeach ?>

<?php 


$busca_registro_add = $pdo->prepare("SELECT * from info_registros_civil where id_registro_obito = '$id'");
$busca_registro_add->execute();
$bra = $busca_registro_add->fetchAll(PDO::FETCH_OBJ);
foreach ($bra as $b) :?>

	<script type="text/javascript">
		function PREENCHERDADOS6(){
			$('#obs_visivel_certidao').val('<?=$b->obs_visivel_certidao?>');
		}

		</script>




<?php endforeach ?>
