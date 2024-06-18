  <?php
session_start(); 
include_once ("conexao.php");

?>
<!DOCTYPE html>
<html lang="pt-br"> 
	<head>
	<meta charset="utf-8"> 
	<title> CRUD - Utilizando PHP e MySql</title>
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

	
	img{
		width: 25px;
	height: 25px;
	}

	</style>
<body>
	<ul>
		
		<li><a href = "sair.php">Sair do Sistema</a></li>
		<li><a href = "principal.php">Voltar Principal</a></li>
	</ul>
    <center> <h1> Usuarios Cadastrados</h1> 
	<?php
	if (isset($_SESSION['msg'])) 
	{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		
	}
	
	$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
	$pagina = (!empty($pagina_atual)) ?$pagina_atual : 1;
	

	$qnt_result_pg = 4;
	
	
	$inicio = ($qnt_result_pg *$pagina) - $qnt_result_pg;
	
	$sql = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg";
	$comando = mysqli_query($conn, $sql);

	?>

	<div class="m-5">
		<table class="table table-hover table-bg	">
			<thead>
				<tr>
				<th scope="col">#</th>
				<th scope="col">Nome</th>
				<th scope="col">email</th>
				<th scope="col"></th>
				</tr>
			</thead>
			<tbody>
				<?php

					while($row_usuarios = mysqli_fetch_assoc($comando) )
		
					{
						echo "<tr>";
						echo "<td>" . $row_usuarios['id'] . "</td>";
						echo "<td>" . $row_usuarios['nome'] . "</td>";
						echo "<td>" . $row_usuarios['email'] . "</td>";
						echo "<td><a href='edit_usuario.php?id=" . $row_usuarios['id'] . "'><img src='image/edit.png'></a>
						 <a href='delete_usuario.php?id=" . $row_usuarios['id'] . "'><img src='image/delete.png'> </a> </td>";
						echo "</tr>";
					}
				?>
			</tbody>
		</table>
	</div>
	
	
		<?php
	
	
	$sql = "SELECT COUNT(id) AS num_result FROM usuarios";
	$resultado_pg = mysqli_query ($conn, $sql);
	$row_pg = mysqli_fetch_assoc($resultado_pg);
	
	$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
	
	
	$max_links = 2;
	echo "<a href='index2.php?pagina=1'>Primeira</a> ";
	
	for ($pag_ant = $pagina = $max_links; $pag_ant <= $pagina = 1; $pag_ant++)
	{
		if ($pag_ant>=1)
		{
			echo "<a href ='index2.php?pagina=$pag_ant'>$pag_ant</a>";
		}
			
	}
	
	echo "$pagina ";
	
	for($pag_dep = $pagina + 1; $pag_dep <= $pagina = $max_links; $pag_dep++)
	{
		if($pag_dep <= $quantidade_pg)
		{
			echo "<a href='index2.php?pagina=$pag_dep'>$pag_dep</a>";
		}
	}
	
	echo "<a href='index2.php?pagina=$quantidade_pg'>Ultima</a>";
	
	?>
	</body>
	</html>
	

	
	
	