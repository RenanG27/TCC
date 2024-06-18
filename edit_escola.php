<?php 
	session_start();
	include_once ("conexao.php");
	$codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT * FROM escola WHERE codigo = '$codigo'";
	$comando = mysqli_query($conn, $sql);
	$row_escola = mysqli_fetch_assoc($comando);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset = "utf-8">
		<title> CRUD - Editar</title>
	</head>
	<style>
	body{
            font-family: Arial, Helvetica, sans-serif;
             background-color: #87CEFA;

        }
	ul {
		list-style-type: none;
		margin: 0;
		padding: 0;
		overflow: hidden;
		background-color: #333;
	}

		li {
		float: left;
	}

		li a {
		display: block;
		color: white;
		text-align: center;
		padding: 14px 16px;
		text-decoration: none;
	}

		li a:hover {
		background-color: #111;
	}
	</style>
	<body>
		<ul>
		<li><a href="cad_escola.php">Cadastrar</a></li>
		<li><a href="index_escola.php">Listar escola</a></li>
		<li><a href = "sair.php">Sair do Sistema</a></li>
		<li><a href = "principal.php">Voltar Principal</a></li>
	</ul>
		<center><h1>Editar escola</h1>
<?php
		if(isset($_SESSION['msg']))
		{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}
?>
<form method="POST" action="proc_edit_escola.php">

<input type="hidden" name="codigo" value="<?php echo $row_escola['codigo']; ?>">
<label>Nome:</label>
<input type="text" name="nome" placeholder="Digite o nome da escola" value="<?php echo $row_escola['nome'];?>">
<label> UF: </label>
<input type="text" name="uf" placeholder="Digite o uf da escola" value="<?php echo $row_escola['uf'];?>">

<input type="submit" value="Editar">
</form>
</body>
</html>