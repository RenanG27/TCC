<html>
	<head>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
		<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</head>
</head>
<body>
<?php 
	session_start();
	include_once("conexao.php");
	
		$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
		$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
		$rg = filter_input (INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
		$data = filter_input (INPUT_POST, 'data', FILTER_SANITIZE_STRING);
		$tel = filter_input(INPUT_POST, 'tel' , FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
				
		$sql = "SELECT * FROM professor WHERE rg = '$rg' or cpf = '$cpf' limit 1";
		$comando = mysqli_query($conn, $sql);
		$row_professor = mysqli_fetch_array($comando);
						
		if (!empty ($row_professor['cpf'])) //se achou alguma informação
		{
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
			Cpf ou Rg ja cadastrado!
		  </div>";	
		  
			header ("Location: cad_prof.php");
		}

		else
		{

			$sql = "INSERT INTO professor (data, nome, cpf, rg, tel, email) VALUES
			('$data','$nome', '$cpf','$rg', '$tel', '$email')";
			$comando = mysqli_query ($conn, $sql);
		
				if (mysqli_insert_id($conn))
				{
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
					Professor cadastrado com sucesso!
				</div>";
					header ("Location: cad_prof.php");
					
				}
				else
				{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
					Professor não cadastrado!
				</div>";
					header ("Location: cad_prof.php"); 
				}
		}
?>
</body>
</html>