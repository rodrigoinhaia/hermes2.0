<?php

$ficha = $_POST["ficha"];
$nProcesso = $_POST["nProcesso"];
$nIntegracao = $_POST["nIntegracao"];
$incidente = $_POST["incidente"];
$nomeParteInte = $_POST["nomeParteInte"];
$nomeParteContraria = $_POST["nomeParteContraria"];
$valor = $_POST["valor"];

//$nProcesso =	preg_replace('/\{([A-Z]+)\}/e','', $nProcessoCom);
	

// Pasta onde o arquivo vai ser salvo
$_UP['pasta'] = 'arquivos/';

// Tamanho máximo do arquivo (em Bytes)
$_UP['tamanho'] = 1390 * 1390 * 10; // 2Mb

// Array com as extensões permitidas
$_UP['extensoes'] = array('pdf');

// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
$_UP['renomeia'] = TRUE;

// Array com os tipos de erros de upload do PHP
$_UP['erros'][0] = 'Não houve erro';
$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
$_UP['erros'][4] = 'Não foi feito o upload do arquivo';

// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
if ($_FILES['arquivo']['error'] != 0) {
die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
exit; // Para a execução do script
}

// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar

// Faz a verificação da extensão do arquivo
$extensao = strtolower(end($extensao = explode('.', $_FILES['arquivo']['name'])));

if (array_search($extensao, $_UP['extensoes']) === false) {
echo "Por favor, envie arquivos com as seguintes extensões: PDF";
}

// Faz a verificação do tamanho do arquivo
else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) {
echo "O arquivo enviado é muito grande, envie arquivos de até 10Mb.";
}

// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
else {
// Primeiro verifica se deve trocar o nome do arquivo
if ($_UP['renomeia'] == true) {
// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
//$nome_final = time().'.pdf';
$nome_final = $nIntegracao.'.pdf';
} else {
// Mantém o nome original do arquivo
$nome_final = $_FILES['arquivo']['name'];
}

// Depois verifica se é possível mover o arquivo para a pasta escolhida
if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo

//Concatena local + nome do arquivo em uma variavel
$local_mais_arquivo =  $nome_final;

//#############################################################################
//############################### INSERSÃO ####################################
//#############################################################################

require("conectdb.php");

$data = date('Y-m-d');
$hora = strftime("%H:%M:%S");



//Faz a inserção dos dados
$sql_insert = "INSERT INTO pro_integrado (int_ficha, int_processo, int_integracao, int_parte_interessada, int_parte_contraria, int_valor, int_enviado, int_arquivo, int_data, int_hora)
VALUES ('$ficha','$nProcesso','$nIntegracao','$nomeParteInte','$nomeParteContraria','$valor','N','$local_mais_arquivo','$data','$hora')";

mysql_query($sql_insert) or die ("Não doi possivel inserir");

	?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript" charset="UTF-8">
			alert (' SUCESSO!\n\n Ficha Registrada com sucesso no Banco de Dados.\n Apos concluir os cadastros clique em "FINALIZAR".')
			window.location.href='http://10.0.0.37/hermes2.0/cad_lote.php';
		</SCRIPT>	
	<?php


} else {
// Não foi possível fazer o upload, provavelmente a pasta está incorreta
?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript" charset="UTF-8">
			alert (' ATENÇÃO!\n\n Ficha Não pode ser gravada no Banco de dados.\n Verifique os dados.')
			window.location.href='http://10.0.0.37/hermes2.0/consulta.php';
		</SCRIPT>	
<?php

}

}

?>
