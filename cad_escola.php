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
		<li><a href="index_escola.php">Listar</a></li>
		<li><a href = "sair.php">Sair do Sistema</a></li>
		<li><a href = "principal.php">Voltar Principal</a></li>
	</ul>
		<center><h1>Cadastrar Matértia</h1>
		<?php
		if(isset ($_SESSION['msg']))
		{
		echo $_SESSION['msg'];
		unset ($_SESSION['msg']);
		
		}
		?>
		
			<form method ="POST" action="pro_cad_escola.php">
			<label>Nome: </label>
			<input type="text" name="nome" required placeholder="Digite o nome da escola">
            <label> UF: </label>
            <input type="text" name="uf" required placeholder="Digite o uf da escola">
					
			<input type="submit" value="Cadastrar">
					</form>
				</body>
			</html>