  <!--   Core JS Files   -->
  <script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
  <script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
  <!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
  <script src="../assets/js/plugins/bootstrap-switch.js"></script>
  <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
  <script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/moment.min.js"></script>
  <script src="../assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
  <script src="../assets/js/plugins/bootstrap-datepicker.min.js"></script>
  <!-- Control Center for Argon UI Kit: parallax effects, scripts for the example pages etc -->
  <!--  Google Maps Plugin    -->
  <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script> -->
  <script src="../assets/js/argon-design-system.min.js?v=1.2.0" type="text/javascript"></script>

<script src="../assets/plugins/jquery/jquery.min.js"></script>

<script src="../assets/plugins/jquery-validation/jquery.validate.js"></script>
   <script type="text/javascript">
   $(document).ready(function(){

   $(".form-validate").validate();

   $(".form-horizontal").validate();

$(".validacao").validate();
   });
   </script>
<script type="text/javascript">
   $(document).ready(function(){

   $(".form-validate").validate();

   $(".form-horizontal").validate();

   });
   </script>

<script src="../assets/plugins/sweetalert2/dist/sweetalert2_.min.js"></script>
<script src="../assets/plugins/jquery.inputmask.bundle.js"></script>

<script type="text/javascript">

$(document).ready(function(){
   $(".cpf-form").inputmask("999.999.999-99");
   $(".rg").inputmask("999999999999-9/AAA-AA");

});
</script>


<script>
$(document).ready(function(){
$('[data-toggle="popover"]').popover();
});
</script>


<script type="text/javascript">

			function fMasc(objeto,mascara) {
				obj=objeto
				masc=mascara
				setTimeout("fMascEx()",1)
			}
			function fMascEx() {
				obj.value=masc(obj.value)
			}
			function mTel(tel) {
				tel=tel.replace(/\D/g,"")
				tel=tel.replace(/^(\d)/,"($1")
				tel=tel.replace(/(.{3})(\d)/,"$1)$2")
				if(tel.length == 9) {
					tel=tel.replace(/(.{1})$/,"-$1")
				} else if (tel.length == 10) {
					tel=tel.replace(/(.{2})$/,"-$1")
				} else if (tel.length == 11) {
					tel=tel.replace(/(.{3})$/,"-$1")
				} else if (tel.length == 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				} else if (tel.length > 12) {
					tel=tel.replace(/(.{4})$/,"-$1")
				}
				return tel;
			}
			function mCNPJ(cnpj){
				cnpj=cnpj.replace(/\D/g,"")
				cnpj=cnpj.replace(/^(\d{2})(\d)/,"$1.$2")
				cnpj=cnpj.replace(/^(\d{2})\.(\d{3})(\d)/,"$1.$2.$3")
				cnpj=cnpj.replace(/\.(\d{3})(\d)/,".$1/$2")
				cnpj=cnpj.replace(/(\d{4})(\d)/,"$1-$2")
				return cnpj
			}
			function mCPF(cpf){
				cpf=cpf.replace(/\D/g,"")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d)/,"$1.$2")
				cpf=cpf.replace(/(\d{3})(\d{1,2})$/,"$1-$2")
				return cpf
			}
			function mCEP(cep){
				cep=cep.replace(/\D/g,"")
				cep=cep.replace(/^(\d{2})(\d)/,"$1.$2")
				cep=cep.replace(/\.(\d{3})(\d)/,".$1-$2")
				return cep
			}
			function mNum(num){
				num=num.replace(/\D/g,"")
				return num
			}

         function padDigits(number, digits) {
    return Array(Math.max(digits - String(number).length + 1, 0)).join(0) + number;
}
		</script>

<script src='../assets/plugins/bootstrap-notify.min.js'></script>


<script>
function nomeRepresentante(cpf) {
var numCPF = $(cpf);
var cpf = numCPF.val();

      tipo_registro = 'cpf';
   
     $.ajax({
        url: '../consultas/busca-cpf-novo.php',
        type: 'POST',
        data: 'acao=pesquisar&cpf=' + cpf+'&tipo_registro='+tipo_registro,
        dataType: 'json',
        beforeSend: function () {
        },


        success: function (data) {
       
          if (data.status) {
          swal.fire("Ok!", "<center>"+data.nome+" <br> Ficha: "+data.ficha+"</center>", "success");
        }

        if (data.erro) {
        //  swal.fire("Alerta!", "Não foi encontrado nenhum cadastro !!!", "warning");

          Swal.fire({
          icon: 'warning',
          title: 'Oops...',
          html:
    '<h5><center><b></b>Não foi encontrado nenhum cadastro! </b></h3><br>' +
    '<a href="//#!" class="btn btn-info"><i class="fa fa-address-card-o" aria-hidden="true"></i> Cadastre antes de continuar</a> ' +
    '</center>',
     //     footer: '<a href=#!>Por que estou vendo isso?</a>'
          })
        }

         },
         error: function (data) {
            alert('Erro ao solicitar dados');
        //    $('#result').html(data.status +':' + data.message);
         }
     });
  return false;




}

</script>


<script src='../assets/plugins/tinymce/editors.js'></script>
<script src='../assets/plugins/tinymce/tinymce.js'></script>
<script src='../assets/plugins/tinymce/tinymce_editor.js'></script>

<div style="display:none">
  <input name="image" type="file" id="upload" class="hidden" onchange="">
</div>

<script src="../assets/plugins/jquery-datatable/jquery.dataTables.js"></script>
<script src="../assets/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
<script src="../assets/plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
<script type="text/javascript">
      $('.table').DataTable();
</script>

<link rel="stylesheet" href="../assets/plugins/dark-light-mode-switch/dist/style.css">

<!-- partial -->
 </script><script  src="../assets/plugins/dark-light-mode-switch/dist/script.js"></script>
 
 
<script type="text/javascript">
  function dinheiro(i) {
var v = i.value.replace(/\D/g,'');
v = (v/100).toFixed(2) + '';
v = v.replace(".", ".");
v = v.replace(/(\d)(\d{3})(\d{3}),/g, "$1.$2.$3,");
v = v.replace(/(\d)(\d{3}),/g, "$1.$2,");
i.value = v;
}
</script>

<footer class="my-5 pt-5 text-muted text-center text-small">
          <p class="mb-1">&copy; 2020 BookC</p>
          <ul class="list-inline">
            <li class="list-inline-item"><a href="#">#</a></li>
            <li class="list-inline-item"><a href="#">#</a></li>
            <li class="list-inline-item"><a href="#">#</a></li>
          </ul>
        </footer>
</html>





<style>
.footer_bar {
   position: fixed;
   left: 0;
   bottom: 0;
   width: 100%;
   height: 12%;
   /* background-color: red; */
   color: white;
   text-align: center;
   float:left;

   text-align: center;
    float: left;
    /* top: 5%; */

    /* flex para alinhar conteúdo*/
    display: flex;
    justify-content: center;
    align-items: center;
    z-index: 1000;

}
</style>
