<?php 
session_start();
include_once("conexao.php");

$codigo = filter_input(INPUT_POST,'codigo', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$sql = "DELETE FROM materia WHERE codigo = $codigo";
$comando = mysqli_query($conn, $sql);

if($conn->query($sql) === true)
{
	$_SESSION ['msg'] = "<div class='alert alert-success' role='alert'>	$nome excluido com sucesso!</div>";
	header("Location: index_materia.php");
	
}
else
	{
		$_SESSION ['msg'] = "<div class='alert alert-danger' role='alert'>	Erro ao exluir $nome, tente novamente .</div>";
	header("Location: index_materia.php");
	}
?>