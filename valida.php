<?php include('controller/conexao.php');
session_start();

$btnLogin = filter_input(INPUT_POST, 'btnLogin', FILTER_SANITIZE_STRING);
if($btnLogin){
	$usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
	$senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
	//echo "$usuario - $senha";

		//Gerar a senha criptografa
  /*  $busca_pagina_livro = $pdo->prepare("select * from livro_casamentos where Status ='L' limit 1");
    $busca_pagina_livro->execute();
    $pag = $busca_pagina_livro->fetch(PDO::FETCH_ASSOC);
    $pagina = $pag['PaginaLivro'];
    $livro = $pag['identifcadorLivro'];
    */
		//echo password_hash($senha, PASSWORD_DEFAULT);
		//Pesquisar o usuário no BD
    $pdo = conectar();




    # BUSCANDO DADOS DA SERVENTIA PARA DIFERENCIAR LOGIN AUTOMATICAMENTE:
    $busca_dados_serventia = $pdo->prepare("SELECT * FROM cadastroserventia");
    $busca_dados_serventia->execute();
    $linhas_serventia = $busca_dados_serventia->fetch(PDO::FETCH_ASSOC);

    $login_titular = $linhas_serventia['strCpfTitular'];
    $senha_titular = $linhas_serventia['strSenhaTitular'];
    $nome_titular = strtoupper($linhas_serventia['strTituloServentia']);
    $img_assinatura_titular = $linhas_serventia['imgAssinaturaTitular'];
	$data_atual = date('Y-m-d', strtotime($linhas_serventia['data_atual']));
	$status_serventia = $linhas_serventia['status_serventia'];	 
    $_SESSION['funcao'] = 'TABELIÃO E OFICIAL DE REGISTRO';
		$cns = $linhas_serventia['strCNS'];
		$cns_bloqueio = '00000';  #INSERIR O NUMERO DO CNS PARA BLOQUEAR
    //  $resultado_usuario = $pdo->prepare("select * FROM usuarios WHERE usuario='$usuario' LIMIT 1");
    //030759
$data_corrente = date('Y-m-d'); 
///echo '<br>data atual:'.$data_atual;
//echo '<br>data corrente:'.$data_corrente;
if ($data_corrente > $data_atual) {

include_once('check.php');

		if (isset($conexao)){
			
		$update = $pdo->prepare("update cadastroserventia set data_atual = '$data_corrente' where strCNS = '$cns'"); ##atualizando data no banco

		if ($update->execute()) {echo 'OK';}else {echo 'Erro data_corrente';}
		##echo $_SESSION["DADOS_STATUS"];
			if (isset($_SESSION["DADOS_STATUS"]) && $_SESSION["DADOS_STATUS"] != 1) { 
			$update = $pdo->prepare("update cadastroserventia set status_serventia = '0' where strCNS = '$cns'"); 
			if ($update->execute()) {echo 'OK';}else {echo 'Erro data_corrente';}
			header("Location: stop.php");
			break;
			}	

		}
	
	}else{
	### data corrente é igual a data no banco
	$update = $pdo->prepare("update cadastroserventia set status_serventia = '1' where strCNS = '$cns'"); 
	if ($update->execute()) {echo 'OK';}else {echo 'Erro data_corrente';}
	//echo '';
	}


if ($status_serventia == 0){
header("Location: stop.php");
break;
}
	


    $resultado_usuario = $pdo->prepare("SELECT * FROM funcionario WHERE strUsuario='$usuario' AND strSenha ='$senha' LIMIT 1");
		$resultado_usuario->execute();
    $row_usuario = $resultado_usuario->fetch(PDO::FETCH_ASSOC);

		if($resultado_usuario->rowCount()!=0){

			if($row_usuario['strSenha'] == $senha && $row_usuario['strUsuario'] == $usuario){
		    $_SESSION['id'] = $row_usuario['id'];
        $_SESSION['nome'] = strtoupper($row_usuario['strNomeCompleto']);
        $_SESSION['email'] = $row_usuario['strEmail'];
        $_SESSION['assinatura'] = $row_usuario['imgAssinatura'];
        $_SESSION['permissao'] = $row_usuario['strPermissaoAssinar'];
        $_SESSION['funcao'] = $row_usuario['strCargo'];
        if ($_SESSION['funcao'] == "GERENCIA") {
        $_SESSION['logadoAdm'] = 'S';
        }
				if ($cns == $cns_bloqueio) {
						header("Location: stop.php");
				}else {
					// code...

				header("Location: index.php");
				}
			}

      else{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert' id='response'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
        &times;</span></button>
        Login e senha incorreto!
        </div>";
				header("Location: login.php");
        #colocar aqui numa variável de sessão o usuário da tabela funciónários;
			}
		}

 elseif ($senha_titular === $senha && $login_titular ==   $usuario){
        $_SESSION['id'] = '00';
        $_SESSION['nome'] = $nome_titular;
        $_SESSION['assinatura'] = $img_assinatura_titular;
        $_SESSION['permissao'] = 'S';
        $_SESSION['logadoAdm'] = 'S';
				if ($cns == $cns_bloqueio) {
						header("Location: stop.php");
				}else {
					// code...

					header("Location: index.php");

				}
      }

  else{
    $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' id='response'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
    &times;</span></button>
    Login e senha incorreto!
    </div>";
    header("Location: login.php");
	}
}else{
  $_SESSION['msg'] = "<div class='alert alert-danger' role='alert' id='response'>
  <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
  &times;</span></button>
  Página não encontrada!
  </div>";
  header("Location: login.php");
}

?>
