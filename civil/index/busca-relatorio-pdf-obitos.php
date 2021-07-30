 <?php 

$pdo = conectar();
$data_inicial = $_GET['data_inicial'];
$data_final = $_GET['data_final'];
if (isset($_GET['Livro'])&& !empty($_GET['Livro'])) {
$busca_matricula = $pdo->prepare("SELECT * FROM `registro_obito_novo` WHERE LIVROOBITO=".$_GET['Livro']);
}
else{  
$busca_matricula = $pdo->prepare("SELECT * FROM `registro_obito_novo` WHERE DATAENTRADA >= '$data_inicial' and DATAENTRADA <= '$data_final'");
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
                                         <th>DATA ÓBITO</th>
                                         <th>NOME</th>
                                         <th>SEXO</th>
                                         <th>CPF</th>
                                         <th>FILIAÇÃO</th>
                                         <th>D.O</th>
                                         <th>NATURALIDADE</th>
                                         <th>DEIXOU BENS A INVENTARIAR</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>DATA DO REGISTRO</th>
                                            <th>TERMO</th>
                                          <th>LIVRO</th>
                                          <th>FOLHA</th>
                                         <th>DATA NASCIMENTO</th>
                                         <th>DATA ÓBITO</th>
                                         <th>NOME</th>
                                         <th>SEXO</th>
                                         <th>CPF</th>
                                         <th>FILIAÇÃO</th>
                                         <th>D.O</th>
                                         <th>NATURALIDADE</th>
                                         <th>DEIXOU BENS A INVENTARIAR</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php   foreach($linhas as $b):?>
                         
                                      <tr>
                                            <td><?=date('d/m/Y', strtotime($b->DATAENTRADA))?></td>
                                            <td><?=$b->TERMOOBITO?></td>
                                            <td><?=$b->LIVROOBITO?></td>
                                            <td><?=$b->FOLHAOBITO?></td>
                                            <td><?=date('d/m/Y', strtotime($b->DATANASCIMENTO))?></td>
                                            <td><?=date('d/m/Y', strtotime($b->DATAOBITO))?></td>
                                            <td><?=$b->NOME?></td>
                                            <td>
                                          <?php if ($b->SEXO == 'M') :?>
                                          Masculino
                                          <?php else: ?>  
                                          Feminino
                                          <?php endif ?>
                            
                                            </td>
                                            <td><?=$b->CPF?></td>
                                            <td><?php if ($b->NOMEPAI!='' && $b->NOMEPAI!=' '): ?><?=$b->NOMEPAI?> e <?php endif ?> <?=$b->NOMEMAE?></td>
                                            <td><?=$b->NDO?></td>

                                            <td>
                                              <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($b->NATURALIDADE)); foreach($c as $c):?>
                          <?=$c->cidade?> (<?=$c->uf?>)
                          <?php endforeach ?>
                                            </td>

                                            <td>
                                            <?php if ($b->DEIXOUBENS == 'S'): ?>
                                            Deixou Bens, Com testamento Conhecido 

                                            <?php elseif ($b->DEIXOUBENS == 'S2'): ?>
                                            Deixou Bens, Sem testamento Conhecido
                                            <?php elseif ($b->DEIXOUBENS == 'N'): ?>
                                            Não Deixou Bens, Com testamento Conhecido  
                                            <?php else: ?>
                                            Não deixou bens, Sem testamento Conhecido  
                                            <?php endif ?> 

                                            </td>
                                        </tr>
                        
                    
                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>