<!DOCTYPE html>
<?php include('../../controller/db_functions.php');
$pdo = conectar();
#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
$tirar_cidades = array("5300109/", "/");
$repor_cidades = array(" ",", ");
if (isset($_GET['id_apagar'])) {$id_apagar = $_GET['id_apagar'];
    $del = $pdo->prepare("DELETE FROM salvar_editor where IDREGISTRO ='$id_apagar' and TIPO = '1_HAB_CASAMENTO' ");
    $del->execute();
    }

function echo_exist($texto){
if ($texto!='' && $texto!=' ' && $texto!=NULL) {
		echo $texto;
	}
}

function cidade_estrangeiro($texto){
/*$tirar = array("1","2","3","4","5","6","7","8","9","0",",",);
if (intval(intval($texto) == '5300109')) {
return str_replace($tirar, "", $texto);
	}	
*/;
return "";	
}

function idade_civil_antigo($nascimento,$dataregistro){
  $data = explode("-",$nascimento);
  $registro = explode("-",$dataregistro);	

  if (!isset($dataegistro) ) {
  	$registro = explode("-",date('Y-m-d'));
  }
 
  $ano = $data[0];
  $mes = $data[1];
  $dia = $data[2];

  $ano1 = $registro[0];
  $mes1 = $registro[1];
  $dia1 = $registro[2];



    // Descobre que dia é hoje e retorna a unix timestamp
    $hoje = mktime( 0, 0, 0, $mes1, $dia1, $ano1);
    // Descobre a unix timestamp da data de nascimento do fulano
    $nascimento = mktime( 0, 0, 0, $mes, $dia, $ano);

    // Depois apenas fazemos o cálculo já citado :)
    $idade = floor((((($hoje - $nascimento) / 60) / 60) / 24) / 365.25);

    return $idade;

}

if (isset($_SESSION['nomeapoio'])) {
$nome_assinatura = $_SESSION['nomeapoio'];
$funcao_assinatura = $_SESSION['funcaoapoio'];
}
else{
$nome_assinatura = $_SESSION['nome'];
$funcao_assinatura = $_SESSION['funcao'];	
}
?>
<html>
<head>

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
body{ font-size: 10px;font-family: "Arial";
<?php if (isset($_GET['preview'])): ?>
	background: url("../../../images/preview.jpg");
<?php endif ?>

}
@media print { 
                    #noprint { display:none; } 
                    body { background: #fff; 
                    zoom:95%;	
                    }
                }
</style>
</head>

<?php 

function dataum($data){
$dataAno = $data;
if (substr($dataAno, -2) == '11') {
echo GExtenso::numero($dataAno)." onze";
}
elseif (substr($dataAno, -1) == '1') {
echo GExtenso::numero($dataAno)." um";
}
else {
  echo GExtenso::numero($dataAno);
}

}


$busca_ja_existe = $pdo->prepare("SELECT * FROM salvar_editor where IDREGISTRO = '$id' and TIPO = '1_HAB_CASAMENTO'");
	$busca_ja_existe->execute();

	if ($busca_ja_existe->rowCount()!=0) {
	$recebe_texto = $busca_ja_existe->fetch(PDO::FETCH_ASSOC);
	echo $recebe_texto['TEXTO'];
	}	
	?>
	<?php if ($busca_ja_existe->rowCount()==0): ?>

<?php $r = PESQUISA_ALL_ID('registro_casamento_novo',$id);
foreach ($r as $r ) :
$retorno = json_decode($r->RETORNOSELODIGITALPROCLAMAS,true);
		$qr = $retorno['valorQrCode'];
		$textoselo = $retorno['textoSelo'];
		$selo_proclamas = $retorno['numeroSelo'];
		if (empty($r->RETORNOSELODIGITALPROCLAMAS)) {
			$selo_proclamas = '';
		}

	?>
<body>
	
<!--AUTUAMENTO-->
				<fieldset style="">
				<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
				<?php $c = PESQUISA_ALL('cadastroserventia');
				foreach ($c as $c ):?>
				<div style="display: block;margin-top: -40px;min-width: 100%;">
				<div style="display: inline-block;width: 17%;">
				<img src="../../images/brasao_ma.png" style="width: 60%;margin-left:28px; margin-top:50px; ">

				</div>
				<div style="display: inline-block;width: 80%; margin-left: -50px;">  
				<h2 style=" text-align: center;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
				<h2 style=" text-align: center;font-size: 12px;margin-top: -18px;
				"><?=$c->strLogradouro?>, <?=$c->strNumero?> -
				<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
				<?php endforeach ?>
				<br>
				Titular da Serventia: <?=$c->strTituloServentia?><br>
				Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
				<?php endforeach ?></h2>
				</div>

				</div>

				<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
				<br>
				<h2 style="text-align: center"><?=date('d/m/Y',strtotime($r->DATAENTRADA))?></h2>
				<h2 style="text-align: center; text-transform: uppercase;"><?php $t = PESQUISA_ALL('cadastroserventia');
				foreach ($t as $t):?> <?=$t->strLogradouro.','.$t->strNumero.'-'.$t->strBairro?>
				<?php endforeach ?>
				</h2>
				</fieldset>
				<br><br>

				<p style="text-align: center;display: inline;"><b>AUTUAÇÃO</b></p><br><br>
			

				<div style="padding: -70px;margin-left: 5cm">
				<p style="margin-left: 10cm"><b>Livro Nº ___________</b></p>
				<p style="margin-left: 10cm"><b>Reg. a fls. ________</b></p>
				<p style="margin-left: 10cm"><b>Termo Nº ___________</b></p>
				</div>
				<br>

				<p style="text-align: center"><b>Exmo.Sr.Dr.Oficial do Registro Civil</b>
				<br>
				<?php $t = PESQUISA_ALL('cadastroserventia');
				foreach ($t as $t):
				$g = PESQUISA_ALL_ID('uf_cidade', $t->intUFcidade);
				foreach ($g as $g):?>

				<?=$g->cidade.'/'.$g->uf?>

				<?php endforeach ?>
				<?php endforeach ?></p>
				<br>
				<h1 style="text-align: center;text-decoration: underline;">HABILITAÇÃO DE CASAMENTO</h1>
				<br>

				<h3 style="text-align: left"><b>Contratantes:</b></h3>
				<div style="padding: -40px;text-align: center">
				<br>	
				<h2 style=""><?=mb_strtoupper($r->NOMENUBENTE1)?><br>
				<?=mb_strtoupper($r->NOMENUBENTE2)?>
				</h2>
				</div>
				<br>

				<h3 style="text-align: center">AUTUAÇÃO</h3>

				<p style="text-align: justify;font-size: 16px; padding: 20px;color:#4e4f51">
				<span style="margin-left: 2cm">	
				Aos
				<?php
				if ($r->DATAENTRADA=='') {						$data = date('Y-m-d');
				}
				else{
				$data = $r->DATAENTRADA ;
				}
				$novaDataRegistro = explode("-", $data);
				echo $novaDataRegistro[2]." dias ";
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
					echo " do mês de Janeiro do ano de  ";
				}elseif ($novaDataRegistro[1] == '02' || $novaDataRegistro[1] == '2') {
					echo " do mês de Fevereiro do ano de  ";
				} elseif ($novaDataRegistro[1] == '03' || $novaDataRegistro[1] == '3') {
					echo " do mês de Março do ano de  ";
				} elseif ($novaDataRegistro[1] == '04' || $novaDataRegistro[1] == '4') {
					echo " do mês de Abril do ano de  ";
				} elseif ($novaDataRegistro[1] == '05' || $novaDataRegistro[1] == '5') {
					echo " do mês de Maio do ano de  ";
				} elseif ($novaDataRegistro[1] == '06' || $novaDataRegistro[1] == '6') {
					echo " do mês de Junho do ano de  ";
				} elseif ($novaDataRegistro[1] == '07' || $novaDataRegistro[1] == '7') {
					echo " do mês de Julho do ano de  ";
				} elseif ($novaDataRegistro[1] == '08' || $novaDataRegistro[1] == '8') {
					echo " do mês de Agosto do ano de  ";
				} elseif ($novaDataRegistro[1] == '09' || $novaDataRegistro[1] == '9') {
					echo " do mês de Setembro do ano de  ";
				} elseif ($novaDataRegistro[1] == '10') {
					echo " do mês de Outubro do ano de ";
				} elseif ($novaDataRegistro[1] == '11') {
					echo " do mês de Novembro do ano de ";
				} elseif ($novaDataRegistro[1] == '12') {
					echo " do mês de Dezembro do ano de  ";
				} else {
					echo "Não definido";
				}

				echo $novaDataRegistro[0];

				?>, Nesta cidade de  <?php $t = PESQUISA_ALL('cadastroserventia');
				foreach ($t as $t):
				$g = PESQUISA_ALL_ID('uf_cidade', $t->intUFcidade);
				foreach ($g as $g):?>

				<?=$g->cidade.' Estado do '.$g->uf?>

				<?php endforeach ?>
				<?php endforeach ?>

				em meu Cartório </span> autuo na forma da Lei a petição despachada e os documentos que a instruem e que adiante se seguem do
				que para constar faço este termo e autuamento. Eu, <?=mb_strtoupper($nome_assinatura)?> <?=mb_strtoupper($funcao_assinatura)?> Subscrevo.


				</p>
<!--REQUERIMENTO-->
	<div style="page-break-before: always;margin-top: 2cm; text-align: justify; padding-left: 2cm; padding-right: 2cm; font-size: 14px;">
					<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<?php $c = PESQUISA_ALL('cadastroserventia');
			foreach ($c as $c ):?>
			<div style="display: block;margin-top: -40px;min-width: 100%;">
			<div style="display: inline-block;width: 17%;">
			<img src="../../images/brasao_ma.png" style="width: 60%;margin-left:28px; margin-top:10px; ">

			</div>
			<div style="display: inline-block;width: 80%; margin-left: -50px;">  
			<h2 style=" text-align: center;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
			<h2 style=" text-align: center;font-size: 12px;margin-top: -18px;
			"><?=$c->strLogradouro?>, <?=$c->strNumero?> -
			<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
			<?php endforeach ?>
			<br>
			Titular da Serventia: <?=$c->strTituloServentia?><br>
			Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
			<?php endforeach ?></h2>
			</div>

			</div>

			<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<hr style="border:1px solid black">

					<h3 style="text-align:center; text-transform: uppercase;">ILUSTRÍSSIMO SENHOR (A) OFICIAL DO REGISTRO CIVIL DA COMARCA DE
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?> - <?=$u->uf?> ,
				<?php endforeach;endforeach ?>
					</h3>

					<p style="text-align: justify;">
					<?=$r->NOMENUBENTE1?>, 
					<?php if ($r->QUALIFICACAOPROCNUBENTE1!=''): ?>
						representado(a) por seu(a) Procurador(a) legal, para fins do Casamento, pelo Sr(a).
						<?=mb_strtoupper($r->QUALIFICACAOPROCNUBENTE1)?>, conforme procuração lavrada No(a) <?=$r->CARTORIOPROCNUBENTE1?>,  No livro Nº <?=$r->LIVROPROCNUBENTE1?>, Às fls. <?=$r->FOLHAPROCNUBENTE1?>
					<?php endif ?> 
					e 

					<?=$r->NOMENUBENTE2?>, 

					<?php if ($r->QUALIFICACAOPROCNUBENTE2!=''): ?>
						representado(a) por seu(a) Procurador(a) legal, para fins do Casamento, pelo Sr(a).
						<?=mb_strtoupper($r->QUALIFICACAOPROCNUBENTE2)?>, conforme procuração lavrada No(a) <?=$r->CARTORIOPROCNUBENTE2?>,  No livro Nº <?=$r->LIVROPROCNUBENTE2?>, Às fls. <?=$r->FOLHAPROCNUBENTE2?>.
					<?php endif ?> 
					querendo casar-se, fundamentados no que
					dispõe o Art. 1.525 do Código Civil, apresentam para a necessária
					habilitação os documentos inclusos, ele e ela requerem que, a vista dos
					mesmos, devidamente processados, sejam publicados os proclamas de seu
					casamento em edital, pelo prazo de 15 dias, nos termos do Art. 1.527 e
					findo o prazo legal, não aparecendo impedimento, dê-se-lhes o
					CERTIFICADO DE HABILITAÇÃO, nos termos do Art. 1.531 do mesmo diploma
					legal.
					</p>
					
					<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAENTRADA=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAENTRADA ;
					}
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

					?>. 
					<?php endforeach; endforeach ?>
					</p>
						<?php if ($r->ROGONUBENTE1!=''): ?>
						<p >
						<br>		
						<div style="border: 3px dashed silver; width: 5%; height: 10px; padding: 30px;margin-left: 20%;margin-bottom: -5%"></div><br>
						<p style="display: inline;margin-left: 22%;font-size: 8px;">(Digital NUBENTE1)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;margin-top:-120px;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA3)?><br>(TESTEMUNHA A ROGO)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA4)?><br>(TESTEMUNHA A ROGO)</p>
						<br><br>
						</p>	
						<?php else: ?>
						
					<p style="text-align: center;">
					________________________________	<br>	
					<?=$r->NOMENUBENTE1?> 
					<?php if ($r->QUALIFICACAOPROCNUBENTE1!=''): $nomeproc1 = explode(',', $r->QUALIFICACAOPROCNUBENTE1); ?>
						<br> <span style="font-weight: bold;font-size: 10px;">REPRESENTADO POR SEU PROCURADOR <?=$nomeproc1[0]?> </span>
					<?php endif ?>
					</p>
					<?php endif ?>

					<?php if ($r->ROGONUBENTE2!=''): ?>
						<p >
						<br>		
						<div style="border: 3px dashed silver; width: 5%; height: 10px; padding: 30px;margin-left: 20%;margin-bottom: -5%"></div><br>
						<p style="display: inline;margin-left: 22%;font-size: 8px;">(Digital NUBENTE2)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;margin-top:-120px;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA5)?><br>(TESTEMUNHA A ROGO)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA6)?><br>(TESTEMUNHA A ROGO)</p>
						<br><br>
						</p>	
						<?php else: ?>
						
					<p style="text-align: center;">
					________________________________	<br>	
					<?=$r->NOMENUBENTE2?> 
					<?php if ($r->QUALIFICACAOPROCNUBENTE2!=''): $nomeproc1 = explode(',', $r->QUALIFICACAOPROCNUBENTE2); ?>
						<br> <span style="font-weight: bold;font-size: 10px;">REPRESENTADO POR SEU PROCURADOR <?=$nomeproc1[0]?> </span>
					<?php endif ?>
					</p>
					<?php endif ?>

					<div style="margin-left: 80%; border: 1px solid black; width: 30%; font-size: 8px;margin-bottom: -2cm;margin-top: 20px;"><b style="text-align: center"><br>CERTIFICO que as assinaturas supra de
					<?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?> foram
					lançadas na minha presença.
					<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAENTRADA=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAENTRADA ;
					}
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

					?>. 
					<?php endforeach; endforeach ?>
					</p>
					<p style="text-align: center;">
					___________________________ <br> 
					<?=mb_strtoupper($nome_assinatura)?></p>
					<p style="text-align: center;margin-top: -7px;"><?=$funcao_assinatura?></p>
					</b>
					</div>

		

	</div>
<!--DECLARACAO DOS CONTRAENTES-->
		<div style="page-break-before: always;margin-top: 2cm; text-align: justify; padding-left: 2cm; padding-right: 2cm; font-size: 14px;">
					<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<?php $c = PESQUISA_ALL('cadastroserventia');
			foreach ($c as $c ):?>
			<div style="display: block;margin-top: -40px;min-width: 100%;">
			<div style="display: inline-block;width: 17%;">
			<img src="../../images/brasao_ma.png" style="width: 60%;margin-left:28px; margin-top:10px; ">

			</div>
			<div style="display: inline-block;width: 80%; margin-left: -50px;">  
			<h2 style=" text-align: center;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
			<h2 style=" text-align: center;font-size: 12px;margin-top: -18px;
			"><?=$c->strLogradouro?>, <?=$c->strNumero?> -
			<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
			<?php endforeach ?>
			<br>
			Titular da Serventia: <?=$c->strTituloServentia?><br>
			Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
			<?php endforeach ?></h2>
			</div>

			</div>

			<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<hr style="border:1px solid black">
						<h2 style="text-align: center">D E C L A R A Ç Ã O DOS C O N T R A E N T E S</h2>
					<p>	
					Art. 1.525 e Incisos do CC

					Para fins de casamento, dizem:
					<span style="font-weight: bold"><?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?></span>
					</p>

		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify;">O(a) CONTRAENTE
					<?php if ($r->NOMENUBENTE1!=''): ?>	
					<?=mb_strtoupper($r->NOMENUBENTE1)?>,
					
					<?php if ($r->NOMECASADONUBENTE1 == $r->NOMENUBENTE1): ?>
					que permanecerá a usar o mesmo nome,
					<?php else: ?>
					que passará a usar o nome de <?=$r->NOMECASADONUBENTE1?>,
					<?php endif ?>

					<?php if ($r->ESTADOCIVILNUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADENUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADENUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADENUBENTE1!=''): ?>
					natural de 
					<?=cidade_estrangeiro($r->NATURALIDADENUBENTE1)?>
					<?php if (intval($r->NATURALIDADENUBENTE1)!='5300109'): ?>
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE1)?></span>
					<?php endif ?>
					<?php endif ?>

					<?php if ($r->PROFISSAONUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAONUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECONUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECONUBENTE1)?> <?=echo_exist($r->BAIRRONUBENTE1)?>,
					<?php endif ?>

					<?=cidade_estrangeiro($r->CIDADENUBENTE1)?>
					<?php if (intval($r->CIDADENUBENTE1)!='5300109'): ?>
					<?php if ($r->CIDADENUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->CIDADENUBENTE1)?></span>
					<?php endif ?> 

					<?php if ($r->RGNUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGNUBENTE1?>/<?=$r->ORGAOEMISSORNUBENTE1?>,
					<?php endif ?> 
					<?php if ($r->CPFNUBENTE1!=''): ?>
					CPF de número <?=$r->CPFNUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTONUBENTE1!=''): ?>
						Nascido (a) em
						<?php
						$data = $r->DATANASCIMENTONUBENTE1 ;
						$novaDataNoivo = explode("-", $data);

						if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
						echo "Primeiro   ";
						}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
						echo " Dois  ";
						} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
						echo " Três ";
						} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
						echo " Quatro  ";
						} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
						echo " Cinco  ";
						} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
						echo " Seis  ";
						} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
						echo " Sete  ";
						} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
						echo " Oito  ";
						} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
						echo " Nove  ";
						} else {echo  dataum($novaDataNoivo[2]);}
						//Será exibido na tela a data: 16/02/2015
						// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
						if ($novaDataNoivo[1] == '01' || $novaDataNoivo[1] == '1') {
						echo " de Janeiro de ";
						}elseif ($novaDataNoivo[1] == '02' || $novaDataNoivo[1] == '2') {
						echo " de Fevereiro de ";
						} elseif ($novaDataNoivo[1] == '03' || $novaDataNoivo[1] == '3') {
						echo " de Março de ";
						} elseif ($novaDataNoivo[1] == '04' || $novaDataNoivo[1] == '4') {
						echo " de Abril de ";
						} elseif ($novaDataNoivo[1] == '05' || $novaDataNoivo[1] == '5') {
						echo " de Maio de ";
						} elseif ($novaDataNoivo[1] == '06' || $novaDataNoivo[1] == '6') {
						echo " de Junho de ";
						} elseif ($novaDataNoivo[1] == '07' || $novaDataNoivo[1] == '7') {
						echo " de Julho de ";
						} elseif ($novaDataNoivo[1] == '08' || $novaDataNoivo[1] == '8') {
						echo " de Agosto de ";
						} elseif ($novaDataNoivo[1] == '09' || $novaDataNoivo[1] == '9') {
						echo " de Setembro de ";
						} elseif ($novaDataNoivo[1] == '10') {
						echo " de Outubro de ";
						} elseif ($novaDataNoivo[1] == '11') {
						echo " de Novembro de ";
						} elseif ($novaDataNoivo[1] == '12') {
						echo " de Dezembro de ";
						} else {
						echo "Não definido";
						}

						$udg = substr($novaDataNoivo[0],  2,3);
						if ($udg == '01' || $udg == '1' ||$udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE1))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE1, $r->DATAENTRADA)?> anos de idade.
					<?php endif ?>
					<?php endif ?>
					<?php if ($r->strTituloEleitorNoivo!=''): ?>
					Titulo de Eleitor nº <?=$r->strTituloEleitorNoivo?>.
					<?php endif ?>
					<?php if ($r->strCtpsNoivo!=''): ?>
					CTPS nº <?=$r->strCtpsNoivo?>.
					<?php endif ?>
					<?php if ($r->strPassaporteNoivo!=''): ?>
					Passaporte nº <?=$r->strPassaporteNoivo?>.
					<?php endif ?>
					<?php if ($r->strPisNisNoivo!=''): ?>
					PIS/NIS: nº <?=$r->strPisNisNoivo?>.
					<?php endif ?>
					<?php if ($r->strCartaoSaudeNoivo!=''): ?>
					Cartão Saúde: nº <?=$r->strCartaoSaudeNoivo?>.
					<?php endif ?>


					Filho(a) de 

					<?php if ($r->NOMEPAINUBENTE1!=''): ?>	
					<?=echo_exist($r->NOMEPAINUBENTE1)?>,
					<?php if ($r->ESTADOCIVILPAINUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEPAINUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADEPAINUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEPAINUBENTE1!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAINUBENTE1)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEPAINUBENTE1) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEPAINUBENTE1)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
					<?php endif ?>

					<?php if ($r->PROFISSAOPAINUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAOPAINUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOPAINUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOPAINUBENTE1)?> <?=echo_exist($r->BAIRROPAINUBENTE1)?>,
					<?php endif ?>

					<?php if ($r->CIDADEPAINUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAINUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGPAINUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGPAINUBENTE1?>/<?=$r->ORGAOEMISSORPAINUBENTE1?>,
					<?php endif ?> 
					<?php if ($r->CPFPAINUBENTE1!=''): ?>
					CPF de número <?=$r->CPFPAINUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOPAINUBENTE1!=''): ?>
						Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOPAINUBENTE1, $r->DATAENTRADA)?> anos de idade. E de 
					<?php endif ?>
					<?php endif ?>		

					<?php if ($r->NOMEMAENUBENTE1!=''): ?>	
					<?=echo_exist($r->NOMEMAENUBENTE1)?>,
					<?php if ($r->ESTADOCIVILMAENUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEMAENUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADEMAENUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEMAENUBENTE1!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAENUBENTE1)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEMAENUBENTE1) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEMAENUBENTE1)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
					<?php endif ?>


					<?php if ($r->PROFISSAOMAENUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAOMAENUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOMAENUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOMAENUBENTE1)?> <?=echo_exist($r->BAIRROMAENUBENTE1)?>,
					<?php endif ?>

					<?php if ($r->CIDADEMAENUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGMAENUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGMAENUBENTE1?>/<?=$r->ORGAOEMISSORMAENUBENTE1?>, 
					<?php endif ?>
					<?php if ($r->CPFMAENUBENTE1!=''): ?>
					CPF de número <?=$r->CPFMAENUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOMAENUBENTE1!=''): ?>
						Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOMAENUBENTE1,$r->DATAENTRADA)?> anos de idade. 
					<?php endif ?>
					<?php endif ?>
			 </p>
		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->

		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify;">O(a) CONTRAENTE
					<?php if ($r->NOMENUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMENUBENTE2)?>,

					<?php if ($r->NOMECASADONUBENTE2 == $r->NOMENUBENTE2): ?>
					que permanecerá a usar o mesmo nome,
					<?php else: ?>
					que passará a usar o nome de <?=$r->NOMECASADONUBENTE2?>,
					<?php endif ?>

					<?php if ($r->ESTADOCIVILNUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADENUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADENUBENTE2)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADENUBENTE2!=''): ?>
					natural de 
					<?=cidade_estrangeiro($r->NATURALIDADENUBENTE2)?>
					<?php if (intval($r->NATURALIDADENUBENTE2)!='5300109'): ?>
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE2)?></span>
					<?php endif ?>
					<?php endif ?>

					<?php if ($r->PROFISSAONUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAONUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECONUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECONUBENTE2)?> <?=echo_exist($r->BAIRRONUBENTE2)?>,
					<?php endif ?>

					<?=cidade_estrangeiro($r->CIDADENUBENTE2)?>
					<?php if (intval($r->CIDADENUBENTE2)!='5300109'): ?>
					<?php if ($r->CIDADENUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE2)?></span>
					<?php endif ?> 

					<?php if ($r->RGNUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGNUBENTE2?>/<?=$r->ORGAOEMISSORNUBENTE2?>,
					<?php endif ?> 
					<?php if ($r->CPFNUBENTE2!=''): ?>
					CPF de número <?=$r->CPFNUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTONUBENTE2!=''): ?>
						Nascido (a) em
						<?php
						$data = $r->DATANASCIMENTONUBENTE2 ;
						$novaDataNoivo = explode("-", $data);

						if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
						echo "Primeiro   ";
						}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
						echo " Dois  ";
						} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
						echo " Três ";
						} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
						echo " Quatro  ";
						} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
						echo " Cinco  ";
						} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
						echo " Seis  ";
						} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
						echo " Sete  ";
						} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
						echo " Oito  ";
						} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
						echo " Nove  ";
						} else {echo  dataum($novaDataNoivo[2]);}
						//Será exibido na tela a data: 16/02/2015
						// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
						if ($novaDataNoivo[1] == '01' || $novaDataNoivo[1] == '1') {
						echo " de Janeiro de ";
						}elseif ($novaDataNoivo[1] == '02' || $novaDataNoivo[1] == '2') {
						echo " de Fevereiro de ";
						} elseif ($novaDataNoivo[1] == '03' || $novaDataNoivo[1] == '3') {
						echo " de Março de ";
						} elseif ($novaDataNoivo[1] == '04' || $novaDataNoivo[1] == '4') {
						echo " de Abril de ";
						} elseif ($novaDataNoivo[1] == '05' || $novaDataNoivo[1] == '5') {
						echo " de Maio de ";
						} elseif ($novaDataNoivo[1] == '06' || $novaDataNoivo[1] == '6') {
						echo " de Junho de ";
						} elseif ($novaDataNoivo[1] == '07' || $novaDataNoivo[1] == '7') {
						echo " de Julho de ";
						} elseif ($novaDataNoivo[1] == '08' || $novaDataNoivo[1] == '8') {
						echo " de Agosto de ";
						} elseif ($novaDataNoivo[1] == '09' || $novaDataNoivo[1] == '9') {
						echo " de Setembro de ";
						} elseif ($novaDataNoivo[1] == '10') {
						echo " de Outubro de ";
						} elseif ($novaDataNoivo[1] == '11') {
						echo " de Novembro de ";
						} elseif ($novaDataNoivo[1] == '12') {
						echo " de Dezembro de ";
						} else {
						echo "Não definido";
						}

						$udg = substr($novaDataNoivo[0],  2,3);
						if ($udg == '01' || $udg == '1' ||$udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE2))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE2,$r->DATAENTRADA)?> anos de idade.
					<?php endif ?>
					<?php endif ?>
					<?php if ($r->strTituloEleitorNoiva!=''): ?>
					Titulo de Eleitor nº <?=$r->strTituloEleitorNoiva?>.
					<?php endif ?>
					<?php if ($r->strCtpsNoiva!=''): ?>
					CTPS nº <?=$r->strCtpsNoiva?>.
					<?php endif ?>
					<?php if ($r->strPassaporteNoiva!=''): ?>
					Passaporte nº <?=$r->strPassaporteNoiva?>.
					<?php endif ?>
					<?php if ($r->strPisNisNoiva!=''): ?>
					PIS/NIS: nº <?=$r->strPisNisNoiva?>.
					<?php endif ?>
					<?php if ($r->strCartaoSaudeNoiva!=''): ?>
					Cartão Saúde: nº <?=$r->strCartaoSaudeNoiva?>.
					<?php endif ?> 


					Filho(a) de 

					<?php if ($r->NOMEPAINUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMEPAINUBENTE2)?>,
					<?php if ($r->ESTADOCIVILPAINUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEPAINUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADEPAINUBENTE2)?>,	
					<?php endif ?>
					

					<?php if ($r->NATURALIDADEPAINUBENTE2!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAINUBENTE2)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEPAINUBENTE2) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEPAINUBENTE2)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
					<?php endif ?>


					<?php if ($r->PROFISSAOPAINUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAOPAINUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOPAINUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOPAINUBENTE2)?> <?=echo_exist($r->BAIRROPAINUBENTE2)?>,
					<?php endif ?>

					<?php if ($r->CIDADEPAINUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAINUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGPAINUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGPAINUBENTE2?>/<?=$r->ORGAOEMISSORPAINUBENTE2?>,
					<?php endif ?> 
					<?php if ($r->CPFPAINUBENTE2!=''): ?>
					CPF de número <?=$r->CPFPAINUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOPAINUBENTE2!=''): ?>
					Nascido (a) em
					<?php

					$data = $r->DATANASCIMENTOPAINUBENTE2 ;
					$novaDataNoivo = explode("-", $data);

					if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
						echo "Primeiro   ";
					}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
						echo " Dois  ";
					} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
						echo " Três ";
					} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
						echo " Quatro  ";
					} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
						echo " Cinco  ";
					} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
						echo " Seis  ";
					} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
						echo " Sete  ";
					} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
						echo " Oito  ";
					} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
						echo " Nove  ";
					} else {echo  dataum($novaDataNoivo[2]);}
					//Será exibido na tela a data: 16/02/2015
					// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
					if ($novaDataNoivo[1] == '01' || $novaDataNoivo[1] == '1') {
						echo " de Janeiro de ";
					}elseif ($novaDataNoivo[1] == '02' || $novaDataNoivo[1] == '2') {
						echo " de Fevereiro de ";
					} elseif ($novaDataNoivo[1] == '03' || $novaDataNoivo[1] == '3') {
						echo " de Março de ";
					} elseif ($novaDataNoivo[1] == '04' || $novaDataNoivo[1] == '4') {
						echo " de Abril de ";
					} elseif ($novaDataNoivo[1] == '05' || $novaDataNoivo[1] == '5') {
						echo " de Maio de ";
					} elseif ($novaDataNoivo[1] == '06' || $novaDataNoivo[1] == '6') {
						echo " de Junho de ";
					} elseif ($novaDataNoivo[1] == '07' || $novaDataNoivo[1] == '7') {
						echo " de Julho de ";
					} elseif ($novaDataNoivo[1] == '08' || $novaDataNoivo[1] == '8') {
						echo " de Agosto de ";
					} elseif ($novaDataNoivo[1] == '09' || $novaDataNoivo[1] == '9') {
						echo " de Setembro de ";
					} elseif ($novaDataNoivo[1] == '10') {
						echo " de Outubro de ";
					} elseif ($novaDataNoivo[1] == '11') {
						echo " de Novembro de ";
					} elseif ($novaDataNoivo[1] == '12') {
						echo " de Dezembro de ";
					} else {
						echo "Não definido";
					}

					 $udg = substr($novaDataNoivo[0], 2,3);
					  if ($udg == '01' || $udg == '1') {
					   echo GExtenso::numero($novaDataNoivo[0]).'  um';
					  }
					  else{
					    echo GExtenso::numero($novaDataNoivo[0]);
					  }
					  

					?>, Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOPAINUBENTE2, $r->DATAENTRADA)?> anos de idade. E de 
					<?php endif ?>
					<?php endif ?>		

					<?php if ($r->NOMEMAENUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMEMAENUBENTE2)?>,
					<?php if ($r->ESTADOCIVILMAENUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEMAENUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADEMAENUBENTE2)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEMAENUBENTE2!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAENUBENTE2)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEMAENUBENTE2) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEMAENUBENTE2)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
					<?php endif ?>

					<?php if ($r->PROFISSAOMAENUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAOMAENUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOMAENUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOMAENUBENTE2)?> <?=echo_exist($r->BAIRROMAENUBENTE2)?>,
					<?php endif ?>

					<?php if ($r->CIDADEMAENUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGMAENUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGMAENUBENTE2?>/<?=$r->ORGAOEMISSORMAENUBENTE2?>, 
					<?php endif ?>
					<?php if ($r->CPFMAENUBENTE2!=''): ?>
					CPF de número <?=$r->CPFMAENUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOMAENUBENTE2!=''): ?>
						Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOMAENUBENTE2, $r->DATAENTRADA)?> anos de idade. 
					<?php endif ?>
					<?php endif ?>
			 </p>
		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->
						<?php if (strlen($r->REGIMECASAMENTO)>3) {
							$regime_array = explode("@", $r->REGIMECASAMENTO);
							$REGIMECASAMENTO = $regime_array[0];
							$COMPLEMENTOREGIME = $regime_array[1];
							}
							else{
							$REGIMECASAMENTO = $r->REGIMECASAMENTO;	
							} 
							?>	
							<?php 

							if ($REGIMECASAMENTO == 'CP') {
							$regime = 'Comunhão Parcial de bens';
							}

							else if ($REGIMECASAMENTO == 'CU') {
							$regime = 'Comunhão Universal de bens'.', '.$COMPLEMENTOREGIME;
							}

							else if ($REGIMECASAMENTO == 'PF') {
							$regime = 'Participação final nos aquestos'.', '.$COMPLEMENTOREGIME;
							}

							else if ($REGIMECASAMENTO == 'SB') {
							$regime = 'Separação Total  de bens'.', '.$COMPLEMENTOREGIME;
							}
							else if ($REGIMECASAMENTO == 'SE') {
							$regime = 'Separação de bens'.', '.$COMPLEMENTOREGIME;
							}
							else if ($REGIMECASAMENTO == 'SC') {
							$regime = 'Separação Obrigatória de bens'.', '.$COMPLEMENTOREGIME;
							}
							else if ($REGIMECASAMENTO == 'SO') {
							$regime = 'Separação Convencional de Bens'.', '.$COMPLEMENTOREGIME;
							}
							else if ($REGIMECASAMENTO == 'SL') {
							$regime = 'Separação Legal de Bens'.', '.$COMPLEMENTOREGIME;
							}

							else{
							$regime = 'Comunhão de Bens';
							}



							?>
					O regime do casamento será o da <?=$regime?>.

										<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAENTRADA=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAENTRADA ;
					}
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

					?>. 
					<?php endforeach; endforeach ?>
					</p>

					<?php if ($r->ROGONUBENTE1!=''): ?>
						<p >
						<br>		
						<div style="border: 3px dashed silver; width: 5%; height: 10px; padding: 30px;margin-left: 20%;margin-bottom: -5%"></div><br>
						<p style="display: inline;margin-left: 22%;font-size: 8px;">(Digital NUBENTE1)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;margin-top:-120px;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA3)?><br>(TESTEMUNHA A ROGO)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA4)?><br>(TESTEMUNHA A ROGO)</p>
						<br><br>
						</p>	
						<?php else: ?>
						
					<p style="text-align: center;">
					________________________________	<br>	
					<?=$r->NOMENUBENTE1?> 
					<?php if ($r->QUALIFICACAOPROCNUBENTE1!=''): $nomeproc1 = explode(',', $r->QUALIFICACAOPROCNUBENTE1); ?>
						<br> <span style="font-weight: bold;font-size: 10px;">REPRESENTADO POR SEU PROCURADOR <?=$nomeproc1[0]?> </span>
					<?php endif ?>
					</p>
					<?php endif ?>

					<?php if ($r->ROGONUBENTE2!=''): ?>
						<p >
						<br>		
						<div style="border: 3px dashed silver; width: 5%; height: 10px; padding: 30px;margin-left: 20%;margin-bottom: -5%"></div><br>
						<p style="display: inline;margin-left: 22%;font-size: 8px;">(Digital NUBENTE2)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;margin-top:-120px;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA5)?><br>(TESTEMUNHA A ROGO)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA6)?><br>(TESTEMUNHA A ROGO)</p>
						<br><br>
						</p>	
						<?php else: ?>
						
					<p style="text-align: center;">
					________________________________	<br>	
					<?=$r->NOMENUBENTE2?> 
					<?php if ($r->QUALIFICACAOPROCNUBENTE2!=''): $nomeproc1 = explode(',', $r->QUALIFICACAOPROCNUBENTE2); ?>
						<br> <span style="font-weight: bold;font-size: 10px;">REPRESENTADO POR SEU PROCURADOR <?=$nomeproc1[0]?> </span>
					<?php endif ?>
					</p>
					<?php endif ?>

					

					<div style="margin-left: 80%; border: 1px solid black; width: 30%; font-size: 8px;margin-bottom: -2cm;margin-top: 20px;"><b style="text-align: center"><br>CERTIFICO que as assinaturas supra de
					<?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?> foram
					lançadas na minha presença.
					<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAENTRADA=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAENTRADA ;
					}
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

					?>. 
					<?php endforeach; endforeach ?>
					</p>
					<p style="text-align: center;">
					___________________________ <br> 
					<?=mb_strtoupper($nome_assinatura)?></p>
					<p style="text-align: center;margin-top: -7px;"><?=$funcao_assinatura?></p>
					</b>
					</div>
		</div>						
<!--ATESTADO DE TESTEMUNHAS-->
		<div style="page-break-before: always;margin-top: 2cm; text-align: justify; padding-left: 2cm; padding-right: 2cm; font-size: 14px;">
					<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<?php $c = PESQUISA_ALL('cadastroserventia');
			foreach ($c as $c ):?>
			<div style="display: block;margin-top: -40px;min-width: 100%;">
			<div style="display: inline-block;width: 17%;">
			<img src="../../images/brasao_ma.png" style="width: 60%;margin-left:28px; margin-top:10px; ">

			</div>
			<div style="display: inline-block;width: 80%; margin-left: -50px;">  
			<h2 style=" text-align: center;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
			<h2 style=" text-align: center;font-size: 12px;margin-top: -18px;
			"><?=$c->strLogradouro?>, <?=$c->strNumero?> -
			<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
			<?php endforeach ?>
			<br>
			Titular da Serventia: <?=$c->strTituloServentia?><br>
			Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
			<?php endforeach ?></h2>
			</div>

			</div>

			<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<hr style="border:1px solid black">
					<h1 style="text-align: center;">ATESTADO DAS TESTEMUNHAS</h1>

		<!--TESTEMUNHAS ------------------------------------------------------------------------------------------------------>
				<p style="text-align: justify;">
				<?php if ($r->NOMETESTEMUNHA1!=''): ?>	
				<?=echo_exist($r->NOMETESTEMUNHA1)?>,

				<?php if ($r->ESTADOCIVILTESTEMUNHA1 == 'CA'): ?>
				casado(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'SO'): ?>
				solteiro(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'DI'): ?>
				divorciado(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'VI'): ?>
				viúvo(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA1 == 'UN'): ?>
				em união estável,
				<?php else: ?>

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA1!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA1)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA1!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA1)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA1!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA1)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA1!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA1)?> <?=echo_exist($r->BAIRROTESTEMUNHA1)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA1!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA1)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA1!=''): ?>
				portador(a) do RG de número <?=$r->RGTESTEMUNHA1?>/<?=$r->ORGAOEMISSORTESTEMUNHA1?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA1!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA1?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA1!=''): ?>
				Com 
				<?=date('Y',strtotime($r->DATAENTRADA)) - date('Y', strtotime($r->DATANASCIMENTOTESTEMUNHA1))?> anos de idade.
				<?php endif ?>
				<?php endif ?>

				<?php if ($r->NOMETESTEMUNHA2!=''): ?>	
				E 
				<?=echo_exist($r->NOMETESTEMUNHA2)?>,

				<?php if ($r->ESTADOCIVILTESTEMUNHA2 == 'CA'): ?>
				casado(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'SO'): ?>
				solteiro(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'DI'): ?>
				divorciado(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'VI'): ?>
				viúvo(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA2 == 'UN'): ?>
				em união estável,
				<?php else: ?>

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA2!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA2)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA2!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA2)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA2!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA2)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA2!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA2)?> <?=echo_exist($r->BAIRROTESTEMUNHA2)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA2!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA2)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA2!=''): ?>
				portador(a) do RG de número <?=$r->RGTESTEMUNHA2?>/<?=$r->ORGAOEMISSORTESTEMUNHA2?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA2!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA2?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA2!=''): ?>
				Com 
				<?=date('Y',strtotime($r->DATAENTRADA)) - date('Y', strtotime($r->DATANASCIMENTOTESTEMUNHA2))?> anos de idade.
				<?php endif ?>
				<?php endif ?>
				<?php if ($r->NOMETESTEMUNHA3!=''): ?>	
				E 
				<?=echo_exist($r->NOMETESTEMUNHA3)?>,

				<?php if ($r->ESTADOCIVILTESTEMUNHA3 == 'CA'): ?>
				casado(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA3 == 'SO'): ?>
				solteiro(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA3 == 'DI'): ?>
				divorciado(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA3 == 'VI'): ?>
				viúvo(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA3 == 'UN'): ?>
				em união estável,
				<?php else: ?>

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA3!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA3)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA3!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA3)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA3!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA3)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA3!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA3)?> <?=echo_exist($r->BAIRROTESTEMUNHA3)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA3!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA3)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA3!=''): ?>
				portador(a) do RG de número <?=$r->RGTESTEMUNHA3?>/<?=$r->ORGAOEMISSORTESTEMUNHA3?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA3!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA3?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA3!=''): ?>
				Com 
				<?=date('Y',strtotime($r->DATAENTRADA)) - date('Y', strtotime($r->DATANASCIMENTOTESTEMUNHA3))?> anos de idade.
				<?php endif ?>
				<?php endif ?>

				<?php if ($r->NOMETESTEMUNHA4!=''): ?>	
				E 
				<?=echo_exist($r->NOMETESTEMUNHA4)?>,

				<?php if ($r->ESTADOCIVILTESTEMUNHA4 == 'CA'): ?>
				casado(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA4 == 'SO'): ?>
				solteiro(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA4 == 'DI'): ?>
				divorciado(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA4 == 'VI'): ?>
				viúvo(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA4 == 'UN'): ?>
				em união estável,
				<?php else: ?>

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA4!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA4)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA4!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA4)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA4!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA4)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA4!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA4)?> <?=echo_exist($r->BAIRROTESTEMUNHA4)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA4!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA4)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA4!=''): ?>
				portador(a) do RG de número <?=$r->RGTESTEMUNHA4?>/<?=$r->ORGAOEMISSORTESTEMUNHA4?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA4!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA4?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA4!=''): ?>
				Com 
				<?=date('Y',strtotime($r->DATAENTRADA)) - date('Y', strtotime($r->DATANASCIMENTOTESTEMUNHA4))?> anos de idade.
				<?php endif ?>
				<?php endif ?>

				<?php if ($r->NOMETESTEMUNHA5!=''): ?>	
				E 
				<?=echo_exist($r->NOMETESTEMUNHA5)?>,

				<?php if ($r->ESTADOCIVILTESTEMUNHA5 == 'CA'): ?>
				casado(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA5 == 'SO'): ?>
				solteiro(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA5 == 'DI'): ?>
				divorciado(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA5 == 'VI'): ?>
				viúvo(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA5 == 'UN'): ?>
				em união estável,
				<?php else: ?>

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA5!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA5)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA5!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA5)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA5!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA5)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA5!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA5)?> <?=echo_exist($r->BAIRROTESTEMUNHA5)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA5!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA5)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA5!=''): ?>
				portador(a) do RG de número <?=$r->RGTESTEMUNHA5?>/<?=$r->ORGAOEMISSORTESTEMUNHA5?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA5!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA5?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA5!=''): ?>
				Com 
				<?=date('Y',strtotime($r->DATAENTRADA)) - date('Y', strtotime($r->DATANASCIMENTOTESTEMUNHA5))?> anos de idade.
				<?php endif ?>
				<?php endif ?>

				<?php if ($r->NOMETESTEMUNHA6!=''): ?>	
				E 
				<?=echo_exist($r->NOMETESTEMUNHA6)?>,

				<?php if ($r->ESTADOCIVILTESTEMUNHA6 == 'CA'): ?>
				casado(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA6 == 'SO'): ?>
				solteiro(a),
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA6 == 'DI'): ?>
				divorciado(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA6 == 'VI'): ?>
				viúvo(a),	
				<?php elseif ($r->ESTADOCIVILTESTEMUNHA6 == 'UN'): ?>
				em união estável,
				<?php else: ?>

				<?php endif ?>
				<?php if ($r->NACIONALIDADETESTEMUNHA6!=''): ?>
				<?=echo_exist($r->NACIONALIDADETESTEMUNHA6)?>,	
				<?php endif ?>


				<?php if ($r->NATURALIDADETESTEMUNHA6!=''): ?>
				natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADETESTEMUNHA6)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?>

				<?php if ($r->PROFISSAOTESTEMUNHA6!=''): ?>
				<?=echo_exist($r->PROFISSAOTESTEMUNHA6)?>(a),
				<?php endif ?>

				<?php if ($r->ENDERECOTESTEMUNHA6!=''): ?> 
				residente e domiciliado(a) em <?=echo_exist($r->ENDERECOTESTEMUNHA6)?> <?=echo_exist($r->BAIRROTESTEMUNHA6)?>,
				<?php endif ?>

				<?php if ($r->CIDADETESTEMUNHA6!=''): ?>	
				<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADETESTEMUNHA6)); foreach($c as $c):?>
				<?=$c->cidade?> (<?=$c->uf?>),<?php endforeach ?>
				<?php endif ?> 

				<?php if ($r->RGTESTEMUNHA6!=''): ?>
				portador(a) do RG de número <?=$r->RGTESTEMUNHA6?>/<?=$r->ORGAOEMISSORTESTEMUNHA6?>,
				<?php endif ?> 
				<?php if ($r->CPFTESTEMUNHA6!=''): ?>
				CPF de número <?=$r->CPFTESTEMUNHA6?>.
				<?php endif ?>

				<?php if ($r->DATANASCIMENTOTESTEMUNHA6!=''): ?>
				Com 
				<?=date('Y',strtotime($r->DATAENTRADA)) - date('Y', strtotime($r->DATANASCIMENTOTESTEMUNHA6))?> anos de idade.
				<?php endif ?>
				<?php endif ?>
				Atestam e juram, se necessário for, que conhecem pessoalmente:

					<span style="font-weight: bold"><?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?> </span>. 

				</p>
		<!--TESTEMUNHAS ------------------------------------------------------------------------------------------------------>


		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify;">O(a) CONTRAENTE
					<?php if ($r->NOMENUBENTE1!=''): ?>	
					<?=mb_strtoupper($r->NOMENUBENTE1)?>,
					
					<?php if ($r->NOMECASADONUBENTE1 == $r->NOMENUBENTE1): ?>
					que permanecerá a usar o mesmo nome,
					<?php else: ?>
					que passará a usar o nome de <?=$r->NOMECASADONUBENTE1?>,
					<?php endif ?>

					<?php if ($r->ESTADOCIVILNUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADENUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADENUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADENUBENTE1!=''): ?>
					natural de 
					<?=cidade_estrangeiro($r->NATURALIDADENUBENTE1)?>
					<?php if (intval($r->NATURALIDADENUBENTE1)!='5300109'): ?>
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE1)?></span>
					<?php endif ?>
					<?php endif ?>

					<?php if ($r->PROFISSAONUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAONUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECONUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECONUBENTE1)?> <?=echo_exist($r->BAIRRONUBENTE1)?>,
					<?php endif ?>

					<?=cidade_estrangeiro($r->CIDADENUBENTE1)?>
					<?php if (intval($r->CIDADENUBENTE1)!='5300109'): ?>
					<?php if ($r->CIDADENUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->CIDADENUBENTE1)?></span>
					<?php endif ?> 

					<?php if ($r->RGNUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGNUBENTE1?>/<?=$r->ORGAOEMISSORNUBENTE1?>,
					<?php endif ?> 
					<?php if ($r->CPFNUBENTE1!=''): ?>
					CPF de número <?=$r->CPFNUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTONUBENTE1!=''): ?>
						Nascido (a) em
						<?php
						$data = $r->DATANASCIMENTONUBENTE1 ;
						$novaDataNoivo = explode("-", $data);

						if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
						echo "Primeiro   ";
						}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
						echo " Dois  ";
						} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
						echo " Três ";
						} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
						echo " Quatro  ";
						} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
						echo " Cinco  ";
						} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
						echo " Seis  ";
						} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
						echo " Sete  ";
						} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
						echo " Oito  ";
						} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
						echo " Nove  ";
						} else {echo  dataum($novaDataNoivo[2]);}
						//Será exibido na tela a data: 16/02/2015
						// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
						if ($novaDataNoivo[1] == '01' || $novaDataNoivo[1] == '1') {
						echo " de Janeiro de ";
						}elseif ($novaDataNoivo[1] == '02' || $novaDataNoivo[1] == '2') {
						echo " de Fevereiro de ";
						} elseif ($novaDataNoivo[1] == '03' || $novaDataNoivo[1] == '3') {
						echo " de Março de ";
						} elseif ($novaDataNoivo[1] == '04' || $novaDataNoivo[1] == '4') {
						echo " de Abril de ";
						} elseif ($novaDataNoivo[1] == '05' || $novaDataNoivo[1] == '5') {
						echo " de Maio de ";
						} elseif ($novaDataNoivo[1] == '06' || $novaDataNoivo[1] == '6') {
						echo " de Junho de ";
						} elseif ($novaDataNoivo[1] == '07' || $novaDataNoivo[1] == '7') {
						echo " de Julho de ";
						} elseif ($novaDataNoivo[1] == '08' || $novaDataNoivo[1] == '8') {
						echo " de Agosto de ";
						} elseif ($novaDataNoivo[1] == '09' || $novaDataNoivo[1] == '9') {
						echo " de Setembro de ";
						} elseif ($novaDataNoivo[1] == '10') {
						echo " de Outubro de ";
						} elseif ($novaDataNoivo[1] == '11') {
						echo " de Novembro de ";
						} elseif ($novaDataNoivo[1] == '12') {
						echo " de Dezembro de ";
						} else {
						echo "Não definido";
						}

						$udg = substr($novaDataNoivo[0],  2,3);
						if ($udg == '01' || $udg == '1' ||$udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE1))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE1, $r->DATAENTRADA)?> anos de idade.
					<?php endif ?>
					<?php endif ?>
					<?php if ($r->strTituloEleitorNoivo!=''): ?>
					Titulo de Eleitor nº <?=$r->strTituloEleitorNoivo?>.
					<?php endif ?>
					<?php if ($r->strCtpsNoivo!=''): ?>
					CTPS nº <?=$r->strCtpsNoivo?>.
					<?php endif ?>
					<?php if ($r->strPassaporteNoivo!=''): ?>
					Passaporte nº <?=$r->strPassaporteNoivo?>.
					<?php endif ?>
					<?php if ($r->strPisNisNoivo!=''): ?>
					PIS/NIS: nº <?=$r->strPisNisNoivo?>.
					<?php endif ?>
					<?php if ($r->strCartaoSaudeNoivo!=''): ?>
					Cartão Saúde: nº <?=$r->strCartaoSaudeNoivo?>.
					<?php endif ?>


					Filho(a) de 

					<?php if ($r->NOMEPAINUBENTE1!=''): ?>	
					<?=echo_exist($r->NOMEPAINUBENTE1)?>,
					<?php if ($r->ESTADOCIVILPAINUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEPAINUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADEPAINUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEPAINUBENTE1!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAINUBENTE1)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEPAINUBENTE1) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEPAINUBENTE1)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
					<?php endif ?>

					<?php if ($r->PROFISSAOPAINUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAOPAINUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOPAINUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOPAINUBENTE1)?> <?=echo_exist($r->BAIRROPAINUBENTE1)?>,
					<?php endif ?>

					<?php if ($r->CIDADEPAINUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAINUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGPAINUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGPAINUBENTE1?>/<?=$r->ORGAOEMISSORPAINUBENTE1?>,
					<?php endif ?> 
					<?php if ($r->CPFPAINUBENTE1!=''): ?>
					CPF de número <?=$r->CPFPAINUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOPAINUBENTE1!=''): ?>
						Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOPAINUBENTE1, $r->DATAENTRADA)?> anos de idade. E de 
					<?php endif ?>
					<?php endif ?>		

					<?php if ($r->NOMEMAENUBENTE1!=''): ?>	
					<?=echo_exist($r->NOMEMAENUBENTE1)?>,
					<?php if ($r->ESTADOCIVILMAENUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEMAENUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADEMAENUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEMAENUBENTE1!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAENUBENTE1)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEMAENUBENTE1) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEMAENUBENTE1)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
					<?php endif ?>


					<?php if ($r->PROFISSAOMAENUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAOMAENUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOMAENUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOMAENUBENTE1)?> <?=echo_exist($r->BAIRROMAENUBENTE1)?>,
					<?php endif ?>

					<?php if ($r->CIDADEMAENUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGMAENUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGMAENUBENTE1?>/<?=$r->ORGAOEMISSORMAENUBENTE1?>, 
					<?php endif ?>
					<?php if ($r->CPFMAENUBENTE1!=''): ?>
					CPF de número <?=$r->CPFMAENUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOMAENUBENTE1!=''): ?>
						Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOMAENUBENTE1,$r->DATAENTRADA)?> anos de idade. 
					<?php endif ?>
					<?php endif ?>
			 </p>
		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->

		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify;">O(a) CONTRAENTE
					<?php if ($r->NOMENUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMENUBENTE2)?>,

					<?php if ($r->NOMECASADONUBENTE2 == $r->NOMENUBENTE2): ?>
					que permanecerá a usar o mesmo nome,
					<?php else: ?>
					que passará a usar o nome de <?=$r->NOMECASADONUBENTE2?>,
					<?php endif ?>

					<?php if ($r->ESTADOCIVILNUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADENUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADENUBENTE2)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADENUBENTE2!=''): ?>
					natural de 
					<?=cidade_estrangeiro($r->NATURALIDADENUBENTE2)?>
					<?php if (intval($r->NATURALIDADENUBENTE2)!='5300109'): ?>
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE2)?></span>
					<?php endif ?>
					<?php endif ?>

					<?php if ($r->PROFISSAONUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAONUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECONUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECONUBENTE2)?> <?=echo_exist($r->BAIRRONUBENTE2)?>,
					<?php endif ?>

					<?=cidade_estrangeiro($r->CIDADENUBENTE2)?>
					<?php if (intval($r->CIDADENUBENTE2)!='5300109'): ?>
					<?php if ($r->CIDADENUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE2)?></span>
					<?php endif ?> 

					<?php if ($r->RGNUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGNUBENTE2?>/<?=$r->ORGAOEMISSORNUBENTE2?>,
					<?php endif ?> 
					<?php if ($r->CPFNUBENTE2!=''): ?>
					CPF de número <?=$r->CPFNUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTONUBENTE2!=''): ?>
						Nascido (a) em
						<?php
						$data = $r->DATANASCIMENTONUBENTE2 ;
						$novaDataNoivo = explode("-", $data);

						if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
						echo "Primeiro   ";
						}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
						echo " Dois  ";
						} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
						echo " Três ";
						} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
						echo " Quatro  ";
						} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
						echo " Cinco  ";
						} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
						echo " Seis  ";
						} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
						echo " Sete  ";
						} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
						echo " Oito  ";
						} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
						echo " Nove  ";
						} else {echo  dataum($novaDataNoivo[2]);}
						//Será exibido na tela a data: 16/02/2015
						// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
						if ($novaDataNoivo[1] == '01' || $novaDataNoivo[1] == '1') {
						echo " de Janeiro de ";
						}elseif ($novaDataNoivo[1] == '02' || $novaDataNoivo[1] == '2') {
						echo " de Fevereiro de ";
						} elseif ($novaDataNoivo[1] == '03' || $novaDataNoivo[1] == '3') {
						echo " de Março de ";
						} elseif ($novaDataNoivo[1] == '04' || $novaDataNoivo[1] == '4') {
						echo " de Abril de ";
						} elseif ($novaDataNoivo[1] == '05' || $novaDataNoivo[1] == '5') {
						echo " de Maio de ";
						} elseif ($novaDataNoivo[1] == '06' || $novaDataNoivo[1] == '6') {
						echo " de Junho de ";
						} elseif ($novaDataNoivo[1] == '07' || $novaDataNoivo[1] == '7') {
						echo " de Julho de ";
						} elseif ($novaDataNoivo[1] == '08' || $novaDataNoivo[1] == '8') {
						echo " de Agosto de ";
						} elseif ($novaDataNoivo[1] == '09' || $novaDataNoivo[1] == '9') {
						echo " de Setembro de ";
						} elseif ($novaDataNoivo[1] == '10') {
						echo " de Outubro de ";
						} elseif ($novaDataNoivo[1] == '11') {
						echo " de Novembro de ";
						} elseif ($novaDataNoivo[1] == '12') {
						echo " de Dezembro de ";
						} else {
						echo "Não definido";
						}

						$udg = substr($novaDataNoivo[0],  2,3);
						if ($udg == '01' || $udg == '1' ||$udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE2))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE2,$r->DATAENTRADA)?> anos de idade.
					<?php endif ?>
					<?php endif ?>
					<?php if ($r->strTituloEleitorNoiva!=''): ?>
					Titulo de Eleitor nº <?=$r->strTituloEleitorNoiva?>.
					<?php endif ?>
					<?php if ($r->strCtpsNoiva!=''): ?>
					CTPS nº <?=$r->strCtpsNoiva?>.
					<?php endif ?>
					<?php if ($r->strPassaporteNoiva!=''): ?>
					Passaporte nº <?=$r->strPassaporteNoiva?>.
					<?php endif ?>
					<?php if ($r->strPisNisNoiva!=''): ?>
					PIS/NIS: nº <?=$r->strPisNisNoiva?>.
					<?php endif ?>
					<?php if ($r->strCartaoSaudeNoiva!=''): ?>
					Cartão Saúde: nº <?=$r->strCartaoSaudeNoiva?>.
					<?php endif ?> 


					Filho(a) de 

					<?php if ($r->NOMEPAINUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMEPAINUBENTE2)?>,
					<?php if ($r->ESTADOCIVILPAINUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEPAINUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADEPAINUBENTE2)?>,	
					<?php endif ?>
					

					<?php if ($r->NATURALIDADEPAINUBENTE2!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAINUBENTE2)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEPAINUBENTE2) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEPAINUBENTE2)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
					<?php endif ?>


					<?php if ($r->PROFISSAOPAINUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAOPAINUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOPAINUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOPAINUBENTE2)?> <?=echo_exist($r->BAIRROPAINUBENTE2)?>,
					<?php endif ?>

					<?php if ($r->CIDADEPAINUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAINUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGPAINUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGPAINUBENTE2?>/<?=$r->ORGAOEMISSORPAINUBENTE2?>,
					<?php endif ?> 
					<?php if ($r->CPFPAINUBENTE2!=''): ?>
					CPF de número <?=$r->CPFPAINUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOPAINUBENTE2!=''): ?>
					Nascido (a) em
					<?php

					$data = $r->DATANASCIMENTOPAINUBENTE2 ;
					$novaDataNoivo = explode("-", $data);

					if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
						echo "Primeiro   ";
					}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
						echo " Dois  ";
					} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
						echo " Três ";
					} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
						echo " Quatro  ";
					} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
						echo " Cinco  ";
					} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
						echo " Seis  ";
					} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
						echo " Sete  ";
					} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
						echo " Oito  ";
					} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
						echo " Nove  ";
					} else {echo  dataum($novaDataNoivo[2]);}
					//Será exibido na tela a data: 16/02/2015
					// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
					if ($novaDataNoivo[1] == '01' || $novaDataNoivo[1] == '1') {
						echo " de Janeiro de ";
					}elseif ($novaDataNoivo[1] == '02' || $novaDataNoivo[1] == '2') {
						echo " de Fevereiro de ";
					} elseif ($novaDataNoivo[1] == '03' || $novaDataNoivo[1] == '3') {
						echo " de Março de ";
					} elseif ($novaDataNoivo[1] == '04' || $novaDataNoivo[1] == '4') {
						echo " de Abril de ";
					} elseif ($novaDataNoivo[1] == '05' || $novaDataNoivo[1] == '5') {
						echo " de Maio de ";
					} elseif ($novaDataNoivo[1] == '06' || $novaDataNoivo[1] == '6') {
						echo " de Junho de ";
					} elseif ($novaDataNoivo[1] == '07' || $novaDataNoivo[1] == '7') {
						echo " de Julho de ";
					} elseif ($novaDataNoivo[1] == '08' || $novaDataNoivo[1] == '8') {
						echo " de Agosto de ";
					} elseif ($novaDataNoivo[1] == '09' || $novaDataNoivo[1] == '9') {
						echo " de Setembro de ";
					} elseif ($novaDataNoivo[1] == '10') {
						echo " de Outubro de ";
					} elseif ($novaDataNoivo[1] == '11') {
						echo " de Novembro de ";
					} elseif ($novaDataNoivo[1] == '12') {
						echo " de Dezembro de ";
					} else {
						echo "Não definido";
					}

					 $udg = substr($novaDataNoivo[0], 2,3);
					  if ($udg == '01' || $udg == '1') {
					   echo GExtenso::numero($novaDataNoivo[0]).'  um';
					  }
					  else{
					    echo GExtenso::numero($novaDataNoivo[0]);
					  }
					  

					?>, Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOPAINUBENTE2, $r->DATAENTRADA)?> anos de idade. E de 
					<?php endif ?>
					<?php endif ?>		

					<?php if ($r->NOMEMAENUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMEMAENUBENTE2)?>,
					<?php if ($r->ESTADOCIVILMAENUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEMAENUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADEMAENUBENTE2)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEMAENUBENTE2!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAENUBENTE2)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEMAENUBENTE2) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEMAENUBENTE2)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
					<?php endif ?>

					<?php if ($r->PROFISSAOMAENUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAOMAENUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOMAENUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOMAENUBENTE2)?> <?=echo_exist($r->BAIRROMAENUBENTE2)?>,
					<?php endif ?>

					<?php if ($r->CIDADEMAENUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGMAENUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGMAENUBENTE2?>/<?=$r->ORGAOEMISSORMAENUBENTE2?>, 
					<?php endif ?>
					<?php if ($r->CPFMAENUBENTE2!=''): ?>
					CPF de número <?=$r->CPFMAENUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOMAENUBENTE2!=''): ?>
						Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOMAENUBENTE2, $r->DATAENTRADA)?> anos de idade. 
					<?php endif ?>
					<?php endif ?>
			 </p>
		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->
				<p style="text-align: justify;">
					Por isso, afirmam que entre os mesmos não existe parentesco e nenhum outro
					impedimento que os inibam de casar-se.

					<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAENTRADA=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAENTRADA ;
					}
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

					?>. 
					<?php endforeach; endforeach ?>
					</p></p>

					<p style="text-align: center;font-size: 10px">
					________________________________	<br>	
					<?=$r->NOMETESTEMUNHA1?>
					</p>

					<p style="text-align: center;font-size: 10px">
					________________________________ <br>	
					<?=$r->NOMETESTEMUNHA2?> 
					</p>
					
					<?php if ($r->NOMETESTEMUNHA3!='' && $r->NOMETESTEMUNHA3!='NULL' ): ?>
					<p style="text-align: center;font-size: 10px">
					________________________________ <br>	
					<?=$r->NOMETESTEMUNHA3?> 
					</p>
					<?php endif ?>

					<?php if ($r->NOMETESTEMUNHA4!='' && $r->NOMETESTEMUNHA4!='NULL' ): ?>
					<p style="text-align: center;font-size: 10px">
					________________________________ <br>	
					<?=$r->NOMETESTEMUNHA4?> 
					</p>
					<?php endif ?>

					<?php if ($r->NOMETESTEMUNHA5!='' && $r->NOMETESTEMUNHA5!='NULL' ): ?>
					<p style="text-align: center;font-size: 10px">
					________________________________ <br>	
					<?=$r->NOMETESTEMUNHA5?> 
					</p>
					<?php endif ?>

					<?php if ($r->NOMETESTEMUNHA6!='' && $r->NOMETESTEMUNHA6!='NULL' ): ?>
					<p style="text-align: center;font-size: 10px">
					________________________________ <br>	
					<?=$r->NOMETESTEMUNHA6?> 
					</p>
					<?php endif ?>

					<div style="position: absolute;margin-left: 60%;margin-top: -100px; border: 1px solid black; width: 20%; font-size: 6px;"><b style="text-align: center"><br>CERTIFICO que as assinaturas supra de
					<?=$r->NOMETESTEMUNHA1?> e <?=$r->NOMETESTEMUNHA2?> 
					<?php if ($r->NOMETESTEMUNHA3!='' && $r->NOMETESTEMUNHA3!='NULL' ): ?>e <?=$r->NOMETESTEMUNHA3?><?php endif ?>
					<?php if ($r->NOMETESTEMUNHA4!='' && $r->NOMETESTEMUNHA4!='NULL' ): ?>e <?=$r->NOMETESTEMUNHA4?><?php endif ?>
					<?php if ($r->NOMETESTEMUNHA5!='' && $r->NOMETESTEMUNHA5!='NULL' ): ?>e <?=$r->NOMETESTEMUNHA5?><?php endif ?>
					<?php if ($r->NOMETESTEMUNHA6!='' && $r->NOMETESTEMUNHA6!='NULL' ): ?>e <?=$r->NOMETESTEMUNHA6?><?php endif ?>
					foram
					lançadas na minha presença.
					<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAENTRADA=='') {
					$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAENTRADA ;
					}
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

					?>. 
					<?php endforeach; endforeach ?>
					</p>
					<p style="text-align: center;">
					___________________________ <br> 
					<?=mb_strtoupper($nome_assinatura)?></p>
					<p style="text-align: center;margin-top: -7px;"><?=$funcao_assinatura?></p>
					</b>
					</div>
		</div>
<!--EDITAL DE PROCLAMAS 1-->
		<div style="page-break-before: always;margin-top: 2cm; text-align: justify; padding-left: 2cm; padding-right: 1cm; font-size: 14px;">
					<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<?php $c = PESQUISA_ALL('cadastroserventia');
			foreach ($c as $c ):?>
			<div style="display: block;margin-top: -40px;min-width: 100%;">
			<div style="display: inline-block;width: 17%;">
			<img src="../../images/brasao_ma.png" style="width: 60%;margin-left:28px; margin-top:10px; ">

			</div>
			<div style="display: inline-block;width: 80%; margin-left: -50px;">  
			<h2 style=" text-align: center;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
			<h2 style=" text-align: center;font-size: 12px;margin-top: -18px;
			"><?=$c->strLogradouro?>, <?=$c->strNumero?> -
			<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
			<?php endforeach ?>
			<br>
			Titular da Serventia: <?=$c->strTituloServentia?><br>
			Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
			<?php endforeach ?></h2>
			</div>

			</div>

			<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<hr style="border:1px solid black">
					<div style="width: 100%;" >
					<h3 style="text-align: left;display: inline;margin-left: 1cm">LIVRO: D <?=intval($r->LIVROPROCLAMAS)?></h3>
					<h3 style="text-align: center; display: inline;margin-left: 3cm;">ORDEM: <?=$r->TERMOPROCLAMAS?></h3>
					<h3 style="text-align: right; display: inline;margin-left: 3cm;">FOLHA: <?=intval($r->FOLHAPROCLAMAS)?></h3>	
					</div>
					<h1 style="text-align: center;">EDITAL DE PROCLAMAS</h1>
					<br>
					<?php 
					if (!empty($r->DATAENTRADA)) {



					$busca_serventia = $pdo->prepare("SELECT * FROM cadastroserventia");
					$busca_serventia->execute();
					$serv = $busca_serventia->fetch(PDO::FETCH_ASSOC);
					$cns = str_pad($serv['strCNS'],6,"0", STR_PAD_LEFT);
					$acervo= str_pad($serv['setTipoAcervo'],2,"0", STR_PAD_LEFT);
					$livro = str_pad($r->LIVROPROCLAMAS, 5, "0", STR_PAD_LEFT);
					$folha = str_pad($r->FOLHAPROCLAMAS, 3, "0", STR_PAD_LEFT);
					$termo = str_pad($r->TERMOPROCLAMAS, 7, "0", STR_PAD_LEFT);
					$dataRegistro = explode("-", $r->DATAENTRADA);
					$tipoLivro  = '06';
					$matricula = $cns.$acervo.'55'.$dataRegistro[0].$tipoLivro.$livro.$folha.str_pad($termo,7,"0", STR_PAD_LEFT);

					$qtdMatricula=strlen($matricula);
					$valorUnicoMatricula = [];
					for ($i=1; $i <= 31 ; ++$i) {
					$valorUnicoMatricula = substr($matricula, 0, $i);
					}


					############################Calculo Digito 1 ##################
					$multiplicadorFase1 = "32";
					$valor =[];
					$soma = "0";
					for ($i=0; $i < 30; $i++) {
					$multiplicadorFase1--;
					//echo "<br>===".$valorUnicoMatricula[$i]."==".$multiplicadorFase1."===";
					$valor[$i] = $valorUnicoMatricula[$i]*$multiplicadorFase1;
					$soma += $valor[$i];
					}
					//Valor do digito 1 = é o resto de soma1 * 10 / 11

					$digito1 = ($soma*10)%11;
					if (strlen($digito1) >1 )  {
					$digito1 = $digito1/10;
					}
					############################fecha Calculo Digito 1 ##################

					############################Calculo Digito 2 ##################
					$valor2 =[];
					$soma2 = "0";
					$multiplicadorFase2 = "33";
					for ($j=0; $j < 30; $j++) {
					$multiplicadorFase2--;
					//echo "<br>===".$valorUnicoMatricula[$j]."==".$multiplicadorFase2."===";
					$valor2[$j] = $valorUnicoMatricula[$j]*$multiplicadorFase2;
					$soma2 += $valor2[$j];
					}
					//Soma + Soma*multiplicacao do ultimo digito1
					$soma2 = $soma2+($digito1*2);
					//Digito 2 = é o resto de soma2 * 10 / 11
					$digito2 = (($soma2*10)%11);
					############################fecha calculo Digito 2 ##################
					if (strlen($digito2) >1 )  {
					$digito2 = $digito2/10;
					}

					$matricula = $cns.' '.$acervo.' '.'55'.' '.$dataRegistro[0].' '.$tipoLivro.' '.$livro.' '.$folha.' '.str_pad($termo,7,"0", STR_PAD_LEFT).' '.$digito1.$digito2;

					}
					else{
						$matricula = '';
					}
					?>
					<h2 style="text-align: center;"><?=$matricula?></h2>
					<br>
					<p style="text-align: center">Faço saber que pretendem casar-se:
					
					<span style="font-weight: bold"><?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?></span></p>
		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify;">O(a) CONTRAENTE
					<?php if ($r->NOMENUBENTE1!=''): ?>	
					<?=mb_strtoupper($r->NOMENUBENTE1)?>,
					
					<?php if ($r->NOMECASADONUBENTE1 == $r->NOMENUBENTE1): ?>
					que permanecerá a usar o mesmo nome,
					<?php else: ?>
					que passará a usar o nome de <?=$r->NOMECASADONUBENTE1?>,
					<?php endif ?>

					<?php if ($r->ESTADOCIVILNUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADENUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADENUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADENUBENTE1!=''): ?>
					natural de 
					<?=cidade_estrangeiro($r->NATURALIDADENUBENTE1)?>
					<?php if (intval($r->NATURALIDADENUBENTE1)!='5300109'): ?>
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE1)?></span>
					<?php endif ?>
					<?php endif ?>

					<?php if ($r->PROFISSAONUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAONUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECONUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECONUBENTE1)?> <?=echo_exist($r->BAIRRONUBENTE1)?>,
					<?php endif ?>

					<?=cidade_estrangeiro($r->CIDADENUBENTE1)?>
					<?php if (intval($r->CIDADENUBENTE1)!='5300109'): ?>
					<?php if ($r->CIDADENUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->CIDADENUBENTE1)?></span>
					<?php endif ?> 

					<?php if ($r->RGNUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGNUBENTE1?>/<?=$r->ORGAOEMISSORNUBENTE1?>,
					<?php endif ?> 
					<?php if ($r->CPFNUBENTE1!=''): ?>
					CPF de número <?=$r->CPFNUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTONUBENTE1!=''): ?>
						Nascido (a) em
						<?php
						$data = $r->DATANASCIMENTONUBENTE1 ;
						$novaDataNoivo = explode("-", $data);

						if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
						echo "Primeiro   ";
						}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
						echo " Dois  ";
						} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
						echo " Três ";
						} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
						echo " Quatro  ";
						} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
						echo " Cinco  ";
						} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
						echo " Seis  ";
						} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
						echo " Sete  ";
						} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
						echo " Oito  ";
						} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
						echo " Nove  ";
						} else {echo  dataum($novaDataNoivo[2]);}
						//Será exibido na tela a data: 16/02/2015
						// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
						if ($novaDataNoivo[1] == '01' || $novaDataNoivo[1] == '1') {
						echo " de Janeiro de ";
						}elseif ($novaDataNoivo[1] == '02' || $novaDataNoivo[1] == '2') {
						echo " de Fevereiro de ";
						} elseif ($novaDataNoivo[1] == '03' || $novaDataNoivo[1] == '3') {
						echo " de Março de ";
						} elseif ($novaDataNoivo[1] == '04' || $novaDataNoivo[1] == '4') {
						echo " de Abril de ";
						} elseif ($novaDataNoivo[1] == '05' || $novaDataNoivo[1] == '5') {
						echo " de Maio de ";
						} elseif ($novaDataNoivo[1] == '06' || $novaDataNoivo[1] == '6') {
						echo " de Junho de ";
						} elseif ($novaDataNoivo[1] == '07' || $novaDataNoivo[1] == '7') {
						echo " de Julho de ";
						} elseif ($novaDataNoivo[1] == '08' || $novaDataNoivo[1] == '8') {
						echo " de Agosto de ";
						} elseif ($novaDataNoivo[1] == '09' || $novaDataNoivo[1] == '9') {
						echo " de Setembro de ";
						} elseif ($novaDataNoivo[1] == '10') {
						echo " de Outubro de ";
						} elseif ($novaDataNoivo[1] == '11') {
						echo " de Novembro de ";
						} elseif ($novaDataNoivo[1] == '12') {
						echo " de Dezembro de ";
						} else {
						echo "Não definido";
						}

						$udg = substr($novaDataNoivo[0],  2,3);
						if ($udg == '01' || $udg == '1' ||$udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE1))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE1, $r->DATAENTRADA)?> anos de idade.
					<?php endif ?>
					<?php endif ?>
					<?php if ($r->strTituloEleitorNoivo!=''): ?>
					Titulo de Eleitor nº <?=$r->strTituloEleitorNoivo?>.
					<?php endif ?>
					<?php if ($r->strCtpsNoivo!=''): ?>
					CTPS nº <?=$r->strCtpsNoivo?>.
					<?php endif ?>
					<?php if ($r->strPassaporteNoivo!=''): ?>
					Passaporte nº <?=$r->strPassaporteNoivo?>.
					<?php endif ?>
					<?php if ($r->strPisNisNoivo!=''): ?>
					PIS/NIS: nº <?=$r->strPisNisNoivo?>.
					<?php endif ?>
					<?php if ($r->strCartaoSaudeNoivo!=''): ?>
					Cartão Saúde: nº <?=$r->strCartaoSaudeNoivo?>.
					<?php endif ?>


					Filho(a) de 

					<?php if ($r->NOMEPAINUBENTE1!=''): ?>	
					<?=echo_exist($r->NOMEPAINUBENTE1)?>,
					<?php if ($r->ESTADOCIVILPAINUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEPAINUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADEPAINUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEPAINUBENTE1!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAINUBENTE1)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEPAINUBENTE1) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEPAINUBENTE1)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
					<?php endif ?>

					<?php if ($r->PROFISSAOPAINUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAOPAINUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOPAINUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOPAINUBENTE1)?> <?=echo_exist($r->BAIRROPAINUBENTE1)?>,
					<?php endif ?>

					<?php if ($r->CIDADEPAINUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAINUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGPAINUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGPAINUBENTE1?>/<?=$r->ORGAOEMISSORPAINUBENTE1?>,
					<?php endif ?> 
					<?php if ($r->CPFPAINUBENTE1!=''): ?>
					CPF de número <?=$r->CPFPAINUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOPAINUBENTE1!=''): ?>
						Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOPAINUBENTE1, $r->DATAENTRADA)?> anos de idade. E de 
					<?php endif ?>
					<?php endif ?>		

					<?php if ($r->NOMEMAENUBENTE1!=''): ?>	
					<?=echo_exist($r->NOMEMAENUBENTE1)?>,
					<?php if ($r->ESTADOCIVILMAENUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEMAENUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADEMAENUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEMAENUBENTE1!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAENUBENTE1)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEMAENUBENTE1) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEMAENUBENTE1)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
					<?php endif ?>


					<?php if ($r->PROFISSAOMAENUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAOMAENUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOMAENUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOMAENUBENTE1)?> <?=echo_exist($r->BAIRROMAENUBENTE1)?>,
					<?php endif ?>

					<?php if ($r->CIDADEMAENUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGMAENUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGMAENUBENTE1?>/<?=$r->ORGAOEMISSORMAENUBENTE1?>, 
					<?php endif ?>
					<?php if ($r->CPFMAENUBENTE1!=''): ?>
					CPF de número <?=$r->CPFMAENUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOMAENUBENTE1!=''): ?>
						Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOMAENUBENTE1,$r->DATAENTRADA)?> anos de idade. 
					<?php endif ?>
					<?php endif ?>
			 </p>
		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->

		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify;">O(a) CONTRAENTE
					<?php if ($r->NOMENUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMENUBENTE2)?>,

					<?php if ($r->NOMECASADONUBENTE2 == $r->NOMENUBENTE2): ?>
					que permanecerá a usar o mesmo nome,
					<?php else: ?>
					que passará a usar o nome de <?=$r->NOMECASADONUBENTE2?>,
					<?php endif ?>

					<?php if ($r->ESTADOCIVILNUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADENUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADENUBENTE2)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADENUBENTE2!=''): ?>
					natural de 
					<?=cidade_estrangeiro($r->NATURALIDADENUBENTE2)?>
					<?php if (intval($r->NATURALIDADENUBENTE2)!='5300109'): ?>
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE2)?></span>
					<?php endif ?>
					<?php endif ?>

					<?php if ($r->PROFISSAONUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAONUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECONUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECONUBENTE2)?> <?=echo_exist($r->BAIRRONUBENTE2)?>,
					<?php endif ?>

					<?=cidade_estrangeiro($r->CIDADENUBENTE2)?>
					<?php if (intval($r->CIDADENUBENTE2)!='5300109'): ?>
					<?php if ($r->CIDADENUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE2)?></span>
					<?php endif ?> 

					<?php if ($r->RGNUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGNUBENTE2?>/<?=$r->ORGAOEMISSORNUBENTE2?>,
					<?php endif ?> 
					<?php if ($r->CPFNUBENTE2!=''): ?>
					CPF de número <?=$r->CPFNUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTONUBENTE2!=''): ?>
						Nascido (a) em
						<?php
						$data = $r->DATANASCIMENTONUBENTE2 ;
						$novaDataNoivo = explode("-", $data);

						if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
						echo "Primeiro   ";
						}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
						echo " Dois  ";
						} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
						echo " Três ";
						} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
						echo " Quatro  ";
						} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
						echo " Cinco  ";
						} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
						echo " Seis  ";
						} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
						echo " Sete  ";
						} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
						echo " Oito  ";
						} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
						echo " Nove  ";
						} else {echo  dataum($novaDataNoivo[2]);}
						//Será exibido na tela a data: 16/02/2015
						// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
						if ($novaDataNoivo[1] == '01' || $novaDataNoivo[1] == '1') {
						echo " de Janeiro de ";
						}elseif ($novaDataNoivo[1] == '02' || $novaDataNoivo[1] == '2') {
						echo " de Fevereiro de ";
						} elseif ($novaDataNoivo[1] == '03' || $novaDataNoivo[1] == '3') {
						echo " de Março de ";
						} elseif ($novaDataNoivo[1] == '04' || $novaDataNoivo[1] == '4') {
						echo " de Abril de ";
						} elseif ($novaDataNoivo[1] == '05' || $novaDataNoivo[1] == '5') {
						echo " de Maio de ";
						} elseif ($novaDataNoivo[1] == '06' || $novaDataNoivo[1] == '6') {
						echo " de Junho de ";
						} elseif ($novaDataNoivo[1] == '07' || $novaDataNoivo[1] == '7') {
						echo " de Julho de ";
						} elseif ($novaDataNoivo[1] == '08' || $novaDataNoivo[1] == '8') {
						echo " de Agosto de ";
						} elseif ($novaDataNoivo[1] == '09' || $novaDataNoivo[1] == '9') {
						echo " de Setembro de ";
						} elseif ($novaDataNoivo[1] == '10') {
						echo " de Outubro de ";
						} elseif ($novaDataNoivo[1] == '11') {
						echo " de Novembro de ";
						} elseif ($novaDataNoivo[1] == '12') {
						echo " de Dezembro de ";
						} else {
						echo "Não definido";
						}

						$udg = substr($novaDataNoivo[0],  2,3);
						if ($udg == '01' || $udg == '1' ||$udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE2))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE2,$r->DATAENTRADA)?> anos de idade.
					<?php endif ?>
					<?php endif ?>
					<?php if ($r->strTituloEleitorNoiva!=''): ?>
					Titulo de Eleitor nº <?=$r->strTituloEleitorNoiva?>.
					<?php endif ?>
					<?php if ($r->strCtpsNoiva!=''): ?>
					CTPS nº <?=$r->strCtpsNoiva?>.
					<?php endif ?>
					<?php if ($r->strPassaporteNoiva!=''): ?>
					Passaporte nº <?=$r->strPassaporteNoiva?>.
					<?php endif ?>
					<?php if ($r->strPisNisNoiva!=''): ?>
					PIS/NIS: nº <?=$r->strPisNisNoiva?>.
					<?php endif ?>
					<?php if ($r->strCartaoSaudeNoiva!=''): ?>
					Cartão Saúde: nº <?=$r->strCartaoSaudeNoiva?>.
					<?php endif ?> 


					Filho(a) de 

					<?php if ($r->NOMEPAINUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMEPAINUBENTE2)?>,
					<?php if ($r->ESTADOCIVILPAINUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILPAINUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEPAINUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADEPAINUBENTE2)?>,	
					<?php endif ?>
					

					<?php if ($r->NATURALIDADEPAINUBENTE2!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEPAINUBENTE2)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEPAINUBENTE2) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEPAINUBENTE2)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
					<?php endif ?>


					<?php if ($r->PROFISSAOPAINUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAOPAINUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOPAINUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOPAINUBENTE2)?> <?=echo_exist($r->BAIRROPAINUBENTE2)?>,
					<?php endif ?>

					<?php if ($r->CIDADEPAINUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEPAINUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGPAINUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGPAINUBENTE2?>/<?=$r->ORGAOEMISSORPAINUBENTE2?>,
					<?php endif ?> 
					<?php if ($r->CPFPAINUBENTE2!=''): ?>
					CPF de número <?=$r->CPFPAINUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOPAINUBENTE2!=''): ?>
					Nascido (a) em
					<?php

					$data = $r->DATANASCIMENTOPAINUBENTE2 ;
					$novaDataNoivo = explode("-", $data);

					if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
						echo "Primeiro   ";
					}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
						echo " Dois  ";
					} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
						echo " Três ";
					} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
						echo " Quatro  ";
					} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
						echo " Cinco  ";
					} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
						echo " Seis  ";
					} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
						echo " Sete  ";
					} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
						echo " Oito  ";
					} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
						echo " Nove  ";
					} else {echo  dataum($novaDataNoivo[2]);}
					//Será exibido na tela a data: 16/02/2015
					// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
					if ($novaDataNoivo[1] == '01' || $novaDataNoivo[1] == '1') {
						echo " de Janeiro de ";
					}elseif ($novaDataNoivo[1] == '02' || $novaDataNoivo[1] == '2') {
						echo " de Fevereiro de ";
					} elseif ($novaDataNoivo[1] == '03' || $novaDataNoivo[1] == '3') {
						echo " de Março de ";
					} elseif ($novaDataNoivo[1] == '04' || $novaDataNoivo[1] == '4') {
						echo " de Abril de ";
					} elseif ($novaDataNoivo[1] == '05' || $novaDataNoivo[1] == '5') {
						echo " de Maio de ";
					} elseif ($novaDataNoivo[1] == '06' || $novaDataNoivo[1] == '6') {
						echo " de Junho de ";
					} elseif ($novaDataNoivo[1] == '07' || $novaDataNoivo[1] == '7') {
						echo " de Julho de ";
					} elseif ($novaDataNoivo[1] == '08' || $novaDataNoivo[1] == '8') {
						echo " de Agosto de ";
					} elseif ($novaDataNoivo[1] == '09' || $novaDataNoivo[1] == '9') {
						echo " de Setembro de ";
					} elseif ($novaDataNoivo[1] == '10') {
						echo " de Outubro de ";
					} elseif ($novaDataNoivo[1] == '11') {
						echo " de Novembro de ";
					} elseif ($novaDataNoivo[1] == '12') {
						echo " de Dezembro de ";
					} else {
						echo "Não definido";
					}

					 $udg = substr($novaDataNoivo[0], 2,3);
					  if ($udg == '01' || $udg == '1') {
					   echo GExtenso::numero($novaDataNoivo[0]).'  um';
					  }
					  else{
					    echo GExtenso::numero($novaDataNoivo[0]);
					  }
					  

					?>, Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOPAINUBENTE2, $r->DATAENTRADA)?> anos de idade. E de 
					<?php endif ?>
					<?php endif ?>		

					<?php if ($r->NOMEMAENUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMEMAENUBENTE2)?>,
					<?php if ($r->ESTADOCIVILMAENUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILMAENUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADEMAENUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADEMAENUBENTE2)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADEMAENUBENTE2!=''): ?>
					natural de <?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADEMAENUBENTE2)); foreach($c as $c):?>
					<?php if (intval($r->NATURALIDADEMAENUBENTE2) == "5300109"): ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADEMAENUBENTE2)?></span>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=mb_strtolower($c->cidade)?></span>/<?=$c->uf?>,
					<?php endif ?>	
					<?php endforeach ?>
					<?php endif ?>

					<?php if ($r->PROFISSAOMAENUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAOMAENUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECOMAENUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECOMAENUBENTE2)?> <?=echo_exist($r->BAIRROMAENUBENTE2)?>,
					<?php endif ?>

					<?php if ($r->CIDADEMAENUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEMAENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?> 
					
					<?php if ($r->RGMAENUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGMAENUBENTE2?>/<?=$r->ORGAOEMISSORMAENUBENTE2?>, 
					<?php endif ?>
					<?php if ($r->CPFMAENUBENTE2!=''): ?>
					CPF de número <?=$r->CPFMAENUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTOMAENUBENTE2!=''): ?>
						Com 
					<?=idade_civil_antigo($r->DATANASCIMENTOMAENUBENTE2, $r->DATAENTRADA)?> anos de idade. 
					<?php endif ?>
					<?php endif ?>
			 </p>
		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->

						<?php if (strlen($r->REGIMECASAMENTO)>3) {
							$regime_array = explode("@", $r->REGIMECASAMENTO);
							$REGIMECASAMENTO = $regime_array[0];
							$COMPLEMENTOREGIME = $regime_array[1];
							}
							else{
							$REGIMECASAMENTO = $r->REGIMECASAMENTO;	
							} 
							?>	
							<?php 

							if ($REGIMECASAMENTO == 'CP') {
							$regime = 'Comunhão Parcial de bens';
							}

							else if ($REGIMECASAMENTO == 'CU') {
							$regime = 'Comunhão Universal de bens'.', '.$COMPLEMENTOREGIME;
							}

							else if ($REGIMECASAMENTO == 'PF') {
							$regime = 'Participação final nos aquestos'.', '.$COMPLEMENTOREGIME;
							}

							else if ($REGIMECASAMENTO == 'SB') {
							$regime = 'Separação Total  de bens'.', '.$COMPLEMENTOREGIME;
							}
							else if ($REGIMECASAMENTO == 'SE') {
							$regime = 'Separação de bens'.', '.$COMPLEMENTOREGIME;
							}
							else if ($REGIMECASAMENTO == 'SC') {
							$regime = 'Separação Obrigatória de bens'.', '.$COMPLEMENTOREGIME;
							}
							else if ($REGIMECASAMENTO == 'SO') {
							$regime = 'Separação Convencional de Bens'.', '.$COMPLEMENTOREGIME;
							}
							else if ($REGIMECASAMENTO == 'SL') {
							$regime = 'Separação Legal de Bens'.', '.$COMPLEMENTOREGIME;
							}

							else{
							$regime = 'Comunhão de Bens';
							}



							?>
					O regime do casamento será o da <?=$regime?>. Selo de Fiscalização: <?=$r->SELO?>.

										<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAENTRADA=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAENTRADA ;
					}
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

					?>. 
					<?php endforeach; endforeach ?>
					</p>

				

					<p style="text-align: center;">
					___________________________ <br> 
					<?=mb_strtoupper($nome_assinatura)?></p>
					<p style="text-align: center;margin-top: -7px;"><?=$funcao_assinatura?></p>


					<?php if ($r->SELO!='none'): ?>
							<div style="margin-left: 0.4cm; position: absolute; width: 300px; margin-top: 20px; display: block">
									<?php


									include_once('../../../plugins/phpqrcode/qrlib.php');

									function tirarAcentos($string){
		return preg_replace(array("/(á|à|ã|â|ä)/","/(Á|À|Ã|Â|Ä)/","/(é|è|ê|ë)/","/(É|È|Ê|Ë)/","/(í|ì|î|ï)/","/(Í|Ì|Î|Ï)/","/(ó|ò|õ|ô|ö)/","/(Ó|Ò|Õ|Ô|Ö)/","/(ú|ù|û|ü)/","/(Ú|Ù|Û|Ü)/","/(ñ)/","/(Ñ)/","/(Ç)/","/(ç)/","/(ý)/","/(Ý)/"),explode(" ","a A e E i I o O u U n N C c y Y"),$string);
		}
													$img_local = "qrimagens/";
													$img_nome = tirarAcentos($r->NOMENUBENTE1.$r->NOMENUBENTE2).'.png';
													$nome = $img_local.$img_nome;

													$conteudo = $qr;
													QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);


													echo '<img style="max-width:25%; margin-top:-36px;margin-left:0px;display:inline-block" src="'.$nome.'" />';
													?>
													
													<p style="font-weight: bold; font-size: 8px;margin-top: -10px;margin-left: 0px; text-align: justify;display: inline-block;width: 60%;"><?=$textoselo?></p>	
												</div>
									<?php else: ?>
										<div style="position: absolute; background: rgba(255,255,255,.8); width: 150px; box-shadow: 2px 2px 2px 2px black; margin-left:70%;margin-top: -115%;">
										<img src="../../../images/brasao_ma.png" style="max-width: 40%; margin-left: 30%; ">
										<h4 style="text-align: center; font-weight: bold; font-size: 60%; width: 100%;">DOCUMENTO DISPENSADO DO SELO DE FISCALIZAÇÃO</h4>
										<h4 style="text-align: center; font-weight: bold; font-size: 60%; width: 100%;">PROVIMENTO 38/19 DA CGJ/MA</h4>
									</div>
									<?php endif ?>	
									 

		</div>
		</div>				
<!--CERTIDAO HABILITACAO-->
	<div style="page-break-before: always;margin-top: 1cm; text-align: justify; padding-left: 2cm; padding-right: 2cm; font-size: 14px;">
					<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<?php $c = PESQUISA_ALL('cadastroserventia');
			foreach ($c as $c ):?>
			<div style="display: block;margin-top: -40px;min-width: 100%;">
			<div style="display: inline-block;width: 17%;">
			<img src="../../images/brasao_ma.png" style="width: 60%;margin-left:28px; margin-top:10px; ">

			</div>
			<div style="display: inline-block;width: 80%; margin-left: -50px;">  
			<h2 style=" text-align: center;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
			<h2 style=" text-align: center;font-size: 12px;margin-top: -18px;
			"><?=$c->strLogradouro?>, <?=$c->strNumero?> -
			<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
			<?php endforeach ?>
			<br>
			Titular da Serventia: <?=$c->strTituloServentia?><br>
			Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
			<?php endforeach ?></h2>
			</div>

			</div>

			<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<hr style="border:1px solid black">
						<h2 style="text-align: center;">AUTOS DO PEDIDO DE HABILITAÇÃO <br><span style="font-size: 12px;">(Art. Art. 1.526 do CC)</span></h2>
						<p style="text-align: justify;">
						HOMOLOGO, nos termos do artigo 1.526, do Código Civil
						Brasileiro, o pedido de habilitação para casamento civil
						formulado por <b><?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?></b> , 
						tendo em vista o cumprimento das
						formalidades do artigo 1.525, incisos I, III e IV, do Código
						Civil Brasileiro e o parecer favorável do Ilustre Representante
						do Ministério Público Estadual, consoante ao que dispõe o Art.
						5º, II, da Recomendação Nº 16, de 28 de abril de 2010, do
						Conselho Nacional do Ministério Público.	
						</p>
						<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAENTRADA=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAENTRADA ;
					}
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

					?>. 
					<?php endforeach; endforeach ?>
					</p>
					<p style="text-align: center;">
					________________________________ <br>	
					<?=mb_strtoupper($nome_assinatura)?></p>
					<p style="text-align: center;margin-top: -7px;"><?=$funcao_assinatura?></p>
	</div>						
<!--CERTIDAO HABILITACAO2-->
	<div style="page-break-before: always;margin-top: 1cm; text-align: justify; padding-left: 2cm; padding-right: 2cm; font-size: 14px;">
					<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<?php $c = PESQUISA_ALL('cadastroserventia');
			foreach ($c as $c ):?>
			<div style="display: block;margin-top: -40px;min-width: 100%;">
			<div style="display: inline-block;width: 17%;">
			<img src="../../images/brasao_ma.png" style="width: 60%;margin-left:28px; margin-top:10px; ">

			</div>
			<div style="display: inline-block;width: 80%; margin-left: -50px;">  
			<h2 style=" text-align: center;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
			<h2 style=" text-align: center;font-size: 12px;margin-top: -18px;
			"><?=$c->strLogradouro?>, <?=$c->strNumero?> -
			<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
			<?php endforeach ?>
			<br>
			Titular da Serventia: <?=$c->strTituloServentia?><br>
			Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
			<?php endforeach ?></h2>
			</div>

			</div>

			<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<hr style="border:1px solid black">
						<h2 style="text-align: center;">CERTIDÃO</h2>
						<p style="text-align: justify;">
						CERTIFICO que afixei e publiquei o Edital de Proclamas dos Contraentes <b><?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?></b> em 
						<?=date('d/m/Y', strtotime($r->DATAEDITAL))?> no Placar do Fórum e no Átrio deste Cartório, e que transcorreu o prazo de 15 dias, findando-se aos  ___________________________________ sem que tenha sido manifestado impugnação ou impedimento de qualquer natureza.	
						</p>
						<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAENTRADA=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAENTRADA ;
					}
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

					?>. 
					<?php endforeach; endforeach ?>
					</p>
					<p style="text-align: center;">
					________________________________ <br>	
					<?=mb_strtoupper($nome_assinatura)?></p>
					<p style="text-align: center;margin-top: -7px;"><?=$funcao_assinatura?></p>
	</div>									
<!--VISTA AO PARQUET-->
	<div id="noprint" style="page-break-before: always;margin-top: 1cm; text-align: justify; padding-left: 2cm; padding-right: 2cm; font-size: 14px;">
		<h1 style="color: silver; margin-top: 50%; text-align: center">A IMPRESSÃO DAS FOLHAS A SEGUIR É OPCIONAL AOS CARTÓRIOS QUE POSSUEM VISTA DA PROMOTORIA DO SEU MUNICÍPIO EM RELAÇÃO AO PROCESSO DE HABILITAÇÃO PARA CASAMENTOS OU USEM OS DEMAIS MODELOS DE TERMOS QUE SEGUEM.</h1>
	</div>	
	<div style="page-break-before: always;margin-top: 2cm; text-align: justify; padding-left: 2cm; padding-right: 2cm; font-size: 14px;">
					<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<?php $c = PESQUISA_ALL('cadastroserventia');
			foreach ($c as $c ):?>
			<div style="display: block;margin-top: -40px;min-width: 100%;">
			<div style="display: inline-block;width: 17%;">
			<img src="../../images/brasao_ma.png" style="width: 60%;margin-left:28px; margin-top:10px; ">

			</div>
			<div style="display: inline-block;width: 80%; margin-left: -50px;">  
			<h2 style=" text-align: center;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
			<h2 style=" text-align: center;font-size: 12px;margin-top: -18px;
			"><?=$c->strLogradouro?>, <?=$c->strNumero?> -
			<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
			<?php endforeach ?>
			<br>
			Titular da Serventia: <?=$c->strTituloServentia?><br>
			Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
			<?php endforeach ?></h2>
			</div>

			</div>

			<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<hr style="border:1px solid black">
						<h4 style="text-align: right;">VISTA AO PARQUET ESTADUAL <br> ART.1.526 do CC</h4>
						<h2 style="text-align:center;">CERTIDÃO</h2>
						<p style="text-align: justify;">
						Certifico que a referida habilitação de
						<b><?=$r->NOMENUBENTE1?> e <?=$r->NOMENUBENTE2?></b>
						deixou de ter o parecer
						ministerial em virtude do Art. 5º, II, da
						Recomendação Nº 16, de 28 de abril de 2010, do
						Conselho Nacional do Ministério Público, publicado
						no DJ, de ______________________, bem como do ofício
						nº _____________________________, datado de ___/___/_______,
						do representante ministerial local. Dou fé.
						</p>
						<p style="text-align: center">
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAENTRADA=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAENTRADA ;
					}
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

					?>. 
					<?php endforeach; endforeach ?>
					</p>
					<p style="text-align: center;">
					________________________________ <br>
					<?=mb_strtoupper($nome_assinatura)?></p>
					<p style="text-align: center;margin-top: -7px;"><?=$funcao_assinatura?></p>
	</div>					
<!--TERMO DE DECLARACAO-->
	<div style="page-break-before: always;margin-top: 1cm; text-align: justify; padding-left: 1cm; padding-right: 2cm; font-size: 14px;">
		<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<?php $c = PESQUISA_ALL('cadastroserventia');
			foreach ($c as $c ):?>
			<div style="display: block;margin-top: -40px;min-width: 100%;">
			<div style="display: inline-block;width: 17%;">
			<img src="../../images/brasao_ma.png" style="width: 60%;margin-left:28px; margin-top:10px; ">

			</div>
			<div style="display: inline-block;width: 80%; margin-left: -50px;">  
			<h2 style=" text-align: center;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
			<h2 style=" text-align: center;font-size: 12px;margin-top: -18px;
			"><?=$c->strLogradouro?>, <?=$c->strNumero?> -
			<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
			<?php endforeach ?>
			<br>
			Titular da Serventia: <?=$c->strTituloServentia?><br>
			Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
			<?php endforeach ?></h2>
			</div>

			</div>

			<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<hr style="border:1px solid black">
		<h3 style="text-align: center;">Termo de Declaração Art. 1528 do Código Civil Brasileiro</h3>
		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify;">Pelo presente termo, 
					<?php if ($r->NOMENUBENTE1!=''): ?>	
					<?=mb_strtoupper($r->NOMENUBENTE1)?>,
					
					<?php if ($r->NOMECASADONUBENTE1 == $r->NOMENUBENTE1): ?>
					que permanecerá a usar o mesmo nome,
					<?php else: ?>
					que passará a usar o nome de <?=$r->NOMECASADONUBENTE1?>,
					<?php endif ?>

					<?php if ($r->ESTADOCIVILNUBENTE1 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE1 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADENUBENTE1!=''): ?>
					<?=echo_exist($r->NACIONALIDADENUBENTE1)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADENUBENTE1!=''): ?>
					natural de 
					<?=cidade_estrangeiro($r->NATURALIDADENUBENTE1)?>
					<?php if (intval($r->NATURALIDADENUBENTE1)!='5300109'): ?>
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE1)?></span>
					<?php endif ?>
					<?php endif ?>

					<?php if ($r->PROFISSAONUBENTE1!=''): ?>
					<?=echo_exist($r->PROFISSAONUBENTE1)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECONUBENTE1!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECONUBENTE1)?> <?=echo_exist($r->BAIRRONUBENTE1)?>,
					<?php endif ?>

					<?=cidade_estrangeiro($r->CIDADENUBENTE1)?>
					<?php if (intval($r->CIDADENUBENTE1)!='5300109'): ?>
					<?php if ($r->CIDADENUBENTE1!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENUBENTE1)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->CIDADENUBENTE1)?></span>
					<?php endif ?> 

					<?php if ($r->RGNUBENTE1!=''): ?>
					portador do RG de número <?=$r->RGNUBENTE1?>/<?=$r->ORGAOEMISSORNUBENTE1?>,
					<?php endif ?> 
					<?php if ($r->CPFNUBENTE1!=''): ?>
					CPF de número <?=$r->CPFNUBENTE1?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTONUBENTE1!=''): ?>
						Nascido (a) em
						<?php
						$data = $r->DATANASCIMENTONUBENTE1 ;
						$novaDataNoivo = explode("-", $data);

						if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
						echo "Primeiro   ";
						}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
						echo " Dois  ";
						} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
						echo " Três ";
						} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
						echo " Quatro  ";
						} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
						echo " Cinco  ";
						} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
						echo " Seis  ";
						} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
						echo " Sete  ";
						} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
						echo " Oito  ";
						} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
						echo " Nove  ";
						} else {echo  dataum($novaDataNoivo[2]);}
						//Será exibido na tela a data: 16/02/2015
						// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
						if ($novaDataNoivo[1] == '01' || $novaDataNoivo[1] == '1') {
						echo " de Janeiro de ";
						}elseif ($novaDataNoivo[1] == '02' || $novaDataNoivo[1] == '2') {
						echo " de Fevereiro de ";
						} elseif ($novaDataNoivo[1] == '03' || $novaDataNoivo[1] == '3') {
						echo " de Março de ";
						} elseif ($novaDataNoivo[1] == '04' || $novaDataNoivo[1] == '4') {
						echo " de Abril de ";
						} elseif ($novaDataNoivo[1] == '05' || $novaDataNoivo[1] == '5') {
						echo " de Maio de ";
						} elseif ($novaDataNoivo[1] == '06' || $novaDataNoivo[1] == '6') {
						echo " de Junho de ";
						} elseif ($novaDataNoivo[1] == '07' || $novaDataNoivo[1] == '7') {
						echo " de Julho de ";
						} elseif ($novaDataNoivo[1] == '08' || $novaDataNoivo[1] == '8') {
						echo " de Agosto de ";
						} elseif ($novaDataNoivo[1] == '09' || $novaDataNoivo[1] == '9') {
						echo " de Setembro de ";
						} elseif ($novaDataNoivo[1] == '10') {
						echo " de Outubro de ";
						} elseif ($novaDataNoivo[1] == '11') {
						echo " de Novembro de ";
						} elseif ($novaDataNoivo[1] == '12') {
						echo " de Dezembro de ";
						} else {
						echo "Não definido";
						}

						$udg = substr($novaDataNoivo[0],  2,3);
						if ($udg == '01' || $udg == '1' ||$udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE1))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE1, $r->DATAENTRADA)?> anos de idade.
					<?php endif ?>
					<?php endif ?>
					<?php if ($r->strTituloEleitorNoivo!=''): ?>
					Titulo de Eleitor nº <?=$r->strTituloEleitorNoivo?>.
					<?php endif ?>
					<?php if ($r->strCtpsNoivo!=''): ?>
					CTPS nº <?=$r->strCtpsNoivo?>.
					<?php endif ?>
					<?php if ($r->strPassaporteNoivo!=''): ?>
					Passaporte nº <?=$r->strPassaporteNoivo?>.
					<?php endif ?>
					<?php if ($r->strPisNisNoivo!=''): ?>
					PIS/NIS: nº <?=$r->strPisNisNoivo?>.
					<?php endif ?>
					<?php if ($r->strCartaoSaudeNoivo!=''): ?>
					Cartão Saúde: nº <?=$r->strCartaoSaudeNoivo?>.
					<?php endif ?>					
		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->

		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->	
			 E
					<?php if ($r->NOMENUBENTE2!=''): ?>	
					<?=echo_exist($r->NOMENUBENTE2)?>,

					<?php if ($r->NOMECASADONUBENTE2 == $r->NOMENUBENTE2): ?>
					que permanecerá a usar o mesmo nome,
					<?php else: ?>
					que passará a usar o nome de <?=$r->NOMECASADONUBENTE2?>,
					<?php endif ?>

					<?php if ($r->ESTADOCIVILNUBENTE2 == 'CA'): ?>
					casado(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'SO'): ?>
					solteiro(a),
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'DI'): ?>
					divorciado(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'VI'): ?>
					viúvo(a),	
					<?php elseif ($r->ESTADOCIVILNUBENTE2 == 'UN'): ?>
					em união estável,
					<?php else: ?>

					<?php endif ?>
					<?php if ($r->NACIONALIDADENUBENTE2!=''): ?>
					<?=echo_exist($r->NACIONALIDADENUBENTE2)?>,	
					<?php endif ?>
					
					
					<?php if ($r->NATURALIDADENUBENTE2!=''): ?>
					natural de 
					<?=cidade_estrangeiro($r->NATURALIDADENUBENTE2)?>
					<?php if (intval($r->NATURALIDADENUBENTE2)!='5300109'): ?>
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE2)?></span>
					<?php endif ?>
					<?php endif ?>

					<?php if ($r->PROFISSAONUBENTE2!=''): ?>
					<?=echo_exist($r->PROFISSAONUBENTE2)?>(a),
					<?php endif ?>

					<?php if ($r->ENDERECONUBENTE2!=''): ?> 
					residente e domiciliado(a) em <?=echo_exist($r->ENDERECONUBENTE2)?> <?=echo_exist($r->BAIRRONUBENTE2)?>,
					<?php endif ?>

					<?=cidade_estrangeiro($r->CIDADENUBENTE2)?>
					<?php if (intval($r->CIDADENUBENTE2)!='5300109'): ?>
					<?php if ($r->CIDADENUBENTE2!=''): ?>	
					<?php  $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADENUBENTE2)); foreach($c as $c):?>
					<?=echo_exist($c->cidade)?> (<?=$c->uf?>),<?php endforeach ?>
					<?php endif ?>
					<?php else: ?>
					<span style="text-transform: capitalize;"><?=str_replace($tirar_cidades,$repor_cidades,$r->NATURALIDADENUBENTE2)?></span>
					<?php endif ?> 

					<?php if ($r->RGNUBENTE2!=''): ?>
					portador do RG de número <?=$r->RGNUBENTE2?>/<?=$r->ORGAOEMISSORNUBENTE2?>,
					<?php endif ?> 
					<?php if ($r->CPFNUBENTE2!=''): ?>
					CPF de número <?=$r->CPFNUBENTE2?>.
					<?php endif ?>

					<?php if ($r->DATANASCIMENTONUBENTE2!=''): ?>
						Nascido (a) em
						<?php
						$data = $r->DATANASCIMENTONUBENTE2 ;
						$novaDataNoivo = explode("-", $data);

						if ($novaDataNoivo[2] == '01' || $novaDataNoivo[2] == '1') {
						echo "Primeiro   ";
						}elseif ($novaDataNoivo[2] == '02' || $novaDataNoivo[2] == '2') {
						echo " Dois  ";
						} elseif ($novaDataNoivo[2] == '03' || $novaDataNoivo[2] == '3') {
						echo " Três ";
						} elseif ($novaDataNoivo[2] == '04' || $novaDataNoivo[2] == '4') {
						echo " Quatro  ";
						} elseif ($novaDataNoivo[2] == '05' || $novaDataNoivo[2] == '5') {
						echo " Cinco  ";
						} elseif ($novaDataNoivo[2] == '06' || $novaDataNoivo[2] == '6') {
						echo " Seis  ";
						} elseif ($novaDataNoivo[2] == '07' || $novaDataNoivo[2] == '7') {
						echo " Sete  ";
						} elseif ($novaDataNoivo[2] == '08' || $novaDataNoivo[2] == '8') {
						echo " Oito  ";
						} elseif ($novaDataNoivo[2] == '09' || $novaDataNoivo[2] == '9') {
						echo " Nove  ";
						} else {echo  dataum($novaDataNoivo[2]);}
						//Será exibido na tela a data: 16/02/2015
						// . "de".$novaDataNoivo[1] . " de " . GExtenso::numero ($novaDataNoivo[0])
						if ($novaDataNoivo[1] == '01' || $novaDataNoivo[1] == '1') {
						echo " de Janeiro de ";
						}elseif ($novaDataNoivo[1] == '02' || $novaDataNoivo[1] == '2') {
						echo " de Fevereiro de ";
						} elseif ($novaDataNoivo[1] == '03' || $novaDataNoivo[1] == '3') {
						echo " de Março de ";
						} elseif ($novaDataNoivo[1] == '04' || $novaDataNoivo[1] == '4') {
						echo " de Abril de ";
						} elseif ($novaDataNoivo[1] == '05' || $novaDataNoivo[1] == '5') {
						echo " de Maio de ";
						} elseif ($novaDataNoivo[1] == '06' || $novaDataNoivo[1] == '6') {
						echo " de Junho de ";
						} elseif ($novaDataNoivo[1] == '07' || $novaDataNoivo[1] == '7') {
						echo " de Julho de ";
						} elseif ($novaDataNoivo[1] == '08' || $novaDataNoivo[1] == '8') {
						echo " de Agosto de ";
						} elseif ($novaDataNoivo[1] == '09' || $novaDataNoivo[1] == '9') {
						echo " de Setembro de ";
						} elseif ($novaDataNoivo[1] == '10') {
						echo " de Outubro de ";
						} elseif ($novaDataNoivo[1] == '11') {
						echo " de Novembro de ";
						} elseif ($novaDataNoivo[1] == '12') {
						echo " de Dezembro de ";
						} else {
						echo "Não definido";
						}

						$udg = substr($novaDataNoivo[0],  2,3);
						if ($udg == '01' || $udg == '1' ||$udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaDataNoivo[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaDataNoivo[0]);
						}


						?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTONUBENTE2))?>), Com 
					<?=idade_civil_antigo($r->DATANASCIMENTONUBENTE2,$r->DATAENTRADA)?> anos de idade.
					<?php endif ?>
					<?php endif ?>
					<?php if ($r->strTituloEleitorNoiva!=''): ?>
					Titulo de Eleitor nº <?=$r->strTituloEleitorNoiva?>.
					<?php endif ?>
					<?php if ($r->strCtpsNoiva!=''): ?>
					CTPS nº <?=$r->strCtpsNoiva?>.
					<?php endif ?>
					<?php if ($r->strPassaporteNoiva!=''): ?>
					Passaporte nº <?=$r->strPassaporteNoiva?>.
					<?php endif ?>
					<?php if ($r->strPisNisNoiva!=''): ?>
					PIS/NIS: nº <?=$r->strPisNisNoiva?>.
					<?php endif ?>
					<?php if ($r->strCartaoSaudeNoiva!=''): ?>
					Cartão Saúde: nº <?=$r->strCartaoSaudeNoiva?>.
					<?php endif ?> 			
		<!--NUBENTE2 -------------------------------------------------------------------------------------------------------->			
		Pretendendo contrairem matrimônio, e tendo apresentado os documentos exigidos por lei, a fim de habilitarem-se para 
		o casamento, declaram de  livre vontade, e para todos os fins de direito que  neste ofício, foram devidamente esclarecidos
		pelo Oficial acerca dos fatos que podem ocasionar a invalidade do casamento, bem como assim sobre os diversos regimes de 
		bens, suas variações e efeitos, superada toda e qualquer duvida neste sentido.
		</p>
		<p style="text-align: center">
			Por ser autentica a expressão da verdade, subscrevem os pretendentes. <br>
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAENTRADA=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAENTRADA ;
					}
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

					?>. 
					<?php endforeach; endforeach ?>
					</p>

					<?php if ($r->ROGONUBENTE1!=''): ?>
						<p >
						<br>		
						<div style="border: 3px dashed silver; width: 5%; height: 10px; padding: 30px;margin-left: 20%;margin-bottom: -5%"></div><br>
						<p style="display: inline;margin-left: 22%;font-size: 8px;">(Digital NUBENTE1)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;margin-top:-120px;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA3)?><br>(TESTEMUNHA A ROGO)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA4)?><br>(TESTEMUNHA A ROGO)</p>
						<br><br>
						</p>	
						<?php else: ?>
						
					<p style="text-align: center;">
					________________________________	<br>	
					<?=$r->NOMENUBENTE1?> 
					<?php if ($r->QUALIFICACAOPROCNUBENTE1!=''): $nomeproc1 = explode(',', $r->QUALIFICACAOPROCNUBENTE1); ?>
						<br> <span style="font-weight: bold;font-size: 10px;">REPRESENTADO POR SEU PROCURADOR <?=$nomeproc1[0]?> </span>
					<?php endif ?>
					</p>
					<?php endif ?>

					<?php if ($r->ROGONUBENTE2!=''): ?>
						<p >
						<br>		
						<div style="border: 3px dashed silver; width: 5%; height: 10px; padding: 30px;margin-left: 20%;margin-bottom: -5%"></div><br>
						<p style="display: inline;margin-left: 22%;font-size: 8px;">(Digital NUBENTE2)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;margin-top:-120px;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA5)?><br>(TESTEMUNHA A ROGO)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA6)?><br>(TESTEMUNHA A ROGO)</p>
						<br><br>
						</p>	
						<?php else: ?>
						
					<p style="text-align: center;">
					________________________________	<br>	
					<?=$r->NOMENUBENTE2?> 
					<?php if ($r->QUALIFICACAOPROCNUBENTE2!=''): $nomeproc1 = explode(',', $r->QUALIFICACAOPROCNUBENTE2); ?>
						<br> <span style="font-weight: bold;font-size: 10px;">REPRESENTADO POR SEU PROCURADOR <?=$nomeproc1[0]?> </span>
					<?php endif ?>
					</p>
					<?php endif ?>
					</div>	
<!--TERMO DE OPÇÃO PELO REGIME DA COMUNHÃO DE BENS-->
	<div style="page-break-before: always;margin-top: 1cm; text-align: justify; padding-left: 1cm; padding-right: 2cm; font-size: 14px;">
		<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<?php $c = PESQUISA_ALL('cadastroserventia');
			foreach ($c as $c ):?>
			<div style="display: block;margin-top: -40px;min-width: 100%;">
			<div style="display: inline-block;width: 17%;">
			<img src="../../images/brasao_ma.png" style="width: 60%;margin-left:28px; margin-top:10px; ">

			</div>
			<div style="display: inline-block;width: 80%; margin-left: -50px;">  
			<h2 style=" text-align: center;font-size: 20px;margin-top: 1cm"><?=mb_strtoupper($c->strRazaoSocial)?></h2>
			<h2 style=" text-align: center;font-size: 12px;margin-top: -18px;
			"><?=$c->strLogradouro?>, <?=$c->strNumero?> -
			<?php $e = PESQUISA_ALL_ID('uf_cidade',$c->intUFcidade); foreach ($e as $e):?><?=$e->cidade.'/'.$e->uf?>
			<?php endforeach ?>
			<br>
			Titular da Serventia: <?=$c->strTituloServentia?><br>
			Telefone:<?=$c->strTelefone1?> // <?=$c->strTelefone2?> 
			<?php endforeach ?></h2>
			</div>

			</div>

			<!--CABEÇAÇHO ------------------------------------------------------------------------------------------------>
			<hr style="border:1px solid black">
		<h3 style="text-align: center;">Termo de Opção pelo Regime da Comunhão de Bens</h3>
		<!--NUBENTE1 -------------------------------------------------------------------------------------------------------->	
			<p style="text-align: justify;">Os noivos abaixo assinados, com base no parágrafo único do art 1 640  do Código
				Civil Brasileiro, em vigor desde 11/01/2003, optam pelo regime da <span style="font-weight: bold;">COMUNHÃO PARCIAL DE BENS</span>, 
				e firmam o presente, cientes de que a escolha de outro regime somente poderia ser feita por meio de Escritura Pública. Declaram ainda, 
				estar cientes de que no Regime da Comunhão Parcial de Bens comunicam-se os bens adquiridos pelo casal na constância do casamento, ficando
				excluidos os bens adquiridos anteriormente e os bens recebidos por herança ou doação, ainda que na constância do casamento pertencendo estes
				a quem os receber, que os bens adquiridos com a receita proveniente de bens anteriores ao casamento também não constituem patrimônio do casal, e por fim
				que as obrigações ou dívidas anteriores ao casamento ou contraidas para administração de bens exclusivos de cada cônjuge, será de sua inteira responsabilidade.
				<br>
				Estando assim perfeitamente cientes das regras que regem o Regime  da Comunhão Parcial de Bens, manifestam livremente sua opção pelo mesmo, reduzida sua manifestação
				a termo como determina o código supra citado. Eu _____________________________________, Tabelião(a), lavrei este termo, devidamente lido, conferido e assinado pelos
				contraentes e por mim subscrito para que produza seus efeitos legais.

				</p>	
		<p style="text-align: center">
			
					<?php $h = PESQUISA_ALL('cadastroserventia'); foreach ($h as $h): 
					$u = PESQUISA_ALL_ID('uf_cidade',$h->intUFcidade);
					foreach ($u as $u):?>	

					<?=$u->cidade?>,

					<?php
					if ($r->DATAENTRADA=='') {
						$data = date('Y-m-d');
					}
					else{
					$data = $r->DATAENTRADA ;
					}
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

					?>. 
					<?php endforeach; endforeach ?>
					</p>

					<?php if ($r->ROGONUBENTE1!=''): ?>
						<p >
						<br>		
						<div style="border: 3px dashed silver; width: 5%; height: 10px; padding: 30px;margin-left: 20%;margin-bottom: -5%"></div><br>
						<p style="display: inline;margin-left: 22%;font-size: 8px;">(Digital NUBENTE1)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;margin-top:-120px;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA3)?><br>(TESTEMUNHA A ROGO)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA4)?><br>(TESTEMUNHA A ROGO)</p>
						<br><br>
						</p>	
						<?php else: ?>
						
					<p style="text-align: center;">
					________________________________	<br>	
					<?=$r->NOMENUBENTE1?> 
					<?php if ($r->QUALIFICACAOPROCNUBENTE1!=''): $nomeproc1 = explode(',', $r->QUALIFICACAOPROCNUBENTE1); ?>
						<br> <span style="font-weight: bold;font-size: 10px;">REPRESENTADO POR SEU PROCURADOR <?=$nomeproc1[0]?> </span>
					<?php endif ?>
					</p>
					<?php endif ?>

					<?php if ($r->ROGONUBENTE2!=''): ?>
						<p >
						<br>		
						<div style="border: 3px dashed silver; width: 5%; height: 10px; padding: 30px;margin-left: 20%;margin-bottom: -5%"></div><br>
						<p style="display: inline;margin-left: 22%;font-size: 8px;">(Digital NUBENTE2)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;margin-top:-120px;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA5)?><br>(TESTEMUNHA A ROGO)</p>
						<p style="max-width:  100%; text-align: center;margin-left:28%;">______________________________<br> <?=mb_strtoupper($r->NOMETESTEMUNHA6)?><br>(TESTEMUNHA A ROGO)</p>
						<br><br>
						</p>	
						<?php else: ?>
						
					<p style="text-align: center;">
					________________________________	<br>	
					<?=$r->NOMENUBENTE2?> 
					<?php if ($r->QUALIFICACAOPROCNUBENTE2!=''): $nomeproc1 = explode(',', $r->QUALIFICACAOPROCNUBENTE2); ?>
						<br> <span style="font-weight: bold;font-size: 10px;">REPRESENTADO POR SEU PROCURADOR <?=$nomeproc1[0]?> </span>
					<?php endif ?>
					</p>
					<?php endif ?>						
				</div>

</body>
<?php endforeach; endif;  ?>
</html>
