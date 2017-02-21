<?php
@include('function.php');

header("Content-type: text/html; charset=utf-8");

$link = mysql_connect('localhost', 'root', '');
mysql_set_charset('UTF8', $link);

if (!$link) {
	die("Não foi possivel conectar: " . mysql_error());
} 


$conectar = mysql_select_db("biblioteca",$link);
if (!$conectar) {
	die("Não foi possivel conectar ao banco: " . mysql_error());
} 




?>