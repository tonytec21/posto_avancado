 <?php 

$pdo = conectar();
$tipo_livro = $_GET['tipo_livro'];

$busca_matricula = $pdo->prepare("SELECT * FROM $tipo_livro order by PaginaLivro");
$busca_matricula->execute();


if ($busca_matricula->rowCount() == 0) {
  $_SESSION['erro'] = 'NENHUM REGISTRO ENCONTRADO NO PERÍODO INFORMADO';
}
else{
  #$_SESSION['sucesso'] = 'ARQUIVO PRONTO PARA SER EXPORTADO';
}
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);
?>
 <div class="table-responsive" >
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                          <th>LIVRO</th>
                                          <th>FOLHA</th>
                                          <th>TERMO</th>
                                          <th>#####</th>
                                         

                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>LIVRO</th>
                                          <th>FOLHA</th>
                                          <th>TERMO</th>
                                          <th>#####</th>
                                         
                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php   foreach($linhas as $b):?>
                         
                                      <tr>
                                            <td><?=$b->identifcadorLivro?></td>
                                            <td><?=$b->PaginaLivro?></td>
                                            <td><?=$b->LivroInicial?></td>
                                            <?php if ($b->Status == 'U'): ?>
                                                <td id="<?=$b->LivroInicial?>"><a  onclick="liberar('<?=$b->identifcadorLivro?>','<?=$b->PaginaLivro?>', '<?=$b->LivroInicial?>','<?=$tipo_livro?>' )" class="btn bg-red"><i class="material-icons">lock_open</i>LIBERAR</a></td>
                                                 <?php else: ?>
                                                <td id="<?=$b->LivroInicial?>"><a  onclick="ocupar('<?=$b->identifcadorLivro?>','<?=$b->PaginaLivro?>', '<?=$b->LivroInicial?>','<?=$tipo_livro?>' )" class="btn bg-blue"><i class="material-icons">lock_open</i>OCUPAR</a></td>
                                            <?php endif ?>
                                           

                                        </tr>
                        
                    
                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>

                            <script type="text/javascript">
                                function liberar (livro, pagina, termo, tipo){
                                    //swal("o livro: "+livro+" fls: "+pagina+" termo: "+termo+" tipo: "+tipo+" será liberado!");

                                    swal({
                                            title: "DESEJA LIBERAR ESTA FOLHA?",
                                            text: "",
                                            type: "warning",
                                            confirmButtonClass: "bg-green",
                                            confirmButtonText: "SIM!",
                                            confirmButtonColor: '#bf42f5',
                                            showCancelButton: true,
                                            cancelButtonText:'NÃO, CANCELE!',
                                            cancelButtonClass: '.bg-red',
                                            showLoaderOnConfirm: true,
                                            closeOnConfirm: false

                                        },
                                        function(){
                                           $.post('liberar-ocupar-folha.php', {'acao':'liberar','livro':livro, 'folha': pagina, 'termo' : termo, 'tabela': tipo}, function(data) {
                                                                    var retorno = parseInt(data);
                                                                    if (retorno == 1) {swal("ALTERADO COM SUCESSO", "", "success");}
                                                                    else{swal("NÃO FOI POSSIVEL ALTERAR", "", "error");}
                                                                    $('#'+termo).html('<a class="btn bg-blue"><i class="material-icons">lock_open</i>OCUPAR</a>');
                                                                    $('#'+termo).click(function() {ocupar(livro,pagina, termo, tipo)});

                                                                }); 
                                        }
                                        );   
                                }

                                function ocupar (livro, pagina, termo, tipo){
                                    //swal("o livro: "+livro+" fls: "+pagina+" termo: "+termo+" tipo: "+tipo+" será ocupado!"); 

                                    swal({
                                            title: "DESEJA OCUPAR ESTA FOLHA?",
                                            text: "",
                                            type: "warning",
                                            confirmButtonClass: "bg-green",
                                            confirmButtonText: "SIM!",
                                            confirmButtonColor: '#bf42f5',
                                            showCancelButton: true,
                                            cancelButtonText:'NÃO, CANCELE!',
                                            cancelButtonClass: '.bg-red',
                                            showLoaderOnConfirm: true,
                                            closeOnConfirm: false

                                        },
                                        function(){
                                          $.post('liberar-ocupar-folha.php', {'acao':'ocupar','livro':livro, 'folha': pagina, 'termo' : termo, 'tabela': tipo}, function(data) {
                                                                    var retorno = parseInt(data);
                                                                    if (retorno == 1) {swal("ALTERADO COM SUCESSO", "", "success");}
                                                                    else{swal("NÃO FOI POSSIVEL ALTERAR", "", "error");}
                                                                    $('#'+termo).html('<a class="btn bg-red"><i class="material-icons">lock_open</i>LIBERAR</a>');

                                                                    $('#'+termo).click(function() {liberar(livro,pagina, termo, tipo)});
                                                                }); 
                                        }
                                        );     
                                }




                            </script>

                            <div id="resultado"></div>