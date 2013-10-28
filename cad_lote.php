

<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link href="css/zice.style.css" rel="stylesheet" type="text/css" />
<link href="css/icon.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/tipsy.css" media="all" />
<title>Cadastro de dos arquivos</title>
</head>


    <body>
    	
    	<div class="box">
			
			<div id='cssmenu'>
				<ul>
				   <li class='active'><a href='home.html'><span>INICIAL</span></a></li>
				   <li><a href='cad_lote.php'><span>Novos Protocolos</span></a></li>
				   <li><a href='itens_prontos.php'><span>Exibir os prontos para envio </span></a></li>
				   <li><a href='itens_enviados.php'><span>Exibir os Enviados</span></a></li>
				   <li class='last'><a href='index.html'><span>Sair</span></a></li>
				</ul>
			</div>
			<div class="boxInterno">
				
			</div>
		</div>
			<div class="boxInterno">
    
    <div id="boxExterno"><!--Div Box externa -->
    	<div id="boxInterno"><!-- Div Box interna -->   
    		<form action="consulta.php" method="post">
    			<fieldset>
    				<legend>Protocolos Integrados</legend>
    				Arquivo "N" ou "M" <input type="text" name="arquivo" value="N" size="5">
    				Ficha <input type="text" name="ficha" value="" >
    				Incidente <input type="text" name="incidente" value="" size="5">
    					<input type="submit" value="Pesquisar"></br></br>
    				<label>Nº do Processo </label></br>
    					<input type="text" name="nProcesso" value="" size="85"></br>
    				<label>Nº de Integração</label></br>
    					<input type="text" name="nIntegracao" value="" size="85"></br>
    				<label>Parte Interessada</label></br>
    					<input type="text" name="nomeParteInte" value="" size="85"></br>
    				<label>Parte Contrária</label></br>
    				<input type="text" name="nomeParteContraria" value="" size="85"></br></br>
    				<label>Valor R$</label>
    					<input type="text" name="valor" value="" size="20"></br></br>
    				
    				<label>Anexa o Arquivo</label></br>
    					<input type="file" name="anexo"></br></br>
    					
    					
    					<input type="button" class="uibutton icon add" value="Próximo" size="50"/>
    					<a href="http://localhost/hermes2.0/itens_prontos.php" class="uibutton">Enviar emails</a>
    					
    					
    				
    			</fieldset>
    		
    		</form><!-- Fecha formulário -->
    	</div><!-- Div Box interna -->    
    </div><!--Div Box externa -->
    <?php

	?>
	<div id="versionBar">
  		<div class="copyright"> &copy; Copyright 2013  All Rights Reserved <span class="tip"><a href="#" title="HERMES 2.0">LPBK Advogados Associados</a> </span> </div>
  		<!-- // copyright-->
		</div>
    </body>
</html>