 <?php

include('../controller/db_functions.php');
 $pdo = conectar();


if (isset($_GET['nome'])) {
$variavel = $_GET['nome'];    
$busca = $pdo->prepare("SELECT * FROM registro_obito_novo where NOME like '%$variavel%' limit 5");
$busca->execute();
$busca_notas = $busca->fetchAll(PDO::FETCH_OBJ);
}

if (isset($_GET['cpf'])) {
$variavel = $_GET['cpf'];    
$busca = $pdo->prepare("SELECT * FROM registro_obito_novo where CPF like '%$variavel%' limit 5");
$busca->execute();
$busca_notas = $busca->fetchAll(PDO::FETCH_OBJ);
}

if (isset($_GET['livro'])) {
$variavel = $_GET['livro'];    
$busca = $pdo->prepare("SELECT * FROM registro_obito_novo where LIVROOBITO like '%$variavel%' limit 300");
$busca->execute();
$busca_notas = $busca->fetchAll(PDO::FETCH_OBJ);
}

if (isset($_GET['folha'])) {
$variavel = $_GET['folha'];    
$busca = $pdo->prepare("SELECT * FROM registro_obito_novo where FOLHAOBITO like '%$variavel%' limit 300");
$busca->execute();
$busca_notas = $busca->fetchAll(PDO::FETCH_OBJ);
}

if (isset($_GET['termo'])) {
$variavel = $_GET['termo'];    
$busca = $pdo->prepare("SELECT * FROM registro_obito_novo where TERMOOBITO like '%$variavel%' limit 5");
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
                                            <th>NOME/NDO</th>
                                            <th>MÃE</th>
                                            <th>DATA DO ÓBITO</th>
                                           
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
                                         <th>NOME/NDO</th>
                                            <th>MÃE</th>
                                            <th>DATA DO ÓBITO</th>
                                           
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
                                    <?php if($b->NOME != NULL || $b->SELO !=NULL): ?>
                                        <?php if (empty($b->ATOOBITO) || $b->ATOOBITO == 'ACV'): ?>
                                            <tr ondblclick="location.href='registro-obito-novo.php?id=<?=$b->ID?>&acervo=ok'" style="cursor: pointer;">
                                         <?php else: ?>
                                         <tr ondblclick="location.href='registro-obito-novo.php?id=<?=$b->ID?>'" style="cursor: pointer;">   
                                        <?php endif ?>
                                      
                                         <td><?=$b->LIVROOBITO?></td>
                                            <td><?=$b->FOLHAOBITO?></td>
                                            <td><?=$b->TERMOOBITO?></td>
                                            <td><?=substr($b->SELO, 10,30)?>...</td>
                                      <?php if ($b->NOME!='DESCONHECIDO' && $b->NOME!='NAO_REGISTRADO'): ?>
                                            <td><?=$b->NOME?></td>
                                            <?php else: ?>
                                             <td><?=$b->NDO?></td>   
                                            <?php endif ?>      
                                            <td><?=$b->NOMEMAE?></td>
                                            <td><?=date('d/m/Y', strtotime($b->DATAOBITO))?></td>
                        <td>

                           
                            <button onclick="redirect('<?=$b->ID?>')"
                         class="btn bg-indigo waves-effect col-md-12"><i class="material-icons">print</i> IMPRESSÕES</label></button>


 <!-- <a href="registro-comprovacao.php?nome_pesquisa=<?=$b->NOME?>&cpf_pesquisa=<?=$b->CPF?>&tipo_busca=OB"
                         class="btn bg-amber waves-effect col-md-12"><i class="material-icons">link</i> INTEIRO TEOR</label></a> -->
                     
                     </td>
         <!-- <td><a href="incluir-anotacao.php?livro=<?=$b->LIVROOBITO?>&folha=<?=$b->FOLHAOBITO?>&obito=ok" class=" col-sm-12 btn waves-effect bg-blue col-sm-12"><i class="material-icons">folder_open</i> ACESSAR</a>
            <a class="btn waves-effect bg-pink col-sm-12 " href="incluir-anotacao-civil.php?idobt=<?=$b->ID?>"><i class="material-icons">add_circle</i> ADICIONAR</a></td>

        </td> 

  <td> -->
<!-- <a href="pesquisa-obito.php?livroav=<?=$b->LIVROOBITO?>&folhaav=<?=$b->FOLHAOBITO?>&nati=<?=$b->TEMPOINTRAUTERINA?>&id=<?=$b->ID?>&nomeav=<?=$b->NOME?>" class=" col-sm-12 btn waves-effect bg-blue"><i class="material-icons">folder_open</i>ACESSAR</a>
    <a class="btn waves-effect bg-pink col-sm-12 " href="incluir-averbacao.php?idobt=<?=$b->ID?>"><i class="material-icons">add_circle</i> ADICIONAR</a></td> -->
     <?php if (empty($b->ATOOBITO) || $b->ATOOBITO == 'ACV'): ?>                                   
    <td>       <a href="registro-obito-novo.php?id=<?=$b->ID?>&acervo=ok" class="btn waves-effects bg-grey"><i class="material-icons">edit</i></a></td>
    <?php else: ?>
    <td>       <a href="registro-obito-novo.php?id=<?=$b->ID?>" class="btn waves-effects bg-grey"><i class="material-icons">edit</i></a></td>
    <?php endif ?>     
                                        </tr> 

                                             <!--th><a href="PDFS/pdf-obito.php?id=<?=$b->ID?>" class="btn bg-red waves-effect"><i class="material-icons">print</i>IMPRIMIR</a></th-->
                                       <?php endif ?>


                                        </tr>
                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>