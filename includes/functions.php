<?php
require_once('conexao.php');



function validar($dados) {
		$dados = strip_tags($dados);
		$dados = trim($dados);
		$dados = preg_replace("@(--|/|\*|;)@s", "", $dados);
		$dados = get_magic_quotes_gpc() == 0 ? addslashes($dados) : $dados;

	return $dados;
}


function insert(){
	$titulo = validar($_POST["titulo"]);
	$autor = validar($_POST["autor"]);
	$data_lanc = validar($_POST["data_lanc"]);
	$quant_copy = validar($_POST["quant"]);
	$assunto = $_POST["assunto"];
	

	if (!empty($titulo) && !empty($autor) && !empty($data_lanc) && !empty($quant_copy)) {
		$result = mysql_query("INSERT INTO livro(liv_titulo, liv_autor, liv_data_lancamento, liv_quant_copias, ass_id) VALUES ('$titulo','$autor',$data_lanc,$quant_copy,$assunto);");
			echo "Livro registrado com sucesso";
			
	} else {
		echo "Falha na inserção";
	} 

	header("Location: ../index.php");
}


function del(){
	$livros = $_POST["books"];
	$valores = ""; 
	foreach($livros as $key){ 
	   $sql = mysql_query("DELETE FROM livro WHERE liv_id = $key"); 
	} 
	header("Location: ../index.php");
}



function login(){
	$login = validar($_POST['login']);
	$senha = validar($_POST['senha']);

	session_start(); 

	if (!empty($login) && !empty($senha) ) {
		$result = mysql_query("SELECT * FROM usuario WHERE user_login = '$login' AND user_senha = '$senha'");
		if(mysql_num_rows ($result) > 0 ){
			$_SESSION['login'] = $login;
			$_SESSION['senha'] = $senha;
			$_SESSION['permissao'] = 1;
			header("Location: ../index.php");
		} else {
				unset ($_SESSION['login']);
				unset ($_SESSION['senha']);
				unset ($_SESSION['permissao']);
				header("Location: ../login.php");
				}
			}
}


function session(){
	  session_start(); 
      if((!isset ($_SESSION['login']) == true) or (!isset ($_SESSION['senha']) == true)) { 
         unset($_SESSION['login']); 
         unset($_SESSION['senha']); 
         header('location: ../login.php'); 
      } 

      $logado = $_SESSION['login']; 
      echo "<p>Bem vindo usuario: $logado</p>";
}


function exibeDel(){
	$sql = mysql_query("SELECT * FROM livro INNER JOIN assunto ON livro.ass_id=assunto.ass_id;");

      while($exibe = mysql_fetch_assoc($sql)){

         echo "<input type='checkbox' name='books[]' value='".$exibe['liv_id']."'>";
         echo "<table>"; 
         echo "<tr><td>Nome:</td>";
         echo "<td>".$exibe['liv_titulo']."</td></tr>";
         echo "<tr><td>Autor:</td>";
         echo "<td>".$exibe['liv_autor']."</td></tr>";
         echo "<tr><td>Data de lançamento:</td>";
         echo "<td>".$exibe['liv_data_lancamento']."</td></tr>";
         echo "<tr><td>Quantidade de copias:</td>";
         echo "<td>".$exibe['liv_quant_copias']."</td></tr>";
         echo "<tr><td>Assunto</td>";
         echo "<td>".$exibe['ass_nome']."</td></tr>";
         echo "==========================================";
         echo "</table>";
         echo "</input>";
      }
}

function exibeList(){
	$sql = mysql_query("SELECT * FROM livro INNER JOIN assunto ON livro.ass_id=assunto.ass_id;");

      while($exibe = mysql_fetch_assoc($sql)){

         echo "<table>"; 
         echo "<tr><td>Nome:</td>";
         echo "<td>".$exibe['liv_titulo']."</td></tr>";
         echo "<tr><td>Autor:</td>";
         echo "<td>".$exibe['liv_autor']."</td></tr>";
         echo "<tr><td>Data de lançamento:</td>";
         echo "<td>".$exibe['liv_data_lancamento']."</td></tr>";
         echo "<tr><td>Quantidade de copias:</td>";
         echo "<td>".$exibe['liv_quant_copias']."</td></tr>";
         echo "<tr><td>Assunto</td>";
         echo "<td>".$exibe['ass_nome']."</td></tr>";
         echo "==========================================";
         echo "</table>";
      }
}



function exibeUpdate(){
		$sql = mysql_query("Select * From livro");
		while($exibe = mysql_fetch_assoc($sql)){
			echo "<option name='livro' value='".$exibe['liv_id']."'>".$exibe['liv_titulo']." </option>";
		}
}



function view(){
	$sql = mysql_query("SELECT * FROM livro INNER JOIN assunto ON livro.ass_id=assunto.ass_id;");

	while($exibe = mysql_fetch_assoc($sql)){
   
		echo "<table>"; 
		echo "<tr><td>Nome:</td>";
		echo "<td>".$exibe['liv_titulo']."</td></tr>";
		echo "<tr><td>Autor:</td>";
		echo "<td>".$exibe['liv_autor']."</td></tr>";
		echo "<tr><td>Data de lançamento:</td>";
		echo "<td>".$exibe['liv_data_lancamento']."</td></tr>";
		echo "<tr><td>Quantidade de copias:</td>";
		echo "<td>".$exibe['liv_quant_copias']."</td></tr>";
		echo "<tr><td>Assunto</td>";
		echo "<td>".$exibe['ass_nome']."</td></tr>";
		echo "==========================================";
		echo "</table>";
	}
}

function destroy(){
	session_start();
	session_unset();
	session_destroy();
    header('location: ../login.php'); 
}


function exibeInsert(){
	$sql = mysql_query("Select * From assunto");
			while($exibe = mysql_fetch_assoc($sql)){	
				echo "<option name='assunto' value=".$exibe['ass_id'].">".$exibe['ass_nome']."</option>";
			}
}

function exibeUpdate2($livro){
	$sql = mysql_query("SELECT * FROM livro where liv_id = $livro");
	while($row = mysql_fetch_assoc($sql)){
		echo "<form action='action.php?id=$livro' method='post'>
			<label>Nome do livro</label><input type='text' name='titulo' required='True' value=". $row['liv_titulo'] ."></input><br/>
			<label>Nome do autor</label><input type='text' name='autor' required='True' value=". $row['liv_autor'] ."></input><br/>
			<label>Data de lançamento</label><input type='date' name='data_lanc' required='True' value=". $row['liv_data_lancamento'] ."></input><br/>
			<label>Quantidade de copias</label><input type='number' min='1' name='quant' required='True' value=". $row['liv_quant_copias'] ."></input><br/>

			<input type='submit' value='Enviar'></input>	
		</form>";
	}	
}

function update($id, $livro, $autor, $data, $copias){
	$sql = mysql_query("UPDATE livro SET liv_titulo=$livro, liv_autor=$autor, liv_data_lancamento=$data, liv_quant_copias=$copias WHERE liv_id=$id");
	header('location: ../view.php?act=view'); 
}

?>