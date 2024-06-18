<?php
 session_start();
 include_once("conexao.php");
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Deletar</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
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

	h1{
		margin-top:80px;
	}

	p{
		font-family: Arial Black;
		font-size:25px;
	}

	form{
		margin-top:70px;
		background-color:white;
		border-radius:50px 10px;
		border: solid 1px black;
		width: 700px;
		height:300px;
	}

	.botao{
	margin-top: 30px;
}
	
	</style>
	<body>
	<ul>
		<li><a href="principal.php">Pagina principal</a></li>
		<li><a href = "sair.php">Sair do Sistema</a></li>
	</ul>
		<center><h1>Deletar materia</h1>
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
		$sql = "SELECT * FROM materia WHERE codigo = '$codigo'";
		$comando = mysqli_query($conn, $sql);
		$row_materia = mysqli_fetch_assoc($comando);
		?>
		<form method="POST" action="pro_delete_materia.php">
		
		<input type="hidden" name="codigo" value="<?php echo 
		$row_materia['codigo'];?>">
		<input type="hidden" name="nome" value="<?php echo 
		$row_materia['nome'];?>">
		
		<p>Codigo: <?php echo $row_materia['codigo']; ?></p>
		<p>Nome: <?php echo $row_materia['nome']; ?></p>
		<h3> Essa operação é irreversivel - Deseja realmente excluir esta matéria?</h3>
		<div class="botao">
			<input type="submit" class="btn btn-outline-success" value="Sim">

			<a href='index_materia.php?pagina=1'>
			<input type= "button" class="btn btn-outline-danger" value="Não"></a>
		</div>

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