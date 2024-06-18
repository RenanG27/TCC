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
        
		$sql = "SELECT * FROM adc_mat WHERE nome = $nome LIKE '%$pesquisar%'";
		$comando = mysqli_query($conn, $sql);
		$row_adc_mat = mysqli_fetch_array($comando);
						
		if (!empty ($row_adc_mat[''])) //se achou alguma informação
		{
			$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
			Matéria ja cadastrada!
		  </div>";	
		  
			header ("Location:adc_mat.php");
		}

		else
		{
			
			$sql = "INSERT INTO adc_mat (nome) VALUES ('$nome')";

			$comando = mysqli_query ($conn, $sql);
			
				if (mysqli_insert_id($conn))
				{
					$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
					Matéria cadastrada com sucesso!
				</div>";
					header ("Location:adc_mat.php");
					
				}
				else
				{
					$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
					Matéria não cadastrada!
				</div>";
					header ("Location:adc_mat.php"); 
				}
		}
?>	

</body>
</html>