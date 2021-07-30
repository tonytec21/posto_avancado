<?php

include('../controller/db_functions.php');
$pdo = conectar();

  function tirarAcentos($string){
    return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
}

?>

  <div class="body">

                            <div class="table-responsive" style="font-size: 16px!important">
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
                               
                                        
                                      
                                      <tr style="cursor: pointer;" data-dismiss="modal"onclick="preencheCidades('<?=$b->id?>','<?=tirarAcentos(str_replace("'", " ", $b->cidade))?>','<?=$b->uf?>')">
                                     
                                          
                                            <td><?=tirarAcentos(str_replace("'", " ", $b->cidade))?></td>
                                            <td><?=$b->uf?></td>
                                           
                                            
                                        </tr>
                                       
                        <?php endforeach ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>    
         
                  
<script type="text/javascript">
      $('.table').DataTable();
</script>