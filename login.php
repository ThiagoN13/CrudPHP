<!DOCTYPE html>
<html>
<head>
	<title>CRUD em PHP</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>

<h2>CONTROLE DE ACESSO</h2>
<div id="contents">

	<form action="includes/action.php?act=logar" method="post">
		<label>Login</label><input type="text" name="login" required="True"></input><br/>
		<label>Senha</label><input type="password" name="senha" required="True"></input><br/>
		<input type="submit" name="enviar" value="Logar">
	</form>

</div>

<footer>
	<p>By: Thiago Nogueira</p>
</footer>

</body>
</html>