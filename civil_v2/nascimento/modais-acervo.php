

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



