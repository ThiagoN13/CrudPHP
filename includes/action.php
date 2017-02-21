<?php
require_once('conexao.php');
require_once('functions.php');
header("Content-type: text/html; charset=utf-8");

$Act = $_GET['act'];


if(isset($Act)){
	switch($Act){
		case "cadastrarLivro":
			insert();
			break;
		case "atualizarLivro":
			update();
			break;
		case "deletaLivro":
			del();
			break;
		case "listaLivro":
			view();
			break;
		case "logar":
			login();
			break;
		case "deletarLivro":
			del();
			break;
		case "destroy":
			destroy();
			break;
		
	}
}

?>