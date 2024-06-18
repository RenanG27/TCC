<?php 
	session_start();
	include_once("conexao.php");
	
		$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
        $uf = filter_input(INPUT_POST, 'uf' , FILTER_SANITIZE_STRING);
				
		$sql = "INSERT INTO escola (nome,uf) VALUES
		('$nome', '$uf')";
		$comando =mysqli_query ($conn, $sql);
		
	if (mysqli_insert_id($conn))
	{
		$_SESSION[  'msg'] = "<p style='color=green;'>escola cadastrada com sucesso</p>";
		header ("Location: index_escola.php");
		
	}
	else
	{
		$_SESSION['msg'] = "<p style='color=red;'>A escola não foi cadastrada com sucesso</p>";
		header ("Location: cad_escola.php"); 
	}
?>	