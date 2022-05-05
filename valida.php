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

    $pdo_logs = conexao_logs();


    # BUSCANDO DADOS DA SERVENTIA PARA DIFERENCIAR LOGIN AUTOMATICAMENTE:
    $busca_dados_serventia = $pdo->prepare("SELECT * FROM cadastroserventia");
    $busca_dados_serventia->execute();
    $linhas_serventia = $busca_dados_serventia->fetch(PDO::FETCH_ASSOC);

    $login_titular = $linhas_serventia['strCpfTitular'];
    $senha_titular = $linhas_serventia['strSenhaTitular'];
    $nome_titular = mb_convert_case($linhas_serventia['strTituloServentia'], MB_CASE_UPPER, "UTF-8");
    $img_assinatura_titular = $linhas_serventia['imgAssinaturaTitular'];
	$data_atual = date('Y-m-d', strtotime($linhas_serventia['data_atual']));
	$status_serventia = $linhas_serventia['status_serventia'];	 
    $_SESSION['funcao'] = 'TABELIÃO E REGISTRADOR';
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
			return false; exit;
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
return false; exit;
}
	


    $resultado_usuario = $pdo->prepare("SELECT * FROM funcionario WHERE strUsuario='$usuario' AND strSenha ='$senha' LIMIT 1");
		$resultado_usuario->execute();
    $row_usuario = $resultado_usuario->fetch(PDO::FETCH_ASSOC);

		if($resultado_usuario->rowCount()!=0){

			if($row_usuario['strSenha'] == $senha && $row_usuario['strUsuario'] == $usuario){
		    $_SESSION['id'] = $row_usuario['id'];
        $_SESSION['nome'] =  mb_convert_case($row_usuario['strNomeCompleto'], MB_CASE_UPPER, "UTF-8");
        $_SESSION['email'] = $row_usuario['strEmail'];
        $_SESSION['assinatura'] = $row_usuario['imgAssinatura'];
        $_SESSION['permissao'] = $row_usuario['strPermissaoAssinar'];
        $_SESSION['funcao'] = $row_usuario['strCargo'];
        
       

		#NÍVEIS DE ACESSO ======================================================================================
		/*
        if ($_SESSION['funcao'] == "GERENCIA") {$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "ESCREVENTE SUBSTITUTO"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "ESCREVENTE SUBSTITUTA"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "GERENTE"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "TABELIÃO SUBSTITUTO"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "TABELIÃ SUBSTITUTA"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "OFICIAL e REGISTRADOR"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "OFICIAL e REGISTRADORA"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "TABELIÃO e REGISTRADOR"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "TABELIÃ e REGISTRADORA"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "TABELIÃO e REGISTRADOR INTERINO"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "TABELIÃ e REGISTRADORA INTERINA"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "TABELIÃO e REGISTRADOR SUBSTITUTO"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "TABELIÃ e REGISTRADORA SUBSTITUTA"){$_SESSION['logadoAdm'] = 'S';}	
		elseif($_SESSION['funcao'] == "OFICIAL e REGISTRADOR SUBSTITUTO"){$_SESSION['logadoAdm'] = 'S';}
		elseif($_SESSION['funcao'] == "OFICIAL e REGISTRADORA SUBSTITUTA"){$_SESSION['logadoAdm'] = 'S';}	
		*/

				$array = array("GERENCIA","ESCREVENTE SUBSTITUTO","ESCREVENTE SUBSTITUTA","GERENTE","TABELIÃO SUBSTITUTO","TABELIÃ SUBSTITUTA","OFICIAL e REGISTRADOR","OFICIAL e REGISTRADORA","TABELIÃO e REGISTRADOR","TABELIÃ e REGISTRADORA","TABELIÃO e REGISTRADOR INTERINO","TABELIÃ e REGISTRADORA INTERINA","TABELIÃO e REGISTRADOR SUBSTITUTO","TABELIÃ e REGISTRADORA SUBSTITUTA","OFICIAL e REGISTRADOR SUBSTITUTO","OFICIAL e REGISTRADORA SUBSTITUTA");

				if (in_array($_SESSION['funcao'], $array, true)) {
					echo $_SESSION['logadoAdm'] = 'S';
				}

		#======================================================================================================

        session_regenerate_id(TRUE);  # GERANDO UM NOVO ID DE SESSÃO

        	//INSERIR DADOS AUDITORIA
		$session_id=  session_id();	
		$user_login= $_SESSION['nome'] ;
		$id_login=  $_SESSION['id'];

		$host= gethostname();
		$ip = gethostbyname($host);
    $action = $_SERVER['REMOTE_ADDR'];
	
		$res_c = $pdo_logs->prepare("INSERT into logs (session_id, user_login, id_login, ip, host, action) values (:session_id, :user_login, :id_login, :ip, :host, :action)");
	
		$res_c->bindValue(":session_id", $session_id);
		$res_c->bindValue(":user_login", $user_login);
		$res_c->bindValue(":id_login", $id_login);
		$res_c->bindValue(":ip", $ip);
		$res_c->bindValue(":host", $host);
		$res_c->bindValue(":action", $action);


		$executeQuery = $res_c->execute();
	
		if ($executeQuery == false) {
			print_r($res_c->errorInfo());
			die ('Error executing the query to login.');
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


        session_regenerate_id(TRUE);  # GERANDO UM NOVO ID DE SESSÃO

              //INSERIR DADOS AUDITORIA
        $session_id=  session_id();	
        $user_login= $_SESSION['nome'] ;
        $id_login=  $_SESSION['id'];

        $host= gethostname();
        $ip = gethostbyname($host);
        $action = $_SERVER['REMOTE_ADDR'];


        $res_c = $pdo_logs->prepare("INSERT into logs (session_id, user_login, id_login, ip, host, action) values (:session_id, :user_login, :id_login, :ip, :host, :action)");

        $res_c->bindValue(":session_id", $session_id);
        $res_c->bindValue(":user_login", $user_login);
        $res_c->bindValue(":id_login", $id_login);
        $res_c->bindValue(":ip", $ip);
        $res_c->bindValue(":host", $host);
        $res_c->bindValue(":action", $action);

        $executeQuery = $res_c->execute();

        if ($executeQuery == false) {
          print_r($res_c->errorInfo());
          die ('Error executing the query to login.');
        }



				if ($cns == $cns_bloqueio) {
						header("Location: stop.php");
				}else {
					// code...
					$_SESSION['nome'] = mb_convert_case($_SESSION['nome'], MB_CASE_UPPER, "UTF-8");	
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
