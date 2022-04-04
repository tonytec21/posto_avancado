<?php 
include('../../controller/db_functions.php');
$pdo = conectar();
if (isset($_GET['tipo']) && $_GET['tipo'] == 'NA') {
$livro = $_GET['livro'];
$folha = $_GET['folha'];
$nome = $_GET['nome'];
$tipo = $_GET['tipo'];

$busca = $pdo->prepare("SELECT * FROM averbacoes_civil where strLivro = '$livro' and strFolha = '$folha' and strTipo = '$tipo' and nome = '$nome'");
$busca->execute();
$linha = $busca->fetchAll(PDO::FETCH_OBJ);    
}
 ?>

<div class="col-lg-12" style="padding-left: 5%;">
  <div class="row">
   <?php foreach ($linha as $b): ?>
    <div class="col-lg-4 text-justify"  style="z-index: 1!important;">
     <div id="div<?=$b->ID?>"><p><?=strip_tags($b->strAverbacao)?></p></div>
     <div class="col-lg-12"><input style="
     font-size: 70%;
     <?php if (empty($b->strSelo)): ?>
       display:none
     <?php endif ?>
     

     " 
      type="text" id="seloatribuir<?=$b->ID?>" placeholder="COD. DO SELO P/ ATRIBUIR" class="form-control" value="<?=$b->strSelo?>"></div>
      <div class="col-lg-12"><label for="country">EXIBIR AVERBAÇÃO NAS CERTIDÕES</label>
        <select class="form-control" id="setexibirselo<?=$b->ID?>"
          onchange="update_exibir_av('<?=$b->ID?>', $(this).val());"
          >

          <?php if ($b->setRegistroInvisivel == 'N'): ?>
           <option value="N">SIM</option>
           <option value="S">NÃO</option>
         <?php else: ?>
          <option value="S">NÃO</option> 
          <option value="N">SIM</option>
        <?php endif ?>
      </select>
    </div>
     <br><br>
    </div>

    <div class="col-lg-1">
      <button 
      onclick="fquerybd('delete from averbacoes_civil where ID = <?=$b->ID?>', 'EXCLUIR')" 
      class="btn col-lg-12 btn-danger  btn-tooltip" 
      data-content="Excluir Averbacao">
      <i style="font-size:150%; margin-left: -55%;" class="fa fa-trash"></i>
    </button>

    <button
    onclick="editav('<?=$b->ID?>','#div<?=$b->ID?>')"
    class="btn col-lg-12 btn-default  btn-tooltip"
    data-content="Editar">
    <i style="font-size:150%; margin-left: -55%;" class="fa fa-edit"></i>
  </button>

<?php if (empty($b->strSelo)): ?>
  <button onclick="$('#seloaverbacoes').modal(); $('#idav').val('<?=$b->ID?>')" 
  class="btn col-lg-12 btn-primary  btn-tooltip" 
  data-content="Atribuir selo">
  <i style="font-size:150%; margin-left: -55%;" class="fa fa-plus-square"></i>
</button>
<?php endif ?>
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





