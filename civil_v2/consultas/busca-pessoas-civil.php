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
                                            <th>NOME/RAZ.SOCIAL</th>
                                            <th>NATURALIDADE</th>
                                            <th>CPF</th>
                                           <th>TELEFONE</th>
                                           <th>DATA DE NASCIMENTO</th>
                                            
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>NOME/RAZ.SOCIAL</th>
                                            <th>NATURALIDADE</th>
                                            <th>CPF</th>
                                           <th>TELEFONE</th>
                                           <th>DATA DE NASCIMENTO</th>
                                          
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $bn = $pdo->prepare("select ID, setTipoPessoa, hiddencaminhofoto, strNome, strRazaoSocial,strCPFcnpj, strRG, strOrgaoEm, strProfissao, strNaturalidade, setSexo, strNacionalidade,dataNascimento,setEstadoCivil,strNomeFilhos,strNomeConjuge,strNomeExConjuge,dataCasamento,strCartorioCasamento,strLogradouro,strEmail,strBairro,intUFcidade,strUF,strTelefone,strTelCelular,strNomePai,strNomeMae,dataCadastro,strRepresentante1,strRepresentante2,strRepresentante3,strObservacao,setRegimeBens,dataEmissao,strFicha from pessoa;");
                        $bn->execute(); 
                        $busca_notas =  $bn->fetchAll(PDO::FETCH_OBJ);
                        foreach($busca_notas as $b):
                         ?>
                                  
                                               <?php if ($b->setTipoPessoa!= 'J'): ?>
                                      
                                      <tr style="cursor: pointer;" data-dismiss="modal"onclick="preenchePessoa
                                      ('<?=str_replace("'", " ", $b->strNome)?>',
                                      '<?=$b->ID?>',
                                      '<?=$b->strRG?>',
                                        '<?=$b->strOrgaoEm?>',
                                       '<?=$b->setSexo?>',
                                      '<?=$b->strCPFcnpj?>',
                                      '<?=$b->strProfissao?>',
                                      '<?=addslashes($b->strNaturalidade)?>',
                                      '<?=$b->strNacionalidade?>',
                                      '<?=$b->dataNascimento?>',
                                      '<?=$b->setEstadoCivil?>',
                                      '<?=$b->strNomeFilhos?>',
                                      '<?=$b->strNomeConjuge?>',
                                      '<?=$b->strNomeExConjuge?>',
                                      '<?=$b->dataCasamento?>',
                                      '<?=$b->strCartorioCasamento ?>',
                                      '<?=addslashes($b->strLogradouro)?>',
                                      '<?=$b->strEmail?>',
                                      '<?=addslashes($b->strBairro)?>',
                                      '<?=addslashes($b->intUFcidade)?>',
                                      '<?=$b->strTelefone?>',
                                      '<?=$b->strTelCelular?>',
                                      '<?=$b->strNomePai?>',
                                      '<?=$b->strNomeMae?>',
                                      )

                                      ">
                                 
                                         
                                            <td><?=tirarAcentos(str_replace("'", " ", $b->strNome))?></td>
                            

                                            <td><?=$b->strNaturalidade?></td>
                                            <td><?=$b->strCPFcnpj?></td>
                                            <td><?=$b->strTelefone?></td>
                                            <td><?=date('d/m/Y', strtotime($b->dataNascimento))?></td>
                                            
                                        </tr>
                                     
                                                    <?php endif ?>

                        <?php endforeach ?>
                                    </tbody>
                                </table>
                              
                            </div>
                        </div>    
         
<script type="text/javascript">
      $('.table').DataTable();
</script>