<!DOCTYPE html>
<?php session_start();
include('../../../controller/db_functions.php');
$pdo=conectar();
$count = 0;

function molda_cpf($var){

if (substr($var, 0,3) == 000) {
$var = substr($var, 3,11);
}

    if (strlen($var) == 11) {
        return substr($var, 0,3).'.'.substr($var, 3,3).'.'.substr($var, 6,3).'-'.substr($var, 9,2);
    }

    else{
    return substr($var, 0,2).'.'.substr($var, 2,3).'.'.substr($var, 5,3).'/'.substr($var, 8,4).'-'.substr($var, 12,2);  
    }
}

$serv = PESQUISA_ALL_ID('cadastroserventia',1);
foreach($serv as $s){
    $endereco_serventia = $s->strLogradouro.' Nº '.$s->strNumero.' - '.$s->strBairro.' CEP: '.$s->strCEP;
    $titular = $s->strTituloServentia;
}
$ato = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.5.1' ");
$ato->execute();
$at = $ato->fetch(PDO::FETCH_ASSOC);
$valor_ato = $at['monValorTotal'];

function descrimina_emols($ato,$quantidade){
$pdo = conectar();
$busca_emol =  $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '$ato' ");
$busca_emol->execute();
$be = $busca_emol->fetch(PDO::FETCH_ASSOC);
return number_format($quantidade * ($be['monValor']+$be['monValorFerc']),2);
}
 ?>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
 

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



    <!-- noUISlider Css -->
    <link href="../../../plugins/nouislider/nouislider.min.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="../../../css/style.css" rel="stylesheet">

    <!-- AdminBSB Themes. You can choose a theme from css/themes instead of get all themes -->
    <link href="../../../css/themes/all-themes.css" rel="stylesheet" />

      <script src="../../../plugins/ajax/ajax.min.js"></script>

</head>

<body class="theme-red">
    <!-- Page Loader -->
    <div class="page-loader-wrapper">
        <div class="loader">
            <div class="preloader">
                <div class="spinner-layer pl-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
            <p>Carregando...</p>
        </div>
    </div>
    <!-- #END# Page Loader -->
    <!-- Overlay For Sidebars -->
    <div class="overlay"></div>
    <!-- #END# Overlay For Sidebars -->
    <!-- Search Bar -->
    <div class="search-bar">
        <div class="search-icon">
            <i class="material-icons">search</i>
        </div>
        <input type="text" placeholder="START TYPING...">
        <div class="close-search">
            <i class="material-icons">close</i>
        </div>
    </div>
    <!-- #END# Search Bar -->
    <!-- Top Bar -->
       <nav class="navbar" style="background: rgba(0,0,0,.9)">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
                <a class="navbar-brand" href="#"><img src="../../../images/logo_1.png" id="imgBookc"  style="max-width: 9%"></a>
            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">

             

                          <ul class="nav navbar-nav navbar-right" style="margin-top: 10px">
<!-- Call Search -->

<div class="btn-group col-md-3" style="background: none;border: none;box-shadow: none;margin-right: 70px;">
<button type="button" class="btn bg-light-green dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
<i class="material-icons">monetization_on</i> Protesto <span class="caret"></span>
</button>
<ul class="dropdown-menu">
<li><a href="../protesto-remessa-automatica.php" class=" waves-effect waves-block"> Protesto Entrada Automática</a></li>
<li><a href="../protesto-entrada-manual.php" class=" waves-effect waves-block"> Protesto Entrada Manual</a></li>
<li><a href="../pesquisa-protesto.php" class=" waves-effect waves-block">Pesquisa</a></li>
</ul>
</div>


<li class="col-md-2 hide-on-med-and-down" ><a style="margin-top:-7px; margin-right: -60px;" class="waves-effect waves-block waves-light toggle-fullscreen" href="javascript:void(0);"><i class="material-icons large" style="font-size: 30px">settings_overscan</i></a></li>

</ul>



            </div>
        </div>
    </nav>
    <!-- #Top Bar -->
    <section>
        <!-- Left Sidebar -->
   <!-- Left Sidebar -->
           <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar"  >
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
                         <li class="active">
                        <a href="../cartorio-protesto.php">
                            <i class="material-icons">monetization_on</i>
                            <span>Protesto</span>
                        </a>
                    </li>
                       <a target="_blank" href="../pessoas.php"><h6><i class="material-icons">person</i> CADASTRAR PESSOA </h6></a>
                         <a target="_blank" href="../selo-fisico.php"><h6><i class="material-icons">lock</i> SELOS  </h6></a>
                          <a href="../cadastrar-folha-seguranca.php"><h6><i class="material-icons">lock</i> FOLHAS DE SEGURANÇA </h6></a>
                             <a target="_blank" href="../configuracoes-livro.php"><h6> <i class="material-icons">lock</i> LIVROS  </h6></a>
                              <a href="../exportar-ferj.php"><h6><i class="material-icons">lock</i> ARQUIVO FERJ </h6></a>
                              <a href="../incluir-lembrete.php"><h6><i class="material-icons">alarm</i> LEMBRETES </h6></a>
                        <?php if (isset($_SESSION['logadoAdm']) && $_SESSION['logadoAdm'] =='S'): ?>
                           <a target="_blank" href="../cadastro-serventia.php?id=1"><h6><i class="material-icons">lock</i> INFORMAÇÕES DA SERVENTIA  </h6></a>
                                    <a target="_blank" href="../cadastro-funcionario.php"><h6><i class="material-icons">lock</i> FUNCIONÁRIOS  </h6></a>
                                <?php endif ?>
                        <ul class="ml-menu">
                            <li>
                            <!--##################### MENU LATERAL ##################################-->

                                <li class="">
                            <!--##################### CART NOTAS: ##################################-->
                                    <li>
                                     
                                    </li>
                                     <li>
                                  
                                    </li>
                                     <li>
                                        
                                    </li>
                                     <li>
                                     
                                    </li>
                                   
                                </li>
                            </li>

                        </ul>
                    </li>
                  </li>
              

          
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <!--div class="legal">
                <div class="copyright">
                    &copy; 2016 - 2017 <a href="javascript:void(0);">AdminBSB - Material Design</a>.
                </div>
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->
        <!-- Right Sidebar -->

        <!-- #END# Right Sidebar -->
    </section>
        <section class="content" style="margin-left: 30px"  >
             <div class="container-fluid">
              <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                  
                        <div class="body">

<div class="row clearfix">
<div class="col-sm-12"> 
  <form action="" method="POST">
<textarea name="textoregistro" id="" rows="30">
  <img style="max-width: 100%; margin-top: 5px;" src="../bd_INSERTS/cabecalhos/CAPA.jpg">
<?php
$count = 1; 
$k = PESQUISA_ALL('livro_protestos_pagamentos');
foreach ($k as $k):

 ?>





<?php 
$busca_matricula = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$k->assento' LIMIT 1");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);
 ?>


 <?php   foreach($linhas as $b):
$pesquisa_apresentante = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$b->numero_codigo_portador_transacao'");
      $pesquisa_apresentante->execute();
      $l = $pesquisa_apresentante->fetchAll(PDO::FETCH_OBJ);
      foreach ($l as $l) {
      $pagamento_diferido = $l->pagamento_diferido;
      }
      ?>







<hr style="margin-top: 1cm;border:1px dashed black">
           <?php 
                $busca_livro = $pdo->prepare("SELECT * FROM livro_protestos_pagamentos where assento = '$b->numero_protocolo_cartorio_transacao'");
                    $busca_livro->execute();
                    $bliv = $busca_livro->fetch(PDO::FETCH_ASSOC);
                    $livro_titulo = $bliv['identifcadorLivro'];
                    $folha_titulo = $bliv['PaginaLivro'];
                    $termo_titulo = $bliv['LivroInicial'];
                 ?>
               
                <h1 style="font-weight: bold; text-align: center">Livro: <?=$livro_titulo?> Folha: <?=$folha_titulo?>, Protocolo nº <?=$b->numero_protocolo_cartorio_transacao?></h1>
                

    
          <div style="border: 1px solid black;  margin-right: 1cm; margin-left: 1cm; display: block; padding: -10px;margin-bottom: -1cm">
          

              

                        <p style="display: inline-block; margin-left: 10px;">
                        <?php $pesquisa_apresentante = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$b->numero_codigo_portador_transacao'");
                        $pesquisa_apresentante->execute();
                        $l = $pesquisa_apresentante->fetchAll(PDO::FETCH_OBJ);
                        foreach ($l as $l) {
                        $apresentante = $l->nome;
                        }
                         ?>
                        <b>Apresentante:</b> <b><?=mb_strtoupper($apresentante)?></b>
                        </p> 
                        <p style="display: inline-block; margin-left: 10px;">
                    <!--#################################################################################################################################################-->

                                        <?php 
                                        if($b->especie_titulo_transacao == 'CCE'){$especie = 'Cédula de Crédito à Exportação';}
                                        if($b->especie_titulo_transacao == 'CCB'){$especie = 'Cédula de Crédito Bancário';}
                                        if($b->especie_titulo_transacao == 'CBI'){$especie = 'Cédula de Crédito Bancário por Indicação';}
                                        if($b->especie_titulo_transacao == 'CCC'){$especie = 'Cédula de Crédito Comercial';}
                                        if($b->especie_titulo_transacao == 'CCI'){$especie = 'Cédula de Crédito Industrial';}
                                        if($b->especie_titulo_transacao == 'CCR'){$especie = 'Cédula de Crédito Rural';}
                                        if($b->especie_titulo_transacao == 'CHP'){$especie = 'Cédula Hipotecária';}
                                        if($b->especie_titulo_transacao == 'CRH'){$especie = 'Cédula Rural Hipotecária';}
                                        if($b->especie_titulo_transacao == 'CRP'){$especie = 'Cédula Rural Pignoratícia';}
                                        if($b->especie_titulo_transacao == 'CPH'){$especie = 'Cédula Rural Pignoratícia Hipotecária';}
                                        if($b->especie_titulo_transacao == 'CDA'){$especie = 'Certidão da Dívida Ativa';}
                                        if($b->especie_titulo_transacao == 'CH'){$especie = 'Cheque';}
                                        if($b->especie_titulo_transacao == 'CD'){$especie = 'Confissão de Dívida';}
                                        if($b->especie_titulo_transacao == 'CPS'){$especie = 'Conta de Prestação de Serviços - Profissional liberal';}
                                        if($b->especie_titulo_transacao == 'CJV'){$especie = 'Conta Judicialmente Verificada';}
                                        if($b->especie_titulo_transacao == 'CC'){$especie = 'Contrato de Câmbio';}
                                        if($b->especie_titulo_transacao == 'CM'){$especie = 'Contrato de Mútuo';}
                                        if($b->especie_titulo_transacao == 'DV'){$especie = 'Diversos';}
                                        if($b->especie_titulo_transacao == 'DS'){$especie = 'Duplicata de Prestação de Serviços - Original';}
                                        if($b->especie_titulo_transacao == 'DSI'){$especie = 'Duplicata de Prestação de Serviços por Indicação - Comprovante de prestação dos serviços';}
                                        if($b->especie_titulo_transacao == 'DM'){$especie = 'Duplicata de Venda Mercantil';}
                                        if($b->especie_titulo_transacao == 'DMI'){$especie = 'Duplicata de Venda Mercantil por Indicação';}
                                        if($b->especie_titulo_transacao == 'DR'){$especie = 'Duplicata Rural';}
                                        if($b->especie_titulo_transacao == 'DRI'){$especie = 'Duplicata Rural por Indicação';}
                                        if($b->especie_titulo_transacao == 'EC'){$especie = 'Encargos Condominiais';}
                                        if($b->especie_titulo_transacao == 'CT'){$especie = 'Espécie de Contrato';}
                                        if($b->especie_titulo_transacao == 'LC'){$especie = 'Letra de Câmbio';}
                                        if($b->especie_titulo_transacao == 'NCE'){$especie = 'Nota de Crédito à Exportação';}
                                        if($b->especie_titulo_transacao == 'NCC'){$especie = 'Nota de Crédito Comercial';}
                                        if($b->especie_titulo_transacao == 'NCI'){$especie = 'Nota de Crédito Industrial';}
                                        if($b->especie_titulo_transacao == 'NCR'){$especie = 'Nota de Crédito Rural';}
                                        if($b->especie_titulo_transacao == 'NP'){$especie = 'Nota Promissória';}
                                        if($b->especie_titulo_transacao == 'NPR'){$especie = 'Nota Promissória Rural';}
                                        if($b->especie_titulo_transacao == 'RA'){$especie = 'Recibo de Aluguel';}
                                        if($b->especie_titulo_transacao == 'SJ'){$especie = 'Sentença Judicial';}
                                        if($b->especie_titulo_transacao == 'TA'){$especie = 'Termo de Acordo - Ex. Ação trabalhista';}
                                        if($b->especie_titulo_transacao == 'TAC'){$especie = 'Termo de Ajustamento de Conduta';}
                                        if($b->especie_titulo_transacao == 'TS'){$especie = 'Triplicata de Prestação de Serviços';}
                                        if($b->especie_titulo_transacao == 'TM'){$especie = 'Triplicata de Venda Mercantil';}
                                        if($b->especie_titulo_transacao == 'WR'){$especie = 'Warrant';}
                                         ?>

                        <b>REF.:</b> <?=mb_strtoupper($especie)?>                
                        </p><br>
                        <p style="display: inline-block; margin-left: 10px;font-weight: bold">
                        DATA DE PAGAMENTO: <?=date('d/m/Y', strtotime($b->data_ocorrencia_transacao))?></p><br>
                        <p style="display: inline-block; margin-left: 10px;">
                            <b>Doc. Num.: <?=$b->numero_titulo_transacao?></b>
                        </p>
                        <p style="display: inline-block; margin-left: 2cm;">
                            <b>Vencimento: </b> <?=substr($b->data_vencimento_titulo_transacao,0,2).'/'.substr($b->data_vencimento_titulo_transacao,2,2).'/'.substr($b->data_vencimento_titulo_transacao,4,4)?>
                        </p>
                        <p style="display: inline-block; margin-left: 2cm;">
                            <b>Valor Título: </b> R$  <?=number_format($b->saldo_titulo_transacao,2,",",".")?>
                        </p>
                        <br>
                        <?php 
                            $busca_devedor = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$b->numero_protocolo_cartorio_transacao' ");
                            $busca_devedor->execute();
                            $linhas_devedor = $busca_devedor->fetchAll(PDO::FETCH_OBJ);
                            foreach ($linhas_devedor as $ld):
                             ?> 
                        <p style="display: inline-block; margin-left: 10px;margin-top: -10px;">
                        <b>Devedor:</b> <?=mb_strtoupper($ld->nome_devedor_transacao)?>
                        </p>
                        <p style="display: inline-block; margin-left: 4cm;margin-top: -10px;">
                         <b>CPF/CNPJ: </b> <b><?=$ld->documento_devedor_transacao?> <?=molda_cpf($ld->numero_identificacao_devedor_transacao)?></b>
                        </p><br>
                        <?php endforeach ?>
                            
                             <p style="display: inline-block; margin-left: 10px;">
                                <b>Credor: </b> <?=mb_strtoupper($b->nome_sacador_vendedor_transacao)?>
                             </p>
                             <p style="display: inline-block; margin-left: 4cm;">
                         <b>Protocolo: </b> <?=$b->numero_protocolo_cartorio_transacao?> 
                        </p>
                        <br>


                        <table style="border:none; width: 100%">
                            <tr style="border:none">
                                <td style="border:1px solid black; font-weight: bold; text-align: center">SELOS USADOS</td>
                                <td style="border:1px solid black; font-weight: bold; text-align: center"> VALOR EMOLS</td>
                                <td style="border:1px solid black; font-weight: bold; text-align: center">VALOR TOTAL</td>
                            </tr>

                            <tr style="border:none">
                                
                                <td style='border:1px solid black; text-align:center'>                    

                                <?php if ($pagamento_diferido == 'sim'):
                                $busca_selos_diferidos = $pdo->prepare("SELECT * FROM auditoria where strTipoSelo ='CPL' AND Ordem = '$b->numero_protocolo_cartorio_transacao'");
                                $busca_selos_diferidos->execute();
                                $linha_diferido = $busca_selos_diferidos->fetchAll(PDO::FETCH_OBJ); 
                                foreach ($linha_diferido as $l):?>
                                <?=$l->strSelo?><br>

                                <?php endforeach; endif ?>
                                </td>


                                <td style='border:1px solid black; text-align:center'>
                                      <?php if ($b->status == 'PAGO' || $b->status == 'RETIRADO'):?>
                                                        <?php 
                                                        #setando o valor do ato ------------------------------------------------------------------          
                                                        if ($b->saldo_titulo_transacao <= 51.68) {
                                                        $ato_pagamento = '17.4.1';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 51.69 && $b->saldo_titulo_transacao <= 165.39) {
                                                        $ato_pagamento = '17.4.2';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 165.40 && $b->saldo_titulo_transacao <= 310.10) {
                                                        $ato_pagamento = '17.4.3';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 310.11 && $b->saldo_titulo_transacao <= 620.20) {
                                                        $ato_pagamento = '17.4.4';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 620.21 && $b->saldo_titulo_transacao <= 1240.40) {
                                                        $ato_pagamento = '17.4.5';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 1240.41 && $b->saldo_titulo_transacao <= 2377.44) {
                                                        $ato_pagamento = '17.4.6';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 2377.44 && $b->saldo_titulo_transacao <= 3514.47) {
                                                        $ato_pagamento = '17.4.7';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 3514.48 && $b->saldo_titulo_transacao <= 4651.51) {
                                                        $ato_pagamento = '17.4.8';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 4651.52 && $b->saldo_titulo_transacao <= 5788.54) {
                                                        $ato_pagamento = '17.4.9';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 5788.55 && $b->saldo_titulo_transacao <= 6925.57) {
                                                        $ato_pagamento = '17.4.10';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 6925.58 && $b->saldo_titulo_transacao <= 8062.61) {
                                                        $ato_pagamento = '17.4.11';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 8062.62 && $b->saldo_titulo_transacao <= 9199.64) {
                                                        $ato_pagamento = '17.4.12';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 9199.65 && $b->saldo_titulo_transacao <= 10336.68) {
                                                        $ato_pagamento = '17.4.13';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 10336.69 && $b->saldo_titulo_transacao <= 20673.36) {
                                                        $ato_pagamento = '17.4.14';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 20673.37 && $b->saldo_titulo_transacao <= 41346.72) {
                                                        $ato_pagamento = '17.4.15';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao >  41346.73 && $b->saldo_titulo_transacao <= 62020.07) {
                                                        $ato_pagamento = '17.4.16';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 62020.08 && $b->saldo_titulo_transacao <= 82693.43) {
                                                        $ato_pagamento = '17.4.17';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 82693.44 && $b->saldo_titulo_transacao <= 103366.79) {
                                                        $ato_pagamento = '17.4.18';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 103366.80 && $b->saldo_titulo_transacao <= 206733.58) {
                                                        $ato_pagamento = '17.4.19';
                                                        }
                                                        elseif ($b->saldo_titulo_transacao > 206733.59) {
                                                        $ato_pagamento = '17.4.20';
                                                        }
                                                        #-----------------------------------------------------------------------------------------
                                                        $busca_valor_pagamento = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '$ato_pagamento'");
                                                        $busca_valor_pagamento->execute();
                                                        $d = $busca_valor_pagamento->fetch(PDO::FETCH_ASSOC);
                                                        $valor_pagamento = $d['monValor'] + $d['monValorFerc'];     
                                                        ?>




                                                        <?php if ($b->localidade_titulo != '2'): $conducao_soma = descrimina_emols('17.10.1',$busca_devedor->rowCount());  ?>

                                                        <?php else: $conducao_soma = descrimina_emols('17.10.2',$busca_devedor->rowCount());?>

                                                        <?php endif ?>
                                                        <?php if ($busca_devedor->rowCount()>1){$quantidade_arquivamentos = 3;}else{$quantidade_arquivamentos =2;} ?>

                                                        <?php if (!isset($_GET['semcert'])) :  ?>

                                                        <?php endif ?>
                                                        <?php $soma_emols =  $valor_pagamento+$conducao_soma+descrimina_emols('17.2',$busca_devedor->rowCount())+descrimina_emols('17.9',$quantidade_arquivamentos) +descrimina_emols('17.5.1',1);

                                                        if ($b->data_edital!='') {

                                                        $soma_emols =  $valor_pagamento+$conducao_soma+descrimina_emols('17.2',$busca_devedor->rowCount())+descrimina_emols('17.9',$quantidade_arquivamentos) +descrimina_emols('17.5.1',1)+descrimina_emols('17.2',1);
                                                        }
                                                        else{
                                                        $soma_emols =  $valor_pagamento+$conducao_soma+descrimina_emols('17.2',$busca_devedor->rowCount())+descrimina_emols('17.9',$quantidade_arquivamentos) +descrimina_emols('17.5.1',1);
                                                        }
                                                        ?>          
                                                        <p style="font-weight: bold">R$ <?=number_format($soma_emols,2)?></p>  
    
<?php endif ?>


                                </td>
                                <td style='border:1px solid black; text-align:center'> <p style="font-weight: bold">R$ <?=number_format($soma_emols+$b->saldo_titulo_transacao,2)?></p>  </td>
                            </tr>

                        </table>









  


                    </div>
                 
                    <br>




           <?php if ($count ==2): ?>
          <div style="page-break-after: always;"></div>
            <img style="max-width: 100%; margin-top: 5px;" src="../bd_INSERTS/cabecalhos/CAPA.jpg">
          <?php $count = 0;endif ?> 

<?php $count++;endforeach ?>
<?php endforeach ?>






</textarea>


</form>
</div>
</div>





                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

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
<!-- Custom Js -->
<script src="../../../js/admin.js"></script>
<script src="../../../js/pages/tables/jquery-datatable.js"></script>

<!-- Demo Js -->
<script src="../../../js/demo.js"></script>
<script src="../../../plugins/ajax/screen.js"></script>

<!-- TinyMCE -->
<script src="../../../js/pages/forms/editors.js"></script>
<script src="../../../plugins/tinymce/tinymce.js"></script>


<script>
  tinymce.init({
  selector: 'textarea',
    language: 'pt_BR',
    language_url : '../../../plugins/tinymce/langs/pt_BR.js',
    theme: 'modern',
    plugins: [
            'advlist autolink lists link image charmap print preview hr anchor pagebreak',
            'searchreplace wordcount visualblocks visualchars code fullscreen',
            'insertdatetime media nonbreaking save table contextmenu directionality',
            'emoticons template paste textcolor colorpicker textpattern imagetools'
        ],
        toolbar1: 'insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image',
       toolbar2: 'print preview media | forecolor backcolor emoticons | fontsizeselect fontselect',
      font_formats: 'Arial=arial,helvetica,sans-serif;Courier New=courier new,courier,monospace;Arial Black=arial black,avant garde;Indie Flower=indie flower, cursive;Times New Roman=times new roman,times;',
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
</body>
</html>