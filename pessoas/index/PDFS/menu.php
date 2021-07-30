              <nav class="navbar navbar-inverse" role="navigation" style="background:#8c001a!important;z-index:100 !important; height: 90px!important">
                <div class="container-fluid">
                  <!-- Brand and toggle get grouped for better mobile display -->
                  <div class="navbar-header col-md-2" style="margin-left: 12%;">
                    <a style="padding-bottom: 60px;margin-top: -10px; " class="navbar-brand" href="<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/index.php'?>" ><img src="../../assets/img/brand/logo_1.png" style="height:50px!important; z-index: 100!important;" ></a>
                  </div>

                  
                <div class="collapse navbar-collapse col-md-7"  >
                    <ul class="nav navbar-nav" data-hover="dropdown" data-animations="fadeIn fadeInLeft fadeInUp fadeInRight">
                      <li class="dropdown">
                        <a  href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="font-size: 14px; padding-top: 20px;color:white;background: none!important; margin-left: -30%;">MÓDULOS </a>
                        <ul class="dropdown-menu" role="menu" style="margin-top: 0%!important; margin-left: -100%!important; border-radius: 10px;padding: 20px;">
                        

                          <li style="width:400px!important; " onclick='window.open("<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/notas/index/cartorio-notas.php'?>")'
                            onmouseenter ="$(this).css('cursor', 'pointer');$(this).css('background', 'red');" 
                            >
                                        <div class="icon icon-shape bg-gradient-warning rounded-circle text-white col-md-3" >
                                        <i class="fa fa-sticky-note" aria-hidden="true"></i>
                                        </div>
                                        <h6 class="heading text-warning col-md-7">Notas</h6>
                                        <div class="col-md-12">
                                        <p style="margin-left: 13%; font-size: 12px; margin-top: -5%!important;">Autenticação, reconhecimento, escrituras e procurações</p>
                                        </div> 
                          </li>

                          <li style="width:400px!important; " onclick='window.open("<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/civil/index.php'?>")'
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

                          <li style="width:400px!important; " onclick='window.open("<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/tdpj/index.php'?>")'
                            onmouseenter ="$(this).css('cursor', 'pointer');$(this).css('background', 'red');" 
                            >
                                        <div class="icon icon-shape bg-gradient-default rounded-circle text-white col-md-3" >
                                        <i class="fa fa-file-text" aria-hidden="true"></i>
                                        </div>
                                        <h6 class="heading text-warning col-md-7">RCPJ / RTD</h6>
                                        <div class="col-md-12">
                                        <p style="margin-left: 13%; font-size: 12px; margin-top: -5%!important;">Pessoas Júdicas / Títulos e Documentos</p>
                                        </div> 
                          </li>

                          <li style="width:400px!important; " onclick='window.open("<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/protesto/index.php'?>")'
                            onmouseenter ="$(this).css('cursor', 'pointer');$(this).css('background', 'red');" 
                            >
                                        <div class="icon icon-shape bg-gradient-success rounded-circle text-white col-md-3" >
                                        <i style="margin-left: -19px" class="fa fa-money" aria-hidden="true"></i>
                                        </div>
                                        <h6 class="heading text-warning col-md-7">Protesto</h6>
                                        <div class="col-md-12">
                                        <p style="margin-left: 13%; font-size: 12px; margin-top: -5%!important;">Protesto de títulos</p>
                                        </div> 
                          </li>

                          <li style="width:400px!important; " onclick='window.open("<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/imoveis/index.php'?>")'
                            onmouseenter ="$(this).css('cursor', 'pointer');$(this).css('background', 'red');" 
                            >
                                        <div class="icon icon-shape bg-gradient-primary rounded-circle text-white col-md-3" >
                                        <i style="margin-left: -19px" class="fa fa-home" aria-hidden="true"></i>
                                        </div>
                                        <h6 class="heading text-warning col-md-7">Registro de Imóveis</h6>
                                        <div class="col-md-12">
                                        <p style="margin-left: 13%; font-size: 12px; margin-top: -5%!important;">Protocolos, Matriculas, Registros auxiliares</p>
                                        </div> 
                          </li>

                          <li style="width:400px!important; " onclick='window.open("<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index.php'?>")'
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
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" onmouseenter="$(this).css('background', 'none')" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" style="font-size: 12px; padding-top: 20px;color:white;background: none!important;">CADASTRO PESSOAS </a>
                        <ul class="dropdown-menu" role="menu" style="margin-top: 0%!important; margin-left: 0%!important; border-radius: 10px;padding: 20px;">
                          <li><a href="<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index.php'?>" class="dropdown-item">Pagina Inicial</a></li>


                        </ul>
                      </li>

                    </ul>

                  </div><!-- /.navbar-collapse -->

                  <div class="col-sm-3" style="padding-top: 1.2%;padding-left: 18%" >
                    
                    <a  href="<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/cadastro_pessoas_new'?>" target="_blank" class="btn waves-effect bg-white" style="color:#9a59bd; font-weight: bold; padding: 15px"


                      ><i class="material-icons">person</i> CADASTRAR PESSOA</a>

                  </div>

                   <div class="col-sm-3" style="padding-top: 1.2%;padding-left: 8%" >
                    
                    <a href="<?='http://'.$_SERVER['HTTP_HOST'].'/sistema/pessoas/index/pesquisaPessoas'?>" target="_blank" class="btn waves-effect bg-white" style="color:#9a59bd; font-weight: bold; padding: 15px"


                      ><i class="material-icons">search</i> PESQUISAR PESSOA</a>

                  </div>

                </div><!-- /.container-fluid -->
              </nav>
