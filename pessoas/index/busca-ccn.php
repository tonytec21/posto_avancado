 <?php
$arrayids = '';
$pdo = conectar();

$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];

$busca_matricula = $pdo->prepare("SELECT * FROM `pessoa` WHERE dataCadastro >= '$data_inicial' and dataCadastro <= '$data_final' and strFicha >0");
$busca_matricula->execute();

if ($busca_matricula->rowCount() == 0 && $busca_matricula2->rowCount() == 0) {
  $_SESSION['erro'] = 'NENHUM REGISTRO ENCONTRADO NO PERÍODO INFORMADO';
}
else{
  $_SESSION['sucesso'] = 'ARQUIVO PRONTO PARA SER EXPORTADO';
}
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);

?>
<br>
 <div class="table-responsive" >
  <input type="hidden" id="recebeids">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                          <th>##</th>
                                          <th>Nº FICHA</th>
                                          <th>NOME</th>
                                          <th>CPF</th>
                                          <th>EDITAR DADOS</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>##</th>
                                          <th>Nº FICHA</th>
                                          <th>NOME</th>
                                          <th>CPF</th>
                                          <th>EDITAR DADOS</th>

                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php   foreach($linhas as $b):
                          $arrayids .= $b->ID.'-';
                          ?>
                                      <?php if (!empty($b->scanImgAssinatura)): ?>
                                        
                                     
                                      <tr style="text-align: center; padding: -30px">
                                      <td>
                                      <div  class="col-md-2" >
                                      <input type="checkbox" id="<?=$b->ID?>" class="marcados"  onclick="marcar('#<?=$b->ID?>')" />
                                      <label for="<?=$b->ID?>"></label>
                                      </div>
                                      </td>

                                      <?php else: ?>

                                        <tr style="text-align: center; padding: -30px; background:#ffa1a1">
                                      <td style="width:40%;">
                                      <p style="font-weight: bold; color:red;  font-size: 80% ">CADASTRO NÃO PODE SER INSERIDO NO ARQUIVO, IMAGEM DA FICHA NÃO FOI ANEXADA.</p>
                                      </td>
                                      <?php endif ?>




                                        <td><?=$b->strFicha?></td>
                                        <td><?=$b->strNome?></td>
                                        <td><?=$b->strCPFcnpj?></td>
                                        <td><a href="cadastro_pessoas_edit?id=<?=$b->ID?>" class="btn bg-grey"><i class="material-icons">edit</i></a></td>

                                      </tr>

                        <?php endforeach ?>

                                    </tbody>
                                </table>
                                <div class="col-sm-9"></div>
<!--a onclick="window.location.assign('gerador-arquivo-retorno.php?id='+$('#recebeids').val())"  class="btn bg-indigo" > <i class="material-icons">send</i>GERAR ARQUIVO DE RETORNO</a-->
<a
onclick="window.location.assign('gerador-xml-ccn.php?data=<?=$data_inicial?>&id='+$('#recebeids').val());" class="btn bg-indigo" > <i class="material-icons">send</i>GERAR ARQUIVO</a>

                            </div>

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


                                   <div class="col-sm-6">
                    <div  class="col-md-12" >
                    <input type="checkbox" id="todos" onclick="if ($(this).is(':checked') == true) {$('.marcados').prop('checked', true); $('#recebeids').val('<?=$arrayids?>');} else{$('.marcados').prop('checked', false); $('#recebeids').val('');}" />
                    <label for="todos">SELECIONAR TODOS</label>
                    </div>
                    </div>
                    <br><br>