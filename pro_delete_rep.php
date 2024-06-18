<?php 
session_start();
include_once("conexao.php");

$rep_cod = filter_input(INPUT_POST,'rep_cod', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);

$sql = "DELETE FROM rep WHERE rep_cod = $rep_cod";
$comando = mysqli_query($conn, $sql);

if($conn->query($sql) === true)
{
	$_SESSION ['msg'] = "<div class='alert alert-success' role='alert'>	Reposição excluida com sucesso!	</div>";
	header("Location: index_rep.php");
	
}
else
	{
		$_SESSION ['msg'] = "<div class='alert alert-danger' role='alert'>	Erro ao exlcluir reposição, tente novamente. </div>";
	header("Location: index_rep.php");
	}
?>