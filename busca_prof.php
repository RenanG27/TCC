<?php
   session_start();
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Cadastrar</title>
		<link rel="stylesheet" type="text/css" href="estilo.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
	</head>
  
	<style>
	body{
            font-family: Arial, Helvetica, sans-serif;
             background-color: #2E8B57;

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
		<li><a href="index_materia.php">Listar</a></li>
		<li><a href = "sair.php">Sair do Sistema</a></li>
		<li><a href = "principal.php">Voltar Principal</a></li>
	</ul>
		<center><h1>Cadastrar Matértia</h1>
		<?php
		if(isset ($_SESSION['msg']))
		{
		echo $_SESSION['msg'];
		unset ($_SESSION['msg']);
		
		}
		?>
		
        <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action">Professores com idade +60</a>
  </div> 
  <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action">Professores de 40 até 59 anos</a>
  </div> 
  <div class="list-group">
  <a href="#" class="list-group-item list-group-item-action">Professores com idade inferior a 40 anos</a>
  </div>
				</body>
			</html>