<?php
include('../controller/db_functions.php');
$pdo = conectar();
session_start();
$id = $_POST['id'];

if (isset($_GET['id'])) {
$idget = $_GET['id'];
}

if (isset($_POST['Conjuge1']) && $_POST['Conjuge1']!='' ) {
UPDATE_CAMPO_ID('registro_casamento_novo','strNomeNoivo',$_POST['Conjuge1'],$id);
die('<div class="alert bg-green " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> O dado foi alterado !!!</span>
            </div>
             <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 1000);
                 </script>'
        );
}

if (isset($_POST['sexoConjuge1']) && $_POST['sexoConjuge1']!='' ) {
UPDATE_CAMPO_ID('registro_casamento_novo','setSexoNoivo',$_POST['sexoConjuge1'],$id);
die('<div class="alert bg-green " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> O dado foi alterado !!!</span>
            </div>
             <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 1000);
                 </script>'
        );
}

if (isset($_POST['Conjuge2']) && $_POST['Conjuge2']!='' ) {
UPDATE_CAMPO_ID('registro_casamento_novo','strNomeNoiva',$_POST['Conjuge2'],$id);
die('<div class="alert bg-green " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> O dado foi alterado !!!</span>
            </div>
             <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 1000);
                 </script>'
        );
}

if (isset($_POST['sexoConjuge2']) && $_POST['sexoConjuge2']!='' ) {
UPDATE_CAMPO_ID('registro_casamento_novo','setSexoNoiva',$_POST['sexoConjuge2'],$id);
die('<div class="alert bg-green " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> O dado foi alterado !!!</span>
            </div>
             <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 1000);
                 </script>'
        );
}
if (isset($_POST['regime']) && $_POST['regime']!='' ) {
UPDATE_CAMPO_ID('registro_casamento_novo','setRegime',$_POST['regime'],$id);
die('<div class="alert bg-green " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> O dado foi alterado !!!</span>
            </div>
             <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 1000);
                 </script>'
        );
}


#------------------------------------------------------------------------------------------------------------------------------------
#                                                             DADOS NASCIMENTO                                                      |
#------------------------------------------------------------------------------------------------------------------------------------

if (isset($_POST['nome']) && $_POST['nome']!='' ) {
UPDATE_CAMPO_ID('registro_nascimento_novo','strNomeFilho',$_POST['nome'],$id);
die('<div class="alert bg-green " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> O dado foi alterado !!!</span>
            </div>
             <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 1000);
                 </script>'
        );
}

if (isset($_POST['sexo']) && $_POST['sexo']!='' ) {
UPDATE_CAMPO_ID('registro_nascimento_novo','setSexoFilho',$_POST['sexo'],$id);
die('<div class="alert bg-green " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> O dado foi alterado !!!</span>
            </div>
             <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 1000);
                 </script>'
        );
}

if (isset($_POST['genitor_mae']) && $_POST['genitor_mae']!='' ) {
UPDATE_CAMPO_ID('registro_nascimento_novo','strNomeMae',$_POST['genitor_mae'],$id);
die('<div class="alert bg-green " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> O dado foi alterado !!!</span>
            </div>
             <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 1000);
                 </script>'
        );
}

if (isset($_POST['genitor']) && $_POST['genitor']!='' ) {
UPDATE_CAMPO_ID('registro_nascimento_novo','NOMEPAI',$_POST['genitor'],$id);
die('<div class="alert bg-green " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> O dado foi alterado !!!</span>
            </div>
             <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 1000);
                 </script>'
        );
}

#------------------------------------------------------------------------------------------------------------------------------------
#                                                             DADOS OBITO                                                   |
#------------------------------------------------------------------------------------------------------------------------------------

if (isset($_POST['tipomorte']) && $_POST['tipomorte']!='' ) {
UPDATE_CAMPO_ID('registro_obito_novo','strTipoMorte',$_POST['tipomorte'],$id);
die('<div class="alert bg-green " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> O dado foi alterado !!!</span>
            </div>
             <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 1000);
                 </script>'
        );
}

if (isset($_POST['causamorteantecedentes']) && $_POST['causamorteantecedentes']!='' ) {
UPDATE_CAMPO_ID('registro_obito_novo','strCausaMorte',$_POST['causamorteantecedentes'],$id);
die('<div class="alert bg-green " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">error</i>
            <span> O dado foi alterado !!!</span>
            </div>
             <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 1000);
                 </script>'
        );
}

#------------------------------------------------------------------------------------------------------------------------------------
#                                                          TEXTO DA AVERBACAO                                                |
#------------------------------------------------------------------------------------------------------------------------------------
if (isset($_POST['strAverbacao']) && $_POST['strAverbacao']!='' ) {
	$_SESSION['averbacaotemp'] = $_POST['strAverbacao'];
  $_SESSION['livrotemp'] = $_POST['livro'];
  $_SESSION['folhatemp'] = $_POST['folha'];

	die('<!--div class="alert bg-blue " role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
            <i class="material-icons align-baseline">assessment</i>
            <span>ARMAZENANDO SIMULAÇÃO..."'.strtoupper($_SESSION['averbacaotemp']).'<br>'.'LIVRO:'.$_POST['livro'].'<br>'.'FOLHA:'.$_POST['folha']. '"</span>
            </div-->
             <!-- fecha o alerta depois de 5 segundos o alerta -->
            <script>
            window.setTimeout(function() {
            $(".alert").fadeTo(1000, 0).slideUp(500, function(){
              $(this).remove();
            });
            }, 1000);
                 </script>');
}



unset($_SESSION['sucesso']);
unset($_SESSION['erro']);


if (isset($_POST['subimitdocs'])) {
unset($_POST['subimitdocs']);
#var_dump($_POST);

UPDATE_CAMPO_ID('registro_nascimento_novo','strNumeroRg',$_POST['strNumeroRg'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','dataExpRg',$_POST['dataExpRg'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','OrgaoExpRg',$_POST['OrgaoExpRg'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','dataValidadeRg',$_POST['dataValidadeRg'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','strNumeroPisNis',$_POST['strPisNis'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','dataExpPisNis',$_POST['dataExpPisNis'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','OrgaoExpPisNis',$_POST['OrgaoExpPisNis'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','dataValidadePisNis',$_POST['dataValidadePisNis'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','strNumeroPassaporte',$_POST['strPassaporte'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','dataExpPassaporte',$_POST['dataExpPassaporte'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','OrgaoExpPassaporte',$_POST['OrgaoExpPassaporte'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','dataValidadePassaporte',$_POST['dataValidadePassaporte'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','strNumeroCartSaude',$_POST['strCartaoSaude'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','dataExpCartSaude',$_POST['dataExpCartaoSaude'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','OrgaoExpCartSaude',$_POST['OrgaoExpCartaoSaude'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','dataValidadeCartSaude',$_POST['dataValidadeCartaoSaude'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','strNumeroTituloEleitor',$_POST['strTituloEleitor'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','dataExpTituloEleitor',$_POST['dataExpTituloEleitor'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','OrgaoExpTituloEleitor',$_POST['OrgaoExpTituloEleitor'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','dataValidadeTituloEleitor',$_POST['dataValidadeTituloEleitor'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','strCep',$_POST['strCep'],$idget);
UPDATE_CAMPO_ID('registro_nascimento_novo','strGrupoSanguineo',$_POST['strGrupoSanguineo'],$idget);

#$_SESSION['sucesso'] = 'SUCESSO!';
header('location:../incluir-averbacao.php?idnasc='.$idget);

}

?>