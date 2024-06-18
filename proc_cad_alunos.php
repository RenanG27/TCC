<?php 
	session_start();
	include_once("conexao.php");
	
		$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
		$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
		$rg = (filter_input (INPUT_POST, 'rg', FILTER_SANITIZE_STRING));
				//Salvando a senha criptografada no banco 
		$sql = "INSERT INTO alunos (nome, cpf, rg) VALUES
		('$nome', '$cpf','$rg')";
		$comando = mysqli_query ($conn, $sql);
		
	if (mysqli_insert_id($conn))
	{
		$_SESSION['msg'] = "<p style='color=green;'>Aluno cadastrado com sucesso</p>";
		header ("Location: index2alunos.php");
		
	}
	else
	{
		$_SESSION['msg'] = "<p style='color=red;'>Aluno não foi cadastrado com sucesso</p>";
		header ("Location: cad_alunos.php"); 
	}
?>	