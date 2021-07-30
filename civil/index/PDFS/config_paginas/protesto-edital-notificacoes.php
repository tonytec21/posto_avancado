
<!DOCTYPE html>
<?php include('../../../controller/db_functions.php');
$pdo = conectar();
$id = explode("-", $_GET['id']);



$serv = PESQUISA_ALL_ID('cadastroserventia',1);
foreach($serv as $s){
	$endereco_serventia = $s->strLogradouro.' Nº '.$s->strNumero.' - '.$s->strBairro.' CEP: '.$s->strCEP;
	$titular = $s->strTituloServentia;
}



if (!isset($token)) {
$token= '';
}

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
	<title>Notificações Protesto</title>
<style type="text/css">
	@page {

  margin-top: 0;
}

.center{
	text-align: center;

}
.all{

	width: 100%;
}
fieldset{
	padding: 8px;
	font-size: 80%;
}
legend{
	font-size: 60%;
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
.right{
	float: right;
	font-size: 70%;
	text-align: center;
}
body{font-size: 11px;font-family: "Arial"}
</style>
</head>

<body>


 	<?php 
for ($i=0; $i <count($id) ; $i++) :
if (isset($id[$i])) {
$id_unic = $id[$i];	
}

$busca_matricula = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE ID = '$id_unic' ");
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
                  
      if ($pagamento_diferido == 'sim') {
        $selo = 'DIFERIDO';
        unset($token);  
        echo '
        <div style="position: absolute;width: 100px; margin-left: 650px;border: 1px solid silver; padding: 50px;">
        <img src="../../../images/brasao_ma.png" style="width: 40%;margin-left:28px; margin-top:-40px; ">
        <h4 style="margin-bottom:-15px;min-width:160%;margin-left:-33px;text-align:center;margin-top:0px">EMOLUMENTOS DIFERIDOS</h4>
        <h5 style="margin-bottom:-15px;min-width:200%;margin-left:-52px;text-align:center;">Documento dispensado do Selo de fiscalização</h5>
        <h5 style="margin-bottom:-40px;min-width:200%;margin-left:-50px;text-align:center;">Provimentos 04/12, 21/15 e 36/17, da CGJ/MA</h5>
        </div>
        ';
        }
      else{         

      if ($token !='') {


      #PROXIMO PASSO ENVIANDO A SOLICITAÇÃO DO SELO: ===============================================================================================
                  $ato_praticado = '17.2';
                  $escrevente = $_SESSION['nome'];
                  $isento = 'true';
                  $motivo_isento='Teste';
                 $nomeparte1 =$b->nome_sacador_vendedor_transacao;
                  $nomeparte2 =$b->nome_devedor_transacao;
                  $nomeparte3 ='';
                  $docparte3='';
                  $nomeparte4 ='';
                  $docparte4='';
                  $livro ='';
                  $folha='';


                                  $ConteudoPOST = '{
                                  "ato" :{
                                  	"codigo":"17.2",
                                  	"codigoTabelaCusta":"'.$_SESSION['tabelavigente'].'"
                                  	},
                                   "natureza":{
                                   	"tipo":"0"
                                   },
                                   "partes": {
                                  "nomesPartes":"X",
                                  "parteAto":[
                                  {
                                  "nome":"'.$nomeparte1.'"
                                  },
                                  {
                                  "nome":"'.$nomeparte2.'"
                                  }
                                  ]},
                                  "selo":{
                                  "escrevente":"'.$escrevente.'",
                                  "protocolo": "'.$b->numero_protocolo_cartorio_transacao.'",
                                  "valorTitulo": "'.$b->saldo_titulo_transacao.'"
                                  }

                                  

                                  }';
              
                          $ConteudoCabecalho = [
                              'Authorization: Bearer'.$token,
                              "Content-Type: application/json"
                              
                          ];
                          
                       

                          $handler = curl_init($_SESSION['urlselodigital'].'protesto/intimacao');

                          curl_setopt_array($handler, [

                          CURLOPT_RETURNTRANSFER => true,
                          CURLOPT_ENCODING => "",
                          CURLOPT_MAXREDIRS => 10,
                          CURLOPT_SSL_VERIFYHOST => 0,
                          CURLOPT_SSL_VERIFYPEER => 0,
                          CURLOPT_TIMEOUT => 0,
                          CURLOPT_FOLLOWLOCATION => false,
                          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                          CURLOPT_CUSTOMREQUEST => "POST",
                          CURLOPT_POSTFIELDS =>"$ConteudoPOST",
                          CURLOPT_HTTPHEADER => array(
                          "Authorization: Bearer $token",
                          "Content-Type: application/json"
                          ),
                          ]);

                          $resp = curl_exec($handler);
                          $resp = json_decode($resp, true);
                          #var_dump($resp);
                          #echo curl_error($handler);
                          $erro = curl_error($handler);
                          if (isset($resp['status'])) {
                    #die('<span style="color:red">'.$resp['status'].': '.$resp['message'].' - '.$resp['details'][0].'</span>');
                    $_SESSION['erro'] = $resp['status'].': '.$resp['message'].' - '.$resp['details'][0];
                    header('Location: ' . $_SERVER['HTTP_REFERER']);
                    break;
                  }
                          $SELO = $resp['resumos'][0]['numeroSelo'].'<br>';
                          $TEXTOSELO = $resp['resumos'][0]['textoSelo'].'<br>';
                          $QRCODE = $resp['resumos'][0]['valorQrCode'];
                          $RETORNO = json_encode($resp['resumos'][0]);
                          $_SESSION['SELOOLD'] =$SELO;
                          $_SESSION['sucesso'] = $SELO;
                          #echo $resp['resumos'][0]['dataGeracao'].'<br>';
                          #echo $resp['resumos'][0]['numeroSelo'].'<br>';
                          #echo $resp['resumos'][0]['numeroSelo'].'<br>';
                          #$info = curl_getinfo($handler);
                          #var_dump($info);
                          #echo $info['total_time'] . ' seconds to send a request to ' . $info['url'];



                
                if ($erro!='') {
                              $erro;
                          }
                
                  

                         
                          

                          else{
                
                #parte de auditoria:
                $LIVRO = '0';
                $FOLHA = '0';
                $TERMO = '0';
                $ATO = '17.2';
                $TIPOPAPEL = '0';
                $NUMEROPAPEL = '0';  
                $funcionario = $_SESSION['nome'];
                $insert_auditoria = $pdo->prepare("INSERT into auditoria values (NULL,'$funcionario','EDITAL_INTIMACAO','5','1','$SELO',CURRENT_TIMESTAMP,'GER','$ATO','$LIVRO','$FOLHA','$TERMO','$TIPOPAPEL','$NUMEROPAPEL','$RETORNO')");
                UPDATE_CAMPO_ID('protesto_automatico_transacao','RETORNOSELODIGITAL',strip_tags($RETORNO),$id_unic);
                $insert_auditoria->execute();
              
                         
                          $_POST['SELO2'] = $SELO;  
                
                

                }
      }
      
else{
  $SELO = '0';
}


}

 	?>


 			<?php if ($pagamento_diferido != 'sim'): ?>
 					<div style="position: absolute;width: 50px; margin-left: 680px;width: 200px;"> 
 					<?php 
 					
					$retorno = json_decode($b->RETORNOSELODIGITAL,true);
					$qr = $retorno['valorQrCode'];
					$textoselo = $retorno['textoSelo'];

 					 ?>	

 					 <?php

					include_once('../../../plugins/phpqrcode/qrlib.php');
					$img_local = "qrimagens/";
					$img_nome = $b->ID.'edital.png';
					$nome = $img_local.$img_nome;

					$conteudo = $qr;
					QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


					echo '<img style="max-width:100%; margin-left:40px;" src="'.$nome.'" />';
					?>
					<p style="font-weight: bold; font-size: 6px;max-width: 100%;text-align: center"><?=$textoselo?></p>
				</div>
 				<?php endif ?>
					
					<img style="max-width: 100%; margin-top: 5px;" src="../bd_INSERTS/cabecalhos/CAPA.jpg">
					<h2 style="text-align: center">EDITAL DE INTIMAÇÃO, NA FORMA SEGUINTE:</h2>

<p style="margin-left: 1cm; margin-right: 1cm;text-align: justify;font-size: 16px;"><?=mb_strtoupper($titular)?> - Tabelião Registrador 
<span style="text-transform: uppercase;">
<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
echo $h->strRazaoSocial; $u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
foreach ($u as $u):?>	,

<?=$u->cidade?>/<?=$u->uf?>
<?php endforeach; endforeach ?></span> . Na forma da Lei. Etc...

 FAZ SABER, a todos quanto o presente edital de intimação, virem ou
dele conhecimento tiverem, que foi entregue neste Cartório de Protesto,
para apontamento e, na falta de pagamento, ser(em) protestado(s), o(s)
título(s) abaixo(s) relacionado(s):
</p>

<p style="margin-left: 1cm; margin-right: 1cm;text-align: justify;font-size: 16px;">

<?php $pesquisa_apresentante = $pdo->prepare("SELECT * FROM portador_automatizado where codigo = '$b->numero_codigo_portador_transacao'");
						$pesquisa_apresentante->execute();
						$l = $pesquisa_apresentante->fetchAll(PDO::FETCH_OBJ);
						foreach ($l as $l) {
						$apresentante = $l->nome;
						}
            if ($b->numero_codigo_portador_transacao == $_SESSION['numero_p_24']) {
              $apresentante = $b->nome_beneficiario_favorecido_transacao.', CPF/CNPJ: '.molda_cpf($b->agencia_codigo_beneficiario_transacao);
            }
						 ?>
<b>Apresentante:</b> <b><?=mb_strtoupper($apresentante)?></b> <br>
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







<b>Espécie:</b> <?=mb_strtoupper($especie)?>  <br>



<b>Nº Documento:</b> <?=$b->numero_titulo_transacao?><br>
<b>Nº Protocolo:</b> <?=$b->numero_protocolo_cartorio_transacao?><br>
<b>A favor:</b> <?=mb_strtoupper($b->nome_sacador_vendedor_transacao)?><br>
<?php 
              $busca_devedor = $pdo->prepare("SELECT * FROM `protesto_automatico_transacao` WHERE numero_protocolo_cartorio_transacao = '$b->numero_protocolo_cartorio_transacao' ");
              $busca_devedor->execute();
              $linhas_devedor = $busca_devedor->fetchAll(PDO::FETCH_OBJ);
              foreach ($linhas_devedor as $ld):
               ?>
<b>Devedor:</b> <?=mb_strtoupper($ld->nome_devedor_transacao)?> <b>CPF/CNPJ: <?=molda_cpf($ld->numero_identificacao_devedor_transacao)?> </b><br> <br>
<?php endforeach ?>
</p>

<p style="margin-left: 1cm; margin-right: 1cm;text-align: justify;font-size: 16px;">
 E, para ninguém alegar ignorância,expediu-se o presente EDITAL que será afixado
NESTA SERVENTIA. Dado e passado, neste Cartório de Protesto, aos 

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
            echo " de Outubro de ";
          } elseif ($novaDataRegistro[1] == '11') {
            echo " de Novembro de ";
          } elseif ($novaDataRegistro[1] == '12') {
            echo " de Dezembro de ";
          } else {
            echo "Não definido";
          }

          echo $novaDataRegistro[0];

          ?>. Eu <?=mb_strtoupper($_SESSION['nome'])?>, o digitei e assino.
Atenciosamente,
<p style="text-align: center">_______________________________________________________ <br> <?=mb_strtoupper($_SESSION['nome'])?> - <?=mb_strtoupper($_SESSION['funcao'])?> </p><br>

					<?php if (count($id)>1): ?>
						<div style="page-break-before: always;"> </div>
					<?php endif ?>
					
<?php endforeach ?>	
<?php endfor ?>

</body>
</html>
