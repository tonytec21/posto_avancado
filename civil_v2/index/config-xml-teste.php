
<style type="text/css">
	.red{
		background: black;
		color:red;
	}
</style>

<?php
session_start();

if (empty($_FILES['arquivo_xml']['name'])) {
$_SESSION['erro'] = "PREENCHA CORRETAMENTE OS CAMPOS E FAÇA O UPLOAD DO ARQUIVO XML";	
header('Location: ' . $_SERVER['HTTP_REFERER']);
}


$extensao = strtolower(substr($_FILES['arquivo_xml']['name'], -4));
	$tipo = strtolower($_FILES['arquivo_xml']['type']);
	$nome = strtolower(($_FILES['arquivo_xml']['name']));
	$novo_nome = $nome;
	$diretorio = "../arquivos/";
move_uploaded_file($_FILES['arquivo_xml']['tmp_name'], $diretorio.$novo_nome);
$arq_xml = $diretorio.$novo_nome;


/**
 * Ao tentar validar um arquivo XML, se algum erro
 * for encontrado a libxml irá gerar Warnings, o que
 * não creio que seja o mais interessante para nós.
 * Para evitar que isso aconteça, você pode determinar
 * que irá obter os erros por sua própria conta. Lembre-se
 * que esta função abaixo deve ser chamada antes de
 * instanciar qualquer objeto da classe DomDocument!
 */
libxml_use_internal_errors(true);

/* Cria um novo objeto da classe DomDocument */
$objDom = new DomDocument();

/* Carrega o arquivo XML */
$objDom->load($arq_xml);

/* Tenta validar os dados utilizando o arquivo XSD */
if (!$objDom->schemaValidate("validadorcrc.xsd")) {

    /**
     * Se não foi possível validar, você pode capturar
     * todos os erros em um array
     */
    $arrayAllErrors = libxml_get_errors();
   
    /**
     * Cada elemento do array $arrayAllErrors
     * será um objeto do tipo LibXmlError
     */
    print_r('<pre>');
    print_r($arrayAllErrors);
    print_r('</pre>');
   
} else {

    /* XML validado! */
    echo "XML obedece às regras definidas no arquivo XSD!";
   
}




 ?>