<?php 
session_start();
include_once("conexao.php");

$codigo = filter_input(INPUT_POST,'codigo', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$sql = "DELETE FROM escola WHERE codigo = $codigo";
$comando = mysqli_query($conn, $sql);

if($conn->query($sql) === true)
{
	$_SESSION ['msg'] = "<p style='color:green;'>escola $nome excluida com sucesso!</p>";
	header("Location: index_escola.php");
	
}
else
	{
		$_SESSION ['msg'] = "<p style='color:red;'>escola $nome não foi excluida!!!</p>";
	header("Location: index_escola.php");
	}
?>