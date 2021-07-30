
<div class="modal fade" id="cidades" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="opacity: .9; border-radius: 30px;">
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
      $('#cid').html ("<h4 class='text-center'>Carregando... <br> <img src='../../images/loading_modal.gif'> </h4>"); 
       return;
    }

  };
  xhttp.open("POST", "../consultas/busca-cidades-civil.php", true);
  xhttp.send();
}
</script>

                </div>
                       
            </div>  
        </div>
    </div>


<!--||||||||||||||||||||||||||||||||||||||||| PESSOAS BUSCA AUTOMÁTICA: |||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||||-->

<div class="modal fade" id="pessoas" tabindex="-1" role="dialog">
                <div class="modal-dialog modal-lg" role="document">
                    <div class="modal-content" style="opacity: .9; border-radius: 30px;">
                  <button type="button" class="btn btn-link bg-red waves-effect" data-dismiss="modal">X</button>
                        <div class="modal-header">
                            <h4 class="modal-title" id="defaultModalLabel">PESSOAS:</h4>
                        </div>
                        <div id="PESSOASOB" class="modal-body">
       <script>


function showCustomer() {
  var xhttp;    
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      $('#PESSOASOB').html (this.responseText);
    return;
    }
    else{
      $('#PESSOASOB').html ("<h4 class='text-center'>Carregando... <br> <img src='../../images/loading_modal.gif'> </h4>"); 
       return;
    }

  };
  xhttp.open("POST", "../consultas/busca-pessoas-civil.php", true);
  xhttp.send();
}
</script>
                </div>
                       
            </div>  
        </div>
    </div>


