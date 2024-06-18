<html>
	<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</head>
<body>
<?php 
	session_start();
	include_once("conexao.php");
		$codigo = filter_input(INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
	    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
		$materia = filter_input(INPUT_POST, 'materia', FILTER_SANITIZE_STRING);
		$data = filter_input (INPUT_POST, 'data', FILTER_SANITIZE_STRING);
		$aula = filter_input (INPUT_POST, 'aula', FILTER_SANITIZE_STRING);
		$remunerada = filter_input (INPUT_POST, 'remunerada', FILTER_SANITIZE_STRING);
		$ausente = filter_input(INPUT_POST, 'ausente', FILTER_SANITIZE_STRING);
	
	$sql = "UPDATE subst SET nome='$nome',materia='$materia' , qtde='$aula', dta='$data', remunerada='$remunerada', prof_aus='$ausente' WHERE codigo='$codigo'";
    $comando = mysqli_query ($conn, $sql);

if (mysqli_affected_rows($conn))
{
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
		Substituição editada com sucesso!
	  </div>";
	header ("Location: index_subst.php");
}	
else
{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
		Falha ao editar, tente novamente!
	  </div>";
	header ("Location: index_subst.php?codigo=$codigo");
}
?>
</body>
</html>