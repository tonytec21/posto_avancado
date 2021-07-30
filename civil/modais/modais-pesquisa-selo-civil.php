<div class="modal fade" id="selo" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">SELOS:</h4>
                        </div>
                        <div class="modal-body">
          <div class="body">
                      <p class="text-center">
                                <img id="img" src="" style=" width: 10%">
                                 </p>
                            <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $bn = $pdo->prepare("SELECT * FROM selo_fisico_uso WHERE  tipo = 'GER' and status = 'L' or tipo ='GRA' and status = 'L'   ");
                        $bn->execute();
                        $busca_notas = $bn->fetchAll(PDO::FETCH_OBJ);
                        foreach($busca_notas as $b):
                         ?>
                                      <tr>
                              

                                            <td><?=$b->selo?></td>
                                            <td><?=$b->strCartela?></td>
                                            <td><span class="badge 
                                                <?php if ($b->tipo =='GER'): ?>
                                                    bg-indigo
                                                 <?php else: ?>
                                                 bg-orange   
                                                <?php endif ?>
                                                "><?=$b->tipo?></span></td>
                                            <td>
                                            <?php if ($b->status == 'L'): ?>
                                            <span class="badge bg-green">LIVRE</span>
                                        <?php else: ?>
                                                 <span class="badge bg-red">USADO</span>
                                            <?php endif ?>
                                        
                                                

                                            </td>
                                            <!--td><?=date('d/m/Y', strtotime($b->dataNascimento))?></td-->
                                            
                                        </tr>
                                   

                        <?php endforeach ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>    
         
                </div>
                       
            </div>  
        </div>
    </div>
    <div class="modal fade" id="selorestaura" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">SELOS:</h4>
                        </div>
                        <div class="modal-body">
          <div class="body">
                      <p class="text-center">
                                <img id="img" src="" style=" width: 10%">
                                 </p>
                            <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $bn = $pdo->prepare("SELECT * FROM selo_fisico_uso WHERE  tipo = 'GER' and status = 'L'   ");
                        $bn->execute();
                        $busca_notas = $bn->fetchAll(PDO::FETCH_OBJ);
                        foreach($busca_notas as $b):
                         ?>
                                      <tr style="cursor: pointer;"  >
                              

                                            <td><?=$b->selo?></td>
                                            <td><?=$b->strCartela?></td>
                                            <td><span class="badge 
                                                <?php if ($b->tipo =='GER'): ?>
                                                    bg-indigo
                                                 <?php else: ?>
                                                 bg-orange   
                                                <?php endif ?>
                                                "><?=$b->tipo?></span></td>
                                            <td>
                                            <?php if ($b->status == 'L'): ?>
                                            <span class="badge bg-green">LIVRE</span>
                                        <?php else: ?>
                                                 <span class="badge bg-red">USADO</span>
                                            <?php endif ?>
                                        
                                                

                                            </td>
                                            <!--td><?=date('d/m/Y', strtotime($b->dataNascimento))?></td-->
                                            
                                        </tr>
                                   

                        <?php endforeach ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>    
         
                </div>
                       
            </div>  
        </div>
    </div>
<div class="modal fade" id="selogratis" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">SELOS:</h4>
                        </div>
                        <div class="modal-body">
          <div class="body">
                      <p class="text-center">
                                <img id="img" src="" style=" width: 10%">
                                 </p>
                            <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $bn = $pdo->prepare("SELECT * FROM selo_fisico_uso WHERE tipo ='GRA' and status = 'L'   ");
                        $bn->execute();
                        $busca_notas = $bn->fetchAll(PDO::FETCH_OBJ);
                        foreach($busca_notas as $b):
                         ?>
                                      <tr   >
                              

                                            <td><?=$b->selo?></td>
                                            <td><?=$b->strCartela?></td>
                                            <td><span class="badge 
                                                <?php if ($b->tipo =='GER'): ?>
                                                    bg-indigo
                                                 <?php else: ?>
                                                 bg-orange   
                                                <?php endif ?>
                                                "><?=$b->tipo?></span></td>
                                            <td>
                                            <?php if ($b->status == 'L'): ?>
                                            <span class="badge bg-green">LIVRE</span>
                                        <?php else: ?>
                                                 <span class="badge bg-red">USADO</span>
                                            <?php endif ?>
                                        
                                                

                                            </td>
                                            <!--td><?=date('d/m/Y', strtotime($b->dataNascimento))?></td-->
                                            
                                        </tr>
                                   

                        <?php endforeach ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>    
         
                </div>
                       
            </div>  
        </div>
    </div>


    <div class="modal fade" id="modalselosegundavia" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button onclick="$('#seloSegundaVia').modal();" type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">SELOS:</h4>
                        </div>
                        <div class="modal-body">
          <div class="body">
                      <p class="text-center">
                                <img id="img" src="" style=" width: 10%">
                                 </p>
                            <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $bn = $pdo->prepare("SELECT * FROM selo_fisico_uso WHERE  tipo = 'CER' and status = 'L' or tipo ='GRA' and status = 'L' ");
                        $bn->execute();
                        $busca_notas = $bn->fetchAll(PDO::FETCH_OBJ);
                        foreach($busca_notas as $b):
                         ?>
                                      <tr  >
                              

                                            <td><?=$b->selo?></td>
                                            <td><?=$b->strCartela?></td>
                                            <td><span class="badge 
                                                <?php if ($b->tipo =='CER'): ?>
                                                    bg-red
                                                 <?php else: ?>
                                                 bg-orange   
                                                <?php endif ?>
                                                "><?=$b->tipo?></span></td>
                                            <td>
                                            <?php if ($b->status == 'L'): ?>
                                            <span class="badge bg-green">LIVRE</span>
                                        <?php else: ?>
                                                 <span class="badge bg-red">USADO</span>
                                            <?php endif ?>
                                        
                                                

                                            </td>
                                            <!--td><?=date('d/m/Y', strtotime($b->dataNascimento))?></td-->
                                            
                                        </tr>
                                   

                        <?php endforeach ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>    
         
                </div>
                       
            </div>  
        </div>
    </div>

        <div class="modal fade" id="modalseloportatil" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button onclick="$('#seloportatil').modal();" type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">SELOS:</h4>
                        </div>
                        <div class="modal-body">
          <div class="body">
                      <p class="text-center">
                                <img id="img" src="" style=" width: 10%">
                                 </p>
                            <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $bn = $pdo->prepare("SELECT * FROM selo_fisico_uso WHERE  tipo = 'CER' and status = 'L' or tipo ='GRA' and status = 'L' ");
                        $bn->execute();
                        $busca_notas = $bn->fetchAll(PDO::FETCH_OBJ);
                        foreach($busca_notas as $b):
                         ?>
                                      <tr  >
                              

                                            <td><?=$b->selo?></td>
                                            <td><?=$b->strCartela?></td>
                                            <td><span class="badge 
                                                <?php if ($b->tipo =='GER'): ?>
                                                    bg-indigo
                                                 <?php else: ?>
                                                 bg-orange   
                                                <?php endif ?>
                                                "><?=$b->tipo?></span></td>
                                            <td>
                                            <?php if ($b->status == 'L'): ?>
                                            <span class="badge bg-green">LIVRE</span>
                                        <?php else: ?>
                                                 <span class="badge bg-red">USADO</span>
                                            <?php endif ?>
                                        
                                                

                                            </td>
                                            <!--td><?=date('d/m/Y', strtotime($b->dataNascimento))?></td-->
                                            
                                        </tr>
                                   

                        <?php endforeach ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>    
         
                </div>
                       
            </div>  
        </div>
    </div>

<div class="modal fade" id="modalseloxml" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button onclick="$('#seloxml').modal();" type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">SELOS:</h4>
                        </div>
                        <div class="modal-body">
          <div class="body">
                      <p class="text-center">
                                <img id="img" src="" style=" width: 10%">
                                 </p>
                            <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $bn = $pdo->prepare("SELECT * FROM selo_fisico_uso WHERE  tipo = 'CER' and status = 'L' or tipo ='GRA' and status = 'L' ");
                        $bn->execute();
                        $busca_notas = $bn->fetchAll(PDO::FETCH_OBJ);
                        foreach($busca_notas as $b):
                         ?>
                                      <tr  >
                              

                                            <td><?=$b->selo?></td>
                                            <td><?=$b->strCartela?></td>
                                            <td><span class="badge 
                                                <?php if ($b->tipo =='GER'): ?>
                                                    bg-indigo
                                                 <?php else: ?>
                                                 bg-orange   
                                                <?php endif ?>
                                                "><?=$b->tipo?></span></td>
                                            <td>
                                            <?php if ($b->status == 'L'): ?>
                                            <span class="badge bg-green">LIVRE</span>
                                        <?php else: ?>
                                                 <span class="badge bg-red">USADO</span>
                                            <?php endif ?>
                                        
                                                

                                            </td>
                                            <!--td><?=date('d/m/Y', strtotime($b->dataNascimento))?></td-->
                                            
                                        </tr>
                                   

                        <?php endforeach ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>    
         
                </div>
                       
            </div>  
        </div>
    </div>




    <div class="modal fade" id="modalseloteor" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button onclick="

if ($('#tipoteor').val() == 'cas') { $('#seloTeorCasamento').modal();}
else if($('#tipoteor').val() == 'nas'){$('#seloTeorNascimento').modal();}
else{$('#seloTeorObito').modal();}

                  " type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">SELOS:</h4>
                        </div>
                        <div class="modal-body">
          <div class="body">
                      <p class="text-center">
                                <img id="img" src="" style=" width: 10%">
                                 </p>
                            <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           <th>SELO</th>
                                            <th>CARTELA</th>
                                            <th>TIPO</th>
                                            <th>STATUS</th>
                                          
                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $bn = $pdo->prepare("SELECT * FROM selo_fisico_uso WHERE  tipo = 'CER' and status = 'L' or tipo ='GRA' and status = 'L' ");
                        $bn->execute();
                        $busca_notas = $bn->fetchAll(PDO::FETCH_OBJ);
                        foreach($busca_notas as $b):
                         ?>
                                      <tr  >
                              

                                            <td><?=$b->selo?></td>
                                            <td><?=$b->strCartela?></td>
                                            <td><span class="badge 
                                                <?php if ($b->tipo =='GER'): ?>
                                                    bg-indigo
                                                 <?php else: ?>
                                                 bg-orange   
                                                <?php endif ?>
                                                "><?=$b->tipo?></span></td>
                                            <td>
                                            <?php if ($b->status == 'L'): ?>
                                            <span class="badge bg-green">LIVRE</span>
                                        <?php else: ?>
                                                 <span class="badge bg-red">USADO</span>
                                            <?php endif ?>
                                        
                                                

                                            </td>
                                            <!--td><?=date('d/m/Y', strtotime($b->dataNascimento))?></td-->
                                            
                                        </tr>
                                   

                        <?php endforeach ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>    
         
                </div>
                       
            </div>  
        </div>
    </div>
