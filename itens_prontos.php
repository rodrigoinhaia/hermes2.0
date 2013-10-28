<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-1">
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link href="css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link rel="stylesheet" href="css/table_jui.css" />
<link rel="stylesheet" href="css/jquery-ui-1.8.4.custom.css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<title>Cadastro de dos arquivos</title>



</head>


<!--Abre Script que monta o datatable-->
			<script type="text/javascript">
				$(document).ready(function() {
					oTable = $('#lista_dados').dataTable({
								"bPaginate": true,
								"bJQueryUI": true,
								"sPaginationType": "full_numbers",
								

								});
							});
			</script><!--Fecha Script que monta o datatable-->

 <script type="text/javascript">

$().ready(function () {

$('#Button1').show();

$('[id$=Button1]').click(function () {

$('#MsgAguarde').show();

$('#geral').hide();
});

});

</script>
<!--Inicia a montagem da tabela-->
<body>

<div class="imgpos">
<span id="MsgAguarde" style="display:none; font-size:18px;">

<img src="imagens/ajax-loader.gif" alt="Aguarde.." align="center" /><br />

Enviando emails...

</span>
</div>	
<div id="geral">
	
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
		
		<div align="center" id="botao" >
			<form method="post" action="enviaemail_ressarcimento.php">
				<input name="Button1" id="Button1" type="submit" src="enviaemail_ressarcimento.php" value="Enviar Emails Agora"/>
			</form>
		</div>
	
	
			
	<div class="datatablecustom">
			<table cellpadding="0"cellspacing="0" border="0" class="display" id="lista_dados">
				<thead><!--Inicia a montagem do cabeçalho-->
					<tr>
						<th>ID</th><th>Ficha</th><th>N&deg; do Processo</th><th>N&deg; de Integra&ccedil;&atilde;o</th><th>Parte Interessada</th><th>Parte Contr&aacute;ria</th><th>Valor R$</th><th>Arquivo</th><th>Enviado</th><th>Excluir</th>
					</tr>
			</thead><!--Fecha a montagem do cabeçalho-->
				<tbody id="tbodyExibeCad" > <!--Abre o Tbody-->
					<?php
					
					require("conectdb.php");
					
					
					$retornaDados = "SELECT * FROM pro_integrado WHERE int_enviado='N'";
					$resultado = mysql_query($retornaDados);
					
					$xcluirLinha = "DELETE from pro_integrado where id_integrado = '$'";
					$exluir;
					
					
					while($linha = mysql_fetch_array($resultado))
					{
					
					$var = $linha;
					
					$linhaexcluida = $var['id_integrado'];
					$ficha = $var['int_ficha'];
					
					
					echo '<tr>';
						printf('<td>%s</td>',$linhaexcluida);
						printf('<td>%s</td>',$ficha);
						printf('<td>%s</td>',$var['int_processo']);
						printf('<td>%s</td>',$var['int_integracao']);
						printf('<td>%s</td>',$var['int_parte_interessada']);
						printf('<td>%s</td>',$var['int_parte_contraria']);
						printf('<td>%s</td>',$var['int_valor']);
						printf('<td>%s</td>','<a href="http://10.0.0.37/hermes2.0/'.$var['int_arquivo'].'">'.$var['int_arquivo'].'</a>');
						printf('<td>%s</td>',$var['int_enviado']);
						printf('<td>%s</td>', '<a href="http://10.0.0.37/hermes2.0/excluirlinha.php"><img src="imagens/DeleteRed.png" />.</a>');
						
						//printf('<td>%s</td>',$var['int_data']);
						//printf('<td>%s</td>',$var['int_hora']);
						echo '</tr>';


					}//Fecha o while de resultado

						
					?>
				</tbody><!--Inicia o Tbody-->
			</table><!--Fecha a montagem da tabela-->	
		</div><!--Fecha a div da tabela-->
			
		<div id="versionBar">
  		<div class="copyright"> &copy; Copyright 2013  All Rights Reserved <span class="tip"><a href="#" title="HERMES 2.0">LPBK Advogados Associados</a> </span> </div>
  		<!-- // copyright-->
		</div>
		</div>	
 </body>
</html>