<?php 
include('../../controller/db_functions.php');
$pdo = conectar();

$tabela = "registro_obito_novo";


$NOME = addslashes($_GET['NOME']);
$NOMEMAE = addslashes($_GET['NOMEMAE']);
$LIVROOBITO = $_GET['LIVROOBITO'];
$FOLHAOBITO = $_GET['FOLHAOBITO'];
$TERMOOBITO = $_GET['TERMOOBITO'];
$MATRICULA = $_GET['MATRICULA'];
$DATAENTRADA = $_GET['DATAENTRADA'];



$query = "SELECT * FROM registro_obito_novo WHERE ID ='bookc' ";


if (isset($NOME) && !empty($NOME) ) {
$query .= 'UNION SELECT * FROM registro_obito_novo WHERE NOME LIKE "%'.$NOME.'%" ';
}

elseif (isset($NOMEMAE) && !empty($NOMEMAE) ) {
$query .= ' UNION SELECT * FROM registro_obito_novo WHERE NOMEMAE LIKE "%'.$NOMEMAE.'%" ';
$query .= ' UNION SELECT * FROM registro_obito_novo WHERE NOMEPAI LIKE "%'.$NOMEMAE.'%" ';
}

elseif (isset($LIVROOBITO) && !empty($LIVROOBITO) ) {
$query .= ' UNION SELECT * FROM registro_obito_novo WHERE LIVROOBITO LIKE "%'.$LIVROOBITO.'%" ';
}



elseif (isset($FOLHAOBITO) && !empty($FOLHAOBITO) ) {
$query .= ' UNION SELECT * FROM registro_obito_novo WHERE FOLHAOBITO LIKE "%'.$FOLHAOBITO.'%" ';
}



elseif (isset($TERMOOBITO) && !empty($TERMOOBITO) ) {
$query .= ' UNION SELECT * FROM registro_obito_novo WHERE TERMOOBITO LIKE "%'.$TERMOOBITO.'%" ';
}



elseif (isset($MATRICULA) && !empty($MATRICULA) ) {
$query .= ' UNION SELECT * FROM registro_obito_novo WHERE MATRICULA LIKE "%'.$MATRICULA.'%" ';
}


elseif (isset($DATAENTRADA) && !empty($DATAENTRADA) ) {
$query .= ' UNION SELECT * FROM registro_obito_novo WHERE DATAENTRADA = "'.$DATAENTRADA.'" ';
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
					<h3 class="text-center"><?=$b->NOME?></h3>
				</tr>
				<tr style="text-align:center;">
					<td>LIVRO
						<?php if ($b->TIPOLIVRO == '4'): ?>
							C
						<?php else: ?>
							C AUXILIAR 
						<?php endif ?>
						:<?=$b->LIVROOBITO?> | FOLHA: <?=$b->FOLHAOBITO?> | TERMO: <?=$b->TERMOOBITO?></td>
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
					<?php if (!empty($b->NOMEPAI)): ?>
						<?=$b->NOMEMAE?>
					<?php endif ?>	
				</tr>
			</table>
		</div>
		<div class="col-lg-2">
		</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-10">
			<a class="btn btn-primary btn-lg btn-block" href="info-registro-obito.php?id=<?=$b->ID?>">
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


