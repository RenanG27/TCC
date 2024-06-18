<?php
   session_start();
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>Cadastro de curso</title>
	</head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
	<style>
	body{
            font-family: Arial, Helvetica, sans-serif;
             background-color: #F5F5F5;

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
	<li><a href="index.php">Voltar</a></li>
	<li><a href="principal.php">Principal</a></li>
	<li><a href="index2.php">Consultar</a></li>
	</ul>
		<center><h1>Cadastrar curso</h1>
		<?php
		if(isset ($_SESSION['msg']))
		{
		echo $_SESSION['msg'];
		unset ($_SESSION['msg']);
		
		}
		?>
		<form method="POST" action="proc_cad_usuario.php">
			
			<?php
			if(isset ($_SESSION['msg'])) 
		{
			echo $_SESSION['msg'];
			unset ($_SESSION['msg']);
		
		}
		?>
		<form method ="POST" action="principal.php">
			<form>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    
  </div>
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1">
  </div>
  <div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="exampleCheck1">
    <label class="form-check-label" for="exampleCheck1">Check me out</label>
  </div>
  <button type="CADASTRAR" class="btn btn-primary">CADASTRAR</button>
</form>
			
			
					</form>
				</body>
			</html>