int_ficha, int_processo, int_integracao, int_parte_interessada, int_parte_contraria, int_valor, int_enviado, int_arquivo, int_data, int_hora

while ($retornaDados = mysql_fetch_array($linha)){
						
					$var = $linha;
					//$res_int_ficha = $var['int_ficha'];
					//$res_int_processo =  $var['int_processo'];
					//$res_int_integracao =  $var['int_integracao'];
					//$res_int_parte_interessada =  $var['int_parte_interessada'];
					//$res_int_parte_contraria =  $var['int_parte_contraria'];
					//$res_int_enviado = $var['int_enviado'];
					//$res_int_arquivo = $var['int_arquivo'];
					//$res_int_data = $var['int_data'];
					//$res_int_hora = $var['int_hora'];
					
						echo '<tr>';
						printf('<td>%s</td>',$var['int_ficha']);
						printf('<td>%s</td>',$var['int_processo']);
						printf('<td>%s</td>',$var['int_integracao']);
						printf('<td>%s</td>',$var['int_parte_interessada']);
						printf('<td>%s</td>',$var['int_parte_contraria']);
						printf('<td>%s</td>',$var['int_enviado']);
						printf('<td>%s</td>',$var['int_arquivo']);
						printf('<td>%s</td>',$var['int_data']);
						printf('<td>%s</td>',$var['int_hora']);
						echo '</tr>';
						
				}
				



					$res_int_ficha = $var['int_ficha'];
					$res_int_processo =  $var['int_processo'];
					$res_int_integracao =  $var['int_integracao'];
					$res_int_parte_interessada =  $var['int_parte_interessada'];
					$res_int_parte_contraria =  $var['int_parte_contraria'];
					$res_int_enviado = $var['int_enviado'];
					$res_int_arquivo = $var['int_arquivo'];
					$res_int_data = $var['int_data'];
					$res_int_hora = $var['int_hora'];
					