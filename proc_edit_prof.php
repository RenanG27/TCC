<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</head>
<body>
<?php 
	session_start();
	include_once("conexao.php");
	
	$codigo = filter_input (INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
	$data = filter_input (INPUT_POST, 'data', FILTER_SANITIZE_STRING);
	$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$cpf = filter_input (INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
	$rg = filter_input (INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
	$tel = filter_input(INPUT_POST, 'tel' , FILTER_SANITIZE_STRING);
	$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING);
	
	$sql = "UPDATE professor SET data='$data', nome='$nome', cpf='$cpf', rg='$rg', tel='$tel', email='$email' WHERE codigo='$codigo'";
    $comando = mysqli_query ($conn, $sql);

if (mysqli_affected_rows($conn))
{
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
		$nome editado com sucesso!
	  </div>";
	header ("Location: index_prof.php");
}	
else
{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
		Falha ao editar $nome, tente novamente!
	  </div>";
	header ("Location: index_prof.php");
}
?>
</body>
</html>