<?php

include('../controller/db_functions.php');
$pdo = conectar();


if(isset($_POST["cpfmae"]) && !empty($_POST["cpfmae"])){
    //Get all state data
    $cpf_mae = $_POST['cpfmae'];


    $busca_mae = $pdo->prepare("select * from pessoa where strCPFcnpj = '$cpf_mae'");
    $busca_mae->execute();
    $bp = $busca_mae->fetch(PDO::FETCH_ASSOC);
  


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

<?php if ($busca_mae->rowCount()!=0): ?>
  
<script type="text/javascript">
  
$('#NOMEMAE').val('<?=$strNome?>');
$('#RGMAE').val('<?=$strRG?>');
$('#ORGMAE').html('<label class="col-md-4 control-label" >ORÃO EMISSOR:</label><div class="col-md-8"><input name="ORGAOEMISSORMAE" id="ORGAOEMISSORMAE" class="form-control text-center" required="" readonly="" value="<?=$strOrgaoEm?>"></div>');
$('#NACIONALIDADEMAE').val('<?=$strNacionalidade?>');
$('#NATURALIDADEMAE').val('<?=$strNaturalidade?>');
$('#DATANASCIMENTOMAE').val('<?=$dataNascimento?>');
$('#SEXMAE').html('<label class="col-md-4 control-label" >SEXO:</label><div class="col-md-8"><input name="SEXOMAE" id="SEXOMAE" class="form-control text-center" required="" readonly="" value="<?=$setSexo?>"></div>');
$('#ECMAE').html('<label class="col-md-4 control-label" >ESTADO CIVIL:</label><div class="col-md-8"><input name="ESTADOCIVILMAE" id="ESTADOCIVILMAE" class="form-control text-center" required="" readonly="" value="<?=$setEstadoCivil?>"></div>');
$('#ESTADOCIVILMAE').val("<?=$setEstadoCivil?>");
$('#PROFISSAOMAE').val('<?=$strProfissao?>');
$('#ENDERECOMAE').val('<?=$strLogradouro?>');
$('#BAIRROMAE').val('<?=$strBairro?>');
$('#CIDADEMAE').val('<?=$intUFcidade?>');
$('#AVO1MATERNO').val('<?=$strNomePai?>');
$('#AVO2MATERNO').val('<?=$strNomeMae?>');



</script>
<?php endif ?>






