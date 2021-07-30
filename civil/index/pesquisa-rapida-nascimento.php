 <?php

include('../controller/db_functions.php');
 $pdo = conectar();


if (isset($_GET['nome'])) {
$variavel = $_GET['nome'];    
$busca = $pdo->prepare("SELECT * FROM registro_nascimento_novo where NOMENASCIDO like '%$variavel%' limit 5");
$busca->execute();
$busca_notas = $busca->fetchAll(PDO::FETCH_OBJ);
}

if (isset($_GET['nomemae'])) {
$variavel = $_GET['nomemae'];    
$busca = $pdo->prepare("SELECT * FROM registro_nascimento_novo where NOMEMAE like '%$variavel%' limit 5");
$busca->execute();
$busca_notas = $busca->fetchAll(PDO::FETCH_OBJ);
}

if (isset($_GET['livro'])) {
$variavel = $_GET['livro'];    
$busca = $pdo->prepare("SELECT * FROM registro_nascimento_novo where LIVRONASCIMENTO like '%$variavel%' limit 300");
$busca->execute();
$busca_notas = $busca->fetchAll(PDO::FETCH_OBJ);
}

if (isset($_GET['folha'])) {
$variavel = $_GET['folha'];    
$busca = $pdo->prepare("SELECT * FROM registro_nascimento_novo where FOLHANASCIMENTO like '%$variavel%' limit 300");
$busca->execute();
$busca_notas = $busca->fetchAll(PDO::FETCH_OBJ);
}

if (isset($_GET['termo'])) {
$variavel = $_GET['termo'];    
$busca = $pdo->prepare("SELECT * FROM registro_nascimento_novo where TERMONASCIMENTO like '%$variavel%' limit 5");
$busca->execute();
$busca_notas = $busca->fetchAll(PDO::FETCH_OBJ);
}




 ?>

  <div class="table-responsive">
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>LIVRO</th>
                                            <th>FOLHA</th>
                                            <th>TERMO</th>
                                            <th>SELO</th>
                                            <th>NOME</th>
                                            <th>MÃE</th>
                                                   <th>DATA DO NASCIMENTO</th>

                                           
                                             <th>DOCUMENTOS</th>
                                             <!-- <th>ANOTAÇÕES</th>
                                               <th>AVERBAÇÃO</th> -->
                                               <th>###</th>
                                                    


                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                             <th>LIVRO</th>
                                            <th>FOLHA</th>
                                            <th>TERMO</th>
                                            <th>SELO</th>
                                       <th>NOME</th>
                                            <th>MÃE</th>
                                             <th>DATA DO NASCIMENTO</th>
                                           
                                             <th>DOCUMENTOS</th>
                                             <!-- <th>ANOTAÇÕES</th>
                                               <th>AVERBAÇÃO</th> -->
                                               <th>###</th>   
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        foreach($busca_notas as $b):
                         ?>
                                    <?php if ($b->NOMENASCIDO != NULL || $b->NOMEMAE !=NULL):?>
                                      <tr ondblclick="location.href='registro-nascimento-novo.php?id=<?=$b->ID?>'" style="cursor: pointer;">
                                            <td><?=$b->LIVRONASCIMENTO?></td>
                                            <td><?=$b->FOLHANASCIMENTO?></td>
                                            <td><?=$b->TERMONASCIMENTO?></td>
                                            <td><?=substr($b->SELO, 10,30)?>...</td>
                                            <td><?=$b->NOMENASCIDO?></td>
                                            <td><?=$b->NOMEMAE?></td>

                                            <td><?=date('d/m/Y', strtotime($b->DATANASCIMENTO))?></td>
                                              <!--th><a href="PDFS/pdf-nascimento.php?id=<?=$b->ID?>" class="btn bg-red waves-effect" target='_blank'><i class="material-icons">print</i>IMPRIMIR</a></th-->
                          
                        <td>
                            
                            <button onclick="redirect('<?=$b->ID?>')"
                         class="btn bg-indigo waves-effect col-md-12"><i class="material-icons">print</i> IMPRESSÕES</label></button>
                         <!-- <a href="registro-comprovacao.php?nome_pesquisa=<?=$b->NOMENASCIDO?>&cpf_pesquisa=<?=$b->CPFNASCIDO?>&tipo_busca=NA"
                         class="btn bg-amber waves-effect col-md-12"><i class="material-icons">link</i> INTEIRO TEOR</label></a> -->
                        
                     </td>
                        <!--th><a href="PDFS/pdf-casamento.php?id=<?=$b->ID?>" class="btn bg-red waves-effect"><i class="material-icons">print</i>
                        IMPRIMIR</a></th-->
                                <!-- <td><a href="incluir-anotacao.php?livro=<?=$b->LIVRONASCIMENTO?>&folha=<?=$b->FOLHANASCIMENTO?>&nascimento=ok" class=" col-sm-12 btn waves-effect bg-blue col-sm-12"><i class="material-icons">folder_open</i> ACESSAR</a>
                                <a href="incluir-anotacao-civil.php?idnasc=<?=$b->ID?>" class=" col-sm-12 btn waves-effect bg-pink col-sm-12"><i class="material-icons">add_circle</i> ADICIONAR</a>      
                                    
                                </td>

                        <td>
                                     <a href="pesquisa-nascimento.php?livroav=<?=$b->LIVRONASCIMENTO?>&folhaav=<?=$b->FOLHANASCIMENTO?>&id=<?=$b->ID?>&nomeav=<?=$b->NOMENASCIDO?>" class=" col-sm-12 btn waves-effect bg-blue"><i class="material-icons">folder_open</i>ACESSAR</a>
                                     <a class=" col-sm-12 btn waves-effect bg-pink" href="incluir-averbacao.php?idnasc=<?=$b->ID?>"><i class="material-icons">add_circle</i>ADICIONAR</a></td> -->
                                      <td> <a href="registro-nascimento-novo.php?id=<?=$b->ID?>" class="btn waves-effects bg-grey"><i class="material-icons">edit</i></a></td>      

                                        </tr>

                                    <?php endif ?>
                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>