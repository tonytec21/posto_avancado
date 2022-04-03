<?php 
include('../../controller/db_functions.php');
$pdo = conectar();
if (isset($_GET['tipo']) && $_GET['tipo'] == 'OB') {
$livro = $_GET['livro'];
$folha = $_GET['folha'];
$nome = $_GET['nome'];
$tipo = $_GET['tipo'];

$busca = $pdo->prepare("SELECT * FROM anotacoes_civil where LIVRO = '$livro' and FOLHA = '$folha' and TIPO = '$tipo'");
$busca->execute();
$linha = $busca->fetchAll(PDO::FETCH_OBJ);    
}
 ?>

<div class="col-lg-12" style="padding-left: 5%;">
  <div class="row">
   <?php foreach ($linha as $b): ?>
    <div class="col-lg-4 text-justify"  style="z-index: 1!important;">
     <div id="div<?=$b->ID?>"><p><?=strip_tags($b->ANOTACAO)?></p></div>
     <div class="col-lg-12"><label for="country">EXIBIR AVERBAÇÃO NAS CERTIDÕES</label>
      <select class="form-control" id="setexibirselo<?=$b->ID?>"
        onchange="update_exibir_an('<?=$b->ID?>', $(this).val());"
        >
        <?php if ($b->EXIBIR == 'S' ): ?>
           <option value="S">SIM</option>
        <option value="N">NÃO</option>
      <?php else: ?>
        <option value="N">NÃO</option>
         <option value="S">SIM</option>
        
        <?php endif ?>
       
      </select>
    </div>
     <br><br>
    </div>

    <div class="col-lg-1">
      <button 
      onclick="fquerybd('delete from anotacoes_civil where ID = <?=$b->ID?>', 'EXCLUIR')" 
      class="btn col-lg-12 btn-danger  btn-tooltip" 
      data-content="Excluir Averbacao">
      <i style="font-size:150%; margin-left: -55%;" class="fa fa-trash"></i>
    </button>

    <button
    onclick="editan('<?=$b->ID?>','#div<?=$b->ID?>')"
    class="btn col-lg-12 btn-default  btn-tooltip"
    data-content="Editar">
    <i style="font-size:150%; margin-left: -55%;" class="fa fa-edit"></i>
  </button>


<button onclick="printdiv('div<?=$b->ID?>')" 
class="btn col-lg-12 btn-warning  btn-tooltip" 
data-content="Imprimir Etiqueta">
<i style="font-size:150%; margin-left: -55%;" class="fa fa-print"></i>
</button>

</div>
<div class="col-lg-1"></div>



<?php endforeach ?>
</div>
</div>



<script type="text/javascript">

  $('.btn-tooltip').mouseenter(function(){
    html = $(this).html();
    html_old = $(this).html();
    $('.spantooltip').hide();
    html = html +'<i style="font-size:20px; position: absolute;margin-left: 48%; margin-top:-50%;color:rgba(40, 149, 237,.5);z-index: 2!important;" class="ni ni-button-play spantooltip"></i><span class="spantooltip" style="background: transparent;color:white; width:80px;font-size:70%; position:absolute; margin-top:-60%; margin-left: 84%; padding: 15%;background:rgba(40, 149, 237,.5);border-radius:5%;z-index: 100!important;">'+$(this).attr('data-content')+'</span>';
    $(this).html(html);

    $('.btn-tooltip').mouseleave(function(){
      $('.spantooltip').hide();
    });

  });

  
</script>





