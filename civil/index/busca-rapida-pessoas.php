<?php

include('../../controller/db_functions.php');
 $pdo = conectar();

if (isset($_GET['nome'])){
    $busca = $_GET['nome'];
    $query = "select ID, setTipoPessoa, hiddencaminhofoto, strNome, strRazaoSocial,strCPFcnpj, strRG, strOrgaoEm, strProfissao, strNaturalidade, setSexo, strNacionalidade,dataNascimento,setEstadoCivil,strNomeFilhos,strNomeConjuge,strNomeExConjuge,dataCasamento,strCartorioCasamento,strLogradouro,strEmail,strBairro,intUFcidade,strUF,strTelefone,strTelCelular,strNomePai,strNomeMae,dataCadastro,strRepresentante1,strRepresentante2,strRepresentante3,strObservacao,setRegimeBens,dataEmissao,strFicha, RETORNOSELODIGITAL from pessoa WHERE strNome like '%$busca%' LIMIT 20";
}

else if (isset($_GET['razaoSocial'])){
    $busca = $_GET['razaoSocial'];
    $query = "select ID, setTipoPessoa, hiddencaminhofoto, strNome, strRazaoSocial,strCPFcnpj, strRG, strOrgaoEm, strProfissao, strNaturalidade, setSexo, strNacionalidade,dataNascimento,setEstadoCivil,strNomeFilhos,strNomeConjuge,strNomeExConjuge,dataCasamento,strCartorioCasamento,strLogradouro,strEmail,strBairro,intUFcidade,strUF,strTelefone,strTelCelular,strNomePai,strNomeMae,dataCadastro,strRepresentante1,strRepresentante2,strRepresentante3,strObservacao,setRegimeBens,dataEmissao,strFicha, RETORNOSELODIGITAL from pessoa WHERE strRazaoSocial like '%$busca%' LIMIT 20";
}

else if (isset($_GET['cpf'])){
    $busca = $_GET['cpf'];
    $query = "select ID, setTipoPessoa, hiddencaminhofoto, strNome, strRazaoSocial,strCPFcnpj, strRG, strOrgaoEm, strProfissao, strNaturalidade, setSexo, strNacionalidade,dataNascimento,setEstadoCivil,strNomeFilhos,strNomeConjuge,strNomeExConjuge,dataCasamento,strCartorioCasamento,strLogradouro,strEmail,strBairro,intUFcidade,strUF,strTelefone,strTelCelular,strNomePai,strNomeMae,dataCadastro,strRepresentante1,strRepresentante2,strRepresentante3,strObservacao,setRegimeBens,dataEmissao,strFicha, RETORNOSELODIGITAL from pessoa WHERE strCPFcnpj like '%$busca%' LIMIT 20";
}


else if (isset($_GET['numficha'])){
    $busca = $_GET['numficha'];
    $query = "select ID, setTipoPessoa, hiddencaminhofoto, strNome, strRazaoSocial,strCPFcnpj, strRG, strOrgaoEm, strProfissao, strNaturalidade, setSexo, strNacionalidade,dataNascimento,setEstadoCivil,strNomeFilhos,strNomeConjuge,strNomeExConjuge,dataCasamento,strCartorioCasamento,strLogradouro,strEmail,strBairro,intUFcidade,strUF,strTelefone,strTelCelular,strNomePai,strNomeMae,dataCadastro,strRepresentante1,strRepresentante2,strRepresentante3,strObservacao,setRegimeBens,dataEmissao,strFicha, RETORNOSELODIGITAL from pessoa WHERE strFicha like '%$busca%' LIMIT 20";
}


 ?>

 <div class="table-responsive" style="text-transform:uppercase">
                             <table class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>NOME/RAZ.SOCIAL</th>

                                            <th>CPF/CNPJ</th>
                                           <!--th>TELEFONE</th>
                                           <th>DATA DE NASCIMENTO</th-->
                                            <th>SCAN ASS.</th>
                                            <th>SCAN DOC.</th>
                                            <th>FOTO</th>
                                            <th>EDITAR</th>
                                             <th>#######</th>
                                             <th>Nº FICHA</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>NOME/RAZ.SOCIAL</th>

                                            <th>CPF/CNPJ</th>
                                           <!--th>TELEFONE</th>
                                           <th>DATA DE NASCIMENTO</th-->
                                            <th>SCAN ASS.</th>
                                            <th>SCAN DOC.</th>
                                           <th>FOTO</th>
                                           <th>EDITAR</th>
                                           <th>#######</th>
                                           <th>Nº FICHA</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>

                         <?php
                        if(!empty($query) && $busca!=''):
                        $busca =  $pdo->prepare("$query");
                        $busca->execute();
                        $busca_notas = $busca->fetchALL(PDO::FETCH_OBJ);
                        foreach($busca_notas as $b):
                         ?>
                                      <tr >
                                        <?php if ($b->setTipoPessoa== 'J'): ?>
                                            <td><?=$b->strRazaoSocial?></td>
                                            <?php else: ?>
                                            <td><?=$b->strNome?></td>
                                        <?php endif ?>

                                            <td><?=$b->strCPFcnpj?></td>
                                    <?php $tirar = array(' alt="" width="128" height="128"');?>
                                    <td><a href="PDFS/pdf-imagem-pessoa.php?id=<?=$b->ID?>&assinatura=ok" class="btn waves-effect bg-red"><i class="material-icons">print</i>CART ASS. ACERVO</a></td>
                                    <td><a href="PDFS/pdf-imagem-pessoa.php?id=<?=$b->ID?>&doc=ok" class="btn waves-effect bg-red"><i class="material-icons">print</i>DOCUMENTO ACERVO</a></td>
                                            <td><button class="btn waves-effect bg-amber" onclick="exibeimg('<?=$b->hiddencaminhofoto?>')"><i class="material-icons">photo</i></button></td>
                                             <script type="text/javascript">
                                            function exibeimg(imagem){
                                            document.getElementById('img').src = imagem;
                                            }
                                            </script>
                                            <td><p class="text-center"><a href="editar-pessoas.php?id=<?=$b->ID?>" class="btn bg-grey waves-effect"><i class="material-icons">mode_edit</i> </a></p></td>

                                            <?php if (!empty($b->RETORNOSELODIGITAL)) {
                                             $temselo = 'S';
                                            } 
                                            else{
                                                $temselo = 'N';
                                            }
                                            ?>

                                            <td>
                                                    <?php if (!empty($b->RETORNOSELODIGITAL)): ?>
                                                        <a style="opacity: .7" onclick="cartAssinatura('<?=$b->ID?>','<?=$b->setTipoPessoa?>','S')" class="btn waves-effect bg-indigo"><i class="material-icons">print</i>CART. ASSINATURA</a> 
                                                        <?php else: ?>
                                                            <a onclick="cartAssinatura('<?=$b->ID?>','<?=$b->setTipoPessoa?>','N')" class="btn waves-effect bg-indigo"><i class="material-icons">print</i>CART. ASSINATURA</a> 
                                                    <?php endif ?>

                                                </td>
                                           




                                            <td><?php if ($b->strFicha!='0'): ?>
                                                <?=$b->strFicha?>
                                                <?php else: ?>
                                                    <span class="badge bg-red">SEM FICHA</span>
                                            <?php endif ?></td>
                                        </tr>
                        <?php endforeach; endif ?>
                                    </tbody>
                                </table>

                            </div>
                            </tbody>
                                </table>

                            </div>


                                                        <script type="text/javascript">
                $('#salvarcartao, #botaogerarnovo').click(function(){


                                swal({
                                title: "Deseja realmente avançar?",
                                text: "Tem certeza de que deseja prosseguir?",
                                type: "warning",
                                confirmButtonClass: "bg-green",
                                confirmButtonText: "AVANCE!",
                                showCancelButton: true,
                                cancelButtonText:'NÃO, CANCELE!',
                                cancelButtonClass: 'bg-red',
                                showLoaderOnConfirm: true,
                                closeOnConfirm: false

                                },
                                function(){


                                    $('#formcartao').submit();
                                //window.location.reload();
                                }
                                );


                                });

           </script>
