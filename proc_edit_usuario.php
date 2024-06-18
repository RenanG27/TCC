<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</head>
<body>
<?php 
	session_start();
	include_once("conexao.php");
	
	$id = filter_input (INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$email = filter_input (INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
	$senha1 = MD5 (filter_input (INPUT_POST, 'senha1', FILTER_SANITIZE_STRING));
	$senha2 = MD5 (filter_input (INPUT_POST, 'senha2', FILTER_SANITIZE_STRING));

	$sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha1' limit 1";
	$comando = mysqli_query($conn, $sql);
	$row_usuarios = mysqli_fetch_array($comando);

if (!empty ($row_usuarios['senha'])) //se achou alguma informação
	{
		$sql = "UPDATE usuarios SET nome='$nome', email='$email',senha = '$senha2', created='00/00/0000',  modified=current_date WHERE id='$id'";
		$comando = mysqli_query ($conn, $sql);
		if (mysqli_affected_rows($conn))
		{
			$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
			$nome editado com sucesso!
		</div>";
			header ("Location: index2.php");
		}	
		else
		{
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
				Erro ao editar $nome, tente novamente!
			</div>";
			header ("Location: edit_usuario.php?id=$id");
		}
	}
	else
	{
		$_SESSION['msg']="<div class='alert alert-danger' role='alert'>
		Senha incorreta!
	</div>";
	header ("Location: edit_usuario.php");
	}
?>
</body>
</html>
