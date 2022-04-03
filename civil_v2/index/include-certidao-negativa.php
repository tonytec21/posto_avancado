<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title></title>
	<style type="text/css">


  body{ 
    padding-left: 2cm;
    padding-right: 1cm;
    padding-top: 4cm;
  }
  
  @media print{
    #conteudogeralcertidao{
      width: 18.1cm;
      max-width: 18.1cm;
      max-height: 21.5cm;
      padding-top: 4cm;
      padding-right: 1.5cm!important;
      font-size: 120%;
    }
    #imgfuncaoqr{
      width: 85px!important;
      margin-top: 2px!important;
    }
    .placeholder{
      display: none;
    }
    #versofolha{
      margin-top: 1cm;
    }
  }
  
  .row{
    width: 100%;
    display: table;
  }
  legend{
    font-size: 8px;
    font-weight: bold;
  }
  fieldset{
    border: 1px solid rgba(0,0,0,.9);
    margin-bottom: 1px;
  }
  .left{
    float: left;
    font-size: 78%!important;
    font-weight: bold;
    padding-left: 2px;
  }
  .right{
    float: right;
    font-size: 78%!important;
    font-weight: bold;
    text-align: center;
    padding-right: 8px;
  }
  table{
    border: none!important;
  }
  tr{
    border: none;
  }
  td{
    border: 1px solid rgba(0, 0, 0, .5)!important;
  }
  th{
    border: 1px solid rgba(0, 0, 0, .5)!important;
  }

</style>
</head>
<body>
<p style="text-align:justify">



           Eu, <?=str_replace("<br>", ", ", $ass_funcionario)?> <?php 
           $s = PESQUISA_ALL('cadastroserventia'); foreach ($s as $s):?>

           <!--?=$s->strTituloServentia?--> <?=$_SESSION['funcao']?>, desta cidade de 
           <?php  
           $g = PESQUISA_ALL_ID('uf_cidade', $s->intUFcidade);
           foreach ($g as $g):?>
            <?=$g->cidade.'/'.$g->uf?>
            <?php endforeach ?>,

          <?php endforeach ?>
          por nomeação legal na forma da lei, 8.935/94
          CERTIFICO, autorizado por lei e a requerimento verbal de pessoa
          interessada e para que produza seus devidos e legais efeitos, que dando buscas
          nos livros de registro de 

          <?php if ($_POST['TIPOBUSCACERTIDAO'] == '1'): ?>
            NASCIMENTOS
          <?php elseif ($_POST['TIPOBUSCACERTIDAO'] == '2'): ?>
            CASAMENTOS
          <?php elseif ($_POST['TIPOBUSCACERTIDAO'] == '3'): ?>
            ÓBITOS
          <?php elseif ($_POST['TIPOBUSCACERTIDAO'] == '4'): ?>
            LIVRO DE REGISTROS ESPECIAIS
          <?php endif ?>

           a cargo desta serventia, verifiquei não
          figurar registro em nome de <?=strtoupper($_POST['NOMEPARTE'])?>, <?=$_POST['QUALIFICACAOPARTE']?>, CPF de número <?=strtoupper($_POST['CPFPARTE'])?>.<br>
          O referido é verdade dou fé.  
          </p>

        <br><br>
        <div class="left">
          <?php $serv = PESQUISA_ALL('cadastroserventia');
          foreach ($serv as $serv): ?>  

            <?=$serv->strRazaoSocial?>  <br>
            <?=$serv->strTituloServentia?> <br>
            <?php $c = PESQUISA_ALL_ID('uf_cidade',$serv->intUFcidade); foreach ($c as $c) {
              echo $c->cidade.'/'.$c->uf;
            } ?><br>
            <?=$serv->strLogradouro.' Nº '.$serv->strNumero?><br>
            <?=$serv->strTelefone1?><br>
            <?=$serv->strEmail?>
          <?php endforeach ?> 
        </div>

        <div class="right">
          O conteúdo da certidão é verdadeiro Dou Fé <br>

          <?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
          $u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
          foreach ($u as $u):?> 

            <?=$u->cidade?>/<?=$u->uf?>

            <?php
            $data = date('Y-m-d') ;
            $novaDataRegistro = explode("-", $data);
            echo $novaDataRegistro[2];
          /*
          if ($novaDataRegistro[2] == '01' || $novaDataRegistro[1] == '1') {
            echo " Um de  ";
          }elseif ($novaDataRegistro[2] == '02' || $novaDataRegistro[1] == '2') {
            echo " Dois de ";
          } elseif ($novaDataRegistro[2] == '03' || $novaDataRegistro[1] == '3') {
            echo " Três ";
          } elseif ($novaDataRegistro[2] == '04' || $novaDataRegistro[1] == '4') {
            echo " Quatro de ";
          } elseif ($novaDataRegistro[2] == '05' || $novaDataRegistro[1] == '5') {
            echo " Cinco de ";
          } elseif ($novaDataRegistro[2] == '06' || $novaDataRegistro[1] == '6') {
            echo " Seis de ";
          } elseif ($novaDataRegistro[2] == '07' || $novaDataRegistro[1] == '7') {
            echo " Sete de ";
          } elseif ($novaDataRegistro[2] == '08' || $novaDataRegistro[1] == '8') {
            echo " Oito de ";
          } elseif ($novaDataRegistro[2] == '09' || $novaDataRegistro[1] == '9') {
            echo " Nove de ";
          } else {echo  ucfirst(GExtenso::numero($novaDataRegistro[2]));}
          //Será exibido na tela a data: 16/02/2015
          // . "de".$novaDataRegistro[1] . " de " . GExtenso::numero ($novaDataRegistro[0])
          */
          if ($novaDataRegistro[1] == '01' || $novaDataRegistro[1] == '1') {
            echo " de Janeiro de ";
          }elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
            echo " de Fevereiro de ";
          } elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
            echo " de Março de ";
          } elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
            echo " de Abril de ";
          } elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
            echo " de Maio de ";
          } elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
            echo " de Junho de ";
          } elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
            echo " de Julho de ";
          } elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
            echo " de Agosto de ";
          } elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
            echo " de Setembro de ";
          } elseif ($novaDataRegistro[1] == '10') {
            echo " de Outubro de";
          } elseif ($novaDataRegistro[1] == '11') {
            echo " de Novembro de ";
          } elseif ($novaDataRegistro[1] == '12') {
            echo " de Dezembro de ";
          } else {
            echo "Não definido";
          }

          echo $novaDataRegistro[0];

        ?>. 
      <?php endforeach; endforeach ?>
      <br><br>
      _______________________________________ <br>
      <?=strtoupper($_SESSION['nome'])?><br>
      <?=$_SESSION['funcao']?>
    </div>
</body>
</html>