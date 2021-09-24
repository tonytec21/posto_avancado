              <?php 

              $verifica_modulos = file_get_contents("../modulos-sistema.json");
              $verifica_modulos = json_decode($verifica_modulos, true);

               ?>  
            
              <nav class="navbar navbar-inverse" role="navigation" style="background: #4583ed!important;z-index:100 !important; height: 90px!important">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header col-md-2" style="margin-left: 12%;">
                    <a style="padding-bottom: 60px;margin-top: -10px; " class="navbar-brand" href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/index.php'?>" ><img src="../../assets/img/brand/logo_1.png" style="height:50px!important; z-index: 100!important;" ></a>
                  </div>

                   
                 <div class="collapse navbar-collapse col-md-7"  >
                    <ul class="nav navbar-nav" data-hover="dropdown" data-animations="fadeIn fadeInLeft fadeInUp fadeInRight">
                      <li class="dropdown">
                        <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="font-size: 14px; padding-top: 20px;color:white;background: none!important; margin-left: -30%;">MÓDULOS </a>
                        <ul class="dropdown-menu" role="menu" style="margin-top: 0%!important; margin-left: -100%!important; border-radius: 10px;padding: 20px;opacity: .9">
                        

                          <?php if ($verifica_modulos['checkboxCivil'] =='S'): ?>
                          <li style="width:400px!important; " onclick='window.open("<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/index.php'?>")'
                            onmouseenter ="$(this).css('cursor', 'pointer');$(this).css('background', 'red');" 
                            >
                                        <div class="icon icon-shape bg-gradient-info rounded-circle text-white col-md-3" >
                                        <i class="fa fa-user" aria-hidden="true"></i>
                                        </div>
                                        <h6 class="heading text-warning col-md-7">Registro Cívil</h6>
                                        <div class="col-md-12">
                                        <p style="margin-left: 13%; font-size: 12px; margin-top: -5%!important;">Registro Cívil de Pessoas Naturais</p>
                                        </div> 
                          </li>
                          <?php endif ?>
                          
                          <li style="width:400px!important; " onclick='window.open("<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/pessoas/index.php'?>")'
                            onmouseenter ="$(this).css('cursor', 'pointer');$(this).css('background', 'red');" 
                            >
                                        <div class="icon icon-shape bg-gradient-red rounded-circle text-white col-md-3" >
                                        <i style="margin-left: -19px" class="fa fa-users" aria-hidden="true"></i>
                                        </div>
                                        <h6 class="heading text-warning col-md-7">Cadastro de Pessoas</h6>
                                        <div class="col-md-12">
                                        <p style="margin-left: 13%; font-size: 12px; margin-top: -5%!important;">Cadastro, Pesquisas, Cartões de Assinatura</p>
                                        </div> 
                          </li>


                         
                        </ul>
                      </li>

                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" onmouseenter="$(this).css('background', 'none')" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="font-size: 14px; padding-top: 20px;color:white;background: none!important;">REGISTRO CIVIL </a>
                        <ul class="dropdown-menu" role="menu" style="margin-top: 0%!important; margin-left: 0%!important; border-radius: 10px;padding: 20px;">
                          
                        <li><a href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/index.php'?>" class="dropdown-item" >Pagina Inicial</a></li>
                        <li><a href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/bd_INSERTS/insert-nascimento.php'?>" class="dropdown-item" >Registro Nascimento</a></li>
                        <li><a href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/index/pesquisa-nascimento.php'?>" class="dropdown-item" >Pesquisa Nascimento</a></li>

                        </ul>
                      </li>

                    </ul>

                  </div><!-- /.navbar-collapse -->

                  <div class="col-sm-3" style="padding-top: 1.2%;padding-left: 18%" >
                    
                    <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/pessoas/index/cadastro_pessoas_new'?>" target="_blank" class="btn waves-effect bg-white" style="color:#9a59bd; font-weight: bold; padding: 15px"


                      ><i class="material-icons">person</i> CADASTRAR PESSOA</a>

                  </div>

                   <div class="col-sm-3" style="padding-top: 1.2%;padding-left: 8%" >
                    
                    <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/pessoas/index/pesquisaPessoas.php'?>" target="_blank" class="btn waves-effect bg-white" style="color:#9a59bd; font-weight: bold; padding: 15px"


                      ><i class="material-icons">search</i> PESQUISAR PESSOA</a>

                  </div>

                </div><!-- /.container-fluid -->
              </nav>
<script type="text/javascript">
    $(document).ready(function(){
    $('.formconsultaregistro').hide();       
    }); 
    </script>

    <!-- NASCIMENTO ------------------------------------------------------>
      <div class="modal fade  " id="oquedeseja" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content "  style="background: rgba(97, 137, 201, .9);border-radius: 10px;">
            <div class="alert alert-dismissible" role="alert" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="text-center"> NASCIMENTO - O QUE DESEJA FAZER?</h4><br>
            <div class="row">

            <div class="col-sm-12"><a style="border-radius: 10px; color: rgba(27, 53, 125,.8);font-size: 14px; font-weight: bold; padding: 1%;" class="btn bg-white col-sm-12" onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/bd_INSERTS/insert-nascimento.php'?>'">
            <i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">library_books</i><i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">fiber_new</i><br>
            INSERIR NOVO REGISTRO 
            </a>
            </div>  
            <div class="col-sm-12"><br><a style="border-radius: 10px; color: rgba(27, 53, 125,.8);font-size: 14px; font-weight: bold; padding: 1%;" class="btn bg-white col-sm-12" onclick="$('.formconsultaregistro').show()">
            <i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">library_books</i><i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">folder</i><br>
            CADASTRAR DADOS DO ACERVO FÍSICO 
            </a>
            </div>    

            </div>
            <br>
            <div class="row formconsultaregistro">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">    
            <input type="number" class="form-control" id="LIVROCONSULTA" placeholder="Digite o Livro"><br>
            <input type="number" class="form-control" id="FOLHACONSULTA" placeholder="Digite a Folha"><br>
            <input type="number" class="form-control" id="TERMOCONSULTA" placeholder="Digite o Termo"><br>
            <button class="btn bg-primary col-md-12" id="verificaconsulta"><i class="material-icons" >search</i>VERIFICAR</button>
            <div class="col-md-12" id="resultadoconsulta"></div>
            </div>
            <script type="text/javascript">
            $("#verificaconsulta").click(function (e) {
            var livro = $('#LIVROCONSULTA').val();
            var folha = $('#FOLHACONSULTA').val();
            var termo = $('#TERMOCONSULTA').val();
            $.post('../nascimento-tempo-real.php', {'LIVRONASCIMENTO':livro, 'FOLHANASCIMENTO':folha, 'TERMONASCIMENTO':termo}, function(data) {
            if (data == 0) {
            window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/bd_INSERTS/insert-nascimento.php?acervo=ok'?>';
            }
            else{
            $("#resultadoconsulta").html(data);
            }
            });
            });
            </script>
            </div>
            </div>
            </div>
            </div>
      </div>
    <!-- NASCIMENTO ------------------------------------------------------>



    <!-- CASAMENTO ------------------------------------------------------>
      <div class="modal fade  " id="oquedesejacas" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content "  style="background: rgba(97, 137, 201, .9);border-radius: 10px;">
            <div class="alert alert-dismissible" role="alert" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="text-center"> CASAMENTO - O QUE DESEJA FAZER?</h4><br>
            <div class="row">

            <div class="col-sm-12"><a style="border-radius: 10px; color: rgba(27, 53, 125,.8);font-size: 14px; font-weight: bold; padding: 1%;" class="btn bg-white col-sm-12" onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/bd_INSERTS/insert-casamento.php'?>'">
            <i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">library_books</i><i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">fiber_new</i><br>
            INSERIR NOVO REGISTRO 
            </a>
            </div>  
            <div class="col-sm-12"><br><a style="border-radius: 10px; color: rgba(27, 53, 125,.8);font-size: 14px; font-weight: bold; padding: 1%;" class="btn bg-white col-sm-12" onclick="$('.formconsultaregistro').show()">
            <i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">library_books</i><i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">folder</i><br>
            CADASTRAR DADOS DO ACERVO FÍSICO 
            </a>
            </div>    

            </div>
            <br>
            <div class="row formconsultaregistro">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">    
            <input type="number" class="form-control" id="LIVROCONSULTAcas" placeholder="Digite o Livro"><br>
            <input type="number" class="form-control" id="FOLHACONSULTAcas" placeholder="Digite a Folha"><br>
            <input type="number" class="form-control" id="TERMOCONSULTAcas" placeholder="Digite o Termo"><br>
            <select class="form-control" id="TIPOLIVROcas" >
            <option value="">SELECIONE O LIVRO</option>
            <option value="2">LIVRO B</option><option value="3">LIVRO B AUXILIAR</option>

            </select>
            <br><br>
            <button class="btn bg-primary col-md-12" id="verificaconsultacas"><i class="material-icons" >search</i>VERIFICAR</button>
            <div class="col-md-12" id="resultadoconsultacas"></div>
            </div>
            <script type="text/javascript">
            $("#verificaconsultacas").click(function (e) {
            var livro = $('#LIVROCONSULTAcas').val();
            var folha = $('#FOLHACONSULTAcas').val();
            var termo = $('#TERMOCONSULTAcas').val();
            var tipolivro = $('#TIPOLIVROcas').val();
            $.post('../casamento-tempo-real.php', {'LIVROCASAMENTO':livro, 'FOLHACASAMENTO':folha, 'TERMOCASAMENTO':termo, 'TIPOLIVRO':tipolivro}, function(datacas) {
            if (datacas == 0) {
            window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/bd_INSERTS/insert-casamento.php?acervo=ok'?>';
            }
            else{
            $("#resultadoconsultacas").html(datacas);
            }
            });
            });
            </script>
            </div>
            </div>
            </div>
            </div>
      </div>
    <!-- CASAMENTO ------------------------------------------------------>



    <!-- OBITO ------------------------------------------------------>
      <div class="modal fade  " id="oquedesejaobt" tabindex="-1" role="dialog">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content "  style="background: rgba(97, 137, 201, .9);border-radius: 10px;">
            <div class="alert alert-dismissible" role="alert" >
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            <h4 class="text-center"> ÓBITO - O QUE DESEJA FAZER?</h4><br>
            <div class="row">

            <div class="col-sm-12"><a style="border-radius: 10px; color: rgba(27, 53, 125,.8);font-size: 14px; font-weight: bold; padding: 1%;" class="btn bg-white col-sm-12" onclick="window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/bd_INSERTS/insert-obito.php'?>'">
            <i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">library_books</i><i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">fiber_new</i><br>
            INSERIR NOVO REGISTRO 
            </a>
            </div>  
            <div class="col-sm-12"><br><a style="border-radius: 10px; color: rgba(27, 53, 125,.8);font-size: 14px; font-weight: bold; padding: 1%;" class="btn bg-white col-sm-12" onclick="$('.formconsultaregistro').show()">
            <i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">library_books</i><i class="material-icons text-center" style="font-size: 50px!important; color:rgba(27, 53, 125,.8)!important; margin-left: 0%;">folder</i><br>
            CADASTRAR DADOS DO ACERVO FÍSICO 
            </a>
            </div>    

            </div>
            <br>
            <div class="row formconsultaregistro">
            <div class="col-sm-1"></div>
            <div class="col-sm-10">    
            <input type="number" class="form-control" id="LIVROCONSULTAobt" placeholder="Digite o Livro"><br>
            <input type="number" class="form-control" id="FOLHACONSULTAobt" placeholder="Digite a Folha"><br>
            <input type="number" class="form-control" id="TERMOCONSULTAobt" placeholder="Digite o Termo"><br>
            <select class="form-control" id="TIPOLIVROobt" >
            <option value="">SELECIONE O LIVRO</option>
            <option value="4">LIVRO C</option><option value="5">LIVRO C AUXILIAR</option>

            </select>
            <br><br>
            <button class="btn bg-primary col-md-12" id="verificaconsultaobt"><i class="material-icons" >search</i>VERIFICAR</button>
            <div class="col-md-12" id="resultadoconsultaobt"></div>
            </div>
            <script type="text/javascript">
            $("#verificaconsultaobt").click(function (e) {
            var livro = $('#LIVROCONSULTAobt').val();
            var folha = $('#FOLHACONSULTAobt').val();
            var termo = $('#TERMOCONSULTAobt').val();
            var tipolivro = $('#TIPOLIVROobt').val();
            $.post('../obito-tempo-real.php', {'LIVROOBITO':livro, 'FOLHAOBITO':folha, 'TERMOOBITO':termo, 'TIPOLIVRO':tipolivro}, function(dataobt) {
            if (dataobt == 0) {   
            window.location.href='<?='http://'.$_SERVER['HTTP_HOST'].'/posto_avancado/civil/bd_INSERTS/insert-obito.php?acervo=ok'?>';
            }
            else{
            $("#resultadoconsultaobt").html(dataobt);   
            }
            });
            });
            </script>
            </div>
            </div>
            </div>
            </div>
      </div>
    <!-- OBITO ------------------------------------------------------>

    