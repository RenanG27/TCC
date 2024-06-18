<?php 
session_start();
include_once("conexao.php");

$cu_cod = filter_input(INPUT_POST,'cu_cod', FILTER_SANITIZE_STRING);
$cu_nome = filter_input(INPUT_POST, 'cu_nome', FILTER_SANITIZE_STRING);

$sql = "DELETE FROM cursos WHERE cu_cod = $cu_cod";
$comando = mysqli_query($conn, $sql);

if($conn->query($sql) === true)
{
	$_SESSION ['msg'] = "<div class='alert alert-success' role='alert'>	$cu_nome excluido com sucesso! 	</div>"
	header("Location: index_cursos.php");
	
}
else
	{
		$_SESSION ['msg'] = "<div class='alert alert-danger' role='alert'> Erro ao excluir $cu_nome , tente novamente! </div>";
	header("Location: index_cursos.php");
	}
?>