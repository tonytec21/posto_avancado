 <?php 

$pdo = conectar();
$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];


if (isset($_GET['Livro'])&& !empty($_GET['Livro'])) {
$busca_matricula = $pdo->prepare("SELECT * FROM `registro_nascimento_novo` WHERE LIVRONASCIMENTO =".$_GET['Livro']); 
}
else{
$busca_matricula = $pdo->prepare("SELECT * FROM `registro_nascimento_novo` WHERE DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final'");
}




$busca_matricula->execute();
if ($busca_matricula->rowCount() == 0) {
  $_SESSION['erro'] = 'NENHUM REGISTRO ENCONTRADO NO PERÍODO INFORMADO';
}
else{
  $_SESSION['sucesso'] = 'ARQUIVO PRONTO PARA SER EXPORTADO';
}
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);
?>
 <div class="table-responsive" >
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                          <th>DATA DO REGISTRO</th>
                                          <th>TERMO</th>
                                          <th>LIVRO</th>
                                          <th>FOLHA</th>
                                         <th>DATA NASCIMENTO</th>
                                         <th>NOME NASCIDO</th>
                                         <th>SEXO</th>
                                         <th>CPF</th>
                                         <th>FILIAÇÃO</th>
                                         <th>DNV</th>
                                         <th>LOCAL DE NASCIMENTO</th>
                                         <th>NATURALIDADE</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>DATA DO REGISTRO</th>
                                            <th>TERMO</th>
                                            <th>LIVRO</th>
                                            <th>FOLHA</th>
                                           <th>DATA NASCIMENTO</th>
                                           <th>NOME NASCIDO</th>
                                           <th>SEXO</th>
                                         <th>CPF</th>
                                         <th>FILIAÇÃO</th>
                                         <th>DNV</th>
                                         <th>LOCAL DE NASCIMENTO</th>
                                         <th>NATURALIDADE</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php   foreach($linhas as $b):?>
                         
                                      <tr>
                                            <td><?=date('d/m/Y', strtotime($b->DATAENTRADA))?></td>
                                            <td><?=$b->TERMONASCIMENTO?></td>
                                            <td><?=$b->LIVRONASCIMENTO?></td>
                                            <td><?=$b->FOLHANASCIMENTO?></td>
                                            <td><?=date('d/m/Y', strtotime($b->DATANASCIMENTO))?></td>
                                            <td><?=$b->NOMENASCIDO?></td>
                                            <td>
                                          <?php if ($b->SEXONASCIDO == 'M') :?>
                                          Masculino
                                          <?php else: ?>  
                                          Feminino
                                          <?php endif ?>
                            
                                            </td>
                                            <td><?=$b->CPFNASCIDO?></td>
                                            <td><?php if ($b->NOMEPAI!='' && $b->NOMEPAI!=' '): ?><?=$b->NOMEPAI?> e <?php endif ?> <?=$b->NOMEMAE?></td>
                                            <td><?=$b->DNV?></td>
                                            <td>
                                              <?=mb_strtoupper($b->LOCALNASCIMENTO)?>, <?=mb_strtoupper($b->ENDERECOLOCALNASCIMENTO)?>, 
                          <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($b->CIDADENASCIMENTO)); foreach($c as $c):?>
                          <?=$c->cidade?> (<?=$c->uf?>)
                          <?php endforeach ?>
                                            </td>
                                            <td>
                                              <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($b->NATURALIDADENASCIDO)); foreach($c as $c):?>
                          <?=$c->cidade?> (<?=$c->uf?>)
                          <?php endforeach ?>
                                            </td>


                                        </tr>
                        
                    
                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>