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
		$dta_rep = filter_input(INPUT_POST, 'dta_rep', FILTER_SANITIZE_STRING);
		$aula = filter_input (INPUT_POST, 'aula', FILTER_SANITIZE_STRING);
		$dta_falt = filter_input (INPUT_POST, 'dta_falt', FILTER_SANITIZE_STRING);
		$materia = filter_input (INPUT_POST, 'materia', FILTER_SANITIZE_STRING);
		$remunerada = filter_input(INPUT_POST, 'remunerada', FILTER_SANITIZE_STRING);
				
		$sql = "INSERT INTO rep (rep_nome, rep_dta_rep, rep_qtde, rep_dta_falt, rep_mat, rep_remu) VALUES
		('$nome','$dta_rep','$aula', '$dta_falt', '$materia', '$remunerada')";
		$comando = mysqli_query ($conn, $sql);
		
	if (mysqli_insert_id($conn))
	{
		$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
		Reposição cadastrada com sucesso!
	  </div>";
		header ("Location: cad_rep.php");
		
	}
	else
	{
		$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
		Reposição não cadastrada!
	  </div>";
		header ("Location: cad_rep.php"); 
	}
?>	
</body>
</html>