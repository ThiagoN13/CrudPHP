<?php
require_once('conexao.php');
require_once('functions.php');
header("Content-type: text/html; charset=utf-8");

if(isset( $_GET['act'])){
	$Act =  $_GET['act'];
	if($Act == 'listupdate'){
		$livro = $_POST['book'];
		exibeUpdate2($livro);
	}
}


if(isset($_GET['id'])){
	$id = $_GET['id'];
	if($id){
		$livro = $_POST['titulo'];
		$autor = $_POST['autor'];
		$data = $_POST['data_lanc'];
		$copias = $_POST['quant'];
		update($id, $livro, $autor, $data, $copias);
	}
}


if(isset($Act)){
	switch($Act){

		case "cadastrarLivro":
			insert();
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