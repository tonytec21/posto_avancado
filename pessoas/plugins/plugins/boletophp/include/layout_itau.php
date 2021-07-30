<?php
// +----------------------------------------------------------------------+
// | BoletoPhp - Vers&atildeo Beta                                              |
// +----------------------------------------------------------------------+
// | Este arquivo está disponível sob a Licen&ccedila GPL disponível pela Web   |
// | em http://pt.wikipedia.org/wiki/GNU_General_Public_License           |
// | Voc&acirc deve ter recebido uma c&oacutepia da GNU Public License junto com     |
// | esse pacote; se n&atildeo, escreva para:                                   |
// |                                                                      |
// | Free Software Foundation, Inc.                                       |
// | 59 Temple Place - Suite 330                                          |
// | Boston, MA 02111-1307, USA.                                          |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Originado do Projeto BBBoletoFree que tiveram colabora&ccedil&otildees de Daniel |
// | William Schultz e Leandro Maniezo que por sua vez foi derivado do	  |
// | PHPBoleto de Jo&atildeo Prado Maia e Pablo Martins F. Costa				  |
// | 																	  |
// | Se vc quer colaborar, nos ajude a desenvolver p/ os demais bancos :-)|
// | Acesse o site do Projeto BoletoPhp: www.boletophp.com.br             |
// +----------------------------------------------------------------------+

// +----------------------------------------------------------------------+
// | Equipe Coordena&ccedil&atildeo Projeto BoletoPhp: <boletophp@boletophp.com.br>   |
// | Desenvolvimento Boleto Ita&uacute;: Glauber Portella		                    |
// +----------------------------------------------------------------------+
?>

<html>
<head>
<title><?php echo $dadosboleto["identificacao"]; ?></title>
<meta charset="UTF-8">
<meta name="Generator" content="Projeto BoletoPHP - www.boletophp.com.br - Licen&ccedila GPL" />
<style type=text/css>
<!--.cp {  font: bold 10px Arial; color: black}
<!--.ti {  font: 9px Arial, Helvetica, sans-serif}
<!--.ld { font: bold 15px Arial; color: #000000}
<!--.ct { FONT: 9px "Arial Narrow"; COLOR: #000033}
<!--.cn { FONT: 9px Arial; COLOR: black }
<!--.bc { font: bold 20px Arial; color: #000000 }
<!--.ld2 { font: bold 12px Arial; color: #000000 }

  
  table{
    border:none!important;
    margin-left: 1cm!important;
    min-width: 90%!important;
    padding: -20px!important;
  }

    tr{
    border:none!important;
  }

    td{
    border:none!important;
  }

</style>
</head>

<body text=#000000 bgColor=#ffffff topMargin=0 rightMargin=0>


<!--table cellspacing=0 cellpadding=0 width=666 border=0><tr><td class=cp width=150>
  <span class="campo"><IMG
      src="../plugins/boletophp/imagens/logoitau.jpg" width="150" height="40"
      border=0></span></td>
<td width=3 valign=bottom><img height=22 src=../plugins/boletophp/imagens/3.png width=2 border=0></td><td class=cpt width=58 valign=bottom><div align=center><font class=bc><?php echo $dadosboleto["codigo_banco_com_dv"]?></font></div></td><td width=3 valign=bottom><img height=22 src=../plugins/boletophp/imagens/3.png width=2 border=0></td><td class=ld align=right width=453 valign=bottom><span class=ld>
<span class="campotitulo">
<?php echo $dadosboleto["linha_digitavel"]?>
</span></span></td>
</tr><tbody><tr><td colspan=5><img height=2 src=../plugins/boletophp/imagens/2.png width=666 border=0></td></tr></tbody></table>







<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=298 height=7>Cedente</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=126 height=7>Agencia/Codigo
do Cedente</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=34 height=7>Esp&eacutecie</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=53 height=7>Quantidade</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=120 height=7>Nosso
n&uacute;mero</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top width=298 height=12>
  <span class="campo"><?php echo $dadosboleto["cedente"]; ?></span></td>
<td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top width=126 height=12>
  <span class="campo">
  <?php echo $dadosboleto["agencia_codigo"]?>
  </span></td>
<td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top  width=34 height=12><span class="campo">
  <?php echo $dadosboleto["especie"]?>
</span>
 </td>
<td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top  width=53 height=12><span class="campo">
  <?php echo $dadosboleto["quantidade"]?>
</span>
 </td>
<td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=120 height=12>
  <span class="campo">
  <?php echo $dadosboleto["nosso_numero"]?>
  </span></td>
</tr><tr><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=298 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=298 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=126 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=126 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=34 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=34 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=53 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=53 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=120 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=120 border=0></td></tr></tbody></table>







<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top colspan=3 height=7>N&uacute;mero
do documento</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=132 height=7>CPF/CNPJ</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=134 height=7>Vencimento</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=180 height=7>Valor
documento</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top colspan=3 height=12>
  <span class="campo">
  <?php echo $dadosboleto["numero_documento"]?>
  </span></td>
<td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top width=132 height=12>
  <span class="campo">
  <?php echo $dadosboleto["cpf_cnpj"]?>
  </span></td>
<td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top width=134 height=12>
  <span class="campo">
  <?php echo $dadosboleto["data_vencimento"]?>
  </span></td>
<td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=180 height=12>
  <span class="campo">
  <?php echo $dadosboleto["valor_boleto"]?>
  </span></td>
</tr><tr><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=113 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=113 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=72 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=72 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=132 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=132 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=134 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=134 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=180 border=0></td></tr></tbody></table>







<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=113 height=7>(-)
Desconto / Abatimentos</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=112 height=7>(-)
Outras dedu&ccedil&otildees</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=113 height=7>(+)
Mora / Multa</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=113 height=7>(+)
Outros acr&eacutescimos</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=180 height=7>(=)
Valor cobrado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=113 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=112 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=113 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=113 height=12></td><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=113 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=113 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=112 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=112 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=113 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=113 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=113 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=113 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=180 border=0></td></tr></tbody></table>







<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=659 height=7>Sacado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top width=659 height=12>
  <span class="campo">
  <?php echo $dadosboleto["sacado"]?>
  </span></td>
</tr><tr><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=659 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=659 border=0></td></tr></tbody></table>







<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct  width=7 height=12></td><td class=ct  width=564 >Demonstrativo</td><td class=ct  width=7 height=12></td><td class=ct  width=88 >Autentica&ccedil&atildeo
mec&acircnica</td></tr><tr><td  width=7 ></td><td class=cp width=564 >
<span class="campo">
  <?php echo $dadosboleto["demonstrativo1"]?><br>
  <?php echo $dadosboleto["demonstrativo2"]?><br>
  <?php echo $dadosboleto["demonstrativo3"]?><br>
  </span>
  </td><td  width=7 ></td><td  width=88 ></td></tr></tbody></table>







  <table cellspacing=0 cellpadding=0 width=666 border=0><tbody><tr><td width=7></td><td  width=500 class=cp>
<br><br><br>
</td><td width=159></td></tr></tbody></table-->












<table cellspacing=0 cellpadding=0 width=666 border=0><tr><td class=ct width=666></td></tr><tbody><tr><td class=ct width=666>
<div align=right>Corte na linha pontilhada</div></td></tr><tr><td class=ct width=666><img height=1 src=../plugins/boletophp/imagens/6.png width=665 border=0></td></tr></tbody></table>







<br><table cellspacing=0 cellpadding=0 width=666 border=0><tr><td class=cp width=150>
  <span class="campo"><IMG
      src="../plugins/boletophp/imagens/logoitau.jpg" width="150" height="40"
      border=0></span></td>
<td width=3 valign=bottom><img height=22 src=../plugins/boletophp/imagens/3.png width=2 border=0></td><td class=cpt width=58 valign=bottom><div align=center><font class=bc><?php echo $dadosboleto["codigo_banco_com_dv"]?></font></div></td><td width=3 valign=bottom><img height=22 src=../plugins/boletophp/imagens/3.png width=2 border=0></td><td class=ld align=right width=453 valign=bottom><span class=ld>
<span class="campotitulo">
<?php echo $dadosboleto["linha_digitavel"]?>
</span></span></td>
</tr><tbody><tr><td colspan=5><img height=2 src=../plugins/boletophp/imagens/2.png width=666 border=0></td></tr></tbody></table>







<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=472 height=7>Local
de pagamento</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=180 height=7>Vencimento</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top width=472 height=12>Pag&aacutevel
preferencialmente em banco ITAU at&eacute o vencimento</td><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=180 height=12>
  <span class="campo">
  <?php echo $dadosboleto["data_vencimento"]?>
  </span></td>
</tr><tr><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=472 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=472 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=180 border=0></td></tr></tbody></table>







<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=472 height=7>Cedente</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=180 height=7>Ag&acircncia/C&oacutedigo
cedente</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top width=472 height=12>
  <span class="campo">
  <?php echo $dadosboleto["cedente"]?>
  </span></td>
<td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=180 height=12>
  <span class="campo">
  <?php echo $dadosboleto["agencia_codigo"]?>
  </span></td>
</tr><tr><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=472 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=472 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=180 border=0></td></tr></tbody></table>







<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7>
<img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=113 height=7>Data
do documento</td><td class=ct valign=top width=7 height=7> <img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=153 height=7>N<u>o</u>
documento</td><td class=ct valign=top width=7 height=7> <img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=62 height=7>Esp&eacutecie
doc.</td><td class=ct valign=top width=7 height=7> <img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=34 height=7>Aceite</td><td class=ct valign=top width=7 height=7>
<img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=82 height=7>Data
processamento</td><td class=ct valign=top width=7 height=7> <img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=180 height=7>Nosso
n&uacute;mero</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top  width=113 height=12><div align=left>
  <span class="campo">
  <?php echo $dadosboleto["data_documento"]?>
  </span></div></td><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top width=153 height=12>
    <span class="campo">
    <?php echo $dadosboleto["numero_documento"]?>
    </span></td>
  <td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top  width=62 height=12><div align=left><span class="campo">
    <?php echo $dadosboleto["especie_doc"]?>
  </span>
 </div></td><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top  width=34 height=12><div align=left><span class="campo">
 <?php echo $dadosboleto["aceite"]?>
 </span>
 </div></td><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top  width=82 height=12><div align=left>
   <span class="campo">
   <?php echo $dadosboleto["data_processamento"]?>
   </span></div></td><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=180 height=12>
     <span class="campo">
     <?php echo $dadosboleto["nosso_numero"]?>
     </span></td>
</tr><tr><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=113 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=113 border=0></td><td valign=top width=7 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=153 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=153 border=0></td><td valign=top width=7 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=62 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=62 border=0></td><td valign=top width=7 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=34 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=34 border=0></td><td valign=top width=7 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=82 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=82 border=0></td><td valign=top width=7 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=180 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=180 border=0></td></tr></tbody></table>







<table cellspacing=0 cellpadding=0 border=0><tbody><tr>
<td class=ct valign=top width=7 height=7> <img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top COLSPAN="3" height=7>Uso
do banco</td><td class=ct valign=top height=7 width=7> <img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=83 height=7>Carteira</td><td class=ct valign=top height=7 width=7>
<img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=53 height=7>Esp&eacutecie</td><td class=ct valign=top height=7 width=7>
<img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=123 height=7>Quantidade</td><td class=ct valign=top height=7 width=7>
<img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=72 height=7>
Valor Documento</td><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=180 height=7>(=)
Valor documento</td></tr><tr> <td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td valign=top class=cp height=12 COLSPAN="3"><div align=left>
 </div></td><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top  width=83>
<div align=left> <span class="campo">
  <?php echo $dadosboleto["carteira"]?>
</span></div></td><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top  width=53><div align=left><span class="campo">
<?php echo $dadosboleto["especie"]?>
</span>
 </div></td><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top  width=123><span class="campo">
 <?php echo $dadosboleto["quantidade"]?>
 </span>
 </td>
 <td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top  width=72>
   <span class="campo">
   <?php echo $dadosboleto["valor_unitario"]?>
   </span></td>
 <td class=cp valign=top width=7 height=12> <img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=180 height=12>
   <span class="campo">
   <?php echo $dadosboleto["valor_boleto"]?>
   </span></td>
</tr><tr><td valign=top width=7 height=1> <img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=75 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=31 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=31 border=0></td><td valign=top width=7 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=83 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=83 border=0></td><td valign=top width=7 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=53 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=53 border=0></td><td valign=top width=7 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=123 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=123 border=0></td><td valign=top width=7 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=72 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=72 border=0></td><td valign=top width=7 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=180 border=0></td></tr></tbody>
</table>







<table cellspacing=0 cellpadding=0 width=666 border=0><tbody><tr><td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left><tbody>
<tr> <td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td></tr><tr>
<td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td></tr><tr>
<td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=1 border=0></td></tr></tbody></table>







</td><td valign=top width=468 rowspan=5><font class=ct>Instru&ccedil&otildees
(Texto de responsabilidade do cedente)</font><br><br><span class=cp> <FONT class=campo>
<?php echo $dadosboleto["instrucoes1"]; ?><br>
<?php echo $dadosboleto["instrucoes2"]; ?><br>
<?php echo $dadosboleto["instrucoes3"]; ?><br>
<?php echo $dadosboleto["instrucoes4"]; ?></FONT><br><br>
</span></td>
<td align=right width=188><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=180 height=7>(-)
Desconto / Abatimentos</td></tr><tr> <td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr>
<td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=180 border=0></td></tr></tbody></table>







</td></tr><tr><td align=right width=10>
<table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td></tr><tr><td valign=top width=7 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=1 border=0></td></tr></tbody></table>







</td><td align=right width=188><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=180 height=7>(-)
Outras dedu&ccedil&otildees</td></tr><tr><td class=cp valign=top width=7 height=12> <img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=180 border=0></td></tr></tbody></table>







</td></tr><tr><td align=right width=10>
<table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr><td class=ct valign=top width=7 height=7>
<img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td></tr><tr><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=1 border=0></td></tr></tbody></table>







</td><td align=right width=188>
<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=180 height=7>(+)
Mora / Multa</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr>
<td valign=top width=7 height=1> <img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=180 height=1>
<img height=1 src=../plugins/boletophp/imagens/2.png width=180 border=0></td></tr></tbody></table>







</td></tr><tr><td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr>
<td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td></tr><tr><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=1 border=0></td></tr></tbody></table>







</td><td align=right width=188>
<table cellspacing=0 cellpadding=0 border=0><tbody><tr> <td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=180 height=7>(+)
Outros acr&eacutescimos</td></tr><tr> <td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr><tr><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=180 border=0></td></tr></tbody></table>







</td></tr><tr><td align=right width=10><table cellspacing=0 cellpadding=0 border=0 align=left><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td></tr></tbody></table>







</td><td align=right width=188><table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=180 height=7>(=)
Valor cobrado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top align=right width=180 height=12></td></tr></tbody>
</table>







</td></tr></tbody></table>







<table cellspacing=0 cellpadding=0 width=666 border=0><tbody><tr><td valign=top width=666 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=666 border=0></td></tr></tbody></table>







<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=659 height=7>Sacado</td></tr><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top width=659 height=12><span class="campo">
<?php echo $dadosboleto["sacado"]?>
</span>
</td>
</tr></tbody></table>







<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=cp valign=top width=7 height=12><img height=12 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top width=659 height=12><span class="campo">
<?php echo $dadosboleto["endereco1"]?>
</span>
</td>
</tr></tbody></table>







<table cellspacing=0 cellpadding=0 border=0><tbody><tr><td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=cp valign=top width=472 height=7>
  <span class="campo">
  <?php echo $dadosboleto["endereco2"]?>
  </span></td>
<td class=ct valign=top width=7 height=7><img height=7 src=../plugins/boletophp/imagens/1.png width=1 border=0></td><td class=ct valign=top width=180 height=7>C&oacuted.
baixa</td></tr><tr><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=472 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=472 border=0></td><td valign=top width=7 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=7 border=0></td><td valign=top width=180 height=1><img height=1 src=../plugins/boletophp/imagens/2.png width=180 border=0></td></tr></tbody></table>







<table cellSpacing=0 cellPadding=0 border=0 width=666><TBODY><TR><TD class=ct  width=7 height=12></TD><TD class=ct  width=409 >Sacador/Avalista</TD><TD class=ct  width=250 ><div align=right>Autentica&ccedil&atildeo
mec&acircnica - <b class=cp>Ficha de Compensa&ccedil&atildeo</b></div></TD></TR><TR><TD class=ct  colspan=3 ></TD></tr></tbody></table>







  <table cellSpacing=0 cellPadding=0 width=666 border=0><TBODY><TR><TD vAlign=bottom align=left height=50><?php fbarcode($dadosboleto["codigo_barras"]); ?>
 </TD>
</tr></tbody></table>







<table cellSpacing=0 cellPadding=0 width=666 style="margin-bottom: 1cm!important"><TR><TD class=ct width=666></TD></TR><TBODY><TR><TD class=ct width=666><div align=right>Corte
na linha pontilhada</div></TD></TR><TR><TD class=ct width=666><img height=1 src=../plugins/boletophp/imagens/6.png width=665 border=0></TD></tr></tbody></table>








</body></html>
