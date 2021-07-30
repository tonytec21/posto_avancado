<?php include('../../../controller/db_functions.php');
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

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>Cadastro de Pessoas</title>

    <!-- Favicon-->
    <link rel="icon" href="../../../favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
     <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
     <link href="../../../plugins/icon/icon.css" rel="stylesheet" type="text/css">

    <!-- Bootstrap Core Css -->
    <link href="../../../plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="../../../plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="../../../plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Colorpicker Css -->
    <link href="../../../plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" />

    <!-- Dropzone Css -->
    <link href="../../../plugins/dropzone/dropzone.css" rel="stylesheet">

    <!-- Multi Select Css -->
    <link href="../../../plugins/multi-select/css/multi-select.css" rel="stylesheet">

    <!-- Bootstrap Spinner Css -->
    <link href="../../../plugins/jquery-spinner/css/bootstrap-spinner.css" rel="stylesheet">

    <!-- Bootstrap Tagsinput Css -->
    <link href="../../../plugins/bootstrap-tagsinput/bootstrap-tagsinput.css" rel="stylesheet">

    <!-- Bootstrap Select Css -->
    <link href="../../../plugins/bootstrap-select/css/bootstrap-select.css" rel="stylesheet" />

    <!-- noUISlider Css -->
    <link href="../../../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../../css/themes/all-themes.css" rel="stylesheet" />


      <script src="../../../plugins/ajax/ajax.min.js"></script>
       <style>
            .form-control{ font-size: 90%;}
            label{font-size:90%;text-transform: uppercase;}
            @media only screen and (max-width: 700px) {
            section.content{ min-width: 100%!important; margin-left: -100px!important; }
            #leftsidebar{display: none!important;}
            #outrasec{display: none!important;}
            }
            #leftsidebar{width: 15%!important;}
            .form-control{text-align: center}
            #strEmail{text-transform: none!important}

            @page {
margin: 180px 50px 150px;
margin-left: 3cm;
margin-bottom: 0.5cm;
margin-right: 3cm;
margin-top: 0.3cm;

/** Define the margins of your page
margin-top: 5cm;margin-bottom: 2cm;

 margin-left: 2cm;
 margin-right: 1cm;

margin-bottom: 2cm;
**/
}

legend {font-size: 70%}
header { position: fixed; left: 0px; top: -174px; right: 0px; height: 150px; background-color: white; text-align: center; }
/** Extra personal styles
background-color: #03a9f4;**/

footer {
position: fixed;
bottom: -60px;
left: 0px;
right: 0px;
height: 20px;

/** Extra personal styles
background-color: #03a9f4;**/
color: black;
text-align: center;
line-height: 35px;
}
#footer { position: fixed; left: 0px; bottom: -180px; right: 0px; height: 165px; background-color: white; z-index: -10}

fieldset{
padding: 7px;
font-size: 100%;
}
table{
  border: 1px solid black;
}
thead{
  border-bottom: 1px solid black;
}
th{
  border-left: 1px solid black;
}

td{
border-left: 1px solid black;
border-bottom: 1px solid black
}
.left{
  float: left;
  font-size: 70%;
}
div#marca{


}
.vertical-text {
  transform: rotate(-90deg);
  transform-origin: left top 0;
    margin-left: 668px;
    margin-top: 500px;
  flex-wrap: nowrap;
  float: left;
  display: inline;
  white-space: nowrap;
}
/*
main {
border-style: solid;
border-width: 1px;
}*/
.break-before { page-break-before: always; }
  .section { margin-top: 200px; }

p {

  -webkit-margin-before:  0.350em;
  -webkit-margin-after: 0.350em;

  margin-bottom: 6px;
 }

  main { background: #fff;
 ; border: 1px solid #fff;
         z-index: 1;
         position: relative;

  }

.pagenum:before { content: counter(page); }
        </style>
                <script src="../../../plugins/sweetalert/sweetalert.min.js"></script>
<link href="../../../plugins/sweetalert/sweetalert.css" rel="stylesheet" />
</head>
<body class="theme-red">
    

    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->

        <nav class="navbar" style="background: rgba(0,0,0,.9)">
                    <div class="container-fluid">
                    <div class="navbar-header">
                    <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                    <a href="javascript:void(0);" class="bars"></a>
                    <a class="navbar-brand" href="#"><img src="../../../images/logo_1.png" id="imgBookc"  style="max-width: 9%"></a>
                    </div>
                    <div class="collapse navbar-collapse" id="navbar-collapse">




                    </div>
                    </div>
        </nav>
    <!-- #Top Bar -->
    <section id="outrasec">
 <aside id="leftsidebar" class="sidebar" style="display: none">
            <!-- User Info -->

            <!-- #User Info -->
            <!-- Menu -->
                    <div class="menu">
                <ul class="list">
                    <!--li class="header">MENU PRINCIPAL</li-->
                    <li class="active">
                        <a href="../../../index.php">
                            <i class="material-icons">home</i>
                            <span>Área de Trabalho</span>
                        </a>
                    </li>
                       <!--a href="insert-atalho.php?titulo=<?=$titulo?>&endereco=<?=$URL_ATUAL?>" class="btn bg-indigo waves-effect">
                                    <i style="color:white" class="material-icons">list</i>
                                    <span style="color:white">ADICIONAR ATALHO</span>
                                </a-->
                 <a href="javascript:void(0);" >
                            <i class="material-icons">person</i>
                            <span>Pessoas</span>
                        </a>
                             <a href="pesquisaPessoas.php">BUSCAR PESSOAS</a>



                                        <a href="pessoas.php">CADASTRAR PESSOAS</a>

                                        <a href="pessoas-relatorio-fichas.php">RELATÓRIO DE FICHAS DE CADASTRO</a>

                                        <a href="pessoas-relatorio.php">RELATÓRIO DE PESSOAS CADASTRADAS</a>

                         <ul class="ml-menu">
                            <li>
                            <!--##################### MENU LATERAL ##################################-->







                            </li>

                        </ul>
                    </li>
                  </li>



                        </ul>
                    </li>
                  </li>

                </ul>
            </div>
            <!-- #Menu -->
            </div>
            <!-- #Menu -->
            <!-- Footer -->

            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

        <!-- #END# Right Sidebar -->
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

        <!-- #END# Right Sidebar -->
    </section>
     <section class="content"  style="margin-left: 200px!important; margin-top: 80px!important"  >
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

        <li id="li4" role="presentation" class="" >
        <a href="./identificacao.php?id=<?=$id?>"  >
        <i class="material-icons">camera_front</i> Foto/Identificação
        </a>
        </li>

        <li id="li4" role="presentation" class="" >
        <a href="./cartao-assinatura?id=<?=$id?>"  >
        <i class="material-icons">picture_in_picture_alt</i> Cartão de assinatura
        </a>
        </li>

        <!--li id="li4" role="presentation" >
        <a href="#assento" data-toggle="tab">
        <i class="material-icons">feedback</i>  Assento
        </a>
        </li-->

        


        </ul>


<div class="tab-content">
<!--======================================================================= DADOS PESSOA =============================================================== -->
    <div role="tabpanel" class="tab-pane fade in active" id="dadosnascimento" >
     <form>       
            <div class="row">
            <div class="col-sm-1"></div>
            <div class="col-sm-10" style="border: 1px solid black; padding: 20px" id="printcartao">
               
                <?php 
                $c = PESQUISA_ALL('cadastroserventia');
                foreach ($c as $c ):?>

                    <header>

</header>

<footer>


</footer>
<div id="footer" style="width: 100%;text-align:center;">

</div>

<main>


    <!--div style="float: right;margin-left: -90px;margin-top:34px;text-align: center;position:absolute;;font-size:10px">

        <B> FICHA: <?=$id?> </B>
    </div-->

<fieldset style="width:100%;margin-bottom: -1cm">

<div style="text-align: center">


<table style="width: 100%;text-align: center; border-collapse: collapse;" border="1" cellpadding="1">
<tbody>
<tr>
    <td style="width: 30%;">&nbsp;

        <?php if (isset($key->hiddencaminhofoto) && !empty($key->hiddencaminhofoto) && $key->hiddencaminhofoto != 'NULL'): ?>
        <div style="margin-top:-15px">
        <img style="width: 50px; height: 60px;" src="../<?=$key->hiddencaminhofoto?>"  >
        </div>
        <?php endif ?>

            <?php

            include_once('../../../plugins/phpqrcode/qrlib.php');

            function tirarAcentos($string){
            return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/"),explode(" ","a A e E i I o O u U n N"),$string);
            }
            $img_local = "../PDFS/qrimagens/";
            $img_nome = 'TESTE.png';
            $nome = $img_local.$img_nome;
            $qr ='testando qr code';
            $conteudo = $qr;
            QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


            echo '<img style="width:40px; margin-top:5px; " src="'.$nome.'" />';
            ?>
            <!--p style="font-weight: bold; font-size: 6px;display: inline-block;"><?=$textoselo?></p-->

    </td>

<td style="text-transform: uppercase;">&nbsp;


<?=strtoupper($c->strRazaoSocial)?><br>
<?=$c->strLogradouro?>, <?=$c->strNumero?> -
<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
<?php endforeach ?>
<br>
Titular da Serventia: <?=$c->strTituloServentia?><br>
Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?>



</td>

<td style="width: 10%; font-size: 60%">&nbsp;
<B> FICHA <br>

111
   </B>


</td>
</tr>
</tbody>
</table>


</div>


<fieldset style="height:2px;width: 100%;font-size:9px;text-align:left" ><legend>NOME</legend> NOME</fieldset>

<div style=" display: inline-block;width: 105%;text-align:left">
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>NACIONALIDADE</legend> NACIONALIDADE</fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:8px"><legend>NATURALIDADE</legend>

    TESTE

</fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>ESTADO CIVIL</legend>
  TESTE
</fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px;position:absolute"><legend>DATA NASCIMENTO</legend> TESTE</fieldset>
</div>

<div style="display: inline-block;width: 105%;clear:both;text-align:left">
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>DOC/IE</legend>   TESTE</fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>ORGÃO EMISSOR</legend>  TESTE  TESTE</fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>DATA EMISSÃO</legend>  TESTE </fieldset>

<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>CPF/CNPJ</legend>   TESTE</fieldset>
</div>

<div style="display: inline-block;width: 105%;clear:both;text-align:left">
<fieldset style="height:2px;width: 67.6%; display: inline-block;font-size:9px"><legend>ENDEREÇO</legend>   TESTE</fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:8px"><legend>CIDADE</legend><div style="margin-top:-3px;">
      TESTE
</div>

</fieldset>

</div>

<div style="display: inline-block;width: 105%;clear:both;text-align:left">
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>PROFISSÃO</legend>   TESTE</fieldset>
<fieldset style="height:2px;width: 67.6%; display: inline-block;font-size:9px"><legend>FILIAÇÃO</legend>  TESTE</fieldset>
</div>

<div style="display: inline-block;width: 105%;clear:both;text-align:left">
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>Regime</legend>
  TESTE

</fieldset>
<fieldset style="height:2px;width: 67.6%; display: inline-block;font-size:9px"><legend>Conjuge</legend>

  TESTE
    </fieldset>
</div>

<div style="display: inline-block;width: 105%;clear:both;text-align:left">
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>DATA</legend>   TESTE</fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>TEL FIXO</legend>   TESTE</fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>TEL CEL.</legend>   TESTE</fieldset>
<fieldset style="height:2px;width: 20%; display: inline-block;font-size:9px"><legend>EMAIL</legend>   TESTE</fieldset>
</div>

<br><br>
<fieldset style="height:9px;width: 100%;font-size:9px;text-align:left; border: none" ><legend>ASSINATURA 1</legend><hr></fieldset>
<br>
<fieldset style="height:9px;width: 100%;font-size:9px;text-align:left; border: none" ><legend>ASSINATURA 2</legend><hr></fieldset>
<br>
<fieldset style="height:9px;width: 100%;font-size:9px;text-align:left;border:none" ><legend>ASSINATURA 3 OU RUBRICA</legend><hr></fieldset>

<p style="margin-left: -60%; font-size: 60%;padding-top:2px">SELO:   TESTE</p>
<p style="margin-left: 40%; margin-top: -30px;font-size: 60%;padding-top:4px">
  <?=mb_convert_case($_SESSION['nome'], MB_CASE_UPPER, "UTF-8")?> _______________________________</p>
<p>

<br>
</fieldset>





                <?php endforeach  ?>     
            </div>
            <div class="col-sm-1"></div>
            </div>
            <legend></legend><br>


                 <div class="row">
                <div class="col-sm-10"></div>
                    <a onclick="printdiv('printcartao')" class="btn bg-indigo"><i class="material-icons">print</i>IMPRIMIR</a>
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
                        <script src="../../../plugins/jquery/jquery.min.js"></script>


                                     <script type="text/javascript">
                            function printdiv(iddiv){
                            var div = iddiv;
                            var conteudo = $('#'+div).html();
                            tela_impressao = window.open('about:blank');
                            tela_impressao.document.write(conteudo);
                            tela_impressao.window.print();
                            tela_impressao.window.close();
                            }
                            </script>


                        <!-- Bootstrap Core Js -->
                        <script src="../../../plugins/bootstrap/js/bootstrap.js"></script>



                        <!-- Slimscroll Plugin Js -->
                        <script src="../../../plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

                        <!-- Waves Effect Plugin Js -->
                        <script src="../../../plugins/node-waves/waves.js"></script>

                        <!-- Jquery DataTable Plugin Js -->
                        <script src="../../../plugins/jquery-datatable/jquery.dataTables.js"></script>
                        <script src="../../../plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js"></script>
                        <script src="../../../plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js"></script>
                        <script src="../../../plugins/jquery-datatable/extensions/export/buttons.flash.min.js"></script>
                        <script src="../../../plugins/jquery-datatable/extensions/export/jszip.min.js"></script>
                        <script src="../../../plugins/jquery-datatable/extensions/export/pdfmake.min.js"></script>
                        <script src="../../../plugins/jquery-datatable/extensions/export/vfs_fonts.js"></script>
                        <script src="../../../plugins/jquery-datatable/extensions/export/buttons.html5.min.js"></script>
                        <script src="../../../plugins/jquery-datatable/extensions/export/buttons.print.min.js"></script>
                        <!-- Input Mask Plugin Js -->
                        <script src="../../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>


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
                        <script src="../../../js/admin.js"></script>
                        <script src="../../../js/pages/tables/jquery-datatable.js"></script>
                        <script src="../../../plugins/jquery-inputmask/jquery.inputmask.bundle.js"></script>
                        <!-- Demo Js -->
                        <script src="../../../js/demo.js"></script>

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

                        <?php include('../modais-pessoas.php'); ?>

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

                        <script src="../../../plugins/ajax/screen.js"></script>

                     
               

<!--========================================================================= SCRIPTS FUNÇÕES E INCLUDES =======================================================-->
</body>
</html>
