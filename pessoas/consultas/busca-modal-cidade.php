<?php

include('../controller/db_functions.php');
$pdo = conectar();
$botao =$_POST["botao"];

if(isset($_POST["botao"]) && !empty($_POST["botao"])){

?>
<div class="body">
            <p class="text-center">
                      <img id="img" src="" style=" width: 10%">
                       </p>
                  <div class="table-responsive">
                   <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                          <thead>
                              <tr>
                                  <th>CIDADE</th>
                                  <th>UF</th>


                              </tr>
                          </thead>
                          <tfoot>
                              <tr>
                                <th>CIDADE</th>
                                  <th>UF</th>


                              </tr>
                          </tfoot>
                          <tbody>
               <?php
              $busca_notas =  PESQUISA_ALL('uf_cidade');
              foreach($busca_notas as $b):
               ?>



                            <tr style="cursor: pointer;" data-dismiss="modal"onclick="preencheCidade2('<?=$b->id?>','<?=$b->uf?>')">


                                  <td><?=$b->cidade?></td>
                                  <td><?=$b->uf?></td>


                              </tr>

              <?php endforeach ?>
                          </tbody>
                      </table>

                  </div>
              </div>

<?php
} ##fechando o IF de cidades
?>
<script type="text/javascript">
      $('.table').DataTable();
</script>
