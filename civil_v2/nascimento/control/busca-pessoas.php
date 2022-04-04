<?php 
include('../../controller/db_functions.php');
$pdo = conectar();
$pesquisa = addslashes($_GET['pesquisa']);
$busca = $pdo->prepare("SELECT ID, strNome, strCPFcnpj, strRG, strOrgaoEm, strProfissao, strNaturalidade, setSexo, strNacionalidade,dataNascimento,setEstadoCivil,strNomeFilhos,strNomeConjuge,strNomeExConjuge,dataCasamento,strCartorioCasamento,strLogradouro,strEmail,strBairro,intUFcidade,strUF,strTelefone,strTelCelular,strNomePai,strNomeMae FROM pessoa where strNome LIKE '%$pesquisa%'");
$busca->execute();
$linha_busca = $busca->fetchAll(PDO::FETCH_OBJ);
 ?>

<?php if ($pesquisa!='' && !empty($pesquisa)): ?>
	

			 <div class="table-responsive">
			 	<table class="table table-bordered table-striped table-hover js-basic-example dataTable">
			 		<thead>
			 			<tr>
			 				<th>NOME</th>
			 				<th>DADOS</th>   
			 				<th>######</th>

			 			</tr>
			 		</thead>
	
			 		<tbody>
			 			<?php foreach ($linha_busca as $b): ?>
			 				<tr>
			 					<td class="text-center"><?=$b->strNome?></td>
			 					<td style="width: 40%;white-space: pre-wrap;text-align: justify;"><?=montaqualificacaotext_id($b->ID, date('Y-m-d'),'')?></td>
			 					<td class="text-center">
			 						<button class="btn btn-info" onclick="	 						 
          var campo = $('#tipopartebuscar').val();
          var cod = '<?=$b->strCPFcnpj?>';
          var nome = '<?=addslashes($b->strNome)?>';
          var id = '<?=$b->ID?>';
          var rg = '<?=$b->strRG?>';
          var sexo = '<?=$b->setSexo?>';
          var orgaoemissor = '<?=$b->strOrgaoEm?>';
          var nacionalidade = '<?=$b->strNacionalidade?>';
          var naturalidade = '<?=addslashes($b->strNaturalidade)?>';
          var datanascimento = '<?=$b->dataNascimento?>';
          var estadoCivil = '<?=$b->setEstadoCivil?>';
          var profissao = '<?=$b->strProfissao?>';
          var logradouro = '<?=addslashes($b->strLogradouro)?>';
          var bairro = '<?=addslashes($b->strBairro)?>';
          var cidade = '<?=addslashes($b->intUFcidade)?>';

          $('#formulario'+campo).hide();
          if (campo!='ROGOPAI' && campo!='ROGOMAE' && campo!='ROGOPAISOCIO' && campo!='ROGOMAESOCIO' && campo!='ROGODECLARANTE' && campo!='PROCURADORPAI') {
          $('#CPF'+campo).val(cod);
          $('#NOME'+campo).val(nome);
          $('#IDPESSOA'+campo).val(id);
          $('#RG'+campo).val(rg);
          $('#SEXO'+campo).val(sexo);
          $('#ORGAOEMISSOR'+campo).val(orgaoemissor);
          $('#NACIONALIDADE'+campo).val(nacionalidade);
          $('#NATURALIDADE'+campo).val(naturalidade);
          $('#DATANASCIMENTO'+campo).val(datanascimento);
          $('#ESTADOCIVIL'+campo).val(estadoCivil);
          $('#PROFISSAO'+campo).val(profissao);
          $('#ENDERECO'+campo).val(logradouro);
          $('#BAIRRO'+campo).val(bairro);
          $('#CIDADE'+campo).val(cidade);

          campos_input('NOME'+campo, $('#idreg2').val());
          campos_input('CPF'+campo, $('#idreg2').val());
          campos_input('RG'+campo, $('#idreg2').val());
          campos_input('SEXO'+campo, $('#idreg2').val());
          campos_input('ORGAOEMISSOR'+campo, $('#idreg2').val());
          campos_input('NACIONALIDADE'+campo, $('#idreg2').val());
          campos_input('NATURALIDADE'+campo, $('#idreg2').val());
          campos_input('DATANASCIMENTO'+campo, $('#idreg2').val());
          campos_input('ESTADOCIVIL'+campo, $('#idreg2').val());
          campos_input('PROFISSAO'+campo, $('#idreg2').val());
          campos_input('ENDERECO'+campo, $('#idreg2').val());
          campos_input('BAIRRO'+campo, $('#idreg2').val());
          campos_input('CIDADE'+campo, $('#idreg2').val());
          campos_input_json('IDPESSOA'+campo, $('#idreg2').val());
             }
          else{
          	notify('primary',nome, '');
          	$('#'+campo).val(cod);
			campos_input(campo, $('#idreg2').val());
          }  

          " data-dismiss="modal"> USAR</button>
			 					</td>
			 				</tr>
			 			<?php endforeach ?>
			 		</tbody>
			 	</table>
			 </div>

			 <?php endif ?>