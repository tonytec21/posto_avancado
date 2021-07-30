<?php include('../controller/db_functions.php');
session_start();
$pdo = conectar();
$id = $_GET['id'];
if (empty($_SESSION['id']) && empty($_SESSION['nome'])) {
 $_SESSION['msg'] = "<div class='alert alert-info' role='alert' id='response'>
        <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
        &times;</span></button>
        Área restrita
        </div>";
        header("location: ../../login.php");
}
if (isset($_POST['subimit2'])) {
if (isset($_POST['hiddencaminhofoto']) && !empty($_POST['hiddencaminhofoto']) && $_POST['hiddencaminhofoto'] != 'NULL') {
$img_cam = $_POST['hiddencaminhofoto'];
UPDATE_CAMPO_ID('pessoa','hiddencaminhofoto',$img_cam,$id);
}
}

$busca_imgs = $pdo->prepare("SELECT hiddencaminhofoto from pessoa where ID = $id");
$busca_imgs->execute();
$bi = $busca_imgs->fetch(PDO::FETCH_ASSOC);
include('header.php');
include('menu.php');
?>


<script type="text/javascript" src="../webcam/webcam.min.js"></script> -->
<script type="text/javascript" src="../webcam/webcamm.min.js"></script>
<script type="text/javascript" src="../webcam/jquery.min.js"></script>
<script language="JavaScript">

function bater_foto()
{
Webcam.snap(function(data_uri)
{
document.getElementById('results').innerHTML = '<img id="base64image" src="'+data_uri+'"/><br><button  class="btn bg-green  waves-effect waves-float"  onclick="salvar_foto();"><i class="material-icons">check_circle</i> SALVAR FOTO</button>';
});
}

function mostrar_camera()
{
Webcam.set({
width: 300,
height: 380,
dest_width: 300,
dest_height: 380,
crop_width: 300,
crop_height: 400,
image_format: 'jpeg',
jpeg_quality: 100,
flip_horiz: true
});
Webcam.attach('#minha_camera');
}

function salvar_foto()
{
document.getElementById("carregando").innerHTML="Salvando, aguarde...";
var file = document.getElementById("base64image").src;
var formdata = new FormData();
formdata.append("base64image", file);
var ajax = new XMLHttpRequest();
ajax.addEventListener("load", function(event) { upload_completo(event);}, false);
ajax.open("POST", "upload.php");
ajax.send(formdata);
}

function upload_completo(event)
{
document.getElementById("carregando").innerHTML="";
var image_return=event.target.responseText;
//var showup=document.getElementById("completado").src=image_return;
var showup=document.getElementById("completadopf").src=image_return;
var caminho=document.getElementById("hiddencaminhofoto").value =image_return;
var showup2=document.getElementById("carregando").innerHTML='<br><b><span style="color:green;font-size:14px">Salvo com sucesso!</span></b>';
}
window.onload= mostrar_camera;
</script>

     <section class="content"  style="margin-left:30px;"  >
    <div class="container-fluid">
        <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
        <div class="header">
        <h2>Cadastro de pessoas</h2>
        </div>
        <div class="body">
        <!-- Nav tabs -->


        <ul class="nav nav-tabs" role="tablist">
         <li id="li1" role="presentation" class="">
        <a href="./cadastro_pessoas_edit.php?id=<?=$id?>"  >
        <i class="material-icons">keyboard</i> Dados 
        </a>
        </li>
        <li id="li2" role="presentation"  class="">
        <a href="./ficha.php?id=<?=$id?>"  >
        <i class="material-icons">contacts</i> Ficha/Documento
        </a>
        </li>

        <li id="li4" role="presentation" class="active" >
        <a href="./identificacao.php?id=<?=$id?>"  >
        <i class="material-icons">camera_front</i> Foto/Identificação
        </a>
        </li>

        <!--li id="li4" role="presentation" class="" >
        <a href="./cartao-assinatura?id=<?=$id?>"  >
        <i class="material-icons">picture_in_picture_alt</i> Cartão de assinatura
        </a>
        </li-->

        <!--li id="li4" role="presentation" >
        <a href="#assento" data-toggle="tab">
        <i class="material-icons">feedback</i>  Assento
        </a>
        </li-->

        


        </ul>


<div class="tab-content">
<!--======================================================================= DADOS PESSOA =============================================================== -->
    <div role="tabpanel" class="tab-pane fade in active" id="dadosnascimento" >
     <form method="POST">       
            <div class="row">
            <div class="col-sm-4"></div>
            <div class="col-sm-6">                
                          <div class="col-md-12">
                                <br><br>

                               <?php if ($bi['hiddencaminhofoto']!=''): ?>
                                     <img id="completadopf" src="<?=$bi['hiddencaminhofoto']?>" style="width: 50%;" /><br>
                                     
                                <?php else: ?>
                                     <img id="completadopf" src="../webcam/img.png" style="width: 50%;" /><br>
                                <?php endif ?> 

                             
                            </div>
                              
                                  <div class="col-md-12">
                            <button style="width: 50%;"  type="button" class="btn bg-blue waves-effect " data-toggle="modal" data-target="#largeModal"><i class="material-icons">camera</i>Tirar Foto</button>
                              </div>
                       </div>
                        <input type="hidden" name="hiddencaminhofoto" id="hiddencaminhofoto" >
            </div>
            <div class="col-sm-4"></div>
            </div>
            <legend></legend><br>

           

            <div class="row">
                <div class="col-sm-10"></div>
                    <button type="subimit" name="subimit2" class="btn bg-green  waves-effect waves-float" onclick="verificacao()">
                    <i class="material-icons">save</i> SALVAR
                    </button><br>
            </div>

      </form>      
    </div>

<!--====================================================================================================================================================== -->



</div>
                        </div>

                    </div>
                </div>
              </div>
        </div>
     </section>


















<!--========================================================================= SCRIPTS FUNÇÕES E INCLUDES =======================================================
                        <!-- Large Size -->




                        <!-- Jquery Core Js -->
                        <script src="../plugins/jquery/jquery.min.js"></script>


                        <?php if (isset($_SESSION['sucesso'])):?>
                        <script> swal('SUCESSO!','<?=$_SESSION["sucesso"]?>','success');</script>

                        <?php
                        #unset($_SESSION['sucesso']);
                        endif ?>


                        <?php if (isset($_SESSION['erro'])):?>
                        <script> swal('ERRO!','<?=$_SESSION["erro"]?>','error');</script>

                        <?php
                        #unset($_SESSION['erro']);
                        endif ?>



                        <!-- Bootstrap Core Js -->
                        <script src="../plugins/bootstrap/js/bootstrap.js"></script>



                        <!-- Slimscroll Plugin Js -->
                        <script src="../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

                        <!-- Waves Effect Plugin Js -->
                        <script src="../plugins/node-waves/waves.js"></script>

                        <!-- Jquery DataTable Plugin Js -->
                        <script src="../plugins/jquery-datatable/jquery.dataTables.js"></script>
                        <script src="../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
                        <script src="../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
                        <script src="../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
                        <script src="../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
                        <script src="../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
                        <script src="../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
                        <script src="../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
                        <script src="../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
                        <!-- Input Mask Plugin Js -->
                        <script src="../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>


                        <script type="text/javascript">
                        $('textarea').keyup(function(e){
                        if(e.which == 13){
                        //swal("Ops!", "Não pressione enter ao digitar nas caixas de texto, use ponto e vírgula", "error");
                        var texto = $(this).val();
                        texto = texto.replace('\n', ';');
                        $(this).val(texto);
                        }

                        });
                        </script>

                        <script type="text/javascript">
                        $(document).ready(function(){

                        $('input[type="date"]').blur(function(){

                        var teste = $(this).val();

                        if (teste.length>10) {

                        swal("Ops!", "Data digitada está incorreta!", "error");
                        }
                        });


                        $('.form-control').blur(function(){

                        if ($(this).prop('required') == true && $(this).val()=='') {

                        swal("Ops!", "Este campo é requerido", "error");
                        }
                        });  

                        });    


                        </script>
                        <script type="text/javascript">
                        $(document).ready(function(){
                        $(".cpf").inputmask("999.999.999-99");
                        $(".rg").inputmask("999999999999-9/AAA-AA");
                        $(".mobile-phone-number").inputmask("+55(99)9 9999-9999");
                        $(".phone-number").inputmask("+55(999)9999-9999");
                        exibe();
                        $('.estcivil').hide();
                        });
                        </script>
                        <script type="text/javascript">
                        $("#strCPF").blur(function (e) {
                        var seloCod = $(this).val();
                        $.post('consultas/validador-cpf-pessoas.php', {'seloCodigo':seloCod}, function(data) {
                        $("#resultado").html(data);
                        });
                        });
                        </script>

                        <!-- Custom Js -->
                        <script src="../js/admin.js"></script>
                        <script src="../js/pages/tables/jquery-datatable.js"></script>
                        <script src="../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
                        <!-- Demo Js -->
                        <script src="../js/demo.js"></script>

                        <div class="modal fade  " id="sucesso" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content bg-green">
                        <div class="alert bg-green alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="text-center">
                        <i class="material-icons">verified_user</i> </h2>
                        <p class="text-center"><?=$_SESSION['sucesso']?></p>

                        </div>
                        </div>
                        </div>
                        </div>

                        <div class="modal fade  " id="erro" tabindex="-1" role="dialog">
                        <div class="modal-dialog modal-sm" role="document">
                        <div class="modal-content bg-red">
                        <div class="alert bg-red alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h2 class="text-center">
                        <i class="material-icons">error_outline</i>
                        </h2>
                        <p class="text-center"> <?=$_SESSION['erro']?></p>

                        </div>
                        </div>
                        </div>
                        </div>
                        <!-- Adicionando Javascript -->
                        <script type="text/javascript" >

                        $(document).ready(function() {

                        //Quando o campo cep perde o foco.
                        $("#intImovelCep").blur(function() {

                        //Nova variável "cep" somente com dígitos.
                        var cep = $(this).val().replace(/\D/g, '');

                        //Verifica se campo cep possui valor informado.
                        if (cep != "") {

                        //Expressão regular para validar o CEP.
                        var validacep = /^[0-9]{8}$/;

                        //Valida o formato do CEP.
                        if(validacep.test(cep)) {

                        //Preenche os campos com "..." enquanto consulta webservice.
                        $("#endereco").val("Procurando ...");
                        $("#bairro").val("Procurando...");
                        $("#intUFcidade").val("Procurando ...");



                        //Consulta o webservice viacep.com.br/
                        $.getJSON("https://viacep.com.br/ws/"+ cep +"/json/?callback=?", function(dados) {

                        if (!("erro" in dados)) {
                        //Atualiza os campos com os valores da consulta.
                        $("#endereco").val(dados.logradouro);
                        $("#bairro").val(dados.bairro);
                        $("#intUFcidade").val(dados.ibge+'/'+dados.uf);

                        //    $("#ibge").val(dados.ibge);
                        } //end if.
                        else {
                        //CEP pesquisado não foi encontrado.
                        //  limpa_formulário_cep();
                        alert("CEP não encontrado.");
                        }
                        });
                        } //end if.
                        else {
                        //cep é inválido.
                        //limpa_formulário_cep();
                        alert("Formato de CEP inválido.");
                        }
                        } //end if.
                        else {
                        //cep sem valor, limpa formulário.
                        //limpa_formulário_cep();
                        }
                        });
                        });

                        </script>

                        <?php if (isset($_SESSION['sucesso'])):?>
                        <script> $("#sucesso").modal();</script>

                        <?php
                        unset($_SESSION['sucesso']);
                        endif ?>


                        <?php if (isset($_SESSION['erro'])):?>
                        <script> $("#erro").modal();</script>

                        <?php
                        unset($_SESSION['erro']);
                        endif ?>


                        <script type="text/javascript">
                        //window.onload=exibe();
                        function exibe(){
                        var select = document.getElementById('setEstadoCivil');

                        select.onchange = function(){

                        if (this.value == 'DI') {
                        document.getElementById('ex').style.display="block";
                        document.getElementById('conjuge').style.display="none";
                        document.getElementById('cartoriocasamento').style.display="block";
                        document.getElementById('regimecasamento').style.display="block";
                        document.getElementById('datacas').style.display="block";
                        }

                        else if (this.value == 'CA') {
                        document.getElementById('conjuge').style.display="block";
                        document.getElementById('ex').style.display="none";
                        document.getElementById('cartoriocasamento').style.display="block";
                        document.getElementById('regimecasamento').style.display="block";
                        document.getElementById('datacas').style.display="block";
                        }

                        else if (this.value == 'UN') {
                        document.getElementById('conjuge').style.display="block";
                        document.getElementById('ex').style.display="none";
                        document.getElementById('cartoriocasamento').style.display="block";
                        document.getElementById('regimecasamento').style.display="block";
                        document.getElementById('datacas').style.display="block";
                        }



                        else{
                        document.getElementById('ex').style.display="none";
                        document.getElementById('conjuge').style.display="none";
                        document.getElementById('cartoriocasamento').style.display="none";
                        document.getElementById('regimecasamento').style.display="none";
                        document.getElementById('datacas').style.display="none"; }
                        };
                        };

                        </script>

                        <script type="text/javascript">
                        $("#strNaturalidade").click(function(){
                        $("#cidadesNaturalidade").modal();
                        });

                        $("#intUFcidade").click(function(){
                        $("#cidade").modal();
                        });
                        $("#intUFcidadePJ").click(function(){
                        $("#cidade2").modal();
                        });

                        </script>


                        <script type="text/javascript">
                        function preencheNoivo(id,uf,cidade){
                        document.getElementById('strNaturalidade').value = id+'/'+uf+'/'+cidade;
                        document.getElementById('strUF').value = uf;}

                        function preencheNoivo2(id,uf,cidade){document.getElementById('intUFcidade').value = id+'/'+uf+'/'+cidade;}
                        function preencheNoivo3(id,uf,cidade){document.getElementById('intUFcidadePJ').value = id+'/'+uf+'/'+cidade;}
                        </script>

                        <script type="text/javascript">
                        $("#strOrgaoEm").change(function(){
                        var select = $("#strOrgaoEm").val();
                        if (select === 'OTH') {
                        $('#strOrgaoEmOTH').show();
                        }
                        else{  $('#strOrgaoEmOTH').hide();}

                        });
                        </script>

                        <script src="../plugins/ajax/screen.js"></script>

                        <!-- TinyMCE -->
                        <script src="../js/pages/forms/editors.js"></script>
                        <script src="../plugins/tinymce/tinymce.js"></script>
                        <script>
                        tinymce.init({
                        selector: '.textarea',
                        language: 'pt_BR',
                        language_url : '../plugins/tinymce/langs/pt_BR.js',
                        theme: 'modern',
                        plugins: [
                        'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                        'searchreplace wordcount visualblocks visualchars code fullscreen',
                        'insertdatetime media nonbreaking save table contextmenu directionality',
                        'emoticons template paste textcolor colorpicker textpattern imagetools'
                        ],
                        toolbar1: 'insertfile undo redo | link image',
                        toolbar2: 'print preview media | ',
                        fontsize_formats: '8pt 10pt 12pt 14pt 18pt 24pt 36pt 48pt',
                        image_advtab: true,
                        file_picker_callback: function(callback, value, meta) {
                        if (meta.filetype == 'image') {
                        $('#upload').trigger('click');
                        $('#upload').on('change', function() {
                        var file = this.files[0];
                        var reader = new FileReader();
                        reader.onload = function(e) {
                        callback(e.target.result, {
                        alt: ''
                        });
                        };
                        reader.readAsDataURL(file);
                        });
                        }
                        }
                        });
                        </script>
                         <input name="image" type="file" id="upload" class="hidden" onchange="">


<!--========================================================================= SCRIPTS FUNÇÕES E INCLUDES =======================================================-->

      <div class="modal fade" id="largeModal" tabindex="-1" role="dialog" style="display: none;">
               <div class="modal-dialog modal-lg" role="document">
                   <div class="modal-content">
                       <div class="modal-header">
                           <h4 class="modal-title" id="largeModalLabel">Tirar Foto</h4>
                       </div>
                       <div class="modal-body">
                         <div class="container" id="camera"><b>Câmera:</b>
                           <div id="minha_camera"></div><form><small><button onclick="bater_foto()" type="button"  class="btn bg-blue  waves-effect waves-float">
                                    <i class="material-icons">add_a_photo</i> CAPTURAR FOTO
                                </button></form></small></form>
                          </div>

                          <div class="container" id="previa">
 <b>Prévia:</b><div id="results"></div>
  <span id="carregando">
 </div>
                       </div>
                       <div class="modal-footer">
                           <button type="button" class="btn btn-link waves-effect"></button>
                           <button type="button" class="btn btn-link waves-effect" data-dismiss="modal">Fechar</button>
                       </div>
                   </div>
               </div>
           </div>

</body>
</html>
