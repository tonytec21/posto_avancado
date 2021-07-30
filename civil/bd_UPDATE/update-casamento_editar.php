<?php
include('../../../controller/db_functions.php');
session_start();
$id = $_GET['id'];
$pdo = conectar();

if (isset($_POST['subimit1'])) {
unset($_POST['subimit1']);




//var_dump($_POST);

//UPDATE_CAMPO_ID('registro_casamento','Termo',$_POST['strTermo'],$id);
$busca_numero_registro = $pdo->prepare("SELECT * FROM `registro_casamento` ORDER BY ID DESC LIMIT 1");
$busca_numero_registro->execute();
$ll=$busca_numero_registro->fetch(PDO::FETCH_ASSOC);
$_SESSION['numero_registro'] = $ll['ID'];
UPDATE_CAMPO_ID('registro_casamento','strNomeNoivo',$_POST['strNomeNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strRGnoivo',$_POST['strRGnoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strCPFnoivo',$_POST['strCPFnoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataNascimentoNoivo',$_POST['dataNascimentoNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strProfissaoNoivo',$_POST['strProfissaoNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strNacionalidadeNoivo',$_POST['strNacionalidadeNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strNaturalNoivo',$_POST['strNaturalNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strEnderecoNoivo',$_POST['strEnderecoNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strCidadeNoivo',$_POST['strCidadeNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strTelefoneNoivo',$_POST['strTelefoneNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','setEstadoCivilNoivo',$_POST['setEstadoCivilNoivo'],$id);

if (!empty($_POST['strFilhosNoivo'])) {
UPDATE_CAMPO_ID('registro_casamento','strFilhosNoivo',$_POST['strFilhosNoivo'],$id);
}

if (!empty($_POST['strAntigoConjugeNoivo']) && !empty($_POST['dataDissolucaoNoivo'])) {
UPDATE_CAMPO_ID('registro_casamento','strAntigoConjugeNoivo',$_POST['strAntigoConjugeNoivo'],$id);	
UPDATE_CAMPO_ID('registro_casamento','dataDissolucaoNoivo',$_POST['dataDissolucaoNoivo'],$id);	
}

if (!empty($_POST['dataNascimentoPaiNoivo'])) {
	UPDATE_CAMPO_ID('registro_casamento','dataNascimentoPaiNoivo',$_POST['dataNascimentoPaiNoivo'],$id);	
}

if (!empty($_POST['dataNascimentoMaeNoivo'])) {
	UPDATE_CAMPO_ID('registro_casamento','dataNascimentoMaeNoivo',$_POST['dataNascimentoMaeNoivo'],$id);	
}

if (!empty($_POST['dataMortePaiNoivo'])) {
	UPDATE_CAMPO_ID('registro_casamento','dataMortePaiNoivo',$_POST['dataMortePaiNoivo'],$id);	
}

if (!empty($_POST['dataMorteMaeNoivo'])) {
	UPDATE_CAMPO_ID('registro_casamento','dataMorteMaeNoivo',$_POST['dataMorteMaeNoivo'],$id);	
}

UPDATE_CAMPO_ID('registro_casamento','NaturalidadePaiNoivo',$_POST['strNaturalPaiNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','NacionalidadePaiNoivo',$_POST['strNacionalidadePaiNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','EnderecoPaiNoivo',$_POST['strEnderecoPaiNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','CidadePaiNoivo',$_POST['strCidadePaiNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','NaturalidadeMaeNoivo',$_POST['strNaturalMaeNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','NacionalidadeMaeNoivo',$_POST['strNacionalidadeMaeNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','EnderecoMaeNoivo',$_POST['strEnderecoMaeNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','CidadeMaeNoivo',$_POST['strCidadeMaeNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strProcuradorNoivo',$_POST['strProcuradorNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strNomePosCasadoNoivo',$_POST['strNomePosCasadoNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strPaiNoivo',$_POST['strNomePaiNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strMaeNoivo',$_POST['strNomeMaeNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strEmailNoivo',$_POST['strEmailNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strEmailPaiNoivo',$_POST['strEmailPaiNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strEmailMaeNoivo',$_POST['strEmailMaeNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strCartorioCasamentoNoivo',$_POST['strCartorioCasamentoNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataRegistro',$_POST['dataRegistro'],$id);
UPDATE_CAMPO_ID('registro_casamento','strProfissaoPaiNoivo',$_POST['strProfissaoPaiNoivo'],$id);
UPDATE_CAMPO_ID('registro_casamento','strProfissaoMaeNoivo',$_POST['strProfissaoMaeNoivo'],$id);

$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';
header('location:../editar/registro-casamento.php?conf=ok&id='.$id);

}

if (isset($_POST['subimit2'])) {
unset($_POST['subimit2']);
//var_dump($_POST);

UPDATE_CAMPO_ID('registro_casamento','strNomeNoiva',$_POST['strNomeNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strRGnoiva',$_POST['strRGnoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strCPFnoiva',$_POST['strCPFnoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataNascimentoNoiva',$_POST['dataNascimentoNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strProfissaoNoiva',$_POST['strProfissaoNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strNacionalidadeNoiva',$_POST['strNacionalidadeNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strNaturalNoiva',$_POST['strNaturalNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strEnderecoNoiva',$_POST['strEnderecoNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strCidadeNoiva',$_POST['strCidadeNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strTelefoneNoiva',$_POST['strTelefoneNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','setEstadoCivilNoiva',$_POST['setEstadoCivilNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strEmailNoiva',$_POST['strEmailNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strEmailPaiNoiva',$_POST['strEmailPaiNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strEmailMaeNoiva',$_POST['strEmailMaeNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strCartorioCasamentoNoiva',$_POST['strCartorioCasamentoNoiva'],$id);

if (!empty($_POST['strFilhosNoiva'])) {
UPDATE_CAMPO_ID('registro_casamento','strFilhosNoiva',$_POST['strFilhosNoiva'],$id);
}

if (!empty($_POST['strAntigoConjugeNoiva']) && !empty($_POST['dataDissolucaoNoiva'])) {
UPDATE_CAMPO_ID('registro_casamento','strAntigoConjugeNoiva',$_POST['strAntigoConjugeNoiva'],$id);	
UPDATE_CAMPO_ID('registro_casamento','dataDissolucaoNoiva',$_POST['dataDissolucaoNoiva'],$id);	
}

if (!empty($_POST['dataNascimentoPaiNoiva'])) {
	UPDATE_CAMPO_ID('registro_casamento','dataNascimentoPaiNoiva',$_POST['dataNascimentoPaiNoiva'],$id);	
}

if (!empty($_POST['dataNascimentoMaeNoiva'])) {
	UPDATE_CAMPO_ID('registro_casamento','dataNascimentoMaeNoiva',$_POST['dataNascimentoMaeNoiva'],$id);	
}

if (!empty($_POST['dataMortePaiNoiva'])) {
	UPDATE_CAMPO_ID('registro_casamento','dataMortePaiNoiva',$_POST['dataMortePaiNoiva'],$id);	
}

if (!empty($_POST['dataMorteMaeNoiva'])) {
	UPDATE_CAMPO_ID('registro_casamento','dataMorteMaeNoiva',$_POST['dataMorteMaeNoiva'],$id);	
}

UPDATE_CAMPO_ID('registro_casamento','NaturalidadePaiNoiva',$_POST['strNaturalPaiNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','NacionalidadePaiNoiva',$_POST['strNacionalidadePaiNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','EnderecoPaiNoiva',$_POST['strEnderecoPaiNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','CidadePaiNoiva',$_POST['strCidadePaiNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','NaturalidadeMaeNoiva',$_POST['strNaturalMaeNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','NacionalidadeMaeNoiva',$_POST['strNacionalidadeMaeNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','EnderecoMaeNoiva',$_POST['strEnderecoMaeNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','CidadeMaeNoiva',$_POST['strCidadeMaeNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strProcuradorNoiva',$_POST['strProcuradorNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strNomePosCasadoNoiva',$_POST['strNomePosCasadoNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strPaiNoiva',$_POST['strNomePaiNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strMaeNoiva',$_POST['strNomeMaeNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strProfissaoPaiNoiva',$_POST['strProfissaoPaiNoiva'],$id);
UPDATE_CAMPO_ID('registro_casamento','strProfissaoMaeNoiva',$_POST['strProfissaoMaeNoiva'],$id);

$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';

header('location:../editar/registro-casamento.php?confn=ok&id='.$id);


}


if (isset($_POST['subimit3'])) {
unset($_POST['subimit3']);



UPDATE_CAMPO_ID('registro_casamento','dataReligioso',$_POST['dataReligioso'],$id);
UPDATE_CAMPO_ID('registro_casamento','strNomeIgreja',$_POST['strNomeIgreja'],$id);
UPDATE_CAMPO_ID('registro_casamento','strCidadeIgreja',$_POST['strCidadeIgreja'],$id);
UPDATE_CAMPO_ID('registro_casamento','strCelebrante',$_POST['strCelebrante'],$id);
$_SESSION['religioso'] = 'S';
UPDATE_CAMPO_ID('registro_casamento','strDoctosNoivos',$_POST['strDoctosNoivos'],$id);

UPDATE_CAMPO_ID('registro_casamento','strTestemunha1',$_POST['strTestemunha1'],$id);
UPDATE_CAMPO_ID('registro_casamento','strProfissaoTestemunha1',$_POST['strProfissaoTestemunha1'],$id);
UPDATE_CAMPO_ID('registro_casamento','strNaturalidadeTestemunha1',$_POST['strNaturalidadeTestemunha1'],$id);
UPDATE_CAMPO_ID('registro_casamento','strNacionalidadeTestemunha1',$_POST['strNacionalidadeTestemunha1'],$id);
UPDATE_CAMPO_ID('registro_casamento','strEnderecoTestemunha1',$_POST['strEnderecoTestemunha1'],$id);
UPDATE_CAMPO_ID('registro_casamento','strCidadeTestemunha1',$_POST['strCidadeTestemunha1'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataNascimentoTestmunha1',$_POST['dataNascimentoTestmunha1'],$id);


UPDATE_CAMPO_ID('registro_casamento','strTestemunha2',$_POST['strTestemunha2'],$id);
UPDATE_CAMPO_ID('registro_casamento','strProfissaoTestemunha2',$_POST['strProfissaoTestemunha2'],$id);
UPDATE_CAMPO_ID('registro_casamento','strNaturalidadeTestemunha2',$_POST['strNaturalidadeTestemunha2'],$id);
UPDATE_CAMPO_ID('registro_casamento','strNacionalidadeTestemunha2',$_POST['strNacionalidadeTestemunha2'],$id);
UPDATE_CAMPO_ID('registro_casamento','strEnderecoTestemunha2',$_POST['strEnderecoTestemunha2'],$id);
UPDATE_CAMPO_ID('registro_casamento','strCidadeTestemunha2',$_POST['strCidadeTestemunha2'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataNascimentoTestmunha2',$_POST['dataNascimentoTestmunha2'],$id);

$_SESSION['sucesso'] = 'SUCESSO CONTINUE O PREENCHIMENTO DO FORMULÁRIO';

header('location:../editar/registro-casamento.php?confa=ok&id='.$id);

}


if (isset($_POST['subimit4'])) {
unset($_POST['subimit4']);
UPDATE_CAMPO_ID('registro_casamento','strNumProcesso',$_POST['strNumProcesso'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataProclamas',$_POST['dataProclamas'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataProcesso',$_POST['dataProcesso'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataCasamento',$_POST['dataCasamento'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataHora',$_POST['dataHora'],$id);
UPDATE_CAMPO_ID('registro_casamento','setTipoCasamento',$_POST['setTipoCasamento'],$id);
UPDATE_CAMPO_ID('registro_casamento','setRegime',$_POST['setRegime'],$id);
UPDATE_CAMPO_ID('registro_casamento','strCartorio',$_POST['strCartorio'],$id);
UPDATE_CAMPO_ID('registro_casamento','strEnderecoCartorio',$_POST['strEnderecoCartorio'],$id);
UPDATE_CAMPO_ID('registro_casamento','strCidadeCartorio',$_POST['strCidadeCartorio'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataEdital',$_POST['dataEdital'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataHabilitacao',$_POST['dataHabilitacao'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataParecerPromotor',$_POST['dataParecerPromotor'],$id);
UPDATE_CAMPO_ID('registro_casamento','dataParecerJuiz',$_POST['dataParecerJuiz'],$id);
UPDATE_CAMPO_ID('registro_casamento','strJuizPaz',$_POST['strJuizPaz'],$id);
UPDATE_CAMPO_ID('registro_casamento','strLocalCerimonia',$_POST['strLocalCerimonia'],$id);
UPDATE_CAMPO_ID('registro_casamento','strEscrivao',$_POST['strEscrivao'],$id);
UPDATE_CAMPO_ID('registro_casamento','strTextoAnatocoes',$_POST['strTextoAnatocoes'],$id);

if ($_GET['relig'] == 'S') {
$relig = 'S';	
$folha = $_GET['strFolha'];
$upLivroa = $pdo->prepare("UPDATE livro_casamentos_auxiliar set Status = 'U' where PaginaLivro = '$folha'");
$upLivroa->execute();
}
else{
$relig='N';	
#ocupando a página do livro:
$folha = $_GET['strFolha'];
$upLivroa = $pdo->prepare("UPDATE livro_casamentos set Status = 'U' where PaginaLivro = '$folha'");
$upLivroa->execute();
}

UPDATE_CAMPO_ID('registro_casamento','status','CON',$id);
var_dump($_POST);
header('location:../pesquisa-casamento.php?id='.$id);
$_SESSION['sucesso'] = 'FORMULÁRIO CONCLUIDO (Casamento)';

}






 ?>
