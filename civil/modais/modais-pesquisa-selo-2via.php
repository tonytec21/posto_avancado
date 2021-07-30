<div class="modal fade" id="selo2via" tabindex="-1" role="dialog">
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
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable" id="item" class="display" cellspacing="0" width="100%">
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
                          $busca_notas = PESQUISA_ALL_CAMPO('selo_fisico_uso','tipo','CER');

                  //      $busca_notas =  PESQUISA_ALL('selo_fisico_uso');
                        foreach($busca_notas as $b):
                          if ($b->status == 'L'):

                         ?>
                                      <tr  >


                                            <td><?=$b->selo?></td>
                                            <td><?=$b->strCartela?></td>
                                            <td>
                                              <span class="badge bg-orange">  <?=$b->tipo?></span>

                                            </td>
                                            <td>
                                              <?php if ($b->status == 'L') {
                                              echo '<span class="badge bg-green">LIVRE</span>';
                                              }else {
                                              echo '<span class="badge bg-red">USADO</span>';
                                              } ?>


                                            </td>
                                            <!--td><?=date('d/m/Y', strtotime($b->dataNascimento))?></td-->

                                        </tr>

                                      <?php endif?>

                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                </div>

            </div>
        </div>
    </div>
