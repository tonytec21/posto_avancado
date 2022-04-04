<?php 
include('../../controller/db_functions.php');
$pdo = conectar();
$pesquisa = addslashes($_GET['pesquisa']);
$busca = $pdo->prepare("SELECT * FROM uf_cidade where cidade LIKE '%$pesquisa%'");
$busca->execute();
$linha_busca = $busca->fetchAll(PDO::FETCH_OBJ);
 ?>

<?php if ($pesquisa!='' && !empty($pesquisa)): ?>
	

			 <div class="table-responsive">
			 	<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
			 		<thead>
			 			<tr>
			 				<th>UF</th>
			 				<th>CIDADE</th>   
			 				<th>######</th>

			 			</tr>
			 		</thead>
			 		<tfoot>
			 			<tr>
			 				<th>UF</th>
			 				<th>CIDADE</th>   
			 				<th>######</th>
			 			</tr>
			 		</tfoot>
			 		<tbody>
			 			<?php foreach ($linha_busca as $b): ?>
			 				<tr>
			 					<td class="text-center"><?=$b->uf?></td>
			 					<td class="text-center"><?=$b->cidade?></td>
			 					<td class="text-center">
			 						<button class="btn btn-info" onclick=" 	 						
          var campo = $('#idcampo').val();
          var cod = '<?=$b->id?>';
          var desc = '<?=addslashes($b->cidade)?>/'+'<?=$b->uf?>';
          $('#'+campo).val(cod+'/'+desc);
          campos_input($('#idcampo').val(), $('#idreg').val());	
          " data-dismiss="modal"> PREENCHER CAMPO</button>
			 					</td>
			 				</tr>
			 			<?php endforeach ?>
			 		</tbody>
			 	</table>
			 </div>

			 <?php endif ?>