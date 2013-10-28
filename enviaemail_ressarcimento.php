<?php
include("seguranca.php"); // Inclui o arquivo com o sistema de segurança
protegePagina(); // Chama a função que protege a página
?>
<html>
    <head>
        <meta charset="utf-8" />
		<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />
		<title>.::HERMES 2.0 - LPBK Adv. Assoc.::.</title>
        <!--[if lt IE 9]>
          <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
<link href="css/zice.style.css" rel="stylesheet" type="text/css" />
<link href="css/icon.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/tipsy.css" media="all" />
<body>

<?php
// Inclui o arquivo class.phpmailer.php localizado na pasta phpmailer
			include "conectdb.php";
			include "phpmailer/class.phpmailer.php";

			
			
			//if(isset($_POST['submit']))
					//{//Inicia o POST Submit
					
					
					$retornaDados = "SELECT * FROM pro_integrado WHERE int_enviado='N'";
					$resultado = mysql_query($retornaDados);
			
					
					$contar='0';
					//while para fazer o loop do envio e econtagem de e-mails
					while($linha = mysql_fetch_array($resultado))
					{//Inicia o while que traz os resultados do Banco de dados
					
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
			
					$var = $linha;
					$res_int_id = $var['id_integrado'];
					$res_int_ficha = $var['int_ficha'];
					$res_int_processo =  $var['int_processo'];
					$res_int_integracao =  $var['int_integracao'];
					$res_int_parte_interessada =  $var['int_parte_interessada'];
					$res_int_parte_contraria =  $var['int_parte_contraria'];
					$res_inte_valor = $var['int_valor'];
					$res_int_enviado = $var['int_enviado'];
					$res_int_arquivo = $var['int_arquivo'];
					$res_int_data = $var['int_data'];
					$res_int_hora = $var['int_hora'];
					
	//Faz o incremento de contagem
					$contar++;		 
					//$caminhodoarquivo = "arquivos/".$res_int_arquivo;
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	// Inicia a classe PHPMailer
					$mail = new PHPMailer();
	// Define os dados do servidor e tipo de conex�o
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
					$mail->IsSMTP(); // Define que a mensagem ser� SMTP
					$mail->SMTPSecure = 'ssl'; //Define o tipo de segurança.
					$mail->SMTPAuth = true; // Usa autentica��o SMTP? (opcional)
					$mail->Port = 465; //Define a porta
					$mail->Host = 'mail.lpbk.adv.br'; // Endere�o do servidor SMTP
					$mail->Username = 'custasbb'; // Usu�rio do servidor SMTP
					$mail->Password = '!s24554'; // Senha do servidor SMTP
	
	// Define o remetente
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
					$mail->From = "custasbb@lpbk.adv.br"; // Seu e-mail
					$mail->FromName = "Ulisses Arpini - LPBK Adv. Assoc."; // Seu nome
					
	// Define os destinat�rio(s)
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
									
	//CONTAS DE EMAIL FUNCIONAIS DE PRODUÇÃO
					//$mail->AddAddress('cso.ctba.judicial@bb.com.br', 'cso.ctba.judicial@bb.com.br');
				    //$mail->AddCC('ulisses.arpini@lpbk.adv.br', 'Ulisses Arpini'); // Cópia															
									
	//CONTAS DE EMAIL PARA TESTES
					//$mail->AddAddress("mairo.luz@lpbk.adv.br", "Mairo Luz");
					$mail->AddCC('rodrigo.ped@gmail.com', 'Suporte'); // Copia 
					//$mail->AddCC('hermes@lpbk.adv.br', 'Suporte Hermes'); // Copia 
					// hermes@lpbk.adv.br, senha: !r50456		
					
					ini_set('max_execution_time','2000000');
	// Aumenta o tempo de execu��o do servidor "2000 segundos"
					ini_set("memory_limit","100M");
	//Aumenta a capacidade do servidor para enviar arquivo
	//grande "50M" ou "100M".
									
	// Define os dados t�cnicos da Mensagem
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
					$mail->IsHTML(true); // Define que o e-mail ser� enviado como HTML
					//$mail->CharSet = 'UTF-8'; // Charset da mensagem (opcional)	
				
//#########################################--ASSUNTO--##########################################################	
					
					$assuntoIntegrado = "RESSARCIMENTO DE CUSTAS - " . $res_int_integracao . " - " . $res_int_parte_interessada . " - " . "R$" . $res_inte_valor;
					$mail->Subject  = $assuntoIntegrado;				
							 
//######################################--DEFINE TEXTO / ASSUNTO--##############################################									
	// Define a mensagem (Texto e Assunto)
							
	                $mail->Body = "<p>Prezados Srs.:<br><br><br>
					Solicitamos o ressarcimento da custa em anexo.<br>
					".  $assuntoIntegrado .".<br><br>
					
					PROCESSO: ".  $res_int_processo .".<br><br>
					
					Depend&ecirc;ncia Respons	&aacute;vel: ". $res_int_parte_interessada ."<br><br>
					
					Att,<br /><br />
					<b>Ulisses Arpini</b><br />
					<a href=mailto:ulisses.arpini@lpbk.adv.br>ulisses.arpini@lpbk.adv.br</a><br />
					LPBK Advogados Associados -&nbsp;PORTO ALEGRE/RS<br />
					Fone/Fax:&nbsp;(51) 3397.1169<br />
					<br />
					<b>LESSA, PILLA, BRUSAMOLIN, KAVINSKI</b> & Advogados Associados<br>
					Matriz - Porto Alegre - RS - Av. Prot&aacute;sio Alves, 2561, Cj. 503 - CEP: 90410-002 - (51) 33971169<br>
					Filiais: Curitiba - PR, Florian&oacute;polis - SC, Goi&acirc;nia - GO, Rio de Janeiro - RJ e S&atilde;o Paulo - SP.<br />";
									
	
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=
	// Define os anexos (opcional)
					$mail->AddAttachment( "C:/xampp/htdocs/Hermes2.0/arquivos/".$res_int_arquivo);  // Insere um anexo
	// Envia o e-mail
					$enviado = $mail->Send();
				
					$update_enviado = "UPDATE pro_integrado SET int_enviado='S' WHERE id_integrado='$res_int_id'";
					mysql_query($update_enviado) or die ("Não doi possivel inserir");
					
						}//Fecha o while que traz os resultados do Banco de dados	
				
					?> <div class="resultadodoenvio"><?php
// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=// =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=				
	// Exibe uma mensagem de resultado
					if ($enviado) {
					
					
					echo "ATENÇÃO!</br><b>" . $contar . "</b> - E-mails enviados com sucesso.\n Verifique os emails em itens enviados.</br>";
						?>
						
					<?php	
					
	
											
						}// Fecha o exibe uma mensagem de resultado
		//Caso não seja enviado o email retorna mensagem de erro										
						else{
									
						echo "Não foi possível enviar o e-mail.<br /><br />";
						echo "<b>Informações do erro:</b> <br />" . $mail->ErrorInfo;
						}//Fecha o else da mensagem de erro
			
?>
</br><a href="itens_enviados.php"><input type="button" class="botaoitensenviados" alt="Itens enviados" value="Vá para itens enviados" /></a>

</div>
<!-- Link JScript-->
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery-jrumble.js"></script>
<script type="text/javascript" src="js/jquery.ui.min.js"></script>     
<script type="text/javascript" src="js/jquery.tipsy.js"></script>
<script type="text/javascript" src="js/iphone.check.js"></script>
<script type="text/javascript" src="js/login.js"></script>
</body>
</html>