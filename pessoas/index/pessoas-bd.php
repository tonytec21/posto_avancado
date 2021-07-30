<?php 

$bd = $pdo->prepare("select ID, setTipoPessoa, hiddencaminhofoto, strNome, strRazaoSocial,strCPFcnpj, strRG, strOrgaoEm, strProfissao, strNaturalidade, setSexo, strNacionalidade,dataNascimento,setEstadoCivil,strNomeFilhos,strNomeConjuge,strNomeExConjuge,dataCasamento,strCartorioCasamento,strLogradouro,strEmail,strBairro,intUFcidade,strUF,strTelefone,strTelCelular,strNomePai,strNomeMae,dataCadastro,strRepresentante1,strRepresentante2,strRepresentante3,strObservacao,setRegimeBens,dataEmissao,strFicha,tipo_cadastro, pessoa_viva, descdocestrangeiro, docestrangeiro, cpfRepresentante1, cpfRepresentante2,cpfRepresentante3, RETORNOSELODIGITAL from pessoa WHERE ID = $id");
$bd->execute();
$busca_dados = $bd->fetchAll(PDO::FETCH_OBJ);
function limpa_cpf($cpf){
	$tirar = array("-",".");
	return str_replace($tirar, "", $cpf);
}

foreach ($busca_dados as $b):
if ($b->strNaturalidade!='') {
$naturalidade = explode("/", addslashes($b->strNaturalidade));
}
else{
	$naturalidade = '';
}
if (count($naturalidade)>3) {
$nat = $naturalidade[0].'/'.$naturalidade[1].'/'.$naturalidade[2];
$comp = $naturalidade[3];
}
elseif($naturalidade == ''){
$nat = '';
$comp = '';	
}
else{
if (count($naturalidade)>1) {	
$nat = $naturalidade[0].'/'.$naturalidade[1].'/'.$naturalidade[2];
$comp = '';	
}
else{
$nat = '';
$comp = '';		
}
}


if ($b->intUFcidade!='') {
$cidade = explode("/", addslashes($b->intUFcidade));
}
else{
	$cidade ='';
}
if (count($cidade)>3) {
$cid = $cidade[0].'/'.$cidade[1].'/'.$cidade[2];
$comp_cid = $cidade[3];
}
elseif ($cidade =='') {
$cid = '';
$comp_cid='';	
}
else{
$cid = $cidade[0].'/'.$cidade[1].'/'.$cidade[2];
$comp_cid = '';	
}



	?>
<script type="text/javascript">
	function PREENCHERDADOS(){
		var tipopessoa = '<?=$b->setTipoPessoa?>';
		if (tipopessoa == 'J') {
			$('#PESSOA_JUD').prop('checked', true);
		}

	
		

		$('#pessoa_viva').val('<?=$b->pessoa_viva?>');
		$('#tipo_cadastro').val('<?=$b->tipo_cadastro?>');	
			
		$('#strNome').val('<?=$b->strNome?>');
		if (tipopessoa != 'J') {
		$('#strCPF').val('<?=limpa_cpf($b->strCPFcnpj)?>');
		}
		$('#strRG').val('<?=$b->strRG?>');
		$('#strOrgaoEm').val('<?=$b->strOrgaoEm?>');
		$('#dataEmissao').val('<?=$b->dataEmissao?>');
		$('#descdocestrangeiro').val('<?=$b->descdocestrangeiro?>');
		$('#docestrangeiro').val('<?=$b->docestrangeiro?>');
		$('#setSexo').val('<?=$b->setSexo?>');
		$('#dataNascimento').val('<?=$b->dataNascimento?>');
		$('#strNacionalidade').val('<?=$b->strNacionalidade?>');
		$('#strProfissao').val('<?=$b->strProfissao?>');
		$('#setEstadoCivil').val('<?=$b->setEstadoCivil?>');
		$('#strNomeExConjuge').val('<?=$b->strNomeExConjuge?>');
		$('#dataCasamento').val('<?=$b->dataCasamento?>');
		$('#strCartorioCasamento').val('<?=$b->strCartorioCasamento?>');
		$('#setRegimeBens').val('<?=$b->setRegimeBens?>');
		$('#strNomeFilhos').val('<?=$b->strNomeFilhos?>');
		$('#strNomePai').val('<?=$b->strNomePai?>');
		$('#strNomeMae').val('<?=$b->strNomeMae?>');
		$('#endereco').val('<?=$b->strLogradouro?>');
		$('#bairro').val('<?=$b->strBairro?>');
		$('#strRazaoSocial').val('<?=$b->strRazaoSocial?>');
		$('#strCPFcnpj').val('<?=$b->strCPFcnpj?>');
		$('#strRepresentante1').val('<?=$b->strRepresentante1?>');
		$('#strRepresentante2').val('<?=$b->strRepresentante2?>');
		$('#strRepresentante3').val('<?=$b->strRepresentante3?>');
		$('#strTelefone').val('<?=$b->strTelefone?>');
		$('#strTelCelular').val('<?=$b->strTelCelular?>');
		$('#strEmail').val('<?=$b->strEmail?>');
		$('#strObservacao').val('<?=$b->strObservacao?>');
		$('#cpfRepresentante1').val('<?=$b->cpfRepresentante1?>');
		$('#cpfRepresentante2').val('<?=$b->cpfRepresentante2?>');
		$('#cpfRepresentante3').val('<?=$b->cpfRepresentante3?>');

		


		var cid = '<?=$cid?>';
		var comp_cid = '<?=$comp_cid?>';		
		if (comp_cid =='') {
			$('#intUFcidade').val(cid);
		}
		else{
			$('#RES_ESTRANGEIRO').prop("checked", true);
			$('#strNaturalidade').val(cid);
			$('#decresidenciaestrangeiro').val(comp_cid);

		}

		var nat='<?=$nat?>';
		var comp='<?=$comp?>';		
		if (comp=='') {
			$('#strNaturalidade').val(nat);
		}
		else{
			$('#CID_ESTRANGEIRO').prop("checked", true);
			$('#strNaturalidade').val(nat);
			$('#textnaturalidade').val(comp);

		}


		var ficha = '<?=$b->strFicha?>';
		if (ficha!='0') {
			$('#strFicha').val('<?=$b->strFicha?>');
		}


	}
</script>

<?php endforeach ?>