
<div class="modal fade" id="cidadesNaturalidade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">CIDADES:</h4>
                        </div>
                        <div id="cid" class="modal-body">
                     <script>


function showCustomer2() {
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      $('#cid').html (this.responseText);
    return;
    }
    else{
      $('#cid').html ("<h4 class='text-center'>Carregando... <br> <img src='../../../images/loading_modal.gif'> </h4>"); 
       return;
    }

  };
  xhttp.open("POST", "../consultas/busca-cidades-pessoas-new.php?natural=ok", true);
  xhttp.send();
}
</script>
                </div>
                       
            </div>  
        </div>
    </div>


<div class="modal fade" id="cidade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">CIDADES:</h4>
                        </div>
                        <div id="cid2" class="modal-body">
                     <script>


function showCustomer3() {
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      $('#cid2').html (this.responseText);
    return;
    }
    else{
      $('#cid2').html ("<h4 class='text-center'>Carregando... <br> <img src='../../../images/loading_modal.gif'> </h4>"); 
       return;
    }

  };
  xhttp.open("POST", "../consultas/busca-cidades-pessoas-new.php?cidade=ok", true);
  xhttp.send();
}
</script>
                </div>
                       
            </div>  
        </div>
    </div>





<!--div class="modal fade" id="cidadesNaturalidade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">CIDADES:</h4>
                        </div>
                        <div class="modal-body">
          <div class="body">
                      <p class="text-center">
                                <img id="img" src="" style=" width: 10%">
                                 </p>
                            <div class="table-responsive">
                             <table id="myInput" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>CIDADE</th>
                                            <th>UF</th>


                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>CIDADE teste</th>
                                            <th>UF</th>


                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $busca_notas =  PESQUISA_ALL('uf_cidade');
                        foreach($busca_notas as $b):
                         ?>



                                      <tr style="cursor: pointer;" data-dismiss="modal"onclick="preencheNoivo('<?=$b->id?>','<?=$b->uf?>','<?=addslashes($b->cidade)?>')">


                                            <td><?=addslashes(tirarAcentos($b->cidade))?></td>
                                            <td><?=$b->uf?></td>


                                        </tr>

                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                </div>

            </div>
        </div>
    </div>



<script type="text/javascript">
/*
(function() {
  var _div = document.createElement('div');
  jQuery.fn.dataTable.ext.type.search.html = function(data) {
    _div.innerHTML = data;
    return _div.textContent ?
      _div.textContent
        .replace(/[áÁàÀâÂäÄãÃåÅæÆ]/g, 'a')
        .replace(/[çÇ]/g, 'c')
        .replace(/[éÉèÈêÊëË]/g, 'e')
        .replace(/[íÍìÌîÎïÏîĩĨĬĭ]/g, 'i')
        .replace(/[ñÑ]/g, 'n')
        .replace(/[óÓòÒôÔöÖœŒ]/g, 'o')
        .replace(/[ß]/g, 's')
        .replace(/[úÚùÙûÛüÜ]/g, 'u')
        .replace(/[ýÝŷŶŸÿ]/g, 'n') :
      _div.innerText.replace(/[üÜ]/g, 'u')
        .replace(/[áÁàÀâÂäÄãÃåÅæÆ]/g, 'a')
        .replace(/[çÇ]/g, 'c')
        .replace(/[éÉèÈêÊëË]/g, 'e')
        .replace(/[íÍìÌîÎïÏîĩĨĬĭ]/g, 'i')
        .replace(/[ñÑ]/g, 'n')
        .replace(/[óÓòÒôÔöÖœŒ]/g, 'o')
        .replace(/[ß]/g, 's')
        .replace(/[úÚùÙûÛüÜ]/g, 'u')
        .replace(/[ýÝŷŶŸÿ]/g, 'n');
  };
})();

$(document).ready(function() {

 // Remove accented character from search input as well
    $('#myInput_filter input[type=search]').keyup( function () {
        var table = $('#myInput').DataTable();
        table.search(
            jQuery.fn.DataTable.ext.type.search.html(this.value)
        ).draw();
    } );
});
*/
</script>
<script src="https://cdn.datatables.net/plug-ins/1.10.19/filtering/type-based/accent-neutralise.js"></script>

    <div class="modal fade" id="cidade" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">CIDADES:</h4>
                        </div>
                        <div class="modal-body">
          <div class="body">
                      <p class="text-center">
                                <img id="img" src="" style=" width: 10%">
                                 </p>
                            <div class="table-responsive">
                             <table id="example" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>CIDADE</th>
                                            <th>UF</th>


                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>CIDADE</th>
                                            <th>UF</th>


                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $busca_notas =  PESQUISA_ALL('uf_cidade');
                        foreach($busca_notas as $b):
                         ?>



                                      <tr style="cursor: pointer;" data-dismiss="modal"onclick="preencheNoivo2('<?=$b->id?>','<?=$b->uf?>','<?=addslashes($b->cidade)?>')">


                                            <td><?=addslashes(tirarAcentos($b->cidade))?></td>
                                            <td><?=$b->uf?></td>


                                        </tr>

                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                </div>

            </div>
        </div>
    </div>

      <div class="modal fade" id="cidade2" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content">
                  <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">CIDADES:</h4>
                        </div>
                        <div class="modal-body">
          <div class="body">
                      <p class="text-center">
                                <img id="img" src="" style=" width: 10%">
                                 </p>
                            <div class="table-responsive">
                             <table id="example" class="table table-bordered table-striped table-hover js-basic-example dataTable">
                                    <thead>
                                        <tr>
                                            <th>CIDADE</th>
                                            <th>UF</th>


                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                          <th>CIDADE</th>
                                            <th>UF</th>


                                        </tr>
                                    </tfoot>
                                    <tbody>
                         <?php
                        $busca_notas =  PESQUISA_ALL('uf_cidade');
                        foreach($busca_notas as $b):
                         ?>



                                      <tr style="cursor: pointer;" data-dismiss="modal"onclick="preencheNoivo3('<?=$b->id?>','<?=$b->uf?>','<?=addslashes($b->cidade)?>')">


                                            <td><?=addslashes(tirarAcentos($b->cidade))?></td>
                                            <td><?=$b->uf?></td>


                                        </tr>

                        <?php endforeach ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>

                </div>

            </div>
        </div>
    </div>

    <script type="text/javascript">
    jQuery.extend( jQuery.fn.dataTableExt.oSort, {
      "portugues-pre": function ( data ) {
          var a = 'a';
          var e = 'e';
          var i = 'i';
          var o = 'o';
          var u = 'u';
          var c = 'c';
          var special_letters = {
              "Á": a, "á": a, "Ã": a, "ã": a, "À": a, "à": a,
              "É": e, "é": e, "Ê": e, "ê": e,
              "Í": i, "í": i, "Î": i, "î": i,
              "Ó": o, "ó": o, "Õ": o, "õ": o, "Ô": o, "ô": o,
              "Ú": u, "ú": u, "Ü": u, "ü": u,
              "ç": c, "Ç": c
          };
          for (var val in special_letters)
             data = data.split(val).join(special_letters[val]).toLowerCase();
          return data;
      },
      "portugues-asc": function ( a, b ) {
          return ((a < b) ? -1 : ((a > b) ? 1 : 0));
      },
      "portugues-desc": function ( a, b ) {
          return ((a < b) ? 1 : ((a > b) ? -1 : 0));
      }
    } );

   // $('.datatable').DataTable({
     // "columnDefs": [{ type: 'portugues', targets: "_all" }]
   // });
    </script-->
