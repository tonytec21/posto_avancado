 <?php
 session_start();
 require_once('api.php');

 class DadosEnvia{
    private $dados = '{
        "codigoAto":"14.a",
       "escrevente":"Mario Miranda",
       "isento":{
          "value":true,
          "motivo":"Teste"
       },
      "versaoTabelaDeCustas":"0120191011",
       "nomesPartes": {
          "nomesPartes":"X",
          "parteAto":[
          {
             "documento":"04355863000132",
             "nome":"SUPERINTENDÊNCIA ESTADUAL DE HABITAÇÃO - SUHAB"
          },
          {
             "documento":"78444063215",
             "nome":"DIEGO ROBERTO AFONSO"
          },
          {
             "documento":"09977384215",
             "nome":"CARLOS ALBERTO VALENTE ARAÚJO"
          },
          {
             "documento":"58905553249",
             "nome":"MARIA DO CÉU SOUZA CALACINA"
          },
          {
             "documento":"05332680287",
             "nome":"JOSÉ RUI CIRINO CALACINA"
          }
       ]},

       "dadosSelo":{
        "escrevente":"FULANO",
        "folha": "433",
        "livro": "A3433",
        "versaoTabelaDeCustas":"0120191011"
       }
    }';
    private $url = 'https://ma.portalselo.com.br:9443/selo/civil/atos-em-geral';

    public function DADOS() {

      return $this->dados ;
    }

    public function URL() {
        return $this->url ;
    }
}


/*it is my new session*/
if (isset($_SESSION["selo"])) {
  $informacao = $_SESSION["selo"];
  $info = json_decode(json_encode($informacao));
  //var_dump($info);
//  var_dump($info->status);
if(isset($info->status)){
  $status = $info->status;
}else {
  $status = 0;
}
  if ($status== '400') {
    var_dump($info);
  }elseif   ($status== '401') {
    var_dump($info);
  }elseif   ($status== '403') {
    var_dump($info);
  }elseif   ($status== '404') {
    var_dump($info);
  }elseif   ($status== '415') {
    var_dump($info);
  }else {
 
var_dump($info->resumos[0]);
 $k = $info->resumos[0]->numeroSelo;
 echo '<h2> SELO GERADO: '.$k.'</h2>';
  }


  unset($_SESSION['selo']);
  if (isset($_SESSION['selo']) || empty($_SESSION['selo'])) {
  //echo "sessão deletada";
  }
}

?>
