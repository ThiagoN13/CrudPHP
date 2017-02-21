<!DOCTYPE html>
<html>
<head>
	<title>CRUD em PHP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
<?php  
	require_once('includes/functions.php');
	session();
?> 
</head>
<body>



<a href="includes/action.php?act=destroy">Logout</a>
	<h2>CRUD EM PHP</h2>

<ul>
  <li><a href="view.php?act=insert" title="Cadastrar um novo livro" class="btn">Cadastrar novo livro</a></li>
  <li><a href="view.php?act=view" title="Lista dos livros">Lista dos livros</a></li>
  <li><a href="view.php?act=delete" title="Deletar livro">Deletar livros</a></li>
  <li><a href="view.php?act=update" title="Atualizar dados">Atualizar livros</a></li>
</ul>




<footer>
	<p>By: Thiago Nogueira</p>
</footer>

</body>
</html>