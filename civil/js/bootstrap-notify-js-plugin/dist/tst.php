
<!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>CodePen - Bootstrap notify.js plugin</title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.2.3/animate.min.css'>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
<link rel='stylesheet' href='https://www.w3schools.com/w3css/4/w3.css'><link rel="stylesheet" href="./style.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

</head>
<body>
<!-- partial:index.partial.html -->
<div class="container mt">
  <h1>Bootstrap notify.js Plugin</h1>
  <div class="container">
  <h3>Example</h3>
    <p class="lead">This is an example about  use <code>notify.js</code> plugin.</p>
</div>
  <button class="btn btn-success" onclick="successClick()">Success</button>
  <button class="btn btn-info" onclick="infoClick()">Information</button>
  <button class="btn btn-warning" onclick="warningClick()">Warning</button>
  <button class="btn btn-danger" onclick="dangerClick()">Danger</button>
  <button class="btn btn-danger" onclick="dangerClick22()">tes 22</button>
 
 <button class="btn btn-primary" onclick="primaryClick()">Primary</button>
<button class="btn btn-default" onclick="defaultClick()">Default</button>
  <button class="btn btn-link" onclick="linkClick()">Link</button>
  
  <hr>
<?php if (isset($_SESSION["DADOS_MENSAGEM"]) && !empty($_SESSION["DADOS_MENSAGEM"]) ):?>
<script type="text/javascript">

    $(document).ready(function(){
     
      //  setInterval(function(){        
	//
      //  }, 5000); // TEMPO PARA ATUALIZAR EM MS (milissegundos)
	 dangerClick22();
	  
 
    });
</script>


<?php endif;?>



  <p class="lead">Web Site: <a href="http://bootstrap-notify.remabledesigns.com/" target="_blank">Bootstrap notify.js</a></p>
  
</div>
<!-- partial -->
  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/mouse0270-bootstrap-notify/3.1.5/bootstrap-notify.min.js'></script><script  src="./script.js"></script>

</body>
</html>
