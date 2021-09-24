<?php 

include_once('../controller/db_functions.php');

$pdo = conectar();




if ($_SERVER['REQUEST_METHOD'] === 'POST' && $_POST['list'] == 'list'):
    // The request is using the POST method

    $sth = $pdo->query("SELECT * from auditoria where dataHora >= NOW() + INTERVAL -15 DAY AND dataHora <  NOW() + INTERVAL  0 DAY  order by id DESC");

    $sth->execute();

else: 


        if(isset($_POST['data_inicio']) && !empty($_POST['data_inicio']) ){

			$data_inicio = $_POST['data_inicio'];
            $data_inicio  = " AND dataHora >= '".$data_inicio."'";

		}else{
			$data_inicio ='';
		}


		if(isset($_POST['data_fim']) && !empty($_POST['data_fim']) ){

			$data_fim = $_POST['data_fim'];

            $data_fim  = " AND DATE_SUB(dataHora, INTERVAL 1 DAY) < '".$data_fim."'";


		}else{
			$data_fim ='';
		}


        $parametro_data = $data_inicio.$data_fim;

        
        $funcionario = infoValida($_POST['funcionario']);
        if($funcionario ){
        $funcionario = array_filter($funcionario);  #verifica se existe
        $funcionario = array_values($funcionario);  #reinicia as chaves caso alguma nao exista.
        }
        if(isset($funcionario) and !empty($funcionario) ){

            $funcionario = implode('\', \'', $funcionario);
            $funcionario = "'" . $funcionario . "'";
            $parametro_funcionario = ' AND strUsuario in ('.$funcionario.')';

        }else{
            $parametro_funcionario ='';
        }


        
        $codigo_ato = infoValida($_POST['codigo_ato']);
        if($codigo_ato ){
        $codigo_ato = array_filter($codigo_ato);  #verifica se existe
        $codigo_ato = array_values($codigo_ato);  #reinicia as chaves caso alguma nao exista.
         } 
        if(isset($codigo_ato) and !empty($codigo_ato) ){

            $codigo_ato = implode('\', \'', $codigo_ato);
            $codigo_ato = "'" . $codigo_ato . "'";
            $parametro_codigo_ato = ' AND strTipoAto in ('.$codigo_ato.')';

        }else{
            $parametro_codigo_ato ='';
        }




        $atribuicao = trim($_POST['atribuicao']);

        if(infoValida($atribuicao) ){

            $parametro_atribuicao = ' AND strTipoAto  LIKE "'.$atribuicao.'%"';

        }else{
            $parametro_atribuicao ='';
        }


        $ordem = trim($_POST['ordem']);

        if(infoValida($ordem) ){

            $parametro_ordem = $ordem;

        }else{
            $parametro_ordem =' DESC';
        }



            $sth = $pdo->prepare("SELECT * 
            FROM auditoria
            WHERE ID ".$parametro_data.$parametro_funcionario.$parametro_codigo_ato.$parametro_atribuicao." ORDER BY ID ".$parametro_ordem);


            $sth->execute();

                
endif;

$dados = $sth->fetchAll(PDO::FETCH_OBJ);
$count = $sth->rowCount();

?>


<div class="table-responsive">

          <table  class="table_exportable_protocolo table-bordered table-striped table-hover js-exportable text-black" id="customers"

          
            style="widht:100%;text-transform:capitalize;font-size:12px" width="100%">
            <thead>
                <tr>

                    <th style="width:4%">####</th>
                    <th>ATO</th>
                    <th>SELO/SELO INICIAL</th>
                    <th>NOME</th>
                    <th>INFORMAÇÃO</th>
                    <th>ATIVIDADE</th>
                    <th>DATA/HORA</th>
                    <th>ETIQUETA</th>

                </tr>
            </thead>

            <tbody>
              

            <?php foreach ($dados as $b) :?>
                    <tr>

                        <td>
                        <div  class="col-md-2" >
                        <input type="checkbox" id="<?=$b->id?>" data-ato="<?=$b->strTipoAto?>"  class="marcados" style="transform: scale(2);"  onclick="myFunction();" />
                        <label for="<?=$b->id?>"></label>
                        </div>
                        </td> 


                        <td id="codigo_ato">
                        <?=$b->strTipoAto?>
                        </td>

                        <td>
                        <a style="font-size: 8px" class="btn btn-secondary" href="https://selo.tjma.jus.br/#/resumo/<?=strip_tags($b->strSelo)?>" target='_blank'> <i class="fa fa-tags" ></i> <?=strip_tags($b->strSelo)?> </a>
                        </td>

                        <td>
                          <?php
                          
                                $nome_usuario =  $b->strUsuario;
                                $nome_usuario = explode(' ',$nome_usuario);
                                echo $nome_usuario[0];

                          ?>
                        </td>

                        <td>
                          <?php
                            $informação = '';
                            if($b->Livro != '0') {

                                $informação .= 'Livro: '.str_pad($b->Livro,5,"0", STR_PAD_LEFT).';';
                            }

                            if($b->Folha != '0') {

                                $informação .= ' Folha: '.str_pad($b->Folha,5,"0", STR_PAD_LEFT).';';
                            }
                            if($b->NumeroPapelSeguranca != '0') {

                                $informação .= ' N° Papel de Seguranca: '.str_pad($b->NumeroPapelSeguranca,5,"0", STR_PAD_LEFT).';';
                            }
                            echo $informação;

                          ?>
                        </td>

                        
                        
                        <td>
                        <?=$b->intAcao?>
                        </td>

                        
                        <td>

                        <?=date('d/m/Y - H:i:s', strtotime($b->dataHora))?>
                        </td>

                        
                        <td>
                        <a target="_blank" href="geradorqrcode.php?id=<?=$b->id?>" class="btn waves-effect bg-blue text-white">ETIQUETA</a>
                        </td>

                    </tr>
                   
                   
                    <?php endforeach;?>



                                    </tbody>
                                </table>

          </div> 


        
<script type="text/javascript">

function myFunction() {
  var list=[];
  var ato = [];
  $("#customers :checked").each(function(i,e){
    list.push($(this).attr("id"));
    ato.push($(this).attr("data-ato"))
});
// console.log(list);
// console.log(ato);



}


$(document).ready(function() {




    $('.table_exportable_protocolo').DataTable( {
      dom: 'Bfrtip',
       order: [[ 0, "desc" ]],
       lengthMenu: [[10, 25, 50, -1], [10, 25, 50, "All"]],
       pageLength: 10,
       bSort: true,
       info: true,


  buttons: [
      
    {
      "id": 'Exportpdf',
      "text": '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> GERAR RECIBO ',
      'className': 'btn  btn-lg btn-default',

    //   'action': function (e, dt, node, config)
    //   {
    //       window.location.href = './../pdf/livro-protocolo.php';
    //   }
    'action': function (e, node, config){
                $('#livro_ordem').modal('show');
                var p=$("#livro_ordem #resultado_atos");
                $(p).html("<h3 class='text-white'>Informação dos Atos: </h3>");

                var list=[];
                var ato = [];
                $("#customers :checked").each(function(i,e){

                 // ato.push($(this).attr("data-ato"));

              //    $(p).html($(p).html() + '<br> ID: ' + $(this).attr("id")  + ' Codigo do ato: '+ $(this).attr("data-ato") );

                  $(p).append('\
                  <div class="row">    <div class="col-2"> <input type="hidden"  value= "'+$(this).attr("id")+'" name="id_recebido[]" required>\</div>\
    <div class="col-6"><label>Codigo do ato</label>\
        <div class="form-group">\
            <input type="text"  value= "'+$(this).attr("data-ato")+'" name="codigo_ato[]"  style="margin-left:-0px !important" class="form-control" placeholder="" required>\
        </div>\
    </div>\
    <div class="col-4"><label>Quantidade</label>\
        <div class="form-group"> <input type="text" value= "1" name="quantidade_recebido[]" style="margin-left:-0px !important" class="form-control" placeholder="" required></div></div>\
</div>'); //add input box

              });

                // $.each($("input[name='disponivel']:checked"), function() {
                //     $(p).html($(p).html() + '<br>' + $(this).val());
                // });  

                }
    },
    {
      "extend": 'copy',
      "text": '<i class="fa fa-clipboard" aria-hidden="true"></i> Copiar',
      'className': 'btn btn-primary'
    },
    {
      "extend": 'excel',
      "text": '<i class="fa fa-file-excel-o" aria-hidden="true"></i> Exportar Excel',
      'className': 'btn btn-primary'
    },
  
    {
      "extend": 'print',
      "text": '<i class="fa fa-print" ></i> Imprimir',
      'className': 'btn btn-primary'
    },
    {
      "extend": 'pdf',
      "text": '<i class="fa fa-file" ></i> Exportar Pdf',
      'className': 'btn btn-primary'
    }
    
    // {
    //   "id": 'Exportpdf',
    //   "text": '<i class="fa fa-file-pdf-o" aria-hidden="true"></i> Exportar Depósito Prévio',
    //   'className': 'btn btn-secondary',
    // //   'action': function (e, dt, node, config)
    // //   {
    // //       window.location.href = './../pdf/livro-protocolo.php';
    // //   }
    // 'action': function (e, node, config){
    //             $('#livro_ordem').modal('show')
    //             }
    // }

  ]
});



} );


</script>

<style>
  .table .ui-sortable-helper{background:#FFF; box-shadow:0px 0px 5px #000000; width:100%;}
</style>

  