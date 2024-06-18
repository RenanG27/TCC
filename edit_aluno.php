<?php 
	session_start();
	include_once ("conexao.php");
	$codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT * FROM alunos WHERE codigo = '$codigo'";
	$comando = mysqli_query($conn, $sql);
	$row_alunos = mysqli_fetch_assoc($comando);
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
		<li><a href="cad_alunos.php">Cadastrar</a></li>
		<li><a href="index2alunos.php">Listar Alunos</a></li>
		<li><a href = "sair.php">Sair do Sistema</a></li>
		<li><a href = "principal.php">Voltar Principal</a></li>
	</ul>
		<center><h1>Editar Alunos</h1>
<?php
		if(isset($_SESSION['msg']))
		{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		}
?>
<form method="POST" action="proc_edit_aluno.php">

<input type="hidden" name="codigo" value="<?php echo $row_alunos['codigo']; ?>">
<label>Nome:</label>
<input type="text" name="nome" placeholder="Digite o seu nome completo" value="<?php echo $row_alunos['nome']; ?>">
<label>Cpf:</label>
<input type="number" name="cpf" placeholder="Digite o seu cpf" value="<?php echo $row_alunos['cpf']; ?>">
<label>RG:</label>
<input type="number" name="rg" placeholder="Digite o seu rg" value="<?php echo $row_alunos['rg']; ?>">

<input type="submit" value="Editar">
</form>
</body>
</html>