<?php
$caminho = "/home/httpd/html/index.php" ;
//$arquivo = basename  ($caminho);        // $arquivo = "index.php"
$arquivo = basename ($caminho ,".php"); // $arquivo = "index"

echo "$arquivo";
?>