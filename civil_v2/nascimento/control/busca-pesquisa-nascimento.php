<?php 
include('../../controller/db_functions.php');
$pdo = conectar();

$tabela = "registro_nascimento_novo";


$NOME = addslashes($_GET['NOME']);
$NOMEMAE = addslashes($_GET['NOMEMAE']);
$LIVRONASCIMENTO = $_GET['LIVRONASCIMENTO'];
$FOLHANASCIMENTO = $_GET['FOLHANASCIMENTO'];
$TERMONASCIMENTO = $_GET['TERMONASCIMENTO'];
$MATRICULA = $_GET['MATRICULA'];
$DATAENTRADA = $_GET['DATAENTRADA'];



$query = "SELECT * FROM registro_nascimento_novo WHERE ID ='bookc' ";


if (isset($NOME) && !empty($NOME) ) {
$query .= 'UNION SELECT * FROM registro_nascimento_novo WHERE NOMENASCIDO LIKE "%'.$NOME.'%" ';
}

elseif (isset($NOMEMAE) && !empty($NOMEMAE) ) {
$query .= ' UNION SELECT * FROM registro_nascimento_novo WHERE NOMEMAE LIKE "%'.$NOMEMAE.'%" ';
$query .= ' UNION SELECT * FROM registro_nascimento_novo WHERE NOMEPAI LIKE "%'.$NOMEMAE.'%" ';
}

elseif (isset($LIVRONASCIMENTO) && !empty($LIVRONASCIMENTO) ) {
$query .= ' UNION SELECT * FROM registro_nascimento_novo WHERE LIVRONASCIMENTO LIKE "%'.$LIVRONASCIMENTO.'%" ';
}



elseif (isset($FOLHANASCIMENTO) && !empty($FOLHANASCIMENTO) ) {
$query .= ' UNION SELECT * FROM registro_nascimento_novo WHERE FOLHANASCIMENTO LIKE "%'.$FOLHANASCIMENTO.'%" ';
}



elseif (isset($TERMONASCIMENTO) && !empty($TERMONASCIMENTO) ) {
$query .= ' UNION SELECT * FROM registro_nascimento_novo WHERE TERMONASCIMENTO LIKE "%'.$TERMONASCIMENTO.'%" ';
}



elseif (isset($MATRICULA) && !empty($MATRICULA) ) {
$query .= ' UNION SELECT * FROM registro_nascimento_novo WHERE MATRICULA LIKE "%'.$MATRICULA.'%" ';
}


elseif (isset($DATAENTRADA) && !empty($DATAENTRADA) ) {
$query .= ' UNION SELECT * FROM registro_nascimento_novo WHERE DATAENTRADA = "'.$DATAENTRADA.'" ';
}





$busca = $pdo->prepare($query);


if ($busca->execute()):
$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
#var_dump($linhas);
foreach ($linhas as $b) :?>
<div class="col-lg-12 card bg-secoundary">
	<div class="row">
		<div class="col-lg-2" style="padding:2%">
			<i style="font-size:100px;height: 100%; color: silver;" class=" ni ni-single-02"></i>
		</div>
		<div class="col-lg-8">
			
			<table>
				<tr style="text-align: center;">
					<h3 class="text-center"><?=$b->NOMENASCIDO?></h3>
				</tr>
				<tr style="text-align:center;">
					<td><?=$b->ID?> LIVRO:<?=$b->LIVRONASCIMENTO?> | FOLHA: <?=$b->FOLHANASCIMENTO?> | TERMO: <?=$b->TERMONASCIMENTO?></td>
				</tr>
				<tr style="text-align:center;">
					MATRICULA: <?=$b->MATRICULA?>
				</tr>
				<br>
				<tr style="text-align:center;">
					<?php if (!empty($b->DATAENTRADA)): ?>
						DATA REGISTRO: <?=date('d/m/Y', strtotime($b->DATAENTRADA))?>
					<?php endif ?>
				</tr>
				<tr style="text-align:center;">
					FILIAÇÃO:
					<?php if (!empty($b->NOMEPAI)): ?>
						<?=$b->NOMEPAI?> & 
					<?php endif ?>
					<?php if (!empty($b->NOMEMAE)): ?>
						<?=$b->NOMEMAE?>
					<?php endif ?>	
				</tr>
			</table>
		</div>
		<div class="col-lg-2">
		</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
			<a class="btn btn-primary btn-lg btn-block" href="info-registro-nascimento.php?id=<?=$b->ID?>">
				<i class="fa fa-arrows-alt"></i>		
				EXPANDIR
			</a>
			<br>
			</div>
			<?php if ($b->status == 'ACV'): ?>
			<div class="col-lg-8"></div>
			<div class="col-lg-4">			
				<p style="opacity: .7;color:white" class=" badge bg-warning">CADASTRO ACERVO FISICO</p>
				</div>
			<?php endif ?>

	</div>
	
	
</div>

<?php endforeach; ?>
<?php endif; ?>


