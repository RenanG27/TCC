<?php 
	session_start();
	include_once("conexao.php");
	
	$codigo = filter_input (INPUT_POST, 'codigo', FILTER_SANITIZE_NUMBER_INT);
	$nome = filter_input (INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
    $uf = filter_input (INPUT_POST, 'uf', FILTER_SANITIZE_STRING);
	
	$sql = "UPDATE escola SET nome='$nome' , uf='$uf' WHERE codigo='$codigo'";
    $comando = mysqli_query ($conn, $sql);

if (mysqli_affected_rows($conn))
{
	$_SESSION['msg'] = "<p style='color:green;'>escola $nome editada com sucesso!</p>";
	header ("Location: index_escola.php");
}	
else
{
	$_SESSION ['msg'] = "<p style='color:red;'>escola não foi editada com sucesso!</p>";
	header ("Location: edit_escola.php");
}