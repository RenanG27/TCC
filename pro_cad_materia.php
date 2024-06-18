<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</head>
<body>

<?php 
	session_start();
	include_once("conexao.php");
	
		$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
		$cu_nome = filter_input(INPUT_POST, 'cu_nome', FILTER_SANITIZE_STRING);
		$prof_nome = filter_input(INPUT_POST, 'prof_nome', FILTER_SANITIZE_STRING);
		$cu_mod = filter_input(INPUT_POST, 'cu_mod' , FILTER_SANITIZE_STRING);
			
		$sql = "SELECT * FROM materia WHERE nome = '$nome' LIKE '%$nome%'limit 1";
		$comando = mysqli_query($conn, $sql);
		$row_materia = mysqli_fetch_array($comando);

		

		if (!empty ($row_materia['nome'])) //se achou alguma informação
		{
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
			Matéria ja cadastrada!
		  </div>";	
		  
			header ("Location: cad_materia.php");
		}

		else
		{
			$sql = "INSERT INTO materia (nome, cu_nome, prof_nome, cu_mod) VALUES
			('$nome','$cu_nome', '$prof_nome', '$cu_mod')";
			$comando = mysqli_query ($conn, $sql);
			
			if (mysqli_insert_id($conn))
			{
				$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
				Matéria cadastrada com sucesso!
			</div>";
				header ("Location:	cad_materia.php");
				
			}
			else
			{
				$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
				Matéria não cadastrada!
			</div>";
				header ("Location: cad_materia.php");
			}
		}
?>	
</body>
</html>