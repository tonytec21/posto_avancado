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

<?php 
$k = PESQUISA_ALL('livro_protestos');
foreach ($k as $k):

 ?>





<?php 
$busca_matricula = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$k->assento' LIMIT 1");
$busca_matricula->execute();
$linhas = $busca_matricula->fetchAll(PDO::FETCH_OBJ);
 ?>
 <?php   foreach($linhas as $b):

    #setando o valor do ato ------------------------------------------------------------------          
                  if ($b->saldo_titulo_transacao <= 51.68) {
                  $ato_protesto = '17.1.1';
                  }
                  elseif ($b->saldo_titulo_transacao > 51.69 && $b->saldo_titulo_transacao <= 165.39) {
                  $ato_protesto = '17.1.2';
                  }
                  elseif ($b->saldo_titulo_transacao > 165.40 && $b->saldo_titulo_transacao <= 310.10) {
                  $ato_protesto = '17.1.3';
                  }
                  elseif ($b->saldo_titulo_transacao > 310.11 && $b->saldo_titulo_transacao <= 620.20) {
                  $ato_protesto = '17.1.4';
                  }
                  elseif ($b->saldo_titulo_transacao > 620.21 && $b->saldo_titulo_transacao <= 1240.40) {
                  $ato_protesto = '17.1.5';
                  }
                  elseif ($b->saldo_titulo_transacao > 1240.41 && $b->saldo_titulo_transacao <= 2377.44) {
                  $ato_protesto = '17.1.6';
                  }
                  elseif ($b->saldo_titulo_transacao > 2377.44 && $b->saldo_titulo_transacao <= 3514.47) {
                  $ato_protesto = '17.1.7';
                  }
                  elseif ($b->saldo_titulo_transacao > 3514.48 && $b->saldo_titulo_transacao <= 4651.51) {
                  $ato_protesto = '17.1.8';
                  }
                  elseif ($b->saldo_titulo_transacao > 4651.52 && $b->saldo_titulo_transacao <= 5788.54) {
                  $ato_protesto = '17.1.9';
                  }
                  elseif ($b->saldo_titulo_transacao > 5788.55 && $b->saldo_titulo_transacao <= 6925.57) {
                  $ato_protesto = '17.1.10';
                  }
                  elseif ($b->saldo_titulo_transacao > 6925.58 && $b->saldo_titulo_transacao <= 8062.61) {
                  $ato_protesto = '17.1.11';
                  }
                  elseif ($b->saldo_titulo_transacao > 8062.62 && $b->saldo_titulo_transacao <= 9199.64) {
                  $ato_protesto = '17.1.12';
                  }
                  elseif ($b->saldo_titulo_transacao > 9199.65 && $b->saldo_titulo_transacao <= 10336.68) {
                  $ato_protesto = '17.1.13';
                  }
                  elseif ($b->saldo_titulo_transacao > 10336.69 && $b->saldo_titulo_transacao <= 20673.36) {
                  $ato_protesto = '17.1.14';
                  }
                  elseif ($b->saldo_titulo_transacao > 20673.37 && $b->saldo_titulo_transacao <= 41346.72) {
                  $ato_protesto = '17.1.15';
                  }
                  elseif ($b->saldo_titulo_transacao >  41346.73 && $b->saldo_titulo_transacao <= 62020.07) {
                  $ato_protesto = '17.1.16';
                  }
                  elseif ($b->saldo_titulo_transacao > 62020.08 && $b->saldo_titulo_transacao <= 82693.43) {
                  $ato_protesto = '17.1.17';
                  }
                  elseif ($b->saldo_titulo_transacao > 82693.44 && $b->saldo_titulo_transacao <= 103366.79) {
                  $ato_protesto = '17.1.18';
                  }
                  elseif ($b->saldo_titulo_transacao > 103366.80 && $b->saldo_titulo_transacao <= 206733.58) {
                  $ato_protesto = '17.1.19';
                  }
                  elseif ($b->saldo_titulo_transacao > 206733.59) {
                  $ato_protesto = '17.1.20';
                  }
            #-----------------------------------------------------------------------------------------   
$pesquisa_apresentante = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$b->numero_codigo_portador_transacao'");
      $pesquisa_apresentante->execute();
      $l = $pesquisa_apresentante->fetchAll(PDO::FETCH_OBJ);
      foreach ($l as $l) {
      $pagamento_diferido = $l->pagamento_diferido;
      }
      ?>
      <div id="tudao" style="<?php if ($b->status == 'CANCELADO'): ?>
        background:url('../../../images/CANCELADO.png');
        background-repeat: repeat;
      <?php endif ?>">


          <img style="max-width: 100%;margin-top: 0px;" src="../bd_INSERTS/cabecalhos/CAPA.jpg">
          
      <table style="width: 100%; border-radius: 5px; border: 2px solid black; padding-bottom:10px; ">
          
              <tr style="border: 1px solid black;">
              <th style="border:none;">INSTRUMENTO DE PROTESTO DE</th>
              <th style="border:none;">PROTESTO Nº</th>
              <th style="border:none;">LIVRO/ Nº SEQ</th>
              <th style="border:none;">FOLHA</th>
            </tr>
          
            <tr > 
              <td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">
              <?php 

              $busca_livro = $pdo->prepare("SELECT * FROM livro_protestos where assento = '$b->numero_protocolo_cartorio_transacao'");
              $busca_livro->execute();
              $bliv = $busca_livro->fetch(PDO::FETCH_ASSOC);
              $livro_titulo = $bliv['identifcadorLivro'];
              $folha_titulo = $bliv['PaginaLivro'];
              $termo_titulo = $bliv['LivroInicial'];

              $busca_especie = $pdo->prepare("SELECT * FROM especie_protesto where codigo = '$b->especie_titulo_transacao'"); 
              $busca_especie->execute();
              $be = $busca_especie->fetch(PDO::FETCH_ASSOC);
              echo $be['descricao_especie'];

              ?>
              </td>
              <?php $busca_livro = $pdo->prepare("SELECT * FROM livro_protestos where assento = '$b->numero_protocolo_cartorio_transacao'");$busca_livro->execute(); $blv = $busca_livro->fetch(PDO::FETCH_ASSOC); ?>
              <td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;"><?=$blv['LivroInicial']?></td>
              <td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;"><?=$blv['identifcadorLivro']?></td>
              <td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;"><?=$blv['PaginaLivro']?></td>
              </tr>
<tr>
<td style="border:none;font-weight: bold;text-transform: uppercase;">       
<p style="">DADO A FAVOR DE : <?=$b->nome_sacador_vendedor_transacao?></p>
<p style="">  CPF/CNPJ: <?=$b->documento_sacador_transacao?></p>

<?php $pesquisa_apresentante = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$b->numero_codigo_portador_transacao'");
            $pesquisa_apresentante->execute();
            $l = $pesquisa_apresentante->fetchAll(PDO::FETCH_OBJ);
            foreach ($l as $l) {
            $apresentante = $l->nome;
            }
             ?>
<p style="">  APRESENTANTE: <?=$apresentante?></p>
<p style="">  DATA DE APRESENTAÇÃO: <?=substr($b->data_protocolo_transacao,0,2).'/'.substr($b->data_protocolo_transacao,2,2).'/'.substr($b->data_protocolo_transacao,4,4)?></p>






<p style="">PROTESTADO POR FALTA DE: ( <?php if ($b->motivo_titulo == '2'){echo "X";} ?> ) Pagamento, ( <?php if ($b->motivo_titulo == '1'){echo "X";} ?> ) Aceite, ( <?php if ($b->motivo_titulo == '3'){echo "X";} ?> ) Devolução </p>

<?php 

$teste_data_ocorrencia = explode("-",$b->data_ocorrencia_transacao);

if (count($teste_data_ocorrencia)>1) {
$data_ocorrencia_transacao = $b->data_ocorrencia_transacao;
}
else{
$data_ocorrencia_transacao = substr($b->data_ocorrencia_transacao,4,4).'-'.substr($b->data_ocorrencia_transacao,2,2).'-'.substr($b->data_ocorrencia_transacao,0,2); 
}


 ?>

<p style="">DATA DO PROTESTO: <?=date('d/m/Y', strtotime($data_ocorrencia_transacao))?> </p>
<p style="">PROTOCOLO Nº: <?=$b->numero_protocolo_cartorio_transacao?></p>
</td>
</tr>
          </table>

<p style="text-align: center; margin-bottom: 10px;">TÍTULO ANEXO AO PRESENTE (CÓPIA ARQUIVADA NESTE TABELIONATO)</p>



<table style="width: 100%; border-radius: 5px; border: 2px solid black; padding-bottom:10px;  ">
<tr>
<td style="border:none;font-weight: bold;text-transform: uppercase;">
<p>ESPÉCIE: <?php $busca_especie = $pdo->prepare("SELECT * FROM especie_protesto where codigo = '$b->especie_titulo_transacao'"); 
              $busca_especie->execute();
              $be = $busca_especie->fetch(PDO::FETCH_ASSOC);
              echo mb_strtoupper($be['descricao_especie']);

              ?></p>
<p> TÍTULO Nº:  <?=$b->numero_titulo_transacao?></p>
<p> VENCIMENTO: <?=substr($b->data_vencimento_titulo_transacao,0,2).'/'.substr($b->data_vencimento_titulo_transacao,2,2).'/'.substr($b->data_vencimento_titulo_transacao,4,4)?></p> 
<p>Nº DO TÍTULO NO BANCO:<?=$b->nosso_numero_transacao?> </p>
<p> VALOR DO TÍTULO:  <?=number_format($b->saldo_titulo_transacao,2,",",".")?></p>
<p> DATA DE EMISSÃO:  <?=substr($b->data_emisao_titulo_transacao,0,2).'/'.substr($b->data_emisao_titulo_transacao,2,2).'/'.substr($b->data_emisao_titulo_transacao,4,4)?></p>
<p> ENDOSSO:  
<?php if ($b->tipo_endosso_transacao =='M' || $b->tipo_endosso_transacao == 'POR MANDATO'): ?>
  MANDATO
<?php elseif ($b->tipo_endosso_transacao =='T' || $b->tipo_endosso_transacao == 'TRANSLATIVO'  ): ?>  
TRANSLATIVO
<?php elseif ($b->tipo_endosso_transacao == 'NIHIL'): ?>
  NIHIL
<?php else: ?>
NÃO SE APLICA
<?php endif ?>


</p>
<p>AG/CODIGO DO CEDENTE: <?=$b->agencia_operadora_transaca?></p>
<p> VALOR PROTESTADO: R$ <?=number_format($b->saldo_titulo_transacao,2,",",".")?> </p>
<p> VALOR POR EXTENSO:  <?=Monetary::numberToExt($b->saldo_titulo_transacao);?></p>
</td>
</tr>
</table>


<br><br>
<table style="width: 100%; border-radius: 5px; border: 2px solid black; padding-bottom:10px; margin-top: -15px;">
<tr>
<td style="border:none;font-weight: bold;text-transform: uppercase;">
<p>SACADOR: <?=$b->nome_sacador_vendedor_transacao?></p>
<p> CPF/CNPJ: <?=$b->documento_sacador_transacao?></p>

<?php 
              $busca_devedor = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$b->numero_protocolo_cartorio_transacao' ");
              $busca_devedor->execute();
              $linhas_devedor = $busca_devedor->fetchAll(PDO::FETCH_OBJ);
              foreach ($linhas_devedor as $ld):
               ?>

<p> DEVEDOR: <?=$ld->nome_devedor_transacao?></p>
<p>CPF/CNPJ:<b><?=$ld->documento_devedor_transacao?> <?=molda_cpf($ld->numero_identificacao_devedor_transacao)?></b></p>
<p> ENDEREÇO: <?=rtrim($ld->endereco_devedor_transacao)?>, <?=$ld->bairro_devedor_transacao?> -
<?=$ld->cidade_devedor_transacao?>/
<?=$ld->uf_devedor_transacao?> - 
<?=$ld->cep_devedor_transacao?></p> <br>
<?php endforeach ?>


</td>
</tr>
</table>
<br>
<?php if ($busca_devedor->rowCount()>1){$quantidade_arquivamentos = 4;}else{$quantidade_arquivamentos =3;} ?>




<br>
<table style="width: 100%; border-radius: 5px; border: 2px solid black; padding-bottom:-40px;margin-bottom: -10px ">
<tr>
  <td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">CIDADE <br> <?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
                    $u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
                    foreach ($u as $u):?> 

                    <?=$u->cidade?>/<?=$u->uf?><?php endforeach; endforeach ?>
</td>

<?php 
if ($b->localidade_titulo != '2') {
$atocond = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.10.1' ");
$atocond->execute();
$at = $atocond->fetchAll(PDO::FETCH_OBJ);
foreach ($at as $at) {
$valor_cond = $at->monValor;
$valor_cond_ferc = $at->monValorFerc;
}
$atoconducao = '17.10.1';
 }
 else{
 $atocond = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.10.2' ");
$atocond->execute();
$at = $atocond->fetchAll(PDO::FETCH_OBJ);
foreach ($at as $at) {
$valor_cond = $at->monValor;
$valor_cond_ferc = $at->monValorFerc;
}
  $atoconducao = '17.10.2';
 } 

$atoprotesto = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '$ato_protesto' ");
$atoprotesto->execute();
$at = $atoprotesto->fetchAll(PDO::FETCH_OBJ);
foreach ($at as $at) {
$valor_ato = $at->monValor;
$valor_ato_ferc = $at->monValorFerc;
}


$atocertidao = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.5.1' ");
$atocertidao->execute();
$at = $atocertidao->fetchAll(PDO::FETCH_OBJ);
foreach ($at as $at) {
if (!isset($_GET['semcert'])) { 
$valor_cert = $at->monValor;
$valor_cert_ferc = $at->monValorFerc;
}
else{
$valor_cert = 0;
$valor_cert_ferc = 0; 
}
}


$atointimacao = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.2' ");
$atointimacao->execute();
$at = $atointimacao->fetchAll(PDO::FETCH_OBJ);
foreach ($at as $at) {
$valor_inti = $at->monValor;
$valor_inti_ferc = $at->monValorFerc;

if ($b->data_edital!='') {
$valor_inti = $at->monValor*2;
$valor_inti_ferc = $at->monValorFerc*2;
}


}


$atoarquivamento = $pdo->prepare("SELECT * FROM ato_novo where strCodigoLei = '17.9' ");
$atoarquivamento->execute();
$at = $atoarquivamento->fetchAll(PDO::FETCH_OBJ);
foreach ($at as $at) {
$valor_arq = $at->monValor;
$valor_arq_ferc = $at->monValorFerc;
}

$soma =$valor_cond*$busca_devedor->rowCount()+$valor_cond_ferc*$busca_devedor->rowCount()+$valor_cert+$valor_cert_ferc+$valor_inti*$busca_devedor->rowCount()+$valor_inti_ferc*$busca_devedor->rowCount()+$valor_ato+$valor_ato_ferc+$valor_arq*$quantidade_arquivamentos+$valor_arq_ferc*$quantidade_arquivamentos;
$soma_total_ferc =$valor_ato_ferc+$valor_cert_ferc+$valor_inti_ferc*$busca_devedor->rowCount()+$valor_cond_ferc*$busca_devedor->rowCount()+$valor_arq_ferc*$quantidade_arquivamentos;

 ?>



<?php if ($pagamento_diferido != 'sim'): ?>
  <td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">CUSTAS (<?=$ato_protesto?>)
    <br><?=number_format($valor_ato,2)?> + <?=number_format($valor_ato_ferc,2)?>

  </td>
  
  <td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">INTIMACAO/EDITAL <br>(17.2) <br><?=$valor_inti?> + <?=$valor_inti_ferc?></td>
  
  
  
  <td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">CERTIDAO (17.5.1) <br><?=number_format($valor_cert,2)?> + <?=number_format($valor_cert_ferc,2)?></td>
  
  <td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">CONDUCAO/ARQUIVAMENTO (<?=$atoconducao?>)/17.9 <br><?=$valor_cond?> +
    <?=$valor_cond_ferc?> + <?=$valor_arq?> + <?=$valor_arq_ferc?> </td>
  <td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">FERC <br> <?=number_format($soma_total_ferc,2)?></td>
  <td style="border: 1px solid black; text-align: center; padding: 5px; border-radius: 4px;">TOTAL <br> 
    

    <?=number_format($soma,2)?></td>
<?php endif ?>

</tr>
</table>  

<div style="page-break-after: always;"></div>
<?php endforeach ?>

<?php  endforeach ?>

</table>
</div>









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