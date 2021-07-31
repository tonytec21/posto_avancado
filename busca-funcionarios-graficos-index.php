<?php

include('controller/db_functions.php');
$pdo = conectar();
$arrayids = '';
?>
   <div class="col-sm-5">ATOS PRATICADOS</div>
               <div class="col-sm-5">
                    <!--div  class="col-md-12" >
                    <input type="checkbox" id="todos" onclick="if ($(this).is(':checked') == true) {$('.marcados').prop('checked', true); $('#recebeids').val('<?=$arrayids?>');} else{$('.marcados').prop('checked', false); $('#recebeids').val('');}" />
                    <label for="todos">SELECIONAR TODOS</label>
                    </div-->
                    </div>
                     <a id="acoes" onclick="$('#pessoarecibo').modal();$('#iddosrecibos').val($('#recebeids').val()); "  class="btn waves-effect bg-indigo"><i class="material-icons">print</i>GERAR RECIBO</a>
                    <!--div class="col-sm-2"><a onclick="carregaatos()" class="btn bg-green"><i class="material-icons">refresh</i>ATUALIZAR</a></div-->                              

   <div class="body">
                      
                            <div class="table-responsive">
                             <table id="funfun" class="table table-bordered table-striped table-hover dataTable js-exportable" style="font-size: 70%!important">
                                    <thead>
                                        <tr>
                                          <input type="text" id="recebeids" style="display: none">
                                            <th>##</th>
                                            <th>ATO</th>
                                            <th>SELO/SELO INICIAL</th>
                                            <th>LIVRO</th>
                                            <th>FOLHA</th>
                                            <th>PAP. SEGURANÇA</th>
                                            <th>NOME</th>
                                            <th>ATIVIDADE</th>
                                            <th>DATA/HORA</th>
                                           <th>QUANTIDADE DE SELOS</th>
                                           <th>QR CODE</th>
                                           <!--th>EDITAR</th-->
                                            <!--th><i class="material-icons">print</i> RECIBO</th-->
                                           

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                           
                                            <th>##</th>
                                            <th>ATO</th>
                                            <th>SELO/SELO INICIAL</th>
                                            <th>LIVRO</th>
                                            <th>FOLHA</th>
                                            <th>PAP. SEGURANÇA</th>
                                            <th>NOME</th>
                                            <th>ATIVIDADE</th>
                                            <th>DATA/HORA</th>
                                           <th>QUANTIDADE DE SELOS</th>
                                           <th>QR CODE</th>
                                           <!--th>EDITAR</th-->
                                            <!--th><i class="material-icons">print</i> RECIBO</th-->

                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                         $data_inicial = $_GET['datainicial'];
                          $data_final = $_GET['datafinal'].'23:00:00';

                        $busca_notas =  $pdo->prepare("SELECT * FROM auditoria where dataHora >= '$data_inicial' and dataHora <= '$data_final' ORDER BY ID desc");
                        $busca_notas->execute();
                        $b = $busca_notas->fetchAll(PDO::FETCH_OBJ);

                        foreach($b as $b):
                        $arrayids .= $b->id.'-';    
                         ?>
                                      <tr style="cursor: pointer;">
                                            <td>
                                            <div  class="col-md-2" >
                                            <input type="checkbox" id="<?=$b->id?>" class="marcados"  onclick="marcar('#<?=$b->id?>')" />
                                            <label for="<?=$b->id?>"></label>
                                            </div>
                                            </td> 
                                            <td><?=$b->strTipoAto?></td>
                                            <td><a style="font-size: 8px" class="btn bg-grey" href="https://selo.tjma.jus.br/#/resumo/<?=strip_tags($b->strSelo)?>" target='_blank'><i class="material-icons" >assignment</i><?=strip_tags($b->strSelo)?></a></td>
                                            
                                            <td><?=str_pad($b->Livro,5,"0", STR_PAD_LEFT)?></td>
                                            <td><?=str_pad($b->Folha,3,"0", STR_PAD_LEFT)?></td>
                                            <td><?=$b->NumeroPapelSeguranca?></td>
                                            <td><?=$b->strUsuario?></td>
                                            <td><?=$b->intAcao?></td>
                                            <td><?=date('d/m/Y - H:i:s', strtotime($b->dataHora))?></td>
                                            <td><?=$b->intQuantidadeSelo?></td>
                                            <td><a target="_blank" href="geradorqrcode.php?id=<?=$b->id?>" class="btn waves-effect bg-blue ">QR CODE</a></td>
                                            <!--td><a href="editar-auditoria.php?id=<?=$b->id?>" class="btn waves-effect bg-grey"><i class="material-icons">edit</i></a></td-->
                                            <!--td></td-->
                                            

                                        </tr>
                                  


                        <?php endforeach ?>
                                    </tbody>

                                </table>
 
                            </div>
                        </div>
   
<script type="text/javascript">
      $('#funfun').DataTable({
        "ordering": false,
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });


</script>

<script type="text/javascript">
  function marcar(valor){
    var valor = valor;
    var valor2 = valor.replace('#','');
     if ($(valor).is(':checked') != false) {
                              if ($('#recebeids').val()!='') {
                                $('#recebeids').val($('#recebeids').val() + '-' +valor2);
                              }
                              else{
                                $('#recebeids').val(valor2);
                              }
                         }
                       else{
                        var tirar = valor2;
                        var qtem = $('#recebeids').val();
                        var qtem = qtem.replace(tirar,' ');
                        var qtem = qtem.replace('- ','');
                        //alert(qtem);
                        $('#recebeids').val(qtem);
                       }  
  }
</script>


                       
                    <br><br>
<script type="text/javascript">
  $('.marcados').click(function(){
    var concerta = $('#recebeids').val();
    var concerta = concerta.replace(' ', '');
    $('#recebeids').val(concerta);
    if ($('#recebeids').val()!='') {
      $('#acoes').show();
    }
    else{
      $('#acoes').hide();
    }
  })
</script>