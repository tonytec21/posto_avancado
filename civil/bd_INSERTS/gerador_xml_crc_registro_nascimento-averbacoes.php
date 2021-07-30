<?php
include('../../controller/db_functions.php');
$pdo = conectar();
session_start();
$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];

$busca_matricula = $pdo->prepare("SELECT * FROM `averbacoes_civil` WHERE dataRegistro >= '$data_inicial' and dataRegistro <= '$data_final' and strTipo ='NA' ");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);


$busca_cns = $pdo->prepare("SELECT * FROM `cadastroserventia`");
$busca_cns->execute();
$linha_cns= $busca_cns->fetchAll(PDO::FETCH_OBJ);

foreach ($linha_cns as $s) {
$cns = $s->strCNS;
}

# AQUI É FEITA UMA CONTAGEM PRA SABER QUANTOS REGISTROS DE ANOTAÇÕE OU AVERBAÇÕES EXISTEM:
$count_anotacoes =0 ;
$count_averbacoes =0;
foreach ($linhas as $b) {
if ($b->strSelo == 'ANOTACAO_REGISTRO') {$count_anotacoes ++;}
else{$count_averbacoes++;}
}

$xml ='<?xml version="1.0" encoding="UTF-8"?>';


#ANOTAÇÕES EM NASCIMENTO: -----------------------------------------------------------------------

		if ($count_anotacoes!=0) {
		$xml .= '<anotacao_registro>';
		$xml.='<cns>'.$cns.'</cns>';
		foreach ($linhas as $b) {
		#MOTIVOS DESCRIÇÃO DOS CÓDIGOS
				#10 - CASAMENTO
				#20 - ÓBITO
				#30 - OUTROS
				#40 - REESTABELECIMENTO
				#50 - INTERDIÇÃO
				#60 - AUSÊNCIA
				#70 - MORTE PRESUMIDA  
			#-----------------------------------------------
					if ($b->strMotivoAverbacao == '10') {
					 $motivo_anotacao = 'CASAMENTO';
					}
					elseif ($b->strMotivoAverbacao == '20') {
					 $motivo_anotacao = 'OBITO';
					}
					elseif ($b->strMotivoAverbacao == '30') {
					 $motivo_anotacao = 'OUTROS';
					}
					elseif ($b->strMotivoAverbacao == '40') {
					 $motivo_anotacao = 'REESTABELECIMENTO';
					}
					elseif ($b->strMotivoAverbacao == '50') {
					 $motivo_anotacao = 'INTERDICAO';
					}
					elseif ($b->strMotivoAverbacao == '60') {
					 $motivo_anotacao = 'AUSENCIA';
					}
					elseif ($b->strMotivoAverbacao == '70') {
					 $motivo_anotacao = 'MORTE_PRESUMIDA';
					}

		if ($b->strSelo == 'ANOTACAO_REGISTRO') {
		$xml.='<matricula>'.$b->matricula.'</matricula>';
		$xml.='<data_anotacao>'.$b->dataAverbacao.'</data_anotacao>';
		$xml.='<motivo_anotacao>'.$motivo_anotacao.'</motivo_anotacao>'; 
		$xml.='<dados_complementares></dados_complementares>';
		$xml.='<tipo_registro>'N'</tipo_registro>';
		$xml.='<matricula_anotacao></matricula_anotacao>';
		}
		$xml.='</anotacao_registro>';
		}
		}

#---------------------------------------------------------------------------------------------------


#AVERBAÇÕE EM NASCIMENTO: --------------------------------------------------------------------------
	 if ($count_averbacoes!=0) {
	 	

$xml.='<averbacao_registro>';
$xml.='<cns>'.$cns.'</cns>';
foreach ($linhas as $b) {
if ($b->strSelo != 'ANOTACAO_REGISTRO') {
$xml.='<matricula>'.$b->matricula.'</matricula>';
}
}
		<matricula></matricula>
		<data_averbacao_alt></data_averbacao_alt>
		<motivo_averbacao></motivo_averbacao> *Enviar códigos conforme descrito no item 4
		<data_motivo_averb></data_motivo_averb>
		<processo_judicial></processo_judicial>
		<data_sentenca_judicial></data_sentenca_judicial>
		<dados_complementares></dados_complementares>
		<tipo_registro></tipo_registro>
		</averbacao_registro>


	 	}	
#---------------------------------------------------------------------------------------------------		



































$nomexml = 'E'.date('dmy');

$nome_arquivo = 'Remessas/'.$nomexml.'.xml';
$nome_arquivo_puro = $nomexml.'.xml';
$arquivo = fopen($nome_arquivo, 'w+');
$escrever = fwrite($arquivo, $xml);
fclose($arquivo);
$xmlDoc = new DOMDocument();
$xmlDoc->formatOutput = true;
$dom->preserveWhiteSpace = false;
$xmlDoc->load($nome_arquivo);
$xmlDoc->save($nome_arquivo);


#download automatico: ---------------------------------------------------------------
ob_clean();
header('Content-type: application/xml');
header('Content-disposition: attachment; filename="'.$nome_arquivo_puro.'"');
readfile($nome_arquivo);

 ?>
