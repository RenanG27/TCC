<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</head>
<body>
<?php 
	session_start();
	include_once("conexao.php");
	
	$cu_cod = filter_input (INPUT_POST, 'cu_cod', FILTER_SANITIZE_NUMBER_INT);
	$cu_nome = filter_input (INPUT_POST, 'cu_nome', FILTER_SANITIZE_STRING);
	$cu_turno = filter_input (INPUT_POST, 'periodo', FILTER_SANITIZE_STRING);
	$cu_mod = filter_input (INPUT_POST, 'modulo', FILTER_SANITIZE_STRING);
	
	$sql = "UPDATE cursos SET cu_nome='$cu_nome', cu_turno='$cu_turno', cu_mod='$cu_mod' WHERE cu_cod='$cu_cod'";
    $comando = mysqli_query ($conn, $sql);

if (mysqli_affected_rows($conn))
{
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
	$cu_nome editado com sucesso!
  </div>";
	header ("Location: index_cursos.php");
}	
else
{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
		Falha ao editar $cu_nome, tente novamente!
	  </div>";
	header ("Location: index_cursos.php");
}
?>
</body>
</html>