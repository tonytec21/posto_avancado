<?php include('../controller/db_functions.php');
session_start();
include_once("../assets/header.php");
include("../index/verifica-modulos.php");
include_once("../assets/menu.php");
$ass_funcionario = mb_strtoupper($_SESSION['nome']).'<br>'.mb_strtoupper($_SESSION['funcao']);
if (isset($_POST['nomeassinatura']) && !empty($_POST['nomeassinatura'])) {
	$ass_funcionario = str_replace("/","<br>",$_POST['nomeassinatura']);
}


?>


<body class="index-page bg-secondary main_dark_mode" style="max-width: 98%">
	<section style="margin-top: -3%;">
		<div class="row">
			<div class="section section-components col-lg-12">
				<div class="container">

					<div class="row">
           <legend class="bg-white col-lg-2" style="padding:20px;box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, .2);">
            <div class="row col-lg-12">
             <div class="col-lg-12"><i style="color: #172b4d; margin-left: 35%;font-size: 50px;" class=" ni ni-single-02"></i></div>
           </div> 
           <div class="col-lg-12 text-center">
            <h5 style="font-size:50%;">CERTIDÃO NEGATIVA</h5>
          </div> 
          <hr>

        </legend>
        <hr>

        <form class="col-lg-10">
         <textarea class="tinymce-400" id="texto" name="texto">


           <h3 style="display: inline-block;margin-left: 35%"><span>CERTIDÃO </span>	<span style="text-align: center;width: 20%; display: inline;border:1px solid black; padding: 10px;padding-right:50px;"><b>NEGATIVA</b></span></h3><br>

           <?php include('include-certidao-negativa.php');?>

    <div id="containerselos" style="width: 100%;max-width: 100%;display: flex;flex-wrap: wrap;flex-direction: row;padding-top:5px">
     <?php for ($i=1; $i <= $_POST['qtdatos'] ; $i++):?>
      <div style="display: inline-flex;width: 45%; max-width: 45%;margin-right:40px; zoom:80%;">
       <div style="display:inline-table;width: 30%;"><?=qrselo($_POST['SELO'.$i])?></div>
       <div style="display:inline-table;width: 70%;"><?=textoselo($_POST['SELO'.$i])?></div>
     </div>
   <?php endfor ?>
 </div>	
</textarea>
</form>

</div>
</div>
</div>

</div>
</section>
</body>














<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="../assets/js/plugins/nouislider.min.js" type="text/javascript"></script>
<script src="../assets/js/plugins/moment.min.js"></script>
<script src="../assets/js/plugins/datetimepicker.js" type="text/javascript"></script>
<script src="../assets/js/plugins/bootstrap-datepicker.min.js"></script>
<script src="../assets/plugins/jquery.inputmask.bundle.js"></script>
<script src="../assets/plugins/bootstrap-notify/bootstrap-notify.min.js"></script>
<script src="../assets/plugins/tinymce/tinymce.js"></script>
<script src="js/editor.js"></script>
