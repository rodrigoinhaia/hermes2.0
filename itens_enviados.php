<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN">
<html>
<head>
<meta http-equiv="Content-Type" content="text/html" charset="ISO-8859-1">
<link href="css/estilo.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/styles.css" />
<link href="css/jquery.dataTables.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="css/table_jui.css" />



<link rel="stylesheet" href="css/jquery-ui-1.8.4.custom.css" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
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


<!--Inicia a montagem da tabela-->
<body>
	<div id="Geral">
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
			
		</div>
<div class="datatablecustom">
	<div id="tabela">
			<table cellpadding="0"cellspacing="0" border="0" class="display" id="lista_dados">
				<thead><!--Inicia a montagem do cabeçalho-->
					<tr>
						<th>ID</th><th>Ficha</th><th>N&deg; do Processo</th><th>N&deg; de Integra&ccedil;&atilde;o</th><th>Parte Interessada</th><th>Parte Contr&aacute;ria</th><th>Valor R$</th><th>Arquivo</th><th>Enviado</th><th>Data</th>
			</thead><!--Fecha a montagem do cabeçalho-->
				<tbody id="tbodyExibeCad"> <!--Abre o Tbody-->
					<?php
					//exemplo de data (seria o valor do campo data que vem do banco)
								//aqui utilizo a função date do php para pegar a data atual e simular um valor data
								$res_int_data = date('Y-m-d');
								 
								//função que formata a data
								function formata_data($res_int_data)
								{
								 //recebe o parâmetro e armazena em um array separado por -
								 $res_int_data = explode('-', $res_int_data);
								 //armazena na variavel data os valores do vetor data e concatena /
								 $res_int_data = $res_int_data[2].'/'.$res_int_data[1].'/'.$res_int_data[0];
								  
								 //retorna a string da ordem correta, formatada
								 return $res_int_data;
								}
					
					require("conectdb.php");
					
					
					$retornaDados = "SELECT * FROM pro_integrado WHERE int_enviado='S'";
					$resultado = mysql_query($retornaDados);
					
					while($linha = mysql_fetch_array($resultado))
					{
						$var = $linha;
						$res_int_id = $var['id_integrado'];
						$res_int_ficha = $var['int_ficha'];
						$res_int_processo =  $var['int_processo'];
						$res_int_integracao =  $var['int_integracao'];
						$res_int_parte_interessada =  $var['int_parte_interessada'];
						$res_int_parte_contraria =  $var['int_parte_contraria'];
						$res_int_valor = $var['int_valor'];
						$res_int_arquivo = $var['int_arquivo'];
						$res_int_enviado = $var['int_enviado'];
						$res_int_data = $var['int_data'];

					
					echo '<tr>';
						printf('<td>%s</td>',$res_int_id);
						printf('<td>%s</td>',$res_int_ficha);
						printf('<td>%s</td>',$res_int_processo);
						printf('<td>%s</td>',$res_int_integracao);
						printf('<td>%s</td>',$res_int_parte_interessada);
						printf('<td>%s</td>',$res_int_parte_contraria);
						printf('<td>%s</td>',$res_int_valor);
						printf('<td>%s</td>','<a href="http://10.0.0.37/hermes2.0/arquivos/'.$res_int_arquivo.'">'.$res_int_arquivo.'</a>');
						printf('<td>%s</td>',$res_int_enviado);
						printf('<td>%s</td>',formata_data($res_int_data));
												
						
						//printf('<td>%s</td>',$var['int_data']);
						//printf('<td>%s</td>',$var['int_hora']);
						echo '</tr>';


					}
					
					
					
						
					?>
					</tbody><!--Inicia o Tbody-->
				</table><!--Fecha a montagem da tabela-->	
			</div>	
		</div><!--Fecha a div da tabela-->		
		<div id="versionBar">
  		<div class="copyright"> &copy; Copyright 2013  All Rights Reserved <span class="tip"><a href="#" title="HERMES 2.0">LPBK Advogados Associados</a> </span> </div>
  		<!-- // copyright-->
		</div>
		</div>
 </body>
</html>