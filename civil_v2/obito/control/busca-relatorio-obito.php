<?php 
include('../../controller/db_functions.php');
$pdo = conectar();

$tabela = "registro_obito_novo";



$LIVROOBITO = $_GET['LIVROOBITO'];
$DATAINICIAL = $_GET['DATAINICIAL'];
$DATAFINAL = $_GET['DATAFINAL'];



$query = "SELECT * FROM registro_obito_novo WHERE ID ='bookc' ";

if (isset($LIVROOBITO) && !empty($LIVROOBITO) ) {
$query .= ' UNION SELECT * FROM registro_obito_novo WHERE LIVROOBITO LIKE "%'.$LIVROOBITO.'%" ';
}



elseif (isset($DATAINICIAL) && !empty($DATAINICIAL) ) {
$query .= ' UNION SELECT * FROM registro_obito_novo WHERE DATAENTRADA >= "'.$DATAINICIAL.'" ';
}

elseif (isset($DATAFINAL) && !empty($DATAFINAL) ) {
$query .= ' UNION SELECT * FROM registro_obito_novo WHERE DATAENTRADA <= "'.$DATAFINAL.'" ';
}





$busca = $pdo->prepare($query);


if ($busca->execute()):
$linhas = $busca->fetchAll(PDO::FETCH_OBJ);
#var_dump($linhas);?>
<div class="table-responsive" style="zoom:80%" >
                                <table   class="table_exportable table-bordered table-striped table-hover js-exportable dataTable text-black" id="customers">
                                    <thead>
                                        <tr>
                                          <th>DATA DO REGISTRO</th>
                                          <th>TERMO</th>
                                          <th>LIVRO</th>
                                          <th>FOLHA</th>
                                         <th>DATA OBITO</th>
                                         <th>NOME </th>
                                         <th>SEXO</th>
                                         <th>CPF</th>
                                         <th>FILIAÇÃO</th>
                                         <th>NDO</th>
                                         <th>LOCAL DE OBITO</th>
                                         <th>NATURALIDADE</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>DATA DO REGISTRO</th>
                                            <th>TERMO</th>
                                            <th>LIVRO</th>
                                            <th>FOLHA</th>
                                           <th>DATA OBITO</th>
                                           <th>NOME </th>
                                           <th>SEXO</th>
                                         <th>CPF</th>
                                         <th>FILIAÇÃO</th>
                                         <th>NDO</th>
                                         <th>LOCAL DE OBITO</th>
                                         <th>NATURALIDADE</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

<?php foreach ($linhas as $b) :

$json_dados = json_decode($b->JSON_DADOS_ADD,true);
$id_pessoa = $json_dados['IDPESSOA'];
  ?>
  <tr>
                                            <td><?=date('d/m/Y', strtotime($b->DATAENTRADA))?></td>
                                            <td><?=$b->TERMOOBITO?></td>
                                            <td><?=$b->LIVROOBITO?></td>
                                            <td><?=$b->FOLHAOBITO?></td>
                                            <td><?=date('d/m/Y', strtotime($b->DATAOBITO))?></td>
                                            <td><?=$b->NOME?></td>
                                            <td>
                                         <?=retornasexo($id_pessoa)?>
                            
                                            </td>
                                            <td><?=$b->CPF?></td>
                                            <td><?php if ($b->NOMEPAI!='' && $b->NOMEPAI!=' '): ?><?=$b->NOMEPAI?> e <?php endif ?> <?=$b->NOMEMAE?></td>
                                            <td><?=$b->NDO?></td>
                                            <td>
                                              <?=mb_strtoupper($b->LOCALMORTE)?>, <?=mb_strtoupper($b->ENDERECOOBITO)?>, 
                          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($b->CIDADEOBITO)); foreach($c as $c):?>
                          <?=$c->cidade?> (<?=$c->uf?>)
                          <?php endforeach ?>
                                            </td>
                                            <td>
                                              <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($b->NATURALIDADE)); foreach($c as $c):?>
                          <?=$c->cidade?> (<?=$c->uf?>)
                          <?php endforeach ?>
                                            </td>


                                        </tr>
                        
                    
                        <?php endforeach ?>

      </tbody>
                                </table>

                            </div>
<?php endif; ?>






<script type="text/javascript">
$(document).ready(function(){
    $('.table_exportable').DataTable( {
        dom: 'Bfrtip',
      
  buttons: [
    {
      "extend": 'excel',
      "text": '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar Excel',
      'className': 'btn btn-info '
    },
    {
      "extend": 'print',
      "text": '<i class="fa fa-print" ></i> Imprimir',
      'className': 'btn btn-info '
    }
  ]
});

$('#customers_filter').hide();
var htmlbuttons = $('.dt-buttons').addClass('row col-lg-12');
$('#divbuttons').html(htmlbuttons);
//$('#customers_wrapper').hide();
});



</script>

<script src="../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
