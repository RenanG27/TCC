<?php
session_start(); //iniciando sessão
include_once ("conexao.php");
//garantindo a quebra da sessão 
?>
<!DOCTYPE html>
<html lang="pt-br"> <!-- Definindo que os dados estarã em Portugues -->
	<head>
	<meta charset="utf-8"> <!-- Para trablharmos com caracteres especiais -->
	<title> Editar Curso</title>
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

<body><ul>
		<li><a href = "principal.php">Voltar Principal</a></li>
		<li><a href = "sair.php">Sair do Sistema</a></li>
	</ul>
	<center><h1> Cursos Cadastrados</h1>
	<?php
	if (isset($_SESSION['msg'])) //verificando o conteudo da variavel e mostrando
	{
		echo $_SESSION['msg'];
		unset($_SESSION['msg']);
		
	}
	//Receber o Numero da pagina
	$pagina_atual = filter_input(INPUT_GET,'pagina', FILTER_SANITIZE_NUMBER_INT);
	$pagina = (!empty($pagina_atual)) ?$pagina_atual : 1;
	
	//setar a quantidade de itens por pagina
	$qnt_result_pg = 4;
	
	//calcular o inicio visualização
	$inicio = ($qnt_result_pg *$pagina) - $qnt_result_pg;
	
	$sql = "SELECT * FROM cursos LIMIT $inicio, $qnt_result_pg";
	$comando = mysqli_query($conn, $sql);
	
	?>

<div class="m-5">
	<table class="table table-hover table-bg	">
		<thead>
			<tr>
			<th scope="col">#</th>
			<th scope="col">Nome</th>
			<th scope="col">Turno</th>
			<th scope="col">Módulo</th>
			<th scope="col"></th>
			</tr>
		</thead>
		<tbody>
			<?php
				while($row_cursos = mysqli_fetch_assoc($comando) )
				{
					echo "<tr>";
					echo "<td>" . $row_cursos['cu_cod'] . "</td>";
					echo "<td>" . $row_cursos['cu_nome'] . "</td>";
					echo "<td>" . $row_cursos['cu_turno'] . "</td>";
					echo "<td>" . $row_cursos['cu_mod'] . "</td>";
					echo "<td><a href='edit_cursos.php?cu_cod=" . $row_cursos['cu_cod'] . "'><img src='image/edit.png'></a>
					 <a href='delete_cursos.php?cu_cod=" . $row_cursos['cu_cod'] . "'><img src='image/delete.png'> </a> </td>";
					echo "</tr>";
				}
			?>
		</tbody>
	</table>
</div>


	<?php
	
	$sql = "SELECT COUNT(cu_cod) AS num_result FROM cursos";
	$resultado_pg = mysqli_query ($conn, $sql);
	$row_pg = mysqli_fetch_assoc($resultado_pg);
	
	$quantidade_pg = ceil($row_pg['num_result'] / $qnt_result_pg);
	
	
	$max_links = 2;
	echo "<a href='index_cursos.php?pagina=1'>Primeira</a> ";
	
	for ($pag_ant = $pagina = $max_links; $pag_ant <= $pagina = 1; $pag_ant++)
	{
		if ($pag_ant>=1)
		{
			echo "<a href ='index_cursos.php?pagina=$pag_ant'>$pag_ant</a>";
		}
			
	}
	
	echo "$pagina ";
	
	for($pag_dep = $pagina + 1; $pag_dep <= $pagina = $max_links; $pag_dep++)
	{
		if($pag_dep <= $quantidade_pg)
		{
			echo "<a href='index_cursos.php?pagina=$pag_dep'>$pag_dep</a>";
		}
	}
	
	echo "<a href='index_cursos.php?pagina=$quantidade_pg'>Ultima</a>";
	
	?>
	</body>
	</html>
	

	
	
	