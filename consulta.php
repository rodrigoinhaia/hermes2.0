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
<link href="css/zice.style.css" rel="stylesheet" type="text/css" />
<link href="css/icon.css" rel="stylesheet" type="text/css" />
<link rel="stylesheet" type="text/css" href="css/tipsy.css" media="all" />
<script type="text/javascript" src="js/jquery-1.10.2.min.js"></script>
<script type="text/javascript" src="js/jquery.mask.min.js"></script>
<title>Cadastro de dos arquivos</title>
</head>

<script type="text/javascript">
$(document).ready(function(){
	$('#valor').mask('000.000.000.000.000,00', {reverse: true});
	$('#nProcesso').mask('0000000000000000000000000000000', {reverse: true});
	
       
});
</script>

<body>
	
	
	
<?php

$arquivo = $_POST['arquivo'];
$ficha = $_POST["ficha"];
$incidente = $_POST["incidente"];

include 'conectdbCPJ.php';


$consulta = "select p.arquivo, p.ficha, p.incidente, numero_processo, sigla_integracao, numero_integracao, pes.nome from cad_processo p
left join cad_envolvido e on p.arquivo = e.arquivo and p.ficha=e.ficha and p.incidente =
e.incidente
left join cad_pessoa pes on pes.codigo=e.pessoa
WHERE pes.cliente='1' and p.arquivo='$arquivo' and p.ficha='$ficha' and p.incidente='$incidente'";
$resultado = mysql_query($consulta)or die("Falha na Execução da consulta.");


$consulta2 = "select pes.nome from cad_processo p
left join cad_envolvido e on p.arquivo = e.arquivo and p.ficha=e.ficha and p.incidente =
e.incidente
left join cad_pessoa pes on pes.codigo=e.pessoa
WHERE pes.categoria='2' and p.arquivo='$arquivo' and p.ficha='$ficha' and p.incidente='$incidente' LIMIT 1";
$resultado2 = mysql_query($consulta2)or die("Falha na Execução da consulta.");

$linha = mysql_fetch_assoc($resultado);
				
		$var = $linha;
		$res_arquivo = $var['arquivo'];
		$res_ficha =  $var['ficha'];
		$res_incidente =  $var['incidente'];
		$res_nProcesso =  $var['numero_processo'];
		$res_siglaIntegracao =  $var['sigla_integracao'];
		$res_codCausa = $var['numero_integracao'];
		$res_parteInteressada = $var['nome'];
		
$linha2 = mysql_fetch_array($resultado2);
		$var2 = $linha2;
		$parteContraria = $var2['nome'];	
		
if($arquivo == $res_arquivo){
	?>
			
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
			<div id="boxExterno"><!--Div Box externa -->
				
    		 <div id="boxInterno"><!-- Div Box interna -->   
    			<form method="post" action="recebe_upload.php" enctype="multipart/form-data">
    			<fieldset>
    				<legend>Protocolos Integrados</legend>
    				<label>Ficha</label>
    					<input type="text" name="ficha" value="<?php echo $res_arquivo?><?php echo $res_ficha?>.<?php echo $res_incidente?>"></br>
    				<label>N&ordm; do Processo</label></br>
    					<input id="nProcesso" type="text" name="nProcesso" value="<?php echo $res_nProcesso?>" size="80"></br>
    				<label>N&ordm; de Integre&ccedil;&atilde;o</label></br>
    					<input type="text" name="nIntegracao" value="<?php echo $res_siglaIntegracao?><?php echo $res_codCausa?>" size="80"></br>
    				<label>Parte Interessada</label></br>
    					<input type="text" name="nomeParteInte" value="<?php echo $res_parteInteressada?>" size="80"></br>
    					
    					<label>Parte Contr&aacute;ria</label></br>
    				<input type="text" name="nomeParteContraria" value="<?php echo $parteContraria?>" size="80"></br>
    				<label class="obs-label">OBS: Caso n&atilde;o tenha a parte contr&aacute;ria verifique o CPJ.</label></br></br>
    				
    				</br><label>Valor R$</label>
    					<input id="valor" type="text" name="valor" value="<?php $valor?>" size="20"></br></br>
				
    			
							
							<label>Arquivo</label>
							<input type="file" name="arquivo"/>
							
							</br></br>
    					
    					<input type="submit" class="uibutton icon add" value="Proximo">
    					
    					
    					
    				
    			</fieldset>
    		
    		</form><!-- Fecha formulário -->
    		
    		
    	</div><!-- Div Box interna -->    
    </div><!--Div Box externa -->
    					
	<?php 
	
}else {
	?>
		<SCRIPT LANGUAGE="JavaScript" TYPE="text/javascript">
alert (' Aten&ccedil;&atilde;o!\n\n Verifique o campo Arquivo: \n Se a ficha est&aacute; ativa deve ser marcado como (N) \n Se aficha estiver no morto deve ser marcado como (M).')
window.location.href='http://10.0.0.37/hermes2.0/cad_lote.php';
</SCRIPT>	
	<?php
}


?>
		<div id="versionBar">
  		<div class="copyright"> &copy; Copyright 2013  All Rights Reserved <span class="tip"><a href="#" title="HERMES 2.0">LPBK Advogados Associados</a> </span> </div>
  		<!-- // copyright-->
		</div>
    </body>
</html>