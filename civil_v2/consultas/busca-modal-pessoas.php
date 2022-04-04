<?php

include('../controller/db_functions.php');
$pdo = conectar();
$botao =$_POST["botao"];

if(isset($_POST["botao"]) && !empty($_POST["botao"])){
?>

<div class="body">
            <p class="text-center">
                      <img id="img" src="" style=" width: 10%">
                       </p>
                  <div class="table-responsive">
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
          //    $busca_notas =  PESQUISA_ALL('pessoa');
              $bn = $pdo->prepare("select ID, setTipoPessoa, hiddencaminhofoto, strNome, strRazaoSocial,strCPFcnpj, strRG, strOrgaoEm, strProfissao, strNaturalidade, setSexo, strNacionalidade,dataNascimento,setEstadoCivil,strNomeFilhos,strNomeConjuge,strNomeExConjuge,dataCasamento,strCartorioCasamento,strLogradouro,strEmail,strBairro,intUFcidade,strUF,strTelefone,strTelCelular,strNomePai,strNomeMae,dataCadastro,strRepresentante1,strRepresentante2,strRepresentante3,strObservacao,setRegimeBens,dataEmissao,strFicha from pessoa;");
              $bn->execute();
              $busca_notas =  $bn->fetchAll(PDO::FETCH_OBJ);

              foreach($busca_notas as $b):
               ?>


                            <tr style="cursor: pointer;" data-dismiss="modal"onclick="preenchePessoa2
                            ('<?=$b->strNome?>',
                            '<?=$b->ID?>',
                            '<?=$b->strRG?>',
                             '<?=$b->setSexo?>',
                            '<?=$b->strCPFcnpj?>',
                            '<?=$b->strProfissao?>',
                            '<?=$b->strNaturalidade?>',
                            '<?=$b->strNacionalidade?>',
                            '<?=$b->dataNascimento?>',
                            '<?=$b->setEstadoCivil?>',
                            '<?=$b->strNomeFilhos?>',
                            '<?=$b->strNomeConjuge?>',
                            '<?=$b->strNomeExConjuge?>',
                            '<?=$b->dataCasamento?>',
                            '<?=$b->strCartorioCasamento ?>',
                            '<?=$b->strLogradouro?>',
                            '<?=$b->strEmail?>',
                            '<?=$b->strBairro?>',
                            '<?=$b->intUFcidade?>/<?php $w = PESQUISA_ALL_ID('uf_cidade',$b->intUFcidade); foreach ($w as $w) {echo $w->cidade;}?>',
                            '<?=$b->strUF?>',
                            '<?=$b->strTelefone?>',
                            '<?=$b->strTelCelular?>',
                            '<?=$b->strNomePai?>',
                            '<?=$b->strNomeMae?>',

                            )

                            ">
                              <?php if ($b->setTipoPessoa== 'J'): ?>
                                  <td><?=$b->strRazaoSocial?></td>
                                  <?php else: ?>
                                  <td><?=$b->strNome?></td>
                              <?php endif ?>

                                  <td><?=$b->strNaturalidade?></td>
                                  <td><?=$b->strCPFcnpj?></td>
                                  <td><?=$b->strTelefone?></td>
                                  <td><?=date('d/m/Y', strtotime($b->dataNascimento))?></td>

                              </tr>


              <?php endforeach ?>
                          </tbody>
                      </table>

                  </div>
              </div>
<?php
} ##fechando o IF de pessoas
?>
<script type="text/javascript">
      $('.table').DataTable();
</script>
