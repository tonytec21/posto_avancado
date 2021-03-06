<?php include('../controller_index/db_functions.php');
#error_reporting(0);
#ini_set('display_errors', 0);
session_start();
if(!isset($_SESSION['id'])) {header('location:../login.php');};

/*if (empty($_SESSION['id']) && empty($_SESSION['nome'])) {
$_SESSION['msg'] = "<div class='alert alert-info' role='alert' id='response'>
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>
    &times;</span></button>
    Área restrita
    </div>";
    header("location: .../.../login.php");
}
*/

$URL_ATUAL= "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$titulo = 'Procuração';
$pdo = conectar();
if (isset($_GET['id'])) {
$id = $_GET['id'];
}
else{
$id=0;
}

#var_dump($pdo);
$dados_lavratura = SEARCH_ID('notas_lavratura',$id,'no');
$r = PESQUISA_ALL_ID('notas_lavratura',$id);

include_once("../assets/header.php");
?>

<?php include_once("../assets/menu.php");?>

<style type="text/css">
@media only screen and (max-width: 700px) {
#ras{ max-width: 100%!important; padding-left: 0%!important; }
.samobile{min-width: 140%!important;margin-left: -35%}
.panel-default a {background: #ddeaff;color:#0d2244!important;}
.semback  {background:white!important;color:#0d2244!important;}

}
@media (min-width: 768px) {
.modal-xl {
width: 100%;
max-width:1300px;
}
}
.samobile{
    width: 50%;
    /* margin-bottom: 10px; */
}
.ico-menu{
    color:white; margin-top: 5px; margin-left: 40px; cursor:pointer;
}

	a:hover, a:focus{
		color:#2e2e2e;
	}

.info-box:hover{
    opacity: 1;
    box-shadow: 0px 1px black;
    transition: all 0.2s cubic-bezier(1, 0.03, 1, 1.36);
    transform: scale(1.1);
    border-radius: 6px;
}
</style>


<body class="index-page bg-secondary main_dark_mode">


<section>
    <br>

    <div class="container">


        <div class="py-2 bg-secondary">


            <div class="row" style="margin-left: 0px">
                <legend>
                    <i class="fa fa-bookmark-o" aria-hidden="true"></i>
                    MÓDULOS DO SISTEMA
                </legend>
            </div>

            


            <div class="row" style="margin-left: 15px;">

                    <?php $r = PESQUISA_ALL('cadastroserventia'); foreach ($r as $r ):?>
                        <?php if ($r->checkboxCivil =='S') {
                    echo "
                    <div onclick='window.location.href=\"../civil/index.php\"' style='cursor:pointer; margin-left: 0px;' class='col-lg-6 col-md-6 col-sm-6 col-xs-12 samobile'>
                        <div style='cursor:pointer;background:linear-gradient(45deg, #3394d4, #daf0ff);' class='info-box bg-cyan'>
                            <div class='icon'>
                            <i class='material-icons'>person_pin</i>
                            <div class='text-center' style='margin-top:0px; font-size: 13px; color: #fff;'> REGISTRO CIVIL </div>
                            </div>


                            </div>
                            
                    </div>

                    ";
                    }else {
                    echo "";
                    }
                    ?>
                    <?php endforeach ?>
                

                     <div onclick='window.location.href="../pessoas/index.php"' style='cursor:pointer; margin-left: 0px;'  class='col-lg-6 col-md-6 col-sm-6 col-xs-12 samobile'>
                        <div style='cursor:pointer;background:linear-gradient(45deg, #a80f1e, #f37783);' class='info-box bg-brown'>
                                <div class='icon'>
                                    <i class='material-icons'>person</i>
                                    <div class='text-center' style='margin-top:0px; font-size: 13px; color: #fff;'>CADASTRO DE PESSOAS</div>
                                </div>

                         </div>
          
                     </div>
                </div>

                <!-- <div class="col-sm-6">
                    <div onclick='window.location.href="../atos-praticados.php"' style='cursor:pointer'  class='col-lg-6 col-md-6 col-sm-6 col-xs-12 samobile'>
                        <div style='cursor:pointer;background:linear-gradient(45deg, rgb(20 20 20), #cbcbcb);' class='info-box bg-brown'>
                            <div class='icon'>
                                <i class='material-icons'>assessment</i>
                                <div class='text-center' style='margin-top:0px; font-size: 13px; color: #fff;'>ATOS PRATICADOS</div>
                            </div>

                        </div>
          
                    </div>
                </div> -->
            

 <hr>
 
    
    <div class="container">
 <div class="py-2 bg-secondary">


<div class="row">
    <legend>
        <i class="fa fa-bookmark-o" aria-hidden="true"></i>
        LINKS ÚTEIS
    </legend>
</div>

<div class="row" style="margin-left: 0px;">

<!-- CRC NACIONAL -->
<?php $r = PESQUISA_ALL('cadastroserventia'); foreach ($r as $r ):?>
                    <?php if ($r->checkboxCivil =='S') {
                    echo "
<div class='col-sm-6' style='max-width: 20%!important;'>
  <a href='https://sistema.registrocivil.org.br/' target='_blank' title='CRC NACIONAL'>
                                <div style='cursor:pointer; width: 150px;height: 60px;background:#fff !important' class='info-box bg-brown'>
                                <div class='icon'>
                                <img style='width: 50%; margin-top: 8%;' src='images/crc_nacional.jpg'/>
                                
                            </div>

                     </div>
      
                </a>
            </div>

<!-- INFODIP -->
<div class='col-sm-6' style='max-width: 20%!important;'>
  <a href='https://infodipweb.tse.jus.br/infodipweb/home/' target='_blank' title='INFODIP'>
                                <div style='cursor:pointer; width: 150px;height: 60px;background:#fff !important' class='info-box bg-brown'>
                                                                  <div class='icon'>
                                    <img style='width: 50%; margin-top: 8%;' src='images/infodip.jpg'/>
                                    
                                </div>

                         </div>
          
                    </a>
                </div>



<!-- CFM -->
<div class='col-sm-6' style='max-width: 20%!important;'>
  <a href='https://portal.cfm.org.br/busca-medicos/' target='_blank' title='Conselho Federal de Medicina'>
                                <div style='cursor:pointer; width: 150px;height: 60px;background:#fff !important' class='info-box bg-brown'>
                                                                  <div class='icon'>
                                    <img style='width: 50%; margin-top: 8%;' src='images/cfm.jpg'/>
                                    
                                </div>

                         </div>
          
                    </a>
                </div>

          ";
          }else {
          echo "";
          }
          ?>
          <?php endforeach ?>

<!-- CONSULTAR SELO (SAUIN) -->
<div class='col-sm-6' style='max-width: 20%!important;'>
  <a href="https://selo.tjma.jus.br/" target="_blank" title='CONSULTAR SELO'>
                                <div style='cursor:pointer; width: 150px;height: 60px;background:#fff !important' class='info-box bg-brown'>
                                <div class='icon'>
                                <img style='width: 50%; margin-top: 8%;' src='images/consultar selo.jpg'/>
                                
                            </div>

                     </div>
      
                </a>

</div>

<!-- TRIBUNAL DE JUSTIÇA DO MARANHÃO (TJMA) -->
<div class='col-sm-6' style='max-width: 20%!important;'>
  <a href="http://www.tjma.jus.br/" target="_blank" title='TJ/MA'>
                                <div style='cursor:pointer; width: 150px;height: 60px;background:#fff !important' class='info-box bg-brown'>
                                <div class='icon'>
                                <img style='width: 50%; margin-top: 8%;' src='images/TJMA.jpg'/>
                                
                            </div>

                     </div>
      
                </a>

</div>

<!-- WHATSAPP WEB -->
<div class='col-sm-6' style='max-width: 20%!important;'>
  <a href="https://web.whatsapp.com/" target="_blank" title='WHATSAPP WEB'>
                                <div style='cursor:pointer; width: 150px;height: 60px;background:#fff !important' class='info-box bg-brown'>
                                <div class='icon'>
                                <img style='width: 50%; margin-top: 8%;' src='images/whatsapp.jpg'/>
                                
                            </div>

                     </div>
      
                </a>

</div>

                    </div>
            </div>
    </div>
</section>

</body>



<?php include_once("../assets/footer.php");?>