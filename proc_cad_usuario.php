<?php 
	session_start();
	include_once("conexao.php");
	?>

<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</head>
<body>
<?php 
	
		$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
		$senha = md5 (filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING));
				//Salvando a senha criptografada no banco 

		$sql = "SELECT * FROM usuarios WHERE email = '$email' limit 1";
		$comando = mysqli_query($conn, $sql);
		$row_usuarios = mysqli_fetch_array($comando);
						
		if (!empty ($row_usuarios['email'])) //se achou alguma informação
		{
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
			E-mail ja cadastrado!
		  </div>";	
		  
			header ("Location: cad_usuario.php");
		}

		else
		{
			
			$sql = "INSERT INTO usuarios (nome,email,senha,created,modified) VALUES 
			('$nome', '$email', '$senha', current_date, '00/00/0000')";

			$comando = mysqli_query ($conn, $sql);
			
				if (mysqli_insert_id($conn))
				{
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
					Usuário cadastrado com sucesso!
				</div>";
					header ("Location: cad_usuario.php");
					
				}
				else
				{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
					Usuário não cadastrado!
				</div>";
					header ("Location:cad_usuario.php"); 
				}
		}
?>	

</body>
</html>