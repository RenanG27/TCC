<?php
session_start(); //iniciando sessão
include_once ("conexao.php");

$email = (filter_input (INPUT_POST, 'email', FILTER_SANITIZE_STRING));
$senha = MD5 (filter_input (INPUT_POST, 'senha', FILTER_SANITIZE_STRING));


$sql = "SELECT * FROM usuarios WHERE email = '$email' and senha = '$senha' limit 1";
$comando = mysqli_query($conn, $sql);
$row_usuarios = mysqli_fetch_array($comando);

if (!empty ($row_usuarios['nome'])) //se achou alguma informação
{
	$_SESSION['msg'] = "<div class='alert alert-info' role='alert' align='center'>
	Bem vindo ao sistema <b>". $row_usuarios['nome']."!</b></div>";
	header("Location: principal.php"); 
}
else 
{
	$_SESSION['msg'] = "<div class='alert alert-danger' role='alert' align='center'>
	E-mail ou senha incorreto.
  </div>";
	
	header ("Location: index.php");
	
}
?>

