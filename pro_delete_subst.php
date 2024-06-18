<?php 
session_start();
include_once("conexao.php");

$codigo = filter_input(INPUT_POST,'codigo', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$sql = "DELETE FROM subst WHERE codigo = $codigo";
$comando = mysqli_query($conn, $sql);

if($conn->query($sql) === true)
{
	$_SESSION ['msg'] = "<div class='alert alert-success' role='alert'>	Substituição excluida com sucesso!</div>";
	header("Location: index_subst.php");
	
}
else
	{
		$_SESSION ['msg'] = "<div class='alert alert-danger' role='alert'>	Erro ao excluir substituição, tente novamente</div>";
	header("Location: index_subst.php");
	}
?>