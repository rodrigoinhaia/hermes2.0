<?php
$hotname = 'localhost';
$username = 'root';
$senha = '';
$Banco = 'hermes2';

$db = mysql_connect($hotname, $username, $senha);
mysql_select_db($Banco, $db);
?>