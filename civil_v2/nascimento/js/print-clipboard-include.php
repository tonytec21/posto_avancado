<script type="text/javascript">
  var clipboard = new ClipboardJS('.btn');

  clipboard.on('success', function(e) {
    console.log(e);
  });

  clipboard.on('error', function(e) {
    console.log(e);
  });

  $('.printbtn').click(function(){
    var iddiv = $(this).attr("id");
    iddiv = iddiv.replace("print","");
    iddiv = "div"+iddiv;
    printdiv(iddiv);
  });
  $('.copybtn').click(function(){
    var iddiv = $(this).attr("id");
    iddiv = iddiv.replace("copy","");
    iddiv = "div"+iddiv;
    copyToClipboard(iddiv);
  });


  function printdiv(iddiv) {
    var div = iddiv;
    idstyle = "#"+div;

    var minhaTabela = "<div style='display:flex; width:100%'>";
    minhaTabela = minhaTabela+$('#' + div).html();
    minhaTabela = minhaTabela+"<div>";
    var style = "<style>";
    style = style + "<?=$configuracoes_etiqueta?>";
    style = style + "</style>";
    // CRIA UM OBJETO WINDOW
    var win = window.open('', '', 'height=500,width=1000,left=200');
    win.document.write('<html><head>');
    win.document.write('<title>Impressão</title>');   // <title> CABEÇALHO DO PDF.
    win.document.write(style);                                     // INCLUI UM ESTILO NA TAB HEAD
    win.document.write('</head>');
    win.document.write('<body>');
    win.document.write(minhaTabela);                          // O CONTEUDO DA TABELA DENTRO DA TAG BODY
    win.document.write('</body></html>');
    win.document.close();                                            // FECHA A JANELA
    win.print();  




  }

  function printBy(selector){
    var $print = $(selector)
  //.clone()
  .addClass('print')
  //.prependTo('body');

  // Stop JS execution
  window.print();

  // Remove div once printed
  //$print.remove();
}
function copyToClipboard(iddiv) {
  swal('COPIADO!','Localize onde deseja colar o conteúdo copiado e pressione "ctrl+V"!', 'info');
}
</script>