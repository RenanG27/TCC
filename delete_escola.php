<?php
 session_start();
 include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Deletar</title>
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
		<li><a href="principal.php">Pagina principal</a></li>
		<li><a href = "sair.php">Sair do Sistema</a></li>
	</ul>
		<center><h1>Deletar escola</h1>
		<?php
			if(isset($_SESSION['msg']))
			{
				echo $_SESSION['msg'];
				unset ($_SESSION['msg']);
			}
		?>
		<?php
		if (isset($_GET['codigo']))
		{
		$codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);
		$sql = "SELECT * FROM escola WHERE codigo = '$codigo'";
		$comando = mysqli_query($conn, $sql);
		$row_escola = mysqli_fetch_assoc($comando);
		?>
		<form method="POST" action="pro_delete_escola.php">
		
		<input type="hidden" name="codigo" value="<?php echo 
		$row_escola['codigo'];?>">
		<input type="hidden" name="nome" value="<?php echo 
		$row_escola['nome'];?>">
		
		<p>Codigo: <?php echo $row_escola['codigo']; ?></p>
		<p>Nome: <?php echo $row_escola['nome']; ?></p>
		<h3> Essa operação é irreversivel - Deseja realmente excluir esta escola?</h3>
		<input type = "submit" value="Sim">
		<a href='index_escola.php?pagina=1'><input type= "button"
		value="Não"></a>
		</form>
	<?php
		}
			else
		{
			echo "<p>Requisição invalida! = Erro ao deletar</p>";
		}
	?>
	</body>
	</html>