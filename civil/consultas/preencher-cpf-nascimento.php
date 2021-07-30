<?php

include('../controller/db_functions.php');
$pdo = conectar();


if(isset($_POST["cpfpai"]) && !empty($_POST["cpfpai"])){
    //Get all state data
    $cpf_pai = $_POST['cpfpai'];


    $busca_pai = $pdo->prepare("select * from pessoa where strCPFcnpj = '$cpf_pai'");
    $busca_pai->execute();
    $bp = $busca_pai->fetch(PDO::FETCH_ASSOC);
  


$strNome = $bp['strNome'];
$strRG = $bp['strRG'];
$strOrgaoEm = $bp['strOrgaoEm'];
$strProfissao=$bp['strProfissao'];
$strNaturalidade=$bp['strNaturalidade'];
$setSexo=$bp['setSexo'];
$strNacionalidade=$bp['strNacionalidade'];
$dataNascimento=$bp['dataNascimento'];
$setEstadoCivil=$bp['setEstadoCivil'];
$strLogradouro=$bp['strLogradouro'];
$strBairro=$bp['strBairro'];
$intUFcidade=$bp['intUFcidade'];
$strUF=$bp['strUF'];
$strNomePai=$bp['strNomePai'];
$strNomeMae=$bp['strNomeMae'];
}
?>

<?php if ($busca_pai->rowCount()!=0): ?>
  
<script type="text/javascript">
  
$('#NOMEPAI').val('<?=$strNome?>');
$('#RGPAI').val('<?=$strRG?>');
$('#ORGPAI').html('<label class="col-md-4 control-label" >ORÃO EMISSOR:</label><div class="col-md-8"><input name="ORGAOEMISSORPAI" id="ORGAOEMISSORPAI" class="form-control text-center" required="" readonly="" value="<?=$strOrgaoEm?>"></div>');
$('#NACIONALIDADEPAI').val('<?=$strNacionalidade?>');
$('#NATURALIDADEPAI').val('<?=$strNaturalidade?>');
$('#DATANASCIMENTOPAI').val('<?=$dataNascimento?>');
$('#SEXPAI').html('<label class="col-md-4 control-label" >SEXO:</label><div class="col-md-8"><input name="SEXOPAI" id="SEXOPAI" class="form-control text-center" required="" readonly="" value="<?=$setSexo?>"></div>');
$('#ECPAI').html('<label class="col-md-4 control-label" >ESTADO CIVIL:</label><div class="col-md-8"><input name="ESTADOCIVILPAI" id="ESTADOCIVILPAI" class="form-control text-center" required="" readonly="" value="<?=$setEstadoCivil?>"></div>');
$('#ESTADOCIVILPAI').val("<?=$setEstadoCivil?>");
$('#PROFISSAOPAI').val('<?=$strProfissao?>');
$('#ENDERECOPAI').val('<?=$strLogradouro?>');
$('#BAIRROPAI').val('<?=$strBairro?>');
$('#CIDADEPAI').val('<?=$intUFcidade?>');
$('#AVO1PATERNO').val('<?=$strNomePai?>');
$('#AVO2PATERNO').val('<?=$strNomeMae?>');



</script>
<?php endif ?>






