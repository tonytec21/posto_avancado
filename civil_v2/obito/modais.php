<!--///////////////////////////////////////////////////////////////////////////////////////-->
<div id="modaldadosregistro" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DADOS DO REGISTRO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
        <div class="col-lg-6">
          <label for="country">TIPO DE ACERVO:</label>
          <select class="form-control" id="TIPOACERVO" name="TIPOACERVO">
            <option value="1">PRÓPRIO</option>
            <option value="2">INCORPORADO</option>
          </select>
        </div>
        <div class="col-lg-6">
          <label for="country">LIVRO:</label>
          <input id="LIVROOBITO" name="LIVROOBITO" type="number"  class="form-control valid" aria-invalid="false" required="true">
        </div>
        <div class="col-lg-6">
          <label for="country">FOLHA:</label>
          <input id="FOLHAOBITO" name="FOLHAOBITO" type="number"  class="form-control valid" aria-invalid="false" required="true">
        </div>
        <div class="col-lg-6">
          <label for="country">TERMO:</label>
          <input id="TERMOOBITO" name="TERMOOBITO" type="number"  class="form-control valid" aria-invalid="false" required="true">
        </div>
        <div class="col-lg-12">
          <label for="country">MATRICULA:</label>
          <input id="MATRICULA" name="MATRICULA" type="text"  class="form-control valid" aria-invalid="false" readonly="" required="true">
          <button class="btn btn-info btn-lg btn-block" onclick="gerarmatricula($('#LIVROOBITO').val(), $('#FOLHAOBITO').val(), $('#TERMOOBITO').val(), 'OB', $('#TIPOLIVRO').val(), $('#TIPOACERVO').val())"> GERAR MATRICULA</button>
        </div>
        <input type="hidden" id="DATAENTRADA">
        </div>
        <br><br>
        <button id="finalizarregistro" class="btn btn-warning btn-lg btn-block" onclick="finalizarregistro('<?=$id?>')"> <i class="fa fa-check-square-o" aria-hidden="true"></i>
       FINALIZAR REGISTRO </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////-->

<div id="modalseloregistro" class="modal fade" id="exampleModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">SOLICITAÇÃO DE SELO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-6">
          <label for="country">TIPO PAPEL SEGURANÇA:</label>
          <select id="TIPOPAPELSEGURANCA" name="TIPOPAPELSEGURANCA"  class="form-control valid" aria-invalid="false">
            <option value="0"> 0 – Sem papel</option>
            <option value="1"> 1 – Azul (Certidão Portável)</option>
            <option value="2"> 2 – Rosa (Certidão Portável)</option>
            <option value="3"> 3 – Papel de Segurança – TJMA</option>
            <option value="4"> 4 - Papel de Segurança – Arpen</option>
            <option value="5"> 5 - Papel de Segurança - Casa da Moeda</option>
            <option value="6"> 6 - Papel de Segurança - Extradigital Softwares e Equipamentos Ltda</option>
            <option value="7"> 7 - Papel de Segurança - Gráfica e Editora Líder  Ltda</option>
            <option value="8"> 8 - Papel de Segurança - Indústria Gráfica Brasileira Ltda</option>
            <option value="9"> 9 - Papel de Segurança - Js Grafica Editora Encadernadora Ltda</option>
            <option value="10"> 10 - Papel de Segurança – Setagraf</option>
            <option value="11"> 11 - Papel de Segurança - Tress Impressos De Segurança Ltda</option>
            <option value="12"> 12 - Papel de Segurança - Nattus Mercantil</option>
          </select>
        </div>
        <div class="col-lg-6">
          <label for="country">NUMERO PAPEL SEGURANÇA:</label>
          <input id="NUMEROPAPELSEGURANCA" name="NUMEROPAPELSEGURANCA" type="text"  class="form-control valid" aria-invalid="false" onblur="verificapapelseguranca($(this).val(), $('#TIPOPAPELSEGURANCA').val(), $(this).attr('id'))">
        </div>

        </div>
        <hr>
        <div class="row">
          <div class="col-lg-6"><label for="country">ATO</label><input class="form-control" type="text" name="ATOOBITO" id="ATOOBITO" placeholder="ATO ex: 14.11" list="atosliberados"></div>

          <datalist id="atosliberados">
                  
                <option value=""> Selecione </option>
                <option value="14.c"> 14.c - Assento de óbito, bem como pela primeira certidão
                respectiva. Isento...
                </option>
                <option value="14.d">14.d - Assento de natimorto, bem como pela primeira certidão
                respectiva. Isento...
                </option>

          </datalist>
          <div class="col-lg-6"><label for="country">QUANTIDADE</label><input class="form-control" type="number" name="QUANTIDADE" id="QUANTIDADE" readonly="" value="1"></div>
          <input type="hidden" id="SELO" name="SELO">
          
          <div class="col-lg-12">
            <br>
          <div class="col-lg-12  custom-control custom-checkbox">
           <input class="custom-control-input" id="CHECKSELOISENTO" value="1" type="checkbox">
           <label class="custom-control-label" for="CHECKSELOISENTO">
            <span>SELO ISENTO</span>
          </label>
          <textarea class="form-control" id="MOTIVOSELOISENTO" name="MOTIVOSELOISENTO" rows="5" placeholder="INFORME O MOTIVO DA INSENÇÃO"></textarea>
          </div>

          </div>

          <div class="col-lg-12"><label for="country"></label><button id="botaoseloregistro" class="btn btn-info btn-lg btn-block"
            onclick="solicitarselo('<?=$id?>',$('#LIVROOBITO').val(),$('#FOLHAOBITO').val(),$('#TERMOOBITO').val(),$('#NOME').val(),$('#MOTIVOSELOISENTO').val(),$('#ATOOBITO').val(),$('#QUANTIDADE').val(),$('#TIPOPAPELSEGURANCA').val(), $('#NUMEROPAPELSEGURANCA').val(), 'REGISTRO_OBITO')" 
            >SOLICITAR SELO</button></div>
          <div class="col-lg-12" id="resultselo1"></div>
          </div>

          <hr>
          <div class="row">
          
          <div class="col-lg-12">
            <a href="info-registro-obito.php?id=<?=$id?>" id="visualizarregistro" class="btn btn-block btn-success">IR PARA REGISTRO</a>
          </div>

          <div class="card col-lg-12" id="contselos" style="padding-top:40px">
            <?=montarselo($id, "REGISTRO_OBITO")?>
          </div>  

          <?php if (isset($_SESSION['logadoAdm']) && $_SESSION['logadoAdm'] == 'S'): ?>                
          <div class="col-lg-4"><label for="country"></label><button onclick="solicitarselo('<?=$id?>',$('#LIVROOBITO').val(),$('#FOLHAOBITO').val(),$('#TERMOOBITO').val(),$('#NOME').val(),$('#MOTIVOSELOISENTO').val(),$('#ATOOBITO').val(),$('#QUANTIDADE').val(),$('#TIPOPAPELSEGURANCA').val(), $('#NUMEROPAPELSEGURANCA').val(), 'REGISTRO_OBITO')" class="btn btn-danger btn-lg btn-block"><i class="fa fa-reply"></i> SELAR NOVAMENTE</button>  <br><br></div>
          <?php endif ?>

        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!--///////////////////////////////////////////////////////////////////////////////////////-->

<!--///////////////////////////////////////////////////////////////////////////////////////-->

<div id="modalbuscapessoas" class="modal fade"  tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">BUSCAR CADASTRO DE PESSOA</h5>
        <input id="tipopartebuscar" type="hidden"></input>
        <input type="hidden" id="idreg2">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <label for="country">DIGITE O NOME DA PESSOA: </label>
            <input type="text" id="nomepessoabusca" class="form-control">
          </div>
          <div class="col-lg-12">
          <br> 
          <button id="buttonbuscarpessoa" class="btn btn-info btn-block"><i class="fa fa-search"></i></button>
          </div>
          <div class="col-lg-12" id="resultbuscapessoa">

          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<!--///////////////////////////////////////////////////////////////////////////////////////-->



<!--///////////////////////////////////////////////////////////////////////////////////////-->
<div id="modalbuscacidades" class="modal fade"  tabindex="-1" role="dialog"   aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <input type="hidden" id="idcampo">
         <input type="hidden" id="idreg">
        <h5 class="modal-title" id="exampleModalLabel">BUSCAR CIDADES</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">

          <div class="col-lg-12">
            <label for="country">A CIDADE QUE EU ESTOU BUSCANDO: </label>
            <select class="form-control" id="tipobuscacidade">
              <option value="br">ESTÁ NO BRASIL</option>
              <option value="ex">ESTÁ NO EXTERIOR</option>
            </select>
          </div>



          <div class="col-lg-12">
            <label for="country">INFORME O NOME DA CIDADE: </label>
            <input type="text" id="nomecidadebusca" class="form-control">
          </div>

          <div class="col-lg-12" id="resultbuscacidade">
            
          </div>


          <div class="row col-lg-12" id="divext">
            
            <div class="col-lg-7">
            <label for="country">CODIGO: </label>
            <input type="text" id="campocod" class="form-control" readonly="">
          </div>  

          <div class="col-lg-12">
            <label for="country">INFORME O NOME DA CIDADE/ESTADO/PAIS: </label>
            <input type="text" id="desccid" class="form-control" placeholder="CIDADE/ESTADO/PAÍS SEPARADOS POR BARRA '/' ">
          <br><br>
          </div>

          <button class="btn btn-info" onclick=" 
          var campo = $('#idcampo').val();
          var cod = $('#campocod').val();
          var desc = $('#desccid').val();
          $('#'+campo).val(cod+'/'+desc);
          campos_input(campo, $('#idreg').val());
          " data-dismiss="modal"> PREENCHER CAMPO</button>

          </div>

        </div>
        <br><br>
      <div class="modal-footer">
        <button class="btn-danger btn" 
        onclick="
        var campo = $('#idcampo').val();
        $('#'+campo).val('').prop('required', false);
        campos_input($('#idcampo').val(), $('#idreg').val());

        ">X LIMPAR ESTE CAMPO</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>
<!--///////////////////////////////////////////////////////////////////////////////////////-->



