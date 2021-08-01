<?php

session_start();
unset(	
$_SESSION['id'],
$_SESSION['nome'],
$_SESSION['email'],
$_SESSION['assinatura'],
$_SESSION['permissao'],
$_SESSION['logadoAdm'],
$_SESSION['averbacaotemp']

);

$_SESSION['msg'] = "<div class='alert alert-success' role='alert' id='response'>
<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
&times;</span></button>
Deslogado com sucesso
</div>
";

header("Location: login.php");
