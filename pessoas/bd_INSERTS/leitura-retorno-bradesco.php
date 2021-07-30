<?php 
include('../../../controller/db_functions.php');
$pdo = conectar();
session_start();
  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

$pesquisa_cidade_serventia = PESQUISA_ALL_ID('cadastroserventia',1);
foreach ($pesquisa_cidade_serventia as $cidserv) {
$c = PESQUISA_ALL_ID('uf_cidade',$cidserv->intUFcidade); foreach ($c as $c) {
$cidade_aqui = strtoupper($c->cidade);
$cidade_aqui = tirarAcentos($cidade_aqui);
}
}

$_SESSION['error_log'] ='';
$line = 0;
$nome_do_arquivo = $_SESSION['arquivo_remessa'];
$nome_do_arquivo= str_replace("../remessas/", "", $nome_do_arquivo);
$arquivo = fopen($_SESSION['arquivo_remessa'], 'r');
$id_desistencias = '';
while(!feof($arquivo)){

	#---------------------------------------- LEITURA DO ARQUIVO ------------------------------------------------------------
		$leitor = fgets($arquivo,1000);
		
		$id_registro = substr($leitor, 0,1); 
		if ($id_registro == 0 && $id_registro !='') {
				
				$identificao_retorno = substr($leitor, 2,1);
				$nome_banco = substr($leitor, 80,15);
				if ($identificao_retorno!='2' && $nome_banco != 'Bradesco') {
					header('Location:' . $_SERVER['HTTP_REFERER']);
					$_SESSION['erro'] = 'O arquivo submetido encontra-se com falha, ou não é um arquivo de retorno';
				}
				echo $codigo_apresentante = substr($leitor, 0,3);
				echo $nome_apresentante = substr($leitor, 3,40);
				echo $data_movimento = ltrim(substr($leitor, 48,8));
				echo $quantidade_desistencias = substr($leitor, 57,4);
				echo $quantidade_registros = substr($leitor, 62,4);
				echo $reservado = substr($leitor, 67,57);
				echo $sequencia_registro = substr($leitor, 122,4);
			

			}
			
			if ($id_registro == 1 && $id_registro !='') {
				echo $codigo_apresentante = substr($leitor, 2,1);
				echo $nome_apresentante = substr($leitor, 4,4);
				echo $data_movimento = ltrim(substr($leitor, 8,6));
				echo $reservado = substr($leitor, 15,106);
				echo $sequencia_registro = substr($leitor, 123,4);
			
				

			}

			if ($id_registro == 2 && $id_registro !='') {
				echo $numero_protocolo = substr($leitor, 2,9);
				echo $data_protocolagem = substr($leitor, 11,8);
				echo $numero_titulo = substr($leitor, 19,10);
				echo $nome_primeiro_devedor = substr($leitor, 29,45);
				echo $valor_titulo = substr($leitor, 75,14);
				echo $solicitacao_sustacao = substr($leitor, 89,1);
				echo $agencia_conta = substr($leitor, 90,12);
				echo $carteira_numero = substr($leitor, 102,12);
				echo $reservado = substr($leitor, 114,1);
				echo $numero_controle_recebimento = substr($leitor, 116,6);
				echo $sequencia_registro = substr($leitor, 123,4);
				$id_desistencias .= '-'.intval($numero_protocolo);
			}



			if ($id_registro == 8 && $id_registro !='') {
				echo $codigo_cartorio = substr($leitor, 2,1);
				echo $soma_desistencias = substr($leitor, 4,4);
				echo $reservado = substr($leitor, 8,113);
				echo $sequencia_registro = substr($leitor, 123,4);
	

			}


				if ($id_registro == 9 && $id_registro !='') {
				echo $codigo_apresentante = substr($leitor, 1,3);
				echo $nome_apresentante = substr($leitor, 4,40);
				echo $data_movimento = substr($leitor, 49,8);
				echo $soma_desistencias = substr($leitor, 58,4);
				echo $somatorio_valor_titulo = substr($leitor, 62,14);
				echo $reservado = substr($leitor, 76,46);
				echo $sequencia_registro = substr($leitor, 123,4);
	

			}	

			
	}	
#unset($_SESSION['sucesso']);				
#header('location:../protesto-data-retirada.php?id='.$id_desistencias);
 ?>