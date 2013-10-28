<?php
   require("conectdb.php"); 
   require("itens_prontos.php");
   
   
	$sql_delete = "DELETE FROM pro_integrado WHERE id_integrado = '$linhaexcluida'";

	mysql_query($sql_delete) or die ("Não doi possivel deletar o alinha");
	
	//header('Localização: itens_prontos.php');
   
   
?>
<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
			alert (' ATENÇÃO!\n\n Ficha Excluída com sucesso no Banco de Dados.')
			window.location.href='http://10.0.0.37/hermes2.0/itens_prontos.php';
</SCRIPT>