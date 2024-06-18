<?php 
	session_start();
	include_once("conexao.php");
	
	$codigo = filter_input (INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
	
	$sql = "UPDATE adc_mat SET nome='$nome' WHERE codigo='$codigo'";
    $comando = mysqli_query ($conn, $sql);

if (mysqli_affected_rows($conn))
{
	$_SESSION['msg'] = "<div class='alert alert-success' role='alert'>
	Materia editada com sucesso!
  </div>";
	header ("Location: adc_mat.php");
}	
else
{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert'>
		Falha ao editar Materia, tente novamente!
	  </div>";
	header ("Location: edit_adc_mat.php");
}