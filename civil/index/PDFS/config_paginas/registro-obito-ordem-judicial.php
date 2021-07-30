<!DOCTYPE html>
<?php include('../../controller/db_functions.php');
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
#aqui tá pegando o id mandado da página pesquisa
$id = $_GET['id'];
?>
<html>
<head>
	<title>Registro - Nascimento</title>
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
body{ font-size: 14px;font-family: "Arial";margin-left: 2cm;margin-bottom: -10cm;
<?php if (isset($_GET['preview'])): ?>
	background: url("../../../images/preview.jpg");
<?php endif ?>
}
</style>
</head>

<body>
	<?php $r = PESQUISA_ALL_ID('registro_obito_novo',$id);
	foreach ($r as $r ) :
/*
	if ($r->TIPOLIVRO!='5') {
$_SESSION['erro'] = 'NÃO SERÁ POSSÍVEL EMITIR, O REGISTRO NÃO FOI FEITO COMO NATIMORTO!';
echo '<span style="color:white; background:red"> NÃO SERÁ POSSÍVEL EMITIR, O REGISTRO NÃO FOI FEITO COMO NATIMORTO!!</span>';
break;
		}
	if ($r->TIPOASSENTO !='ORDEM') {
$_SESSION['erro'] = 'NÃO SERÁ POSSÍVEL EMITIR, NOME DO JUIZ EXPEDIDOR NÃO ENCONTRADO!';
echo '<span style="color:white; background:red"> NÃO SERÁ POSSÍVEL EMITIR, NOME DO JUIZ EXPEDIDOR NÃO ENCONTRADO!!</span>';
break;
}
*/

		?>
<?php
if ($r->ESTADOCIVIL == 'SO'  ) {
	$ec = "SOLTEIRO (a)";
}
 if($r->ESTADOCIVIL == 'CA'   ){
	$ec="CASADO (a)";
}


 if($r->ESTADOCIVIL == 'DI'  ){
	$ec="DIVORCIADO (a)";
}

 if($r->ESTADOCIVIL == 'VI'  ){
	$ec="VIUVO (a)";
}


 if($r->ESTADOCIVIL == 'UN' ){
	$ec="EM UNÎÃO ESTÁVEL";
}

if (empty($r->ESTADOCIVIL)) {
	$ec = "";
}
	?>
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
<div style="width: 100%; text-align: center; display: block;margin-top: -10px;" >
<hr style="border:1px solid black">
												<h3 style="display: inline;margin-left: 0cm">LIVRO: C <?=intval($r->LIVROOBITO)?></h3>
												<h3 style="display: inline;margin-left: 1cm">ORDEM: <?=$r->TERMOOBITO?></h3>
												<h3 style="display: inline;margin-left: 1cm">FOLHA: <?=intval($r->FOLHAOBITO)?></h3>	
												</div>
												<br><br>


<h1 style="text-align: center"> Assento de Óbito</h1>

<p style="text-align: justify;">Ao(s) 	<?php //echo date('d/m/Y', strtotime($r->dataObito));
	if (isset($r->DATAENTRADA)):
	$data = $r->DATAENTRADA ;
	$novaData = explode("-", $data);

	if ($novaData[2] == '01' || $novaData[2] == '1') {
		echo " Um de  ";
	}elseif ($novaData[2] == '02' || $novaData[2] == '2') {
		echo " Dois de ";
	} elseif ($novaData[2] == '03' || $novaData[2] == '3') {
		echo " Três ";
	} elseif ($novaData[2] == '04' || $novaData[2] == '4') {
		echo " Quatro de ";
	} elseif ($novaData[2] == '05' || $novaData[2] == '5') {
		echo " Cinco de ";
	} elseif ($novaData[2] == '06' || $novaData[2] == '6') {
		echo " Seis de ";
	} elseif ($novaData[2] == '07' || $novaData[2] == '7') {
		echo " Sete de ";
	} elseif ($novaData[2] == '08' || $novaData[2] == '8') {
		echo " Oito de ";
	} elseif ($novaData[2] == '09' || $novaData[2] == '9') {
		echo " Nove de ";
	} else {echo  ucfirst(GExtenso::numero($novaData[2]));}
	//Será exibido na tela a data: 16/02/2015
	// . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
	if ($novaData[1] == '01' || $novaData[1] == '1') {
		echo " de Janeiro de ";
	}elseif ($novaData[1] == '02' || $novaData[1] == '2') {
		echo " de Fevereiro de ";
	} elseif ($novaData[1] == '03' || $novaData[1] == '3') {
		echo " de Março de ";
	} elseif ($novaData[1] == '04' || $novaData[1] == '4') {
		echo " de Abril de ";
	} elseif ($novaData[1] == '05' || $novaData[1] == '5') {
		echo " de Maio de ";
	} elseif ($novaData[1] == '06' || $novaData[1] == '6') {
		echo " de Junho de ";
	} elseif ($novaData[1] == '07' || $novaData[1] == '7') {
		echo " de Julho de ";
	} elseif ($novaData[1] == '08' || $novaData[1] == '8') {
		echo " de Agosto de ";
	} elseif ($novaData[1] == '09' || $novaData[1] == '9') {
		echo " de Setembro de ";
	} elseif ($novaData[1] == '10') {
		echo " de Outubro de";
	} elseif ($novaData[1] == '11') {
		echo " de Novembro de ";
	} elseif ($novaData[1] == '12') {
		echo " de Dezembro de ";
	} else {
		echo "Não definido";
	}

	echo dataum($novaData[0]);
endif;
	?> neste

	<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w):?><?=$w->strRazaoSocial?> Estado do Maranhão <?php endforeach ?>,


em cartório, por mandato judicial expedido pelo exmo. Juiz <?=$r->JUIZMANDATO?>, do(a) <?=$r->VARAMANDATO?> em <?=date('d/m/Y', strtotime($r->DATAEXPEDICAOMANDATO))?> sob nº <?=$r->NUMEROMANDATO?>, por sentença datada de <?=date('d/m/Y', strtotime($r->DATASENTENCAMANDATO))?>, onde consta a DO n° <?=$r->NDO?>, , a qual se encontra arquivada nesta Unidade de Serviço e exibindo atestado de óbito, firmado pelo  Dr. <?=$r->MEDICO?>, CRM nº <?=$r->CRM?>, que consta como causa da morte <b><?=mb_strtoupper($r->CAUSAOBITO)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOB)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOC)?></b>, <b><?=mb_strtoupper($r->CAUSAOBITOD)?></b>, sendo a morte

	 <?php if ($r->TIPOMORTE == 'NAT'): ?>
	 	por motivo natural,

	 	 <?php elseif ($r->TIPOMORTE == 'VIO'): ?>
	 	por motivo violento,
	 	<?php else: ?>
	 		
	 <?php endif ?> procedi ao registro de óbito ocorrido aos
 <?php //echo date('d/m/Y', strtotime($r->dataObito));

	$data = $r->DATAOBITO ;
	$novaData = explode("-", $data);
	echo $novaData[2];
	/*
	if ($novaData[2] == '01' || $novaData[1] == '1') {
		echo " Um de  ";
	}elseif ($novaData[2] == '02' || $novaData[1] == '2') {
		echo " Dois de ";
	} elseif ($novaData[2] == '03' || $novaData[1] == '3') {
		echo " Três ";
	} elseif ($novaData[2] == '04' || $novaData[1] == '4') {
		echo " Quatro de ";
	} elseif ($novaData[2] == '05' || $novaData[1] == '5') {
		echo " Cinco de ";
	} elseif ($novaData[2] == '06' || $novaData[1] == '6') {
		echo " Seis de ";
	} elseif ($novaData[2] == '07' || $novaData[1] == '7') {
		echo " Sete de ";
	} elseif ($novaData[2] == '08' || $novaData[1] == '8') {
		echo " Oito de ";
	} elseif ($novaData[2] == '09' || $novaData[1] == '9') {
		echo " Nove de ";
	} else {echo  ucfirst(GExtenso::numero($novaData[2]));}
	*/
	//Será exibido na tela a data: 16/02/2015
	// . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
	if ($novaData[1] == '01' || $novaData[1] == '1') {
		echo " de Janeiro de ";
	}elseif ($novaData[1] == '02' || $novaData[1] == '2') {
		echo " de Fevereiro de ";
	} elseif ($novaData[1] == '03' || $novaData[1] == '3') {
		echo " de Março de ";
	} elseif ($novaData[1] == '04' || $novaData[1] == '4') {
		echo " de Abril de ";
	} elseif ($novaData[1] == '05' || $novaData[1] == '5') {
		echo " de Maio de ";
	} elseif ($novaData[1] == '06' || $novaData[1] == '6') {
		echo " de Junho de ";
	} elseif ($novaData[1] == '07' || $novaData[1] == '7') {
		echo " de Julho de ";
	} elseif ($novaData[1] == '08' || $novaData[1] == '8') {
		echo " de Agosto de ";
	} elseif ($novaData[1] == '09' || $novaData[1] == '9') {
		echo " de Setembro de ";
	} elseif ($novaData[1] == '10') {
		echo " de Outubro de ";
	} elseif ($novaData[1] == '11') {
		echo " de Novembro de ";
	} elseif ($novaData[1] == '12') {
		echo " de Dezembro de ";
	} else {
		echo "Não definido";
	}


  $udg = substr($novaData[0], 2,3);
  if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
   echo GExtenso::numero($novaData[0]).'  um';
  }
  else{
    echo GExtenso::numero($novaData[0]);
  }

	?> (<?=date('d/m/Y', strtotime($r->DATAOBITO))?>), <?php if ($r->HORAOBITO!='' && !empty($r->HORAOBITO)): ?> às <?=$r->HORAOBITO?> Horas,<?php endif ?> neste Subdistrito, no <?=$r->LOCALMORTE?>, situado em <?=$r->ENDERECOOBITO?>, <?php $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADEOBITO));foreach($c as $c): ?><?=$c->cidade ?> (<?=$c->uf?>)<?php endforeach ?> faleceu
<p style="text-align: center">
<?php if ($r->NOME !='DESCONHECIDO'): ?>
	<?=strtoupper($r->NOME)?>
<?php endif ?>
<?php if ($r->NOME =='DESCONHECIDO'): ?>
	um (a) individuo de identidade desconhecida
<?php endif ?>


</p><?=$r->NACIONALIDADE?>, do sexo
	<?php if ($r->SEXO == 'M'):?>Masculino, <?php else: ?> Feminino, <?php endif ?> de cor

	<?php
	if ($r->COR=='BR') {
		$cor = 'branca';
	}
	if ($r->COR=='PR') {
		$cor = 'preta';
	}
	if ($r->COR=='PA') {
		$cor = 'parda';
	}
	if ($r->COR=='AM') {
		$cor = 'amarela';
	}
	if ($r->COR=='IN') {
		$cor = 'indígena';
	}
	if ($r->COR=='') {
	 	$cor = '';
	 }


	?>
<?=$cor?>, nascido (a) em
					<?php //echo date('d/m/Y', strtotime($r->dataObito));
					if ($r->DATANASCIMENTO) :
					$data = $r->DATANASCIMENTO ;
					$novaData = explode("-", $data);

					if ($novaData[2] == '01' || $novaData[2] == '1') {
						echo "Primeiro   ";
					}elseif ($novaData[2] == '02' || $novaData[2] == '2') {
						echo " Dois  ";
					} elseif ($novaData[2] == '03' || $novaData[2] == '3') {
						echo " Três ";
					} elseif ($novaData[2] == '04' || $novaData[2] == '4') {
						echo " Quatro  ";
					} elseif ($novaData[2] == '05' || $novaData[2] == '5') {
						echo " Cinco  ";
					} elseif ($novaData[2] == '06' || $novaData[2] == '6') {
						echo " Seis  ";
					} elseif ($novaData[2] == '07' || $novaData[2] == '7') {
						echo " Sete  ";
					} elseif ($novaData[2] == '08' || $novaData[2] == '8') {
						echo " Oito  ";
					} elseif ($novaData[2] == '09' || $novaData[2] == '9') {
						echo " Nove  ";
					}
					elseif ($novaData[2] == '01' || $novaData[2] == '1' ||  $novaData[2] == '21'|| $novaData[2] == '31'|| $novaData[2] == '41' || $novaData[2] == '51'|| $novaData[2] == '61' || $novaData[2] == '71' || $novaData[2] == '81' || $novaData[2] == '91') {
					echo  ucfirst(GExtenso::numero($novaData[2])).'um';
					}
					else {echo  ucfirst(GExtenso::numero($novaData[2]));}

					//Será exibido na tela a data: 16/02/2015
					// . "de".$novaData[1] . " de " . GExtenso::numero ($novaData[0])
					if ($novaData[1] == '01' || $novaData[1] == '1') {
						echo " de Janeiro de ";
					}elseif ($novaData[1] == '02' || $novaData[1] == '2') {
						echo " de Fevereiro de ";
					} elseif ($novaData[1] == '03' || $novaData[1] == '3') {
						echo " de Março de ";
					} elseif ($novaData[1] == '04' || $novaData[1] == '4') {
						echo " de Abril de ";
					} elseif ($novaData[1] == '05' || $novaData[1] == '5') {
						echo " de Maio de ";
					} elseif ($novaData[1] == '06' || $novaData[1] == '6') {
						echo " de Junho de ";
					} elseif ($novaData[1] == '07' || $novaData[1] == '7') {
						echo " de Julho de ";
					} elseif ($novaData[1] == '08' || $novaData[1] == '8') {
						echo " de Agosto de ";
					} elseif ($novaData[1] == '09' || $novaData[1] == '9') {
						echo " de Setembro de ";
					} elseif ($novaData[1] == '10') {
						echo " de Outubro de ";
					} elseif ($novaData[1] == '11') {
						echo " de Novembro de ";
					} elseif ($novaData[1] == '12') {
						echo " de Dezembro de ";
					} else {
						echo "Não definido";
					}

						$udg = substr($novaData[0], 2,3);
						if ($udg == '01' || $udg == '1' ||  $udg == '21'|| $udg == '31'|| $udg == '41' || $udg == '51'|| $udg == '61' || $udg == '71' || $udg == '81' || $udg == '91') {
						echo GExtenso::numero($novaData[0]).'  um';
						}
						else{
						echo GExtenso::numero($novaData[0]);
						}
					endif;
					if (isset($r->DATANASCIMENTO)):
					?> (<?=date('d/m/Y', strtotime($r->DATANASCIMENTO))?>)

					 <?php if ($r->DATANASCIMENTO!=''): ?>
					  com
					<?=date('Y',strtotime($r->DATAOBITO)) - date('Y', strtotime($r->DATANASCIMENTO))?> anos de idade.
				<?php endif;endif; ?>


<?php #TESTE ABAIXO ?>

<?php if ($r->NOME !='DESCONHECIDO'): ?>
<?=$r->PROFISSAO?>, natural de
<?php $c = PESQUISA_ALL_ID('uf_cidade',intval($r->NATURALIDADE));foreach($c as $c): ?>
<?=$c->cidade ?> (<?=$c->uf?>)<?php endforeach ?>,<?php endif ?>
<?php if ($r->NOME !='DESCONHECIDO'): ?> domiciliado e residente em <?=$r->ENDERECO?>,
<?php $c = PESQUISA_ALL_ID('uf_cidade',intval($r->CIDADE));foreach($c as $c): ?>
<?=$c->cidade ?> (<?=$c->uf?>)<?php endforeach ?> <?=$ec?>,
<?php endif ?>

<?php if ($r->ESTADOCIVIL == 'CA' || $r->ESTADOCIVIL == 'VI'): ?>
	sendo, o(a) conjuge <?=mb_strtoupper($r->NOMECONJUGE)?>, casamento celebrado no cartório <?=mb_strtoupper($r->CARTORIOCASAMENTO)?>,
<?php endif ?>


 filho(a) de <?php if (isset($r->NOMEPAI)): ?> <?=mb_strtoupper($r->NOMEPAI)?>, <?=$r->PROFISSAOPAI?> e <?php endif; ?><?php if (isset($r->NOMEMAE)): ?><?=mb_strtoupper($r->NOMEMAE)?>, <?=$r->PROFISSAOMAE?>,<?php endif ?> que será sepultado em <?=$r->LOCALSEPULTAMENTO?>. O declarante apresentou os seguintes documentos do falecido <?php if ($r->NOME !='DESCONHECIDO'): ?> RG nº <?=$r->RG?><?php endif ?>. Declaração de óbito nº <?=$r->NDO?>, CPF de número <?=$r->CPF?>,

<?php if ($r->strTituloEleitor!=''): ?>
	 Titulo de Eleitor nº <?=$r->strTituloEleitor?>.
<?php endif ?>
<?php if ($r->strCtps!=''): ?>
	 CTPS nº <?=$r->strCtps?>.
<?php endif ?>
<?php if ($r->strPassaporte!=''): ?>
	Passaporte nº <?=$r->strPassaporte?>.
<?php endif ?>
<?php if ($r->strPisNis!=''): ?>
	 PIS/NIS: nº <?=$r->strPisNis?>.
<?php endif ?>
<?php if ($r->strCartSaude!=''): ?>
	 Cartão Saúde: nº <?=$r->strCartSaude?>.
<?php endif ?>


<?php if ($r->DEIXOUBENS == 'S'): ?>
	Deixou Bens, Com testamento Conhecido,

<?php elseif ($r->DEIXOUBENS == 'S2'): ?>
	Deixou Bens, Sem testamento Conhecido,
<?php elseif ($r->DEIXOUBENS == 'N'): ?>
	Não Deixou Bens, Com testamento Conhecido,
<?php else: ?>
Não deixou bens, Sem testamento Conhecido,
<?php endif ?>

<?php if ($r->ELEITOR == 'S'): ?>
	Era eleitor,
<?php else: ?>
não sendo eleitor,
<?php endif ?>
<?php #TESTE ABAIXO ?>

<?php if ($r->DEIXOUFILHOS == 'S'): ?>
	Deixou filhos (as), sendo eles, <?=mb_strtoupper($r->NOMEFILHOS)?>.
<?php else: ?>
	Não deixou nenhum filho.
<?php endif ?>
ISENTO DE EMOLUMENTOS CONFORME LEI 9534 DE 10/12/97. Eu,

<?php $w = PESQUISA_ALL('cadastroserventia');foreach ($w as $w): ?><?=$w->strTituloServentia?><?php endforeach ?>
 digitei e assino. Selo de Fiscalização: <?=$r->SELO?>.
(Registro isento de emolumentos). - Matrícula
da 1ª Via da Certidão: <?=$r->MATRICULA?>-------------------------------------------------------------------------------
<span style="font-size: 8px;">Documento impresso por meio eletrônico. Qualquer rasura ou indício de adulteração será considerado fraude.</span>

<br><br><br><br>




	<p style="text-align: center">_____________________________________</p>
	<p style="text-align: center"><?=strtoupper($_SESSION['nome'])?></p>
		<p style="text-align: center; margin-top: -10px;"><?=strtoupper($_SESSION['funcao'])?></p>


	</p>
<!-- SELO -->
			<div style="width: 60%; position: absolute;margin-top: ">
				<?php
					$retorno = json_decode($r->RETORNOSELODIGITAL,true);
					$qr = $retorno['valorQrCode'];
					$textoselo = $retorno['textoSelo'];
					include_once('../../../plugins/phpqrcode/qrlib.php');
			
					function tirarAcentos($string)
					{
						return preg_replace(array(
							"/(á|à|ã|â|ä)/",
							"/(Á|À|Ã|Â|Ä)/",
							"/(é|è|ê|ë)/",
							"/(É|È|Ê|Ë)/",
							"/(í|ì|î|ï)/",
							"/(Í|Ì|Î|Ï)/",
							"/(ó|ò|õ|ô|ö)/",
							"/(Ó|Ò|Õ|Ô|Ö)/",
							"/(ú|ù|û|ü)/",
							"/(Ú|Ù|Û|Ü)/",
							"/(ñ)/",
							"/(Ñ)/",
							"/(Ç)/",
							"/(ç)/"),
							explode(
								" ",
								"a A e E i I o O u U n N C c"),
								$string);
					}
					$img_local = "qrimagens/";
					$img_nome = tirarAcentos($r->NOME).'.png';
					$nome = $img_local.$img_nome;
					$conteudo = $qr;
					QRcode::png($conteudo, $nome, QR_ECLEVEL_H , 3);
				?>
			</div>

			<!-- Tabela com selo - QR CODE e Texto -->
			<table style="border:none; max-width: 60%;margin-left: 15%;">
				<tr style="border:none">
					<!-- QR CODE DO SELO -->
					<td style="border:none">
						<img src="<?=$nome?>" style="width: 70px;" />
					</td>
					<!-- TEXTO DO SELO -->
					<td style="border:none">
						<p style="text-align: justify; font-weight: bold; font-size: 10px; ">
							<?=caracteres_selador($textoselo)?>
						</p>
					</td>

				</tr>
			</table>

<?php endforeach; ?>
</body>
</html>
