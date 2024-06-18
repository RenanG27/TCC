<?php 
	session_start();
	include_once ("conexao.php");
	$codigo = filter_input(INPUT_GET, 'codigo', FILTER_SANITIZE_NUMBER_INT);
	$sql = "SELECT * FROM subst WHERE codigo = '$codigo'";
	$comando = mysqli_query($conn, $sql);
	$row_subst = mysqli_fetch_assoc($comando);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset = "utf-8">
		<title> CRUD - Editar</title>
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	</head>

	<style>

* {
    box-sizing: border-box;
    margin: 0;
	padding: 0;
}


body, html {
	width: 100%;
}

body{
	background-color: beige;
    font-family: Arial, Helvetica, sans-serif;
	font-size:17px;
	background-image: url("f_ca	ad.jpg");
}

label{
	font-size:18px;
	float:left;
}

#ajust{
	margin-left: 100px;
}

ul {
list-style-type: none;
margin: 0;
padding: 0;
overflow: hidden;
background-color: #333;
}

li {
float: left;
}

li a {
display: block;
color: white;
text-align: center;
padding: 14px 16px;
text-decoration: none;
}

li a:hover {
background-color: #111;
}

.cb_sql{
	width: 300px;
}

.label{
	width: 300px;
	margin-top:30px;
	color:white;
}

.label2{
	color:white;
}

#formGroupExampleInput{
	border-radius: 10px 20px;
	background-color:rgba(255, 255, 255, 0.6);
	font-family:arial black;
}


.form1{
	width:800px;
	margin-top: 50px;
}

h1{
	margin-top:50px;
	text-align:center;
	font-family:Arial black;
}

#form_1{
	border-radius: 60px 60px;
	border: 1px solid black;
	width: 500px;
	height: 850px;
	margin-bottom:50px;
	background-color:rgba(0, 0, 0, 0.5);
}

.modulo{
	width:80px;
}

.botao{
	margin-bottom: 30px;
	margin-top: 30px;
}

.fundo{
	width:1295px;
	height:800px;
	display:inline-block;
}

.alinhar{
	margin-top:90px;
}
	</style>
	
	<body>
	<ul>
		<li><a href = "sair.php">Sair do Sistema</a></li>
		<li><a href = "principal.php">Voltar Principal</a></li>
	</ul>
		<center><h1>Editar substituição</h1>
		<?php
		if(isset ($_SESSION['msg']))
		{
		echo $_SESSION['msg'];
		unset ($_SESSION['msg']);
		
		}
		?>
		<div class="form1">
			<form method ="POST" id="form_1" action="proc_edit_subst.php">
				<div class="alinhar">

					<div class="label">
					<input type="hidden" name="codigo" value="<?php echo $row_subst['codigo']; ?>">
						<div class="mb-3">
							<label for="formGroupExampleInput" class="form-label">1. Nome: </label>
							<input type="text" name="nome" class="form-control" id="formGroupExampleInput" required placeholder="" value="<?php echo $row_subst['nome']; ?>"><br>

							<label for="formGroupExampleInput" class="form-label">2. Data de substituição: </label>
							<input type="date" name="data" class="form-control" id="formGroupExampleInput" required placeholder="" value="<?php echo $row_subst['dta']; ?>"><br>
							
							<label for="formGroupExampleInput" class="form-label">3. Quantidade de aulas substituidas: </label>
							<input type="number" name="aula" class="form-control" id="formGroupExampleInput" required placeholder="" value="<?php echo $row_subst['qtde']; ?>"><br>
						</div>
					</div>

				<?php
					if (!$conn) 
					{
						die('Não foi possível conectar ao MySQL');
					}
					$sql = "SELECT nome FROM professor";
					$resultado = mysqli_query($conn,$sql) or die(mysql_error()."<br>Erro ao executar a inserção dos dados");

					if (mysqli_num_rows($resultado)!=0)
					{
						echo "<div class='label2'> <label id='ajust'> 4. Qual professor está ausente?: </label></div>";
						echo '<div class="cb_sql"><select class="form-select" aria-label="Default select example" name="ausente" id="formGroupExampleInput">
						<option value=" " selected="selected">'. $row_subst['prof_aus'] . '</option></div>';

						while($elemento = mysqli_fetch_array($resultado))
						{
							$nomeItem = $elemento['nome'];
							echo '<option value="'.$nomeItem.'">'.$nomeItem.'</option>';
						}
						echo '</select>';
					}
				?><br><br>

				<?php
					if (!$conn)
					{
						die('Não foi possível conectar ao MySQL');
					}
					$sql = "SELECT nome FROM materia";
					$resultado = mysqli_query($conn,$sql) or die(mysql_error()."<br>Erro ao executar a inserção dos dados");

					if (mysqli_num_rows($resultado)!=0)
					{
						echo "<div class='label2'><label> 5. Qual componente curricular?: </label></div>";
						echo '<div class="cb_sql"><select class="form-select" aria-label="Default select example" name="materia" id="formGroupExampleInput">
						<option value=" " selected="selected">'. $row_subst['materia'] .'</option></div>';
						while($elemento = mysqli_fetch_array($resultado))
						{
							$nomeItem = $elemento['nome'];
							echo '<option value="'.$nomeItem.'">'.$nomeItem.'</option>';
						}
						echo '</select>';
					}
				?><br><br>

<div class="cb_sql">
					<label for="formGroupExampleInput" class="label2">6. Essa substituição sera remunerada?: </label>
					<select class="form-select" aria-label="Default select example" name="remunerada" id="formGroupExampleInput">
				</div>
						<option value="<?php echo $row_subst['remunerada']; ?>"><?php echo $row_subst['remunerada']; ?></option>
						<option value="sim">Sim</option>
						<option value="nao">Não</option>
					</select>
					
				<div class="botao">
					<input type="submit" class="btn btn-outline-light" value="Editar">
				</div>

			</div>
			</form>
		</div>
</body>
</html>