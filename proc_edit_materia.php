<?php 
	session_start();
	include_once("conexao.php");
	
	$codigo = filter_input (INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	$cu_nome = filter_input(INPUT_POST, 'cu_nome', FILTER_SANITIZE_STRING);
	$prof_nome = filter_input(INPUT_POST, 'prof_nome', FILTER_SANITIZE_STRING);
	$cu_mod = filter_input(INPUT_POST, 'cu_mod' , FILTER_SANITIZE_STRING);
	
	$sql = "UPDATE materia SET nome='$nome', cu_nome='$cu_nome', prof_nome='$prof_nome', cu_mod='$cu_mod' WHERE codigo='$codigo'";
    $comando = mysqli_query ($conn, $sql);

if (mysqli_affected_rows($conn))
{
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
	$nome editado com sucesso!
  </div>";
	header ("Location: index_materia.php");
}	
else
{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
		Falha ao editar $nome, tente novamente!
	  </div>";
	header ("Location: edit_materia.php");
}