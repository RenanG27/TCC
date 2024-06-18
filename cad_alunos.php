<?php
   session_start();
?>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<title>CRUD - Cadastrar</title>
		<link rel="stylesheet" type="text/css" href="style.css">
	</head>
	
	<body>
	<ul>
		<li><a href = "cad_alunos.php">Cadastrar</a></li>
		<li><a href="index2alunos.php">Listar</a></li>
		<li><a href = "sair.php">Sair do Sistema</a></li>
		<li><a href = "principal.php">Voltar Principal</a></li>
	</ul>
		<center><h1>Cadastrar Aluno</h1>
		<?php
		if(isset ($_SESSION['msg']))
		{
		echo $_SESSION['msg'];
		unset ($_SESSION['msg']);
		
		}
		?>
			
			<form method ="POST" action="proc_cad_alunos.php">
			<label>Nome: </label>
			<input type="text" name="nome" required placeholder="Digite o nome completo"><br><br>
			
			<label> Cpf: </label>
			<input type="number" name="cpf" required placeholder="Digite o seu cpf"><br><br>
			
			<label> Rg: </label>
			<input type="number" name="rg" required placeholder="Digite o seu Rg"><br><br>
			
			
			<input type="submit" value="Cadastrar">
					</form>
				</body>
			</html>