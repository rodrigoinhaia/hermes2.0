<?php
$hotname = 'localhost';
$username = 'root';
$senha = '';
$Banco = 'cpjwcs';

$db = mysql_connect($hotname, $username, $senha)or die("Não foi possível conectar");
mysql_select_db($Banco, $db)or die("Não foi possível selecionar o banco de dados");

?>