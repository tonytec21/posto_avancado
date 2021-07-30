 <?php 

$pdo = conectar();
$data_inicial = $_GET['data_inicial'].' 00:00:00';
$data_final = $_GET['data_final'].' 23:00:00';;


if (isset($_GET['Livro'])&& !empty($_GET['Livro'])) {
$busca_matricula = $pdo->prepare("SELECT * FROM `registro_nascimento_novo` WHERE LIVRONASCIMENTO =".$_GET['Livro']); 
}
else{
$busca_matricula = $pdo->prepare("SELECT strNome, strFicha, strCPFcnpj, dataCadastro FROM pessoa WHERE dataCadastro >= '$data_inicial' and dataCadastro <= '$data_final' and strFicha!='' and strFicha!='0' order by strNome ASC");
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
                                <table class="table js-exportable">
                                    <thead>
                                        <tr>
                                          <th>NOME</th>
                                          
                                          <th>CPF</th>
                                          <th>DATA CADASTRO</th>
                                     <th>FICHA</th>

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>NOME</th>
                                            
                                          <th>CPF</th>
                                          <th>DATA CADASTRO</th>
                                        <th>FICHA</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php   foreach($linhas as $b):?>
                         
                                      <tr>
                                        <td style="text-transform: capitalize;"><?=mb_strtoupper($b->strNome)?></td>
                                        
                                        
                                        <td><?=$b->strCPFcnpj?></td>
                                        <td><?=date('d/m/Y',strtotime($b->dataCadastro))?></td>
                                        <td><?=$b->strFicha?></td>

                                        </tr>
                        
                    
                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>


                          