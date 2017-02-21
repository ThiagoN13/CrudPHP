<!DOCTYPE>
<html lang="pt-br">
<head>
<?php
 header("Content-type: text/html; charset=utf-8");
 require_once('includes/functions.php');
	session();
?>

	<title>Lista de dados</title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
   <link rel="stylesheet" type="text/css" href="css/style.css">

</head>
<body>
	<a href="includes/action.php?act=destroy">Logout</a>
	<h2>CRUD em PHP</h2>
	<div id="contents">

		<?php 

			
$Act = $_GET['act'];
	if($Act == 'update'){
?>
		<form action="includes/action.php?act=atualizaLivro" method="post">
			<label>Livros</label>
				<select name="book">
				  <?php
					exibeUpdate();
				  ?>
			   </select>
			   <input type="submit" name="enviar">
		</form>
	
	<?php
	}
?>




<?php
	if($Act == 'delete'){
?>
	  <form action='includes/action.php?act=deletaLivro' method='post'>
		<?php
			exibeDel();
		?>
	  
      <input type="submit" name="deletar" value="Delete">
      </form>


<?php
	}
?>



<?php
	if($Act == 'insert'){
?>
	
		<form action="includes/action.php?act=cadastrarLivro" method="post">
			<label>Nome do livro</label><input type="text" name="titulo" required="True"></input><br/>
			<label>Nome do autor</label><input type="text" name="autor" required="True"></input><br/>
			<label>Assunto</label><select name="assunto">
			<?php
				exibeInsert();
			?>
			</select>
			<br/><label>Data de lançamento</label><input type="date" name="data_lanc" required="True"></input><br/>
			<label>Quantidade de copias</label><input type="number" min="1" name="quant" required="True"></input><br/>

			<input type="submit" value="Enviar"></input>	
		</form>
<?php
	}
?>

<?php
	if($Act == 'view'){
		exibeList();
	}
?>
		</div>
		<a href="index.php" title="Voltar ao index">
			<img src="img/voltar.png" width="90px" height="40px"></img>
		</a>
	
<footer>
   <p>By: Thiago Nogueira</p>
</footer>

</body>
</html>