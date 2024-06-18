<?php 
	session_start();
	include_once("conexao.php");
	
	$codigo = filter_input (INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$cpf = filter_input (INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
	$rg = filter_input (INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
	
	$sql = "UPDATE alunos SET nome='$nome', cpf='$cpf', rg='$rg' WHERE codigo='$codigo'";
    $comando = mysqli_query ($conn, $sql);

if (mysqli_affected_rows($conn))
{
	$_SESSION['msg'] = "<p style='color:green;'>Aluno $nome editado com sucesso!</p>";
	header ("Location: index2alunos.php");
}	
else
{
	$_SESSION ['msg'] = "<p style='color:red;'>Aluno não foi editado com sucesso!</p>";
	header ("Location: edit_aluno.php?codigo=$codigo");
}