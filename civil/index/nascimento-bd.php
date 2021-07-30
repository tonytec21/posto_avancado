<?php 

$busca_livro = $pdo->prepare("SELECT * FROM livro_nascimentos WHERE Status = 'L' order by PaginaLivro limit 1");
$busca_livro->execute();
$bl = $busca_livro->fetch(PDO::FETCH_ASSOC);

$livro = $bl['identifcadorLivro'];
$folha = $bl['PaginaLivro'];
$termo = str_pad($bl['LivroInicial'],7,"0",STR_PAD_LEFT) ;



$parte1 = '';
$parte2 = '';
$parte3 = '';
$parte4 = '';



$busca_dados = PESQUISA_ALL_ID('registro_nascimento_novo',$id);
foreach ($busca_dados as $b):
$livro_nas = $b->LIVRONASCIMENTO;
$folha_nas = $b->FOLHANASCIMENTO;
$termo_nas = $b->TERMONASCIMENTO;


if (empty($b->NOMENASCIDO)) {
$parte1 = 'in active';
$parte2 = '';
$parte3 = '';
$parte4 = '';
}
elseif (!empty($b->NOMENASCIDO) && empty($b->NOMEMAE)) {
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

$tipo_acervo = $b->status;
	?>
<script type="text/javascript">
	function PREENCHERDADOS(){
		
		var ATONASCIMENTO = document.getElementById("ATONASCIMENTO");	
		for (var i = 0; i < ATONASCIMENTO.options.length; i++){
		if (ATONASCIMENTO.options[i].value == '<?=$b->ATONASCIMENTO?>'){
		ATONASCIMENTO.options[i].selected = "true";
		break;}
		}

		var LIVROnas = '<?=$b->LIVRONASCIMENTO?>';
		var FOLHAnas = '<?=$b->FOLHANASCIMENTO?>';
		var TERMOnas = '<?=$b->TERMONASCIMENTO?>';

		if (LIVROnas =='' || FOLHAnas =='' || TERMOnas =='') {
		if ($('#ACERVOFISICO').is(":checked") == false ) {	
		$('#LIVRONASCIMENTO').val('<?=$livro?>');
		$('#FOLHANASCIMENTO').val('<?=$folha?>');
		$('#TERMONASCIMENTO').val('<?=$termo?>');
		}
		}
		else{
		$('#LIVRONASCIMENTO').val('<?=$b->LIVRONASCIMENTO?>');
		$('#FOLHANASCIMENTO').val('<?=$b->FOLHANASCIMENTO?>');
		$('#TERMONASCIMENTO').val('<?=$b->TERMONASCIMENTO?>');
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
		$('#NUMEROPAPELSEGURANCA').val('<?=$b->NUMEROPAPELSEGURANCA?>');
		$('#NOMENASCIDO').val("<?=addslashes($b->NOMENASCIDO)?>");
		$('#NATURALIDADENASCIDO').val('<?=addslashes($b->NATURALIDADENASCIDO)?>');
		$('#CPFNASCIDO').val('<?=$b->CPFNASCIDO?>');

		var SEXONASCIDO = document.getElementById("SEXONASCIDO");	
		for (var i = 0; i < SEXONASCIDO.options.length; i++){
		if (SEXONASCIDO.options[i].value == '<?=$b->SEXONASCIDO?>'){
		SEXONASCIDO.options[i].selected = "true";
		break;}
		}

		var GEMEOS = document.getElementById("GEMEOS");	
		for (var i = 0; i < GEMEOS.options.length; i++){
		if (GEMEOS.options[i].value == '<?=$b->GEMEOS?>'){
		GEMEOS.options[i].selected = "true";
		break;}
		}

		var QUALIDADEDECLARANTE = document.getElementById("QUALIDADEDECLARANTE");	
		for (var i = 0; i < QUALIDADEDECLARANTE.options.length; i++){
		if (QUALIDADEDECLARANTE.options[i].value == '<?=$b->QUALIDADEDECLARANTE?>'){
		QUALIDADEDECLARANTE.options[i].selected = "true";
		break;}
		}
		var TIPOLOCALNASCIMENTO = document.getElementById("TIPOLOCALNASCIMENTO");	
		for (var i = 0; i < TIPOLOCALNASCIMENTO.options.length; i++){
		if (TIPOLOCALNASCIMENTO.options[i].value == '<?=$b->TIPOLOCALNASCIMENTO?>'){
		TIPOLOCALNASCIMENTO.options[i].selected = "true";
		break;}
		}
		$('#LOCALNASCIMENTO').val('<?=$b->LOCALNASCIMENTO?>');
		$('#ENDERECOLOCALNASCIMENTO').val('<?=addslashes($b->ENDERECOLOCALNASCIMENTO)?>');
		$('#CIDADENASCIMENTO').val('<?=addslashes($b->CIDADENASCIMENTO)?>');
		$('#DNV').val('<?=$b->DNV?>');
		$('#MEDICO').val('<?=$b->MEDICO?>');
		$('#CRM').val('<?=$b->CRM?>');
				//-------------- DADOS DECLARANTE -----------------------------------
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
		$('#PROFISSAODECLARANTE').val('<?=$b->PROFISSAODECLARANTE?>');
		$('#ENDERECODECLARANTE').val('<?=addslashes($b->ENDERECODECLARANTE)?>');
		$('#BAIRRODECLARANTE').val('<?=addslashes($b->BAIRRODECLARANTE)?>');
		$('#CIDADEDECLARANTE').val('<?=addslashes($b->CIDADEDECLARANTE)?>');
		$('#JUIZMANDATO').val('<?=$b->JUIZMANDATO?>');
		$('#VARAMANDATO').val('<?=$b->VARAMANDATO?>');
		$('#DATAEXPEDICAOMANDATO').val('<?=$b->DATAEXPEDICAOMANDATO?>');
		$('#NUMEROMANDATO').val('<?=$b->NUMEROMANDATO?>');
		$('#DATASENTENCAMANDATO').val('<?=$b->DATASENTENCAMANDATO?>');
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
		$('#PROFISSAOPAI').val('<?=$b->PROFISSAOPAI?>');
		$('#ENDERECOPAI').val('<?=addslashes($b->ENDERECOPAI)?>');
		$('#BAIRROPAI').val('<?=addslashes($b->BAIRROPAI)?>');
		$('#CIDADEPAI').val('<?=addslashes($b->CIDADEPAI)?>');
		$('#AVO1PATERNO').val('<?=addslashes($b->AVO1PATERNO)?>');
		$('#AVO2PATERNO').val('<?=addslashes($b->AVO2PATERNO)?>');
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
		$('#PROFISSAOMAE').val('<?=$b->PROFISSAOMAE?>');
		$('#ENDERECOMAE').val('<?=addslashes($b->ENDERECOMAE)?>');
		$('#BAIRROMAE').val('<?=addslashes($b->BAIRROMAE)?>');
		$('#CIDADEMAE').val('<?=addslashes($b->CIDADEMAE)?>');
		$('#AVO1MATERNO').val('<?=addslashes($b->AVO1MATERNO)?>');
		$('#AVO2MATERNO').val('<?=addslashes($b->AVO2MATERNO)?>');
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

		$('#DATANASCIMENTO').val('<?=$b->DATANASCIMENTO?>');
		$('#HORANASCIMENTO').val('<?=$b->HORANASCIMENTO?>');
		$('#LUGARCASAMENTO').val('<?=$b->LUGARCASAMENTO?>');
		$('#CIDADECASAMENTO').val('<?=$b->CIDADECASAMENTO?>');
		$('#CARTORIOCASAMENTO').val('<?=$b->CARTORIOCASAMENTO?>');



		$('#AVERBACAOTERMOANTIGO').val('<?=addslashes($b->AVERBACAOTERMOANTIGO)?>');
		$('#NOMEMATRICULAGEMEOS').val('<?=$b->NOMEMATRICULAGEMEOS?>');















		//-------------- DADOS PAISOCIO -----------------------------------
		$('#NOMEPAISOCIO').val('<?=$b->NOMEPAISOCIO?>');
		$('#CPFPAISOCIO').val('<?=$b->CPFPAISOCIO?>');
		$('#RGPAISOCIO').val('<?=$b->RGPAISOCIO?>');
		var ORGAOEMISSORPAISOCIO = document.getElementById("ORGAOEMISSORPAISOCIO");	
		for (var i = 0; i < ORGAOEMISSORPAISOCIO.options.length; i++){
		if (ORGAOEMISSORPAISOCIO.options[i].value == '<?=$b->ORGAOEMISSORPAISOCIO?>'){
		ORGAOEMISSORPAISOCIO.options[i].selected = "true";
		break;}
		}
		$('#NACIONALIDADEPAISOCIO').val('<?=$b->NACIONALIDADEPAISOCIO?>');
		$('#NATURALIDADEPAISOCIO').val('<?=$b->NATURALIDADEPAISOCIO?>');
		$('#DATANASCIMENTOPAISOCIO').val('<?=$b->DATANASCIMENTOPAISOCIO?>');
		var SEXOPAISOCIO = document.getElementById("SEXOPAISOCIO");	
		for (var i = 0; i < SEXOPAISOCIO.options.length; i++){
		if (SEXOPAISOCIO.options[i].value == '<?=$b->SEXOPAISOCIO?>'){
		SEXOPAISOCIO.options[i].selected = "true";
		break;}
		}
		var ESTADOCIVILPAISOCIO = document.getElementById("ESTADOCIVILPAISOCIO");	
		for (var i = 0; i < ESTADOCIVILPAISOCIO.options.length; i++){
		if (ESTADOCIVILPAISOCIO.options[i].value == '<?=$b->ESTADOCIVILPAISOCIO?>'){
		ESTADOCIVILPAISOCIO.options[i].selected = "true";
		break;}
		}
		$('#PROFISSAOPAISOCIO').val('<?=$b->PROFISSAOPAISOCIO?>');
		$('#ENDERECOPAISOCIO').val('<?=$b->ENDERECOPAISOCIO?>');
		$('#BAIRROPAISOCIO').val('<?=$b->BAIRROPAISOCIO?>');
		$('#CIDADEPAISOCIO').val('<?=$b->CIDADEPAISOCIO?>');
		$('#AVO1PATERNOSOCIO').val('<?=$b->AVO1PATERNOSOCIO?>');
		$('#AVO2PATERNOSOCIO').val('<?=$b->AVO2PATERNOSOCIO?>');
		//-------------- DADOS MAESOCIO -----------------------------------
		$('#NOMEMAESOCIO').val('<?=$b->NOMEMAESOCIO?>');
		$('#CPFMAESOCIO').val('<?=$b->CPFMAESOCIO?>');
		$('#RGMAESOCIO').val('<?=$b->RGMAESOCIO?>');
		var ORGAOEMISSORMAESOCIO = document.getElementById("ORGAOEMISSORMAESOCIO");	
		for (var i = 0; i < ORGAOEMISSORMAESOCIO.options.length; i++){
		if (ORGAOEMISSORMAESOCIO.options[i].value == '<?=$b->ORGAOEMISSORMAESOCIO?>'){
		ORGAOEMISSORMAESOCIO.options[i].selected = "true";
		break;}
		}
		$('#NACIONALIDADEMAESOCIO').val('<?=$b->NACIONALIDADEMAESOCIO?>');
		$('#NATURALIDADEMAESOCIO').val('<?=$b->NATURALIDADEMAESOCIO?>');
		$('#DATANASCIMENTOMAESOCIO').val('<?=$b->DATANASCIMENTOMAESOCIO?>');
		var SEXOMAESOCIO = document.getElementById("SEXOMAESOCIO");	
		for (var i = 0; i < SEXOMAESOCIO.options.length; i++){
		if (SEXOMAESOCIO.options[i].value == '<?=$b->SEXOMAESOCIO?>'){
		SEXOMAESOCIO.options[i].selected = "true";
		break;}
		}
		var ESTADOCIVILMAESOCIO = document.getElementById("ESTADOCIVILMAESOCIO");	
		for (var i = 0; i < ESTADOCIVILMAESOCIO.options.length; i++){
		if (ESTADOCIVILMAESOCIO.options[i].value == '<?=$b->ESTADOCIVILMAESOCIO?>'){
		ESTADOCIVILMAESOCIO.options[i].selected = "true";
		break;}
		}
		$('#PROFISSAOMAESOCIO').val('<?=$b->PROFISSAOMAESOCIO?>');
		$('#ENDERECOMAESOCIO').val('<?=$b->ENDERECOMAESOCIO?>');
		$('#BAIRROMAESOCIO').val('<?=$b->BAIRROMAESOCIO?>');
		$('#CIDADEMAESOCIO').val('<?=$b->CIDADEMAESOCIO?>');
		$('#AVO1MATERNOSOCIO').val('<?=$b->AVO1MATERNOSOCIO?>');
		$('#AVO2MATERNOSOCIO').val('<?=$b->AVO2MATERNOSOCIO?>');
		$('#PROCURADORPAI').val('<?=$b->PROCURADORPAI?>');
		$('#QUALIFICACAOPROCURADORPAI').val('<?=$b->QUALIFICACAOPROCURADORPAI?>');

	}
</script>

<?php endforeach ?>

<?php 


$busca_registro_add = $pdo->prepare("SELECT * from info_registros_civil where id_registro_nascimento = '$id'");
$busca_registro_add->execute();
$bra = $busca_registro_add->fetchAll(PDO::FETCH_OBJ);
foreach ($bra as $b) :?>

	<script type="text/javascript">
		function PREENCHERDADOS6(){
			$('#obs_visivel_certidao').val('<?=$b->obs_visivel_certidao?>');
		}

		</script>




<?php endforeach ?>
