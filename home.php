<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html" charset="utf-8" />
		<link href="css/estilo.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/styles.css" />
		<link href="css/zice.style.css" rel="stylesheet" type="text/css" />
		<link href="css/icon.css" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="css/tipsy.css" media="all" />
		<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
		<script src='http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
		
		<title>.::HERMES 2.0::.</title>
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
		<div id="versionBar">
  		<div class="copyright"> &copy; Copyright 2013  All Rights Reserved <span class="tip"><a href="#" title="HERMES 2.0">LPBK Advogados Associados</a> </span> </div>
  		<!-- // copyright-->
		</div>
	</body>
</html>